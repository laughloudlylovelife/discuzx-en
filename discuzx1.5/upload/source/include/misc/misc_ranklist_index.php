<?php
loadcache('ranklist_index');
$cache_time = $ranklist_setting['cache_time'];
if($cache_time <= 0 ) $cache_time = 1;
$cache_time = $cache_time * 3600;
define('RANKLIST_INDEX_CACHE_TIME', $cache_time);
function is_ranklistcache_available($name) {
	global $_G;
	if(!is_array($_G['cache']['ranklist_index'])) {
		$_G['cache']['ranklist_index'] = array();
	}
	if($_G['cache']['ranklist_index'][$name]['lastupdated'] && TIMESTAMP - $_G['cache']['ranklist_index'][$name]['lastupdated'] < RANKLIST_INDEX_CACHE_TIME) {
		return true;
	}

	return false;
}

function getranklistcache($name, $dateline = '') {
	global $_G;
	if(is_ranklistcache_available($name) || $_G['ranklist_cacheupdated']) {
		$ranklist = $_G['cache']['ranklist_index'][$name];
		unset($ranklist['lastupdated']);
		return $ranklist;
	}

	switch($name) {
		case 'pictures':
			$ranklist = getranklist_pictures_index(9);
			break;
		case 'threads_hot':
			$ranklist = getranklist_threads(10, $dateline, 'heats DESC');
			break;
		case 'threads_fav':
			$ranklist = getranklist_threads(10, 0, 'favtimes DESC');
			break;
		case 'blogs_hot':
			$ranklist = getranklist_blogs(10, $dateline);
			break;
		case 'polls_hot':
			$ranklist = getranklist_polls(10, $dateline);
			break;
		case 'activities_hot':
			$ranklist = getranklist_activities(10, $dateline);
			break;
		case 'girllist':
			$ranklist = getranklist_girls(0, 10);
			break;
	}
	$ranklist['lastupdated'] = TIMESTAMP;
	ranklist_cache_push($name, $ranklist);
	return $ranklist;
}

function ranklist_cache_push($name, $ranklist) {
	global $_G;
	$_G['cache']['ranklist_index'][$name] = $ranklist;
	$_G['cache']['ranklist_index']['lastupdated'] = $ranklist['lastupdated'];
	$_G['ranklist_cacheupdated'] = true;
}

$dateline = $before = '';
$before = $ranklist_setting['index_select'] ? $ranklist_setting['index_select'] : 'thisweek';
switch($before) {
	case 'all':
		$dateline = '0';
		break;
	case 'today':
		$dateline = '86400';
		break;
	case 'thisweek':
		$dateline = '604800';
		break;
	case 'thismonth':
		$dateline = '2592000';
		break;
	default: $dateline = '604800';
}
$dateline = !empty($dateline) ? TIMESTAMP - $dateline : 0;

$i = 0;
if($ranklist_setting['picture']['available']) {
	$pictures = getranklistcache('pictures');
}
if($ranklist_setting['thread']['available']) {
	$threads_hot = getranklistcache('threads_hot', $dateline);
	$i++;
	$thread_pos = $i;
}
if($ranklist_setting['blog']['available']) {
	$blogs_hot = getranklistcache('blogs_hot', $dateline);
	$i++;
	$blog_pos = $i;
}
if($ranklist_setting['poll']['available']) {
	$polls_hot = getranklistcache('polls_hot', $dateline);
	$i++;
	$poll_pos = $i;
}
if($ranklist_setting['activity']['available']) {
	$activities_hot = getranklistcache('activities_hot', $dateline);
	$i++;
	$activity_pos = $i;
}
if($ranklist_setting['member']['available']) {
	$memberlist = getranklist_members(0, 27);
}

if($_G['ranklist_cacheupdated']) {
	save_syscache('ranklist_index', $_G['cache']['ranklist_index']);
}

unset($pictures['lastupdated'], $threads_hot['lastupdated'], $blogs_hot['lastupdated']);
unset($polls_hot['lastupdated'], $activities_hot['lastupdated'], $memberlist['lastupdated']);

$navtitle = $_G['setting']['navs'][8]['navname'];
$metakeywords = $navtitle;
$metadescription = $navtitle;

include template('diy:ranklist/ranklist');
?>