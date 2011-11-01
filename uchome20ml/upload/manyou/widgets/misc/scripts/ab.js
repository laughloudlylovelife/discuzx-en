//add at 090217
window._MYABCUserAgent = navigator.userAgent.toLowerCase();

var MYABC_Config =
{
  //manyou上页面所在的域
  host: 'widgets.manyou.com',
  //调用后首先显示的页面
  choosePage: '/ab_chooser/provider',
  /*add at 081225*/
  //邮箱登陆或文件上传页面
  loginPage: '/ab_chooser/login',
  hashSign: '____',
  //modify at 090217
  b_version: (_MYABCUserAgent.match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [])[1],
  b_msie: /msie/.test(_MYABCUserAgent) && !/opera/.test(_MYABCUserAgent),
  b_webkit: /webkit/.test(_MYABCUserAgent),
  b_opera: /opera/.test(_MYABCUserAgent),
  css1Compat: (document.compatMode == "CSS1Compat")
};
  
/*add at 081225*/
window.$myabc_popup_div = null;
window._useMYABCIframe = false;
window._MYABCMiddleItv = null;
window._MYABCMiddleFlag = 0;
//add at 090203
window._MYABCReceivePool = new Array();

if (typeof String.prototype.trim == "undefined") {
  String.prototype.trim = function(){
    return this.replace(/^\s+/, '').replace(/\s+$/, '');
  };
}

//modify at 090302
var MYABC$ = function(d, win)
{
  return (win||window).document.getElementById(d);
};

MYABC = {};
MYABC.util = {};

MYABC.getProviders = function()
{
	var list = new Array();
	list.push({name:'\u641c\u72d0', id:'Sohu', logo:'http://widgets.manyou.com/misc/images/ab/logo_sohu.gif'});
	list.push({name:'\u65b0\u6d6a', id:'Sina', logo:'http://widgets.manyou.com/misc/images/ab/logo_sina.gif'});
	list.push({name:'\u7f51\u6613163', id:'163', logo:'http://widgets.manyou.com/misc/images/ab/logo_163.gif'});
	list.push({name:'\u96c5\u864e(Yahoo!)', id:'Yahoo', logo:'http://widgets.manyou.com/misc/images/ab/logo_yahoo.gif'});
	list.push({name:'Gmail', id:'Gmail', logo:'http://widgets.manyou.com/misc/images/ab/logo_gmail.gif'});
	list.push({name:'MSN', id:'IMMSN', logo:'http://widgets.manyou.com/misc/images/ab/logo_immsn.gif'});
	list.push({name:'QQ', id:'Qzone', logo:'http://widgets.manyou.com/misc/images/ab/logo_imqq.gif'});
	return list;
};
MYABC.showChooser = function(textAreaID, callbackPage, defaultService, isNameInData, useWinOpen, customStyleBaseName)
{
	//add at 090203
	window._MYABCReceivePool = new Array();
	
	var host = MYABC_Config.host;
  var cbPage = callbackPage;
  var defSer = (defaultService||''); // modify by zgq
  if(isNameInData===undefined){
  	isNameInData = false;
  }
  if(useWinOpen===undefined){
  	useWinOpen = true;
  }
  
  var taObj = MYABC$(textAreaID);
  if (!taObj)
  {
    //请指定联系人选择器的文本域!
    alert("\u8bf7\u6307\u5b9a\u8054\u7cfb\u4eba\u9009\u62e9\u5668\u7684\u6587\u672c\u57df!");
    return;
  }
  
  var page = '';
  //use window.open
  if (useWinOpen)
  {
  	  _useMYABCIframe = false;
  	  
  	  var abWin = window.manyouABWindow;
	  if (!abWin || abWin.closed)
	  {
	  	page = MYABC.util.makeInitUrl(defSer, host, cbPage, textAreaID, taObj, isNameInData);
	    window.manyouABWindow = window.open(page, 'ManyouABChooser', 'resizable=no,scrollbars=no,width=460,height=460', false);
	  }
	  if (abWin)
	  {
	    try{
	      abWin.focus();
	    } catch(ex) {}
	  }
  }
  //use iframe
  else
  {
  	  _useMYABCIframe = true;
			
  	  page = MYABC.util.makeInitUrl(defSer, host, cbPage, textAreaID, taObj, isNameInData);
  	  MYABC.util.showPopup(page, customStyleBaseName);
  }
  
};
MYABC.util.doSwitch = function(imgObj)
{
  var isHide = (MYABC$('ab_data_list').style.display == 'none');
  var oldSrc = imgObj.src;
  if(isHide){
    MYABC$('ab_data_list').style.display = '';
    imgObj.src = oldSrc.replace('show', 'hide');
  }else{
    MYABC$('ab_data_list').style.display = 'none';
    imgObj.src = oldSrc.replace('hide', 'show');
  }
};
MYABC.doOnLoad1 = function()
{
  var ipts = document.getElementsByTagName('input');
  
  for (var ii=0;ii<ipts.length;ii++) {
    var it = ipts[ii];
    if (it.type == 'radio') {
  	  it.checked = true;
  	  break;
    }
  }
  ipts = null;
  delete ipts;
};
MYABC.onSubmit1 = function(form)
{
	var f = form;
	var ab = MYABC.util.getSelectedAB(f);
	if(!ab) return false;
	form.actionType.value = MYABC.util.getActionType(ab);
	return true;
};
MYABC.onSubmit2 = function(form)
{
  var actionType = form.actionType.value;
  //csv upload
  if (actionType == 'cta')
  {
    var uploadValue = form.Upload.value;
    var hasUpload = (uploadValue!=null && uploadValue.length>0);
		if(!hasUpload)
    {
      //请选择要上传的文件!
      alert("\u8bf7\u9009\u62e9\u8981\u4e0a\u4f20\u7684\u6587\u4ef6!");
			return false;
		}
    var dotIdx = uploadValue.lastIndexOf('.');
    if (dotIdx && dotIdx<uploadValue.length)
    {
      var ext = uploadValue.substr(dotIdx+1).toLowerCase();
      var vfiles = ['csv','tsv','txt','tab','stxt','ldif','vcf'];
      var isValid = false;
      for (var ii=0; ii<vfiles.length; ii++)
      {
        if (ext == vfiles[ii]) isValid = true;
      }
      if (!isValid)
      {
        //请选择格式合法的文件!
        alert("\u8bf7\u9009\u62e9\u683c\u5f0f\u5408\u6cd5\u7684\u6587\u4ef6!");
        return false;
      }
    }else
    {
      //请选择格式合法的文件!
      alert("\u8bf7\u9009\u62e9\u683c\u5f0f\u5408\u6cd5\u7684\u6587\u4ef6!");
      return false;
    }
  }
  //email sign in
  else
  {
    var username = form.username.value;
    var password = form.password.value;
    if (username.length==0)
    {
      //请填写帐户名称
      alert('\u8bf7\u586b\u5199\u5e10\u6237\u540d\u79f0');
      return false;
    }
    if (password.length==0)
    {
      //请填写密码
      alert('\u8bf7\u586b\u5199\u5bc6\u7801');
      return false;
    }
  }
  form.style.display = 'none';
  MYABC$('importing').style.display = '';

  if (form.ImportMethod.value.indexOf('QQMail')>-1)
  {
	  form.starttime.value = (new Date()).valueOf();
	  var PublicKey = "CF87D7B4C864F4842F1D337491A48FFF54B73A17300E8E42FA365420393AC0346AE55D8AFAD975DFA175FAF0106CBA81AF1DDE4ACEC284DAC6ED9A0D8FEB1CC070733C58213EFFED46529C54CEA06D774E3CC7E073346AEBD6C66FC973F299EB74738E400B22B1E7CDC54E71AED059D228DFEB5B29C530FF341502AE56DDCFE9";
	  var RSA = new RSAKey();
	  RSA.setPublic(PublicKey, "10001");
	  var Res = RSA.encrypt( password + '\n' + form.ts.value + '\n' );
	  if (Res)
	  {
		  form.password.value = hex2b64(Res);
	  }

	  var MaskValue = "";
	  for (var Loop = 0; Loop < password.length; Loop++, MaskValue += "0");
	  form.mask.value = MaskValue;
  }
  else if (form.ImportMethod.value.indexOf('Qzone')>-1)
  {
	  form.u.value = form.username.value;
	  form.p.value = form.password.value;
	  form.verifycode.value = form.rand.value;
	  ptui_onLoginEx(form, 'qq.com');
	  form.password.value = form.p.value;

  }
  return true;
};
MYABC.doOnLoad4 = function()
{
  //ajax获取数据
  var ajax = new MYABAjax();
  window.setTimeout(function(){
  
    ajax.doAjax(ajaxPage, 'text', function(data){

	  //modify at 090219
      MYABC.contactsData = '';
	  try {
		MYABC.contactsData = MYABC.JSON.decode(data);
	  } catch(ex) {
		alert("JSON ERROR: \n" + ex);
	  }

      var jData = MYABC.contactsData;

      //填充ajax返回数据到div中
      //文件夹标题
      MYABC$('ab_data_folder').innerHTML = jData.folder;
      //项目数量
      MYABC$('ab_data_count').innerHTML = '(' + jData.list.length + '\u4e2a\u9879\u76ee)'; //个项目
      //列表内容
      var listDOM = MYABC$('ab_data_list');
      try{
        listDOM.innerHTML = '';
      } catch(ex) {
        listDOM.removeChild( listDOM.getElementsByTagName('tr')[0] );
      }
      var listData = jData.list;
      for (var ii=0; ii<listData.length; ii++) {
      	/*modify at 081225*/
      	MYABC.util.createListItem(listDOM, listData[ii], ii, ii%2==1);
      }
      listDOM = null;
      delete listDOM;
    }, function(err){
	//modify at 090219
      alert("Ajax Error: \n"+err.status+"\n"+err.responseText);
    }, 'foo=null');
    
    MYABC$('next_btn').removeAttribute('disabled');
    MYABC$('seek_ipt').removeAttribute('disabled');
    
  }, 1000);
};
MYABC.onSubmit4 = function()
{
  var listDOM = MYABC$('ab_data_list');
  var items = listDOM.getElementsByTagName('input');
  var arr = [];
  for (var ii=0; ii<items.length; ii++) {
    var it = items[ii];
    if (it.type=='checkbox' && it.checked) {
      var val = it.value;
      var na = MYABC$('my_list_name_'+val).innerHTML;
      var ad = MYABC$('my_list_addr_'+val).innerHTML;
      arr.push({name:na, addr:ad});
    }
  }
	
	//modify at 090203
	var dataStr =  escape(emails + "," + MYABC.util.formatRecipientList(arr));
	var hashSign = MYABC_Config.hashSign;
	var theURL = cbUrl + (cbUrl.indexOf("#")==-1?"#":hashSign)
						+ "ta=" + textareaID + hashSign
						+ "useifm=" + useifm + hashSign
            + "rt=" + Math.ceil(Math.random()*99999) + hashSign;
	var limitLen = 2000 - theURL.length - ("state=" + "xxxxx_xxxxx" + hashSign + "data=").length;
	if (limitLen<=0) {
		alert("request url length error!");
		return false;
	}
	
	var dataParts = MYABC.util.splitLongStr(dataStr, limitLen);
	
	for (var jj=0; jj<dataParts.length; jj++) {
		MYABC.util.makeChannel({
			id:jj,
			url:theURL,
			state:jj+'_'+dataParts.length,
			data: dataParts[jj]
		});
	}
	
  return false;
};
MYABC.onSeekABData = function(vlu)
{
  var data = MYABC.contactsData.list;
  for (var ii=0; ii<data.length; ii++)
  {
    var dom = MYABC$('my_list_item_'+ii);
    var it = data[ii];
    if ( it.name.indexOf(vlu)>-1 || it.addr.indexOf(vlu)>-1 )
    {
      dom.style.display = '';
    }
    else
    {
      dom.style.display = 'none';
    }
  }
};
MYABC.onMYABCFindAll = function(ifAll)
{
  var chbs = document.getElementsByName('my_list_chb');
  for (var ii=0; ii<chbs.length; ii++) {
    if(ifAll){
      chbs[ii].checked = 'checked';
    }else{
      chbs[ii].checked = false;
    }
  }
  chbs = null;
  delete chbs;
  return false;
};
//modify at 090203
MYABC.onCBPageLoad = function()
{
  var hash = location.href.substring(location.href.indexOf("#")+1);
	MYABC.util.addRecipientText(hash);
};


MYABC.util.showPopup = function(url, customStyleBaseName)
{
	if (!document.getElementById('myabc_popup_div_id')) {
		var sname = customStyleBaseName||'myabc';
		
		if (!customStyleBaseName) {
			MYABC.util.writeMYABCPopupStyle();
		}
  	$myabc_popup_div = document.createElement('DIV');
  	document.getElementsByTagName('body')[0].appendChild($myabc_popup_div);
  	$myabc_popup_div.className = sname + '_popup_div';
		$myabc_popup_div.id = 'myabc_popup_div_id';
  	MYABC.util.middleElem();
  	_MYABCMiddleItv = window.setInterval(function(){
  		MYABC.util.middleElem();
  		_MYABCMiddleFlag++;
  		if (_MYABCMiddleFlag>2) {
  			window.clearInterval(_MYABCMiddleItv);
  			_MYABCMiddleItv = null;
  			_MYABCMiddleFlag = 0;
  		}
  	}, 50);
  	if (window.addEventListener) {
  		window.addEventListener('scroll',MYABC.util.middleElem,false);
  		window.addEventListener('resize',MYABC.util.middleElem,false);
  	}
  	if (window.attachEvent) {
  		window.attachEvent('onscroll',MYABC.util.middleElem);
  		window.attachEvent('onresize',MYABC.util.middleElem);
  	}
  	var content = '<div class="' + sname + '_popup_close"><a href="#" onclick="MYABC.util.closeMYABCPopupWin();return false;">[&#20851;&#38381;]</a></div>'; //Close
  	content += '<iframe class="' + sname + '_popup_ifm" src="'+ url +'" frameborder="no" scrolling="no"></iframe>';

  	$myabc_popup_div.innerHTML = content;
		
		return false;
	}
};
/*add at 081225*/
MYABC.util.writeMYABCPopupStyle = function()
{
	var oldSS = document.getElementById('myabcPopupStylesheet');
	if (oldSS) {
		document.getElementsByTagName('head')[0].removeChild(oldSS);
	}
	oldSS = null;
	delete oldSS;
	//modify at 090217
	var sContent = '.myabc_popup_div {width:460px; height:490px; background-color:#fff; border:solid #bbb; border-width:2px 1px 1px 1px; position:absolute; top:0; left:0; z-index:333; overflow:hidden; margin:0; padding:0}.myabc_popup_ifm {width:460px; height:460px; border:0;}.myabc_popup_close {height:22px; margin:0; padding:0;}.myabc_popup_close a {font-size:12px !important; text-decoration:none; color:#6CAAD9; display:block; padding:0; margin:7px 0 0 410px;}';
	var sObj = document.createElement('style');
	document.getElementsByTagName('head')[0].appendChild(sObj);
	sObj.setAttribute('type', 'text/css');
	sObj.setAttribute('rel', 'stylesheet');
	sObj.setAttribute('id', 'myabcPopupStylesheet');
	if (sObj.styleSheet) {
		sObj.styleSheet.cssText = sContent;
	} else {
		sObj.appendChild(document.createTextNode(sContent));
	}
	sObj = null;
	delete sObj;
};

MYABC.util.closeMYABCPopupWin = function()
{
	if(!$myabc_popup_div) return;
	window.clearInterval(_MYABCMiddleItv);
	_MYABCMiddleItv = null;
	
	if (window.removeEventListener) {
		window.removeEventListener('scroll',MYABC.util.middleElem,false);
		window.removeEventListener('resize',MYABC.util.middleElem,false);
	}
	if (window.detachEvent) {
		window.detachEvent('onscroll',MYABC.util.middleElem);
		window.detachEvent('onresize',MYABC.util.middleElem);
	}
	
	window.setTimeout(function(){
		document.getElementsByTagName('body')[0].removeChild( document.getElementById('myabc_popup_div_id') );
	},20);
	
	$myabc_popup_div = null;
};
//modify at 090217
MYABC.util.middleElem = function()
{
	var obj = $myabc_popup_div;
	if (!obj) return;
	window.setTimeout(function(){
	//TODO
		var ie = MYABC_Config.b_msie;
		var ie6 = ( ie && MYABC_Config.b_version<7 );
		
		var shouldFix = ie
						? MYABC_Config.b_version<7
							? false
							: MYABC_Config.css1Compat
								? true
								: false
						: true;
		
		obj.style.position = (shouldFix?'fixed':'absolute');
		
		var $base = document.createElement('div');
		document.getElementsByTagName('body')[0].appendChild($base);
		$base.style.position = (shouldFix?'fixed':'absolute');
		$base.style.left = '0';
		$base.style.top = '0';
		$base.style.zIndex = '567';
		$base.style.width = "100%";
		$base.style.height = ie6
								? (Math.min(document.documentElement.scrollHeight,document.documentElement.clientHeight)+'px')
								:"100%";
		$base.style.border = '2px dashed red';
		$base.innerHTML = "&nbsp;";
		
		var winW = Math.min($base.scrollWidth, $base.clientWidth);
		if (MYABC_Config.b_opera) {
			winW = $base.clientWidth;
		}
		var divW = obj.clientWidth;
		try{
			var vl = (0.5*(winW-divW) + parseInt(ie6?document.documentElement.scrollLeft:0));
			vl = vl<0?0:vl;
			obj.style.left = vl + 'px';
		}catch(ex){}
		var winH = Math.max($base.scrollHeight, $base.clientHeight);
		var divH = obj.clientHeight;
		try{
			var vt = (0.5*(winH-divH) + parseInt(ie6?document.documentElement.scrollTop:0));
			vt = vt<0?0:vt;
			obj.style.top = vt + 'px';
		}catch(ex){}
		
		$base.parentNode.removeChild($base);
		$base = null;
		delete $base;
	}, 10);
};
/*add at 081225*/
MYABC.util.getCurrStyle = function(object, styleName)
{
	if (!object || !styleName) return;
	try{
		return (typeof(window.getComputedStyle) == 'undefined')?object.currentStyle[styleName]:window.getComputedStyle(object,null)[styleName];
	} catch(ex) {
		return object.style[styleName]||'';
	}
};
/*add at 081225*/
MYABC.util.makeInitUrl = function(defSer, host, cbPage, textAreaID, taObj, isNameInData)
{
	var skipChoose = defSer.length;
  	
  	var page = 'http://' + host + (skipChoose?MYABC_Config.loginPage:MYABC_Config.choosePage) + '?';
    
    var exts = {};
    if (skipChoose) {
    	exts.ab = defSer;
    	exts.actionType = MYABC.util.getActionType(defSer);
    }
    exts.cb = location.protocol + "//" + location.host + cbPage;
    exts.ta = textAreaID;
    exts.emails = escape( MYABC.util.getEmailsFromStr(taObj.value).join(',') );
    exts.hasn = isNameInData?'0':'1';
    exts.useifm = _useMYABCIframe?'0':'1';
    exts.ts = new Date().getTime();
    
    page += MYABC.util.toQueryString(exts);
		
    return page;
};
/*add at 081225*/
MYABC.util.getActionType = function(serviceName)
{
  switch (serviceName)
  {
    case 'outlook_manual':
      return 'cta';
    break;
    case 'outlook':
      return 'cta';
    break;
    case 'other':
      return 'cta';
    break;
    default:
      return '';
  }
};
//modify at 090203
MYABC.util.toQueryString = function(options)
{
  var queryComponents = [];
  for (key in options) {
    if (typeof options[key] == 'function') continue;
    var queryComponent = escape(key) + '=' + escape(options[key]);
    queryComponents.push(queryComponent);
  }
  return queryComponents.join('&');
};
MYABC.util.getEmailsFromStr = function(str)
{
  var emails = [];
  var index = 0;
  while (true) {
    index = str.indexOf('@', index);
    if (index == -1) break;
    var start = MYABC.util.String.findBoundary(str, index - 1, false);
    var end = MYABC.util.String.findBoundary(str, index + 1, true);
    var email = str.substring(start, end + 1).toLowerCase();
    emails.push(email);
    index++;
  }
  return emails;
};

//modify at 090203
MYABC.util.addCheckedRecipients = function(text, win)
{
  if (!text) return false;
	
	var hArr = text.split(MYABC_Config.hashSign);
	
  var mInfo = [];
	
  for (var ii=0; ii<hArr.length; ii++) {
    var it = hArr[ii].split("=");
    mInfo[it[0]] = it[1];
  }
	
  var textareaID = mInfo.ta;
	if (!textareaID || !win.MYABC$(textareaID) ) {
    alert('No text area to add recipients to!');
    return false;
  }
	
	var stateArr = mInfo.state.split('_');	
	var total = stateArr[1]*1;
	var step = stateArr[0]*1;
	
	win._MYABCReceivePool[step] = mInfo.data;
	
	if (step < total-1) return;
	
  var str = '';
	
	var pool = win._MYABCReceivePool;
	
	for (var i=0; i<pool.length; i++) {
		str += pool[i];
	}
	
	win._MYABCReceivePool = [];
	
	str = unescape(str);
	
	if (/^,/.test(str)) {
		str = str.substring(1, str.length);
	}
	
  win.MYABC$(textareaID).value = str;
	
	var useifm = mInfo.useifm;
  
  if ( parseInt(useifm)==0) {
  	win.MYABC.util.closeMYABCPopupWin();
  } else {
  	top.close();
  }
	
	//页面中自定义的
	if (win.onABCommComplete) {
		win.onABCommComplete(str);
	}
	
  return true;
};
/*delete at 090203*/
// MYABC.util.getReturnData = function(data)
// {
  // return null;
// };
/*modify at 081225*/
MYABC.util.createListItem = function(parentDom, item, idNum, even)
{
  var li = document.createElement('TR');
  parentDom.appendChild(li);
  parentDom = null;
  delete parentDom;
  li.className = even?'color':'';
  li.id = 'my_list_item_' + idNum;

  var cols = [];
  
  for (var ii=0; ii<4; ii++) {
    var col = document.createElement('TD');
    li.appendChild(col);
    col.className = 'col' + (ii + 1);
    col.innerHTML = '&nbsp;';
    cols.push(col);
  } //end of for
  
  if ( !MYABC.util.emailHasExisted(item.addr) ) {
    cols[1].innerHTML = '<input type="checkbox" name="my_list_chb" value="' + idNum + '"/>';
    cols[2].innerHTML = '<span id="my_list_name_' + idNum + '">' + item.name + '</span>';
    cols[3].innerHTML = '<span id="my_list_addr_' + idNum + '">' + item.addr + '</span>';
  } else {
    cols[2].innerHTML = '<span id="my_list_name_' + idNum + '">' + item.name
                  + ' <span class="added">(\u5df2\u6dfb\u52a0)</span></span>'; //已添加
    cols[3].innerHTML = '<span id="my_list_addr_' + idNum + '">' + item.addr + '</span>';
  }

  for (var jj=0; jj<cols.length; jj++) {
    cols[jj] = null;
    delete cols[jj];
  }

  return li;
};
MYABC.util.emailHasExisted = function(addr)
{
  if (!emails.length) return false;
  var eArr = emails.split(",");
  for (var ii=0; ii<eArr.length; ii++) {
    if (addr == eArr[ii].trim()) {
      return true;
      break;
    }
  }
  return false;
};
//modify at 090203
//modify at 090219
MYABC.util.addRecipientText = function(hash)
{
	if (!hash || hash.length == 0) {
		return false;
	}
	
	var useifm = 0;
	
	var m = hash.match(/^.+useifm\=(\d)____rt/, '');
	
	if (m!=null) {
	
		useifm = m[1]*1;

	}
	
	//modify at 090302
	var p = useifm ? parent.parent.opener : parent.parent;
	if (p) {
		MYABC.util.addCheckedRecipients(hash, p);		
		return true;
	}
	return false;
};
/*modify at 081225*/
MYABC.util.formatRecipientList = function(data)
{
	var recips = [];
	for (var i = 0; i < data.length; i++) {
		var fmt;
		if (hasname == 0) {
			fmt = '"' + data[i].name + '" <' + data[i].addr + '>';
		} else {
			fmt = data[i].addr;
		}
		recips.push(fmt);
	}
	return recips.join(', ');
};
MYABC.util.getSelectedAB = function(form)
{
	var r = form.ab;
	for(var i=0;i<r.length;i++)
  {
		if(r[i].checked)
    {
			return r[i].value;
		}
	}
	return null;
};
MYABC.util.propertyIsEnumerable = function(o, p)
{
    if (o.propertyIsEnumerable) {
        return o.propertyIsEnumerable(p);
    }
    for (var prop in o) {
        if (prop == p) {
            return true;
        }
    }
    return false;
};

//add at 090203
MYABC.util.makeChannel = function(args) {

	var ifmID = "ifm" + args.id;
	var	url = args.url;
	var state = args.state;
	var data = args.data;

  var hashSign = MYABC_Config.hashSign;
	var ifmSrc = url 
							+ "state=" + state + hashSign
							+ "data=" + data;
	
  var ifm = MYABC$(ifmID);
	if ( ifm ) {
    document.getElementsByTagName('body')[0].removeChild(ifm);
  }
  ifm = document.createElement('IFRAME');
  document.getElementsByTagName('body')[0].appendChild(ifm);
  ifm.id = ifmID;
  ifm.style.display = 'none';
	try {
		ifm.src = ifmSrc;
	} catch(ex) {}
	
};
//add at 090203
MYABC.util.splitLongStr = function(str, baseNum) {
	var base = baseNum;
	var num = Math.ceil(str.length/base);
	var arr = new Array(num);
	for (var ii=0; ii<num; ii++) {
		var subs;
		if (ii<num-1) {
			subs = str.substring(ii*base, (ii+1)*base);
		} else {
			subs = str.substring(ii*base, str.length);
		}
		arr[ii] = subs;
	}
	return arr;
};

MYABC.util.Timer = {
  timers: {},
  startTimer: function(id) {
    if (!this.enabled) return;
    this.timers.id = new Date().getTime();
  },
  getElapsedTime: function(id) {
    if (!this.enabled) return;
    var start = this.timers.id;
    if (!start) {
      alert('Unknown timer: ' + id);
    }
    return new Date().getTime() - start;
  },
  alertElapsedTime: function(id) {
    if (!this.enabled) return;
    alert('Elapsed time for "' + id + '": ' + this.getElapsedTime(id));
  },
  enabled: true,
  setTimersEnabled: function(state) {
    this.enabled = state;
  }
};

MYABC.util.String = {
  contains: function(whole, part) {
    return whole.indexOf(part) != -1;
  },
  alnumChars: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_",
  isalnum: function(ch) {
    return this.contains(this.alnumChars, ch);
  },
  otherSafeEmailChars: ".-+=",
  findBoundary: function(s, start, forward) {
    if (forward) {
      for (var i = start; i < s.length; i++) {
        var ch = s.charAt(i);
        if (!MYABC.util.String.isalnum(ch) && !this.contains(this.otherSafeEmailChars, ch)) {
          return i - 1;
        }
      }
      return s.length - 1;
    } else {
      for (var i = start - 1; i >= 0; i--) {
        var ch = s.charAt(i);
        if (!MYABC.util.String.isalnum(ch) && !this.contains(this.otherSafeEmailChars, ch)) {
          return i + 1;
        }
      }
      return 0;
    }
  }
};

MYABC.util.Looper = {
  doLoop: function(list, func, doneFunc, loopSize, start) {
    if (!loopSize) loopSize = 500;
    if (!start) start = 0;

    var max = start + loopSize;
    var lastLoop = false;
    if (max > list.length) {
      max = list.length;
      lastLoop = true;
    }

    for (var i = start; i < max; i++) {
      func(list, i);
    }

    if (lastLoop) {
      if (doneFunc) doneFunc();
    } else {
      setTimeout(function() {
        MYABC.util.Looper.doLoop(list, func, doneFunc, loopSize, max);
      }, 0);
    }
  }
};

MYABC.util.Form = {
  getSelectValue: function(sel) {
    if (!sel) return null;
    if (!sel.options) return sel.value;
    return sel.options[sel.selectedIndex].value;
  },
  focusFirstVisibleFormElem: function(f, findFirstBlankField) {
    for (var i = 0; i < f.length; i++) {
      var el = f.elements[i];
      if (el.type != 'hidden' && el.style.display != 'none' && (!findFirstBlankField || el.value.length == 0) && el.focus) {
        el.focus();
        break;
      }
    }
  }
};

//json begin
MYABC.JSON = function ()
{
  function f(n) {
    return n < 10 ? "0" + n : n;
  };

  Date.prototype.toJSON = function () {
    return this.getUTCFullYear() + "-"
          + f(this.getUTCMonth() + 1) + "-"
          + f(this.getUTCDate()) + "T"
          + f(this.getUTCHours()) + ":"
          + f(this.getUTCMinutes()) + ":"
          + f(this.getUTCSeconds()) + "Z";
  };

  var m = {'\b': "\\b", '\t': "\\t", '\n': "\\n", '\f': "\\f", '\r': "\\r", '"': "\\\"", '\\': "\\\\"};

  function stringify(value, whitelist) {
    var a, i, k, l, v;
    switch (typeof value) {
      case "string":
        return (new RegExp("[\0-\x1F\\\\\"]")).test(value)
                ? "\"" + value.replace(/[\x00-\x1f\\"]/g, function (a) {var c = m[a];if (c) {return c;}c = a.charCodeAt();return "\\u00" + Math.floor(c / 16).toString(16) + (c % 16).toString(16);}) + "\""
                : "\"" + value + "\"";
      case "number":
        return isFinite(value) ? String(value) : "null";
      case "boolean":
        return String(value);
      case "null":
        return "null";
      case "object":
        if (is_node(value)) {
          return null;
        }
        if (!value) {
          return "null";
        }
        if (typeof value.toJSON === "function") {
          return stringify(value.toJSON());
        }
        a = [];
        if (typeof value.length === "number" && !MYABC.util.propertyIsEnumerable(value, "length")) {
          l = value.length;
          for (i = 0; i < l; i += 1) {
            a.push(stringify(value[i], whitelist) || "null");
          }
          return "[" + a.join(",") + "]";
        }
        if (whitelist) {
          l = whitelist.length;
          for (i = 0; i < l; i += 1) {
            k = whitelist[i];
            if (typeof k === "string") {
              v = stringify(value[k], whitelist);
              if (v) {
                a.push(stringify(k) + ":" + v);
              }
            }
          }
        } else {
          for (k in value) {
            if (typeof k === "string") {
              v = stringify(value[k], whitelist);
              if (v) {
                a.push(stringify(k) + ":" + v);
              }
            }
          }
        }
        return "{" + a.join(",") + "}";
        default:;
    }
  };

  return {
          stringify: stringify,
          parse: function (text, filter) {
            var forSign = "for (;;);";
            if ( text.length>forSign.length && text.substring(0,forSign.length)==forSign ) {
              text = text.substring(forSign.length, text.length);
            }
            
            var j;
            function walk(k, v) {
              var i, n;
              if (v && typeof v === "object") {
                for (i in v) {
                  if (Object.prototype.hasOwnProperty.apply(v, [i])) {
                    n = walk(i, v[i]);
                    if (n !== undefined) {
                      v[i] = n;
                    }
                  }
                }
              }
              return filter(k, v);
            }
            if (text && /^[\],:{}\s]*$/.test(
                  text.replace(/\\./g, "@")
                  .replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(:?[eE][+\-]?\d+)?/g, "]")
                  .replace(/(?:^|:|,)(?:\s*\[)+/g, "")
            )) {
              j = eval("(" + text + ")");
              return typeof filter === "function" ? walk("", j) : j;
            }
            throw new SyntaxError("decodeJSON");
          }
  };
}();


MYABC.JSON.encode = MYABC.JSON.stringify;
MYABC.JSON.decode = MYABC.JSON.parse;
//json end

//ajax begin
var MYABAjax = function(){};
MYABAjax.prototype.url = null;
MYABAjax.Free = function(a)
{
  a=null;
  return  ajaxnull;
  function ajaxnull(){}
};

//参数：URL、返回类型('text'|'xml'|'json')、回调函数、错误处理函数、POST参数
/*public*/ MYABAjax.prototype.doAjax = function(url, returnType, callback, errorHandler, postParamsStr)
{
  this.eAA(callback,url,returnType,errorHandler,postParamsStr);
};

/*private*/ MYABAjax.prototype.eAA = function(it,u,rt,er,sv)
{
  var st  = "GET";
  var s = "";
  if(sv)
  {
    s  = sv ;
    st  = "POST";
   }
  var eA = MYABHttpRequest();
  eA.onreadystatechange = function(){
      if(eA.readyState==4){
          if (eA.status == 200) {
              if(rt=="text"){
                o(eA.responseText);
              } else if(rt=="xml") {
                o(eA.responseXML);
              } else if(rt=="json") {
                o(eA.responseText);
              }
              MYABAjax.Free(eA);
              if (typeof CollectGarbage!='undefined') {
                CollectGarbage();
              }
          }
          else
          {
              if(typeof(er)=="function")
              {
                er(eA);
              }else{
                alert("Ajax Error："+eA.status);
              }
          }
      }
  };
  var o = function(v){
      if (typeof(it)=="function") {
        it(v);
      }
      eA = null;
      delete eA;
  };
  if(u.indexOf('?') > -1) {
      u+="&randn=";
  } else {
    u+="?randn=";
  }
  u += Math.round(Math.random()*10000)*Math.round(Math.random()*10000) ;

  this.url = u;
  eA.open(st,u,true);
  eA.setRequestHeader("content-length",s.length);
  eA.setRequestHeader("content-type","application/x-www-form-urlencoded");
  eA.send(s);
  return eA;
};

//modify at 090107
var MYABHttpRequest = function()
{
  var xmldoc = null;
  if(window.XMLHttpRequest){
    xmldoc = new XMLHttpRequest();
    //if(xmldoc.overrideMimeType){
      //xmldoc.overrideMimeType("text/xml");
    //}
  }else if(window.ActiveXObject){
		try{
      xmldoc = new ActiveXObject("Msxml5.XMLHTTP");
    }catch(e){
      try{
        xmldoc = new ActiveXObject("Msxml4.XMLHTTP");
      }catch(e){
        try{
          xmldoc = new ActiveXObject("Msxml3.XMLHTTP");
        }catch(e){
          try{
            xmldoc = new ActiveXObject("Msxml2.XMLHTTP");
          }catch(e){
            try{
              xmldoc = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(e){}
          }
        }
      }
    }
  }
	return xmldoc || false;
};
//ajax end


var getMYABCProviderList = MYABC.getProviders;
var showManyouABChooser = MYABC.showChooser;
var onCBPageLoad = MYABC.onCBPageLoad;
