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
    <style type="text/css">
    #sa_menu_left {
        width: 15%;
    }
    
    #sa_drag_mid {
        margin-left: 14.5%;
        margin-top: -130%;
    }
    
    #sa_main_right {
       margin-left: 16%;
       margin-top:-18.5%;      
    }
    </style>
</head>

<body>
    <?php if(!empty($admin)): ?><div id="all">
            <div id="sa_top">
                <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title><?php echo ($app_name); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo (SHOPADM_CSS_URL); ?>general.css" rel="stylesheet" type="text/css" />
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
        text-align: center;
        vertical-align: middle;
        line-height: 50px;
    }
    
    #license-div a:visited,
    #license-div a:link {
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
    
    #submenu-div a:visited,
    #submenu-div a:link {
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
        line-height: 24px;
    }
    
    #menu-div ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }
    
    #menu-div li {
        float: left;
        border-right: 1px solid #192E32;
        border-left: 1px solid #BBDDE5;
    }
    
    #menu-div a:visited,
    #menu-div a:link {
        display: block;
        padding: 0 20px;
        text-decoration: none;
        color: #335B64;
        background: #9CCBD6;
    }
    
    #menu-div a:hover {
        color: #000;
        background: #80BDCB;
    }
    
    #submenu-div a.fix-submenu {
        clear: both;
        margin-left: 5px;
        padding: 1px 5px;
        *padding: 3px 5px 5px;
        background: #DDEEF2;
        color: #278296;
    }
    
    #submenu-div a.fix-submenu:hover {
        padding: 1px 5px;
        *padding: 3px 5px 5px;
        background: #FFF;
        color: #278296;
    }
    
    #menu-div li.fix-spacel {
        width: 30px;
        border-left: none;
    }
    
    #menu-div li.fix-spacer {
        border-right: none;
    }
    </style>
    <script src="<?php echo (SHOP_JS_URL); ?>transport.js" type="text/javascript"></script>
    <script type="text/javascript">
    onload = function() {

            // Ajax.call('index.php?is_ajax=1&act=license', '', start_sendmail_Response, 'GET', 'JSON');
        }
        /**
         * 帮助系统调用
         */
        // function web_address() {
        //     var ne_add = parent.document.getElementById('main-frame');
        //     var ne_list = ne_add.contentWindow.document.getElementById('search_id').innerHTML;
        //     ne_list.replace('-', '');
        //     var arr = ne_list.split('-');
        //     window.open('help.php?al=' + arr[arr.length - 1], '_blank');
        // }


    // /**
    //  * 授权检测回调处理
    //  */
    // function start_sendmail_Response(result) {
    //     // 运行正常
    //     if (result.error == 0) {
    //         var str = '';
    //         if (result['content']['auth_str']) {
    //             str = '<a href="javascript:void(0);" target="_blank">' + result['content']['auth_str'];
    //             if (result['content']['auth_type']) {
    //                 str += '[' + result['content']['auth_type'] + ']';
    //             }
    //             str += '</a> ';
    //         }

    //         document.getElementById('license-div').innerHTML = str;
    //     }
    // }

    // function modalDialog(url, name, width, height) {
    //     if (width == undefined) {
    //         width = 400;
    //     }
    //     if (height == undefined) {
    //         height = 300;
    //     }

    //     if (window.showModalDialog) {
    //         window.showModalDialog(url, name, 'dialogWidth=' + (width) + 'px; dialogHeight=' + (height + 5) + 'px; status=off');
    //     } else {
    //         x = (window.screen.width - width) / 2;
    //         y = (window.screen.height - height) / 2;

    //         window.open(url, name, 'height=' + height + ', width=' + width + ', left=' + x + ', top=' + y + ', toolbar=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, modal=yes');
    //     }
    // }

    // function ShowToDoList() {
    //     try {
    //         var mainFrame = window.top.frames['main-frame'];
    //         mainFrame.window.showTodoList(adminId);
    //     } catch (ex) {}
    // }


    // var adminId = "<?php echo ($admin_id); ?>";
    </script>
</head>

<body>
    <div id="header-div">
        <div id="logo-div" style="bgcolor:#000000;"><img src="<?php echo (SHOPADM_IMG_URL); ?>/ecshop_logo.gif" alt="ECSHOP - power for e-commerce" /></div>
        <div id="license-div" style="bgcolor:#000000;"></div>
        <div id="submenu-div">
            <ul>
                <li><a href="index.php?act=about_us" target="main-frame"><?php echo ($lang["about"]); ?></a></li>
                <li><a href="javascript:web_address();"><?php echo ($lang["help"]); ?></a></li>
                <li><a href="../" target="_blank"><?php echo ($lang["preview"]); ?></a></li>
                <li><a href="message.php?act=list" target="main-frame"><?php echo ($lang["view_message"]); ?></a></li>
                <li><a href="privilege.php?act=modif" target="main-frame"><?php echo ($lang["profile"]); ?></a></li>
                <li><a href="javascript:window.top.frames['main-frame'].document.location.reload();window.top.frames['header-frame'].document.location.reload()"><?php echo ($lang["refresh"]); ?></a></li>
                <li><a href="#" onclick="ShowToDoList()"><?php echo ($lang["todolist"]); ?></a></li>
                <li style="border-left:none;"><a href="index.php?act=first" target="main-frame"><?php echo ($lang["shop_guide"]); ?></a></li>
            </ul>
            <div id="send_info" style="padding: 5px 10px 0 0; clear:right;text-align: right; color: #FF9900;width:40%;float: right;">
                <?php if($send_mail_on == 'on'): ?><span id="send_msg"><img src="<?php echo (SHOPADM_IMG_URL); ?>/top_loader.gif" width="16" height="16" alt="<?php echo ($lang["loading"]); ?>" style="vertical-align: middle" /> <?php echo ($lang["email_sending"]); ?></span>
                    <a href="javascript:;" onClick="Javascript:switcher()" id="lnkSwitch" style="margin-right:10px;color: #FF9900;text-decoration: underline"><?php echo ($lang["pause"]); ?></a><?php endif; ?>
                <a href="index.php?act=clear_cache" target="main-frame" class="fix-submenu"><?php echo ($lang["clear_cache"]); ?></a>
                <a href="privilege.php?act=logout" target="_top" class="fix-submenu"><?php echo ($lang["signout"]); ?></a>
            </div>
            <?php if($send_mail_on == 'on'): ?><script type="text/javascript" charset="gb2312">
                var sm = window.setInterval("start_sendmail()", 5000);
                var finished = 0;
                var error = 0;
                var conti = "<?php echo ($lang["conti"]); ?>";
                var pause = "<?php echo ($lang["pause"]); ?>";
                var counter = 0;
                var str = "<?php echo ($lang["str"]); ?>";

                function start_sendmail() {
                    Ajax.call('index.php?is_ajax=1&act=send_mail', '', start_sendmail_Response, 'GET', 'JSON');
                }

                function start_sendmail_Response(result) {
                    if (typeof(result.count) == 'undefined') {
                        result.count = 0;
                        result.message = '';
                    }
                    if (typeof(result.count) != 'undefined' && result.count == 0) {
                        counter--;
                        document.getElementById('lnkSwitch').style.display = "none";
                        window.clearInterval(sm);
                    }

                    if (typeof(result.goon) != 'undefined') {
                        start_sendmail();
                    }

                    counter++;

                    document.getElementById('send_msg').innerHTML = result.message;
                }

                function switcher() {
                    if (document.getElementById('lnkSwitch').innerHTML == conti) {
                        //do pause
                        document.getElementById('lnkSwitch').innerHTML = pause;
                        sm = window.setInterval("start_sendmail()", 5000);
                    } else {
                        //do continue
                        document.getElementById('lnkSwitch').innerHTML = conti;
                        document.getElementById('send_msg').innerHTML = sprintf(str, counter);
                        window.clearInterval(sm);
                    }
                }



                sprintfWrapper = {

                    init: function() {

                        if (typeof arguments == "undefined") {
                            return null;
                        }
                        if (arguments.length < 1) {
                            return null;
                        }
                        if (typeof arguments[0] != "string") {
                            return null;
                        }
                        if (typeof RegExp == "undefined") {
                            return null;
                        }

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
                            if (match[9]) {
                                convCount += 1;
                            }

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

                        if (matches.length == 0) {
                            return string;
                        }
                        if ((arguments.length - 1) < convCount) {
                            return null;
                        }

                        var code = null;
                        var match = null;
                        var i = null;

                        for (i = 0; i < matches.length; i++) {

                            if (matches[i].code == '%') {
                                substitution = '%'
                            } else if (matches[i].code == 'b') {
                                matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(2));
                                substitution = sprintfWrapper.convert(matches[i], true);
                            } else if (matches[i].code == 'c') {
                                matches[i].argument = String(String.fromCharCode(parseInt(Math.abs(parseInt(matches[i].argument)))));
                                substitution = sprintfWrapper.convert(matches[i], true);
                            } else if (matches[i].code == 'd') {
                                matches[i].argument = String(Math.abs(parseInt(matches[i].argument)));
                                substitution = sprintfWrapper.convert(matches[i]);
                            } else if (matches[i].code == 'f') {
                                matches[i].argument = String(Math.abs(parseFloat(matches[i].argument)).toFixed(matches[i].precision ? matches[i].precision : 6));
                                substitution = sprintfWrapper.convert(matches[i]);
                            } else if (matches[i].code == 'o') {
                                matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(8));
                                substitution = sprintfWrapper.convert(matches[i]);
                            } else if (matches[i].code == 's') {
                                matches[i].argument = matches[i].argument.substring(0, matches[i].precision ? matches[i].precision : matches[i].argument.length)
                                substitution = sprintfWrapper.convert(matches[i], true);
                            } else if (matches[i].code == 'x') {
                                matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));
                                substitution = sprintfWrapper.convert(matches[i]);
                            } else if (matches[i].code == 'X') {
                                matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));
                                substitution = sprintfWrapper.convert(matches[i]).toUpperCase();
                            } else {
                                substitution = matches[i].match;
                            }

                            newString += strings[i];
                            newString += substitution;

                        }
                        newString += strings[i];

                        return newString;

                    },

                    convert: function(match, nosign) {
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
                </script><?php endif; ?>
            <div id="load-div" style="padding: 5px 10px 0 0; text-align: right; color: #FF9900; display: none;width:40%;float:right;"><img src="<?php echo (SHOPADM_IMG_URL); ?>/top_loader.gif" width="16" height="16" alt="<?php echo ($lang["loading"]); ?>" style="vertical-align: middle" /> <?php echo ($lang["loading"]); ?></div>
        </div>
    </div>
    <div id="menu-div">
        <ul>
            <li class="fix-spacel">&nbsp;</li>
            <li><a href="index.php?act=main" target="main-frame"><?php echo ($lang["admin_home"]); ?></a></li>
            <li><a href="privilege.php?act=modif" target="main-frame"><?php echo ($lang["set_navigator"]); ?></a></li>
            <?php if(is_array($nav_list)): foreach($nav_list as $key=>$item): ?><li><a href="<?php echo ($key); ?>" target="main-frame"><?php echo ($item); ?></a></li><?php endforeach; endif; ?>
            <li class="fix-spacer">&nbsp;</li>
        </ul>
        <br class="clear" />
    </div>
</body>

</html>

            </div>
            <div id="sa_content">
                <div id="sa_menu_left">
                    <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>ECSHOP Menu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="styles/general.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript">
    var noHelp = "<p align='center' style='color: #666'><?php echo ($lang["no_help"]); ?></p>";
    var helpLang = "<?php echo ($help_lang); ?>";
    </script>
    <style type="text/css">
    body {
        background: #80BDCB;
    }
    
    #tabbar-div {
        background: #278296;
        padding-left: 10px;
        height: 21px;
        padding-top: 0px;
    }
    
    #tabbar-div p {
        margin: 1px 0 0 0;
    }
    
    .tab-front {
        background: #80BDCB;
        line-height: 20px;
        font-weight: bold;
        padding: 4px 15px 4px 18px;
        border-right: 2px solid #335b64;
        cursor: hand;
        cursor: pointer;
    }
    
    .tab-back {
        color: #F4FAFB;
        line-height: 20px;
        padding: 4px 15px 4px 18px;
        cursor: hand;
        cursor: pointer;
    }
    
    .tab-hover {
        color: #F4FAFB;
        line-height: 20px;
        padding: 4px 15px 4px 18px;
        cursor: hand;
        cursor: pointer;
        background: #2F9DB5;
    }
    
    #top-div {
        padding: 3px 0 2px;
        background: #BBDDE5;
        margin: 5px;
        text-align: center;
    }
    
    #main-div {
        border: 1px solid #345C65;
        padding: 5px;
        margin: 5px;
        background: #FFF;        
    }
    
    #menu-list {
        padding: 0;
        margin: 0;
    }
    
    #menu-list ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
        color: #335B64;
    }
    
    #menu-list li {
        padding-left: 16px;
        line-height: 16px;
        cursor: hand;
        cursor: pointer;
    }
    
    #main-div a:visited,
    #menu-list a:link,
    #menu-list a:hover {
        color: #335B64 text-decoration: none;
    }
    
    #menu-list a:active {
        color: #EB8A3D;
    }
    
    .explode {
        background: url(<?php echo (SHOPADM_IMG_URL); ?>/menu_minus.gif) no-repeat 0px 3px;
        font-weight: bold;
    }
    
    .collapse {
        background: url(<?php echo (SHOPADM_IMG_URL); ?>/menu_plus.gif) no-repeat 0px 3px;
        font-weight: bold;
    }
    
    .menu-item {
        background: url(<?php echo (SHOPADM_IMG_URL); ?>/menu_arrow.gif) no-repeat 0px 3px;
        font-weight: normal;
    }
    
    #help-title {
        font-size: 14px;
        color: #000080;
        margin: 5px 0;
        padding: 0px;
    }
    
    #help-content {
        margin: 0;
        padding: 0;
    }
    
    .tips {
        color: #CC0000;
    }
    
    .link {
        color: #000099;
    }
    </style>
</head>

<body>
    <div id="tabbar-div">
        <p><span style="float:right; padding: 3px 5px;"><a href="javascript:toggleCollapse();"><img id="toggleImg" src="<?php echo (SHOPADM_IMG_URL); ?>/menu_minus.gif" width="9" height="9" border="0" alt="<?php echo ($lang["collapse_all"]); ?>" /></a></span>
            <span class="tab-front" id="menu-tab"><?php echo ($lang["menu"]); ?></span>
        </p>
    </div>
    <div id="main-div">
        <div id="menu-list">
            <ul id="menu-ul">
                <?php if(is_array($menus)): foreach($menus as $k=>$menu): if(!empty($menu['action'])): ?><li class="explode"><a href="<?php echo ($menu["action"]); ?>" target="main-frame"><?php echo ($menu["label"]); ?></a></li>
                        <?php else: ?>
                        <li class="explode" key="<?php echo ($k); ?>" name="menu">
                            <?php echo ($menu["label"]); ?>
                            <?php if(!empty($menu['children'])): ?><ul>
                                    <?php if(is_array($menu['children'])): foreach($menu['children'] as $key=>$child): ?><li class="menu-item"><a href="<?php echo ($child["action"]); ?>" target="main-frame"><?php echo ($child["label"]); ?></a></li><?php endforeach; endif; ?>
                                </ul><?php endif; ?>
                        </li><?php endif; endforeach; endif; ?>
                <script language="JavaScript" src="http://api.ecshop.com/menu_ext.php?charset=<?php echo ($charset); ?>&lang=<?php echo ($help_lang); ?>"></script>
            </ul>
        </div>
        <div id="help-div" style="display:none">
            <h1 id="help-title"></h1>
            <div id="help-content"></div>
        </div>
    </div>
    <script src="<?php echo (SHOP_JS_URL); ?>global.js" type="text/javascript"></script>
    <script src="<?php echo (SHOP_JS_URL); ?>transport.js" type="text/javascript"></script>
    <script src="<?php echo (SHOP_JS_URL); ?>utils.js" type="text/javascript"></script>    
    <script src="<?php echo (SHOPADM_JS_URL); ?>menu.js" type="text/javascript"></script>
    
    <script language="JavaScript">
   
    var collapse_all = "<?php echo ($lang["collapse_all"]); ?>";
    var expand_all = "<?php echo ($lang["expand_all"]); ?>";
    var collapse = true; 

    function toggleCollapse() {
        var items = document.getElementsByTagName('LI');
        for (i = 0; i < items.length; i++) {
            if (collapse) {
                if (items[i].className == "explode") {
                    toggleCollapseExpand(items[i], "collapse");
                }
            } else {
                if (items[i].className == "collapse") {
                    toggleCollapseExpand(items[i], "explode");
                    ToggleHanlder.Reset();
                }
            }
        }

        collapse = !collapse;
        document.getElementById('toggleImg').src = collapse ? '<?php echo (SHOPADM_IMG_URL); ?>/menu_minus.gif' : '<?php echo (SHOPADM_IMG_URL); ?>/menu_plus.gif';
        document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
    }

    function toggleCollapseExpand(obj, status) {
        if (obj.tagName.toLowerCase() == 'li' && obj.className != 'menu-item') {
            for (i = 0; i < obj.childNodes.length; i++) {
                if (obj.childNodes[i].tagName == "UL") {
                    if (status == null) {
                        if (obj.childNodes[1].style.display != "none") {
                            obj.childNodes[1].style.display = "none";
                            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
                            obj.className = "collapse";
                        } else {
                            obj.childNodes[1].style.display = "block";
                            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
                            obj.className = "explode";
                        }
                        break;
                    } else {
                        if (status == "collapse") {
                            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
                            obj.className = "collapse";
                        } else {
                            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
                            obj.className = "explode";
                        }
                        obj.childNodes[1].style.display = (status == "explode") ? "block" : "none";
                    }
                }
            }
        }
    }
    document.getElementById('menu-list').onclick = function(e) {
        var obj = Utils.srcElement(e);
        toggleCollapseExpand(obj);
    }

    document.getElementById('tabbar-div').onmouseover = function(e) {
        var obj = Utils.srcElement(e);

        if (obj.className == "tab-back") {
            obj.className = "tab-hover";
        }
    }

    document.getElementById('tabbar-div').onmouseout = function(e) {
        var obj = Utils.srcElement(e);

        if (obj.className == "tab-hover") {
            obj.className = "tab-back";
        }
    }

    document.getElementById('tabbar-div').onclick = function(e) {
        var obj = Utils.srcElement(e);
        var hlpTab = document.getElementById('help-tab');
        var mnuDiv = document.getElementById('menu-list');
        var hlpDiv = document.getElementById('help-div');

        if (obj.id == 'help-tab') {
            mnuTab.className = 'tab-back';
            hlpTab.className = 'tab-front';
            mnuDiv.style.display = "none";
            hlpDiv.style.display = "block";

            loc = parent.frames['main-frame'].location.href;
            pos1 = loc.lastIndexOf("/");
            pos2 = loc.lastIndexOf("?");
            pos3 = loc.indexOf("act=");
            pos4 = loc.indexOf("&", pos3);

            filename = loc.substring(pos1 + 1, pos2 - 4);
            act = pos4 < 0 ? loc.substring(pos3 + 4) : loc.substring(pos3 + 4, pos4);
            loadHelp(filename, act);
        }
    }

    /**
     * 创建XML对象
     */
    function createDocument() {
        var xmlDoc;

        // create a DOM object
        if (window.ActiveXObject) {
            try {
                xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
            } catch (e) {
                try {
                    xmlDoc = new ActiveXObject("Msxml2.DOMDocument.5.0");
                } catch (e) {
                    try {
                        xmlDoc = new ActiveXObject("Msxml2.DOMDocument.4.0");
                    } catch (e) {
                        try {
                            xmlDoc = new ActiveXObject("Msxml2.DOMDocument.3.0");
                        } catch (e) {
                            alert(e.message);
                        }
                    }
                }
            }
        } else {
            if (document.implementation && document.implementation.createDocument) {
                xmlDoc = document.implementation.createDocument("", "doc", null);
            } else {
                alert("Create XML object is failed.");
            }
        }
        xmlDoc.async = false;

        return xmlDoc;
    }

    //菜单展合状态处理器
    var ToggleHanlder = new Object();

    Object.extend(ToggleHanlder, {
        SourceObject: new Object(),
        CookieName: 'Toggle_State',
        RecordState: function(name, state) {
            if (state == "collapse") {
                this.SourceObject[name] = state;
            } else {
                if (this.SourceObject[name]) {
                    delete(this.SourceObject[name]);
                }
            }
            var date = new Date();
            date.setTime(date.getTime() + 99999999);
            document.setCookie(this.CookieName, this.SourceObject.toJSONString(), date.toGMTString());
        },

        Reset: function() {
            var date = new Date();
            date.setTime(date.getTime() + 99999999);
            document.setCookie(this.CookieName, "{}", date.toGMTString());
        },

        Load: function() {
            if (document.getCookie(this.CookieName) != null) {
                this.SourceObject = t_eval();
                var items = document.getElementsByTagName('LI');
                for (var i = 0; i < items.length; i++) {
                    if (items[0].getAttribute("name") == "menu" && items[0].getAttribute("id") != '20_yun') {
                        for (var k in this.SourceObject) {
                            if (typeof(items[i]) == "object") {
                                if (items[i].getAttribute('key') == k) {
                                    toggleCollapseExpand(items[i], this.SourceObject[k]);
                                    collapse = false;
                                }
                            }
                        }
                    }
                }
            }
            document.getElementById('toggleImg').src = collapse ? '<?php echo (SHOPADM_IMG_URL); ?>/menu_minus.gif' : '<?php echo (SHOPADM_IMG_URL); ?>/menu_plus.gif';
            document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
        }
    }); 
        ToggleHanlder.CookieName += "_<?php echo ($admin_id); ?>";
        //初始化菜单状态
        ToggleHanlder.Load();
        // Ajax.call('cloud.php?is_ajax=1&act=menu_api', '', start_menu_api, 'GET', 'JSON');

        function start_menu_api(result) {
            if (result.content == 0) {} else {
                document.getElementById("menu-ul").innerHTML = document.getElementById("menu-ul").innerHTML + result.content;
            }
        }
      
    </script>
</body>

</html>

                </div>
                <div id="sa_drag_mid">
                    <!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
        background: #80BDCB;
        cursor: E-resize;
    }
    </style>
    <script type="text/javascript" language="JavaScript">
  
    var pic = new Image();
    pic.src = "images/arrow_right.gif";

    function toggleMenu() {
        frmBody = parent.document.getElementById('frame-body');
        imgArrow = document.getElementById('img');

        if (frmBody.cols == "0, 10, *") {
            frmBody.cols = "200, 10, *";
            imgArrow.src = "images/arrow_left.gif";
        } else {
            frmBody.cols = "0, 10, *";
            imgArrow.src = "images/arrow_right.gif";
        }
    }

    var orgX = 0;
    document.onmousedown = function(e) {
        var evt = Utils.fixEvent(e);
        orgX = evt.clientX;

        if (Browser.isIE) document.getElementById('tbl').setCapture();
    }

    document.onmouseup = function(e) {
        var evt = Utils.fixEvent(e);

        frmBody = parent.document.getElementById('frame-body');
        frmWidth = frmBody.cols.substr(0, frmBody.cols.indexOf(','));
        frmWidth = (parseInt(frmWidth) + (evt.clientX - orgX));

        frmBody.cols = frmWidth + ", 10, *";

        if (Browser.isIE) document.releaseCapture();
    }

    var Browser = new Object();

    Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');
    Browser.isIE = window.ActiveXObject ? true : false;
    Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != -1);
    Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != -1);
    Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);

    var Utils = new Object();

    Utils.fixEvent = function(e) {
            var evt = (typeof e == "undefined") ? window.event : e;
            return evt;
        }
       
    </script>
</head>

<body onselect="return false;">
    <table height="100%" cellspacing="0" cellpadding="0" id="tbl">
        <tr>
            <td>
                <a href="javascript:toggleMenu();"><img src="<?php echo (SHOPADM_IMG_URL); ?>/arrow_left.gif" width="10" height="30" id="img" border="0" /></a>
            </td>
        </tr>
    </table>
</body>

</html>

                </div>
                <div id="sa_main_right">
                    <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php if(!empty($ur_here)): ?><title><?php echo ($lang["cp_home"]); ?> - <?php echo ($ur_here); ?></title>
        <?php else: ?>
        <title><?php echo ($lang["cp_home"]); ?></title><?php endif; ?>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo (SHOPADM_CSS_URL); ?>general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo (SHOPADM_CSS_URL); ?>main.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo (SHOP_JS_URL); ?>transport.js" type="text/javascript"></script>
    <script src="<?php echo (SHOP_JS_URL); ?>common.js" type="text/javascript"></script>
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

<body>
    <h1>
<?php if(!empty($action_link)): ?><span class="action-span"><a href="<?php echo ($action_link["href"]); ?>"><?php echo ($action_link["text"]); ?></a></span><?php endif; ?>
<?php if(!empty($action_link2)): ?><span class="action-span"><a href="<?php echo ($action_link2["href"]); ?>"><?php echo ($action_link2["text"]); ?></a>&nbsp;&nbsp;</span><?php endif; ?>

<span class="action-span1"><a href="index.php?act=main"><?php echo ($lang["cp_home"]); ?></a> </span>
<span id="search_id" class="action-span1">
<?php if(!empty($ur_here)): ?>- <?php echo ($ur_here); endif; ?>
</span>
<div style="clear:both"></div>
</h1>
</body>

<ul id="cloud_list" style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
</ul>
<!-- <script type="Text/Javascript" language="JavaScript">
    Ajax.call('cloud.php?is_ajax=1&act=cloud_remind','', cloud_api, 'GET', 'JSON'); 
    function cloud_api(result) 
     {        
       if(result.content=='0')
         { 
          document.getElementById("cloud_list").style.display ='none'; 
        } 
        else
        { 
          document.getElementById("cloud_list").innerHTML =result.content; 
        } 
    }
     function cloud_close(id)      { 
          Ajax.call('cloud.php?is_ajax=1&act=close_remind&remind_id='+id,'', cloud_api, 'GET', 'JSON'); 
     }
</script> -->
<ul id="lilist" style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
    <?php if(is_array($warning_arr)): foreach($warning_arr as $key=>$warning): ?><li class="Start315"><?php echo ($warning); ?></li><?php endforeach; endif; ?>
</ul>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
</ul>
<?php if(!empty($admin_msg)): ?><div class="list-div" style="border: 1px solid #CC0000">
        <table cellspacing='1' cellpadding='3'>
            <tr>
                <th><?php echo ($lang["pm_title"]); ?></th>
                <th><?php echo ($lang["pm_username"]); ?></th>
                <th><?php echo ($lang["pm_time"]); ?></th>
            </tr>
            <?php if(is_array($admin_msg)): foreach($admin_msg as $key=>$msg): ?><tr align="center">
                    <td align="left"><a href="message.php?act=view&id=<?php echo ($msg["message_id"]); ?>"><?php echo (mb_substr($msg["title"],0,60,'utf-8')); ?></a></td>
                    <td><?php echo ($msg["user_name"]); ?></td>
                    <td><?php echo ($msg["send_date"]); ?></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
    <br /><?php endif; ?>

<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title"><?php echo ($lang["order_stat"]); ?></th>
        </tr>
        <tr>
            <td width="20%"><a href="order.php?act=list&composite_status=<?php echo ($status["await_ship"]); ?>"><?php echo ($lang["await_ship"]); ?></a></td>
            <td width="30%"><strong style="color: red"><?php echo ($order["await_ship"]); ?></strong></td>
            <td width="20%"><a href="order.php?act=list&composite_status=<?php echo ($status["unconfirmed"]); ?>"><?php echo ($lang["unconfirmed"]); ?></a></td>
            <td width="30%"><strong><?php echo ($order["unconfirmed"]); ?></strong></td>
        </tr>
        <tr>
            <td><a href="order.php?act=list&composite_status=<?php echo ($status["await_pay"]); ?>"><?php echo ($lang["await_pay"]); ?></a></td>
            <td><strong><?php echo ($order["await_pay"]); ?></strong></td>
            <td><a href="order.php?act=list&composite_status=<?php echo ($status["finished"]); ?>"><?php echo ($lang["finished"]); ?></a></td>
            <td><strong><?php echo ($order["finished"]); ?></strong></td>
        </tr>
        <tr>
            <td><a href="goods_booking.php?act=list_all"><?php echo ($lang["new_booking"]); ?></a></td>
            <td><strong><?php echo ($booking_goods); ?></strong></td>
            <td><a href="user_account.php?act=list&process_type=1&is_paid=0"><?php echo ($lang["new_reimburse"]); ?></a></td>
            <td><strong><?php echo ($new_repay); ?></strong></td>
        </tr>
        <tr>
            <td><a href="order.php?act=list&composite_status=<?php echo ($status["shipped_part"]); ?>"><?php echo ($lang["shipped_part"]); ?></a></td>
            <td><strong><?php echo ($order["shipped_part"]); ?></strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>

<br />

<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title"><?php echo ($lang["goods_stat"]); ?></th>
        </tr>
        <tr>
            <td width="20%"><?php echo ($lang["goods_count"]); ?></td>
            <td width="30%"><strong><?php echo ($goods["total"]); ?></strong></td>
            <td width="20%"><a href="goods.php?act=list&stock_warning=1"><?php echo ($lang["warn_goods"]); ?></a></td>
            <td width="30%"><strong style="color: red"><?php echo ($goods["warn"]); ?></strong></td>
        </tr>
        <tr>
            <td><a href="goods.php?act=list&amp;intro_type=is_new"><?php echo ($lang["new_goods"]); ?></a></td>
            <td><strong><?php echo ($goods["new"]); ?></strong></td>
            <td><a href="goods.php?act=list&amp;intro_type=is_best"><?php echo ($lang["recommed_goods"]); ?></a></td>
            <td><strong><?php echo ($goods["best"]); ?></strong></td>
        </tr>
        <tr>
            <td><a href="goods.php?act=list&amp;intro_type=is_hot"><?php echo ($lang["hot_goods"]); ?></a></td>
            <td><strong><?php echo ($goods["hot"]); ?></strong></td>
            <td><a href="goods.php?act=list&amp;intro_type=is_promote"><?php echo ($lang["sales_count"]); ?></a></td>
            <td><strong><?php echo ($goods["promote"]); ?></strong></td>
        </tr>
    </table>
</div>
<br />

<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title"><?php echo ($lang["virtual_card_stat"]); ?></th>
        </tr>
        <tr>
            <td width="20%"><?php echo ($lang["goods_count"]); ?></td>
            <td width="30%"><strong><?php echo ($virtual_card["total"]); ?></strong></td>
            <td width="20%"><a href="goods.php?act=list&amp;stock_warning=1&amp;extension_code=virtual_card"><?php echo ($lang["warn_goods"]); ?></a></td>
            <td width="30%"><strong style="color: red"><?php echo ($virtual_card["warn"]); ?></strong></td>
        </tr>
        <tr>
            <td><a href="goods.php?act=list&amp;intro_type=is_new&amp;extension_code=virtual_card"><?php echo ($lang["new_goods"]); ?></a></td>
            <td><strong><?php echo ($virtual_card["new"]); ?></strong></td>
            <td><a href="goods.php?act=list&amp;intro_type=is_best&amp;extension_code=virtual_card"><?php echo ($lang["recommed_goods"]); ?></a></td>
            <td><strong><?php echo ($virtual_card["best"]); ?></strong></td>
        </tr>
        <tr>
            <td><a href="goods.php?act=list&amp;intro_type=is_hot&amp;extension_code=virtual_card"><?php echo ($lang["hot_goods"]); ?></a></td>
            <td><strong><?php echo ($virtual_card["hot"]); ?></strong></td>
            <td><a href="goods.php?act=list&amp;intro_type=is_promote&amp;extension_code=virtual_card"><?php echo ($lang["sales_count"]); ?></a></td>
            <td><strong><?php echo ($virtual_card["promote"]); ?></strong></td>
        </tr>
    </table>
</div>

<br />

<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title"><?php echo ($lang["acess_stat"]); ?></th>
        </tr>
        <tr>
            <td width="20%"><?php echo ($lang["acess_today"]); ?></td>
            <td width="30%"><strong><?php echo ($today_visit); ?></strong></td>
            <td width="20%"><?php echo ($lang["online_users"]); ?></td>
            <td width="30%"><strong><?php echo ($online_users); ?></strong></td>
        </tr>
        <tr>
            <td><a href="user_msg.php?act=list_all"><?php echo ($lang["new_feedback"]); ?></a></td>
            <td><strong><?php echo ($feedback_number); ?></strong></td>
            <td><a href="comment_manage.php?act=list"><?php echo ($lang["new_comments"]); ?></a></td>
            <td><strong><?php echo ($comment_number); ?></strong></td>
        </tr>
    </table>
</div>

<br />

<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title"><?php echo ($lang["system_info"]); ?></th>
        </tr>
        <tr>
            <td width="20%"><?php echo ($lang["os"]); ?></td>
            <td width="30%"><?php echo ($sys_info["os"]); ?> (<?php echo ($sys_info["ip"]); ?>)</td>
            <td width="20%"><?php echo ($lang["web_server"]); ?></td>
            <td width="30%"><?php echo ($sys_info["web_server"]); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["php_version"]); ?></td>
            <td><?php echo ($sys_info["php_ver"]); ?></td>
            <td><?php echo ($lang["mysql_version"]); ?></td>
            <td><?php echo ($sys_info["mysql_ver"]); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["safe_mode"]); ?></td>
            <td><?php echo ($sys_info["safe_mode"]); ?></td>
            <td><?php echo ($lang["safe_mode_gid"]); ?></td>
            <td><?php echo ($sys_info["safe_mode_gid"]); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["socket"]); ?></td>
            <td><?php echo ($sys_info["socket"]); ?></td>
            <td><?php echo ($lang["timezone"]); ?></td>
            <td><?php echo ($sys_info["timezone"]); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["gd_version"]); ?></td>
            <td><?php echo ($sys_info["gd"]); ?></td>
            <td><?php echo ($lang["zlib"]); ?></td>
            <td><?php echo ($sys_info["zlib"]); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["ip_version"]); ?></td>
            <td><?php echo ($sys_info["ip_version"]); ?></td>
            <td><?php echo ($lang["max_filesize"]); ?></td>
            <td><?php echo ($sys_info["max_filesize"]); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["ecs_version"]); ?></td>
            <td><?php echo ($ecs_version); ?> RELEASE <?php echo ($ecs_release); ?></td>
            <td><?php echo ($lang["install_date"]); ?></td>
            <td><?php echo ($install_date); ?></td>
        </tr>
        <tr>
            <td><?php echo ($lang["ec_charset"]); ?></td>
            <td><?php echo ($ecs_charset); ?></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
<script src="<?php echo (SHOP_JS_URL); ?>utils.js" type="text/javascript"></script>
<!-- <script type="Text/Javascript" language="JavaScript">
onload = function()
{
  /* 检查订单 */
  startCheckOrder();
}
  Ajax.call('index.php?is_ajax=1&act=main_api','', start_api, 'GET', 'TEXT','FLASE');
   function start_api(result) { apilist = document.getElementById("lilist").innerHTML; document.getElementById("lilist").innerHTML =result+apilist; if(document.getElementById("Marquee") != null) { var Mar = document.getElementById("Marquee"); lis = Mar.getElementsByTagName('div'); if(lis.length>1) { api_styel(); } } }

 
      function api_styel()
      {
        if(document.getElementById("Marquee") != null)
        {
            var Mar = document.getElementById("Marquee");
            if (Browser.isIE)
            {
              Mar.style.height = "52px";
            }
            else
            {
              Mar.style.height = "36px";
            }
            
            var child_div=Mar.getElementsByTagName("div");

        var picH = 16;//移动高度
        var scrollstep=2;//移动步幅,越大越快
        var scrolltime=30;//移动频度(毫秒)越大越慢
        var stoptime=4000;//间断时间(毫秒)
        var tmpH = 0;
        
        function start()
        {
          if(tmpH < picH)
          {
            tmpH += scrollstep;
            if(tmpH > picH )tmpH = picH ;
            Mar.scrollTop = tmpH;
            setTimeout(start,scrolltime);
          }
          else
          {
            tmpH = 0;
            Mar.appendChild(child_div[0]);
            Mar.scrollTop = 0;
            setTimeout(start,stoptime);
          }
        }
        setTimeout(start,stoptime);
        }
      }

</script> -->
<include file="adm:pagefooter">

                </div>
            </div>
        </div>
        <?php else: ?>
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
    <script src="<?php echo (SHOPADM_JS_URL); ?>jquery-2.1.0.min.js" type="text/javascript"></script>
    <script src="<?php echo (SHOPADM_JS_URL); ?>easyform.js" type="text/javascript"></script>
    <link href="<?php echo (SHOPADM_CSS_URL); ?>easyform.css" rel="stylesheet" type="text/css" />
    <!-- <script language="JavaScript">
    if (window.parent != window) {
        window.top.location.href = location.href;
    }
    </script> -->
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
    <form method="post" action="" id="theForm">
        <table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
            <tr>
                <td><img src="<?php echo (SHOPADM_IMG_URL); ?>login.png" width="178" height="256" border="0" alt="ECSHOP" /></td>
                <td style="padding-left: 50px">
                    <table>
                        <tr>
                            <td><?php echo ($lang["label_username"]); ?></td>
                            <td>
                                <input type="text" name="username" id="username" />
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo ($lang["label_password"]); ?></td>
                            <td>
                                <input type="password" name="password" id="password" />
                            </td>
                        </tr>
                        <?php $gd_version = gd_version(); ?>
                        <?php if($gd_version > 0): ?><tr>
                                <td><?php echo ($lang["label_captcha"]); ?></td>
                                <td>
                                    <input type="text" name="captcha" id="captcha" class="capital" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right">                                
                                    <img id="check_img" src="/train/Admin/Checkcode/index?&height=40&width=145&font_size=20&" width="145" height="40" border="1" onclick='this.src="/train/Admin/Checkcode/index?&height=40&width=145&font_size=20&time=" +Math.random()' style="cursor: pointer;" title="<?php echo ($lang["click_for_another"]); ?>" />
                                </td>
                            </tr><?php endif; ?>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" value="1" name="remember" id="remember" data-easyform="null;" />
                                <label for="remember"><?php echo ($lang["remember"]); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" id="submit" value="<?php echo ($lang["signin_now"]); ?>" class="button" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">&raquo; <a href="../" style="color:white"><?php echo ($lang["back_home"]); ?></a> &raquo; <a href="get_password.php?act=forget_pwd" style="color:white"><?php echo ($lang["forget_pwd"]); ?></a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <script language="JavaScript">
    $(document).ready(function() {

        var v = $('#theForm').easyform();

        var login_url = '<?php echo U("Login/login");?>';

        $('#submit').click(function() {
            var login_data = $('#theForm').serializeArray();
            if (v.is_submit) {
                $.ajax({
                    type: "POST",
                    url: login_url,
                    data: login_data,
                    // dataType: "json",
                    success: function(obj) {
                        if(obj.statu == '1'){
                            location.href=obj.callback;
                        }
                        else{console.log(obj);
                            alert(obj.info);
                            $('#check_img').trigger('click');
                        }
                    },
                    error: function(obj) {
                        console.log(obj);
                    }
                });
            } else {
                return false;
            }
        });

    });
    </script>
</body><?php endif; ?>
</body>

</html>