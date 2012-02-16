<?php
//------------------------------------------------------
// INTERNATIONAL UCenter v.1.6.0 (Multilingual)
// by Valery Votintsev, codersclub.org
//------------------------------------------------------
// Based on UCenter 1.6.0, (c) Comsenz.inc, discuz.net
//------------------------------------------------------
// Russian Language Pack
// by Valery Votintsev, codersclub.org
//------------------------------------------------------

define('UC_VERNAME', 'International Version');

$lang = array(

	'SC_GBK'	=> 'Упрощённый китайский, GBK',
	'TC_BIG5'	=> 'Традицционный китайский, BIG5',
	'SC_UTF8'	=> 'Упрощённый китайский, UTF8',
	'TC_UTF8'	=> 'Традиционный китайский, UTF8',
	'EN_ISO'	=> 'Английский, ISO8859',
	'EN_UTF8'	=> 'Английский, UTF-8',

	'title_install'		=> SOFT_NAME.' Мастер установки',
	'agreement_yes'		=> 'Я согласен',
	'agreement_no'		=> 'Я не согласен',
	'notset'		=> 'Без ограничений',

	'message_title'		=> 'Подсказка',
	'error_message'		=> 'Сообщение об ошибке',
	'message_return'	=> 'Назад',
	'return'		=> 'Назад',
	'install_wizard'	=> 'Мастер установки',
	'config_nonexistence'	=> 'Файл конфигурации не существует',
	'nodir'			=> 'Создайте файл',
	'short_open_tag_invalid'	=> 'Установите в файле php.ini директиву short_open_tag  On, в противном случае установка не может продолжаться.',
	'redirect'			=> 'Браузер автоматически перейдет на страницу<br> исключением считается, когда Ваш браузер не поддерживает фреймы, пожалуйста, нажмите здесь',

	'database_errno_2003'	=> 'Не удается подключиться к базе данных',
	'database_errno_1044'	=> 'Не могу создать новую базу данных, проверить имя базы данных и правильность заполнения',
	'database_errno_1045'	=> 'Не удается подключиться к базе данных, проверьте имя базы данных, пользователя или пароль',
	'database_errno_1064'	=> 'Синтаксическая ошибка SQL',

	'dbpriv_createtable'	=> 'Нет разрешения CREATE TABLE, чтобы продолжить установку',
	'dbpriv_insert'		=> 'Нет разрешения INSERT для продолжения установки',
	'dbpriv_select'		=> 'Нет SELECT разрешение, чтобы продолжить установку',
	'dbpriv_update'		=> 'Нет UPDATE разрешение на продолжение установки',
	'dbpriv_delete'		=> 'Нет DELET разрешение, чтобы продолжить установку',
	'dbpriv_droptable'	=> 'Нет DROP TABLE разрешений на установку',

	'db_not_null'		=> 'База данных UCenter была установлена, если продолжить установку будут удалены пустые исходные данные.',
	'db_drop_table_confirm'	=> 'Для продолжения установки будут удалены все исходные данные, вы уверены, что хотите продолжить?',

	'writeable'		=> 'Разрешена запись',
	'unwriteable'		=> 'Не могу записать',
	'old_step'		=> 'Вернуться',
	'new_step'		=> 'Дальше',

	'database_errno_2003'	=> 'Не удается подключиться к базе данных, пожалуйста, проверьте настройки базы данных. Сам адрес сервера баз данных указан правильно',
	'database_errno_1044'	=> 'Не могу создать новую базу данных, проверьте правильность заполнения имя базы данных',
	'database_errno_1045'	=> 'Не удается подключиться к базе данных, проверьте правильность заполнения имя базы данных, пользователя или пароль',

	'step_env_check_title'	=> 'Начало установки',
	'step_env_check_desc'	=> 'Проверьте настройки и каталоги',
	'step_db_init_title'	=> 'Установка базы',
	'step_db_init_desc'	=> 'Конфигурация базы данных',
	
	'step1_file'		=> 'Каталог файлов',
	'step1_need_status'	=> 'Необходимый статус',
	'step1_status'		=> 'Текущий статус',
	'not_continue'		=> 'Исправьте отмеченные красным ошибки, чтобы продолжить',

	'tips_dbinfo'			=> 'Заполните информацию для базы данных',
	'tips_dbinfo_comment'		=> '',
	'tips_admininfo'		=> 'Заполните информацию для администратора',
	'tips_admininfo_comment'	=> 'Основной пароль UCenter',
	'step_ext_info_title'		=> 'Установка успешно завершена',
	'step_ext_info_desc'		=> 'Нажмите чтобы ввести логин',

	'ext_info_succ'		=> 'Установка успешно завершена',
	'install_locked'	=> 'Установлена блокировка! Если вы действительно хотите, повторно установить интеграцию, перейдите на сервер, чтобы удалить<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'Установка может быть продолжена только после решения данной проблемы',

	'step_app_reg_title'	=> 'Настройка операционной среды',
	'step_app_reg_desc'	=> 'Установить тестовый внешний сервер UCenter',
	'tips_ucenter'		=> 'Пожалуйста, заполните информацию UCenter',
	'tips_ucenter_comment'	=> 'Если у вас уже установлен UCenter, заполните информацию ниже. Если нет перейдите по адресу: <a href="http://www.discuz.com/" target="blank"> Comsenz Продукция </ A>, чтобы загрузить и установить, только затем можно продолжить.',

	'advice_mysql_connect'		=> 'Пожалуйста, проверьте правильно ли загружен MySQL модуль',
	'advice_fsockopen'		=> 'Эта функция требует включенной директивы allow_url_fopen в файле php.ini. Свяжитесь со своим хостинг-провайдером, чтобы определить статус данной функции',
	'advice_gethostbyname'		=> 'В конфигурации PHP запрещено использование функции gethostbyname. Пожалуйста, свяжитесь с хостинг-провайдера, чтобы определить статус данной функции',
	'advice_file_get_contents'	=> 'Эта функция PHP требует директива allow_url_fopen в php.ini открытым. Пожалуйста, свяжитесь с хостинг-провайдера, чтобы определить эту функцию включен',
	'advice_xml_parser_create'	=> 'Эта функция PHP требует поддержки XML. Пожалуйста, свяжитесь с хостинг-провайдера, чтобы определить эту функцию включен',

	'ucurl'			=> 'URL UCenter',
	'ucpw'			=> 'Пароль UCenter',

	'tips_siteinfo'		=> 'Пожалуйста, заполните информацию о сайте',
	'sitename'		=> 'Название сайта',
	'siteurl'		=> 'URL сайта',

	'forceinstall'			=> 'Обязательная установка',
	'dbinfo_forceinstall_invalid'	=> 'В данной базе данных уже содержится такой же префикс таблиц, вы можете изменить "префикс", чтобы избежать удаления старых данных. Если вы продолжите обязательную установку она удалит все старые данные, которые не могут быть восстановлены!',

	'click_to_back'			=> 'Назад',
	'adminemail'			=> 'Системный Email',
	'adminemail_comment'		=> 'Используется для отправки отчета об ошибке',
	'dbhost_comment'		=> 'Адрес сервера баз данных, как правило, localhost',
	'tablepre_comment'		=> 'При работе нескольких форумов на одной базе данных, необходимо изменить префикс',
	'forceinstall_check_label'	=> 'Я хочу удалить данные! Обязательная установка !!!',

	'uc_url_empty'			=> 'Вы не заполнили URL UCenter, пожалуйста, верните для завершения',
	'uc_url_invalid'		=> 'Неправильный URL',
	'uc_url_unreachable'		=> 'URL-адрес  UCenter может содержать ошибку, пожалуйста, проверьте',
	'uc_ip_invalid'			=> 'Невозможно определить имя домена, пожалуйста, заполните IP сайта</font>',
	'uc_admin_invalid'		=> 'Ошибка пароля UC, пожалуйста, повторите',
	'uc_data_invalid'		=> 'Сбой связи, пожалуйста, проверьте URL адрес UC',
	'ucenter_ucurl_invalid'		=> 'URL UC является пустым или имеет ошибку, проверьте',
	'ucenter_ucpw_invalid'		=> 'Пароль UC является пустым или имеет ошибку, проверьте',
	'siteinfo_siteurl_invalid'	=> 'URL сайта пустой, либо неправильный, проверьте',
	'siteinfo_sitename_invalid'	=> 'Название сайта пустое, либо запрещено, проверьте',
	'dbinfo_dbhost_invalid'		=> 'Сервер баз данных не указан, либо ошибка форматирования, проверьте',
	'dbinfo_dbname_invalid'		=> 'Имя базы данных пустое, или ошибки форматирования, проверьте',
	'dbinfo_dbuser_invalid'		=> 'Имя пользователя базы данных пуст, или ошибки форматирования',
	'dbinfo_dbpw_invalid'		=> 'В базе данных используется пустой пароль, или ошибки форматирования',
	'dbinfo_adminemail_invalid'	=> 'Укажите системный Email или проверьте на правильность',
	'dbinfo_tablepre_invalid'	=> 'Префикс таблиц не должен содержать символы "." и не может начинаться с числа',
	'admininfo_username_invalid'	=> 'Укажите Администратора',
	'admininfo_email_invalid'	=> 'Укажите email',
	'admininfo_ucfounderpw_invalid'	=> 'Укажите пароль администратора',
	'admininfo_ucfounderpw2_invalid'	=> 'Пароли не совпадают',

	'username'		=> 'Менеджер',
	'email'			=> 'Email администратора',
	'password'		=> 'Пароль администратора',
	'password_comment'	=> 'Пароль администратора не может быть пустым',
	'password2'		=> 'Повторить пароль',

	'admininfo_invalid'		=> 'Информация по администратору не является полной, проверьте учетную запись администратора, пароль, адрес электронной почты',
	'dbname_invalid'		=> 'Укажите имя базы данных',
	'admin_username_invalid'	=> 'Запрещенное имя пользователя. Имя пользователя не должно превышать 15 английских символов, и не может содержать специальные символы',
	'admin_password_invalid'	=> 'Неправильный пароль, пожалуйста, попробуйте еще раз',
	'admin_email_invalid'		=> 'Ошибка email. Такой email уже используется или неверный формат, замените',
	'admin_invalid'			=> 'Ваша информация не завершена, пожалуйста, внимательно проверьте и заполните каждый пункт',
	'admin_exist_password_error'	=> 'Пользователь уже существует, если вы хотите, чтобы установить это администратора форума, пожалуйста, введите правильный пароль для пользователя, или замените имя администратора форума',

	'tagtemplates_subject'	=> 'Название',
	'tagtemplates_uid'	=> 'Пользователи ID',
	'tagtemplates_username'	=> 'Сообщение',
	'tagtemplates_dateline'	=> 'Дата',
	'tagtemplates_url'	=> 'Адрес',

	'uc_version_incorrect'	=> 'Версия вашего UCenter сервера не подходит, пожалуйста, обновите UCenter  до последней версии, скачать: http://www.comsenz.com/.',
	'config_unwriteable'	=> 'Мастер установки не может записать файл конфигурации config.inc.php. Поставьте права на запись (777)',

	'install_in_processed'	=> 'Установка...',
	'install_succeed'	=> 'Пользователь Центра успешно установлен, перейдите к следующему шагу',
	'license'		=> '<div class="license"><h1>License</h1>

<p> Copyright (c) 2001-2010, Hong Sing Imagination (Beijing) Co., Ltd. All rights reserved.</p>

<p> Thank you for choosing UCenter product. We hope that our efforts to provide you with a fast and powerful and efficient site solution.</p>

<p> Sing Imagination (Beijing) Technology Co., Ltd. for the UCenter product developers, and they shall have UCenter products copyright. Sing Imagination (Beijing) Technology Co., Ltd. website http://www.comsenz.com, UCenter official website address is http://www.discuz.com, UCenter official forum site at http://www.discuz . net.</p>

<p> UCenter copyright has registered in The Peoples Republic of China National Copyright Administration, copyright law and by international treaties. User: whether individuals or organizations, profit or not, how to use (including study and research purposes), are required to carefully read this agreement, understand, agree to and comply with all the terms of this agreement only after the start using UCenter software.</p>

<p> this License applies and only applies to UCenter 1.x version, Hong Sing Imagination (Beijing) Technology Co., Ltd. has the power of final interpretation of the licensing agreement.</p>

<h3> I. license agreement right </h3>
<ol>
<li> you can fully comply with the end user license agreement, based on the software used in this non-commercial use, without having to pay for software copyright licensing fees.</li>
<li> agreement you can within the constraints and limitations UCenter modify the source code (if provided) or interface styles to suit your site requirements.</li>
<li> you have to use this software to build the site all the members of the information, articles and related information of ownership, and is independent of commitment and legal obligations related to the article content.</li>
<li> a commercial license, you can use this software for commercial applications, while according to the type of license purchased to determine the period of technical support, technical support, technical support form and content, from the moment of purchase, within the period of technical support have a way to get through the specified designated areas of technical support services. Business authorized users have the power to reflect and comment, relevant comments will be a primary consideration, but not necessarily be accepted promise or guarantee.</li>
</ol>

<h3> II. agreement constraints and limitations </h3>
<ol>
<li> business license has not been before, may not use this software for commercial purposes (including but not limited to business sites, business operations, for commercial purpose or profit web site). Purchase of commercial license, please visit http://www.discuz.com reference instructions, call 8610-51657885 for more details.</li>
<li> may not associated with the software or business license for rental, sale, mortgage or grant sub-licenses.</li>
<li> In any case, that no matter how used, whether modified or landscaping, changes to what extent, just use UCenter whole or any part, without the written permission of the page footer Department UCenter name and Sing Imagination (Beijing) Technology Co., Ltd. affiliated website (http://www.comsenz.com, http://www.discuz.com or http://www.discuz.net) the link must be retained, not removed or modified.</li>
<li> prohibited UCenter whole or any part of the basis for the development of any derivative version, modified version or third-party version for redistribution.</li>
<li> If you failed to comply with the terms of this Agreement, your authorization will be terminated by the license rights will be recovered, and bear the corresponding legal responsibility.</li>
</ol>

<h3> III. Limited Warranty and Disclaimer </h3>
<ol>
<li> the software and the accompanying documents as not to provide any express or implied, or guarantee in the form of compensation provided.</li>
<li> user voluntary use of this software, you must understand the risks of using this software, technical services in the not to buy products, we do not promise to provide any form of technical support, use the warrant or assume any use of this software issues related to liability arising.</li>
<li> Sing Imagination (Beijing) Technology Co., Ltd. does not use the software to build the site responsible for articles or information.</li>
</ol>

<p> the UCenter end user license agreement, business license and technical services to the details provided by UCenter exclusive official website. Sing Imagination (Beijing) Technology Co., Ltd. has, without prior notice, modify the license agreement and the power of service price list, the revised agreement or change list from the date of the new authorized user effect.</p>

<p> electronic text form of license agreement as the two sides signed an agreement in writing as a complete and equivalent legal effect. Once you start the installation UCenter, shall be deemed to fully understand and accept the terms of this Agreement, in the enjoyment of the powers conferred by these provisions, while subject to restrictions and limitations related. Acts outside the scope of protocol licensing will be a direct violation of the licensing agreement and constitutes infringement, we have the right to terminate the authorization, shall be ordered to stop the damage, and reserves the power to investigate ?? responsibility.</p></div>',

	'uc_installed'		=> 'Вы уже установили UCenter, если вам нужно переустановить, удалите файл /data/install.lock',
	'i_agree'		=> 'Я прочитал и согласен с условиями',
	'supportted'		=> 'Поддерживается',
	'unsupportted'		=> 'Не поддерживается',
	'max_size'		=> 'Поддержка / максимальный размер',
	'project'		=> 'Сервисы',
	'ucenter_required'	=> 'Требуемая конфигурация UCenter',
	'ucenter_best'		=> 'Лучший вариант UCenter',
	'curr_server'		=> 'Текущий сервер',
	'env_check'		=> 'Проверка',
	'os'			=> 'Операционная система',
	'php'			=> 'Версия PHP',
	'attachmentupload'	=> 'Загрузить',
	'unlimit'		=> 'Без лимита',
	'version'		=> 'Версия',
	'gdversion'		=> 'GD библиотека',
	'allow'			=> 'Разрешено',
	'unix'			=> 'Класс Unix',
	'diskspace'		=> 'Дисковое пространство',
	'priv_check'		=> 'Проверьте права на запись на файлы и директории',
	'func_depend'		=> 'Функция проверки зависимостей',
	'func_name'		=> 'Имя функции',
	'check_result'		=> 'Результаты тестов',
	'suggestion'		=> 'Рекомендуемые',
	'advice_mysql'		=> 'Пожалуйста, проверьте правильность загрузки модуля MySQL',
	'advice_fopen'		=> 'Эта функция требует, чтобы  директива allow_url_fopen в файле php.ini была включена',
	'advice_file_get_contents'	=> 'Эта функция требует, чтобы  директива allow_url_fopen в файле php.ini была включена',
	'advice_xml'		=> 'Эта PHP функция требует поддержки XML',
	'none'			=> 'Нет',

	'dbhost'	=> 'Сервер БД',
	'dbuser'	=> 'Пользователь БД',
	'dbpw'		=> 'Пароль БД',
	'dbname'	=> 'Имя базы данных',
	'tablepre'	=> 'Префикс',

	'ucfounderpw'	=> 'Пароль администратора',
	'ucfounderpw2'	=> 'Повторите пароль',

	'create_table'	=> 'Создание таблицы',
	'succeed'	=> 'Успешно завершено',
);