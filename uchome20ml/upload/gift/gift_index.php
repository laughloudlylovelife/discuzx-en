<?php
if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$friends = array();
//ȡ���к����û���
$query = $_SGLOBAL['db']->query("SELECT fusername FROM ".tname('friend')." WHERE uid=$_SGLOBAL[supe_uid] AND status='1'");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['fusername'] = saddslashes($value['fusername']);
	$friends[] = $value['fusername'];
}
$friendstr = implode(',', $friends);

//��ȡ������Ϣ
$touid = (int)$_GET['uid'];
if(!empty($touid)){
	$toInfo = @getspace($touid);
	if(!empty($toInfo['username'])){
		$fusername = $toInfo['username'];
	}
}

$giftlist = getGiftList('gbk');

include_once ( template('gift/view/index') );

?>