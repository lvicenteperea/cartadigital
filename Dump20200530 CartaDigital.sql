CREATE DATABASE  IF NOT EXISTS `carta_digital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `carta_digital`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: carta_digital
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cartas`
--

DROP TABLE IF EXISTS `cartas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_local` bigint NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_plantilla` bigint DEFAULT '1' COMMENT '0 --> La carta es un fichero\n1 --> La carta se genera en la aplicación y se genera con la plantilla 1, de momento solo hay una, pero en el futuro habrá una tabla de plantillas',
  `fichero` varchar(255) DEFAULT NULL COMMENT 'Nombre de Fichero que contiene la carta, solo se rellena cuando la plantilla es cero.',
  `descripcion` text,
  `precio` decimal(7,2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `token_QR` varchar(255) DEFAULT NULL,
  `url_corta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`nombre`),
  KEY `fk_cartas_emp_locales` (`id_local`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartas`
--

LOCK TABLES `cartas` WRITE;
/*!40000 ALTER TABLE `cartas` DISABLE KEYS */;
INSERT INTO `cartas` VALUES (2,2,'Carta general',0,'carta.pdf','Carta general',NULL,'2020-05-19 23:28:30','2020-05-19 23:45:18',NULL,NULL),(3,2,'Desayunos',1,NULL,'Carta general desayunos on-line',NULL,'2020-05-19 23:30:21','2020-05-19 23:45:18',NULL,NULL),(4,2,'Carta de <strong>menús</strong> diarios',1,NULL,'Disfruta de nuestro menú diario a un precio  exquisito y recuerda que el pan, bebidas y el café o té están incluidos',12.00,'2020-05-19 23:45:18','2020-05-20 00:01:55',NULL,NULL),(5,2,'Carta Restaurante',1,NULL,'Nuestros platos, especialidades para ti',NULL,'2020-05-19 23:45:18',NULL,NULL,NULL);
/*!40000 ALTER TABLE `cartas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartas_grupos`
--

DROP TABLE IF EXISTS `cartas_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartas_grupos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_carta` bigint NOT NULL,
  `orden` bigint NOT NULL DEFAULT '0',
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `precio` decimal(7,2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cartas_grupos_cartas` (`id_carta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartas_grupos`
--

LOCK TABLES `cartas_grupos` WRITE;
/*!40000 ALTER TABLE `cartas_grupos` DISABLE KEYS */;
INSERT INTO `cartas_grupos` VALUES (2,3,1,'Café','Si no tienes nada de hambre',1.00,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(3,3,2,'Desayuno normal','Café o té acompañado de lo que prefieras: tostadas, Churros , bollería',3.00,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(4,3,3,'Desayuno + Zumo','Añade al desayuno un delicioso zumo de naranja recien exprimido',4.00,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(5,4,1,'Entrantes','Deliciosos entrantes',NULL,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(6,4,2,'Principales','elige un plato principal',NULL,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(7,4,3,'Postres','Y para terminar un postre',NULL,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(8,5,1,'Carnes','Deliciosas carnes',NULL,'2020-05-19 23:52:49','2020-05-19 23:56:48'),(9,5,2,'Pescados','Exquisitos pescados',NULL,'2020-05-19 23:52:49','2020-05-19 23:56:48');
/*!40000 ALTER TABLE `cartas_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartas_items`
--

DROP TABLE IF EXISTS `cartas_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartas_items` (
  `id` bigint NOT NULL,
  `id_grupo` bigint NOT NULL,
  `orden` bigint NOT NULL DEFAULT '0',
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `precio` decimal(7,2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cartas_items_grupos` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartas_items`
--

LOCK TABLES `cartas_items` WRITE;
/*!40000 ALTER TABLE `cartas_items` DISABLE KEYS */;
INSERT INTO `cartas_items` VALUES (2,5,1,'Sopa Juliana',NULL,NULL,'2020-05-20 00:00:19',NULL),(3,5,2,'Gazpacho','Pide si lo quieres picante',NULL,'2020-05-20 00:00:19','2020-05-20 00:00:50'),(4,5,3,'Judias Verdes',NULL,NULL,'2020-05-20 00:00:19',NULL),(5,6,1,'Filete ternera',NULL,NULL,'2020-05-20 00:00:19',NULL),(6,6,2,'Bacalao Bilbaina',NULL,NULL,'2020-05-20 00:00:19',NULL),(7,6,3,'Paella',NULL,NULL,'2020-05-20 00:00:19',NULL),(8,7,1,'Fruta',NULL,NULL,'2020-05-20 00:00:19',NULL),(9,7,2,'Tarta',NULL,NULL,'2020-05-20 00:00:19',NULL),(10,8,1,'Chuleton de Buey','La mejor pieza del buey',15.00,'2020-05-20 00:08:18',NULL),(11,8,2,'Pollo asado','Pollo asado lentamente',12.00,'2020-05-20 00:08:18',NULL),(12,8,3,'Lomo de cerdo','Cerdo ibérico',10.00,'2020-05-20 00:08:18',NULL),(13,9,1,'Bacalao al horno',NULL,17.00,'2020-05-20 00:08:18',NULL),(14,9,2,'Lenguado a la espalda',NULL,20.00,'2020-05-20 00:08:18',NULL);
/*!40000 ALTER TABLE `cartas_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_contenidos`
--

DROP TABLE IF EXISTS `cnt_contenidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_contenidos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_app` bigint NOT NULL,
  `id_def_contenido` bigint NOT NULL,
  `descripcion` varchar(1000) NOT NULL COMMENT '\n',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cnt_contenidos_def_contenido_idx` (`id_def_contenido`),
  KEY `fk_cnt_contenidos_apps` (`id_app`),
  CONSTRAINT `fk_cnt_contenidos_apps` FOREIGN KEY (`id_app`) REFERENCES `hxxi_aplicaciones` (`id`),
  CONSTRAINT `fk_cnt_contenidos_def_contenido` FOREIGN KEY (`id_def_contenido`) REFERENCES `cnt_def_contenidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_contenidos`
--

LOCK TABLES `cnt_contenidos` WRITE;
/*!40000 ALTER TABLE `cnt_contenidos` DISABLE KEYS */;
INSERT INTO `cnt_contenidos` VALUES (2,1,1,'Preguntas frecuentes de HangarXXI  (app-1)','2020-05-21 17:15:01','2020-05-26 02:31:36'),(3,1,2,'Documentos legales de Hangar XXI  (app-1)','2020-05-21 17:15:30',NULL),(5,2,1,'Preguntas frecuentes de Points (app-2)','2020-05-26 02:31:36',NULL);
/*!40000 ALTER TABLE `cnt_contenidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_def_campos`
--

DROP TABLE IF EXISTS `cnt_def_campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_def_campos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_def_contenido` bigint NOT NULL,
  `id_tipo_campo` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prompt` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `validacion` json DEFAULT NULL COMMENT 'diferentes validaciones: \\n     -   {"metodo": "si_o_no"}\\n     -   {"valores":"s,n,S,N"}',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cnt_def_campos_contenido_idx` (`id_def_contenido`),
  CONSTRAINT `fk_cnt_def_campos_def_contenidos` FOREIGN KEY (`id_def_contenido`) REFERENCES `cnt_def_contenidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla con los tipos de campos posibles que pueden ser los contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_def_campos`
--

LOCK TABLES `cnt_def_campos` WRITE;
/*!40000 ALTER TABLE `cnt_def_campos` DISABLE KEYS */;
INSERT INTO `cnt_def_campos` VALUES (1,1,1,'pregunta','Pregunta',NULL,'2020-05-21 17:06:08',NULL),(2,1,1,'respuesta','Respuesta',NULL,'2020-05-21 17:06:08',NULL),(3,1,2,'orden','Orden',NULL,'2020-05-21 17:06:08',NULL),(4,2,3,'BBLL_fic','Bases Legales',NULL,'2020-05-21 17:09:43',NULL),(5,2,4,'BBLL_html','Bases Legales',NULL,'2020-05-21 17:09:43',NULL),(7,2,3,'CCGG_fic','CCGG',NULL,'2020-05-21 17:10:27',NULL),(8,2,4,'CCGG_html','CCGG',NULL,'2020-05-21 17:10:27',NULL);
/*!40000 ALTER TABLE `cnt_def_campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_def_contenidos`
--

DROP TABLE IF EXISTS `cnt_def_contenidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_def_contenidos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `origen` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_def_contenidos`
--

LOCK TABLES `cnt_def_contenidos` WRITE;
/*!40000 ALTER TABLE `cnt_def_contenidos` DISABLE KEYS */;
INSERT INTO `cnt_def_contenidos` VALUES (1,'GENERAL','PPFF','Estructura general de las PPFF','2020-05-21 16:59:20',NULL),(2,'GENERAL','Documentos-Legales','Estructura general de lo que son los documentos legales, cookies, PPLL,...','2020-05-21 16:59:20',NULL);
/*!40000 ALTER TABLE `cnt_def_contenidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_fechas`
--

DROP TABLE IF EXISTS `cnt_fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_fechas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_cnt_contenidos` bigint DEFAULT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cnt_fechas_contenidos_idx` (`id_cnt_contenidos`),
  CONSTRAINT `fk_cnt_fechas_contenidos` FOREIGN KEY (`id_cnt_contenidos`) REFERENCES `cnt_contenidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_fechas`
--

LOCK TABLES `cnt_fechas` WRITE;
/*!40000 ALTER TABLE `cnt_fechas` DISABLE KEYS */;
INSERT INTO `cnt_fechas` VALUES (1,2,'2020-05-21 00:00:00',NULL,'Primer rango de fechas de los conteidos de preguntas frecuentes de HXX','2020-05-21 17:16:57',NULL),(2,3,'2020-05-21 00:00:00',NULL,'Primer rango de fechas de los conteidos de documentos legales de HXX','2020-05-21 17:16:57',NULL);
/*!40000 ALTER TABLE `cnt_fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_idioma_disp`
--

DROP TABLE IF EXISTS `cnt_idioma_disp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_idioma_disp` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_cnt_fechas` bigint NOT NULL,
  `id_idioma` bigint NOT NULL DEFAULT '0' COMMENT 'Idioma 0 es que vale para todos los idiomas o para los idiomas no definidos',
  `id_dispositivo` bigint NOT NULL DEFAULT '0' COMMENT 'Dispositivos  0 es que vale para todos los dispositivos o para los no definidos',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cnt_contenidos_valor_fechas_idx` (`id_cnt_fechas`),
  KEY `fk_cnt_idiomas_disp_dispositivos_idx` (`id_dispositivo`),
  KEY `fk_cnt_idiomas_disp_idiomas_idx` (`id_idioma`),
  CONSTRAINT `fk_cnt_fechass_idiomas_fechas` FOREIGN KEY (`id_cnt_fechas`) REFERENCES `cnt_fechas` (`id`),
  CONSTRAINT `fk_cnt_idiomas_disp_dispositivos` FOREIGN KEY (`id_dispositivo`) REFERENCES `hxxi_dispositivos` (`id`),
  CONSTRAINT `fk_cnt_idiomas_disp_idiomas` FOREIGN KEY (`id_idioma`) REFERENCES `hxxi_idiomas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_idioma_disp`
--

LOCK TABLES `cnt_idioma_disp` WRITE;
/*!40000 ALTER TABLE `cnt_idioma_disp` DISABLE KEYS */;
INSERT INTO `cnt_idioma_disp` VALUES (3,1,0,0,'2020-05-21 17:22:52',NULL),(4,2,0,0,'2020-05-21 17:22:52',NULL);
/*!40000 ALTER TABLE `cnt_idioma_disp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_tipo_campos`
--

DROP TABLE IF EXISTS `cnt_tipo_campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_tipo_campos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `validacion` json NOT NULL COMMENT 'diferentes validaciones: \n     -   {"metodo": "si_o_no"}\n     -   {"valores":"s,n,S,N"}',
  `descripcion` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'describimos el tipo de campo, como está definido en contenidos,....',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla con los tipos de campos posibles que pueden ser los contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_tipo_campos`
--

LOCK TABLES `cnt_tipo_campos` WRITE;
/*!40000 ALTER TABLE `cnt_tipo_campos` DISABLE KEYS */;
INSERT INTO `cnt_tipo_campos` VALUES (1,'Cadena','{\"required\": \"N\"}','Cadena de logintud variable',NULL,NULL),(2,'Numero','{\"required\": \"N\"}','Numero sin precisión',NULL,NULL),(3,'Fichero','{\"required\": \"N\"}','Nombre del fichero con su url o dirección incluida','2020-05-21 17:09:28',NULL),(4,'Html','{\"required\": \"N\"}','Texto integro en HTML','2020-05-21 17:09:28',NULL),(8,'SiNo','{\"required\": \"N\"}','Este campo solo puede tener valor \'S\' o \'N\'','2020-05-26 02:28:08',NULL),(9,'Geolocalizacion','{\"required\": \"N\"}','Este tipo de campo ocupa dos valores de coordenadas de geolocalización','2020-05-26 02:28:08',NULL);
/*!40000 ALTER TABLE `cnt_tipo_campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_valores`
--

DROP TABLE IF EXISTS `cnt_valores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cnt_valores` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_idiomas_disp` bigint NOT NULL,
  `id_def_contenido` bigint NOT NULL COMMENT 'se puede sacar de la tabla de cnt_contenidos, pero aquí queda mas claro, eso si, debe ser igual a su padre en dicha tabla',
  `id_def_campo` bigint NOT NULL COMMENT 'Para saber de que campo estamos hablando en cada ocasión',
  `valor1` text,
  `valor2` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_valores_fechas_idiomas_idx` (`id_idiomas_disp`),
  CONSTRAINT `fk_valores_idiomas_disp` FOREIGN KEY (`id_idiomas_disp`) REFERENCES `cnt_idioma_disp` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Esta tabla sabe los valores de los contenidos para un ID_Idioma_dips, que a su vez sabe para que fehcas ( Id_cnt_fecha), que asi vez sabe para que contenido es (id_cnt_contenido). El contenido a su vez está asociado a un id_def_contenido, por lo que sabemos que campos (cnt_def_campos para ese id_def_contenido ) puede tener. Esto se debe controlar por lógica de programa\n\nAdemás sabemos para que aplicaicón es.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_valores`
--

LOCK TABLES `cnt_valores` WRITE;
/*!40000 ALTER TABLE `cnt_valores` DISABLE KEYS */;
INSERT INTO `cnt_valores` VALUES (1,3,1,1,'Mi primera pregunta',NULL,'2020-05-21 17:46:33',NULL),(2,3,1,2,'Mi primera respuesta',NULL,'2020-05-21 17:46:33',NULL),(3,3,1,3,'1',NULL,'2020-05-21 17:46:33',NULL),(4,3,1,1,'Mi segunda pregunta',NULL,'2020-05-21 17:46:33',NULL),(5,3,1,2,'Mi segunda respuesta',NULL,'2020-05-21 17:46:33',NULL),(6,3,1,3,'2',NULL,'2020-05-21 17:46:33',NULL),(7,3,1,1,'Mi tercera pregunta',NULL,'2020-05-21 17:56:55','2020-05-21 17:57:40'),(8,3,1,2,'Mi tercera respuesta',NULL,'2020-05-21 17:56:55','2020-05-21 17:57:40'),(9,3,1,3,'3',NULL,'2020-05-21 17:56:55','2020-05-21 17:57:40'),(10,3,1,1,'Mi cuarta pregunta',NULL,'2020-05-21 17:56:55','2020-05-21 17:57:40'),(11,3,1,2,'Mi cuarta respuesta',NULL,'2020-05-21 17:56:55','2020-05-21 17:57:40'),(12,3,1,3,'4',NULL,'2020-05-21 17:56:55','2020-05-21 17:57:40'),(13,3,2,5,'Bases legales de <strong>Hangar XXI</strong>',NULL,'2020-05-21 18:00:05',NULL),(14,3,2,8,'Condiciones generales de <strong>Hangar XXI</strong>',NULL,'2020-05-21 18:00:05',NULL);
/*!40000 ALTER TABLE `cnt_valores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_empresas`
--

DROP TABLE IF EXISTS `emp_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp_empresas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `Id_Sector` bigint DEFAULT '1',
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_empresas`
--

LOCK TABLES `emp_empresas` WRITE;
/*!40000 ALTER TABLE `emp_empresas` DISABLE KEYS */;
INSERT INTO `emp_empresas` VALUES (1,0,'Hangar XXI','2020-05-20 19:03:09','2020-05-20 19:03:22'),(2,1,'Restaurantes unificados','2020-05-19 23:21:38',NULL);
/*!40000 ALTER TABLE `emp_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_locales`
--

DROP TABLE IF EXISTS `emp_locales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp_locales` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_empresa` bigint DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `cod_postal` varchar(16) DEFAULT NULL,
  `id_prov` bigint NOT NULL DEFAULT '0',
  `municipio` varchar(100) DEFAULT NULL,
  `id_pais` bigint NOT NULL DEFAULT '34',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_locales_empresas` (`id_empresa`),
  CONSTRAINT `fk_emp_locales_empresas` FOREIGN KEY (`id_empresa`) REFERENCES `emp_empresas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_locales`
--

LOCK TABLES `emp_locales` WRITE;
/*!40000 ALTER TABLE `emp_locales` DISABLE KEYS */;
INSERT INTO `emp_locales` VALUES (2,2,'Restaurante 1','Imagen 1','91 856 85 74','rest1@email.com','www.web1.com','Dirección restaurante 2','28041',0,'Madrid',34,'2020-05-19 23:25:19','2020-05-25 18:07:50'),(3,2,'Restaurante 2','Imagen 2','91 458 85 75','rest2@email.com','www.web2.com','Dirección restaurante 2','28042',0,'Madrid',34,'2020-05-25 18:07:50',NULL);
/*!40000 ALTER TABLE `emp_locales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxxi_aplicaciones`
--

DROP TABLE IF EXISTS `hxxi_aplicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hxxi_aplicaciones` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='web o aplicaciones que tiene contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxxi_aplicaciones`
--

LOCK TABLES `hxxi_aplicaciones` WRITE;
/*!40000 ALTER TABLE `hxxi_aplicaciones` DISABLE KEYS */;
INSERT INTO `hxxi_aplicaciones` VALUES (1,'Hangar XXI','2020-05-21 16:39:00',NULL),(2,'Points','2020-05-21 16:39:00',NULL);
/*!40000 ALTER TABLE `hxxi_aplicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxxi_dispositivos`
--

DROP TABLE IF EXISTS `hxxi_dispositivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hxxi_dispositivos` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Dispositivo 0 es que vale para todos los dispositivos o para los no definidos',
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla con los tipos de campos posibles que pueden ser los contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxxi_dispositivos`
--

LOCK TABLES `hxxi_dispositivos` WRITE;
/*!40000 ALTER TABLE `hxxi_dispositivos` DISABLE KEYS */;
INSERT INTO `hxxi_dispositivos` VALUES (0,'Todos','2020-05-21 16:42:06','2020-05-21 16:42:15'),(1,'Sobremesa o portatil','2020-05-21 16:41:55',NULL),(2,'Móvil','2020-05-21 16:41:55',NULL),(3,'Tableta','2020-05-21 16:41:55',NULL);
/*!40000 ALTER TABLE `hxxi_dispositivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxxi_idiomas`
--

DROP TABLE IF EXISTS `hxxi_idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hxxi_idiomas` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'El dioma cero es apra todos los idiomas o idiomas no definidos',
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ansi` varchar(5) DEFAULT NULL,
  `idioma` char(2) DEFAULT NULL,
  `pais` char(2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla con los tipos de campos posibles que pueden ser los contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxxi_idiomas`
--

LOCK TABLES `hxxi_idiomas` WRITE;
/*!40000 ALTER TABLE `hxxi_idiomas` DISABLE KEYS */;
INSERT INTO `hxxi_idiomas` VALUES (0,'Para todos los idiomas','_____','__','__','2020-05-21 16:45:42','2020-05-21 16:46:13'),(2,'Español','es_ES','es','ES','2020-05-21 16:45:42',NULL),(3,'Ingles','en_EN','en','ES','2020-05-21 16:46:05',NULL);
/*!40000 ALTER TABLE `hxxi_idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxxi_textos`
--

DROP TABLE IF EXISTS `hxxi_textos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hxxi_textos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `división` int NOT NULL DEFAULT '0' COMMENT '0 -> general; 1 -> Tablas',
  `subdivision` varchar(100) DEFAULT NULL COMMENT 'Sobre todo en el caso de tablas, para saber a que tabla pertenece el texto',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='web o aplicaciones que tiene contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxxi_textos`
--

LOCK TABLES `hxxi_textos` WRITE;
/*!40000 ALTER TABLE `hxxi_textos` DISABLE KEYS */;
/*!40000 ALTER TABLE `hxxi_textos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxxi_textos_idiomas`
--

DROP TABLE IF EXISTS `hxxi_textos_idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hxxi_textos_idiomas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_idioma` bigint NOT NULL DEFAULT '0' COMMENT 'Idioma 0 es que vale para todos los idiomas o para los idiomas no definidos',
  `texto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_hxxi_textos_Idiomas_idiomas_idx` (`id_idioma`),
  CONSTRAINT `fk_hxxi_textos_Idiomas_Idiomas` FOREIGN KEY (`id_idioma`) REFERENCES `hxxi_idiomas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='web o aplicaciones que tiene contenidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxxi_textos_idiomas`
--

LOCK TABLES `hxxi_textos_idiomas` WRITE;
/*!40000 ALTER TABLE `hxxi_textos_idiomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `hxxi_textos_idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hxxi_users`
--

DROP TABLE IF EXISTS `hxxi_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hxxi_users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL COMMENT 'Admin: Administradores:\nUser: Empresas\nClient: cliente finales o anónimos',
  `id_user_jefe` bigint DEFAULT NULL COMMENT 'Si el id_user es null es que no tiene jefe o responsable',
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_empresa` bigint DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_empresa` (`id_empresa`),
  KEY `fk_users_jefes_idx` (`id_user_jefe`),
  CONSTRAINT `fk_user_emp_empresas` FOREIGN KEY (`id_empresa`) REFERENCES `emp_empresas` (`id`),
  CONSTRAINT `fk_users_jefes` FOREIGN KEY (`id_user_jefe`) REFERENCES `hxxi_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hxxi_users`
--

LOCK TABLES `hxxi_users` WRITE;
/*!40000 ALTER TABLE `hxxi_users` DISABLE KEYS */;
INSERT INTO `hxxi_users` VALUES (10,'admin',11,'Administrador','Principal','Admin','admin@a.com','$2y$10$0pXu6k.OuBhzH.hWXQCX6O7MOOGEBR8AXBBRho6ezwVd1.qfsSDRq',2,'1590530135luis vicente.jpg','2020-05-19 23:24:33','2020-05-30 01:45:38','JzOYpNFgCnVA0mjsbKJLBryZwcHVx6ZKTmAKtWYnYCmUXp376fudY8YzRlU3'),(11,'user',10,'Luis','Vicente','vicente','a@a.com','$2y$10$0pXu6k.OuBhzH.hWXQCX6O7MOOGEBR8AXBBRho6ezwVd1.qfsSDRq',2,'imagen','2020-05-26 12:10:08','2020-05-27 01:37:02',NULL);
/*!40000 ALTER TABLE `hxxi_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('a@a.com','$2y$10$tgnEZLaFlj2BZYVEZrdnqe9hTV3J3L4s35ymf5HsFVywC0I2n4gYC','2020-05-29 22:04:27'),('lavp99@hotmail.com','$2y$10$lySwxRzd11cOgMNyogE74OWUwB7CYcEeCx7DbY6xyoEy.a5jVkdmO','2020-05-29 22:40:06');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL COMMENT 'Admin: Administradores:\nUser: Empresas\nClient: cliente finales o anónimos',
  `id_user_jefe` bigint DEFAULT NULL COMMENT 'Si el id_user es null es que no tiene jefe o responsable',
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_empresa` bigint DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_empresa` (`id_empresa`),
  KEY `fk_users_jefes_idx` (`id_user_jefe`),
  KEY `fk_users_jefe_idx` (`id_user_jefe`),
  CONSTRAINT `fk_users_emp_empresas` FOREIGN KEY (`id_empresa`) REFERENCES `emp_empresas` (`id`),
  CONSTRAINT `fk_users_jefe` FOREIGN KEY (`id_user_jefe`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,'admin',NULL,'Administrador','Principal','Admin','admin@admin.com','$2y$10$k.UTcYvdK2CKHraTurBydOhSdhWl8DaDss4ni6s0XOLuE55C2t6ky',NULL,NULL,'2020-05-19 23:24:33','2020-05-26 13:55:19','H9sK4GYR1BWG2G4e0UU2WzEDg9aeNkifLEtxHpHRJzApENZStjptE4xhpCfB'),(12,NULL,NULL,'Luis',NULL,NULL,'lvicente@hangarxxi.com','$2y$10$k.UTcYvdK2CKHraTurBydOhSdhWl8DaDss4ni6s0XOLuE55C2t6ky',NULL,NULL,'2020-05-25 17:53:22','2020-05-25 17:53:22',NULL),(13,'user',10,'Luis','Vicente','lavp99','lavp@kdkdkdkd.com','$10$k.UTcYvdK2CKHraTurBydOhSdhWl8DaDss4ni6s0XOLuE55C2t6ky',1,'imagen','2020-05-25 17:59:20','2020-05-25 23:13:00',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'carta_digital'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-30 15:29:10
