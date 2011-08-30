<?php

require dirname(__FILE__).'/data/config.inc.php';
require dirname(__FILE__).'/lib/db.class.php';

$db = new ucserver_db();
$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET, UC_DBCONNECT, UC_DBTABLEPRE);

$nomatch = true;

$applist = $db->fetch_all("SELECT appid, name FROM ".UC_DBTABLEPRE."applications");
$table_columns = loadtable('notelist');
foreach($applist as $app) {
	$appid = $app['appid'];
	if(empty($appid)) continue;
	if(!isset($table_columns['app'.$appid])) {
		$nomatch = false;
		if($db->query("ALTER TABLE ".UC_DBTABLEPRE."notelist ADD COLUMN app$appid tinyint NOT NULL")) {
			echo "Successfully added notelist table field: $appid <br />";
		} else {
			echo "Add notelist table field failures, please refresh and try again<br />";
		}
		
	}
}

if($nomatch) {
	echo 'There is no need to add the field<br />';
}

if(!unlink(__FILE__)) {
	echo 'Please delete this file immediately from the server<br />';
}

function loadtable($table, $force = 0) {
	global $db;
	static $tables = array();
	if(!isset($tables[$table]) || $force) {
		if($db->version() > '4.1') {
			$query = $db->query("SHOW FULL COLUMNS FROM ".UC_DBTABLEPRE."$table", 'SILENT');
		} else {
			$query = $db->query("SHOW COLUMNS FROM ".UC_DBTABLEPRE."$table", 'SILENT');
		}
		while($field = @$db->fetch_array($query)) {
			$tables[$table][$field['Field']] = $field;
		}
	}
	return $tables[$table];
}



