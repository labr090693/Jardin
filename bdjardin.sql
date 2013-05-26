/*
MySQL Data Transfer
Source Host: localhost
Source Database: bdjardin
Target Host: localhost
Target Database: bdjardin
Date: 25/05/2013 08:09:43 p.m.
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `idmodulo` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `idpadre` int(6) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `idperfil` int(6) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for perfil_modulo
-- ----------------------------
DROP TABLE IF EXISTS `perfil_modulo`;
CREATE TABLE `perfil_modulo` (
  `idmodulo` int(6) NOT NULL,
  `idperfil` int(6) NOT NULL,
  PRIMARY KEY (`idmodulo`,`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(6) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `ultimoacceso` datetime DEFAULT NULL,
  `veces` int(10) DEFAULT NULL,
  `idperfil` int(6) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Procedure structure for PA_guardar_modulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `PA_guardar_modulo`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_guardar_modulo`(_idmodulo int(6), _descripcion varchar(50), _idpadre int(6), _url varchar(50))
IF _idmodulo='' THEN

insert into modulo(idmodulo,descripcion, idpadre, url)
values (_idmodulo,_descripcion,_idpadre,_url);

ELSE

update modulo set

idmodulo=_idmodulo,
descripcion=_descripcion,
idpadre=_idpadre,
url=_url

where idmodulo=_idmodulo;

END IF;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for PA_guardar_perfil
-- ----------------------------
DROP PROCEDURE IF EXISTS `PA_guardar_perfil`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_guardar_perfil`(_idperfil int, _descripcion varchar(50))
IF _idperfil='' THEN

insert into perfil(idperfil,descripcion)
values (_idperfil,_descripcion);

ELSE

update perfil  set

idperfil=_idperfil,
descripcion=_descripcion

where idperfil=_idperfil;

END IF;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for PA_guardar_usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `PA_guardar_usuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_guardar_usuario`(_idusuario int(6),_nombre varchar(50),_usuario varchar(50),_clave varchar(50),_fecharegistro date,_ultimoacceso datetime,_veces int(11),_idperfil int(6),_estado char(1))
IF _idusuario='' THEN
insert into usuario(idusuario,nombre,usuario,clave,fecharegistro,ultimoacceso,veces,idperfil,estado)
values (_idusuario,_nombre,_usuario,_clave,_fecharegistro,_ultimoacceso,_veces,_idperfil,_estado);

ELSE

update usuario set
 idusuario=_idusuario,
 nombre=_nombre,
 usuario=_usuario,
 clave=_clave,
 fecharegistro=_fecharegistro,
 ultimoacceso=_ultimoacceso,
 veces=_veces,
 idperfil=_idperfil,
estado=_estado

where idusuario=_idusuario;

END IF;;
DELIMITER ;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'Seguridad', '0', '#');
INSERT INTO `modulo` VALUES ('2', 'Matricula', '0', '#');
INSERT INTO `modulo` VALUES ('3', 'Asistencia', '0', '#');
INSERT INTO `modulo` VALUES ('4', 'Modulos', '1', 'seguridad/modulos/');
INSERT INTO `modulo` VALUES ('5', 'Perfiles', '1', 'seguridad/perfiles/');
INSERT INTO `modulo` VALUES ('6', 'Permisos', '1', 'seguridad/permisos/');
INSERT INTO `modulo` VALUES ('7', 'Matricula', '2', 'matricula/');
INSERT INTO `perfil` VALUES ('0', 'Secretaria');
INSERT INTO `perfil` VALUES ('1', 'Administrador');
INSERT INTO `perfil_modulo` VALUES ('1', '1');
INSERT INTO `perfil_modulo` VALUES ('2', '0');
INSERT INTO `perfil_modulo` VALUES ('2', '1');
INSERT INTO `perfil_modulo` VALUES ('3', '0');
INSERT INTO `perfil_modulo` VALUES ('3', '1');
INSERT INTO `perfil_modulo` VALUES ('4', '1');
INSERT INTO `perfil_modulo` VALUES ('5', '1');
INSERT INTO `perfil_modulo` VALUES ('6', '1');
INSERT INTO `perfil_modulo` VALUES ('7', '0');
INSERT INTO `perfil_modulo` VALUES ('7', '1');
INSERT INTO `usuario` VALUES ('1', 'Luis Angel', 'admin', '123', '2013-05-11', '2013-05-23 03:55:44', '0', '1', '1');
INSERT INTO `usuario` VALUES ('2', 'linder alexander', 'alexander', '123', '2013-05-17', '2013-05-26 00:13:18', '0', '1', '1');
