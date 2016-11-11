-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: expen
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `cc_airportraillinkcosts`
--

DROP TABLE IF EXISTS `cc_airportraillinkcosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_airportraillinkcosts` (
  `id` int(11) NOT NULL,
  `airportraillinkcost` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_airportraillinkcosts`
--

LOCK TABLES `cc_airportraillinkcosts` WRITE;
/*!40000 ALTER TABLE `cc_airportraillinkcosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_airportraillinkcosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_airportraillinkcoststations`
--

DROP TABLE IF EXISTS `cc_airportraillinkcoststations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_airportraillinkcoststations` (
  `id` int(11) NOT NULL,
  `airportraillinkcoststation` decimal(12,2) NOT NULL,
  `station_id` int(11) NOT NULL,
  `destination_station_id` int(11) NOT NULL,
  `cost_id` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_airportraillinkcoststations`
--

LOCK TABLES `cc_airportraillinkcoststations` WRITE;
/*!40000 ALTER TABLE `cc_airportraillinkcoststations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_airportraillinkcoststations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_airportraillinkstations`
--

DROP TABLE IF EXISTS `cc_airportraillinkstations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_airportraillinkstations` (
  `id` int(11) NOT NULL,
  `airportraillinkstation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_airportraillinkstations`
--

LOCK TABLES `cc_airportraillinkstations` WRITE;
/*!40000 ALTER TABLE `cc_airportraillinkstations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_airportraillinkstations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_approvals`
--

DROP TABLE IF EXISTS `cc_approvals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_approvals` (
  `id` int(11) NOT NULL,
  `approvalcomment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_approvals`
--

LOCK TABLES `cc_approvals` WRITE;
/*!40000 ALTER TABLE `cc_approvals` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_approvals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_brtcosts`
--

DROP TABLE IF EXISTS `cc_brtcosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_brtcosts` (
  `id` int(11) NOT NULL,
  `brtcostname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_brtcosts`
--

LOCK TABLES `cc_brtcosts` WRITE;
/*!40000 ALTER TABLE `cc_brtcosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_brtcosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_brtcoststations`
--

DROP TABLE IF EXISTS `cc_brtcoststations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_brtcoststations` (
  `id` int(11) NOT NULL,
  `brtcoststationname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost_id` int(11) NOT NULL,
  `destination_station_id` int(11) NOT NULL,
  `origination_station_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_brtcoststations`
--

LOCK TABLES `cc_brtcoststations` WRITE;
/*!40000 ALTER TABLE `cc_brtcoststations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_brtcoststations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_brtstations`
--

DROP TABLE IF EXISTS `cc_brtstations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_brtstations` (
  `id` int(11) NOT NULL,
  `brtstationname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_brtstations`
--

LOCK TABLES `cc_brtstations` WRITE;
/*!40000 ALTER TABLE `cc_brtstations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_brtstations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_btscosts`
--

DROP TABLE IF EXISTS `cc_btscosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_btscosts` (
  `id` int(11) NOT NULL,
  `btscost` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_btscosts`
--

LOCK TABLES `cc_btscosts` WRITE;
/*!40000 ALTER TABLE `cc_btscosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_btscosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_btsstationcosts`
--

DROP TABLE IF EXISTS `cc_btsstationcosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_btsstationcosts` (
  `id` int(11) NOT NULL,
  `btsstationcost` decimal(12,2) NOT NULL,
  `origination_station_id` int(11) NOT NULL,
  `destination_station_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_btsstationcosts`
--

LOCK TABLES `cc_btsstationcosts` WRITE;
/*!40000 ALTER TABLE `cc_btsstationcosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_btsstationcosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_btsstations`
--

DROP TABLE IF EXISTS `cc_btsstations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_btsstations` (
  `id` int(11) NOT NULL,
  `btsstation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_btsstations`
--

LOCK TABLES `cc_btsstations` WRITE;
/*!40000 ALTER TABLE `cc_btsstations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_btsstations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_expenses`
--

DROP TABLE IF EXISTS `cc_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_expenses` (
  `id` int(11) NOT NULL,
  `expensename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_expenses`
--

LOCK TABLES `cc_expenses` WRITE;
/*!40000 ALTER TABLE `cc_expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_expensestatuss`
--

DROP TABLE IF EXISTS `cc_expensestatuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_expensestatuss` (
  `id` int(11) NOT NULL,
  `expensestatusname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_expensestatuss`
--

LOCK TABLES `cc_expensestatuss` WRITE;
/*!40000 ALTER TABLE `cc_expensestatuss` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_expensestatuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_itemcategorys`
--

DROP TABLE IF EXISTS `cc_itemcategorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_itemcategorys` (
  `id` int(11) NOT NULL,
  `itemcategoryname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_itemcategorys`
--

LOCK TABLES `cc_itemcategorys` WRITE;
/*!40000 ALTER TABLE `cc_itemcategorys` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_itemcategorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_items`
--

DROP TABLE IF EXISTS `cc_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_items` (
  `id` int(11) NOT NULL,
  `itemname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `opportunity_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_items`
--

LOCK TABLES `cc_items` WRITE;
/*!40000 ALTER TABLE `cc_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_itemstatuss`
--

DROP TABLE IF EXISTS `cc_itemstatuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_itemstatuss` (
  `id` int(11) NOT NULL,
  `itemstatusname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_itemstatuss`
--

LOCK TABLES `cc_itemstatuss` WRITE;
/*!40000 ALTER TABLE `cc_itemstatuss` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_itemstatuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_leaves`
--

DROP TABLE IF EXISTS `cc_leaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_leaves` (
  `id` int(11) NOT NULL,
  `leavename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `start_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `leave_duration` double NOT NULL,
  `leave_available` double NOT NULL,
  `leave_used` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_leaves`
--

LOCK TABLES `cc_leaves` WRITE;
/*!40000 ALTER TABLE `cc_leaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_leaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_leavetypes`
--

DROP TABLE IF EXISTS `cc_leavetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_leavetypes` (
  `id` int(11) NOT NULL,
  `leavetypename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_leavetypes`
--

LOCK TABLES `cc_leavetypes` WRITE;
/*!40000 ALTER TABLE `cc_leavetypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_leavetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_medicals`
--

DROP TABLE IF EXISTS `cc_medicals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_medicals` (
  `id` int(11) NOT NULL,
  `medicalname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_medicals`
--

LOCK TABLES `cc_medicals` WRITE;
/*!40000 ALTER TABLE `cc_medicals` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_medicals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_mrtcosts`
--

DROP TABLE IF EXISTS `cc_mrtcosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_mrtcosts` (
  `id` int(11) NOT NULL,
  `mrtcost` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_mrtcosts`
--

LOCK TABLES `cc_mrtcosts` WRITE;
/*!40000 ALTER TABLE `cc_mrtcosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_mrtcosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_mrtstationcosts`
--

DROP TABLE IF EXISTS `cc_mrtstationcosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_mrtstationcosts` (
  `id` int(11) NOT NULL,
  `mrtstationcost` decimal(12,2) NOT NULL,
  `cost_id` decimal(8,2) NOT NULL,
  `destination_station_id` int(11) NOT NULL,
  `origination_station_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_mrtstationcosts`
--

LOCK TABLES `cc_mrtstationcosts` WRITE;
/*!40000 ALTER TABLE `cc_mrtstationcosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_mrtstationcosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_mrtstations`
--

DROP TABLE IF EXISTS `cc_mrtstations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_mrtstations` (
  `id` int(11) NOT NULL,
  `mrtstation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_mrtstations`
--

LOCK TABLES `cc_mrtstations` WRITE;
/*!40000 ALTER TABLE `cc_mrtstations` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_mrtstations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_others`
--

DROP TABLE IF EXISTS `cc_others`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_others` (
  `id` int(11) NOT NULL,
  `othername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_others`
--

LOCK TABLES `cc_others` WRITE;
/*!40000 ALTER TABLE `cc_others` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_others` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_permissions`
--

DROP TABLE IF EXISTS `cc_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_permissions` (
  `id` int(11) NOT NULL,
  `permissionname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_permissions`
--

LOCK TABLES `cc_permissions` WRITE;
/*!40000 ALTER TABLE `cc_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_profilepermissions`
--

DROP TABLE IF EXISTS `cc_profilepermissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_profilepermissions` (
  `id` int(11) NOT NULL,
  `profilepermissionname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_profilepermissions`
--

LOCK TABLES `cc_profilepermissions` WRITE;
/*!40000 ALTER TABLE `cc_profilepermissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_profilepermissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_services`
--

DROP TABLE IF EXISTS `cc_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_services` (
  `id` int(11) NOT NULL,
  `servicename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_services`
--

LOCK TABLES `cc_services` WRITE;
/*!40000 ALTER TABLE `cc_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_servicetypes`
--

DROP TABLE IF EXISTS `cc_servicetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_servicetypes` (
  `id` int(11) NOT NULL,
  `servicetypename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_servicetypes`
--

LOCK TABLES `cc_servicetypes` WRITE;
/*!40000 ALTER TABLE `cc_servicetypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_servicetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_taxiapps`
--

DROP TABLE IF EXISTS `cc_taxiapps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_taxiapps` (
  `id` int(11) NOT NULL,
  `taxiapptypeid` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_taxiapps`
--

LOCK TABLES `cc_taxiapps` WRITE;
/*!40000 ALTER TABLE `cc_taxiapps` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_taxiapps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_taxiapptypes`
--

DROP TABLE IF EXISTS `cc_taxiapptypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_taxiapptypes` (
  `id` int(11) NOT NULL,
  `taxiapptypename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_taxiapptypes`
--

LOCK TABLES `cc_taxiapptypes` WRITE;
/*!40000 ALTER TABLE `cc_taxiapptypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_taxiapptypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_travels`
--

DROP TABLE IF EXISTS `cc_travels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_travels` (
  `id` int(11) NOT NULL,
  `traveltypeid` int(11) NOT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estimate_cost` decimal(8,2) NOT NULL,
  `travel_type_id` int(11) NOT NULL,
  `travel_sub_type_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_travels`
--

LOCK TABLES `cc_travels` WRITE;
/*!40000 ALTER TABLE `cc_travels` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_travels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_travelsubtypes`
--

DROP TABLE IF EXISTS `cc_travelsubtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_travelsubtypes` (
  `id` int(11) NOT NULL,
  `travelsubtypename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_travelsubtypes`
--

LOCK TABLES `cc_travelsubtypes` WRITE;
/*!40000 ALTER TABLE `cc_travelsubtypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_travelsubtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_traveltypes`
--

DROP TABLE IF EXISTS `cc_traveltypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_traveltypes` (
  `id` int(11) NOT NULL,
  `traveltypename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_traveltypes`
--

LOCK TABLES `cc_traveltypes` WRITE;
/*!40000 ALTER TABLE `cc_traveltypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_traveltypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_userstatuss`
--

DROP TABLE IF EXISTS `cc_userstatuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_userstatuss` (
  `id` int(11) NOT NULL,
  `userstatusname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_userstatuss`
--

LOCK TABLES `cc_userstatuss` WRITE;
/*!40000 ALTER TABLE `cc_userstatuss` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_userstatuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customview`
--

DROP TABLE IF EXISTS `customview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customview` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `viewname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setdefault` tinyint(1) NOT NULL,
  `objectid` int(10) unsigned NOT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customview_objectid_foreign` (`objectid`),
  CONSTRAINT `customview_objectid_foreign` FOREIGN KEY (`objectid`) REFERENCES `objects_model` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customview`
--

LOCK TABLES `customview` WRITE;
/*!40000 ALTER TABLE `customview` DISABLE KEYS */;
INSERT INTO `customview` VALUES (1,'All',1,1,NULL),(2,'All',1,2,NULL),(3,'All',1,3,NULL),(4,'All',1,4,NULL),(5,'All',1,5,NULL),(6,'All',1,6,NULL),(7,'All',1,7,NULL),(8,'All',1,8,NULL),(9,'All',1,9,NULL),(10,'All',1,10,NULL),(11,'All',1,11,NULL),(12,'All',1,12,NULL),(13,'All',1,13,NULL),(14,'All',1,14,NULL),(15,'All',1,15,NULL),(16,'All',1,16,NULL),(17,'All',1,17,NULL),(18,'All',1,18,NULL),(19,'All',1,19,NULL),(20,'All',1,20,NULL),(21,'All',1,21,NULL),(22,'All',1,22,NULL),(23,'All',1,23,NULL),(24,'All',1,24,NULL),(25,'All',1,25,NULL),(26,'All',1,26,NULL),(27,'All',1,27,NULL),(28,'All',1,28,NULL),(29,'All',1,29,NULL),(30,'All',1,30,NULL),(31,'All',1,31,NULL),(32,'All',1,32,NULL);
/*!40000 ALTER TABLE `customview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customview_columnslist`
--

DROP TABLE IF EXISTS `customview_columnslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customview_columnslist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cvid` int(10) unsigned NOT NULL,
  `columnindex` int(11) NOT NULL,
  `columnname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customview_columnslist_cvid_foreign` (`cvid`),
  CONSTRAINT `customview_columnslist_cvid_foreign` FOREIGN KEY (`cvid`) REFERENCES `customview` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customview_columnslist`
--

LOCK TABLES `customview_columnslist` WRITE;
/*!40000 ALTER TABLE `customview_columnslist` DISABLE KEYS */;
INSERT INTO `customview_columnslist` VALUES (1,1,0,'itemname'),(2,2,0,'traveltypeid'),(3,3,0,'traveltypename'),(4,4,0,'travelsubtypename'),(5,5,0,'mrtcost'),(6,6,0,'mrtstation'),(7,7,0,'btscost'),(8,8,0,'btsstation'),(9,9,0,'mrtstationcost'),(10,10,0,'btsstationcost'),(11,11,0,'airportraillinkcost'),(12,12,0,'airportraillinkstation'),(13,13,0,'airportraillinkcoststation'),(14,14,0,'brtcostname'),(15,15,0,'brtstationname'),(16,16,0,'brtcoststationname'),(17,17,0,'taxiapptypename'),(18,18,0,'servicename'),(19,19,0,'othername'),(20,20,0,'medicalname'),(21,21,0,'permissionname'),(22,22,0,'profilepermissionname'),(23,23,0,'userstatusname'),(24,24,0,'expensename'),(25,25,0,'approvalcomment'),(26,26,0,'expensestatusname'),(27,27,0,'servicetypename'),(28,28,0,'itemcategoryname'),(29,29,0,'itemstatusname'),(30,30,0,'taxiapptypeid'),(31,31,0,'leavename'),(32,32,0,'leavetypename');
/*!40000 ALTER TABLE `customview_columnslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entitys`
--

DROP TABLE IF EXISTS `entitys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entitys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) NOT NULL,
  `createid` int(11) NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entitys`
--

LOCK TABLES `entitys` WRITE;
/*!40000 ALTER TABLE `entitys` DISABLE KEYS */;
/*!40000 ALTER TABLE `entitys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_07_041713_update_user_table',1),('2016_03_08_090353_CreateTableRoles',1),('2016_03_08_090615_CreateTableUserRoles',1),('2016_03_09_072632_CreaetTebleObjectModule',1),('2016_03_10_035203_UpdateFieldObjetModelToUnique',1),('2016_03_11_022212_CreateTableField',1),('2016_03_11_024004_CreateTableBlock',1),('2016_03_11_052219_UpdateBlockInObjectField',1),('2016_03_11_090721_CreateEntityTable',1),('2016_03_16_064158_createprofile',1),('2016_03_16_064739_CreateCustomView',1),('2016_04_21_040407_UpdateObjectFieldForFieldType',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_block`
--

DROP TABLE IF EXISTS `object_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objectid` int(10) unsigned NOT NULL,
  `blocklabel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_block_objectid_foreign` (`objectid`),
  CONSTRAINT `object_block_objectid_foreign` FOREIGN KEY (`objectid`) REFERENCES `objects_model` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_block`
--

LOCK TABLES `object_block` WRITE;
/*!40000 ALTER TABLE `object_block` DISABLE KEYS */;
INSERT INTO `object_block` VALUES (1,1,'Item Information',1),(2,2,'Travel Information',1),(3,3,'TravelType Information',1),(4,4,'TravelSubType Information',1),(5,5,'MRTCost Information',1),(6,6,'MRTStation Information',1),(7,7,'BTSCost Information',1),(8,8,'BTSStation Information',1),(9,9,'MRTStationCost Information',1),(10,10,'BTSStationCost Information',1),(11,11,'AirPortRailLinkCost Information',1),(12,12,'AirPortRailLinkStation Information',1),(13,13,'AirPortRailLinkCostStation Information',1),(14,14,'BRTCost Information',1),(15,15,'BRTStation Information',1),(16,16,'BRTCostStation Information',1),(17,17,'TaxiAppType Information',1),(18,18,'Service Information',1),(19,19,'Other Information',1),(20,20,'Medical Information',1),(21,21,'Permission Information',1),(22,22,'ProfilePermission Information',1),(23,23,'UserStatus Information',1),(24,24,'Expense Information',1),(25,25,'Approval Information',1),(26,26,'ExpenseStatus Information',1),(27,27,'ServiceType Information',1),(28,28,'ItemCategory Information',1),(29,29,'ItemStatus Information',1),(30,30,'TaxiApp Information',1),(31,31,'Leave Information',1),(32,32,'LeaveType Information',1);
/*!40000 ALTER TABLE `object_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_field`
--

DROP TABLE IF EXISTS `object_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objectid` int(10) unsigned NOT NULL,
  `fieldname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fieldlabel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `blockid` int(10) unsigned DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `object_field_objectid_foreign` (`objectid`),
  KEY `object_field_blockid_index` (`blockid`),
  KEY `object_field_type_index` (`type`),
  CONSTRAINT `object_field_blockid_foreign` FOREIGN KEY (`blockid`) REFERENCES `object_block` (`id`) ON DELETE SET NULL,
  CONSTRAINT `object_field_objectid_foreign` FOREIGN KEY (`objectid`) REFERENCES `objects_model` (`id`) ON DELETE CASCADE,
  CONSTRAINT `object_field_type_foreign` FOREIGN KEY (`type`) REFERENCES `object_field_type` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_field`
--

LOCK TABLES `object_field` WRITE;
/*!40000 ALTER TABLE `object_field` DISABLE KEYS */;
INSERT INTO `object_field` VALUES (1,1,'itemname','Item Name',1,1,NULL),(2,1,'userId','user',2,1,NULL),(3,2,'traveltypeid','travel_type_id',1,2,NULL),(4,3,'traveltypename','travel_type_name',1,3,NULL),(5,4,'travelsubtypename','travel_sub_type_name',1,4,NULL),(6,5,'mrtcost','mrt_cost',1,5,NULL),(7,6,'mrtstation','mrt_station',1,6,NULL),(8,7,'btscost','bts_cost',1,7,NULL),(9,8,'btsstation','bts_station',1,8,NULL),(10,9,'mrtstationcost','mrt_station_cost',1,9,NULL),(11,10,'btsstationcost','bts_station_cost',1,10,NULL),(12,11,'airportraillinkcost','airportraillink_cost',1,11,NULL),(13,12,'airportraillinkstation','airportraillink_station',1,12,NULL),(14,13,'airportraillinkcoststation','airportraillink_cost_station',1,13,NULL),(15,14,'brtcostname','brt_cost_name',1,14,NULL),(16,15,'brtstationname','brt_station_name',1,15,NULL),(17,16,'brtcoststationname','brt_cost_station_name',1,16,NULL),(18,17,'taxiapptypename','taxi_app_type_name',1,17,NULL),(19,18,'servicename','service_name',1,18,NULL),(20,19,'othername','other_name',1,19,NULL),(21,20,'medicalname','medical_name',1,20,NULL),(22,21,'permissionname','permission_name',1,21,NULL),(23,22,'profilepermissionname','profile_permission_name',1,22,NULL),(24,23,'userstatusname','user_status_name',1,23,NULL),(25,24,'expensename','expense_name',1,24,NULL),(26,25,'approvalcomment','approval_comment',1,25,NULL),(27,26,'expensestatusname','expense_status_name',1,26,NULL),(28,22,'profile_id','profile',2,22,NULL),(29,22,'permission_id','permission',3,22,NULL),(30,27,'servicetypename','service_type_name',1,27,NULL),(31,1,'category_id','category',3,1,NULL),(32,1,'opportunity_id','opportunity',4,1,NULL),(33,1,'cost','cost',5,1,NULL),(34,1,'description','description',6,1,NULL),(35,1,'create_at','create_at',7,1,NULL),(36,1,'update_at','update_at',8,1,NULL),(37,1,'attachment','attachment',9,1,NULL),(38,28,'itemcategoryname','Item Category Name',1,28,NULL),(39,24,'created_at','created_at',2,24,NULL),(40,24,'total_price','total_price',3,24,NULL),(41,24,'user_id','user',4,24,NULL),(42,24,'item_id','item',5,24,NULL),(43,24,'description','description',6,24,NULL),(44,24,'status_id','status',7,24,NULL),(45,1,'status_id','status',10,1,NULL),(46,29,'itemstatusname','item_status_name',1,29,NULL),(47,25,'expense_id','expense',2,25,NULL),(48,25,'user_id','user',3,25,NULL),(49,25,'status_id','status',4,25,NULL),(50,25,'created_at','created_at',5,25,NULL),(51,2,'destination','destination',2,2,NULL),(52,2,'origination','origination',3,2,NULL),(53,2,'estimate_cost','estimate_cost',4,2,NULL),(54,2,'travel_type_id','travel_type',5,2,NULL),(55,2,'travel_sub_type_id','travel_sub_type',6,2,NULL),(56,2,'item_id','item',7,2,NULL),(57,30,'taxiapptypeid','taxi_app_type_id',1,30,NULL),(58,30,'travel_id','travel',2,30,NULL),(59,13,'station_id','station',2,13,NULL),(60,13,'destination_station_id','destination_station',3,13,NULL),(61,13,'cost_id','cost',4,13,NULL),(62,9,'cost_id','cost',2,9,NULL),(63,9,'destination_station_id','destination_station_id',3,9,NULL),(64,9,'origination_station_id','origination_station_id',4,9,NULL),(65,10,'origination_station_id','origination_station_id',2,10,NULL),(66,10,'destination_station_id','destination_station_id',3,10,NULL),(67,10,'cost_id','cost',4,10,NULL),(68,16,'cost_id','cost',2,16,NULL),(69,16,'destination_station_id','destination_station_id',3,16,NULL),(70,16,'origination_station_id','origination_station_id',4,16,NULL),(71,31,'leavename','leave_name',1,31,NULL),(72,31,'user_id','user',2,31,NULL),(73,31,'leave_type_id','leave_type',3,31,NULL),(74,31,'start_date','start_date',4,31,NULL),(75,31,'end_date','end_date',5,31,NULL),(76,31,'end_time','end_time',6,31,NULL),(77,31,'start_time','start_time',7,31,NULL),(78,31,'created_date','created_date',8,31,NULL),(79,31,'attachment','attachment',9,31,NULL),(80,31,'description','description',10,31,NULL),(81,20,'item_id','item',2,20,NULL),(82,20,'hospital_name','hospital',3,20,NULL),(83,31,'leave_duration','leave_duration',11,31,NULL),(84,31,'leave_available','leave_available',12,31,NULL),(85,31,'leave_used','leave_used',13,31,NULL),(86,32,'leavetypename','leave_type_name',1,32,NULL),(87,32,'leave_amount','leave_amount',2,32,NULL),(88,18,'service_type_id','service_type',2,18,NULL);
/*!40000 ALTER TABLE `object_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_field_type`
--

DROP TABLE IF EXISTS `object_field_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_field_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fieldtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_field_type`
--

LOCK TABLES `object_field_type` WRITE;
/*!40000 ALTER TABLE `object_field_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `object_field_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects_model`
--

DROP TABLE IF EXISTS `objects_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fieldname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `objects_model_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects_model`
--

LOCK TABLES `objects_model` WRITE;
/*!40000 ALTER TABLE `objects_model` DISABLE KEYS */;
INSERT INTO `objects_model` VALUES (1,'Item','cc_items','itemname'),(2,'Travel','cc_travels','traveltypeid'),(3,'TravelType','cc_traveltypes','traveltypename'),(4,'TravelSubType','cc_travelsubtypes','travelsubtypename'),(5,'MRTCost','cc_mrtcosts','mrtcost'),(6,'MRTStation','cc_mrtstations','mrtstation'),(7,'BTSCost','cc_btscosts','btscost'),(8,'BTSStation','cc_btsstations','btsstation'),(9,'MRTStationCost','cc_mrtstationcosts','mrtstationcost'),(10,'BTSStationCost','cc_btsstationcosts','btsstationcost'),(11,'AirPortRailLinkCost','cc_airportraillinkcosts','airportraillinkcost'),(12,'AirPortRailLinkStation','cc_airportraillinkstations','airportraillinkstation'),(13,'AirPortRailLinkCostStation','cc_airportraillinkcoststations','airportraillinkcoststation'),(14,'BRTCost','cc_brtcosts','brtcostname'),(15,'BRTStation','cc_brtstations','brtstationname'),(16,'BRTCostStation','cc_brtcoststations','brtcoststationname'),(17,'TaxiAppType','cc_taxiapptypes','taxiapptypename'),(18,'Service','cc_services','servicename'),(19,'Other','cc_others','othername'),(20,'Medical','cc_medicals','medicalname'),(21,'Permission','cc_permissions','permissionname'),(22,'ProfilePermission','cc_profilepermissions','profilepermissionname'),(23,'UserStatus','cc_userstatuss','userstatusname'),(24,'Expense','cc_expenses','expensename'),(25,'Approval','cc_approvals','approvalcomment'),(26,'ExpenseStatus','cc_expensestatuss','expensestatusname'),(27,'ServiceType','cc_servicetypes','servicetypename'),(28,'ItemCategory','cc_itemcategorys','itemcategoryname'),(29,'ItemStatus','cc_itemstatuss','itemstatusname'),(30,'TaxiApp','cc_taxiapps','taxiapptypeid'),(31,'Leave','cc_leaves','leavename'),(32,'LeaveType','cc_leavetypes','leavetypename');
/*!40000 ALTER TABLE `objects_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profilename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `status_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  `supervisor_id` int(10) unsigned NOT NULL,
  `nickname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (0,0,0,0,'',1,'','panit','$2y$10$liZ8kxhROMHozyew5mnjo.nixLCH64coj75SzbrQ2cEb74Nv4HbDC','jSp2kjkT5kmHNXnX3vYxamS5P6AJ2cffoZ1dbZ6HBmyhOHkGq9v13fWDEmyd','2016-10-15 07:20:47','2016-10-15 08:16:53','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-18 21:45:18
