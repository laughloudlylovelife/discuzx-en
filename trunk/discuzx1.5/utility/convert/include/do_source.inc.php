<?php
// English by Valery Votintsev at sources.ru

$datadir = DISCUZ_ROOT.'./source/';

showtips('<li><strong>'.lang('update','update_permissions').'</strong></li><li><strong>'.lang('update','update_forum_too').'</strong></li><li>'.lang('update','update_choose_process').'</li><li>'.lang('update','update_more_space').'</li>');

if(is_dir($datadir)) {

	$cdir = dir($datadir);
	show_table_header();
	show_table_row(array(
			lang('update','source_version'),
			lang('update','target_version'),
			array('width="50%"', lang('update','introduction')),
			array('width="5%"', lang('update','description')),
			array('width="5%"', lang('update','settings')),
			array('width="5%"', ''),
		), 'header title');
	while(($entry = $cdir->read()) !== false) {
		if(($entry != '.' && $entry != '..') && is_dir($datadir.$entry)) {
			$settingfile = $datadir.$entry.'/setting.ini';
			$readmefile = $datadir.$entry.'/readme.txt';

			$readme = file_exists($readmefile) ? '<a target="_blank" href="source/'.$entry.'/readme.txt">'.lang('update','view_readme').'</a>' : '';

			if(file_exists($settingfile) && $setting = loadsetting($entry)) {
				$trclass = $trclass == 'bg1' ? 'bg2' : 'bg1';
				show_table_row(
					array(
						$setting['program']['source'],
						$setting['program']['target'],
						$setting['program']['introduction'],
						array('align="center"', $readme),
						array('align="center"', '<a href="index.php?a=setting&source='.rawurlencode($entry).'">'.lang('update','change').'</a>'),
						array('align="center"', '<a href="index.php?a=config&source='.rawurlencode($entry).'">'.lang('update','start').'</a>'),
					), $trclass
				);
			}
		}
	}
	$cdir->close();
	show_table_footer();
} else {
	showmessage('config_child_error');
}