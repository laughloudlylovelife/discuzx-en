<?php
//		English by Valery Votintsev at sources.ru
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include loadarchiver('common/header');
?>
<div id="nav">
	<a href="forum.php?archiver=1"><?php echo $_G['setting']['navs']['2']['navname']; ?></a> &rsaquo; <a href="forum.php?mod=forumdisplay&fid=<?php echo $_G['fid']; ?>&archiver=1"><?php echo $_G['forum']['name']; ?></a> &rsaquo; <?php echo $_G['forum_thread']['subject']; ?>
</div>

<div id="content">
	<?php foreach($postlist as $post): ?>
	<?php if($hiddenreplies && !$post['first']) break; ?>
	<p class="author">
		<?php if(!$post['anonymous']): ?>
			<strong><?php echo $post['author']; ?></strong>
		<?php else: ?>
<!--vot-->	<strong><i><?php echo lang('forum/archiver', 'anonymous'); ?></i></strong>
		<?php endif; ?>
		<?php echo lang('forum/archiver', 'post_time') . ' ' . $post['dateline']; ?>
	</p>
	<h3><?php echo $post['subject']; ?></h3>
	<?php if($_G['forum_threadpay']): include template('forum/viewthread_pay'); else: ?>
		<?php echo archivermessage($post['message']); ?>
	<?php endif; ?>
	<?php endforeach; ?>
	<div class="page">
		<?php echo arch_multi($_G['forum_thread']['replies'] + 1, $_G['ppp'], $page, "forum.php?mod=viewthread&tid={$_G['tid']}&archiver=1"); ?>
	</div>
</div>

<div id="footer">
	<?php echo lang('forum/archiver', 'full_version'); ?>:
	<a href="forum.php?mod=viewthread&tid=<?php echo $_G['tid']; ?>&page=<?php echo $page; ?>" target="_blank"><strong><?php echo $_G['forum_thread']['subject']; ?></strong></a>
</div>
<?php include loadarchiver('common/footer');

function archivermessage($message) {
	return nl2br(preg_replace(array('/&amp;(#\d{3,5};)/', "/\[hide=?\d*\](.+?)\[\/hide\]/is"),
		array('&\\1', '<b>**** Hidden Message *****</b>'),
		str_replace(array('&', '"', '<', '>', "\t", '   ', '  '),
		array('&amp;', '&quot;', '&lt;', '&gt;', '&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;'),
		$message)));
}

?>