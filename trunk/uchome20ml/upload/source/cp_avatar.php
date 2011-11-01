<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_avatar.php 13149 2009-08-13 03:11:26Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

if(submitcheck('avatarsubmit')) {
	showmessage('do_success', 'cp.php?ac=avatar', 0);
}

//Avatar
include_once S_ROOT.'./uc_client/client.php';
$uc_avatarflash = uc_avatar($_SGLOBAL['supe_uid'], (empty($_SCONFIG['avatarreal'])?'virtual':'real'));

//determine whether user avatar Is set
$setarr = array();
$avatar_exists = ckavatar($space['uid']);
if($avatar_exists) {
	if(!$space['avatar']) {
		// Bonus Points
		$reward = getreward('setavatar', 0);
		if($reward['credit']) {
			$setarr['credit'] = "credit=credit+$reward[credit]";
		}
		if($reward['experience']) {
			$setarr['experience'] = "experience=experience+$reward[experience]";
		}
		
		$setarr['avatar'] = 'avatar=1';
		$setarr['updatetime'] = "updatetime=$_SGLOBAL[timestamp]";
	}
} else {
	if($space['avatar']) {
		$setarr['avatar'] = 'avatar=0';
	}
}

if($setarr) {
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET ".implode(',', $setarr)." WHERE uid='$space[uid]'");
	//Change History
	if($_SCONFIG['my_status']) {
		inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp']), 0, true);
	}
}

include template("cp_avatar");

?>