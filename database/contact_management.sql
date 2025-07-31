-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for contact_management
CREATE DATABASE IF NOT EXISTS `contact_management`;
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `contact_management`;

-- Dumping structure for table contact_management.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.cache: ~0 rows (approximately)

-- Dumping structure for table contact_management.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.cache_locks: ~0 rows (approximately)

-- Dumping structure for table contact_management.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_app_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designetion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contacts_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.contacts: ~4 rows (approximately)
INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `whats_app_number`, `company`, `designetion`, `address`, `created_at`, `updated_at`) VALUES
	(1, 'Daquan French ed', 'xalaxosifoed@mailinator.com', '+1 (353) 681-6976 ed', '58833', 'Shelton and Callahan Traders ed', 'vvascas ed', 'Rerum possimus et e ed', '2025-04-15 03:06:53', '2025-04-15 03:41:38'),
	(3, 'Katell Velasquez', 'pivygin@mailinator.com', '+1 (798) 851-5588', '533', 'Marshall Norton Co', 'Valentine Dawson Plc', 'Amet similique cons', '2025-04-15 04:07:41', '2025-04-15 04:07:41'),
	(4, 'Claire Powers', 'petyro@mailinator.com', '+1 (591) 149-4481', '474', 'Rollins and Wolf Trading', 'Simpson Morgan Traders', 'Anim autem ea aut fu', '2025-04-15 22:47:48', '2025-04-15 22:47:48'),
	(7, 'Yasir Larson', 'vytegiceh@mailinator.com', '+1 (345) 919-4454', '935', 'Drake and Maddox LLC', 'Johnston Shaffer Inc', 'Illum pariatur Qui', '2025-04-21 18:56:39', '2025-04-21 18:56:39');

-- Dumping structure for table contact_management.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table contact_management.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `work_id` bigint unsigned NOT NULL,
  `contact_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_work_id_foreign` (`work_id`),
  KEY `invoices_contact_id_foreign` (`contact_id`),
  CONSTRAINT `invoices_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoices_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.invoices: ~1 rows (approximately)
INSERT INTO `invoices` (`id`, `description`, `work_id`, `contact_id`, `created_at`, `updated_at`) VALUES
	(1, '<p data-start="74" data-end="112" class=""><span data-start="114" data-end="126" style="font-weight: bolder; font-size: 1rem;">Project:</span><span style="font-size: 1rem;">&nbsp;Custom Business Website</span></p><p data-start="207" data-end="225" class=""><span data-start="207" data-end="225" style="font-weight: bolder;">Scope of Work:</span></p><ul data-start="226" data-end="498"><li data-start="226" data-end="279" class=""><p data-start="228" data-end="279" class="">Responsive Website Design (Mobile, Tablet, Desktop)</p></li><li data-start="280" data-end="349" class=""><p data-start="282" data-end="349" class="">Up to 6 Web Pages (Home, About, Services, Portfolio, Blog, Contact)</p></li><li data-start="350" data-end="394" class=""><p data-start="352" data-end="394" class="">CMS Integration (WordPress/Laravel/Custom)</p></li><li data-start="395" data-end="419" class=""><p data-start="397" data-end="419" class="">Basic SEO Optimization</p></li><li data-start="420" data-end="459" class=""><p data-start="422" data-end="459" class="">Contact Form with Email Notifications</p></li><li data-start="460" data-end="498" class=""><p data-start="462" data-end="498" class="">1 Month of Free Support after Launch</p></li></ul><p data-start="500" data-end="552" class=""><span data-start="500" data-end="513" style="font-weight: bolder;">Timeline:</span>&nbsp;3–4 weeks<br data-start="523" data-end="526"><span data-start="526" data-end="541" style="font-weight: bolder;">Total Cost:</span>&nbsp;$1,500 USD</p><p data-start="554" data-end="574" class=""><span data-start="554" data-end="572" style="font-weight: bolder;">Payment Terms:</span></p><ul data-start="575" data-end="620"><li data-start="575" data-end="590" class=""><p data-start="577" data-end="590" class="">50% upfront</p></li><li data-start="591" data-end="620" class=""><p data-start="593" data-end="620" class="">50% upon project completion</p></li></ul><hr data-start="622" data-end="625" class="" style="color: rgb(108, 114, 147);"><p></p><p data-start="627" data-end="722" class=""><em data-start="627" data-end="722">We are excited to work with you to build a stunning online presence that grows your business!</em></p>', 10, 1, '2025-04-27 22:22:34', '2025-04-28 03:26:07');

-- Dumping structure for table contact_management.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.jobs: ~0 rows (approximately)

-- Dumping structure for table contact_management.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.job_batches: ~0 rows (approximately)

-- Dumping structure for table contact_management.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_04_07_075156_create_tags_table', 1),
	(5, '2025_04_09_082504_create_contacts_table', 2),
	(8, '2025_04_15_073224_create_works_table', 3),
	(10, '2025_04_16_071806_create_work_details_table', 4),
	(11, '2025_04_19_001228_create_transections_table', 5),
	(12, '2025_04_22_101227_create_quotations_table', 6),
	(13, '2025_04_26_125817_create_settings_table', 6),
	(14, '2025_04_28_034208_create_invoices_table', 7),
	(15, '2025_04_28_094107_create_todos_table', 8);

-- Dumping structure for table contact_management.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table contact_management.quotations
CREATE TABLE IF NOT EXISTS `quotations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.quotations: ~3 rows (approximately)
INSERT INTO `quotations` (`id`, `title`, `description`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_company`, `created_at`, `updated_at`) VALUES
	(1, 'Quote for Web Development Services', '<p data-start="74" data-end="112" class=""><strong data-start="114" data-end="126" style="font-size: 1rem;">Project:</strong><span style="font-size: 1rem;"> Custom Business Website</span></p><p data-start="207" data-end="225" class=""><strong data-start="207" data-end="225">Scope of Work:</strong></p><ul data-start="226" data-end="498">\r\n<li data-start="226" data-end="279" class="">\r\n<p data-start="228" data-end="279" class="">Responsive Website Design (Mobile, Tablet, Desktop)</p>\r\n</li>\r\n<li data-start="280" data-end="349" class="">\r\n<p data-start="282" data-end="349" class="">Up to 6 Web Pages (Home, About, Services, Portfolio, Blog, Contact)</p>\r\n</li>\r\n<li data-start="350" data-end="394" class="">\r\n<p data-start="352" data-end="394" class="">CMS Integration (WordPress/Laravel/Custom)</p>\r\n</li>\r\n<li data-start="395" data-end="419" class="">\r\n<p data-start="397" data-end="419" class="">Basic SEO Optimization</p>\r\n</li>\r\n<li data-start="420" data-end="459" class="">\r\n<p data-start="422" data-end="459" class="">Contact Form with Email Notifications</p>\r\n</li>\r\n<li data-start="460" data-end="498" class="">\r\n<p data-start="462" data-end="498" class="">1 Month of Free Support after Launch</p>\r\n</li>\r\n</ul><p data-start="500" data-end="552" class=""><strong data-start="500" data-end="513">Timeline:</strong> 3–4 weeks<br data-start="523" data-end="526">\r\n<strong data-start="526" data-end="541">Total Cost:</strong> $1,300 USD</p><p data-start="554" data-end="574" class=""><strong data-start="554" data-end="572">Payment Terms:</strong></p><ul data-start="575" data-end="620">\r\n<li data-start="575" data-end="590" class="">\r\n<p data-start="577" data-end="590" class="">50% upfront</p>\r\n</li>\r\n<li data-start="591" data-end="620" class="">\r\n<p data-start="593" data-end="620" class="">50% upon project completion</p>\r\n</li>\r\n</ul><hr data-start="622" data-end="625" class=""><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start="627" data-end="722" class=""><em data-start="627" data-end="722">We are excited to work with you to build a stunning online presence that grows your business!</em></p>', 'Claire Powers', '+1 (591) 149-4481', 'petyro@mailinator.com', 'Anim autem ea aut fu', 'Rollins and Wolf Trading (Simpson Morgan Traders)', '2025-04-26 22:15:45', '2025-04-26 22:40:21'),
	(2, 'Et harum aute eius n', '<p>Demo Description</p>', 'Yasir Larson', '+1 (345) 919-4454', 'vytegiceh@mailinator.com', 'Illum pariatur Qui', 'Drake and Maddox LLC (Johnston Shaffer Inc)', '2025-04-28 04:37:21', '2025-04-28 04:37:52');

-- Dumping structure for table contact_management.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.sessions: ~5 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('eaFyJLEoxKtNZZvZshU2TxPQ7A8KInvV4FBpeqfA', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoick1Ib0IwbW5JQjREVEc2SlI5SDlqNlg5ak1VQnVLN09wWmtjWUtGaiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcHJvZmlsZT8yPSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1746091795),
	('qh36IYw6xkKbjgnDx6cfr6v68UAyF9ioejRd0NmR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibW5MZk00YWhDTVBHNXp2M1MzcnFmaTBRR01PWXBYUmx4REZVeUVPMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3Byb2ZpbGUiO319', 1746091766);

-- Dumping structure for table contact_management.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.settings: ~0 rows (approximately)
INSERT INTO `settings` (`id`, `app_name`, `logo`, `email`, `phone`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `whatsapp`, `google`, `description`, `owner_name`, `sign`, `created_at`, `updated_at`) VALUES
	(1, 'Contact Management app', 'logo/680ce9ef52e6c_web_logo.png', 'app@gmail.com', '0186574', 'Dhaka', 'ddw', 'fwefwe', 'fwefwe', 'fwefwe', 'adwd', 'gerg', 'wefwef', '<p><strong data-start="55" data-end="76">About Our Service</strong><br data-start="76" data-end="79">\r\nWe provide professional website development and reliable hosting services to help bring your ideas to life. Whether you need a personal blog, a business website, or a complete online store, we deliver fast, secure, and beautifully designed solutions. With our powerful hosting, your website stays online 24/7 with excellent performance and support you can trust.</p>', 'Rony', 'sign/680ce9ef533cb_voip.png', '2025-04-26 13:15:21', '2025-04-26 08:15:47');

-- Dumping structure for table contact_management.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`),
  UNIQUE KEY `tags_background_color_unique` (`background_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.tags: ~0 rows (approximately)

-- Dumping structure for table contact_management.todos
CREATE TABLE IF NOT EXISTS `todos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('urgent','normal','passed','repeat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `time` datetime DEFAULT NULL,
  `work_id` bigint unsigned DEFAULT NULL,
  `contact_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `todos_work_id_foreign` (`work_id`),
  KEY `todos_contact_id_foreign` (`contact_id`),
  CONSTRAINT `todos_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `todos_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.todos: ~2 rows (approximately)
INSERT INTO `todos` (`id`, `title`, `description`, `status`, `time`, `work_id`, `contact_id`, `created_at`, `updated_at`) VALUES
	(1, 'Demo Todo 1', '<p>Want to send message for new project</p>', 'urgent', '2025-05-03 10:00:00', NULL, 7, '2025-04-28 05:12:14', '2025-04-28 06:27:36'),
	(2, 'Demo Todo 2', '<p>Need To Make an invoice. its urgent</p>', 'urgent', '2025-05-02 10:20:00', 9, 3, '2025-04-28 05:20:01', '2025-04-28 06:05:37');

-- Dumping structure for table contact_management.transections
CREATE TABLE IF NOT EXISTS `transections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('advance','instalment') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` enum('credit','debit','cash','mobile_banking') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `tansection_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `work_id` bigint unsigned NOT NULL,
  `contact_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transections_work_id_foreign` (`work_id`),
  KEY `transections_contact_id_foreign` (`contact_id`),
  KEY `transections_user_id_foreign` (`user_id`),
  CONSTRAINT `transections_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transections_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.transections: ~4 rows (approximately)
INSERT INTO `transections` (`id`, `description`, `type`, `payment_type`, `amount`, `tansection_number`, `date`, `work_id`, `contact_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 'Advance Payment ed', 'advance', 'cash', 5004, '467ers43', '2025-04-21 00:56:00', 9, 3, 1, '2025-04-21 18:56:39', '2025-04-21 23:52:51'),
	(3, 'Advance Payment', 'advance', 'cash', 3000, '261', '2025-04-22 01:04:12', 9, 3, 1, '2025-04-21 19:04:12', '2025-04-21 19:04:12'),
	(4, 'Advance Payment', 'advance', 'mobile_banking', 3658, '594', '2025-04-22 01:05:44', 10, 1, 1, '2025-04-21 19:05:44', '2025-04-21 19:05:44'),
	(5, 'Libero nemo iure mol', 'instalment', 'mobile_banking', 4000, '32', '2017-11-08 17:33:00', 10, 1, 1, '2025-04-22 03:22:30', '2025-04-22 03:22:30');

-- Dumping structure for table contact_management.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','developer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `role`, `phone`, `address`, `last_activity`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin User', 'admin@gmail.com', 'admin', '01882565483', 'Pabna', '2025-04-13 19:15:53', NULL, '$2y$12$60UX7nsXlXinOkFud5uhYeBg3Ujb8B2HMPRafPciPs9ZyMt6OzFGu', NULL, '2025-04-13 13:15:50', '2025-05-01 03:28:41'),
	(2, 'Dev1', 'dev1@gmail.com', 'developer', '+8801965874235', 'Pabna', '2025-04-15 05:11:24', NULL, '$2y$12$UILtgVP01iQ4RprBM0QNyu35ePEMGcvKHJ.yOUZzi7kPlE31NKHuW', NULL, '2025-04-14 23:11:24', '2025-04-14 23:11:24'),
	(3, 'Dev2', 'dev2@gmail.com', 'developer', '+1 (283) 177-9544', 'Voluptatibus ea dolo', '2025-04-18 07:51:52', NULL, '$2y$12$jnd/KgfEOsbvyrBe2IiOiuFk/hufRTHVEwfGByR6lIl1.5YKApmb.', NULL, '2025-04-18 01:51:52', '2025-04-18 01:59:27'),
	(4, 'Dev3', 'dev3@gmail.com', 'developer', '+1 (548) 465-8835', 'Aperiam est quis ut', '2025-04-18 07:56:17', NULL, '$2y$12$IbkbJf/2SKijA6FX0abr/uSmj/3V9m85w6ohkMbjNLN34YtNTRU/C', NULL, '2025-04-18 01:56:17', '2025-04-18 01:56:17');

-- Dumping structure for table contact_management.works
CREATE TABLE IF NOT EXISTS `works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_line` datetime DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpanel_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpanel_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpanel_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_panel_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_panel_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `contact_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `works_contact_id_foreign` (`contact_id`),
  KEY `works_user_id_foreign` (`user_id`),
  CONSTRAINT `works_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.works: ~2 rows (approximately)
INSERT INTO `works` (`id`, `title`, `status`, `total_charge`, `advance`, `date_line`, `domain`, `cpanel_url`, `cpanel_user`, `cpanel_password`, `admin_panel_user`, `admin_panel_password`, `details`, `contact_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(8, 'Adipisci laboris ut', 'Assigned', '50000', '5000', '2025-07-22 15:30:00', 'Voluptas consequat', 'Accusamus suscipit o', 'Aut iusto odit eius', 'Suscipit dolores sae', 'Eu obcaecati cum off', 'Consequatur Cum vel', 'Ex velit labore exc', 7, 4, '2025-04-21 18:56:39', '2025-04-21 23:55:40'),
	(9, 'Enim qui voluptatem', 'Pending', '60000', '3000', '2003-07-10 19:56:00', 'Iusto et voluptas mo', 'Quo ut cum laboriosa', 'Consequuntur odit re', 'Qui rerum labore qui', 'Ea voluptate in culp', 'Unde non quae tenetu', 'Et et ratione sint d', 3, 2, '2025-04-21 19:04:12', '2025-04-21 19:04:12'),
	(10, 'Eum totam rerum est', 'Planned', '59988', '3658', '1973-05-01 02:51:00', 'Reiciendis excepteur', 'Officia et amet vel', 'Delectus aliqua Ev', 'Asperiores esse nost', 'Rerum sed unde aliqu', 'Rerum in sunt totam', 'Reprehenderit aute', 1, 2, '2025-04-21 19:05:44', '2025-04-21 19:05:44');

-- Dumping structure for table contact_management.work_details
CREATE TABLE IF NOT EXISTS `work_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `screenshort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `work_details_work_id_foreign` (`work_id`),
  CONSTRAINT `work_details_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table contact_management.work_details: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
