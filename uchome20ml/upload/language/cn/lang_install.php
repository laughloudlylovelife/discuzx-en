<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_admin.php 2010-05-10 04:35:11 by vot AT sources.ru $

	AdminCP Templates Language Sentences

	written by Valery Votintsev, aka "vot" [at] sources.ru

*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['sourcelang'] = array (

'submit' => '提交',

'rename_config' => '您需要首先将程序根目录下面的 "config.new.php" 文件重命名为 "config.php"',

'upload_sql' => '请上传最新的 install/install.sql 数据库结构文件到程序的 ./install 目录下面，再重新运行本程序',

'allready_installed' => '警告!您已经安装过UCenter Home<br>
	为了保证数据安全，请立即手动删除 install/index.php 文件<br>
	如果您想重新安装UCenter Home，请删除 data/install.lock 文件，并到UCenter后台应用管理处删除该应用，再运行安装文件',

'config_nonwritable' => '文件 $configfile 读写权限设置错误，请设置为可写，再执行安装程序',

'ucenter_url_invalid' => 'UCenter的URL地址不正确',

'uc_client_not_found' => 'uc_client目录不存在，请上传安装包中的 ./upload/uc_client 到程序根目录',

'uc_error' => '<strong>UCenter无法正常连接，返回错误</strong>',
'uc_error_intro' => '<strong>请确认UCenter的IP地址是否正确</strong><br><br>',

'uc_ip' => 'UCenter服务器的IP地址',

'uc_ip_comment' => '例如：192.168.0.1',

'uc_ip_confirm' => '确认IP地址',

'charset_different' => 'UCenter 服务端字符集与当前应用的字符集不同，请下载 the same 编码的 UCenter Home 进行安装，下载地址：http://download.comsenz.com/',

'uch_allready_installed' => '已经安装过一个UCenter Home产品，如果想继续安装，请先到 UCenter 应用管理中删除已有的UCenter Home！',

//----------------------------------
'blog_title'	=> 'Blog title',
'user_id'	=> 'User ID',
'user_name'	=> 'User name',
'date'		=> 'Date',
'space_address'	=> 'Space address',
'blog_address'	=> 'Blog address',
'personal_home'	=> 'Personal home',
//----------------------------------

'uc_cannot_connect' => 'UCenter用户中心无法连接',

'uc_admin_password_incorrect' => 'UCenter管理员帐号密码不正确',

'uc_problem' => 'UCenter返回的数据出现问题，请参考:',

'uchome_registered' => 'UCenter注册成功！当前程序ID标识为',

'go_next_step' => '进入下一步',

'prefix_empty' => '填写的表名前缀不能为空',

'db_params_invalid' => '数据库连接信息填写错误，请确认',

'db_cannot_create' => '设定的UCenter Home数据库无权限操作，请先手工操作后，再执行安装程序',

'db_not_empty' => '危险!指定的UCenter Home数据库已有数据，如果继续将会清空原有数据!',

'db_set_ok' => '数据库配置成功，进入下一步操作',

'password_invalid' => '输入的用户名密码不正确，请确认',

'username_invalid' => '输入的用户名无法注册，请重新确认',

'uch_installed_ok' => '<font color="red">恭喜! UCenter Home安装全部完成!</font>
		<br>
		为了您的数据安全，请登录ftp，删除install目录
		<br><br>
		您的管理员身份已经成功确认，并已经开通空间。接下来，您可以：
		<br>
		<br><a href="../space.php" target="_blank">进入我的空间</a>
		<br>进入我的主页，开始UCenter Home之旅
		<br><a href="../admincp.php" target="_blank">进入管理平台</a>
		<br>以管理员身份对站点参数进行设置',

'failed' => '失败',

'ok' => 'OK',

'welcome' => '<strong>欢迎您使用UCenter Home</strong><br>
	通过 UCenter Home，作为建站者的您，可以轻松构建一个以好友关系为核心的交流网络，让站点用户可以用一句话记录生活中的点点滴滴；方便快捷地发布日志、上传图片；更可以十分方便的与其好友们一起分享信息、讨论感兴趣的话题；轻松快捷的了解好友最新动态。
	<br><a href="javascript:;" onclick="readme()"><strong>请先认真阅读我们的软件使用授权协议</strong></a>',

'file_permissions' => '<strong>文件/目录权限设置</strong>
	<br>
	在您执行安装文件进行安装之前，先要设置相关的目录属性，以便数据文件可以被程序正确读/写/删/创建子目录。
	<br>
	推荐您这样做：
	<br>
	使用 FTP 软件登录您的服务器，将服务器上以下目录、以及该目录下面的所有文件的属性设置为777，win主机请设置internet来宾帐户可读写属性
	<br>',

'name' => '名称',

'required_permission' => '所需权限属性',

'description' => '说明',

'test_result' => '检测结果',

'r/w' => '读/写',

'system_config' => '系统配置文件',

'include_subdirs' => '包括本目录、子目录和文件',

'r/w/d' => '读/写/删',

'attach_dir' => '附件目录',

'data_dir' => '站点数据目录',

'uc_client_dir' => 'uc_client数据目录',

'permission_problem' => '<b>出现问题</b>:
	<br>系统检测到以上目录或文件权限没有正确设置
	<br>强烈建议正常设置权限后再刷新本页面以便继续安装
	<br>否则系统可能会出现无法预料的问题',

'force_continue' => '强制继续',

'accept_license' => '接受授权协议，开始安装UCenter Home',

'read_license' => '<strong>请您务必仔细阅读下面的许可协议:</strong>',

'license' => '<div>中文版授权协议 适用于中文用户
	<p>版权所有 (C) 2001-2009，康盛创想（北京）科技有限公司<br>保留所有权利。
	</p>
	<p>感谢您选择 UCenter Home。希望我们的努力能为您提供一个强大的社会化网络(SNS)解决方案。通过 UCenter Home，建站者可以轻松构建一个以好友关系为核心的交流网络，让站点用户可以用一句话记录生活中的点点滴滴；方便快捷地发布日志、上传图片；更可以十分方便的与其好友们一起分享信息、讨论感兴趣的话题；轻松快捷的了解好友最新动态。
	</p>
	<p>康盛创想（北京）科技有限公司为 UCenter Home 产品的开发商，依法独立拥有 UCenter Home 产品著作权（中国国家版权局 著作权登记号 2006SR12091）。康盛创想（北京）科技有限公司网址为
	http://www.comsenz.com，UCenter Home 官方网站网址为 http://u.discuz.net。
	</p>
	<p>UCenter Home 著作权已在中华人民共和国国家版权局注册，著作权受到法律和国际公约保护。使用者：无论个人或组织、盈利与否、用途如何
	（包括以学习和研究为目的），均需仔细阅读本协议，在理解、同意、并遵守本协议的全部条款后，方可开始使用 UCenter Home 软件。
	</p>
	<p>康盛创想（北京）科技有限公司拥有对本授权协议的最终解释权。
	<ul type=i>
	<p>
	<li><b>协议许可的权利</b>
	<ul type=1>
	<li>您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。
	<li>您可以在协议规定的约束和限制范围内修改 UCenter Home 源代码(如果被提供的话)或界面风格以适应您的网站要求。
	<li>您拥有使用本软件构建的站点中全部会员资料、文章及相关信息的所有权，并独立承担与文章内容的相关法律义务。
	<li>获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持期限、技术支持方式和技术支持内容，
	自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见
	将被作为首要考虑，但没有一定被采纳的承诺或保证。 </li>
	</ul>
	<p></p>
	<li><b>协议规定的约束和限制</b>
	<ul type=1>
	<li>未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目或实现盈利的网站）。购买商业授权请登陆http://www.discuz.com参考相关说明，也可以致电8610-51657885了解详情。
	<li>不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。
	<li>无论如何，即无论用途如何、是否经过修改或美化、修改程度如何，只要使用 UCenter Home 的整体或任何部分，未经书面许可，程序页面页脚处
	的 UCenter Home 名称和康盛创想（北京）科技有限公司下属网站（http://www.comsenz.com、http://u.discuz.net） 的 链接都必须保留，而不能清除或修改。
	<li>禁止在 UCenter Home 的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。
	<li>如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。 
	</li>
	</ul>
	<p></p>
	<li><b>有限担保和免责声明</b>
	  <ul type=1>
	  <li>本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。
	  <li>用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺提供任何形式的技术支持、使用担保，
	  也不承担任何因使用本软件而产生问题的相关责任。
	  <li>康盛创想（北京）科技有限公司不对使用本软件构建的站点中的文章或信息承担责任。 
	  </li>
	</ul>
	</li>
	</ul>
	<p>
	有关 UCenter Home 最终用户授权协议、商业授权与技术服务的详细内容，均由 UCenter Home 官方网站独家提供。康盛创想（北京）科技有限公司拥有在不 事先通知的情况下，修改授权协议和服务价目表的权力，修改后的协议或价目表对自改变之日起的新授权用户生效。
	<p>
	电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始安装 UCenter Home，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。 
	</p>
    </div>',

'get_uc_auto' => '<strong># UCenter 参数自动获取</strong>',

'us_settings_submit' => 'UCenter的相关信息已成功获取，
			请直接点击下面的按钮提交配置',

'uc_install_first' => '使用UCenter Home，首先需要您的站点安装有统一存储用户帐号信息的
		UCenter用户中心系统。
		<br>
			如果您的站点还没有安装过UCenter，请这样操作：
		<br>
			1. <a href="http://download.comsenz.com/UCenter/" target="_blank"><b>请点击这里下载最新版本的UCenter</b></a>
			，并阅读程序包中的说明进行UCenter的安装。
		<br>
			2. 安装完毕 UCenter 后，在下面填入UCenter的相关信息即可继续进行
			UCenter Home 的安装。
		<br>',

'uc_settings_fill' =>'<strong># 请填写 UCenter 的相关参数</strong>',
'us_settings_enter' => '请输入已安装UCenter的信息:',
'uc_url' => 'UCenter 的 URL:',
'uc_url_comment' => '例如：http://www.discuz.net/ucenter',
'uc_admin_password' => 'UCenter 的创始人密码:',
'uc_config_submit' => '提交UCenter配置信息',

'uc_db_info' => '<strong># 设置UCenter Home数据库信息</strong>',
'uc_db_info_comment' => '这里设置UCenter Home的数据库信息',
'uc_db_host' => '数据库服务器本地地址:',
'uc_db_host_comment' => '一般为localhost',
'uc_db_user' => '数据库用户名:',
'uc_db_password' => '数据库密码:',
'uc_db_charset' => '数据库字符集:',
'uc_db_charset_custom' => '+自定义',

'mysql_required' => 'MySQL版本>4.1有效',

'db_name' => '数据库名:',
'db_name_comment' => '如果不存在，则会尝试自动创建',
'db_prefix' => '表名前缀:',
'db_prefix_comment' => '不能为空，默认为uchome_',
'db_test' => '设置完毕,检测我的数据库配置',

'install_sql_missing' => '安装SQL语句获取失败，请确认SQL文件 install/install.sql 是否存在',

'table' => '数据表',
'table_create_error' => '自动安装失败</font><br />
			反馈: ',

'table_create_error_comment' => '请参照 install/install.sql
			 文件中的SQL文，自己手工安装数据库后，
			再继续进行安装操作',

'try_again' => '重试',
'tables_installed' => '数据表已经全部安装完成，进入下一步操作',

'site_name' => '我的空间',

//----------------------------	
'group_category_name1' => '自由联盟',
'group_category_name2' => '地区联盟',
'group_category_name3' => '兴趣联盟',

'group_titles' => array(
		'站点管理员',
		'信息管理员',
		'贵宾VIP',
		'受限会员',
		'普通会员',
		'中级会员',
		'高级会员',
		'禁止发言',
		'禁止访问'
		),

//----------------------------	
//Increase Money Rules
'rule_register'	=> '开通空间',
'rule_realname'	=> '实名认证',
'rule_realemail' => '邮箱认证',
'rule_invitefriend' => '成功邀请好友',
'rule_setavatar' => '设置头像',
'rule_videophoto' => '视频认证',
'rule_report' => '成功举报',
'rule_updatemood' => '更新心情',
'rule_hotinfo' => '热点信息',
'rule_daylogin' => '每天登陆',
'rule_visit' => '访问别人空间',
'rule_poke' => '打招呼',
'rule_guestbook' => '留言',
'rule_getguestbook' => '被留言',
'rule_doing' => '发表记录',
'rule_publishblog' => '发表日志',
'rule_uploadimage' => '上传图片',
'rule_camera' => '拍大头贴',
'rule_publishthread' => '发表话题',
'rule_replythread' => '回复话题',
'rule_createpoll' => '创建投票',
'rule_joinpoll' => '参与投票',
'rule_createevent' => '发起活动',
'rule_joinevent' => '参与活动',
'rule_recommendevent' => '推荐活动',
'rule_createshare' => '发起分享',
'rule_comment' => '评论',
'rule_getcomment' => '被评论',
'rule_installapp' => '安装应用',
'rule_useapp' => '使用应用',
'rule_click' => '信息表态',
//Decrease Money Rules
'rule_editrealname' => '修改实名',
'rule_editrealemail' => '更改邮箱认证',
'rule_delavatar' => '头像被删除',
'rule_invitecode' => '获取邀请码',
'rule_search' => '搜索一次',
'rule_blogimport' => '日志导入',
'rule_modifydomain' => '修改域名',
'rule_delblog' => '日志被删除',
'rule_deldoing' => '记录被删除',
'rule_delimage' => '图片被删除',
'rule_delpoll' => '投票被删除',
'rule_delthread' => '话题被删除',
'rule_delevent' => '活动被删除',
'rule_delshare' => '分享被删除',
'rule_delguestbook' => '留言被删除',
'rule_delcomment' => '评论被删除',

//----------------------------	

'cron_log' => '更新浏览数统计',
'cron_cleanfeed' => '清理过期feed',
'cron_cleannotification' => '清理个人通知',
'cron_getfeed' => '同步UC的feed',
'cron_cleantrace' => '清理脚印和最新访客',

//------------------------

'task_avatar' => '更新一下自己的头像',
'task_avatar_intro' => '头像就是你在这里的个人形象。<br>设置自己的头像后，会让更多的朋友记住您。',

'task_profile' => '将个人资料补充完整',
'task_profile_intro' => '把自己的个人资料填写完整吧。<br>这样您会被更多的朋友找到的，系统也会帮您找到朋友。',

'task_blog' => '发表自己的第一篇日志',
'task_blog_intro' => '现在，就写下自己的第一篇日志吧。<br>与大家一起分享自己的生活感悟。',

'task_friend' => '寻找并添加五位好友',
'task_friend_intro' => '有了好友，您发的日志、图片等会被好友及时看到并传播出去；<br>您也会在首页方便及时的看到好友的最新动态。',

'task_email' => '验证激活自己的邮箱',
'task_email_intro' => '填写自己真实的邮箱地址并验证通过。<br>您可以在忘记密码的时候使用该邮箱取回自己的密码；<br>还可以及时接受站内的好友通知等等。',

'task_invite' => '邀请10个新朋友加入',
'task_invite_intro' => '邀请一下自己的QQ好友或者邮箱联系人，让亲朋好友一起来加入我们吧。',

'task_gift' => '领取每日访问大礼包',
'task_gift_intro' => '每天登录访问自己的主页，就可领取大礼包。',

//----------------------------------

'event_category1' => '生活/聚会',
'event_category1_template' => '费用说明：\r\n集合地点：\r\n着装要求：\r\n联系方式：\r\n注意事项：',

'event_category2' => '出行/旅游',
'event_category2_template' => '路线说明:\r\n费用说明:\r\n装备要求:\r\n交通工具:\r\n集合地点:\r\n联系方式:\r\n注意事项:',

'event_category3' => '比赛/运动',
'event_category3_template' => '费用说明：\r\n集合地点：\r\n着装要求：\r\n场地介绍：\r\n联系方式：\r\n注意事项：',

'event_category4' => '电影/演出',
'event_category4_template' => '剧情介绍：\r\n费用说明：\r\n集合地点：\r\n联系方式：\r\n注意事项：',

'event_category5' => '教育/讲座',
'event_category5_template' => '主办单位：\r\n活动主题：\r\n费用说明：\r\n集合地点：\r\n联系方式：\r\n注意事项：',

'event_category6' => '其它',

//-----------------------------------------

'magic_invisible' => '隐身草',
'magic_invisible_intro' => '让自己隐身登录，不显示在线，24小时内有效',

'magic_friendnum' => '好友增容卡',
'magic_friendnum_intro' => '在允许添加的最多好友数限制外，增加10个好友名额', 

'magic_attachsize' => '附件增容卡',
'magic_attachsize_intro' => '使用一次，可以给自己增加 10M 的附件空间',

'magic_thunder' => '雷鸣之声',
'magic_thunder_intro' => '发布一条全站信息，让大家知道自己上线了',

'magic_updateline' => '救生圈',
'magic_updateline_intro' => '把指定对象的发布时间更新为当前时间',

'magic_downdateline' => '时空机',
'magic_downdateline_intro' => '把指定对象的发布时间修改为过去的时间',

'magic_color' => '彩色灯',
'magic_color_intro' => '把指定对象的标题变成彩色的',

'magic_hot' => '热点灯',
'magic_hot_intro' => '把指定对象的热度增加站点推荐的热点值',

'magic_visit' => '互访卡',
'magic_visit_intro' => '随机选择10个好友，向其打招呼、留言或访问空间',

'magic_icon' => '彩虹蛋',
'magic_icon_intro' => '给指定对象的标题前面增加图标（最多8个图标）',

'magic_flicker' => '彩虹炫',
'magic_flicker_intro' => '让评论、留言的文字闪烁起来',

'magic_gift' => '红包卡',
'magic_gift_intro' => '在自己的空间埋下积分红包送给来访者',

'magic_superstar' => '超级明星',
'magic_superstar_intro' => '在个人主页，给自己的头像增加超级明星标识',

'magic_viewmagiclog' => '八卦镜',
'magic_viewmagiclog_intro' => '查看指定用户最近使用的道具记录',

'magic_viewmagic' => '透视镜',
'magic_viewmagic_intro' => '查看指定用户当前持有的道具',

'magic_viewvisitor' => '偷窥镜',
'magic_viewvisitor_intro' => '查看指定用户最近访问过的10个空间',

'magic_call' => '点名卡',
'magic_call_intro' => '发通知给自己的好友，让他们来查看指定的对象',

'magic_coupon' => '代金券',
'magic_coupon_intro' => '购买道具时折换一定量的积分',

'magic_frame' => '相框',
'magic_frame_intro' => '给自己的照片添上相框',

'magic_bgimage' => '信纸',
'magic_bgimage_intro' => '给指定的对象添加信纸背景',

'magic_doodle' => '涂鸦板',
'magic_doodle_intro' => '允许在留言、评论等操作时使用涂鸦板',

'magic_anonymous' => '匿名卡',
'magic_anonymous_intro' => '在指定的地方，让自己的名字显示为匿名',

'magic_reveal' => '照妖镜',
'magic_reveal_intro' => '可以查看一次匿名用户的真实身份',

'magic_license' => '道具转让许可证',
'magic_license_intro' => '使用许可证，将道具赠送给指定好友',

'magic_detector' => '探测器',
'magic_detector_intro' => '探测埋了红包的空间',
	
//---------------------------	

'click_icon1' => '路过',
'click_icon2' => '雷人',
'click_icon3' => '握手',
'click_icon4' => '鲜花',
'click_icon5' => '鸡蛋',
'click_icon6' => '漂亮',
'click_icon7' => '酷毙',
'click_icon8' => '雷人',
'click_icon9' => '鲜花',
'click_icon10' => '鸡蛋',
'click_icon11' => '搞笑',
'click_icon12' => '迷惑',
'click_icon13' => '雷人',
'click_icon14' => '鲜花',
'click_icon15' => '鸡蛋',

//-----------------------------------

'db_data_added' => '系统默认数据添加完毕，进入下一步操作',

'db_data_added_intro' => '程序数据安装完成!<br><br>
	最后，请输入您在用户中心UCenter的用户名和密码
	<br>系统将自动为您开通站内第一个空间，
	并将您设为管理员!',

'admin_username' => '您的用户名',

'admin_password' => '您的密码',

'admin_account_create' => '开通管理员空间',


//-------------------------------

'install_title' => 'UCenter Home 程序安装',

'install_step1' => '1.安装开始',
'install_step2' => '2.设置UCenter信息',
'install_step3' => '3.设置数据库连接信息',
'install_step4' => '4.创建数据库结构',
'install_step5' => '5.添加默认数据',
'install_step6' => '6.安装完成',


//---------------------------

'go_back' => '返回上一步',

'wait_please' => '请稍等...',

'continue_next_step' => '继续下一步',


);