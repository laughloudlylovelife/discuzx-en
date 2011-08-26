<?php
/**
 * UCenter Application Development Example
 *
 * Example code friend list
 * Use the interface function:
 * uc_friend_totalnum() return the total number of friends
 * uc_friend_ls() return to Buddy List
 * uc_friend_delete() delete friends
 * uc_friend_add() add friends
 */

if(empty($_POST['submit'])) {
	$num = uc_friend_totalnum($Example_uid);
	echo 'You have '.$num.' friends';
	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?example=friend">';
	$friendlist = uc_friend_ls($Example_uid, 1, 999, $num);
	if($friendlist) {
		foreach($friendlist as $friend) {
			echo '<input type="checkbox" name="delete[]" value="'.$friend['friendid'].'">';
			switch($friend['direction']) {
				case 1: echo '[Attention]';break;
				case 3: echo '[Friends]';break;
			}
			echo $friend['username'].':'.$friend['comment'].'<br>';
		}
	}
	echo 'Add a friend: <input name="newfriend"> Description: <input name="newcomment"><br>';
	echo '<input name="submit" type="submit"> ';
	echo '</form>';
} else {
	if(!empty($_POST['delete']) && is_array($_POST['delete'])) {
		uc_friend_delete($Example_uid, $_POST['delete']);
	}
	if($_POST['newfriend'] && $friendid = uc_get_user($_POST['newfriend'])) {
		uc_friend_add($Example_uid, $friendid[0], $_POST['newcomment']);
	}
	echo 'Friend information has been updated<br><a href="'.$_SERVER['PHP_SELF'].'?example=friend">Continue</a>';
	exit;
}


?>