<?php

/**+++
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_template.php by Valery Votintsev at sources.ru
 *
 *      This file is automatically generate
 */

$lang = array (

	'getpassword'		=> 'Retrieve Password',//'找回密码',
	'login_guest'		=> 'No account yet? <a href="member.php?mod=register" onclick="hideWindow(\'login\');showWindow(\'register\', this.href);return false;" title="Register Account">{$_G[setting][reglinkname]}</a>',//'没有帐号？<a href="member.php?mod={$_G[setting][regname]}" onclick="hideWindow('login');showWindow('register', this.href);return false;" title="注册帐号">{$_G[setting][reglinkname]}</a>',
	'new_password'		=> 'New password',//'新密码',
	'new_password_confirm'	=> 'Confirm Password',//'确认密码',
	'submit'			=> 'Submit',//'提交',
	'username'			=> 'User name',//'用户名',

	'close'				=> 'Close',//'关闭',
	'email'				=> 'Email',//'Email',
	'faq'				=> 'FAQ',//'帮助',
	'login'				=> 'Login',//'登录',
	'login_clearcookies'		=> 'Clear Cookies',//'清除痕迹',
	'login_guestmessage'		=> 'You have to be logged to continue the operation',//'你需要先登录才能继续本操作',
	'login_id'			=> 'Account:',//'帐　号　：',
	'login_location'		=> 'Now redirecting you to original page',//'现在将转入登录前页面',
	'login_member'			=> 'User Login',//'用户登录',
	'login_password'		=> 'Password:',//'密　码　：',
	'login_permanent'		=> 'Remember my login status',//'记住我的登录状态',
	'login_refresh'			=> 'If the page is not automatically redirect you, please click here to refresh',//'如果页面没有响应，请点这里刷新',
	'login_succeed'			=> 'Welcome!',//'欢迎你回来',
	'login_succeed_inactive_member'	=> 'Your account is not active',//'你的帐号处于非激活状态',
	'register_from'			=> 'Recommender',//'推荐人',
	'return_login'			=> 'Return to login',//'返回登录',
	'security_question'		=> 'Security Question',//'安全提问(未设置请忽略)',
	'security_question_1'		=> 'Mother\'s name',//'母亲的名字',
	'security_question_2'		=> 'Grandpa\'s name',//'爷爷的名字',
	'security_question_3'		=> 'Father\'s birth city',//'父亲出生的城市',
	'security_question_4'		=> 'First teacher name',//'你其中一位老师的名字',
	'security_question_5'		=> 'Your Computer model',//'你个人计算机的型号',
	'security_question_6'		=> 'Your favorite restaurant',//'你最喜欢的餐馆名称',
	'security_question_7'		=> 'Last 4 digits of your driver\'s license',//'驾驶执照最后四位数字',
	'uid'				=> 'UID',//'UID',

	'account'		=> 'Account',//'帐号',
	'password'		=> 'Password',//'密码',
	'safety_verification'	=> 'Secure authentication',//'安全验证',
	'save_password'		=> 'Remember Me',//'记住密码',

	'activation'			=> 'Activation',//'激活',
	'agree'				=> 'Agree',//'同意',
	'disagree'			=> 'Disagree',//'不同意',
	'index_activation'		=> 'Your account have to be activated',//'你的帐号需要激活',
	'invite_code'			=> 'Invitation code',//'邀请码',
	'login_inactive'		=> 'Give up invitation, <a href="javascript:;" onclick="$(\'registerform\').activationauth.value=\'\',$(\'activation_hidden\').style.display=\'\',$(\'activation_user\').style.display=\'none\'">{$_G[setting][reglinkname]} Now</a>',//'放弃激活，<a href="javascript:;" onclick="$('registerform').activationauth.value='',$('activation_hidden').style.display='',$('activation_user').style.display='none'">现在{$_G[setting][reglinkname]}</a>',
	'login_now'			=> 'Already have an account?<br><a href="member.php?mod=logging&action=login" onclick="hideWindow(\'register\');showWindow(\'login\', this.href);return false;">Login Now</a>',//'已有帐号？<a href="member.php?mod=logging&action=login" onclick="hideWindow('register');showWindow('login', this.href);return false;">现在登录</a>',
	'password_confirm'		=> 'Confirm Password',//'确认密码',
	'profile_email_verify'		=> 'Your account is not activated, please check your email to activate your account',//'你的帐号处于非激活状态，请收取邮件激活你的帐号',
	'profile_email_verify_comment'	=> 'If you do not receive our email, click the re-verify the validity of Email in User CP, or try to replace another email address. NOTE: Before your account activated, you may not be able to post. After your account successfully activated, the above restrictions will automatically be canceled.',//'如果你没有收到我们发送的系统邮件，请进入个人中心点击“重新验证 Email”或在“密码和安全问题”中更换另外一个 Email 地址。注意：在完成激活之前，根据管理员设置，你将只能以待验证会员的身份访问论坛，你可能不能进行发帖等操作。激活成功后，上述限制将自动取消。',
	'register_birthday_day'		=> 'Day',//'日',
	'register_manual_verify'	=> 'Please waiting the administrator to verify your account',//'请等待管理员审核你的帐号',
	'register_message'		=> 'Register Reason',//'注册原因',
	'register_message1'		=> 'So, if you decided to create a new account here, please fill in the registration info carefully. We will verify all the registration info before approove your apply.',//'您填写的注册原因会被当作申请注册的重要参考依据，请务必认真填写，我们会认真审核。',
	'register_next'			=> 'Next',//'下一步',
	'register_pre'			=> 'Prev',//'上一步',
	'register_profile_profile_username_tooshort'	=> 'User name is less than 3 characters',//'用户名小于3个字符',
	'register_profile_username_toolong'		=> 'User name is longer than 15 characters',//'用户名超过 15 个字符',
	'register_succeed'		=> 'Registration successfully completed',//'感谢你注册',
	'rulemessage'			=> 'Term of service',//'网站服务条款',
	'user_center'			=> 'User Center',//'个人中心',
);

