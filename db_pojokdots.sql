# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-07-07 19:36:21
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "gammu"
#

DROP TABLE IF EXISTS `gammu`;
CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

#
# Data for table "gammu"
#

/*!40000 ALTER TABLE `gammu` DISABLE KEYS */;
INSERT INTO `gammu` VALUES (17);
/*!40000 ALTER TABLE `gammu` ENABLE KEYS */;

#
# Structure for table "inbox"
#

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `Status` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

#
# Data for table "inbox"
#


#
# Structure for table "outbox"
#

DROP TABLE IF EXISTS `outbox`;
CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) DEFAULT '0',
  `Priority` int(11) DEFAULT '0',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

#
# Data for table "outbox"
#


#
# Structure for table "outbox_multipart"
#

DROP TABLE IF EXISTS `outbox_multipart`;
CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

#
# Data for table "outbox_multipart"
#


#
# Structure for table "pasien"
#

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `nik_pasien` varchar(16) NOT NULL,
  `nm_pasien` varchar(50) DEFAULT NULL,
  `no_bpjs` varchar(13) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `tinggi_bdn` varchar(3) DEFAULT NULL,
  `berat_bdn` varchar(3) DEFAULT NULL,
  UNIQUE KEY `NIK Pasien` (`nik_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pasien"
#

INSERT INTO `pasien` VALUES ('1234567890234567','Reno Kristianto','1234567890123','1998-03-20','L','Pondok Cabe','082167430477','179','60'),('1234567890234578','Eduardo','1234567890134','0000-00-00','L','Pondok Cabe','082167430477','179','60');

#
# Structure for table "petugas"
#

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_petugas` varchar(3) NOT NULL,
  `nm_petugas` varchar(50) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  UNIQUE KEY `ID Petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "petugas"
#

INSERT INTO `petugas` VALUES ('1','Wulan','Wulandari','123');

#
# Structure for table "phones"
#

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) DEFAULT 'ERROR',
  `NetName` varchar(35) DEFAULT 'ERROR',
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

#
# Data for table "phones"
#


#
# Structure for table "pmo"
#

DROP TABLE IF EXISTS `pmo`;
CREATE TABLE `pmo` (
  `nik_pmo` varchar(16) NOT NULL,
  `nm_pmo` varchar(50) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  UNIQUE KEY `NIK PMO` (`nik_pmo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pmo"
#

INSERT INTO `pmo` VALUES ('1234567890123456','indra','082167430472','ulujami'),('1234567890123490','rahmat','082167430471','ulujami');

#
# Structure for table "register"
#

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id_register` varchar(4) NOT NULL DEFAULT '0',
  `tgl_daftar` date DEFAULT NULL,
  `no_rm` varchar(10) DEFAULT NULL,
  `id_petugas` varchar(3) DEFAULT NULL,
  `nik_pasien` varchar(16) DEFAULT NULL,
  UNIQUE KEY `ID Register` (`id_register`),
  KEY `ID Petugas` (`id_petugas`),
  KEY `NIK Pasien` (`nik_pasien`),
  CONSTRAINT `ID Petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `NIK Pasien` FOREIGN KEY (`nik_pasien`) REFERENCES `pasien` (`nik_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "register"
#

INSERT INTO `register` VALUES ('R001','2019-05-30','RM0001','1','1234567890234567'),('R002','2019-06-10','RM0002','1','1234567890234578');

#
# Structure for table "faskes"
#

DROP TABLE IF EXISTS `faskes`;
CREATE TABLE `faskes` (
  `no_faskes` varchar(5) NOT NULL DEFAULT '',
  `tipe_diagnosis` varchar(27) DEFAULT NULL,
  `lokasi_anatomi` varchar(50) DEFAULT NULL,
  `paru_bcg` varchar(10) DEFAULT NULL,
  `tipe_pasien` varchar(21) DEFAULT NULL,
  `panduan_oat` varchar(13) DEFAULT NULL,
  `bentuk_oat` varchar(12) DEFAULT NULL,
  `skoring_anak` varchar(50) DEFAULT NULL,
  `sumber_obat` varchar(13) DEFAULT NULL,
  `status_hiv` varchar(15) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `riwayat_dm` varchar(5) DEFAULT NULL,
  `status_hamil` varchar(11) DEFAULT NULL,
  `id_register` varchar(4) DEFAULT '',
  `nik_pmo` varchar(16) DEFAULT NULL,
  UNIQUE KEY `No. Faskes` (`no_faskes`),
  KEY `ID Register` (`id_register`),
  KEY `NIK PMO` (`nik_pmo`),
  CONSTRAINT `ID Register` FOREIGN KEY (`id_register`) REFERENCES `register` (`id_register`),
  CONSTRAINT `NIK PMO` FOREIGN KEY (`nik_pmo`) REFERENCES `pmo` (`nik_pmo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "faskes"
#

INSERT INTO `faskes` VALUES ('F0001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'R001','1234567890123456'),('F0002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'R002','1234567890123490');

#
# Structure for table "hiv"
#

DROP TABLE IF EXISTS `hiv`;
CREATE TABLE `hiv` (
  `id_tes` varchar(4) NOT NULL DEFAULT '',
  `tgl_dianjurkan` date DEFAULT NULL,
  `tgl_tes` date DEFAULT NULL,
  `hasil_tes` varchar(2) DEFAULT NULL,
  `no_faskes` varchar(5) DEFAULT NULL,
  UNIQUE KEY `ID Tes HIV` (`id_tes`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `hiv_ibfk_1` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "hiv"
#


#
# Structure for table "hasil_akhir"
#

DROP TABLE IF EXISTS `hasil_akhir`;
CREATE TABLE `hasil_akhir` (
  `id_hasil` varchar(5) NOT NULL DEFAULT '0',
  `tgl_selesai` date DEFAULT NULL,
  `hasil` varchar(18) DEFAULT NULL,
  `no_faskes` varchar(5) DEFAULT NULL,
  UNIQUE KEY `ID Hasil Akhir` (`id_hasil`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `hasil_akhir_ibfk_1` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "hasil_akhir"
#


#
# Structure for table "checkup"
#

DROP TABLE IF EXISTS `checkup`;
CREATE TABLE `checkup` (
  `id_checkup` varchar(6) NOT NULL DEFAULT '0',
  `tgl_checkup` date DEFAULT NULL,
  `tgl_selanjutnya` date DEFAULT NULL,
  `jml_obat` int(2) DEFAULT NULL,
  `jml_minum` int(3) DEFAULT NULL,
  `berat_bdn` varchar(3) DEFAULT NULL,
  `tahap_pengobatan` varchar(8) DEFAULT NULL,
  `keterangan` varchar(11) DEFAULT NULL,
  `no_faskes` varchar(5) NOT NULL DEFAULT '',
  UNIQUE KEY `ID Checkup` (`id_checkup`),
  KEY `No. Faskes` (`no_faskes`),
  CONSTRAINT `No. Faskes` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "checkup"
#

INSERT INTO `checkup` VALUES ('C00001','2019-06-18','2019-06-28',NULL,NULL,NULL,NULL,'Hadir','F0001'),('C00002','2019-06-18','2019-06-29',NULL,NULL,NULL,NULL,'Hadir','F0002'),('C00003','2019-06-28','2019-07-08',NULL,NULL,NULL,NULL,'Hadir','F0001'),('C00004','2019-07-08','2019-07-18',NULL,NULL,NULL,NULL,'Hadir','F0001');

#
# Structure for table "dahak"
#

DROP TABLE IF EXISTS `dahak`;
CREATE TABLE `dahak` (
  `no_reglab` varchar(6) NOT NULL DEFAULT '',
  `tgl_tes` date DEFAULT NULL,
  `bulan_ke` varchar(1) DEFAULT NULL,
  `bta` varchar(6) DEFAULT NULL,
  `biakan` varchar(11) DEFAULT NULL,
  `tes_cepat` varchar(9) DEFAULT NULL,
  `no_faskes` varchar(5) DEFAULT '',
  UNIQUE KEY `No. Registrasi Lab` (`no_reglab`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `no_faskes` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "dahak"
#

INSERT INTO `dahak` VALUES ('402194',NULL,NULL,NULL,NULL,NULL,'F0001');

#
# Structure for table "diabetes"
#

DROP TABLE IF EXISTS `diabetes`;
CREATE TABLE `diabetes` (
  `id_tes` varchar(5) NOT NULL DEFAULT '',
  `hasil_tesdm` varchar(7) DEFAULT NULL,
  `terapi_dm` varchar(10) DEFAULT NULL,
  `no_faskes` varchar(5) NOT NULL DEFAULT '',
  UNIQUE KEY `ID Tes Diabetes` (`id_tes`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `diabetes_ibfk_1` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "diabetes"
#


#
# Structure for table "sentitems"
#

DROP TABLE IF EXISTS `sentitems`;
CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

#
# Data for table "sentitems"
#

