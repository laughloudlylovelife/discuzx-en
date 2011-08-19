<?php
// English by Valery Votintsev at sources.ru

$config = loadconfig();
$db_target = new db_mysql($config['target']);
$db_target->connect();

$readme = DISCUZ_ROOT.'./source/'.$source.'/readme.txt';
if(file_exists($readme)) {
	$txt = file_get_contents($readme);
} else {
	$txt = lang('update','finish');
}

$txt = nl2br(htmlspecialchars($txt));
$txt = str_replace('  ', '&nbsp;&nbsp;', $txt);
$txt = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $txt);

$process = load_process('main');
list($rday, $rhour, $rmin, $rsec) = remaintime(time() - $process['timestart']);
$stime = gmdate('Y-m-d H:i:s', $process['timestart'] + 3600* 8);
$etime = gmdate('Y-m-d H:i:s',time() + 3600* 8);
$timetodo = lang('update','conversion_completed');
$timetodo .= "<br><br>".lang('update','start_time').": <strong>$stime</strong><br>".lang('update','end_time').": <strong>$etime</strong>";
$timetodo .= "<br>".lang('update','execution_time').": <strong>$rday</strong> ".lang('update','days').", <strong>$rhour</strong> ".lang('update','hours').", <strong>$rmin</strong> ".lang('update','minutes').", <strong>$rsec</strong> ".lang('update','seconds');
$timetodo .= "<br><br>".lang('update','update_more');

showtips($timetodo);

show_table_header();
show_table_row(array(lang('update','read_me')), 'title');
show_table_row(array($txt));
show_table_footer();

?>