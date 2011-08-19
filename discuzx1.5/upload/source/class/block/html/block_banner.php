<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: block_banner.php 11474 2010-06-03 08:29:43Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once libfile('commonblock_html', 'class/block/html');

class block_banner extends commonblock_html {

	function block_banner() {}

	function name() {
		return lang('blockclass', 'blockclass_html_script_banner');
	}

	function getsetting() {
		global $_G;
		$settings = array(
			'pic' => array(
				'title' => 'banner_pic',
				'type' => 'text',
				'default' => 'http://'
			),
			'url' => array(
				'title' => 'banner_url',
				'type' => 'text',
				'default' => ''
			),
			'atarget' => array(
				'title' => 'banner_atarget',
				'type' => 'select',
				'value' => array(
					array('_blank', 'banner_atarget_blank'),
					array('_self', 'banner_atarget_self'),
					array('_top', 'banner_atarget_top'),
				),
				'default' => '_blank'
			),
			'width' => array(
				'title' => 'banner_width',
				'type' => 'text',
				'default' => '100%'
			),
			'height' => array(
				'title' => 'banner_height',
				'type' => 'text',
				'default' => ''
			),
			'text' => array(
				'title' => 'banner_text',
				'type' => 'text',
				'default' => ''
			),
		);

		return $settings;
	}

	function getdata($style, $parameter) {
		$return = '<img src="'.$parameter['pic'].'"'
			.($parameter['width'] ? ' width="'.$parameter['width'].'"' : '')
			.($parameter['height'] ? ' height="'.$parameter['height'].'"' : '')
			.($parameter['text'] ? ' alt="'.$parameter['text'].'"' : '')
			.' />';
		if($parameter['url']) {
			$target = $parameter['atarget']  ? " target=\"$parameter[atarget]\"" : '';
			$return = "<a href=\"$parameter[url]\"$target>$return</a>";
		}
		if($parameter['text']) {
			$return .= '<center><p>';
			$return .= $parameter['url'] ? "<a href=\"$parameter[url]\">$parameter[text]</a>" : $parameter['text'];
			$return .= '</p></center>';
		}
		return array('html' => $return, 'data' => null);
	}

}

?>