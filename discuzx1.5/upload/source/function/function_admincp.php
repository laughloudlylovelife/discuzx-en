<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_admincp.php 16710 2010-09-13 07:21:46Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

@set_time_limit(0);

function istpldir($dir) {
	return is_dir(DISCUZ_ROOT.'./'.$dir) && !in_array(substr($dir, -1, 1), array('/', '\\')) &&
		 strpos(realpath(DISCUZ_ROOT.'./'.$dir), realpath(DISCUZ_ROOT.'./template')) === 0;
}

function isplugindir($dir) {
	return !$dir || (!preg_match("/(\.\.|[\\\\]+$)/", $dir) && substr($dir, -1) =='/');
}

function ispluginkey($key) {
	return preg_match("/^[a-z]+[a-z0-9_]*$/i", $key);
}

function dir_writeable($dir) {
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if(is_dir($dir)) {
		if($fp = @fopen("$dir/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$dir/test.txt");
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	}
	return $writeable;
}

function filemtimesort($a, $b) {
	if($a['filemtime'] == $b['filemtime']) {
		return 0;
	}
	return ($a['filemtime'] > $b['filemtime']) ? 1 : -1;
}

function checkpermission($action, $break = 1) {
	global $_G;
	if(!isset($_G['config']['admincp'])) {
		cpmsg('action_access_noexists', '', 'error');
	} elseif($break && !$_G['config']['admincp'][$action]) {
		cpmsg('action_noaccess_config', '', 'error');
	} else {
		return $_G['config']['admincp'][$action];
	}
}

function siteinformation() {

	global $_G, $siteuniqueid, $save_mastermobile;
	$db = DB::object();
	$update = array(
				'uniqueid' => $siteuniqueid,
				'version' => DISCUZ_VERSION,
				'release' => DISCUZ_RELEASE,
				'php' => PHP_VERSION,
				'mysql' => $db->version(),
				'charset' => CHARSET,
				'bbname' => $_G['setting']['bbname'],
				'mastermobile' => $save_mastermobile,
				'software' => $_SERVER['SERVER_SOFTWARE'],
			);

	$updatetime = @filemtime(DISCUZ_ROOT.'./data/updatetime.lock');
	if(empty($updatetime) || (TIMESTAMP - $updatetime > 3600 * 4)) {
		@touch(DISCUZ_ROOT.'./data/updatetime.lock');
		$tableprelen = strlen($db->tablepre);
		$table = array(
			'forum_thread' => 'threads',
			'forum_post' => 'posts',
			'forum_attachment' => 'fattachments',
			'common_member' => 'members',
			'home_album' => 'albums',
			'home_blog' => 'blogs',
			'home_doing' => 'doings',
			'home_poke' => 'pokes',
			'home_share' => 'shares',
			'portal_topic' => 'topics',
			'portal_article_title' => 'articles',
			'portal_attachment' => 'pattachments',
		);
		$query = DB::query("SHOW TABLE STATUS");
		while($row = DB::fetch($query)) {
			$tablename = substr($row['Name'], $tableprelen);
			if(!isset($table[$tablename])) continue;
			$update[$table[$tablename]] = $row['Rows'];
		}
		$query = DB::query("SELECT special, count(*) AS spcount FROM ".DB::table('forum_thread')." GROUP BY special");
		while($thread = DB::fetch($query)) {
			$thread['special'] = intval($thread['special']);
			$update['spt_'.$thread['special']] = $thread['spcount'];
		}
		$update['groups'] = DB::result_first("SELECT COUNT(*) FROM ".DB::table('forum_forum')." WHERE `type`='sub' AND `status`='3'");
		$update['forums'] = DB::result_first("SELECT COUNT(*) FROM ".DB::table('forum_forum')." WHERE `status`<>3");
		$update['adminemail'] = $_G['setting']['adminemail'];
		if($_G['setting']['msn']['on'] && $_G['setting']['msn']['domain']) {
			$update['msn_domain'] = $_G['setting']['msn']['domain'];
		}
	}

	$data = '';
	foreach($update as $key => $value) {
		$data .= $key.'='.rawurlencode($value).'&';
	}

	return 'os=dx&update='.rawurlencode(base64_encode($data)).'&md5hash='.substr(md5($_SERVER['HTTP_USER_AGENT'].implode('', $update).TIMESTAMP), 8, 8).'&timestamp='.TIMESTAMP;
}

function isfounder($user = '') {
	$user = empty($user) ? getglobal('member') : $user;
	return $GLOBALS['admincp']->checkfounder($user);
}


function cplang($name, $replace = array(), $output = false) {
	global $_G;
	$ret = '';

	if(!isset($_G['lang']['admincp'])) {
		lang('admincp');
	}
	if(!isset($_G['lang']['admincp_menu'])) {
		lang('admincp_menu');
	}
	if(!isset($_G['lang']['admincp_msg'])) {
		lang('admincp_msg');
	}

	if(isset($_G['lang']['admincp'][$name])) {
		$ret = $_G['lang']['admincp'][$name];
	} elseif(isset($_G['lang']['admincp_menu'][$name])) {
		$ret = $_G['lang']['admincp_menu'][$name];
	} elseif(isset($_G['lang']['admincp_msg'][$name])) {
		$ret = $_G['lang']['admincp_msg'][$name];
	}
	$ret = $ret ? $ret : ($replace === false ? '' : $name);
	if($replace && is_array($replace)) {
		$s = $r = array();
		foreach($replace as $k => $v) {
			$s[] = '{'.$k.'}';
			$r[] = $v;
		}
		$ret = str_replace($s, $r, $ret);
	}
	$output && print($ret);
	return $ret;
}

function admincustom($title, $url, $sort = 0) {
	global $_G;
	$url = ADMINSCRIPT.'?'.$url;
	$id = DB::result_first("SELECT id FROM ".DB::table('common_admincp_cmenu')." WHERE uid='$_G[uid]' AND sort='$sort' AND url='$url'");
	if($id) {
		DB::query("UPDATE ".DB::table('common_admincp_cmenu')." SET title='$title', clicks=clicks+1, dateline='$_G[timestamp]' WHERE id='$id'");
	} else {
		DB::query("INSERT INTO ".DB::table('common_admincp_cmenu')." (title, url, sort, uid, dateline) VALUES ('$title', '$url', '$sort', '$_G[uid]', '$_G[timestamp]')");
		$id = DB::insert_id();
	}
	return $id;
}

function cpurl($type = 'parameter', $filters = array('sid', 'frames')) {
	parse_str($_SERVER['QUERY_STRING'], $getarray);
	$extra = $and = '';
	foreach($getarray as $key => $value) {
		if(!in_array($key, $filters)) {
			@$extra .= $and.$key.($type == 'parameter' ? '%3D' : '=').rawurlencode($value);
			$and = $type == 'parameter' ? '%26' : '&';
		}
	}
	return $extra;
}


function showheader($key, $url) {
	list($action, $operation, $do) = explode('_', $url.'___');
	$url = $action.($operation ? '&operation='.$operation.($do ? '&do='.$do : '') : '');
	echo '<li><em><a href="'.ADMINSCRIPT.'?action='.$url.'" id="header_'.$key.'" hidefocus="true" onmouseover="previewheader(\''.$key.'\')" onmouseout="previewheader()" onclick="toggleMenu(\''.$key.'\', \''.$url.'\');doane(event);">'.cplang('header_'.$key).'</a></em></li>';
}

function shownav($header = '', $menu = '', $nav = '') {
	global $action, $operation;

	$title = 'cplog_'.$action.($operation ? '_'.$operation : '');
	if(in_array($action, array('home', 'custommenu'))) {
		$customtitle = '';
	} elseif(cplang($title, false)) {
		$customtitle = $title;
	} elseif(cplang('nav_'.($header ? $header : 'index'), false)) {
		$customtitle = 'nav_'.$header;
	} else {
		$customtitle = rawurlencode($nav ? $nav : ($menu ? $menu : ''));
	}
	$title = cplang('header_'.($header ? $header : 'index')).($menu ? '&nbsp;&raquo;&nbsp;'.cplang($menu) : '').($nav ? '&nbsp;&raquo;&nbsp;'.cplang($nav) : '');
	$ctitle = cplang('header_'.($header ? $header : 'index'));
	if($menu) {
		$ctitle = cplang($menu);
	}
	if($nav) {
		$ctitle = cplang($nav);
	}
	$addtomenu = "&nbsp;&nbsp;<a target=\"main\" title=\"".cplang('custommenu_addto')."\" href=\"".ADMINSCRIPT."?action=misc&operation=custommenu&do=add&title=".rawurlencode($ctitle)."&url=".rawurlencode(cpurl())."\">[+]</a>";
	$dtitle = str_replace("'", "\'", cplang('admincp_title').' - '.str_replace('&nbsp;&raquo;&nbsp;', ' - ', $title));
	echo '<script type="text/JavaScript">parent.document.title = \''.$dtitle.'\';if(parent.$(\'admincpnav\')) parent.$(\'admincpnav\').innerHTML=\''.$title.$addtomenu.'\';</script>';
}

function showmenu($key, $menus, $return = 0) {
	$body = '';
	if(is_array($menus)) {
		foreach($menus as $menu) {
			if($menu[0] && $menu[1]) {
				list($action, $operation, $do) = explode('_', $menu[1]);
				$menu[1] = $action.($operation ? '&operation='.$operation.($do ? '&do='.$do : '') : '');
				$body .= '<li><a href="'.(substr($menu[1], 0, 4) == 'http' ? $menu[1] : ADMINSCRIPT.'?action='.$menu[1]).'" hidefocus="true" target="'.($menu[2] ? $menu[2] : 'main').'"'.($menu[3] ? $menu[3] : '').'><em onclick="menuNewwin(this)" title="'.cplang('nav_newwin').'"></em>'.cplang($menu[0]).'</a></li>';
			}
		}
	}
	if(!$return) {
		echo '<ul id="menu_'.$key.'" style="display: none">'.$body.'</ul>';
	} else {
		return $body;
	}
}

function updatemenu($key) {
	@include DISCUZ_ROOT.'./source/admincp/admincp_menu.php';
	$s = showmenu($key, $menu[$key], 1);
	echo '<script type="text/JavaScript">parent.$(\'menu_'.$key.'\').innerHTML = \''.str_replace("'", "\'", $s).'\';parent.initCpMenus(\'leftmenu\');parent.$(\'cmain\').innerHTML = parent.initCpMap();</script>';
}

function cpmsg_error($message, $url = '', $extra = '', $halt = TRUE) {
	return cpmsg($message, $url, 'error', array(), $extra, $halt);
}

function cpmsg($message, $url = '', $type = '', $values = array(), $extra = '', $halt = TRUE) {
	global $_G;
	$vars = explode(':', $message);
	if(count($vars) == 2) {
		$message = lang('plugin/'.$vars[0], $vars[1], $values);
	} else {
		$message = cplang($message, $values);
	}
	switch($type) {
		case 'download':
		case 'succeed': $classname = 'infotitle2';break;
		case 'error': $classname = 'infotitle3';break;
		case 'loadingform': case 'loading': $classname = 'infotitle1';break;
		default: $classname = 'marginbot normal';break;
	}
	if($url) {
		$url = substr($url, 0, 5) == 'http:' ? $url : ADMINSCRIPT.'?'.$url;
	}
	$message = "<h4 class=\"$classname\">$message</h4>";
	$url .= $url && !empty($_G['gp_scrolltop']) ? '&scrolltop='.intval($_G['gp_scrolltop']) : '';

	if($type == 'form') {
		$message = "<form method=\"post\" action=\"$url\"><input type=\"hidden\" name=\"formhash\" value=\"".FORMHASH."\">".
			"<br />$message$extra<br />".
			"<p class=\"margintop\"><input type=\"submit\" class=\"btn\" name=\"confirmed\" value=\"".cplang('ok')."\"> &nbsp; \n".
			"<script type=\"text/javascript\">".
			"if(history.length > (BROWSER.ie ? 0 : 1)) document.write('<input type=\"button\" class=\"btn\" value=\"".cplang('cancel')."\" onClick=\"history.go(-1);\">');".
			"</script>".
			"</p></form><br />";
	} elseif($type == 'loadingform') {
		$message = "<form method=\"post\" action=\"$url\" id=\"loadingform\"><input type=\"hidden\" name=\"formhash\" value=\"".FORMHASH."\"><br />$message$extra<img src=\"static/image/admincp/ajax_loader.gif\" class=\"marginbot\" /><br />".
			'<p class="marginbot"><a href="###" onclick="$(\'loadingform\').submit();" class="lightlink">'.cplang('message_redirect').'</a></p></form><br /><script type="text/JavaScript">setTimeout("$(\'loadingform\').submit();", 2000);</script>';
	} else {
		$message .= $extra.($type == 'loading' ? '<img src="static/image/admincp/ajax_loader.gif" class="marginbot" />' : '');
		$return = cplang('return');
		if($url) {
			if($type == 'button') {
				$message = "<br />$message<br /><p class=\"margintop\"><input type=\"submit\" class=\"btn\" name=\"submit\" value=\"".cplang('start')."\" onclick=\"location.href='$url'\" />";
			} else {
				$message .= '<p class="marginbot"><a href="'.$url.'" class="lightlink">'.cplang($type == 'download' ? 'message_download' : 'message_redirect').'</a></p>';
				$message .= "<script type=\"text/JavaScript\">setTimeout(\"redirect('$url');\", 2000);</script>";
			}
		} elseif(strpos($message, $return)) {
			$message .= '<p class="marginbot">'.
			"<script type=\"text/javascript\">".
			"if(history.length > (BROWSER.ie ? 0 : 1)) document.write('<a href=\"javascript:history.go(-1);\" class=\"lightlink\">".cplang('message_return')."</a>');".
			"</script>".
			'</p>';
		}
	}

	if($halt) {
		echo '<h3>'.cplang('discuz_message').'</h3><div class="infobox">'.$message.'</div>';
		exit();
	} else {
		echo '<div class="infobox">'.$message.'</div>';
	}
}

function cpheader() {
	global $_G;

	if(!defined('DISCUZ_CP_HEADER_OUTPUT')) {
		define('DISCUZ_CP_HEADER_OUTPUT', true);
	} else {
		return true;
	}
	$IMGDIR = $_G['style']['imgdir'];
	$STYLEID = $_G['setting']['styleid'];
	$VERHASH = $_G['style']['verhash'];
	$frame = getgpc('frame') != 'no' ? 1 : 0;
	$charset = CHARSET;
	$basescript = ADMINSCRIPT;
	echo <<<EOT

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$charset">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link href="static/image/admincp/admincp.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script type="text/JavaScript">
var admincpfilename = '$basescript', IMGDIR = '$IMGDIR', STYLEID = '$STYLEID', VERHASH = '$VERHASH', IN_ADMINCP = true, ISFRAME = $frame, STATICURL='static/', SITEURL = '$_G[siteurl]';
</script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="static/js/admincp.js" type="text/javascript"></script>
<script type="text/javascript">
if(ISFRAME && !parent.document.getElementById('leftmenu')) {
	redirect(admincpfilename + '?frames=yes&' + document.URL.substr(document.URL.indexOf(admincpfilename) + 10));
}
</script>
<div id="append_parent"></div>
<div class="container" id="cpcontainer">
EOT;

	if(empty($_G['inajax'])) {
		register_shutdown_function('cpfooter');
	}
}

function showsubmenu($title, $menus = array(), $right = '', $replace = array()) {
	if(empty($menus)) {
		$s = '<div class="itemtitle">'.$right.'<h3>'.cplang($title, $replace).'</h3></div>';
	} elseif(is_array($menus)) {
		$s = '<div class="itemtitle">'.$right.'<h3>'.cplang($title, $replace).'</h3>';
		if(is_array($menus)) {
			$s .= '<ul class="tab1">';
			foreach($menus as $k => $menu) {
				if(is_array($menu[0])) {
					$s .= '<li id="addjs'.$k.'" class="'.($menu[2] ? ' current' : 'hasdropmenu').'" onmouseover="dropmenu(this);"><a href="#"><span>'.cplang($menu[0]['menu']).'<em>&nbsp;&nbsp;</em></span></a><div id="addjs'.$k.'child" class="dropmenu" style="display:none;">';
					if(is_array($menu[0]['submenu'])) {
						foreach($menu[0]['submenu'] as $submenu) {
							$s .= $submenu[1] ? '<a href="'.ADMINSCRIPT.'?action='.$submenu[1].'" onclick="'.$submenu[2].'">'.cplang($submenu[0]).'</a>' : '<a><b>'.cplang($submenu[0]).'</b></a>';
						}
					}
					$s .= '</div></li>';
				} else {
					$s .= '<li'.($menu[2] ? ' class="current"' : '').'><a href="'.(!$menu[4] ? ADMINSCRIPT.'?action='.$menu[1] : $menu[1]).'"'.(!empty($menu[3]) ? ' target="_blank"' : '').'><span>'.cplang($menu[0]).'</span></a></li>';
				}
			}
			$s .= '</ul>';
		}
		$s .= '</div>';
	}
	echo !empty($menus) ? '<div class="floattop">'.$s.'</div><div class="floattopempty"></div>' : $s;
}

function showsubmenusteps($title, $menus = array()) {
	$s = '<div class="itemtitle">'.($title ? '<h3>'.cplang($title).'</h3>' : '');
	if(is_array($menus)) {
		$s .= '<ul class="stepstat">';
			$i = 0;
		foreach($menus as $menu) {
			$i++;
			$s .= '<li'.($menu[1] ? ' class="current"' : '').' id="step'.$i.'">'.$i.'.'.cplang($menu[0]).'</li>';
		}
		$s .= '</ul>';
	}
	$s .= '</div>';
	echo $s;
}

function showsubmenuanchors($title, $menus = array(), $right = '') {
	if(!$title || !$menus || !is_array($menus)) {
		return;
	}
	echo <<<EOT
<script type="text/JavaScript">var currentAnchor = '$GLOBALS[anchor]';</script>
EOT;
	$s = '<div class="itemtitle">'.$right.'<h3>'.cplang($title).'</h3>';
	$s .= '<ul class="tab1" id="submenu">';
	foreach($menus as $k => $menu) {
		if($menu && is_array($menu)) {
			if(is_array($menu[0])) {
				$s .= '<li id="nav_m'.$k.'" class="hasdropmenu" onmouseover="dropmenu(this);"><a href="#"><span>'.cplang($menu[0]['menu']).'<em>&nbsp;&nbsp;</em></span></a><div id="nav_m'.$k.'child" class="dropmenu" style="display:none;"><ul>';
				if(is_array($menu[0]['submenu'])) {
					foreach($menu[0]['submenu'] as $submenu) {
						$s .= '<li '.(!$submenu[3] ? ' id="nav_'.$submenu[1].'" onclick="showanchor(this)"' : '').($submenu[2] ? ' class="current"' : '').'><a href="'.($submenu[3] ? ADMINSCRIPT.'?action='.$submenu[1] : '#').'">'.cplang($submenu[0]).'</a></li>';
					}
				}
				$s .= '</ul></div></li>';
			} else {
				$s .= '<li'.(!$menu[3] ? ' id="nav_'.$menu[1].'" onclick="showanchor(this)"' : '').($menu[2] ? ' class="current"' : '').'><a href="'.($menu[3] ? ADMINSCRIPT.'?action='.$menu[1] : '#').'"><span>'.cplang($menu[0]).'</span></a></li>';
			}
		}
	}
	$s .= '</ul>';
	$s .= '</div>';
	echo !empty($menus) ? '<div class="floattop">'.$s.'</div><div class="floattopempty"></div>' : $s;
}

function showtips($tips, $id = 'tips', $display = TRUE) {
	$tips = cplang($tips);
	$tips = preg_replace('#</li>\s*<li>#i', '</li><li>', $tips);
	$tmp = explode('</li><li>', substr($tips, 4, -5));
	if(count($tmp) > 4) {
		$tips = '<li>'.$tmp[0].'</li><li>'.$tmp[1].'</li><li id="'.$id.'_more" style="border: none; background: none; margin-bottom: 6px;"><a href="###" onclick="var tiplis = $(\''.$id.'lis\').getElementsByTagName(\'li\');for(var i = 0; i < tiplis.length; i++){tiplis[i].style.display=\'\'}$(\''.$id.'_more\').style.display=\'none\';">'.cplang('tips_all').'...</a></li>';
		foreach($tmp AS $k => $v) {
			if($k > 1) {
				$tips .= '<li style="display: none">'.$v.'</li>';
			}
		}
	}
	unset($tmp);
	showtableheader('tips', '', 'id="'.$id.'"'.(!$display ? ' style="display: none;"' : ''), 0);
	showtablerow('', 'class="tipsblock"', '<ul id="'.$id.'lis">'.$tips.'</ul>');
	showtablefooter();
}

function showformheader($action, $extra = '', $name = 'cpform', $method = 'post') {
	global $_G;
	$anchor = isset($_G['gp_anchor']) ? htmlspecialchars($_G['gp_anchor']) : '';
	echo '<form name="'.$name.'" method="'.$method.'" autocomplete="off" action="'.ADMINSCRIPT.'?action='.$action.'" id="'.$name.'"'.($extra == 'enctype' ? ' enctype="multipart/form-data"' : " $extra").'>'.
		'<input type="hidden" name="formhash" value="'.FORMHASH.'" />'.
		'<input type="hidden" id="formscrolltop" name="scrolltop" value="" />'.
		'<input type="hidden" name="anchor" value="'.$anchor.'" />';
}

function showhiddenfields($hiddenfields = array()) {
	if(is_array($hiddenfields)) {
		foreach($hiddenfields as $key => $val) {
			$val = is_string($val) ? htmlspecialchars($val) : $val;
			echo "\n<input type=\"hidden\" name=\"$key\" value=\"$val\">";
		}
	}
}

function showtableheader($title = '', $classname = '', $extra = '', $titlespan = 15) {
	global $_G;
	$classname = str_replace(array('nobottom', 'notop'), array('nobdb', 'nobdt'), $classname);
	if(isset($_G['showsetting_multi'])) {
		if($_G['showsetting_multi'] == 0) {
			$extra .= ' style="width:'.($_G['showsetting_multicount'] * 270 + 20).'px"';
		} else {
			return;
		}
	}
	echo "\n".'<table class="tb tb2 '.$classname.'"'.($extra ? " $extra" : '').'>';
	if($title) {
		$span = $titlespan ? 'colspan="'.$titlespan.'"' : '';
		echo "\n".'<tr><th '.$span.' class="partition">'.cplang($title).'</th></tr>';
		showmultititle();
	}
}

function showmultititle() {
	global $_G;
	if(isset($_G['showtableheader_multi']) && $_G['showsetting_multi'] == 0) {
		echo '<tr><td class="tbm">';
		foreach($_G['showtableheader_multi'] as $row) {
			echo '<div class="multicol">'.$row.'</div>';
		}
		echo '</td></tr>';
	}
}

function showtagheader($tagname, $id, $display = FALSE, $classname = '') {
	global $_G;
	if(!empty($_G['showsetting_multi'])) {
		return;
	}
	echo '<'.$tagname.($classname ? " class=\"$classname\"" : '').' id="'.$id.'"'.($display ? '' : ' style="display: none"').'>';
}

function showtitle($title, $extra = '') {
	global $_G;
	if(!empty($_G['showsetting_multi'])) {
		return;
	}
	echo "\n".'<tr'.($extra ? " $extra" : '').'><th colspan="15" class="partition">'.cplang($title).'</th></tr>';
	showmultititle();
}

function showsubtitle($title = array(), $rowclass='header') {
	if(is_array($title)) {
		$subtitle = "\n<tr class=\"$rowclass\">";
		foreach($title as $v) {
			if($v !== NULL) {
				$subtitle .= '<th>'.cplang($v).'</th>';
			}
		}
		$subtitle .= '</tr>';
		echo $subtitle;
	}
}

function showtablerow($trstyle = '', $tdstyle = array(), $tdtext = array(), $return = FALSE) {
	$rowswapclass = '';
	if(!preg_match('/class\s*=\s*[\'"]([^\'"<>]+)[\'"]/i', $trstyle, $matches)) {
		$rowswapclass = is_array($tdtext) && count($tdtext) > 2 ? ' class="hover"' : '';
	} else {
		if(is_array($tdtext) && count($tdtext) > 2) {
			$rowswapclass = " class=\"{$matches[1]} hover\"";
			$trstyle = preg_replace('/class\s*=\s*[\'"]([^\'"<>]+)[\'"]/i', '', $trstyle);
		}
	}
	$cells = "\n".'<tr'.($trstyle ? ' '.$trstyle : '').$rowswapclass.'>';
	if(isset($tdtext)) {
		if(is_array($tdtext)) {
			foreach($tdtext as $key => $td) {
					$cells .= '<td'.(is_array($tdstyle) && !empty($tdstyle[$key]) ? ' '.$tdstyle[$key] : '').'>'.$td.'</td>';
			}
		} else {
			$cells .= '<td'.(!empty($tdstyle) && is_string($tdstyle) ? ' '.$tdstyle : '').'>'.$tdtext.'</td>';
		}
	}
	$cells .= '</tr>';
	if($return) {
		return $cells;
	}
	echo $cells;
}

function showsetting($setname, $varname, $value, $type = 'radio', $disabled = '', $hidden = 0, $comment = '', $extra = '', $setid = '') {

	global $_G;
	$s = "\n";
	$check = array();
	$check['disabled'] = $disabled ? ($disabled == 'readonly' ? ' readonly' : ' disabled') : '';
	$check['disabledaltstyle'] = $disabled ? ', 1' : '';

	$nocomment = false;

	if(isset($_G['showsetting_multi'])) {
		$hidden = 0;
		if(is_array($varname)) {
			$varnameid = '_'.str_replace(array('[', ']'), '_', $varname[0]).'|'.$_G['showsetting_multi'];
			$varname[0] = preg_replace('/\w+new/', 'multinew['.$_G['showsetting_multi'].'][\\0]', $varname[0]);
		} else {
			$varnameid = '_'.str_replace(array('[', ']'), '_', $varname).'|'.$_G['showsetting_multi'];
			$varname = preg_replace('/\w+new/', 'multinew['.$_G['showsetting_multi'].'][\\0]', $varname);
		}
	} else {
		$varnameid = '';
	}

	if($type == 'radio') {
		$value ? $check['true'] = "checked" : $check['false'] = "checked";
		$value ? $check['false'] = '' : $check['true'] = '';
		$check['hidden1'] = $hidden ? ' onclick="$(\'hidden_'.$setname.'\').style.display = \'\';"' : '';
		$check['hidden0'] = $hidden ? ' onclick="$(\'hidden_'.$setname.'\').style.display = \'none\';"' : '';
		$onclick = $disabled && $disabled == 'readonly' ? ' onclick="return false"' : '';
		$s .= '<ul onmouseover="altStyle(this'.$check['disabledaltstyle'].');">'.
			'<li'.($check['true'] ? ' class="checked"' : '').'><input class="radio" type="radio"'.($varnameid ? ' id="_v1_'.$varnameid.'"' : '').' name="'.$varname.'" value="1" '.$check['true'].$check['hidden1'].$check['disabled'].$onclick.'>&nbsp;'.cplang('yes').'</li>'.
			'<li'.($check['false'] ? ' class="checked"' : '').'><input class="radio" type="radio"'.($varnameid ? ' id="_v0_'.$varnameid.'"' : '').' name="'.$varname.'" value="0" '.$check['false'].$check['hidden0'].$check['disabled'].$onclick.'>&nbsp;'.cplang('no').'</li>'.
			'</ul>';
	} elseif($type == 'text' || $type == 'password' || $type == 'number') {
		$s .= '<input name="'.$varname.'" value="'.dhtmlspecialchars($value).'" type="'.$type.'" class="txt" '.$check['disabled'].' '.$extra.' />';
	} elseif($type == 'file') {
		$s .= '<input name="'.$varname.'" value="" type="file" class="txt uploadbtn marginbot" '.$check['disabled'].' '.$extra.' />';
	} elseif($type == 'filetext') {
		$defaulttype = $value ? 1 : 0;
		$id = 'file'.random(2);
		$s .= '<input id="'.$id.'_0" style="display:'.($defaulttype ? 'none' : '').'" name="'.($defaulttype ? 'TMP' : '').$varname.'" value="" type="file" class="txt uploadbtn marginbot" '.$check['disabled'].' '.$extra.' />'.
			'<input id="'.$id.'_1" style="display:'.(!$defaulttype ? 'none' : '').'" name="'.(!$defaulttype ? 'TMP' : '').$varname.'" value="'.dhtmlspecialchars($value).'" type="text" class="txt marginbot" '.$extra.' /><br />'.
			'<a id="'.$id.'_0a" style="'.(!$defaulttype ? 'font-weight:bold' : '').'" href="javascript:;" onclick="$(\''.$id.'_1a\').style.fontWeight = \'\';this.style.fontWeight = \'bold\';$(\''.$id.'_1\').name = \'TMP'.$varname.'\';$(\''.$id.'_0\').name = \''.$varname.'\';$(\''.$id.'_0\').style.display = \'\';$(\''.$id.'_1\').style.display = \'none\'">'.cplang('switch_upload').'</a>&nbsp;'.
			'<a id="'.$id.'_1a" style="'.($defaulttype ? 'font-weight:bold' : '').'" href="javascript:;" onclick="$(\''.$id.'_0a\').style.fontWeight = \'\';this.style.fontWeight = \'bold\';$(\''.$id.'_0\').name = \'TMP'.$varname.'\';$(\''.$id.'_1\').name = \''.$varname.'\';$(\''.$id.'_1\').style.display = \'\';$(\''.$id.'_0\').style.display = \'none\'">'.cplang('switch_url').'</a>';
	} elseif($type == 'textarea') {
		$readonly = $disabled ? 'readonly' : '';
		$s .= "<textarea $readonly rows=\"6\" ".(!isset($_G['showsetting_multi']) ? "ondblclick=\"textareasize(this, 1)\"" : '')." onkeyup=\"textareasize(this, 0)\" name=\"$varname\" id=\"$varname\" cols=\"50\" class=\"tarea\" '.$extra.'>".dhtmlspecialchars($value)."</textarea>";
	} elseif($type == 'select') {
		$s .= '<select name="'.$varname[0].'" '.$extra.'>';
		foreach($varname[1] as $option) {
			$selected = $option[0] == $value ? 'selected="selected"' : '';
			$s .= "<option value=\"$option[0]\" $selected>".$option[1]."</option>\n";
		}
		$s .= '</select>';
	} elseif($type == 'mradio' || $type == 'mradio2') {
		$nocomment = $type == 'mradio2' && !isset($_G['showsetting_multi']) ? true : false;
		$addstyle = $nocomment ? ' style="float: left; width: 18%"' : '';
		$ulstyle = $nocomment ? ' style="width: 830px"' : '';
		if(is_array($varname)) {
			$radiocheck = array($value => ' checked');
			$s .= '<ul'.(empty($varname[2]) ?  ' class="nofloat"' : '').' onmouseover="altStyle(this'.$check['disabledaltstyle'].');"'.$ulstyle.'>';
			foreach($varname[1] as $varary) {
				if(is_array($varary) && !empty($varary)) {
					$onclick = '';
					if(!isset($_G['showsetting_multi']) && !empty($varary[2])) {
						foreach($varary[2] as $ctrlid => $display) {
							$onclick .= '$(\''.$ctrlid.'\').style.display = \''.$display.'\';';
						}
					}
					$onclick && $onclick = ' onclick="'.$onclick.'"';
					$s .= '<li'.($radiocheck[$varary[0]] ? ' class="checked"' : '').$addstyle.'><input class="radio" type="radio"'.($varnameid ? ' id="_v'.md5($varary[0]).'_'.$varnameid.'"' : '').' name="'.$varname[0].'" value="'.$varary[0].'"'.$radiocheck[$varary[0]].$check['disabled'].$onclick.'>&nbsp;'.$varary[1].'</li>';
				}
			}
			$s .= '</ul>';
		}
	} elseif($type == 'mcheckbox' || $type == 'mcheckbox2') {
		$nocomment = $type != 'mcheckbox2' && count($varname[1]) > 3 && !isset($_G['showsetting_multi']) ? true : false;
		$addstyle = $nocomment ? ' style="float: left; width: 18%"' : '';
		$ulstyle = $nocomment ? ' style="width: 830px"' : '';
		$s .= '<ul class="nofloat" onmouseover="altStyle(this'.$check['disabledaltstyle'].');"'.$ulstyle.'>';
		foreach($varname[1] as $varary) {
			if(is_array($varary) && !empty($varary)) {
				$onclick = !isset($_G['showsetting_multi']) && !empty($varary[2]) ? ' onclick="$(\''.$varary[2].'\').style.display = $(\''.$varary[2].'\').style.display == \'none\' ? \'\' : \'none\';"' : '';
				$checked = is_array($value) && in_array($varary[0], $value) ? ' checked' : '';
				$s .= '<li'.($checked ? ' class="checked"' : '').$addstyle.'><input class="checkbox" type="checkbox"'.($varnameid ? ' id="_v'.md5($varary[0]).'_'.$varnameid.'"' : '').' name="'.$varname[0].'[]" value="'.$varary[0].'"'.$checked.$check['disabled'].$onclick.'>&nbsp;'.$varary[1].'</li>';
			}
		}
		$s .= '</ul>';
	} elseif($type == 'binmcheckbox') {
		$checkboxs = count($varname[1]);
		$value = sprintf('%0'.$checkboxs.'b', $value);$i = 1;
		$s .= '<ul class="nofloat" onmouseover="altStyle(this'.$check['disabledaltstyle'].');">';
		foreach($varname[1] as $key => $var) {
			$s .= '<li'.($value{$checkboxs - $i} ? ' class="checked"' : '').'><input class="checkbox" type="checkbox"'.($varnameid ? ' id="_v'.md5($i).'_'.$varnameid.'"' : '').' name="'.$varname[0].'['.$i.']" value="1"'.($value{$checkboxs - $i} ? ' checked' : '').' '.(!empty($varname[2][$key]) ? $varname[2][$key] : '').'>&nbsp;'.$var.'</li>';
			$i++;
		}
		$s .= '</ul>';
	} elseif($type == 'omcheckbox') {
		$nocomment = count($varname[1]) > 3 ? true : false;
		$addstyle = $nocomment ? 'style="float: left; width: 18%"' : '';
		$ulstyle = $nocomment ? 'style="width: 830px"' : '';
		$s .= '<ul onmouseover="altStyle(this'.$check['disabledaltstyle'].');"'.(empty($varname[2]) ? ' class="nofloat"' : 'class="ckbox"').' '.$ulstyle.'>';
		foreach($varname[1] as $varary) {
			if(is_array($varary) && !empty($varary)) {
				$checked = is_array($value) && $value[$varary[0]] ? ' checked' : '';
				$s .= '<li'.($checked ? ' class="checked"' : '').' '.$addstyle.'><input class="checkbox" type="checkbox" name="'.$varname[0].'['.$varary[0].']" value="'.$varary[2].'"'.$checked.$check['disabled'].'>&nbsp;'.$varary[1].'</li>';
			}
		}
		$s .= '</ul>';
	} elseif($type == 'mselect') {
		$s .= '<select name="'.$varname[0].'" multiple="multiple" size="10" '.$extra.'>';
		foreach($varname[1] as $option) {
			$selected = is_array($value) && in_array($option[0], $value) ? 'selected="selected"' : '';
			$s .= "<option value=\"$option[0]\" $selected>".$option[1]."</option>\n";
		}
		$s .= '</select>';
	} elseif($type == 'color') {
		global $stylestuff;
		$preview_varname = str_replace('[', '_', str_replace(']', '', $varname));
		$code = explode(' ', $value);
		$css = '';
		for($i = 0; $i <= 1; $i++) {
			if($code[$i] != '') {
				if($code[$i]{0} == '#') {
					$css .= strtoupper($code[$i]).' ';
				} elseif(preg_match('/^http:\/\//i', $code[$i])) {
					$css .= 'url(\''.$code[$i].'\') ';
				} else {
					$css .= 'url(\''.$stylestuff['imgdir']['subst'].'/'.$code[$i].'\') ';
				}
			}
		}
		$background = trim($css);
		$colorid = ++$GLOBALS['coloridcount'];
		$s .= "<input id=\"c{$colorid}_v\" type=\"text\" class=\"txt\" style=\"float:left; width:210px;\" value=\"$value\" name=\"$varname\" onchange=\"updatecolorpreview('c{$colorid}')\">\n".
			"<input id=\"c$colorid\" onclick=\"c{$colorid}_frame.location='static/image/admincp/getcolor.htm?c{$colorid}|c{$colorid}_v';showMenu({'ctrlid':'c$colorid'})\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background: $background\"><span id=\"c{$colorid}_menu\" style=\"display: none\"><iframe name=\"c{$colorid}_frame\" src=\"\" frameborder=\"0\" width=\"210\" height=\"148\" scrolling=\"no\"></iframe></span>\n$extra";
	} elseif($type == 'calendar') {
		$s .= "<input type=\"text\" class=\"txt\" name=\"$varname\" value=\"".dhtmlspecialchars($value)."\" onclick=\"showcalendar(event, this".($extra ? ', 1' : '').")\">\n";
	} elseif(in_array($type, array('multiply', 'range', 'daterange'))) {
		$onclick = $type == 'daterange' ? ' onclick="showcalendar(event, this)"' : '';
		if(isset($_G['showsetting_multi'])) {
			$varname[1] = preg_replace('/\w+new/', 'multinew['.$_G['showsetting_multi'].'][\\0]', $varname[1]);
		}
		$s .= "<input type=\"text\" class=\"txt\" name=\"$varname[0]\" value=\"".dhtmlspecialchars($value[0])."\" style=\"width: 108px; margin-right: 5px;\"$onclick>".($type == 'multiply' ? ' X ' : ' -- ')."<input type=\"text\" class=\"txt\" name=\"$varname[1]\" value=\"".dhtmlspecialchars($value[1])."\"class=\"txt\" style=\"width: 108px; margin-left: 5px;\"$onclick>";
	} else {
		$s .= $type;
	}
	$name = cplang($setname);
	$name .= $name && substr($name, -1) != ':' ? ':' : '';
	$name = $disabled ? '<span class="lightfont">'.$name.'</span>' : $name;
	$setid = isset($_G['showsetting_multi']) ? 'S'.(!$setid ? substr(md5($setname), 0, 4) : $setid) : '';
	if(!isset($_G['showsetting_multi'])) {
		showtablerow('', 'colspan="2" class="td27"', $name);
	} else {
		if(empty($_G['showsetting_multijs'])) {
			$_G['setting_JS'] .= 'var ss = new Array();';
			$_G['showsetting_multijs'] = 1;
		}
		if($_G['showsetting_multi'] == 0) {
			showtablerow('', array('class="td27"'), array('<div id="D'.$setid.'"></div>'));
			$_G['setting_JS'] .= 'ss[\'D'.$setid.'\'] = new Array();';
		}
		$name = preg_replace("/\r\n|\n|\r/", '\n', addcslashes($name, "'\\"));
		$_G['setting_JS'] .= 'ss[\'D'.$setid.'\'] += \'<div class="multicol">'.$name.'</div>\';';
	}
	if(!$nocomment && ($type != 'omcheckbox' || $varname[2] != 'isfloat')) {
		if(!isset($_G['showsetting_multi'])) {
			showtablerow('class="noborder"', array('class="vtop rowform"', 'class="vtop tips2"'), array(
				$s,
				($comment ? $comment : cplang($setname.'_comment', false)).($type == 'textarea' ? '<br />'.cplang('tips_textarea') : '').
				($disabled ? '<br /><span class="smalltxt" style="color:#FF0000">'.cplang($setname.'_disabled', false).'</span>' : NULL)
			));
		} else {
			if($_G['showsetting_multi'] == 0) {
				showtablerow('class="noborder"', array('class="vtop rowform" style="width:auto"'), array(
					'<div id="'.$setid.'"></div>'
				));
				$_G['setting_JS'] .= 'ss[\''.$setid.'\'] = new Array();';
			}
			$s = preg_replace("/\r\n|\n|\r/", '\n', addcslashes($s, "'\\"));
			$_G['setting_JS'] .= 'ss[\''.$setid.'\'] += \'<div class="multicol">'.$s.'</div>\';';
		}
	} else {
		showtablerow('class="noborder"', array('colspan="2" class="vtop rowform"'), array($s));
	}

	if($hidden) {
		showtagheader('tbody', 'hidden_'.$setname, $value, 'sub');
	}

}

function showmulti() {
	global $_G;
	$_G['setting_JS'] .= <<<EOF
	for(i in ss) {
		$(i).innerHTML=ss[i];
	}
EOF;
}

function mradio($name, $items = array(), $checked = '', $float = TRUE) {
	$list = '<ul'.($float ?  '' : ' class="nofloat"').' onmouseover="altStyle(this);">';
	if(is_array($items)) {
		foreach($items as $value => $item) {
			$list .= '<li'.($checked == $value ? ' class="checked"' : '').'><input type="radio" name="'.$name.'" value="'.$value.'" class="radio"'.($checked == $value ? ' checked="checked"' : '').' /> '.$item.'</li>';
		}
	}
	$list .= '</ul>';
	return $list;
}

function mcheckbox($name, $items = array(), $checked = array()) {
	$list = '<ul class="dblist" onmouseover="altStyle(this);">';
	if(is_array($items)) {
		foreach($items as $value => $item) {
			$list .= '<li'.(empty($checked) || in_array($value, $checked) ? ' class="checked"' : '').'><input type="checkbox" name="'.$name.'[]" value="'.$value.'" class="checkbox"'.(empty($checked) || in_array($value, $checked) ? ' checked="checked"' : '').' /> '.$item.'</li>';
		}
	}
	$list .= '</ul>';
	return $list;
}

function showsubmit($name = '', $value = 'submit', $before = '', $after = '', $floatright = '', $entersubmit = true) {
	global $_G;
	if(!empty($_G['showsetting_multi'])) {
		return;
	}
	$str = '<tr>';
	$str .= $name && in_array($before, array('del', 'select_all', 'td')) ? '<td class="td25">'.($before != 'td' ? '<input type="checkbox" name="chkall" id="chkall'.($chkkallid = random(4)).'" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'delete\')" /><label for="chkall'.$chkkallid.'">'.cplang($before) : '').'</label></td>' : '';
	$str .= '<td colspan="15">';
	$str .= $floatright ? '<div class="cuspages right">'.$floatright.'</div>' : '';
	$str .= '<div class="fixsel">';
	$str .= $before && !in_array($before, array('del', 'select_all', 'td')) ? $before.' &nbsp;' : '';
	$str .= $name ? '<input type="submit" class="btn" id="submit_'.$name.'" name="'.$name.'" title="'.($entersubmit ? cplang('submit_tips') : '').'" value="'.cplang($value).'" />' : '';
	$after = $after == 'more_options' ? '<input class="checkbox" type="checkbox" value="1" onclick="$(\'advanceoption\').style.display = $(\'advanceoption\').style.display == \'none\' ? \'\' : \'none\'; this.value = this.value == 1 ? 0 : 1; this.checked = this.value == 1 ? false : true" id="btn_more" /><label for="btn_more">'.cplang('more_options').'</label>' : $after;
	$str = $after ? $str.(($before && $before != 'del') || $name ? ' &nbsp;' : '').$after : $str;
	$str .= '</div></td>';
	$str .= '</tr>';
	echo $str.($name && $entersubmit ? '<script type="text/JavaScript">_attachEvent(document.documentElement, \'keydown\', function (e) { entersubmit(e, \''.$name.'\'); });</script>' : '');
}

function showtagfooter($tagname) {
	global $_G;
	if(!empty($_G['showsetting_multi'])) {
		return;
	}
	echo '</'.$tagname.'>';
}

function showtablefooter() {
	global $_G;
	if(!empty($_G['showsetting_multi'])) {
		return;
	}
	echo '</table>'."\n";
}

function showformfooter() {
	global $_G;
	if(!empty($_G['setting_JS'])) {
		echo '<script type="text/JavaScript">'.$_G['setting_JS'].'</script>';
	}

	updatesession();

	echo '</form>'."\n";
	if($scrolltop = intval(getgpc('scrolltop'))) {
		echo '<script type="text/JavaScript">_attachEvent(window, \'load\', function () { scroll(0,'.$scrolltop.') }, document);</script>';
	}
}

function cpfooter() {
	global $_G, $admincp;
	if(defined('FOOTERDISABLED')) {
		exit;
	}

	require_once DISCUZ_ROOT.'./source/discuz_version.php';
	$version = DISCUZ_VERSION;
	$charset = CHARSET;

	echo "\n</div>";
	if(!empty($_GET['highlight'])) {
		$kws = explode(' ', $_GET['highlight']);
		echo '<script type="text/JavaScript">';
		foreach($kws as $kw) {
			echo 'parsetag(\''.htmlspecialchars($kw).'\');';
		}
		echo '</script>';
	}

	if(defined('DISCUZ_DEBUG') && DISCUZ_DEBUG && @include(libfile('function/debug'))) {
		function_exists('debugmessage') && debugmessage();
	}

	if($_G['adminid'] == 1 && $_GET['action'] == 'index') {
		$release = DISCUZ_RELEASE;

/*vot*/		$newsurl =  'http://customer.discuz.net/news.php?'.siteinformation();
		echo <<<EOT
<script type="text/javascript">
	var newhtml = '';
	newhtml += '<table class="tb tb2"><tr><th class="partition edited">'+lng['version_uptodate']+'</th></tr>';
	newhtml += '<tr><td class="tipsblock"><a href="http://faq.comsenz.com/checkversion.php?product=Discuz&version={$version}&release={$release}&charset={$charset}" target="_blank"><img src="{$newsurl}" onload="shownews()" /></a></td></tr></table>';
	\$('boardnews').style.display = 'none';
	\$('boardnews').innerHTML = newhtml;
	function shownews() {
		\$('boardnews').style.display = '';
	}
</script>
EOT;
	}

	echo "\n</body>\n</html>";

}

if(!function_exists('ajaxshowheader')) {
	function ajaxshowheader() {
		global $_G;
		ob_end_clean();
		@header("Expires: -1");
		@header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
		@header("Pragma: no-cache");
		header("Content-type: application/xml");
		echo "<?xml version=\"1.0\" encoding=\"".CHARSET."\"?>\n<root><![CDATA[";
	}
}

if(!function_exists('ajaxshowfooter')) {
	function ajaxshowfooter() {
		echo ']]></root>';
		exit();
	}
}

function showimportdata() {
	showsetting('import_type', array('importtype', array(
		array('file', cplang('import_type_file'), array('importfile' => '', 'importtxt' => 'none')),
		array('txt', cplang('import_type_txt'), array('importfile' => 'none', 'importtxt' => ''))
	)), 'file', 'mradio');
	showtagheader('tbody', 'importfile', TRUE);
	showsetting('import_file', 'importfile', '', 'file');
	showtagfooter('tbody');
	showtagheader('tbody', 'importtxt');
	showsetting('import_txt', 'importtxt', '', 'textarea');
	showtagfooter('tbody');
}

function getimportdata($name = '', $addslashes = 1, $ignoreerror = 0) {
	global $_G;
	if($_G['gp_importtype'] == 'file') {
		$data = @implode('', file($_FILES['importfile']['tmp_name']));
		@unlink($_FILES['importfile']['tmp_name']);
	} else {
		$data = $_G['gp_importtxt'] && MAGIC_QUOTES_GPC ? dstripslashes($_G['gp_importtxt']) : $GLOBALS['importtxt'];
	}
	require_once libfile('class/xml');
	$xmldata = xml2array($data);
	if(!is_array($xmldata) || !$xmldata) {
		cpmsg('import_data_invalid', '', 'error');
	} else {
		if($name && $name != $xmldata['Title']) {
			if(!$ignoreerror) {
				cpmsg('import_data_typeinvalid', '', 'error');
			} else {
				return array();
			}
		}
		$data = exportarray($xmldata['Data'], 0);
	}
	if($addslashes) {
		$data = daddslashes($data, 1);
	}
	return $data;
}

function exportdata($name, $filename, $data) {
	global $_G;
	require_once libfile('class/xml');
	$root = array(
		'Title' => $name,
		'Version' => $_G['setting']['version'],
		'Time' => dgmdate(TIMESTAMP, 'Y-m-d H:i'),
		'From' => $_G['setting']['bbname'].' ('.$_G['siteurl'].')',
		'Data' => exportarray($data, 1)
	);
	$filename = strtolower(str_replace(array('!', ' '), array('', '_'), $name)).'_'.$filename.'.xml';
	$plugin_export = array2xml($root, 1);
	ob_end_clean();
	dheader('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	dheader('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	dheader('Cache-Control: no-cache, must-revalidate');
	dheader('Pragma: no-cache');
	dheader('Content-Encoding: none');
	dheader('Content-Length: '.strlen($plugin_export));
	dheader('Content-Disposition: attachment; filename='.$filename);
	dheader('Content-Type: text/xml');
	echo $plugin_export;
	define('FOOTERDISABLED' , 1);
	exit();
}

function exportarray($array, $method) {
	$tmp = $array;
	if($method) {
		foreach($array as $k => $v) {
			if(is_array($v)) {
				$tmp[$k] = exportarray($v, 1);
			} else {
				$uv = unserialize($v);
				if($uv && is_array($uv)) {
					$tmp['__'.$k] = exportarray($uv, 1);
					unset($tmp[$k]);
				} else {
					$tmp[$k] = $v;
				}
			}
		}
	} else {
		foreach($array as $k => $v) {
			if(is_array($v)) {
				if(substr($k, 0, 2) == '__') {
					$tmp[substr($k, 2)] = serialize(exportarray($v, 0));
					unset($tmp[$k]);
				} else {
					$tmp[$k] = exportarray($v, 0);
				}
			} else {
				$tmp[$k] = $v;
			}
		}
	}
	return $tmp;
}

function getwheres($intkeys, $strkeys, $randkeys, $likekeys, $pre='') {

	$wherearr = array();
	$urls = array();

	foreach ($intkeys as $var) {
		$value = isset($_GET[$var])?$_GET[$var]:'';
		if(strlen($value)) {
			$wherearr[] = "{$pre}{$var}='".intval($value)."'";
			$urls[] = "$var=$value";
		}
	}

	foreach ($strkeys as $var) {
		$value = isset($_GET[$var])?trim($_GET[$var]):'';
		if(strlen($value)) {
			$wherearr[] = "{$pre}{$var}='$value'";
			$urls[] = "$var=".rawurlencode($value);
		}
	}

	foreach ($randkeys as $vars) {
		$value1 = isset($_GET[$vars[1].'1'])?$vars[0]($_GET[$vars[1].'1']):'';
		$value2 = isset($_GET[$vars[1].'2'])?$vars[0]($_GET[$vars[1].'2']):'';
		if($value1) {
			$wherearr[] = "{$pre}{$vars[1]}>='$value1'";
			$urls[] = "{$vars[1]}1=".rawurlencode($_GET[$vars[1].'1']);
		}
		if($value2) {
			$wherearr[] = "{$pre}{$vars[1]}<='$value2'";
			$urls[] = "{$vars[1]}2=".rawurlencode($_GET[$vars[1].'2']);
		}
	}

	foreach ($likekeys as $var) {
		$value = isset($_GET[$var])?stripsearchkey($_GET[$var]):'';
		if(strlen($value)>1) {
			$wherearr[] = "{$pre}{$var} LIKE BINARY '%$value%'";
			$urls[] = "$var=".rawurlencode($_GET[$var]);
		}
	}

	return array('wherearr'=>$wherearr, 'urls'=>$urls);
}

function getorders($alloworders, $default, $pre='') {
	$orders = array('sql'=>'', 'urls'=>array());
	if(empty($_GET['orderby']) || !in_array($_GET['orderby'], $alloworders)) {
		$_GET['orderby'] = $default;
		if(empty($_GET['ordersc'])) $_GET['ordersc'] = 'desc';
	}

	$orders['sql'] = " ORDER BY {$pre}$_GET[orderby] ";
	$orders['urls'][] = "orderby=$_GET[orderby]";

	if(!empty($_GET['ordersc']) && $_GET['ordersc'] == 'desc') {
		$orders['urls'][] = 'ordersc=desc';
		$orders['sql'] .= ' DESC ';
	} else {
		$orders['urls'][] = 'ordersc=asc';
	}
	return $orders;
}


function blog_replynum_stat($start, $perpage) {
	global $_G;

	$next = false;
	$updates = array();
	$query = DB::query("SELECT blogid, replynum FROM ".DB::table('home_blog')." LIMIT $start,$perpage");
	while ($value = DB::fetch($query)) {
		$next = true;
		$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('home_comment')." WHERE id='$value[blogid]' AND idtype='blogid'"),0);
		if($count != $value['replynum']) {
			$updates[$value['blogid']] = $count;
		}
	}
	if(empty($updates)) return $next;

	$nums = renum($updates);
	foreach ($nums[0] as $count) {
		DB::query("UPDATE ".DB::table('home_blog')." SET replynum=$count WHERE blogid IN (".dimplode($nums[1][$count]).")");
	}
	return $next;
}

function space_friendnum_stat($start, $perpage) {
	global $_G;

	$next = false;
	$updates = array();
	$query = DB::query("SELECT uid, friends FROM ".DB::table('common_member_count')." LIMIT $start,$perpage");
	while ($value = DB::fetch($query)) {
		$next = true;
		$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('home_friend')." WHERE uid='$value[uid]'"),0);
		if($count != $value['friends']) {
			$updates[$value['uid']] = $count;
		}
	}
	if(empty($updates)) return $next;

	$nums = renum($updates);
	foreach ($nums[0] as $count) {
		DB::query("UPDATE ".DB::table('common_member_count')." SET friends=$count WHERE uid IN (".dimplode($nums[1][$count]).")");
	}
	return $next;
}

function album_picnum_stat($start, $perpage) {
	global $_G;

	$next = false;
	$updates = array();
	$query = DB::query("SELECT albumid, picnum FROM ".DB::table('home_album')." LIMIT $start,$perpage");
	while ($value = DB::fetch($query)) {
		$next = true;
		$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('home_pic')." WHERE albumid='$value[albumid]'"),0);
		if($count != $value['picnum']) {
			$updates[$value['albumid']] = $count;
		}
	}
	if(empty($updates)) return $next;

	$nums = renum($updates);
	foreach ($nums[0] as $count) {
		DB::query("UPDATE ".DB::table('home_album')." SET picnum=$count WHERE albumid IN (".dimplode($nums[1][$count]).")");
	}
	return $next;
}

function get_custommenu() {
	global $_G;
	$custommenu = array();
	$query = DB::query("SELECT sort, title, url FROM ".DB::table('common_admincp_cmenu')." WHERE uid='$_G[uid]' AND sort='1' ORDER BY displayorder");
	while($custom = DB::fetch($query)) {
		$custom['url'] = substr(rawurldecode($custom['url']), strlen(ADMINSCRIPT) + 8);
		$custommenu[] = array($custom['title'], $custom['url']);
	}
	return $custommenu;
}

function get_pluginsetting($type) {
	$pluginsetting = $pluginvalue = array();
	@include_once DISCUZ_ROOT.'./data/cache/cache_pluginsetting.php';
	$pluginsetting = isset($pluginsetting[$type]) ? $pluginsetting[$type] : array();

	$varids = array();
	foreach($pluginsetting as $v) {
		foreach($v['setting'] as $varid => $var) {
			$varids[] = $varid;
		}
	}
	if($varids) {
		$query = DB::query("SELECT pluginvarid, value FROM ".DB::table('common_pluginvar')." WHERE pluginvarid IN (".dimplode($varids).")");
		while($plugin = DB::fetch($query)) {
			$values = (array)unserialize($plugin['value']);
			foreach($values as $id => $value) {
				$pluginvalue[$id][$plugin['pluginvarid']] = $value;
			}
		}
	}

	return array($pluginsetting, $pluginvalue);
}

function set_pluginsetting($pluginvars) {
	foreach($pluginvars as $varid => $value) {
		$valuenew = unserialize(DB::result_first("SELECT value FROM ".DB::table('common_pluginvar')." WHERE pluginvarid='$varid'"));
		$valuenew = is_array($valuenew) ? $valuenew : array();
		foreach($value as $k => $v) {
			$valuenew[$k] = $v;
		}
		DB::update('common_pluginvar', array('value' => addslashes(serialize($valuenew))), "pluginvarid='$varid'");
	}
	updatecache('plugin');
}

function checkformulaperm($formula) {
	$formula = preg_replace('/(\{([\d\.\-]+?)\})/', "'\\1'", $formula);
	return checkformulasyntax(
		$formula,
		array('+', '-', '*', '/', '(', ')', '<', '=', '>', '!', 'and', 'or', ' ', '{', '}', "'"),
		array('regdate', 'regday', 'regip', 'lastip', 'buyercredit', 'sellercredit', 'digestposts', 'posts', 'threads', 'oltime', 'extcredits[1-8]', 'field[\d]+')
	);
}

?>