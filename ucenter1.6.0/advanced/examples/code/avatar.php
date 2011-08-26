<?php
/**
 * UCenter Application Development Example
 *
 * Set Avatar Example
 */

echo '
<img src="'.UC_API.'/avatar.php?uid='.$Example_uid.'&size=big">
<img src="'.UC_API.'/avatar.php?uid='.$Example_uid.'&size=middle">
<img src="'.UC_API.'/avatar.php?uid='.$Example_uid.'&size=small">
<br><br>'.uc_avatar($Example_uid);

?>