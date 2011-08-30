<?php
/**
 * UCenter Application Development Example
 *
 * The application without the database, the user registration code Example
 * Use the interface function:
 * uc_user_register()	Must be, a registered user data
 * uc_authcode()	Optionally, the user center to use encryption and decryption functions Cookie
 */

if(empty($_POST['submit'])) {
	//Registration Form
	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?example=register">';
	echo 'Registration:';
	echo '<dl><dt>User name</dt><dd><input name="username"></dd>';
	echo '<dt>Password</dt><dd><input name="password"></dd>';
	echo '<dt>Email</dt><dd><input name="email"></dd></dl>';
	echo '<input name="submit" type="submit">';
	echo '</form>';
} else {
	//Registered user information in UCenter
	$uid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
	if($uid <= 0) {
		if($uid == -1) {
			echo 'Username illegal';
		} elseif($uid == -2) {
			echo 'Contains not allowed words for registration';
		} elseif($uid == -3) {
			echo 'User name already exists';
		} elseif($uid == -4) {
			echo 'Email format is incorrect';
		} elseif($uid == -5) {
			echo 'This Email does not allowed for registration';
		} elseif($uid == -6) {
			echo 'This Email is already registered';
		} else {
			echo 'Undefined';
		}
	} else {
		//Registration is successful, set the Cookie, encryption directly uc_authcode function, users use their own functions
		setcookie('Example_auth', uc_authcode($uid."\t".$_POST['username'], 'ENCODE'));
		echo 'Registration success<br><a href="'.$_SERVER['PHP_SELF'].'">Continue</a>';
	}
}

