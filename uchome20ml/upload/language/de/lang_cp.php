<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_cp.php 13194 2009-08-18 07:44:40Z liguode $

	User Control Panel (cp.php) FrontEnd Language Sentences

	Translated by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(

	'by' => 'von',
	'tab_space' => ' ',
	'feed_comment_space' => '{actor} antwortete {touser} an die Wand',
	'feed_comment_image' => '{actor} kommentierte das Foto von {touser}',
	'feed_comment_blog' => '{actor} kommentierte zum {blog} von {touser} ',
	'feed_comment_poll' => '{actor} kommentierte {touser} und bewertete die {poll}',
	'feed_comment_event' => '{actor} beim {touser} Organisation Aktivit&auml;ten {event} In der Botschaft des',
	'feed_comment_share' => '{actor} kommentierte zum {share}',
	'share' => 'teilen',
	'share_action' => 'geteilt',
	'note_wall' => 'geschrieben an deine <a href="\\1" target="_blank">Pinwand</a>',
	'note_wall_reply' => 'antwortete auf das <a href="\\1" target="_blank">Posting</a>',
	'note_pic_comment' => 'kommentierte dein <a href="\\1" target="_blank">Foto</a>',
	'note_pic_comment_reply' => 'antwortete auf deinen <a href="\\1" target="_blank">Foto Kommentar</a>',
	'note_blog_comment' => 'kommentierte auf deinen <a href="\\1" target="_blank">\\2</a>',
	'note_blog_comment_reply' => 'antwortete auf deinen <a href="\\1" target="_blank">Blog Kommentar</a>',
	'note_poll_comment' => 'kommentierte auf deine <a href="\\1" target="_blank">Umfrage</a>',
	'note_poll_comment_reply' => 'antwortete auf deine <a href="\\1" target="_blank">Umfrage Kommentare</a>',
	'note_share_comment' => 'kommentierte auf deine <a href="\\1" target="_blank">Shares</a>',
	'note_share_comment_reply' => 'antwortete auf deine <a href="\\1" target="_blank">Shares Kommentare</a>',
	'note_event_comment' => 'kommentierte auf deine <a href="\\1" target="_blank">Event</a>',
	'note_event_comment_reply' => 'antwortete auf deine <a href="\\1" target="_blank">Event Kommentare</a>',
	'note_show_out' => 'Besuche deine Startseite, Diagramm, das die letzte im Wettbewerb Ranking Punkte wurden durch verbraucht',
	'note_space_bar' => 'Setze deine Website empfiehlt, dass Benutzer der',
	
	'note_click_blog' => 'Melde <a href="\\1" target="_blank">\\2</a> hier klicken',
	'note_click_thread' => 'Zum Thema <a href="\\1" target="_blank">\\2</a> hier klicken',
	'note_click_pic' => 'Dein <a href="\\1" target="_blank">Bild</a> hier klicken',
	
	'wall_pm_subject' => 'Hi ich hinterlie&szlig; einen Kommentar auf deiner Pinwand',
	'wall_pm_message' => 'Ich hinterlie&szlig; eine Nachricht auf deiner Pinwand: [url=\\1]Hier klicken[/url]',
	'note_showcredit' => 'habe dir \\1 Credits gesendet als Geschenk zur erh&ouml;ung deines Rankings auf die <a href="network.php?ac=space&view=show" target="_blank">Credit Ranking Bitte</a>',
	'feed_showcredit' => '{actor} sendete {fusername} {credit} Credits um ein besseres Ranking zu bekommen, auf die <a href="network.php?ac=space&view=show" target="_blank">Credit Ranking Bitte</a>',
	'feed_showcredit_self' => '{actor} erh&ouml;t {credit} die Credits um das Ranking auf die <a href="network.php?ac=space&view=show" target="_blank">Credit Ranking Bitte</a> zu erh&ouml;en',
	'feed_doing_title' => '{actor}: {message}',
	'note_doing_reply' => 'antwortete dir als <a href="\\1" target="_blank">Shout Nachricht</a>',
	'feed_friend_title' => '{actor} und {touser} sind nun Freunde',
	'note_friend_add' => 'als Freund bekommen',
	'note_poll_invite' => 'Lade ein, <a href="\\1" target="_blank">"\ \ 2"</a>Der \ \ 3 Stimmen',
	'reward' => 'Reward',
	'reward_info' => 'An der Abstimmung beteiligen \ \ 1 Punkte',
	'poll_separator' => '","',

	'feed_upload_pic' => '{actor} hat neue Bilder hochgeladen',

	'feed_click_blog'	=> '{actor} sendete “{click}” zu {touser} anmelden {subject}',
	'feed_click_thread'	=> '{actor} sendete “{click}” zu {touser} Thema {subject}',
	'feed_click_pic' => '{actor} sendete “{click}” zu {touser} Bilder',
	
	'friend_subject' => '<a href="\\2" target="_blank">\\1 gab dir eine Freundschaftsanfrage</a>',
	'comment_friend' =>'<a href="\\2" target="_blank">\\1 hat einen Kommentar hinterlassen</a>',
	'photo_comment' => '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deinem Foto hinterlassen</a>',
	'blog_comment' => '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deinem Blog hinterlassen</a>',
	'poll_comment' => '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deiner Umfrage hinterlassen</a>',
	'share_comment' => '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deine Shares hinterlassen</a>',
	'friend_pm' => '<a href="\\2" target="_blank">\\1 hat dir eine Nachricht gesendet</a>',
	'poke_subject' => '<a href="\\2" target="_blank">\\1 hat dir Gr&uuml;sse gesendet</a>',
	'mtag_reply' => '<a href="\\2" target="_blank">\\1 antwortete auf ein Thema</a>',
	'event_comment' => '<a href="\\2" target="_blank">\\1 hat einen Kommentar auf deine Events hinterlassen</a>',

	'friend_pm_reply' => '\\1 beantwortete deine Nachricht',
	'comment_friend_reply' => '\\1 beantwortete deine Pinwand Nachricht',
	'blog_comment_reply' => '\\1 beantwortete deinen Blog Kommentar',
	'photo_comment_reply' => '\\1 beantwortete deinen Foto Kommentar',
	'poll_comment_reply' => '\\1 beantwortete deinen Umfrage Kommentar',
	'share_comment_reply' => '\\1 beantwortete deinen Shared Link Kommentar',
	'event_comment_reply' => '\\1 beantwortete deinen Event Kommentar',
	
	'invite_subject' => '\\1 hat \\2 eingeladen, und hat sie oder ihn als Freund bekommen',
	'invite_message'	=> '<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi, Ich bin \\2. Ich habe mein Profil bei \\3 erstellt, Ich hoffe du wirst mein Freund</h3><br>
		und du hast die M&ouml;glichkeit meine Feeds zu sehen. <br>
		<br>
		Also: <br>
		\\4
		<br><br>
		<strong>Bitte klick den folgenden Link um die Einladung zu akzeptieren</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>Wenn du einen bestehenden Account auf \\3 hast, klicke bitte auf den Link um mein Profil zu sehen: </strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',
/*
		'<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi，我是\\2，在\\3上建立了个人主页，邀请您也加入并成为我的好友</h3><br>
		请加入到我的好友中，你就可以通过我的个人主页了解我的近况，分享我的照片，随时与我保持联系<br>
		<br>
		邀请附言：<br>
		\\4
		<br><br>
		<strong>请你点击以下链接，接受好友邀请：</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>如果你拥有\\3上面的账号，请点击以下链接查看我的个人主页：</strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',
*/

	'app_invite_subject' => '\\1 eingeladen \\2, und hab Spass auf \\3',
	'app_invite_message' => '<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi, Ich bin \\2. Ich spiele auf \\3 \\7, melde dich bei mir an</h3><br>
		<br>
		Einladung zugef&uuml;gt: <br>
		\\4
		<br><br>
		<strong>Klicke den Link darunter um die Einladung zum Freund \\7： zu akzeptieren</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>Wenn du einen bestehenden Account bei \\3 hast, klicke bitte den Link um mein Profil zu besuchen: </strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',
/*
		'<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Hi，我是\\2，在\\3上玩 \\7，邀请您也加入一起玩</h3><br>
		<br>
		邀请附言：<br>
		\\4
		<br><br>
		<strong>请你点击以下链接，接受好友邀请一起玩\\7：</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>如果你拥有\\3上面的账号，请点击以下链接查看我的个人主页：</strong><br>
		<a href="\\6">\\6</a><br>
		</td></tr></table>',
*/

	'feed_mtag_add'	=> '{actor} erstellte eine neue Gruppe {mtags}',
	'note_members_grade_-9'	=> 'Austreten von <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>',
	'note_members_grade_-2'	=> 'Auf die Warteliste setzen von <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>',
	'note_members_grade_-1'	=> 'Erlaubt es dir nicht zu sprechen, in <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>',
	'note_members_grade_0'	=> 'In ein normales Mitlied ge&auml;ndert of <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>',
	'note_members_grade_1'	=> 'Ge&auml;ndert in ein Star Mitglied von <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>',
	'note_members_grade_8'	=> 'Ge&auml;ndert als Moderator von <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a> ',
	'note_members_grade_9'	=> 'Ge&auml;ndert als Admin von <a href="space.php?do=mtag&tagid=\\1" target="_blank">\\2</a>',
	'feed_mtag_join'	=> '{actor} Gruppe beigetreten {mtag} ({field})',
	'mtag_joinperm_2'	=> 'Einladung erforderlich um beizutreten',
	'feed_mtag_join_invite'	=> '{actor} hat die Einladung zum beitreten der Gruppe {fromusername} akzeptiert {mtag} ({field})',
	'person' => 'Person',
	'delete' => 'L&ouml;schen',

	'space_update' => '{actor} Wurde einen Augenblick SHOW',

	'active_email_subject' => 'Aktivierungs E-Mail',
	'active_email_msg' => 'Bitte kopiere die Url und f&uuml;ge sie in deinen Browser ein, und aktiviere deine E-Mail<br> Url:<br><a href="\\1" target="_blank">\\1</a>',
	'share_space' => 'share einen Benutzer',
	'note_share_space' => 'shared dein Profil',
	'share_blog' => 'shared einen Blog',
	'note_share_blog' => 'shared deinen Blog <a href="\\1" target="_blank">\\2</a>',
	'share_album' => 'shared ein Album',
	'note_share_album' => 'shared dein Album <a href="\\1" target="_blank">\\2</a>',
	'default_albumname' => 'Standard Album',
	'share_image' => 'ein Foto geteilt',
	'album' => 'Album',
	'note_share_pic' => 'shared <a href="\\1" target="_blank">pic</a> in \\2',
	'share_thread' => 'ein Thema geteilt',
	'mtag' => 'Gruppe',
	'note_share_thread' => 'dein Thema geteilt <a href="\\1" target="_blank">\\2</a>',
	'share_mtag' => 'eine Gruppe geteilt',
	'share_mtag_membernum' => 'Insgesammt {membernum} Mitglieder',
	'share_tag' => 'ein Tag geteilt',
	'share_tag_blognum' => 'Insgesammt {blognum} Blogs',
	'share_link' => 'eine Webseite geteilt',
	'share_video' => 'ein Video geteilt',
	'share_music' => 'Musik geteilt',
	'share_flash' => 'ein Flash geteilt',
	'share_event' => 'teilte ein Event',
	'share_poll' => 'teilte eine \ \ 1 Stimme',
	'note_share_poll' => 'Stimme ab <a href="\\1" target="_blank">\\2</a>',
	'event_time' => 'Zeit',
	'event_location' => 'Ort',
	'event_creator' => 'Sponsor',
	'feed_task' => '{actor} teilt die Aktivit&auml;t {task}',
	'feed_task_credit' => '{actor} teilt die Aktivit&auml;t {task} und erhielt {credit} Credits',
	'the_default_style' => 'Standard Style',
	'the_diy_style' => 'Ausgew&auml;hltes Style',
	'feed_thread' => '{actor} erstellte ein neues Thema',
	'feed_eventthread' => '{actor} unterliegt einer neuen T&auml;tigkeit',

	'feed_thread_reply' => '{actor} antwortete auf das Thema {thread} von {touser}',
	'note_thread_reply' => 'antwortete auf dein Thema',
	'note_post_reply' => 'In <a href=\\"\\1\\" target="_blank">\\2</a> , antwortete auf deinen <a href=\\"\\3\\" target="_blank">Kommentar</a>',
	'thread_edit_trail' => '<ins class="modify">[This thread \\1  \\2 edited]</ins>',
	'create_a_new_album' => 'erstellte ein neues Album',
	'not_allow_upload' => 'Upload nicht erlaubt',
	'get_passwd_subject' => 'Passwort vergessen, E-Mail',
	'get_passwd_message' => 'Klick auf den Link darunter um dein Passwort innerhalb 3 Tage zu aktivieren<br />\\1<br />(Kopiere den Link und f&uuml;ge sie in den Browser ein falls die Url nicht anklickbar ist)<br />.',
	'file_is_too_big' => 'Datei zu gross',
	'feed_blog_password' => '{actor} hat einen neuen geheimen Blog erstellt {subject}',
	'feed_blog' => '{actor} hat einen neuen Blog geschrieben',
	'feed_poll' => '{actor} hat eine neue Umfrage geschrieben',
	'note_poll_finish' => 'Sie initiiert <a href="\\1" target="_blank">"\ \ 2"</a> Die Abstimmung ist beendet,<a href="\\1" target="_blank">Schreibe eine Wahl Zusammenfassung</a>',
	'take_part_in_the_voting' => '{actor} beteiligt {touser} Den {reward} bewerten <a href="{url}" target="_blank">{subject}</a>',
	'lack_of_access_to_upload_file_size' => 'Zugriff auf Dateigr&ouml;sse nicht m&ouml;glich',
	'only_allows_upload_file_types' => 'Nur jpg, gif, png sind erlaubt',
	'unable_to_create_upload_directory_server' => 'kann keinen Verzeichniss Server erstellen',
	'inadequate_capacity_space' => 'Dein Speicherplatz ist voll',
	'mobile_picture_temporary_failure' => 'Kann tempor&auml;re Fotos nicht verschieben',
	'ftp_upload_file_size' => 'Upload fehlgeschlagen',
	'comment' => 'Kommentar',
	'upload_a_new_picture' => 'hat ein neues Bild hochgeladen',
	'upload_album' => 'Album hochgeladen',
	'the_total_picture' => 'insgesammt \\1 Fotos',
	'feed_invite' => '{actor} hat {username} eingeladen um Freunde zu werden',
	'note_invite' => 'hat die Freundesanfrage akzeptiert',
	'space_open_subject' => 'KOmm und verwende dein Profil mehr',
	'space_open_message' => 'Hi, Ich habe dein Profil heute angesehen, scheint als ob du es noch nicht benutzt hast \\1space.php',
	'feed_space_open' => '{actor} aktiviertes Profil',
	
	'feed_profile_update_base' => '{actor} hat grundlegende Informationen aktualisiert',
	'feed_profile_update_contact' => '{actor} hat Kontakte aktualisiert',
	'feed_profile_update_edu' => '{actor} hat die Ausbildung aktualisiert',
	'feed_profile_update_work' => '{actor} aktualisierte Informationen &uuml;ber die Arbeit',
	'feed_profile_update_info' => '{actor} aktualisierte Informationen &uuml;ber Hobbys und Interessen',
	
	'apply_mtag_manager' => 'Admin Anwendung f&uuml;r <a href="\\1" target="_blank">\\2</a> :\\3.<a href="\\1" target="_blank">(Hier klicken um in die Verwaltung zu kommen)</a>',
	'feed_add_attachsize' => '{actor} verwendet {credit} Credits die Gr&ouml;sse {size} zu &auml;ndern f&uuml;r mehr Patz f&uuml;r Fotos(<a href="cp.php?ac=credit&op=addsize"> Ich m&ouml;chte ebenfalls wechseln! </a>)',
	
	'event'		=>'Veranstaltungen',
	'event_set_delete' => 'Administratoren haben die Aktivit&auml;ten deiner Organisation untersagt \\1',
	'event_set_verify' => 'Administratoren haben die Aktivit&auml;ten deiner Organisation bewertet <a href="\\1" target="_blank">\\2</a>',
	'event_set_unverify' => 'Administratoren haben die Aktivit&auml;ten deiner Organisation nicht bestanden <a href="\\1" target="_blank">\\2</a>',
	'event_set_recommend' => 'Administratoren haben die Aktivit&auml;ten deiner Organisation empfohlen <a href="\\1" target="_blank">\\2</a>',
	'event_set_unrecommend' => 'Administratoren haben die Abschaffung der Aktivit&auml;ten deiner Organisation empfohlen <a href="\\1" target="_blank">\\2</a>',
	'event_set_open' => 'Administratoren haben die Er&ouml;ffnung der Aktivit&auml;ten deiner Organisation empfohlen <a href="\\1" target="_blank">\\2</a>',
	'event_set_close' => 'Administratoren haben die Aktivit&auml;ten deiner Organisation geschlossen <a href="\\1" target="_blank">\\2</a>',
	'event_add' => '{actor} eine neue T&auml;tigkeit zuf&uuml;gen',
	'event_feed_info' => '<strong>{title}</strong><br/>Ort: {province} {city} {location} <br/>Zeit: {starttime} - {endtime}',
	'event_join' => '{actor} Teilnahme <a href="space.php?uid={uid}" target="_blank">{username}</a> Aktivit&auml;ten <a href="space.php?do=event&id={eventid}" target="_blank">{title}</a>',
	'event_join_member' => 'Teilnahme an den Aktivit&auml;ten deiner Organisation <a href="\\1" target="_blank">\\2</a>',
	'event_quit_member' => 'Der Aktivit&auml;ten deines Unternehmens gezogen <a href="\\1" target="_blank">\\2</a>',
	'event_join_verify' => 'Antrag auf Teilnahme an den Aktivit&auml;ten deiner Organisation <a href="\\1" target="_blank">\\2</a>schnell<a href="\\3" target="_blank">Audit</a>Bar',
	'eventmember_set_verify' => 'Zur Teilnahme an Aktivit&auml;ten durch deine <a href="\\1" target="_blank">\\2</a> Anwendung',
	'eventmember_unset_verify' => 'Im Falle deiner <a href="\\1" target="_blank">\\2</a>Identit&auml;t auf ein anh&auml;ngiges setzen',
	'eventmember_set_admin' => 'Setze in die Aktivit&auml;ten deiner <a href="\\1" target="_blank">\\2</a> Veranstalter',
	'eventmember_unset_admin' => 'Als eine T&auml;tigkeit, die du abgebrochen hast <a href="\\1" target="_blank">\\2</a> Organisatoren der Identit&auml;t',
	'eventmember_set_delete' => 'Setze aus der T&auml;tigkeit der <a href="\\1" target="_blank">\\2</a>',
	'event_feed_share_pic_title' => '{actor} teilte ein neues Fotoalbum bei den Events',
	'event_feed_share_pic_info' => '<b><a href="space.php?do=event&id={eventid}&view=pic" target="_blank">{title}</a></b><br/>Insgesamt {picnum} Fotos',
	'event_accept_invite' => 'So nimmst du an einer Einladung an den Aktivit&auml;ten teil <a href="\\1" target="_blank">\\2</a> ',
	'event_accept_success' => 'Erfolgreiche Teilnahme an dieser Veranstaltung <a href="\\1" target="_blank">Sofortiger Zugriff auf die T&auml;tigkeit</a>',

	//Requisiten:source/magic/*
	'magicunit' => 'A',
	'magic_note_wall' => 'Im Nachrichtenborad f&uuml;r dich <a href="\\1" target="_blank">Nachricht</a>',
	'magic_call' => 'Im\\Mittelpunkt deines Namen<a href="\\2" target="_blank">Schau an der Bar</a>',
	'magicuse_thunder_announce_title' => '<strong>{username} ausgestellt als “Sound of Thunder”</strong>',
	'magicuse_thunder_announce_body' => 'Hallo, ich bin Online<br><a href="space.php?uid={uid}" target="_blank">Willkommen auf meiner Homepage</a>',
	'magic_present_note' => 'Requisiten, um dir eine \\1, <a href="\\2">Schnell gehen und sehen</a>',

	//User-Gruppe erhalten ein Vorschlags-Upgrade
	'upgrade_magic_award' => 'Herzlichen Dank f&uuml;r deine Bewertung, upgrade auf \\1, und die folgenden Requisiten: \\2',

	//Benutzer Requisiten
	'present_user_magics' => 'Du erh&auml;lst ein Geschenk von den Administrator Requisiten:\\1',
	'has_not_more_doodle' => 'Du hast noch ein Graffiti-Board',

	'do_stat_login' => 'Besuche Benutzer',
	'do_stat_register' => 'Neue registrierte Nutzer',
	'do_stat_invite' => 'Freunde eingeladen',
	'do_stat_appinvite' => 'Anwendungen eingeladen',
	'do_stat_add' => 'Release Information',
	'do_stat_comment' => 'Interaktive',
	'do_stat_space' => 'User Interactive',
//	'do_stat_login' => 'Besuche Benutzer',
	'do_stat_doing' => 'Aufnahme',
	'do_stat_blog' => 'Blog',
	'do_stat_pic' => 'Bild',
	'do_stat_poll' => 'Bewerten',
	'do_stat_event' => 'Events',
	'do_stat_share' => 'Teilen',
	'do_stat_thread' => 'Thema',
	'do_stat_docomment' => 'Aufnahme Antwort',
	'do_stat_blogcomment' => 'Blog-Kommentare',
	'do_stat_piccomment' => 'Bild Kommentare',
	'do_stat_pollcomment' => 'Umfrage-Kommentare',
	'do_stat_pollvote' => 'Umfrage-Abstimmung',
	'do_stat_eventcomment' => 'Event-Kommentare',
	'do_stat_eventjoin' => 'Teilnahme an Aktivit&auml;ten',
	'do_stat_sharecomment' => 'geteilte Kommentare',
	'do_stat_post' => 'Thema Antworten',
	'do_stat_click' => 'Position',
	'do_stat_wall' => 'Nachricht',
	'do_stat_poke' => 'Hallo'

);

