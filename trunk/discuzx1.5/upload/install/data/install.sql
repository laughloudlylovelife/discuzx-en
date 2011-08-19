--
-- DiscuzX INSTALL MAKE SQL DUMP V1.0
-- DO NOT modify this file
--
-- Create: 2010-08-30 14:12:16
--
DROP TABLE IF EXISTS pre_common_addon;
CREATE TABLE pre_common_addon (
  `key` varchar(255) NOT NULL DEFAULT '',
  title varchar(255) NOT NULL DEFAULT '',
  sitename varchar(255) NOT NULL DEFAULT '',
  siteurl varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  contact varchar(255) NOT NULL DEFAULT '',
  logo varchar(255) NOT NULL DEFAULT '',
  system tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_admincp_cmenu;
CREATE TABLE pre_common_admincp_cmenu (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  url varchar(255) NOT NULL,
  sort tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL,
  clicks int(11) unsigned NOT NULL DEFAULT '1',
  uid int(11) unsigned NOT NULL,
  dateline int(11) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY uid (uid),
  KEY displayorder (displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_admincp_group;
CREATE TABLE pre_common_admincp_group (
  cpgroupid int(11) unsigned NOT NULL AUTO_INCREMENT,
  cpgroupname varchar(255) NOT NULL,
  PRIMARY KEY (cpgroupid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_admincp_member;
CREATE TABLE pre_common_admincp_member (
  uid int(11) unsigned NOT NULL,
  cpgroupid int(11) unsigned NOT NULL,
  customperm text NOT NULL,
  PRIMARY KEY (uid),
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_admincp_perm;
CREATE TABLE pre_common_admincp_perm (
  cpgroupid int(11) unsigned NOT NULL,
  perm varchar(255) NOT NULL,
  UNIQUE KEY cpgroupperm (cpgroupid,perm),
  KEY cpgroupid (cpgroupid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_admincp_session;
CREATE TABLE pre_common_admincp_session (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  adminid int(11) unsigned NOT NULL DEFAULT '0',
  panel tinyint(1) NOT NULL DEFAULT '0',
  ip varchar(15) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  errorcount tinyint(1) NOT NULL DEFAULT '0',
  `storage` mediumtext NOT NULL,
  PRIMARY KEY (uid,panel)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_admingroup;
CREATE TABLE pre_common_admingroup (
  admingid int(11) unsigned NOT NULL DEFAULT '0',
  alloweditpost tinyint(1) NOT NULL DEFAULT '0',
  alloweditpoll tinyint(1) NOT NULL DEFAULT '0',
  allowstickthread tinyint(1) NOT NULL DEFAULT '0',
  allowmodpost tinyint(1) NOT NULL DEFAULT '0',
  allowdelpost tinyint(1) NOT NULL DEFAULT '0',
  allowmassprune tinyint(1) NOT NULL DEFAULT '0',
  allowrefund tinyint(1) NOT NULL DEFAULT '0',
  allowcensorword tinyint(1) NOT NULL DEFAULT '0',
  allowviewip tinyint(1) NOT NULL DEFAULT '0',
  allowbanip tinyint(1) NOT NULL DEFAULT '0',
  allowedituser tinyint(1) NOT NULL DEFAULT '0',
  allowmoduser tinyint(1) NOT NULL DEFAULT '0',
  allowbanuser tinyint(1) NOT NULL DEFAULT '0',
  allowpostannounce tinyint(1) NOT NULL DEFAULT '0',
  allowviewlog tinyint(1) NOT NULL DEFAULT '0',
  allowbanpost tinyint(1) NOT NULL DEFAULT '0',
  supe_allowpushthread tinyint(1) NOT NULL DEFAULT '0',
  allowhighlightthread tinyint(1) NOT NULL DEFAULT '0',
  allowdigestthread tinyint(1) NOT NULL DEFAULT '0',
  allowrecommendthread tinyint(1) NOT NULL DEFAULT '0',
  allowbumpthread tinyint(1) NOT NULL DEFAULT '0',
  allowclosethread tinyint(1) NOT NULL DEFAULT '0',
  allowmovethread tinyint(1) NOT NULL DEFAULT '0',
  allowedittypethread tinyint(1) NOT NULL DEFAULT '0',
  allowstampthread tinyint(1) NOT NULL DEFAULT '0',
  allowstamplist tinyint(1) NOT NULL DEFAULT '0',
  allowcopythread tinyint(1) NOT NULL DEFAULT '0',
  allowmergethread tinyint(1) NOT NULL DEFAULT '0',
  allowsplitthread tinyint(1) NOT NULL DEFAULT '0',
  allowrepairthread tinyint(1) NOT NULL DEFAULT '0',
  allowwarnpost tinyint(1) NOT NULL DEFAULT '0',
  allowviewreport tinyint(1) NOT NULL DEFAULT '0',
  alloweditforum tinyint(1) NOT NULL DEFAULT '0',
  allowremovereward tinyint(1) NOT NULL DEFAULT '0',
  allowedittrade tinyint(1) NOT NULL DEFAULT '0',
  alloweditactivity tinyint(1) NOT NULL DEFAULT '0',
  allowstickreply tinyint(1) NOT NULL DEFAULT '0',
  allowmanagearticle tinyint(1) NOT NULL DEFAULT '0',
  allowauthorizedarticle tinyint(1) NOT NULL DEFAULT '0',
  allowauthorizedblock tinyint(1) NOT NULL DEFAULT '0',
  allowaddtopic tinyint(1) NOT NULL DEFAULT '0',
  allowmanagetopic tinyint(1) NOT NULL DEFAULT '0',
  allowdiy tinyint(1) NOT NULL DEFAULT '0',
  allowclearrecycle tinyint(1) NOT NULL DEFAULT '0',
  managefeed tinyint(1) NOT NULL DEFAULT '0',
  managedoing tinyint(1) NOT NULL DEFAULT '0',
  manageshare tinyint(1) NOT NULL DEFAULT '0',
  manageblog tinyint(1) NOT NULL DEFAULT '0',
  managealbum tinyint(1) NOT NULL DEFAULT '0',
  managecomment tinyint(1) NOT NULL DEFAULT '0',
  managemagiclog tinyint(1) NOT NULL DEFAULT '0',
  managereport tinyint(1) NOT NULL DEFAULT '0',
  managehotuser tinyint(1) NOT NULL DEFAULT '0',
  managedefaultuser tinyint(1) NOT NULL DEFAULT '0',
  managevideophoto tinyint(1) NOT NULL DEFAULT '0',
  managemagic tinyint(1) NOT NULL DEFAULT '0',
  manageclick tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (admingid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_adminnote;
CREATE TABLE pre_common_adminnote (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  admin varchar(255) NOT NULL DEFAULT '',
  access int(11) NOT NULL DEFAULT '0',
  adminid int(11) NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_advertisement;
CREATE TABLE pre_common_advertisement (
  advid int(11) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  targets text NOT NULL,
  parameters text NOT NULL,
  `code` text NOT NULL,
  starttime int(11) unsigned NOT NULL DEFAULT '0',
  endtime int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (advid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_advertisement_custom;
CREATE TABLE pre_common_advertisement_custom (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (id),
  KEY `name` (`name`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_banned;
CREATE TABLE pre_common_banned (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  ip1 smallint(3) NOT NULL DEFAULT '0',
  ip2 smallint(3) NOT NULL DEFAULT '0',
  ip3 smallint(3) NOT NULL DEFAULT '0',
  ip4 smallint(3) NOT NULL DEFAULT '0',
  admin varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_block;
CREATE TABLE pre_common_block (
  bid int(11) unsigned NOT NULL AUTO_INCREMENT,
  blockclass varchar(255) NOT NULL DEFAULT '0',
  blocktype tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  title text NOT NULL,
  classname varchar(255) NOT NULL DEFAULT '',
  summary text NOT NULL,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  styleid int(11) unsigned NOT NULL DEFAULT '0',
  blockstyle text NOT NULL,
  picwidth int(11) unsigned NOT NULL DEFAULT '0',
  picheight int(11) unsigned NOT NULL DEFAULT '0',
  target varchar(255) NOT NULL DEFAULT '',
  dateformat varchar(255) NOT NULL DEFAULT '',
  dateuformat tinyint(1) NOT NULL DEFAULT '0',
  script varchar(255) NOT NULL DEFAULT '',
  param text NOT NULL,
  shownum int(11) unsigned NOT NULL DEFAULT '0',
  cachetime int(11) unsigned NOT NULL DEFAULT '0',
  punctualupdate tinyint(1) NOT NULL DEFAULT '0',
  hidedisplay tinyint(1) NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  notinherited tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (bid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_block_item;
CREATE TABLE pre_common_block_item (
  itemid int(11) unsigned NOT NULL AUTO_INCREMENT,
  bid int(11) unsigned NOT NULL DEFAULT '0',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  itemtype tinyint(1) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  pic varchar(255) NOT NULL DEFAULT '',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  makethumb tinyint(1) NOT NULL DEFAULT '0',
  summary text NOT NULL,
  showstyle text NOT NULL,
  related text NOT NULL,
  `fields` text NOT NULL,
  displayorder int(11) NOT NULL DEFAULT '0',
  startdate int(11) unsigned NOT NULL DEFAULT '0',
  enddate int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (itemid),
  KEY bid (bid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_block_item_data;
CREATE TABLE pre_common_block_item_data (
  dataid int(11) unsigned NOT NULL AUTO_INCREMENT,
  bid int(11) unsigned NOT NULL DEFAULT '0',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  itemtype tinyint(1) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  pic varchar(255) NOT NULL DEFAULT '',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  makethumb tinyint(1) NOT NULL DEFAULT '0',
  summary text NOT NULL,
  showstyle text NOT NULL,
  related text NOT NULL,
  `fields` text NOT NULL,
  displayorder int(11) NOT NULL DEFAULT '0',
  startdate int(11) unsigned NOT NULL DEFAULT '0',
  enddate int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  isverified tinyint(1) NOT NULL DEFAULT '0',
  verifiedtime int(11) unsigned NOT NULL DEFAULT '0',
  stickgrade tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (dataid),
  KEY bid (bid,stickgrade,verifiedtime)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_block_permission;
CREATE TABLE pre_common_block_permission (
  bid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  allowmanage tinyint(1) NOT NULL DEFAULT '0',
  allowrecommend tinyint(1) NOT NULL DEFAULT '0',
  needverify tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (bid,uid),
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_block_style;
CREATE TABLE pre_common_block_style (
  styleid int(11) unsigned NOT NULL AUTO_INCREMENT,
  blockclass varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  template text NOT NULL,
  `hash` varchar(255) NOT NULL DEFAULT '',
  getpic tinyint(1) NOT NULL DEFAULT '0',
  getsummary tinyint(1) NOT NULL DEFAULT '0',
  makethumb tinyint(1) NOT NULL DEFAULT '0',
  settarget tinyint(1) NOT NULL DEFAULT '0',
  `fields` text NOT NULL,
  PRIMARY KEY (styleid),
  KEY `hash` (`hash`),
  KEY blockclass (blockclass)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_cache;
CREATE TABLE pre_common_cache (
  cachekey varchar(255) NOT NULL DEFAULT '',
  cachevalue mediumtext NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (cachekey)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_credit_log;
CREATE TABLE pre_common_credit_log (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  operation varchar(255) NOT NULL DEFAULT '',
  relatedid int(11) unsigned NOT NULL,
  dateline int(11) unsigned NOT NULL,
  extcredits1 int(11) NOT NULL,
  extcredits2 int(11) NOT NULL,
  extcredits3 int(11) NOT NULL,
  extcredits4 int(11) NOT NULL,
  extcredits5 int(11) NOT NULL,
  extcredits6 int(11) NOT NULL,
  extcredits7 int(11) NOT NULL,
  extcredits8 int(11) NOT NULL,
  KEY uid (uid),
  KEY operation (operation),
  KEY relatedid (relatedid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_credit_rule;
CREATE TABLE pre_common_credit_rule (
  rid int(11) unsigned NOT NULL AUTO_INCREMENT,
  rulename varchar(255) NOT NULL DEFAULT '',
  `action` varchar(255) NOT NULL DEFAULT '',
  cycletype tinyint(1) NOT NULL DEFAULT '0',
  cycletime int(11) NOT NULL DEFAULT '0',
  rewardnum tinyint(11) NOT NULL DEFAULT '1',
  norepeat tinyint(1) NOT NULL DEFAULT '0',
  extcredits1 int(11) NOT NULL DEFAULT '0',
  extcredits2 int(11) NOT NULL DEFAULT '0',
  extcredits3 int(11) NOT NULL DEFAULT '0',
  extcredits4 int(11) NOT NULL DEFAULT '0',
  extcredits5 int(11) NOT NULL DEFAULT '0',
  extcredits6 int(11) NOT NULL DEFAULT '0',
  extcredits7 int(11) NOT NULL DEFAULT '0',
  extcredits8 int(11) NOT NULL DEFAULT '0',
  fids text NOT NULL,
  PRIMARY KEY (rid),
  UNIQUE KEY `action` (`action`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_credit_rule_log;
CREATE TABLE pre_common_credit_rule_log (
  clid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  rid int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  total int(11) unsigned NOT NULL DEFAULT '0',
  cyclenum int(11) unsigned NOT NULL DEFAULT '0',
  extcredits1 int(11) NOT NULL DEFAULT '0',
  extcredits2 int(11) NOT NULL DEFAULT '0',
  extcredits3 int(11) NOT NULL DEFAULT '0',
  extcredits4 int(11) NOT NULL DEFAULT '0',
  extcredits5 int(11) NOT NULL DEFAULT '0',
  extcredits6 int(11) NOT NULL DEFAULT '0',
  extcredits7 int(11) NOT NULL DEFAULT '0',
  extcredits8 int(11) NOT NULL DEFAULT '0',
  starttime int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (clid),
  KEY uid (uid,rid,fid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_credit_rule_log_field;
CREATE TABLE pre_common_credit_rule_log_field (
  clid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  info text NOT NULL,
  `user` text NOT NULL,
  app text NOT NULL,
  PRIMARY KEY (uid,clid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_cron;
CREATE TABLE pre_common_cron (
  cronid int(11) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` varchar(255) NOT NULL DEFAULT '',
  filename varchar(255) NOT NULL DEFAULT '',
  lastrun int(11) unsigned NOT NULL DEFAULT '0',
  nextrun int(11) unsigned NOT NULL DEFAULT '0',
  weekday tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (cronid),
  KEY nextrun (available,nextrun)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_district;
CREATE TABLE pre_common_district (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `level` int(11) unsigned NOT NULL DEFAULT '0',
  upid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY upid (upid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_diy_data;
CREATE TABLE pre_common_diy_data (
  targettplname varchar(255) NOT NULL DEFAULT '',
  primaltplname varchar(255) NOT NULL DEFAULT '',
  diycontent mediumtext NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (targettplname)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_domain;
CREATE TABLE pre_common_domain (
  domain varchar(32) NOT NULL DEFAULT '',
  domainroot varchar(64) NOT NULL DEFAULT '',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  KEY domain (domain,domainroot),
  KEY idtype (idtype)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_failedlogin;
CREATE TABLE pre_common_failedlogin (
  ip varchar(15) NOT NULL DEFAULT '',
  count tinyint(1) unsigned NOT NULL DEFAULT '0',
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_friendlink;
CREATE TABLE pre_common_friendlink (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  displayorder int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  description mediumtext NOT NULL,
  logo varchar(255) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_invite;
CREATE TABLE pre_common_invite (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL DEFAULT '',
  fuid int(11) unsigned NOT NULL DEFAULT '0',
  fusername varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  email varchar(255) NOT NULL DEFAULT '',
  inviteip varchar(15) NOT NULL DEFAULT '',
  appid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  endtime int(11) unsigned NOT NULL DEFAULT '0',
  regdateline int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (id),
  KEY uid (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_magic;
CREATE TABLE pre_common_magic (
  magicid int(11) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  identifier varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  displayorder int(11) NOT NULL DEFAULT '0',
  credit tinyint(1) NOT NULL DEFAULT '0',
  price int(11) unsigned NOT NULL DEFAULT '0',
  num int(11) unsigned NOT NULL DEFAULT '0',
  salevolume int(11) unsigned NOT NULL DEFAULT '0',
  supplytype tinyint(1) NOT NULL DEFAULT '0',
  supplynum int(11) unsigned NOT NULL DEFAULT '0',
  useperoid tinyint(1) NOT NULL DEFAULT '0',
  usenum int(11) unsigned NOT NULL DEFAULT '0',
  weight int(11) unsigned NOT NULL DEFAULT '1',
  magicperm text NOT NULL,
  useevent tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (magicid),
  UNIQUE KEY identifier (identifier),
  KEY displayorder (available,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_magiclog;
CREATE TABLE pre_common_magiclog (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  magicid int(11) unsigned NOT NULL DEFAULT '0',
  `action` tinyint(1) NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  amount int(11) unsigned NOT NULL DEFAULT '0',
  credit tinyint(1) unsigned NOT NULL DEFAULT '0',
  price int(11) unsigned NOT NULL DEFAULT '0',
  targetid int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) DEFAULT NULL,
  targetuid int(11) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid,dateline),
  KEY `action` (`action`),
  KEY targetuid (targetuid,dateline),
  KEY magicid (magicid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_mailcron;
CREATE TABLE pre_common_mailcron (
  cid int(11) unsigned NOT NULL AUTO_INCREMENT,
  touid int(11) unsigned NOT NULL DEFAULT '0',
  email varchar(255) NOT NULL DEFAULT '',
  sendtime int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  KEY sendtime (sendtime)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_mailqueue;
CREATE TABLE pre_common_mailqueue (
  qid int(11) unsigned NOT NULL AUTO_INCREMENT,
  cid int(11) unsigned NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  message text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (qid),
  KEY mcid (cid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member;
CREATE TABLE pre_common_member (
  uid int(11) unsigned NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL DEFAULT '',
  username varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  emailstatus tinyint(1) NOT NULL DEFAULT '0',
  avatarstatus tinyint(1) NOT NULL DEFAULT '0',
  videophotostatus tinyint(1) NOT NULL DEFAULT '0',
  adminid tinyint(1) NOT NULL DEFAULT '0',
  groupid int(11) unsigned NOT NULL DEFAULT '0',
  groupexpiry int(11) unsigned NOT NULL DEFAULT '0',
  extgroupids varchar(255) NOT NULL DEFAULT '',
  regdate int(11) unsigned NOT NULL DEFAULT '0',
  credits int(11) NOT NULL DEFAULT '0',
  notifysound tinyint(1) NOT NULL DEFAULT '0',
  timeoffset varchar(255) NOT NULL DEFAULT '',
  newpm int(11) unsigned NOT NULL DEFAULT '0',
  newprompt int(11) unsigned NOT NULL DEFAULT '0',
  accessmasks tinyint(1) NOT NULL DEFAULT '0',
  allowadmincp tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  UNIQUE KEY username (username),
  KEY email (email),
  KEY groupid (groupid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_count;
CREATE TABLE pre_common_member_count (
  uid int(11) unsigned NOT NULL,
  extcredits1 int(11) NOT NULL DEFAULT '0',
  extcredits2 int(11) NOT NULL DEFAULT '0',
  extcredits3 int(11) NOT NULL DEFAULT '0',
  extcredits4 int(11) NOT NULL DEFAULT '0',
  extcredits5 int(11) NOT NULL DEFAULT '0',
  extcredits6 int(11) NOT NULL DEFAULT '0',
  extcredits7 int(11) NOT NULL DEFAULT '0',
  extcredits8 int(11) NOT NULL DEFAULT '0',
  friends int(11) unsigned NOT NULL DEFAULT '0',
  posts int(11) unsigned NOT NULL DEFAULT '0',
  threads int(11) unsigned NOT NULL DEFAULT '0',
  digestposts int(11) unsigned NOT NULL DEFAULT '0',
  doings int(11) unsigned NOT NULL DEFAULT '0',
  blogs int(11) unsigned NOT NULL DEFAULT '0',
  albums int(11) unsigned NOT NULL DEFAULT '0',
  sharings int(11) unsigned NOT NULL DEFAULT '0',
  attachsize int(11) unsigned NOT NULL DEFAULT '0',
  views int(11) unsigned NOT NULL DEFAULT '0',
  oltime int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  KEY posts (posts)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_field_forum;
CREATE TABLE pre_common_member_field_forum (
  uid int(11) unsigned NOT NULL,
  publishfeed int(11) NOT NULL DEFAULT '0',
  customshow tinyint(1) unsigned NOT NULL DEFAULT '26',
  customstatus varchar(255) NOT NULL DEFAULT '',
  medals text NOT NULL,
  sightml text NOT NULL,
  groupterms text NOT NULL,
  authstr varchar(255) NOT NULL DEFAULT '',
  groups mediumtext NOT NULL,
  attentiongroup varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_field_home;
CREATE TABLE pre_common_member_field_home (
  uid int(11) unsigned NOT NULL,
  videophoto varchar(255) NOT NULL DEFAULT '',
  spacename varchar(255) NOT NULL DEFAULT '',
  spacedescription varchar(255) NOT NULL DEFAULT '',
  domain varchar(255) NOT NULL DEFAULT '',
  addsize int(11) unsigned NOT NULL DEFAULT '0',
  addfriend int(11) unsigned NOT NULL DEFAULT '0',
  menunum int(11) unsigned NOT NULL DEFAULT '0',
  theme varchar(255) NOT NULL DEFAULT '',
  spacecss text NOT NULL,
  blockposition text NOT NULL,
  recentnote text NOT NULL,
  spacenote text NOT NULL,
  privacy text NOT NULL,
  feedfriend mediumtext NOT NULL,
  acceptemail text NOT NULL,
  magicgift text NOT NULL,
  PRIMARY KEY (uid),
  KEY domain (domain)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_log;
CREATE TABLE pre_common_member_log (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_magic;
CREATE TABLE pre_common_member_magic (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  magicid int(11) unsigned NOT NULL DEFAULT '0',
  num int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,magicid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_profile;
CREATE TABLE pre_common_member_profile (
  uid int(11) unsigned NOT NULL,
  realname varchar(255) NOT NULL DEFAULT '',
  gender tinyint(1) NOT NULL DEFAULT '0',
  birthyear smallint(4) unsigned NOT NULL DEFAULT '0',
  birthmonth tinyint(2) unsigned NOT NULL DEFAULT '0',
  birthday tinyint(2) unsigned NOT NULL DEFAULT '0',
  constellation varchar(255) NOT NULL DEFAULT '',
  zodiac varchar(255) NOT NULL DEFAULT '',
  telephone varchar(255) NOT NULL DEFAULT '',
  mobile varchar(255) NOT NULL DEFAULT '',
  idcardtype varchar(255) NOT NULL DEFAULT '',
  idcard varchar(255) NOT NULL DEFAULT '',
  address varchar(255) NOT NULL DEFAULT '',
  zipcode varchar(255) NOT NULL DEFAULT '',
  nationality varchar(255) NOT NULL DEFAULT '',
  birthprovince varchar(255) NOT NULL DEFAULT '',
  birthcity varchar(255) NOT NULL DEFAULT '',
  resideprovince varchar(255) NOT NULL DEFAULT '',
  residecity varchar(255) NOT NULL DEFAULT '',
  residedist varchar(255) NOT NULL DEFAULT '',
  residecommunity varchar(255) NOT NULL DEFAULT '',
  residesuite varchar(255) NOT NULL DEFAULT '',
  graduateschool varchar(255) NOT NULL DEFAULT '',
  company varchar(255) NOT NULL DEFAULT '',
  education varchar(255) NOT NULL DEFAULT '',
  occupation varchar(255) NOT NULL DEFAULT '',
  position varchar(255) NOT NULL DEFAULT '',
  revenue varchar(255) NOT NULL DEFAULT '',
  affectivestatus varchar(255) NOT NULL DEFAULT '',
  lookingfor varchar(255) NOT NULL DEFAULT '',
  bloodtype varchar(255) NOT NULL DEFAULT '',
  height varchar(255) NOT NULL DEFAULT '',
  weight varchar(255) NOT NULL DEFAULT '',
  alipay varchar(255) NOT NULL DEFAULT '',
  icq varchar(255) NOT NULL DEFAULT '',
  qq varchar(255) NOT NULL DEFAULT '',
  yahoo varchar(255) NOT NULL DEFAULT '',
  msn varchar(255) NOT NULL DEFAULT '',
  taobao varchar(255) NOT NULL DEFAULT '',
  site varchar(255) NOT NULL DEFAULT '',
  bio text NOT NULL,
  interest text NOT NULL,
  field1 text NOT NULL,
  field2 text NOT NULL,
  field3 text NOT NULL,
  field4 text NOT NULL,
  field5 text NOT NULL,
  field6 text NOT NULL,
  field7 text NOT NULL,
  field8 text NOT NULL,
  PRIMARY KEY (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_profile_setting;
CREATE TABLE pre_common_member_profile_setting (
  fieldid varchar(255) NOT NULL DEFAULT '',
  available tinyint(1) NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  needverify tinyint(1) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  displayorder int(11) unsigned NOT NULL DEFAULT '0',
  required tinyint(1) NOT NULL DEFAULT '0',
  unchangeable tinyint(1) NOT NULL DEFAULT '0',
  showincard tinyint(1) NOT NULL DEFAULT '0',
  showinthread tinyint(1) NOT NULL DEFAULT '0',
  showinregister tinyint(1) NOT NULL DEFAULT '0',
  allowsearch tinyint(1) NOT NULL DEFAULT '0',
  formtype varchar(255) NOT NULL,
  size int(11) unsigned NOT NULL DEFAULT '0',
  choices text NOT NULL,
  validate text NOT NULL,
  PRIMARY KEY (fieldid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_security;
CREATE TABLE pre_common_member_security (
  securityid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  fieldid varchar(255) NOT NULL DEFAULT '',
  oldvalue text NOT NULL,
  newvalue text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (securityid),
  KEY uid (uid,fieldid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_stat_field;
CREATE TABLE pre_common_member_stat_field (
  optionid int(11) unsigned NOT NULL AUTO_INCREMENT,
  fieldid varchar(255) NOT NULL DEFAULT '',
  fieldvalue varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(255) NOT NULL DEFAULT '',
  users int(11) unsigned NOT NULL DEFAULT '0',
  updatetime int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (optionid),
  KEY fieldid (fieldid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_stat_fieldcache;
CREATE TABLE pre_common_member_stat_fieldcache (
  optionid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (optionid,uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_stat_search;
CREATE TABLE pre_common_member_stat_search (
  optionid int(11) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL DEFAULT '',
  `condition` text NOT NULL,
  `hash` varchar(255) NOT NULL DEFAULT '',
  users int(11) unsigned NOT NULL DEFAULT '0',
  updatetime int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (optionid),
  KEY `hash` (`hash`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_stat_searchcache;
CREATE TABLE pre_common_member_stat_searchcache (
  optionid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (optionid,uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_status;
CREATE TABLE pre_common_member_status (
  uid int(11) unsigned NOT NULL,
  regip varchar(15) NOT NULL DEFAULT '',
  lastip varchar(15) NOT NULL DEFAULT '',
  lastvisit int(11) unsigned NOT NULL DEFAULT '0',
  lastactivity int(11) unsigned NOT NULL DEFAULT '0',
  lastpost int(11) unsigned NOT NULL DEFAULT '0',
  lastsendmail int(11) unsigned NOT NULL DEFAULT '0',
  notifications int(11) unsigned NOT NULL DEFAULT '0',
  myinvitations int(11) unsigned NOT NULL DEFAULT '0',
  pokes int(11) unsigned NOT NULL DEFAULT '0',
  pendingfriends int(11) unsigned NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  buyercredit int(11) NOT NULL DEFAULT '0',
  sellercredit int(11) NOT NULL DEFAULT '0',
  favtimes int(11) unsigned NOT NULL DEFAULT '0',
  sharetimes int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_validate;
CREATE TABLE pre_common_member_validate (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  submitdate int(11) unsigned NOT NULL DEFAULT '0',
  moddate int(11) unsigned NOT NULL DEFAULT '0',
  admin varchar(255) NOT NULL DEFAULT '',
  submittimes int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  message text NOT NULL,
  remark text NOT NULL,
  PRIMARY KEY (uid),
  KEY `status` (`status`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_verify;
CREATE TABLE pre_common_member_verify (
  uid int(11) unsigned NOT NULL,
  verify1 tinyint(1) NOT NULL DEFAULT '0',
  verify2 tinyint(1) NOT NULL DEFAULT '0',
  verify3 tinyint(1) NOT NULL DEFAULT '0',
  verify4 tinyint(1) NOT NULL DEFAULT '0',
  verify5 tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  KEY verify1 (verify1),
  KEY verify2 (verify2),
  KEY verify3 (verify3),
  KEY verify4 (verify4),
  KEY verify5 (verify5)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_member_verify_info;
CREATE TABLE pre_common_member_verify_info (
  vid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  verifytype tinyint(1) NOT NULL DEFAULT '0',
  flag tinyint(1) NOT NULL DEFAULT '0',
  field text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (vid),
  KEY verifytype (verifytype,flag),
  KEY uid (uid,verifytype,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_myapp;
CREATE TABLE pre_common_myapp (
  appid int(11) unsigned NOT NULL DEFAULT '0',
  appname varchar(255) NOT NULL DEFAULT '',
  narrow tinyint(1) NOT NULL DEFAULT '0',
  flag tinyint(1) NOT NULL DEFAULT '0',
  version int(11) unsigned NOT NULL DEFAULT '0',
  userpanelarea tinyint(1) NOT NULL DEFAULT '0',
  canvastitle varchar(255) NOT NULL DEFAULT '',
  fullscreen tinyint(1) NOT NULL DEFAULT '0',
  displayuserpanel tinyint(1) NOT NULL DEFAULT '0',
  displaymethod tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) unsigned NOT NULL DEFAULT '0',
  iconstatus tinyint(2) NOT NULL DEFAULT '0',
  icondowntime int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (appid),
  KEY flag (flag,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_myapp_count;
CREATE TABLE pre_common_myapp_count (
  appid int(11) unsigned NOT NULL DEFAULT '0',
  usetotal int(11) unsigned NOT NULL DEFAULT '0',
  girluse int(11) unsigned NOT NULL DEFAULT '0',
  boyuse int(11) unsigned NOT NULL DEFAULT '0',
  todayuse int(11) unsigned NOT NULL DEFAULT '0',
  usedate int(11) unsigned NOT NULL DEFAULT '0',
  `install` int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (appid),
  KEY todayuse (usedate,todayuse),
  KEY `install` (`install`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_myinvite;
CREATE TABLE pre_common_myinvite (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  typename varchar(255) NOT NULL DEFAULT '',
  appid int(11) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  fromuid int(11) unsigned NOT NULL DEFAULT '0',
  touid int(11) unsigned NOT NULL DEFAULT '0',
  myml text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  `hash` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY `hash` (`hash`),
  KEY uid (touid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_mytask;
CREATE TABLE pre_common_mytask (
  uid int(11) unsigned NOT NULL,
  username char(255) NOT NULL DEFAULT '',
  taskid int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  csc char(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,taskid),
  KEY parter (taskid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_nav;
CREATE TABLE pre_common_nav (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  parentid int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  url varchar(255) NOT NULL,
  identifier varchar(255) NOT NULL,
  target tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  available tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL,
  highlight tinyint(1) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '0',
  subtype tinyint(1) NOT NULL DEFAULT '0',
  subcols tinyint(1) NOT NULL DEFAULT '0',
  icon varchar(255) NOT NULL,
  subname varchar(255) NOT NULL,
  suburl varchar(255) NOT NULL,
  navtype tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY navtype (navtype)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_onlinetime;
CREATE TABLE pre_common_onlinetime (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  thismonth int(11) unsigned NOT NULL DEFAULT '0',
  total int(11) unsigned NOT NULL DEFAULT '0',
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_plugin;
CREATE TABLE pre_common_plugin (
  pluginid int(11) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  adminid tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  identifier varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  datatables varchar(255) NOT NULL DEFAULT '',
  `directory` varchar(255) NOT NULL DEFAULT '',
  copyright varchar(255) NOT NULL DEFAULT '',
  modules text NOT NULL,
  version varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (pluginid),
  UNIQUE KEY identifier (identifier)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_pluginvar;
CREATE TABLE pre_common_pluginvar (
  pluginvarid int(11) unsigned NOT NULL AUTO_INCREMENT,
  pluginid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  variable varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `value` text NOT NULL,
  extra text NOT NULL,
  PRIMARY KEY (pluginvarid),
  KEY pluginid (pluginid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_process;
CREATE TABLE pre_common_process (
  processid varchar(11) NOT NULL,
  expiry int(11) DEFAULT NULL,
  extra int(11) DEFAULT NULL,
  PRIMARY KEY (processid),
  KEY expiry (expiry)
) TYPE=HEAP;

DROP TABLE IF EXISTS pre_common_regip;
CREATE TABLE pre_common_regip (
  ip varchar(15) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  count int(11) NOT NULL DEFAULT '0',
  KEY ip (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_report;
CREATE TABLE pre_common_report (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  urlkey varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  message text NOT NULL,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  num int(11) unsigned NOT NULL DEFAULT '1',
  opuid int(11) unsigned NOT NULL DEFAULT '0',
  opname varchar(255) NOT NULL DEFAULT '',
  optime int(11) unsigned NOT NULL DEFAULT '0',
  opresult varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  KEY urlkey (urlkey)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_searchindex;
CREATE TABLE pre_common_searchindex (
  searchid int(11) unsigned NOT NULL AUTO_INCREMENT,
  srchmod int(11) unsigned NOT NULL,
  keywords varchar(255) NOT NULL DEFAULT '',
  searchstring text NOT NULL,
  useip varchar(15) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  threadsortid int(11) unsigned NOT NULL DEFAULT '0',
  num int(11) unsigned NOT NULL DEFAULT '0',
  ids text NOT NULL,
  PRIMARY KEY (searchid),
  KEY srchmod (srchmod)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_secquestion;
CREATE TABLE pre_common_secquestion (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL,
  question text NOT NULL,
  answer varchar(255) NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_session;
CREATE TABLE pre_common_session (
  sid varchar(255) NOT NULL DEFAULT '',
  ip1 tinyint(3) unsigned NOT NULL DEFAULT '0',
  ip2 tinyint(3) unsigned NOT NULL DEFAULT '0',
  ip3 tinyint(3) unsigned NOT NULL DEFAULT '0',
  ip4 tinyint(3) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  groupid int(11) unsigned NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  `action` tinyint(1) unsigned NOT NULL DEFAULT '0',
  lastactivity int(11) unsigned NOT NULL DEFAULT '0',
  lastolupdate int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY sid (sid),
  KEY uid (uid)
) TYPE=HEAP;

DROP TABLE IF EXISTS pre_common_setting;
CREATE TABLE pre_common_setting (
  skey varchar(255) NOT NULL DEFAULT '',
  svalue text NOT NULL,
  PRIMARY KEY (skey)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_smiley;
CREATE TABLE pre_common_smiley (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  typeid int(11) unsigned NOT NULL,
  displayorder tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('smiley','stamp','stamplist') NOT NULL DEFAULT 'smiley',
  `code` varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  KEY `type` (`type`,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_sphinxcounter;
CREATE TABLE pre_common_sphinxcounter (
  indexid tinyint(1) NOT NULL,
  maxid int(11) NOT NULL,
  PRIMARY KEY (indexid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_stat;
CREATE TABLE pre_common_stat (
  daytime int(11) unsigned NOT NULL DEFAULT '0',
  login int(11) unsigned NOT NULL DEFAULT '0',
  register int(11) unsigned NOT NULL DEFAULT '0',
  invite int(11) unsigned NOT NULL DEFAULT '0',
  appinvite int(11) unsigned NOT NULL DEFAULT '0',
  doing int(11) unsigned NOT NULL DEFAULT '0',
  blog int(11) unsigned NOT NULL DEFAULT '0',
  pic int(11) unsigned NOT NULL DEFAULT '0',
  poll int(11) unsigned NOT NULL DEFAULT '0',
  activity int(11) unsigned NOT NULL DEFAULT '0',
  `share` int(11) unsigned NOT NULL DEFAULT '0',
  thread int(11) unsigned NOT NULL DEFAULT '0',
  docomment int(11) unsigned NOT NULL DEFAULT '0',
  blogcomment int(11) unsigned NOT NULL DEFAULT '0',
  piccomment int(11) unsigned NOT NULL DEFAULT '0',
  sharecomment int(11) unsigned NOT NULL DEFAULT '0',
  reward int(11) unsigned NOT NULL DEFAULT '0',
  debate int(11) unsigned NOT NULL DEFAULT '0',
  trade int(11) unsigned NOT NULL DEFAULT '0',
  `group` int(11) unsigned NOT NULL DEFAULT '0',
  groupjoin int(11) unsigned NOT NULL DEFAULT '0',
  groupthread int(11) unsigned NOT NULL DEFAULT '0',
  grouppost int(11) unsigned NOT NULL DEFAULT '0',
  post int(11) unsigned NOT NULL DEFAULT '0',
  wall int(11) unsigned NOT NULL DEFAULT '0',
  poke int(11) unsigned NOT NULL DEFAULT '0',
  click int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (daytime)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_statuser;
CREATE TABLE pre_common_statuser (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  daytime int(11) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '',
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_style;
CREATE TABLE pre_common_style (
  styleid int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  available tinyint(1) NOT NULL DEFAULT '1',
  templateid int(11) unsigned NOT NULL DEFAULT '0',
  extstyle varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (styleid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_stylevar;
CREATE TABLE pre_common_stylevar (
  stylevarid int(11) unsigned NOT NULL AUTO_INCREMENT,
  styleid int(11) unsigned NOT NULL DEFAULT '0',
  variable text NOT NULL,
  substitute text NOT NULL,
  PRIMARY KEY (stylevarid),
  KEY styleid (styleid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_syscache;
CREATE TABLE pre_common_syscache (
  cname varchar(255) NOT NULL,
  ctype int(11) unsigned NOT NULL,
  dateline int(11) unsigned NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (cname)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_task;
CREATE TABLE pre_common_task (
  taskid int(11) unsigned NOT NULL AUTO_INCREMENT,
  relatedtaskid int(11) unsigned NOT NULL DEFAULT '0',
  available tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  description text NOT NULL,
  icon varchar(255) NOT NULL DEFAULT '',
  applicants int(11) unsigned NOT NULL DEFAULT '0',
  achievers int(11) unsigned NOT NULL DEFAULT '0',
  tasklimits int(11) unsigned NOT NULL DEFAULT '0',
  applyperm text NOT NULL,
  scriptname varchar(255) NOT NULL DEFAULT '',
  starttime int(11) unsigned NOT NULL DEFAULT '0',
  endtime int(11) unsigned NOT NULL DEFAULT '0',
  period int(11) unsigned NOT NULL DEFAULT '0',
  periodtype tinyint(1) NOT NULL DEFAULT '0',
  reward enum('credit','magic','medal','invite','group') NOT NULL DEFAULT 'credit',
  prize varchar(255) NOT NULL DEFAULT '',
  bonus int(11) NOT NULL DEFAULT '0',
  displayorder int(11) unsigned NOT NULL DEFAULT '0',
  version varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (taskid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_taskvar;
CREATE TABLE pre_common_taskvar (
  taskvarid int(11) unsigned NOT NULL AUTO_INCREMENT,
  taskid int(11) unsigned NOT NULL DEFAULT '0',
  sort enum('apply','complete') NOT NULL DEFAULT 'complete',
  `name` varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  variable varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `value` text NOT NULL,
  PRIMARY KEY (taskvarid),
  KEY taskid (taskid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_template;
CREATE TABLE pre_common_template (
  templateid int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `directory` varchar(255) NOT NULL DEFAULT '',
  copyright varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (templateid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_template_block;
CREATE TABLE pre_common_template_block (
  targettplname varchar(255) NOT NULL DEFAULT '',
  bid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (targettplname,bid),
  KEY bid (bid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_template_permission;
CREATE TABLE pre_common_template_permission (
  targettplname varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  allowmanage tinyint(1) NOT NULL DEFAULT '0',
  allowrecommend tinyint(1) NOT NULL DEFAULT '0',
  needverify tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (targettplname,uid),
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_usergroup;
CREATE TABLE pre_common_usergroup (
  groupid int(11) unsigned NOT NULL AUTO_INCREMENT,
  radminid int(11) NOT NULL DEFAULT '0',
  `type` enum('system','special','member') NOT NULL DEFAULT 'member',
  system varchar(255) NOT NULL DEFAULT 'private',
  grouptitle varchar(255) NOT NULL DEFAULT '',
  creditshigher int(11) NOT NULL DEFAULT '0',
  creditslower int(11) NOT NULL DEFAULT '0',
  stars int(11) NOT NULL DEFAULT '0',
  color varchar(255) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL DEFAULT '',
  allowvisit tinyint(1) NOT NULL DEFAULT '0',
  allowsendpm tinyint(1) NOT NULL DEFAULT '1',
  allowinvite tinyint(1) NOT NULL DEFAULT '0',
  allowmailinvite tinyint(1) NOT NULL DEFAULT '0',
  maxinvitenum int(11) unsigned NOT NULL DEFAULT '0',
  inviteprice int(11) unsigned NOT NULL DEFAULT '0',
  maxinviteday int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (groupid),
  KEY creditsrange (creditshigher,creditslower)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_usergroup_field;
CREATE TABLE pre_common_usergroup_field (
  groupid int(11) unsigned NOT NULL,
  readaccess int(11) unsigned NOT NULL DEFAULT '0',
  allowpost tinyint(1) NOT NULL DEFAULT '0',
  allowreply tinyint(1) NOT NULL DEFAULT '0',
  allowpostpoll tinyint(1) NOT NULL DEFAULT '0',
  allowpostreward tinyint(1) NOT NULL DEFAULT '0',
  allowposttrade tinyint(1) NOT NULL DEFAULT '0',
  allowpostactivity tinyint(1) NOT NULL DEFAULT '0',
  allowdirectpost tinyint(1) NOT NULL DEFAULT '0',
  allowgetattach tinyint(1) NOT NULL DEFAULT '0',
  allowpostattach tinyint(1) NOT NULL DEFAULT '0',
  allowpostimage tinyint(1) NOT NULL DEFAULT '0',
  allowvote tinyint(1) NOT NULL DEFAULT '0',
  allowmultigroups tinyint(1) NOT NULL DEFAULT '0',
  allowsearch tinyint(1) NOT NULL DEFAULT '0',
  allowcstatus tinyint(1) NOT NULL DEFAULT '0',
  allowinvisible tinyint(1) NOT NULL DEFAULT '0',
  allowtransfer tinyint(1) NOT NULL DEFAULT '0',
  allowsetreadperm tinyint(1) NOT NULL DEFAULT '0',
  allowsetattachperm tinyint(1) NOT NULL DEFAULT '0',
  allowhidecode tinyint(1) NOT NULL DEFAULT '0',
  allowhtml tinyint(1) NOT NULL DEFAULT '0',
  allowanonymous tinyint(1) NOT NULL DEFAULT '0',
  allowsigbbcode tinyint(1) NOT NULL DEFAULT '0',
  allowsigimgcode tinyint(1) NOT NULL DEFAULT '0',
  allowmagics tinyint(1) unsigned NOT NULL,
  disableperiodctrl tinyint(1) NOT NULL DEFAULT '0',
  reasonpm tinyint(1) NOT NULL DEFAULT '0',
  maxprice int(11) unsigned NOT NULL DEFAULT '0',
  maxsigsize int(11) unsigned NOT NULL DEFAULT '0',
  maxattachsize int(11) unsigned NOT NULL DEFAULT '0',
  maxsizeperday int(11) unsigned NOT NULL DEFAULT '0',
  maxpostsperhour int(11) unsigned NOT NULL DEFAULT '0',
  attachextensions varchar(255) NOT NULL DEFAULT '',
  raterange varchar(255) NOT NULL DEFAULT '',
  mintradeprice int(11) unsigned NOT NULL DEFAULT '1',
  maxtradeprice int(11) unsigned NOT NULL DEFAULT '0',
  minrewardprice int(11) unsigned NOT NULL DEFAULT '1',
  maxrewardprice int(11) unsigned NOT NULL DEFAULT '0',
  magicsdiscount tinyint(1) NOT NULL,
  maxmagicsweight int(11) unsigned NOT NULL,
  allowpostdebate tinyint(1) NOT NULL DEFAULT '0',
  tradestick tinyint(1) unsigned NOT NULL,
  exempt tinyint(1) unsigned NOT NULL,
  maxattachnum int(11) NOT NULL DEFAULT '0',
  allowposturl tinyint(1) NOT NULL DEFAULT '3',
  allowrecommend tinyint(1) unsigned NOT NULL DEFAULT '1',
  allowpostrushreply tinyint(1) NOT NULL DEFAULT '0',
  maxfriendnum int(11) unsigned NOT NULL DEFAULT '0',
  maxspacesize int(11) unsigned NOT NULL DEFAULT '0',
  allowcomment tinyint(1) NOT NULL DEFAULT '0',
  allowcommentarticle int(11) NOT NULL DEFAULT '0',
  searchinterval int(11) unsigned NOT NULL DEFAULT '0',
  searchignore tinyint(1) NOT NULL DEFAULT '0',
  allowblog tinyint(1) NOT NULL DEFAULT '0',
  allowdoing tinyint(1) NOT NULL DEFAULT '0',
  allowupload tinyint(1) NOT NULL DEFAULT '0',
  allowshare tinyint(1) NOT NULL DEFAULT '0',
  allowblogmod tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowdoingmod tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowuploadmod tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowsharemod tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowcss tinyint(1) NOT NULL DEFAULT '0',
  allowpoke tinyint(1) NOT NULL DEFAULT '0',
  allowfriend tinyint(1) NOT NULL DEFAULT '0',
  allowclick tinyint(1) NOT NULL DEFAULT '0',
  allowmagic tinyint(1) NOT NULL DEFAULT '0',
  allowstat tinyint(1) NOT NULL DEFAULT '0',
  allowstatdata tinyint(1) NOT NULL DEFAULT '0',
  videophotoignore tinyint(1) NOT NULL DEFAULT '0',
  allowviewvideophoto tinyint(1) NOT NULL DEFAULT '0',
  allowmyop tinyint(1) NOT NULL DEFAULT '0',
  magicdiscount tinyint(1) NOT NULL DEFAULT '0',
  domainlength int(11) unsigned NOT NULL DEFAULT '0',
  seccode tinyint(1) NOT NULL DEFAULT '0',
  disablepostctrl tinyint(1) NOT NULL DEFAULT '0',
  allowbuildgroup tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowgroupdirectpost tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowgroupposturl tinyint(1) unsigned NOT NULL DEFAULT '0',
  edittimelimit int(11) unsigned NOT NULL DEFAULT '0',
  allowpostarticle tinyint(1) NOT NULL DEFAULT '0',
  allowdownlocalimg tinyint(1) NOT NULL DEFAULT '0',
  allowpostarticlemod tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowspacediyhtml tinyint(1) NOT NULL DEFAULT '0',
  allowspacediybbcode tinyint(1) NOT NULL DEFAULT '0',
  allowspacediyimgcode tinyint(1) NOT NULL DEFAULT '0',
  allowcommentpost tinyint(1) NOT NULL DEFAULT '2',
  allowcommentitem tinyint(1) NOT NULL DEFAULT '0',
  ignorecensor tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (groupid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_common_word;
CREATE TABLE pre_common_word (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  admin varchar(255) NOT NULL DEFAULT '',
  find varchar(255) NOT NULL DEFAULT '',
  replacement varchar(255) NOT NULL DEFAULT '',
  extra varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_access;
CREATE TABLE pre_forum_access (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  allowview tinyint(1) NOT NULL DEFAULT '0',
  allowpost tinyint(1) NOT NULL DEFAULT '0',
  allowreply tinyint(1) NOT NULL DEFAULT '0',
  allowgetattach tinyint(1) NOT NULL DEFAULT '0',
  allowpostattach tinyint(1) NOT NULL DEFAULT '0',
  allowpostimage tinyint(1) NOT NULL DEFAULT '0',
  adminuser int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fid),
  KEY listorder (fid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_activity;
CREATE TABLE pre_forum_activity (
  tid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  aid int(11) unsigned NOT NULL DEFAULT '0',
  cost int(11) unsigned NOT NULL DEFAULT '0',
  starttimefrom int(11) unsigned NOT NULL DEFAULT '0',
  starttimeto int(11) unsigned NOT NULL DEFAULT '0',
  place varchar(255) NOT NULL DEFAULT '',
  class varchar(255) NOT NULL DEFAULT '',
  gender tinyint(1) NOT NULL DEFAULT '0',
  number int(11) unsigned NOT NULL DEFAULT '0',
  applynumber int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  ufield text NOT NULL,
  credit int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid),
  KEY uid (uid,starttimefrom),
  KEY starttimefrom (starttimefrom),
  KEY expiration (expiration),
  KEY applynumber (applynumber)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_activityapply;
CREATE TABLE pre_forum_activityapply (
  applyid int(11) unsigned NOT NULL AUTO_INCREMENT,
  tid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  message varchar(255) NOT NULL DEFAULT '',
  verified tinyint(1) NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  payment int(11) NOT NULL DEFAULT '0',
  ufielddata text NOT NULL,
  PRIMARY KEY (applyid),
  KEY uid (uid),
  KEY tid (tid),
  KEY dateline (tid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_announcement;
CREATE TABLE pre_forum_announcement (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  author varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  starttime int(11) unsigned NOT NULL DEFAULT '0',
  endtime int(11) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  groups text NOT NULL,
  PRIMARY KEY (id),
  KEY timespan (starttime,endtime)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_attachment;
CREATE TABLE pre_forum_attachment (
  aid int(11) unsigned NOT NULL AUTO_INCREMENT,
  tid int(11) unsigned NOT NULL DEFAULT '0',
  pid int(11) unsigned NOT NULL DEFAULT '0',
  width int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  readperm int(11) unsigned NOT NULL DEFAULT '0',
  price int(11) unsigned NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  filetype varchar(255) NOT NULL DEFAULT '',
  filesize int(11) unsigned NOT NULL DEFAULT '0',
  attachment varchar(255) NOT NULL DEFAULT '',
  downloads int(11) NOT NULL DEFAULT '0',
  isimage tinyint(1) NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  thumb tinyint(1) unsigned NOT NULL DEFAULT '0',
  remote tinyint(1) unsigned NOT NULL DEFAULT '0',
  picid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (aid),
  KEY tid (tid),
  KEY pid (pid,aid),
  KEY uid (uid),
  KEY dateline (dateline,isimage,downloads)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_attachmentfield;
CREATE TABLE pre_forum_attachmentfield (
  aid int(11) unsigned NOT NULL,
  tid int(11) unsigned NOT NULL DEFAULT '0',
  pid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  description varchar(255) NOT NULL,
  PRIMARY KEY (aid),
  KEY tid (tid),
  KEY pid (pid,aid),
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_attachtype;
CREATE TABLE pre_forum_attachtype (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  extension varchar(255) NOT NULL DEFAULT '',
  maxsize int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_bbcode;
CREATE TABLE pre_forum_bbcode (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  tag varchar(255) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL,
  replacement text NOT NULL,
  example varchar(255) NOT NULL DEFAULT '',
  explanation text NOT NULL,
  params tinyint(1) unsigned NOT NULL DEFAULT '1',
  prompt text NOT NULL,
  nest int(11) unsigned NOT NULL DEFAULT '1',
  displayorder int(11) NOT NULL DEFAULT '0',
  perm text NOT NULL,
  PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_creditslog;
CREATE TABLE pre_forum_creditslog (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fromto varchar(255) NOT NULL DEFAULT '',
  sendcredits tinyint(1) NOT NULL DEFAULT '0',
  receivecredits tinyint(1) NOT NULL DEFAULT '0',
  send int(11) unsigned NOT NULL DEFAULT '0',
  receive int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  operation varchar(255) NOT NULL DEFAULT '',
  KEY uid (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_debate;
CREATE TABLE pre_forum_debate (
  tid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  starttime int(11) unsigned NOT NULL DEFAULT '0',
  endtime int(11) unsigned NOT NULL DEFAULT '0',
  affirmdebaters int(11) unsigned NOT NULL DEFAULT '0',
  negadebaters int(11) unsigned NOT NULL DEFAULT '0',
  affirmvotes int(11) unsigned NOT NULL DEFAULT '0',
  negavotes int(11) unsigned NOT NULL DEFAULT '0',
  umpire varchar(255) NOT NULL DEFAULT '',
  winner tinyint(1) NOT NULL DEFAULT '0',
  bestdebater varchar(255) NOT NULL DEFAULT '',
  affirmpoint text NOT NULL,
  negapoint text NOT NULL,
  umpirepoint text NOT NULL,
  affirmvoterids text NOT NULL,
  negavoterids text NOT NULL,
  affirmreplies int(11) unsigned NOT NULL,
  negareplies int(11) unsigned NOT NULL,
  PRIMARY KEY (tid),
  KEY uid (uid,starttime)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_debatepost;
CREATE TABLE pre_forum_debatepost (
  pid int(11) unsigned NOT NULL DEFAULT '0',
  stand tinyint(1) NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  voters mediumint(11) unsigned NOT NULL DEFAULT '0',
  voterids text NOT NULL,
  PRIMARY KEY (pid),
  KEY pid (pid,stand),
  KEY tid (tid,uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_faq;
CREATE TABLE pre_forum_faq (
  id int(11) NOT NULL AUTO_INCREMENT,
  fpid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  identifier varchar(255) NOT NULL,
  keyword varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  message text NOT NULL,
  PRIMARY KEY (id),
  KEY displayplay (displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_forum;
CREATE TABLE pre_forum_forum (
  fid int(11) unsigned NOT NULL AUTO_INCREMENT,
  fup int(11) unsigned NOT NULL DEFAULT '0',
  `type` enum('group','forum','sub') NOT NULL DEFAULT 'forum',
  `name` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  styleid int(11) unsigned NOT NULL DEFAULT '0',
  threads int(11) unsigned NOT NULL DEFAULT '0',
  posts int(11) unsigned NOT NULL DEFAULT '0',
  todayposts int(11) unsigned NOT NULL DEFAULT '0',
  lastpost varchar(255) NOT NULL DEFAULT '',
  domain varchar(255) NOT NULL DEFAULT '',
  allowsmilies tinyint(1) NOT NULL DEFAULT '0',
  allowhtml tinyint(1) NOT NULL DEFAULT '0',
  allowbbcode tinyint(1) NOT NULL DEFAULT '0',
  allowimgcode tinyint(1) NOT NULL DEFAULT '0',
  allowmediacode tinyint(1) NOT NULL DEFAULT '0',
  allowanonymous tinyint(1) NOT NULL DEFAULT '0',
  allowpostspecial int(11) unsigned NOT NULL DEFAULT '0',
  allowspecialonly tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowappend tinyint(1) unsigned NOT NULL DEFAULT '0',
  alloweditrules tinyint(1) NOT NULL DEFAULT '0',
  allowfeed tinyint(1) NOT NULL DEFAULT '0',
  allowside tinyint(1) NOT NULL DEFAULT '0',
  recyclebin tinyint(1) NOT NULL DEFAULT '0',
  modnewposts tinyint(1) NOT NULL DEFAULT '0',
  jammer tinyint(1) NOT NULL DEFAULT '0',
  disablewatermark tinyint(1) NOT NULL DEFAULT '0',
  inheritedmod tinyint(1) NOT NULL DEFAULT '0',
  autoclose int(11) NOT NULL DEFAULT '0',
  forumcolumns int(11) unsigned NOT NULL DEFAULT '0',
  threadcaches tinyint(1) NOT NULL DEFAULT '0',
  alloweditpost tinyint(1) unsigned NOT NULL DEFAULT '1',
  `simple` tinyint(1) unsigned NOT NULL DEFAULT '0',
  modworks tinyint(1) unsigned NOT NULL DEFAULT '0',
  allowtag tinyint(1) NOT NULL DEFAULT '0',
  allowglobalstick tinyint(1) NOT NULL DEFAULT '1',
  `level` int(11) unsigned NOT NULL DEFAULT '0',
  commoncredits int(11) unsigned NOT NULL DEFAULT '0',
  archive tinyint(1) NOT NULL DEFAULT '0',
  recommend int(11) unsigned NOT NULL DEFAULT '0',
  favtimes int(11) unsigned NOT NULL DEFAULT '0',
  sharetimes int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (fid),
  KEY forum (`status`,`type`,displayorder),
  KEY fup_type (fup,`type`,displayorder),
  KEY fup (fup)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_forum_threadtable;
CREATE TABLE pre_forum_forum_threadtable (
  fid int(11) unsigned NOT NULL,
  threadtableid int(11) unsigned NOT NULL,
  threads int(11) unsigned NOT NULL DEFAULT '0',
  posts int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (fid,threadtableid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_forumfield;
CREATE TABLE pre_forum_forumfield (
  fid int(11) unsigned NOT NULL DEFAULT '0',
  description text NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL DEFAULT '',
  redirect varchar(255) NOT NULL DEFAULT '',
  attachextensions varchar(255) NOT NULL DEFAULT '',
  creditspolicy mediumtext NOT NULL,
  formulaperm text NOT NULL,
  moderators text NOT NULL,
  rules text NOT NULL,
  threadtypes text NOT NULL,
  threadsorts text NOT NULL,
  viewperm text NOT NULL,
  postperm text NOT NULL,
  replyperm text NOT NULL,
  getattachperm text NOT NULL,
  postattachperm text NOT NULL,
  postimageperm text NOT NULL,
  spviewperm text NOT NULL,
  keywords text NOT NULL,
  supe_pushsetting text NOT NULL,
  modrecommend text NOT NULL,
  threadplugin text NOT NULL,
  extra text NOT NULL,
  jointype tinyint(1) NOT NULL DEFAULT '0',
  gviewperm tinyint(1) unsigned NOT NULL DEFAULT '0',
  membernum int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  activity int(11) unsigned NOT NULL DEFAULT '0',
  founderuid int(11) unsigned NOT NULL DEFAULT '0',
  foundername varchar(255) NOT NULL DEFAULT '',
  banner varchar(255) NOT NULL DEFAULT '',
  groupnum int(11) unsigned NOT NULL DEFAULT '0',
  commentitem text NOT NULL,
  hidemenu tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (fid),
  KEY membernum (membernum),
  KEY dateline (dateline),
  KEY lastupdate (lastupdate),
  KEY activity (activity)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_forumrecommend;
CREATE TABLE pre_forum_forumrecommend (
  fid int(11) unsigned NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL,
  typeid int(11) NOT NULL,
  displayorder tinyint(1) NOT NULL,
  `subject` varchar(255) NOT NULL,
  author varchar(255) NOT NULL,
  authorid int(11) NOT NULL,
  moderatorid int(11) NOT NULL,
  expiration int(11) unsigned NOT NULL,
  position tinyint(1) NOT NULL DEFAULT '0',
  highlight tinyint(1) NOT NULL DEFAULT '0',
  aid int(11) unsigned NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (tid),
  KEY displayorder (fid,displayorder),
  KEY position (position)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_groupcreditslog;
CREATE TABLE pre_forum_groupcreditslog (
  fid int(11) unsigned NOT NULL,
  uid int(11) unsigned NOT NULL,
  logdate int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (fid,uid,logdate)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_groupfield;
CREATE TABLE pre_forum_groupfield (
  fid int(11) unsigned NOT NULL DEFAULT '0',
  privacy tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `data` text NOT NULL,
  UNIQUE KEY `types` (fid,`type`),
  KEY fid (fid),
  KEY `type` (`type`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_groupinvite;
CREATE TABLE pre_forum_groupinvite (
  fid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  inviteuid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY ids (fid,inviteuid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_grouplevel;
CREATE TABLE pre_forum_grouplevel (
  levelid int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('special','default') NOT NULL DEFAULT 'default',
  leveltitle varchar(255) NOT NULL DEFAULT '',
  creditshigher int(11) NOT NULL DEFAULT '0',
  creditslower int(11) NOT NULL DEFAULT '0',
  icon varchar(255) NOT NULL DEFAULT '',
  creditspolicy text NOT NULL,
  postpolicy text NOT NULL,
  specialswitch text NOT NULL,
  PRIMARY KEY (levelid),
  KEY creditsrange (creditshigher,creditslower)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_groupranking;
CREATE TABLE pre_forum_groupranking (
  fid int(11) unsigned NOT NULL DEFAULT '0',
  yesterday int(11) unsigned NOT NULL DEFAULT '0',
  today int(11) unsigned NOT NULL DEFAULT '0',
  trend tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (fid),
  KEY today (today)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_groupuser;
CREATE TABLE pre_forum_groupuser (
  fid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL,
  `level` int(11) unsigned NOT NULL DEFAULT '0',
  threads int(11) unsigned NOT NULL DEFAULT '0',
  replies int(11) unsigned NOT NULL DEFAULT '0',
  joindateline int(11) unsigned NOT NULL DEFAULT '0',
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  privacy tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (fid,uid),
  KEY uid_lastupdate (uid,lastupdate),
  KEY userlist (fid,`level`,lastupdate)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_imagetype;
CREATE TABLE pre_forum_imagetype (
  typeid int(11) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `type` enum('smiley','icon','avatar') NOT NULL DEFAULT 'smiley',
  displayorder int(11) NOT NULL DEFAULT '0',
  `directory` varchar(255) NOT NULL,
  PRIMARY KEY (typeid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_medal;
CREATE TABLE pre_forum_medal (
  medalid int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  available tinyint(1) NOT NULL DEFAULT '0',
  image varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  description varchar(255) NOT NULL,
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  permission mediumtext NOT NULL,
  PRIMARY KEY (medalid),
  KEY displayorder (displayorder),
  KEY available (available,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_medallog;
CREATE TABLE pre_forum_medallog (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  medalid int(11) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY `type` (`type`),
  KEY `status` (`status`,expiration),
  KEY uid (uid,medalid,`type`),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_memberrecommend;
CREATE TABLE pre_forum_memberrecommend (
  tid int(11) unsigned NOT NULL,
  recommenduid int(11) unsigned NOT NULL,
  dateline int(11) unsigned NOT NULL,
  KEY tid (tid),
  KEY uid (recommenduid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_moderator;
CREATE TABLE pre_forum_moderator (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  inherited tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_modwork;
CREATE TABLE pre_forum_modwork (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  modaction varchar(255) NOT NULL DEFAULT '',
  dateline date NOT NULL DEFAULT '2006-01-01',
  count int(11) unsigned NOT NULL DEFAULT '0',
  posts int(11) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_onlinelist;
CREATE TABLE pre_forum_onlinelist (
  groupid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT ''
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_order;
CREATE TABLE pre_forum_order (
  orderid varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '',
  buyer varchar(255) NOT NULL DEFAULT '',
  admin varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  amount int(11) unsigned NOT NULL DEFAULT '0',
  price float(12,2) unsigned NOT NULL DEFAULT '0.00',
  submitdate int(11) unsigned NOT NULL DEFAULT '0',
  confirmdate int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY orderid (orderid),
  KEY submitdate (submitdate),
  KEY uid (uid,submitdate)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_poll;
CREATE TABLE pre_forum_poll (
  tid int(11) unsigned NOT NULL DEFAULT '0',
  overt tinyint(1) NOT NULL DEFAULT '0',
  multiple tinyint(1) NOT NULL DEFAULT '0',
  visible tinyint(1) NOT NULL DEFAULT '0',
  maxchoices int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  pollpreview varchar(255) NOT NULL DEFAULT '',
  voters int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_polloption;
CREATE TABLE pre_forum_polloption (
  polloptionid int(11) unsigned NOT NULL AUTO_INCREMENT,
  tid int(11) unsigned NOT NULL DEFAULT '0',
  votes int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  polloption varchar(255) NOT NULL DEFAULT '',
  voterids mediumtext NOT NULL,
  PRIMARY KEY (polloptionid),
  KEY tid (tid,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_pollvoter;
CREATE TABLE pre_forum_pollvoter (
  tid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  options text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  KEY tid (tid),
  KEY uid (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_post;
CREATE TABLE pre_forum_post (
  pid int(11) unsigned NOT NULL AUTO_INCREMENT,
  fid int(11) unsigned NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL DEFAULT '0',
  `first` tinyint(1) NOT NULL DEFAULT '0',
  author varchar(255) NOT NULL DEFAULT '',
  authorid int(11) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  message mediumtext NOT NULL,
  useip varchar(15) NOT NULL DEFAULT '',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  anonymous tinyint(1) NOT NULL DEFAULT '0',
  usesig tinyint(1) NOT NULL DEFAULT '0',
  htmlon tinyint(1) NOT NULL DEFAULT '0',
  bbcodeoff tinyint(1) NOT NULL DEFAULT '0',
  smileyoff tinyint(1) NOT NULL DEFAULT '0',
  parseurloff tinyint(1) NOT NULL DEFAULT '0',
  attachment tinyint(1) NOT NULL DEFAULT '0',
  rate int(11) NOT NULL DEFAULT '0',
  ratetimes int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  tags varchar(255) NOT NULL DEFAULT '0',
  `comment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (pid),
  KEY fid (fid),
  KEY authorid (authorid),
  KEY dateline (dateline),
  KEY invisible (invisible),
  KEY displayorder (tid,invisible,dateline),
  KEY `first` (tid,`first`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_post_tableid;
CREATE TABLE pre_forum_post_tableid (
  pid int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (pid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_postcomment;
CREATE TABLE pre_forum_postcomment (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  tid int(11) unsigned NOT NULL DEFAULT '0',
  pid int(11) unsigned NOT NULL DEFAULT '0',
  author varchar(255) NOT NULL DEFAULT '',
  authorid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '',
  score tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY tid (tid),
  KEY authorid (authorid),
  KEY score (score),
  KEY pid (pid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_postlog;
CREATE TABLE pre_forum_postlog (
  pid int(11) unsigned NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pid,tid),
  KEY fid (fid),
  KEY uid (uid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_postposition;
CREATE TABLE pre_forum_postposition (
  tid int(11) unsigned NOT NULL,
  position int(11) unsigned NOT NULL AUTO_INCREMENT,
  pid int(11) unsigned NOT NULL,
  PRIMARY KEY (tid,position)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_poststick;
CREATE TABLE pre_forum_poststick (
  tid int(11) unsigned NOT NULL,
  pid int(11) unsigned NOT NULL,
  position int(11) unsigned NOT NULL,
  dateline int(11) unsigned NOT NULL,
  PRIMARY KEY (tid,pid),
  KEY dateline (tid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_promotion;
CREATE TABLE pre_forum_promotion (
  ip varchar(15) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_ratelog;
CREATE TABLE pre_forum_ratelog (
  pid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  extcredits tinyint(1) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  score int(11) NOT NULL DEFAULT '0',
  reason varchar(255) NOT NULL DEFAULT '',
  KEY pid (pid,dateline),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_relatedthread;
CREATE TABLE pre_forum_relatedthread (
  tid int(11) NOT NULL DEFAULT '0',
  `type` enum('general','trade') NOT NULL DEFAULT 'general',
  expiration int(11) NOT NULL DEFAULT '0',
  keywords varchar(255) NOT NULL DEFAULT '',
  relatedthreads text NOT NULL,
  PRIMARY KEY (tid,`type`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_rsscache;
CREATE TABLE pre_forum_rsscache (
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  forum varchar(255) NOT NULL DEFAULT '',
  author varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  description char(255) NOT NULL DEFAULT '',
  UNIQUE KEY tid (tid),
  KEY fid (fid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_spacecache;
CREATE TABLE pre_forum_spacecache (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  variable varchar(255) NOT NULL,
  `value` text NOT NULL,
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,variable)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_statlog;
CREATE TABLE pre_forum_statlog (
  logdate date NOT NULL,
  fid int(11) unsigned NOT NULL,
  `type` int(11) unsigned NOT NULL DEFAULT '0',
  `value` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (logdate,fid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_thread;
CREATE TABLE pre_forum_thread (
  tid int(11) unsigned NOT NULL AUTO_INCREMENT,
  fid int(11) unsigned NOT NULL DEFAULT '0',
  posttableid int(11) unsigned NOT NULL DEFAULT '0',
  typeid int(11) unsigned NOT NULL DEFAULT '0',
  sortid int(11) unsigned NOT NULL DEFAULT '0',
  readperm int(11) unsigned NOT NULL DEFAULT '0',
  price int(11) NOT NULL DEFAULT '0',
  author varchar(255) NOT NULL DEFAULT '',
  authorid int(11) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  lastpost int(11) unsigned NOT NULL DEFAULT '0',
  lastposter varchar(255) NOT NULL DEFAULT '',
  views int(11) unsigned NOT NULL DEFAULT '0',
  replies int(11) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(1) NOT NULL DEFAULT '0',
  highlight tinyint(1) NOT NULL DEFAULT '0',
  digest tinyint(1) NOT NULL DEFAULT '0',
  rate tinyint(1) NOT NULL DEFAULT '0',
  special tinyint(1) NOT NULL DEFAULT '0',
  attachment tinyint(1) NOT NULL DEFAULT '0',
  moderated tinyint(1) NOT NULL DEFAULT '0',
  closed int(11) unsigned NOT NULL DEFAULT '0',
  stickreply tinyint(1) unsigned NOT NULL DEFAULT '0',
  recommends int(11) NOT NULL DEFAULT '0',
  recommend_add int(11) NOT NULL DEFAULT '0',
  recommend_sub int(11) NOT NULL DEFAULT '0',
  heats int(11) unsigned NOT NULL DEFAULT '0',
  `status` int(11) unsigned NOT NULL DEFAULT '0',
  isgroup tinyint(1) NOT NULL DEFAULT '0',
  favtimes int(11) NOT NULL DEFAULT '0',
  sharetimes int(11) NOT NULL DEFAULT '0',
  stamp int(11) NOT NULL DEFAULT '-1',
  icon int(11) NOT NULL DEFAULT '-1',
  pushedaid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (tid),
  KEY digest (digest),
  KEY sortid (sortid),
  KEY displayorder (fid,displayorder,lastpost),
  KEY typeid (fid,typeid,displayorder,lastpost),
  KEY recommends (recommends),
  KEY heats (heats),
  KEY authorid (authorid),
  KEY isgroup (isgroup,lastpost),
  KEY special (special)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_threadclass;
CREATE TABLE pre_forum_threadclass (
  typeid int(11) unsigned NOT NULL AUTO_INCREMENT,
  fid int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  displayorder int(11) NOT NULL,
  icon varchar(255) NOT NULL,
  PRIMARY KEY (typeid),
  KEY fid (fid,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_threadlog;
CREATE TABLE pre_forum_threadlog (
  tid int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  otherid int(11) unsigned NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL,
  expiry int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid,fid,uid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_threadmod;
CREATE TABLE pre_forum_threadmod (
  tid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  magicid int(11) unsigned NOT NULL,
  stamp int(11) NOT NULL,
  reason varchar(255) NOT NULL DEFAULT '',
  KEY tid (tid,dateline),
  KEY expiration (expiration,`status`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_threadtype;
CREATE TABLE pre_forum_threadtype (
  typeid int(11) unsigned NOT NULL AUTO_INCREMENT,
  fid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL DEFAULT '',
  special int(11) NOT NULL DEFAULT '0',
  modelid int(11) unsigned NOT NULL DEFAULT '0',
  expiration tinyint(1) NOT NULL DEFAULT '0',
  template text NOT NULL,
  stemplate text NOT NULL,
  ptemplate text NOT NULL,
  btemplate text NOT NULL,
  PRIMARY KEY (typeid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_trade;
CREATE TABLE pre_forum_trade (
  tid int(11) unsigned NOT NULL,
  pid int(11) unsigned NOT NULL,
  typeid int(11) unsigned NOT NULL,
  sellerid int(11) unsigned NOT NULL,
  seller varchar(255) NOT NULL,
  account varchar(255) NOT NULL,
  tenpayaccount varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL,
  price decimal(12,2) NOT NULL,
  amount int(11) unsigned NOT NULL DEFAULT '1',
  quality tinyint(1) unsigned NOT NULL DEFAULT '0',
  locus varchar(255) NOT NULL,
  transport tinyint(1) NOT NULL DEFAULT '0',
  ordinaryfee int(11) unsigned NOT NULL DEFAULT '0',
  expressfee int(11) unsigned NOT NULL DEFAULT '0',
  emsfee int(11) unsigned NOT NULL DEFAULT '0',
  itemtype tinyint(1) NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  lastbuyer varchar(255) NOT NULL,
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  totalitems int(11) unsigned NOT NULL DEFAULT '0',
  tradesum decimal(12,2) NOT NULL DEFAULT '0.00',
  closed tinyint(1) NOT NULL DEFAULT '0',
  aid int(11) unsigned NOT NULL,
  displayorder tinyint(1) NOT NULL,
  costprice decimal(12,2) NOT NULL,
  credit int(11) unsigned NOT NULL DEFAULT '0',
  costcredit int(11) unsigned NOT NULL DEFAULT '0',
  credittradesum int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid,pid),
  KEY pid (pid),
  KEY sellerid (sellerid),
  KEY totalitems (totalitems),
  KEY tradesum (tradesum),
  KEY displayorder (tid,displayorder),
  KEY sellertrades (sellerid,tradesum,totalitems),
  KEY typeid (typeid),
  KEY credittradesum (credittradesum),
  KEY expiration (expiration)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_tradecomment;
CREATE TABLE pre_forum_tradecomment (
  id int(11) NOT NULL AUTO_INCREMENT,
  orderid varchar(255) NOT NULL,
  pid int(11) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL,
  raterid int(11) unsigned NOT NULL,
  rater varchar(255) NOT NULL,
  rateeid int(11) unsigned NOT NULL,
  ratee varchar(255) NOT NULL,
  message varchar(255) NOT NULL,
  explanation varchar(255) NOT NULL,
  score tinyint(1) NOT NULL,
  dateline int(11) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY raterid (raterid,`type`,dateline),
  KEY rateeid (rateeid,`type`,dateline),
  KEY orderid (orderid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_tradelog;
CREATE TABLE pre_forum_tradelog (
  tid int(11) unsigned NOT NULL,
  pid int(11) unsigned NOT NULL,
  orderid varchar(255) NOT NULL,
  tradeno varchar(255) NOT NULL,
  paytype tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL,
  price decimal(12,2) NOT NULL DEFAULT '0.00',
  quality tinyint(1) unsigned NOT NULL DEFAULT '0',
  itemtype tinyint(1) NOT NULL DEFAULT '0',
  number int(11) unsigned NOT NULL DEFAULT '0',
  tax decimal(12,2) unsigned NOT NULL DEFAULT '0.00',
  locus varchar(255) NOT NULL,
  sellerid int(11) unsigned NOT NULL,
  seller varchar(255) NOT NULL,
  selleraccount varchar(255) NOT NULL,
  tenpayaccount varchar(255) NOT NULL DEFAULT '0',
  buyerid int(11) unsigned NOT NULL,
  buyer varchar(255) NOT NULL,
  buyercontact varchar(255) NOT NULL,
  buyercredits int(11) unsigned NOT NULL DEFAULT '0',
  buyermsg varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  lastupdate int(11) unsigned NOT NULL DEFAULT '0',
  offline tinyint(1) NOT NULL DEFAULT '0',
  buyername varchar(255) NOT NULL,
  buyerzip varchar(255) NOT NULL,
  buyerphone varchar(255) NOT NULL,
  buyermobile varchar(255) NOT NULL,
  transport tinyint(1) NOT NULL DEFAULT '0',
  transportfee int(11) unsigned NOT NULL DEFAULT '0',
  baseprice decimal(12,2) NOT NULL,
  discount tinyint(1) NOT NULL DEFAULT '0',
  ratestatus tinyint(1) NOT NULL DEFAULT '0',
  message text NOT NULL,
  credit int(11) unsigned NOT NULL DEFAULT '0',
  basecredit int(11) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY orderid (orderid),
  KEY sellerid (sellerid),
  KEY buyerid (buyerid),
  KEY `status` (`status`),
  KEY buyerlog (buyerid,`status`,lastupdate),
  KEY sellerlog (sellerid,`status`,lastupdate),
  KEY tid (tid,pid),
  KEY pid (pid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_typeoption;
CREATE TABLE pre_forum_typeoption (
  optionid int(11) unsigned NOT NULL AUTO_INCREMENT,
  classid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  expiration tinyint(1) NOT NULL,
  protect varchar(255) NOT NULL,
  title varchar(255) NOT NULL DEFAULT '',
  description varchar(255) NOT NULL DEFAULT '',
  identifier varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  unit varchar(255) NOT NULL,
  rules mediumtext NOT NULL,
  PRIMARY KEY (optionid),
  KEY classid (classid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_typeoptionvar;
CREATE TABLE pre_forum_typeoptionvar (
  sortid int(11) unsigned NOT NULL DEFAULT '0',
  tid int(11) unsigned NOT NULL DEFAULT '0',
  fid int(11) unsigned NOT NULL DEFAULT '0',
  optionid int(11) unsigned NOT NULL DEFAULT '0',
  expiration int(11) unsigned NOT NULL DEFAULT '0',
  `value` mediumtext NOT NULL,
  KEY sortid (sortid),
  KEY tid (tid),
  KEY fid (fid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_typevar;
CREATE TABLE pre_forum_typevar (
  sortid int(11) NOT NULL DEFAULT '0',
  optionid int(11) NOT NULL DEFAULT '0',
  available tinyint(1) NOT NULL DEFAULT '0',
  required tinyint(1) NOT NULL DEFAULT '0',
  unchangeable tinyint(1) NOT NULL DEFAULT '0',
  search tinyint(1) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  subjectshow tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY optionid (sortid,optionid),
  KEY sortid (sortid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_forum_warning;
CREATE TABLE pre_forum_warning (
  wid int(11) unsigned NOT NULL AUTO_INCREMENT,
  pid int(11) unsigned NOT NULL,
  operatorid int(11) unsigned NOT NULL,
  operator varchar(255) NOT NULL,
  authorid int(11) unsigned NOT NULL,
  author varchar(255) NOT NULL,
  dateline int(11) unsigned NOT NULL,
  reason varchar(255) NOT NULL,
  PRIMARY KEY (wid),
  UNIQUE KEY pid (pid),
  KEY authorid (authorid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_album;
CREATE TABLE pre_home_album (
  albumid int(11) unsigned NOT NULL AUTO_INCREMENT,
  albumname varchar(255) NOT NULL DEFAULT '',
  catid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  updatetime int(11) unsigned NOT NULL DEFAULT '0',
  picnum int(11) unsigned NOT NULL DEFAULT '0',
  pic varchar(255) NOT NULL DEFAULT '',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '',
  target_ids text NOT NULL,
  favtimes int(11) unsigned NOT NULL,
  sharetimes int(11) unsigned NOT NULL,
  PRIMARY KEY (albumid),
  KEY uid (uid,updatetime),
  KEY updatetime (updatetime)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_album_category;
CREATE TABLE pre_home_album_category (
  catid int(11) unsigned NOT NULL AUTO_INCREMENT,
  upid int(11) unsigned NOT NULL DEFAULT '0',
  catname varchar(255) NOT NULL DEFAULT '',
  num int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (catid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_appcreditlog;
CREATE TABLE pre_home_appcreditlog (
  logid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  appid int(11) unsigned NOT NULL DEFAULT '0',
  appname varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  credit int(11) unsigned NOT NULL DEFAULT '0',
  note text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (logid),
  KEY uid (uid,dateline),
  KEY appid (appid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_blacklist;
CREATE TABLE pre_home_blacklist (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  buid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,buid),
  KEY uid (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_blog;
CREATE TABLE pre_home_blog (
  blogid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  classid int(11) unsigned NOT NULL DEFAULT '0',
  catid int(11) unsigned NOT NULL DEFAULT '0',
  viewnum int(11) unsigned NOT NULL DEFAULT '0',
  replynum int(11) unsigned NOT NULL DEFAULT '0',
  hot int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  noreply tinyint(1) NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '',
  favtimes int(11) unsigned NOT NULL DEFAULT '0',
  sharetimes int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  click1 int(11) unsigned NOT NULL DEFAULT '0',
  click2 int(11) unsigned NOT NULL DEFAULT '0',
  click3 int(11) unsigned NOT NULL DEFAULT '0',
  click4 int(11) unsigned NOT NULL DEFAULT '0',
  click5 int(11) unsigned NOT NULL DEFAULT '0',
  click6 int(11) unsigned NOT NULL DEFAULT '0',
  click7 int(11) unsigned NOT NULL DEFAULT '0',
  click8 int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (blogid),
  KEY uid (uid,dateline),
  KEY hot (hot),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_blog_category;
CREATE TABLE pre_home_blog_category (
  catid int(11) unsigned NOT NULL AUTO_INCREMENT,
  upid int(11) unsigned NOT NULL DEFAULT '0',
  catname varchar(255) NOT NULL DEFAULT '',
  num int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (catid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_blogfield;
CREATE TABLE pre_home_blogfield (
  blogid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  pic varchar(255) NOT NULL DEFAULT '',
  tag varchar(255) NOT NULL DEFAULT '',
  message mediumtext NOT NULL,
  postip varchar(255) NOT NULL DEFAULT '',
  related text NOT NULL,
  relatedtime int(11) unsigned NOT NULL DEFAULT '0',
  target_ids text NOT NULL,
  hotuser text NOT NULL,
  magiccolor int(11) NOT NULL DEFAULT '0',
  magicpaper int(11) NOT NULL DEFAULT '0',
  pushedaid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (blogid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_class;
CREATE TABLE pre_home_class (
  classid int(11) unsigned NOT NULL AUTO_INCREMENT,
  classname varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (classid),
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_click;
CREATE TABLE pre_home_click (
  clickid int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  icon varchar(255) NOT NULL DEFAULT '',
  idtype varchar(255) NOT NULL DEFAULT '',
  available tinyint(1) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (clickid),
  KEY idtype (idtype,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_clickuser;
CREATE TABLE pre_home_clickuser (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  clickid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  KEY id (id,idtype,dateline),
  KEY uid (uid,idtype,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_comment;
CREATE TABLE pre_home_comment (
  cid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  authorid int(11) unsigned NOT NULL DEFAULT '0',
  author varchar(255) NOT NULL DEFAULT '',
  ip varchar(15) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  magicflicker tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  KEY authorid (authorid,idtype),
  KEY id (id,idtype,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_docomment;
CREATE TABLE pre_home_docomment (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  upid int(11) unsigned NOT NULL DEFAULT '0',
  doid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  ip varchar(15) NOT NULL DEFAULT '',
  grade int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY doid (doid,dateline),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_doing;
CREATE TABLE pre_home_doing (
  doid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  `from` varchar(20) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  ip varchar(15) NOT NULL DEFAULT '',
  replynum int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (doid),
  KEY uid (uid,dateline),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_favorite;
CREATE TABLE pre_home_favorite (
  favid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  spaceuid int(11) unsigned NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  description text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (favid),
  KEY uid (uid,idtype,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_feed;
CREATE TABLE pre_home_feed (
  feedid int(11) unsigned NOT NULL AUTO_INCREMENT,
  appid int(11) unsigned NOT NULL DEFAULT '0',
  icon varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  hash_template varchar(255) NOT NULL DEFAULT '',
  hash_data varchar(255) NOT NULL DEFAULT '',
  title_template text NOT NULL,
  title_data text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image_1 varchar(255) NOT NULL DEFAULT '',
  image_1_link varchar(255) NOT NULL DEFAULT '',
  image_2 varchar(255) NOT NULL DEFAULT '',
  image_2_link varchar(255) NOT NULL DEFAULT '',
  image_3 varchar(255) NOT NULL DEFAULT '',
  image_3_link varchar(255) NOT NULL DEFAULT '',
  image_4 varchar(255) NOT NULL DEFAULT '',
  image_4_link varchar(255) NOT NULL DEFAULT '',
  target_ids text NOT NULL,
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  hot int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (feedid),
  KEY uid (uid,dateline),
  KEY dateline (dateline),
  KEY hot (hot),
  KEY id (id,idtype)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_feed_app;
CREATE TABLE pre_home_feed_app (
  feedid int(11) unsigned NOT NULL AUTO_INCREMENT,
  appid int(11) unsigned NOT NULL DEFAULT '0',
  icon varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  hash_template varchar(255) NOT NULL DEFAULT '',
  hash_data varchar(255) NOT NULL DEFAULT '',
  title_template text NOT NULL,
  title_data text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image_1 varchar(255) NOT NULL DEFAULT '',
  image_1_link varchar(255) NOT NULL DEFAULT '',
  image_2 varchar(255) NOT NULL DEFAULT '',
  image_2_link varchar(255) NOT NULL DEFAULT '',
  image_3 varchar(255) NOT NULL DEFAULT '',
  image_3_link varchar(255) NOT NULL DEFAULT '',
  image_4 varchar(255) NOT NULL DEFAULT '',
  image_4_link varchar(255) NOT NULL DEFAULT '',
  target_ids text NOT NULL,
  PRIMARY KEY (feedid),
  KEY uid (uid,dateline),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_friend;
CREATE TABLE pre_home_friend (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fuid int(11) unsigned NOT NULL DEFAULT '0',
  fusername varchar(255) NOT NULL DEFAULT '',
  gid int(11) unsigned NOT NULL DEFAULT '0',
  num int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  note varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (uid,fuid),
  KEY fuid (fuid),
  KEY uid (uid,num,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_friend_request;
CREATE TABLE pre_home_friend_request (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fuid int(11) unsigned NOT NULL DEFAULT '0',
  fusername varchar(255) NOT NULL DEFAULT '',
  gid int(11) unsigned NOT NULL DEFAULT '0',
  note varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fuid),
  KEY fuid (fuid),
  KEY dateline (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_friendlog;
CREATE TABLE pre_home_friendlog (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fuid int(11) unsigned NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fuid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_notification;
CREATE TABLE pre_home_notification (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  authorid int(11) unsigned NOT NULL DEFAULT '0',
  author varchar(255) NOT NULL DEFAULT '',
  note text NOT NULL,
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  from_id int(11) unsigned NOT NULL DEFAULT '0',
  from_idtype varchar(255) NOT NULL DEFAULT '',
  from_num int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY uid (uid,`new`,dateline),
  KEY from_id (from_id,from_idtype)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_pic;
CREATE TABLE pre_home_pic (
  picid int(11) NOT NULL AUTO_INCREMENT,
  albumid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  postip varchar(255) NOT NULL DEFAULT '',
  filename varchar(255) NOT NULL DEFAULT '',
  title varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  size int(11) unsigned NOT NULL DEFAULT '0',
  filepath varchar(255) NOT NULL DEFAULT '',
  thumb tinyint(1) NOT NULL DEFAULT '0',
  remote tinyint(1) NOT NULL DEFAULT '0',
  hot int(11) unsigned NOT NULL DEFAULT '0',
  sharetimes int(11) unsigned NOT NULL DEFAULT '0',
  click1 int(11) unsigned NOT NULL DEFAULT '0',
  click2 int(11) unsigned NOT NULL DEFAULT '0',
  click3 int(11) unsigned NOT NULL DEFAULT '0',
  click4 int(11) unsigned NOT NULL DEFAULT '0',
  click5 int(11) unsigned NOT NULL DEFAULT '0',
  click6 int(11) unsigned NOT NULL DEFAULT '0',
  click7 int(11) unsigned NOT NULL DEFAULT '0',
  click8 int(11) unsigned NOT NULL DEFAULT '0',
  magicframe int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (picid),
  KEY uid (uid),
  KEY albumid (albumid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_picfield;
CREATE TABLE pre_home_picfield (
  picid int(11) unsigned NOT NULL DEFAULT '0',
  hotuser text NOT NULL,
  PRIMARY KEY (picid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_poke;
CREATE TABLE pre_home_poke (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fromuid int(11) unsigned NOT NULL DEFAULT '0',
  fromusername varchar(255) NOT NULL DEFAULT '',
  note varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  iconid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fromuid),
  KEY uid (uid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_pokearchive;
CREATE TABLE pre_home_pokearchive (
  pid int(11) NOT NULL AUTO_INCREMENT,
  pokeuid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  fromuid int(11) unsigned NOT NULL DEFAULT '0',
  note varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  iconid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pid),
  KEY pokeuid (pokeuid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_share;
CREATE TABLE pre_home_share (
  sid int(11) unsigned NOT NULL AUTO_INCREMENT,
  itemid int(11) unsigned NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  fromuid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  title_template text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image varchar(255) NOT NULL DEFAULT '',
  image_link varchar(255) NOT NULL DEFAULT '',
  hot int(11) unsigned NOT NULL DEFAULT '0',
  hotuser text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (sid),
  KEY uid (uid,dateline),
  KEY hot (hot),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_show;
CREATE TABLE pre_home_show (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  unitprice int(11) unsigned NOT NULL DEFAULT '1',
  credit int(11) unsigned NOT NULL DEFAULT '0',
  note varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (uid),
  KEY unitprice (unitprice),
  KEY credit (credit)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_specialuser;
CREATE TABLE pre_home_specialuser (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  defaultpoke text,
  dateline int(11) NOT NULL DEFAULT '0',
  reason text NOT NULL,
  opuid int(11) unsigned NOT NULL DEFAULT '0',
  opusername varchar(255) NOT NULL DEFAULT '',
  displayorder int(11) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid,`status`),
  KEY displayorder (`status`,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_userapp;
CREATE TABLE pre_home_userapp (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  appid int(11) unsigned NOT NULL DEFAULT '0',
  appname varchar(255) NOT NULL DEFAULT '',
  privacy tinyint(1) NOT NULL DEFAULT '0',
  allowsidenav tinyint(1) NOT NULL DEFAULT '0',
  allowfeed tinyint(1) NOT NULL DEFAULT '0',
  allowprofilelink tinyint(1) NOT NULL DEFAULT '0',
  narrow tinyint(1) NOT NULL DEFAULT '0',
  menuorder int(11) NOT NULL DEFAULT '0',
  displayorder int(11) NOT NULL DEFAULT '0',
  KEY uid (uid,appid),
  KEY menuorder (uid,menuorder),
  KEY displayorder (uid,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_userapp_stat;
CREATE TABLE pre_home_userapp_stat (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  appid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  KEY uid (uid,appid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_userappfield;
CREATE TABLE pre_home_userappfield (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  appid int(11) unsigned NOT NULL DEFAULT '0',
  profilelink text NOT NULL,
  myml text NOT NULL,
  KEY uid (uid,appid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_viewlog;
CREATE TABLE pre_home_viewlog (
  logid int(11) unsigned NOT NULL AUTO_INCREMENT,
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (logid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_home_visitor;
CREATE TABLE pre_home_visitor (
  uid int(11) unsigned NOT NULL DEFAULT '0',
  vuid int(11) unsigned NOT NULL DEFAULT '0',
  vusername varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,vuid),
  KEY vuid (vuid),
  KEY dateline (dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_article_content;
CREATE TABLE pre_portal_article_content (
  cid int(11) unsigned NOT NULL AUTO_INCREMENT,
  aid int(11) unsigned NOT NULL DEFAULT '0',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  content text NOT NULL,
  pageorder int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  KEY aid (aid,pageorder),
  KEY pageorder (pageorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_article_count;
CREATE TABLE pre_portal_article_count (
  aid int(11) unsigned NOT NULL DEFAULT '0',
  catid int(11) unsigned NOT NULL DEFAULT '0',
  viewnum int(11) unsigned NOT NULL DEFAULT '0',
  commentnum int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  favtimes int(11) unsigned NOT NULL DEFAULT '0',
  sharetimes int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (aid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_article_related;
CREATE TABLE pre_portal_article_related (
  aid int(11) unsigned NOT NULL AUTO_INCREMENT,
  raid int(11) unsigned NOT NULL DEFAULT '0',
  displayorder int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (aid,raid),
  KEY aid (aid,displayorder)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_article_title;
CREATE TABLE pre_portal_article_title (
  aid int(11) unsigned NOT NULL AUTO_INCREMENT,
  catid int(11) unsigned NOT NULL DEFAULT '0',
  bid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  title varchar(255) NOT NULL DEFAULT '',
  shorttitle varchar(255) NOT NULL DEFAULT '',
  author varchar(255) NOT NULL DEFAULT '',
  `from` varchar(255) NOT NULL DEFAULT '',
  fromurl varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  summary varchar(255) NOT NULL DEFAULT '',
  pic varchar(255) NOT NULL DEFAULT '',
  thumb tinyint(1) NOT NULL DEFAULT '0',
  remote tinyint(1) NOT NULL DEFAULT '0',
  prename varchar(255) NOT NULL DEFAULT '',
  preurl varchar(255) NOT NULL DEFAULT '',
  id int(11) unsigned NOT NULL DEFAULT '0',
  idtype varchar(255) NOT NULL DEFAULT '',
  contents int(11) NOT NULL DEFAULT '0',
  allowcomment tinyint(1) NOT NULL DEFAULT '0',
  owncomment tinyint(1) NOT NULL DEFAULT '0',
  click1 int(11) unsigned NOT NULL DEFAULT '0',
  click2 int(11) unsigned NOT NULL DEFAULT '0',
  click3 int(11) unsigned NOT NULL DEFAULT '0',
  click4 int(11) unsigned NOT NULL DEFAULT '0',
  click5 int(11) unsigned NOT NULL DEFAULT '0',
  click6 int(11) unsigned NOT NULL DEFAULT '0',
  click7 int(11) unsigned NOT NULL DEFAULT '0',
  click8 int(11) unsigned NOT NULL DEFAULT '0',
  tag int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (aid),
  KEY catid (catid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_article_trash;
CREATE TABLE pre_portal_article_trash (
  aid int(11) unsigned NOT NULL DEFAULT '0',
  content text NOT NULL,
  PRIMARY KEY (aid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_attachment;
CREATE TABLE pre_portal_attachment (
  attachid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  filetype varchar(255) NOT NULL DEFAULT '',
  filesize int(11) unsigned NOT NULL DEFAULT '0',
  attachment varchar(255) NOT NULL DEFAULT '',
  isimage tinyint(1) NOT NULL DEFAULT '0',
  thumb tinyint(1) unsigned NOT NULL DEFAULT '0',
  remote tinyint(1) unsigned NOT NULL DEFAULT '0',
  aid int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (attachid),
  KEY aid (aid,attachid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_category;
CREATE TABLE pre_portal_category (
  catid int(11) unsigned NOT NULL AUTO_INCREMENT,
  upid int(11) unsigned NOT NULL DEFAULT '0',
  catname varchar(255) NOT NULL DEFAULT '',
  articles int(11) unsigned NOT NULL DEFAULT '0',
  allowcomment tinyint(1) NOT NULL DEFAULT '1',
  displayorder int(11) NOT NULL DEFAULT '0',
  notinheritedarticle tinyint(1) NOT NULL DEFAULT '0',
  notinheritedblock tinyint(1) NOT NULL DEFAULT '0',
  domain varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  closed tinyint(1) NOT NULL DEFAULT '0',
  shownav tinyint(1) NOT NULL DEFAULT '0',
  description text NOT NULL,
  keyword text NOT NULL,
  primaltplname varchar(255) NOT NULL DEFAULT '0',
  disallowpublish tinyint(1) NOT NULL DEFAULT '0',
  foldername varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (catid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_category_permission;
CREATE TABLE pre_portal_category_permission (
  catid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  allowpublish tinyint(1) NOT NULL DEFAULT '0',
  allowmanage tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (catid,uid),
  KEY uid (uid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_comment;
CREATE TABLE pre_portal_comment (
  cid int(11) unsigned NOT NULL AUTO_INCREMENT,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  aid int(11) unsigned NOT NULL DEFAULT '0',
  postip varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  PRIMARY KEY (cid),
  KEY aid (aid,cid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_topic;
CREATE TABLE pre_portal_topic (
  topicid int(11) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  domain varchar(255) NOT NULL DEFAULT '',
  summary text NOT NULL,
  keyword text NOT NULL,
  cover varchar(255) NOT NULL DEFAULT '',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  primaltplname varchar(255) NOT NULL DEFAULT '0',
  useheader tinyint(1) NOT NULL DEFAULT '0',
  usefooter tinyint(1) NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  viewnum int(11) unsigned NOT NULL DEFAULT '0',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  closed tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (topicid),
  KEY `name` (`name`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS pre_portal_topic_pic;
CREATE TABLE pre_portal_topic_pic (
  picid int(11) NOT NULL AUTO_INCREMENT,
  topicid int(11) unsigned NOT NULL DEFAULT '0',
  uid int(11) unsigned NOT NULL DEFAULT '0',
  username varchar(255) NOT NULL DEFAULT '',
  dateline int(11) unsigned NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  title varchar(255) NOT NULL DEFAULT '',
  size int(11) unsigned NOT NULL DEFAULT '0',
  filepath varchar(255) NOT NULL DEFAULT '',
  thumb tinyint(1) NOT NULL DEFAULT '0',
  remote tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (picid),
  KEY topicid (topicid)
) TYPE=MyISAM;

