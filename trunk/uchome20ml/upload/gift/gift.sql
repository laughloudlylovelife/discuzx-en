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