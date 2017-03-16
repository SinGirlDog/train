<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo ($keywords); ?>" />
<meta name="Description" content="<?php echo ($description); ?>" />
<title><?php echo ($page_title); ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="<?php echo (SHOP_IMG_URL); ?>animated_favicon.gif" type="image/gif" />
<link href="<?php echo (SHOP_CSS_URL); ?>style_pink.css" rel="stylesheet" type="text/css" />

    <?php if(!empty($auto_redirect)): ?><meta http-equiv="refresh" content="3;URL=<?php echo ($message["back_url"]); ?>" /><?php endif; ?>
    <script src='<?php echo (SHOP_JS_URL); ?>common.js'></script>
    <style type="text/css">
    p a {
        color: #006acd;
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
var process_request = "<?php echo ($lang["process_request"]); ?>";
</script>
<div class="block clearfix">
    <div class="f_l">
        <a href="<?php echo U('Index/index');?>" name="top"><img src="<?php echo (SHOP_IMG_URL); ?>logo.gif" /></a>
    </div>
    <div class="f_r log">
        <ul>
            <li class="userInfo">
                <!-- {insert_scripts files='transport.js,utils.js'} -->
                <script type="text/javascript" src="<?php echo (SHOP_JS_URL); ?>utils.js"></script>
                <script type="text/javascript" src="<?php echo (SHOP_JS_URL); ?>transport.js"></script>
                <font id="ECS_MEMBERZONE">
                    <!-- ECSHOP 提醒您：根据用户id来调用member_info.lbi显示不同的界面 -->
                    <!-- {insert name='member_info'}  -->
                    <div id="append_parent"></div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($user_info)): ?><font style="position:relative; top:10px;">
        <?php echo ($lang["hello"]); ?>，
        <font class="f4_b"><?php echo ($user_info["username"]); ?></font>, <?php echo ($lang["welcome_return"]); ?>！
        <a href="<?php echo U('User/index',array('act'=>'default'));?>"><?php echo ($lang["user_center"]); ?></a>|
        <a href="<?php echo U('User/logout');?>"><?php echo ($lang["user_logout"]); ?></a>
    </font>
    <?php else: ?> <?php echo ($lang["welcome"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo U('User/index',array('act'=>'login'));?>"><img src="<?php echo (SHOP_IMG_URL); ?>/bnt_log.gif" /></a>
    <a href="<?php echo U('User/index',array('act'=>'register'));?>"><img src="<?php echo (SHOP_IMG_URL); ?>/bnt_reg.gif" /></a><?php endif; ?>

                </font>
            </li>
            <?php if(!empty($navigator_list['top'])): ?><li id="topNav" class="clearfix">
                    <?php if(is_array($navigator_list['top'])): foreach($navigator_list['top'] as $key=>$vo): if($vo['opennew'] == 1): ?><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["name"]); ?></a>
                            <?php else: ?>
                            <a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a><?php endif; ?>
                        <?php if(($key+1) < sizeof($navigator_list['top'])): ?>|<?php endif; endforeach; endif; ?>
                    <div class="topNavR"></div>
                </li><?php endif; ?>
        </ul>
    </div>
</div>
<div class="blank"></div>
<div id="mainNav" class="clearfix">
    <?php if($navigator_list['config']['index'] == 1): ?><a href="../index.php" class="cur"><?php echo ($lang["home"]); ?><span></span></a>
        <?php else: ?>
        <a href="../index.php"><?php echo ($lang["home"]); ?><span></span></a><?php endif; ?>
    <?php if(is_array($navigator_list['middle'])): foreach($navigator_list['middle'] as $key=>$vo): if($vo['opennew'] == 1){ $target = 'target="_blank"'; }else{ $target = ''; } ?>
        <?php if($vo['active'] == 1) $class = 'class = "cur"'; else $class = ''; ?>
        <a href="<?php echo ($vo['url']); ?>" <?php echo ($target); ?> <?php echo ($class); ?>><?php echo ($vo['name']); ?><span></span></a><?php endforeach; endif; ?>
</div>
<!--search start-->
<div id="search" class="clearfix">
    <div class="keys f_l">
        <script type="text/javascript">
        function checkSearchForm() {
            if (document.getElementById('keyword').value) {
                return true;
            } else {
                alert("<?php echo ($lang["no_keywords"]); ?>");
                return false;
            }
        }
        </script>
        <?php if(!empty($searchkeywords)): echo ($lang["hot_search"]); ?> ：
            <?php if(is_array($searchkeywords)): foreach($searchkeywords as $key=>$vo): ?><a href="search.php?keywords=<?php echo ($vo); ?>"><?php echo ($vo); ?></a><?php endforeach; endif; endif; ?>
    </div>
    <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="f_r" style="_position:relative; top:5px;">
        <select name="category" id="category" class="B_input">
            <option value="0"><?php echo ($lang["all_category"]); ?></option>
            <?php echo ($category_list); ?>
        </select>
        <input name="keywords" type="text" id="keyword" value="<?php echo ($search_keywords); ?>" class="B_input" style="width:110px;" />
        <input name="imageField" type="submit" value="" class="go" style="cursor:pointer;" />
        <a href="search.php?act=advanced_search"><?php echo ($lang["advanced_search"]); ?></a>
    </form>
</div>
<!--search end-->

    <div class="blank"></div>
    <div class="block">
        <div class="box">
            <div class="box_1">
                <h3><span><?php echo ($lang["system_info"]); ?></span></h3>
                <div class="boxCenterList RelaArticle" align="center">
                    <div style="margin:20px auto;">
                        <p style="font-size: 14px; font-weight:bold; color: red;"><?php echo ($message["content"]); ?></p>
                        <div class="blank"></div>
                        <?php if(!empty($message["url_info"])): if(is_array($message["url_info"])): foreach($message["url_info"] as $info=>$url): ?><p><a href="<?php echo ($url); ?>"><?php echo ($info); ?></a></p><?php endforeach; endif; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
    <!--帮助-->
    <div class="block">
        <div class="box">
            <div class="helpTitBg clearfix">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($helps)): if(is_array($helps)): foreach($helps as $key=>$help_cat): ?><dl>
            <dt><a href='<?php echo ($help_cat["cat_id"]); ?>' title="<?php echo ($help_cat["cat_name"]); ?>"><?php echo ($help_cat["cat_name"]); ?></a></dt>
            <?php if(is_array($help_cat['article'])): foreach($help_cat['article'] as $key=>$item): ?><dd><a href="<?php echo ($item["url"]); ?>" title="<?php echo ($item["title"]); ?>"><?php echo ($item["short_title"]); ?></a></dd><?php endforeach; endif; ?>
        </dl><?php endforeach; endif; endif; ?>

            </div>
        </div>
    </div>
    <div class="blank"></div>
    <!--帮助-->
    <!--友情链接 start-->
    <?php if(!empty($links)): ?><div id="bottomNav" class="box">
        <div class="box_1">
            <div class="links clearfix">
                <?php if(is_array($links['img'])): foreach($links['img'] as $key=>$link): ?><a href="<?php echo ($link["url"]); ?>" target="_blank" title="<?php echo ($link["name"]); ?>"><img src="<?php echo ($link["logo"]); ?>" alt="<?php echo ($link["name"]); ?>" border="0" /></a><?php endforeach; endif; ?>
                <?php if(is_array($links['txt'])): foreach($links['txt'] as $key=>$link): ?>[<a href="<?php echo ($link["url"]); ?>" target="_blank" title="<?php echo ($link["name"]); ?>"><?php echo ($link["name"]); ?></a>]<?php endforeach; endif; ?>
            </div>
        </div>
    </div><?php endif; ?>

    <!--友情链接 end-->
    <div class="blank"></div>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--底部导航 start-->
<div id="bottomNav" class="box">
    <div class="box_1">
        <div class="bNavList clearfix">
            <div class="f_l">
                <?php if(!empty($navigator_list['bottom'])): if(is_array($navigator_list['bottom'])): foreach($navigator_list['bottom'] as $key=>$nav): if($nav['opennew'] == 1): ?><a href="<?php echo ($nav["url"]); ?>" target="_blank"><?php echo ($nav["name"]); ?></a>
                            <?php else: ?>
                            <a href="<?php echo ($nav["url"]); ?>"><?php echo ($nav["name"]); ?></a><?php endif; ?>
                        <?php if(($key+1) < sizeof($navigator_list['bottom'])): ?>-<?php endif; endforeach; endif; endif; ?>
            </div>
            <div class="f_r">
                <a href="#top"><img src="<?php echo (SHOP_IMG_URL); ?>bnt_top.gif" /></a>
                <a href="../index.php"><img src="<?php echo (SHOP_IMG_URL); ?>bnt_home.gif" /></a>
            </div>
        </div>
    </div>
</div>
<!--底部导航 end-->
<div class="blank"></div>
<!--版权 start-->
<div id="footer">
    <div class="text">
        <?php echo ($copyright); ?>
        <br /> <?php echo ($shop_address); ?> <?php echo ($shop_postcode); ?>
        <?php if(!empty($service_phone)): ?>Tel: <?php echo ($service_phone); endif; ?>
        <?php if(!empty($service_email)): ?>E-mail: <?php echo ($service_email); ?>
            <br /><?php endif; ?>
        <?php if(is_array($qq)): foreach($qq as $key=>$im): if(!empty($im)): ?><a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo ($im); ?>&amp;Site=<?php echo ($shop_name); ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo ($im); ?>:4" height="16" border="0" alt="QQ" /> <?php echo ($im); ?></a><?php endif; endforeach; endif; ?>
        <?php if(is_array($ww)): foreach($ww as $key=>$im): if(!empty($im)): ?><a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo ($im); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo ($im); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo ($im); ?></a><?php endif; endforeach; endif; ?>
        <?php if(is_array($ym)): foreach($ym as $key=>$im): if(!empty($im)): ?><a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo ($im); ?>n&.src=pg" target="_blank"><img src="../image/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo ($im); ?></a><?php endif; endforeach; endif; ?>
        <?php if(is_array($msn)): foreach($msn as $key=>$im): if(!empty($im)): ?><img src="../image/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact=<?php echo ($im); ?>"><?php echo ($im); ?></a><?php endif; endforeach; endif; ?>
        <?php if(is_array($skype)): foreach($skype as $key=>$im): if(!empty($im)): ?><img src="http://mystatus.skype.com/smallclassic/<?php echo ($im); ?>" alt="Skype" /><a href="skype:<?php echo ($im); ?>?call"><?php echo ($im); ?></a><?php endif; endforeach; endif; ?>
        <br />
        <?php if(!empty($icp_number)): echo ($lang["icp_number"]); ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo ($icp_number); ?></a>
            <br /><?php endif; ?>
        <!-- {insert name='query_info'} -->
        <br />
        <?php if(is_array($lang['p_y'])): foreach($lang['p_y'] as $key=>$pv): echo ($pv); endforeach; endif; ?>
        <?php echo ($licensed); ?>
        <br />
        <?php if(!empty($stats_code)): ?><div align="left"><?php echo ($stats_code); ?></div><?php endif; ?>
        <div align="left" id="rss">
            <a href="<?php echo ($feed_url); ?>"><img src="<?php echo (SHOP_IMG_URL); ?>/xml_rss2.gif" alt="rss" /></a>
        </div>
    </div>
</div>

</body>

</html>