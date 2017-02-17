SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `train_sp` DEFAULT CHARACTER SET utf8 ;
USE `train_sp` ;

-- -----------------------------------------------------
-- Table `train_sp`.`sp_cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `train_sp`.`sp_cart` (
  `rec_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `session_id` CHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL DEFAULT '',
  `goods_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `goods_sn` VARCHAR(60) NOT NULL DEFAULT '',
  `product_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `goods_name` VARCHAR(120) NOT NULL DEFAULT '',
  `market_price` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `goods_price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `goods_number` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `goods_attr` TEXT NOT NULL,
  `is_real` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `extension_code` VARCHAR(30) NOT NULL DEFAULT '',
  `parent_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `rec_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_gift` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `is_shipping` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `can_handsel` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `goods_attr_id` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`rec_id`),
  INDEX `session_id` (`session_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 43
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `train_sp`.`sp_goods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `train_sp`.`sp_goods` (
  `goods_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_id` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `goods_sn` VARCHAR(60) NOT NULL DEFAULT '',
  `goods_name` VARCHAR(120) NOT NULL DEFAULT '',
  `goods_name_style` VARCHAR(60) NOT NULL DEFAULT '+',
  `click_count` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `brand_id` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `provider_name` VARCHAR(100) NOT NULL DEFAULT '',
  `goods_number` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `goods_weight` DECIMAL(10,3) UNSIGNED NOT NULL DEFAULT '0.000',
  `market_price` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `shop_price` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `promote_price` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `promote_start_date` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `promote_end_date` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `warn_number` TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
  `keywords` VARCHAR(255) NOT NULL DEFAULT '',
  `goods_brief` VARCHAR(255) NOT NULL DEFAULT '',
  `goods_desc` TEXT NOT NULL,
  `goods_thumb` VARCHAR(255) NOT NULL DEFAULT '',
  `goods_img` VARCHAR(255) NOT NULL DEFAULT '',
  `original_img` VARCHAR(255) NOT NULL DEFAULT '',
  `is_real` TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
  `extension_code` VARCHAR(30) NOT NULL DEFAULT '',
  `is_on_sale` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
  `is_alone_sale` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
  `is_shipping` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `integral` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_time` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` SMALLINT(4) UNSIGNED NOT NULL DEFAULT '100',
  `is_delete` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_best` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_new` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_hot` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_promote` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `bonus_type_id` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `last_update` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `goods_type` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `seller_note` VARCHAR(255) NOT NULL DEFAULT '',
  `give_integral` INT(11) NOT NULL DEFAULT '-1',
  `rank_integral` INT(11) NOT NULL DEFAULT '-1',
  `suppliers_id` SMALLINT(5) UNSIGNED NULL DEFAULT NULL,
  `is_check` TINYINT(1) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`goods_id`),
  INDEX `goods_sn` (`goods_sn` ASC),
  INDEX `cat_id` (`cat_id` ASC),
  INDEX `last_update` (`last_update` ASC),
  INDEX `brand_id` (`brand_id` ASC),
  INDEX `goods_weight` (`goods_weight` ASC),
  INDEX `promote_end_date` (`promote_end_date` ASC),
  INDEX `promote_start_date` (`promote_start_date` ASC),
  INDEX `goods_number` (`goods_number` ASC),
  INDEX `sort_order` (`sort_order` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `train_sp`.`sp_order_goods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `train_sp`.`sp_order_goods` (
  `rec_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `goods_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `goods_name` VARCHAR(120) NOT NULL DEFAULT '',
  `goods_sn` VARCHAR(60) NOT NULL DEFAULT '',
  `product_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `goods_number` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '1',
  `market_price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `goods_price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `goods_attr` TEXT NOT NULL,
  `send_number` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `is_real` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `extension_code` VARCHAR(30) NOT NULL DEFAULT '',
  `parent_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `is_gift` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `goods_attr_id` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`rec_id`),
  INDEX `order_id` (`order_id` ASC),
  INDEX `goods_id` (`goods_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `train_sp`.`sp_order_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `train_sp`.`sp_order_info` (
  `order_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_sn` VARCHAR(20) NOT NULL DEFAULT '',
  `user_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `order_status` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `shipping_status` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `pay_status` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `consignee` VARCHAR(60) NOT NULL DEFAULT '',
  `country` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `province` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `city` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `district` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `address` VARCHAR(255) NOT NULL DEFAULT '',
  `zipcode` VARCHAR(60) NOT NULL DEFAULT '',
  `tel` VARCHAR(60) NOT NULL DEFAULT '',
  `mobile` VARCHAR(60) NOT NULL DEFAULT '',
  `email` VARCHAR(60) NOT NULL DEFAULT '',
  `best_time` VARCHAR(120) NOT NULL DEFAULT '',
  `sign_building` VARCHAR(120) NOT NULL DEFAULT '',
  `postscript` VARCHAR(255) NOT NULL DEFAULT '',
  `shipping_id` TINYINT(3) NOT NULL DEFAULT '0',
  `shipping_name` VARCHAR(120) NOT NULL DEFAULT '',
  `pay_id` TINYINT(3) NOT NULL DEFAULT '0',
  `pay_name` VARCHAR(120) NOT NULL DEFAULT '',
  `how_oos` VARCHAR(120) NOT NULL DEFAULT '',
  `how_surplus` VARCHAR(120) NOT NULL DEFAULT '',
  `pack_name` VARCHAR(120) NOT NULL DEFAULT '',
  `card_name` VARCHAR(120) NOT NULL DEFAULT '',
  `card_message` VARCHAR(255) NOT NULL DEFAULT '',
  `inv_payee` VARCHAR(120) NOT NULL DEFAULT '',
  `inv_content` VARCHAR(120) NOT NULL DEFAULT '',
  `goods_amount` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `shipping_fee` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `insure_fee` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `pay_fee` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `pack_fee` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `card_fee` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `money_paid` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `surplus` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `integral` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `integral_money` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `bonus` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `order_amount` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `from_ad` SMALLINT(5) NOT NULL DEFAULT '0',
  `referer` VARCHAR(255) NOT NULL DEFAULT '',
  `add_time` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `confirm_time` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `pay_time` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `shipping_time` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `pack_id` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `card_id` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `bonus_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `invoice_no` VARCHAR(255) NOT NULL DEFAULT '',
  `extension_code` VARCHAR(30) NOT NULL DEFAULT '',
  `extension_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `to_buyer` VARCHAR(255) NOT NULL DEFAULT '',
  `pay_note` VARCHAR(255) NOT NULL DEFAULT '',
  `agency_id` SMALLINT(5) UNSIGNED NOT NULL,
  `inv_type` VARCHAR(60) NOT NULL,
  `tax` DECIMAL(10,2) NOT NULL,
  `is_separate` TINYINT(1) NOT NULL DEFAULT '0',
  `parent_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `discount` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE INDEX `order_sn` (`order_sn` ASC),
  INDEX `user_id` (`user_id` ASC),
  INDEX `order_status` (`order_status` ASC),
  INDEX `shipping_status` (`shipping_status` ASC),
  INDEX `pay_status` (`pay_status` ASC),
  INDEX `shipping_id` (`shipping_id` ASC),
  INDEX `pay_id` (`pay_id` ASC),
  INDEX `extension_code` (`extension_code` ASC, `extension_id` ASC),
  INDEX `agency_id` (`agency_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
