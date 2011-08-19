/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: forum_moderate.js 18912 2010-12-08 08:01:45Z monkey $
	Modified by Valery Votintsev
*/

function modaction(action, pid, extra, mod) {
	if(!action) {
		return;
	}
	var mod = mod ? mod : 'forum.php?mod=topicadmin';
	var extra = !extra ? '' : '&' + extra;
	if(!pid && in_array(action, ['delpost', 'banpost'])) {
		var checked = 0;
		var pid = '';
		for(var i = 0; i < $('modactions').elements.length; i++) {
			if($('modactions').elements[i].name.match('topiclist')) {
				checked = 1;
				break;
			}
		}
	} else {
		var checked = 1;
	}
	if(!checked) {
/*vot*/	alert(lng['choose_tread']);
	} else {
		$('modactions').action = mod + '&action='+ action +'&fid=' + fid + '&tid=' + tid + '&handlekey=mods&infloat=yes&nopost=yes' + (!pid ? '' : '&topiclist[]=' + pid) + extra + '&r' + Math.random();
		showWindow('mods', 'modactions', 'post');
		if(BROWSER.ie) {
			doane(event);
		}
		hideMenu();
	}
}

function modthreads(optgroup, operation) {
	var operation = !operation ? '' : operation;
	$('modactions').action = 'forum.php?mod=topicadmin&action=moderate&fid=' + fid + '&moderate[]=' + tid + '&handlekey=mods&infloat=yes&nopost=yes' + (optgroup != 3 && optgroup != 2 ? '&from=' + tid : '');
	$('modactions').optgroup.value = optgroup;
	$('modactions').operation.value = operation;
	hideWindow('mods');
	showWindow('mods', 'modactions', 'post', 0);
	if(BROWSER.ie) {
		doane(event);
	}
}

function pidchecked(obj) {
	if(obj.checked) {
		if(BROWSER.ie && !BROWSER.opera) {
			var inp = document.createElement('<input name="topiclist[]" />');
		} else {
			var inp = document.createElement('input');
			inp.name = 'topiclist[]';
		}
		inp.id = 'topiclist_' + obj.value;
		inp.value = obj.value;
		inp.type = 'hidden';
		$('modactions').appendChild(inp);
	} else {
		$('modactions').removeChild($('topiclist_' + obj.value));
	}
}

var modclickcount = 0;
function modclick(obj, pid) {
	if(obj.checked) {
		modclickcount++;
	} else {
		modclickcount--;
	}
	$('mdct').innerHTML = modclickcount;
	if(modclickcount > 0) {
		var offset = fetchOffset(obj);
		$('mdly').style.top = offset['top'] - 65 + 'px';
		$('mdly').style.left = offset['left'] - 215 + 'px';
		$('mdly').style.display = '';
	} else {
		$('mdly').style.display = 'none';
	}
}

function resetmodcount() {
	modclickcount = 0;
	$('mdly').style.display = 'none';
}

function tmodclick(obj) {
	if(obj.checked) {
		modclickcount++;
	} else {
		modclickcount--;
	}
	$('mdct').innerHTML = modclickcount;
	if(modclickcount > 0) {
		var top_offset = obj.offsetTop;
		while((obj = obj.offsetParent).id != 'threadlist') {
			top_offset += obj.offsetTop;
		}
		$('mdly').style.top = top_offset - 7 + 'px';
		$('mdly').style.display = '';
	} else {
		$('mdly').style.display = 'none';
	}
}

function tmodthreads(optgroup, operation) {
	var checked = 0;
	var operation = !operation ? '' : operation;
	for(var i = 0; i < $('moderate').elements.length; i++) {
		if($('moderate').elements[i].name.match('moderate') && $('moderate').elements[i].checked) {
			checked = 1;
			break;
		}
	}
	if(!checked) {
/*vot*/	alert(lng['choose_tread']);
	} else {
		$('moderate').optgroup.value = optgroup;
		$('moderate').operation.value = operation;
		showWindow('mods', 'moderate', 'post');
	}
}

loadcss('forum_moderator');