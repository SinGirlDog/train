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

    <link rel="alternate" type="application/rss+xml" title="RSS|<?php echo ($page_title); ?>" href="<?php echo ($feed_url); ?>" />
    <script src='<?php echo (SHOP_JS_URL); ?>common.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>user.js'></script>
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
            <?php case "account_deposit": ?><img src="<?php echo (SHOP_IMG_URL); ?>u13.gif" /> <?php echo ($lang["label_user_surplus"]); break;?>
            <?php case "account_repay": ?><img src="<?php echo (SHOP_IMG_URL); ?>u13.gif" /> <?php echo ($lang["label_user_surplus"]); break;?>
            <?php case "account_detail": ?><img src="<?php echo (SHOP_IMG_URL); ?>u13.gif" /> <?php echo ($lang["label_user_surplus"]); break;?>
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
                        <?php switch($action): case "default": ?><!-- *用户中心默认显示页面 start-->
                                <font class="f5">
    <b class="f4"><?php echo ($info["username"]); ?></b> <?php echo ($lang["welcome_to"]); ?> <?php echo ($info["shop_name"]); ?>！
</font>
<br />
<div class="blank"></div>
<?php echo ($lang["last_time"]); ?>: <?php echo ($info["last_time"]); ?>
<br />
<div class="blank5"></div>
<?php echo ($rank_name); ?> <?php echo ($next_rank_name); ?>
<br />
<div class="blank5"></div>
<?php if($info["is_validate"] == 0): echo ($lang["not_validated"]); ?> <a href="javascript:sendHashMail()" style="color:#006bd0;"><?php echo ($lang["resend_hash_mail"]); ?></a>
    <br /><?php endif; ?>
<div style="margin:5px 0; border:1px solid #a1675a;padding:10px 20px; background-color:#e8d1c9;">
    <img src="<?php echo (SHOP_IMG_URL); ?>note.gif" alt="note" />&nbsp;<?php echo ($user_notice); ?>
</div>
<br />
<br />
<div class="f_l" style="width:350px;">
    <h5><span><?php echo ($lang["your_account"]); ?></span></h5>
    <div class="blank"></div>
    <?php echo ($lang["your_surplus"]); ?>:<a href="<?php echo U('User/index',array('act'=>'account_log'));?>" style="color:#006bd0;"><?php echo ($info["surplus"]); ?></a>
    <br />
    <?php if($info["credit_line"] > 0): echo ($lang["credit_line"]); ?>:<?php echo ($info["formated_credit_line"]); ?>
        <br /><?php endif; ?>
    <?php echo ($lang["your_bonus"]); ?>:<a href="<?php echo U('User/index',array('act'=>'bonus'));?>" style="color:#006bd0;"><?php echo ($info["bonus"]); ?></a>
    <br /> <?php echo ($lang["your_integral"]); ?>:<?php echo ($info["integral"]); ?>
    <br />
</div>
<div class="f_r" style="width:350px;">
    <h5><span><?php echo ($lang["your_notice"]); ?></span></h5>
    <div class="blank"></div>
    <?php if(is_array($prompt)): foreach($prompt as $key=>$item): echo ($item["text"]); ?>
        <br /><?php endforeach; endif; ?>
    <?php echo ($lang["last_month_order"]); echo ($info["order_count"]); echo ($lang["order_unit"]); ?>
    <br />
    <?php if(!empty($info['shipped_order'])): echo ($lang["please_received"]); ?>
        <br />
        <?php if(is_array($info['shipped_order'])): foreach($info['shipped_order'] as $key=>$item): ?><a href="<?php echo U('User/index',array('act'=>'order_detail','order_id'=>$item.order_id));?>" style="color:#006bd0;"><?php echo ($item["order_sn"]); ?></a><?php endforeach; endif; endif; ?>
</div><?php break;?>
                            <?php case "message_list": ?><!-- *我的留言 start-->
                                <?php if($action == 'message_list'): ?><h5><span><?php echo ($lang["label_message"]); ?></span></h5>
    <div class="blank"></div>
    <?php if(is_array($message_list)): foreach($message_list as $key=>$message): ?><div class="f_l">
            <b><?php echo ($message["msg_type"]); ?>:</b>&nbsp;&nbsp;
            <font class="f4"><?php echo ($message["msg_title"]); ?></font> (<?php echo ($message["msg_time"]); ?>)
        </div>
        <div class="f_r">
            <a href="user.php?act=del_msg&amp;id=<?php echo ($key); ?>&amp;order_id=<?php echo ($message["order_id"]); ?>" title="<?php echo ($lang["drop"]); ?>" onclick="if (!confirm('<?php echo ($lang["confirm_remove_msg"]); ?>')) return false;" class="f6"><?php echo ($lang["drop"]); ?></a>
        </div>
        <div class="msgBottomBorder">
            <?php echo ($message["msg_content"]); ?>
            <?php if(!empty($message["message_img"])): ?><div align="right">
                    <a href="data/feedbackimg/<?php echo ($message["message_img"]); ?>" target="_bank" class="f6"><?php echo ($lang["view_upload_file"]); ?></a>
                </div><?php endif; ?>
            <br />
            <?php if(!empty($message["re_msg_content"])): ?><a href="mailto:<?php echo ($message["re_user_email"]); ?>" class="f6"><?php echo ($lang["shopman_reply"]); ?></a> (<?php echo ($message["re_msg_time"]); ?>)
                <br /> <?php echo ($message["re_msg_content"]); endif; ?>
        </div><?php endforeach; endif; ?>
    <?php if(!empty($message_list)): ?><div class="f_r">            
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
            <if condition="$pager.page_count neq 1">
                <?php if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
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

        </div><?php endif; ?>
    <div class="blank"></div>
    <form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
        <table width="100%" border="0" cellpadding="3">
            <?php if(!empty($order_info)): ?><tr>
                    <td align="right"><?php echo ($lang["order_number"]); ?></td>
                    <td>
                        <a href="<?php echo ($order_info["url"]); ?>"><img src="images/note.gif" /><?php echo ($order_info["order_sn"]); ?></a>
                        <input name="msg_type" type="hidden" value="5" />
                        <input name="order_id" type="hidden" value="<?php echo ($order_info["order_id"]); ?>" class="inputBg" />
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                    <td align="right"><?php echo ($lang["message_type"]); ?>：</td>
                    <td>
                        <input name="msg_type" type="radio" value="0" checked="checked" /> <?php echo ($lang["type[0]"]); ?>
                        <input type="radio" name="msg_type" value="1" /> <?php echo ($lang["type[1]"]); ?>
                        <input type="radio" name="msg_type" value="2" /> <?php echo ($lang["type[2]"]); ?>
                        <input type="radio" name="msg_type" value="3" /> <?php echo ($lang["type[3]"]); ?>
                        <input type="radio" name="msg_type" value="4" /> <?php echo ($lang["type[4]"]); ?> </td>
                </tr><?php endif; ?>
            <tr>
                <td align="right"><?php echo ($lang["message_title"]); ?>：</td>
                <td>
                    <input name="msg_title" type="text" size="30" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" valign="top"><?php echo ($lang["message_content"]); ?>：</td>
                <td>
                    <textarea name="msg_content" cols="50" rows="4" wrap="virtual" class="B_blue"></textarea>
                </td>
            </tr>
            <tr>
                <td align="right"><?php echo ($lang["upload_img"]); ?>：</td>
                <td>
                    <input type="file" name="message_img" size="45" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="hidden" name="act" value="act_add_message" />
                    <input type="submit" value="<?php echo ($lang["submit"]); ?>" class="bnt_bonus" />
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <?php echo ($lang["img_type_tips"]); ?>
                    <br /> <?php echo ($lang["img_type_list"]); ?>
                </td>
            </tr>
        </table>
    </form>
</if><?php break;?>
                            <?php case "comment_list": ?><!-- *我的评论 start-->
                                <?php if($action == 'comment_list'): ?><h5><span><?php echo ($lang["label_comment"]); ?></span></h5>
    <div class="blank"></div>
    <?php if(is_array($comment_list)): foreach($comment_list as $key=>$comment): ?><div class="f_l">
            <?php if($comment["comment_type"] == '0'): ?><b><?php echo ($lang["goods_comment"]); ?>: </b>
                <?php else: ?>
                <b><?php echo ($lang["article_comment"]); ?>: </b><?php endif; ?>
            <font class="f4"><?php echo ($comment["cmt_name"]); ?></font>&nbsp;&nbsp;(<?php echo ($comment["formated_add_time"]); ?>)
        </div>
        <div class="f_r">
            <a href="user.php?act=del_cmt&amp;id=<?php echo ($comment["comment_id"]); ?>" title="<?php echo ($lang["drop"]); ?>" onclick="if (!confirm('<?php echo ($lang["confirm_remove_msg"]); ?>')) return false;" class="f6"><?php echo ($lang["drop"]); ?></a>
        </div>
        <div class="msgBottomBorder">
            <?php echo ($comment["content"]); ?>
            <br />
            <?php if(!empty($comment["reply_content"])): ?><b><?php echo ($lang["reply_comment"]); ?>：</b>
                <br/> <?php echo ($comment["reply_content"]); endif; ?>
        </div><?php endforeach; endif; ?>
    <?php if(!empty($comment_list)): ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <if condition="$pager.page_count neq 1">
                <?php if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
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

        <?php else: ?> <?php echo ($lang["no_comments"]); endif; ?>
</if><?php break;?>
                            <?php case "tag_list": ?><!-- *我的标签 start-->
                                <?php if($action == 'tag_list'): ?><h5><span><?php echo ($lang["label_tag"]); ?></span></h5>
    <div class="blank"></div>
    <?php if(!empty($tags)): if(is_array($tags)): foreach($tags as $key=>$tag): ?><a href="search.php?keywords=<?php echo ($tag["tag_words"]); ?>" class="f6"><?php echo ($tag["tag_words"]); ?></a>
            <a href="user.php?act=act_del_tag&amp;tag_words=<?php echo ($tag["tag_words"]); ?>" onclick="if (!confirm('<?php echo ($lang["confirm_drop_tag"]); ?>')) return false;" title="<?php echo ($lang["drop"]); ?>"><img src="images/drop.gif" alt="<?php echo ($lang["drop"]); ?>" /></a>&nbsp;&nbsp;<?php endforeach; endif; ?>
        <else>
            <span style="margin:2px 10px; font-size:14px; line-height:36px;"><?php echo ($lang["no_tag"]); ?></span><?php endif; endif; break;?>
                            <?php case "collection_list": ?><!-- *收藏商品列表页面 start-->
                                <?php if($action == 'collection_list'): ?><script src='<?php echo (SHOP_JS_URL); ?>transport.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
    <h5><span><?php echo ($lang["label_collection"]); ?></span></h5>
    <div class="blank"></div>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr align="center">
            <th width="35%" bgcolor="#ffffff"><?php echo ($lang["goods_name"]); ?></th>
            <th width="30%" bgcolor="#ffffff"><?php echo ($lang["price"]); ?></th>
            <th width="35%" bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></th>
        </tr>
        <?php if(is_array($goods_list)): foreach($goods_list as $key=>$goods): ?><tr>
                <td bgcolor="#ffffff"><a href="<?php echo ($goods["url"]); ?>" class="f6"><?php echo ($goods["goods_name"]); ?></a></td>
                <td bgcolor="#ffffff">
                    <?php if($goods["promote_price"] != '' ): echo ($lang["promote_price"]); ?><span class="goods-price"><?php echo ($goods["promote_price"]); ?></span>
                        <else>
                            <?php echo ($lang["shop_price"]); ?><span class="goods-price"><?php echo ($goods["shop_price"]); ?></span><?php endif; ?>
                </td>
                <td align="center" bgcolor="#ffffff">
                    <?php if(!empty($goods["is_attention"])): ?><a href="javascript:if (confirm('<?php echo ($lang["del_attention"]); ?>')) location.href='user.php?act=del_attention&rec_id=<?php echo ($goods["rec_id"]); ?>'" class="f6"><?php echo ($lang["no_attention"]); ?></a>
                        <?php else: ?>
                        <a href="javascript:if (confirm('<?php echo ($lang["add_to_attention"]); ?>')) location.href='user.php?act=add_to_attention&rec_id=<?php echo ($goods["rec_id"]); ?>'" class="f6"><?php echo ($lang["attention"]); ?></a><?php endif; ?>
                    <a href="javascript:addToCart(<?php echo ($goods["goods_id"]); ?>)" class="f6"><?php echo ($lang["add_to_cart"]); ?></a> <a href="javascript:if (confirm('<?php echo ($lang["remove_collection_confirm"]); ?>')) location.href='user.php?act=delete_collection&collection_id=<?php echo ($goods["rec_id"]); ?>'" class="f6"><?php echo ($lang["drop"]); ?></a>
                </td>
            </tr><?php endforeach; endif; ?>
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
            <if condition="$pager.page_count neq 1">
                <?php if(is_array($pager["page_number"])): foreach($pager["page_number"] as $key=>$item): if($pager["page"] == $key): ?><span class="page_now"><?php echo ($key); ?></span>
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
    <h5><span><?php echo ($lang["label_affiliate"]); ?></span></h5>
    <div class="blank"></div>
    <form name="theForm" method="post" action="">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["label_need_image"]); ?></td>
                <td bgcolor="#ffffff">
                    <select name="need_image" id="need_image" class="inputBg">
                        <option value="true" selected><?php echo ($lang["need"]); ?></option>
                        <option value="false"><?php echo ($lang["need_not"]); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["label_goods_num"]); ?></td>
                <td bgcolor="#ffffff">
                    <input name="goods_num" type="text" id="goods_num" value="6" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["label_arrange"]); ?></td>
                <td bgcolor="#ffffff">
                    <select name="arrange" id="arrange" class="inputBg">
                        <option value="h" selected><?php echo ($lang["horizontal"]); ?></option>
                        <option value="v"><?php echo ($lang["verticle"]); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["label_rows_num"]); ?></td>
                <td bgcolor="#ffffff">
                    <input name="rows_num" type="text" id="rows_num" value="1" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["label_charset"]); ?></td>
                <td bgcolor="#ffffff">
                    <select name="charset" id="charset">
                        {html_options options=$lang_list}
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" bgcolor="#ffffff">
                    <input type="button" name="gen_code" value="<?php echo ($lang["generate"]); ?>" onclick="genCode()" class="bnt_blue_1" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" bgcolor="#ffffff">
                    <textarea name="code" cols="80" rows="5" id="code" class="B_blue"></textarea>
                </td>
            </tr>
        </table>
    </form>
    <script language="JavaScript">
    var elements = document.forms['theForm'].elements;
    var url = '<?php echo ($url); ?>';
    var u = '<?php echo ($user_id); ?>';
    /**
     * 生成代码
     */
    function genCode() {
        // 检查输入
        if (isNaN(parseInt(elements['goods_num'].value))) {
            alert('<?php echo ($lang["goods_num_must_be_int"]); ?>');
            return;
        }
        if (elements['goods_num'].value < 1) {
            alert('<?php echo ($lang["goods_num_must_over_0"]); ?>');
            return;
        }
        if (isNaN(parseInt(elements['rows_num'].value))) {
            alert('<?php echo ($lang["rows_num_must_be_int"]); ?>');
            return;
        }
        if (elements['rows_num'].value < 1) {
            alert('<?php echo ($lang["rows_num_must_over_0"]); ?>');
            return;
        }

        // 生成代码
        var code = '\<script src=\"' + url + 'goods_script.php?';
        code += 'need_image=' + elements['need_image'].value + '&';
        code += 'goods_num=' + elements['goods_num'].value + '&';
        code += 'arrange=' + elements['arrange'].value + '&';
        code += 'rows_num=' + elements['rows_num'].value + '&';
        code += 'charset=' + elements['charset'].value + '&u=' + u;
        code += '\"\>\</script\>';
        elements['code'].value = code;
        elements['code'].select();
        if (Browser.isIE) {
            window.clipboardData.setData("Text", code);
        }
    }
    var compare_no_goods = "<?php echo ($lang["compare_no_goods"]); ?>";
    var btn_buy = "<?php echo ($lang["btn_buy"]); ?>";
    var is_cancel = "<?php echo ($lang["is_cancel"]); ?>";
    var select_spe = "<?php echo ($lang["select_spe"]); ?>";
    </script>
</if><?php break;?>
                            <?php case "booking_list": ?><!-- *缺货登记列表页面 start-->
                                <?php if($action == 'booking_list'): ?><h5><span><?php echo ($lang["label_booking"]); ?></span></h5>
    <div class="blank"></div>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr align="center">
            <td width="20%" bgcolor="#ffffff"><?php echo ($lang["booking_goods_name"]); ?></td>
            <td width="10%" bgcolor="#ffffff"><?php echo ($lang["booking_amount"]); ?></td>
            <td width="20%" bgcolor="#ffffff"><?php echo ($lang["booking_time"]); ?></td>
            <td width="35%" bgcolor="#ffffff"><?php echo ($lang["process_desc"]); ?></td>
            <td width="15%" bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></td>
        </tr>
        <?php if(is_array($booking_list)): foreach($booking_list as $key=>$item): ?><tr>
                <td align="left" bgcolor="#ffffff"><a href="<?php echo ($item["url"]); ?>" target="_blank" class="f6"><?php echo ($item["goods_name"]); ?></a></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($item["goods_number"]); ?></td>
                <td align="center" bgcolor="#ffffff"><?php echo ($item["booking_time"]); ?></td>
                <td align="left" bgcolor="#ffffff"><?php echo ($item["dispose_note"]); ?></td>
                <td align="center" bgcolor="#ffffff"><a href="javascript:if (confirm('<?php echo ($lang["confirm_remove_account"]); ?>')) location.href='user.php?act=act_del_booking&id=<?php echo ($item["rec_id"]); ?>'" class="f6"><?php echo ($lang["drop"]); ?></a> </td>
            </tr><?php endforeach; endif; ?>
    </table><?php endif; ?>
<div class="blank5 "></div><?php break;?>
                            <?php case "add_booking": if($action == 'add_booking'): ?><script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
    <script type="text/javascript">
var booking_amount_empty = "<?php echo ($lang["booking_js"]["booking_amount_empty"]); ?>";
var booking_amount_error = "<?php echo ($lang["booking_js"]["booking_amount_error"]); ?>";
var describe_empty = "<?php echo ($lang["booking_js"]["describe_empty"]); ?>";
var contact_username_empty = "<?php echo ($lang["booking_js"]["contact_username_empty"]); ?>";
var email_empty = "<?php echo ($lang["booking_js"]["email_empty"]); ?>";
var email_erroremail_error = "<?php echo ($lang["booking_js"]["email_error"]); ?>";
var contact_phone_empty = "<?php echo ($lang["booking_js"]["contact_phone_empty"]); ?>";
</script>
    <h5><span><?php echo ($lang["add"]); echo ($lang["label_booking"]); ?></span></h5>
    <div class="blank"></div>
    <form action="user.php" method="post" name="formBooking" onsubmit="return addBooking();">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["booking_goods_name"]); ?></td>
                <td bgcolor="#ffffff"><?php echo ($info["goods_name"]); ?></td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["booking_amount"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="number" type="text" value="<?php echo ($info["goods_number"]); ?>" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["describe"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <textarea name="desc" cols="50" rows="5" wrap="virtual" class="B_blue"><?php echo ($goods_attr); echo ($info["goods_desc"]); ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["contact_username"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="linkman" type="text" value="<?php echo ($info["consignee"]); ?>" size="25" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["email_address"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="email" type="text" value="<?php echo ($info["email"]); ?>" size="25" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff"><?php echo ($lang["contact_phone"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="tel" type="text" value="<?php echo ($info["tel"]); ?>" size="25" class="inputBg" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#ffffff">&nbsp;</td>
                <td bgcolor="#ffffff">
                    <input name="act" type="hidden" value="act_add_booking" />
                    <input name="id" type="hidden" value="<?php echo ($info["id"]); ?>" />
                    <input name="rec_id" type="hidden" value="<?php echo ($info["rec_id"]); ?>" />
                    <input type="submit" name="submit" class="submit" value="<?php echo ($lang["submit_booking_goods"]); ?>" />
                    <input type="reset" name="reset" class="reset" value="<?php echo ($lang["button_reset"]); ?>" />
                </td>
            </tr>
        </table>
    </form><?php endif; break;?>
                            <?php case "affiliate": ?><!-- *我的推荐 start-->
                                <?php if($affiliate["on"] == 1): if($action == 'affiliate'): ?><if condition="!empty($goodsid) || ($goodsid eq 0)">
            <h5><span><?php echo ($lang["affiliate_detail"]); ?></span></h5>
            <div class="blank"></div>
            <?php echo ($affiliate_intro); ?>
            <if condition="$affiliate.config.separate_by eq 0">
                <!-- 下线人数、分成 -->
                <div class="blank"></div>
                <h5><span><a name="myrecommend"><?php echo ($lang["affiliate_member"]); ?></a></span></h5>
                <div class="blank"></div>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                    <tr align="center">
                        <td bgcolor="#ffffff"><?php echo ($lang["affiliate_lever"]); ?></td>
                        <td bgcolor="#ffffff"><?php echo ($lang["affiliate_num"]); ?></td>
                        <td bgcolor="#ffffff"><?php echo ($lang["level_point"]); ?></td>
                        <td bgcolor="#ffffff"><?php echo ($lang["level_money"]); ?></td>
                    </tr>
                    <?php if(is_array($affdb)): foreach($affdb as $level=>$val): ?><tr align="center">
                            <td bgcolor="#ffffff"><?php echo ($level); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($val["num"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($val["point"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($val["money"]); ?></td>
                        </tr><?php endforeach; endif; ?>
                </table>
                <!-- /下线人数、分成 -->
                <?php else: ?>
                <!-- 介绍订单数、分成 -->
                <!-- /介绍订单数、分成 --><?php endif; ?>
            <!-- 我的推荐清单 -->
            <div class="blank"></div>
            <h5><span>分成规则</span></h5>
            <div class="blank"></div>
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tr align="center">
                    <td bgcolor="#ffffff"><?php echo ($lang["order_number"]); ?></td>
                    <td bgcolor="#ffffff"><?php echo ($lang["affiliate_money"]); ?></td>
                    <td bgcolor="#ffffff"><?php echo ($lang["affiliate_point"]); ?></td>
                    <td bgcolor="#ffffff"><?php echo ($lang["affiliate_mode"]); ?></td>
                    <td bgcolor="#ffffff"><?php echo ($lang["affiliate_status"]); ?></td>
                </tr>
                <?php if(!empty($logdb)): if(is_array($logdb)): foreach($logdb as $key=>$val): ?><tr align="center">
                            <td bgcolor="#ffffff"><?php echo ($val["order_sn"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($val["money"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($val["point"]); ?></td>
                            <td bgcolor="#ffffff">
                                <?php if(($val["separate_type"] == 1) || ($val["separate_type"] === 0)): echo ($lang["affiliate_type"]["$val"]["separate_type"]); ?>
                                    <?php else: ?> <?php echo ($lang["affiliate_type"]["$affiliate_type"]); endif; ?>
                            </td>
                            <td bgcolor="#ffffff"><?php echo ($lang["affiliate_stats[$val"]["is_separate]"]); ?></td>
                        </tr><?php endforeach; endif; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5" align="center" bgcolor="#ffffff"><?php echo ($lang["no_records"]); ?></td>
                    </tr><?php endif; ?>
                <?php if(!empty($logdb)): ?><tr>
                        <td colspan="5" bgcolor="#ffffff">
                            <form action="<?php echo ($smarty["server"]["PHP_SELF"]); ?>" method="get">
                                <div id="pager"> <?php echo ($lang["pager_1"]); echo ($pager["record_count"]); echo ($lang["pager_2"]); echo ($lang["pager_3"]); echo ($pager["page_count"]); echo ($lang["pager_4"]); ?> <span> <a href="<?php echo ($pager["page_first"]); ?>"><?php echo ($lang["page_first"]); ?></a> <a href="<?php echo ($pager["page_prev"]); ?>"><?php echo ($lang["page_prev"]); ?></a> <a href="<?php echo ($pager["page_next"]); ?>"><?php echo ($lang["page_next"]); ?></a> <a href="<?php echo ($pager["page_last"]); ?>"><?php echo ($lang["page_last"]); ?></a> </span>
                                    <select name="page" id="page" onchange="selectPage(this)">
                                        {html_options options=$pager.array selected=$pager.page}
                                    </select>
                                    <input type="hidden" name="act" value="affiliate" />
                                </div>
                            </form>
                        </td>
                    </tr><?php endif; ?>
            </table>
            <script type="text/javascript" language="JavaScript">
            function selectPage(sel) {
                sel.form.submit();
            }
            </script>
            <!-- /我的推荐清单 -->
            <div class="blank"></div>
            <h5><span><?php echo ($lang["affiliate_code"]); ?></span></h5>
            <div class="blank"></div>
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tr>
                    <td width="30%" bgcolor="#ffffff"><a href="<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>" target="_blank" class="f6"><?php echo ($shopname); ?></a></td>
                    <td bgcolor="#ffffff">
                        <input size="40" onclick="this.select();" type="text" value="&lt;a href=&quot;<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>&quot; target=&quot;_blank&quot;&gt;<?php echo ($shopname); ?>&lt;/a&gt;" style="border:1px solid #ccc;" /> <?php echo ($lang["recommend_webcode"]); ?></td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <a href="<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>" target="_blank" title="<?php echo ($shopname); ?>" class="f6"><img src="<?php echo ($shopurl); echo ($logosrc); ?>" /></a>
                    </td>
                    <td bgcolor="#ffffff">
                        <input size="40" onclick="this.select();" type="text" value="&lt;a href=&quot;<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>&quot; target=&quot;_blank&quot; title=&quot;<?php echo ($shopname); ?>&quot;&gt;&lt;img src=&quot;<?php echo ($shopurl); echo ($logosrc); ?>&quot; /&gt;&lt;/a&gt;" style="border:1px solid #ccc;" /> <?php echo ($lang["recommend_webcode"]); ?></td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff"><a href="<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>" target="_blank" class="f6"><?php echo ($shopname); ?></a></td>
                    <td bgcolor="#ffffff">
                        <input size="40" onclick="this.select();" type="text" value="[url=<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>]<?php echo ($shopname); ?>[/url]" style="border:1px solid #ccc;" /> <?php echo ($lang["recommend_bbscode"]); ?></td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <a href="<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>" target="_blank" title="<?php echo ($shopname); ?>" class="f6"><img src="<?php echo ($shopurl); echo ($logosrc); ?>" /></a>
                    </td>
                    <td bgcolor="#ffffff">
                        <input size="40" onclick="this.select();" type="text" value="[url=<?php echo ($shopurl); ?>?u=<?php echo ($userid); ?>][img]<?php echo ($shopurl); echo ($logosrc); ?>[/img][/url]" style="border:1px solid #ccc;" /> <?php echo ($lang["recommend_bbscode"]); ?></td>
                </tr>
            </table>
            <?php else: ?>
            <!-- 单个商品推荐 -->
            <style type="text/css">
            .types a {
                text-decoration: none;
                color: #006bd0;
            }
            </style>
            <h5><span><?php echo ($lang["affiliate_code"]); ?></span></h5>
            <div class="blank"></div>
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                <tr align="center">
                    <td bgcolor="#ffffff"><?php echo ($lang["affiliate_view"]); ?></td>
                    <td bgcolor="#ffffff"><?php echo ($lang["affiliate_code"]); ?></td>
                </tr>
                <?php if(is_array($types)): foreach($types as $key=>$val): ?><tr align="center">
                        <td bgcolor="#ffffff" class="types">
                            <script src="<?php echo ($shopurl); ?>affiliate.php?charset=<?php echo ($ecs_charset); ?>&gid=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>&type=<?php echo ($val); ?>"></script>
                        </td>
                        <td bgcolor="#ffffff">javascript <?php echo ($lang["affiliate_codetype"]); ?>
                            <br>
                            <textarea cols=30 rows=2 id="txt<?php echo ($key+1); ?>}" style="border:1px solid #ccc;">
                                <script src="<?php echo ($shopurl); ?>affiliate.php?charset=<?php echo ($ecs_charset); ?>&gid=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>&type=<?php echo ($val); ?>"></script>
                            </textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($key+1); ?>}').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>]
                            <br>iframe <?php echo ($lang["affiliate_codetype"]); ?>
                            <br>
                            <textarea cols=30 rows=2 id="txt<?php echo ($key+1); ?>}_iframe" style="border:1px solid #ccc;">
                                <iframe width="250" height="270" src="<?php echo ($shopurl); ?>affiliate.php?charset=<?php echo ($ecs_charset); ?>&gid=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>&type=<?php echo ($val); ?>&display_mode=iframe" frameborder="0" scrolling="no"></iframe>
                            </textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($key+1); ?>}_iframe').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>]
                            <br /><?php echo ($lang["bbs"]); ?>UBB <?php echo ($lang["affiliate_codetype"]); ?>
                            <br />
                            <textarea cols=30 rows=2 id="txt<?php echo ($key+1); ?>}_ubb" style="border:1px solid #ccc;">
                                {if $val != 5} [url=<?php echo ($shopurl); ?>goods.php?id=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>][img] {if $val
                                < 3} <?php echo ($goods["goods_thumb"]); ?> {else} <?php echo ($goods["goods_img"]); ?> {/if} [/img] [/url] {/if} [url=<?php echo ($shopurl); ?>goods.php?id=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>][b]<?php echo ($goods["goods_name"]); ?>[/b][/url] {if $val !=1 && $val !=3 }[s]<?php echo ($goods["market_price"]); ?>[/s]{/if} [color=red]<?php echo ($goods["shop_price"]); ?>[/color]</textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($key+1); ?>}_ubb').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>] {if $val == 5}
                                    <br /><?php echo ($lang["im_code"]); ?> <?php echo ($lang["affiliate_codetype"]); ?>
                                    <br />
                                    <textarea cols=30 rows=2 id="txt<?php echo ($key+1); ?>}_txt" style="border:1px solid #ccc;"><?php echo ($lang["show_good_to_you"]); ?> <?php echo ($goods["goods_name"]); ?> <?php echo ($shopurl); ?>goods.php?id=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>
                                    </textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($key+1); ?>}_txt').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>]{/if}</td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <script language="Javascript">
            copyToClipboard = function(txt) {
                if (window.clipboardData) {
                    window.clipboardData.clearData();
                    window.clipboardData.setData("Text", txt);
                } else if (navigator.userAgent.indexOf("Opera") != -1) {
                    //暂时无方法:-(
                } else if (window.netscape) {
                    try {
                        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                    } catch (e) {
                        alert("<?php echo ($lang["firefox_copy_alert"]); ?>");
                        return false;
                    }
                    var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
                    if (!clip)
                        return;
                    var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
                    if (!trans)
                        return;
                    trans.addDataFlavor('text/unicode');
                    var str = new Object();
                    var len = new Object();
                    var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
                    var copytext = txt;
                    str.data = copytext;
                    trans.setTransferData("text/unicode", str, copytext.length * 2);
                    var clipid = Components.interfaces.nsIClipboard;
                    if (!clip)
                        return false;
                    clip.setData(trans, null, clipid.kGlobalClipboard);
                }
            }
            </script>
            <!-- /单个商品推荐 --><?php endif; ?>
    </if>
</if><?php break;?>
                            <?php default: endswitch;?>
                        <!-- *我的推荐 -->
                        <!-- /我的推荐 -->
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


</html>