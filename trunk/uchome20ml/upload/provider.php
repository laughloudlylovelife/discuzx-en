<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: provider.php
	written by Valery Votintsev at sources.ru
*/

include_once('./common.php');

//vot: Force http header charset
if($_SC['headercharset']) {
	@header('Content-Type: text/html; charset='.$_SC['charset']);
}


if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('cp.php?ac='.$ac));
	}
	showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
}



$_TPL['css'] = 'provider';
include_once template("provider");
