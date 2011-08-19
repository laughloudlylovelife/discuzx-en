<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_founder.php 10769 2010-05-14 10:06:05Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

cpheader();

if(empty($admincp) || !is_object($admincp) || !$admincp->isfounder) {
	exit('Access Denied');
}

if($operation == 'perm') {

	$do = !in_array(getgpc('do'), array('group', 'member', 'gperm')) ? 'member' : getgpc('do');
	shownav('founder', 'menu_founder_perm');

	if($do == 'group') {
		$id = intval(getgpc('id'));

		if(!$id) {
			$query = DB::query("SELECT * FROM ".DB::table('common_admincp_group')." ORDER BY cpgroupid");
			$groups = array();
			while($group = DB::fetch($query)) {
				$groups[$group['cpgroupid']] = $group['cpgroupname'];
			}
			if(!submitcheck('submit')) {
				showsubmenu('menu_founder_perm', array(
					array('nav_founder_perm_member', 'founder&operation=perm&do=member',  0),
					array('nav_founder_perm_group', 'founder&operation=perm&do=group', 1),
				));
				showformheader('founder&operation=perm&do=group');
				showtableheader();
				showsubtitle(array('', 'founder_cpgroupname', ''));
				foreach($groups as $id => $group) {
					showtablerow('style="height:20px"', array('class="td25"', 'class="td24"'), array(
						"<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$id]\">",
						"<input type=\"text\" class=\"txtnobd\" onblur=\"this.className='txtnobd'\" onfocus=\"this.className='txt'\" size=\"15\" name=\"name[$id]\" value=\"$group\">",
						'<a href="'.ADMINSCRIPT.'?action=founder&operation=perm&do=group&id='.$id.'">'.cplang('edit').'</a>'
						));
				}
				showtablerow('style="height:20px"', array(), array(cplang('add_new'), '<input class="txt" type="text" name="newcpgroupname" value="" />', ''));
				showsubmit('submit', 'submit', 'del');
				showtablefooter();
				showformfooter();
			} else {
				if(!empty($_G['gp_newcpgroupname'])) {
					if(DB::result_first("SELECT count(*) FROM ".DB::table('common_admincp_group')." WHERE cpgroupname='$_G[gp_newcpgroupname]'")) {
						cpmsg('founder_perm_group_name_duplicate', '', 'error', array('name' => $_G['gp_newcpgroupname']));
					}
					DB::insert('common_admincp_group', array('cpgroupname' => strip_tags($_G['gp_newcpgroupname'])));
				}
				if(!empty($_G['gp_delete'])) {
					DB::delete('common_admincp_perm', 'cpgroupid IN ('.dimplode($_G['gp_delete']).')');
					DB::update('common_admincp_member', array('cpgroupid' => 0), 'cpgroupid IN ('.dimplode($_G['gp_delete']).')');
					DB::delete('common_admincp_group', 'cpgroupid IN ('.dimplode($_G['gp_delete']).')');
				}
				if(!empty($_G['gp_name'])) {
					foreach($_G['gp_name'] as $id => $name) {
						if($groups[$id] != $name) {
							if(($cpgroupid = DB::result_first("SELECT cpgroupid FROM ".DB::table('common_admincp_group')." WHERE cpgroupname='$name'")) && $_G['gp_name'][$cpgroupid] == $groups[$cpgroupid]) {
								cpmsg('founder_perm_group_name_duplicate', '', 'error', array('name' => $name));
							}
							DB::update('common_admincp_group', array('cpgroupname' => $name), "cpgroupid='$id'");
						}
					}
				}
				cpmsg('founder_perm_group_update_succeed', 'action=founder&operation=perm&do=group', 'succeed');
			}
		} else {
			if(!submitcheck('submit')) {

				showpermstyle();
				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_perm')." WHERE cpgroupid='$id'");
				$perms = array();
				while($perm = DB::fetch($query)) {
					$perms[] = $perm['perm'];
				}
				$cpgroupname = DB::result_first("SELECT cpgroupname FROM ".DB::table('common_admincp_group')." WHERE cpgroupid='$id'");
				$data = getactionarray();
				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_group')." ORDER BY cpgroupid");
				$grouplist = '';
				while($ggroup = DB::fetch($query)) {
					$grouplist .= '<a href="###" onclick="location.href=\''.ADMINSCRIPT.'?action=founder&operation=perm&do=group&switch=yes&id='.$ggroup['cpgroupid'].'&scrolltop=\'+document.documentElement.scrollTop"'.($_G['gp_id'] == $ggroup['cpgroupid'] ? ' class="current"' : '').'>'.$ggroup['cpgroupname'].'</a>';
				}
				$grouplist = '<span id="cpgselect" class="right popupmenu_dropmenu" onmouseover="showMenu({\'ctrlid\':this.id,\'pos\':\'34\'});$(\'cpgselect_menu\').style.top=(parseInt($(\'cpgselect_menu\').style.top)-document.documentElement.scrollTop)+\'px\'">'.cplang('founder_group_switch').'<em>&nbsp;&nbsp;</em></span>'.
					'<div id="cpgselect_menu" class="popupmenu_popup" style="display:none">'.$grouplist.'</div>';

				showsubmenu('menu_founder_groupperm', array(array()), $grouplist, array('group' => $cpgroupname));
				showformheader('founder&operation=perm&do=group&id='.$id);
				showtableheader();
				foreach($data['cats'] as $topkey) {
					if(!$data['actions'][$topkey]) {
						continue;
					}
					$checkedall = true;
					$row = '<tr><td class="vtop" id="perms_'.$topkey.'">';
					foreach($data['actions'][$topkey] as $k => $item) {
						if(!$item) {
							continue;
						}
						$checked = @in_array($item[1], $perms);
						if(!$checked) {
							$checkedall = false;
						}
						$row .= '<div class="item'.($checked ? ' checked' : '').'"><a class="right" title="'.cplang('config').'" href="'.ADMINSCRIPT.'?frames=yes&action=founder&operation=perm&do=gperm&gset='.$topkey.'_'.$k.'" target="_blank">&nbsp;</a><label class="txt"><input name="permnew[]" value="'.$item[1].'" class="checkbox" type="checkbox" '.($checked ? 'checked="checked" ' : '').' onclick="checkclk(this)" />'.cplang($item[0]).'</label></div>';
					}
					$row .= '</td></tr>';
					if($topkey != 'setting') {
						showtitle('<label><input class="checkbox" type="checkbox" onclick="permcheckall(this, \'perms_'.$topkey.'\')" '.($checkedall ? 'checked="checked" ' : '').'/> '.cplang('header_'.$topkey).'</label>');
					} else {
						showtitle('founder_perm_setting');
					}
					echo $row;
				}
				showsubmit('submit');
				showtablefooter();
				showformfooter();
				if(!empty($_G['gp_switch'])) {
					echo '<script type="text/javascript">showMenu({\'ctrlid\':\'cpgselect\',\'pos\':\'34\'});</script>';
				}

			} else {
				DB::delete('common_admincp_perm', "cpgroupid='$id'");
				if($_G['gp_permnew']) {
					foreach($_G['gp_permnew'] as $perm) {
						DB::insert('common_admincp_perm', array('cpgroupid' => $id, 'perm' => $perm));
					}
				}

				cpmsg('founder_perm_groupperm_update_succeed', 'action=founder&operation=perm&do=group', 'succeed');
			}
		}

	} elseif($do == 'member') {

		$founders = $_G['config']['admincp']['founder'] !== '' ? explode(',', str_replace(' ', '', addslashes($_G['config']['admincp']['founder']))) : array();
		if($founders) {
			$founderexists = true;
			$fuid = $fuser = array();
			foreach($founders as $founder) {
				if(is_numeric($founder)) {
					$fuid[] = $founder;
				} else {
					$fuser[] = $founder;
				}
			}
			$query = DB::query("SELECT uid, username FROM ".DB::table('common_member')." WHERE ".($fuid ? "uid IN (".dimplode($fuid).")" : '0')." OR ".($fuser ? "username IN (".dimplode($fuser).")" : '0'));
			$founders = array();
			while($founder = DB::fetch($query)) {
				$founders[$founder['uid']] = $founder['username'];
			}
		} else {
			$founderexists = false;
			$query = DB::query("SELECT uid, username FROM ".DB::table('common_member')." WHERE adminid='1'");
			$founders = array();
			while($founder = DB::fetch($query)) {
				$founders[$founder['uid']] = $founder['username'];
			}
		}
		$id = empty($_G['gp_id']) ? 0 : $_G['gp_id'];

		if(!$id) {
			if(!submitcheck('submit')) {
				showsubmenu('menu_founder_perm', array(
					array('nav_founder_perm_member', 'founder&operation=perm&do=member',  1),
					array('nav_founder_perm_group', 'founder&operation=perm&do=group', 0),
				));
				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_group')." ORDER BY cpgroupid");
				$groupselect = '<select name="newcpgroupid"><option value="0">'.cplang('founder_master').'</option>';
				$groups = array();
				while($group = DB::fetch($query)) {
					$groupselect .= '<option value="'.$group['cpgroupid'].'">'.$group['cpgroupname'].'</option>';
					$groups[$group['cpgroupid']] = $group['cpgroupname'];
				}
				$groupselect .= '</select>';
				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_member'));
				$members = $adminmembers = array();
				while($adminmember = DB::fetch($query)) {
					$adminmembers[$adminmember['uid']] = $adminmember;
				}
				foreach($founders as $uid => $founder) {
					$members[$uid] = array('uid' => $uid, 'username' => $founder, 'cpgroupname' => cplang('founder_admin'));
				}
				if($adminmembers) {
					$query = DB::query("SELECT uid, username FROM ".DB::table('common_member')." WHERE uid IN (".dimplode(array_keys($adminmembers)).")");
					while($member = DB::fetch($query)) {
						if(isset($members[$member['uid']])) {
							DB::delete('common_admincp_member', array('uid' => $member['uid']));
							continue;
						}
						$member['cpgroupname'] = !empty($adminmembers[$member['uid']]['cpgroupid']) ? $groups[$adminmembers[$member['uid']]['cpgroupid']] : cplang('founder_master');
						if(!$founderexists && in_array($member['uid'], array_keys($founders))) {
							$member['cpgroupname'] = cplang('founder_admin');
						}
						$members[$member['uid']] = $member;
					}
				}
				if(!$founderexists) {
					showtips(cplang('home_security_nofounder').cplang('home_security_founder'));
				} else {
					showtips('home_security_founder');
				}
				showformheader('founder&operation=perm&do=member');
				showtableheader();
				showsubtitle(array('', 'founder_username', 'founder_usergname', ''));
				foreach($members as $id => $member) {
					$isfounder = array_key_exists($id, $founders);
					showtablerow('style="height:20px"', array('class="td25"', 'class="td24"', 'class="td24"'), array(
						!$isfounder || isset($adminmembers[$member['uid']]['cpgroupid']) ? "<input class=\"checkbox\" type=\"checkbox\" name=\"delete[]\" value=\"$id]\">" : '',
						"<a href=\"home.php?mod=space&uid=$member[uid]\" target=\"_blank\">$member[username]</a>",
						$member['cpgroupname'],
						!$isfounder && $adminmembers[$member['uid']]['cpgroupid'] ? '<a href="'.ADMINSCRIPT.'?action=founder&operation=perm&do=member&id='.$id.'">'.cplang('edit').'</a>' : ''
						));
				}
				showtablerow('style="height:20px"', array('class="td25"', 'class="td24"', 'class="td24"'), array(cplang('add_new'), '<input class="txt" type="text" name="newcpusername" value="" />', $groupselect, ''));
				showsubmit('submit', 'submit', 'del');
				showtablefooter();
				showformfooter();
			} else {
				if(!empty($_G['gp_newcpusername'])) {
					$newcpuid = DB::result_first("SELECT uid FROM ".DB::table("common_member")." WHERE username='$_G[gp_newcpusername]'");
					if(!$newcpuid) {
						cpmsg('founder_perm_member_noexists', '', 'error', array('name' => $_G['gp_newcpusername']));
					}
					if(DB::result_first("SELECT count(*) FROM ".DB::table('common_admincp_member')." WHERE uid='$newcpuid'") || array_key_exists($newcpuid, $founders)) {
						cpmsg('founder_perm_member_duplicate', '', 'error', array('name' => $_G['gp_newcpusername']));
					}
					DB::insert('common_admincp_member', array('uid' => $newcpuid, 'cpgroupid' => $_G['gp_newcpgroupid']));
					DB::update('common_member', array('allowadmincp' => 1), "uid='$newcpuid'");
				}
				if(!empty($_G['gp_delete'])) {
					DB::delete('common_admincp_member', 'uid IN ('.dimplode($_G['gp_delete']).')');
					DB::update('common_member', array('allowadmincp' => 0), 'uid IN ('.dimplode($_G['gp_delete']).')');
				}
				cpmsg('founder_perm_member_update_succeed', 'action=founder&operation=perm&do=member', 'succeed');
			}
		} else {
			if(!submitcheck('submit')) {
				$member = DB::fetch_first("SELECT * FROM ".DB::table('common_admincp_member')." WHERE uid='$id'");
				if(!$member) {
					cpmsg('founder_perm_member_noexists', '', 'error');
				}
				$username = DB::result_first("SELECT username FROM ".DB::table("common_member")." WHERE uid='$id'");
				$cpgroupid = empty($_G['gp_cpgroupid']) ? $member['cpgroupid'] : $_G['gp_cpgroupid'];
				$member['customperm'] = empty($_G['gp_cpgroupid']) || $_G['gp_cpgroupid'] == $member['cpgroupid'] ? unserialize($member['customperm']) : array();
				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_perm')." WHERE cpgroupid='$cpgroupid'");
				$perms = array();
				while($perm = DB::fetch($query)) {
					$perms[] = $perm['perm'];
				}
				$data = getactionarray();

				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_group')." ORDER BY cpgroupid");
				$groupselect = '<select name="cpgroupidnew" onchange="location.href=\''.ADMINSCRIPT.'?action=founder&operation=perm&do=member&id='.$id.'&cpgroupid=\' + this.value">';
				while($group = DB::fetch($query)) {
					$groupselect .= '<option value="'.$group['cpgroupid'].'"'.($group['cpgroupid'] == $cpgroupid ? ' selected="selected"' : '').'>'.$group['cpgroupname'].'</option>';
				}
				$groupselect .= '</select>';

				showpermstyle();
				showsubmenu('menu_founder_memberperm', array(array()), '', array('username' => $username));

				showformheader('founder&operation=perm&do=member&id='.$id);
				showtableheader();
				showsetting('founder_usergname', '', '', $groupselect);
				showtablefooter();
				showtableheader();
				foreach($data['cats'] as $topkey) {
					if(!$data['actions'][$topkey]) {
						continue;
					}
					$checkedall = true;
					$row = '<tr><td class="vtop" id="perms_'.$topkey.'">';
					foreach($data['actions'][$topkey] as $item) {
						if(!$item) {
							continue;
						}
						$checked = @in_array($item[1], $perms);
						$customchecked = @in_array($item[1], $member['customperm']);
						$extra = $checked ? ($customchecked ? '' : 'checked="checked" ').' onclick="checkclk(this)"' : 'disabled="disabled" ';
						if(!$checked || $customchecked) {
							$checkedall = false;
						}
						$row .= '<div class="item'.($checked && !$customchecked ? ' checked' : '').'"><label class="txt"><input name="permnew[]" value="'.$item[1].'" class="checkbox" type="checkbox" '.$extra.'/>'.cplang($item[0]).'</label></div>';
					}
					$row .= '</td></tr>';
					if($topkey != 'setting') {
						showtitle('<input class="checkbox" type="checkbox" onclick="permcheckall(this, \'perms_'.$topkey.'\')" '.($checkedall ? 'checked="checked" ' : '').'/> '.cplang('nav_'.$topkey).'</label>');
					} else {
						showtitle('founder_perm_setting');
					}
					echo $row;
				}
				showsubmit('submit');
				showtablefooter();
				showformfooter();
			} else {
				$gp_permnew = !empty($_G['gp_permnew']) ? $_G['gp_permnew'] : array();
				$cpgroupidnew = $_G['gp_cpgroupidnew'];
				$query = DB::query("SELECT * FROM ".DB::table('common_admincp_perm')." WHERE cpgroupid='$cpgroupidnew'");
				$perms = array();
				while($perm = DB::fetch($query)) {
					$perms[] = $perm['perm'];
				}
				$customperm = addslashes(serialize(array_diff($perms, $gp_permnew)));
				DB::update('common_admincp_member', array('cpgroupid' => $cpgroupidnew, 'customperm' => $customperm), "uid='$id'");
				cpmsg('founder_perm_member_update_succeed', 'action=founder&operation=perm&do=member', 'succeed');
			}
		}

	} elseif($do == 'gperm' && !empty($_G['gp_gset'])) {

		$gset = $_G['gp_gset'];
		list($topkey, $k) = explode('_', $gset);
		$data = getactionarray();
		$gset = $data['actions'][$topkey][$k];
		if(!$gset) {
			cpmsg('undefined_action', '', 'error');
		}
		if(!submitcheck('submit')) {
			$query = DB::query("SELECT cpg.*,cpp.perm FROM ".DB::table('common_admincp_group')." cpg LEFT JOIN ".DB::table('common_admincp_perm')." cpp ON cpg.cpgroupid=cpp.cpgroupid AND cpp.perm='$gset[1]' ORDER BY cpg.cpgroupid");
			$groups = array();
			while($group = DB::fetch($query)) {
				$groups[$group['cpgroupid']] = $group;
			}
			showsubmenu('menu_founder_permgrouplist', array(array()), '', array('perm' => cplang($gset[0])));

			showformheader('founder&operation=perm&do=gperm&gset='.$_G['gp_gset']);
			showtableheader();
			showsubtitle(array('', 'founder_usergname'));
			foreach($groups as $id => $group) {
				showtablerow('style="height:20px"', array('class="td25"', ''), array(
					"<input class=\"checkbox\" type=\"checkbox\" name=\"permnew[]\" ".($group['perm'] ? 'checked="checked"' : '')." value=\"$id\">",
					$group['cpgroupname']
					));
			}
			showsubmit('submit');
			showtablefooter();
			showformfooter();
		} else {
			$query = DB::query("SELECT * FROM ".DB::table('common_admincp_group'));
			while($group = DB::fetch($query)) {
				if(in_array($group['cpgroupid'], $_G['gp_permnew'])) {
					DB::insert('common_admincp_perm', array('cpgroupid' => $group['cpgroupid'], 'perm' => $gset[1]), false, true);
				} else {
					DB::delete('common_admincp_perm', "cpgroupid='$group[cpgroupid]' AND perm='$gset[1]'");
				}
			}
			cpmsg('founder_perm_gperm_update_succeed', 'action=founder&operation=perm', 'succeed');
		}

	}
}

function getactionarray() {
	$isfounder = false;
	require './source/admincp/admincp_menu.php';
	require './source/admincp/admincp_perm.php';
	unset($topmenu['index'], $menu['index']);
	$actioncat = $actionarray = array();
	$actioncat[] = 'setting';
	$actioncat = array_merge($actioncat, array_keys($topmenu));
	$actionarray['setting'][] = array('founder_perm_allowpost', '_allowpost');
	foreach($menu as $tkey => $items) {
		foreach($items as $item) {
			$actionarray[$tkey][] = $item;
		}
	}
	return array('actions' => $actionarray, 'cats' => $actioncat);
}

function showpermstyle() {
	echo <<<EOF
	<style>
.item{ float: left; width: 180px; line-height: 25px; margin-left: 5px; border-right: 1px #deeffb dotted; }
.vtop .right, .item .right{ padding: 0 10px; line-height: 22px; background: url('static/image/admincp/bg_repno.gif') no-repeat -286px -145px; font-weight: normal;margin-right:10px; }
.vtop a:hover.right, .item a:hover.right { text-decoration:none; }
</style>
<script type="text/JavaScript">
function permcheckall(obj, perms, t) {
	var t = !t ? 0 : t;
	var checkboxs = $(perms).getElementsByTagName('INPUT');
	for(var i = 0; i < checkboxs.length; i++) {
		var e = checkboxs[i];
		if(e.type == 'checkbox') {
			if(!t) {
				if(!e.disabled) {
					e.checked = obj.checked;
				}
			} else {
				if(obj != e) {
					e.style.visibility = obj.checked ? 'hidden' : 'visible';
				}
			}
		}
	}
}
function checkclk(obj) {
	var obj = obj.parentNode.parentNode;
	obj.className = obj.className == 'item' ? 'item checked' : 'item';
}
</script>
EOF;
}