<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_quickquery.php by Valery Votintsev at sources.ru $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$simplequeries = array(
	array('comment' => cplang('quick_enable'), 'sql' => ''),
	array('comment' => cplang('quick_enable_trash'), 'sql' => 'UPDATE {tablepre}forum_forum SET recyclebin=\'1\' WHERE status<\'3\''),
	array('comment' => cplang('quick_enable_bbcode'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowbbcode=\'1\' WHERE status<\'3\''),
	array('comment' => cplang('quick_enable_img'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowimgcode=\'1\' WHERE status<\'3\''),
	array('comment' => cplang('quick_enable_smilies'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowsmilies=\'1\' WHERE status<\'3\''),
	array('comment' => cplang('quick_enable_jammer'), 'sql' => 'UPDATE {tablepre}forum_forum SET jammer=\'1\' WHERE status<\'3\''),
	array('comment' => cplang('quick_enable_anonymous'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowanonymous=\'1\' WHERE status<\'3\''),

	array('comment' => cplang('quick_disable'), 'sql' => ''),
	array('comment' => cplang('quick_disable_trash'), 'sql' => 'UPDATE {tablepre}forum_forum SET recyclebin=\'0\' WHERE status<\'3\''),
	array('comment' => cplang('quick_disable_html'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowhtml=\'0\' WHERE status<\'3\''),
	array('comment' => cplang('quick_disable_bbcode'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowbbcode=\'0\' WHERE status<\'3\''),
	array('comment' => cplang('quick_disable_img'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowimgcode=\'0\' WHERE status<\'3\''),
	array('comment' => cplang('quick_disable_smilies'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowsmilies=\'0\' WHERE status<\'3\''),
	array('comment' => cplang('quick_disable_jammer'), 'sql' => 'UPDATE {tablepre}forum_forum SET jammer=\'0\' WHERE status<\'3\''),
	array('comment' => cplang('quick_disable_anonymous'), 'sql' => 'UPDATE {tablepre}forum_forum SET allowanonymous=\'0\' WHERE status<\'3\''),

	array('comment' => cplang('quick_members'), 'sql' => ''),
	array('comment' => cplang('quick_clean_trans'), 'sql' => 'TRUNCATE {tablepre}common_credit_log'),
);

