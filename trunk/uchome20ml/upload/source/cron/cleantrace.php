<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cleantrace.php 11954 2009-04-17 09:29:53Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

// Clear footprint and the latest visitors
$maxday = 90;// Reservations 90 days
$deltime = $_SGLOBAL['timestamp'] - $maxday*3600*24;

// Clean up the footprints
$_SGLOBAL['db']->query("DELETE FROM ".tname('clickuser')." WHERE dateline < '$deltime'");

// Clean New Visitors
$_SGLOBAL['db']->query("DELETE FROM ".tname('visitor')." WHERE dateline < '$deltime'");

