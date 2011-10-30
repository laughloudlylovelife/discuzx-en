<?php

/**+++
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_wap.php by Valery Votintsev at sources.ru
 */

$lang = array
(

	'username'	=> 'User name',//'用户名',
	'uid'		=> 'UID',
	'password'	=> 'Password',//'密码',
	'submit'	=> 'Submit',//'提交',
	'page'		=> 'Page',//'页',
	'replies'	=> 'Replies',//'回',
	'views'		=> 'Views',//'点',
	'reply'		=> 'Reply',//'回复',
	'delete'	=> 'Delete',//'删除',
	'anonymous'	=> 'Anonymous',//'匿名',
	'forum'		=> 'Forum',//'版块',
	'from'		=> 'From:',//'来自:',
	'type'		=> 'Type:',//'分类:',
	'subject'	=> 'Subject:',//'标题:',
	'message'	=> 'Message:',//'内容:',
	'home_page'	=> 'Home',//'首页',
	'last_page'	=> 'Prev.',//'上页',
	'next_page'	=> 'Next',//'下页',
	'end_page'	=> 'Last',//'尾页',
	'turn_page'	=> 'Turn',//'翻页',
	'next_thread'	=> 'Next thread',//'下一主题',
	'last_thread'	=> 'Prev. thread',//'上一主题',
	'end'		=> 'End',//'结束',
	'unread'	=> 'Unread',//'未读',
	'sub_forums'	=> 'Sub-Forums',//'子版块',
	'email'		=> 'Email',//'电子邮件',
	'more'		=> 'More',//'更多',
	'search'	=> 'Search',//'搜索',
	'digest'	=> 'Digests',//'精华',
	'reload'	=> 'Reload',//'刷新',
	'author'	=> 'Author:',//'作者:',
	'dateline'	=> 'Time:',//'时间:',
	'return'	=> 'Return',//'返回',
	'keywords'	=> 'Keywords',//'关键词',

	'not_loggedin'		=> 'Please Login',//'请登录后使用本功能',
	'wap_disabled'		=> 'WAP Disabled',//'WAP 功能未启用',
	'board_closed'		=> 'Forum Closed',//'论坛目前临时关闭',
	'undefined_action'	=> 'Undefined Action',//'未定义操作',

	'home_online'		=> 'Online:',//'在线人数:',
	'home_members'		=> 'Members',//'会员',
	'home_newpm'		=> 'New PMs',//'条新短消息',
	'home_forums'		=> 'Forums',//'论坛版块',
	'home_tools'		=> 'Tools',//'工具箱',
	'home_newthreads'	=> 'New Threads',//'查看新帖',

	'login'			=> 'Login',//'登录',
	'login_username'	=> 'UserName/UID',//'用户名/UID',
	'login_succeed'		=> '{$_G[member][username]}, Login Succeed',//'{$_G[member][username]}成功登录',
	'login_strike'		=> 'Entered wrong password 5 times. Wait 15 minutes before nest trying',//'累计5次密码错误,15分钟内不能登录',
	'login_invalid'		=> 'Invalid username or password. You have 5 attempts at most. If you do not have an account, please < a href="{$boardurl}register.php">Register</a> and try again.',//'用户名或密码有误,您共有5次尝试机会',
	'logout'		=> 'Logout',//'退出',
	'logout_succeed'	=> 'Logout succeed',//'成功退出登录',
	'security_question'	=> 'Security question',//'安全提问',
	'security_answer'	=> 'Answer',//'回答',
	'security_question_0'	=> 'No secure question',//'无安全提问',
	'security_question_1'	=> 'Mother\'s name',//'母亲的名字',
	'security_question_2'	=> 'Grandpa\'s name',//'爷爷的名字',
	'security_question_3'	=> 'Father\'s birth city',//'父亲出生的城市',
	'security_question_4'	=> 'First teacher name',//'您其中一位老师的名字',
	'security_question_5'	=> 'Your Computer model',//'您个人计算机的型号',
	'security_question_6'	=> 'Your favorite restaurant',//'您最喜欢的餐馆名称',
	'security_question_7'	=> 'Last 4 digits of driver\'s license',//'驾驶执照的最后四位数字',

	'register'		=> 'Registration',
	'register_username'	=> 'User name',//'用户名',
	'register_disable'	=> 'Registration by WAP is unavailable',//'此论坛禁止通过WAP注册',
	'register_reason'	=> 'Register Reason',//'注册原因',
	'register_ctrl'		=> 'Sorry, you can register only one account from same IP within $regctrl hours',//'对不起，您的 IP 地址在 {$_G[setting][regctrl]} 小时内只能注册一个帐号，请返回。',
	'register_flood_ctrl'	=> 'Sorry, the same IP can try only $regfloodctrl times to register in 24 hours.',//'对不起，同一 IP 地址在 24 小时内只能进行 {$_G[setting][regfloodctrl]} 次注册尝试，请返回。',
	'register_manual_verify'	=> 'Thank you for registering. Your account will be checked by Administrator, Now you will be redirected to User CP',//'非常感谢您的注册，管理员设置了人工验证新注册用户，请等待审核通过，现在将转入控制面板首页。',
	'register_succeed'		=> 'Thank you for your registering',//'非常感谢您的注册，现在将以会员身份登录论坛。',
	'activation_disable'		=> 'Activation through WAP is not allowed',//'此论坛禁止通过WAP激活',
	'register_activation_message'	=> 'UserName \"$username\" already registered. Please login and activate it.<br /><a href=\"index.php?action=login\">Login</a>',//'对不起，您输入的用户名 \"$username\" 已经存在，请登录论坛激活此帐号<br /><a href=\"forum.php?mod=index&action=login\">登录论坛</a>',

	'profile_username_duplicate'	=> 'Such UserName already exists',//'该用户名已经被注册，请返回重新填写。',
	'profile_email_duplicate'	=> 'Such Email Address already exists',//'该 Email 地址已经被注册，请返回重新填写。',
	'profile_username_illegal'	=> 'Username contain disabled characters',//'用户名包含敏感字符，请返回重新填写。',
	'profile_username_protect'	=> 'Such username is reserved by the system.',//'用户名包含被系统屏蔽的字符，请返回重新填写。',
	'profile_email_illegal'		=> 'Email is invalid',//'Email 地址无效，请返回重新填写。',
	'profile_email_domain_illegal'	=> 'Such Email domain name is disabled for use here.',//'Email 包含不可使用的邮箱域名，请返回重新填写。',

	'fav_add_succeed'		=> 'Added to Favorites Successfully',//'已成功添加到收藏夹中，请返回。',
	'fav_existence'			=> 'Tis object is allready present in your Favorites',//'您过去已经收藏过这个主题或者版块，请返回。',

	'goto_last_nonexistence'	=> 'This is the FIRST topic',//'没有比这个主题更早的主题了',
	'goto_next_nonexistence'	=> 'This is the LAST topic',//'没有比这个主题更晚的主题了',

	'forum_thread_sticky'		=> '[Sticked]',//'[顶]',
	'forum_thread_digest'		=> '[Digest]',//'[精]',
	'forum_nopermission'		=> 'You have no permissions to visit this forum',//'无权访问本版块',
	'forum_nonexistence'		=> 'Specified forum does not exist',//'指定版块不存在',
	'forum_list'			=> 'Forum List',//'帖子列表',
	'forum_sublist'			=> 'SubForum List',//'子版块列表',

	'my'			=> 'My',//'我的',
	'my_uid'		=> 'UID:',
	'my_username'		=> 'Username:',//'用户名:',
	'my_gender'		=> 'Gender:',//'性别:',
	'my_bday'		=> 'Birthday:',//'生日:',
	'my_location'		=> 'Location:',//'来自:',
	'my_bio'		=> 'About Me:',//'自我介绍:',
	'my_phone'		=> 'Phone:',//'我的手机',
	'my_favorites'		=> 'Favorites',//'我的收藏',
	'my_addfav'		=> 'Add Fav',//'设为我的收藏',
	'my_nonexistence'	=> 'The member is unavailable.',//'该用户不存在',
	'my_male'		=> 'Male',//'男',
	'my_female'		=> 'Female',//'女',
	'my_secrecy'		=> 'Secret',//'保密',
	'my_threads'		=> 'My threads',//'我的主题',
	'my_replies'		=> 'My replies',//'我的回复',
	'my_fav_thread'		=> 'Fav threads',//'我收藏的主题',
	'my_fav_forum'		=> 'Fav Forums',//'我收藏的版块',

	'thread_nopermission'	=> 'No permissions for this thread.',//'无权查看本主题',
	'thread_nonexistence'	=> 'The topic is unavailable.',//'指定主题不存在',
	'thread_replylist'	=> 'Reply list',//'回复列表',
	'thread_reply'		=> 'Reply topic:',//'回复主题:',
	'thread_quickreply'	=> 'Quick Reply',//'快速回复',
	'thread_banned'		=> 'This thread is banned',//'该帖被屏蔽',

	'post_reply'		=> 'Reply',//'回复本帖',
	'post_new'		=> 'Add thread',//'发新话题',
	'post_sm_isnull'	=> 'Error, you have to enter both title and content.',//'未填写标题或内容',
	'post_subject_toolong'	=> 'Title is too long. Max 80 characters.',//'标题超过80字节',
	'post_message_toolong'	=> 'Content is too long. Max {$maxpostsize} characters.',//'内容超过{{$_G[setting][maxpostsize]}}字节限制',
	'post_message_tooshort'	=> 'Content is too short. Min {$minpostsize} characters.',//'内容少于{{$_G[setting][minpostsize]}}字节限制',
	'post_type_isnull'	=> 'Select the topic category.',//'未选择主题分类',
	'post_flood_ctrl'	=> 'Flood control limit is {$floodctrl} sec. between postings.',//'两次发表少于{{$_G[setting][floodctrl]}}秒',
	'post_mod_succeed'	=> 'Post successfully moderated.',//'成功提交人工审核',
	'post_mod_forward'	=> 'Back to forum.',//'回到当前论坛',
	'post_thread_closed'	=> 'The topic is closed.',//'本主题已关闭',
	'post_thread_closed_by_dateline'	=> 'Topic was created {$_G[forum][autoclose]} days ago<br />and has been automatically closed.',//'本主题发布于{$_G[forum][autoclose]}天前<br />已被自动关闭',
	'post_thread_closed_by_lastpost'	=> 'Last topic reply published {$_G[forum][autoclose]} days ago.<br />Topic has been automatically closed.',//'本主题最后回复于{$_G[forum][autoclose]}天前<br />已被自动关闭',
	'post_newbie_span'			=> 'You can post new topics only after {$newbiespan} hours after registration.',//'注册{{$_G[setting][newbiespan]}}小时后才可发帖',
	'post_hide_nopermission'		=> 'You have no permissions to use [hide] tag.',//'无权使用[hide]代码',
	'post_newthread_nopermission'		=> 'You have no permissions to create topics in this forum.',//'无权在本论坛发新话题',
	'post_newthread_succeed'		=> 'Thread created successfully.<br /><a href=\"index.php?action=forum&amp;fid=$fid\">Return to forum</a>',//'主题发表成功<br /><a href=\"forum.php?mod=index&action=forum&amp;fid=$_G[fid]\">返回论坛</a>',
	'post_newthread_forward'	=> 'View Threads',//'查看主题',
	'post_newreply_nopermission'	=> 'You have no permissions to reply in this forum.',//'无权在本论坛发表回复',
	'post_newreply_succeed'		=> 'Thread replied successfully.<br /><a href=\"index.php?action=forum&amp;fid=$fid\">Return to forum</a>',//'主题回复成功<br /><a href=\"forum.php?mod=index&action=forum&amp;fid=$_G[fid]\">返回论坛</a>',
	'post_newreply_forward'		=> 'View Replies',//'查看回复',

	'message_banned'		=> 'Note: <em>The author has been banned or deleted.</em>',//'提示: <em>作者被禁止或删除 内容自动屏蔽</em>',
	'message_single_banned'		=> 'Note: <em>Thread has been banned by manager</em>',//'提示: <em>该帖被管理员或版主屏蔽</em>',
	'admin_message_banned'		=> 'Note: <em>The author has been deleted or banned.</em>',//'提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员可见</em>',
	'admin_message_single_banned'	=> 'Note: <em>Thread has been banned by manager.</em>',//'提示: <em>该帖被管理员或版主屏蔽，只有管理员可见</em>',

	'profile_username_toolang'	=> 'Username is too long. Max is 15 characters.',//'对不起，您的用户名超过 15 个字符，请返回输入一个较短的用户名。',
	'profile_username_tooshort'	=> 'Username is too short. Min is 3 characters.',//'对不起，您输入的用户名小于3个字符, 请返回输入一个较长的用户名。',
	'profile_passwd_notmatch'	=> 'The password confirmation is incorrect.',//'两次输入的密码不一致，请返回检查后重试。',

	'profile_passwd_illegal'	=> 'Password is empty or contains illegal characters.',//'密码空或包含非法字符，请返回重新填写。',
	'profile_email_verify'		=> 'The confirmation email was sent successfully. If you can not receive this email, click the "re-verify Email" in your Control Panel, or try to enter another address. Note: Before the activation completed, you can only view the forum, and you can not make postings. After the activation is completed, this limitation will be automatically canceled.',//'确认 Email 已经发送，请用邮件中提供的方法激活您的帐号。如果您没有收到我们发送的系统邮件，请点击控制面板首页中的“重新验证 Email 有效性”，或尝试更换另外一个地址。注意：在完成激活之前，根据管理员设置，您将只能以等验证会员的身份访问论坛，您可能不能进行发帖等操作。激活成功后，上述限制将自动取消。',

	'pm'			=> 'Private Message',//'短消息',
	'pm_home'		=> 'Message Center',//'短消息首页',
	'pm_list'		=> 'Message List',//'短消息列表',
	'pm_unread'		=> 'Unread',//'未读消息',
	'pm_all'		=> 'All',//'全部消息',
	'pm_send'		=> 'Send PM',//'发送短消息',
	'pm_to'			=> 'To',//'收信人',
	'pm_delete_all'		=> 'Delete all read Messages',//'删除已读短信',
	'pm_flood_ctrl'		=> 'Flood control: {$floodctrl} sec. between two PM',//'两次发表少于{{$_G[setting][floodctrl]}}秒',
	'pm_delete_confirm'	=> 'Confirm to delete all read Messages?',//'确认删除所有已读短信',

	'pm_sm_isnull'		=> 'Enter the message subject!',//'未填写标题或内容',
	'pm_nonexistence'	=> 'Such message does not exist',//'短消息不存在',
	'pm_send_nonexistence'	=> 'Recipient does not exist',//'收信人不存在',
	'pm_send_ignore'	=> 'Recipient rejected provate message',//'收件人拒收短消息',
	'pm_send_succeed'	=> 'Message sent successfully',//'短消息成功发送',
	'pm_delete_succeed'	=> 'Messages deleted successfully',//'短消息成功删除',

	'return_thread'		=> 'Return to Thread',//'返回主题',
	'return_forum'		=> 'Return to forum',//'返回版块',

	'stats'			=> 'Forum statistics',//'论坛统计',
	'stats_threads'		=> 'Threads',//'主题数',
	'stats_posts'		=> 'Posts',//'帖子数',
	'stats_members'		=> 'Members',//'会员数',

	'search'			=> 'Search',//'论坛搜索',
	'search_result'			=> 'Search Results',//'搜索结果',
	'search_invalid'		=> 'You have to specify keyword or username',//'您没有指定要搜索的关键字或用户名，请返回重新填写。',
	'search_ctrl'			=> 'Flood control: You can search only one time in $searchctrl sec.',//'对不起，您在 {$_G[setting][searchctrl]} 秒内只能进行一次搜索，请返回。',
	'search_id_invalid'		=> 'No relevant matches was found.',//'您指定的搜索不存在或已过期，请返回。',
	'search_group_nopermission'	=> 'Your user group have no permissions to make search',//'您所在的用户组没有搜索权限，请返回',

	'goto'				=> 'WAP Jump',//'WAP跳转',
	'wap_submit_invalid'		=> 'Some parameters invalid',//'验证信息不正确',
	'post_hide_reply_hidden'	=> 'Hidden',//'本内容隐藏',
	'register_invite'		=> 'Registering by invitation enabled only through main WWW interface.',//'论坛开启邀请码注册，请通过WWW方式注册',

	'message_ishidden_hiddenreplies'	=> 'This post visible to author only',//'此帖仅作者可见',

);
