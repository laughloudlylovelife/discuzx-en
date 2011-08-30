<?php
/**
 * UCenter Application Development Example
 *
 * UCenter simple application, the application has its own user table
 * Use the interface function:
 * uc_authcode()	Optionally, the user center to use encryption and decryption functions Cookie
 * uc_pm_checknew()	Optional, for global determine whether there is a new short message, return $newpm variable
 */

include './config.inc.php';

/**
 * Connect to the database

 Users List Sample
 CREATE TABLE `example_members` (
   `uid` int(11) NOT NULL COMMENT 'UID',
   `username` char(15) default NULL COMMENT 'User name',
   `admin` tinyint(1) default NULL COMMENT 'If the user is an administrator',
   PRIMARY KEY  (`uid`)
 ) TYPE=MyISAM;

 */

include './include/db_mysql.class.php';
$db = new dbstuff;
$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);

include './uc_client/client.php';

/**
 * Get the current user UID and user name
 * Cookie decryption directly by uc_authcode function, users use their own functions
 */
if(!empty($_COOKIE['Example_auth'])) {
	list($Example_uid, $Example_username) = explode("\t", uc_authcode($_COOKIE['Example_auth'], 'DECODE'));
} else {
	$Example_uid = $Example_username = '';
}

/**
* Get the latest PMs
 */
$newpm = uc_pm_checknew($Example_uid);

/**
* Example code for each function
 */
switch(@$_GET['example']) {
	case 'login':
		//Example code UCenter User login
		include 'code/login_db.php';
	break;
	case 'logout':
		//Example code UCenter user Logout
		include 'code/logout.php';
	break;
	case 'register':
		//Example code UCenter user registration
		include 'code/register_db.php';
	break;
	case 'pmlist':
		//UCenter list of unread PMs Example code
		include 'code/pmlist.php';
	break;
	case 'pmwin':
		//UCenter short message center Example code
		include 'code/pmwin.php';
	break;
	case 'friend':
		//Example code for UCenter friends API
		include 'code/friend.php';
	break;
	case 'avatar':
		//Example code to set Avatar in UCenter
		include 'code/avatar.php';
	break;
}

echo '<hr />';
if(!$Example_username) {
	//User log in
	echo '<a href="'.$_SERVER['PHP_SELF'].'?example=login">Login</a> ';
	echo '<a href="'.$_SERVER['PHP_SELF'].'?example=register">Register</a> ';
} else {
	//The user has logged
	echo '<script src="ucexample.js"></script><div id="append_parent"></div>';
	echo $Example_username.' <a href="'.$_SERVER['PHP_SELF'].'?example=logout">Logout</a> ';
	echo ' <a href="'.$_SERVER['PHP_SELF'].'?example=pmlist">Short Message List</a> ';
	echo $newpm ? '<font color="red">New!('.$newpm.')</font> ' : NULL;
	echo '<a href="###" onclick="pmwin(\'open\')">Go to the short message center</a> ';
	echo ' <a href="'.$_SERVER['PHP_SELF'].'?example=friend">Friends</a> ';
	echo ' <a href="'.$_SERVER['PHP_SELF'].'?example=avatar">Avatar</a> ';
}

