-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: tabacodb
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ajustes`
--

DROP TABLE IF EXISTS `ajustes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ajustes` (
  `idajuste` int NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` float(9,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idajuste`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajustes`
--

LOCK TABLES `ajustes` WRITE;
/*!40000 ALTER TABLE `ajustes` DISABLE KEYS */;
INSERT INTO `ajustes` VALUES (1,'VIR025-24 COMPRA',0.000,'2024-07-17','Administrador'),(2,'INICIO',400.000,'2024-07-17','Administrador'),(3,'e había inventario viejo en principal',85.000,'2024-07-17','FRANK'),(4,'Nuevo que ya estaban en parrilla',0.000,'2024-07-17','FRANK'),(5,'e había inventario viejo en principal',0.000,'2024-07-18','FRANK'),(6,'Chimo que había en el incio',0.000,'2024-07-19','FRANK'),(7,'Chimo que había en el incio en el galpon2',0.000,'2024-07-19','FRANK'),(8,'Chimo que se mando a BM ajuste',0.000,'2024-07-19','FRANK'),(9,'e había inventario viejo en principal',0.000,'2024-07-19','FRANK'),(10,'Se rajo tobo y se echo parrila',-3.000,'2024-07-19','FRANK'),(11,'Compra de tobos 190',0.000,'2024-08-13','FRANK'),(12,'Compra flexa',0.000,'2024-08-15','FRANK');
/*!40000 ALTER TABLE `ajustes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulos` (
  `idarticulo` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `stock` float(9,3) DEFAULT NULL,
  `precio` float(9,3) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Activo',
  `venta` int DEFAULT '0',
  PRIMARY KEY (`idarticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (1,'001','JALEA PRODUCCION',11.000,1.000,'Activo',0),(2,'002','JALEA TOBO 24KG',2700.000,0.000,'Activo',1),(3,'003','TABACO',65443.000,0.000,'Activo',0),(4,'004','TOBO ENVASE ',413.000,0.000,'Activo',0),(5,'003','CAJAS DE TABACO',0.000,1.000,'Activo',0);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `tobos` int DEFAULT '0',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'BM G','123456','(414) 737-2092','G P','2024-07-19 09:43:13',1800),(2,'Corcel FQ','501967598','4140706626','Yaritagua','2024-08-08 10:11:39',99);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cocedor`
--

DROP TABLE IF EXISTS `cocedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cocedor` (
  `idcocedor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `activo` int DEFAULT '0',
  PRIMARY KEY (`idcocedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cocedor`
--

LOCK TABLES `cocedor` WRITE;
/*!40000 ALTER TABLE `cocedor` DISABLE KEYS */;
INSERT INTO `cocedor` VALUES (1,'FABIAN',NULL,NULL,0),(2,'ROGELIO',NULL,NULL,0),(3,'OSMAN',NULL,NULL,0),(4,'JESUS',NULL,NULL,0),(5,'PABLO',NULL,NULL,0),(6,'DARLY',NULL,NULL,0);
/*!40000 ALTER TABLE `cocedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controltobos`
--

DROP TABLE IF EXISTS `controltobos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `controltobos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idcliente` int DEFAULT NULL,
  `tipo` int DEFAULT NULL,
  `deposito` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `observacion` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controltobos`
--

LOCK TABLES `controltobos` WRITE;
/*!40000 ALTER TABLE `controltobos` DISABLE KEYS */;
INSERT INTO `controltobos` VALUES (1,1,0,1,2000,'Venta 1','2024-07-19','FRANK'),(2,1,1,1,200,'Entregaron 200','2024-07-19','FRANK'),(3,2,0,1,99,'Venta 2','2024-08-08','FRANK');
/*!40000 ALTER TABLE `controltobos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposito`
--

DROP TABLE IF EXISTS `deposito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposito` (
  `iddeposito` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `encargado` varchar(40) DEFAULT NULL,
  `movil` varchar(20) DEFAULT '0',
  PRIMARY KEY (`iddeposito`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposito`
--

LOCK TABLES `deposito` WRITE;
/*!40000 ALTER TABLE `deposito` DISABLE KEYS */;
INSERT INTO `deposito` VALUES (1,'PRINCIPAL','Frank','0154121223'),(2,'PRODUCCION','Frank','041623561'),(3,'ALMACEN 2','Frank','424515154');
/*!40000 ALTER TABLE `deposito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ajuste`
--

DROP TABLE IF EXISTS `detalle_ajuste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_ajuste` (
  `iddetalle_ajuste` int NOT NULL AUTO_INCREMENT,
  `idajuste` int NOT NULL,
  `idarticulo` int NOT NULL,
  `tipo_ajuste` varchar(15) NOT NULL,
  `cantidad` float(9,3) NOT NULL,
  `costo` float(9,3) DEFAULT NULL,
  `valorizado` float(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_ajuste`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ajuste`
--

LOCK TABLES `detalle_ajuste` WRITE;
/*!40000 ALTER TABLE `detalle_ajuste` DISABLE KEYS */;
INSERT INTO `detalle_ajuste` VALUES (1,1,3,'Cargo',116550.000,0.000,0.00),(2,2,4,'Cargo',400.000,1.000,400.00),(3,3,4,'Cargo',85.000,1.000,85.00),(4,4,4,'Cargo',100.000,0.000,0.00),(5,5,4,'Cargo',265.000,0.000,0.00),(6,6,2,'Cargo',1528.000,0.000,0.00),(7,7,2,'Cargo',99.000,0.000,0.00),(8,8,2,'Cargo',2000.000,0.000,0.00),(9,9,4,'Cargo',345.000,0.000,0.00),(10,10,1,'Descargo',3.000,1.000,3.00),(11,11,4,'Cargo',190.000,0.000,0.00),(12,12,3,'Cargo',6573.000,0.000,0.00);
/*!40000 ALTER TABLE `detalle_ajuste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_entrega`
--

DROP TABLE IF EXISTS `detalle_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_entrega` (
  `iddetalle` int NOT NULL AUTO_INCREMENT,
  `identrega` int DEFAULT NULL,
  `idarticulo` int DEFAULT NULL,
  `cantidad` float(9,3) DEFAULT NULL,
  `precio` float(9,3) DEFAULT NULL,
  `valor` float(9,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_entrega`
--

LOCK TABLES `detalle_entrega` WRITE;
/*!40000 ALTER TABLE `detalle_entrega` DISABLE KEYS */;
INSERT INTO `detalle_entrega` VALUES (1,1,2,2000.000,0.000,0.000,'2024-07-19'),(2,2,2,99.000,0.000,0.000,'2024-08-08');
/*!40000 ALTER TABLE `detalle_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_traslado`
--

DROP TABLE IF EXISTS `detalle_traslado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_traslado` (
  `iddetalle` int NOT NULL AUTO_INCREMENT,
  `idtraslado` int DEFAULT NULL,
  `idarticulo` int DEFAULT NULL,
  `cantidad` float(7,2) DEFAULT NULL,
  `precio` float(9,3) DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_traslado`
--

LOCK TABLES `detalle_traslado` WRITE;
/*!40000 ALTER TABLE `detalle_traslado` DISABLE KEYS */;
INSERT INTO `detalle_traslado` VALUES (1,1,4,400.00,0.000),(2,2,4,100.00,0.000),(3,3,4,85.00,0.000),(4,4,4,265.00,0.000),(5,5,2,99.00,0.000),(6,6,2,253.00,0.000),(7,7,2,271.00,0.000),(8,8,1,3.00,1.000),(9,9,2,190.00,0.000),(10,10,2,305.00,0.000),(11,11,2,99.00,0.000),(12,12,4,190.00,0.000);
/*!40000 ALTER TABLE `detalle_traslado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `idempresa` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `rif` varchar(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fechasistema` date DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `corre_iva` int DEFAULT '0',
  `corre_islr` int DEFAULT '0',
  `tc` double(15,2) DEFAULT NULL,
  `peso` double(9,2) DEFAULT NULL,
  `tasa_banco` double(15,3) DEFAULT NULL,
  `serie` text,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'FABRICA DE JALEA CORCEL','Ctra. via  Zea Casa s/n Sector Km 6 y 7  Caño El Tigre, Zea Estado Merida','J00000000','0416-2065648','2025-07-15','2024-07-15',0,0,0.00,0.00,0.000,'0');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrega`
--

DROP TABLE IF EXISTS `entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrega` (
  `identrega` int NOT NULL AUTO_INCREMENT,
  `idcliente` int DEFAULT NULL,
  `idusuario` int DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `totalventa` float(9,3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`identrega`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
INSERT INTO `entrega` VALUES (1,1,1,'FAC',0.000,'2024-07-19','FRANK',0),(2,2,1,'FAC',0.000,'2024-08-08','FRANK',0);
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `existencia`
--

DROP TABLE IF EXISTS `existencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `existencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idalmacen` int DEFAULT NULL,
  `idarticulo` int DEFAULT NULL,
  `existencia` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `existencia`
--

LOCK TABLES `existencia` WRITE;
/*!40000 ALTER TABLE `existencia` DISABLE KEYS */;
INSERT INTO `existencia` VALUES (1,2,1,11.00),(2,2,2,153.00),(3,1,3,65443.00),(4,1,4,545.00),(5,1,2,2547.00),(6,1,1,0.00),(7,3,2,0.00),(8,1,5,0.00),(9,3,4,0.00),(10,2,4,-132.00);
/*!40000 ALTER TABLE `existencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardex` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `documento` varchar(40) DEFAULT NULL,
  `idarticulo` int DEFAULT NULL,
  `cantidad` float(9,3) DEFAULT NULL,
  `costo` float(9,3) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `tipo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
INSERT INTO `kardex` VALUES (1,'2024-07-17 16:14:54','AJUS-1',3,116550.000,0.000,'Administrador',1),(2,'2024-07-17 16:15:42','AJUS-2',4,400.000,1.000,'Administrador',1),(3,'2024-07-17 18:46:04','AJUS-3',4,85.000,1.000,'FRANK',1),(4,'2024-07-17 18:47:05','AJUS-4',4,100.000,0.000,'FRANK',1),(5,'2024-07-17 19:25:54','PRO-1',3,960.000,0.000,'JOSSER',2),(6,'2024-07-17 19:26:41','PRO-1 Parrilla 1 T1',1,0.000,1.000,'JOSSER',1),(7,'2024-07-17 19:26:41','PRO-1 Parrilla 1 T1',2,15.000,1.000,'JOSSER',1),(8,'2024-07-17 19:26:41','PRO-1 Parrilla 1 T1',4,15.000,1.000,'JOSSER',2),(9,'2024-07-17 20:03:03','PRO-2',3,960.000,0.000,'JOSSER',2),(10,'2024-07-17 20:04:54','PRO-2 Parrilla 2 T1',1,23.000,1.000,'JOSSER',1),(11,'2024-07-17 20:04:54','PRO-2 Parrilla 2 T1',2,14.000,1.000,'JOSSER',1),(12,'2024-07-17 20:04:54','PRO-2 Parrilla 2 T1',4,14.000,1.000,'JOSSER',2),(13,'2024-07-17 20:05:21','PRO-3',3,960.000,0.000,'JOSSER',2),(14,'2024-07-17 20:05:44','PRO-3 Parrilla 3 T1',1,0.000,1.000,'JOSSER',1),(15,'2024-07-17 20:05:44','PRO-3 Parrilla 3 T1',2,15.000,1.000,'JOSSER',1),(16,'2024-07-17 20:05:44','PRO-3 Parrilla 3 T1',4,15.000,1.000,'JOSSER',2),(17,'2024-07-17 20:06:46','PRO-4',3,960.000,0.000,'JOSSER',2),(18,'2024-07-17 20:07:18','PRO-4 Parrilla 1 T2',1,20.000,1.000,'JOSSER',1),(19,'2024-07-17 20:07:18','PRO-4 Parrilla 1 T2',2,19.000,1.000,'JOSSER',1),(20,'2024-07-17 20:07:18','PRO-4 Parrilla 1 T2',4,19.000,1.000,'JOSSER',2),(21,'2024-07-17 20:08:44','PRO-5',3,960.000,0.000,'JOSSER',2),(22,'2024-07-17 20:09:15','PRO-5 Parrilla 2 T2',1,9.000,1.000,'JOSSER',1),(23,'2024-07-17 20:09:15','PRO-5 Parrilla 2 T2',2,19.000,1.000,'JOSSER',1),(24,'2024-07-17 20:09:15','PRO-5 Parrilla 2 T2',4,19.000,1.000,'JOSSER',2),(25,'2024-07-17 20:10:24','PRO-6',3,960.000,0.000,'JOSSER',2),(26,'2024-07-17 20:10:48','PRO-6 Parrilla 3 T2',1,0.000,1.000,'JOSSER',1),(27,'2024-07-17 20:10:48','PRO-6 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(28,'2024-07-17 20:10:48','PRO-6 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(29,'2024-07-17 20:11:39','PRO-7',3,960.000,0.000,'JOSSER',2),(30,'2024-07-17 20:11:59','PRO-7 Parrilla 1 T1',1,0.000,1.000,'JOSSER',1),(31,'2024-07-17 20:11:59','PRO-7 Parrilla 1 T1',2,20.000,1.000,'JOSSER',1),(32,'2024-07-17 20:11:59','PRO-7 Parrilla 1 T1',4,20.000,1.000,'JOSSER',2),(33,'2024-07-17 20:15:43','PRO-8',3,960.000,0.000,'JOSSER',2),(34,'2024-07-17 20:16:35','PRO-8 Parrilla 2 T1',1,17.000,1.000,'JOSSER',1),(35,'2024-07-17 20:16:35','PRO-8 Parrilla 2 T1',2,19.000,1.000,'JOSSER',1),(36,'2024-07-17 20:16:35','PRO-8 Parrilla 2 T1',4,19.000,1.000,'JOSSER',2),(37,'2024-07-17 20:17:20','PRO-9',3,880.000,0.000,'JOSSER',2),(38,'2024-07-17 20:17:55','PRO-9 Parrilla 3 T1',1,20.000,1.000,'JOSSER',1),(39,'2024-07-17 20:17:55','PRO-9 Parrilla 3 T1',2,17.000,1.000,'JOSSER',1),(40,'2024-07-17 20:17:55','PRO-9 Parrilla 3 T1',4,17.000,1.000,'JOSSER',2),(41,'2024-07-17 20:19:12','PRO-10',3,1040.000,0.000,'JOSSER',2),(42,'2024-07-17 20:19:34','PRO-10 Parrilla 1 T2',1,3.000,1.000,'JOSSER',1),(43,'2024-07-17 20:19:34','PRO-10 Parrilla 1 T2',2,22.000,1.000,'JOSSER',1),(44,'2024-07-17 20:19:34','PRO-10 Parrilla 1 T2',4,22.000,1.000,'JOSSER',2),(45,'2024-07-17 20:20:01','PRO-11',3,960.000,0.000,'JOSSER',2),(46,'2024-07-17 20:20:20','PRO-11 Parrilla 2 T2',1,21.000,1.000,'JOSSER',1),(47,'2024-07-17 20:20:20','PRO-11 Parrilla 2 T2',2,19.000,1.000,'JOSSER',1),(48,'2024-07-17 20:20:20','PRO-11 Parrilla 2 T2',4,19.000,1.000,'JOSSER',2),(49,'2024-07-17 20:21:08','PRO-12',3,960.000,0.000,'JOSSER',2),(50,'2024-07-17 20:21:33','PRO-12 Parrilla 3 T2',1,4.000,1.000,'JOSSER',1),(51,'2024-07-17 20:21:33','PRO-12 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(52,'2024-07-17 20:21:33','PRO-12 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(53,'2024-07-17 20:21:50','PRO-13',3,880.000,0.000,'JOSSER',2),(54,'2024-07-17 20:23:12','PRO-13 Parrilla 1 T1',1,17.000,1.000,'JOSSER',1),(55,'2024-07-17 20:23:12','PRO-13 Parrilla 1 T1',2,18.000,1.000,'JOSSER',1),(56,'2024-07-17 20:23:12','PRO-13 Parrilla 1 T1',4,18.000,1.000,'JOSSER',2),(57,'2024-07-17 20:23:37','PRO-14',3,880.000,0.000,'JOSSER',2),(58,'2024-07-17 20:24:02','PRO-14 Parrilla 2 T1',1,9.000,1.000,'JOSSER',1),(59,'2024-07-17 20:24:02','PRO-14 Parrilla 2 T1',2,16.000,1.000,'JOSSER',1),(60,'2024-07-17 20:24:02','PRO-14 Parrilla 2 T1',4,16.000,1.000,'JOSSER',2),(61,'2024-07-17 20:25:09','PRO-15',3,880.000,0.000,'JOSSER',2),(62,'2024-07-17 20:25:53','PRO-15 Parrilla 3 T1',1,20.000,1.000,'JOSSER',1),(63,'2024-07-17 20:25:53','PRO-15 Parrilla 3 T1',2,17.000,1.000,'JOSSER',1),(64,'2024-07-17 20:25:53','PRO-15 Parrilla 3 T1',4,17.000,1.000,'JOSSER',2),(65,'2024-07-17 20:27:05','PRO-16',3,1120.000,0.000,'JOSSER',2),(66,'2024-07-17 20:27:27','PRO-16 Parrilla 1 T2',1,17.000,1.000,'JOSSER',1),(67,'2024-07-17 20:27:27','PRO-16 Parrilla 1 T2',2,23.000,1.000,'JOSSER',1),(68,'2024-07-17 20:27:27','PRO-16 Parrilla 1 T2',4,23.000,1.000,'JOSSER',2),(69,'2024-07-17 20:34:26','PRO-17',3,1040.000,0.000,'JOSSER',2),(70,'2024-07-17 20:34:55','PRO-17 Parrilla 2 T2',1,21.000,1.000,'JOSSER',1),(71,'2024-07-17 20:34:55','PRO-17 Parrilla 2 T2',2,22.000,1.000,'JOSSER',1),(72,'2024-07-17 20:34:55','PRO-17 Parrilla 2 T2',4,22.000,1.000,'JOSSER',2),(73,'2024-07-17 20:38:24','PRO-18',3,1040.000,0.000,'JOSSER',2),(74,'2024-07-17 20:43:46','PRO-18 Parrilla 3 T2',1,20.000,1.000,'JOSSER',1),(75,'2024-07-17 20:43:46','PRO-18 Parrilla 3 T2',2,21.000,1.000,'JOSSER',1),(76,'2024-07-17 20:43:46','PRO-18 Parrilla 3 T2',4,21.000,1.000,'JOSSER',2),(77,'2024-07-18 20:26:49','AJUS-5',4,265.000,0.000,'FRANK',1),(78,'2024-07-18 21:06:30','PRO-19',3,960.000,0.000,'JOSSER',2),(79,'2024-07-18 21:07:39','PRO-19 Parrilla 1 T1',1,21.000,1.000,'JOSSER',1),(80,'2024-07-18 21:07:39','PRO-19 Parrilla 1 T1',2,19.000,1.000,'JOSSER',1),(81,'2024-07-18 21:07:39','PRO-19 Parrilla 1 T1',4,19.000,1.000,'JOSSER',2),(82,'2024-07-18 21:08:08','PRO-20',3,960.000,0.000,'JOSSER',2),(83,'2024-07-18 21:08:23','PRO-20 Parrilla 2 T1',1,7.000,1.000,'JOSSER',1),(84,'2024-07-18 21:08:23','PRO-20 Parrilla 2 T1',2,19.000,1.000,'JOSSER',1),(85,'2024-07-18 21:08:23','PRO-20 Parrilla 2 T1',4,19.000,1.000,'JOSSER',2),(86,'2024-07-18 21:08:54','PRO-21',3,960.000,0.000,'JOSSER',2),(87,'2024-07-18 21:09:20','PRO-21 Parrilla 3 T1',1,22.000,1.000,'JOSSER',1),(88,'2024-07-18 21:09:20','PRO-21 Parrilla 3 T1',2,19.000,1.000,'JOSSER',1),(89,'2024-07-18 21:09:20','PRO-21 Parrilla 3 T1',4,19.000,1.000,'JOSSER',2),(90,'2024-07-18 00:00:00','PasoTobo-',1,264.000,1.000,'JOSSER',2),(91,'2024-07-18 00:00:00','PasoTobo-',2,11.000,1.000,'JOSSER',1),(92,'2024-07-18 21:14:23','PasoTobo-',4,11.000,1.000,'JOSSER',2),(93,'2024-07-19 09:34:13','AJUS-6',2,1528.000,0.000,'FRANK',1),(94,'2024-07-19 09:36:08','AJUS-7',2,99.000,0.000,'FRANK',1),(95,'2024-07-19 09:40:25','AJUS-8',2,2000.000,0.000,'FRANK',1),(96,'2024-07-19 09:44:10','FAC-1',2,2000.000,0.000,'FRANK',2),(97,'2024-07-19 09:44:40','CONTROL-2',4,200.000,0.000,'FRANK',1),(98,'2024-07-19 10:35:01','PRO-22',3,1040.000,0.000,'JOSSER',2),(99,'2024-07-19 10:35:27','PRO-22 Parrilla 1 T2',1,11.000,1.000,'JOSSER',1),(100,'2024-07-19 10:35:27','PRO-22 Parrilla 1 T2',2,21.000,1.000,'JOSSER',1),(101,'2024-07-19 10:35:27','PRO-22 Parrilla 1 T2',4,21.000,1.000,'JOSSER',2),(102,'2024-07-19 10:35:58','PRO-23',3,960.000,0.000,'JOSSER',2),(103,'2024-07-19 10:36:22','PRO-23 Parrilla 2 T2',1,20.000,1.000,'JOSSER',1),(104,'2024-07-19 10:36:22','PRO-23 Parrilla 2 T2',2,18.000,1.000,'JOSSER',1),(105,'2024-07-19 10:36:22','PRO-23 Parrilla 2 T2',4,18.000,1.000,'JOSSER',2),(106,'2024-07-19 10:36:51','PRO-24',3,960.000,0.000,'JOSSER',2),(107,'2024-07-19 10:37:08','PRO-24 Parrilla 3 T2',1,0.000,1.000,'JOSSER',1),(108,'2024-07-19 10:37:08','PRO-24 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(109,'2024-07-19 10:37:08','PRO-24 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(110,'2024-07-19 10:45:13','AJUS-9',4,345.000,0.000,'FRANK',1),(111,'2024-07-19 11:17:57','PRO-25',3,960.000,0.000,'JOSSER',2),(112,'2024-07-19 11:18:18','PRO-25 Parrilla 1 T1',1,0.000,1.000,'JOSSER',1),(113,'2024-07-19 11:18:18','PRO-25 Parrilla 1 T1',2,20.000,1.000,'JOSSER',1),(114,'2024-07-19 11:18:18','PRO-25 Parrilla 1 T1',4,20.000,1.000,'JOSSER',2),(115,'2024-07-19 11:18:34','PRO-26',3,960.000,0.000,'JOSSER',2),(116,'2024-07-19 11:18:49','PRO-26 Parrilla 2 T1',1,20.000,1.000,'JOSSER',1),(117,'2024-07-19 11:18:49','PRO-26 Parrilla 2 T1',2,19.000,1.000,'JOSSER',1),(118,'2024-07-19 11:18:49','PRO-26 Parrilla 2 T1',4,19.000,1.000,'JOSSER',2),(119,'2024-07-19 11:19:12','PRO-27',3,960.000,0.000,'JOSSER',2),(120,'2024-07-19 11:19:28','PRO-27 Parrilla 3 T1',1,5.000,1.000,'JOSSER',1),(121,'2024-07-19 11:19:28','PRO-27 Parrilla 3 T1',2,20.000,1.000,'JOSSER',1),(122,'2024-07-19 11:19:28','PRO-27 Parrilla 3 T1',4,20.000,1.000,'JOSSER',2),(123,'2024-07-19 00:00:00','PasoTobo-',1,48.000,1.000,'JOSSER',2),(124,'2024-07-19 00:00:00','PasoTobo-',2,2.000,0.000,'JOSSER',1),(125,'2024-07-19 11:21:31','PasoTobo-',4,2.000,1.000,'JOSSER',2),(126,'2024-07-19 11:45:08','AJUS-10',1,3.000,1.000,'FRANK',2),(127,'2024-07-19 17:35:54','PRO-28',3,960.000,0.000,'JOSSER',2),(128,'2024-07-19 17:36:20','PRO-28 Parrilla 1 T2',1,0.000,1.000,'JOSSER',1),(129,'2024-07-19 17:36:20','PRO-28 Parrilla 1 T2',2,18.000,1.000,'JOSSER',1),(130,'2024-07-19 17:36:20','PRO-28 Parrilla 1 T2',4,18.000,1.000,'JOSSER',2),(131,'2024-07-19 17:36:48','PRO-29',3,880.000,0.000,'JOSSER',2),(132,'2024-07-19 17:37:12','PRO-29 Parrilla 2 T2',1,1.000,1.000,'JOSSER',1),(133,'2024-07-19 17:37:12','PRO-29 Parrilla 2 T2',2,16.000,1.000,'JOSSER',1),(134,'2024-07-19 17:37:12','PRO-29 Parrilla 2 T2',4,16.000,1.000,'JOSSER',2),(135,'2024-07-19 17:37:40','PRO-30',3,880.000,0.000,'JOSSER',2),(136,'2024-07-19 17:38:06','PRO-30 Parrilla 3 T2',1,14.000,1.000,'JOSSER',1),(137,'2024-07-19 17:38:06','PRO-30 Parrilla 3 T2',2,16.000,1.000,'JOSSER',1),(138,'2024-07-19 17:38:06','PRO-30 Parrilla 3 T2',4,16.000,1.000,'JOSSER',2),(139,'2024-07-23 10:23:54','PRO-31',3,880.000,0.000,'JOSSER',2),(140,'2024-07-23 10:24:16','PRO-31 Parrilla 1 T1',1,4.000,1.000,'JOSSER',1),(141,'2024-07-23 10:24:16','PRO-31 Parrilla 1 T1',2,18.000,1.000,'JOSSER',1),(142,'2024-07-23 10:24:16','PRO-31 Parrilla 1 T1',4,18.000,1.000,'JOSSER',2),(143,'2024-07-23 10:24:41','PRO-32',3,880.000,0.000,'JOSSER',2),(144,'2024-07-23 10:25:06','PRO-32 Parrilla 3 T1',1,16.000,1.000,'JOSSER',1),(145,'2024-07-23 10:25:06','PRO-32 Parrilla 3 T1',2,19.000,1.000,'JOSSER',1),(146,'2024-07-23 10:25:06','PRO-32 Parrilla 3 T1',4,19.000,1.000,'JOSSER',2),(147,'2024-07-23 10:25:49','PRO-33',3,880.000,0.000,'JOSSER',2),(148,'2024-07-23 10:26:17','PRO-33 Parrilla 1 T2',1,12.000,1.000,'JOSSER',1),(149,'2024-07-23 10:26:17','PRO-33 Parrilla 1 T2',2,18.000,1.000,'JOSSER',1),(150,'2024-07-23 10:26:17','PRO-33 Parrilla 1 T2',4,18.000,1.000,'JOSSER',2),(151,'2024-07-23 10:27:34','PRO-34',3,960.000,0.000,'JOSSER',2),(152,'2024-07-23 10:27:58','PRO-34 Parrilla 3 T2',1,8.000,1.000,'JOSSER',1),(153,'2024-07-23 10:27:58','PRO-34 Parrilla 3 T2',2,19.000,1.000,'JOSSER',1),(154,'2024-07-23 10:27:58','PRO-34 Parrilla 3 T2',4,19.000,1.000,'JOSSER',2),(155,'2024-07-23 10:28:26','PRO-35',3,960.000,0.000,'JOSSER',2),(156,'2024-07-23 10:29:06','PRO-35 Parrilla 1 T1',1,16.000,1.000,'JOSSER',1),(157,'2024-07-23 10:29:06','PRO-35 Parrilla 1 T1',2,21.000,1.000,'JOSSER',1),(158,'2024-07-23 10:29:06','PRO-35 Parrilla 1 T1',4,21.000,1.000,'JOSSER',2),(159,'2024-07-23 10:29:43','PRO-36',3,1120.000,0.000,'JOSSER',2),(160,'2024-07-23 10:30:01','PRO-36 Parrilla 2 T1',1,18.000,1.000,'JOSSER',1),(161,'2024-07-23 10:30:02','PRO-36 Parrilla 2 T1',2,23.000,1.000,'JOSSER',1),(162,'2024-07-23 10:30:02','PRO-36 Parrilla 2 T1',4,23.000,1.000,'JOSSER',2),(163,'2024-07-23 10:30:32','PRO-37',3,960.000,0.000,'JOSSER',2),(164,'2024-07-23 10:30:47','PRO-37 Parrilla 3 T1',1,16.000,1.000,'JOSSER',1),(165,'2024-07-23 10:30:47','PRO-37 Parrilla 3 T1',2,19.000,1.000,'JOSSER',1),(166,'2024-07-23 10:30:47','PRO-37 Parrilla 3 T1',4,19.000,1.000,'JOSSER',2),(167,'2024-07-23 00:00:00','PasoTobo-',1,96.000,1.000,'JOSSER',2),(168,'2024-07-23 00:00:00','PasoTobo-',2,4.000,0.000,'JOSSER',1),(169,'2024-07-23 16:21:56','PasoTobo-',4,4.000,1.000,'JOSSER',2),(170,'2024-07-25 14:30:29','PRO-38',3,960.000,0.000,'JOSSER',2),(171,'2024-07-25 14:31:31','PRO-38 Parrilla 1 T2',1,18.000,1.000,'JOSSER',1),(172,'2024-07-25 14:31:31','PRO-38 Parrilla 1 T2',2,19.000,1.000,'JOSSER',1),(173,'2024-07-25 14:31:31','PRO-38 Parrilla 1 T2',4,19.000,1.000,'JOSSER',2),(174,'2024-07-25 14:31:48','PRO-39',3,960.000,0.000,'JOSSER',2),(175,'2024-07-25 14:32:27','PRO-40',3,960.000,0.000,'JOSSER',2),(176,'2024-07-25 14:32:43','PRO-39 Parrilla 2 T2',1,18.000,1.000,'JOSSER',1),(177,'2024-07-25 14:32:43','PRO-39 Parrilla 2 T2',2,19.000,1.000,'JOSSER',1),(178,'2024-07-25 14:32:43','PRO-39 Parrilla 2 T2',4,19.000,1.000,'JOSSER',2),(179,'2024-07-25 14:33:01','PRO-40 Parrilla 3 T2',1,15.000,1.000,'JOSSER',1),(180,'2024-07-25 14:33:01','PRO-40 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(181,'2024-07-25 14:33:01','PRO-40 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(182,'2024-07-25 14:33:28','PRO-41',3,960.000,0.000,'JOSSER',2),(183,'2024-07-25 14:33:49','PRO-42',3,880.000,0.000,'JOSSER',2),(184,'2024-07-25 14:34:13','PRO-43',3,960.000,0.000,'JOSSER',2),(185,'2024-07-25 14:34:32','PRO-41 Parrilla 1 T1',1,18.000,1.000,'JOSSER',1),(186,'2024-07-25 14:34:32','PRO-41 Parrilla 1 T1',2,20.000,1.000,'JOSSER',1),(187,'2024-07-25 14:34:32','PRO-41 Parrilla 1 T1',4,20.000,1.000,'JOSSER',2),(188,'2024-07-25 14:34:57','PRO-42 Parrilla 2 T1',1,5.000,1.000,'JOSSER',1),(189,'2024-07-25 14:34:57','PRO-42 Parrilla 2 T1',2,17.000,1.000,'JOSSER',1),(190,'2024-07-25 14:34:57','PRO-42 Parrilla 2 T1',4,17.000,1.000,'JOSSER',2),(191,'2024-07-25 14:35:20','PRO-43 Parrilla 3 T2',1,10.000,1.000,'JOSSER',1),(192,'2024-07-25 14:35:20','PRO-43 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(193,'2024-07-25 14:35:20','PRO-43 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(194,'2024-07-25 14:35:42','PRO-44',3,960.000,0.000,'JOSSER',2),(195,'2024-07-25 14:36:25','PRO-45',3,960.000,0.000,'JOSSER',2),(196,'2024-07-25 14:37:32','PRO-44 Parrilla 1 T2',1,10.000,1.000,'JOSSER',1),(197,'2024-07-25 14:37:32','PRO-44 Parrilla 1 T2',2,20.000,1.000,'JOSSER',1),(198,'2024-07-25 14:37:32','PRO-44 Parrilla 1 T2',4,20.000,1.000,'JOSSER',2),(199,'2024-07-25 14:37:50','PRO-45 Parrilla 2 T2',1,5.000,1.000,'JOSSER',1),(200,'2024-07-25 14:37:50','PRO-45 Parrilla 2 T2',2,20.000,1.000,'JOSSER',1),(201,'2024-07-25 14:37:50','PRO-45 Parrilla 2 T2',4,20.000,1.000,'JOSSER',2),(202,'2024-07-25 14:38:17','PRO-46',3,960.000,0.000,'JOSSER',2),(203,'2024-07-25 14:38:41','PRO-46 Parrilla 3 T2',1,10.000,1.000,'JOSSER',1),(204,'2024-07-25 14:38:41','PRO-46 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(205,'2024-07-25 14:38:41','PRO-46 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(206,'2024-07-25 14:39:01','PRO-47',3,960.000,0.000,'JOSSER',2),(207,'2024-07-25 14:39:22','PRO-47 Parrilla 1 T1',1,10.000,1.000,'JOSSER',1),(208,'2024-07-25 14:39:22','PRO-47 Parrilla 1 T1',2,20.000,1.000,'JOSSER',1),(209,'2024-07-25 14:39:22','PRO-47 Parrilla 1 T1',4,20.000,1.000,'JOSSER',2),(210,'2024-07-25 14:39:40','PRO-48',3,960.000,0.000,'JOSSER',2),(211,'2024-07-25 14:40:05','PRO-49',3,960.000,0.000,'JOSSER',2),(212,'2024-07-25 14:40:52','PRO-48 Parrilla 2 T1',1,10.000,1.000,'JOSSER',1),(213,'2024-07-25 14:40:52','PRO-48 Parrilla 2 T1',2,20.000,1.000,'JOSSER',1),(214,'2024-07-25 14:40:52','PRO-48 Parrilla 2 T1',4,20.000,1.000,'JOSSER',2),(215,'2024-07-25 14:41:04','PRO-49 Parrilla 3 T1',1,12.000,1.000,'JOSSER',1),(216,'2024-07-25 14:41:04','PRO-49 Parrilla 3 T1',2,20.000,1.000,'JOSSER',1),(217,'2024-07-25 14:41:04','PRO-49 Parrilla 3 T1',4,20.000,1.000,'JOSSER',2),(218,'2024-07-25 17:39:30','PRO-50',3,800.000,0.000,'JOSSER',2),(219,'2024-07-25 17:39:46','PRO-50 Parrilla 1 T2',1,18.000,1.000,'JOSSER',1),(220,'2024-07-25 17:39:46','PRO-50 Parrilla 1 T2',2,20.000,1.000,'JOSSER',1),(221,'2024-07-25 17:39:46','PRO-50 Parrilla 1 T2',4,20.000,1.000,'JOSSER',2),(222,'2024-07-25 17:41:06','PRO-51',3,800.000,0.000,'JOSSER',2),(223,'2024-07-25 17:41:41','PRO-51 Parrilla 2 T2',1,8.000,1.000,'JOSSER',1),(224,'2024-07-25 17:41:41','PRO-51 Parrilla 2 T2',2,20.000,1.000,'JOSSER',1),(225,'2024-07-25 17:41:41','PRO-51 Parrilla 2 T2',4,20.000,1.000,'JOSSER',2),(226,'2024-07-25 17:43:19','PRO-52',3,800.000,0.000,'JOSSER',2),(227,'2024-07-25 17:43:51','PRO-52 Parrilla 3 T2',1,13.000,1.000,'JOSSER',1),(228,'2024-07-25 17:43:51','PRO-52 Parrilla 3 T2',2,20.000,1.000,'JOSSER',1),(229,'2024-07-25 17:43:51','PRO-52 Parrilla 3 T2',4,20.000,1.000,'JOSSER',2),(230,'2024-07-25 00:00:00','PasoTobo-',1,192.000,1.000,'JOSSER',2),(231,'2024-07-25 00:00:00','PasoTobo-',2,8.000,0.000,'JOSSER',1),(232,'2024-07-25 17:45:40','PasoTobo-',4,8.000,1.000,'JOSSER',2),(233,'2024-07-25 17:52:08','PRO-53',3,0.000,0.000,'FRANK',2),(234,'2024-07-25 17:52:25','PRO-53 Parrilla 2 T1',1,0.000,1.000,'FRANK',1),(235,'2024-07-25 17:52:25','PRO-53 Parrilla 2 T1',2,2.000,1.000,'FRANK',1),(236,'2024-07-25 17:52:25','PRO-53 Parrilla 2 T1',4,2.000,1.000,'FRANK',2),(237,'2024-08-08 10:12:16','FAC-2',2,99.000,0.000,'FRANK',2),(238,'2024-08-13 13:23:21','AJUS-11',4,190.000,0.000,'FRANK',1),(239,'2024-08-13 17:57:58','PRO-54',3,960.000,0.000,'JOSSER',2),(240,'2024-08-13 17:59:16','PRO-54 Parrilla 1 T1',1,7.000,1.000,'JOSSER',1),(241,'2024-08-13 17:59:16','PRO-54 Parrilla 1 T1',2,13.000,1.000,'JOSSER',1),(242,'2024-08-13 17:59:16','PRO-54 Parrilla 1 T1',4,13.000,1.000,'JOSSER',2),(243,'2024-08-13 17:59:50','PRO-55',3,480.000,0.000,'JOSSER',2),(244,'2024-08-13 18:00:12','PRO-55 Parrilla 2 T1',1,3.000,1.000,'JOSSER',1),(245,'2024-08-13 18:00:12','PRO-55 Parrilla 2 T1',2,4.000,1.000,'JOSSER',1),(246,'2024-08-13 18:00:12','PRO-55 Parrilla 2 T1',4,4.000,1.000,'JOSSER',2),(247,'2024-08-13 18:00:40','PRO-56',3,800.000,0.000,'JOSSER',2),(248,'2024-08-13 18:01:21','PRO-56 Parrilla 3 T1',1,10.000,1.000,'JOSSER',1),(249,'2024-08-13 18:01:21','PRO-56 Parrilla 3 T1',2,12.000,1.000,'JOSSER',1),(250,'2024-08-13 18:01:21','PRO-56 Parrilla 3 T1',4,12.000,1.000,'JOSSER',2),(251,'2024-08-14 18:07:33','PRO-57',3,800.000,0.000,'JOSSER',2),(252,'2024-08-14 18:08:12','PRO-57 Parrilla 2 T2',1,3.000,1.000,'JOSSER',1),(253,'2024-08-14 18:08:12','PRO-57 Parrilla 2 T2',2,17.000,1.000,'JOSSER',1),(254,'2024-08-14 18:08:12','PRO-57 Parrilla 2 T2',4,17.000,1.000,'JOSSER',2),(255,'2024-08-14 18:08:47','PRO-58',3,880.000,0.000,'JOSSER',2),(256,'2024-08-14 18:09:07','PRO-58 Parrilla 3 T2',1,13.000,1.000,'JOSSER',1),(257,'2024-08-14 18:09:07','PRO-58 Parrilla 3 T2',2,18.000,1.000,'JOSSER',1),(258,'2024-08-14 18:09:07','PRO-58 Parrilla 3 T2',4,18.000,1.000,'JOSSER',2),(259,'2024-08-14 18:09:31','PRO-59',3,800.000,0.000,'JOSSER',2),(260,'2024-08-14 18:09:55','PRO-59 Parrilla 2 T1',1,4.000,1.000,'JOSSER',1),(261,'2024-08-14 18:09:55','PRO-59 Parrilla 2 T1',2,16.000,1.000,'JOSSER',1),(262,'2024-08-14 18:09:55','PRO-59 Parrilla 2 T1',4,16.000,1.000,'JOSSER',2),(263,'2024-08-14 18:10:42','PRO-60',3,960.000,0.000,'JOSSER',2),(264,'2024-08-14 18:11:28','PRO-60 Parrilla 3 T1',1,14.000,1.000,'JOSSER',1),(265,'2024-08-14 18:11:28','PRO-60 Parrilla 3 T1',2,17.000,1.000,'JOSSER',1),(266,'2024-08-14 18:11:28','PRO-60 Parrilla 3 T1',4,17.000,1.000,'JOSSER',2),(267,'2024-08-15 10:05:52','AJUS-12',3,6573.000,0.000,'FRANK',1),(268,'2024-08-15 15:31:17','PRO-61',3,960.000,0.000,'JOSSER',2),(269,'2024-08-15 15:31:59','PRO-61 Parrilla 1 T1',1,3.000,1.000,'JOSSER',1),(270,'2024-08-15 15:31:59','PRO-61 Parrilla 1 T1',2,18.000,1.000,'JOSSER',1),(271,'2024-08-15 15:31:59','PRO-61 Parrilla 1 T1',4,18.000,1.000,'JOSSER',2),(272,'2024-08-15 15:32:38','PRO-62',3,880.000,0.000,'JOSSER',2),(273,'2024-08-15 15:33:02','PRO-63',3,880.000,0.000,'JOSSER',2),(274,'2024-08-15 15:33:59','PRO-62 Parrilla 2 T2',1,17.000,1.000,'JOSSER',1),(275,'2024-08-15 15:33:59','PRO-62 Parrilla 2 T2',2,16.000,1.000,'JOSSER',1),(276,'2024-08-15 15:33:59','PRO-62 Parrilla 2 T2',4,16.000,1.000,'JOSSER',2),(277,'2024-08-15 15:34:30','PRO-63 Parrilla 3 T2',1,0.000,1.000,'JOSSER',1),(278,'2024-08-15 15:34:30','PRO-63 Parrilla 3 T2',2,18.000,1.000,'JOSSER',1),(279,'2024-08-15 15:34:30','PRO-63 Parrilla 3 T2',4,18.000,1.000,'JOSSER',2),(280,'2024-08-16 00:00:00','PasoTobo-',1,72.000,1.000,'FRANK',2),(281,'2024-08-16 00:00:00','PasoTobo-',2,3.000,0.000,'FRANK',1),(282,'2024-08-16 08:21:03','PasoTobo-',4,3.000,1.000,'FRANK',2);
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laboratorio` (
  `idprueba` int NOT NULL AUTO_INCREMENT,
  `idrecoleccion` int NOT NULL,
  `ltst1` float(9,3) DEFAULT '0.000',
  `alco` tinyint(1) DEFAULT '0',
  `pero` tinyint(1) DEFAULT '0',
  `acdz` float(5,2) DEFAULT '0.00',
  `suer` tinyint(1) DEFAULT '0',
  `rexa` varchar(7) DEFAULT NULL,
  `gra` float(5,2) DEFAULT '0.00',
  `saca` tinyint(1) DEFAULT '0',
  `temp` float(9,3) DEFAULT '0.000',
  `dep` int DEFAULT '0',
  `tnq` int DEFAULT NULL,
  `ltst2` float(9,3) DEFAULT '0.000',
  `alco2` tinyint(1) DEFAULT '0',
  `pero2` tinyint(1) DEFAULT '0',
  `acdz2` float(5,2) DEFAULT '0.00',
  `suer2` tinyint(1) DEFAULT '0',
  `rexa2` varchar(7) DEFAULT NULL,
  `gra2` float(5,2) DEFAULT '0.00',
  `saca2` tinyint(1) DEFAULT '0',
  `temp2` float(9,3) DEFAULT '0.000',
  `dep2` int DEFAULT NULL,
  `tnq2` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idprueba`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorio`
--

LOCK TABLES `laboratorio` WRITE;
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parrillas`
--

DROP TABLE IF EXISTS `parrillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parrillas` (
  `idparrilla` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `tren` float(9,3) DEFAULT '0.000',
  PRIMARY KEY (`idparrilla`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parrillas`
--

LOCK TABLES `parrillas` WRITE;
/*!40000 ALTER TABLE `parrillas` DISABLE KEYS */;
INSERT INTO `parrillas` VALUES (1,'Parrilla 1',240.000),(2,'Parrilla 2',160.000),(3,'Parrilla 3',80.000);
/*!40000 ALTER TABLE `parrillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parrillaturno`
--

DROP TABLE IF EXISTS `parrillaturno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parrillaturno` (
  `id` int DEFAULT NULL,
  `parrilla` int DEFAULT NULL,
  `turno` int DEFAULT '0',
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parrillaturno`
--

LOCK TABLES `parrillaturno` WRITE;
/*!40000 ALTER TABLE `parrillaturno` DISABLE KEYS */;
INSERT INTO `parrillaturno` VALUES (1,1,1,0),(2,1,2,0),(3,2,1,0),(4,2,2,0),(5,3,1,0),(6,3,2,0);
/*!40000 ALTER TABLE `parrillaturno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produccion`
--

DROP TABLE IF EXISTS `produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produccion` (
  `idproceso` int NOT NULL AUTO_INCREMENT,
  `idsupervisor` int DEFAULT NULL,
  `idparrilla` int DEFAULT NULL,
  `idcocedor` int DEFAULT NULL,
  `idturno` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechacierre` date DEFAULT NULL,
  `kgsubido` float(9,3) DEFAULT NULL,
  `kgcocina` float(9,3) DEFAULT NULL,
  `kgbajado` float(9,3) DEFAULT '0.000',
  `kgjalea` float(9,3) DEFAULT '0.000',
  `rendimiento` float(9,3) DEFAULT '0.000',
  `kgtren` float(9,3) DEFAULT '0.000',
  `observacion` varchar(50) DEFAULT NULL,
  `estatus` int DEFAULT '0',
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idproceso`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produccion`
--

LOCK TABLES `produccion` WRITE;
/*!40000 ALTER TABLE `produccion` DISABLE KEYS */;
INSERT INTO `produccion` VALUES (1,2,1,2,1,'2024-07-17','2024-07-17',960.000,960.000,800.000,360.000,45.000,160.000,' / ',1,'JOSSER'),(2,2,2,4,1,'2024-07-17','2024-07-17',960.000,960.000,800.000,359.000,44.875,160.000,' / ',1,'JOSSER'),(3,2,3,5,1,'2024-07-17','2024-07-17',960.000,960.000,800.000,360.000,45.000,160.000,' / ',1,'JOSSER'),(4,2,1,1,2,'2024-07-17','2024-07-17',960.000,1120.000,960.000,476.000,49.583,160.000,' / ',1,'JOSSER'),(5,2,2,3,2,'2024-07-17','2024-07-17',960.000,1120.000,960.000,465.000,48.438,160.000,' / ',1,'JOSSER'),(6,2,3,6,2,'2024-07-17','2024-07-17',960.000,1120.000,960.000,480.000,50.000,160.000,' / ',1,'JOSSER'),(7,2,1,2,1,'2024-07-17','2024-07-17',960.000,1120.000,960.000,480.000,50.000,160.000,' / ',1,'JOSSER'),(8,2,2,4,1,'2024-07-17','2024-07-17',960.000,1120.000,960.000,473.000,49.271,160.000,' / ',1,'JOSSER'),(9,2,3,5,1,'2024-07-17','2024-07-17',880.000,1040.000,880.000,428.000,48.636,160.000,' / ',1,'JOSSER'),(10,2,1,1,2,'2024-07-17','2024-07-17',1040.000,1200.000,1040.000,531.000,51.058,160.000,' / ',1,'JOSSER'),(11,2,2,3,2,'2024-07-17','2024-07-17',960.000,1120.000,960.000,477.000,49.688,160.000,' / ',1,'JOSSER'),(12,2,3,6,2,'2024-07-17','2024-07-17',960.000,1120.000,960.000,484.000,50.417,160.000,' / ',1,'JOSSER'),(13,2,1,2,1,'2024-07-17','2024-07-17',880.000,1040.000,880.000,449.000,51.023,160.000,' / ',1,'JOSSER'),(14,2,2,4,1,'2024-07-17','2024-07-17',880.000,1040.000,800.000,393.000,49.125,240.000,' / ',1,'JOSSER'),(15,2,3,5,1,'2024-07-17','2024-07-17',880.000,1040.000,880.000,428.000,48.636,160.000,' / ',1,'JOSSER'),(16,2,1,1,2,'2024-07-17','2024-07-17',1120.000,1280.000,1120.000,569.000,50.804,160.000,' / ',1,'JOSSER'),(17,2,2,3,2,'2024-07-17','2024-07-17',1040.000,1280.000,1120.000,549.000,49.018,160.000,' / ',1,'JOSSER'),(18,2,3,6,2,'2024-07-17','2024-07-17',1040.000,1200.000,1040.000,524.000,50.385,160.000,' / ',1,'JOSSER'),(19,2,1,2,1,'2024-07-18','2024-07-18',960.000,1120.000,960.000,477.000,49.688,160.000,' / ',1,'JOSSER'),(20,2,2,4,1,'2024-07-18','2024-07-18',960.000,1120.000,960.000,463.000,48.229,160.000,' / ',1,'JOSSER'),(21,2,3,5,1,'2024-07-18','2024-07-18',960.000,1120.000,960.000,478.000,49.792,160.000,' / ',1,'JOSSER'),(22,2,1,1,2,'2024-07-19','2024-07-19',1040.000,1200.000,1040.000,515.000,49.519,160.000,' / ',1,'JOSSER'),(23,2,2,3,2,'2024-07-19','2024-07-19',960.000,1120.000,960.000,452.000,47.083,160.000,' / ',1,'JOSSER'),(24,2,3,6,2,'2024-07-19','2024-07-19',960.000,1120.000,960.000,480.000,50.000,160.000,' / ',1,'JOSSER'),(25,2,1,2,1,'2024-07-19','2024-07-19',960.000,1120.000,960.000,480.000,50.000,160.000,' / ',1,'JOSSER'),(26,2,2,4,1,'2024-07-19','2024-07-19',960.000,1120.000,960.000,476.000,49.583,160.000,' / ',1,'JOSSER'),(27,2,3,5,1,'2024-07-19','2024-07-19',960.000,1120.000,960.000,485.000,50.521,160.000,' / ',1,'JOSSER'),(28,2,1,1,2,'2024-07-19','2024-07-19',960.000,1120.000,880.000,432.000,49.091,240.000,' / ',1,'JOSSER'),(29,2,2,3,2,'2024-07-19','2024-07-19',880.000,1040.000,800.000,385.000,48.125,240.000,' / ',1,'JOSSER'),(30,2,3,6,2,'2024-07-19','2024-07-19',880.000,1040.000,800.000,398.000,49.750,240.000,' / ',1,'JOSSER'),(31,2,1,1,1,'2024-07-23','2024-07-23',880.000,1120.000,880.000,436.000,49.545,240.000,' / ',1,'JOSSER'),(32,2,3,6,1,'2024-07-23','2024-07-23',880.000,1120.000,960.000,472.000,49.167,160.000,' / ',1,'JOSSER'),(33,2,1,2,2,'2024-07-23','2024-07-23',880.000,1120.000,880.000,444.000,50.455,240.000,' / ',1,'JOSSER'),(34,2,3,5,2,'2024-07-23','2024-07-23',960.000,1120.000,960.000,464.000,48.333,160.000,' / ',1,'JOSSER'),(35,2,1,1,1,'2024-07-23','2024-07-23',960.000,1200.000,1040.000,520.000,50.000,160.000,' / ',1,'JOSSER'),(36,2,2,3,1,'2024-07-23','2024-07-23',1120.000,1360.000,1200.000,570.000,47.500,160.000,' / ',1,'JOSSER'),(37,2,3,6,1,'2024-07-23','2024-07-23',960.000,1120.000,960.000,472.000,49.167,160.000,' / ',1,'JOSSER'),(38,2,1,2,2,'2024-07-25','2024-07-25',960.000,1120.000,960.000,474.000,49.375,160.000,' / ',1,'JOSSER'),(39,2,2,4,2,'2024-07-25','2024-07-25',960.000,1120.000,960.000,474.000,49.375,160.000,' / ',1,'JOSSER'),(40,2,3,5,2,'2024-07-25','2024-07-25',960.000,1120.000,960.000,495.000,51.562,160.000,' / ',1,'JOSSER'),(41,2,1,1,1,'2024-07-25','2024-07-25',960.000,1120.000,960.000,498.000,51.875,160.000,' / ',1,'JOSSER'),(42,2,2,3,1,'2024-07-25','2024-07-25',880.000,1040.000,800.000,413.000,51.625,240.000,' / ',1,'JOSSER'),(43,2,3,6,2,'2024-07-25','2024-07-25',960.000,1120.000,960.000,490.000,51.042,160.000,' / ',1,'JOSSER'),(44,2,1,2,2,'2024-07-25','2024-07-25',960.000,1120.000,960.000,490.000,51.042,160.000,' / ',1,'JOSSER'),(45,2,2,4,2,'2024-07-25','2024-07-25',960.000,1200.000,960.000,485.000,50.521,240.000,' / ',1,'JOSSER'),(46,2,3,5,2,'2024-07-25','2024-07-25',960.000,1120.000,960.000,490.000,51.042,160.000,' / ',1,'JOSSER'),(47,2,1,1,1,'2024-07-25','2024-07-25',960.000,1120.000,960.000,490.000,51.042,160.000,' / ',1,'JOSSER'),(48,2,2,3,1,'2024-07-25','2024-07-25',960.000,1200.000,960.000,490.000,51.042,240.000,' / ',1,'JOSSER'),(49,2,3,6,1,'2024-07-25','2024-07-25',960.000,1120.000,960.000,492.000,51.250,160.000,' / ',1,'JOSSER'),(50,2,1,2,2,'2024-07-25','2024-07-25',800.000,960.000,960.000,498.000,51.875,0.000,' / ',1,'JOSSER'),(51,2,2,4,2,'2024-07-25','2024-07-25',800.000,1040.000,960.000,488.000,50.833,80.000,' / ',1,'JOSSER'),(52,2,3,5,2,'2024-07-25','2024-07-25',800.000,960.000,960.000,493.000,51.354,0.000,' / ',1,'JOSSER'),(53,1,2,3,1,'2024-07-25','2024-07-25',0.000,80.000,80.000,48.000,60.000,0.000,' / ',1,'FRANK'),(54,2,1,2,1,'2024-08-13','2024-08-13',960.000,960.000,720.000,319.000,44.306,240.000,' / ',1,'JOSSER'),(55,2,2,3,1,'2024-08-13','2024-08-13',480.000,480.000,240.000,99.000,41.250,240.000,' / ',1,'JOSSER'),(56,2,3,6,1,'2024-08-13','2024-08-13',800.000,800.000,640.000,298.000,46.562,160.000,' / ',1,'JOSSER'),(57,2,2,4,2,'2024-08-14','2024-08-14',800.000,1040.000,880.000,411.000,46.705,160.000,' / ',1,'JOSSER'),(58,2,3,5,2,'2024-08-14','2024-08-14',880.000,1040.000,960.000,445.000,46.354,80.000,' / ',1,'JOSSER'),(59,2,2,3,1,'2024-08-14','2024-08-14',800.000,960.000,800.000,388.000,48.500,160.000,' / ',1,'JOSSER'),(60,2,3,6,1,'2024-08-14','2024-08-14',960.000,1040.000,880.000,422.000,47.955,160.000,' / ',1,'JOSSER'),(61,2,1,2,1,'2024-08-15','2024-08-15',960.000,1200.000,960.000,435.000,45.312,240.000,' / ',1,'JOSSER'),(62,2,2,4,2,'2024-08-15','2024-08-15',880.000,1040.000,880.000,401.000,45.568,160.000,' / ',1,'JOSSER'),(63,2,3,5,2,'2024-08-15','2024-08-15',880.000,1040.000,960.000,432.000,45.000,80.000,' / ',1,'JOSSER');
/*!40000 ALTER TABLE `produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productores`
--

DROP TABLE IF EXISTS `productores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productores` (
  `idproductor` int NOT NULL AUTO_INCREMENT,
  `idruta` int DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo` int DEFAULT '0',
  PRIMARY KEY (`idproductor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productores`
--

LOCK TABLES `productores` WRITE;
/*!40000 ALTER TABLE `productores` DISABLE KEYS */;
/*!40000 ALTER TABLE `productores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recoleccion`
--

DROP TABLE IF EXISTS `recoleccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recoleccion` (
  `idrecoleccion` int NOT NULL AUTO_INCREMENT,
  `idruta` int DEFAULT NULL,
  `idrecolector` int NOT NULL,
  `litros` float(9,3) DEFAULT NULL,
  `litrostarima` float(9,3) DEFAULT '0.000',
  `plb` float(9,3) DEFAULT '0.000',
  `observacion` varchar(50) DEFAULT NULL,
  `estatus` int DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `anulada` int DEFAULT '0',
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idrecoleccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recoleccion`
--

LOCK TABLES `recoleccion` WRITE;
/*!40000 ALTER TABLE `recoleccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `recoleccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `iduser` int DEFAULT NULL,
  `newarticulo` int DEFAULT '0',
  `editarticulo` int DEFAULT '0',
  `ajuste` int DEFAULT '0',
  `newajuste` int DEFAULT '0',
  `showajuste` int DEFAULT '0',
  `clientes` int DEFAULT '0',
  `newcliente` int DEFAULT '0',
  `editcliente` int DEFAULT '0',
  `newcocedor` int DEFAULT '0',
  `editcocedor` int DEFAULT '0',
  `newdeposito` int DEFAULT '0',
  `editdeposito` int DEFAULT '0',
  `showdeposito` int DEFAULT '0',
  `newproceso` int DEFAULT '0',
  `closeproceso` int DEFAULT '0',
  `newrecepcion` int DEFAULT '0',
  `anularrecepcion` int DEFAULT '0',
  `ventas` int DEFAULT '0',
  `newventa` int DEFAULT '0',
  `anularventa` int DEFAULT '0',
  `showventa` int DEFAULT '0',
  `entobar` int DEFAULT '0',
  `newtraslado` int DEFAULT '0',
  `showtraslado` int DEFAULT '0',
  `actroles` int DEFAULT '0',
  `analisis` int DEFAULT '0',
  `rproduccion` int DEFAULT '0',
  `rinventario` int DEFAULT '0',
  `rventas` int DEFAULT '0',
  `rclientes` int DEFAULT '0',
  `showproduccion` int DEFAULT '0',
  `updatepass` int DEFAULT '0',
  `controltobos` int DEFAULT '0',
  `movtobos` int DEFAULT '0',
  `stock` int DEFAULT '0',
  `deposito` int DEFAULT '0',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),(2,2,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0),(3,3,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,0,0),(4,4,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,1,1,1,1,1,1,1,0,0,0,0,0,0,1,0,1,1,0,0),(5,5,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,0,0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas`
--

DROP TABLE IF EXISTS `rutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rutas` (
  `idruta` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idruta`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas`
--

LOCK TABLES `rutas` WRITE;
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` VALUES (1,'TRANSPORTE DON JULIAN','julian alvarez','0275484512'),(2,'TRANSPORTE EDUARDO FUEN MAYOR','eduardo fuen mayor','0141654654'),(3,'Transporte Don Toto','jose mora','04146-9067104'),(4,'TRASNPORTE HERIBERTO','jose heriberto mora','0112-46532132'),(5,'TRANSPORTE NKS','wuilmer puerta','04161224'),(6,'TRASNPORTE 5 AGUILAS','jose ramirez','0412562341'),(7,'EL HATO',NULL,'012421');
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema`
--

DROP TABLE IF EXISTS `sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sistema` (
  `idempresa` int DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechavence` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema`
--

LOCK TABLES `sistema` WRITE;
/*!40000 ALTER TABLE `sistema` DISABLE KEYS */;
INSERT INTO `sistema` VALUES (1,'2023-07-15','2025-07-15');
/*!40000 ALTER TABLE `sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanques`
--

DROP TABLE IF EXISTS `tanques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tanques` (
  `idtanque` int NOT NULL AUTO_INCREMENT,
  `iddeposito` int DEFAULT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `capacidad` float(9,3) DEFAULT NULL,
  `uso` float(9,3) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idtanque`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanques`
--

LOCK TABLES `tanques` WRITE;
/*!40000 ALTER TABLE `tanques` DISABLE KEYS */;
INSERT INTO `tanques` VALUES (16,1,'Tanque1',14700.000,0.000,''),(17,1,'Tanque2',14700.000,0.000,''),(18,2,'Tanque1',9900.000,0.000,' '),(19,2,'Tanque2',9900.000,0.000,' '),(20,3,'Tanque1',4619.000,0.000,' '),(21,3,'Tanque2',5421.000,0.000,' '),(22,3,'Tanque3',4660.000,0.000,''),(23,4,'Tanque1',3350.000,0.000,' '),(24,4,'Tanque2',3350.000,0.000,' '),(25,5,'Tanque1',3300.000,0.000,' '),(26,5,'Tanque2',3250.000,0.000,' '),(27,6,'Tanque1',4900.000,0.000,''),(28,6,'Tanque2',4900.000,0.000,''),(29,6,'Tanque3',4900.000,0.000,NULL),(30,7,'Tanque1',1500.000,0.000,'TRR3+H');
/*!40000 ALTER TABLE `tanques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traslados`
--

DROP TABLE IF EXISTS `traslados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traslados` (
  `idtraslado` int NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `responsable` varchar(20) DEFAULT NULL,
  `origen` int DEFAULT NULL,
  `destino` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtraslado`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traslados`
--

LOCK TABLES `traslados` WRITE;
/*!40000 ALTER TABLE `traslados` DISABLE KEYS */;
INSERT INTO `traslados` VALUES (1,'tobos que ya estaban en la parrilla','frank',1,2,'2024-07-17','FRANK'),(2,'Estaban en parrilla nuevos','Frank',1,2,'2024-07-17','FRANK'),(3,'Se llevaron del principal','Freddy',1,2,'2024-07-17','FRANK'),(4,'e había inventario viejo en principal','Frank',1,2,'2024-07-18','FRANK'),(5,'Ajuste ya estaba en almacén 2','Frank',1,3,'2024-07-19','FRANK'),(6,'Traslado','Josser',2,1,'2024-07-19','JOSSER'),(7,'Translado. se bajoel 18 soto','Frank',2,1,'2024-07-19','FRANK'),(8,'Se rajo el tobo se echo parrilla','Frank',2,1,'2024-07-19','FRANK'),(9,'Traslado','Josser',2,1,'2024-07-23','JOSSER'),(10,'Traslado','Josser',2,1,'2024-07-25','JOSSER'),(11,'Translado para venta corcelfq','Frank',3,1,'2024-08-08','FRANK'),(12,'Se dejaron en las parrillas','Frank',1,2,'2024-08-13','FRANK');
/*!40000 ALTER TABLE `traslados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turnos` (
  `idturno` int NOT NULL AUTO_INCREMENT,
  `nombreturno` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` VALUES (1,'Turno 1'),(2,'Turno 2');
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'FRANK','administrador@gmail.com',NULL,'$2y$10$x06i0lR7iZsoSyD5kzeYLODMdzilGS2eo7QkAjIp2lVqZTOu/327q','zB1b6yPjxVPMqLoPq7aZPQcS575f8GckKn9GNsmLUWkZfdSIAcAaiujr3ZKJ','2023-07-13 19:33:35','2024-07-17 16:18:35'),(2,'JOSSER','supervicion@gmail.com',NULL,'$2y$10$AAyht3mvMxgCxxKcnBi6LO6P3HSa/VT3Ytr4.kvMWibifY3AYNOg6','naWA9V05NFa6PTuPU2m5gkbd3qpKyh2kDpfj6qzpcEGcf4ap8H08cfSmlcPd','2023-08-09 19:17:25','2024-07-17 16:16:59'),(3,'FRANKLIN','gerencia@gmail.com',NULL,'$2y$10$iqLilyXICejgbAVk/AmGpecZMeMshz.n.QyHQ4Kq7GHhF/JForVOm',NULL,'2023-08-09 21:21:04','2024-07-17 16:17:06'),(4,'FREDDY','supervisor1@gmail.com',NULL,'$2y$10$qAv0haEnUOGiAEZHXE01FuKgcZewDs4qY.ZuTzSyewQLl/4qVEJ/q',NULL,'2024-06-13 04:06:10','2024-07-17 16:17:31'),(5,'FERNANDO','supervisor2@gmail.com',NULL,'$2y$10$I1Qxb.2Q4.w.dC/Bmu8of.P04epT2IruUwh.ZTfKUKTwAom2Tz6NO',NULL,'2024-06-13 04:12:39','2024-07-17 16:18:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-21 12:56:47
