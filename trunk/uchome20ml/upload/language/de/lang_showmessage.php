<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_showmessage.php 13183 2009-08-17 04:35:11Z xupeng $

	Common FrontEnd Messages Language Sentences

	Translated by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['msglang'] = array(

  'box_title' => 'News',

//common
	'do_success' => 'Erfolgreich ausgef&uuml;hrt',
	'no_privilege' => 'Du hast keine Berechtigung um diese Funktion auszuf&uuml;hren',
	'no_privilege_realname' => 'Nachdem du nicht deinen echten Namen verwendest, hast du nur Zugriff auf eingeschr&auml;nkte Funktionen. <a href="cp.php?ac=profile">Echten Namen hinzuf&uuml;gen</a>',
	'no_privilege_videophoto' => 'Du musst dich f&uuml;r der Annahme der Video-Zertifizierung anmelden, <a href="cp.php?ac=videophoto">Hier klicken f&uuml;r Video-Authentifizierung</a>',
	'no_open_videophoto' => 'Derzeit ist die Website f&uuml;r Video-Authentifizierung abgeschaltet',
  'is_blacklist' => 'Datenschutz-Einstellung in Kraft.',
	'no_privilege_newusertime' => 'Du bist ein neuer Benutzer, f&uuml;r die Ausf&uuml;hrung musst du \\1 Stunde warten',
	'no_privilege_avatar' => 'Um das Avatar zu erstellen, klick <a href="cp.php?ac=avatar">hier</a> um es festzulegen.',
	'no_privilege_friendnum' => 'Du ben&ouml;tigst \\1 Freunde daf&uuml;r, klick <a href="cp.php?ac=friend&op=find">hier</a> um Freunde hinzuzuf&uuml;gen.',
	'no_privilege_email' => 'Du musst daf&uuml;r deine E-Mail Adresse verifizieren und aktivieren verified, <a href="cp.php?ac=password">hier</a> klicken um sie zu aktivieren.',
  'uniqueemail_check' => 'Deine E-Mail-Adresse ist besetzt, versuche eine andere E-Mail',
	'uniqueemail_recheck' => 'Du m&ouml;chtest eine E-Mail Adresse verifizieren lassen die schon aktiviert wurde, bitte gib deine eigene Adresse ein um sie zu verifizieren',
	'you_do_not_have_permission_to_visit' => 'Der Zugang wurde dir Verboten',

//mt.php
	'designated_election_it_does_not_exist' => 'Die angegebene Gruppe ist nicht vorhanden',
	'mtag_tagname_error' => 'Gruppen Name ung&uuml;ltig',
	'mtag_join_error' => 'Die Gruppe der du zum Beitritt in dieser Kategorie erlaubt hast, hat das Limit erreicht',
	'mtag_join_field_error' => 'Gruppen Klassifikation \\1 Das folgende ist nur erlaubt, join up \\2 eine Gruppe. Du hast das Limit erreicht',
	'mtag_creat_error' => 'Die Gruppe die du sehen m&ouml;chtest wurde noch nicht angelegt',

//index.php
	'enter_the_space' => 'Profil',

//network.php
	'points_deducted_yes_or_no' => 'Diese Funktion zieht dir \\1 Credits ab, bist du sicher es tun zu wollen <p><a href="\\2" class="submit">Speichern</a> &nbsp; <a href="javascript:history.go(-1);" class="button">Abbrechen</a></p>',
  'points_search_error' => "Diese Suche kann nicht abgeschlossen werden, weil der Wert kleiner ist als die Punkte",
  
//source/cp_album.php
	'photos_do_not_support_the_default_settings' => 'Das Standard Album unterst&uuml;tzt nicht diese Funktion',
	'album_name_errors' => 'Bitte gib einen korrekten Name f&uuml;r das Album ein',

//source/space_app.php
	'correct_choice_for_application_show' => 'Bitte w&auml;hle die richtige Option zum Ausf&uuml;hren',

//source/do_login.php
	'users_were_not_empty_please_re_login' => 'Sorry, Benutzername kann nicht leer sein, bitte versuch es noch einmal',
	'login_failure_please_re_login' => 'Sorry, Login fehlerhaft, bitte nochmal versuchen',

//source/cp_blog.php
	'no_authority_expiration_date' => 'Du bist der Administrator Berechtigungen vor&uuml;bergehend nicht in der begrenzten Recovery-Zeit:\\1',
	'no_authority_expiration' => 'Du bist in der Administrator Berechtigungen eingeschr&auml;nkt, habe bitte Verst&auml;ndnis',
	'no_authority_to_add_log' => 'Du hast keine Berechtigung, auf das Protokoll zuzugreifen',
	'no_authority_operation_of_the_log' => 'Du hast keine Berechtigung, das Protokoll zu betreiben',
	'that_should_at_least_write_things' => 'Bitte schreibe ein paar Dinge f&uuml;r den Inhalt',
	'failed_to_delete_operation' => 'L&ouml;schen fehlgeschlagen, &uuml;berpr&uuml;fe es und versuch es erneut',

	'click_error' => 'Die Ausf&uuml;hrung ist nicht im normalen Betrieb',
	'click_item_error' => 'Die Position des Objekts ist nicht vorhanden',
	'click_no_self' => 'Du kannst dich selbst nicht bewerten',
	'click_have' => 'Zustand der Tabelle',
	'click_success' => 'Einf&uuml;gen der Position erfolgreich',

//source/cp_class.php
	'did_not_specify_the_type_of_operation' => 'Bitte w&auml;hle die korrekte Option zum ausw&auml,Hlen',
	'enter_the_correct_class_name' => 'Bitte gib einen Kategorie Namen ein',

	'note_wall_reply_success' => 'Nachricht in \\1  G&auml;steb&uuml;cher hinterlassen',

//source/cp_comment.php

	'operating_too_fast' => "Bitte warte \\1 Sekunden um die n&auml;chste Funktion auszuf&uuml;hren",
	'content_is_too_short' => 'Inhalt zu kurz, mindestens 2 Zeichen',
	'comments_do_not_exist' => 'Ausgew&auml;hlter Inhalt existiert nicht',
	'do_not_accept_comments' => 'Keine Kommentare f&uuml;r diesen Blog erlaubt',
	'sharing_does_not_exist' => 'Share existiert nicht',
	'non_normal_operation' => 'Illegale Ausf&uuml;hrung',
	'the_vote_only_allows_friends_to_comment' => 'Nur Freunden erlauben Kommentare auf die Berwertung abzugeben',

//source/cp_common.php
	'security_exit' => 'Du hast dich erfolgreich ausgeloggt\\1',

//source/cp_doing.php
	'should_write_that' => 'Du solltest etwas schreiben',
	'docomment_error' => 'Bitte gib an was du kommentieren m&ouml;chtest',

//source/cp_invite.php
	'mail_can_not_be_empty' => 'Email Liste kann nicht leer sein',
	'send_result_1' => 'Email gesendet. Es kann ein paar Minuten dauern bis sie deine Freunde empfangen',
	'send_result_2' => '<strong>E-Mail Fehler:</strong><br/>\\1',
	'send_result_3' => 'kann Datensatz nicht finden, Email nochmal senden fehlgeschlagen.',
	'there_is_no_record_of_invitation_specified' => 'Der Datensatz zur Einladung existiert nicht',

//source/cp_import.php
	'blog_import_no_result' => 'Original Daten fehlerhaft, bitte sei sicher das du die korrekte URL und Login Informationen eingegeben hast, Server Nachricht:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>"',
	'blog_import_no_data' => 'Original Daten fehlerhaft, bitte wechsel auf die Server Nachricht zur&uuml;ck:<br />\\1',
	'support_function_has_not_yet_opened fsockopen' => 'Seite unterst&uuml;tzt kein fsockopen, du kannst diese Funktion nicht nutzen',
	'integral_inadequate' => "Deine aktuellen Credits sind \\1 es ist aussreichend um diese Operation fortzusetzen, erforderliche Credits: \\2",
	'experience_inadequate' => "Der Wert der Erfahrung von \\1 reicht nicht aus, um diesen Vorgang abzuschlie&szlig;en. Diese Ma&szlig;nahme ist notwendig, f&uuml;r den Wert der Erfahrung: \\2",
  'url_is_not_correct' => 'URL Adresse ist nicht korrekt',
	'choose_at_least_one_log' => 'Bitte w&auml;hle einen Blog zum importieren',

//source/cp_friend.php
	'friends_add' => 'Du und \\1 seid nun Freunde',
	'you_have_friends' => 'Ihr seid Freunde',
	'enough_of_the_number_of_friends' => 'Freundeslimit wurde erreicht, bitte l&ouml;sche ein paar bevor du neue hinzuf&uuml;gst',
	'enough_of_the_number_of_friends_with_magic' => 'Die Anzahl deiner aktuellen Freunde zu erreichen, begrenzt das System <a id="a_magic_friendnum2" href="magic.php?mid=friendnum" onclick="ajaxmenu(event, this.id, 1)">Verwende die Freunde Compatibilizer Karte</a>',
  'request_has_been_sent' => 'Anfrage wurde gesendet, bitte warte die Best&auml;tigung des Benutzers ab',
	'waiting_for_the_other_test' => 'Warten auf die Best&auml;tigung vom Benutzer',
	'please_correct_choice_groups_friend' => 'Bitte w&auml;hle die richtige Freundesgruppe aus',
	'specified_user_is_not_your_friend' => 'Der ausgew&auml;hlte Benutzer ist nicht dein Freund',

//source/cp_mtag.php
	'mtag_managemember_no_privilege' => 'Keine Admin Berechtigung, bitte versuche etwas anderes',
	'mtag_max_inputnum' => 'Beitreten zum Club, unter der Kategorie von "\\1" fehlgeschlagen. Maximal erlaubt ist \\2 ',
	'you_are_already_a_member' => 'Du bist bereits ein Mitglied in diesem Club',
	'join_success' => 'Beitritt zum Club erfolgreich, du bist nun ein offizielles Mitglied in diesem Club',
	'the_discussion_topic_does_not_exist' => 'Sorry, aber das ausgew&auml;hlte Thema existiert nicht',
	'content_is_not_less_than_four_characters' => 'Sorry, aber der Inhalt ist zu kurz, es m&uuml;ssen mindestens 2 Zeichen sein',
	'you_are_not_a_member_of' => 'Du bist kein Mitglied in diesem Club',
	'unable_to_manage_self' => 'Kannst es nicht an dir selbst anwenden',
	'mtag_joinperm_1' => 'Du hast bereits ausgew&auml;hlt diesen Club beizutreten, warte auf Best&auml;tigung',
	'mtag_joinperm_2' => 'Du musst zur Teilnahme eingeladen werden',
	'invite_mtag_ok' => 'Du bist diesem Club erfolgreich beigetreten, du kannst:<br><br><a href="space.php?do=mtag&tagid=\\1" target="_blank"> Jetzt ansehen </a><br>Gesellschaft mit Freunden suchen<br><br><a href="cp.php?ac=mtag&op=mtaginvite">Zur&uuml;ck zur Einladungs-Seite </a><br>um weitere Einladeungen vorzunehmen',
	'invite_mtag_cancel' => 'Ignoriere die aufgeforderte Gruppe',
  'failure_to_withdraw_from_group' => 'Leiter der geheimen Gruppe fehlt, bitte w&auml;hle einen Gruppenleiter.',
	'fill_out_the_grounds_for_the_application' => 'Bitte gib einen Grund an f&uuml;r diese Anwendung',

//source/cp_pm.php
	'this_message_could_not_be_deleted' => 'Ausgew&auml;hlte PM kann nicht gel&ouml;scht werden',
	'unable_to_send_air_news' => 'Nachricht kann nicht leer sein, bitte nochmal &uuml;berpr&uuml;fen',
	'message_can_not_send' => 'Das senden der privaten Nachricht fehlgeschlagen, bitte nochmal &uuml;berpr&uuml;fen',
	'message_can_not_send1' => 'Senden fehlgeschlagen, du hast das Limit f&uuml;rs senden innerhalb 24 Stunden erreicht',
	'message_can_not_send2' => 'Du sendest zu schnell, bitte warte einen Moment bevor du die zweite Nachricht sendest',
	'message_can_not_send3' => 'Du kannst an Nicht-Freunde keine Massen Nachricht senden',
	'message_can_not_send4' => 'Du kannst jetzt keine Nachricht senden',
	'not_to_their_own_greeted' => 'Du kannst zu dir selbst nicht Hallo sagen',
	'has_been_hailed_overlooked' => 'Hallo Nachricht wurde ignoriert',

//source/cp_profile.php
	'realname_too_short' => 'Dein echter Namen darf nicht weniger als 4 Zeichen haben',
	'update_on_successful_individuals' => 'Pers&ouml;nliches Profil erfolgreich aktualisiert',

//source/cp_poll.php
	'no_authority_to_add_poll' => 'Du hast keine Berechtigung eine Umfrage hinzuzuf&uuml;gen',
	'no_authority_operation_of_the_poll' => 'Du hast nicht die Erlaubnis, eine Umfrage zu betreiben',
	'add_at_least_two_further_options' => 'Bitte f&uuml;ge mindestens zwei verschiedenen Kandidaten ein',
	'the_total_reward_should_not_overrun' => 'Der Gesamtbetrag darf die Pr&auml;mie nicht &uuml;berschreiten\\1',
	'wrong_total_reward' => 'Die gesamte Verg&uuml;tung des Betrags darf nicht weniger als der durchschnittliche Lohn sein',
	'voting_does_not_exist' => 'Es gibt keine Abstimmungs Information',
	'already_voted' => 'Du hast bereits abgestimmt',
	'option_exceeds_the_maximum_number_of' => 'Kann nicht hinzugef&uuml;gt werden, und die gr&ouml;sste Abstimmung kann nicht mehr als 20 Nummern haben',
	'the_total_reward_should_not_be_empty' => 'Die gesamte Verg&uuml;tung darf nicht leer sein',
	'average_reward_should_not_be_empty' => 'Durchschnittliche H&ouml;he der Belohnung kann nicht leer sein',
	'average_reward_can_not_exceed' => 'Der h&ouml;chste durchschnittlichen Lohn darf nicht mehr als \\1 Punkte betragen',
	'added_option_should_not_be_empty' => 'Weitere Kandidaten darf nicht leer sein',
	'time_expired_error' => 'Verfall Zeitraum von nicht weniger als die aktuelle Zeit',
	'please_select_items_to_vote' => 'Bitte w&auml;hlen mindestens eine Option aus',
	'fill_in_at_least_an_additional_value' => 'Bitte f&uuml;ge mindestens eine zus&auml;tzliche Art eines Werts ein',

//source/cp_share.php
	'blog_does_not_exist' => 'Ausgew&auml;hlter Blog existiert nicht',
	'logs_can_not_share' => 'Auf Grund der Datenschutzeinstellungen kann dieser Blog nicht mit anderen geteilt werden',
	'album_does_not_exist' => 'Ausgew&auml;hltes Album existiert nicht',
	'album_can_not_share' => 'Auf Grund der Datenschutzeinstellungen kann dieses Album nicht mit anderen geteilt werden',
	'image_does_not_exist' => 'Ausgew&auml;hltes Bild existiert nicht',
	'image_can_not_share' => 'Auf Grund der Datenschutzeinstellungen kann dieses Bild nicht mit anderen geteilt werden',
	'topics_does_not_exist' => 'Ausgew&auml;hltes Thema existiert nicht',
	'mtag_fieldid_does_not_exist' => 'Ausgew&auml;hltes Bar existiert nicht',
	'tag_does_not_exist' => 'Ausgew&auml;hltes Tag existiert nicht',
	'url_incorrect_format' => 'URL Adresse ist nicht korrekt',
	'description_share_input' => 'Bitte gib zuerst die Beschreibung ein',
	'poll_does_not_exist' => 'Die ausgew&auml;hlte Abstimmung ist nicht vorhanden',
	'share_not_self' => 'Du kannst keine Informationen (oder Bilder) ver&ouml;ffentlichen',
	'share_space_not_self' => 'Du kannst keine eigene Homepages haben',

//source/cp_space.php
	'domain_length_error' => 'Subdomain ist zu kurz, kann nicht weniger als \\1 Zeichen haben',
	'credits_exchange_invalid' => 'Credit Wechsel ist ung&uuml;gltig, bitte &uuml;berpr&uuml;fen',
	'credits_transaction_amount_invalid' => 'Betrag der Transaktion ist ung&uuml;ltig, bitte &uuml;berpr&uuml;fen',
	'credits_password_invalid' => 'Das Passwort das du eingegeben hast ist ung&uuml;ltig, bitte &uuml;berpr&uuml;fen',
	'credits_balance_insufficient' => 'Du hast nicht genug Ausgleich bei deinen Credits, wechsel fehlgeschlagen',
	'extcredits_dataerror' => 'Wechsel fehlgeschlagen, bitte kontaktiere den Admin f&uuml;r weitere Details',
	'domain_be_retained' => 'Diese Domain ist reserviert',
	'not_enabled_this_feature' => 'Das System unterst&uuml;tzt nicht diese Funktion',
	'space_size_inappropriate' => 'Bitte gib den korrekten Betrag f&uuml;r den Wechsel an',
	'space_does_not_exist' => 'Ausgew&auml;hlte Home-Seite existiert nicht',
	'integral_convertible_unopened' => 'Service Wechsel ist nicht verf&uuml;gbar',
	'two_domain_have_been_occupied' => 'Diese Subdomain existiert bereits, bitte versuch eine andere',
	'only_two_names_from_english_composition_and_figures' => 'Eine Sudomain muss mit Buchstaben beginnen und unterst&uuml;tzt weiter Zahlen und Buchstaben',
	'two_domain_length_not_more_than_30_characters' => 'Subdomain- L&auml;nge Error, maximal 30 Zeichen erlaubt',
	'old_password_invalid' => 'Bitte gib dein original Passwort ein',
	'no_change' => 'Es wurde nichts ge&auml;ndert',
	'protection_of_users' => 'Mitglied gesch&uuml;tzt, du hast keine Berechtigung zum &Auml;ndern von Einstellungen',

//source/cp_sendmail.php
	'email_input' => 'Du hast noch keinen E-Mail Account eingegeben, bitte gib deine richtige E-Mail Adresse <a href="cp.php?ac=password">hier</a> ein.',
	'email_check_sucess' => 'Email Aktivierung erfolgreich abgeschlossen',
	'email_check_error' => 'Email Aktivierung fehlgeschlagen, bitte &uuml;berpr&uuml;fe den Link nochmal',
	'email_check_send' => 'Aktivierungs E-Mail wurde an deine E-Mail Box gesendet, es kann ein paar Minuten dauern bis du sie bekommst',
	'email_error' => 'Falsches E-Mail Format',

//source/cp_theme.php
	'theme_does_not_exist' => 'Das ausgew&auml;hlte Theme existiert nicht',
	'css_contains_elements_of_insecurity' => 'Dein CSS hat einige Sicherheitsl&uuml;cken',

//source/cp_upload.php
	'upload_images_completed' => 'Foto Upload komplett',

//source/cp_thread.php
	'to_login' => 'Bitte zuerst einloggen',
	'title_not_too_little' => 'L&auml;nge des Betreffs fehlerhaft, er muss mindestens 2 Zeichen haben.',
	'posting_does_not_exist' => 'Ausgew&auml;hltes Thema existiert nicht',
	'settings_of_your_mtag' => 'Du kannst nur ein Thema posten wenn du eine Bar hast, bitte zuerst deine Bar aktualisieren<br>Bar ist ein Platz wo du mit deinen Freunden &uuml;ber interessante News plaudern kannst<br><br><a href="cp.php?ac=mtag" class="submit">Meine Bar aktualisieren</a>',
	'first_select_a_mtag' => 'Bitte w&auml;hle zuerst eine Bar aus.<br><br><a href="cp.php?ac=mtag" class="submit">Meine Bar aktualisieren</a>',
	'no_mtag_allow_thread' => 'Es sind nicht genug Mitglieder in dieser Bar, du kannst hier kein Thema starten.<br><br><a href="cp.php?ac=mtag" class="submit">Meine Bar aktualisieren</a>',
	'mtag_close' => 'Diese Bar wurde gesperrt.',

//source/space_album.php
	'to_view_the_photo_does_not_exist' => 'Sorry, aber das Album nachdem du suchst existiert nicht',

//source/space_blog.php
	'view_to_info_did_not_exist' => 'Sorry, aber die ausgew&auml;hlte Nachricht exsitiert nicht',

//source/space_pic.php
	'view_images_do_not_exist' => 'Sorry, aber das ausgew&auml;hlte Bild existiert nicht',

//source/mt_thread.php
	'topic_does_not_exist' => 'Ausgew&auml;hltes Thema existiert nicht',

//source/do_inputpwd.php
	'news_does_not_exist' => 'Ausgew&auml;hlte Nachricht existiert nicht',
	'proved_to_be_successful' => 'Best&auml;tigungs-Prozess vollst&auml;ndigt, nun weiter zur URL',
	'password_is_not_passed' => 'Passwort Error, bitte &uuml;berpr&uuml;fen und nochmal versuchen.',



//source/do_login.php
	'login_success' => 'Du hast dich erfolgreich eingeloggt, du wirst weitergeleitet zur Seite \\1',
	'not_open_registration' => 'Du hast dich erfolgreich eingeloggt, du wirst weitergeleitet zur Seite',
	'not_open_registration_invite' => 'Sorry, direkte Registrierung ist nicht erlaubt, du ben&ouml;tigst einen Einladungs-Code zur Registrierung',

//source/do_lostpasswd.php
	'getpasswd_account_notmatch' => 'Benutzername und E-Mail stimmen nicht &uuml;berein, bitte nochmal &uuml;berpr&uuml;fen',
	'getpasswd_email_notmatch' => 'Benutzername und E-Mail stimmen nicht &uuml;berein, bitte nochmal &uuml;berpr&uuml;fen',
	'getpasswd_send_succeed' => 'Wir haben dir einen Link zu deiner E-Mail Adresse gesendet:<br />Bitte besuche diesen Link der in der EMail enthalten ist innerhalb von 3 Tagen.',
	'user_does_not_exist' => 'Benutzername existiert nicht',
	'getpasswd_illegal' => 'Benutzername existiert nicht',
	'profile_passwd_illegal' => 'Passwort leer oder enth&auml;lt ung&uuml;ltige Zeichen, bitte nochmal &uuml;berpr&uuml;fen',
	'getpasswd_succeed' => 'Du hast erfolgreich dein Passwort ge&auml;ndert, bitte versuch dich jetzt mit dem neuen Passwort einzuloggen',
	'getpasswd_account_invalid' => 'Sorry, der Admin kann diese Funktion nicht nutzen',
	'reset_passwd_account_invalid' => 'Sorry, der Admin oder gesch&uuml;tzte Mitglieder k&ouml;nnen diese Funktion nicht nutzen',

//source/do_register.php
	'registered' => 'Registrierung komplett, nun weiter zu deiner Home-Seite',
	'system_error' => 'System Error, kann UCenter Client Ordner nicht finden',
	'password_inconsistency' => 'Das Passwort das du eingegeben hast stimmt nicht &uuml;berein',
	'profile_passwd_illegal' => 'Passwort leer oder enth&auml;lt ung&uuml;ltige Zeichen, bitte nochmal &uuml;berpr&uuml;fen',
	'user_name_is_not_legitimate' => 'Illegaler Benutzername',
	'include_not_registered_words' => 'Benutzername beinhaltet illegale Zeichen',
	'user_name_already_exists' => 'Benutzername existiert bereits',
	'email_format_is_wrong' => 'Email Error',
	'email_not_registered' => 'Die Email ist auf dieser Seite nicht erlaubt',
	'email_has_been_registered' => 'Email ist bereist auf dieser Seite registriert',
	'regip_has_been_registered' => 'Mit einer IP in der \\1 Stunde kann man  sich nur f&uuml;r ein Konto anmelden',
	'register_error' => 'Registrierung fehlerhaft, bitte kontaktiere den Admin f&uuml;r weitere Details',

//tag.php
	'tag_does_not_exist' => 'Ausgew&auml;hltes Tag existiert nicht',

//cp_poke.php
	'poke_success' => 'Nachricht wurde gesendet, \\1 User bekommt sie wenn er eingeloggt ist',
	'mtag_minnum_erro' => 'The member of this bare is less than \\1 , you can not use this feature',

//source/function_common.php
	'information_contains_the_shielding_text' => 'Sorry, aber die Nachricht die du gesendet hast beinhaltet illegale Worte',
	'site_temporarily_closed' => 'Seite geschlossen',
	'ip_is_not_allowed_to_visit' => 'Deine IP ist nicht erlaubt um auf die Seite zuzugreifen',
	'no_data_pages' => 'Es gibt keine Daten mehr auf dieser Seite',
	'length_is_not_within_the_scope_of' => 'Daten ausserhalb des Limits',

//source/function_block.php
	'page_number_is_beyond' => 'Seiten Anzahl ausserhalb des Limits',

//source/function_cp.php
	'incorrect_code' => 'Sicherheits-Code Error, bitte nochmal &uuml;berpr&uuml;fen',

//source/function_space.php
	'the_space_has_been_closed' => 'Dieses Profil wurde gel&ouml;scht',

//source/network_album.php
	'search_short_interval' => 'Bitte warte 30 Sekunden um die n&auml;chste Suche zu starten',
	'set_the_correct_search_content' => 'Bitte f&uuml;lle zuerst das Formular aus bevor du mit der Suche beginnst',

//source/space_share.php
	'share_does_not_exist' => 'Ausgew&auml;hltes Share existiert nicht',

//source/space_tag.php
	'tag_locked' => 'Tags wurden gesperrt',

	'invite_error' => 'an not obtain invite code, check if you have enough credits',
	'invite_code_error' => 'Sorry, falscher Einladungs Link',
	'invite_code_fuid' => 'Sorry, Einladungs Link wurde bereits verwendet',

//source/do_invite.php
	'should_not_invite_your_own' => 'Sorry, du kannst dich nicht selbst einladen um einen Account zu registrieren',
	'close_invite' => 'Einladungs-Funktion wurde deaktiviert',

	'field_required' => 'Die erforderlichen Felder \\1 d&uuml;rfen nicht leer bleiben, bitte zuerst ausf&uuml;llen',
	'friend_self_error' => 'Sorry, aber du kannst dich nicht selbst als Freund hinzuf&uuml;gen',
	'change_friend_groupname_error' => '&Auml;ndern des Gruppen Namens - Error',

	'mtag_not_allow_to_do' => 'Ung&uuml;ltig, du bist kein Mitglied dieses Clubs',

//cp_task
	'task_unavailable' => 'Ung&uuml;ltige Aktivit&auml;t',
	'task_maxnum' => 'Maximale Anzahl an Mitgliedern dieser Aktivit&auml;t ist bereits erreicht',
	'update_your_mood' => 'Bitte aktualisiere deine Stimmung, alias Shout',
	
	'showcredit_error' => 'Bitte aktualisiere deine Stimmung, alias Shout',
	'showcredit_fuid_error' => 'Freund ung&uuml;ltig',
	'showcredit_do_success' => 'Geld erfolgreich',
	'showcredit_friend_do_success' => 'Geld erfolgreich, dein Freund wird informiert',
	
	'submit_invalid' => 'Beitrag ung&uuml;ltig, bitte verwende einen Standard Browser',
	'no_privilege_my_status' => 'Sorry, diese Dinste sind derzeit nicht verf&uuml;gbar ',
	'no_privilege_myapp' => 'Sorry, diese Dinste sind derzeit nicht verf&uuml;gbar <a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">andere Funktionen gibt es hier.</a>',
	
	'report_error' => 'Bitte Mitglied ausw&auml;hlen das gemeldet werden soll.',
	'report_success' => 'Meldung erfolgreich, wir werden uns darum so schnell wie m&ouml;glich k&uuml;mmern.',
	'manage_no_perm' => 'Du kannst die Nachrichten an dich selbst verwalten.',
	'repeat_report' => 'Bitte die Meldung nicht wiederholt senden.',
	'the_normal_information' => 'Als normale Information senden, nicht als Meldung.',
	'friend_ignore_next' => 'Ignorierte Freundes Anfragen von \\1, n&auml;chste Anfrage(<a href="cp.php?ac=friend&op=request">Stop</a>)',
	'friend_addconfirm_next' => 'Du wurdest der Freund von \\1 , n&auml;chste Anfrage(<a href="cp.php?ac=friend&op=request">Stop</a>)',

//source/cp_event.php
	'event_title_empty' => 'Name dees Events darf nicht leer sein',
	'event_classid_empty' => 'Klassifikation darf nicht leer sein',
	'event_city_empty' => 'Eine Stadt muss ausgew&auml;hlt werden',
	'event_detail_empty' => 'Die Aktivit&auml;ten m&uuml;ssen ausgef&uuml;llt werden',
	'event_bad_time_range' => 'Aktivit&auml;t Dauer kann nicht mehr als 60 Tage betragen',
	'event_bad_endtime' => 'Das Ende der Veranstaltungs Zeit darf nicht vor der Startzeit sein',
	'event_bad_deadline' => 'Event Registrierungs Frist darf nicht sp&auml;ter als bis zum Ende der Veranstaltungs Zeit sein',
	'event_bad_starttime' => 'Event-Startzeit kann nicht fr&uuml;her als die Gegenwart sein',
	'event_already_full' => 'Die Zahl der Teilnehmer f&uuml; diese Veranstaltung ist voll',
	'event_will_full' => 'Die Anzahl der Teilnehmer ist begrenzt',
	'no_privilege_add_event' => 'Du hast keine Berechtigung, um neue Aktivit&auml;ten zu starten',
	'no_privilege_edit_event' => 'Du hast keine Erlaubnis, die Informationen zu dieser Veranstaltung zu bearbeiten',
	'no_privilege_manage_event_members' => 'Du hast keine Berechtigung die Teilnehmer zu diesem Event zu verwalten',
	'no_privilege_manage_event_comment' => 'Du hast keine Berechtigung, die Kommentare zu verwalten',
	'no_privilege_manage_event_pic' => 'Du hast keine Berechtigung, die Bilder zu verwalten',
	'no_privilege_do_eventinvite' => 'Du hast keine Berechtigung um Einladungen zu versenden',
	'event_does_not_exist' => 'Aktivit&auml;ten gibt es nicht oder wurden gel&ouml;scht',
	'event_create_failed' => '&Uuml;berpr&uuml;fe bitte deine Eingabe',
	'event_need_verify' => 'Das Event muss vor der Freigabe von einem Administrator best&auml;tigt werden',
	'upload_photo_failed' => 'Hochladen Fehlgeschlagen',
	'choose_right_eventmember' => 'Bitte w&auml;hle die entsprechende Anwendung der Aktivit&auml;ten der Mitglieder',
	'choose_event_pic' => 'Bitte Eventfoto ausw&auml;hlen',
	'only_creator_can_set_admin' => 'Nur der Ersteller kann andere Organisatoren ausw&auml;hlen',
	'event_not_set_verify' => 'Events brauchen keine Pr&uuml;fung',
	'event_join_limit' => 'Anmeldungs Limit',
	'cannot_quit_event' => 'Du kannst aus diesem Event nicht zur&uuml;cktreten weil du entweder nicht gemeldet bist, oder du bist Veranstalter oder Sponsor des Events.',
	'event_not_public' => 'Dies ist eine Nicht-&Ouml;ffentlichen Veranstaltungen und kann nur gegen Einladung besucht werden.',
	'no_privilege_do_event_invite' => 'Benutzer k&ouml;nnen keine Freunde einladen.',
	'event_under_verify' => 'Dieses Event wird derzeit &uuml;berarbeitet',
	'cityevent_under_condition' => 'Der Wohnsitz muss gesett werden.',
	'event_is_over' => 'Dieses Event ist beendet',
	'event_meet_deadline' => 'Frist f&uuml;r Event setzen.',
	'bad_userevent_status' => 'Bitte w&auml;hle den richtigen Status der Events der Mitglieder ',
	'event_has_followed' => 'Bedenken zu dieser Veranstaltung',
	'event_has_joint' => 'Beim Event teilgenommen',
	'event_is_closed' => 'Das Event musste beendet werden.',
	'event_only_allows_members_to_comment' => 'Nur Teilnehmer d&uuml;rfen zu diesem Event Kommentare abgeben.',
	'event_only_allows_admins_to_upload' => 'Nur Veranstalter d&uuml;rfen Fotos hochladen.',
	'event_only_allows_members_to_upload' => 'Nur Teilnehmer dieses Events d&uuml;rfen Fotos hochladen.',
	'eventinvite_does_not_exist' => 'Einladungen zu diesem Event sind nicht gestattet.',
	'event_can_not_be_opened' => 'Dieses Event kann nicht ge&ouml;ffnet werden',
	'event_can_not_be_closed' => 'Dieses Event kann nicht geschlossen werden',
	'event_only_allows_member_thread' => 'Nur Teilnehmer zu diesem Event k&ouml;nnen Themen schreiben.',
	'event_mtag_not_match' => 'Die angegebenen Gruppe bezieht sich nicht auf dieses Event.',
	'event_memberstatus_limit' => 'Dieses Event ist Privat.',
	'choose_event_thread' => 'Bitte w&auml;hle mindestens ein Event.',

//source/cp_magic.php
	'magicuse_success' => 'Requisiten erfolgreich eingesetzt',
	'unknown_magic' => 'Requisite ist nicht vorhanden oder wurde verboten',
	'choose_a_magic' => 'Requisite ausw&auml;hlen',
	'magic_is_closed' => 'Requisiten deaktiviert',
	'magic_groupid_not_allowed' => 'Deine Benutzergruppe ist nicht berechtigt um Requisiten zu verwenden.',
	'input_right_buynum' => 'Korrekte Menge angeben',
	'credit_is_not_enough' => 'Nicht genug Punkte',
	'not_enough_storage' => 'Nicht genug Speicherkapazit&auml;t \\1',
	'magicbuy_success' => 'Erfolgreich gekauft \\1',
	'magicbuy_success_with_experence' => 'Erfolgreich gekauft \\1, Sammeln \\2',
	'bad_friend_username_given' => 'Name des Freundes ist ung&uuml;ltig',
	'has_no_more_present_magic' => 'Du hast keine Berechtigung Reqisiten zu kaufen, <a id="a_buy_license" href="cp.php?ac=magic&op=buy&mid=license" onclick="ajaxmenu(event, this.id, 1)">Kaufen</a>',
	'has_no_more_magic' => 'Keine Requisiten \\1,<a id="\\2" href="\\3" onclick="ajaxmenu(event, this.id, 1)">Sofort kaufen</a>',
	'magic_can_not_be_presented' => 'Es k&ouml;nnen keine Requisiten vorgelegt werden.',
	'magicpresent_success' => 'Ist es gelungen, \\1 Gespendet Requisiten',
	'magic_store_is_closed' => 'Prop-Shop wurde geschlossen',
	'magic_not_used_under_right_stage' => 'Die Requisiten k&ouml;nnen unter diesen Umst&auml;nden nicht genutzt werden.',
	'magic_groupid_limit' => 'Unter deinem Gruppenrang k&ouml;nnen keine Requisiten gekauft werden.',
	'magic_usecount_limit' => 'Einschr&auml;nkungen bez&uuml;glich der Verwendung von Zyklen von den Requisiten<br>Bitte \\1 nach dem Einsatz.',
	'magicuse_note_have_no_friend' => 'Du hast noch keine Freunde',
	'magicuse_author_limit' => 'Die Requisiten k&ouml;nnen nur f&uuml;r die Verwendung von Informationen erteilt werden',
	'magicuse_object_count_limit' => 'Die Requisiten, auf die gleichen Informationen &uuml;ber die H&auml;ufigkeit der Verwendung hat die Grenze (\\1 mal erreicht)',
	'magicuse_object_once_limit' => 'Diese Requisiten k&ouml;nnen nicht wieder verwendet werden.',
	'magicuse_bad_credit_given' => 'Die Anzahl der Punkte, die du eingegeben hast, ist ung&uuml;ltig',
	'magicuse_not_enough_credit' => 'Es werden mehr Punkte ben&ouml;tigt, als du besitzt.',
	'magicuse_bad_chunk_given' => 'Du hast eine ung&uuml;ltige Anzahl von Single-Copy-Integrationen',
	'magic_gift_already_given_out' => 'Ein Geschenk wurde bereits ausgegeben.',
	'magic_got_gift' => 'Du hast einen Umschlag erhalten: \\1 hinzuf&uuml;gen',
	'magic_had_got_gift' => 'Du hast einen roten Umschlag empfangen.',
	'magic_has_no_gift' => 'Du hast keinen roten Umschlag empfangen.',
	'magicuse_object_not_exist' => 'Das Objekt dieser Requisite ist nicht vorhanden.',
	'magicuse_bad_object' => 'Das ist nicht die richtige Wahl der Requisite',
	'magicuse_condition_limit' => 'Die Startbedingungen sind nicht Requisiten',
	'magicuse_bad_dateline' => 'Eingabe Zeit ist ung&uuml;ltig',
	'magicuse_not_click_yet' => 'Du hasat noch einen Stand-Off auf die Informationen',
	'not_enough_coupon' => 'Unzureichende Zahl von Gutscheinen',
	'magicuse_has_no_valid_friend' => 'Du kannst keine Requisiten verwenden, da es keine Freunde gibt.',
	'magic_not_hidden_yet' => 'Du bist nicht im unsichtbar Status',
	'magic_not_for_sale' => 'Die Requisiten k&ouml;nnen nicht erworben werden.',
	'not_set_gift' => 'Du hast derzeit keinen roten Umschlag.',
	'not_superstar_yet' => 'Du bist kein Superstar!',
	'no_flicker_yet' => 'Regenbogen-Hyun Nutzung nicht m&ouml;glich.',
	'no_color_yet' => 'Keine Farbnutzung m&ouml;glich.',
	'no_frame_yet' => 'Foto Frame Nutzung nicht m&ouml;glich.',
	'no_bgimage_yet' => 'Hintergrundnutzung nicht m&ouml;glich.',
	'bad_buynum' => 'Falsche Zahl zum Kauf eingetragen.',

	'feed_no_found' => 'Keine Feeds gefunden.',
	'not_open_updatestat' => 'Statistik-Funktionen lassen sich derzeit nicht &ouml;ffnen.',
	
	'topic_subject_error' => 'Titel sollte nicht weniger als 4 Zeichen haben',
	'topic_no_found' => 'Das Thema wurde nicht gefunden.',
	'topic_list_none' => 'Keine Themenliste verf&uuml;gbar.',

	'space_has_been_locked' => 'Der Space wurde gesperrt! Bei Fragen kontaktiere bitte den Administrator.',

//-----------------------------------------------------
// Added by vot [at] sources.ru

//source/task/avatar.php

	'uc_update_avatar'	=> 'This feature requires that your UCenter Server avatar.php file to be updated.<br>If you are the site administrator, please download the following archive, uncompress it, and copy the avatar.php file to your UCenter document root directory with overwriting the old file.<br><a href="http://u.discuz.net/download/avatar.zip"> http://u.discuz.net/download/avatar.zip</a>',//'这个功能要求您的UCenter的Server端的 avatar.php 程序需要进行升级.<br>如果您是本站管理员,请通过下面的地址下载 avatar.php 文件的压缩包,并覆盖您的UCenter根目录中的同名文件即可.<br><a href="http://u.discuz.net/download/avatar.zip">http://u.discuz.net/download/avatar.zip</a>'.//

	''	=> '',//''.

	
);

