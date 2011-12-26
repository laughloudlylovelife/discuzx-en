<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_portalcp.php by Valery Votintsev at sources.ru
 */

$lang = array(
	'block_diy_nopreview'		=> '<p>Ce module contient js, vous ne pouvez pas pr&#233;visualiser, Svp. enregistrer et afficher</p>',  //  '<p>This module contain js, you cannot preview, please save and view</p>'  
	'block_diy_summary_html_tag'	=> 'Erreurs de contenu personnalis&#233;, les balises HTML:',  //  'Custom content errors, HTML tags:'  
	'block_diy_summary_not_closed'	=> ' Ne correspond pas',  // ' Does not match'   
	'block_all_category'		=> 'Toutes cat&#233;gories',  //  All categories  
	'block_first_category'		=> 'Top cat&#233;gories',  // Top category   
	'block_all_forum'		=> 'Tout forums',  //  All forums  
	'block_all_group'		=> 'Tout les Groupes Utilisateurs',  //  All usergroups  
	'block_all_type'		=> 'Toutes cat&#233;gories',  // All categories   
	'file_size_limit'		=> 'Le fichier est plus grand que {size} kio, Svp. retour.',  //  File is larger than {size} kb, please return.  
	'set_to_conver'			=> 'D&#233;finir comme cover',  //  Set as cover  
	'insert_small_image'		=> 'Ins&#233;rez la petite image',  //  Insert small image  
	'insert_large_image'		=> 'Ins&#233;rer image de grande taille',  //   Insert large image 
	'insert_file'			=> 'Ins&#233;rer fichier',  // Insert file   
	'delete'			=> 'Supprimer',  //  Delete  
	'upload_error'			=> 'T&#233;l&#233;chargement a &#233;chou&#233;',  //   Uploading failed 
	'upload_remote_failed'		=> 'T&#233;l&#233;chargement distant a &#233;chou&#233;',  // Remote uploading failed   
	'article_noexist'		=> 'Arcticle particulier inexistant',  // Specific arcticle does not exists   
	'article_noallowed'		=> 'Vous n\'&#234;tes pas autoris&#233; &#224; op&#233;rer cet article',  //  You are not allowed to operate this article  
	'article_publish_noallowed'	=> 'Vous n\'&#234;tes pas autoris&#233; &#224; publier cet article',  //  You are not allowed to publish article  
	'article_publish'		=> 'Publiez',  //   Publish 
	'article_manage'		=> 'G&#233;rer',  //   Manage 
	'article_tag'			=> 'Tag',  //  Tag  
	'select_category'		=> 'Choix de la cat&#233;gorie',  //   Select category 
	'blockstyle_diy'		=> 'Personnalisez gabarit',  //  Customize template  

	'article_pushplus_info'	=> '<p><center><i><a href="{url}" class="xg1 xs1">Le contenu est fourni par {author}</a></i><center></p>',  //  '<p><center><i><a href="{url}" class="xg1 xs1">The content is provided by {author}</a></i><center></p>'  

	'diytemplate_name_null'	=> '[Null]',  //  '[Null]'  
	'portal/index'		=> 'Portail Index',  // Portal Index   
	'portal/list'		=> 'Article liste page(public)',  //   Article list page(public) 
	'portal/view'		=> 'Article contenu page(public)',  // Article content page(public)   
	'portal/comment'	=> 'Article comment. page',  //  Article comment page  
	'forum/discuz'		=> 'Forum Index',  // Forum Index   
	'forum/viewthread'	=> 'Posts contenu page(public)',  // Posts content page(public)   
	'forum/forumdisplay'	=> 'Forum liste page(public)',  // Forum list page(public)   
	'group/index'		=> $_G['setting']['navs'][3]['navname'].' Index',  //  ' Index'  
	'group/group_my'	=> 'My'.$_G['setting']['navs'][3]['navname'].' Index',  // ' Index'   
	'group/group'		=> $_G['setting']['navs'][3]['navname'].' contenu page',  // ' content page'   
	'home/space_home'	=> 'Espace Index',  // Space Index   
	'home/space_trade'	=> 'Espace commerce page',  // Space trade page   
	'home/space_top'	=> 'Espace rang page',  // Space ranking page   
	'home/space_thread'	=> 'Espace sujet page',  // Space thread page   
	'home/space_reward'	=> 'Espace r&#233;compense page',  //  Space reward page  
	'home/space_share_list'	=> 'Espace partage page',  // Space share page   
	'home/space_share_view'	=> 'Espace partage contenu page',  //  Space share content page  
	'space_share_view'	=> 'Espace partage vue page',  //  Space share view page  
	'home/space_poll'	=> 'Espace sondage page',  //  Space poll page  
	'home/space_pm'		=> 'Espace M.P. page',  // Space P.M. page   
	'home/space_notice'	=> 'Espace avis page',  //  Space notice page  
	'home/space_group'	=> 'Espace'.$_G['setting']['navs'][3]['navname'].' page',  // ' page'   
	'home/space_friend'	=> 'Espace Amis page',  // Space friends page   
	'home/space_favorite'	=> 'Espace favoris page',  // Space favorite page   
	'home/space_doing'	=> 'Espace agiss. page',  //  Space doing page  
	'home/space_debate'	=> 'Espace d&#233;bats page',  // Space debate page   
	'home/space_blog_view'	=> 'Espace blog contenu page',  //  Space blog content page  
	'home/space_blog_list'	=> 'Espace blog liste page',  //  Space blog list page  
	'home/space_album_view'	=> 'Espace album contenu page',  // Space album content page   
	'home/space_album_pic'	=> 'Espace image contenu page',  // Space image content page   
	'home/space_album_list'	=> 'Espace album liste page',  //  Space album list page  
	'home/space_activity'	=> 'Espace activit&#233; page',  // Space activity page   
	'ranklist/ranklist'	=> 'Espace rang liste page',  // Space ranking list page   
	'ranklist/blog'		=> 'Blog rang page',  //    Blog ranking page
	'ranklist/poll'		=> 'Sondage rang page',  //  Poll ranking page  
	'ranklist/activity'	=> 'Activit&#233; rang page',  //  Activity ranking page  
	'ranklist/forum'	=> 'Forum rang page',  // Forum ranking page   
	'ranklist/picture'	=> 'Image rang page',  //  Image ranking page  
	'ranklist/group'	=> 'Groupe rang page',  //  Group ranking page  
	'ranklist/thread'	=> 'Posts rang page',  // Posts ranking page   
	'ranklist/member'	=> 'Utilisateurs rang page',  // Users ranking page   
	'other_page'		=> 'Pas de DIY module',  //   Not DIY module 
	'upload'		=> 'T&#233;l&#233;ch.',  //   Upload 
	'remote'		=> 'Distant',  //   Remote 
	'portal_index'		=> 'Portail Accueil',  //  Portal Home  
	'portal_topic_blue'	=> 'Th&#232;me Bleu',  //  Blue theme  
	'portal_topic_green'	=> 'Th&#232;me Vert',  // Green theme   
	'portal_topic_grey'	=> 'Th&#232;me Gris',  //  Grey theme  
	'portal_topic_red'	=> 'Th&#232;me Rouge',  //  Red theme  

);