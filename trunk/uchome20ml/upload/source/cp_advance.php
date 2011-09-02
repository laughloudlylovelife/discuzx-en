<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_advance.php 11974 2009-04-22 07:29:40Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

define('IN_ADMINCP', TRUE); // Secondary login to use

/*
// Second login confirm (half hour)
$session = array();
$query = $_SGLOBAL['db']->query("SELECT errorcount FROM ".tname('adminsession')." WHERE uid='$_SGLOBAL[supe_uid]' AND dateline+1800>='$_SGLOBAL[timestamp]'");
$session = $_SGLOBAL['db']->fetch_array($query);
if($session['errorcount'] == -1) {
	// Login successful
	showmessage('do_success', 'admincp.php', 0);
}

include_once template("cp_advance");
*/

showmessage('do_success', 'admincp.php', 0);

