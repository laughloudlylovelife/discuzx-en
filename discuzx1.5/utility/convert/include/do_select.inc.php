<?php

/**
 * DiscuzX Convert
 *
 * $Id: do_select.inc.php 10469 2010-05-11 09:12:14Z monkey $
 * English by Valery Votintsev at sources.ru
 */

$config = loadconfig();
$db_source = new db_mysql($config['source']);
$db_source->connect();

$db_target = new db_mysql($config['target']);
$db_target->connect();

$db_uc = new db_mysql($config['ucenter']);
if($setting['config']['ucenter']) {
	$db_uc->connect();
}

$prgdir = DISCUZ_ROOT.'./source/'.$source.'/table/';

$process = array(
'timestart' => time(),
'start' => array(),
'tables' => array(),
'steps' => array(),
);

if(submitcheck('submit')) {
	$prgs = getgpc('prgs');
	if(is_array($prgs)) {
		foreach ($prgs as $prg) {
			if(substr($prg, 0, 6) == 's_prg_') {
				$prg = substr($prg, 6);
				$process['steps'][$prg] = 0;
			}elseif(substr($prg, 0, 6) == 'c_prg_') {
				$prg = substr($prg, 6);
				$process['start'][$prg] = 0;
			} else {
				$process['tables'][$prg] = 0;
			}
		}
		save_process('main', $process);
		showmessage(lang('update','you_selected')." (".count($prgs).") ".lang('update','process_number'), "index.php?a=convert&s=$source");
	}
}

showtips("<li>".lang('update','process_intro')."</li>");
show_form_header();
show_table_header();
show_table_row(array('<span style="float: left">'.lang('update','process_configure').'</span><label style="float: right"><input type="checkbox" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'prgs\')" id="chkall" name="chkall" checked> '.lang('update','select_all').'</label>'), 'title');

if($setting['start']) {
	show_table_row(array(lang('update','run_before_convert')), 'bg1');
	echo "<tr class=bg2><td colspan=2>\n<ul id=\"ulist\">";
	foreach ($setting['start'] as $key => $value) {
		echo "<li><label><input type=\"checkbox\" class=\"checkbox\" name=\"prgs[]\" value=\"c_prg_$key.php\" checked>&nbsp;$key($value)</label></li>";
	}
	echo "</ul>\n</td></tr>";
}


$tablelist = array();
$cdir = dir($prgdir);
while(($entry = $cdir->read()) !== false) {
	if(($entry != '.' && $entry != '..') && is_file($prgdir.$entry)) {
		$tablelist[] = $entry;
	}
}
$cdir->close();

if($tablelist) {
	sort($tablelist);
	show_table_row(array('<span style="float: left">'.lang('update','table_convert').'</span>'), 'bg1');
	echo "<tr class=bg2><td colspan=2>\n<ul id=\"ulist\">";
	foreach ($tablelist as $entry) {
		echo "<li><label><input type=\"checkbox\" class=\"checkbox\" name=\"prgs[]\" value=\"$entry\" checked>&nbsp;".basename($entry, '.php')."</label></li>";
	}
	echo "</ul>\n</td></tr>";
}

if($setting['steps']) {
	show_table_row(array(lang('update','other_convert')), 'bg1');
	echo "<tr class=bg2><td colspan=2>\n<ul id=\"ulist\">";
	foreach ($setting['steps'] as $key => $value) {
		echo "<li><label><input type=\"checkbox\" class=\"checkbox\" name=\"prgs[]\" value=\"s_prg_$key.php\" checked>&nbsp;$key($value)</label></li>";
	}
	echo "</ul>\n</td></tr>";
}
show_table_footer();
show_form_footer('submit', lang('update','start_conversion'));
showfooter();

exit();