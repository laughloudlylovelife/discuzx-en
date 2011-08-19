<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: portalcp_upload.php 17351 2010-10-11 05:03:55Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$operation = $_G['gp_op'] ? $_G['gp_op'] : '';

require_once libfile('class/upload');
$upload = new discuz_upload();
$downremotefile = false;
$aid = intval(getgpc('aid'));
$catid = intval(getgpc('catid'));
if($aid) {
	$query = DB::query("SELECT * FROM ".DB::table('portal_article_title')." WHERE aid='$aid'");
	if(!$article = DB::fetch($query)) {
		portal_upload_error(lang('portalcp', 'article_noexist'));
	}
	if(check_articleperm($catid, $aid, $article, false, true) !== true) {
		portal_upload_error(lang('portalcp', 'article_noallowed'));
	}
} else {
	if(check_articleperm($catid, $aid, null, false, true) !== true) {
		portal_upload_error(lang('portalcp', 'article_publish_noallowed'));
	}
}

if($operation == 'downremotefile') {
	$arrayimageurl = $temp = $imagereplace = array();
	$string = stripcslashes($_G['gp_content']);
	$downremotefile = true;
	preg_match_all("/\<img.+src=('|\"|)?(.*)(\\1)([\s].*)?\>/ismUe", $string, $temp, PREG_SET_ORDER);
	if(is_array($temp) && !empty($temp)) {
		foreach($temp as $tempvalue) {
			$tempvalue[2] = str_replace('\"', '', $tempvalue[2]);
			if(strlen($tempvalue[2])){
				$arrayimageurl[] = $tempvalue[2];
			}
		}
		$arrayimageurl = array_unique($arrayimageurl);
		if($arrayimageurl) {
			foreach($arrayimageurl as $tempvalue) {
				$imageurl = $tempvalue;
				$imagereplace['oldimageurl'][] = $imageurl;
				$attach['ext'] = $upload->fileext($imageurl);
				if(!$upload->is_image_ext($attach['ext'])) {
					continue;
				}
				$content = '';
				if(preg_match('/^(http:\/\/|\.)/i', $imageurl)) {
					$content = dfsockopen($imageurl);
				} elseif(checkperm('allowdownlocalimg')) {
					if(preg_match('/^data\/(.*?)\.thumb\.jpg$/i', $imageurl)) {
						$content = file_get_contents(substr($imageurl, 0, strrpos($imageurl, '.')-6));
					} elseif(preg_match('/^data\/(.*?)\.(jpg|jpeg|gif|png)$/i', $imageurl)) {
						$content = file_get_contents($imageurl);
					}
				}
				if(empty($content)) continue;
				$temp = explode('/', $imageurl);

				$attach['name'] =  trim($temp[count($temp)-1]);
				$attach['thumb'] = '';

				$attach['isimage'] = $upload -> is_image_ext($attach['ext']);
				$attach['extension'] = $upload -> get_target_extension($attach['ext']);
				$attach['attachdir'] = $upload -> get_target_dir('portal');
				$attach['attachment'] = $attach['attachdir'] . $upload->get_target_filename('portal').'.'.$attach['extension'];
				$attach['target'] = getglobal('setting/attachdir').'./portal/'.$attach['attachment'];

				if(!@$fp = fopen($attach['target'], 'wb')) {
					continue;
				} else {
					flock($fp, 2);
					fwrite($fp, $content);
					fclose($fp);
				}
				if(!$upload->get_image_info($attach['target'])) {
					@unlink($attach['target']);
					continue;
				}
				$attach['size'] = filesize($attach['target']);
				$attachs[] = daddslashes($attach);
			}
		}
	}
} else {

	$upload->init($_FILES['attach'], 'portal');
	$attach = $upload->attach;

	if(!$upload->error()) {
		$upload->save();
	}
	if($upload->error()) {
		portal_upload_error($upload->error());
	}
	$attachs[] = $attach;
}

if($attachs) {

	foreach($attachs as $attach) {
		if($attach['isimage'] && empty($_G['setting']['portalarticleimgthumbclosed'])) {
			require_once libfile('class/image');
			$image = new image();
			$thumbimgwidth = $_G['setting']['portalarticleimgthumbwidth'] ? $_G['setting']['portalarticleimgthumbwidth'] : 300;
			$thumbimgheight = $_G['setting']['portalarticleimgthumbheight'] ? $_G['setting']['portalarticleimgthumbheight'] : 300;
			$attach['thumb'] = $image->Thumb($attach['target'], '', $thumbimgwidth, $thumbimgheight, 2);
			$image->Watermark($attach['target'], '', 'portal');
		}

		if(getglobal('setting/ftp/on') && ((!$_G['setting']['ftp']['allowedexts'] && !$_G['setting']['ftp']['disallowedexts']) || ($_G['setting']['ftp']['allowedexts'] && in_array($attach['ext'], $_G['setting']['ftp']['allowedexts'])) || ($_G['setting']['ftp']['disallowedexts'] && !in_array($attach['ext'], $_G['setting']['ftp']['disallowedexts']))) && (!$_G['setting']['ftp']['minsize'] || $attach['size'] >= $_G['setting']['ftp']['minsize'] * 1024)) {
			if(ftpcmd('upload', 'portal/'.$attach['attachment']) && (!$attach['thumb'] || ftpcmd('upload', 'portal/'.$attach['attachment'].'.thumb.jpg'))) {
				@unlink($_G['setting']['attachdir'].'/portal/'.$attach['attachment']);
				@unlink($_G['setting']['attachdir'].'/portal/'.$attach['attachment'].'.thumb.jpg');
				$attach['remote'] = 1;
			} else {
				if(getglobal('setting/ftp/mirror')) {
					@unlink($attach['target']);
					@unlink($attach['target'].'.thumb.jpg');
					portal_upload_error(lang('portalcp', 'upload_remote_failed'));
				}
			}
		}

		$setarr = array(
			'uid' => $_G['uid'],
			'filename' => $attach['name'],
			'attachment' => $attach['attachment'],
			'filesize' => $attach['size'],
			'isimage' => $attach['isimage'],
			'thumb' => $attach['thumb'],
			'remote' => $attach['remote'],
			'filetype' => $attach['extension'],
			'dateline' => $_G['timestamp'],
			'aid' => $aid
		);
		$setarr['attachid'] = DB::insert("portal_attachment", $setarr, true);
		if($downremotefile) {
			$attach['url'] = ($attach['remote'] ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachurl']).'portal/';
			$imagereplace['newimageurl'][] = $attach['url'].$attach['attachment'];
		}
		portal_upload_show($setarr);
	}
	if($downremotefile && $imagereplace) {
		$string = preg_replace(array("/\<(script|style|iframe)[^\>]*?\>.*?\<\/(\\1)\>/si", "/\<!*(--|doctype|html|head|meta|link|body)[^\>]*?\>/si"), '', $string);
		$string = str_replace($imagereplace['oldimageurl'], $imagereplace['newimageurl'], $string);
		$string = str_replace(array("\r", "\n", "\r\n"), '', addcslashes($string, '/"\\'));
		print <<<EOF
		<script type="text/javascript">
			var f = parent.window.frames["uchome-ifrHtmlEditor"].window.frames["HtmlEditor"];
			f.document.body.innerHTML = '$string';
		</script>
EOF;
	}
	exit();
}


function portal_upload_error($msg) {
	echo '<script>';
	echo 'if(parent.$(\'localfile_'.$_GET['attach_target_id'].'\') != null)parent.$(\'localfile_'.$_GET['attach_target_id'].'\').innerHTML = \''.lang('portalcp', 'upload_error').$msg.'\';else alert(\''.$msg.'\')';
	echo '</script>';
	exit();
}

function portal_upload_show($attach) {

	$imagehtml = $filehtml = '';

	if($attach['isimage']) {
		$imagehtml = get_uploadcontent($attach);
	} else {
		$filehtml = get_uploadcontent($attach);
	}

	echo '<script>';
	if($imagehtml) echo 'parent.$(\'attach_image_body\').innerHTML += \''.addslashes($imagehtml).'\';';
	if($filehtml) echo 'parent.$(\'attach_file_body\').innerHTML += \''.addslashes($filehtml).'\';';

	echo 'if(parent.$(\'localfile_'.$_GET['attach_target_id'].'\') != null)parent.$(\'localfile_'.$_GET['attach_target_id'].'\').style.display = \'none\';';
	echo 'parent.$(\'attach_ids\').value += \','.$attach['attachid'].'\';';
	echo '</script>';
}

?>