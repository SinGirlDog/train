<?php

/**
 * ECSHOP 管理中心菜单数组
 *
*/
return array(

'02_cat_and_goods' => array(
	'01_goods_list'       => 'goods.php?act=list',         // 商品列表
	'02_goods_add'        => 'goods.php?act=add',          // 添加商品
	'03_category_list'    => 'category.php?act=list',
	'05_comment_manage'   => 'comment_manage.php?act=list',
	'06_goods_brand_list' => 'brand.php?act=list',
	'08_goods_type'       => 'goods_type.php?act=manage',
	'11_goods_trash'      => 'goods.php?act=trash',        // 商品回收站
	'12_batch_pic'        => 'picture_batch.php',
	'13_batch_add'        => 'goods_batch.php?act=add',    // 商品批量上传
	'14_goods_export'     => 'goods_export.php?act=goods_export',
	'15_batch_edit'       => 'goods_batch.php?act=select', // 商品批量修改
	'16_goods_script'     => 'gen_goods_script.php?act=setup',
	'17_tag_manage'       => 'tag_manage.php?act=list',
	'50_virtual_card_list'   => 'goods.php?act=list&extension_code=virtual_card',
	'51_virtual_card_add'    => 'goods.php?act=add&extension_code=virtual_card',
	'52_virtual_card_change' => 'virtual_card.php?act=change',
	'goods_auto'             => 'goods_auto.php?act=list',
),


'03_promotion' => array(
	 '02_snatch_list'          => 'snatch.php?act=list',
	 '04_bonustype_list'       => 'bonus.php?act=list',
	 '06_pack_list'            => 'pack.php?act=list',
	 '07_card_list'            => 'card.php?act=list',
	 '08_group_buy'            => 'group_buy.php?act=list',
	 '09_topic'                => 'topic.php?act=list',
	 '10_auction'              => 'auction.php?act=list',
	 '12_favourable'           => 'favourable.php?act=list',
	 '13_wholesale'            => 'wholesale.php?act=list',
	 '14_package_list'         => 'package.php?act=list',
	//'ebao_commend'            => 'ebao_commend.php?act=list',
	 '15_exchange_goods'       => 'exchange_goods.php?act=list',
),

'04_order' => array(
	'02_order_list'               => 'order.php?act=list',
	'03_order_query'              => 'order.php?act=order_query',
	'04_merge_order'              => 'order.php?act=merge',
	'05_edit_order_print'         => 'order.php?act=templates',
	'06_undispose_booking'        => 'goods_booking.php?act=list_all',
	//'07_repay_application'        => 'repay.php?act=list_all',
	'08_add_order'                => 'order.php?act=add',
	'09_delivery_order'           => 'order.php?act=delivery_list',
	'10_back_order'               => 'order.php?act=back_list',
),

'05_banner' => array(
	'ad_position'                => 'ad_position.php?act=list',
	'ad_list'                    => 'ads.php?act=list',
),

'06_stats' => array(
	'flow_stats'                  => 'flow_stats.php?act=view',
	'searchengine_stats'          => 'searchengine_stats.php?act=view',
	'z_clicks_stats'              => 'adsense.php?act=list',
	'report_guest'                => 'guest_stats.php?act=list',
	'report_order'                => 'order_stats.php?act=list',
	'report_sell'                 => 'sale_general.php?act=list',
	'sale_list'                   => 'sale_list.php?act=list',
	'sell_stats'                  => 'sale_order.php?act=goods_num',
	'report_users'                => 'users_order.php?act=order_num',
	'visit_buy_per'               => 'visit_sold.php?act=list',
),

'07_content' => array(
	'03_article_list'           => 'article.php?act=list',
	'02_articlecat_list'        => 'articlecat.php?act=list',
	'vote_list'                 => 'vote.php?act=list',
	'article_auto'              => 'article_auto.php?act=list',
//	'shop_help'                 => 'shophelp.php?act=list_cat',
//	'shop_info'                 => 'shopinfo.php?act=list',
),

'08_members' => array(
	'03_users_list'             => 'users.php?act=list',
	'04_users_add'              => 'users.php?act=add',
	'05_user_rank_list'         => 'user_rank.php?act=list',
	'06_list_integrate'         => 'integrate.php?act=list',
	'08_unreply_msg'            => 'user_msg.php?act=list_all',
	'09_user_account'           => 'user_account.php?act=list',
	'10_user_account_manage'    => 'user_account_manage.php?act=list',
),

'10_priv_admin' => array(
	'admin_logs'             => 'admin_logs.php?act=list',
	'admin_list'             => 'privilege.php?act=list',
	'admin_role'             => 'role.php?act=list',
	'agency_list'            => 'agency.php?act=list',
	'suppliers_list'         => 'suppliers.php?act=list', // 供货商
),

'11_system' => array(
	'01_shop_config'             => 'shop_config.php?act=list_edit',
	'shop_authorized'             => 'license.php?act=list_edit',
	'02_payment_list'            => 'payment.php?act=list',
	'03_shipping_list'           => 'shipping.php?act=list',
	'04_mail_settings'           => 'shop_config.php?act=mail_settings',
	'05_area_list'               => 'area_manage.php?act=list',
//	'06_plugins'                 => 'plugins.php?act=list',
	'07_cron_schcron'            => 'cron.php?act=list',
	'08_friendlink_list'         => 'friend_link.php?act=list',
	'sitemap'                    => 'sitemap.php',
	'check_file_priv'            => 'check_file_priv.php?act=check',
	'captcha_manage'             => 'captcha_manage.php?act=main',
	'ucenter_setup'              => 'integrate.php?act=setup&code=ucenter',
	'flashplay'                  => 'flashplay.php?act=list',
	'navigator'                  => 'navigator.php?act=list',
	'file_check'                 => 'filecheck.php',
//	'fckfile_manage'             => 'fckfile_manage.php?act=list',
	'021_reg_fields'             => 'reg_fields.php?act=list',
),

'12_template' => array(
	'02_template_select'       => 'template.php?act=list',
	'03_template_setup'        => 'template.php?act=setup',
	'04_template_library'      => 'template.php?act=library',
	'05_edit_languages'        => 'edit_languages.php?act=list',
	'06_template_backup'       => 'template.php?act=backup_setting',
	'mail_template_manage'     => 'mail_template.php?act=list',
),

'13_backup' => array(
	'02_db_manage'               => 'database.php?act=backup',
	'03_db_optimize'             => 'database.php?act=optimize',
	'04_sql_query'               => 'sql.php?act=main',
//	'05_synchronous'             => 'integrate.php?act=sync',
	'convert'                    => 'convert.php?act=main',
),

'14_sms' => array(
//	'02_sms_my_info'                => 'sms.php?act=display_my_info',
	'03_sms_send'                   => 'sms.php?act=display_send_ui',
	'04_sms_sign'                   => 'sms.php?act=sms_sign',
//	'04_sms_charge'                 => 'sms.php?act=display_charge_ui',
//	'05_sms_send_history'           => 'sms.php?act=display_send_history_ui',
//	'06_sms_charge_history'         => 'sms.php?act=display_charge_history_ui',

),

'15_rec' => array(
	'affiliate'                     => 'affiliate.php?act=list',
	'affiliate_ck'                  => 'affiliate_ck.php?act=list',
),

'16_email_manage' => array(
	'email_list'           => 'email_list.php?act=list',
	'magazine_list'        => 'magazine_list.php?act=list',
	'attention_list'       => 'attention_list.php?act=list',
	'view_sendlist'        => 'view_sendlist.php?act=list',
),
);

