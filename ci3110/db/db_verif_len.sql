/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - db_verif_len
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_verif_len` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_verif_len`;

/*Table structure for table `dokumen` */

DROP TABLE IF EXISTS `dokumen`;

CREATE TABLE `dokumen` (
  `No` int(11) DEFAULT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `Kode_Ver` enum('LB','LK','LM','LN','PB','PP','UM','') NOT NULL,
  `No_Verifikasi` varchar(50) NOT NULL,
  `Keterangan` text,
  `User` varchar(20) NOT NULL,
  `Mata_Uang` varchar(10) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Tgl_Out_Verif` date NOT NULL,
  `Tgl_Out_Jurnal` date NOT NULL,
  `Tgl_Out_Manager` date NOT NULL,
  `Status_Dok_Jurnal` varchar(10) NOT NULL,
  `Status_Dok_Manager` varchar(10) NOT NULL,
  `No_Revisi` int(5) DEFAULT NULL,
  `operator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`No_Verifikasi`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

insert  into `dokumen`(`No`,`Tanggal_Masuk`,`Kode_Ver`,`No_Verifikasi`,`Keterangan`,`User`,`Mata_Uang`,`Jumlah`,`Tgl_Out_Verif`,`Tgl_Out_Jurnal`,`Tgl_Out_Manager`,`Status_Dok_Jurnal`,`Status_Dok_Manager`,`No_Revisi`,`operator_id`) values (NULL,'2019-07-01','LB','0001/LM/07/2019\r\n','BIAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019\r\n','Cahya','RP',546000,'0000-00-00','2019-07-02','2019-07-03','','',NULL,NULL);

/*Table structure for table `operator` */

DROP TABLE IF EXISTS `operator`;

CREATE TABLE `operator` (
  `operator_id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_enc` varchar(60) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `position` enum('manager','verifikasi1','verifikasi2','verifikasi3','jurnal','admin','guest') NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `status` enum('active','nonactive') NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `operator` */

insert  into `operator`(`operator_id`,`username`,`password_enc`,`password`,`position`,`phone_number`,`status`) values (1,'admin','3d2172418ce305c7d16d4b05597c6a59','22222','admin','89534060766422','active'),(2,'Ba','dbc4d84bfcfe2284ba11beffb853a8c4','4444','manager','0897954652154','active'),(3,'Admin','b59c67bf196a4758191e42f76670ceba','1111','admin','0849879879878','nonactive'),(4,'Junaidi','2be9bd7a3434f7038ca27d1918de58bd','3333','manager','0849879875852','nonactive'),(5,'Sumarnia','6074c6aa3488f3c2dddff2a7ca821aab','5555','verifikasi2','0899996645212','active'),(6,'Haniatuns','e9510081ac30ffa83f10b68cde1cac07','6666','verifikasi3','0812125487888','active'),(7,'star','827ccb0eea8a706c4c34a16891f84e7b','12345','verifikasi1','0897954652154','active'),(8,'tata','d41d8cd98f00b204e9800998ecf8427e','tata','verifikasi2','3333','active'),(9,'Ojan','d41d8cd98f00b204e9800998ecf8427e','ojan','manager','091823098102','active');

/*Table structure for table `revisi` */

DROP TABLE IF EXISTS `revisi`;

CREATE TABLE `revisi` (
  `No` varchar(11) DEFAULT NULL,
  `Tanggal_Masuk` date DEFAULT NULL,
  `Kode_Ver` text,
  `No_Verifikasi` varchar(50) DEFAULT NULL,
  `Keterangan` text,
  `User` varchar(20) DEFAULT NULL,
  `Mata_Uang` varchar(10) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Tgl_Out_Verif` date DEFAULT NULL,
  `Tgl_Out_Jurnal` date DEFAULT NULL,
  `Tgl_Out_Manager` date DEFAULT NULL,
  `Status_Dok_Jurnal` varchar(10) DEFAULT NULL,
  `Status_Dok_Manager` varchar(10) DEFAULT NULL,
  `No_Revisi` int(5) DEFAULT NULL,
  KEY `no_dokumen` (`No`),
  KEY `No_Verifikasi` (`No_Verifikasi`),
  CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`No_Verifikasi`) REFERENCES `dokumen` (`No_Verifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `revisi` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
