
---------------------------------------
  Directory files description
---------------------------------------

  1. update.php:
     Upgrade UCenter Home to the latest version.
  2. convert.php:
     Convert X-Space to UCenter Home.
  3. client_bbs.php
     Integrate UCenter Home with Discuz! 6.0/5.x/4.x/3.x/2.x.
  
---------------------------------------
  Usage of update.php
---------------------------------------

  Upgrade the UCenter Home installation.
  If you previously installed UCenter Home,
  please follow the next steps for upgrade:
  
  1. Backup all your files and current database
     for avoid data loss if upgrade failure.
  2. Upload all the files from ./upload directory (including the config.new.php file)
     with owerwriting current files.
  3. Upload the update.php into your root directory,and run in the browser.
     Follow the upgrade process prompts for upgrade the database.
     
---------------------------------------     
  Usage of convert.php
---------------------------------------

  Convert from the X-Space to UCenter Home.
  If your site using the X-Space, follow the next steps
  for convert your X-Space to UCenter Home:
  
  1. Download and install UCenter.
     http://download.comsenz.com/UCenter/
  2. Upgrade Discuz! Forum to the latest 6.1.0 version
     http://download.comsenz.com/Discuz/
  3. Upload all the files from ./upload directory to the server,
     and make a fresh install
	 (refer to the new installation instructions).
  4. Upload the convert.php file from this directory to the server root,
     and run in the browser.
     Follow the upgrade process prompts to convert X-Space to UCenter Home.

---------------------------------------     
  Usage ofclient_bbs.php
---------------------------------------

  For integration users of the current installation of
  Discuz! 6.0/5.x/4.x/3.x/2.x with UCenter Home.

  1. Download and install the latest version of the UCenter.
     http://download.comsenz.com/UCenter/1.5.0/
  2. Upload all the files from ./upload directory to the server,
     and make a fresh install
     (refer to the new UCenter Home installation instructions).
  3. Modify /config.php file in the root UCenter Home directory:
  
	Modify the database connection parameters:

	//Discuz6.0/5.x/4.x/3.x configuration parameters
	$_SC['bbs_dbhost']  		= ''; //Mysql server host
	$_SC['bbs_dbuser']  		= ''; //User name
	$_SC['bbs_dbpw'] 	 		= ''; //Password
	$_SC['bbs_dbcharset'] 		= ''; //Database character set
	$_SC['bbs_pconnect'] 		= 0; //Persistent connection
	$_SC['bbs_dbname']  		= 'discuz'; //Database name
	$_SC['bbs_tablepre'] 		= 'cdb_'; //Table prefix
	$_SC['bbs_cookiepre'] 		= 'cdb_'; //COOKIE prefix
	$_SC['bbs_cookiedomain'] 	= ''; //COOKIE domain
	$_SC['bbs_cookiepath'] 		= '/'; //COOKIE path

  4. Upload the file client_bbs.php from this directory to ./uc_client directory.
  5. Modify the client.php file in ./uc_client directory:
	
	Find the line:

	global $uc_controls;

	and add the following below that line:

	global $_SC;
	if($_SC['bbs_dbname'] && in_array($model, array('friend','user','pm'))) {
		include_once UC_ROOT.'./client_bbs.php';
		$func_name = "bbs_{$model}_{$action}";
		if(function_exists($func_name)) {
			return call_user_func_array("bbs_{$model}_{$action}", $args);
		}
	}
