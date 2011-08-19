<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cloudstat.class.php 23929 2011-08-17 02:33:35Z yexinhao $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_cloudstat {
	var $discuzParams = array();
	var $virtualDomain = '';
	var $extraParams = array();

	function global_footerlink() {
		global $_G;
		if($_G['inajax']) {
			return '';
		}
		return $this->_makejs();
	}

	function global_cpnav_extra1() {
		$js = '<script type="text/javascript">var _speedMark = new Date();</script>';
		return $js;
	}

	function _makejs() {
		global $_G;
		$dzjs = $this->_makedzjs();
		$return = '';
		if(!$_G['inajax']) {
			$return = '&nbsp;&nbsp;<span id="tcss"></span><script type="text/javascript" src="http://tcss.qq.com/ping.js?v=1'.VERHASH.'" charset="utf-8"></script>';
		}
		$return .= '<script type="text/javascript" reload="1">pgvMain('.$dzjs.');</script>';
		return $return;
	}

	function _makedzjs() {
		global $_G;

		$this->discuzParams['r2'] = $_G['setting']['my_siteid'];

		$this->discuzParams['ui'] = $_G['uid'] ? $_G['uid'] : 0;

		if($_G['uid'] && ($_G['member']['regdate'] < ($_G['timestamp'] - $_G['timestamp'] % 86400))) {
			$this->discuzParams['ty'] = 2;
		}

		$this->discuzParams['rt'] = $_G['basescript'];

		if($_G['mod']) {
			$this->discuzParams['md'] = $_G['mod'];
		}

		if($_G['fid']) {
			$this->discuzParams['fi'] = $_G['fid'];
		}

		if($_G['tid']) {
			$this->discuzParams['ti'] = $_G['tid'];
		}

		if($_G['page']) {
			$this->discuzParams['pn'] = $_G['page'];
		} else {
			$this->discuzParams['pn'] = 1;
		}

		if($_G['member']['conisbind']) {
			$this->discuzParams['qq'] = $_G['member']['conuin'];
		}

		$cloudstatpost = getcookie('cloudstatpost');
		dsetcookie('cloudstatpost');
		$cloudstatpost = explode('D', $cloudstatpost);
		if($cloudstatpost[0] == 'thread') {
			$this->discuzParams['nt'] = 1;
			$this->discuzParams['ui'] = $cloudstatpost[1];
			$this->discuzParams['fi'] = $cloudstatpost[2];
			$this->discuzParams['ti'] = $cloudstatpost[3];
			$subject = $_G['forum_thread']['subject'];
			$charset = $_G['charset'];
			if(empty($charset)) {
				foreach ($_G['config']['db'] as $key => $cfg) {
					if ($cfg['dbcharset']) {
						$charset = $cfg['dbcharset'];
						break;
					}
				}
			}
			if('GBK' != strtoupper($charset) && !empty($charset)) {
				$subject = diconv($subject, $charset, 'GBK');
			}
			$this->extraParams[] = "tn=" . urlencode($subject);
		} elseif($cloudstatpost[0] == 'post') {
			$this->discuzParams['nt'] = 2;
			$this->discuzParams['ui'] = $cloudstatpost[1];
			$this->discuzParams['fi'] = $cloudstatpost[2];
			$this->discuzParams['ti'] = $cloudstatpost[3];
			$this->discuzParams['pi'] = $cloudstatpost[4];
		}

		$cloudstaticon = isset($_G['setting']['cloud_staticon']) ? intval($_G['setting']['cloud_staticon']) : 9;
		if ($cloudstaticon && !$_G['inajax']) {
			$this->discuzParams['logo'] = $cloudstaticon;
		}

		$refInfo = parse_url($_G['siteurl']);
		if('/' == substr($refInfo['path'], -1)) {
			$refInfo['path'] = substr($refInfo['path'], 0, -1);
		}
		$this->virtualDomain = $refInfo['host'] . $refInfo['path'];

		return $this->_response_format(array(
			'discuzParams' => $this->discuzParams,
			'virtualDomain' => $this->virtualDomain,
			'extraParams' => implode(';', $this->extraParams)
		));
	}

	function _response_format($result) {
		if(function_exists('json_encode')) {
			$json = json_encode($result);
		} else {
			$json = $this->_array2json($result);
		}
		return $json;
	}

	function _array2json($array) {
		$piece = array();
		foreach ($array as $k => $v) {
			$piece[] = $k . ':' . $this->_php2json($v);
		}

		if ($piece) {
			$json = '{' . implode(',', $piece) . '}';
		} else {
			$json = '[]';
		}
		return $json;
	}

	function _php2json($value) {
		if (is_array($value)) {
			return $this->_array2json($value);
		}
		if (is_string($value)) {
			$value = str_replace(array("\n", "\t"), array(), $value);
			$value = addslashes($value);
			return '"'.$value.'"';
		}
		if (is_bool($value)) {
			return $value ? 'true' : 'false';
		}
		if (is_null($value)) {
			return 'null';
		}

		return $value;
	}

	function _post_cloudstat_message($param) {
		global $_G;
		$param = $param['param'];
		if(in_array($param[0], array('post_newthread_succeed', 'post_newthread_mod_succeed'))) {
			dsetcookie('cloudstatpost', 'threadD'.$_G['uid'].'D'.$param[2]['fid'].'D'.$param[2]['tid'], 86400);
		} elseif(in_array($param[0], array('post_reply_succeed', 'post_reply_mod_succeed'))) {
			dsetcookie('cloudstatpost', 'postD'.$_G['uid'].'D'.$param[2]['fid'].'D'.$param[2]['tid'].'D'.$param[2]['pid'], 86400);
		}
	}

	function _viewthread_postbottom_output() {
		global $_G;
		$cloudstatjs = array();
		if($_G['inajax'] && !empty($_G['gp_viewpid'])) {
			$cloudstatjs[] = $this->_makejs();
		}
		return $cloudstatjs;
	}

}

class plugin_cloudstat_forum extends plugin_cloudstat {

	function post_cloudstat_message($param) {
		return $this->_post_cloudstat_message($param);
	}

	function viewthread_postbottom_output() {
		return $this->_viewthread_postbottom_output();
	}

}

class plugin_cloudstat_group extends plugin_cloudstat {

	function post_cloudstat_message($param) {
		return $this->_post_cloudstat_message($param);
	}

	function viewthread_postbottom_output() {
		return $this->_viewthread_postbottom_output();
	}

}

?>