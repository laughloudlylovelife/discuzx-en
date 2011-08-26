var chm = 0;
var menu =
[
	['Home','index.htm'],
	['UCenter structure','structure.htm'],
	['Interface functions','function.htm'],
	[
		['User Interface','user.htm'],
		['Private Messages','pm.htm'],
		['Friends Interface','friend.htm'],
		['Credit Interface','credit.htm'],
		['Avatar Interface','avatar.htm'],
		['Tags Interface','tag.htm'],
		['Event Feed Interface','feed.htm'],
		['Application Interface','app.htm'],
		['Mail Interface','mail.htm'],
	],
	['API Interface','api.htm'],
	['Examples','example.htm']
];

function $(id) {
	return document.getElementById(id);
}

var currentfile = location.href.substr(location.href.lastIndexOf('/') + 1);
function documentmenu(showtype) {
	var returnstr = '';
	if(showtype && chm) {
		document.body.style.background = 'none';
		$('wrap').style.paddingLeft = 0;
		return;
	}
	var menucount = 0;
	var tabon;
	for(var i in menu) {
		if(typeof(menu[i][0]) == 'object') {
			if(showtype) {
				returnstr += '<div class="subinfo" id="menu' + menucount + '" style="display: ">';
				for(var k in menu[i]) {
					tabon = '';
					if(currentfile == menu[i][k][1]) {
						tabon = 'tabon ';
					}
					if(!menu[i][k][1]) {
						menu[i][k][1] = '';
					}
					returnstr += '<a class="' + tabon + 'sidelist" href="' + menu[i][k][1] + '">' + menu[i][k][0] + '</a>';
				}
				returnstr += '</div>';
			}
		} else {
			tabon = '';
			if(!menu[i][1]) {
				menu[i][1] = '';
			}
			if(showtype) {
				menucount++;
				if(currentfile == menu[i][1]) {
					tabon = 'tabon ';
				}
				returnstr += '<a class="' + tabon + 'sideul"';
				if(menu[i][1] != '') {
					returnstr += ' href="' + menu[i][1] +'"';
				}
				returnstr += '><em class="shrink" onclick="collapse(this, \'menu' + menucount + '\');return false">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>' + menu[i][0] + '</a>';
			} else {
				returnstr += '<li><a';
				if(menu[i][1] != '') {
					returnstr += ' href="' + menu[i][1] +'"';
				}
				returnstr += '>' + menu[i][0] + '</a></li>';
			}
		}
	}
	if(showtype) {
		document.write('<div class="side" style="height: 400px;">' + returnstr + '</div>');
	} else {
		return '<ul>' + returnstr + '</ul>';
	}
}

function showmenu(ctrl) {
	ctrl.className = ctrl.className == 'otherson' ? 'othersoff' : 'otherson';
	var menu = parent.document.getElementById('toggle');
	if(!menu) {
		menu = parent.document.createElement('div');
		menu.id = 'toggle';
		menu.innerHTML = documentmenu(0);
		var obj = ctrl;
		var x = ctrl.offsetLeft;
		var y = ctrl.offsetTop;
		while((obj = obj.offsetParent) != null) {
			x += obj.offsetLeft;
			y += obj.offsetTop;
		}
		menu.style.left = x + 'px';
		menu.style.top = y + ctrl.offsetHeight + 'px';
		menu.className = 'togglemenu';
		menu.style.display = '';
		parent.document.body.appendChild(menu);
	} else {
		menu.style.display = menu.style.display == 'none' ? '' : 'none';
	}
}

function collapse(ctrlobj, showobj) {
	if(!$(showobj)) {
		return;
	}
	if($(showobj).style.display == '') {
		ctrlobj.className = 'spread';
		$(showobj).style.display = 'none';
	} else {
		ctrlobj.className = 'shrink';
		$(showobj).style.display = '';
	}
}
