<?php
//------------------------------------------------------
// INTERNATIONAL UCenter v.1.6.0 (Multilingual)
// by Valery Votintsev, codersclub.org
//------------------------------------------------------
// Based on UCenter 1.6.0, (c) Comsenz.inc, discuz.net
//------------------------------------------------------
// Arabic Language Pack
// by khalid nahhal at ar-discuz.com
//------------------------------------------------------

define('UC_VERNAME', 'English Version');

$lang = array(

	'SC_GBK'		=> 'Simplified Chinese GBK',
	'TC_BIG5'		=> 'Traditional Chinese BIG5',
	'SC_UTF8'		=> 'Simplified Chinese  UTF8',
	'TC_UTF8'		=> 'Traditional Chinese UTF8',
	'EN_ISO'		=> 'ENGLISH ISO8859',
	'EN_UTF8'		=> 'ENGLISH UTF-8',

	'title_install'		=> SOFT_NAME.' برنامج التثبيت',
	'agreement_yes'		=> 'موافق',
	'agreement_no'		=> 'لست موافق',
	'notset'		=> 'غير محدد',

	'message_title'		=> 'نصائح',
	'error_message'		=> 'خطأ',
	'message_return'	=> 'رجوع',
	'return'		=> 'رجوع',
	'install_wizard'	=> 'برنامج التثبيت',
	'config_nonexistence'	=> 'ملف الاعدادات غير موجود',
	'nodir'			=> 'المجلد غير موجود',
	'short_open_tag_invalid'	=> 'عذراً, الرجاء تفعيل دالة  "short_open_tag" في php.ini.',
	'redirect'			=> 'التثبيت سيبدأ تلقائياً.<br>اذا كان متصفحك لا يدعم الانتقال التلقائي, اضغط هنا',

	'database_errno_2003'	=> 'لا يمكن الاتصال بقاعدة البيانات,تأكد من معلومات الاتصال',
	'database_errno_1044'	=> 'غير قادر على انشاء قاعدة بيانات جديدة, الرجاء التأكد من اسم قاعدة البيانات',
	'database_errno_1045'	=> 'لا يمكن الاتصال بقاعدة البيانات, تأكد من كلمة المرور او اسم المستخدم',
	'database_errno_1064'	=> ' خطأ SQL ',

	'dbpriv_createtable'	=> 'لا يوجد صلاحية "CREATE TABLE" ',
	'dbpriv_insert'		=> 'لا يوجد صلاحية  "INSERT" ',
	'dbpriv_select'		=> 'لا يوجد صلاحية  "SELECT" ',
	'dbpriv_update'		=> 'لا يوجد صلاحية  "UPDATE" ',
	'dbpriv_delete'		=> 'لا يوجد صلاحية  "DELETE" ',
	'dbpriv_droptable'	=> 'لا يوجد صلاحية  "DROP TABLE" ',

	'db_not_null'		=> 'لقد قمت بتثبيت  UCenter مسبقاً, استمرار وحذف البيانات القديمة.',
	'db_drop_table_confirm'	=> 'هل انت متأكد من انك تريد التثبيت وحذف كافة المعلومات القديمة?',

	'writeable'		=> 'قابل للكتابة',
	'unwriteable'		=> 'غير قابل للكتابة',
	'old_step'		=> 'الخطوة السابقة',
	'new_step'		=> 'الخطوة التالية',

//	'database_errno_2003'	=> 'لا يمكن الاتصال بقاعدة البيانات,تأكد من معلومات الاتصال',
//	'database_errno_1044'	=> 'غير قادر على انشاء قاعدة بيانات جديدة, الرجاء التأكد من اسم قاعدة البيانات',
//	'database_errno_1045'	=> 'لا يمكن الاتصال بقاعدة البيانات, تأكد من كلمة المرور او اسم المستخدم',

	'step_env_check_title'	=> 'بدء عملية التثبيت',
	'step_env_check_desc'	=> 'فحص البيئة والصلاحيات',
	'step_db_init_title'	=> 'تثبيت قاعدة البيانات',
	'step_db_init_desc'	=> 'تثبيت ..',
	
	'step1_file'		=> 'اسم الملف',
	'step1_need_status'	=> 'المطلوب',
	'step1_status'		=> 'الحالي',
	'not_continue'		=> 'الرجاء تصحيح الاخطاء باللون الاحمر, ثم اعد المحاولة',

	'tips_dbinfo'			=> 'معلومات قاعدة البيانات',
	'tips_dbinfo_comment'		=> '',
	'tips_admininfo'		=> 'معلومات المدير',
	'tips_admininfo_comment'	=> 'الرجاء قم بإدخال معلومات مؤسس UCenter , ستحتاجها عند تسجيل الدخول.',
	'step_ext_info_title'		=> 'تم التثبيت بنجاح',
	'step_ext_info_desc'		=> 'اضغط هنا لتسجيل الدخول',

	'ext_info_succ'			=> 'تم التثبيت بنجاح',
	'install_locked'		=> 'التثبيت مقفل , اذا كنت ترغب بالتثبيت مرة اخرى, الرجاء حذف الملف التالي <br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'		=> 'يجب حل المشكلة أعلاه',

	'step_app_reg_title'		=> 'بيئة التثبيت',
	'step_app_reg_desc'		=> 'فحص الخادم وتثبيت UCenter',
	'tips_ucenter'			=> 'الرجاء ملء المعلومات ذات الصلة بـ UCenter',
	'tips_ucenter_comment'		=> 'UCenter هو برنامج رئيسي لشركة. Discuz! Board مطلوب لهذا البرنامج. Iاذا قمت بتثبيت UCenter, الرجاء ملئ معلومات  UCenter, او اذهب الى  <a href="http://www.discuz.com/" target="blank">مركز منتجات Comsenz </a> لتحميل UCenter وتثبيته, ثم استمر',

	'advice_mysql_connect'		=> 'الرجاء التأكد من ان موديل load mysql يعمل بشكل صحيح',
	'advice_fsockopen'		=> 'انت تحتاج لتعيين "allow_url_fopen" في "php.ini". الرجاء راسل مزود الاستضافة لتفعيل هذه الدالة',
	'advice_gethostbyname'		=> 'دالة "gethostbyname" مطلوبة. الرجاء راسل مزود الاستضافة لتفعيلها ',
	'advice_file_get_contents'	=> 'يجب تعيين "allow_url_fopen" في "php.ini". الرجاء مراسلة مزود الاستضافة لتفعيها',
	'advice_xml_parser_create'	=> 'هذه الدالة تحتاج الى دعم XML في PHP. الرجاء مراسلة مزود الاستضافة لتفعيها',

	'ucurl'				=> 'وصلة UCenter',
	'ucpw'				=> 'كلمة مرور مؤسس/مدير UCenter ',

	'tips_siteinfo'			=> 'قم بملء ملعومات الموقع',
	'sitename'			=> 'اسم الموقع',
	'siteurl'			=> 'وصلة الموقع',

	'forceinstall'			=> 'التثبيت المركز',
	'dbinfo_forceinstall_invalid'	=> 'اذا كنت ترغب ببقاء البيانات يمكنك تغيير البادئة اما اذا كانت القاعدة تحتوي على بيانات بنفس البادئة; سيتم حذف البيانات السابقة!',

	'click_to_back'			=> 'اضغط هنا للرجوع للخلف',
	'adminemail'			=> 'بريد النظام',
	'adminemail_comment'		=> 'سيستعمل لارسال اخطاء التثبيت',
	'dbhost_comment'		=> 'مضيف قاعدة البيانات , عادة: localhost',
	'tablepre_comment'		=> 'الرجاء لا تقم بتعديل البادئة الا اذا كنت ترغب في استخدام قاعدة البيانات في اغراض متعددة',
	'forceinstall_check_label'	=> 'انا اريد حذف جميع البيانات السابقة',

	'uc_url_empty'			=> 'عنوان UCenter فارغ, الرجاء الرجوع للملء',
	'uc_url_invalid'		=> 'صيغة الوصلة خاطئة',
	'uc_url_unreachable'		=> 'وصلة UCenter خاطئة, الرجاء التأكد',
	'uc_ip_invalid'			=> 'Cannot resolve domain, please fill in website IP</font>',
	'uc_admin_invalid'		=> 'Wrong UC founder password, please try again',
	'uc_data_invalid'		=> 'Connect Failed, please check UC URL',
	'ucenter_ucurl_invalid'		=> 'UC URL empty or wrong format, please check',
	'ucenter_ucpw_invalid'		=> 'UC founder password empty or wrong format, please check',
	'siteinfo_siteurl_invalid'	=> 'Site URL empty or wrong format, please check',
	'siteinfo_sitename_invalid'	=> 'Site name empty or wrong format, please check',
	'dbinfo_dbhost_invalid'		=> 'DB Host empty or wrong format, please check',
	'dbinfo_dbname_invalid'		=> 'DB Name empty or wrong format, please check',
	'dbinfo_dbuser_invalid'		=> 'DB username empty or wrong format, please check',
	'dbinfo_dbpw_invalid'		=> 'DB password empty or wrong format, please check',
	'dbinfo_adminemail_invalid'	=> 'System Email empty or wrong format, please check',
	'dbinfo_tablepre_invalid'	=> 'Invalid prefix, can not begin with nubmber, and can\'t contain "."',
	'admininfo_username_invalid'	=> 'Admin username empty or wrong format, please check',
	'admininfo_email_invalid'	=> 'Admin Email empty or wrong format, please check',
	'admininfo_ucfounderpw_invalid'	=> 'Admin password empty, please fill',
	'admininfo_ucfounderpw2_invalid'	=> 'كلمتا المرور غير متطابقتان, الرجاء الفحص',

	'username'			=> 'اسم مستخدم المدير',
	'email'				=> 'بريد المدير',
	'password'			=> 'كلمة مرور المدير',
	'password_comment'		=> 'لا يمكن ترك كلمة المرور فارغة',
	'password2'			=> 'أعد كلمة المرور',

	'admininfo_invalid'		=> 'معلومات المدير غير كاملة,تفحص اسم مستخدم المدير, كلمة المرور, والبريد الالكتروني',
	'dbname_invalid'		=> 'اسم قاعدة البيانات فارغ, الرجاء ادخل اسم قاعدة البيانات الصحيح',
	'admin_username_invalid'	=> 'اسم مستخدم المدير غير صالح, يجب الا يزيد الطول عن 15 حرف .',
	'admin_password_invalid'	=> 'كلمتا المرور غير متطابقتان, تأكد منهما',
	'admin_email_invalid'		=> 'بريد غير صالح, ربما مستعمل او الصيغة غير صالحة, قم بتغييره',
	'admin_invalid'			=> 'معلومات المدير غير كاملة, يجب ملء كافة الحقول',
	'admin_exist_password_error'	=> 'اسم المستخدم موجود مسبقاً, اذا كنت ترغب بجعله المدير,الرجاء ادخل كلمة المرور الصحيحة, او قم بتغيير اسم المستخدم',

	'tagtemplates_subject'	=> 'العنوان',
	'tagtemplates_uid'	=> 'UID',
	'tagtemplates_username'	=> 'الكاتب',
	'tagtemplates_dateline'	=> 'التاريخ',
	'tagtemplates_url'	=> 'الوصلة',

	'uc_version_incorrect'	=> 'اصدار UCenter قديم جداً, قم بالترقية الى آخر اصدار. حمل النسخة العربية: http://www.ar-discuz.com, او النسخة الصينية الاصلية: http://www.comsenz.com/ .',
	'config_unwriteable'	=> 'غير قادر على الكتابة في ملف التكوين, الرجاء تعينن للملف "config.inc.php" صلاحيات (777)',

	'install_in_processed'	=> 'تثبيت...',
	'install_succeed'	=> 'تم التثبيت بنجاح, انقر للذهاب للخطوة القادمة',
	'license'		=> '<div class="license"><h1>الترخيص</h1>

<p> Copyright (c) 2001-2010, Hong Sing Imagination (Beijing) Co., Ltd. All rights reserved.</p>

<p> Thank you for choosing UCenter product. We hope that our efforts to provide you with a fast and powerful and efficient site solution.</p>

<p> Sing Imagination (Beijing) Technology Co., Ltd. for the UCenter product developers, and they shall have UCenter products copyright. Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, UCenter official website address is http://www.discuz.com, UCenter official forum site at http://www.discuz . net.</p>

<p> UCenter copyright has registered in The Peoples Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using UCenter software.</p>

<p> this License applies and only applies to UCenter 1.x version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3> I. license agreement right </h3>
<ol>
<li> you can fully comply with the end user license agreement, based on the software used in this non-commercial use, without having to pay for software copyright licensing fees.</li>
<li> agreement you can within the constraints and limitations UCenter modify the source code (if provided) or interface styles to suit your site requirements.</li>
<li> you have to use this software to build the site all the members of the information, articles and related information of ownership, and is independent of commitment and legal obligations related to the article content.</li>
<li> a commercial license, you can use this software for commercial applications, while according to the type of license purchased to determine the period of technical support, technical support, technical support form and content, from the moment of purchase, within the period of technical support have a way to get through the specified designated areas of technical support services. Business authorized users have the power to reflect and comment, relevant comments will be a primary consideration, but not necessarily be accepted promise or guarantee.</li>
</ol>

<h3> II. agreement constraints and limitations </h3>
<ol>
<li> business license has not been before, may not use this software for commercial purposes (including but not limited to business sites, business operations, for commercial purpose or profit web site). Purchase of commercial license, please visit http://www.discuz.com reference instructions, call 8610-51657885 for more details.</li>
<li> may not associated with the software or business license for rental, sale, mortgage or grant sub-licenses.</li>
<li> In any case, that no matter how used, whether modified or landscaping, changes to what extent, just use UCenter whole or any part, without the written permission of the page footer Department UCenter name and Sing Imagination (Beijing) Technology Co., Ltd. affiliated website (http://www.comsenz.com, http://www.discuz.com or http://www.discuz.net) the link must be retained, not removed or modified.</li>
<li> prohibited UCenter whole or any part of the basis for the development of any derivative version, modified version or third-party version for redistribution.</li>
<li> If you failed to comply with the terms of this Agreement, your authorization will be terminated by the license rights will be recovered, and bear the corresponding legal responsibility.</li>
</ol>

<h3> III. Limited Warranty and Disclaimer </h3>
<ol>
<li> the software and the accompanying documents as not to provide any express or implied, or guarantee in the form of compensation provided.</li>
<li> user voluntary use of this software, you must understand the risks of using this software, technical services in the not to buy products, we do not promise to provide any form of technical support, use the warrant or assume any use of this software issues related to liability arising.</li>
<li> Sing Imagination (Beijing) Technology Co., Ltd. does not use the software to build the site responsible for articles or information.</li>
</ol>

<p> the UCenter end user license agreement, business license and technical services to the details provided by UCenter exclusive official website. Sing Imagination (Beijing) Technology Co., Ltd. has, without prior notice, modify the license agreement and the power of service price list, the revised agreement or change list from the date of the new authorized user effect.</p>

<p> electronic text form of license agreement as the two sides signed an agreement in writing as a complete and equivalent legal effect. Once you start the installation UCenter, shall be deemed to fully understand and accept the terms of this Agreement, in the enjoyment of the powers conferred by these provisions, while subject to restrictions and limitations related. Acts outside the scope of protocol licensing will be a direct violation of the licensing agreement and constitutes infringement, we have the right to terminate the authorization, shall be ordered to stop the damage, and reserves the power to investigate ?? responsibility.</p></div>',

	'uc_installed'		=> 'You have already installed UCenter. If you want to re-install it, please delete "data/install.lock"',
	'i_agree'		=> 'موافق',
	'supportted'		=> 'مدعوم',
	'unsupportted'		=> 'غير مدعوم',
	'max_size'		=> 'مدعوم/الحجم الاقصى',
	'project'		=> 'مشروع',
	'ucenter_required'	=> 'UCenter المطلوب',
	'ucenter_best'		=> 'UCenter الافضل',
	'curr_server'		=> 'الحالي',
	'env_check'		=> 'فحص البيئة',
	'os'			=> 'نظام التشغيل',
	'php'			=> 'اصدار PHP ',
	'attachmentupload'	=> 'رفع مرفقات',
	'unlimit'		=> 'غير محدود',
	'version'		=> 'الاصدار',
	'gdversion'		=> 'اصدار GD ',
	'allow'			=> 'مسموح',
	'unix'			=> 'Unix',
	'diskspace'		=> 'مساحة القرص',
	'priv_check'		=> 'فحص اذونات المجلدات والملفات',
	'func_depend'		=> 'فحص الدوال',
	'func_name'		=> 'الدالة',
	'check_result'		=> 'الحالي',
	'suggestion'		=> 'المستحسن',
	'advice_mysql'		=> 'الرجاء التأكد من ان موديل load mysql يعمل بشكل صحيح',
	'advice_fopen'		=> 'انت تحتاج لتعيين "allow_url_fopen" في "php.ini". الرجاء راسل مزود الاستضافة لتفعيل هذه الدالة',
	'advice_file_get_contents'	=> 'يجب تعيين "allow_url_fopen" في "php.ini". الرجاء مراسلة مزود الاستضافة لتفعيها',
	'advice_xml'			=> 'هذه الدالة تحتاج الى دعم XML في PHP. الرجاء مراسلة مزود الاستضافة لتفعيها',
	'none'				=> 'لا شئ',

	'dbhost'	=> 'مضيف قاعدة البيانات',
	'dbuser'	=> 'اسم مستخدم قاعدة البيانات',
	'dbpw'		=> 'كلمة مرور قاعدة البيانات',
	'dbname'	=> 'اسم قاعدة البيانات',
	'tablepre'	=> 'بادئة الجداول',

	'ucfounderpw'	=> 'كلمة مرور المؤسس',
	'ucfounderpw2'	=> 'اعد كلمة المرور',

	'create_table'	=> 'انشاء جدول ',
	'succeed'	=> ' تم بنجاح',
);