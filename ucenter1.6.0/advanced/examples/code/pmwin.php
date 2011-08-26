<?php
/**
 * UCenter Application Development Example
 *
 * Open the short message center Example code
 * Use the interface function:
 * uc_pm()		Must, jump to the short message center URL
 * uc_pm_checknew()	Optional for global determine whether there is a new short message, return $newpm Variable
 */

//Short message center, open in a window
uc_pm_location($Example_uid, $newpm);
exit;

?>