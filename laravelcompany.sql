/*
SQLyog Ultimate v10.42 
MySQL - 8.0.30 : Database - laravelcompany
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `laravelcompany`;

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`banner_title`,`image`,`created_at`,`updated_at`) values (1,'Crew Puskesmas Cerme','1709621506.jpg','2024-03-05 13:51:47','2024-03-05 13:51:47'),(2,'tes','1710791823.jpg','2024-03-18 12:09:37','2024-03-19 02:57:03');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`title`,`user_id`,`category_id`,`slug`,`image`,`excerpt`,`body`,`created_at`,`updated_at`) values (1,'Tes Ya',1,3,'tes-ya','1710788916.jpg','adassafad','<div>adassafad</div>','2024-03-19 02:08:36','2024-03-19 02:08:36'),(2,'coba aja sih',1,2,'bl001','1710797593.jpg','sdasfd','sdasfd','2024-03-19 04:33:14','2024-03-19 04:33:14');

/*Table structure for table `dokters` */

DROP TABLE IF EXISTS `dokters`;

CREATE TABLE `dokters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliklinik_id` bigint unsigned NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_domisili` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dokters_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dokters` */

insert  into `dokters`(`id`,`nama`,`slug`,`poliklinik_id`,`jenis_kelamin`,`tanggal_lahir`,`alamat_domisili`,`no_hp`,`email`,`specialis`,`riwayat`,`image`,`created_at`,`updated_at`) values (1,'dimas','dimas',1,'Laki-Laki','2000-07-05','manukan','085856710103','dimaswahyu456@gmail.com',NULL,'<div>gak ada</div>','1710801567.jpg','2024-03-19 05:39:27','2024-03-19 05:39:27'),(2,'dimas wahyu','dimaswahyu456@gmail.com',1,'Laki-Laki','1917-12-12','manukan','085856710103','dimaswahyu456@gmail.com',NULL,'gak ada','1710820988.png','2024-03-19 11:03:08','2024-03-19 11:03:08');

/*Table structure for table `elibraries` */

DROP TABLE IF EXISTS `elibraries`;

CREATE TABLE `elibraries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` bigint unsigned NOT NULL,
  `file_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `elibraries` */

/*Table structure for table `fasilitas__layanans` */

DROP TABLE IF EXISTS `fasilitas__layanans`;

CREATE TABLE `fasilitas__layanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fasilitas__layanans_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `fasilitas__layanans` */

/*Table structure for table `folders` */

DROP TABLE IF EXISTS `folders`;

CREATE TABLE `folders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `folders` */

insert  into `folders`(`id`,`nama_folder`,`created_at`,`updated_at`) values (1,'Tips kesehatan','2023-02-15 19:04:46','2023-02-15 19:04:46'),(2,'Buku Pembelajaran','2023-02-15 19:04:46','2023-02-15 19:04:46');

/*Table structure for table `galeris` */

DROP TABLE IF EXISTS `galeris`;

CREATE TABLE `galeris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_galeri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint unsigned NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `galeris_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `galeris` */

insert  into `galeris`(`id`,`title_galeri`,`kategori_id`,`slug`,`keterangan`,`image`,`created_at`,`updated_at`) values (1,'tes',1,'tes','<div>uhh</div>','1710801355.jpg','2024-03-19 05:35:55','2024-03-19 05:35:55'),(2,'tes',3,'G001','123','1710817297.jpg','2024-03-19 10:01:37','2024-03-19 10:01:37');

/*Table structure for table `jadwal_dokters` */

DROP TABLE IF EXISTS `jadwal_dokters`;

CREATE TABLE `jadwal_dokters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dokter_id` bigint unsigned NOT NULL,
  `poliklinik_id` bigint unsigned NOT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari` time NOT NULL,
  `sampai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jadwal_dokters` */

/*Table structure for table `kategori_galeris` */

DROP TABLE IF EXISTS `kategori_galeris`;

CREATE TABLE `kategori_galeris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `galeri_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategori_galeris` */

insert  into `kategori_galeris`(`id`,`galeri_kategori`,`created_at`,`updated_at`) values (1,'Pelatihan BTCLS','2023-02-15 19:04:46','2023-02-15 19:04:46'),(2,'Penanggulangan Covid-19','2023-02-15 19:04:46','2023-02-15 19:04:46'),(3,'Vaksin Booster','2023-02-15 19:04:46','2023-02-15 19:04:46'),(4,'Pengabdian Masyarakat','2023-02-15 19:04:47','2023-02-15 19:04:47');

/*Table structure for table `lamarans` */

DROP TABLE IF EXISTS `lamarans`;

CREATE TABLE `lamarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lowongan_id` bigint unsigned NOT NULL,
  `nama_pelamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang_pelamar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lamarans` */

/*Table structure for table `layanan_images` */

DROP TABLE IF EXISTS `layanan_images`;

CREATE TABLE `layanan_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `layanan_id` bigint unsigned NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `layanan_images` */

/*Table structure for table `layanan_polikliniks` */

DROP TABLE IF EXISTS `layanan_polikliniks`;

CREATE TABLE `layanan_polikliniks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `poliklinik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `layanan_polikliniks_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `layanan_polikliniks` */

insert  into `layanan_polikliniks`(`id`,`poliklinik`,`slug`,`ket`,`created_at`,`updated_at`) values (1,'Spesialis Bedah Anak','spesialis-bedah-anak','<div>ini poliklinik spesialis bedah anak</div>','2023-02-15 19:04:45','2023-02-15 19:04:45'),(2,'Spesialis Urologi','spesialis-urologi','<div>ini poliklinik spesialis urologi</div>','2023-02-15 19:04:46','2023-02-15 19:04:46');

/*Table structure for table `lowongans` */

DROP TABLE IF EXISTS `lowongans`;

CREATE TABLE `lowongans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `posisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lowongans_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lowongans` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2022_12_08_135726_create_users_table',1),(3,'2022_12_10_093822_create_blogs_table',1),(4,'2022_12_10_111908_create_post_categories_table',1),(5,'2022_12_17_123638_create_banners_table',1),(6,'2022_12_17_214921_create_dokter_controllers_table',1),(7,'2022_12_18_172451_create_jadwal_dokters_table',1),(8,'2022_12_24_154443_create_layanan_images_table',1),(9,'2022_12_31_081642_create_lowongans_table',1),(10,'2022_12_31_211614_create_lamarans_table',1),(11,'2023_01_05_103408_create_galeris_table',1),(12,'2023_01_21_090133_create_layanan_polikliniks_table',1),(13,'2023_01_22_081021_create_elibraries_table',1),(14,'2023_01_22_081911_create_folders_table',1),(15,'2023_01_22_093934_create_fasilitas__layanans_table',1),(16,'2023_01_23_103336_create_partnerships_table',1),(17,'2023_02_01_203119_create_kategori_galeris_table',1),(18,'2023_02_04_090517_create_yt_links_table',1);

/*Table structure for table `partnerships` */

DROP TABLE IF EXISTS `partnerships`;

CREATE TABLE `partnerships` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_partner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `partnerships` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `post_categories` */

DROP TABLE IF EXISTS `post_categories`;

CREATE TABLE `post_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_kategori_unique` (`kategori`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_categories` */

insert  into `post_categories`(`id`,`kategori`,`slug`,`created_at`,`updated_at`) values (1,'Info kesehatan','info-kesehatan','2023-02-15 19:04:47','2023-02-15 19:04:47'),(2,'Tips kesehatan','tips-kesehatan','2023-02-15 19:04:47','2023-02-15 19:04:47'),(3,'Hot News','hot-news','2023-02-15 19:04:47','2023-02-15 19:04:47');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`email`,`role`,`username`,`password`,`image`,`created_at`,`updated_at`) values (1,'Administrator','admin@gmail.com',1,'admin','$2y$10$iuUzeLI2JIflXVCkhM0SieESmWIW.4geU/9k7ukpdI7gn5MZ37jUS','1676100893.jpg','2023-02-15 19:04:45','2023-02-15 19:04:45');

/*Table structure for table `yt_links` */

DROP TABLE IF EXISTS `yt_links`;

CREATE TABLE `yt_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `yt_links` */

insert  into `yt_links`(`id`,`title`,`embed_link`,`created_at`,`updated_at`) values (1,'Pencegahan Hidrosefalus','https://www.youtube.com/embed/VGtIP0iQmcY','2023-02-15 19:04:47','2023-02-15 19:04:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
