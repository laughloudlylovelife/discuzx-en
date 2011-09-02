<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: class_tree.php 8006 2008-07-09 05:59:42Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$eventid = isset($_GET['id']) ? intval($_GET['id']) : 0;
$op = empty($_GET['op']) ? "edit" : $_GET['op'];

$menus = array();
$menus[$op] = " class='active'";

// Verify the existence and Events and activities of the relationship between the current user
$allowmanage=  false; // Event administrative permissions
if($eventid){
	$query = $_SGLOBAL['db']->query("SELECT e.*, ef.* FROM ".tname("event")." e LEFT JOIN ".tname("eventfield")." ef ON e.eventid=ef.eventid WHERE e.eventid='$eventid'");
	$event = $_SGLOBAL['db']->fetch_array($query);
	if(! $event){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}
	if(($event['grade']==-1 || $event['grade'] == 0) && $event['uid'] != $_SGLOBAL['supe_uid'] && !checkperm('manageevent')){
		showmessage('event_under_verify');// Event is pending (under moderator verification)
	}
	$query = $_SGLOBAL['db']->query("SELECT * FROM " . tname("userevent") . " WHERE eventid='$eventid' AND uid='$_SGLOBAL[supe_uid]'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	$_SGLOBAL['supe_userevent'] = $value ? $value : array();	
	if($value['status'] >= 3 || checkperm('manageevent')){
		$allowmanage = true; // Event administrative permissions
	}
}

// Get Event categories
if(!@include_once(S_ROOT.'./data/data_eventclass.php')) {
	include_once(S_ROOT.'./source/function_cache.php');
	eventclass_cache();
}

// Publish/Edit event
if(submitcheck('eventsubmit')) {
	
	//Verification code
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	// Basic info
	$arr1 = array(
		"title" => getstr($_POST['title'], 80, 1, 1, 1),
		"classid" => intval($_POST['classid']),
		"province" => getstr($_POST['province'], 20, 1, 1),
		"city" => getstr($_POST['city'], 20, 1, 1),
		"location" => getstr($_POST['location'], 80, 1, 1, 1),
		"starttime" => sstrtotime($_POST['starttime']),
		"endtime" => sstrtotime($_POST['endtime']),
		"deadline" => sstrtotime($_POST['deadline']),
		"public" => intval($_POST['public'])
	);
	// Extended Info
	$arr2 = array(
		"detail" => getstr($_POST['detail'], '', 1, 1, 1, 0, 1),
		"limitnum" => intval($_POST['limitnum']),
		"verify" => intval($_POST['verify']),
		"allowpost" => intval($_POST['allowpost']),
		"allowpic" => intval($_POST['allowpic']),
		"allowfellow" => intval($_POST['allowfellow']),
		"allowinvite" => intval($_POST['allowinvite']),
		"template" => getstr($_POST['template'], 255, 1, 1, 1)
	);
	
	//Check input
	if(empty($arr1['title'])){
		showmessage('event_title_empty');
	} elseif(empty($arr1['classid'])){
		showmessage('event_classid_empty');
	} elseif(empty($arr1['city'])) {
		showmessage('event_city_empty');
	} elseif(empty($arr2['detail'])) {
		showmessage('event_detail_empty');
	} elseif($arr1['endtime']-$arr1['starttime']>60 * 24 * 3600) {
		showmessage('event_bad_time_range');		
	} elseif($arr1['endtime']<$arr1['starttime']) {
		showmessage('event_bad_endtime');
	} elseif($arr1['deadline']>$arr1['endtime']) {
		showmessage('event_bad_deadline');
	} elseif(!$eventid && $arr1['starttime']<$_SGLOBAL['timestamp']) {
		showmessage('event_bad_starttime');
	}
	
	// Processing image
	$pic = array();
	if($_FILES['poster']['tmp_name']){
		// Saved to the default album
		$pic = pic_save($_FILES['poster'], -1, $arr1['title']);
		if(is_array($pic) && $pic['filepath']){// Upload successful
			$arr1['poster'] = $pic['filepath'];
			$arr1['thumb'] = $pic['thumb'];
			$arr1['remote'] = $pic['remote'];
		}
	}
	
	//Related Groups
	if($_POST['tagid'] && (!$eventid || $event['uid']==$_SGLOBAL['supe_uid']) && $_POST['tagid'] != $event['tagid']) {
		$_POST['tagid'] = intval($_POST['tagid']);
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("tagspace")." WHERE tagid='$_POST[tagid]' AND uid='$_SGLOBAL[supe_uid]' LIMIT 1");
		if($value=$_SGLOBAL['db']->fetch_array($query)) {
			if($value['grade'] == 9) {
				$arr1['tagid'] = $value['tagid'];
			}
		}
	}

	if($eventid){// Modify existing Event
		if($allowmanage){
			//If a not approved Event was changed, reset the pending status
			if($event['grade']==-1 && $event['uid'] == $_SGLOBAL['supe_uid']) {
				$arr1['grade'] = 0;
			}
			updatetable("event", $arr1, array("eventid"=>$eventid));
			updatetable("eventfield", $arr2, array("eventid"=>$eventid));
			// Share image
			if($_POST['sharepic'] && !empty($pic['picid'])){
				$arr = array(
					"eventid"=>$eventid,
					"picid"=>$pic['picid'],
					"uid"=>$_SGLOBAL['supe_uid'],
					"username"=>$_SGLOBAL['supe_username'],
					"dateline"=>$_SGLOBAL['timestamp']
				);
				inserttable("eventpic", $arr);
			}
			showmessage('do_success', 'space.php?do=event&id='.$eventid, 0);			
		} else {
			showmessage('no_privilege_edit_event');
		}

	} else {// Generate new event
	
		// Real-name authentication
		ckrealname('event');
		
		// Video Authentication
		ckvideophoto('event');
		
		//New user probationary
		cknewuser();
	
		$_POST['topicid'] = topic_check($_POST['topicid'], 'event');
		$arr1['topicid'] = $_POST['topicid'];
		
		// Is a Founder
		$arr1['uid'] = $_SGLOBAL['supe_uid'];
		$arr1['username'] = $_SGLOBAL['supe_username'];
		// Create time
		$arr1['dateline'] = $_SGLOBAL['timestamp'];
		$arr1['updatetime'] = $_SGLOBAL['timestamp'];
		
		//Number of people
		$arr1['membernum'] = 1;
		
		// Need to auditing
		$arr1['grade'] = checkperm("verifyevent") ? 0 : 1;

		// Insert to event table
		$eventid = inserttable("event", $arr1, 1);
		if (! $eventid){
			showmessage("event_create_failed"); // Create an event failed, please check the contents of your input
		}
		// Event Info
		$arr2['eventid'] = $eventid;
		inserttable("eventfield", $arr2);
		// Sharing image
		if($_POST['sharepic'] && !empty($pic['picid'])){
			$arr = array(
				"eventid"=>$eventid,
				"picid"=>$pic['picid'],
				"uid"=>$_SGLOBAL['supe_uid'],
				"username"=>$_SGLOBAL['supe_username'],
				"dateline"=>$_SGLOBAL['timestamp']
				);
			inserttable("eventpic", $arr);
		}
		$arr3 = array(
			"eventid" => $eventid,
			"uid" => $_SGLOBAL['supe_uid'],
			"username" => $_SGLOBAL['supe_username'],
			"status" => 4,  // Initiator
			"fellow" => 0,
			"template" => $arr1['template'],
			"dateline" => $_SGLOBAL['timestamp']
		   );
		// Insert user activity to userevent Table
		inserttable("userevent", $arr3);
		if($arr1['grade'] > 0){
			//Add feed
			if($_POST['makefeed']) {
				include_once(S_ROOT.'./source/function_feed.php');
				feed_publish($eventid, 'eventid', 1);
			}
		}
		
		//Statistics
		updatestat('event');
		
		//Update User Statistics
		if(empty($space['eventnum'])) {
			$space['eventnum'] = getcount('event', array('uid'=>$space['uid']));
			$eventnumsql = "eventnum=".$space['eventnum'];
		} else {
			$eventnumsql = 'eventnum=eventnum+1';
		}
		
		//Points
		$reward = getreward('createevent', 0);
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET {$eventnumsql}, lastpost='$_SGLOBAL[timestamp]', updatetime='$_SGLOBAL[timestamp]', credit=credit+$reward[credit], experience=experience+$reward[experience] WHERE uid='$_SGLOBAL[supe_uid]'");
			
		if($_POST['topicid']) {
			topic_join($_POST['topicid'], $_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
			$url = 'space.php?do=topic&topicid='.$_POST['topicid'].'&view=event';
		} else {
			$url = 'space.php?do=event&id='.$eventid;
		}
		
		showmessage('do_success', $url, 0); // View Event
	}
}

if($op == 'invite') {
	
	// Not allowed to Invited non-active members or the case of non-Permissions organizers did not invite
	if((!$event['allowinvite'] && $_SGLOBAL['supe_userevent']['status'] < 3) || ($_SGLOBAL['supe_userevent']['status'] < 2)){
		showmessage("no_privilege_do_eventinvite");
	}
	
	if(submitcheck('invitesubmit')){
		$arr = array("uid"=>$_SGLOBAL['supe_uid'], "username"=>$_SGLOBAL['supe_username'], "eventid"=>$eventid, "dateline"=>$_SGLOBAL['timestamp']);
		$inserts = array();
		$touids = array();
		for($i=0, $L=sizeof($_POST['ids']); $i<$L; $i++){
			$arr['touid'] = intval($_POST['ids'][$i]);
			$arr['tousername'] = getstr($_POST['names'][$i], 15, 1, 1);
			$inserts[] = "(".simplode($arr).")";
			$touids[] = $arr['touid'];
		}
		if($inserts) {
			$_SGLOBAL['db']->query("INSERT INTO ".tname("eventinvite")."(uid, username, eventid, dateline, touid, tousername) VALUES ".implode(",", $inserts));
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET eventinvitenum=eventinvitenum+1 WHERE uid IN (".simplode($touids).")");
		}
		$_GET['group'] = isset($_GET['group']) ? intval($_GET['group']) : -1;
		$_GET['page'] = empty($_GET['page'])?0:intval($_GET['page']);
		showmessage("do_success", "cp.php?ac=event&op=invite&id=$eventid&group=$_GET[group]&page=$_GET[page]", 2);
	}

	//Pagination
	$perpage = 21;
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//Check start number
	ckstart($start, $perpage);

	$wherearr = array();
	$_GET['key'] = stripsearchkey($_GET['key']);
	if($_GET['key']) {
		$wherearr[] = " fusername LIKE '%$_GET[key]%' ";
	}

	$_GET['group'] = isset($_GET['group'])?intval($_GET['group']):-1;
	if($_GET['group'] >= 0) {
		$wherearr[] = " gid='$_GET[group]'";
	}

	$sql = $wherearr ? 'AND'.implode(' AND ', $wherearr) : '';

	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('friend')." WHERE uid='$_SGLOBAL[supe_uid]' AND status='1' $sql"), 0);

	$fuids = array();
	$list = array();
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$_SGLOBAL[supe_uid]' AND status='1' $sql ORDER BY num DESC, dateline DESC LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['fuid'], $value['fusername']);
			$list[] = $value;
			$fuids[] = $value['fuid'];
		}
	}

	//Has been added
	$joins = array();
	$query = $_SGLOBAL['db']->query("SELECT uid FROM ".tname('userevent')." WHERE eventid='$eventid' AND uid IN (".simplode($fuids).") AND status > 1");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$joins[$value['uid']] = $value['uid'];
	}

	//Whether to invite
	$query = $_SGLOBAL['db']->query("SELECT touid FROM ".tname('eventinvite')." WHERE eventid='$eventid' AND touid IN (".simplode($fuids).")");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$joins[$value['touid']] = $value['touid'];
	}

	//User Groups
	$groups = getfriendgroup();
	$groupselect = array($_GET['group'] => ' selected');

	$multi = multi($count, $perpage, $page, "cp.php?ac=event&op=invite&id=$eventid&group=$_GET[group]&key=$_GET[key]");

} elseif($op == 'members') {
	// manage Members

	if($_SGLOBAL['supe_userevent']['status'] < 3){
		showmessage('no_privilege_manage_event_members');//No permission to manage event Members
	}

	if(submitcheck("memberssubmit")){
		
		$_POST['status'] = intval($_POST['status']);
		
		if($_POST['ids'] && verify_eventmembers($_POST['ids'], $_POST['status'])){
			showmessage("do_success", "cp.php?ac=event&op=members&id=$eventid&status=$_GET[status]", 2);
		} else {
			showmessage("choose_right_eventmember", "cp.php?ac=event&op=members&id=$eventid&status=$_GET[status]", 5);
		}
	}
	
	//Paginator
	$perpage = 24;
	$start = empty($_GET['start'])?0:intval($_GET['start']);
	$list = array();
	$count = 0;

	//Search
	$wheresql = '';	
	if($_GET['key']) {
		$_GET['key'] = stripsearchkey($_GET['key']);
		$wheresql = " AND username LIKE '%$_GET[key]%' ";
	} else {
		$_GET['status'] = intval($_GET['status']);
		$wheresql = " AND status='$_GET[status]'";		
	}

	//Check start number
	ckstart($start, $perpage);
	
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('userevent')." WHERE eventid='$eventid' $wheresql LIMIT $start,$perpage");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);
		$list[] = $value;
		$count++;
	}
	
	if($_GET['key']){
		$_GET['status'] = $list[0]['status'];
	}

	$multi = smulti($start, $perpage, $count, "cp.php?ac=event&op=members&id=$eventid&status=$_GET[status]&key=$_GET[key]");

} elseif($op == 'member'){
	// Settings for each individual Members

	if($_SGLOBAL['supe_userevent']['status'] < 3){
		showmessage('no_privilege_manage_event_members');//No permission to manage event Members
	}

	if(submitcheck("membersubmit")){
		$_POST['status'] = intval($_POST['status']);
		if($_POST['uid'] && verify_eventmembers(array($_POST['uid']), $_POST['status'])){
			$refer = empty($_POST['refer']) ? "space.php?do=event&id=$eventid&view=member&status=$_POST[status]" : $_POST['refer'];
			showmessage("do_success", $refer , 0);	
		} else {
			showmessage("choose_right_eventmember");
		}
	}
	
	$_GET['uid'] = intval($_GET['uid']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("userevent")." WHERE uid='$_GET[uid]' AND eventid='$eventid'");
	$userevent = $_SGLOBAL['db']->fetch_array($query);
	if(empty($userevent)){
		showmessage("choose_right_eventmember");
	}
	$userevent['template'] = nl2br(getstr($userevent['template'], 255, 1, 0, 1));

} elseif($op == 'comment') {// Event comment
	
	if(!$allowmanage){
		showmessage("no_privilege_manage_event_comment");
	}

	showmessage("redirect", "admincp.php?ac=comment&idtype=eventid&id=$eventid", 0);

} elseif($op == 'pic') {// Event Photos

	if(!$allowmanage){
		showmessage("no_privilege_manage_event_pic");
	}

	if(submitcheck("deletepicsubmit")){
		if(! empty($_POST['ids'])) {
			$query = $_SGLOBAL['db']->query("DELETE FROM " . tname("eventpic") . " WHERE eventid='$eventid' AND picid IN (".simplode($_POST['ids']).")");
			$_SGLOBAL['db']->query("UPDATE ".tname("event")." SET picnum = (SELECT COUNT(*) FROM ".tname("eventpic")." WHERE eventid='$eventid') WHERE eventid = '$eventid'");
			showmessage("do_success", "cp.php?ac=event&op=pic&id=$eventid", 0);
		} else {
			showmessage("choose_event_pic");
		}
	}

	//Pagination
	$perpage = 16;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page=1;
	$start = ($page-1)*$perpage;

	//Check start number
	ckstart($start, $perpage);

	//Query Processing
	$theurl = "cp.php?ac=event&id=$eventid&op=pic";

	$photolist = array();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname("eventpic")." WHERE eventid = '$eventid'"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT pic.* FROM ".tname("eventpic")." ep LEFT JOIN ".tname("pic")." pic ON ep.picid=pic.picid WHERE ep.eventid='$eventid' ORDER BY ep.picid DESC LIMIT $start, $perpage");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			$value['pic'] = pic_get($value['filepath'], $value['thumb'], $value['remote']);
			$photolist[] = $value;
		}
	}

	//Pagination
	$multi = multi($count, $perpage, $page, $theurl);

} elseif($op == 'thread') {//Active Topics
	
	if(!$allowmanage){
		showmessage("no_privilege_manage_event_thread");
	}
	if(!$event['tagid']) {
		showmessage('event_has_not_mtag');//Event not associated with group
	}
	
	if(submitcheck('delthreadsubmit')) {
		if(!empty($_POST['ids'])) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname("thread")." WHERE eventid='$eventid' AND tid IN (".simplode($_POST['ids']).")");
			$_SGLOBAL['db']->query("UPDATE ".tname("event")." SET threadnum = (SELECT COUNT(*) FROM ".tname("thread")." WHERE eventid='$eventid') WHERE eventid = '$eventid'");
			showmessage('do_success',"cp.php?ac=event&id=$eventid&op=thread",0);
		} else {
			showmessage('choose_event_thread');
		}
	}
	
	//Pagination
	$perpage = 20;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page=1;
	$start = ($page-1)*$perpage;

	//Check start number
	ckstart($start, $perpage);
	$threadlist = array();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname("thread")." WHERE eventid = '$eventid'"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("thread")." WHERE eventid='$eventid' ORDER BY lastpost DESC LIMIT $start, $perpage");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			realname_set($value['lastauthorid'], $value['lastauthor']);
			$threadlist[] = $value;
		}
	}

	//Pagination
	$multi = multi($count, $perpage, $page, $theurl);	
	
} elseif($op == 'join') {// Join an event or modify the registration info
	
	if(isblacklist($event['uid'])) {
		$_GET['popupmenu_box'] = true;//Turn off
		showmessage('is_blacklist');//Blacklist
	}
	//New members, Check conditions for access
	if(empty($_SGLOBAL['supe_userevent'])){
		$_GET['popupmenu_box'] = true;//Turn off
		if($_SGLOBAL['timestamp'] > $event['endtime']){	
			showmessage('event_is_over');// Event has finished
		}
		
		if($_SGLOBAL['timestamp'] > $event['deadline']){
			showmessage("event_meet_deadline"); // Event have been Deadline
		}
		
		if($event['limitnum']>0 && $event['membernum']>=$event['limitnum']){
			showmessage('event_already_full');//Event Number of members is full
		}
		
		// Non-public event, need to invite to join
		if($event['public'] < 2){
			$query = $_SGLOBAL['db']->query("SELECT * FROM " . tname("eventinvite") . " WHERE eventid = '$event[eventid]' AND touid = '$_SGLOBAL[supe_uid]' LIMIT 1");
			$value = $_SGLOBAL['db']->fetch_array($query);
			if(empty($value)){				
				showmessage("event_join_limit"); // This event can be joined only by invitation
			}
		}
	}

	if(submitcheck("joinsubmit")){
		// Review status of people change registration information
		if(!empty($_SGLOBAL['supe_userevent']) && $_SGLOBAL['supe_userevent']['status'] == 0){
			$arr = array();

			if(isset($_POST['fellow'])){
				$arr['fellow'] = intval($_POST['fellow']);// Modify carried Number
			}
			if($_POST['template']){// Registration Info
				$arr['template'] = getstr($_POST['template'], 255, 1, 1, 1);
			}
			if($arr){
				updatetable("userevent", $arr, array("eventid"=>$eventid, "uid"=>$_SGLOBAL['supe_uid']));
			}
			showmessage("do_success", "space.php?do=event&id=$eventid", 2);
		}

		// People who have participated in Event, Modify registration information
		if(!empty($_SGLOBAL['supe_userevent']) && $_SGLOBAL['supe_userevent']['status'] > 1){
			$arr = array();
			$num = 0; // number of Event participants changing

			if(isset($_POST['fellow'])){// Modify carried Number
				$_POST['fellow'] = intval($_POST['fellow']);
				$arr['fellow'] = $_POST['fellow'];// Modify number of participants
				$num = $_POST['fellow'] - $_SGLOBAL['supe_userevent']['fellow'];
				// 检查人数
				if ($event['limitnum'] > 0 && $num + $event['membernum'] > $event['limitnum']){
					showmessage("event_already_full");
				}
			}
			if($_POST['template']){// Registration Info
				$arr['template'] = $_POST['template'];
			}
			if($arr){
				updatetable("userevent", $arr, array("eventid"=>$eventid, "uid"=>$_SGLOBAL['supe_uid']));
			}
			if($num){
				$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET membernum = membernum + ($num) WHERE eventid=$eventid");
			}
			showmessage("do_success", "space.php?do=event&id=$eventid", 0);
		}
		
		// User activity info
		$arr = array(
			"eventid" => $eventid,
			"uid" => $_SGLOBAL['supe_uid'],
			"username" => $_SGLOBAL['supe_username'],
			"status" => 2,
			"template" => $event['template'],
			"fellow" => 0,
			"dateline" => $_SGLOBAL['timestamp']
		   );
		// The number of Event members changing
		$num = 1;
		$numsql = "";

		if($_POST['fellow']){
			$arr['fellow'] = intval($_POST['fellow']);
			$num += $arr['fellow'];
		}
		if($_POST['template']){// Registration Info
			$arr['template'] = getstr($_POST['template'], 255, 1, 1, 1);
		}
		
		if ($event['limitnum'] > 0 && $num + $event['membernum'] > $event['limitnum']){
			showmessage("event_will_full");
		}
		$numsql = " membernum = membernum + ($num) ";
		
		// Check for event invitation
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("eventinvite")." WHERE eventid='$eventid' AND touid='$_SGLOBAL[supe_uid]'");
		$eventinvite = $_SGLOBAL['db']->fetch_array($query);
		// Need to verify
		if($event['verify'] && !$eventinvite){			
			$arr['status'] = 0; // Pending
		}

		// Insert to userevent Table
		if($_SGLOBAL['supe_userevent']['status'] == 1){
			// attention Who participated in, attention to reducing The number of members to 1
			updatetable("userevent", $arr, array("uid"=>$_SGLOBAL['supe_uid'], "eventid"=>$eventid));
			$numsql .= ",follownum = follownum - 1 ";
		} else {
			// Directly involved
			inserttable("userevent", $arr, 0);
		}

		// The number of Event (participation / attention) Modify
		if($arr['status'] == 2){
			$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET $numsql WHERE eventid = '$eventid'");
			if(ckprivacy('join')){
				realname_set($event['uid'], $event['username']);
				realname_get();				
				feed_add('event', cplang('event_join'), array('title'=>$event['title'], "eventid"=>$event['eventid'], "uid"=>$event['uid'], "username"=>$_SN[$event['uid']]));
			}
		} elseif($arr['status'] == 0){
			if($_SGLOBAL['supe_userevent']['status'] == 1){
				//attention The number of minus 1
				$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET follownum = follownum - 1 WHERE eventid = '$eventid'");
			}
			// sent notice to The organizers for auditing
			$note_inserts = array();
			$note_ids = array();
			$note_msg = cplang('event_join_verify', array("space.php?do=event&id=$event[eventid]", $event['title'], "cp.php?ac=event&id=$event[eventid]&op=members&status=0&key=$arr[username]"));
			$query = $_SGLOBAL['db']->query("SELECT ue.*, sf.* FROM ".tname("userevent")." ue LEFT JOIN ".tname("spacefield")." sf ON ue.uid=sf.uid WHERE ue.eventid='$eventid' AND ue.status >= 3");
			while($value=$_SGLOBAL['db']->fetch_array($query)){
				$value['privacy'] = empty($value['privacy']) ? array() : unserialize($value['privacy']);
				$filter = empty($value['privacy']['filter_note'])?array():array_keys($value['privacy']['filter_note']);
				if(cknote_uid(array("type"=>"eventmember","authorid"=>$_SGLOBAL['supe_uid']),$filter)){
					$note_ids[] = $value['uid'];
					$note_inserts[] = "('$value[uid]', 'eventmember', '1', '$_SGLOBAL[supe_uid]', '$_SGLOBAL[supe_username]', '".addslashes($note_msg)."', '$_SGLOBAL[timestamp]')";
				}
			}
			if($note_inserts){
				$_SGLOBAL['db']->query("INSERT INTO ".tname('notification')." (`uid`, `type`, `new`, `authorid`, `author`, `note`, `dateline`) VALUES ".implode(',', $note_inserts));
				$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid IN (".simplode($note_ids).")");
			}
			
			//E-mail notice
			smail($event['uid'], '', $note_msg, 'event');
		}
		
		// Bonus Points
		getreward('joinevent', 1, 0, $eventid);
		
		//Statistics
		updatestat('eventjoin');
		
		//Process Event Invites
		if($eventinvite){
			$_SGLOBAL['db']->query("DELETE FROM ".tname("eventinvite")." WHERE eventid='$eventid' AND touid='$_SGLOBAL[supe_uid]'");
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET eventinvitenum=eventinvitenum-1 WHERE uid = '$_SGLOBAL[supe_uid]' AND eventinvitenum>0");
		}
		
		showmessage("do_success", "space.php?do=event&id=$eventid", 0); // Join the event successfully
	}

} elseif($op == "quit") {
	// Quit Event
	if(! $eventid){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}

	if(submitcheck("quitsubmit")){

		$tourl = "space.php?do=event&id=$eventid";
		$uid = $_SGLOBAL['supe_uid'];
		$userevent = $_SGLOBAL['supe_userevent'];

		// Has joined the event as Founder
		if(! empty($userevent) && $event['uid'] != $uid){
			$_SGLOBAL['db']->query("DELETE FROM " . tname("userevent") . " WHERE eventid='$eventid' AND uid='$uid'");
			if($userevent['status']>=2){
				// Modify Event number of members
				$num = 1 + $userevent['fellow'];
				$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET membernum = membernum - $num WHERE eventid='$eventid'");
			}
			showmessage("do_success", $tourl, 0);
		} else {
			showmessage("cannot_quit_event", $tourl, 2); // You can not quit Event because you do not join an event or you are an imitiator of this event.
		}
	}

} elseif($op == "follow") {
	// 关注
	if(! $eventid){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}
	
	if(!empty($_SGLOBAL['supe_userevent'])){
		$_GET['popupmenu_box'] = true;//Turn off
		if($_SGLOBAL['supe_userevent']['status']<=1) {
			showmessage("event_has_followed");//You have been concerned about this Event
		} else {
			showmessage("event_has_joint");//You have joined this event
		}
	}
	
	//[to do: Checks have been participants in the event, priority: low]
	if(submitcheck("followsubmit")){

		$arr = array(
			"eventid" => $eventid,
			"uid" => $_SGLOBAL['supe_uid'],
			"username" => $_SGLOBAL['supe_username'],
			"status" => 1,
			"fellow" => 0,
			"template" => $event['template']
		   );
		inserttable("userevent", $arr);

		$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET follownum = follownum + 1 WHERE eventid='$eventid'");
		showmessage("do_success", "space.php?do=event&id=$eventid", 0);
	}

} elseif($op == "cancelfollow") {
	// Cancel concerned about
	if(! $eventid){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}

	if(submitcheck("cancelfollowsubmit")){

		if($_SGLOBAL['supe_userevent']['status'] == 1){
			$_SGLOBAL['db']->query("DELETE FROM " . tname("userevent") . " WHERE uid='$_SGLOBAL[supe_uid]' AND eventid='$eventid'");
			$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET follownum = follownum - 1 WHERE eventid='$eventid'");
		}
		showmessage("do_success", "space.php?do=event&id=$eventid", 0);
	}

} elseif($op == 'eventinvite') {
	
	if($_GET['r']) {// Refuse
		$tourl = "cp.php?ac=event&op=eventinvite" . (isset($_GET['page']) ? "&page=" . intval($_GET['page']) : "");	
		if($eventid) {// Passed Event id
			$_SGLOBAL['db']->query("DELETE FROM ". tname("eventinvite") . " WHERE eventid = '$eventid' AND touid = '$_SGLOBAL[supe_uid]'");
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET eventinvitenum=eventinvitenum-1 WHERE uid = '$_SGLOBAL[supe_uid]' AND eventinvitenum>0");
		} else {// All
			$_SGLOBAL['db']->query("DELETE FROM ". tname("eventinvite") . " WHERE touid = '$_SGLOBAL[supe_uid]'");
			$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET eventinvitenum=0 WHERE uid = '$_SGLOBAL[supe_uid]'");
		}
	
		showmessage("do_success", $tourl, 0);
	}

	//Pagination
	$perpage = 20;
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page=1;
	$start = ($page-1)*$perpage;

	//Check start number
	ckstart($start, $perpage);

	//Query Processing
	$theurl = "cp.php?ac=event&op=eventinvite";
	$count = getcount("eventinvite", array("touid"=>$_SGLOBAL['supe_uid']));
	
	//update statistics
	if($count != $space['eventinvitenum']) {
		updatetable('space', array('eventinvitenum'=>$count), array('uid'=>$space['uid']));
	}
		
	$eventinvites = array();
	if($count > 0) {
		// Unprocessed event invitation
		$query = $_SGLOBAL['db']->query("SELECT ei.*, e.*, ei.dateline as invitetime FROM ".tname("eventinvite")." ei LEFT JOIN ".tname("event")." e ON ei.eventid=e.eventid WHERE ei.touid='$_SGLOBAL[supe_uid]' limit $start, $perpage");
		while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			if($value['poster']){
				$value['pic'] = pic_get($value['poster'], $value['thumb'], $value['remote']);
			} else {
				$value['pic'] = $_SGLOBAL['eventclass'][$value['classid']]['poster'];
			}
			$eventinvites[] = $value;
		}
	}

	//Pagination
	$multi = multi($count, $perpage, $page, $theurl);

} elseif($op == 'acceptinvite') {
	//Accept the invitation
	if(! $eventid){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}
	
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("eventinvite")." WHERE eventid='$eventid' AND touid='$_SGLOBAL[supe_uid]' LIMIT 1");
	$eventinvite = $_SGLOBAL['db']->fetch_array($query);
	
	if(!$eventinvite) {
		showmessage('eventinvite_does_not_exist');//You do not have the event invitation
	}
	
	$_SGLOBAL['db']->query("DELETE FROM ".tname("eventinvite")." WHERE eventid='$eventid' AND touid='$_SGLOBAL[supe_uid]'");
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET eventinvitenum=eventinvitenum-1 WHERE uid = '$_SGLOBAL[supe_uid]' AND eventinvitenum>0");
		
	if(isblacklist($event['uid'])) {
		showmessage('is_blacklist');//Blacklist
	}	
	if($_SGLOBAL['timestamp'] > $event['endtime']){	
		showmessage('event_is_over');// Event is over
	}
	if($_SGLOBAL['timestamp'] > $event['deadline']){
		showmessage("event_meet_deadline"); // Activities have been Deadline
	}	
	if($event['limitnum']>0 && $event['membernum']>=$event['limitnum']){
		showmessage('event_already_full');//Event Number of members is full
	}
	
	$numsql = "membernum = membernum + 1";	
	if(empty($_SGLOBAL['supe_userevent'])){		
		$arr = array(
			"eventid" => $eventid,
			"uid" => $_SGLOBAL['supe_uid'],
			"username" => $_SGLOBAL['supe_username'],
			"status" => 2,
			"template" => $event['template'],
			"fellow" => 0,
			"dateline" => $_SGLOBAL['timestamp']
		   );
		inserttable("userevent", $arr, 0);
		$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET $numsql WHERE eventid = '$eventid'");
		if(ckprivacy('join')){
			realname_set($event['uid'], $event['username']);
			realname_get();
			feed_add('event', cplang('event_join'), array('title'=>$event['title'], "eventid"=>$event['eventid'], "uid"=>$event['uid'], "username"=>$_SN[$event['uid']]));
		}
	} elseif($_SGLOBAL['supe_userevent'] && $_SGLOBAL['supe_userevent'] < 2) {
		$arr = array("status"=>2);
		if($_SGLOBAL['supe_userevent']['status'] == 1) {
			$numsql .= ",follownum = follownum - 1 ";
		}
		if($event['limitnum'] > 0 && $event['membernum'] + $_SGLOBAL['supe_userevent']['fellow'] > $event['limitnum']) {
			$arr['fellow'] = 0;
		}
		updatetable("userevent", $arr, array("uid"=>$_SGLOBAL['supe_uid'], "eventid"=>$eventid));
		$_SGLOBAL['db']->query("UPDATE " . tname("event") . " SET $numsql WHERE eventid = '$eventid'");
		if(ckprivacy('join')){
			feed_add('event', cplang('event_join'), array('title'=>$event['title'], "eventid"=>$event['eventid'], "uid"=>$event['uid'], "username"=>$event['username']));
		}
	}
	
	showmessage(cplang('event_accept_success', array("space.php?do=event&id=$event[eventid]")));

} elseif('delete'==$op) {
	// Delete/Cancel the Event

	if(! $eventid){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}
	
	if(!$allowmanage){
		showmessage('no_privilege');
	}
	
	if(submitcheck("deletesubmit")){
		include_once(S_ROOT.'./source/function_delete.php');
		deleteevents(array($eventid));
		showmessage("do_success", "space.php?do=event", 2);
	}	

} elseif("print"==$op) {
	// Print Registration Form

	if(! $eventid){
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}

	if(submitcheck("printsubmit")){

		$members=array();
		$uids=array();
		if($_POST['admin']){
			$query = $_SGLOBAL['db']->query("SELECT * FROM " . tname("userevent") . " WHERE eventid='$eventid' AND status > 1 ORDER BY status DESC, dateline ASC");
		} else {
			$query = $_SGLOBAL['db']->query("SELECT * FROM " . tname("userevent") . " WHERE eventid='$eventid' AND status = 2 ORDER BY dateline ASC");
		}
		while($value=$_SGLOBAL['db']->fetch_array($query)){
			$members[] = $value;
			realname_set($value['uid'], $value['username']);
		}
		realname_get();

		include template('cp_event_sheet');
		exit();
	}
	
} elseif($op == 'close') {//Close the event
	
	if(!$eventid) {
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}
	
	if(!$allowmanage){
		showmessage('no_privilege');
	}
	
	if($event['grade'] < 1 || $event['endtime'] > $_SGLOBAL['timestamp']) {
		showmessage('event_can_not_be_closed');
	}
	
	if(submitcheck('closesubmit')){
		updatetable('event', array('grade'=>-2), array('eventid'=>$eventid));
		showmessage('do_success', 'space.php?do=event&id='.$eventid, 0);		
	}

} elseif($op == 'open') {//Turn off the Event

	if(!$eventid) {
		showmessage("event_does_not_exist"); // Event does not exist or has been deleted
	}
	
	if(!$allowmanage){
		showmessage('no_privilege');
	}
	
	if($event['grade'] != -2 || $event['endtime'] > $_SGLOBAL['timestamp']) {
		showmessage('event_can_not_be_opened');
	}
	
	if(submitcheck('opensubmit')){
		updatetable('event', array('grade'=>1), array('eventid'=>$eventid));
		showmessage('do_success', 'space.php?do=event&id='.$eventid, 0);		
	}
	
} elseif($op == 'calendar') {//Events Calendar
	$match = array();
	if(!$_GET['month'] && preg_match("/^(\d{4}-\d{1,2})/", $_GET['date'], $match)) {
		$_GET['month'] = $match[1];
	}
	if(preg_match("/^(\d{4})-(\d{1,2})$/", $_GET['month'], $match)){
		$year = intval($match[1]);
		$month = intval($match[2]);
	} else {
		$year = intval(sgmdate("Y"));
		$month = intval(sgmdate("m"));
	}
	if($month==12) {
		$nextmonth = ($year + 1)."-"."1";
		$premonth = $year."-11";
	} elseif ($month==1) {
		$nextmonth = $year."-2";
		$premonth = ($year-1)."-12";
	} else {
		$nextmonth = $year."-".($month+1);
		$premonth = $year."-".($month-1);
	}
	
	$daystart = mktime(0,0,0,$month,1,$year);	
	$week = sgmdate("w",$daystart);//First day of the week this month: 0-6
	$dayscount = sgmdate("t",$daystart);//The number of days this month
	$dayend = mktime(0,0,0,$month,$dayscount,$year) + 86400;
	$days = array();
	for($i=1; $i<=$dayscount; $i++) {
		$days[$i] = array("count"=>0, "events"=>array(), "class"=>'');
	}
	
	//This Month Events
	$events = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("event")." WHERE starttime < $dayend AND endtime > $daystart ORDER BY eventid DESC LIMIT 100");//最多只取100
	while($value=$_SGLOBAL['db']->fetch_array($query)) {
		if($value['public']<1 || $value['grade'] == 0 || $value['grade'] == -1){
			continue;
		}
		$start = $value['starttime'] < $daystart ? 1 : intval(date("j", $value['starttime']));
		$end = $value['endtime'] > $dayend ? $dayscount : intval(date("j", $value['endtime']));
		for($i=$start; $i<=$end; $i++) {
			if($days[$i]['count'] < 10) {//Only up to 10 activities per day
				$days[$i]['events'][] = $value;
				$days[$i]['count'] += 1;
				$days[$i]['class'] = " on_link";
			}
		}
	}
	unset($events);
	
	if($month == intval(sgmdate("m")) && $year == intval(sgmdate("Y"))) {
		$d = intval(sgmdate("j"));
		$days[$d]['class'] = "on_today";
	}
	
	if($_GET['date']) {
		$t = sstrtotime($_GET['date']);
		if($month == intval(sgmdate("m",$t)) && $year == intval(sgmdate("Y",$t))) {
			$d = intval(sgmdate("j",$t));
			$days[$d]['class'] = "on_select";
		}
	}
	
	//URL
	$url = $_GET['url'] ? preg_replace("/date=[\d\-]+/", '', $_GET['url']) : "space.php?do=event";
	
} elseif($_GET['op'] == 'edithot') {
	// Permissions
	if(!checkperm('manageevent')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('event', array('hot'=>$_POST['hot']), array('eventid'=>$eventid));
		
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($eventid, 'eventid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$eventid, 'idtype'=>'eventid'));
		}
		showmessage('do_success', "space.php?uid=$event[uid]&do=event&id=$eventid", 0);
	}
	
} elseif($op == 'edit'){// edit or Create a new activity
	
	if($eventid) {
		// Check permissions		
		if(!$allowmanage){
			showmessage("no_privilege_edit_event");
		}
	} else {
		//Check user group Permissions for add events
		if(! checkperm("allowevent")){
		   showmessage('no_privilege_add_event');
		}
		
		// Real-name authentication
		ckrealname('event');
		
		// Video Authentication
		ckvideophoto('event');
		
		//New user probationary
		cknewuser();
		
		// Default entry new event [to do: Owner can set the Event default entry, priority: low]
		$event = array();
		$event['eventid'] = '';
		$event['starttime'] = ceil($_SGLOBAL['timestamp'] / 3600) * 3600 + 7200; // Event Start Time: Two hours after
		$event['endtime'] = $event['starttime'] + 14400; // Event Finish Time: four hours after the start time
		$event['deadline'] = $event['starttime']; // Deadline: Start time
		$event['allowinvite'] = 1; // Is allowed to Invite Friends
		$event['allowpost'] = 1; // Whether to allow the posting
		$event['allowpic'] = 1; // Whether to allow Event photo sharing
		$event['allowfellow'] = 0; // Whether to allow to take friends
		$event['verify'] = 0;  // Need verify
		$event['public'] = 2;  // Whether public event: a fully open
		$event['limitnum'] = 0;  // Limit the number of participants: unlimited
		$event['province'] = $space['resideprovince'];  // Event City: Publisher City
		$event['city'] = $space['residecity'];
		
		//Involved in hot
		$topic = array();
		$topicid = $_GET['topicid'] = intval($_GET['topicid']);
		if($topicid) {
			$topic = topic_get($topicid);
		}
		if($topic) {
			$actives = array('event' => ' class="active"');
		}
	}
	
	//Related Groups
	$mtags = array();
	if(!$eventid || $event['uid']==$_SGLOBAL['supe_uid']) {
		$query = $_SGLOBAL['db']->query("SELECT mtag.* FROM ".tname("tagspace")." st LEFT JOIN ".tname("mtag")." mtag ON st.tagid=mtag.tagid WHERE st.uid='$_SGLOBAL[supe_uid]' AND st.grade=9");
		while($value=$_SGLOBAL['db']->fetch_array($query)) {
			$mtags[] = $value;
		}
	}
	
	if($_GET['tagid'] && !$event['tagid']) {
		$event['tagid'] = intval($_GET['tagid']);		
	}
	
}

realname_get();

include template("cp_event");


// Verify Event Members, settings, cancel the event organizers
// [to do: Can be added to the blacklist feature, simply change the status of 2, you can check into the Event. Priority: Low]
function verify_eventmembers($uids, $status){
	global $_SGLOBAL, $event;	

	if($_SGLOBAL['supe_userevent']['status'] < 3){
		showmessage('no_privilege_manage_event_members');
	}
	$eventid = $_SGLOBAL['supe_userevent']['eventid'];
	if($eventid != $event['eventid']){
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname("event")." WHERE eventid='$eventid'");
		$event = $_SGLOBAL['db']->fetch_array($query);
	}
	
	$status = intval($status);
	if($status < -1 || $status > 3){
		showmessage("bad_userevent_status"); // Please select the correct status of the event Members
	}
	if($event['verify'] == 0 && $status == 0){
		showmessage("event_not_set_verify");
	}
	if($status == 3 && $_SGLOBAL['supe_uid'] != $event['uid']){
		showmessage("only_creator_can_set_admin"); // Only Founder can set the administrator
	}
	
	$newids = $actions = $userevents = array();
	$num = 0; // changing Event Member Number
	$query = $_SGLOBAL['db']->query("SELECT ue.*, sf.* FROM " . tname("userevent") . " ue LEFT JOIN ".tname("spacefield")." sf ON ue.uid=sf.uid WHERE ue.uid IN (".simplode($uids).") AND ue.eventid='$eventid'");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		if($value['status'] == $status || $event['uid'] == $value['uid'] || $value['status'] == 1){
			// The same status, creator, who does not deal with concerned about
			continue;
		}
		if($status == 2) {//Set to ordinary member
			$newids[] = $value['uid'];
			$userevents[$value['uid']] = $value;
			if($value['status'] == 0){// Join
				$actions[$value['uid']] = "set_verify";
				$num += ($value['fellow'] + 1);
			} elseif ($value['status'] == 3) { // cancel the Organizer status
				$actions[$value['uid']] = "unset_admin";
			}
		} elseif($status == 3) {//Set to Organizer
			$newids[] = $value['uid'];
			$userevents[$value['uid']] = $value;
			$actions[$value['uid']] = "set_admin";
			if($value['status'] == 0){
				$num += ($value['fellow'] + 1);
			}
		} elseif($status == 0) {//Set to Pending
			$newids[] = $value['uid'];
			$userevents[$value['uid']] = $value;
			$actions[$value['uid']] = "unset_verify";
			if($value['status'] >= 2){
				$num -= ($value['fellow'] + 1);
			}
		} elseif($status == -1) {//Delete Members
			$newids[] = $value['uid'];
			$userevents[$value['uid']] = $value;
			$actions[$value['uid']] = "set_delete";
			if($value['status'] >= 2){
				$num -= ($value['fellow'] + 1);
			}
		}
	}
	
	if(empty($newids)) return array();
	if($event['limitnum'] > 0 && $event['membernum'] + $num > $event['limitnum']){
		// Event Number of members is over
		showmessage("event_will_full");
	}
	
	$note_inserts = $note_ids = $feed_inserts = array();
	$feedarr = array(
		'appid' => UC_APPID,
		'icon' => 'event',
		'uid' => '',
		'username' => '',
		'dateline' => $_SGLOBAL['timestamp'],
		'title_template' => cplang('event_join'), 
		'title_data' => array('title'=>$event['title'], "eventid"=>$event['eventid'], "uid"=>$event['uid'], "username"=>$event['username']),
		'body_template' => '',
		'body_data' => array(),
		'body_general' => '',
		'image_1' => '',
		'image_1_link' => '',
		'image_2' => '',
		'image_2_link' => '',
		'image_3' => '',
		'image_3_link' => '',
		'image_4' => '',
		'image_4_link' => '',
		'target_ids' => '',
		'friend' => ''
	);
	$feedarr = sstripslashes($feedarr);//Remove escape chars
	$feedarr['title_data'] = serialize(sstripslashes($feedarr['title_data']));//Serialize
	$feedarr['body_data'] = serialize(sstripslashes($feedarr['body_data']));//Serialize
	$feedarr['hash_template'] = md5($feedarr['title_template']."\t".$feedarr['body_template']);//Like hash
	$feedarr['hash_data'] = md5($feedarr['title_template']."\t".$feedarr['title_data']."\t".$feedarr['body_template']."\t".$feedarr['body_data']);//Merged hash
	$feedarr = saddslashes($feedarr);//Add slashes

	foreach ($newids as $id){
		if($status > 1 && $userevents[$id]['status'] ==0){
			// Approved to participate in the Event, participate in activities publish to feed
			$feedarr['uid'] = $userevents[$id]['uid'];
			$feedarr['username'] = $userevents[$id]['username'];
			$feed_inserts[] = "('$feedarr[appid]', 'event', '$feedarr[uid]', '$feedarr[username]', '$feedarr[dateline]', '0', '$feedarr[hash_template]', '$feedarr[hash_data]', '$feedarr[title_template]', '$feedarr[title_data]', '$feedarr[body_template]', '$feedarr[body_data]', '$feedarr[body_general]', '$feedarr[image_1]', '$feedarr[image_1_link]', '$feedarr[image_2]', '$feedarr[image_2_link]', '$feedarr[image_3]', '$feedarr[image_3_link]', '$feedarr[image_4]', '$feedarr[image_4_link]')";
		}
		$userevents[$id]['privacy'] = empty($userevents[$id]['privacy']) ? array() : unserialize($userevents[$id]['privacy']);
		$filter = empty($userevents[$id]['privacy']['filter_note'])?array():array_keys($userevents[$id]['privacy']['filter_note']);
		if(cknote_uid(array("type"=>"eventmemberstatus","authorid"=>$_SGLOBAL['supe_uid']),$filter)){
			$note_ids[] = $id;
			$note_msg = cplang('eventmember_'.$actions[$id], array("space.php?do=event&id=".$event['eventid'], $event['title']));
			$note_inserts[] = "('$id', 'eventmemberstatus', '1', '$_SGLOBAL[supe_uid]', '$_SGLOBAL[supe_username]', '".addslashes($note_msg)."', '$_SGLOBAL[timestamp]')";
		}
	}
	
	if($note_ids) {
		$_SGLOBAL['db']->query("INSERT INTO ".tname('notification')." (`uid`, `type`, `new`, `authorid`, `author`, `note`, `dateline`) VALUES ".implode(',', $note_inserts));
		$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET notenum=notenum+1 WHERE uid IN (".simplode($note_ids).")");
	}
	if($feed_inserts){
		$_SGLOBAL['db']->query("INSERT INTO ".tname('feed')." (`appid` ,`icon` ,`uid` ,`username` ,`dateline` ,`friend` ,`hash_template` ,`hash_data` ,`title_template` ,`title_data` ,`body_template` ,`body_data` ,`body_general` ,`image_1` ,`image_1_link` ,`image_2` ,`image_2_link` ,`image_3` ,`image_3_link` ,`image_4` ,`image_4_link`) VALUES ".implode(',', $feed_inserts));
	}

	if($status == -1){// Delete
		$_SGLOBAL['db']->query("DELETE FROM ".tname("userevent")." WHERE uid IN (".simplode($newids).") AND eventid='$eventid'");
	} else {// Set status
		$_SGLOBAL['db']->query("UPDATE ".tname("userevent")." SET status='$status' WHERE uid IN (".simplode($newids).") AND eventid='$eventid'");
	}
	// Modify Event Number of members
	if($num != 0){
		$_SGLOBAL['db']->query("UPDATE ".tname("event")." SET membernum = membernum + ($num) WHERE eventid='$eventid'");
	}
	return $newids;
}


?>
