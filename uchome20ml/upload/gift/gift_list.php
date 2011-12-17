<?php
if(!defined('IN_UCHOME')) {
  exit('Access Denied');
}

if(!function_exists("json_encoder")){
  function json_encoder($arr){
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr)-1;
    if(($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
      $is_list = true;
      for($i=0; $i<count($keys); $i++) { //See if each key correspondes to its position
        if($i != $keys[$i]) { //A key fails at position check.
          $is_list = false; //It is an associative array.
          break;
        }
      }
    }

    foreach($arr as $key=>$value) {
      if(is_array($value)) { //Custom handling for arrays
        if($is_list) $parts[] = json_encoder($value); /* :RECURSION: */
        else $parts[] = '"' . $key . '":' . json_encoder($value); /* :RECURSION: */
      } else {
        $str = '';
        if(!$is_list) $str = '"' . $key . '":';

        //Custom handling for multiple data types
        if(is_numeric($value)) $str .= $value; //Numbers
        elseif($value === false) $str .= 'false'; //The booleans
        elseif($value === true) $str .= 'true';
        else $str .= '"' . addslashes($value) . '"'; //All other things
        // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

        $parts[] = $str;
      }
    }
    $json = implode(',',$parts);
    
    if($is_list) return '[' . $json . ']';//Return numerical JSON
    return '{' . $json . '}';//Return associative JSON 
  }
}

$type = (int)$_POST['t'];
$start = (int)$_POST['s'];

$list = getGiftListByType($type,$start,$_PERPAGE);

if(empty($list)){
  exit("err_null_rs");
} else {
  $output = '';
  $output .= json_encoder($list);
  echo $output;
}


