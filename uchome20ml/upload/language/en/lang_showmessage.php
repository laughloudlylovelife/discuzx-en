<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_showmessage.php 13183 2009-08-17 04:35:11Z xupeng $

	Common FrontEnd Messages Language Sentences

	Translated by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['msglang'] = array(

	'box_title'	=> 'Message',//

//common
	'do_success'			=> 'The operation successfully completed',//'进行的操作完成了',
	'no_privilege'			=> 'You have no permission for this operation',//'您目前没有权限进行此操作',
	'no_privilege_realname'		=> 'You have to fill out your real name before. <a href="cp.php?ac=profile">Set the real name</a>',//'您需要填写真实姓名后才能进行当前操作，<a href="cp.php?ac=profile">点这里设置真实姓名</a>',
	'no_privilege_videophoto'	=> 'You have to make video authentication before. <a href="cp.php?ac=videophoto">Start video authentication</a>',//'您需要视频认证通过后才能进行当前操作，<a href="cp.php?ac=videophoto">点这里进行视频认证</a>',
	'no_open_videophoto'		=> 'Video authentication is disablet at the moment',//'目前站点已经关闭视频认证功能',
	'is_blacklist'			=> 'You currently have no permission for this operation because of blacklisting',//'受对方的隐私设置影响，您目前没有权限进行本操作',
	'no_privilege_newusertime'	=> 'You are in the probe period, and need to wait for \\1 hour(s) to carry out this operation',//'您目前处于见习期间，需要等待 \\1 小时后才能进行本操作',
	'no_privilege_avatar'		=> 'You have to set your own avatar before this operation. <a href="cp.php?ac=avatar">Set avatar</a>',//'您需要设置自己的头像后才能进行本操作，<a href="cp.php?ac=avatar">点这里设置</a>',
	'no_privilege_friendnum'	=> 'You have to add \\1 friends before you can perform this operation. <a href="cp.php?ac=friend&op=find">Add a friend</a>',//'您需要添加 \\1 个好友之后，才能进行本操作，<a href="cp.php?ac=friend&op=find">点这里添加好友</a>',
	'no_privilege_email'		=> 'You need to activate your mailbox authentication before you can perform this operation. <a href="cp.php?ac=profile&op=contact">activate mailbox</a>',//'您需要验证激活自己的邮箱后才能进行本操作，<a href="cp.php?ac=profile&op=contact">点这里激活邮箱</a>',
	'uniqueemail_check'		=> 'This e-mail is already in use. Try to use another address.',//'您填入的邮箱地址已经被占用，请尝试使用其他邮箱',
	'uniqueemail_recheck'		=> 'Your e-mail address to verify that after activation, please re-enter personal information to set their own mail',//'您要验证的邮箱地址已经激活过了，请进入个人资料重新设置自己的邮箱',
	'you_do_not_have_permission_to_visit'	=> 'You have no access to this area.',//'您已被禁止访问。',

//mt.php
	'designated_election_it_does_not_exist'	=> 'The specified group does not exist, you can try to create',//'指定的群组不存在，您可以尝试创建',
	'mtag_tagname_error'	=> 'The group name does not meet the requirements',//'设置的群组名称不符合要求',
	'mtag_join_error'	=> 'Can not join the specified group, please try to search for relevant existing groups, and in the appropriate group to apply for membership',//'加入指定的群组失败，请尝试搜索现有的相关群组，并在相应的群组中申请成为会员',
	'mtag_join_field_error'	=> 'group category \\1 below only allows up to join \\2 groups, you have reached the ceiling',//'群组分类 \\1 下面最多只允许加入 \\2 个群组，您已经到达上限',
	'mtag_creat_error'	=> 'you want to view group has not yet been created.',//'您要查看的群组目前还没有被创建',

//index.php
	'enter_the_space'	=> 'Go to the personal space page',//'进入个人空间页面',

//network.php
	'points_deducted_yes_or_no'	=> 'This action will reduce your account (\\1 points) with \\2 points, confirm to continue?<br><br><a href="\\3" class="submit">Continue the operation</a> &nbsp; <a href="javascript:history.go(-1);" class="button">Back</a>',//'本次操作将扣减您 \\1 个积分，\\2 个经验值，确认继续？<br><br><a href="\\3" class="submit">继续操作</a> &nbsp; <a href="javascript:history.go(-1);" class="button">取消</a>',
	'points_search_error'		=> 'You are less than the value of points or experience, can not complete this search.',//'您现在的积分或经验值不足，无法完成本次搜索',

//source/cp_album.php
	'photos_do_not_support_the_default_settings'	=> 'default album does not support this setting.',//'默认相册不支持本设置',
	'album_name_errors'	=> 'You do not have rights to set the album name',//'您没有正确设置相册名',

//source/space_app.php
	'correct_choice_for_application_show'	=> 'Please select the correct application of View',//'请选择正确的应用进行查看',

//source/do_login.php
	'users_were_not_empty_please_re_login'	=> 'Sorry, the username can not be blank, please re-login',//'对不起，用户名不能为空，请重新登录',
	'login_failure_please_re_login'		=> 'Sorry, login failed, please re-login',//'对不起,登录失败,请重新登录',

//source/cp_blog.php
	'no_authority_expiration_date'		=> 'Your administrator permissions have been temporarily restricted, recovery time is: \\1',//'您当前权限已被管理员暂时限制，恢复的时间为：\\1',
	'no_authority_expiration'		=> 'Your administrator permissions have been restricted, please understand that our management',//'您当前权限已被管理员限制，请理解我们的管理',
	'no_authority_to_add_log'		=> 'You currently do not have permission to add blog',//'您目前没有权限添加日志',
	'no_authority_operation_of_the_log'	=> 'You do not have permission to operate the blog',//'您没有权限操作该日志',
	'that_should_at_least_write_things'	=> 'You should at least write a little something',//'至少应该写一点东西',
	'failed_to_delete_operation'		=> 'Delete failed, check the operation details',//'删除失败，请检查操作',

	'click_error'		=> 'Invalid positioning action!',//'没有进行正常的表态操作',
	'click_item_error'	=> 'The item for positioning is not exists!',//'要表态的对象不存在',
	'click_no_self'		=> 'Positioning of your own item is disabled!',//'自己不能给自己表态',
	'click_have'		=> 'You have positioned this item allready',//'您已经表过态了',
	'click_success'		=> 'The item successfully positioned',//'参与表态完成了',

//source/cp_class.php
	'did_not_specify_the_type_of_operation'	=> 'Not properly specified the operation type',//'没有正确指定要操作的分类',
	'enter_the_correct_class_name'		=> 'Please enter correct category name',//'请正确输入分类名',

	'note_wall_reply_success'	=> 'Reply success. Had returned to \\1 wall',//'已经回复到 \\1 的留言板',

//source/cp_comment.php

	'operating_too_fast'		=> "You are working too fast, wait \\1 seconds before next try",//'两次发布操作太快了，请等 \\1 秒钟再试',
	'content_is_too_short'		=> 'Conten must be not less than 2 characters',//'输入的内容不能少于2个字符',
	'comments_do_not_exist'		=> 'Specified comments does not exist',//'指定的评论不存在',
	'do_not_accept_comments'	=> 'This blog does not accept comments',//'该日志不接受评论',
	'sharing_does_not_exist'	=> 'Comment of the share does not exist',//'评论的分享不存在',
	'non_normal_operation'		=> 'Non-normal operation',//'非正常操作',
	'the_vote_only_allows_friends_to_comment'	=> 'The poll allowed comments for friends only',//'该投票只允许好友评论',

//source/cp_common.php
	'security_exit'		=> 'You have the security out of the \\1',//'你已经安全退出了\\1',

//source/cp_doing.php
	'should_write_that'	=> 'You should write at least a little something',//'至少应该写一点东西',
	'docomment_error'	=> 'Please specify the correct record of the comments',//'请正确指定要评论的记录',

//source/cp_invite.php
	'mail_can_not_be_empty'	=> 'mailing list can not be empty',//'邮件列表不能为空',
	'send_result_1'	=> 'message has been sent, your friends may need a few minutes to receive e-mail',//'邮件已经送出，您的好友可能需要几分钟后才能收到邮件',
	'send_result_2'	=> '<strong>failed to send the following message:</strong><br/>\\1',//'<strong>以下邮件发送失败:</strong><br/>\\1',
	'send_result_3'	=> 'record not found the appropriate invitation, message retransmission failure.',//'未找到相应的邀请记录, 邮件重发失败.',
	'there_is_no_record_of_invitation_specified'	=> 'record of the invitation that you specify does not exist',//'您指定的邀请记录不存在',

//source/cp_import.php
	'blog_import_no_result'	=> '"can not get the original data, make sure to enter the site URL and account information, the server returns:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>"',//'"无法获取原数据，请确认已正确输入的站点URL和帐号信息，服务器返回:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>"',
	'blog_import_no_data'	=> 'failure to obtain data, please refer to the server returns:<br />\\1',//
	'support_function_has_not_yet_opened fsockopen'	=> 'site is not supported the fsockopen function, it can not use the function',//
	'integral_inadequate'	=> "You have only \\1 points. To perform this operation you must have at least: \\2",//
	'experience_inadequate'	=> "You experience the value \\1 is not enough to complete this operation. This operation will need to experience value: \\2",//
	'url_is_not_correct'	=> 'Entered website URL is incorrect',//
	'choose_at_least_one_log'	=> 'Please select at least one option to import the blog',//

//source/cp_friend.php
	'friends_added'	=> 'You and \\1 are friends now!',//
	'you_have_friends'	=> 'You have friends',//
	'enough_of_the_number_of_friends'	=> 'number of your current friends reached the system limit, delete some friends',//
	'enough_of_the_number_of_friends_with_magic'	=> 'number of your current friends to system limitations, <a id="a_magic_friendnum2" href="magic.php?mid=friendnum" onclick="ajaxmenu(event, this.id, 1)">use Friends compatibilizer card</a>',//
	'request_has_been_sent'	=> 'friend request has been sent, please wait for the other verification',//
	'waiting_for_the_other_test'	=> 'is waiting for the other party verification',//
	'please_correct_choice_groups_friend'	=> 'Please select the correct group Friends',//
	'specified_user_is_not_your_friend'	=> 'The specified user is not in your friends',//

//source/cp_mtag.php
	'mtag_managemember_no_privilege'	=> 'You can not members of the currently selected group permission to change the operation, please re-select',//
	'mtag_max_inputnum'	=> 'can not join you in the section "\\1" in the number of clusters has reached  \\2 limits the number of',//
	'you_are_already_a_member'	=> 'you are already a member of the group',//
	'join_success'	=> 'added successfully, you are now a member of the group',//
	'the_discussion_topic_does_not_exist'	=> 'Sorry, participate in the discussion of the topic does not exist',//
	'content_is_not_less_than_four_characters'	=> 'Sorry, content not less than 2 characters',//
	'you_are_not_a_member_of'	=> 'You are not a member of the group',//
	'unable_to_manage_self'	=> 'You can not operate on their own',//
	'mtag_joinperm_1'	=> 'You have chosen to join the group, please wait for the group to join the main review of your application',//
	'mtag_joinperm_2'	=> 'This group needs to receive an invitation to join the main group',//
	'invite_mtag_ok'	=> 'successfully joined the group, you can: <a href="space.php?do=mtag&tagid=\\1">immediatelly access to the group</a>',//
	'invite_mtag_cancel'	=> 'ignored the group invited to complete',//
	'failure_to_withdraw_from_group'	=> 'out of private groups fail, please specify a primary Lord of the group',//
	'fill_out_the_grounds_for_the_application'	=> 'Please fill in the group of the main reasons for applying',//

//source/cp_pm.php
	'this_message_could_not_be_deleted'	=> 'specified short message can not be deleted',//
	'unable_to_send_air_news'	=> 'can not send an empty message',//
	'message_can_not_send'	=> 'Sorry, sending a short message failed',//
	'message_can_not_send1'	=> 'Send failed, you are currently beyond the maximum allowable 24-hour number to send text messages',//
	'message_can_not_send2'	=> 'twice to send short messages quickly, please wait a moment and then send',//
	'message_can_not_send3'	=> 'You can not send bulk PMs to non-friends',//
	'message_can_not_send4'	=> 'now you can not use function to send a short message',//
	'not_to_their_own_greeted'	=> 'can not say hello to their own',//
	'has_been_hailed_overlooked'	=> 'call has been ignored',//

//source/cp_profile.php
	'realname_too_short'	=> 'Real name not be less than 4 characters',//
	'update_on_successful_individuals'	=> 'Personal Data updated successfully',//

//source/cp_poll.php
	'no_authority_to_add_poll'	=> 'You do not have permission to add the current vote',//
	'no_authority_operation_of_the_poll'	=> 'You do not have permission to operate the voting',//
	'add_at_least_two_further_options'	=> 'Please add at least two different options',//
	'the_total_reward_should_not_overrun'	=> 'total amount of your reward can not exceed \\1',//
	'wrong_total_reward'	=> 'reward total reward amount can not be less than average',//
	'voting_does_not_exist'	=> 'vote information does not exist',//
	'already_voted'	=> 'You have already voted',//
	'option_exceeds_the_maximum_number_of'	=> 'can not add a maximum not more than 20 items to vote',//
	'the_total_reward_should_not_be_empty'	=> 'total reward can not be empty',//
	'average_reward_should_not_be_empty'	=> 'average reward amount can not be empty',//
	'average_reward_can_not_exceed'	=> 'average reward can not exceed \\1 points',//
	'added_option_should_not_be_empty'	=> 'new options to increase the candidate can not be empty',//
	'time_expired_error'	=> 'expiration time can not be less than the current time',//
	'please_select_items_to_vote'	=> 'Please select at least one voting option',//
	'fill_in_at_least_an_additional_value'	=> 'Please add at least one kind of additional types of value',//

//source/cp_share.php
	'blog_does_not_exist'	=> 'The specified blog does not exist',//
	'logs_can_not_share'	=> 'The specified blog can not be shared because of privacy settings',//
	'album_does_not_exist'	=> 'specified album does not exist',//
	'album_can_not_share'	=> 'privacy settings for the specified album can not be shared',//
	'image_does_not_exist'	=> 'specified image does not exist',//
	'image_can_not_share'	=> 'image can not be shared due to privacy settings specified',//
	'topics_does_not_exist'	=> 'specified topic does not exist',//
	'mtag_fieldid_does_not_exist'	=> 'group category specified does not exist',//
	'tag_does_not_exist'	=> 'specified Tag does not exist',//
	'url_incorrect_format'	=> 'share URL format is incorrect',//
	'description_share_input'	=> 'Please enter a description of sharing',//
	'poll_does_not_exist'	=> 'specified poll does not exist',//
	'share_not_self'	=> 'You can not share their published information (or pictures)',//
	'share_space_not_self'	=> 'You can not share their own home',//

//source/cp_space.php
	'domain_length_error'	=> 'Set the length of the secondary domain name can not be less than \\1 characters',//
	'credits_exchange_invalid'	=> 'exchange program with the wrong points, can not be converted, please return to modify.',//
	'credits_transaction_amount_invalid'	=> 'You have to transfer or exchange of the integral number of input error, please return to modify.',//
	'credits_password_invalid'	=> 'You did not enter a password or password error, can not complete operation, please return.',//
	'credits_balance_insufficient'	=> 'Sorry, your points less than the balance, exchange failure, please return.',//
	'extcredits_dataerror'	=> 'conversion failed, please contact the administrator.',//
	'domain_be_retained'	=> 'you set up the domain reserved by the system, please choose another name.',//
	'not_enabled_this_feature'	=> 'system has not enabled this function',//
	'space_size_inappropriate'	=> 'Please specify the correct value of upload space',//
	'space_does_not_exist'	=> 'Sorry, you specify the user space does not exist.',//
	'integral_convertible_unopened'	=> 'system is currently not open the redeem function.',//
	'two_domain_have_been_occupied'	=> 'Set the secondary domain name has already been used',//
	'only_two_names_from_english_composition_and_figures'	=> 'Set the second level domain and the need to begin by the letters and numbers only by the English form',//
	'two_domain_length_not_more_than_30_characters'	=> 'Set the length of the secondary domain name can not exceed 30 characters',//
	'old_password_invalid'	=> 'You did not enter the old password or the old password error, please return to re-fill.',//
	'no_change'	=> 'does not make any changes.',//
	'protection_of_users'	=> 'protected user, no permission to modify',//

//source/cp_sendmail.php
	'email_input'	=> 'You have not set the mail, please <a href="cp.php?ac=profile&op=contact">Contact Us</a>, accurately fill your mailbox',//
	'email_check_sucess'	=> 'Your mailbox (\\1) verified and activated successfully',//
	'email_check_error'	=> 'E-mail verification link you entered is incorrect. You can profile page, re-verification link to receive new mail.',//
	'email_check_send'	=> 'authentication-mail activation link has been sent to you just fill in the mail, you will within minutes receive the activation email, please note that check.',//
	'email_error'	=> 'filled in mailbox format error, please re-fill',//

//source/cp_theme.php
	'theme_does_not_exist'	=> 'specified style does not exist',//
	'css_contains_elements_of_insecurity'	=> 'content you submit contain elements of insecurity',//

//source/cp_upload.php
	'upload_images_completed'	=> 'upload pictures completed',//

//source/cp_thread.php
	'to_login'	=> 'You need to be logged in to continue the operation',//
	'title_not_too_little'	=> 'title can not be less than 2 characters',//
	'posting_does_not_exist'	=> 'specified topic does not exist',//
	'settings_of_your_mtag'		=> 'To send topic to your group, you have to set your groups.<br>Through the group, you can meet with friends, you have the same choices, but also in sharing topic.<br><br><a href="cp.php?ac=mtag" class="submit">Set my groups</a>',//'有了群组才能发话题，你需要先设置一下你的群组。<br>通过群组，您可以结识与你有相同选择的朋友，更可以一起交流话题。<br><br><a href="cp.php?ac=mtag" class="submit">设置我的群组</a>',
	'first_select_a_mtag'	=> 'Select a group you should at least be made subject.<br><br><a href="cp.php?ac=mtag" class="submit">I set my group</a>',//
	'no_mtag_allow_thread'	=> 'current participation in the group you join an insufficient number of topics can not be made operational.<br><br><a href="cp.php?ac=mtag" class="submit">I set my group</a>',//
	'mtag_close'	=> 'selected group has been locked and can not carry out this operation',//

//source/space_album.php
	'to_view_the_photo_does_not_exist'	=> 'problem, you want to view the album not exist',//

//source/space_blog.php
	'view_to_info_did_not_exist'	=> 'problem, you want to view the information does not exist or has been deleted',//

//source/space_pic.php
	'view_images_do_not_exist'	=> 'you want to view the image does not exist',//

//source/mt_thread.php
	'topic_does_not_exist'	=> 'specified topic does not exist',//

//source/do_inputpwd.php
	'news_does_not_exist'	=> 'specified information does not exist',//
	'proved_to_be_successful'	=> 'authentication success, and now into the View Page',//
	'password_is_not_passed'	=> 'Entered site password is incorrect, please return to re-confirm',//



//source/do_login.php
	'login_success'	=> 'login successful, now guide you to the login before the page \\1',//
	'not_open_registration'	=> 'Sorry, this site is not being open for registration',//
	'not_open_registration_invite'	=> 'Sorry, this site does not allow users to directly being registered, need to have friends invited to link to sign up',//

//source/do_lostpasswd.php
	'getpasswd_account_notmatch'	=> 'Your account information has no filled Email address, so you can not use the password recover feature.<br>If in doubt, please contact the site administrator.',//
	'getpasswd_email_notmatch'	=> 'Entered Email address and user name does not match, please re-confirm.',//
	'getpasswd_send_succeed'	=> 'retrieve password approach has been adopted by Email sent to your mailbox,<br />within 3 days please change your password.',//
	'user_does_not_exist'	=> 'The user does not exist',//
	'getpasswd_illegal'	=> 'you are using the ID that does not exist or has expired, can not retrieve your password.',//
	'profile_passwd_illegal'	=> 'Password empty or contains illegal characters, go back to re-fill.',//
	'getpasswd_succeed'	=> 'Your password has been reset, please use the new password.',//
	'getpasswd_account_invalid'	=> 'Sorry, the founder of the protected site, users or set permissions of the user can not use the password feature, please return.',//
	'reset_passwd_account_invalid'	=> 'Sorry, founder of the protected site, users or set permissions of the user can not use a password reset feature, please return.',//

//source/do_register.php
	'registered'	=> 'registration was successful, you can enter the personal space',//
	'system_error'	=> 'System error, not found UCenter Client file',//
	'password_inconsistency'	=> 'two passwords are not equal',//
	'profile_passwd_illegal'	=> 'Password empty or contains illegal characters, re-fill.',//
	'user_name_is_not_legitimate'	=> 'user name not valid',//
	'include_not_registered_words'	=> 'User not allowed to register that contains the words',//
	'user_name_already_exists'	=> 'user name already exists',//
	'email_format_is_wrong'	=> 'filled in Email format is incorrect',//
	'email_not_registered'	=> 'filled Email does not allowed for registration',//
	'email_has_been_registered'	=> 'This Email is already registered',//
	'regip_has_been_registered'	=> 'The same IP in the \\1 hour can register only one account',//
	'register_error'	=> 'Registration failed',//

//tag.php
	'tag_does_not_exist'	=> 'specified tag does not exist',//

//cp_poke.php
	'poke_success'	=> 'Hello has been sent,\\1 will be notified in next visit',//
	'mtag_minnum_erro'	=> 'members of the group less than \\1, can not perform this operation',//

//source/function_common.php
	'information_contains_the_shielding_text'	=> 'Sorry, the site contains information released by shielding the text',//
	'site_temporarily_closed'	=> 'Sorry, site is temporarily closed',//
	'ip_is_not_allowed_to_visit'	=> 'can not be accessed, your IP is not in the current site allows access to the range.',//
	'no_data_pages'	=> 'page has no data specified',//
	'length_is_not_within_the_scope_of'	=> 'sub-pages is not to the extent permitted',//

//source/function_block.php
	'page_number_is_beyond'	=> 'Page number is out of range',//

//source/function_cp.php
	'incorrect_code'	=> 'Entered verification code does not match, please re-enter',//

//source/function_space.php
	'the_space_has_been_closed'	=> 'you want to access the space has been removed, if in doubt please contact the administrator.',//

//source/network_album.php
	'search_short_interval'	=> 'two search interval is too short, please wait \\1 seconds and try again (<a href="\\2">re-search</a>)',//
	'set_the_correct_search_content'	=> 'Sorry, please set the correct search content',//

//source/space_share.php
	'share_does_not_exist'	=> 'Specified share does not exist',//

//source/space_tag.php
	'tag_locked'	=> 'The tag has been locked',//

	'invite_error'	=> 'Unable to get friends an invitation code, make sure you have enough points to carry out this operation.',//
	'invite_code_error'	=> 'Sorry, your invitation to visit the link is not correct, please confirm.',//
	'invite_code_fuid'	=> 'Sorry, your invitation to visit the link has been used by others.',//

//source/do_invite.php
	'should_not_invite_your_own'	=> 'Sorry, you can not access your invitation link to invite themselves.',//
	'close_invite'	=> 'Sorry, friend invite system has been disabled for now.',//

	'field_required'	=> 'personal information in the required fields, &ldquo;\\1&rdquo; can not be empty, make sure',//
	'friend_self_error'	=> 'Sorry, you can not add themselves as friend',//
	'change_friend_groupname_error'	=> 'specified user group can not be operated Friends',//

	'mtag_not_allow_to_do'	=> 'you are not a member of the group where the topic, do not have permission for this operation',//

//cp_task
	'task_unavailable'	=> 'task you want to participate in the prize does not exist or has not started, can not continue to operate',//
	'task_maxnum'	=> 'task you want to participate in the awards has reached the maximum number allowed, and the task automatically lapse',//
	'update_your_mood'	=> 'Please update about your state of mind right now',//

	'showcredit_error'	=> 'fill in the number of required greater than 0 and less than the number of your points, make sure',//
	'showcredit_fuid_error'	=> 'user you specified is not your friend, make sure',//
	'showcredit_do_success'	=> 'You have succeeded in increasing the Ranking points, quickly view their latest ranking it',//
	'showcredit_friend_do_success'	=> 'You have successfully presented friends Ranking points will be notified of friends',//

	'submit_invalid'	=> 'Your request origin authentication string is incorrect or the form does not match, could not be submitted. Please try to use a standard web browser to operate.',//
	'no_privilege_my_status'	=> 'Sorry, the current site has shut down more than the user applications.',//
	'no_privilege_myapp'	=> 'Sorry, the application does not exist or has been disabled, you can <a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">select other applications</a>',//

	'report_error'	=> 'Sorry, please specify the correct object to report',//
	'report_success'	=> 'Thank you for your report, we will react as soon as possible',//
	'manage_no_perm'	=> 'You can only release information on their management <a href="javascript:;" onclick="hideMenu();">[Close]</a>',//
	'repeat_report'	=> 'Sorry, do not repeat the report again',//
	'the_normal_information'	=> 'administrator to report the object is considered as not illegal, do not need to report once again',//
	'friend_ignore_next'	=> 'success regardless of user \\1 friend to apply to continue to handle the next request (<a href="cp.php?ac=friend&op=request">stop</a>)',//
	'friend_addconfirm_next'	=> 'You have been with the \\1 become friends, continue to the next friend request (<a href="cp.php?ac=friend&op=request">stop</a>)',//

//source/cp_event.php
	'event_title_empty'		=> 'Event name can not be empty',//
	'event_classid_empty'		=> 'You must choose the event type',//
	'event_city_empty'		=> 'Must be selected the event city',//
	'event_detail_empty'		=> 'Must be filled the event details',//
	'event_bad_time_range'		=> 'The event duration can not be more than 60 days',//
	'event_bad_endtime'		=> 'Event end time can not be earlier than the start time',//
	'event_bad_deadline'		=> 'Event can not later than the deadline for closing the end of the event time',//
	'event_bad_starttime'		=> 'Event start time can not be earlier than now',//
	'event_already_full'		=> 'Number of participants for this event is full',//
	'event_will_full'		=> 'Number will exceed the max number of participants limit',//
	'no_privilege_add_event'	=> 'You do not have permission to initiate new event',//
	'no_privilege_edit_event'	=> 'You do not have permission to edit this event information',//
	'no_privilege_manage_event_members'	=> 'You do not have permission to manage the event members',//
	'no_privilege_manage_event_comment'	=> 'You do not have permission to manage the event comments',//
	'no_privilege_manage_event_pic'	=> 'You do not have permission to manage the event album',//
	'no_privilege_do_eventinvite'	=> 'You do not have permission to send event invitations',//
	'event_does_not_exist'		=> 'The event does not exist or has been deleted',//
	'event_create_failed'		=> 'Create event failed, please check your input',//
	'event_need_verify'		=> 'The event was created successful, but have to wait for the administrator verify',//
	'upload_photo_failed'		=> 'Upload photo failed',//
	'choose_right_eventmember'	=> 'Please select the appropriate operation for the event members',//
	'choose_event_pic'		=> 'Please choose the event photo',//
	'only_creator_can_set_admin'	=> 'Only the event creator can set the other organizers',//
	'event_not_set_verify'		=> 'The event does not need verification',//
	'event_join_limit'		=> 'this event can be joined only by invitation',//
	'cannot_quit_event'		=> 'You can not exit the activity, because you have not joined the eventy or you are a initiator of this event.',//
	'event_not_public'		=> 'This is a non-public event, and can be viewed only by invitation',//
	'no_privilege_do_event_invite'	=> 'This event not allow users to invite friends',//
	'event_under_verify'		=> 'This event is being verified for now',//
	'cityevent_under_condition'	=> 'To view the same city activities, need to set your place of residence',//
	'event_is_over'			=> 'This event has ended',//
	'event_meet_deadline'		=> 'The event have been Deadline',//
	'bad_userevent_status'		=> 'Please select the correct state of the event members',//
	'event_has_followed'		=> 'You have been concerned about this event',//
	'event_has_joint'		=> 'You have joined this event',//
	'event_is_closed'		=> 'The event have been closed',//
	'event_only_allows_members_to_comment'	=> 'Active event members allowed to delivered messages',//
	'event_only_allows_admins_to_upload'	=> 'The event organizers can only upload photos',//
	'event_only_allows_members_to_upload'	=> 'Only active event members can upload photos',//
	'eventinvite_does_not_exist'		=> 'You do not have the events of the event invitation',//
	'event_can_not_be_opened'		=> 'This event can not be opened right now',//
	'event_can_not_be_closed'		=> 'This event can not be shut down right now',//
	'event_only_allows_member_thread'	=> 'only active event members can post or reply to topic',//
	'event_mtag_not_match'		=> 'specified group is not associated to the event',//
	'event_memberstatus_limit'	=> 'This event is private, only active event members can access',//
	'choose_event_thread'		=> 'Please select at least one active topics operation',//

//source/cp_magic.php
	'magicuse_success'		=> 'Magic was used successfully',//
	'unknown_magic'			=> 'Specified magic does not exist or has been locked',//
	'choose_a_magic'		=> 'Please select a magic',//
	'magic_is_closed'		=> 'This magic has been disabled',//
	'magic_groupid_not_allowed'	=> 'Your user group does not have permission to use magics',//
	'input_right_buynum'		=> 'Please enter the correct amount to buy',//
	'credit_is_not_enough'		=> 'Your have no enough points o buy this magic',//
	'not_enough_storage'		=> 'Magic inventory shortage, the next replenishment time is \\1',//
	'magicbuy_success'		=> 'The magic is bought successfully, spent points: \\1',//
	'magicbuy_success_with_experence'	=> 'The magic is bought successfully, spent points: \\1, gain experience \\2',//
	'bad_friend_username_given'	=> 'Entered friend name is invalid',//
	'has_no_more_present_magic'	=> 'You are not permitted to purchase magic, <a id="a_buy_license" href="cp.php?ac=magic&op=buy&mid=license" onclick="ajaxmenu(event, this.id, 1)">Buy License</a>',//
	'has_no_more_magic'		=> 'You have no magic \\1, <a id="\\2" href="\\3" onclick="ajaxmenu(event, this.id, 1)">Buy</a>',//
	'magic_can_not_be_presented'	=> 'This magic can not be presented',//
	'magicpresent_success'		=> 'has been able to \\1 donated props',//
	'magic_store_is_closed'		=> 'Magic shop has been closed',//
	'magic_not_used_under_right_stage'	=> 'This magic can not be used in the current stage',//
	'magic_groupid_limit'		=> 'Your current user groups can not buy the magics',//
	'magic_usecount_limit'		=> 'Subject to restrictions on props use cycle, you still can not use the props.<br>Please \\1 after the use of',//
	'magicuse_note_have_no_friend'	=> 'You does not have any friends',//
	'magicuse_author_limit'		=> 'This magic can only release information on their use',//
	'magicuse_object_count_limit'	=> 'The number of magic use for the same information has reached the limit (\\1)',//
	'magicuse_object_once_limit'	=> 'has the information used for this magic, can not re-use',//
	'magicuse_bad_credit_given'	=> 'Number of points you entered is invalid',//
	'magicuse_not_enough_credit'	=> 'Entered number of points is large than you have for now',//
	'magicuse_bad_chunk_given'	=> 'You entered an invalid number of points',//
	'magic_gift_already_given_out'	=> 'Gift has been given allready',//
	'magic_got_gift'		=> 'You have received a gift to: Add \\1 points',//
	'magic_had_got_gift'		=> 'You have received a gift',//
	'magic_has_no_gift'		=> 'Current space has no gifts',//
	'magicuse_object_not_exist'	=> 'The role of magic object does not exist',//
	'magicuse_bad_object'		=> 'Invalid magic choice for the role of the object',//
	'magicuse_condition_limit'	=> 'Magic launch conditions reach limit',//
	'magicuse_bad_dateline'		=> 'Invalid time',//
	'magicuse_not_click_yet'	=> 'You do not stand over the information',//
	'not_enough_coupon'		=> 'Insufficient number of coupons',//
	'magicuse_has_no_valid_friend'	=> 'Magic use failed, there is no legitimate Friends',//
	'magic_not_hidden_yet'	=> 'You are not in invisible state yet',//
	'magic_not_for_sale'	=> 'This dummy can not be buyed',//
	'not_set_gift'		=> 'You do not set the gift',//
	'not_superstar_yet'	=> 'You are not a superstar yet',//
	'no_flicker_yet'	=> 'You do not use this information flicker yet',//
	'no_color_yet'		=> 'You do not have this information used color lights',//
	'no_frame_yet'		=> 'You do not use this information frames',//
	'no_bgimage_yet'	=> 'You do not use this information background image',//
	'bad_buynum'		=> 'The number you entered is incorrect to buy',//

	'feed_no_found'		=> 'Specified feed does not exist',//
	'not_open_updatestat'	=> 'Site did not open the trend statistical functions',//
	
	'topic_subject_error'	=> 'Title length can not be less than 4 characters',//
	'topic_no_found'	=> 'Specified topic does not exist',//
	'topic_list_none'	=> 'There are no topics yet',//

	'space_has_been_locked'	=> 'The space has been locked and can not be accessed. if in doubt please contact the administrator',//

//-----------------------------------------------------
// Added by vot [at] sources.ru

//source/task/avatar.php

	'uc_update_avatar'	=> 'This feature requires that your UCenter Server avatar.php file to be updated.<br>If you are the site administrator, please download the following archive, uncompress it, and copy the avatar.php file to your UCenter document root directory with overwriting the old file.<br><a href="http://u.discuz.net/download/avatar.zip"> http://u.discuz.net/download/avatar.zip</a>',//'这个功能要求您的UCenter的Server端的 avatar.php 程序需要进行升级.<br>如果您是本站管理员,请通过下面的地址下载 avatar.php 文件的压缩包,并覆盖您的UCenter根目录中的同名文件即可.<br><a href="http://u.discuz.net/download/avatar.zip">http://u.discuz.net/download/avatar.zip</a>'.//

	''	=> '',//''.

	
);

