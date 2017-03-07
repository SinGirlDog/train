<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="<?php echo ($keywords); ?>" />
    <meta name="Description" content="<?php echo ($description); ?>" />
    <!-- TemplateBeginEditable name="doctitle" -->
    <title><?php echo ($page_title); ?></title>
    <!-- TemplateEndEditable -->
    <!-- TemplateBeginEditable name="head" -->
    <!-- TemplateEndEditable -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="animated_favicon.gif" type="image/gif" />
    <link href="<?php echo ($ecs_css_path); ?>" rel="stylesheet" type="text/css" /> {* 包含脚本文件 *} {insert_scripts files='transport.js,common.js,user.js'}
</head>

<body>
    <!-- #BeginLibraryItem "/library/page_header.lbi" -->
    <!-- #EndLibraryItem -->
    <!--当前位置 start-->
    <div class="block box">
        <div id="ur_here">
            <!-- #BeginLibraryItem "/library/ur_here.lbi" -->
            <!-- #EndLibraryItem -->
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
                        <!-- #BeginLibraryItem "/library/user_menu.lbi" -->
                        <!-- #EndLibraryItem -->
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
                        <!-- *用户中心默认显示页面 start-->
                        <!-- {if $action eq 'default'} -->
                        <font class="f5"><b class="f4"><?php echo ($info["username"]); ?></b> <?php echo ($lang["welcome_to"]); ?> <?php echo ($info["shop_name"]); ?>！</font>
                        <br />
                        <div class="blank"></div>
                        <?php echo ($lang["last_time"]); ?>: <?php echo ($info["last_time"]); ?>
                        <br />
                        <div class="blank5"></div>
                        <?php echo ($rank_name); ?> <?php echo ($next_rank_name); ?>
                        <br />
                        <div class="blank5"></div>
                        <!--{if $info.is_validate eq 0} -->
                        <?php echo ($lang["not_validated"]); ?> <a href="javascript:sendHashMail()" style="color:#006bd0;"><?php echo ($lang["resend_hash_mail"]); ?></a>
                        <br />
                        <!--{/if} -->
                        <div style="margin:5px 0; border:1px solid #a1675a;padding:10px 20px; background-color:#e8d1c9;">
                            <img src="images/note.gif" alt="note" />&nbsp;<?php echo ($user_notice); ?>
                        </div>
                        <br />
                        <br />
                        <div class="f_l" style="width:350px;">
                            <h5><span><?php echo ($lang["your_account"]); ?></span></h5>
                            <div class="blank"></div>
                            <?php echo ($lang["your_surplus"]); ?>:<a href="user.php?act=account_log" style="color:#006bd0;"><?php echo ($info["surplus"]); ?></a>
                            <br />
                            <!-- {if $info.credit_line gt 0} 如果有信用额度 -->
                            <?php echo ($lang["credit_line"]); ?>:<?php echo ($info["formated_credit_line"]); ?>
                            <br />
                            <!-- {/if} -->
                            <?php echo ($lang["your_bonus"]); ?>:<a href="user.php?act=bonus" style="color:#006bd0;"><?php echo ($info["bonus"]); ?></a>
                            <br /> <?php echo ($lang["your_integral"]); ?>:<?php echo ($info["integral"]); ?>
                            <br />
                        </div>
                        <div class="f_r" style="width:350px;">
                            <h5><span><?php echo ($lang["your_notice"]); ?></span></h5>
                            <div class="blank"></div>
                            <!--{foreach from=$prompt item=item}-->
                            <?php echo ($item["text"]); ?>
                            <br />
                            <!--{/foreach}-->
                            <?php echo ($lang["last_month_order"]); echo ($info["order_count"]); echo ($lang["order_unit"]); ?>
                            <br />
                            <!-- {if $info.shipped_order} -->
                            <?php echo ($lang["please_received"]); ?>
                            <br />
                            <!-- {foreach from=$info.shipped_order item=item}-->
                            <a href="user.php?act=order_detail&order_id=<?php echo ($item["order_id"]); ?>" style="color:#006bd0;"><?php echo ($item["order_sn"]); ?></a>
                            <!-- {/foreach} -->
                            <!-- {/if}-->
                        </div>
                        <!-- {/if} -->
                        <!-- #用户中心默认显示页面 end-->
                        <!-- *我的留言 start-->
                        <!-- {if $action eq 'message_list'} -->
                        <h5><span><?php echo ($lang["label_message"]); ?></span></h5>
                        <div class="blank"></div>
                        <!--{foreach from=$message_list item=message key=key} -->
                        <div class="f_l">
                            <b><?php echo ($message["msg_type"]); ?>:</b>&nbsp;&nbsp;
                            <font class="f4"><?php echo ($message["msg_title"]); ?></font> (<?php echo ($message["msg_time"]); ?>)
                        </div>
                        <div class="f_r">
                            <a href="user.php?act=del_msg&amp;id=<?php echo ($key); ?>&amp;order_id=<?php echo ($message["order_id"]); ?>" title="<?php echo ($lang["drop"]); ?>" onclick="if (!confirm('<?php echo ($lang["confirm_remove_msg"]); ?>')) return false;" class="f6"><?php echo ($lang["drop"]); ?></a>
                        </div>
                        <div class="msgBottomBorder">
                            <?php echo ($message["msg_content"]); ?>
                            <!-- {if $message.message_img} 如果上传了图片-->
                            <div align="right">
                                <a href="data/feedbackimg/<?php echo ($message["message_img"]); ?>" target="_bank" class="f6"><?php echo ($lang["view_upload_file"]); ?></a>
                            </div>
                            <!-- {/if} -->
                            <br />
                            <!-- {if $message.re_msg_content} -->
                            <a href="mailto:<?php echo ($message["re_user_email"]); ?>" class="f6"><?php echo ($lang["shopman_reply"]); ?></a> (<?php echo ($message["re_msg_time"]); ?>)
                            <br /> <?php echo ($message["re_msg_content"]); ?>
                            <!-- {/if} -->
                        </div>
                        <!-- {/foreach} -->
                        <!-- {if $message_list}-->
                        <div class="f_r">
                            <!-- #BeginLibraryItem "/library/pages.lbi" -->
                            <!-- #EndLibraryItem -->
                        </div>
                        <!-- {/if}-->
                        <div class="blank"></div>
                        <form action="user.php" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
                            <table width="100%" border="0" cellpadding="3">
                                {if $order_info}
                                <tr>
                                    <td align="right"><?php echo ($lang["order_number"]); ?></td>
                                    <td>
                                        <a href="<?php echo ($order_info["url"]); ?>"><img src="images/note.gif" /><?php echo ($order_info["order_sn"]); ?></a>
                                        <input name="msg_type" type="hidden" value="5" />
                                        <input name="order_id" type="hidden" value="<?php echo ($order_info["order_id"]); ?>" class="inputBg" />
                                    </td>
                                </tr>
                                {else}
                                <tr>
                                    <td align="right"><?php echo ($lang["message_type"]); ?>：</td>
                                    <td>
                                        <input name="msg_type" type="radio" value="0" checked="checked" /> <?php echo ($lang["type[0]"]); ?>
                                        <input type="radio" name="msg_type" value="1" /> <?php echo ($lang["type[1]"]); ?>
                                        <input type="radio" name="msg_type" value="2" /> <?php echo ($lang["type[2]"]); ?>
                                        <input type="radio" name="msg_type" value="3" /> <?php echo ($lang["type[3]"]); ?>
                                        <input type="radio" name="msg_type" value="4" /> <?php echo ($lang["type[4]"]); ?> </td>
                                </tr>
                                {/if}
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
                        <!-- {/if} -->
                        <!--#我的留言 end-->
                        <!-- *我的评论 start-->
                        <!-- {if $action eq 'comment_list'} -->
                        <h5><span><?php echo ($lang["label_comment"]); ?></span></h5>
                        <div class="blank"></div>
                        <!--{foreach from=$comment_list item=comment} -->
                        <div class="f_l">
                            <b>{if $comment.comment_type eq '0'}<?php echo ($lang["goods_comment"]); ?>{else}<?php echo ($lang["article_comment"]); ?>{/if}: </b>
                            <font class="f4"><?php echo ($comment["cmt_name"]); ?></font>&nbsp;&nbsp;(<?php echo ($comment["formated_add_time"]); ?>)
                        </div>
                        <div class="f_r">
                            <a href="user.php?act=del_cmt&amp;id=<?php echo ($comment["comment_id"]); ?>" title="<?php echo ($lang["drop"]); ?>" onclick="if (!confirm('<?php echo ($lang["confirm_remove_msg"]); ?>')) return false;" class="f6"><?php echo ($lang["drop"]); ?></a>
                        </div>
                        <div class="msgBottomBorder">
                            <?php echo (escape($comment["content"])); ?>
                            <br />
                            <!--{if $comment.reply_content}-->
                            <b><?php echo ($lang["reply_comment"]); ?>：</b>
                            <br /> <?php echo ($comment["reply_content"]); ?>
                            <!--{/if}-->
                        </div>
                        <!-- {/foreach} -->
                        <!-- {if $comment_list}-->
                        <!-- #BeginLibraryItem "/library/pages.lbi" -->
                        <!-- #EndLibraryItem -->
                        <!-- {else}-->
                        <?php echo ($lang["no_comments"]); ?>
                        <!-- {/if}-->
                        <!--{/if} -->
                        <!--#我的评论 end-->
                        <!--#我的标签 start-->
                        <!--{if $action eq 'tag_list'} -->
                        <h5><span><?php echo ($lang["label_tag"]); ?></span></h5>
                        <div class="blank"></div>
                        <!-- {if $tags} -->
                        <!-- 标签云开始 {foreach from=$tags item=tag}-->
                        <a href="search.php?keywords=<?php echo (escape:url($tag["tag_words"])); ?>" class="f6"><?php echo (escape:html($tag["tag_words"])); ?></a>
                        <a href="user.php?act=act_del_tag&amp;tag_words=<?php echo (escape:url($tag["tag_words"])); ?>" onclick="if (!confirm('<?php echo ($lang["confirm_drop_tag"]); ?>')) return false;" title="<?php echo ($lang["drop"]); ?>"><img src="images/drop.gif" alt="<?php echo ($lang["drop"]); ?>" /></a>&nbsp;&nbsp;
                        <!-- 标签云结束 {/foreach}-->
                        <!-- {else} -->
                        <span style="margin:2px 10px; font-size:14px; line-height:36px;"><?php echo ($lang["no_tag"]); ?></span>
                        <!-- {/if} -->
                        <!--{/if} -->
                        <!--#我的标签 end-->
                        <!--*收藏商品列表页面 start-->
                        <!--{if $action eq 'collection_list'} -->
                        {insert_scripts files='transport.js,utils.js'}
                        <h5><span><?php echo ($lang["label_collection"]); ?></span></h5>
                        <div class="blank"></div>
                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                            <tr align="center">
                                <th width="35%" bgcolor="#ffffff"><?php echo ($lang["goods_name"]); ?></th>
                                <th width="30%" bgcolor="#ffffff"><?php echo ($lang["price"]); ?></th>
                                <th width="35%" bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></th>
                            </tr>
                            <!--{foreach from=$goods_list item=goods}-->
                            <tr>
                                <td bgcolor="#ffffff"><a href="<?php echo ($goods["url"]); ?>" class="f6"><?php echo (escape:html($goods["goods_name"])); ?></a></td>
                                <td bgcolor="#ffffff">
                                    <!-- {if $goods.promote_price neq ""} -->
                                    <?php echo ($lang["promote_price"]); ?><span class="goods-price"><?php echo ($goods["promote_price"]); ?></span>
                                    <!-- {else}-->
                                    <?php echo ($lang["shop_price"]); ?><span class="goods-price"><?php echo ($goods["shop_price"]); ?></span>
                                    <!--{/if}-->
                                </td>
                                <td align="center" bgcolor="#ffffff">
                                    <!-- {if $goods.is_attention} -->
                                    <a href="javascript:if (confirm('<?php echo ($lang["del_attention"]); ?>')) location.href='user.php?act=del_attention&rec_id=<?php echo ($goods["rec_id"]); ?>'" class="f6"><?php echo ($lang["no_attention"]); ?></a>
                                    <!-- {else} -->
                                    <a href="javascript:if (confirm('<?php echo ($lang["add_to_attention"]); ?>')) location.href='user.php?act=add_to_attention&rec_id=<?php echo ($goods["rec_id"]); ?>'" class="f6"><?php echo ($lang["attention"]); ?></a>
                                    <!-- {/if} -->
                                    <a href="javascript:addToCart(<?php echo ($goods["goods_id"]); ?>)" class="f6"><?php echo ($lang["add_to_cart"]); ?></a> <a href="javascript:if (confirm('<?php echo ($lang["remove_collection_confirm"]); ?>')) location.href='user.php?act=delete_collection&collection_id=<?php echo ($goods["rec_id"]); ?>'" class="f6"><?php echo ($lang["drop"]); ?></a>
                                </td>
                            </tr>
                            <!--{/foreach} -->
                        </table>
                        <!-- #BeginLibraryItem "/library/pages.lbi" -->
                        <!-- #EndLibraryItem -->
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
                        <!--{/if} -->
                        <!--#收藏商品列表页面 end-->
                        <!--*缺货登记列表页面 start-->
                        <!--{if $action eq 'booking_list'} -->
                        <h5><span><?php echo ($lang["label_booking"]); ?></span></h5>
                        <div class="blank"></div>
                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                            <tr align="center">
                                <td width="20%" bgcolor="#ffffff"><?php echo ($lang["booking_goods_name"]); ?></td>
                                <td width="10%" bgcolor="#ffffff"><?php echo ($lang["booking_amount"]); ?></td>
                                <td width="20%" bgcolor="#ffffff"><?php echo ($lang["booking_time"]); ?></td>
                                <td width="35%" bgcolor="#ffffff"><?php echo ($lang["process_desc"]); ?></td>
                                <td width="15%" bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></td>
                            </tr>
                            <!-- {foreach from=$booking_list item=item} -->
                            <tr>
                                <td align="left" bgcolor="#ffffff"><a href="<?php echo ($item["url"]); ?>" target="_blank" class="f6"><?php echo ($item["goods_name"]); ?></a></td>
                                <td align="center" bgcolor="#ffffff"><?php echo ($item["goods_number"]); ?></td>
                                <td align="center" bgcolor="#ffffff"><?php echo ($item["booking_time"]); ?></td>
                                <td align="left" bgcolor="#ffffff"><?php echo ($item["dispose_note"]); ?></td>
                                <td align="center" bgcolor="#ffffff"><a href="javascript:if (confirm('<?php echo ($lang["confirm_remove_account"]); ?>')) location.href='user.php?act=act_del_booking&id=<?php echo ($item["rec_id"]); ?>'" class="f6"><?php echo ($lang["drop"]); ?></a> </td>
                            </tr>
                            <!--{/foreach}-->
                        </table>
                        <!--{/if} -->
                        <div class="blank5"></div>
                        <!--#缺货登记列表页面 -->
                        <!--{if $action eq 'add_booking'} -->
                        {insert_scripts files='utils.js'}
                        <script type="text/javascript">
                        {
                            foreach from = $lang.booking_js item = item key = key
                        }
                        var {
                            $key
                        } = "<?php echo ($item); ?>"; {
                            /foreach}
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
                                        <textarea name="desc" cols="50" rows="5" wrap="virtual" class="B_blue"><?php echo ($goods_attr); echo (escape($info["goods_desc"])); ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["contact_username"]); ?>:</td>
                                    <td bgcolor="#ffffff">
                                        <input name="linkman" type="text" value="<?php echo (escape($info["consignee"])); ?>" size="25" class="inputBg" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["email_address"]); ?>:</td>
                                    <td bgcolor="#ffffff">
                                        <input name="email" type="text" value="<?php echo (escape($info["email"])); ?>" size="25" class="inputBg" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" bgcolor="#ffffff"><?php echo ($lang["contact_phone"]); ?>:</td>
                                    <td bgcolor="#ffffff">
                                        <input name="tel" type="text" value="<?php echo (escape($info["tel"])); ?>" size="25" class="inputBg" />
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
                        </form>
                        <!-- {/if} -->
                        <!-- *我的推荐 -->
                        <!-- {if $affiliate.on eq 1} -->
                        <!-- {if $action eq 'affiliate'} -->
                        <!-- {if !$goodsid || $goodsid eq 0} -->
                        <h5><span><?php echo ($lang["affiliate_detail"]); ?></span></h5>
                        <div class="blank"></div>
                        <?php echo ($affiliate_intro); ?>
                        <!-- {if $affiliate.config.separate_by eq 0} -->
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
                            <!-- {foreach from=$affdb key=level item=val name=affdb} -->
                            <tr align="center">
                                <td bgcolor="#ffffff"><?php echo ($level); ?></td>
                                <td bgcolor="#ffffff"><?php echo ($val["num"]); ?></td>
                                <td bgcolor="#ffffff"><?php echo ($val["point"]); ?></td>
                                <td bgcolor="#ffffff"><?php echo ($val["money"]); ?></td>
                            </tr>
                            <!-- {/foreach} -->
                        </table>
                        <!-- /下线人数、分成 -->
                        <!-- {else} -->
                        <!-- 介绍订单数、分成 -->
                        <!-- /介绍订单数、分成 -->
                        <!-- {/if} -->
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
                            <!-- {foreach from=$logdb item=val name=logdb} -->
                            <tr align="center">
                                <td bgcolor="#ffffff"><?php echo ($val["order_sn"]); ?></td>
                                <td bgcolor="#ffffff"><?php echo ($val["money"]); ?></td>
                                <td bgcolor="#ffffff"><?php echo ($val["point"]); ?></td>
                                <td bgcolor="#ffffff">
                                    <!-- {if $val.separate_type == 1 || $val.separate_type === 0} --><?php echo ($lang["affiliate_type"]["$val"]["separate_type"]); ?>
                                    <!-- {else} --><?php echo ($lang["affiliate_type"]["$affiliate_type"]); ?>
                                    <!-- {/if} -->
                                </td>
                                <td bgcolor="#ffffff"><?php echo ($lang["affiliate_stats[$val"]["is_separate]"]); ?></td>
                            </tr>
                            {foreachelse}
                            <tr>
                                <td colspan="5" align="center" bgcolor="#ffffff"><?php echo ($lang["no_records"]); ?></td>
                            </tr>
                            <!-- {/foreach} -->
                            <!-- {if $logdb} -->
                            <tr>
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
                            </tr>
                            <!-- {/if} -->
                        </table>
                        <script type="text/javascript" language="JavaScript">
                        <!--
                        {
                            literal
                        }

                        function selectPage(sel) {
                            sel.form.submit();
                        } {
                            /literal}
                            //-->
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
                        <!-- {else} -->
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
                            <!-- {foreach from=$types item=val name=types} -->
                            <tr align="center">
                                <td bgcolor="#ffffff" class="types">
                                    <script src="<?php echo ($shopurl); ?>affiliate.php?charset=<?php echo ($ecs_charset); ?>&gid=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>&type=<?php echo ($val); ?>"></script>
                                </td>
                                <td bgcolor="#ffffff">javascript <?php echo ($lang["affiliate_codetype"]); ?>
                                    <br>
                                    <textarea cols=30 rows=2 id="txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>" style="border:1px solid #ccc;">
                                        <script src="<?php echo ($shopurl); ?>affiliate.php?charset=<?php echo ($ecs_charset); ?>&gid=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>&type=<?php echo ($val); ?>"></script>
                                    </textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>]
                                    <br>iframe <?php echo ($lang["affiliate_codetype"]); ?>
                                    <br>
                                    <textarea cols=30 rows=2 id="txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>_iframe" style="border:1px solid #ccc;">
                                        <iframe width="250" height="270" src="<?php echo ($shopurl); ?>affiliate.php?charset=<?php echo ($ecs_charset); ?>&gid=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>&type=<?php echo ($val); ?>&display_mode=iframe" frameborder="0" scrolling="no"></iframe>
                                    </textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>_iframe').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>]
                                    <br /><?php echo ($lang["bbs"]); ?>UBB <?php echo ($lang["affiliate_codetype"]); ?>
                                    <br />
                                    <textarea cols=30 rows=2 id="txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>_ubb" style="border:1px solid #ccc;">{if $val != 5}[url=<?php echo ($shopurl); ?>goods.php?id=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>][img]{if $val
                                        < 3}<?php echo ($goods["goods_thumb"]); ?>{else}<?php echo ($goods["goods_img"]); ?>{/if}[/img][/url]{/if} [url=<?php echo ($shopurl); ?>goods.php?id=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>][b]<?php echo ($goods["goods_name"]); ?>[/b][/url] {if $val !=1 && $val !=3 }[s]<?php echo ($goods["market_price"]); ?>[/s]{/if} [color=red]<?php echo ($goods["shop_price"]); ?>[/color]</textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>_ubb').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>] {if $val == 5}
                                            <br /><?php echo ($lang["im_code"]); ?> <?php echo ($lang["affiliate_codetype"]); ?>
                                            <br />
                                            <textarea cols=30 rows=2 id="txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>_txt" style="border:1px solid #ccc;"><?php echo ($lang["show_good_to_you"]); ?> <?php echo ($goods["goods_name"]); ?> <?php echo ($shopurl); ?>goods.php?id=<?php echo ($goodsid); ?>&u=<?php echo ($userid); ?>
                                            </textarea>[<a href="#" title="Copy To Clipboard" onClick="Javascript:copyToClipboard(document.getElementById('txt<?php echo ($smarty["foreach"]["types"]["iteration"]); ?>_txt').value);alert('<?php echo ($lang["copy_to_clipboard"]); ?>');" class="f6"><?php echo ($lang["code_copy"]); ?></a>]{/if}</td>
                            </tr>
                            <!-- {/foreach} -->
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
                        <!-- /单个商品推荐 -->
                        <!-- {/if} -->
                        <!-- {/if} -->
                        <!-- {/if} -->
                        <!-- /我的推荐 -->
                    </div>
                </div>
            </div>
        </div>
        <!--right end-->
    </div>
    <div class="blank"></div>
    <!-- #BeginLibraryItem "/library/page_footer.lbi" -->
    <!-- #EndLibraryItem -->
</body>
<script type="text/javascript">
{
    foreach from = $lang.clips_js item = item key = key
}
var {
    $key
} = "<?php echo ($item); ?>"; {
    /foreach}
</script>

</html>