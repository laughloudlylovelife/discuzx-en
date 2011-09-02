<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_privacy.php 12210 2009-05-21 07:05:38Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

if(submitcheck('privacysubmit')) {

	// privacy 
	foreach ($_POST['privacy']['view'] as $key => $value) {
		$space['privacy']['view'][$key] = intval($value);
	}
	// make feed 
	$space['privacy']['feed'] = array();
	foreach ($_POST['privacy']['feed'] as $key => $value) {
		$space['privacy']['feed'][$key] = 1;
	}
	privacy_update();

	//Change History
	if($_SCONFIG['my_status']) inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
	showmessage('do_success', 'cp.php?ac=privacy');

} elseif(submitcheck('privacy2submit')) {

	//Type Filter
	$space['privacy']['filter_icon'] = array();
	foreach ($_POST['privacy']['filter_icon'] as $key => $value) {
		$space['privacy']['filter_icon'][$key] = 1;
	}
	// user  groups set
	$space['privacy']['filter_gid'] = array();
	foreach ($_POST['privacy']['filter_gid'] as $key => $value) {
		$space['privacy']['filter_gid'][$key] = intval($value);
	}
	
	// notice Filter
	$space['privacy']['filter_note'] = array();
	foreach ($_POST['privacy']['filter_note'] as $key => $value) {
		$space['privacy']['filter_note'][$key] = 1;
	}
		
	privacy_update();

	// update Friend cache
	friend_cache($_SGLOBAL['supe_uid']);

	showmessage('do_success', 'cp.php?ac=privacy&op=view');
}

if($_GET['op'] == 'view') {
	//Friend groups 
	$groups = getfriendgroup();

	//Filter
	$filter_icons = empty($space['privacy']['filter_icon'])?array():$space['privacy']['filter_icon'];
	$filter_note = empty($space['privacy']['filter_note'])?array():$space['privacy']['filter_note'];
	$iconnames = $appids = $icons = $uids = $users = array();
	foreach ($filter_icons as $key => $value) {
		list($icon, $uid) = explode('|', $key);
		$icons[$key] = $icon;
		$uids[$key] = $uid;
		if(is_numeric($icon)) {
			$appids[$key] = $icon;
		}
	}
	// notice Order
	foreach ($filter_note as $key => $value) {
		list($type, $uid) = explode('|', $key);
		$types[$key] = $type;
		$uids[$key] = $uid;
		if(is_numeric($type)) {
			$appids[$key] = $type;
		}
	}
	if($uids) {
		$query = $_SGLOBAL['db']->query("SELECT uid, username FROM ".tname('space')." WHERE uid IN (".simplode($uids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$users[$value['uid']] = $value['username'];
		}
	}
	//Get application name
	if($appids) {
		$query = $_SGLOBAL['db']->query("SELECT appid, appname FROM ".tname('myapp')." WHERE appid IN (".simplode($appids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$iconnames[$value['appid']] = $value['appname'];
		}
	}
	
	$cat_actives = array('view' => ' class="active"');

} elseif ($_GET['op'] == 'getgroup') {

	$gid = empty($_GET['gid'])?0:intval($_GET['gid']);
	$users = array();
	$query = $_SGLOBAL['db']->query("SELECT fusername FROM ".tname('friend')." WHERE uid='$_SGLOBAL[supe_uid]' AND status='1' AND gid='$gid'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$users[] = $value['fusername'];
	}
	$ustr = empty($users)?'':shtmlspecialchars(implode(' ', $users));
	showmessage($ustr);//Return

} else {

	//Page options
	$_GET['op'] = '';

	$sels = array();
	foreach ($space['privacy']['view'] as $key => $value) {
		$sels['view'][$key] = array($value => ' selected');
	}
	foreach ($space['privacy']['feed'] as $key => $value) {
		$sels['feed'][$key] = ' checked';
	}
	
	$cat_actives = array('base' => ' class="active"');
}

$actives = array('privacy' =>' class="active"');

include template('cp_privacy');

?>