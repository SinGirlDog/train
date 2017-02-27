<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($lang["cp_home"]); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="Text/Javascript" language="JavaScript">
<!--
// {literal}
// if (window.top != window)
// {
//   window.top.location.href = document.location.href;
// }
// {/literal}
//-->
</script>

<!-- <frameset rows="76,*" framespacing="0" border="0">
  <frame src="index.php?act=top
" id="header-frame" name="header-frame" frameborder="no" scrolling="no">
  <frameset cols="180, 10, *" framespacing="0" border="0" id="frame-body">
    <frame src="index.php?act=menu" id="menu-frame" name="menu-frame" frameborder="no" scrolling="yes">
    <frame src="index.php?act=drag" id="drag-frame" name="drag-frame" frameborder="no" scrolling="no">
    <frame src="index.php?act=main" id="main-frame" name="main-frame" frameborder="no" scrolling="yes">
  </frameset>
</frameset>
  <frameset rows="0, 0" framespacing="0" border="0">
  <frame src="http://api.ecshop.com/record.php?mod=login&url=<?php echo ($shop_url); ?>" id="hidd-frame" name="hidd-frame" frameborder="no" scrolling="no">
  </frameset> -->
</head>
<body>

<!-- 
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($app_name); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />

{literal}
<style type="text/css">
#header-div {
  background: #278296;
  border-bottom: 1px solid #FFF;
}

#logo-div {
  height: 50px;
  float: left;
}

#license-div {
  height: 50px;
  float: left;
  text-align:center;
  vertical-align:middle;
  line-height:50px;
}

#license-div a:visited, #license-div a:link {
  color: #EB8A3D;
}

#license-div a:hover {
  text-decoration: none;
  color: #EB8A3D;
}

#submenu-div {
  height: 50px;
}

#submenu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#submenu-div li {
  float: right;
  padding: 0 10px;
  margin: 3px 0;
  border-left: 1px solid #FFF;
}

#submenu-div a:visited, #submenu-div a:link {
  color: #FFF;
  text-decoration: none;
}

#submenu-div a:hover {
  color: #F5C29A;
}

#loading-div {
  clear: right;
  text-align: right;
  display: block;
}

#menu-div {
  background: #80BDCB;
  font-weight: bold;
  height: 24px;
  line-height:24px;
}

#menu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#menu-div li {
  float: left;
  border-right: 1px solid #192E32;
  border-left:1px solid #BBDDE5;
}

#menu-div a:visited, #menu-div a:link {
  display:block;
  padding: 0 20px;
  text-decoration: none;
  color: #335B64;
  background:#9CCBD6;
}

#menu-div a:hover {
  color: #000;
  background:#80BDCB;
}

#submenu-div a.fix-submenu{ clear:both; margin-left:5px; padding:1px 5px; *padding:3px 5px 5px; background:#DDEEF2; color:#278296; }
#submenu-div a.fix-submenu:hover{ padding:1px 5px; *padding:3px 5px 5px; background:#FFF; color:#278296; }
#menu-div li.fix-spacel{ width:30px; border-left:none; }
#menu-div li.fix-spacer{ border-right:none; }
</style>
{insert_scripts files="../js/transport.js"}
<script type="text/javascript">
onload = function()
{
  Ajax.call('index.php?is_ajax=1&act=license','', start_sendmail_Response, 'GET', 'JSON');
}
/**
 * 帮助系统调用
 */
function web_address()
{
  var ne_add = parent.document.getElementById('main-frame');
  var ne_list = ne_add.contentWindow.document.getElementById('search_id').innerHTML;
  ne_list.replace('-', '');
  var arr = ne_list.split('-');
  window.open('help.php?al='+arr[arr.length - 1],'_blank');
}


/**
 * 授权检测回调处理
 */
function start_sendmail_Response(result)
{
  // 运行正常
  if (result.error == 0)
  {
    var str = '';
		if (result['content']['auth_str'])
		{
			str = '<a href="javascript:void(0);" target="_blank">' + result['content']['auth_str'];
			if (result['content']['auth_type'])
			{
				str += '[' + result['content']['auth_type'] + ']';
			}
			str += '</a> ';
		}

    document.getElementById('license-div').innerHTML = str;
  }
}

function modalDialog(url, name, width, height)
{
  if (width == undefined)
  {
    width = 400;
  }
  if (height == undefined)
  {
    height = 300;
  }

  if (window.showModalDialog)
  {
    window.showModalDialog(url, name, 'dialogWidth=' + (width) + 'px; dialogHeight=' + (height+5) + 'px; status=off');
  }
  else
  {
    x = (window.screen.width - width) / 2;
    y = (window.screen.height - height) / 2;

    window.open(url, name, 'height='+height+', width='+width+', left='+x+', top='+y+', toolbar=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, modal=yes');
  }
}

function ShowToDoList()
{
  try
  {
    var mainFrame = window.top.frames['main-frame'];
    mainFrame.window.showTodoList(adminId);
  }
  catch (ex)
  {
  }
}
{/literal}

var adminId = "<?php echo ($admin_id); ?>"; 
</script>
</head>
<body>
<div id="header-div">
  <div id="logo-div" style="bgcolor:#000000;"><img src="images/ecshop_logo.gif" alt="ECSHOP - power for e-commerce" /></div>
  <div id="license-div" style="bgcolor:#000000;"></div>
  <div id="submenu-div">
    <ul>
      <li><a href="index.php?act=about_us" target="main-frame"><?php echo ($lang["about"]); ?></a></li>
      <li><a href="javascript:web_address();"><?php echo ($lang["help"]); ?></a></li>
      <li><a href="../" target="_blank"><?php echo ($lang["preview"]); ?></a></li>
      <li><a href="message.php?act=list" target="main-frame"><?php echo ($lang["view_message"]); ?></a></li>
      <li><a href="privilege.php?act=modif" target="main-frame"><?php echo ($lang["profile"]); ?></a></li>
      <li><a href="javascript:window.top.frames['main-frame'].document.location.reload();window.top.frames['header-frame'].document.location.reload()"><?php echo ($lang["refresh"]); ?></a></li>
      <li><a href="#"  onclick="ShowToDoList()"><?php echo ($lang["todolist"]); ?></a></li>
      <li style="border-left:none;"><a href="index.php?act=first" target="main-frame"><?php echo ($lang["shop_guide"]); ?></a></li>
    </ul>
    <div id="send_info" style="padding: 5px 10px 0 0; clear:right;text-align: right; color: #FF9900;width:40%;float: right;">
      {if $send_mail_on eq 'on'}
      <span id="send_msg"><img src="images/top_loader.gif" width="16" height="16" alt="<?php echo ($lang["loading"]); ?>" style="vertical-align: middle" /> <?php echo ($lang["email_sending"]); ?></span>
      <a href="javascript:;" onClick="Javascript:switcher()" id="lnkSwitch" style="margin-right:10px;color: #FF9900;text-decoration: underline"><?php echo ($lang["pause"]); ?></a>
      {/if}
      <a href="index.php?act=clear_cache" target="main-frame" class="fix-submenu"><?php echo ($lang["clear_cache"]); ?></a>
      <a href="privilege.php?act=logout" target="_top" class="fix-submenu"><?php echo ($lang["signout"]); ?></a>
    </div>
    {if $send_mail_on eq 'on'}
    <script type="text/javascript" charset="gb2312">
    var sm = window.setInterval("start_sendmail()", 5000);
    var finished = 0;
    var error = 0;
    var conti = "<?php echo ($lang["conti"]); ?>";
    var pause = "<?php echo ($lang["pause"]); ?>";
    var counter = 0;
    var str = "<?php echo ($lang["str"]); ?>";
    {literal}
    function start_sendmail()
    {
      Ajax.call('index.php?is_ajax=1&act=send_mail','', start_sendmail_Response, 'GET', 'JSON');
    }
    function start_sendmail_Response(result)
    {
        if (typeof(result.count) == 'undefined')
        {
            result.count = 0;
            result.message = '';
        }
        if (typeof(result.count) != 'undefined' && result.count == 0)
        {
            counter --;
            document.getElementById('lnkSwitch').style.display = "none";
            window.clearInterval(sm);
        }

        if( typeof(result.goon) != 'undefined' )
        {
            start_sendmail();
        }

        counter ++ ;

        document.getElementById('send_msg').innerHTML = result.message;
    }
    function switcher()
    {
        if(document.getElementById('lnkSwitch').innerHTML == conti)
        {
            //do pause
            document.getElementById('lnkSwitch').innerHTML = pause;
            sm = window.setInterval("start_sendmail()", 5000);
        }
        else
        {
            //do continue
            document.getElementById('lnkSwitch').innerHTML = conti;
            document.getElementById('send_msg').innerHTML = sprintf(str, counter);
            window.clearInterval(sm);
        }
    }



    sprintfWrapper = {   
      
      init : function () {   
      
        if (typeof arguments == "undefined") { return null; }   
        if (arguments.length < 1) { return null; }   
        if (typeof arguments[0] != "string") { return null; }   
        if (typeof RegExp == "undefined") { return null; }   
      
        var string = arguments[0];   
        var exp = new RegExp(/(%([%]|(\-)?(\+|\x20)?(0)?(\d+)?(\.(\d)?)?([bcdfosxX])))/g);   
        var matches = new Array();   
        var strings = new Array();   
        var convCount = 0;   
        var stringPosStart = 0;   
        var stringPosEnd = 0;   
        var matchPosEnd = 0;   
        var newString = '';   
        var match = null;   
      
        while (match = exp.exec(string)) {   
          if (match[9]) { convCount += 1; }   
      
          stringPosStart = matchPosEnd;   
          stringPosEnd = exp.lastIndex - match[0].length;   
          strings[strings.length] = string.substring(stringPosStart, stringPosEnd);   
      
          matchPosEnd = exp.lastIndex;   
          matches[matches.length] = {   
            match: match[0],   
            left: match[3] ? true : false,   
            sign: match[4] || '',   
            pad: match[5] || ' ',   
            min: match[6] || 0,   
            precision: match[8],   
            code: match[9] || '%',   
            negative: parseInt(arguments[convCount]) < 0 ? true : false,   
            argument: String(arguments[convCount])   
          };   
        }   
        strings[strings.length] = string.substring(matchPosEnd);   
      
        if (matches.length == 0) { return string; }   
        if ((arguments.length - 1) < convCount) { return null; }   
      
        var code = null;   
        var match = null;   
        var i = null;   
      
        for (i=0; i<matches.length; i++) {   
      
          if (matches[i].code == '%') { substitution = '%' }   
          else if (matches[i].code == 'b') {   
            matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(2));   
            substitution = sprintfWrapper.convert(matches[i], true);   
          }   
          else if (matches[i].code == 'c') {   
            matches[i].argument = String(String.fromCharCode(parseInt(Math.abs(parseInt(matches[i].argument)))));   
            substitution = sprintfWrapper.convert(matches[i], true);   
          }   
          else if (matches[i].code == 'd') {   
            matches[i].argument = String(Math.abs(parseInt(matches[i].argument)));   
            substitution = sprintfWrapper.convert(matches[i]);   
          }   
          else if (matches[i].code == 'f') {   
            matches[i].argument = String(Math.abs(parseFloat(matches[i].argument)).toFixed(matches[i].precision ? matches[i].precision : 6));   
            substitution = sprintfWrapper.convert(matches[i]);   
          }   
          else if (matches[i].code == 'o') {   
            matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(8));   
            substitution = sprintfWrapper.convert(matches[i]);   
          }   
          else if (matches[i].code == 's') {   
            matches[i].argument = matches[i].argument.substring(0, matches[i].precision ? matches[i].precision : matches[i].argument.length)   
            substitution = sprintfWrapper.convert(matches[i], true);   
          }   
          else if (matches[i].code == 'x') {   
            matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));   
            substitution = sprintfWrapper.convert(matches[i]);   
          }   
          else if (matches[i].code == 'X') {   
            matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));   
            substitution = sprintfWrapper.convert(matches[i]).toUpperCase();   
          }   
          else {   
            substitution = matches[i].match;   
          }   
      
          newString += strings[i];   
          newString += substitution;   
      
        }   
        newString += strings[i];   
      
        return newString;   
      
      },   
      
      convert : function(match, nosign){   
        if (nosign) {   
          match.sign = '';   
        } else {   
          match.sign = match.negative ? '-' : match.sign;   
        }   
        var l = match.min - match.argument.length + 1 - match.sign.length;   
        var pad = new Array(l < 0 ? 0 : l).join(match.pad);   
        if (!match.left) {   
          if (match.pad == "0" || nosign) {   
            return match.sign + pad + match.argument;   
          } else {   
            return pad + match.sign + match.argument;   
          }   
        } else {   
          if (match.pad == "0" || nosign) {   
            return match.sign + match.argument + pad.replace(/0/g, ' ');   
          } else {   
            return match.sign + match.argument + pad;   
          }   
        }   
      }   
    }   
      
    sprintf = sprintfWrapper.init;  



    {/literal}
    </script>
    {/if}
    <div id="load-div" style="padding: 5px 10px 0 0; text-align: right; color: #FF9900; display: none;width:40%;float:right;"><img src="images/top_loader.gif" width="16" height="16" alt="<?php echo ($lang["loading"]); ?>" style="vertical-align: middle" /> <?php echo ($lang["loading"]); ?></div>
  </div>
</div>
<div id="menu-div">
  <ul>
    <li class="fix-spacel">&nbsp;</li>
    <li><a href="index.php?act=main" target="main-frame"><?php echo ($lang["admin_home"]); ?></a></li>
    <li><a href="privilege.php?act=modif" target="main-frame"><?php echo ($lang["set_navigator"]); ?></a></li>
    {foreach from=$nav_list item=item key=key}
    <li><a href="<?php echo ($key); ?>" target="main-frame"><?php echo ($item); ?></a></li>
    {/foreach}
    <li class="fix-spacer">&nbsp;</li>
  </ul>
  <br class="clear" />
</div>
</body>
</html>
 -->

  <!DOCTYPE html>
<html>

<head>
    <?php if(!empty($ur_here)): ?><title><?php echo ($lang["cp_home"]); ?> - <?php echo ($ur_here); ?></title>
        <?php else: ?>
        <title><?php echo ($lang["cp_home"]); ?></title><?php endif; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo (SHOPADM_CSS_URL); ?>general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo (SHOPADM_CSS_URL); ?>main.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    body {
        color: white;
    }
    </style>
    <script src="<?php echo (SHOP_JS_URL); ?>utils.js" type="text/javascript"></script>
    <script src="<?php echo (SHOPADM_JS_URL); ?>validator.js" type="text/javascript"></script>
    <script language="JavaScript">
    if (window.parent != window) {
        window.top.location.href = location.href;
    }
    </script>
    <script type="text/javascript">
    var process_request = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    var todolist_caption = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    var todolist_autosave = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    var todolist_save = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    var todolist_clear = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    var todolist_confirm_save = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    var todolist_confirm_clear = "<?php echo ($lang["js_languages"]["process_request"]); ?>";
    </script>
</head>

<body style="background: #278296">
    <form method="post" action="privilege.php" name='theForm' onsubmit="return validate()">
        <table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
            <tr>
                <td><img src="<?php echo (SHOPADM_IMG_URL); ?>login.png" width="178" height="256" border="0" alt="ECSHOP" /></td>
                <td style="padding-left: 50px">
                    <table>
                        <tr>
                            <td><?php echo ($lang["label_username"]); ?></td>
                            <td>
                                <input type="text" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo ($lang["label_password"]); ?></td>
                            <td>
                                <input type="password" name="password" />
                            </td>
                        </tr>
                        <?php $gd_varsion = gd_version(); ?>
                        <?php if($gd_version > 0): ?><tr>
                            <td><?php echo ($lang["label_captcha"]); ?></td>
                            <td>
                                <input type="text" name="captcha" class="capital" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><img src="index.php?act=captcha&<?php echo ($random); ?>" width="145" height="20" alt="CAPTCHA" border="1" onclick=this.src="index.php?act=captcha&" +Math.random() style="cursor: pointer;" title="<?php echo ($lang["click_for_another"]); ?>" />
                            </td>
                        </tr><?php endif; ?>
                        
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" value="1" name="remember" id="remember" />
                                <label for="remember"><?php echo ($lang["remember"]); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" value="<?php echo ($lang["signin_now"]); ?>" class="button" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">&raquo; <a href="../" style="color:white"><?php echo ($lang["back_home"]); ?></a> &raquo; <a href="get_password.php?act=forget_pwd" style="color:white"><?php echo ($lang["forget_pwd"]); ?></a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <input type="hidden" name="act" value="signin" />
    </form>
    <script language="JavaScript">
    <!--
    document.forms['theForm'].elements['username'].focus(); {
        literal
    }
    /**
     * 检查表单输入的内容
     */
    function validate() {
        var validator = new Validator('theForm');
        validator.required('username', user_name_empty);
        //validator.required('password', password_empty);
        if (document.forms['theForm'].elements['captcha']) {
            validator.required('captcha', captcha_empty);
        }
        return validator.passed();
    } {
        /literal}
        //-->
    </script>
</body>



</body>
</html>