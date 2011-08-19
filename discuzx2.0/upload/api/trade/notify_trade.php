<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: notify_trade.php 22319 2011-04-29 09:40:43Z monkey $
 */

define('IN_API', true);
define('CURSCRIPT', 'api');

require '../../source/class/class_core.php';
require '../../source/function/function_forum.php';

$discuz = & discuz_core::instance();
$discuz->init();

$apitype = empty($_G['gp_attach']) || !preg_match('/^[a-z0-9]+$/i', $_G['gp_attach']) ? 'alipay' : $_G['gp_attach'];
require_once DISCUZ_ROOT.'./api/trade/api_' . $apitype . '.php';

$PHP_SELF = $_SERVER['PHP_SELF'];
$_G['siteurl'] = htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].preg_replace("/\/+(api\/trade)?\/*$/i", '', substr($PHP_SELF, 0, strrpos($PHP_SELF, '/'))).'/');

$notifydata = trade_notifycheck('trade');

if($notifydata['validator']) {

	$orderid = $notifydata['order_no'];

	if($orderid) {

		$tradelog = DB::fetch_first("SELECT * FROM ".DB::table('forum_tradelog')." WHERE orderid = '$orderid'");
		$tradelog = daddslashes($tradelog, 1);

		if($tradelog && $tradelog['status'] != STATUS_TRADE_SUCCESS && $tradelog['status'] != STATUS_REFUND_CLOSE && ($apitype == 'tenpay' || $tradelog['selleraccount'] == $_REQUEST['seller_email'])) {
			$status = $notifydata['status'];
			DB::query("UPDATE ".DB::table('forum_tradelog')." SET status = '$status', lastupdate='$_G[timestamp]', tradeno='$notifydata[trade_no]' WHERE orderid='$orderid'", 'UNBUFFERED');
			if($status != $tradelog['status']) {

				if($status == STATUS_SELLER_SEND) {

					notification_add($tradelog['sellerid'], 'goods', 'trade_seller_send', array(
						'buyerid' => $tradelog['buyerid'],
						'buyer' => $tradelog['buyer'],
						'orderid' => $orderid,
						'subject' => $tradelog['subject']
					));

				} elseif($status == STATUS_WAIT_BUYER) {

					notification_add($tradelog['buyerid'], 'goods', 'trade_buyer_confirm', array(
						'sellerid' => $tradelog['sellerid'],
						'seller' => $tradelog['seller'],
						'orderid' => $orderid,
						'subject' => $tradelog['subject']
					));

				} elseif($status == STATUS_TRADE_SUCCESS) {

					if($_G['setting']['creditstransextra'][5] != -1 && $tradelog['basecredit']) {
						$netcredit = round($tradelog['number'] * $tradelog['basecredit'] * (1 - $_G['setting']['creditstax']));
						updatemembercount($tradelog['sellerid'], array($_G['setting']['creditstransextra'][5] => $netcredit));
					} else {
						$netcredit = 0;
					}
					DB::query("UPDATE ".DB::table('forum_trade')." SET lastbuyer='$tradelog[buyer]', lastupdate='$_G[timestamp]', totalitems=totalitems+'$tradelog[number]', tradesum=tradesum+'$tradelog[price]', credittradesum=credittradesum+'$netcredit' WHERE tid='$tradelog[tid]' AND pid='$tradelog[pid]'", 'UNBUFFERED');

					updatecreditbyaction('tradefinished', $tradelog['sellerid']);
					updatecreditbyaction('tradefinished', $tradelog['buyerid']);

					notification_add($tradelog['sellerid'], 'goods', 'trade_success', array(
						'orderid' => $orderid,
						'subject' => $tradelog['subject']
					));
					notification_add($tradelog['buyerid'], 'goods', 'trade_success', array(
						'orderid' => $orderid,
						'subject' => $tradelog['subject']
					));

				} elseif($status == STATUS_REFUND_CLOSE) {

					DB::query("UPDATE ".DB::table('forum_trade')." SET amount=amount+'$tradelog[number]' WHERE tid='$tradelog[tid]' AND pid='$tradelog[pid]'", 'UNBUFFERED');
					notification_add($tradelog['sellerid'], 'goods', 'trade_fefund_success', array(
						'orderid' => $orderid,
						'subject' => $tradelog['subject']
					));
					notification_add($tradelog['buyerid'], 'goods', 'trade_fefund_success', array(
						'orderid' => $orderid,
						'subject' => $tradelog['subject']
					));
					if($_G['setting']['creditstrans'] && $tradelog['buyerid']) {
						updatemembercount($tradelog['buyerid'], array($_G['setting']['creditstrans'] => $tradelog['buyercredits']));
					}
					if($_G['setting']['creditstransextra'][5] != -1 && $tradelog['basecredit'] && $tradelog['buyerid']) {
						$credit = $tradelog['number'] * $tradelog['basecredit'];
						updatemembercount($tradelog['buyerid'], array($_G['setting']['creditstransextra'][5] => $credit));
					}

				}
			}
		}
	}

}

if($notifydata['location']) {
	dheader('location: '.$_G['siteurl'].'forum.php?mod=misc&action=paysucceed&orderid='.$orderid);
} else {
	exit($notifydata['notify']);
}

?>