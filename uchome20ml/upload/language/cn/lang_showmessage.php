<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_showmessage.php 13183 2009-08-17 04:35:11Z xupeng $

	Common FrontEnd Messages Language Sentences

*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['msglang'] = array(

	'box_title'	=> '消息',//'Message',

//common
	'do_success'			=> '进行的操作完成了',//'The operation successfully completed',//
	'no_privilege'			=> '您目前没有权限进行此操作',//'You have no permission for this operation',//
	'no_privilege_realname'		=> '您需要填写真实姓名后才能进行当前操作，<a href="cp.php?ac=profile">点这里设置真实姓名</a>',//'You have to fill out your real name before. <a href="cp.php?ac=profile">Set the real name</a>',//
	'no_privilege_videophoto'	=> '您需要视频认证通过后才能进行当前操作，<a href="cp.php?ac=videophoto">点这里进行视频认证</a>',//'You have to make video authentication before. <a href="cp.php?ac=videophoto">Start video authentication</a>',//
	'no_open_videophoto'		=> '目前站点已经关闭视频认证功能',//'Video authentication is disablet at the moment',//
	'is_blacklist'			=> '受对方的隐私设置影响，您目前没有权限进行本操作',//'You currently have no permission for this operation because of blacklisting',//
	'no_privilege_newusertime'	=> '您目前处于见习期间，需要等待 \\1 小时后才能进行本操作',//'You are in the probe period, and need to wait for \\1 hour(s) to carry out this operation',//
	'no_privilege_avatar'		=> '您需要设置自己的头像后才能进行本操作，<a href="cp.php?ac=avatar">点这里设置</a>',//'You have to set your own avatar before this operation. <a href="cp.php?ac=avatar">Set avatar</a>',//
	'no_privilege_friendnum'	=> '您需要添加 \\1 个好友之后，才能进行本操作，<a href="cp.php?ac=friend&op=find">点这里添加好友</a>',//'You have to add \\1 friends before you can perform this operation. <a href="cp.php?ac=friend&op=find">Add a friend</a>',//
	'no_privilege_email'		=> '您需要验证激活自己的邮箱后才能进行本操作，<a href="cp.php?ac=profile&op=contact">点这里激活邮箱</a>',//'You need to activate your mailbox authentication before you can perform this operation. <a href="cp.php?ac=profile&op=contact">activate mailbox</a>',//
	'uniqueemail_check'		=> '您填入的邮箱地址已经被占用，请尝试使用其他邮箱',//'This e-mail is already in use. Try to use another address.',//
	'uniqueemail_recheck'		=> '您要验证的邮箱地址已经激活过了，请进入个人资料重新设置自己的邮箱',//'Your e-mail address to verify that after activation, please re-enter personal information to set their own mail',//
	'you_do_not_have_permission_to_visit'	=> '您已被禁止访问。',//'You have no access to this area.',//

//mt.php
	'designated_election_it_does_not_exist'	=> '指定的群组不存在，您可以尝试创建',//'The specified group does not exist, you can try to create',//
	'mtag_tagname_error'	=> '设置的群组名称不符合要求',//'The group name does not meet the requirements',//
	'mtag_join_error'	=> '加入指定的群组失败，请尝试搜索现有的相关群组，并在相应的群组中申请成为会员',//'Can not join the specified group, please try to search for relevant existing groups, and in the appropriate group to apply for membership',//
	'mtag_join_field_error'	=> '群组分类 \\1 下面最多只允许加入 \\2 个群组，您已经到达上限',//'group category \\1 below only allows up to join \\2 groups, you have reached the ceiling',//
	'mtag_creat_error'	=> '您要查看的群组目前还没有被创建',//'you want to view group has not yet been created.',//

//index.php
	'enter_the_space'	=> '进入个人空间页面',//'Go to the personal space page',//

//network.php
	'points_deducted_yes_or_no'	=> '本次操作将扣减您 \\1 个积分，\\2 个经验值，确认继续？<br><br><a href="\\3" class="submit">继续操作</a> &nbsp; <a href="javascript:history.go(-1);" class="button">取消</a>',//'This action will reduce your account (\\1 points) with \\2 points, confirm to continue?<br><br><a href="\\3" class="submit">Continue the operation</a> &nbsp; <a href="javascript:history.go(-1);" class="button">Back</a>',//
	'points_search_error'		=> '您现在的积分或经验值不足，无法完成本次搜索','You are less than the value of points or experience, can not complete this search.',//

//source/cp_album.php
	'photos_do_not_support_the_default_settings'	=> '默认相册不支持本设置',//'default album does not support this setting.',//
	'album_name_errors'	=> '您没有正确设置相册名',//'You do not have rights to set the album name',//

//source/space_app.php
	'correct_choice_for_application_show'	=> '请选择正确的应用进行查看',//'Please select the correct application of View',//

//source/do_login.php
	'users_were_not_empty_please_re_login'	=> '对不起，用户名不能为空，请重新登录',//'Sorry, the username can not be blank, please re-login',//
	'login_failure_please_re_login'		=> '对不起,登录失败,请重新登录',//'Sorry, login failed, please re-login',//

//source/cp_blog.php
	'no_authority_expiration_date'		=> '您当前权限已被管理员暂时限制，恢复的时间为：\\1',//'Your administrator permissions have been temporarily restricted, recovery time is: \\1',//
	'no_authority_expiration'		=> '您当前权限已被管理员限制，请理解我们的管理',//'Your administrator permissions have been restricted, please understand that our management',//
	'no_authority_to_add_log'		=> '您目前没有权限添加日志',//'You currently do not have permission to add blog',//
	'no_authority_operation_of_the_log'	=> '您没有权限操作该日志',//'You do not have permission to operate the blog',//
	'that_should_at_least_write_things'	=> '至少应该写一点东西',//'You should at least write a little something',//
	'failed_to_delete_operation'		=> '删除失败，请检查操作',//'Delete failed, check the operation details',//

	'click_error'		=> '没有进行正常的表态操作',//'does not stand for the normal operation',//
	'click_item_error'	=> '要表态的对象不存在',//'to position the object does not exist',//
	'click_no_self'		=> '自己不能给自己表态',//'can not give their own position',//
	'click_have'		=> '您已经表过态了',//'You have been state of the table',//
	'click_success'		=> '参与表态完成了',//'participation in position to complete the',//

//source/cp_class.php
	'did_not_specify_the_type_of_operation'	=> '没有正确指定要操作的分类',//'Not properly specified the operation type',//
	'enter_the_correct_class_name'		=> '请正确输入分类名',//'Please enter correct category name',//

	'note_wall_reply_success'	=> '已经回复到 \\1 的留言板',//'Reply success. Had returned to \\1 wall',//

//source/cp_comment.php

	'operating_too_fast'		=> '两次发布操作太快了，请等 \\1 秒钟再试',//'You are working too fast, wait \\1 seconds before next try',//
	'content_is_too_short'		=> '输入的内容不能少于2个字符',//'Conten must be not less than 2 characters',//
	'comments_do_not_exist'		=> '指定的评论不存在',//'Specified comments does not exist',//
	'do_not_accept_comments'	=> '该日志不接受评论',//'This blog does not accept comments',//
	'sharing_does_not_exist'	=> '评论的分享不存在',//'Comment of the share does not exist',//
	'non_normal_operation'		=> '非正常操作',//'Non-normal operation',//
	'the_vote_only_allows_friends_to_comment'	=> '该投票只允许好友评论',//'The poll allowed comments for friends only',//

//source/cp_common.php
	'security_exit'		=> '你已经安全退出了\\1',//'You have the security out of the \\1',//

//source/cp_doing.php
	'should_write_that'	=> '至少应该写一点东西',//'You should write at least a little something',//
	'docomment_error'	=> '请正确指定要评论的记录',//'Please specify the correct record of the comments',//

//source/cp_invite.php
	'mail_can_not_be_empty'	=> '邮件列表不能为空',//'mailing list can not be empty',//
	'send_result_1'	=> '邮件已经送出，您的好友可能需要几分钟后才能收到邮件',//'message has been sent, your friends may need a few minutes to receive e-mail',//
	'send_result_2'	=> '<strong>以下邮件发送失败:</strong><br/>\\1',//'<strong>failed to send the following message:</strong><br/>\\1',//
	'send_result_3'	=> '未找到相应的邀请记录, 邮件重发失败.',//'record not found the appropriate invitation, message retransmission failure.',//
	'there_is_no_record_of_invitation_specified'	=> '您指定的邀请记录不存在',//'record of the invitation that you specify does not exist',//

//source/cp_import.php
	'blog_import_no_result'	=> '"无法获取原数据，请确认已正确输入的站点URL和帐号信息，服务器返回:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>"',//'can not get the original data, make sure to enter the site URL and account information, the server returns:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>',//
	'blog_import_no_data'	=> '获取数据失败，请参考服务器返回:<br />\\1',//'failure to obtain data, please refer to the server returns:<br />\\1',//
	'support_function_has_not_yet_opened fsockopen'	=> '站点尚未开启fsockopen函数支持，还不能使用本功能',//'site is not supported the fsockopen function, it can not use the function',//
	'integral_inadequate'	=> "您现在的积分 \\1 不足以完成本次操作。本操作将需要积分: \\2","You have only \\1 points. To perform this operation you must have at least: \\2",//
	'experience_inadequate'	=> "您现在的经验值\\1 不足以完成本次操作。本操作将需要经验值: \\2",//"You experience the value \\1 is not enough to complete this operation. This operation will need to experience value: \\2",//
	'url_is_not_correct'	=> '输入的网站URL不正确',//'Entered website URL is incorrect',//
	'choose_at_least_one_log'	=> '请至少选择一个要导入的日志',//'Please select at least one option to import the blog',//

//source/cp_friend.php
	'friends_added'	=> '您和 \\1 成为好友了',//'You and \\1 are friends now!',//
	'you_have_friends'	=> '你们已经是好友了',//'You have friends',//
	'enough_of_the_number_of_friends'	=> '您当前的好友数目达到系统限制，请先删除部分好友',//'number of your current friends reached the system limit, delete some friends',//
	'enough_of_the_number_of_friends_with_magic'	=> '您当前的好友数目达到系统限制，<a id="a_magic_friendnum2" href="magic.php?mid=friendnum" onclick="ajaxmenu(event, this.id, 1)">使用好友增容卡增容</a>',//'number of your current friends to system limitations, <a id="a_magic_friendnum2" href="magic.php?mid=friendnum" onclick="ajaxmenu(event, this.id, 1)">use Friends compatibilizer card</a>',//
	'request_has_been_sent'	=> '好友请求已经发送，请等待对方验证中',//'friend request has been sent, please wait for the other verification',//
	'waiting_for_the_other_test'	=> '正在等待对方验证中',//'is waiting for the other party verification',//
	'please_correct_choice_groups_friend'	=> '请正确选择分组好友',//'Please select the correct group Friends',//
	'specified_user_is_not_your_friend'	=> '指定的用户还不是您的好友',//'The specified user is not in your friends',//

//source/cp_mtag.php
	'mtag_managemember_no_privilege'	=> '您不能对当前选定的成员进行群组权限变更操作，请重新选择',//'You can not members of the currently selected group permission to change the operation, please re-select',//
	'mtag_max_inputnum'	=> '无法加入，您在栏目 "\\1" 中的群组数目已达到 \\2 个限制数目',//'can not join you in the section "\\1" in the number of clusters has reached  \\2 limits the number of',//
	'you_are_already_a_member'	=> '您已经是该群组的成员了',//'you are already a member of the group',//
	'join_success'	=> '加入成功，您现在是该群组的成员了',//'added successfully, you are now a member of the group',//
	'the_discussion_topic_does_not_exist'	=> '对不起，参与讨论的话题不存在',//'Sorry, participate in the discussion of the topic does not exist',//
	'content_is_not_less_than_four_characters'	=> '对不起，内容不能少于2个字符',//'Sorry, content not less than 2 characters',//
	'you_are_not_a_member_of'	=> '您不是该群组的成员',//'You are not a member of the group',//
	'unable_to_manage_self'	=> '您不能对自己进行操作',//'You can not operate on their own',//
	'mtag_joinperm_1'	=> '您已经选择加入该群组，请等待群主审核您的加入申请',//'You have chosen to join the group, please wait for the group to join the main review of your application',//
	'mtag_joinperm_2'	=> '本群组需要收到群主邀请后才能加入',//'This group needs to receive an invitation to join the main group',//
	'invite_mtag_ok'	=> '成功加入该群组，您可以：<a href="space.php?do=mtag&tagid=\\1" target="_blank">立即访问该群组</a>',//'successfully joined the group, you can: <a href="space.php?do=mtag&tagid=\\1" target="_blank">immediate access to the group</a>',//
	'invite_mtag_cancel'	=> '忽略该群组邀请完成',//'ignored the group invited to complete',//
	'failure_to_withdraw_from_group'	=> '退出私密群组失败,请先指定一个主群主',//'out of private groups fail, please specify a primary Lord of the group',//
	'fill_out_the_grounds_for_the_application'	=> '请填写群主申请理由',//'Please fill in the group of the main reasons for applying',//

//source/cp_pm.php
	'this_message_could_not_be_deleted'	=> '指定的短消息不能被删除',//'specified short message can not be deleted',//
	'unable_to_send_air_news'	=> '不能发送空消息',//'can not send an empty message',//
	'message_can_not_send'	=> '对不起，发送短消息失败',//'Sorry, sending a short message failed',//
	'message_can_not_send1'	=> '发送失败，您当前超出了24小时最大允许发送短消息数目',//'Send failed, you are currently beyond the maximum allowable 24-hour number to send text messages',//
	'message_can_not_send2'	=> '两次发送短消息太快，请稍等一下再发送',//'twice to send short messages quickly, please wait a moment and then send',//
	'message_can_not_send3'	=> '您不能给非好友批量发送短消息',//'You can not send bulk PMs to non-friends',//
	'message_can_not_send4'	=> '目前您还不能使用发送短消息功能',//'now you can not use function to send a short message',//
	'not_to_their_own_greeted'	=> '不能向自己打招呼',//'can not say hello to their own',//
	'has_been_hailed_overlooked'	=> '招呼已经忽略了',//'call has been ignored',//

//source/cp_profile.php
	'realname_too_short'	=> '真实姓名不能少于4个字符',//'Real name not be less than 4 characters',//
	'update_on_successful_individuals'	=> '个人资料更新成功了',//'Personal Data updated successfully',//

//source/cp_poll.php
	'no_authority_to_add_poll'	=> '您目前没有权限添加投票',//'You do not have permission to add the current vote',//
	'no_authority_operation_of_the_poll'	=> '您没有权限操作该投票',//'You do not have permission to operate the voting',//
	'add_at_least_two_further_options'	=> '请至少添加两个不相同的候选项',//'Please add at least two different options',//
	'the_total_reward_should_not_overrun'	=> '您的悬赏总额不能超过\\1',//'total amount of your reward can not exceed \\1',//
	'wrong_total_reward'	=> '悬赏总额不能小于平均悬赏额度',//'reward total reward amount can not be less than average',//
	'voting_does_not_exist'	=> '投票信息不存在',//'vote information does not exist',//
	'already_voted'	=> '您已经投过票',//'You have already voted',//
	'option_exceeds_the_maximum_number_of'	=> '不能添加了,最大不能超过20个投票项',//'can not add a maximum not more than 20 items to vote',//
	'the_total_reward_should_not_be_empty'	=> '悬赏总额不能为空',//'total reward can not be empty',//
	'average_reward_should_not_be_empty'	=> '平均每人悬赏额度不能为空',//'average reward amount can not be empty',//
	'average_reward_can_not_exceed'	=> '平均每人悬赏最高不能超过\\1个积分',//'average reward can not exceed \\1 points',//
	'added_option_should_not_be_empty'	=> '新增加的候选项不能为空',//'new options to increase the candidate can not be empty',//
	'time_expired_error'	=> '过期时间不能小于当前时间',//'expiration time can not be less than the current time',//
	'please_select_items_to_vote'	=> '请至少选择一个投票选项',//'Please select at least one voting option',//
	'fill_in_at_least_an_additional_value'	=> '请至少添加一种追加类型值',//'Please add at least one kind of additional types of value',//

//source/cp_share.php
	'blog_does_not_exist'	=> '指定的日志不存在',//'The specified blog does not exist',//
	'logs_can_not_share'	=> '指定的日志因隐私设置不能够被分享',//'The specified blog can not be shared because of privacy settings',//
	'album_does_not_exist'	=> '指定的相册不存在',//'specified album does not exist',//
	'album_can_not_share'	=> '指定的相册因隐私设置不能够被分享',//'privacy settings for the specified album can not be shared',//
	'image_does_not_exist'	=> '指定的图片不存在',//'specified image does not exist',//
	'image_can_not_share'	=> '指定的图片因隐私设置不能够被分享',//'image can not be shared due to privacy settings specified',//
	'topics_does_not_exist'	=> '指定的话题不存在',//'specified topic does not exist',//
	'mtag_fieldid_does_not_exist'	=> '指定的群组分类不存在',//'group category specified does not exist',//
	'tag_does_not_exist'	=> '指定的标签不存在',//'specified Tag does not exist',//
	'url_incorrect_format'	=> '分享的网址格式不正确',//'share URL format is incorrect',//
	'description_share_input'	=> '请输入分享的描述',//'Please enter a description of sharing',//
	'poll_does_not_exist'	=> '指定的投票不存在',//'specified poll does not exist',//
	'share_not_self'	=> '你不能分享自己发表的信息(或图片)',//'You can not share their published information (or pictures)',//
	'share_space_not_self'	=> '你不能分享自己的主页',//'You can not share their own home',//

//source/cp_space.php
	'domain_length_error'	=> '设置的二级域名长度不能小于\\1个字符',//'Set the length of the secondary domain name can not be less than \\1 characters',//
	'credits_exchange_invalid'	=> '兑换的积分方案有错，不能进行兑换，请返回修改。',//'exchange program with the wrong points, can not be converted, please return to modify.',//
	'credits_transaction_amount_invalid'	=> '您要转账或兑换的积分数量输入有误，请返回修改。',//'You have to transfer or exchange of the integral number of input error, please return to modify.',//
	'credits_password_invalid'	=> '您没有输入密码或密码错误，不能进行积分操作，请返回。',//'You did not enter a password or password error, can not complete operation, please return.',//
	'credits_balance_insufficient'	=> '对不起，您的积分余额不足，兑换失败，请返回。',//'Sorry, your points less than the balance, exchange failure, please return.',//
	'extcredits_dataerror'	=> '兑换失败，请与管理员联系。',//'conversion failed, please contact the administrator.',//
	'domain_be_retained'	=> '您设定的域名被系统保留，请选择其他域名',//'you set up the domain reserved by the system, please choose another name.',//
	'not_enabled_this_feature'	=> '系统还没有开启本功能',//'system has not enabled this function',//
	'space_size_inappropriate'	=> '请正确指定要兑换的上传空间大小',//'Please specify the correct value of upload space',//
	'space_does_not_exist'	=> '对不起，您指定的用户空间不存在。',//'Sorry, you specify the user space does not exist.',//
	'integral_convertible_unopened'	=> '系统目前没有开启积分兑换功能',//'system is currently not open the redeem function.',//
	'two_domain_have_been_occupied'	=> '设置的二级域名已经有人使用了',//'Set the secondary domain name has already been used',//
	'only_two_names_from_english_composition_and_figures'	=> '设置的二级域名需要由英文字母开头且只由英文和数字构成',//'Set the second level domain and the need to begin by the letters and numbers only by the English form',//
	'two_domain_length_not_more_than_30_characters'	=> '设置的二级域名长度不能超过30个字符',//'Set the length of the secondary domain name can not exceed 30 characters',//
	'old_password_invalid'	=> '您没有输入旧密码或旧密码错误，请返回重新填写。',//'You did not enter the old password or the old password error, please return to re-fill.',//
	'no_change'	=> '没有做任何修改',//'does not make any changes.',//
	'protection_of_users'	=> '受保护的用户，没有权限修改',//'protected user, no permission to modify',//

//source/cp_sendmail.php
	'email_input'	=> '您还没有设置邮箱，请在<a href="cp.php?ac=profile&op=contact">联系方式</a>中准确填写您的邮箱',//'You have not set the mail, please <a href="cp.php?ac=profile&op=contact">Contact Us</a>, accurately fill your mailbox',//
	'email_check_sucess'	=> '您的邮箱（\\1）验证激活完成了',//'Your mailbox (\\1) verified and activated successfully',//
	'email_check_error'	=> '您输入的邮箱验证链接不正确。您可以在个人资料页面，重新接收新的邮箱验证链接。',//'E-mail verification link you entered is incorrect. You can profile page, re-verification link to receive new mail.',//
	'email_check_send'	=> '验证邮箱的激活链接已经发送到您刚才填写的邮箱,您会在几分钟之内收到激活邮件，请注意查收。',//'authentication-mail activation link has been sent to you just fill in the mail, you will within minutes receive the activation email, please note that check.',//
	'email_error'	=> '填写的邮箱格式错误,请重新填写',//'filled in mailbox format error, please re-fill',//

//source/cp_theme.php
	'theme_does_not_exist'	=> '指定的风格不存在',//'specified style does not exist',//
	'css_contains_elements_of_insecurity'	=> '您提交的内容含有不安全元素',//'content you submit contain elements of insecurity',//

//source/cp_upload.php
	'upload_images_completed'	=> '上传图片完成了',//'upload pictures completed',//

//source/cp_thread.php
	'to_login'	=> '您需要先登录才能继续本操作',//'You need to be logged in to continue the operation',//
	'title_not_too_little'	=> '标题不能少于2个字符',//'title can not be less than 2 characters',//
	'posting_does_not_exist'	=> '指定的话题不存在',//'specified topic does not exist',//
	'settings_of_your_mtag'	=> '有了群组才能发话题，你需要先设置一下你的群组。<br>通过群组，您可以结识与你有相同选择的朋友，更可以一起交流话题。<br><br><a href="cp.php?ac=mtag" class="submit">设置我的群组</a>',//'Your Group to send topic, you need to set the look of your group.<br>Through the group, you can meet with friends, you have the same choices, but also in sharing topic.<br><br><a href="cp.php?ac=mtag" class="submit">I set my group</a>',//
	'first_select_a_mtag'	=> '你至少应该选择一个群组才能发话题。<br><br><a href="cp.php?ac=mtag" class="submit">设置我的群组</a>',//'Select a group you should at least be made subject.<br><br><a href="cp.php?ac=mtag" class="submit">I set my group</a>',//
	'no_mtag_allow_thread'	=> '当前你参与的群组加入人数不足，还不能进行发话题操作。<br><br><a href="cp.php?ac=mtag" class="submit">设置我的群组</a>',//'current participation in the group you join an insufficient number of topics can not be made operational.<br><br><a href="cp.php?ac=mtag" class="submit">I set my group</a>',//
	'mtag_close'	=> '选择的群组已经被锁定，不能进行本操作',//'selected group has been locked and can not carry out this operation',//

//source/space_album.php
	'to_view_the_photo_does_not_exist'	=> '出问题了，您要查看的相册不存在',//'problem, you want to view the album not exist',//

//source/space_blog.php
	'view_to_info_did_not_exist'	=> '出问题了，您要查看的信息不存在或者已经被删除',//'problem, you want to view the information does not exist or has been deleted',//

//source/space_pic.php
	'view_images_do_not_exist'	=> '您要查看的图片不存在',//'you want to view the image does not exist',//

//source/mt_thread.php
	'topic_does_not_exist'	=> '指定的话题不存在',//'specified topic does not exist',//

//source/do_inputpwd.php
	'news_does_not_exist'	=> '指定的信息不存在',//'specified information does not exist',//
	'proved_to_be_successful'	=> '验证成功，现在进入查看页面',//'authentication success, and now into the View Page',//
	'password_is_not_passed'	=> '输入的网站登录密码不正确,请返回重新确认',//'Entered site password is incorrect, please return to re-confirm',//



//source/do_login.php
	'login_success'			=> '登录成功了，现在引导您进入登录前页面 \\1',//'login successful, now guide you to the login before the page \\1',//
	'not_open_registration'		=> '非常抱歉，本站目前暂时不开放注册',//'Sorry, this site is not being open for registration',//
	'not_open_registration_invite'	=> '非常抱歉，本站目前暂时不允许用户直接注册，需要有好友邀请链接才能注册',//'Sorry, this site does not allow users to directly being registered, need to have friends invited to link to sign up',//

//source/do_lostpasswd.php
	'getpasswd_account_notmatch'	=> '您的账户资料中没有完整的Email地址，不能使用取回密码功能，如有疑问请与管理员联系。',//'Your account information has no filled Email address, so you can not use the password recover feature.<br>If in doubt, please contact the site administrator.',//
	'getpasswd_email_notmatch'	=> '输入的Email地址与用户名不匹配，请重新确认。',//'Entered Email address and user name does not match, please re-confirm.',//
	'getpasswd_send_succeed'	=> '取回密码的方法已经通过 Email 发送到您的信箱中，<br />请在 3 天之内修改您的密码。',//'retrieve password approach has been adopted by Email sent to your mailbox,<br />within 3 days please change your password.',//
	'user_does_not_exist'	=> '该用户不存',//'The user does not exist',//
	'getpasswd_illegal'	=> '您所用的 ID 不存在或已经过期，无法取回密码。',//'you are using the ID that does not exist or has expired, can not retrieve your password.',//
	'profile_passwd_illegal'	=> '密码空或包含非法字符，请返回重新填写。',//'Password empty or contains illegal characters, go back to re-fill.',//
	'getpasswd_succeed'	=> '您的密码已重新设置，请使用新密码登录。',//'Your password has been reset, please use the new password.',//
	'getpasswd_account_invalid'	=> '对不起，创始人、受保护用户或有站点设置权限的用户不能使用取回密码功能，请返回。',//'Sorry, the founder of the protected site, users or set permissions of the user can not use the password feature, please return.',//
	'reset_passwd_account_invalid'	=> '对不起，创始人、受保护用户或有站点设置权限的用户不能使用密码重置功能，请返回。',//'Sorry, founder of the protected site, users or set permissions of the user can not use a password reset feature, please return.',//

//source/do_register.php
	'registered'	=> '注册成功了，进入个人空间',//'registration was successful, you can enter the personal space',//
	'system_error'	=> '系统错误，未找到UCenter Client文件',//'System error, not found UCenter Client file',//
	'password_inconsistency'	=> '两次输入的密码不一致',//'two passwords are not equal',//
	'profile_passwd_illegal'	=> '密码空或包含非法字符，请重新填写。',//'Password empty or contains illegal characters, re-fill.',//
	'user_name_is_not_legitimate'	=> '用户名不合法',//'user name not valid',//
	'include_not_registered_words'	=> '用户名包含不允许注册的词语',//'User not allowed to register that contains the words',//
	'user_name_already_exists'	=> '用户名已经存在',//'user name already exists',//
	'email_format_is_wrong'	=> '填写的 Email 格式有误',//'filled in Email format is incorrect',//
	'email_not_registered'	=> '填写的 Email 不允许注册',//'filled Email does not allowed for registration',//
	'email_has_been_registered'	=> '填写的 Email 已经被注册',//'This Email is already registered',//
	'regip_has_been_registered'	=> '同一个IP在 \\1 小时内只能注册一个账号',//'The same IP in the \\1 hour can register only one account',//
	'register_error'	=> '注册失败',//'Registration failed',//

//tag.php
	'tag_does_not_exist'	=> '指定的标签不存在',//'specified tag does not exist',//

//cp_poke.php
	'poke_success'	=> '已经发送，\\1下次访问时会收到通知',//'Hello has been sent,\\1 will be notified in next visit',//
	'mtag_minnum_erro'	=> '本群组成员数不足 \\1 个，还不能进行本操作',//'members of the group less than \\1, can not perform this operation',//

//source/function_common.php
	'information_contains_the_shielding_text'	=> '对不起，发布的信息中包含站点屏蔽的文字',//'Sorry, the site contains information released by shielding the text',//
	'site_temporarily_closed'	=> '站点暂时关闭',//'Sorry, site is temporarily closed',//
	'ip_is_not_allowed_to_visit'	=> '不能访问，您当前的IP不在站点允许访问的范围内。',//'can not be accessed, your IP is not in the current site allows access to the range.',//
	'no_data_pages'	=> '指定的页面已经没有数据了',//'page has no data specified',//
	'length_is_not_within_the_scope_of'	=> '分页数不在允许的范围内',//'sub-pages is not to the extent permitted',//

//source/function_block.php
	'page_number_is_beyond'	=> '页数是否超出范围',//'Page number is out of range',//

//source/function_cp.php
	'incorrect_code'	=> '输入的验证码不符，请重新确认',//'Entered verification code does not match, please re-enter',//

//source/function_space.php
	'the_space_has_been_closed'	=> '您要访问的空间已被删除，如有疑问请联系管理员',//'you want to access the space has been removed, if in doubt please contact the administrator.',//

//source/network_album.php
	'search_short_interval'	=> '两次搜索间隔太短，请等待 \\1 秒后再重试 (<a href="\\2">重新搜索</a>)',//'two search interval is too short, please wait \\1 seconds and try again (<a href="\\2">re-search</a>)',//
	'set_the_correct_search_content'	=> '对不起，请设置正确的查找内容',//'Sorry, please set the correct search content',//

//source/space_share.php
	'share_does_not_exist'	=> '要查看的分享不存在',//'Specified share does not exist',//

//source/space_tag.php
	'tag_locked'	=> '标签已经被锁定',//'The tag has been locked',//

	'invite_error'	=> '无法获取好友邀请码，请确认您是否有足够的积分来进行本操作',//'Unable to get friends an invitation code, make sure you have enough points to carry out this operation.',//
	'invite_code_error'	=> '对不起，您访问的邀请链接不正确，请确认。',//'Sorry, your invitation to visit the link is not correct, please confirm.',//
	'invite_code_fuid'	=> '对不起，您访问的邀请链接已经被他人使用了。',//'Sorry, your invitation to visit the link has been used by others.',//

//source/do_invite.php
	'should_not_invite_your_own'	=> '对不起，您不能通过访问自己的邀请链接来邀请自己。',//'Sorry, you can not access your invitation link to invite themselves.',//
	'close_invite'	=> '对不起，系统已经关闭了好友邀请功能',//'Sorry, friend invite system has been disabled for now.',//

	'field_required'	=> '个人资料中的必填项目“\\1” 不能为空，请确认',//'personal information in the required fields, &ldquo;\\1&rdquo; can not be empty, make sure',//
	'friend_self_error'	=> '对不起，您不能加自己为好友',//'Sorry, you can not add themselves as friend',//
	'change_friend_groupname_error'	=> '指定的好友用户组不能被操作',//'specified user group can not be operated Friends',//

	'mtag_not_allow_to_do'	=> '您不是该话题所在群组的成员，没有权限进行本操作',//'you are not a member of the group where the topic, do not have permission for this operation',//

//cp_task
	'task_unavailable'	=> '您要参与的有奖任务不存在或者还没有开始，无法继续操作',//'task you want to participate in the prize does not exist or has not started, can not continue to operate',//
	'task_maxnum'	=> '您要参与的有奖任务已经到达允许人数的上限了，该任务自动失效',//'task you want to participate in the awards has reached the maximum number allowed, and the task automatically lapse',//
	'update_your_mood'	=> '请先更新一下您现在的心情状态吧',//'Please update about your state of mind right now',//

	'showcredit_error'	=> '填写的数字需要大于0，并且小于您的积分数，请确认',//'fill in the number of required greater than 0 and less than the number of your points, make sure',//
	'showcredit_fuid_error'	=> '您指定的用户还不是你的好友，请确认',//'user you specified is not your friend, make sure',//
	'showcredit_do_success'	=> '您已经成功增加上榜积分，赶快查看自己的最新排名吧',//'You have succeeded in increasing the Ranking points, quickly view their latest ranking it',//
	'showcredit_friend_do_success'	=> '您已经成功赠送好友上榜积分，好友会收到通知的',//'You have successfully presented friends Ranking points will be notified of friends',//

	'submit_invalid'	=> '您的请求来路不正确或表单验证串不符，无法提交。请尝试使用标准的web浏览器进行操作。',//'Your request origin authentication string is incorrect or the form does not match, could not be submitted. Please try to use a standard web browser to operate.',//
	'no_privilege_my_status'	=> '对不起，当前站点已经关闭了用户多应用服务。',//'Sorry, the current site has shut down more than the user applications.',//
	'no_privilege_myapp'	=> '对不起，该应用不存在或已关闭，您可以<a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">选择其他应用</a>',//'Sorry, the application does not exist or has been disabled, you can <a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">select other applications</a>',//

	'report_error'	=> '对不起，请正确指定要举报的对象',//'Sorry, please specify the correct object to report',//
	'report_success'	=> '感谢您的举报，我们会尽快处理',//'Thank you for your report, we will react as soon as possible',//
	'manage_no_perm'	=> '您只能对自己发布的信息进行管理<a href="javascript:;" onclick="hideMenu();">[关闭]</a>',//'You can only release information on their management <a href="javascript:;" onclick="hideMenu();">[Close]</a>',//
	'repeat_report'	=> '对不起，请不要重复举报',//'Sorry, do not repeat the report again',//
	'the_normal_information'	=> '要举报的对象被管理员视为没有违规，不需要再次举报了',//'administrator to report the object is considered as not illegal, do not need to report once again',//
	'friend_ignore_next'	=> '成功忽略用户 \\1 的好友申请，继续处理下一个请求中(<a href="cp.php?ac=friend&op=request">停止</a>)',//'success regardless of user \\1 friend to apply to continue to handle the next request (<a href="cp.php?ac=friend&op=request">stop</a>)',//
	'friend_addconfirm_next'	=> '您已经跟 \\1 成为了好友，继续处理下一个好友请求中(<a href="cp.php?ac=friend&op=request">停止</a>)',//'You have been with the \\1 become friends, continue to the next friend request (<a href="cp.php?ac=friend&op=request">stop</a>)',//

//source/cp_event.php
	'event_title_empty'		=> '活动名称不能为空',//'Event name can not be empty',//
	'event_classid_empty'		=> '必须选择活动分类',//'You must choose the event type',//
	'event_city_empty'		=> '必须选择活动城市',//'Must be selected the event city',//
	'event_detail_empty'		=> '必须填写活动介绍',//'Must be filled the event details',//
	'event_bad_time_range'		=> '活动持续时间不能超过60天',//'The event duration can not be more than 60 days',//
	'event_bad_endtime'		=> '活动结束时间不能早于开始时间',//'Event end time can not be earlier than the start time',//
	'event_bad_deadline'		=> '活动报名截止时间不能晚于活动结束时间',//'Event can not later than the deadline for closing the end of the event time',//
	'event_bad_starttime'		=> '活动开始时间不能早于现在',//'Event start time can not be earlier than now',//
	'event_already_full'		=> '此活动参与人数已满',//'Number of participants for this event is full',//
	'event_will_full'		=> '人数将超过活动参与人数限制',//'Number will exceed the max number of participants limit',//
	'no_privilege_add_event'	=> '您没有权限发起新活动',//'You do not have permission to initiate new event',//
	'no_privilege_edit_event'	=> '您没有权限编辑这个活动的信息',//'You do not have permission to edit this event information',//
	'no_privilege_manage_event_members'	=> '您没有权限管理这个活动的成员',//'You do not have permission to manage the event members',//
	'no_privilege_manage_event_comment'	=> '您没有权限管理这个活动的评论',//'You do not have permission to manage the event comments',//
	'no_privilege_manage_event_pic'	=> '您没有权限管理这个活动的相册',//'You do not have permission to manage the event album',//
	'no_privilege_do_eventinvite'	=> '您没有权限发送活动邀请',//'You do not have permission to send event invitations',//
	'event_does_not_exist'		=> '活动不存在或已被删除',//'The event does not exist or has been deleted',//
	'event_create_failed'		=> '创建活动失败，请检查您的输入信息',//'Create event failed, please check your input',//
	'event_need_verify'		=> '活动创建成功，等待管理员审核',//'The event was created successful, but have to wait for the administrator verify',//
	'upload_photo_failed'		=> '上传活动海报失败',//'Upload photo failed',//
	'choose_right_eventmember'	=> '请选择合适的活动成员进行操作',//'Please select the appropriate operation for the event members',//
	'choose_event_pic'		=> '请选择活动照片',//'Please choose the event photo',//
	'only_creator_can_set_admin'	=> '只有创建者可以设置其他组织者',//'Only the event creator can set the other organizers',//
	'event_not_set_verify'		=> '活动不需要审核',//'The event does not need verification',//
	'event_join_limit'		=> '此活动只有通过邀请才能加入',//'this event can be joined only by invitation',//
	'cannot_quit_event'		=> '您不能退出活动，因为您还没有加入活动或者您是这个活动的发起人',//'You can not exit the activity, because you have not joined the eventy or you are a initiator of this event.',//
	'event_not_public'		=> '这是一个非公开活动，只有通过邀请才能查看',//'This is a non-public event, and can be viewed only by invitation',//
	'no_privilege_do_event_invite'	=> '此活动不允用户邀请好友',//'This event not allow users to invite friends',//
	'event_under_verify'		=> '此活动正在审核中',//'This event is being verified for now',//
	'cityevent_under_condition'	=> '要浏览同城活动，需要先设置您的居住地',//'To view the same city activities, need to set your place of residence',//
	'event_is_over'			=> '此活动已经结束',//'This event has ended',//
	'event_meet_deadline'		=> '活动已经截止报名',//'The event have been Deadline',//
	'bad_userevent_status'		=> '请选择正确的活动成员状态',//'Please select the correct state of the event members',//
	'event_has_followed'		=> '您已经关注了此活动',//'You have been concerned about this event',//
	'event_has_joint'		=> '您已经加入了此活动',//'You have joined this event',//
	'event_is_closed'		=> '活动已经关闭',//'The event have been closed',//
	'event_only_allows_members_to_comment'	=> '此活动只允许活动成员发表留言',//'Active event members allowed to delivered messages',//
	'event_only_allows_admins_to_upload'	=> '此活动只有组织者可以上传照片',//'The event organizers can only upload photos',//
	'event_only_allows_members_to_upload'	=> '只有活动成员可以上传活动照片',//'Only active event members can upload photos',//
	'eventinvite_does_not_exist'		=> '您没有该活动的活动邀请',//'You do not have the events of the event invitation',//
	'event_can_not_be_opened'		=> '此活动现在不能被开启',//'This event can not be opened right now',//
	'event_can_not_be_closed'		=> '此活动现在不能被关闭',//'This event can not be shut down right now',//
	'event_only_allows_member_thread'	=> '只有活动成员才能发表或回复活动话题',//'only active event members can post or reply to topic',//
	'event_mtag_not_match'		=> '指定群组没有关联到本活动',//'specified group is not associated to the event',//
	'event_memberstatus_limit'	=> '此活动为私密活动，只有活动成员才能访问',//'This event is private, only active event members can access',//
	'choose_event_thread'		=> '请选择至少一个活动话题进行操作',//'Please select at least one active topics operation',//

//source/cp_magic.php
	'magicuse_success'		=> '道具使用成功了',//'Magic was used successfully',//
	'unknown_magic'			=> '指定的道具不存在或已被禁止使用',//'Specified magic does not exist or has been locked',//
	'choose_a_magic'		=> '请选择一个道具',//'Please select a magic',//
	'magic_is_closed'		=> '此道具已被禁用',//'This magic has been disabled',//
	'magic_groupid_not_allowed'	=> '您所在的用户组没有权限使用道具',//'Your user group does not have permission to use magics',//
	'input_right_buynum'		=> '请正确输入要购买的数量',//'Please enter the correct amount to buy',//
	'credit_is_not_enough'		=> '您的积分不够购买此道具',//'Your have no enough points o buy this magic',//
	'not_enough_storage'		=> '道具库存量不足，下次补给时间是 \\1',//'Magic inventory shortage, the next replenishment time is \\1',//
	'magicbuy_success'		=> '道具购买成功，花费积分 \\1',//'The magic is bought successfully, spent points: \\1',//
	'magicbuy_success_with_experence'	=> '道具购买成功，花费积分 \\1, 增加经验 \\2',//'The magic is bought successfully, spent points: \\1, gain experience \\2',//
	'bad_friend_username_given'	=> '输入的好友名无效',//'Entered friend name is invalid',//
	'has_no_more_present_magic'	=> '您还没有道具转让许可证，<a id="a_buy_license" href="cp.php?ac=magic&op=buy&mid=license" onclick="ajaxmenu(event, this.id, 1)">马上去购买</a>',//'You are not permitted to purchase magic, <a id="a_buy_license" href="cp.php?ac=magic&op=buy&mid=license" onclick="ajaxmenu(event, this.id, 1)">Buy License</a>',//
	'has_no_more_magic'		=> '您还没有道具 \\1，<a id="\\2" href="\\3" onclick="ajaxmenu(event, this.id, 1)">立刻购买</a>',//'You have no magic \\1, <a id="\\2" href="\\3" onclick="ajaxmenu(event, this.id, 1)">Buy</a>',//
	'magic_can_not_be_presented'	=> '此道具不能被赠送',//'This magic can not be presented',//
	'magicpresent_success'		=> '已成功向 \\1 赠送了道具',//'has been able to \\1 donated props',//
	'magic_store_is_closed'		=> '道具商店已经关闭',//'Magic shop has been closed',//
	'magic_not_used_under_right_stage'	=> '此道具不能在当前场景使用',//'This magic can not be used in the current stage',//
	'magic_groupid_limit'		=> '您当前所在的用户组不能购买该道具',//'Your current user groups can not buy the magics',//
	'magic_usecount_limit'		=> '受道具使用周期限制，您现在还不能使用此道具。<br>请于 \\1 之后使用',//'Subject to restrictions on props use cycle, you still can not use the props.<br>Please \\1 after the use of',//
	'magicuse_note_have_no_friend'	=> '您没有任何好友',//'You does not have any friends',//
	'magicuse_author_limit'		=> '此道具只能对自己发布的信息使用',//'This magic can only release information on their use',//
	'magicuse_object_count_limit'	=> '此道具对同一信息使用次数已达到上限（\\1 次）',//'The number of magic use for the same information has reached the limit (\\1)',//
	'magicuse_object_once_limit'	=> '已经对该信息使用过此道具，不能重复使用',//'has the information used for this magic, can not re-use',//
	'magicuse_bad_credit_given'	=> '您输入的积分数无效',//'Number of points you entered is invalid',//
	'magicuse_not_enough_credit'	=> '您输入的积分数超过所当前拥有的积分',//'Entered number of points is large than you have for now',//
	'magicuse_bad_chunk_given'	=> '您输入的单份积分数无效',//'You entered an invalid number of points',//
	'magic_gift_already_given_out'	=> '红包已经被领完了',//'Gift has been given allready',//
	'magic_got_gift'		=> '您已经领取到了红包：增加 \\1 个积分',//'You have received a gift to: Add \\1 points',//
	'magic_had_got_gift'		=> '您已经领取过此次红包了',//'You have received a gift',//
	'magic_has_no_gift'		=> '当前空间没有设置红包',//'Current space has no gifts',//
	'magicuse_object_not_exist'	=> '道具的作用对象不存在',//'The role of magic object does not exist',//
	'magicuse_bad_object'		=> '没有正确选择道具要作用的对象',//'Invalid magic choice for the role of the object',//
	'magicuse_condition_limit'	=> '道具的发起条件不足',//'Magic launch conditions reach limit',//
	'magicuse_bad_dateline'		=> '输入的时间无效',//'Invalid time',//
	'magicuse_not_click_yet'	=> '您还没有对该信息表态过',//'You do not stand over the information',//
	'not_enough_coupon'		=> '代金券数目不足',//'Insufficient number of coupons',//
	'magicuse_has_no_valid_friend'	=> '道具使用失败，没有任何合法的好友',//'Magic use failed, there is no legitimate Friends',//
	'magic_not_hidden_yet'		=> '您现在不是隐身状态',//'You are not in invisible state yet',//
	'magic_not_for_sale'		=> '此道具不能通过购买获得',//'This dummy can not be buyed',//
	'not_set_gift'		=> '您当前没有设置红包',//'You do not set the gift',//
	'not_superstar_yet'	=> '您还不是超级明星',//'You are not a superstar yet',//
	'no_flicker_yet'	=> '您还没有对此信息使用彩虹炫',//'You do not use this information flicker yet',//
	'no_color_yet'		=> '您还没有对此信息使用彩色灯',//'You do not have this information used color lights',//
	'no_frame_yet'		=> '您还没有对此信息使用相框',//'You do not use this information frames',//
	'no_bgimage_yet'	=> '您还没有对此信息使用信纸',//'You do not use this information background image',//
	'bad_buynum'		=> '您输入的购买数目有误',//'The number you entered is incorrect to buy',//

	'feed_no_found'		=> '指定要查看的动态不存在',//'Specified feed does not exist',//
	'not_open_updatestat'	=> '站点没有开启趋势统计功能',//'Site did not open the trend statistical functions',//
	
	'topic_subject_error'	=> '标题长度不要少于4个字符',//'Title length can not be less than 4 characters',//
	'topic_no_found'	=> '指定要查看的热闹不存在',//'Specified topic does not exist',//
	'topic_list_none'	=> '目前还没有可以参与的热闹',//'There are no topics yet',//

	'space_has_been_locked'	=> '空间已被锁定无法访问，如有疑问请联系管理员',//'The space has been locked and can not be accessed. if in doubt please contact the administrator',//


//-----------------------------------------------------
// Added by vot [at] sources.ru

//source/task/avatar.php

	'uc_update_avatar'	=> '这个功能要求您的UCenter的Server端的 avatar.php 程序需要进行升级.<br>如果您是本站管理员,请通过下面的地址下载 avatar.php 文件的压缩包,并覆盖您的UCenter根目录中的同名文件即可.<br><a href="http://u.discuz.net/download/avatar.zip">http://u.discuz.net/download/avatar.zip</a>',//'This feature requires that your UCenter at Server side avatar.php need to be updated.<br>If you are the site administrator, please download the following address avatar.php file compression package, and cover your UCenter document root directory of the same name can be.<br><a href="http://u.discuz.net/download/avatar.zip"> http://u.discuz.net/download/avatar.zip</a>',//

	''	=> '',//'',

	
);

