-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 05:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblatasan`
--

CREATE TABLE `tblatasan` (
  `id_atasan` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `nip_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblatasan`
--

INSERT INTO `tblatasan` (`id_atasan`, `id_departemen`, `id_kantor`, `nip_karyawan`) VALUES
(2, 2, 1, 97253),
(9, 1, 1, 20050001),
(18, 2, 5, 12344),
(27, 3, 1, 56356),
(28, 2, 2, 201689898),
(29, 6, 1, 201592789),
(30, 5, 1, 1083078),
(31, 7, 1, 1085068),
(32, 4, 1, 1093110),
(33, 2, 3, 1083057),
(34, 2, 4, 1084040),
(35, 2, 2, 1084005),
(36, 2, 5, 1086097),
(37, 2, 1, 1082006),
(38, 3, 1, 1093111),
(39, 1, 1, 1075010),
(40, 1, 1, 1078001);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartemen`
--

CREATE TABLE `tbldepartemen` (
  `id_departemen` int(11) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartemen`
--

INSERT INTO `tbldepartemen` (`id_departemen`, `departemen`) VALUES
(1, 'Direksi'),
(2, 'Kredit'),
(3, 'Operasional'),
(4, 'IT'),
(5, 'SKH'),
(6, 'Accounting'),
(7, 'Audit Internal');

-- --------------------------------------------------------

--
-- Table structure for table `tbljabatan`
--

CREATE TABLE `tbljabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljabatan`
--

INSERT INTO `tbljabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Direktur'),
(2, 'Manager '),
(3, 'Team Leader / Kabag'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tblkantor`
--

CREATE TABLE `tblkantor` (
  `id_kantor` int(11) NOT NULL,
  `kantor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkantor`
--

INSERT INTO `tblkantor` (`id_kantor`, `kantor`) VALUES
(1, 'Kantor Pusat Jodoh'),
(2, 'Batu Aji'),
(3, 'Penuin'),
(4, 'Botania'),
(5, 'Mitra Raya');

-- --------------------------------------------------------

--
-- Table structure for table `tblkaryawan`
--

CREATE TABLE `tblkaryawan` (
  `nama_karyawan` varchar(100) NOT NULL,
  `nip_karyawan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `sisa_cuti` varchar(12) NOT NULL,
  `tgl_masuk` varchar(20) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `foto_karyawan` varchar(1000) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_karyawan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkaryawan`
--

INSERT INTO `tblkaryawan` (`nama_karyawan`, `nip_karyawan`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `email`, `jenis_kelamin`, `id_jabatan`, `id_departemen`, `sisa_cuti`, `tgl_masuk`, `id_kantor`, `parent_id`, `foto_karyawan`, `level`, `password`, `status_karyawan`) VALUES
('Elly Utami', '1075010', 'Surabaya', '1975-04-23', 'Central SukaJadi Blok F No 25', '0811778919', 'ellyutami.sb@gmail.com', 'Pria', 1, 1, '10', '2005-05-03', 1, 0, 'WANITA.png', 1, 'd2a844963bf8156165ffd9a36a484222', 0),
('Sumantri', '1078001', 'Urung Kundur', '1978-02-10', 'Boaanavista', '0822 3746 2723', 'sumantri@gmail.com', 'Pria', 2, 1, '10', '2005-03-01', 1, 0, 'selfie.jpg', 1, 'd9ebf3e1ca4166d5f0d03834c790eabc', 0),
('Budi', '1082006', 'Selatpanjang', '1982-03-09', 'Baloi Mas', '081254769822', 'budialong@yahoo.com', 'Pria', 2, 2, '9', '2007-03-01', 1, 0, 'IMG_0992.jpg', 1, '0ee6552e5410c605e62074c2e5b9845e', 0),
('Herwati', '1083057', 'Urung Kundur', '1985-06-07', 'Komp Tanjung Pantun Blok G No 12', '08116765456', 'herwati@gmail.com', 'Wanita', 2, 2, '9', '2008-02-07', 3, 20050001, 'WANITA.png', 1, 'f62ac8f8286737eacdd6a3a3ae7fa976', 0),
('Roni Jaya Putra', '1083078', 'Medan', '1983-06-18', 'Perum Cendana Tahap V Blok H No 05', '08127689001', 'roni_jp@gmail.com', 'Pria', 2, 5, '9', '2007-02-16', 1, 20050001, 'PRIA.png', 1, '8400f9f157d43806d4203471a1334247', 0),
('Medi ', '1084005', 'Selatpanjang', '1984-08-08', 'Central SukaJadi Blok A No 2', '08119898007', 'mediciang@gmail.com', 'Pria', 2, 2, '9', '2007-05-10', 2, 20050001, 'PRIA.png', 1, '91cba2b33aaa022ca04e7b9ae7fb1f56', 0),
('Hermawan', '1084040', 'Urung Kundur', '1984-05-10', 'Boanavista Blok C No 12', '08114524387', 'hermawan@gmail.com', 'Pria', 2, 2, '9', '2005-12-28', 4, 20050001, 'PRIA.png', 1, '5a49cbb99c68a257293b1c3da5512f4a', 0),
('Silvi Desniati', '1085068', 'Tanjung Balai Karimun', '1985-02-07', 'Baloi View Blok C No 1', '081256478987', 'silviidesnianti@gmail.com', 'Wanita', 2, 7, '9', '2009-01-15', 1, 20050001, 'WANITA.png', 1, '99c9f209cb95a7cb44f5843ca5e6275b', 0),
('Serly', '1086097', 'Kalimantan', '1986-04-01', 'Baloi Mas', '0878 6587 6543', 'serly@yahoo.com', 'Wanita', 2, 2, '9', '2007-04-01', 5, 20050001, 'WhatsApp Image 2018-03-31 at 12.18.59.jpeg', 1, '846383a73adec0fdc7efcf121f997a01', 0),
('Darmo Toto Hasibuan', '1087085', 'Medan', '1987-07-06', 'Taman Putri Hijau Blok C No 34', '081267541236', 'darmohasibuan@gmail.com', 'Pria', 4, 5, '8', '2012-09-07', 1, 1083078, 'PRIA.png', 1, '937b795f722d94673cb0160964f5e9b8', 0),
('Abdi Brian', '1089053', 'Padang', '1989-12-01', 'Baloi Mas Blok E No 3A', '081156409898', 'abdibrian@gmail.com', 'Pria', 4, 5, '8', '2012-08-07', 1, 1083078, 'PRIA.png', 1, 'ee118ff823287c27ea1fa2aaf3f72820', 0),
('Dino', '1089100', 'Batam', '1989-04-01', 'Lotus Garden Blok C no 1', '081278652345', 'hendraweii1997@gmail.com', 'Pria', 3, 2, '8', '2008-04-02', 1, 20050001, 'j7pro.jpg', 1, '3de70b68a5401a99a46ba94df88d5b3c', 0),
('Elvira', '1090055', 'Batam', '1990-08-19', 'Tiban Centre Blok G No 7', '085689762534', 'elvira_girl@gmail.com', 'Wanita', 3, 3, '9', '2009-05-03', 5, 20050001, 'WANITA.png', 1, '9557954dbfb4f9c6ecdbbe3fa4410794', 0),
('Martin', '1090065', 'Dabo Singkep', '1990-09-15', 'Glory Home Blok D No 23', '082187890987', 'martinzz@gmail.com', 'Pria', 3, 2, '9', '2011-06-18', 5, 20050001, 'PRIA.png', 1, 'a0e02331937edde89d5e92459dd6a284', 0),
('Chindy Dhesy', '1090132', 'Manado', '1990-07-05', 'Taman Putri Hijau Blok A No 09', '082276546767', 'chindy.dhesyy@gmail.com', 'Wanita', 4, 3, '6', '2017-07-05', 2, 0, 'WANITA.png', 1, '2b271628000511ca47162949ca0836a8', 0),
('Perta Hasibuan', '1090170', 'Medan', '1990-03-16', 'Bengkong Sadai Blok G No 01', '085687967623', 'perta_hasibun@gmail.com', 'Pria', 4, 5, '8', '2013-02-15', 1, 1083078, 'PRIA.png', 1, '4c6112a37375a5a414f355e9d0536d5d', 0),
('Sumarno', '1091074', 'Rangsang', '1992-05-20', 'Glory Point Blok B No 25', '085278785432', 'sumarno@gmail.com', 'Pria', 3, 2, '9', '2011-05-31', 2, 20050001, 'PRIA.png', 1, 'f8e2b80f5f3777dc68ca71944f332f89', 0),
('Merry', '1091085', 'Tanjung Pinang', '1991-02-09', 'Kaktus Garden Blok H No 3', '087865432134', 'merrysb@gmail.com', 'Wanita', 3, 3, '9', '2008-06-09', 3, 20050001, 'WANITA.png', 1, 'c4889d872d49eacd8e1d88ea3a6eb8f1', 0),
('Siska', '1091088', 'Batam', '1991-08-01', 'Hawai Garden Blok C No 41', '08117689876', 'siskasb@gmail.com', 'Wanita', 3, 2, '8', '2009-03-01', 4, 20050001, 'WANITA.png', 1, '1f12added02d612fd0cf9d928a077588', 0),
('Tanria Regina', '1092075', 'Batam', '1992-12-16', 'Botania Garden Tahap II Blok C No 9', '087898765678', 'tanria.regina@gmail.com', 'Wanita', 4, 3, '8', '2015-09-08', 1, 56356, 'WANITA.png', 1, '274573ea1b8f44a564a39a747bc674cb', 0),
('Netty Angraini', '1092138', 'Batam', '1992-02-14', 'Komp Tanjung Pantun Blok C No 2', '087876547876', 'netty1992@gmail.com', 'Wanita', 4, 7, '6', '2009-10-23', 1, 1085068, 'WANITA.png', 1, '49ed14bb56059733942ecd9e77215c13', 0),
('Haryanto', '1093077', 'Selatpanjang', '1993-08-01', 'Bumi Indah Blok F No 8', '082278987654', 'haryanto93@gmail.com', 'Pria', 3, 2, '6', '2011-03-12', 3, 20050001, 'PRIA.png', 1, 'dc721008ab17a8372b35f573e1b65efb', 0),
('Herlina', '1093089', 'Batam', '1993-05-09', 'Tiban Point Blok G No 4', '081278986543', 'herlina@gmail.com', 'Wanita', 3, 3, '9', '2009-04-23', 4, 20050001, 'WANITA.png', 1, '36f8110fa2fe461ada268bbe42c284a0', 0),
('Yudhi Kho', '1093110', 'Batam', '1993-03-20', 'Bengkong Indah Blok C No 56', '085264538796', 'yudhi_kho@gmail.com', 'Pria', 2, 4, '9', '2012-02-03', 1, 20050001, 'PRIA.png', 1, 'f0e585257db3f25896ff54674491573d', 0),
('Anton', '1093111', 'Urung Kundur', '1993-04-04', 'Lotus', '0878 6587 6543', 'anton.s@gmail.com', 'Pria', 2, 3, '7', '2013-04-04', 1, 200500002, 'WhatsApp Image 2018-03-31 at 12.18.55 (1).jpeg', 1, '2b587ff97e3e5d453555ca385988ce1b', 0),
('Ferdy', '1094087', 'Selatpanjang', '1994-04-12', 'Mitra Raya Blok C No 8', '081278786567', 'fredymiracle@gmail.com', 'Pria', 4, 4, '3', '2014-05-07', 1, 1093110, 'PRIA.png', 1, 'f501a47c053a7a67ec3a59392dabce4e', 0),
('Leini Lestari', '1094094', 'Batam', '1994-05-02', 'Bellavista Blok E No 8', '081267565550', 'leini_lestari@gmail.com', 'Wanita', 4, 6, '8', '2015-09-07', 1, 201592789, 'WANITA.png', 1, '82d6c78dbb5325381335702113e4ac07', 0),
('Ansen', '1094120', 'Batam', '1994-06-12', 'Kintamani Blok G No 15', '08111230123', 'ansen1994@gmail.com', 'Pria', 4, 3, '8', '2016-08-23', 4, 0, 'PRIA.png', 1, '05d102fa34c5c1120ab1d288a4587a2a', 0),
('Rabu', '1094124', 'Selatpanjang', '1994-04-29', 'Baloi Mas', '081278652345', 'hendraweii1997@gmail.com', 'Pria', 4, 2, '8', '2018-04-04', 5, 12344, 'dc5ccad5bd921a27a657ecfada3f00de--live-life-anti-aging.jpg', 1, '71d4d0faf47e5220c3e736e29abf3ca0', 0),
('Angeline', '1095114', 'Tanjung Pinang', '1995-08-16', 'Taman Seruni Indah Blok C N0 17', '081223896745', 'angelinezhang@gmail.com', 'Wanita', 4, 7, '8', '2015-04-12', 1, 1085068, 'WANITA.png', 1, '480f046352ded7941b220e176444850a', 0),
('Aziz Pratama', '1095120', 'Urung Kundur', '1995-06-15', 'Muka Kuning Indah Blok B No 25', '085218889000', 'aziz_pratama@gmail.com', 'Pria', 4, 2, '8', '2015-02-26', 2, 201689898, 'PRIA.png', 1, '4404952966d3b5810fdf48e4c59bee0b', 0),
('Febrina', '1095121', 'Selatpanjang', '1995-05-22', 'Permata Baloi Blok E No 12', '085245453231', 'febrinagirll@gmail.com', 'Wanita', 4, 3, '4', '2016-02-27', 3, 0, 'WANITA.png', 1, '27de2395e1c1124188d03335bfa7071a', 0),
('Sinar', '1095122', 'Batam', '1995-07-20', 'Bengkong', '081254769822', 'sinar@gmail.com', 'Pria', 4, 2, '8', '2014-05-06', 1, 0, 'Xiaomi-Mi-5X.jpg', 1, 'e3124019ddf381323ab6e2395f8d5da0', 0),
('Brian Siregar', '1095123', 'Medan', '1995-05-12', 'Bengkong Indah Blok T No 12', '081278651256', 'briansiregarzz@gmail.com', 'Pria', 4, 2, '8', '2015-04-23', 4, 1084040, 'PRIA.png', 1, 'ce8e0919d4f47c76a7d05ee7ce191217', 0),
('Santo', '1095130', 'Batam', '1995-08-09', 'Griya Mas Blok E1 No 1', '08126754234', 'santo_chen@gmail.com', 'Pria', 4, 2, '3', '2015-07-08', 4, 1084040, 'PRIA.png', 1, '5a25f685088532a2e4790216fe1781aa', 0),
('Jacky', '1095178', 'Selatpanjang', '1995-10-14', 'Permata Baloi Blok F No 12', '085276768989', 'jacky_lie@gmail.com', 'Pria', 4, 4, '8', '2014-02-07', 1, 1093110, 'PRIA.png', 1, 'ab60edf4fe84d5894e9ef62b9dc1d254', 0),
('Della Sianturi', '1096128', 'Padang', '1996-08-20', 'Muka Kuning Indah Blok G No 2', '0811567987', 'dellasianturi@gmail.com', 'Wanita', 4, 3, '8', '2018-05-04', 2, 0, 'WANITA.png', 1, 'd6e009647d443f05ac50f6d2bb8ef714', 0),
('Micheal', '1096135', 'Batam', '1996-04-01', 'Baloi Mas', '0811 655 788', 'simple.fren@Yahoo.com', 'Pria', 4, 3, '8', '2016-04-02', 1, 20050001, 'WhatsApp Image 2018-03-31 at 12.18.57.jpeg', 1, 'e3543f973866db39ceb02c8fd63f219c', 0),
('Sari', '1096144', 'Selatpanjang', '1996-06-13', 'Baloi Impian Blok D No 8', '087898987654', 'sari@gmail.com', 'Wanita', 4, 6, '8', '2016-06-22', 1, 0, 'download.png', 1, '8f2702c79edf7a57ed7afb9635162e97', 0),
('Alvira Diana', '1096151', 'Selatpanjang', '1996-08-30', 'Boanavista Blok C No 12', '089678900987', 'alviradiana@gmail.com', 'Wanita', 4, 3, '8', '2016-07-05', 5, 0, 'WANITA.png', 1, '24bd240cd1df541c3c63d580d3995930', 0),
('Winson', '1096158', 'Tanjung Pinang', '1996-07-12', 'Taman Seruni Indah Blok C N0 17', '082254789762', 'winson.sb@gmail.com', 'Pria', 4, 2, '8', '2016-06-08', 3, 1083057, 'PRIA.png', 1, 'a9cd258f48cdcac4be0959ce1a6d64b9', 0),
('Fredy Septiadi', '1096167', 'Tanjung Pinang', '1996-01-29', 'Griya Mas Blok H1 No 8', '08117685426', 'fredy_septiadi@gmail.com', 'Pria', 4, 2, '8', '2017-02-09', 3, 1083057, 'PRIA.png', 1, '0cad483f569c84c7ffbcd4b312d452b3', 0),
('Yuli', '1096168', 'Tanjung Pinang', '1996-03-05', 'Boaanavista', '0878 6587 6543', 'yuli@gmail.com', 'Wanita', 4, 3, '8', '2018-04-05', 1, 20050003, 'WhatsApp Image 2018-03-31 at 12.18.52.jpeg', 1, 'a4ff94d8b38039a7db3d26437e7079ef', 0),
('Willy Wijaya Lius', '1097124', 'Tanjung Pinang', '1997-12-04', 'Anggrek Sari Blok D No 9', '087855439900', 'willywijayalius@gmail.com', 'Pria', 4, 6, '8', '2012-03-12', 1, 201592789, 'PRIA.png', 1, '4ec79a0970763cd9f60b317aef30b87b', 0),
('Vincent', '1097150', 'Batam', '1997-07-06', 'Mitra Raya Blok D No 2', '087865467898', 'vincent1997@gmail.com', 'Pria', 4, 3, '8', '2017-08-05', 5, 0, 'PRIA.png', 1, 'b1ce4f3feb3973bdd36cd382b1f9243c', 0),
('Hendra Wijaya', '1097154', 'Selatpanjang', '1997-08-17', 'Komp Lotus Garden Blok B No 03', '0852 7465 9896', 'hendrasb97@gmail.com', 'Pria', 4, 2, '8', '2016-07-12', 1, 0, 'HW_logo.png', 1, 'ff86411cd0701afb94cdf8fe2986a048', 0),
('Setiawan', '1097180', 'Tanjung Balai Karimun', '1997-02-08', 'Windsor Paradise Blok G No 9', '081267542341', 'setiawan97@gmail.com', 'Pria', 4, 2, '-5', '2017-02-17', 2, 201689898, 'PRIA.png', 1, '022aa48d8feb2ec6179f21ee46fbc47a', 0),
('Christoper', '1098157', 'Batam', '1998-03-24', 'Perum Regata Blok B7 No 8', '085787652343', 'christoperlee@gmail.com', 'Pria', 4, 2, '3', '2017-07-09', 5, 12344, 'PRIA.png', 1, '3f63650247896dc7aad45af1cda2a766', 0),
('Ernawati', '1098160', 'Selatpanjang', '1998-08-25', 'Permata Baloi Blok E No 12', '085274770056', 'ernawati98@gmail.com', 'Wanita', 4, 3, '5', '2016-05-06', 3, 0, 'WANITA.png', 1, '4235ccbae26e107a20f6fe5e3d4928e8', 0),
('Mega', '1099155', 'Urung Kundur', '1999-04-01', 'Anggrek Sari Blok C No 3', '081278652345', 'mega1999@gmail.com', 'Wanita', 4, 2, '8', '2018-04-01', 1, 200500002, 'WhatsApp Image 2018-03-31 at 12.18.56.jpeg', 1, '827ccb0eea8a706c4c34a16891f84e7b', 1),
('Nelly', '201592789', 'Medan', '1992-02-13', 'Tiban Impian Blok d No 9', '087867579876', 'nelly@gmail.com', 'Wanita', 2, 6, '9', '2015-02-12', 1, 20050001, 'download.png', 1, '7b9ed81d074aea058922384788690129', 0),
('Admin', 'sb001', 'Batam', '2018-03-01', 'Jodoh', '0811 655 788', 'admin@app.com', 'Pria', 2, 12, '9', '2018-03-01', 1, 0, 'f5.PNG', 2, '16fd7eed0b40e884aede77618498741b', 0),
('Super Admin', 'sb100', 'Batam', '2018-04-12', 'Jodoh', '081254769822', 'it@bprsb.com', 'Pria', 4, 4, '8', '2018-04-12', 1, 0, 'WhatsApp Image 2018-03-31 at 12.18.57.jpeg', 2, '0d07d0422d6ddf91c35a4817468f2ef8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpengajuan`
--

CREATE TABLE `tblpengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `pengajuan` varchar(100) NOT NULL,
  `kat_pengajuan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpengajuan`
--

INSERT INTO `tblpengajuan` (`id_pengajuan`, `pengajuan`, `kat_pengajuan`) VALUES
(1, 'Cuti Tahunan', 1),
(2, 'Cuti Pernikahan', 0),
(3, 'Cuti Pernikahan Anak Kandung', 0),
(4, 'Cuti baptis', 0),
(5, 'Istri Pegawai Melahirkan/Gugur', 0),
(6, 'Cuti Kematian Orang Tua/Mertua/Anak/Menantu', 0),
(7, 'Cuti Kematian Anggota Keluarga', 0),
(8, 'Cuti Melahirkan', 0),
(9, 'Izin', 2),
(10, 'Sakit', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `id_service` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `nip_karyawan` varchar(25) NOT NULL,
  `tgl_pengajuan` varchar(25) NOT NULL,
  `no_urgent` varchar(25) NOT NULL,
  `penganti` varchar(25) NOT NULL,
  `tgl_mulai` varchar(100) NOT NULL,
  `tgl_selesai` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_service` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `notif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`id_service`, `id_pengajuan`, `nip_karyawan`, `tgl_pengajuan`, `no_urgent`, `penganti`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status_service`, `bukti`, `notif`) VALUES
(3, 2, '97253', '2018-03-31', '344344', '96111', '2018-05-08', '2018-09-08', 'sfssdsd', 3, 'selfie.jpg', 0),
(5, 1, '96111', '2018-03-31', '08521212', '97253', '2018-04-02', '2018-04-03', 'Jalan - Jalan', 3, '', 1),
(6, 9, '97253', '2018-03-31', '08521212', '96111', '2018-03-01', '2018-03-19', 'assa', 1, '', 1),
(7, 1, '97253', '2018-03-31', '08521212', '96111', '2018-04-02', '2018-04-06', 'sed', 2, '', 1),
(8, 2, '96111', '2018-04-01', '344344', '97253', '2018-04-02', '2018-04-06', 'Nikah ', 2, 'WhatsApp Image 2018-03-31 at 12.18.59.jpeg', 1),
(9, 1, '97253', '2018-04-02', '08521212', '96111', '2018-04-03', '2018-04-05', 'Jalan - Jalan', 2, '', 1),
(10, 9, '97253', '2018-04-02', '08521212', '96111', '2018-04-02', '2018-04-03', 'Urusan Pribadi', 2, '', 1),
(11, 1, '96111', '2018-04-03', 'asas', '', '2018-04-02', '2018-04-01', 'sdasd', 2, '', 1),
(12, 1, '96111', '2018-04-03', '08521212', '56356', '2018-04-04', '2018-04-06', 'dasd', 2, '', 1),
(13, 1, '12343', '2018-04-03', '08521212', '12345', '2018-04-03', '2018-04-06', 'sda', 3, '', 1),
(14, 1, '12343', '2018-04-03', '12312', '', '2018-04-03', '2018-04-04', '123', 3, '', 1),
(15, 1, '12343', '2018-04-03', '231', '', '2018-04-04', '2018-04-05', 'we', 2, '', 1),
(16, 1, '98989', '2018-04-06', '344344', '', '2018-04-01', '2018-04-03', 'sda', 2, '', 1),
(17, 1, '98989', '2018-04-06', '123', '', '2018-04-04', '2018-04-04', '231', 2, '', 1),
(18, 9, '12345', '2018-04-06', '344344', '56356', '2018-04-06', '2018-04-06', 'wew', 3, '', 1),
(19, 1, '97253', '2018-04-06', '12313', '', '2018-04-01', '2018-04-03', 'qwe', 2, '', 1),
(20, 1, '12343', '2018-04-06', '344344', '', '2018-04-02', '2018-04-03', 'sda', 1, '', 1),
(21, 1, '12343', '2018-04-07', '344344', '', '2018-04-01', '2018-04-02', 'sad', 2, '', 1),
(22, 1, '12343', '2018-04-07', '344344', '', '2018-04-01', '2018-04-03', 'adf', 1, '', 1),
(23, 9, '56356', '2018-04-08', '08521212', '96111', '2018-04-09', '2018-04-12', 'qweqwe', 2, '', 1),
(24, 10, '56356', '2018-04-08', '08521212', '96111', '2018-04-09', '2018-04-09', 'sakit', 2, 'WhatsApp Image 2018-03-31 at 12.18.58.jpeg', 1),
(25, 9, '56356', '2018-04-08', '08521212', '96111', '2018-04-09', '2018-04-09', 'sada', 2, '', 1),
(26, 9, '97253', '2018-04-09', '344344', '', '2018-04-09', '2018-04-09', 'Nikah', 3, '', 1),
(27, 1, '96111', '2018-04-09', '213', '56356', '2018-04-10', '2018-04-12', 'asd', 1, '', 1),
(28, 1, '09877', '2018-04-09', '344344', '', '2018-04-01', '2018-04-02', 'sd', 1, '', 1),
(29, 1, '09877', '2018-04-09', '323', '', '2018-04-09', '2018-04-10', '2345', 1, '', 1),
(30, 1, '65657', '2018-04-09', '344344', '97253', '2018-04-09', '2018-04-11', 'Jalan', 0, '', 1),
(31, 10, '97253', '2018-04-09', '08521212', '65657', '2018-04-02', '2018-04-03', 'sakit', 2, '', 1),
(32, 1, '12343', '2018-04-10', '08521212', '', '2018-04-11', '2018-04-13', 'adsfg', 1, '', 1),
(33, 1, '12343', '2018-04-10', '23', '', '2018-04-10', '2018-04-12', 'sdfg', 3, '', 1),
(34, 1, '12343', '2018-04-10', '344344', '', '2018-04-18', '2018-04-06', 'sdf', 3, '', 1),
(35, 2, '96111', '2018-04-10', '08521212', '56356', '2018-04-10', '2018-04-12', 'dfgh', 1, '', 1),
(36, 9, '97253', '2018-04-21', '085274659896', '65657', '2018-04-23', '2018-04-23', 'Anak Sakit', 0, '', 1),
(37, 9, '98989', '2018-04-21', '085274659896', '', '2018-04-24', '2018-04-24', 'Temanin Keluarga', 2, '', 1),
(38, 1, '201697253', '2018-05-02', '085274659896', '56356', '2018-05-11', '2018-05-11', 'Acara Keluarga', 1, '', 1),
(39, 9, '98989', '2018-05-02', '085216779898', '', '2018-05-03', '2018-05-03', 'Sakit demam', 3, '', 1),
(40, 10, '201796083', '2018-05-02', '085216779898', '', '2018-05-03', '2018-05-04', 'sakit diare', 3, '', 1),
(41, 1, '201697253', '2018-05-15', '0852 7465 9896', '96111', '2018-05-15', '2018-05-15', 'Jalan-jalan', 2, '', 1),
(42, 9, '1095130', '2018-05-15', '085216779898', '', '2018-05-16', '2018-05-16', 'Orang Tua Sakit', 2, '', 1),
(43, 9, '1094120', '2018-05-15', '085216779898', '', '2018-05-15', '2018-05-17', 'Pulang Kampung', 3, '', 1),
(44, 10, '1094120', '2018-05-15', '085216779898', '', '2018-05-16', '2018-05-16', 'sakit diare', 2, 'mcsakit.jpg', 1),
(45, 9, '1092138', '2018-05-15', '085217890876', '', '2018-05-16', '2018-05-17', 'Acara Keluarga', 2, '', 1),
(46, 1, '1094087', '2018-05-16', '085245679900', '1095178', '2018-05-22', '2018-05-26', 'Jalan jalan', 2, '', 1),
(47, 1, '1095121', '2018-05-16', '081267898765', '1098160', '2018-05-08', '2018-05-11', 'Jalan - Jalan', 2, '', 1),
(48, 9, '1098160', '2018-05-16', '085216779898', '1095121', '2018-05-09', '2018-05-11', 'Acara Keluarga', 2, '', 1),
(49, 1, '1098157', '2018-05-16', '085178786540', '1094124', '2018-05-11', '2018-05-12', 'Cuti', 2, '', 1),
(50, 1, '1093077', '2018-05-16', '081256789801', '1083057', '2018-05-15', '2018-05-17', 'Jalan - Jalan', 2, '', 1),
(51, 1, '1097180', '2018-05-16', '087890908767', '1095120', '2018-05-15', '2018-05-17', 'Jalan-jalan', 2, '', 1),
(52, 1, '1086097', '2018-05-16', '456', '1090065', '2018-05-17', '2018-05-08', 'sd', 0, '', 1),
(53, 1, '1086097', '2018-05-16', '545', '1090065', '2018-05-09', '2018-05-01', 'rte', 0, '', 1),
(54, 9, '1098157', '2018-05-16', '085274659896', '1094124', '2018-05-17', '2018-05-17', 'Jalan', 2, '', 1),
(55, 10, '1098157', '2018-05-16', '085274659896', '1094124', '2018-05-08', '2018-05-08', 'sakit', 3, 'mcsakit.jpg', 1),
(56, 10, '1098157', '2018-05-16', '085216779898', '1094124', '2018-05-16', '2018-05-16', 'sakit', 2, 'mcsakit.jpg', 1),
(57, 1, '1098157', '2018-05-16', '085216779898', '1094124', '2018-05-16', '2018-05-02', 'sakit', 3, '', 1),
(58, 1, '1097180', '2018-05-18', '085216779898', '1095120', '2018-05-19', '2018-05-19', 'jalan-jalan', 1, '', 1),
(59, 9, '1097180', '2018-05-18', '085216779898', '1095120', '2018-05-19', '2018-05-19', 'Acara Keluarga', 2, '', 1),
(60, 10, '1097180', '2018-05-18', '085216779898', '1095120', '2018-05-22', '2018-05-22', 'diare', 3, 'mcsakit.jpg', 1),
(61, 1, '1097180', '2018-05-18', '085216779898', '1095120', '2018-05-19', '2018-05-19', '', 2, '', 1),
(62, 10, '1097180', '2018-05-18', '085216779898', '1095120', '2018-05-22', '2018-05-24', '', 2, '', 1),
(63, 1, '1098157', '2018-05-19', '085216779898', '1094124', '2018-05-22', '2018-05-23', '', 2, '', 1),
(64, 9, '1097180', '2018-05-19', '085216779898', '1095120', '2018-05-22', '2018-05-23', '', 2, '', 1),
(65, 1, '1095130', '2018-05-19', '085216779898', '1095123', '2018-05-22', '2018-05-25', 'jalan', 2, '', 1),
(66, 9, '1097180', '2018-05-20', '085216779898', '1095120', '2018-05-22', '2018-05-23', '', 2, '', 1),
(67, 10, '1097180', '2018-05-20', '085216779898', '1095120', '2018-05-24', '2018-05-24', 'sakit', 2, '', 1),
(68, 1, '1090132', '2018-05-20', '085216779898', '1096128', '2018-05-29', '2018-05-30', '', 2, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblatasan`
--
ALTER TABLE `tblatasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `tbldepartemen`
--
ALTER TABLE `tbldepartemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD UNIQUE KEY `head_departemen` (`id_departemen`);

--
-- Indexes for table `tbljabatan`
--
ALTER TABLE `tbljabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tblkantor`
--
ALTER TABLE `tblkantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indexes for table `tblkaryawan`
--
ALTER TABLE `tblkaryawan`
  ADD PRIMARY KEY (`nip_karyawan`);

--
-- Indexes for table `tblpengajuan`
--
ALTER TABLE `tblpengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblatasan`
--
ALTER TABLE `tblatasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbldepartemen`
--
ALTER TABLE `tbldepartemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbljabatan`
--
ALTER TABLE `tbljabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblkantor`
--
ALTER TABLE `tblkantor`
  MODIFY `id_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpengajuan`
--
ALTER TABLE `tblpengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
