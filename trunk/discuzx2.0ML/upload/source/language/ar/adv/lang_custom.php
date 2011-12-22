<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_custom.php by Khalid Nahhal, http://www.ar-discuz.com
 */

$lang = array
(
	'custom_name'		=> 'اعلان مخصص',//'自定义广告',
	'custom_desc'		=> 'اضافة كود هتمل مخصص .<br /><br />
				<a href="javascript:;" onclick="prompt(\'الرجاء النسخ  (CTRL+C) في الاسفل الى القالب \', \'<!--{ad/custom_'.$_G['gp_customid'].'}-->\')" />Internal js call/a>&nbsp;
				<a href="javascript:;" onclick="prompt(\'الرجاء نسخ  (CTRL+C) المحتوى الذي في الاسفل الى ملف الهتمل\', \'&lt;script type=\\\'text/javascript\\\' src=\\\''.$_G['siteurl'].'api.php?mod=ad&adid=custom_'.$_G['gp_customid'].'\\\'&gt;&lt;/script&gt;\')" />External js call</a>',
	'custom_id_notfound'	=> 'الاعلان المخصص غير موجود',//'自定义广告不存在',
	'custom_codelink'	=> 'Internal js call',//'内部调用',
	'custom_text'		=> 'اعلان مخصص',//'自定义广告',
);

