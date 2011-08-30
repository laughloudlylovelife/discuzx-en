<?php
/**
 * UCenter Application Development Example
 *
 * UCenter simple application, the application without database
 * Use the interface function:
 * uc_authcode() - optional function to use user centered Cookie encryption
 * uc_pm_checknew() - optional, for the global determine whether there is a new short message, to return $newpm variable
 */

include './config.inc.php';
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
		include 'code/login_nodb.php';
	break;
	case 'logout':
		//Example code UCenter user Logout
		include 'code/logout.php';
	break;
	case 'register':
		//Example code UCenter user registration
		include 'code/register_nodb.php';
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
		//Example code for UCenter friends
		include 'code/friend.php';
	break;
	case 'avatar':
		//Example code to set avatar in UCenter
		include 'code/avatar.php';
	break;
}

echo '<hr />';
if(!$Example_username) {
	//Users logged in
	echo '<a href="'.$_SERVER['PHP_SELF'].'?example=login">Login</a> ';
	echo '<a href="'.$_SERVER['PHP_SELF'].'?example=register">Registration</a> ';
} else {
	//The user has logged in
	echo '<script src="ucexample.js"></script><div id="append_parent"></div>';
	echo $Example_username.' <a href="'.$_SERVER['PHP_SELF'].'?example=logout">Logout</a> ';
	echo ' <a href="'.$_SERVER['PHP_SELF'].'?example=pmlist">Short Message List</a> ';
	echo $newpm ? '<font color="red">New!('.$newpm.')</font> ' : NULL;
	echo '<a href="###" onclick="pmwin(\'open\')">Go to the short message center</a> ';
	echo ' <a href="'.$_SERVER['PHP_SELF'].'?example=friend">Friends</a> ';
	echo ' <a href="'.$_SERVER['PHP_SELF'].'?example=avatar">Avatar</a> ';
}

