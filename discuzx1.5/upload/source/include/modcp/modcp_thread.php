<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: modcp_thread.php 16034 2010-08-31 03:13:53Z cnteacher $
 */

if(!defined('IN_DISCUZ') || !defined('IN_MODCP')) {
	exit('Access Denied');
}

$op = !in_array($op , array('thread', 'post')) ? 'thread' : $op;
$do = getgpc('do') ? dhtmlspecialchars(getgpc('do')) : '';

$modtpl = $op ==  'post' ? 'modcp_post' : 'modcp_thread';
$modtpl = 'forum/'.$modtpl;

$threadoptionselect = array('','','','','','', '', '', '', '', 999=>'', 888=>'');
$threadoptionselect[getgpc('threadoption')] = 'selected';


if($op == 'thread') {

	$result = array();

	foreach (array('threadoption', 'viewsless', 'viewsmore', 'repliesless', 'repliesmore', 'noreplydays') as $key) {
		$_G['gp_'.$key] = isset($_G['gp_'.$key]) && is_numeric($_G['gp_'.$key]) ? intval($_G['gp_'.$key]) : '';
		$result[$key] = $_G['gp_'.$key];
	}

	foreach (array('starttime', 'endtime', 'keywords', 'users') as $key) {
		$result[$key] = isset($_G['gp_'.$key]) ? dhtmlspecialchars($_G['gp_'.$key]) : '';
	}

	if($_G['fid'] && $_G['forum']['ismoderator']) {
		if($do == 'search' &&  submitcheck('submit')) {

			$sql = '';

			if($_G['gp_threadoption'] > 0 && $_G['gp_threadoption'] < 255) {
				$sql .= " AND special='$_G[gp_threadoption]'";
			} elseif($_G['gp_threadoption'] == 999) {
				$sql .= " AND digest in(1,2,3)";
			} elseif($_G['gp_threadoption'] == 888) {
				$sql .= " AND displayorder IN(1,2,3)";
			}

			$sql .= $_G['gp_viewsless'] !== ''? " AND views<='$_G[gp_viewsless]'" : '';
			$sql .= $_G['gp_viewsmore'] !== ''? " AND views>='$_G[gp_viewsmore]'" : '';
			$sql .= $_G['gp_repliesless'] !== ''? " AND replies<='$_G[gp_repliesless]'" : '';
			$sql .= $_G['gp_repliesmore'] !== ''? " AND replies>='$_G[gp_repliesmore]'" : '';
			$sql .= $_G['gp_noreplydays'] !== ''? " AND lastpost<='$_G[timestamp]'-'$_G[gp_noreplydays]'*86400" : '';
			$sql .= $_G['gp_starttime'] != '' ? " AND dateline>='".strtotime($_G['gp_starttime'])."'" : '';
			$sql .= $_G['gp_endtime'] != '' ? " AND dateline<='".strtotime($_G['gp_endtime'])."'" : '';

			if(trim($_G['gp_keywords'])) {
				$sqlkeywords = '';
				$or = '';
				$keywords = explode(',', str_replace(' ', '', $_G['gp_keywords']));
				for($i = 0; $i < count($keywords); $i++) {
					$sqlkeywords .= " $or subject LIKE '%".$keywords[$i]."%'";
					$or = 'OR';
				}
				$sql .= " AND ($sqlkeywords)";

				$keywords = implode(', ', $keywords);
			}

			if(trim($_G['gp_users'])) {
				$sql .= " AND author IN ('".str_replace(',', '\',\'', str_replace(' ', '', trim($_G['gp_users'])))."')";
			}

			if($sql) {

				$query = DB::query("SELECT tid FROM ".DB::table('forum_thread')." WHERE fid='$_G[fid]' AND displayorder>='0' $sql ORDER BY displayorder DESC, lastpost DESC LIMIT 1000");
				$tids = $comma = '';
				$count = 0;
				while($tid = DB::fetch($query)) {
					$tids .= $comma.$tid['tid'];
					$comma = ',';
					$count ++;
				}

				$result['tids'] = $tids;
				$result['count'] = $count;
				$result['fid'] = $_G['fid'];

				$modsession->set('srchresult', $result, true);

				DB::free_result($query);
				unset($result, $tids);
				$do = 'list';
				$page = 1;

			} else {
				$do = '';
			}
		}

		$page = $_G['page'];
		$total = 0;
		$query = $multipage = '';

		if(empty($do)) {

			$total = DB::result_first("SELECT count(*) FROM ".DB::table('forum_thread')." WHERE fid='$_G[fid]' AND displayorder>='0'");
			$tpage = ceil($total / $_G['tpp']);
			$page = min($tpage, $page);
			$multipage = multi($total, $_G['tpp'], $page, "$cpscript?mod=modcp&amp;action=$_G[gp_action]&amp;op=$op&amp;fid=$_G[fid]&amp;do=$do");
			if($total) {
				$start = ($page - 1) * $_G['tpp'];
				$query = DB::query("SELECT * FROM ".DB::table('forum_thread')." WHERE fid='$_G[fid]' AND displayorder>='0' ORDER BY displayorder DESC, lastpost DESC LIMIT $start, $_G[tpp]");
			}

		} else {

			$result = $modsession->get('srchresult');
			$threadoptionselect[$result['threadoption']] = 'selected';

			if($result['fid'] == $_G['fid']) {
				$total = $result['count'];
				$tpage = ceil($total / $_G['tpp']);
				$page = min($tpage, $page);
				$multipage = multi($total, $_G['tpp'], $page, "$cpscript?mod=modcp&amp;action=$_G[gp_action]&amp;op=$op&amp;fid=$_G[fid]&amp;do=$do");
				if($total) {
					$start = ($page - 1) * $_G['tpp'];
					$query = DB::query("SELECT * FROM ".DB::table('forum_thread')." WHERE tid in($result[tids]) ORDER BY lastpost DESC LIMIT $start, $_G[tpp]");
				}
			}
		}

		$postlist = array();
		if($query) {
			require_once libfile('function/misc');
			while ($thread = DB::fetch($query)) {
				$postlist[] = procthread($thread);
			}
		}
	}
	return;
}


if($op == 'post') {

	$error = 0;

	$result = array();

	$_G['gp_starttime'] = !preg_match("/^(0|\d{4}\-\d{1,2}\-\d{1,2})$/", getgpc('starttime')) ? dgmdate(TIMESTAMP - 86400 * ($_G['adminid'] == 2 ? 13 : ($_G['adminid'] == 3 ? 6 : 60)), 'Y-m-d') : getgpc('starttime');
	$_G['gp_endtime'] = $_G['adminid'] == 3 || !preg_match("/^(0|\d{4}\-\d{1,2}\-\d{1,2})$/", getgpc('endtime')) ? dgmdate(TIMESTAMP, 'Y-m-d') : getgpc('endtime');

	foreach (array('threadoption', 'starttime', 'endtime', 'keywords', 'users', 'useip') as $key) {
		$$key = isset($_G['gp_'.$key]) ? trim($_G['gp_'.$key]) : '';
		$result[$key] = dhtmlspecialchars($$key);
	}

	$threadoptionselect = range(1, 3);

	$fidadd = '';
	if($_G['fid'] && $modforums['list'][$_G['fid']]) {
		$fidadd = "AND fid='$_G[fid]'";
	} else {
		if($_G['adminid'] == 1 && $_G['adminid'] == $_G['groupid']) {
			$fidadd = '';
		} elseif(!$modforums['fids']) {
			$fidadd = 'AND 0 ';
		} else {
			$fidadd = "AND fid in($modforums[fids])";
		}
	}

	if($do == 'delete' && submitcheck('deletesubmit')) {

		if(!$_G['group']['allowmassprune']) {
			$error = 4;
			return;
		}

		$tidsdelete = $pidsdelete = '0';
		$prune = array('forums' => array(), 'thread' => array());

		if($pids = dimplode($_G['gp_delete'])) {
			$tidsdelete = $pidsdelete = '0';
			$postarray = getfieldsofposts('fid, tid, pid, first, authorid', "pid IN ($pids) $fidadd");
			foreach($postarray as $post) {
				$prune['forums'][] = $post['fid'];
				@$prune['thread'][$post['tid']]++;

				$pidsdelete .= ",$post[pid]";
				$tidsdelete .= $post['first'] ? ",$post[tid]" : '';
				if($post['first']) {
					my_thread_log('delete', array('tid' => $post['tid']));
				} else {
					my_post_log('delete', array('pid' => $post['pid']));
				}
			}
		}

		if($pidsdelete) {
			require_once libfile('function/post');

			if(!getgpc('nocredit')) {
				$postsarray = $tuidarray = $ruidarray = array();
				$postarray1 = getfieldsofposts('pid, first, authorid', "pid IN ($pidsdelete)");
				$postarray2 = getfieldsofposts('pid, first, authorid', "tid IN ($tidsdelete)");
				while((list($tmpkey, $post) = each($postarray1)) || (list($tmpkey, $post) = each($postarray2))) {
					$postsarray[$post['pid']] = $post;
				}
				foreach($postsarray as $post) {
					if($post['first']) {
						$tuidarray[] = $post['authorid'];
					} else {
						$ruidarray[] = $post['authorid'];
					}
				}
				if($tuidarray) {
					updatepostcredits('-', $tuidarray, 'post');
				}
				if($ruidarray) {
					updatepostcredits('-', $ruidarray, 'reply');
				}
			}

			require_once libfile('function/delete');
			$deletedposts = deletepost("pid IN ($pidsdelete)");
			$deletedposts += deletepost("tid IN ($tidsdelete)");
			$deletedthreads = deletethread("tid IN ($tidsdelete)");

			if(count($prune['thread']) < 50) {
				foreach($prune['thread'] as $tid => $decrease) {
					updatethreadcount($tid);
				}
			} else {
				$repliesarray = array();
				foreach($prune['thread'] as $tid => $decrease) {
					$repliesarray[$decrease][] = $tid;
				}
				foreach($repliesarray as $decrease => $tidarray) {
					DB::query("UPDATE ".DB::table('forum_thread')." SET replies=replies-$decrease WHERE tid IN (".implode(',', $tidarray).")");
				}
			}

			foreach(array_unique($prune['forums']) as $id) {
				updateforumcount($id);
			}

		}


		$do = 'list';
	}

	if($do == 'search' && submitcheck('searchsubmit', 1)) {

		if(($starttime == '0' && $endtime == '0') || ($keywords == '' && $useip == '' && $users == '')) {
			$error = 1;
			return ;
		}

		$sql = '';

		if($threadoption == 1) {
			$sql .= " AND first='1'";
		} elseif($threadoption == 2) {
			$sql .= " AND first='0'";
		}

		if($starttime != '0') {
			$starttime = strtotime($starttime);
			$sql .= " AND dateline>'$starttime'";
		}

		if($_G['adminid'] == 1 && $endtime != dgmdate(TIMESTAMP, 'Y-m-d')) {
			if($endtime != '0') {
				$endtime = strtotime($endtime);
				$sql .= " AND dateline<'$endtime'";
			}
		} else {
			$endtime = TIMESTAMP;
		}

		if(($_G['adminid'] == 2 && $endtime - $starttime > 86400 * 14) || ($_G['adminid'] == 3 && $endtime - $starttime > 86400 * 7)) {
			$error = '2';
			return;
		}

		if($users != '') {
			$comma = '';
			$uids = '';
			$query = DB::query("SELECT uid FROM ".DB::table('common_member')." WHERE username IN ('".str_replace(',', '\',\'', str_replace(' ', '', $users))."')");
			while($member = DB::fetch($query)) {
				$uids .= $comma.$member['uid'];
				$comma = ',';
			}
			if($uids != '') {
				$sql .= " AND authorid IN ($uids)";
			} else {
				$sql .= ' AND 0';
			}
		}

		if(trim($keywords)) {
			$sqlkeywords = '';
			$or = '';
			$keywords = explode(',', str_replace(' ', '', $keywords));
			for($i = 0; $i < count($keywords); $i++) {
				if(strlen($keywords[$i]) > 3) {
					$sqlkeywords .= " $or message LIKE '%".$keywords[$i]."%'";
					$or = 'OR';
				} else {
					$error = 3;
					return ;
				}
			}
			$sql .= " AND ($sqlkeywords)";
		}

		$useip = trim($useip);
		if($useip != '') {
			$sql .= " AND useip LIKE '".str_replace('*', '%', $useip)."'";
		}

		if($sql) {

			$postarray = getfieldsofposts('pid', "1 $fidadd $sql ORDER BY dateline DESC LIMIT 1000");
			$pids = $comma = '';
			$count = 0;
			foreach($postarray as $pid) {
				$pids .= $comma.$pid['pid'];
				$comma = ',';
				$count ++;
			}

			$result['pids'] = $pids;
			$result['count'] = $count;
			$result['fid'] = $_G['fid'];

			$modsession->set('srchresult_p'.$_G['fid'], $result, true);

			unset($result, $pids);
			$do = 'list';
			$page = 1;

		} else {
			$do = '';
		}
	}

	$page = max(1, intval($_G['page']));
	$total = 0;
	$query = $multipage = '';

	if($do == 'list') {

		$result = $modsession->get('srchresult_p'.$_G['fid']);
		$threadoptionselect[$result['threadoption']] = 'selected';

		if($result['fid'] == $_G['fid']) {
			$total = $result['count'];
			$tpage = ceil($total / $_G['tpp']);
			$page = min($tpage, $page);
			$multipage = multi($total, $_G['tpp'], $page, "$cpscript?mod=modcp&amp;action=$_G[gp_action]&amp;op=$op&amp;fid=$_G[fid]&amp;do=$do");
			if($total && $result['pids']) {
				$start = ($page - 1) * $_G['tpp'];
				$postarray = getallwithposts(array(
					'select' => 'p.*, t.subject as tsubject',
					'from' => DB::table('forum_post')." p LEFT JOIN ".DB::table('forum_thread')." t USING(tid)",
					'where' => "pid IN ($result[pids])",
					'order' => 'dateline DESC',
					'limit' => "$start, $_G[tpp]",
				));
			}
		}
	}

	$postlist = array();

	if($postarray) {
		require_once libfile('function/post');
		foreach($postarray as $post) {
			$post['dateline'] = dgmdate($post['dateline']);
			$post['message'] = messagecutstr($post['message'], 200);
			$post['forum'] = $modforums['list'][$post['fid']];
			$post['modthreadkey'] = modauthkey($post['tid']);
			$postlist[] = $post;
		}
	}

}

?>