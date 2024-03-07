/*
 Navicat Premium Data Transfer

 Source Server         : my_db
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : laravelcompany

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 07/03/2024 18:37:38
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banners
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blogs
-- ----------------------------

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
  `riwayat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `dokters_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokters
-- ----------------------------
INSERT INTO `dokters` VALUES (1, 'dr. Harum Sayekti', 'dr.-harum-sayekti', 3, 'Perempuan', '2024-03-06', 'dadad', '31313131313', 'admin@gmail.com', NULL, '<div>Bertugas :<br><br></div><ul><li> Melakukan pelayanan kesehatan di poli serta memeriksa keadaan pasien dan memberikan resep kepada pasien;</li><li> Melakukan tindakan medik dasar di IGD serta rawat luka, pertolongan pertama pada kecelakaan dll;</li><li> Melakukan pemulihan pada pasien yang datang kontrol ke puskesmas, melakukan rujukan umum, peserta BPJS ke RSUD serta menerima rujukan dari poli KIA/KB dan Immunisasi;</li><li> Melakukan pengujian kesehatan , visum dan outopsi atas permintaan organisasi yang berwenang</li><li> Melakukan penyuluhan kesehatan pada anak sekolah sesuai jadwal yang ditetapkan;</li><li> Melakukan tugas luar Posyandu Usila (Pos Pelayanan Terpadu pada Usia Lanjut) dan Pusling (Puskesmas keliling);</li><li> Melakukan catatan medik untuk data rekam medis pasien;</li><li> Melakukan visite pada pasien rawat inap.</li></ul>', '1709559450.png', '2024-03-04 20:37:30', '2024-03-04 20:37:30');
INSERT INTO `dokters` VALUES (2, 'dr. Zuni Anggraeni Humairah', 'dr.-zuni-anggraeni-humairah', 3, 'Perempuan', '2024-03-01', 'dadadad', '3131313231312', 'dada@gmail.com', NULL, '<div><strong>Bertugas :</strong><br><br></div><div> Melakukan pelayanan kesehatan di poli serta memeriksa keadaan pasien dan memberikan resep kepada pasien;</div><div> Melakukan tindakan medik dasar di IGD serta rawat luka, pertolongan pertama pada kecelakaan dll;</div><div> Melakukan pemulihan pada pasien yang datang kontrol ke puskesmas, melakukan rujukan umum, peserta BPJS ke RSUD serta menerima rujukan dari poli KIA/KB dan Immunisasi;</div><div> Melakukan pengujian kesehatan , visum dan outopsi atas permintaan organisasi yang berwenang</div><div> Melakukan penyuluhan kesehatan pada anak sekolah sesuai jadwal yang ditetapkan;</div><div> Melakukan tugas luar Posyandu Usila (Pos Pelayanan Terpadu pada Usia Lanjut) dan Pusling (Puskesmas keliling);</div><div> Melakukan catatan medik untuk data rekam medis pasien;</div><div> Melakukan visite pada pasien rawat inap.</div>', '1709559591.png', '2024-03-04 20:39:51', '2024-03-04 20:39:51');
INSERT INTO `dokters` VALUES (3, 'drg. Agustin Dwi Wahyu Mardikaningrum', 'drg.-agustin-dwi-wahyu-mardikaningrum', 4, 'Perempuan', '2023-11-08', 'dadadad', '31313', 'admin2@gmail.com', NULL, '<div><strong>Bertugas :</strong><br><br></div><div> Melakukan tindakan medik pencabutan, penambalan, pembersihan karang gigi, menulis resep pengobatan;</div><div> Menerima konsultasi dari/pasien /masyarakat;</div><div> Melakukan rujukan umum dan peserta BPJS ke RSUD serta menerima rujukan dari poli atau unit kesehatan lainnya;</div><div> Menerima konsultasi dari perawat gigi atau tenaga kesehatan lainnya;</div><div> Membuat catatan di kartu berobat pasien tentang penyakitnya, tindakan dan pengobatan yang diberikan kepada pasien serta hal-hal yang harus diperhatikan pasien (catatan medik);</div><div> Melakukan penyuluhan kesehatan pada anak di sekolah dan di posyandu sesuai jadwal yang ditetapkan.</div>', '1709559648.png', '2024-03-04 20:40:48', '2024-03-04 20:40:48');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `fasilitas__layanans_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas__layanans
-- ----------------------------

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
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `galeris_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galeris
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal_dokters
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_galeris
-- ----------------------------
INSERT INTO `kategori_galeris` VALUES (1, 'Pelatihan BTCLS', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `kategori_galeris` VALUES (2, 'Penanggulangan Covid-19', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `kategori_galeris` VALUES (3, 'Vaksin Booster', '2023-02-15 19:04:46', '2023-02-15 19:04:46');
INSERT INTO `kategori_galeris` VALUES (4, 'Pengabdian Masyarakat', '2023-02-15 19:04:47', '2023-02-15 19:04:47');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lamarans
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of layanan_images
-- ----------------------------
INSERT INTO `layanan_images` VALUES (1, 3, '1709558598.jpg', '2024-03-04 20:23:18', '2024-03-04 20:23:18');

-- ----------------------------
-- Table structure for layanan_polikliniks
-- ----------------------------
DROP TABLE IF EXISTS `layanan_polikliniks`;
CREATE TABLE `layanan_polikliniks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `poliklinik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `layanan_polikliniks_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of layanan_polikliniks
-- ----------------------------
INSERT INTO `layanan_polikliniks` VALUES (3, 'Pemeriksaan Umum', 'pemeriksaan-umum', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br> </div>', '2024-03-04 20:21:35', '2024-03-04 20:33:43');
INSERT INTO `layanan_polikliniks` VALUES (4, 'Pemeriksaan Kesehatan Gigi & Mulut', 'pemeriksaan-kesehatan-gigi-&-mulut', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div><div><br> </div>', '2024-03-04 20:27:48', '2024-03-04 20:33:52');
INSERT INTO `layanan_polikliniks` VALUES (6, 'Pemeriksaan Kesehatan Lansia', 'pemeriksaan-kesehatan-lansia', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:30:20', '2024-03-04 20:33:56');
INSERT INTO `layanan_polikliniks` VALUES (7, 'Pemeriksaan KIA & KB', 'pemeriksaan-kia-&-kb', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:30:33', '2024-03-04 20:34:00');
INSERT INTO `layanan_polikliniks` VALUES (8, 'Pemeriksaan IVA & IMS', 'pemeriksaan-iva-&-ims', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Kamis</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:30:54', '2024-03-04 20:34:08');
INSERT INTO `layanan_polikliniks` VALUES (9, 'Pemeriksaan TB, Kusta & HIV AIDS', 'pemeriksaan-tb,-kusta-&-hiv-aids', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:31:10', '2024-03-04 20:34:12');
INSERT INTO `layanan_polikliniks` VALUES (10, 'Pemeriksaan DDTK & MTBS', 'pemeriksaan-ddtk-&-mtbs', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:31:25', '2024-03-04 20:35:06');
INSERT INTO `layanan_polikliniks` VALUES (11, 'Pemeriksaan Kesehatan Jiwa', 'pemeriksaan-kesehatan-jiwa', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:31:39', '2024-03-04 20:34:31');
INSERT INTO `layanan_polikliniks` VALUES (12, 'Pelayanan UKS & PKPR', 'pelayanan-uks-&-pkpr', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:31:50', '2024-03-04 20:35:12');
INSERT INTO `layanan_polikliniks` VALUES (13, 'Pelayanan Konsultasi Gizi dan Kesehatan Lingkungan', 'pelayanan-konsultasi-gizi-dan-kesehatan-lingkungan', '<div><strong>Jadwal Pelayanan</strong></div><div>Senin - Sabtu</div><div><br><strong>Jam Buka Loket Pemdaftaran</strong></div><div>Senin-Kamis : 07.00-12.00</div><div>Jumat : 07.00-10.00</div><div>Sabtu : 07.00-11.00</div><div><strong>Jam Pelayanan</strong></div><div>Senin-Kamis : 07.30-14.00</div><div>Jumat : 07.30-11.00</div><div>Sabtu : 07.30-12.30</div><div><br><br></div>', '2024-03-04 20:32:02', '2024-03-04 20:34:28');
INSERT INTO `layanan_polikliniks` VALUES (14, 'Pelayanan Vaksinasi Covid-19', 'pelayanan-vaksinasi-covid-19', '<div><strong>Jadwal Pelayanan</strong><br>Menyesuaikan<br> </div><div><br><br></div><div>        </div>', '2024-03-04 20:32:54', '2024-03-04 20:32:54');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lowongans
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partnerships
-- ----------------------------

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 'Info kesehatan', 'info-kesehatan', '2023-02-15 19:04:47', '2023-02-15 19:04:47');
INSERT INTO `post_categories` VALUES (2, 'Tips kesehatan', 'tips-kesehatan', '2023-02-15 19:04:47', '2023-02-15 19:04:47');
INSERT INTO `post_categories` VALUES (3, 'Hot News', 'hot-news', '2023-02-15 19:04:47', '2023-02-15 19:04:47');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
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
INSERT INTO `users` VALUES (1, 'Cha Eun Woo', 'mahkotonagano@gmail.com', 1, 'kusuka', '$2y$10$0ZNt1CPCA43dA6BbTwLuauBZp/FYVcdJ5XX84lvhmxhibOSwgivyu', '1676100893.jpg', '2023-02-15 19:04:45', '2023-02-15 19:04:45');

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
