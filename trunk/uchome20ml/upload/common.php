<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: common.php 13217 2009-08-21 06:57:53Z liguode $
*/

@define('IN_UCHOME', TRUE);
define('D_BUG', '0');

D_BUG?error_reporting(7):error_reporting(0);
set_magic_quotes_runtime(0);

$_SGLOBAL = $_SCONFIG = $_SBLOCK = $_TPL = $_SCOOKIE = $_SN = $space = array();

//Program directory
$root = dirname(__FILE__).DIRECTORY_SEPARATOR;//vot
// Replace '\' to '/', Remove DRIVE:
$root = preg_replace("/^\w:/i",'',$root);     //vot
$root = str_replace('\\','/',$root);          //vot
//echo "s_root=".$root."<br>";
define('S_ROOT', $root);                      //vot

//Web directory
$root = dirname($_SERVER['SCRIPT_NAME']);
$root = str_replace('\\','/',$root);
if(!preg_match("/\/$/",$root)) $root .= '/';
//define('W_ROOT', dirname($_SERVER['SCRIPT_NAME']));
define('W_ROOT', $root);
//echo "w_root=".W_ROOT."<br>";




//Base Config
include_once(S_ROOT.'./ver.php');
if(!@include_once(S_ROOT.'./config.php')) {
	header("Location: install/index.php");//Go to Installation
	exit();
}
include_once(S_ROOT.'./source/function_common.php');
//echo "loaded ".S_ROOT."./source/function_common.php.<br>";


//Get Time
$mtime = explode(' ', microtime());
$_SGLOBAL['timestamp'] = $mtime[1];
$_SGLOBAL['supe_starttime'] = $_SGLOBAL['timestamp'] + $mtime[0];

//Filter GPC
$magic_quote = get_magic_quotes_gpc();
if(empty($magic_quote)) {
	$_GET = saddslashes($_GET);
	$_POST = saddslashes($_POST);
}

//Site URL
if(empty($_SC['siteurl'])) $_SC['siteurl'] = getsiteurl();

//DEBUG
//echo "site_url=".$_SC['siteurl']."<br>";

//Connect to Database
dbconnect();

//Cache files
if(!@include_once(S_ROOT.'./data/data_config.php')) {
	include_once(S_ROOT.'./source/function_cache.php');
	config_cache();
	include_once(S_ROOT.'./data/data_config.php');
}
foreach (array('app', 'userapp', 'ad', 'magic') as $value) {
	@include_once(S_ROOT.'./data/data_'.$value.'.php');
}

//COOKIE
$prelength = strlen($_SC['cookiepre']);
foreach($_COOKIE as $key => $val) {
	if(substr($key, 0, $prelength) == $_SC['cookiepre']) {
		$_SCOOKIE[(substr($key, $prelength))] = empty($magic_quote) ? saddslashes($val) : $val;
	}
}

//Enable GZIP
if ($_SC['gzipcompress'] && function_exists('ob_gzhandler')) {
	ob_start('ob_gzhandler');
} else {
	ob_start();
}

//Initialization
$_SGLOBAL['supe_uid'] = 0;
$_SGLOBAL['supe_username'] = '';
$_SGLOBAL['inajax'] = empty($_GET['inajax'])?0:intval($_GET['inajax']);
$_SGLOBAL['mobile'] = empty($_GET['mobile'])?'':trim($_GET['mobile']);
$_SGLOBAL['ajaxmenuid'] = empty($_GET['ajaxmenuid'])?'':$_GET['ajaxmenuid'];
$_SGLOBAL['refer'] = empty($_SERVER['HTTP_REFERER'])?'':$_SERVER['HTTP_REFERER'];
if(empty($_GET['m_timestamp']) || $_SGLOBAL['mobile'] != md5($_GET['m_timestamp']."\t".$_SCONFIG['sitekey'])) $_SGLOBAL['mobile'] = '';

//prevent Login & Register Flood
if(empty($_SCONFIG['login_action'])) $_SCONFIG['login_action'] = md5('login'.md5($_SCONFIG['sitekey']));
if(empty($_SCONFIG['register_action'])) $_SCONFIG['register_action'] = md5('register'.md5($_SCONFIG['sitekey']));


//=============================================================
//vot: Added block for Choose Theme and Language

//Get personalized templates

$templates = get_templates();

$_TPL['templates'] = $templates;

$_TPL['default_template'] = $templates[$_SCONFIG['template']];

//DEBUG
//echo "<pre>default_template ";
//print_r($default_template);
//echo "<pre>w_root ";
//echo W_ROOT ."<br>";
//echo "</pre>";
//DEBUG
//echo "<pre>_TPL ";
//print_r($_TPL);
//echo "</pre>";

//===========================================================
//vot: Get Available Languages
//===========================================================
$languages = $default_language = array();

$languages = get_languages();


//DEBUG
//echo "<pre>LNG_DIR ";
//print_r($lng_dir);
//echo "</pre>";

$_TPL['languages'] = $languages;
$_TPL['default_language'] = $_SC['language'];

//DEBUG
//echo "<pre>";
//echo "SCONFIG ";
//print_r($_SC['language']);
//echo "<br>";
//echo "TPL['languages'] \n";
//print_r($_TPL['languages']);
//print_r($_TPL['default_language']);
//echo "</pre>";
//===========================================================

//------------------------------------------------
//Style of the whole site
if(empty($_SCONFIG['template'])) {
	$_SCONFIG['template'] = 'default';
}
if($_SCOOKIE['mytemplate']) {
	$_SCOOKIE['mytemplate'] = str_replace('.','',trim($_SCOOKIE['mytemplate']));
	if(file_exists(S_ROOT.'./template/'.$_SCOOKIE['mytemplate'].'/style.css')) {
		$_SCONFIG['template'] = $_SCOOKIE['mytemplate'];
	} else {
		ssetcookie('mytemplate', '', 365000);
	}
}
$_TPL['default_template'] = $_TPL['templates'][$_SCONFIG['template']];

//==================================
//vot: Interface Language
if(empty($_SCONFIG['language'])) {
	$_SCONFIG['language'] = $_SC['language']; // Default Language
}
if($_SCOOKIE['mylanguage']) {
	$_SCOOKIE['mylanguage'] = str_replace('.','',trim($_SCOOKIE['mylanguage']));
	if(is_dir(S_ROOT.'./language/'.$_SCOOKIE['mylanguage'])) {
		$_SCONFIG['language'] = $_SCOOKIE['mylanguage'];
	} else {
		ssetcookie('mylanguage', '', 365000);
//		ssetcookie('mylanguage', $_SCONFIG['language'], 365000);
	}
} else {
  ssetcookie('mylanguage', $_SCONFIG['language'], 365000);
}
$_TPL['default_language'] = $_TPL['languages'][$_SCONFIG['language']];


language_load('lang_source');
language_append('sourcelang','lang_source2');
language_append('sourcelang','lang_template');

//----------------------------------------------------------------------

//Handle REQUEST_URI
if(!isset($_SERVER['REQUEST_URI'])) {  
	$_SERVER['REQUEST_URI'] = $_SERVER['PHP_SELF'];
	if(isset($_SERVER['QUERY_STRING'])) $_SERVER['REQUEST_URI'] .= '?'.$_SERVER['QUERY_STRING'];
}
if($_SERVER['REQUEST_URI']) {
	$temp = urldecode($_SERVER['REQUEST_URI']);
	if(strexists($temp, '<') || strexists($temp, '"')) {
		$_GET = shtmlspecialchars($_GET);//XSS
	}
}
	
//Check user login status
checkauth();
$_SGLOBAL['uhash'] = md5($_SGLOBAL['supe_uid']."\t".substr($_SGLOBAL['timestamp'], 0, 6));

//User menu
getuserapp();

//Handle UC Application
$_SCONFIG['uc_status'] = 0;
$_SGLOBAL['appmenus'] = $_SGLOBAL['appmenu'] = array();
if($_SGLOBAL['app']) {
	foreach ($_SGLOBAL['app'] as $appid => $value) {
		if(UC_APPID != $appid) {
			$_SCONFIG['uc_status'] = 1;
		}
		if($value['open']) {
			if(empty($_SGLOBAL['appmenu'])) {
				$_SGLOBAL['appmenu'] = $value;
			} else {
				$_SGLOBAL['appmenus'][] = $value;
			}
		}
	}
}

