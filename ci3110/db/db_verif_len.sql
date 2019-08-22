/*
SQLyog Community v13.1.3  (64 bit)
MySQL - 10.1.31-MariaDB : Database - db_verif_len
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
  `Tanggal_Masuk` datetime NOT NULL,
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
  `Status_Dokumen` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`No_Verifikasi`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

insert  into `dokumen`(`No`,`Tanggal_Masuk`,`Kode_Ver`,`No_Verifikasi`,`Keterangan`,`User`,`Mata_Uang`,`Jumlah`,`Tgl_Out_Verif`,`Tgl_Out_Jurnal`,`Tgl_Out_Manager`,`Status_Dok_Jurnal`,`Status_Dok_Manager`,`No_Revisi`,`operator_id`,`Status_Dokumen`) values 
(1,'2019-07-01 02:03:01','LB','0001/LB/07/2019','BUAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019','NOVA A','USD',546000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,4,'revisi'),
(2,'2019-07-01 02:05:00','LB','0002/LB/07/2019','BIAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019','NOVA A','RP',2547312,'0000-00-00','0000-00-00','0000-00-00','','',NULL,2,NULL),
(3,'2019-07-01 02:05:02','LN','0003/LN/07/2019','Buaya Puskesmas','adi cahyadi','euro',15,'0000-00-00','0000-00-00','0000-00-00','','',NULL,1,NULL),
(4,'2019-07-01 02:07:09','LM','0004/LM/07/19','BIAYA PD KE JKT TGL 24 APRIL 2019','FARAH S','RP',579000,'2019-07-01','2019-07-02','2019-07-03','','pending',NULL,3,'revisi'),
(4,'2019-08-17 20:36:47','PP','0004/PP/08/2019','asdasd','asdasdasdasdasd','RP',123123123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,'revisi'),
(5,'2019-07-01 02:07:15','LM','0005/LM/07/19','BIAYA PD KE JKT TGL 26 APRIL 2019\r\n','FARAH S','RP',299000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,4,NULL),
(5,'2019-08-17 20:37:44','PP','0005/PP/08/2019','TTTTTT','TTTTTT','USD',213123123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(6,'2019-08-19 08:53:29','LB','0006/LB/08/2019','Tes Bareng','Moch. Star Ramadhan','RP',1000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(6,'2019-07-01 02:10:02','PB','0006/PB/07/19','BIAYA PD KE BDG TGL 4-6 MEI 2019\r\n','FAUJI FAJRUDIN','RP',41400000,'2019-07-01','2019-07-02','2019-07-03','pending','pending',NULL,2,NULL),
(7,'2019-08-19 08:53:29','LB','0007/LB/08/2019','Biaya Kerata','Muhamad Nurcahya Eko','CHF',5000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(7,'2019-08-19 09:01:56','LK','0007/LK/08/2019','raeasda','Moch Star Ramadhan','SGD',2131231,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(7,'2019-07-01 02:11:18','PB','0007/PB/07/19','BIAYA PD KE SBY TGL 29-30 APRIL 2019\r\n','QAMARUZZAMAN','RP',2060000,'2019-07-01','2019-07-02','2019-07-03','pending','pending',NULL,1,NULL),
(8,'2019-08-19 09:01:57','LK','0008/LK/08/2019','sdasdas','Moch Star Ramadhan','USD',2423412,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(8,'2019-07-01 03:15:03','LM','0008/LM/07/19','BIAYA PD KE SBY TGL 29-30 APRIL 2019\r\n','QAMARUZZAMAN','RP',466000,'2019-07-01','2019-07-02','2019-07-03','pending','pending',NULL,2,NULL),
(8,'2019-08-19 09:01:56','UM','0008/UM/08/2019','tes eko 3','muhamad nurcahya eko','USD',5000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(9,'2019-07-01 03:17:57','LM','0009/LM/07/19','BIAYA PD KE JKT TGL 2 APRIL 2019\r\n','QAMARUZZAMAN','RP',579000,'2019-07-01','2019-07-02','2019-07-03','','pending',NULL,3,NULL),
(9,'2019-08-19 09:01:57','LM','0009/LM/08/2019','sawqe','Moch Star Ramadhan','USD',7686876,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(9,'2019-08-19 09:01:58','UM','0009/UM/08/2019','test 4','muhamad nurchya eko ','USD',5000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(10,'2019-07-01 04:02:01','UM','0010/UM/07/19','UM PD KE JKT TGL 2 APRIL 2019\r\n','QAMARUZZAMAN','RP',280000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,4,NULL),
(10,'2019-08-19 09:01:59','UM','0010/UM/08/2019','tes eko 1','muhamad nurcahya eko','USD',5000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(11,'2019-07-01 04:02:07','LM','0011/LM/07/19','BIAYA PD KE BDG TGL 22-23 APRIL 2019\r\n','NURLAWIGIANTY A','RP',448000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,5,NULL),
(11,'2019-08-19 09:02:09','UM','0011/UM/08/2019','tes eko 2','muhamad nurcahya eko','USD',5000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(12,'2019-07-01 04:04:26','LM','0012/LM/07/19','BIAYA PD KE SBY TGL 13-15 MARET 2019\r\n','HIDAYATURROKHMAN','RP',699000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,5,NULL),
(12,'2019-08-19 09:57:50','LM','0012/LM/08/2019','1234','star','USD',1234,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(13,'2019-08-19 09:57:50','LB','0013/LB/08/2019','lat 1','eko','RP',5000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(13,'2019-08-19 09:57:50','LM','0013/LM/08/2019','1234','star26','SGD',1234,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(13,'2019-07-01 04:04:59','PB','0013/PB/07/19','BIAYA PD KE SBY TGL 13-15 MARET 2019\r\n','HIDAYATURROKHMAN','RP',940000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,5,NULL),
(13,'2019-08-19 09:57:51','PP','0013/PP/08/2019','masuk','eko','USD',400,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(14,'2019-08-19 09:57:51','LK','0014/LK/08/2019','1234','star','RP',1234,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(14,'2019-07-01 04:06:00','LM','0014/LM/07/19','BIAYA PD KE SUBANG TGL 17 MEI 2019\r\n','YASER Y','RP',202000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,6,NULL),
(14,'2019-08-19 10:10:10','LM','0014/LM/08/2019','1234','ttrees','EURO',311412,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(15,'2019-07-01 04:06:12','LM','0015/LM/07/19','BIAYA PD KE SUBANG TGL 13 MEI 2019\r\n','YASER Y','RP',272000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,5,NULL),
(15,'2019-08-19 10:10:10','LM','0015/LM/08/2019','1234','star','USD',1234,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(15,'2019-08-19 10:10:11','LN','0015/LN/08/2019','12344','idham','USD',4123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(16,'2019-07-01 04:07:12','LM','0016/LM/07/19','BIAYA PD KE JKT TGL 23-24 MEI 2019\r\n','NABHAN A/HASAN','RP',750000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,6,NULL),
(16,'2019-08-19 10:14:29','PB','0016/PB/08/2019','213','adas','USD',31111,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(17,'2019-07-01 04:08:23','LM','0017/LM/07/19','BIAYA PD KE JKT TGL 23 MEI 2019\r\n','NABHAN A/INDRA','RP',385000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,4,NULL),
(17,'2019-08-19 10:14:30','LM','0017/LM/08/2019','213','star','SGD',213,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(18,'2019-08-19 10:14:31','LK','0018/LK/08/2019','123','eko','EURO',3121,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(18,'2019-07-01 04:08:02','LM','0018/LM/07/19','BIAYA PD KE JKT TGL 20-24 MEI 2019\r\n','NABHAN A/ALFIAN','RP',7395000,'2019-07-01','2019-07-02','2019-07-03','','pending',NULL,3,NULL),
(19,'2019-08-19 10:29:56','LK','0019/LK/08/2019','ar','eta','USD',1227,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(19,'2019-07-01 04:10:19','LM','0019/LM/07/19','BIAYA PD KE JKT TGL 27-29 MEI 2019\r\n','NABHAN A/ALFIAN','RP',6224000,'2019-07-01','2019-07-02','2019-07-03','','',NULL,4,NULL),
(19,'2019-08-19 10:29:56','LM','0019/LM/08/2019','123','star','EURO',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(19,'2019-08-19 10:29:57','LN','0019/LN/08/2019','rwwer','rees','SGD',131231,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(20,'2019-08-19 10:32:16','LB','0020/LB/08/2019','123','eko','USD',312,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(20,'2019-07-01 06:56:01','LM','0020/LM/07/19','BIAYA PD KE TANGERANG TGL 25-26 MEI 2019\r\n','NABHAN A/AGUNG S','RP',852000,'2019-07-01','2019-07-02','2019-07-03','pending','pending',NULL,2,NULL),
(20,'2019-08-19 10:32:16','LM','0020/LM/08/2019','qwe','qwe','USD',21123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(20,'2019-08-19 10:32:15','PB','0020/PB/08/2019','123','star','USD',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(21,'2019-08-19 10:33:26','LN','0021/LN/08/2019','123','eqwe','EURO',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(22,'2019-08-19 10:33:26','LB','0022/LB/08/2019','123','rew','USD',122,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(22,'2019-08-19 10:33:27','LK','0022/LK/08/2019','qwe','Star','SGD',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(23,'2019-08-19 11:24:46','LB','0023/LB/08/2019','q243','star','SGD',4123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(24,'2019-08-19 11:25:51','LM','0024/LM/08/2019','123','star','EURO',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(25,'2019-08-19 11:25:52','LB','0025/LB/08/2019','2341','star','RP',14123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(26,'2019-08-19 11:25:52','LN','0026/LN/08/2019','asdad','Star','RP',12314123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(26,'2019-08-19 11:27:20','PB','0026/PB/08/2019','112','twer','EURO',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(27,'2019-08-19 11:27:21','LK','0027/LK/08/2019','ara','tsat','SGD',1231,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(27,'2019-08-19 11:27:20','LM','0027/LM/08/2019','asd','asda','USD',23423,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(28,'2019-08-19 11:29:48','LM','0028/LM/08/2019','asd','asd','USD',342,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(29,'2019-08-19 11:31:07','LM','0029/LM/08/2019','123','star','EURO',119,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(30,'2019-08-19 11:31:07','LM','0030/LM/08/2019','123','sqwe','USD',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(30,'2019-08-19 11:31:07','PP','0030/PP/08/2019','asd','asd','USD',23432,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(31,'2019-08-19 11:37:47','LK','0031/LK/08/2019','asd','asd','USD',123141,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(32,'2019-08-19 11:37:48','LM','0032/LM/08/2019','q41','asdwqe','EURO',143123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(33,'2019-08-19 11:37:49','LK','0033/LK/08/2019','1231','4123','USD',123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(34,'2019-08-22 09:50:34','LM','0034/LM/08/2019','ekooke','starrrrr','USD',1000,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,'aktif'),
(1,'2019-08-17 19:58:17','LK','1','cc','cc','USD',632423,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(2,'2019-08-17 19:58:18','LB','2','bb','bb','SGD',1312111111,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL),
(3,'2019-08-17 19:58:19','LK','3','aa','aa','USD',123123,'0000-00-00','0000-00-00','0000-00-00','','',NULL,NULL,NULL);

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

insert  into `operator`(`operator_id`,`username`,`password_enc`,`password`,`position`,`phone_number`,`status`) values 
(1,'admin','3d2172418ce305c7d16d4b05597c6a59','22222','admin','89534060766422','active'),
(2,'Ba','dbc4d84bfcfe2284ba11beffb853a8c4','4444','manager','0897954652154','active'),
(3,'Admin','b59c67bf196a4758191e42f76670ceba','1111','admin','0849879879878','nonactive'),
(4,'Junaidi','2be9bd7a3434f7038ca27d1918de58bd','3333','manager','0849879875852','nonactive'),
(5,'Sumarnia','6074c6aa3488f3c2dddff2a7ca821aab','5555','verifikasi2','0899996645212','active'),
(6,'hani','e9510081ac30ffa83f10b68cde1cac07','6666','verifikasi3','0812125487888','active'),
(7,'star','827ccb0eea8a706c4c34a16891f84e7b','12345','verifikasi1','0897954652154','active'),
(8,'tata','d41d8cd98f00b204e9800998ecf8427e','tata','verifikasi1','3333','active'),
(9,'Ojan','d41d8cd98f00b204e9800998ecf8427e','ojan','manager','091823098102','active');

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
  `Alasan_Revisi` text,
  `Status_Revisi` varchar(20) DEFAULT NULL,
  KEY `no_dokumen` (`No`),
  KEY `No_Verifikasi` (`No_Verifikasi`),
  CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`No_Verifikasi`) REFERENCES `dokumen` (`No_Verifikasi`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `revisi` */

insert  into `revisi`(`No`,`Tanggal_Masuk`,`Kode_Ver`,`No_Verifikasi`,`Keterangan`,`User`,`Mata_Uang`,`Jumlah`,`Tgl_Out_Verif`,`Tgl_Out_Jurnal`,`Tgl_Out_Manager`,`Status_Dok_Jurnal`,`Status_Dok_Manager`,`No_Revisi`,`Alasan_Revisi`,`Status_Revisi`) values 
('1','2019-07-01','LB','0001/LB/07/2019','BUAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019','NOVA A','RP',546000,'2019-07-01','2019-07-02','2019-07-03','PENDING','PENDING',NULL,'Keterangan salah',''),
('2','2019-07-01','LM','0002/LB/07/2019','BIAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019','NOVA A','RP',2547312,'2019-07-01','2019-07-02','2019-07-03','PENDING','PENDING',NULL,'Jumlah salah','Selesai'),
('3','2019-07-01','UM','0003/LN/07/2019','BIAYA PD KE JKT TGL 6 MEI 2019','MUKTI S','RP',552000,'2019-07-01','2019-07-02','2019-07-03','PENDING','PENDING',0,'SALAH NAMA','Selesai');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
