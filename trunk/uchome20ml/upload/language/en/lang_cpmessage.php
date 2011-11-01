<?php
/*
	[UCenter Home] (C) 2007-2009 Comsenz Inc.
	$Id: lang_cpmessage.php 12878 2009-07-24 05:59:38Z xupeng $

	AdminCP Messages Language Sentences

	Translated by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(
//common
	'do_success'	=> 'The operation was completed successfully.',//'进行的操作完成了',

//admincp.php
	'enter_the_password_is_incorrect'	=> 'Invalid password entered. Please try again.',//'输入的密码不正确，请重新尝试',
	'excessive_number_of_attempts_to_sign'	=> 'You tried to log in more than 3 times within 30 minutes. For data security, please try again later after 30 minutes.',//'您30分钟内尝试登录管理平台的次数超过了3次，为了数据安全，请稍候再试',

//admincp.php

//admin/admincp_ad.php
	'no_authority_management_operation'	   	=> 'Sorry, you have no permission for this operation.',//'对不起,您没有权限进行本管理操作',
	'please_check_whether_the_option_complete_required'	=> 'Please check the required option is completed.',//'请检查必填选项是否填写完整',
	'please_choose_to_remove_advertisements'   	=> 'Please select at least one ads to remove',//'请至少选择一个要删除的广告',
	'no_authority_management_operation_edittpl'	=> 'security concerns, online editing template feature is off by default, and only the founder can be manipulated. If you want to use this feature, change the config.php to the relevant configuration.',//'安全考虑，在线编辑模板功能默认关闭，并且只有创始人可以操作。如果您想使用此功能，请修改config.php中的相关配置。',
	'no_authority_management_operation_backup' 	=> 'security, database backup and recovery operations can be operated only founder. If you want to use this feature, change the config.php to the relevant configuration.',//'安全考虑，数据库备份恢复操作只有创始人可以操作。如果您想使用此功能，请修改config.php中的相关配置。',

//admin/admincp_album.php
	'at_least_one_option_to_delete_albums'	=> 'Please select at least one proper album to be deleted.',//'请至少正确选择一个要删除的相册',

//admin/admincp_backup.php
	'data_import_failed_the_file_does_not_exist'	=> 'Data import failed, the file does not exist.',//'数据导入失败,文件不存在',
	'start_transferring_data'		=> 'Data transfer started...',//'数据导入开始',
	'wrong_data_file_format_into_failure'	=> 'Data import failed, the file format is invalid.',//'数据导入失败,文件格式不对'
	'documents_were_incorrect_length'	=> 'File name length is incorrect.',//'文件名长度不正确',
	'backup_table_wrong'			=> 'Backup list error.',//'备份表出错',
	'failure_writes_the_document_check_file_permissions'	=> 'Write to file failed, please check the file permissions.',//'写入文件失败,请检查文件权限',
	'successful_data_compression_and_backup_server_to'	=> 'Data successfully backed up, compressed and saved to the server.',//'数据成功备份并压缩至服务器',
	'backup_file_compression_failure'	=> 'Sorry, back up file compression failed, check the directory permissions.',//'对不起,备份数据文件压缩失败,请检查目录权限',
	'shell_backup_failure'			=> 'SHELL backup failed.',//'SHELL备份失败',
	'data_file_does_not_exist'		=> 'Sorry, the data file does not exist, please check the filename.',//'对不起, 数据文件不存在,请检查',
	'the_volumes_of_data_into_databases_success'	=> 'The data was successfully imported into UCenter Home database.',//'分卷数据成功导入UCenter Home数据库.',
	'data_file_does_not_exist'		=> 'Sorry, the data file does not exist. Please check a filename.',//'对不起数据文件不存在请检查',
	'data_file_format_is_wrong_not_into'	=> 'The data file can not be imported because of wrong format.',//'数据文件非格式，无法导入。',
	'directory_does_not_exist_or_can_not_be_accessed'	=> 'Directory does not exist or can not access. Please check the \\1 directory existance.',//'目录不存在或无法访问，请检查 \\1 目录。',
	'vol_backup_database'			=> 'Volume backup: data file # \\1 successfully created. The program will automatically continue.',//'分卷备份: 数据文件 # \\1 成功创建，程序将自动继续。',
	'complete_database_backup'		=> 'Congratulations, all of \\1 backup file created successfully, the backup completed.',//'恭喜您，全部 \\1 个备份文件成功创建，备份完成。',
	'decompress_data_files_success'		=> 'Data file # \\1 was successful decompressed, the program will automatically continue.',//'数据文件 # \\1 成功解压缩，程序将自动继续。',
	'data_files_into_success'		=> 'Data file # \\1 was successfully imported, the program will automatically continue.',//'数据文件 # \\1 成功导入，程序将自动继续。',

//admin/admincp_block.php
	'correctly_completed_module_name'			=> 'Please fill in a correct module name.',//'请正确填写数据模块的名称',
	'a_call_to_delete_the_specified_modules_success'	=> 'Specified module was deleted successfully.',//'指定的数据调用模块删除成功了',
	'designated_data_transfer_module_does_not_exist'	=> 'Specified module does not exist.',//'指定的数据调用模块不存在',
	'sql_statements_can_not_be_completed_for_normal'	=> 'SQL statement can not be properly completed, please check the query.<br>Server responce:<br>ERROR: \\1 <br>ERRNO: \\2',//'填写的SQL语句不能正常查询，请返回检查。<br>服务器反馈：<br>ERROR: \\1<br>ERRNO. \\2',
	'enter_the_next_step'					=> 'Go to next step',//'进入下一步操作',
	'choose_to_delete_the_data_transfer_module'		=> 'Please select at least one module to delete.',//'请至少选择一个要删除的数据调用模块',

//admin/admincp_blog.php
	'the_correct_choice_to_delete_the_log'	=> 'Please select at least one blog to remove.',//'请至少正确选择一个要删除的日志',
	'the_correct_choice_to_add_topic'	=> 'Recommendation to the HOT failed, please confirm the correct operation.',//'推荐到指定热点出错，请确认是否正确操作',
	'add_topic_success'			=> 'Recommendation to the HOT completed, resulting in \\1 an associated dynamically.',//'推荐到热点完成了，产生了 \\1 个相关动态',

//admin/admincp_cache.php

//admin/admincp_censor.php

//admin/admincp_comment.php
	'the_correct_choice_to_delete_comments'	=> 'Please select at least one comment to delete.',//'请至少正确选择一个要删除的评论',
	'choice_batch_action'	=> 'Please select the type of action to be performed.',//'请选择要进行的操作类型',

//admin/admincp_config.php
	'ip_is_not_allowed_to_visit_the_area'	=> 'Access to this area is disabled for current IP (\\1). Please check the settings.',//'当前的IP( \\1 )不在允许访问的IP范围内，请检查设置',
	'the_prohibition_of_the_visit_within_the_framework_of_ip'	=> 'Access to this area is disabled for this IP range (\\1). Please check the settings.',//'当前的IP( \\1 )在禁止访问的IP范围内，请检查设置',

	'config_uc_dir_error'	=> 'UCenter physical path is incorrect, please return to check.',//'设置的UCenter物理路径不正确，请返回检查',

//admin/admincp_credit.php
	'rules_do_not_exist_points'	=> 'There is no Rules for this action.',//'该积分规则不存在',

//admin/admincp_cron.php
	'designated_script_file_incorrect'	=> 'Specified script file is not correct.',//'指定的脚本文件不正确',
	'implementation_cycle_incorrect_script'	=> 'The script execution cycle is not correct.',//'设定的脚本执行周期不正确',

//admin/admincp_item.php
	'choose_to_delete_events'	=> 'Please select at least one event to delete.',//'请至少正确选择一个要删除的事件',

//admin/admincp_mtag.php
	'choose_to_delete_the_columns_tag'		=> 'Please select at least one column to delete.',//'请至少正确选择一个要删除的群组',
	'designated_to_merge_the_columns_do_not_exist'	=> 'Should be merged into the new column has not been created. First on their own to create this column after the merger.',//'要合并到的新群组还没有创建，请先自行创建此群组后再进行合并',
	'the_successful_merger_of_the_designated_columns'	=> 'Successfully merged to the designated column.',//'合并指定的群组成功了',
	'columns_option_to_merge_the_tag'		=> 'Please select at least one column to merge.',//'请至少正确选择一个要合并的群组',
	'lock_open_designated_columns_tag_success'	=> 'Specified column successfully locked/opened.',//'锁定/开放指定的群组成功了',
	'recommend_designated_columns_tag_success'	=> 'Specified column successfully recommended/unrecommended.',//'推荐/取消推荐指定的群组成功了',
	'choose_to_operate_columns_tag'			=> 'Please select at least one column to operate with.',//'请至少正确选择一个要操作的群组',

	'failed_to_change_the_length_of_columns'	=> 'Change column length failed. This may be the existing data over the new length.',//'栏目长度变更失败，这可能是现存的数据已经超过新长度',

//admin/admincp_pic.php
	'choose_to_delete_pictures'	=> 'Please select at least one picture to remove',//'请至少正确选择一个要删除的图片',

//admin/admincp_post.php
	'choose_to_delete_the_topic'	=> 'Please select at least one topic to delete',//'请至少正确选择一个要删除的话题',

//admin/admincp_profield.php
	'there_is_no_designated_users_columns'	=> 'Specified designation column does not exist.',//'指定操作的群组栏目不存在',
	'choose_to_delete_the_columns'		=> 'Please select the correct column to be deleted.',//'请正确选择要删除的栏目',
	'have_one_mtag'				=> 'Delete failed, at least one group section keep it.',//'删除失败，请至少要保留一个群组栏目',
	
//admin/admincp_poll.php
	'the_correct_choice_to_delete_the_poll'	=> 'Please select at least one poll to delete.',//'请至少正确选择一个要删除的投票',

//admin/admincp_report.php
	'the_right_to_report_the_specified_id'	=> 'Please specify the correct report ID.',//'请正确指定举报ID',

//admin/admincp_share.php
	'please_delete_the_correct_choice_to_share'	=> 'Please select correct share to delete.',//'请正确选择要删除的分享',

//admin/admincp_space.php
	'designated_users_do_not_exist'	=> 'Specified user does not exist.',//'您指定的用户不存在',
	'choose_to_delete_the_space'	=> 'Please select correct Space to remove.',//'请正确选择要删除的空间',
	'not_have_permission_to_operate_founder'	=> 'You have no permission to operate with a founder.',//'你没有权限对创始人进行操作',
	'uc_error'			=> 'UCenter communications error, please try again later or check the UC configuration.',//'与用户中心通信出错，请稍后再试',

//admin/admincp_stat.php
	'choose_to_reconsider_statistical_data_types'	=> 'Please select a correct data type of statistics.',//'请正确选择要重新统计的数据类型',
	'data_processing_please_wait_patiently'		=> '<a href="\\1">processing the data ( \\2 ) , please wait ...</a> (<a href="\\3">Terminate now!</a>)',//'<a href="\\1">处理数据中( \\2 )，请耐心等候...</a> (<a href="\\3">强制终止</a>)',

//admin/admincp_tag.php
	'choose_to_delete_the_tag'	=> 'Please select at least one tag to remove.',//'请至少正确选择一个要删除的标签',
	'to_merge_the_tag_name_of_the_length_discrepancies'	=> 'Specify the tag name to be merged into the character length does not meet requirements (1 to 30 characters).',//'指定的要合并到的tag名称字符长度不符合要求(1~30个字符)',
	'the_tag_choose_to_merge'	=> 'Please select at least one correct tag to be merged.',//'请至少正确选择一个要合并的标签',
	'choose_to_operate_tag'		=> 'Please select at least one tag to operate with.',//'请至少正确选择一个要操作的标签',

//admin/admincp_template.php
	'designated_template_files_can_not_be_restored'			=> 'Specified template file can not be restored.',//'指定的模板文件不能恢复',
	'template_files_editing_failure_check_directory_competence'	=> 'Specified template file can not be edited, please check the /template directory permissions.',//'指定的模板文件无法编辑,请检查 ./template 目录权限设置',

//admin/admincp_thread.php
	'choosing_to_operate_the_topic'	=> 'Please select the correct topic to operate with.',//'请正确选择要操作的话题',

//admin/admincp_usergroup.php
	'user_group_does_not_exist'	=> 'Specified user group does not exist.',//'指定操作的用户组不存在',
	'user_group_were_not_empty'	=> 'Specified user group name can not be empty.',//'指定的用户组名不能为空',
	'integral_limit_duplication_with_other_user_group'	=> 'Specified lower limit of the group is allready used in other user groups.',//'指定的积分下限跟其他用户组重复',
	'system_user_group_could_not_be_deleted'		=> 'System user group can not be deleted.',//'系统用户组不能删除',
	'integral_limit_error'		=> 'Specified interval lower limit can not be more than 999,999,999, and lower limit can not be less than -999 999 998',//'指定的积分下限上能超过999999999，下限不能低于-999999998',

//admin/admincp_userapp.php
	'my_register_sucess'	=> 'Successfully registered the user application.',//'成功开启用户应用服务',
	'my_register_error'	=> 'Registration of the user application failed because of:<br>\\2 (ERRCODE: \\1) <br><br><a href="http://www.discuz.net/index.php?gid=141" target="_blank">If you have questions, please visit our technical forum for help</a>.',//'开启用户应用服务失败，失败原因：<br>\\2 (ERRCODE:\\1)<br><br><a href="http://www.discuz.net/index.php?gid=141" target="_blank">如果有疑问，请访问我们的技术论坛寻求帮助</a>。',
	'sitefeed_error'	=> 'Please correct the title to add dynamic, dynamic content to submit feed release.',//'请正确添加动态标题、动态内容再提交发布',

//admin/admincp_event.php
	'choose_to_delete_the_columns_event'	=>'Please select the column event you want to delete.',//'请选择要删除的活动',
	'choose_to_grade_the_columns_event'	=>'Please select the event active state. New state can not be equal to the current state.',//'请选择要设置的活动状态，新状态不能和原状态相同',
	'have_no_eventclass'			=>'Delete failed, leave at least one activity type!',//'删除失败，请保留至少一个活动分类',
	'poster_only_jpg_allowed'		=>'The server does not support generating thumbnails, so you can upload only jpg format picture.',//'由于您的服务器不支持生成缩略图，您在此处只能上传 jpg 格式的图片',

);

