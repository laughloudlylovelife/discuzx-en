<?php
/*
   [Discuz!] (C)2001-2009 Comsenz Inc.
   This is NOT a freeware, use is subject to license terms

   $Id: connect.php 22700 2011-05-18 01:18:15Z fengning $
*/

define('IN_CONNECT', 1);

if($_GET['mod'] == 'register') {
	$_GET['mod'] = 'connect';
	$_GET['action'] = 'register';
	require_once 'member.php';
	exit;
}

define('APPTYPEID', 126);
define('CURSCRIPT', 'connect');

require_once './source/class/class_core.php';
require_once './source/function/function_home.php';

$discuz = & discuz_core::instance();

$mod = $discuz->var['mod'];
$discuz->init();

if(!in_array($mod, array('config', 'login', 'feed'))) {
	showmessage('undefined_action');
}

if(!$_G['setting']['connect']['allow']) {
	showmessage('qqconnect_closed');
}

define('CURMODULE', $mod);
runhooks();

require_once libfile('connect/'.$mod, 'module');
?>