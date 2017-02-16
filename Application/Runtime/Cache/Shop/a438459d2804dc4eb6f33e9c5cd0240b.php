<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="<?php echo ($keywords); ?>" />
    <meta name="Description" content="<?php echo ($description); ?>" />
    <!-- TemplateBeginEditable name="doctitle" -->
    <title><?php echo ($page_title); ?>首页</title>
    <!-- TemplateEndEditable -->
    <!-- TemplateBeginEditable name="head" -->
    <!-- TemplateEndEditable -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="<?php echo (SHOP_IMG_URL); ?>animated_favicon.gif" type="image/gif" />
    <link href="<?php echo (SHOP_CSS_URL); ?>style_pink.css" rel="stylesheet" type="text/css" />
    <link rel="alternate" type="application/rss+xml" title="RSS|<?php echo ($page_title); ?>" href="<?php echo ($feed_url); ?>" />
    <!-- {* 包含脚本文件 *}
{insert_scripts files='common.js,index.js'} -->
    <script src='<?php echo (SHOP_JS_URL); ?>common.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>index.js'></script>
</head>

<body>
    <!-- #BeginLibraryItem "/library/page_header.lbi" -->
    <!-- #EndLibraryItem -->
    
    
    
        
    
    <div class="blank">        
    </div>
    <div class="block clearfix">
        <!--left start-->
        <div class="AreaL">
            <!--站内公告 start-->
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["shop_notice"]); ?></span></h3>
                    <div class="boxCenterList RelaArticle">
                        <?php echo ($lang['shop_notice']); ?> <?php echo ($shop_notice); ?>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!--站内公告 end-->
            <!-- TemplateBeginEditable name="左边区域" -->
            <!-- #BeginLibraryItem "/library/cart.lbi" -->
            <!-- {insert_scripts files='transport.js'} -->
            <script src='<?php echo (SHOP_JS_URL); ?>transport.js'></script>
            
            <div class="cart" id="ECS_CARTINFO">
                <!-- {insert name='cart_info'} -->
                <?php echo ($cartinfo); ?>
            </div>
            <div class="blank5"></div>
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/category_tree.lbi" -->
            
            <div class="box">
                <div class="box_1">
                    <div id="category_tree">
                        <!--{foreach from=$categories item=cat}-->
                        <dl>
                            <dt><a href="<?php echo ($cat["url"]); ?>"><?php echo ($cat["name"]); ?></a></dt>
                            <!--{foreach from=$cat.cat_id item=child}-->
                            <dd><a href="<?php echo ($child["url"]); ?>"><?php echo ($child["name"]); ?></a></dd>
                            <!--{foreach from=$child.cat_id item=childer}-->
                            <dd>&nbsp;&nbsp;<a href="<?php echo ($childer["url"]); ?>"><?php echo ($childer["name"]); ?></a></dd>
                            <!--{/foreach}-->
                            <!--{/foreach}-->
                        </dl>
                        <!--{/foreach}-->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/top10.lbi" -->
            
            <div class="box">
                <div class="box_2">
                    <div class="top10Tit"></div>
                    <div class="top10List clearfix">
                        <?php if(!empty($top_goods)): if(is_array($top_goods)): foreach($top_goods as $key=>$vo): ?><ul class="clearfix">
                                <img src="<?php echo (SHOP_IMG_URL); ?>/top_<?php echo ($key+1); ?>.gif" class="iteration" />
                               
                                <?php if($key < 3): ?><li class="topimg">
                                        <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="samllimg" /></a>
                                    </li>
                                    <li class="iteration1">
                                        <a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_name"]); ?></a>
                                        <br /> <?php echo ($lang["shop_price"]); ?>
                                        <font class="f1"><?php echo ($goods["price"]); ?></font>
                                        <br />
                                    </li>
                                    <?php else: ?>
                                    <li>
                                        <a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_name"]); ?></a>
                                        <br /> <?php echo ($lang["shop_price"]); ?>
                                        <font class="f1"><?php echo ($goods["price"]); ?></font>
                                        <br />
                                    </li><?php endif; ?>
                            </ul><?php endforeach; endif; endif; ?>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/promotion_info.lbi" -->
            
            <!-- {if $promotion_info} -->
            <!-- 促销信息 -->
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["promotion_info"]); ?></span></h3>
                    <div class="boxCenterList RelaArticle">
                        <!-- {foreach from=$promotion_info item=item key=key} -->
                        <!-- {if $item.type eq "snatch"} -->
                        <a href="snatch.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["snatch_promotion"]); ?></a>
                        <!-- {elseif $item.type eq "group_buy"} -->
                        <a href="group_buy.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["group_promotion"]); ?></a>
                        <!-- {elseif $item.type eq "auction"} -->
                        <a href="auction.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["auction_promotion"]); ?></a>
                        <!-- {elseif $item.type eq "favourable"} -->
                        <a href="activity.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["favourable_promotion"]); ?></a>
                        <!-- {/if} -->
                        <a href="<?php echo ($item["url"]); ?>" title="<?php echo ($lang["$item"]["type"]); ?> <?php echo ($item["act_name"]); echo ($item["time"]); ?>" style="background:none; padding-left:0px;"><?php echo ($item["act_name"]); ?></a>
                        <br />
                        <!-- {/foreach} -->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/order_query.lbi" -->
            
            <!--{if empty($order_query)}-->
            <script>
            var invalid_order_sn = "<?php echo ($lang["invalid_order_sn"]); ?>"
            </script>
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["order_query"]); ?></span></h3>
                    <div class="boxCenterList">
                        <form name="ecsOrderQuery">
                            <input type="text" name="order_sn" class="inputBg" />
                            <br />
                            <div class="blank5"></div>
                            <input type="button" value="<?php echo ($lang["query_order"]); ?>" class="bnt_blue_2" onclick="orderQuery()" />
                        </form>
                        <div id="ECS_ORDER_QUERY" style="margin-top:8px;">
                            <!--{else}-->
                            <!--{if $order_query.user_id}-->
                            <b><?php echo ($lang["order_number"]); ?>：</b><a href="user.php?act=order_detail&order_id=<?php echo ($order_query["order_id"]); ?>" class="f6"><?php echo ($order_query["order_sn"]); ?></a>
                            <br>
                            <!--{else}-->
                            <b><?php echo ($lang["order_number"]); ?>：</b><?php echo ($order_query["order_sn"]); ?>
                            <br>
                            <!--{/if}-->
                            <b><?php echo ($lang["order_status"]); ?>：</b>
                            <br>
                            <font class="f1"><?php echo ($order_query["order_status"]); ?></font>
                            <br>
                            <!--{if $order_query.invoice_no }-->
                            <b><?php echo ($lang["consignment"]); ?>：</b><?php echo ($order_query["invoice_no"]); ?>
                            <br>
                            <!--{/if}-->
                            {if $order_query.shipping_date}：<?php echo ($lang["shipping_date"]); ?> <?php echo ($order_query["shipping_date"]); ?>
                            <br>
                            <!--{/if}-->
                            <!--{/if}-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/invoice_query.lbi" -->
            
            <!--{if $invoice_list}-->
            <style type="text/css">
            .boxCenterList form {
                display: inline;
            }
            
            .boxCenterList form a {
                color: #404040;
                text-decoration: underline;
            }
            </style>
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["shipping_query"]); ?></span></h3>
                    <div class="boxCenterList">
                        <!-- 发货单查询{foreach from=$invoice_list item=invoice} -->
                        <?php echo ($lang["order_number"]); ?> <?php echo ($invoice["order_sn"]); ?>
                        <br /> <?php echo ($lang["consignment"]); ?> <?php echo ($invoice["invoice_no"]); ?>
                        <div class="blank"></div>
                        <!-- 结束发货单查询{/foreach}-->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/vote_list.lbi" -->
             {insert name='vote'}
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/email_list.lbi" -->
            
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["email_subscribe"]); ?></span></h3>
                    <div class="boxCenterList RelaArticle">
                        <input type="text" id="user_email" class="inputBg" />
                        <br />
                        <div class="blank5"></div>
                        <input type="button" class="bnt_blue" value="<?php echo ($lang["email_list_ok"]); ?>" onclick="add_email_list();" />
                        <input type="button" class="bnt_bonus" value="<?php echo ($lang["email_list_cancel"]); ?>" onclick="cancel_email_list();" />
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <script type="text/javascript">
            var email = document.getElementById('user_email');

            function add_email_list() {
                if (check_email()) {
                    Ajax.call('user.php?act=email_list&job=add&email=' + email.value, '', rep_add_email_list, 'GET', 'TEXT');
                }
            }

            function rep_add_email_list(text) {
                alert(text);
            }

            function cancel_email_list() {
                if (check_email()) {
                    Ajax.call('user.php?act=email_list&job=del&email=' + email.value, '', rep_cancel_email_list, 'GET', 'TEXT');
                }
            }

            function rep_cancel_email_list(text) {
                alert(text);
            }

            function check_email() {
                if (Utils.isEmail(email.value)) {
                    return true;
                } else {
                    alert('<?php echo ($lang["email_invalid"]); ?>');
                    return false;
                }
            }
            </script>
            <!-- #EndLibraryItem -->
            <!-- TemplateEndEditable -->
        </div>
        <!--left end-->
        <!--right start-->
        <div class="AreaR">
            <!--焦点图和站内快讯 START-->
            <div class="box clearfix">
                <div class="box_1 clearfix">
                    <div class="f_l" id="focus">
                        <!-- #BeginLibraryItem "/library/index_ad.lbi" -->
                        <!-- #EndLibraryItem -->
                        
                    </div>
                    <!--news-->
                    <div id="mallNews" class="f_r">
                        <div class="NewsTit"></div>
                        <div class="NewsList tc">
                            <!-- TemplateBeginEditable name="站内快讯上广告位（宽：210px）" -->
                            <!-- TemplateEndEditable -->
                            <!-- #BeginLibraryItem "/library/new_articles.lbi" -->
                            <!-- #EndLibraryItem -->
                            
                        </div>
                    </div>
                    <!--news end-->
                </div>
            </div>
            <div class="blank5"></div>
            <!--焦点图和站内快讯 END-->
            <!--今日特价，品牌 start-->
            <div class="clearfix">
                <!--特价-->
                <!-- #BeginLibraryItem "/library/recommend_promotion.lbi" -->
                <!-- #EndLibraryItem -->
                
                <!--品牌-->
                <div class="box f_r brandsIe6">
                    <div class="box_1 clearfix" id="brands">
                        <!-- #BeginLibraryItem "/library/brands.lbi" -->
                        <!-- #EndLibraryItem -->
                        
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- TemplateBeginEditable name="右边主区域" -->
            <!-- #BeginLibraryItem "/library/recommend_best.lbi" -->
            
            <!-- {if $best_goods} -->
            <!-- {if $cat_rec_sign neq 1} -->
            <div class="box">
                <div class="box_2 centerPadd">
                    <div class="itemTit" id="itemBest">
                        {if $cat_rec[1]}
                        <h2><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, 0);"><?php echo ($lang["all_goods"]); ?></a></h2> {foreach from=$cat_rec[1] item=rec_data}
                        <h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2> {/foreach} {/if}
                    </div>
                    <div id="show_best_area" class="clearfix goodsBox">
                        <!-- {/if} -->
                        <!--{foreach from=$best_goods item=goods}-->
                        <div class="goodsItem">
                            <span class="best"></span>
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="f1">
                                <!-- {if $goods.promote_price neq ""} -->
                                <?php echo ($goods["promote_price"]); ?>
                                <!-- {else}-->
                                <?php echo ($goods["shop_price"]); ?>
                                <!--{/if}-->
                            </font>
                        </div>
                        <!--{/foreach}-->
                        <div class="more">
                            <a href="../search.php?intro=best"><img src="<?php echo (SHOP_IMG_URL); ?>/more.gif" /></a>
                        </div>
                        <!-- {if $cat_rec_sign neq 1} -->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/recommend_new.lbi" -->
            
            <!-- {if $new_goods} -->
            <!-- {if $cat_rec_sign neq 1} -->
            <div class="box">
                <div class="box_2 centerPadd">
                    <div class="itemTit New" id="itemNew">
                        {if $cat_rec[2]}
                        <h2><a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, 0);"><?php echo ($lang["all_goods"]); ?></a></h2> {foreach from=$cat_rec[2] item=rec_data}
                        <h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2> {/foreach} {/if}
                    </div>
                    <div id="show_new_area" class="clearfix goodsBox">
                        <!-- {/if} -->
                        <!--{foreach from=$new_goods item=goods}-->
                        <div class="goodsItem">
                            <span class="news"></span>
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="f1">
                                <!-- {if $goods.promote_price neq ""} -->
                                <?php echo ($goods["promote_price"]); ?>
                                <!-- {else}-->
                                <?php echo ($goods["shop_price"]); ?>
                                <!--{/if}-->
                            </font>
                        </div>
                        <!--{/foreach}-->
                        <div class="more">
                            <a href="../search.php?intro=new"><img src="<?php echo (SHOP_IMG_URL); ?>/more.gif" /></a>
                        </div>
                        <!-- {if $cat_rec_sign neq 1} -->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/recommend_hot.lbi" -->
            
            <!-- {if $hot_goods} -->
            <!-- {if $cat_rec_sign neq 1} -->
            <div class="box">
                <div class="box_2 centerPadd">
                    <div class="itemTit Hot" id="itemHot">
                        {if $cat_rec[3]}
                        <h2><a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, 0);"><?php echo ($lang["all_goods"]); ?></a></h2> {foreach from=$cat_rec[3] item=rec_data}
                        <h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2> {/foreach} {/if}
                    </div>
                    <div id="show_hot_area" class="clearfix goodsBox">
                        <!-- {/if} -->
                        <!--{foreach from=$hot_goods item=goods}-->
                        <div class="goodsItem">
                            <span class="hot"></span>
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="f1">
                                <!-- {if $goods.promote_price neq ""} -->
                                <?php echo ($goods["promote_price"]); ?>
                                <!-- {else}-->
                                <?php echo ($goods["shop_price"]); ?>
                                <!--{/if}-->
                            </font>
                        </div>
                        <!--{/foreach}-->
                        <div class="more">
                            <a href="../search.php?intro=hot"><img src="<?php echo (SHOP_IMG_URL); ?>/more.gif" /></a>
                        </div>
                        <!-- {if $cat_rec_sign neq 1} -->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/auction.lbi" -->
            
            <!-- {if $auction_list} -->
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["auction_goods"]); ?></span><a href="auction.php"><img src="<?php echo (SHOP_IMG_URL); ?>/more.gif"></a></h3>
                    <div class="centerPadd">
                        <div class="clearfix goodsBox" style="border:none;">
                            <!--{foreach from=$auction_list item=auction}-->
                            <div class="goodsItem">
                                <a href="<?php echo ($auction["url"]); ?>"><img src="<?php echo ($auction["thumb"]); ?>" alt="<?php echo ($auction["goods_name"]); ?>" class="goodsimg" /></a>
                                <br />
                                <p><a href="<?php echo ($auction["url"]); ?>" title="<?php echo ($auction["goods_name"]); ?>"><?php echo ($auction["short_style_name"]); ?></a></p>
                                <font class="shop_s"><?php echo ($auction["formated_start_price"]); ?></font>
                            </div>
                            <!--{/foreach}-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/group_buy.lbi" -->
            
            <!-- {if $group_buy_goods} -->
            <div class="box">
                <div class="box_1">
                    <h3><span><?php echo ($lang["group_buy_goods"]); ?></span><a href="group_buy.php"><img src="<?php echo (SHOP_IMG_URL); ?>/more.gif"></a></h3>
                    <div class="centerPadd">
                        <div class="clearfix goodsBox" style="border:none;">
                            <!--{foreach from=$group_buy_goods item=goods}-->
                            <div class="goodsItem">
                                <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" class="goodsimg" /></a>
                                <br />
                                <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["goods_name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                                <font class="shop_s"><?php echo ($goods["last_price"]); ?></font>
                            </div>
                            <!--{/foreach}-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- {/if} -->
            <!-- #EndLibraryItem -->
            <!-- TemplateEndEditable -->
        </div>
        <!--right end-->
    </div>
    <div class="blank5"></div>
    <!--帮助-->
    <div class="block">
        <div class="box">
            <div class="helpTitBg clearfix">
                <!-- #BeginLibraryItem "/library/help.lbi" -->
                <!-- #EndLibraryItem -->
                
            </div>
        </div>
    </div>
    <div class="blank"></div>
    <!--帮助-->
    <!--友情链接 start-->
    <!--{if $img_links  or $txt_links }-->
    <div id="bottomNav" class="box">
        <div class="box_1">
            <div class="links clearfix">
                <!--开始图片类型的友情链接{foreach from=$img_links item=link}-->
                <a href="<?php echo ($link["url"]); ?>" target="_blank" title="<?php echo ($link["name"]); ?>"><img src="<?php echo ($link["logo"]); ?>" alt="<?php echo ($link["name"]); ?>" border="0" /></a>
                <!--结束图片类型的友情链接{/foreach}-->
                <!-- {if $txt_links} -->
                <!--开始文字类型的友情链接{foreach from=$txt_links item=link}-->
                [<a href="<?php echo ($link["url"]); ?>" target="_blank" title="<?php echo ($link["name"]); ?>"><?php echo ($link["name"]); ?></a>]
                <!--结束文字类型的友情链接{/foreach}-->
                <!-- {/if} -->
            </div>
        </div>
    </div>
    <!--{/if}-->
    <!--友情链接 end-->
    <div class="blank"></div>
    <!-- #BeginLibraryItem "/library/page_footer.lbi" -->
    <!-- #EndLibraryItem -->
    
</body>

</html>