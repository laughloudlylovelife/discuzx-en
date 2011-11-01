<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_sources.php $

	Common FrontEnd Language Sentences

	Written by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_lang = array (
// common
	'mtags'		=> 'Groups',//'群组',
	'group'		=> 'Group',//'群组',
	'groups'	=> 'Groups',//'群组',
	'events'	=> 'Events',//'活动',
	'friend_group_0' => 'Others',//'其他',
	'friend_group_8' => 'My friends Yet Unknown',//'不认识',
	'friend_group_9' => 'My Family',//'不认识',
	'wall_board'	=> 'Wall board',//'留言板'
	'share_notices'	=> 'Share notices',//'分享通知',
	'units'		=> 'unit(s)',//'个',
	'points'	=> 'Points',//'积分',
	'points_num'	=> 'points',//'个积分',

//js.php
	'no_data' => 'No data.',//'No data.',
	'no_ads' => 'No Ads.',//'No Ads.',

//data/data_task.php

//editor.php

	'wisiwyg' => 'WISIWYG',//'切换到多媒体',
	'cut' => 'Cut',//'剪切',
//'' => 'Copy',//'复制',
	'paste' => 'Paste',//'粘贴',
	'font' => 'Font',//'字体',
	'font_size' => 'Font size',//'字号',
	'bold' => 'Bold',//'加粗',
	'italic' => 'Italic',//'斜体',
	'underline' => 'Underline',//'下划线',
	'font_color' => 'Font color',//'字体颜色',
	'align' => 'Align',//'对齐',
	'list' => 'List',//'编号',
	'indent' => 'Indent',//'缩进',
	'link_add' => 'Link',//'超链接',
	'link_del' => 'Remove link',//'移除链接',
	'image_link' => 'Image URL',//'引用图片',
	'flash_link' => 'FLASH video URL',//'引用视频FLASH',
//'emoticons' => 'Emoticons',//'插入表情',
	'graffiti' => 'Graffiti',//'涂鸦',
	'content_restore' => 'Restore content',//'恢复内容',
	'plain_text' => 'Plain text',//'切换到纯文本',
//	'times_new_roman' => 'Times New Roman',//'宋体',
//	'' => 'Bold???',//'黑体',
//	'' => 'Italic_GB2312',//'楷体_GB2312',
//	'' => 'Official script',//'隶书',
//	'' => 'Fine round',//'幼圆',
	'xx_small' => 'xx-Small',//'极小',
	'x_small' => 'x-Small',//'特小',
	'small' => 'Small',//'小',
	'medium' => 'Medium',//'中',
	'large' => 'Large',//'大',
	'list_numbered' => 'Numbered list',//'数字列表',
	'list_symbolic' => 'Symbol list',//'符号列表',
	'align_left' => 'Left-aligned',//'左对齐',
	'align_center' => 'Centered',//'居中对齐',
	'align_right' => 'Right-aligned',//'右对齐',
	'indent_add' => 'Add indent',//'增加缩进',
	'indent_del' => 'Outdent',//'减少缩进',
	'dark_red' => 'Dark red',//'暗红色',
	'purple' => 'Purple',//'紫色',
	'red' => 'Red',//'红色',
	'bright_pink' => 'Bright pink',//'鲜粉色',
	'dark_blue' => 'Dark blue',//'深蓝色',
	'blue' => 'Blue',//'蓝色',
	'lake_blue' => 'Lake Blue',//'湖蓝色',
	'blue_green' => 'Cyan',//'蓝绿色',
	'green' => 'Green',//'绿色',
	'olive' => 'Olive',//'橄榄色',
	'light_green' => 'Light green',//'浅绿色',
	'orange' => 'Orange',//'橙黄色',
	'black' => 'Black',//'黑色',
	'gray' => 'Gray',//'灰色',
	'silver' => 'Silver',//'银色',
	'white' => 'White',//'白色',
	'enter_link' => 'Please enter the link address for the selected text',//'请输入选定文字链接地址',
//'form_sure_yes' => '',//'确定',
	'enter_image_url' => 'Please enter the image URL',//'请输入图片URL地址',
	'enter_video_url' => 'Please enter the video type and URL',//'请输入视频URL地址',
	'flash_animation' => 'Flash animation',//'Flash动画',
	'media_video' => 'Media Video',//'Media视频',
	'real_video' => 'Real Video',//'Real视频',


//---- SOURCE -------------------------------------------
//source/task/avatar.php

	// This line is for lang_showmessage.php:
	'uc_update_avatar'	=> 'This feature requires that your UCenter at Server side avatar.php need to be updated.<br> If you are the site administrator, please download the following address avatar.php file compression package, and cover your UCenter document root directory of the same name can be.<br><a href="http://u.discuz.net/download/avatar.zip"> http://u.discuz.net/download/avatar.zip</a>',//'????????UCenter?Server?? avatar.php ????????.<br>?????????,?????????? avatar.php ??????,?????UCenter???????????.<br><a href="http://u.discuz.net/download/avatar.zip">http://u.discuz.net/download/avatar.zip</a>'.//

	
	'male' => 'Male',//'帅哥',
	'female' => 'Female',//'美女',
	'find' => 'Find',//'找到',
	'recommended_to_you' => 'friend recommended to you:',//'朋友,推荐给您:',
	'avatar_task_wizard' => 'Please follow the instructions to participate in this task:
		<ul>
		<li> 1. <a href="cp.php?ac=avatar" target="_blank">open in a new window the individual picture settings page</a>;</li>
		<li> 2. In setting the new page opens, select your photo to upload and edit it.</li>
		</ul>',
/*
	'avatar_task_wizard' => '请按照以下的说明来参与本任务: 
		<ul>
		<li>1. <a href="cp.php?ac=avatar" target="_blank">新窗口打开个人头像设置页面</a>；</li>
		<li>2. 在新打开的设置页面中,请选择您的照片进行上传编辑.</li>
		</ul>',
*/


//source/task/blog.php

	'blog_task_wizard' => '<strong>Please follow the instructions to participate in this task:</strong>
		<ul>
		<li>1. <a href="cp.php?ac=blog" target="_blank">open the blog page in a new window</a>;</li>
		<li>2. In opened page, write your first post, and publish it.</li>
		</ul>',
/*
			'<strong>请按照以下的说明来参与本任务: </strong>
		<ul>
		<li>1. <a href="cp.php?ac=blog" target="_blank">新窗口打开发表日志页面</a>；</li>
		<li>2. 在新打开的页面中,书写自己的第一篇日志,并进行发布.</li>
		</ul>',
*/

//source/task/email.php

	'email_task_wizard' => '<strong>Please follow the instructions to participate in this task:</strong>
		<ul>
		<li><a href="cp.php?ac=profile&op=contact" target="_blank">open the Account Settings page in a new window</a>;</li>
		<li>in a new page, fill your mailbox with real email, and click "Verify Email" button;</li>
		<li>few minutes later, the system will send you an e-mail, receive e-mail, follow the mailing instructions, visit the message can be a verification link.</li>
		</ul>',
/*
	'email_task_wizard' => '<strong>请按照以下的说明来参与本任务: </strong>
		<ul>
		<li><a href="cp.php?ac=profile&op=contact" target="_blank">新窗口打开账号设置页面</a>；</li>
		<li>在新打开的设置页面中,将自己的邮箱真实填写,并点击&ldquo;验证邮箱&rdquo;按钮；</li>
		<li>几分钟后,系统会给你发送一封邮件,收到邮件后,请按照邮件的说明,访问邮件中的验证链接就可以了.</li>
		</ul>',
*/

//source/task/email.php

	'friend_task_wizard' => '<strong>Please follow the instructions to participate in this task:</strong>
		<ul>
		<li>1. <a href="cp.php?ac=friend&op=find" target="_blank">Open the find friends page in a new window</a>;</li>
		<li>2. In the new page opened, you can automatically recommend you find the user to add them as friends, and you can also set your own conditions find and add friends;</li>
		<li>3. Next, you need to wait for the approval from your friends for each other.</li>
		</ul>',
/*
	'friend_task_wizard' => '<strong>请按照以下的说明来参与本任务: </strong>
		<ul>
		<li>1. <a href="cp.php?ac=friend&op=find" target="_blank">新窗口打开寻找好友页面</a>；</li>
		<li>2. 在新打开的页面中,可以将系统自动给你找到的推荐用户加为好友,也可以自己设置条件寻找并添加为好友；</li>
		<li>3. 接下来,您还需要等待对方批准您的好友申请.</li>
		</ul>',
*/


//source/task/gift.php

	'gift_task_result' => '<p>We prepare for you a "Hot Blogs Rewiew", take a look at it:</p><br><ul class="line_list">',
/*
	'gift_task_result' => '<p>给您送上一份《热门日志导读》看看吧: </p><br><ul class="line_list">',
*/
	'hot_value' => 'Hot',//'人推荐',
//	'hot' => 'Hot',//'热', //vot: is THE SAME MEANING!!!

//source/task/invite.php

	'invite_task_warn1' => '<p style="color:red;">Wow, powerful, you are now invited ',//'<p style="color:red;">哇,厉害,您现在已经邀请了 ',
	'invite_task_warn2' => ' friends. Continue to work!</p><br>',//' 个好友了.继续努力！</p><br>',
	'invite_task_guide' => '<strong>Please follow the instructions to complete this task:</strong>
		<ul class="task">
		<li>Open in a new window <a href="cp.php?ac=invite" target="_blank">friends invite page</a>;</li>
		<li>Through ICQ, MSN and other IM tools, send messages, links to tell your friends to invite, invite them to join;</li>
		<li>You need to invite 10 friends to complete the task.</li>
		</ul>',
/*
	'invite_task_guide' => '<strong>请按照以下的说明来完成本任务: </strong>
		<ul class="task">
		<li>在新窗口中打开<a href="cp.php?ac=invite" target="_blank">好友邀请页面</a>；</li>
		<li>通过QQ,MSN等IM工具,或者发送邮件,把邀请链接告诉你的好友,邀请他们加入进来吧；</li>
		<li>您需要邀请10个好友才算完成.</li>
		</ul>',
*/


//source/task/profile.php

	'birthyear' => 'Birth Year',//'生日(年)',
	'birthmonth' => 'Birth Month',//'生日(月)',
	'birth_day' => 'Birth Day',//'生日(日)',
	'marry' => 'Marriage status',//'婚恋状态',
	'birthprovince' => 'Birth Place (Province)',//'家乡(省)',
	'birthcity' => 'Birth City',//'家乡(市)',
	'resideprovince' => 'Place of residence (province)',//'居住地(省)',
	'residecity' => 'Place of residence (city)',//'居住地(市)',
	'profile_reside_result' => '<p>For you to find members of the same city, quickly added it to friends: </p>',//'<p>为您找到同城的会员,赶快加为好友吧: </p>',
	'profile_gender_result' => '<p>Popular member of the opposite sex for you to find, quickly added it to friends: </p>',//'<p>为您找到异性热门会员,赶快加为好友吧: </p>',
	'profile_task_wizard' => '<strong>You have to add the following items of personal data complete:</strong><br>
		<span style="color:red;">\\1</span><br><br>
		<strong>Please follow the instructions to complete this task:</strong>
		<ul>
		<li><a href="cp.php?ac=profile" target="_blank">Open personal info settings page in a new window</a>;</li>
		<li>In opened new page, add the above personal data integrity.</li>
		</ul>',
/*
	'profile_task_wizard' => '<strong>您还有以下个人资料项需要补充完整: </strong><br>
		<span style="color:red;">\\1</span><br><br>
		<strong>请按照以下的说明来完成本任务: </strong>
		<ul>
		<li><a href="cp.php?ac=profile" target="_blank">新窗口打开个人资料设置页面</a>；</li>
		<li>在新打开的设置页面中,将上述个人资料补充完整.</li>
		</ul>',
*/

);

