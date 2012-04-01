<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install_lang.php by Valery Votintsev at sources.ru
 */

define('UC_VERNAME', 'International Version');

$lang = array(
	'SC_GBK'		=> 'Simplified Chinese GBK encoding',//'简体中文版',
	'TC_BIG5'		=> 'Traditional Chinese BIG5 encoding',//'繁体中文版',
	'SC_UTF8'		=> 'Simplified Chinese UTF8 encoding',//'简体中文 UTF8 版',
	'TC_UTF8'		=> 'Traditional Chinese UTF8 encoding',//'繁体中文 UTF8 版',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',

	'title_install'		=> SOFT_NAME.' Setup Wizard',//SOFT_NAME.' 安装向导',
	'agreement_yes'		=> 'I agree',//'我同意',
	'agreement_no'		=> 'I do NOT agree',//'我不同意',
	'notset'		=> 'Not set',//'不限制',//????? No limits, Not limited

	'message_title'		=> 'Reminder',//'提示信息',
	'error_message'		=> 'Error message',//'错误信息',
	'message_return'	=> 'Return',//'返回',
	'return'		=> 'Return',//'返回',
	'install_wizard'	=> 'Setup Wizard',//'安装向导',
	'config_nonexistence'	=> 'Configuration file does not exist',//'配置文件不存在',
	'nodir'			=> 'Directory does not exist',//'目录不存在',
	'redirect'		=> 'Browser will automatically redirect the page, without a human intervention.<br>Except when your browser does not support frames, please click here',//'浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',
	'auto_redirect'		=> 'Browser will automatically redirect the page, without a human intervention.',//'浏览器会自动跳转页面，无需人工干预',
	'database_errno_2003'	=> 'Can not connect to the database, check whether the database is run and the database server address is correct.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> 'Unable to create a new database, please check the database name is correct.',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> 'Can not connect to the database, check the database user name and password are correct.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_errno_1064'	=> 'SQL Syntax error',//'SQL 语法错误',

	'dbpriv_createtable'	=> 'No CREATE TABLE permission, can not continue installation.',//'没有CREATE TABLE权限，无法继续安装',
	'dbpriv_insert'		=> 'No INSERT permission, can not continue installation.',//'没有INSERT权限，无法继续安装',
	'dbpriv_select'		=> 'No SELECT privileges, can not continue installation.',//'没有SELECT权限，无法继续安装',
	'dbpriv_update'		=> 'No UPDATE permissions, can not continue installation.',//'没有UPDATE权限，无法继续安装',
	'dbpriv_delete'		=> 'No DELETE permissions, can not continue installation.',//'没有DELETE权限，无法继续安装',
	'dbpriv_droptable'	=> 'No DROP TABLE permissions to install.',//'没有DROP TABLE权限，无法安装',

	'db_not_null'		=> 'UCenter database already installed, continue the installation will clear the old data.',//'数据库中已经安装过 UCenter, 继续安装会清空原有数据。',
	'db_drop_table_confirm'	=> 'To continue the installation it is required to clear all the old data, are you sure you want to continue?',//'继续安装会清空全部原有数据，您确定要继续吗?',

	'writeable'		=> 'writable',//'可写',
	'unwriteable'		=> 'NOT writable',//'不可写',
	'old_step'		=> 'Previous step',//'上一步',
	'new_step'		=> 'Next step',//'下一步',

	'database_errno_2003'	=> 'Can not connect to the database, check whether the database is run and the database server address is correct.',//'无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044'	=> 'Unable to create a new database, please check the database name is correct.',//'无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045'	=> 'Can not connect to the database, check the database user name and password are correct.',//'无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_connect_error'	=> 'Database connection error.',//'数据库连接错误',

	'step_title_1'		=> 'Check environment',//'检查安装环境',
	'step_title_2'		=> 'Set environment',//'设置运行环境',
	'step_title_3'		=> 'Create Database',//'创建数据库',
	'step_title_4'		=> 'Install',//'安装',
	'step_env_check_title'	=> 'Start Installation',//'开始安装',
	'step_env_check_desc'	=> 'Check environment and files/directories permissions',//'环境以及文件目录权限检查',
	'step_db_init_title'	=> 'Install database',//'安装数据库',
	'step_db_init_desc'	=> 'Starting the database installation',//'正在执行数据库安装',

	'step1_file'		=> 'File list',//'目录文件',
	'step1_need_status'	=> 'Required',//'所需状态',
	'step1_status'		=> 'Status',//'当前状态',
	'not_continue'		=> 'Please, try to repair positions marked by a red cross',//'请将以上红叉部分修正再试',

	'tips_dbinfo'		=> 'Setting the database information',//'填写数据库信息',
	'tips_dbinfo_comment'	=> '',//'',
	'tips_admininfo'	=> 'Setting the administrator information',//'填写管理员信息',
	'step_ext_info_title'	=> 'Installed successfully.',//'安装成功。',
	'step_ext_info_comment'	=> 'Click to enter login',//'点击进入登陆',

	'ext_info_succ'		=> 'Installed successfully.',//'安装成功。',
	'install_submit'	=> 'Submit',//'提交',
	'install_locked'	=> 'Install lock has been installed.<br><br>If you sure you want to re-install, go to the server and delete the file<br />'.str_replace(ROOT_PATH, '', $lockfile),//'安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'You must solve the above problems, before the installation can continue.',//'您必须解决以上问题，安装才可以继续',

	'step_app_reg_title'	=> 'Setting environment',//'设置运行环境',
	'step_app_reg_desc'	=> 'Check the server environment, and set UCenter',//'检测服务器环境以及设置 UCenter',
	'tips_ucenter'		=> 'Please fill in the information for UCenter',//'请填写 UCenter 相关信息',
	'tips_ucenter_comment'	=> 'UCenter is the Comsenz inc. core service program. Discuz! Board and other Comsenz applications rely on this program. If you have already installed UCenter, please fill in the information below. Otherwise, please go to <a href="http://www.discuz.com/" target="blank">Comsenz Products</a> to download and install UCenter, and then continue.',//'UCenter 是 Comsenz 公司产品的核心服务程序，Discuz! Board 的安装和运行依赖此程序。如果您已经安装了 UCenter，请填写以下信息。否则，请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装，然后再继续。',

	'advice_mysql_connect'		=> 'Please check the mysql module is loaded correctly.',//'请检查 mysql 模块是否正确加载',
	'advice_fsockopen'		=> 'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_gethostbyname'		=> 'PHP configuration is not allowed the <b>gethostbyname</b> function. Please contact the server administrator to resolve this problem.',//'是否php配置中禁止了gethostbyname函数。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents'	=> 'This function require the <b>allow_url_fopen</b> option to <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml_parser_create'	=> 'This function require the PHP support for XML. Please contact the server administrator to resolve this problem.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',

	'ucurl'				=> 'UCenter URL',//'UCenter 的 URL',
	'ucpw'				=> 'UCenter administrator password',//'UCenter 创始人密码',
	'ucip'				=> 'UCenter IP address',//'UCenter 的IP地址',
	'ucenter_ucip_invalid'		=> 'Invalid format, please fill in the correct IP address',//'格式错误，请填写正确的 IP 地址',
	'ucip_comment'			=> 'In most cases you can leave this empty',//'绝大多数情况下您可以不填',

	'tips_siteinfo'			=> 'Please fill in the site information',//'请填写站点信息',
	'sitename'			=> 'Site Name',//'站点名称',
	'siteurl'			=> 'Site URL',//'站点 URL',

	'forceinstall'			=> 'Mandatory installation',//'强制安装',
	'dbinfo_forceinstall_invalid'	=> 'Current database table prefix is already used by the same data table! You can modify the "Table name prefix" to avoid deleting the old data, or choose to force the mandatory installation. Mandatory installation will delete all the old data, and this old data can not be restored.',//'当前数据库当中已经含有同样表前缀的数据表，您可以修改“表名前缀”来避免删除旧的数据，或者选择强制安装。强制安装会删除旧数据，且无法恢复',

	'click_to_back'			=> 'Click to go Back',//'点击返回上一步',
	'adminemail'			=> 'Administrative E-Mail',//'系统信箱 Email',
	'adminemail_comment'		=> 'Used to send error reports',//'用于发送程序错误报告',
	'dbhost_comment'		=> 'Database server host address, usually localhost',//'数据库服务器地址, 一般为 localhost',
	'tablepre_comment'		=> 'For use multiple applications with the same database, please modify the teble prefix',//'同一数据库运行多个论坛时，请修改前缀',
	'forceinstall_check_label'	=> 'I want to delete all the data, and start mandatory installation!',//'我要删除数据，强制安装 !!!',

	'uc_url_empty'			=> 'You have to fill in the UCenter URL',//'您没有填写 UCenter 的 URL，请返回填写',
	'uc_url_invalid'		=> 'UCenter URL format is invalid',//'URL 格式错误',
	'uc_url_unreachable'		=> 'UCenter URL address is unreachable, please check',//'UCenter 的 URL 地址可能填写错误，请检查',
	'uc_ip_invalid'			=> 'Can not resolve the domain name, please fill in the site IP address',//'无法解析该域名，请填写站点的 IP',
	'uc_admin_invalid'		=> 'UCenter administrator password invalid, please re-fill',//'UCenter 创始人密码错误，请重新填写',
	'uc_data_invalid'		=> 'UCenter communication failure. Check the UCenter URL address is correct',//'通信失败，请检查 UCenter 的URL 地址是否正确 ',
	'uc_dbcharset_incorrect'	=> 'UCenter database character set is inconsistent with the current application character set',//'UCenter 数据库字符集与当前应用字符集不一致',
	'uc_api_add_app_error'		=> 'Adding to UCenter application error',//'向 UCenter 添加应用错误',
	'uc_dns_error'			=> 'UCenter DNS resolution error. Please return and fill in the UCenter IP address',//'UCenter DNS解析错误，请返回填写一下 UCenter 的 IP地址',

	'ucenter_ucurl_invalid'		=> 'UCenter URL is empty or wrong format, please check',//'UCenter 的URL为空，或者格式错误，请检查',
	'ucenter_ucpw_invalid'		=> 'UCenter administrator password is blank, or formatting errors, please check',//'UCenter 的创始人密码为空，或者格式错误，请检查',
	'siteinfo_siteurl_invalid'	=> 'The site URL is blank, or formatting errors, please check',//'站点URL为空，或者格式错误，请检查',
	'siteinfo_sitename_invalid'	=> 'The site name is empty or wrong format, please check',//'站点名称为空，或者格式错误，请检查',
	'dbinfo_dbhost_invalid'		=> 'Database server is empty, or wrong format, please check',//'数据库服务器为空，或者格式错误，请检查',
	'dbinfo_dbname_invalid'		=> 'Database name is empty, or wrong format, please check',//'数据库名为空，或者格式错误，请检查',
	'dbinfo_dbuser_invalid'		=> 'Database user name is blank, or format error, please check',//'数据库用户名为空，或者格式错误，请检查',
	'dbinfo_dbpw_invalid'		=> 'Database password is blank, or format error, please check',//'数据库密码为空，或者格式错误，请检查',
	'dbinfo_adminemail_invalid'	=> 'The site system email address is empty, or format error, please check',//'系统邮箱为空，或者格式错误，请检查',
	'dbinfo_tablepre_invalid'	=> 'Table prefix is blank, or format error, please check',//'数据表前缀为空，或者格式错误，请检查',
	'admininfo_username_invalid'	=> 'Administrator user name is blank, or format error, please check',//'管理员用户名为空，或者格式错误，请检查',
	'admininfo_email_invalid'	=> 'Administrator Email is blank, or format error, please check',//'管理员Email为空，或者格式错误，请检查',
	'admininfo_password_invalid'	=> 'Administrator password is blank, please fill in',//'管理员密码为空，请填写',
	'admininfo_password2_invalid'	=> 'Two passwords are not equal, please check',//'两次密码不一致，请检查',

	'install_dzfull'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> New Discuz! X installation (including UCenter Server)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" /> 全新安装 Discuz! X (含 UCenter Server)</label>',
	'install_dzonly'		=> '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> Install Discuz! X only (specify manually already installed UCenter Server)</label>',//'<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" /> 仅安装 Discuz! X (手工指定已经安装的 UCenter Server)</label>',

	'username'			=> 'Administrator username',//'管理员账号',
	'email'				=> 'Administrator Email',//'管理员 Email',
	'password'			=> 'Administrator password',//'管理员密码',
	'password_comment'		=> 'Administrator password can not be empty',//'管理员密码不能为空',
	'password2'			=> 'Repeat password',//'重复密码',

	'admininfo_invalid'		=> 'Administrator information is not complete, check the administrator usernamet, password, email',//'管理员信息不完整，请检查管理员账号，密码，邮箱',
	'dbname_invalid'		=> 'Database name is empty, please fill in the database name',//'数据库名为空，请填写数据库名称',
	'tablepre_invalid'		=> 'Table prefix is blank or format error, please check',//'数据表前缀为空，或者格式错误，请检查',
	'admin_username_invalid'	=> 'Illegal user name! User name length should not be more than 15 English characters, and can not contain special characters, like Chinese letters or numbers',//'非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字',
	'admin_password_invalid'	=> 'Password and the above discrepancies, please re-enter',//'密码和上面不一致，请重新输入',
	'admin_email_invalid'		=> 'The e-mail address used is invalid or the format is invalid, please change to other address',//'Email 地址错误，此邮件地址已经被使用或者格式无效，请更换为其他地址',
	'admin_invalid'			=> 'You did not fill in complete administrator information, please carefully fill in each item',//'您的信息管理员信息没有填写完整，请仔细填写每个项目',
	'admin_exist_password_error'	=> 'This user already exists. If you want to set this user as an administrator, please enter the correct password for the user, or replace the administrator name',//'该用户已经存在，如果您要设置此用户为论坛的管理员，请正确输入该用户的密码，或者请更换论坛管理员的名字',

	'tagtemplates_subject'		=> 'Title',//'标题',
	'tagtemplates_uid'		=> 'User ID',//'用户 ID',
	'tagtemplates_username'		=> 'Posted by',//'发帖者',
	'tagtemplates_dateline'		=> 'Date',//'日期',
	'tagtemplates_url'		=> 'Templates URL',//'主题地址',

	'uc_version_incorrect'		=> 'Your UCenter server version is too old. Please upgrade the UCenter service with the latest version. Download address: http://www.comsenz.com/.',//'您的 UCenter 服务端版本过低，请升级 UCenter 服务端到最新版本，并且升级，下载地址：http://www.comsenz.com/ 。',
	'config_unwriteable'		=> 'Setup Wizard can not write the configuration file. Enable the config.inc.php write permissions (666 or 777)',//'安装向导无法写入配置文件, 请设置 config.inc.php 程序属性为可写状态(777)',

	'install_in_processed'		=> 'Installing ...',//'正在安装...',
	'install_succeed'		=> 'Installation successfully completed! Click here to enter your Discuz! X2',//'安装成功，点击进入',
	'install_cloud'			=> 'After successful installation, Welcome to the opening Discuz! Cloud platform<br>Discuz! Cloud platform dedicated to help website owners to increase their websites traffic, enhance the ability of Web site operators, and increase a website revenue.<br>Discuz! Cloud platform currently provides a free QQ Internet, Tencent analysis, Cloud search, QQ Group Community,Roaming,SOSO emoticon services.Discuz! Cloud platform will continue to provide more quality services to the project.<br>Before open the Discuz! Platform make sure that your website (Discuz!, UCHome or SupeSite) has been upgraded to Discuz! X2.',//'安装成功，欢迎开通Discuz!云平台<br>Discuz!云平台致力于帮助站长提高网站流量，增强网站运营能力，增加网站收入。<br>Discuz!云平台目前免费提供了QQ互联、腾讯分析、纵横搜索、社区QQ群、漫游应用、SOSO表情服务。Discuz!云平台将陆续提供更多优质服务项目。<br>开通Discuz!平台之前，请确保您的网站（Discuz!、UCHome或SupeSite）已经升级到Discuz!X2。',
	'to_install_cloud'		=> 'Open Admin-Center',//'到后台开通',
	'to_index'			=> 'Temporarily not open',//'暂不开通',

	'init_credits_karma'	=> 'Reputation',//'威望',//!!! The same in install_var.php
	'init_credits_money'	=> 'Points',//'金钱',//!!! The same in install_var.php

	'init_postno0'		=> '#1',//'楼主',//!!! The same in install_var.php 
	'init_postno1'		=> '#2',//'沙发',    //!!! The same in install_var.php
	'init_postno2'		=> '#3',//'板凳',   //!!! The same in install_var.php
	'init_postno3'		=> '#4',//'地板',   //!!! The same in install_var.php

	'init_support'		=> 'Digg',//'支持',   //!!! The same in install_var.php
	'init_opposition'	=> 'Bury',//'反对',//!!! The same in install_var.php

	'init_group_0'	=> 'Member',//'会员',
	'init_group_1'	=> 'Administrator',//'管理员',
	'init_group_2'	=> 'Super Moderator',//'超级版主',
	'init_group_3'	=> 'Moderator',//'版主',
	'init_group_4'	=> 'R/O Member',//'禁止发言',
	'init_group_5'	=> 'Banned',//'禁止访问',
	'init_group_6'	=> 'IP Banned',//'禁止 IP',
	'init_group_7'	=> 'Guest',//'游客',
	'init_group_8'	=> 'Wait for verification',//'等待验证会员',
	'init_group_9'	=> 'Newbie',//'乞丐',
	'init_group_10'	=> 'Junior',//'新手上路',
	'init_group_11'	=> 'Member',//'注册会员',
	'init_group_12'	=> 'Middle Member',//'中级会员',
	'init_group_13'	=> 'Senior Member',//'高级会员',
	'init_group_14'	=> 'Gold Member',//'金牌会员',
	'init_group_15'	=> 'Veteran',//'论坛元老',

	'init_rank_1'	=> 'Beginner',//'新生入学',
	'init_rank_2'	=> 'Apprentice',//'小试牛刀',
	'init_rank_3'	=> 'Intern',//'实习记者',
	'init_rank_4'	=> 'Freelance writer',//'自由撰稿人',
	'init_rank_5'	=> 'Distinguished Writer',//'特聘作家',

	'init_cron_1'	=> 'Empty today\'s post count',//'清空今日发帖数',
	'init_cron_2'	=> 'Empty this month\'s online time',//'清空本月在线时间',
	'init_cron_3'	=> 'Daily data cleaning',//'每日数据清理',
	'init_cron_4'	=> 'Birthday statistics and e-mail subscriptions',//'生日统计与邮件祝福',
	'init_cron_5'	=> 'Topic reply notifications',//'主题回复通知',
	'init_cron_6'	=> 'Daily bulletin clean up',//'每日公告清理',
	'init_cron_7'	=> 'Time-limited operation clean-up',//'限时操作清理',
	'init_cron_8'	=> 'Promotion messages clean-up',//'论坛推广清理',
	'init_cron_9'	=> 'Monthly topic clean-up',//'每月主题清理',
	'init_cron_10'	=> 'Daily update X-Space users',//'每日 X-Space更新用户',
	'init_cron_11'	=> 'Weekly topic update',//'每周主题更新',

	'init_bbcode_1'	=> 'So that the contents of horizontal scrolling, the effect is similar to the marquee HTML tags, Note: This effect only valid under Internet Explorer browser.',//'使内容横向滚动，这个效果类似 HTML 的 marquee 标签，注意：这个效果只在 Internet Explorer 浏览器下有效。',
	'init_bbcode_2'	=> 'Embedded Flash animation',//'嵌入 Flash 动画',
	'init_bbcode_3'	=> 'Show QQ online status, click to this icon and chat with him/her',//'显示 QQ 在线状态，点这个图标可以和他（她）聊天',
	'init_bbcode_4'	=> 'Superscript',//'上标',
	'init_bbcode_5'	=> 'Subscript',//'下标',
	'init_bbcode_6'	=> 'Embedded Windows media audio',//'嵌入 Windows media 音频',
	'init_bbcode_7'	=> 'Embedded Windows media audio or video',//'嵌入 Windows media 音频或视频',

	'init_qihoo_searchboxtxt'		=> 'Input keywords for quick search this forum',//'输入关键词,快速搜索本论坛',
	'init_threadsticky'			=> 'Stick object: Global top, Category Top, This forum top',//'全局置顶,分类置顶,本版置顶',

	'init_default_style'			=> 'Default Style',//'默认风格',
	'init_default_forum'			=> 'Default Forum',//'默认版块',
	'init_default_template'			=> 'Default template',//'默认模板套系',
	'init_default_template_copyright'	=> 'Sing Imagination (Beijing) Technology Co., Ltd.',//'康盛创想（北京）科技有限公司',

	'init_dataformat'	=> 'Y-m-d',//'Y-n-j',
	'init_modreasons'	=> 'Advertising/SPAM\r\nMalicious/Hacking\r\nIllegal content\r\nOfftopic\r\nRepeated post\r\n\r\nI agree\r\nExcellent article\r\nOriginal content',//'广告/SPAM\r\n恶意灌水\r\n违规内容\r\n文不对题\r\n重复发帖\r\n\r\n我很赞同\r\n精品文章\r\n原创内容',
	'init_userreasons'	=> 'Powerfull!\r\nUsefull\r\nVery nice\r\nThe best!\r\nInteresting',
	'init_link'		=> 'Discuz! Official forum',//'Discuz! 官方论坛',
	'init_link_note'	=> 'To provide the latest Discuz! Product news, software downloads and technical exchanges',//'提供最新 Discuz! 产品新闻、软件下载与技术交流',

	'init_promotion_task'	=> 'Website promotion task',//'网站推广任务',
	'init_gift_task'	=> 'Init Gift Task',//'红包类任务',
	'init_avatar_task'	=> 'Avatar Task',//'头像类任务',

	'license'	=> '<div class="license"><h1>License agreement</h1>

<p>English Version of EULA, for non-Chinese-Speaking Users Only</p>

<p>Copyright (c) 2001-2009, Comsenz Inc. All Rights Reserved.</p>

<p>IMPORTANT: THIS SOFTWARE END USER LICENSE AGREEMENT("EULA") IS A LEGAL AGREEMENT BETWEEN YOU AND Comsenz Inc.. READ IT CAREFULLY BEFORE COMPLETING THE INSTALLATION PROCESS AND USING THE SOFTWARE. IT PROVIDES A LICENSE TO USE THE SOFTWARE AND CONTAINS WARRANTY INFORMATION AND LIABILITY DISCLAIMERS. BY INSTALLING AND USING THE SOFTWARE, YOU ARE CONFIRMING YOUR ACCEPTANCE OF THE SOFTWARE AND AGREEING TO BECOME BOUND BY THE TERMS OF THIS AGREEMENT. IF YOU DO NOT AGREE TO BE BOUND BY THESE TERMS, PLEASE DO NOT INSTALL OR USE THE SOFTWARE. YOU MUST ASSUME THE ENTIRE RISK OF USING THIS PROGRAM. ANY LIABILITY OF Comsenz Inc. WILL BE LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT OR REFUND OF PURCHASE PRICE BEFORE FIRST INSTALLATION.</p>

<p>Sing Imagination (Beijing) Technology Co., Ltd. for the Discuz! product developers, and they shall have Discuz! Product Copyright (China National Copyright Administration of Copyright Registration No. 2006SR11895). Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, Discuz! Official website address is http://www.discuz.com, Discuz! Official forum site at http://www.discuz.net.</p>

<p>Discuz! copyright has been registered in The People\'s Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using Discuz! software.</p>

<p>This License applies and only applies Discuz! X version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3>1. Definitions</h3>
<ol>
<li>"Crossday Discuz! Board"("Discuz!" for short) is a bulletin board system which is developed by Comsenz Inc.</Li>
<li>"the Software" means "Crossday Discuz! Board".</Li>
<li> "Comsenz Inc." is the enterprise being responsible for Discuz! product.</Li>
</ol>

<h3>2. License Grants</h3>
<ol>
<li>You may use the Software for free for non-commercial use under the License Restrictions.</Li>
<li>You may modify the source code(if being provieded) or interface of the Software to fit your website under the License Restrictions.</Li>
<li>You have property of all members’ information and articles in the Bulletin Board powered by the Software; meanwhile , you need assume all relevant legal duty by yourself.</Li>
<li>You may use the Software for commercial use after purchasing the commercial license. Moreover, according to the license you purchased you may get specified term, manner and content of technical support from Comsenz Inc. Commercial users are prior to submiting ideas and opinions to Comsenz Inc., but without any guarantee of acceptance.</Li>
</ol>

<h3>3. License Restrictions</h3>
<ol>
<li>You may not use the Software for commercial use or profit use, unless you have been licensed to. To purchase the license , please visit http://www.discuz.com or dial 8610-5165 7885 for more information.</li>
<li>You may not rent, lease, sublicense, sell, assign, pledge the Software and its services.</li>
<li>You may not remove or modify the copyright information and relevant links, such as http://www.comsenz.com, http://www.discuz.com and http://www.discuz.net, in the footer of board pages without the prior written consent of Comsenz Inc., no matter how heavily you modified the Software.</li>
<li>You may not modify the Software to create derivative works for redistribution based upon the Software.</li>
<li>In the event that you fail to comply with this EULA, your license will be terminated.
</li>
</ol>

<h3>4. LIMITED WARRANTY AND DISCLAIMER</h3>
<ol>
<li>THE SOFTWARE AND THE ACCOMPANYING FILES ARE SOLD "AS IS" AND WITHOUT WARRANTIES AS TO PERFORMANCE OF MERCHANTABILITY OR ANY OTHER WARRANTIED WHETHER EXPRESSED OR IMPLIED.</Li>
<li>Comsenz Inc. is not liable for the content of any message posted on the forums powered by the Software.</Li>
<li>You must assume the entire risk of using the Software. ANY LIABILITY OF Comsenz Inc. WILL BE LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT, REFUND OF PURCHASE PRICE BEFORE YOUR FIRST INSTALLATION.</Li>
</ol>

<h3>5. Official Websites</h3>
<ol>
<li>URL of Comsenz Inc. is http://www.comsenz.com</Li>
<li>URL of Discuz! Home is http://www.discuz.com</Li>
<li>URL of Discuz! Community is http://www.discuz.net</Li>
</ol>

<p>Comsenz Inc. reserves the right to modify this EULA. Discuz! Home provides offical information on license and price, Comsenz Inc. may modify them without notice. Modified license and price list will apply to new licensed users.</p>
</div>',

	'uc_installed'		=> 'You have installed the UCenter. If you need to re-install, delete the data/install.lock file',//'您已经安装过 UCenter，如果需要重新安装，请删除 data/install.lock 文件',
	'i_agree'		=> 'I have read and agree to all the elements of the Terms',//'我已仔细阅读，并同意上述条款中的所有内容',
	'supportted'		=> 'Supported',//'支持',
	'unsupportted'		=> 'Unsupportted',//'不支持',
	'max_size'		=> 'Supported / Max Size',//'支持/最大尺寸',
	'project'		=> 'Project',//'项目',
	'ucenter_required'	=> 'Required',//'Discuz! 所需配置',
	'ucenter_best'		=> 'Preferred',//'Discuz! 最佳',
	'curr_server'		=> 'Current server',//'当前服务器',
	'env_check'		=> 'Check environment',//'环境检查',
	'os'			=> 'Operating System',//'操作系统',
	'php'			=> 'PHP Version',//'PHP 版本',
	'attachmentupload'	=> 'Attachment upload',//'附件上传',
	'unlimit'		=> 'No limit',//'不限制',
	'version'		=> 'Version',//'版本',
	'gdversion'		=> 'GD Library',//'GD 库',
	'allow'			=> 'Allow',//'允许',
	'unix'			=> 'Unix-like',//'类Unix',
	'diskspace'		=> 'Disk Space',//'磁盘空间',
	'priv_check'		=> 'Check directory/file permissions',//'目录、文件权限检查',
	'func_depend'		=> 'Check function dependency',//'函数依赖性检查',
	'func_name'		=> 'Function name',//'函数名称',
	'check_result'		=> 'Check result',//'检查结果',
	'suggestion'		=> 'Recommendation',//'建议',
	'advice_mysql'		=> 'Please check the mysql module is loaded correctly',//'请检查 mysql 模块是否正确加载',
	'advice_fopen'		=> 'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents'	=> 'This function require the <b>allow_url_fopen</b> option to be <b>On</b> in php.ini. Please contact the server administrator to resolve this problem.',//'该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml'			=> 'This function require the PHP support for XML. Please contact the server administrator to resolve this problem.',//'该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',
	'none'				=> 'None',//'无',

	'dbhost'		=> 'Database server',//'数据库服务器',
	'dbuser'		=> 'Database username',//'数据库用户名',
	'dbpw'			=> 'Database password',//'数据库密码',
	'dbname'		=> 'Database name',//'数据库名',
	'tablepre'		=> 'Table prefix',//'数据表前缀',

	'ucfounderpw'		=> 'UCenter admin password',//'创始人密码',
	'ucfounderpw2'		=> 'Repeat UCenter admin password',//'重复创始人密码',

	'init_log'		=> 'Initialize log',//'初始化记录',
	'clear_dir'		=> 'Clear directory',//'清空目录',
	'select_db'		=> 'Select the database',//'选择数据库',
	'create_table'		=> 'Create table',//'建立数据表',
	'succeed'		=> 'Success',//'成功 ',

	'testdata'			=> 'Add regions data',//'附加数据',
	'testdata_check_label'		=> 'Install additional regional data (countries/regions/cities)',//'Install demo page templates (4)',
	'portalstatus'			=> 'Portal status',
	'portalstatus_check_label'	=> '',
	'groupstatus'			=> 'Groups status',
	'groupstatus_check_label'	=> '',
	'homestatus'			=> 'Home Status',
	'homestatus_check_label'	=> '',
	'install_data'			=> 'Data installed successfully',//'正在安装数据',
	'install_test_data'		=> 'Install regional data',//'正在安装附加数据',

	'method_undefined'		=> 'Undefined method',//'未定义方法',
	'database_nonexistence'		=> 'Database object does not exist',//'数据库操作对象不存在',
	'skip_current'			=> 'Skip this step',//'跳过本步',
	'topic'				=> 'Topic',//'专题',
//---------------------------------------------------------------
//vot 2 vars for language select:
	'welcome'			=> 'Welcome to Discuz! X Installation!',
	'select_language'		=> '<b>Select the installation language</b>:',
//vot !!!Translate to Chinese!!!
//vot	'regiondata'			=> 'Add regions data',//'Add location data',
//vot	'regiondata_check_label'	=> 'Install additional regional data (countries/regions/cities)',//'Install additional regional data (countries/regions/cities)',
//vot	'install_region_data'		=> 'Install regional data',//'Install regional data',

//---------------------------------------------------------------



);

$msglang = array(
	'config_nonexistence'	=> 'Your config.inc.php file does not exist. Can not continue the installation, please use the FTP to upload the file and try again.',//'您的 config.inc.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',
);

?>