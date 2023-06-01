/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100136 (10.1.36-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_tp4

 Target Server Type    : MySQL
 Target Server Version : 100136 (10.1.36-MariaDB)
 File Encoding         : 65001

 Date: 01/06/2023 11:44:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_job
-- ----------------------------
DROP TABLE IF EXISTS `tb_job`;
CREATE TABLE `tb_job`  (
  `id_job` int NOT NULL AUTO_INCREMENT,
  `nama_job` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_job`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_job
-- ----------------------------
INSERT INTO `tb_job` VALUES (1, 'UI/UX Developer');
INSERT INTO `tb_job` VALUES (2, 'Front End Developer');
INSERT INTO `tb_job` VALUES (3, 'Back End Developer');

-- ----------------------------
-- Table structure for tb_member
-- ----------------------------
DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `joining` date NULL DEFAULT NULL,
  `id_job` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `job`(`id_job` ASC) USING BTREE,
  CONSTRAINT `job` FOREIGN KEY (`id_job`) REFERENCES `tb_job` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_member
-- ----------------------------
INSERT INTO `tb_member` VALUES (1, 'rr', 'rr@gmail.com', '22222', '2023-06-01', 1);
INSERT INTO `tb_member` VALUES (4, 'Muhammad Aditya Hasta Pratama', 'mdhstama.second@gmail.com', '081285357972', '2023-05-29', 3);

SET FOREIGN_KEY_CHECKS = 1;
