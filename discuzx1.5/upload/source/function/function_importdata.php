<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_importdata.php 16208 2010-09-02 02:14:54Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

function import_smilies() {
	$smileyarray = getimportdata('Discuz! Smilies');

	$renamed = 0;
	if(DB::result_first("SELECT COUNT(*) FROM ".DB::table('forum_imagetype')." WHERE type='smiley' AND name='$smileyarray[name]'")) {
		$smileyarray['name'] .= '_'.random(4);
		$renamed = 1;
	}
	DB::query("INSERT INTO ".DB::table('forum_imagetype')." (name, type, directory)
		VALUES ('$smileyarray[name]', 'smiley', '$smileyarray[directory]')");
	$typeid = DB::insert_id();

	foreach($smileyarray['smilies'] as $key => $smiley) {
		DB::query("INSERT INTO ".DB::table('common_smiley')." (type, typeid, displayorder, code, url)
			VALUES ('smiley', '$typeid', '$smiley[displayorder]', '', '$smiley[url]')");
	}
	DB::query("UPDATE ".DB::table('common_smiley')." SET code=CONCAT('{:', typeid, '_', id, ':}') WHERE typeid='$typeid'");

	updatecache(array('smileytypes', 'smilies', 'smileycodes', 'smilies_js'));
	return $renamed;
}

function import_styles($ignoreversion = 1, $dir = '', $restoreid = 0, $updatecache = 1) {
	global $_G, $importtxt, $stylearray;
	if(!isset($dir)) {
		$stylearrays = array(getimportdata('Discuz! Style'));
	} else {
		if(!$restoreid) {
			$dir = str_replace(array('/', '\\'), '', $dir);
			$templatedir = DISCUZ_ROOT.'./template/'.$dir;
		} else {
			$templatedir = DISCUZ_ROOT.$dir;
		}
		$searchdir = dir($templatedir);
		$stylearrays = array();
		while($searchentry = $searchdir->read()) {
			if(substr($searchentry, 0, 13) == 'discuz_style_' && fileext($searchentry) == 'xml') {
				$importfile = $templatedir.'/'.$searchentry;
				$importtxt = implode('', file($importfile));
				$stylearrays[] = getimportdata('Discuz! Style');
			}
		}
	}

	foreach($stylearrays as $stylearray) {
		if(empty($ignoreversion) && strip_tags($stylearray['version']) != strip_tags($_G['setting']['version'])) {
			cpmsg('styles_import_version_invalid', '', 'error', array('cur_version' => $stylearray['version'], 'set_version' => $_G['setting']['version']));
		}

		if(!$restoreid) {
			$renamed = 0;
			if($stylearray['templateid'] != 1) {
				$templatedir = DISCUZ_ROOT.'./'.$stylearray['directory'];
				if(!is_dir($templatedir)) {
					if(!@mkdir($templatedir, 0777)) {
						$basedir = dirname($stylearray['directory']);
						cpmsg('styles_import_directory_invalid', '', 'error', array('basedir' => $basedir, 'directory' => $stylearray['directory']));
					}
				}

				if(!($templateid = DB::result_first("SELECT templateid FROM ".DB::table('common_template')." WHERE name='$stylearray[tplname]'"))) {
					DB::query("INSERT INTO ".DB::table('common_template')." (name, directory, copyright)
						VALUES ('$stylearray[tplname]', '$stylearray[directory]', '$stylearray[copyright]')");
					$templateid = DB::insert_id();
				}
			} else {
				$templateid = 1;
			}

			if(DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_style')." WHERE name='$stylearray[name]'")) {
				$stylearray['name'] .= '_'.random(4);
				$renamed = 1;
			}
			DB::query("INSERT INTO ".DB::table('common_style')." (name, templateid)
				VALUES ('$stylearray[name]', '$templateid')");
			$styleidnew = DB::insert_id();
		} else {
			$styleidnew = $restoreid;
			DB::query("DELETE FROM ".DB::table('common_stylevar')." WHERE styleid='$styleidnew'");
		}

		foreach($stylearray['style'] as $variable => $substitute) {
			$substitute = @htmlspecialchars($substitute);
			DB::query("INSERT INTO ".DB::table('common_stylevar')." (styleid, variable, substitute)
				VALUES ('$styleidnew', '$variable', '$substitute')");
		}
	}

	if($updatecache) {
		updatecache('styles');
		updatecache('setting');
	}
	return $renamed;
}

?>