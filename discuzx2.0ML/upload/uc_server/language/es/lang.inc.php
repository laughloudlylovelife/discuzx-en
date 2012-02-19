<?php
//------------------------------------------------------
// INTERNATIONAL UCenter v.1.6.0 (Multilingual)
// by Valery Votintsev, http://codersclub.org/
//------------------------------------------------------
// Based on UCenter 1.6.0, (c) Comsenz.inc, discuz.net
//------------------------------------------------------
// Spanish Language Pack
// by jhoxi, http://discuzhispano.com
//------------------------------------------------------

define('UC_VERNAME', 'International Version');

$lang = array(

	'SC_GBK'			=> 'Simplified Chinese GBK',
	'TC_BIG5'			=> 'Traditional Chinese BIG5',
	'SC_UTF8'			=> 'Simplified Chinese  UTF8',
	'TC_UTF8'			=> 'Traditional Chinese UTF8',
	'EN_ISO'			=> 'ENGLISH ISO8859',
	'EN_UTF8'			=> 'SPANISH UTF-8',

	'title_install'		=> SOFT_NAME.' Asistente para la instalación',
	'agreement_yes'		=> 'Aceptar',
	'agreement_no'		=> 'No Aceptar',
	'notset'			=> 'Ilimitado',

	'message_title'		=> 'Tips',
	'error_message'		=> 'Error',
	'message_return'	=> 'Volver',
	'return'			=> 'Volver',
	'install_wizard'	=> 'Asistente de instalación',
	'config_nonexistence'		=> 'Archivo de configuración no se existe',
	'nodir'						=> 'Carpeta no existe',
	'short_open_tag_invalid'	=> 'Lo sentimos, por favor, defina "short_open_tag" en On en php.ini.',
	'redirect'					=> 'La instalación se ejecutará automáticamente.<br>Si su navegador no salta automáticamente, haga clic aquí',

	'database_errno_2003'	=> 'No se puede conectar a la base de datos, asegúrese de que su base de datos se está ejecutando y comprobar la configuración de base de datos',
	'database_errno_1044'	=> 'No se puede crear nueva base de datos, por favor, compruebe el nombre de base de datos',
	'database_errno_1045'	=> 'No se puede conectar a la base de datos, por favor verifique su nombre de usuario y contraseña',
	'database_errno_1064'	=> 'SQL ERROR',

	'dbpriv_createtable'	=> 'No "CREAR TABLA" Permiso',
	'dbpriv_insert'			=> 'No "INSERTAR" Permiso',
	'dbpriv_select'			=> 'No "SELECCIONAR" Permiso',
	'dbpriv_update'			=> 'No "ACTUALIZAR" Permiso',
	'dbpriv_delete'			=> 'No "BORRAR" Permiso',
	'dbpriv_droptable'		=> 'No "DEJAR TABLA" Permiso',

	'db_not_null'			=> 'Ya ha instalado UCenter, continuará con la limpieza de  todos los datos antiguos.',
	'db_drop_table_confirm'	=> 'Confirmar de instalar y eliminar todos los datos viejos?',

	'writeable'			=> 'Escribir',
	'unwriteable'		=> 'No se puede escribir',
	'old_step'			=> 'Anterior',
	'new_step'			=> 'Siguiente',

	'database_errno_2003'	=> 'No se puede conectar a la base de datos, asegúrese de que su base de datos se está ejecutando y comprobar la configuración de base de datos',
	'database_errno_1044'	=> 'No se puede crear nueva base de datos, por favor, compruebe el nombre de base de datos',
	'database_errno_1045'	=> 'No se puede conectar a la base de datos, por favor verifique su nombre de usuario y contraseña',

	'step_env_check_title'	=> 'Inicio de Instalación',
	'step_env_check_desc'	=> 'Compruebe las condiciones y los permisos de archivos',
	'step_db_init_title'	=> 'Instalación de DB',
	'step_db_init_desc'		=> 'Instalacion de datos...',
	
	'step1_file'			=> 'Nombre del archivo',
	'step1_need_status'		=> 'Requerido',
	'step1_status'			=> 'Corriente',
	'not_continue'			=> 'Por favor, resolver los problemas marcados en rojo, y vuelva a intentarlo',

	'tips_dbinfo'				=> 'Colocar la informacion de la base de datos aqui',
	'tips_dbinfo_comment'		=> '',
	'tips_admininfo'			=> 'Colocar la informacion del admin aqui',
	'tips_admininfo_comment'	=> 'Por favor, recuerde UCenter Contraseña del fundador, que serán necesarios para acceder UCenter.',
	'step_ext_info_title'		=> 'Instalación Correctamente',
	'step_ext_info_desc'		=> 'Haga clic aquí para iniciar sesión',

	'ext_info_succ'			=> 'Instalado con éxito',
	'install_locked'		=> 'La instalación es bloqueada debido a la instalación anterior, si desea instalar otra vez, por favor borre <br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'		=> 'Debe resolver el problema anterior',

	'step_app_reg_title'	=> 'Configuración del entorno',
	'step_app_reg_desc'		=> 'Comprobar servidor y configurar UCenter',
	'tips_ucenter'			=> 'Por favor, rellene información relacionada de UCenter',
	'tips_ucenter_comment'	=> 'UCenter es un software de base de Comsenz. Discuz! Junta se requiere este programa. Si ha instalado UCenter, por favor llene la información de UCenter, o por favor ir <a href="http://www.discuz.com/" target="blank"> Centro de Productos Comsenz</ a> para descargar e instalar UCenter , luego continue',

	'advice_mysql_connect'		=> 'Por favor, asegúrese de cargar el módulo mysql correctamente',
	'advice_fsockopen'		=> 'Es necesario establecer "allow_url_fopen" como el de "php.ini". Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',
	'advice_gethostbyname'		=> '"gethostbyname" Función que se necesita. Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',
	'advice_file_get_contents'	=> 'Es necesario establecer "allow_url_fopen" como el de "php.ini". Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',
	'advice_xml_parser_create'	=> 'Esta función necesita soporte para XML en PHP. Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',

	'ucurl'				=> 'UCenter\'s URL',
	'ucpw'				=> 'UCenter Contraseña del fundador',

	'tips_siteinfo'		=> 'Completar información del sitio',
	'sitename'			=> 'Nombre del sitio',
	'siteurl'			=> 'Url del  sitio',

	'forceinstall'			=> 'Instalación a la  fuerza',
	'dbinfo_forceinstall_invalid'	=> 'Usted puede modificar prefijo de la tabla para evitar la pérdida de datos si la base de datos actual contiene datos con el prefijo de la tabla misma, instalar la fuerza, se borrarán todos los datos anteriores!',

	'click_to_back'			=> 'Haga clic aquí para volver atrás',
	'adminemail'			=> 'Sistema de correo electrónico',
	'adminemail_comment'		=> 'Se utiliza para enviar informes de error de script',
	'dbhost_comment'		=> 'Host de base de datos, por lo general: localhost',
	'tablepre_comment'		=> 'Por favor, modifique el prefijo si desea compartir esta base de datos con múltiples instalaciones',
	'forceinstall_check_label'	=> 'Forzar la instalación, quiero borrar los datos anteriores!!!',

	'uc_url_empty'			=> 'URL UCenter esta vacío, vuelva a llenar',
	'uc_url_invalid'		=> 'Inválido Formato de URL',
	'uc_url_unreachable'		=> 'UCenter URL mal, porfavor comprobar',
	'uc_ip_invalid'			=> 'No se puede resolver de dominio, por favor rellene IP del sitio web</font>',
	'uc_admin_invalid'		=> 'Contraseña incorrecta fundador UC, por favor, inténtalo de nuevo',
	'uc_data_invalid'		=> 'Error en la conexión, por favor verifique el URL de la UC',
	'ucenter_ucurl_invalid'		=> 'Formato de la UC URL vacío o incorrecto, por favor consulte',
	'ucenter_ucpw_invalid'		=> 'Fundador de UC contraseña está vacía o no, por favor consulte',
	'siteinfo_siteurl_invalid'	=> 'Formato de URL del sitio vacío o incorrecto, por favor consulte',
	'siteinfo_sitename_invalid'	=> 'Formato de nombre de sitio vacío o incorrecto, por favor consulte',
	'dbinfo_dbhost_invalid'		=> 'Formato DB Host vacío o incorrecto, por favor consulte',
	'dbinfo_dbname_invalid'		=> 'Nombre de formato DB vacío o incorrecto, por favor consulte',
	'dbinfo_dbuser_invalid'		=> 'DB formato de nombre de usuario vacío o incorrecto, por favor consulte',
	'dbinfo_dbpw_invalid'		=> 'Formato DB contraseña vacía o no, por favor consulte',
	'dbinfo_adminemail_invalid'	=> 'Formato del sistema de e-mail vacío o incorrecto, por favor consulte',
	'dbinfo_tablepre_invalid'	=> 'Prefijo Inválido, no se puede comenzar con un número, y no puede contener "."',
	'admininfo_username_invalid'	=> 'Formato de nombre de usuario admin vacío o incorrecto, por favor consulte',
	'admininfo_email_invalid'	=> 'Formato admin Email vacío o incorrecto, por favor consulte',
	'admininfo_ucfounderpw_invalid'	=> 'Admin contraseña vacía, por favor, rellene',
	'admininfo_ucfounderpw2_invalid'	=> 'La contraseña no coinciden, por favor marque',

	'username'			=> 'Usuario del admin',
	'email'				=> 'Email del admin',
	'password'			=> 'La contraseña del admin',
	'password_comment'		=> 'Contraseña de administrador no puede estar vacío',
	'password2'			=> 'Repita la contraseña',

	'admininfo_invalid'		=> 'Información incompleta de administración, compruebe nombre de usuario admin, pwd y el correo electrónico',
	'dbname_invalid'		=> 'Nombre de base de datos vacía, por favor, rellene el nombre de base de datos correcta',
	'admin_username_invalid'	=> 'Inválido nombre de usuario, la duración no puede superar los 15 caracteres, por lo general chino o alfanumérica, no puedo contener caracteres especiales',
	'admin_password_invalid'	=> 'La contraseña no coinciden, por favor ingrese de nuevo',
	'admin_email_invalid'		=> 'Correo electrónico no válida, alguien lo usó o tipo no válido, por favor, cambiar a otra',
	'admin_invalid'			=> "Información de administrador incompleta, necesidad de llenar todos",
	'admin_exist_password_error'	=> 'Nombre de usuario existe, si quieres configurarlo como administrador del foro, por favor, rellene la contraseña correcta, o cambiar a otro usuario',

	'tagtemplates_subject'	=> 'Asunto',
	'tagtemplates_uid'	=> 'UID',
	'tagtemplates_username'	=> 'Autor',
	'tagtemplates_dateline'	=> 'Fecha',
	'tagtemplates_url'	=> 'URL',

	'uc_version_incorrect'	=> 'Su versión UCenter es demasiado viejo, por favor, actualice a la última versión. Descarga la versión Español: http://www.discuzhispano.com/, Descargar UCenter versión oficial: http://www.comsenz.com/ .',
	'config_unwriteable'	=> 'No se puede escribir el archivo de configuración, por favor corriga los permiso "config.inc.php" para escritura (777)',

	'install_in_processed'	=> 'Instalando...',
	'install_succeed'	=> 'Instalacion correctamente, haga clic aquí para el siguiente paso',
	'license'		=> '<div class="license"><h1>Licencia</h1>

<p> Derechos de autor (c) 2001-2010, Hong Sing Imagination (Beijing) Co., Ltd. Todos los derechos reservados.</p>

<p> Gracias por elegir el producto UCenter. Esperamos que nuestros esfuerzos para ofrecerle una solución de sitio rápido y potente y eficiente.</p>

<p> Sing Imagination (Beijing) Technology Co., Ltd. para el desarrollo de productos UCenter, y tendrán los derechos de autor UCenter productos. Sing Imagination (Beijing) Technology Co., Ltd. sitio web http://www.comsenz.com, UCenter dirección del sitio web oficial es http://www.discuz.com, UCenter foro oficial del sitio http://www.discuz.net.</p>

<p> UCenter los derechos de autor se ha registrado en la República Popular de China, la Administración Nacional de Derecho, las leyes de copyright y por tratados internacionales. Usuario: si las personas u organizaciones sin ánimo de lucro, o el uso de (incluidos los fines de estudio e investigación), están obligados a leer atentamente el presente acuerdo, entender, aceptar y cumplir con todos los términos de este acuerdo sólo después de que empezar a usar software UCenter.</p>

<p> esta Licencia se aplica y sólo se aplica a la versión 1.x UCenter, Hong Sing Imagination (Beijing) Technology Co., Ltd. tiene el poder de interpretación definitiva del contrato de licencia.</p>

<h3> I. Licencia de derecho de acuerdo </h3>
<ol>
<li> que puedan cumplir plenamente el acuerdo de licencia de usuario final, basado en el software utilizado en este uso no comercial, sin tener que pagar los honorarios de licencias de software de derechos de autor.</li>
<li> acuerdo que se puede dentro de los límites y las limitaciones UCenter modificar el código fuente (si se proporciona) o estilos de interfaz para adaptarla a sus necesidades sitio.</li>
<li> usted tiene que utilizar este software para crear el sitio de todos los miembros de la información, artículos e información relacionados con la propiedad, y es independiente del compromiso y las obligaciones legales relacionadas con el contenido del artículo.</li>
<li> una licencia comercial, usted puede usar este software para aplicaciones comerciales, mientras que según el tipo de licencia adquirida para determinar el período de soporte técnico, soporte técnico, la forma de apoyo técnico y de contenido, desde el momento de la compra, dentro del período de soporte técnico tienen una manera de conseguir a través de las áreas especificadas designados de servicios de soporte técnico. Los usuarios de negocios autorizados tienen el poder de reflexionar y comentar, las observaciones pertinentes serán la consideración primordial, pero no necesariamente ser aceptada promesa o garantía.</li>
</ol>

<h3> II. Las restricciones y limitaciones de acuerdo </h3>
<ol>
<li> licencia comercial no ha existido antes, no puede utilizar este software con fines comerciales (incluyendo pero no limitado a los sitios de negocios, operaciones comerciales, con fines comerciales o sitio web de beneficios). Compra de licencia comercial, por favor visite http://www.discuz.com instrucciones de referencia, llame al 8610-51657885 para más detalles.</li>
<li> no relacionados con el software o la licencia de negocios para el alquiler, venta, hipoteca o conceder sublicencias.</li>
<li> En cualquier caso, que no importa lo utiliza, ya sea modificado o jardinería, hasta qué punto los cambios, sólo tiene que utilizar toda UCenter o cualquier parte, sin el permiso escrito del pie de página el nombre de Departamento y UCenter Sing Imagination (Beijing) Technology Co., Ltd. sitio web afiliado (http://www.comsenz.com, http://www.discuz.com o http://www.discuz.net) El enlace debe ser conservado, no la supresión o modificación.</li>
<li> prohíbe toda UCenter o cualquier parte de la base para el desarrollo de cualquier versión derivada, versión modificada o versión de terceros para la redistribución.</li>
<li> Si usted no cumplió con los términos de este Acuerdo, la autorización se dará por terminado por los derechos de licencia se recuperará, y asumir la responsabilidad legal correspondiente.</li>
</ol>

<h3> III. Garantía limitada y exención de responsabilidad </h3>
<ol>
<li> el software y los documentos que acompañan, como no proporcionar ninguna garantía expresa o implícita, ni la garantía en forma de la indemnización prevista.</li>
<li> uso voluntario de usuario de este software, usted debe entender los riesgos de usar este software, los servicios técnicos en el no comprar productos, no promete ofrecer cualquier tipo de soporte técnico, utilice la orden o asumir cualquier uso de este software los problemas relacionados con de responsabilidad que se derive.</li>
<li> Sing Imagination (Beijing) Technology Co., Ltd. no utilizar el software para construir el sitio responsable de los artículos o información.</li>
</ol>

<p> Al final UCenter usuario acuerdo de licencia, las licencias comerciales y de servicios técnicos a los datos proporcionados por el sitio web oficial exclusiva UCenter. Sing Imagination (Beijing) Technology Co., Ltd. tiene, sin previo aviso, modificar el contrato de licencia y el poder de la lista de precios de los servicios, el acuerdo revisado o lista de cambios desde la fecha de efecto nuevo usuario autorizado.</p>

<p> forma de texto electrónico del acuerdo de licencia ya que las dos partes firmaron un acuerdo por escrito como un efecto legal completa y equivalente. Una vez que comience la instalación UCenter, se considerará que entender y aceptar los términos de este Acuerdo, en el ejercicio de las facultades conferidas por estas disposiciones, estando sujeto a las restricciones y limitaciones relacionadas. Actos fuera del alcance de las licencias de protocolo será una violación directa del acuerdo de licencia y constituye una infracción, tenemos el derecho de suspender la autorización, se ordenó detener el daño, y se reserva la facultad de investigar? responsabilidad.</p></div>',

	'uc_installed'		=> 'Ya ha instalado UCenter. Si desea volver a instalarlo, por favor, elimine "data/install.lock"',
	'i_agree'		=> 'Estoy de acuerdo',
	'supportted'		=> 'Soportado',
	'unsupportted'		=> 'No Soportado',
	'max_size'			=> 'Soportado/Tamaño Max',
	'project'		=> 'Proyecto',
	'ucenter_required'	=> 'UCenter Requerido',
	'ucenter_best'		=> 'UCenter Mejor',
	'curr_server'		=> 'Corriente',
	'env_check'		=> 'Compruebe el entorno',
	'os'				=> 'Sistema operativo',
	'php'			=> 'Versión PHP',
	'attachmentupload'	=> 'Subir Adjunto',
	'unlimit'		=> 'Ilimitado',
	'version'		=> 'Versión',
	'gdversion'			=> 'GD versión',
	'allow'			=> 'Permitir',
	'unix'			=> 'Unix',
	'diskspace'			=> 'Espacio en disco',
	'priv_check'		=> 'Compruebe los permisos de directorios y archivos',
	'func_depend'		=> 'Compruebe las funciones dependientes',
	'func_name'		=> 'Función',
	'check_result'		=> 'Resultado',
	'suggestion'		=> 'Sugerencia',
	'advice_mysql'		=> 'Por favor, compruebe si se ha cargado el módulo mysql',
	'advice_fopen'		=> 'Usted tiene que fijar "allow_url_fopen" Activado en el "php.ini". Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',
	'advice_file_get_contents'	=> 'Usted tiene que fijar "allow_url_fopen" Activado en el "php.ini". Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',
	'advice_xml'		=> 'Esta función requiere soporte para XML en PHP. Por favor, póngase en contacto con el proveedor de espacio para asegurarse de que está activado',
	'none'				=> 'Ninguno',

	'dbhost'	=> 'DB Host',
	'dbuser'	=> 'DB Usuario',
	'dbpw'		=> 'DB Constraseña',
	'dbname'	=> 'DB Nombre',
	'tablepre'	=> 'Prefijo de tabla',

	'ucfounderpw'	=> 'Contraseña del Fundador ',
	'ucfounderpw2'	=> 'Repita la contraseña',

	'create_table'	=> 'Crear tabla',
	'succeed'	=> 'Éxito',
);