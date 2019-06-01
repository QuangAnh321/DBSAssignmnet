-- MySQL dump 10.13  Distrib 8.0.16, for Linux (x86_64)
--
-- Host: localhost    Database: dbsassignment
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'phone','2019-05-05 02:18:30'),(3,'tablet','2019-06-01 14:31:51'),(4,'accessories','2019-06-01 14:31:51');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `news_body` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `news_image_dir` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Tháng 5, mua điện thoại Samsung Galaxy ưu đãi lớn đến 5.5 triệu','Tháng 5 là tháng của ngày Quốc tế lao động, ngày sinh của cố chủ tịch Hồ Chí Minh và cũng là thời điểm “vàng” để bạn tậu điện thoại Samsung vì hàng loạt sản phẩm của công ty Hàn Quốc đang được giảm giá mạnh, trong đó mức cao nhất lên đến 5.5 triệu đồng, đi kèm theo đó là rất nhiều khuyến mãi hấp dẫn khác.','image_news/galaxys10sale.jpg','2019-05-07 17:07:50',NULL),(2,'Google Pixel 3a lộ cấu hình chi tiết trước ngày ra mắt','Trước thời điểm trình làng tại sự kiện Google I/O 2019 thì cấu hình của Pixel 3a đã được giới thạo tin khai thác khá chi tiết.\r\nTheo Gizmochina, Google Pixel 3a sẽ có màn hình OLED kích thước 5.6 inch HD+, tỉ lệ màn hình 18:9. Màn hình này sẽ hỗ trợ tính năng Always-on Display và Always-listening, với tỉ lệ tương phản 1666677666.000:1.\r\n\r\nCung cấp sức mạnh cho máy là bộ vi xử lý tám Snapdragon 670, đi kèm 4 GB RAM và 64 GB ROM.\r\n\r\nVề phần camera, Pixel 3a sẽ có cảm biến lấy nét Dual Pixel 12.2 MP khẩu độ F/1.8 cho khả năng bắt nét tốt và chống rung quang học (OIS) và điện tử (EIS), cho góc nhìn 76 độ. Được biết, Pixel 3a sẽ có thể quay video chất lượng Full HD ở tốc độ 30, 60 hoặc 120 khung hình/ giây, video độ phân giải HD ở tốc độ 30, 60 hoặc 240 khung hình/giây và video 4K tốc độ 30 khung hình/giây.\r\n\r\nMặt trước của máy là cảm biến 8 MP khẩu độ F/2.0 với góc nhìn 84 độ, hỗ trợ quay video chất lượng Full HD, HD và 480p ở tốc độ 30 khung hình/giây.\r\n\r\nCung cấp sức mạnh cho máy là viên pin dung lượng 3.000 mAh hỗ trợ sạc nhanh công suất 18W, hỗ trợ một khe nano-SIM duy nhất, hỗ trợ eSIM ở một số thị trường, cổng cắm tai nghe 3.5 mm, Wi-Fi băng tần kép, GPS và Bluetooth 5.0, tích hợp loa âm thanh nổi, cảm biến vân tay ở mặt lưng và hỗ trợ tính năng Active Edge.\r\n\r\nNgoài ra, Pixel 3a sẽ cài sẵn hệ điều hành Android Pie 9.0, được hoàn thiện bằng chất liệu nhựa polycarbonate, trọng lượng 147 gram và kích thước 151.3 x 70.1 x 8.2 mm.\r\ngggggg\r\n','image_news/pixel-3a.jpg','2019-05-08 05:40:25',NULL),(4,'test','test 5656656','image_news/193592.jpg','2019-05-15 04:39:39','2019-05-15 04:39:52'),(5,'blabla','<p><em>lmao</em></p>\r\n','image_news/193767.jpg','2019-05-15 04:45:58','2019-05-15 04:45:58');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_price` decimal(11,0) NOT NULL,
  `product_description` varchar(45) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `brand_id` int(11) DEFAULT NULL,
  `product_inthebox` varchar(100) DEFAULT NULL,
  `product_warranty` int(11) DEFAULT NULL,
  `product_processor` varchar(45) DEFAULT NULL,
  `product_dimension` varchar(45) DEFAULT NULL,
  `product_screen` varchar(45) DEFAULT NULL,
  `product_camera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_1_idx` (`category_id`),
  KEY `fk_brand_idx` (`brand_id`),
  CONSTRAINT `fk_products_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_products_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Galaxy S10',1,18990000,'Bezeless screen, Android os','image/GalaxyS10.png','2019-06-01 15:05:16',NULL,'Fast Charger, USB C cable, SIM tool, User manual',12,'Exynos 9820','162.5 x 74.8 x 6.2','Dynamic AMOLED, 6.1\", Quad HD+ (2K+)','12 MP'),(2,'iPhone XS',1,26990000,'Latest iPhone','image/iphonexs.png','2019-06-01 15:05:16',NULL,'Charger, USB C cable, SIM tool, User manual',24,'Apple A11 Bionic ','143.6 x 70.9 x 7.2','OLED, 5.8\", Super Retina','12 MP'),(3,'iPad Pro',3,21490000,'Powerfull iPad','image/ipadpro.png','2019-06-01 15:05:16',NULL,'Charger, USB C cable, SIM tool',12,'Apple A12X Bionic ','247 x 178 x 5.9','Liquid Retina display, 11\"','12 MP'),(4,'Micro USB Cable',4,20000,'Charging cable','image/microusbcable.jpg','2019-06-01 15:05:16',NULL,'User manual',6,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'abc','abc@gmail.com','e10adc3949ba59abbe56e057f20f883e',2),(2,'thanh123','thanh123@gmail.com','67184f7e950708e90c47cbca8e01fb39',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-02  0:18:38
