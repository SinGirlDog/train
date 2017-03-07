<?php if (!defined('THINK_PATH')) exit();?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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