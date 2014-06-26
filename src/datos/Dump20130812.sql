CREATE DATABASE  IF NOT EXISTS `facturacion` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `facturacion`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: facturacion
-- ------------------------------------------------------
-- Server version	5.5.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` datetime NOT NULL,
  `cliente` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `IVA` float NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `cliente` (`cliente`),
  KEY `producto` (`producto`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `cliente` FOREIGN KEY (`cliente`) REFERENCES `partner` (`idpartner`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `producto` FOREIGN KEY (`producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'2012-02-08 00:00:00',1,1,1,1,16,116),(2,'2012-09-08 00:00:00',2,1,1,2,232,232),(3,'2013-07-08 00:00:00',3,1,1,4,64,464),(4,'2013-09-08 00:00:00',4,1,1,6,80,680);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner` (
  `idpartner` int(11) NOT NULL AUTO_INCREMENT,
  `partner` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `cliente` varchar(45) NOT NULL,
  `metodo_pago` varchar(45) NOT NULL DEFAULT 'Transferencia',
  PRIMARY KEY (`idpartner`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner`
--

LOCK TABLES `partner` WRITE;
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;
INSERT INTO `partner` VALUES (1,'Gerardo Lopez Vega','Gerardo Lopez Vega','LOVG880408E79','Fracc. Arboledas Cond. Sauces #36 Acapulco Gr','2','Transferencia'),(2,'Laura Ortega Cortes','Laura Ortega Cortes','ORCL891019R37','Fracc. Arboledas Cond. Sauces #36 Acapulco Gr','1','Efectivo'),(3,'Elizabeth Cortes Guevara','Elizabeth Cortes Guevara','DUEM891019A15','Fracc. Arboledas Cond. Sauces #36 Acapulco Gr','1','Cheque'),(4,'Nicolas Ortega Moreno','Nicolas Ortega Moreno','PEIS891019R12','Fracc. Arboledas Cond. Sauces #36 Acapulco Gr','1','Transferencia');
/*!40000 ALTER TABLE `partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Soporte Tecnico','1',100,1),(2,'Consultoria','1',200,1),(3,'Programacion','1',300,1),(4,'Computadora','2',500,1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'gera','123','Gerardo Lopez','Lopez y Asociados','LOVG880408E79','Acapulco Gro'),(2,'lau','123','Laura Ortega','Laura Ortega Cortes','OECL891019M48','Acapulco Gro');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-12 11:53:21
