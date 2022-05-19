-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: oovmediaDB
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `DOB` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES (1,'{\"en\":\"Allu Arjun\"}','actor_1648122333Allu Arjun.jpg','{\"en\":\"A recipient of several awards, including five Filmfare Awards South and five Nandi Awards, Allu Arjun is one of the highest paid actors in South India and known for his dancing abilitie. Since 2014, he has been featured in Forbes India\'s Celebrity 100 list based on his income and popularity. Nicknamed Bunny, he was born on April 8, 1982. His father, Allu Aravind, is a famous producer and his uncle, Chiranjeevi is one of the top actors in the Telugu industry. He is well-known as stylish star for his unique way of acting and dancing.\"}','Chennai, Tamil Nadu, India','1982-04-08','2022-03-24 11:45:33','2022-03-24 11:45:33','allu-arjun'),(2,'{\"en\":\"Rashmika Mandanna\"}','actor_1648122460Rashmika Mandanna.jpg','{\"en\":\"Rashmika Mandanna is a Telugu and Kannada film actress. She is a recipient of the Filmfare Award South and the SIIMA Award. She is known for her roles in Kirik Party and Geetha Govindam. In 2021, Rashmika featured in the Hindi music video Uchana Amit Feat. Badshah, Yuvan Shankar Raja, Jonita Gandhi, Rashmika Mandanna: Top Tucker alongside rapper Badshah, Amit Uchana and Yuvan Shankar. She also starred in the Kannada language film Pogaru opposite Dhruva Sarja and made her Tamil debut with the hit film Sultan opposite Karthi.\"}','Virajpete, Kodagu (Coorg), Karnataka','1996-04-05','2022-03-24 11:47:40','2022-03-24 11:47:40','rashmika-mandanna'),(3,'{\"en\":\"Brad Pitt\"}','actor_1648719178actor_1643974583brad-pitt-1.jpg','{\"en\":\"Counted among the most influential and powerful people in the American entertainment industry, Brad Pitt is an actor and film producer who has appeared in many big-budget productions. He was cited as the world\\u2019s most attractive man for several years. He is also involved in various philanthropic and humanitarian endeavors.\"}','Shawnee, Oklahoma, United States','1963-12-18','2022-03-31 09:32:58','2022-03-31 09:32:58','brad-pitt'),(4,'{\"en\":\"Heath Ledger\"}','actor_1648719265actor_1643974634heath-ledger-3.jpg','{\"en\":\"An Australian actor, Heath Ledger grabbed limelight in America with the teen comedy 10 Things I Hate About You. However, it was role in Brokeback Mountain that made him a star and earned him comparisons with greats actors like Marlon Brando. The brilliant actor gave his last performance as Joker in The Dark Knight which became a massive success.\"}','Perth, Australia','2008-01-22','2022-03-31 09:34:25','2022-03-31 09:34:25','heath-ledger');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_target` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_hold` int DEFAULT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endtime` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads`
--

LOCK TABLES `ads` WRITE;
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adsenses`
--

DROP TABLE IF EXISTS `adsenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adsenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ishome` tinyint(1) NOT NULL,
  `isviewall` tinyint(1) NOT NULL,
  `issearch` tinyint(1) NOT NULL,
  `iswishlist` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adsenses`
--

LOCK TABLES `adsenses` WRITE;
/*!40000 ALTER TABLE `adsenses` DISABLE KEYS */;
INSERT INTO `adsenses` VALUES (1,'<script type=\"text/javascript\">\r\ngoogle_ad_client = \"\";  \r\ngoogle_ad_slot = \"99*****99\"; \r\ngoogle_ad_width = 728;\r\ngoogle_ad_height =  90; \r\n\r\n</script>',0,0,0,0,0,'2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `adsenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affilate_histories`
--

DROP TABLE IF EXISTS `affilate_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `affilate_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `refer_user_id` int unsigned NOT NULL,
  `log` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int unsigned NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `procces` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affilate_histories`
--

LOCK TABLES `affilate_histories` WRITE;
/*!40000 ALTER TABLE `affilate_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `affilate_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affilates`
--

DROP TABLE IF EXISTS `affilates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `affilates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code_limit` int NOT NULL,
  `about_system` longtext COLLATE utf8mb4_unicode_ci,
  `enable_affilate` int NOT NULL DEFAULT '0',
  `refer_amount` double NOT NULL DEFAULT '0',
  `enable_purchase` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affilates`
--

LOCK TABLES `affilates` WRITE;
/*!40000 ALTER TABLE `affilates` DISABLE KEYS */;
INSERT INTO `affilates` VALUES (1,6,'<p><strong><span class=\"marker\">How it works ? &nbsp;</span><br />\r\n<br />\r\nOnce the system is enabled user will able to put refer code on register screen if refer code is valid then settled amount is given to that referral user&#39;s wallet (IF his wallet is active).</strong><br />\r\n<strong>IF refer code is invalid user will see invalid refer code warning on register screen unless he put correct refer code or remove the refer code.</strong></p>\r\n\r\n<p><strong>IF Credit wallet amount on first purchase settings is enabled then after being referred, user need to purchase something. Once their order is delivered successfully then referral code user will get their amount in wallet.&nbsp;</strong></p>\r\n\r\n<p><strong>IF Credit wallet amount on first purchase settings is disabled then after being referred, referral code user will get their amount in wallet.&nbsp;</strong><br />\r\n<strong>After Enable the Affiliate system user will have a have a refer screen to share his affiliated link and he will able to trace which user is signup with his refer code on his dashboard under My Account section.</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>',1,0.01,0,'2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `affilates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_configs`
--

DROP TABLE IF EXISTS `app_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_configs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_payment` tinyint(1) NOT NULL DEFAULT '0',
  `paypal_payment` tinyint(1) NOT NULL DEFAULT '0',
  `razorpay_payment` tinyint(1) NOT NULL DEFAULT '0',
  `brainetree_payment` tinyint(1) NOT NULL DEFAULT '0',
  `paystack_payment` tinyint(1) NOT NULL DEFAULT '0',
  `bankdetails` tinyint(1) NOT NULL DEFAULT '0',
  `fb_check` tinyint(1) NOT NULL DEFAULT '0',
  `google_login` tinyint(1) NOT NULL DEFAULT '0',
  `git_lab_check` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inapp_payment` tinyint(1) NOT NULL DEFAULT '0',
  `push_key` tinyint(1) NOT NULL DEFAULT '0',
  `remove_ads` tinyint(1) NOT NULL DEFAULT '0',
  `paytm_payment` tinyint(1) NOT NULL DEFAULT '0',
  `amazon_login` tinyint(1) NOT NULL DEFAULT '0',
  `is_admob` tinyint(1) NOT NULL DEFAULT '0',
  `instamojo_payment` tinyint(1) NOT NULL DEFAULT '0',
  `banner_admob` tinyint(1) NOT NULL DEFAULT '0',
  `banner_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interstitial_admob` tinyint(1) NOT NULL DEFAULT '0',
  `interstitial_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_apikey` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_configs`
--

LOCK TABLES `app_configs` WRITE;
/*!40000 ALTER TABLE `app_configs` DISABLE KEYS */;
INSERT INTO `app_configs` VALUES (1,'applogo_1606642921logo.png','Nexthour',0,0,0,0,0,0,0,0,0,'2022-03-24 02:30:55','2022-03-24 02:30:55',0,0,0,0,0,0,0,0,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `app_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_sliders`
--

DROP TABLE IF EXISTS `app_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int unsigned DEFAULT NULL,
  `tv_series_id` int unsigned DEFAULT NULL,
  `slide_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `position` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `app_sliders_movie_id_foreign` (`movie_id`),
  KEY `app_sliders_tv_series_id_foreign` (`tv_series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_sliders`
--

LOCK TABLES `app_sliders` WRITE;
/*!40000 ALTER TABLE `app_sliders` DISABLE KEYS */;
INSERT INTO `app_sliders` VALUES (1,NULL,NULL,'app_slide_1606642528movie.jpg',1,1,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(2,NULL,NULL,'app_slide_1606642578tvshow.jpg',1,2,'2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `app_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audio` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `maturity_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_audio` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `is_protect` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audiourl` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audio`
--

LOCK TABLES `audio` WRITE;
/*!40000 ALTER TABLE `audio` DISABLE KEYS */;
/*!40000 ALTER TABLE `audio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audio_languages`
--

DROP TABLE IF EXISTS `audio_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audio_languages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audio_languages`
--

LOCK TABLES `audio_languages` WRITE;
/*!40000 ALTER TABLE `audio_languages` DISABLE KEYS */;
INSERT INTO `audio_languages` VALUES (1,'{\"en\":\"Hindi\"}','2022-03-24 11:00:04','2022-03-24 14:14:46','audiolanguage_1648130695red-yellow-watercolor_95678-448.jpg',1),(2,'{\"en\":\"English\"}','2022-03-24 11:00:24','2022-03-24 14:16:42','audiolanguage_1648131402marbled-paint-blue-texture-backgrounds-wallpapers.jpg',1),(3,'{\"en\":\"Punjabi\"}','2022-03-24 14:07:43','2022-03-24 14:18:42','audiolanguage_1648131521modern-colorful-blue-green-watercolor-texture-vector.jpg',1),(4,'{\"en\":\"Bhojpuri\"}','2022-03-24 14:09:09','2022-03-24 14:15:14','audiolanguage_1648130948red-concrete-background.jpg',1);
/*!40000 ALTER TABLE `audio_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_customizes`
--

DROP TABLE IF EXISTS `auth_customizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_customizes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_customizes`
--

LOCK TABLES `auth_customizes` WRITE;
/*!40000 ALTER TABLE `auth_customizes` DISABLE KEYS */;
INSERT INTO `auth_customizes` VALUES (1,'{\"en\":\"auth_page1648117638wallpaperflare.com_wallpaper (3).jpg\"}','{\"en\":\"<h1>Join OOV- the Largest Internet TV Provider in India for Hindi and Bhojpuri.<\\/h1>\\r\\n\\r\\n<p>OOV Media merges the power of technology and convenience of internet to bring the best of entertainment to your mobile, laptop and PC. Watch from our unified OTT catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows &amp; Web Series across multiple languages- English, Filipino, Hindi, Punjabi and Bhojpuri.<\\/p>\\r\\n\\r\\n<h2>Watch from our unified OTT catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows &amp; Web Series.<\\/h2>\"}','2022-03-24 02:30:55','2022-03-24 10:27:18');
/*!40000 ALTER TABLE `auth_customizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_log`
--

DROP TABLE IF EXISTS `auth_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint unsigned NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` text COLLATE utf8mb4_unicode_ci,
  `browser` text COLLATE utf8mb4_unicode_ci,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_log_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_log`
--

LOCK TABLES `auth_log` WRITE;
/*!40000 ALTER TABLE `auth_log` DISABLE KEYS */;
INSERT INTO `auth_log` VALUES (1,'App\\User',1,'157.119.82.1','Ubuntu','Firefox','2022-03-24 02:34:00',NULL),(2,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-24 04:05:38','2022-03-24 07:02:24'),(3,'App\\User',1,'157.119.82.1','Ubuntu','Firefox','2022-03-24 04:07:38','2022-03-24 06:59:59'),(4,'App\\User',1,'157.119.82.1','Ubuntu','Firefox','2022-03-24 07:06:38',NULL),(5,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-24 07:07:06',NULL),(6,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-24 09:28:56','2022-03-24 10:25:29'),(7,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-24 10:26:52','2022-03-24 10:27:33'),(8,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-24 10:28:08','2022-03-24 12:19:46'),(9,'App\\User',1,'157.119.82.1','Ubuntu','Firefox','2022-03-24 12:06:45','2022-03-24 13:03:52'),(10,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-24 13:11:08','2022-03-24 14:33:16'),(11,'App\\User',1,'157.119.82.1','Ubuntu','Firefox','2022-03-24 13:43:46',NULL),(12,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-26 05:40:34',NULL),(13,'App\\User',1,'49.36.185.184','Ubuntu','Firefox','2022-03-26 10:05:44',NULL),(14,'App\\User',1,'157.119.82.1','Windows','Chrome','2022-03-26 10:34:54',NULL),(15,'App\\User',1,'47.31.234.181','Windows','Chrome','2022-03-28 09:11:13',NULL),(16,'App\\User',1,'117.251.114.198','Ubuntu','Firefox','2022-03-28 10:31:57',NULL),(17,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-28 15:45:31',NULL),(18,'App\\User',1,'47.31.234.181','Windows','Chrome','2022-03-28 16:00:11',NULL),(19,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-29 03:47:26','2022-03-29 04:04:18'),(20,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-29 04:05:21',NULL),(21,'App\\User',1,'117.251.114.198','Ubuntu','Firefox','2022-03-29 04:09:36',NULL),(22,'App\\User',2,'103.164.25.204','Windows','Firefox','2022-03-29 04:17:32',NULL),(23,'App\\User',1,'47.31.227.236','Windows','Chrome','2022-03-29 10:44:37','2022-03-29 10:54:48'),(24,'App\\User',1,'47.31.227.236','Windows','Chrome','2022-03-29 10:55:22',NULL),(25,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-29 11:11:49',NULL),(26,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-29 11:54:12',NULL),(27,'App\\User',1,'49.36.185.88','Ubuntu','Firefox','2022-03-29 14:22:48',NULL),(28,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-30 13:35:20',NULL),(29,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-30 13:40:21',NULL),(30,'App\\User',1,'47.31.139.16','AndroidOS','Chrome','2022-03-30 13:46:40','2022-03-30 13:47:28'),(31,'App\\User',1,'47.31.139.16','Windows','Chrome','2022-03-30 13:52:38',NULL),(32,'App\\User',1,'49.36.185.88','Ubuntu','Firefox','2022-03-30 14:16:20',NULL),(33,'App\\User',1,'117.251.114.198','Ubuntu','Firefox','2022-03-31 03:20:31','2022-03-31 04:09:51'),(34,'App\\User',1,'117.251.114.198','Ubuntu','Firefox','2022-03-31 04:10:46','2022-03-31 04:48:47'),(35,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 04:19:06','2022-03-31 04:32:48'),(36,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-03-31 04:33:36','2022-03-31 04:39:38'),(37,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 04:39:56','2022-03-31 04:41:43'),(38,'App\\User',4,'103.164.25.204','Windows','Chrome','2022-03-31 04:43:10','2022-03-31 04:43:54'),(39,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 04:44:05','2022-03-31 06:49:43'),(40,'App\\User',5,'117.251.114.198','Ubuntu','Firefox','2022-03-31 04:49:09',NULL),(41,'App\\User',1,'103.164.25.204','Windows','Firefox','2022-03-31 06:45:18',NULL),(42,'App\\User',5,'49.36.185.88','Ubuntu','Firefox','2022-03-31 06:50:39','2022-03-31 06:52:56'),(43,'App\\User',6,'103.164.25.204','Windows','Chrome','2022-03-31 06:50:54',NULL),(44,'App\\User',1,'49.36.185.88','Ubuntu','Firefox','2022-03-31 06:53:03','2022-03-31 09:34:56'),(45,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 07:13:00','2022-03-31 07:30:19'),(46,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-03-31 07:30:51','2022-03-31 16:49:35'),(47,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 08:06:27','2022-03-31 09:56:30'),(48,'App\\User',1,'47.31.135.83','Windows','Chrome','2022-03-31 09:04:22',NULL),(49,'App\\User',5,'49.36.185.88','Ubuntu','Firefox','2022-03-31 09:35:17','2022-03-31 09:50:41'),(50,'App\\User',7,'49.36.185.88','Ubuntu','Firefox','2022-03-31 09:51:06','2022-03-31 10:00:17'),(51,'App\\User',8,'103.164.25.204','Windows','Chrome','2022-03-31 09:57:26',NULL),(52,'App\\User',1,'49.36.185.88','Ubuntu','Firefox','2022-03-31 10:00:32','2022-03-31 10:05:00'),(53,'App\\User',5,'49.36.185.88','Ubuntu','Firefox','2022-03-31 10:05:51',NULL),(54,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 12:24:40',NULL),(55,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 14:57:56',NULL),(56,'App\\User',1,'49.36.185.88','Ubuntu','Firefox','2022-03-31 15:15:03',NULL),(57,'App\\User',1,'103.164.25.204','AndroidOS','Chrome',NULL,'2022-03-31 16:07:46'),(58,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-03-31 16:08:54',NULL),(59,'App\\User',1,'47.31.135.83','AndroidOS','Chrome','2022-03-31 16:43:43',NULL),(60,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-03-31 16:50:20',NULL),(61,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-03-31 17:04:52',NULL),(62,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-01 00:08:48',NULL),(63,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-04-01 05:18:34',NULL),(64,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-01 06:23:22',NULL),(65,'App\\User',1,'47.31.158.45','AndroidOS','Chrome','2022-04-01 07:11:52','2022-04-01 11:17:59'),(66,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-04-01 09:37:57',NULL),(67,'App\\User',5,'205.253.123.89','Ubuntu','Firefox','2022-04-01 09:41:12',NULL),(68,'App\\User',3,'157.37.192.161','AndroidOS','Chrome','2022-04-01 09:44:30',NULL),(69,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-01 09:44:32',NULL),(70,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-01 09:44:33','2022-04-01 12:36:10'),(71,'App\\User',1,'47.31.158.45','AndroidOS','Chrome','2022-04-01 12:58:36','2022-04-01 13:10:37'),(72,'App\\User',1,'47.31.158.45','AndroidOS','Chrome','2022-04-01 13:13:00',NULL),(73,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-01 13:14:12',NULL),(74,'App\\User',1,'47.31.158.45','AndroidOS','Chrome','2022-04-01 13:26:21',NULL),(75,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-04-01 15:13:56',NULL),(76,'App\\User',3,'47.31.242.68','AndroidOS','Chrome','2022-04-01 22:42:38',NULL),(77,'App\\User',1,'47.31.158.45','AndroidOS','Chrome','2022-04-02 06:11:39',NULL),(78,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-02 07:10:27',NULL),(79,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-04-02 09:22:52','2022-04-02 09:34:02'),(80,'App\\User',1,'47.31.158.45','Windows','Chrome','2022-04-02 09:26:58','2022-04-02 09:40:17'),(81,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-04-02 09:34:28','2022-04-02 11:56:58'),(82,'App\\User',5,'47.31.158.45','Windows','Chrome','2022-04-02 09:40:46',NULL),(83,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-04-02 11:57:19',NULL),(84,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-02 12:18:06',NULL),(85,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-04-02 15:35:35','2022-04-02 15:36:23'),(86,'App\\User',9,'103.164.25.204','Windows','Chrome','2022-04-02 15:37:28','2022-04-02 15:40:23'),(87,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-04-03 05:21:08',NULL),(88,'App\\User',3,'103.164.25.204','AndroidOS','Chrome','2022-04-03 13:18:02',NULL),(89,'App\\User',1,'117.251.114.198','Ubuntu','Firefox','2022-04-04 05:24:21',NULL),(90,'App\\User',1,'103.164.25.204','Windows','Chrome','2022-04-04 07:09:26',NULL),(91,'App\\User',5,'47.31.141.172','Windows','Chrome','2022-04-04 08:07:45',NULL),(92,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-04-04 11:23:57','2022-04-04 11:41:16'),(93,'App\\User',10,'103.164.25.204','Windows','Chrome','2022-04-04 17:31:10',NULL),(94,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-04-05 05:08:00',NULL),(95,'App\\User',11,'117.251.114.198','Ubuntu','Firefox','2022-04-05 05:42:40',NULL),(96,'App\\User',3,'103.164.25.204','Windows','Chrome','2022-04-05 10:37:29',NULL),(97,'App\\User',5,'47.31.255.76','AndroidOS','Chrome','2022-04-06 12:37:03',NULL),(98,'App\\User',3,'157.37.154.239','AndroidOS','Chrome','2022-04-06 16:31:16',NULL),(99,'App\\User',5,'47.31.255.76','Windows','Chrome','2022-04-07 05:49:16','2022-04-07 06:59:25'),(100,'App\\User',5,'117.251.114.198','Ubuntu','Firefox','2022-04-07 05:52:48',NULL),(101,'App\\User',12,'47.31.255.76','Windows','Chrome','2022-04-07 07:01:13','2022-04-07 07:39:24'),(102,'App\\User',1,'47.31.255.76','Windows','Chrome','2022-04-07 07:41:00','2022-04-07 07:41:12'),(103,'App\\User',13,'47.31.255.76','Windows','Chrome','2022-04-07 07:48:43',NULL),(104,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-07 08:15:41',NULL),(105,'App\\User',13,'47.31.255.76','Windows','Chrome','2022-04-07 16:24:39',NULL),(106,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-07 17:19:19',NULL),(107,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-08 07:17:45','2022-04-08 07:18:55'),(108,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-08 07:19:14',NULL),(109,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-08 07:20:31','2022-04-08 07:38:51'),(110,'App\\User',14,'43.230.66.182','AndroidOS','Chrome','2022-04-11 12:52:09',NULL),(111,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-11 13:14:29','2022-04-11 13:15:36'),(112,'App\\User',14,'49.36.187.76','Ubuntu','Firefox','2022-04-11 13:17:33','2022-04-11 13:20:26'),(113,'App\\User',1,'43.230.66.182','Windows','Chrome','2022-04-11 13:18:41','2022-04-11 13:22:12'),(114,'App\\User',1,'49.36.187.76','Ubuntu','Firefox','2022-04-11 13:20:39','2022-04-11 13:21:16'),(115,'App\\User',5,'49.36.187.76','Ubuntu','Firefox','2022-04-11 13:21:40','2022-04-11 13:22:09'),(116,'App\\User',1,'49.36.187.76','Ubuntu','Firefox','2022-04-11 13:22:16','2022-04-11 13:22:54'),(117,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-11 13:22:37','2022-04-11 13:23:49'),(118,'App\\User',14,'49.36.187.76','Ubuntu','Firefox','2022-04-11 13:23:13','2022-04-11 13:25:30'),(119,'App\\User',3,'49.36.187.76','Ubuntu','Firefox','2022-04-11 13:26:05',NULL),(120,'App\\User',15,'43.230.66.182','Windows','Chrome','2022-04-11 13:26:35','2022-04-11 13:28:18'),(121,'App\\User',1,'43.230.66.182','Windows','Chrome','2022-04-11 13:28:33','2022-04-11 13:30:02'),(122,'App\\User',15,'43.230.66.182','Windows','Chrome','2022-04-11 13:30:39','2022-04-11 13:30:53'),(123,'App\\User',14,'43.230.66.182','Windows','Chrome','2022-04-11 13:31:29',NULL),(124,'App\\User',15,'103.158.106.130','Windows','Chrome','2022-04-12 16:49:56',NULL),(125,'App\\User',3,'103.158.106.130','Windows','Chrome','2022-04-13 07:56:13','2022-04-13 07:56:56'),(126,'App\\User',16,'103.158.106.130','Windows','Chrome','2022-04-13 07:58:20','2022-04-13 07:59:17'),(127,'App\\User',16,'103.158.106.130','Windows','Chrome','2022-04-13 07:59:44',NULL),(128,'App\\User',1,'49.36.144.143','Ubuntu','Firefox','2022-04-14 13:28:32',NULL),(129,'App\\User',15,'103.158.106.130','Windows','Chrome','2022-04-15 04:43:51',NULL),(130,'App\\User',15,'103.158.106.130','Windows','Chrome','2022-04-15 07:54:31',NULL),(131,'App\\User',14,'103.158.106.130','Windows','Chrome','2022-04-15 10:16:15',NULL),(132,'App\\User',1,'103.158.106.130','Windows','Chrome','2022-04-15 15:31:16',NULL),(133,'App\\User',1,'103.158.106.130','Windows','Chrome','2022-04-15 15:50:43',NULL),(134,'App\\User',3,'103.158.106.130','AndroidOS','Chrome','2022-04-15 18:03:40',NULL),(135,'App\\User',15,'103.158.106.130','AndroidOS','Chrome','2022-04-15 18:05:43',NULL),(136,'App\\User',1,'117.251.114.196','Ubuntu','Firefox','2022-04-21 04:40:12',NULL),(137,'App\\User',17,'103.81.182.61','OS X','Chrome','2022-04-21 14:25:57',NULL),(138,'App\\User',18,'103.164.24.220','Windows','Chrome','2022-04-21 14:26:18',NULL),(139,'App\\User',3,'103.164.24.220','Windows','Chrome','2022-04-21 14:34:08',NULL),(140,'App\\User',17,'112.196.162.52','AndroidOS','Chrome','2022-04-22 11:39:18',NULL),(141,'App\\User',1,'103.164.24.206','Windows','Chrome','2022-04-23 03:50:26','2022-04-23 07:31:20'),(142,'App\\User',1,'49.36.144.179','Ubuntu','Firefox','2022-04-23 04:35:19',NULL),(143,'App\\User',3,'103.164.24.206','Windows','Chrome','2022-04-23 07:32:06',NULL),(144,'App\\User',1,'103.164.24.224','Windows','Chrome','2022-04-25 03:22:14',NULL),(145,'App\\User',17,'112.196.162.216','OS X','Chrome','2022-04-25 14:36:51',NULL),(146,'App\\User',3,'103.158.106.130','AndroidOS','Chrome','2022-04-26 06:39:08',NULL),(147,'App\\User',3,'103.158.106.130','AndroidOS','Chrome','2022-04-26 08:58:13','2022-04-26 09:04:14'),(148,'App\\User',1,'103.158.106.130','Windows','Chrome','2022-04-26 09:08:19',NULL),(149,'App\\User',17,'47.8.3.21','AndroidOS','Chrome','2022-04-28 14:45:55',NULL),(150,'App\\User',17,'103.81.182.138','AndroidOS','Chrome','2022-04-29 01:52:27',NULL),(151,'App\\User',17,'47.9.131.96','AndroidOS','Chrome','2022-04-29 04:13:51',NULL),(152,'App\\User',17,'47.9.146.125','AndroidOS','Chrome','2022-04-29 07:59:25','2022-04-29 08:23:54'),(153,'App\\User',19,'47.9.146.125','AndroidOS','Chrome','2022-04-29 08:26:29',NULL),(154,'App\\User',19,'47.9.146.125','Windows','Chrome','2022-04-29 08:40:33',NULL),(155,'App\\User',20,'43.230.66.158','Windows','Chrome','2022-04-29 08:47:16','2022-04-29 08:59:11'),(156,'App\\User',1,'43.230.66.158','Windows','Chrome','2022-04-29 08:59:46',NULL),(157,'App\\User',21,'117.98.32.79','AndroidOS','Chrome','2022-04-29 09:05:21',NULL),(158,'App\\User',22,'103.81.182.86','AndroidOS','Chrome','2022-04-30 15:19:44',NULL),(159,'App\\User',23,'117.98.66.50','AndroidOS','Chrome','2022-05-02 04:30:13',NULL),(160,'App\\User',1,'103.164.25.21','Windows','Chrome','2022-05-02 05:32:02',NULL),(161,'App\\User',5,'14.139.56.4','AndroidOS','Chrome','2022-05-02 05:40:18',NULL),(162,'App\\User',5,'14.139.56.4','Ubuntu','Firefox','2022-05-04 03:16:56',NULL),(163,'App\\User',5,'205.253.121.204','AndroidOS','Chrome','2022-05-04 03:23:15',NULL),(164,'App\\User',24,'47.9.150.163','AndroidOS','Chrome','2022-05-04 03:54:12',NULL),(165,'App\\User',1,'103.219.229.223','Windows','Chrome','2022-05-04 04:26:50',NULL),(166,'App\\User',1,'14.139.56.4','Ubuntu','Firefox','2022-05-05 05:24:52',NULL),(167,'App\\User',1,'43.251.92.73','Windows','Chrome','2022-05-05 05:28:16',NULL),(168,'App\\User',25,'103.81.182.99','AndroidOS','Chrome','2022-05-05 14:59:12',NULL),(169,'App\\User',26,'103.81.182.99','AndroidOS','Chrome','2022-05-05 15:01:25',NULL),(170,'App\\User',27,'43.230.64.112','AndroidOS','Chrome','2022-05-05 15:11:00',NULL),(171,'App\\User',5,'117.251.114.196','Ubuntu','Firefox','2022-05-06 08:09:01',NULL),(172,'App\\User',28,'103.158.106.130','Windows','Chrome','2022-05-06 09:29:54','2022-05-06 10:06:10'),(173,'App\\User',29,'103.158.106.130','AndroidOS','Chrome','2022-05-06 09:44:09','2022-05-06 10:53:43'),(174,'App\\User',5,'117.251.114.196','Ubuntu','Firefox','2022-05-06 09:55:01',NULL),(175,'App\\User',1,'103.158.106.130','Windows','Chrome','2022-05-06 10:06:27','2022-05-06 10:52:40'),(176,'App\\User',5,'205.253.122.69','AndroidOS','Chrome','2022-05-06 10:50:58',NULL),(177,'App\\User',30,'103.158.106.130','Windows','Chrome','2022-05-06 10:53:15',NULL),(178,'App\\User',5,'205.253.122.69','AndroidOS','Chrome','2022-05-06 10:53:57',NULL),(179,'App\\User',31,'103.158.106.130','AndroidOS','Chrome','2022-05-06 12:52:31',NULL),(180,'App\\User',32,'103.81.182.111','AndroidOS','Chrome','2022-05-06 14:28:41',NULL),(181,'App\\User',33,'27.63.39.150','AndroidOS','Chrome','2022-05-07 07:39:57',NULL),(182,'App\\User',34,'103.81.182.34','AndroidOS','Chrome','2022-05-07 14:09:58',NULL),(183,'App\\User',1,'14.139.56.4','Ubuntu','Firefox','2022-05-09 06:07:41','2022-05-09 06:10:23'),(184,'App\\User',5,'14.139.56.4','Ubuntu','Firefox','2022-05-09 06:11:03',NULL),(185,'App\\User',17,'120.89.73.88','Windows','Chrome','2022-05-09 14:30:55',NULL),(186,'App\\User',5,'14.139.56.4','Ubuntu','Firefox','2022-05-18 04:35:11',NULL),(187,'App\\User',5,'205.253.120.137','AndroidOS','Chrome','2022-05-18 04:42:19',NULL);
/*!40000 ALTER TABLE `auth_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_menu`
--

DROP TABLE IF EXISTS `blog_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_menu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `blog_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_menu`
--

LOCK TABLES `blog_menu` WRITE;
/*!40000 ALTER TABLE `blog_menu` DISABLE KEYS */;
INSERT INTO `blog_menu` VALUES (1,6,1,'2022-03-26 05:44:12','2022-03-26 05:44:12'),(7,6,2,'2022-03-25 22:57:13','2022-03-25 22:57:13');
/*!40000 ALTER TABLE `blog_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `is_active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `poster` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,1,'Why Atrangi Re’s view of mental health made me furious','why-atrangi-res-view-of-mental-health-made-me-furious','thumb_1648273451poster_1643947951oov_blog_1.jpg','<p>Filmmakers these days want to espouse social issues and stigmas but if Atrangi Re&rsquo;s treatment of mental health is anything to go by, these issues would be better left to those who know a thing or two about it.</p>\r\n\r\n<p>The thing about movies is that, although we look at them as a form of entertainment, their impact goes a long way, and perhaps that is why it is important to discuss Atrangi re. I&rsquo;ve always believed that mental health needs to be given space on the silver screen, but have always had my reservations about how an industry largely suited to be ignorant would use it more than just a story pivot it looks like from afar. To which point Anand L Rai&rsquo;s recently released Atrangi Re is an offensive, almost criminal handling of a subject that calls for much more sensitivity and restraint.</p>\r\n\r\n<p>Anand L Rai&rsquo;s recently released Atrangi Re is an offensive, almost criminal handling of a subject that calls for much more sensitivity and restraint.</p>\r\n\r\n<p>The film claims to be an eccentric story of Rinku (Sara Ali Khan), who we first see eloping with her boyfriend, whose name, and appearance are unknown to all except Rinku for years. Later, in the film, we&rsquo;re told that Sajjad (Akshay Kumar) the man that Rinku believes to be her boyfriend, is nothing more than a figment of her imagination. Rinku has had a traumatic and difficult childhood, witnessing the honour killing of her parents &ndash; an interfaith couple. To deal with this reality, Rinku has created Sajjad, a trauma response that has led her to retreat to this imaginary world every time she feels uncomfortable. We learn this from Dr. Madhusudhan, who sets out to meet Sajjad and Rinku in a cafeteria and finds Rinku talking to herself. Dr. Madhusudhan is a psychiatrist and friend of Vishu (Dhanush), also a resident doctor. Vishu and Rinku&rsquo;s worlds are forcefully brought together in what feels like a revival of Dhanush&rsquo;s Ranjhaana persona.</p>\r\n\r\n<p>Atrangi Re&rsquo;s idea of love feels flawed. It casts partners as ignorant saviours, in it for their own heroism, rather than empathetic listeners who crave nothing more than a better understanding of their partners.</p>\r\n\r\n<p>In one scene our psychiatrist friend tells Vishu that &lsquo;Rinku should be in a museum in France&rsquo; implying how her mental disorder is an eccentricity that should be treasured within the four walls of a museum.&nbsp; In another scene Vishu breaks into a celebratory dance after learning that the &lsquo;other man&rsquo; in Rinku&rsquo;s life, is no one but an imaginary Sajjad that she has conjured up, forgetting that this need to create an imaginary character stems from grave childhood trauma, fear and maybe even worse. From ridiculous pills to paying everyone at the Taj Mahal to clap for her, to self-diagnosing Rinku&rsquo;s trauma, Vishu spins a vicious little circus in the name of yearning and love. Rai, as he did with Raanjhana glorifies self-harm and stalking, only this time he romanticises mental disorders and implores one to say that if this isn&rsquo;t love, what is.</p>\r\n\r\n<p>Rai, as he did with Raanjhana glorifies self-harm and stalking, only this time he romanticises mental disorders and implores one to say that if this isn&rsquo;t love, what is.</p>\r\n\r\n<p>Atrangi Re&rsquo;s idea of love feels flawed. It casts partners as ignorant saviours, in it for their own heroism, rather than empathetic listeners who crave nothing more than a better understanding of their partners. I&rsquo;ve been raised in a family that understands mental health, that understands the need to heal. I have been taught the gravity of mental disorders and the need for therapy to address them, but at the same time, I&rsquo;ve also seen friends suffocate in their own skin because they came from families that didn&rsquo;t believe in counselling. Atrangi Re normalises this culture of ignorance.</p>\r\n\r\n<p>A friend recently managed to convince her family to get her help by showing them Dear Zindagi; it&rsquo;s a testament to the kind of impact that films have. We&rsquo;ve been conditioned to believe that films are pure entertainment or time-pass, rather than a medium to drive social change, but films can often drive home points that struggle to find a syntax that is universally understandable. Which makes Atrangi Re&rsquo;s problematic messaging that more worrying. Not the least because it&rsquo;s 2022 and by now these are basics that you&rsquo;d believe elite artists are aware of.</p>\r\n\r\n<p>Even though you can sense that Atrangi Re set out to talk about mental health it falls gloriously short in the most crucial department of compassion that no music, acting or cinematography can compensate for.</p>\r\n\r\n<p>In a scene from the film, Madhusudhan groups OCD, Schizophrenia, Bipolar, and Alzheimer&rsquo;s patients into one and claims that they can all see Sajjad, the imaginary character created by Rinku. It prompts you to believe that there&rsquo;s really no diff',1,'2022-03-26 05:44:11','2022-03-26 05:44:11','poster_1648273451poster_1643947951oov_blog_1.jpg'),(2,1,'Film for India’s Women','film-for-indias-women','thumb_1648292001poster_1643950680oov_blog_4.jpg','<p>Mirch Masala tells the story of a feisty village belle who becomes an object of lust for the new tax collector. Smita Patil&rsquo;s Sonbai continues to inspire generations of women even today as she asserts complete sexual autonomy and agency over her own body.</p>\r\n\r\n<p>An unapologetic, gutsy woman, a drunk-on-power man, a rustic Gujarati village of colonial India seeped in patriarchy and&nbsp;sexism, and mounds of red chillies and chilli powder as far as the eye can see. This is&nbsp;<em>Mirch Masala</em>&nbsp;(1987), a cinematic masterpiece and one of Bollywood&rsquo;s most powerful and poignant women-centric films.</p>\r\n\r\n<p>The divide between commercial and arthouse was never as stark in Bollywood as it was in the 1980s. While mainstream Bollywood was churning out typical &ldquo;masala&rdquo; films with song-and-dance sequences, hero saving the heroine, villain throwing money at all problems and getting people killed, etc, its arthouse counterpart dedicated itself to working on subjects that were thought-provoking, and this resulted in a host of films that were subtle but strong commentaries on society and its treatment of women, both in urban and rural settings. In this trend,&nbsp;<em>Mirch Masala</em>&nbsp;sets itself apart by prompting a discussion on one very important topic &ndash;&nbsp;consent. And this is exactly what makes the film relevant even today, and perhaps forever.</p>\r\n\r\n<p>Directed by Ketan Mehta and widely categorised as a &ldquo;thriller&rdquo;,&nbsp;<em>Mirch Masala</em>&nbsp;is based on Gujarati writer Chunilal Madia&rsquo;s short story &ldquo;Abhu Makrani&rdquo;. Set in a remote Kutch village, during the early 1940s, the film tells the story of Sonbai (Smita Patil), a feisty village belle who becomes an object of lust for the new tax collector, known simply as subedar saheb/sarkaar (Naseerudin Shah). Like every woman in the village, Sonbai works at the local chilli factory. A tyrannical and egomaniac subedar is used to getting what he wants but when Sonbai staunchly refuses and even slaps him in the process, what was simply a wish to bed her becomes an ego war that culminates in a ruined karkhaana and murder of its idealistic gatekeeper Abu Mian (Om Puri). After the men fail them, women take matters into their own hands and evil is brought down to its knees, literally and figuratively.</p>\r\n\r\n<p>In&nbsp;<em>Mirch Masala</em>, there&rsquo;s a revolution taking place on two levels. One is a larger fight for swaraj. The local schoolmaster (Benjamin Gilanj), mockingly introduced to subedar by villagers as khadiwadi (Gandhian), represents a&nbsp;colonial India&nbsp;trying to free itself from the British Raj. On a smaller level, the women of the village are revolting against the abject patriarchy in their own way. Saraswati (Deepti Naval), wife of the village head, mukhi (Suresh Oberoi), takes her daughter to school without worrying about consequences and is prominent in organising a protest march when men of the village decide to &ldquo;handover&rdquo; Sonbai to subedar. Radha (Supriya Pathak) dares to love above her class and caste. She refuses to give up despite being humiliated and brutally beaten up. Lakhi (Ratna Pathak Shah) has no qualms about sleeping with subedar for gifts and money. All in all, in the face of rampant sexism and male dominance, the women are making their own rules and trying to keep their identity in whatever way possible. It is certainly not easy. In the process, they&rsquo;re either being insulted and brutalised by the men or ostracised by everyone. However, it is the spirit to revolt against wrong which ultimately brings all the women together in an epiphanic moment and they fight together to protect one of their own.</p>\r\n\r\n<p><em>Mirch Masala</em>&nbsp;sets itself apart by prompting a discussion on one very important topic &ndash; consent.</p>\r\n\r\n<p>In this revolution, however, Sonbai emerges as perhaps the most influential and prominent force because she asserts something no other woman has been able to so far &ndash; complete sexual autonomy and agency over her own body. For Sonbai, it is never a question of morality, but consent. When taunted by mukhi that if her husband were around, they would&rsquo;ve convinced him too, she retorts that she would&rsquo;ve said no even if her husband had wanted her to be with the subedar, thereby making it clear that there&rsquo;s nothing but her own will stopping her.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>',1,'2022-03-26 10:37:36','2022-03-26 10:57:13','poster_1648292001poster_1643950680oov_blog_4.jpg');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buttons`
--

DROP TABLE IF EXISTS `buttons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buttons` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rightclick` tinyint(1) NOT NULL DEFAULT '1',
  `inspect` tinyint(1) DEFAULT NULL,
  `goto` tinyint(1) NOT NULL DEFAULT '1',
  `color` tinyint(1) NOT NULL DEFAULT '1',
  `uc_browser` tinyint(1) NOT NULL DEFAULT '1',
  `comming_soon` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commingsoon_enabled_ip` longtext COLLATE utf8mb4_unicode_ci,
  `ip_block` tinyint(1) NOT NULL DEFAULT '1',
  `block_ips` longtext COLLATE utf8mb4_unicode_ci,
  `maintenance` tinyint(1) NOT NULL DEFAULT '1',
  `comming_soon_text` longtext COLLATE utf8mb4_unicode_ci,
  `remove_subscription` tinyint(1) NOT NULL DEFAULT '0',
  `protip` tinyint(1) NOT NULL DEFAULT '1',
  `multiplescreen` tinyint(1) NOT NULL DEFAULT '0',
  `two_factor` tinyint(1) NOT NULL DEFAULT '0',
  `countviews` tinyint(1) NOT NULL DEFAULT '0',
  `remove_ads` tinyint(1) NOT NULL DEFAULT '0',
  `is_toprated` tinyint(1) NOT NULL DEFAULT '0',
  `toprated_count` text COLLATE utf8mb4_unicode_ci,
  `remove_thumbnail` tinyint(1) NOT NULL DEFAULT '0',
  `reminder_mail` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buttons`
--

LOCK TABLES `buttons` WRITE;
/*!40000 ALTER TABLE `buttons` DISABLE KEYS */;
INSERT INTO `buttons` VALUES (1,1,1,1,0,1,0,'2022-03-24 02:30:55','2022-03-31 04:41:23',NULL,0,NULL,1,NULL,1,0,0,0,0,0,1,'10',0,0);
/*!40000 ALTER TABLE `buttons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_settings`
--

DROP TABLE IF EXISTS `chat_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_messanger` tinyint(1) NOT NULL DEFAULT '0',
  `script` longtext COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int DEFAULT NULL,
  `enable_whatsapp` tinyint(1) NOT NULL DEFAULT '0',
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'right',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_settings`
--

LOCK TABLES `chat_settings` WRITE;
/*!40000 ALTER TABLE `chat_settings` DISABLE KEYS */;
INSERT INTO `chat_settings` VALUES (1,'messanger',0,NULL,NULL,NULL,NULL,'#52D668',30,0,'right','2022-03-24 02:30:55','2022-03-24 02:30:55'),(2,'whatsapp',0,NULL,'9999999999','Hey! We can help you?','Chat with us','#4fd896',30,0,'right','2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `chat_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color_schemes`
--

DROP TABLE IF EXISTS `color_schemes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color_schemes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `color_scheme` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_navigation_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_navigation_color` text COLLATE utf8mb4_unicode_ci,
  `default_text_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_text_color` text COLLATE utf8mb4_unicode_ci,
  `default_text_on_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_text_on_color` text COLLATE utf8mb4_unicode_ci,
  `default_back_to_top_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_back_to_top_color` text COLLATE utf8mb4_unicode_ci,
  `default_back_to_top_bgcolor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_back_to_top_bgcolor` text COLLATE utf8mb4_unicode_ci,
  `default_back_to_top_bgcolor_on_hover` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_back_to_top_bgcolor_on_hover` text COLLATE utf8mb4_unicode_ci,
  `default_back_to_top_color_on_hover` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_back_to_top_color_on_hover` text COLLATE utf8mb4_unicode_ci,
  `default_footer_background_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_footer_background_color` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color_schemes`
--

LOCK TABLES `color_schemes` WRITE;
/*!40000 ALTER TABLE `color_schemes` DISABLE KEYS */;
INSERT INTO `color_schemes` VALUES (1,'dark','#111111FA',NULL,'#48A3C6','#3b52e6','#90DFFE','#4a62ff','#111','#3b52e6','#FFF','#3b52e6','#48A3C6','#3b52e6','#FFF','#3b52e6','#111','#0c111b','2022-03-24 02:30:55','2022-03-24 06:47:50');
/*!40000 ALTER TABLE `color_schemes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int NOT NULL,
  `comment` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livetvicon` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_email` int NOT NULL,
  `download` int DEFAULT '0',
  `free_sub` int NOT NULL DEFAULT '0',
  `free_days` int DEFAULT NULL,
  `stripe_pub_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_mar_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_add` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prime_main_slider` tinyint(1) NOT NULL DEFAULT '1',
  `catlog` tinyint(1) NOT NULL,
  `withlogin` tinyint(1) NOT NULL,
  `prime_genre_slider` tinyint(1) NOT NULL DEFAULT '1',
  `donation` tinyint(1) DEFAULT NULL,
  `donation_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prime_footer` tinyint(1) NOT NULL DEFAULT '1',
  `prime_movie_single` tinyint(1) NOT NULL DEFAULT '1',
  `terms_condition` text COLLATE utf8mb4_unicode_ci,
  `privacy_pol` text COLLATE utf8mb4_unicode_ci,
  `refund_pol` text COLLATE utf8mb4_unicode_ci,
  `copyright` text COLLATE utf8mb4_unicode_ci,
  `stripe_payment` tinyint(1) NOT NULL DEFAULT '1',
  `paypal_payment` tinyint(1) NOT NULL DEFAULT '1',
  `razorpay_payment` tinyint(1) NOT NULL DEFAULT '1',
  `age_restriction` tinyint(1) DEFAULT '0',
  `payu_payment` tinyint(1) NOT NULL DEFAULT '1',
  `bankdetails` tinyint(1) NOT NULL,
  `account_no` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytm_payment` int unsigned DEFAULT '0',
  `paytm_test` tinyint(1) DEFAULT NULL,
  `preloader` tinyint(1) NOT NULL DEFAULT '1',
  `fb_login` tinyint(1) NOT NULL,
  `gitlab_login` tinyint(1) NOT NULL,
  `google_login` tinyint(1) NOT NULL,
  `wel_eml` tinyint(1) DEFAULT NULL,
  `blog` tinyint(1) NOT NULL DEFAULT '0',
  `is_playstore` tinyint(1) NOT NULL DEFAULT '0',
  `is_appstore` tinyint(1) NOT NULL DEFAULT '0',
  `playstore` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appstore` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_rating` tinyint(1) NOT NULL DEFAULT '0',
  `comments` tinyint(1) NOT NULL DEFAULT '0',
  `braintree` tinyint(1) NOT NULL DEFAULT '0',
  `paystack` tinyint(1) NOT NULL DEFAULT '0',
  `remove_landing_page` tinyint(1) NOT NULL DEFAULT '0',
  `coinpay` tinyint(1) NOT NULL DEFAULT '0',
  `captcha` tinyint(1) NOT NULL DEFAULT '0',
  `amazon_login` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mollie_payment` tinyint(1) NOT NULL DEFAULT '0',
  `cashfree_payment` tinyint(1) NOT NULL DEFAULT '0',
  `aws` tinyint(1) NOT NULL DEFAULT '0',
  `omise_payment` tinyint(1) NOT NULL DEFAULT '0',
  `flutterrave_payment` tinyint(1) NOT NULL DEFAULT '0',
  `instamojo_payment` tinyint(1) NOT NULL DEFAULT '0',
  `comments_approval` tinyint(1) NOT NULL DEFAULT '1',
  `payhere_payment` tinyint(1) NOT NULL DEFAULT '0',
  `preloader_img` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` VALUES (1,'OOV Logo-White-Small.png','favicon-1.png','livetvicon_1643461510oov-live.png','{\"en\":\"OOV Media\",\"Spanish\":\"Nexthour\",\"spanish\":\"Nexthour\",\"FR\":\"Nexthour\",\"EN\":\"Nexthour\"}','info.oovmedia@gmail.com',0,0,0,30,'','','','INR','fa fa-inr','{\"en\":null}',0,1,1,1,0,NULL,1,1,'{\"en\":\"<p><strong>Lorem Ipsum<\\/strong>\\u00a0is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"nl\":\"<p>newvious&nbsp;goodesioanos<\\/p>\"}','{\"en\":\"<p><strong>Lorem Ipsum<\\/strong>\\u00a0is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\"}','{\"en\":\"<p><strong>Lorem Ipsum<\\/strong>\\u00a0is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\"}','{\"en\":\"<p>OOV Media | All Rights Reserved.<\\/p>\"}',0,0,1,1,0,0,NULL,NULL,NULL,NULL,NULL,0,0,1,0,0,0,0,1,1,1,'https://www.youtube.com/upload','https://www.youtube.com/upload',1,0,0,0,0,0,0,0,'2022-03-24 02:30:55','2022-04-15 15:31:42',0,0,0,0,0,0,1,0,'OOV Logo-White-Small.png');
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_applies`
--

DROP TABLE IF EXISTS `coupon_applies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_applies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `coupon_id` int NOT NULL,
  `redeem` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_applies`
--

LOCK TABLES `coupon_applies` WRITE;
/*!40000 ALTER TABLE `coupon_applies` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon_applies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_codes`
--

DROP TABLE IF EXISTS `coupon_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_codes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_off` double(8,2) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_off` double(8,2) DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'once',
  `max_redemptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redeem_by` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `in_stripe` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_codes`
--

LOCK TABLES `coupon_codes` WRITE;
/*!40000 ALTER TABLE `coupon_codes` DISABLE KEYS */;
INSERT INTO `coupon_codes` VALUES (1,'OOV100',50.00,'INR',NULL,'once','1','2022-12-31 00:00:00','2022-05-04 04:35:09','2022-05-04 04:35:09',0);
/*!40000 ALTER TABLE `coupon_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_callback_addresses`
--

DROP TABLE IF EXISTS `cp_callback_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_callback_addresses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pubkey` text COLLATE utf8mb4_unicode_ci,
  `ipn_url` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_tag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_callback_addresses_address_currency_unique` (`address`,`currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_callback_addresses`
--

LOCK TABLES `cp_callback_addresses` WRITE;
/*!40000 ALTER TABLE `cp_callback_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_callback_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_conversions`
--

DROP TABLE IF EXISTS `cp_conversions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_conversions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `amount` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_tag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_conversions_ref_id_unique` (`ref_id`),
  KEY `cp_conversions_from_index` (`from`),
  KEY `cp_conversions_to_index` (`to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_conversions`
--

LOCK TABLES `cp_conversions` WRITE;
/*!40000 ALTER TABLE `cp_conversions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_conversions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_deposits`
--

DROP TABLE IF EXISTS `cp_deposits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_deposits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `status_text` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirms` tinyint unsigned NOT NULL,
  `amount` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amounti` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feei` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_tag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_deposits_txn_id_unique` (`txn_id`),
  KEY `cp_deposits_address_index` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_deposits`
--

LOCK TABLES `cp_deposits` WRITE;
/*!40000 ALTER TABLE `cp_deposits` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_deposits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_ipns`
--

DROP TABLE IF EXISTS `cp_ipns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_ipns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ipn_version` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipn_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipn_mode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipn_type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `status_text` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency1` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency2` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirms` tinyint unsigned DEFAULT NULL,
  `amount` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amounti` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount1` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount2` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feei` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_tag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_name` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_number` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom` text COLLATE utf8mb4_unicode_ci,
  `send_tx` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_amount` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_confirms` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_ipns_ipn_id_unique` (`ipn_id`),
  KEY `cp_ipns_address_index` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_ipns`
--

LOCK TABLES `cp_ipns` WRITE;
/*!40000 ALTER TABLE `cp_ipns` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_ipns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_log`
--

DROP TABLE IF EXISTS `cp_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_log`
--

LOCK TABLES `cp_log` WRITE;
/*!40000 ALTER TABLE `cp_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_mass_withdrawals`
--

DROP TABLE IF EXISTS `cp_mass_withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_mass_withdrawals` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_mass_withdrawals`
--

LOCK TABLES `cp_mass_withdrawals` WRITE;
/*!40000 ALTER TABLE `cp_mass_withdrawals` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_mass_withdrawals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_transactions`
--

DROP TABLE IF EXISTS `cp_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `amount1` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount2` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency2` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_tag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_name` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_number` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom` text COLLATE utf8mb4_unicode_ci,
  `ipn_url` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirms_needed` tinyint unsigned NOT NULL,
  `timeout` int unsigned NOT NULL,
  `status_url` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qrcode_url` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `status_text` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_confirms` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_amount` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_transactions_txn_id_unique` (`txn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_transactions`
--

LOCK TABLES `cp_transactions` WRITE;
/*!40000 ALTER TABLE `cp_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_transfers`
--

DROP TABLE IF EXISTS `cp_transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_transfers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `amount` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pbntag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_confirm` tinyint(1) NOT NULL DEFAULT '0',
  `ref_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_transfers_ref_id_unique` (`ref_id`),
  KEY `cp_transfers_status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_transfers`
--

LOCK TABLES `cp_transfers` WRITE;
/*!40000 ALTER TABLE `cp_transfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_transfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_withdrawals`
--

DROP TABLE IF EXISTS `cp_withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_withdrawals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mass_withdrawal_id` int unsigned DEFAULT NULL,
  `amount` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount2` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amounti` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pbntag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_tag` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipn_url` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_confirm` tinyint(1) NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `ref_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `status_text` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `txn_id` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cp_withdrawals_ref_id_unique` (`ref_id`),
  UNIQUE KEY `cp_withdrawals_txn_id_unique` (`txn_id`),
  KEY `cp_withdrawals_mass_withdrawal_id_index` (`mass_withdrawal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_withdrawals`
--

LOCK TABLES `cp_withdrawals` WRITE;
/*!40000 ALTER TABLE `cp_withdrawals` DISABLE KEYS */;
/*!40000 ALTER TABLE `cp_withdrawals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cps_cpp`
--

DROP TABLE IF EXISTS `cps_cpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cps_cpp` (
  `userid` int NOT NULL,
  `expire` int NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cps_cpp`
--

LOCK TABLES `cps_cpp` WRITE;
/*!40000 ALTER TABLE `cps_cpp` DISABLE KEYS */;
/*!40000 ALTER TABLE `cps_cpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currencies_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'Indian Rupee','INR','₹','1,0.00₹','75.298292','[\"flutterrave\",\"instamojo\",\"paytm\",\"mollie\",\"cashfree\",\"razorpay\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(2,'US Dollar','USD','$','$1,0.00','1','[\"stripe\",\"paypal\",\"braintree\",\"omise\",\"payhere\",\"flutterrave\",\"mollie\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(3,'Euro','EUR','€','1.0,00 €','0.863677','[\"stripe\",\"paypal\",\"braintree\",\"omise\",\"payhere\",\"flutterrave\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(4,'Sri Lanka Rupee','LKR','₨','₨ 1,0.','202.450844','[\"payhere\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(5,'UAE Dirham','AED','دإ‏','دإ‏ 1,0.00','3.6731','[\"mollie\",\"cashfree\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(6,'Nigeria, Naira','NGN','₦','₦1,0.00','411.92','[\"stripe\",\"flutterrave\",\"paystack\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(7,'Angola, Kwanza','AOA','Kz','Kz1,0.00','597.698','[\"stripe\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(8,'Tunisian Dinar','TND','د.ت.‏','د.ت.‏ 1,0.000','2.8235','[\"stripe\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55'),(9,'Kenyan Shilling','KES','S','S1,0.00','110.9','[\"stripe\"]',0,'2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_pages`
--

DROP TABLE IF EXISTS `custom_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_show_menu` tinyint(1) DEFAULT NULL,
  `detail` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_pages`
--

LOCK TABLES `custom_pages` WRITE;
/*!40000 ALTER TABLE `custom_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `DOB` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES (1,'{\"en\":\"Quentin Tarantino\"}','director_1648120764quentin-tarantino.jpg','{\"en\":\"Popular film director, screenwriter, and producer, Quentin Tarantino, first rose to fame as an independent filmmaker in the early 1990s. His films are known for their nonlinear story-lines and neo-noir elements and have garnered both critical and commercial success. He is the winner of two Academy Awards and has been called \\\"the single most influential director of his generation.\\\"\"}','Knoxville, Tennessee, United States','1963-03-27','2022-03-24 11:19:24','2022-03-24 11:20:34',NULL);
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donater_lists`
--

DROP TABLE IF EXISTS `donater_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donater_lists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donor_msg` text COLLATE utf8mb4_unicode_ci,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donater_lists`
--

LOCK TABLES `donater_lists` WRITE;
/*!40000 ALTER TABLE `donater_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `donater_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `episodes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `seasons_id` int unsigned NOT NULL,
  `tmdb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episode_no` int DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `a_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` tinyint(1) DEFAULT NULL,
  `released` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'E',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `episodes_seasons_id_foreign` (`seasons_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `episodes`
--

LOCK TABLES `episodes` WRITE;
/*!40000 ALTER TABLE `episodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `episodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `front_slider_updates`
--

DROP TABLE IF EXISTS `front_slider_updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `front_slider_updates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `item_show` int unsigned DEFAULT NULL,
  `orderby` int DEFAULT '1',
  `sliderview` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `front_slider_updates`
--

LOCK TABLES `front_slider_updates` WRITE;
/*!40000 ALTER TABLE `front_slider_updates` DISABLE KEYS */;
/*!40000 ALTER TABLE `front_slider_updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'{\"en\":\"Hindi Movie\"}','genre_1648120373wallpaper2you_82103 - Copy.jpg',1,'2022-03-24 11:05:07','2022-03-24 11:12:53'),(2,'{\"en\":\"English Movie\"}','genre_1648120422iron-1642756343996-7429 - Copy.jpg',2,'2022-03-24 11:13:42','2022-03-24 11:13:42'),(3,'{\"en\":\"Hindi News\"}','genre_1648120452icon Hindi_Khabar.png',3,'2022-03-24 11:14:12','2022-03-24 11:14:12'),(4,'{\"en\":\"English News\"}','genre_1648120493icon news.jpg',4,'2022-03-24 11:14:53','2022-03-24 11:14:53'),(5,'{\"en\":\"Business News\"}','genre_1648120512icon.png',5,'2022-03-24 11:15:12','2022-03-24 11:15:12'),(6,'{\"en\":\"World News\"}','genre_1648120528icon English News.png',6,'2022-03-24 11:15:28','2022-03-24 11:15:28');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `google_ads`
--

DROP TABLE IF EXISTS `google_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `google_ads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `google_ad_client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_ad_slot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_ad_width` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_ad_height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_ad_starttime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_ad_endtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `google_ads`
--

LOCK TABLES `google_ads` WRITE;
/*!40000 ALTER TABLE `google_ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `google_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hide_for_me`
--

DROP TABLE IF EXISTS `hide_for_me`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hide_for_me` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `movie_id` int DEFAULT NULL,
  `season_id` int DEFAULT NULL,
  `profile` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hide_for_me`
--

LOCK TABLES `hide_for_me` WRITE;
/*!40000 ALTER TABLE `hide_for_me` DISABLE KEYS */;
INSERT INTO `hide_for_me` VALUES (1,5,13,NULL,'[\"S1\"]','M','2022-04-02 12:01:00','2022-04-02 12:01:00'),(2,10,18,NULL,'[\"S1\"]','M','2022-04-04 17:50:15','2022-04-04 17:50:15');
/*!40000 ALTER TABLE `hide_for_me` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_blocks`
--

DROP TABLE IF EXISTS `home_blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_blocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int DEFAULT NULL,
  `tv_series_id` int DEFAULT NULL,
  `is_active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_blocks`
--

LOCK TABLES `home_blocks` WRITE;
/*!40000 ALTER TABLE `home_blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_sliders`
--

DROP TABLE IF EXISTS `home_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int unsigned DEFAULT NULL,
  `tv_series_id` int unsigned DEFAULT NULL,
  `slide_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `position` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_sliders_movie_id_foreign` (`movie_id`),
  KEY `home_sliders_tv_series_id_foreign` (`tv_series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_sliders`
--

LOCK TABLES `home_sliders` WRITE;
/*!40000 ALTER TABLE `home_sliders` DISABLE KEYS */;
INSERT INTO `home_sliders` VALUES (3,NULL,NULL,'slide_1648104661banner-0.jpg',1,1,'2022-03-24 06:51:01','2022-03-24 06:51:01'),(4,NULL,NULL,'slide_1648104694banner-1.jpg',1,2,'2022-03-24 06:51:35','2022-03-24 06:51:35');
/*!40000 ALTER TABLE `home_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_translations`
--

DROP TABLE IF EXISTS `home_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_translations`
--

LOCK TABLES `home_translations` WRITE;
/*!40000 ALTER TABLE `home_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(1) NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"uuid\":\"9d32cff7-c9ec-46bb-a26a-1c0c0a77212c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"08a51271-bf40-4b6b-88c4-459148aab070\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648089240,'0000-00-00 00:00:00'),(2,'default','{\"uuid\":\"8d14f5e0-119c-4695-9838-e02fb8ae93e0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"18dff513-a561-4327-accc-b3f6306c39bc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648094738,'0000-00-00 00:00:00'),(3,'default','{\"uuid\":\"7e1dfb5d-5d9e-4582-97ae-7b85ee097a9b\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"0118dfa8-e72f-45ce-ab29-bc5479de2bf4\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648289144,'0000-00-00 00:00:00'),(4,'default','{\"uuid\":\"a8c735f6-005d-43b2-bcb7-f10b34699e9e\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"f29a38bc-ddb1-4bf0-8ef8-355ea7f80939\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648458674,'0000-00-00 00:00:00'),(5,'default','{\"uuid\":\"2a5e26a1-961e-4388-91ab-095a23187818\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"b35683c4-707e-491c-a0d2-f690d439871a\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648463517,'0000-00-00 00:00:00'),(6,'default','{\"uuid\":\"f611ccce-130d-426d-af28-18ed331e520e\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"14774f38-ad04-44ca-885f-7662e2063abf\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648482331,'0000-00-00 00:00:00'),(7,'default','{\"uuid\":\"7159bb30-1b5a-477c-8e81-c7a139d165d0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"67af4fed-d5d6-4d56-a036-1daf880ff503\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648527452,'0000-00-00 00:00:00'),(8,'default','{\"uuid\":\"bd159922-c98a-4a9d-a5ce-45cf7b66355c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:23;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"3a01c641-c829-4ba5-8ff7-2c499e8c5c20\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648550677,'0000-00-00 00:00:00'),(9,'default','{\"uuid\":\"024848ac-d3e1-40d9-81a0-ef775a68944a\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:27;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"e3b98865-4445-4f53-9b7d-9a29adab552b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648563768,'0000-00-00 00:00:00'),(10,'default','{\"uuid\":\"db603a6c-5a0b-409f-9153-41ccb58c6417\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:30;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"41b5cda2-3e03-456a-8897-0b909dc9ad2c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648648000,'0000-00-00 00:00:00'),(11,'default','{\"uuid\":\"ebbf1797-505a-43c7-927e-3bbe95774033\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"048954d0-4ad6-4274-bda4-4f270b087ce3\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648648358,'0000-00-00 00:00:00'),(12,'default','{\"uuid\":\"056f7fb0-6040-4888-b182-a9f90e929d84\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:36;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"981b3a4b-e282-4953-a133-40676ec5ee05\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648701216,'0000-00-00 00:00:00'),(13,'default','{\"uuid\":\"24862df7-0443-4d0f-a55c-14621cc178cc\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"4eeedf26-e287-44c9-b050-43c72ece0d16\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648701790,'0000-00-00 00:00:00'),(14,'default','{\"uuid\":\"ec6ccc8b-d1e8-4a1b-bde4-c6bd94c0b635\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:40;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"94ef0e53-5ed8-45f3-a049-bd02bf79f66c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648702149,'0000-00-00 00:00:00'),(15,'default','{\"uuid\":\"8f0668e8-0c56-4685-a21b-f05eaa9ab7d5\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"88654e75-4710-4104-abff-36ee19ad5eb0\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648709118,'0000-00-00 00:00:00'),(16,'default','{\"uuid\":\"a05d93ad-1cae-40ed-9769-88e9a37ae856\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:42;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"6e4be588-6b56-4cc8-a768-72786f8effba\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648709439,'0000-00-00 00:00:00'),(17,'default','{\"uuid\":\"cc0265ad-4234-46c0-bc7d-d775e2ef897b\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:43;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"6995ba99-4cf7-4050-a987-221754db8232\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648709454,'0000-00-00 00:00:00'),(18,'default','{\"uuid\":\"242f5e3d-f6fd-4fdd-9b29-630d646799f9\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:48;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"68b2cef1-c7d3-4c24-a5a3-02fca08485ef\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648717463,'0000-00-00 00:00:00'),(19,'default','{\"uuid\":\"ad1d500b-c1d3-4ed2-ab30-131c37c22812\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:50;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"75cdd0a9-0bde-48f5-808f-e25672e75fd1\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648720266,'0000-00-00 00:00:00'),(20,'default','{\"uuid\":\"4656cdbc-7058-47d3-8027-d94c251b595b\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:8;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:51;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"eebc28da-ee4d-4385-9d50-cf06d4d0d239\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648720646,'0000-00-00 00:00:00'),(21,'default','{\"uuid\":\"81c3a322-7df8-4a0e-865b-c77263c12f45\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:58;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"3b15c4c6-5240-453b-9a6d-559c97e45818\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648742934,'0000-00-00 00:00:00'),(22,'default','{\"uuid\":\"07bdf95d-3acd-4a98-a2a8-23fd1cc991b0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:59;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"39489cc0-86b2-43be-9857-4692d4b02ed0\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648745023,'0000-00-00 00:00:00'),(23,'default','{\"uuid\":\"70074ba5-72cd-42d5-b9d9-b79e07f6877c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:65;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"a4ddb4eb-91f9-4c6e-b2b3-c8f88dd0724c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648797112,'0000-00-00 00:00:00'),(24,'default','{\"uuid\":\"13c9bd45-4c5c-41e3-8e52-a2371af37fcd\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:67;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ca987a13-ddff-4ca5-9859-7459daf8b83d\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648806072,'0000-00-00 00:00:00'),(25,'default','{\"uuid\":\"b5cd082c-2c96-4b0e-9b51-c91806afb26d\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:68;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"e061579d-5649-42bb-a5d1-59760c96c919\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648806270,'0000-00-00 00:00:00'),(26,'default','{\"uuid\":\"95db6020-1f08-4b94-a6f8-6124c8115f27\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:76;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"0eb013c9-199f-43de-b9c3-c29895fea6bd\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648852958,'0000-00-00 00:00:00'),(27,'default','{\"uuid\":\"53f3da09-268f-4aee-9d92-1bb98791edaf\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:80;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"eb18e6ae-c5ac-4055-9b67-d67b3b9ffff6\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648891618,'0000-00-00 00:00:00'),(28,'default','{\"uuid\":\"8a3f6984-3189-4d84-844d-46164c5ec5e6\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:82;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"b5012f1e-990f-45d0-b231-0137a637897a\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648892446,'0000-00-00 00:00:00'),(29,'default','{\"uuid\":\"98f1019a-7c05-4836-9f22-ceb095ec22cd\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:9;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:86;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5ec0d144-80ea-45b8-87b9-54c16fe97086\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1648913848,'0000-00-00 00:00:00'),(30,'default','{\"uuid\":\"4c7c1260-7871-4da4-8a34-bbac9eb0f978\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:91;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"8db5773b-db4c-43c8-9fbb-dad9a4df2912\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649059665,'0000-00-00 00:00:00'),(31,'default','{\"uuid\":\"ccb29274-282f-4f1f-aabc-f3a2d2c67ff8\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:10;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:93;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"b0011bc1-9865-493d-8168-a880a1edeb52\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649093470,'0000-00-00 00:00:00'),(32,'default','{\"uuid\":\"a5139dea-5796-441c-a741-d3992a8b3133\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:11;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:95;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"09164f6b-aebd-426b-af87-ac9186941a8f\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649137360,'0000-00-00 00:00:00'),(33,'default','{\"uuid\":\"a4c508db-e4b9-4954-83bc-0ef042205648\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:97;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"f6d952bd-90c8-4d06-a187-592e8144bc2d\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649248623,'0000-00-00 00:00:00'),(34,'default','{\"uuid\":\"df10938c-a9cb-4174-a7cc-418e4ba39e14\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:98;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"bf277bf5-1d7e-4e45-835d-ace75018ffba\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649262676,'0000-00-00 00:00:00'),(35,'default','{\"uuid\":\"23df9496-6ada-46c2-8f99-68945a4e1e86\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:99;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ccd68b72-84f1-47cf-a206-2e7a0717fd2d\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649310557,'0000-00-00 00:00:00'),(36,'default','{\"uuid\":\"72b5fbe8-62a8-4720-897d-161ea5072816\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:12;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:101;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"272ae04a-6a1f-40cb-ad5b-f386d6c4a0f7\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649314873,'0000-00-00 00:00:00'),(37,'default','{\"uuid\":\"aaaf7ae1-4dff-4db3-83e8-069d1d37e374\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:102;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"c31bda90-ef65-4341-bb71-104985af888d\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649317260,'0000-00-00 00:00:00'),(38,'default','{\"uuid\":\"a437bff4-683d-478f-8c9a-d370bb2e4657\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:13;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:103;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"9b3c615e-474e-4a2b-9a45-24b7dbc2d214\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649317723,'0000-00-00 00:00:00'),(39,'default','{\"uuid\":\"8746c229-2591-462c-be4c-d9820043da2d\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:14;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:104;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"11d4299e-8926-41f0-99c9-38e9a8f2a771\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649319341,'0000-00-00 00:00:00'),(40,'default','{\"uuid\":\"ff8a0c5f-244b-401e-a3a5-11e17b79a03f\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:14;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:110;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"42213e3e-d426-462e-8a20-2efc5aec6c42\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649681529,'0000-00-00 00:00:00'),(41,'default','{\"uuid\":\"c32b5c5f-f2b3-463c-8f5a-f65a061979c4\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:14;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:112;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"9ce0e3d2-425d-473d-a0c0-ae7135ba54cc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649683053,'0000-00-00 00:00:00'),(42,'default','{\"uuid\":\"692f92c4-f8f8-438e-95b4-0953a1314b0c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:113;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"03b57528-5c6e-4ad3-bdfc-0bccb2511ed7\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649683122,'0000-00-00 00:00:00'),(43,'default','{\"uuid\":\"31604951-2ff0-4375-9e7b-5ece725590e2\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:114;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7164940b-7756-4917-a98d-e76298c9eb60\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649683239,'0000-00-00 00:00:00'),(44,'default','{\"uuid\":\"c9fad33f-9527-4eed-8fa2-5dc557399165\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:115;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"236da973-6173-4447-9479-dc2d533ae12c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649683300,'0000-00-00 00:00:00'),(45,'default','{\"uuid\":\"1c4e08c0-78fc-4cb2-b42b-56cec7157c1b\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:119;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"2c3ff777-2ff3-4246-bdd7-cae045bb3fba\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649683565,'0000-00-00 00:00:00'),(46,'default','{\"uuid\":\"d6e9e2fd-018a-4408-ba52-2858ac7efd6c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:15;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:120;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ff53a660-d96c-4b15-b565-80a932d1864f\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649683595,'0000-00-00 00:00:00'),(47,'default','{\"uuid\":\"9e6242d6-60e3-4f7b-a8af-125a853f193a\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:15;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:124;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"934207a3-e586-4028-a9ce-7abfad76dc89\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649782196,'0000-00-00 00:00:00'),(48,'default','{\"uuid\":\"dc2c6633-39d7-4aac-92d1-0648d5bb18a5\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:125;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"95e15ea0-fbf5-4620-8dbb-8efe133ee810\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649836573,'0000-00-00 00:00:00'),(49,'default','{\"uuid\":\"d15274aa-278a-46a4-b873-d0051b21c9f5\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:16;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:126;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"76148c22-cbb3-4236-b374-9241a203ef47\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649836701,'0000-00-00 00:00:00'),(50,'default','{\"uuid\":\"7745b071-cf3e-4dd9-b6bf-b80b8950ea1a\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:128;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"d4231164-a2fe-4689-b8cb-eaf7d4da87c7\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1649942912,'0000-00-00 00:00:00'),(51,'default','{\"uuid\":\"8d084173-ed15-4505-8507-365abb04a03c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:14;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:131;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"25f0e63f-7408-4213-8fc9-61d5feb635d9\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650017775,'0000-00-00 00:00:00'),(52,'default','{\"uuid\":\"1380249a-174c-4456-bf96-e5f139d6cd9a\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:132;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5df29989-faba-456b-8bce-b3c94bd15301\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650036676,'0000-00-00 00:00:00'),(53,'default','{\"uuid\":\"585cb702-4746-46b3-a414-2ebd44cba040\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:134;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"fced25a8-31e5-40d3-8ea8-fc752e2668f6\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650045820,'0000-00-00 00:00:00'),(54,'default','{\"uuid\":\"924b14a8-a2d5-423f-be41-4f39db804ea7\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:15;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:135;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"f6d1f428-bd2d-4c1b-a1f2-49c9ca4c0418\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650045943,'0000-00-00 00:00:00'),(55,'default','{\"uuid\":\"8939fd19-33cf-4dab-8a48-81abdf632a32\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:136;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"74a14dd2-7699-4294-adca-04e5d6d5dfa8\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650516012,'0000-00-00 00:00:00'),(56,'default','{\"uuid\":\"3c7e7e57-4469-4f77-a27d-d76c822f9f11\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:137;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7de9f9f1-b930-412c-bb5e-b379a637e060\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650551157,'0000-00-00 00:00:00'),(57,'default','{\"uuid\":\"8cf4156a-7eba-4ac8-b65d-415bb2bfe704\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:18;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:138;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"1d46dc0a-6147-44c6-8a5e-6b242da4e607\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650551178,'0000-00-00 00:00:00'),(58,'default','{\"uuid\":\"f7ffac30-aa61-4631-bc6d-993e22fede81\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:139;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"b302f67e-eb81-4377-bcf5-f65e557512cc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650551648,'0000-00-00 00:00:00'),(59,'default','{\"uuid\":\"d0ee5ac6-e765-4adf-882f-987f172a2a2c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:140;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"911915f3-1078-43b8-92a8-2e0ce1491db2\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650627558,'0000-00-00 00:00:00'),(60,'default','{\"uuid\":\"504847a6-5f6a-44ac-8a0a-c6def955ae15\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:141;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"c1df8ea3-c05d-4358-9b06-875133630f7a\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650685826,'0000-00-00 00:00:00'),(61,'default','{\"uuid\":\"42071d8b-49f0-453e-ab8d-805bf07436b0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:142;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"3a2f0c34-1799-48b9-bebd-1d6b1604f242\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650688519,'0000-00-00 00:00:00'),(62,'default','{\"uuid\":\"845f9a40-55a8-400c-8264-ee74c78110c0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:143;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ced5d1fc-08b9-4dc4-95ad-5a6d0a1f7273\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650699126,'0000-00-00 00:00:00'),(63,'default','{\"uuid\":\"21dbabae-a60a-45ae-af83-eb443c82615b\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:144;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"25053234-39cd-44a9-ae7d-eb8763a69def\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650856934,'0000-00-00 00:00:00'),(64,'default','{\"uuid\":\"b8592de7-e8d6-41fc-a5eb-0070045dde21\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:145;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"81375e46-1ac1-4f56-bcb4-ef1c5a7944d7\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1650897411,'0000-00-00 00:00:00'),(65,'default','{\"uuid\":\"8dcf8dd5-f9b6-4789-b2b6-bb4962126af9\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:149;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5c12f598-a9d2-4c4c-8ed7-2fae73337158\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651157156,'0000-00-00 00:00:00'),(66,'default','{\"uuid\":\"0cc87a6d-497b-4aaf-8e5d-ff567455e7c9\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:150;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"d27ca8a5-9293-436c-b597-2d8f82142029\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651197147,'0000-00-00 00:00:00'),(67,'default','{\"uuid\":\"1b5a5f5c-d7ad-417e-9079-a856df23c09c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:151;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"6f2e4e7e-0e26-42d0-8191-b14f9d689028\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651205632,'0000-00-00 00:00:00'),(68,'default','{\"uuid\":\"edf36ca5-526a-4deb-beb8-aaed2619f11c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:152;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"01ec95fb-9ead-4b66-a192-07f683007b72\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651219165,'0000-00-00 00:00:00'),(69,'default','{\"uuid\":\"2fc85902-caf7-431f-bf79-6f67bd68a69c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:19;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:153;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"731627c4-2445-4be2-995a-9433c56f7672\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651220789,'0000-00-00 00:00:00'),(70,'default','{\"uuid\":\"1eb6b8b0-18fb-4761-b545-fd8290675f1b\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:19;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:154;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"37b05687-a278-435c-954f-ab99e8b2aedd\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651221633,'0000-00-00 00:00:00'),(71,'default','{\"uuid\":\"7f248120-044c-4ec7-baaf-6248ea5e0e93\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:20;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:155;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"69a27e02-0f5e-470f-8caf-f113c6bf68c4\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651222036,'0000-00-00 00:00:00'),(72,'default','{\"uuid\":\"9fe0dca8-53f4-43b0-8b6a-89ac97804acc\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:156;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"2633a29b-fa52-41f9-b3b6-308b8966c4e1\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651222786,'0000-00-00 00:00:00'),(73,'default','{\"uuid\":\"13a13f15-7700-4d8f-867b-bd8b1fce8bcb\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:21;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:157;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"23db41ce-b84f-4106-9627-a77640624afa\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651223121,'0000-00-00 00:00:00'),(74,'default','{\"uuid\":\"d8ad6920-e747-4137-a85b-1b8b75876505\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:22;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:158;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"6f4441bc-d716-448e-925d-012552f27176\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651331984,'0000-00-00 00:00:00'),(75,'default','{\"uuid\":\"7c69e7cf-4f73-4d85-8970-99912201f4cf\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:23;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:159;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"89577543-4970-4b4a-b5b9-ef1bd981638c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651465813,'0000-00-00 00:00:00'),(76,'default','{\"uuid\":\"c7fad150-f912-4250-96f2-e207277dd16c\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:160;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"de04d3dd-f312-43e1-944b-bf6b2a5ce323\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651469522,'0000-00-00 00:00:00'),(77,'default','{\"uuid\":\"fc950e94-b2ff-47ba-9b0f-1784eb95282a\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:161;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5982c837-3c68-4af4-ac08-6b508ff2e095\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651470018,'0000-00-00 00:00:00'),(78,'default','{\"uuid\":\"86dd4d2b-65f4-45d0-ae30-3c112839305f\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:162;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5be20946-836c-4b53-9d53-22076a9d07f6\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651634216,'0000-00-00 00:00:00'),(79,'default','{\"uuid\":\"a7b5079b-4ea6-4b31-a217-54bd93d4b9c7\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:163;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"127ad84a-262b-4f43-9156-136ede8489a3\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651634595,'0000-00-00 00:00:00'),(80,'default','{\"uuid\":\"18b5746f-2300-4f54-8e76-648588e4bee3\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:24;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:164;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"efa1e891-49d4-48f5-9710-b4256fe5b5b5\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651636452,'0000-00-00 00:00:00'),(81,'default','{\"uuid\":\"cbd19670-7619-4879-9a2b-9c3ccf86aac2\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:165;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ad170514-a2a9-4594-af89-fcc251c53406\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651638410,'0000-00-00 00:00:00'),(82,'default','{\"uuid\":\"aa97e961-e455-43dd-8bcb-0e1b202bc1f0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:166;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"90b1e28e-2e24-4c25-ab33-3775df6ee2e5\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651728292,'0000-00-00 00:00:00'),(83,'default','{\"uuid\":\"59cbcf32-116c-4728-abf2-44f9870c2e73\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:167;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"6affcc08-e6e8-422f-8c6d-a7516c95030a\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651728496,'0000-00-00 00:00:00'),(84,'default','{\"uuid\":\"8241a138-17d4-4ab1-8ddc-ea3a8a601657\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:25;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:168;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"0dfd8b0c-30f0-4e7a-a4aa-c1629b24d0a8\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651762752,'0000-00-00 00:00:00'),(85,'default','{\"uuid\":\"965e56a1-9cfc-42cb-b2a4-090b35c1fd2e\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:26;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:169;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"c4508be4-4361-4fd7-b8b2-145e5300ae88\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651762885,'0000-00-00 00:00:00'),(86,'default','{\"uuid\":\"4e243be7-36fa-4467-b383-fc702729874f\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:27;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:170;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7eee2a6a-13f7-43b6-93c8-9326b42784ff\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651763460,'0000-00-00 00:00:00'),(87,'default','{\"uuid\":\"82655b24-a404-4ae5-8ce2-d5b3f3a47753\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:171;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"2992cdd1-bc1e-44c3-8155-4fec7c6bc534\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651824542,'0000-00-00 00:00:00'),(88,'default','{\"uuid\":\"61c70d4e-5e3b-49de-b3e9-47ea86d952a9\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:28;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:172;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"0bdc0019-2991-4fac-8ae1-7e52b79762ec\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651829394,'0000-00-00 00:00:00'),(89,'default','{\"uuid\":\"61fde1c3-d471-4128-b4af-623820940d1f\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:29;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:173;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"73c615f1-ac0d-4dfd-82f4-33aab4d2f7a0\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651830249,'0000-00-00 00:00:00'),(90,'default','{\"uuid\":\"64290c42-8630-4ed2-ad39-523da7b95b4e\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:176;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ee90e47a-aa70-48cd-9a9b-125c100dd70b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651834259,'0000-00-00 00:00:00'),(91,'default','{\"uuid\":\"1dc48929-d9b5-45a2-911d-e89a3a8e32f1\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:30;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:177;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"fe61ca7f-875f-4af3-8cfc-786203e30195\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651834395,'0000-00-00 00:00:00'),(92,'default','{\"uuid\":\"d3c80840-9784-4241-a2b6-ecb910ebaa96\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:179;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7e847d05-5991-4ebe-9a80-4b64f9d730e9\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651841551,'0000-00-00 00:00:00'),(93,'default','{\"uuid\":\"7172c702-3ae2-4c71-813a-d01bc69508de\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:32;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:180;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ed82f34c-2964-4744-b449-1f8d5fcf304b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651847321,'0000-00-00 00:00:00'),(94,'default','{\"uuid\":\"f9f75a78-c884-4e2d-8dd9-e76b410042c2\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:33;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:181;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"1fc48c02-799d-41e3-8922-8cd06f07871b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651909197,'0000-00-00 00:00:00'),(95,'default','{\"uuid\":\"2a088fde-948d-40e7-be5d-361086fdc7b6\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:34;}s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"roles\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:182;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"2eab14a6-60a0-419f-9cde-2bb32d489f12\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1651932598,'0000-00-00 00:00:00'),(96,'default','{\"uuid\":\"d30e05a3-c35d-4db3-b778-76a83901e05e\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:17;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:185;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"24d7b40d-b481-4485-8d73-dc27dea2cb2b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1652106655,'0000-00-00 00:00:00'),(97,'default','{\"uuid\":\"d7670870-299e-4cc5-9f36-04b3e2603fa0\",\"displayName\":\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":16:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:45:\\\"SamuelNitsche\\\\AuthLog\\\\Notifications\\\\NewDevice\\\":12:{s:7:\\\"authLog\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:29:\\\"SamuelNitsche\\\\AuthLog\\\\AuthLog\\\";s:2:\\\"id\\\";i:187;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"ebc7bd2d-32ac-422f-a0e8-b894c5322d3b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}',0,NULL,1652848939,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `labels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labels`
--

LOCK TABLES `labels` WRITE;
/*!40000 ALTER TABLE `labels` DISABLE KEYS */;
INSERT INTO `labels` VALUES (1,'{\"en\":\"Most Viewed\"}','2022-03-31 09:12:12','2022-03-31 09:12:12'),(2,'{\"en\":\"Just Released\"}','2022-03-31 09:12:21','2022-03-31 09:12:21'),(3,'{\"en\":\"Top Grocer\"}','2022-03-31 09:12:30','2022-03-31 09:12:30'),(4,'{\"en\":\"Most Popular\"}','2022-03-31 09:12:44','2022-03-31 09:12:44'),(5,'{\"en\":\"Oscar Winner\"}','2022-03-31 09:12:57','2022-03-31 09:12:57'),(6,'{\"en\":\"Filmfare\"}','2022-03-31 09:13:04','2022-03-31 09:13:04');
/*!40000 ALTER TABLE `labels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landing_pages`
--

DROP TABLE IF EXISTS `landing_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landing_pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `button` tinyint(1) NOT NULL DEFAULT '1',
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` tinyint(1) NOT NULL DEFAULT '1',
  `position` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landing_pages`
--

LOCK TABLES `landing_pages` WRITE;
/*!40000 ALTER TABLE `landing_pages` DISABLE KEYS */;
INSERT INTO `landing_pages` VALUES (1,'landing_page_16481048561 - Copy.jpg','{\"en\":\"The Most Popular OTT Platform in India\"}','{\"en\":\"OOV Media merges the power of technology and convenience of internet to bring the best of entertainment to your mobile, laptop and PC.\"}',1,'{\"en\":\"Join OOV Media\"}','login',0,1,'2022-03-24 02:30:55','2022-04-26 09:09:16'),(2,'landing_page_1648648467landing_page_1644079261ori.jpg','{\"en\":\"Don\'t Miss Your Favorite TV Shows Ever\"}','{\"en\":\"Watch from our catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows & Web Series across multiple languages- English, Hindi and Bhojpuri.\"}',1,'{\"en\":\"Join OOV Media\"}','register',1,2,'2022-03-24 02:30:55','2022-03-30 13:54:27'),(3,'landing_page_16481052003 - Copy (2).jpg','{\"en\":\"TV at Your Fingertips- Anytime Anywhere\"}','{\"en\":\"Oov brings you the best content from traditional and digital networks, presented just as linear and on-demand channels on your streaming devices.\"}',1,'{\"en\":\"Join OOV Media\"}','login',0,3,'2022-03-24 02:30:55','2022-03-24 07:00:01'),(4,'landing_page_16481053024.jpg','{\"en\":\"Don\'t Miss the 180+ Free Premium Channels\"}','{\"en\":\"We bring you the best content from traditional and digital networks, presented just as linear and on-demand channels on your streaming devices.\"}',1,'{\"en\":\"Join OOV Media\"}','register',1,4,'2022-03-24 02:30:55','2022-03-24 07:08:12');
/*!40000 ALTER TABLE `landing_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `def` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rtl` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'en','English',1,'2022-03-24 02:30:55','2022-03-24 02:30:55',0);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `blog_id` int NOT NULL,
  `added` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,1,1,'-1','2022-03-28 10:41:20','2022-03-28 10:41:20');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `live_events`
--

DROP TABLE IF EXISTS `live_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `live_events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iframeurl` text COLLATE utf8mb4_unicode_ci,
  `ready_url` text COLLATE utf8mb4_unicode_ci,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `poster` text COLLATE utf8mb4_unicode_ci,
  `genre_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `organized_by` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `live_events`
--

LOCK TABLES `live_events` WRITE;
/*!40000 ALTER TABLE `live_events` DISABLE KEYS */;
INSERT INTO `live_events` VALUES (1,'TV9 Bharatvarsh','tv9-bharatvarsh','TV9 Bharatvarsh Live Streaming','iframeurl','https://vidcdn.vidgyor.com/tv9bharatvarsh-origin/live/tv9bharatvarsh-origin/live3/chunks.m3u8',NULL,'2022-03-29 10:37:00','2023-12-28 10:37:00',1,'thumb_1648530503imageedit_34_5824277612.png','poster_1648530503TV_Bharatvarsh_logo_-_18_Feb_2019.jpg',NULL,NULL,'TV9 Bharatvarsh','2022-03-29 05:08:23','2022-03-29 05:08:23');
/*!40000 ALTER TABLE `live_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manual_payment_methods`
--

DROP TABLE IF EXISTS `manual_payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manual_payment_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `manual_payment_methods_payment_name_unique` (`payment_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manual_payment_methods`
--

LOCK TABLES `manual_payment_methods` WRITE;
/*!40000 ALTER TABLE `manual_payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `manual_payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manual_payments`
--

DROP TABLE IF EXISTS `manual_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manual_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_from` datetime DEFAULT NULL,
  `subscription_to` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manual_payments`
--

LOCK TABLES `manual_payments` WRITE;
/*!40000 ALTER TABLE `manual_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `manual_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_genre_shows`
--

DROP TABLE IF EXISTS `menu_genre_shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_genre_shows` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned NOT NULL,
  `menu_section_id` int unsigned NOT NULL,
  `genre_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_genre_shows`
--

LOCK TABLES `menu_genre_shows` WRITE;
/*!40000 ALTER TABLE `menu_genre_shows` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_genre_shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_sections`
--

DROP TABLE IF EXISTS `menu_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_sections` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `section_id` int unsigned DEFAULT NULL,
  `item_limit` int unsigned DEFAULT NULL,
  `view` int unsigned NOT NULL DEFAULT '1',
  `order` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_sections`
--

LOCK TABLES `menu_sections` WRITE;
/*!40000 ALTER TABLE `menu_sections` DISABLE KEYS */;
INSERT INTO `menu_sections` VALUES (61,2,1,20,1,1),(62,2,2,20,1,1),(63,2,3,20,1,1),(64,2,5,20,1,1),(65,2,6,20,1,1),(66,2,7,NULL,1,1),(67,2,8,NULL,1,1),(68,2,9,NULL,1,1),(69,2,11,NULL,1,1),(70,3,1,20,1,1),(71,3,2,20,1,1),(72,3,3,20,1,1),(73,3,5,20,1,1),(74,3,6,20,1,1),(75,3,7,NULL,1,1),(76,3,8,NULL,1,1),(77,3,9,NULL,1,1),(78,3,11,NULL,1,1),(79,4,1,20,1,1),(80,4,2,20,1,1),(81,4,3,20,1,1),(82,4,5,20,1,1),(83,4,6,20,1,1),(84,4,7,NULL,1,1),(85,4,8,NULL,1,1),(86,4,9,NULL,1,1),(87,4,11,NULL,1,1),(88,5,1,20,1,1),(89,5,2,20,1,1),(90,5,3,20,1,1),(91,5,6,20,1,1),(92,5,7,NULL,1,1),(93,5,8,NULL,1,1),(94,5,9,NULL,1,1),(95,5,11,NULL,1,1),(102,6,8,NULL,1,1),(113,1,1,20,1,1),(114,1,2,20,1,1),(115,1,3,20,1,1),(116,1,5,10,1,1),(117,1,6,20,1,1),(118,1,7,NULL,1,1),(119,1,8,NULL,1,1),(120,1,9,NULL,1,1),(121,1,11,NULL,1,1);
/*!40000 ALTER TABLE `menu_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_videos`
--

DROP TABLE IF EXISTS `menu_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_videos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned NOT NULL,
  `movie_id` int unsigned DEFAULT NULL,
  `tv_series_id` int unsigned DEFAULT NULL,
  `live_event_id` int DEFAULT NULL,
  `audio_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_videos_menu_id_foreign` (`menu_id`),
  KEY `menu_videos_movie_id_foreign` (`movie_id`),
  KEY `menu_videos_tv_series_id_foreign` (`tv_series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_videos`
--

LOCK TABLES `menu_videos` WRITE;
/*!40000 ALTER TABLE `menu_videos` DISABLE KEYS */;
INSERT INTO `menu_videos` VALUES (1,1,1,NULL,NULL,NULL,'2022-03-24 11:51:16','2022-03-24 11:51:16'),(2,2,1,NULL,NULL,NULL,'2022-03-24 11:51:16','2022-03-24 11:51:16'),(3,1,2,NULL,NULL,NULL,'2022-03-24 12:03:28','2022-03-24 12:03:28'),(4,2,2,NULL,NULL,NULL,'2022-03-24 12:03:28','2022-03-24 12:03:28'),(5,1,3,NULL,NULL,NULL,'2022-03-24 12:14:51','2022-03-24 12:14:51'),(6,2,3,NULL,NULL,NULL,'2022-03-24 12:14:51','2022-03-24 12:14:51'),(7,1,4,NULL,NULL,NULL,'2022-03-24 13:27:22','2022-03-24 13:27:22'),(8,2,4,NULL,NULL,NULL,'2022-03-24 13:27:22','2022-03-24 13:27:22'),(9,1,5,NULL,NULL,NULL,'2022-03-24 13:58:51','2022-03-24 13:58:51'),(10,2,5,NULL,NULL,NULL,'2022-03-24 13:58:51','2022-03-24 13:58:51'),(11,4,NULL,NULL,1,NULL,'2022-03-29 05:08:23','2022-03-29 05:08:23'),(12,5,NULL,NULL,1,NULL,'2022-03-29 05:08:23','2022-03-29 05:08:23'),(13,1,6,NULL,NULL,NULL,'2022-03-29 05:11:59','2022-03-29 05:11:59'),(14,4,6,NULL,NULL,NULL,'2022-03-29 05:11:59','2022-03-29 05:11:59'),(15,5,6,NULL,NULL,NULL,'2022-03-29 05:11:59','2022-03-29 05:11:59'),(16,5,7,NULL,NULL,NULL,'2022-03-29 05:28:09','2022-03-29 05:28:09'),(17,5,8,NULL,NULL,NULL,'2022-03-29 06:00:15','2022-03-29 06:00:15'),(18,5,9,NULL,NULL,NULL,'2022-03-29 06:03:59','2022-03-29 06:03:59'),(75,1,16,NULL,NULL,NULL,'2022-03-31 09:35:10','2022-03-31 09:35:10'),(76,2,16,NULL,NULL,NULL,'2022-03-31 09:35:10','2022-03-31 09:35:10'),(79,1,15,NULL,NULL,NULL,'2022-03-31 09:36:20','2022-03-31 09:36:20'),(80,2,15,NULL,NULL,NULL,'2022-03-31 09:36:20','2022-03-31 09:36:20'),(81,1,14,NULL,NULL,NULL,'2022-03-31 09:36:40','2022-03-31 09:36:40'),(82,2,14,NULL,NULL,NULL,'2022-03-31 09:36:40','2022-03-31 09:36:40'),(83,1,13,NULL,NULL,NULL,'2022-03-31 09:37:18','2022-03-31 09:37:18'),(84,2,13,NULL,NULL,NULL,'2022-03-31 09:37:18','2022-03-31 09:37:18'),(90,1,17,NULL,NULL,NULL,'2022-03-31 09:46:54','2022-03-31 09:46:54'),(91,2,17,NULL,NULL,NULL,'2022-03-31 09:46:54','2022-03-31 09:46:54'),(92,1,18,NULL,NULL,NULL,'2022-03-31 12:32:32','2022-03-31 12:32:32'),(93,2,18,NULL,NULL,NULL,'2022-03-31 12:32:32','2022-03-31 12:32:32'),(94,1,19,NULL,NULL,NULL,'2022-03-31 12:58:58','2022-03-31 12:58:58'),(95,2,19,NULL,NULL,NULL,'2022-03-31 12:58:58','2022-03-31 12:58:58'),(96,1,20,NULL,NULL,NULL,'2022-03-31 13:22:18','2022-03-31 13:22:18'),(97,2,20,NULL,NULL,NULL,'2022-03-31 13:22:18','2022-03-31 13:22:18'),(102,1,12,NULL,NULL,NULL,'2022-04-01 11:52:12','2022-04-01 11:52:12'),(103,2,12,NULL,NULL,NULL,'2022-04-01 11:52:12','2022-04-01 11:52:12'),(104,1,21,NULL,NULL,NULL,'2022-05-09 06:10:09','2022-05-09 06:10:09'),(105,2,21,NULL,NULL,NULL,'2022-05-09 06:10:09','2022-05-09 06:10:09');
/*!40000 ALTER TABLE `menu_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'{\"en\":\"Home\"}','home',1,'2022-03-24 07:16:26','2022-03-24 07:16:26'),(2,'{\"en\":\"Movies\"}','movies',2,'2022-03-24 09:30:54','2022-03-24 09:30:54'),(3,'{\"en\":\"Web Series\"}','web-series',3,'2022-03-24 09:31:36','2022-03-24 09:31:36'),(4,'{\"en\":\"TV Shows\"}','tv-shows',4,'2022-03-24 09:32:07','2022-03-24 09:32:07'),(5,'{\"en\":\"Live TV\"}','live-tv',5,'2022-03-24 09:32:39','2022-03-24 09:32:39'),(6,'{\"en\":\"Blog\"}','blog',6,'2022-03-24 09:33:50','2022-03-24 09:33:50');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2016_06_01_000001_create_oauth_auth_codes_table',1),(2,'2016_06_01_000002_create_oauth_access_tokens_table',1),(3,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(4,'2016_06_01_000004_create_oauth_clients_table',1),(5,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(6,'2017_09_15_051156_setup_coinpayment_tables',1),(7,'2018_03_24_032432_create_callback_address_table',1),(8,'2018_05_07_123123_fix_transactions_table',1),(9,'2018_05_08_037214_cp_create_mass_withdrawal',1),(10,'2018_07_01_112608_add_column_dest_tag_to_transactions_table',1),(11,'2018_08_29_205156_create_translations_table',1),(12,'2019_05_03_000002_create_subscriptions_table',1),(13,'2019_05_03_000003_create_subscription_items_table',1),(14,'2020_06_14_180448_create_actors_table',1),(15,'2020_06_14_180448_create_ads_table',1),(16,'2020_06_14_180448_create_adsenses_table',1),(17,'2020_06_14_180448_create_audio_languages_table',1),(18,'2020_06_14_180448_create_auth_customizes_table',1),(19,'2020_06_14_180448_create_blog_menu_table',1),(20,'2020_06_14_180448_create_blogs_table',1),(21,'2020_06_14_180448_create_buttons_table',1),(22,'2020_06_14_180448_create_comments_table',1),(23,'2020_06_14_180448_create_configs_table',1),(24,'2020_06_14_180448_create_coupon_codes_table',1),(25,'2020_06_14_180448_create_cps_cpp_table',1),(26,'2020_06_14_180448_create_custom_pages_table',1),(27,'2020_06_14_180448_create_directors_table',1),(28,'2020_06_14_180448_create_donater_lists_table',1),(29,'2020_06_14_180448_create_episodes_table',1),(30,'2020_06_14_180448_create_faqs_table',1),(31,'2020_06_14_180448_create_front_slider_updates_table',1),(32,'2020_06_14_180448_create_genres_table',1),(33,'2020_06_14_180448_create_home_blocks_table',1),(34,'2020_06_14_180448_create_home_sliders_table',1),(35,'2020_06_14_180448_create_home_translations_table',1),(36,'2020_06_14_180448_create_jobs_table',1),(37,'2020_06_14_180448_create_landing_pages_table',1),(38,'2020_06_14_180448_create_languages_table',1),(39,'2020_06_14_180448_create_likes_table',1),(40,'2020_06_14_180448_create_live_events_table',1),(41,'2020_06_14_180448_create_menu_sections_table',1),(42,'2020_06_14_180448_create_menu_videos_table',1),(43,'2020_06_14_180448_create_menus_table',1),(44,'2020_06_14_180448_create_movie_comments_table',1),(45,'2020_06_14_180448_create_movie_series_table',1),(46,'2020_06_14_180448_create_movie_subcomments_table',1),(47,'2020_06_14_180448_create_movies_table',1),(48,'2020_06_14_180448_create_multiple_links_table',1),(49,'2020_06_14_180448_create_multiplescreens_table',1),(50,'2020_06_14_180448_create_notifications_table',1),(51,'2020_06_14_180448_create_package_menu_table',1),(52,'2020_06_14_180448_create_packages_table',1),(53,'2020_06_14_180448_create_password_resets_table',1),(54,'2020_06_14_180448_create_paypal_subscriptions_table',1),(55,'2020_06_14_180448_create_permissions_table',1),(56,'2020_06_14_180448_create_plans_table',1),(57,'2020_06_14_180448_create_player_settings_table',1),(58,'2020_06_14_180448_create_pricing_texts_table',1),(59,'2020_06_14_180448_create_seasons_table',1),(60,'2020_06_14_180448_create_seos_table',1),(61,'2020_06_14_180448_create_sessions_table',1),(62,'2020_06_14_180448_create_social_icons_table',1),(63,'2020_06_14_180448_create_subcomments_table',1),(64,'2020_06_14_180448_create_subtitles_table',1),(65,'2020_06_14_180448_create_tv_series_table',1),(66,'2020_06_14_180448_create_user_ratings_table',1),(67,'2020_06_14_180448_create_users_table',1),(68,'2020_06_14_180448_create_videolinks_table',1),(69,'2020_06_14_180448_create_views_table',1),(70,'2020_06_14_180448_create_watch_histories_table',1),(71,'2020_06_14_180448_create_wishlists_table',1),(72,'2020_06_14_180452_add_foreign_keys_to_episodes_table',1),(73,'2020_06_14_180452_add_foreign_keys_to_home_sliders_table',1),(74,'2020_06_22_122007_create_audio_table',1),(75,'2020_06_24_150735_create_manual_payments_table',1),(76,'2020_06_25_115048_create_app_configs_table',1),(77,'2020_06_25_132738_create_splash_screens_table',1),(78,'2020_06_25_180556_create_app_sliders_table',1),(79,'2020_06_29_102308_commingsoon_enabled_ip_to_buttons_table',1),(80,'2020_10_31_114942_add_column_to_player_settings_table',1),(81,'2020_11_02_113133_add_columns',1),(82,'2020_11_02_114440_create_reminder_mails_table',1),(83,'2020_11_07_135552_create_chat_setting_table',1),(84,'2021_06_05_112917_add_columns_in_users_table_custom',1),(85,'2021_06_05_130920_add_columns_existing',1),(86,'2020_11_06_114837_create_table',2),(87,'2020_11_06_115740_add_column_table',2),(88,'2020_12_03_153005_add_column_update_31_table',3),(89,'2020_12_24_121353_add_column_update_v3_2',4),(90,'2021_03_07_162535_create_coupon_applies_table',4),(91,'2021_03_22_112446_create_menu_genre_shows_table',5),(92,'2021_04_17_131827_create_google_ads_table',5),(93,'2021_05_03_144635_add_column_update_v3_3',5),(94,'2020_12_02_123844_create_manual_payment_methods_table',6),(95,'2021_06_13_182042_remove_column_update_v3_4',6),(96,'2021_06_13_185438_add_column_update_v3_4',6),(97,'2021_06_12_145328_create_package_features_table',7),(98,'2021_06_18_112730_add_column_update_v4_0',7),(99,'2021_07_03_084019_create_color_schemes_table',7),(100,'2021_07_20_094823_create_labels_table',7),(101,'2021_08_20_183347_remove_column_v4_0',7),(102,'2013_11_26_161501_create_currency_table',8),(103,'2021_08_30_180428_create_new_permission_tables',8),(104,'2021_09_04_110417_add_column_update_v_4_1',8),(105,'2021_09_17_182123_remove_column_v4_1',8),(106,'2017_09_01_000000_create_auth_log_table',9),(107,'2020_03_17_124120_create_user_wallets_table',9),(108,'2020_03_17_124635_create_user_wallet_histories_table',9),(109,'2021_05_03_201916_create_wallet_settings_table',9),(110,'2021_05_10_095324_create_affilates_table',9),(111,'2021_05_10_131357_create_affilate_histories_table',9),(112,'2021_09_22_144711_add_table_update_v4_2',9),(113,'2021_10_29_124643_add_column_update_v4_2',9),(114,'2021_11_12_104130_create_time_histories_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(3,'App\\User',2),(3,'App\\User',3),(3,'App\\User',4),(3,'App\\User',5),(3,'App\\User',6),(3,'App\\User',7),(3,'App\\User',8),(3,'App\\User',9),(3,'App\\User',10),(3,'App\\User',11),(3,'App\\User',12),(3,'App\\User',13),(3,'App\\User',14),(3,'App\\User',15),(3,'App\\User',16),(3,'App\\User',17),(3,'App\\User',18),(3,'App\\User',19),(3,'App\\User',20),(3,'App\\User',21),(3,'App\\User',22),(3,'App\\User',23),(3,'App\\User',24),(3,'App\\User',25),(3,'App\\User',26),(3,'App\\User',27),(3,'App\\User',28),(3,'App\\User',29),(3,'App\\User',30),(3,'App\\User',31),(3,'App\\User',32),(3,'App\\User',33),(3,'App\\User',34);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_comments`
--

DROP TABLE IF EXISTS `movie_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_id` int DEFAULT NULL,
  `tv_series_id` int DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_comments`
--

LOCK TABLES `movie_comments` WRITE;
/*!40000 ALTER TABLE `movie_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_series`
--

DROP TABLE IF EXISTS `movie_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_series` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int unsigned NOT NULL,
  `series_movie_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_series_movie_id_foreign` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_series`
--

LOCK TABLES `movie_series` WRITE;
/*!40000 ALTER TABLE `movie_series` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_subcomments`
--

DROP TABLE IF EXISTS `movie_subcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_subcomments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `comment_id` int DEFAULT NULL,
  `reply` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_subcomments`
--

LOCK TABLES `movie_subcomments` WRITE;
/*!40000 ALTER TABLE `movie_subcomments` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_subcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tmdb_id` int DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fetch_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `rating` double(8,2) DEFAULT NULL,
  `maturity_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` tinyint(1) DEFAULT NULL,
  `publish_year` int DEFAULT NULL,
  `released` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_video` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `series` tinyint(1) DEFAULT NULL,
  `a_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `live` tinyint(1) DEFAULT '0',
  `livetvicon` tinyint(1) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `is_protect` int NOT NULL DEFAULT '0',
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_upcoming` tinyint(1) NOT NULL DEFAULT '0',
  `is_custom_label` tinyint(1) NOT NULL DEFAULT '0',
  `label_id` int DEFAULT NULL,
  `upcoming_date` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (7,NULL,'Aaj Tak','aaj_tak','{\"en\":\"Aaj Tak\"}','{\"en\":\"Aaj Tak\"}','0','thumb_1648531688aaj26.png','poster_1648531688banner-0.jpg',NULL,NULL,'0','0','3',NULL,'{\"en\":\"Aaj Tak is an Indian Hindi-language news channel owned by TV Today Network, part of the New Delhi-based media conglomerate Living Media group. It is one of the oldest Hindi news channels in India. Aaj Tak is the most watched Hindi news channel in India and also the most subscribed Indian news channel on YouTube.\"}',10.00,'all age',0,NULL,NULL,NULL,0,0,'1',NULL,'M',1,1,1,0,'polo@125',1,'2022-03-29 05:28:08','2022-03-29 05:28:08',0,0,NULL,NULL),(9,NULL,'CNBC Awaaz','cnbc_awaaz','{\"en\":\"CNBC Awaaz\"}','{\"en\":\"CNBC Awaaz\"}','0','thumb_1648533839imageedit_36_2912798400.jpg','poster_1648533839115eb085084349.5d70faa851923.jpg',NULL,NULL,'0','0','3',NULL,'{\"en\":\"CNBC-AWAAZ is India\\u2019s No. 1 Hindi Business News channel, with a viewership share as high as 80 per cent on critical news occasions like the Union Budget. Over thirteen years, the channel has served as the growth tool for the saver, the investor and the entrepreneur. The CNBC-AWAAZ editorial team brings with them more than 19 years of experience each and a nationwide network spanning more than 49 cities. The reporting team is backed by a strong research set up, the first of its kind in India that specializes in research including consumer research, commodity markets, small business related information and stock markets.\"}',10.00,'all age',0,NULL,NULL,NULL,0,0,'1',NULL,'M',1,1,1,0,'polo@125',1,'2022-03-29 06:03:59','2022-03-29 06:03:59',0,0,NULL,NULL),(12,NULL,'The Notebook','the-notebook','{\"en\":\"The Notebook\"}','{\"en\":\"The Notebook\"}','5','thumb_1648813931o - Copy.jpg','poster_1648700571notebook.jpg','N','title','1','1,2,3,4','1,2','https://www.youtube.com/watch?v=SXYxOCLc9-c','{\"en\":\"A man comes to read to a woman in a nursing home. It\'s a story about a summer romance between Allie (Rachel McAdams), the daughter of wealthy parents, and Noah (Ryan Gosling) a poor boy. They are crazy about each other. But her parents suddenly decide they have to break up, and they send her to school up north.\"}',6.00,'all age',0,2017,'2018-01-05',NULL,1,0,'1',NULL,'M',0,NULL,1,0,'eyJpdiI6InNGTTBsTDE3V3Y1T2F3dktKM3JGa0E9PSIsInZhbHVlIjoiSkNGcXNHRm9pakxyTjZZcityZURSQT09IiwibWFjIjoiYTg5YWExNGQ3OTYxMDYyNzg5MTQ0ZmJiMDRhMGE5ZDcwOTk5NmYzNjAwOTUzYjcyMTU1MzMzNDY5ZWNiZjVhNiIsInRhZyI6IiJ9',1,'2022-03-31 03:56:57','2022-04-01 11:52:12',0,1,3,NULL),(13,NULL,'The Shawshank Redemption','the_shawshank_redemption','{\"en\":\"The Shawshank Redemption\"}','{\"en\":\"The Shawshank Redemption\"}','130','thumb_1648714290600_mdE87veuPNuNcrurOEMK.jpg','poster_1648714291original_l6mf3iMFYGVlmpkJkl0J.jpg','N','title','1','1,2,3,4','2','https://www.youtube.com/watch?v=PLl99DlL6b4','{\"en\":\"Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.\"}',10.00,'13+',0,2008,'2008-01-01',NULL,0,0,'2',NULL,'M',0,NULL,1,0,'eyJpdiI6IiszWWtKY1lnaDF4V3FsdmFLNmVPQVE9PSIsInZhbHVlIjoiQ3haczdZemR6Q0ZxLzU2ZHYyTjFZUT09IiwibWFjIjoiNWE1MWExNTE0YzJmYmEwOWUzNzE5ZjIxZTAzOTRiZTNkNWRmYWFiMTJmZmUwZTc1NTE2ZGQxMWYxM2RmYzkyNiIsInRhZyI6IiJ9',1,'2022-03-31 08:11:31','2022-03-31 09:37:18',0,1,1,NULL),(14,NULL,'Encanto','encanto','{\"en\":\"Encanto\"}','{\"en\":\"Encanto\"}','120','thumb_16487147459780736442411_p0_v1_s1200x630.jpg','poster_1648714745disneysencantoofficialteasertrailerblogroll-1625750510696.jpg','N','title','1','1,2,3,4','2','https://www.youtube.com/watch?v=CaimKeDcudo','{\"en\":\"The tale of an extraordinary family, the Madrigals, who live hidden in the mountains of Colombia, in a magical house, in a vibrant town, in a wondrous, charmed place called an Encanto. The magic of the Encanto has blessed every child in the family with a unique gift from super strength to the power to heal\\u2014every child except one, Mirabel. But when she discovers that the magic surrounding the Encanto is in danger, Mirabel decides that she, the only ordinary Madrigal, might just be her exceptional family\'s last hope.\"}',9.00,'all age',0,2012,'2012-01-08',NULL,0,0,'2',NULL,'M',0,NULL,1,0,'eyJpdiI6IlNMYzRPeGdPb3ZiYTJ6NTIwdkx4L1E9PSIsInZhbHVlIjoiSkZTU1dQVHY4OWM3L3U3c254ZVQ4Zz09IiwibWFjIjoiZTM2NzA3MGMwNWU3YzA0ZDE0MWY3MzkwNWU2NDZkZmE1MDIxMTZmNGU1ZjlkNDgwOTZjOWFhNzdhNGE1YzQ5OCIsInRhZyI6IiJ9',1,'2022-03-31 08:19:05','2022-03-31 09:36:40',0,1,2,NULL),(15,NULL,'No Time to Die','no_time_to_die','{\"en\":\"No Time to Die\"}','{\"en\":\"No Time to Die\"}','8','thumb_1648716167no-time-to-die-poster-2.jpg','poster_1648716338no_time_to_die_movie_2020-wallpaper-1920x1080-1-1024x576.jpg','N','title','1','1,2,3,4','2','https://www.youtube.com/watch?v=ApXoWvfEYVU','{\"en\":\"Irakli is a young aspiring architect thrown into turmoil when diagnosed with a debilitating eye disease. As his condition worsens, a surreal visual world opens up to him causing him to question his life\\u2019s choices, his career, and his marriage to an increasingly frustrated Nutsa who struggles with her loyalties to her husband and the realities of daily survival. As his condition worsens, Irakli meets Nino a beautiful artist who lives alone in the forest. She becomes his artistic muse and they form a deep connection that turns from fascination to infatuation to love. They speak in poetic language and understand each other completely.\"}',6.00,'16+',0,2022,'2022-01-06',NULL,0,0,'2',NULL,'M',0,NULL,1,0,'eyJpdiI6IlhBQkpHMmYwUU4ycWYvdEM2ZVBYWXc9PSIsInZhbHVlIjoiM0tLTVN2dVQydEpKdDZLazcyYkhYdz09IiwibWFjIjoiOTY5ODQ4ZTdhOTBiMjkwMWIyNTBiYWQzNmU1NjFlYTNkMWZlN2Q2NmZjYjBhMzMxMWMzZTdmNzViZTRmNzEyZiIsInRhZyI6IiJ9',1,'2022-03-31 08:42:47','2022-03-31 09:36:20',0,0,NULL,NULL),(16,NULL,'The Royal Treatment','the_royal_treatment','{\"en\":\"The Royal Treatment\"}','{\"en\":\"The Royal Treatment\"}','95','thumb_1648716703The Royal Treatment 1.jpg','poster_1648716703The Royal Treatment 3.jpg','N','title','1','1,2,3,4','2','https://www.youtube.com/watch?v=pRpeEdMmmQ0','{\"en\":\"Isabella runs her own salon and isn\\u2019t afraid to speak her mind, while Prince Thomas runs his own country and is about to marry for duty rather than love. When Izzy and her fellow stylists get the opportunity of a lifetime to do the hair for the royal wedding, she and Prince Thomas learn that taking control of their own destiny requires following their hearts.\"}',7.00,'all age',0,2018,'2018-06-05',NULL,1,0,'2',NULL,'M',0,NULL,1,1,'eyJpdiI6IjJ0TFdvSnZMNDhxckJoWGxKZ3Qramc9PSIsInZhbHVlIjoieHF5QmFKMDlpMzBRaWpxZjZwaVBqdz09IiwibWFjIjoiYjkyZDE2NDdlMzFiNTExODI3NjhjN2MyMDA2YjdiNGM5YWVmYzI1MmNlZTkwMTI3MGFhY2EzMTgxYjQ1ZjUwMCIsInRhZyI6IiJ9',1,'2022-03-31 08:51:43','2022-03-31 09:35:10',0,1,5,NULL),(17,NULL,'October','october','{\"en\":\"October\"}','{\"en\":\"October\"}','60','thumb_1648717369october-movie.jpg','poster_1648720014wallpaperflare.com_wallpaper (3).jpg','N','title','1','1,2,3,4','1','https://www.youtube.com/watch?v=rJmUFxrOU64','{\"en\":\"Presenting to you the making of October, a beautiful journey of love, life and relationships. October is a Rising Sun Films & Kino Works\' production, written by Juhi Chaturvedi, directed by Shoojit Sircar, produced by Ronnie Lahiri and Sheel Kumar, starring Varun Dhawan and Banita Sandhu in lead roles.\"}',4.00,'16+',0,2008,'2014-06-15',NULL,1,0,'1',NULL,'M',0,NULL,1,0,'eyJpdiI6Ilg5NzB0ZVBhY0s5S1g0dHR0NHF2cGc9PSIsInZhbHVlIjoiZGFaZ3lKRnUzZ0NMRXlwS1RnMlFTZz09IiwibWFjIjoiMmI2MTE3MzQ3NzM5ZjE0ZmI2ODg0MWU1OWQ0ZDYzMmQyODFhNzVkOTNjZDExZTU4MzM2YTVkYjhmNDQ4OGNkNyIsInRhZyI6IiJ9',1,'2022-03-31 09:02:49','2022-03-31 09:46:54',0,0,NULL,NULL),(18,NULL,'Death on the Nile','death_on_the_nile','{\"en\":\"Death on the Nile\"}','{\"en\":\"Death on the Nile\"}','95','thumb_1648729952MV5BNjI4ZTQ1OTYtNTI0Yi00M2EyLThiNjMtMzk1MmZlOWMyMDQwXkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_QL75_UX380_CR0,0,380,562_.jpg','poster_1648729952HO00002073.jpg','N','title','1','3,4,2,1','2','https://www.youtube.com/watch?v=dZRqB0JLizw','{\"en\":\"Belgian sleuth Hercule Poirot\\u2019s Egyptian vacation aboard a glamorous river steamer turns into a terrifying search for a murderer when a picture-perfect couple\\u2019s idyllic honeymoon is tragically cut short. Set against an epic landscape of sweeping desert vistas and the majestic Giza pyramids, this dramatic tale of love gone wrong features a cosmopolitan group of impeccably dressed travelers and enough wicked twists and turns to leave audiences guessing until the final, shocking denouement.\"}',5.00,'16+',0,2022,'2022-01-01',NULL,1,0,'1',NULL,'M',0,NULL,1,0,'eyJpdiI6InovYmJ4ZEh4cDE5czVheSsvL2JMU0E9PSIsInZhbHVlIjoiNERxckNjcUNLbU10QkhYc1U5THppQT09IiwibWFjIjoiNzEwNzExNjBmMDNlYzVkOGMzNWI0N2EwMzE4MzdhZDBjZThmNmZiZTkyYjAzYmY5YjE5OTg1NTgzMjI1NmVhMSIsInRhZyI6IiJ9',1,'2022-03-31 12:32:32','2022-03-31 12:32:32',0,1,3,NULL),(19,NULL,'Deep Water','deep_water','{\"en\":\"Deep Water\"}','{\"en\":\"Deep Water\"}','90','thumb_1648731538e53aaa08e9f5ea930f71647df8ef4426.jpg','poster_1648731538thumb-1920-734767.jpg','N','title','1','1,2,3,4','2','https://www.youtube.com/watch?v=wZXzZ7-b5BI','{\"en\":\"Vic and also Melinda Van Allen are a couple in the village of Little Wesley. Their loveless marital relationship is held together just by a perilous setup whereby, in order to avoid the messiness of separation, Melinda is allowed to take any variety of lovers as long as she does not desert her family members. Production: 20th Century Studios, Regency Enterprises, Entertainment One, New Regency Pictures, Film Rites, Entertainment 360\"}',5.00,'all age',0,2021,'2022-01-08',NULL,1,0,'2',NULL,'M',0,NULL,1,0,'eyJpdiI6IlkwelpSUkY4M200d20ybkpXR3ltYUE9PSIsInZhbHVlIjoiSmR2L254T0xWOHVtMWNodGlsNmJIZz09IiwibWFjIjoiOGYxMzIyMzNlMmI4MjBkMTI5ZTlmZDI3ZjQ2MDRjZWZlMGE5MjgxZWI4NmE1OTllZDVlY2FlMjg1NGFjZmM5OSIsInRhZyI6IiJ9',1,'2022-03-31 12:58:58','2022-03-31 12:58:58',0,0,NULL,NULL),(20,NULL,'The Lost City','the_lost_city','{\"en\":\"The Lost City\"}','{\"en\":\"The Lost City\"}','50','thumb_1648732938The_Lost_City__26601_zoom.jpg','poster_1648732938lost-city-of-d-2021.jpg','N','title','1','2,3,4','2','https://www.youtube.com/watch?v=NrR-iHyxJlE','{\"en\":\"Follows a reclusive romance writer that was sure nothing could be even worse than obtaining stuck on a book tour with her cover model, until a kidnapping attempt sweeps them both right into an aggressive forest adventure, showing life can be so much stranger, as well as much more enchanting, than any one of her book fictions.\"}',4.00,'all age',0,2015,'2021-01-01',NULL,0,0,'2',NULL,'M',0,NULL,1,0,'eyJpdiI6ImxTaEh3QmJUSUpaUTFScmxWMHZVR2c9PSIsInZhbHVlIjoid3o5QXdiRlA1blpyUkRXcUFqd0tydz09IiwibWFjIjoiYjkzZDdkMGJjY2I1ZDFmNDE0NjhlYjE2NDM3M2VmMTE3Zjg0OWQyMDdiNzc3NTU1MzliYTc5ODFmZmYxMTI3MSIsInRhZyI6IiJ9',1,'2022-03-31 13:22:18','2022-03-31 13:22:18',0,0,NULL,NULL),(21,NULL,'Dora and The Lost City of Gold','dora_and_the_lost_city_of_gold','{\"en\":\"Dora and The City of Gold\"}','{\"en\":\"Dora and The Losy City of Gold\"}','65','thumb_1648741836yjIsNvLF5vN8v1KcQdZ9soUQwiu.jpg','poster_1648741837dora-and-the-lost-city-of-gold-cover.png','N','title','1','1,2,3,4','2','https://www.youtube.com/watch?v=gLs3qQU7eug','{\"en\":\"A live-action film based on the Nick Jr. animated television series Dora the Explorer as well as the Nickelodeon animated series Dora and Friends. Having spent most of her life exploring the jungle, nothing could prepare Dora for her most dangerous adventure yet -- high school. Accompanied by a ragtag group of teens and Boots the monkey, Dora embarks on a quest to save her parents while trying to solve the seemingly impossible mystery behind a lost Incan civilization.\"}',6.00,'all age',0,2020,'2020-01-01',NULL,0,0,'2',NULL,'M',0,NULL,1,0,'eyJpdiI6IkRRU08yZXBNN1hVdUVhcjdWSS9nVGc9PSIsInZhbHVlIjoieUVmYmpOMGFRdGo0bWpwbkUvL0VYUT09IiwibWFjIjoiMDQ5MGExZGQxMmE0OTY4NjIxNTRkMTE3YzQ5YzAxYTBmY2ZlYjc4OGEyZDQzNmM3MTMwYmZlNmFjMzFjYTRjOCIsInRhZyI6IiJ9',1,'2022-03-31 15:50:38','2022-05-09 06:10:09',0,0,NULL,NULL);
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multiple_links`
--

DROP TABLE IF EXISTS `multiple_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multiple_links` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int DEFAULT NULL,
  `episode_id` int DEFAULT NULL,
  `download` tinyint(1) NOT NULL,
  `quality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clicks` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multiple_links`
--

LOCK TABLES `multiple_links` WRITE;
/*!40000 ALTER TABLE `multiple_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `multiple_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multiplescreens`
--

DROP TABLE IF EXISTS `multiplescreens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multiplescreens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `screen1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned NOT NULL,
  `activescreen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_1_used` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `screen_2_used` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `screen_3_used` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `screen_4_used` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `device_mac_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_mac_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_mac_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_mac_4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_1` int DEFAULT NULL,
  `download_2` int DEFAULT NULL,
  `download_3` int DEFAULT NULL,
  `download_4` int DEFAULT NULL,
  `pkg_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multiplescreens`
--

LOCK TABLES `multiplescreens` WRITE;
/*!40000 ALTER TABLE `multiplescreens` DISABLE KEYS */;
/*!40000 ALTER TABLE `multiplescreens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `notifiable_type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_id` int DEFAULT NULL,
  `tv_id` int DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('e4686896-baa5-4692-99aa-f0bbc3298f02','App\\Notifications\\MyNotification','30 Days Free Trial','App\\User',5,'{\"title\":\"30 Days Free Trial\",\"data\":\"Your Free Member Ship has Started 2022-03-31 to 2022-04-30\",\"movie_id\":null,\"tv_id\":null,\"notifiable_id\":5}',NULL,NULL,NULL,'2022-03-31 06:50:39','2022-03-31 06:50:39'),('ee7c59cc-ec2d-4e8d-a9f5-002c854b8674','App\\Notifications\\MyNotification','30 Days Free Trial','App\\User',3,'{\"title\":\"30 Days Free Trial\",\"data\":\"Your Free Member Ship has Started 2022-03-31 to 2022-04-30\",\"movie_id\":null,\"tv_id\":null,\"notifiable_id\":3}',NULL,NULL,NULL,'2022-03-31 07:30:52','2022-03-31 07:30:52');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('607de4d64885d2f178d44dbadc42978d4a097be65fccdae228edc59da9349b14f7edba1a9e7e551c',1,2,NULL,'[]',0,'2022-04-03 14:39:32','2022-04-03 14:39:32','2023-04-03 20:09:32');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Nexthour Personal Access Client','Z9kvpHyT5nzRQrGKvLoKxXces8bxDzexeqZVP5sA',NULL,'http://localhost',1,0,0,'2019-12-09 04:29:26','2019-12-09 04:29:26'),(2,NULL,'Nexthour Password Grant Client','C2VrZuB5yr78fKGJcbPMtS4k6U1DAWePGhNu4Uq8',NULL,'http://localhost',0,1,0,'2019-12-09 04:29:27','2019-12-09 04:29:27');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2019-12-09 04:29:27','2019-12-09 04:29:27');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` VALUES ('50f0107c80c199b563bbf529b1fa38fe8830408d78a87facdbbee58531266ca50d43be7f28d791cf','607de4d64885d2f178d44dbadc42978d4a097be65fccdae228edc59da9349b14f7edba1a9e7e551c',0,'2023-04-03 20:09:32');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_features`
--

DROP TABLE IF EXISTS `package_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_features` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_features`
--

LOCK TABLES `package_features` WRITE;
/*!40000 ALTER TABLE `package_features` DISABLE KEYS */;
INSERT INTO `package_features` VALUES (1,'{\"en\":\"Free for 1st Month\"}','2022-03-24 09:37:15','2022-03-24 09:37:15'),(2,'{\"en\":\"Access to Premium Content\"}','2022-03-24 09:37:23','2022-03-24 09:37:23'),(3,'{\"en\":\"Unlimited Download\"}','2022-03-24 09:37:29','2022-03-24 09:37:29'),(4,'{\"en\":\"Watch on Mobile, Tab and Laptop\"}','2022-03-24 09:37:36','2022-03-24 09:37:36'),(5,'{\"en\":\"Full HD and 4K\"}','2022-03-24 09:37:43','2022-03-24 09:37:43'),(6,'{\"en\":\"24x7 Tech Support\"}','2022-03-24 09:37:50','2022-03-24 09:37:50'),(7,'{\"en\":\"Cancel Anytime\"}','2022-03-24 09:37:56','2022-03-24 09:37:56'),(8,'{\"en\":\"Ad Free\"}','2022-03-24 09:38:02','2022-03-24 09:38:02'),(9,'{\"en\":\"Multiple Login\"}','2022-03-24 09:38:09','2022-03-24 09:38:09');
/*!40000 ALTER TABLE `package_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_menu`
--

DROP TABLE IF EXISTS `package_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_menu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `pkg_id` int NOT NULL,
  `package_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_menu`
--

LOCK TABLES `package_menu` WRITE;
/*!40000 ALTER TABLE `package_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `package_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `interval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_count` int DEFAULT NULL,
  `trial_period_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `screens` int unsigned NOT NULL DEFAULT '1',
  `download` tinyint(1) NOT NULL DEFAULT '0',
  `downloadlimit` int DEFAULT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `free` tinyint(1) NOT NULL DEFAULT '0',
  `feature` longtext COLLATE utf8mb4_unicode_ci,
  `ads_in_web` tinyint(1) NOT NULL DEFAULT '0',
  `ads_in_app` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'welcome','{\"en\":\"Welcome\"}','INR','fa fa-inr',25.00,'{\"en\":\"year\"}',1,'30','active',1,0,NULL,1,'2022-03-31 06:08:46','2022-03-31 06:53:37',0,'[\"4\",\"5\",\"6\",\"7\"]',0,0),(2,'silver','{\"en\":\"Silver\"}','INR','fa fa-inr',250.00,'{\"en\":\"year\"}',1,'30','active',1,0,NULL,1,'2022-03-31 06:45:33','2022-03-31 06:53:39',0,'[\"1\",\"2\",\"4\",\"5\",\"6\",\"7\",\"9\"]',0,0),(3,'gold365','{\"en\":\"Gold\"}','INR','fa fa-inr',500.00,'{\"en\":\"year\"}',1,'30','active',1,0,NULL,1,'2022-03-31 06:48:27','2022-03-31 06:53:41',0,'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]',0,0),(4,'freetrial30','{\"en\":\"Free Trial\"}','INR','fa fa-inr',0.00,'{\"en\":\"month\"}',1,'30','active',1,0,NULL,1,'2022-03-31 09:53:40','2022-03-31 09:53:40',1,'[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"]',0,0);
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paypal_subscriptions`
--

DROP TABLE IF EXISTS `paypal_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paypal_subscriptions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_from` datetime DEFAULT NULL,
  `subscription_to` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal_subscriptions`
--

LOCK TABLES `paypal_subscriptions` WRITE;
/*!40000 ALTER TABLE `paypal_subscriptions` DISABLE KEYS */;
INSERT INTO `paypal_subscriptions` VALUES (3,7,'ECAZIINU','archu999',4,0.00,1,'Free','2022-03-31 15:24:02','2022-05-01 15:24:02','2022-03-31 09:54:02','2022-03-31 09:56:30'),(4,8,'EL3JLL6S','sadhna77',4,0.00,1,'Free','2022-03-31 15:30:49','2022-05-01 15:30:49','2022-03-31 10:00:49','2022-03-31 10:14:56'),(5,5,'UEVF0PPC','acdrsunny',4,0.00,1,'Free','2022-03-31 15:36:09','2022-05-01 15:36:09','2022-03-31 10:06:09','2022-04-07 06:57:29'),(6,3,'O6YQKCDV','suhana77',4,0.00,1,'Free','2022-03-31 21:39:12','2022-05-01 21:39:12','2022-03-31 16:09:12','2022-04-04 11:40:26'),(7,10,'1FMHIHXF','suhana78',4,0.00,1,'Free','2022-04-04 23:03:32','2022-05-04 23:03:32','2022-04-04 17:33:32','2022-04-04 17:33:32'),(8,10,'DXYGLCSR','suhana78',4,0.00,1,'Free','2022-04-04 23:03:34','2022-05-04 23:03:34','2022-04-04 17:33:34','2022-04-04 17:33:34'),(9,10,'WPQUFDPD','suhana78',4,0.00,1,'Free','2022-04-04 23:03:40','2022-05-04 23:03:40','2022-04-04 17:33:40','2022-04-04 17:33:40'),(10,11,'AJCL6QAD','aarav',4,0.00,0,'Free','2022-04-05 11:22:37','2022-05-05 11:22:37','2022-04-05 05:52:37','2022-04-05 06:11:02'),(11,12,'U3FRFDKC','prtdev',4,0.00,1,'Free','2022-04-07 13:06:17','2022-05-07 13:06:17','2022-04-07 07:36:17','2022-04-07 07:39:11'),(12,14,'pay_JGOl2i0KBp6VbD','suhana88',1,25.00,1,'razorpay','2022-04-07 13:52:28','2023-05-07 13:52:28','2022-04-07 08:22:28','2022-04-07 10:21:38'),(13,15,'LVVDLYJB','suhana99',4,0.00,1,'Free','2022-04-12 22:20:05','2022-05-12 22:20:05','2022-04-12 16:50:05','2022-04-12 16:50:05'),(14,16,'P42O2AW2','demouser',4,0.00,1,'Free','2022-04-13 13:28:41','2022-05-13 13:28:41','2022-04-13 07:58:41','2022-04-13 07:58:41'),(15,18,'EULAHMS4','anil200',4,0.00,1,'Free','2022-04-21 19:57:12','2022-05-21 19:57:12','2022-04-21 14:27:12','2022-04-21 14:27:12'),(16,17,'IZA1SQHY','Anil 100',4,0.00,1,'Free','2022-04-21 19:57:13','2022-05-21 19:57:13','2022-04-21 14:27:13','2022-04-21 14:27:13'),(17,19,'pay_JP75mXl33AT5xf','Kartik Malhotra',1,25.00,1,'razorpay','2022-04-29 14:27:54','2023-05-29 14:27:54','2022-04-29 08:57:54','2022-04-29 08:57:54'),(18,6,'by admin','mihir_godda',4,0.00,1,'by Admin','2022-05-04 09:58:25','2022-06-04 09:58:25','2022-05-04 04:28:25','2022-05-04 04:28:25'),(19,32,'pay_JRyXtNxcPQpW1v','Sweety Malhotra',1,25.00,1,'razorpay','2022-05-06 20:03:01','2023-06-05 20:03:01','2022-05-06 14:33:01','2022-05-06 14:33:01'),(20,32,'pay_JRyXtNxcPQpW1v','Sweety Malhotra',1,25.00,1,'razorpay','2022-05-06 20:05:56','2023-06-05 20:05:56','2022-05-06 14:35:56','2022-05-06 14:35:56'),(21,33,'pay_JSG9bw4rCprFah','Ganga Sagar',1,25.00,1,'razorpay','2022-05-07 13:14:52','2023-06-06 13:14:52','2022-05-07 07:44:52','2022-05-07 07:44:52'),(22,5,'EQJN11NI','acdrsunny',4,0.00,1,'Free','2022-05-18 10:08:04','2022-06-18 10:08:04','2022-05-18 04:38:04','2022-05-18 04:38:04');
/*!40000 ALTER TABLE `paypal_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'users.view','web','2021-09-01 07:20:34','2021-09-01 07:20:34'),(2,'users.create','web','2021-09-01 07:20:34','2021-09-01 07:20:34'),(3,'users.edit','web','2021-09-01 07:20:34','2021-09-01 07:20:34'),(4,'users.delete','web','2021-09-01 07:20:34','2021-09-01 07:20:34'),(5,'menu.view','web','2021-09-01 07:38:10','2021-09-01 07:38:10'),(6,'menu.create','web','2021-09-01 07:38:10','2021-09-01 07:38:10'),(7,'menu.edit','web','2021-09-01 07:38:10','2021-09-01 07:38:10'),(8,'menu.delete','web','2021-09-01 07:38:10','2021-09-01 07:38:10'),(9,'movies.view','web','2021-09-02 06:44:20','2021-09-02 06:44:20'),(10,'movies.create','web','2021-09-02 06:44:20','2021-09-02 06:44:20'),(11,'movies.edit','web','2021-09-02 06:44:20','2021-09-02 06:44:20'),(12,'movies.delete','web','2021-09-02 06:44:20','2021-09-02 06:44:20'),(13,'tvseries.view','web','2021-09-02 06:44:28','2021-09-02 06:44:28'),(14,'tvseries.create','web','2021-09-02 06:44:28','2021-09-02 06:44:28'),(15,'tvseries.edit','web','2021-09-02 06:44:28','2021-09-02 06:44:28'),(16,'tvseries.delete','web','2021-09-02 06:44:29','2021-09-02 06:44:29'),(17,'livetv.view','web','2021-09-02 06:44:37','2021-09-02 06:44:37'),(18,'livetv.create','web','2021-09-02 06:44:37','2021-09-02 06:44:37'),(19,'livetv.edit','web','2021-09-02 06:44:37','2021-09-02 06:44:37'),(20,'livetv.delete','web','2021-09-02 06:44:37','2021-09-02 06:44:37'),(21,'liveevent.view','web','2021-09-02 06:44:44','2021-09-02 06:44:44'),(22,'liveevent.create','web','2021-09-02 06:44:44','2021-09-02 06:44:44'),(23,'liveevent.edit','web','2021-09-02 06:44:44','2021-09-02 06:44:44'),(24,'liveevent.delete','web','2021-09-02 06:44:44','2021-09-02 06:44:44'),(25,'audio.view','web','2021-09-02 06:44:55','2021-09-02 06:44:55'),(26,'audio.create','web','2021-09-02 06:44:55','2021-09-02 06:44:55'),(27,'audio.edit','web','2021-09-02 06:44:55','2021-09-02 06:44:55'),(28,'audio.delete','web','2021-09-02 06:44:55','2021-09-02 06:44:55'),(29,'package.view','web','2021-09-02 06:47:22','2021-09-02 06:47:22'),(30,'package.create','web','2021-09-02 06:47:23','2021-09-02 06:47:23'),(31,'package.edit','web','2021-09-02 06:47:23','2021-09-02 06:47:23'),(32,'package.delete','web','2021-09-02 06:47:23','2021-09-02 06:47:23'),(33,'blog.view','web','2021-09-02 06:47:53','2021-09-02 06:47:53'),(34,'blog.create','web','2021-09-02 06:47:53','2021-09-02 06:47:53'),(35,'blog.edit','web','2021-09-02 06:47:53','2021-09-02 06:47:53'),(36,'blog.delete','web','2021-09-02 06:47:54','2021-09-02 06:47:54'),(37,'coupon.view','web','2021-09-02 06:49:58','2021-09-02 06:49:58'),(38,'coupon.create','web','2021-09-02 06:49:58','2021-09-02 06:49:58'),(39,'coupon.edit','web','2021-09-02 06:49:58','2021-09-02 06:49:58'),(40,'coupon.delete','web','2021-09-02 06:49:58','2021-09-02 06:49:58'),(41,'addon-manager.manage','web','2021-09-02 07:10:25','2021-09-02 07:10:25'),(42,'actor.view','web','2021-09-02 11:14:09','2021-09-02 11:14:09'),(43,'actor.create','web','2021-09-02 11:14:09','2021-09-02 11:14:09'),(44,'actor.edit','web','2021-09-02 11:14:10','2021-09-02 11:14:10'),(45,'actor.delete','web','2021-09-02 11:14:10','2021-09-02 11:14:10'),(46,'genre.view','web','2021-09-02 11:14:19','2021-09-02 11:14:19'),(47,'genre.create','web','2021-09-02 11:14:19','2021-09-02 11:14:19'),(48,'genre.edit','web','2021-09-02 11:14:19','2021-09-02 11:14:19'),(49,'genre.delete','web','2021-09-02 11:14:19','2021-09-02 11:14:19'),(50,'director.view','web','2021-09-02 11:14:48','2021-09-02 11:14:48'),(51,'director.create','web','2021-09-02 11:14:48','2021-09-02 11:14:48'),(52,'director.edit','web','2021-09-02 11:14:49','2021-09-02 11:14:49'),(53,'director.delete','web','2021-09-02 11:14:49','2021-09-02 11:14:49'),(54,'label.view','web','2021-09-02 11:15:23','2021-09-02 11:15:23'),(55,'label.create','web','2021-09-02 11:15:23','2021-09-02 11:15:23'),(56,'label.edit','web','2021-09-02 11:15:23','2021-09-02 11:15:23'),(57,'label.delete','web','2021-09-02 11:15:23','2021-09-02 11:15:23'),(58,'audiolanguage.view','web','2021-09-02 11:37:35','2021-09-02 11:37:35'),(59,'audiolanguage.create','web','2021-09-02 11:37:35','2021-09-02 11:37:35'),(60,'audiolanguage.edit','web','2021-09-02 11:37:35','2021-09-02 11:37:35'),(61,'audiolanguage.delete','web','2021-09-02 11:37:36','2021-09-02 11:37:36'),(62,'manual-payment.view','web','2021-09-02 12:19:38','2021-09-02 12:19:38'),(63,'manual-payment.create','web','2021-09-02 12:19:38','2021-09-02 12:19:38'),(64,'manual-payment.edit','web','2021-09-02 12:19:38','2021-09-02 12:19:38'),(65,'manual-payment.delete','web','2021-09-02 12:19:38','2021-09-02 12:19:38'),(66,'pages.view','web','2021-09-02 12:19:51','2021-09-02 12:19:51'),(67,'pages.create','web','2021-09-02 12:19:51','2021-09-02 12:19:51'),(68,'pages.edit','web','2021-09-02 12:19:52','2021-09-02 12:19:52'),(69,'pages.delete','web','2021-09-02 12:19:52','2021-09-02 12:19:52'),(70,'faq.view','web','2021-09-02 12:20:01','2021-09-02 12:20:01'),(71,'faq.create','web','2021-09-02 12:20:01','2021-09-02 12:20:01'),(72,'faq.edit','web','2021-09-02 12:20:01','2021-09-02 12:20:01'),(73,'faq.delete','web','2021-09-02 12:20:02','2021-09-02 12:20:02'),(74,'site-settings.language','web','2021-09-02 12:22:36','2021-09-02 12:22:36'),(75,'pushnotification.settings','web','2021-09-02 12:23:18','2021-09-02 12:23:18'),(76,'front-settings.sliders','web','2021-09-02 12:24:07','2021-09-02 12:24:07'),(77,'reports.viewtraker','web','2021-09-02 12:24:38','2021-09-02 12:24:38'),(78,'site-settings.genral-settings','web','2021-09-02 12:24:54','2021-09-02 12:24:54'),(79,'site-settings.mail-settings','web','2021-09-02 12:25:10','2021-09-02 12:25:10'),(80,'site-settings.social-login-settings','web','2021-09-02 12:25:48','2021-09-02 12:25:48'),(81,'site-settings.style-settings','web','2021-09-02 12:28:12','2021-09-02 12:28:12'),(82,'site-settings.seo','web','2021-09-02 12:28:31','2021-09-02 12:28:31'),(83,'comment-settings.comments','web','2021-09-04 09:03:08','2021-09-04 09:03:08'),(84,'help.db-backup','web','2021-09-04 09:03:42','2021-09-04 09:03:42'),(85,'producer-content.manage','web','2021-09-04 09:04:07','2021-09-04 09:04:07'),(86,'notification.manage','web','2021-09-04 09:04:33','2021-09-04 09:04:33'),(87,'front-settings.landing-page','web','2021-09-04 09:05:38','2021-09-04 09:05:38'),(88,'front-settings.auth-customization','web','2021-09-04 09:06:46','2021-09-04 09:06:46'),(89,'front-settings.short-promo','web','2021-09-04 09:07:17','2021-09-04 09:07:17'),(90,'site-settings.player-setting','web','2021-09-04 09:13:34','2021-09-04 09:13:34'),(91,'site-settings.pwa','web','2021-09-04 09:18:59','2021-09-04 09:18:59'),(92,'comment-settings.subcomments','web','2021-09-04 12:02:14','2021-09-04 12:02:14'),(93,'site-settings.color-option','web','2021-09-04 12:05:06','2021-09-04 12:05:06'),(94,'site-settings.adsense','web','2021-09-04 12:05:25','2021-09-04 12:05:25'),(95,'site-settings.chat-setting','web','2021-09-04 12:05:41','2021-09-04 12:05:41'),(96,'site-settings.api-settings','web','2021-09-04 12:06:05','2021-09-04 12:06:05'),(97,'site-settings.termsandcondition','web','2021-09-04 12:06:44','2021-09-04 12:06:44'),(98,'site-settings.privacy-policy','web','2021-09-04 12:07:07','2021-09-04 12:07:07'),(99,'site-settings.refund-policy','web','2021-09-04 12:07:51','2021-09-04 12:07:51'),(100,'site-settings.copyrights','web','2021-09-04 12:08:12','2021-09-04 12:08:12'),(101,'reports.user-subscription','web','2021-09-04 12:08:33','2021-09-04 12:08:33'),(102,'reports.device-history','web','2021-09-04 12:08:47','2021-09-04 12:08:47'),(103,'reports.revenue','web','2021-09-04 12:09:10','2021-09-04 12:09:10'),(104,'help.system-status','web','2021-09-04 12:10:52','2021-09-04 12:10:52'),(105,'help.remove-public','web','2021-09-04 12:11:10','2021-09-04 12:11:10'),(106,'help.clear-cache','web','2021-09-04 12:11:28','2021-09-04 12:11:28'),(107,'ads.view','web','2021-09-04 12:12:23','2021-09-04 12:12:23'),(108,'ads.create','web','2021-09-04 12:12:23','2021-09-04 12:12:23'),(109,'ads.edit','web','2021-09-04 12:12:24','2021-09-04 12:12:24'),(110,'ads.delete','web','2021-09-04 12:12:24','2021-09-04 12:12:24'),(111,'googleads.view','web','2021-09-04 12:12:34','2021-09-04 12:12:34'),(112,'googleads.create','web','2021-09-04 12:12:34','2021-09-04 12:12:34'),(113,'googleads.edit','web','2021-09-04 12:12:34','2021-09-04 12:12:34'),(114,'googleads.delete','web','2021-09-04 12:12:34','2021-09-04 12:12:34'),(115,'package-feature.view','web','2021-09-04 12:12:48','2021-09-04 12:12:48'),(116,'package-feature.create','web','2021-09-04 12:12:48','2021-09-04 12:12:48'),(117,'package-feature.edit','web','2021-09-04 12:12:48','2021-09-04 12:12:48'),(118,'package-feature.delete','web','2021-09-04 12:12:48','2021-09-04 12:12:48'),(119,'front-settings.social-icon','web','2021-09-06 05:14:57','2021-09-06 05:14:57'),(120,'site-settings.manualpayment','web','2021-09-06 05:31:27','2021-09-06 05:31:27'),(121,'reports.stripe-report','web','2021-09-06 06:58:20','2021-09-06 06:58:20'),(122,'help.import-demo','web','2021-09-22 06:26:05','2021-09-22 06:26:05'),(123,'site-settings.currency','web','2021-09-22 06:26:49','2021-09-22 06:26:49'),(124,'roles.view','web','2021-09-22 06:35:12','2021-09-22 06:35:12'),(125,'roles.create','web','2021-09-22 06:36:30','2021-09-22 06:36:30'),(126,'roles.edit','web','2021-09-22 06:36:30','2021-09-22 06:36:30'),(127,'roles.delete','web','2021-09-22 06:36:30','2021-09-22 06:36:30'),(128,'dashboard.states','web','2021-10-20 08:40:22','2021-10-20 08:40:22'),(129,'app-settings.setting','web','2021-10-21 06:33:43','2021-10-21 06:33:43'),(130,'app-settings.slider','web','2021-10-21 06:33:54','2021-10-21 06:33:54'),(131,'affiliate.settings','web','2021-11-21 06:33:54','2021-11-22 06:33:54'),(132,'affiliate.history','web','2021-11-21 06:33:57','2021-11-22 06:33:57'),(133,'wallet.settings','web','2021-11-21 06:34:54','2021-11-22 06:34:54'),(134,'wallet.history','web','2021-11-21 06:35:54','2021-11-22 06:35:54'),(135,'media-manager.manage','web','2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plans_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_settings`
--

DROP TABLE IF EXISTS `player_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `player_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_enable` tinyint(1) DEFAULT NULL,
  `cpy_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `share_opt` tinyint(1) DEFAULT NULL,
  `auto_play` tinyint(1) DEFAULT NULL,
  `speed` tinyint(1) DEFAULT NULL,
  `thumbnail` tinyint(1) DEFAULT NULL,
  `info_window` tinyint(1) DEFAULT NULL,
  `skin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loop_video` tinyint(1) DEFAULT NULL,
  `is_resume` tinyint(1) DEFAULT '0',
  `player_google_analytics_id` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_font_size` int DEFAULT NULL,
  `subtitle_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chromecast` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_settings`
--

LOCK TABLES `player_settings` WRITE;
/*!40000 ALTER TABLE `player_settings` DISABLE KEYS */;
INSERT INTO `player_settings` VALUES (1,'logo.png',0,'2022 OOV Media',1,1,NULL,NULL,1,'minimal_skin_dark',1,1,NULL,20,'#5125cb',1,'2022-03-24 02:30:55','2022-03-29 05:37:29');
/*!40000 ALTER TABLE `player_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricing_texts`
--

DROP TABLE IF EXISTS `pricing_texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricing_texts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_id` int NOT NULL,
  `title1` text COLLATE utf8mb4_unicode_ci,
  `title2` text COLLATE utf8mb4_unicode_ci,
  `title3` text COLLATE utf8mb4_unicode_ci,
  `title4` text COLLATE utf8mb4_unicode_ci,
  `title5` text COLLATE utf8mb4_unicode_ci,
  `title6` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing_texts`
--

LOCK TABLES `pricing_texts` WRITE;
/*!40000 ALTER TABLE `pricing_texts` DISABLE KEYS */;
/*!40000 ALTER TABLE `pricing_texts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminder_mails`
--

DROP TABLE IF EXISTS `reminder_mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reminder_mails` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `subscription_id` int unsigned NOT NULL,
  `today` int DEFAULT NULL,
  `before_7day` int DEFAULT NULL,
  `after_7day` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminder_mails`
--

LOCK TABLES `reminder_mails` WRITE;
/*!40000 ALTER TABLE `reminder_mails` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminder_mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(5,2),(6,1),(6,2),(7,1),(7,2),(8,1),(8,2),(9,1),(9,2),(10,1),(10,2),(11,1),(11,2),(12,1),(12,2),(13,1),(13,2),(14,1),(14,2),(15,1),(15,2),(16,1),(16,2),(17,1),(17,2),(18,1),(18,2),(19,1),(19,2),(20,1),(20,2),(21,1),(21,2),(22,1),(22,2),(23,1),(23,2),(24,1),(24,2),(25,1),(25,2),(26,1),(26,2),(27,1),(27,2),(28,1),(28,2),(29,1),(30,1),(31,1),(32,1),(33,1),(33,2),(34,1),(34,2),(35,1),(35,2),(36,1),(36,2),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(42,2),(43,1),(43,2),(44,1),(44,2),(45,1),(45,2),(46,1),(46,2),(47,1),(47,2),(48,1),(48,2),(49,1),(49,2),(50,1),(50,2),(51,1),(51,2),(52,1),(52,2),(53,1),(53,2),(54,1),(54,2),(55,1),(55,2),(56,1),(56,2),(57,1),(57,2),(58,1),(58,2),(59,1),(59,2),(60,1),(60,2),(61,1),(61,2),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(70,2),(71,1),(71,2),(72,1),(72,2),(73,1),(73,2),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','web','2022-03-24 02:30:55','2022-03-24 02:30:55'),(2,'Producer','web','2022-03-24 02:30:55','2022-03-24 02:30:55'),(3,'User','web','2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seasons` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tv_series_id` int unsigned NOT NULL,
  `tmdb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_no` bigint NOT NULL,
  `season_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `is_protect` int NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_url` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seasons_tv_series_id_foreign` (`tv_series_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` text COLLATE utf8mb4_unicode_ci,
  `google` text COLLATE utf8mb4_unicode_ci,
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seos`
--

LOCK TABLES `seos` WRITE;
/*!40000 ALTER TABLE `seos` DISABLE KEYS */;
INSERT INTO `seos` VALUES (1,'{\"en\":\"Next Hour - Movie Tv Show & Video Subscription Portal Cms\"}',NULL,NULL,'{\"en\":\"this ts a next hour\"}','{\"en\":\"OOV merges the power of technology and convenience of internet to bring the best of entertainment to your mobile, laptop and PC. Watch from our unified OTT catalog of 800+ Movies, 20+ Live TV Channels and 200+ TV Shows & Web Series.\"}','{\"en\":\"OOV, OOV Media, Movies, Web Series, Live TV, Hindi Movies, Punjabi  Movies, Bhojpuri Movies, Regional Movies, Bollywood Movies, Hollywood Movies, OTT Platform in Hindi, OTT Platform in Bhojpuri, OTT Platform in Punjabi, Regional OTT Platform, Hindi News Channel, English News Channel\"}',NULL,'2022-03-30 16:20:09');
/*!40000 ALTER TABLE `seos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('6mNYNVT4C2AJhXlg2IV8ci4UM5QohGjZP5V6UHux',NULL,'54.36.149.86','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzVteHVxNHFzVTd6WnBRaU5CN09kR1B2aWJybXZzOVpldGp2dmUwYSI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vb292bWVkaWEuY29tL2d1ZXN0L3R2LXNob3dzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1652909882),('aGH15MJEn0U7dc7LyRrBlmNYfta1kpGj9xrpmX79',NULL,'72.14.199.138','PlayStore-Google','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDhjSkpNOFhmNm95TGNpSWl2bjI5UTh1c051VHlEVXNTbUc1RW5DWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652926863),('bRATiyztQfzaCK5V8njt2qTsGShvrVjPr7R1nEnn',NULL,'72.14.199.132','PlayStore-Google','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibjVpNDFxU3ZsbkpDdGZ2UWJQNkE2b1VKMzlkbHhpQkFuNHVtdzRXTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652883649),('CdM7rXOxOItgOpZ9A9usMMCn5inySyZeZTV1uIew',NULL,'54.36.149.86','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRTZ5enBjWUJOZmM1SXJXQVlzN0pqWmlVVk5vT3VIZlY0VmRKMjhFNCI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vb292bWVkaWEuY29tL2d1ZXN0L3dlYi1zZXJpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1652912410),('JHHFbdzEX7bWJ7IbAtXWBqdlElRLCLCxA5MPpuwP',NULL,'72.14.199.132','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTnlBZktCQ3QyTDdSVTVMMlMzZVdYUWJVVnJsZVpuTW5oMks4dTN4aiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652926891),('KYUT3grqQmblWovIgtNMcchO7mEkjFQpY3ueJ994',NULL,'72.14.199.132','Mozilla/5.0 (X11; Linux i686; rv:93.0) Gecko/20100101 Firefox/93.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibVlMdmxxdXBLS2NudjE2TzlzWnVhV0dubjlwclN5YlFKeURaZTd4MiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652883739),('LVS5m95661KlA2kcgL7J3PbM61qWL9lQEma83Eoj',NULL,'72.14.199.132','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Safari/605.1.15','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWkZ2R3pEU2xTMThWQkZ6SHpVSWZEUjBTaUg3R1dEUGZOMmpEY3NUMCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652926887),('lYlc979PZfCzNyVH0k5cbnDLcKerOeZKE6h1P2Q9',NULL,'51.222.253.17','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiamFtY0lrOExOeFRiQmJZN3UyZkpHUklDeDJsemFBcmI0eWs0bk9LTiI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vd3d3Lm9vdm1lZGlhLmNvbS9ndWVzdC9saXZlLXR2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1652907705),('mrWw5hn12rpv7NA1C876nPxoeMNZN0trl77asGMt',NULL,'72.14.199.135','Mozilla/5.0 (Macintosh; Intel Mac OS X 11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Safari/605.1.15','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNDVYSk51QTJtQ3IxYk5HZGpveEw2SFIxWjR6WmZTWkdUbGw3bE9McSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652883646),('NPW5y3GvVlUDcB57Xwr0uEEbmXViU0i3hCzG1IFE',NULL,'54.36.149.86','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzhNRUZ1VWd4b1NnOEdEUWl6VkFQUXVMSlRmMEM1TmVmNHpuQ00yaSI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vb292bWVkaWEuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1652901477),('R125iqP25ceLlPJS8ZxN4iO1fwn7aLQZRIJqxofQ',NULL,'54.36.149.86','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZVdSZ2hJS2lWYUhhVEFUYTZLekNTSnBzbW9lQk05bWN6cFk2Q1BpciI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vb292bWVkaWEuY29tL2d1ZXN0L2Jsb2ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1652915112),('rWLa6rXKQnjpTgnUtMwp2fnuMgEgX2OiynzrRhy1',NULL,'51.222.253.7','Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmphVVFlR05xZGswakFPTGZwNmNRbXIxem1tR0x0dzZQMGJvcGkwViI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd3d3Lm9vdm1lZGlhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1652904385),('vi2jeNQKcmM2LP75VnpuzbrZCmrsjxV2Ra5JZ6tI',NULL,'185.150.86.2','Mozilla/5.0 (Windows NT 6.1; rv:38.0) Gecko/20100101 Firefox/38.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUhIdVhGUXB0T2NZTDl5Rm8yVWVWZ25FeTRIakhLMm9TOGZxTTFSZCI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHBzOi8vb292bWVkaWEuY29tL21vdmllL2d1ZXN0L2RldGFpbC9kb3JhX2FuZF90aGVfbG9zdF9jaXR5X29mX2dvbGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1652884411),('vwGLHQOqlCUoHYeMv9fEA2VSzoGK8xOsUZYeM6cQ',NULL,'72.14.199.138','PlayStore-Google','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNFBvWWdPWTBzWFFKUTlRZHNEekQzMTE0Y3g5aE9oRFNNUWpQZENINCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652885192),('WIPFsvFn1sgJA3zSkD15eCqGPo824fHPdHfukAB5',NULL,'207.46.13.111','Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUtHek5aaXJETGVYUjE3YnNoTGdqM0ZwMkZadTJyeDRNd3c4Tnp0cCI7czoxNjoiY2hhbmdlZF9sYW5ndWFnZSI7czoyOiJlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vb292bWVkaWEuY29tL2d1ZXN0L2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1652905236),('xkk8yvVkiBGvhjMvHAShn6bmCN3g9iHjjhBMzW01',NULL,'72.14.199.138','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNGtLVWswTWlzbUpxeUxrdDAySHBOTlJtMmpHZk54aGtTQ2ZKWlRDcCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652883669),('xvQPHWCe4ZtvmhDTh187rCXoESYHTpBqcyGui2Rf',NULL,'72.14.199.132','Mozilla/5.0 (X11; Linux i686; rv:93.0) Gecko/20100101 Firefox/93.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRFNTdUcyc2toRE02eUV6R1hxbEJLVERxd3NrZGFPNTdqOXVOcGJWYiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9vb3ZtZWRpYS5jb20vcHJpdmFjeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL29vdm1lZGlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTY6ImNoYW5nZWRfbGFuZ3VhZ2UiO3M6MjoiZW4iO30=',1652926883);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_icons`
--

DROP TABLE IF EXISTS `social_icons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_icons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_icons`
--

LOCK TABLES `social_icons` WRITE;
/*!40000 ALTER TABLE `social_icons` DISABLE KEYS */;
INSERT INTO `social_icons` VALUES (1,'#','#','#','2022-03-24 02:30:55','2022-03-24 02:30:55');
/*!40000 ALTER TABLE `social_icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `splash_screens`
--

DROP TABLE IF EXISTS `splash_screens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `splash_screens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_enable` tinyint(1) NOT NULL DEFAULT '1',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `splash_screens`
--

LOCK TABLES `splash_screens` WRITE;
/*!40000 ALTER TABLE `splash_screens` DISABLE KEYS */;
/*!40000 ALTER TABLE `splash_screens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcomments`
--

DROP TABLE IF EXISTS `subcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcomments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `blog_id` int NOT NULL,
  `comment_id` int NOT NULL,
  `reply` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcomments`
--

LOCK TABLES `subcomments` WRITE;
/*!40000 ALTER TABLE `subcomments` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint unsigned NOT NULL,
  `stripe_id` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  KEY `subscription_items_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_items`
--

LOCK TABLES `subscription_items` WRITE;
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `subscription_from` timestamp NULL DEFAULT NULL,
  `subscription_to` timestamp NULL DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subtitles`
--

DROP TABLE IF EXISTS `subtitles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subtitles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sub_lang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_t` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_t_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ep_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subtitles`
--

LOCK TABLES `subtitles` WRITE;
/*!40000 ALTER TABLE `subtitles` DISABLE KEYS */;
/*!40000 ALTER TABLE `subtitles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_histories`
--

DROP TABLE IF EXISTS `time_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `time_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `movie_id` int DEFAULT NULL,
  `tv_id` int DEFAULT NULL,
  `episode_id` int DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_histories`
--

LOCK TABLES `time_histories` WRITE;
/*!40000 ALTER TABLE `time_histories` DISABLE KEYS */;
INSERT INTO `time_histories` VALUES (1,1,7,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_7/time.json','2022-03-29 05:30:50','2022-03-29 05:30:50'),(2,1,8,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_8/time.json','2022-03-29 06:01:05','2022-03-29 06:01:05'),(3,1,9,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_9/time.json','2022-03-29 11:12:16','2022-03-29 11:12:16'),(4,1,5,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_5/time.json','2022-03-29 11:52:13','2022-03-29 11:52:13'),(5,1,12,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_12/time.json','2022-03-31 03:58:48','2022-03-31 03:58:48'),(6,1,13,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_13/time.json','2022-03-31 08:13:01','2022-03-31 08:13:01'),(7,1,16,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_16/time.json','2022-03-31 08:53:09','2022-03-31 08:53:09'),(8,1,17,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_17/time.json','2022-03-31 09:06:29','2022-03-31 09:06:29'),(9,1,15,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_15/time.json','2022-03-31 09:11:11','2022-03-31 09:11:11'),(10,1,14,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_14/time.json','2022-03-31 09:38:40','2022-03-31 09:38:40'),(11,8,16,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_8/movie_16/time.json','2022-03-31 10:02:01','2022-03-31 10:02:01'),(12,5,7,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_5/movie_7/time.json','2022-03-31 11:50:22','2022-03-31 11:50:22'),(13,1,18,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_18/time.json','2022-03-31 12:33:35','2022-03-31 12:33:35'),(14,1,20,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_20/time.json','2022-03-31 13:57:55','2022-03-31 13:57:55'),(15,1,19,NULL,NULL,'http://oovmedia.starpankaj.com/storage/app/time/movie/user_1/movie_19/time.json','2022-03-31 15:39:02','2022-03-31 15:39:02'),(16,3,19,NULL,NULL,'http://oovmedia.starpankaj.com/storage/app/time/movie/user_3/movie_19/time.json','2022-03-31 16:10:51','2022-03-31 16:10:51'),(17,3,16,NULL,NULL,'http://oovmedia.starpankaj.com/storage/app/time/movie/user_3/movie_16/time.json','2022-03-31 16:41:53','2022-03-31 16:41:53'),(18,15,16,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_15/movie_16/time.json','2022-04-12 16:52:23','2022-04-12 16:52:23'),(19,15,19,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_15/movie_19/time.json','2022-04-15 18:06:26','2022-04-15 18:06:26'),(20,3,7,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_3/movie_7/time.json','2022-04-21 16:32:23','2022-04-21 16:32:23'),(21,17,7,NULL,NULL,'https://oovmedia.starpankaj.com/storage/app/time/movie/user_17/movie_7/time.json','2022-04-25 14:39:14','2022-04-25 14:39:14'),(22,3,9,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_3/movie_9/time.json','2022-04-26 06:47:58','2022-04-26 06:47:58'),(23,19,7,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_19/movie_7/time.json','2022-04-29 09:00:33','2022-04-29 09:00:33'),(24,32,7,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_32/movie_7/time.json','2022-05-06 14:34:15','2022-05-06 14:34:15'),(25,5,9,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_5/movie_9/time.json','2022-05-18 04:40:31','2022-05-18 04:40:31'),(26,5,16,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_5/movie_16/time.json','2022-05-18 04:44:32','2022-05-18 04:44:32'),(27,5,17,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_5/movie_17/time.json','2022-05-18 04:49:48','2022-05-18 04:49:48'),(28,5,21,NULL,NULL,'https://oovmedia.com/storage/app/time/movie/user_5/movie_21/time.json','2022-05-18 04:50:07','2022-05-18 04:50:07');
/*!40000 ALTER TABLE `time_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int unsigned NOT NULL,
  `group` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tv_series`
--

DROP TABLE IF EXISTS `tv_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tv_series` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmdb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fetch_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `rating` double(8,2) DEFAULT NULL,
  `episode_runtime` double(8,2) DEFAULT NULL,
  `maturity_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'T',
  `status` int unsigned NOT NULL DEFAULT '1',
  `created_by` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_custom_label` tinyint(1) NOT NULL DEFAULT '0',
  `label_id` int DEFAULT NULL,
  `is_upcoming` tinyint(1) NOT NULL DEFAULT '0',
  `upcoming_date` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_series`
--

LOCK TABLES `tv_series` WRITE;
/*!40000 ALTER TABLE `tv_series` DISABLE KEYS */;
/*!40000 ALTER TABLE `tv_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ratings`
--

DROP TABLE IF EXISTS `user_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `tv_id` int DEFAULT NULL,
  `movie_id` int DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ratings`
--

LOCK TABLES `user_ratings` WRITE;
/*!40000 ALTER TABLE `user_ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_wallet_histories`
--

DROP TABLE IF EXISTS `user_wallet_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_wallet_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wallet_id` int unsigned NOT NULL,
  `type` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `expired` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_wallet_histories`
--

LOCK TABLES `user_wallet_histories` WRITE;
/*!40000 ALTER TABLE `user_wallet_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_wallet_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_wallets`
--

DROP TABLE IF EXISTS `user_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `balance` double DEFAULT '0',
  `status` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_wallets`
--

LOCK TABLES `user_wallets` WRITE;
/*!40000 ALTER TABLE `user_wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifyToken` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gitlab_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int DEFAULT '0',
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `braintree_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_assistant` int unsigned NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blocked` tinyint(1) DEFAULT '0',
  `amazon_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `google2fa_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT '0',
  `refer_code` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refered_from` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `google_id` (`google_id`),
  UNIQUE KEY `facebook_id` (`facebook_id`),
  UNIQUE KEY `gitlab_id` (`gitlab_id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `amazon_id` (`amazon_id`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'OOV Admin','user_1648527265favicon.png','info.oovmedia@gmail.com',NULL,1,'$2y$10$rhQX94cI2RYMeP8isEsrJOgxPdx7kfN49Kh5.XsXrTnWse0FUGY0m',NULL,NULL,NULL,'1974-09-12',47,NULL,NULL,NULL,1,0,'sTbtPIHbfBTol1UGS8I1rXqCVu9REFalhpusJhdAujG8uSfCpZQ91SnPIoiJ',0,NULL,'2022-03-24 02:30:55','2022-03-31 08:12:50',NULL,NULL,NULL,NULL,NULL,0,'SNLCPJ',NULL,NULL,NULL,NULL),(2,'star26',NULL,'star26@gmail.com','nzitMO344Ge9lUsLB7oKS1HC2caWAuKde424f0bC',1,'$2y$10$3uAruF5Q/TsvxDrh45HwUu5pir04HrdJKSz8LDoCLWDIIVXGZx3za',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-03-29 04:17:31','2022-03-29 04:17:31',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(3,'suhana77','user_1648701379208772151_4608022315888629_3952217979062498055_n - Copy.jpg','suhana77@yopmail.com','uR3POUDCAclSTpFaA5P01Ra1qy0iI2Jo4sOgj310',1,'$2y$10$kW90eldi9n94IF/xEdQVH.Z1oNXks0c1j/WJNTjs0qGtTCxFfXPwW',NULL,NULL,NULL,NULL,0,'7025635820',NULL,NULL,0,0,'OFPxY5y1ureh53WBJbDl2pcsXmvSqRdIpcczLW4IbjeW9nNM881swodmFpiF',0,NULL,'2022-03-31 04:33:35','2022-04-01 23:00:11',NULL,NULL,NULL,NULL,NULL,0,'VQCKQD',NULL,NULL,NULL,NULL),(4,'diyanshu26',NULL,'diyanshu26@yopmail.com','gqhHbKhvecU91O39PqHZJ1oxS7Fn2upLTtYuftNV',1,'$2y$10$cTiXJE3HQsPI6PUPplojHempopnEuRr8iBk5eyQeoTOF5QfY0pEs2',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-03-31 04:43:10','2022-03-31 04:43:10',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(5,'acdrsunny',NULL,'acdrsunny@gmail.com','GmA5qjpYns3C7ipzJAhTnHgu0ICPk4UXqM609Biu',1,'$2y$10$uaPTFiUYwwZfucNCNwmM3./.P0jaBLLE8NqzTKViz26cuRFSdInfm',NULL,NULL,NULL,'1988-06-18',33,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-03-31 04:49:09','2022-05-18 04:45:06',NULL,NULL,NULL,NULL,NULL,0,'ZDNSG7',NULL,NULL,NULL,NULL),(6,'mihir_godda',NULL,'mihir_godda@yopmail.com','TVoR5gFcwBg7Epcu5HqIrXsZesqDCa2JF2WNH16H',1,'$2y$10$QpwKpm7Ix1OmB3eP1bnnsewld9GJAgCCG7aIKWjifaXoInEi5FcJK',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-03-31 06:50:53','2022-03-31 06:52:17',NULL,NULL,NULL,NULL,NULL,0,'XEDQOK',NULL,NULL,NULL,NULL),(7,'archu999',NULL,'archu.shukla261@gmail.com','aoCaNcCha1HUAkhwpOTsCg7GPu9PzPjSuUUg0xJe',1,'$2y$10$IfK9nXwr2Pad7mHW/nIDZ.z8z80/hJp1.YW3OMaCR9PatO9IBs2Hu',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-03-31 09:51:06','2022-03-31 09:54:25',NULL,NULL,NULL,NULL,NULL,0,'NO8ULW',NULL,NULL,NULL,NULL),(8,'sadhna77',NULL,'sadhna77@yopmail.com','flt30IwvnG74uD3mWt6muzbiAdx1JMnUr31BilPa',1,'$2y$10$c9dZskyBB19WdcoKX175me9cu/GTnC41I9XYIAVZJXZfi2S2NWi62',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-03-31 09:57:26','2022-03-31 10:02:25',NULL,NULL,NULL,NULL,NULL,0,'RIPXWM',NULL,NULL,NULL,NULL),(9,'john22',NULL,'john22@gmail.com','GWSeaJpjnZwRuNBxsJHMvVStqTmnSQPz77sIu213',1,'$2y$10$ufcBXNVcArdM39xwFmqwy.gH9wD38A6bRuQpfYn/XWdN/l/RdNxNS',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-02 15:37:28','2022-04-02 15:37:28',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(10,'suhana78','user_1649094534Gruppl.com.jpg','suhana78@yopmail.com','lkFXqpVOJT7IDK4xa6IF9Hn19zAO48makVQXmkoQ',1,'$2y$10$nM7JghdmQ0Qg/wtV07k/te8Qjl3.M/waupyaABXrVEhaas0qoAyMi',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-04 17:31:10','2022-04-04 17:48:54',NULL,NULL,NULL,NULL,NULL,0,'1IFHNF',NULL,NULL,NULL,NULL),(11,'aarav',NULL,'aarav@gmail.com','hM6Af1hAVE7JpGOCudBPiHDkgLEt4Kw1W7lPAfIF',1,'$2y$10$g/K4FMOgLIF0uDDBX3Wb7eEsjf9VMcZl2Spo5nzYhHFsgoVpYc2Im',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-05 05:42:40','2022-04-05 06:10:57',NULL,NULL,NULL,NULL,NULL,0,'H25EXV',NULL,NULL,NULL,NULL),(12,'prtdev',NULL,'prt.ofc111@gmail.com','VgBHBZkujhPz5i0vs3n5MN87S4zO1se6MkrNlYiR',1,'$2y$10$FZsISjjeYCd5lgQJJbFo8e.SzSeUyyhUZurbyabYOLXgXtSErW6/G',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-07 07:01:13','2022-04-07 07:01:28',NULL,NULL,NULL,NULL,NULL,0,'5K2TIY',NULL,NULL,NULL,NULL),(13,'oov',NULL,'oov@yopmail.com','IW9izPzERK8roej0gV7yDcoWvjTh474xdh01Rf4Y',1,'$2y$10$45due0jvInxScNSVeISq3eIwWBTinyjUWyjgIfnDBoM3rJV8oUI7K',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-07 07:48:43','2022-04-07 07:51:27',NULL,NULL,NULL,NULL,NULL,0,'RC9JKF',NULL,NULL,NULL,NULL),(14,'suhana88',NULL,'suhana88@yopmail.com','wjIh0hVs8bpeNX3iOyIVAypk9iXxdlSe5thmE7e3',1,'$2y$10$4SJWJ2i2diwAErvAKxSLFO2kzpOEjhCtNvZePcRd.u3M5saQgOKhu',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-07 08:15:41','2022-04-07 08:24:56',NULL,NULL,NULL,NULL,NULL,0,'GEMOSA',NULL,NULL,NULL,NULL),(15,'suhana99',NULL,'suhana99@yopmail.com','hBJyVLkQkCRo3ueh8GvRdZdsSj6KeKnml5b57nDp',1,'$2y$10$cuafjTKkW4Ue98RgfzcWjO4r.LFPPNUCR8XZApWPRXUj4ZdgAV8KO',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,'VlPTiVF5BQak6AdIKNWStD7dXqIGx6vNYa8NZFnXmSow4QhihzDCpkCXyPYx',0,NULL,'2022-04-11 13:26:35','2022-04-11 13:26:35',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(16,'demouser','user_1649836928208772151_4608022315888629_3952217979062498055_n - Copy.jpg','demouser@gmail.com','FXJHGRobhFwnHB1P6ZpBdhlXteuqiePobN263xY5',1,'$2y$10$8.h9jxH3ek5TAyyBmeo2munBQlURZzaHFV2woiVO7skwhU6iteZ/C',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-13 07:58:20','2022-04-13 08:02:09',NULL,NULL,NULL,NULL,NULL,0,'WZFIDR',NULL,NULL,NULL,NULL),(17,'Anil 100',NULL,'anil.music100@gmail.com','FuwLlWPxAS87l1N0MTUpbTCLSVam42PhtygZpUGw',1,'$2y$10$aQv6YrtgJwvZ8ltPGQ123O..Xuh0PsjSEbylQqdT2.vySLN8Ye6SO',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,'K7yrakNMfxWk9GO7xvcs4vVoSo9F51u5Zsk23COzUrAAp1IcneMyGJp3HSok',0,NULL,'2022-04-21 14:25:57','2022-04-28 14:48:17',NULL,NULL,NULL,NULL,NULL,0,'MBSYRW',NULL,NULL,NULL,NULL),(18,'anil200',NULL,'anil200@gmail.com','vmJurn2g1YlqCCFbHrWqOz3e5ZsnkqoOgQHHanzh',1,'$2y$10$9q2WZhbRQYJoiZJQibEpMusmbZlzKbtNREDSsiZYNlGFik6s78bSW',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-21 14:26:18','2022-04-21 14:26:18',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(19,'Kartik Malhotra',NULL,'kartikmalhotra297@gmail.com','uyGenuklBNlJp8oBO8cGEZxmx6yDczLgb9g2siVp',1,'$2y$10$xNaLqTsDm.xqcjeDPWqdyeUISiQMxkfRf7LePotNjoHnVcFwrQ78u',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,'04GLKZSW1DHsFjQCz8QpVb4yIWJvSXJh8NBdiVvvtg60JoPPzfgHTfUOMyQe',0,NULL,'2022-04-29 08:26:29','2022-04-29 08:47:30',NULL,NULL,NULL,NULL,NULL,0,'Q9D4QU',NULL,NULL,NULL,NULL),(20,'star4545',NULL,'star4545@yopmail.com','8tAxujJ1fJtr563q2EX7e5Z4cwh0BFAVhshNtpVE',1,'$2y$10$3dmnCxqEnEgAhHPoIkW.L.1ozpjdwNNUy.eSgPRKOAYo2M3L1mq/S',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-29 08:47:16','2022-04-29 08:48:18',NULL,NULL,NULL,NULL,NULL,0,'RK62CO',NULL,NULL,NULL,NULL),(21,'Ankithaakurr',NULL,'Ankitthaakurr@gmail.com','Ast9X02cdgbgroGtEQA2qA3m5OK0rKg90hSWF5SR',1,'$2y$10$LHMcJzA/LHj.Hr7lMGtpn.pomI3LSRw7WpttA4q6MBcPsEmHzVg8.',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-29 09:05:21','2022-04-29 09:05:21',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(22,'Ashish Agarwal',NULL,'ashish870780@gmail.com','VNLfGPsuaNMZSAE2XxhtU2X99Mt0pc0FrfQYQ7nv',1,'$2y$10$gxCDZx2jTmPvWTnbOq34auVBovkYJtTjDXn6Z5NOqdgxxux0TbXqu',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-04-30 15:19:43','2022-04-30 15:19:43',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(23,'Rajesh Tiwari',NULL,'mamta.tiwari983974@gmail.com','qG98YArf30zpIBejRWwtCVEvO6BDOL4hDqFXWa9n',1,'$2y$10$XQ15kVYPqVOK/wltC3mFROcLr0qopWPo/saCp31ZcmsGt90X.1A0O',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-02 04:30:13','2022-05-02 04:30:13',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(24,'Nirmal',NULL,'99paramjyoti@gmail.com','hbiNlv01LyNU9iAGtpeCRp4rVmxXSu1CMwisIZWT',1,'$2y$10$Ih4P/pLTOJOgRUvnrOpVoucasgfYgNjKiaxjlbf1wba0z3I16flr2',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-04 03:54:12','2022-05-04 03:54:12',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(25,'Anupam',NULL,'anupampandey2412@gmail.com','s7nlhIlqRfwjxDffockbB9CCg4UUMCIWTKUz3k15',1,'$2y$10$BmZyN7UVQHpODYZMNcFele0rwcC6BxZG.Fj51c1CL763t3HUf50VO',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-05 14:59:12','2022-05-05 15:02:01',NULL,NULL,NULL,NULL,NULL,0,'JHGJCF',NULL,NULL,NULL,NULL),(26,'Rahesh',NULL,'rajeshyadav5070@gmail.com','HXwRAHHD0xnRxiZ3z25rbgPmb60y5tgxDuStMz77',1,'$2y$10$8gXBTpWGD3Tei9RhT8oxlO5miL4iQbsmGae1Q8wFiNTiTsnU4ltHm',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-05 15:01:25','2022-05-05 15:01:25',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(27,'star22',NULL,'star22@gmail.com','2YnJF22SlBb4ELTzWZFOljs5a1kpvkyUWaBFi91y',1,'$2y$10$OWf53UJby7YQPdVB9j7vgeqbwJbOPLKPY1sc9Aby1/nC4d9zN7AvG',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-05 15:11:00','2022-05-05 15:11:00',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(28,'sonamgupta252',NULL,'sonam@gmail.com','4VYXTbybWJFl8ErE6ZCySDoyTgYEQResz0rDVEN7',1,'$2y$10$pLlza5FPSsJ3hy2crYu83.2LNPezzMOk1i1g3lVzz2Z8BCeWJkyee',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-06 09:29:54','2022-05-06 09:29:54',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(29,'Dilruba',NULL,'Dilruba@ymail.com','NLK7Ddc2JMz3Xjproq3BoXNRm7V2f8JdRXaDpvFN',1,'$2y$10$JtHLr5ZcmkwnLyhsJk.aHuHkiwgzRvYPzhXf28YoWlug/Emlo6CNi',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-06 09:44:09','2022-05-06 10:43:38',NULL,NULL,NULL,NULL,NULL,0,'1EYRMH',NULL,NULL,NULL,NULL),(30,'subham',NULL,'subham@gmail.com','Eykh32ZkYTwDM6dXFeFoIxPQa0ylg9afmeeQvVaP',1,'$2y$10$gfmF286MCXEoA9jrcC.JH.gNGJQeKzaNJXtaA7yo1KCb5IN8VMRgq',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-06 10:53:15','2022-05-06 10:53:15',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(31,'Hffgh',NULL,'Gfcgh@gmail.com','zyfN6Z5GLdjiREfMRm5sZdsloRLgtPSnyv8mLwWQ',1,'$2y$10$Va3ZVlAgDu/lP1fbmXvBOuuuOLiBY5XGVAfBOgb3P.2zninDa8Elu',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-06 12:52:31','2022-05-06 12:52:31',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(32,'Sweety Malhotra',NULL,'sweetymalhotra3@gmail.com','1sRtzKIqnE1dZN2Ma3qyZTf75KpWQuwbejLDMSaX',1,'$2y$10$b311HS/KcbgNgDsDVTxqc.pCtDaNYuhoHroiv5agD96hDHi0XYDpG',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-06 14:28:41','2022-05-06 14:28:41',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(33,'Ganga Sagar',NULL,'gangasagar0405@gmail.com','d9ehLUPeS7Qy1WpVouFeOf6zwYImSU3Nd6QZZDw2',1,'$2y$10$td3wB7WeZaJ7ezfAtl4UkOGPtnMfkoLnIIl9aRupSTdfIjg7StbpC',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-07 07:39:57','2022-05-07 07:39:57',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(34,'Ashu',NULL,'anilmalhotra1976@hotmail.com','MaiAvRVlXasEdT1zHpFse7jlI0QtnjffkDbIPwVq',1,'$2y$10$1j0kLFj/NYcJ4e1tPush4.AoEHofUvH3TvLICAlJbJxDZnBCIVL3u',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,0,NULL,0,NULL,'2022-05-07 14:09:58','2022-05-07 14:09:58',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videolinks`
--

DROP TABLE IF EXISTS `videolinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videolinks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int unsigned DEFAULT NULL,
  `episode_id` int unsigned DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframeurl` text COLLATE utf8mb4_unicode_ci,
  `ready_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_360` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_480` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_720` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_1080` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `upload_video` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `videolinks_movie_id_foreign` (`movie_id`),
  KEY `videolinks_episode_id_foreign` (`episode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videolinks`
--

LOCK TABLES `videolinks` WRITE;
/*!40000 ALTER TABLE `videolinks` DISABLE KEYS */;
INSERT INTO `videolinks` VALUES (7,7,NULL,'readyurl',NULL,'https://aajtaklive-amd.akamaized.net/hls/live/2014416/aajtak/aajtaklive/aajtak_5/chunklist.m3u8',NULL,NULL,NULL,NULL,'2022-03-29 05:28:09','2022-03-29 05:28:09',NULL),(9,9,NULL,'readyurl',NULL,'https://cnbcawaaz-lh.akamaihd.net/i/cnbcawaaz_1@174872/index_5_av-p.m3u8',NULL,NULL,NULL,NULL,'2022-03-29 06:03:59','2022-03-29 06:03:59',NULL),(12,12,NULL,'iframeurl',NULL,NULL,NULL,NULL,NULL,NULL,'2022-03-31 03:56:57','2022-03-31 03:58:25',NULL),(13,13,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=PLl99DlL6b4',NULL,NULL,NULL,NULL,'2022-03-31 08:11:31','2022-03-31 08:11:31',NULL),(14,14,NULL,'iframeurl','https://www.youtube.com/watch?v=CaimKeDcudo',NULL,NULL,NULL,NULL,NULL,'2022-03-31 08:19:05','2022-03-31 08:19:05',NULL),(15,15,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=ApXoWvfEYVU',NULL,NULL,NULL,NULL,'2022-03-31 08:42:47','2022-03-31 08:42:47',NULL),(16,16,NULL,'iframeurl','https://www.youtube.com/watch?v=pRpeEdMmmQ0',NULL,NULL,NULL,NULL,NULL,'2022-03-31 08:51:43','2022-03-31 08:51:43',NULL),(17,17,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=rJmUFxrOU64',NULL,NULL,NULL,NULL,'2022-03-31 09:02:49','2022-03-31 09:02:49',NULL),(18,18,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=dZRqB0JLizw',NULL,NULL,NULL,NULL,'2022-03-31 12:32:32','2022-03-31 12:32:32',NULL),(19,19,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=-D7U-WhqU2M',NULL,NULL,NULL,NULL,'2022-03-31 12:58:58','2022-03-31 12:58:58',NULL),(20,20,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=NrR-iHyxJlE',NULL,NULL,NULL,NULL,'2022-03-31 13:22:18','2022-03-31 13:22:18',NULL),(21,21,NULL,'readyurl',NULL,'https://www.youtube.com/watch?v=gLs3qQU7eug',NULL,NULL,NULL,NULL,'2022-03-31 15:50:38','2022-03-31 15:50:38',NULL);
/*!40000 ALTER TABLE `videolinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `views` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `viewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint unsigned NOT NULL,
  `visitor` text COLLATE utf8mb4_unicode_ci,
  `collection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=747 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `views`
--

LOCK TABLES `views` WRITE;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
INSERT INTO `views` VALUES (42,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 05:28:24'),(43,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 05:33:36'),(44,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 05:34:06'),(45,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 05:34:47'),(46,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 05:35:40'),(47,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 05:35:59'),(52,'App\\Movie',9,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 11:12:08'),(53,'App\\Movie',7,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-29 11:12:30'),(92,'App\\Movie',12,'JGFVfm3v1VtiqnvbCzq6yCjTcoSiwUT7gmCFSmXR9SwOccIyRDJxNnIClwvwU6LAU3edYUMb8OuXrFhg',NULL,'2022-03-31 03:57:10'),(93,'App\\Movie',12,'JGFVfm3v1VtiqnvbCzq6yCjTcoSiwUT7gmCFSmXR9SwOccIyRDJxNnIClwvwU6LAU3edYUMb8OuXrFhg',NULL,'2022-03-31 03:58:34'),(94,'App\\Movie',12,'JGFVfm3v1VtiqnvbCzq6yCjTcoSiwUT7gmCFSmXR9SwOccIyRDJxNnIClwvwU6LAU3edYUMb8OuXrFhg',NULL,'2022-03-31 03:58:59'),(95,'App\\Movie',12,'JGFVfm3v1VtiqnvbCzq6yCjTcoSiwUT7gmCFSmXR9SwOccIyRDJxNnIClwvwU6LAU3edYUMb8OuXrFhg',NULL,'2022-03-31 04:00:24'),(96,'App\\Movie',12,'JGFVfm3v1VtiqnvbCzq6yCjTcoSiwUT7gmCFSmXR9SwOccIyRDJxNnIClwvwU6LAU3edYUMb8OuXrFhg',NULL,'2022-03-31 04:01:39'),(97,'App\\Movie',12,'ZtWAwXxXv4QNHkQxQddNS5VyzJVZnfX1uooACvrF6y67pMGSFz3Lus1IdUKS3taMqrhyg67Lnurd2j36',NULL,'2022-03-31 04:19:22'),(98,'App\\Movie',12,'ZtWAwXxXv4QNHkQxQddNS5VyzJVZnfX1uooACvrF6y67pMGSFz3Lus1IdUKS3taMqrhyg67Lnurd2j36',NULL,'2022-03-31 04:20:23'),(99,'App\\Movie',12,'ZtWAwXxXv4QNHkQxQddNS5VyzJVZnfX1uooACvrF6y67pMGSFz3Lus1IdUKS3taMqrhyg67Lnurd2j36',NULL,'2022-03-31 04:23:29'),(100,'App\\Movie',12,'JGFVfm3v1VtiqnvbCzq6yCjTcoSiwUT7gmCFSmXR9SwOccIyRDJxNnIClwvwU6LAU3edYUMb8OuXrFhg',NULL,'2022-03-31 04:25:26'),(101,'App\\Movie',12,'ZtWAwXxXv4QNHkQxQddNS5VyzJVZnfX1uooACvrF6y67pMGSFz3Lus1IdUKS3taMqrhyg67Lnurd2j36',NULL,'2022-03-31 06:51:45'),(102,'App\\Movie',13,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 08:11:47'),(103,'App\\Movie',13,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 08:12:51'),(104,'App\\Movie',15,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 08:44:01'),(105,'App\\Movie',15,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 08:45:42'),(106,'App\\Movie',16,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 08:52:46'),(107,'App\\Movie',12,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 08:53:32'),(108,'App\\Movie',17,'CDEiRt5eILp7KbPcQeIHPB0hfBEXhjXwX7d6mYUKdl9GuhiOyd6AIEFJMPdKC1x0vYAX3Y2HCO5lzp99',NULL,'2022-03-31 09:07:21'),(109,'App\\Movie',13,'CDEiRt5eILp7KbPcQeIHPB0hfBEXhjXwX7d6mYUKdl9GuhiOyd6AIEFJMPdKC1x0vYAX3Y2HCO5lzp99',NULL,'2022-03-31 09:07:44'),(110,'App\\Movie',17,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 09:28:18'),(111,'App\\Movie',16,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 09:35:19'),(112,'App\\Movie',14,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 09:38:29'),(113,'App\\Movie',17,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 09:47:00'),(114,'App\\Movie',16,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 10:01:51'),(115,'App\\Movie',15,'9euuNttwZT5OGmxQMYXFcDvH12xheZWCXLITkXxOdWnGZKG7WEdPh8DesBwArGHxdl0InGcLVDvMLID2',NULL,'2022-03-31 10:05:16'),(116,'App\\Movie',17,'CDEiRt5eILp7KbPcQeIHPB0hfBEXhjXwX7d6mYUKdl9GuhiOyd6AIEFJMPdKC1x0vYAX3Y2HCO5lzp99',NULL,'2022-03-31 10:07:44'),(117,'App\\Movie',13,'CDEiRt5eILp7KbPcQeIHPB0hfBEXhjXwX7d6mYUKdl9GuhiOyd6AIEFJMPdKC1x0vYAX3Y2HCO5lzp99',NULL,'2022-03-31 10:08:06'),(118,'App\\Movie',18,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 12:33:07'),(119,'App\\Movie',12,'CDEiRt5eILp7KbPcQeIHPB0hfBEXhjXwX7d6mYUKdl9GuhiOyd6AIEFJMPdKC1x0vYAX3Y2HCO5lzp99',NULL,'2022-03-31 12:44:32'),(120,'App\\Movie',19,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 13:07:12'),(121,'App\\Movie',19,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 13:08:17'),(122,'App\\Movie',20,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 13:23:05'),(123,'App\\Movie',19,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 13:56:24'),(124,'App\\Movie',20,'x8PRQHiYWX0SlIFfgx7ki6OCH1WyA7SVcLXw47lO8jzp8ZwoO37ju1Vmf7RaJ0ZNHodIBguY2oWCPMoo',NULL,'2022-03-31 13:57:42'),(125,'App\\Movie',17,'H1UMkRI3vj1niSoN5Re6MUxW88Ybnr82G92UfWu7rW3gKOMaHX63UA0NKsJmV9JbM74jZoGneN5wGiCZ',NULL,'2022-03-31 14:33:54'),(126,'App\\Movie',17,'H1UMkRI3vj1niSoN5Re6MUxW88Ybnr82G92UfWu7rW3gKOMaHX63UA0NKsJmV9JbM74jZoGneN5wGiCZ',NULL,'2022-03-31 14:33:56'),(127,'App\\Movie',19,'Gsdq3OQGAHwKXQGC61JpZyWYvcbBflGrUNHZ8GlLFpG2yNAoAzx78jSLkPsmqeu9uzsQdRvY7YQaaqf9',NULL,'2022-03-31 14:35:36'),(128,'App\\Movie',19,'Gsdq3OQGAHwKXQGC61JpZyWYvcbBflGrUNHZ8GlLFpG2yNAoAzx78jSLkPsmqeu9uzsQdRvY7YQaaqf9',NULL,'2022-03-31 14:35:43'),(129,'App\\Movie',19,'Gsdq3OQGAHwKXQGC61JpZyWYvcbBflGrUNHZ8GlLFpG2yNAoAzx78jSLkPsmqeu9uzsQdRvY7YQaaqf9',NULL,'2022-03-31 14:37:53'),(130,'App\\Movie',7,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 15:29:28'),(131,'App\\Movie',7,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 15:29:34'),(132,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 15:32:11'),(133,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:34:04'),(134,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:38:38'),(135,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 15:47:47'),(136,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 15:48:21'),(137,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:51:44'),(138,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 15:52:57'),(139,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:54:25'),(140,'App\\Movie',18,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:55:55'),(141,'App\\Movie',15,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:56:42'),(142,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 15:57:01'),(143,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 15:57:48'),(144,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 15:58:13'),(145,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 15:58:48'),(146,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:00:07'),(147,'App\\Movie',14,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:00:23'),(148,'App\\Movie',15,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:01:28'),(149,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:01:49'),(150,'App\\Movie',16,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:01:58'),(151,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:02:36'),(152,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:03:16'),(153,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:03:39'),(154,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:04:02'),(155,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:04:03'),(156,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:04:03'),(157,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:04:03'),(158,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:04:03'),(159,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:04:19'),(160,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:09:58'),(161,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:18:45'),(162,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:22:28'),(163,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 16:25:37'),(164,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 16:25:55'),(165,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:25:56'),(166,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:26:26'),(167,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:32:19'),(168,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:32:32'),(169,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:34:08'),(170,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:35:32'),(171,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:36:25'),(172,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:37:17'),(173,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:38:00'),(174,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:38:14'),(175,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:40:38'),(176,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:40:43'),(177,'App\\Movie',16,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-03-31 16:42:03'),(178,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-03-31 16:43:13'),(179,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 17:03:40'),(180,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 17:03:50'),(181,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 17:04:06'),(182,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-03-31 17:05:38'),(183,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:09:28'),(184,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:09:55'),(185,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:09:57'),(186,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:09:57'),(187,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:09:58'),(188,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:09:59'),(189,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:00'),(190,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:02'),(191,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:05'),(192,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:06'),(193,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:08'),(194,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:11'),(195,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:10:14'),(196,'App\\Movie',17,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:23:15'),(197,'App\\Movie',17,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 00:24:41'),(198,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 05:20:30'),(199,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 05:41:34'),(200,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 05:41:48'),(201,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 05:47:59'),(202,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 05:48:21'),(203,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 05:49:21'),(204,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 05:55:43'),(205,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 06:07:47'),(206,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 06:23:48'),(207,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 06:24:08'),(208,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:03:48'),(209,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:05:22'),(210,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:05:36'),(211,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:02'),(212,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:02'),(213,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:02'),(214,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:03'),(215,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:03'),(216,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:03'),(217,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:03'),(218,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:04'),(219,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:04'),(220,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:04'),(221,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:04'),(222,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:04'),(223,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:05'),(224,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:05'),(225,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:08:05'),(226,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:12:25'),(227,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:58:13'),(228,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 07:59:34'),(229,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:14:08'),(230,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:14:44'),(231,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:18:56'),(232,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:33'),(233,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:33'),(234,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:33'),(235,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:34'),(236,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:35'),(237,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:35'),(238,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:36'),(239,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:19:36'),(240,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:17'),(241,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:17'),(242,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:18'),(243,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:18'),(244,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:19'),(245,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:19'),(246,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:20'),(247,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:21'),(248,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:21'),(249,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:21'),(250,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:22'),(251,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:23'),(252,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:24'),(253,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:24'),(254,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:24'),(255,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:25'),(256,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:27'),(257,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:20:27'),(258,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:39:39'),(259,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:49:35'),(260,'App\\Movie',19,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:51:19'),(261,'App\\Movie',19,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 08:51:46'),(262,'App\\Movie',19,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 09:14:55'),(263,'App\\Movie',17,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 09:19:38'),(264,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 09:21:48'),(265,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 09:30:47'),(266,'App\\Movie',18,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 09:39:09'),(267,'App\\Movie',17,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-01 09:42:05'),(268,'App\\Movie',17,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 09:43:18'),(269,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:44:30'),(270,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:44:32'),(271,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:44:33'),(272,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:38'),(273,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:39'),(274,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:40'),(275,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:41'),(276,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:42'),(277,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:42'),(278,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:48'),(279,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:48'),(280,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:51'),(281,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:51'),(282,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:52'),(283,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:57'),(284,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:57'),(285,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:45:59'),(286,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:00'),(287,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:05'),(288,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:06'),(289,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:06'),(290,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:07'),(291,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:14'),(292,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:14'),(293,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:14'),(294,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:46:15'),(295,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:14'),(296,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:16'),(297,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:17'),(298,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:19'),(299,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:22'),(300,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:22'),(301,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:22'),(302,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:22'),(303,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:22'),(304,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:30'),(305,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:31'),(306,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:31'),(307,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:32'),(308,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:33'),(309,'App\\Movie',12,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-01 09:51:40'),(310,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:51:41'),(311,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:53:35'),(312,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:53:47'),(313,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:53:49'),(314,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 09:54:04'),(315,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 09:54:18'),(316,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:55:54'),(317,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:55:55'),(318,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 09:56:36'),(319,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 10:03:23'),(320,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 10:06:16'),(321,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:31:01'),(322,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:31:12'),(323,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:32:44'),(324,'App\\Movie',20,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:37:38'),(325,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:38:32'),(326,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:39:19'),(327,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:22'),(328,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:22'),(329,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:23'),(330,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:23'),(331,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:24'),(332,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:25'),(333,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:26'),(334,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:26'),(335,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:26'),(336,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:28'),(337,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:28'),(338,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:28'),(339,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:29'),(340,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:29'),(341,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:31'),(342,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:31'),(343,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:31'),(344,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:31'),(345,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:32'),(346,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:34'),(347,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:34'),(348,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:34'),(349,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:35'),(350,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:40:35'),(351,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:44:40'),(352,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:45:45'),(353,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:46:57'),(354,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:49:07'),(355,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 10:54:29'),(356,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 10:58:09'),(357,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 10:58:38'),(358,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:00:39'),(359,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:01:20'),(360,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:02:18'),(361,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:03:14'),(362,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:04:16'),(363,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:05:46'),(364,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:12:52'),(365,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:13:30'),(366,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:13:58'),(367,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:15:04'),(368,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:16:01'),(369,'App\\Movie',21,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:17:55'),(370,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:18:51'),(371,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:21:05'),(372,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:21:05'),(373,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:21:05'),(374,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:21:06'),(375,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:23:26'),(376,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:26:19'),(377,'App\\Movie',21,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:29:38'),(378,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:30:40'),(379,'App\\Movie',7,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:30:50'),(380,'App\\Movie',9,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:31:38'),(381,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:31:43'),(382,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:32:33'),(383,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:37:07'),(384,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:37:16'),(385,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:37:51'),(386,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:39:20'),(387,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:39:36'),(388,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:41:37'),(389,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:43:47'),(390,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:44:44'),(391,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:44:49'),(392,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:45:19'),(393,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:45:20'),(394,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:45:22'),(395,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:45:40'),(396,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:46:00'),(397,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:47:02'),(398,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:48:08'),(399,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:48:36'),(400,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:48:44'),(401,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 11:48:49'),(402,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:52:20'),(403,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-01 11:52:47'),(404,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:53:38'),(405,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 11:54:59'),(406,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:01:04'),(407,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:02:11'),(408,'App\\Movie',17,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:02:41'),(409,'App\\Movie',17,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:03:07'),(410,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:03:18'),(411,'App\\Movie',19,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:28:35'),(412,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:28:42'),(413,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:29:36'),(414,'App\\Movie',17,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:29:42'),(415,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:30:07'),(416,'App\\Movie',12,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:30:41'),(417,'App\\Movie',12,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:30:42'),(418,'App\\Movie',12,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:30:42'),(419,'App\\Movie',12,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:30:43'),(420,'App\\Movie',12,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:30:44'),(421,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:31:46'),(422,'App\\Movie',14,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:31:50'),(423,'App\\Movie',16,'ZaTe5fdWpdCHrhbiha5p0u0lAci6A1sHwLRyVyuf71iVFaCZ1xc0l1U6Jl6MOBACpt7rsFHAaTUR93yL',NULL,'2022-04-01 12:32:27'),(424,'App\\Movie',16,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:32:30'),(425,'App\\Movie',13,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 12:33:08'),(426,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 12:49:58'),(427,'App\\Movie',19,'yloIhGwnLAzaTI2qWZKdVg6zKrLgzcWzIVuTnTLWjVJe9keX0SKdLJzEsHEuHzCXqQi6CL0cEg8v6coD',NULL,'2022-04-01 13:14:12'),(428,'App\\Movie',19,'yloIhGwnLAzaTI2qWZKdVg6zKrLgzcWzIVuTnTLWjVJe9keX0SKdLJzEsHEuHzCXqQi6CL0cEg8v6coD',NULL,'2022-04-01 13:14:27'),(429,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:14:40'),(430,'App\\Movie',21,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:14:53'),(431,'App\\Movie',16,'yloIhGwnLAzaTI2qWZKdVg6zKrLgzcWzIVuTnTLWjVJe9keX0SKdLJzEsHEuHzCXqQi6CL0cEg8v6coD',NULL,'2022-04-01 13:15:18'),(432,'App\\Movie',21,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:20:47'),(433,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:22:07'),(434,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:10'),(435,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:31'),(436,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:32'),(437,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:32'),(438,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:32'),(439,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:33'),(440,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:33'),(441,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:33'),(442,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:34'),(443,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:34'),(444,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:34'),(445,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:34'),(446,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:35'),(447,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:35'),(448,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:35'),(449,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:24:35'),(450,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:26:03'),(451,'App\\Movie',20,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:26:26'),(452,'App\\Movie',12,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:30:33'),(453,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:33:19'),(454,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-01 13:40:49'),(455,'App\\Movie',20,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 13:49:30'),(456,'App\\Movie',17,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 15:27:29'),(457,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 17:13:02'),(458,'App\\Movie',15,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 22:49:00'),(459,'App\\Movie',21,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-01 22:51:23'),(460,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-02 09:22:02'),(461,'App\\Movie',16,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-02 09:25:17'),(462,'App\\Movie',15,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-02 09:25:53'),(463,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-02 09:28:10'),(464,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-02 12:19:43'),(465,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-02 12:20:00'),(466,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-02 13:06:21'),(467,'App\\Movie',21,'PzduOtjN3LrstE15H4Fl5tQLp0qNLsSr6cmzuyPFUybtLozhiP9E0o56pTENQovDX3dzrJjiqqdo5V0o',NULL,'2022-04-04 04:58:31'),(468,'App\\Movie',13,'PzduOtjN3LrstE15H4Fl5tQLp0qNLsSr6cmzuyPFUybtLozhiP9E0o56pTENQovDX3dzrJjiqqdo5V0o',NULL,'2022-04-04 04:58:48'),(469,'App\\Movie',21,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-04 04:59:04'),(470,'App\\Movie',15,'PzduOtjN3LrstE15H4Fl5tQLp0qNLsSr6cmzuyPFUybtLozhiP9E0o56pTENQovDX3dzrJjiqqdo5V0o',NULL,'2022-04-04 04:59:25'),(471,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-04 17:32:58'),(472,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-04 17:35:31'),(473,'App\\Movie',14,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-04 17:50:50'),(474,'App\\Movie',14,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-04 17:55:37'),(475,'App\\Movie',17,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-05 06:09:42'),(476,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-05 06:29:39'),(477,'App\\Movie',17,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-05 06:36:50'),(478,'App\\Movie',17,'QjzhconMxo1zLIlSXb0i97h4zFxcKUgwxOaXhRl89oe8Ot3ghYJ6Wt04El63tybPGU12Vq2vdHl4AUJE',NULL,'2022-04-05 06:37:01'),(479,'App\\Movie',17,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-05 06:41:11'),(480,'App\\Movie',17,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-05 06:54:27'),(481,'App\\Movie',18,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-05 10:38:30'),(482,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-05 11:34:27'),(483,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:06:09'),(484,'App\\Movie',9,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:20:57'),(485,'App\\Movie',7,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:46:00'),(486,'App\\Movie',12,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:50:14'),(487,'App\\Movie',12,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:50:24'),(488,'App\\Movie',7,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:50:43'),(489,'App\\Movie',9,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:50:54'),(490,'App\\Movie',9,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:51:18'),(491,'App\\Movie',19,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 11:52:01'),(492,'App\\Movie',12,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:11:14'),(493,'App\\Movie',7,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:34:28'),(494,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:35:06'),(495,'App\\Movie',17,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:36:51'),(496,'App\\Movie',17,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:37:51'),(497,'App\\Movie',17,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:39:31'),(498,'App\\Movie',17,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:42:10'),(499,'App\\Movie',17,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:43:10'),(500,'App\\Movie',12,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:44:15'),(501,'App\\Movie',18,'yloIhGwnLAzaTI2qWZKdVg6zKrLgzcWzIVuTnTLWjVJe9keX0SKdLJzEsHEuHzCXqQi6CL0cEg8v6coD',NULL,'2022-04-06 12:50:37'),(502,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-06 12:53:50'),(503,'App\\Movie',20,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:28:46'),(504,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:30:30'),(505,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:33:49'),(506,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:33:50'),(507,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:33:50'),(508,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:33:52'),(509,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:33:53'),(510,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:33:58'),(511,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:02'),(512,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:03'),(513,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:05'),(514,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:07'),(515,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:11'),(516,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:15'),(517,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:15'),(518,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:18'),(519,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:19'),(520,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:24'),(521,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:27'),(522,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:27'),(523,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:30'),(524,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:32'),(525,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:35'),(526,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:40'),(527,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:41'),(528,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:42'),(529,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:45'),(530,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:49'),(531,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:53'),(532,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:53'),(533,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:56'),(534,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:34:57'),(535,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:00'),(536,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:06'),(537,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:07'),(538,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:07'),(539,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:08'),(540,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:11'),(541,'App\\Movie',18,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:17'),(542,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-06 16:35:26'),(543,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-07 05:57:49'),(544,'App\\Movie',21,'NGEUxhT1cYb7JOGQoiiFWKJej3fyJ7xSK5Yf83Xcm0PlDgaw1QgUN5sHno2405huZAkIrqdXQwi91kAj',NULL,'2022-04-07 06:04:51'),(545,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-07 11:47:56'),(546,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-07 12:43:03'),(547,'App\\Movie',16,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-09 18:34:57'),(548,'App\\Movie',16,'BAYoxtflg82KA2SrpbXMaCNkhJeY9YhSODGzoJPDLbGn2fNeaKXEDgqF25TpLcYAfSaB1t1aSf9SDNId',NULL,'2022-04-11 04:38:26'),(549,'App\\Movie',13,'BAYoxtflg82KA2SrpbXMaCNkhJeY9YhSODGzoJPDLbGn2fNeaKXEDgqF25TpLcYAfSaB1t1aSf9SDNId',NULL,'2022-04-11 04:38:35'),(550,'App\\Movie',20,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-11 04:59:53'),(551,'App\\Movie',19,'AXztbOaVliOS0loAdZHewbup6LctvwSwyNHv0sCLCsTLlVFc1RQfByixPUDU9kjx9yGBaWL2kjwxr1pb',NULL,'2022-04-11 07:13:36'),(552,'App\\Movie',20,'AXztbOaVliOS0loAdZHewbup6LctvwSwyNHv0sCLCsTLlVFc1RQfByixPUDU9kjx9yGBaWL2kjwxr1pb',NULL,'2022-04-11 07:14:21'),(553,'App\\Movie',21,'EFa6Y3ZWMYTUOpLKFOs9eJmxIOCuFTilx8PSS3JSkpSt8SjUMN4gvK63HLS9XcCOMELfENkagFn39Hl2',NULL,'2022-04-11 12:48:22'),(554,'App\\Movie',14,'EFa6Y3ZWMYTUOpLKFOs9eJmxIOCuFTilx8PSS3JSkpSt8SjUMN4gvK63HLS9XcCOMELfENkagFn39Hl2',NULL,'2022-04-11 12:48:37'),(555,'App\\Movie',12,'EFa6Y3ZWMYTUOpLKFOs9eJmxIOCuFTilx8PSS3JSkpSt8SjUMN4gvK63HLS9XcCOMELfENkagFn39Hl2',NULL,'2022-04-11 12:49:02'),(556,'App\\Movie',19,'rtEmKV7gsUMpkjk75VncbaaJlJcMWnJA6C2HiAGMAvT3Z6b8rPEKB7IJrE1vyYM79Sc527rWnjgfHlYW',NULL,'2022-04-11 12:51:00'),(557,'App\\Movie',20,'6hrjJU7i7Vo7Txoiu3QI3ehLjZxW0LdL37VRZ0oCtLgbFfXWp9ZpsB7JoNPZcAu4kqQl2h0BmaKxRJLP',NULL,'2022-04-11 13:06:36'),(558,'App\\Movie',13,'6hrjJU7i7Vo7Txoiu3QI3ehLjZxW0LdL37VRZ0oCtLgbFfXWp9ZpsB7JoNPZcAu4kqQl2h0BmaKxRJLP',NULL,'2022-04-11 13:06:47'),(559,'App\\Movie',20,'bsCWEIINruQ0kCaat0qG8wFhaL5bjmHecJoSS21xK78ZHaIGFxsyMWMxKBHodhtJdoAMU0RlbViBOWjv',NULL,'2022-04-11 13:24:55'),(560,'App\\Movie',16,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-11 13:28:00'),(561,'App\\Movie',20,'UArYJuSXT0fLHNrtMwsNEGOA5ec11cpLWJDoacEoVI0TZm1qgj4KdrI7rVwyygJGpLGPV9k789hwWcc7',NULL,'2022-04-12 07:01:15'),(562,'App\\Movie',17,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-12 16:52:30'),(563,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-12 16:55:45'),(564,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-13 08:03:02'),(565,'App\\Movie',18,'2bRIGwmBmdVCcdunxKxSGQg1TiXlekcL5a8Kaeb98vIiYuGQNe2P4LuaksJZJTVwoURZ1vpuEG7GbTO6',NULL,'2022-04-14 03:13:41'),(566,'App\\Movie',21,'vdJ5ASaxU8cMBsdBVZvgrTbjwsJOYu8uihlFzmwgwGYNSiisYz0WfoxQ6R3opxtCp3glO1vNa22MgGhw',NULL,'2022-04-14 03:47:39'),(567,'App\\Movie',13,'vdJ5ASaxU8cMBsdBVZvgrTbjwsJOYu8uihlFzmwgwGYNSiisYz0WfoxQ6R3opxtCp3glO1vNa22MgGhw',NULL,'2022-04-14 03:51:36'),(568,'App\\Movie',21,'vdJ5ASaxU8cMBsdBVZvgrTbjwsJOYu8uihlFzmwgwGYNSiisYz0WfoxQ6R3opxtCp3glO1vNa22MgGhw',NULL,'2022-04-14 03:51:45'),(569,'App\\Movie',19,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-14 04:48:50'),(570,'App\\Movie',19,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-14 05:02:03'),(571,'App\\Movie',19,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-14 05:02:48'),(572,'App\\Movie',18,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-14 05:03:07'),(573,'App\\Movie',16,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-14 18:43:55'),(574,'App\\Movie',19,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:32:42'),(575,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-15 15:33:30'),(576,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-15 15:48:29'),(577,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-15 15:48:41'),(578,'App\\Movie',20,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-15 15:48:42'),(579,'App\\Movie',17,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:50:28'),(580,'App\\Movie',18,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:51:19'),(581,'App\\Movie',16,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:51:29'),(582,'App\\Movie',14,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:51:38'),(583,'App\\Movie',12,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:51:47'),(584,'App\\Movie',13,'4x6e4XPeAPNIak4MZDz2BVS4qeEBmEmPXEHK8KKNGif3mEuU1YjWUkM4KxmgSIspaIf5c9vGhIZfg2Dh',NULL,'2022-04-15 15:51:58'),(585,'App\\Movie',7,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-15 18:03:09'),(586,'App\\Movie',19,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:06:14'),(587,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:28'),(588,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:35'),(589,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:37'),(590,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:38'),(591,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:39'),(592,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:43'),(593,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:44'),(594,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:45'),(595,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:48'),(596,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:48'),(597,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:50'),(598,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:51'),(599,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:53'),(600,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:55'),(601,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:56'),(602,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:58'),(603,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:08:59'),(604,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:02'),(605,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:04'),(606,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:05'),(607,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:08'),(608,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:10'),(609,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:11'),(610,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:12'),(611,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:14'),(612,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:14'),(613,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:17'),(614,'App\\Movie',7,'RmFHTz3ZVZ0STbEVcC3zYMXM5PGsJIUON65BpK8bRGezQcn4sl8agDMI1g0NoE0EFWYYcOYbR9QaD9ud',NULL,'2022-04-15 18:09:17'),(615,'App\\Movie',19,'rfBel4v1tCJ9FeGy9lUuhcPjjhtD3GKo8sIQbCYjnSYxzVLN3ds2GR7cwtysXrtOG18gONSuqG7gO9MS',NULL,'2022-04-16 04:07:32'),(616,'App\\Movie',20,'Kn2Ew9CujtCuWU5jeQREYGtwpOV7W4aTCQesjU9wWr4QffWokIdRkNZICqkTnBJIeLOA9Nx5AXgG7c7Z',NULL,'2022-04-16 04:49:18'),(617,'App\\Movie',18,'Kn2Ew9CujtCuWU5jeQREYGtwpOV7W4aTCQesjU9wWr4QffWokIdRkNZICqkTnBJIeLOA9Nx5AXgG7c7Z',NULL,'2022-04-16 04:49:50'),(618,'App\\Movie',16,'Kn2Ew9CujtCuWU5jeQREYGtwpOV7W4aTCQesjU9wWr4QffWokIdRkNZICqkTnBJIeLOA9Nx5AXgG7c7Z',NULL,'2022-04-16 04:50:27'),(619,'App\\Movie',21,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-18 05:56:56'),(620,'App\\Movie',19,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-18 06:56:21'),(621,'App\\Movie',12,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-18 06:56:40'),(622,'App\\Movie',12,'b5jN0cT4AU3ss9HK6NG3N1baSvmxZ3Nk9rhSqfCQMSTy0YCY67r9zyCV44sxsowXjFnJTxJHdoLr9VmM',NULL,'2022-04-18 07:02:11'),(623,'App\\Movie',16,'OeIQoXCDqHv3gvd4XPYAbC4QElyeUvMzSACX3tm9yriwN9jNZzyRqt7vRaEUEiWWDut24pHGcW5bcNOR',NULL,'2022-04-21 14:30:49'),(624,'App\\Movie',14,'OeIQoXCDqHv3gvd4XPYAbC4QElyeUvMzSACX3tm9yriwN9jNZzyRqt7vRaEUEiWWDut24pHGcW5bcNOR',NULL,'2022-04-21 14:31:54'),(625,'App\\Movie',12,'OeIQoXCDqHv3gvd4XPYAbC4QElyeUvMzSACX3tm9yriwN9jNZzyRqt7vRaEUEiWWDut24pHGcW5bcNOR',NULL,'2022-04-21 14:32:19'),(626,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-21 14:43:37'),(627,'App\\Movie',16,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-21 14:46:23'),(628,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-21 14:46:38'),(629,'App\\Movie',18,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-21 14:46:58'),(630,'App\\Movie',18,'OeIQoXCDqHv3gvd4XPYAbC4QElyeUvMzSACX3tm9yriwN9jNZzyRqt7vRaEUEiWWDut24pHGcW5bcNOR',NULL,'2022-04-21 14:47:04'),(631,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-21 15:00:40'),(632,'App\\Movie',17,'OeIQoXCDqHv3gvd4XPYAbC4QElyeUvMzSACX3tm9yriwN9jNZzyRqt7vRaEUEiWWDut24pHGcW5bcNOR',NULL,'2022-04-21 15:06:33'),(633,'App\\Movie',7,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-21 16:32:14'),(634,'App\\Movie',19,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-21 16:58:21'),(635,'App\\Movie',14,'fktsBZgVogJhV4reGsTJjrhzEoyRVxUxyq5g5hmoZHScoLxv53R5ueBarv2z18FD7LXIyoUyPpAFbVii',NULL,'2022-04-21 16:58:45'),(636,'App\\Movie',21,'k8wxlhtxRWvXi8ZIHY80vavfvnNDHsWLB7JCK4cPYtiZNIMhSiM1WRD0M4fe1tKQPZSGJ3hvYPpDt9bW',NULL,'2022-04-22 11:40:45'),(637,'App\\Movie',21,'ZzISehI5UOl6kRMxlWXryAGAfoHZO7P1JzIpK76TzTBYxk85CwcERcyhr07BHf2vR4QGQE0UOzS79oeA',NULL,'2022-04-22 11:40:49'),(638,'App\\Movie',20,'M9NMmMq6gOByUsfoKWzYwCSluo8bYBBJ6ASQLkzsNJU4CrV7ajrqN9spsYODQhtB34KiEsu2GcDtMoME',NULL,'2022-04-22 11:40:49'),(639,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 03:52:12'),(640,'App\\Movie',20,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-23 04:35:04'),(641,'App\\Movie',16,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-23 04:35:12'),(642,'App\\Movie',16,'TJgu4beGq1cEUMs8s0I7K8XxtwSrH0s2JI9ZzarAJVDJCNJTJJeKCV5Ja7RyDHHmMk3kmMsbVUdq7arM',NULL,'2022-04-23 04:35:36'),(643,'App\\Movie',14,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 04:52:42'),(644,'App\\Movie',14,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 04:53:03'),(645,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:16:39'),(646,'App\\Movie',18,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:16:53'),(647,'App\\Movie',16,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:17:07'),(648,'App\\Movie',13,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:17:18'),(649,'App\\Movie',12,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:17:48'),(650,'App\\Movie',15,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:18:02'),(651,'App\\Movie',20,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:18:35'),(652,'App\\Movie',21,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:18:37'),(653,'App\\Movie',19,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:18:39'),(654,'App\\Movie',17,'bAxW8s51cK4neN8U2cyjW8PywdnMnT0o7hvdlG8YBB6KQlMB47aNEa7ug90Zt0Q0diE1OTZdj3c3JYLT',NULL,'2022-04-23 07:18:41'),(655,'App\\Movie',7,'jZ0RUQhdnY4mCX1Uvk6ZJr7cChge4tOMod3ERphMyK0Rmkc0la6UhyyQMJYnzZK2nuU9rzX2e61M9KkZ',NULL,'2022-04-25 14:38:21'),(656,'App\\Movie',7,'jZ0RUQhdnY4mCX1Uvk6ZJr7cChge4tOMod3ERphMyK0Rmkc0la6UhyyQMJYnzZK2nuU9rzX2e61M9KkZ',NULL,'2022-04-25 14:38:57'),(657,'App\\Movie',7,'jZ0RUQhdnY4mCX1Uvk6ZJr7cChge4tOMod3ERphMyK0Rmkc0la6UhyyQMJYnzZK2nuU9rzX2e61M9KkZ',NULL,'2022-04-25 14:39:00'),(658,'App\\Movie',7,'jZ0RUQhdnY4mCX1Uvk6ZJr7cChge4tOMod3ERphMyK0Rmkc0la6UhyyQMJYnzZK2nuU9rzX2e61M9KkZ',NULL,'2022-04-25 14:39:03'),(659,'App\\Movie',18,'oLH7xluas4POA4sxXclShQ3EUTb1Sc8hxa5azwJ2aD8De8DKf2fM5DLQwWVPmJgZKN7eJgBfQ1elrZDB',NULL,'2022-04-26 06:35:20'),(660,'App\\Movie',13,'oLH7xluas4POA4sxXclShQ3EUTb1Sc8hxa5azwJ2aD8De8DKf2fM5DLQwWVPmJgZKN7eJgBfQ1elrZDB',NULL,'2022-04-26 06:36:04'),(661,'App\\Movie',19,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:37:32'),(662,'App\\Movie',19,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:39:30'),(663,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:42:57'),(664,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:42:59'),(665,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:00'),(666,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:02'),(667,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:02'),(668,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:06'),(669,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:06'),(670,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:08'),(671,'App\\Movie',7,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:43:11'),(672,'App\\Movie',16,'fUj39LzW2ihC1VatR6hqXZ6iOzxnp2FUdNXZcvyhM2lGs9ijdO5G0j2pTIgR6BD54rfolMQTbRlYocrK',NULL,'2022-04-26 06:44:06'),(673,'App\\Movie',9,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 06:46:05'),(674,'App\\Movie',19,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 08:57:38'),(675,'App\\Movie',19,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 08:58:35'),(676,'App\\Movie',12,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-04-26 08:59:08'),(677,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-04-28 14:50:41'),(678,'App\\Movie',17,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-04-29 08:07:34'),(679,'App\\Movie',17,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-04-29 08:07:35'),(680,'App\\Movie',18,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-04-29 08:08:49'),(681,'App\\Movie',17,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-04-29 08:13:42'),(682,'App\\Movie',7,'xQSDxuEn8vSuyE8JgHMnn2qKDP8I2faOyhb2C010L4zvyB1g6C4Ww9daAT2DxvaDyssCtCDeVh9IfTDt',NULL,'2022-04-29 09:01:50'),(683,'App\\Movie',20,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-04-29 09:05:49'),(684,'App\\Movie',21,'grhA9OYBzOa5FTWyaO37PrUW6PVsamBtNlTXQknYn3sTYHrFpvR09cocoKOPPbfCxNDBkyxhrA3iNrxw',NULL,'2022-04-29 10:11:44'),(685,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-04-29 10:31:57'),(686,'App\\Movie',7,'oPPYkzNrkAUZfJamrnx2S2sMIJVB5Y0NQH6Il6CqkEDOKGmUXKesKJhVYgPxmEHkb3gQGHeCa9tGjS1f',NULL,'2022-04-29 14:09:40'),(687,'App\\Movie',20,'oPPYkzNrkAUZfJamrnx2S2sMIJVB5Y0NQH6Il6CqkEDOKGmUXKesKJhVYgPxmEHkb3gQGHeCa9tGjS1f',NULL,'2022-04-29 14:20:49'),(688,'App\\Movie',7,'grhA9OYBzOa5FTWyaO37PrUW6PVsamBtNlTXQknYn3sTYHrFpvR09cocoKOPPbfCxNDBkyxhrA3iNrxw',NULL,'2022-04-29 14:42:24'),(689,'App\\Movie',9,'grhA9OYBzOa5FTWyaO37PrUW6PVsamBtNlTXQknYn3sTYHrFpvR09cocoKOPPbfCxNDBkyxhrA3iNrxw',NULL,'2022-04-29 14:42:46'),(690,'App\\Movie',17,'grhA9OYBzOa5FTWyaO37PrUW6PVsamBtNlTXQknYn3sTYHrFpvR09cocoKOPPbfCxNDBkyxhrA3iNrxw',NULL,'2022-04-29 14:43:50'),(691,'App\\Movie',7,'owP8kjuzZWuy1C5TZTLp4TO3WYTf7iBYaMEq0wTgxUv3MnQZatpycdzpyichXjEe4krkzTmh7142FUY6',NULL,'2022-04-30 02:49:27'),(692,'App\\Movie',21,'HAsgCpUhg826OqMMKzdjcaQFHhUaOOWjngPswjJWEAW7fyD9l0An15oxv0mqTZILxGcLbe6cbyDdW1T6',NULL,'2022-05-01 09:46:22'),(693,'App\\Movie',9,'1BcIie4epbpUeas8R3BXIsC5qRhZX7rr7nJJbYsC8PpKmzZ4RWtR14FCd2M7ZGwoD4eyC10jKTCgsNWC',NULL,'2022-05-01 09:46:28'),(694,'App\\Movie',7,'q9zvJ0XzVltGComwD7AGJECPHdZV8CGSExC74lmYeDkANMGgP2NvbvePKpAKHsTFpDIoFdXXn9dMNQAT',NULL,'2022-05-01 09:46:29'),(695,'App\\Movie',12,'ibqo7BqCbw7S7Sm9LrWqQMFcyErmsNSWxEtXhc3MiLvUwkAdFygKnFsNYAh2FjneYGRInaFVM5YZ0PqO',NULL,'2022-05-01 09:46:30'),(696,'App\\Movie',13,'5migCWepCFySQKBAUPpnZQEeZQxN1Y861pSgSWlDEzn1aFGHgebeF4XgRxtMupmzagCayT1QU3yk81Lq',NULL,'2022-05-01 09:46:31'),(697,'App\\Movie',14,'l1cOFihf0ln6dIDDfLUJDfxE3SYeVXZSLXJDQWqDDNpg3yCmi5fhLh6FgfTYLEblHkCPYNRq6Us6vi0A',NULL,'2022-05-01 09:46:31'),(698,'App\\Movie',15,'n4J8oqPH8S6UbjVdHvAUIlWOnaBpkYW2TF7U8TypvfVE7QXBfeFSP8mlDEgKnT6u8s8xFEfqxY026Lnm',NULL,'2022-05-01 09:46:32'),(699,'App\\Movie',16,'UkA0SgxFTh0ISzgZxcAb9PREg6arOA8AednTGVm0U8PKXODdJFiBG1mWUQH9rqZePcjgv9vPGayhs7lw',NULL,'2022-05-01 09:46:33'),(700,'App\\Movie',17,'AuQGvB9G6mA5Z1P6dCdDoEKBEqMf418FIn1p4K96T0RHW9B6wZFrIF3ZJ0sUm8OCiuuFnMChsn08LGvJ',NULL,'2022-05-01 09:46:33'),(701,'App\\Movie',18,'USyDWUgQwC52enXiVjEyyuviRidcTc8fansVoOgEP8uHSB8cqsBIRyBiO2z2mFo5cjzW4cYDccfumI1E',NULL,'2022-05-01 09:46:34'),(702,'App\\Movie',19,'LI48koD3D4wTg9UwNJllxzyOylOu9AbeuNOD2o3jidfpR7RzYJNQt2EzHU6Q28I4QWxAfSIVZapRAUUJ',NULL,'2022-05-01 09:46:35'),(703,'App\\Movie',20,'K4IBAKyLqbQUeOkM8jTSkUd0sWgPitn9U6EnT0tQ5bJuys4Z6pSi015KLqKTENPrg2acXZrs5nQ2R8eS',NULL,'2022-05-01 09:46:36'),(704,'App\\Movie',20,'IV1riZKP55ZpPkIRdxsE6Qsvb8E1AHK4VgO0ZzRh7IQ4JuWSkPZrc50Zu73iYKGu6Lpn9cRktMTBAs8U',NULL,'2022-05-02 04:31:18'),(705,'App\\Movie',19,'xQSDxuEn8vSuyE8JgHMnn2qKDP8I2faOyhb2C010L4zvyB1g6C4Ww9daAT2DxvaDyssCtCDeVh9IfTDt',NULL,'2022-05-02 05:37:03'),(706,'App\\Movie',20,'oLH7xluas4POA4sxXclShQ3EUTb1Sc8hxa5azwJ2aD8De8DKf2fM5DLQwWVPmJgZKN7eJgBfQ1elrZDB',NULL,'2022-05-02 05:41:22'),(707,'App\\Movie',20,'9AhxhTXeGBK28zqoI4OrUt4lmOQWDQshHuWVo7SPT5GcLn4NqNpjQ880Ai8m2vFD8YTJW2lqZNzzBO5v',NULL,'2022-05-02 08:14:55'),(708,'App\\Movie',21,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-02 11:25:31'),(709,'App\\Movie',21,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-02 11:26:21'),(710,'App\\Movie',21,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-02 11:27:20'),(711,'App\\Movie',21,'Tm3w1Y8TMrwipzaydLCVoCBKrP9tpurTGvQZGcgY50f0XjWP7ZZI7IhyPDgkYPCl5hfBuDQUL47wyHJg',NULL,'2022-05-03 07:54:32'),(712,'App\\Movie',20,'wZb6imEOqDf4vpJ25TrboEj9YFBNjLMqUOQSlAWpa7FWMBFhaZgfGT4QUV45NbEYzZ1h2IBRjQUKmkvb',NULL,'2022-05-04 04:46:48'),(713,'App\\Movie',20,'wZb6imEOqDf4vpJ25TrboEj9YFBNjLMqUOQSlAWpa7FWMBFhaZgfGT4QUV45NbEYzZ1h2IBRjQUKmkvb',NULL,'2022-05-04 04:46:53'),(714,'App\\Movie',12,'wZb6imEOqDf4vpJ25TrboEj9YFBNjLMqUOQSlAWpa7FWMBFhaZgfGT4QUV45NbEYzZ1h2IBRjQUKmkvb',NULL,'2022-05-04 04:47:53'),(715,'App\\Movie',13,'wZb6imEOqDf4vpJ25TrboEj9YFBNjLMqUOQSlAWpa7FWMBFhaZgfGT4QUV45NbEYzZ1h2IBRjQUKmkvb',NULL,'2022-05-04 04:48:35'),(716,'App\\Movie',12,'5xM3WbFuRvHFcWp5wFHl5jMPJVG4ulUOx6SYarF0DA42SbZOS2eBW89gwetN6A8Aog4Fnkr1kXpQvKJZ',NULL,'2022-05-04 13:11:08'),(717,'App\\Movie',19,'CjJCJ3d7yT9TaCV4Ga3v6Xb0DC7vG0AuHSd6fOgI7peASPM0hzu30ftx7Bw5vEDEB5EQhVYbwz30yEGf',NULL,'2022-05-05 15:16:58'),(718,'App\\Movie',19,'xQSDxuEn8vSuyE8JgHMnn2qKDP8I2faOyhb2C010L4zvyB1g6C4Ww9daAT2DxvaDyssCtCDeVh9IfTDt',NULL,'2022-05-06 10:07:25'),(719,'App\\Movie',7,'xQSDxuEn8vSuyE8JgHMnn2qKDP8I2faOyhb2C010L4zvyB1g6C4Ww9daAT2DxvaDyssCtCDeVh9IfTDt',NULL,'2022-05-06 10:07:56'),(720,'App\\Movie',7,'oLH7xluas4POA4sxXclShQ3EUTb1Sc8hxa5azwJ2aD8De8DKf2fM5DLQwWVPmJgZKN7eJgBfQ1elrZDB',NULL,'2022-05-06 10:45:20'),(721,'App\\Movie',7,'ni3mTZB2k917VxJ7fZTrgmsDGS4gH0Pzfb5hYJQe3pAqHyHiBUlq2NEoBilKybSk1yUGjlsyFN7ioHkV',NULL,'2022-05-06 14:34:02'),(722,'App\\Movie',7,'ni3mTZB2k917VxJ7fZTrgmsDGS4gH0Pzfb5hYJQe3pAqHyHiBUlq2NEoBilKybSk1yUGjlsyFN7ioHkV',NULL,'2022-05-06 14:48:15'),(723,'App\\Movie',7,'ni3mTZB2k917VxJ7fZTrgmsDGS4gH0Pzfb5hYJQe3pAqHyHiBUlq2NEoBilKybSk1yUGjlsyFN7ioHkV',NULL,'2022-05-06 14:48:18'),(724,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-06 15:01:19'),(725,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-06 15:02:00'),(726,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-06 15:02:47'),(727,'App\\Movie',9,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-06 15:02:55'),(728,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-09 03:38:09'),(729,'App\\Movie',7,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-09 03:57:01'),(730,'App\\Movie',7,'UwvdvQDGWVWqlD3UPzEtrsvrOsAU6R4mrGaLCTMBpl1HgmQHTHjzVcDql2oXgArlTjJtMvVoc2NpB7ax',NULL,'2022-05-09 14:32:17'),(731,'App\\Movie',21,'450qATwDOe81VdQrpWbP92VTeL9HCrUEb4o3yHD0W2fx0lIzGh5OZbVjSDh5LXgnG4zfJZ7GOMTV4Ath',NULL,'2022-05-09 16:49:41'),(732,'App\\Movie',21,'BOwni3vyrTWq0Nip5F4c5hD7vDKWTeRW8TxmH5IoYC01ibRYpURYKWZqtadHxtWEhtz0767qcWHUYAh8',NULL,'2022-05-09 16:49:42'),(733,'App\\Movie',21,'ckFOkmFVQSDMcDa5dNgtmKzvmsrbl90xspPYscYYNVe1qVoRbqz4J9XnMmUXjk0K1Cu883w2Tqwly8a9',NULL,'2022-05-09 16:49:43'),(734,'App\\Movie',14,'ckFOkmFVQSDMcDa5dNgtmKzvmsrbl90xspPYscYYNVe1qVoRbqz4J9XnMmUXjk0K1Cu883w2Tqwly8a9',NULL,'2022-05-09 16:50:17'),(735,'App\\Movie',21,'ckFOkmFVQSDMcDa5dNgtmKzvmsrbl90xspPYscYYNVe1qVoRbqz4J9XnMmUXjk0K1Cu883w2Tqwly8a9',NULL,'2022-05-09 16:50:18'),(736,'App\\Movie',9,'ckFOkmFVQSDMcDa5dNgtmKzvmsrbl90xspPYscYYNVe1qVoRbqz4J9XnMmUXjk0K1Cu883w2Tqwly8a9',NULL,'2022-05-09 16:53:07'),(737,'App\\Movie',20,'izf9LXRvtB26wI3sACoTjkdnHMZkiSJZnU6iByR35kN9RY5ouJGp8AdVgP3ckXEP6p8zLKutL1LB3FHx',NULL,'2022-05-11 09:15:20'),(738,'App\\Movie',20,'vc8ylBUsUSOWsNO0CraeCNOJcQ5PcVuAWOzhqshWIcM6atSuFrBRGIoLZfaYyDduFcDYJPQZzGCZ959W',NULL,'2022-05-12 08:42:15'),(739,'App\\Movie',17,'mmKCs6UbXxW1O7VY720ER8thkDOflyJq5idA9pjwFxOBQunS0yL9IIA4Vz064mt3LLBfA0fKRGNQYQsd',NULL,'2022-05-13 02:15:33'),(740,'App\\Movie',17,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-05-13 08:48:45'),(741,'App\\Movie',17,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-05-13 08:48:46'),(742,'App\\Movie',17,'jCJIOVODhg5BgeZysDITm3KuGUTK08wAcL0gnnHEoKhfESTAcMGgWaiLQqL4tp84iLjcdPWEp1IA2wFr',NULL,'2022-05-13 08:48:46'),(743,'App\\Movie',21,'k7SrhxYsB3PKuE7kJaG3IQ1jMuEIrKxJCcGfOAihntSVc9pCgdSjrM7jyupayIxn9qQCVqUJa0J7aryr',NULL,'2022-05-15 05:26:55'),(744,'App\\Movie',7,'fUj39LzW2ihC1VatR6hqXZ6iOzxnp2FUdNXZcvyhM2lGs9ijdO5G0j2pTIgR6BD54rfolMQTbRlYocrK',NULL,'2022-05-18 04:38:58'),(745,'App\\Movie',7,'JzYmffINzktkmcb1M5RpGgfIvLp5sL8LJw8KfMKlUZeQyxX0H8BpLEeuJqcgCkCz9yMw43357JA1c7vG',NULL,'2022-05-18 04:46:10'),(746,'App\\Movie',21,'vwGbBHcmRDlR04HtkR5fGR8hDALqZbpwauJrFffZ1k3LJTsb1NItjvoAIPG6Jt87G7VQNQmVmnnF7ScN',NULL,'2022-05-18 14:33:30');
/*!40000 ALTER TABLE `views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_settings`
--

DROP TABLE IF EXISTS `wallet_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enable_wallet` int unsigned NOT NULL DEFAULT '0',
  `paytm_enable` tinyint(1) DEFAULT '0',
  `paypal_enable` tinyint(1) DEFAULT '0',
  `stripe_enable` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet_settings`
--

LOCK TABLES `wallet_settings` WRITE;
/*!40000 ALTER TABLE `wallet_settings` DISABLE KEYS */;
INSERT INTO `wallet_settings` VALUES (1,0,1,1,1,'2022-03-24 02:30:55','2022-03-29 04:21:51');
/*!40000 ALTER TABLE `wallet_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watch_histories`
--

DROP TABLE IF EXISTS `watch_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `watch_histories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int DEFAULT NULL,
  `tv_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watch_histories`
--

LOCK TABLES `watch_histories` WRITE;
/*!40000 ALTER TABLE `watch_histories` DISABLE KEYS */;
INSERT INTO `watch_histories` VALUES (3,7,NULL,1,'2022-03-29 05:28:34','2022-03-29 05:28:34'),(5,9,NULL,1,'2022-03-29 11:12:16','2022-03-29 11:12:16'),(7,12,NULL,1,'2022-03-31 03:58:48','2022-03-31 03:58:48'),(8,13,NULL,1,'2022-03-31 08:13:00','2022-03-31 08:13:00'),(9,16,NULL,1,'2022-03-31 08:53:09','2022-03-31 08:53:09'),(10,17,NULL,1,'2022-03-31 09:06:29','2022-03-31 09:06:29'),(11,15,NULL,1,'2022-03-31 09:11:11','2022-03-31 09:11:11'),(12,14,NULL,1,'2022-03-31 09:38:40','2022-03-31 09:38:40'),(13,16,NULL,8,'2022-03-31 10:02:01','2022-03-31 10:02:01'),(14,7,NULL,5,'2022-03-31 11:50:22','2022-03-31 11:50:22'),(15,18,NULL,1,'2022-03-31 12:33:35','2022-03-31 12:33:35'),(16,20,NULL,1,'2022-03-31 13:57:55','2022-03-31 13:57:55'),(17,19,NULL,1,'2022-03-31 15:39:02','2022-03-31 15:39:02'),(20,16,NULL,3,'2022-04-02 09:25:30','2022-04-02 09:25:30'),(21,16,NULL,15,'2022-04-12 16:52:23','2022-04-12 16:52:23'),(22,19,NULL,15,'2022-04-15 18:06:26','2022-04-15 18:06:26'),(23,7,NULL,3,'2022-04-21 16:32:23','2022-04-21 16:32:23'),(24,7,NULL,17,'2022-04-25 14:39:14','2022-04-25 14:39:14'),(25,19,NULL,3,'2022-04-26 06:39:42','2022-04-26 06:39:42'),(26,9,NULL,3,'2022-04-26 06:47:58','2022-04-26 06:47:58'),(27,7,NULL,19,'2022-04-29 09:00:33','2022-04-29 09:00:33'),(28,7,NULL,32,'2022-05-06 14:34:15','2022-05-06 14:34:15'),(29,9,NULL,5,'2022-05-18 04:40:31','2022-05-18 04:40:31'),(30,16,NULL,5,'2022-05-18 04:44:32','2022-05-18 04:44:32'),(31,17,NULL,5,'2022-05-18 04:49:48','2022-05-18 04:49:48'),(32,21,NULL,5,'2022-05-18 04:50:07','2022-05-18 04:50:07');
/*!40000 ALTER TABLE `watch_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `movie_id` int DEFAULT NULL,
  `season_id` int DEFAULT NULL,
  `added` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-19 10:24:25
