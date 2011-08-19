/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: portal.js 20603 2011-02-28 08:42:36Z zhangguosheng $
	Modified by Valery Votintsev
*/

function block_get_setting(classname, script, bid) {
	var x = new Ajax();
	x.get('portal.php?mod=portalcp&ac=block&op=setting&bid='+bid+'&classname='+classname+'&script='+script+'&inajax=1', function(s){
		ajaxinnerhtml($('tbody_setting'), s);
	});
}

function switch_blocktab(type) {
	if(type == 'setting') {
		$('blockformsetting').style.display = '';
		$('blockformdata').style.display = 'none';
		$('li_setting').className = 'a';
		$('li_data').className = '';
	} else {
		$('blockformsetting').style.display = 'none';
		$('blockformdata').style.display = '';
		$('li_setting').className = '';
		$('li_data').className = 'a';
	}
}

function showpicedit() {
	if($('picway_remote').checked) {
		$('pic_remote').style.display = "block";
		$('pic_upload').style.display = "none";
	} else {
		$('pic_remote').style.display = "none";
		$('pic_upload').style.display = "block";
	}
}

function block_show_thumbsetting(classname, styleid, bid) {
	var x = new Ajax();
	x.get('portal.php?mod=portalcp&ac=block&op=thumbsetting&classname='+classname+'&styleid='+styleid+'&bid='+bid+'&inajax=1', function(s){
		ajaxinnerhtml($('tbody_thumbsetting'), s);
	});
}

function block_showstyle(stylename) {
	var el_span = $('span_'+stylename);
	var el_value = $('value_' + stylename);
	if (el_value.value == '1'){
		el_value.value = '0';
		el_span.className = "";
	} else {
		el_value.value = '1';
		el_span.className = "a";
	}
}

function block_pushitem(bid, itemid) {
	var id = $('push_id').value;
	var idtype = $('push_idtype').value;
	if(id && idtype) {
		var x = new Ajax();
		x.get('portal.php?mod=portalcp&ac=block&op=push&&bid='+bid+'&itemid='+itemid+'&idtype='+idtype+'&id='+id+'&inajax=1', function(s){
			ajaxinnerhtml($('tbody_pushcontent'), s);
		});
	}
}

function block_delete_item(bid, itemid, itemtype, itemfrom, from) {
/*vot*/	var msg = itemtype==1 ? lng['delete_sure'] : lng['ignore_sure'];
	if(confirm(msg)) {
		var url = 'portal.php?mod=portalcp&ac=block&op=remove&bid='+bid+'&itemid='+itemid;
		if(itemfrom=='ajax') {
			var x = new Ajax();
			x.get(url+'&inajax=1', function(){
				showWindow('showblock', 'portal.php?mod=portalcp&ac=block&op=data&bid='+bid+'&from='+from+'&tab=data&t='+(+ new Date()), 'get', 0);
			});
		} else {
			location.href = url;
		}
	}
	doane();
}

function portal_comment_requote(cid) {
	var x = new Ajax();
	x.get('portal.php?mod=portalcp&ac=comment&op=requote&cid='+cid+'&inajax=1', function(s){
		$('message').focus();
		ajaxinnerhtml($('message'), s);
	});
}

function insertImage(text) {
	text = "\n[img]" + text + "[/img]\n";
	insertContent('message', text)
}

function insertContent(target, text) {
	var obj = $(target);
	selection = document.selection;
	checkFocus(target);
	if(!isUndefined(obj.selectionStart)) {
		var opn = obj.selectionStart + 0;
		obj.value = obj.value.substr(0, obj.selectionStart) + text + obj.value.substr(obj.selectionEnd);
	} else if(selection && selection.createRange) {
		var sel = selection.createRange();
		sel.text = text;
		sel.moveStart('character', -strlen(text));
	} else {
		obj.value += text;
	}
}

function searchblock(from) {
	var value = $('searchkey').value;
	var targettplname = $('targettplname').value
	value = BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(value) : (value ? value.replace(/#/g,'%23') : '');
	var url = 'portal.php?mod=portalcp&ac=portalblock&searchkey='+value+'&from='+from;
	url += targettplname != '' ? '&targettplname='+targettplname+'&type=page' : '&type=block';
	reloadselection(url);
}

function reloadselection(url) {
	ajaxget(url+'&t='+(+ new Date()), 'block_selection');
}

function getColorPalette(colorid, id, background) {
	return "<input id=\"c"+colorid+"\" onclick=\"createPalette('"+colorid+"', '"+id+"');\" type=\"button\" class=\"colorwd\" value=\"\" style=\"background: "+background+"\">";
}

function listblock_bypage(tpl) {
	var msg = '';
	var sel = $('recommend_bid');
	var elem = $('recommend_pageblock_' + tpl);
	sel.options.length = 0;
/*vot*/	sel.options.add(new Option(lng['choose_block'], ''));
	if(elem && elem.options.length) {
/*vot*/	msg = lng['blocks_found1']+' <font color="red">'+elem.options.length+'</font> '+lng['blocks_found2'];
		for(var i=0; i<elem.options.length; i++) {
			var opt = elem.options[i];
			sel.options.add(new Option(opt.text, opt.value));
		}
	} else {
/*vot*/	msg = '<font color="red">'+lng['blocks_not_found']+'</font>';
	}
	ajaxinnerhtml($('itemeditarea'), '<tr><td>&nbsp;</td><td>&nbsp;'+msg+'</td></tr>');
}

function recommenditem_check() {
	var sel = $('recommend_bid');
	if(sel && sel.value) {
		return true;
	} else {
/*vot*/	alert(lng['select_block']);
		return false;
	}
}

function recommenditem_byblock(bid, id, idtype) {
	var editarea = $('itemeditarea');
	if(editarea) {
		if(bid) {
			ajaxget('portal.php?mod=portalcp&ac=block&op=recommend&bid='+bid+'&id='+id+'&idtype='+idtype+'&handlekey=recommenditem', 'itemeditarea');
		} else {
			ajaxinnerhtml(editarea, '<tr><td>&nbsp;</td><td>&nbsp;</td></tr>');
		}
	}
}

function blockBindTips() {
	var elems = ($('blockformsetting') || document).getElementsByTagName('img');
	var k = 0;
	var stamp = (+new Date());
	var tips = '';
	for(var i = 0; i < elems.length; i++) {
		tips = elems[i]['tips'] || elems[i].getAttribute('tips') || '';
		if(tips && ! elems[i].isBindTips) {
			elems[i].isBindTips = '1';
			elems[i].id = elems[i].id ? elems[i].id : ('elem_' + stamp + k.toString());
			k++;
			showPrompt(elems[i].id, 'mouseover', tips, 1, true);
		}
	}
}

function blockSetCacheTime(timer) {
	$('txt_cachetime').value=timer;
	doane();
}

function toggleSettingShow() {
	if(!$('tbody_setting').style.display) {
		$('tbody_setting').style.display = 'none';
/*vot*/	$('a_setting_show').innerHTML = lng['show_settings'];
	} else {
		$('tbody_setting').style.display = '';
/*vot*/	$('a_setting_show').innerHTML = lng['hide_settings'];
	}
	doane();
}

function checkblockname(form) {
	if(!(trim(form.name.value) > '')) {
/*vot*/	alert(lng['block_name_empty']);
		form.name.focus();
		return false;
	}
	return true;
}

function blockconver(ele,bid) {
	if(ele && bid) {
/*vot*/	if(confirm(lng['block_convert_sure']+' '+ele.options[0].innerHTML+' '+lng['to']+' '+ele.options[ele.selectedIndex].innerHTML)) {
			ajaxget('portal.php?mod=portalcp&ac=block&op=convert&bid='+bid+'&toblockclass='+ele.value,'blockshow');
		} else {
			ele.selectedIndex = 0;
		}
	}
}