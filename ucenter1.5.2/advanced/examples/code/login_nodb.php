<?php
/**
 * UCenter Application Development Example
 *
 * The application without the database, the user logged on Example code
 * Use the interface function:
 * uc_user_login()	Must, to judge the effectiveness of the logged on user
 * uc_authcode()	Optionally, the user center to use encryption and decryption functions Cookie
 * uc_user_synlogin()	Optional, generate the code synchronization log
 */

if(empty($_POST['submit'])) {
	//Login Form
	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?example=login">';
	echo 'Login:';
	echo '<dl><dt>User name</dt><dd><input name="username"></dd>';
	echo '<dt>Password</dt><dd><input name="password" type="password"></dd></dl>';
	echo '<input name="submit" type="submit"> ';
	echo '</form>';
} else {
	//Login account through the interface to check the correctness of the return value is an array
	list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);

	setcookie('Example_auth', '', -86400);
	if($uid > 0) {
		//User login successfully, setting Cookie, encryption directly uc_authcode function, users use their own functions
		setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
		//The code generated synchronization log
		$ucsynlogin = uc_user_synlogin($uid);
		echo 'Login Successful '.$ucsynlogin.'<br><a href="'.$_SERVER['PHP_SELF'].'">Continue</a>';
		exit;
	} elseif($uid == -1) {
		echo 'The user does not exist, or deleted';
	} elseif($uid == -2) {
		echo 'Password wrong';
	} else {
		echo 'Undefined';
	}
}

