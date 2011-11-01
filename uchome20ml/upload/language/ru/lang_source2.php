<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_source.php 12489 2009-07-01 06:41:34Z xupeng $

	Common FrontEnd Language Sentences

	Written by Valery Votintsev, aka "vot" [at] sources.ru
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_lang = array (
// common
	'mtags' 		=> 'Группы',//'群组',
	'group'			=> 'Группа',//'群组',
	'groups'		=> 'Группы',//'群组',
	'events'		=> 'События',//'活动',
	'friend_group_0'	=> 'Прочие',//'其他',
	'friend_group_8'	=> 'Еще не знакомые',//'不认识',
	'friend_group_9'	=> 'Семья',//'不认识',
	'wall_board'		=> 'Сообщения на Стене',//'留言板'
	'share_notices'		=> 'Извещения о закладке',//'分享通知',
	'units'			=> 'ед.',//'个',
	'points'		=> 'points',//'积分',
	'points_num'		=> 'points',//'个积分',

//js.php
	'no_data'		=> 'Нет данных.',//'No data.',
	'no_ads'		=> 'Нет рекламы.',//'No Ads.',

//data/data_task.php

//editor.php

	'wisiwyg'		=> 'WISIWYG',//'切换到多媒体',
	'cut'			=> 'Вырезать',//'剪切',
//''	=> 'Копировать',//'复制',
	'paste'			=> 'Вставить',//'粘贴',
	'font'			=> 'Фонт',//'字体',
	'font_size'		=> 'Размер шрифта',//'字号',
	'bold'			=> 'Жирный',//'加粗',
	'italic'		=> 'Наклонный',//'斜体',
	'underline'		=> 'Подчеркнутый',//'下划线',
	'font_color'		=> 'Цвет шрифта',//'字体颜色',
	'align'			=> 'Выравнивание',//'对齐',
	'list'			=> 'Список',//'编号',
	'indent'		=> 'Отступ',//'缩进',
	'link_add'		=> 'Добавить ссылку',//'超链接',
	'link_del'		=> 'Удалить ссылку',//'移除链接',
	'image_link'		=> 'URL изображения',//'引用图片',
	'flash_link'		=> 'URL FLASH-видео',//'引用视频FLASH',
//'emoticons'	=> 'Смайлы',//'插入表情',
	'graffiti'		=> 'Граффити',//'涂鸦',
	'content_restore'	=> 'Восстановить текст',//'恢复内容',
	'plain_text'		=> 'Простой текст',//'切换到纯文本',
//	'times_new_roman'	=> 'Times New Roman',//'宋体',
//	''	=> 'Bold???',//'黑体',
//	''	=> 'Italic_GB2312',//'楷体_GB2312',
//	''	=> 'Official script',//'隶书',
//	''	=> 'Fine round',//'幼圆',
	'xx_small'		=> 'xx-Small',//'极小',
	'x_small'		=> 'x-Small',//'特小',
	'small'			=> 'Мелкий',//'小',
	'medium'		=> 'Средний',//'中',
	'large'			=> 'Большой',//'大',
	'list_numbered'		=> 'Нумерованный список',//'数字列表',
	'list_symbolic'		=> 'Буквенный список',//'符号列表',
	'align_left'		=> 'Влево',//'左对齐',
	'align_center'		=> 'По сентру',//'居中对齐',
	'align_right'		=> 'Вправо',//'右对齐',
	'indent_add'		=> 'Добавить отступ',//'增加缩进',
	'indent_del'		=> 'Убрать отступ',//'减少缩进',
	'dark_red'		=> 'Темно-красный',//'暗红色',
	'purple'		=> 'Фиолетовый',//'紫色',
	'red'			=> 'Красный',//'红色',
	'bright_pink'		=> 'Ярко-розовый',//'鲜粉色',
	'dark_blue'		=> 'Темно-синий',//'深蓝色',
	'blue'			=> 'Синий',//'蓝色',
	'lake_blue'		=> 'Морской волны',//'湖蓝色',
	'blue_green'		=> 'Сине-зеленый Cyan',//'蓝绿色',
	'green'			=> 'Зеленый',//'绿色',
	'olive'			=> 'Оливковый',//'橄榄色',
	'light_green'		=> 'Светло-зеленый',//'浅绿色',
	'orange'		=> 'Оранжевый',//'橙黄色',
	'black'			=> 'Черный',//'黑色',
	'gray'			=> 'Серый',//'灰色',
	'silver'		=> 'Серебряный',//'银色',
	'white'			=> 'Белый',//'白色',
	'enter_link'		=> 'Введите адрес ссылки для выделенного текста',//'请输入选定文字链接地址',
//'form_sure_yes'	=> '',//'确定',
	'enter_image_url'	=> 'Введитн URL изображения',//'请输入图片URL地址',
	'enter_video_url'	=> 'Введите тип видео и его URL',//'请输入视频URL地址',
	'flash_animation'	=> 'Flash',//'Flash动画',
	'media_video'		=> 'Media Video',//'Media视频',
	'real_video'		=> 'Real Video',//'Real视频',


//---- SOURCE -------------------------------------------
//source/task/avatar.php

	// This line is for lang_showmessage.php:
	'uc_update_avatar'	=> 'Для выполнения данной операции необходимо обновить в UCenter файл avatar.php.<br>Скачайте архив и обновите файл в корневой директории UCenter.<br><a href="http://u.discuz.net/download/avatar.zip" target="_blank"> http://u.discuz.net/download/avatar.zip</a>',//'这个功能要求您的UCenter的Server端的 avatar.php 程序需要进行升级.<br>如果您是本站管理员,请通过下面的地址下载 avatar.php 文件的压缩包,并覆盖您的UCenter根目录中的同名文件即可.<br><a href="http://u.discuz.net/download/avatar.zip" target="_blank">http://u.discuz.net/download/avatar.zip</a>'.//


	'male'			=> 'Мужской',//'帅哥',
	'female'		=> 'Женский',//'美女',
	'find'			=> 'Найти',//'找到',
	'recommended_to_you'	=> 'Ваш друг рекомендует Вам:',//'朋友,推荐给您:',
	'avatar_task_wizard'	=> 'Инструкция по выполнению задачи:
		<ul>
		<li> 1. <a href="cp.php?ac=avatar" target="_blank">Откройте в новом окне страницу настройки аватара</a>;</li>
		<li> 2. В открывшемся окне закрузите и откорректируйте изображение для аватара.</li>
		</ul>',
		/*'请按照以下的说明来参与本任务: 
		<ul>
		<li>1. <a href="cp.php?ac=avatar" target="_blank">新窗口打开个人头像设置页面</a>；</li>
		<li>2. 在新打开的设置页面中,请选择您的照片进行上传编辑.</li>
		</ul>',*/


//source/task/blog.php

	'blog_task_wizard'	=> '<strong>Инструкция по выполнению задачи:</strong>
		<ul>
		<li>1. <a href="cp.php?ac=blog" target="_blank">Откройте в новом окне страницу создания блог-поста</a>;</li>
		<li>2. В открывшемся окне создайте и опубликуйте свой первый пост.</li>
		</ul>',
		/*
			'<strong>请按照以下的说明来参与本任务: </strong>
		<ul>
		<li>1. <a href="cp.php?ac=blog" target="_blank">新窗口打开发表日志页面</a>；</li>
		<li>2. 在新打开的页面中,书写自己的第一篇日志,并进行发布.</li>
		</ul>', */

//source/task/email.php

	'email_task_wizard'	=> '<strong>Инструкция по выполнению задачи:</strong>
		<ul>
		<li><a href="cp.php?ac=profile&op=contact" target="_blank">Откройте в новом окне страницу редактирования своих контактов</a>;</li>
		<li>В открывшемся окне заполните свой email адрес, и коикните по кнопке "Проверить Email";</li>
		<li>В течение нескольких минут Вы получите на указанный Email сообщение, в котором будет приведена ссылка для верификации Вашего почтового ящика. Для верификации Вам нужно будет перейти по этой ссылке.</li>
		</ul>',
		/*'<strong>请按照以下的说明来参与本任务: </strong>
		<ul>
		<li><a href="cp.php?ac=profile&op=contact" target="_blank">新窗口打开账号设置页面</a>；</li>
		<li>在新打开的设置页面中,将自己的邮箱真实填写,并点击&ldquo;验证邮箱&rdquo;按钮；</li>
		<li>几分钟后,系统会给你发送一封邮件,收到邮件后,请按照邮件的说明,访问邮件中的验证链接就可以了.</li>
		</ul>',
		*/

//source/task/email.php

	'friend_task_wizard'	=> '<strong>Инструкция по выполнению задачи:</strong>
		<ul>
		<li>1. <a href="cp.php?ac=friend&op=find" target="_blank">Откройте в новом окне страницу для поиска друзей</a>;</li>
		<li>2. В открывшемся окне система автоматически выдаст рекомендации по поиску и добавлению друзей. Кроме того, Вы можете самостоятельно задасть свои собственные условия для поиска интересующих Вас друзей;</li>
		<li>3. Затем Вам следует дождаться подтверждения Вашего запроса от всех, кому Вы отправили запрос о дружбе.</li>
		</ul>',

		/*'<strong>请按照以下的说明来参与本任务: </strong>
		<ul>
		<li>1. <a href="cp.php?ac=friend&op=find" target="_blank">新窗口打开寻找好友页面</a>；</li>
		<li>2. 在新打开的页面中,可以将系统自动给你找到的推荐用户加为好友,也可以自己设置条件寻找并添加为好友；</li>
		<li>3. 接下来,您还需要等待对方批准您的好友申请.</li>
		</ul>',*/


//source/task/gift.php

	'gift_task_result'	=> '<p>Предоставляем Вам "Обзор популярных блогов":</p><br><ul class="line_list">',
		/*
		'<p>给您送上一份《热门日志导读》看看吧: </p><br><ul class="line_list">',
		*/	
	'hot_value'		=> 'Топ',//'人推荐',
//	'hot'			=> 'Топ',//'热', //vot: is THE SAME MEANING!!!

//source/task/invite.php

	'invite_task_warn1'	=> '<p style="color:red;">Поздравляем, Вы уже пригласили ',//'<p style="color:red;">哇,厉害,您现在已经邀请了 ',
	'invite_task_warn2'	=> ' друзей. Продолжаем работу!</p><br>',//' 个好友了.继续努力！</p><br>',
	'invite_task_guide'	=> '<strong>Инструкция по выполнению задачи:</strong>
		<ul class="task">
		<li>Откройте в новом окне <a href="cp.php?ac=invite" target="_blank">Страницу приглашения друзей</a>;</li>
		<li>Используйте ICQ, MSN, Jabber, QIP и т.д. для отправки друзьям приглашения и специальной ссылки с кодом;</li>
		<li>Дождитесь, пока не менее 10 человек проследуют по отправленной Вами ссылкею. После чего задача считается выполненной.</li>
		</ul>',
		/*'<strong>请按照以下的说明来完成本任务: </strong>
		<ul class="task">
		<li>在新窗口中打开<a href="cp.php?ac=invite" target="_blank">好友邀请页面</a>；</li>
		<li>通过QQ,MSN等IM工具,或者发送邮件,把邀请链接告诉你的好友,邀请他们加入进来吧；</li>
		<li>您需要邀请10个好友才算完成.</li>
		</ul>',*/


//source/task/profile.php

	'birthyear'		=> 'Год рождения',//'生日(年)',
	'birthmonth'		=> 'Месяц рождения',//'生日(月)',
	'birth_day'		=> 'День рождения',//'生日(日)',
	'marry'			=> 'Семейный статус',//'婚恋状态',
	'birthprovince'		=> 'Место рождения (Регион)',//'家乡(省)',
	'birthcity'		=> 'Город рождения',//'家乡(市)',
	'resideprovince'	=> 'Регион проживания',//'居住地(省)',
	'residecity'		=> 'Город проживания',//'居住地(市)',
	'profile_reside_result'	=> '<p>Участники из Вашего города, добавьте их в друзья: </p>',//'<p>为您找到同城的会员,赶快加为好友吧: </p>',
	'profile_gender_result'	=> '<p>Популярные участники противоположного пола, добавьте их в друзья: </p>',//'<p>为您找到异性热门会员,赶快加为好友吧: </p>',
	'profile_task_wizard'	=> '<strong>Заполните следующие поля в Вашем профиле:</strong><br>
		<span style="color:red;">\\1</span><br><br>
		<strong>Инструкция по выполнению задачи:</strong>
		<ul>
		<li>Откройте в новом окне <a href="cp.php?ac=profile" target="_blank">Страницу персональных данных</a>;</li>
		<li>Заполните указанные поля.</li>
		</ul>',
		/*'<strong>您还有以下个人资料项需要补充完整: </strong><br>
		<span style="color:red;">\\1</span><br><br>
		<strong>请按照以下的说明来完成本任务: </strong>
		<ul>
		<li><a href="cp.php?ac=profile" target="_blank">新窗口打开个人资料设置页面</a>；</li>
		<li>在新打开的设置页面中,将上述个人资料补充完整.</li>
		</ul>',*/

);

