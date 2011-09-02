<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: sample.php 11056 2009-02-09 01:59:47Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

// Built-in variables:
// $task['done'] (complete identity variable)
// $task['result'] (results text)
// $task['guide'] (wizard text)

//Determine whether the user completed the task
$done = 0;

//---------------------------------------------------
// Write code, complete the task of interpretation if the user requests
//   $done = 1;
//---------------------------------------------------

if($done) {

	$task['done'] = 1; // Task completed
	$task['result'] = '......';//users to participate in the task to see the text description. Support html code
	
} else {

	//Task completion wizard
	$task['guide'] = '......'; //guide the user how to participate in the task of text description. Support html code

}

