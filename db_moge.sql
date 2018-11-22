/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : db_moge

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 21/11/2018 11:51:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `gambar_barang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi_barang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'BMW G310 GS', 20000000, 'images/BMW G310 GS.jpg', 'Maecenas hendrerit porttitor nunc non blandit. Duis eget mi sed tellus condimentum consequat. Maecenas rutrum nunc quis gravida pharetra. Integer hendrerit risus et arcu pulvinar auctor.');
INSERT INTO `barang` VALUES (2, 'Honda CBR500', 25000000, 'images/Honda CBR500R.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae dolor velit. Nullam nec sem elit. Donec id urna eu justo efficitur ornare. Ut aliquam tristique sem, vitae placerat ex fermentum eget. Aenean volutpat, lacus at interdum sodales, nulla erat venenatis sapien, ut elementum massa leo vel sem. ');
INSERT INTO `barang` VALUES (3, 'Honda Rebel', 17999000, 'images/Honda Rebel.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor metus non urna sodales vestibulum. Donec congue luctus libero, vel suscipit nisl volutpat eu. Ut viverra libero id tellus accumsan tincidunt. Nunc fringilla erat eu mattis luctus. Etiam a tortor nec massa tincidunt vulputate. Phasellus ligula ante, sodales vel nulla quis, rutrum accumsan lacus. Suspendisse dapibus quis arcu at faucibus. Donec iaculis enim lacus, ultrices varius leo tempor quis. Fusce euismod, mi ultrices mattis pharetra, leo leo varius ex, id faucibus lacus neque a mi. Morbi a mattis sem. Donec in convallis diam, vitae iaculis eros.');
INSERT INTO `barang` VALUES (4, 'Kawasaki ER-6n', 21000000, 'images/Kawasaki ER-6n.jpg', 'Suspendisse potenti. Etiam sed dui pellentesque ex convallis lobortis a sed eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;');
INSERT INTO `barang` VALUES (13, 'Kawasaki Vulcan', 22222222, 'images/5bf42467888430.01331605.jpg', 'lorem ipsum');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_penjualan` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `atas_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_tujuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kurir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kode_pembayaran` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (18, '2018-11-19', 4, 4, 'amri', 'tigaraksa', 'kurir 1', 'bank 1', 21000000, '5bf2bffa7aef10.566757694', 'Barang Telah Sampai');
INSERT INTO `penjualan` VALUES (19, '2018-11-20', 4, 2, 'amri', 'tigaraksa', 'kurir 1', 'bank 1', 25000000, '5bf3cd3a2f7628.076867744', 'belum dibayar');
INSERT INTO `penjualan` VALUES (20, '2018-11-20', 4, 4, 'Amri', 'Tigaraksa', 'kurir 1', 'bank 1', 21000000, '5bf4251b73f384.782401524', 'Barang dalam perjalanan');
INSERT INTO `penjualan` VALUES (21, '2018-11-21', 4, 13, 'Syaeful Amri', 'Tigaraksa Tangerang', 'kurir 1', 'bank 1', 22222222, '5bf4da9cee1024.510541864', 'belum dibayar');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', '', '', '', '', 0, '0000-00-00');
INSERT INTO `user` VALUES (2, 'tamu', 'tamu', 'test@gmail.com', 'test', 'test lokasi dimana', '082222222222', 1, '1998-12-12');
INSERT INTO `user` VALUES (4, 'amri', 'amri', 'amri@gmail.com', 'amri', 'tigaraksa', '081111111111', 0, '1970-01-01');

SET FOREIGN_KEY_CHECKS = 1;
