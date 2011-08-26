<?php

/*
	[UCenter] (C)2001-2099 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: upgrade_1.0.0_1.5.0.php 1080 2011-04-07 01:19:42Z svn_project_zhangjie $
*/

define("IN_UC", TRUE);
define('UC_ROOT', realpath('.').'/');

$version_old = 'UCenter 1.0';
$version_new = 'UCenter 1.5';
$lock_file = UC_ROOT.'./data/upgrade.lock';

require UC_ROOT.'./data/config.inc.php';
require UC_ROOT.'./lib/db.class.php';

error_reporting(7);
@set_magic_quotes_runtime(0);
$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);

$action = getgpc('action');
$forward = getgpc('forward');

$sql = <<<EOT

DROP TABLE IF EXISTS uc_events;

ALTER TABLE uc_members ADD COLUMN secques VARCHAR(32) NOT NULL DEFAULT '';

ALTER TABLE uc_notelist ADD KEY dateline (dateline);

ALTER TABLE uc_applications ADD COLUMN viewprourl VARCHAR( 255 ) NOT NULL AFTER `ip` ;

ALTER TABLE uc_applications ADD COLUMN apifilename VARCHAR( 32 ) NOT NULL DEFAULT 'uc.php' AFTER `ip` ;

ALTER TABLE uc_pms ADD COLUMN fromappid INT(11) UNSIGNED NOT NULL DEFAULT '0';

ALTER TABLE uc_applications CHANGE authkey authkey VARCHAR( 255 ) NOT NULL;

DROP TABLE IF EXISTS uc_mailqueue;
CREATE TABLE IF NOT EXISTS uc_mailqueue (
  mailid int(11) unsigned NOT NULL auto_increment,
  touid int(11) unsigned NOT NULL default '0',
  tomail varchar(32) NOT NULL,
  frommail varchar(255) NOT NULL,
  subject varchar(255) NOT NULL,
  message text NOT NULL,
  charset varchar(15) NOT NULL,
  htmlon tinyint(1) NOT NULL default '0',
  level tinyint(1) NOT NULL default '1',
  dateline int(11) unsigned NOT NULL default '0',
  failures int(11) unsigned NOT NULL default '0',
  appid int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mailid`),
  KEY appid (appid),
  KEY level (level,failures)
) TYPE=MyISAM  AUTO_INCREMENT=1 ;

REPLACE INTO uc_settings (k, v) VALUES ('maildefault', 'username@localhost.com');
REPLACE INTO uc_settings (k, v) VALUES ('mailsend', '1');
REPLACE INTO uc_settings (k, v) VALUES ('mailserver', 'smtp.localhost.com');
REPLACE INTO uc_settings (k, v) VALUES ('mailport', '25');
REPLACE INTO uc_settings (k, v) VALUES ('mailauth', '1');
REPLACE INTO uc_settings (k, v) VALUES ('mailfrom', 'UCenter <username@localhost.com>');
REPLACE INTO uc_settings (k, v) VALUES ('mailauth_username', 'username@localhost.com');
REPLACE INTO uc_settings (k, v) VALUES ('mailauth_password', 'password');
REPLACE INTO uc_settings (k, v) VALUES ('maildelimiter', '0');
REPLACE INTO uc_settings (k, v) VALUES ('mailusername', '1');
REPLACE INTO uc_settings (k, v) VALUES ('mailsilent', '1');
REPLACE INTO uc_settings (k, v) VALUES ('pmlimit1day','100');
REPLACE INTO uc_settings (k, v) VALUES ('pmfloodctrl','15');
REPLACE INTO uc_settings (k, v) VALUES ('pmcenter','1');
REPLACE INTO uc_settings (k, v) VALUES ('sendpmseccode','1');
REPLACE INTO uc_settings (k, v) VALUES ('pmsendregdays','0');
EOT;

if(file_exists($lock_file) && $action != 'upgsecques') {
	showheader();
	showerror('Upgrade is locked, if it should be upgraded, manually delete the<br />'.str_replace(UC_ROOT, '', $lock_file).' file,<br />and then refresh the page');
	showfooter();
}

if(!$action) {

	showheader();

?>

	<p>This procedure is used to upgrade UCenter 1.0 to UCenter 1.5</p>
	<p>Before run the upgrade process, make sure all UCenter 1.5 files and directories has been uploaded</p>
	<p>Strongly recommend to backup the database before the upgrade information.</p>
	<p><a href="<?php echo $PHP_SELF;?>?action=db">If you have confirmed completion of the above steps, please click here to upgrade</a></p>

<?php
	showfooter();

} elseif($action == 'db') {

	@touch(UC_ROOT.'./data/install.lock');
	@unlink(UC_ROOT.'./install/index.php');

	$db = new ucserver_db();
	$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);

	runquery($sql);
	dir_clear(UC_ROOT.'./data/view');
	dir_clear(UC_ROOT.'./data/cache');
	if(is_dir(UC_ROOT.'./plugin/setting')) {
		dir_clear(UC_ROOT.'./plugin/setting');
		@unlink(UC_ROOT.'./plugin/setting/index.htm');
		@rmdir(UC_ROOT.'./plugin/setting');
	}

	//note Upgrade uc_applications.viewprourl
	$db->query("UPDATE ".UC_DBTABLEPRE."applications SET viewprourl='/space.php?uid=%s'");
	$query = $db->query("SELECT * FROM ".UC_DBTABLEPRE."applications");
	while($app = $db->fetch_array($query)) {
		if(authcode($app['authkey'], 'DECODE', UC_MYKEY)) continue;
		$authkey = authcode($app['authkey'], 'ENCODE', UC_MYKEY);
		$appid = $app['appid'];
		$db->query("UPDATE ".UC_DBTABLEPRE."applications SET authkey='$authkey' WHERE appid='$appid'");
	}

	header("Location: upgrade_1.0.0_1.5.0.php?action=pm&forward=".urlencode($forward));

} elseif($action == 'pm') {

	showheader();

	echo "<h4>Short message data processing</h4>";

	$db = new ucserver_db();
	$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);

	$total = getgpc('total');
	$start = intval(getgpc('start'));
	$limit = 1000;
	if(!$total) {
		$total = $db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE."pms WHERE related=0");
	}

	if(!$total || $total <= $start) {
		$db->query("REPLACE INTO ".UC_DBTABLEPRE."settings (k, v) VALUES('version', '1.5.0')");//note Record database version
		@touch($lock_file);
		if($forward) {
			echo "<br /><br /><br /><a href=\"$forward\">Browser will automatically redirected, without human intervention. Unless a long time when your browser does not support frames, please click here</a>";
			echo "<script>setTimeout(\"redirect('$forward');\", 1250);</script>";
		} else {
			echo "The upgrade is completed.";
		}
	} else {
		$query = $db->query("SELECT * FROM ".UC_DBTABLEPRE."pms WHERE related=0 LIMIT $start, $limit");
		while($data = $db->fetch_array($query)) {
			$data['msgfrom'] = addslashes($data['msgfrom']);
			$data['subject'] = addslashes($data['subject']);
			$data['message'] = addslashes($data['message']);
			$db->query("REPLACE INTO ".UC_DBTABLEPRE."pms SET msgfrom='$data[msgfrom]',
				msgfromid='$data[msgfromid]',msgtoid='$data[msgtoid]',folder='$data[folder]',new='$data[new]',subject='$data[subject]',
				dateline='$data[dateline]',message='$data[message]',delstatus='$data[delstatus]',related='".time()."'", 'SILENT');
		}
	
		$end = $start + $limit;
		echo "Short message data has been processed: $start / $total ...";
		$url_forward = "upgrade_1.0.0_1.5.0.php?action=pm&start=$end&total=$total&forward=".urlencode($forward);
		echo "<br /><br /><br /><a href=\"$url_forward\">Browser will automatically redirected, without human intervention. Unless a long time when your browser does not support frames, please click here</a>";
		echo "<script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";
	}

	showfooter();

} elseif($action == 'upgsecques') {

	$lock_file = UC_ROOT.'./data/upgsecques.lock';
	if(file_exists($lock_file)) {
		showheader();
		showerror('Upgrade is locked, it should be has upgraded the security question, if the data has been restored manually, delete the file<br />'.str_replace(UC_ROOT, '', $lock_file).'<br />and then refresh the page');
	}
	$uc_authcode = getgpc('uc_authcode', 'C');

	if(empty($uc_authcode) || authcode($uc_authcode, 'DECODE', UC_KEY) != UC_FOUNDERPW) {
		$uc_founderpw = getgpc('uc_founderpw');
		if(empty($uc_founderpw) || UC_FOUNDERPW !=  md5(md5($uc_founderpw).UC_FOUNDERSALT)) {
			echo '<form method="post">';
			echo 'Please enter the UCenter founder password: <input type="password" name="uc_founderpw" /> <input type="submit" value="Submit" />';
			exit;
		} else {
			setcookie('uc_authcode', authcode(UC_FOUNDERPW, 'ENCODE', UC_KEY));
			header("Location: upgrade_1.0.0_1.5.0.php?action=upgsecques");
			exit;
		}
	}

	if(!is_dir(UC_ROOT.'./data/upgsecques')) {
		showheader();
		showerror('Please, under the forum ./forumdata/upgsecques directory uploaded UCenter directory ./data/ , and then <a href="javascript:location.reload();" target="_self">refresh this page</a>');
	}
	$num = getgpc('num');
	$num = $num ? intval($num) : 1;
	$random = getgpc('random');
	if(empty($random)) {
		$dir = UC_ROOT.'./data/upgsecques';
		$directory = dir($dir);
		while($entry = $directory->read()) {
			if(preg_match('/^secques_(\w+)_\d+/', $entry, $match)) {
				break;
			}
		}
		$random = $match[1];
	};

	$dump_file = UC_ROOT.'./data/upgsecques/secques_'.$random.'_'.$num.'.sql';
	if(!file_exists($dump_file)) {//note Upgrade completed
		@touch($lock_file);
		dir_clear(UC_ROOT.'./data/upgsecques');
		setcookie('uc_authcode', '');
		showheader();
		echo 'Security question upgrade is completed, Thank you for using this program';
	} else {
		showheader();
		$sql = file_get_contents($dump_file);
		$db = new ucserver_db();
		$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);
		runquery($sql);
		$num++;
		echo "Importing Security Question";
		$url_forward = "upgrade_1.0.0_1.5.0.php?action=upgsecques&num=$num&random=$random";
		echo "<br /><br /><br /><a href=\"$url_forward\">Browser will automatically redirected, without human intervention. Unless a long time when your browser does not support frames, please click here</a>";
		echo "<script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";
	}

	showfooter();

}

function dir_clear($dir) {
	$directory = dir($dir);
	while($entry = $directory->read()) {
		$filename = $dir.'/'.$entry;
		if(is_file($filename)) {
			@unlink($filename);
		}
	}
	@touch($dir.'/index.htm');
	$directory->close();
}

function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

function generate_key() {
	$random = random(32);
	$info = md5($_SERVER['SERVER_SOFTWARE'].$_SERVER['SERVER_NAME'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT'].$_SERVER['HTTP_USER_AGENT'].time());
	$return = '';
	for($i=0; $i<64; $i++) {
		$p = intval($i/2);
		$return[$i] = $i % 2 ? $random[$p] : $info[$p];
	}
	return implode('', $return);
}

function createtable($sql, $dbcharset) {
	$type = strtoupper(preg_replace("/^\s*CREATE TABLE\s+.+\s+\(.+?\).*(ENGINE|TYPE)\s*=\s*([a-z]+?).*$/isU", "\\2", $sql));
	$type = in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM';
	return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).
	(mysql_get_server_info() > '4.1' ? " ENGINE=$type default CHARSET=".UC_DBCHARSET : " TYPE=$type");
}

function runquery($query) {
	global $db;

	$query = str_replace("\r", "\n", str_replace(' uc_', ' '.UC_DBTABLEPRE, $query));
	$expquery = explode(";\n", $query);

	foreach($expquery as $sql) {
		$sql = trim($sql);
		if($sql == '' || $sql[0] == '#') continue;

		if(strtoupper(substr($sql, 0, 12)) == 'CREATE TABLE') {
			$db->query(createtable($sql, UC_DBCHARSET));
		} elseif (strtoupper(substr($sql, 0, 11)) == 'ALTER TABLE') {
			runquery_altertable($sql);
		} else {
			$db->query($sql);
		}
	}
}

function getgpc($k, $var='R') {
	switch($var) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
	}
	return isset($var[$k]) ? $var[$k] : NULL;
}

function showheader() {
	global $version_old, $version_new;

	$charset = UC_CHARSET;
	print <<< EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$charset" />
<title>UCenter Upgrade ( $version_old &gt;&gt; $version_new )</title>
<meta name="MSSmartTagsPreventParsing" content="TRUE">
<meta http-equiv="MSThemeCompatible" content="Yes">
<style>
a:visited	{color: #FF0000; text-decoration: none}
a:link		{color: #FF0000; text-decoration: none}
a:hover		{color: #FF0000; text-decoration: underline}
body,table,td	{color: #3a4273; font-family: Tahoma, verdana, arial; font-size: 12px; line-height: 20px; scrollbar-base-color: #e3e3ea; scrollbar-arrow-color: #5c5c8d}
input		{color: #085878; font-family: Tahoma, verdana, arial; font-size: 12px; background-color: #3a4273; color: #ffffff; scrollbar-base-color: #e3e3ea; scrollbar-arrow-color: #5c5c8d}
.install	{font-family: Arial, Verdana; font-size: 14px; font-weight: bold; color: #000000}
.header		{font: 12px Tahoma, Verdana; font-weight: bold; background-color: #3a4273 }
.header	td	{color: #ffffff}
.red		{color: red; font-weight: bold}
.bg1		{background-color: #e3e3ea}
.bg2		{background-color: #eeeef6}
</style>
</head>

<body bgcolor="#3A4273" text="#000000">
<script type="text/javascript">
	function redirect(url) {
		window.location=url;
	}
</script>
<table width="95%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
<tr>
<td>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td class="install" height="30" valign="bottom"><font color="#FF0000">&gt;&gt;</font>
UCenter Upgrade ( $version_old &gt;&gt; $version_new )</td>
</tr>
<tr>
<td>
<hr noshade align="center" width="100%" size="1">
</td>
</tr>
<tr>
<td align="center">
<b>The program can upgrade only from $version_old to $version_new , If Run, make sure all the files have been uploaded, and data backup is made<br />
If you have any questions about Upgrade,please visit the support site <a href="http://www.discuz.net" target="_blank">http://www.discuz.net</a></b>
</td>
</tr>
<tr>
<td>
<hr noshade align="center" width="100%" size="1">
</td>
</tr>
<tr><td>
EOT;
}

function showfooter() {
	echo <<< EOT
</td></tr></table></td></tr>
<tr><td height="100%">&nbsp;</td></tr>
</table>
</body>
</html>
EOT;
	exit();
}

function showerror($message, $break = 1) {
	echo '<br /><br />'.$message.'<br /><br />';
	if($break) showfooter();
}

function redirect($url) {

	$url = $url.(strstr($url, '&') ? '&' : '?').'t='.time();

	echo <<< EOT
<hr size=1>
<script language="JavaScript">
	function redirect() {
		window.location.replace('$url');
	}
	setTimeout('redirect();', 1000);
</script>
<br /><br />
&gt;&gt;<a href="$url">Browser will automatically jump to next page Without human intervention. If your browser does not redirect for a long time, click here</a>
<br /><br />
EOT;
	showfooter();
}

function get_table_columns($table) {
	global $db;
	$tablecolumns = array();
	if($db->version() > '4.1') {
		$query = $db->query("SHOW FULL COLUMNS FROM $table", 'SILENT');
	} else {
		$query = $db->query("SHOW COLUMNS FROM $table", 'SILENT');
	}
	while($field = @$db->fetch_array($query)) {
		$tablecolumns[$field['Field']] = $field;
	}
	return $tablecolumns;
}

function parse_alter_table_sql($s) {
	$arr = array();
	preg_match("/ALTER TABLE (\w+)/i", $s, $m);
	$tablename = substr($m[1], strlen(UC_DBTABLEPRE));
	preg_match_all("/add column (\w+) ([^\n;]+)/is", $s, $add);
	preg_match_all("/drop column (\w+)([^\n;]*)/is", $s, $drop);
	preg_match_all("/change (\w+) ([^\n;]+)/is", $s, $change);
	preg_match_all("/add key ([^\n;]+)/is", $s, $keys);
	preg_match_all("/add unique ([^\n;]+)/is", $s, $uniques);
	foreach($add[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($add[2][$k]));
		$arr[] = array($tablename, 'ADD', $colname, $attr);
	}
	foreach($drop[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($drop[2][$k]));
		$arr[] = array($tablename, 'DROP', $colname, $attr);
	}
	foreach($change[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($change[2][$k]));
		$arr[] = array($tablename, 'CHANGE', $colname, $attr);
	}
	foreach($keys[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($keys[0][$k]));
		$arr[] = array($tablename, 'INDEX', '', $attr);
	}
	foreach($uniques[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($uniques[0][$k]));
		$arr[] = array($tablename, 'INDEX', '', $attr);
	}
	return $arr;
}

function runquery_altertable($sql) {
	global $db;
	$tablepre = UC_DBTABLEPRE;
	$dbcharset = UC_DBCHARSET;

	$updatesqls = parse_alter_table_sql($sql);

	foreach($updatesqls as $updatesql) {
		$successed = TRUE;

		if(is_array($updatesql) && !empty($updatesql[0])) {

			list($table, $action, $field, $sql) = $updatesql;

			if(empty($field) && !empty($sql)) {

				$query = "ALTER TABLE {$tablepre}{$table} ";
				if($action == 'INDEX') {
					$successed = $db->query("$query $sql", "SILENT");
				} elseif ($action == 'UPDATE') {
					$successed = $db->query("UPDATE {$tablepre}{$table} SET $sql", 'SILENT');
				}

			} elseif($tableinfo = get_table_columns($tablepre.$table)) {

				$fieldexist = isset($tableinfo[$field]) ? 1 : 0;

				$query = "ALTER TABLE {$tablepre}{$table} ";

				if($action == 'MODIFY') {

					$query .= $fieldexist ? "MODIFY $field $sql" : "ADD $field $sql";
					$successed = $db->query($query, 'SILENT');

				} elseif($action == 'CHANGE') {

					$field2 = trim(substr($sql, 0, strpos($sql, ' ')));
					$field2exist = isset($tableinfo[$field2]);

					if($fieldexist && ($field == $field2 || !$field2exist)) {
						$query .= "CHANGE $field $sql";
					} elseif($fieldexist && $field2exist) {
						$db->query("ALTER TABLE {$tablepre}{$table} DROP $field2", 'SILENT');
						$query .= "CHANGE $field $sql";
					} elseif(!$fieldexist && $fieldexist2) {
						$db->query("ALTER TABLE {$tablepre}{$table} DROP $field2", 'SILENT');
						$query .= "ADD $sql";
					} elseif(!$fieldexist && !$field2exist) {
						$query .= "ADD $sql";
					}
					$successed = $db->query($query);

				} elseif($action == 'ADD') {

					$query .= $fieldexist ? "CHANGE $field $field $sql" :  "ADD $field $sql";
					$successed = $db->query($query);

				} elseif($action == 'DROP') {
					if($fieldexist) {
						$successed = $db->query("$query DROP $field", "SILENT");
					}
					$successed = TRUE;
				}

			} else {

				$successed = 'TABLE NOT EXISTS';

			}
		}
	}
	return $successed;
}

function upg_pms() {
	global $db;
	$query = $db->query("SELECT * FROM ".UC_DBTABLEPRE."pms WHERE related=0");
	while($data = $db->fetch_array($query)) {
		$data['msgfrom'] = addslashes($data['msgfrom']);
		$data['subject'] = addslashes($data['subject']);
		$data['message'] = addslashes($data['message']);
		$db->query("REPLACE INTO ".UC_DBTABLEPRE."pms SET msgfrom='$data[msgfrom]',
			msgfromid='$data[msgfromid]',msgtoid='$data[msgtoid]',folder='$data[folder]',new='$data[new]',subject='$data[subject]',
			dateline='$data[dateline]',message='$data[message]',delstatus='$data[delstatus]',related='".time()."'", 'SILENT');
	}
}

function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {

	$ckey_length = 4;	// Random key length value 0-32;
	// Adding random key, you can make any law without the ciphertext, even if the original and the same key, encrypt the result will be different each time, increasing the difficulty of cracking.
	// The greater the value, the greater the changes in the law ciphertext, ciphertext changes = 16 of $ckey_length Power
	// When this value is 0, the key is not random

	$key = md5($key ? $key : UC_KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}

}

?>