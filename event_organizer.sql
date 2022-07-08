# Host: localhost  (Version 5.5.5-10.4.20-MariaDB)
# Date: 2022-07-06 21:37:57
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "jenis_kegiatan"
#

DROP TABLE IF EXISTS `jenis_kegiatan`;
CREATE TABLE `jenis_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "jenis_kegiatan"
#

INSERT INTO `jenis_kegiatan` VALUES (1,'Seminar'),(2,'Workshop'),(3,'Event Olah Raga'),(4,'Bazaar'),(5,'Pelatihan');

#
# Structure for table "kategori_peserta"
#

DROP TABLE IF EXISTS `kategori_peserta`;
CREATE TABLE `kategori_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "kategori_peserta"
#

INSERT INTO `kategori_peserta` VALUES (1,'Pelajar'),(2,'Mahasiswa'),(3,'Karyawan Swasta'),(4,'Guru/Dosen'),(5,'Umum'),(6,'ASN');

#
# Structure for table "kegiatan"
#

DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `harga_tiket` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `narasumber` varchar(200) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `foto_flyer` varchar(150) DEFAULT NULL,
  `jenis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produk_jenis_produk_idx` (`jenis_id`),
  CONSTRAINT `fk_produk_jenis_produk` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "kegiatan"
#

INSERT INTO `kegiatan` VALUES (1,'Seminar Sukses Kuliah di Luar Negeri',100,25000,'2022-06-30','Dr. Seto Waluyo, Dr. Annisa PhD, Misna Azqia M.Kom','Aula Kampus B2 STT-NF','ahmad fathan','seminar1.png',5),(2,'wkwk 1',501,200001,'2022-07-09','hotma sitompul','blok m','sony wakwaw','1656993239640628296e5d6ba71daa2d906bb4d6d4.gif',2);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','202cb962ac59075b964b07152d234b70','admin@gmail.com','2022-06-12 07:07:42','2022-06-12 07:07:42',1,'administrator'),(2,'aminah','90b74c589f46e8f3a484082d659308bd','aminah@gmail.com','2022-06-12 07:07:44','2022-06-12 07:07:44',0,'public'),(5,'ilham','202cb962ac59075b964b07152d234b70','ilham@gmail.com','2022-07-06 14:37:51',NULL,1,'public');

#
# Structure for table "daftar"
#

DROP TABLE IF EXISTS `daftar`;
CREATE TABLE `daftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` date DEFAULT NULL,
  `alasan` varchar(200) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `kategori_peserta_id` int(11) NOT NULL,
  `nosertifikat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesanan_users1_idx` (`users_id`),
  KEY `fk_pesanan_produk1_idx` (`kegiatan_id`),
  KEY `fk_daftar_kategori_peserta1_idx` (`kategori_peserta_id`),
  CONSTRAINT `fk_daftar_kategori_peserta1` FOREIGN KEY (`kategori_peserta_id`) REFERENCES `kategori_peserta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesanan_produk1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesanan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "daftar"
#

INSERT INTO `daftar` VALUES (3,'2022-06-12','ingin kuliah di luar negeri',2,1,2,'S-2022-VI-001'),(5,'2022-07-06','pengen aja',5,2,2,NULL);
