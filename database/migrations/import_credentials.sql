# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 104.239.169.42 (MySQL 5.7.17-0ubuntu0.16.04.1)
# Database: forge
# Generation Time: 2017-02-23 18:42:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table credentials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `credentials`;

CREATE TABLE `credentials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `appsignature` text COLLATE utf8_unicode_ci NOT NULL,
  `clientid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `clientsecret` longtext COLLATE utf8_unicode_ci NOT NULL,
  `defaultwsdl` text COLLATE utf8_unicode_ci NOT NULL,
  `xmlloc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `credentials_team_id_foreign` (`team_id`),
  CONSTRAINT `credentials_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `credentials` WRITE;
/*!40000 ALTER TABLE `credentials` DISABLE KEYS */;

INSERT INTO `credentials` (`id`, `team_id`, `appsignature`, `clientid`, `clientsecret`, `defaultwsdl`, `xmlloc`, `created_at`, `updated_at`)
VALUES
	(1,1,'none','eyJpdiI6ImJcLzk2cTYweitYWk9wK0hRcmFUcVpnPT0iLCJ2YWx1ZSI6InhTR2ZIK0VtSkYyXC85ZW1yT29mODlnb3gzQ2xjTXJ1SnJMMTlYMTgxUWZRU3JqNU1ZYVVvaXV1ZHhtUEg5NExUIiwibWFjIjoiOWY0MDRkNmM2ZTRjNjk0Zjk0ZWE0ZTI5NDYyYjkyYjRiNjk2ZGFiMGJhMDkyZTA5NWVhMDdiNDhmMDk0YzVhYyJ9','eyJpdiI6IlZZdUlLczBwOUcwdXU1ZDJpZit1UWc9PSIsInZhbHVlIjoiK1ZqY3B6WlQ0amJBcGhzbXpPMjRpR1ljRE9qdVBBbGxkc0JZN3UyNnFYcWc2VnNvRnpYSWZoU3g1NG9jVDN5UyIsIm1hYyI6IjBmYjBmMGQ5MTAzYzllNmE5ZGYxNzZkMDE1ZTlhN2ZjMjUzOTJjZmJiYmZhMTZlOTRmYzRkMTI4MWMzMjBiMzIifQ==','https://webservice.exacttarget.com/etframework.wsdl','/home/forge/qa.vacoda.io/releases/20170222164021/vendor/digitaladditive/exacttarget-laravel/src/FuelSdkPhp/ExactTargetWSDL.xml','2016-11-11 16:41:13','2017-02-22 11:42:03'),
	(2,3,'none','eyJpdiI6Im05VWxEeE5DRUk3U3hHMnpuTXhhOHc9PSIsInZhbHVlIjoiRFBpdVg4TURPR05Nb3ptS1VnbDBKYUNiOFN3WVNRallBelhQNjl4TnlDMlpKOXlzK2YzTDVXMTlsU2pIYnZRNSIsIm1hYyI6IjU3ZmRkMWY0MjMzODk5YWIxYWI1ZGFjYTNmYzI2ODFkZmE1YTlmZWRlZDU3YmMzMmJlZGM5NDM1ZjRhMjJkYTUifQ==','eyJpdiI6IjBUYk53MGNYM3IzSWdQUVZqeXJcLytRPT0iLCJ2YWx1ZSI6Im1WVHd3SDE4SFZoVXpCbXhRakp2bUJPUmMxTXBQYndxS0ZucVNcL1A2TjJoN3g5MGdVMnpndnFSQ3o1d1NoelZ6IiwibWFjIjoiMzYwM2I4Y2I3MDA1ODQ5OWRmYzc4MjViMmVjN2NmOTVjNWVkNTA3OTYyMjhlYWNkNmY1NzQ5ZTdjZjA0MGU2YiJ9','https://webservice.exacttarget.com/etframework.wsdl','/home/forge/qa.vacoda.io/releases/20170222164021/vendor/digitaladditive/exacttarget-laravel/src/FuelSdkPhp/ExactTargetWSDL.xml','2016-11-11 16:41:13','2017-02-22 11:42:03');

/*!40000 ALTER TABLE `credentials` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
