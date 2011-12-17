<?php
/* 
 * http://home.techweb.com.cn
 */

echo "<h1>Gifts Plugin Installation.</h1>";

if( @file_exists("./install.lock") ) {
  echo "It seems you have Gifts-plugin  installed allready.<br>For mandatory reinstall please delete the file gift/gift_install.lock<br />";
  echo "and then renew this page.<br />";
  exit();
}


include_once('../common.php');
include_once('./source/common.php');

// This statement is used only for statistical number of the plug-in,
// for no other purpose.
// In order to make the plug-in functions more perfect,
// please do not change the code of this document.
//$url = "http://home.techweb.com.cn/appinfo.php?app=gift&uri=".urlencode($_SERVER['HTTP_HOST']."/".$_SERVER['PHP_SELF'])."&scpit=".urlencode($_SERVER['SCRIPT_URI']);
//@file_get_contents($url);

if ($_GET['install'] != 'yes') {
  echo "<a href='?install=yes'>Click here to automatically install</a>.<br /><br />";
  echo "Below is the manual installation instructions:<br /><hr />";
  echo "<pre>";
  include("./readme.txt");
  echo "</pre>";
  exit();
}

if ( $_SGLOBAL['db']->version()>'4.1') {
  $sqlfile = "./gift.sql";
} else {
  $sqlfile = "./gift.4.1.sql";
}

$newsql = sreadfile($sqlfile);

$sqls = explode(";", $newsql);

foreach ($sqls as $sql) {
  $sql = trim($sql);
  if (empty($sql)) {
    continue;
  }
  if(!$query = $_SGLOBAL['db']->query($sql, 'SILENT')) {
    echo "SQL query error: ".mysql_error();
    exit();
  }
}
echo "Gift table created successfully.<br />";


//unlink("gift/gift.sql");
//unlink("gift/gift.4.1.sql");
//unlink("gift/gift_install.php");

echo "Checking for language packs.<br />";
if (is_dir('../language')) {
  echo "../language directory found.<br />";
  if ($dh = opendir('../language')) {
    $count = 0;
    while (($lng = readdir($dh)) !== false) {
      if (is_dir("../language/$lng")) {
        if ($lng != '.' && $lng != '..') {
          if(is_file("./lang/$lng/lang_gift.php")) {
            $lngfrom = $lng;
          } else {
            $lngfrom = 'en';
          }

          @unlink("../language/$lng/lang_gift.php");

          $src = "./lang/$lngfrom/lang_gift.php";

          if(copy($src,"../language/$lng/lang_gift.php")) {
            echo "./lang/$lngfrom/lang_gift.php copied to ../language/$lng/<br />";
          } else {
            echo "Can not copy ./lang/$lngfrom/lang_gift.php to ../language/$lng/<br />";
          }
          $count++;
        }
      }
    }
    closedir($dh);

    if($count) {
      echo "Note:<br />";
      echo "Language file lang_gift.php was copied to all your language packs.<br />";
      echo "You can translate the file language/xx/lang_gift.php to corresponding language.<br />";
    }
  } else {
    echo "Can not open directory ../language/ for read.<br />";
  }
}


touch("install.lock");

echo "<h4> Installation is completed </h4><br />";

echo "Read the AFTER INSTALL section in gift/readme.txt for setup.<br /><br /><br />";

echo "<a href='../gift.php'>Click here to view</a>";
