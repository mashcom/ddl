/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : licence

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 01/11/2018 17:53:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for licence_class
-- ----------------------------
DROP TABLE IF EXISTS `licence_class`;
CREATE TABLE `licence_class`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licence_id` int(11) NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of licence_class
-- ----------------------------
INSERT INTO `licence_class` VALUES (1, 62, '{\"class1\":null,\"class2\":null,\"class3\":null,\"class4\":null,\"class5\":null}');
INSERT INTO `licence_class` VALUES (2, 63, '{\"class1\":null,\"class2\":null,\"class3\":null,\"class4\":null,\"class5\":null}');
INSERT INTO `licence_class` VALUES (3, 64, '{\"class1\":\"on\",\"class2\":\"on\",\"class3\":null,\"class4\":\"on\",\"class5\":\"on\"}');
INSERT INTO `licence_class` VALUES (6, 65, '{\"class1\":\"on\",\"class2\":null,\"class3\":null,\"class4\":null,\"class5\":null}');
INSERT INTO `licence_class` VALUES (7, 66, '{\"class1\":null,\"class2\":null,\"class3\":null,\"class4\":\"on\",\"class5\":\"on\"}');

-- ----------------------------
-- Table structure for licences
-- ----------------------------
DROP TABLE IF EXISTS `licences`;
CREATE TABLE `licences`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `national_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dob` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `licence_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_of_issue` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` enum('Male','Female') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reset_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `national_id`(`national_id`) USING BTREE,
  UNIQUE INDEX `licence_no`(`licence_no`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of licences
-- ----------------------------
INSERT INTO `licences` VALUES (3, 'Tinashe Dziva', '57-2487604G62', '1990-01-01', '110793BM', '2018-10-10', 'Male', 'tinamate midzi.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bmashcom@hotmail.com', '', NULL);
INSERT INTO `licences` VALUES (52, 'Kiv Moyo', '59-6745589G94', '1994-10-18', '38737TR', '2018-10-16', 'Female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (54, 'Kuda Hachi', '23-123543-G-82', '1993-01-01', '141542MK', '2018-01-31', 'Male', 'C:\\Users\\hp\\AppData\\Local\\Temp\\php92FB.tmp', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (55, 'Lameck Mahachi', '23-200543-Y-91', '1994-10-17', '915421CX', '2018-10-19', 'Female', 'C:\\Users\\hp\\AppData\\Local\\Temp\\phpEB2B.tmp', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (56, 'Yolanda Mapeto', '56-200543-P-92', '1997-10-05', '9154215IJ', '2018-10-11', 'Male', 'C:\\Users\\hp\\AppData\\Local\\Temp\\php48F8.tmp', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (57, 'Tendai Shumba', '23-200543-Y-95', '1998-10-19', '9154215RC', '2018-10-18', 'Male', '91542152-6c5cc966950919f73586f2b5a7ba3eeaba819739.png', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (58, 'Blessing Mhike', '23-123543-G-89', '1998-10-19', '9154215WQ', '2018-10-19', 'Male', '91542152415f-9e6448b8a39eb755575bccfecb34ed3456c81786.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (62, 'Henry Rushawa', '67-56664-L-90', '1999-10-17', '7865235CB', '2018-10-12', 'Male', '78652354-12c36814672ec9e5c021eb3951268b8e734cd15c.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (63, 'Mike Manson', '56-123543-G-23', '2000-10-06', '543567RD', '2018-10-16', 'Male', '543567-e26e3e692acd506cbee4488a9990ff35f8f134f8.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `licences` VALUES (64, 'Blessing Nyashanu', '23-200543-G-45', '2000-10-04', '28734LD', '2018-10-09', 'Male', '28734248HJ-084f67664aaf39e382220830c889be965b7b9a1f.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'aculyse@gmail.com', NULL, NULL);
INSERT INTO `licences` VALUES (65, 'Jerry Moyo', '23-123679-G-90', '2000-10-18', '915421AB', '2018-10-24', 'Male', '915421524158990-467f6f6155e0294f485135e1feb949c1f4d14f52.jpg', NULL, 'bmashcgom@hotmail.com', NULL, NULL);
INSERT INTO `licences` VALUES (66, 'Nelson Masal', '23-123543-G-12', '1990', '12345FD', '20/10/2008', 'Male', '12345FD-8b945bc9909504300834441f4887db0c1060a6a0.jpg', NULL, 'nelson@gmail.com', NULL, NULL);

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES (1, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:57:45', '2018-10-27 15:57:45', 64, 'failed');
INSERT INTO `logs` VALUES (2, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:57:59', '2018-10-27 15:57:59', 64, 'failed');
INSERT INTO `logs` VALUES (3, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:01', '2018-10-27 15:58:01', 64, 'failed');
INSERT INTO `logs` VALUES (4, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:02', '2018-10-27 15:58:02', 64, 'failed');
INSERT INTO `logs` VALUES (5, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:02', '2018-10-27 15:58:02', 64, 'failed');
INSERT INTO `logs` VALUES (6, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:03', '2018-10-27 15:58:03', 64, 'failed');
INSERT INTO `logs` VALUES (7, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:03', '2018-10-27 15:58:03', 64, 'failed');
INSERT INTO `logs` VALUES (8, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:03', '2018-10-27 15:58:03', 64, 'failed');
INSERT INTO `logs` VALUES (9, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:04', '2018-10-27 15:58:04', 64, 'failed');
INSERT INTO `logs` VALUES (10, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:04', '2018-10-27 15:58:04', 64, 'failed');
INSERT INTO `logs` VALUES (11, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:04', '2018-10-27 15:58:04', 64, 'failed');
INSERT INTO `logs` VALUES (12, 'Invalid QR user with id 64 and name Blessing Mashoko Mashcom with auth code 686644', '2018-10-27 15:58:05', '2018-10-27 15:58:05', 64, 'failed');
INSERT INTO `logs` VALUES (13, 'Verified user with id 64 and name Blessing Mashoko Mashcom with auth code 10521d89ed0415dda1053de92037c8b672353b40', '2018-10-27 15:58:28', '2018-10-27 15:58:28', 64, 'success');
INSERT INTO `logs` VALUES (14, 'Verified user with id 64 and name Blessing Mashoko Mashcom with auth code 10521d89ed0415dda1053de92037c8b672353b40', '2018-10-27 15:58:31', '2018-10-27 15:58:31', 64, 'success');
INSERT INTO `logs` VALUES (15, 'Verified user with id 64 and name Blessing Mashoko Mashcom with auth code 10521d89ed0415dda1053de92037c8b672353b40', '2018-10-27 15:58:31', '2018-10-27 15:58:31', 64, 'success');
INSERT INTO `logs` VALUES (16, 'Verified user with id 64 and name Blessing Mashoko Mashcom with auth code 10521d89ed0415dda1053de92037c8b672353b40', '2018-10-27 15:58:32', '2018-10-27 15:58:32', 64, 'success');
INSERT INTO `logs` VALUES (17, 'Verified user with id 64 and name Blessing Mashoko Mashcom with auth code 10521d89ed0415dda1053de92037c8b672353b40', '2018-10-27 15:58:33', '2018-10-27 15:58:33', 64, 'success');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qrs
-- ----------------------------
DROP TABLE IF EXISTS `qrs`;
CREATE TABLE `qrs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qrs
-- ----------------------------
INSERT INTO `qrs` VALUES (1, '$2y$10$hwg8Kc1yxJ1J52lUU4bRP.XXShzAm4Kg4qKKlH6btAcFxeo.Cz0Vy');
INSERT INTO `qrs` VALUES (2, '$2y$10$DG2sVajkp.C5Qeu4RzRX/eIWuVyBvKOQJtzY/xsGq4WgSdmTa7RQ2');
INSERT INTO `qrs` VALUES (3, '$2y$10$.Xsvl05zi.k0KJp2uG4uF.AHiV8Sa8/uYmkvrdPsgNzuR4AO1EoS6');
INSERT INTO `qrs` VALUES (4, '$2y$10$spB10IoNAPjnp9egvI2SmeunRWa0ULWhrC/A6bKkO6RAQjwQD5Pg.');
INSERT INTO `qrs` VALUES (5, '$2y$10$5sXzhnk1rBUjaRXKQfnWNuKEZPFusQTyOAzYym4PjgGqT9oanoxby');
INSERT INTO `qrs` VALUES (6, '$2y$10$2w2JZqHrSuQ9dpIhBdkpm.VVKM41I9hyWB4oLDoDBWHvoDEx3fjgS');
INSERT INTO `qrs` VALUES (7, '$2y$10$i0PHGLODEkM4XMAoAwW2VOe1Iio/mlCPQbfQqKBPpQfphV5B.GaoC');
INSERT INTO `qrs` VALUES (8, '$2y$10$rd8Jx2jEF5RJPLrZyraCQusrhooAwMq3Xu0tMaAGt9LaWFk39rBWS');
INSERT INTO `qrs` VALUES (9, '$2y$10$NPHwuCt1MnnJ54/hSAqqSO1DgEkwBPCcMdyajWsI85RqkZ2TUclW.');
INSERT INTO `qrs` VALUES (10, '$2y$10$6tWAsGsGSPIblMwCwXFGgeE2WRfC0/sydCsLKcuTJYZe2RU8pdDay');
INSERT INTO `qrs` VALUES (11, '$2y$10$p6va8T94dnr6rAtR4c1hgO79Q2Gu7xTidspW1S5CtGYtBylmXhoEW');
INSERT INTO `qrs` VALUES (12, '$2y$10$brtmoTie5IEwFie/Ebxb0OQth3xOvrZJmEfxHe5OFD95mXDb4TLdS');
INSERT INTO `qrs` VALUES (13, '$2y$10$tvpcHm4hIbCxHHe3akdkbe.6XLziW9e87/kN6aR44RzxMLm3LPEza');
INSERT INTO `qrs` VALUES (14, 'e18c41e6c0960374acc87de9ab627074d2d3ee9c');
INSERT INTO `qrs` VALUES (15, '2c9e7d8438e7411762f9bcd6a9e2a87a879aa993');
INSERT INTO `qrs` VALUES (16, '1a5767ba21129bbf01d78aa586c3b9f49f62f46c');
INSERT INTO `qrs` VALUES (17, '0f375a4e6854276dac87ada621366a154dc2724d');
INSERT INTO `qrs` VALUES (18, '10521d89ed0415dda1053de92037c8b672353b40');
INSERT INTO `qrs` VALUES (19, 'b37f296868b3fbe440157a18c133260758936ccd');
INSERT INTO `qrs` VALUES (20, 'd9bf26c39d20937c38cdebe56cbad6bd72d97e94');
INSERT INTO `qrs` VALUES (21, 'ff397225a2a95d8ace25caff3c9268fdf9f42e4a');
INSERT INTO `qrs` VALUES (22, 'aaadd5ac6ed7ff5e13990a66e1200e6e4a94b7ff');
INSERT INTO `qrs` VALUES (23, '82dac4647a61cfb4ef248c41569872f52f0b6b6f');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Chris Moyo', 'bmashcom@hotmail.com', NULL, '$2y$10$1WNk03WGzXN44kgA4E2RRu6OZhaj3mRTAq.fjL9FpTk.0KLoqusjW', 'FR1OBZoa5fgEgbNbHCMiNLx18ZeJyFK694Ja8DWk6XGGE1SJJWNkHWrMcwqR', '2018-10-19 17:13:53', '2018-10-19 17:13:53');

SET FOREIGN_KEY_CHECKS = 1;
