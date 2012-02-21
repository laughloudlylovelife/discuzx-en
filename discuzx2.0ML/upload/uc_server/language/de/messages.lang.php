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

$lang = array(
	'please_login'		=> 'Bitte noch einmal einloggen',
	'receiver_no_exists'	=> 'Empf&auml;nger existiert nicht, bitte anderen eingeben',
	'PM_save_succeed'	=> 'Entw&uuml;rfe speichern',
	'PM_send_succeed'	=> '$sent PM erfolgreich versendet!',
	'PM_send_announce_succeed'	=> '&Ouml;ffentliche Nachricht erfolgreich versendet!',
	'PM_send_ignore'	=> 'PM konnte nicht gesendet werden!',
	'PM_delete_succeed'	=> 'PM erfolgreich gel&ouml;scht!',
	'PM_delete_invalid'	=> 'L&ouml;schen der PM fehlgeschlagen!',
	'PM_unread'		=> 'Als ungelesen markieren',
	'blackls_updated'	=> 'Blacklist aktualisieren',
	'pm_kickmember_succeed'	=> 'Mitglied erfolgreich verbannt ',
	'pm_appendmember_succeed'	=> 'Mitglieder erfolgreich den Gruppenanwendungen hinzugef&uuml;gt ',
	'pm_appendmember_invalid'	=> 'Mitglied hinzuf&uuml;gen fehlgeschlagen',
	'pm_send_chatpmmemberlimit_error'	=> 'Maximale Anzahl der Mitglieder erreicht',
	'pm_send_pmfloodctrl_error'		=> 'Interval f&uuml;r Kurznachrichten zu kurz. Bitte sp&auml;ter noch einmal versuchen.',
	'pm_send_privatepmthreadlimit_error'	=> 'Innerhalb 24 Stunden mehr als 2 Sitzungen',
	'pm_send_chatpmthreadlimit_error'	=> 'Innerhalb 24 Stunden das Maximum an Gruppen-Sitzungen erreicht',
	'pm_clear_processing'		=> 'Prozess von current nach next',
	'pm_clear_succeed'		=> 'Erfolgreich ',
	'pm_delete_noselect'		=> 'Bitte Kurznachrichten-Prozess w&auml;hlen.',

	'db_export_filename_invalid'	=> 'Der Name wurde falsch eingegeben oder existiert nicht, bitte &auml;ndern!',
	'db_export_file_invalid'	=> 'Das exportieren der Datenbank ist fehlgeschlagen, bitte die Berechtigung f&uuml;r den Datei Backup Ordner &uuml;berpr&uuml;fen',
	'db_export_multivol_redirect'	=> 'Verschidene Volumen: Volumen $volume wurde erfolgreich exportiert, es wird automatisch in das n&auml;chste Volumen transferiert.',
	'db_export_multivol_succeed'	=> 'Gl&uuml;ckwunsch! Alle $volume wurden exportiert!',
	'db_import_multivol_succeed'	=> 'Importieren von mehreren Volumen erfolgreich!',
	'db_import_file_illegal'	=> 'Ung&uuml;ltige Datenbank: der Server erlaubt es nicht oder die Gr&ouml;sse ist nicht zul&auml;ssig!',
	'db_import_multivol_redirect'	=> '$volume wurde erfolgreich exportiert, es wird automatisch in das n&auml;chste Volumen transferiert.',
	'db_back_api_url_invalid'	=> 'Kann Backup für diese Anwendung nicht finden, kopiere /api/dbbak.php in den Ordner der Anwendung',
	'delete_dumpfile_success'	=> 'Dump Datei erfolgreich gel&ouml;scht',
	'delete_dumpfile_redirect'	=> 'Selbe Backups in #$apPMame gel&ouml;scht, selbe Backups in anderer Anwendungen werden vom System automatisch gel&ouml;scht',
	'dbback_error_code_1'		=> 'Kann Verzeichniss nicht erstellen',
	'dbback_error_code_2'		=> 'Backup Datei kann nicht beschrieben werden',
	'dbback_error_code_3'		=> 'sql Prozess Error',
	'dbback_error_code_4'		=> 'Verzeichniss ist leer oder existiert nicht',
	'dbback_error_code_5'		=> 'Keine Backup Datei im ausgew&auml;hlten Verzeichniss gefunden',
	'dbback_error_code_6'		=> 'Backup Datei fehlt',
	'dbback_error_code_7'		=> 'Backup Verzeichniss existiert nicht',
	'dbback_error_code_8'		=> 'Error beim l&ouml;schen des ausgew&auml;hlten Backups',
	'dbback_error_code_9'		=> 'Diese Art der Backup-Aplikation wird vom Backup-Interface nicht unterst&uuml;tzt',
	'undefine_error'		=> 'Fehler konnte nicht zugeordnet werden',

	'app_add_url_invalid'	=> 'Ung&uuml;ltige App url',
	'app_add_ip_invalid'	=> 'Ung&uuml;ltige IP Adresse',
	'app_add_name_invalid'	=> 'App-Name ist nicht g&uuml;ltig oder existiert bereits. Bitte anderen ausw&auml;hlen.',
	'read_plugin_invalid'	=> 'Ung&uuml;ltiges Plugin',

	'syncappcredits_updated'	=> 'Synchronisiere credits Einstellung unter den Anwendungen',

	'note_succeed'			=> 'Anmeldung gesendet',
	'note_false'			=> 'Senden der Anmeldung fehlgeschlagen',
	'no_permission_for_this_module'	=> 'Keine Berechtigung um das Modul zu bearbeiten',
	'admin_user_exists'		=> 'Benutzername existiert bereits, bitte einen anderen eingeben',

	'mail_succeed'		=> 'Mail wurde gesendet',
	'mail_false'		=> 'Senden der Mails fehlgeschlagen',
	
	'user_edit_noperm'	=> 'Keine Berechtigung um diesen Benutzer zu bearbeiten',

	'appid_invalid'			=> 'Ung&uuml;ltige App ID',
	'app_apifile_not_exists'	=> 'Datei #$apifile existiert nicht, bitte &uuml;berpr&uuml;fe den App Pfad',
	'app_apifile_too_low'		=> 'Api Datei #$apifile Version zu Niedrig',
	'app_path_not_exists'		=> 'Pfad existiert nicht, bitte &uuml;berpr&uuml;fen',
	'PM_send_seccode_error'		=> 'Error Sicherheits-Code',
	'PM_send_regdays_error'		=> 'Es ist nicht erlaubt PM in #$PMsendregdays Tage nach der Registrierung zu versenden',
	'PM_send_limit1day_error'	=> 'Du hast eine t&auml;gliches Limit um PMs zu versenden.',
	'PM_send_floodctrl_error'	=> 'Du sendest zu schnell, bitte warte eine Minute bevor du weitersendest',
	
	'file_check_failed'	=> 'Datei kann nicht &uuml;berpr&uuml;ft werden oder existiert nicht.',
);