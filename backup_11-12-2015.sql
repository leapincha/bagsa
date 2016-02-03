CREATE DATABASE  IF NOT EXISTS `intranet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `intranet`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.10.1.213    Database: intranet
-- ------------------------------------------------------
-- Server version	5.5.14

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
-- Table structure for table `datos_generales`
--

DROP TABLE IF EXISTS `datos_generales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_generales` (
  `iddatos` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) DEFAULT NULL,
  `usuarios_potenciales` int(7) DEFAULT NULL,
  `cant_usuarios` int(7) DEFAULT NULL,
  `tel_oficina` varchar(45) DEFAULT NULL,
  `tel_cooperativa` varchar(45) DEFAULT NULL,
  `direc_oficina` varchar(45) DEFAULT NULL,
  `direc_cooperativa` varchar(45) DEFAULT NULL,
  `bombero` int(6) DEFAULT NULL,
  `policia` int(6) DEFAULT NULL,
  `defensa_civil` varchar(45) DEFAULT NULL,
  `emerg_cooperativa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddatos`),
  KEY `id_localidad_idx` (`id_localidad`),
  CONSTRAINT `id_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_generales`
--

LOCK TABLES `datos_generales` WRITE;
/*!40000 ALTER TABLE `datos_generales` DISABLE KEYS */;
INSERT INTO `datos_generales` VALUES (1,1,8500,6000,' 02255-45-3801',' 02255-45-3801','128 e/ 38 y 39','128 e/38 y 39',100,101,'103/(02255) 46-1030',NULL);
/*!40000 ALTER TABLE `datos_generales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_planta`
--

DROP TABLE IF EXISTS `datos_planta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_planta` (
  `iddatos` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) DEFAULT NULL,
  `cant_tanques` int(2) DEFAULT NULL,
  `cant_vapo` int(2) DEFAULT NULL,
  `capac_dist` varchar(45) DEFAULT NULL,
  `capac_almacenaje` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddatos`),
  KEY `id_loc_idx` (`id_localidad`),
  CONSTRAINT `id_loc` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_planta`
--

LOCK TABLES `datos_planta` WRITE;
/*!40000 ALTER TABLE `datos_planta` DISABLE KEYS */;
INSERT INTO `datos_planta` VALUES (1,1,4,8,'200','300');
/*!40000 ALTER TABLE `datos_planta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_tecnicos`
--

DROP TABLE IF EXISTS `datos_tecnicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_tecnicos` (
  `id_datos_tecnicos` int(11) NOT NULL AUTO_INCREMENT,
  `red` int(11) NOT NULL,
  `long_red` varchar(45) DEFAULT NULL,
  `cant_radios` int(11) DEFAULT NULL,
  `cant_valvulas` int(11) DEFAULT NULL,
  `id_localidad` int(11) NOT NULL,
  PRIMARY KEY (`id_datos_tecnicos`),
  KEY `locali_idx` (`id_localidad`),
  KEY `tipo_red_idx` (`red`),
  CONSTRAINT `tipo_red` FOREIGN KEY (`red`) REFERENCES `tipo_red` (`idred`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_tecnicos`
--

LOCK TABLES `datos_tecnicos` WRITE;
/*!40000 ALTER TABLE `datos_tecnicos` DISABLE KEYS */;
INSERT INTO `datos_tecnicos` VALUES (1,1,'600',3,6,1);
/*!40000 ALTER TABLE `datos_tecnicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `excavadores`
--

DROP TABLE IF EXISTS `excavadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `excavadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_loc_idx` (`id_localidad`),
  CONSTRAINT `locali` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `excavadores`
--

LOCK TABLES `excavadores` WRITE;
/*!40000 ALTER TABLE `excavadores` DISABLE KEYS */;
INSERT INTO `excavadores` VALUES (1,1,'Rodriguez Luis','3674849913');
/*!40000 ALTER TABLE `excavadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerencia` (
  `id_gerencia` int(11) NOT NULL,
  `gerencia` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_gerencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerencia`
--

LOCK TABLES `gerencia` WRITE;
/*!40000 ALTER TABLE `gerencia` DISABLE KEYS */;
INSERT INTO `gerencia` VALUES (1,'Sistemas'),(2,'Operaciones'),(3,'Legales y RRHH'),(4,'Economía y Negocios'),(5,'Administración y Finanzas'),(6,'Técnica y Planeamiento'),(7,'Comercial'),(8,'Cobranza');
/*!40000 ALTER TABLE `gerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localidad`
--

DROP TABLE IF EXISTS `localidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_uo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_uo_idx` (`id_uo`),
  CONSTRAINT `id_uo` FOREIGN KEY (`id_uo`) REFERENCES `unidad_operativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidad`
--

LOCK TABLES `localidad` WRITE;
/*!40000 ALTER TABLE `localidad` DISABLE KEYS */;
INSERT INTO `localidad` VALUES (1,'Villa Gesell',1);
/*!40000 ALTER TABLE `localidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_localidad`
--

DROP TABLE IF EXISTS `personal_localidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_localidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `nombre_apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_localidad_idx` (`id_localidad`),
  KEY `tipo_idx` (`id_tipo`),
  CONSTRAINT `tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_personal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_loca` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_localidad`
--

LOCK TABLES `personal_localidad` WRITE;
/*!40000 ALTER TABLE `personal_localidad` DISABLE KEYS */;
INSERT INTO `personal_localidad` VALUES (1,1,1,'Luis Guzma','29383838383'),(2,1,2,'Lucas Rodriguez','237238738787323'),(3,1,2,'Roberto García','2178728929201');
/*!40000 ALTER TABLE `personal_localidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regional`
--

DROP TABLE IF EXISTS `regional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `responsable` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regional`
--

LOCK TABLES `regional` WRITE;
/*!40000 ALTER TABLE `regional` DISABLE KEYS */;
INSERT INTO `regional` VALUES (1,'Central - La Plata','Dario Bianucci'),(2,'Tres Arroyos','Dario Aguero'),(3,'Bolivar','Juan Herrero'),(4,'San Nicolas','Pablo Echarte');
/*!40000 ALTER TABLE `regional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Responsable Gerencia'),(2,'Usuario Gerencia'),(3,'Responsable Regional'),(4,'Responsable Unidad Operativa'),(5,'Usuario Localidad'),(6,'Administrador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sector`
--

DROP TABLE IF EXISTS `sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `sector` varchar(80) DEFAULT NULL,
  `id_gerencia` int(11) NOT NULL,
  PRIMARY KEY (`id_sector`),
  KEY `id_gerencia_idx` (`id_gerencia`),
  CONSTRAINT `id_gerencia` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id_gerencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sector`
--

LOCK TABLES `sector` WRITE;
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
INSERT INTO `sector` VALUES (1,'Desarrollo',1),(2,'Soporte Técnico',1),(3,'Gerente',1),(4,'Gasoductos',2),(5,'Fugas',2);
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_personal`
--

DROP TABLE IF EXISTS `tipo_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_personal`
--

LOCK TABLES `tipo_personal` WRITE;
/*!40000 ALTER TABLE `tipo_personal` DISABLE KEYS */;
INSERT INTO `tipo_personal` VALUES (1,'Responsable Operativo'),(2,'Operario'),(3,'Administrativo');
/*!40000 ALTER TABLE `tipo_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_red`
--

DROP TABLE IF EXISTS `tipo_red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_red` (
  `idred` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_red` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idred`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_red`
--

LOCK TABLES `tipo_red` WRITE;
/*!40000 ALTER TABLE `tipo_red` DISABLE KEYS */;
INSERT INTO `tipo_red` VALUES (1,'GN'),(2,'GLP');
/*!40000 ALTER TABLE `tipo_red` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion_planta`
--

DROP TABLE IF EXISTS `ubicacion_planta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion_planta` (
  `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_localidad` int(11) NOT NULL,
  `latitud` float(10,6) DEFAULT NULL,
  `longitud` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id_ubicacion`),
  KEY `id_loca_idx` (`id_localidad`),
  CONSTRAINT `id_locali` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion_planta`
--

LOCK TABLES `ubicacion_planta` WRITE;
/*!40000 ALTER TABLE `ubicacion_planta` DISABLE KEYS */;
INSERT INTO `ubicacion_planta` VALUES (1,1,-37.267933,-56.973305);
/*!40000 ALTER TABLE `ubicacion_planta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_operativa`
--

DROP TABLE IF EXISTS `unidad_operativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_operativa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_regional` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id_regional`),
  CONSTRAINT `id` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_operativa`
--

LOCK TABLES `unidad_operativa` WRITE;
/*!40000 ALTER TABLE `unidad_operativa` DISABLE KEYS */;
INSERT INTO `unidad_operativa` VALUES (1,'Gesell',1),(2,'Magdalena',1),(3,'Veronica',1),(4,'Arturo Seguí',1),(8,'Moquehua',1),(9,'Norberto de la Riestra',1),(10,'Carboni / Salvador María',1),(11,'Tres Arroyos',2);
/*!40000 ALTER TABLE `unidad_operativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `foto` varchar(90) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `rol_idx` (`id_rol`),
  CONSTRAINT `rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('lea',15,'lea','Leandro Gorriz','lgorriz@bagsa.com.ar','avatar5.png',2);
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

-- Dump completed on 2015-12-11 10:12:57
