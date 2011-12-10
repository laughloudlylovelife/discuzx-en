<?php
if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//Page
$start = empty($_GET['start'])?0:intval($_GET['start']);
$theurl = "gift.php?do=view";
//Check the starting number
ckstart($start, $_VPERPAGE);

$sql = "SELECT * FROM ".tname("app_tw_gift")." WHERE touid = {$_SGLOBAL['supe_uid']} ORDER BY dateline DESC limit {$start},{$_VPERPAGE}";
$query = $_SGLOBAL['db']->query($sql);
if($_SGLOBAL['db']->num_rows($query) > 0){
	while ($value = $_SGLOBAL['db']->fetch_array($query)){
		$list[] = $value;
	}
	$count = count($list);
	//Page
	$multi = smulti($start, $_VPERPAGE, $count, $theurl);
	
}else{

}

include_once ( template('gift/view/view') );

