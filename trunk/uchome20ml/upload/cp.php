<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp.php 13003 2009-08-05 06:46:06Z liguode $
*/

//Common files
include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./source/function_magic.php');

//Allowed methods
$acs = array('space', 'doing', 'upload', 'comment', 'blog', 'album', 'relatekw', 'common', 'class',
	'swfupload', 'thread', 'mtag', 'poke', 'friend',
	'avatar', 'profile', 'theme', 'import', 'feed', 'privacy', 'pm', 'share', 'advance', 'invite','sendmail',
	'userapp', 'task', 'credit', 'password', 'domain', 'event', 'poll', 'topic',
	'click','magic', 'top', 'videophoto');
$ac = (empty($_GET['ac']) || !in_array($_GET['ac'], $acs))?'profile':$_GET['ac'];
$op = empty($_GET['op'])?'':$_GET['op'];

//Check Permissions
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('cp.php?ac='.$ac));
	}

	if($op != 'changelng' && $op != 'changetpl') { //vot
		showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
	}
}

// Get the Space Info
$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	if($op != 'changelng' && $op != 'changetpl') { //vot
		showmessage('space_does_not_exist');
	}
}

// Check for site closed
if(!in_array($ac, array('common', 'pm'))) {
	checkclose();
	// Check for the Space is locked
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	//Check for access disabled
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
	// Check for Application permission
	if($ac =='userapp' && !checkperm('allowmyop')) {
		showmessage('no_privilege');
	}
}

//Menu
$actives = array($ac => ' class="active"');

include_once(S_ROOT.'./source/cp_'.$ac.'.php');

