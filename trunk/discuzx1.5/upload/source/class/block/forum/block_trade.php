<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: block_trade.php 11418 2010-06-02 02:28:01Z xupeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class block_trade {
	var $setting = array();

	function block_trade(){
		$this->setting = array(
			'tids' => array(
				'title' => 'tradelist_tids',
				'type' => 'text'
			),
			'uids' => array(
				'title' => 'tradelist_uids',
				'type' => 'text'
			),
			'keyword' => array(
				'title' => 'tradelist_keyword',
				'type' => 'text'
			),
			'fids'	=> array(
				'title' => 'tradelist_fids',
				'type' => 'mselect',
				'value' => array()
			),
			'viewmod' => array(
				'title' => 'threadlist_viewmod',
				'type' => 'radio'
			),
			'digest' => array(
				'title' => 'tradelist_digest',
				'type' => 'mcheckbox',
				'value' => array(
					array(1, 'tradelist_digest_1'),
					array(2, 'tradelist_digest_2'),
					array(3, 'tradelist_digest_3'),
					array(0, 'tradelist_digest_0')
				),
			),
			'stick' => array(
				'title' => 'tradelist_stick',
				'type' => 'mcheckbox',
				'value' => array(
					array(1, 'tradelist_stick_1'),
					array(2, 'tradelist_stick_2'),
					array(3, 'tradelist_stick_3'),
					array(0, 'tradelist_stick_0')
				),
			),
			'recommend' => array(
				'title' => 'tradelist_recommend',
				'type' => 'radio'
			),
			'orderby' => array(
				'title' => 'tradelist_orderby',
				'type'=> 'mradio',
				'value' => array(
					array('dateline', 'tradelist_orderby_dateline'),
					array('todayhots', 'tradelist_orderby_todayhots'),
					array('weekhots', 'tradelist_orderby_weekhots'),
					array('monthhots', 'tradelist_orderby_monthhots'),
				),
				'default' => 'dateline'
			),
			'titlelength' => array(
				'title' => 'tradelist_titlelength',
				'type' => 'text',
				'default' => 40
			),
			'summarylength' => array(
				'title' => 'tradelist_summarylength',
				'type' => 'text',
				'default' => 80
			),
			'startrow' => array(
				'title' => 'tradelist_startrow',
				'type' => 'text',
				'default' => 0
			),
		);
	}

	function name() {
		return lang('blockclass', 'blockclass_trade_script_trade');
	}

	function blockclass() {
		return array('trade', lang('blockclass', 'blockclass_trade_trade'));
	}

	function fields() {
		return array(
					'url' => array('name' => lang('blockclass', 'blockclass_trade_field_url'), 'formtype' => 'text', 'datatype' => 'string'),
					'title' => array('name' => lang('blockclass', 'blockclass_trade_field_title'), 'formtype' => 'title', 'datatype' => 'title'),
					'pic' => array('name' => lang('blockclass', 'blockclass_trade_field_pic'), 'formtype' => 'pic', 'datatype' => 'pic'),
					'summary' => array('name' => lang('blockclass', 'blockclass_trade_field_summary'), 'formtype' => 'summary', 'datatype' => 'summary'),
					'totalitems' => array('name' => lang('blockclass', 'blockclass_trade_field_totalitems'), 'formtype' => 'text', 'datatype' => 'int'),
					'author' => array('name' => lang('blockclass', 'blockclass_trade_field_author'), 'formtype' => 'text', 'datatype' => 'text'),
					'authorid' => array('name' => lang('blockclass', 'blockclass_trade_field_authorid'), 'formtype' => 'text', 'datatype' => 'int'),
					'price' => array('name' => lang('blockclass', 'blockclass_trade_field_price'), 'formtype' => 'text', 'datatype' => 'text'),
				);
	}

	function fieldsconvert() {
		return array(
				'group_trade' => array(
					'name' => lang('blockclass', 'blockclass_group_trade'),
					'script' => 'grouptrade',
					'searchkeys' => array(),
					'replacekeys' => array(),
				),
			);
	}

	function getsetting() {
		global $_G;
		$settings = $this->setting;

		if($settings['fids']) {
			loadcache('forums');
			$settings['fids']['value'][] = array(0, lang('portalcp', 'block_all_forum'));
			foreach($_G['cache']['forums'] as $fid => $forum) {
				$settings['fids']['value'][] = array($fid, ($forum['type'] == 'forum' ? str_repeat('&nbsp;', 4) : ($forum['type'] == 'sub' ? str_repeat('&nbsp;', 8) : '')).$forum['name']);
			}
		}
		return $settings;
	}

	function cookparameter($parameter) {
		return $parameter;
	}

	function getdata($style, $parameter) {
		global $_G;

		$parameter = $this->cookparameter($parameter);

		loadcache('forums');
		$tids		= !empty($parameter['tids']) ? explode(',', $parameter['tids']) : array();
		$uids		= !empty($parameter['uids']) ? explode(',', $parameter['uids']) : array();
		$startrow	= isset($parameter['startrow']) ? intval($parameter['startrow']) : 0;
		$items		= isset($parameter['items']) ? intval($parameter['items']) : 10;
		$digest		= isset($parameter['digest']) ? $parameter['digest'] : 0;
		$stick		= isset($parameter['stick']) ? $parameter['stick'] : 0;
		$orderby	= isset($parameter['orderby']) ? (in_array($parameter['orderby'],array('dateline','todayhots','weekhots','monthhots')) ? $parameter['orderby'] : 'dateline') : 'dateline';
		$titlelength	= !empty($parameter['titlelength']) ? intval($parameter['titlelength']) : 40;
		$summarylength	= !empty($parameter['summarylength']) ? intval($parameter['summarylength']) : 80;
		$recommend	= !empty($parameter['recommend']) ? 1 : 0;
		$keyword	= !empty($parameter['keyword']) ? $parameter['keyword'] : '';
		$viewmod	= !empty($parameter['viewmod']) ? 1 : 0;

		$fids = array();
		if(!empty($parameter['fids'])) {
			if($parameter['fids'][0] == '0') {
				unset($parameter['fids'][0]);
			}
			$fids = $parameter['fids'];
		}

		$bannedids = !empty($parameter['bannedids']) ? explode(',', $parameter['bannedids']) : array();

		require_once libfile('function/post');

		$datalist = $list = array();
		if($keyword) {
			if(preg_match("(AND|\+|&|\s)", $keyword) && !preg_match("(OR|\|)", $keyword)) {
				$andor = ' AND ';
				$keywordsrch = '1';
				$keyword = preg_replace("/( AND |&| )/is", "+", $keyword);
			} else {
				$andor = ' OR ';
				$keywordsrch = '0';
				$keyword = preg_replace("/( OR |\|)/is", "+", $keyword);
			}
			$keyword = str_replace('*', '%', addcslashes($keyword, '%_'));
			foreach(explode('+', $keyword) as $text) {
				$text = trim($text);
				if($text) {
					$keywordsrch .= $andor;
					$keywordsrch .= "tr.subject LIKE '%$text%'";
				}
			}
			$keyword = " AND ($keywordsrch)";
		} else {
			$keyword = '';
		}
		$sql = ($fids ? ' AND t.fid IN ('.dimplode($fids).')' : '')
			.($tids ? ' AND t.tid IN ('.dimplode($tids).')' : '')
			.($digest ? ' AND t.digest IN ('.dimplode($digest).')' : '')
			.($stick ? ' AND t.displayorder IN ('.dimplode($stick).')' : '')
			." AND t.isgroup='0'";
		$where = '';
		if(in_array($orderby, array('todayhots','weekhots','monthhots'))) {
			$historytime = 0;
			switch($orderby) {
				case 'todayhots':
					$historytime = mktime(0, 0, 0, date('m', TIMESTAMP), date('d', TIMESTAMP), date('Y', TIMESTAMP));
				break;
				case 'weekhots':
					$week = gmdate('w', TIMESTAMP) - 1;
					$week = $week != -1 ? $week : 6;
					$historytime = mktime(0, 0, 0, date('m', TIMESTAMP), date('d', TIMESTAMP) - $week, date('Y', TIMESTAMP));
				break;
				case 'monthhots':
					$historytime = mktime(0, 0, 0, date('m', TIMESTAMP), 1, date('Y', TIMESTAMP));
				break;
			}
			$where = ' WHERE tr.dateline>='.$historytime;
			$orderby = 'totalitems';
		}
		$where .= ($uids ? ' AND tr.sellerid IN ('.dimplode($uids).')' : '').$keyword;
		$where .= ($bannedids ? ' AND tr.pid NOT IN ('.dimplode($bannedids).')' : '');
		$sqlfrom = " INNER JOIN `".DB::table('forum_thread')."` t ON t.tid=tr.tid $sql AND t.displayorder>='0'";
		if($recommend) {
			$sqlfrom .= " INNER JOIN `".DB::table('forum_forumrecommend')."` fc ON fc.tid=tr.tid";
		}
		$query = DB::query("SELECT tr.pid, tr.tid, tr.aid, tr.price, tr.credit, tr.subject, tr.totalitems, tr.seller, tr.sellerid
			FROM ".DB::table('forum_trade')." tr $sqlfrom $where
			ORDER BY tr.$orderby DESC
			LIMIT $startrow,$items;"
			);
		require_once libfile('block_thread', 'class/block/forum');
		$bt = new block_thread();
		while($data = DB::fetch($query)) {
			$one = array(
				'id' => $data['pid'],
				'idtype' => 'pid',
				'title' => cutstr(str_replace('\\\'', '&#39;', addslashes($data['subject'])), $titlelength, ''),
				'url' => 'forum.php?mod=viewthread&do=tradeinfo&tid='.$data['tid'].'&pid='.$data['pid'].($viewmod ? '&from=portal' : ''),
				'pic' => ($data['aid'] ? getforumimg($data['aid']) : $_G['style']['imgdir'].'/nophoto.gif'),
				'picflag' => '0',
				'summary' => !empty($style['getsummary']) ? $bt->getthread($data['tid'], $summarylength, true) : '',
				'fields' => array(
					'fulltitle' => str_replace('\\\'', '&#39;', addslashes($data['subject'])),
					'totalitems' => $data['totalitems'],
					'author' => $data['seller'] ? $data['seller'] : 'Anonymous',
					'authorid' => $data['sellerid'] ? $data['sellerid'] : 0,
					'price' => ($data['price'] > 0 ? '&yen; '.$data['price'] : '').($data['credit'] > 0 ? ($data['price'] > 0 ? lang('block/tradelist', 'tradelist_price_add') : '').$data['credit'].' '.$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]]['unit'].$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]]['title'] : ''),
				)
			);
			if($data['aid']) {
				$pic = DB::fetch_first("SELECT attachment, remote FROM ".DB::table('forum_attachment')." WHERE aid='$data[aid]'");
				$one['pic'] = 'forum/'.$pic['attachment'];
				$one['picflag'] = $pic['remote'] ? '2' : '1';
			}
			$list[] = $one;
		}
		return array('html' => '', 'data' => $list);
	}
}


?>