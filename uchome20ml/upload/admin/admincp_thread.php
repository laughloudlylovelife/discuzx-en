<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp_thread.php 12568 2009-07-08 07:38:01Z zhengqingpeng $
*/

if(!defined('IN_UCHOME') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$tagid = empty($_GET['tagid'])?0:intval($_GET['tagid']);

if(submitcheck('opsubmit')) {
	if($_POST['optype'] == 'delete') {
		include_once(S_ROOT.'./source/function_delete.php');
		if(!empty($_POST['ids']) && deletethreads($tagid, $_POST['ids'])) {
			cpmessage('do_success', $_POST['mpurl']);
		} else {
			cpmessage('choose_to_delete_the_topic', $_POST['mpurl']);
		}
	} elseif($_POST['optype'] == 'digest') {
		include_once(S_ROOT.'./source/function_op.php');
		if(!empty($_POST['ids']) && digestthreads($tagid, $_POST['ids'], $_POST['digestv'])) {
			cpmessage('do_success', $_POST['mpurl']);
		} else {
			cpmessage('choosing_to_operate_the_topic', $_POST['mpurl']);
		}
	} elseif($_POST['optype'] == 'top') {
		include_once(S_ROOT.'./source/function_op.php');
		if(!empty($_POST['ids']) && topthreads($tagid, $_POST['ids'], $_POST['topv'])) {
			cpmessage('do_success', $_POST['mpurl']);
		} else {
			cpmessage('choosing_to_operate_the_topic', $_POST['mpurl']);
		}
	} else {
		cpmessage('choice_batch_action');
	}
}

// Check Permissions
$managebatch = checkperm('managebatch');
$allowbatch = true;
$allowdt = 1;
$allowmanage = 0;
if(checkperm('managethread')) {
	$allowmanage = 1;
} else {
	// Main group
	if($tagid) {
		$grade = getcount('tagspace', array('tagid'=>$tagid, 'uid'=>$_SGLOBAL['supe_uid']), 'grade');
		if($grade >= 8) {
			//Whether enable manage members
			$allowmanage = 1;
			$managebatch = 1;
		}
	}
}
if(!$allowmanage) {
	$_GET['uid'] = $_SGLOBAL['supe_uid'];// For Admin Only
	$_GET['username'] = '';
	$allowdt = 0;
}

$mpurl = 'admincp.php?ac=thread';

// Search Processing
$intkeys = array('uid', 'tagid', 'digest', 'tid');
$strkeys = array('username');
$randkeys = array(array('sstrtotime','dateline'), array('intval','viewnum'), array('intval','replynum'), array('intval','hot'));
$likekeys = array('subject');
$results = getwheres($intkeys, $strkeys, $randkeys, $likekeys);
$wherearr = $results['wherearr'];

$wheresql = empty($wherearr)?'1':implode(' AND ', $wherearr);
$mpurl .= '&'.implode('&', $results['urls']);

// sort 
$orders = getorders(array('dateline', 'lastpost', 'viewnum', 'replynum', 'hot'), 'tid');
$ordersql = $orders['sql'];
if($orders['urls']) $mpurl .= '&'.implode('&', $orders['urls']);
$orderby = array($_GET['orderby']=>' selected');
$ordersc = array($_GET['ordersc']=>' selected');

//page displayed
$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
if(!in_array($perpage, array(20,50,100,1000))) $perpage = 20;

$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//Check start number
ckstart($start, $perpage);

//page displayed
if($perpage > 100) {
	$count = 1;
	$selectsql = 'tid';
} else {
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('thread')." WHERE $wheresql"), 0);
	$selectsql = '*';
}
$mpurl .= '&perpage='.$perpage;
$perpages = array($perpage => ' selected');

$list = array();
$multi = '';

$tags = $tagids = array();
if($count) {
	$query = $_SGLOBAL['db']->query("SELECT $selectsql FROM ".tname('thread')." WHERE $wheresql $ordersql LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!empty($value['tagid'])) $tagids[$value['tagid']] = $value['tagid'];
		$list[] = $value;
		if(!$managebatch && $value['uid'] != $_SGLOBAL['supe_uid']) {
			$allowbatch = false;
		}
	}
	
	if($tagids) {
		$query = $_SGLOBAL['db']->query("SELECT tagid, tagname FROM ".tname('mtag')." WHERE tagid IN (".simplode($tagids).")");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$tags[$value['tagid']] = $value['tagname'];
		}
	}
	$multi = multi($count, $perpage, $page, $mpurl);
}

//page displayed
if($perpage > 100) {
	$count = count($list);
}

