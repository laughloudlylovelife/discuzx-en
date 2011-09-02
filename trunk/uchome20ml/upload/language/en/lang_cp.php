<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_cp.php 13194 2009-08-18 07:44:40Z liguode $

	User Control Panel (cp.php) FrontEnd Language Sentences

	Translated by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(

	'by'			=> 'by',//'通过',
	'tab_space'		=> ' ',//' ',
	'feed_comment_space'	=> '{actor} commented the {touser} space',//'{actor} 在 {touser} 的留言板留了言',
	'feed_comment_image'	=> '{actor} commented the {touser} image',//'{actor} 评论了 {touser} 的图片',
	'feed_comment_blog' 	=> '{actor} commented the {touser} blog {blog}',//'{actor} 评论了 {touser} 的日志 {blog}',
	'feed_comment_poll' 	=> '{actor} commented the {touser} poll {poll}',//'{actor} 评论了 {touser} 的投票 {poll}',
	'feed_comment_event'	=> '{actor} commented the {touser} event {event}',//'{actor} 在 {touser} 组织的活动 {event} 中留言了',
	'feed_comment_share'	=> '{actor} commented the {touser} share {share}',//'{actor} 对 {touser} 分享的 {share} 发表了评论',
	'share'			=> 'Share',//'分享',
	'share_action'		=> 'Share action',//'分享了',
	'note_wall'		=> 'You have a new <a href="\\1">message</a> in your wall',//'在留言板上给你<a href="\\1">留言</a>',
	'note_wall_reply'	=> 'You have a new <a href="\\1">reply</a> in your wall',//'回复了你的<a href="\\1">留言</a>',
	'note_pic_comment'	=> 'You have a new comment on your <a href="\\1">image</a>',//'评论了你的<a href="\\1">图片</a>',
	'note_pic_comment_reply'	=> 'replied on your <a href="\\1">image comment</a>',//'回复了你的 <a href="\\1">图片评论</a>',
	'note_blog_comment'		=> 'commented your blog <a href="\\1">\\2</a>', //'评论了你的日志 <a href="\\1">\\2</a>',
	'note_blog_comment_reply'	=> 'replied on your blog <a href="\\1">comment</a>', //'回复了你的<a href="\\1">日志评论</a>',
	'note_poll_comment'		=> 'commented your poll <a href="\\1">\\2</a>', //'评论了你的投票 <a href="\\1">\\2</a>',//
	'note_poll_comment_reply'	=> 'replied on your poll <a href="\\1">comment</a>', //'回复了你的<a href="\\1">投票评论</a>',//
	'note_share_comment'		=> 'commented your <a href="\\1">Share</a>', //'评论了你的 <a href="\\1">分享</a>',//
	'note_share_comment_reply'	=> 'replied on your share <a href="\\1">comment</a>', //'回复了你的<a href="\\1">分享评论</a>',//
	'note_event_comment'		=> 'commented your event <a href="\\1">message</a>', //'在你组织的活动里<a href="\\1">留言</a>了',//
	'note_event_comment_reply'	=> 'replied on your event <a href="\\1">comment</a>', //'回复了你在活动中的<a href="\\1">留言</a>',//
	'note_show_out'			=> 'Visit to your home, you in the PPC final points tally was consumed up', //'访问了你的主页后,你在竞价排名榜中最后一个积分也被消费掉了',//
	'note_space_bar'		=> 'For the site you recommended users set up', //'把你设置为站点推荐用户了',//

	'note_click_blog'	=> 'Visited your blog <a href="\\1">\\2</a>',//'对你的日志 <a href="\\1">\\2</a> 做了表态',
	'note_click_thread'	=> 'Visited your topic <a href="\\1">\\2</a>',//'对你的话题 <a href="\\1">\\2</a> 做了表态',
	'note_click_pic'	=> 'Visited your <a href="\\1">image</a>',//对你的 <a href="\\1">图片</a> 做了表态',

	'wall_pm_subject'	=> 'New message on your Wall', //'您好,我给您留言了',//
	'wall_pm_message'	=> 'You have a new message on your Wall. [url=\\1] Click here to see the message.[/url]', //'我在您的留言板给你留言了,[url=\\1]点击这里去留言板看看吧[/url]',//
	'note_showcredit'	=> 'You have a gift \\1. This help to improve your position in the <a href="space.php?do=top">Top list</a> in the ranking.' ,//'赠送给您 \\1 个竞价积分,帮助提升在<a href="space.php?do=top">竞价排行榜</a>中的名次',//
	'feed_showcredit'	=> '{actor} presented to {fusername} Bidding Points {credit}, to help friends raise in <a href="space.php?do=top">Top list</a> ranking.',//'{actor} 赠送给 {fusername} 竞价积分 {credit} 个，帮助好友提升在<a href="space.php?do=top">竞价排行榜</a>中的名次',
	'feed_showcredit_self'	=> '{actor} increased the bid points {credit}, to upgrade themselves <a href="space.php?do=top">Top list</a> ranking.',//'{actor} 增加竞价积分 {credit} 个，提升自己在<a href="space.php?do=top">竞价排行榜</a>中的名次',
	'feed_doing_title'	=> '{actor} wrote doing:  {message}',//'{actor}：{message}',
	'note_doing_reply'	=> 'replied on your <a href="\\1">doing record</a>.',//'在<a href="\\1">记录</a>中对你进行了回复',
	'feed_friend_title'	=> '{actor} and {touser} become friends',//'{actor} 和 {touser} 成为了好友',
	'note_friend_add'	=> 'and you become friends.',//'和你成为了好友',
	'note_poll_invite'	=> 'invite you to join the <a href="\\1">&laquo;\\2&raquo;</a> of the \\3 poll.',//'邀请你一起参与 <a href="\\1">《\\2》</a>的\\3投票',
	'reward'		=> 'Reward',//'悬赏',
	'reward_info'		=> 'vote get \\1 points.',//'参与投票可获得  \\1 积分',
	'poll_separator'	=> '","',//'"、"',

	'feed_upload_pic'	=> '{actor} uploaded a new image',//'{actor} 上传了新图片',

	'feed_click_blog'	=> '{actor} sent a &ldquo;{click}&rdquo; to {touser} blog {subject}',//'{actor} 送了一个“{click}”给 {touser} 的日志 {subject}',
	'feed_click_thread'	=> '{actor} sent a &ldquo;{click}&rdquo; to {touser} topic {subject}',//'{actor} 送了一个“{click}”给 {touser} 的话题 {subject}',
	'feed_click_pic'	=> '{actor} sent a &ldquo;{click}&rdquo; to {touser} picture',//'{actor} 送了一个“{click}”给 {touser} 的图片',

	'friend_subject'	=> '<a href="\\2">\\1 ask to add you as a friend.</a>',//'<a href="\\2">\\1 请求加你为好友</a>',
	'comment_friend'	=> '<a href="\\2">\\1 sent a message to you.</a>',//'<a href="\\2">\\1 给你留言了</a>',
	'photo_comment'		=> '<a href="\\2">\\1 commented your picture.</a>',//'<a href="\\2">\\1 评论了你的照片</a>',
	'blog_comment'		=> '<a href="\\2">\\1 commented your blog.</a>',//'<a href="\\2">\\1 评论了你的日志</a>',
	'poll_comment'		=> '<a href="\\2">\\1 commented your poll.</a>',//'<a href="\\2">\\1 评论了你的投票</a>',
	'share_comment'		=> '<a href="\\2">\\1 commented your share.</a>',//'<a href="\\2">\\1 评论了你的分享</a>',
	'friend_pm'		=> '<a href="\\2">\\1 sent you a private message.</a>',//'<a href="\\2">\\1 给你发私信了</a>',
	'poke_subject'		=> '<a href="\\2">\\1 sent greeting to you.</a>',//'<a href="\\2">\\1 向你打招呼</a>',
	'mtag_reply'		=> '<a href="\\2">\\1 replied to your topic.</a>',//'<a href="\\2">\\1 回复了你的话题</a>',
	'event_comment'		=> '<a href="\\2">\\1 commented on your event.</a>',//'<a href="\\2">\\1 评论了你的活动</a>',

	'friend_pm_reply'	=> '\\1 replied to your private message,',//'\\1 回复了你的私信',
	'comment_friend_reply'	=> '\\1 replied to your comment.',//'\\1 回复了你的留言',
	'blog_comment_reply'	=> '\\1 replied to your blog comment.',//'\\1 回复了你的日志评论',
	'photo_comment_reply'	=> '\\1 replied to your photo comment',//'\\1 回复了你的照片评论',
	'poll_comment_reply'	=> '\\1 replied to your poll comment',//'\\1 回复了你的投票评论',
	'share_comment_reply'	=> '\\1 replied to your share comment',//'\\1 回复了你的分享评论',
	'event_comment_reply'	=> '\\1 replied to your event comment',//'\\1 回复了你的活动评论',

	'invite_subject'	=> '\\1 invite you to join the \\2, and became his/her friend',//'\\1邀请您加入\\2，并成为TA的好友',
	'invite_message'	=> '<table border="0">
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
		/*
		'<table border="0">
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
		*/

	'app_invite_subject'	=> '\\1 invite you to join the \\2, and play together with \\3',//'\\1邀请您加入\\2，一起来玩\\3',
	'app_invite_message'	=> '<table border="0">
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
		/*
		'<table border="0">
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
		*/

	'feed_mtag_add'		=> '{actor} created a new group {mtags}',//'{actor} 创建了新群组 {mtags}',
	'note_members_grade_-9'	=> 'Note to you from the group <a href="space.php?do=mtag&tagid=\\1">\\2</a>: please go out.',//'将你从群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 请出',
	'note_members_grade_-2'	=> 'Your status in the group <a href="space.php?do=mtag&tagid=\\1">\\2</a> was changed to pending.',//'将你在群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的成员身份修改为 待审核',
	'note_members_grade_-1'	=> 'Your status in the group <a href="space.php?do=mtag&tagid=\\1">\\2</a> was changed to Read Only.',//'将你在群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 中禁言',
	'note_members_grade_0'	=> 'Your status in the group <a href="space.php?do=mtag&tagid=\\1">\\2</a> was changed to General Member.',//'将你在群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的成员身份修改为 普通成员',
	'note_members_grade_1'	=> 'Your status in the group <a href="space.php?do=mtag&tagid=\\1">\\2</a> was changed to Star Member.',//'将你设为了群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的明星成员',
	'note_members_grade_8'	=> 'Your status in the group <a href="space.php?do=mtag&tagid=\\1">\\2</a> was changed to vice-Master.',//'将你设为了群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的副群主',
	'note_members_grade_9'	=> 'Your status in the group <a href="space.php?do=mtag&tagid=\\1">\\2</a> was changed to Master.',//'将你设为了群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的群主',
	'feed_mtag_join'	=> '{actor} joined to the group {mtag} ({field}).',//'{actor} 加入了群组 {mtag} ({field})',
	'mtag_joinperm_2'	=> 'Need to be invited to join the group.',//'需邀请才可加入',
	'feed_mtag_join_invite'	=> '{actor} accepted the {fromusername} invitation to join the group {mtag} ({field})',//'{actor} 接受 {fromusername} 的邀请，加入了群组 {mtag} ({field})',
	'person'		=> 'Person',//'人',
	'delete'		=> 'delete',//'删除',

	'space_update'		=> '{actor} updated his/her space.',//'{actor} 被SHOW了一下',

	'active_email_subject'	=> 'Activate your E-mai address',//'您的邮箱激活邮件',
	'active_email_msg'	=> 'Please copy the following link to the browser address bar in order to activate your mailbox.<br>E-mail activatuion link:<br><a href="\\1">\\1</a>',//'请复制下面的激活链接到浏览器进行访问，以便激活你的邮箱。<br>邮箱激活链接:<br><a href="\\1">\\1</a>',
	'share_space'		=> 'Sharing a user',//'分享了一个用户'
	'note_share_space'	=> 'sharing your space',//'分享了你的空间',
	'share_blog'		=> 'shared a blog',//'分享了一篇日志',
	'note_share_blog'	=> 'shared your blog <a href="\\1">\\2</a>',//'分享了你的日志 <a href="\\1">\\2</a>',
	'share_album'		=> 'share an album',//'分享了一个相册',
	'note_share_album'	=> 'shared your album <a href="\\1">\\2</a>',//'分享了你的相册 <a href="\\1">\\2</a>',
	'default_albumname'	=> 'Default album',//'默认相册',
	'share_image'		=> 'share a picture',//'分享了一张图片',
	'album'			=> 'Album',//'相册',
	'note_share_pic'	=> 'shared the <a href="\\1">image</a> from your album \\2',//'分享了你的相册 \\2 中的<a href="\\1">图片</a>',
	'share_thread'		=> 'shared topic',//'分享了一个话题',
	'mtag'			=> 'Group',//'群组',
	'note_share_thread'	=> 'shared your topic <a href="\\1">\\2</a>',//'分享了你的话题 <a href="\\1">\\2</a>',
	'share_mtag'		=> 'shared the group',//'分享了一个群组',
	'share_mtag_membernum'	=> 'Existing {membernum} members',//'现有 {membernum} 名成员',
	'share_tag'		=> 'share a tag',//'分享了一个标签',
	'share_tag_blognum'	=> 'Existing {blognum} Blog Posts',//'现有 {blognum} 篇日志',
	'share_link'		=> 'shared a link',//'分享了一个网址',
	'share_video'		=> 'shared a video',//'分享了一个视频',
	'share_music'		=> 'shared a music',//'分享了一个音乐',
	'share_flash'		=> 'shared a Flash',//'分享了一个 Flash',
	'share_event'		=> 'shared a event',//'分享了一个活动',
	'share_poll'		=> 'share a \\1 poll',//'分享了一个\\1投票',
	'note_share_poll'	=> 'shared your poll <a href="\\1">\\2</a>',//'分享了你的投票 <a href="\\1">\\2</a>',
	'event_time'		=> 'Event time',//'活动时间',
	'event_location'	=> 'Event place',//'活动地点',
	'event_creator'		=> 'Event creator',//'发起人',
	'feed_task'		=> '{actor} completed the task with prizes {task}',//'{actor} 完成了有奖任务 {task}',
	'feed_task_credit'	=> '{actor} completed the task with prizes {task}, to obtain a reward {credit} points',//'{actor} 完成了有奖任务 {task}，领取了 {credit} 个奖励积分',
	'the_default_style'	=> 'Default Style',//'默认风格',
	'the_diy_style'		=> 'Custom style',//'自定义风格',
	'feed_thread'		=> '{actor} has started a new topic',//'{actor} 发起了新话题',
	'feed_eventthread'	=> '{actor} started a new event topic',//'{actor} 发起了新活动话题',

	'feed_thread_reply'	=> '{actor} replied the {touser} topic {thread}',//'{actor} 回复了 {touser} 的话题 {thread}',
	'note_thread_reply'	=> 'replied your topic',//'回复了你的话题',
	'note_post_reply'	=> 'replied to your <a href=\\"\\3\\">reply</a> in the topic <a href=\\"\\1\\">\\2</a> ',//'在话题 <a href=\\"\\1\\">\\2</a> 中回复了你的<a href=\\"\\3\\">回帖</a>',
	'thread_edit_trail'	=> '<ins class="modify">[The topic \\1 in the \\2 was edited]</ins>',//'<ins class="modify">[本话题由 \\1 于 \\2 编辑]</ins>',
	'create_a_new_album'	=> 'Create a new album',//'创建了新相册',
	'not_allow_upload'	=> 'You do not have permission to upload image',//'您现在没有权限上传图片',
	'get_passwd_subject'	=> 'Recover password by email',//'取回密码邮件',
	'get_passwd_message'	=> 'You only need to submit within three days after a request by clicking the link below to reset your password:<br />\\1<br />(If there is no link in the above form, please paste manually the link address into your browser address bar and then visit this address)<br />After the target page was open, enter your new password and submit, then you can use the new password to log in.',//'您只需在提交请求后的三天之内，通过点击下面的链接重置您的密码：<br />\\1<br />(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)<br />上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录了。',
	'file_is_too_big'	=> 'File is too large',//'文件过大',
	'feed_blog_password'	=> '{actor} published a new password protected blog {subject}',//'{actor} 发表了新加密日志 {subject}',
	'feed_blog'		=> '{actor} published a new blog',//'{actor} 发表了新日志',
	'feed_poll'		=> '{actor} started a new poll',//'{actor} 发起了新投票',
	'note_poll_finish'	=> 'Your poll <a href="\\1">&laquo;\\2&raquo;</a> was finished. <a href="\\1">Write the summary about the voting</a>',//'您发起的<a href="\\1">《\\2》</a>的投票已结束,<a href="\\1">去写写投票总结</a>',
	'take_part_in_the_voting'	=> '{actor} took part in the poll started by {touser}, and award {reward} points. The poll: <a href="{url}">{subject}</a>',//'{actor} 参与了 {touser} 的{reward}投票 <a href="{url}">{subject}</a>',
	'lack_of_access_to_upload_file_size'	=> 'Can not get the uploaded file size',//'无法获取上传文件大小',
	'only_allows_upload_file_types'		=> 'Only standard format images allowed to upload: jpg, jpeg, gif, png',//'只允许上传jpg、jpeg、gif、png标准格式的图片',
	'unable_to_create_upload_directory_server'	=> 'Can not create the upload directory at the server',//'服务器无法创建上传目录',
	'inadequate_capacity_space'		=> 'Space insufficient capacity, can not upload new attachments',//'空间容量不足，不能上传新附件',
	'mobile_picture_temporary_failure'	=> 'Unable to transfer the temporary image to the server specified directory',//'无法转移临时图片到服务器指定目录',
	'ftp_upload_file_size'	=> 'FTP upload failed (invalid file size)',//'远程上传图片失败',
	'comment'		=> 'Comment',//'评论',
	'upload_a_new_picture'	=> 'uploaded a new image',//'上传了新图片',
	'upload_album'		=> 'uploaded album',//'更新了相册',
	'the_total_picture'	=> 'Total \\1 images',//'共 \\1 张图片',
	'feed_invite'		=> '{actor} initiated the invitation, and {username} become friends',//'{actor} 发起邀请，和 {username} 成为了好友',
	'note_invite'		=> 'accepted your friend request',//'接受了您的好友邀请',
	'space_open_subject'	=> 'Come and take care of your personal home page about it',//'快来打理一下您的个人主页吧',
	'space_open_message'	=> 'Hi, today I went to see what your personal home page, find your own do not take care of anything like this. Quickly and see it. Address is: \\1space.php',//'hi，我今天去拜访了一下您的个人主页，发现您自己还没有打理过呢。赶快来看看吧。地址是：\\1space.php',
	'feed_space_open'	=> '{actor} created his own personal home space',//'{actor} 开通了自己的个人主页',
	
	'feed_profile_update_base'   	=> '{actor} updated his/her profile basic information',//'{actor} 更新了自己的基本资料',
	'feed_profile_update_contact'	=> '{actor} updated his/her contact info',//'{actor} 更新了自己的联系方式',
	'feed_profile_update_edu'    	=> '{actor} updated his/her educational information',//'{actor} 更新了自己的教育情况',
	'feed_profile_update_work'   	=> '{actor} updated his/her work information',//'{actor} 更新了自己的工作信息',
	'feed_profile_update_info'   	=> '{actor} updateed his/her hobbies and other personal information',//'{actor} 更新了自己的兴趣爱好等个人信息',
	
	'apply_mtag_manager'	=> 'want to apply to become <a href="\\1">\\2</a> of the group of main reasons are as follows: \\3. <a href="\\1"> (Click here to enter management)</a>',//'想申请成为 <a href="\\1">\\2</a> 的群主，理由如下:\\3。<a href="\\1">(点击这里进入管理)</a>',
	'feed_add_attachsize'	=> '{actor} use {credit} points for enlarge on {size} his/her upload size, now you can upload more pictures. (<a href="cp.php?ac=credit&op=addsize">I want to extend upload size< too!/a>)',//'{actor} 用 {credit} 个积分兑换了 {size} 附件空间，可以上传更多的图片啦(<a href="cp.php?ac=credit&op=addsize">我也来兑换</a>)',

	'event'			=> 'Event',//'活动',
	'event_set_delete'	=> 'administrator canceled the activities of your event \\1',//'管理员取消了您组织的活动 \\1',
	'event_set_verify'	=> 'administrator approved your event <a href="\\1">\\2</a>',//'管理员审核通过了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_unverify'	=> 'administrator reviewed but not approved your event <a href="\\1">\\2</a>',//'管理员审核没有通过您组织的活动 <a href="\\1">\\2</a>',
	'event_set_recommend'	=> 'administrator recommended your event <a href="\\1">\\2</a>',//'管理员推荐了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_unrecommend'	=> 'administrator removed your event from recommended <a href="\\1">\\2</a>',//'管理员取消推荐了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_open'	=> 'administrator has Opened your event <a href="\\1">\\2</a>',//'管理员开启了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_close'	=> 'administrator has Closed your event <a href="\\1">\\2</a>',//'管理员关闭了您组织的活动 <a href="\\1">\\2</a>',
	'event_add'		=> '{actor} has launched a new event',//'{actor} 发起了新活动',
	'event_feed_info'	=> '<strong>{title}</strong><br/>Location: {province} {city} {location} <br/>Time: {starttime} - {endtime}',//'<strong>{title}</strong><br/>地点：{province} {city} {location} <br/>时间：{starttime} - {endtime}',
	'event_join'		=> '{actor} participated the <a href="space.php?uid={uid}">{username}</a> event <a href="space.php?do=event&id={eventid}">{title}</a>',//'{actor} 参加了 <a href="space.php?uid={uid}">{username}</a> 的活动 <a href="space.php?do=event&id={eventid}">{title}</a>',
	'event_join_member'	=> 'participated in the activities of your event <a href="\\1">\\2</a>',//'参加了您组织的活动 <a href="\\1">\\2</a>',
	'event_quit_member'	=> 'out from your event <a href="\\1">\\2</a>',//'退出了您组织的活动 <a href="\\1">\\2</a>',
	'event_join_verify'	=> 'Apply to participate in your event <a href="\\1">\\2</a>, Rush to <a href="\\3">Review</a> it',//'申请参加您组织的活动 <a href="\\1">\\2</a>，赶紧去<a href="\\3">审核</a>吧',
	'eventmember_set_verify'	=> 'Your participation in the event <a href="\\1">\\2</a> was verified.',//'通过了您参加活动 <a href="\\1">\\2</a> 的申请',
	'eventmember_unset_verify'	=> 'Your participation in the event <a href="\\1">\\2</a> was set to a Pending status.',//'把您在活动 <a href="\\1">\\2</a> 中的身份设为了待审核',
	'eventmember_set_admin'		=> 'Set the event <a href="\\1">\\2</a> organizers',//'把您设为了活动 <a href="\\1">\\2</a> 的组织者',
	'eventmember_unset_admin'	=> 'Cancel event <a href="\\1">\\2</a> organizers',//'取消了您作为活动 <a href="\\1">\\2</a> 的组织者身份',
	'eventmember_set_delete'	=> 'Please get out from your event activities <a href="\\1">\\2</a>',//'把您请出了活动 <a href="\\1">\\2</a>',
	'event_feed_share_pic_title'	=>'{actor} shared a new photo album to the event',//'{actor} 共享了新照片到活动相册',
	'event_feed_share_pic_info'	=>'<b><a href="space.php?do=event&id={eventid}&view=pic">{title}</a></b><br/>Total {picnum} images',//'<b><a href="space.php?do=event&id={eventid}&view=pic">{title}</a></b><br/>共 {picnum} 张照片',
	'event_accept_invite'		=> 'accepted your invitation to participate in the event <a href="\\1">\\2</a> ',//'接受您的邀请参加了活动 <a href="\\1">\\2</a> ',
	'event_accept_success'		=> 'successful participation in this event, you can: <a href="\\1">immediatelly access to the event</a>',//'成功参加该活动，您可以：<a href="\\1">立即访问该活动</a>',

	//Magic: source/magic/*
	'magicunit'		=> 'items',//'个',
	'magic_note_wall'	=> 'give you a <a href="\\1">message</a> in the wall',//'在留言板上给你<a href="\\1">留言</a>',
	'magic_call'		=> 'In \\1 midpoint your name, <a href="\\2">Go to see it</a>',//'在\\1中点了你的名，<a href="\\2">快去看看吧</a>',
	'magicuse_thunder_announce_title'	=> '<strong>{username} issued a &ldquo;Sound of Thunder&rdquo;</strong>',//'<strong>{username} 发出了“雷鸣之声”</strong>',
	'magicuse_thunder_announce_body'	=> 'Hello everybody, my online friends<br><a href="space.php?uid={uid}">Welcome to my home series doors</a>',//'大家好，我上线啦<br><a href="space.php?uid={uid}">欢迎来我家串个门</a>',
	'magic_present_note'			=> 'presented to you a magic \\1, <a href="\\2">quickly go and see</a>',//'送给你一个道具 \\1, <a href="\\2">赶快去看看吧</a>',

	//User group will receive a prop upgrade
	'upgrade_magic_award'	=> 'Congratulations! Your level upgraded to \\1, and received the following magic: \\2',//'恭喜你等级提升为 \\1，并获赠以下道具：\\2',

	//Administrator giving props to the user 
	'present_user_magics'	=> 'You have received a gift from administrator magic: \\1',//'您收到了管理员赠送的道具：\\1',
	'has_not_more_doodle'	=> 'You do not have a graffiti board more.',//'您没有涂鸦板了',

	'do_stat_login'		=> 'Logins',//'来访用户',
	'do_stat_register'	=> 'New users',//'新注册用户',
	'do_stat_invite'	=> 'Friend invites',//'好友邀请',
	'do_stat_appinvite'	=> 'App Invites',//'应用邀请',
	'do_stat_add'		=> 'Ads',//'信息发布',
	'do_stat_comment'	=> 'Comments',//'信息互动',
	'do_stat_space'		=> 'Spaces',//'用户互动',
//	'do_stat_login'		=> 'Logins',//
	'do_stat_doing'		=> 'Doings',//'记录',
	'do_stat_blog'		=> 'Blog',//'日志',
	'do_stat_pic'		=> 'Images',//'图片',
	'do_stat_poll'		=> 'Polls',//'投票',
	'do_stat_event'		=> 'Events',//'活动',
	'do_stat_share'		=> 'Shares',//'分享',
	'do_stat_thread'	=> 'Topics',//'话题',
	'do_stat_docomment'	=> 'doComments',//'记录回复',
	'do_stat_blogcomment'	=> 'Blog comments',//'日志评论',
	'do_stat_piccomment'	=> 'Image comments',//'图片评论',
	'do_stat_pollcomment'	=> 'Poll comments',//'投票评论',
	'do_stat_pollvote'	=> 'Poll votes',//'参与投票',
	'do_stat_eventcomment'	=> 'Event comments',//'活动评论',
	'do_stat_eventjoin'	=> 'Event joins',//'参加活动',
	'do_stat_sharecomment'	=> 'Share comments',//'分享评论',
	'do_stat_post'		=> 'Topic posts',//'话题回帖',
	'do_stat_click'		=> 'Clicks',//'表态',
	'do_stat_wall'		=> 'Wall messages',//'留言',
	'do_stat_poke'		=> 'Greetings',//'打招呼'

);

