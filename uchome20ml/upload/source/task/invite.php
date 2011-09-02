<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: invite.php 12304 2009-06-03 07:29:34Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//User tasks to complete identification variable 	$task['done']
//Task is completed the results html stored variable 	$task['result']
//User task wizard html stored variable		 	$task['guide']

$query = $_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('invite')." WHERE uid='$space[uid]' AND fuid>'0'");
$count = $_SGLOBAL['db']->result($query, 0);

if($count >= 10) {
	
	$task['done'] = 1;//Task completed

} else {

	//Task completion wizard
	if($count) {
		$task['guide'] .= lang('invite_task_warn1').$count.lang('invite_task_warn2');
	}
	$task['guide'] .= lang('invite_task_guide');

}

