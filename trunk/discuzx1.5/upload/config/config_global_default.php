<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_global_default.php 23921 2011-08-16 09:18:28Z cnteacher $
 *      Translated by Valery Votintsev
 */

$_config = array();

// Database server settings
$_config['db']['map'] = array();
$_config['db'][1]['dbhost']  		= 'localhost';		// DB Server address
$_config['db'][1]['dbuser']  		= 'root';		// DB User Name
$_config['db'][1]['dbpw'] 	 	= 'root';		// DB User Password
$_config['db'][1]['dbcharset'] 		= 'utf8';		// DB Charset
$_config['db'][1]['pconnect'] 		= 0;			// Enable DB persistent connection
$_config['db'][1]['dbname']  		= 'ultrax';		// DB Name
$_config['db'][1]['tablepre'] 		= 'pre_';		// DB Table Prefix

// Server Memory Optimization settings
// (these settings require support for the PHP extension component,
// which memcache priority over other settings can not be enabled
// when the memcache automatically when you open the other two optimized mode)
$_config['memory']['prefix'] = 'discuz_';
$_config['memory']['eaccelerator'] = 1;				// Start the support for eaccelerator
$_config['memory']['xcache'] = 1;				// Start the support for xcache
$_config['memory']['memcache']['server'] = '';			// memcache server address
$_config['memory']['memcache']['port'] = 11211;			// memcache server port
$_config['memory']['memcache']['pconnect'] = 1;			// memcache persistent connection
$_config['memory']['memcache']['timeout'] = 1;			// memcache server connection timeout

// Server-related settings
$_config['server']['id']		= 1;			// Server ID, when  more webservers used this ID to identify the current server

// Download attachments
$_config['download']['readmod'] = 2;				// local file reading mode; Mode 2 means the most to save memory, but does not support multi-threaded download
								// 1=fread, 2=readfile, 3=fpassthru, 4=fpassthru+multiple
$_config['download']['xsendfile']['type'] = 0;			// Enable X-Sendfile feature(required server support) 0=disable, 1=nginx, 2=lighttpd, 3=apache
$_config['download']['xsendfile']['dir'] = '/down/';		// Enable nginx X-sendfile, the forum attachment directory path to the virtual map, use the "/" at the end

//  CONFIG CACHE
$_config['cache']['type'] 			= 'sql';	// Cache type: file = file cache, sql = database cache

// Page output settings
$_config['output']['charset'] 			= 'utf-8';	// Page character set
$_config['output']['forceheader']		= 1;		// Force the output in defined character set, used to avoid page content garbled
$_config['output']['gzip'] 			= 0;		// Use Gzip compression for output
$_config['output']['tplrefresh'] 		= 1;		// Automatically refresh templates: 0 = off, 1 = On
$_config['output']['language'] 			= 'en';		// Page language en/zh_cn/zh_tw
$_config['output']['staticurl'] 		= 'static/';	// Path to the site static files, use "/" at the end
$_config['output']['ajaxvalidate']		= 0;		// Strictly verify the authenticity for Ajax pages: 0 = off, 1 = On

// COOKIE settings
$_config['cookie']['cookiepre'] 		= 'uchome_'; 	// COOKIE prefix
$_config['cookie']['cookiedomain'] 		= ''; 		// COOKIE domain
$_config['cookie']['cookiepath'] 		= '/'; 		// COOKIE path

// Site Security Settings
$_config['security']['authkey']			= 'asdfasfas';	// Site encryption key
$_config['security']['urlxssdefend']		= true;		// Use own URL XSS defense
$_config['security']['attackevasive']		= 0;		// CC Attack Defense 1 | 2 | 4

$_config['security']['querysafe']['status']	= 1;		// Enable the SQL security detection, prevent the SQL injection attacks automatically
$_config['security']['querysafe']['dfunction']	= array('load_file','hex','substring','if','ord','char');
$_config['security']['querysafe']['daction']	= array('intooutfile','intodumpfile','unionselect','(select', 'unionall', 'uniondistinct');
$_config['security']['querysafe']['dnote']	= array('/*','*/','#','--','"');
$_config['security']['querysafe']['dlikehex']	= 1;
$_config['security']['querysafe']['afullnote']	= 0;

$_config['admincp']['founder']			= '1';		// Site Founder: site management background with the highest authority, each site can be set to one or more founders
								// You can use the user uid ore user name. Separate multiple users with a comma;
$_config['admincp']['forcesecques']		= 0;		// Force managers to set the security question for access to the system settings: 0 = no, 1 = yes [secure]
$_config['admincp']['checkip']			= 1;		// Back office operations are verified administrator IP, 1 = yes [secure], 0 = no. Only the administrator can not log in from time to set 0.
$_config['admincp']['runquery']			= 1;		// Allow to run SQL statements in the background: 1 = yes, 0 = no [secure]
$_config['admincp']['dbimport']			= 1;		// Allow the data recovery in the background: 1 = yes, 0 = no [secure]

?>