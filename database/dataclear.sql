-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.33


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema tabacodb
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ tabacodb;
USE tabacodb;

--
-- Table structure for table `tabacodb`.`ajustes`
--

DROP TABLE IF EXISTS `ajustes`;
CREATE TABLE `ajustes` (
  `idajuste` int(5) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` float(9,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idajuste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`ajustes`
--

/*!40000 ALTER TABLE `ajustes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ajustes` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `idarticulo` int(5) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `stock` float(9,3) DEFAULT NULL,
  `precio` float(9,3) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Activo',
  `venta` int(1) DEFAULT '0',
  PRIMARY KEY (`idarticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`articulos`
--

/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`idarticulo`,`codigo`,`nombre`,`stock`,`precio`,`estado`,`venta`) VALUES 
 (1,'001','JALEA PRODUCCION',0.000,25.300,'Activo',0),
 (2,'002','JALEA TOBO 24KG',0.000,1.620,'Activo',1),
 (3,'003','TABACO',0.000,0.025,'Activo',0),
 (4,'004','TOBO ENVASE ',0.000,1.100,'Activo',0),
 (5,'003','CAJAS DE TABACO',0.000,4.000,'Activo',0);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `idcliente` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `tobos` int(5) DEFAULT '0',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`cocedor`
--

DROP TABLE IF EXISTS `cocedor`;
CREATE TABLE `cocedor` (
  `idcocedor` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `activo` int(1) DEFAULT '0',
  PRIMARY KEY (`idcocedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`cocedor`
--

/*!40000 ALTER TABLE `cocedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cocedor` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`controltobos`
--

DROP TABLE IF EXISTS `controltobos`;
CREATE TABLE `controltobos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idcliente` int(5) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
  `deposito` int(3) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `observacion` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`controltobos`
--

/*!40000 ALTER TABLE `controltobos` DISABLE KEYS */;
/*!40000 ALTER TABLE `controltobos` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`deposito`
--

DROP TABLE IF EXISTS `deposito`;
CREATE TABLE `deposito` (
  `iddeposito` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `encargado` varchar(40) DEFAULT NULL,
  `movil` varchar(20) DEFAULT '0',
  PRIMARY KEY (`iddeposito`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`deposito`
--

/*!40000 ALTER TABLE `deposito` DISABLE KEYS */;
INSERT INTO `deposito` (`iddeposito`,`nombre`,`encargado`,`movil`) VALUES 
 (1,'PRINCIPAL','Frank','0154121223'),
 (2,'PRODUCCION','Frank','041623561'),
 (3,'ALMACEN 2','Frank','424515154');
/*!40000 ALTER TABLE `deposito` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`detalle_ajuste`
--

DROP TABLE IF EXISTS `detalle_ajuste`;
CREATE TABLE `detalle_ajuste` (
  `iddetalle_ajuste` int(5) NOT NULL AUTO_INCREMENT,
  `idajuste` int(8) NOT NULL,
  `idarticulo` int(8) NOT NULL,
  `tipo_ajuste` varchar(15) NOT NULL,
  `cantidad` float(9,3) NOT NULL,
  `costo` float(9,3) DEFAULT NULL,
  `valorizado` float(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_ajuste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`detalle_ajuste`
--

/*!40000 ALTER TABLE `detalle_ajuste` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ajuste` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`detalle_entrega`
--

DROP TABLE IF EXISTS `detalle_entrega`;
CREATE TABLE `detalle_entrega` (
  `iddetalle` int(5) NOT NULL AUTO_INCREMENT,
  `identrega` int(5) DEFAULT NULL,
  `idarticulo` int(5) DEFAULT NULL,
  `cantidad` float(9,3) DEFAULT NULL,
  `precio` float(9,3) DEFAULT NULL,
  `valor` float(9,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`detalle_entrega`
--

/*!40000 ALTER TABLE `detalle_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_entrega` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`detalle_traslado`
--

DROP TABLE IF EXISTS `detalle_traslado`;
CREATE TABLE `detalle_traslado` (
  `iddetalle` int(5) NOT NULL AUTO_INCREMENT,
  `idtraslado` int(5) DEFAULT NULL,
  `idarticulo` int(5) DEFAULT NULL,
  `cantidad` float(7,2) DEFAULT NULL,
  `precio` float(9,3) DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`detalle_traslado`
--

/*!40000 ALTER TABLE `detalle_traslado` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_traslado` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `idempresa` int(1) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `rif` varchar(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fechasistema` date DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `corre_iva` int(11) DEFAULT '0',
  `corre_islr` int(11) DEFAULT '0',
  `tc` double(15,2) DEFAULT NULL,
  `peso` double(9,2) DEFAULT NULL,
  `tasa_banco` double(15,3) DEFAULT NULL,
  `serie` text,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`empresa`
--

/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`idempresa`,`nombre`,`direccion`,`rif`,`telefono`,`fechasistema`,`inicio`,`corre_iva`,`corre_islr`,`tc`,`peso`,`tasa_banco`,`serie`) VALUES 
 (1,'FABRICA DE JALEA CORCEL','Ctra. via  Zea Casa s/n Sector Km 6 y 7  Caño El Tigre, Zea Estado Merida','J00000000','0416-2065648','2024-08-01','2023-08-01',0,0,0.00,0.00,0.000,'0');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`entrega`
--

DROP TABLE IF EXISTS `entrega`;
CREATE TABLE `entrega` (
  `identrega` int(5) NOT NULL AUTO_INCREMENT,
  `idcliente` int(5) DEFAULT NULL,
  `idusuario` int(5) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `totalventa` float(9,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`identrega`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`entrega`
--

/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`existencia`
--

DROP TABLE IF EXISTS `existencia`;
CREATE TABLE `existencia` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idalmacen` int(5) DEFAULT NULL,
  `idarticulo` int(5) DEFAULT NULL,
  `existencia` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`existencia`
--

/*!40000 ALTER TABLE `existencia` DISABLE KEYS */;
INSERT INTO `existencia` (`id`,`idalmacen`,`idarticulo`,`existencia`) VALUES 
 (1,2,1,0.00),
 (2,2,2,0.00),
 (3,1,3,0.00),
 (4,1,4,0.00),
 (5,1,2,0.00),
 (6,1,1,0.00),
 (7,3,2,0.00),
 (8,1,5,0.00),
 (9,3,4,0.00),
 (10,2,4,0.00);
/*!40000 ALTER TABLE `existencia` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabacodb`.`failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`kardex`
--

DROP TABLE IF EXISTS `kardex`;
CREATE TABLE `kardex` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `documento` varchar(40) DEFAULT NULL,
  `idarticulo` int(5) DEFAULT NULL,
  `cantidad` float(9,3) DEFAULT NULL,
  `costo` float(9,3) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `tipo` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`kardex`
--

/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE `laboratorio` (
  `idprueba` int(11) NOT NULL AUTO_INCREMENT,
  `idrecoleccion` int(9) NOT NULL,
  `ltst1` float(9,3) DEFAULT '0.000',
  `alco` tinyint(1) DEFAULT '0',
  `pero` tinyint(1) DEFAULT '0',
  `acdz` float(5,2) DEFAULT '0.00',
  `suer` tinyint(1) DEFAULT '0',
  `rexa` varchar(7) DEFAULT NULL,
  `gra` float(5,2) DEFAULT '0.00',
  `saca` tinyint(1) DEFAULT '0',
  `temp` float(9,3) DEFAULT '0.000',
  `dep` int(5) DEFAULT '0',
  `tnq` int(3) DEFAULT NULL,
  `ltst2` float(9,3) DEFAULT '0.000',
  `alco2` tinyint(1) DEFAULT '0',
  `pero2` tinyint(1) DEFAULT '0',
  `acdz2` float(5,2) DEFAULT '0.00',
  `suer2` tinyint(1) DEFAULT '0',
  `rexa2` varchar(7) DEFAULT NULL,
  `gra2` float(5,2) DEFAULT '0.00',
  `saca2` tinyint(1) DEFAULT '0',
  `temp2` float(9,3) DEFAULT '0.000',
  `dep2` int(5) DEFAULT NULL,
  `tnq2` int(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idprueba`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`laboratorio`
--

/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` (`idprueba`,`idrecoleccion`,`ltst1`,`alco`,`pero`,`acdz`,`suer`,`rexa`,`gra`,`saca`,`temp`,`dep`,`tnq`,`ltst2`,`alco2`,`pero2`,`acdz2`,`suer2`,`rexa2`,`gra2`,`saca2`,`temp2`,`dep2`,`tnq2`,`fecha`) VALUES 
 (4,4,2000.000,0,0,6.00,0,'TRR3+H',1.30,0,-1.000,2,18,100.000,0,0,5.40,0,'TRR3H',5.98,0,-2.000,7,30,'2023-08-20'),
 (5,5,1700.000,0,0,2.00,0,'TRR3+H',2.00,0,-6.000,4,23,0.000,0,0,0.00,0,'TRR3+H',0.00,0,-1.000,7,30,'2023-08-20'),
 (6,6,3150.000,0,0,0.00,0,'TRR3+H',NULL,0,1.000,2,18,0.000,0,0,0.00,0,'TRR3+H',0.00,0,-2.000,7,30,'2023-08-20'),
 (7,7,2000.000,0,0,3.00,0,'TRR3+H',3.00,0,-4.000,2,18,2000.000,0,0,5.40,0,'TRR3+H',2.00,0,-3.000,2,18,'2023-08-20'),
 (8,8,448.000,0,0,6.00,0,'TRR3+H',2.00,0,-5.000,5,25,0.000,0,0,0.00,0,'TRR3+H',0.00,0,0.000,7,30,'2023-08-21'),
 (9,9,346.000,0,0,1.00,0,'TRR3+H',1.00,0,-6.000,5,25,0.000,0,0,0.00,0,'TRR3+H',0.00,0,0.000,7,30,'2023-08-21'),
 (10,10,5050.000,0,0,1.00,0,'TRR3+H',2.00,0,-2.000,2,18,5050.000,0,0,1.00,0,'TRR3+H',1.00,0,-2.000,2,19,'2023-08-21'),
 (11,11,1268.000,0,0,1.00,0,'TRR3+H',2.00,0,-2.000,4,23,2852.000,0,0,1.00,0,'TRR3+H',1.00,0,1.000,5,25,'2023-08-21');
INSERT INTO `laboratorio` (`idprueba`,`idrecoleccion`,`ltst1`,`alco`,`pero`,`acdz`,`suer`,`rexa`,`gra`,`saca`,`temp`,`dep`,`tnq`,`ltst2`,`alco2`,`pero2`,`acdz2`,`suer2`,`rexa2`,`gra2`,`saca2`,`temp2`,`dep2`,`tnq2`,`fecha`) VALUES 
 (12,12,1750.000,0,0,6.00,0,'TRR3+H',4.56,0,NULL,4,23,0.000,0,0,0.00,0,'TRR3+H',NULL,0,0.000,7,30,'2023-08-27'),
 (13,13,2850.000,0,0,3.00,0,'TRR3+H',3.00,0,-3.000,4,24,0.000,0,0,0.00,0,'TRR3+H',0.00,0,0.000,7,30,'2023-08-27'),
 (14,14,2000.000,0,0,6.00,0,'TRR3+H',3.60,0,-1.000,5,25,2730.000,0,0,-1.00,0,'TRR3H',-1.00,0,1.000,5,26,'2023-08-27'),
 (15,15,1250.000,0,0,1.00,0,'TRR3+H',-1.00,0,-2.000,5,25,500.000,0,0,1.00,0,'TRR3+H',1.00,0,-1.000,5,26,'2023-08-27');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabacodb`.`migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_08_19_000000_create_failed_jobs_table',1),
 (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`parrillas`
--

DROP TABLE IF EXISTS `parrillas`;
CREATE TABLE `parrillas` (
  `idparrilla` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `tren` float(9,3) DEFAULT '0.000',
  PRIMARY KEY (`idparrilla`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`parrillas`
--

/*!40000 ALTER TABLE `parrillas` DISABLE KEYS */;
INSERT INTO `parrillas` (`idparrilla`,`nombre`,`tren`) VALUES 
 (1,'Parrilla 1',0.000),
 (2,'Parrilla 2',0.000),
 (3,'Parrilla 3',0.000);
/*!40000 ALTER TABLE `parrillas` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`parrillaturno`
--

DROP TABLE IF EXISTS `parrillaturno`;
CREATE TABLE `parrillaturno` (
  `id` int(3) DEFAULT NULL,
  `parrilla` int(3) DEFAULT NULL,
  `turno` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`parrillaturno`
--

/*!40000 ALTER TABLE `parrillaturno` DISABLE KEYS */;
INSERT INTO `parrillaturno` (`id`,`parrilla`,`turno`,`status`) VALUES 
 (1,1,1,0),
 (2,1,2,0),
 (3,2,1,0),
 (4,2,2,0),
 (5,3,1,0),
 (6,3,2,0);
/*!40000 ALTER TABLE `parrillaturno` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabacodb`.`password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabacodb`.`password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabacodb`.`personal_access_tokens`
--

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`produccion`
--

DROP TABLE IF EXISTS `produccion`;
CREATE TABLE `produccion` (
  `idproceso` int(5) NOT NULL AUTO_INCREMENT,
  `idsupervisor` int(3) DEFAULT NULL,
  `idparrilla` int(3) DEFAULT NULL,
  `idcocedor` int(3) DEFAULT NULL,
  `idturno` int(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechacierre` date DEFAULT NULL,
  `kgsubido` float(9,3) DEFAULT NULL,
  `kgcocina` float(9,3) DEFAULT NULL,
  `kgbajado` float(9,3) DEFAULT '0.000',
  `kgjalea` float(9,3) DEFAULT '0.000',
  `rendimiento` float(9,3) DEFAULT '0.000',
  `kgtren` float(9,3) DEFAULT '0.000',
  `observacion` varchar(50) DEFAULT NULL,
  `estatus` int(2) DEFAULT '0',
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idproceso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`produccion`
--

/*!40000 ALTER TABLE `produccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `produccion` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`productores`
--

DROP TABLE IF EXISTS `productores`;
CREATE TABLE `productores` (
  `idproductor` int(5) NOT NULL AUTO_INCREMENT,
  `idruta` int(3) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo` int(11) DEFAULT '0',
  PRIMARY KEY (`idproductor`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`productores`
--

/*!40000 ALTER TABLE `productores` DISABLE KEYS */;
INSERT INTO `productores` (`idproductor`,`idruta`,`nombre`,`codigo`,`telefono`,`tipo`) VALUES 
 (1,1,'finca A','639',NULL,0),
 (2,1,'finca b','620',NULL,0),
 (3,1,'finca C','608',NULL,0),
 (4,2,'finca d ','810-LaRivera',NULL,0),
 (5,2,'finca e','810-Fidel',NULL,0),
 (7,1,'finca g','605',NULL,0),
 (8,1,'finca H','625',NULL,0),
 (10,1,'finca I','631',NULL,0),
 (14,4,'finca m','616',NULL,0),
 (15,4,'finca n','618',NULL,0),
 (19,3,'finca r','elcañito',NULL,0),
 (20,3,'finca s','timoure',NULL,0),
 (21,3,'finca t','sanantonio',NULL,0),
 (22,4,'finca u','747',NULL,0),
 (28,2,'finca 4','810-altoViento',NULL,0),
 (33,1,'finca','609',NULL,0),
 (34,1,'finca','633',NULL,0),
 (35,1,'finca','734',NULL,0),
 (36,1,'fina','641',NULL,0),
 (37,1,'finca','656',NULL,0),
 (38,1,'finca','684',NULL,0),
 (39,1,'finca','629',NULL,0),
 (40,1,'finca','745',NULL,0),
 (41,1,'finca','626',NULL,0),
 (42,1,'finca','736',NULL,0),
 (43,1,'finca','786',NULL,0),
 (44,1,'finca','708',NULL,0),
 (45,1,'finca','613',NULL,0),
 (46,1,'finca','781',NULL,0);
INSERT INTO `productores` (`idproductor`,`idruta`,`nombre`,`codigo`,`telefono`,`tipo`) VALUES 
 (47,1,'finca','746',NULL,0),
 (48,1,'finca','747','04151235',0),
 (49,1,'finca','756',NULL,0),
 (50,1,'finca','622',NULL,0),
 (51,1,'finca','680',NULL,0),
 (52,6,'finca','680',NULL,0),
 (53,3,'finca','agro.Ceres',NULL,0),
 (54,3,'finca','Luis Chacin',NULL,0),
 (55,5,'FINCA 96','966','484456321',0),
 (56,5,'TORTA','546545','5456465',0),
 (57,1,'SDFADFAS','dfasdfasdf','asdfasdf',1);
/*!40000 ALTER TABLE `productores` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`recoleccion`
--

DROP TABLE IF EXISTS `recoleccion`;
CREATE TABLE `recoleccion` (
  `idrecoleccion` int(9) NOT NULL AUTO_INCREMENT,
  `idruta` int(3) DEFAULT NULL,
  `idrecolector` int(3) NOT NULL,
  `litros` float(9,3) DEFAULT NULL,
  `litrostarima` float(9,3) DEFAULT '0.000',
  `plb` float(9,3) DEFAULT '0.000',
  `observacion` varchar(50) DEFAULT NULL,
  `estatus` int(1) DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `anulada` int(1) DEFAULT '0',
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idrecoleccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`recoleccion`
--

/*!40000 ALTER TABLE `recoleccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `recoleccion` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idrol` int(5) NOT NULL AUTO_INCREMENT,
  `iduser` int(5) DEFAULT NULL,
  `newarticulo` int(1) DEFAULT '0',
  `editarticulo` int(1) DEFAULT '0',
  `newajuste` int(1) DEFAULT '0',
  `showajuste` int(1) DEFAULT '0',
  `newcliente` int(1) DEFAULT '0',
  `editcliente` int(1) DEFAULT '0',
  `newcocedor` int(1) DEFAULT '0',
  `editcocedor` int(1) DEFAULT '0',
  `newdeposito` int(1) DEFAULT '0',
  `editdeposito` int(1) DEFAULT '0',
  `showdeposito` int(1) DEFAULT '0',
  `newproceso` int(1) DEFAULT '0',
  `closeproceso` int(1) DEFAULT '0',
  `newrecepcion` int(1) DEFAULT '0',
  `anularrecepcion` int(1) DEFAULT '0',
  `ventas` int(1) DEFAULT '0',
  `newventa` int(1) DEFAULT '0',
  `anularventa` int(1) DEFAULT '0',
  `showventa` int(1) DEFAULT '0',
  `entobar` int(1) DEFAULT '0',
  `newtraslado` int(1) DEFAULT '0',
  `showtraslado` int(1) DEFAULT '0',
  `actroles` int(1) DEFAULT '0',
  `analisis` int(1) DEFAULT '0',
  `rproduccion` int(1) DEFAULT '0',
  `rinventario` int(1) DEFAULT '0',
  `rventas` int(1) DEFAULT '0',
  `rclientes` int(1) DEFAULT '0',
  `showproduccion` int(1) DEFAULT '0',
  `updatepass` int(1) DEFAULT '0',
  `controltobos` int(1) DEFAULT '0',
  `movtobos` int(1) DEFAULT '0',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`idrol`,`iduser`,`newarticulo`,`editarticulo`,`newajuste`,`showajuste`,`newcliente`,`editcliente`,`newcocedor`,`editcocedor`,`newdeposito`,`editdeposito`,`showdeposito`,`newproceso`,`closeproceso`,`newrecepcion`,`anularrecepcion`,`ventas`,`newventa`,`anularventa`,`showventa`,`entobar`,`newtraslado`,`showtraslado`,`actroles`,`analisis`,`rproduccion`,`rinventario`,`rventas`,`rclientes`,`showproduccion`,`updatepass`,`controltobos`,`movtobos`) VALUES 
 (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1),
 (2,2,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
 (3,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
 (4,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
 (5,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`rutas`
--

DROP TABLE IF EXISTS `rutas`;
CREATE TABLE `rutas` (
  `idruta` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idruta`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`rutas`
--

/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` (`idruta`,`nombre`,`contacto`,`telefono`) VALUES 
 (1,'TRANSPORTE DON JULIAN','julian alvarez','0275484512'),
 (2,'TRANSPORTE EDUARDO FUEN MAYOR','eduardo fuen mayor','0141654654'),
 (3,'Transporte Don Toto','jose mora','04146-9067104'),
 (4,'TRASNPORTE HERIBERTO','jose heriberto mora','0112-46532132'),
 (5,'TRANSPORTE NKS','wuilmer puerta','04161224'),
 (6,'TRASNPORTE 5 AGUILAS','jose ramirez','0412562341'),
 (7,'EL HATO',NULL,'012421');
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`sistema`
--

DROP TABLE IF EXISTS `sistema`;
CREATE TABLE `sistema` (
  `idempresa` int(1) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechavence` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`sistema`
--

/*!40000 ALTER TABLE `sistema` DISABLE KEYS */;
INSERT INTO `sistema` (`idempresa`,`fechainicio`,`fechavence`) VALUES 
 (1,'2023-08-01','2024-08-01');
/*!40000 ALTER TABLE `sistema` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`tanques`
--

DROP TABLE IF EXISTS `tanques`;
CREATE TABLE `tanques` (
  `idtanque` int(3) NOT NULL AUTO_INCREMENT,
  `iddeposito` int(3) DEFAULT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `capacidad` float(9,3) DEFAULT NULL,
  `uso` float(9,3) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idtanque`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`tanques`
--

/*!40000 ALTER TABLE `tanques` DISABLE KEYS */;
INSERT INTO `tanques` (`idtanque`,`iddeposito`,`nombre`,`capacidad`,`uso`,`tipo`) VALUES 
 (16,1,'Tanque1',14700.000,0.000,''),
 (17,1,'Tanque2',14700.000,0.000,''),
 (18,2,'Tanque1',9900.000,0.000,' '),
 (19,2,'Tanque2',9900.000,0.000,' '),
 (20,3,'Tanque1',4619.000,0.000,' '),
 (21,3,'Tanque2',5421.000,0.000,' '),
 (22,3,'Tanque3',4660.000,0.000,''),
 (23,4,'Tanque1',3350.000,0.000,' '),
 (24,4,'Tanque2',3350.000,0.000,' '),
 (25,5,'Tanque1',3300.000,0.000,' '),
 (26,5,'Tanque2',3250.000,0.000,' '),
 (27,6,'Tanque1',4900.000,0.000,''),
 (28,6,'Tanque2',4900.000,0.000,''),
 (29,6,'Tanque3',4900.000,0.000,NULL),
 (30,7,'Tanque1',1500.000,0.000,'TRR3+H');
/*!40000 ALTER TABLE `tanques` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`traslados`
--

DROP TABLE IF EXISTS `traslados`;
CREATE TABLE `traslados` (
  `idtraslado` int(6) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `responsable` varchar(20) DEFAULT NULL,
  `origen` int(5) DEFAULT NULL,
  `destino` int(5) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtraslado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`traslados`
--

/*!40000 ALTER TABLE `traslados` DISABLE KEYS */;
/*!40000 ALTER TABLE `traslados` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`turnos`
--

DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos` (
  `idturno` int(3) NOT NULL AUTO_INCREMENT,
  `nombreturno` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabacodb`.`turnos`
--

/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` (`idturno`,`nombreturno`) VALUES 
 (1,'Turno 1'),
 (2,'Turno 2');
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;


--
-- Table structure for table `tabacodb`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabacodb`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'Administrador','administrador@gmail.com',NULL,'$2y$10$Fq5.eD6No7scCwTDO/AKgOF5ZyMCKxTf1oRQfAHr0lf324NaL4f5q',NULL,'2023-07-13 19:33:35','2024-06-10 10:45:38'),
 (2,'juan santiago','supervicion@gmail.com',NULL,'$2y$10$C0t0rb0IVqBLAIECINNZnecPSRs3HBMX64tT/LtxyQm8KUEWJEiJ.',NULL,'2023-08-09 19:17:25','2024-06-13 04:53:48'),
 (3,'Gerencia','gerencia@gmail.com',NULL,'$2y$10$ym5Sf6v/7FEawMnG91OYrOgivAmxOy4ejqxuojgfrNfJr3l2R2uzq',NULL,'2023-08-09 21:21:04','2023-08-09 21:21:04'),
 (4,'supervisor A','supervisor1@gmail.com',NULL,'$2y$10$i2Pq5DpzuRK3q9naWPYhNe09eY3Xp35EUK0QTTZQ5qbH7YX9CJwCC',NULL,'2024-06-13 04:06:10','2024-06-18 10:44:55'),
 (5,'supervisor B','supervisor2@gmail.com',NULL,'$2y$10$2gckK4K8aTeCDlx89ArhkeUsy0nzqPcl3YnTQZCFM3OD6BcLTFAqy',NULL,'2024-06-13 04:12:39','2024-06-13 04:12:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
