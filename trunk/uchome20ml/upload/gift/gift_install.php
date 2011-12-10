<?php
/* 
 * http://home.techweb.com.cn
 */

// This statement is used only for statistical number of the plug-in,
// for no other purpose.
// In order to make the plug-in functions more perfect,
// please do not change the code of this document.
$url = "http://home.techweb.com.cn/appinfo.php?app=gift&uri=".urlencode($_SERVER['HTTP_HOST']."/".$_SERVER['PHP_SELF'])."&scpit=".urlencode($_SERVER['SCRIPT_URI']);
@file_get_contents($url);

if ($_GET['install'] != 'yes') {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=gbk" />';
	echo "Gifts you have not installed plug-ins. <a href='gift.php?do=install&install=yes'>Click here to automatically install</a>.<br /><br />";
	echo "If you have installed, delete the gift/ folder gift_install.php file.<br /><br />";
	echo "(The following is the manual installation instructions)<br /><br /><hr />";
	echo "<pre>";
	include("gift/readme.txt");
	echo "</pre>";
	exit();
}

if ( $_SGLOBAL['db']->version()>'4.1') {
	$sqlfile = "gift/gift.sql";
} else {
	$sqlfile = "gift/gift.4.1.sql";
}
$newsql = sreadfile($sqlfile);

$sqls = explode(";", $newsql);
foreach ($sqls as $sql) {
	$sql = trim($sql);
	if (empty($sql)) {
		continue;
	}
	if(!$query = $_SGLOBAL['db']->query($sql, 'SILENT')) {
		echo "Execute sql statement is wrong: ".mysql_error();
		exit();
	}
}
echo "<br /><br />sql statement executed successfully.";


//vot unlink("gift/gift.sql");
//vot unlink("gift/gift.4.1.sql");
//vot unlink("gift/gift_install.php");

echo "<h4> Installation is completed </h4>";
echo "<a href='gift.php'>Click here to view</a>";
?>