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
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src='<?php echo (SHOP_JS_URL); ?>transport.js'></script>
<div class="cart" id="ECS_CARTINFO">
    <?php echo ($cart_info); ?>
</div>
<div class="blank5"></div>

            <!--  -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="box">
    <div class="box_1">
        <div id="category_tree">
            <?php if(is_array($categories)): foreach($categories as $key=>$cat): ?><dl>
                    <dt><a href="<?php echo ($cat["url"]); ?>"><?php echo ($cat["name"]); ?></a></dt>
                    <?php if(is_array($cat['cat_id'])): foreach($cat['cat_id'] as $cid_key=>$child): ?><dd><a href="<?php echo ($child["url"]); ?>"><?php echo ($child["name"]); ?></a></dd>
                        <?php if(is_array($child['cat_id'])): foreach($child['cat_id'] as $chi_key=>$childer): ?><dd>&nbsp;&nbsp;<a href="<?php echo ($childer["url"]); ?>"><?php echo ($childer["name"]); ?></a></dd><?php endforeach; endif; endforeach; endif; ?>
                </dl><?php endforeach; endif; ?>
        </div>
    </div>
</div>
<div class="blank5"></div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="box">
    <div class="box_2">
        <div class="top10Tit"></div>
        <div class="top10List clearfix">
            <?php if(is_array($top_goods)): foreach($top_goods as $key=>$goods): ?><ul class="clearfix">
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
                </ul><?php endforeach; endif; ?>
        </div>
    </div>
</div>
<div class="blank5"></div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($promotion_info)): ?><div class="box">
        <div class="box_1">
            <h3><span><?php echo ($lang["promotion_info"]); ?></span></h3>
            <div class="boxCenterList RelaArticle">
                <?php if(is_array($promotion_info)): foreach($promotion_info as $key=>$item): switch($item["type"]): case "": ?><a href="snatch.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["snatch_promotion"]); ?></a><?php break;?>
                        <?php case "": ?><a href="group_buy.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["group_promotion"]); ?></a><?php break;?>
                        <?php case "": ?><a href="auction.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["auction_promotion"]); ?></a><?php break;?>
                        <?php case "": ?><a href="activity.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["favourable_promotion"]); ?></a><?php break;?>
                        <?php case "": ?><a href="package.php" title="<?php echo ($lang["$item"]["type"]); ?>"><?php echo ($lang["package_promotion"]); ?></a><?php break;?>
                        <?php default: endswitch;?>
                    <a href="<?php echo ($item["url"]); ?>" title="<?php echo ($lang["$item"]["type"]); ?> <?php echo ($item["act_name"]); echo ($item["time"]); ?>" style="background:none; padding-left:0px;"><?php echo ($item["act_name"]); ?></a>
                    <br /><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <div class="blank5"></div><?php endif; ?>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(empty($order_query)): ?><script>
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
            </div>
        </div>
    </div>
<?php else: ?>
    <div id="ECS_ORDER_QUERY" style="margin-top:8px;">
        <?php if(!empty($order_query['user_id'])): ?><b><?php echo ($lang["order_number"]); ?>：</b><a href="user.php?act=order_detail&order_id=<?php echo ($order_query["order_id"]); ?>" class="f6"><?php echo ($order_query["order_sn"]); ?></a>
            <br>
            <?php else: ?>
            <b><?php echo ($lang["order_number"]); ?>：</b><?php echo ($order_query["order_sn"]); ?>
            <br><?php endif; ?>
        <b><?php echo ($lang["order_status"]); ?>：</b>
        <br>
        <font class="f1"><?php echo ($order_query["order_status"]); ?></font>
        <br>
        <?php if(!empty($order_query['invoice_no'])): ?><b><?php echo ($lang["consignment"]); ?>：</b><?php echo ($order_query["invoice_no"]); ?>
            <br><?php endif; ?>
        <?php if(!empty($order_query['shipping_date'])): ?><b><?php echo ($lang["shipping_date"]); ?>: </b><?php echo ($order_query["shipping_date"]); ?>
            <br><?php endif; ?>
    </div><?php endif; ?>
<div class="blank5"></div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($invoice_list)): ?><style type="text/css">
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
                <?php if(is_array($invoice_list)): foreach($invoice_list as $key=>$invoice): echo ($lang["order_number"]); ?> <?php echo ($invoice["order_sn"]); ?>
                    <br /> <?php echo ($lang["consignment"]); ?> <?php echo ($invoice["invoice_no"]); ?>
                    <div class="blank"></div><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <div class="blank5"></div><?php endif; ?>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php echo ($vote); ?>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

        </div>
        <!--left end-->
        <!--right start-->
        <div class="AreaR">
            <div class="box clearfix">
                <div class="box_1 clearfix">
                    <div class="f_l" id="focus">
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if($index_ad == 'sys' ): ?><script type="text/javascript">
    var swf_width = 484;
    var swf_height = 200;
    var shop_data_url = '<?php echo (SHOP_DATA_URL); ?>';
    </script>
    <script type="text/javascript" src="<?php echo (SHOP_DATA_URL); ?>flashdata/<?php echo ($flash_theme); ?>/cycle_image.js"></script>
<?php elseif($index_ad == 'cus' ): ?>
        <?php switch($ad['ad_type']): case "0": ?><a href="<?php echo ($ad["url"]); ?>" target="_blank"><img src="<?php echo ($ad["content"]); ?>" width="484" height="200" border="0"></a><?php break;?>
            <?php case "1": ?><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="484" height="200">
                    <param name="movie" value="<?php echo ($ad["content"]); ?>" />
                    <param name="quality" value="high" />
                    <embed src="<?php echo ($ad["content"]); ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="484" height="200"></embed>
                </object><?php break;?>
            <?php case "2": echo ($ad["content"]); break;?>
            <?php case "3": ?><a href="<?php echo ($ad["url"]); ?>" target="_blank"><?php echo ($ad["content"]); ?></a><?php break;?>
            <defalut/><?php endswitch; endif; ?>

                    </div>
                    <div id="mallNews" class="f_r">
                        <div class="NewsTit"></div>
                        <div class="NewsList tc">
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<ul>
    <?php if(is_array($new_articles)): foreach($new_articles as $key=>$article): ?><li>
            [<a href="<?php echo ($article["cat_url"]); ?>"><?php echo ($article["cat_name"]); ?></a>] <a href="<?php echo ($article["url"]); ?>" title="<?php echo ($article["title"]); ?>"><?php echo (mb_substr($article["short_title"],0,10,'utf-8')); ?></a>
        </li><?php endforeach; endif; ?>
</ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!--今日特价，品牌 start-->
            <div class="clearfix">
                <!--特价-->
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($promotion_goods)): ?><div id="sales" class="f_l clearfix">
        <h1><a href="../search.php?intro=promotion"><img src="image/more.gif" /></a></h1>
        <div class="clearfix goodBox">
            <?php if(is_array($promotion_goods)): foreach($promotion_goods as $key=>$goods): if($key <= 3): ?><div class="goodList">
                        <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" border="0" alt="<?php echo ($goods["name"]); ?>" /></a>
                        <br />
                        <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_name"]); ?></a></p>
                        <?php echo ($lang["promote_price"]); ?>
                        <font class="f1"><?php echo ($goods["promote_price"]); ?></font>
                    </div><?php endif; endforeach; endif; ?>
        </div>
    </div><?php endif; ?>
                <!--品牌-->
                <div class="box f_r brandsIe6">
                    <div class="box_1 clearfix" id="brands">
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($brand_list)): if(is_array($brand_list)): foreach($brand_list as $key=>$brand): if($key < 11): if(!empty($brand['brand_logo'])): ?><a href="<?php echo ($brand["url"]); ?>"><img src="<?php echo (SHOP_DATA_URL); ?>brandlogo/<?php echo ($brand["brand_logo"]); ?>" alt="<?php echo ($brand["brand_name"]); ?> (<?php echo ($brand["goods_num"]); ?>)" /></a>
                <?php else: ?>
                <?php if(empty($brand['goods_num'])): ?><a href="<?php echo ($brand["url"]); ?>"><?php echo ($brand["brand_name"]); ?></a>
                    <?php else: ?>
                    <a href="<?php echo ($brand["url"]); ?>"><?php echo ($brand["brand_name"]); ?> (<?php echo ($brand['goods_num']); ?>) </a><?php endif; endif; endif; endforeach; endif; ?>
    <div class="brandsMore">
        <a href="../brand.php"><img src="<?php echo (SHOP_IMG_URL); ?>moreBrands.gif" /></a>
    </div><?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="blank5"></div>
            <!-- TemplateBeginEditable name="右边主区域" -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($best_goods)): if($cat_rec_sign != 1): ?><div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit" id="itemBest">
                    <?php if(!empty($cat_rec[1])): ?><h2><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, 0);"><?php echo ($lang["all_goods"]); ?></a></h2>
                        <?php if(is_array($cat_rec[1])): foreach($cat_rec[1] as $key=>$rec_data): ?><h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'h2', this);get_cat_recommend(1, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2><?php endforeach; endif; endif; ?>
                </div>
                <div id="show_best_area" class="clearfix goodsBox">
                    <?php if(is_array($best_goods)): foreach($best_goods as $key=>$goods): ?><div class="goodsItem">
                            <span class="best"></span>
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="f1">
                                <?php if(!empty($goods['promote_price'])): echo ($goods["promote_price"]); ?>
                                    <?php else: ?> <?php echo ($goods["shop_price"]); endif; ?>
                            </font>
                        </div><?php endforeach; endif; ?>
                    <div class="more">
                        <a href="../search.php?intro=best">
                            <img src="<?php echo (SHOP_IMG_URL); ?>more.gif" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
        <?php else: ?>
        <?php if(is_array($best_goods)): foreach($best_goods as $key=>$goods): ?><div class="goodsItem">
                <span class="best"></span>
                <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                <br />
                <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                <font class="f1">
                    <?php if(!empty($goods['promote_price'])): echo ($goods["promote_price"]); ?>
                        <?php else: ?> <?php echo ($goods["shop_price"]); endif; ?>
                </font>
            </div><?php endforeach; endif; ?>
        <div class="more">
            <a href="../search.php?intro=best"><img src="image/more.gif" /></a>
        </div><?php endif; endif; ?>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($new_goods)): if($cat_rec_sign != 1): ?><div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit New" id="itemNew">
                    <?php if(!empty($cat_rec[2])): ?><h2><a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, 0);"><?php echo ($lang["all_goods"]); ?></a></h2>
                        <?php if(is_array($cat_rec[2])): foreach($cat_rec[2] as $key=>$rec_data): ?><h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemNew', 'h2', this);get_cat_recommend(2, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2><?php endforeach; endif; endif; ?>
                </div>
                <div id="show_new_area" class="clearfix goodsBox">
                    <?php if(is_array($new_goods)): foreach($new_goods as $key=>$goods): ?><div class="goodsItem">
                            <span class="best"></span>
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="f1">
                                <?php if(!empty($goods['promote_price'])): echo ($goods["promote_price"]); ?>
                                    <?php else: ?> <?php echo ($goods["shop_price"]); endif; ?>
                            </font>
                        </div><?php endforeach; endif; ?>
                    <div class="more">
                        <a href="../search.php?intro=new">
                            <img src="<?php echo (SHOP_IMG_URL); ?>more.gif" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
        <?php else: ?>
        <?php if(is_array($new_goods)): foreach($new_goods as $key=>$goods): ?><div class="goodsItem">
                <span class="best"></span>
                <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                <br />
                <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                <font class="f1">
                    <?php if(!empty($goods['promote_price'])): echo ($goods["promote_price"]); ?>
                        <?php else: ?> <?php echo ($goods["shop_price"]); endif; ?>
                </font>
            </div><?php endforeach; endif; ?>
        <div class="more">
            <a href="../search.php?intro=new"><img src="image/more.gif" /></a>
        </div><?php endif; endif; ?>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($hot_goods)): if($cat_rec_sign != 1): ?><div class="box">
            <div class="box_2 centerPadd">
                <div class="itemTit Hot" id="itemHot">
                    <?php if(!empty($cat_rec[3])): ?><h2><a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, 0);"><?php echo ($lang["all_goods"]); ?></a></h2>
                        <?php if(is_array($cat_rec[3])): foreach($cat_rec[3] as $key=>$rec_data): ?><h2 class="h2bg"><a href="javascript:void(0)" onclick="change_tab_style('itemHot', 'h2', this);get_cat_recommend(3, <?php echo ($rec_data["cat_id"]); ?>)"><?php echo ($rec_data["cat_name"]); ?></a></h2><?php endforeach; endif; endif; ?>
                </div>
                <div id="show_hot_area" class="clearfix goodsBox">
                    <?php if(is_array($hot_goods)): foreach($hot_goods as $key=>$goods): ?><div class="goodsItem">
                            <span class="best"></span>
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="f1">
                                <?php if(!empty($goods['promote_price'])): echo ($goods["promote_price"]); ?>
                                    <?php else: ?> <?php echo ($goods["shop_price"]); endif; ?>
                            </font>
                        </div><?php endforeach; endif; ?>
                    <div class="more">
                        <a href="../search.php?intro=hot">
                            <img src="<?php echo (SHOP_IMG_URL); ?>more.gif" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="blank5"></div>
        <?php else: ?>
        <?php if(is_array($hot_goods)): foreach($hot_goods as $key=>$goods): ?><div class="goodsItem">
                <span class="best"></span>
                <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a>
                <br />
                <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                <font class="f1">
                    <?php if(!empty($goods['promote_price'])): echo ($goods["promote_price"]); ?>
                        <?php else: ?> <?php echo ($goods["shop_price"]); endif; ?>
                </font>
            </div><?php endforeach; endif; ?>
        <div class="more">
            <a href="../search.php?intro=hot"><img src="image/more.gif" /></a>
        </div><?php endif; endif; ?>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($auction_list)): ?><div class="box">
        <div class="box_1">
            <h3><span><?php echo ($lang["auction_goods"]); ?></span><a href="auction.php"><img src="<?php echo (SHOP_IMG_URL); ?>more.gif"></a></h3>
            <div class="centerPadd">
                <div class="clearfix goodsBox" style="border:none;">
                    <?php if(is_array($auction_list)): foreach($auction_list as $key=>$auction): ?><div class="goodsItem">
                            <a href="<?php echo ($auction["url"]); ?>"><img src="<?php echo ($auction["thumb"]); ?>" alt="<?php echo ($auction["goods_name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($auction["url"]); ?>" title="<?php echo ($auction["goods_name"]); ?>"><?php echo ($auction["short_style_name"]); ?></a></p>
                            <font class="shop_s"><?php echo ($auction["formated_start_price"]); ?></font>
                        </div><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="blank5"></div><?php endif; ?>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if(!empty($group_buy_goods)): ?><div class="box">
        <div class="box_1">
            <h3><span><?php echo ($lang["group_buy_goods"]); ?></span><a href="group_buy.php"><img src="<?php echo (SHOP_IMG_URL); ?>more.gif" /></a></h3>
            <div class="centerPadd">
                <div class="clearfix goodsBox" style="border:none;">
                    <?php if(is_array($group_buy_goods)): foreach($group_buy_goods as $key=>$goods): ?><div class="goodsItem">
                            <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["goods_name"]); ?>" class="goodsimg" /></a>
                            <br />
                            <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["goods_name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
                            <font class="shop_s"><?php echo ($goods["last_price"]); ?></font>
                        </div><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="blank5"></div><?php endif; ?>

            <!-- TemplateEndEditable -->
        </div>
        <!--right end-->
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