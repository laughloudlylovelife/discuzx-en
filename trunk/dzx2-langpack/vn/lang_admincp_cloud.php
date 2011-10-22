<?php

/**
 *	  [Discuz!] (C)2001-2099 Comsenz Inc.
 *	  This is NOT a freeware, use is subject to license terms
 *
 *	  $Id: lang_admincp_cloud.php by vituocgia http://we.ecms.asia/ $
 *	  Modified by Valery Votintsev at sources.ru
 */

$extend_lang = array
(
	'header_cloud' => 'ĐTĐM',
	'header_navcloud' => 'Điện toán đám mây diễn đàn Discuz!',
	'nav_cloud' => 'Điện toán đám mây Discuz!',

	'menu_cloud_open' => 'Mở điện toán đám mây',
	'menu_cloud_upgrade' => 'Nâng cấp điện toán đám mây',
	'menu_cloud_applist' => 'Diễn đàn',
	'menu_cloud_siteinfo' => 'Thông tin',
	'menu_cloud_doctor' => 'Công cụ chuẩn đoán',

	'menu_setting_manyou' => 'Chuyển vùng cài đặt ứng dụng',
	'menu_setting_qqconnect' => 'QQ Internet settings',

	'menu_cloud_manyou' => 'Roaming Applications',
	'menu_cloud_connect' => 'QQ Internet',
	'menu_cloud_search' => 'Aspect Search',
	'menu_cloud_stats' => 'Tencent Analysis',
	'menu_cloud_security' => 'Bảo mật điện toán đám mây',
	'menu_cloud_smilies' => 'SOSO Smilie',
	'menu_cloud_qqgroup' => 'QQ nhóm cộng đồng',
	'menu_cloud_union' => 'Các mạng quảng cáo',

	'close' => 'Đóng',
	'continue' => 'Tiếp tục',
	'message_title' => 'Thông báo',
	'jump_to_cloud' => 'You are about to turn Discuz! Cloud platform (http://cp.discuz.qq.com) to complete the opening process',

	'cloud_status_error' => '出了点小错,可能由于站点信息丢失导致Discuz!云平台服务出现异常,如果有疑问请访问<a href="http://www.discuz.net" target="_blank">官方论坛</a>寻求帮助',

	'cloud_introduction' => 'Xem mô tả',
	'cloud_confirm_open' => 'Xác nhận mở',
	'cloud_confirm_upgrade' => 'Xác nhận nâng cấp',
	'cloud_page_loading' => 'Loading...',
	'cloud_time_out' => 'Bạn không thể truy cập vào điện toán đám mây diễn đàn Discuz!, hãy thử <a href="javascript:;" onclick="location.reload()">Refresh lại</a>.',
	'cloud_unknown_dns' => 'Không thể kết nối đến điện toán đám mây diễn đàn Discuz!. Hãy kiểm tra các cài đặt mạng server của bạn, nếu bạn có thắc mắc, xin vui lòng truy cập vào diễn đàn chính thức để được giúp đỡ',

	'cloud_category' => 'Cài đặt Thể loại',
	'cloud_site_name' => 'Tên trang web',
	'cloud_site_url' => 'URL trang web',
	'cloud_site_category' => 'Thể loại trang web',
	'cloud_select' => 'Hãy chọn ',
	'cloud_agree_protocal' => 'Tôi đã đọc và đồng ý',
	'read_protocal' => '"Thỏa thuận việc sử dụng điện toán đám mây diễn đàn Discuz!"',
	'cloud_will_open' => 'Tôi muốn mở',
	'cloud_will_upgrade' => 'Tôi muốn nâng cấp',
	'cloud_protocal' => 'Thỏa thuận sử dụng điện toán đám mây diễn đàn Discuz!',
	'cloud_select_category' => 'Chọn loại trang web',
	'cloud_select_sub_category' => 'Hãy chọn phân loại thứ cấp',
	'cloud_select_return' => 'Hãy chọn phân loại trang web, quay lại',
	'cloud_open_success' => 'Mở thành công điện toán đám mây diễn đàn Discuz!',
	'cloud_upgrade_success' => 'Nâng cấp thành công điện toán đám mây diễn đàn Discuz!',
	'cloud_network_busy' => 'Mạng bận, hãy thử lại sau, bởi vì: <br />{errMessage} (ERRCODE:{errCode})',
	'cloud_turnto_applist' => 'Trang web của bạn đã mở điện toán đám mây diễn đàn Discuz, truy cập đến diễn đàn',
	'cloud_site_id' => 'ID trang web',
	'cloud_api_ip_btn' => 'IP cài đặt giao diện điện toán đám mây',
	'cloud_api_ip' => 'IP giao diện điện toán đám mây',
	'cloud_api_ip_comment' => '若站点服务器由于DNS解析问题无法连接到云平台接口,请填写api.discuz.qq.com的IP地址,查看帮助',
	'cloud_manyou_ip' => 'Giao diện chuyển vùng IP',
	'cloud_manyou_ip_comment' => '若站点服务器由于DNS解析问题无法连接到漫游接口,请填写api.manyou.com的IP地址,使用<a href="admin.php?action=cloud&operation=doctor">诊断工具</a>检测,<a href="http://faq.comsenz.com/viewnews-400" target="_blank">查看帮助</a>',
	'cloud_connect_api_ip'	=> 'QQ Internet interface IP',//'QQ互联接口IP',
	'cloud_connect_api_ip_comment'	=> 'If your site have problems in DNS resolving the QQ IP interface address openapi.qzone.qq.com, use the <a href="admin.php?action=cloud&operation=doctor">Diagnostic tool</a> for testing, <a href="http://cp.discuz.qq.com/faq?fId=1316571929&ADTAG=CP.CLOUD.FAQ.FID" target="_blank">View Help</a>',//'若站点服务器由于DNS解析问题无法连接到QQ互联接口，请填写openapi.qzone.qq.com的IP地址，使用<a href="admin.php?action=cloud&operation=doctor">诊断工具</a>检测，<a href="http://cp.discuz.qq.com/faq?fId=1316571929&ADTAG=CP.CLOUD.FAQ.FID" target="_blank">查看帮助</a>',
	'cloud_ipsetting_success' => 'Nền tảng điện toán đám mây giao diện IP thiết lập thành công',
	'cloud_open_first' => 'Xin vui lòng mở điện toán đám mây Discuz!',
	'cloud_sync' => 'Đồng bộ hóa thông tin trang web',
	'cloud_sync_success' => 'Đồng bộ hóa Thông tin trang web thành công',
	'cloud_sync_failure' => 'Đồng bộ hóa Thông tin trang web không thành công do: <br />{errMessage} (ERRCODE:{errCode})<br /><br /><a href="http://www.discuz.net" target="_blank">如果有疑问,请访问官方论坛寻求帮助</a>',
	'cloud_resetkey' => 'Key thay thế',
	'cloud_reset_success' => 'Key trang web thay đổi thành công',

	'cloud_siteinfo_tips' => '<li>如果站点名称或者站点URL有变动,请点击"同步站点信息"按钮.</li><li>站点Key是站点与云平台通信的验证密钥,若近期有危险操作泄漏站点Key等信息,请点击"更换站点Key"按钮.<span style="color:red;">请谨慎使用此功能.</span></li>',

	'cloud_doctor_tips' => '<li>Discuz!云平台诊断工具是帮助您分析站点上的状况,是否能与云平台正常通信等功能.</li>
				<li>站点ID是您的站点在云平台的唯一标识,请勿和其他站点共用一套站点ID和站点通信KEY</li>',

	'cloud_doctor_setidkey' => '修改Discuz!上的站点ID和KEY',
	'cloud_doctor_setidkey_tips' => '<li style="color:red">修改Discuz!上的站点ID和KEY,可能会导致通信错误、签名错误以及其他的故障,请勿在没有官方人员指导的情况下修改.</li>
		<li style="color:red">修改ID、KEY和状态前,请先备份论坛的common_setting表.</li>',
	'cloud_site_key' => '站点通信KEY',
	'cloud_site_key_safetips' => '(出于安全考虑,部分隐藏)',
	'cloud_site_key_comment' => '站点通信KEY请勿对外公布',
	'cloud_site_status' => '状态',
	'cloud_idkeysetting_success' => '站点ID/KEY状态设置成功 ',
	'cloud_idkeysetting_siteid_failure' => '站点ID必须为纯数字,请勿随意修改.如有必要,请在客服人员协助下修改.',
	'cloud_idkeysetting_sitekey_failure' => '站点通信KEY必须为32位,请勿随意修改.如有必要,请在客服人员协助下修改.',

	'cloud_doctor_result_success' => '<img align="absmiddle" src="static/image/admincp/cloud/right.gif" />',
	'cloud_doctor_result_failure' => '<img align="absmiddle" src="static/image/admincp/cloud/wrong.gif" /> ',

	'cloud_doctor_api_test_other' => '测试云平台其他接口IP',
	'cloud_doctor_manyou_test_other' => '测试漫游其他接口IP',
	'cloud_doctor_qzone_test_other'	=> 'Testing Another QQ Internet interface IP',//'测试QQ互联其他接口IP',
	'cloud_doctor_api_test_success' => '%s 请求接口 %s 成功,耗时 %01.3f 秒 %s',
	'cloud_doctor_api_test_failure' => '%s 请求接口 %s 失败,请咨询空间商 %s',
	'cloud_doctor_status_0' => '尚未开通云平台',
	'cloud_doctor_status_1' => 'Nền tảng đám mây mở',
	'cloud_doctor_status_2' => '注册云平台,等待完成',

	'cloud_doctor_title_status' => '系统状态',
	'cloud_doctor_modify_siteidkey' => '手动修改站点ID/KEY',
	'cloud_doctor_close_yes' => '是 (前台Connect将不显示)',

	'cloud_site_version' => '产品版本',
	'cloud_site_release' => '产品发布日期',

	'cloud_doctor_title_result' => '检测结果(<a href="#" onClick="self.location.reload();">重新检测</a>)',

	'cloud_doctor_php_ini_separator' => 'URL分隔符',
	'cloud_doctor_php_ini_separator_true' => '空或&',
	'cloud_doctor_php_ini_separator_false' => 'php.ini 的 arg_separator.output 设置成非&值 或 ini_get 函数被禁用,请联系空间商',

	'cloud_doctor_fsockopen_function' => 'fsockopen函数',
	'cloud_doctor_gethostbyname_function' => 'DNS解析函数',
	'cloud_doctor_function_disable' => '函数被禁用,请联系空间商',

	'cloud_doctor_dns_api' => '云平台域名解析',
	'cloud_doctor_dns_api_test' => '云平台主接口测试',
	'cloud_doctor_other_api_test' => '云平台其他接口测试',
	'cloud_doctor_dns_manyou' => '漫游域名解析',
	'cloud_doctor_dns_manyou_test' => '漫游主接口测试',
	'cloud_doctor_other_manyou_test' => '漫游其他接口测试',
	'cloud_doctor_dns_qzone'	=> 'QQ Internet Domain Name',//'QQ互联域名解析',
	'cloud_doctor_dns_qzone_test'	=> 'QQ Internet interface host test',//'QQ互联主接口测试',
	'cloud_doctor_other_qzone_test' => 'Testing other QQ Internet interfaces',//'QQ互联其他接口测试',

	'cloud_doctor_setting_ip' => '手动设置的IP：',

	'cloud_doctor_dns_success' => '%s DNS解析的IP：%s %s <a href="javascript:;" onClick="showWindow(\'cloudApiIpWin\', \'%s?action=cloud&operation=siteinfo&anchor=cloud_ip&callback=doctor\'); return false;">设置接口IP</a>',
	'cloud_doctor_dns_failure' => '<img align="absmiddle" src="static/image/admincp/cloud/wrong.gif" /> %s DNS解析失败 %s <a href="javascript:;" onClick="showWindow(\'cloudApiIpWin\', \'%s?action=cloud&operation=siteinfo&anchor=cloud_ip&callback=doctor\'); return false;">设置接口IP</a>',

	'cloud_doctor_title_plugin' => '系统插件检测',
	'cloud_doctor_system_plugin_status' => '系统插件状态',
	'cloud_doctor_system_plugin_list' => '<a href="admin.php?action=plugins">查看插件列表和版本</a>',
	'cloud_doctor_system_plugin_status_false' => ' 系统插件未初始化 (左侧菜单不显示) <a href="misc.php?mod=initsys" target="_doctor_initframe" onClick="$(\'_doctor_initframe\').onload = function () {self.location.reload();};">点击修复</a><iframe id="_doctor_initframe" name="_doctor_initframe" src="" width="0" height="0" style="display:none;"></iframe>',
	'cloud_doctor_plugin_module_error' => 'common_plugin表modules字段值不正确',

	'cloud_doctor_title_connect' => 'QQ互联检测',
	'cloud_doctor_connect_app_id' => 'QQ互联appid',
	'cloud_doctor_connect_app_key' => 'QQ互联appkey',
	'cloud_doctor_connect_reopen' => '当前站点appid/appkey丢失,请<a href="admin.php?action=cloud&operation=applist">重新开通</a>QQ互联',

	'cloud_application_close' => '您的站点未开启此项云服务,请到Discuz!后台云平台标签下开启',
	'cloud_application_disable' => '您的站点已被禁止使用此项云服务,如果有疑问请访问<a href="http://www.discuz.net/forum.php?gid=3923" target="_blank">官方论坛</a>寻求帮助',

	'cloud_search_tips' => '<li>开启漫游搜索功能后,用户可以使用基于漫游的搜索功能.</li>',

	'cloud_stats' => 'Thống kê phân tích',
	'cloud_stats_tips' => '<li>腾讯分析－最专业的社区分析,为您的社区发展提供数据支持.</li><li>开通腾讯分析后,次日可以查看到前一日的数据.</li><li><a href="http://stats.discuz.qq.com/" target="_blank"><font color="blue">查看详细数据</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://cp.discuz.qq.com/faq?fcId=4" target="_blank"><font color="blue">了解腾讯分析</font></a></li>',
	'cloud_stats_status' => 'Kích hoạt thống kê phân tích',
	'cloud_stats_icon_set' => '选择样式（图标或文字将显示在论坛右下角）',
	'cloud_stats_icon_none' => 'Không hiển thị các biểu tượng và văn bản',
	'cloud_stats_icon_word9' => 'Thống kê phân tích',
	'cloud_stats_icon_word10' => 'Thống kê trang web',
	'cloud_stats_setting' => 'Cài đặt',
	'cloud_stats_summary' => 'Tổng quan về trang web',

	'cloud_smilies' => 'SOSO Smilie',
	'cloud_smilies_tips' => '<li>搜尽天下表情,为网站带来无穷的乐趣与体验.</li>
				<li>省略繁琐的上传表情流程,无缝"偷渡"QQ表情到您的网站,论坛表情变得不再单调无味.</li>',

	'cloud_smilies_status' => 'Kích hoạt SOSO Smile',

	'setting_manyou' => 'Chuyển vùng cài đặt ứng dụng',
	'setting_manyou_tips' => '<li>开启漫游应用功能后,用户可以自由选择各种不同的应用(诸如德克萨斯扑克、弹弹堂、十年一剑......)在站内进行使用.</li>
				<li>漫游应用功能由 <a target="_blank" href="http://www.manyou.com/www/">MYOP开放平台</a> 提供, Manyou Open Platform(Manyou开放平台/MYOP)服务是由 Comsenz 公司为应用开发者提供的开放平台,启用漫游服务前,<a href="http://wiki.developer.manyou.com/wiki/index.php?title=MYOP%E7%BD%91%E7%AB%99%E6%9C%8D%E5%8A%A1%E5%8D%8F%E8%AE%AE&printable=yes" target="_blank">请先阅读MYOP网站服务协议</a></li>',
	'setting_manyou_base' => '基本设置',
	'setting_manyou_base_status' => '启用漫游应用',
	'setting_manyou_base_status_comment' => '选择是否开启漫游应用.如果关闭漫游应用,您的网站用户将不能使用任何基于漫游的应用',
	'setting_manyou_search_status' => '启用漫游搜索',
	'setting_manyou_search_status_comment' => '漫游搜索是专为 Discuz! 产品量身定做的高效、全文搜索服务,无须网站的 MySQL 资源',
	'setting_manyou_search_invite' => '漫游搜索邀请码',
	'setting_manyou_search_invite_comment' => '目前处于测试阶段,需要输入邀请码方可开通漫游搜索,<a href="http://www.discuz.net/thread-1669366-1-1.html" target="_blank">点击这里申请邀请码</a>',
	'setting_manyou_base_status_no' => '尚未开启漫游功能,不能进行此管理.',
	'setting_manyou_base_ip' => '漫游应用的 IP',
	'setting_manyou_base_ip_comment' => '默认为空.如果您的服务器因 DNS 解析问题无法使用漫游应用服务,请填写漫游应用的 IP 地址.<a href="http://faq.comsenz.com/viewnews-400" target="_blank">查看漫游应用的 IP</a>',
	'setting_manyou_base_close_prompt' => '关闭漫游应用的更新提示',
	'setting_manyou_base_close_prompt_comment' => '您的站点开启了漫游应用多应用服务后,当平台有了新的信息的时候漫游应用会自动提示给管理员.关闭本功能后,您将不再获取更新提示.',
	'setting_manyou_base_open_app_prompt' => '开启漫游应用公告',
	'setting_manyou_base_open_app_prompt_comment' => '当平台有了新的应用公告时,用户打开浏览器的时候会弹出窗口提示,类似漫游应用更新提示',
	'setting_manyou_base_refresh' => '同步漫游信息',
	'setting_manyou_base_refresh_comment' => '如果更改了导航名称、搜索设置等,请同步漫游信息.',
	'setting_manyou_base_showgift_comment' => '如果您开启了漫游应用平台的礼物应用后,可以在首页显示"推荐礼物".',
	'setting_manyou_manage' => '漫游应用管理',
	'setting_manyou_search_manage' => '漫游搜索管理',

	'connect_menu_setting' => 'Cài đặt cơ bản',
	'connect_menu_service' => 'Khác',
	'connect_menu_stat' => 'Thống kê',
	'connect_setting_allow' => '开启QQ注册/绑定/登录服务',
	'connect_setting_allow_comment' => '开启后,用户可以通过QQ帐号登录站点,以及进行更多和QQ相关的操作',
	'connect_setting_siteid' => 'QQ绑定站点ID',
	'connect_setting_sitekey' => 'QQ绑定站点密钥',
	'connect_setting_feed_allow' => '开启发帖同步推送到QQ空间动态',
	'connect_setting_feed_allow_comment' => '开启后,用户发帖可以同步推送到QQ空间动态,展现给用户的QQ空间好友',
	'connect_setting_feed_fids' => '允许推送的论坛版块',
	'connect_setting_feed_group' => '群组是否允许推送',
	'connect_setting_feed_group_comment' => '设置在群组发表的主题是否可以推送到QQ空间动态',
	'connect_setting_t_allow' => '开启发帖同步推送到腾讯微博',
	'connect_setting_t_allow_comment' => '开启后,用户发帖可以同步推送到腾讯微博,展现给用户的微博听众',
	'connect_setting_t_fids' => '允许推送的论坛版块',
	'connect_setting_t_group' => '群组是否允许推送',
	'connect_setting_t_group_comment' => '设置在群组发表的主题是否可以推送到腾讯微博',
	'connect_setting_like_allow' => '显示本站QQ认证空间喜欢的链接',
	'connect_setting_like_allow_comment' => '用户点击本站QQ认证空间喜欢的链接,将立即成为本站QQ认证空间的粉丝,随时收取认证空间的动态',
	'connect_setting_like_url' => '认证空间QQ号码',
	'connect_setting_like_url_comment' => '设置认证空间的 QQ 号码,提交认证申请请<a href="http://opensns.qq.com/" target="_blank">点击这里</a>',
	'connect_setting_turl_allow' => '显示本站官方微博快速收听按钮',
	'connect_setting_turl_allow_comment' => '用户点击本站官方微博快速收听按钮,将立即成为您所设置的腾讯微博帐号听众,随时收取微博的动态',
	'connect_setting_turl_qq' => '官方微博QQ号码',
	'connect_setting_turl_qq_comment' => '设置官方微博的QQ号码',
	'connect_setting_turl_qq_failed' => '官方微博QQ号码设置失败,请确保该QQ号的有效性',
	'connect_setting_qshare_allow'		=> 'Allow the Q-Share Functions',//'开启Q-Share功能',
	'connect_setting_qshare_allow_comment'	=> 'Users post content in the selected text in any period of time, can be convenient to the selected text and images broadcast to the region Tencent microblogging',//'用户选中帖子内容中的任何一段文本时，可方便快捷的将选中的文本内容和区域内图片转播到腾讯微博',
	'connect_setting_qshare_appkey'		=> 'Tencent open microblogging platform AppKey',//'腾讯微博开放平台AppKey',
	'connect_setting_qshare_appkey_comment'	=> 'Fill AppKey Tencent microblogging in the source field in the display settings information, it is a time to fill out. How to apply AppKey? Visit Tencent open microblogging platform, <a href="http://open.t.qq.com/apps_welcome.php" target="_blank">Request for your AppKey</a>',//'填写AppKey将在腾讯微博中显示设置的来源字段信息，可不填写。怎样申请AppKey？请访问腾讯微博开放平台，<a href="http://open.t.qq.com/apps_welcome.php" target="_blank">创建应用获取AppKey</a>',
	'connect_member_info' => 'Thông tin tài khoản',
	'connect_member_bindlog' => 'QQ绑定日志',
	'connect_member_bindlog_type' => '操作',
	'connect_member_bindlog_username' => '用户名',
	'connect_member_bindlog_date' => '日期',
	'connect_member_bindlog_type_1' => '绑定',
	'connect_member_bindlog_type_2' => '解除绑定',
	'connect_member_bindlog_uin' => 'QQ帐号绑定日志',
	'connect_member_bindlog_uid' => '用户帐号绑定日志',

	'qqgroup_menu_list' => '绑定管理',
	'qqgroup_menu_manager' => '设置名称',
	'qqgroup_menu_block' => '推送信息',
	'qqgroup_menu_history' => '推送历史',

	'qqgroup_msg_deficiency' => '请至少推送一条头条主题和一条列表主题',
	'qqgroup_msg_save_succeed' => '恭喜,信息成功推送到QQ群',
	'qqgroup_msg_upload_succeed' => 'Upload ảnh thành công',
	'qqgroup_msg_upload_failure' => '图片上传失败,请选择长宽为75*75的图片,支持JPG、GIF、PNG格式,文件小于5M,并检查服务器是否开启GD库',
	'qqgroup_msg_remote_exception' => '抱歉,出了点小错.错误原因：{errmsg} 错误代号：{errno}',
	'qqgroup_msg_unknown_dns' => '抱歉,出现未知错误,请检查您的服务器与Discuz!云平台连接',
	'qqgroup_msg_remote_error' => '抱歉,服务器出错了.请稍后再试',

	'qqgroup_search_order_views' => '浏览数倒序',
	'qqgroup_search_order_replies' => '回复数倒序',
	'qqgroup_search_order_heats' => '热度倒序',
	'qqgroup_search_order_dateline' => '发布时间倒序',
	'qqgroup_search_order_lastpost' => '最后回复倒序',
	'qqgroup_search_order_recommends' => '主题评价倒序',

	'qqgroup_search_dateline_1' => 'Chủ đề đăng trong 1 giờ qua',
	'qqgroup_search_dateline_2' => 'Chủ đề đăng trong 24 giờ qua',
	'qqgroup_search_dateline_3' => 'Chủ đề đăng 7 ngày qua',
	'qqgroup_search_dateline_4' => 'Chủ đề đăng trong 1 tháng qua',
	'qqgroup_search_dateline_0' => 'Không giới hạn',

	'qqgroup_search_tid' => 'ID chủ đề:',
	'qqgroup_search_button' => 'Tìm kiếm',
	'qqgroup_search_threadslist' => 'Danh sách chủ đề',
	'qqgroup_search_inforum' => 'Tất cả forum',
	'qqgroup_search_operation' => 'Hoạt động',

	'qqgroup_search_loading' => 'Loading...',
	'qqgroup_search_nothreads' => 'Không tìm thấy chủ đề yêu cầu, hãy thử lại bằng cách đổi từ khóa tìm kiếm',

	'qqgroup_ctrl_add_miniportal_topic' => 'Ấn vào các tiêu đề',
	'qqgroup_ctrl_add_miniportal_normal' => 'Ấn vào các danh sách',
	'qqgroup_ctrl_up' => 'Chuyển lên',
	'qqgroup_ctrl_down' => 'Chuyển xuống',
	'qqgroup_ctrl_edit' => 'Sửa',
	'qqgroup_ctrl_remove' => 'Xóa',
	'qqgroup_ctrl_upload_image' => 'Tải lên',
	'qqgroup_ctrl_choose_image' => 'Chọn một hình ảnh:',
	'qqgroup_ctrl_choose_image_tips' => 'Lựa chọn hình ảnh kích cỡ 75*75. Hỗ trợ định dạng JPG、GIF、PNG, dung lượng tối đa5M.',
	'qqgroup_ctrl_close' => 'Đóng',

	'qqgroup_preview_tips_topic' => 'Nhấp chuột vào bên trái <img src="static/image/admincp/cloud/qun_op_top.png" align="absmiddle" /> ấn vào thông tin tiêu đề',
	'qqgroup_preview_tips_normal' => 'Nhấp chuột vào bên trái <img src="static/image/admincp/cloud/qun_op_list.png" align="absmiddle" /> ấn vào danh sách thông tin',
	'qqgroup_preview_more' => 'Thêm',
	'qqgroup_preview_shortname' => 'Thẻ tiêu đề trang',
	'qqgroup_preview_button' => 'Giới thiệu thông tin',
	'attach_img' => 'Ảnh đính kèm',

);

$GLOBALS['admincp_actions_normal'][] = 'cloud';

?>