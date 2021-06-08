-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jul 2020 pada 14.41
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ukm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_testing`
--

CREATE TABLE `tb_data_testing` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `minat` varchar(50) DEFAULT NULL,
  `bakat` varchar(50) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `kelas_hasil` varchar(50) DEFAULT NULL,
  `nilai_wirausaha` double DEFAULT NULL,
  `nilai_kemanusiaan` double DEFAULT NULL,
  `nilai_senior` double DEFAULT NULL,
  `nilai_mapala` double DEFAULT NULL,
  `nilai_persma` double DEFAULT NULL,
  `nilai_bahasa` double DEFAULT NULL,
  `nilai_pramuka` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_testing`
--

INSERT INTO `tb_data_testing` (`id`, `jurusan`, `prodi`, `minat`, `bakat`, `hobi`, `label`, `kelas_hasil`, `nilai_wirausaha`, `nilai_kemanusiaan`, `nilai_senior`, `nilai_mapala`, `nilai_persma`, `nilai_bahasa`, `nilai_pramuka`) VALUES
(1, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Lainnya', 'Nonton', 'Bahasa', 'Persma', 0, 0, 0, 0, 9.8337155963303, 0, 0),
(2, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa', 'Persma', 0, 0, 0, 0, 8.256880733945, 0, 0),
(3, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Bahasa', 'Belajar bahasa asing baru', 'Bahasa', 'Bahasa', 0, 0, 2.0762512443263, 0, 0, 2.1519319325664, 0),
(4, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa', 'Persma', 0, 0, 0, 0, 1.1009174311927, 0, 0),
(5, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa', 'Persma', 0, 0, 0, 0, 2.2935779816514, 0, 0),
(6, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Olahraga', 'Bahasa', 'Persma', 0, 0, 0, 0, 1.0321100917431, 0, 0),
(7, 'Teknik Mesin', 'Teknik Manufaktur', 'Seni', 'Olahraga', 'Olahraga', 'Bahasa', 'SENIOR (senior, bola, karate, taekwondo)', 2.4128702716326, 0, 5.4546452443534, 0, 0, 1.936005126151, 0),
(8, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Bahasa', 'Membaca', 'Bahasa', 'Wirausaha', 7.3608629086605, 0, 4.9214844309956, 0, 2.5802752293578, 2.4553115409574, 0),
(9, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Nonton', 'Bahasa', 'Persma', 0, 0, 0, 0, 3.4403669724771, 0, 0),
(10, 'Teknik Mesin', 'Teknik Manufaktur', 'Seni', 'Olahraga', 'Olahraga', 'Bahasa', 'SENIOR (senior, bola, karate, taekwondo)', 2.4128702716326, 0, 5.4546452443534, 0, 0, 1.936005126151, 0),
(11, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Travelling', 'Bahasa', 'SENIOR (senior, bola, karate, taekwondo)', 0, 4.7203251034546, 9.3888081268433, 0, 0, 2.1747554530634, 0),
(12, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Seni', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'Bahasa', 3.7436047850785, 3.731482295221, 5.3828735964014, 0, 0, 6.2393799158446, 0),
(13, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Nonton', 'Bahasa', 'Persma', 0, 0, 0, 0, 8.6009174311927, 0, 0),
(14, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Bahasa', 'Membaca', 'Bahasa', 'Kemanusiaan (ksr, humaniora)', 1.7758725199216, 6.8659274232067, 3.875668989409, 0, 4.1284403669725, 0.00025600715, 0),
(15, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Bahasa', 'Desain grafis', 'Bahasa', 'Wirausaha', 2.6907159392752, 0, 1.3564841462932, 0, 0, 1.4173406228585, 0),
(16, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa', 'Persma', 0, 0, 0, 0, 6.8807339449541, 0, 0),
(17, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Kemanusiaan', 'Lainnya', 'Travelling', 'Bahasa', 'Bahasa', 0, 0, 2.5030362223266, 0, 0, 8.913399879778, 0),
(18, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Seni', 'Memasak', 'Bahasa', 'Bahasa', 6.7516497237138, 1.3713197434937, 3.1374463247597, 0, 0, 8.3468874960153, 0),
(19, 'Akuntansi', 'Akuntansi', 'Jurnalistik', 'Bahasa', 'Memasak', 'Bahasa', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 2.4607422154978, 0, 0, 1.5283607475614, 0),
(20, 'Akuntansi', 'Akuntansi', 'Bahasa', 'Seni', 'Menari', 'Bahasa', 'Persma', 0, 0, 0, 0, 5.7339449541284, 0, 0),
(21, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Bulu Tangkis', 'Bahasa', 'Kemanusiaan (ksr, humaniora)', 0, 7.4023280031447, 2.4222931183806, 0, 0, 3.037158477554, 0),
(22, 'Teknik Kimia', 'Analisis Kimia', 'Olahraga', 'Olahraga', 'Nonton', 'Kemanusiaan (ksr, humaniora)', 'SENIOR (senior, bola, karate, taekwondo)', 3.15866653741, 2.1549310254901, 5.9611480170434, 0, 0, 3.3094104720529, 0),
(23, 'Teknik Mesin', 'Teknik Konversi Energi', 'Kemanusiaan', 'Olahraga', 'Futsal', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 0, 0, 2.1136750321869, 0, 0, 7.9780431022705, 0),
(25, 'Teknik Elektro', 'Teknik Elektronika', 'Seni', 'Seni', 'Memasak', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 2.1301501185928, 3.2184034796281, 0, 0, 0, 3.7795749942894, 0),
(26, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Seni', 'Mendengar Musik', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 0, 2.5747227837025, 1.0765747192803, 0, 0, 6.425277490292, 0),
(27, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Menulis', 'Kemanusiaan (ksr, humaniora)', 'Persma', 0, 0, 0, 0, 6.8807339449541, 0, 0),
(28, 'Teknik Kimia', 'Analisis Kimia', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 1.2160866169028, 0.0001206761374, 1.4493771649282, 0, 0, 9.2190720292903, 0),
(29, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 4.5603248133856, 0.0002943766382, 0.000343273539, 4.7782874617737, 2.9501146788991, 6.8666191666438, 1.7911115017061),
(30, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Wirausaha', 5.7551424256719, 0.000103632592, 0.000264320625, 0, 0, 0, 0),
(31, 'Teknik Mesin', 'Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 3.4329637116033, 2.5837793262727, 0, 0, 0, 0),
(32, 'Teknik Elektro', 'Teknik Listrik', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 1.8498672082517, 4.2482925931091, 1.3745706015771, 1.7697360969532, 0.0001211009174, 8.4815462669471, 0),
(33, 'Teknik Elektro', 'Teknik Listrik', 'Kesehatan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 1.6648804874265, 0.0003186219444, 0.0004261168864, 0, 1.1009174311927, 3.9580549245753, 0),
(34, 'Teknik Elektro', 'Teknik Listrik', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Wirausaha', 7.1939280320898, 0.0003108977761, 0.0003364080682, 5.3092082908597, 1.9266055045872, 3.9483060208202, 0),
(35, 'Teknik Elektro', 'Teknik Listrik', 'Pecinta Alam', 'Seni', 'Olahraga', 'Pecinta Alam (MAPALA)', 'Bahasa', 6.1662240275056, 5.7931262633306, 1.9292218969503, 0, 3.0275229357798, 9.3589476049071, 0),
(36, 'Teknik Mesin', 'Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)', 'Kemanusiaan (ksr, humaniora)', 0, 6.567408839589, 4.7728145888092, 2.1236833163439, 0, 3.5457969343424, 0),
(37, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Membaca', 'Persma', 'Bahasa', 2.3453099040269, 1.0056344785621, 0.000357668881, 0, 1.6857798165138, 6.4297117742743, 0),
(38, 'Teknik Elektro', 'Teknik Listrik', 'Pramuka', 'Seni', 'Jalan-Jalan', 'Persma', 'Bahasa', 9.1932794591901, 1.4482815658327, 0, 0, 0, 9.5989206204176, 0),
(39, 'Teknik Elektro', 'Teknik Listrik', 'Jurnalistik', 'Olahraga', 'Membaca', 'Persma', 'SENIOR (senior, bola, karate, taekwondo)', 0, 3.1862194448319, 6.8728530078853, 0, 0, 3.6970842702077, 0),
(40, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Bahasa', 'Menulis', 'Persma', 'Bahasa', 0, 2.19411158959, 1.3841674962175, 0, 0, 9.7815087843929, 0),
(41, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Bahasa', 'Menulis', 'Persma', 'Bahasa', 0, 2.19411158959, 1.3841674962175, 0, 0, 9.7815087843929, 0),
(42, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Futsal', 'Pramuka', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 9.6891724735225, 0, 0, 1.518579238777, 0),
(43, 'Teknik Mesin', 'Teknik Mekatronika', 'Olahraga', 'Seni', 'Membaca', 'Pramuka', 'Persma', 0, 5.5972234428315, 0, 0, 8.6009174311927, 1.1085709955645, 0),
(44, 'Teknik Mesin', 'Teknik Mekatronika', 'Pramuka', 'Olahraga', 'Membaca', 'Pramuka', 'Kemanusiaan (ksr, humaniora)', 0, 4.1046305247431, 0, 0, 0, 2.0092849294607, 0),
(45, 'Teknik Sipil', 'Teknik Konstruksi', 'Olahraga', 'Seni', 'Menyanyi', 'Pramuka', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 4.8804720607373, 0, 0, 0, 0),
(46, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)', 'Wirausaha', 8.4084873102348, 0, 0.0002628866275, 0, 0, 2.1747554530634, 0),
(47, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 6.2592054178955, 0, 0, 1.6310665897975, 0),
(49, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 6.2592054178955, 0, 0, 1.6310665897975, 0),
(50, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 7.3994688330067, 2.3601625517273, 0.0005007364334, 0, 5.5045871559633, 9.2427106755193, 0),
(51, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)', 'Kemanusiaan (ksr, humaniora)', 2.2422632827293, 6.4368069592563, 1.2918896631363, 0, 0, 0.0001133872498, 0),
(52, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 6.2592054178955, 0, 0, 1.6310665897975, 0),
(53, 'Teknik Elektro', 'Teknik Listrik', 'Wirausaha', 'Lainnya', 'Menulis', 'SENIOR (senior, bola, karate, taekwondo)', 'Kemanusiaan (ksr, humaniora)', 0, 2.2206984009434, 1.0173631097199, 2.1236833163439, 1.605504587156, 1.0123861591847, 0),
(54, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 5.0450923861409, 1.6049105351746, 6.1364758998976, 0, 0, 4.1592198039837, 0),
(55, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)', 'Persma', 6.7267898481879, 3.2184034796281, 4.3062988771211, 0, 9.1743119266055, 0.0002645702496, 0),
(56, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 6.2592054178955, 0, 0, 1.6310665897975, 0),
(57, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 1.681697462047, 0, 0.000375552325, 0, 0, 5.4368886326584, 0),
(58, 'Teknik Mesin', 'Teknik Konversi Energi', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 2.9246912383426, 5.5972234428315, 2.3923882650673, 0, 0, 8.6272907478345, 0),
(59, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Seni', 'Mendengar Musik', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 0, 0, 2.7341580172198, 0, 0, 2.9344526353179, 0),
(60, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Bela Diri', 'Olahraga', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 0, 0, 1.7045766388604, 0, 0, 2.3934129306811, 0),
(61, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Seni', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)', 'Wirausaha', 2.8028291034116, 2.4620786619155, 2.4115273711878, 0, 0, 2.159757139594, 0),
(62, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)', 'Kemanusiaan (ksr, humaniora)', 1.7938106261834, 4.1034644365259, 3.7895430118666, 0, 0, 0, 0),
(63, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 4.6005393179128, 0, 6.233880279261, 0, 0, 1.7285760054919, 0),
(64, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 3.0991978155637, 2.2388893771326, 2.6794748568754, 0, 6.8807339449541, 6.9839972720565, 0),
(65, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'Wirausaha', 6.4343207243536, 1.7444679730158, 2.1818580977414, 0, 0, 1.2445747239542, 0),
(66, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Lainnya', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)', 'Wirausaha', 6.514749733408, 2.102690273357, 2.768334992435, 0, 2.9501146788991, 3.7713585269105, 0),
(67, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Lainnya', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 2.9612498788218, 0, 7.0592542307093, 0, 0, 3.5213431623814, 0),
(69, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 1.681697462047, 0, 8.7628875850538, 0, 0, 2.1747554530634, 0),
(70, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 1.109920324951, 0.000320982107, 4.9091807199181, 0, 0, 1.8023285817263, 0),
(71, 'Teknik Sipil', 'Teknik Sipil', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 4.3062988771211, 0, 0, 0, 0),
(72, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'Pramuka', 3.257374866704, 0.0003574573464, 1.107333996974, 0, 0, 1.3733238333288, 8.9555575085305),
(73, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)', 'Wirausaha', 5.3302497818793, 0, 0.0002682516607, 0, 0, 3.7821833966319, 0),
(74, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Nonton', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 5.2567256833926, 8.305004977305, 0, 4.9168577981651, 2.464940213667, 0),
(75, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 3.7011640015724, 7.9935672906561, 0, 0, 0, 0),
(76, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha', 'Bahasa', 0, 8.5824092790084, 9.0432276419543, 0, 1.204128440367, 9.3535677750757, 0),
(77, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Seni', 'Bermain Musik', 'Wirausaha', 'Kemanusiaan (ksr, humaniora)', 0, 4.8276052194422, 4.2632358883499, 0, 0, 0, 0),
(78, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Lainnya', 'Menyanyi', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 7.0436313990083, 8.5824092790084, 9.4200287937024, 0, 8.0275229357798, 2.4264255228285, 0),
(79, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Menari', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 1.3713197434937, 1.661000995461, 0, 1.4048165137615, 1.2520331244023, 0),
(80, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Lainnya', 'Memasak', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 2.2304832763526, 1.7164818558017, 9.4200287937024, 0, 0, 6.9326443509385, 0),
(81, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha', 'Bahasa', 0, 0, 4.6138916540583, 0, 0, 8.2531480368315, 0),
(82, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Bulu Tangkis', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 9.2277833081167, 0, 0, 8.2531480368315, 0),
(83, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha', 'Bahasa', 0, 0, 1.661000995461, 0, 1.0034403669725, 4.1265740184158, 0),
(84, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha', 'Kemanusiaan (ksr, humaniora)', 0, 8.5824092790084, 5.6520172762215, 0, 0, 1.1004197382442, 0),
(85, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Olahraga', 'Wirausaha', 'Bahasa', 1.109920324951, 1.8881300413818, 0.0002503682167, 0, 5.5045871559633, 6.0077619390875, 0),
(86, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha', 'Pramuka', 0, 0, 3.2809896206637, 0, 2.8669724770642, 1.1411760248458, 3.5822230034122),
(87, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha', 'Pramuka', 0, 0, 2.9528906585973, 0, 3.0103211009174, 2.3383919437689, 7.1644460068244),
(88, 'Teknik Elektro', 'Teknik Elektronika', 'Olahraga', 'Lainnya', 'Sepak Bola', 'Wirausaha', 'Wirausaha', 4.6713818390194, 0, 0, 0, 0, 2.5309653979617, 0),
(89, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Bahasa', 'Membaca', 'Wirausaha', 'Pramuka', 0, 0, 1.1811562634389, 0, 1.2901376146789, 1.2991066354272, 4.7762973378829),
(90, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari', 'Wirausaha', 'Persma', 1.5695842979105, 6.4368069592563, 3.875668989409, 0, 9.1743119266055, 0.0001133872498, 0),
(91, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha', 'Kemanusiaan (ksr, humaniora)', 0, 6.8565987174686, 1.8455566616233, 0, 1.4048165137615, 2.9214106236053, 3.5822230034122),
(92, 'Teknik Mesin', 'Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Volly', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 3.4329637116033, 8.0743103946021, 0, 0, 0, 0),
(93, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Seni', 'Main Game', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 5.0240153566413, 0, 1.1467889908257, 3.260502928131, 0),
(94, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Lainnya', 'Desain grafis', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 1.5987134581312, 0, 0, 0, 0),
(95, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menggambar', 'Wirausaha', 'Bahasa', 1.7767499272931, 2.7426394869875, 1.2303711077489, 0, 2.8096330275229, 7.8878086837344, 0),
(96, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Fotografi', 'Wirausaha', 'Persma', 0, 0, 1.0381256221631, 0, 9.8337155963303, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data_testing`
--
ALTER TABLE `tb_data_testing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data_testing`
--
ALTER TABLE `tb_data_testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
