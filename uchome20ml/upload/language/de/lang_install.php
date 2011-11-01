<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_admin.php 2010-05-10 04:35:11 by vot AT sources.ru $

	AdminCP Templates Language Sentences

	written by Valery Votintsev, aka "vot" [at] sources.ru

*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['sourcelang'] = array (

	'submit'		=> 'Submit',//'提交',

	'rename_config'		=> 'Bitte zuerst die im Root Verzeichniss liegende "config.new.php" umbenennen in "config.php"',

	'upload_sql'		=> 'Bitte lade die neueste install.sql Struktur der Datenbank-Datei aus dem Programm ./data Directory, und klicke dann erneut ausf&uuml;hren',

	'allready_installed'	=> '<b>Achtung! Du hast UCnter Home bereits installiert</b><br>
			Um die Datensicherheit zu gew&auml;hrleisten, bitte die install/index.php manuell l&ouml;schen<br>
			Wenn du UCenter Home wieder installieren m&ouml;chtest, l&ouml;sche bitte die data/install.lock Datei und f&uuml;hre dann die Installationsdatei erneut aus.',

	'config_nonwritable' => 'Die Datei config.php ist mit falschen Lese-und Schreibrechten gesetzt',

	'ucenter_url_invalid' => 'Die URL-Adresse zu UCenter ist falsch',

	'uc_client_not_found' => 'uc_client Verzeichnis existiert nicht. Kopiere es bitte aus der ./upload/uc_client in das Root-Verzeichnis',

	'uc_error' => '<strong>UCenter Fehler Error:</strong>',
	'uc_error_intro' => '<strong>Stelle sicher das die IP Adresse im UCenter richtig ist.</strong><br><br>',

	'uc_ip' => 'UCenter Server IP-Adresse',

	'uc_ip_comment' => 'Zum Beispiel: 192.168.0.1',

	'uc_ip_confirm' => 'IP-Adresse best&auml;tigen',

	'charset_different' => 'UCenter Server-Side-Charakter mit der aktuellen Anwendung von einem anderen Zeichensatz. Lade bitte den '.$ucdbcharset.' f&uuml;r UCenter Home. Installations Download-Adresse: http://download.comsenz.com/',

	'uch_allready_installed' => 'Ein UCenter Home Produkt ist bereits installiert. Wenn du mit der Installation fortfahren m&ouml;chtest entferne das Application Management in UCenter!',

//----------------------------------
'blog_title'	=> 'Blog Titel',//'Blog title'
'user_id'	=> 'User-ID',//'User ID'
'user_name'	=> 'Benutzername',//'User name'
'date'		=> 'Datum',//'Date'
'space_address'	=> 'Space Adresse',//'Space address'
'blog_address'	=> 'Melde Adresse',//'Blog address'
'personal_home'	=> 'Pers&ouml;nliche Startseite',//'Personal home'
//----------------------------------

	'uc_cannot_connect' => 'UCenter kann keine Verbindung aufbauen',

	'uc_admin_password_incorrect' => 'UCenter Administrator-Konto Passwort ist falsch',

	'uc_problem' => 'UCenter Daten Probleme:',

	'uchome_registered' => 'UCenter Erfolgreich registriert! ID identifiziert das aktuelle Programm:',

	'go_next_step' => 'Weiter',

	'prefix_empty' => 'Pr&auml;fix ausf&uuml;llen',

	'db_params_invalid' => 'Datenbank-Anbindungs Informationen falsch',

	'db_cannot_create' => 'UCenter Home Datenbank-Operationen ohne Erlaubnis. Bitte manuell ausf&uuml;llen.',

	'db_not_empty' => 'Urspr&uuml;ngliche Daten werden &uuml;berschrieben!',

	'db_set_ok' => 'Datenbank-Konfiguration erfolgreich.',

	'password_invalid' => 'Benutzername Passwort ist falsch',

	'username_invalid' => 'Benutzernamen kann nicht registriert werden, bitte erneut best&auml;tigen.',

	'uch_installed_ok' => '<font color="red">Herzlichen Gl&uuml;ckwunsch! UCenter Home-Installation erfolgreich abgeschlossen!</font>
		<br><br>
		Zur Sicherheit deiner Daten l&ouml;sche das Installationsverzeichnis.
		<br><br>
		Der Administrator wurde erfolgreich identifiziert.
	        <br>
		Weiter zur:
	        <br>
		<br> <a href="../space.php" target="_blank">Homepage</a>
		<br>um mit der UCenter Home Tour zu beginnen
		<br>
		<br> or
	        <br><br>
	        <a href="../admincp.php" target="_blank">Verwaltungs-Seite</a>
		<br>um administrative Einstellungen vorzunehmen.',

	'failed' => 'Fehler',

	'ok' => 'OK',

	'welcome' => '<strong>UCenter Home verwenden</strong><br>
	      &Uuml;ber UCenter Home. Als Jianzhan, eine ganz einfache Beziehung mit Freunden als Kern Kommunikationsnetz aufzubauen, so dass die Benutzer der Site Leben kann in einem Satz Bit-Rekord von bit; schnell und einfach zu ver&ouml;ffentlichen Blogs, Bilder hochladen, mehr kann sehr bequem, ihre Freunde, die Informationen austauschen, diskutieren Themen von Interesse, schnell und einfach das Verst&auml;ndnis von Freunden Updates.
	      <br><a href="javascript:;" onclick="readme()"><strong>Bitte beachte unsere Software-Lizenzvereinbarung</strong></a>',

	'file_permissions' => '<strong>Datei / Verzeichnisberechtigungen:</strong>
		<br>
		Wenn du die Installationsdatei aufrufst, sei sicher das vor dem ersten Aufruf die 
		entsprechenden Attribute im Verzeichnis gesetzt sind, so dass die Daten-Dateien korrekt 
		lesenbar / beschreibbar / l&ouml;schbar / sind.
		<br>
		Empfohlen:
		<br>
		Verwende FTP Software, melde dich bei deinem Server
		die folgenden Verzeichnisse auf dem Server, 
		sowie alle Dateien in diesem Verzeichnis den folgenden Eigenschaft auf 777 gesetzt, 
		gewinnen Host up Internet Gastkonto kann gelesen werden Schreib-Eigentum.<br>',

	'name' => 'Name',

	'required_permission' => 'Eigentum verpflichtet',

	'description' => 'Beschreibung',

	'test_result' => 'Ergebnisse',

	'r/w' => 'Lesen / Schreiben',

	'system_config' => 'System Profil',

	'include_subdirs' => 'Einschließlich das Verzeichnis, Unterverzeichnisse und Dateien',

	'r/w/d' => 'lesen / schreiben / l&ouml;schen',

	'attach_dir' => 'Zubeh&ouml;r Katalog',

	'data_dir' => 'Site data directory',

	'uc_client_dir' => 'uc_client Daten Verzeichniss',

	'permission_problem' => '<b>Probleme</b>:
		<br>Das System erkennt die oben genannten Verzeichnisse oder eine Datei Berechtigung nicht richtig
		<br>Es wird empfohlen diese Berechtigungen vor dem Fortfahren zu korrigieren
		<br>Ansonsten ergeben sich im System unvorhergesehene Probleme.',

	'force_continue' => 'Force Weiter',

	'accept_license' => 'Akzeptiere die Lizenzvereinbarung, um mit der Installation von UCenter Home zu beginnen',

	'read_license' => '<strong>Lizenz-Vereinbarung (deutsch &Uuml;bersetzt):</strong>',

	'license' => '<div>
		Chinesische Version der Lizenz-Vereinbarung gilt f&uuml;r die chinesischen Nutzer
		<p>Copyright (c) 2001-2009, Hong Sing Wunsch (Beijing) Technology Co., Ltd.
		<br>Alle Rechte vorbehalten</p>
		<br>Vielen Dank, dass Sie sich f&uuml;r UCenter Home entschieden haben.
		Wir hoffen, dass unsere Bem&uuml;hungen, f&uuml;r Sie mit einem starken sozialen Networking (SNS)-L&ouml;sung.
		UCenter Home, von Jian Zhan ist ein zentrales Kommunikationsnetzwerk, so dass die Benutzer der Seite Leben kann in einem Satz Bit-Rekord von bit;
		schnell und einfach zu ver&ouml;ffentlichen Blogs, Bilder hochladen,
		mehr kann sehr bequem im Zusammenhang mit ihren Freunden, die Informationen austauschen, diskutieren Themen von Interesse,
		schnell und einfach das Verst&auml;ndnis von Freunden Updates.</p>
		<p>Comsenz (Beijing) Technology Co., Ltd f&uuml;r UCenter Home Das Produkt-Entwickler,
		nach dem Gesetz unabh&auml;ngig und privat UCenter Home Produkte Copyright (China National Copyright Administration des Urheberrechts Registriernummer 2006SR12091).
		Comsenz (Beijing) Technology Co., Ltd
		http://www.comsenz.com,
		<br>UCenter Home Offizielle Website-Adresse ist http://u.discuz.net.</p>
		<p>UCenter Home Copyright wurde in The People Republic of China State Bureau Copyright,
		Urheberrecht von Rechtsvorschriften und internationale &Uuml;bereinkommen gesch&uuml;tzt registriert.
	     <br>
		Benutzer: Ob eine Person oder Organisation, Gewinn-oder nicht,
		zur (Einschlie&szlig;lich Lern-und Forschungs-Zwecke),
		verpflichtet sind, diese Vereinbarung sorgf&auml;ltig lesen,
		verstehen und erkennen an, im Einklang mit allen Bedingungen dieser Vereinbarung nur nach dem Start mit UCenter Home Software.</p>
		<p>Comsenz (Beijing) Technology Co., Ltd hat das Recht der endg&uuml;ltigen Auslegung dieser Lizenzvereinbarung.
		<ul type=i>
		<p>
		<li><b>Das Recht auf Lizenz-Vereinbarung</b>
			<ul type=1>
			<li>Mit dem Endbenutzer-Lizenzvertrag k&ouml;nnen Sie,
				auf der Grundlage der Anwendung dieser Software, f&uuml;r nicht-kommerzielle Zwecke,
				und ohne Software-Lizenzgeb&uuml;hren, dieses Produkt nutzen.</li>
			<li>Anhaltend an diese Bestimmungen in der Vereinbarung, d&uuml;rfen Sie den Quellcode (sofern verf&uuml;gbar) oder die Schnittstelle f&uuml;r Ihre Website-Anforderungen &auml;ndern.</li>
			<li>Sie haben zur Nutzung der Software die Verpflichtung, Texte und Informationen des Eigentums anzuerkennen, unabh&auml;ngig von der Verpflichtung zum Inhalt und Gegenstande im Zusammenhang mit rechtlichen Verpflichtungen.</li>
			<li>Autorisierter Zugang zu kommerziellen Software f&uuml;r kommerzielle Anwendungen,
				ist in der gleichen Zeit auf der Grundlage der Art,
				die von der Beh&ouml;rde, die in der Zeit der technischen Unterst&uuml;tzung,
				f&uuml;r den Inhalt der Art und Weise.
				Business autorisierte Benutzer genie&szlig;en ihre Ansichten spiegeln die Macht der Ansichten wird der vorrangig zu ber&uuml;cksichtigen ist, aber nicht angenommen werden m&uuml;ssen, um sicherzustellen, dass die Verpflichtungen eingehalten werden.</li>
			</ul>
		<p></p>
		<li><b>Die Zustimmung der Pflichten und Grenzen</b>
			<ul type=1>
			<li>Business wurde nicht genehmigt,
				bevor die Software f&uuml;r kommerzielle Zwecke (einschlie&szlig;lich,
				aber nicht beschr&auml;nkt auf Corporate Websites, Business-Website oder Kopf-Profit-Site Gewinn) verwendet werden darf.
				<br>
				F&uuml;r den Erwerb von Lizenzen, besuchen Sie bitte http://www.discuz.com
				<br>
				oder rufen Sie 8610-51657885 (China) an, dort erfahren Sie mehr.</li>
			<li>Diese Software darf nicht vervielf&auml;ltigt, vermietet,
			verkauft oder anderweitig angeboten werden.</li>
			<li>In jedem Fall hei&szlig;t das, egal, welcher Nutzung,
			unabh&auml;ngig davon, ob einer &Auml;nderung, wie die Verwendung von UCenter oder Teile davon,
			ohne die schriftliche Genehmigung zur Entfernung der Fu&szlig;leiste des UCenter,
			um den Namen und die Sing (Beijing) Technology Co., Ltd
			im Rahmen der Website (http://www.comsenz.com, http://www.discuz.com oder http://www.discuz.net)
			muss der Link beibehalten werden.</li>
			<li>UCenter wurde ganz oder teilweise auf der Grundlage f&uuml;r die Entwicklung daraus abgeleiteter Version,
			 eine modifizierte Version von oder f&uuml;r die Umverteilung von Drittanbieter-Versionen.</li>
			<li>Wenn Sie den Bestimmungen dieses Abkommens nicht zustimmen,
			 wird die Lizenz beendet, dem Lizenznehmer das Recht entzogen,
			 und hat mit der entsprechenden rechtlichen Verantwortung zu rechnen.
			</li>
			</ul>
			<p></p>
		<li><b>Die Sicherheit und Haftung</b>
			<ul type=1>
			<li>An der Software und den Dokumenten gibt es keine implizite Garantie
			 f&uuml;r die Entsch&auml;digung in irgendeiner Form.</li>
			<li>F&uuml;r die freiwillige Nutzung
			 dieser Software
			 sowie aller Produkte tragen Sie die Risiken.
			 Wir versprechen keine technische Unterst&uuml;tzung
			 oder bieten Garantien.</li>
			<li>Sing Wunsch (Beijing) Technology Co., Ltd Software,
			 f&uuml;r Gegenst&auml;nde oder Informationen.
			</li>
			</ul>
		</li>
		</ul>
		<p>
			Die UCenter Home Endbenutzer-Lizenzvertrag,
			 Gewerbeerlaubnis und technische Dienstleistungen,
			 die Details der offiziellen Website von UCenter Home ausschlie&szlig;en.
			 Comsenz (Beijing) Technology Co., Ltd hat,
			 ohne vorherige Ank&uuml;ndigung,
			 die &uuml;berarbeitete Lizenzvereinbarung und Dienstleistungen Preisliste der Befugnisse
			 der ge&auml;nderten Vereinbarung oder Preisliste vom Recht auf den Zeitpunkt des Inkrafttretens der neuen autorisierte Benutzer zu &auml;ndern.
		<p>
			Eine elektronische Kopie der Lizenz-Vereinbarung,
			 wie die Form einer schriftlichen Vereinbarung von beiden Parteien unterzeichnet,
			 wie eine vollst&auml;ndige und gleichwertige rechtliche Wirkung.
			 Sobald Sie mit der Installation beginnen gilt UCenter Home als vollst&auml;ndig
			 und Sie akzeptieren die Bestimmungen dieses Abkommens,
			 in den Genuss der Befugnisse durch diese Bestimmungen in der gleichen Zeit,
			 von den jeweiligen Besonderheiten und Einschr&auml;nkungen.
			 Lizenzvertrag nicht in den Anwendungsbereich der Handlungen,
			 wird eine direkte Verletzung der Lizenz-Vereinbarung und eine Verletzung,
			 haben wir das Recht, das Mandat zu jeder Zeit, bestellt,
			 um die Sch&auml;den, und behalten die Zust&auml;ndigkeit zur Verantwortung gezogen werden.
		</p>
		</div>',

	'get_uc_auto' => '<strong># UCenter Parameter Auto-&Uuml;bernahme</strong>',

	'us_settings_submit' => 'UCenter Die entsprechenden Informationen wurden gesichert. 
				Klicke bitte auf den Button unten, um die Konfiguration fortzusetzen',

	'uc_install_first' => 'Verwende UCenter Home, muss zun&auml;chst auf deiner Website eine einheitliche 
		Benutzer-Account Informationen finden Sie in UCenter User Centered Systems gespeichert installieren.
		<br>
		Wenn auf deiner Website UCenter noch nicht installiert ist, tun dies bitte:<br>
		<br>
		1. <a href="http://download.comsenz.com/UCenter/" target="_blank"><b>Neuste Version von UCenter</b></a>
			 Lese bitte die Anweisungen im UCenter Installations-Paket.<br>
		<br>
		2. UCenter installiert, nachdem die UCenter in den folgenden relevanten Informationen
			 f&uuml;lle UCenter Home Installation fortzufahren.
			<br>',

	'uc_settings_fill' =>'<strong># UCenter Parameter</strong>',
	'us_settings_enter' => 'Bitte die Daten von UCenter eingeben:',
	'uc_url' => 'UCenter API URL:',
	'uc_url_comment' => 'Zum Beispiel: http://www.discuz.net/ucenter',
	'uc_admin_password' => 'UCenter Gr&uuml;nder Passwort:',
	'uc_config_submit' => 'Submit UCenter Konfiguration',

	'uc_db_info' => '<strong># UCenter Home Datenbank-Information</strong>',
	'uc_db_info_comment' => 'Datenbank Informationen von UCenter',
	'uc_db_host' => 'Datenbank-Server Addresse:',
	'uc_db_host_comment' => 'Meist localhost',
	'uc_db_user' => 'Datenbank-Benutzername:',
	'uc_db_password' => 'Datenbank Passwort:',
	'uc_db_charset' => 'Datenbank Zeichensatz:',
	'uc_db_charset_custom' => '+ Custom',

	'mysql_required' => 'MySQL Versions 4.1+ und H&ouml;her',

	'db_name' => 'Datenbank-Name:',
	'db_name_comment' => 'Wenn nicht vorhanden, automatisch erstellen',
	'db_prefix' => 'Table Pr&auml;fix:',
	'db_prefix_comment' => 'Darf nicht leer sein, Standard ist uchome_',
	'db_test' => 'Datenbank &uuml;berpr&uuml;fen',

	'install_sql_missing' => 'Konnte SQL nicht laden. Bitte stelle sicher das sich die SQL Datei im Verzeichniss $sqlfile befindet',

	'table' => 'Datenblatt',
	'table_create_error' => 'Auto-Installation fehlgeschlagen.</font><br />
		R&uuml;ckmeldung: ',

	'table_create_error_comment' => 'Bitte beachte install/install.sql In der SQL-Text-Datei manuell installieren,
			die Datenbank selbst,
			und dann fahren Sie mit dem Installationsvorgang.',

	'try_again' => 'Try again',
	'tables_installed' => 'Datentabellen Installation abgeschlossen',

	'site_name' => 'My space',

//----------------------------	
	'group_category_name1' => 'Freie Gruppe',
	'group_category_name2' => 'Regional Gruppe',
	'group_category_name3' => 'Spezielle Interessen',

	'group_titles' => array(
		'Administrator', 
		'Moderator', 
		'VIP', 
		'Minimal-Mitglied', 
		'Standard Mitglied', 
		'Intermediate Mitglied', 
		'Senior Mitglied', 
		'Sprechverbot', 
		'Banned'
		),

//----------------------------	
//Increase Money Rules
	'rule_register'	=> 'Space aktiviren',
	'rule_realname'	=> 'Namens Authentifizierung',
	'rule_realemail' => 'E-Mail-Authentifizierung',
	'rule_invitefriend' => 'Eingeladene Freunde',
	'rule_setavatar' => 'Avatar hochladen',
	'rule_videophoto' => 'Video-Authentifizierung',
	'rule_report' => 'Missbrauch',
	'rule_updatemood' => 'Update Status',
	'rule_hotinfo' => 'Hot info',
	'rule_daylogin' => 'Daily login',
	'rule_visit' => 'Visit other space',
	'rule_poke' => 'Gruss',
	'rule_guestbook' => 'G&auml;stebuch',
	'rule_getguestbook' => 'Mitteilung',
	'rule_doing' => 'Shouts',
	'rule_publishblog' => 'Blog schreiben',
	'rule_uploadimage' => 'Bild hochladen',
	'rule_camera' => 'WebCam',
	'rule_publishthread' => 'Thema ver&ouml;ffentlichen',
	'rule_replythread' => 'Thema antworten',
	'rule_createpoll' => 'Umfrage erstellen',
	'rule_joinpoll' => 'Umfrage anmelden',
	'rule_createevent' => 'Event erstellen',
	'rule_joinevent' => 'Event anmelden',
	'rule_recommendevent' => 'Empfohlene Event',
	'rule_createshare' => 'Create Share',
	'rule_comment' => 'Kommentar',
	'rule_getcomment' => 'Kommentar abgeben',
	'rule_installapp' => 'Anwendung installieren',
	'rule_useapp' => 'Application verwenden',
	'rule_click' => 'Rate Klick',
//Decrease Money Rules
	'rule_editrealname' => 'Echt-Name bearbeiten',
	'rule_editrealemail' => 'E-Mail bearbeiten',
	'rule_delavatar' => 'Avatar l&ouml;schen',
	'rule_invitecode' => 'Einladungscode',
	'rule_search' => 'Suche',
	'rule_blogimport' => 'Blog importieren',
	'rule_modifydomain' => 'Domain modifizieren',
	'rule_delblog' => 'Blog l&ouml;schen',
	'rule_deldoing' => 'Shout l&ouml;schen',
	'rule_delimage' => 'Bild l&ouml;schen',
	'rule_delpoll' => 'Umfrage l&ouml;schen',
	'rule_delthread' => 'Thema l&ouml;schen',
	'rule_delevent' => 'Event l&ouml;schen',
	'rule_delshare' => 'Share l&ouml;schen',
	'rule_delguestbook' => 'Nachricht l&ouml;schen',
	'rule_delcomment' => 'Kommentar l&ouml;schen',

//----------------------------	

	'cron_log' => 'Statistik Update',
	'cron_cleanfeed' => 'Clean-up Datenfeed',
	'cron_cleannotification' => 'Clean-up Pers&ouml;nliche Mitteilung',
	'cron_getfeed' => 'Synchron UCenter Feed',
	'cron_cleantrace' => 'Clean-up Bilanz und die neusten Besucher',

//------------------------

	'task_avatar' => 'Eigenes Avatar',
	'task_avatar_intro' => 'Hier ist dein pers&ouml;nliches Bild<br>Erstelle ein eigenes Avatar das dich deine Freunde leichter erkennen.',

	'task_profile' => 'Profil fertigstellen',
	'task_profile_intro' => 'Deine eigenen Angaben fertigstellen.<br>Damit lassen sich mehr Freunde finden.',

	'task_blog' => 'Erstelle deinen ersten Blog',
	'task_blog_intro' => 'Ersten Login-Blog schreiben.<br>Teile dein Leben mit anderen.',

	'task_friend' => '5 Freunde hinzuf&uuml;gen',
	'task_friend_intro' => 'Mit Freunden, Fotos, Blogs und Mitteilungen teilen.<br>Ausserdem siehst du auf der Startseite wer gerade von ihnen online ist.',

	'task_email' => 'E-Mail Aktivierung &uuml;berpr&uuml;fen',
	'task_email_intro' => 'E-Mail Aktivierung best&auml;tigen lassen.<br>Mailbox aufrufen.<br>Rechtzeitige Informationen &uuml;ber Freunde usw. erfahren.',

	'task_invite' => '10 neue Freunde einladen',
	'task_invite_intro' => 'Freunde oder E-Mail-Kontakte &uuml;ber QQ oder andere beliebte Messenger suchen und einladen.',

	'task_gift' => 'T&auml;gliche Geschenke',
	'task_gift_intro' => 'Logge dich jeden Tag auf deinem Profil ein und bekomme Credits.',

//----------------------------------

	'event_category1' => 'Life/Party',
	'event_category1_template' => 'Geb&uuml;hr:\r\nAustragungs-Ort:\r\nDress-Code:\r\nKontakt:\r\nHinweis:',

	'event_category2' => 'Urlaub / Reisen',
	'event_category2_template' => 'Anfahrt:\r\nGeb&uuml;hr:\r\nAnforderungen an die Ger&auml;te:\r\nTransport:\r\nPick-up-Points:\r\nKontakt:\r\nHinweis:',

	'event_category3' => 'Wettbewerb / Sport',
	'event_category3_template' => 'Geb&uuml;hr:\r\nAustragungs-Ort:\r\nDress-Code:\r\nVeranstaltungsort Beschreibung:\r\nKontakt:\r\nHinweis:',

	'event_category4' => 'Film / Performance',
	'event_category4_template' => 'Beschreibung:\r\nGeb&uuml;hr:\r\nAustragungs-Ort:\r\nKontakt:\r\nHinweis:',

	'event_category5' => 'Bildung / Seminar',
	'event_category5_template' => 'Veranstalter:\r\nThema:\r\nGeb&uuml;hr:\r\nAustragungs-Ort:\r\nKontakt:\r\nHinweis:',

	'event_category6' => 'Andere',

//-----------------------------------------

	'magic_invisible' => 'Unsichtbar',
	'magic_invisible_intro' => 'Macht dich beim einloggen Unsichtbar innerhalb von 24 Stunden.',

	'magic_friendnum' => 'Freundes Karte',
	'magic_friendnum_intro' => 'Erlaubt die Einstellung an Freunden von ein paar bis zu 10.',

	'magic_attachsize' => 'Anhang Gr&ouml;sse',
	'magic_attachsize_intro' => 'Du kannst eine Anhang-Gr&ouml;sse bis zu 10 MB erh&ouml;hen',

	'magic_thunder' => 'Sound of Thunder',
	'magic_thunder_intro' => 'Ver&ouml;ffentlicht Full-Stop Informationen um zu zeigen das du Online bist.',

	'magic_updateline' => 'Boje',
	'magic_updateline_intro' => 'Release-Zeit eines angegebenen Objekts aktualisieren.',

	'magic_downdateline' => 'Time Machine',
	'magic_downdateline_intro' => 'Freisetzung eines angegebenen Objekts an die Zeit &auml;ndern.',

	'magic_color' => 'Farbe',
	'magic_color_intro' => 'Titel nach Farbe ausw&auml;hlen.',

	'magic_hot' => 'Hot light',
	'magic_hot_intro' => 'Hot Spots angeben.',

	'magic_visit' => 'Besucher Karten',
	'magic_visit_intro' => '10 zuf&auml;llig ausgew&auml;hlte Freunden einen Gruss senden oder eine Nachricht hinterlassen.',

	'magic_icon' => 'Rainbow Egg',
	'magic_icon_intro' => 'Der Titel eines angegebenen Objekts auf das Symbol vor einem Anstieg (bis zu 8 Symbole)',

	'magic_flicker' => 'Flicker',
	'magic_flicker_intro' => 'Kommentare einer Nachricht aufleuchten lassen.',

	'magic_gift' => 'Roter Umschlag',
	'magic_gift_intro' => 'Einen roten Umschlag den Besuchern gegeben.',

	'magic_superstar' => 'SuperStar',
	'magic_superstar_intro' => 'Pers&ouml;nliche Homepage anpreisen. Superstar Avatar setzen.',

	'magic_viewmagiclog' => 'Magic Logs',
	'magic_viewmagiclog_intro' => 'Aus der angegebenen Anwender-Liste die zuletzt verwendeten Requisiten ansehen.',

	'magic_viewmagic' => 'Magic Voransicht',
	'magic_viewmagic_intro' => 'Aktuellen Inhaber der angegebenen Benutzer Requisiten ansehen.',

	'magic_viewvisitor' => 'Besucher verfolgen',
	'magic_viewvisitor_intro' => 'Die 10 letzten besuchten Seiten eines Benutzers ansehen.',

	'magic_call' => 'Call Karte',
	'magic_call_intro' => 'Mitteilung an deine Freunde auf ein bestimmtes Thema senden.',

	'magic_coupon' => 'Gutscheine',
	'magic_coupon_intro' => 'Kauf von Requisiten f&uuml;r eine bestimmte Anzahl an Punkte.',

	'magic_frame' => 'Frame',
	'magic_frame_intro' => 'Dein Frame auf ein Foto hinzuf&uuml;gen.',

	'magic_bgimage' => 'Hintergrund',
	'magic_bgimage_intro' => 'Hintergrund auf ein ausgew&auml;hltes Objekt hinzuf&uuml;gen.',

	'magic_doodle' => 'Graffiti Board',
	'magic_doodle_intro' => 'Nachrichten, Kommentare, etc. &uuml;ber das Graffiti-Board verwenden.',

	'magic_anonymous' => 'Anonym Karte',
	'magic_anonymous_intro' => 'Namen in bestimmten Bereichen anonym verwenden.',

	'magic_reveal' => 'Magic Mirror',
	'magic_reveal_intro' => 'Die wahre Identit&auml;t von einem anonymen Benutzer sehen.',

	'magic_license' => 'Magic Lizenz',
	'magic_license_intro' => 'Lizenz wird dem bezeichneten Requisiten Freunden pr&auml;sentiert werden.',

	'magic_detector' => 'Detector',
	'magic_detector_intro' => 'Roter Umschlag f&uuml;r die Erkundung des Speicherplatzes.',
	
//---------------------------	

	'click_icon1' => 'Passing',
	'click_icon2' => 'Geschockt',
	'click_icon3' => 'Handshake',
	'click_icon4' => 'Blume',
	'click_icon5' => 'Crap',
	'click_icon6' => 'Sch&ouml;n',
	'click_icon7' => 'Cool',
	'click_icon8' => 'Geschockt',
	'click_icon9' => 'Blume',
	'click_icon10' => 'Crap',
	'click_icon11' => 'Witzig',
	'click_icon12' => 'Verwirrt',
	'click_icon13' => 'Geschockt',
	'click_icon14' => 'Blume',
	'click_icon15' => 'Crap',

//-----------------------------------

	'db_data_added' => 'Standard-System-Daten Eintrag abgeschlossen. Weiter zum n&auml;chsten Schritt.',

	'db_data_added_intro' => 'Programmdaten die Installation abgeschlossen!<br><br>
		Schlie&szlig;lich bitte noch deinen UCenter Benutzernamen und dein Passwort eingeben
		<br>danach &ouml;ffnet sich dein Space automatisch,
		und legt einen Administrator fest!',

	'admin_username' => 'Benutzername',

	'admin_password' => 'Passwort',

	'admin_account_create' => 'Create Administrator',

//-------------------------------

	'install_title' => 'UCenter Home installation',
	'enter'		=> 'Gib bitte ein:',//'Enter:'
	'install_step1' => '1.Installation beginnt',
	'install_step2' => '2.UCenter Informationen setzen',
	'install_step3' => '3.Datenbank-Verbindungsinformationen',
	'install_step4' => '4.Erstellen der Datenbank-Struktur',
	'install_step5' => '5.Standard-Daten einf&uuml;gen',
	'install_step6' => '6.Installation ist abgeschlossen',

//---------------------------

	'go_back' => 'Zur&uuml;ck zum vorherigen Schritt',

	'wait_please' => 'Bitte warten...',

	'continue_next_step' => 'Weiter zum n&auml;chsten Schritt',


);