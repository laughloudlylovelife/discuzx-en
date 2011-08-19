<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: home_task.php 16614 2010-09-10 06:26:06Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once libfile('function/spacecp');

if(!$_G['setting']['taskon'] && $_G['adminid']  != 1) {
	showmessage('task_close');
}

require_once libfile('class/task');
$tasklib = & task::instance();

$id = intval($_G['gp_id']);
$do = empty($_GET['do']) ? '' : $_GET['do'];

if(empty($_G['uid'])) {
	showmessage('to_login', null, array(), array('showmsg' => true, 'login' => 1));
}

$navtitle = lang('core', 'title_task');

if(empty($do)) {

	$_G['gp_item'] = empty($_G['gp_item']) ? 'new' : $_G['gp_item'];
	$actives = array($_G['gp_item'] => ' class="a"');
	$tasklist = $tasklib->tasklist($_G['gp_item']);
	$listdata = $tasklib->listdata;
	if($_G['gp_item'] == 'doing' && empty($tasklist)) {
		dsetcookie('taskdoing_'.$_G['uid']);
	}

} elseif($do == 'view' && $id) {

	cleartaskstatus();
	$allowapply = $tasklib->view($id);
	$task = & $tasklib->task;
	$taskvars = & $tasklib->taskvars;

} elseif($do == 'apply' && $id) {

	if(!$_G['uid']) {
		showmessage('not_loggedin', NULL, array(), array('login' => 1));
	}

	$result = $tasklib->apply($id);

	if($result === -1) {
		showmessage('task_relatedtask', 'home.php?mod=task&do=view&id='.$tasklib->task['relatedtaskid']);
	} elseif($result === -2) {
		showmessage('task_grouplimit', 'home.php?mod=task&item=new');
	} elseif($result === -3) {
		showmessage('task_duplicate', 'home.php?mod=task&item=new');
	} elseif($result === -4) {
		showmessage('task_nextperiod', 'home.php?mod=task&item=new');
	} else {
		dsetcookie('taskdoing_'.$_G['uid'], 1, 7776000);
		showmessage('task_applied', 'home.php?mod=task&do=view&id='.$id);
	}

} elseif($do == 'draw' && $id) {

	if(!$_G['uid']) {
		showmessage('not_loggedin', NULL, array(), array('login' => 1));
	}

	$result = $tasklib->draw($id);
	if($result === -1) {
		showmessage('task_up_to_limit', 'home.php?mod=task', array('tasklimits' => $tasklib->task['tasklimits']));
	} elseif($result === -2) {
		showmessage('task_failed', 'home.php?mod=task&item=failed');
	} elseif($result === -3) {
		showmessage($tasklib->messagevalues['msg'], 'home.php?mod=task&do=view&id='.$id, $tasklib->messagevalues['values']);
	} else {
		cleartaskstatus();
		showmessage('task_completed', 'home.php?mod=task&item=done');
	}

} elseif($do == 'giveup' && $id) {

	$tasklib->giveup($id);
	showmessage('task_giveup', 'home.php?mod=task&item=view&id='.$id);

} elseif($do == 'parter' && $id) {

	$parterlist = $tasklib->parter($id);
	include template('home/space_task_parter');
	dexit();

} else {

	showmessage('undefined_action', NULL);

}

include template('home/space_task');

function cleartaskstatus() {
	global $_G;
	if(!DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_mytask')." WHERE uid='$_G[uid]' AND status='0'")) {
		dsetcookie('taskdoing_'.$_G['uid']);
	}
}

?>