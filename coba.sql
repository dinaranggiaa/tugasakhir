# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-07-07 19:35:17
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "checkup"
#

DROP TABLE IF EXISTS `checkup`;
CREATE TABLE `checkup` (
  `id_checkup` varchar(6) NOT NULL DEFAULT '0',
  `tgl_checkup` date DEFAULT NULL,
  `tgl_selanjutnya` date DEFAULT NULL,
  `dosis_tablet` int(1) DEFAULT NULL,
  `jml_minum` int(3) DEFAULT NULL,
  `berat_bdn_2` varchar(3) DEFAULT NULL,
  `tahap_pengobatan` varchar(8) DEFAULT NULL,
  `keterangan` varchar(11) DEFAULT 'Hadir',
  `no_faskes` varchar(5) NOT NULL DEFAULT '',
  `tanda` enum('0','1') NOT NULL DEFAULT '0',
  UNIQUE KEY `ID Checkup` (`id_checkup`),
  KEY `No. Faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "checkup"
#

INSERT INTO `checkup` VALUES ('C00001',NULL,'2019-07-02',0,27,'5','Awal','Hadir','F0005','1'),('C00002',NULL,'2019-07-02',0,25,'3','Awal','Hadir','F0006','1'),('C00003',NULL,'2019-07-02',0,25,'3','Awal','Hadir','F0008','1'),('C00004','2019-07-02',NULL,0,NULL,NULL,NULL,'Hadir','F0005','0'),('C00005','2019-07-02','2019-07-17',0,16,'45','Awal','Hadir','F0006','0'),('C00006','2019-07-02','2019-07-18',0,17,'45','Awal','Hadir','F0008','0'),('C00007',NULL,'2019-07-24',0,23,'45','Awal','Hadir','F0005','0'),('C00008',NULL,'2019-07-04',0,16,'45','','Hadir','F0011','1'),('C00009',NULL,'2019-07-04',0,23,'32','Awal','Hadir','F0011','1'),('C00010',NULL,'2019-07-04',0,16,'45','Awal','Hadir','F0011','1'),('C00011',NULL,'2019-07-04',0,23,'34','Awal','Hadir','F0011','1'),('C00012','2019-06-03','2019-07-05',0,NULL,'','','Hadir','F0011','1'),('C00013','2019-07-05',NULL,0,NULL,NULL,NULL,'Hadir','F0011','0'),('C00014','2019-07-06','2019-07-07',0,15,'60','Awal','Hadir','F0009','1'),('C00015','2019-07-06','2019-07-15',0,10,'','','Hadir','F0008','0'),('C00016','2019-07-06','2019-07-11',1,6,'60','Awal','Hadir','F0006','0'),('C00017','2019-07-07','2019-07-20',2,14,'55','Awal','Hadir','F0009','0'),('C00018','2019-07-07','2019-07-18',2,12,'65','Awal','Hadir','F0005','0'),('C00019','2019-07-07','2019-07-17',2,11,'56','Lanjutan','Hadir','F0009','0'),('C00020','2019-07-07','2019-07-23',2,17,'56','Awal','Hadir','F0009','0');

#
# Structure for table "dahak"
#

DROP TABLE IF EXISTS `dahak`;
CREATE TABLE `dahak` (
  `id_cekdahak` varchar(6) NOT NULL,
  `no_reglab` varchar(6) NOT NULL DEFAULT '',
  `tgl_tes` date DEFAULT NULL,
  `bulan_ke` varchar(1) DEFAULT NULL,
  `bta` varchar(6) DEFAULT NULL,
  `biakan` varchar(11) DEFAULT NULL,
  `tes_cepat` varchar(9) DEFAULT NULL,
  `no_faskes` varchar(5) DEFAULT '',
  UNIQUE KEY `No. Registrasi Lab` (`no_reglab`),
  UNIQUE KEY `Id_CekDahak` (`id_cekdahak`),
  KEY `no_faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "dahak"
#

INSERT INTO `dahak` VALUES ('D00009','32','2019-06-04','1','1+','2','2','F0006'),('D00006','6','2019-06-07','2','1+','3','4','F0009'),('D00008','70','2019-06-04','5','1+','2','3','F0010'),('D00002','95','2019-06-06','3','2+',NULL,'3','F0005'),('D00007','98','2019-06-05','8','3+','2','1','F0009');

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
  `id_register` varchar(5) DEFAULT '',
  `nik_pmo` varchar(16) DEFAULT NULL,
  UNIQUE KEY `No. Faskes` (`no_faskes`),
  KEY `ID Register` (`id_register`),
  KEY `NIK PMO` (`nik_pmo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "faskes"
#

INSERT INTO `faskes` VALUES ('F0005','Terdiagnosis Klinis','dfgd','Tidak Ada','Baru','Kategori Anak','Kombipak','','Asuransi','Tidak Diketahui','2018-03-03','Tidak','Hamil','R0003','4'),('F0006','Terdiagnosis Klinis','dfg','Tidak Ada','gdf','Kategori 2','Kombipak','','Program TB','Tidak Diketahui','2019-06-05','Tidak',NULL,'R0001','2341'),('F0008','Terdiagnosis Klinis','hggh','Tidak Ada','huhuhu','Kategori 1','Kombipak','','','Tidak Diketahui','2018-01-01','Tidak',NULL,'R0004','9095'),('F0009','Terdiagnosis Klinis','TB Paru','Tidak Ada','Baru','Kategori 1','Kombipak','087','Program TB','Tidak Diketahui','2019-06-05','Tidak','T','R0002','44'),('F0010','Terkonfirmasi Bakteriologis','TB Paru','Tidak Ada','Baru','Kategori 1','KDT','0900','Program TB','Positif','2019-06-12','Tidak',NULL,'R0003','86'),('F0011','Terdiagnosis Klinis','Dada','Tidak Ada','Baru','Kategori 1','Kombipak','13','Asuransi','Negatif','2019-07-02','Tidak','Tidak Hamil','R0005','34343434');

#
# Structure for table "diabetes"
#

DROP TABLE IF EXISTS `diabetes`;
CREATE TABLE `diabetes` (
  `id_tesdm` varchar(5) NOT NULL DEFAULT '',
  `hasil_tesdm` varchar(7) DEFAULT NULL,
  `terapi_dm` varchar(11) DEFAULT NULL,
  `no_faskes` varchar(5) NOT NULL DEFAULT '',
  UNIQUE KEY `ID Tes Diabetes` (`id_tesdm`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `diabetes_ibfk_1` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "diabetes"
#

INSERT INTO `diabetes` VALUES ('DM002','Negatif','OHO','F0005'),('DM005','Positif','Inj Insulin','F0008'),('DM006','Positif','Inj Insulin','F0009');

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
# Structure for table "hasil_akhir"
#

DROP TABLE IF EXISTS `hasil_akhir`;
CREATE TABLE `hasil_akhir` (
  `id_hasil` varchar(6) NOT NULL DEFAULT '0',
  `tgl_selesai` date DEFAULT NULL,
  `hasilakhir` varchar(18) DEFAULT NULL,
  `no_faskes` varchar(5) DEFAULT NULL,
  UNIQUE KEY `ID Hasil Akhir` (`id_hasil`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `hasil_akhir_ibfk_1` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "hasil_akhir"
#

INSERT INTO `hasil_akhir` VALUES ('HA0001','2019-07-07','Sembuh','F0009');

#
# Structure for table "hiv"
#

DROP TABLE IF EXISTS `hiv`;
CREATE TABLE `hiv` (
  `id_teshiv` varchar(4) NOT NULL DEFAULT '',
  `tgl_dianjurkan` date DEFAULT NULL,
  `tgl_teshiv` date DEFAULT NULL,
  `hasil_tes` varchar(2) DEFAULT NULL,
  `no_faskes` varchar(5) DEFAULT NULL,
  UNIQUE KEY `ID Tes HIV` (`id_teshiv`),
  KEY `no_faskes` (`no_faskes`),
  CONSTRAINT `hiv_ibfk_1` FOREIGN KEY (`no_faskes`) REFERENCES `faskes` (`no_faskes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "hiv"
#

INSERT INTO `hiv` VALUES ('H004','2019-06-07','2019-06-19','NR','F0009');

#
# Structure for table "inbox"
#

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

#
# Data for table "inbox"
#

/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
INSERT INTO `inbox` VALUES ('2019-06-19 20:29:42','2019-06-13 17:21:44','004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E','TELKOMSEL','Default_No_Compression','','+6281107907',1,'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.',1,'','false',0),('2019-06-19 20:29:43','2019-06-17 16:33:20','00500072006F0078007300650073002000350020006D0065006E006900740020006B0061006D00690020006200610051006E00740075002000680069006E00670067006100200063006100690072002000730061006D00700061006900200035006A0074002000740061006E007000610020006100670075006E0061006E003A0020006200690074002E006C0079002F0031004A00740032004D0065006E006900740043006100690072002000610074006100750020006200690074002E006C0079002F0031004A0074004300610069007200520065006B0065006E0069006E0067000A006400610066007400610072003A0020006200690074002E006C0079002F0032004A0054006C006E006700730075006E006700410054004D','+6281384441213','Default_No_Compression','','+6281100501',-1,'Proxses 5 menit kami baQntu hingga cair sampai 5jt tanpa agunan: bit.ly/1Jt2MenitCair atau bit.ly/1JtCairRekening\ndaftar: bit.ly/2JTlngsungATM',4,'','false',0),('2019-06-19 20:29:43','2019-06-19 17:54:07','004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E','TELKOMSEL','Default_No_Compression','','+62811078801',1,'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.',5,'','false',0),('2019-06-20 16:05:55','2019-06-20 13:12:22','004D0065006E0061006E0067006B0061006E002000700075006C007300610020005200700020003100300030002E003000300030002000750074006B0020003200300030002000700065006D0065006E0061006E0067002E00200041006B007400690066006B0061006E002000700061006B0065007400200043004F004D0042004F00200031003800470042002000320034006A0061006D0020002B00200074006C007000200035006A0061006D0020006B00650020005400730065006C002C002000680061006E00790061002000520070003100300035006B002E0020004800750062003A0020002A0033003600330023002F004F00750074006C00650074002000740065007200640065006B00610074002E0020007400730065006C002E006D0065002F006200610072006F006B0061006800200053004B0042','TELKOMSEL','Default_No_Compression','','+6281100000',0,'Menangkan pulsa Rp 100.000 utk 200 pemenang. Aktifkan paket COMBO 18GB 24jam + tlp 5jam ke Tsel, hanya Rp105k. Hub: *363#/Outlet terdekat. tsel.me/barokah SKB',8,'','false',0),('2019-06-20 16:09:40','2019-06-20 16:09:31','004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E','TELKOMSEL','Default_No_Compression','','+6281107909',-1,'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.',9,'','false',0),('2019-06-20 16:48:10','2019-06-20 16:47:55','0054006500720069006D0061006B0061007300690068002000740065006C006100680020006D0065006C0061006B0075006B0061006E002000700065006E00670069007300690061006E00200075006C0061006E0067002000640067006E00200053004E002000350031003000300033003500310037003200380034003100370035002000730065006E0069006C00610069002000310030003000300030002E','TELKOMSEL','Default_No_Compression','','+6281107909',1,'Terimakasih telah melakukan pengisian ulang dgn SN 51003517284175 senilai 10000.',10,'','false',0),('2019-06-20 16:49:40','2019-06-20 16:49:36','004D0061007500200062006500720062006100670069002000500075006C007300610020006B006500200053006500730061006D0061002000500065006E006700670075006E0061002000540065006C006B006F006D00730065006C003F0020004B006500740069006B0020002A003800350038002A004E006F006D006F007200540075006A00750061006E002A004E006F006D0069006E0061006C005400720061006E007300660065007200230020006C0061006C0075002000740075006E00670067007500200053004D00530020006B006F006E006600690072006D006100730069006E00790061','TELKOMSEL','Default_No_Compression','','+62811078801',1,'Mau berbagi Pulsa ke Sesama Pengguna Telkomsel? Ketik *858*NomorTujuan*NominalTransfer# lalu tunggu SMS konfirmasinya',11,'','false',0),('2019-06-21 13:56:34','2019-06-21 12:45:21','00420069007300610020006400690061006A0061006B0020006E0067006F00620072006F006C0020006E00690068002C002000730065007200750020006C0061006700690021002000790075006B00200064006900200054004C005000200030003800300039003100300030003000300031003100200028006B0075007300750073002000310038007400680020006B0065006100740061007300290020003E006E006F002000730065007800260073006100720061','+6285210696617','Default_No_Compression','','+6281100501',-1,'Bisa diajak ngobrol nih, seru lagi! yuk di TLP 08091000011 (kusus 18th keatas) >no sex&sara',12,'','false',0),('2019-06-21 14:09:18','2019-06-21 14:09:02','004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E','TELKOMSEL','Default_No_Compression','','+6281100000',1,'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.',13,'','false',0),('2019-07-06 22:07:48','2019-07-06 22:07:44','004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E','TELKOMSEL','Default_No_Compression','','+62811078801',1,'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.',14,'','false',0);
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;

#
# Structure for table "outbox"
#

DROP TABLE IF EXISTS `outbox`;
CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `SendingTimeOut` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) DEFAULT '0',
  `Priority` int(11) DEFAULT '0',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`(250))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "outbox"
#

/*!40000 ALTER TABLE `outbox` DISABLE KEYS */;
INSERT INTO `outbox` VALUES ('2019-07-06 22:46:29','2019-07-06 22:45:00','2019-07-06 22:45:00','23:59:59','00:00:00',NULL,'0821xxxxx','Default_No_Compression',NULL,-1,'Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',1,'false',-1,NULL,'2019-07-06 22:56:29','default','',1,0,'Reserved',-1);
/*!40000 ALTER TABLE `outbox` ENABLE KEYS */;

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
  `jenkel` char(6) DEFAULT '',
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `tinggi_bdn` varchar(3) DEFAULT NULL,
  `berat_bdn` varchar(3) DEFAULT NULL,
  UNIQUE KEY `NIK Pasien` (`nik_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pasien"
#

INSERT INTO `pasien` VALUES ('0901','Dina','0910','1992-09-09','W','iaa','081517883572','125','35'),('1211','Dinar','1211','1991-02-01','W','Ciledug','081284021663','135','34'),('123121','laa','089','1998-05-09','W','Mana aja lah suka suka lu','08121','444','34'),('12324242424','Herin','12323','2019-07-22','Pria','ulujami','090909','123','12'),('1233','Req','1231','1999-09-01','W','Jakarta Barat','12331','144','35'),('16125034567','Indra Herin','0987657489','2017-07-24','P','Ulujami','082167430472','123','60'),('34730','brisik lu nra','8234734','0000-00-00','Pria','BL','089123749','123','33'),('36711109100023','alek','0987','1990-01-01',NULL,'manamana','123456789','',''),('98765','bertus','23232323','1990-10-01','P','disitu','082311174293','200','70');

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

INSERT INTO `petugas` VALUES ('1','Wulan','Wulandari','123'),('2','Dinar','dinaranggi','122');

#
# Structure for table "phones"
#

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeOut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
INSERT INTO `phones` VALUES ('','2019-07-06 22:44:56','2019-07-06 22:43:55','2019-07-06 22:45:06','yes','yes','353907049761991','510106762430472','510 10','TELKOMSELL','Gammu 1.40.0, Windows Server 2007, MS VC 1900',100,66,0,0);
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;

#
# Structure for table "pmo"
#

DROP TABLE IF EXISTS `pmo`;
CREATE TABLE `pmo` (
  `nik_pmo` varchar(16) NOT NULL,
  `nm_pmo` varchar(50) DEFAULT NULL,
  `no_hp_pmo` varchar(12) DEFAULT NULL,
  `alamat_pmo` varchar(200) DEFAULT NULL,
  UNIQUE KEY `NIK PMO` (`nik_pmo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pmo"
#

INSERT INTO `pmo` VALUES ('','','',''),('1123','poa','081','koo'),('120','cv','082178430472','Ciledug'),('1231','re','232','sada'),('2341','rew','123','sdfa'),('34343434','Bambang','43456353','Bali'),('4','op','234','dfrgdg'),('44','op','23','sdfg'),('86','yuu','8686','yyyy'),('891','pon','011','po'),('9095','poo','90909','dfg');

#
# Structure for table "register"
#

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id_register` varchar(5) NOT NULL DEFAULT '0',
  `tgl_daftar` date DEFAULT NULL,
  `no_rm` varchar(10) DEFAULT NULL,
  `id_petugas` varchar(3) DEFAULT NULL,
  `nik_pasien` varchar(16) DEFAULT NULL,
  UNIQUE KEY `ID Register` (`id_register`),
  KEY `ID Petugas` (`id_petugas`),
  KEY `NIK Pasien` (`nik_pasien`),
  CONSTRAINT `Fk Register Pasien` FOREIGN KEY (`nik_pasien`) REFERENCES `pasien` (`nik_pasien`),
  CONSTRAINT `fk petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "register"
#

INSERT INTO `register` VALUES ('R0001','2019-06-05','1211',NULL,'1211'),('R0002','2019-06-06','1233',NULL,'1233'),('R0003','2019-06-10','2131',NULL,'123121'),('R0004','2019-06-05','0912',NULL,'0901'),('R0005','2019-07-01','1234',NULL,'36711109100023'),('R0006','2019-07-01','0000',NULL,'98765'),('R0007','2019-07-04','RM0002',NULL,'16125034567'),('R0008','2019-07-04','RM1232',NULL,'12324242424'),('R0009','2019-07-06','1701',NULL,'34730');

#
# Structure for table "schedule"
#

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_checkup` varchar(6) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `jam` varchar(5) NOT NULL DEFAULT '10:00',
  `no_hp` varchar(50) NOT NULL DEFAULT '',
  `pesan` varchar(160) NOT NULL DEFAULT 'Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',
  `status` enum('belum',' terkirim') NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "schedule"
#

INSERT INTO `schedule` VALUES (1,'','2019-07-06','22:45','0821xxxxx','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',''),(2,'','2019-07-06','22:07','12345','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',''),(3,'','2019-07-06','22:37','081284021663','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',' terkirim'),(4,'C00017','2019-07-19','10:00','12331','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(5,'C00017','2019-07-19','10:00','23','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(6,'C00018','2019-07-17','10:00','08121','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(7,'C00018','2019-07-17','10:00','234','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(8,'C00019','2019-07-16','10:00','12331','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(9,'C00019','2019-07-16','10:00','23','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(10,'C00020','2019-07-22','10:00','12331','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(11,'C00020','2019-07-22','10:00','23','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(12,'C00020','2019-07-22','10:00','12331','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum'),(13,'C00020','2019-07-22','10:00','23','Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB','belum');

#
# Structure for table "sentitems"
#

DROP TABLE IF EXISTS `sentitems`;
CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

/*!40000 ALTER TABLE `sentitems` DISABLE KEYS */;
INSERT INTO `sentitems` VALUES ('2019-07-06 22:05:21','2019-07-06 22:05:04','2019-07-06 22:05:21',NULL,'004D006F0068006F006E0020006B0065006800610064006900720061006E002000420070006B002F00490062007500200075006E00740075006B0020006B006F006E00740072006F006C0020006200650073006F006B0020006400690020006B006C0069006E0069006B0020004A0061006B0061007200740061002000520065007300700069007200610074006F00720079002000430065006E0074006500720020002D0020004B00680075007300750073002000540042','081284021663','Default_No_Compression','','+6281100000',-1,'Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',1,'',1,'SendingOKNoReport',-1,177,255,'',-1),('2019-07-06 22:07:31','2019-07-06 22:07:03','2019-07-06 22:07:31',NULL,'004D006F0068006F006E0020006B0065006800610064006900720061006E002000420070006B002F00490062007500200075006E00740075006B0020006B006F006E00740072006F006C0020006200650073006F006B0020006400690020006B006C0069006E0069006B0020004A0061006B0061007200740061002000520065007300700069007200610074006F00720079002000430065006E0074006500720020002D0020004B00680075007300750073002000540042','12345','Default_No_Compression','','+6281100000',-1,'Mohon kehadiran Bpk/Ibu untuk kontrol besok di klinik Jakarta Respiratory Center - Khusus TB',2,'',1,'SendingOKNoReport',-1,178,255,'',-1);
/*!40000 ALTER TABLE `sentitems` ENABLE KEYS */;
