<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install.php 29291 2012-03-31 10:36:17Z songlixin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$table = DB::table('forum_attachment_0');
$sql = "SHOW COLUMNS FROM " . $table;
$query = DB::query($sql);
while($installdata = DB::fetch($query)){
	$installf[] = $installdata['Field'];
}

if(!in_array('sha1',$installf)){
$sql = <<<EOF

ALTER TABLE  `pre_forum_attachment_0` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_1` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_2` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_3` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_4` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_5` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_6` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_7` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_8` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_9` ADD  `sha1` CHAR( 40 ) NOT NULL;
ALTER TABLE  `pre_forum_attachment_unused` ADD  `sha1` CHAR( 40 ) NOT NULL;
EOF;

	runquery($sql);
}


$finish = TRUE;
?>