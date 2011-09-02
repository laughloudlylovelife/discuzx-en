<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: friend.php 11056 2009-02-09 01:59:47Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

if($space['friendnum']>=5) {

	$task['done'] = 1;// Task completed

} else {

	// Task wizard
	$task['guide'] = lang('friend_task_wizard');

}

