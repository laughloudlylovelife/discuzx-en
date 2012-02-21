<?php
//------------------------------------------------------
// INTERNATIONAL UCenter v.1.6.0 (Multilingual)
// by Valery Votintsev, codersclub.org
//------------------------------------------------------
// Based on UCenter 1.6.0, (c) Comsenz.inc, discuz.net
//------------------------------------------------------
// German Language Pack
// by Coldcut - http://www.cybertipps.com
//------------------------------------------------------

define('UC_VERNAME', 'International');

$lang = array(

	'SC_GBK'	=> 'Vereinfachte chinesische Version',
	'TC_BIG5'	=> 'Traditionelles Chinesisch',
	'SC_UTF8'	=> 'UTF8 Simplified Chinese Version',
	'TC_UTF8'	=> 'Traditionelles Chinesisch UTF8-Version',
	'EN_ISO'	=> 'German ISO8859',
	'EN_UTF8'	=> 'German UTF-8',

	'title_install' => SOFT_NAME.' Installations-Assistent',
	'agreement_yes'	=> 'Ich stimme zu',
	'agreement_no'	=> 'Ich stimme nicht zu',
	'notset'	=> 'Unlimitiert',

	'message_title'		=> 'Tipps',
	'error_message'		=> 'Error Msg',
	'message_return'	=> 'Zur&uuml;ck',
	'return'		=> 'Zur&uuml;ck',
	'install_wizard'	=> 'Installations-Assistent',
	'config_nonexistence'	=> 'Config Datei existiert nicht',
	'nodir'			=> 'Verzeichniss existiert nicht',
	'short_open_tag_invalid'	=> 'Bitte setze short_open_tag auf On in der php.ini, ansonsten kann die Installation nicht fortgef&uuml;hrt werden.',
	'redirect'			=> 'Der Browser leitet automatisch weiter.<br>Falls er nicht automatisch weiterleitet, bitte hier klicken',

	'database_errno_2003'	=> 'Kann keine Verbindung zur Datenbank herstellen, bitte &uuml;berpr&uuml;fen ob sie startet und ob die Url stimmt',
	'database_errno_1044'	=> 'Kann keine neue Datenbank erstellen, bitte &uuml;berpr&uuml;fe ob der Datenbankname korrekt ist',
	'database_errno_1045'	=> 'Keine Verbindung zur Datenbank, &uuml;berpr&uuml;fe ob der Datenbankbenutzername und das Passwort korrekt sind.',
	'database_errno_1064'	=> 'SQL Satz illegal',

	'dbpriv_createtable'	=> 'Keine Berechtigung um CREATE TABLE auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_insert'		=> 'Keine Berechtigung um INSERT auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_select'		=> 'Keine Berechtigung um SELECT auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_update'		=> 'Keine Berechtigung um UPDATE auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_delete'		=> 'Keine Berechtigung um DELETE auszuf&uuml;hren, es kann nicht fortgesetzt werden',
	'dbpriv_droptable'	=> 'No privilege to DROP TABLE auszuf&uuml;hren, es kann nicht fortgesetzt werden',

	'db_not_null'		=> 'Sie haben UCenter in der selben Datenbank erstellt, wenn Sie fortfahren werden die vorhandenen Daten &uuml;berschrieben.',
	'db_drop_table_confirm'	=> 'Alle vorhandenen Daten werden &uuml;berschrieben, sind Sie sicher das Sie fortfahren m&ouml;chten?',

	'writeable'		=> 'Beschreibbar',
	'unwriteable'		=> 'Nicht Beschreibbar',
	'old_step'		=> 'Zur&uuml;ck',
	'new_step'		=> 'Weiter',

	'database_errno_2003'	=> 'Keine Verbindung zur Datenbank, bitte &uuml;berpr&uuml;fen ob sie startet und ob die Url stimmt',
	'database_errno_1044'	=> 'Kann keine neue Datenbank erstellen, bitte &uuml;berpr&uuml;fe ob der Datenbankname korrekt ist',
	'database_errno_1045'	=> 'Keine Verbindung zur Datenbank, &uuml;berpr&uuml;fe ob der Datenbankbenutzername und das Passwort korrekt sind',

	'step_env_check_title'	=> 'Start Up',
	'step_env_check_desc'	=> 'Env & Einstellungs-Check',
	'step_db_init_title'	=> 'Installiere Datenbank',
	'step_db_init_desc'	=> 'Installiere Datenbank und Administrator-Konfiguration',
	
	'step1_file'		=> 'Dir & File',
	'step1_need_status'	=> 'Erforderlich',
	'step1_status'		=> 'Aktuell',
	'not_continue'		=> 'Was in roter Farbe angezeigt wird, bitte &auml;ndern und erneut versuchen.',

	'tips_dbinfo'		=> 'Datenbank Information',
	'tips_dbinfo_comment'	=> '',
	'tips_admininfo'	=> 'Administrator Information',
	'tips_admininfo_comment'	=> 'Bitte das Founder Passwort des UCenter merken, es wird f&uuml;r das Login im UCenter ben&ouml;tigt.',
	'step_ext_info_title'	=> 'Installiert',
	'step_ext_info_desc'	=> 'Hier klicken um einzuloggen.',

	'ext_info_succ'		=> 'Installation war Erfolgreich',
	'install_locked'	=> 'Die Installation wurde durch eine fr&uuml;here Installation gesperrt, bitte l&ouml;schen Sie<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'Das obere Problem muss gel&ouml;st werden bevor Sie weiterfahren k&ouml;nnen',

	'step_app_reg_title'	=> 'Setup Umgebung',
	'step_app_reg_desc'	=> 'Erkennung von Server-Umgebung und Anforderung von UCenter',
	'tips_ucenter'	=> 'Bitte f&uuml;lle die relaventen Infos von UCenter aus',
	'tips_ucenter_comment'	=> 'Du ben&ouml;tigst die Installation des UCenter bevor andere Skripte wie UCenter Home oder Discuz installiert werden k&ouml;nnen.',

	'advice_mysql_connect'		=> 'Bitte stelle sicher, dass MySQL korrekt ist',
	'advice_fsockopen'		=> 'Du musst allow_url_fopen in der php.ini erlauben, wende dich bitte an deinem Provider, um sicherzustellen, dass es eingeschaltet ist',
	'advice_gethostbyname'		=> 'gethostbyname Funktion wird in der php.ini eingestellt, bitte wende dich an deinem Provider um Sicherzustellen das es eingeschaltet ist',
	'advice_file_get_contents'	=> 'allow_url_fopen Funktion wird in der php.ini, bitte wende dich an deinem Provider um Sicherzustellen das es eingeschaltet ist',
	'advice_xml_parser_create'	=> 'XML Funktion wird in der php config, bitte wenden dich an deinem Provider um Sicherzustellen das es eingeschaltet ist',

	'ucurl'		=> 'UCenter URL',
	'ucpw'		=> 'UCenter Founder Pwd',

	'tips_siteinfo'	=> 'Webseiten Information',
	'sitename'	=> 'Webseiten Name',
	'siteurl'	=> 'Webseiten URL',

	'forceinstall'			=> 'Installation erzwingen',
	'dbinfo_forceinstall_invalid'	=> 'Du kannst das Pr&auml;fix jederzeit &auml;ndern um keine vorhandenen Daten zu verlieren. Wenn die Datenbank das selbe Pr&auml;fix enth&auml;lt werden die Daten &uuml;berschrieben.',

	'click_to_back'		=> 'Hier klicken um zur&uuml;ckzukehren',
	'adminemail'		=> 'Admin Email',
	'adminemail_comment'	=> 'Dient zum Senden von Skriptfehler Berichten',
	'dbhost_comment'	=> 'DB Server Adresse, meist localhost',
	'tablepre_comment'	=> 'Bitte Pr&auml;fix &auml;ndern wenn mehrere Installationen erfolgen sollen',
	'forceinstall_check_label'	=> 'Installation erzwingen, ich m&ouml;chte die alten Daten l&ouml;schen!!!',

	'uc_url_empty'		=> 'UCenter URL ist leer, bitte gehe zur&uuml;ck um eine einzugeben',
	'uc_url_invalid'	=> 'Ung&uuml;ltige URL',
	'uc_url_unreachable'	=> 'UCenter URL ist falsch, bitte &uuml;berpr&uuml;fen',
	'uc_ip_invalid'		=> 'Kann Domain nicht erreichen, bitte IP eintragen',
	'uc_admin_invalid'	=> 'Falsches UC Founder Passwort, bitte nochmal versuchen',
	'uc_data_invalid'	=> 'Kommunikation Error, bitte &uuml;berpr&uuml;fe die UC URL',
	'ucenter_ucurl_invalid'	=> 'UC URL leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'ucenter_ucpw_invalid'	=> 'UC Founder Passwort leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'siteinfo_siteurl_invalid'	=> 'URL leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'siteinfo_sitename_invalid'	=> 'Webseiten Name leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbhost_invalid'		=> 'DB Server leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbname_invalid'		=> 'DB Server Name leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbuser_invalid'		=> 'DB Benutzername leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_dbpw_invalid'		=> 'DB Passwort leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_adminemail_invalid'	=> 'Admin eMail leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'dbinfo_tablepre_invalid'	=> 'Ung&uuml;ltiges Pr&auml;fix, darf nicht mit Nummern beginnen, oder "." enthalten',
	'admininfo_username_invalid'	=> 'Admin Benutzername leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'admininfo_email_invalid'	=> 'Admin Email leer oder falsches Format, bitte &uuml;berpr&uuml;fen',
	'admininfo_ucfounderpw_invalid'	=> 'Admin Passwort leer, bitte ausf&uuml;llen',
	'admininfo_ucfounderpw2_invalid'	=> 'Passwort funktioniert nicht, bitte &uuml;berpr&uuml;fen',

	'username'		=> 'Admin Benutzernamename',
	'email'			=> 'Admin Email',
	'password'		=> 'Admin Pwd',
	'password_comment'	=> 'Admin Pwd darf nicht leer sein',
	'password2'		=> 'Pwd wiederholen',

	'admininfo_invalid'		=> 'Admin Info nicht Komplett, bitte &uuml;berpr&uuml;fe den Admin Benutzernamen, Pwd, und eMail',
	'dbname_invalid'		=> 'Datenbank Name leer, bitte den korrekten Datenbanknamen eingeben',
	'admin_username_invalid'	=> 'Ung&uuml;ltiger Benutzername, L&auml;nge kann mehr als 15 Zeichen, alphanumerische, oder kann auch Sonderzeichen enthalten',
	'admin_password_invalid'	=> 'Passwort stimmt nicht &uuml;berein, bitte erneut versuchen',
	'admin_email_invalid'		=> 'Ung&uuml;ltige Email, jemand anderer benutzt sie oder existiert nicht, bitte verwenden Sie eine Andere',
	'admin_invalid'			=> 'Administrator Info nicht Komplett, bitte alles ausf&uuml;llen',
	'admin_exist_password_error'	=> 'Benutzername ist bereits vorhanden, wenn Sie ihn als Forum Admin m&ouml;chten, f&uuml;llen Sie bitte das richtige Passwort aus oder &auml;ndern sie den Benutzernamen',

	'tagtemplates_subject'	=> 'Thema',
	'tagtemplates_uid'	=> 'Benutzer ID',
	'tagtemplates_username'	=> 'Poster',
	'tagtemplates_dateline'	=> 'Datum',
	'tagtemplates_url'	=> 'Url',

	'uc_version_incorrect'	=> 'UCenter Version nicht aktuell, verwende das Update von http://www.msg2me.com/',
	'config_unwriteable'	=> 'Kann die config Datei nicht beschreiben, bitte setzte den Chmod der config.inc.php auf 777',

	'install_in_processed'	=> 'Installiere ...',
	'install_succeed'	=> 'User Center wurde installiert, bitte hier klicken um fortzufahren',
	'license'		=> '<div class="license"><h1>Lizenz-Vereinbarung (deutsch &Uuml;bersetzt)</h1>
	
<p><p>License Agreements is in Chinese, left intact deliberately, please use google translate it. If you want to continue, click I Agree, if you dont agree with the license agreements just click I Dont Agree.</p>

<p>Copyright (c) 2001-2010, Hong Sing Wunsch (Beijing) Technology Co., Ltd. Alle Rechte vorbehalten</p>

<p>Vielen Dank, dass Sie sich f&uuml;r UCenter Produkte entschieden haben. Wir hoffen, dass sich unsere Anstrengungen gelohnt haben, um Ihnen eine schnelle, leistungsf&auml;hige und effiziente L&ouml;sung zur Erstellung Ihrer Website zu Verf&uuml;gung stellen zu k&ouml;nnen.</p>

<p>Sing Wunsch (Beijing) Technology Co., Ltd UCenter Produkte f&uuml;r Entwickler, eines unabh&auml;ngigen Produkts UCenter Urheberrechtsinhabers. Sing Wunsch (Beijing) Technology Co., Ltd auf http://www.comsenz.com, UCenter offizielle Website http://www.discuz.com, UCenter offizielles Forum auf http://www.discuz.net.</p>

<p>Copyright UCenter People\'s Republic of China - Staat Copyright Bureau, Copyright-Gesetze und internationale Konventionen zum Schutz. User: eine Person oder Organisation, unabh&auml;ngig davon, ob Gewinn oder nicht (auch zum Zweck des Studiums und der Forschung), sollte diese Vereinbarung sorgf&auml;ltig lesen, verstehen, und die Einhaltung aller Bestimmungen dieses Abkommens akzeptieren, bevor sie beginnen mit UCenter Software zu arbeiten.</p>

<p>Die Anwendung der Lizenz-Vereinbarung gilt nur f&uuml;r UCenter 1.x-Version, (Beijing) Technology Co. Ltd erh&auml;lt einen Lizenzvertrag f&uuml;r die Benutzung der endg&uuml;ltigen Auslegung.</p>

<h3>I. Das Recht auf Lizenz-Vereinbarung</h3>
<ol>
<li>Mit dem Endbenutzer-Lizenzvertrag k&ouml;nnen Sie, auf der Grundlage der Anwendung dieser Software, f&uuml;r nicht-kommerzielle Zwecke, und ohne Software-Lizenzgeb&uuml;hren, dieses Produkt nutzen.</li>
<li>Anhaltend an diese Bestimmungen in der Vereinbarung, d&uuml;rfen Sie den Quellcode (sofern verf&uuml;gbar) oder die Schnittstelle f&uuml;r Ihre Website-Anforderungen &auml;ndern.</li>
<li>Sie haben zur Nutzung der Software die Verpflichtung, Texte und Informationen des Eigentums anzuerkennen, unabh&auml;ngig von der Verpflichtung zum Inhalt und Gegenstande im Zusammenhang mit rechtlichen Verpflichtungen.</li>
<li>Autorisierter Zugang zu kommerziellen Software f&uuml;r kommerzielle Anwendungen, ist in der gleichen Zeit auf der Grundlage der Art, die von der Beh&ouml;rde, die in der Zeit der technischen Unterst&uuml;tzung, f&uuml;r den Inhalt der Art und Weise. Business autorisierte Benutzer genießen ihre Ansichten spiegeln die Macht der Ansichten wird der vorrangig zu ber&uuml;cksichtigen ist, aber nicht angenommen werden m&uuml;ssen, um sicherzustellen, dass die Verpflichtungen eingehalten werden.</li>
</ol>

<h3>II. Die Zustimmung der Pflichten und Grenzen</h3>
<ol>
<li>Business wurde nicht genehmigt, bevor die Software f&uuml;r kommerzielle Zwecke (einschließlich, aber nicht beschr&auml;nkt auf Corporate Websites, Business-Website oder Kopf-Profit-Site Gewinn) verwendet werden darf. F&uuml;r den Erwerb von Lizenzen, besuchen Sie bitte http://www.discuz.com oder rufen Sie 8610-51657885 (China) an, dort erfahren Sie mehr.</li>
<li>Diese Software darf nicht vervielf&auml;ltigt, vermietet, verkauft oder anderweitig angeboten werden.</li>
<li>In jedem Fall heißt das, egal, welcher Nutzung, unabh&auml;ngig davon, ob einer &Auml;nderung, wie die Verwendung von UCenter oder Teile davon, ohne die schriftliche Genehmigung zur Entfernung der Fußleiste des UCenter, um den Namen und die Sing (Beijing) Technology Co., Ltd im Rahmen der Website (http://www.comsenz.com, http://www.discuz.com oder http://www.discuz.net) muss der Link beibehalten werden.</li>
<li>UCenter wurde ganz oder teilweise auf der Grundlage f&uuml;r die Entwicklung daraus abgeleiteter Version, eine modifizierte Version von oder f&uuml;r die Umverteilung von Drittanbieter-Versionen.</li>
<li>Wenn Sie den Bestimmungen dieses Abkommens nicht zustimmen, wird die Lizenz beendet, dem Lizenznehmer das Recht entzogen, und hat mit der entsprechenden rechtlichen Verantwortung zu rechnen.</li>
</ol>

<h3>III. Die Sicherheit und Haftung</h3>
<ol>
<li>An der Software und den Dokumenten gibt es keine implizite Garantie f&uuml;r die Entsch&auml;digung in irgendeiner Form.</li>
<li>F&uuml;r die freiwillige Nutzung dieser Software sowie aller Produkte tragen Sie die Risiken. Wir versprechen keine technische Unterst&uuml;tzung oder bieten Garantien.</li>
<li>Sing Wunsch (Beijing) Technology Co., Ltd Software, f&uuml;r Gegenst&auml;nde oder Informationen.</li>
</ol>

<p>UCenter der Endbenutzer-Lizenzvertrag, Business-Lizenz und die Details der technischen Dienste, indem erhalten sie eine exklusive UCenter offizielle Website. Sing Wunsch (Beijing) Technology Co., Ltd macht keine vorherige Ank&uuml;ndigung, die Lizenzvereinbarung und die Preise zu &auml;ndern, die aktuelle Vereinbarung oder die Preis Liste der &Auml;nderungen gibt es seit dem Datum des Inkrafttretens der neuen autorisierten Benutzer.</p>

<p>Eine elektronische Kopie der Lizenz-Vereinbarung, wie die Form einer schriftlichen Vereinbarung von beiden Parteien unterzeichnet, wie eine vollst&auml;ndige und gleichwertige rechtliche Wirkung. Sobald Sie mit der Installation beginnen gilt UCenter als vollst&auml;ndig und Sie akzeptieren die Bestimmungen dieses Abkommens, in den Genuss der Befugnisse durch diese Bestimmungen in der gleichen Zeit, von den jeweiligen Besonderheiten und Einschr&auml;nkungen. Lizenzvertrag nicht in den Anwendungsbereich der Handlungen, wird eine direkte Verletzung der Lizenz-Vereinbarung und eine Verletzung, haben wir das Recht, das Mandat zu jeder Zeit, bestellt, um die Sch&auml;den, und behalten die Zust&auml;ndigkeit zur Verantwortung gezogen werden.</p></div>',

	'uc_installed'		=> 'Du hast UCenter zuvor schon installiert, wenn du es nocheinmal installieren m&ouml;chtest, l&ouml;sche bitte data/install.lock ',
	'i_agree'		=> 'Ich habe die Bestimmungen zur oben genannten Lizenz gelesen und stimme zu',
	'supportted'		=> 'Unterst&uuml;tzt',
	'unsupportted'		=> 'Nicht Unterst&uuml;tzt',
	'max_size'		=> 'Maximale Gr&ouml;sse',
	'project'		=> 'Projekt',
	'ucenter_required'	=> 'UCenter Konfiguration erforderlich',
	'ucenter_best'		=> 'UCenter Optimal',
	'curr_server'		=> 'Aktuell',
	'env_check'		=> 'Env Check',
	'os'			=> 'OS',
	'php'			=> 'PHP Version',
	'attachmentupload'	=> 'Anlage',
	'unlimit'		=> 'Kein Limit',
	'version'		=> 'Version',
	'gdversion'		=> 'GD Lib',
	'allow'			=> 'Erlaube',
	'unix'			=> 'Unix Typ',
	'diskspace'		=> 'Festplattenspeicher',
	'priv_check'		=> 'Dire  & Datei Einstellungs-Check',
	'func_depend'		=> 'Function depend check',
	'func_name'		=> 'Funktion Name',
	'check_result'		=> 'Resultat',
	'suggestion'		=> 'Vorschlag',
	'advice_mysql'		=> 'Bitte &uuml;berpr&uuml;fe, ob das mysql-Modul geladen wurde',
	'advice_fopen'		=> 'Du musst allow_url_fopen in der php.ini einstellen, bitte kontaktiere deinen Provider um sicher zu gehen das es erlaubt ist',
	'advice_file_get_contents'	=> 'Du musst allow_url_fopen in der php.ini einstellen, bitte kontaktiere deinen Provider um sicher zu gehen das es erlaubt ist',
	'advice_xml'		=> 'Diese Funktion ben&ouml;tigt XML Support in PHP. Bitte kontaktiere deinen Provider um sicher zu gehen das es erlaubt ist',
	'none'			=> 'Nichts',

	'dbhost'	=> 'DB Server',
	'dbuser'	=> 'DB Benutzername',
	'dbpw'		=> 'DB Passwort',
	'dbname'	=> 'DB Name',
	'tablepre'	=> 'Tabellen Pr&auml;fix',

	'ucfounderpw'	=> 'Founder Pwd',
	'ucfounderpw2'	=> 'Pwd wiederholen',

	'create_table'	=> 'Tabelle erstellen',
	'succeed'	=> 'Erfolgt',
);