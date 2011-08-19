<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: spacecp_feed.php 14940 2010-08-17 07:22:23Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$feedid = empty($_GET['feedid'])?0:intval($_GET['feedid']);
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page=1;

if($feedid) {
	$query = DB::query("SELECT * FROM ".DB::table('home_feed')." WHERE feedid='$feedid'");
	if(!$feed = DB::fetch($query)) {
		showmessage('feed_no_found');
	}
}

if(submitcheck('commentsubmit')) {

	if(empty($feed['id']) || empty($feed['idtype'])) {
		showmessage('non_normal_operation');
	}

	if($feed['idtype'] == 'doid') {

		$_GET['id'] = intval($_POST['cid']);
		$_GET['doid'] = $feed['id'];

		require_once libfile('spacecp/doing', 'include');

	} else {
		$_POST['id'] = $feed['id'];
		$_POST['idtype'] = $feed['idtype'];

		require_once libfile('spacecp/comment', 'include');
	}
}

if($_GET['op'] == 'delete') {
	if(submitcheck('feedsubmit')) {
		require_once libfile('function/delete');
		if(deletefeeds(array($feedid))) {
			showmessage('do_success', dreferer(), array('feedid' => $feedid));
		} else {
			showmessage('no_privilege');
		}
	}
} elseif($_GET['op'] == 'ignore') {

	$icon = empty($_GET['icon'])?'':preg_replace("/[^0-9a-zA-Z\_\-\.]/", '', $_GET['icon']);
	if(submitcheck('feedignoresubmit')) {
		$uid = empty($_POST['uid'])?0:intval($_POST['uid']);
		if($icon) {
			$icon_uid = $icon.'|'.$uid;
			if(empty($space['privacy']['filter_icon']) || !is_array($space['privacy']['filter_icon'])) {
				$space['privacy']['filter_icon'] = array();
			}
			$space['privacy']['filter_icon'][$icon_uid] = $icon_uid;
			privacy_update();
		}
		showmessage('do_success', dreferer(), array('feedid' => $feedid), array('showdialog'=>1, 'showmsg' => true, 'closetime' => true));
	}
} elseif($_GET['op'] == 'getapp') {

	$cp_mode = 1;
	$_GET['start'] = intval($_GET['start']);
	if($_GET['start'] < 1) {
		$_GET['start'] = $_G['setting']['feedmaxnum']<50?50:$_G['setting']['feedmaxnum'];
		$_GET['start'] = $_GET['start'] + 1;
	}
	$_G['home_tpl_getmore'] = 1;

	require_once libfile('userapp/index', 'include');

	include_once template('userapp_index');
	exit();

} elseif($_GET['op'] == 'getcomment') {

	if(empty($feed['id']) || empty($feed['idtype'])) {
		showmessage('non_normal_operation');
	}
	$feedid = $feed['feedid'];

	$list = array();
	$multi = '';

	if($feed['idtype'] == 'doid') {

		$_GET['doid'] = $feed['id'];
		require_once libfile('spacecp/doing', 'include');

	} else {

		$perpage = 5;
		$start = ($page-1)*$perpage;

		ckstart($start, $perpage);
		$count = getcount('home_comment', array('id'=>$feed['id'], 'idtype'=>$feed['idtype']));
		if($count) {
			$query = DB::query("SELECT * FROM ".DB::table('home_comment')."
				WHERE id='$feed[id]' AND idtype='$feed[idtype]'
				ORDER BY dateline
				LIMIT $start,$perpage");
			while ($value = DB::fetch($query)) {
				$list[] = $value;
			}
			$multi = multi($count, $perpage, $page, "home.php?mod=spacecp&ac=feed&op=getcomment&feedid=$feedid");
		}


	}
} elseif($_GET['op'] == 'menu') {

	$allowmanage = checkperm('managefeed');
	if(empty($feed['uid'])) {
		showmessage('non_normal_operation');
	}

} else {

	$url = "home.php?mod=space&uid=$feed[uid]&quickforward=1";
	switch ($feed['idtype']) {
		case 'doid':
			$url .= "&do=doing&id=$feed[id]";
			break;
		case 'blogid':
			$url .= "&do=blog&id=$feed[id]";
			break;
		case 'picid':
			$url .= "&do=album&picid=$feed[id]";
			break;
		case 'albumid':
			$url .= "&do=album&id=$feed[id]";
			break;
		case 'sid':
			$url .= "&do=share&id=$feed[id]";
			break;
		default:
			break;
	}
	dheader('location:'.$url);
}

include template('home/spacecp_feed');

?>