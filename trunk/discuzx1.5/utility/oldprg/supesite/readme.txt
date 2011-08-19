===============================
SS7 convert to Discuz! X1 Note
===============================

Question: converted pictures and attachments address right?
Program: the following steps:
1. To find the original source SS7 icon images/base/attachment.gif,
   on Disucuz! X1 directory static/image/filetype/ under;
2. Find the source/module/portal/portal_view.php file in the code
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

