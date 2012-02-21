<?php
//------------------------------------------------------
// INTERNATIONAL UCenter v.1.6.0 (Multilingual)
// by Valery Votintsev, codersclub.org
//------------------------------------------------------
// Based on UCenter 1.6.0, (c) Comsenz.inc, discuz.net
//------------------------------------------------------
// French Language Pack
// by Andre13, discuz-fr.fr
//------------------------------------------------------

define('UC_VERNAME', 'International Version');

$lang = array(

	'SC_GBK'	=> 'Chinois simplifié', // '简体中文版'
	'TC_BIG5'	=> 'Chinois traditionnel', // '繁体中文版'
	'SC_UTF8'	=> 'chinoise SC UTF8', // 'Tiếng Trung SC UTF8'
	'TC_UTF8'	=> 'Chinois traditionnel UTF8 Version', // '繁体中文 UTF8 版'
	'EN_ISO'	=> 'ANGLAIS ISO8859', // 'ENGLISH ISO8859'
	'EN_UTF8'	=> 'ANGLAIS_ST UTF-8', // 'ENGLIST UTF-8'

	'title_install' => SOFT_NAME.' Assistant Installation', // 'title_install' => SOFT_NAME.' 安装向导'
	'agreement_yes'	=> 'Accepter', // '我同意'
	'agreement_no'	=> 'Pas accepter', // 我不同意'
	'notset'	=> 'Aucune Restriction', // '不限制'

	'message_title'		=> 'Mess. rapide', // '提示信息'
	'error_message'		=> 'Message Erreur', // '错误信息'
	'message_return'	=> 'Retour', // '返回'
	'return'		=> 'Retour', // '返回'
	'install_wizard'	=> 'Assistant Installation', // '安装向导'
	'config_nonexistence'	=> 'Fichier de configuration inexistant', // '配置文件不存在'
	'nodir'			=> 'Répertoire inexistant', // '目录不存在'
	'short_open_tag_invalid'	=> 'Je suis désolé, Svp. dans le fichier php.ini short_open_tag Activée, sinon l\'installation ne peut continuer.', // '对不起, 请将 php.ini 中的 short_open_tag 设置为 On, 否则无法继续安装.'
	'redirect'			=> 'Les navigateurs sont retour à la page, Svp. patienter.<br>Sauf si votre navigateur ne supporte pas les frames, alors, Cliquez ici', // 'Trình duyệt đang chuyển trang, vui lòng chờ.<br>除非当您的浏览器没有自动跳转时, 请点击这里'

	'database_errno_2003'	=> 'Impossible de se connecter à la base de données, vérifier si la base de données est démarré, l\'adresse du serveur de bases de données sont correctes', // '无法连接数据库, 请检查数据库是否启动, 数据库服务器地址是否正确'
	'database_errno_1044'	=> 'Impossible de créer une nouvelle base de données, Svp. remplir le nom de base de données correcte pour la vérification', // '无法创建新的数据库, 请检查数据库名称填写是否正确'
	'database_errno_1045'	=> 'Impossible de se connecter à la base de données, vérifiez le nom utilisateur ou lemot de passe de la base de données est correct', // '无法连接数据库, 请检查数据库用户名或者密码是否正确'
	'database_errno_1064'	=> 'Erreur de syntaxe SQL', // 'SQL 语法错误'

	'dbpriv_createtable'	=> 'supporte pas les cadres ou framesCREATE TABLEautorisations, Installation ne peut pas continuer', //  '没有CREATE TABLE权限, 无法继续安装'
	'dbpriv_insert'		=> 'supporte pas les cadres ou framesINSERTautorisation, Installation ne peut pas continuer', // '没有INSERT权限, 无法继续安装'
	'dbpriv_select'		=> 'supporte pas les cadres ou framesSELECTautorisations, Installation ne peut pas continuer', // '没有SELECT权限, 无法继续安装'
	'dbpriv_update'		=> 'supporte pas les cadres ou framesUPDATEautorisations, Installation ne peut pas continuer', // '没有UPDATE权限, 无法继续安装'
	'dbpriv_delete'		=> 'supporte pas les cadres ou framesDELETEautorisations, Installation ne peut pas continuer', // '没有DELETE权限, 无法继续安装'
	'dbpriv_droptable'	=> 'supporte pas les cadres ou framesDROP TABLEpermissions, ne peut pas installer', // '没有DROP TABLE权限, 无法安装'

	'db_not_null'		=> 'Base de données est installé UCenter, Les données initiales seront autorisés à continuer cette installation.', // '数据库中已经安装过 UCenter, 继续安装会清空原有数据.'
	'db_drop_table_confirm'	=> 'continuer cette installation va effacer toutes les données existantes, Etes-vous sûr de vouloir continuer?', // '继续安装会清空全部原有数据, 您确定要继续吗?'

	'writeable'	=> 'Peut écrire', // '可写'
	'unwriteable'	=> 'Ne peut pas écrire', // '不可写'
	'old_step'	=> 'Précédents', // '上一步'
	'new_step'	=> 'Suivant', // '下一步'

	'database_errno_2003'	=> 'Impossible de se connecter à la base de données, vérifier si la base de données est démarré, adresse du serveur Base de données sont correctes', // '无法连接数据库, 请检查数据库是否启动, 数据库服务器地址是否正确'
	'database_errno_1044'	=> 'Impossible de créer une nouvelle base de données, Svp. remplir le nom de base de données correcte pour la vérification', //  '无法创建新的数据库, 请检查数据库名称填写是否正确'
	'database_errno_1045'	=> 'Impossible de se connecter à la base de données, vérifiez le nom utilisateur ou le mot de passe de LA base de données sont correctes', // '无法连接数据库, 请检查数据库用户名或者密码是否正确'

	'step_env_check_title'	=> 'Lancez cette Installation', // '开始安装'
	'step_env_check_desc'	=> 'Permissions Environnement et vérification répertoire', // '环境以及文件目录权限检查'
	'step_db_init_title'	=> 'Installez la base de données', // '安装数据库'
	'step_db_init_desc'	=> 'Exécution de cetteinstallation de la base de données', // '正在执行数据库安装'

	'step1_file'		=> 'fichier catalogue', // '目录文件'
	'step1_need_status'	=> 'Etat requis', // '所需状态'
	'step1_status'		=> 'Situation Actuelle', // '当前状态'
	'not_continue'		=> 'Svp. essayez le haut pour corriger certains de la croix rouge', // '请将以上红叉部分修正再试'

	'tips_dbinfo'		=> 'Remplissez les informations de la base de données', // '填写数据库信息'
	'tips_dbinfo_comment'	=> '', // '',
	'tips_admininfo'	=> 'Remplissez les informations administrateur', // '填写管理员信息'
	'tips_admininfo_comment'	=> 'Gardez en tête UCenter Fondateur du mot de passe, avec le mot de passe vous vous connecter UCenter.', // '请牢记 UCenter 创始人密码, 凭该密码登陆 UCenter.'
	'step_ext_info_title'	=> 'Une installation réussie ', // '安装成功 '
	'step_ext_info_desc'	=> 'Cliquez pour entrer au débarquement', // '点击进入登陆'

	'ext_info_succ'		=> 'Une installation réussie ', // '安装成功 '
	'install_locked'	=> 'Installez des verrouillages déjà installé, si vous êtes sûr de vouloir ré-installer, allez dans le serveur à supprimer<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg'	=> 'Vous avez à résoudre le problème ci-dessus, cette installation puisse se poursuivre', // '您必须解决以上问题, 安装才可以继续'
// 	'install_locked'	=> '安装锁定, 已经安装过了, 如果您确定要重新安装, 请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'step_app_reg_title'	=> 'Réglez contexte opérationnel', // '设置运行环境'
	'step_app_reg_desc'	=> 'Environnement de serveur de test et de définir ou réglage UCenter', // '检测服务器环境以及设置 UCenter'
	'tips_ucenter'		=> 'Svp. remplissez le UCenter Informations connexes', // '请填写 UCenter 相关信息' 
	'tips_ucenter_comment'	=> 'UCenter Soit Comsenz Le produit du programme de base du service, Discuz! Board Dépend de cette installation et le fonctionnement de ce programme si vous avez installé UCenter, Svp.remplir les informations suivantes, sinon, passez à <a href="http://www.discuz.com/" target="blank">Comsenz Centre Produits</a> Télécharger et installer, puis continuer.', // 'UCenter 是 Comsenz 公司产品的核心服务程序, Discuz! Board 的安装和运行依赖此程序.如果您已经安装了 UCenter, 请填写以下信息.否则, 请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装, 然后再继续.'

	'advice_mysql_connect'		=> 'Svp. vérifier mysql Module est correctement chargé', //  '请检查 mysql 模块是否正确加载'
	'advice_fsockopen'		=> 'Cette fonction nécessite cette option allow_url_fopen est activé dans le fichier php.ini, Svp. contactez le domaine espace , ouverte pour déterminer la fonction', // '该函数需要 php.ini 中 allow_url_fopen 选项开启.请联系空间商, 确定开启了此项功能'
	'advice_gethostbyname'		=> 'Configuration de PHP est interdit gethostbynameFonction espace Svp. contacter le fournisseur pour déterminer cette fonction est activée sur le', //  '是否php配置中禁止了gethostbyname函数.请联系空间商, 确定开启了此项功能'
	'advice_file_get_contents'	=> 'Cette fonction nécessite php.ini Dans allow_url_fopen Option est active, Svp. contactez le domaine espace , ouverte pour déterminer la fonction', // '该函数需要 php.ini 中 allow_url_fopen 选项开启.请联系空间商, 确定开启了此项功能'
	'advice_xml_parser_create'	=> 'Cette fonction nécessite PHP Soutien XML.Svp. contactez le domaine espace , ouverte pour déterminer la fonction', //  '该函数需要 PHP 支持 XML.请联系空间商, 确定开启了此项功能'

	'ucurl'		=> 'UCenter Sur URL', // 'UCenter 的 URL'
	'ucpw'		=> 'UCenter Fondateur Mot de Passe', // 'UCenter 创始人密码'

	'tips_siteinfo'	=> 'Svp.remplir les informations du site', // '请填写站点信息'
	'sitename'	=> 'Nom du site', // '站点名称'
	'siteurl'	=> 'site URL', // '站点 URL'

	'forceinstall'			=> 'installation obligatoire', // '强制安装'
	'dbinfo_forceinstall_invalid'	=> 'Parmi les préfixe de table base de données actuelle contient déjà la table des mêmes données, Vous pouvez modifier le "préfixe de table" pour éviter de supprimer les anciennes données,Ou choisir de forcer cette installation. Forcer cette installation va supprimer les anciennes données, et ne peuvent pas être restaurées', // '当前数据库当中已经含有同样表前缀的数据表, 您可以修改“表名前缀”来避免删除旧的数据, 或者选择强制安装.强制安装会删除旧数据, 且无法恢复'

	'click_to_back'		=> 'Cliquez ici pour revenir', // '点击返回上一步'
	'adminemail'		=> 'Système de messagerie Email', // '系统信箱 Email'
	'adminemail_comment'	=> 'Utilisé pour envoyer le rapport de bug', // '用于发送程序错误报告'
	'dbhost_comment'	=> 'Adresse du serveur de la base de données, généralement localhost', //  '数据库服务器地址, 一般为 localhost'
	'tablepre_comment'	=> 'Lorsque vous exécutez plusieurs forums de la même base de données, modifier le préfixe', //  '同一数据库运行多个论坛时, 请修改前缀'
	'forceinstall_check_label'	=> 'Je veux supprimer les données, cette installation obligatoire  !!!', // '我要删除数据, 强制安装 !!!'

	'uc_url_empty'		=> 'Vous avez pas rempli UCenter Sur URL, Svp. retourner remplissez le', // '您没有填写 UCenter 的 URL, 请返回填写'
	'uc_url_invalid'	=> 'URL erreur de format', //  'URL 格式错误'
	'uc_url_unreachable'	=> 'UCenter Sur URL Adresse peut être rempli par erreur Svp. vérifier', // 'UCenter 的 URL 地址可能填写错误, 请检查'
	'uc_ip_invalid'		=> 'Impossible de résoudre le nom de domaine, Svp.remplir cet emplacement IP</font>', // '无法解析该域名, 请填写站点的 IP</font>'
	'uc_admin_invalid'	=> 'Erreur UC mot de passe fondateur, Svp. entrer à nouveau', // 'UC创始人密码错误, 请重新填写'
	'uc_data_invalid'	=> 'La communication échoue, vérifiez si cette adresse URL correcte de UC ', // '通信失败, 请检查 UC的URL 地址是否正确 '
	'ucenter_ucurl_invalid'	=> 'URL UC est vide, ou format contiennent des erreurs, Svp. vérifier', // 'UC的URL为空, 或者格式错误, 请检查'
	'ucenter_ucpw_invalid'	=> 'mot de passe fondateur UC est vide, ou des erreurs de format, Svp. vérifier', // 'UC的创始人密码为空, 或者格式错误, 请检查'
	'siteinfo_siteurl_invalid'	=> 'URL du site est vide, ou format contiennent des erreurs, Svp. vérifier', // '站点URL为空, 或者格式错误, 请检查'
	'siteinfo_sitename_invalid'	=> 'Nom du site est vide, ou des erreurs de format, Svp. vérifier', // '站点名称为空, 或者格式错误, 请检查'
	'dbinfo_dbhost_invalid'		=> 'Serveur de base est vide, ou format contiennent des erreurs, Svp. vérifier', // '数据库服务器为空, 或者格式错误, 请检查'
	'dbinfo_dbname_invalid'		=> 'Nom de la base est vide, ou format contiennent des erreurs, Svp. vérifier', // '数据库名为空, 或者格式错误, 请检查'
	'dbinfo_dbuser_invalid'		=> 'Nom utilisateur de la base de données est vide, ou des erreurs de format, Svp. vérifier', // '数据库用户名为空, 或者格式错误, 请检查'
	'dbinfo_dbpw_invalid'		=> 'Base de données mot de passe est vide, ou des erreurs de format, Svp. vérifier', // '数据库密码为空, 或者格式错误, 请检查'
	'dbinfo_adminemail_invalid'	=> 'Système, la messagerie est vide, ou format contiennent des erreurs, Svp. vérifier', // '系统邮箱为空, 或者格式错误, 请检查'
	'dbinfo_tablepre_invalid'	=> 'Préfixe du nom de de table ne contient pas les caractères "." Impossible de commencer avec un nombre', // '表名前缀不能包含字符".",不能以数字开头'
	'admininfo_username_invalid'	=> 'Nom utilisateur administrateur est vide, ou des erreurs de format, Svp. vérifier', // '管理员用户名为空, 或者格式错误, 请检查'
	'admininfo_email_invalid'	=> 'Email administrateur est vide, ou format contiennent des erreurs, Svp. vérifier', // '管理员Email为空, 或者格式错误, 请检查'
	'admininfo_ucfounderpw_invalid'	=> 'Mot de passe administrateur est vide, Svp. remplissez le', // '管理员密码为空, 请填写'
	'admininfo_ucfounderpw2_invalid'	=> 'Les deux mot de passe ne correspondent pas, vérification', // '两次密码不一致, 请检查'

	'username'		=> 'Compte Administrateur', // '管理员账号'
	'email'			=> 'Administrateur Email', // '管理员 Email'
	'password'		=> 'Mot de Passe Administrateur', // '管理员密码'
	'password_comment'	=> 'Mot de passe Administrateur ne peut pas être vide', // '管理员密码不能为空'
	'password2'		=> 'Répétez mot de passe', // '重复密码'

	'admininfo_invalid'		=> 'Informations Administrateur ne sont pas terminés, vérifiez le compte Administrateur, mot de passe, e-mail', // '管理员信息不完整, 请检查管理员账号, 密码, 邮箱'
	'dbname_invalid'		=> 'Nom de la base est vide, Svp. remplissez le nom de la base', // '数据库名为空, 请填写数据库名称'
	'admin_username_invalid'	=> 'Nom utilisateur illégal, la longueur du nom utilisateur ne doit pas être plus de 15 caractères en anglais, et ne peut pas contenir de caractères spéciaux, généralement chinois, lettres ou chiffres', //  '非法用户名, 用户名长度不应当超过 15 个英文字符, 且不能包含特殊字符, 一般是中文, 字母或者数字' 
	'admin_password_invalid'	=> 'Mot de passe et les incohérences ci-dessus, Svp. entrer de nouveau', // '密码和上面不一致, 请重新输入'
	'admin_email_invalid'		=> 'Email Mauvaise adresse, cette adresse e-mail est utilisée ou ou format est invalide, Svp. passer à une adresse différente', // 'Email 地址错误, 此邮件地址已经被使用或者格式无效, 请更换为其他地址'
	'admin_invalid'			=> 'Vos renseignements Information Manager est pas terminé, Svp. remplir chaque article soigneusement', // '您的信息管理员信息没有填写完整, 请仔细填写每个项目'
	'admin_exist_password_error'	=> 'Cet utilisateur existe déjà, si vous souhaitez définir cet administrateur du forum utilisateur, mot de passe de cet Utilisateur est entré correctement, ou de remplacer le nom de cet administrateur de ce forum', // '该用户已经存在, 如果您要设置此用户为论坛的管理员, 请正确输入该用户的密码, 或者请更换论坛管理员的名字'

	'tagtemplates_subject'	=> 'Intitulé', // '标题'
	'tagtemplates_uid'	=> 'Utilisateur ID', // '用户 ID'
	'tagtemplates_username'	=> 'Affiche Identifiant', // '发帖者'
	'tagtemplates_dateline'	=> 'ce jour', // '日期'
	'tagtemplates_url'	=> 'Adresse Sujet', // '主题地址'

	'uc_version_incorrect'	=> 'Votre UCenter Server version est trop faible, Svp. mettre à niveau terminée UCenter services aux dernières versions et mises à jour, téléchargement：http://www.comsenz.com/ .', // '您的 UCenter 服务端版本过低, 请升级 UCenter 服务端到最新版本, 并且升级, 下载地址：http://www.comsenz.com/ .'
	'config_unwriteable'	=> 'Assistant de configuration ne peut pas écrire dans le fichier de configuration, réglez config.inc.php État de attribut du programme modifiable (777)', // '安装向导无法写入配置文件, 请设置 config.inc.php 程序属性为可写状态(777)'

	'install_in_processed'	=> 'En cours install...', // '正在安装...'
	'install_succeed'	=> 'Utilisateur correctement installé, cliquez pour entrer dans la prochaine étape', // '安装用户中心成功, 点击进入下一步'
	'license'		=> '<div class="license"><h1>Version chinoise du contrat de licence pour les utilisateurs chinois</h1>

<p>Tous droits réservés. (c) 2001-2011, Song Pékin Science et Technology Co., Ltd Tous droits réservés.</p>

<p>Nous vous remercions de choisir UCenter Produit espérons que nos efforts pour vous offrir une solution de site rapide et puissant et efficace.</p>

<p>Song-ups Pékin Science et Technology Co., Ltd pour la UCenterLes développeurs de produits, en fonction de propriété indépendante UCenter Produits auteur, Pékin Sing-up Technology Co., Ltd au site de http://www.comsenz.com, UCenter Adresse du site Web est http://www.discuz.com, UCenter Site officiel pour le Forum http://www.discuz.net.</p>

<p>UCenter Droit d\'auteur a été enregistré dans l\'Administration Nationale du Copyright de la République populaire, En droit d\'auteur et les traités internationaux Utilisateur:. S\'agisse de particuliers ou d\'organisations, lucratives ou non, la façon d\'utiliser (y compris à des fins d\'apprentissage et de recherche), sont tenus de lire attentivement cet accord, comprendre, accepter et respecter l\'accord de tous termes, avant de commencer à utiliser le logiciel de UCenter.</p>

<p>Ce Contrat de Licence s\'applique à et seulement pour UCenter 1.x Version, Song-ups Pékin Science et Technology Co., Ltd a l\'interprétation finale de cet accord de licence.</p>

<h3>I. Le droit de licence</h3>
<ol>
<li>Vous pouvez respecter pleinement l\'accord de licence utilisateur final, basé sur le logiciel utilisé dans cet usage non commercial, sans avoir à payer les frais de licence de droit d\'auteur du logiciel.</li>
<li>Vous pouvez être lié par les dispositions de l\'accord dans les limites et modifier le code source UCenter (si disponible) ou le style d\'interface pour répondre à vos exigences du site.</li>
<li>Utilisez ce logiciel pour construire votre propre site web dans toutes les informations sur les membres, des articles et des informations liées à la propriété, et indépendant de prendre sur les obligations juridiques liées à la teneur article.</li>
<li>Pour obtenir une licence commerciale, vous pouvez utiliser ce logiciel à des fins commerciales, alors que selon le type de licence achetée dans la période à déterminer le support technique, support technique, les méthodes et les contenus de soutien technique, à partir du moment de l\'achat, le soutien technique dans la période spécifiée de temps s\'est écoulé façon d\'obtenir la gamme spécifiée de services de soutien technique. utilisateurs autorisés ont le pouvoir de réfléchir et de commenter, avec des commentaires pour être une considération primordiale, mais doit être adoptée supporte pas les cadres ou frames promesse ou une garantie.</li>
</ol>

<h3>II. Contraintes et les restrictions stipulées dans l\'accord</h3>
<ol>
<li>Business licence a pas été avant, ce logiciel ne peuvent être utilisés à des fins commerciales (y compris mais non limité à des sites Web d\'entreprise, site Web d\'entreprise, à des fins commerciales ou site web lucratif). Acheter une licence commercialeSvp. vous vous connecterhttp://www.discuz.com Référence des instructions, Vous pouvez aussi appeler 8610-51657885 pour plus de détails.</li>
<li>Aucune partie de ce logiciel ou sa licence associé commercial à louer, vendre, hypothéquer ou concéder des sous-licences.</li>
<li>En tout cas, qui est, peu importe comment les utiliser, sans modification ou d\'aménagement paysager, les changements dans quelle mesure, aussi longtemps que l\'ensemble UCenter utiliser tout ou partie, sans l\'autorisation écrite du pied de page à la UCenter Sing un nouveau nom et la Science de Pékin et Technology Co., Ltd sous le site Web de Creative (http://www.comsenz.com、http://www.discuz.com Ou http://www.discuz.net） Le lien doit être maintenu, et non pas supprimées ou modifiées.</li>
<li>Interdit toute UCenter tout ou partie du développement sur ​​la base de toute version dérivée, version modifiée ou de tiers pour la version re-distribution.</li>
<li>si vous ne respectez pas les termes du présent Contrat, votre licence sera résilié, les droits du titulaire de permis sera retiré, et assumer la responsabilité juridique correspondante.</li>
</ol>

<h3>III. Garantie limitée et limitation de responsabilité</h3>
<ol>
<li>Le logiciel et la documentation qui l\'accompagne ne ne pas fournir toute garantie expresse ou implicite sous la forme d\'une indemnisation ou une offre de.</li>
<li>Volontaire et l\'utilisateur en utilisant le logiciel, vous devez comprendre les risques de l\'utilisation de ce logiciel, de ne pas acheter des produits dans le service technique, nous ne promettons pas de fournir toute forme d\'appui technique, l\'utilisation du mandat ou d\'assumer toute utilisation de ce logiciel de problèmes Les responsabilités pertinentes.</li>
<li>Sing-ups Pékin Science et Technology Co., Ltd n\'utilise pas le logiciel pour construire le site responsable des articles ou des informations.</li>
</ol>

<p>Associés UCenter Contrat de licence utilisateur final, les détails de licence commerciale et des services techniques, par UCenter Exclusif site officiel de Pékin Sing une société à responsabilité limitée nouvelle a créé la technologie sans préavis, Contrat de licence pour modifier les pouvoirs et la liste des prix des services, liste de prix ou de l\'accord révisé a changé depuis la date de l\'entrée en vigueur des nouveaux utilisateurs autorisés.</p>

<p>Formulaire électronique d\'un accord de licence écrit que les deux parties ont signé le même accord, Un effet compléter et juridique équivalent. Une fois que vous démarrez le UCenter installation, est réputé pour bien comprendre et accepter les termes du présent Accord, dans la jouissance des pouvoirs conférés par ces dispositions dans le même temps, par les contraintes pertinentes et les limites. Accords dans la mesure permise comportement que serait une violation directe de l\'accord de licence et constitue une violation du droit d\'auteur, nous nous réservons le droit de résilier l\'autorisation, doit être commandé d\'arrêter les dégâts, et la réserve de l\'autorité responsable.</p></div>',
	'uc_installed'		=> 'Vous avez installé UCenter, Si vous avez besoin de réinstaller, Svp. supprimer data/install.lock fichier', // '您已经安装过 UCenter, 如果需要重新安装, 请删除 data/install.lock 文件'
	'i_agree'		=> 'J\'ai lu attentivement, Et acceptez les termes de tous les contenus', // '我已仔细阅读, 并同意上述条款中的所有内容'
	'supportted'		=> 'Support', // 'Support'
	'unsupportted'		=> 'Non pris en charge', // '不支持'
	'max_size'		=> 'Support/Taille maximale', // '支持/最大尺寸'
	'project'		=> 'Projet', // '项目'
	'ucenter_required'	=> 'UCenter Configuration souhaitée', // 'UCenter 所需配置'
	'ucenter_best'		=> 'UCenter optimales', // 'UCenter 最佳'
	'curr_server'		=> 'Serveur Actuel', // '当前服务器'
	'env_check'		=> 'Inspection Environnement', // '环境检查'
	'os'			=> 'Système Exploitation', // '操作系统'
	'php'			=> 'PHP Version', // 'PHP 版本'
	'attachmentupload'	=> 'Pièce jointe télécharger', // '附件上传'
	'unlimit'		=> 'Aucune restriction', // '不限制'
	'version'		=> 'Version', // '版本'
	'gdversion'		=> 'GD Bibliothèque', // 'GD 库'
	'allow'			=> 'Autoriser ', // '允许 '
	'unix'			=> 'Similaire à unix', // '类Unix'
	'diskspace'		=> 'Espace disque', // '磁盘空间'
	'priv_check'		=> 'Répertoire, vérifier les autorisations du fichier', // '目录、文件权限检查'
	'func_depend'		=> 'Fonction de Vérification des dépendances', // '函数依赖性检查'
	'func_name'		=> 'Nom de la fonction', // '函数名称'
	'check_result'		=> 'Les résultats des tests', // '检查结果'
	'suggestion'		=> 'Proposition', // '建议'
	'advice_mysql'		=> 'Svp. Vérification mysql Module est correctement chargé', // '请检查 mysql 模块是否正确加载'
	'advice_fopen'		=> 'Cette fonction nécessite php.ini Dans allow_url_fopen options ouvertes.Svp. contacter le domaine espace, Ouvert pour déterminer la fonction', // '该函数需要 php.ini 中 allow_url_fopen 选项开启.请联系空间商, 确定开启了此项功能'
	'advice_file_get_contents'	=> 'Cette fonction nécessite php.ini Dans allow_url_fopen options ouvertes.Svp. contacter le domaine espace, Ouvert pour déterminer la fonction', // '该函数需要 php.ini 中 allow_url_fopen 选项开启.请联系空间商, 确定开启了此项功能'
	'advice_xml'		=> 'Cette fonction nécessite PHP Soutien XML.Svp. contacter le domaine espace, Ouvert pour déterminer la fonction', // '该函数需要 PHP 支持 XML.请联系空间商, 确定开启了此项功能'
	'none'			=> 'Aucun',  // '无'

	'dbhost'	=> 'Serveur de Base',  // '数据库服务器'
	'dbuser'	=> 'Nom utilisateur Base de données',  // '数据库用户名' 
	'dbpw'		=> 'Mot de Passe Base de Données',  //  '数据库密码' 
	'dbname'	=> 'Nom de la Base', // '数据库名' 
	'tablepre'	=> 'Préfixe de table', // 数据表前缀

	'ucfounderpw'	=> 'Fondateur Mot de Passe',  // '创始人密码'
	'ucfounderpw2'	=> 'Répétez le mot de passe fondateur',  // '重复创始人密码'

	'create_table'	=> 'Etablir une table de données',  // '建立数据表'
	'succeed'	=> 'Succès ',  // '成功 '
);