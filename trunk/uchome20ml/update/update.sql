-- Upgrade UCHome2.0 to UCHome2.0ML

ALTER TABLE `uchome_ad` CHANGE `adid` `adid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_ad` CHANGE `title` `title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_ad` CHANGE `pagetype` `pagetype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_adminsession` CHANGE `uid` `uid` int(11) unsigned NOT NULL default '0' ;
ALTER TABLE `uchome_adminsession` CHANGE `ip` `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci ;
ALTER TABLE `uchome_adminsession` CHANGE `dateline` `dateline` int(11) unsigned NOT NULL default '0' ;

ALTER TABLE `uchome_album` CHANGE `albumid` `albumid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_album` CHANGE `albumname` `albumname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_album` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_album` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_album` CHANGE `dateline` `dateline` int(11) unsigned NOT NULL default '0' ;
ALTER TABLE `uchome_album` CHANGE `picnum` `picnum` int(11) unsigned NOT NULL default '0' ;
ALTER TABLE `uchome_album` CHANGE `pic` `pic` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_album` CHANGE `password` `password` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_appcreditlog` CHANGE `logid` `logid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_appcreditlog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_appcreditlog` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_appcreditlog` CHANGE `appname` `appname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_appcreditlog` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_appcreditlog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_blacklist` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blacklist` CHANGE `buid` `buid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blacklist` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_block` CHANGE `bid` `bid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_block` CHANGE `blockname` `blockname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_block` CHANGE `cachename` `cachename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_block` CHANGE `cachetime` `cachetime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_block` CHANGE `startnum` `startnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_block` CHANGE `num` `num` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_block` CHANGE `perpage` `perpage` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_blog` CHANGE `blogid` `blogid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_blog` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_blog` CHANGE `subject` `subject` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_blog` CHANGE `classid` `classid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `viewnum` `viewnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `replynum` `replynum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `pic` `pic` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_blog` CHANGE `password` `password` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_blog` CHANGE `click_1` `click_1` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `click_2` `click_2` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `click_3` `click_3` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `click_4` `click_4` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blog` CHANGE `click_5` `click_5` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_blogfield` CHANGE `blogid` `blogid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_blogfield` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blogfield` CHANGE `postip` `postip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_blogfield` CHANGE `relatedtime` `relatedtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blogfield` CHANGE `magiccolor` `magiccolor` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_blogfield` CHANGE `magicpaper` `magicpaper` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_cache` CHANGE `cachekey` `cachekey` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_cache` CHANGE `mtime` `mtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_class` CHANGE `classid` `classid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_class` CHANGE `classname` `classname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_class` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_class` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_click` CHANGE `clickid` `clickid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_click` CHANGE `name` `name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_click` CHANGE `icon` `icon` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_click` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_click` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_clickuser` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_clickuser` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_clickuser` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_clickuser` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_clickuser` CHANGE `clickid` `clickid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_clickuser` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_comment` CHANGE `cid` `cid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_comment` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_comment` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_comment` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_comment` CHANGE `authorid` `authorid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ; 
ALTER TABLE `uchome_comment` CHANGE `author` `author` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_comment` CHANGE `ip` `ip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_comment` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;  

ALTER TABLE `uchome_config` CHANGE `var` `var` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_cron` CHANGE `cronid` `cronid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_cron` CHANGE `name` `name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_cron` CHANGE `filename` `filename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_cron` CHANGE `lastrun` `lastrun` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_cron` CHANGE `nextrun` `nextrun` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_cron` CHANGE `minute` `minute` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_creditrule` CHANGE `rid` `rid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_creditrule` CHANGE `rulename` `rulename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_creditrule` CHANGE `action` `action` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_creditrule` CHANGE `cycletime` `cycletime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditrule` CHANGE `rewardnum` `rewardnum` INT( 11 ) unsigned NOT NULL DEFAULT '1' ;
ALTER TABLE `uchome_creditrule` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditrule` CHANGE `experience` `experience` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_creditlog` CHANGE `clid` `clid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_creditlog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `rid` `rid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `total` `total` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `cyclenum` `cyclenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `experience` `experience` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `starttime` `starttime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_creditlog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_data` CHANGE `var` `var` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_data` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_docomment` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_docomment` CHANGE `upid` `upid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_docomment` CHANGE `doid` `doid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_docomment` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_docomment` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_docomment` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_docomment` CHANGE `ip` `ip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_docomment` CHANGE `grade` `grade` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_doing` CHANGE `doid` `doid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_doing` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_doing` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_doing` CHANGE `from` `from` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_doing` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_doing` CHANGE `ip` `ip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_doing` CHANGE `replynum` `replynum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_doing` CHANGE `mood` `mood` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_event` CHANGE `eventid` `eventid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_event` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_event` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `title` `title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_event` CHANGE `classid` `classid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
-- ADD country after classid
ALTER TABLE `uchome_event` CHANGE `province` `province` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_event` CHANGE `city` `city` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_event` CHANGE `location` `location` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_event` CHANGE `poster` `poster` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_event` CHANGE `deadline` `deadline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `starttime` `starttime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `endtime` `endtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `public` `public` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `membernum` `membernum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `follownum` `follownum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `viewnum` `viewnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `grade` `grade` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `recommendtime` `recommendtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `picnum` `picnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `threadnum` `threadnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `updatetime` `updatetime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_event` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_eventclass` CHANGE `classid` `classid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_eventclass` CHANGE `classname` `classname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_eventclass` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_eventfield` CHANGE `eventid` `eventid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_eventfield` CHANGE `limitnum` `limitnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_eventinvite` CHANGE `eventid` `eventid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_eventinvite` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_eventinvite` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_eventinvite` CHANGE `touid` `touid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_eventinvite` CHANGE `tousername` `tousername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_eventinvite` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_eventpic` CHANGE `picid` `picid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_eventpic` CHANGE `eventid` `eventid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_eventpic` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_eventpic` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_eventpic` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_feed` CHANGE `feedid` `feedid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_feed` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_feed` CHANGE `icon` `icon` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_feed` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_feed` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_feed` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_feed` CHANGE `hash_template` `hash_template` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_feed` CHANGE `hash_data` `hash_data` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_feed` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_feed` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_feed` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_friend` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friend` CHANGE `fuid` `fuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friend` CHANGE `fusername` `fusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_friend` CHANGE `gid` `gid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friend` CHANGE `note` `note` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_friend` CHANGE `num` `num` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friend` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_friendguide` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_friendguide` CHANGE `fuid` `fuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friendguide` CHANGE `fusername` `fusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_friendguide` CHANGE `num` `num` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_friendlog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friendlog` CHANGE `fuid` `fuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_friendlog` CHANGE `action` `action` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_friendlog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_invite` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_invite` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_invite` CHANGE `code` `code` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_invite` CHANGE `fuid` `fuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_invite` CHANGE `fusername` `fusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_invite` CHANGE `email` `email` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_invite` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_log` CHANGE `logid` `logid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_log` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_log` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_magic` CHANGE `mid` `mid` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magic` CHANGE `name` `name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magic` CHANGE `charge` `charge` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magic` CHANGE `experience` `experience` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magic` CHANGE `provideperoid` `provideperoid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magic` CHANGE `providecount` `providecount` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magic` CHANGE `useperoid` `useperoid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magic` CHANGE `usecount` `usecount` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magic` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_magicinlog` CHANGE `logid` `logid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_magicinlog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicinlog` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magicinlog` CHANGE `mid` `mid` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magicinlog` CHANGE `count` `count` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicinlog` CHANGE `type` `type` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicinlog` CHANGE `fromid` `fromid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicinlog` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicinlog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_magicstore` CHANGE `mid` `mid` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magicstore` CHANGE `storage` `storage` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicstore` CHANGE `lastprovide` `lastprovide` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicstore` CHANGE `sellcount` `sellcount` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicstore` CHANGE `sellcredit` `sellcredit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_magicuselog` CHANGE `logid` `logid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_magicuselog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicuselog` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magicuselog` CHANGE `mid` `mid` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magicuselog` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicuselog` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_magicuselog` CHANGE `count` `count` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicuselog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_magicuselog` CHANGE `expire` `expire` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_mailqueue` CHANGE `qid` `qid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_mailqueue` CHANGE `cid` `cid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mailqueue` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_mailcron` CHANGE `cid` `cid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_mailcron` CHANGE `touid` `touid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mailcron` CHANGE `email` `email` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_mailcron` CHANGE `sendtime` `sendtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_member` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_member` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_member` CHANGE `password` `password` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_mtag` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_mtag` CHANGE `tagname` `tagname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_mtag` CHANGE `fieldid` `fieldid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtag` CHANGE `membernum` `membernum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtag` CHANGE `threadnum` `threadnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtag` CHANGE `postnum` `postnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtag` CHANGE `pic` `pic` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_mtaginvite` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtaginvite` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtaginvite` CHANGE `fromuid` `fromuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_mtaginvite` CHANGE `fromusername` `fromusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_mtaginvite` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_myapp` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_myapp` CHANGE `appname` `appname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_myapp` CHANGE `version` `version` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_myapp` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_myinvite` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_myinvite` CHANGE `typename` `typename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_myinvite` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_myinvite` CHANGE `fromuid` `fromuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_myinvite` CHANGE `touid` `touid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_myinvite` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_myinvite` CHANGE `hash` `hash` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_notification` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_notification` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_notification` CHANGE `type` `type` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_notification` CHANGE `authorid` `authorid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_notification` CHANGE `author` `author` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_notification` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_pic` CHANGE `picid` `picid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_pic` CHANGE `albumid` `albumid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_pic` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `postip` `postip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_pic` CHANGE `filename` `filename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_pic` CHANGE `type` `type` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_pic` CHANGE `size` `size` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `filepath` `filepath` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_pic` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `click_6` `click_6` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `click_7` `click_7` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `click_8` `click_8` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `click_9` `click_9` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `click_10` `click_10` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_pic` CHANGE `magicframe` `magicframe` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_picfield` CHANGE `picid` `picid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_poke` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poke` CHANGE `fromuid` `fromuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poke` CHANGE `fromusername` `fromusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_poke` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poke` CHANGE `iconid` `iconid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_poll` CHANGE `pid` `pid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_poll` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_poll` CHANGE `subject` `subject` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_poll` CHANGE `voternum` `voternum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `replynum` `replynum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `maxchoice` `maxchoice` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `percredit` `percredit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_poll` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_pollfield` CHANGE `pid` `pid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_polloption` CHANGE `oid` `oid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_polloption` CHANGE `pid` `pid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_polloption` CHANGE `votenum` `votenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_polloption` CHANGE `option` `option` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_polluser` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_polluser` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_polluser` CHANGE `pid` `pid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_polluser` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_post` CHANGE `pid` `pid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_post` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_post` CHANGE `tid` `tid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_post` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_post` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_post` CHANGE `ip` `ip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_post` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_profield` CHANGE `fieldid` `fieldid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_profield` CHANGE `title` `title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_profield` CHANGE `formtype` `formtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_profield` CHANGE `inputnum` `inputnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_profield` CHANGE `mtagminnum` `mtagminnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_profield` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_profilefield` CHANGE `fieldid` `fieldid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_profilefield` CHANGE `title` `title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_profilefield` CHANGE `formtype` `formtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_profilefield` CHANGE `maxsize` `maxsize` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_profilefield` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_report` CHANGE `rid` `rid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_report` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_report` CHANGE `idtype` `idtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_report` CHANGE `num` `num` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_report` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_session` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_session` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_session` CHANGE `password` `password` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_session` CHANGE `lastactivity` `lastactivity` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_session` CHANGE `ip` `ip` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_share` CHANGE `sid` `sid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_share` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_share` CHANGE `type` `type` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_share` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_share` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_share` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_share` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_show` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_show` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_show` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_show` CHANGE `note` `note` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_space` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `groupid` `groupid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `experience` `experience` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_space` CHANGE `name` `name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_space` CHANGE `domain` `domain` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_space` CHANGE `friendnum` `friendnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `viewnum` `viewnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `notenum` `notenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `addfriendnum` `addfriendnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `mtaginvitenum` `mtaginvitenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `eventinvitenum` `eventinvitenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `myinvitenum` `myinvitenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `pokenum` `pokenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `doingnum` `doingnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `blognum` `blognum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `albumnum` `albumnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `threadnum` `threadnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `pollnum` `pollnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `eventnum` `eventnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `sharenum` `sharenum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `updatetime` `updatetime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `lastsearch` `lastsearch` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `lastpost` `lastpost` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `lastlogin` `lastlogin` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `lastsend` `lastsend` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `attachsize` `attachsize` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `addsize` `addsize` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `addfriend` `addfriend` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `newpm` `newpm` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `regip` `regip` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_space` CHANGE `ip` `ip` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_space` CHANGE `mood` `mood` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_spacefield` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacefield` CHANGE `email` `email` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `newemail` `newemail` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `mobile` `mobile` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `qq` `qq` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `msn` `msn` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `msnrobot` `msnrobot` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `videopic` `videopic` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `birthyear` `birthyear` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacefield` CHANGE `birthmonth` `birthmonth` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacefield` CHANGE `birthday` `birthday` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacefield` CHANGE `blood` `blood` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
-- Add birthcountry varchar(2) NOT NULL default '', after marry
ALTER TABLE `uchome_spacefield` CHANGE `birthprovince` `birthprovince` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `birthcity` `birthcity` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
-- Add residecountry varchar(2) NOT NULL default '', after birthcity
ALTER TABLE `uchome_spacefield` CHANGE `resideprovince` `resideprovince` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `residecity` `residecity` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `authstr` `authstr` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `theme` `theme` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacefield` CHANGE `menunum` `menunum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacefield` CHANGE `magicexpire` `magicexpire` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacefield` CHANGE `timeoffset` `timeoffset` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_spaceinfo` CHANGE `infoid` `infoid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_spaceinfo` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spaceinfo` CHANGE `type` `type` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spaceinfo` CHANGE `subtype` `subtype` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spaceinfo` CHANGE `startyear` `startyear` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spaceinfo` CHANGE `endyear` `endyear` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spaceinfo` CHANGE `startmonth` `startmonth` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spaceinfo` CHANGE `endmonth` `endmonth` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_spacelog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacelog` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacelog` CHANGE `opuid` `opuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacelog` CHANGE `opusername` `opusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_spacelog` CHANGE `expiration` `expiration` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_spacelog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_stat` CHANGE `daytime` `daytime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `login` `login` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `register` `register` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `invite` `invite` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `appinvite` `appinvite` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `doing` `doing` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `blog` `blog` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `pic` `pic` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `poll` `poll` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `event` `event` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `share` `share` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `thread` `thread` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `docomment` `docomment` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `blogcomment` `blogcomment` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `piccomment` `piccomment` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `pollcomment` `pollcomment` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `pollvote` `pollvote` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `eventcomment` `eventcomment` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `eventjoin` `eventjoin` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `sharecomment` `sharecomment` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `post` `post` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `wall` `wall` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `poke` `poke` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_stat` CHANGE `click` `click` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_statuser` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_statuser` CHANGE `daytime` `daytime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_statuser` CHANGE `type` `type` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_tag` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_tag` CHANGE `tagname` `tagname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_tag` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_tag` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_tag` CHANGE `blognum` `blognum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_tagblog` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_tagblog` CHANGE `blogid` `blogid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_tagspace` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_tagspace` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_tagspace` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_tagspace` CHANGE `grade` `grade` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_task` CHANGE `taskid` `taskid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_task` CHANGE `name` `name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_task` CHANGE `num` `num` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `maxnum` `maxnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `image` `image` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_task` CHANGE `filename` `filename` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_task` CHANGE `starttime` `starttime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `endtime` `endtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `nexttime` `nexttime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `nexttype` `nexttype` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_task` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_thread` CHANGE `tid` `tid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_thread` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `tagid` `tagid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `eventid` `eventid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `subject` `subject` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_thread` CHANGE `magiccolor` `magiccolor` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `magicegg` `magicegg` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_thread` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `viewnum` `viewnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `replynum` `replynum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `lastpost` `lastpost` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `lastauthor` `lastauthor` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_thread` CHANGE `lastauthorid` `lastauthorid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `hot` `hot` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `click_11` `click_11` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `click_12` `click_12` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `click_13` `click_13` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `click_14` `click_14` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_thread` CHANGE `click_15` `click_15` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_topic` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_topic` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_topic` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_topic` CHANGE `subject` `subject` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_topic` CHANGE `pic` `pic` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_topic` CHANGE `joinnum` `joinnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_topic` CHANGE `lastpost` `lastpost` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_topic` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_topic` CHANGE `endtime` `endtime` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_topicuser` CHANGE `id` `id` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_topicuser` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_topicuser` CHANGE `topicid` `topicid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_topicuser` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_topicuser` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_userapp` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userapp` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userapp` CHANGE `appname` `appname` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_userapp` CHANGE `menuorder` `menuorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userapp` CHANGE `displayorder` `displayorder` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_userappfield` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userappfield` CHANGE `appid` `appid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_userevent` CHANGE `eventid` `eventid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userevent` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userevent` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_userevent` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userevent` CHANGE `status` `status` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userevent` CHANGE `fellow` `fellow` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_usergroup` CHANGE `gid` `gid` INT( 11 ) unsigned NOT NULL auto_increment ;
ALTER TABLE `uchome_usergroup` CHANGE `grouptitle` `grouptitle` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_usergroup` CHANGE `explower` `explower` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `maxfriendnum` `maxfriendnum` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `maxattachsize` `maxattachsize` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `searchinterval` `searchinterval` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `postinterval` `postinterval` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `domainlength` `domainlength` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `color` `color` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usergroup` CHANGE `icon` `icon` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `uchome_userlog` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_userlog` CHANGE `action` `action` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_userlog` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_usermagic` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usermagic` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_usermagic` CHANGE `mid` `mid` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_usermagic` CHANGE `count` `count` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_usertask` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usertask` CHANGE `username` `username` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_usertask` CHANGE `taskid` `taskid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usertask` CHANGE `credit` `credit` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_usertask` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

ALTER TABLE `uchome_visitor` CHANGE `uid` `uid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_visitor` CHANGE `vuid` `vuid` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;
ALTER TABLE `uchome_visitor` CHANGE `vusername` `vusername` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `uchome_visitor` CHANGE `dateline` `dateline` INT( 11 ) unsigned NOT NULL DEFAULT '0' ;

-- -----------------------

ALTER TABLE `uchome_event` ADD `country` VARCHAR( 2 )  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `classid` ;
ALTER TABLE `uchome_spacefield` ADD `birthcountry` VARCHAR( 2 )  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `marry` ;
ALTER TABLE `uchome_spacefield` ADD `residecountry` VARCHAR( 2 )  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `birthcity` ;

-- ----------------------------
 