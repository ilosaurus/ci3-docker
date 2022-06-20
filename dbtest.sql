
CREATE database dbtest;
use dbtest;

-- ----------------------------
-- Table structure for m_parameter
-- ----------------------------
DROP TABLE IF EXISTS `m_parameter`;
CREATE TABLE `m_parameter` (
  `idParameter` int(11) NOT NULL AUTO_INCREMENT,
  `kodeParameter` varchar(3) DEFAULT NULL,
  `parameter` varchar(32) DEFAULT NULL,
  `nilai` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`idParameter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of m_parameter
-- ----------------------------
BEGIN;
INSERT INTO `m_parameter` VALUES (1, '001', 'param 1', '5');
INSERT INTO `m_parameter` VALUES (2, '002', 'Param 2', '6');
COMMIT;

-- ----------------------------
-- Table structure for m_users
-- ----------------------------
DROP TABLE IF EXISTS `m_users`;
CREATE TABLE `m_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` enum('Admin','Pegawai') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_users
-- ----------------------------
BEGIN;
INSERT INTO `m_users` VALUES (2, 'Admin', 'admin', 'SDlhOWxuNk1tSDJVVll4M1JlVzR5QT09', 'Admin');
INSERT INTO `m_users` VALUES (3, 'Pegawai', 'pegawai', 'WU9ObE1wYUJMdjI4TnJOeTVBYWd2Zz09', 'Pegawai');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
