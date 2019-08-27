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
  `Jumlah` int(20) NOT NULL,
  `Tgl_Out_Verif` date NOT NULL,
  `Tgl_Out_Jurnal` date NOT NULL,
  `Tgl_Out_Manager` date NOT NULL,
  `Lok_Dokumen` varchar(15) NOT NULL,
  `operator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`No_Verifikasi`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

insert  into `dokumen`(`No`,`Tanggal_Masuk`,`Kode_Ver`,`No_Verifikasi`,`Keterangan`,`User`,`Mata_Uang`,`Jumlah`,`Tgl_Out_Verif`,`Tgl_Out_Jurnal`,`Tgl_Out_Manager`,`Lok_Dokumen`,`operator_id`) values (1,'2019-07-01','LB','0001/LB/07/2019','BUAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019','NOVA A','RP',546000,'2019-08-22','0000-00-00','0000-00-00','jurnalis',4),(2,'2019-07-01','LB','0002/LB/07/2019','BIAYA PD KE POLDA JABAR TGL 20-21 JUNI 2019','NOVA A','RP',2547312,'0000-00-00','0000-00-00','0000-00-00','jurnalis',2),(3,'2019-07-01','LN','0003/LN/07/2019','Buaya Puskesmas','adi cahyadi','euro',15,'0000-00-00','0000-00-00','0000-00-00','jurnalis',5),(4,'2019-07-01','LM','0004/LM/07/19','BIAYA PD KE JKT TGL 24 APRIL 2019','FARAH S','RP',579000,'2019-07-01','2019-07-02','2019-07-03','jurnalis',3),(4,'2019-08-17','PP','0004/PP/08/2019','asdasd','asdasdasdasdasd','RP',123123123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',5),(5,'2019-07-01','LM','0005/LM/07/19','BIAYA PD KE JKT TGL 26 APRIL 2019\r\n','FARAH S','RP',299000,'2019-07-01','2019-07-02','2019-07-03','manager',4),(5,'2019-08-17','PP','0005/PP/08/2019','TTTTTT','TTTTTT','USD',213123123,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(6,'2019-08-19','LB','0006/LB/08/2019','Tes Bareng','Moch. Star Ramadhan','RP',1000,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(6,'2019-07-01','PB','0006/PB/07/19','BIAYA PD KE BDG TGL 4-6 MEI 2019\r\n','FAUJI FAJRUDIN','RP',41400000,'2019-07-01','2019-07-02','2019-07-03','manager',2),(7,'2019-08-19','LB','0007/LB/08/2019','Biaya Kerata','Muhamad Nurcahya Eko','CHF',5000,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(7,'2019-08-19','LK','0007/LK/08/2019','raeasda','Moch Star Ramadhan','SGD',2131231,'0000-00-00','0000-00-00','0000-00-00','manager',5),(7,'2019-07-01','PB','0007/PB/07/19','BIAYA PD KE SBY TGL 29-30 APRIL 2019\r\n','QAMARUZZAMAN','RP',2060000,'2019-07-01','2019-07-02','2019-07-03','manager',1),(8,'2019-08-19','LK','0008/LK/08/2019','sdasdas','Moch Star Ramadhan','USD',2423412,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(8,'2019-07-01','LM','0008/LM/07/19','BIAYA PD KE SBY TGL 29-30 APRIL 2019\r\n','QAMARUZZAMAN','RP',466000,'2019-07-01','2019-07-02','2019-07-03','manager',2),(8,'2019-08-19','UM','0008/UM/08/2019','tes eko 3','muhamad nurcahya eko','USD',5000,'0000-00-00','0000-00-00','0000-00-00','finish',NULL),(9,'2019-07-01','LM','0009/LM/07/19','BIAYA PD KE JKT TGL 2 APRIL 2019\r\n','QAMARUZZAMAN','RP',579000,'2019-07-01','2019-07-02','2019-07-03','finish',3),(9,'2019-08-19','LM','0009/LM/08/2019','sawqe','Moch Star Ramadhan','USD',7686876,'0000-00-00','0000-00-00','0000-00-00','finish',NULL),(9,'2019-08-19','UM','0009/UM/08/2019','test 4','muhamad nurchya eko ','USD',5000,'0000-00-00','0000-00-00','0000-00-00','finish',NULL),(10,'2019-07-01','UM','0010/UM/07/19','UM PD KE JKT TGL 2 APRIL 2019\r\n','QAMARUZZAMAN','RP',280000,'2019-07-01','2019-07-02','2019-07-03','finish',4),(10,'2019-08-19','UM','0010/UM/08/2019','tes eko 1','muhamad nurcahya eko','USD',5000,'0000-00-00','0000-00-00','0000-00-00','finish',NULL),(11,'2019-07-01','LM','0011/LM/07/19','BIAYA PD KE BDG TGL 22-23 APRIL 2019\r\n','NURLAWIGIANTY A','RP',448000,'2019-07-01','2019-07-02','2019-07-03','finish',5),(11,'2019-08-19','UM','0011/UM/08/2019','tes eko 2','muhamad nurcahya eko','USD',5000,'0000-00-00','0000-00-00','0000-00-00','finish',NULL),(12,'2019-07-01','LM','0012/LM/07/19','BIAYA PD KE SBY TGL 13-15 MARET 2019\r\n','HIDAYATURROKHMAN','RP',699000,'2019-07-01','2019-07-02','2019-07-03','finish',5),(12,'2019-08-19','LM','0012/LM/08/2019','1234','star','USD',1234,'0000-00-00','0000-00-00','0000-00-00','jurnalis',5),(13,'2019-08-19','LB','0013/LB/08/2019','lat 1','eko','RP',5000,'0000-00-00','0000-00-00','0000-00-00','jurnalis',5),(13,'2019-08-19','LM','0013/LM/08/2019','1234','star26','SGD',1234,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(13,'2019-07-01','PB','0013/PB/07/19','BIAYA PD KE SBY TGL 13-15 MARET 2019\r\n','HIDAYATURROKHMAN','RP',940000,'2019-07-01','2019-07-02','2019-07-03','manager',5),(13,'2019-08-19','PP','0013/PP/08/2019','masuk','eko','USD',400,'0000-00-00','0000-00-00','0000-00-00','jurnalis',5),(14,'2019-08-19','LK','0014/LK/08/2019','1234','star','RP',1234,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(14,'2019-07-01','LM','0014/LM/07/19','BIAYA PD KE SUBANG TGL 17 MEI 2019\r\n','YASER Y','RP',202000,'2019-07-01','2019-07-02','2019-07-03','manager',6),(14,'2019-08-19','LM','0014/LM/08/2019','1234','ttrees','EURO',311412,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(15,'2019-07-01','LM','0015/LM/07/19','BIAYA PD KE SUBANG TGL 13 MEI 2019\r\n','YASER Y','RP',272000,'2019-07-01','2019-07-02','2019-07-03','manager',5),(15,'2019-08-19','LM','0015/LM/08/2019','1234','star','USD',1234,'0000-00-00','0000-00-00','0000-00-00','jurnalis',5),(15,'2019-08-19','LN','0015/LN/08/2019','12344','idham','USD',4123,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(16,'2019-07-01','LM','0016/LM/07/19','BIAYA PD KE JKT TGL 23-24 MEI 2019\r\n','NABHAN A/HASAN','RP',750000,'2019-07-01','2019-07-02','2019-07-03','manager',6),(16,'2019-08-19','PB','0016/PB/08/2019','213','adas','USD',31111,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(17,'2019-07-01','LM','0017/LM/07/19','BIAYA PD KE JKT TGL 23 MEI 2019\r\n','NABHAN A/INDRA','RP',385000,'2019-07-01','2019-07-02','2019-07-03','jurnalis',4),(17,'2019-08-19','LM','0017/LM/08/2019','213','star','SGD',213,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(18,'2019-08-19','LK','0018/LK/08/2019','123','eko','EURO',3121,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(18,'2019-07-01','LM','0018/LM/07/19','BIAYA PD KE JKT TGL 20-24 MEI 2019\r\n','NABHAN A/ALFIAN','RP',7395000,'2019-07-01','2019-07-02','2019-07-03','jurnalis',3),(19,'2019-08-19','LK','0019/LK/08/2019','ar','eta','USD',1227,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(19,'2019-07-01','LM','0019/LM/07/19','BIAYA PD KE JKT TGL 27-29 MEI 2019\r\n','NABHAN A/ALFIAN','RP',6224000,'2019-07-01','2019-07-02','2019-07-03','jurnalis',4),(19,'2019-08-19','LM','0019/LM/08/2019','123','star','EURO',123,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(19,'2019-08-19','LN','0019/LN/08/2019','rwwer','rees','SGD',131231,'0000-00-00','0000-00-00','2019-08-26','finish',NULL),(20,'2019-08-19','LB','0020/LB/08/2019','123','eko','USD',312,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(20,'2019-07-01','LM','0020/LM/07/19','BIAYA PD KE TANGERANG TGL 25-26 MEI 2019\r\n','NABHAN A/AGUNG S','RP',852000,'2019-07-01','2019-07-02','2019-07-03','jurnalis',2),(20,'2019-08-19','LM','0020/LM/08/2019','qwe','qwe','USD',21123,'0000-00-00','0000-00-00','2019-08-26','finish',NULL),(20,'2019-08-19','PB','0020/PB/08/2019','123','star','USD',123,'0000-00-00','0000-00-00','0000-00-00','manager',NULL),(21,'2019-08-19','LN','0021/LN/08/2019','123','eqwe','EURO',123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(22,'2019-08-19','LB','0022/LB/08/2019','123','rew','USD',122,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(22,'2019-08-19','LK','0022/LK/08/2019','qwe','Star','SGD',123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(23,'2019-08-19','LB','0023/LB/08/2019','q243','star','SGD',4123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(24,'2019-08-19','LM','0024/LM/08/2019','123','star','EURO',123,'0000-00-00','0000-00-00','0000-00-00','',NULL),(25,'2019-08-19','LB','0025/LB/08/2019','2341','star','RP',14123,'0000-00-00','0000-00-00','0000-00-00','',NULL),(26,'2019-08-19','LN','0026/LN/08/2019','asdad','Star','RP',12314123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(26,'2019-08-19','PB','0026/PB/08/2019','112','twer','EURO',123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(27,'2019-08-19','LK','0027/LK/08/2019','ara','tsat','SGD',1231,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(27,'2019-08-19','LM','0027/LM/08/2019','asd','asda','USD',23423,'0000-00-00','0000-00-00','0000-00-00','',NULL),(28,'2019-08-19','LM','0028/LM/08/2019','asd','asd','USD',342,'0000-00-00','0000-00-00','0000-00-00','',NULL),(29,'2019-08-19','LM','0029/LM/08/2019','123','star','EURO',119,'0000-00-00','0000-00-00','0000-00-00','',NULL),(30,'2019-08-19','LM','0030/LM/08/2019','123','sqwe','USD',123,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(30,'2019-08-19','PP','0030/PP/08/2019','asd','asd','USD',23432,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(31,'2019-08-19','LK','0031/LK/08/2019','asd','asd','USD',123141,'0000-00-00','0000-00-00','0000-00-00','jurnalis',NULL),(32,'2019-08-19','LM','0032/LM/08/2019','q41','asdwqe','EURO',143123,'0000-00-00','0000-00-00','0000-00-00','',NULL),(33,'2019-08-19','LK','0033/LK/08/2019','1231','4123','USD',123,'0000-00-00','0000-00-00','0000-00-00','',NULL),(34,'2019-08-22','LM','0034/LM/08/2019','ekooke','starrrrr','USD',1000,'0000-00-00','0000-00-00','0000-00-00','',NULL),(35,'2019-08-22','LK','0035/LK/08/2019','star','star','USD',313131313,'0000-00-00','0000-00-00','0000-00-00','',NULL),(36,'2019-08-22','LM','0036/LM/08/2019','FFFFF','FFFF','USD',1234,'0000-00-00','0000-00-00','0000-00-00','',NULL),(37,'2019-08-22','LB','0037/LB/08/2019','TTTT','TTTT','RP',55151,'0000-00-00','0000-00-00','0000-00-00','',7),(38,'2019-08-22','LB','0038/LB/08/2019','asd','asdwqe','USD',123,'0000-00-00','2019-08-27','0000-00-00','finish',7),(39,'2019-08-22','LK','0039/LK/08/2019','fafa','fafa','USD',132,'0000-00-00','0000-00-00','0000-00-00','manager',7),(40,'2019-08-22','LK','0040/LK/08/2019','rara','rara','RP',1312,'2019-08-22','0000-00-00','0000-00-00','manager',7),(41,'2019-08-22','LK','0041/LK/08/2019','asd','sad','SGD',131,'2019-08-22','0000-00-00','0000-00-00','',8),(42,'2019-08-23','PP','0042/PP/08/2019','tata','tat','USD',900,'2019-08-23','0000-00-00','0000-00-00','',6),(43,'2019-08-24','LK','0043/LK/08/2019','star','star','RP',4441,'2019-08-24','0000-00-00','0000-00-00','',8),(44,'2019-08-24','PP','0044/PP/08/2019','masuk','nurcahya eko 1','EURO',1000,'2019-08-24','0000-00-00','0000-00-00','',6),(45,'2019-08-24','LM','0045/LM/08/2019','pergi ke luar kota','rifqi','RP',10000000,'2019-08-24','0000-00-00','0000-00-00','',5),(46,'2019-08-24','LK','0046/LK/08/2019','star','star','USD',22131,'2019-08-24','0000-00-00','0000-00-00','',8),(47,'2019-08-24','PP','0047/PP/08/2019','masuk','nurcahya eko 3','RP',1000,'2019-08-24','0000-00-00','0000-00-00','',6),(48,'2019-08-24','LN','0048/LN/08/2019','star','Star','USD',412313,'2019-08-24','0000-00-00','0000-00-00','',8),(49,'2019-08-24','PP','0049/PP/08/2019','masuk','nurcahya eko 2','SGD',2000,'2019-08-24','0000-00-00','0000-00-00','',6),(50,'2019-08-24','PP','0050/PP/08/2019','masuk','nurcahya eko','USD',1001,'2019-08-24','0000-00-00','0000-00-00','',6),(51,'2019-08-24','PB','0051/PB/08/2019','pergi ke sekolah','rifqi','RP',9000000,'2019-08-24','0000-00-00','0000-00-00','',5),(52,'2019-08-24','UM','0052/UM/08/2019','perjalanan tes','star','RP',1,'2019-08-24','0000-00-00','0000-00-00','',7),(53,'2019-08-24','PB','0053/PB/08/2019','perjalanan lainnya','star','RP',2,'2019-08-24','0000-00-00','0000-00-00','manager',7),(54,'2019-08-25','UM','0054/UM/08/2019','minggu test','satar','RP',1,'2019-08-25','0000-00-00','0000-00-00','manager',5),(55,'2019-08-25','UM','0055/UM/08/2019','saa','shadep31@gmail.com','RP',3,'2019-08-25','2019-08-26','0000-00-00','manager',5),(56,'2019-08-26','UM','0056/UM/08/2019','TES SENIN','ADAN','RP',1,'2019-08-26','2019-08-26','0000-00-00','manager',5),(57,'2019-08-26','UM','0057/UM/08/2019','TESTING LAGI','Moch Star Ramadhan','RP',200,'2019-08-26','2019-08-26','2019-08-26','finish',5),(58,'2019-08-26','UM','0058/UM/08/2019','masjid','Al Barokah','RP',20000000,'2019-08-26','0000-00-00','0000-00-00','manager',5),(59,'2019-08-27','LM','0059/LM/08/2019','raaa','saaa','RP',121212,'2019-08-27','0000-00-00','2019-08-27','finish',6),(60,'2019-08-27','UM','0060/UM/08/2019','TESTING FLOW','STAR SELASA','RP',2,'2019-08-27','2019-08-27','2019-08-27','finish',5),(61,'2019-08-27','PP','0061/PP/08/2019','TESTING','VER3','RP',1,'2019-08-27','2019-08-27','0000-00-00','jurnalis',7),(1,'2019-08-17','LK','1','cc','cc','USD',632423,'0000-00-00','0000-00-00','0000-00-00','',NULL),(2,'2019-08-17','LB','2','bb','bb','SGD',1312111111,'0000-00-00','0000-00-00','0000-00-00','',NULL),(3,'2019-08-17','LK','3','aa','aa','USD',123123,'0000-00-00','0000-00-00','0000-00-00','',NULL);

/*Table structure for table `operator` */

DROP TABLE IF EXISTS `operator`;

CREATE TABLE `operator` (
  `operator_id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_enc` varchar(60) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `position` enum('manager','verifikasi1','verifikasi2','verifikasi3','jurnalis','admin','guest') NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `status` enum('active','nonactive') NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `operator` */

insert  into `operator`(`operator_id`,`username`,`password_enc`,`password`,`position`,`phone_number`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','0','active'),(2,'manager','1d0258c2440a8d19e716292b231e3190','manager','manager','123123123','active'),(3,'admins','21232f297a57a5a743894a0e4a801fc3','admin','admin','0','nonactive'),(4,'jurnalis','a8bf7856e42e177ffa80bda20d0166c4','jurnalis','jurnalis','012312','active'),(5,'verif1','70f4c4a6a1c5edf8104f23a44e308f1f','verif1','verifikasi1','0123','active'),(6,'verif2','4932df2bfecc6430acbe6b527be892e4','verif2','verifikasi2','0','active'),(7,'verif3','ac1ac4d15eb52cac0c20c0b6ea21c3f2','verif3','verifikasi3','0','active'),(8,'tata','49d02d55ad10973b7b9d0dc9eba7fdf0','tata','verifikasi1','33331312','active'),(9,'Ojan','57551cb51d38c51417f5abfeacfb9b13','ojan','jurnalis','091823098102','active'),(10,'eko','934b535800b1cba8f96a5d72f72f1611','2222','jurnalis','2131','active');

/*Table structure for table `revisi` */

DROP TABLE IF EXISTS `revisi`;

CREATE TABLE `revisi` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal_Masuk` date DEFAULT NULL,
  `Kode_Ver` varchar(20) DEFAULT NULL,
  `No_Verifikasi` varchar(50) DEFAULT NULL,
  `Keterangan` text,
  `User` varchar(20) DEFAULT NULL,
  `Mata_Uang` varchar(10) DEFAULT NULL,
  `Jumlah` int(20) DEFAULT NULL,
  `Tgl_Out_Verif` date DEFAULT NULL,
  `Tgl_Out_Jurnal` date DEFAULT NULL,
  `Tgl_Out_Manager` date DEFAULT NULL,
  `Status_Revisi` varchar(10) DEFAULT NULL,
  `Alasan_Revisi` text,
  KEY `no_dokumen` (`No`),
  KEY `No_Verifikasi` (`No_Verifikasi`),
  CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`No_Verifikasi`) REFERENCES `dokumen` (`No_Verifikasi`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `revisi` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
