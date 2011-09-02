<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: js.php 9055 2008-10-21 06:22:45Z liguode $
*/

@define('IN_UCHOME', TRUE);

$id = empty($_GET['id'])?0:intval($_GET['id']);
$adid = empty($_GET['adid'])?0:intval($_GET['adid']);

if($id) {
	//Block
	include_once('./data/data_block.php');
	if(!isset($_SGLOBAL['block'][$id])) {
		echo 'document.write(\'No data.\')';
		exit();
	}
	
	$updatetime = $_SGLOBAL['block'][$id];
	
	//Cache
	$cachefile = "./data/block_cache/block_$id.js";
	if($updatetime > 0 && file_exists($cachefile) && (time() - filemtime($cachefile) < $updatetime)) {
		if(@$fp = fopen($cachefile, 'r')) {
			@$content = fread($fp, filesize($cachefile));
			fclose($fp);
		} else {
			$content = 'document.writeln(\''.lang('no_data').'\')';
		}
		echo $content;
		exit();
	}
	
	//Read common data
	include('./common.php');
	
	//Display navigation links to disable foreign
	$_SCONFIG['linkguide'] = 0;
	
	//Disable caching
	$_SCONFIG['allowcache'] = 0;
	
	include template("data/blocktpl/$id");
	
	$obcontent = ob_get_contents();
	obclean();
	
	$s = array("/(\r|\n)/", "/\<div\s+class=\"pages\"\>.+?\<\/div\>/is", "/\s+(href|src)=\"(.+?)\"/ie");
	$r = array("\n", '', "js_mkurl('\\1', '\\2')");

	$content = '';
	if($obcontent) {
		$obcontent = preg_replace($s, $r, $obcontent);
		$lines = explode("\n", $obcontent);
		foreach ($lines as $line) {
			$line = addcslashes(trim($line), '/\'\\');
			$content .= "document.writeln('$line');\n";
		}
	} else {
		$content .= "document.writeln('".lang('no_data').")";
	}
	if($updatetime > 0) swritefile($cachefile, $content);
	echo $content;

} elseif ($adid) {
	//Read the Adv file
	$file = './data/adtpl/'.$adid.'.htm';
	if(@$lines = file($file)) {
		foreach ($lines as $line) {
			$line = addcslashes(trim($line), '/\'\\');
			echo "document.writeln('$line');\n";
		}
	} else {
		echo "document.writeln(".lang('no_ads').")";
	}
}

function js_mkurl($tag, $url) {
	if(!preg_match("/^(http\:\/\/|ftp\:\/\/|https\:\/\/|\/)/i", $url)) {
		$url = getsiteurl().$url;
	}
	return " {$tag}=\"$url\"";
}

