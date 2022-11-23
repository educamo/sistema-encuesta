/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : proyecto

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 23/11/2022 17:41:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for familia
-- ----------------------------
DROP TABLE IF EXISTS `familia`;
CREATE TABLE `familia`  (
  `familiaId` int NOT NULL AUTO_INCREMENT,
  `familiar` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jefeFamilia` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`familiaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of familia
-- ----------------------------

-- ----------------------------
-- Table structure for gas
-- ----------------------------
DROP TABLE IF EXISTS `gas`;
CREATE TABLE `gas`  (
  `idGas` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cedula` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `tipo` int NOT NULL,
  `bombonaSocial` int NULL DEFAULT NULL,
  `codigo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idGas`) USING BTREE,
  INDEX `cedulaGas`(`cedula` ASC) USING BTREE,
  CONSTRAINT `cedulaGas` FOREIGN KEY (`cedula`) REFERENCES `general` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gas
-- ----------------------------
INSERT INTO `gas` VALUES ('1', '13', 1, 27, 1, 'bb271');

-- ----------------------------
-- Table structure for general
-- ----------------------------
DROP TABLE IF EXISTS `general`;
CREATE TABLE `general`  (
  `cedula` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellido` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sexo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `edoCivil` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` int NOT NULL,
  `jefeFamilia` int NULL DEFAULT 0,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of general
-- ----------------------------
INSERT INTO `general` VALUES ('12', 'Juan', 'Gonzalez', 'masculino', '1994-12-01', 'soltero', 987655, 1);
INSERT INTO `general` VALUES ('13', 'carlos', 'paredes', 'masculino', '1984-10-13', 'soltero', 9080987, 0);
INSERT INTO `general` VALUES ('14', 'mary', 'pernia', 'femenino', '2022-02-08', 'casado', 3456456, 0);

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `usuario` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contra` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('admin', '123456', 'Administrador');

-- ----------------------------
-- Table structure for salud
-- ----------------------------
DROP TABLE IF EXISTS `salud`;
CREATE TABLE `salud`  (
  `idMedicinas` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `medicamentos` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `patologias` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `embarazadas` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `discapacidad` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idMedicinas`) USING BTREE,
  INDEX `cedulaSalud`(`cedula` ASC) USING BTREE,
  CONSTRAINT `cedulaSalud` FOREIGN KEY (`cedula`) REFERENCES `general` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of salud
-- ----------------------------
INSERT INTO `salud` VALUES (2, '12', 'esomeprazol', 'Diabetes', 'no', 'problemas de cornea');
INSERT INTO `salud` VALUES (3, '13', 'propanolol', 'Hipertensión', 'no', 'no');

-- ----------------------------
-- Table structure for vivienda
-- ----------------------------
DROP TABLE IF EXISTS `vivienda`;
CREATE TABLE `vivienda`  (
  `NoVivienda` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cedula` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipoVivienda` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `condicion` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipoTecho` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipoPiso` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agua` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `luz` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `aguasNegras` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`NoVivienda`) USING BTREE,
  INDEX `cedulaVivienda`(`cedula` ASC) USING BTREE,
  CONSTRAINT `cedulaVivienda` FOREIGN KEY (`cedula`) REFERENCES `general` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vivienda
-- ----------------------------
INSERT INTO `vivienda` VALUES ('1', '13', 'casa', 'buena', 'platabanda', 'cemento', 'si', 'si', 'si');

SET FOREIGN_KEY_CHECKS = 1;
