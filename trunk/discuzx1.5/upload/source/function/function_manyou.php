<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_manyou.php 17426 2010-10-19 02:39:34Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


function manyou_getuserapp($panel = 0) {
	global $_G;

	$panelapp = $_G['my_menu'] = $userapplist = $_G['my_panelapp'] = array();
	$showcount = $_G['my_menu_more'] = 0;

	if($_G['uid'] && $_G['setting']['my_app_status']) {
		space_merge($_G['member'], 'field_home');
		if($_G['member']['menunum'] < 3) $_G['member']['menunum'] = 10;
		$query = DB::query("SELECT ua.*, my.iconstatus, my.userpanelarea FROM ".DB::table('home_userapp')." ua LEFT JOIN ".DB::table('common_myapp')." my USING(appid) WHERE ua.uid='$_G[uid]' ORDER BY ua.menuorder DESC");
		while($value = DB::fetch($query)) {
			$value['icon'] = getmyappiconpath($value['appid'], $value['iconstatus']);
			if($value['iconstatus']=='0' && empty($_G['myapp_icon_downloaded'])) {
				$_G['myapp_icon_downloaded'] = '1';
				downloadmyappicon($value['appid']);
			}
			if($value['allowsidenav'] && !empty($value['appname'])) {

				$_G['my_userapp'][$value['appid']] = $value;
				if($panel) {
					$userapplist[$value['appid']] = $value;
					if($value['userpanelarea'] && $value['userpanelarea'] < 3) {
						$panelapp[$value['appid']] = $value;
						$_G['my_panelapp'][$value['userpanelarea']][$value['appid']] = $value;
					}
				} else {
					if(!isset($_G['cache']['userapp'][$value['appid']])) {
						if($_G['member']['menunum'] > 100 || $showcount < $_G['member']['menunum']) {
							$_G['my_menu'][] = $value;
							$showcount++;
						} else {
							$_G['my_menu_more'] = 1;
						}
					}
				}
			}

		}
		if(!empty($userapplist)) {
			foreach($panelapp as $appid => $value) {
				if(isset($_G['cache']['userapp'][$value['appid']])) {
					unset($_G['cache']['userapp'][$appid]);
				}
			}
			foreach($userapplist as $appid => $value) {
				if(!isset($_G['cache']['userapp'][$value['appid']]) && !isset($panelapp[$value['appid']])) {
					if($_G['member']['menunum'] > 100 || $showcount < $_G['member']['menunum']) {
						$_G['my_menu'][] = $value;
						$showcount++;
					} else {
						$_G['my_menu_more'] = 1;
						break;
					}
				}
			}
		}
	}
}

function downloadmyappicon($appid) {
	$iconpath = getglobal('setting/attachdir').'./'.'myapp/icon/'.$appid.'.jpg';
	if(!is_dir(dirname($iconpath))) {
		dmkdir(dirname($iconpath));
	}
	DB::update('common_myapp', array('iconstatus'=>'-1'), array('appid'=>$appid));
	$icondata = file_get_contents(getmyappiconpath($appid, 0));
	if($icondata) {
		file_put_contents($iconpath, $icondata);
		DB::update('common_myapp', array('iconstatus'=>'1', 'icondowntime'=>TIMESTAMP), array('appid'=>$appid));
	}
}