/*
 Navicat Premium Data Transfer

 Source Server         : laragon
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : laravelcompany

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 23/03/2024 11:16:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (1, 'Crew Puskesmas Cerme', '1709621506.jpg', '2024-03-05 13:51:47', '2024-03-05 13:51:47');
INSERT INTO `banners` VALUES (2, 'tes', '1710791823.jpg', '2024-03-18 12:09:37', '2024-03-19 02:57:03');

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `blogs_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blogs
-- ----------------------------
INSERT INTO `blogs` VALUES (1, 'Tes Ya', 1, 3, 'tes-ya', '1710788916.jpg', 'adassafad', '<div>adassafad</div>', '2024-03-19 02:08:36', '2024-03-19 02:08:36');
INSERT INTO `blogs` VALUES (2, 'coba aja sih', 1, 2, 'bl001', '1710797593.jpg', 'sdasfd', 'sdasfd', '2024-03-19 04:33:14', '2024-03-19 04:33:14');

-- ----------------------------
-- Table structure for dokters
-- ----------------------------
DROP TABLE IF EXISTS `dokters`;
CREATE TABLE `dokters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliklinik_id` bigint UNSIGNED NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_domisili` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `riwayat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `dokters_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokters
-- ----------------------------
INSERT INTO `dokters` VALUES (1, 'dimas', 'dimas', 1, 'Laki-Laki', '2000-07-05', 'manukan', '085856710103', 'dimaswahyu456@gmail.com', NULL, '<div>gak ada</div>', '1710801567.jpg', '2024-03-19 05:39:27', '2024-03-19 05:39:27');
INSERT INTO `dokters` VALUES (2, 'dimas wahyu', 'dimaswahyu456@gmail.com', 1, 'Laki-Laki', '1917-12-12', 'manukan', '085856710103', 'dimaswahyu456@gmail.com', NULL, 'gak ada', '1710820988.png', '2024-03-19 11:03:08', '2024-03-19 11:03:08');
INSERT INTO `dokters` VALUES (3, 'dimas', 'DOK001', 2, 'Laki-Laki', '2000-07-05', 'manukan', '085856710103', 'dimaswahyu456@gmail.com', NULL, 'gak ada', '1710878625.jpg', '2024-03-20 03:03:45', '2024-03-20 03:03:45');

-- ----------------------------
-- Table structure for elibraries
-- ----------------------------
DROP TABLE IF EXISTS `elibraries`;
CREATE TABLE `elibraries`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` bigint UNSIGNED NOT NULL,
  `file_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of elibraries
-- ----------------------------

-- ----------------------------
-- Table structure for fasilitas__layanans
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas__layanans`;
CREATE TABLE `fasilitas__layanans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `fasilitas__layanans_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas__layanans
-- ----------------------------
INSERT INTO `fasilitas__layanans` VALUES (1, 'pendukung', 'Fasilitas Penunjang Medis', 'pendukung', '1710883555.jpg', '<div>yah</div>', '2024-03-20 04:25:55', '2024-03-20 04:26:05');
INSERT INTO `fasilitas__layanans` VALUES (2, 'Mandi', 'Fasilitas Penunjang Medis', 'FL001', '1710916123.PNG', 'toilet', '2024-03-20 13:28:44', '2024-03-20 13:28:44');

-- ----------------------------
-- Table structure for folders
-- ----------------------------
DROP TABLE IF EXISTS `folders`;
CREATE TABLE `folders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of folders
-- ----------------------------
INSERT INTO `folders` VALUES (1, 'Tips kesehatan', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `folders` VALUES (2, 'Buku Pembelajaran', '2023-02-15 19:04:46', '2023-02-15 19:04:46');

-- ----------------------------
-- Table structure for galeris
-- ----------------------------
DROP TABLE IF EXISTS `galeris`;
CREATE TABLE `galeris`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_galeri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `galeris_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galeris
-- ----------------------------
INSERT INTO `galeris` VALUES (1, 'tes', 1, 'tes', '<div>uhh</div>', '1710801355.jpg', '2024-03-19 05:35:55', '2024-03-19 05:35:55');
INSERT INTO `galeris` VALUES (2, 'tes', 3, 'G001', '123', '1710817297.jpg', '2024-03-19 10:01:37', '2024-03-19 10:01:37');

-- ----------------------------
-- Table structure for jadwal_dokters
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_dokters`;
CREATE TABLE `jadwal_dokters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `dokter_id` bigint UNSIGNED NOT NULL,
  `poliklinik_id` bigint UNSIGNED NOT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari` time NOT NULL,
  `sampai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal_dokters
-- ----------------------------
INSERT INTO `jadwal_dokters` VALUES (1, 3, 2, 'senin', '09:15:00', '11:17:00', '2024-03-23 07:13:59', '2024-03-23 07:13:59');
INSERT INTO `jadwal_dokters` VALUES (2, 3, 2, 'selasa', '11:19:00', '03:21:00', '2024-03-23 07:15:21', '2024-03-23 09:46:58');
INSERT INTO `jadwal_dokters` VALUES (3, 3, 2, 'kamis', '10:20:00', '09:19:00', '2024-03-23 07:17:35', '2024-03-23 07:17:35');
INSERT INTO `jadwal_dokters` VALUES (4, 1, 1, 'senin', '12:21:00', '09:22:00', NULL, NULL);
INSERT INTO `jadwal_dokters` VALUES (5, 2, 2, 'Jumat', '10:23:00', '01:27:00', '2024-03-23 08:22:05', '2024-03-23 09:15:46');

-- ----------------------------
-- Table structure for kategori_galeris
-- ----------------------------
DROP TABLE IF EXISTS `kategori_galeris`;
CREATE TABLE `kategori_galeris`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `galeri_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_galeris
-- ----------------------------
INSERT INTO `kategori_galeris` VALUES (1, 'Pelatihan BTCLS', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `kategori_galeris` VALUES (2, 'Penanggulangan Covid-19', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `kategori_galeris` VALUES (3, 'Vaksin Booster', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `kategori_galeris` VALUES (4, 'Pengabdian Masyarakat', '2023-02-15 19:04:47', '2023-02-15 19:04:47');
INSERT INTO `kategori_galeris` VALUES (5, 'gambarku', '2024-03-19 12:28:43', '2024-03-19 12:28:43');

-- ----------------------------
-- Table structure for lamarans
-- ----------------------------
DROP TABLE IF EXISTS `lamarans`;
CREATE TABLE `lamarans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lowongan_id` bigint UNSIGNED NOT NULL,
  `nama_pelamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang_pelamar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lamarans
-- ----------------------------
INSERT INTO `lamarans` VALUES (1, 1, 'dimas dimas', '085856710103', 'dimaswahyu456@gmail.com', 'manukan', 'gaaafg', '1710882032.pdf', '2024-03-20 04:00:32', '2024-03-20 04:00:32');
INSERT INTO `lamarans` VALUES (2, 1, 'dimas dimas', '085856710103', 'dimaswahyu456@gmail.com', 'manukan', 'gaaafg', 'C:\\Users\\SingSabar\\AppData\\Local\\Temp\\php7D55.tmp', '2024-03-20 04:00:32', '2024-03-20 04:00:32');

-- ----------------------------
-- Table structure for layanan_images
-- ----------------------------
DROP TABLE IF EXISTS `layanan_images`;
CREATE TABLE `layanan_images`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layanan_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of layanan_images
-- ----------------------------
INSERT INTO `layanan_images` VALUES (1, 3, '1710885943.jpg', '2024-03-20 05:05:43', '2024-03-20 05:05:43');
INSERT INTO `layanan_images` VALUES (2, 2, '1710887004.jpg', '2024-03-20 05:23:24', '2024-03-20 05:23:24');
INSERT INTO `layanan_images` VALUES (3, 1, '1710887022.jpg', '2024-03-20 05:23:42', '2024-03-20 05:23:42');

-- ----------------------------
-- Table structure for layanan_polikliniks
-- ----------------------------
DROP TABLE IF EXISTS `layanan_polikliniks`;
CREATE TABLE `layanan_polikliniks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `poliklinik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `layanan_polikliniks_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of layanan_polikliniks
-- ----------------------------
INSERT INTO `layanan_polikliniks` VALUES (1, 'Spesialis Bedah Anak', 'spesialis-bedah-anak', '<div>ini poliklinik spesialis bedah anak</div>', '2023-02-15 19:04:45', '2023-02-15 19:04:45');
INSERT INTO `layanan_polikliniks` VALUES (2, 'Spesialis Urologi', 'spesialis-urologi', '<div>ini poliklinik spesialis urologi</div>', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `layanan_polikliniks` VALUES (3, 'Spesialis Kiper', 'spesialis-kiper', '<div>apa aja</div>', '2024-03-20 05:05:02', '2024-03-20 05:05:02');

-- ----------------------------
-- Table structure for lowongans
-- ----------------------------
DROP TABLE IF EXISTS `lowongans`;
CREATE TABLE `lowongans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `posisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `lowongans_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lowongans
-- ----------------------------
INSERT INTO `lowongans` VALUES (1, 'it', 'it', '<div>dasdsa</div>', 'asda', '2024-03-01', '2024-03-20 03:58:27', '2024-03-20 03:58:27');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, '2022_12_08_135726_create_users_table', 1);
INSERT INTO `migrations` VALUES (3, '2022_12_10_093822_create_blogs_table', 1);
INSERT INTO `migrations` VALUES (4, '2022_12_10_111908_create_post_categories_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_12_17_123638_create_banners_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_12_17_214921_create_dokter_controllers_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_12_18_172451_create_jadwal_dokters_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_12_24_154443_create_layanan_images_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_12_31_081642_create_lowongans_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_12_31_211614_create_lamarans_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_01_05_103408_create_galeris_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_01_21_090133_create_layanan_polikliniks_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_01_22_081021_create_elibraries_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_01_22_081911_create_folders_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_01_22_093934_create_fasilitas__layanans_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_01_23_103336_create_partnerships_table', 1);
INSERT INTO `migrations` VALUES (17, '2023_02_01_203119_create_kategori_galeris_table', 1);
INSERT INTO `migrations` VALUES (18, '2023_02_04_090517_create_yt_links_table', 1);

-- ----------------------------
-- Table structure for partnerships
-- ----------------------------
DROP TABLE IF EXISTS `partnerships`;
CREATE TABLE `partnerships`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_partner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partnerships
-- ----------------------------
INSERT INTO `partnerships` VALUES (1, 'Puskesmas Banjarsari', '1710988448.png', '2024-03-21 09:34:08', '2024-03-21 09:34:08');
INSERT INTO `partnerships` VALUES (2, 'poskendes betiting', '1711156791.png', '2024-03-23 08:19:51', '2024-03-23 08:19:51');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `post_categories_kategori_unique`(`kategori` ASC) USING BTREE,
  UNIQUE INDEX `post_categories_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 'Info kesehatan', 'info-kesehatan', '2023-02-15 19:04:47', '2023-02-15 19:04:47');
INSERT INTO `post_categories` VALUES (2, 'Tips kesehatan', 'tips-kesehatan', '2023-02-15 19:04:47', '2023-02-15 19:04:47');
INSERT INTO `post_categories` VALUES (3, 'Hot News', 'hot-news', '2023-02-15 19:04:47', '2023-02-15 19:04:47');
INSERT INTO `post_categories` VALUES (4, 'bajakan', 'PC001', '2024-03-19 11:53:52', '2024-03-19 11:53:52');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin@gmail.com', 'admin', '$2y$10$iuUzeLI2JIflXVCkhM0SieESmWIW.4geU/9k7ukpdI7gn5MZ37jUS', '1676100893.jpg', '2023-02-15 19:04:45', '2023-02-15 19:04:45');

-- ----------------------------
-- Table structure for yt_links
-- ----------------------------
DROP TABLE IF EXISTS `yt_links`;
CREATE TABLE `yt_links`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yt_links
-- ----------------------------
INSERT INTO `yt_links` VALUES (1, 'Pencegahan Hidrosefalus', 'https://www.youtube.com/embed/VGtIP0iQmcY', '2023-02-15 19:04:47', '2023-02-15 19:04:47');

SET FOREIGN_KEY_CHECKS = 1;
