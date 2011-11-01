<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp.php 13141 2009-08-13 01:48:28Z xupeng $
*/

define('IN_ADMINCP', TRUE);
include_once('./common.php');
include_once(S_ROOT.'./source/function_admincp.php');

//-------------------------------------
//vot: Added AdminCP Language File
include_once(S_ROOT.'language/'.$_SCONFIG['language'].'/lang_source.php');//vot

//DEBUG
//echo "path=".S_ROOT.'language/'.$_SC['language'].'/lang_admincp.php'."<br>";

//vot: Append the Admincp lang ($_SGLOBAL['admincplang'])
//     to the $_SGLOBAL['sourcelang'] for using lang() function
//include_once(S_ROOT.'language/'.$_SCONFIG['language'].'/lang_admincp.php');//vot
//$_SGLOBAL['sourcelang'] = array_merge($_SGLOBAL['sourcelang'], $_SGLOBAL['admincplang']);
//$_SGLOBAL['sourcelang'] = $_SGLOBAL['sourcelang'] + $_SGLOBAL['admincplang'];

//vot: remove the appended allready language array
//unset($_SGLOBAL['admincplang']);
//echo count($_SGLOBAL['sourcelang'])."<br>";
language_append('sourcelang','lang_admincp');

//-------------------------------------
// Check for site closed
checkclose();

// Check for logged in
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
	}
	showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
}

$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}

if(checkperm('banvisit')) {
	ckspacelog();
	showmessage('you_do_not_have_permission_to_visit');
}

$isfounder = ckfounder($_SGLOBAL['supe_uid']);

$acs = array(
	array('index','config', 'privacy', 'ip', 'spam', 'hotuser', 'defaultuser', 'usergroup', 'credit', 'magic', 'magiclog', 'profield', 'ad', 'userapp'),
	array('tag', 'mtag', 'event', 'report', 'space'),
	array('cache', 'network', 'profilefield', 'eventclass', 'click', 'task', 'censor', 'stat', 'block', 'cron', 'app', 'log'),
	array('feed', 'blog', 'album', 'pic', 'comment', 'thread', 'post', 'doing', 'share', 'poll')
);

if(!empty($_SC['allowedittpl']) && $isfounder) {
	$acs[2][] = 'template';
}

if($isfounder) {
	$acs[2][] = 'backup';
}

if(empty($_GET['ac']) || (!in_array($_GET['ac'], $acs[0]) && !in_array($_GET['ac'], $acs[1]) && !in_array($_GET['ac'], $acs[2]) && !in_array($_GET['ac'], $acs[3]))) {
	$ac = 'index';
} else {
	$ac = $_GET['ac'];
}

//Referer
if(!preg_match("/admincp\.php/", $_SGLOBAL['refer'])) $_SGLOBAL['refer'] = "admincp.php?ac=$ac";

//Menu Active Punkt Class
$menuactive = array($ac => ' class="active"');

// Permissions
$menus = array();
$needlogin = 0;

$m_groupid = $_SGLOBAL['member']['groupid'];
@include_once(S_ROOT.'./data/data_usergroup_'.$m_groupid.'.php');

$megroup = $_SGLOBAL['usergroup'][$m_groupid];
$megroup['manageuserapp'] = $megroup['manageapp'];

for($i=0; $i<3; $i++) {
	foreach ($acs[$i] as $value) {
		if($isfounder || $megroup['manageconfig'] || $megroup['manage'.$value]) {
			$needlogin = 1;
			$menus[$i][$value] = 1;
			$_SGLOBAL['usergroup'][$m_groupid]['manage'.$value] = 1;
		}
	}
}

// Space management
if($isfounder || $megroup['managename'] || $megroup['managespacegroup'] || $megroup['managespaceinfo'] || $megroup['managespacecredit'] || $megroup['managespacenote'] || $megroup['managedelspace']) {
	$needlogin = 1;
	$menus[1]['space'] = 1;
}

// Secondary logon confirmation (half hour)
if($needlogin) {
	$cpaccess = 0;
	$query = $_SGLOBAL['db']->query("SELECT errorcount FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]' AND dateline+1800>='$_SGLOBAL[timestamp]'");
	if($session = $_SGLOBAL['db']->fetch_array($query)) {
		if($session['errorcount'] == -1) {
			$_SGLOBAL['db']->query("UPDATE ".tname('adminsession')." SET dateline='$_SGLOBAL[timestamp]' WHERE uid='$_SGLOBAL[supe_uid]'");
			$cpaccess = 2;
		} elseif($session['errorcount'] <= 3) {
			$cpaccess = 1;
		}
	} else {
		$_SGLOBAL['db']->query("DELETE FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]' OR dateline+1800<'$timestamp'");
		$_SGLOBAL['db']->query("INSERT INTO ".tname('adminsession')." (uid, ip, dateline, errorcount)
			VALUES ('$_SGLOBAL[supe_uid]', '".getonlineip()."', '$_SGLOBAL[timestamp]', '0')");
		$cpaccess = 1;
	}
} else {
	$cpaccess = 2;
}

switch ($cpaccess) {
	case '1':// Can log on
		if(submitcheck('loginsubmit')) {
			if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
				$_SGLOBAL['db']->query("UPDATE ".tname('adminsession')." SET errorcount=errorcount+1 WHERE uid='$_SGLOBAL[supe_uid]'");
				cpmessage('enter_the_password_is_incorrect', 'admincp.php');
			} else {
				$_SGLOBAL['db']->query("UPDATE ".tname('adminsession')." SET errorcount='-1' WHERE uid='$_SGLOBAL[supe_uid]'");
				$refer = empty($_SCOOKIE['_refer'])?$_SGLOBAL['refer']:rawurldecode($_SCOOKIE['_refer']);
				if(empty($refer) || preg_match("/(login)/i", $refer)) {
					$refer = 'admincp.php';
				}
				ssetcookie('_refer', '');
				showmessage('login_success', $refer, 0);
			}
		} else {
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
			} else {
				ssetcookie('_refer', rawurlencode('admincp.php?ac='.$_GET['ac']));
			}
			$actives = array('advance' => ' class="active"');
			include template('cp_advance');
			exit();
		}
		break;
	case '2':// Login successful
		break;
	default:// Tried to login too many times
		cpmessage('excessive_number_of_attempts_to_sign');
		break;
}

if($ac == 'defaultuser') {
	$acfile = 'hotuser';
} else {
	$acfile = $ac;
}

// Remove Page Visit Restriction
$_SCONFIG['maxpage'] = 0;

//log
if($needlogin) {
	admincp_log();
}

// Remove the ads
$_SGLOBAL['ad'] = array();

//DEBUG
//echo "admincp.php started.<br>";
//echo "admincp.php acfile=".$acfile."<br>";

include_once(S_ROOT.'./admin/admincp_'.$acfile.'.php');

include_once template("admin/tpl/$acfile");

