<?php

/**
 * DiscuzX Convert
 *
 * $Id: access.php 10469 2010-05-11 09:12:14Z monkey $
 * English by Valery Votintsev at sources.ru
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'access';
$table_target = $db_target->tablepre.'forum_access';

$limit = 2000;
$nextid = 0;

$start = getgpc('start');
if(empty($start)) {
	$start = 0;
	$db_target->query("TRUNCATE $table_target");
}

$query = $db_source->query("SELECT * FROM $table_source LIMIT $start, $limit");
while ($row = $db_source->fetch_array($query)) {

	$nextid = 1;

	$row  = daddslashes($row, 1);

	$data = implode_field_value($row, ',', db_table_fields($db_target, $table_target));

	$db_target->query("INSERT INTO $table_target SET $data");
}

if($nextid) {
	showmessage(lang('update','continue_convert_table').$table_source.lang('update','from'). $start .lang('update','to'). ($start+$limit). lang('update','lines'), "index.php?a=$action&source=$source&prg=$curprg&start=".($start+$limit));
}

?>