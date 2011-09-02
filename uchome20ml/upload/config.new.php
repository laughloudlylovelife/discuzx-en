<?php
/*
	[Ucenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: config.new.php 9293 2008-10-30 06:44:42Z liguode $
*/

//Ucenter Home Configuration
$_SC = array();

//vot:  Interface Languages Added
$_SC['language']	= 'en';			//vot - Default Interface Language
$_SC['headercharset']	= 1;		//vot: Force http-header charset. Set to 1 if your http server default charset differs



$_SC['dbhost']  		= 'localhost';	//Database server
$_SC['dbuser']  		= 'root';		//Database User name
$_SC['dbpw'] 	 		= 'root';		//PDatabase Password
$_SC['dbcharset'] 		= 'utf8';		//Database Charset
$_SC['pconnect'] 		= 0;			//Use persistent connection
$_SC['dbname']  		= 'uchome';		//Database name
$_SC['tablepre'] 		= 'uchome_';	//Table prefix
$_SC['charset'] 		= 'utf-8';		//Database charset

$_SC['gzipcompress'] 	= 0;			//Enable gzip compression

$_SC['cookiepre'] 		= 'uchome_';	//COOKIE prefix
$_SC['cookiedomain'] 	= '';			//COOKIE domain
$_SC['cookiepath'] 		= '/';			//COOKIE path

$_SC['attachdir']		= './attachment/';	//Attachment path ( relative path from the site root, ust be accessible by web directory, rights 777. Add "/" at the beginning and at the end)
$_SC['attachurl']		= 'attachment/';	//Attachment URL ( relative path or absolute URL, http:// at the beginning, end with "/")

$_SC['siteurl']			= '';		// Site URL (start with http:// , end with "/"). If empty, the system will automatically recognize this.

$_SC['tplrefresh']		= 0;		//Determine whether to update the template efficiency rating. The greater value mean the higher efficiency. Set to 0 for use permanent template

//Ucenter Home Security
$_SC['founder'] 		= '1';		//Founder UID. Multiple founders supported (separated by a ","). Some of management function enabled only to founder.
$_SC['allowedittpl']	= 0;		//Whether to allow template online editing. For server security, we strongly recommend to disable this.

//UCenter application configuration info
// (access from UCenter Control Panel -> Application Management -> View application -> Copy configuration info which corresponds to the substitution)
define('UC_CONNECT', 'mysql');		// UCenter Connection method: mysql/NULL.
									// The default is empty - for use the http connection by fscoketopen(). mysql - for direct database connection. Recommended to use "mysql" for more efficiency.
define('UC_DBHOST', 'localhost');	// UCenter Server Host
define('UC_DBUSER', 'root');		// UCenter Database user
define('UC_DBPW', 'root');			// UCenter Database password
define('UC_DBNAME', 'ucenter');		// UCenter Database Name
define('UC_DBCHARSET', 'utf8');		// UCenter Database Charset
define('UC_DBTABLEPRE', 'uc_');		// UCenter Table Prefix
define('UC_DBCONNECT', '0');		// UCenter Database persistent connection: 0=Off, 1=On
define('UC_KEY', '1234567890');		// UCenter Communication Key, must correspondent the one in UCenter
define('UC_API', 'http://localhost/uc_server');	// UCenter API URL
define('UC_CHARSET', 'UTF-8');		// UCenter http charset
define('UC_IP', '');				// UCenter IP address. Used if UC_CONNECT is non-mysql, and your server has a problem in resolving the UCenter donain name
define('UC_APPID', '1');			// The current application ID
define('UC_PPP', 20);

?>