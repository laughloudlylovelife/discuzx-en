<?php

/*
	[UCenter] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: client.php 919 2009-01-21 01:25:32Z zhaoxiongfei $
*/

if(!defined('UC_API')) {
	exit('Access denied');
}

error_reporting(0);

define('IN_UC', TRUE);
define('UC_CLIENT_VERSION', '1.5.0');
define('UC_CLIENT_RELEASE', '20090121');
define('UC_ROOT', substr(__FILE__, 0, -10));	// user Center of the root directory of the client UC_CLIENTROOT
define('UC_DATADIR', UC_ROOT.'./data/');	// user The data center cache Directory
define('UC_DATAURL', UC_API.'/data');		// user The data center URL
define('UC_API_FUNC', UC_CONNECT == 'mysql' ? 'uc_api_mysql' : 'uc_api_post');
$GLOBALS['uc_controls'] = array();

function uc_addslashes($string, $force = 0, $strip = FALSE) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = uc_addslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}

if(!function_exists('daddslashes')) {
	function daddslashes($string, $force = 0) {
		return uc_addslashes($string, $force);
	}
}

function uc_stripslashes($string) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(MAGIC_QUOTES_GPC) {
		return stripslashes($string);
	} else {
		return $string;
	}
}

/**
 *  dfopen  mode Take the action specified data module and
 *
 * @param string $module	Request a module
 * @param string $action 	Request for action
 * @param array $arg		Parameters (transmission mode will be encrypted)
 * @return string
 */
function uc_api_post($module, $action, $arg = array()) {
	$s = $sep = '';
	foreach($arg as $k => $v) {
		$k = urlencode($k);
		if(is_array($v)) {
			$s2 = $sep2 = '';
			foreach($v as $k2 => $v2) {
				$k2 = urlencode($k2);
				$s2 .= "$sep2{$k}[$k2]=".urlencode(uc_stripslashes($v2));
				$sep2 = '&';
			}
			$s .= $sep.$s2;
		} else {
			$s .= "$sep$k=".urlencode(uc_stripslashes($v));
		}
		$sep = '&';
	}
	$postdata = uc_api_requestdata($module, $action, $s);
	return uc_fopen2(UC_API.'/index.php', 500000, $postdata, '', TRUE, UC_IP, 20);
}

/**
 * Construct the center of a request sent to the user data
 *
 * @param string $module	Request a module
 * @param string $action	Request for action
 * @param string $arg		Parameters (transmission mode will be encrypted)
 * @param string $extra		Additional parameters (not encrypted when transmitted)
 * @return string
 */
function uc_api_requestdata($module, $action, $arg='', $extra='') {
	$input = uc_api_input($arg);
	$post = "m=$module&a=$action&inajax=2&release=".UC_CLIENT_RELEASE."&input=$input&appid=".UC_APPID.$extra;
	return $post;
}

function uc_api_url($module, $action, $arg='', $extra='') {
	$url = UC_API.'/index.php?'.uc_api_requestdata($module, $action, $arg, $extra);
	return $url;
}

function uc_api_input($data) {
	$s = urlencode(uc_authcode($data.'&agent='.md5($_SERVER['HTTP_USER_AGENT'])."&time=".time(), 'ENCODE', UC_KEY));
	return $s;
}

/**
 * MYSQL  mode Take the action specified data module and
 *
 * @param string $model		Request a module
 * @param string $action	Request for action
 * @param string $args		Parameters (transmission mode will be encrypted)
 * @return mix
 */
function uc_api_mysql($model, $action, $args=array()) {
	global $uc_controls;
	if(empty($uc_controls[$model])) {
		include_once UC_ROOT.'./lib/db.class.php';
		include_once UC_ROOT.'./model/base.php';
		include_once UC_ROOT."./control/$model.php";
		eval("\$uc_controls['$model'] = new {$model}control();");
	}
	if($action{0} != '_') {
		$args = uc_addslashes($args, 1, TRUE);
		$action = 'on'.$action;
		$uc_controls[$model]->input = $args;
		return $uc_controls[$model]->$action($args);
	} else {
		return '';
	}
}

function uc_serialize($arr, $htmlon = 0) {
	include_once UC_ROOT.'./lib/xml.class.php';
	return xml_serialize($arr, $htmlon);
}

function uc_unserialize($s) {
	include_once UC_ROOT.'./lib/xml.class.php';
	return xml_unserialize($s);
}

/**
 * String encryption and decryption function
 *
 * @param string $string	Text or ciphertext
 * @param string $operation	Operation (ENCODE | DECODE), The default is  DECODE
 * @param string $key		Key
 * @param int $expiry		Ciphertext is valid, effective encryption time, in seconds, 0 for the permanent
 * @return string		Original or after treatment after treatment after base64_encode ciphertext
 *
 * @example
 *
 * 	$a = authcode('abc', 'ENCODE', 'key');
 * 	$b = authcode($a, 'DECODE', 'key');  // $b(abc)
 *
 * 	$a = authcode('abc', 'ENCODE', 'key', 3600);
 * 	$b = authcode('abc', 'DECODE', 'key'); // In one hour, $b(abc), Or $b is empty
 */
function uc_authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {

	$ckey_length = 4;	// Random key length value of 0-32;
				// Adding random key, the ciphertext can make no laws, even the original and the same key, encrypt the result will be different each time, increasing the difficulty of cracking.
				// The greater the value, the greater the changes in the law ciphertext, ciphertext change = 16 $ckey_length th
				// When this value is 0, the random key is not

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

/**
 *  open the Remote URL
 *  @param string $url		Open url, such as http://www.baidu.com/123.htm
 *  @param int $limit		Take the length of the returned data
 *  @param string $post		To send POST Data, such as uid=1&password=1234
 *  @param string $cookie	To simulate the COOKIE Data, such as uid=123&auth=a2323sd2323
 *  @param bool $bysocket	TRUE/FALSEis by SOCKET opened
 *  @param string $ip		IP Address
 *  @param int $timeout		Connection timeout
 *  @param bool $block		Whether the blocking mode
 *  @return			Take the string
 */
function uc_fopen2($url, $limit = 0, $post = '', $cookie = '', $bysocket = FALSE, $ip = '', $timeout = 15, $block = TRUE) {
	$__times__ = isset($_GET['__times__']) ? intval($_GET['__times__']) + 1 : 1;
	if($__times__ > 2) {
		return '';
	}
	$url .= (strpos($url, '?') === FALSE ? '?' : '&')."__times__=$__times__";
	return uc_fopen($url, $limit, $post, $cookie, $bysocket, $ip, $timeout, $block);
}

function uc_fopen($url, $limit = 0, $post = '', $cookie = '', $bysocket = FALSE, $ip = '', $timeout = 15, $block = TRUE) {
	$return = '';
	$matches = parse_url($url);
	!isset($matches['host']) && $matches['host'] = '';
	!isset($matches['path']) && $matches['path'] = '';
	!isset($matches['query']) && $matches['query'] = '';
	!isset($matches['port']) && $matches['port'] = '';
	$host = $matches['host'];
	$path = $matches['path'] ? $matches['path'].($matches['query'] ? '?'.$matches['query'] : '') : '/';
	$port = !empty($matches['port']) ? $matches['port'] : 80;
	if($post) {
		$out = "POST $path HTTP/1.0\r\n";
		$out .= "Accept: */*\r\n";
		//$out .= "Referer: $boardurl\r\n";
		$out .= "Accept-Language: zh-cn\r\n";
		$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
		$out .= "Host: $host\r\n";
		$out .= 'Content-Length: '.strlen($post)."\r\n";
		$out .= "Connection: Close\r\n";
		$out .= "Cache-Control: no-cache\r\n";
		$out .= "Cookie: $cookie\r\n\r\n";
		$out .= $post;
	} else {
		$out = "GET $path HTTP/1.0\r\n";
		$out .= "Accept: */*\r\n";
		//$out .= "Referer: $boardurl\r\n";
		$out .= "Accept-Language: zh-cn\r\n";
		$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
		$out .= "Host: $host\r\n";
		$out .= "Connection: Close\r\n";
		$out .= "Cookie: $cookie\r\n\r\n";
	}
	$fp = @fsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
	if(!$fp) {
		return ''; // $errstr : $errno \r\n
	} else {
		stream_set_blocking($fp, $block);
		stream_set_timeout($fp, $timeout);
		@fwrite($fp, $out);
		$status = stream_get_meta_data($fp);
		if(!$status['timed_out']) {
			while (!feof($fp)) {
				if(($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n")) {
					break;
				}
			}

			$stop = false;
			while(!feof($fp) && !$stop) {
				$data = fread($fp, ($limit == 0 || $limit > 8192 ? 8192 : $limit));
				$return .= $data;
				if($limit) {
					$limit -= strlen($data);
					$stop = $limit <= 0;
				}
			}
		}
		@fclose($fp);
		return $return;
	}
}

function uc_app_ls() {
	$return = call_user_func(UC_API_FUNC, 'app', 'ls', array());
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 *  add feed
 *
 * @param string $icon			Icon
 * @param string $uid			uid
 * @param string $username		user name 
 * @param string $title_template	Title template
 * @param array  $title_data		Title Content
 * @param string $body_template		Content template
 * @param array  $body_data		Content data
 * @param string $body_general		Keep body
 * @param string $target_ids		Keep
 * @param array $images			images
 * 	Format:
 * 		array(
 * 			array('url'=>'http://domain1/1.jpg', 'link'=>'http://domain1'),
 * 			array('url'=>'http://domain2/2.jpg', 'link'=>'http://domain2'),
 * 			array('url'=>'http://domain3/3.jpg', 'link'=>'http://domain3'),
 * 		)
 * 	Example:
 * 		$feed['images'][] = array('url'=>$vthumb1, 'link'=>$vthumb1);
 * 		$feed['images'][] = array('url'=>$vthumb2, 'link'=>$vthumb2);
 * @return int feedid
 */
function uc_feed_add($icon, $uid, $username, $title_template='', $title_data='', $body_template='', $body_data='', $body_general='', $target_ids='', $images = array()) {
	return call_user_func(UC_API_FUNC, 'feed', 'add',
		array(  'icon'=>$icon,
			'appid'=>UC_APPID,
			'uid'=>$uid,
			'username'=>$username,
			'title_template'=>$title_template,
			'title_data'=>$title_data,
			'body_template'=>$body_template,
			'body_data'=>$body_data,
			'body_general'=>$body_general,
			'target_ids'=>$target_ids,
			'image_1'=>$images[0]['url'],
			'image_1_link'=>$images[0]['link'],
			'image_2'=>$images[1]['url'],
			'image_2_link'=>$images[1]['link'],
			'image_3'=>$images[2]['url'],
			'image_3_link'=>$images[2]['link'],
			'image_4'=>$images[3]['url'],
			'image_4_link'=>$images[3]['link']
		)
	);
}

/**
 * How much of each to take
 *
 * @param int $limit
 * @return array()
 */
function uc_feed_get($limit = 100, $delete = TRUE) {
	$return = call_user_func(UC_API_FUNC, 'feed', 'get', array('limit'=>$limit, 'delete'=>$delete));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 *  add 好友
 *
 * @param int $uid		user ID
 * @param int $friendid		Friend ID
 * @return
 * 	>0  success 
 * 	<=0 Failure
 */
function uc_friend_add($uid, $friendid, $comment='') {
	return call_user_func(UC_API_FUNC, 'friend', 'add', array('uid'=>$uid, 'friendid'=>$friendid, 'comment'=>$comment));
}

/**
 *  delete Friends
 *
 * @param int $uid		user ID
 * @param array $friendids	Friends ID
 * @return
 * 	>0  success 
 * 	<=0 Failure, or allready been delete friends
 */
function uc_friend_delete($uid, $friendids) {
	return call_user_func(UC_API_FUNC, 'friend', 'delete', array('uid'=>$uid, 'friendids'=>$friendids));
}

/**
 * The total number of friends
 * @param int $uid		user ID
 * @return int
 */
function uc_friend_totalnum($uid, $direction = 0) {
	return call_user_func(UC_API_FUNC, 'friend', 'totalnum', array('uid'=>$uid, 'direction'=>$direction));
}

/**
 * Friends list 
 *
 * @param int $uid		user ID
 * @param int $page		Current page
 * @param int $pagesize		Number of entries per page
 * @param int $totalnum		Total items
 * @param int $direction	The default is Forward. Forward: 1 ,Reverse: 2 , Two-way: 3
 * @return array
 */
function uc_friend_ls($uid, $page = 1, $pagesize = 10, $totalnum = 10, $direction = 0) {
	$return = call_user_func(UC_API_FUNC, 'friend', 'ls', array('uid'=>$uid, 'page'=>$page, 'pagesize'=>$pagesize, 'totalnum'=>$totalnum, 'direction'=>$direction));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 *  user registration 
 *
 * @param string $username 	user  name 
 * @param string $password 	Password
 * @param string $email		Email
 * @param int $questionid	Security Question id
 * @param string $answer 	Security Question Answer
 * @return int
	-1 : user name Illegal
	-2 : Contains does not allow registration Words
	-3 : user name allready exists
	-4 : email Malformed
	-5 : email Not allowed for registration 
	-6 : The email allready been registered
	>1 : That success, the value for the UID
*/
function uc_user_register($username, $password, $email, $questionid = '', $answer = '') {
	return call_user_func(UC_API_FUNC, 'user', 'register', array('username'=>$username, 'password'=>$password, 'email'=>$email, 'questionid'=>$questionid, 'answer'=>$answer));
}

/**
 * user Login check
 *
 * @param string $username	user  name/uid
 * @param string $password	Password
 * @param int $isuid		Whether to use as uid
 * @param int $checkques	Whether to use the check Safety Quiz
 * @param int $questionid	Security Question
 * @param string $answer 	Security Question Answer
 * @return array (uid/status, username, password, email)
 	number of groups First item
 	1  :  success 
	-1 :  user Does not exist, or is deleted
	-2 : Password Wrong
*/
function uc_user_login($username, $password, $isuid = 0, $checkques = 0, $questionid = '', $answer = '') {
	$isuid = intval($isuid);
	$return = call_user_func(UC_API_FUNC, 'user', 'login', array('username'=>$username, 'password'=>$password, 'isuid'=>$isuid, 'checkques'=>$checkques, 'questionid'=>$questionid, 'answer'=>$answer));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * Log into the synchronization code
 *
 * @param int $uid		user ID
 * @return string 		HTML Code
 */
function uc_user_synlogin($uid) {
	$uid = intval($uid);
	$return = uc_api_post('user', 'synlogin', array('uid'=>$uid));
	return $return;
}

/**
 * Logout the synchronization code
 *
 * @return string 		HTML Code
 */
function uc_user_synlogout() {
	$return = uc_api_post('user', 'synlogout', array());
	return $return;
}

/**
 *  edit user 
 *
 * @param string $username	user  name 
 * @param string $oldpw		Old Password
 * @param string $newpw		New Password
 * @param string $email		Email
 * @param int $ignoreoldpw 	Ignore the Old Password, ignores the old Password, Password verification is not the old.
 * @param int $questionid	Security Question id
 * @param string $answer 	Security Question Answer
 * @return int
 	1  : Modified success 
 	0  : Not modified
  	-1 : Old Password is incorrect
	-4 : email Malformed
	-5 : email Not allowed for registration 
	-6 : The email allready been registered
	-7 : Did not make any modification
	-8 : Protected user, no permissions for modification
*/
function uc_user_edit($username, $oldpw, $newpw, $email, $ignoreoldpw = 0, $questionid = '', $answer = '') {
	return call_user_func(UC_API_FUNC, 'user', 'edit', array('username'=>$username, 'oldpw'=>$oldpw, 'newpw'=>$newpw, 'email'=>$email, 'ignoreoldpw'=>$ignoreoldpw, 'questionid'=>$questionid, 'answer'=>$answer));
}

/**
 *  delete user
 *
 * @param string/array $uid	 user UID
 * @return int
 	>0 :  success 
 	0 : Failure
 */
function uc_user_delete($uid) {
	return call_user_func(UC_API_FUNC, 'user', 'delete', array('uid'=>$uid));
}

/**
 *  delete user Avatar
 *
 * @param string/array $uid	 user UID
 */
function uc_user_deleteavatar($uid) {
	uc_api_post('user', 'deleteavatar', array('uid'=>$uid));
}

/**
 * Check the user name is legitimate
 *
 * @param string $username	 user  name 
 * @return int
 	 1 : Legal
	-1 : user  name Illegal
	-2 : Contains the words disabled for registration
	-3 :  user name allready exists
 */
function uc_user_checkname($username) {
	return call_user_func(UC_API_FUNC, 'user', 'check_username', array('username'=>$username));
}

/**
 * Check Email address is correct
 *
 * @param string $email		Email
 * @return
 *  	1  : success 
 * 	-4 : email Malformed
 * 	-5 : email Not allowed for registration 
 * 	-6 : The email allready been registered
 */
function uc_user_checkemail($email) {
	return call_user_func(UC_API_FUNC, 'user', 'check_email', array('email'=>$email));
}

/**
 *  add Protected user 
 *
 * @param string/array $username Protected user name
 * @param string $admin    Operation of manager
 * @return
 * 	-1 : Failure
 * 	 1 :  success 
 */
function uc_user_addprotected($username, $admin='') {
	return call_user_func(UC_API_FUNC, 'user', 'addprotected', array('username'=>$username, 'admin'=>$admin));
}

/**
 *  delete Protected user
 *
 * @param string/array $username Protected user name 
 * @return
 * 	-1 : Failure
 * 	 1 : success 
 */
function uc_user_deleteprotected($username) {
	return call_user_func(UC_API_FUNC, 'user', 'deleteprotected', array('username'=>$username));
}

/**
 * Get protected user name list
 *
 * @param empty
 * @return
 * 	Protected user name list
 *  	array()
 */
function uc_user_getprotected() {
	$return = call_user_func(UC_API_FUNC, 'user', 'getprotected', array('1'=>1));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * obtain user data
 *
 * @param string $username	user  name 
 * @param int $isuid		Whether the UID
 * @return array (uid, username, email)
 */
function uc_get_user($username, $isuid=0) {
	$return = call_user_func(UC_API_FUNC, 'user', 'get_user', array('username'=>$username, 'isuid'=>$isuid));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * merge user
 *
 * @param string $oldusername	Old user  name 
 * @param string $newusername	New user  name 
 * @param string $uid		Old UID
 * @param string $password	Password
 * @param string $email		Email
 * @return int
	-1 : user name is not valid
	-2 : Contains words not allowed for registration
	-3 : user name allready exists
	>1 : That success, the value for the UID
 */
function uc_user_merge($oldusername, $newusername, $uid, $password, $email) {
	return call_user_func(UC_API_FUNC, 'user', 'merge', array('oldusername'=>$oldusername, 'newusername'=>$newusername, 'uid'=>$uid, 'password'=>$password, 'email'=>$email));
}

/**
 * Remove merge user records
 * @param string $username	 user  name 
 */
function uc_user_merge_remove($username) {
	return call_user_func(UC_API_FUNC, 'user', 'merge_remove', array('username'=>$username));
}

/**
 * Application to obtain the specified user points the specified value
 * @param int $appid	Application Id
 * @param int $uid	 user Id
 * @param int $credit	 points Number
 */
function uc_user_getcredit($appid, $uid, $credit) {
	return uc_api_post('user', 'getcredit', array('appid'=>$appid, 'uid'=>$uid, 'credit'=>$credit));
}

/**
 * short message Interface
 *
 * @param int $uid	user ID
 * @param int $newpm	Is direct access to newpm
 */
function uc_pm_location($uid, $newpm = 0) {
	$apiurl = uc_api_url('pm_client', 'ls', "uid=$uid", ($newpm ? '&folder=newbox' : ''));
	@header("Expires: 0");
	@header("Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE);
	@header("Pragma: no-cache");
	@header("location: $apiurl");
}

/**
 * Check for new message
 *
 * @param  int $uid	user ID
 * @param  int $more	Detailed information
 * @return int	 	Whether there is new short message
 * 	2	Detailed (short messages, public messages, last message time, and finally the message content)
 * 	1	Simple (short messages, public messages, last message time)
 * 	0	No messages
 */
function uc_pm_checknew($uid, $more = 0) {
	$return = call_user_func(UC_API_FUNC, 'pm', 'check_newpm', array('uid'=>$uid, 'more'=>$more));
	return (!$more || UC_CONNECT == 'mysql') ? $return : uc_unserialize($return);
}

/**
 * Send private message
 *
 * @param int $fromuid		Uid=0 is the system sender
 * @param mix $msgto		Recipient uid / username multiple comma-separated
 * @param mix $subject		Subject
 * @param mix $message		Content
 * @param int $instantly	1 sent immediately sent immediately (default), 0 to enter a short message interface
 * @param int $replypid		reply to the message Id
 * @param int $isusername	0 = $msgto As uid, 1 = $msgto as username
 * @return
 * 	>1	Sent the number of success
 * 	0	Recipient does not exist
 */
function uc_pm_send($fromuid, $msgto, $subject, $message, $instantly = 1, $replypmid = 0, $isusername = 0) {
	if($instantly) {
		$replypmid = @is_numeric($replypmid) ? $replypmid : 0;
		return call_user_func(UC_API_FUNC, 'pm', 'sendpm', array('fromuid'=>$fromuid, 'msgto'=>$msgto, 'subject'=>$subject, 'message'=>$message, 'replypmid'=>$replypmid, 'isusername'=>$isusername));
	} else {
		$fromuid = intval($fromuid);
		$subject = urlencode($subject);
		$msgto = urlencode($msgto);
		$message = urlencode($message);
		$replypmid = @is_numeric($replypmid) ? $replypmid : 0;
		$replyadd = $replypmid ? "&pmid=$replypmid&do=reply" : '';
		$apiurl = uc_api_url('pm_client', 'send', "uid=$fromuid", "&msgto=$msgto&subject=$subject&message=$message$replyadd");
		@header("Expires: 0");
		@header("Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE);
		@header("Pragma: no-cache");
		@header("location: ".$apiurl);
	}
}

/**
 * delete message
 *
 * @param int $uid		user Id
 * @param string $folder	Open directory: inbox = Inbox, outbox = Outbox
 * @param array	$pmids		To delete the message ID number of groups
 * @return
 * 	>0  success 
 * 	<=0 Failure
 */
function uc_pm_delete($uid, $folder, $pmids) {
	return call_user_func(UC_API_FUNC, 'pm', 'delete', array('uid'=>$uid, 'folder'=>$folder, 'pmids'=>$pmids));
}

/**
 * delete the user Short messages
 *
 * @param int $uid		user Id
 * @param array	$uids		To delete the message user ID number of groups
 * @return
 * 	>0  success 
 * 	<=0 Failure
 */
function uc_pm_deleteuser($uid, $touids) {
	return call_user_func(UC_API_FUNC, 'pm', 'deleteuser', array('uid'=>$uid, 'touids'=>$touids));
}

/**
 * Mark allready read / unread status
 *
 * @param int $uid		user Id
 * @param array	$uids		To mark the state of the user ID allready read number of groups
 * @param array	$pmids		To mark allready read the message ID number of state groups
 * @param int $status		1 allready read, 0 unread
 */
function uc_pm_readstatus($uid, $uids, $pmids = array(), $status = 0) {
	return call_user_func(UC_API_FUNC, 'pm', 'readstatus', array('uid'=>$uid, 'uids'=>$uids, 'pmids'=>$pmids, 'status'=>$status));
}

/**
 * Short message list
 *
 * @param int $uid		user Id
 * @param int $page 		Current page
 * @param int $pagesize 	Maximum number of entries per page
 * @param string $folder	Open directory: newbox = unread messages, inbox = inbox, outbox = Outbox
 * @param string $filter	Filter mode: newpm = unread messages, systempm = system messages, announcepm = public information
 				$folder		$filter
 				--------------------------
 				newbox
 				inbox		newpm
 						systempm
 						announcepm
 				outbox		newpm
 				searchbox	*
 * @param string $msglen 	Intercept length of the message text
 * @return array('count' => Total number of messages, 'data' => Short message data)
 */
function uc_pm_list($uid, $page = 1, $pagesize = 10, $folder = 'inbox', $filter = 'newpm', $msglen = 0) {
	$uid = intval($uid);
	$page = intval($page);
	$pagesize = intval($pagesize);
	$return = call_user_func(UC_API_FUNC, 'pm', 'ls', array('uid'=>$uid, 'page'=>$page, 'pagesize'=>$pagesize, 'folder'=>$folder, 'filter'=>$filter, 'msglen'=>$msglen));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * Ignore prompts unread messages prompts
 *
 * @param int $uid		 user Id
 */
function uc_pm_ignore($uid) {
	$uid = intval($uid);
	return call_user_func(UC_API_FUNC, 'pm', 'ignore', array('uid'=>$uid));
}

/**
 * Get a short message content
 *
 * @param int $uid		user Id
 * @param int $pmid		Message Id
 * @param int $touid		Message recepient user Id
 * @param int $daterange	Date range: 1 = today, 2 = yesterday, day before yesterday, 3 = 4 = last week, 5 = earlier
 * @return array()		number of groups the short message content
 */
function uc_pm_view($uid, $pmid, $touid = 0, $daterange = 1) {
	$uid = intval($uid);
	$touid = intval($touid);
	$pmid = @is_numeric($pmid) ? $pmid : 0;
	$return = call_user_func(UC_API_FUNC, 'pm', 'view', array('uid'=>$uid, 'pmid'=>$pmid, 'touid'=>$touid, 'daterange'=>$daterange));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * Access to the contents of a single a short message
 *
 * @param int $uid		user Id
 * @param int $pmid		Message Id
 * @param int $type		0 = Specify a single message
 				1 = For specified user last single message sent
 				2 = From specified user last received a single message
 * @return array() number of groups the short message content
 */
function uc_pm_viewnode($uid, $type = 0, $pmid = 0) {
	$uid = intval($uid);
	$pmid = @is_numeric($pmid) ? $pmid : 0;
	$return = call_user_func(UC_API_FUNC, 'pm', 'viewnode', array('uid'=>$uid, 'pmid'=>$pmid, 'type'=>$type));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * Get Blacklist
 *
 * @param int $uid		user Id
 * @return string 		Blacklist Content
 */
function uc_pm_blackls_get($uid) {
	$uid = intval($uid);
	return call_user_func(UC_API_FUNC, 'pm', 'blackls_get', array('uid'=>$uid));
}

/**
 * Set Blacklist
 *
 * @param int $uid		 user Id
 * @param int $blackls		Blacklist Content
 */
function uc_pm_blackls_set($uid, $blackls) {
	$uid = intval($uid);
	return call_user_func(UC_API_FUNC, 'pm', 'blackls_set', array('uid'=>$uid, 'blackls'=>$blackls));
}

/**
 *  add Blacklist entry
 *
 * @param int $uid		 user Id
 * @param int $username		 user  name 
 */
function uc_pm_blackls_add($uid, $username) {
	$uid = intval($uid);
	return call_user_func(UC_API_FUNC, 'pm', 'blackls_add', array('uid'=>$uid, 'username'=>$username));
}

/**
 *  delete Blacklist entry
 *
 * @param int $uid		 user Id
 * @param int $username		 user  name 
 */
function uc_pm_blackls_delete($uid, $username) {
	$uid = intval($uid);
	return call_user_func(UC_API_FUNC, 'pm', 'blackls_delete', array('uid'=>$uid, 'username'=>$username));
}

/**
 * Get the domain name resolved table
 *
 * @return array()
 */
function uc_domain_ls() {
	$return = call_user_func(UC_API_FUNC, 'domain', 'ls', array('1'=>1));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * points exchange request
 *
 * @param int $uid		user ID
 * @param int $from		The original points
 * @param int $to		target points
 * @param int $toappid		Target application ID
 * @param int $amount		the amount of points
 * @return
 *  	1  :  success 
 *	0  : Failure
 */
function uc_credit_exchange_request($uid, $from, $to, $toappid, $amount) {
	$uid = intval($uid);
	$from = intval($from);
	$toappid = intval($toappid);
	$to = intval($to);
	$amount = intval($amount);
	return uc_api_post('credit', 'request', array('uid'=>$uid, 'from'=>$from, 'to'=>$to, 'toappid'=>$toappid, 'amount'=>$amount));
}

/**
 * Returns the specified data related to TAG
 *
 * @param string $tagname	TAG name
 * @param int $totalnum		Returns number of of data entries
 * @return array() Serialized number of groups, number of groups, or other applications for the current contents of the relevant TAG data
 */
function uc_tag_get($tagname, $nums = 0) {
	$return = call_user_func(UC_API_FUNC, 'tag', 'gettag', array('tagname'=>$tagname, 'nums'=>$nums));
	return UC_CONNECT == 'mysql' ? $return : uc_unserialize($return);
}

/**
 * Modify Avatar
 *
 * @param	int		$uid	 user ID
 * @param	string	$type	Avatar Type: real OR virtual, The default is  virtual
 * @return	string
 */
function uc_avatar($uid, $type = 'virtual', $returnhtml = 1) {
	$uid = intval($uid);
	$uc_input = uc_api_input("uid=$uid");
	$uc_avatarflash = UC_API.'/images/camera.swf?inajax=1&appid='.UC_APPID.'&input='.$uc_input.'&agent='.md5($_SERVER['HTTP_USER_AGENT']).'&ucapi='.urlencode(UC_API).'&avatartype='.$type;
	if($returnhtml) {
		return '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="447" height="477" id="mycamera" align="middle">
			<param name="allowScriptAccess" value="always" />
			<param name="scale" value="exactfit" />
			<param name="wmode" value="transparent" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#ffffff" />
			<param name="movie" value="'.$uc_avatarflash.'" />
			<param name="menu" value="false" />
			<embed src="'.$uc_avatarflash.'" quality="high" bgcolor="#ffffff" width="447" height="477" name="mycamera" align="middle" allowScriptAccess="always" allowFullScreen="false" scale="exactfit"  wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
		</object>';
	} else {
		return array(
			'width', '447',
			'height', '477',
			'scale', 'exactfit',
			'src', $uc_avatarflash,
			'id', 'mycamera',
			'name', 'mycamera',
			'quality','high',
			'bgcolor','#ffffff',
			'wmode','transparent',
			'menu', 'false',
			'swLiveConnect', 'true',
			'allowScriptAccess', 'always'
		);
	}
}

/**
 * Message queue
 *
 * @param	string	$uids		user name id, Multiple separated with a comma (,)
 * @param	string	$emails		E-mail addresses, separated by commas for multiple
 * @param	string	$subject	The message subject
 * @param	string	$message	Message content
 * @param	string	$charset	E-mail character set, optional, The default is gbk
 * @param	boolean	$htmlon		Whether the sending mail in html format, optional, The default is NO
 * @param	integer $level		Message level, optional parameters, values ​​0-127, The default is 1, the greater the higher the priority sending, 0 does not storage, directly, will affect the speed of the current process, caution
 * @return	integer
 *		=0 : Failure
 *		>0 :  success, Return into the record id, If it is more than the last record is returned id, If the level is equal to 0, then return 1
 */
function uc_mail_queue($uids, $emails, $subject, $message, $frommail = '', $charset = 'gbk', $htmlon = FALSE, $level = 1) {
	return call_user_func(UC_API_FUNC, 'mail', 'add', array('uids' => $uids, 'emails' => $emails, 'subject' => $subject, 'message' => $message, 'frommail' => $frommail, 'charset' => $charset, 'htmlon' => $htmlon, 'level' => $level));
}

/**
 * Detect the presence of the specified Avatar
 * @param	integer		$uid	user id
 * @param	string		$size	Avatar size in the range (big,middle,small) The default is middle
 * @param	string		$type	Avatar type, range (virtual,real) The default is virtual
 * @return	boolean
 *		true : There is Avatar
 *		false: Avatar does not exist
 */
function uc_check_avatar($uid, $size = 'middle', $type = 'virtual') {
	$url = UC_API."/avatar.php?uid=$uid&size=$size&type=$type&check_file_exists=1";
	$res = uc_fopen2($url, 500000, '', '', TRUE, UC_IP, 20);
	if($res == 1) {
		return 1;
	} else {
		return 0;
	}
}

/**
 * Detection uc_server version of the database and program version
 * @return mixd
 *		array('db' => 'xxx', 'file' => 'xxx');
 *		null Can not call to the interface
 *		string File version is less than 1.5
 */
function uc_check_version() {
	$return = uc_api_post('version', 'check', array());
	$data = uc_unserialize($return);
	return is_array($data) ? $data : $return;
}

?>