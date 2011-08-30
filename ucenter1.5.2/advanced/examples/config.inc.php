<?php

define('UC_CONNECT', 'mysql');	// Connect UCenter way: mysql / NULL, the default is empty for the fscoketopen ()
								// mysql is directly connected to the database, for efficiency, recommended mysql

//Database Related (mysql connection, and do not have UC_DBLINK, you need to configure the following variables)
define('UC_DBHOST', 'localhost');		// UCenter database host 
define('UC_DBUSER', 'root');			// UCenter database user name 
define('UC_DBPW', '');					// UCenter database password 
define('UC_DBNAME', 'ucenter');			// UCenter database name 
define('UC_DBCHARSET', 'utf8');			// UCenter database character set 
define('UC_DBTABLEPRE', 'ucenter.uc_');	// UCenter database table prefix 

//Communication-related 
define('UC_KEY', '123456789');			// communication with UCenter key, consistent with UCenter 
define('UC_API', 'http://yourwebsite/uc_server');	// UCenter the URL address of the call when the dependence of this constant head 
define('UC_CHARSET', 'utf8');			// UCenter character set 
define('UC_IP', '');					// UCenter of IP, when UC_CONNECT non-mysql manner, and the current application server, there is a problem resolving the domain name, set this value 
define('UC_APPID', 1);					// current application ID 

//ucexample_2.php used in application database connection parameters 
$dbhost = 'localhost';		// database server 
$dbuser = 'root';			// database user name 
$dbpw = '';					// database password 
$dbname = 'ucenter';		// database name 
$pconnect = 0;				// database persistent connection 0 = off, 1 = On 
$tablepre = 'example_';   	// table name prefix, a number of forums installed on the same database, please modify here 
$dbcharset = 'utf8';		// MySQL character sets, the optional 'gbk', 'big5', 'utf8', 'latin1', or leave blank to set the character set in accordance with the Forum

//Sync Log Cookie settings 
$cookiedomain = ''; 		// cookie domain
$cookiepath = '/';			// cookie path
