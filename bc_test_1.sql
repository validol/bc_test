-- --------------------------------------------------------
-- Host:                         
-- Server version:               10.8.3-MariaDB-1:10.8.3+maria~jammy - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for bc_test_1
CREATE DATABASE IF NOT EXISTS `bc_test_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bc_test_1`;


-- Dumping structure for table bc_test_1.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bc_test_1.categories: ~7 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`) VALUES
	(1, 'Camera'),
	(2, 'Phone'),
	(3, 'Laptop'),
	(4, 'PC'),
	(5, 'Watch'),
	(6, 'Mouse'),
	(7, 'USB');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table bc_test_1.manufacturer
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bc_test_1.manufacturer: ~19 rows (approximately)
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` (`id`, `title`) VALUES
	(1, 'Samsung'),
	(2, 'Lenovo'),
	(3, 'Xiaomi'),
	(4, 'Toshiba'),
	(5, 'Acer'),
	(6, 'iPhone'),
	(7, 'Canon'),
	(8, 'Nikon'),
	(9, 'MSI'),
	(10, 'HP'),
	(11, 'Huawei'),
	(12, 'Meizu'),
	(13, 'Dell'),
	(14, 'Asus'),
	(15, 'Garmin'),
	(16, 'Nokia'),
	(17, 'Microsoft'),
	(22, 'Razer');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;


-- Dumping structure for table bc_test_1.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `category` int(10) unsigned NOT NULL DEFAULT 0,
  `manufacturer` int(10) unsigned DEFAULT 0,
  `in_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`category`),
  KEY `FK_product_manufacturer` (`manufacturer`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bc_test_1.products: ~23 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `title`, `category`, `manufacturer`, `in_stock`) VALUES
	(1, 'Product_1', 1, 8, 1),
	(2, 'Product_2', 5, 17, 0),
	(3, 'Product_3', 2, 5, 1),
	(4, 'Product_4', 3, 1, 1),
	(5, 'Product_5', 4, 2, 0),
	(6, 'Product_6', 2, 3, 1),
	(7, 'Product_7', 1, 4, 1),
	(8, 'Product_8', 1, 17, 1),
	(9, 'Product_9', 3, 6, 1),
	(10, 'Product_10', 4, 7, 1),
	(11, 'Product_11', 2, 8, 1),
	(12, 'Product_12', 4, 9, 1),
	(13, 'Product_13', 2, 10, 0),
	(14, 'Product_14', 5, 11, 1),
	(15, 'Product_15', 2, 12, 1),
	(16, 'Product_16', 3, 13, 1),
	(17, 'Product_17', 3, 14, 1),
	(18, 'Product_18', 5, 15, 1),
	(19, 'Product_19', 3, 16, 1),
	(20, 'Product_20', 5, 6, 1),
	(21, 'Product_21', 4, 3, 0),
	(22, 'Product_22', 5, 1, 1),
	(23, 'Product_23', 5, 4, 0);
	(24, 'Product_24', 2, 3, 1),
	(25, 'Product_25', 1, 4, 1),
	(26, 'Product_26', 1, 17, 1),
	(27, 'Product_27', 3, 6, 1),
	(28, 'Product_28', 4, 7, 1),
	(29, 'Product_29', 4, 9, 1),
	(30, 'Product_30', 2, 10, 0),
	(31, 'Product_31', 1, 8, 1),
	(32, 'Product_32', 5, 17, 0),
	(33, 'Product_33', 4, 3, 0),
	(34, 'Product_34', 2, 3, 1),
	(35, 'Product_35', 3, 6, 1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table bc_test_1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `email` varchar(50) DEFAULT '0',
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bc_test_1.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
	(1, 'admin', 'admin@example.com', '$2y$10$eFZJVvBoH/lrlnVPK30KKOr6f3ycyZ97E2mUDPaJJCKw9HJwjWwDq', 'admin'), -- /* admin123user */
	(2, 'Jack', 'jack@example.com', '$2y$10$kpZwwaBFz1AUEViTtIz0XeZvAN68AQe4vrVlKxm5AdZB.CqwoxC4i', 'user'),  	-- /* jack123user */
	(3, 'Jill', 'jill@example.com', '$2y$10$op3GGgdg8ZIdoQPbTgUI5.rBcCHq.CN71oU7/qsHb2Answ3MESZa.', 'user');  	-- /* jill123user */
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
