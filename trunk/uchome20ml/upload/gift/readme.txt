
Note it will so great if you can add my website link to your website named... 
htp://www.cn4fun.com  with the caption   "connecting china worldwide"

In coming future in couple of days you will see the FarmVilla in UCH with English version am working on it.... thanks guys and sorry to making it so long


Installation Instructions:
Run directly gift.php will be automatically prompted to install



Manual installation instructions
1. To upload files to the root directory of uchome
2. open your mysql DB and copy paste below sql and excute it, if this exist delete that table please

CREATE TABLE IF NOT EXISTS `uchome_app_tw_gift` (
  `id` int(11) NOT NULL auto_increment,
  `uid` mediumint(8) default NULL,
  `username` varchar(50) default NULL,
  `touid` mediumint(8) NOT NULL,
  `tousername` varchar(50) NOT NULL,
  `message` varchar(250) default NULL,
  `gift` varchar(100) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `touid` (`touid`),
  KEY `touid2` (`touid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1;





-------------------------------------------Setting--------------------
1¡¢open the file template/default/header.htm
   serch  --   Chinese Apps  (note if you're using my tranlated version UCH or also you can add the link anywhere you want)
	after find chinese apps add below line before the chinese apps
<li><a href="gift.php">Send gift</a></li>	


2. Go to ADMIN Control panel refrsh the cache.... all done





Note ... Hi evey one here i apologies for my delay as i'm busy in my job as well as playing around SS7.5 ... Specially to Woonz.... btw thank for your patient
