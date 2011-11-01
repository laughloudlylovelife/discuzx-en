<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_index.php 12256 2009-05-27 03:57:32Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

// real name ֤
if($space['namestatus']) {
	include_once(S_ROOT.'./source/function_cp.php');
	ckrealname('viewspace');
}

//
// gender 
$space['sex_org'] = $space['sex'];
$space['sex'] = $space['sex']=='1'?'<a href="cp.php?ac=friend&op=search&sex=1&searchmode=1">'.lang('man').'</a>':($space['sex']=='2'?'<a href="cp.php?ac=friend&op=search&sex=2&searchmode=1">'.lang('woman').'</a>':'');
//$space['birth'] = ($space['birthyear']?"$space[birthyear]".lang('year'):'').($space['birthmonth']?"$space[birthmonth]".lang('month'):'').($space['birthday']?"$space[birthday]".lang('day'):'');
$space['birth'] = ($space['birthyear']?"$space[birthyear]".'-':'').($space['birthmonth']?"$space[birthmonth]".'-':'').($space['birthday']?"$space[birthday]".'-':'');
$space['marry'] = $space['marry']=='1'?'<a href="cp.php?ac=friend&op=search&marry=1&searchmode=1">'.lang('unmarried').'</a>':($space['marry']=='2'?'<a href="cp.php?ac=friend&op=search&marry=2&searchmode=1">'.lang('married').'</a>':'');

//vot $space['birthcity'] = trim(($space['birthprovince']?"<a href=\"cp.php?ac=friend&op=search&birthprovince=".rawurlencode($space['birthprovince'])."&searchmode=1\">$space[birthprovince]</a>":'').($space['birthcity']?" <a href=\"cp.php?ac=friend&op=search&birthcity=".rawurlencode($space['birthcity'])."&searchmode=1\">$space[birthcity]</a>":''));
$space['birthcity'] = trim(($space['birthcountry']?"<a href=\"cp.php?ac=friend&op=search&birthcountry=".rawurlencode($space['birthcountry'])."&searchmode=1\">$space[birthcountry]</a>":'').($space['birthprovince']?"<a href=\"cp.php?ac=friend&op=search&birthprovince=".rawurlencode($space['birthprovince'])."&searchmode=1\">$space[birthprovince]</a>":'').($space['birthcity']?" <a href=\"cp.php?ac=friend&op=search&birthcity=".rawurlencode($space['birthcity'])."&searchmode=1\">$space[birthcity]</a>":''));

//vot$space['residecity'] = trim(($space['resideprovince']?"<a href=\"cp.php?ac=friend&op=search&resideprovince=".rawurlencode($space['resideprovince'])."&searchmode=1\">$space[resideprovince]</a>":'').($space['residecity']?" <a href=\"cp.php?ac=friend&op=search&residecity=".rawurlencode($space['residecity'])."&searchmode=1\">$space[residecity]</a>":''));
$space['residecity'] = trim(($space['residecountry']?"<a href=\"cp.php?ac=friend&op=search&residecountry=".rawurlencode($space['residecountry'])."&searchmode=1\">$space[residecountry]</a>":'').($space['resideprovince']?"<a href=\"cp.php?ac=friend&op=search&resideprovince=".rawurlencode($space['resideprovince'])."&searchmode=1\">$space[resideprovince]</a>":'').($space['residecity']?" <a href=\"cp.php?ac=friend&op=search&residecity=".rawurlencode($space['residecity'])."&searchmode=1\">$space[residecity]</a>":''));

$space['qq'] = empty($space['qq'])?'':"<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?V=1&Uin=$space[qq]&Site=$space[username]&Menu=yes\">$space[qq]</a>";

@include_once(S_ROOT.'./data/data_usergroup.php');

//Զ
@include_once(S_ROOT.'./data/data_profilefield.php');
$fields = empty($_SGLOBAL['profilefield'])?array():$_SGLOBAL['profilefield'];

//
$base_farr = $contact_farr = array();
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]'");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$v_friend = ckfriend($value['uid'], $value['friend']);
	if($value['type'] == 'base' || $value['type'] == 'contact') {
		if(!$v_friend) $space[$value['subtype']] = '';
	} else {
		if($v_friend) $space[$value['type']][] = $value;
	}
}
//Ƿ
$space['profile_base'] = 0;
foreach (array('sex','birthday','blood','marry','residecity','birthcity') as $value) {
	if($space[$value]) $space['profile_base'] = 1;
}
foreach ($fields as $fieldid => $value) {
	if($space["field_$fieldid"] && empty($value['invisible'])) $space['profile_base'] = 1;
}
//ϵ
$space['profile_contact'] = 0;
foreach (array('mobile','qq','msn') as $value) {
	if($space[$value]) $space['profile_contact'] = 1;
}

// points 
$space['star'] = getstar($space['experience']);

$_TPL['css'] = 'space';
include_once template("space_info");

?>
