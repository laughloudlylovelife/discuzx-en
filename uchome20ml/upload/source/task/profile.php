<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: profile.php 13217 2009-08-21 06:57:53Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

// Determine whether user set up all personal data
$nones = array();
$profile_lang = array(
	'name'		=> lang('realname'),
	'sex'		=> lang('gender'),
	'birthyear'	=> lang('birthyear'),
	'birthmonth'	=> lang('birthmonth'),
	'birthday'	=> lang('birth_day'),
	'blood'		=> lang('blood_type'),
	'marry'		=> lang('marry'),
	'birthcountry'	=> lang('birthcountry'),
	'birthprovince' => lang('birthprovince'),
	'birthcity'	=> lang('birthcity'),
	'residecountry'	=> lang('residecountry'),
	'resideprovince' => lang('resideprovince'),
	'residecity'	=> lang('residecity')
);
foreach (array('name','sex','birthyear','birthmonth','birthday','marry','birthcountry','birthprovince','birthcity','residecountry','resideprovince','residecity') as $key) {
	$value = trim($space[$key]);
	if(empty($value)) {
		$nones[] = $profile_lang[$key];
	}
}
//Webmaster expansion 
@include_once(S_ROOT.'./data/data_profilefield.php');
foreach ($_SGLOBAL['profilefield'] as $field => $value) {
	if($value['required'] && empty($space['field_'.$field])) {
		$nones[] = $value['title'];
	}
}

if(empty($nones)) {

	$task['done'] = 1;// task is completed 
	
	// Automatically find friends
	$findmaxnum = 10;
	$space['friends'][] = $space['uid'];
	$nouids = implode(',', $space['friends']);

	// Residence Friends 
	$residelist = array();
	$warr = array();
	$warr[] = "sf.residecountry='".addslashes($space['residecountry'])."'";
	$warr[] = "sf.resideprovince='".addslashes($space['resideprovince'])."'";
	$warr[] = "sf.residecity='".addslashes($space['residecity'])."'";
	$query = $_SGLOBAL['db']->query("SELECT s.uid,s.username,s.name,s.namestatus FROM ".tname('spacefield')." sf
		LEFT JOIN ".tname('space')." s ON s.uid=sf.uid
		WHERE ".implode(' AND ', $warr)." AND sf.uid NOT IN ($nouids)
		LIMIT 0,$findmaxnum");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
		$residelist[] = $value;
	}

	// Gender Friends 
	$sexlist = array();
	$warr = array();
	if(empty($space['marry']) || $space['marry'] < 2) { // single 
		$warr[] = "sf.marry='1'";// single 
	}
	if(empty($space['sex']) || $space['sex'] < 2) { // boys 
		$warr[] = "sf.sex='2'"; // girls
	} else {
		$warr[] = "sf.sex='1'"; // boys 
	}
	$query = $_SGLOBAL['db']->query("SELECT s.uid,s.username,s.name,s.namestatus FROM ".tname('spacefield')." sf
		LEFT JOIN ".tname('space')." s ON s.uid=sf.uid
		WHERE ".implode(' AND ', $warr)." AND sf.uid NOT IN ($nouids)
		LIMIT 0,$findmaxnum");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
		$sexlist[] = $value;
	}
	
	realname_get();
	
	if($residelist) {
		$task['result'] .= lang(profile_reside_result);
		$task['result'] .= '<ul class="avatar_list">';
		foreach ($residelist as $key => $value) {
			$task['result'] .= '<li>
				<div class="avatar48"><a href="space.php?uid='.$value['uid'].'" target="_blank">'.avatar($value['uid'], 'small').'</a></div>
				<p><a href="space.php?uid='.$value['uid'].'" target="_blank">'.$_SN[$value['uid']].'</a></p>
				<p><a href="cp.php?ac=friend&op=add&uid='.$value['uid'].'" id="a_reside_friend_'.$key.'" onclick="ajaxmenu(event, this.id, 1)">'.lang('friend_add').'</a></p>
				</li>';
		}
		$task['result'] .= '</ul>';
	}
	if($sexlist) {
		$task['result'] .= lang('profile_gender_result');
		$task['result'] .= '<ul class="avatar_list">';
		foreach ($sexlist as $key => $value) {
			$task['result'] .= '<li>
				<div class="avatar48"><a href="space.php?uid='.$value['uid'].'" target="_blank">'.avatar($value['uid'], 'small').'</a></div>
				<p><a href="space.php?uid='.$value['uid'].'" target="_blank">'.$_SN[$value['uid']].'</a></p>
				<p><a href="cp.php?ac=friend&op=add&uid='.$value['uid'].'" id="a_sex_friend_'.$key.'" onclick="ajaxmenu(event, this.id, 1)">'.lang('friend_add').'</a></p>
				</li>';
		}
		$task['result'] .= '</ul>';
	}

} else {

	// Task completion wizard 
	$task['guide'] = lang('profile_task_wizard',array(implode('<br>', $nones)));

}

