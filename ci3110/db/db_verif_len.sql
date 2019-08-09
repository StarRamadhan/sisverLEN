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
  `tanggal_masuk` date NOT NULL,
  `nomor_dokumen` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_out_verif` date NOT NULL,
  `tanggal_out_jurnal` date DEFAULT NULL,
  `tanggal_out_manager` date DEFAULT NULL,
  `status_dok_jurnal` varchar(10) DEFAULT NULL,
  `status_dok_manager` varchar(10) DEFAULT NULL,
  `nilai` int(11) NOT NULL,
  `no_revisi` int(5) DEFAULT NULL,
  `id_user` int(15) NOT NULL,
  PRIMARY KEY (`nomor_dokumen`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

/*Table structure for table `revisi` */

DROP TABLE IF EXISTS `revisi`;

CREATE TABLE `revisi` (
  `no_dokumen` varchar(50) DEFAULT NULL,
  `no_revisi` int(11) DEFAULT NULL,
  `ket_revisi` text,
  `tgl_revisi` date DEFAULT NULL,
  `nilai_revisi` int(20) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `tgl_out_verif` date DEFAULT NULL,
  KEY `no_dokumen` (`no_dokumen`),
  CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`no_dokumen`) REFERENCES `dokumen` (`nomor_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `revisi` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `password2_user` varchar(20) DEFAULT NULL,
  `jabatan_user` enum('manager','verifikasi1','verifikasi2','verifikasi3','jurnal','admin') NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_user`,`password_user`,`password2_user`,`jabatan_user`,`no_telp`,`foto`) values (1,'Pak Agan','934B535800B1CBA8F96A5D72F72F1611','2222','manager','0895340607664','1.jpg'),(2,'Pak Amir','DBC4D84BFCFE2284BA11BEFFB853A8C4','4444','verifikasi1','0897954652154',NULL),(3,'admin','B59C67BF196A4758191E42F76670CEBA','1111','admin','0879585462157',NULL),(4,'Junaidi','2BE9BD7A3434F7038CA27D1918DE58BD','3333','jurnal','0849879875852',NULL),(5,'Sumarni','6074C6AA3488F3C2DDDFF2A7CA821AAB','5555','verifikasi2','0899996645212',NULL),(6,'Haniatun','E9510081AC30FFA83F10B68CDE1CAC07','6666','verifikasi3','0812125487888',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
