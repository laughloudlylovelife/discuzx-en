<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp_config.php 10586 2008-12-10 06:53:47Z liguode $
*/

if(!defined('IN_UCHOME') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

// Check Permissions
if(!checkperm('manageeventclass')) {
	cpmessage('no_authority_management_operation');
}

// Get Single Data
$thevalue = array();
$_GET['classid'] = empty($_GET['classid'])?0:intval($_GET['classid']);
if($_GET['classid']) {
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('eventclass')." WHERE classid='$_GET[classid]'");
	$thevalue = $_SGLOBAL['db']->fetch_array($query);
	if($thevalue['poster']){
		$thevalue['poster'] = "data/event/".$thevalue['classid'].".jpg";
	} else {
		$thevalue['poster'] = "image/event/default.jpg";
	}
}
if(!empty($_GET['op']) && $_GET['op'] != 'add' && empty($thevalue)) {
	cpmessage('there_is_no_designated_users_columns');
}

if(submitcheck("eventclasssubmit")){// Create / edit event category

	$arr = array(
		"classname" => getstr($_POST['classname'], 80, 1, 1, 1),
		"template" => getstr($_POST['template'], '', 1, 1, 1),
		"displayorder" => intval($_POST['displayorder'])
	);

	$query = $_SGLOBAL['db']->query('SELECT * FROM ' . tname('eventclass'). " WHERE classname = '$arr[classname]'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value && $_POST['classid'] != $value['classid']){
		cpmessage("classname_duplicated"); // event category names can not be duplicated
	}
	
	if($_POST['classid']){ // Modify
		// Whether to remove poster
		$_POST['delposter'] = intval($_POST['delposter']);
		if($_POST['delposter']) {
			$arr['poster'] = 0;
			$value['poster'] = 0;
		}
		$classid = intval($_POST['classid']);
		updatetable('eventclass', $arr, array('classid'=>$classid));
	} else {
		$arr['poster'] = 0;
		$classid = inserttable('eventclass', $arr, 1);
	}
	// Upload poster
	if (!empty($_FILES['poster']['tmp_name'])) {
		include_once(S_ROOT.'./source/function_image.php');
		$tmp_name = S_ROOT.'./data/temp/eventposter.tmp';
		move_uploaded_file($_FILES['poster']['tmp_name'], $tmp_name);
		// Temporarily change the thumbnail setting
		include_once(S_ROOT.'./data/data_setting.php');
		$tmpsetting = $_SGLOBAL['setting'];
		$_SGLOBAL['setting'] = array('thumbwidth' => 200,'thumbheight' => 200,'maxthumbwidth' => 300,'maxthumbheight' => 300);
		$thumbpath = makethumb($tmp_name);
		$_SGLOBAL['setting'] = $tmpsetting;		
		if(empty($thumbpath)){ // Not generate thumbnails
			if(fileext($_FILES['poster']['name']) != 'jpg') {
				cpmessage('poster_only_jpg_allowed');
			}
			$thumbpath = $tmp_name;
		} else { // Successfully generated thumbnails
			@unlink($tmp_name);
		}
		if(!is_dir(S_ROOT.'./data/event')){
			@mkdir(S_ROOT.'./data/event');
		}
		if(is_file(S_ROOT.'./data/event/'.$classid.'.jpg')){
			@unlink(S_ROOT.'./data/event/'.$classid.'.jpg');
		}
		rename($thumbpath, S_ROOT."./data/event/$classid.jpg");
		if(!$value['poster'] && is_file(S_ROOT."./data/event/$classid.jpg")){
			updatetable('eventclass', array('poster'=>1), array('classid'=>$classid));
		}
	}
	// update cache 
	include_once(S_ROOT . "source/function_cache.php");
	eventclass_cache();
	cpmessage("do_success", "admincp.php?ac=eventclass", 2);

} elseif(submitcheck("ordersubmit")) {// sort 

	if(is_array($_POST['displayorder'])){
		@include_once(S_ROOT."data/data_eventclass.php");
		foreach($_POST['displayorder'] as $classid=>$neworder){
			$classid = intval($classid);
			$neworder = intval($neworder);
			if($_SGLOBAL['eventclass'][$classid]['displayorder'] != $neworder) {
				updatetable("eventclass", array("displayorder"=>$neworder), array("classid"=>$classid));
			}
		}
		// update cache 
		include_once(S_ROOT . "source/function_cache.php");
		eventclass_cache();
		cpmessage("do_success", "admincp.php?ac=eventclass", 2);
	}
	
} elseif(submitcheck("deletesubmit")){//  delete 

	if(! $_POST['classid']){
		cpmessage("at_least_one_option_to_delete_eventclass", "admincp.php?ac=eventclass", 2); //Please select at least the correct event category for delete
	}
	if(! $_POST['newclassid']){
		cpmessage("columns_option_to_merge_the_eventclass", "admincp.php?ac=eventclass&classid=$_POST[classid]", 2); // Choose at least ane event category for merge
	}

	$_POST['classid '] = intval($_POST['classid']);
	$_POST['newclassid'] = intval($_POST['newclassid']);

	// Check the category existence
	$query = $_SGLOBAL['db']->query("SELECT classid FROM " . tname("eventclass") . " WHERE classid = '$_POST[classid]'");
	if(! $_SGLOBAL['db']->fetch_array($query)){
		cpmessage("columns_option_to_merge_the_eventclass", "admincp.php?ac=eventclass&classid=$_POST[classid]", 2); // Choose at least ane event category for merge
	}

	updatetable("event", array("classid"=>$_POST['newclassid']), array("classid"=>$_POST['classid']));
	$_SGLOBAL['db']->query("DELETE FROM " . tname("eventclass") . " WHERE classid = '$_POST[classid]'");

	//  update cache 
	include_once(S_ROOT . "source/function_cache.php");
	eventclass_cache();
	cpmessage("do_success", "admincp.php?ac=eventclass", 2);
}

if("delete" == $_GET['op']) {//  delete  event  category 

	if(empty($thevalue)){
		cpmessage("there_is_no_designated_users_columns", "admincp?ac=eventclass", 2);
	}

	if (! @include_once(S_ROOT . "data/data_eventclass.php")) {
	include_once(S_ROOT . "source/function_cache.php");
		eventclass_cache();
	}
	$list = $_SGLOBAL['eventclass'];
	if(sizeof($list) == 1){// Can not delete a single category
		cpmessage("have_no_eventclass", "admincp.php?ac=eventclass", 2); // delete Failed, leave at least one event category 
	}
	$list[$thevalue['classid']] = null; // Remove the deleted entry

} elseif("add" == $_GET['op']) {

	//$thevalue['poster'] = "image/event/default.jpg";

} else {
	if (!@include_once(S_ROOT.'./data/data_eventclass.php')) {
		include_once(S_ROOT.'source/function_cache.php');
		eventclass_cache();
	}
	$list = $_SGLOBAL['eventclass'];
	
	$actives = array('view' => ' class="active"');
}

