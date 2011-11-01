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

'submit'		=> 'Submit',//'提交',

'rename_config'		=> 'You need first to rename the file "config.new.php" in a root directory to "config.php"',

'upload_sql'		=> 'Please upload the latest database structure file install/install.sql to the ./install directory, and then re-run the installation program',

'allready_installed'	=> '<b>Warning! You have already installed the UCenter Home!</b><br>
			To ensure of data security, please manually delete the install/index.php file<br>
			If you want to re-install UCenter Home, please delete the file data/install.lock, remove the UCHome application from the UCenter, and then re-run the installation.',

'config_nonwritable'	=> 'The file config.php have no read/write permissions. Set it to be written, and then continue the installation procedure',

'ucenter_url_invalid' => 'UCenter URL address is incorrect',

'uc_client_not_found' => 'uc_client directory does not exist, please upload the installation package in ./upload/uc_client to the program root directory',

'uc_error' => '<strong>UCenter does not work or can not connect. Returned the error:</strong>',
'uc_error_intro' => '<strong>Make sure the UCenter IP address is correct.</strong><br><br>',

'uc_ip' => 'UCenter server IP address',

'uc_ip_comment' => 'For example: 192.168.0.1',

'uc_ip_confirm' => 'Confirm IP address',

'charset_different' => 'UCenter server character set and the UCHome character set are different, please download the UCenter Home installation with your encoding. Download address: http://download.comsenz.com/',

'uch_allready_installed' => 'The UCenter Home Program is already installed. If you want to continue with the installation, please go to the UCenter Application Management and remove the existing UCenter Home!',

//----------------------------------
'blog_title'	=> 'Blog title',
'user_id'	=> 'User ID',
'user_name'	=> 'User name',
'date'		=> 'Date',
'space_address'	=> 'Space address',
'blog_address'	=> 'Blog address',
'personal_home'	=> 'Personal home',
//----------------------------------

'uc_cannot_connect' => 'Can not connect to the UCenter',

'uc_admin_password_incorrect' => 'UCenter administrator password is incorrect',

'uc_problem' => 'UCenter report the data problems, please refer to:',

'uchome_registered' => 'UCHome successfully registered in UCenter! The current program ID is',

'go_next_step' => 'Go to the next step',

'prefix_empty' => 'The table name prefix can not be empty',

'db_params_invalid' => 'Database connection information is invalid, please make sure',

'db_cannot_create' => 'UCenter Home database user has no permission to create a database. Create the database manually, and then continue the installation procedure.',

'db_not_empty' => 'Danger! Specified UCenter Home database allready have some data. If continue, the original data will be lost!',

'db_set_ok' => 'Database configuration set successfully. Going to the next step',

'password_invalid' => 'Username password is incorrect, please make sure',

'username_invalid' => 'Entered user name can not be registered, please re-confirm',

'uch_installed_ok' => '<font color="red">Congratulations! UCenter Home installation is completed!</font>
	<br><br>
	For your data security, please login by ftp, and delete the "install" directory.
	<br><br>
	Your administrator account has successfully identified and the space was created.
        <br>
	Next, you can:
        <br>
	<br> <a href="../space.php" target="_blank">Go to you space</a>
	<br> for explore your home page and start the UCenter Home Tour
	<br>
	<br> or
        <br><br>
        <a href="../admincp.php" target="_blank">Go to the Admin center</a>
	<br> for set the site configuration and other site settings.',

'failed' => 'Failed',

'ok' => 'OK',

'welcome' => '<strong>Welcome to use UCenter Home</strong><br>
      With UCenter Home you can easily build a relationship with friends as the core communication network, so that site users can record life in one sentence bit by bit; quickly and easily publish blogs, upload pictures; can also very easily share information with their friends together to discuss topics of interest; quick and easy understanding of friends the latest news.
      <br><a href="javascript:;" onclick="readme()"><strong>Please read carefully our Software License Agreement</strong></a>',

'file_permissions' => '<strong>File/directory permission settings:</strong>
	<br>
	Before to start the installation process it is required first to verify
	and set correctly the related to program directories and files permissions.
	Some items must have permissions for Read/Write/Delete/Create a subdirectories.
	<br>
	Recommendations:
	<br>
	Use any FTP software to set permissions 
	for the following directories and files below.
	At Unix-like hosts a permissions must be set to 777.
	For Windows hosts, set the read-write property for the internet guest account.<br>',

'name' => 'Name',

'required_permission' => 'Required permissions',

'description' => 'Description',

'test_result' => 'Test results',

'r/w' => 'Read/Write',

'system_config' => 'System configuration file',

'include_subdirs' => 'including the directory, and all subdirectories and files',

'r/w/d' => 'Read/Write/Delete',

'attach_dir' => 'Attachment directory',

'data_dir' => 'Site data directory',

'uc_client_dir' => 'uc_client data directory',

'permission_problem' => '<b>Problems</b>:
   <br>The system detected some directories or files with non-correct permissions.
   <br>It is strongly recommended to set permissions correctly, and then refresh the page to continue installation.
   <br>Otherwise, the system may arise unforeseen problems.',

'force_continue' => 'Force to continue',

'accept_license' => 'Accept the License Agreement and Start the UCenter Home installation',

'read_license' => '<strong>Please be sure to read carefully the following License Agreement:</strong>',

'license' => '<div>
      Chinese version of License Agreement applies to Chinese users
      <p>Copyright (&copy;) 2001-2009, Hong Sing Imagination (Beijing) Technology Co., Ltd.
      <br>All rights reserved.</p>
      <p>Thank you for choosing the UCenter Home.
      We hope that our efforts can provide you with a strong social network (SNS) solution.
      With UCenter Home, as the core communication network, you can easily build a relationship with your friends, so that site users can record life in one sentence bit by bit;
      quickly and easily publish blogs, upload pictures;
      moreover, it can be very convenient for your friends to share information together, discuss topics of interest;
      quick and easy overview the latest activity of your friends.</p>
      <p>Sing Imagination (Beijing) Technology Co., Ltd. is a UCenter Home product developer,
      and have the UCenter Home Products Copyrighted
      (China National Copyright Administration of Copyright Registration No. 2006SR12091). Sing Imagination (Beijing) Technology Co., Ltd.
      <br>The website is http://www.comsenz.com .
      <br>UCenter Home official website address is http://u.discuz.net.</p>
      <p>UCenter Home copyright has been registered in The People\'s Republic of China National Copyright Administration,
      protected by copyright law and by international treaties.
      <br>
      The product users (whether individuals or organizations, profit or not,
      in any case of using the product, including learning and research purposes),
      are required to carefully read this agreement, understand, agree and comply
      with all the terms of this agreement before the start using UCenter Home software.</p>
      <p>Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.
	<ul type=i>
	<p>
	<li><b>License Agreement rights</b>
	  <ul type=1>
	    <li>You can fully comply with the end user License Agreement,
	        based on the software used in this non-commercial use,
	        without having to pay for software copyright licensing fees.
	    <li>You can modify the UCenter Home source code (if provided) or interface styles within the agreement constraints and limitations to suit your site requirements.
	    <li>You have to use this software to build the site in all members of the information, articles and related information of ownership, and is independent of commitment and legal obligations related to the article content.
	    <li>You can use this software for commercial applications, only with a commercial license, while according to the type of license purchased to determine the period of technical support, and technical support form content.
	        At the purchase moment, the technical support period and the manner specified within the scope of technical support services.
	        Authorized Business users have the power to reflect and express their views,
	        opinions related to the product, will be a primary consideration,
	        but not necessarily be accepted promise or guarantee.</Li>
	  </ul>
	<p></p>
	<li><b>The agreement constraints and limitations</b>
	  <ul type=1>
	    <li>Without a business license, you may not use this software for
	      commercial purposes (including but not limited to business sites,
	      business operations, for commercial purpose or profit web site).
	      <br>
	      For purchase a commercial license, please visit the http://www.discuz.com
	      <br>
	      For reference instructions and for more details, call 8610-51657885.
	    <li>You may not associated with the software or business license for rental,
	      sale, mortgage or grant sub-licenses.
	    <li>In any case, that no matter how used, whether modified or landscaping,
	      changes to what extent, just use UCenter Home of the whole or any part,
	      without the written permission of the program page footer Department
	      The UCenter Home name and Sing Imagination (Beijing) Technology Co., Ltd.
	      affiliated website (http://www.comsenz.com, http://u.discuz.net) link
	      must be retained, not removed or modified.
	    <li>It is prohibited to redistribute any modified by you or third-party
	      UCenter Home package version (the whole or any part of it).
	    <li>If you failed to comply with the terms of this Agreement,
	      your license will be terminated, the License rights will be recovered,
	      and bear the corresponding legal responsibility.
	    </li>
	  </ul>
	<p> </ p>
	<li><b>Limited Warranty and Disclaimer</b>
	  <ul type=1>
	    <li>The software and the accompanying documents as not to provide any
	      express or implied, or guarantee in the form of compensation provided.
	    <li>If you use of this software voluntary, you must understand the risks
	      of using this software, technical services in the not to buy products,
	      we do not promise to provide any form of technical support,
	      use of guarantees, is not liable for any use of this software
	      cause problems related to responsibility.
	    <li>Sing Imagination (Beijing) Technology Co., Ltd. does not use
	      the software to build the site responsible for articles or information.
	    </li>
	  </ul>
	</li>
	</ul>
	<p>
	The UCenter Home end user License Agreement,
	business license and technical services to the details of the official website
	by UCenter Home exclusive.
	Sing Imagination (Beijing) Technology Co., Ltd. has without prior notice,
	modify the License Agreement and the power of service price list,
	the revised agreement or change list from the date of the new authorized user
	effect.
	<p>
	Electronic form of License Agreement text as the two sides signed the
	agreement in writing as a complete and equivalent legal effect.
	Once you start the installation UCenter Home, shall be deemed to
	fully understand and accept the terms of this Agreement,
	in the enjoyment of the powers conferred by these provisions,
	while subject to restrictions and limitations related.
	Licensing agreement outside the scope of actions that directly violate the
	licensing agreement and constitutes infringement,
	we have the right to terminate the authorization,
	shall be ordered to stop the damage, and retains the investigation related to
	the power of responsibility.
	</p>
    </div>',

'get_uc_auto' => '<strong># Get the UCenter parameters automatically</strong>',

'us_settings_submit' => 'UCenter relevant information has been secured,
			please click the button below to submit the configuration',

'uc_install_first' => 'For use the UCenter Home, you need first to register your 
      user account in the User center (UCenter).
      <br>
      If your site has not yet installed the UCenter, please perform this operations:
      <br>
      1. <a Href="http://download.comsenz.com/UCenter/" target="_blank"><b>Click here to download the latest version of UCenter</b></a>,
         and read the UCenter installation instructions.
      <br>
      2. After the UCenter installed, fill in the following
          UCenter information, so the UCenter Home can continue the installation.
      <br>',

'uc_settings_fill' =>'<strong># Please fill in the relevant parameters for UCenter</strong>',
'us_settings_enter' => 'Enter the installed UCenter information:',
'uc_url' => 'UCenter API URL:',
'uc_url_comment' => 'Such as http://www.discuz.net/ucenter',
'uc_admin_password' => 'UCenter Administrator Password:',
'uc_config_submit' => 'Submit the UCenter configuration settings',

'uc_db_info' => '<strong># UCenter Home Database</strong>',
'uc_db_info_comment' => 'Set here the UCenter Home database information',
'uc_db_host' => 'Database server address:',
'uc_db_host_comment' => 'Usually localhost',
'uc_db_user' => 'Database user name:',
'uc_db_password' => 'Database Password:',
'uc_db_charset' => 'Database character set:',
'uc_db_charset_custom' => '+ Custom',

'mysql_required' => 'MySQL versions 4.1+ are suitable',

'db_name' => 'Database Name:',
'db_name_comment' => 'If the database is not exists, will try to automatically create',
'db_prefix' => 'Table name prefix:',
'db_prefix_comment' => 'Prefix can not be empty, the default is uchome_',
'db_test' => 'Test my database settings',

'install_sql_missing' => 'Failed to obtain the required to install SQL statements, verify the existence of the install/install.sql file',

'table' => 'Table',
'table_create_error' => 'automatic installation failed.</font><br />
                         Server report: ',

'table_create_error_comment' => 'Please check and correct the SQL statements in the install/install.sql file,
                         or manually install the database itself,
                         and then continue with the installation.',

'try_again' => 'Try again',
'tables_installed' => 'All the tables was installed, go to the next step',

'site_name' => 'My space',

//----------------------------	
'group_category_name1' => 'Liberty',
'group_category_name2' => 'Regional alliance',
'group_category_name3' => 'Interest in alliances',

'group_titles' => array(
		'Administrator',
		'Moderator',
		'VIP',
		'Newbie',
		'Member',
		'Full Member',
		'Senior member',
		'Read Only',
		'Banned'
		),

//----------------------------	
//Increase Money Rules
'rule_register'	=> 'Create space',
'rule_realname'	=> 'Real name verification',
'rule_realemail' => 'E-mail verification',
'rule_invitefriend' => 'Successfully invited friends',
'rule_setavatar' => 'Set avatar',
'rule_videophoto' => 'Video verified',
'rule_report' => 'Succesfull report',
'rule_updatemood' => 'Update the mood',
'rule_hotinfo' => 'Hot information',
'rule_daylogin' => 'Daily login',
'rule_visit' => 'Visit other space',
'rule_poke' => 'Send Greeting',
'rule_guestbook' => 'Write to Wall',
'rule_getguestbook' => 'Get a Wall message',
'rule_doing' => 'Publish a micro-blog',
'rule_publishblog' => 'Published a blog',
'rule_uploadimage' => 'Upload image',
'rule_camera' => 'Camera shoot',
'rule_publishthread' => 'Publish thread',
'rule_replythread' => 'Reply thread',
'rule_createpoll' => 'Create poll',
'rule_joinpoll' => 'Vote a poll',
'rule_createevent' => 'Create Event',
'rule_joinevent' => 'Join Event',
'rule_recommendevent' => 'Recommend Event',
'rule_createshare' => 'Create Share',
'rule_comment' => 'Write Comment',
'rule_getcomment' => 'Get Comment',
'rule_installapp' => 'Install application',
'rule_useapp' => 'Use application',
'rule_click' => 'Rate',
//Decrease Money Rules
'rule_editrealname' => 'Edit the real name',
'rule_editrealemail' => 'Change verified E-mail',
'rule_delavatar' => 'Remove Avatar',
'rule_invitecode' => 'Get an invitation code',
'rule_search' => 'Make search',
'rule_blogimport' => 'Blog Import',
'rule_modifydomain' => 'Modify domain',
'rule_delblog' => 'Delete Blog',
'rule_deldoing' => 'Delete micro-blog',
'rule_delimage' => 'Delete Image',
'rule_delpoll' => 'Delete Poll',
'rule_delthread' => 'Delete Thread',
'rule_delevent' => 'Delete Event',
'rule_delshare' => 'Delete Share',
'rule_delguestbook' => 'Delete Wall message',
'rule_delcomment' => 'Delete Comment',

//----------------------------	

'cron_log' => 'Update main statistics',
'cron_cleanfeed' => 'Cleanup expired feeds',
'cron_cleannotification' => 'Cleanup personal notices',
'cron_getfeed' => 'Synchronize feeds with UCenter',
'cron_cleantrace' => 'Cleanup visits and last visitors',

//------------------------

'task_avatar' => 'Upload your avatar',
'task_avatar_intro' => 'Avatar is your personal image here.<br>Set your avatar, and you would allowed to invite more friends.',

'task_profile' => 'Fill your personal data',
'task_profile_intro' => 'Complete your personal information.<br>So you would allowed to invite more friends, and the system will help you to find friends.',

'task_blog' => 'Post your first blog',
'task_blog_intro' => 'Write your first blog post now, and share your own understanding of the life with other members.',

'task_friend' => 'Find and add 5 friends',
'task_friend_intro' => 'If you have friends, you can communicate with them;<br>At your Home page you will see latest activity of your friends.',

'task_email' => 'Verify your mailbox',
'task_email_intro' => 'Fill in your real email address and pass a verification.<br>If you forget your password, you can use this mailbox for retrieve your password;<br>Moreover, you can receive some notifications from your friends and so on.',

'task_invite' => 'Invite 10 new friends to join',
'task_invite_intro' => 'Look at your friends and invite them by email, ICQ, etc. so your family and friends can join our site.',

'task_gift' => 'Receive a daily visit bonus',
'task_gift_intro' => 'Login to your home page every day, and get a daily bonus.',

//----------------------------------

'event_category1' => 'Life/Party',
'event_category1_template' => 'Cost description:\r\nMeeting point:\r\nDress code:\r\nContacts:\r\nNote:',

'event_category2' => 'Travel/Tourism',
'event_category2_template' => 'Line description:\r\nCost Description:\r\nEquipment Requirements:\r\nTransportation:\r\nMeeting point:\r\nContacts:\r\nNote:',

'event_category3' => 'Games/Sport',
'event_category3_template' => 'Cost description:\r\nMeeting point:\r\nDress code:\r\nVenue information:\r\nContacts:\r\nNote:',

'event_category4' => 'Movie/Show',
'event_category4_template' => 'Plot:\r\nCost description:\r\nMeeting point:\r\nContacts:\r\nNote:',

'event_category5' => 'Education/Seminars',
'event_category5_template' => 'Organizer:\r\nTheme:\r\nCost description:\r\nMeeting point:\r\nContacts:\r\nNote:',

'event_category6' => 'Other',

//-----------------------------------------

'magic_invisible' => 'Stealth grass',
'magic_invisible_intro' => 'Make you invisible in the online (like offline), valid for 24 hours',

'magic_friendnum' => 'Friends Expander',
'magic_friendnum_intro' => 'Increase your friend list capacity on 10 places',

'magic_attachsize' => 'Attachment Expander',
'magic_attachsize_intro' => 'Used once, can increase your attachment space on 10Mb',

'magic_thunder' => 'Voice of Thunder',
'magic_thunder_intro' => 'Enable publish a global message for invite visitors to your space',

'magic_updateline' => 'Now timestamp',
'magic_updateline_intro' => 'Update the publish time of specified object to the current time',

'magic_downdateline' => 'Past timestamp',
'magic_downdateline_intro' => 'Set the publish time of the specified object to the time of the past',

'magic_color' => 'Colorizer',
'magic_color_intro' => 'Colorize the title of the specified object',

'magic_hot' => 'Hot light',
'magic_hot_intro' => 'Enable to increase the heat value of the specified the object',

'magic_visit' => 'Bulk Visitor',
'magic_visit_intro' => 'Select random 10 friends, and send them a greeting, a message or visit their space',

'magic_icon' => 'Title eggs',
'magic_icon_intro' => 'Add a color icon in front of the specified object title (up to 8 icons)',

'magic_flicker' => 'Flicker',
'magic_flicker_intro' => 'Flashing up a comment or a text message',

'magic_gift' => 'Gift card',
'magic_gift_intro' => 'Enable you to prepare your own money gift package, and send it to visitors',

'magic_superstar' => 'Super Star',
'magic_superstar_intro' => 'Increase your own avatar at your home page with a superstar identification',

'magic_viewmagiclog' => 'Gossip mirror',
'magic_viewmagiclog_intro' => 'View the most recently used magic for specified user',

'magic_viewmagic' => 'The Perspective',
'magic_viewmagic_intro' => 'View the specified user magic inventory',

'magic_viewvisitor' => 'Peeping mirror',
'magic_viewvisitor_intro' => 'View 10 recent visitors for the specified user space',

'magic_call' => 'Call card',
'magic_call_intro' => 'Send a notice to your friends to come to view the specified object',

'magic_coupon' => 'Coupon',
'magic_coupon_intro' => 'Buying magic up for a certain amount of points',

'magic_frame' => 'Frame',
'magic_frame_intro' => 'Add a frame to your own photo',

'magic_bgimage' => 'Background',
'magic_bgimage_intro' => 'Add a background image for specified object',

'magic_doodle' => 'Graffiti',
'magic_doodle_intro' => 'Allow to use the graffiti board in a message, comment, or other publishing',

'magic_anonymous' => 'Anonymizer',
'magic_anonymous_intro' => 'Enable to visit specified area as anonymous',

'magic_reveal' => 'Magic mirror',
'magic_reveal_intro' => 'You can see the real identity of an anonymous user',

'magic_license' => 'Magic License',
'magic_license_intro' => 'The license enable to present magic to specified friends',

'magic_detector' => 'Detective',
'magic_detector_intro' => 'Detect the red envelope packages of the space',
	
//---------------------------	

'click_icon1' => 'Pass',
'click_icon2' => 'Ridiculous',
'click_icon3' => 'HandShake',
'click_icon4' => 'Flowers',
'click_icon5' => 'Eggs',
'click_icon6' => 'Beautiful',
'click_icon7' => 'Cool',
'click_icon8' => 'Ridiculous',
'click_icon9' => 'Flowers',
'click_icon10' => 'Eggs',
'click_icon11' => 'Funny',
'click_icon12' => 'Confused',
'click_icon13' => 'Ridiculous',
'click_icon14' => 'Flowers',
'click_icon15' => 'Eggs',

//-----------------------------------

'db_data_added' => 'Default data successfully added to the database, enter the next step',

'db_data_added_intro' => 'Data installation is completed!<br><br>
      Finally, please enter your UCenter Home user name and password.
      <br>The system will automatically create your first space,
      and set you as an administrator!',

'admin_username' => 'Your user name',

'admin_password' => 'Your password',

'admin_account_create' => 'Create the administrator space',

//-------------------------------

'install_title' => 'UCenter Home installation',

'install_step1' => '1. Start Installation',
'install_step2' => '2. Set the UCenter Info',
'install_step3' => '3. Set the database info',
'install_step4' => '4. Create the database',
'install_step5' => '5. Add default data',
'install_step6' => '6. Complete the installation',

//---------------------------

'go_back' => 'Go Back',

'wait_please' => 'Wait please...',

'continue_next_step' => 'Continue to next step',


);