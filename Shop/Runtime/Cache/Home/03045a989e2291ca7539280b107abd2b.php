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

    <script src='<?php echo (SHOP_JS_URL); ?>common.js'></script>
    <script src='<?php echo (SHOP_JS_URL); ?>shopping_flow.js'></script>
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
    <div class="block">
        <?php switch($step): case "cart": ?><script src='<?php echo (SHOP_JS_URL); ?>showdiv.js'>
</script>

<div class="flowBox">
    <h6><span><?php echo ($lang["goods_list"]); ?></span></h6>
    <form id="formCart" name="formCart" method="post" action="flow.php">
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <th bgcolor="#ffffff"><?php echo ($lang["goods_name"]); ?></th>
                <?php if($show_goods_attribute == 1): ?><th bgcolor="#ffffff"><?php echo ($lang["goods_attr"]); ?></th><?php endif; ?>
                <?php if(!empty($show_marketprice)): ?><th bgcolor="#ffffff"><?php echo ($lang["market_prices"]); ?></th><?php endif; ?>
                <th bgcolor="#ffffff"><?php echo ($lang["shop_prices"]); ?></th>
                <th bgcolor="#ffffff"><?php echo ($lang["number"]); ?></th>
                <th bgcolor="#ffffff"><?php echo ($lang["subtotal"]); ?></th>
                <th bgcolor="#ffffff"><?php echo ($lang["handle"]); ?></th>
            </tr>
            <?php if(is_array($goods_list)): foreach($goods_list as $key=>$goods): ?><tr>
                    <td bgcolor="#ffffff" align="center">
                        <?php if($goods["goods_id"] > 0): if($goods["extension_code"] != 'package_buy'): if($show_goods_thumb == 1): ?><a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($goods["goods_name"]); ?></a>
                                    <?php elseif($show_goods_thumb == 2): ?>
                                    <a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" target="_blank"><img src="<?php echo ($goods["goods_thumb"]); ?>" border="0" title="<?php echo ($goods["goods_name"]); ?>" /></a>
                                    <?php else: ?>
                                    <a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" target="_blank"><img src="<?php echo ($goods["goods_thumb"]); ?>" border="0" title="<?php echo ($goods["goods_name"]); ?>" /></a>
                                    <br />
                                    <a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($goods["goods_name"]); ?></a><?php endif; ?>
                                <?php if($goods["parent_id"] > 0): ?><span style="color:#FF0000">（<?php echo ($lang["accessories"]); ?>）</span><?php endif; ?>
                                <?php if($goods["is_gift"] > 0): ?><span style="color:#FF0000">（<?php echo ($lang["largess"]); ?>）</span><?php endif; ?>
                                <?php else: ?>
                                <a href="javascript:void(0)" onclick="setSuitShow(<?php echo ($goods["goods_id"]); ?>)" class="f6"><?php echo ($goods["goods_name"]); ?><span style="color:#FF0000;">（<?php echo ($lang["remark_package"]); ?>）</span></a>
                                <div id="suit_<?php echo ($goods["goods_id"]); ?>" style="display:none">
                                    <?php if(is_array($goods['package_goods_list'])): foreach($goods['package_goods_list'] as $key=>$package_goods_list): ?><a href="goods.php?id=<?php echo ($package_goods_list["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($package_goods_list["goods_name"]); ?></a>
                                        <br /><?php endforeach; endif; ?>
                                </div><?php endif; ?>
                            <?php else: ?> <?php echo ($goods["goods_name"]); endif; ?>
                    </td>
                    <?php if($show_goods_attribute == 1): ?><td bgcolor="#ffffff"><?php echo (nl2br($goods["goods_attr"])); ?></td><?php endif; ?>
                    <?php if(!empty($show_marketprice)): ?><td align="right" bgcolor="#ffffff"><?php echo ($goods["market_price"]); ?></td><?php endif; ?>
                    <td align="right" bgcolor="#ffffff"><?php echo ($goods["goods_price"]); ?></td>
                    <td align="right" bgcolor="#ffffff">
                        <?php if(($goods["goods_id"] > 0) && ($goods["is_gift"] == 0) && ($goods["parent_id"] == 0)): ?><input type="text" name="goods_number[<?php echo ($goods["rec_id"]); ?>]" id="goods_number_<?php echo ($goods["rec_id"]); ?>" value="<?php echo ($goods["goods_number"]); ?>" size="4" class="inputBg" style="text-align:center " onkeydown="showdiv(this)" />
                            <?php else: ?> <?php echo ($goods["goods_number"]); endif; ?>
                    </td>
                    <td align="right" bgcolor="#ffffff"><?php echo ($goods["subtotal"]); ?></td>
                    <td align="center" bgcolor="#ffffff">
                        <a href="javascript:if (confirm('<?php echo ($lang["drop_goods_confirm"]); ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo ($goods["rec_id"]); ?>'; " class="f6"><?php echo ($lang["drop"]); ?></a>
                        <?php if(($_SESSION['user_id']> 0) && ($goods["extension_code"] != 'package_buy')): ?><a href="javascript:if (confirm('<?php echo ($lang["drop_goods_confirm"]); ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo ($goods["rec_id"]); ?>'; " class="f6"><?php echo ($lang["drop_to_collect"]); ?></a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <td bgcolor="#ffffff">
                    <?php if($discount > 0): echo ($your_discount); ?>
                        <br /><?php endif; ?>
                    <?php echo ($shopping_money); ?>
                    <?php if(!empty($show_marketprice)): ?>，<?php echo ($market_price_desc); endif; ?>
                </td>
                <td align="right" bgcolor="#ffffff">
                    <input type="button" value="<?php echo ($lang["clear_cart"]); ?>" class="bnt_blue_1" onclick="location.href='flow.php?step=clear'" />
                    <input name="submit" type="submit" class="bnt_blue_1" value="<?php echo ($lang["update_cart"]); ?>" />
                </td>
            </tr>
        </table>
        <input type="hidden" name="step" value="update_cart" />
    </form>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
        <tr>
            <td bgcolor="#ffffff">
                <a href="./"><img src="images/continue.gif" alt="continue" /></a>
            </td>
            <td bgcolor="#ffffff" align="right">
                <a href="flow.php?step=checkout"><img src="images/checkout.gif" alt="checkout" /></a>
            </td>
        </tr>
    </table>
    <!-- {if $smarty.session.user_id gt 0} -->
    <!-- {insert_scripts files='transport.js'}
    <script type="text/javascript" charset="utf-8">
    function collect_to_flow(goodsId) {
        var goods = new Object();
        var spec_arr = new Array();
        var fittings_arr = new Array();
        var number = 1;
        goods.spec = spec_arr;
        goods.goods_id = goodsId;
        goods.number = number;
        goods.parent = 0;
        Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
    }

    function collect_to_flow_response(result) {
        if (result.error > 0) {
            // 如果需要缺货登记，跳转
            if (result.error == 2) {
                if (confirm(result.message)) {
                    location.href = 'user.php?act=add_booking&id=' + result.goods_id;
                }
            } else if (result.error == 6) {
                openSpeDiv(result.message, result.goods_id);
            } else {
                alert(result.message);
            }
        } else {
            location.href = 'flow.php';
        }
    }
    </script> -->
</div>
<div class="blank"></div>
<!-- {/if} -->
<?php if(!empty($collection_goods)): ?><div class="flowBox">
        <h6><span><?php echo ($lang["label_collection"]); ?></span></h6>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <?php if(is_array($collection_goods)): foreach($collection_goods as $key=>$goods): ?><tr>
                    <td bgcolor="#ffffff"><a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" class="f6"><?php echo ($goods["goods_name"]); ?></a></td>
                    <td bgcolor="#ffffff" align="center" width="100"><a href="javascript:addToCart(<?php echo ($goods["goods_id"]); ?>)" class="f6"><?php echo ($lang["collect_to_flow"]); ?></a></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div><?php endif; ?>
<div class="blank5"></div>
<!-- {/if} -->
<?php if(!empty($fittings_list)): ?><!-- {insert_scripts files='transport.js'}
<script type="text/javascript" charset="utf-8">
function fittings_to_flow(goodsId, parentId) {
    var goods = new Object();
    var spec_arr = new Array();
    var number = 1;
    goods.spec = spec_arr;
    goods.goods_id = goodsId;
    goods.number = number;
    goods.parent = parentId;
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), fittings_to_flow_response, 'POST', 'JSON');
}

function fittings_to_flow_response(result) {
    if (result.error > 0) {
        // 如果需要缺货登记，跳转
        if (result.error == 2) {
            if (confirm(result.message)) {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
            }
        } else if (result.error == 6) {
            openSpeDiv(result.message, result.goods_id, result.parent);
        } else {
            alert(result.message);
        }
    } else {
        location.href = 'flow.php';
    }
}
</script> -->
    <div class="block">
        <div class="flowBox">
            <h6><span><?php echo ($lang["goods_fittings"]); ?></span></h6>
            <form action="flow.php" method="post">
                <div class="flowGoodsFittings clearfix">
                    <?php if(is_array($fittings_list)): foreach($fittings_list as $key=>$fittings): ?><ul class="clearfix">
                            <li class="goodsimg">
                                <a href="<?php echo ($fittings["url"]); ?>" target="_blank"><img src="<?php echo ($fittings["goods_thumb"]); ?>" alt="<?php echo ($fittings["name"]); ?>" class="B_blue" /></a>
                            </li>
                            <li>
                                <a href="<?php echo ($fittings["url"]); ?>" target="_blank" title="<?php echo ($fittings["goods_name"]); ?>" class="f6"><?php echo ($fittings["short_name"]); ?></a>
                                <br /> <?php echo ($lang["fittings_price"]); ?>
                                <font class="f1"><?php echo ($fittings["fittings_price"]); ?></font>
                                <br /> <?php echo ($lang["parent_name"]); echo ($fittings["parent_short_name"]); ?>
                                <br />
                                <a href="javascript:fittings_to_flow(<?php echo ($fittings["goods_id"]); ?>,<?php echo ($fittings["parent_id"]); ?>)"><img src="images/bnt_buy.gif" alt="<?php echo ($lang["collect_to_flow"]); ?>" /></a>
                            </li>
                        </ul><?php endforeach; endif; ?>
                </div>
            </form>
        </div>
    </div>
    <div class="blank5"></div><?php endif; ?>
<?php if(!empty($favourable_list)): ?><div class="block">
        <div class="flowBox">
            <h6><span><?php echo ($lang["label_favourable"]); ?></span></h6>
            <?php if(is_array($favourable_list)): foreach($favourable_list as $key=>$favourable): ?><form action="flow.php" method="post">
                    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                        <tr>
                            <td align="right" bgcolor="#ffffff"><?php echo ($lang["favourable_name"]); ?></td>
                            <td bgcolor="#ffffff"><strong><?php echo ($favourable["act_name"]); ?></strong></td>
                        </tr>
                        <tr>
                            <td align="right" bgcolor="#ffffff"><?php echo ($lang["favourable_period"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($favourable["start_time"]); ?> --- <?php echo ($favourable["end_time"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right" bgcolor="#ffffff"><?php echo ($lang["favourable_range"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($lang["far_ext[$favourable"]["act_range]"]); ?>
                                <br /> <?php echo ($favourable["act_range_desc"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" bgcolor="#ffffff"><?php echo ($lang["favourable_amount"]); ?></td>
                            <td bgcolor="#ffffff"><?php echo ($favourable["formated_min_amount"]); ?> --- <?php echo ($favourable["formated_max_amount"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right" bgcolor="#ffffff"><?php echo ($lang["favourable_type"]); ?></td>
                            <td bgcolor="#ffffff">
                                <span class="STYLE1"><?php echo ($favourable["act_type_desc"]); ?></span>
                                <?php if($favourable["act_type"] == 0): if(is_array($favourable["gift"])): foreach($favourable["gift"] as $key=>$gift): ?><br />
                                        <input type="checkbox" value="<?php echo ($gift["id"]); ?>" name="gift[]" />
                                        <a href="goods.php?id=<?php echo ($gift["id"]); ?>" target="_blank" class="f6"><?php echo ($gift["name"]); ?></a> [<?php echo ($gift["formated_price"]); ?>]<?php endforeach; endif; endif; ?>
                            </td>
                        </tr>
                        <?php if(!empty($favourable["available"])): ?><tr>
                                <td align="right" bgcolor="#ffffff">&nbsp;</td>
                                <td align="center" bgcolor="#ffffff">
                                    <input type="image" src="images/bnt_cat.gif" alt="Add to cart" border="0" />
                                </td>
                            </tr><?php endif; ?>
                    </table>
                    <input type="hidden" name="act_id" value="<?php echo ($favourable["act_id"]); ?>" />
                    <input type="hidden" name="step" value="add_favourable" />
                </form><?php endforeach; endif; ?>
        </div>
    </div><?php endif; ?>

                <!-- 购物车内容 --><?php break;?>
            <?php case "consignee": ?><script src='<?php echo (SHOP_JS_URL); ?>region.js'></script>
<script src='<?php echo (SHOP_JS_URL); ?>v.js'></script>
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
<!-- 如果有收货地址，循环显示用户的收获地址 -->
<?php if(is_array($consignee_list)): foreach($consignee_list as $sn=>$consignee): ?><form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="flowBox">
    <h6><span><?php echo ($lang["consignee_info"]); ?></span></h6> {insert_scripts files='utils.js,transport.js'}
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if($real_goods_count > 0): ?><!-- 购物车中存在实体商品显示国家和地区 -->
            <tr>
                <td bgcolor="#ffffff"><?php echo ($lang["country_province"]); ?>:</td>
                <td colspan="3" bgcolor="#ffffff">
                    <select name="country" id="selCountries_<?php echo ($sn); ?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo ($sn); ?>')" style="border:1px solid #ccc;">
                        <option value="0"><?php echo ($lang["please_select"]); echo ($name_of_region[0]); ?></option>
                        <?php if(is_array($country_list)): foreach($country_list as $key=>$country): if($consignee["country"] == $country.region_id): ?><option value="<?php echo ($country["region_id"]); ?>" selected><?php echo ($country["region_name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($country["region_id"]); ?>"><?php echo ($country["region_name"]); ?></option><?php endif; endforeach; endif; ?>
                    </select>
                    <select name="province" id="selProvinces_<?php echo ($sn); ?>" onchange="region.changed(this, 2, 'selCities_<?php echo ($sn); ?>')" style="border:1px solid #ccc;">
                        <option value="0"><?php echo ($lang["please_select"]); echo ($name_of_region[1]); ?></option>
                        <?php if(is_array($province_list["sn"])): foreach($province_list["sn"] as $key=>$province): if($consignee["province"] == $province.region_id): ?><option value="<?php echo ($province["region_id"]); ?>" selected><?php echo ($province["region_name"]); ?>
                                </option>
                                <?php else: ?>
                                <option value="<?php echo ($province["region_id"]); ?>"><?php echo ($province["region_name"]); ?>
                                </option><?php endif; endforeach; endif; ?>
                    </select>
                    <select name="city" id="selCities_<?php echo ($sn); ?>" onchange="region.changed(this, 3, 'selDistricts_<?php echo ($sn); ?>')" style="border:1px solid #ccc;">
                        <option value="0"><?php echo ($lang["please_select"]); echo ($name_of_region[2]); ?></option>
                        <?php if(is_array($city_list["<?php echo ($sn); ?>"])): foreach($city_list["<?php echo ($sn); ?>"] as $key=>$city): if($consignee["city"] == $city.region_id): ?><option value="<?php echo ($city["region_id"]); ?>" selected><?php echo ($city["region_name"]); ?>
                                </option>
                                <?php else: ?>
                                <option value="<?php echo ($city["region_id"]); ?>"><?php echo ($city["region_name"]); ?>
                                </option><?php endif; endforeach; endif; ?>
                    </select>
                    <?php if(!empty($district_list.$sn)): ?><select name="district" id="selDistricts_<?php echo ($sn); ?>" style="border:1px solid #ccc;">
                            <option value="0"><?php echo ($lang["please_select"]); echo ($name_of_region[3]); ?></option>
                            <?php $district_list_sn = $district_list.$sn; ?>
                            <?php if(is_array($district_list_sn)): foreach($district_list_sn as $key=>$district): if($consignee["district"] == $district.region_id): ?><option value="<?php echo ($district["region_id"]); ?>" selected><?php echo ($district["region_name"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($district["region_id"]); ?>"><?php echo ($district["region_name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select><?php endif; ?>
                    <?php echo ($lang["require_field"]); ?>
                </td>
            </tr><?php endif; ?>
        <tr>
            <td bgcolor="#ffffff"><?php echo ($lang["consignee_name"]); ?>:</td>
            <td bgcolor="#ffffff">
                <input name="consignee" type="text" class="inputBg" id="consignee_<?php echo ($sn); ?>" value="<?php echo ($consignee["consignee"]); ?>" /> <?php echo ($lang["require_field"]); ?> </td>
            <td bgcolor="#ffffff"><?php echo ($lang["email_address"]); ?>:</td>
            <td bgcolor="#ffffff">
                <input name="email" type="text" class="inputBg" id="email_<?php echo ($sn); ?>" value="<?php echo ($consignee["email"]); ?>" /> <?php echo ($lang["require_field"]); ?>
            </td>
        </tr>
        <?php if($real_goods_count > 0): ?><!-- 购物车中存在实体商品显示详细地址以及邮政编码 -->
            <tr>
                <td bgcolor="#ffffff"><?php echo ($lang["detailed_address"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="address" type="text" class="inputBg" id="address_<?php echo ($sn); ?>" value="<?php echo ($consignee["address"]); ?>" /> <?php echo ($lang["require_field"]); ?>
                </td>
                <td bgcolor="#ffffff"><?php echo ($lang["postalcode"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="zipcode" type="text" class="inputBg" id="zipcode_<?php echo ($sn); ?>" value="<?php echo ($consignee["zipcode"]); ?>" />
                </td>
            </tr><?php endif; ?>
        <tr>
            <td bgcolor="#ffffff"><?php echo ($lang["phone"]); ?>:</td>
            <td bgcolor="#ffffff">
                <input name="tel" type="text" class="inputBg" id="tel_<?php echo ($sn); ?>" value="<?php echo ($consignee["tel"]); ?>" /> <?php echo ($lang["require_field"]); ?>
            </td>
            <td bgcolor="#ffffff"><?php echo ($lang["backup_phone"]); ?>:</td>
            <td bgcolor="#ffffff">
                <input name="mobile" type="text" class="inputBg" id="mobile_<?php echo ($sn); ?>" value="<?php echo ($consignee["mobile"]); ?>" />
            </td>
        </tr>
        <?php if($real_goods_count > 0): ?><!-- 购物车中存在实体商品显示最佳送货时间及标志行建筑 -->
            <tr>
                <td bgcolor="#ffffff"><?php echo ($lang["sign_building"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="sign_building" type="text" class="inputBg" id="sign_building_<?php echo ($sn); ?>" value="<?php echo ($consignee["sign_building"]); ?>" />
                </td>
                <td bgcolor="#ffffff"><?php echo ($lang["deliver_goods_time"]); ?>:</td>
                <td bgcolor="#ffffff">
                    <input name="best_time" type="text" class="inputBg" id="best_time_<?php echo ($sn); ?>" value="<?php echo ($consignee["best_time"]); ?>" />
                </td>
            </tr><?php endif; ?>
        <tr>
            <td colspan="4" align="center" bgcolor="#ffffff">
                <input type="submit" name="Submit" class="bnt_blue_2" value="<?php echo ($lang["shipping_address"]); ?>" />
                <?php if(($_SESSION['user_id']> 0) && ($consignee["address_id"] > 0)): ?><!-- 如果登录了，显示删除按钮 -->
                    <input name="button" type="button" onclick="if (confirm('<?php echo ($lang["drop_consignee_confirm"]); ?>')) location.href='flow.php?step=drop_consignee&amp;id=<?php echo ($consignee["address_id"]); ?>'" class="bnt_blue" value="<?php echo ($lang["drop"]); ?>" /><?php endif; ?>
                <input type="hidden" name="step" value="consignee" />
                <input type="hidden" name="act" value="checkout" />
                <input name="address_id" type="hidden" value="<?php echo ($consignee["address_id"]); ?>" />
            </td>
        </tr>
    </table>
</div>

    </form><?php endforeach; endif; ?>

                <!-- 开始收货人信息填写界面 --><?php break;?>
            <?php case "checkout": ?><form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
    <script type="text/javascript">
    var flow_no_payment = "<?php echo ($lang["flow_no_payment"]); ?>";
    var flow_no_shipping = "<?php echo ($lang["flow_no_shipping"]); ?>";
    </script>
    <div class="flowBox">
        <h6><span><?php echo ($lang["goods_list"]); ?></span>
        <?php if(!empty($allow_edit_cart)): ?><a href="flow.php" class="f6"><?php echo ($lang["modify"]); ?></a><?php endif; ?>
        </h6>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <th bgcolor="#ffffff"><?php echo ($lang["goods_name"]); ?></th>
                <th bgcolor="#ffffff"><?php echo ($lang["goods_attr"]); ?></th>
                <?php if(!empty($show_marketprice)): ?><th bgcolor="#ffffff"><?php echo ($lang["market_prices"]); ?></th><?php endif; ?>
                <th bgcolor="#ffffff">
                    <?php if(!empty($gb_deposit)): echo ($lang["deposit"]); ?>
                        <?php else: ?> <?php echo ($lang["shop_prices"]); endif; ?>
                </th>
                <th bgcolor="#ffffff"><?php echo ($lang["number"]); ?></th>
                <th bgcolor="#ffffff"><?php echo ($lang["subtotal"]); ?></th>
            </tr>
            <?php if(is_array($goods_list)): foreach($goods_list as $key=>$goods): ?><tr>
                    <td bgcolor="#ffffff">
                        <?php if(($goods["goods_id"] > 0) && ($goods["extension_code"] == 'package_buy')): ?><a href="javascript:void(0)" onclick="setSuitShow(<?php echo ($goods["goods_id"]); ?>)" class="f6"><?php echo ($goods["goods_name"]); ?><span style="color:#FF0000;">（<?php echo ($lang["remark_package"]); ?>）</span></a>
                            <div id="suit_<?php echo ($goods["goods_id"]); ?>" style="display:none">
                                <?php if(is_array($goods['package_goods_list'])): foreach($goods['package_goods_list'] as $key=>$package_goods_list): ?><a href="goods.php?id=<?php echo ($package_goods_list["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($package_goods_list["goods_name"]); ?></a>
                                    <br /><?php endforeach; endif; ?>
                            </div>
                            <?php else: ?>
                            <a href="goods.php?id=<?php echo ($goods["goods_id"]); ?>" target="_blank" class="f6"><?php echo ($goods["goods_name"]); ?></a>
                            <?php if($goods["parent_id"] > 0): ?><span style="color:#FF0000">（<?php echo ($lang["accessories"]); ?>）</span>
                                <?php elseif(!empty($goods.is_gift)): ?>
                                <span style="color:#FF0000">（<?php echo ($lang["largess"]); ?>）</span><?php endif; endif; ?>
                        <?php if(!empty($goods["is_shipping"])): ?>(<span style="color:#FF0000"><?php echo ($lang["free_goods"]); ?></span>)<?php endif; ?>
                    </td>
                    <td bgcolor="#ffffff"><?php echo (nl2br($goods["goods_attr"])); ?></td>
                    <?php if(!empty($show_marketprice)): ?><td align="right" bgcolor="#ffffff"><?php echo ($goods["formated_market_price"]); ?></td><?php endif; ?>
                    <td bgcolor="#ffffff" align="right"><?php echo ($goods["formated_goods_price"]); ?></td>
                    <td bgcolor="#ffffff" align="right"><?php echo ($goods["goods_number"]); ?></td>
                    <td bgcolor="#ffffff" align="right"><?php echo ($goods["formated_subtotal"]); ?></td>
                </tr><?php endforeach; endif; ?>
            <?php if(empty($gb_deposit)): ?><tr>
                    <td bgcolor="#ffffff" colspan="7">
                        <?php if($discount > 0): echo ($your_discount); ?>
                            <br /><?php endif; ?>
                        <?php echo ($shopping_money); ?>
                        <?php if(!empty($show_marketprice)): ?>，<?php echo ($market_price_desc); endif; ?>
                    </td>
                </tr><?php endif; ?>
        </table>
    </div>
    <div class="blank"></div>
    <div class="flowBox">
        <h6><span><?php echo ($lang["consignee_info"]); ?></span><a href="flow.php?step=consignee" class="f6"><?php echo ($lang["modify"]); ?></a></h6>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
                <td bgcolor="#ffffff"><?php echo ($lang["consignee_name"]); ?>:</td>
                <td bgcolor="#ffffff"><?php echo ($consignee["consignee"]); ?></td>
                <td bgcolor="#ffffff"><?php echo ($lang["email_address"]); ?>:</td>
                <td bgcolor="#ffffff"><?php echo ($consignee["email"]); ?></td>
            </tr>
            <?php if($total["real_goods_count"] > 0): ?><tr>
                    <td bgcolor="#ffffff"><?php echo ($lang["detailed_address"]); ?>:</td>
                    <td bgcolor="#ffffff"><?php echo ($consignee["address"]); ?> </td>
                    <td bgcolor="#ffffff"><?php echo ($lang["postalcode"]); ?>:</td>
                    <td bgcolor="#ffffff"><?php echo ($consignee["zipcode"]); ?></td>
                </tr><?php endif; ?>
            <tr>
                <td bgcolor="#ffffff"><?php echo ($lang["phone"]); ?>:</td>
                <td bgcolor="#ffffff"><?php echo ($consignee["tel"]); ?> </td>
                <td bgcolor="#ffffff"><?php echo ($lang["backup_phone"]); ?>:</td>
                <td bgcolor="#ffffff"><?php echo ($consignee["mobile"]); ?></td>
            </tr>
            <?php if($total["real_goods_count"] > 0): ?><tr>
                    <td bgcolor="#ffffff"><?php echo ($lang["sign_building"]); ?>:</td>
                    <td bgcolor="#ffffff"><?php echo ($consignee["sign_building"]); ?> </td>
                    <td bgcolor="#ffffff"><?php echo ($lang["deliver_goods_time"]); ?>:</td>
                    <td bgcolor="#ffffff"><?php echo ($consignee["best_time"]); ?></td>
                </tr><?php endif; ?>
        </table>
    </div>
    <div class="blank"></div>
    <?php if($total["real_goods_count"] != 0): ?><div class="flowBox">
            <h6><span><?php echo ($lang["shipping_method"]); ?></span></h6>
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="shippingTable">
                <tr>
                    <th bgcolor="#ffffff" width="5%">&nbsp;</th>
                    <th bgcolor="#ffffff" width="25%"><?php echo ($lang["name"]); ?></th>
                    <th bgcolor="#ffffff"><?php echo ($lang["describe"]); ?></th>
                    <th bgcolor="#ffffff" width="15%"><?php echo ($lang["fee"]); ?></th>
                    <th bgcolor="#ffffff" width="15%"><?php echo ($lang["free_money"]); ?></th>
                    <th bgcolor="#ffffff" width="15%"><?php echo ($lang["insure_fee"]); ?></th>
                </tr>
                <?php if(is_array($shipping_list)): foreach($shipping_list as $key=>$shipping): ?><tr>
                        <td bgcolor="#ffffff" valign="top">
                            <?php if($order["shipping_id"] == $shipping.shipping_id): ?><input name="shipping" type="radio" value="<?php echo ($shipping["shipping_id"]); ?>" checked="true" supportCod="<?php echo ($shipping["support_cod"]); ?>" insure="<?php echo ($shipping["insure"]); ?>" onclick="selectShipping(this)" />
                                <?php else: ?>
                                <input name="shipping" type="radio" value="<?php echo ($shipping["shipping_id"]); ?>" supportCod="<?php echo ($shipping["support_cod"]); ?>" insure="<?php echo ($shipping["insure"]); ?>" onclick="selectShipping(this)" /><?php endif; ?>
                        </td>
                        <td bgcolor="#ffffff" valign="top"><strong><?php echo ($shipping["shipping_name"]); ?></strong></td>
                        <td bgcolor="#ffffff" valign="top"><?php echo ($shipping["shipping_desc"]); ?></td>
                        <td bgcolor="#ffffff" align="right" valign="top"><?php echo ($shipping["format_shipping_fee"]); ?></td>
                        <td bgcolor="#ffffff" align="right" valign="top"><?php echo ($shipping["free_money"]); ?></td>
                        <td bgcolor="#ffffff" align="right" valign="top">
                            <?php if($shipping["insure"] != 0): echo ($shipping["insure_formated"]); ?>
                                <?php else: ?> <?php echo ($lang["not_support_insure"]); endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="6" bgcolor="#ffffff" align="right">
                        <?php if (!empty($order.need_insure)){ $check_near = 'cheched="true"'; } else{ $check_near = ''; } ?>
                        <?php if(!empty($insure_disabled)){ $disable_near = 'disabled="true"'; } else{ $disable_near = ''; } ?>
                        <label for="ECS_NEEDINSURE">
                            <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox" onclick="selectInsure(this.checked)" value="1" <?php echo ($check_near); ?> <?php echo ($disable_near); ?> /> <?php echo ($lang["need_insure"]); ?> </label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="blank"></div>
        <?php else: ?>
        <input name="shipping" type="radio" value="-1" checked="checked" style="display:none" /><?php endif; ?>
    <?php if(($is_exchange_goods != 1) || ($total["real_goods_count"] != 0)): ?><div class="flowBox">
            <h6><span><?php echo ($lang["payment_method"]); ?></span></h6>
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="paymentTable">
                <tr>
                    <th width="5%" bgcolor="#ffffff">&nbsp;</th>
                    <th width="20%" bgcolor="#ffffff"><?php echo ($lang["name"]); ?></th>
                    <th bgcolor="#ffffff"><?php echo ($lang["describe"]); ?></th>
                    <th bgcolor="#ffffff" width="15%"><?php echo ($lang["pay_fee"]); ?></th>
                </tr>
                <?php if(is_array($payment_list)): foreach($payment_list as $key=>$payment): ?><!-- 循环支付方式 -->
                    <tr>
                        <?php if ($order.pay_id == $payment.pay_id) $check_payment = 'checked'; else $check_payment = ''; ?>
                        <?php if ($payment.is_cod == 1 and !empty($cod_disabled)) $disable_payment = 'disabled="true"'; else $disable_payment = ''; ?>
                        <td valign="top" bgcolor="#ffffff">
                            <input type="radio" name="payment" value="<?php echo ($payment["pay_id"]); ?>" isCod="<?php echo ($payment["is_cod"]); ?>" onclick="selectPayment(this)" {#$check_payment} <?php echo ($disable_payment); ?>/>
                        </td>
                        <td valign="top" bgcolor="#ffffff"><strong><?php echo ($payment["pay_name"]); ?></strong></td>
                        <td valign="top" bgcolor="#ffffff"><?php echo ($payment["pay_desc"]); ?></td>
                        <td align="right" bgcolor="#ffffff" valign="top"><?php echo ($payment["format_pay_fee"]); ?></td>
                    </tr><?php endforeach; endif; ?>
            </table>
        </div>
        <?php else: ?>
        <input name="payment" type="radio" value="-1" checked="checked" style="display:none" /><?php endif; ?>
    <div class="blank"></div>
    <?php if(!empty($pack_list)): ?><div class="flowBox">
            <h6><span><?php echo ($lang["goods_package"]); ?></span></h6>
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="packTable">
                <tr>
                    <th width="5%" scope="col" bgcolor="#ffffff">&nbsp;</th>
                    <th width="35%" scope="col" bgcolor="#ffffff"><?php echo ($lang["name"]); ?></th>
                    <th width="22%" scope="col" bgcolor="#ffffff"><?php echo ($lang["price"]); ?></th>
                    <th width="22%" scope="col" bgcolor="#ffffff"><?php echo ($lang["free_money"]); ?></th>
                    <th scope="col" bgcolor="#ffffff"><?php echo ($lang["img"]); ?></th>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#ffffff">
                        <?php if($order["pack_id"] == 0): ?><input type="radio" name="pack" value="0" checked="true" onclick="selectPack(this)" />
                            <?php else: ?>
                            <input type="radio" name="pack" value="0" onclick="selectPack(this)" /><?php endif; ?>
                    </td>
                    <td valign="top" bgcolor="#ffffff"><strong><?php echo ($lang["no_pack"]); ?></strong></td>
                    <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                    <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                    <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                </tr>
                <?php if(is_array($pack_list)): foreach($pack_list as $key=>$pack): ?><tr>
                        <td valign="top" bgcolor="#ffffff">
                            <?php if($order["pack_id"] == $pack.pack_id): ?><input type="radio" name="pack" value="<?php echo ($pack["pack_id"]); ?>" checked="true" onclick="selectPack(this)" />
                                <?php else: ?>
                                <input type="radio" name="pack" value="<?php echo ($pack["pack_id"]); ?>" onclick="selectPack(this)" /><?php endif; ?>
                        </td>
                        <td valign="top" bgcolor="#ffffff"><strong><?php echo ($pack["pack_name"]); ?></strong></td>
                        <td valign="top" bgcolor="#ffffff" align="right"><?php echo ($pack["format_pack_fee"]); ?></td>
                        <td valign="top" bgcolor="#ffffff" align="right"><?php echo ($pack["format_free_money"]); ?></td>
                        <td valign="top" bgcolor="#ffffff" align="center">
                            <?php if(!empty($pack["pack_img"])): ?><a href="data/packimg/<?php echo ($pack["pack_img"]); ?>" target="_blank" class="f6"><?php echo ($lang["view"]); ?></a>
                                <?php else: ?> <?php echo ($lang["no"]); endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
        </div>
        <div class="blank"></div><?php endif; ?>
    <?php if(!empty($card_list)): ?><div class="flowBox">
            <h6><span><?php echo ($lang["goods_card"]); ?></span></h6>
            <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="cardTable">
                <tr>
                    <th bgcolor="#ffffff" width="5%" scope="col">&nbsp;</th>
                    <th bgcolor="#ffffff" width="35%" scope="col"><?php echo ($lang["name"]); ?></th>
                    <th bgcolor="#ffffff" width="22%" scope="col"><?php echo ($lang["price"]); ?></th>
                    <th bgcolor="#ffffff" width="22%" scope="col"><?php echo ($lang["free_money"]); ?></th>
                    <th bgcolor="#ffffff" scope="col"><?php echo ($lang["img"]); ?></th>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" valign="top">
                        <?php if($order["card_id"] == 0): ?><input type="radio" name="card" value="0" checked="true" onclick="selectCard(this)" />
                            <?php else: ?>
                            <input type="radio" name="card" value="0" onclick="selectCard(this)" /><?php endif; ?>
                    </td>
                    <td bgcolor="#ffffff" valign="top"><strong><?php echo ($lang["no_card"]); ?></strong></td>
                    <td bgcolor="#ffffff" valign="top">&nbsp;</td>
                    <td bgcolor="#ffffff" valign="top">&nbsp;</td>
                    <td bgcolor="#ffffff" valign="top">&nbsp;</td>
                </tr>
                <?php if(is_array($card_list)): foreach($card_list as $key=>$card): ?><tr>
                        <td valign="top" bgcolor="#ffffff">
                            <?php if($order["card_id"] == $card.card_id): ?><input type="radio" name="card" value="<?php echo ($card["card_id"]); ?>" checked="true" onclick="selectCard(this)" />
                                <?php else: ?>
                                <input type="radio" name="card" value="<?php echo ($card["card_id"]); ?>" onclick="selectCard(this)" /><?php endif; ?>
                        </td>
                        <td valign="top" bgcolor="#ffffff"><strong><?php echo ($card["card_name"]); ?></strong></td>
                        <td valign="top" align="right" bgcolor="#ffffff"><?php echo ($card["format_card_fee"]); ?></td>
                        <td valign="top" align="right" bgcolor="#ffffff"><?php echo ($card["format_free_money"]); ?></td>
                        <td valign="top" align="center" bgcolor="#ffffff">
                            <?php if(!empty($card["card_img"])): ?><a href="data/cardimg/<?php echo ($card["card_img"]); ?>" target="_blank" class="f6"><?php echo ($lang["view"]); ?></a>
                                <?php else: ?> <?php echo ($lang["no"]); endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td bgcolor="#ffffff"></td>
                    <td bgcolor="#ffffff" valign="top"><strong><?php echo ($lang["bless_note"]); ?>:</strong></td>
                    <td bgcolor="#ffffff" colspan="3">
                        <textarea name="card_message" cols="60" rows="3" style="width:auto; border:1px solid #ccc;"><?php echo ($order["card_message"]); ?></textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="blank"></div><?php endif; ?>
    <div class="flowBox">
        <h6><span><?php echo ($lang["other_info"]); ?></span></h6>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <?php if(!empty($allow_use_surplus)): ?><tr>
                    <td width="20%" bgcolor="#ffffff"><strong><?php echo ($lang["use_surplus"]); ?>: </strong></td>
                    <td bgcolor="#ffffff">
                        <?php if($disable_surplus) $disable_surplus="disabled"; else $disable_surplus = ''; ?>
                        <input name="surplus" type="text" class="inputBg" id="ECS_SURPLUS" size="10" value="<?php echo ((isset($order["surplus"]) && ($order["surplus"] !== ""))?($order["surplus"]):0); ?>" onblur="changeSurplus(this.value)" <?php echo ($disable_surplus); ?> /> <?php echo ($lang["your_surplus"]); echo ((isset($your_surplus) && ($your_surplus !== ""))?($your_surplus):0); ?> <span id="ECS_SURPLUS_NOTICE" class="notice"></span></td>
                </tr><?php endif; ?>
            <?php if(!empty($allow_use_integral)): ?><tr>
                    <td bgcolor="#ffffff"><strong><?php echo ($lang["use_integral"]); ?></strong></td>
                    <td bgcolor="#ffffff">
                        <input name="integral" type="text" class="input" id="ECS_INTEGRAL" onblur="changeIntegral(this.value)" value="<?php echo ((isset($order["integral"]) && ($order["integral"] !== ""))?($order["integral"]):0); ?>" size="10" /> <?php echo ($lang["can_use_integral"]); ?>:<?php echo ((isset($your_integral) && ($your_integral !== ""))?($your_integral):0); ?> <?php echo ($points_name); ?>，<?php echo ($lang["noworder_can_integral"]); echo ($order_max_integral); ?> <?php echo ($points_name); ?>. <span id="ECS_INTEGRAL_NOTICE" class="notice"></span></td>
                </tr><?php endif; ?>
            <?php if(!empty($allow_use_bonus)): ?><tr>
                    <td bgcolor="#ffffff"><strong><?php echo ($lang["use_bonus"]); ?>:</strong></td>
                    <td bgcolor="#ffffff">
                        <?php echo ($lang["select_bonus"]); ?>
                        <select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS" style="border:1px solid #ccc;">
                            <option value="0" {if $order.bonus_id eq 0}selected{/if}><?php echo ($lang["please_select"]); ?></option>
                            <?php if(is_array($bonus_list)): foreach($bonus_list as $key=>$bonus): if($order["bonus_id"] == $bonus.bonus_id): ?><option value="<?php echo ($bonus["bonus_id"]); ?>" selected><?php echo ($bonus["type_name"]); ?>[<?php echo ($bonus["bonus_money_formated"]); ?>]</option>
                                    <?php else: ?>
                                    <option value="<?php echo ($bonus["bonus_id"]); ?>"><?php echo ($bonus["type_name"]); ?>[<?php echo ($bonus["bonus_money_formated"]); ?>]</option><?php endif; endforeach; endif; ?>
                        </select>
                        <?php echo ($lang["input_bonus_no"]); ?>
                        <input name="bonus_sn" type="text" class="inputBg" size="15" value="<?php echo ($order["bonus_sn"]); ?>" />
                        <input name="validate_bonus" type="button" class="bnt_blue_1" value="<?php echo ($lang["validate_bonus"]); ?>" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" style="vertical-align:middle;" />
                    </td>
                </tr><?php endif; ?>
            <?php if(!empty($inv_content_list)): ?><tr>
                    <td bgcolor="#ffffff"><strong><?php echo ($lang["invoice"]); ?>:</strong>
                        <?php if(!empty($order["need_inv"])): ?><input name="need_inv" type="checkbox" class="input" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" checked="true" />
                            <?php else: ?>
                            <input name="need_inv" type="checkbox" class="input" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" /><?php endif; ?>
                    </td>
                    <td bgcolor="#ffffff">
                        <?php if($order.need_inv == 1)$disable_needinv='disabled'; else $disable_needinv = ''; ?>
                        <?php if(!empty($inv_type_list)): echo ($lang["invoice_type"]); ?>
                            <select name="inv_type" id="ECS_INVTYPE" <?php echo ($disable_needinv); ?> onchange="changeNeedInv()" style="border:1px solid #ccc;">
                                {html_options options=$inv_type_list selected=$order.inv_type}</select><?php endif; ?>
                        <?php echo ($lang["invoice_title"]); ?>
                        <?php if(empty($order.need_inv))$disable_payee='disabled'; else $disable_payee = ''; ?>
                        <input name="inv_payee" type="text" class="input" id="ECS_INVPAYEE" size="20" <?php echo ($disable_payee); ?> value="<?php echo ($order["inv_payee"]); ?>" onblur="changeNeedInv()" /> <?php echo ($lang["invoice_content"]); ?>
                        <select name="inv_content" id="ECS_INVCONTENT" <?php echo ($disable_needinv); ?> onchange="changeNeedInv()" style="border:1px solid #ccc;">
                            {html_options values=$inv_content_list output=$inv_content_list selected=$order.inv_content}
                        </select>
                    </td>
                </tr><?php endif; ?>
            <tr>
                <td valign="top" bgcolor="#ffffff"><strong><?php echo ($lang["order_postscript"]); ?>:</strong></td>
                <td bgcolor="#ffffff">
                    <textarea name="postscript" cols="80" rows="3" id="postscript" style="border:1px solid #ccc;"><?php echo ($order["postscript"]); ?></textarea>
                </td>
            </tr>
            <?php if(!empty($how_oos_list)): ?><tr>
                    <td bgcolor="#ffffff"><strong><?php echo ($lang["booking_process"]); ?>:</strong></td>
                    <td bgcolor="#ffffff">
                        <?php if(is_array($how_oos_list)): foreach($how_oos_list as $how_oos_id=>$how_oos_name): ?><label>
                                <?php if($order["how_oos"] == $how_oos_id): ?><input name="how_oos" type="radio" value="<?php echo ($how_oos_id); ?>" checked onclick="changeOOS(this)" /> <?php echo ($how_oos_name); ?>
                                    <?php else: ?>
                                    <input name="how_oos" type="radio" value="<?php echo ($how_oos_id); ?>" onclick="changeOOS(this)" /> <?php echo ($how_oos_name); endif; ?>
                            </label><?php endforeach; endif; ?>
                    </td>
                </tr><?php endif; ?>
        </table>
    </div>
    <div class="blank"></div>
    <div class="flowBox">
        <h6><span><?php echo ($lang["fee_total"]); ?></span></h6>       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src='<?php echo (SHOP_JS_URL); ?>transport.js'></script>
<script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
<div id="ECS_ORDERTOTAL">
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if(($smarty.session.user_id > 0) && ($config["use_integral"] || $config.use_bonus)): ?><tr>
                <td align="right" bgcolor="#ffffff">
                    <?php echo ($lang["complete_acquisition"]); ?>
                    <?php if(!empty($config["use_integral"])): ?><font class="f4_b"><?php echo ($total["will_get_integral"]); ?></font> <?php echo ($points_name); endif; ?>
                    <?php if(!empty($config.use_integral) && !empty($config.use_bonus)): ?>，<?php echo ($lang["with_price"]); endif; ?>
                    <?php if(!empty($config["use_bonus"])): ?><font class="f4_b"><?php echo ($total["will_get_bonus"]); ?></font><?php echo ($lang["de"]); echo ($lang["bonus"]); ?>。<?php endif; ?>
                </td>
            </tr><?php endif; ?>
        <tr>
            <td align="right" bgcolor="#ffffff">
                <?php echo ($lang["goods_all_price"]); ?>:
                <font class="f4_b"><?php echo ($total["goods_price_formated"]); ?></font>
                <?php if($total["discount"] > 0): ?>- <?php echo ($lang["discount"]); ?>:
                    <font class="f4_b"><?php echo ($total["discount_formated"]); ?></font><?php endif; ?>
                <?php if($total["tax"] > 0): ?>+ <?php echo ($lang["tax"]); ?>:
                    <font class="f4_b"><?php echo ($total["tax_formated"]); ?></font><?php endif; ?>
                <?php if($total["shipping_fee"] > 0): ?>+ <?php echo ($lang["shipping_fee"]); ?>:
                    <font class="f4_b"><?php echo ($total["shipping_fee_formated"]); ?></font><?php endif; ?>
                <?php if($total["shipping_insure"] > 0): ?>+ <?php echo ($lang["insure_fee"]); ?>:
                    <font class="f4_b"><?php echo ($total["shipping_insure_formated"]); ?></font><?php endif; ?>
                <?php if($total["pay_fee"] > 0): ?>+ <?php echo ($lang["pay_fee"]); ?>:
                    <font class="f4_b"><?php echo ($total["pay_fee_formated"]); ?></font><?php endif; ?>
                <?php if($total["pack_fee"] > 0): ?>+ <?php echo ($lang["pack_fee"]); ?>:
                    <font class="f4_b"><?php echo ($total["pack_fee_formated"]); ?></font><?php endif; ?>
                <?php if($total["card_fee"] > 0): ?>+ <?php echo ($lang["card_fee"]); ?>:
                    <font class="f4_b"><?php echo ($total["card_fee_formated"]); ?></font><?php endif; ?>
            </td>
        </tr>
        <?php if(($total["surplus"] > 0) || ($total["integral"] > 0) || ($total["bonus"] > 0)): ?><tr>
                <td align="right" bgcolor="#ffffff">
                    <?php if($total["surplus"] > 0): ?>- <?php echo ($lang["use_surplus"]); ?>:
                        <font class="f4_b"><?php echo ($total["surplus_formated"]); ?></font><?php endif; ?>
                    <?php if($total["integral"] > 0): ?>- <?php echo ($lang["use_integral"]); ?>:
                        <font class="f4_b"><?php echo ($total["integral_formated"]); ?></font><?php endif; ?>
                    <?php if($total["bonus"] > 0): ?>- <?php echo ($lang["use_bonus"]); ?>:
                        <font class="f4_b"><?php echo ($total["bonus_formated"]); ?></font><?php endif; ?>
                </td>
            </tr><?php endif; ?>
        <tr>
            <td align="right" bgcolor="#ffffff"> <?php echo ($lang["total_fee"]); ?>:
                <font class="f4_b"><?php echo ($total["amount_formated"]); ?></font>
                <?php if(!empty($is_group_buy)): ?><br /> <?php echo ($lang["notice_gb_order_amount"]); endif; ?>
                <?php if(!empty($$total["exchange_integral"])): ?><br /> <?php echo ($lang["notice_eg_integral"]); ?>
                    <font class="f4_b"><?php echo ($total["exchange_integral"]); ?></font><?php endif; ?>
            </td>
        </tr>
    </table>
</div>

        <div align="center" style="margin:8px auto;">
            <input type="image" src="images/bnt_subOrder.gif" />
            <input type="hidden" name="step" value="done" />
        </div>
    </div>
</form>

                <!-- 开始订单确认界面 --><?php break;?>
            <?php case "done": ?><div class="flowBox" style="margin:30px auto 70px auto;">
    <h6 style="text-align:center; height:30px; line-height:30px;"><?php echo ($lang["remember_order_number"]); ?>: <font style="color:red"><?php echo ($order["order_sn"]); ?></font></h6>
    <table width="99%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;">
        <tr>
            <td align="center" bgcolor="#FFFFFF">
                <?php if(!empty($order["shipping_name"])): echo ($lang["select_shipping"]); ?>: <strong><?php echo ($order["shipping_name"]); ?></strong>，<?php endif; ?>
                <?php echo ($lang["select_payment"]); ?>: <strong><?php echo ($order["pay_name"]); ?></strong>。<?php echo ($lang["order_amount"]); ?>: <strong><?php echo ($total["amount_formated"]); ?></strong>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><?php echo ($order["pay_desc"]); ?></td>
        </tr>
        <?php if(!empty($pay_online)): ?><!-- 如果是线上支付则显示支付按钮 -->
            <tr>
                <td align="center" bgcolor="#FFFFFF"><?php echo ($pay_online); ?></td>
            </tr><?php endif; ?>
    </table>
    <?php if(!empty($virtual_card)): ?><div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
            <?php if(is_array($virtual_card)): foreach($virtual_card as $key=>$vgoods): ?><h3 style="color:#2359B1; font-size:12px;"><?php echo ($vgoods["goods_name"]); ?></h3>
                <?php if(is_array($vgoods["info"])): foreach($vgoods["info"] as $key=>$card): ?><ul style="list-style:none;padding:0;margin:0;clear:both">
                        <?php if(!empty($card["card_sn"])): ?><li style="margin-right:50px;float:left;">
                                <strong><?php echo ($lang["card_sn"]); ?>:</strong><span style="color:red;"><?php echo ($card["card_sn"]); ?></span>
                            </li><?php endif; ?>
                        <?php if(!empty($card["card_password"])): ?><li style="margin-right:50px;float:left;">
                                <strong><?php echo ($lang["card_password"]); ?>:</strong><span style="color:red;"><?php echo ($card["card_password"]); ?></span>
                            </li><?php endif; ?>
                        <?php if(!empty($card["end_date"])): ?><li style="float:left;">
                                <strong><?php echo ($lang["end_date"]); ?>:</strong><?php echo ($card["end_date"]); ?>
                            </li><?php endif; ?>
                    </ul><?php endforeach; endif; endforeach; endif; ?>
        </div><?php endif; ?>
    <p style="text-align:center; margin-bottom:20px;"><?php echo ($order_submit_back); ?></p>
</div>

                <!-- 订单提交成功 --><?php break;?>
            <?php case "login": ?><script src='<?php echo (SHOP_JS_URL); ?>utils.js'></script>
<script src='<?php echo (SHOP_JS_URL); ?>user.js'></script>
<script type="text/javascript">
var username_not_null = "<?php echo ($lang["flow_login_register"]["username_not_null"]); ?>";
var username_invalid = "<?php echo ($lang["flow_login_register"]["username_invalid"]); ?>";
var password_not_null = "<?php echo ($lang["flow_login_register"]["password_not_null"]); ?>";
var email_not_null = "<?php echo ($lang["flow_login_register"]["email_not_null"]); ?>";
var email_invalid = "<?php echo ($lang["flow_login_register"]["email_invalid"]); ?>";
var password_not_same = "<?php echo ($lang["flow_login_register"]["password_not_same"]); ?>";
var password_lt_six = "<?php echo ($lang["flow_login_register"]["password_lt_six"]); ?>";
</script>

<!-- <script type="text/javascript">
function checkLoginForm(frm) {
    if (Utils.isEmpty(frm.elements['username'].value)) {
        alert(username_not_null);
        return false;
    }

    if (Utils.isEmpty(frm.elements['password'].value)) {
        alert(password_not_null);
        return false;
    }

    return true;
}

function checkSignupForm(frm) {
    if (Utils.isEmpty(frm.elements['username'].value)) {
        alert(username_not_null);
        return false;
    }

    if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/)) {
        alert(username_invalid);
        return false;
    }

    if (Utils.isEmpty(frm.elements['email'].value)) {
        alert(email_not_null);
        return false;
    }

    if (!Utils.isEmail(frm.elements['email'].value)) {
        alert(email_invalid);
        return false;
    }

    if (Utils.isEmpty(frm.elements['password'].value)) {
        alert(password_not_null);
        return false;
    }

    if (frm.elements['password'].value.length < 6) {
        alert(password_lt_six);
        return false;
    }

    if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
        alert(password_not_same);
        return false;
    }
    return true;
}
</script>
 -->
<!-- 开始用户登录注册界面 -->
<div class="flowBox">
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
            <td width="50%" valign="top" bgcolor="#ffffff">
                <h6><span>用户登录：</span></h6>
                <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
                    <table width="90%" border="0" cellpadding="8" cellspacing="1" bgcolor="#B0D8FF" class="table">
                        <tr>
                            <td bgcolor="#ffffff">
                                <div align="right"><strong><?php echo ($lang["username"]); ?></strong></div>
                            </td>
                            <td bgcolor="#ffffff">
                                <input name="username" type="text" class="inputBg" id="username" />
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff">
                                <div align="right"><strong><?php echo ($lang["password"]); ?></strong></div>
                            </td>
                            <td bgcolor="#ffffff">
                                <input name="password" class="inputBg" type="password" />
                            </td>
                        </tr>
                        <!-- 判断是否启用验证码 -->
                        <?php if(!empty($enabled_login_captcha)): ?><tr>
                                <td bgcolor="#ffffff">
                                    <div align="right"><strong><?php echo ($lang["comment_captcha"]); ?>:</strong></div>
                                </td>
                                <td bgcolor="#ffffff">
                                    <input type="text" size="8" name="captcha" class="inputBg" />
                                    <img src="captcha.php?is_login=1&<?php echo ($rand); ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                            </tr><?php endif; ?>
                        <tr>
                            <td colspan="2" bgcolor="#ffffff">
                                <input type="checkbox" value="1" name="remember" id="remember" />
                                <label for="remember"><?php echo ($lang["remember"]); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" colspan="2" align="center"><a href="user.php?act=qpassword_name" class="f6"><?php echo ($lang["get_password_by_question"]); ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password" class="f6"><?php echo ($lang["get_password_by_mail"]); ?></a></td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" colspan="2">
                                <div align="center">
                                    <input type="submit" class="bnt_blue" name="login" value="<?php echo ($lang["forthwith_login"]); ?>" />
                                    <?php if($anonymous_buy == 1): ?><!-- 是否允许未登录用户购物 -->
                                        <input type="button" class="bnt_blue_2" value="<?php echo ($lang["direct_shopping"]); ?>" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" /><?php endif; ?>
                                    <input name="act" type="hidden" value="signin" />
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
            <td valign="top" bgcolor="#ffffff">
                <h6><span>用户注册：</span></h6>
                <form action="flow.php?step=login" method="post" name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)">
                    <table width="98%" border="0" cellpadding="8" cellspacing="1" bgcolor="#B0D8FF" class="table">
                        <tr>
                            <td bgcolor="#ffffff" align="right" width="25%"><strong><?php echo ($lang["username"]); ?></strong></td>
                            <td bgcolor="#ffffff">
                                <input name="username" type="text" class="inputBg" id="username" onblur="is_registered(this.value);" />
                                <br />
                                <span id="username_notice" style="color:#FF0000"></span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="right"><strong><?php echo ($lang["email_address"]); ?></strong></td>
                            <td bgcolor="#ffffff">
                                <input name="email" type="text" class="inputBg" id="email" onblur="checkEmail(this.value);" />
                                <br />
                                <span id="email_notice" style="color:#FF0000"></span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="right"><strong><?php echo ($lang["password"]); ?></strong></td>
                            <td bgcolor="#ffffff">
                                <input name="password" class="inputBg" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" />
                                <br />
                                <span style="color:#FF0000" id="password_notice"></span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="right"><strong><?php echo ($lang["confirm_password"]); ?></strong></td>
                            <td bgcolor="#ffffff">
                                <input name="confirm_password" class="inputBg" type="password" id="confirm_password" onblur="check_conform_password(this.value);" />
                                <br />
                                <span style="color:#FF0000" id="conform_password_notice"></span></td>
                        </tr>
                        <?php if(!empty($enabled_register_captcha)): ?><!-- 判断是否启用验证码 -->
                            <tr>
                                <td bgcolor="#ffffff" align="right"><strong><?php echo ($lang["comment_captcha"]); ?>:</strong></td>
                                <td bgcolor="#ffffff">
                                    <input type="text" size="8" name="captcha" class="inputBg" />
                                    <img src="captcha.php?<?php echo ($rand); ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
                            </tr><?php endif; ?>
                        <tr>
                            <td colspan="2" bgcolor="#ffffff" align="center">
                                <input type="submit" name="Submit" class="bnt_blue_1" value="<?php echo ($lang["forthwith_register"]); ?>" />
                                <input name="act" type="hidden" value="signup" />
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
        <?php if(!empty($need_rechoose_gift)): ?><tr>
                <td colspan="2" align="center" style="border-top:1px #ccc solid; padding:5px; color:red;"><?php echo ($lang["gift_remainder"]); ?></td>
            </tr><?php endif; ?>
    </table>
</div>

                <!-- 结束用户登录注册界面 --><?php break;?>
            <?php default: endswitch;?>
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

<script type="text/javascript">
var process_request = "<?php echo ($lang["process_request"]); ?>";
var username_exist = "<?php echo ($lang["username_exist"]); ?>";
var compare_no_goods = "<?php echo ($lang["compare_no_goods"]); ?>";
var btn_buy = "<?php echo ($lang["btn_buy"]); ?>";
var is_cancel = "<?php echo ($lang["is_cancel"]); ?>";
var select_spe = "<?php echo ($lang["select_spe"]); ?>";
</script>

</html>