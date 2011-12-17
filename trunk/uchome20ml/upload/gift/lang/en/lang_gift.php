<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.

	$Id: lang_gift.php by Valery Votintsev $
	http://codersclub.org/discuzx/

	Gift Module Language File

NOTE from vot:	
	$_lang will appended to
	$_SGLOBAL['sourcelang'] when required
*/


if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}


$_lang = array (

//-------------------
//gift/gift_send.php

//'user_does_not_exist'			=> 'This user does not exist!',
	'choose_gift'			=> 'Please, select one gift',
	'invalid_request'		=> 'This is invalid request!',
	'message_too_long'		=> 'Message is too long, please delete some characters ',
	'gift_not_available'		=> 'This gift is not available',
	'points_not_enough'		=> 'Oops! Not enough points to use this gift, Please do some task and earn some points!',
	'gift_sent_public_msg'		=> '{actor} sent a <a href=\"gift.php\">gift</a> to ',
	'gift_sent_anonymous_msg'	=> 'Someone sent you a <a href="gift.php?do=view">gift</a>',
	'gift_sent_private_msg'		=> 'sent you <a href=\"gift.php?do=view\">gift</a>',
	'message'			=> 'Message: ',
	'gift_reply_gift'		=> 'Send back Gift',
	'gift_delivered'		=> 'This Gift has been deliver!',

//-------------------
//gift/view/index.htm

//'all'				=> 'All',
	'gifts_shop_title'	=> 'Gift Shop',
	'gifts_shop_tips'	=> 'Send a gift to your friend.<br>Express your emotion,love, blessing to your frineds<br><b>Note:</b> Price are in point, those points will deduct from your account.',
	'gifts_all'		=> 'Gift Shop',
	'gifts_my'		=> 'Received gifts',
	'gift_present'		=> 'I wanna present to : ',
	'gift_present_tips'	=> 'Note: Click the input box for select one from your friends',
	'gift_privacy'		=> 'Delivery privacy setting:',
	'gift_general'		=> 'Normal gift',
	'gift_general_info'	=> 'Every one can see',
	'gift_private'		=> 'Private gift',
	'gift_private_info'	=> 'Just you and the person who will recieve can see',
	'gift_anonymous'	=> 'Anonymous gift',
	'gift_anonymous_info'	=> 'Only gift and message can view, your name will not display',
	'gift_send'		=> 'Send Gift',

	'gift_version'		=> '<font color="#808080">&laquo;GIFTS&raquo; English Version 2.0beta</font>',
	'gift_copyright'	=> '<font color="#808080">Develope by
				<a href="http://www.cd4fun.com">Sky 4 Fun Media Inc.</a>
				&copy;2009-2019',

//-------------------
//gift/view/view.htm

	'gifts_received_title'		=> 'Received gifts',
	'gifts_received_subtitle'	=> 'Gifts sent to you fron your friends',
	'gift_someone'			=> 'Someone',
	'gift_sent_you'			=> 'sent you a gift',
	'gifts_no'			=> 'Opps you do not have recieved any gift...:-(',


//------------------
//gift/gift_model/list*.php

	'gift_categories'	=> array(
					'love'	=> 'Love',
					'bless'	=> 'Bless',
					'other'	=> 'Other',
	                                ),
	'gift_names'		=> array(
	                                ),

//	''	=> '',//'',
);
