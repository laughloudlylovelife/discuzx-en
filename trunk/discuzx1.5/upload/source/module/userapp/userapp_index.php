<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: userapp_index.php 17155 2010-09-25 05:55:18Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(empty($_GET['view'])) {
	$_GET['view'] = 'all';
}

$perpage = $_G['setting']['feedmaxnum'] < 50 ? 50 : $_G['setting']['feedmaxnum'];

$page = intval($_GET['page']);
if($page < 1) $page = 1;
$start = ($page-1) * $perpage;

ckstart($start, $perpage);



$_G['home_today'] = strtotime('today');

if(empty($_G['gp_view'])) $_G['gp_view'] = 'top';
space_merge($space, 'field_home');
if($_G['gp_view'] == 'top') {

	$today = strtotime(dgmdate($_G['timestamp'], 'Y-m-d'));
	$frienduseapp = $hotapp = $newapp = $todayhot = array();
	$query = DB::query("SELECT * FROM ".DB::table('common_myapp_count')." WHERE usedate='$today' ORDER BY todayuse DESC LIMIT 0,14");
	while ($value = DB::fetch($query)) {
		$value = array_merge($_G['cache']['myapp'][$value['appid']], $value);
		if(!empty($value['appname'])) {
			$todayhot[$value['appid']] = $value;
		}
	}

	$query = DB::query("SELECT * FROM ".DB::table('common_myapp_count')." ORDER BY dateline DESC LIMIT 0,10");
	while ($value = DB::fetch($query)) {
		$value = array_merge($_G['cache']['myapp'][$value['appid']], $value);
		if(!empty($value['appname'])) {
			$newapp[$value['appid']] = $value;
		}
	}

	$query = DB::query("SELECT * FROM ".DB::table('common_myapp_count')." ORDER BY usetotal DESC LIMIT 0,10");
	while ($value = DB::fetch($query)) {
		$value = array_merge($_G['cache']['myapp'][$value['appid']], $value);
		if(!empty($value['appname'])) {
			$hotapp[$value['appid']] = $value;
		}
	}

	$query = DB::query("SELECT * FROM ".DB::table('common_myapp_count')." WHERE girluse!='0' ORDER BY girluse DESC LIMIT 0,10");
	while ($value = DB::fetch($query)) {
		$value = array_merge($_G['cache']['myapp'][$value['appid']], $value);
		if(!empty($value['appname'])) {
			$girluseapp[$value['appid']] = $value;
		}
	}
	$query = DB::query("SELECT * FROM ".DB::table('common_myapp_count')." WHERE boyuse!='0' ORDER BY boyuse DESC LIMIT 0,10");
	while ($value = DB::fetch($query)) {
		$value = array_merge($_G['cache']['myapp'][$value['appid']], $value);
		if(!empty($value['appname'])) {
			$boyuseapp[$value['appid']] = $value;
		}
	}

} else {

	if ($_G['gp_view'] == 'all') {

		$wheresql = "1";
		$ordersql = "dateline DESC";
		$theurl = "userapp.php?view=all";
		$f_index = '';

	} else {

		if(empty($space['feedfriend'])) $_G['gp_view'] = 'me';

		if($_G['gp_view'] == 'me') {
			$wheresql = "uid='$space[uid]'";
			$ordersql = "dateline DESC";
			$theurl = "userapp.php?view=me";
			$f_index = '';

		} else {
			$wheresql = "uid IN ('0',$space[feedfriend])";
			$ordersql = "dateline DESC";
			$theurl = "userapp.php?view=we";
			$f_index = 'USE INDEX(dateline)';
			$_G['gp_view'] = 'we';
			$_G['home_tpl_hidden_time'] = 1;
		}
	}

	$icon = empty($_GET['icon'])?'':trim($_GET['icon']);
	if($icon) {
		$wheresql .= " AND icon='$icon'";
	}
	$multi = '';

	$feed_list = $appfeed_list = $hiddenfeed_list = $filter_list = $hiddenfeed_num = $icon_num = array();
	$count = $filtercount = 0;
	$query = DB::query("SELECT * FROM ".DB::table('home_feed_app')." $f_index
		WHERE $wheresql
		ORDER BY $ordersql
		LIMIT $start,$perpage");
	while ($value = DB::fetch($query)) {
		$feed_list[$value['icon']][] = $value;
		$count++;
	}
	$multi = simplepage($count, $perpage, $page, $theurl);
	require_once libfile('function/feed');

	$list = $filter_list = array();
	foreach ($feed_list as $key => $values) {
		$nowcount = 0;
		foreach ($values as $value) {
			$value = mkfeed($value);
			$nowcount++;
			if($nowcount>5 && empty($icon)) {
				break;
			}
			$list[$key][] = $value;
		}
	}
}
getuserapp();
$my_userapp = array();

if($_G['uid']) {
	if(is_array($_G['cache']['userapp'])) {
		foreach($_G['cache']['userapp'] as $value) {
			$my_userapp[$value['appid']] = $value;
		}
	}

	if(is_array($_G['my_userapp'])) {
		foreach($_G['my_userapp'] as $value) {
			$my_userapp[$value['appid']] = $value;
		}
	}
}

$actives = array((in_array($_G['gp_view'], array('we', 'me', 'all', 'hot', 'top')) ? $_G['gp_view'] : 'top') => ' class="a"');
if($_G['gp_view'] != 'top') {
	$navtitle = lang('core', 'title_userapp_index_'.$_G['gp_view']).' - '.$navtitle;
}

$metakeywords = $_G['setting']['seokeywords']['userapp'];
if(!$metakeywords) {
	$metakeywords = $_G['setting']['navs'][5]['navname'];
}

$metadescription = $_G['setting']['seodescription']['userapp'];
if(!$metadescription) {
	$metadescription = $_G['setting']['navs'][5]['navname'];
}

include_once template("userapp/userapp_index");
?>