-- 数据库
CREATE USER 'shop'@'%' IDENTIFIED BY 'shop';
CREATE DATABASE `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL on shop.* to 'shop'@'%';

-- 数据表
USE `shop`;
-- 管理员表
CREATE TABLE `admin`(
    -- 通用：主键id 名称 创建时间 更新时间
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    -- 用户类通用：用户名 密码 头像地址 上次登陆ip 上次登陆时间 上次改密时间
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `avatar` VARCHAR(255) DEFAULT '暂无头像',
    `login_ip` VARCHAR(255) NOT NULL DEFAULT '127.0.0.1',
    `login_time` INT(11) NOT NULL DEFAULT 0,
    `changepwd_time` INT(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username`(`username`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 商户表
CREATE TABLE `dealer`(
    -- 通用：主键id 名称 创建时间 更新时间 当前状态(1正常0待审-1删除)
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT 0,
    -- 用户类通用：用户名 密码 LOGO地址 上次登陆ip 上次登陆时间 上次改密时间 
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `logo` VARCHAR(255) DEFAULT '暂无LOGO',
    `login_ip` VARCHAR(255) NOT NULL DEFAULT '127.0.0.1',
    `login_time` INT(11) NOT NULL DEFAULT 0,
    `changepwd_time` INT(11) NOT NULL DEFAULT 0,
    -- 商户和普通用户多一个电子邮箱字段
    `email` VARCHAR(50) NOT NULL,
    -- 商户专有：地址 经纬度 开户行 开户人 银行账号 账户余额 外键城市id 和 分类id
    `address` VARCHAR(255) NOT NULL,
    `x_point` VARCHAR(255) NOT NULL,
    `y_point` VARCHAR(255) NOT NULL,
    `bank_name` VARCHAR(255) NOT NULL,
    `bank_user` VARCHAR(255) NOT NULL,
    `bank_numb` VARCHAR(255) NOT NULL,
    `money` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
    `city_id` INT(10) NOT NULL,
    `category_id` INT(10) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username`(`username`),
    UNIQUE KEY `email`(`email`),
    KEY `dealer_name`(`name`),
    KEY `dealer_id`(`id`),
    KEY `city_id`(`city_id`),
    KEY `category_id`(`category_id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 普通用户表
CREATE TABLE `user`(
   -- 通用：主键id 名称 创建时间 更新时间 当前状态(1正常0待审-1删除)
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT 0,
    -- 用户类通用：用户名 密码 LOGO地址 上次登陆ip 上次登陆时间 上次改密时间 
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `avatar` VARCHAR(255) DEFAULT '暂无头像',
    `login_ip` VARCHAR(255) NOT NULL DEFAULT '127.0.0.1',
    `login_time` INT(11) NOT NULL DEFAULT 0,
    `changepwd_time` INT(11) NOT NULL DEFAULT 0,
    -- 商户和普通用户多一个电子邮箱字段
    `email` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username`(`username`),
    UNIQUE KEY `email`(`email`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 商品表
CREATE TABLE `deal`(
    -- 通用：主键id 名称 创建时间 更新时间 当前状态(1正常0待审-1删除)
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT 0,
    -- 商品专有：简介 备注 原价 图片 
    `desc` TEXT,
    `note` TEXT,
    `origin_price` DECIMAL(5,2) NOT NULL DEFAULT '0.00',
    `selling_price` DECIMAL(5,2) NOT NULL DEFAULT '0.00',
    `image` VARCHAR(255) DEFAULT '暂无预览图',
    `city_id` INT(10) NOT NULL,
    `category_id` INT(10) NOT NULL,
    `dealer_id` INT(10) NOT NULL,
    -- 非用户类表有：排序序号
    `listorder` INT(10) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    KEY `deal_name`(`name`),
    KEY `deal_id`(`id`),
    KEY `city_id`(`city_id`),
    KEY `category_id`(`category_id`),
    KEY `dealer_id`(`dealer_id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 城市表
CREATE TABLE `city`(
    -- 通用：主键id 名称 创建时间 更新时间 当前状态(1正常0待审-1删除)
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT 0,
    -- 城市和分类用：无限极分类 pid
    `pid` INT(10) NOT NULL,
    -- 非用户类表有：排序序号
    `listorder` INT(10) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY `city_name`(`name`),
    KEY `city_id`(`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 分类表
CREATE TABLE `category`(
    -- 通用：主键id 名称 创建时间 更新时间 当前状态(1正常0待审-1删除)
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT 0,
    -- 城市和分类用：无限极分类 pid
    `pid` INT(10) NOT NULL,
    -- 非用户类表有：排序序号
    `listorder` INT(10) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY `category_name`(`name`),
    KEY `category_id`(`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 订单表
CREATE TABLE `bill`(
    -- 通用：主键id 名称 创建时间 更新时间 当前状态(1正常0待审-1删除)
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `create_time` INT(11) NOT NULL DEFAULT 0,
    `update_time` INT(11) NOT NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT 0,
    `user_id` int(10) not null,
    `deal_ids` varchar(255) not null,
    `deal_numbers` varchar(255) not null,
    `total_price` DECIMAL(9,2) not null,
    KEY `user_id` (`user_id`),
    PRIMARY KEY (`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `bill` ADD `user_email` VARCHAR(255) NOT NULL AFTER `user_id`;


-- 推荐位表
CREATE TABLE `tuijianwei`(
    `id` INT(10) UNSIGNED AUTO_INCREMENT,
    `url` varchar(255) NOT NULL DEFAULT '',
    `image` VARCHAR(255) DEFAULT '暂无预览图',
    `desc` VARCHAR(255) DEFAULT '暂无简介',
    PRIMARY KEY (`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 数据插入
INSERT INTO `admin` (`id`, `name`, `create_time`, `update_time`, `username`, `password`, `avatar`, `login_ip`, `login_time`, `changepwd_time`) VALUES ('1000000000', '刘浩宇', '0', '0', 'liuhaoyu', MD5('liuhaoyu'), '暂无头像', '127.0.0.1', '0', '0');
INSERT INTO `city` (`name`, `pid`, `status`) VALUES ('四川', '0', 1);
INSERT INTO `city` (`name`, `pid`, `status`) VALUES ('广元', '1', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('美食', '0', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('娱乐', '0', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('住宿', '0', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('火锅', '1', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('中餐', '1', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('小吃', '1', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('特产', '1', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('KTV', '2', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('酒吧', '2', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('酒店', '3', 1);
INSERT INTO `category` (`name`, `pid`, `status`) VALUES ('民宿', '3', 1);
INSERT INTO `tuijianwei` (`url`) VALUES ('请输入url');
INSERT INTO `tuijianwei` (`url`) VALUES ('请输入url');
INSERT INTO `tuijianwei` (`url`) VALUES ('请输入url');
INSERT INTO `tuijianwei` (`url`) VALUES ('请输入url');
INSERT INTO `tuijianwei` (`url`) VALUES ('请输入url');
