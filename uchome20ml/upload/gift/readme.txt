---------------------------------------------------------
GIFT PLUGIN for International UCHOME 2.0 (Multi-lingual)

Originaly rewritten to English by htp://www.cn4fun.com

Rewritten for International by Valery Votintsev
http://codersclub.org/
---------------------------------------------------------

AUTO INSTALLATION INSTRUCTIONS:

Run directly gift/install.php for install automatically.



MANUAL INSTALLATION INSTRUCTIONS:

1. Upload files to the uchome root directory

2. Open your mysql DB, and excute the below SQL query.
   If the table is exist then delete it manually.

CREATE TABLE IF NOT EXISTS `uchome_gift` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `username` varchar(64) default NULL,
  `touid` int(11) NOT NULL,
  `tousername` varchar(64) NOT NULL,
  `message` varchar(255) default NULL,
  `gift` varchar(255) NOT NULL,
  `dateline` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `touid` (`touid`),
  KEY `touid2` (`touid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


---------------------------------------------------------

AFTER INSTALL:


1. Open the file template/default/header.htm
   and insert a ling to Gift plugin anywhere you want.

   I.e. for add a gift link to user app menu
   search this lines:
    &lt;li>&lt;img src="image/app/doing.gif">...
    &lt;li>...
    ...
    &lt;li>&lt;img src="image/app/topic.gif">...

  and add a line below:
    &lt;li>&lt;img src="image/app/gift.gif">&lt;a href="gift.php">{lang gifts}&lt;/a>&lt;/li>

2. Go to ADMIN Center and refresh the cache...

All done!
