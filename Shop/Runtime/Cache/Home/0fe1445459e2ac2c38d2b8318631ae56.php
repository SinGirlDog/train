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

    <link href="<?php echo ($ecs_css_path); ?>" rel="stylesheet" type="text/css" />
    <script src='<?php echo (SHOP_JS_URL); ?>common.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>index.js'></script>
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

    <!--当前位置 start-->
    <div class="block box">
        <div id="ur_here">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php echo ($lang["ur_here"]); ?> <?php echo ($ur_here); ?>
        </div>
    </div>
    <!--当前位置 end-->
    <div class="blank"></div>
    <div class="block clearfix">
        <!--left start-->
        <div class="AreaL">
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox">
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="userMenu">
    <a href="<?php echo U('User/index',array('act'=>$action));?>" class="curs"> 
    <?php switch($action): case "default": ?><img src="<?php echo (SHOP_IMG_URL); ?>u1.gif" /> <?php echo ($lang["label_welcome"]); break;?>
        <?php case "profile": ?><img src="<?php echo (SHOP_IMG_URL); ?>u2.gif" /> <?php echo ($lang["label_profile"]); break;?>
        <?php case "order_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u3.gif" /> <?php echo ($lang["label_order"]); break;?>
        <?php case "order_detail": ?><img src="<?php echo (SHOP_IMG_URL); ?>u3.gif" /> <?php echo ($lang["label_order"]); break;?>
        <?php case "address_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u4.gif" /> <?php echo ($lang["label_address"]); break;?>
        <?php case "collection_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u5.gif" /> <?php echo ($lang["label_collection"]); break;?>
        <?php case "message_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u6.gif" /> <?php echo ($lang["label_message"]); break;?>
        <?php case "tag_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u7.gif" /> <?php echo ($lang["label_tag"]); break;?>
        <?php case "booking_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u8.gif" /> <?php echo ($lang["label_booking"]); break;?>
        <?php case "bonus": ?><img src="<?php echo (SHOP_IMG_URL); ?>u9.gif" /> <?php echo ($lang["label_bonus"]); break;?>
        <?php case "affiliate": ?><img src="<?php echo (SHOP_IMG_URL); ?>u10.gif" /> <?php echo ($lang["label_affiliate"]); break;?>
        <?php case "comment_list": ?><img src="<?php echo (SHOP_IMG_URL); ?>u11.gif" /> <?php echo ($lang["label_comment"]); break;?>
        <?php case "track_packages": ?><img src="<?php echo (SHOP_IMG_URL); ?>u12.gif" /> <?php echo ($lang["label_track_packages"]); break;?>
        <?php case "account_log": ?><img src="<?php echo (SHOP_IMG_URL); ?>u13.gif" /> <?php echo ($lang["label_user_surplus"]); break;?>
        <?php case "transform_points": ?><img src="<?php echo (SHOP_IMG_URL); ?>u14.gif" /> <?php echo ($lang["label_transform_points"]); break;?>
        <?php default: endswitch;?>
    </a>
    <a href="<?php echo U('User/index',array('act'=>'logout'));?>" style="background:none; text-align:right; margin-right:10px;"><img src="<?php echo (SHOP_IMG_URL); ?>bnt_sign.gif" /></a>
</div>

                    </div>
                </div>
            </div>
        </div>
        <!--left end-->
        <!--right start-->
        <div class="AreaR">
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                        <?php switch($action): case "profile": ?><script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
<script type="text/javascript">
var bonus_sn_empty = "<?php echo ($lang["profile_js"]["bonus_sn_empty"]); ?>";
var bonus_sn_error = "<?php echo ($lang["profile_js"]["bonus_sn_error"]); ?>";
var email_empty = "<?php echo ($lang["profile_js"]["email_empty"]); ?>";
var email_error = "<?php echo ($lang["profile_js"]["email_error"]); ?>";
var old_password_empty = "<?php echo ($lang["profile_js"]["old_password_empty"]); ?>";
var new_password_empty = "<?php echo ($lang["profile_js"]["new_password_empty"]); ?>";
var confirm_password_empty = "<?php echo ($lang["profile_js"]["confirm_password_empty"]); ?>";
var both_password_error = "<?php echo ($lang["profile_js"]["both_password_error"]); ?>";
var msg_blank = "<?php echo ($lang["profile_js"]["msg_blank"]); ?>";
var no_select_question = "<?php echo ($lang["profile_js"]["no_select_question"]); ?>";
</script>

<h5><span><?php echo ($lang["profile"]); ?></span></h5>
<div class="blank"></div>
<form name="formEdit" action="user.php" method="post" onSubmit="return userEdit()">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["birthday"]); ?>： </td>
            <td width="72%" align="left" bgcolor="#FFFFFF">
                {html_select_date field_order=YMD prefix=birthday start_year=-60 end_year=+1 display_days=true month_format=%m day_value_format=%02d time=$profile.birthday}
            </td>
        </tr>
        <tr>
            <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["sex"]); ?>： </td>
            <td width="72%" align="left" bgcolor="#FFFFFF">
            <?php $sex_type = array($lang.secrecy,$lang.male,$lang.female); ?>
                <?php $__FOR_START_28596__=0;$__FOR_END_28596__=4;for($rad_key=$__FOR_START_28596__;$rad_key < $__FOR_END_28596__;$rad_key+=1){ if($profile['sex'] == $rad_key): ?><input type="radio" name="sex" value="<?php echo ($ran_key); ?>" checked="checked" />
                        <?php else: ?>
                        <input type="radio" name="sex" value="<?php echo ($ran_key); ?>" /><?php endif; ?>
                    <?php echo ($sex_type[$rand_key]); ?>                    
                    &nbsp;&nbsp;<?php } ?>
            </td>
        </tr>
        <tr>
            <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["email"]); ?>： </td>
            <td width="72%" align="left" bgcolor="#FFFFFF">
                <input name="email" type="text" value="<?php echo ($profile["email"]); ?>" size="25" class="inputBg" /><span style="color:#FF0000"> *</span></td>
        </tr>
        <?php if(is_array($extend_info_list)): foreach($extend_info_list as $key=>$field): if($field["id"] == 6): ?><tr>
                    <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["passwd_question"]); ?>：</td>
                    <td width="72%" align="left" bgcolor="#FFFFFF">
                        <select name='sel_question'>
                            <option value='0'><?php echo ($lang["sel_question"]); ?></option>
                            {html_options options=$passwd_questions selected=$profile.passwd_question}
                        </select>
                    </td>
                </tr>
                <tr>
                    <?php if(!empty($field['is_need'])): ?><td width="28%" align="right" bgcolor="#FFFFFF" id="passwd_quesetion"><?php echo ($lang["passwd_answer"]); ?>：
                        </td>
                        <td width="72%" align="left" bgcolor="#FFFFFF">
                            <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20' value="<?php echo ($profile["passwd_answer"]); ?>" />
                            <span style="color:#FF0000"> *</span>
                        </td>
                        <?php else: ?>
                        <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["passwd_answer"]); ?>：
                        </td>
                        <td width="72%" align="left" bgcolor="#FFFFFF">
                            <input name="passwd_answer" type="text" size="25" class="inputBg" maxlengt='20' value="<?php echo ($profile["passwd_answer"]); ?>" />
                        </td><?php endif; ?>
                </tr>
                <?php else: ?>
                <tr>
                    <?php if(!empty($field['is_need'])): ?><td width="28%" align="right" bgcolor="#FFFFFF" id="extend_field<?php echo ($field["id"]); ?>i"><?php echo ($field["reg_field_name"]); ?>：</td>
                        <td width="72%" align="left" bgcolor="#FFFFFF">
                            <input name="extend_field<?php echo ($field["id"]); ?>" type="text" class="inputBg" value="<?php echo ($field["content"]); ?>" />
                            <span style="color:#FF0000"> *</span>
                        </td>
                        <?php else: ?>
                        <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($field["reg_field_name"]); ?>：</td>
                        <td width="72%" align="left" bgcolor="#FFFFFF">
                            <input name="extend_field<?php echo ($field["id"]); ?>" type="text" class="inputBg" value="<?php echo ($field["content"]); ?>" />
                        </td><?php endif; ?>
                </tr><?php endif; endforeach; endif; ?>
        <tr>
            <td colspan="2" align="center" bgcolor="#FFFFFF">
                <input name="act" type="hidden" value="act_edit_profile" />
                <input name="submit" type="submit" value="<?php echo ($lang["confirm_edit"]); ?>" class="bnt_blue_1" style="border:none;" />
            </td>
        </tr>
    </table>
</form>
<form name="formPassword" action="user.php" method="post" onSubmit="return editPassword()">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["old_password"]); ?>：</td>
            <td width="76%" align="left" bgcolor="#FFFFFF">
                <input name="old_password" type="password" size="25" class="inputBg" />
            </td>
        </tr>
        <tr>
            <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["new_password"]); ?>：</td>
            <td align="left" bgcolor="#FFFFFF">
                <input name="new_password" type="password" size="25" class="inputBg" />
            </td>
        </tr>
        <tr>
            <td width="28%" align="right" bgcolor="#FFFFFF"><?php echo ($lang["confirm_password"]); ?>：</td>
            <td align="left" bgcolor="#FFFFFF">
                <input name="comfirm_password" type="password" size="25" class="inputBg" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" bgcolor="#FFFFFF">
                <input name="act" type="hidden" value="act_edit_password" />
                <input name="submit" type="submit" class="bnt_blue_1" style="border:none;" value="<?php echo ($lang["confirm_edit"]); ?>" />
            </td>
        </tr>
    </table>
</form>

                                <!--#用户信息界面 end--><?php break;?>
                            <?php case "bonus": ?><script type="text/javascript">
var bonus_sn_empty = "<?php echo ($lang["profile_js"]["bonus_sn_empty"]); ?>";
var bonus_sn_error = "<?php echo ($lang["profile_js"]["bonus_sn_error"]); ?>";
var email_empty = "<?php echo ($lang["profile_js"]["email_empty"]); ?>";
var email_error = "<?php echo ($lang["profile_js"]["email_error"]); ?>";
var old_password_empty = "<?php echo ($lang["profile_js"]["old_password_empty"]); ?>";
var new_password_empty = "<?php echo ($lang["profile_js"]["new_password_empty"]); ?>";
var confirm_password_empty = "<?php echo ($lang["profile_js"]["confirm_password_empty"]); ?>";
var both_password_error = "<?php echo ($lang["profile_js"]["both_password_error"]); ?>";
var msg_blank = "<?php echo ($lang["profile_js"]["msg_blank"]); ?>";
var no_select_question = "<?php echo ($lang["profile_js"]["no_select_question"]); ?>";
</script>

<h5><span><?php echo ($lang["label_bonus"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <th align="center" bgcolor="#FFFFFF"><?php echo ($lang["bonus_sn"]); ?></th>
        <th align="center" bgcolor="#FFFFFF"><?php echo ($lang["bonus_name"]); ?></th>
        <th align="center" bgcolor="#FFFFFF"><?php echo ($lang["bonus_amount"]); ?></th>
        <th align="center" bgcolor="#FFFFFF"><?php echo ($lang["min_goods_amount"]); ?></th>
        <th align="center" bgcolor="#FFFFFF"><?php echo ($lang["bonus_end_date"]); ?></th>
        <th align="center" bgcolor="#FFFFFF"><?php echo ($lang["bonus_status"]); ?></th>
    </tr>
    <?php if(!empty($bonus)): if(is_array($bonus)): foreach($bonus as $key=>$item): ?><tr>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($item["bonus_sn"]); ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($item["type_name"]); ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($item["type_money"]); ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($item["min_goods_amount"]); ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($item["use_enddate"]); ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($item["status"]); ?></td>
            </tr><?php endforeach; endif; ?>
        <?php else: ?>
        <tr>
            <td colspan="6" bgcolor="#FFFFFF"><?php echo ($lang["user_bonus_empty"]); ?></td>
        </tr><?php endif; ?>
</table>
<div class="blank5"></div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--翻页 start-->
<form name="selectPageForm" action="<?php echo ($smarty["server"]["PHP_SELF"]); ?>" method="get">
    <?php if($pager["styleid"] == 0): ?><div id="pager">
            <?php echo ($lang["pager_1"]); echo ($pager["record_count"]); echo ($lang["pager_2"]); echo ($lang["pager_3"]); echo ($pager["page_count"]); echo ($lang["pager_4"]); ?> <span> <a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?></a> <a href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a> <a href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a> <a href="<?php echo ($pager["page_last"]); ?>"><?php echo ($lang["page_last"]); ?></a> </span>
            <?php if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                    <?php else: ?>
                    <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
            <select name="page" id="page" onchange="selectPage(this)">
                {html_options options=$pager.array selected=$pager.page}
            </select>
        </div>
        <?php else: ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;"><?php echo ($lang["pager_1"]); ?><b><?php echo ($pager["record_count"]); ?></b> <?php echo ($lang["pager_2"]); ?></span>
            <?php if(!empty($pager["page_first"])): ?><a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?> ...</a><?php endif; ?>
            <?php if(!empty($pager["page_prev"])): ?><a class="prev" href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a><?php endif; ?>
            <?php if($pager["page_count"] != 1): if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
                        <else>
                            <a href="<?php echo ($item); ?>">[<?php echo ($key); ?>]</a><?php endif; endforeach; endif; endif; ?>
            <?php if(!empty($pager["page_next"])): ?><a class="next" href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_last"])): ?><a class="last" href="<?php echo ($pager["page_last"]); ?>">...<?php echo ($lang["page_last"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_kbd"])): if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd><?php endif; ?>
        </div>
        <!--翻页 END--><?php endif; ?>
</form>
<script type="Text/Javascript" language="JavaScript">
    function selectPage(sel) { sel.form.submit(); }
</script>

<div class="blank5"></div>
<h5><span><?php echo ($lang["add_bonus"]); ?></span></h5>
<div class="blank"></div>
<form name="addBouns" action="user.php" method="post" onSubmit="return addBonus()">
    <div style="padding: 15px;">
        <?php echo ($lang["bonus_number"]); ?>
        <input name="bonus_sn" type="text" size="30" class="inputBg" />
        <input type="hidden" name="act" value="act_add_bonus" class="inputBg" />
        <input type="submit" class="bnt_blue_1" style="border:none;" value="<?php echo ($lang["add_bonus"]); ?>" />
    </div>
</form>

                                <!--#用户红包结束 end--><?php break;?>
                            <?php case "order_list": ?><h5><span><?php echo ($lang["label_order"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr align="center">
        <td bgcolor="#ffffff"><?php echo ($lang["order_number"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["order_addtime"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["order_money"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["order_status"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></td>
    </tr>
    <?php if(is_array($orders)): foreach($orders as $key=>$item): ?><tr>
            <td align="center" bgcolor="#ffffff"><a href="user.php?act=order_detail&order_id=<?php echo ($item["order_id"]); ?>" class="f6"><?php echo ($item["order_sn"]); ?></a></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["order_time"]); ?></td>
            <td align="right" bgcolor="#ffffff"><?php echo ($item["total_fee"]); ?></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["order_status"]); ?></td>
            <td align="center" bgcolor="#ffffff">
                <font class="f6"><?php echo ($item["handler"]); ?></font>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<div class="blank5"></div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--翻页 start-->
<form name="selectPageForm" action="<?php echo ($smarty["server"]["PHP_SELF"]); ?>" method="get">
    <?php if($pager["styleid"] == 0): ?><div id="pager">
            <?php echo ($lang["pager_1"]); echo ($pager["record_count"]); echo ($lang["pager_2"]); echo ($lang["pager_3"]); echo ($pager["page_count"]); echo ($lang["pager_4"]); ?> <span> <a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?></a> <a href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a> <a href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a> <a href="<?php echo ($pager["page_last"]); ?>"><?php echo ($lang["page_last"]); ?></a> </span>
            <?php if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                    <?php else: ?>
                    <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
            <select name="page" id="page" onchange="selectPage(this)">
                {html_options options=$pager.array selected=$pager.page}
            </select>
        </div>
        <?php else: ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;"><?php echo ($lang["pager_1"]); ?><b><?php echo ($pager["record_count"]); ?></b> <?php echo ($lang["pager_2"]); ?></span>
            <?php if(!empty($pager["page_first"])): ?><a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?> ...</a><?php endif; ?>
            <?php if(!empty($pager["page_prev"])): ?><a class="prev" href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a><?php endif; ?>
            <?php if($pager["page_count"] != 1): if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
                        <else>
                            <a href="<?php echo ($item); ?>">[<?php echo ($key); ?>]</a><?php endif; endforeach; endif; endif; ?>
            <?php if(!empty($pager["page_next"])): ?><a class="next" href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_last"])): ?><a class="last" href="<?php echo ($pager["page_last"]); ?>">...<?php echo ($lang["page_last"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_kbd"])): if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd><?php endif; ?>
        </div>
        <!--翻页 END--><?php endif; ?>
</form>
<script type="Text/Javascript" language="JavaScript">
    function selectPage(sel) { sel.form.submit(); }
</script>

<div class="blank5"></div>
<h5><span><?php echo ($lang["merge_order"]); ?></span></h5>
<div class="blank"></div>
<script type="text/javascript">
var from_order_empty = "<?php echo ($lang["merge_order_js"]["from_order_empty"]); ?>";
var to_order_empty = "<?php echo ($lang["merge_order_js"]["to_order_empty"]); ?>";
var order_same = "<?php echo ($lang["merge_order_js"]["order_same"]); ?>";
var confirm_merge = "<?php echo ($lang["merge_order_js"]["confirm_merge"]); ?>";
</script>
<form action="user.php" method="post" name="formOrder" onsubmit="return mergeOrder()">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="22%" align="right" bgcolor="#ffffff"><?php echo ($lang["first_order"]); ?>:</td>
            <td width="12%" align="left" bgcolor="#ffffff">
                <select name="to_order">
                    <option value="0"><?php echo ($lang["select"]); ?></option>
                    {html_options options=$merge}
                </select>
            </td>
            <td width="19%" align="right" bgcolor="#ffffff"><?php echo ($lang["second_order"]); ?>:</td>
            <td width="11%" align="left" bgcolor="#ffffff">
                <select name="from_order">
                    <option value="0"><?php echo ($lang["select"]); ?></option>
                    {html_options options=$merge}
                </select>
            </td>
            <td width="36%" bgcolor="#ffffff">&nbsp;
                <input name="act" value="merge_order" type="hidden" />
                <input type="submit" name="Submit" class="bnt_blue_1" style="border:none;" value="<?php echo ($lang["merge_order"]); ?>" />
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff">&nbsp;</td>
            <td colspan="4" align="left" bgcolor="#ffffff"><?php echo ($lang["merge_order_notice"]); ?></td>
        </tr>
    </table>
</form>

                                <!--#订单列表界面 end--><?php break;?>
                            <?php case "track_packages": ?><h5><span><?php echo ($lang["label_track_packages"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="order_table">
    <tr align="center">
        <td bgcolor="#ffffff"><?php echo ($lang["order_number"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></td>
    </tr>
    <?php if(is_array($orders)): foreach($orders as $key=>$item): ?><tr>
            <td align="center" bgcolor="#ffffff"><a href="user.php?act=order_detail&order_id=<?php echo ($item["order_id"]); ?>"><?php echo ($item["order_sn"]); ?></a></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["query_link"]); ?></td>
        </tr><?php endforeach; endif; ?>
</table>
<script>
var query_status = '<?php echo ($lang["query_status"]); ?>';
var ot = document.getElementById('order_table');
for (var i = 1; i < ot.rows.length; i++) {
    var row = ot.rows[i];
    var cel = row.cells[1];
    cel.getElementsByTagName('a').item(0).innerHTML = query_status;
}
</script>
<div class="blank5"></div>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--翻页 start-->
<form name="selectPageForm" action="<?php echo ($smarty["server"]["PHP_SELF"]); ?>" method="get">
    <?php if($pager["styleid"] == 0): ?><div id="pager">
            <?php echo ($lang["pager_1"]); echo ($pager["record_count"]); echo ($lang["pager_2"]); echo ($lang["pager_3"]); echo ($pager["page_count"]); echo ($lang["pager_4"]); ?> <span> <a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?></a> <a href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a> <a href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a> <a href="<?php echo ($pager["page_last"]); ?>"><?php echo ($lang["page_last"]); ?></a> </span>
            <?php if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                    <?php else: ?>
                    <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
            <select name="page" id="page" onchange="selectPage(this)">
                {html_options options=$pager.array selected=$pager.page}
            </select>
        </div>
        <?php else: ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;"><?php echo ($lang["pager_1"]); ?><b><?php echo ($pager["record_count"]); ?></b> <?php echo ($lang["pager_2"]); ?></span>
            <?php if(!empty($pager["page_first"])): ?><a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?> ...</a><?php endif; ?>
            <?php if(!empty($pager["page_prev"])): ?><a class="prev" href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a><?php endif; ?>
            <?php if($pager["page_count"] != 1): if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
                        <else>
                            <a href="<?php echo ($item); ?>">[<?php echo ($key); ?>]</a><?php endif; endforeach; endif; endif; ?>
            <?php if(!empty($pager["page_next"])): ?><a class="next" href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_last"])): ?><a class="last" href="<?php echo ($pager["page_last"]); ?>">...<?php echo ($lang["page_last"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_kbd"])): if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd><?php endif; ?>
        </div>
        <!--翻页 END--><?php endif; ?>
</form>
<script type="Text/Javascript" language="JavaScript">
    function selectPage(sel) { sel.form.submit(); }
</script>


                                <!--#包裹状态查询界面 end--><?php break;?>
                            <?php case "order_detail": ?><h5><span><?php echo ($lang["order_status"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["detail_order_sn"]); ?>：</td>
        <td align="left" bgcolor="#ffffff"><?php echo ($order["order_sn"]); ?>
            <?php if($order['extension_code'] == 'group_buy'): ?><a href="./group_buy.php?act=view&id=<?php echo ($order["extension_id"]); ?>" class="f6"><strong><?php echo ($lang["order_is_group_buy"]); ?></strong></a><?php endif; ?>
            <?php if($order['extension_code'] == 'exchange_goods'): ?><a href="./exchange.php?act=view&id=<?php echo ($order["extension_id"]); ?>" class="f6"><strong><?php echo ($lang["order_is_exchange"]); ?></strong></a><?php endif; ?>
            <a href="user.php?act=message_list&order_id=<?php echo ($order["order_id"]); ?>" class="f6">[<?php echo ($lang["business_message"]); ?>]</a>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff"><?php echo ($lang["detail_order_status"]); ?>：</td>
        <td align="left" bgcolor="#ffffff"><?php echo ($order["order_status"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($order["confirm_time"]); ?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff"><?php echo ($lang["detail_pay_status"]); ?>：</td>
        <td align="left" bgcolor="#ffffff"><?php echo ($order["pay_status"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;{if $order.order_amount gt 0}<?php echo ($order["pay_online"]); ?>{/if}<?php echo ($order["pay_time"]); ?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff"><?php echo ($lang["detail_shipping_status"]); ?>：</td>
        <td align="left" bgcolor="#ffffff"><?php echo ($order["shipping_status"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($order["shipping_time"]); ?></td>
    </tr>
    <?php if(!empty($order['invoice_no'])): ?><tr>
            <td align="right" bgcolor="#ffffff"><?php echo ($lang["consignment"]); ?>：</td>
            <td align="left" bgcolor="#ffffff"><?php echo ($order["invoice_no"]); ?></td>
        </tr><?php endif; ?>
    <?php if(!empty($order['to_buyer'])): ?><tr>
            <td align="right" bgcolor="#ffffff"><?php echo ($lang["detail_to_buyer"]); ?>：</td>
            <td align="left" bgcolor="#ffffff"><?php echo ($order["to_buyer"]); ?></td>
        </tr><?php endif; ?>
    <?php if(!empty($virtual_card)): ?><tr>
            <td align="right" bgcolor="#ffffff"><?php echo ($lang["virtual_card_info"]); ?>：</td>
            <td colspan="3" align="left" bgcolor="#ffffff">
                <?php if(is_array($virtual_card)): foreach($virtual_card as $key=>$vgoods): if(is_array($vgoods['info'])): foreach($vgoods['info'] as $key=>$card): if(!empty($card['card_sn'])): echo ($lang["card_sn"]); ?>:<span style="color:red;"><?php echo ($card["card_sn"]); ?></span><?php endif; ?>
                        <?php if(!empty($card['card_password'])): echo ($lang["card_password"]); ?>:<span style="color:red;"><?php echo ($card["card_password"]); ?></span><?php endif; ?>
                        <?php if(!empty($card['end_date'])): echo ($lang["end_date"]); ?>:<?php echo ($card["end_date"]); endif; ?>
                        <br /><?php endforeach; endif; endforeach; endif; ?>
            </td>
        </tr><?php endif; ?>
</table>
<div class="blank"></div>
<h5><span><?php echo ($lang["goods_list"]); ?></span>
        <notempy name="allow_to_cart">
        <a href="javascript:;" onclick="returnToCart(<?php echo ($order["order_id"]); ?>)" class="f6"><?php echo ($lang["return_to_cart"]); ?></a>
        </notempy>
        </h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <th width="23%" align="center" bgcolor="#ffffff"><?php echo ($lang["goods_name"]); ?></th>
        <th width="29%" align="center" bgcolor="#ffffff"><?php echo ($lang["goods_attr"]); ?></th>
        <th><?php echo ($lang["market_price"]); ?></th>
        <th width="26%" align="center" bgcolor="#ffffff"><?php echo ($lang["goods_price"]); ?>
            <?php if($order["extension_code"] == 'group_buy'): echo ($lang["gb_deposit"]); endif; ?>
        </th>
        <th width="9%" align="center" bgcolor="#ffffff"><?php echo ($lang["number"]); ?></th>
        <th width="20%" align="center" bgcolor="#ffffff"><?php echo ($lang["subtotal"]); ?></th>
    </tr>
    <?php if(is_array($goods_list)): foreach($goods_list as $key=>$goods): ?><tr>
            <td bgcolor="#ffffff">
                <?php if($goods["goods_id"] > 0): if($goods["extension_code"] != 'package_buy'): ?><a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($goods["goods_name"]); ?></a>
                        <?php if($goods["parent_id"] > 0): ?><span style="color:#FF0000">（<?php echo ($lang["accessories"]); ?>）</span>
                            <elseif $goods.is_gift>
                                <span style="color:#FF0000">（<?php echo ($lang["largess"]); ?>）</span><?php endif; endif; ?>
                    <?php if($goods["extension_code"] == 'package_buy'): ?><a href="javascript:void(0)" onclick="setSuitShow(<?php echo ($goods["goods_id"]); ?>)" class="f6"><?php echo ($goods["goods_name"]); ?><span style="color:#FF0000;">（礼包）</span></a>
                        <div id="suit_<?php echo ($goods["goods_id"]); ?>" style="display:none">
                            <?php if(is_array($goods['package_goods_list'])): foreach($goods['package_goods_list'] as $key=>$package_goods_list): ?><a href="goods.php?id=<?php echo ($package_goods_list["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($package_goods_list["goods_name"]); ?></a>
                                <br /><?php endforeach; endif; ?>
                        </div><?php endif; endif; ?>
            </td>
            <td align="left" bgcolor="#ffffff"><?php echo (nl2br($goods["goods_attr"])); ?></td>
            <td align="right"><?php echo ($goods["market_price"]); ?></td>
            <td align="right" bgcolor="#ffffff"><?php echo ($goods["goods_price"]); ?></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($goods["goods_number"]); ?></td>
            <td align="right" bgcolor="#ffffff"><?php echo ($goods["subtotal"]); ?></td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="8" bgcolor="#ffffff" align="right">
            <?php echo ($lang["shopping_money"]); ?>
            <?php if($order["extension_code"] == 'group_buy'): echo ($lang["gb_deposit"]); endif; ?>: <?php echo ($order["formated_goods_amount"]); ?>
        </td>
    </tr>
</table>
<div class="blank"></div>
<h5><span><?php echo ($lang["fee_total"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td align="right" bgcolor="#ffffff">
            <?php echo ($lang["goods_all_price"]); ?>
            <?php if($order["extension_code"] == 'group_buy'): echo ($lang["gb_deposit"]); endif; ?>: <?php echo ($order["formated_goods_amount"]); ?>
            <?php if($order["discount"] > 0): ?>- <?php echo ($lang["discount"]); ?>: <?php echo ($order["formated_discount"]); endif; ?>
            <?php if($order["tax"] > 0): ?>+ <?php echo ($lang["tax"]); ?>: <?php echo ($order["formated_tax"]); endif; ?>
            <?php if($order["shipping_fee"] > 0): ?>+ <?php echo ($lang["shipping_fee"]); ?>: <?php echo ($order["formated_shipping_fee"]); endif; ?>
            <?php if($order["insure_fee"] > 0): ?>+ <?php echo ($lang["insure_fee"]); ?>: <?php echo ($order["formated_insure_fee"]); endif; ?>
            <?php if($order["pay_fee"] > 0): ?>+ <?php echo ($lang["pay_fee"]); ?>: <?php echo ($order["formated_pay_fee"]); endif; ?>
            <?php if($order["pack_fee"] > 0): ?>+ <?php echo ($lang["pack_fee"]); ?>: <?php echo ($order["formated_pack_fee"]); endif; ?>
            <?php if($order["card_fee"] > 0): ?>+ <?php echo ($lang["card_fee"]); ?>: <?php echo ($order["formated_card_fee"]); endif; ?>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff">
            <?php if($order["money_paid"] > 0): ?>- <?php echo ($lang["order_money_paid"]); ?>: <?php echo ($order["formated_money_paid"]); endif; ?>
            <?php if($order["surplus"] > 0): ?>- <?php echo ($lang["use_surplus"]); ?>: <?php echo ($order["formated_surplus"]); endif; ?>
            <?php if($order["integral_money"] > 0): ?>- <?php echo ($lang["use_integral"]); ?>: <?php echo ($order["formated_integral_money"]); endif; ?>
            <?php if($order["bonus"] > 0): ?>- <?php echo ($lang["use_bonus"]); ?>: <?php echo ($order["formated_bonus"]); endif; ?>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff"><?php echo ($lang["order_amount"]); ?>: <?php echo ($order["formated_order_amount"]); ?>
            <?php if($order["extension_code"] == 'group_buy'): ?><br /> <?php echo ($lang["notice_gb_order_amount"]); endif; ?>
        </td>
    </tr>
    <?php if(!empty($allow_edit_surplus)): ?><tr>
            <td align="right" bgcolor="#ffffff">
                <form action="user.php" method="post" name="formFee" id="formFee"><?php echo ($lang["use_more_surplus"]); ?>:
                    <input name="surplus" type="text" size="8" value="0" style="border:1px solid #ccc;" /><?php echo ($max_surplus); ?>
                    <input type="submit" name="Submit" class="submit" value="<?php echo ($lang["button_submit"]); ?>" />
                    <input type="hidden" name="act" value="act_edit_surplus" />
                    <input type="hidden" name="order_id" value="<?php echo ($smarty["get"]["order_id"]); ?>" />
                </form>
            </td>
        </tr><?php endif; ?>
</table>
<div class="blank"></div>
<h5><span><?php echo ($lang["consignee_info"]); ?></span></h5>
<div class="blank"></div>
<?php if($order["allow_update_address"] > 0): ?><form action="user.php" method="post" name="formAddress" id="formAddress">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["consignee_name"]); ?>： </td>
                <td width="35%" align="left" bgcolor="#ffffff">
                    <input name="consignee" type="text" class="inputBg" value="<?php echo (escape($order["consignee"])); ?>" size="25">
                </td>
                <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["email_address"]); ?>： </td>
                <td width="35%" align="left" bgcolor="#ffffff">
                    <input name="email" type="text" class="inputBg" value="<?php echo (escape($order["email"])); ?>" size="25" />
                </td>
            </tr>
            <?php if(!empty($order['exist_real_goods'])): ?><tr>
                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["detailed_address"]); ?>： </td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="address" type="text" class="inputBg" value="<?php echo (escape($order["address"])); ?> " size="25" />
                    </td>
                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["postalcode"]); ?>：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="zipcode" type="text" class="inputBg" value="<?php echo (escape($order["zipcode"])); ?>" size="25" />
                    </td>
                </tr><?php endif; ?>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["phone"]); ?>：</td>
                <td align="left" bgcolor="#ffffff">
                    <input name="tel" type="text" class="inputBg" value="<?php echo (escape($order["tel"])); ?>" size="25" />
                </td>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["backup_phone"]); ?>：</td>
                <td align="left" bgcolor="#ffffff">
                    <input name="mobile" type="text" class="inputBg" value="<?php echo (escape($order["mobile"])); ?>" size="25" />
                </td>
            </tr>
            <?php if(!empty($order['exist_real_goods'])): ?><tr>
                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["sign_building"]); ?>：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="sign_building" class="inputBg" type="text" value="<?php echo (escape($order["sign_building"])); ?>" size="25" />
                    </td>
                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["deliver_goods_time"]); ?>：</td>
                    <td align="left" bgcolor="#ffffff">
                        <input name="best_time" type="text" class="inputBg" value="<?php echo (escape($order["best_time"])); ?>" size="25" />
                    </td>
                </tr><?php endif; ?>
            <tr>
                <td colspan="4" align="center" bgcolor="#ffffff">
                    <input type="hidden" name="act" value="save_order_address" />
                    <input type="hidden" name="order_id" value="<?php echo ($order["order_id"]); ?>" />
                    <input type="submit" class="bnt_blue_2" value="<?php echo ($lang["update_address"]); ?>" />
                </td>
            </tr>
        </table>
    </form>
    <?php else: ?>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["consignee_name"]); ?>：</td>
            <td width="35%" align="left" bgcolor="#ffffff"><?php echo ($order["consignee"]); ?></td>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["email_address"]); ?>：</td>
            <td width="35%" align="left" bgcolor="#ffffff"><?php echo ($order["email"]); ?></td>
        </tr>
        <notemppty name="order['exist_real_goods']">
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["detailed_address"]); ?>：</td>
                <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["address"]); ?>
                    <notemppty name="order['zipcode']">
                        [<?php echo ($lang["postalcode"]); ?>: <?php echo ($order["zipcode"]); ?>]
                    </notemppty>
                </td>
            </tr>
        </notemppty>
        <tr>
            <td align="right" bgcolor="#ffffff"><?php echo ($lang["phone"]); ?>：</td>
            <td align="left" bgcolor="#ffffff"><?php echo ($order["tel"]); ?> </td>
            <td align="right" bgcolor="#ffffff"><?php echo ($lang["backup_phone"]); ?>：</td>
            <td align="left" bgcolor="#ffffff"><?php echo ($order["mobile"]); ?></td>
        </tr>
        <?php if(!empty($order['exist_real_goods'])): ?><tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["sign_building"]); ?>：</td>
                <td align="left" bgcolor="#ffffff"><?php echo ($order["sign_building"]); ?> </td>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["deliver_goods_time"]); ?>：</td>
                <td align="left" bgcolor="#ffffff"><?php echo ($order["best_time"]); ?></td>
            </tr><?php endif; ?>
    </table><?php endif; ?>
<div class="blank"></div>
<h5><span><?php echo ($lang["payment"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td bgcolor="#ffffff">
            <?php echo ($lang["select_payment"]); ?>: <?php echo ($order["pay_name"]); ?>。<?php echo ($lang["order_amount"]); ?>: <strong><?php echo ($order["formated_order_amount"]); ?></strong>
            <br /> <?php echo ($order["pay_desc"]); ?>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="right">
            <?php if(!empty($payment_list)): ?><form name="payment" method="post" action="user.php">
                    <?php echo ($lang["change_payment"]); ?>:
                    <select name="pay_id">
                        <?php if(is_array($payment_list)): foreach($payment_list as $key=>$payment): ?><option value="<?php echo ($payment["pay_id"]); ?>">
                                <?php echo ($payment["pay_name"]); ?>(<?php echo ($lang["pay_fee"]); ?>:<?php echo ($payment["format_pay_fee"]); ?>)
                            </option><?php endforeach; endif; ?>
                    </select>
                    <input type="hidden" name="act" value="act_edit_payment" />
                    <input type="hidden" name="order_id" value="<?php echo ($order["order_id"]); ?>" />
                    <input type="submit" name="Submit" class="submit" value="<?php echo ($lang["button_submit"]); ?>" />
                </form><?php endif; ?>
        </td>
    </tr>
</table>
<div class="blank"></div>
<h5><span><?php echo ($lang["other_info"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <?php if($order["shipping_id"] > 0): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["shipping"]); ?>：</td>
            <td colspan="3" width="85%" align="left" bgcolor="#ffffff"><?php echo ($order["shipping_name"]); ?></td>
        </tr><?php endif; ?>
    <tr>
        <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["payment"]); ?>：</td>
        <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["pay_name"]); ?></td>
    </tr>
    <?php if(!empty($order["['pack_name']"])): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["use_pack"]); ?>：</td>
            <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["pack_name"]); ?></td>
        </tr><?php endif; ?>
    <?php if(!empty($order['card_name'])): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["use_card"]); ?>：</td>
            <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["card_name"]); ?></td>
        </tr><?php endif; ?>
    <?php if(!empty($order['card_message'])): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["bless_note"]); ?>：</td>
            <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["card_message"]); ?></td>
        </tr><?php endif; ?>
    <?php if($order["integral"] > 0): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["use_integral"]); ?>：</td>
            <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["integral"]); ?></td>
        </tr><?php endif; ?>
    <?php if(!empty($order.inv_payee) && !empty($order.inv_content)): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["invoice_title"]); ?>：</td>
            <td width="36%" align="left" bgcolor="#ffffff"><?php echo ($order["inv_payee"]); ?></td>
            <td width="19%" align="right" bgcolor="#ffffff"><?php echo ($lang["invoice_content"]); ?>：</td>
            <td width="25%" align="left" bgcolor="#ffffff"><?php echo ($order["inv_content"]); ?></td>
        </tr><?php endif; ?>
    <?php if(!empty($order['postscript'])): ?><tr>
            <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["order_postscript"]); ?>：</td>
            <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["postscript"]); ?></td>
        </tr><?php endif; ?>
    <tr>
        <td width="15%" align="right" bgcolor="#ffffff"><?php echo ($lang["booking_process"]); ?>：</td>
        <td colspan="3" align="left" bgcolor="#ffffff"><?php echo ($order["how_oos_name"]); ?></td>
    </tr>
</table>

                                <!--#订单详情页面 end--><?php break;?>
                            <?php case "account_raply": ?><script type="text/javascript">
var surplus_amount_empty = "<?php echo ($lang["account_js"]["surplus_amount_empty"]); ?>";
var surplus_amount_error = "<?php echo ($lang["account_js"]["surplus_amount_error"]); ?>";
var process_desc = "<?php echo ($lang["account_js"]["process_desc"]); ?>";
var payment_empty = "<?php echo ($lang["account_js"]["payment_empty"]); ?>";
</script>
<h5><span><?php echo ($lang["user_balance"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td align="right" bgcolor="#ffffff">
            <a href="<?php echo U('User/index',array('act'=>'account_deposit'));?>" class="f6"><?php echo ($lang["surplus_type_0"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_raply'));?>" class="f6"><?php echo ($lang["surplus_type_1"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_detail'));?>" class="f6"><?php echo ($lang["add_surplus_log"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_log'));?>" class="f6"><?php echo ($lang["view_application"]); ?></a>
        </td>
    </tr>
</table>

                                <form name="formSurplus" method="post" action="user.php" onSubmit="return submitSurplus()">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="15%" bgcolor="#ffffff"><?php echo ($lang["repay_money"]); ?>:</td>
            <td bgcolor="#ffffff" align="left">
                <input type="text" name="amount" value="<?php echo ($order["amount"]); ?>" class="inputBg" size="30" />
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff"><?php echo ($lang["process_notic"]); ?>:</td>
            <td bgcolor="#ffffff" align="left">
                <textarea name="user_note" cols="55" rows="6" style="border:1px solid #ccc;"><?php echo ($order["user_note"]); ?></textarea>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" colspan="2" align="center">
                <input type="hidden" name="surplus_type" value="1" />
                <input type="hidden" name="act" value="act_account" />
                <input type="submit" name="submit" class="bnt_blue_1" value="<?php echo ($lang["submit_request"]); ?>" />
                <input type="reset" name="reset" class="bnt_blue_1" value="<?php echo ($lang["button_reset"]); ?>" />
            </td>
        </tr>
    </table>
</form>

                                <!--#会员余额 end--><?php break;?>
                            <?php case "account_log": ?><script type="text/javascript">
var surplus_amount_empty = "<?php echo ($lang["account_js"]["surplus_amount_empty"]); ?>";
var surplus_amount_error = "<?php echo ($lang["account_js"]["surplus_amount_error"]); ?>";
var process_desc = "<?php echo ($lang["account_js"]["process_desc"]); ?>";
var payment_empty = "<?php echo ($lang["account_js"]["payment_empty"]); ?>";
</script>
<h5><span><?php echo ($lang["user_balance"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td align="right" bgcolor="#ffffff">
            <a href="<?php echo U('User/index',array('act'=>'account_deposit'));?>" class="f6"><?php echo ($lang["surplus_type_0"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_raply'));?>" class="f6"><?php echo ($lang["surplus_type_1"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_detail'));?>" class="f6"><?php echo ($lang["add_surplus_log"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_log'));?>" class="f6"><?php echo ($lang["view_application"]); ?></a>
        </td>
    </tr>
</table>

                                <!--#会员余额 end--><?php break;?>
                            <?php case "account_deposit": ?><script type="text/javascript">
var surplus_amount_empty = "<?php echo ($lang["account_js"]["surplus_amount_empty"]); ?>";
var surplus_amount_error = "<?php echo ($lang["account_js"]["surplus_amount_error"]); ?>";
var process_desc = "<?php echo ($lang["account_js"]["process_desc"]); ?>";
var payment_empty = "<?php echo ($lang["account_js"]["payment_empty"]); ?>";
</script>
<h5><span><?php echo ($lang["user_balance"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td align="right" bgcolor="#ffffff">
            <a href="<?php echo U('User/index',array('act'=>'account_deposit'));?>" class="f6"><?php echo ($lang["surplus_type_0"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_raply'));?>" class="f6"><?php echo ($lang["surplus_type_1"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_detail'));?>" class="f6"><?php echo ($lang["add_surplus_log"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_log'));?>" class="f6"><?php echo ($lang["view_application"]); ?></a>
        </td>
    </tr>
</table>

                                <form name="formSurplus" method="post" action="user.php" onSubmit="return submitSurplus()">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="15%" bgcolor="#ffffff"><?php echo ($lang["deposit_money"]); ?>:</td>
            <td align="left" bgcolor="#ffffff">
                <input type="text" name="amount" class="inputBg" value="<?php echo ($order["amount"]); ?>" size="30" />
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff"><?php echo ($lang["process_notic"]); ?>:</td>
            <td align="left" bgcolor="#ffffff">
                <textarea name="user_note" cols="55" rows="6" style="border:1px solid #ccc;"><?php echo ($order["user_note"]); ?></textarea>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr align="center">
            <td bgcolor="#ffffff" colspan="3" align="left"><?php echo ($lang["payment"]); ?>:</td>
        </tr>
        <tr align="center">
            <td bgcolor="#ffffff"><?php echo ($lang["pay_name"]); ?></td>
            <td bgcolor="#ffffff" width="60%"><?php echo ($lang["pay_desc"]); ?></td>
            <td bgcolor="#ffffff" width="17%"><?php echo ($lang["pay_fee"]); ?></td>
        </tr>
        <?php if(is_array($payment)): foreach($payment as $key=>$list): ?><tr>
                <td bgcolor="#ffffff" align="left">
                    <input type="radio" name="payment_id" value="<?php echo ($list["pay_id"]); ?>" /><?php echo ($list["pay_name"]); ?></td>
                <td bgcolor="#ffffff" align="left"><?php echo ($list["pay_desc"]); ?></td>
                <td bgcolor="#ffffff" align="center"><?php echo ($list["pay_fee"]); ?></td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td bgcolor="#ffffff" colspan="3" align="center">
                <input type="hidden" name="surplus_type" value="0" />
                <input type="hidden" name="rec_id" value="<?php echo ($order["id"]); ?>" />
                <input type="hidden" name="act" value="act_account" />
                <input type="submit" class="bnt_blue_1" name="submit" value="<?php echo ($lang["submit_request"]); ?>" />
                <input type="reset" class="bnt_blue_1" name="reset" value="<?php echo ($lang["button_reset"]); ?>" />
            </td>
        </tr>
    </table>
</form>

                                <!--#会员余额 end--><?php break;?>
                            <?php case "account_detail": ?><script type="text/javascript">
var surplus_amount_empty = "<?php echo ($lang["account_js"]["surplus_amount_empty"]); ?>";
var surplus_amount_error = "<?php echo ($lang["account_js"]["surplus_amount_error"]); ?>";
var process_desc = "<?php echo ($lang["account_js"]["process_desc"]); ?>";
var payment_empty = "<?php echo ($lang["account_js"]["payment_empty"]); ?>";
</script>
<h5><span><?php echo ($lang["user_balance"]); ?></span></h5>
<div class="blank"></div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td align="right" bgcolor="#ffffff">
            <a href="<?php echo U('User/index',array('act'=>'account_deposit'));?>" class="f6"><?php echo ($lang["surplus_type_0"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_raply'));?>" class="f6"><?php echo ($lang["surplus_type_1"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_detail'));?>" class="f6"><?php echo ($lang["add_surplus_log"]); ?></a> |
            <a href="<?php echo U('User/index',array('act'=>'account_log'));?>" class="f6"><?php echo ($lang["view_application"]); ?></a>
        </td>
    </tr>
</table>

                                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr align="center">
        <td bgcolor="#ffffff"><?php echo ($lang["process_time"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["surplus_pro_type"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["money"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($lang["change_desc"]); ?></td>
    </tr>
    <?php if(is_array($account_log)): foreach($account_log as $key=>$item): ?><tr>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["change_time"]); ?></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($item["type"]); ?></td>
            <td align="right" bgcolor="#ffffff"><?php echo ($item["amount"]); ?></td>
            <td bgcolor="#ffffff" title="<?php echo ($item["change_desc"]); ?>">&nbsp;&nbsp;<?php echo ($item["short_change_desc"]); ?></td>
        </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="4" align="center" bgcolor="#ffffff">
            <div align="right"><?php echo ($lang["current_surplus"]); echo ($surplus_amount); ?></div>
        </td>
    </tr>
</table>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--翻页 start-->
<form name="selectPageForm" action="<?php echo ($smarty["server"]["PHP_SELF"]); ?>" method="get">
    <?php if($pager["styleid"] == 0): ?><div id="pager">
            <?php echo ($lang["pager_1"]); echo ($pager["record_count"]); echo ($lang["pager_2"]); echo ($lang["pager_3"]); echo ($pager["page_count"]); echo ($lang["pager_4"]); ?> <span> <a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?></a> <a href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a> <a href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a> <a href="<?php echo ($pager["page_last"]); ?>"><?php echo ($lang["page_last"]); ?></a> </span>
            <?php if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                    <?php else: ?>
                    <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
            <select name="page" id="page" onchange="selectPage(this)">
                {html_options options=$pager.array selected=$pager.page}
            </select>
        </div>
        <?php else: ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;"><?php echo ($lang["pager_1"]); ?><b><?php echo ($pager["record_count"]); ?></b> <?php echo ($lang["pager_2"]); ?></span>
            <?php if(!empty($pager["page_first"])): ?><a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?> ...</a><?php endif; ?>
            <?php if(!empty($pager["page_prev"])): ?><a class="prev" href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a><?php endif; ?>
            <?php if($pager["page_count"] != 1): if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
                        <else>
                            <a href="<?php echo ($item); ?>">[<?php echo ($key); ?>]</a><?php endif; endforeach; endif; endif; ?>
            <?php if(!empty($pager["page_next"])): ?><a class="next" href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_last"])): ?><a class="last" href="<?php echo ($pager["page_last"]); ?>">...<?php echo ($lang["page_last"]); ?></a><?php endif; ?>
            <?php if(!empty($pager["page_kbd"])): if(is_array($pager["search"])): foreach($pager["search"] as $key=>$item): if($key == 'keywords'): ?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" />
                        <?php else: ?>
                        <input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($item); ?>" /><?php endif; endforeach; endif; ?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd><?php endif; ?>
        </div>
        <!--翻页 END--><?php endif; ?>
</form>
<script type="Text/Javascript" language="JavaScript">
    function selectPage(sel) { sel.form.submit(); }
</script>


                                <!--#会员余额 end--><?php break;?>
                            <?php case "act_account": ?><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tr>
        <td width="25%" align="right" bgcolor="#ffffff"><?php echo ($lang["surplus_amount"]); ?></td>
        <td width="80%" bgcolor="#ffffff"><?php echo ($amount); ?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff"><?php echo ($lang["payment_name"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($payment["pay_name"]); ?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="#ffffff"><?php echo ($lang["payment_fee"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($pay_fee); ?></td>
    </tr>
    <tr>
        <td align="right" valign="middle" bgcolor="#ffffff"><?php echo ($lang["payment_desc"]); ?></td>
        <td bgcolor="#ffffff"><?php echo ($payment["pay_desc"]); ?></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#ffffff"><?php echo ($payment["pay_button"]); ?></td>
    </tr>
</table><?php break;?>
                            <?php case "address_list": ?><h5><span><?php echo ($lang["consignee_info"]); ?></span></h5>
<div class="blank"></div>
<script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
<script src='<?php echo (SHOP_JS_URL); ?>transport.js'></script>
<script src='<?php echo (SHOP_JS_URL); ?>region.js'></script>
<script src='<?php echo (SHOP_JS_URL); ?>shopping_flow.js'></script>
<script type="text/javascript">
region.isAdmin = false;
onload = function() {
    if (!document.all) {
        document.forms['theForm'].reset();
    }
}
</script>
<script type="text/javascript">
var consignee_not_null = "<?php echo ($lang["flow_js"]["consignee_not_null"]); ?>";
var country_not_null = "<?php echo ($lang["flow_js"]["country_not_null"]); ?>";
var province_not_null = "<?php echo ($lang["flow_js"]["province_not_null"]); ?>";
var city_not_null = "<?php echo ($lang["flow_js"]["city_not_null"]); ?>";
var district_not_null = "<?php echo ($lang["flow_js"]["district_not_null"]); ?>";
var invalid_email = "<?php echo ($lang["flow_js"]["invalid_email"]); ?>";
var address_not_null = "<?php echo ($lang["flow_js"]["address_not_null"]); ?>";
var tele_not_null = "<?php echo ($lang["flow_js"]["tele_not_null"]); ?>";
var shipping_not_null = "<?php echo ($lang["flow_js"]["shipping_not_null"]); ?>";
var payment_not_null = "<?php echo ($lang["flow_js"]["payment_not_null"]); ?>";
var goodsattr_style = "<?php echo ($lang["flow_js"]["goodsattr_style"]); ?>";
var tele_invaild = "<?php echo ($lang["flow_js"]["tele_invaild"]); ?>";
var zip_not_num = "<?php echo ($lang["flow_js"]["zip_not_num"]); ?>";
var mobile_invaild = "<?php echo ($lang["flow_js"]["mobile_invaild"]); ?>";
</script>
<?php if(is_array($consignee_list)): foreach($consignee_list as $sn=>$consignee): ?><form action="user.php" method="post" name="theForm" onsubmit="return checkConsignee(this)">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["country_province"]); ?>：</td>
                <td colspan="3" align="left" bgcolor="#ffffff">
                    <select name="country" id="selCountries_<?php echo ($sn); ?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo ($sn); ?>')">
                        <option value="0"><?php echo ($lang["please_select"]); echo ($name_of_region[0]); ?></option>
                        <?php if(is_array($country_list)): foreach($country_list as $key=>$country): if($consignee["country"] == $country.region_id): ?><option value="<?php echo ($country["region_id"]); ?>" selected>
                                    <?php echo ($country["region_name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($country["region_id"]); ?>">
                                    <?php echo ($country["region_name"]); ?></option><?php endif; endforeach; endif; ?>
                    </select>
                    <select name="province" id="selProvinces_<?php echo ($sn); ?>" onchange="region.changed(this, 2, 'selCities_<?php echo ($sn); ?>')">
                        <option value="0"><?php echo ($lang["please_select"]); echo ($name_of_region[1]); ?></option>
                        <?php if(is_array($province_list['sn'])): foreach($province_list['sn'] as $key=>$province ): if($consignee["province"] == $province["region_id"] ): ?><option value="<?php echo ($province["region_id"]); ?>" selected><?php echo ($province["region_name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($province["region_id"]); ?>">
                                    <?php echo ($province["region_name"]); ?></option><?php endif; endforeach; endif; ?>
                    </select>
                    <select name="city " id="selCities_<?php echo ($sn); ?> " onchange="region.changed(this, 3, 'selDistricts_<?php echo ($sn); ?>') ">
                        <option value="0 "><?php echo ($lang["please_select"]); echo ($name_of_region[2]); ?></option>
                        <?php if(is_array($city_list["sn "])): foreach($city_list["sn "] as $key=>$city ): if($consignee["city"] == $city.region_id): ?><option value="<?php echo ($city["region_id"]); ?> " selected>
                                    <?php echo ($city["region_name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($city["region_id"]); ?> " selected>
                                    <?php echo ($city["region_name"]); ?></option><?php endif; endforeach; endif; ?>
                    </select>
                    <?php if(!empty($district_list["sn"])): ?><select name="district " id="selDistricts_<?php echo ($sn); ?> ">
                            <option value="0 "><?php echo ($lang["please_select"]); echo ($name_of_region[3]); ?></option>
                            <?php if(is_array($district_list["sn"])): foreach($district_list["sn"] as $key=>$district ): if($consignee["district"] == $district.region_id): ?><option value="<?php echo ($district["region_id"]); ?> " selected><?php echo ($district["region_name"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($district["region_id"]); ?> "><?php echo ($district["region_name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select><?php endif; ?>
                    <?php echo ($lang["require_field"]); ?> </td>
            </tr>
            <tr>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["consignee_name"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="consignee " type="text " class="inputBg " id="consignee_<?php echo ($sn); ?> " value="<?php echo ($consignee["consignee"]); ?> " /> <?php echo ($lang["require_field"]); ?> </td>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["email_address"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="email " type="text " class="inputBg " id="email_<?php echo ($sn); ?> " value="<?php echo ($consignee["email"]); ?> " /> <?php echo ($lang["require_field"]); ?>
                </td>
            </tr>
            <tr>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["detailed_address"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="address " type="text " class="inputBg " id="address_<?php echo ($sn); ?> " value="<?php echo ($consignee["address"]); ?> " /> <?php echo ($lang["require_field"]); ?>
                </td>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["postalcode"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="zipcode " type="text " class="inputBg " id="zipcode_<?php echo ($sn); ?> " value="<?php echo ($consignee["zipcode"]); ?> " />
                </td>
            </tr>
            <tr>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["phone"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="tel " type="text " class="inputBg " id="tel_<?php echo ($sn); ?> " value="<?php echo ($consignee["tel"]); ?> " /> <?php echo ($lang["require_field"]); ?>
                </td>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["backup_phone"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="mobile " type="text " class="inputBg " id="mobile_<?php echo ($sn); ?> " value="<?php echo ($consignee["mobile"]); ?> " />
                </td>
            </tr>
            <tr>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["sign_building"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="sign_building " type="text " class="inputBg " id="sign_building_<?php echo ($sn); ?> " value="<?php echo ($consignee["sign_building"]); ?> " />
                </td>
                <td align="right " bgcolor="#ffffff "><?php echo ($lang["deliver_goods_time"]); ?>：</td>
                <td align="left " bgcolor="#ffffff ">
                    <input name="best_time " type="text " class="inputBg " id="best_time_<?php echo ($sn); ?> " value="<?php echo ($consignee["best_time"]); ?> " />
                </td>
            </tr>
            <tr>
                <td align="right " bgcolor="#ffffff ">&nbsp;</td>
                <td colspan="3 " align="center " bgcolor="#ffffff ">
                    <?php if(!empty($consignee.consignee) && !empty($consignee.email)): ?><input type="submit " name="submit " class="bnt_blue_1 " value="<?php echo ($lang["confirm_edit"]); ?> " />
                        <input name="button " type="button " class="bnt_blue " onclick="if (confirm( '<?php echo ($lang["confirm_drop_address"]); ?>'))location.href='user.php?act=drop_consignee&id=<?php echo ($consignee["address_id"]); ?>' " value="<?php echo ($lang["drop"]); ?> " />
                        <else>
                            <input type="submit " name="submit " class="bnt_blue_2 " value="<?php echo ($lang["add_address"]); ?> " /><?php endif; ?>
                    <input type="hidden " name="act " value="act_edit_address " />
                    <input name="address_id " type="hidden " value="<?php echo ($consignee["address_id"]); ?> " />
                </td>
            </tr>
        </table>
    </form><?php endforeach; endif; ?>
                                <!--#收货地址页面 end--><?php break;?>
                            <?php case "transform_points": ?><h5><span><?php echo ($lang["transform_points"]); ?></span></h5>
<div class="blank"></div>
<?php if($exchange_type == 'ucenter'): ?><form action="user.php" method="post" name="transForm" onsubmit="return calcredit();">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <th width="120" bgcolor="#FFFFFF" align="right" valign="top"><?php echo ($lang["cur_points"]); ?>:</th>
                <td bgcolor="#FFFFFF">
                    <label for="pay_points"><?php echo ($lang["exchange_points"]["1"]); ?>:</label>
                    <input type="text" size="15" id="pay_points" name="pay_points" value="<?php echo ($shop_points["pay_points"]); ?>" style="border:0;border-bottom:1px solid #DADADA;" readonly="readonly" />
                    <br />
                    <div class="blank"></div>
                    <label for="rank_points"><?php echo ($lang["exchange_points"]["0"]); ?>:</label>
                    <input type="text" size="15" id="rank_points" name="rank_points" value="<?php echo ($shop_points["rank_points"]); ?>" style="border:0;border-bottom:1px solid #DADADA;" readonly="readonly" />
                </td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <th align="right" bgcolor="#FFFFFF">
                    <label for="amount"><?php echo ($lang["exchange_amount"]); ?>:</label>
                </th>
                <td bgcolor="#FFFFFF">
                    <input size="15" name="amount" id="amount" value="0" onkeyup="calcredit();" type="text" />
                    <select name="fromcredits" id="fromcredits" onchange="calcredit();">
                        {html_options options=$lang.exchange_points selected=$selected_org}
                    </select>
                </td>
            </tr>
            <tr>
                <th align="right" bgcolor="#FFFFFF">
                    <label for="desamount"><?php echo ($lang["exchange_desamount"]); ?>:</label>
                </th>
                <td bgcolor="#FFFFFF">
                    <input type="text" name="desamount" id="desamount" disabled="disabled" value="0" size="15" />
                    <select name="tocredits" id="tocredits" onchange="calcredit();">
                        {html_options options=$to_credits_options selected=$selected_dst}
                    </select>
                </td>
            </tr>
            <tr>
                <th align="right" bgcolor="#FFFFFF"><?php echo ($lang["exchange_ratio"]); ?>:</th>
                <td bgcolor="#FFFFFF">1 <span id="orgcreditunit"><?php echo ($orgcreditunit); ?></span> <span id="orgcredittitle"><?php echo ($orgcredittitle); ?></span> <?php echo ($lang["exchange_action"]); ?> <span id="descreditamount"><?php echo ($descreditamount); ?></span> <span id="descreditunit"><?php echo ($descreditunit); ?></span> <span id="descredittitle"><?php echo ($descredittitle); ?></span></td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF">
                    <input type="hidden" name="act" value="act_transform_ucenter_points" />
                    <input type="submit" name="transfrom" value="<?php echo ($lang["transform"]); ?>" />
                </td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
var deny = "<?php echo ($lang["exchange_js"]["deny"]); ?>";
var balance = "<?php echo ($lang["exchange_js"]["balance"]); ?>";
</script>
    <!--  <script type="text/javascript">
        var out_exchange_allow = new Array(); {
            foreach from = $out_exchange_allow item = ratio key = key
        }
        out_exchange_allow['<?php echo ($key); ?>'] = '<?php echo ($ratio); ?>'; {
            /foreach}

            function calcredit() {
                var frm = document.forms['transForm'];
                var src_credit = frm.fromcredits.value;
                var dest_credit = frm.tocredits.value;
                var in_credit = frm.amount.value;
                var org_title = frm.fromcredits[frm.fromcredits.selectedIndex].innerHTML;
                var dst_title = frm.tocredits[frm.tocredits.selectedIndex].innerHTML;
                var radio = 0;
                var shop_points = ['rank_points', 'pay_points'];
                if (parseFloat(in_credit) > parseFloat(document.getElementById(shop_points[src_credit]).value)) {
                    alert(balance.replace('{%s}', org_title));
                    frm.amount.value = frm.desamount.value = 0;
                    return false;
                }
                if (typeof(out_exchange_allow[dest_credit + '|' + src_credit]) == 'string') {
                    radio = (1 / parseFloat(out_exchange_allow[dest_credit + '|' + src_credit])).toFixed(2);
                }
                document.getElementById('orgcredittitle').innerHTML = org_title;
                document.getElementById('descreditamount').innerHTML = radio;
                document.getElementById('descredittitle').innerHTML = dst_title;
                if (in_credit > 0) {
                    if (typeof(out_exchange_allow[dest_credit + '|' + src_credit]) == 'string') {
                        frm.desamount.value = Math.floor(parseFloat(in_credit) / parseFloat(out_exchange_allow[dest_credit + '|' + src_credit]));
                        frm.transfrom.disabled = false;
                        return true;
                    } else {
                        frm.desamount.value = deny;
                        frm.transfrom.disabled = true;
                        return false;
                    }
                } else {
                    return false;
                }
            }
    </script> -->
    <?php else: ?>
    <b><?php echo ($lang["cur_points"]); ?>:</b>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="30%" valign="top" bgcolor="#FFFFFF">
                <table border="0">
                    <?php if(is_array($bbs_points)): foreach($bbs_points as $key=>$points): ?><tr>
                            <th><?php echo ($points["title"]); ?>:</th>
                            <td width="120" style="border-bottom:1px solid #DADADA;"><?php echo ($points["value"]); ?></td>
                        </tr><?php endforeach; endif; ?>
                </table>
            </td>
            <td width="50%" valign="top" bgcolor="#FFFFFF">
                <table>
                    <tr>
                        <th><?php echo ($lang["pay_points"]); ?>:</th>
                        <td width="120" style="border-bottom:1px solid #DADADA;"><?php echo ($shop_points["pay_points"]); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo ($lang["rank_points"]); ?>:</th>
                        <td width="120" style="border-bottom:1px solid #DADADA;"><?php echo ($shop_points["rank_points"]); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br />
    <b><?php echo ($lang["rule_list"]); ?>:</b>
    <ul class="point clearfix">
        <?php if(is_array($rule_list)): foreach($rule_list as $key=>$rule): ?><li>
                <font class="f1">·</font>"<?php echo ($rule["from"]); ?>" <?php echo ($lang["transform"]); ?> "<?php echo ($rule["to"]); ?>" <?php echo ($lang["rate_is"]); ?> <?php echo ($rule["rate"]); ?>
            </li><?php endforeach; endif; ?>
    </ul>
    <form action="user.php" method="post" name="theForm">
        <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" style="border-collapse:collapse;border:1px solid #DADADA;">
            <tr style="background:#F1F1F1;">
                <th><?php echo ($lang["rule"]); ?></th>
                <th><?php echo ($lang["transform_num"]); ?></th>
                <th><?php echo ($lang["transform_result"]); ?></th>
            </tr>
            <tr>
                <td>
                    <select name="rule_index" onchange="changeRule()">
                        <?php if(is_array($rule_list)): foreach($rule_list as $key=>$rule): ?><option value="<?php echo ($key); ?>"><?php echo ($rule["from"]); ?>-><?php echo ($rule["to"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="num" value="0" onkeyup="calPoints()" />
                </td>
                <td><span id="ECS_RESULT">0</span></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="hidden" name="act" value="act_transform_points" />
                    <input type="submit" value="<?php echo ($lang["transform"]); ?>" />
                </td>
            </tr>
        </table>
    </form>
   <!-- <script type="text/javascript">
//<![CDATA[
var rule_list = new Object();
var invalid_input = '<?php echo ($lang["invalid_input"]); ?>'; {
    foreach from = $rule_list item = rule key = key
}
rule_list['<?php echo ($key); ?>'] = '<?php echo ($rule["rate"]); ?>'; {
    /foreach}

    function calPoints() {
        var frm = document.forms['theForm'];
        var rule_index = frm.elements['rule_index'].value;
        var num = parseInt(frm.elements['num'].value);
        var rate = rule_list[rule_index];

        if (isNaN(num) || num < 0 || num != frm.elements['num'].value) {
            document.getElementById('ECS_RESULT').innerHTML = invalid_input;
            rerutn;
        }
        var arr = rate.split(':');
        var from = parseInt(arr[0]);
        var to = parseInt(arr[1]);

        if (from <= 0 || to <= 0) {
            from = 1;
            to = 0;
        }
        document.getElementById('ECS_RESULT').innerHTML = parseInt(num * to / from);
    }

    function changeRule() {
        document.forms['theForm'].elements['num'].value = 0;
        document.getElementById('ECS_RESULT').innerHTML = 0;
    }
    //]]>
</script>
 --><?php endif; ?>

                                <!--#积分兑换 end--><?php break;?>
                            <?php default: endswitch;?>
                    </div>
                </div>
            </div>
        </div>
        <!--right end-->
    </div>
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
var msg_title_empty = "<?php echo ($lang["clips_js"]["msg_title_empty"]); ?>";
var msg_content_empty = "<?php echo ($lang["clips_js"]["msg_content_empty"]); ?>";
var describe_empty = "<?php echo ($lang["clips_js"]["describe_empty"]); ?>";
</script>

</html>