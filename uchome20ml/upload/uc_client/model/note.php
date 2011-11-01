<?php

/*
	[UCenter] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: note.php 916 2009-01-19 05:56:07Z monkey $
*/

!defined('IN_UC') && exit('Access Denied');

define('UC_NOTE_REPEAT', 5);	// notice Repeat Frequency
define('UC_NOTE_TIMEOUT', 15);	// notice Timeout (seconds)
define('UC_NOTE_GC', 10000);	// The probability of recovery of overdue notice, the larger the value, the lower the probability

define('API_RETURN_FAILED', '-1');

class notemodel {

	var $db;
	var $base;
	var $apps;
	var $operations = array();
	var $notetype = 'HTTP';// HTTP|INCLUDE

	function __construct(&$base) {
		$this->notemodel($base);
	}

	function notemodel(&$base) {
		$this->base = $base;
		$this->db = $base->db;
		$this->apps = $this->base->cache('apps');
		/** note
		 * 1. Operation of name Said, such as: delete  user , Test connectivity, delete Friends, take TAG Data, update Clients cache 
		 * 2. The application calls the interface parameters, splicing rules APP_URL/api/uc.php?action=test&ids=1,2,3
		 * 3. Callback module name called
		 * 4. Callback module method ($appid, $content)
		 */
		$this->operations = array(
			'test'=>array('', 'action=test'),
			'deleteuser'=>array('', 'action=deleteuser'),
			'renameuser'=>array('', 'action=renameuser'),
			'deletefriend'=>array('', 'action=deletefriend'),
			'gettag'=>array('', 'action=gettag', 'tag', 'updatedata'),
			'getcreditsettings'=>array('', 'action=getcreditsettings'),
			'getcredit'=>array('', 'action=getcredit'),
			'updatecreditsettings'=>array('', 'action=updatecreditsettings'),
			'updateclient'=>array('', 'action=updateclient'),
			'updatepw'=>array('', 'action=updatepw'),
			'updatebadwords'=>array('', 'action=updatebadwords'),
			'updatehosts'=>array('', 'action=updatehosts'),
			'updateapps'=>array('', 'action=updateapps'),
			'updatecredit'=>array('', 'action=updatecredit'),
		);
	}

	/**
	 * Statistics notice The total number of
	 *
	 * @return int
	 */
	function get_total_num($all = TRUE) {
	}

	/**
	 * Enter Get notice  list 
	 *
	 * @param int $page
	 * @param int$ppp
	 * @param int $totalnum
	 * @return array Result set
	 */
	function get_list($page, $ppp, $totalnum, $all = TRUE) {
	}

	/**
	 *  delete notice 
	 *
	 * @param string/array $ids
	 * @return The number of rows affected
	 */
	function delete_note($ids) {
	}

	/**
	 *  add notice list 
	 *
	 * @param string Operating
	 * @param string getdata
	 * @param string postdata
	 * @param array appids The notice specified APPID
	 * @param int pri Priority, the higher value indicates greater
	 * @return int Inserted ID
	 */
	function add($operation, $getdata='', $postdata='', $appids=array(), $pri = 0) {
		$extra = $varextra = '';
		$appadd = $varadd = array();
		foreach((array)$this->apps as $appid => $app) {
			$appid = $app['appid'];
			if($appid == intval($appid)) {
				if($appids && !in_array($appid, $appids)) {
					$appadd[] = 'app'.$appid."='1'";
				} else {
					$varadd[] = "('noteexists{$appid}', '1')";
				}
			}
		}
		if($appadd) {
			$extra = implode(',', $appadd);
			$extra = $extra ? ', '.$extra : '';
		}
		if($varadd) {
			$varextra = implode(', ', $varadd);
			$varextra = $varextra ? ', '.$varextra : '';
		}

		$getdata = addslashes($getdata);
		$postdata = addslashes($postdata);
		$this->db->query("INSERT INTO ".UC_DBTABLEPRE."notelist SET getdata='$getdata', operation='$operation', pri='$pri', postdata='$postdata'$extra");
		$insert_id = $this->db->insert_id();
		$insert_id && $this->db->query("REPLACE INTO ".UC_DBTABLEPRE."vars (name, value) VALUES ('noteexists', '1')$varextra");
		return $insert_id;
	}

	function send() {
		register_shutdown_function(array($this, '_send'));
	}

	function _send() {
		// Determine whether there is notice 

		// If the memory table records do not exist, it may mysql Was restarted, again to determine notice existence

		// See if there is notice 
		$note = $this->_get_note();
		if(empty($note)) {
			// Marked as not notice 
			$this->db->query("REPLACE INTO ".UC_DBTABLEPRE."vars SET name='noteexists".UC_APPID."', value='0'");
			return NULL;
		}

		// mysql Sent only their own notice 
		$this->sendone(UC_APPID, 0, $note);

		// Garbage removal
		$this->_gc();
	}

	function sendone($appid, $noteid = 0, $note = '') {
		require_once UC_ROOT.'./lib/xml.class.php';
		$return = FALSE;
		$app = $this->apps[$appid];
		if($noteid) {
			$note = $this->_get_note_by_id($noteid);
		}
		$this->base->load('misc');
		$apifilename = isset($app['apifilename']) && $app['apifilename'] ? $app['apifilename'] : 'uc.php';
		if($app['extra']['apppath'] && @include $app['extra']['apppath'].'./api/'.$apifilename) {
			$uc_note = new uc_note();
			$method = $note['operation'];
			if(is_string($method) && !empty($method)) {
				parse_str($note['getdata'], $note['getdata']);
				if(get_magic_quotes_gpc()) {
					$note['getdata'] = $this->base->dstripslashes($note['getdata']);
				}
				$note['postdata'] = xml_unserialize($note['postdata']);
				$response = $uc_note->$method($note['getdata'], $note['postdata']);
			}
			unset($uc_note);
		} else {
			$url = $this->get_url_code($note['operation'], $note['getdata'], $appid);
			$note['postdata'] = str_replace(array("\n", "\r"), '', $note['postdata']);
			$response = trim($_ENV['misc']->dfopen2($url, 0, $note['postdata'], '', 1, $app['ip'], UC_NOTE_TIMEOUT, TRUE));
		}

		$returnsucceed = $response != '' && ($response == 1 || is_array(xml_unserialize($response)));// When return 1 then it is considered notice success 

		$closedsqladd = $this->_close_note($note, $this->apps, $returnsucceed, $appid) ? ",closed='1'" : '';//

		if($returnsucceed) {
			if($this->operations[$note['operation']][2]) {
				$this->base->load($this->operations[$note['operation']][2]);
				$func = $this->operations[$note['operation']][3];
				$_ENV[$this->operations[$note['operation']][2]]->$func($appid, $response);
			}
			$this->db->query("UPDATE ".UC_DBTABLEPRE."notelist SET app$appid='1', totalnum=totalnum+1, succeednum=succeednum+1, dateline='{$this->base->time}' $closedsqladd WHERE noteid='$note[noteid]'", 'SILENT');
			$return = TRUE;
		} else {
			$this->db->query("UPDATE ".UC_DBTABLEPRE."notelist SET app$appid = app$appid-'1', totalnum=totalnum+1, dateline='{$this->base->time}' $closedsqladd WHERE noteid='$note[noteid]'", 'SILENT');
			$return = FALSE;
		}
		return $return;
	}

	function _get_note() {
		$app_field = 'app'.UC_APPID;
		$data = $this->db->fetch_first("SELECT * FROM ".UC_DBTABLEPRE."notelist WHERE closed='0' AND $app_field<'1' AND $app_field>'-".UC_NOTE_REPEAT."' LIMIT 1");
		return $data;
	}

	function _gc() {
		rand(0, UC_NOTE_GC) == 0 && $this->db->query("DELETE FROM ".UC_DBTABLEPRE."notelist WHERE closed='1'");
	}

	// Determine whether the need to close notice 
	function _close_note($note, $apps, $returnsucceed, $appid) {
		$note['app'.$appid] = $returnsucceed ? 1 : $note['app'.$appid] - 1;
		$appcount = count($apps);
		foreach($apps as $key => $app) {
			$appstatus = $note['app'.$app['appid']];
			if(!$app['recvnote'] || $appstatus == 1 || $appstatus <= -UC_NOTE_REPEAT) {
				$appcount--;
			}
		}
		if($appcount < 1) {
			return TRUE;
			//$closedsqladd = ",closed='1'";
		}
	}

	function _get_note_by_id($noteid) {
		$data = $this->db->fetch_first("SELECT * FROM ".UC_DBTABLEPRE."notelist WHERE noteid='$noteid'");
		return $data;
	}

	function get_url_code($operation, $getdata, $appid) {
		$app = $this->apps[$appid];
		$authkey = UC_KEY;
		$url = $app['url'];
		$apifilename = isset($app['apifilename']) && $app['apifilename'] ? $app['apifilename'] : 'uc.php';
		$action = $this->operations[$operation][1];
		$code = urlencode($this->base->authcode("$action&".($getdata ? "$getdata&" : '')."time=".$this->base->time, 'ENCODE', $authkey));
		return $url."/api/$apifilename?code=$code";
	}

}

?>