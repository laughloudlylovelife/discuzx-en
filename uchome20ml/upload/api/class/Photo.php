<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: Photo.php 12530 2009-07-03 08:56:11Z zhouguoqiang $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

class Photo extends MyBase {

	/**
	 * Create album 
	 * @param integer $uId  user Id
	 * @param string  $name  album name
	 * @param string  $privacy  album privacy
	 * @param string  $passwd  When the password to view album
	 * @param string  $friends allow to view album for friends Id
	 * @return integer  album Id
	 */
	function createAlbum($uId, $name, $privacy, $passwd = null, $friendIds = null) {
		include_once(S_ROOT . './source/function_cp.php');

		$privacy = $this->_convertPrivacy($privacy);
		if ($friendIds && is_array($friendIds)) {
			$friends = implode(',', $friendIds);
		} else {
			$friends = '';
		}

		$fields = array(
					'albumname' => $name,
					'friend' => $privacy,
					'password' => $passwd,
					'target_ids' => $friends
					);
		$result = album_creat($fields);
		return new APIResponse($result);;
	}

	/**
	 * update album 
	 * @param integer $uId  user Id
	 * @param intger  $aId  album Id
	 * @param string  $name  album name
	 * @param string  $privacy  album privacy
	 * @param string  $passwd When the password to view album
	 * @param string  $friends allow to view album for friends Id
	 * @param integer $coverId  album cover Id
	 * @return boolean
	 */
	function updateAlbum($uId, $aId, $name = null, $privacy = null, $passwd = null, $friendIds = null, $coverId = null) {
		global $_SGLOBAL;
		$aId = intval($aId);
		if ($aId < 1) {
			$errCode = 120;
			$errMessage = 'Invalid Album Id';
			return new APIErrorResponse($errCode, $errMessage);
		}

		$fields['updatetime'] = time();
		if (is_string($name) && strlen($name) > 0) {
			$fields['albumname'] = $name;
		}

		if ($privacy !== null) {
			$fields['friend'] = $this->_convertPrivacy($privacy);
		}

		if ($passwd !== null) {
			$fields['passwd'] = $passwd;
		}

		if ($coverId !== null) {
			$query = $_SGLOBAL['db']->query('SELECT filepath, remote FROM ' . tname('pic') . ' WHERE picid=' . $coverId . ' AND uid=' . $uId . ' AND albumid=' . $aId);
			$coverInfo = $_SGLOBAL['db']->fetch_array($query);
			if ($coverInfo && is_array($coverInfo)) {
				$fields['pic'] = $coverInfo['filepath'];
				$fields['picflag'] = $coverInfo['remote']?2:1;
			} else {
				$errCode = 121;
				$errMessage = 'Invalid Picture Id';
				return new APIErrorResponse($errCode, $errMessage);
			}
		}

		if ($friendIds && is_array($friendIds)) {
			$fields['target_ids'] = implode(', ', $friendIds);
		}

		updatetable('album', $fields, array('uid' => $uId , 'albumid' => $aId));
		$result  = $_SGLOBAL['db']->affected_rows();
		return new APIResponse($result);
	}

	/**
	 * Remove album 
	 *
	 * @param integer $uId  user Id
	 * @param integer $aId  album Id
	 * @param string  $action Action
	 * @param integer $targetAlbumId Target album Id
	 * @return boolean
	 */
	function removeAlbum($uId, $aId, $action = null , $targetAlbumId = null) {
		global $_SGLOBAL;
		$aId = intval($aId);
		if ($aId < 1) {
			$errCode = 120;
			$errMessage = 'Invalid Album Id';
			return new APIErrorResponse($errCode, $errMessage);
		}

		if ($action == 'move') {
			$targetAlbumId = intval($targetAlbumId);
			if ($targetAlbumId < 1) {
				$errCode = 120;
				$errMessage = 'Invalid Target Album Id';
				return new APIErrorResponse($errCode, $errMessage);
			}

			$sql = 'SELECT  picnum FROM ' . tname('album') . ' WHERE albumid=' . $aId . ' AND uid=' . $uId;
			$query = $_SGLOBAL['db']->query($sql);
			$albumInfo = $_SGLOBAL['db']->fetch_array($query);
			if (!$albumInfo) {
				$errCode = 120;
				$errMessage = 'Invalid Album Id';
				return new APIErrorResponse($errCode, $errMessage);
			}

			if ($albumInfo['picnum'] > 0) {
				$sql = sprintf('UPDATE %s SET picnum = picnum + %d, dateline=%d WHERE albumid =%d AND uid=%d',
					tname('album'), $albumInfo['picnum'], time(), $targetAlbumId , $uId);
				$_SGLOBAL['db']->query($sql);
				$existsAlbum = $_SGLOBAL['db']->affected_rows();

				if (!$existsAlbum) {
					$errCode = 120;
					$errMessage = 'Invalid Target Album Id';
					return new APIErrorResponse($errCode, $errMessage);
				}
				updatetable('pic',array('albumid' => $targetAlbumId), array('albumid' => $aId, 'uid' => $uId));
			}
		}

		include_once(S_ROOT. './source/function_delete.php');
		$res = deletealbums(array($aId));
		if ($res && is_array($res)) {
			return new APIResponse(true);
		} else {
			$errCode = 124;
			$errMessage = 'Delete Album Failure';
			return new APIErrorResponse($errCode, $errMessage);
		}
	}

	/**
	 * Get the user album list
	 *
	 * @param integer $uId  user Id
	 * @return array
	 */
	function getAlbums($uId) {
		global $_SGLOBAL;
		$sql = 'SELECT * FROM ' . tname('album') . ' WHERE uid = ' . $uId;
		$query = $_SGLOBAL['db']->query($sql);
		$albums = array();
		while($album = $_SGLOBAL['db']->fetch_array($query)) {
			$albums[] = $this->_convertAlbum($album);
		}
		return new APIResponse($albums);
	}

	// todo Test image upload remote mode
	/**
	 * Upload photo 
	 *
	 * @param integer $uId  user Id
	 * @param integer $aId  album Id
	 * @param string  $fileName File name 
	 * @param string  $fileType File Type
	 * @param integer $fileSize File Size
	 * @param string  $data  photo data
	 * @param string  $caption  photo caption
	 * @return array
	 */
	function upload($uId, $aId, $fileName, $fileType, $fileSize, $data, $caption = null) {
		$aId = intval($aId);
		if ($aId < 1) {
			$errCode = 120;
			$errMessage = 'Invalid Album Id';
			return new APIErrorResponse($errCode, $errMessage);
		}

		if (!is_string($data) || strlen($data) < 1) {
			$errCode = 123;
			$errMessage = 'Uploaded File Is Not A Valid Image';
			return new APIErrorResponse($errCode, $errMessage);
		}

		include_once(S_ROOT . './source/function_cp.php');

		global $_SC;
		$attachDir = $_SC['attachdir'];
		$_SC['attachdir'] = S_ROOT . './' . $_SC['attachdir'];
		$stream = base64_decode($data);
		$res = stream_save($stream, $aId, $fileType, $fileName, $caption);
		$_SC['attachdir'] = $attachDir;

		$picInfo = array();
		if ($res && is_array($res)) {
			$picInfo['pId'] = $res['picid'];
			$picInfo['src'] = $res['filepathall'];
		} else if ($res == -1) {
			$errCode = 122;
			$errMessage = 'No Enough Space';
		} else if ($res == -2) {
			$errCode = 123;
			$errMessage = 'Uploaded File Is Not A Valid Image';
		} else {
			$errCode = 1;
			$errMessage = 'Unknown Error';
		}

		if ($picInfo) {
			return new APIResponse($picInfo);
		} else {
			return new APIErrorResponse($errCode, $errMessage);
		}
	}

	/**
	 * Get photo information
	 *
	 * @param integer $uId  user Id
	 * @param integer $aId  album Id
	 * @param array   $pIds  image Id list 
	 * @return array
	 */
	function get($uId, $aId, $pIds = null) {
		global $_SGLOBAL;
		$aId = intval($aId);
		if ($aId < 1) {
			$errCode = 120;
			$errMessage = 'Invalid Album Id';
			return new APIErrorResponse($errCode, $errMessage);
		}

		include_once(S_ROOT . './source/function_common.php');

		$sql = 'SELECT * FROM ' . tname('pic') . ' WHERE uid=' . $uId. ' AND albumid=' . $aId ;
		if ($pIds && is_array($pIds)) {
			$sql .= ' AND picid IN (' . implode(', ', $pIds) . ' )';
		}
		$query  = $_SGLOBAL['db']->query($sql);
		$result = array();
		$k = 0;
		$siteUrl = $this->_getUchomeUrl();
		while ($picInfo = $_SGLOBAL['db']->fetch_array($query)) {
			
			$r_src = pic_get($picInfo['filepath'], $picInfo['thumb'], $picInfo['remote'], 0);
			if(!preg_match("/^(http\:\/\/|\/)/i", $r_src)) {
				$r_src = $siteUrl.$r_src;
			}
				
			$result[$k]['pId'] = $picInfo['picid'];
			$result[$k]['aId'] = $picInfo['albumid'];
			$result[$k]['src'] = $r_src;
			$result[$k]['caption'] = $picInfo['title'];
			$result[$k]['created'] = $picInfo['dateline'];
			$result[$k]['fileName'] = $picInfo['filename'];
			$result[$k]['fileSize'] = $picInfo['size'];
			$result[$k]['fileType'] = $picInfo['type'];
			$k++;
		}
		return new APIResponse($result);
	}

	/**
	 *  update the photo 
	 * @param integer $uId  user Id
	 * @param integer $aId  album Id
	 * @param string  $fileName File name
	 * @param string  $fileType File Type
	 * @param integer $fileSize File size
	 * @param string  $caption  photo caption
	 * @param string  $data  photo data
	 */
	function update($uId, $pId, $aId, $fileName = null, $fileType = null, $fileSize = null, $caption = null, $data = null ) {
		global $_SGLOBAL;
		if ($fileName !== null) {
			$fields['filename'] = $fileName;
		}

		if (is_string($caption) && strlen($caption) > 0) {
			$fields['title'] = $caption;
		}

		if (is_string($data) && strlen($data) > 0) {
			// Re-upload a new image
			$query = $_SGLOBAL['db']->query('SELECT size, title, filename FROM ' . tname('pic') . ' WHERE picid=' . $pId. ' AND albumid=' . $aId . ' AND uid=' . $uId);
			$picInfo = $_SGLOBAL['db']->fetch_array($query);
			if ($picInfo && is_array($picInfo)) {
				include_once(S_ROOT . './source/function_cp.php');

				global $_SC;
				$attachDir = $_SC['attachdir'];
				$_SC['attachdir'] = S_ROOT . './' . $_SC['attachdir'];
				$title = $fields['title'] ? $caption : $picInfo['title'];
				$name  = $fields['filename'] ? $fileName : $picInfo['filename'];
				$stream = base64_decode($data);
				$pic = stream_save($stream, $aId, $fileType, $name, $title, $picInfo['size']);
				$_SC['attachdir'] = $attachDir;

				// Returns is not the same with documents
				$newPic = array();
				if ($pic && is_array($pic)) {
					include_once(S_ROOT . './source/function_delete.php');

					deletepics(array($pId));
					updatetable('pic', array('picid' => $pId), array('picid' => $pic['picid']));
					$newPic['pId'] = $pId;
					$newPic['src'] = $pic['filepathall'];
					return new APIResponse($newPic);
				} else if ($res == -1) {
					$errCode = 122;
					$errMessage = 'No Enough Space';
				} else if ($res == -2) {
					$errCode = 123;
					$errMessage = 'Uploaded File Is Not A Valid Image';
				} else {
					$errCode = 1;
					$errMessage = 'Unknown Error';
				}
			} else {
				$errCode = 121;
				$errMessage = 'Invalid Picture Id';
			}
			return new APIErrorResponse($errCode, $errMessage);
		} else {
			$where = array('uid' => $uId, 'albumid' => $aId, 'picid' => $pId);
			updatetable('pic', $fields, $where);
			$query = $_SGLOBAL['db']->query('SELECT * FROM ' . tname('pic') . ' WHERE picid=' . $pId . ' AND uid=' . $uId . ' AND albumid=' . $aId);
			$picInfo = $_SGLOBAL['db']->fetch_array($query);
			if($picInfo && is_array($picInfo)) {
				$newPic['pId'] = $pId;
				$newPic['src'] = pic_get($picInfo['filepath'], $picInfo['thumb'], $picInfo['remote'], 0);
				if(!preg_match("/^(http\:\/\/|\/)/i", $newPic['src'])) {
					$newPic['src'] = $this->_getUchomeUrl().$newPic['src'];
				}
				return new APIResponse($newPic);
			} else {
				$errCode = 121;
				$errMessage = 'Invalid Picture Id';
				return new APIErrorResponse($errCode, $errMessage);
			}
		}
	}

	/**
	 *  delete photo 
	 *
	 * @param integer $uId  user Id
	 * @param array   $pIds  photo Id list 
	 * @return array
	 */
	function remove($uId, $pIds) {
		$result = false;
		if (!$pIds && !is_array($pIds)) {
			$errCode = 121;
			$errMessage = 'Invalid Picture Id';
			return new APIErrorResponse($errCode, $errMessage);
		}

		include_once(S_ROOT . './source/function_delete.php');
		$picInfos = deletepics($pIds);
		$result = array();
		$deleteIds = array();
		foreach ($picInfos as $picInfo) {
			$deleteIds[] = $picInfo['picid'];
			$result[] = array('pId' => $picInfo['picid'], 'status' => true);
		}
		$errorIds = array_diff($pIds, $deleteIds);
		foreach($errorIds as $pId) {
			$result[] = array('pId' => $pId, 'status' => false);
		}
		return new APIResponse($result);
	}


	function _convertAlbum($albumInfo) {
		$siteUrl = $this->_getUchomeUrl();
		if ($albumInfo && is_array($albumInfo)) {
			$convAlbum = array();
			$convAlbum['aId'] = $albumInfo['albumid'];
			$convAlbum['name']= $albumInfo['albumname'];
			$convAlbum['created'] = $albumInfo['dateline'];
			$convAlbum['updated'] = $albumInfo['updatetime'];
			$convAlbum['privacy'] = $this->_convertPrivacy($albumInfo['friend'], true);
			$convAlbum['passwd']  = $albumInfo['passwd'];
			$convAlbum['friendIds'] = ($albumInfo['target_ids']) ? explode(',', $albumInfo['target_ids']) : '';
			
			if($albumInfo['pic']) {
				$convAlbum['cover'] = pic_cover_get($albumInfo['pic'], $albumInfo['picflag']);
				if(!preg_match("/^(http\:\/\/|\/)/i", $convAlbum['cover'])) {
					$convAlbum['cover'] = $siteUrl.$struct['url'];
				}
			} else {
				$convAlbum['cover'] = '';
			}
			
			$convAlbum['url']     = $siteUrl . 'space.php?uid=' . $albumInfo['uid'] . '&do=album&id=' . $albumInfo['albumid'];
		} else {
			$convAlbum = false;
		}
		return $convAlbum;
	}

	function _convertPrivacy($privacy, $u2m = false) {
		$privacys = array(0=>'public', 1=>'friends', 2=>'someFriends', 3=>'me', 4=>'passwd');
		$privacys = ($u2m) ? $privacys : array_flip($privacys);
		return $privacys[$privacy];
	}

	function _getUchomeUrl() {
		$uri = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
		return 'http://'.$_SERVER['HTTP_HOST'].substr($uri, 0, strrpos($uri, '/')-3);
	}
}
?>
