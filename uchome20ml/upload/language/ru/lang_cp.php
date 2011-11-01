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

	'by'			=> 'от',//'通过',
	'tab_space'		=> ' ',//' ',
	'feed_comment_space'	=> '{actor} оставил сообщение на стене {touser}',//'{actor} 在 {touser} 的留言板留了言',
	'feed_comment_image'	=> '{actor} прокомментировал изображение {touser}',//'{actor} 评论了 {touser} 的图片',
	'feed_comment_blog' 	=> '{actor} прокомментировал {touser} блог {blog}',//'{actor} 评论了 {touser} 的日志 {blog}',
	'feed_comment_poll' 	=> '{actor} прокомментировал {touser} голосование {poll}',//'{actor} 评论了 {touser} 的投票 {poll}',
	'feed_comment_event'	=> '{actor} прокомментировал {touser} событие {event}',//'{actor} 在 {touser} 组织的活动 {event} 中留言了',
	'feed_comment_share'	=> '{actor} прокомментировал закладку {share} от {touser}',//'{actor} 对 {touser} 分享的 {share} 发表了评论',
	'share'				=> 'Закладки',//'分享',
	'share_action'			=> 'Добавить закладку',//'分享了',
	'note_wall'			=> 'оставил новое <a href="\\1">сообщение</a> на Вашей стене',//'在留言板上给你<a href="\\1">留言</a>',
	'note_wall_reply'		=> 'оставил новый <a href="\\1">ответ</a> на Вашей стене',//'回复了你的<a href="\\1">留言</a>',
	'note_pic_comment'		=> 'прокомментировал Ваше <a href="\\1">изображение</a>',//'评论了你的<a href="\\1">图片</a>',
	'note_pic_comment_reply'	=> 'ответил на Ваш <a href="\\1">кооментарий к изображению</a>',//'回复了你的 <a href="\\1">图片评论</a>',
	'note_blog_comment'		=> 'оставил комментарий в Вашем блоге <a href="\\1">\\2</a>', //'评论了你的日志 <a href="\\1">\\2</a>',
	'note_blog_comment_reply'	=> 'ответил на Ваш <a href="\\1">комментарий в блоге</a>', //'回复了你的<a href="\\1">日志评论</a>',
	'note_poll_comment'		=> 'прокомментировал Ваше голосование <a href="\\1">\\2</a>', //'评论了你的投票 <a href="\\1">\\2</a>',//
	'note_poll_comment_reply'	=> 'ответил на Ваш <a href="\\1">комментрий к голосованию</a>', //'回复了你的<a href="\\1">投票评论</a>',//
	'note_share_comment'		=> 'прокомментировал Ваше <a href="\\1">Share</a>', //'评论了你的 <a href="\\1">分享</a>',//
	'note_share_comment_reply'	=> 'ответил на Ваше share <a href="\\1">ответ</a>', //'回复了你的<a href="\\1">分享评论</a>',//
	'note_event_comment'		=> 'прокомментировал Ваше  <a href="\\1">событие</a>', //'在你组织的活动里<a href="\\1">留言</a>了',//
	'note_event_comment_reply'	=> 'ответил на Ваш <a href="\\1">комментарий</a> к событию', //'回复了你在活动中的<a href="\\1">留言</a>',//
	'note_show_out'			=> 'Посетил Вашу страницу, и получил за это бонус', //'访问了你的主页后,你在竞价排名榜中最后一个积分也被消费掉了',//
	'note_space_bar'		=> 'Рекомендовал в топ Ваш профиль', //'把你设置为站点推荐用户了',//

	'note_click_blog'	=> 'Рекомендовал в топ Ваш блог <a href="\\1">\\2</a>',//'对你的日志 <a href="\\1">\\2</a> 做了表态',
	'note_click_thread'	=> 'Рекомендовал в топ Ваш топик <a href="\\1">\\2</a>',//'对你的话题 <a href="\\1">\\2</a> 做了表态',
	'note_click_pic'	=> 'Рекомендовал в топ Ваше <a href="\\1">изображение</a>',//对你的 <a href="\\1">图片</a> 做了表态',

	'wall_pm_subject'	=> 'Новое сообщение на Вашей Стене', //'您好,我给您留言了',//
	'wall_pm_message'	=> 'На Вашей стене оставлено новое сообщение.<br><br>[url=\\1]Ссылка для просмотра отклика.[/url]', //'我在您的留言板给你留言了,[url=\\1]点击这里去留言板看看吧[/url]',//
	'note_showcredit'	=> 'Вы получили денежный подарок \\1.<br><br>Этот подарок поможет Вам улучшить Вашу позицию в <a href="space.php?do=top">Топ-листе</a>.' ,//'赠送给您 \\1 个竞价积分,帮助提升在<a href="space.php?do=top">竞价排行榜</a>中的名次',//
	'feed_showcredit'	=> '{actor} заплатил {credit} points чтобы улучшить позицию {fusername} в <a href="space.php?do=top">Топ-Листе</a>.',//'{actor} 赠送给 {fusername} 竞价积分 {credit} 个，帮助好友提升在<a href="space.php?do=top">竞价排行榜</a>中的名次',
	'feed_showcredit_self'	=> '{actor} заплатил {credit} points чтобы поднять себя любимого в <a href="space.php?do=top">Топ-Листе</a>.',//'{actor} 增加竞价积分 {credit} 个，提升自己在<a href="space.php?do=top">竞价排行榜</a>中的名次',
	'feed_doing_title'	=> '{actor} написал твит: {message}',//'{actor}：{message}',
	'note_doing_reply'	=> 'ответил на Ваш <a href="\\1">твит</a>.',//'在<a href="\\1">记录</a>中对你进行了回复',
	'feed_friend_title'	=> '{actor} и {touser} стали друзьями.',//'{actor} 和 {touser} 成为了好友',
	'note_friend_add'	=> 'и Вы стали друзьями.',//'和你成为了好友',
	'note_poll_invite'	=> 'пригласил Вас принять участие в опросе <a href="\\1">&laquo;\\2&raquo;</a> от \\3.',//'邀请你一起参与 <a href="\\1">《\\2》</a>的\\3投票',
	'reward'		=> 'Бонус',//'悬赏',
	'reward_info'		=> 'Участие в опросе добавит Вам \\1 points.',//'参与投票可获得  \\1 积分',
	'poll_separator'	=> '","',//'"、"',

	'feed_upload_pic'	=> '{actor} загрузил новое изображение',//'{actor} 上传了新图片',

	'feed_click_blog'	=> '{actor} оценил символом &ldquo;{click}&rdquo; блог пользователя {touser} {subject}',//'{actor} 送了一个“{click}”给 {touser} 的日志 {subject}',
	'feed_click_thread'	=> '{actor} оценил символом &ldquo;{click}&rdquo; топик пользователя {touser} {subject}',//'{actor} 送了一个“{click}”给 {touser} 的话题 {subject}',
	'feed_click_pic'	=> '{actor} оценил символом &ldquo;{click}&rdquo; изображение пользователя {touser}',//'{actor} 送了一个“{click}”给 {touser} 的图片',

	'friend_subject'	=> '<a href="\\2">\\1 предложил Вам стать друзьями.</a>',//'<a href="\\2">\\1 请求加你为好友</a>',
	'comment_friend'	=> '<a href="\\2">\\1 отправил Вам сообщение</a>.</a>',//'<a href="\\2">\\1 给你留言了</a>',
	'photo_comment'		=> '<a href="\\2">\\1 прокомментировал Ваше изображение.</a>',//'<a href="\\2">\\1 评论了你的照片</a>',
	'blog_comment'		=> '<a href="\\2">\\1 прокомментировал Ваш блог.</a>',//'<a href="\\2">\\1 评论了你的日志</a>',
	'poll_comment'		=> '<a href="\\2">\\1 прокомментировал Ваш опрос.</a>',//'<a href="\\2">\\1 评论了你的投票</a>',
	'share_comment'		=> '<a href="\\2">\\1 прокомментировал Ваше share.</a>',//'<a href="\\2">\\1 评论了你的分享</a>',
	'friend_pm'		=> '<a href="\\2">\\1 отправил Вам приватное сообщение.</a>',//'<a href="\\2">\\1 给你发私信了</a>',
	'poke_subject'		=> '<a href="\\2">\\1 отправил Вам приветствие.</a>',//'<a href="\\2">\\1 向你打招呼</a>',
	'mtag_reply'		=> '<a href="\\2">\\1 ответил в Вашем топике.</a>',//'<a href="\\2">\\1 回复了你的话题</a>',
	'event_comment'		=> '<a href="\\2">\\1 прокомментировал Ваше событие.</a>',//'<a href="\\2">\\1 评论了你的活动</a>',

	'friend_pm_reply'	=> '\\1 ответил на Ваше приватное сообщение.',//'\\1 回复了你的私信',
	'comment_friend_reply'	=> '\\1 ответил на Ваш комментарий.',//'\\1 回复了你的留言',
	'blog_comment_reply'	=> '\\1 ответил на Ваш комментарий к блогу.',//'\\1 回复了你的日志评论',
	'photo_comment_reply'	=> '\\1 ответил на Ваш комментарий к изображению.',//'\\1 回复了你的照片评论',
	'poll_comment_reply'	=> '\\1 ответил на Ваш комментарий в голосовании.',//'\\1 回复了你的投票评论',
	'share_comment_reply'	=> '\\1 ответил на Ваш комментарий к share',//'\\1 回复了你的分享评论',
	'event_comment_reply'	=> '\\1 ответил на Ваш комментарий к событию.',//'\\1 回复了你的活动评论',

	'invite_subject'	=> '\\1 приглашает Вас посетить \\2, и стать друзьями',//'\\1邀请您加入\\2，并成为TA的好友',
	'invite_message'	=> '<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Привет, это "\\2". Я приглашаю Вас посетить мою домашнюю страницу на сайте &quot;\\3&quot;, и стать моим другом.</h3><br>
		Став друзьями мы сможем совместно обсудить интересующие нас темы, обменяться идеями и фотографиями.<br><br>Буду рад ответить на Ваши вопросы.<br>
		<br>
		P.S.:<br>
		\\4
		<br><br>
		<strong>Для получения приглашения перейдите по привденной ниже ссылке:</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>Если у Вас уже есть аккаунт на сайте &quot;\\3&quot;, воспользуйтесь этой ссылкой для посещения моей домашней страницы:</strong><br>
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

	'app_invite_subject'	=> '\\1 приглашает Вас присоединиться к &quot;\\2&quot;, и вместе поиграть в &quot;\\3&quot;',//'\\1邀请您加入\\2，一起来玩\\3',
	'app_invite_message'	=> '<table border="0">
		<tr>
		<td valign="top">\\1</td>
		<td valign="top">
		<h3>Привет, это &quot;\\2&quot; с сайта &quot;\\3&quot;.<br>Приглашаю Вас совместно поиграть в &quot;\\7&quot;.</h3><br>
		<br>
		PS: <br>
		\\4
		<br><br>
		<strong>Для получения приглашения в &quot;\\7&quot; перейдите по привденной ниже ссылке:</strong><br>
		<a href="\\5">\\5</a><br>
		<br>
		<strong>Если у Вас уже есть аккаунт на сайте &quot;\\3&quot;, воспользуйтесь этой ссылкой для посещения моей домашней страницы:</strong><br>
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

	'feed_mtag_add'		=> '{actor} создал новую группу {mtags}',//'{actor} 创建了新群组 {mtags}',
	'note_members_grade_-9'	=> 'Сообщение от группы <a href="space.php?do=mtag&tagid=\\1">\\2</a>: Покиньте группу!',//'将你从群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 请出',
	'note_members_grade_-2'	=> 'Ваш статус в группе <a href="space.php?do=mtag&tagid=\\1">\\2</a> изменён на &quot;Pending&quot;.',//'将你在群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的成员身份修改为 待审核',
	'note_members_grade_-1'	=> 'Ваш статус в группе <a href="space.php?do=mtag&tagid=\\1">\\2</a> изменён на &quot;Read Only&quot;.',//'将你在群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 中禁言',
	'note_members_grade_0'	=> 'Ваш статус в группе <a href="space.php?do=mtag&tagid=\\1">\\2</a> изменен на &quot;General Member&quot;.',//'将你在群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的成员身份修改为 普通成员',
	'note_members_grade_1'	=> 'Ваш статус в группе <a href="space.php?do=mtag&tagid=\\1">\\2</a> изменён на &quot;Star Member&quot;.',//'将你设为了群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的明星成员',
	'note_members_grade_8'	=> 'Ваш статус в группе <a href="space.php?do=mtag&tagid=\\1">\\2</a> изменён на &quot;Комодератор&quot;.',//'将你设为了群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的副群主',
	'note_members_grade_9'	=> 'Ваш статус в группе <a href="space.php?do=mtag&tagid=\\1">\\2</a> изменён на &quot;Модератор&quot;.',//'将你设为了群组 <a href="space.php?do=mtag&tagid=\\1">\\2</a> 的群主',
	'feed_mtag_join'	=> '{actor} присоединился к группе {mtag} ({field}).',//'{actor} 加入了群组 {mtag} ({field})',
	'mtag_joinperm_2'	=> 'Для присоединения к группе требуется получить приглашение.',//'需邀请才可加入',
	'feed_mtag_join_invite'	=> '{actor} принял предложение от {fromusername} войти в группу {mtag} ({field})',//'{actor} 接受 {fromusername} 的邀请，加入了群组 {mtag} ({field})',
	'person'		=> 'персон',//'人',
	'delete'		=> 'удалить',//'删除',

	'space_update'		=> '{actor} обновил свою домашнюю страницу.',//'{actor} 被SHOW了一下',

	'active_email_subject'	=> 'Верификация E-mai адреса',//'您的邮箱激活邮件',
	'active_email_msg'	=> 'Для активации Вашего E-Mail адреса скопируйте нижеприведенную ссылку в адресную строку Вашего браузера.<br>Ссылка для активации E-mail:<br><a href="\\1">\\1</a>',//'请复制下面的激活链接到浏览器进行访问，以便激活你的邮箱。<br>邮箱激活链接:<br><a href="\\1">\\1</a>',
	'share_space'		=> 'добавил в закладки профиль',//'分享了一个用户'
	'note_share_space'	=> 'добавил в закладки Вашу домашнюю страницу',//'分享了你的空间',
	'share_blog'		=> 'добавил в закладки блог',//'分享了一篇日志',
	'note_share_blog'	=> 'добавил в закладки Ваш блог <a href="\\1">\\2</a>',//'分享了你的日志 <a href="\\1">\\2</a>',
	'share_album'		=> 'добавил в закладки альбом',//'分享了一个相册',
	'note_share_album'	=> 'добавил в закладки Ваш альбом <a href="\\1">\\2</a>',//'分享了你的相册 <a href="\\1">\\2</a>',
	'default_albumname'	=> 'Альбом по умолчанию',//'默认相册',
	'share_image'		=> 'добавил в закладки изображение',//'分享了一张图片',
	'album'			=> 'Альбом',//'相册',
	'note_share_pic'	=> 'добавил в закладки Ваше <a href="\\1">изображение</a> из альбома &quot;\\2&quot;',//'分享了你的相册 \\2 中的<a href="\\1">图片</a>',
	'share_thread'		=> 'добавил в закладки топик',//'分享了一个话题',
	'mtag'			=> 'Группа',//'群组',
	'note_share_thread'	=> 'добавил в закладки Ваш топик <a href="\\1">\\2</a>',//'分享了你的话题 <a href="\\1">\\2</a>',
	'share_mtag'		=> 'добавил в закладки группу',//'分享了一个群组',
	'share_mtag_membernum'	=> 'Участников: {membernum}',//'现有 {membernum} 名成员',
	'share_tag'		=> 'добавил в закладки тэг',//'分享了一个标签',
	'share_tag_blognum'	=> 'Используется в {blognum} блогах',//'现有 {blognum} 篇日志',
	'share_link'		=> 'добавил в закладки ссылку',//'分享了一个网址',
	'share_video'		=> 'добавил в закладки видео',//'分享了一个视频',
	'share_music'		=> 'добавил в закладки музыку',//'分享了一个音乐',
	'share_flash'		=> 'добавил в закладки Flash',//'分享了一个 Flash',
	'share_event'		=> 'добавил в закладки событие',//'分享了一个活动',
	'share_poll'		=> 'добавил в закладки опрос \\1',//'分享了一个\\1投票',
	'note_share_poll'	=> 'добавил в закладки Ваш опрос <a href="\\1">\\2</a>',//'分享了你的投票 <a href="\\1">\\2</a>',
	'event_time'		=> 'Время проведения',//'活动时间',
	'event_location'	=> 'Место проведения',//'活动地点',
	'event_creator'		=> 'Организатор',//'发起人',
	'feed_task'		=> '{actor} выполнил призовую задачу {task}',//'{actor} 完成了有奖任务 {task}',
	'feed_task_credit'	=> '{actor} выполнил задачу {task}, и получил бонус {credit} points.',//'{actor} 完成了有奖任务 {task}，领取了 {credit} 个奖励积分',
	'the_default_style'	=> 'Стиль по умолчанию',//'默认风格',
	'the_diy_style'		=> 'Произвольный стиль',//'自定义风格',
	'feed_thread'		=> '{actor} создал новый топик',//'{actor} 发起了新话题',
	'feed_eventthread'	=> '{actor} создал новый топик в событии',//'{actor} 发起了新活动话题',

	'feed_thread_reply'	=> '{actor} ответил пользователю {touser} в топике {thread}',//'{actor} 回复了 {touser} 的话题 {thread}',
	'note_thread_reply'	=> 'ответил в Вашем топике',//'回复了你的话题',
	'note_post_reply'	=> 'ответил на Ваш <a href=\\"\\3\\">ответ</a> в топике <a href=\\"\\1\\">\\2</a>',//'在话题 <a href=\\"\\1\\">\\2</a> 中回复了你的<a href=\\"\\3\\">回帖</a>',
	'thread_edit_trail'	=> '<ins class="modify">[Topic from \\1 in the \\2 was edited]</ins>',//'<ins class="modify">[本话题由 \\1 于 \\2 编辑]</ins>',
	'create_a_new_album'	=> 'Создать новый альбом',//'创建了新相册',
	'not_allow_upload'	=> 'У Вас нет прав для загрузки изображений',//'您现在没有权限上传图片',
	'get_passwd_subject'	=> 'Восстановление пароля по email',//'取回密码邮件',
	'get_passwd_message'	=> 'Вы должны В ТЕЧЕНИЕ ТРЁХ ДНЕЙ перейти по следующей ссылке для подтверждения сброса Вашего пароля:<br />\\1<br />(Если ссылка не "кликабельная", то просто скопируйте её в адресную строку Вашего браузера, и перейдите по ней)<br />Когда указанная страница откроется, Вы сможете ввести и подтвердить Ваш новый пароль для входа на сайт.',//'您只需在提交请求后的三天之内，通过点击下面的链接重置您的密码：<br />\\1<br />(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)<br />上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录了。',
	'file_is_too_big'	=> 'Файл слишком большой',//'文件过大',
	'feed_blog_password'	=> '{actor} опубликовал защищённый паролем блог {subject}',//'{actor} 发表了新加密日志 {subject}',
	'feed_blog'		=> '{actor} опубликовал новый блог',//'{actor} 发表了新日志',
	'feed_poll'		=> '{actor} создал новый опрос',//'{actor} 发起了新投票',
	'note_poll_finish'	=> 'Ваш опрос <a href="\\1">&laquo;\\2&raquo;</a> завершен. <a href="\\1">Подготовить отчет по результатам опроса</a>',//'您发起的<a href="\\1">《\\2》</a>的投票已结束,<a href="\\1">去写写投票总结</a>',
	'take_part_in_the_voting'		=> '{actor} проголосовал в опросе <a href="{url}">{subject}</a> пользователя {touser} и получил бонус {reward} points.',//'{actor} 参与了 {touser} 的{reward}投票 <a href="{url}">{subject}</a>',
	'lack_of_access_to_upload_file_size'	=> 'Загрузка файлов такого типа запрещена.',//'无法获取上传文件大小',
	'only_allows_upload_file_types'		=> 'Допускается загрузка файлов только с расширениями: jpg, jpeg, gif, png.',//'只允许上传jpg、jpeg、gif、png标准格式的图片',
	'unable_to_create_upload_directory_server'	=> 'Ошибка при создании каталога загрузок на сервере',//'服务器无法创建上传目录',
	'inadequate_capacity_space'		=> 'Недостаточно места на диске. Загрузка новых файлов невозможна.',//'空间容量不足，不能上传新附件',
	'mobile_picture_temporary_failure'	=> 'Ошибка на сервере при перемещении изображения из временного каталога в указанный',//'无法转移临时图片到服务器指定目录',
	'ftp_upload_file_size'			=> 'Загрузка по FTP отвергнута (недопустимый размер файла)',//'远程上传图片失败',
	'comment'		=> 'Комментарий',//'评论',
	'upload_a_new_picture'	=> 'загрузил новое изображение',//'上传了新图片',
	'upload_album'		=> 'загрузил альбом',//'更新了相册',
	'the_total_picture'	=> 'Всего изображений: \\1',//'共 \\1 张图片',
	'feed_invite'		=> '{actor} инициировал приглашение для {username}, и они стали друзьями',//'{actor} 发起邀请，和 {username} 成为了好友',
	'note_invite'		=> 'принял Ваше предложение стать друзьями',//'接受了您的好友邀请',
	'space_open_subject'	=> 'Come and take care of your personal home page about it',//'快来打理一下您的个人主页吧',
	'space_open_message'	=> 'Hi, today I went to see what your personal home page, find your own do not take care of anything like this. Quickly and see it. Address is: \\1space.php',//'hi，我今天去拜访了一下您的个人主页，发现您自己还没有打理过呢。赶快来看看吧。地址是：\\1space.php',
	'feed_space_open'	=> '{actor} зарегистрировался и создал профиль',//'{actor} 开通了自己的个人主页',
	
	'feed_profile_update_base'   	=> '{actor} обновил информацию в профиле',//'{actor} 更新了自己的基本资料',
	'feed_profile_update_contact'	=> '{actor} обновил контактную информацию',//'{actor} 更新了自己的联系方式',
	'feed_profile_update_edu'    	=> '{actor} обновил информацию об образовании',//'{actor} 更新了自己的教育情况',
	'feed_profile_update_work'   	=> '{actor} обновил информацию о месте работы ',//'{actor} 更新了自己的工作信息',
	'feed_profile_update_info'   	=> '{actor} обновил информацию об увлечениях и интересах',//'{actor} 更新了自己的兴趣爱好等个人信息',
	
	'apply_mtag_manager'	=> 'выразил желание стать модератором группы <a href="\\1">\\2</a>, и сообщил следующее:<br>\\3.<br><a href="\\1">(Перейти к управлению)</a>',//'想申请成为 <a href="\\1">\\2</a> 的群主，理由如下:\\3。<a href="\\1">(点击这里进入管理)</a>',
	'feed_add_attachsize'	=> '{actor} заплатил {credit} points для расширения своего пространства загрузки на {size}, и теперь может загрузить больше изображений. (<a href="cp.php?ac=credit&op=addsize">Я тоже хочу увеличить моё пространство загрузки!</a>)',//'{actor} 用 {credit} 个积分兑换了 {size} 附件空间，可以上传更多的图片啦(<a href="cp.php?ac=credit&op=addsize">我也来兑换</a>)',

	'event'			=> 'Событие',//'活动',
	'event_set_delete'	=> 'Администратор аннулировал Ваше событие \\1',//'管理员取消了您组织的活动 \\1',
	'event_set_verify'	=> 'Администратор одобрил Ваше событие <a href="\\1">\\2</a>',//'管理员审核通过了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_unverify'	=> 'Администратор НЕ одобрил Ваше событие <a href="\\1">\\2</a>',//'管理员审核没有通过您组织的活动 <a href="\\1">\\2</a>',
	'event_set_recommend'	=> 'Администратор рекомендовал Ваше событие <a href="\\1">\\2</a>',//'管理员推荐了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_unrecommend'	=> 'Администратор убрал из рекомендованных Ваше событие <a href="\\1">\\2</a>',//'管理员取消推荐了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_open'	=> 'Администратор ОТКРЫЛ Ваше событие <a href="\\1">\\2</a>',//'管理员开启了您组织的活动 <a href="\\1">\\2</a>',
	'event_set_close'	=> 'Администратор ЗАКРЫЛ Ваше событие <a href="\\1">\\2</a>',//'管理员关闭了您组织的活动 <a href="\\1">\\2</a>',
	'event_add'		=> '{actor} создал новое событие',//'{actor} 发起了新活动',
	'event_feed_info'	=> '<strong>{title}</strong><br/>Место проведения: {province} {city} {location} <br/>Время проведения: {starttime} - {endtime}',//'<strong>{title}</strong><br/>地点：{province} {city} {location} <br/>时间：{starttime} - {endtime}',
	'event_join'		=> '{actor} решил принять участие в событии <a href="space.php?do=event&id={eventid}">{title}</a> пользователя <a href="space.php?uid={uid}">{username}</a>',//'{actor} 参加了 <a href="space.php?uid={uid}">{username}</a> 的活动 <a href="space.php?do=event&id={eventid}">{title}</a>',
	'event_join_member'	=> 'принял участие в Вашем событии <a href="\\1">\\2</a>',//'参加了您组织的活动 <a href="\\1">\\2</a>',
	'event_quit_member'	=> 'отказался от участия в Вашем событии <a href="\\1">\\2</a>',//'退出了您组织的活动 <a href="\\1">\\2</a>',
	'event_join_verify'	=> 'Верификация участников события <a href="\\1">\\2</a>, Перейти к <a href="\\3">просмотру</a>',//'申请参加您组织的活动 <a href="\\1">\\2</a>，赶紧去<a href="\\3">审核</a>吧',
	'eventmember_set_verify'	=> 'Ваше участие в событии <a href="\\1">\\2</a> одобрено.',//'通过了您参加活动 <a href="\\1">\\2</a> 的申请',
	'eventmember_unset_verify'	=> 'Ваше участие в событии <a href="\\1">\\2</a> получило статус &quot;Pending&quot;.',//'把您在活动 <a href="\\1">\\2</a> 中的身份设为了待审核',
	'eventmember_set_admin'		=> 'Установить организаторов события <a href="\\1">\\2</a>',//'把您设为了活动 <a href="\\1">\\2</a> 的组织者',
	'eventmember_unset_admin'	=> 'Убрать организаторов события <a href="\\1">\\2</a>',//'取消了您作为活动 <a href="\\1">\\2</a> 的组织者身份',
	'eventmember_set_delete'	=> 'Просим Вас покинуть событие <a href="\\1">\\2</a>',//'把您请出了活动 <a href="\\1">\\2</a>',
	'event_feed_share_pic_title'	=>'{actor} добавил в закладки новый альбом для события',//'{actor} 共享了新照片到活动相册',
	'event_feed_share_pic_info'	=>'<b><a href="space.php?do=event&id={eventid}&view=pic">{title}</a></b><br/>Всего {picnum} изображений',//'<b><a href="space.php?do=event&id={eventid}&view=pic">{title}</a></b><br/>共 {picnum} 张照片',
	'event_accept_invite'		=> 'принял Ваше приглашение принять участие в событии <a href="\\1">\\2</a> ',//'接受您的邀请参加了活动 <a href="\\1">\\2</a> ',
	'event_accept_success'		=> 'Вы успешно присоединились к событию. Теперь Вы можете: <a href="\\1">принять участие в обсуждении</a>',//'成功参加该活动，您可以：<a href="\\1">立即访问该活动</a>',

	//Magic: source/magic/*
	'magicunit'		=> 'артефактов',//'个',
	'magic_note_wall'	=> 'оставил <a href="\\1">сообщение</a> на Вашей стене',//'在留言板上给你<a href="\\1">留言</a>',
	'magic_call'		=> 'В \\1 было упомянуто Ваше имя. <a href="\\2">Посмотреть</a>',//'在\\1中点了你的名，<a href="\\2">快去看看吧</a>',
	'magicuse_thunder_announce_title'	=> '<strong>{username} издал &ldquo;Sound of Thunder&rdquo;</strong>',//'<strong>{username} 发出了“雷鸣之声”</strong>',
	'magicuse_thunder_announce_body'	=> 'Привет всем!<br><a href="space.php?uid={uid}">Добро пожаловать на мою страничку</a>',//'大家好，我上线啦<br><a href="space.php?uid={uid}">欢迎来我家串个门</a>',
	'magic_present_note'			=> 'подарил Вам артефакт \\1, <a href="\\2">Посмотреть</a>',//'送给你一个道具 \\1, <a href="\\2">赶快去看看吧</a>',

	//User group will receive a prop upgrade
	'upgrade_magic_award'	=> 'Поздравляем! Ваш уровень повышен до \\1, и Вы получили следующий артефакт: \\2',//'恭喜你等级提升为 \\1，并获赠以下道具：\\2',

	//Administrator giving props to the user 
	'present_user_magics'	=> 'Вы получили в подарок от администратора артефакт: \\1',//'您收到了管理员赠送的道具：\\1',
	'has_not_more_doodle'	=> 'У Вас больше нет Граффити.',//'您没有涂鸦板了',

	'do_stat_login'		=> 'Логины',//'来访用户',
	'do_stat_register'	=> 'Новые пользователи',//'新注册用户',
	'do_stat_invite'	=> 'Приглашения в друзья',//'好友邀请',
	'do_stat_appinvite'	=> 'Приглашения в приложения',//'应用邀请',
	'do_stat_add'		=> 'Реклама',//'信息发布',
	'do_stat_comment'	=> 'Комментарии',//'信息互动',
	'do_stat_space'		=> 'Профили',//'用户互动',
//	'do_stat_login'		=> 'Логины',//
	'do_stat_doing'		=> 'Твиты',//'记录',
	'do_stat_blog'		=> 'Блоги',//'日志',
	'do_stat_pic'		=> 'Изображения',//'图片',
	'do_stat_poll'		=> 'Голосования',//'投票',
	'do_stat_event'		=> 'События',//'活动',
	'do_stat_share'		=> 'Shares',//'分享',
	'do_stat_thread'	=> 'Топики',//'话题',
	'do_stat_docomment'	=> 'Комментарии к твитам(?)',//'记录回复',
	'do_stat_blogcomment'	=> 'Комментарии к блогам',//'日志评论',
	'do_stat_piccomment'	=> 'Комментарии к изображениям',//'图片评论',
	'do_stat_pollcomment'	=> 'Комментарии к опросам',//'投票评论',
	'do_stat_pollvote'	=> 'Участия в опросах',//'参与投票',
	'do_stat_eventcomment'	=> 'Комментарии к событиям',//'活动评论',
	'do_stat_eventjoin'	=> 'Присоединения к событиямs',//'参加活动',
	'do_stat_sharecomment'	=> 'Комментарии к Shares',//'分享评论',
	'do_stat_post'		=> 'Ответы в топиках',//'话题回帖',
	'do_stat_click'		=> 'Rate Clicks',//'表态',
	'do_stat_wall'		=> 'Сообщения на стене',//'留言',
	'do_stat_poke'		=> 'Приветствия',//'打招呼'

);

