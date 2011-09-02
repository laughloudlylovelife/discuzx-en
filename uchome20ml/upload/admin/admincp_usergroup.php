<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp_usergroup.php 12592 2009-07-09 07:49:22Z liguode $
*/

if(!defined('IN_UCHOME') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

// Check Permissions
if(!checkperm('manageusergroup')) {
	cpmessage('no_authority_management_operation');
}

// Get Single Data
$thevalue = $list = array();
$_GET['gid'] = empty($_GET['gid'])?0:intval($_GET['gid']);
if($_GET['gid']) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('usergroup')." WHERE gid='$_GET[gid]'");
	if(!$thevalue = $_SGLOBAL['db']->fetch_array($query)) {
		cpmessage('user_group_does_not_exist');
	}
	$thevalue['magicaward'] = unserialize($thevalue['magicaward']);
}

if(submitcheck('thevaluesubmit')) {

	// user group name 
	$_POST['set']['grouptitle'] = shtmlspecialchars($_POST['set']['grouptitle']);
	if(empty($_POST['set']['grouptitle'])) cpmessage('user_group_were_not_empty');
	$setarr = array('grouptitle' => $_POST['set']['grouptitle']);

	// system 
	if(isset($thevalue['system'])) {
		$_POST['set']['system'] = $thevalue['system'];
	} else {
		$_POST['set']['system'] = intval($_POST['set']['system']);
	}
	if(empty($_POST['set']['system'])) {
		// ordinary user groups 
		$_POST['set']['explower'] = empty($_POST['set']['explower'])?0:intval($_POST['set']['explower']);
		if($_POST['set']['explower'] > 999999999 || $_POST['set']['explower'] < -999999999) cpmessage('integral_limit_error');
		$lowgid = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT gid FROM ".tname('usergroup')." where explower = '{$_POST['set']['explower']}'  AND system='0'"), 0);
		if(!empty($lowgid) && $lowgid != $_GET['gid']) {
			cpmessage('integral_limit_duplication_with_other_user_group');
		} 
		$setarr['explower'] = $_POST['set']['explower'];
	} else {
		// system user groups 
		$setarr['system'] = 1;
	}
	if($thevalue['system'] == '-1') {
		$setarr['system'] = -1;
	}
	
	//Magic Award
	$setarr['magicaward'] = array();
	if(!empty($_POST['magicaward'])) {
		foreach ($_POST['magicaward'] as $value) {
			list($mid, $num) = explode(',', $value);
			$setarr['magicaward'][$mid] = array('mid'=>$mid, 'num'=>$num);
		}
	}
	$setarr['magicaward'] = serialize($setarr['magicaward']);
	
	//More Permissions
	$perms = array_keys($_POST['set']);
	$nones = array('gid', 'grouptitle', 'system', 'explower');
	foreach ($perms as $value) {
		if(!in_array($value, $nones)) {
			$_POST['set'][$value] = trim($_POST['set'][$value]);
			if($thevalue[$value] != $_POST['set'][$value]) {
				$setarr[$value] = $_POST['set'][$value];
			}
		}
	}
	
	if(empty($thevalue['gid'])) {
		// add 
		inserttable('usergroup', $setarr);
	} else {
		// update 
		updatetable('usergroup', $setarr, array('gid'=>$thevalue['gid']));
	}
	
	groupcredit_update();

	// Update Cache
	include_once(S_ROOT.'./source/function_cache.php');
	usergroup_cache();

	cpmessage('do_success', 'admincp.php?ac=usergroup');
} elseif (submitcheck('updatesubmit')) {
	//Determine whether there is minimum duplication
	if(count($_POST['explower']) != count(array_unique($_POST['explower']))) {
		cpmessage('integral_limit_duplication_with_other_user_group');
	} else {
		if(!empty($_POST['explower'])) {
			$oldexplower = array();
			$query = $_SGLOBAL['db']->query("SELECT gid, explower FROM ".tname('usergroup'));
			while($thevalue = $_SGLOBAL['db']->fetch_array($query)) {
				$oldexplower[$thevalue['gid']] = $thevalue['explower'];
			}
			foreach($_POST['explower'] as $gidkey=>$gidvalue) {
				//With the original user groups points Comparison, whether there update 
				if($gidvalue == $oldexplower[$gidkey]) {
					continue;
				} else {
					if($gidvalue > 999999999 || $gidvalue < -999999999) cpmessage('integral_limit_error');
					$_SGLOBAL['db']->query("UPDATE ".tname('usergroup')." SET explower = '$gidvalue' WHERE gid='$gidkey'");
				}
			}
		}
		cpmessage('do_success', 'admincp.php?ac=usergroup');
	}
} elseif(submitcheck('copysubmit')) {
	//Remove not used variables
	unset($thevalue['grouptitle']);
	unset($thevalue['gid']);
	unset($thevalue['explower']);
	
	$thevalue['magicaward'] = serialize($thevalue['magicaward']);
	
	$copyvalue = saddslashes($thevalue);
	foreach($_POST['aimgroup'] as $key => $value) {
		$groupid = intval($value);
		updatetable('usergroup', $copyvalue, array('gid'=>$groupid));
	}
	// Update Cache
	include_once(S_ROOT.'./source/function_cache.php');
	usergroup_cache();

	cpmessage('do_success', 'admincp.php?ac=usergroup');
}

if(empty($_GET['op'])) {
	
	// browse list 
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('usergroup')." ORDER BY explower");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$list[$value['system']][] = $value;
	}
	
	$actives = array('view' => ' class="active"');
	
} elseif ($_GET['op'] == 'add') {
	// add 
	$thevalue = array('gid' => 0, 'explower'=>0, 'maxattachsize'=>'10', 'maxfriendnum'=>50, 'postinterval'=>60, 'searchinterval'=>60, 'domainlength'=>0);
	include_once(S_ROOT . "./data/data_magic.php");
	
} elseif ($_GET['op'] == 'edit') {
	// edit 
	include_once(S_ROOT . "./data/data_magic.php");
	
} elseif ($_GET['op'] == 'copy') {
	// copy 
	$system = $thevalue['system'];
	$from = $thevalue['grouptitle'];
	$gid = $thevalue['gid'];
	$thevalue = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('usergroup')." WHERE gid!='$gid' AND system='$system' ORDER BY explower");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$grouparr[] = $value;
	}
} elseif ($_GET['op'] == 'delete' && $thevalue) {

	// delete 
	if(empty($thevalue['system'])) {

		// delete 
		$_SGLOBAL['db']->query("DELETE FROM ".tname('usergroup')." WHERE gid='$_GET[gid]'");

		groupcredit_update();
		
	} elseif($thevalue['system'] == '1') {
		// delete 
		$_SGLOBAL['db']->query("DELETE FROM ".tname('usergroup')." WHERE gid='$_GET[gid]'");
	} else {
		cpmessage('system_user_group_could_not_be_deleted');
	}

	// update user permissions 
	updatetable('space', array('groupid'=>0), array('groupid'=>$_GET['gid']));

	// Update Cache
	include_once(S_ROOT.'./source/function_cache.php');
	usergroup_cache();

	cpmessage('do_success', 'admincp.php?ac=usergroup');
}

function groupcredit_update() {
	global $_SGLOBAL;
	
	//Start with -999999999
	$lowergid = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT gid FROM ".tname('usergroup')." WHERE system='0' ORDER BY explower LIMIT 1"), 0);
	if($lowergid) updatetable('usergroup', array('explower'=>'-999999999'), array('gid'=>$lowergid));

}

