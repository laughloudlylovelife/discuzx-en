<?php

/**
 * DiscuzX Convert
 *
 * $Id: memberrecommend.php 15398 2010-08-24 02:26:44Z monkey $
 * English by Valery Votintsev at sources.ru
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'memberrecommend';
$table_target = $db_target->tablepre.'forum_memberrecommend';

$limit = 1000;
$nextid = 0;

$start = intval(getgpc('start'));
if($start == 0) {
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