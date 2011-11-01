--
-- Ucenter Home Multilanguage Database, SQL
--

--
-- Database: 'uchome'
--

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_ad'
--

CREATE TABLE uchome_ad (
  adid int(11) unsigned NOT NULL auto_increment,
  available tinyint(1) NOT NULL default '1',
  title varchar(255) NOT NULL default '',
  pagetype varchar(255) NOT NULL default '',
  adcode text NOT NULL,
  system tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (adid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_adminsession'
--

CREATE TABLE uchome_adminsession (
  uid int(11) unsigned NOT NULL default '0',
  ip varchar(15) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  errorcount tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (uid)
) ENGINE=MEMORY;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_album'
--

CREATE TABLE uchome_album (
  albumid int(11) unsigned NOT NULL auto_increment,
  albumname varchar(255) NOT NULL default '',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  updatetime int(11) unsigned NOT NULL default '0',
  picnum int(11) unsigned NOT NULL default '0',
  pic varchar(255) NOT NULL default '',
  picflag tinyint(1) NOT NULL default '0',
  friend tinyint(1) NOT NULL default '0',
  `password` varchar(255) NOT NULL default '',
  target_ids text NOT NULL,
  PRIMARY KEY  (albumid),
  KEY uid (uid,updatetime),
  KEY updatetime (updatetime)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_appcreditlog'
--

CREATE TABLE uchome_appcreditlog (
  logid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  appid int(11) unsigned NOT NULL default '0',
  appname varchar(255) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  credit int(11) unsigned NOT NULL default '0',
  note text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (logid),
  KEY uid (uid,dateline),
  KEY appid (appid)
) ENGINE=MyISAM;
-- --------------------------------------------------------

--
-- Structure of the table 'uchome_blacklist'
--

CREATE TABLE uchome_blacklist (
  uid int(11) unsigned NOT NULL default '0',
  buid int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,buid),
  KEY uid (uid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_block'
--

CREATE TABLE uchome_block (
  bid int(11) unsigned NOT NULL auto_increment,
  blockname varchar(255) NOT NULL default '',
  blocksql text NOT NULL,
  cachename varchar(255) NOT NULL default '',
  cachetime int(11) unsigned NOT NULL default '0',
  startnum tinyint(11) unsigned NOT NULL default '0',
  num int(11) unsigned NOT NULL default '0',
  perpage int(11) unsigned NOT NULL default '0',
  htmlcode text NOT NULL,
  PRIMARY KEY  (bid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_blog'
--

CREATE TABLE uchome_blog (
  blogid int(11) unsigned NOT NULL auto_increment,
  topicid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  classid int(11) unsigned NOT NULL default '0',
  viewnum int(11) unsigned NOT NULL default '0',
  replynum int(11) unsigned NOT NULL default '0',
  hot int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  pic varchar(255) NOT NULL default '',
  picflag tinyint(1) NOT NULL default '0',
  noreply tinyint(1) NOT NULL default '0',
  friend tinyint(1) NOT NULL default '0',
  `password` varchar(255) NOT NULL default '',
  click_1 int(11) unsigned NOT NULL default '0',
  click_2 int(11) unsigned NOT NULL default '0',
  click_3 int(11) unsigned NOT NULL default '0',
  click_4 int(11) unsigned NOT NULL default '0',
  click_5 int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (blogid),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline),
  KEY dateline (dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_blogfield'
--

CREATE TABLE uchome_blogfield (
  blogid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  tag varchar(255) NOT NULL default '',
  message mediumtext NOT NULL,
  postip varchar(15) NOT NULL default '',
  related text NOT NULL,
  relatedtime int(11) unsigned NOT NULL default '0',
  target_ids text NOT NULL,
  hotuser text NOT NULL,
  magiccolor int(11) NOT NULL default '0',
  magicpaper int(11) NOT NULL default '0',
  magiccall tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (blogid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_cache'
--

CREATE TABLE uchome_cache (
  cachekey varchar(255) NOT NULL default '',
  `value` mediumtext NOT NULL,
  mtime int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (cachekey)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_class'
--

CREATE TABLE uchome_class (
  classid int(11) unsigned NOT NULL auto_increment,
  classname varchar(255) NOT NULL default '',
  uid int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (classid),
  KEY uid (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_click'
--

CREATE TABLE uchome_click (
  clickid int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  icon varchar(255) NOT NULL default '',
  idtype varchar(255) NOT NULL default '',
  displayorder int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (clickid),
  KEY idtype (idtype,displayorder)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_clickuser'
--

CREATE TABLE uchome_clickuser (
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  id int(11) unsigned NOT NULL default '0',
  idtype varchar(255) NOT NULL default '',
  clickid int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  KEY id (id,idtype,dateline),
  KEY uid (uid,idtype,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_comment'
--

CREATE TABLE uchome_comment (
  cid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  id int(11) unsigned NOT NULL default '0',
  idtype varchar(255) NOT NULL default '',
  authorid int(11) unsigned NOT NULL default '0',
  author varchar(255) NOT NULL default '',
  ip varchar(15) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  message text NOT NULL,
  magicflicker tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (cid),
  KEY authorid (authorid, idtype),
  KEY id (id, idtype, dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_config'
--

CREATE TABLE uchome_config (
  var varchar(255) NOT NULL default '',
  datavalue text NOT NULL,
  PRIMARY KEY  (var)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_cron'
--

CREATE TABLE uchome_cron (
  cronid int(11) unsigned NOT NULL auto_increment,
  available tinyint(1) NOT NULL default '0',
  `type` enum('user','system') NOT NULL default 'user',
  `name` varchar(255) NOT NULL default '',
  filename varchar(255) NOT NULL default '',
  lastrun int(11) unsigned NOT NULL default '0',
  nextrun int(11) unsigned NOT NULL default '0',
  weekday tinyint(1) NOT NULL default '0',
  `day` tinyint(2) NOT NULL default '0',
  `hour` tinyint(2) NOT NULL default '0',
  `minute` varchar(255) NOT NULL default '',
  PRIMARY KEY  (cronid),
  KEY nextrun (available,nextrun)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_creditrule'
--

CREATE TABLE uchome_creditrule (
  rid int(11) unsigned NOT NULL auto_increment,
  rulename varchar(255) NOT NULL default '',
  `action` varchar(255) NOT NULL default '',
  cycletype tinyint(1) NOT NULL default '0',
  cycletime int(11) NOT NULL default '0',
  rewardnum int(11) NOT NULL default '1',
  rewardtype tinyint(1) NOT NULL default '1',
  norepeat tinyint(1) NOT NULL default '0',
  credit int(11) unsigned NOT NULL default '0',
  experience int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (rid),
  KEY `action` (`action`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_creditlog'
--

CREATE TABLE uchome_creditlog (
  clid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  rid int(11) unsigned NOT NULL default '0',
  total int(11) unsigned NOT NULL default '0',
  cyclenum int(11) unsigned NOT NULL default '0',
  credit int(11) unsigned NOT NULL default '0',
  experience int(11) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  info text NOT NULL,
  `user` text NOT NULL,
  app text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (clid),
  KEY uid (uid, rid),
  KEY dateline (dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_data'
--

CREATE TABLE uchome_data (
  var varchar(255) NOT NULL default '',
  datavalue text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (var)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_docomment'
--

CREATE TABLE uchome_docomment (
  id int(11) unsigned NOT NULL auto_increment,
  upid int(11) unsigned NOT NULL default '0',
  doid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  message text NOT NULL,
  ip varchar(15) NOT NULL default '',
  grade int(11) unsigned NOT NULL default '0',
  PRIMARY KEY (id),
  KEY doid (doid,dateline),
  KEY dateline (dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_doing'
--

CREATE TABLE uchome_doing (
  doid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  `from` varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  message text NOT NULL,
  ip varchar(15) NOT NULL default '',
  replynum int(11) unsigned NOT NULL default '0',
  mood int(11) NOT NULL default '0',
  PRIMARY KEY  (doid),
  KEY uid (uid,dateline),
  KEY dateline (dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_event'
--

CREATE TABLE uchome_event (
  eventid int(11) unsigned NOT NULL auto_increment,
  topicid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  classid int(11) unsigned NOT NULL default '0',
country varchar(255) NOT NULL default '',
  province varchar(255) NOT NULL default '',
  city varchar(255) NOT NULL default '',
  location varchar(255) NOT NULL default '',
  poster varchar(255) NOT NULL default '',
  thumb tinyint(1) NOT NULL default '0',
  remote tinyint(1) NOT NULL default '0',
  deadline int(11) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  public int(11) NOT NULL default '0',
  membernum int(11) unsigned NOT NULL default '0',
  follownum int(11) unsigned NOT NULL default '0',
  viewnum int(11) unsigned NOT NULL default '0',
  grade int(11) NOT NULL default '0',
  recommendtime int(11) unsigned NOT NULL default '0',
  tagid int(11) unsigned NOT NULL default '0',
  picnum int(11) unsigned NOT NULL default '0',
  threadnum int(11) unsigned NOT NULL default '0',
  updatetime int(11) unsigned NOT NULL default '0',
  hot int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (eventid),
  KEY grade (grade,recommendtime),
  KEY membernum (membernum),
  KEY uid (uid,eventid),
  KEY tagid (tagid,eventid),
  KEY topicid (topicid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_eventclass'
--

CREATE TABLE uchome_eventclass (
  classid int(11) unsigned NOT NULL auto_increment,
  classname varchar(255) NOT NULL default '',
  poster tinyint(1) NOT NULL default '0',
  template text NOT NULL,
  displayorder int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (classid),
  UNIQUE KEY classname (classname)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_eventfield'
--

CREATE TABLE uchome_eventfield (
  eventid int(11) unsigned NOT NULL auto_increment,
  detail text NOT NULL,
  template varchar(255) NOT NULL default '',
  limitnum int(11) unsigned NOT NULL default '0',
  verify tinyint(1) NOT NULL default '0',
  allowpic tinyint(1) NOT NULL default '0',
  allowpost tinyint(1) NOT NULL default '0',
  allowinvite tinyint(1) NOT NULL default '0',
  allowfellow tinyint(1) NOT NULL default '0',
  hotuser text NOT NULL,
  PRIMARY KEY  (eventid)
) ENGINE=MyISAM;


-- --------------------------------------------------------

--
-- Structure of the table 'uchome_eventinvite'
--

CREATE TABLE uchome_eventinvite (
  eventid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  touid int(11) unsigned NOT NULL default '0',
  tousername varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (eventid,touid)
) ENGINE=MyISAM;


-- --------------------------------------------------------

--
-- Structure of the table 'uchome_eventpic'
--

CREATE TABLE uchome_eventpic (
  picid int(11) unsigned NOT NULL default '0',
  eventid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (picid),
  KEY eventid (eventid,picid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_feed'
--

CREATE TABLE uchome_feed (
  feedid int(11) unsigned NOT NULL auto_increment,
  appid int(11) unsigned NOT NULL default '0',
  icon varchar(255) NOT NULL default '',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  friend tinyint(1) NOT NULL default '0',
  hash_template varchar(255) NOT NULL default '',
  hash_data varchar(255) NOT NULL default '',
  title_template text NOT NULL,
  title_data text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image_1 varchar(255) NOT NULL default '',
  image_1_link varchar(255) NOT NULL default '',
  image_2 varchar(255) NOT NULL default '',
  image_2_link varchar(255) NOT NULL default '',
  image_3 varchar(255) NOT NULL default '',
  image_3_link varchar(255) NOT NULL default '',
  image_4 varchar(255) NOT NULL default '',
  image_4_link varchar(255) NOT NULL default '',
  target_ids text NOT NULL,
  id int(11) unsigned NOT NULL default '0',
  idtype varchar(255) NOT NULL default '',
  hot int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (feedid),
  KEY uid (uid,dateline),
  KEY dateline (dateline),
  KEY hot (hot),
  KEY id (id,idtype)
) ENGINE=MyISAM;

-- --------------------------------------------------------
--
-- Structure of the table 'uchome_friend'
--

CREATE TABLE uchome_friend (
  uid int(11) unsigned NOT NULL default '0',
  fuid int(11) unsigned NOT NULL default '0',
  fusername varchar(255) NOT NULL default '',
  status tinyint(1) NOT NULL default '0',
  gid int(11) unsigned NOT NULL default '0',
  note varchar(255) NOT NULL default '',
  num int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,fuid),
  KEY fuid (fuid),
  KEY status (uid, status, num, dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_friendguide'
--

CREATE TABLE uchome_friendguide (
  uid int(11) unsigned NOT NULL default '0',
  fuid int(11) unsigned NOT NULL default '0',
  fusername varchar(255) NOT NULL default '',
  num int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,fuid),
  KEY uid (uid,num)
) ENGINE=MyISAM;

-- --------------------------------------------------------
--
-- Structure of the table 'uchome_friendlog'
--

CREATE TABLE uchome_friendlog (
  uid int(11) unsigned NOT NULL default '0',
  fuid int(11) unsigned NOT NULL default '0',
  action varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,fuid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_invite'
--

CREATE TABLE uchome_invite (
  id int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  code varchar(255) NOT NULL default '',
  fuid int(11) unsigned NOT NULL default '0',
  fusername varchar(255) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  email varchar(255) NOT NULL default '',
  appid int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY uid (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_log'
--

CREATE TABLE uchome_log (
  logid int(11) unsigned NOT NULL auto_increment,
  id int(11) unsigned NOT NULL default '0',
  idtype varchar(255) NOT NULL default '',
  PRIMARY KEY  (logid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_magic'
--

CREATE TABLE uchome_magic (
  mid varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  description text NOT NULL default '',
  forbiddengid text NOT NULL default '',
  charge int(11) unsigned NOT NULL default '0',
  experience int(11) unsigned NOT NULL default '0',
  provideperoid int(11) unsigned NOT NULL default '0',
  providecount int(11) unsigned NOT NULL default '0',
  useperoid int(11) unsigned NOT NULL default '0',
  usecount int(11) unsigned NOT NULL default '0',
  displayorder int(11) unsigned NOT NULL default '0',
  custom text NOT NULL default '',
  `close` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (mid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_magicinlog'
--

CREATE TABLE uchome_magicinlog (
  logid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  mid varchar(255) NOT NULL default '',
  count int(11) unsigned NOT NULL default '0',
  `type` int(11) unsigned NOT NULL default '0',
  fromid int(11) unsigned NOT NULL default '0',
  credit int(11) unsigned NOT NULL default '0',
  dateline int(11) NOT NULL default '0',
  PRIMARY KEY  (logid),
  KEY uid (uid,dateline),
  KEY `type` (`type`,fromid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uch_magicstore'
--

CREATE TABLE uchome_magicstore (
  mid varchar(255) NOT NULL default '',
  `storage` int(11) unsigned NOT NULL default '0',
  lastprovide int(11) unsigned NOT NULL default '0',
  sellcount int(11) unsigned NOT NULL default '0',
  sellcredit int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (mid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_magicuselog'
--

CREATE TABLE uchome_magicuselog (
  logid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  mid varchar(255) NOT NULL default '',
  id int(11) unsigned NOT NULL default '0',
  idtype varchar(255) NOT NULL default '',
  count int(11) unsigned NOT NULL default '0',
  `data` text NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  expire int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (logid),
  KEY uid (uid,mid),
  KEY id (id,idtype)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_mailqueue'
--

CREATE TABLE uchome_mailqueue (
  qid int(11) unsigned NOT NULL auto_increment,
  cid int(11) unsigned NOT NULL default '0',
  subject text NOT NULL,
  message text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (qid),
  KEY mcid (cid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_mailcron'
--

CREATE TABLE uchome_mailcron (
  cid int(11) unsigned NOT NULL auto_increment,
  touid int(11) unsigned NOT NULL default '0',
  email varchar(255) NOT NULL default '',
  sendtime int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (cid),
  KEY sendtime (sendtime)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_member'
--

CREATE TABLE uchome_member (
  uid int(11) unsigned NOT NULL auto_increment,
  username varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  PRIMARY KEY  (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_mtag'
--

CREATE TABLE uchome_mtag (
  tagid int(11) unsigned NOT NULL auto_increment,
  tagname varchar(255) NOT NULL default '',
  fieldid int(11) NOT NULL default '0',
  membernum int(11) unsigned NOT NULL default '0',
  threadnum int(11) unsigned NOT NULL default '0',
  postnum int(11) unsigned NOT NULL default '0',
  `close` tinyint(1) NOT NULL default '0',
  announcement text NOT NULL,
  pic varchar(255) NOT NULL default '',
  closeapply tinyint(1) NOT NULL default '0',
  joinperm tinyint(1) NOT NULL default '0',
  viewperm tinyint(1) NOT NULL default '0',
  threadperm tinyint(1) NOT NULL default '0',
  postperm tinyint(1) NOT NULL default '0',
  recommend tinyint(1) NOT NULL default '0',
  moderator varchar(255) NOT NULL default '',
  PRIMARY KEY  (tagid),
  KEY tagname (tagname),
  KEY threadnum (threadnum)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_mtaginvite'
--

CREATE TABLE uchome_mtaginvite (
  uid int(11) unsigned NOT NULL default '0',
  tagid int(11) unsigned NOT NULL default '0',
  fromuid int(11) unsigned NOT NULL default '0',
  fromusername varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,tagid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_myapp'
--

CREATE TABLE uchome_myapp (
  appid int(11) unsigned NOT NULL default '0',
  appname varchar(255) NOT NULL default '',
  narrow tinyint(1) NOT NULL default '0',
  flag tinyint(1) NOT NULL default '0',
  version int(11) unsigned NOT NULL default '0',
  displaymethod tinyint(1) NOT NULL default '0',
  displayorder int(11) unsigned NOT NULL default '0',
  PRIMARY KEY (appid),
  KEY flag (flag, displayorder)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_myinvite'
--

CREATE TABLE uchome_myinvite (
  id int(11) unsigned NOT NULL auto_increment,
  typename varchar(255) NOT NULL default '',
  appid int(11) NOT NULL default '0',
  type tinyint(1) NOT NULL default '0',
  fromuid int(11) unsigned NOT NULL default '0',
  touid int(11) unsigned NOT NULL default '0',
  myml text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  hash int(11) unsigned NOT NULL default '0',
  PRIMARY KEY (id),
  KEY hash (hash),
  KEY uid (touid, dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_notification'
--

CREATE TABLE uchome_notification (
  id int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  `type` varchar(255) NOT NULL default '',
  `new` tinyint(1) NOT NULL default '0',
  authorid int(11) unsigned NOT NULL default '0',
  author varchar(255) NOT NULL default '',
  note text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY uid (uid,new,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_pic'
--

CREATE TABLE uchome_pic (
  picid int(11) NOT NULL auto_increment,
  albumid int(11) unsigned NOT NULL default '0',
  topicid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  postip varchar(15) NOT NULL default '',
  filename varchar(255) NOT NULL default '',
  title varchar(255) NOT NULL default '',
  `type` varchar(255) NOT NULL default '',
  size int(11) unsigned NOT NULL default '0',
  filepath varchar(255) NOT NULL default '',
  thumb tinyint(1) NOT NULL default '0',
  remote tinyint(1) NOT NULL default '0',
  hot int(11) unsigned NOT NULL default '0',
  click_6 int(11) unsigned NOT NULL default '0',
  click_7 int(11) unsigned NOT NULL default '0',
  click_8 int(11) unsigned NOT NULL default '0',
  click_9 int(11) unsigned NOT NULL default '0',
  click_10 int(11) unsigned NOT NULL default '0',
  magicframe int(11) NOT NULL default '0',
  PRIMARY KEY  (picid),
  KEY albumid (albumid,dateline),
  KEY topicid (topicid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_picfield'
--

CREATE TABLE uchome_picfield (
  picid int(11) unsigned NOT NULL default '0',
  hotuser text NOT NULL,
  PRIMARY KEY  (picid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_poke'
--

CREATE TABLE uchome_poke (
  uid int(11) unsigned NOT NULL default '0',
  fromuid int(11) unsigned NOT NULL default '0',
  fromusername varchar(255) NOT NULL default '',
  note varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  iconid int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,fromuid),
  KEY uid (uid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_poll'
--

CREATE TABLE uchome_poll (
  pid int(11) unsigned NOT NULL auto_increment,
  topicid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  subject varchar(255) NOT NULL default '',
  voternum int(11) unsigned NOT NULL default '0',
  replynum int(11) unsigned NOT NULL default '0',
  multiple tinyint(1) NOT NULL default '0',
  maxchoice int(11) NOT NULL default '0',
  sex tinyint(1) NOT NULL default '0',
  noreply tinyint(1) NOT NULL default '0',
  credit int(11) unsigned NOT NULL default '0',
  percredit int(11) unsigned NOT NULL default '0',
  expiration int(11) unsigned NOT NULL default '0',
  lastvote int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  hot int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (pid),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline),
  KEY voternum (voternum),
  KEY dateline (dateline),
  KEY lastvote (lastvote),
  KEY hot (hot),
  KEY percredit (percredit)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_pollfield'
--

CREATE TABLE uchome_pollfield (
  pid int(11) unsigned NOT NULL default '0',
  notify tinyint(1) NOT NULL default '0',
  message text NOT NULL,
  summary text NOT NULL,
  `option` text NOT NULL,
  invite text NOT NULL,
  hotuser text NOT NULL,
  PRIMARY KEY  (pid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_polloption'
--

CREATE TABLE uchome_polloption (
  oid int(11) unsigned NOT NULL auto_increment,
  pid int(11) unsigned NOT NULL default '0',
  votenum int(11) unsigned NOT NULL default '0',
  `option` varchar(255) NOT NULL default '',
  PRIMARY KEY (oid),
  KEY pid (pid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_polluser'
--

CREATE TABLE uchome_polluser (
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  pid int(11) unsigned NOT NULL default '0',
  `option` text NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY (uid, pid),
  KEY pid (pid, dateline),
  KEY uid (uid, dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_post'
--

CREATE TABLE uchome_post (
  pid int(11) unsigned NOT NULL auto_increment,
  tagid int(11) unsigned NOT NULL default '0',
  tid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  ip varchar(15) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  message text NOT NULL,
  pic varchar(255) NOT NULL default '',
  isthread tinyint(1) NOT NULL default '0',
  hotuser text NOT NULL,
  PRIMARY KEY  (pid),
  KEY tid (tid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_profield'
--

CREATE TABLE uchome_profield (
  fieldid int(11) unsigned NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  note varchar(255) NOT NULL default '',
  formtype varchar(255) NOT NULL default '0',
  inputnum int(11) unsigned NOT NULL default '0',
  choice text NOT NULL,
  mtagminnum int(11) unsigned NOT NULL default '0',
  manualmoderator tinyint(1) NOT NULL default '0',
  manualmember tinyint(1) NOT NULL default '0',
  displayorder int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (fieldid)
) ENGINE=MyISAM;


-- --------------------------------------------------------

--
-- Structure of the table 'uchome_profilefield'
--

CREATE TABLE uchome_profilefield (
  fieldid int(11) unsigned NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  note varchar(255) NOT NULL default '',
  formtype varchar(255) NOT NULL default '0',
  maxsize int(11) unsigned NOT NULL default '0',
  required tinyint(1) NOT NULL default '0',
  invisible tinyint(1) NOT NULL default '0',
  allowsearch tinyint(1) NOT NULL default '0',
  choice text NOT NULL,
  displayorder int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (fieldid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_report'
--

CREATE TABLE uchome_report (
  rid int(11) unsigned NOT NULL auto_increment,
  id int(11) unsigned NOT NULL default '0',
  idtype varchar(255) NOT NULL default '',
  `new` tinyint(1) NOT NULL default '0',
  num int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  reason text NOT NULL,
  uids text NOT NULL,
  PRIMARY KEY  (rid),
  KEY id (id,idtype,num,dateline),
  KEY `new` (new,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_session'
--

CREATE TABLE uchome_session (
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  lastactivity int(11) unsigned NOT NULL default '0',
  ip int(11) unsigned NOT NULL default '0',
  magichidden tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (uid),
  KEY lastactivity (lastactivity),
  KEY ip (ip)
) ENGINE=MEMORY;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_share'
--

CREATE TABLE uchome_share (
  sid int(11) unsigned NOT NULL auto_increment,
  topicid int(11) unsigned NOT NULL default '0',
  type varchar(255) NOT NULL default '',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  title_template text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image varchar(255) NOT NULL default '',
  image_link varchar(255) NOT NULL default '',
  hot int(11) unsigned NOT NULL default '0',
  hotuser text NOT NULL,
  PRIMARY KEY  (sid),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline),
  KEY hot (hot),
  KEY dateline (dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_show'
--

CREATE TABLE uchome_show (
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  credit int(11) unsigned NOT NULL default '0',
  note varchar(255) NOT NULL default '',
  PRIMARY KEY  (uid),
  KEY credit (credit)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_space'
--

CREATE TABLE uchome_space (
  uid int(11) unsigned NOT NULL default '0',
  groupid int(11) unsigned NOT NULL default '0',
  credit int(11) NOT NULL default '0',
  experience int(11) NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  namestatus tinyint(1) NOT NULL default '0',
  videostatus tinyint(1) NOT NULL default '0',
  domain varchar(255) NOT NULL default '',
  friendnum int(11) unsigned NOT NULL default '0',
  viewnum int(11) unsigned NOT NULL default '0',
  notenum int(11) unsigned NOT NULL default '0',
  addfriendnum int(11) unsigned NOT NULL default '0',
  mtaginvitenum int(11) unsigned NOT NULL default '0',
  eventinvitenum int(11) unsigned NOT NULL default '0',
  myinvitenum int(11) unsigned NOT NULL default '0',
  pokenum int(11) unsigned NOT NULL default '0',
  doingnum int(11) unsigned NOT NULL default '0',
  blognum int(11) unsigned NOT NULL default '0',
  albumnum int(11) unsigned NOT NULL default '0',
  threadnum int(11) unsigned NOT NULL default '0',
  pollnum int(11) unsigned NOT NULL default '0',
  eventnum int(11) unsigned NOT NULL default '0',
  sharenum int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  updatetime int(11) unsigned NOT NULL default '0',
  lastsearch int(11) unsigned NOT NULL default '0',
  lastpost int(11) unsigned NOT NULL default '0',
  lastlogin int(11) unsigned NOT NULL default '0',
  lastsend int(11) unsigned NOT NULL default '0',
  attachsize int(11) unsigned NOT NULL default '0',
  addsize int(11) unsigned NOT NULL default '0',
  addfriend int(11) unsigned NOT NULL default '0',
  flag tinyint(1) NOT NULL default '0',
  newpm int(11) unsigned NOT NULL default '0',
  avatar tinyint(1) NOT NULL default '0',
  regip varchar(15) NOT NULL default '',
  ip int(11) unsigned NOT NULL default '0',
  mood int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid),
  KEY username (username),
  KEY domain (domain),
  KEY ip (ip),
  KEY updatetime (updatetime),
  KEY mood (mood)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_spacefield'
--

CREATE TABLE uchome_spacefield (
  uid int(11) unsigned NOT NULL default '0',
  sex tinyint(1) NOT NULL default '0',
  email varchar(255) NOT NULL default '',
  newemail varchar(255) NOT NULL default '',
  emailcheck tinyint(1) NOT NULL default '0',
  mobile varchar(255) NOT NULL default '',
  qq varchar(255) NOT NULL default '',
  msn varchar(255) NOT NULL default '',
  msnrobot varchar(255) NOT NULL default '',
  msncstatus tinyint(1) NOT NULL default '0',
  videopic varchar(255) NOT NULL default '',
  birthyear int(11) unsigned NOT NULL default '0',
  birthmonth int(11) unsigned NOT NULL default '0',
  birthday int(11) unsigned NOT NULL default '0',
  blood varchar(255) NOT NULL default '',
  marry tinyint(1) NOT NULL default '0',
birthcountry varchar(255) NOT NULL default '',
  birthprovince varchar(255) NOT NULL default '',
  birthcity varchar(255) NOT NULL default '',
residecountry varchar(255) NOT NULL default '',
  resideprovince varchar(255) NOT NULL default '',
  residecity varchar(255) NOT NULL default '',
  note text NOT NULL,
  spacenote text NOT NULL,
  authstr varchar(255) NOT NULL default '',
  theme varchar(255) NOT NULL default '',
  nocss tinyint(1) NOT NULL default '0',
  menunum int(11) unsigned NOT NULL default '0',
  css text NOT NULL,
  privacy text NOT NULL,
  friend mediumtext NOT NULL,
  feedfriend mediumtext NOT NULL,
  sendmail text NOT NULL,
  magicstar tinyint(1) NOT NULL default '0',
  magicexpire int(11) unsigned NOT NULL default '0',
  timeoffset varchar(255) NOT NULL default '',
  PRIMARY KEY  (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_spaceinfo'
--

CREATE TABLE uchome_spaceinfo (
  infoid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  type varchar(255) NOT NULL default '',
  subtype varchar(255) NOT NULL default '',
  title text NOT NULL,
  subtitle varchar(255) NOT NULL default '',
  friend tinyint(1) NOT NULL default '0',
  startyear int(11) unsigned NOT NULL default '0',
  endyear int(11) unsigned NOT NULL default '0',
  startmonth int(11) unsigned NOT NULL default '0',
  endmonth int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (infoid),
  KEY uid (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_spacelog'
--

CREATE TABLE uchome_spacelog (
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  opuid int(11) unsigned NOT NULL default '0',
  opusername varchar(255) NOT NULL default '',
  flag tinyint(1) NOT NULL default '0',
  expiration int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid),
  KEY flag (flag)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_stat'
--

CREATE TABLE uchome_stat (
  daytime int(11) unsigned NOT NULL default '0',
  login int(11) unsigned NOT NULL default '0',
  register int(11) unsigned NOT NULL default '0',
  invite int(11) unsigned NOT NULL default '0',
  appinvite int(11) unsigned NOT NULL default '0',
  doing int(11) unsigned NOT NULL default '0',
  blog int(11) unsigned NOT NULL default '0',
  pic int(11) unsigned NOT NULL default '0',
  poll int(11) unsigned NOT NULL default '0',
  event int(11) unsigned NOT NULL default '0',
  `share` int(11) unsigned NOT NULL default '0',
  thread int(11) unsigned NOT NULL default '0',
  docomment int(11) unsigned NOT NULL default '0',
  blogcomment int(11) unsigned NOT NULL default '0',
  piccomment int(11) unsigned NOT NULL default '0',
  pollcomment int(11) unsigned NOT NULL default '0',
  pollvote int(11) unsigned NOT NULL default '0',
  eventcomment int(11) unsigned NOT NULL default '0',
  eventjoin int(11) unsigned NOT NULL default '0',
  sharecomment int(11) unsigned NOT NULL default '0',
  post int(11) unsigned NOT NULL default '0',
  wall int(11) unsigned NOT NULL default '0',
  poke int(11) unsigned NOT NULL default '0',
  click int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (daytime)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_statuser'
--

CREATE TABLE uchome_statuser (
  uid int(11) unsigned NOT NULL default '0',
  daytime int(11) unsigned NOT NULL default '0',
  `type` varchar(255) NOT NULL default '',
  KEY uid (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_tag'
--

CREATE TABLE uchome_tag (
  tagid int(11) unsigned NOT NULL auto_increment,
  tagname varchar(255) NOT NULL default '',
  uid int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  blognum int(11) unsigned NOT NULL default '0',
  `close` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (tagid),
  KEY tagname (tagname)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_tagblog'
--

CREATE TABLE uchome_tagblog (
  tagid int(11) unsigned NOT NULL default '0',
  blogid int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (tagid,blogid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_tagspace'
--

CREATE TABLE uchome_tagspace (
  tagid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  grade int(11) NOT NULL default '0',
  PRIMARY KEY  (tagid,uid),
  KEY grade (tagid,grade),
  KEY uid (uid,grade)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_task'
--

CREATE TABLE uchome_task (
  taskid int(11) unsigned NOT NULL auto_increment,
  available tinyint(1) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  note text NOT NULL,
  num int(11) unsigned NOT NULL default '0',
  maxnum int(11) unsigned NOT NULL default '0',
  image varchar(255) NOT NULL default '',
  filename varchar(255) NOT NULL default '',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  nexttime int(11) unsigned NOT NULL default '0',
  nexttype varchar(255) NOT NULL default '',
  credit int(11) NOT NULL default '0',
  displayorder int(11) unsigned NOT NULL default 0,
  PRIMARY KEY  (taskid),
  KEY displayorder (displayorder)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_thread'
--

CREATE TABLE uchome_thread (
  tid int(11) unsigned NOT NULL auto_increment,
  topicid int(11) unsigned NOT NULL default '0',
  tagid int(11) unsigned NOT NULL default '0',
  eventid int(11) unsigned NOT NULL default '0',
  `subject` varchar(255) NOT NULL default '',
  magiccolor int(11) unsigned NOT NULL default '0',
  magicegg int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  viewnum int(11) unsigned NOT NULL default '0',
  replynum int(11) unsigned NOT NULL default '0',
  lastpost int(11) unsigned NOT NULL default '0',
  lastauthor varchar(255) NOT NULL default '',
  lastauthorid int(11) unsigned NOT NULL default '0',
  displayorder int(11) unsigned NOT NULL default '0',
  digest tinyint(1) NOT NULL default '0',
  hot int(11) unsigned NOT NULL default '0',
  click_11 int(11) unsigned NOT NULL default '0',
  click_12 int(11) unsigned NOT NULL default '0',
  click_13 int(11) unsigned NOT NULL default '0',
  click_14 int(11) unsigned NOT NULL default '0',
  click_15 int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (tid),
  KEY tagid (tagid,displayorder,lastpost),
  KEY uid (uid,lastpost),
  KEY lastpost (lastpost),
  KEY topicid (topicid,dateline),
  KEY eventid (eventid,lastpost)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_topic'
--

CREATE TABLE uchome_topic (
  topicid int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  message mediumtext NOT NULL,
  jointype varchar(255) NOT NULL default '',
  joingid varchar(255) NOT NULL default '',
  pic varchar(255) NOT NULL default '',
  thumb tinyint(1) NOT NULL default '0',
  remote tinyint(1) NOT NULL default '0',
  joinnum int(11) unsigned NOT NULL default '0',
  lastpost int(11) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (topicid),
  KEY lastpost (lastpost),
  KEY joinnum (joinnum)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_topicuser'
--

CREATE TABLE uchome_topicuser (
  id int(11) unsigned NOT NULL auto_increment,
  uid int(11) unsigned NOT NULL default '0',
  topicid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_userapp'
--

CREATE TABLE uchome_userapp (
  uid int(11) unsigned NOT NULL default '0',
  appid int(11) unsigned NOT NULL default '0',
  appname varchar(255) NOT NULL default '',
  privacy tinyint(1) NOT NULL default '0',
  allowsidenav tinyint(1) NOT NULL default '0',
  allowfeed tinyint(1) NOT NULL default '0',
  allowprofilelink tinyint(1) NOT NULL default '0',
  narrow tinyint(1) NOT NULL default '0',
  menuorder int(11) NOT NULL default '0',
  displayorder int(11) NOT NULL default '0',
  KEY uid (uid,appid),
  KEY menuorder (uid,menuorder),
  KEY displayorder (uid,displayorder)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_userappfield'
--

CREATE TABLE uchome_userappfield (
  uid int(11) unsigned NOT NULL default '0',
  appid int(11) unsigned NOT NULL default '0',
  profilelink text NOT NULL,
  myml text NOT NULL,
  KEY uid (uid,appid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_userevent'
--

CREATE TABLE uchome_userevent (
  eventid int(11) unsigned NOT NULL default '0',
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  status int(11) NOT NULL default '0',
  fellow int(11) unsigned NOT NULL default '0',
  template varchar(255) NOT NULL default '',
  PRIMARY KEY  (eventid,uid),
  KEY uid (uid,dateline),
  KEY eventid (eventid,status,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_usergroup'
--

CREATE TABLE uchome_usergroup (
  gid int(11) unsigned NOT NULL auto_increment,
  grouptitle varchar(255) NOT NULL default '',
  system tinyint(1) NOT NULL default '0',
  banvisit tinyint(1) NOT NULL default '0',
  explower int(11) NOT NULL default '0',
  maxfriendnum int(11) unsigned NOT NULL default '0',
  maxattachsize int(11) unsigned NOT NULL default '0',
  allowhtml tinyint(1) NOT NULL default '0',
  allowcomment tinyint(1) NOT NULL default '0',
  searchinterval int(11) unsigned NOT NULL default '0',
  searchignore tinyint(1) NOT NULL default '0',
  postinterval int(11) unsigned NOT NULL default '0',
  spamignore tinyint(1) NOT NULL default '0',
  videophotoignore tinyint(1) NOT NULL default '0',
  allowblog tinyint(1) NOT NULL default '0',
  allowdoing tinyint(1) NOT NULL default '0',
  allowupload tinyint(1) NOT NULL default '0',
  allowshare tinyint(1) NOT NULL default '0',
  allowmtag tinyint(1) NOT NULL default '0',
  allowthread tinyint(1) NOT NULL default '0',
  allowpost tinyint(1) NOT NULL default '0',
  allowcss tinyint(1) NOT NULL default '0',
  allowpoke tinyint(1) NOT NULL default '0',
  allowfriend tinyint(1) NOT NULL default '0',
  allowpoll tinyint(1) NOT NULL default '0',
  allowclick tinyint(1) NOT NULL default '0',
  allowevent tinyint(1) NOT NULL default '0',
  allowmagic tinyint(1) NOT NULL default '0',
  allowpm tinyint(1) NOT NULL default '0',
  allowviewvideopic tinyint(1) NOT NULL default '0',
  allowmyop tinyint(1) NOT NULL default '0',
  allowtopic tinyint(1) NOT NULL default '0',
  allowstat tinyint(1) NOT NULL default '0',
  magicdiscount tinyint(1) NOT NULL default '0',
  verifyevent tinyint(1) NOT NULL default '0',
  edittrail tinyint(1) NOT NULL default '0',
  domainlength int(11) unsigned NOT NULL default '0',
  closeignore tinyint(1) NOT NULL default '0',
  seccode tinyint(1) NOT NULL default '0',
  color varchar(11) NOT NULL default '',
  icon varchar(255) NOT NULL default '',
  manageconfig tinyint(1) NOT NULL default '0',
  managenetwork tinyint(1) NOT NULL default '0',
  manageprofilefield tinyint(1) NOT NULL default '0',
  manageprofield tinyint(1) NOT NULL default '0',
  manageusergroup tinyint(1) NOT NULL default '0',
  managefeed tinyint(1) NOT NULL default '0',
  manageshare tinyint(1) NOT NULL default '0',
  managedoing tinyint(1) NOT NULL default '0',
  manageblog tinyint(1) NOT NULL default '0',
  managetag tinyint(1) NOT NULL default '0',
  managetagtpl tinyint(1) NOT NULL default '0',
  managealbum tinyint(1) NOT NULL default '0',
  managecomment tinyint(1) NOT NULL default '0',
  managemtag tinyint(1) NOT NULL default '0',
  managethread tinyint(1) NOT NULL default '0',
  manageevent tinyint(1) NOT NULL default '0',
  manageeventclass tinyint(1) NOT NULL default '0',
  managecensor tinyint(1) NOT NULL default '0',
  managead tinyint(1) NOT NULL default '0',
  managesitefeed tinyint(1) NOT NULL default '0',
  managebackup tinyint(1) NOT NULL default '0',
  manageblock tinyint(1) NOT NULL default '0',
  managetemplate tinyint(1) NOT NULL default '0',
  managestat tinyint(1) NOT NULL default '0',
  managecache tinyint(1) NOT NULL default '0',
  managecredit tinyint(1) NOT NULL default '0',
  managecron tinyint(1) NOT NULL default '0',
  managename tinyint(1) NOT NULL default '0',
  manageapp tinyint(1) NOT NULL default '0',
  managetask tinyint(1) NOT NULL default '0',
  managereport tinyint(1) NOT NULL default '0',
  managepoll tinyint(1) NOT NULL default '0',
  manageclick tinyint(1) NOT NULL default '0',
  managemagic tinyint(1) NOT NULL default '0',
  managemagiclog tinyint(1) NOT NULL default '0',
  managebatch tinyint(1) NOT NULL default '0',
  managedelspace tinyint(1) NOT NULL default '0',
  managetopic tinyint(1) NOT NULL default '0',
  manageip tinyint(1) NOT NULL default '0',
  managehotuser tinyint(1) NOT NULL default '0',
  managedefaultuser tinyint(1) NOT NULL default '0',
  managespacegroup tinyint(1) NOT NULL default '0',
  managespaceinfo tinyint(1) NOT NULL default '0',
  managespacecredit tinyint(1) NOT NULL default '0',
  managespacenote tinyint(1) NOT NULL default '0',
  managevideophoto tinyint(1) NOT NULL default '0',
  managelog tinyint(1) NOT NULL default '0',
  magicaward text NOT NULL,
  PRIMARY KEY  (gid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_userlog'
--

CREATE TABLE uchome_userlog (
  uid int(11) unsigned NOT NULL default '0',
  action varchar(11) NOT NULL default '',
  `type` tinyint(1) NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_usermagic'
--

CREATE TABLE uchome_usermagic (
  uid int(11) unsigned NOT NULL default '0',
  username varchar(255) NOT NULL default '',
  mid varchar(255) NOT NULL default '',
  count int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,mid)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_usertask'
--

CREATE TABLE uchome_usertask (
  uid int(11) unsigned NOT NULL,
  username varchar(255) NOT NULL default '',
  taskid int(11) unsigned NOT NULL default '0',
  credit int(11) NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  isignore tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (uid,taskid),
  KEY isignore (isignore,dateline)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Structure of the table 'uchome_visitor'
--

CREATE TABLE uchome_visitor (
  uid int(11) unsigned NOT NULL default '0',
  vuid int(11) unsigned NOT NULL default '0',
  vusername varchar(255) NOT NULL default '',
  dateline int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid,vuid),
  KEY dateline (uid,dateline)
) ENGINE=MyISAM;

