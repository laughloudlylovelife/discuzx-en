<?php
/**
 * UCenter Application Development Example
 *
 * The application has its own user table, user registration, activation code Example
 * Use the interface function:
 * uc_get_user()	Must, to obtain the user's information
 * uc_user_register()	Must be a registered user data
 * uc_authcode()	Optionally, the user center to use encryption and decryption function activation string and Cookie
 */

if(empty($_POST['submit'])) {
	//Registration Form
	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?example=register">';

	if($_GET['action'] == 'activation') {
		echo 'Activation:';
		list($activeuser) = explode("\t", uc_authcode($_GET['auth'], 'DECODE'));
		echo '<input type="hidden" name="activation" value="'.$activeuser.'">';
		echo '<dl><dt>User name</dt><dd>'.$activeuser.'</dd></dl>';
	} else {
		echo 'Registration:';
		echo '<dl><dt>User name</dt><dd><input name="username"></dd>';
		echo '<dt>Password</dt><dd><input name="password"></dd>';
		echo '<dt>Email</dt><dd><input name="email"></dd></dl>';
	}
	echo '<input name="submit" type="submit">';
	echo '</form>';
} else {
	//Registered user information in UCenter
	$username = '';
	if(!empty($_POST['activation']) && ($activeuser = uc_get_user($_POST['activation']))) {
		list($uid, $username) = $activeuser;
	} else {
		if(uc_get_user($_POST['username']) && !$db->result_first("SELECT uid FROM {$tablepre}members WHERE username='$_POST[username]'")) {
			//Judgments need to register the user if the user is required to activate, you need to jump to the login page authentication
			echo 'The user is not register, please activate the user<br><a href="'.$_SERVER['PHP_SELF'].'?example=login">Continue</a>';
			exit;
		}

		$uid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
		if($uid <= 0) {
			if($uid == -1) {
				echo 'Username illegal';
			} elseif($uid == -2) {
				echo 'Contains not allowed words for registration';
			} elseif($uid == -3) {
				echo 'User name already exists';
			} elseif($uid == -4) {
				echo 'Email Format error';
			} elseif($uid == -5) {
				echo 'This Email not allowed for Registration';
			} elseif($uid == -6) {
				echo 'This Email is already registered';
			} else {
				echo 'Undefined';
			}
		} else {
			$username = $_POST['username'];
		}
	}
	if($username) {
		$db->query("INSERT INTO {$tablepre}members (uid,username,admin) VALUES ('$uid','$username','0')");
		//Registration is successful, set the Cookie, encryption directly uc_authcode function, users use their own functions
		setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
		echo 'Registration success<br><a href="'.$_SERVER['PHP_SELF'].'">Continue</a>';
		exit;
	}
}

