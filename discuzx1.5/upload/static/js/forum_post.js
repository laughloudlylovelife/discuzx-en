/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: forum_post.js 21022 2011-03-10 07:08:23Z congyushuai $
	Modified by Valery Votintsev
*/

var postSubmited = false;
var AID = 1;
var UPLOADSTATUS = -1;
var UPLOADFAILED = UPLOADCOMPLETE = AUTOPOST =  0;
var CURRENTATTACH = '0';
var FAILEDATTACHS = '';
var UPLOADWINRECALL = null;
var STATUSMSG = {
	'-1' : lng['internal_error'],/*vot*/
	'0' :  lng['upload_ok'],/*vot*/
	'1' :  lng['ext_not_supported'],/*vot*/
	'2' :  lng['attach_big'],/*vot*/
	'3' :  lng['attach_group_big'],/*vot*/
	'4' :  lng['ext_not_supported'],/*vot*/
	'5' :  lng['attach_type_big'],/*vot*/
	'6' :  lng['attach_daily_big'],/*vot*/
	'7' :  lng['illegal_image_type'],/*vot*/
	'8' :  lng['can_not_save_attach'],/*vot*/
	'9' :  lng['invalid_file'],/*vot*/
	'10' : lng['illegal_operation']/*vot*/
};

function checkFocus() {
	var obj = wysiwyg ? editwin : textobj;
	if(!obj.hasfocus) {
		obj.focus();
	}
}

function ctlent(event) {
	if(postSubmited == false && (event.ctrlKey && event.keyCode == 13) || (event.altKey && event.keyCode == 83) && $('postsubmit')) {
		if(in_array($('postsubmit').name, ['topicsubmit', 'replysubmit', 'editsubmit']) && !validate($('postform'))) {
			doane(event);
			return;
		}
		postSubmited = true;
		$('postsubmit').disabled = true;
		$('postform').submit();
	}
	if(event.keyCode == 9) {
		doane(event);
	}
}

function checklength(theform) {
	var message = wysiwyg ? html2bbcode(getEditorContents()) : (!theform.parseurloff.checked ? parseurl(theform.message.value) : theform.message.value);
/*vot*/	showDialog(lng['current_length']+': ' + mb_strlen(message) + ' '+lng['bytes']+', ' + (postmaxchars != 0 ? lng['system_limit']+': ' + postminchars + ' '+lng['up_to']+' ' + postmaxchars + ' '+lng['bytes']+'.' : ''), 'notice', lng['check_length']);
}

if(!tradepost) {
	var tradepost = 0;
}

function validate(theform) {
	var message = wysiwyg ? html2bbcode(getEditorContents()) : (!theform.parseurloff.checked ? parseurl(theform.message.value) : theform.message.value);
	if(($('postsubmit').name != 'replysubmit' && !($('postsubmit').name == 'editsubmit' && !isfirstpost) && theform.subject.value == "") || !sortid && !special && trim(message) == "") {
/*vot*/	showDialog(lng['enter_content']);
		return false;
	} else if(mb_strlen(theform.subject.value) > 80) {
/*vot*/	showDialog(lng['title_long']);
		return false;
	}
	if(in_array($('postsubmit').name, ['topicsubmit', 'editsubmit'])) {
		if(theform.typeid && (theform.typeid.options && theform.typeid.options[theform.typeid.selectedIndex].value == 0) && typerequired) {
/*vot*/		showDialog(lng['select_category']);
			return false;
		}
		if(theform.sortid && (theform.sortid.options && theform.sortid.options[theform.sortid.selectedIndex].value == 0) && sortrequired) {
/*vot*/		showDialog(lng['select_category_info']);
			return false;
		}
	}
	if(typeof validateextra == 'function') {
		var v = validateextra();
		if(!v) {
			return false;
		}
	}

	if(!disablepostctrl && !sortid && !special && ((postminchars != 0 && mb_strlen(message) < postminchars) || (postmaxchars != 0 && mb_strlen(message) > postmaxchars))) {
/*vot*/	showDialog(lng['content_long'] + lng['current_length']+': ' + mb_strlen(message) + ' '+lng['bytes']+'\n'+lng['system_limit']+': ' + postminchars + ' '+lng['up_to']+' ' + postmaxchars + ' '+lng['bytes']);
		return false;
	}
	if(UPLOADSTATUS == 0) {
/*vot*/	if(!confirm(lng['ignore_pending_attach'])) {
			return false;
		}
	} else if(UPLOADSTATUS == 1) {
/*vot*/	showDialog(lng['still_uploading'], 'notice');
		AUTOPOST = 1;
		return false;
	}
	if($(editorid + '_attachlist')) {
		$('postbox').appendChild($(editorid + '_attachlist'));
		$(editorid + '_attachlist').style.display = 'none';
	}
	if($(editorid + '_imgattachlist')) {
		$('postbox').appendChild($(editorid + '_imgattachlist'));
		$(editorid + '_imgattachlist').style.display = 'none';
	}
	hideMenu();
	theform.message.value = message;
	if($('postsubmit').name == 'editsubmit') {
		return true;
	} else if(in_array($('postsubmit').name, ['topicsubmit', 'replysubmit'])) {
		if(seccodecheck || secqaacheck) {
			var chk = 1, chkv = '';
			if(secqaacheck) {
				chkv = $('checksecqaaverify_' + theform.sechash.value).innerHTML;
				if(chkv.indexOf('loading') != -1) {
/*vot*/				showDialog(lng['validating_q&a']);
					chk = 0;
				} else if(chkv.indexOf('check_right') == -1) {
/*vot*/				showDialog(lng['q&a_invalid']);
					chk = 0;
				}
			}
			if(seccodecheck) {
				chkv = $('checkseccodeverify_' + theform.sechash.value).innerHTML;
				if(chkv.indexOf('loading') != -1) {
/*vot*/				showDialog(lng['validating_code']);
					chk = 0;
				} else if(chkv.indexOf('check_right') == -1) {
/*vot*/				showDialog(lng['code_invalid']);
					chk = 0;
				}
			}
			if(chk) {
				postsubmit(theform);
			}
		} else {
			postsubmit(theform);
		}
		return false;
	}
}

function postsubmit(theform) {
	theform.replysubmit ? theform.replysubmit.disabled = true : (theform.editsubmit ? theform.editsubmit.disabled = true : theform.topicsubmit.disabled = true);
	theform.submit();
}

function loadData(quiet) {
	var data = '';
	data = loadUserdata('forum');

	if(in_array((data = trim(data)), ['', 'null', 'false', null, false])) {
		if(!quiet) {
/*vot*/		showDialog(lng['no_data_recover']);
		}
		return;
	}

/*vot*/	if(!quiet && !confirm(lng['content_overwrite'])) {
		return;
	}

	var data = data.split(/\x09\x09/);
	for(var i = 0; i < $('postform').elements.length; i++) {
		var el = $('postform').elements[i];
		if(el.name != '' && (el.tagName == 'TEXTAREA' || el.tagName == 'INPUT' && (el.type == 'text' || el.type == 'checkbox' || el.type == 'radio'))) {
			for(var j = 0; j < data.length; j++) {
				var ele = data[j].split(/\x09/);
				if(ele[0] == el.name) {
					elvalue = !isUndefined(ele[3]) ? ele[3] : '';
					if(ele[1] == 'INPUT') {
						if(ele[2] == 'text') {
							el.value = elvalue;
						} else if((ele[2] == 'checkbox' || ele[2] == 'radio') && ele[3] == el.value) {
							el.checked = true;
							evalevent(el);
						}
					} else if(ele[1] == 'TEXTAREA') {
						if(ele[0] == 'message') {
							if(!wysiwyg) {
								textobj.value = elvalue;
							} else {
								editdoc.body.innerHTML = bbcode2html(elvalue);
							}
						} else {
							el.value = elvalue;
						}
					}
					break
				}
			}
		}
	}
}

function evalevent(obj) {
	var script = obj.parentNode.innerHTML;
	var re = /onclick="(.+?)["|>]/ig;
	var matches = re.exec(script);
	if(matches != null) {
		matches[1] = matches[1].replace(/this\./ig, 'obj.');
		eval(matches[1]);
	}
}

function relatekw(subject, message, recall) {
	if(isUndefined(recall)) recall = '';
	if(isUndefined(subject) || subject == -1) subject = $('subject').value;
	if(isUndefined(message) || message == -1) message = getEditorContents();
	subject = (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(subject) : subject);
	message = (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(message) : message);
	message = message.replace(/&/ig, '', message).substr(0, 500);
	ajaxget('forum.php?mod=relatekw&subjectenc=' + subject + '&messageenc=' + message, 'tagselect', '', '', '', recall);
}

function switchicon(iconid, obj) {
	$('iconid').value = iconid;
	$('icon_img').src = obj.src;
	hideMenu();
}

function clearContent() {
	if(wysiwyg) {
		editdoc.body.innerHTML = BROWSER.firefox ? '<br />' : '';
	} else {
		textobj.value = '';
	}
}

function uploadNextAttach() {
	var str = $('attachframe').contentWindow.document.body.innerHTML;
	if(str == '') return;
	var arr = str.split('|');
	var att = CURRENTATTACH.split('|');
	uploadAttach(parseInt(att[0]), arr[0] == 'DISCUZUPLOAD' ? parseInt(arr[1]) : -1, att[1]);
}

function uploadAttach(curId, statusid, prefix) {
	prefix = isUndefined(prefix) ? '' : prefix;
	var nextId = 0;
	for(var i = 0; i < AID - 1; i++) {
		if($(prefix + 'attachform_' + i)) {
			nextId = i;
			if(curId == 0) {
				break;
			} else {
				if(i > curId) {
					break;
				}
			}
		}
	}
	if(nextId == 0) {
		return;
	}
	CURRENTATTACH = nextId + '|' + prefix;
	if(curId > 0) {
		if(statusid == 0) {
			UPLOADCOMPLETE++;
		} else {
			FAILEDATTACHS += '<br />' + mb_cutstr($(prefix + 'attachnew_' + curId).value.substr($(prefix + 'attachnew_' + curId).value.replace(/\\/g, '/').lastIndexOf('/') + 1), 25) + ': ' + STATUSMSG[statusid];
			UPLOADFAILED++;
		}
		$(prefix + 'cpdel_' + curId).innerHTML = '<img src="' + IMGDIR + '/check_' + (statusid == 0 ? 'right' : 'error') + '.gif" alt="' + STATUSMSG[statusid] + '" />';
		if(nextId == curId || in_array(statusid, [6, 8])) {
			if(prefix == 'img') updateImageList();
			else updateAttachList();
			if(UPLOADFAILED > 0) {
/*vot*/			showDialog(lng['upload_finished']+' '+lng['successfull']+' ' + UPLOADCOMPLETE + ', '+lng['failed']+' ' + UPLOADFAILED + ', '+lng['ones']+': ' + FAILEDATTACHS);
				FAILEDATTACHS = '';
			}
			UPLOADSTATUS = 2;
			for(var i = 0; i < AID - 1; i++) {
				if($(prefix + 'attachform_' + i)) {
					reAddAttach(prefix, i)
				}
			}
			$(prefix + 'uploadbtn').style.display = '';
			$(prefix + 'uploading').style.display = 'none';
			if(AUTOPOST) {
				hideMenu();
				validate($('postform'));
			} else if(UPLOADFAILED == 0 && (prefix == 'img' || prefix == '')) {
/*vot*/			showDialog(lng['upload_finished'], 'notice');
			}
			UPLOADFAILED = UPLOADCOMPLETE = 0;
			CURRENTATTACH = '0';
			FAILEDATTACHS = '';
			return;
		}
	} else {
		$(prefix + 'uploadbtn').style.display = 'none';
		$(prefix + 'uploading').style.display = '';
	}
/*vot*/	$(prefix + 'cpdel_' + nextId).innerHTML = '<img src="' + IMGDIR + '/loading.gif" alt="'+lng['uploading']+'" />';
	UPLOADSTATUS = 1;
	$(prefix + 'attachform_' + nextId).submit();
}

function addAttach(prefix) {
	var id = AID;
	var tags, newnode, i;
	prefix = isUndefined(prefix) ? '' : prefix;
	newnode = $(prefix + 'attachbtnhidden').firstChild.cloneNode(true);
	tags = newnode.getElementsByTagName('input');
	for(i in tags) {
		if(tags[i].name == 'Filedata') {
			tags[i].id = prefix + 'attachnew_' + id;
			tags[i].onchange = function() {insertAttach(prefix, id)};
			tags[i].unselectable = 'on';
		} else if(tags[i].name == 'attachid') {
			tags[i].value = id;
		}
	}
	tags = newnode.getElementsByTagName('form');
	tags[0].name = tags[0].id = prefix + 'attachform_' + id;
	$(prefix + 'attachbtn').appendChild(newnode);
	newnode = $(prefix + 'attachbodyhidden').firstChild.cloneNode(true);
	tags = newnode.getElementsByTagName('input');
	for(i in tags) {
		if(tags[i].name == prefix + 'localid[]') {
			tags[i].value = id;
		}
	}
	tags = newnode.getElementsByTagName('span');
	for(i in tags) {
		if(tags[i].id == prefix + 'localfile[]') {
			tags[i].id = prefix + 'localfile_' + id;
		} else if(tags[i].id == prefix + 'cpdel[]') {
			tags[i].id = prefix + 'cpdel_' + id;
		} else if(tags[i].id == prefix + 'localno[]') {
			tags[i].id = prefix + 'localno_' + id;
		} else if(tags[i].id == prefix + 'deschidden[]') {
			tags[i].id = prefix + 'deschidden_' + id;
		}
	}
	AID++;
	newnode.style.display = 'none';
	$(prefix + 'attachbody').appendChild(newnode);
}

function insertAttach(prefix, id) {
	var localimgpreview = '';
	var path = $(prefix + 'attachnew_' + id).value;
	var extpos = path.lastIndexOf('.');
	var ext = extpos == -1 ? '' : path.substr(extpos + 1, path.length).toLowerCase();
	var re = new RegExp("(^|\\s|,)" + ext + "($|\\s|,)", "ig");
	var localfile = $(prefix + 'attachnew_' + id).value.substr($(prefix + 'attachnew_' + id).value.replace(/\\/g, '/').lastIndexOf('/') + 1);
	var filename = mb_cutstr(localfile, 30);

	if(path == '') {
		return;
	}
	if(extensions != '' && (re.exec(extensions) == null || ext == '')) {
		reAddAttach(prefix, id);
/*vot*/	showDialog(lng['sorry_ext_not_supported']);
		return;
	}
	if(prefix == 'img' && imgexts.indexOf(ext) == -1) {
		reAddAttach(prefix, id);
/*vot*/	showDialog(lng['select_image_files']+' (' + imgexts + ')');
		return;
	}

/*vot*/	$(prefix + 'cpdel_' + id).innerHTML = '<a href="javascript:;" class="d" onclick="reAddAttach(\'' + prefix + '\', ' + id + ')">'+lng['delete']+'</a>';
	$(prefix + 'localfile_' + id).innerHTML = '<span>' + filename + '</span>';
	$(prefix + 'attachnew_' + id).style.display = 'none';
	$(prefix + 'deschidden_' + id).style.display = '';
	$(prefix + 'deschidden_' + id).title = localfile;
	$(prefix + 'localno_' + id).parentNode.parentNode.style.display = '';
	addAttach(prefix);
	UPLOADSTATUS = 0;
}

function reAddAttach(prefix, id) {
	$(prefix + 'attachbody').removeChild($(prefix + 'localno_' + id).parentNode.parentNode);
	$(prefix + 'attachbtn').removeChild($(prefix + 'attachnew_' + id).parentNode.parentNode);
	$(prefix + 'attachbody').innerHTML == '' && addAttach(prefix);
	$('localimgpreview_' + id) ? document.body.removeChild($('localimgpreview_' + id)) : null;
}

function delAttach(id, type) {
	appendAttachDel(id);
	$('attach_' + id).style.display = 'none';
	ATTACHNUM['attach' + (type ? 'un' : '') + 'used']--;
	updateattachnum('attach');
}

function delImgAttach(id, type) {
	appendAttachDel(id);
	$('image_td_' + id).className = 'imgdeleted';
	$('image_' + id).onclick = null;
	$('image_desc_' + id).disabled = true;
	ATTACHNUM['image' + (type ? 'un' : '') + 'used']--;
	updateattachnum('image');
}

function appendAttachDel(id) {
	var input = document.createElement('input');
	input.name = 'attachdel[]';
	input.value = id;
	input.type = 'hidden';
	$('postbox').appendChild(input);
}

function updateAttach(aid) {
	objupdate = $('attachupdate'+aid);
	obj = $('attach' + aid);
	if(!objupdate.innerHTML) {
		obj.style.display = 'none';
/*vot*/	objupdate.innerHTML = '<input type="file" name="attachupdate[paid' + aid + ']"><a href="javascript:;" onclick="updateAttach(' + aid + ')">'+lng['cancel']+'</a>';
	} else {
		obj.style.display = '';
		objupdate.innerHTML = '';
	}
}

function updateattachnum(type) {
	ATTACHNUM[type + 'used'] = ATTACHNUM[type + 'used'] >= 0 ? ATTACHNUM[type + 'used'] : 0;
	ATTACHNUM[type + 'unused'] = ATTACHNUM[type + 'unused'] >= 0 ? ATTACHNUM[type + 'unused'] : 0;
	var num = ATTACHNUM[type + 'used'] + ATTACHNUM[type + 'unused'];
	if(num) {
		if($(editorid + '_' + type)) {
/*vot*/		$(editorid + '_' + type).title = lng['contains']+' ' + num + (type == 'image' ? ' '+lng['img_attached_num'] : ' '+lng['files attached_num']);
		}
		if($(editorid + '_' + type + 'n')) {
			$(editorid + '_' + type + 'n').style.display = '';
		}
	} else {
		if($(editorid + '_' + type)) {
/*vot*/		$(editorid + '_' + type).title = type == 'image' ? lng['images'] : lng['attachments'];
		}
		if($(editorid + '_' + type + 'n')) {
			$(editorid + '_' + type + 'n').style.display = 'none';
		}
	}
}

function unusedoption(op, aid) {
	if(!op) {
		if($('unusedimgattachlist')) {
			$('unusedimgattachlist').parentNode.removeChild($('unusedimgattachlist'));
		}
		if($('unusedattachlist')) {
			$('unusedattachlist').parentNode.removeChild($('unusedattachlist'));
		}
		ATTACHNUM['imageunused'] = 0;
		ATTACHNUM['attachunused'] = 0;
	} else if(op == 1) {
		for(var i = 0; i < $('unusedform').elements.length; i++) {
			var e = $('unusedform').elements[i];
			if(e.name.match('unused')) {
				if(!e.checked) {
					if($('image_td_' + e.value)) {
						$('image_td_' + e.value).parentNode.removeChild($('image_td_' + e.value));
						ATTACHNUM['imageunused']--;
					}
					if($('attach_' + e.value)) {
						$('attach_' + e.value).parentNode.removeChild($('attach_' + e.value));
						ATTACHNUM['attachunused']--;
					}
				}
			}
		}
	} else if(op == 2) {
		delAttach(aid, 1);
	} else if(op == 3) {
		delImgAttach(aid, 1);
	}
	if(op < 2) {
		hideMenu('fwin_dialog', 'dialog');
		updateattachnum('image');
		updateattachnum('attach');
	} else {
		$('unusedrow' + aid).outerHTML = '';
		if(!ATTACHNUM['imageunused'] && !ATTACHNUM['attachunused']) {
			hideMenu('fwin_dialog', 'dialog');
		}
	}
}

function swfHandler(action, type) {
	if(action == 2) {
		if(type == 'image') {
			updateImageList(action);
		} else {
			updateAttachList(action);
		}
	}
}

function updateAttachList(action) {
	ajaxget('forum.php?mod=ajax&action=attachlist&posttime=' + $('posttime').value + (!fid ? '' : '&fid=' + fid), 'attachlist');
	switchAttachbutton('attachlist');$('attach_tblheader').style.display = $('attach_notice').style.display = '';
}

function updateImageList(action) {
	ajaxget('forum.php?mod=ajax&action=imagelist&pid=' + pid + '&posttime=' + $('posttime').value + (!fid ? '' : '&fid=' + fid), 'imgattachlist');
	switchImagebutton('imgattachlist');$('imgattach_notice').style.display = '';
}

function switchButton(btn, btns) {
	if(!$(editorid + '_btn_' + btn) || !$(editorid + '_' + btn)) {
		return;
	}
	$(editorid + '_btn_' + btn).style.display = '';
	$(editorid + '_' + btn).style.display = '';
	$(editorid + '_btn_' + btn).className = 'current';
	for(i = 0;i < btns.length;i++) {
		if(btns[i] != btn) {
			if(!$(editorid + '_' + btns[i]) || !$(editorid + '_btn_' + btns[i])) {
				continue;
			}
			$(editorid + '_' + btns[i]).style.display = 'none';
			$(editorid + '_btn_' + btns[i]).className = '';
		}
	}
}

function uploadWindowstart() {
	$('uploadwindowing').style.visibility = 'visible';
	$('uploadsubmit').disabled = true;
}

function uploadWindowload() {
	$('uploadwindowing').style.visibility = 'hidden';
	$('uploadsubmit').disabled = false;
	var str = $('uploadattachframe').contentWindow.document.body.innerHTML;
	if(str == '') return;
	var arr = str.split('|');
	if(arr[0] == 'DISCUZUPLOAD' && arr[2] == 0) {
		UPLOADWINRECALL(arr[3], arr[5], arr[6]);
		hideWindow('upload');
	} else {
		var sizelimit = '';
		if(arr[7] == 'ban') {
/*vot*/		sizelimit = '('+lng['attach_type_disabled']+')';
		} else if(arr[7] == 'perday') {
/*vot*/		sizelimit = '('+lng['attach_max']+' ' + arr[8] + ' '+lng['bytes']+')';
		} else if(arr[7] > 0) {
/*vot*/		sizelimit = '('+lng['attach_max']+' ' + arr[7] + ' '+lng['bytes']+')';
		}
/*vot*/	showDialog(lng['upload_failed']+': ' + STATUSMSG[arr[2]] + sizelimit);
	}
}

function uploadWindow(recall, type) {
	var type = isUndefined(type) ? 'image' : type;
	UPLOADWINRECALL = recall;
	showWindow('upload', 'forum.php?mod=misc&action=upload&fid=' + fid + '&type=' + type, 'get', 0, {'cover':1});
}

function updatetradeattach(aid, url, attachurl) {
	$('tradeaid').value = aid;
	$('tradeattach_image').innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
}

function updateactivityattach(aid, url, attachurl) {
	$('activityaid').value = aid;
	$('activityattach_image').innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
}

function updatesortattach(aid, url, attachurl, identifier) {
	$('sortaid_' + identifier).value = aid;
	$('sortattachurl_' + identifier).value = attachurl + '/' + url;
	$('sortattach_image_' + identifier).innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
}

function switchpollm(swt) {
	t = $('pollchecked').checked && swt ? 2 : 1;
	var v = '';
	for(var i = 0; i < $('postform').elements.length; i++) {
		var e = $('postform').elements[i];
		if(e.name.match('^polloption')) {
			if(t == 2 && e.tagName == 'INPUT') {
				v += e.value + '\n';
			} else if(t == 1 && e.tagName == 'TEXTAREA') {
				v += e.value;
			}
		}
	}
	if(t == 1) {
		var a = v.split('\n');
		var pcount = 0;
		for(var i = 0; i < $('postform').elements.length; i++) {
			var e = $('postform').elements[i];
			if(e.name.match('^polloption')) {
				pcount++;
				if(e.tagName == 'INPUT') e.value = '';
			}
		}
		for(var i = 0; i < a.length - pcount + 2; i++) {
			addpolloption();
		}
		var ii = 0;
		for(var i = 0; i < $('postform').elements.length; i++) {
			var e = $('postform').elements[i];
			if(e.name.match('^polloption') && e.tagName == 'INPUT' && a[ii]) {
				e.value = a[ii++];
			}
		}
	} else if(t == 2) {
		$('postform').polloptions.value = trim(v);

	}
	$('postform').tpolloption.value = t;
	if(swt) {
		display('pollm_c_1');
		display('pollm_c_2');
	}
}

function addpolloption() {
	if(curoptions < maxoptions) {
		$('polloption_new').outerHTML = '<p>' + $('polloption_hidden').innerHTML + '</p>' + $('polloption_new').outerHTML;
		curoptions++;
	} else {
/*vot*/	$('polloption_new').outerHTML = '<span>'+lng['vote_max_reached']+maxoptions+'</span>';
	}
}

function delpolloption(obj) {
	obj.parentNode.parentNode.removeChild(obj.parentNode);
	curoptions--;
}

function insertsave(pid) {
	var x = new Ajax();
	x.get('forum.php?mod=misc&action=loadsave&inajax=yes&pid=' + pid + '&type=' + wysiwyg, function(str, x) {
		insertText(str, str.length, 0);
	});
}