<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: misc_ajax.php 20804 2011-03-04 04:54:20Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$op = empty($_GET['op'])?'':$_GET['op'];

if($op == 'comment') {

	$cid = empty($_GET['cid'])?0:intval($_GET['cid']);

	if($cid) {
		$cidsql = "cid='$cid' AND";
		$ajax_edit = 1;
	} else {
		$cidsql = '';
		$ajax_edit = 0;
	}

	$list = array();
	$query = DB::query("SELECT * FROM ".DB::table('home_comment')." WHERE $cidsql authorid='$_G[uid]' ORDER BY dateline DESC LIMIT 0,1");
	while ($value = DB::fetch($query)) {
		$list[] = $value;
	}



} elseif($op == 'getfriendgroup') {

	$uid = intval($_GET['uid']);
	if($_G['uid'] && $uid) {
		$space = getspace($_G['uid']);
		$query = DB::query("SELECT * FROM ".DB::table('home_friend')." WHERE uid='$_G[uid]' AND fuid='$uid'");
		$value = DB::fetch($query);
	}

	require_once libfile('function/friend');
	$groups = friend_group_list();

	if(empty($value['gid'])) $value['gid'] = 0;
	$group =$groups[$value['gid']];

} elseif($op == 'getfriendname') {

	$groupname = '';
	$group = intval($_GET['group']);

	if($_G['uid'] && $group) {
		require_once libfile('function/friend');
		$groups = friend_group_list();
		$groupname = $groups[$group];
	}

} elseif($op == 'share') {

	require_once libfile('function/share');

	$list = array();
	$query = DB::query("SELECT * FROM ".DB::table('home_share')." WHERE uid='$_G[uid]' ORDER BY dateline DESC LIMIT 0,1");
	while ($value = DB::fetch($query)) {
		$value = mkshare($value);
		$ajax_edit = 1;
		$list[] = $value;
	}

} elseif($op == 'album') {

	$id = empty($_GET['id'])?0:intval($_GET['id']);

	$perpage = 10;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	$start = ($page-1)*$perpage;
	ckstart($start, $perpage);

	if(empty($_G['uid'])) {
		showmessage('to_login', null, array(), array('showmsg' => true, 'login' => 1));
	}

	$count = getcount('home_pic', array('albumid'=>$id, 'uid'=>$_G['uid']));
	$piclist = array();
	$multi = '';
	if($count) {
		$query = DB::query("SELECT * FROM ".DB::table('home_pic')." WHERE albumid='$id' AND uid='$_G[uid]' ORDER BY dateline DESC LIMIT $start,$perpage");
		while ($value = DB::fetch($query)) {
			$value['bigpic'] = pic_get($value['filepath'], 'album', $value['thumb'], $value['remote'], 0);
			$value['pic'] = pic_get($value['filepath'], 'album', $value['thumb'], $value['remote']);
			$piclist[] = $value;
		}
		$multi = multi($count, $perpage, $page, "home.php?mod=misc&ac=ajax&op=album&id=$id");
	}

} elseif($op == 'docomment') {

	$doid = intval($_GET['doid']);
	$clist = $do = array();
	$icon = $_GET['icon'] == 'plus' ? 'minus' : 'plus';
	if($doid) {
		$query = DB::query("SELECT * FROM ".DB::table('home_doing')." WHERE doid='$doid'");
		if ($value = DB::fetch($query)) {
			$value['icon'] = 'plus';
			if($value['replynum'] > 0 && ($value['replynum'] < 20 || $doid == $value['doid'])) {
				$doids[] = $value['doid'];
				$value['icon'] = 'minus';
			} elseif($value['replynum']<1) {
				$value['icon'] = 'minus';
			}
			$value['id'] = 0;
			$value['layer'] = 0;
			$clist[] = $value;
		}
	}

	if($_GET['icon'] == 'plus' && $value['replynum']) {

		require_once libfile('class/tree');

		$tree = new tree();

		$query = DB::query("SELECT * FROM ".DB::table('home_docomment')." WHERE doid='$doid' ORDER BY dateline");
		while ($value = DB::fetch($query)) {

			if(empty($value['upid'])) {
				$value['upid'] = "do";
			}
			$tree->setNode($value['id'], $value['upid'], $value);
		}

		$values = $tree->getChilds("do");
		foreach ($values as $key => $id) {
			$one = $tree->getValue($id);
			$one['layer'] = $tree->getLayer($id) * 2;
			$clist[] = $one;
		}
	}



} elseif($op == 'deluserapp') {

	if(empty($_G['uid'])) {
		showmessage('no_privilege');
	}
	$hash = trim($_GET['hash']);
	$query = DB::query("SELECT * FROM ".DB::table('common_myinvite')." WHERE hash='$hash' AND touid='$_G[uid]'");
	if($value = DB::fetch($query)) {
		DB::query("DELETE FROM ".DB::table('common_myinvite')." WHERE hash='$hash' AND touid='$_G[uid]'");

		$myinvitenum = getcount('common_myinvite', array('touid'=>$_G['uid']));

		space_merge($space, 'status');
		$changenum = $myinvitenum - $space['myinvitations'];
		member_status_update($_G['uid'], array('myinvitations'=>$changenum));

		showmessage('do_success');
	} else {
		showmessage('no_privilege');
	}
} elseif($op == 'getreward') {
	$reward = '';
	if($_G['cookie']['reward_log']) {
		$log = explode(',', $_G['cookie']['reward_log']);
		if(count($log) == 2 && $log[1]) {

			loadcache('creditrule');
			$query = DB::query("SELECT * FROM ".DB::table('common_credit_rule_log')." WHERE clid='$log[1]'");
			$creditlog = DB::fetch($query);
			$rule = $_G['cache']['creditrule'][$log[0]];
			$rule['cyclenum'] = $rule['rewardnum']? $rule['rewardnum'] - $creditlog['cyclenum'] : 0;
		}
		dsetcookie('reward_log', '');
	}

} elseif($op == 'district') {
	$container = $_GET['container'];
	$showlevel = intval($_GET['level']);
	$showlevel = $showlevel >= 1 && $showlevel <= 4 ? $showlevel : 4;
	$values = array(intval($_GET['pid']), intval($_GET['cid']), intval($_GET['did']), intval($_GET['coid']));
	$level = 1;
	$containertype = substr($container, 0, 5);
	if($values[0]) {
		$level++;
	} else if($_G['uid']) {
		space_merge($_G['member'], 'profile');

		$district = array();
		if($containertype == 'birth') {
			if(!empty($_G['member']['birthprovince'])) {
				$district[] = $_G['member']['birthprovince'];
				if(!empty($_G['member']['birthcity'])) {
					$district[] = $_G['member']['birthcity'];
				}
			}
		} else {
			if(!empty($_G['member']['resideprovince'])) {
				$district[] = $_G['member']['resideprovince'];
				if(!empty($_G['member']['residecity'])) {
					$district[] = $_G['member']['residecity'];
				}
				if(!empty($_G['member']['residedist'])) {
					$district[] = $_G['member']['residedist'];
				}
				if(!empty($_G['member']['residecommunity'])) {
					$district[] = $_G['member']['residecommunity'];
				}
			}
		}
		if(!empty($district)) {
			$query = DB::query('SELECT * FROM '.DB::table('common_district')." WHERE name IN (".dimplode(daddslashes($district)).')');
			while($value = DB::fetch($query)) {
				$key = $value['level'] - 1;
				$values[$key] = $value['id'];
			}
			$level++;
		}
	}
	if($values[1]) {
		$level++;
	}
	if($values[2]) {
		$level++;
	}
	if($values[3]) {
		$level++;
	}
	if($containertype == 'birth' && $level > 2) {
		$level = 2;
	}
	$showlevel = $level;
	$elems = array();
	if($_GET['province']) {
		$elems = array($_GET['province'], $_GET['city'], $_GET['district'], $_GET['community']);
	}

	include_once libfile('function/profile');
	$html = showdistrict($values, $elems, $container, $showlevel);
}

include template('home/misc_ajax');

?>