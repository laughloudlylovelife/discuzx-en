<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: spacecp_share.php 23983 2011-08-18 06:04:04Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sid = intval($_GET['sid']);

if($_GET['op'] == 'delete') {
	if(submitcheck('deletesubmit')) {
		require_once libfile('function/delete');
		deleteshares(array($sid));
		showmessage('do_success', $_GET['type']=='view'?'home.php?mod=space&quickforward=1&do=share':dreferer(), array('sid' => $sid), array('showdialog'=>1, 'showmsg' => true, 'closetime' => true));
	}
} elseif($_GET['op'] == 'edithot') {
	if(!checkperm('manageshare')) {
		showmessage('no_privilege_edithot_share');
	}

	if($sid) {
		$query = DB::query("SELECT * FROM ".DB::table('home_share')." WHERE sid='$sid'");
		if(!$share = DB::fetch($query)) {
			showmessage('share_does_not_exist');
		}
	}

	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		DB::update('home_share', array('hot'=>$_POST['hot']), array('sid'=>$sid));
		DB::update('home_feed', array('hot'=>$_POST['hot']), array('id'=>$sid, 'idtype'=>'sid'));

		showmessage('do_success', dreferer());
	}

} else {


	if(!checkperm('allowshare')) {
		showmessage('no_privilege_share');
	}

	cknewuser();

	$type = empty($_GET['type'])?'':$_GET['type'];
	$id = empty($_GET['id'])?0:intval($_GET['id']);
	$note_uid = 0;
	$note_message = '';
	$note_values = array();

	$hotarr = array();

	$arr = array();
	$feed_hash_data = '';

	switch ($type) {
		case 'space':

			$feed_hash_data = "uid{$id}";

			$tospace = getspace($id);
			if(empty($tospace)) {
				showmessage('space_does_not_exist');
			}
			if(isblacklist($tospace['uid'])) {
				showmessage('is_blacklist');
			}

			$arr['itemid'] = $id;
			$arr['fromuid'] = $id;
			$arr['title_template'] = lang('spacecp', 'share_space');
			$arr['body_template'] = '<b>{username}</b><br>{reside}<br>{spacenote}';
			$arr['body_data'] = array(
			'username' => "<a href=\"home.php?mod=space&uid=$id\">".$tospace['username']."</a>",
			'reside' => $tospace['resideprovince'].$tospace['residecity'],
			'spacenote' => $tospace['spacenote']
			);

			loaducenter();
			$isavatar = uc_check_avatar($id);
			$arr['image'] = $isavatar?avatar($id, 'middle', true):UC_API.'/images/noavatar_middle.gif';
			$arr['image_link'] = "home.php?mod=space&uid=$id";

			$note_uid = $id;
			$note_message = 'share_space';

			break;
		case 'blog':

			$feed_hash_data = "blogid{$id}";

			$query = DB::query("SELECT b.*,bf.pic,bf.message,bf.hotuser FROM ".DB::table('home_blog')." b
				LEFT JOIN ".DB::table('home_blogfield')." bf ON bf.blogid=b.blogid
				WHERE b.blogid='$id'");
			if(!$blog = DB::fetch($query)) {
				showmessage('blog_does_not_exist');
			}
			if(in_array($blog['status'], array(1, 2))) {
				showmessage('moderate_blog_not_share');
			}
			if($blog['friend']) {
				showmessage('logs_can_not_share');
			}
			if(isblacklist($blog['uid'])) {
				showmessage('is_blacklist');
			}
			$arr['fromuid'] = $blog['uid'];
			$arr['itemid'] = $id;
			$arr['title_template'] = lang('spacecp', 'share_blog');
			$arr['body_template'] = '<b>{subject}</b><br>{username}<br>{message}';
			$arr['body_data'] = array(
			'subject' => "<a href=\"home.php?mod=space&uid=$blog[uid]&do=blog&id=$blog[blogid]\">$blog[subject]</a>",
			'username' => "<a href=\"home.php?mod=space&uid=$blog[uid]\">".$blog['username']."</a>",
			'message' => getstr($blog['message'], 150, 0, 1, 0, -1)
			);
			if($blog['pic']) {
				$arr['image'] = pic_cover_get($blog['pic'], $blog['picflag']);
				$arr['image_link'] = "home.php?mod=space&uid=$blog[uid]&do=blog&id=$blog[blogid]";
			}
			$note_uid = $blog['uid'];
			$note_message = 'share_blog';
			$note_values = array('url'=>"home.php?mod=space&uid=$blog[uid]&do=blog&id=$blog[blogid]", 'subject'=>$blog['subject'], 'from_id' => $id, 'from_idtype' => 'blogid');

			$hotarr = array('blogid', $blog['blogid'], $blog['hotuser']);

			break;
		case 'album':

			$feed_hash_data = "albumid{$id}";

			$query = DB::query("SELECT * FROM ".DB::table('home_album')." WHERE albumid='$id'");
			if(!$album = DB::fetch($query)) {
				showmessage('album_does_not_exist');
			}
			if($album['friend']) {
				showmessage('album_can_not_share');
			}
			if(isblacklist($album['uid'])) {
				showmessage('is_blacklist');
			}

			$arr['itemid'] = $id;
			$arr['fromuid'] = $album['uid'];
			$arr['title_template'] =  lang('spacecp', 'share_album');
			$arr['body_template'] = '<b>{albumname}</b><br>{username}';
			$arr['body_data'] = array(
				'albumname' => "<a href=\"home.php?mod=space&uid=$album[uid]&do=album&id=$album[albumid]\">$album[albumname]</a>",
				'username' => "<a href=\"home.php?mod=space&uid=$album[uid]\">".$album['username']."</a>"
			);
			$arr['image'] = pic_cover_get($album['pic'], $album['picflag']);
			$arr['image_link'] = "home.php?mod=space&uid=$album[uid]&do=album&id=$album[albumid]";
			$note_uid = $album['uid'];
			$note_message = 'share_album';
			$note_values = array('url'=>"home.php?mod=space&uid=$album[uid]&do=album&id=$album[albumid]", 'albumname'=>$album['albumname'], 'from_id' => $id, 'from_idtype' => 'albumid');

			break;
		case 'pic':

			$feed_hash_data = "picid{$id}";

			$query = DB::query("SELECT album.username, album.albumid, album.albumname, album.friend, pf.*, pic.*
				FROM ".DB::table('home_pic')." pic
				LEFT JOIN ".DB::table('home_picfield')." pf ON pf.picid=pic.picid
				LEFT JOIN ".DB::table('home_album')." album ON album.albumid=pic.albumid
				WHERE pic.picid='$id'");
			if(!$pic = DB::fetch($query)) {
				showmessage('image_does_not_exist');
			}
			if(in_array($pic['status'], array(1, 2))) {
				showmessage('moderate_pic_not_share');
			}
			if($pic['friend']) {
				showmessage('image_can_not_share');
			}
			if(isblacklist($pic['uid'])) {
				showmessage('is_blacklist');
			}
			if(empty($pic['albumid'])) $pic['albumid'] = 0;
			if(empty($pic['albumname'])) $pic['albumname'] = lang('spacecp', 'default_albumname');

			$arr['itemid'] = $id;
			$arr['fromuid'] = $pic['uid'];
			$arr['title_template'] = lang('spacecp', 'share_image');
			$arr['body_template'] = lang('spacecp', 'album').': <b>{albumname}</b><br>{username}<br>{title}';
			$arr['body_data'] = array(
			'albumname' => "<a href=\"home.php?mod=space&uid=$pic[uid]&do=album&id=$pic[albumid]\">$pic[albumname]</a>",
			'username' => "<a href=\"home.php?mod=space&uid=$pic[uid]\">".$pic['username']."</a>",
			'title' => getstr($pic['title'], 100, 0, 1, 0, -1)
			);
			$arr['image'] = pic_get($pic['filepath'], 'album', $pic['thumb'], $pic['remote']);
			$arr['image_link'] = "home.php?mod=space&uid=$pic[uid]&do=album&picid=$pic[picid]";
			$note_uid = $pic['uid'];
			$note_message = 'share_pic';
			$note_values = array('url'=>"home.php?mod=space&uid=$pic[uid]&do=album&picid=$pic[picid]", 'albumname'=>$pic['albumname'], 'from_id' => $id, 'from_idtype' => 'picid');

			$hotarr = array('picid', $pic['picid'], $pic['hotuser']);

			break;

		case 'thread':

			$feed_hash_data = "tid{$id}";

			$actives = array('share' => ' class="active"');

			$thread = DB::fetch(DB::query("SELECT * FROM ".DB::table('forum_thread')." WHERE tid='$id'"));
			if(in_array($thread['displayorder'], array(-2, -3))) {
				showmessage('moderate_thread_not_share');
			}
			$posttable = getposttable();
			$post = DB::fetch(DB::query("SELECT * FROM ".DB::table($posttable)." WHERE tid='$id' AND first='1'"));

			$arr['title_template'] = lang('spacecp', 'share_thread');
			$arr['body_template'] = '<b>{subject}</b><br>{author}<br>{message}';
			$attachment = !preg_match("/\[hide=?\d*\](.*?)\[\/hide\]/is", $post['message'], $a) && preg_match("/\[attach\]\d+\[\/attach\]/i", $a[1]);
			$language = lang('forum/misc');
			$post['message'] = preg_replace(array($language['post_edithtml_regexp'],$language['post_editnobbcode_regexp'],$language['post_edit_regexp']), '', $post['message']);
			$arr['body_data'] = array(
				'subject' => "<a href=\"forum.php?mod=viewthread&tid=$id\">$thread[subject]</a>",
				'author' => "<a href=\"home.php?mod=space&uid=$thread[authorid]\">$thread[author]</a>",
				'message' => getstr($post['message'], 150, 0, 1, 0, -1)
			);
			$arr['itemid'] = $id;
			$arr['fromuid'] = $thread['uid'];
			$attachment = $attachment ? DB::fetch_first('SELECT attachment, isimage, thumb, remote FROM '.DB::table(getattachtablebytid($id))." WHERE tid='$id' AND isimage IN ('1', '-1') LIMIT 0,1") : false;
			if($attachment) {
				$arr['image'] = pic_get($attachment['attachment'], 'forum', $attachment['thumb'], $attachment['remote'], 1);
				$arr['image_link'] = "forum.php?mod=viewthread&tid=$id";
			}

			$note_uid = $thread['authorid'];
			$note_message = 'share_thread';
			$note_values = array('url'=>"forum.php?mod=viewthread&tid=$id", 'subject'=>$thread['subject'], 'from_id' => $id, 'from_idtype' => 'tid');
			break;

		case 'article':

			$feed_hash_data = "articleid{$id}";

			$query = DB::query("SELECT * FROM ".DB::table('portal_article_title')." WHERE aid='$id'");
			if(!$article = DB::fetch($query)) {
				showmessage('article_does_not_exist');
			}
			if(in_array($article['status'], array(1, 2))) {
				showmessage('moderate_article_not_share');
			}

			$arr['itemid'] = $id;
			$arr['fromuid'] = $article['uid'];
			$arr['title_template'] = lang('spacecp', 'share_article');
			$arr['body_template'] = '<b>{title}</b><br>{username}<br>{summary}';
			$arr['body_data'] = array(
			'title' => "<a href=\"portal.php?mod=view&aid=$article[aid]\">$article[title]</a>",
			'username' => "<a href=\"home.php?mod=space&uid=$article[uid]\">".$article['username']."</a>",
			'summary' => getstr($article['summary'], 150, 0, 1, 0, -1)
			);
			if($article['pic']) {
				$arr['image'] = pic_get($article['pic'], 'portal', $article['thumb'], $article['remote'], 1, 1);
				$arr['image_link'] = "portal.php?mod=view&aid=$article[aid]";
			}
			$note_uid = $article['uid'];
			$note_message = 'share_article';
			$note_values = array('url'=>"portal.php?mod=view&aid=$article[aid]", 'subject'=>$article['title'], 'from_id' => $id, 'from_idtype' => 'aid');

			break;
		default:

			$actives = array('share' => ' class="active"');

			$_G['refer'] = 'home.php?mod=space&uid='.$_G['uid'].'&do=share&view=me';
			$type = 'link';
			$_GET['op'] = 'link';
			$linkdefault = 'http://';
			$generaldefault = '';
			break;
	}

	$commentcable = array('blog' => 'blogid', 'pic' => 'picid', 'thread' => 'thread', 'article' => 'article');

	if(submitcheck('sharesubmit', 0, $seccodecheck, $secqaacheck)) {

		$magvalues = array();
		$redirecturl = '';
		$showmessagecontent = '';

		if($type == 'link') {
			$link = dhtmlspecialchars(trim($_POST['link']));
			if($link) {
				if(!preg_match("/^(http|ftp|https|mms)\:\/\/.{4,300}$/i", $link)) $link = '';
			}
			if(empty($link)) {
				showmessage('url_incorrect_format');
			}
			$arr['itemid'] = '0';
			$arr['fromuid'] = '0';
			$arr['title_template'] = lang('spacecp', 'share_link');
			$arr['body_template'] = '{link}';

			$link_text = sub_url($link, 45);

			$arr['body_data'] = array('link'=>"<a href=\"$link\" target=\"_blank\">$link_text</a>", 'data'=>$link);
			$parseLink = parse_url($link);
			require_once libfile('function/discuzcode');
			$flashvar = parseflv($link);
			if(empty($flashvar) && preg_match("/\.flv$/i", $link)) {
				$flashvar = array(
					'flv' => $_G['style']['imgdir'].'/flvplayer.swf?&autostart=true&file='.urlencode($link),
					'imgurl' => ''
				);
			}
			if(!empty($flashvar)) {
				$arr['title_template'] = lang('spacecp', 'share_video');
				$type = 'video';
				$arr['body_data']['flashvar'] = $flashvar['flv'];
				$arr['body_data']['host'] = 'flash';
				$arr['body_data']['imgurl'] = $flashvar['imgurl'];
			}
			if(preg_match("/\.(mp3|wma)$/i", $link)) {
				$arr['title_template'] = lang('spacecp', 'share_music');
				$arr['body_data']['musicvar'] = $link;
				$type = 'music';
			}
			if(preg_match("/\.swf$/i", $link)) {
				$arr['title_template'] = lang('spacecp', 'share_flash');
				$arr['body_data']['flashaddr'] = $link;
				$type = 'flash';
			}
		}

		if($_G['gp_iscomment'] && $_POST['general'] && $commentcable[$type] && $id) {

			$currenttype = $commentcable[$type];
			$currentid = $id;

			if($currenttype == 'article') {
				$article = DB::fetch_first("SELECT * FROM ".DB::table('portal_article_title')." WHERE aid='$currentid'");
				include_once libfile('function/portal');
				loadcache('portalcategory');
				$cat = $_G['cache']['portalcategory'][$article['catid']];
				$article['allowcomment'] = !empty($cat['allowcomment']) && !empty($article['allowcomment']) ? 1 : 0;
				if(!$article['allowcomment']) {
					showmessage('no_privilege_commentadd', '', array(), array('return' => true));
				}
				if($article['idtype'] == 'blogid') {
					$currentid = $article['id'];
					$currenttype = 'blogid';
				} elseif($article['idtype'] == 'tid') {
					$currentid = $article['id'];
					$currenttype = 'thread';
				}
			}

			if($currenttype == 'thread') {
				$_G['setting']['seccodestatus'] = 0;
				$_G['setting']['secqaa']['status'] = 0;

				$_POST['replysubmit'] = true;
				$_GET['tid'] = $currentid;
				$_G['gp_action'] = 'reply';
				$_G['gp_message'] = $_POST['general'];
				if($commentcable[$type] == 'article') {
					$_POST['portal_referer'] = 'portal.php?mod=view&aid='.$id;
				}

				include_once libfile('function/forum');
				require_once libfile('function/post');
				loadforum();

				$inspacecpshare = 1;

				include_once libfile('forum/post', 'module');
				$redirecturl = $url ? $url : '';
				$showmessagecontent = ($modnewreplies && $commentcable[$type] != 'article') ? 'do_success_thread_share_mod' : '';

			} elseif($currenttype == 'article') {

				if(!checkperm('allowcommentarticle')) {
					showmessage('group_nopermission', NULL, array('grouptitle' => $_G['group']['grouptitle']), array('login' => 1));
				}

				include_once libfile('function/spacecp');
				include_once libfile('function/portalcp');

				cknewuser();

				$waittime = interval_check('post');
				if($waittime > 0) {
					showmessage('operating_too_fast', '', array('waittime' => $waittime), array('return' => true));
				}

				$aid = intval($currentid);
				$message = $_POST['general'];

				$retmessage = addportalarticlecomment($aid, $message);
				if($retmessage != 'do_success') {
					showmessage($retmessage);
				}

			} elseif($currenttype == 'picid' || $currenttype == 'blogid') {

				if(!checkperm('allowcomment')) {
					showmessage('no_privilege_comment', '', array(), array('return' => true));
				}
				cknewuser();
				$waittime = interval_check('post');
				if($waittime > 0) {
					showmessage('operating_too_fast', '', array('waittime' => $waittime), array('return' => true));
				}
				$message = getstr($_POST['general'], 0, 1, 1, 2);
				if(strlen($message) < 2) {
					showmessage('content_is_too_short', '', array(), array('return' => true));
				}
				include_once libfile('class/bbcode');
				$bbcode = & bbcode::instance();

				require_once libfile('function/comment');
				$cidarr = add_comment($message, $currentid, $currenttype, 0);
				if($cidarr['cid']) {
					$magvalues['cid'] = $cidarr['cid'];
					$magvalues['id'] = $currentid;
				}
			}
			$magvalues['type'] = $commentcable[$type];
		}

		$arr['body_general'] = getstr($_POST['general'], 150, 1, 1, 1);
		$arr['body_general'] = censor($arr['body_general']);
		if(censormod($arr['body_general']) || $_G['group']['allowsharemod']) {
			$arr['status'] = 1;
		} else {
			$arr['status'] = 0;
		}

		$arr['type'] = $type;
		$arr['uid'] = $_G['uid'];
		$arr['username'] = $_G['username'];
		$arr['dateline'] = $_G['timestamp'];


		if($arr['status'] == 0 && ckprivacy('share', 'feed')) {
			require_once libfile('function/feed');
			feed_add('share',
				'{actor} '.$arr['title_template'],
				array('hash_data' => $feed_hash_data),
				$arr['body_template'],
				$arr['body_data'],
				$arr['body_general'],
				array($arr['image']),
				array($arr['image_link'])
			);
		}

		$arr['body_data'] = serialize($arr['body_data']);

		$setarr = daddslashes($arr);
		$sid = DB::insert('home_share', $setarr, 1);

		switch($type) {
			case 'space':
				DB::query("UPDATE ".DB::table('common_member_status')." SET sharetimes=sharetimes+1 WHERE uid='$id'");
				break;
			case 'blog':
				DB::query("UPDATE ".DB::table('home_blog')." SET sharetimes=sharetimes+1 WHERE blogid='$id'");
				break;
			case 'album':
				DB::query("UPDATE ".DB::table('home_album')." SET sharetimes=sharetimes+1 WHERE albumid='$id'");
				break;
			case 'pic':
				DB::query("UPDATE ".DB::table('home_pic')." SET sharetimes=sharetimes+1 WHERE picid='$picid'");
				break;
			case 'thread':
				DB::query("UPDATE ".DB::table('forum_thread')." SET sharetimes=sharetimes+1 WHERE tid='$id'");
				if($_G['setting']['heatthread']['type'] == 2) {
					require_once libfile('function/forum');
					update_threadpartake($id);
				}
				break;
			case 'article':
				DB::query("UPDATE ".DB::table('portal_article_count')." SET sharetimes=sharetimes+1 WHERE aid='$id'");
				break;
		}

		if($arr['status'] == 1) {
			updatemoderate('sid', $sid);
			manage_addnotify('verifyshare');
		}

		if($type == 'link' || !DB::result_first("SELECT COUNT(*) FROM ".DB::table('home_share')." WHERE uid='$_G[uid]' AND itemid='$id' AND type='$type'")) {
			include_once libfile('function/stat');
			updatestat('share');
		}

		if($note_uid && $note_uid != $_G['uid']) {
			notification_add($note_uid, 'sharenotice', $note_message, $note_values);
		}

		$needle = $id ? $type.$id : '';
		updatecreditbyaction('createshare', $_G['uid'], array('sharings' => 1), $needle);

		$referer = "home.php?mod=space&uid=$_G[uid]&do=share&view=$_GET[view]&from=$_GET[from]";
		$magvalues['sid'] = $sid;

		if(!$redirecturl) {
			$redirecturl = dreferer();
		}
		if(!$showmessagecontent) {
			$showmessagecontent = 'do_success';
		}
		showmessage($showmessagecontent, $redirecturl, $magvalues, ($_G['inajax'] && $_GET['view'] != 'me' ? array('showdialog'=>1, 'showmsg' => true, 'closetime' => true) : array()));
	}

	$arr['body_data'] = serialize($arr['body_data']);

	require_once libfile('function/share');
	$arr = mkshare($arr);
	$arr['dateline'] = $_G['timestamp'];
}

if($type != 'link') {
	if(DB::result_first("SELECT COUNT(*) FROM ".DB::table('home_share')." WHERE uid='$_G[uid]' AND itemid='$id' AND type='$type'")) {
		showmessage('spacecp_share_repeat');
	}
}

$share_count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('home_share')." WHERE itemid='$id' AND type='$type'");
include template('home/spacecp_share');
?>