<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
var process_request = "<?php echo ($lang["process_request"]); ?>";
</script>
<div class="block clearfix">
    <div class="f_l">
        <a href="../index.php" name="top"><img src="<?php echo (SHOP_IMG_URL); ?>logo.gif" /></a>
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
        <a href="user.php"><?php echo ($lang["user_center"]); ?></a>|
        <a href="user.php?act=logout"><?php echo ($lang["user_logout"]); ?></a>
    </font>
    <?php else: ?> <?php echo ($lang["welcome"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="user.php"><img src="<?php echo (SHOP_IMG_URL); ?>/bnt_log.gif" /></a>
    <a href="user.php?act=register"><img src="<?php echo (SHOP_IMG_URL); ?>/bnt_reg.gif" /></a><?php endif; ?>

                </font>
            </li>
            <!--{if $navigator_list.top}-->
            <li id="topNav" class="clearfix">
                <!-- {foreach name=nav_top_list from=$navigator_list.top item=nav} -->
                <a href="<?php echo ($nav["url"]); ?>" <!-- {if $nav.opennew eq 1} --> target="_blank" <!-- {/if} -->><?php echo ($nav["name"]); ?></a>
                <!-- {if !$smarty.foreach.nav_top_list.last} -->
                |
                <!-- {/if} -->
                <!-- {/foreach} -->
                <div class="topNavR"></div>
            </li>
            <!-- {/if} -->
        </ul>
    </div>
</div>
<div class="blank"></div>
<div id="mainNav" class="clearfix">
    <a href="../index.php" {if $navigator_list.config.index eq 1} class="cur" {/if}><?php echo ($lang["home"]); ?><span></span></a>
    <!-- {foreach name=nav_middle_list from=$navigator_list.middle item=nav} -->
    <a href="<?php echo ($nav["url"]); ?>" {if $nav.opennew eq 1}target="_blank" {/if} {if $nav.active eq 1} class="cur" {/if}><?php echo ($nav["name"]); ?><span></span></a>
    <!-- {/foreach} -->
</div>
<!--search start-->
<div id="search" class="clearfix">
    <div class="keys f_l">
        <script type="text/javascript">
        {
            literal
        }
        <!--
        function checkSearchForm() {
            if (document.getElementById('keyword').value) {
                return true;
            } else {
                alert("<?php echo ($lang["no_keywords"]); ?>");
                return false;
            }
        }
        -->
        {
            /literal}
        </script>
        {if $searchkeywords} <?php echo ($lang["hot_search"]); ?> ： {foreach from=$searchkeywords item=val}
        <a href="search.php?keywords=<?php echo ($val); ?>"><?php echo ($val); ?></a> {/foreach} {/if}
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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
{insert_scripts files='transport.js'}
<div class="cart" id="ECS_CARTINFO">
 {insert name='cart_info'}
</div>
<div class="blank5"></div>

            <div class="cart" id="ECS_CARTINFO">
                <!-- {insert name='cart_info'} -->
                <?php echo ($cartinfo); ?>
            </div>
            <div class="blank5"></div>
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/category_tree.lbi" -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="box">
 <div class="box_2">
  <div class="top10Tit"></div>
  <div class="top10List clearfix">
  <!-- {foreach name=top_goods from=$top_goods item=goods}-->
  <ul class="clearfix">
	<img src="../image/top_<?php echo ($smarty["foreach"]["top_goods"]["iteration"]); ?>.gif" class="iteration" />
	<!-- {if $smarty.foreach.top_goods.iteration<4}-->
      <li class="topimg">
      <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="samllimg" /></a>
      </li>
	<!-- {/if} -->		
      <li {if $smarty.foreach.top_goods.iteration<4}class="iteration1"{/if}>
      <a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_name"]); ?></a><br />
      <?php echo ($lang["shop_price"]); ?><font class="f1"><?php echo ($goods["price"]); ?></font><br />
      </li>
    </ul>
  <!-- {/foreach} -->
  </div>
 </div>
</div>
<div class="blank5"></div>

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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <!-- {elseif $item.type eq "package"} -->
    <a href="package.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["package_promotion"]); ?></a>
    <!-- {/if} -->
    <a href="<?php echo ($item["url"]); ?>" title="<?php echo ($lang["$item"]["type"]); ?> <?php echo ($item["act_name"]); echo ($item["time"]); ?>" style="background:none; padding-left:0px;"><?php echo ($item["act_name"]); ?></a><br />
    <!-- {/foreach} -->
  </div>
 </div>
</div>
<div class="blank5"></div>
<!-- {/if} -->
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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--{if empty($order_query)}-->
<script>var invalid_order_sn = "<?php echo ($lang["invalid_order_sn"]); ?>"</script>
<div class="box">
 <div class="box_1">
  <h3><span><?php echo ($lang["order_query"]); ?></span></h3>
  <div class="boxCenterList">
    <form name="ecsOrderQuery">
    <input type="text" name="order_sn" class="inputBg" /><br />
    <div class="blank5"></div>
    <input type="button" value="<?php echo ($lang["query_order"]); ?>" class="bnt_blue_2" onclick="orderQuery()" />
    </form>
    <div id="ECS_ORDER_QUERY" style="margin-top:8px;">
      <!--{else}-->
      <!--{if $order_query.user_id}-->
<b><?php echo ($lang["order_number"]); ?>：</b><a href="user.php?act=order_detail&order_id=<?php echo ($order_query["order_id"]); ?>" class="f6"><?php echo ($order_query["order_sn"]); ?></a><br>
  <!--{else}-->
<b><?php echo ($lang["order_number"]); ?>：</b><?php echo ($order_query["order_sn"]); ?><br>
  <!--{/if}-->
<b><?php echo ($lang["order_status"]); ?>：</b><br><font class="f1"><?php echo ($order_query["order_status"]); ?></font><br>
  <!--{if $order_query.invoice_no }-->
<b><?php echo ($lang["consignment"]); ?>：</b><?php echo ($order_query["invoice_no"]); ?><br>
  <!--{/if}-->
      {if $order_query.shipping_date}：<?php echo ($lang["shipping_date"]); ?> <?php echo ($order_query["shipping_date"]); ?><br>
  <!--{/if}-->
  <!--{/if}-->
    </div>
  </div>
 </div>
</div>
<div class="blank5"></div>

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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--{if $invoice_list}-->
<style type="text/css">
.boxCenterList form{display:inline;}
.boxCenterList form a{color:#404040; text-decoration:underline;}
</style>
<div class="box">
 <div class="box_1">
  <h3><span><?php echo ($lang["shipping_query"]); ?></span></h3>
  <div class="boxCenterList">
    <!-- 发货单查询{foreach from=$invoice_list item=invoice} -->
   <?php echo ($lang["order_number"]); ?> <?php echo ($invoice["order_sn"]); ?><br />
   <?php echo ($lang["consignment"]); ?> <?php echo ($invoice["invoice_no"]); ?>
   <div class="blank"></div>
   <!-- 结束发货单查询{/foreach}-->
  </div>
 </div>
</div>
<div class="blank5"></div>
<!-- {/if} -->
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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
{insert name='vote'} {insert name='vote'}
            <!-- #EndLibraryItem -->
            <!-- #BeginLibraryItem "/library/email_list.lbi" -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="box">
 <div class="box_1">
  <h3><span><?php echo ($lang["email_subscribe"]); ?></span></h3>
  <div class="boxCenterList RelaArticle">
    <input type="text" id="user_email" class="inputBg" /><br />
    <div class="blank5"></div>
    <input type="button" class="bnt_blue" value="<?php echo ($lang["email_list_ok"]); ?>" onclick="add_email_list();" />
    <input type="button" class="bnt_bonus"  value="<?php echo ($lang["email_list_cancel"]); ?>" onclick="cancel_email_list();" />
  </div>
 </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
var email = document.getElementById('user_email');
function add_email_list()
{
  if (check_email())
  {
    Ajax.call('user.php?act=email_list&job=add&email=' + email.value, '', rep_add_email_list, 'GET', 'TEXT');
  }
}
function rep_add_email_list(text)
{
  alert(text);
}
function cancel_email_list()
{
  if (check_email())
  {
    Ajax.call('user.php?act=email_list&job=del&email=' + email.value, '', rep_cancel_email_list, 'GET', 'TEXT');
  }
}
function rep_cancel_email_list(text)
{
  alert(text);
}
function check_email()
{
  if (Utils.isEmail(email.value))
  {
    return true;
  }
  else
  {
    alert('<?php echo ($lang["email_invalid"]); ?>');
    return false;
  }
}
</script>

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
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $index_ad eq 'sys'} -->
  <script type="text/javascript">
  var swf_width=484;
  var swf_height=200;
  </script>
  <script type="text/javascript" src="data/flashdata/<?php echo ($flash_theme); ?>/cycle_image.js"></script>
<!-- {elseif $index_ad eq 'cus'} -->
  <!-- {if $ad.ad_type eq 0} -->
    <a href="<?php echo ($ad["url"]); ?>" target="_blank"><img src="<?php echo ($ad["content"]); ?>" width="484" height="200" border="0"></a>
  <!-- {elseif $ad.ad_type eq 1} -->
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="484" height="200">
      <param name="movie" value="<?php echo ($ad["content"]); ?>" />
      <param name="quality" value="high" />
      <embed src="<?php echo ($ad["content"]); ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="484" height="200"></embed>
    </object>
  <!-- {elseif $ad.ad_type eq 2} -->
    <?php echo ($ad["content"]); ?>
  <!-- {elseif $ad.ad_type eq 3} -->
    <a href="<?php echo ($ad["url"]); ?>" target="_blank"><?php echo ($ad["content"]); ?></a>
  <!-- {/if} -->
<!-- {else} -->
<!-- {/if} -->
                    </div>
                    <!--news-->
                    <div id="mallNews" class="f_r">
                        <div class="NewsTit"></div>
                        <div class="NewsList tc">
                            <!-- TemplateBeginEditable name="站内快讯上广告位（宽：210px）" -->
                            <!-- TemplateEndEditable -->
                            <!-- #BeginLibraryItem "/library/new_articles.lbi" -->
                            <!-- #EndLibraryItem -->
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<ul>
<!--{foreach from=$new_articles item=article}-->
  <li>
	[<a href="<?php echo ($article["cat_url"]); ?>"><?php echo ($article["cat_name"]); ?></a>] <a href="<?php echo ($article["url"]); ?>" title="<?php echo ($article["title"]); ?>"><?php echo (mb_substr($article["short_title"],0,10,'utf-8')); ?>}</a>
	</li>
<!--{/foreach}-->
</ul>
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
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $promotion_goods} -->
<div id="sales" class="f_l clearfix">
      <h1><a href="../search.php?intro=promotion"><img src="image/more.gif" /></a></h1>
       <div class="clearfix goodBox">
         <!--{foreach from=$promotion_goods item=goods name="promotion_foreach"}-->
         {if $smarty.foreach.promotion_foreach.index <= 3}
           <div class="goodList">
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" border="0" alt="<?php echo ($goods["name"]); ?>"/></a><br />
					 <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_name"]); ?></a></p>
           <?php echo ($lang["promote_price"]); ?><font class="f1"><?php echo ($goods["promote_price"]); ?></font>
           </div>
         {/if}
         <!--{/foreach}-->
       </div>
      </div>
<!-- {/if} -->
                <!--品牌-->
                <div class="box f_r brandsIe6">
                    <div class="box_1 clearfix" id="brands">
                        <!-- #BeginLibraryItem "/library/brands.lbi" -->
                        <!-- #EndLibraryItem -->
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $brand_list} -->
  <!-- {foreach from=$brand_list item=brand name="brand_foreach"} -->
    {if $smarty.foreach.brand_foreach.index <= 11}
      <!-- {if $brand.brand_logo} -->
        <a href="<?php echo ($brand["url"]); ?>"><img src="data/brandlogo/<?php echo ($brand["brand_logo"]); ?>" alt="<?php echo ($brand["brand_name"]); ?> (<?php echo ($brand["goods_num"]); ?>)" /></a>
      <!-- {else} -->
        <a href="<?php echo ($brand["url"]); ?>"><?php echo ($brand["brand_name"]); ?> {if $brand.goods_num}(<?php echo ($brand["goods_num"]); ?>){/if}</a>
      <!-- {/if} -->
    {/if}
  <!-- {/foreach} -->
<div class="brandsMore"><a href="../brand.php"><img src="image/moreBrands.gif" /></a></div>
<!-- {/if} -->
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- TemplateBeginEditable name="右边主区域" -->
            <!-- #BeginLibraryItem "/library/recommend_best.lbi" -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $best_goods} -->
<!-- {if $cat_rec_sign neq 1} -->
<div class="box">
<div class="box_2 centerPadd">
  <div class="itemTit" id="itemBest">
      {if $cat_rec[1]}
      <h2><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, 0);"><?php echo ($lang["all_goods"]); ?></a></h2>
      {foreach from=$cat_rec[1] item=rec_data}
      <h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2>
      {/foreach}
      {/if}
  </div>
  <div id="show_best_area" class="clearfix goodsBox">
  <!-- {/if} -->
  <!--{foreach from=$best_goods item=goods}-->
  <div class="goodsItem">
         <span class="best"></span>
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a><br />
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
  <div class="more"><a href="../search.php?intro=best"><img src="image/more.gif" /></a></div>
  <!-- {if $cat_rec_sign neq 1} -->
  </div>
</div>
</div>
<div class="blank5"></div>
  <!-- {/if} -->
<!-- {/if} -->

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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $new_goods} -->
<!-- {if $cat_rec_sign neq 1} -->
<div class="box">
<div class="box_2 centerPadd">
  <div class="itemTit New" id="itemNew">
      {if $cat_rec[2]}
      <h2><a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, 0);"><?php echo ($lang["all_goods"]); ?></a></h2>
      {foreach from=$cat_rec[2] item=rec_data}
      <h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2>
      {/foreach}
      {/if}
  </div>
  <div id="show_new_area" class="clearfix goodsBox">
  <!-- {/if} -->
  <!--{foreach from=$new_goods item=goods}-->
  <div class="goodsItem">
         <span class="news"></span>
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a><br />
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
  <div class="more"><a href="../search.php?intro=new"><img src="image/more.gif" /></a></div>
  <!-- {if $cat_rec_sign neq 1} -->
  </div>
</div>
</div>
<div class="blank5"></div>
  <!-- {/if} -->
<!-- {/if} -->

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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $hot_goods} -->
<!-- {if $cat_rec_sign neq 1} -->
<div class="box">
<div class="box_2 centerPadd">
  <div class="itemTit Hot" id="itemHot">
      {if $cat_rec[3]}
      <h2><a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, 0);"><?php echo ($lang["all_goods"]); ?></a></h2>
      {foreach from=$cat_rec[3] item=rec_data}
      <h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2>
      {/foreach}
      {/if}
  </div>
  <div id="show_hot_area" class="clearfix goodsBox">
  <!-- {/if} -->
  <!--{foreach from=$hot_goods item=goods}-->
  <div class="goodsItem">
         <span class="hot"></span>
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a><br />
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
  <div class="more"><a href="../search.php?intro=hot"><img src="image/more.gif" /></a></div>
  <!-- {if $cat_rec_sign neq 1} -->
  </div>
</div>
</div>
<div class="blank5"></div>
  <!-- {/if} -->
<!-- {/if} -->

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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $auction_list} -->
<div class="box">
 <div class="box_1">
  <h3><span><?php echo ($lang["auction_goods"]); ?></span><a href="auction.php"><img src="../image/more.gif"></a></h3>
    <div class="centerPadd">
    <div class="clearfix goodsBox" style="border:none;">
      <!--{foreach from=$auction_list item=auction}-->
      <div class="goodsItem">
           <a href="<?php echo ($auction["url"]); ?>"><img src="<?php echo ($auction["thumb"]); ?>" alt="<?php echo ($auction["goods_name"]); ?>" class="goodsimg" /></a><br />
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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- {if $group_buy_goods} -->
<div class="box">
 <div class="box_1">
  <h3><span><?php echo ($lang["group_buy_goods"]); ?></span><a href="group_buy.php"><img src="../image/more.gif"></a></h3>
    <div class="centerPadd">
    <div class="clearfix goodsBox" style="border:none;">
      <!--{foreach from=$group_buy_goods item=goods}-->
      <div class="goodsItem">
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" class="goodsimg" /></a><br />
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
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--{if $helps}-->
<!-- {foreach from=$helps item=help_cat} -->
<dl>
  <dt><a href='<?php echo ($help_cat["cat_id"]); ?>' title="<?php echo ($help_cat["cat_name"]); ?>"><?php echo ($help_cat["cat_name"]); ?></a></dt>
  <!-- {foreach from=$help_cat.article item=item} -->
  <dd><a href="<?php echo ($item["url"]); ?>" title="<?php echo ($item["title"]); ?>"><?php echo ($item["short_title"]); ?></a></dd>
  <!-- {/foreach} -->
</dl>
<!-- {/foreach} -->
<!--{/if}-->
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--底部导航 start-->
<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="bNavList clearfix">
   <div class="f_l">
   <!-- {if $navigator_list.bottom} -->
   <!-- {foreach name=nav_bottom_list from=$navigator_list.bottom item=nav} -->
        <a href="<?php echo ($nav["url"]); ?>" <!-- {if $nav.opennew eq 1} --> target="_blank" <!-- {/if} -->><?php echo ($nav["name"]); ?></a>
        <!-- {if !$smarty.foreach.nav_bottom_list.last} -->
           -
        <!-- {/if} -->
      <!-- {/foreach} -->
  <!-- {/if} -->
   </div>
   <div class="f_r">
   <a href="#top"><img src="image/bnt_top.gif" /></a> <a href="../index.php"><img src="image/bnt_home.gif" /></a>
   </div>
  </div>
 </div>
</div>
<!--底部导航 end-->
<div class="blank"></div>
<!--版权 start-->
<div id="footer">
 <div class="text">
 <?php echo ($copyright); ?><br />
 <?php echo ($shop_address); ?> <?php echo ($shop_postcode); ?>
 <!-- 客服电话{if $service_phone} -->
      Tel: <?php echo ($service_phone); ?>
 <!-- 结束客服电话{/if} -->
 <!-- 邮件{if $service_email} -->
      E-mail: <?php echo ($service_email); ?><br />
 <!-- 结束邮件{/if} -->
 <!-- QQ 号码 {foreach from=$qq item=im} -->
      <!-- {if $im} -->
      <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo ($im); ?>&amp;Site=<?php echo ($shop_name); ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo ($im); ?>:4" height="16" border="0" alt="QQ" /> <?php echo ($im); ?></a>
      <!-- {/if} -->
      <!-- {/foreach} 结束QQ号码 -->
      <!-- 淘宝旺旺 {foreach from=$ww item=im} -->
      <!-- {if $im} -->
      <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo ($im); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo ($im); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo ($im); ?></a>
      <!-- {/if} -->
      <!--{/foreach} 结束淘宝旺旺 -->
      <!-- Yahoo Messenger {foreach from=$ym item=im} -->
      <!-- {if $im} -->
      <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo ($im); ?>n&.src=pg" target="_blank"><img src="../image/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo ($im); ?></a>
      <!-- {/if} -->
      <!-- {/foreach} 结束Yahoo Messenger -->
      <!-- MSN Messenger {foreach from=$msn item=im} -->
      <!-- {if $im} -->
      <img src="../image/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact=<?php echo ($im); ?>"><?php echo ($im); ?></a>
      <!-- {/if} -->
      <!-- {/foreach} 结束MSN Messenger -->
      <!-- Skype {foreach from=$skype item=im} -->
      <!-- {if $im} -->
      <img src="http://mystatus.skype.com/smallclassic/<?php echo ($im); ?>" alt="Skype" /><a href="skype:<?php echo ($im); ?>?call"><?php echo ($im); ?></a>
      <!-- {/if} -->
  <!-- {/foreach} --><br />
  <!-- ICP 证书{if $icp_number} -->
  <?php echo ($lang["icp_number"]); ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo ($icp_number); ?></a><br />
  <!-- 结束ICP 证书{/if} -->
  {insert name='query_info'}<br />
  {foreach from=$lang.p_y item=pv}<?php echo ($pv); ?>{/foreach}<?php echo ($licensed); ?><br />
    {if $stats_code}
    <div align="left"><?php echo ($stats_code); ?></div>
    {/if}
    <div align="left"  id="rss"><a href="<?php echo ($feed_url); ?>"><img src="../image/xml_rss2.gif" alt="rss" /></a></div>
 </div>
</div>


</body>

</html>