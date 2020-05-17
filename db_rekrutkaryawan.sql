# Host: localhost  (Version 5.5.5-10.4.8-MariaDB)
# Date: 2020-05-16 19:26:26
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "karyawan"
#

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_karyawan` varchar(4) NOT NULL,
  `nm_karyawan` varchar(50) NOT NULL,
  `tglmasukkerja` date NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "karyawan"
#


#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` varchar(3) NOT NULL,
  `nm_kriteria` varchar(25) NOT NULL,
  `bobot_kriteria` double(6,4) NOT NULL DEFAULT 0.0000,
  `nilai_target` int(1) DEFAULT NULL,
  `status_kriteria` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES ('C01','Administrasi',0.0000,3,'CF'),('C02','Disiplin',0.0000,4,'SF'),('C03','Tes Khusus',0.0000,4,'CF');

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (2);

#
# Structure for table "nilai_alternatif"
#

DROP TABLE IF EXISTS `nilai_alternatif`;
CREATE TABLE `nilai_alternatif` (
  `id_pelamar` varchar(4) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `nilai_tes` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "nilai_alternatif"
#

INSERT INTO `nilai_alternatif` VALUES ('P009','C01',3),('P004','C01',2),('P004','C02',3),('P004','C03',1),('P010','C01',3),('P010','C02',2),('P010','C03',1);

#
# Structure for table "nilai_target"
#

DROP TABLE IF EXISTS `nilai_target`;
CREATE TABLE `nilai_target` (
  `id_kriteria` varchar(3) DEFAULT NULL,
  `nilai_target` int(1) DEFAULT NULL,
  `status_kriteria` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "nilai_target"
#


#
# Structure for table "pelamar"
#

DROP TABLE IF EXISTS `pelamar`;
CREATE TABLE `pelamar` (
  `id_pelamar` varchar(4) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nm_pelamar` varchar(50) NOT NULL,
  `jk_pelamar` varchar(6) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL DEFAULT '',
  `tanggal_lahir` date NOT NULL,
  `almt_pelamar` varchar(50) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `status` varchar(7) NOT NULL,
  `nohp_pelamar` varchar(13) NOT NULL,
  `pendidikan_akhir` varchar(3) NOT NULL,
  `id_periode` varchar(3) DEFAULT NULL,
  `tanda` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pelamar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pelamar"
#

INSERT INTO `pelamar` VALUES ('P003','2020-05-11','Asiqdaaa','Pria','BantarGebang','1991-01-01','Jalan Menuju Surga Mu Ya Allah','1112223332123423','Menikah','1234567890987','S1','P01',0),('P004','2020-05-04','Dinar Anggia Putri','Wanita','Tangerang','1990-11-27','Jalan Raya Mana Aja Dah Yang Penting Isi Alamat Ya','0987654352647','Lajang','081234567898','SMA','P02',1),('P006','2020-12-28','Sorayawa','Wanita','Kupang','1999-01-01','Jalan raya jombang ','1232345656653453','Lajang','2333343423423','S2','P03',0),('P007','2020-05-18','Dinar Anggia','Wanita','Tangerang','1998-04-26','Jalan jombang raya no 21','1234565432123','Lajang','0895339418926','S1','P01',0),('P008','2020-01-20','Bisma Karisma','Pria','Bandung','1990-11-27','Jalan sabuga raya','12313143894739','Lajang','089127328732','D3','P01',0),('P009','2020-01-27','Dulalaaa','Pria','Jakarta','2000-01-01','Jakarta Selatan','1234567890089','Lajang','089123213123','SMA','P01',0),('P010','2020-01-21','Doritos','Pria','Bekasi','1999-09-09','Dijalan rumah nya pokoknya','123123123123','Menikah','13413213123','S1','P01',1),('P011','2020-04-20','Buisssss','Wanita','Jogjakarta','2000-01-01','Jakarta','12312313123123','Lajang','343413414','S1','P02',0);

#
# Structure for table "perbandingan_kriteria"
#

DROP TABLE IF EXISTS `perbandingan_kriteria`;
CREATE TABLE `perbandingan_kriteria` (
  `id_kriteria1` varchar(3) NOT NULL,
  `id_kriteria2` varchar(25) NOT NULL,
  `nilai_pembanding` double(6,4) NOT NULL DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "perbandingan_kriteria"
#

INSERT INTO `perbandingan_kriteria` VALUES ('1','1',1.0000),('1','2',8.0000),('2','1',0.1250),('1','3',8.0000),('3','1',0.1250),('2','2',1.0000),('2','3',7.0000),('3','2',0.1429);

#
# Structure for table "periode"
#

DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode` (
  `id_periode` varchar(3) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tgl_pembukaan` date NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "periode"
#

INSERT INTO `periode` VALUES ('P01','Januari','2019-01-14'),('P02','April','2019-04-08');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` varchar(3) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES ('U01','Dinar Anggia P','dinaranggia','123','Admin'),('U02','Lutfi Aamiin','Manager','','Manager');
