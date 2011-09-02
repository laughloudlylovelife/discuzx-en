<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: blog.php 11056 2009-02-09 01:59:47Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$blogcount = getcount('blog', array('uid'=>$space['uid']));
if($blogcount) {

	$task['done'] = 1;// Task is completed

} else {

	// Task completion wizard
	$task['guide'] = lang('blog_task_wizard');

}

