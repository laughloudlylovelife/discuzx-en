<?php
if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

function getGiftList($type = '')
{
	//$fp = @fopen(S_ROOT.'./gift/gift_model/list.php','rb');
	//$content = fread($fp,filesize(S_ROOT.'./gift/gift_model/list.php'));
	//fclose($fp);
	if($type == "gbk"){
		$content = @file_get_contents(S_ROOT.'./gift/gift_model/list_gbk.php');
	}else{
		$content = @file_get_contents(S_ROOT.'./gift/gift_model/list.php');
	}
	$content = explode("\n",$content);
	array_shift($content);
	
	$category = array();
	$list = array();
	
	foreach ($content as $val){
		$val = explode("\t",$val);
		$key = array_search($val[2],$category);
		if($key === false){
			$category[] = $val[2];
			$key = array_search($val[2],$category);
		}
		$list[$key][] = array(
								'gid'	=> $val[0],
								'name'	=> $val[1],
								'type'	=> $key,
								'cost'	=> $val[3],
								'src'	=> str_replace("\r","",$val[4]));
	}
	
	$giftlist = array('category'=>$category,'gift'=>$list);
	return $giftlist;
}

function getGiftListByType($type,$start,$perpage){
	$list = getGiftList();
	$tt = $start+$perpage;
	$tmplist = array();
	$currentlist = array();
	$currentlist['perpage'] = $perpage;
	if($type == -1){
		foreach ($list['gift'] as $vals){
			if(!empty($vals)){
				foreach ($vals as $val){
					$tmplist[] = $val;
				}
			}
		}
		$currentlist['pages'] = ceil(count($tmplist)/$perpage);		
		for($i=$start;$i<$tt;$i++){
			if(!empty($tmplist[$i])){
				$currentlist['gift'][] = $tmplist[$i];
			}else{
				break;
			}
		}
		$currentlist['type'] = "all";
	}else{
		$giftList =& $list['gift'];
		$currentlist['pages'] = ceil(count($giftList[$type])/$perpage);	
		for($i=$start;$i<$tt;$i++){
			if(!empty($giftList[$type][$i])){
				$currentlist['gift'][] = $giftList[$type][$i];
			}else{
				break;
			}
		}
		$currentlist['type'] = $type;
	}
	$currentlist['curp'] = $start/$perpage;
	unset($list);
	return $currentlist;	

}

function getGiftListById($gid){
	$list = getGiftList();
	foreach ($list['gift'] as $vals){
		if(!empty($vals)){
			foreach ($vals as $val){
				if($val['gid'] == $gid){
					return $val;
				}
			}
		}
	}
	return false;
}

function SubStrZh($str, $size) {
    if (strlen($str) > $size){ 
        for($i=0; $i < $size; $i++)  {
            if (ord($str[$i]) > 128) {
                $i=$i+1; 
            }
        }
        $str = substr($str,0,$i) . '...';
    }
    return $str;
}

?>