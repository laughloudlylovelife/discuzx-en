<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_feed.php 10661 2008-12-12 02:39:36Z zhengqingpeng $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$eventid = isset($_GET['id']) ? intval($_GET['id']) : 0;
$view = isset($_GET['view']) ? $_GET['view'] : "all";

//  event  category 
if(!@include_once(S_ROOT.'./data/data_eventclass.php')) {
	include_once(S_ROOT.'./source/function_cache.php');
	eventclass_cache();
}

if($eventid){// ʾ event 

	if($view=="me"){//ųspace.phpԶ add $_GET[view]=me
		$view = "all";
	}

	//  event Ϣ
	$query = $_SGLOBAL['db']->query("SELECT e.*, ef.* FROM ".tname("event")." e LEFT JOIN ".tname("eventfield")." ef ON e.eventid=ef.eventid WHERE e.eventid='$eventid'");
	$event = $_SGLOBAL['db']->fetch_array($query);
	if(! $event){
		showmessage("event_does_not_exist"); //  event ڻ allready  delete 
	}
	if($event['grade'] == 0 && $event['uid'] != $_SGLOBAL['supe_uid'] && !checkperm('manageevent')){
		showmessage('event_under_verify');//  event 
	}
	realname_set($event['uid'], $event['username']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid='$eventid' AND uid='$_SGLOBAL[supe_uid]'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value){
		$_SGLOBAL['supe_userevent'] = $value;
	} else {
		$_SGLOBAL['supe_userevent'] = array();
	}
	$allowmanage = false; //  event  permissions 
	if($value['status'] >= 3 || checkperm('manageevent')){
		$allowmanage = true;
	}

	// ˽ event  allready μ event ˺й permissions ˻ invite ˿ɼ
	if($event['public'] == 0 && $_SGLOBAL['supe_userevent']['status'] < 2 && !$allowmanage){
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("eventinvite")." WHERE eventid = '$eventid' AND touid = '$_SGLOBAL[supe_uid]' LIMIT 1");
		$value = $_SGLOBAL['db']->fetch_array($query);
		if(empty($value)){
			showmessage("event_not_public"); // һ˽ event Ҫͨ invite ܲ鿴
		}
	}

	if($view == "thread" && !$event['tagid']) {
		$view = "all";
	}
	// 鿴ݲͬȡͬ
	if($view == "member"){
		// 鿴Ա
		$status = isset($_GET['status']) ? intval($_GET['status']) : 2;
		$submenus = array();
		if($status>1){
			$submenus['member']='class="active"';
		}elseif($status>0){
			$submenus['follow']=' class="active"';
		}elseif($status==0){
			$submenus['verify']=' class="active"';
		}

		$statussql = "";
		$orderby = " ORDER BY ue.dateline ASC";
		if($status >= 2){
			$statussql = " AND ue.status >= 2";//  groups ֯
			$orderby = " ORDER BY ue.status DESC";
		} else {
			$statussql = " AND ue.status = '$status'";
		}

		$filter = "";
		if($_GET['key']){
			$_GET['key'] = stripsearchkey($_GET['key']);
			$filter = " AND ue.username LIKE '%$_GET[key]%'";
		}

		$perpage = 10;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page=1;
		$start = ($page-1)*$perpage;

		//Check start number
		ckstart($start, $perpage);
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT count(*) FROM ".tname("userevent")." ue WHERE ue.eventid = '$eventid' $statussql $filter"),0);
		$members = $fuids = array();
		if($count){
			$query = $_SGLOBAL['db']->query("SELECT ue.*, sf.* FROM ".tname("userevent")." ue LEFT JOIN ".tname("spacefield")." sf ON ue.uid = sf.uid WHERE ue.eventid = '$eventid' $statussql $filter $orderby LIMIT $start, $perpage");
			while($value = $_SGLOBAL['db']->fetch_array($query)){
				realname_set($value['uid'], $value['username']);
				$members[] = $value;
				$fuids[] = $value['uid'];
			}
		}

		//״̬
		$ols = array();
		if($fuids) {
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('session')." WHERE uid IN (".simplode($fuids).")");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				if(!$value['magichidden']) {
					$ols[$value['uid']] = $value['lastactivity'];
				}
			}
		}

		// 
		$verifynum = 0;
		if($_SGLOBAL['supe_userevent']['status'] >= 3){
			if($status == 0){
				$verifynum = count($members);
			} else {
				$verifynum = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT count(*) FROM ".tname("userevent")." WHERE eventid = '$eventid' AND status=0"), 0);
			}
		}

		$multi = multi($count, $perpage, $page, "space.php?do=event&id=$eventid&view=member&status=$status");

	} elseif($view == "pic") {

		$picid = isset($_GET['picid']) ? intval($_GET['picid']) : 0;

		//  photo 
		$piccount = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname("eventpic")." WHERE eventid = '$eventid'"), 0);

		if ($picid) {

			$_GET['id'] = 0;

			// image 
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('pic')." WHERE picid='$picid' LIMIT 1");
			$pic = $_SGLOBAL['db']->fetch_array($query);
			realname_set($pic['uid'], $pic['username']);			
			
			include_once(S_ROOT.'./source/space_album.php');

		} else {
			// 鿴 event  photo  list 
			$photolist = array();

			// pagination 
			$perpage = 12;
			$page = empty($_GET['page'])?1:intval($_GET['page']);
			if($page<1) $page=1;
			$start = ($page-1)*$perpage;

			//Check start number
			ckstart($start, $perpage);

			//ѯ
			$theurl = "space.php?do=event&id=$eventid&view=pic";

			$badpicids = array();
			$query = $_SGLOBAL['db']->query("SELECT pic.*, ep.* FROM ".tname("eventpic")." ep LEFT JOIN ".tname("pic")." pic ON ep.picid=pic.picid WHERE ep.eventid='$eventid' ORDER BY ep.picid DESC LIMIT $start, $perpage");
			while($value = $_SGLOBAL['db']->fetch_array($query)){
				if(!$value['filepath']){// photo  allready  delete 
					$badpicids[] = $value['picid'];
					continue;
				}
				realname_set($value['uid'], $value['username']);
				$value['pic'] = pic_get($value['filepath'], $value['thumb'], $value['remote']);
				$photolist[] = $value;
			}

			if($badpicids) {
				$piccount = $piccount - count($badpicids);
				$_SGLOBAL['db']->query("DELETE FROM ".tname("eventpic")." WHERE eventid='$eventid' AND picid IN (".simplode($badpicids).")");
			}

			if($piccount != $event['picnum']) {// update Ŀ
				updatetable("event", array("picnum"=>$piccount),array("eventid"=>$eventid));
			}

			// pagination 
			$multi = multi($piccount, $perpage, $page, $theurl);
		}

	} elseif($view == "thread") {
		// event  topic 
		// pagination 
		$perpage = 20;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page=1;
		$start = ($page-1)*$perpage;

		//Check start number
		ckstart($start, $perpage);
		//ѯ
		$theurl = "space.php?do=event&id=$eventid&view=thread";

		$threadlist = array();
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('thread')." WHERE eventid='$eventid'"),0);
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('thread')." WHERE eventid='$eventid' ORDER BY lastpost DESC LIMIT $start,$perpage");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid'], $value['username']);
				$threadlist[] = $value;
			}
		}

		if($count != $event['threadnum']) {
			updatetable("event", array("threadnum"=>$count), array("eventid"=>$eventid));
		}

		// pagination 
		$multi = multi($count, $perpage, $page, $theurl);

	} elseif($view == "comment") {
		// event  wall 
		// pagination 
		$perpage = 20;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page=1;
		$start = ($page-1)*$perpage;

		//Check start number
		ckstart($start, $perpage);

		//ѯ
		$theurl = "space.php?do=event&id=$eventid&view=comment";
		$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
		$csql = $cid?"cid='$cid' AND":'';

		$comments = array();
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('comment')." WHERE $csql id='$eventid' AND idtype='eventid'"),0);
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE $csql id='$eventid' AND idtype='eventid' ORDER BY dateline DESC LIMIT $start,$perpage");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['authorid'], $value['author']);
				$comments[] = $value;
			}
		}

		// pagination 
		$multi = multi($count, $perpage, $page, $theurl, '', 'comment_ul');

	} else {
		// 鿴 event ۺ
		//  event 
		include_once(S_ROOT.'./source/function_blog.php');
		$event['detail'] = blog_bbcode($event['detail']);

		// 
		if($event['poster']){
			$event['pic'] = pic_get($event['poster'], $event['thumb'], $event['remote'], 0);
		} else {
			$event['pic'] = $_SGLOBAL['eventclass'][$event['classid']]['poster'];
		}

		//  event  groups ֯
		$relateduids = array();//ҲμӴ event ĳԱҲμӵ event 
		$admins = array();
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid = '$eventid' AND status IN ('3', '4') ORDER BY status DESC");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$admins[] = $value;
			$relateduids[] = $value['uid'];
		}

		//  event Ա
		$members = array();
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid = '$eventid' AND status=2 ORDER BY dateline DESC LIMIT 14");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$members[] = $value;
			$relateduids[] = $value['uid'];
		}

		// Ȥ
		$follows = array();
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE eventid='$eventid' AND status=1 ORDER BY dateline DESC LIMIT 12");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			$follows[] = $value;
		}

		// 
		$verifynum = 0;
		if($_SGLOBAL['supe_userevent']['status'] >= 3){
			$verifynum = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT count(*) FROM ".tname("userevent")." WHERE eventid = '$eventid' AND status=0"),0);
		}

		// μ event ҲμЩ event 
		$relatedevents = array();
		if($relateduids){
			$query = $_SGLOBAL['db']->query("SELECT e.*, ue.* FROM ".tname("userevent")." ue LEFT JOIN ".tname("event")." e ON ue.eventid=e.eventid WHERE ue.uid IN (".simplode($relateduids).") ORDER BY ue.dateline DESC LIMIT 0,8");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$relatedevents[$value['eventid']] = $value;
			}
		}

		//  event  wall ȡ20
		$comments = array();
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE id='$eventid' AND idtype='eventid' ORDER BY dateline DESC LIMIT 20");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['authorid'], $value['author']);
			$comments[] = $value;
		}

		//  event  photo 
		$photolist = $badpicids = array();
		$query = $_SGLOBAL['db']->query("SELECT pic.*, ep.* FROM ".tname("eventpic")." ep LEFT JOIN ".tname("pic")." pic ON ep.picid = pic.picid WHERE ep.eventid='$eventid' ORDER BY ep.picid DESC LIMIT 10");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			if(!$value['filepath']){// photo allready  delete 
				$badpicids[] = $value['picid'];
				continue;
			}
			realname_set($value['uid'], $value['username']);
			$value['pic'] = pic_get($value['filepath'], $value['thumb'], $value['remote']);
			$photolist[] = $value;
		}

		if($badpicids) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname("eventpic")." WHERE eventid='$eventid' AND picid IN (".simplode($badpicids).")");
		}

		// event  topic 
		$threadlist = array();
		if($event['tagid']) {
			$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('thread')." WHERE eventid='$eventid'"),0);
			if($count) {
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('thread')." WHERE eventid='$eventid' ORDER BY lastpost DESC LIMIT 10");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['uid'], $value['username']);
					$threadlist[] = $value;
				}
			}
		}

		//  event 鿴 1
		if($event['uid'] != $_SGLOBAL['supe_uid']){
			$_SGLOBAL['db']->query("UPDATE ".tname("event")." SET viewnum=viewnum+1 WHERE eventid='$eventid'");
			$event['viewnum'] += 1;
		}

		// event ʼʱ
		if($event['starttime'] > $_SGLOBAL['timestamp']) {
			$countdown = intval((mktime(0,0,0,gmdate('m',$event['starttime']),gmdate('d',$event['starttime']),gmdate('Y',$event['starttime'])) -
						mktime(0,0,0,gmdate('m',$_SGLOBAL['timestamp']),gmdate('d',$_SGLOBAL['timestamp']),gmdate('Y',$_SGLOBAL['timestamp']))) / 86400);
		}
	}


	// hot value 
	$topic = topic_get($event['topicid']);

	realname_get();

	$menu = array($view => ' class="active"');

	$_TPL['css'] = 'event';
	include template("space_event_view");

} else {//  event  list 

	if(!in_array($view, array("friend","me","all","recommend","city"))){
		$view = "all";
	}
	if($view == "friend" && !$space['friendnum']) {
		$view = "me";
	}
	if($view == "all" || $view == "city") {
		$type = $_GET['type'] == "over" ? $_GET['type'] : "going";
	} elseif($view == "me" || $view == "friend") {
		$type = in_array($_GET['type'], array("join", "follow", "org", "self")) ? $_GET['type'] : "all";
	} elseif($view == "recommend") {
		$type = $_GET['type'] == "admin" ? $_GET['type'] : "hot";
	}

	//ͬ event 
	if($view=="city") {
//vot ADD	$_GET['country']

		if(empty($_GET['country'])) {
			$_GET['country'] = $space['residecountry'];
		}
		if(empty($_GET['province'])) {
			$_GET['province'] = $space['resideprovince'];
		}
		if(empty($_GET['city'])) {
			$_GET['city'] = $space['residecity'];
		}
		if(empty($_GET['province'])) {
			$menu = array($view => ' class="active"');
			$submenus[$type] = array($type=>' class="active"');
				
			$_TPL['css'] = 'event';
			include_once template('space_event_list');
			exit();
		}
	}

	// Ƽ event 
	$recommendevents = array();
	if($view == "all"){
		// ֻȫ event ʾ
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("event")." WHERE grade = 2 ORDER BY recommendtime DESC LIMIT 4");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			if($value['deadline'] > $_SGLOBAL['timestamp']){
				if($value['poster']){
					$value['pic'] = pic_get($value['poster'], $value['thumb'], $value['remote']);
				} else {
					$value['pic'] = $_SGLOBAL['eventclass'][$value['classid']]['poster'];
				}
				$recommendevents[] = $value;
			}
		}
	}
	
	//  event 
	$hotevents = array();
	if($view == 'friend') {
		$query = $_SGLOBAL['db']->query('SELECT * FROM '.tname('event')." WHERE endtime > '$_SGLOBAL[timestamp]' ORDER BY membernum LIMIT 6");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			$hotevents[] = $value;
			realname_set($value['uid'], $value['username']);
		}
	}

	// ȡѲμӵ event 
	$friendevents = array();
	if($space['feedfriend'] && $view != "friend" && $view != "me"){
		$query = $_SGLOBAL['db']->query("SELECT ue.*, e.*, ue.uid as fuid, ue.username as fusername FROM ".tname("userevent")." ue LEFT JOIN ".tname("event")." e ON ue.eventid=e.eventid WHERE ue.uid IN ($space[feedfriend]) AND ue.status >= 2 ORDER BY ue.dateline DESC LIMIT 6");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			if(isset($friendevents[$value['eventid']])){
				$friendevents[$value['eventid']]['friends'][] = $value['fuid'];
			} else {
				$friendevents[$value['eventid']] = $value;
				$friendevents[$value['eventid']]['friends'] = array($value['fuid']);
				realname_set($value['fuid'], $value['fusername']);
			}
		}
	}

	// ҹע event 
	$followevents = array();
	if($view != "me"){
		// ҵ event ǩ²ʾ
		$query = $_SGLOBAL['db']->query("SELECT ue.*, e.* FROM ".tname("userevent")." ue LEFT JOIN ".tname("event")." e ON ue.eventid=e.eventid WHERE ue.uid = '$_SGLOBAL[supe_uid]' AND ue.status = 1 ORDER BY ue.dateline LIMIT 6");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			$followevents[] = $value;
			realname_set($value['uid'], $value['username']);
		}
	}	

	//  pagination 
	$perpage = 10;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	$start = ($page - 1) * $perpage;
	$uid = $_GET['uid'] ? $_GET['uid'] : $_SGLOBAL['supe_uid'];
	$theurl = "space.php?uid=$uid&do=event&view=$view";
	//Check start number
	ckstart($start, $perpage);

	$wherearr = array();
	$fromsql = $joinsql = $orderby = '';
	
	$needquery = true;

	if($view=="recommend") {
		$fromsql = tname("event")." e";
		if($type=="admin"){
			$wherearr[] = "e.grade = 2";
			$orderby = "e.recommendtime DESC";
			$theurl .= "&type=admin";
		} else {
			$wherearr[] = "e.endtime > '$_SGLOBAL[timestamp]'";
			$orderby = "e.membernum DESC";
			$theurl .= "&type=hot";
		}
	} elseif($view=="city" || $view=="all") {
		$fromsql = tname("event")." e";
		if($type=="over") {
			$wherearr[] = "e.endtime < '$_SGLOBAL[timestamp]'";
			$orderby = "e.eventid DESC";
			$theurl .= "&type=over";
		} else {
			$wherearr[] = "e.endtime >= '$_SGLOBAL[timestamp]'";
			$orderby = " e.eventid DESC";
			$theurl .= "&type=going";
		}
	} elseif($view == 'friend') {
		$sql = 'SELECT DISTINCT(eventid) FROM '.tname('userevent')." WHERE uid IN ($space[feedfriend])";
		if($type=="follow") {
			$sql .= ' AND status IN (0,1)';
			$theurl .= "&type=follow";
		} elseif($type=="org") {
			$sql .= ' AND status IN (3,4)';
			$theurl .= "&type=org";
		} elseif($type=="join") {
			$sql .= ' AND status IN (2,3,4)';
			$theurl .= "&type=join";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count = $_SGLOBAL['db']->num_rows($query);
		if($count) {		
			$sql .= " ORDER BY eventid DESC LIMIT $start, $perpage";
			$query = $_SGLOBAL['db']->query($sql);
			$ids = array();
			while($value = $_SGLOBAL['db']->fetch_array($query)) {
				$ids[] = $value['eventid'];
			}
			
			$fromsql = tname('event').' e';
			$joinsql = 'LEFT JOIN '.tname('userevent').' ue ON e.eventid = ue.eventid';
			$wherearr[] = 'e.eventid IN ('.simplode($ids).')';
			$orderby = " e.eventid DESC";
			$sql = "SELECT e.*, ue.uid as fuid, ue.username as fusername, ue.status FROM $fromsql $joinsql WHERE ".implode(" AND ", $wherearr);
		}
		$needquery = false;
		
	} elseif($view == "me") {
		$fromsql = tname("userevent")." ue";
		$joinsql = "LEFT JOIN ".tname('event')." e ON e.eventid=ue.eventid";
		$orderby = "ue.dateline DESC";
		if($view=="friend" && $space['feedfriend']) {
			$wherearr[] = "ue.uid IN ($space[feedfriend])";
		} else {
			$wherearr[] = "ue.uid = '$space[uid]'";
		}
		if($type=="follow") {
			$wherearr[] = "ue.status IN (0,1)";
			$theurl .= "&type=follow";
		} elseif($type=="org") {
			$wherearr[] = "ue.status IN (3,4)";
			$theurl .= "&type=org";
		} elseif($type=="join") {
			$wherearr[] = "ue.status IN (2,3,4)";
			$theurl .= "&type=join";
		} elseif($type=="self") {
			$needquery = false;
			$count = getcount('event', array('uid'=>$space['uid']));
			
			//update statistics
			if($space['eventnum'] != $count) {
				updatetable('space', array('eventnum' => $count), array('uid'=>$space['uid']));
			}
	
			$sql = "SELECT * FROM ".tname('event')." e WHERE e.uid='$space[uid]' ORDER BY e.dateline DESC LIMIT $start, $perpage";
		}

		if($_GET['classid'] || $_GET['date'] || $_GET['country'] || $_GET['province'] || $_GET['city']) {
			$fromsql = tname("userevent")." ue, ".tname('event')." e";
			$wherearr[] = " ue.eventid = e.eventid";
			$joinsql = "";
		}
	}

	// event  category 
	if($_GET['classid']){
		$_GET['classid'] = intval($_GET['classid']);
		$wherearr[] = "e.classid = '$_GET[classid]'";
		$theurl .= "&classid=$_GET[classid]";
	}

	// event ʱ
	if($_GET['date']){
		$daystart = sstrtotime($_GET['date']);
		$dayend = $daystart + 86400;
		$wherearr[] = "e.starttime <= '$dayend' AND e.endtime >= '$daystart'";
		$theurl .= "&date=$_GET[date]";
	}

//vot: Country
	if($_GET['country']) {
		$_GET['country'] = getstr($_GET['country'], 0, 1, 1);
		$wherearr[] = "e.country = '$_GET[country]'";
		$theurl .= "&country=$_GET[country]";
	}

	// event 
	if($_GET['province']) {
		$_GET['province'] = getstr($_GET['province'], 20, 1, 1);
		$wherearr[] = "e.province = '$_GET[province]'";
		$theurl .= "&province=$_GET[province]";
	}
	if($_GET['city']) {
		$_GET['city'] = getstr($_GET['city'], 20, 1, 1);
		$wherearr[] = "e.city = '$_GET[city]'";
		$theurl .= "&city=$_GET[city]";
	}

	$submenus = array($type=>' class="active"');

	//
	if($searchkey = stripsearchkey($_GET['searchkey'])) {
		$wherearr = $submenus = array();
		$wherearr[] = "e.title LIKE '%$searchkey%'";
		$theurl .= "&searchkey=$_GET[searchkey]";
		cksearch($theurl);
	}

	$eventlist = $fevents = array();
	if(empty($wherearr)) $wherearr = array('1');

	if($needquery) {// ѵ event allready ر
		$sql = "SELECT COUNT(*) FROM $fromsql WHERE ".implode(" AND ", $wherearr);
		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
	}
	if($count){
		if($needquery) {
			$sql = "SELECT e.* FROM $fromsql $joinsql WHERE ".implode(" AND ", $wherearr) ." ORDER BY $orderby LIMIT $start, $perpage";
		}
		$query = $_SGLOBAL['db']->query($sql);
		while($event = $_SGLOBAL['db']->fetch_array($query)){
			if($event['poster']){
				$event['pic'] = pic_get($event['poster'], $event['thumb'], $event['remote']);
			} else {
				$event['pic'] = $_SGLOBAL['eventclass'][$event['classid']]['poster'];
			}
			realname_set($event['uid'], $event['username']);
			if($view=="friend"){
				realname_set($event['fuid'], $event['fusername']);
				$fevents[$event['eventid']][] = array("fuid"=>$event['fuid'], "fusername"=>$event['fusername'], "status"=>$event['status']);
			}
			$eventlist[$event['eventid']] = $event;
		}
	}

	realname_get();

	$multi = multi($count, $perpage, $page, $theurl);
	$menu = array($view => ' class="active"');

	$_TPL['css'] = 'event';
	include template("space_event_list");
}

?>