<?php

/*
	[UCenter] (C)2001-2099 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: upgrade_1.0.0Beta_1.0.0.php 1080 2011-04-07 01:19:42Z svn_project_zhangjie $
*/

define("IN_UC", TRUE);
define('UC_ROOT', realpath('.').'/');

$version_old = 'UCenter 1.0 Beta';
$version_new = 'UCenter 1.0';

require UC_ROOT.'./data/config.inc.php';
require UC_ROOT.'./lib/db.class.php';

error_reporting(7);
@set_magic_quotes_runtime(0);

$action = getgpc('action');

$sql = <<<EOT

DROP TABLE if exists uc_admins;
CREATE TABLE uc_admins (
  uid int(11) unsigned NOT NULL  auto_increment,
  username varchar(64) NOT NULL ,
  allowadminsetting tinyint(1) NOT NULL  DEFAULT '0',
  allowadminapp tinyint(1) NOT NULL  DEFAULT '0',
  allowadminuser tinyint(1) NOT NULL  DEFAULT '0',
  allowadminbadword tinyint(1) NOT NULL  DEFAULT '0',
  allowadmintag tinyint(1) NOT NULL  DEFAULT '0',
  allowadminpm tinyint(1) NOT NULL  DEFAULT '0',
  allowadmincredits tinyint(1) NOT NULL  DEFAULT '0',
  allowadmindomain tinyint(1) NOT NULL  DEFAULT '0',
  allowadmindb tinyint(1) NOT NULL  DEFAULT '0',
  allowadminnote tinyint(1) NOT NULL  DEFAULT '0',
  allowadmincache tinyint(1) NOT NULL  DEFAULT '0',
  allowadminlog tinyint(1) NOT NULL  DEFAULT '0',
  PRIMARY KEY (uid) ,
  UNIQUE KEY username (username)
)Type=MyISAM;

ALTER TABLE uc_applications
  change type type varchar(16) NOT NULL  after appid,
  add column recvnote tinyint(1) NULL  DEFAULT '0' after synlogin,
  change extra extra mediumtext NOT NULL  after recvnote,
  add column tagtemplates mediumtext NOT NULL  after extra, COMMENT='';
  
ALTER TABLE uc_friends
  add index uid (uid),
  add index friendid (friendid);

drop table if exists uc_failedlogins;
CREATE TABLE uc_failedlogins (
  ip varchar(15) NOT NULL ,
  count tinyint(1) unsigned NOT NULL  DEFAULT '0',
  lastupdate int(11) unsigned NOT NULL  DEFAULT '0',
  PRIMARY KEY (ip)
)Type=MyISAM;

ALTER TABLE uc_feeds
  change title_template title_template text NOT NULL  after hash_data,
  change title_data title_data text NOT NULL  after title_template, COMMENT='';

DROP TABLE if exists uc_mergemembers;
CREATE TABLE uc_mergemembers (
  appid int(11) unsigned NOT NULL ,
  username varchar(64) NOT NULL ,
  PRIMARY KEY (appid,username)
)Type=MyISAM;

ALTER TABLE uc_notelist
  add column closed int(11) NOT NULL  DEFAULT '0' after operation,
  change totalnum totalnum int(11) unsigned NOT NULL  DEFAULT '0' after closed,
  add column succeednum int(11) unsigned NOT NULL  DEFAULT '0' after totalnum,
  add column getdata mediumtext NOT NULL  after succeednum,
  add column postdata mediumtext NOT NULL  after getdata,
  add column dateline int(11) unsigned NOT NULL  DEFAULT '0' after postdata,
  add column pri int(11) NOT NULL  DEFAULT '0' after dateline,
  drop column args;

DROP TABLE if exists uc_protectedmembers;
CREATE TABLE uc_protectedmembers (
  uid int(11) unsigned NOT NULL  DEFAULT '0',
  username varchar(64) NOT NULL ,
  appid tinyint(1) unsigned NOT NULL  DEFAULT '0',
  dateline int(11) unsigned NOT NULL  DEFAULT '0',
  admin varchar(64) NOT NULL  DEFAULT '0',
  UNIQUE KEY username (username,appid)
)Type=MyISAM;

DROP TABLE if exists uc_vars;
CREATE TABLE uc_vars (
  name varchar(64) NOT NULL ,
  value char(255) NOT NULL ,
  PRIMARY KEY (name)
)Type=HEAP;

ALTER TABLE uc_badwords ADD UNIQUE find (find);
ALTER TABLE uc_notelist ADD KEY closed (closed,pri,noteid);
UPDATE uc_pms SET related=0;
REPLACE INTO uc_settings(k,v) VALUES ('dateformat','Y-m-d');

EOT;

if(!$action) {

	showheader();

?>

	<p>This procedure is used to upgrade UCenter 1.0 beta to UCenter 1.0</p>
	<p>Before running the upgrade process, make sure you have uploaded UCenter 1.0 all files and directories</p>
	<p>Strongly recommend that you backup data before upgrade the database</p>
	<p><a href="<?php echo $PHP_SELF;?>?action=updatepw">If you have confirmed completion of the above steps, please click here to upgrade</a></p>

<?php
	showfooter();

} elseif($action == 'updatepw') {

	//note Processing config.inc.php

	define('UC_CONFIG', UC_ROOT.'./data/config.inc.php');
	if(!is_writable(UC_CONFIG)) {
		showmessage('Configuration file ./data/config.inc.php is not writeable. (For *nix systems, set file permissions to 777, For Windows system set the IIS account can write it)');
	}
	if(empty($_POST['password'])) {
		showheader();
		echo '<br /><br /><h3>Upgrade process need to reset the Founder password, this Account is the system built, so Remember password!</h3>';
		echo '<form action="upgrade_1.0.0Beta_1.0.0.php?action=updatepw" method="post">';
		echo 'Founder account: <input type="text" name="founder" disabled="disabled" value="UCenterAdministrator" /><br />';
		echo 'Founder Password: <input type="password" name="password" /><br />';
		echo 'Repeat password: <input type="password" name="password2" /><br />';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value=" Submit " />';
		echo '</form>';
		showfooter();

	} else {
		if($_POST['password'] != $_POST['password2']) {
			showmessage('Entered twice passwords are not equal, please return.');
		}
		$ucsalt = substr(uniqid(rand()), 0, 6);
		$ucfounderpw = md5(md5($_POST['password']).$ucsalt);
		$config = file_get_contents(UC_CONFIG);
		$config = preg_replace("/define\(\'UC_FOUNDERPW\', \'(\w+)\'\);/", "define('UC_FOUNDERPW', '$ucfounderpw');\r\n", $config);
		if(strpos($config, 'define(\'UC_FOUNDERSALT\'') !== FALSE) {
			$config = preg_replace("/define\(\'UC_FOUNDERSALT\', \'(\w+)\'\);/", "define('UC_FOUNDERSALT', '$ucsalt');\r\n", $config);
		} else {
			$config = preg_replace("/(.+)\?\>$/", "\\1", trim($config));
			$config .= "define('UC_FOUNDERSALT', '$ucsalt');\r\n";
		}
		$fp = fopen(UC_CONFIG, 'w');
		fwrite($fp, $config);
		fclose($fp);
		header("Location:upgrade_1.0.0Beta_1.0.0.php?action=db");
	}

} elseif($action == 'db') {

	showheader();

	$db = new db;
	$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);

	runquery($sql);
	@mkdir(UC_ROOT.'./data/tmp', 0777);
	@mkdir(UC_ROOT.'./data/backup', 0777);
	dir_clear(UC_ROOT.'./data/view');

	echo "The upgrade is complete. Please delete the upgrade_1.0.0Beta_1.0.0.php";
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

	print <<< EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>UCenter Upgrade ( $version_old &gt;&gt; $version_new)</title>
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
<table width="95%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
<tr>
<td>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td class="install" height="30" valign="bottom"><font color="#FF0000">&gt;&gt;</font>
UCenter Upgrade ( $version_old &gt;&gt; $version_new)</td>
</tr>
<tr>
<td>
<hr noshade align="center" width="100%" size="1">
</td>
</tr>
<tr>
<td align="center">
<b>The program can upgrade only from $version_old to $version_new , Befire Run, make sure all files have been uploaded, and data backup is made<br />
If you have any questions about Upgrade, please visit the support site <a href="http://www.discuz.net" target="_blank">http://www.discuz.net</a></b>
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
&gt;&gt;<a href="$url">Browser will automatically reload the page, without human intervention. If your browser does not redirect for a long time, please click here</a>
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
	foreach($add[1] as $k=>$colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($add[2][$k]));
		$arr[] = array($tablename, 'ADD', $colname, $attr);
	}
	foreach($drop[1] as $k=>$colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($drop[2][$k]));
		$arr[] = array($tablename, 'DROP', $colname, $attr);
	}
	foreach($change[1] as $k=>$colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($change[2][$k]));
		$arr[] = array($tablename, 'CHANGE', $colname, $attr);
	}
	foreach($keys[1] as $k=>$colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($keys[0][$k]));
		$arr[] = array($tablename, 'INDEX', '', $attr);
	}
	foreach($uniques[1] as $k=>$colname) {
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


?>