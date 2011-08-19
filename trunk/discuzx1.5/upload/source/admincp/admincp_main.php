<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_main.php 15075 2010-08-18 10:02:01Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

lang('admincp_menu');

$extra = cpurl('url');
$extra = $extra && getgpc('action') ? $extra : 'action=index';
$charset = CHARSET;
$title = cplang('admincp_title');
$header_welcome = cplang('header_welcome');
$header_logout = cplang('header_logout');
$header_bbs = cplang('header_bbs');
$cpadmingroup = isfounder() ? cplang('founder_admin') : ($GLOBALS['admincp']->adminsession['cpgroupid'] ? DB::result_first("SELECT cpgroupname FROM ".DB::table('common_admincp_group')." WHERE cpgroupid='".$GLOBALS['admincp']->adminsession['cpgroupid']."'") : cplang('founder_master'));

require './source/admincp/admincp_menu.php';
$basescript = ADMINSCRIPT;
echo <<<EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>$title</title>
<meta http-equiv="Content-Type" content="text/html; charset=$charset">
<meta content="Comsenz Inc." name="Copyright" />
<link rel="stylesheet" href="static/image/admincp/admincp.css" type="text/css" media="all" />
<script src="static/js/common.js" type="text/javascript"></script>
</head>
<body style="margin: 0px" scroll="no">
<div id="append_parent"></div>
<table id="frametable" cellpadding="0" cellspacing="0" width="100%" height="100%">
<tr>
<td colspan="2" height="90">
<div class="mainhd">
<div class="logo">Discuz! Administrator's Control Panel</div>
<div class="uinfo" id="frameuinfo">
<p>$header_welcome, $cpadmingroup <em>{$_G['member']['username']}</em> [ <a href="$basescript?action=logout" target="_top">$header_logout</a> ]</p>
<p class="btnlink"><a href="index.php" target="_blank">$header_bbs</a></p>
</div>
<div class="navbg"></div>
<div class="nav">
<ul id="topmenu">

EOT;
foreach($topmenu as $k => $v) {
	if($v === '') {
		$v = @array_keys($menu[$k]);
		$v = $menu[$k][$v[0]][1];
	}
	showheader($k, $v);
}

$uc_api_url = '';
if($isfounder) {
	loaducenter();
	$uc_api_url = UC_API;
	echo '<li><em><a id="header_uc" hidefocus="true" href="'.UC_API.'/admin.php?m=frame" onmouseover="previewheader(\'uc\')" onmouseout="previewheader()" onclick="uc_login=1;toggleMenu(\'uc\', \'\');doane(event);">'.cplang('header_uc').'</a></em></li>';
	$topmenu['uc'] = '';
}

$headers = "'".implode("','", array_keys($topmenu))."'";

echo <<<EOT

</ul>
<div class="currentloca">
<p id="admincpnav"></p>
</div>
<div class="navbd"></div>
<div class="sitemapbtn">
	<div style="float: left; margin:-7px 10px 0 0"><form name="search" method="post" autocomplete="off" action="$basescript?action=search" target="main"><input type="text" name="keywords" value="" class="txt" /> <input type="hidden" name="searchsubmit" value="yes" class="btn" /><input type="submit" name="searchsubmit" value="$lang[search]" class="btn" style="margin-top: 5px;vertical-align:middle" /></form></div>
	<span id="add2custom" style="display: none"></span>
	<a href="###" id="cpmap" onclick="showMap();return false;"><img src="static/image/admincp/btn_map.gif" title="$lang[admincp_maptext]" width="46" height="18" /></a>
</div>
</div>
</div>
</td>
</tr>
<tr>
<td valign="top" width="160" class="menutd">
<div id="leftmenu" class="menu">

EOT;

foreach ($menu as $k => $v) {
	showmenu($k, $v);
}
unset($menu);

$plugindefaultkey = $isfounder ? 1 : 0;

echo <<<EOT

</div>
</td>
<td valign="top" width="100%" class="mask">
	<iframe src="$basescript?$extra" id="main" name="main" width="100%" height="100%" frameborder="0" scrolling="yes" style="overflow: visible;display:"></iframe>
</td>
</tr>
</table>
<div id="scrolllink" style="display: none">
	<span onclick="menuScroll(1)"><img src="static/image/admincp/scrollu.gif" /></span>
	<span onclick="menuScroll(2)"><img src="static/image/admincp/scrolld.gif" /></span>
</div>
<div class="copyright">
	<p>Powered by <a href="http://www.discuz.net/" target="_blank">Discuz!</a>{$_G['setting']['version']}, Release {$_G['setting']['release']}</p>
	<p>&copy; 2001-2010, <a href="http://www.comsenz.com/" target="_blank">Comsenz Inc.</a></p>
	<p>English Version by<br><strong>Valery&nbsp;Votintsev</strong></p>
</div>

<div id="cpmap_menu" class="custom" style="display: none">
	<div class="cmain" id="cmain"></div>
	<div class="cfixbd"></div>
</div>

<script type="text/JavaScript">
	var headers = new Array($headers), admincpfilename = '$basescript', menukey = '';
	function switchheader(key) {
		if(!key || !$('header_' + key)) {
			return;
		}
		for(var k in top.headers) {
			if($('menu_' + headers[k])) {
				$('menu_' + headers[k]).style.display = headers[k] == key ? '' : 'none';
			}
		}
		var lis = $('topmenu').getElementsByTagName('li');
		for(var i = 0; i < lis.length; i++) {
			if(lis[i].className == 'navon') lis[i].className = '';
		}
		$('header_' + key).parentNode.parentNode.className = 'navon';
	}
	var headerST = null;
	function previewheader(key) {
		if(key) {
			headerST = setTimeout(function() {
				for(var k in top.headers) {
					if($('menu_' + headers[k])) {
						$('menu_' + headers[k]).style.display = headers[k] == key ? '' : 'none';
					}
				}
				var hrefs = $('menu_' + key).getElementsByTagName('a');
				for(var j = 0; j < hrefs.length; j++) {
					hrefs[j].className = '';
				}
			}, 1000);
		} else {
			clearTimeout(headerST);
		}
	}
	function toggleMenu(key, url) {
		menukey = key;
		switchheader(key);
		if(url) {
			parent.main.location = admincpfilename + '?action=' + url;
			var hrefs = $('menu_' + key).getElementsByTagName('a');
			for(var j = 0; j < hrefs.length; j++) {
				hrefs[j].className = j == (key == 'plugin' ? $plugindefaultkey : 0) ? 'tabon' : '';
			}
		}
		if(key == 'uc') {
			parent.main.location = $('header_uc').href + '&a=main&iframe=1';
		}
		setMenuScroll();
	}
	function setMenuScroll() {
		$('frametable').style.width = document.body.offsetWidth < 1000 ? '1000px' : '100%';
		var obj = $('menu_' + menukey);
		if(!obj) {
			return;
		}
		var scrollh = document.body.offsetHeight - 160;
		obj.style.overflow = 'visible';
		obj.style.height = '';
		$('scrolllink').style.display = 'none';
		if(obj.offsetHeight + 150 > document.body.offsetHeight && scrollh > 0) {
			obj.style.overflow = 'hidden';
			obj.style.height = scrollh + 'px';
			$('scrolllink').style.display = '';
		}
	}
	function resizeHeadermenu() {
		var lis = $('topmenu').getElementsByTagName('li');
		var maxsize = $('frameuinfo').offsetLeft - 160, widths = 0, moi = -1, mof = '';
		if($('menu_mof')) {
			$('topmenu').removeChild($('menu_mof'));
		}
		if($('menu_mof_menu')) {
			$('append_parent').removeChild($('menu_mof_menu'));
		}
		for(var i = 0; i < lis.length; i++) {
			widths += lis[i].offsetWidth;
			if(widths > maxsize) {
				lis[i].style.visibility = 'hidden';
				var sobj = lis[i].childNodes[0].childNodes[0];
				if(sobj) {
					mof += '<a href="'+ sobj.getAttribute('href') + '" onclick="$(\'' + sobj.id + '\').onclick()">&rsaquo; ' + sobj.innerHTML + '</a><br style="clear:both" />';
				}
			} else {
				lis[i].style.visibility = 'visible';
			}
		}
		if(mof) {
			for(var i = 0; i < lis.length; i++) {
				if(lis[i].style.visibility == 'hidden') {
					moi = i;
					break;
				}
			}
			mofli = document.createElement('li');
			mofli.innerHTML = '<em><a href="javascript:;">&raquo;</a></em>';
			mofli.onmouseover = function () { showMenu({'ctrlid':'menu_mof','pos':'43'}); }
			mofli.id = 'menu_mof';
			$('topmenu').insertBefore(mofli, lis[moi]);
			mofmli = document.createElement('li');
			mofmli.className = 'popupmenu_popup';
			mofmli.style.width = '150px';
			mofmli.innerHTML = mof;
			mofmli.id = 'menu_mof_menu';
			mofmli.style.display = 'none';
			$('append_parent').appendChild(mofmli);
		}
	}
	function menuScroll(op, e) {
		var obj = $('menu_' + menukey);
		var scrollh = document.body.offsetHeight - 160;
		if(op == 1) {
			obj.scrollTop = obj.scrollTop - scrollh;
		} else if(op == 2) {
			obj.scrollTop = obj.scrollTop + scrollh;
		} else if(op == 3) {
			if(!e) e = window.event;
			if(e.wheelDelta <= 0 || e.detail > 0) {
				obj.scrollTop = obj.scrollTop + 20;
			} else {
				obj.scrollTop = obj.scrollTop - 20;
			}
		}
	}
	function menuNewwin(obj) {
		window.open(obj.parentNode.href);
		doane();
	}
	function initCpMenus(menuContainerid) {
		var key = '', lasttabon1 = null, lasttabon2 = null, hrefs = $(menuContainerid).getElementsByTagName('a');
		for(var i = 0; i < hrefs.length; i++) {
			if(menuContainerid == 'leftmenu' && '$extra'.indexOf(hrefs[i].href.substr(hrefs[i].href.indexOf(admincpfilename + '?') + admincpfilename.length + 1)) != -1) {
				if(lasttabon1) {
					lasttabon1.className = '';
				}
				key = hrefs[i].parentNode.parentNode.id.substr(5);
				hrefs[i].className = 'tabon';
				lasttabon1 = hrefs[i];
			}
			if(!hrefs[i].getAttribute('ajaxtarget')) hrefs[i].onclick = function() {
				if(menuContainerid != 'custommenu') {
					var lis = $(menuContainerid).getElementsByTagName('li');
					for(var k = 0; k < lis.length; k++) {
						if(lis[k].firstChild && lis[k].firstChild.className != 'menulink') lis[k].firstChild.className = '';
					}
					if(this.className == '') this.className = menuContainerid == 'leftmenu' ? 'tabon' : '';
				}
				if(menuContainerid != 'leftmenu') {
					var hk, currentkey;
					var leftmenus = $('leftmenu').getElementsByTagName('a');
					for(var j = 0; j < leftmenus.length; j++) {
						hk = leftmenus[j].parentNode.parentNode.id.substr(5);
						if(this.href.indexOf(leftmenus[j].href) != -1) {
							if(lasttabon2) {
								lasttabon2.className = '';
							}
							leftmenus[j].className = 'tabon';
							lasttabon2 = leftmenus[j];
							if(hk != 'index') currentkey = hk;
						} else {
							leftmenus[j].className = '';
						}
					}
					if(currentkey) toggleMenu(currentkey);
					hideMenu();
				}
			}
		}
		return key;
	}
	var header_key = initCpMenus('leftmenu');
	toggleMenu(header_key ? header_key : 'index');
	function initCpMap() {
		var ul, hrefs, s = '', count = 0;
		for(var k in headers) {
			if(headers[k] != 'index' && headers[k] != 'uc') {
				s += '<td valign="top"><ul class="cmblock"><li><h4>' + $('header_' + headers[k]).innerHTML + '</h4></li>';
				ul = $('menu_' + headers[k]);
				if(!ul) {
					continue;
				}
				hrefs = ul.getElementsByTagName('a');
				for(var i = 0; i < hrefs.length; i++) {
					s += '<li><a href="' + hrefs[i].href + '" target="' + hrefs[i].target + '" k="' + headers[k] + '">' + hrefs[i].innerHTML + '</a></li>';
				}
				s += '<li></li></ul></td>';
				count++;
			}
		}
		var width = (count > 11 ? 11 : count) * 80;
		s = '<div class="cnote" style="width:' + width + 'px"><span class="right"><a href="###" class="flbc" onclick="hideMenu();return false;"></a></span><h3>$lang[admincp_maptitle]</h3></div>' +
			'<div class="cmlist" style="width:' + width + 'px"><table id="mapmenu" cellspacing="0" cellpadding="0" ><tr>' + s +
			'</tr></table></div>';
		$('cmain').innerHTML = s;
		$('cmain').style.width = (width > 1000 ? 1000 : width) + 'px';
	}
	initCpMap();
	initCpMenus('mapmenu');
	var cmcache = false;
	function showMap() {
		showMenu({'ctrlid':'cpmap','evt':'click', 'duration':3, 'pos':'00'});
	}
	function resetEscAndF5(e) {
		e = e ? e : window.event;
		actualCode = e.keyCode ? e.keyCode : e.charCode;
		if(actualCode == 27) {
			if($('cpmap_menu').style.display == 'none') {
				showMap();
			} else {
				hideMenu();
			}
		}
		if(actualCode == 116 && parent.main) {
			parent.main.location.reload();
			if(document.all) {
				e.keyCode = 0;
				e.returnValue = false;
			} else {
				e.cancelBubble = true;
				e.preventDefault();
			}
		}
	}
	function uc_left_menu(uc_menu_data) {
		var leftmenu = $('menu_uc');
		leftmenu.innerHTML = '';
		var html_str = '';
		for(var i=0;i<uc_menu_data.length;i+=2) {
			html_str += '<li><a href="'+uc_menu_data[(i+1)]+'" hidefocus="true" onclick="uc_left_switch(this)" target="main"><em onclick="menuNewwin(this)" title="$lang[nav_newwin]"></em>'+uc_menu_data[i]+'</a></li>';
		}
		leftmenu.innerHTML = html_str;
	}
	var uc_left_last = null;
	function uc_left_switch(obj) {
		if(uc_left_last) {
			uc_left_last.className = '';
		}
		obj.className = 'tabon';
		uc_left_last = obj;
	}
	function uc_modify_sid(sid) {
		$('header_uc').href = '$uc_api_url/admin.php?m=frame';
	}

	_attachEvent(document.documentElement, 'keydown', resetEscAndF5);
	_attachEvent(window, 'resize', setMenuScroll, document);
	_attachEvent(window, 'resize', resizeHeadermenu, document);
	if(BROWSER.ie){
		$('leftmenu').onmousewheel = function(e) { menuScroll(3, e) };
	} else {
		$('leftmenu').addEventListener("DOMMouseScroll", function(e) { menuScroll(3, e) }, false);
	}
	resizeHeadermenu();
</script>
</body>
</html>

EOT;

?>