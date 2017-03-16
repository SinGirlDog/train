<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo ($keywords); ?>" />
<meta name="Description" content="<?php echo ($description); ?>" />
<title><?php echo ($page_title); ?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="<?php echo (SHOP_IMG_URL); ?>animated_favicon.gif" type="image/gif" />
<link href="<?php echo (SHOP_CSS_URL); ?>style_pink.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo (SHOPADM_JS_URL); ?>jquery-2.1.0.min.js" type="text/javascript">
    </script>
    <script type="text/javascript">
var username_empty = "<?php echo ($lang["passport_js"]["username_empty"]); ?>";
var username_shorter = "<?php echo ($lang["passport_js"]["username_shorter"]); ?>";
var password_empty = "<?php echo ($lang["passport_js"]["password_empty"]); ?>";
var password_shorter = "<?php echo ($lang["passport_js"]["password_shorter"]); ?>";
var confirm_password_invalid = "<?php echo ($lang["passport_js"]["confirm_password_invalid"]); ?>";
var email_empty = "<?php echo ($lang["passport_js"]["email_empty"]); ?>";
var email_invalid = "<?php echo ($lang["passport_js"]["email_invalid"]); ?>";
var agreement = "<?php echo ($lang["passport_js"]["agreement"]); ?>";
var msn_invalid = "<?php echo ($lang["passport_js"]["msn_invalid"]); ?>";
var qq_invalid = "<?php echo ($lang["passport_js"]["qq_invalid"]); ?>";
var home_phone_invalid = "<?php echo ($lang["passport_js"]["home_phone_invalid"]); ?>";
var office_phone_invalid = "<?php echo ($lang["passport_js"]["office_phone_invalid"]); ?>";
var mobile_phone_invalid = "<?php echo ($lang["passport_js"]["mobile_phone_invalid"]); ?>";
var msg_un_blank = "<?php echo ($lang["passport_js"]["msg_un_blank"]); ?>";
var msg_un_length = "<?php echo ($lang["passport_js"]["msg_un_length"]); ?>";
var msg_un_format = "<?php echo ($lang["passport_js"]["msg_un_format"]); ?>";
var msg_un_registered = "<?php echo ($lang["passport_js"]["msg_un_registered"]); ?>";
var msg_can_rg = "<?php echo ($lang["passport_js"]["msg_can_rg"]); ?>";
var msg_email_blank = "<?php echo ($lang["passport_js"]["msg_email_blank"]); ?>";
var msg_email_registered = "<?php echo ($lang["passport_js"]["msg_email_registered"]); ?>";
var msg_email_format = "<?php echo ($lang["passport_js"]["msg_email_format"]); ?>";
var msg_blank = "<?php echo ($lang["passport_js"]["msg_blank"]); ?>";
var no_select_question = "<?php echo ($lang["passport_js"]["no_select_question"]); ?>";
var passwd_balnk = "<?php echo ($lang["passport_js"]["passwd_balnk"]); ?>"; 
</script>

    <link href="<?php echo ($ecs_css_path); ?>" rel="stylesheet" type="text/css" />
    <script src='<?php echo (SHOP_JS_URL); ?>common.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>index.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>transport.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>user.js'></script>

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

        <!--当前位置 start-->
        <div class="block box">
            <div id="ur_here">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php echo ($lang["ur_here"]); ?> <?php echo ($ur_here); ?>
            </div>
        </div>
        <!--当前位置 end-->
        <div class="blank"></div>
        <!--#登录界面 start-->
        <?php switch($action): case "login": ?><div class="usBox clearfix">
    <div class="usBox_1 f_l">
        <div class="logtitle"></div>
        <form name="formLogin" action="<?php echo U('User/act_login');?>" method="post" onSubmit="return userLogin()">
            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="5">
                <tr>
                    <td width="15%" align="right"><?php echo ($lang["label_username"]); ?></td>
                    <td width="85%">
                        <input name="username" type="text" size="25" class="inputBg" />
                    </td>
                </tr>
                <tr>
                    <td align="right"><?php echo ($lang["label_password"]); ?></td>
                    <td>
                        <input name="password" type="password" size="15" class="inputBg" />
                    </td>
                </tr>
                <?php if(!empty($enabled_captcha)): ?><tr>
                        <td align="right"><?php echo ($lang["comment_captcha"]); ?></td>
                        <td>
                            <input type="text" size="8" name="captcha" class="inputBg" />
                            <img src="captcha.php?is_login=1&<?php echo ($rand); ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                    </tr><?php endif; ?>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" value="1" name="remember" id="remember" />
                        <label for="remember"><?php echo ($lang["remember"]); ?></label>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left">
                        <!-- <input type="hidden" name="act" value="act_login" /> -->
                        <!-- <input type="hidden" name="back_act" value="<?php echo ($back_act); ?>" /> -->
                        <input type="submit" name="" value="" class="us_Submit" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="user.php?act=qpassword_name" class="f3"><?php echo ($lang["get_password_by_question"]); ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password" class="f3"><?php echo ($lang["get_password_by_mail"]); ?></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="usTxt">
        <strong><?php echo ($lang['user_reg_info']['0']); ?></strong>
        <br />
        <strong class="f4"><?php echo ($lang['user_reg_info']['1']); ?>：</strong>
        <br />
        <?php if($car_off == 0): echo ($lang['user_reg_info']['8']); ?>
            <br/><?php endif; ?>
        <?php if($car_off == 1): echo ($lang['user_reg_info']['2']); ?>
            <br/><?php endif; ?>
        <?php echo ($lang['user_reg_info']['3']); ?>：
        <br /> 1. <?php echo ($lang['user_reg_info']['4']); ?>
        <br /> 2. <?php echo ($lang['user_reg_info']['5']); ?>
        <br /> 3. <?php echo ($lang['user_reg_info']['6']); ?>
        <br /> 4. <?php echo ($lang['user_reg_info']['7']); ?>
        <br />
        <a href="user.php?act=register"><img src="<?php echo (SHOP_IMG_URL); ?>bnt_ur_reg.gif" /></a>
    </div>
</div>

                <!--#登录界面 end--><?php break;?>
            <?php case "register": if($shop_reg_closed == 1): ?><div class="usBox">
        <div class="usBox_2 clearfix">
            <div class="f1 f5" align="center"><?php echo ($lang["shop_register_closed"]); ?></div>
        </div>
    </div>
    <?php else: ?>
    <script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
    <div class="usBox">
        <div class="usBox_2 clearfix">
            <div class="regtitle"></div>
            <form action="user.php" method="post" name="formUser" onsubmit="return register();">
                <table width="100%" border="0" align="left" cellpadding="5" cellspacing="3">
                    <tr>
                        <td width="13%" align="right"><?php echo ($lang["label_username"]); ?></td>
                        <td width="87%">
                            <input name="username" type="text" size="25" id="username" onblur="is_registered(this.value);" class="inputBg" />
                            <span id="username_notice" style="color:#FF0000"> *</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><?php echo ($lang["label_email"]); ?></td>
                        <td>
                            <input name="email" type="text" size="25" id="email" onblur="checkEmail(this.value);" class="inputBg" />
                            <span id="email_notice" style="color:#FF0000"> *</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><?php echo ($lang["label_password"]); ?></td>
                        <td>
                            <input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" class="inputBg" style="width:179px;" />
                            <span style="color:#FF0000" id="password_notice"> *</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><?php echo ($lang["label_password_intensity"]); ?></td>
                        <td>
                            <table width="145" border="0" cellspacing="0" cellpadding="1">
                                <tr align="center">
                                    <td width="33%" id="pwd_lower"><?php echo ($lang["pwd_lower"]); ?></td>
                                    <td width="33%" id="pwd_middle"><?php echo ($lang["pwd_middle"]); ?></td>
                                    <td width="33%" id="pwd_high"><?php echo ($lang["pwd_high"]); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><?php echo ($lang["label_confirm_password"]); ?></td>
                        <td>
                            <input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);" class="inputBg" style="width:179px;" />
                            <span style="color:#FF0000" id="conform_password_notice"> *</span>
                        </td>
                    </tr>
                    <?php if(is_array($extend_info_list)): foreach($extend_info_list as $key=>$field): if($field["id"] == 6): ?><tr>
                                <td align="right"><?php echo ($lang["passwd_question"]); ?></td>
                                <td>
                                    <select name='sel_question'>
                                        <option value='0'><?php echo ($lang["sel_question"]); ?></option>
                                        {html_options options=$passwd_questions}
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <?php if(!empty($field["is_need"])): ?><td align="right" id="passwd_quesetion"><?php echo ($lang["passwd_answer"]); ?></td>
                                    <td>
                                        <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20' />
                                        <span style="color:#FF0000"> *</span>
                                    </td>
                                    <?php else: ?>
                                    <td align="right"><?php echo ($lang["passwd_answer"]); ?></td>
                                    <td>
                                        <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20' />
                                    </td><?php endif; ?>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <?php if(!empty($field["is_need"])): ?><td align="right" id="extend_field<?php echo ($field["id"]); ?>i">
                                        <?php echo ($field["reg_field_name"]); ?>
                                    </td>
                                    <td>
                                        <input name="extend_field<?php echo ($field["id"]); ?>" type="text" size="25" class="inputBg" />
                                        <span style="color:#FF0000"> *</span>
                                    </td>
                                    <?php else: ?>
                                    <td align="right"><?php echo ($field["reg_field_name"]); ?></td>
                                    <td>
                                        <input name="extend_field<?php echo ($field["id"]); ?>" type="text" size="25" class="inputBg" />
                                    </td><?php endif; ?>
                            </tr><?php endif; endforeach; endif; ?>
                    <?php if(!empty($enabled_captcha)): ?><tr>
                            <td align="right"><?php echo ($lang["comment_captcha"]); ?></td>
                            <td>
                                <input type="text" size="8" name="captcha" class="inputBg" />
                                <img src="captcha.php?<?php echo ($rand); ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
                        </tr><?php endif; ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label>
                                <input name="agreement" type="checkbox" value="1" checked="checked" /> <?php echo ($lang["agreement"]); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td align="left">
                            <input name="act" type="hidden" value="act_register" />
                            <input type="hidden" name="back_act" value="<?php echo ($back_act); ?>" />
                            <input name="Submit" type="submit" value="" class="us_Submit_reg" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="actionSub">
                            <a href="user.php?act=login"><?php echo ($lang["want_login"]); ?></a>
                            <br />
                            <a href="user.php?act=get_password"><?php echo ($lang["forgot_password"]); ?></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div><?php endif; ?>

                <!--#会员注册界面 end--><?php break;?>
            <?php case "get_password": ?><script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
<script type="text/javascript">
var user_name_empty = "<?php echo ($lang["password_js"]["user_name_empty"]); ?>";
var email_address_empty = "<?php echo ($lang["password_js"]["email_address_empty"]); ?>";
var email_address_error = "<?php echo ($lang["password_js"]["email_address_error"]); ?>";
var new_password_empty = "<?php echo ($lang["password_js"]["new_password_empty"]); ?>";
var confirm_password_empty = "<?php echo ($lang["password_js"]["confirm_password_empty"]); ?>";
var both_password_error = "<?php echo ($lang["password_js"]["both_password_error"]); ?>";
</script>
<div class="usBox">
    <div class="usBox_2 clearfix">
        <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
            <br />
            <table width="70%" border="0" align="center">
                <tr>
                    <td colspan="2" align="center"><strong><?php echo ($lang["username_and_email"]); ?></strong></td>
                </tr>
                <tr>
                    <td width="29%" align="right"><?php echo ($lang["username"]); ?></td>
                    <td width="61%">
                        <input name="user_name" type="text" size="30" class="inputBg" />
                    </td>
                </tr>
                <tr>
                    <td align="right"><?php echo ($lang["email"]); ?></td>
                    <td>
                        <input name="email" type="text" size="30" class="inputBg" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="act" value="send_pwd_email" />
                        <input type="submit" name="submit" value="<?php echo ($lang["submit"]); ?>" class="bnt_blue" style="border:none;" />
                        <input name="button" type="button" onclick="history.back()" value="<?php echo ($lang["back_page_up"]); ?>" style="border:none;" class="bnt_blue_1" />
                    </td>
                </tr>
            </table>
            <br />
        </form>
    </div>
</div>

                <!--*找回密码界面 --><?php break;?>
            <?php case "qpassword_name": ?><div class="usBox">
    <div class="usBox_2 clearfix">
        <form action="user.php" method="post">
            <br />
            <table width="70%" border="0" align="center">
                <tr>
                    <td colspan="2" align="center"><strong><?php echo ($lang["get_question_username"]); ?></strong></td>
                </tr>
                <tr>
                    <td width="29%" align="right"><?php echo ($lang["username"]); ?></td>
                    <td width="61%">
                        <input name="user_name" type="text" size="30" class="inputBg" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="act" value="get_passwd_question" />
                        <input type="submit" name="submit" value="<?php echo ($lang["submit"]); ?>" class="bnt_blue" style="border:none;" />
                        <input name="button" type="button" onclick="history.back()" value="<?php echo ($lang["back_page_up"]); ?>" style="border:none;" class="bnt_blue_1" />
                    </td>
                </tr>
            </table>
            <br />
        </form>
    </div>
</div>

                <!--*通过问题找回密码的确认找回账号界面 --><?php break;?>
            <?php case "get_passwd_question": ?><div class="usBox">
    <div class="usBox_2 clearfix">
        <form action="user.php" method="post">
            <br />
            <table width="70%" border="0" align="center">
                <tr>
                    <td colspan="2" align="center"><strong><?php echo ($lang["input_answer"]); ?></strong></td>
                </tr>
                <tr>
                    <td width="29%" align="right"><?php echo ($lang["passwd_question"]); ?>：</td>
                    <td width="61%"><?php echo ($passwd_question); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php echo ($lang["passwd_answer"]); ?>：</td>
                    <td>
                        <input name="passwd_answer" type="text" size="20" class="inputBg" />
                    </td>
                </tr>
                <?php if(!empty($enabled_captcha)): ?><tr>
                        <td align="right"><?php echo ($lang["comment_captcha"]); ?></td>
                        <td>
                            <input type="text" size="8" name="captcha" class="inputBg" />
                            <img src="captcha.php?is_login=1&<?php echo ($rand); ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                    </tr><?php endif; ?>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="act" value="check_answer" />
                        <input type="submit" name="submit" value="<?php echo ($lang["submit"]); ?>" class="bnt_blue" style="border:none;" />
                        <input name="button" type="button" onclick="history.back()" value="<?php echo ($lang["back_page_up"]); ?>" style="border:none;" class="bnt_blue_1" />
                    </td>
                </tr>
            </table>
            <br />
        </form>
    </div>
</div>

                <!--*根据输入账号显示密码问题界面 --><?php break;?>
            <?php case "reset_password": ?><script type="text/javascript">
var user_name_empty = "<?php echo ($lang["password_js"]["user_name_empty"]); ?>";
var email_address_empty = "<?php echo ($lang["password_js"]["email_address_empty"]); ?>";
var email_address_error = "<?php echo ($lang["password_js"]["email_address_error"]); ?>";
var new_password_empty = "<?php echo ($lang["password_js"]["new_password_empty"]); ?>";
var confirm_password_empty = "<?php echo ($lang["password_js"]["confirm_password_empty"]); ?>";
var both_password_error = "<?php echo ($lang["password_js"]["both_password_error"]); ?>";
</script>
<div class="usBox">
    <div class="usBox_2 clearfix">
        <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
            <br />
            <table width="80%" border="0" align="center">
                <tr>
                    <td><?php echo ($lang["new_password"]); ?></td>
                    <td>
                        <input name="new_password" type="password" size="25" class="inputBg" />
                    </td>
                </tr>
                <tr>
                    <td><?php echo ($lang["confirm_password"]); ?>:</td>
                    <td>
                        <input name="confirm_password" type="password" size="25" class="inputBg" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="act" value="act_edit_password" />
                        <input type="hidden" name="uid" value="<?php echo ($uid); ?>" />
                        <input type="hidden" name="code" value="<?php echo ($code); ?>" />
                        <input type="submit" name="submit" value="<?php echo ($lang["confirm_submit"]); ?>" />
                    </td>
                </tr>
            </table>
            <br />
        </form>
    </div>

                <!--#找回密码界面 end--><?php break;?>
            <defalut/><?php endswitch;?>
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
    <script type="text/javascript">
    var process_request = "<?php echo ($lang["process_request"]); ?>";
    var username_exist = "<?php echo ($lang["username_exist"]); ?>";
    </script>

</html>