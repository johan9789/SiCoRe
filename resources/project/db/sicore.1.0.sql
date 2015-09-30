/*
SQLyog Ultimate v9.01 
MySQL - 5.6.21 : Database - sicore
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sicore` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sicore`;

/*Table structure for table `acceso` */

DROP TABLE IF EXISTS `acceso`;

CREATE TABLE `acceso` (
  `id_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acceso` */

/*Table structure for table `dueño` */

DROP TABLE IF EXISTS `dueño`;

CREATE TABLE `dueño` (
  `id_dueño` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` varchar(12) DEFAULT NULL,
  `nroafiliacion` varchar(10) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `idusuario` varchar(12) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dueño`),
  KEY `FK_dueño` (`id_persona`),
  CONSTRAINT `FK_dueño` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dueño` */

/*Table structure for table `permiso` */

DROP TABLE IF EXISTS `permiso`;

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_acceso` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `FK_permiso` (`id_acceso`),
  CONSTRAINT `FK_permiso` FOREIGN KEY (`id_acceso`) REFERENCES `acceso` (`id_acceso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `permiso` */

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` varchar(12) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `paterno` varchar(100) DEFAULT NULL,
  `materno` varchar(100) DEFAULT NULL,
  `tipodocumento` int(11) DEFAULT NULL,
  `nrodocumento` int(12) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `cel` int(12) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `idusuarioreg` varchar(10) DEFAULT NULL,
  `fechareg` datetime DEFAULT NULL,
  `idusuariomod` varchar(10) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`,`nombres`,`paterno`,`materno`,`tipodocumento`,`nrodocumento`,`sexo`,`cel`,`fechanacimiento`,`correo`,`foto`,`idusuarioreg`,`fechareg`,`idusuariomod`,`fechamod`) values ('0000000001','Johan','Pineda','Valer',0,76511248,1,956783310,'1994-03-09','jmpv567@gmail.com','johan.jpg',NULL,NULL,NULL,NULL);

/*Table structure for table `residencia` */

DROP TABLE IF EXISTS `residencia`;

CREATE TABLE `residencia` (
  `id_residencia` varchar(10) NOT NULL,
  `id_dueño` int(11) DEFAULT NULL,
  `id_tipo_residencia` int(11) DEFAULT NULL,
  `id_urbanizacion` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `canthabitaciones` int(11) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `idusuarioreg` varchar(10) DEFAULT NULL,
  `fechareg` datetime DEFAULT NULL,
  `idusuariomod` varchar(10) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL,
  PRIMARY KEY (`id_residencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `residencia` */

insert  into `residencia`(`id_residencia`,`id_dueño`,`id_tipo_residencia`,`id_urbanizacion`,`descripcion`,`direccion`,`canthabitaciones`,`comentario`,`foto`,`estado`,`idusuarioreg`,`fechareg`,`idusuariomod`,`fechamod`) values ('0000000001',NULL,NULL,NULL,'Residencia 1','Jr. ... 123',10,'residencia','residendia.jpg',1,NULL,NULL,NULL,NULL),('0000000002',NULL,NULL,NULL,'Residencia 2','Jr. ... 123',12,'residencia','residendia.jpg',1,NULL,NULL,NULL,NULL);

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rol` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` varchar(10) NOT NULL,
  `id_persona` varchar(12) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `idusuarioreg` varchar(10) DEFAULT NULL,
  `fechareg` datetime DEFAULT NULL,
  `idusuariomod` varchar(10) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL,
  `recuerdame_token` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_usuario` (`id_persona`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`id_persona`,`usuario`,`contrasena`,`estado`,`idusuarioreg`,`fechareg`,`idusuariomod`,`fechamod`,`recuerdame_token`) values ('0000000001','0000000001','johan9789','$2y$10$G5nl.DQUpJO4aEMOJ8mi1OwPgUVX3K1UGs20qLZdo8yzC0eqO6Yua',1,NULL,NULL,NULL,NULL,'xTXfxind9E5WgslJndBfehp8weeM5L36FzqpGrfxEflcH5KgXJ9w5AImiP7O');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
