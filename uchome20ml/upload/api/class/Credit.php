<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: Credit.php 13207 2009-08-20 03:32:01Z zhouguoqiang $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

class Credit extends MyBase {

	/**
	 * ��ȡ user  points 
	 *
	 * @param integer $uId  user Id
	 * @return integer  user  points 
	 */
	function get($uId) {
		global $_SGLOBAL;
		$query = $_SGLOBAL['db']->query('SELECT credit FROM ' . tname('space') . ' WHERE uid =' . $uId);
		$row = $_SGLOBAL['db']->fetch_array($query);
		return new APIResponse($row['credit']);
	}

	/**
	 *  update  user �� points 
	 *
	 * @param integer $uId  user Id
	 * @param integer $credits  points ֵ
	 * @param integer $appId Ӧ��Id
	 * @param string $note ������¼
	 * @return integer  update ��� user points 
	 */
	function update($uId, $credits, $appId, $note) {
		global $_SGLOBAL;

		$where = '';
		$type = 1;
		if ($credits < 0) {
			$where = ' AND credit >= ' . abs($credits);
			$type = 0;
		}
		$sql = sprintf('UPDATE %s SET credit = credit + %d WHERE uid=%d %s', tname('space'), $credits, $uId, $where);
		$result = $_SGLOBAL['db']->query($sql);

		if ($_SGLOBAL['db']->affected_rows() < 1) {
			$errCode = 180;
			$errMessage = 'No Credits Enough';
			return new APIErrorResponse($errCode, $errMessage);
		}

		$fields = array(
						'uid' => $uId,
						'appid' => $appId,
						'type' => $type,
						'credit' => abs($credits),
						'note' => $note,
						'dateline' => time()
					   );
		$result = inserttable('appcreditlog', $fields, 1);

		$query = $_SGLOBAL['db']->query('SELECT credit FROM ' . tname('space') . ' WHERE uid =' . $uId);
		$row = $_SGLOBAL['db']->fetch_array($query);
		return new APIResponse($row['credit']);
	}
}

?>
