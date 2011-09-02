<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_cp.php 13194 2009-08-18 07:44:40Z liguode $

	User Control Panel (cp.php) FrontEnd Language Sentences

*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(

	'by'			=> '通过',//'by',//
	'tab_space'		=> ' ',//' ',
	'feed_comment_space'	=> '{actor} 在 {touser} 的留言板留了言',//'{actor} commented the {touser} space',//
	'feed_comment_image'	=> '{actor} 评论了 {touser} 的图片',//'{actor} commented the {touser} image',//
	'feed_comment_blog' 	=> '{actor} 评论了 {touser} 的日志 {blog}',//'{actor} commented the {touser} blog {blog}',//
	'feed_comment_poll' 	=> '{actor} 评论了 {touser} 的投票 {poll}',//'{actor} commented the {touser} poll {poll}',//
	'feed_comment_event'	=> '{actor} 在 {touser} 组织的活动 {event} 中留言了',//'{actor} commented the {touser} event {event}',//
	'feed_comment_share'	=> '{actor} 对 {touser} 分享的 {share} 发表了评论',//'{actor} commented the {touser} share {share}',//
	'share'			=> '分享',//'Share',//
	'share_action'		=> '分享了',//'Share _action',//
	'note_wall'		=> '在留言板上给你<a href="\\1" target="_blank">留言</a>',//'You have a new <a href="\\1" target="_blank">message</a> in your wall',//
	'note_wall_reply'	=> '回复了你的<a href="\\1" target="_blank">留言</a>',//'You have a new <a href="\\1" target="_blank">reply</a> in your wall',//
	'note_pic_comment'	=> '评论了你的<a href="\\1" target="_blank">图片</a>',//'You have a new comment on your <a href="\\1" target="_blank">image</a>',//
	'note_pic_comment_reply'	=> '回复了你的 <a href="\\1" target="_blank">图片评论</a>',//'replied on your <a href="\\1" target="_blank">image comment</a>',//
	'note_blog_comment'		=> '评论了你的日志 <a href="\\1" target="_blank">\\2</a>',//'commented your blog <a href="\\1" target="_blank">\\2</a>', //
	'note_blog_comment_reply'	=> '回复了你的<a href="\\1" target="_blank">日志评论</a>',//'replied on your blog <a href="\\1" target="_blank">comment</a>', //
	'note_poll_comment'		=> '评论了你的投票 <a href="\\1" target="_blank">\\2</a>',//'commented your poll <a href="\\1" target="_blank">\\2</a>', //
	'note_poll_comment_reply'	=> '回复了你的<a href="\\1" target="_blank">投票评论</a>',//'replied on your poll <a href="\\1" target="_blank">comment</a>', //
	'note_share_comment'		=> '评论了你的 <a href="\\1" target="_blank">分享</a>',//'commented your <a href="\\1" target="_blank">Share</a>', //
	'note_share_comment_reply'	=> '回复了你的<a href="\\1" target="_blank">分享评论</a>',//'replied on your share <a href="\\1" target="_blank">comment</a>', //
	'note_event_comment'		=> '在你组织的活动里<a href="\\1" target="_blank">留言</a>了',//'commented your event <a href="\\1" target="_blank">message</a>', //
	'note_event_comment_reply'	=> '回复了你在活动中的<a href="\\1" target="_blank">留言</a>',//'replied on your event <a href="\\1" target="_blank">comment</a>', //
	'note_show_out'			=> '访问了你的主页后,你在竞价排名榜中最后一个积分也被消费掉了',////'Visit to your home, you in the PPC final points tally was consumed up', //
	'note_space_bar'		=> '把你设置为站点推荐用户了',//'For the site you recommended users set up', //

	'note_click_blog'	=> '对你的日志 <a href="\\1" target="_blank">\\2</a> 做了表态',//'Visited your blog <a href="\\1" target="_blank">\\2</a>',//
	'note_click_thread'	=> '对你的话题 <a href="\\1" target="_blank">\\2</a> 做了表态',//'Visited your topic <a href="\\1" target="_blank">\\2</a>',//
	'note_click_pic'	=> '对你的 <a href="\\1" target="_blank">图片</a> 做了表态',//'Visited your <a href="\\1" target="_blank">image</a>',//

	'wall_pm_subject'	=> '您好,我给您留言了',////'New message on your Wall', //
	'wall_pm_message'	=> '我在您的留言板给你留言了,[url=\\1]点击这里去留言板看看吧[/url]',////'You have a new message on your Wall. [url=\\1] Click here to see the message.[/url]', //
	'note_showcredit'	=> '赠送给您 \\1 个竞价积分,帮助提升在<a href="space.php?do=top" target="_blank">竞价排行榜</a>中的名次',////'You have a gift \\1. This help to improve your position in the <a href="space.php?do=top" target="_blank">Top list</a> in the ranking.' ,//
	'feed_showcredit'	=> '{actor} 赠送给 {fusername} 竞价积分 {credit} 个，帮助好友提升在<a href="space.php?do=top" target="_blank">竞价排行榜</a>中的名次',//'{actor} presented to {fusername} Bidding Points {credit}, to help friends raise in <a href="space.php?do=top" target="_blank">Top list</a> ranking.',//
	'feed_showcredit_self'	=> '{actor} 增加竞价积分 {credit} 个，提升自己在<a href="space.php?do=top" target="_blank">竞价排行榜</a>中的名次',//'{actor} Increase the bid points {credit}, to upgrade themselves <a href="space.php?do=top" target="_blank">Top list</a> ranking.',//
	'feed_doing_title'	=> '{actor}：{message}',//'{actor} wrote doing:  {message}',//
	'note_doing_reply'	=> '在<a href="\\1" target="_blank">记录</a>中对你进行了回复',//'replied on your <a href="\\1">doing record</a>.',//
	'feed_friend_title'	=> '{actor} 和 {touser} 成为了好友',//'{actor} and {touser} become friends',//
	'note_friend_add'	=> '和你成为了好友',//'and you become friends.',//
	'note_poll_invite'	=> '邀请你一起参与 <a href="\\1" target="_blank">《\\2》</a>的\\3投票',//'invite you to join <a href="\\1" target="_blank">&laquo;\\2&raquo;</a> of \\3 poll.',//
	'reward'		=> '悬赏',//'Reward',//
	'reward_info'		=> '参与投票可获得  \\1 积分',//'vote get \\1 points.',//
	'poll_separator'	=> '"、"',//'","',//

	'feed_upload_pic'	=> '{actor} 上传了新图片',//'{actor} uploaded a new image',//

	'feed_click_blog'	=> '{actor} 送了一个“{click}”给 {touser} 的日志 {subject}',//'{actor} sent a &ldquo;{click}&rdquo; to {touser} blog {subject}',//
	'feed_click_thread'	=> '{actor} 送了一个“{click}”给 {touser} 的话题 {subject}',//'{actor} sent a &ldquo;{click}&rdquo; to {touser} topic {subject}',//
	'feed_click_pic'	=> '{actor} 送了一个“{click}”给 {touser} 的图片',//'{actor} sent a &ldquo;{click}&rdquo; to {touser} picture',//

	'friend_subject'	=> '<a href="\\2" target="_blank">\\1 请求加你为好友</a>',//'<a href="\\2" target="_blank">\\1 ask to add you as a friend.</a>',//
	'comment_friend'	=> '<a href="\\2" target="_blank">\\1 给你留言了</a>',//'<a href="\\2" target="_blank">\\1 sent a message to you.</a>',//
	'photo_comment'		=> '<a href="\\2" target="_blank">\\1 评论了你的照片</a>',//'<a href="\\2" target="_blank">\\1 commented your picture.</a>',//
	'blog_comment'		=> '<a href="\\2" target="_blank">\\1 评论了你的日志</a>',//'<a href="\\2" target="_blank">\\1 commented your blog.</a>',//
	'poll_comment'		=> '<a href="\\2" target="_blank">\\1 评论了你的投票</a>',//'<a href="\\2" target="_blank">\\1 commented your poll.</a>',//
	'share_comment'		=> '<a href="\\2" target="_blank">\\1 评论了你的分享</a>',//'<a href="\\2" target="_blank">\\1 commented your share.</a>',//
	'friend_pm'		=> '<a href="\\2" target="_blank">\\1 给你发私信了</a>',//'<a href="\\2" target="_blank">\\1 sent you a private message.</a>',//
	'poke_subject'		=> '<a href="\\2" target="_blank">\\1 向你打招呼</a>',//'<a href="\\2" target="_blank">\\1 sent greeting to you.</a>',//
	'mtag_reply'		=> '<a href="\\2" target="_blank">\\1 回复了你的话题</a>',//'<a href="\\2" target="_blank">\\1 replied to your topic.</a>',//
	'event_comment'		=> '<a href="\\2" target="_blank">\\1 评论了你的活动</a>',//'<a href="\\2" target="_blank">\\1 commented on your event.</a>',//

	'friend_pm_reply'	=> '\\1 回复了你的私信',//'\\1 replied to your private message,',//
	'comment_friend_reply'	=> '\\1 回复了你的留言',//'\\1 replied to your comment.',//
	'blog_comment_reply'	=> '\\1 回复了你的日志评论',//'\\1 replied to your blog comment.',//
	'photo_comment_reply'	=> '\\1 回复了你的照片评论',//'\\1 replied to your photo comment',//
	'poll_comment_reply'	=> '\\1 回复了你的投票评论',//'\\1 replied to your poll comment',//
	'share_comment_reply'	=> '\\1 回复了你的分享评论',//'\\1 replied to your share comment',//
	'event_comment_reply'	=> '\\1 回复了你的活动评论',//'\\1 replied to your event comment',//

	'invite_subject'	=> '\\1邀请您加入\\2，并成为TA的好友',//'\\1 invite you to join the \\2, and became his/her friend',//
	'invite_message'	=> '<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi，我是\\2，在\\3上建立了个人主页，邀请您也加入并成为我的好友</h3><br>
		请加入到我的好友中，你就可以通过我的个人主页了解我的近况，分享我的照片，随时与我保持联系<br>
		<br>
		邀请附言：<br>
		\\4
		<br><br>
		<strong>请你点击以下链接，接受好友邀请：</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>如果你拥有\\3上面的账号，请点击以下链接查看我的个人主页：</strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',

		/*'<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi, I am \\2. I have establishment of a personal home page in \\3, and inviting you to join and be my friend.</h3><br>
		Please join my friends in, you can understand my personal home page of my current situation, to share my photos, feel free to contact me.<br>
		<br>
		Invite P.S.: <br>
		\\4
		<br><br>
		<strong>please click the link below to receive Friend Invites:</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>If you have a \\3 account, please click the following link to see my personal home page:</strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',
		*/

	'app_invite_subject'	=> '\\1邀请您加入\\2，一起来玩\\3',//'\\1 invite you to join the \\2, and play together with \\3',//
	'app_invite_message'	=> '<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi，我是\\2，在\\3上玩 \\7，邀请您也加入一起玩</h3><br>
		<br>
		邀请附言：<br>
		\\4
		<br><br>
		<strong>请你点击以下链接，接受好友邀请一起玩\\7：</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>如果你拥有\\3上面的账号，请点击以下链接查看我的个人主页：</strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',

		/*'<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi, I am \\2 from \\3, playing \\7. Invite you to join together to play.</h3><br>
		<br>
		Invite PS: <br>
		\\4
		<br><br>
		<strong>please click the link below to receive friends invited to play with \\7: </strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>If you have a \\3 account, please click the following link to see my personal home page:</strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',
		*/

	'feed_mtag_add'		=> '{actor} 创建了新群组 {mtags}',//'{actor} created a new group {mtags}',//
	'note_members_grade_-9'	=> '将你从群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 请出',//'Note to you from the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>: please go out.',//
	'note_members_grade_-2'	=> '将你在群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 的成员身份修改为 待审核',//'Your status in the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> was changed to pending.',//
	'note_members_grade_-1'	=> '将你在群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 中禁言',//'Your status in the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> was changed to Read Only.',//
	'note_members_grade_0'	=> '将你在群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 的成员身份修改为 普通成员',//'Your status in the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> was changed to General Member.',//
	'note_members_grade_1'	=> '将你设为了群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 的明星成员',//'Your status in the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> was changed to Star Member.',//
	'note_members_grade_8'	=> '将你设为了群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 的副群主',//'Your status in the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> was changed to vice-Master.',//
	'note_members_grade_9'	=> '将你设为了群组 <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> 的群主',//'Your status in the group <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> was changed to Master.',//
	'feed_mtag_join'	=> '{actor} 加入了群组 {mtag} ({field})',//'{actor} joined to the group {mtag} ({field}).',//
	'mtag_joinperm_2'	=> '需邀请才可加入',//'Need to be invited to join the group.',//
	'feed_mtag_join_invite'	=> '{actor} 接受 {fromusername} 的邀请，加入了群组 {mtag} ({field})',//'{actor} accepted the {fromusername} invitation to join the group {mtag} ({field})',//
	'person'		=> '人',//'Person',//
	'delete'		=> '删除',//'delete',//

	'space_update'		=> '{actor} 被SHOW了一下',//'{actor} updated his/her space.',//

	'active_email_subject'	=> '您的邮箱激活邮件',//'Activate your E-mai address',//
	'active_email_msg'	=> '请复制下面的激活链接到浏览器进行访问，以便激活你的邮箱。<br>邮箱激活链接:<br><a href="\\1" target="_blank">\\1</a>',//'Please copy the following link to the browser address bar in order to activate your mailbox.<br>E-mail activatuion link:<br><a href="\\1" target="_blank">\\1</a>',//
	'share_space'		=> '分享了一个用户',//'Sharing a user',//
	'note_share_space'	=> '分享了你的空间',//'sharing your space',//
	'share_blog'		=> '分享了一篇日志',//'shared a blog',//
	'note_share_blog'	=> '分享了你的日志 <a href="\\1" target="_blank">\\2</a>',//'your blog shared <a href="\\1" target="_blank">\\2</a>',//
	'share_album'		=> '分享了一个相册',//'share an album',//
	'note_share_album'	=> '分享了你的相册 <a href="\\1" target="_blank">\\2</a>',//'shared your album <a href="\\1" target="_blank">\\2</a>',//
	'default_albumname'	=> '默认相册',//'Default album',//
	'share_image'		=> '分享了一张图片',//'share a picture',//
	'album'			=> '相册',//'Album',//
	'note_share_pic'	=> '分享了你的相册 \\2 中的<a href="\\1" target="_blank">图片</a>',//'shared your album \\2 in the <a href="\\1" target="_blank">picture</a>',//
	'share_thread'		=> '分享了一个话题',//'share topic',//
	'mtag'			=> '群组',//'Group',//
	'note_share_thread'	=> '分享了你的话题 <a href="\\1" target="_blank">\\2</a>',//'shared your topic <a href="\\1" target="_blank">\\2</a>',//
	'share_mtag'		=> '分享了一个群组',//'shared the group',//
	'share_mtag_membernum'	=> '现有 {membernum} 名成员',//'Existing {membernum} members',//
	'share_tag'		=> '分享了一个标签',//'share a tag',//
	'share_tag_blognum'	=> '现有 {blognum} 篇日志',//'Existing {blognum} Blog Posts',//
	'share_link'		=> '分享了一个网址',//'shared a link',//
	'share_video'		=> '分享了一个视频',//'shared a video',//
	'share_music'		=> '分享了一个音乐',//'shared a music',//
	'share_flash'		=> '分享了一个 Flash',//'shared a Flash',//
	'share_event'		=> '分享了一个活动',//'shared a event',//
	'share_poll'		=> '分享了一个\\1投票',//'share a \\1 poll',//
	'note_share_poll'	=> '分享了你的投票 <a href="\\1" target="_blank">\\2</a>',//'shared your poll <a href="\\1" target="_blank">\\2</a>',//
	'event_time'		=> '活动时间',//'Event time',//
	'event_location'	=> '活动地点',//'Event place',//
	'event_creator'		=> '发起人',//'Event creator',//
	'feed_task'		=> '{actor} 完成了有奖任务 {task}',//'{actor} completed the task with prizes {task}',//
	'feed_task_credit'	=> '{actor} 完成了有奖任务 {task}，领取了 {credit} 个奖励积分',//'{actor} completed the task with prizes {task}, to obtain a reward {credit} points',//
	'the_default_style'	=> '默认风格',//'Default Style',//
	'the_diy_style'		=> '自定义风格',//'Custom style',//
	'feed_thread'		=> '{actor} 发起了新话题',//'{actor} has started a new topic',//
	'feed_eventthread'	=> '{actor} 发起了新活动话题',//'{actor} started a new event topic',//

	'feed_thread_reply'	=> '{actor} 回复了 {touser} 的话题 {thread}',//'{actor} replied the {touser} topic {thread}',//
	'note_thread_reply'	=> '回复了你的话题',//'replied your topic',//
	'note_post_reply'	=> '在话题 <a href=\\"\\1\\" target="_blank">\\2</a> 中回复了你的<a href=\\"\\3\\" target="_blank">回帖</a>',//'In topic <a href=\\"\\1\\" target="_blank">\\2</a> replied to your <a href=\\"\\3\\" target="_blank">reply</a>',//
	'thread_edit_trail'	=> '<ins class="modify">[本话题由 \\1 于 \\2 编辑]</ins>',//'<ins class="modify">[Topic from \\1 in the \\2 was edited]</ins>',//
	'create_a_new_album'	=> '创建了新相册',//'Create a new album',//
	'not_allow_upload'	=> '您现在没有权限上传图片',//'You do not have permission to upload image',//
	'get_passwd_subject'	=> '取回密码邮件',//'Recover password by email',//
	'get_passwd_message'	=> '您只需在提交请求后的三天之内，通过点击下面的链接重置您的密码：<br />\\1<br />(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)<br />上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录了。',//'You only need to submit within three days after a request by clicking the link below to reset your password:<br />\\1<br />(If there is no link in the above form, please paste manually the link address into your browser address bar and then visit this address)<br />After the target page was open, enter your new password and submit, then you can use the new password to log in.',//
	'file_is_too_big'	=> '文件过大',//'File is too large',//
	'feed_blog_password'	=> '{actor} 发表了新加密日志 {subject}',//'{actor} published a new password protected blog {subject}',//
	'feed_blog'		=> '{actor} 发表了新日志',//'{actor} published a new blog',//
	'feed_poll'		=> '{actor} 发起了新投票',//'{actor} started a new poll',//
	'note_poll_finish'	=> '您发起的<a href="\\1" target="_blank">《\\2》</a>的投票已结束,<a href="\\1" target="_blank">去写写投票总结</a>',//'Your poll <a href="\\1" target="_blank">&laquo;\\2&raquo;</a> was finished. <a href="\\1" target="_blank">Write about the voting summary</a>',//
	'take_part_in_the_voting'	=> '{actor} 参与了 {touser} 的{reward}投票 <a href="{url}" target="_blank">{subject}</a>',//'{actor} took part in the {touser} poll and award {reward} points. The poll: <a href="{url}" target="_blank">{subject}</a>',//
	'lack_of_access_to_upload_file_size'	=> '无法获取上传文件大小',//'Can not get the uploaded file size',//
	'only_allows_upload_file_types'		=> '只允许上传jpg、jpeg、gif、png标准格式的图片',//'Only standard format images allowed to upload: jpg, jpeg, gif, png',//
	'unable_to_create_upload_directory_server'	=> '服务器无法创建上传目录',//'Can not create the upload directory at the server',//
	'inadequate_capacity_space'		=> '空间容量不足，不能上传新附件',//'Space insufficient capacity, can not upload new attachments',//
	'mobile_picture_temporary_failure'	=> '无法转移临时图片到服务器指定目录',//'Unable to transfer the temporary image to the server specified directory',//
	'ftp_upload_file_size'	=> '远程上传图片失败',//'FTP upload failed (invalid file size)',//
	'comment'		=> '评论',//'Comment',//
	'upload_a_new_picture'	=> '上传了新图片',//'uploaded a new image',//
	'upload_album'		=> '更新了相册',//'uploaded album',//
	'the_total_picture'	=> '共 \\1 张图片',//'Total \\1 images',//
	'feed_invite'		=> '{actor} 发起邀请，和 {username} 成为了好友',//'{actor} initiated the invitation, and {username} become friends',//
	'note_invite'		=> '接受了您的好友邀请',//'accepted your friend request',//
	'space_open_subject'	=> '快来打理一下您的个人主页吧',//'Come and take care of your personal home page about it',//
	'space_open_message'	=> 'hi，我今天去拜访了一下您的个人主页，发现您自己还没有打理过呢。赶快来看看吧。地址是：\\1space.php',//'Hi, today I went to see what your personal home page, find your own do not take care of anything like this. Quickly and see it. Address is: \\1space.php',//
	'feed_space_open'	=> '{actor} 开通了自己的个人主页',//'{actor} created his own personal home space',//
	
	'feed_profile_update_base'   	=> '{actor} 更新了自己的基本资料',//'{actor} updated his/her profile basic information',//
	'feed_profile_update_contact'	=> '{actor} 更新了自己的联系方式',//'{actor} updated his/her contact info',//
	'feed_profile_update_edu'    	=> '{actor} 更新了自己的教育情况',//'{actor} updated his/her educational information',//
	'feed_profile_update_work'   	=> '{actor} 更新了自己的工作信息',//'{actor} updated his/her work information',//
	'feed_profile_update_info'   	=> '{actor} 更新了自己的兴趣爱好等个人信息',//'{actor} updateed his/her hobbies and other personal information',//
	
	'apply_mtag_manager'	=> '想申请成为 <a href="\\1" target="_blank">\\2</a> 的群主，理由如下:\\3。<a href="\\1" target="_blank">(点击这里进入管理)</a>',//'want to apply to become <a href="\\1" target="_blank">\\2</a> of the group of main reasons are as follows: \\3. <a href="\\1" target="_blank">(Click here to enter management)</a>',//
	'feed_add_attachsize'	=> '{actor} 用 {credit} 个积分兑换了 {size} 附件空间，可以上传更多的图片啦(<a href="cp.php?ac=credit&op=addsize">我也来兑换</a>)',//'{actor} use {credit} points for enlarge on {size} his/her upload size, now you can upload more pictures. (<a href="cp.php?ac=credit&op=addsize">I want to extend upload size< too!/a>)',//

	'event'			=> '活动',//'Event',//
	'event_set_delete'	=> '管理员取消了您组织的活动 \\1',//'administrator canceled the activities of your event \\1',//
	'event_set_verify'	=> '管理员审核通过了您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'administrator approved your event <a href="\\1" target="_blank">\\2</a>',//
	'event_set_unverify'	=> '管理员审核没有通过您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'administrator reviewed but not approved your event <a href="\\1" target="_blank">\\2</a>',//
	'event_set_recommend'	=> '管理员推荐了您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'administrator recommended your event <a href="\\1" target="_blank">\\2</a>',//
	'event_set_unrecommend'	=> '管理员取消推荐了您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'administrator removed your event from recommended <a href="\\1" target="_blank">\\2</a>',//
	'event_set_open'	=> '管理员开启了您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'administrator has set to Open your event <a href="\\1" target="_blank">\\2</a>',//
	'event_set_close'	=> '管理员关闭了您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'administrator has set to Closed your event <a href="\\1" target="_blank">\\2</a>',//
	'event_add'		=> '{actor} 发起了新活动',//'{actor} has launched a new event',//
	'event_feed_info'	=> '<strong>{title}</strong><br/>地点：{province} {city} {location} <br/>时间：{starttime} - {endtime}',//'<strong>{title}</strong><br/>Location: {province} {city} {location} <br/>Time: {starttime} - {endtime}',//
	'event_join'		=> '{actor} 参加了 <a href="space.php?uid={uid}" target="_blank">{username}</a> 的活动 <a href="space.php?do=event&id={eventid}" target="_blank">{title}</a>',//'{actor} participated the <a href="space.php?uid={uid}" target="_blank">{username}</a> event <a href="space.php?do=event&id={eventid}" target="_blank">{title}</a>',//
	'event_join_member'	=> '参加了您组织的活动 <a href="\\1" target="_blank">\\2</a>',//'participated in the activities of your event <a href="\\1" target="_blank">\\2</a>',//
	'event_quit_member'	=> /*'out from your event <a href="\\1" target="_blank">\\2</a>',*/'退出了您组织的活动 <a href="\\1" target="_blank">\\2</a>',
	'event_join_verify'	=> /*'Apply to participate in your event <a href="\\1" target="_blank">\\2</a>, Rush to <a href="\\3" target="_blank">Review</a> it',*/'申请参加您组织的活动 <a href="\\1" target="_blank">\\2</a>，赶紧去<a href="\\3" target="_blank">审核</a>吧',
	'eventmember_set_verify'	=> /*'Your participation in the event <a href="\\1" target="_blank">\\2</a> was verified.',*/'通过了您参加活动 <a href="\\1" target="_blank">\\2</a> 的申请',
	'eventmember_unset_verify'	=> /*'Your participation in the event <a href="\\1" target="_blank">\\2</a> was set to a Pending status.',*/'把您在活动 <a href="\\1" target="_blank">\\2</a> 中的身份设为了待审核',
	'eventmember_set_admin'		=> /*'Set the event <a href="\\1" target="_blank">\\2</a> organizers',*/'把您设为了活动 <a href="\\1" target="_blank">\\2</a> 的组织者',
	'eventmember_unset_admin'	=> /*'Cancel event <a href="\\1" target="_blank">\\2</a> organizers',*/'取消了您作为活动 <a href="\\1" target="_blank">\\2</a> 的组织者身份',
	'eventmember_set_delete'	=> /*'Please get out from your event activities <a href="\\1" target="_blank">\\2</a>',*/'把您请出了活动 <a href="\\1" target="_blank">\\2</a>',
	'event_feed_share_pic_title'	=> /*'{actor} shared a new photo album to the event',*/'{actor} 共享了新照片到活动相册',
	'event_feed_share_pic_info'	=> /*'<b><a href="space.php?do=event&id={eventid}&view=pic" target="_blank">{title}</a></b><br/>Total {picnum} images',*/'<b><a href="space.php?do=event&id={eventid}&view=pic" target="_blank">{title}</a></b><br/>共 {picnum} 张照片',
	'event_accept_invite'		=> /*'accepted your invitation to participate in the event <a href="\\1" target="_blank">\\2</a> ',*/'接受您的邀请参加了活动 <a href="\\1" target="_blank">\\2</a> ',
	'event_accept_success'		=> /*'successful participation in this event, you can: <a href="\\1" target="_blank">immediate access to the event</a>',*/'成功参加该活动，您可以：<a href="\\1" target="_blank">立即访问该活动</a>',

	//Magic: source/magic/*.*
	'magicunit'		=> /*'items',*/'个',
	'magic_note_wall'	=> /*'in the wall give you a <a href="\\1" target="_blank">message</a>',*/'在留言板上给你<a href="\\1" target="_blank">留言</a>',
	'magic_call'		=> /*'In \\1 midpoint your name, <a href="\\2" target="_blank">Go to see it</a>',*/'在\\1中点了你的名，<a href="\\2" target="_blank">快去看看吧</a>',
	'magicuse_thunder_announce_title'	=> /*'<strong>{username} issued a &ldquo;Sound of Thunder&rdquo;</strong>',*/'<strong>{username} 发出了“雷鸣之声”</strong>',
	'magicuse_thunder_announce_body'	=> /*'Hello everybody, my online friends<br><a href="space.php?uid={uid}" target="_blank">Welcome to my home series doors</a>',*/'大家好，我上线啦<br><a href="space.php?uid={uid}" target="_blank">欢迎来我家串个门</a>',
	'magic_present_note'			=> /*'presented to you a magic \\1, <a href="\\2">quickly go and see</a>',*/'送给你一个道具 \\1, <a href="\\2">赶快去看看吧</a>',

	//User group will receive a prop upgrade
	'upgrade_magic_award'	=> /*'Congratulations! Your rating upgraded to \\1, and received the following magic: \\2',*/'恭喜你等级提升为 \\1，并获赠以下道具：\\2',

	//Administrator giving props to the user 
	'present_user_magics'	=> /*'You have received a gift from administrator magic: \\1',*/'您收到了管理员赠送的道具：\\1',
	'has_not_more_doodle'	=> /*'You do not have a graffiti board more.',*/'您没有涂鸦板了',

	'do_stat_login'		=> /*'Logins',*/'来访用户',
	'do_stat_register'	=> /*'New users',*/'新注册用户',
	'do_stat_invite'	=> /*'Friend invites',*/'好友邀请',
	'do_stat_appinvite'	=> /*'App Invites',*/'应用邀请',
	'do_stat_add'		=> /*'Ads',*/'信息发布',
	'do_stat_comment'	=> /*'Comments',*/'信息互动',
	'do_stat_space'		=> /*'Spaces',*/'用户互动',
//	'do_stat_login'		=> /*'Logins',//
	'do_stat_doing'		=> /*'Doings',*/'记录',
	'do_stat_blog'		=> /*'Blog',*/'日志',
	'do_stat_pic'		=> /*'Images',*/'图片',
	'do_stat_poll'		=> /*'Polls',*/'投票',
	'do_stat_event'		=> /*'Events',*/'活动',
	'do_stat_share'		=> /*'Shares',*/'分享',
	'do_stat_thread'	=> /*'Topics',*/'话题',
	'do_stat_docomment'	=> /*'doComments',*/'记录回复',
	'do_stat_blogcomment'	=> /*'Blog comments',*/'日志评论',
	'do_stat_piccomment'	=> /*'Image comments',*/'图片评论',
	'do_stat_pollcomment'	=> /*'Poll comments',*/'投票评论',
	'do_stat_pollvote'	=> /*'Poll votes',*/'参与投票',
	'do_stat_eventcomment'	=> /*'Event comments',*/'活动评论',
	'do_stat_eventjoin'	=> /*'Event joins',*/'参加活动',
	'do_stat_sharecomment'	=> /*'Share comments',*/'分享评论',
	'do_stat_post'		=> /*'Topic posts',*/'话题回帖',
	'do_stat_click'		=> /*'Clicks',*/'表态',
	'do_stat_wall'		=> /*'Wall messages',*/'留言',
	'do_stat_poke'		=> /*'Greetings',*/'打招呼'

);

