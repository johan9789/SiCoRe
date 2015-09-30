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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `dueño` */

insert  into `dueño`(`id_dueño`,`id_persona`,`nroafiliacion`,`estado`,`idusuario`,`fecharegistro`) values (1,'0000000002','12345',1,'0000000002','2015-08-12 14:25:46');

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

insert  into `persona`(`id_persona`,`nombres`,`paterno`,`materno`,`tipodocumento`,`nrodocumento`,`sexo`,`cel`,`fechanacimiento`,`correo`,`foto`,`idusuarioreg`,`fechareg`,`idusuariomod`,`fechamod`) values ('0000000001','Johan','Pineda','Valer',0,76511248,1,956783310,'1994-03-09','jmpv567@gmail.com','johan.jpg',NULL,'2015-08-12 14:25:13',NULL,'2015-08-12 14:25:13'),('0000000002','Dueño 1','Dueño 1','Dueño 1',1,89780890,1,876876,'1994-03-09','dueño1@sicore.com',NULL,NULL,'2015-08-12 14:25:18',NULL,'2015-08-12 14:25:18'),('PER000000003','Yobani','Castillo','Chura',0,47284794,1,987322535,'1992-08-10','pablocastillo.5.1992@gmail.com','pablo.jpg','USU0001','2015-08-24 12:47:57',NULL,NULL);

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
  PRIMARY KEY (`id_residencia`),
  KEY `FK_residencia` (`id_dueño`),
  KEY `FK_residencia_2` (`id_tipo_residencia`),
  KEY `FK_residencia_3` (`id_urbanizacion`),
  CONSTRAINT `FK_residencia` FOREIGN KEY (`id_dueño`) REFERENCES `dueño` (`id_dueño`),
  CONSTRAINT `FK_residencia_2` FOREIGN KEY (`id_tipo_residencia`) REFERENCES `tipo_residencia` (`id_tipo_residencia`),
  CONSTRAINT `FK_residencia_3` FOREIGN KEY (`id_urbanizacion`) REFERENCES `urbanizacion` (`id_urbanizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `residencia` */

insert  into `residencia`(`id_residencia`,`id_dueño`,`id_tipo_residencia`,`id_urbanizacion`,`descripcion`,`direccion`,`canthabitaciones`,`comentario`,`foto`,`estado`,`idusuarioreg`,`fechareg`,`idusuariomod`,`fechamod`) values ('0000000001',1,1,2,'Residencia 1','Residencia 1',12,'...',NULL,1,NULL,'2015-08-12 14:35:37',NULL,'2015-08-12 14:35:37'),('0000000002',1,2,1,'Residencia 2','Residencia 2',13,'...',NULL,1,NULL,'2015-08-12 14:36:03',NULL,'2015-08-12 14:36:03');

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

/*Table structure for table `tipo_residencia` */

DROP TABLE IF EXISTS `tipo_residencia`;

CREATE TABLE `tipo_residencia` (
  `id_tipo_residencia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_residencia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_residencia` */

insert  into `tipo_residencia`(`id_tipo_residencia`,`descripcion`,`abreviatura`,`estado`) values (1,'Tipo 1','T1',1),(2,'Tipo 2','T2',1);

/*Table structure for table `urbanizacion` */

DROP TABLE IF EXISTS `urbanizacion`;

CREATE TABLE `urbanizacion` (
  `id_urbanizacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_urbanizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `urbanizacion` */

insert  into `urbanizacion`(`id_urbanizacion`,`descripcion`,`direccion`,`estado`) values (1,'Urbanizacion 1','Urb. 1',1),(2,'Urbanizacion 2','Urb. 2',1);

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

insert  into `usuario`(`id_usuario`,`id_persona`,`usuario`,`contrasena`,`estado`,`idusuarioreg`,`fechareg`,`idusuariomod`,`fechamod`,`recuerdame_token`) values ('0000000001','0000000001','johan9789','$2y$10$G5nl.DQUpJO4aEMOJ8mi1OwPgUVX3K1UGs20qLZdo8yzC0eqO6Yua',1,NULL,'2015-08-12 14:26:23',NULL,'2015-08-12 14:26:23','LetkXz0fhj014ngKjbMCLsGFE8iHnTdEZP56iOdSxVbHjU6luv3kTSvHnQLE'),('0000000002','0000000002','dueño1','$2y$10$G5nl.DQUpJO4aEMOJ8mi1OwPgUVX3K1UGs20qLZdo8yzC0eqO6Yua',1,NULL,'2015-08-12 14:26:31',NULL,'2015-08-12 14:26:31',NULL);

/* Function  structure for function  `faNuevoID` */

/*!50003 DROP FUNCTION IF EXISTS `faNuevoID` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `faNuevoID`(
    _nombreTabla VARCHAR(50)
) RETURNS varchar(12) CHARSET latin1
BEGIN
	
	DECLARE varPrefijo CHAR(3);
	DECLARE varNuevoID VARCHAR(9);

	CASE _nombreTabla

		WHEN 'persona' THEN
			SET varPrefijo = 'PER';
			SELECT LPAD(RIGHT(COALESCE(MAX(id_persona),0),9)+1,9,0) INTO varNuevoID FROM persona;

		WHEN 'residencia' THEN
			SET varPrefijo = 'RES';
			SELECT LPAD(RIGHT(COALESCE(MAX(id_residencia),0),9)+1,9,0) INTO varNuevoID FROM residencia;
		
		ELSE
			SET varPrefijo = '';
			SET varNuevoID = 'FALSE';
	END CASE;

	RETURN CONCAT(varPrefijo,varNuevoID);

END */$$
DELIMITER ;

/* Function  structure for function  `faValidarDoc` */

/*!50003 DROP FUNCTION IF EXISTS `faValidarDoc` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `faValidarDoc`(
    _tipo INT(1),
    _numero INT
) RETURNS int(1)
    COMMENT '_tipo 0:DNI (Length=8), 1:CE (Length=9), Rpta 0:False, 1:true *Juan me dijo solo estos 2 tipos de documentos'
BEGIN

	DECLARE varLength INT(1);
	DECLARE varRpta INT(1);

	SET varLength = LENGTH(_numero);

	CASE _tipo

		WHEN 0 THEN
			IF varLength = 8 THEN
				SET varRpta = 1;
			ELSE
				SET varRpta = 0;
			END IF;

		WHEN 1 THEN
			IF varLength = 9 THEN
				SET varRpta = 1;
			ELSE
				SET varRpta = 0;
			END IF;
	
		ELSE
			SET varRpta = 0;

	END CASE;

	RETURN varRpta;

END */$$
DELIMITER ;

/* Procedure structure for procedure `paGuardarPersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `paGuardarPersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `paGuardarPersona`(
    IN _nombres VARCHAR(100),
    IN _paterno VARCHAR(100),
    IN _materno VARCHAR(100),
    IN _tipodocumento INT,
    IN _nrodocumento INT,
    IN _sexo INT,
    IN _cel INT,
    IN _fechanacimiento DATE,
    IN _correo VARCHAR(200),
    IN _foto VARCHAR(100),
    IN _idusuario VARCHAR(10),
    OUT _mensaje VARCHAR(100)
)
BEGIN
	
	DECLARE varFechaActual DATETIME;
	DECLARE varNuevoID VARCHAR(12);
	DECLARE varRegistrosI INT;
	DECLARE varRegistrosF INT;
	DECLARE varVerificarDoc INT(1);

	SET varFechaActual = NOW();
	SET varNuevoID = faNuevoID('persona');
	SET varVerificarDoc = faValidarDoc(_tipodocumento, _nrodocumento);
	SELECT COUNT(*) INTO varRegistrosI FROM persona;

	
	IF varNuevoID <> 'FALSE' THEN

		IF varVerificarDoc = 1 THEN

			INSERT INTO persona VALUES (varNuevoID, _nombres, _paterno, _materno, _tipodocumento, _nrodocumento, _sexo, _cel, _fechanacimiento, _correo, _foto, _idusuario, varFechaActual, NULL, NULL);

		END IF;

	END IF;

	SELECT COUNT(*) INTO varRegistrosF FROM persona;

	IF varRegistrosF > varRegistrosI THEN

		SET _mensaje = 'Registro Insertado';

	ELSE

		SET _mensaje = 'ERROR!!';
	
	END IF;

	SELECT _mensaje;

END */$$
DELIMITER ;

/* Procedure structure for procedure `paListaDuenho` */

/*!50003 DROP PROCEDURE IF EXISTS  `paListaDuenho` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `paListaDuenho`(
    IN _idpersona varchar(12)
)
BEGIN
	SELECT p.id_persona, p.nombres, p.paterno, p.materno, p.tipodocumento, 
		p.nrodocumento, p.sexo, p.cel, p.fechanacimiento, p.correo, 
		p.foto, IFNULL(d.id_dueño,0) AS id_dueño, d.nroafiliacion 
	FROM persona p 
	LEFT JOIN dueño d 
	ON(p.id_persona=d.id_persona)
	where p.id_persona = _idpersona;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
