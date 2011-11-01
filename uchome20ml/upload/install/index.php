<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: index.php 13234 2009-08-24 08:20:04Z liguode $
*/


// This File URL
$theurl = $_SERVER['SCRIPT_NAME'];
$theurl = str_replace('\\','/',$theurl);

//DEBUG
//echo "w_root=".$theurl."<br>";

$root = dirname(dirname($_SERVER['REQUEST_URI']));
$root = str_replace('\\','/',$root);
if(!preg_match("/\/$/",$root)) $root .= '/';

//DEBUG
//echo "w_root=".$root."<br>";

//define('W_ROOT', dirname(dirname($_SERVER['REQUEST_URI'])));
define('W_ROOT', $root);

//DEBUG
//echo "w_root=".W_ROOT."<br>";


define('IN_UCHOME', TRUE);

error_reporting(0);

$_SGLOBAL = $_SCONFIG = $_SC = $_SBLOCK = array();
$LNG = array();
$lang = '';

// Set The Timestamp
$_SGLOBAL['timestamp'] = time();


// Define Root Dir
$root = substr(dirname(__FILE__), 0, -7);
$root = str_replace('\\','/',$root);
define('S_ROOT', $root);

//DEBUG
//echo "root=".S_ROOT."<br>";

// Start GZIP Handler
if ($_SC['gzipcompress'] && function_exists('ob_gzhandler')) {
	ob_start('ob_gzhandler');
} else {
	ob_start();
}

//vot: Force the HTTP Header Charset to UTF-8
header('Content-Type: text/html; charset='.$_SC['charset']);


//-----------------------------
// Load common functions

include_once(S_ROOT.'./source/function_common.php');


//-----------------------------
// Handle Magic Quotes
if(!(get_magic_quotes_gpc())) {
	$_GET = saddslashes($_GET);
	$_POST = saddslashes($_POST);
}

//===========================================================
//vot: Get Available Languages
//===========================================================
//global $LNG, $_SGLOBAL;

$languages = get_languages();

$language_list = make_language_list($languages);

//DEBUG
//echo "<pre>default_template ";
//print_r($default_template);
//echo "<pre>languages ";
//echo "<pre>_TPL ";
//print_r($languages);
//echo "</pre>";


//-----------------------------
// Load default language

if(empty($_SC['language'])) $_SC['language'] = 'en';

load_language($_SC['language']);


//-----------------------------
// Load configuration

if(!@include_once(S_ROOT.'./config.php')) {
	@include_once(S_ROOT.'./config.new.php');

	if(isset($LNG['rename_config'])) {
		$msg = $LNG['rename_config'];
	} else {
		$msg = 'You need first to rename the file "config.new.php"
			in a root directory to "config.php"';
	}

	show_msg($msg, 999);
}

//===========================================================
// vot: Choose the Language for Install
//===========================================================

$lang = isset($_GET['lang']) ? $_GET['lang'] : '';

if(!$lang) {
  $lang = isset($_POST['lang']) ? $_POST['lang'] : '';
}

//-----------------------------------------------------------

if(!in_array($lang, $language_list)) {

//echo "test!";
  show_header();

  show_languages( $languages, $_SC['language'] );

  show_footer();

  exit;
}


//===========================================================
// Load Selected by user Language ($lang)

load_language($lang);

//===========================================================

$formhash = formhash();

$configfile = S_ROOT.'./config.php';

$sqlfile = S_ROOT.'./install/install.sql';

if(!file_exists($sqlfile)) {
	show_msg($LNG['upload_sql'], 999);
}

// Get the Step
$step   = empty($_GET['step'])?0:intval($_GET['step']);
if(!$step) {
  $step   = empty($_POST['step'])?0:intval($_POST['step']);
}

// Get the Action
$action = empty($_GET['action'])?'':trim($_GET['action']);
if(!$action) {
  $action = empty($_POST['action'])?'':trim($_POST['action']);
}

$nowarr = array('','','','','','','');

$lockfile = S_ROOT.'./data/install.lock';

if(file_exists($lockfile)) {
	show_msg($LNG['allready_installed']);
}

// Open the config file
if(!@$fp = fopen($configfile, 'a')) {
	show_msg($LNG['config_nonwritable']);
} else {
	@fclose($fp);
}


// UC submit
if (submitcheck('ucsubmit')) {

	//Set Step
	$step = 1;

	//Check US params
	$ucapi = preg_replace("/\/$/", '', trim($_POST['ucapi']));
	$ucip = trim($_POST['ucip']);

	if(empty($ucapi) || !preg_match("/^(http:\/\/)/i", $ucapi)) {
		show_msg($LNG['ucenter_url_invalid']);
	} else {
		//Try to get the UC host by US IP
		if(!$ucip) {
			$temp = @parse_url($ucapi);
			$ucip = gethostbyname($temp['host']);
			if(ip2long($ucip) == -1 || ip2long($ucip) === FALSE) {
				$ucip = '';
			}
		}
	}

	//Load the UC_client
	if(!@include_once S_ROOT.'./uc_client/client.php') {
		show_msg($LNG['uc_client_not_found']);
	}
	$ucinfo = uc_fopen2($ucapi.'/index.php?m=app&a=ucinfo&release='.UC_CLIENT_RELEASE, 500, '', '', 1, $ucip);
	list($status, $ucversion, $ucrelease, $uccharset, $ucdbcharset, $apptypes) = explode('|', $ucinfo);
	$dbcharset = strtolower(trim($_SC['dbcharset'] ? str_replace('-', '', $_SC['dbcharset']) : $_SC['dbcharset']));
	$ucdbcharset = strtolower(trim($ucdbcharset ? str_replace('-', '', $ucdbcharset) : $ucdbcharset));
	$apptypes = strtolower(trim($apptypes));

	if($status != 'UC_STATUS_OK') {

		show_header();

		// Remove absolute positioning from the status
		$status = str_replace('position:absolute;','',$status);

		print<<<END
		<form id="theform" method="post" action="$theurl">
		<table class="datatable">
		<tr><td>{$LNG['uc_error']}<br>
                <div> $status </div>
                <br>
                {$LNG['uc_error_intro']}</td></tr>
		<tr><td>{$LNG['uc_ip']}:
                <input type="text" name="ucip" value="$ucip">
                {$LNG['uc_ip_comment']}</td></tr>
		</table>
		<table class=button>
		<tr><td>
		<input type="hidden" name="lang" value="$lang">
		<input type="hidden" name="ucapi" value="$ucapi">
		<input type="hidden" name="ucfounderpw" value="$_POST[ucfounderpw]">
		<input type="submit" id="ucsubmit" name="ucsubmit" value="{$LNG['uc_ip_confirm']}"></td></tr>
		</table>
		<input type="hidden" name="formhash" value="$formhash">
		</form>
END;
		show_footer();
		exit();

	} elseif($dbcharset && $ucdbcharset && $ucdbcharset != $dbcharset) {
		show_msg($LNG['charset_different']);
	} elseif(strexists($apptypes, 'uchome')) {
		show_msg($LNG['uch_allready_installed']);
	}

	$tagtemplates = 'apptagtemplates[template]='.urlencode('<a href="{url}" target="_blank">{subject}</a>').'&'.
		'apptagtemplates[fields][subject]='.urlencode('Blog title').'&'.
		'apptagtemplates[fields][uid]='.urlencode('User ID').'&'.
		'apptagtemplates[fields][username]='.urlencode('User name').'&'.
		'apptagtemplates[fields][dateline]='.urlencode('Date').'&'.
		'apptagtemplates[fields][spaceurl]='.urlencode('Space address').'&'.
		'apptagtemplates[fields][url]='.urlencode('Blog address');

	$uri = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
	$app_url = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/'))).'://'.$_SERVER['HTTP_HOST'].preg_replace("/\/*install$/i", '', substr($uri, 0, strrpos($uri, '/install')));

	$postdata = "m=app&a=add&ucfounder=&ucfounderpw=".urlencode($_POST['ucfounderpw'])."&apptype=".urlencode('UCHOME')."&appname=".urlencode('Personal home')."&appurl=".urlencode($app_url)."&appip=&appcharset=".$_SC['charset'].'&appdbcharset='.$_SC['dbcharset'].'&release='.UC_CLIENT_RELEASE.'&'.$tagtemplates;
	$s = uc_fopen2($ucapi.'/index.php', 500, $postdata, '', 1, $ucip);

	if(empty($s)) {
		show_msg($LNG['uc_cannot_connect']);
	} elseif($s == '-1') {
		show_msg($LNG['uc_admin_password_incorrect']);
	} else {
		$ucs = explode('|', $s);
		if(empty($ucs[0]) || empty($ucs[1])) {
			show_msg($LNG['uc_problem'].'<br />'.shtmlspecialchars($s));
		} else {

			//处理成功
			$apphidden = '';
			//验证是否可以直接联接MySQL
			$link = mysql_connect($ucs[2], $ucs[4], $ucs[5], 1);
			$connect = $link && mysql_select_db($ucs[3], $link) ? 'mysql' : '';
			//返回
			foreach (array('key', 'appid', 'dbhost', 'dbname', 'dbuser', 'dbpw', 'dbcharset', 'dbtablepre', 'charset') as $key => $value) {
				if($value == 'dbtablepre') {
					$ucs[$key] = '`'.$ucs[3].'`.'.$ucs[$key];
				}
				$apphidden .= "<input type=\"hidden\" name=\"uc[$value]\" value=\"".$ucs[$key]."\" />";
			}
			//内置
			$apphidden .= "<input type=\"hidden\" name=\"uc[connect]\" value=\"$connect\" />";
			$apphidden .= "<input type=\"hidden\" name=\"uc[api]\" value=\"$_POST[ucapi]\" />";
			$apphidden .= "<input type=\"hidden\" name=\"uc[ip]\" value=\"$ucip\" />";

			show_header();
			print<<<END
			<form id="theform" method="post" action="$theurl">
			<table>
			<tr><td>{$LNG['uchome_registered']}: $ucs[1]</td></tr>
			</table>

			<table class=button>
			<tr><td>$apphidden
			<input type="submit" id="uc2submit" name="uc2submit" value="{$LNG['go_next_step']}"></td></tr>
			</table>
			<input type="hidden" name="lang" value="$lang">
			<input type="hidden" name="formhash" value="$formhash">
			</form>
END;
			show_footer();
			exit();
		}
	}

} elseif (submitcheck('uc2submit')) {

	//增加congfig配置
	$step = 2;

	//写入config文件
	$configcontent = sreadfile($configfile);
	$keys = array_keys($_POST['uc']);
	foreach ($keys as $value) {
		$upkey = strtoupper($value);
		$configcontent = preg_replace("/define\('UC_".$upkey."'\s*,\s*'.*?'\)/i", "define('UC_".$upkey."', '".$_POST['uc'][$value]."')", $configcontent);
	}
	if(!$fp = fopen($configfile, 'w')) {
		show_msg($LNG['config_nonwritable']);
	}
	fwrite($fp, trim($configcontent));
	fclose($fp);

} elseif(!empty($_POST['sqlsubmit'])) {

	$step = 2;

	//先写入config文件
	$configcontent = sreadfile($configfile);
	$keys = array_keys($_POST['db']);
	foreach ($keys as $value) {
		$configcontent = preg_replace("/[$]\_SC\[\'".$value."\'\](\s*)\=\s*[\"'].*?[\"']/is", "\$_SC['".$value."']\\1= '".$_POST['db'][$value]."'", $configcontent);
	}
	if(!$fp = fopen($configfile, 'w')) {
		show_msg($LNG['config_nonwritable']);
	}
	fwrite($fp, trim($configcontent));
	fclose($fp);
	
	if(empty($_POST['db']['tablepre'])) {
		show_msg($LNG['prefix_empty']);
	}

	//判断UCenter Home数据库
	$havedata = false;
	if(!@mysql_connect($_POST['db']['dbhost'], $_POST['db']['dbuser'], $_POST['db']['dbpw'])) {
		show_msg($LNG['db_params_invalid']);
	}
	if(mysql_select_db($_POST['db']['dbname'])) {
		if(mysql_query("SELECT COUNT(*) FROM {$_POST['db']['tablepre']}space")) {
			$havedata = true;
		}
	} else {
		if(!mysql_query("CREATE DATABASE `".$_POST['db']['dbname']."`")) {
			show_msg($LNG['db_cannot_create']);
		}
	}

	if($havedata) {
		show_msg($LNG['db_not_empty'], ($step+1));
	} else {
		show_msg($LNG['db_set_ok'], ($step+1), 1);
	}

} elseif (submitcheck('opensubmit')) {

	//检查用户身份
	include_once(S_ROOT.'./data/data_config.php');

	$step = 5;

	dbconnect();

	//同步获取用户源
	$_SGLOBAL['timestamp'] = time();

	//UC注册用户
	if(!@include_once S_ROOT.'./uc_client/client.php') {
		showmessage('system_error');
	}
	$uid = uc_user_register($_POST['username'], $_POST['password'], 'webmastor@yourdomain.com');
	if($uid == -3) {
		//已存在,登录
		if(!$passport = getpassport($_POST['username'], $_POST['password'])) {
			show_msg($LNG['password_invalid']);
		}
		$setarr = array(
			'uid' => $passport['uid'],
			'username' => addslashes($passport['username'])
		);
	} elseif($uid > 0) {
		$setarr = array(
			'uid' => $uid,
			'username' => $_POST['username']
		);
	} else {
		show_msg($LNG['username_invalid']);
	}
	$setarr['password'] = md5("$setarr[uid]|$_SGLOBAL[timestamp]");//本地密码随机生成

	//更新本地用户库
	inserttable('member', $setarr, 0, true);

	//开通空间
	include_once(S_ROOT.'./source/function_space.php');
	$space = space_open($setarr['uid'], $_POST['username'], 1);

	//反馈受保护
	$result = uc_user_addprotected($_POST['username'], $_POST['username']);
	$_SGLOBAL['db']->query("UPDATE ".tname('space')." SET flag=1 WHERE username='$_POST[username]'");

	//清理在线session
	insertsession($setarr);

	//设置cookie
	ssetcookie('auth', authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), 2592000);

	//写log
	if(@$fp = fopen($lockfile, 'w')) {
		fwrite($fp, 'UCenter Home');
		fclose($fp);
	}

	show_msg($LNG['uch_installed_ok'], 999);

}

if(empty($step)) {

	show_header();

	//检查权限设置
	$checkok = true;
	$perms = array();
	if(!checkfdperm(S_ROOT.'./config.php', 1)) {
		$perms['config'] = $LNG['failed'];
		$checkok = false;
	} else {
		$perms['config'] = $LNG['ok'];
	}
	if(!checkfdperm(S_ROOT.'./attachment/')) {
		$perms['attachment'] = $LNG['failed'];
		$checkok = false;
	} else {
		$perms['attachment'] = $LNG['ok'];
	}
	if(!checkfdperm(S_ROOT.'./data/')) {
		$perms['data'] = $LNG['failed'];
		$checkok = false;
	} else {
		$perms['data'] = $LNG['ok'];
	}
	if(!checkfdperm(S_ROOT.'./uc_client/data/')) {
		$perms['uc_data'] = $LNG['failed'];
		$checkok = false;
	} else {
		$perms['uc_data'] = $LNG['ok'];
	}

	//Show permissions
	print<<<END
<script type="text/javascript">
function readme() {
	var tbl_readme = document.getElementById('tbl_readme');
	if(tbl_readme.style.display == '') {
		tbl_readme.style.display = 'none';
	} else {
		tbl_readme.style.display = '';
	}
}
</script>
<table class="showtable">
  <tr>
    <td>
      {$LNG['welcome']}
    </td>
  </tr>
</table>

<table>
  <tr>
    <td>
      {$LNG['file_permissions']}

      <table class="datatable">
       <tr>
        <th width='35%'>{$LNG['name']}</th>
        <th>{$LNG['required_permission']}</th>
        <th>{$LNG['description']}</th>
        <th>{$LNG['test_result']}</th>
       </tr>
       <tr>
        <td><strong>./config.php</strong></td>
        <td>{$LNG['r/w']}</td>
        <td>{$LNG['system_config']}</td>
        <td>$perms[config]</td>
       </tr>
       <tr>
        <td>
      <strong>./attachment/</strong> ({$LNG['include_subdirs']})
        </td>
        <td>
          {$LNG['r/w/d']}
        </td>
        <td>{$LNG['attach_dir']}</td>
        <td>$perms[attachment]</td>
       </tr>
       <tr>
        <td><strong>./data/</strong> ({$LNG['include_subdirs']})</td>
        <td>{$LNG['r/w/d']}</td>
        <td>{$LNG['data_dir']}</td>
        <td>$perms[data]</td>
       </tr>
       <tr>
        <td><strong>./uc_client/data/</strong> ({$LNG['include_subdirs']})</td>
        <td>{$LNG['r/w/d']}</td>
        <td>{$LNG['uc_client_dir']}</td>
        <td>$perms[uc_data]</td>
       </tr>
      </table>

    </td>
  </tr>
</table>
END;

	if(!$checkok) {

                echo "
<table>
 <tr>
  <td>
   {$LNG['permission_problem']}
   <br>
   <br>
   [ <a href='$theurl?step=1'>{$LNG['force_continue']}</a> ]
  </td>
 </tr>
</table>";

	} else {
		$ucapi = empty($_POST['ucapi'])?'/':$_POST['ucapi'];
		$ucfounderpw = empty($_POST['ucfounderpw'])?'':$_POST['ucfounderpw'];

		print <<<END
		<form id="theform" method="post" action="$theurl">
			<table class=button>
				<tr>
					<td><input type="submit" id="startsubmit" name="startsubmit" value="{$LNG['accept_license']}"></td>
				</tr>
			</table>
			<input type="hidden" name="lang" value="$lang">
			<input type="hidden" name="step" value="1">
			<input type="hidden" name="ucapi" value="$ucapi" />
			<input type="hidden" name="ucfounderpw" value="$ucfounderpw" />
			<input type="hidden" name="formhash" value="$formhash">
		</form>
END;
	}

//vot
//second paragraph just removed :)
//	</p><p>感谢您选择 UCenter Home.希望我们的努力能为您提供一个强大的社会化网络(SNS)解决方案.通过 UCenter Home,建站者可以轻松构建一个以好友关系为核心的交流网络,让站点用户可以用一句话记录生活中的点点滴滴;方便快捷地发布日志,上传图片;更可以十分方便的与其好友们一起分享信息,讨论感兴趣的话题;轻松快捷的了解好友最新动态.

	print<<<END
<table id="tbl_readme" style="display:none;" class="showtable">
  <tr>
    <td>{$LNG['read_license']}</td>
</tr>
<tr>
  <td>
    {$LNG['license']}
  </td>
 </tr>
</table> 

END;

	show_footer();

} elseif($step == 1) {

	show_header();
	$ucapi = "http://";
	$ucfounderpw = '';
	$showdiv = 0;
	if($_POST['ucfounderpw']) {
		$showdiv = 1;
		$ucapi = trim($_POST['ucapi']);
		$ucfounderpw = trim($_POST['ucfounderpw']);
	}

	if($showdiv) {
		print<<<END
<form id="theform" method="post" action="$theurl">
<input type="hidden" name="lang" value="$lang">

<div>
<table class="showtable">
  <tr>
    <td>
      {$LNG['get_uc_auto']}
    </td>
  </tr>
  <tr>
    <td id="msg2">
       {$LNG['us_settings_submit']}
    </td>
  </tr>
</table>
<br/>
</div>

<div>
END;
	} else {
		$plus = '';
		if(!$ucfounderpw) {
			$plus = "
  <tr>
    <td id='msg2'>
      {$LNG['uc_install_first']}
    </td>
  </tr>\n";
		}

		print<<<END
<form id="theform" method="post" action="$theurl">
<input type="hidden" name="lang" value="$lang">
<div>
<table class="showtable">
  <tr>
    <td>
      {$LNG['uc_settings_fill']}
    </td>
  </tr>
	$plus
</table>
<br>
<p style="font-weight:bold;">{$LNG['us_settings_enter']}</p>

END;
	}
	print<<<END
<table class=datatable>
	<tr>
		<td>{$LNG['uc_url']}</td>
		<td><input type="text" id="ucapi" name="ucapi" size="60" value="$ucapi">
                    <br>{$LNG['uc_url_comment']}</td>
	</tr>
	<tr>
		<td>{$LNG['uc_admin_password']}</td>
		<td><input type="password" id="ucfounderpw" name="ucfounderpw" size="20" value="$ucfounderpw"></td>
	</tr>
</table>
<br>
</div>

<table class=button>
	<tr>
		<td><input type="submit" id="ucsubmit" name="ucsubmit" value="{$LNG['uc_config_submit']}"></td>
	</tr>
</table>

<input type="hidden" id="ucfounder" name="ucfounder" size="20" value="">
<input type="hidden" name="formhash" value="$formhash">
</form>
END;

	show_footer();

} elseif ($step == 2) {

	//检测目录属性
	show_header();

	//设置数据库配置
	print<<<END
<form id="theform" method="post" action="$theurl">
<input type="hidden" name="lang" value="$lang">

<table class="showtable">
  <tr>
    <td>{$LNG['uc_db_info']}</td>
  </tr>
  <tr>
    <td id="msg1">{$LNG['uc_db_info_comment']}</td>
  </tr>
</table>

<table class=datatable>
  <tr>
    <td width="25%">{$LNG['uc_db_host']}</td>
    <td><input type="text" name="db[dbhost]" size="20" value="localhost"></td>
    <td width="30%">{$LNG['uc_db_host_comment']}</td>
  </tr>
  <tr>
    <td>{$LNG['uc_db_user']}</td>
    <td><input type="text" name="db[dbuser]" size="20" value=""></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>{$LNG['uc_db_password']}</td>
    <td><input type="password" name="db[dbpw]" size="20" value=""></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>{$LNG['uc_db_charset']}</td>
    <td>
	<select name="db[dbcharset]" onchange="addoption(this)">
	<option value="$_SC[dbcharset]">$_SC[dbcharset]</option>
	<option value="addoption" class="addoption">{$LNG['uc_db_charset_custom']}</option>
	</select>
    </td>
    <td>{$LNG['mysql_required']}</td>
  </tr>
  <tr>
    <td>{$LNG['db_name']}</td>
    <td><input type="text" name="db[dbname]" size="20" value=""></td>
    <td>{$LNG['db_name_comment']}</td>
  </tr>
  <tr>
    <td>{$LNG['db_prefix']}</td>
    <td><input type="text" name="db[tablepre]" size="20" value="uchome_"></td>
    <td>{$LNG['db_prefix_comment']}</td>
  </tr>
</table>

<table class=button>
  <tr>
    <td><input type="submit" id="sqlsubmit" name="sqlsubmit" value="{$LNG['db_test']}"></td>
  </tr>
</table>

<input type="hidden" name="formhash" value="$formhash">
</form>
END;
	show_footer();

} elseif ($step == 3) {

	//Connext the DB
	dbconnect();

	//Read the SQL Queries
	$newsql = sreadfile($sqlfile);

	if($_SC['tablepre'] != 'uchome_') $newsql = str_replace('uchome_', $_SC['tablepre'], $newsql);//替换表名前缀

	//Change the table prefix and charset
	$tables = $sqls = array();
	if($newsql) {
		preg_match_all("/(CREATE TABLE ([a-z0-9\_\-`]+).+?\s*)(TYPE|ENGINE)+\=/is", $newsql, $mathes);
		$sqls = $mathes[1];
		$tables = $mathes[2];
	}
	if(empty($tables)) {
		show_msg($LNG['install_sql_missing']);
	}

	$heaptype = $_SGLOBAL['db']->version()>'4.1'?" ENGINE=MEMORY".(empty($_SC['dbcharset'])?'':" DEFAULT CHARSET=$_SC[dbcharset]" ):" TYPE=HEAP";
	$myisamtype = $_SGLOBAL['db']->version()>'4.1'?" ENGINE=MYISAM".(empty($_SC['dbcharset'])?'':" DEFAULT CHARSET=$_SC[dbcharset]" ):" TYPE=MYISAM";
	$installok = true;
	foreach ($tables as $key => $tablename) {
		if(strpos($tablename, 'session')) {
			$sqltype = $heaptype;
		} else {
			$sqltype = $myisamtype;
		}
		$_SGLOBAL['db']->query("DROP TABLE IF EXISTS `$tablename`");
		if(!$query = $_SGLOBAL['db']->query($sqls[$key].$sqltype, 'SILENT')) {
			$installok = false;
			break;
		}
	}
	if(!$installok) {
		show_msg("<font color=\"blue\">{$LNG['table']} ($tablename) ".
                         $LNG['table_create_error'].
                         mysql_error().
                         "<br /><br />".
                         $LNG['table_create_error_comment'].
                         "<br /><br />
                         <a href=\"?step=$step\">{$LNG['try_again']}</a>");
	} else {
		show_msg($LNG['tables_installed'], ($step+1), 1);
	}

} elseif ($step == 4) {

	//Add Default Data to DB
	dbconnect();
	$privacy = array(
		'view' => array(
			'index' => 0,
			'profile' => 0,
			'friend' => 0,
			'wall' => 0,
			'feed' => 0,
			'mtag' => 0,
			'event' => 0,
			'doing' => 0,
			'blog' => 0,
			'album' => 0,
			'share' => 0,
			'poll' => 0
		),
		'feed' => array(
			'doing' => 1,
			'blog' => 1,
			'upload' => 1,
			'share' => 1,
			'poll' => 1,
			'joinpoll' => 1,
			'thread' => 1,
			'post' => 1,
			'mtag' => 1,
			'event' => 1,
			'join' => 1,
			'friend' => 1,
			'comment' => 1,
			'show' => 1,
			'spaceopen' => 1,
			'credit' => 1,
			'invite' => 1,
			'task' => 1,
			'profile' => 1,
			'album' => 1,
			'click' => 1
		)
	);
	//config
	$datas = array(
		"('sitename', '{$LNG['site_name']}')",
		"('headercharset', '1')",
		"('template', 'default')",
		"('adminemail', 'webmaster@".$_SERVER['HTTP_HOST']."')",
		"('onlinehold', '1800')",
		"('timeoffset', '8')",
		"('maxpage', '100')",
		"('starcredit', '100')",
		"('starlevelnum', '5')",
		"('cachemode', 'database')",
		"('cachegrade', '0')",
		"('allowcache', '1')",
		"('allowdomain', '0')",
		"('allowrewrite', '0')",
		"('allowwatermark', '0')",
		"('allowftp', '0')",
		"('holddomain', 'www|*blog*|*space*|x')",
		"('mtagminnum', '5')",
		"('feedday', '7')",
		"('feedmaxnum', '100')",
		"('feedfilternum', '10')",
		"('importnum', '100')",
		"('maxreward', '10')",
		"('singlesent', '50')",
		"('groupnum', '10')",
		"('closeregister', '0')",
		"('closeinvite', '0')",
		"('close', '0')",
		"('networkpublic', '1')",
		"('networkpage', '1')",
		"('seccode_register', '1')",
		"('uc_tagrelated', '1')",
		"('manualmoderator', '1')",
		"('linkguide', '1')",
		"('showall', '1')",
		"('sendmailday', '0')",
		"('realname', '0')",
		"('namecheck', '0')",
		"('namechange', '0')",
		"('name_allowviewspace', '1')",
		"('name_allowfriend', '1')",
		"('name_allowpoke', '1')",
		"('name_allowdoing', '1')",
		"('name_allowblog', '0')",
		"('name_allowalbum', '0')",
		"('name_allowthread', '0')",
		"('name_allowshare', '0')",
		"('name_allowcomment', '0')",
		"('name_allowpost', '0')",
		"('showallfriendnum', '10')",
		"('feedtargetblank', '1')",
		"('feedread', '1')",
		"('feedhotnum', '3')",
		"('feedhotday', '2')",
		"('feedhotmin', '3')",
		"('feedhiddenicon', 'friend,profile,task,wall')",
		"('uc_tagrelatedtime', '86400')",
		"('privacy', '".serialize($privacy)."')",
		"('cronnextrun', '$_SGLOBAL[timestamp]')",
		"('my_status', '0')",
		"('maxreward', '10')",
		"('uniqueemail', '1')",
		"('updatestat', '1')",
		"('my_showgift', '1')",
		"('topcachetime', '60')",
		"('newspacenum', '3')"
	);
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('config'));
	$_SGLOBAL['db']->query("REPLACE INTO ".tname('config')." (var, datavalue) VALUES ".implode(',', $datas));

	//profield
	$datas = array(
		"('{$LNG['group_category_name1']}', 'text', '100', '0', '1')",
		"('{$LNG['group_category_name2']}', 'text', '100', '0', '1')",
		"('{$LNG['group_category_name3']}', 'text', '100', '0', '1')"
	);
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('profield'));
	$_SGLOBAL['db']->query("REPLACE INTO ".tname('profield')." (title,formtype,inputnum,manualmoderator,manualmember) VALUES ".implode(',', $datas));

	//User Groups
	$datas = array();
//	$datas['grouptitle'] = array('Administrator', 'Moderator', 'VIP', 'Newbie', 'Member', 'Full Member', 'Senior member', 'Read Only', 'Banned');
	$datas['grouptitle'] = $LNG['group_titles'];

	//Group Permissions
	$datas['gid'] = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
	$datas['system'] = array(-1, -1, 1, 0, 0, 0, 0, -1, -1);
	$datas['explower'] = array(0, 0, 0, -999999999, 0, 100, 1000, 0, 0);
	$datas['banvisit'] = array(0, 0, 0, 0, 0, 0, 0, 0, 1);
	$datas['searchignore'] = array(1, 1, 1, 0, 0, 0, 1, 0, 0);
	$datas['videophotoignore'] = array(1, 1, 0, 0, 0, 0, 0, 0, 0);
	$datas['spamignore'] = array(1, 1, 1, 0, 0, 0, 0, 0, 0);

	$datas['color'] = array('red', 'blue', 'green', '', '', '', '', '', '');
	$datas['icon'] = array('image/group/admin.gif', 'image/group/infor.gif', 'image/group/vip.gif', '', '', '', '', '', '');

	//Basic Settings
	$datas['maxfriendnum'] = array(0, 0, 0, 10, 100, 200, 300, 1, 1);
	$datas['maxattachsize'] = array(0, 0, 0, 10, 20, 50, 100, 1, 1);
	$datas['postinterval'] = array(0, 0, 0, 300, 60, 30, 10, 9999, 9999);
	$datas['searchinterval'] = array(0, 0, 0, 600, 60, 30, 10, 9999, 9999);
	
	$datas['verifyevent'] = array(0, 0, 0, 1, 0, 0, 0, 1, 1);

	$datas['domainlength'] = array(1, 3, 3, 0, 0, 5, 3, 99, 99);
	$datas['closeignore'] = array(1, 1, 0, 0, 0, 0, 0, 0, 0);
	$datas['seccode'] = array(0, 0, 0, 1, 0, 0, 0, 1, 1);

	$datas['allowhtml'] = array(1, 1, 1, 0, 0, 0, 1, 0, 0);
	$datas['allowcss'] = array(1, 1, 1, 0, 0, 0, 1, 0, 0);
	$datas['allowviewvideopic'] = array(1, 1, 1, 0, 0, 0, 0, 0, 0);
	
	$datas['allowtopic'] = array(1, 1, 0, 0, 0, 0, 0, 0, 0);
	$datas['allowstat'] = array(1, 1, 0, 0, 0, 0, 0, 0, 0);
	
	foreach (array('comment','blog','poll','doing','upload','share','mtag','thread','post','poke','friend','click','event','magic', 'pm', 'myop') as $value) {
		$datas['allow'.$value] = array(1, 1, 1, 0, 1, 1, 1, 0, 0);
	}

	//管理权限
	//站点设置
	foreach (array('config','usergroup','credit','profilefield','profield','censor','ad','cache','block','template','backup','stat','cron','app', 'network','name','task','report', 'eventclass', 'magic','magiclog','topic', 'batch', 'delspace', 'spacegroup', 'spaceinfo', 'spacecredit', 'spacenote', 'ip', 'hotuser', 'defaultuser', 'click', 'videophoto', 'log') as $value) {
		$datas['manage'.$value] = array(1, 0, 0, 0, 0, 0, 0, 0, 0);
	}

	//信息管理
	foreach (array('tag','mtag','feed','share','doing', 'blog','album','comment','thread', 'event', 'poll') as $value) {
		$datas['manage'.$value] = array(1, 1, 0, 0, 0, 0, 0, 0, 0);
	}

	$keys = array_keys($datas);
	$newdatas = array();
	$g_count = count($datas['grouptitle']);
	for ($i=0; $i<$g_count; $i++) {
		$thes = array();
		foreach ($keys as $value) {
			$thes[] = $datas[$value][$i];
		}
		$newdatas[$i] = "(".simplode($thes).")";
	}
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('usergroup'));
	$_SGLOBAL['db']->query("REPLACE INTO ".tname('usergroup')." (".implode(',', $keys).") VALUES ".implode(',', $newdatas));

	//Money Policy
	$ruls = array();

	//Add Money Rules
	$ruls[] = "('{$LNG['rule_register']}', 'register', '0', '0', '1', '1', '10', '0', '0')";
	$ruls[] = "('{$LNG['rule_realname']}', 'realname', '0', '0', '1', '1', '20', '0', '20')";
	$ruls[] = "('{$LNG['rule_realemail']}', 'realemail', '0', '0', '1', '1', '40', '0', '40')";
	$ruls[] = "('{$LNG['rule_invitefriend']}', 'invitefriend', '4', '0', '20', '1', '10', '0', '10')";
	$ruls[] = "('{$LNG['rule_setavatar']}', 'setavatar', '0', '0', '1', '1', '15', '0', '15')";
	$ruls[] = "('{$LNG['rule_videophoto']}', 'videophoto', '0', '0', '1', '1', '40', '0', '40')";
	$ruls[] = "('{$LNG['rule_report']}', 'report', '4', '0', '0', '1', '2', '0', '2')";
	$ruls[] = "('{$LNG['rule_updatemood']}', 'updatemood', '1', '0', '3', '1', '3', '0', '3')";
	$ruls[] = "('{$LNG['rule_hotinfo']}', 'hotinfo', '4', '0', '0', '1', '10', '0', '10')";
	$ruls[] = "('{$LNG['rule_daylogin']}', 'daylogin', '1', '0', '1', '1', '15', '0', '15')";
	$ruls[] = "('{$LNG['rule_visit']}', 'visit', '1', '0', '10', '1', '1', '2', '1')";
	$ruls[] = "('{$LNG['rule_poke']}', 'poke', '1', '0', '10', '1', '1', '2', '1')";
	$ruls[] = "('{$LNG['rule_guestbook']}', 'guestbook', '1', '0', '20', '1', '2', '2', '2')";
	$ruls[] = "('{$LNG['rule_getguestbook']}', 'getguestbook', '1', '0', '5', '1', '1', '2', '0')";
	$ruls[] = "('{$LNG['rule_doing']}', 'doing', '1', '0', '5', '1', '1', '0', '1')";
	$ruls[] = "('{$LNG['rule_publishblog']}', 'publishblog', '1', '0', '3', '1', '5', '0', '5')";
	$ruls[] = "('{$LNG['rule_uploadimage']}', 'uploadimage', '1', '0', '10', '1', '2', '0', '2')";
	$ruls[] = "('{$LNG['rule_camera']}', 'camera', '1', '0', '5', '1', '3', '0', '3')";
	$ruls[] = "('{$LNG['rule_publishthread']}', 'publishthread', '1', '0', '5', '1', '5', '0', '5')";
	$ruls[] = "('{$LNG['rule_replythread']}', 'replythread', '1', '0', '10', '1', '1', '1', '1')";
	$ruls[] = "('{$LNG['rule_createpoll']}', 'createpoll', '1', '0', '5', '1', '2', '0', '2')";
	$ruls[] = "('{$LNG['rule_joinpoll']}', 'joinpoll', '1', '0', '10', '1', '1', '1', '1')";
	$ruls[] = "('{$LNG['rule_createevent']}', 'createevent', '1', '0', '1', '1', '3', '0', '3')";
	$ruls[] = "('{$LNG['rule_joinevent']}', 'joinevent', '1', '0', '1', '1', '1', '1', '1')";
	$ruls[] = "('{$LNG['rule_recommendevent']}', 'recommendevent', '4', '0', '0', '1', '10', '0', '10')";
	$ruls[] = "('{$LNG['rule_createshare']}', 'createshare', '1', '0', '3', '1', '2', '0', '2')";
	$ruls[] = "('{$LNG['rule_comment']}', 'comment', '1', '0', '40', '1', '1', '1', '1')";
	$ruls[] = "('{$LNG['rule_getcomment']}', 'getcomment', '1', '0', '20', '1', '1', '1', '0')";
	$ruls[] = "('{$LNG['rule_installapp']}', 'installapp', '4', '0', '0', '1', '5', '3', '5')";
	$ruls[] = "('{$LNG['rule_useapp']}', 'useapp', '1', '0', '10', '1', '1', '3', '1')";
	$ruls[] = "('{$LNG['rule_click']}', 'click', '1', '0', '10', '1', '1', '1', '1')";
	//Decrease Money Rules
	$ruls[] = "('{$LNG['rule_editrealname']}', 'editrealname', '0', '0', '1', '0', '5', '0', '0')";
	$ruls[] = "('{$LNG['rule_editrealemail']}', 'editrealemail', '0', '0', '1', '0', '5', '0', '0')";
	$ruls[] = "('{$LNG['rule_delavatar']}', 'delavatar', '0', '0', '1', '0', '10', '0', '10')";
	$ruls[] = "('{$LNG['rule_invitecode']}', 'invitecode', '0', '0', '1', '0', '0', '0', '0')";
	$ruls[] = "('{$LNG['rule_search']}', 'search', '0', '0', '1', '0', '1', '0', '0')";
	$ruls[] = "('{$LNG['rule_blogimport']}', 'blogimport', '0', '0', '1', '0', '10', '0', '0')";
	$ruls[] = "('{$LNG['rule_modifydomain']}', 'modifydomain', '0', '0', '1', '0', '5', '0', '0')";
	$ruls[] = "('{$LNG['rule_delblog']}', 'delblog', '0', '0', '1', '0', '10', '0', '10')";
	$ruls[] = "('{$LNG['rule_deldoing']}', 'deldoing', '0', '0', '1', '0', '2', '0', '2')";
	$ruls[] = "('{$LNG['rule_delimage']}', 'delimage', '0', '0', '1', '0', '4', '0', '4')";
	$ruls[] = "('{$LNG['rule_delpoll']}', 'delpoll', '0', '0', '1', '0', '4', '0', '4')";
	$ruls[] = "('{$LNG['rule_delthread']}', 'delthread', '0', '0', '1', '0', '4', '0', '4')";
	$ruls[] = "('{$LNG['rule_delevent']}', 'delevent', '0', '0', '1', '0', '6', '0', '6')";
	$ruls[] = "('{$LNG['rule_delshare']}', 'delshare', '0', '0', '1', '0', '4', '0', '4')";
	$ruls[] = "('{$LNG['rule_delguestbook']}', 'delguestbook', '0', '0', '1', '0', '4', '0', '4')";
	$ruls[] = "('{$LNG['rule_delcomment']}', 'delcomment', '0', '0', '1', '0', '2', '0', '2')";
	
	$_SGLOBAL['db']->query("INSERT INTO ".tname('creditrule')." (`rulename`, `action`, `cycletype`, `cycletime`, `rewardnum`, `rewardtype`, `credit`, `norepeat`, `experience`) VALUES ".implode(',', $ruls));
			
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('data'));

	// mail settings
	$mails = array(
		'mailsend' => 1,
		'maildelimiter' => 0,
		'mailusername' => 1
	);
	data_set('mail', $mails);

	//Image Thumbnail and Watermark Settings
	$settings = array(
		'thumbwidth' => 100,
		'thumbheight' => 100,
		'watermarkpos' => 4,
		'watermarktrans' => 75
	);
	data_set('setting', $settings);
	
	//随便看看
	$network = array(
		'blog' => array('hot1'=>3, 'cache'=>600),
		'pic' => array('hot1'=>3, 'cache'=>700),
		'thread' => array('hot1'=>3, 'cache'=>800),
		'event' => array('cache'=>900),
		'poll' => array('cache'=>500),
	);
	data_set('network', $network);

	//Cron Task Settings
	$datas = array(
		"1, 'system', '{$LNG['cron_log']}', 'log.php', $_SGLOBAL[timestamp], $_SGLOBAL[timestamp], -1, -1, -1, '0	5	10	15	20	25	30	35	40	45	50	55'",
		"1, 'system', '{$LNG['cron_cleanfeed']}', 'cleanfeed.php', $_SGLOBAL[timestamp], $_SGLOBAL[timestamp], -1, -1, 3, '4'",
		"1, 'system', '{$LNG['cron_cleannotification']}', 'cleannotification.php', $_SGLOBAL[timestamp], $_SGLOBAL[timestamp], -1, -1, 5, '6'",
		"1, 'system', '{$LNG['cron_getfeed']}', 'getfeed.php', $_SGLOBAL[timestamp], $_SGLOBAL[timestamp], -1, -1, -1, '2	7	12	17	22	27	32	37	42	47	52'",
		"1, 'system', '{$LNG['cron_cleantrace']}', 'cleantrace.php', $_SGLOBAL[timestamp], $_SGLOBAL[timestamp], -1, -1, 2, '3'"
	);
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('cron'));
	$_SGLOBAL['db']->query("INSERT INTO ".tname('cron')." (available, type, name, filename, lastrun, nextrun, weekday, day, hour, minute) VALUES (".implode('),(', $datas).")");

	//User Tasks Settings
	$datas = array();
	$datas[] = "1, '{$LNG['task_avatar']}',  '{$LNG['task_avatar_intro']}', 'avatar.php', 1, '', 0, 20, 'image/task/avatar.gif'";
	$datas[] = "1, '{$LNG['task_profile']}', '{$LNG['task_profile_intro']}', 'profile.php', '', 2, 0, 20, 'image/task/profile.gif'";
	$datas[] = "1, '{$LNG['task_blog']}',    '{$LNG['task_blog_intro']}', 'blog.php', 3, '', 0, 5, 'image/task/blog.gif'";
	$datas[] = "1, '{$LNG['task_friend']}',  '{$LNG['task_friend_intro']}', 'friend.php', 4, '', 0, 50, 'image/task/friend.gif'";
	$datas[] = "1, '{$LNG['task_email']}',   '{$LNG['task_email_intro']}', 'email.php', 5, '', 0, 10, 'image/task/email.gif'";
	$datas[] = "1, '{$LNG['task_invite']}',  '{$LNG['task_invite_intro']}', 'invite.php', 6, '', 0, 100, 'image/task/friend.gif'";
	$datas[] = "1, '{$LNG['task_gift']}',    '{$LNG['task_gift_intro']}', 'gift.php', 99, 'day', 0, 5, 'image/task/gift.gif'";

	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('task'));
	$_SGLOBAL['db']->query("INSERT INTO ".tname('task')." (`available`, `name`, `note`, `filename`, `displayorder`, `nexttype`, `nexttime`, `credit`, `image`) VALUES (".implode('),(', $datas).")");

	//Event Categories
	$datas = array(
		"1, '{$LNG['event_category1']}', 0, '{$LNG['event_category1_template']}', 1",
		"2, '{$LNG['event_category2']}', 0, '{$LNG['event_category2_template']}', 2",
		"3, '{$LNG['event_category3']}', 0, '{$LNG['event_category3_template']}', 4",
		"4, '{$LNG['event_category4']}', 0, '{$LNG['event_category4_template']}', 3",
		"5, '{$LNG['event_category5']}', 0, '{$LNG['event_category5_template']}', 5",
		"6, '{$LNG['event_category6']}', 0, '', 6"
	);	
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('eventclass'));
	$_SGLOBAL['db']->query("INSERT INTO ".tname('eventclass')." (classid, classname, poster, template, displayorder) VALUES (".implode('),(', $datas).")");
	
	// Magics
	$datas = array();
	$datas[] = "'invisible',  '{$LNG['magic_invisible']}',  '{$LNG['magic_invisible_intro']}', '5', '50', '86400', '10', '86400', '1'";
	$datas[] = "'friendnum',  '{$LNG['magic_friendnum']}',  '{$LNG['magic_friendnum_intro']}', '3', '30', '86400', '999', '0', '1'";
	$datas[] = "'attachsize', '{$LNG['magic_attachsize']}', '{$LNG['magic_attachsize_intro']}', '3', '30', '86400', '999', '0', '1'";
	$datas[] = "'thunder',	  '{$LNG['magic_thunder']}',    '{$LNG['magic_thunder_intro']}', '5', '500', '86400', '5', '86400', '1'";
	$datas[] = "'updateline', '{$LNG['magic_updateline']}', '{$LNG['magic_updateline_intro']}', '5', '200', '86400', '999', '0', '1'";
		
	$datas[] = "'downdateline', '{$LNG['magic_downdateline']}', '{$LNG['magic_downdateline_intro']}', '5', '250', '86400', '999', '0', '1'";		
	$datas[] = "'color',        '{$LNG['magic_color']}',        '{$LNG['magic_color_intro']}', '5', '50', '86400', '999', '0', '1'";
	$datas[] = "'hot',          '{$LNG['magic_hot']}',          '{$LNG['magic_hot_intro']}', '5', '50', '86400', '999', '0', '1'";
	$datas[] = "'visit',        '{$LNG['magic_visit']}',        '{$LNG['magic_visit_intro']}', '2', '20', '86400', '999', '0', '1'";
	$datas[] = "'icon',         '{$LNG['magic_icon']}',         '{$LNG['magic_icon_intro']}', '2', '20', '86400', '999', '0', '1'";
		
	$datas[] = "'flicker',   '{$LNG['magic_flicker']}',   '{$LNG['magic_flicker_intro']}', '3', '30', '86400', '999', '0', '1'";
	$datas[] = "'gift',      '{$LNG['magic_gift']}',      '{$LNG['magic_gift_intro']}', '2', '20', '86400', '999', '0', '1'";
	$datas[] = "'superstar', '{$LNG['magic_superstar']}', '{$LNG['magic_superstar_intro']}', '3', '30', '86400', '999', '0', '1'";
	$datas[] = "'viewmagiclog', '{$LNG['magic_viewmagiclog']}', '{$LNG['magic_viewmagiclog_intro']}', '5', '100', '86400', '999', '0', '1'";
	$datas[] = "'viewmagic', '{$LNG['magic_viewmagic']}', '{$LNG['magic_viewmagic_intro']}', '5', '100', '86400', '999', '0', '1'";
		
	$datas[] = "'viewvisitor', '{$LNG['magic_viewvisitor']}', '{$LNG['magic_viewvisitor_intro']}', '5', '100', '86400', '999', '0', '1'";
	$datas[] = "'call',        '{$LNG['magic_call']}', '{$LNG['magic_call_intro']}', '5', '50', '86400', '999', '0', '1'";
	$datas[] = "'coupon',      '{$LNG['magic_coupon']}', '{$LNG['magic_coupon_intro']}', '0', '0', '0', '0', '0', '1'";
	$datas[] = "'frame',       '{$LNG['magic_frame']}', '{$LNG['magic_frame_intro']}', '3', '30', '86400', '999', '0', '1'";
	$datas[] = "'bgimage',     '{$LNG['magic_bgimage']}', '{$LNG['magic_bgimage_intro']}', '3', '30', '86400', '999', '0', '1'";
		
	$datas[] = "'doodle',    '{$LNG['magic_doodle']}', '{$LNG['magic_doodle_intro']}', '3', '30', '86400', '999', '0', '1'";
	$datas[] = "'anonymous', '{$LNG['magic_anonymous']}', '{$LNG['magic_anonymous_intro']}', '5', '50', '86400', '999', '0', '1'";
	$datas[] = "'reveal',    '{$LNG['magic_reveal']}', '{$LNG['magic_reveal_intro']}', '5', '100', '86400', '999', '0', '1'";
	$datas[] = "'license',   '{$LNG['magic_license']}', '{$LNG['magic_license_intro']}', '1', '10', '3600', '999', '0', '1'";
	$datas[] = "'detector',  '{$LNG['magic_detector']}', '{$LNG['magic_detector_intro']}', '1', '10', '86400', '999', '0', '1'";
	
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('magic'));
	$_SGLOBAL['db']->query("INSERT INTO ".tname('magic')."(`mid`, `name`, `description`, `experience`, `charge`, `provideperoid`, `providecount`, `useperoid`, `usecount`) VALUES (".implode('),(', $datas).")");		

	//表态
	$datas = array(
		"'1', '{$LNG['click_icon1']}', 'luguo.gif', 'blogid'",
		"'2', '{$LNG['click_icon2']}', 'leiren.gif', 'blogid'",
		"'3', '{$LNG['click_icon3']}', 'woshou.gif', 'blogid'",
		"'4', '{$LNG['click_icon4']}', 'xianhua.gif', 'blogid'",
		"'5', '{$LNG['click_icon5']}', 'jidan.gif', 'blogid'",
		
		"'6', '{$LNG['click_icon6']}', 'piaoliang.gif', 'picid'",
		"'7', '{$LNG['click_icon7']}', 'kubi.gif', 'picid'",
		"'8', '{$LNG['click_icon8']}', 'leiren.gif', 'picid'",
		"'9', '{$LNG['click_icon9']}', 'xianhua.gif', 'picid'",
		"'10', '{$LNG['click_icon10']}', 'jidan.gif', 'picid'",
		
		"'11', '{$LNG['click_icon11']}', 'gaoxiao.gif', 'tid'",
		"'12', '{$LNG['click_icon12']}', 'mihuo.gif', 'tid'",
		"'13', '{$LNG['click_icon13']}', 'leiren.gif', 'tid'",
		"'14', '{$LNG['click_icon14']}', 'xianhua.gif', 'tid'",
		"'15', '{$LNG['click_icon15']}', 'jidan.gif', 'tid'"
	);
	$_SGLOBAL['db']->query("TRUNCATE TABLE ".tname('click'));
	$_SGLOBAL['db']->query("INSERT INTO ".tname('click')." (clickid, `name`, icon, idtype) VALUES (".implode('),(', $datas).")");

	show_msg($LNG['db_data_added'], ($step+1), 1);

} elseif ($step == 5) {

	//Make Caches
	dbconnect();
	include_once(S_ROOT.'./source/function_cache.php');

	config_cache();
	usergroup_cache();
	profilefield_cache();
	profield_cache();
	censor_cache();
	block_cache();
	eventclass_cache();
	magic_cache();
	click_cache();
	task_cache();
	ad_cache();
	creditrule_cache();
	userapp_cache();
	app_cache();
	network_cache();
//vot
	country_cache();

	$msg = <<<EOF
<form method="post" action="$theurl">
<input type="hidden" name="lang" value="$lang">
<table>
  <tr>
    <td colspan="2">
      {$LNG['db_data_added_intro']}
    </td>
  </tr>
  <tr>
    <td>{$LNG['admin_username']}</td>
    <td><input type="text" name="username" value="" size="30"></td>
  </tr>
  <tr>
    <td>{$LNG['admin_password']}</td>
    <td><input type="password" name="password" value="" size="30"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="opensubmit" value="{$LNG['admin_account_create']}"></td>
  </tr>
</table>
<input type="hidden" name="formhash" value="$formhash">
</form>
EOF;

	show_msg($msg, 999);
}


//-------------------------------------------------------
//Show Header
function show_header() {
	global $_SGLOBAL, $_SC, $nowarr, $step, $theurl;
	global $lang, $LNG;

	$nowarr[$step] = ' class="current"';

	print<<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$_SC[charset]" />
<title>{$LNG['install_title']}</title>
<style type="text/css">
* {font-size:12px; font-family: Verdana, Arial, Helvetica, sans-serif; line-height: 1.5em; word-break: break-all; }
body { text-align:center; margin: 0; padding: 0; background: #F5FBFF; }
.bodydiv { margin: 40px auto 0; width:720px; text-align:left; border: solid #86B9D6; border-width: 5px 1px 1px; background: #FFF; }
h1 { font-size: 18px; margin: 1px 0 0; line-height: 50px; height: 50px; background: #E8F7FC; color: #5086A5; padding-left: 10px; }
#menu {width: 100%; margin: 10px auto; text-align: center; }
#menu td { height: 30px; line-height: 30px; color: #999; border-bottom: 3px solid #EEE; }
.current { font-weight: bold; color: #090 !important; border-bottom-color: #F90 !important; }
.showtable { width:100%; border: solid; border-color:#86B9D6 #B2C9D3 #B2C9D3; border-width: 3px 1px 1px; margin: 10px auto; background: #F5FCFF; }
.showtable td { padding: 3px; }
.showtable strong { color: #5086A5; }
.datatable { width: 100%; margin: 10px auto 25px; }
.datatable td { padding: 5px 0; border-bottom: 1px solid #EEE; }
.datatable th { padding: 5px 0; border-bottom: 1px solid #EEE; border-top: 1px solid #EEE; }
input { border: 1px solid #B2C9D3; padding: 5px; background: #F5FCFF; }
.button { margin: 10px auto 20px; width: 100%; }
.button td { text-align: center; }
.button input, .button button { border: solid; border-color:#F90; border-width: 1px 1px 3px; padding: 5px 10px; color: #090; background: #FFFAF0; cursor: pointer; }
#footer { font-size: 10px; line-height: 40px; background: #E8F7FC; text-align: center; height: 38px; overflow: hidden; color: #5086A5; margin-top: 20px; }
</style>
<script type="text/javascript">
	function $(id) {
		return document.getElementById(id);
	}
	//Add Option
	function addoption(obj) {
		if (obj.value=='addoption') {
			var newOption=prompt('{$LNG['enter']}','');
			if (newOption!=null && newOption!='') {
				var newOptionTag=document.createElement('option');
				newOptionTag.text=newOption;
				newOptionTag.value=newOption;
				try {
					obj.add(newOptionTag, obj.options[0]); // doesn't work in IE
				}
				catch(ex) {
					obj.add(newOptionTag, obj.selecedIndex); // IE only
				}
				obj.value=newOption;
			} else {
				obj.value=obj.options[0].value;
			}
		}
	}
</script>
</head>

<body id="append_parent">
  <div class="bodydiv">
    <h1>{$LNG['install_title']}</h1>
    <div style="width:90%;margin:0 auto;">
END;

  if($lang) {
	print<<<END
      <table id="menu">
	<tr valign='top'>
	  <td{$nowarr[0]}>{$LNG['install_step1']}</td>
	  <td{$nowarr[1]}>{$LNG['install_step2']}</td>
	  <td{$nowarr[2]}>{$LNG['install_step3']}</td>
	  <td{$nowarr[3]}>{$LNG['install_step4']}</td>
	  <td{$nowarr[4]}>{$LNG['install_step5']}</td>
	  <td{$nowarr[5]}>{$LNG['install_step6']}</td>
	</tr>
      </table>
END;
  }
}

//Show Footer
function show_footer() {
  print<<<END
  </div>
  <iframe id="phpframe" name="phpframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
  <div id="footer">&copy; Comsenz Inc. 2001-2009 u.discuz.net</div>
</div>
<br>
</body>
</html>
END;
}


//Show Message
function show_msg($message, $next=0, $jump=0) {
	global $theurl, $LNG, $lang;

	$nextstr = '';
	$backstr = '';

	obclean();

	if(empty($next)) {
		$backstr .= "<a href=\"javascript:history.go(-1);\">{$LNG['go_back']}</a>";
	} elseif ($next == 999) {
	} else {
		$url_forward = "$theurl?step=$next\&lang=$lang";
		if($jump) {
			$nextstr .= "<a href=\"$url_forward\">{$LNG['wait_please']}</a>
                                     <script>setTimeout(\"window.location.href ='$url_forward';\", 2000);</script>";
		} else {
			$nextstr .= "<a href=\"$url_forward\">{$LNG['continue_next_step']}</a>";
			$backstr .= "<a href=\"javascript:history.go(-1);\">{$LNG['go_back']}</a>";
		}
	}

	show_header();
	print<<<END
	<table>
	  <tr><td>$message</td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>$backstr $nextstr</td></tr>
	</table>
END;
	show_footer();
	exit();
}

//Check File/Directory Permissions
function checkfdperm($path, $isfile=0) {

	if($isfile) {
		$file = $path;
		$mod = 'a';
	} else {
		$file = $path.'./install_tmptest.data';
		$mod = 'w';
	}
	if(!@$fp = fopen($file, $mod)) {
		return false;
	}
	if(!$isfile) {
		//是否可以删除
		fwrite($fp, ' ');
		fclose($fp);
		if(!@unlink($file)) {
			return false;
		}
		//检测是否可以创建子目录
		if(is_dir($path.'./install_tmpdir')) {
			if(!@rmdir($path.'./install_tmpdir')) {
				return false;
			}
		}
		if(!@mkdir($path.'./install_tmpdir')) {
			return false;
		}
		//是否可以删除
		if(!@rmdir($path.'./install_tmpdir')) {
			return false;
		}
	} else {
		fclose($fp);
	}
	return true;
}


//---------------------------------------
// Load the Language File
function load_language($lng = 'en') {
  global $_SC, $_SGLOBAL, $LNG;

  require(S_ROOT.'./language/'.$lng.'/lang_install.php');

  $LNG = $_SGLOBAL['sourcelang'];

}

//---------------------------------------
// Make Simple Language Array
function make_language_list($languages=array()) {

  $language_list = array();

  foreach($languages as $key=>$lng) {
    $language_list[] = $key;
  }

  return $language_list;
}

//---------------------------------------
// Show the Language Menu
function show_languages($languages=array(), $default='') {
  global $LNG;

  echo "<dir><dir><dir>
  <h2>Select the language for installation:</h2>
  <ul style='list-style-type:none;'>
  <form method='post' action='$theurl'>\n";

  foreach($languages as $name=>$lng) {
    if($name === $default) {
      $selected = "checked='checked'";
    } else {
      $selected = '';
    }

    echo "<li><input type='radio' name='lang' value='$name' $selected> &nbsp; <img src='{$lng['icon']}'> &nbsp; {$lng['title']}</li>\n";
  }

  echo "<br><br>
  <input type='submit' value='{$LNG['submit']}'>
  </form>
  </ul>
  <br><br>
  </dir></dir></dir>\n";

}

