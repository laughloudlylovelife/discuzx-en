<?php
/**
 * UCenter Application Development Example
 *
 * Example code for the user exit
 * Use the interface function:
 * uc_user_synlogout() option to generate code out of sync
 */

setcookie('Example_auth', '', -86400);
//Synchronization exit code generated
$ucsynlogout = uc_user_synlogout();
echo 'Exit successfully'.$ucsynlogout.'<br><a href="'.$_SERVER['PHP_SELF'].'">Continue</a>';
exit;

?>