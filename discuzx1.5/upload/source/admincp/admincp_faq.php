<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_faq.php 13088 2010-07-21 03:54:52Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();
$operation = $operation ? $operation : 'list';

if($operation == 'list') {

	if(!submitcheck('faqsubmit')) {

		shownav('extended', 'faq');
		showsubmenu('faq');
		showformheader('faq&operation=list');
		showtableheader();
		echo '<tr><th class="td25"></th><th>'.$lang['display_order'].'</th><th style="width:350px">'.$lang['faq_thread'].'</th><th></th></tr>';

		$faqparent = $faqsub = array();
		$faqlists = $faqselect = '';
		$query = DB::query("SELECT * FROM ".DB::table('forum_faq')." ORDER BY displayorder");
		while($faq = DB::fetch($query)) {
			if(empty($faq['fpid'])) {
				$faqparent[$faq['id']] = $faq;
				$faqselect .= "<option value=\"$faq[id]\">$faq[title]</option>";
			} else {
				$faqsub[$faq['fpid']][] = $faq;
			}
		}

		foreach($faqparent as $parent) {
			$disabled = !empty($faqsub[$parent['id']]) ? 'disabled' : '';
			showtablerow('', array('', 'class="td23 td28"'), array(
				"<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$parent[id]\" $disabled>",
				"<input type=\"text\" class=\"txt\" size=\"3\" name=\"displayorder[$parent[id]]\" value=\"$parent[displayorder]\">",
				"<div class=\"parentnode\"><input type=\"text\" class=\"txt\" size=\"30\" name=\"title[$parent[id]]\" value=\"".dhtmlspecialchars($parent['title'])."\"></div>",
				"<a href=\"".ADMINSCRIPT."?action=faq&operation=detail&id=$parent[id]\" class=\"act\">".$lang['detail']."</a>"
			));
			if(!empty($faqsub[$parent['id']])) {
				foreach($faqsub[$parent['id']] as $sub) {
					showtablerow('', array('', 'class="td23 td28"'), array(
						"<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$sub[id]\">",
						"<input type=\"text\" class=\"txt\" size=\"3\" name=\"displayorder[$sub[id]]\" value=\"$sub[displayorder]\">",
						"<div class=\"node\"><input type=\"text\" class=\"txt\" size=\"30\" name=\"title[$sub[id]]\" value=\"".dhtmlspecialchars($sub['title'])."\"></div>",
						"<a href=\"".ADMINSCRIPT."?action=faq&operation=detail&id=$sub[id]\" class=\"act\">".$lang['detail']."</a>"
					));
				}
			}
			echo '<tr><td></td><td></td><td colspan="2"><div class="lastnode"><a href="###" onclick="addrow(this, 1, '.$parent['id'].')" class="addtr">'.cplang('faq_additem').'</a></div></td></tr>';
		}
		echo '<tr><td></td><td></td><td colspan="2"><div><a href="###" onclick="addrow(this, 0, 0)" class="addtr">'.cplang('faq_addcat').'</a></div></td></tr>';

		echo <<<EOT
<script type="text/JavaScript">
var rowtypedata = [
	[[1,''], [1,'<input name="newdisplayorder[]" value="" size="3" type="text" class="txt">', 'td25'], [1, '<input name="newtitle[]" value="" size="30" type="text" class="txt">'], [1, '<input type="hidden" name="newfpid[]" value="0" />']],
	[[1,''], [1,'<input name="newdisplayorder[]" value="" size="3" type="text" class="txt">', 'td25'], [1, '<div class=\"node\"><input name="newtitle[]" value="" size="30" type="text" class="txt"></div>'], [1, '<input type="hidden" name="newfpid[]" value="{1}" />']]
];
</script>
EOT;

		showsubmit('faqsubmit', 'submit', 'del');
		showtablefooter();
		showformfooter();

	} else {

		if($ids = dimplode($_G['gp_delete'])) {
			DB::query("DELETE FROM	".DB::table('forum_faq')." WHERE id IN ($ids)");
		}

		if(is_array($_G['gp_title'])) {
			foreach($_G['gp_title'] as $id => $val) {
				DB::update('forum_faq', array(
					'displayorder' => $_G['gp_displayorder'][$id],
					'title' => $_G['gp_title'][$id],
				), "id='$id'");
			}
		}

		if(is_array($_G['gp_newtitle'])) {
			foreach($_G['gp_newtitle'] as $k => $v) {
				$v = trim($v);
				if($v) {
					DB::insert('forum_faq', array('fpid' => intval($_G['gp_newfpid'][$k]), 'displayorder' => intval($_G['gp_newdisplayorder'][$k]), 'title' => $v));
				}
			}
		}

		cpmsg('faq_list_update', 'action=faq&operation=list', 'succeed');

	}

} elseif($operation == 'detail') {
	$id = $_G['gp_id'];
	if(!submitcheck('detailsubmit')) {

		$faq = DB::fetch_first("SELECT * FROM ".DB::table('forum_faq')." WHERE id='$id'");
		if(!$faq) {
			cpmsg('undefined_action', '', 'error');
		}

		$query = DB::query("SELECT * FROM ".DB::table('forum_faq')." WHERE fpid='0' ORDER BY displayorder, fpid ");
		while($parent = DB::fetch($query)) {
			$faqselect .= "<option value=\"$parent[id]\" ".($faq['fpid'] == $parent['id'] ? 'selected' : '').">$parent[title]</option>";
		}

		shownav('extended', 'faq');
		showsubmenu('faq');
		showformheader("faq&operation=detail&id=$id");
		showtableheader();
		showtitle('faq_edit');
		showsetting('faq_title', 'titlenew', $faq['title'], 'text');
		if(!empty($faq['fpid'])) {
			showsetting('faq_sortup', '', '', '<select name="fpidnew"><option value=\"\">'.$lang['none'].'</option>'.$faqselect.'</select>');
			showsetting('faq_identifier', 'identifiernew', $faq['identifier'], 'text');
			showsetting('faq_keywords', 'keywordnew', $faq['keyword'], 'text');
			showsetting('faq_content', 'messagenew', $faq['message'], 'textarea');
		}
		showsubmit('detailsubmit');
		showtablefooter();
		showformfooter();

	} else {

		if(!$_G['gp_titlenew']) {
			cpmsg('faq_no_title', '', 'error');
		}

		if(!empty($_G['gp_identifiernew'])) {
			$query = DB::query("SELECT id FROM ".DB::table('forum_faq')." WHERE identifier='{$_G['gp_identifiernew']}' AND id!='$id'");
			if(DB::num_rows($query)) {
				cpmsg('faq_identifier_invalid', '', 'error');
			}
		}

		if(strlen($_G['gp_keywordnew']) > 50) {
			cpmsg('faq_keyword_toolong', '', 'error');
		}

		$fpidnew = $_G['gp_fpidnew'] ? intval($_G['gp_fpidnew']) : 0;
		$titlenew = trim($_G['gp_titlenew']);
		$messagenew = trim($_G['gp_messagenew']);
		$identifiernew = trim($_G['gp_identifiernew']);
		$keywordnew = trim($_G['gp_keywordnew']);

		DB::update('forum_faq', array(
			'fpid' => $fpidnew,
			'identifier' => $identifiernew,
			'keyword' => $keywordnew,
			'title' => $titlenew,
			'message' => $messagenew,
		), "id='$id'");

		updatecache('faqs');
		cpmsg('faq_list_update', 'action=faq&operation=list', 'succeed');

	}

}

?>