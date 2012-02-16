<?php
//------------------------------------------------------
// INTERNATIONAL UCenter v.1.6.0 (Multilingual)
// by Valery Votintsev, codersclub.org
//------------------------------------------------------
// Based on UCenter 1.6.0, (c) Comsenz.inc, discuz.net
//------------------------------------------------------
// Thai Language Pack
// by Valery Votintsev, codersclub.org
//------------------------------------------------------

$lang = array(
	'please_login'			=> 'กรุณาเข้าสู่ระบบ',
	'receiver_no_exists'		=> 'คุณยังไม่ได้ระบุชื่อผู้รับหรือชื่อผู้รับไม่ถูกต้อง กรุณากลับไปแก้ไข',
	'pm_save_succeed'		=> 'ข้อความร่างถูกบันทึกไว้ที่กล่องข้อความร่าง เรียบร้อย',
	'pm_send_succeed'		=> 'ข้อความทั้งหมด $sent ถูกส่งเรียบร้อย',
	'pm_send_announce_succeed'	=> 'ส่งข้อความประกาศข่าวสารเรียบร้อย',
	'pm_send_ignore'		=> 'ไม่สามารถส่งข้อความส่วนตัวได้',
	'pm_delete_succeed'		=> 'ลบข้อความส่วนตัวเรียบร้อย',
	'pm_delete_invalid'		=> 'ผิดพลาด!! ไม่สามารถลบข้อความส่วนตัวได้',
	'pm_unread'			=> 'ทำเครื่องหมายว่ายังไม่ได้อ่าน',
	'blackls_updated'		=> 'อัพเดตรายชื่อที่ไม่ต้องการติดต่อ',
	'pm_kickmember_succeed'		=> 'The member successfully kicked out from the group chat',
	'pm_appendmember_succeed'	=> 'New member successfully joined to the group chat',
	'pm_appendmember_invalid'	=> 'Failed to add a new members',
	'pm_send_chatpmmemberlimit_error'	=> 'The maximum number of group chat exceeded',
	'pm_send_pmfloodctrl_error'		=> 'You are sending short messages in too short interval! Please send later.',
	'pm_send_privatepmthreadlimit_error'	=> 'You have exceeded the maximum number of messages per 24 hours',
	'pm_send_chatpmthreadlimit_error'	=> 'You have exceeded the maximum number of group chat messages per 24 hours',
	'pm_clear_processing'			=> 'Processing messages from current to next ',
	'pm_clear_succeed'			=> 'Operation successfully completed',
	'pm_delete_noselect'			=> 'Please select messages for processing',

	'db_export_filename_invalid'	=> 'You have not enter the backup file name, or you use the invalid extension, please return.',
	'db_export_file_invalid'	=> 'ไม่สามารถสำรองข้อมูลได้ กรุณาเช็คไดเรคทอรี่และสิทธิการเข้าถึง',
	'db_export_multivol_redirect'	=> 'ปริมาณการสำรองข้อมูล: ไฟลล์ที่ #$volume สำรองเรียบร้อย, ระบบกำลังดำเนินการอัตโนมัติ',
	'db_export_multivol_succeed'	=> 'สำรองข้อมูลทั้งหมด $volume ไฟล์ เรียบร้อย, สำรองข้อมูลเสร็จสิ้น.<a href="admin.php?m=db&a=ls">คลิ๊กกลับไปที่เมนูสำรองข้อมูล</a>.<br />$filelist',
	'db_import_multivol_succeed'	=> 'นำเข้าฐานข้อมูลเรียบร้อย',
	'db_import_file_illegal'	=> 'ไม่พบไฟล์ฐานข้อมูล: Server อาจจะไม่อนุญาติให้อัพโหลดหรือขนาดไฟล์ใหญ่เกินไป',
	'db_import_multivol_redirect'	=> 'Volume Data #$volume was imported to the database successfully, the program will import other volumes automatically.',
	'db_back_api_url_invalid'	=> 'Unable to connect this application backup port, please copy the file under Ucenter ROOT "api/dbbak.php" to this application "API" folder',
	'delete_dumpfile_success'	=> 'Bakup file Deleted successfully',
	'delete_dumpfile_redirect'	=> 'The backup file # of $appname deleted successfully, the program will delete other application backup files automatically.',
	'dbback_error_code_1'		=> 'Unable to create folder',
	'dbback_error_code_2'		=> 'Write backup file failed',
	'dbback_error_code_3'		=> 'SQL Query error',
	'dbback_error_code_4'		=> 'The directory is empty or does not exists',
	'dbback_error_code_5'		=> 'Backup file Not found',
	'dbback_error_code_6'		=> 'Backup files is missing',
	'dbback_error_code_7'		=> 'The directory is not exists',
	'dbback_error_code_8'		=> 'Delete backup file failed',
	'dbback_error_code_9'		=> 'The backup API does not support this type of backup',
	'undefine_error'		=> 'Unknown Error',

	'app_add_url_invalid'		=> 'อินเตอร์เฟส URL address ไม่ถูกต้อง',
	'app_add_ip_invalid'		=> 'IP address ไม่ถูกต้อง',
	'app_add_name_invalid'		=> 'Application name is invalid or duplicates with other applications. Please return to change',
	'read_plugin_invalid'		=> 'ปลั๊กอินไม่ถูกต้อง',

	'syncappcredits_updated'	=> 'ตั้งค่าคะแนนเรียบร้อย',

	'note_succeed'			=> 'Notified successfully',
	'note_false'			=> 'Notification failed',
	'no_permission_for_this_module'	=> 'You have no permission to manage module',
	'admin_user_exists'		=> 'This username is already exists, please return.',

	'mail_succeed'			=> 'Mail Sent Succeessfully',
	'mail_false'			=> 'Send Mail Failed',
	
	'user_edit_noperm'		=> 'You have no permission to edit this user',

	'appid_invalid'			=> 'Illegal Application ID',
	'app_apifile_not_exists'	=> 'The file "#$apifile" does not exists, please check the application path.',
	'app_apifile_too_low'		=> 'The API file "#$apifile" version is too low',
	'app_path_not_exists'		=> 'This path is not exists, please check',
	'pm_send_seccode_error'		=> 'Incorrect Security Code',
	'pm_send_regdays_error'		=> 'You can not send message within #$pmsendregdays day(s) after the registration',
	'pm_send_limit1day_error'	=> 'Sorry, you have reached the 24 hours messages limit, please return.',
	'pm_send_floodctrl_error'	=> 'Sorry, you try to send messages too fast, please return',
	
	'file_check_failed'		=> 'Checked file does not exist, can not check',
);