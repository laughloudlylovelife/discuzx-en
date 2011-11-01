<?php
/*
	[UCenter Home] (C) 2007-2009 Comsenz Inc.
	$Id: lang_cpmessage.php 12878 2009-07-24 05:59:38Z xupeng $

	AdminCP Messages Language Sentences

	Translated by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(
//common
	'do_success' => 'Erfolgreich ausgef&uuml;hrt',

//admincp.php
	'enter_the_password_is_incorrect' => 'Falsches Passwort. Bitte nocheinmal versuchen',
	'excessive_number_of_attempts_to_sign' => 'Du hast versucht den Admin Bereich mehr als 3 Mal in 30 min. zu betreten. Bitte versuche es sp&auml;ter noch einmal. ',

//admincp.php

//admin/admincp_ad.php
	'no_authority_management_operation' => 'Sorry. Du besitzt keinen Zugriff auf diese Anwendung.',
	'please_check_whether_the_option_complete_required' => 'Bitte &uuml;berpr&uuml;fe ob diese Option vollst&auml;ndig ist',
	'please_choose_to_remove_advertisements' => 'Bitte etwas ausw&auml;hlen um zu l&ouml;schen',
	'no_authority_management_operation_edittpl' => 'Aus Gr&uuml;nden der Sicherheit kann nur der Ersteller diese Funktion nutzen.',
	'no_authority_management_operation_backup' => 'Aus Gr&uuml;nden der Sicherheit kann nur der Ersteller die Datenbank reparieren.',

//admin/admincp_album.php
	'at_least_one_option_to_delete_albums' => 'Bitte ein Album ausw&auml;hlen um es zu l&ouml;schen',

//admin/admincp_backup.php
	'data_import_failed_the_file_does_not_exist' => 'Daten Import fehlgeschlagen. Die Datei existiert nicht.',
	'start_transferring_data' => 'Daten Transfair Starten.',
	'wrong_data_file_format_into_failure' => 'Fehler auf falschen Datenformat.',
	'documents_were_incorrect_length' => 'Nicht korrekte L&auml;nge des Datei Namens.',
	'backup_table_wrong' => 'Backup Tabelle falsch.',
	'failure_writes_the_document_check_file_permissions' => 'Fehler beim beschreiben der Datei. Bitte Berechtigungen &uuml;berpr&uuml;fen.',
	'successful_data_compression_and_backup_server_to' => 'Daten Kompression und Backup erfolgreich!',
	'backup_file_compression_failure' => 'Sorry. Kompression und Backup fehlegeschlagen.',
	'shell_backup_failure' => 'Shell Backup fehlgeschlagen.',
	'data_file_does_not_exist' => 'Sorry. Daten Datei existiert nicht.',
	'the_volumes_of_data_into_databases_success' => 'Erfolgreicher Import des Inhalts der Daten auf die Datenbank.',
	'data_file_does_not_exist' => 'Sorry, die Daten Datei existiert nicht.',
	'data_file_format_is_wrong_not_into' => 'Falsches Daten Format. Kann Daten nicht importieren.',
	'directory_does_not_exist_or_can_not_be_accessed' => 'Verzeichniss existiert nicht oder es kann daruf nicht zugegriffen werden.',
	'vol_backup_database' => 'Inhalt Backup Datenbank.',
	'complete_database_backup' => 'Datenbank Backup komplettiert.',
	'decompress_data_files_success' => 'Daten Dateien erfolgreich dekomprimiert.',
	'data_files_into_success' => 'Daten Dateien erfolgreich importiert.',

//admin/admincp_block.php
	'correctly_completed_module_name' => 'Bitte korrekten Modul Namen eingeben.',
	'a_call_to_delete_the_specified_modules_success' => 'Ausgew&auml;hltes Modul erfolgreich gel&ouml;scht.',
	'designated_data_transfer_module_does_not_exist' => 'Gew&auml;hltes Datentransfer-Modul ist nicht vorhanden.',
	'sql_statements_can_not_be_completed_for_normal' => 'SQL Error. <br> Server Feedback:<br>ERROR: \\1<br>ERRNO. \\2',
	'enter_the_next_step' => 'Weiter zum n&auml;chsten Schritt.',
	'choose_to_delete_the_data_transfer_module' => 'W&auml;hle ein Daten Modul aus um es l&ouml;schen.',

//admin/admincp_blog.php
	'the_correct_choice_to_delete_the_log' => 'Bitte w&auml;hle ein Protokoll aus um es zu l&ouml;schen',
	'the_correct_choice_to_add_topic' => 'Empfehlen Sie den benannten Hot Spot eine Fehlermeldung, &uuml;berpr&uuml;fen Sie bitte den korrekten Betrieb',
	'add_topic_success' => 'Zu den Hot Spots Empfohlen abgeschlossen, was zu \ \ einem relevanten Entwicklungen',

//admin/admincp_cache.php

//admin/admincp_censor.php

//admin/admincp_comment.php
	'the_correct_choice_to_delete_comments' => 'Bitte w&auml;hle einen Kommentar aus um ihn zu l&ouml;schen',
	'choice_batch_action' => 'Bitte w&auml;hle die Art der Operation die durchgef&uuml;hrt werden soll',

//admin/admincp_config.php
	'ip_is_not_allowed_to_visit_the_area' => 'Derzeitige IP ist ist nicht befugt um diesen Bereich zu betreten.',
	'the_prohibition_of_the_visit_within_the_framework_of_ip' => 'Deine jetztige IP ist in der Verbots-Liste.',
	
	'config_uc_dir_error' => 'UCenter Konfiguration Error',

//admin/admincp_credit.php
	'rules_do_not_exist_points' => 'Die Regel der nicht vorhanden Punkte',
	
//admin/admincp_cron.php
	'designated_script_file_incorrect' => 'Gew&auml;hlte Scriptdatei falsch.',
	'implementation_cycle_incorrect_script' => 'Durchf&uuml;hrungszyklus-Skript falsch.',

//admin/admincp_item.php
	'choose_to_delete_events' => 'Ein Event ausw&auml;hlen um es zu l&ouml;schen.',

//admin/admincp_mtag.php
	'choose_to_delete_the_columns_tag' => 'W&auml;hle ein Spalten-Tag um es zu l&ouml;schen.',
	'designated_to_merge_the_columns_do_not_exist' => 'Ausgew&auml;hlte Spalten existieren nicht.',
	'the_successful_merger_of_the_designated_columns' => 'Ausgew&auml;hlte Spalten erfolgreich zusammengef&uuml;hrt.',
	'columns_option_to_merge_the_tag' => 'Bitte w&auml;hle eine Spalte um sie zusammenzuf&uuml;hren.',
	'lock_open_designated_columns_tag_success' => 'Sperren/&Ouml;ffnen der ausgew&auml;hlten Spalten-Tags erfolgreich.',
	'recommend_designated_columns_tag_success' => 'Empfohlen / stornieren die angegebene Gruppe erfolgreich',
	'choose_to_operate_columns_tag' => 'W&auml;hle ein Spalten-Tag um es auszuf&uuml;hren.',
	
	'failed_to_change_the_length_of_columns' => 'Fehler beim &auml;ndern der L&aum;nge der Spalte',

//admin/admincp_pic.php
	'choose_to_delete_pictures' => 'Bitte w&auml;hle ein Bild um es zu l&ouml;schen.',

//admin/admincp_post.php
	'choose_to_delete_the_topic' => 'Bitte w&auml;hle ein Thema um es zu l&ouml;schen.',

//admin/admincp_profield.php
	'there_is_no_designated_users_columns' => 'Die ausgew&auml;hlte Benutzerspalte existiert nicht.',
	'choose_to_delete_the_columns' => 'Bitte w&auml;hle eine Spalte um sie zu l&ouml;schen.',
	'have_one_mtag' => 'Delete failed, you need to keep at least one club',
	
//admin/admincp_poll.php
	'the_correct_choice_to_delete_the_poll' => 'Bitte korrigiere die Auswahl von mindestens einer Stimme zu entfernen',

//admin/admincp_report.php
	'the_right_to_report_the_specified_id' => 'Bitte melde die korrekte ID',

//admin/admincp_share.php
	'please_delete_the_correct_choice_to_share' => 'Bitte w&auml;hle ein Share um es zu l&ouml;schen.',

//admin/admincp_space.php
	'designated_users_do_not_exist' => 'Gew&auml;hlte Benutzer existieren nicht.',
	'choose_to_delete_the_space' => 'Bitte Space w&auml;hlen um ihn zu l&ouml;schen.',
	'not_have_permission_to_operate_founder' => 'Du hast keine Berechtigung um es als Founder auszuf&uuml;hren.',
	'uc_error' => 'UC Kommunikations Error.',

//admin/admincp_stat.php
	'choose_to_reconsider_statistical_data_types' => 'Bitte w&auml;le die statistischen Daten um es neu zu berechnen',
	'data_processing_please_wait_patiently' => '<a href="\\1"> in Arbeit ( \\2 ), bitte warten...</a> (<a href="\\3"> Force Stop </a>)',

//admin/admincp_tag.php
	'choose_to_delete_the_tag' => 'Bitte ein Tag ausw&auml;hlen um es zu l&ouml;schen.',
	'to_merge_the_tag_name_of_the_length_discrepancies' => 'L&auml;nge des ausgew&auml;hlten TAG scheint ung&uuml;ltig (1~30 Zeichen)',
	'the_tag_choose_to_merge' => 'Bitte w&auml;hle ein Tag um es zusammenzuf&uuml;hren.',
	'choose_to_operate_tag' => 'Bitte w&auml;hle ein Tag zum ausf&uuml;hren.',

//admin/admincp_template.php
	'designated_template_files_can_not_be_restored' => 'Die benannten Template-Dateien k&ouml;nnen nicht wiederhergestellt werden.',
	'template_files_editing_failure_check_directory_competence' => 'Template-Dateien bearbeiten fehlgeschlagen. Bitte &uuml;berpr&uuml;fe die Berechtigungen des Verzeichnisses. ',

//admin/admincp_thread.php
	'choosing_to_operate_the_topic' => 'Bitte w&auml;hle ein Thema zum asuf&uuml;hren.',

//admin/admincp_usergroup.php
	'user_group_does_not_exist' => 'Diese Benutzergruppe existiert nicht.',
	'user_group_were_not_empty' => 'Benutzer-Gruppe kann nicht leer sein.',
	'integral_limit_duplication_with_other_user_group' => 'Punkte Limit Konflikt mit anderen Benutzer-Gruppen.',
	'system_user_group_could_not_be_deleted' => 'System Benutzergruppe kann nicht gel&ouml;scht werden.',
	'integral_limit_error' => 'Punkte Limit Error, nicht weniger als 999999999 und nicht gr&ouml;sser als -999999998',
	
//admin/admincp_userapp.php
	'my_register_sucess' => 'Benutzer Anwendungen ge&ouml;ffnet',
	'my_register_error' => 'Fehlerhaftes &ouml;ffnen der Beutzer-Anwendungen<br>\\2 (ERRCODE:\\1)<br><br><a href="http://www.discuz.net/index.php?gid=141" target="_blank">Bitte besuche das Forum zur Hilfe.</a>。',
	'sitefeed_error' => 'Bitte gib den korrekten RSS-Feed und Titel ein',
	
//admin/admincp_event.php
	'choose_to_delete_the_columns_event' => 'Bitte w&auml;hle die Aktivit&auml;ten, die du l&ouml;schen m&ouml;chtest',
	'choose_to_grade_the_columns_event' => 'Bitte w&auml;hle die Aktivit&auml;ten, die im neuen Staat liegt, kann nicht die gleiche sein wie der urspr&uuml;nglichen Zustand',
	'have_no_eventclass' => 'Nicht l&ouml;schen, halte bitte mindestens eine Systematik der Wirtschaftszweige',
	'poster_only_jpg_allowed' => 'Weil dein Server keine generierten Bilder unterst&uuml;tzt, kannst du hier Bilder nur im jpg-Format hochladen'

);

