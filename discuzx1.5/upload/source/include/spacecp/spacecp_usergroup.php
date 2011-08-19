<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: spacecp_usergroup.php 17230 2010-09-27 03:50:59Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$do = in_array($_G['gp_do'], array('buy', 'exit', 'switch', 'list', 'forum', 'expiry')) ? trim($_G['gp_do']) : 'usergroup';

$extgroupids = $_G['member']['extgroupids'] ? explode("\t", $_G['member']['extgroupids']) : array();
space_merge($space, 'count');
$credits = $space['credits'];
$forumselect = '';
$activeus = array();
$activeus[$do] = ' class="a"';

if(in_array($do, array('buy', 'exit'))) {
	$groupid = intval($_G['gp_groupid']);

	$group = DB::fetch_first("SELECT groupid, type, system, grouptitle FROM ".DB::table('common_usergroup')." WHERE groupid='$groupid' AND type='special' AND system<>'private' AND radminid='0'");
	if(empty($group)) {
		showmessage('undefined_action');
	}
	$join = !in_array($group['groupid'], $extgroupids);
	$group['dailyprice'] = $group['minspan'] = 0;

	if($group['system'] != 'private') {
		list($group['dailyprice'], $group['minspan']) = explode("\t", $group['system']);
		if($group['dailyprice'] > -1 && $group['minspan'] == 0) {
			 $group['minspan'] = 1;
		}
	}
	$creditstrans = $_G['setting']['creditstrans'];
	if(!isset($_G['setting']['creditstrans'])) {
		showmessage('credits_transaction_disabled');
	}

	if(!submitcheck('buysubmit')) {
		$usermoney = $space['extcredits'.$creditstrans];
		$usermaxdays = $group['dailyprice'] > 0 ? round($usermoney / $group['dailyprice']) : 0;
		$group['minamount'] = $group['dailyprice'] * $group['minspan'];
	} else {
		$groupterms = unserialize(DB::result_first("SELECT groupterms FROM ".DB::table('common_member_field_forum')." WHERE uid='$_G[uid]'"));
		require_once libfile('function/forum');
		if($join) {
			$extgroupidsarray = array();
			foreach(array_unique(array_merge($extgroupids, array($groupid))) as $extgroupid) {
				if($extgroupid) {
					$extgroupidsarray[] = $extgroupid;
				}
			}
			$extgroupidsnew = implode("\t", $extgroupidsarray);
			if($group['dailyprice']) {
				if(($days = intval($_G['gp_days'])) < $group['minspan']) {
					showmessage('usergroups_span_invalid', '', array('minspan' => $group['minspan']));
				}

				if($space['extcredits'.$creditstrans] - ($amount = $days * $group['dailyprice']) < ($minbalance = 0)) {
					showmessage('credits_balance_insufficient', '', array('title'=> $_G['setting']['extcredits'][$creditstrans]['title'],'minbalance' => $minbalance));
				}

				$groupexpirynew = TIMESTAMP + $days * 86400;
				$groupterms['ext'][$groupid] = $groupexpirynew;

				$groupexpirynew = groupexpiry($groupterms);

				DB::query("UPDATE ".DB::table('common_member')." SET groupexpiry='$groupexpirynew', extgroupids='$extgroupidsnew' WHERE uid='$_G[uid]'");
				updatemembercount($_G['uid'], array('extcredits'.$creditstrans => "-$amount"));

				DB::query("UPDATE ".DB::table('common_member_field_forum')." SET groupterms='".addslashes(serialize($groupterms))."' WHERE uid='$_G[uid]'");

			} else {
				DB::query("UPDATE ".DB::table('common_member')." SET extgroupids='$extgroupidsnew' WHERE uid='$_G[uid]'");
			}

			showmessage('usergroups_join_succeed', "home.php?mod=spacecp&ac=usergroup&perms=$_G[gp_perms]&tab=$_G[gp_tab]", array('group' => $group['grouptitle']), array('showdialog' => 3, 'showmsg' => true, 'locationtime' => true));

		} else {

			if($groupid != $_G['groupid']) {
				if(isset($groupterms['ext'][$groupid])) {
					unset($groupterms['ext'][$groupid]);
				}
				$groupexpirynew = groupexpiry($groupterms);
				DB::query("UPDATE ".DB::table('common_member_field_forum')." SET groupterms='".addslashes(serialize($groupterms))."' WHERE uid='$_G[uid]'");
			} else {
				$groupexpirynew = 'groupexpiry';
			}

			$extgroupidsarray = array();
			foreach($extgroupids as $extgroupid) {
				if($extgroupid && $extgroupid != $groupid) {
					$extgroupidsarray[] = $extgroupid;
				}
			}
			$extgroupidsnew = implode("\t", array_unique($extgroupidsarray));
			DB::query("UPDATE ".DB::table('common_member')." SET groupexpiry='$groupexpirynew', extgroupids='$extgroupidsnew' WHERE uid='$_G[uid]'");

			showmessage('usergroups_exit_succeed', "home.php?mod=spacecp&ac=usergroup&perms=$_G[gp_perms]&tab=$_G[gp_tab]", array('group' => $group['grouptitle']), array('showdialog' => 3, 'showmsg' => true, 'locationtime' => true));

		}

	}

} elseif($do == 'switch') {

	$groupid = intval($_G['gp_groupid']);
	if(!in_array($groupid, $extgroupids)) {
		showmessage('undefined_action', NULL, 'HALTED');
	}
	$group = DB::fetch_first("SELECT * FROM ".DB::table('common_usergroup')." WHERE groupid='$groupid'");
	if(submitcheck('groupsubmit')) {
		$extgroupidsnew = $_G['groupid'];
		foreach($extgroupids as $extgroupid) {
			if($extgroupid && $extgroupid != $groupid) {
				$extgroupidsnew .= "\t".$extgroupid;
			}
		}

		DB::query("UPDATE ".DB::table('common_member')." SET groupid='$groupid', adminid='$group[radminid]', extgroupids='$extgroupidsnew' WHERE uid='$_G[uid]'");
		showmessage('usergroups_switch_succeed', "home.php?mod=spacecp&ac=usergroup&perms=$_G[gp_perms]&tab=$_G[gp_tab]", array('group' => $group['grouptitle']), array('showdialog' => 3, 'showmsg' => true, 'locationtime' => true));
	}

} elseif($do == 'forum') {

	if($_G['setting']['verify']['enabled']) {
		$myverify= array();
		getuserprofile('verify1');
		for($i = 1; $i < 6; $i++) {
			if($_G['member']['verify'.$i] == 1) {
				$myverify[] = $i;
			}
		}
		$ar = array(1, 2, 3, 4, 5);
	}
	$language = lang('forum/misc');
	$permlang = $language;
	loadcache('forums');
	$fids = array_keys($_G['cache']['forums']);
	$perms = array('viewperm', 'postperm', 'replyperm', 'getattachperm', 'postattachperm', 'postimageperm');
	$defaultperm = array(
		array('viewperm' => 1, 'postperm' => 0, 'replyperm' => 0, 'getattachperm' => 1, 'postattachperm' => 0, 'postimageperm' => 0),
		array('viewperm' => 1, 'postperm' => 1, 'replyperm' => 1, 'getattachperm' => 1, 'postattachperm' => 1, 'postimageperm' => 1),
	);
	if($_G['setting']['verify']['enabled']) {
		for($i = 1; $i < 6; $i++) {
			if($_G['setting']['verify'][$i]['available']) {
				$verifyicon[$i] = !empty($_G['setting']['verify'][$i]['icon']) ? '<img src="'.$_G['setting']['verify'][$i]['icon'].'" alt="'.$_G['setting']['verify'][$i]['title'].'" class="vm" title="'.$_G['setting']['verify'][$i]['title'].'" />' : $_G['setting']['verify'][$i]['title'];
			}
		}
	}
	$forumperm = $verifyperm = $myverifyperm = array();
	$query = DB::query("SELECT fid, viewperm, postperm, replyperm, getattachperm, postattachperm, postimageperm FROM ".DB::table('forum_forumfield')." WHERE fid IN (".dimplode($fids).")");
	while($forum = DB::fetch($query)) {
		foreach($perms as $perm) {
			if($forum[$perm]) {
				if($_G['setting']['verify']['enabled']) {
					for($i = 1; $i < 6; $i++) {
						$verifyperm[$forum['fid']][$perm] .= preg_match("/(^|\t)(v".$i.")(\t|$)/", $forum[$perm]) ? $verifyicon[$i] : '';
						if(in_array($i, $myverify)) {
							$myverifyperm[$forum['fid']][$perm] = 1;
						}
					}
				}
				$forumperm[$forum['fid']][$perm] = preg_match("/(^|\t)(".$_G['groupid'].")(\t|$)/", $forum[$perm]) ? 1 : 0;
			} else {
				$forumperm[$forum['fid']][$perm] = $defaultperm[$_G['groupid'] != 7 ? 1 : 0][$perm];
			}
		}
	}

} elseif($do == 'expiry') {

	if(!$_G['member']['groupexpiry']) {
		showmessage('group_expiry_disabled');
	}

	$groupterms = unserialize(DB::result_first("SELECT groupterms FROM ".DB::table('common_member_field_forum')." WHERE uid='$_G[uid]'"));

	$expgrouparray = $expirylist = $termsarray = array();

	if(!empty($groupterms['ext']) && is_array($groupterms['ext'])) {
		$termsarray = $groupterms['ext'];
	}
	if(!empty($groupterms['main']['time']) && (empty($termsarray[$_G['groupid']]) || $termsarray[$_G['groupid']] > $groupterm['main']['time'])) {
		$termsarray[$_G['groupid']] = $groupterms['main']['time'];
	}

	foreach($termsarray as $expgroupid => $expiry) {
		if($expiry <= TIMESTAMP) {
			$expgrouparray[] = $expgroupid;
		}
	}

	if(!empty($groupterms['ext'])) {
		foreach($groupterms['ext'] as $extgroupid => $time) {
			$expirylist[$extgroupid] = array('time' => dgmdate($time, 'd'), 'type' => 'ext');
		}
	}

	if(!empty($groupterms['main'])) {
		$expirylist[$_G['groupid']] = array('time' => dgmdate($groupterms['main']['time'], 'd'), 'type' => 'main');
	}

	if($expirylist) {
		$query = DB::query("SELECT groupid, grouptitle FROM ".DB::table('common_usergroup')." WHERE groupid IN (".dimplode(array_keys($expirylist)).")");
		while($group = DB::fetch($query)) {
			$expirylist[$group['groupid']]['grouptitle'] = in_array($group['groupid'], $expgrouparray) ? '<s>'.$group['grouptitle'].'</s>' : $group['grouptitle'];
		}
	} else {
		DB::query("UPDATE ".DB::table('common_member')." SET groupexpiry='0' WHERE uid='$_G[uid]'");
	}

	if($expgrouparray) {

		$extgroupidarray = array();
		foreach(explode("\t", $_G['forum_extgroupids']) as $extgroupid) {
			if(($extgroupid = intval($extgroupid)) && !in_array($extgroupid, $expgrouparray)) {
				$extgroupidarray[] = $extgroupid;
			}
		}

		$groupidnew = $_G['groupid'];
		$adminidnew = $_G['adminid'];
		foreach($expgrouparray as $expgroupid) {
			if($expgroupid == $_G['groupid']) {
				if(!empty($groupterms['main']['groupid'])) {
					$groupidnew = $groupterms['main']['groupid'];
					$adminidnew = $groupterms['main']['adminid'];
				} else {
					$groupidnew = DB::result_first("SELECT groupid FROM ".DB::table('common_usergroup')." WHERE type='member' AND '".$_G['member']['credits']."'>=creditshigher AND '$credits'<creditslower LIMIT 1");
					if(in_array($_G['adminid'], array(1, 2, 3))) {
						$query = DB::query("SELECT groupid FROM ".DB::table('common_usergroup')." WHERE groupid IN (".dimplode($extgroupidarray).") AND radminid='$_G[adminid]' LIMIT 1");
						$adminidnew = (DB::num_rows($query)) ? $_G['adminid'] : 0;
					} else {
						$adminidnew = 0;
					}
				}
				unset($groupterms['main']);
			}
			unset($groupterms['ext'][$expgroupid]);
		}

		require_once libfile('function/forum');
		$groupexpirynew = groupexpiry($groupterms);
		$extgroupidsnew = implode("\t", $extgroupidarray);
		$grouptermsnew = addslashes(serialize($groupterms));

		DB::query("UPDATE ".DB::table('common_member')." SET adminid='$adminidnew', groupid='$groupidnew', extgroupids='$extgroupidsnew', groupexpiry='$groupexpirynew' WHERE uid='$_G[uid]'");
		DB::query("UPDATE ".DB::table('common_member_field_forum')." SET groupterms='$grouptermsnew' WHERE uid='$_G[uid]'");

	}

} else {

	$language = lang('forum/misc');
	$permlang = $language;
	unset($language);
	$maingroup = $_G['group'];
	$ptype = in_array($_G['gp_ptype'], array(0, 1, 2)) ? intval($_G['gp_ptype']) : 0;
	foreach($_G['cache']['usergroups'] as $gid => $value) {
		$cachekey[] = 'usergroup_'.$gid;
	}
	loadcache($cachekey);
	$_G['group'] = $maingroup;
	$sidegroup = $usergroups = $activegs = array();
	$nextupgradeid = $nextexist = 0;
	$groupterms = unserialize(DB::result_first("SELECT groupterms FROM ".DB::table('common_member_field_forum')." WHERE uid='$_G[uid]'"));

	$switchmaingroup = $_G['group']['grouppublic'] || isset($groupterms['ext']) ? 1 : 0;
	foreach($_G['cache']['usergroups'] as $gid => $group) {
		$group['grouptitle'] = strip_tags($group['grouptitle']);
		if($group['type'] == 'special') {
			$type = $_G['cache']['usergroup_'.$gid]['radminid'] ? 'admin' : 'user';
		} elseif($group['type'] == 'system') {
			$type = $_G['cache']['usergroup_'.$gid]['radminid'] ? 'admin' : 'user';
		} elseif($group['type'] == 'member') {
			$type = 'upgrade';
		}
		if($nextupgradeid && $group['type'] == 'member') {
			$_G['gp_gid'] = $gid;
			$nextupgradeid = 0;
		}
		$g = '<a href="home.php?mod=spacecp&ac=usergroup&gid='.$gid.'"'.(!empty($_G['gp_gid']) && $_G['gp_gid'] == $gid ? ' class="xi1"' : '').'>'.$group['grouptitle'].'</a>';
		if(in_array($gid, $extgroupids)) {
			$usergroups['my'] .= $g;
		}
		$usergroups[$type] .= $g;
		if(!empty($_G['gp_gid']) && $_G['gp_gid'] == $gid) {
			$switchtype = $type;
			if(!empty($_GET['gid'])) {
				$activegs[$switchtype] = ' a';
			}
			$currentgrouptitle = $group['grouptitle'];
			$sidegroup = $_G['cache']['usergroup_'.$gid];
			if($_G['cache']['usergroup_'.$gid]['radminid']) {
				$admingids[] = $gid;
			}
		} elseif(empty($_G['gp_gid']) && $_G['groupid'] == $gid && $group['type'] == 'member') {
			$nextupgradeid = 1;
		}
	}
	$usergroups['my'] = '<a href="home.php?mod=spacecp&ac=usergroup">'.$maingroup['grouptitle'].'</a>'.$usergroups['my'];
	if($activegs == array()) {
		$activegs['my'] = ' a';
	}

	$bperms = array('allowvisit','readaccess','allowinvisible','allowsearch','allowcstatus','disablepostctrl');
	$pperms = array('allowpost','allowreply','allowpostpoll','allowvote','allowpostreward','allowpostactivity','allowpostdebate','allowposttrade','maxsigsize','allowsigbbcode','allowsigimgcode','allowrecommend');
	$aperms = array('allowgetattach', 'allowpostattach', 'allowsetattachperm', 'maxattachsize', 'maxsizeperday', 'maxattachnum', 'attachextensions');
	$sperms = array('maxspacesize', 'allowblog', 'allowdoing', 'allowupload', 'allowshare', 'allowpoke', 'allowfriend', 'allowclick', 'allowmyop', 'allowcomment', 'allowstatdata', 'allowpostarticle');

	$allperms = array();
	$allkey = array_merge($bperms, $pperms, $aperms, $sperms);
	if($sidegroup) {
		foreach($allkey as $pkey) {
			if(in_array($pkey, array('maxattachsize', 'maxsizeperday', 'maxspacesize'))) {
				$sidegroup[$pkey] = $sidegroup[$pkey] ? sizecount($sidegroup[$pkey]) : 0;
			}
			$allperms[$pkey][$sidegroup['groupid']] = $sidegroup[$pkey];
		}
	}

	foreach($maingroup as $pkey => $v) {
		if(in_array($pkey, array('maxattachsize', 'maxsizeperday', 'maxspacesize'))) {
			$maingroup[$pkey] = $maingroup[$pkey] ? sizecount($maingroup[$pkey]) : 0;
		}
	}

	$publicgroup = array();
	$extgroupids[] = $_G['groupid'];
	$query = DB::query("SELECT * FROM ".DB::table('common_usergroup')." WHERE (type='special' AND system<>'private' AND radminid='0') OR groupid IN (".dimplode(array_unique($extgroupids)).") ORDER BY type, system");
	while($group = DB::fetch($query)) {
		$group['allowsetmain'] = in_array($group['groupid'], $extgroupids);
		$publicgroup[$group['groupid']] = $group;
	}
	$_G['gp_perms'] = 'member';
	if($sidegroup) {
		$group = $sidegroup;
	}
}

include_once template("home/spacecp_usergroup");

?>