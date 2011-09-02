<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_cpmessage.php 12878 2009-07-24 05:59:38Z xupeng $

	AdminCP Messages Language Sentences

*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(
//common
	'do_success'	=> '进行的操作完成了',//'The operation was completed successfully.',//

//admincp.php
	'enter_the_password_is_incorrect'	=> '输入的密码不正确，请重新尝试',//'Invalid password entered. Please try again.',//
	'excessive_number_of_attempts_to_sign'	=> '您30分钟内尝试登录管理平台的次数超过了3次，为了数据安全，请稍候再试',//'You tried to log in more than 3 times within 30 minutes. For data security, please try again later after 30 minutes.',//

//admincp.php

//admin/admincp_ad.php
	'no_authority_management_operation'	   	=> '对不起,您没有权限进行本管理操作',//'Sorry, you have no permission for this operation.',//
	'please_check_whether_the_option_complete_required'	=> '请检查必填选项是否填写完整',//'Please check the required option is completed.',//
	'please_choose_to_remove_advertisements'   	=> '请至少选择一个要删除的广告',//'Please select at least one ads to remove',//
	'no_authority_management_operation_edittpl'	=> '安全考虑，在线编辑模板功能默认关闭，并且只有创始人可以操作。如果您想使用此功能，请修改config.php中的相关配置。',//'security concerns, online editing template feature is off by default, and only the founder can be manipulated. If you want to use this feature, change the config.php to the relevant configuration.',//
	'no_authority_management_operation_backup' 	=> '安全考虑，数据库备份恢复操作只有创始人可以操作。如果您想使用此功能，请修改config.php中的相关配置。',//'security, database backup and recovery operations can be operated only founder. If you want to use this feature, change the config.php to the relevant configuration.',//

//admin/admincp_album.php
	'at_least_one_option_to_delete_albums'	=> '请至少正确选择一个要删除的相册',//'Please select at least one proper album to be deleted.',//

//admin/admincp_backup.php
	'data_import_failed_the_file_does_not_exist'	=> '数据导入失败,文件不存在',//'Data import failed, the file does not exist.',//
	'start_transferring_data'		=> '数据导入开始',//'Data transfer started...',//
	'wrong_data_file_format_into_failure'	=> '数据导入失败,文件格式不对',//'Data import failed, the file format is invalid.',//
	'documents_were_incorrect_length'	=> '文件名长度不正确',//'File name length is incorrect.',//
	'backup_table_wrong'			=> '备份表出错',//'Backup teble is wrong.',//
	'failure_writes_the_document_check_file_permissions'	=> '写入文件失败,请检查文件权限',//'Write to file failed, please check the file permissions.',//
	'successful_data_compression_and_backup_server_to'	=> '数据成功备份并压缩至服务器',//'Data successfully backed up, compressed and saved to the server.',//
	'backup_file_compression_failure'	=> '对不起,备份数据文件压缩失败,请检查目录权限',//'Sorry, backup file compression failed, check the directory permissions.',//
	'shell_backup_failure'			=> 'SHELL备份失败',//'SHELL backup failed.',//
	'data_file_does_not_exist'		=> '对不起, 数据文件不存在,请检查',//'Sorry, the data file does not exist, please check the filename.',//
	'the_volumes_of_data_into_databases_success'	=> '分卷数据成功导入UCenter Home数据库.',//'The data was successfully imported into UCenter Home database.',//
	'data_file_does_not_exist'		=> '对不起数据文件不存在请检查',//'Sorry, the data file does not exist. Please check a filename.',//
	'data_file_format_is_wrong_not_into'	=> '数据文件非格式，无法导入。',//'The data file can not be imported because of wrong format.',//
	'directory_does_not_exist_or_can_not_be_accessed'	=> '目录不存在或无法访问，请检查 \\1 目录。',//'Directory does not exist or can not access. Please check the \\1 directory existance.',//
	'vol_backup_database'			=> '分卷备份: 数据文件 # \\1 成功创建，程序将自动继续。',//'Volume backup: data file # \\1 successfully created. The program will automatically continue.',//
	'complete_database_backup'		=> '恭喜您，全部 \\1 个备份文件成功创建，备份完成。',//'Congratulations, all of \\1 backup file created successfully, the backup completed.',//
	'decompress_data_files_success'		=> '数据文件 # \\1 成功解压缩，程序将自动继续。',//'Data file # \\1 was successful decompressed, the program will automatically continue.',//
	'data_files_into_success'		=> '数据文件 # \\1 成功导入，程序将自动继续。',//'Data file # \\1 was successfully imported, the program will automatically continue.',//

//admin/admincp_block.php
	'correctly_completed_module_name'			=> '请正确填写数据模块的名称',//'Please fill in a correct module name.',//
	'a_call_to_delete_the_specified_modules_success'	=> '指定的数据调用模块删除成功了',//'Specified module was deleted successfully.',//
	'designated_data_transfer_module_does_not_exist'	=> '指定的数据调用模块不存在',//'Specified module does not exist.',//
	'sql_statements_can_not_be_completed_for_normal'	=> '填写的SQL语句不能正常查询，请返回检查。<br>服务器反馈：<br>ERROR: \\1<br>ERRNO. \\2',//'SQL statement can not be properly completed, please check the query.<br>Server responce:<br>ERROR: \\1 <br>ERRNO: \\2',//
	'enter_the_next_step'					=> '进入下一步操作',//'Go to next step',//
	'choose_to_delete_the_data_transfer_module'		=> '请至少选择一个要删除的数据调用模块',//'Please select at least one module to delete.',//

//admin/admincp_blog.php
	'the_correct_choice_to_delete_the_log'	=> '请至少正确选择一个要删除的日志',//'Please select at least one blog to remove.',//
	'the_correct_choice_to_add_topic'	=> '推荐到指定热点出错，请确认是否正确操作',//'Recommendation to the HOT failed, please confirm the correct operation.',//
	'add_topic_success'			=> '推荐到热点完成了，产生了 \\1 个相关动态',//'Recommendation to the HOT completed, resulting in \\1 an associated dynamically.',//

//admin/admincp_cache.php

//admin/admincp_censor.php

//admin/admincp_comment.php
	'the_correct_choice_to_delete_comments'	=> '请至少正确选择一个要删除的评论',//'Please select at least one comment to delete.',//
	'choice_batch_action'	=> '请选择要进行的操作类型',//'Please select the type of action to be performed.',//

//admin/admincp_config.php
	'ip_is_not_allowed_to_visit_the_area'	=> '当前的IP( \\1 )不在允许访问的IP范围内，请检查设置',//'Access to this area is disabled for current IP (\\1). Please check the settings.',//
	'the_prohibition_of_the_visit_within_the_framework_of_ip'	=> '当前的IP( \\1 )在禁止访问的IP范围内，请检查设置',//'Access to this area is disabled for this IP range (\\1). Please check the settings.',//

	'config_uc_dir_error'	=> '设置的UCenter物理路径不正确，请返回检查',//'UCenter physical path is incorrect, please return to check.',//

//admin/admincp_credit.php
	'rules_do_not_exist_points'	=> '该积分规则不存在',//'There is no Rules for this action.',//

//admin/admincp_cron.php
	'designated_script_file_incorrect'	=> '指定的脚本文件不正确',//'Specified script file is not correct.',//
	'implementation_cycle_incorrect_script'	=> '设定的脚本执行周期不正确',//'The script execution cycle is not correct.',//

//admin/admincp_item.php
	'choose_to_delete_events'	=> '请至少正确选择一个要删除的事件',//'Please select at least one event to delete.',//

//admin/admincp_mtag.php
	'choose_to_delete_the_columns_tag'		=> '请至少正确选择一个要删除的群组',//'Please select at least one column to delete.',//
	'designated_to_merge_the_columns_do_not_exist'	=> '要合并到的新群组还没有创建，请先自行创建此群组后再进行合并',//'Should be merged into the new column has not been created. First on their own to create this column after the merger.',//
	'the_successful_merger_of_the_designated_columns'	=> '合并指定的群组成功了',//'Successfully merged to the designated column.',//
	'columns_option_to_merge_the_tag'		=> '请至少正确选择一个要合并的群组',//'Please select at least one column to merge.',//
	'lock_open_designated_columns_tag_success'	=> '锁定/开放指定的群组成功了',//'Specified column successfully locked/opened.',//
	'recommend_designated_columns_tag_success'	=> '推荐/取消推荐指定的群组成功了',//'Specified column successfully recommended/unrecommended.',//
	'choose_to_operate_columns_tag'			=> '请至少正确选择一个要操作的群组',//'Please select at least one column to operate with.',//

	'failed_to_change_the_length_of_columns'	=> '栏目长度变更失败，这可能是现存的数据已经超过新长度',//'Change column length failed. This may be the existing data over the new length.',//

//admin/admincp_pic.php
	'choose_to_delete_pictures'	=> '请至少正确选择一个要删除的图片',//'Please select at least one picture to remove',//

//admin/admincp_post.php
	'choose_to_delete_the_topic'	=> '请至少正确选择一个要删除的话题',//'Please select at least one topic to delete',//

//admin/admincp_profield.php
	'there_is_no_designated_users_columns'	=> '指定操作的群组栏目不存在',//'Specified designation column does not exist.',//
	'choose_to_delete_the_columns'		=> '请正确选择要删除的栏目',//'Please select the correct column to be deleted.',//
	'have_one_mtag'				=> '删除失败，请至少要保留一个群组栏目',//'Delete failed, at least one group section keep it.',//
	
//admin/admincp_poll.php
	'the_correct_choice_to_delete_the_poll'	=> '请至少正确选择一个要删除的投票',//'Please select at least one poll to delete.',//

//admin/admincp_report.php
	'the_right_to_report_the_specified_id'	=> '请正确指定举报ID',//'Please specify the correct report ID.',//

//admin/admincp_share.php
	'please_delete_the_correct_choice_to_share'	=> '请正确选择要删除的分享',//'Please select correct share to delete.',//

//admin/admincp_space.php
	'designated_users_do_not_exist'	=> '您指定的用户不存在',//'Specified user does not exist.',//
	'choose_to_delete_the_space'	=> '请正确选择要删除的空间',//'Please select correct Space to remove.',//
	'not_have_permission_to_operate_founder'	=> '你没有权限对创始人进行操作',//'You have no permission to operate with a founder.',//
	'uc_error'			=> '与用户中心通信出错，请稍后再试',//'UCenter communications error, please try again later or check the UC configuration.',//

//admin/admincp_stat.php
	'choose_to_reconsider_statistical_data_types'	=> '请正确选择要重新统计的数据类型',//'Please select a correct data type of statistics.',//
	'data_processing_please_wait_patiently'		=> '<a href="\\1">处理数据中( \\2 )，请耐心等候...</a> (<a href="\\3">强制终止</a>)',//'<a href="\\1">processing the data ( \\2 ) , please wait ...</a> (<a href="\\3">Terminate now!</a>)',//

//admin/admincp_tag.php
	'choose_to_delete_the_tag'	=> '请至少正确选择一个要删除的标签',//'Please select at least one tag to remove.',//
	'to_merge_the_tag_name_of_the_length_discrepancies'	=> '指定的要合并到的tag名称字符长度不符合要求(1~30个字符)',//'Specify the tag name to be merged into the character length does not meet requirements (1 to 30 characters).',//
	'the_tag_choose_to_merge'	=> '请至少正确选择一个要合并的标签',//'Please select at least one correct tag to be merged.',//
	'choose_to_operate_tag'		=> '请至少正确选择一个要操作的标签',//'Please select at least one tag to operate with.',//

//admin/admincp_template.php
	'designated_template_files_can_not_be_restored'			=> '指定的模板文件不能恢复',//'Specified template file can not be restored.',//
	'template_files_editing_failure_check_directory_competence'	=> '指定的模板文件无法编辑,请检查 ./template 目录权限设置',//'Specified template file can not be edited, please check the /template directory permissions.',//

//admin/admincp_thread.php
	'choosing_to_operate_the_topic'	=> '请正确选择要操作的话题',//'Please select the correct topic to operate with.',//

//admin/admincp_usergroup.php
	'user_group_does_not_exist'	=> '指定操作的用户组不存在',//'Specified user group does not exist.',//
	'user_group_were_not_empty'	=> '指定的用户组名不能为空',//'Specified user group name can not be empty.',//
	'integral_limit_duplication_with_other_user_group'	=> '指定的积分下限跟其他用户组重复',//'Specified lower limit of the group is allready used in other user groups.',//
	'system_user_group_could_not_be_deleted'		=> '系统用户组不能删除',//'System user group can not be deleted.',//
	'integral_limit_error'		=> '指定的积分下限上能超过999999999，下限不能低于-999999998',//'Specified interval lower limit can not be more than 999,999,999, and lower limit can not be less than -999 999 998',//

//admin/admincp_userapp.php
	'my_register_sucess'	=> '成功开启用户应用服务',//'Successfully registered the user application.',//
	'my_register_error'	=> '开启用户应用服务失败，失败原因：<br>\\2 (ERRCODE:\\1)<br><br><a href="http://www.discuz.net/index.php?gid=141" target="_blank">如果有疑问，请访问我们的技术论坛寻求帮助</a>。',//'Registration of the user application failed because of:<br>\\2 (ERRCODE: \\1) <br><br><a href="http://www.discuz.net/index.php?gid=141" target="_blank">. If you have questions, please visit our technical forum for help</a>.',//
	'sitefeed_error'	=> '请正确添加动态标题、动态内容再提交发布',//'Please correct the title to add dynamic, dynamic content to submit feed release.',//

//admin/admincp_event.php
	'choose_to_delete_the_columns_event'	=> '请选择要删除的活动',//'Please select the column event you want to delete.',//
	'choose_to_grade_the_columns_event'	=> '请选择要设置的活动状态，新状态不能和原状态相同',//'Please select the event active state. New state can not be equal to the current state.',//
	'have_no_eventclass'			=> '删除失败，请保留至少一个活动分类',//'Delete failed, leave at least one activity type!',//
	'poster_only_jpg_allowed'		=> '由于您的服务器不支持生成缩略图，您在此处只能上传 jpg 格式的图片',//'The server does not support generating thumbnails, so you can upload only jpg format picture.',//

);

