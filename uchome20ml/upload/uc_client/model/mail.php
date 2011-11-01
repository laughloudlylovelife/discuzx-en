<?php

/*
	[UCenter] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: mail.php 848 2008-12-08 05:43:39Z zhaoxiongfei $
*/

!defined('IN_UC') && exit('Access Denied');

define('UC_MAIL_REPEAT', 5);	// E-mail failed to send the number of repetitions

class mailmodel {

	var $db;
	var $base;
	var $apps;

	function __construct(&$base) {
		$this->mailmodel($base);
	}

	function mailmodel(&$base) {
		$this->base = $base;
		$this->db = $base->db;
		$this->apps = &$this->base->cache['apps'];
	}

	/**
	 * Statistics notice The total number of
	 *
	 */
	function get_total_num() {
		$data = $this->db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE."mailqueue");
		return $data;
	}

	/**
	 * Enter Get e-mail list 
	 *
	 * @param int	$page
	 * @param int	$ppp
	 * @param int	$totalnum
	 * @return array Result set
	 */
	function get_list($page, $ppp, $totalnum) {
		$start = $this->base->page_get_start($page, $ppp, $totalnum);
		$data = $this->db->fetch_all("SELECT m.*, u.username, u.email FROM ".UC_DBTABLEPRE."mailqueue m LEFT JOIN ".UC_DBTABLEPRE."members u ON m.touid=u.uid ORDER BY dateline DESC LIMIT $start, $ppp");
		foreach((array)$data as $k => $v) {
			$data[$k]['subject'] = htmlspecialchars($v['subject']);
			$data[$k]['tomail'] = empty($v['tomail']) ? $v['email'] : $v['tomail'];
			$data[$k]['dateline'] = $v['dateline'] ? $this->base->date($data[$k]['dateline']) : '';
			$data[$k]['appname'] = $this->base->cache['apps'][$v['appid']]['name'];
		}
		return $data;
	}

	/**
	 *  delete E-mail by ids
	 *
	 * @param string/array $ids
	 * @return The number of rows affected
	 */
	function delete_mail($ids) {
		$ids = $this->base->implode($ids);
		$this->db->query("DELETE FROM ".UC_DBTABLEPRE."mailqueue WHERE mailid IN ($ids)");
		return $this->db->affected_rows();
	}

	/**
	 *  add E-mail list 
	 *
	 * @param string Operating
	 * @param string getdata
	 * @param string postdata
	 * @param array appids The notice specified APPID
	 * @param int pri Priority, the higher value indicates greater
	 * @return int Inserted ID
	 */
	function add($mail) {
		// First storage
		if($mail['level']) {
			$sql = "INSERT INTO ".UC_DBTABLEPRE."mailqueue (touid, tomail, subject, message, frommail, charset, htmlon, level, dateline, failures, appid) VALUES ";
			$values_arr = array();
			foreach($mail['uids'] as $uid) {
				if(empty($uid)) continue;
				$values_arr[] = "('$uid', '', '$mail[subject]', '$mail[message]', '$mail[frommail]', '$mail[charset]', '$mail[htmlon]', '$mail[level]', '$mail[dateline]', '0', '$mail[appid]')";
			}
			foreach($mail['emails'] as $email) {
				if(empty($email)) continue;
				$values_arr[] = "('', '$email', '$mail[subject]', '$mail[message]', '$mail[frommail]', '$mail[charset]', '$mail[htmlon]', '$mail[level]', '$mail[dateline]', '0', '$mail[appid]')";
			}
			$sql .= implode(',', $values_arr);
			$this->db->query($sql);
			$insert_id = $this->db->insert_id();
			$insert_id && $this->db->query("REPLACE INTO ".UC_DBTABLEPRE."vars SET name='mailexists', value='1'");
			return $insert_id;
		} else {// Directly
			$mail['email_to'] = array();
			$uids = 0;
			foreach($mail['uids'] as $uid) {
				if(empty($uid)) continue;
				$uids .= ','.$uid;
			}
			$users = $this->db->fetch_all("SELECT uid, username, email FROM ".UC_DBTABLEPRE."members WHERE uid IN ($uids)");
			foreach($users as $v) {
				$mail['email_to'][] = $v['username'].'<'.$v['email'].'>';
			}
			foreach($mail['emails'] as $email) {
				if(empty($email)) continue;
				$mail['email_to'][] = $email;
			}
			$mail['message'] = str_replace('\"', '"', $mail['message']);
			$mail['email_to'] = implode(',', $mail['email_to']);
			return $this->send_one_mail($mail);
		}
	}

	function send() {
		register_shutdown_function(array($this, '_send'));
	}

	function _send() {

		// See if there is an e-mail
		$mail = $this->_get_mail();
		if(empty($mail)) {
			// Do not need to send a message marked
			$this->db->query("REPLACE INTO ".UC_DBTABLEPRE."vars SET name='mailexists', value='0'");
			return NULL;
		} else {
			$mail['email_to'] = $mail['tomail'] ? $mail['tomail'] : $mail['username'].'<'.$mail['email'].'>';
			if($this->send_one_mail($mail)) {
				$this->_delete_one_mail($mail['mailid']);
				return true;
			} else {
				$this->_update_failures($mail['mailid']);
				return false;
			}
		}

	}

	function send_by_id($mailid) {
		if ($this->send_one_mail($this->_get_mail_by_id($mailid))) {
			$this->_delete_one_mail($mailid);
			return true;
		}
	}

	function send_one_mail($mail) {
		if(empty($mail)) return;
		$mail['email_to'] = $mail['email_to'] ? $mail['email_to'] : $mail['username'].'<'.$mail['email'].'>';
		$mail_setting = $this->base->settings;
		return include UC_ROOT.'lib/sendmail.inc.php';
	}

	function _get_mail() {
		$data = $this->db->fetch_first("SELECT m.*, u.username, u.email FROM ".UC_DBTABLEPRE."mailqueue m LEFT JOIN ".UC_DBTABLEPRE."members u ON m.touid=u.uid WHERE failures<'".UC_MAIL_REPEAT."' ORDER BY level DESC, mailid ASC LIMIT 1");
		return $data;
	}

	function _get_mail_by_id($mailid) {
		$data = $this->db->fetch_first("SELECT m.*, u.username, u.email FROM ".UC_DBTABLEPRE."mailqueue m LEFT JOIN ".UC_DBTABLEPRE."members u ON m.touid=u.uid WHERE mailid='$mailid'");
		return $data;
	}

	function _delete_one_mail($mailid) {
		$mailid = intval($mailid);
		return $this->db->query("DELETE FROM ".UC_DBTABLEPRE."mailqueue WHERE mailid='$mailid'");
	}

	function _update_failures($mailid) {
		$mailid = intval($mailid);
		return $this->db->query("UPDATE ".UC_DBTABLEPRE."mailqueue SET failures=failures+1 WHERE mailid='$mailid'");
	}
}

?>