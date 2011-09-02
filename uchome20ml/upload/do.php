<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: do.php 12354 2009-06-11 08:14:06Z liguode $
*/

include_once('./common.php');

//Get method
$ac = empty($_GET['ac'])?'':$_GET['ac'];

//Custom login
if($ac == $_SCONFIG['login_action']) {
	$ac = 'login';
} elseif($ac == 'login') {
	$ac = '';
}
if($ac == $_SCONFIG['register_action']) {
	$ac = 'register';
} elseif($ac == 'register') {
	$ac = '';
}

//Allowed methods
$acs = array('login', 'register', 'lostpasswd', 'swfupload', 'inputpwd',
	'ajax', 'seccode', 'sendmail', 'stat', 'emailcheck');
if(empty($ac) || !in_array($ac, $acs)) {
	showmessage('enter_the_space', 'index.php', 0);
}

//URL
$theurl = 'do.php?ac='.$ac;

include_once(S_ROOT.'./source/do_'.$ac.'.php');

