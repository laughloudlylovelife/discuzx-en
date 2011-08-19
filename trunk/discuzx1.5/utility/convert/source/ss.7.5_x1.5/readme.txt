====================================
SupeSite 7.5 upgrade to Discuz! X1.5 Help
====================================

Special Alert!!!
Discuz! X1.5 not have the SupeSite 7.5 in all of the features,
This conversion process, only the information in the conversion
SupeSite 7.5 classification of news articles data to Discuz! X1.5 products,
articles system.
Other data will not be converted.
Therefore, data conversion, Discuz! X1.5 SupeSite features the original product is lost
and there is data loss problem, weigh their own decisions whether to convert to upgrade.


I Preparing for upgrade
---------------
1. Establish procedures for the backup directory, such as old
2. SupeSite all of the original program to move to the old directory
3. By Discuz! X1.5 product upload directory directory program to SupeSite
4. Run the installer /install
   Please specify the original installation when mounted UCenter Server address SupeSite

Data II upgrade SupeSite
---------------
1. Installation, testing, Discuz! X1.5 to normal operation after the upload process
   to convert Discuz! X1.5 root
2. Executive /convert
3. Select the appropriate version of the program, start the conversion
4. The conversion process is not without interruption,
   until the program automatically executed.
5. Conversion process may take longer, and consume more server resources,
   you should select the server implementation of free time

III upgrade is completed, we need to do a few things
--------------------------
1. Edit the new Discuz! X1.5 of the config/config_global.php file,
   setting the founder of
2. Direct access to the new Discuz! X1.5 of admin.php
3. Use the founder account login, update the cache into the background
4. The new system adds a lot of set up the project, including user permissions,
   group permissions, forum sections, etc., you need to carefully re-set once.
5. Transfer the old attachments directory to the root directory of new products
   (before the transfer, the contents of your information in the image does not display)
   a) the old/attachments directory and the directory of all the documents move to the new Discuz! X1.5
      products /data/attachment/portal/ directory
   b) to find the original source SS7 icon images/base/attachment.gif,
      on Disucuz! X1 directory static/image/filetype/ under;
   c) find the source/module/portal/portal_view.php file in the code
      "$content['content'] = blog_bbcode($content['content']);"
      add the following code after the line:

	$ss_url = 'http://your_ss_site_url/'; // if this link address to your SS site address!!!
	$findarr = array(
		$ss_url.'batch.download.php?aid=', // attachment Download
		$ss_url.'attachments/',  // attached images directory
		$ss_url.'images/base/attachment.gif'  // download the attachment icon
	);
	$replacearr = array(
		'porta.php?mod=attachment&id=',
		$_G['setting']['attachurl'].'/portal/',
		STATICURL.'image/filetype/attachment.gif'
	);
	$content['content'] = str_replace($findarr, $replacearr, $content['content']);

6. Transfer the old image directory to the root directory of new products
  (before the transfer, the information content in your face does not display)
   a) the old/images directory and the directory file to a new Discuz! X1.5 root of the product
7. Remove convert program, so as not to give your Discuz! X1.5 installation and security.
