<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: email.php 12304 2009-06-03 07:29:34Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

if($space['emailcheck']) {

	$task['done'] = 1;// Task is completed

} else {

	// Task completion wizard
	$task['guide'] = lang('email_task_wizard');

}

