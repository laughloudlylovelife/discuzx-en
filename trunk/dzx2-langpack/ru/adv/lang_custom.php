<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_custom.php by Valery Votintsev at sources.ru
 */

$lang = array
(
	'custom_name'		=> 'Конструктор рекламы',
	'custom_desc'		=> 'Вы можете добавить в шаблон HTML файл или код. Вы можете добавить рекламу на любую страницу сайте. Необходимо иметь минимальные знания по HTML<br /><br />
				<a href="javascript:;" onclick="prompt(\'Скопируйте (CTRL + C) и добавьте следующие строки в шаблон\', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Внутренний запрос</a>&nbsp;
				<a href="javascript:;" onclick="prompt(\'Скопируйте (CTRL + C) и добавьте следующие строки в файл HTML\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />Внешний запрос</a>',
	'custom_id_notfound'	=> 'Объявления не существует',
	'custom_codelink'	=> 'Внутренний запрос',
	'custom_text'		=> 'Текст объявления',
);

