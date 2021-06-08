-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Apr 2021 pada 13.42
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
-- Struktur dari tabel `hobi`
--

CREATE TABLE `hobi` (
  `id_hobi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_minat` int(10) NOT NULL,
  `nama_minat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hobi`
--

INSERT INTO `hobi` (`id_hobi`, `nama`, `id_minat`, `nama_minat`) VALUES
(11, 'Musik', 1, 'Seni'),
(12, 'Menari', 1, 'Seni'),
(21, 'Basket', 2, 'Olahraga'),
(22, 'Tenis Meja', 2, 'Olahraga'),
(23, 'Volly', 2, 'Olahraga'),
(24, 'Bulu Tangkis', 2, 'Olahraga'),
(25, 'Sepak Bola', 2, 'Olahraga'),
(31, 'Pro Climbing', 3, 'Pecinta Alam'),
(32, 'Mountaineering', 3, 'Pecinta Alam'),
(33, 'Caving', 3, 'Pecinta Alam'),
(41, 'Karate', 4, 'Bela Diri'),
(42, 'Taekwondo', 4, 'Bela Diri'),
(51, 'Menulis', 5, 'Jurnalistik'),
(61, 'Donor Darah', 6, 'Sosial'),
(62, 'Penanggulangan Bencana', 6, 'Sosial'),
(63, 'Keagamaan', 6, 'Sosial'),
(71, 'Bisnis', 7, 'Wirausaha'),
(81, 'Bahasa Inggris', 8, 'Bahasa'),
(82, 'Bahasa Korea', 8, 'Bahasa'),
(83, 'Bahasa Jepang ', 8, 'Bahasa'),
(91, 'Belajar Teknik Kepramukaan', 9, 'Pramuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Administrasi Niaga'),
(2, 'Akuntansi'),
(3, 'Teknik Elektro'),
(4, 'Teknik Kimia'),
(5, 'Teknik Mesin'),
(6, 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minat`
--

CREATE TABLE `minat` (
  `id_minat` int(10) NOT NULL,
  `nama_minat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minat`
--

INSERT INTO `minat` (`id_minat`, `nama_minat`) VALUES
(1, 'Seni'),
(2, 'Olahraga'),
(3, 'Pecinta Alam'),
(4, 'Bela Diri'),
(5, 'Jurnalistik'),
(6, 'Sosial'),
(7, 'Wirausaha'),
(8, 'Bahasa'),
(9, 'Pramuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama`, `id_jurusan`, `nama_jurusan`) VALUES
(11, 'Administrasi Bisnis', 1, 'Administrasi Niaga'),
(21, 'Akuntansi', 2, 'Akuntansi'),
(22, 'Akuntansi Manajerial', 2, 'Akuntansi'),
(31, 'Teknik Komputer dan Jaringan', 3, 'Teknik Elektro'),
(32, 'Teknik Multimedia dan Jaringan', 3, 'Teknik Elektro'),
(33, 'Teknik Telekomunikasi', 3, 'Teknik Elektro'),
(34, 'Teknik Listrik', 3, 'Teknik Elektro'),
(35, 'Teknik Elektronika', 3, 'Teknik Elektro'),
(41, 'Teknik Kimia', 4, 'Teknik Kimia'),
(42, 'Teknik Kimia Mineral', 4, 'Teknik Kimia'),
(43, 'Analisis Kimia ', 4, 'Teknik Kimia'),
(44, 'Teknologi Kimia Industri', 4, 'Teknik Kimia'),
(51, 'Teknik Mesin', 5, 'Teknik Mesin'),
(52, 'Teknik Manufaktur', 5, 'Teknik Mesin'),
(53, 'Teknik Pembangkit Energi', 5, 'Teknik Mesin'),
(54, 'Teknik Perawatan Alat ', 5, 'Teknik Mesin'),
(55, 'Teknik Otomotif', 5, 'Teknik Mesin'),
(56, 'Teknik Konversi Energi', 5, 'Teknik Mesin'),
(57, 'Teknik Mekatronika', 5, 'Teknik Mesin'),
(61, 'Teknik Sipil', 6, 'Teknik Sipil'),
(62, 'Teknik Konstruksi ', 6, 'Teknik Sipil'),
(63, 'Teknik Konstruksi Gedung', 6, 'Teknik Sipil'),
(64, 'Teknik Konstruksi Jalan dan Jembatan', 6, 'Teknik Sipil');

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
(1, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Bahasa', 'Membaca', 'Bahasa', 'Bahasa', 0, 3.9881524070391, 0.0001454858924, 0, 5.8824125342446, 6.7037180963048, 0),
(2, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Bahasa', 'Desain grafis', 'Bahasa', 'Bahasa', 0, 0, 1.469493301278, 0, 0, 2.3186977886042, 0),
(3, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Bahasa', 'Belajar bahasa asing baru', 'Bahasa', 'Bahasa', 0, 0, 1.6509037438955, 0, 0, 3.5490272274555, 0),
(4, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'Bahasa', 2.104069008558, 0, 1.9326396585665, 0, 0, 8.0917820785985, 0),
(5, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Lainnya', 'Menulis', 'Bahasa', 'Persma', 0, 0, 0, 0, 8.5785182791067, 0, 0),
(6, 'Teknik Mesin', 'Teknik Manufaktur', 'Olahraga', 'Olahraga', 'Membaca', 'Bahasa', 'Bahasa', 0, 0, 3.1791922383419, 0, 0, 4.4819143843866, 0),
(7, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Olahraga', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'SENIOR (senior, bola, karate, taekwondo)', 0, 1.9694579787848, 2.5231684431285, 0, 0, 1.0647081682366, 0),
(8, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'Bahasa', 2.104069008558, 0, 1.9326396585665, 0, 0, 8.0917820785985, 0),
(9, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Bahasa', 'Membaca', 'Bahasa', 'Bahasa', 0, 2.9778204639226, 4.2389229844558, 0, 1.8382539169514, 4.5048985607168, 0),
(10, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Bahasa', 'Menggambar', 'Bahasa', 'Bahasa', 0, 3.3086894043584, 2.9389866025561, 0, 3.0637565282524, 3.4780466829064, 0),
(11, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Kemanusiaan', 'Lainnya', 'Travelling', 'Bahasa', 'Bahasa', 0, 0, 2.5124315561364, 0, 0, 7.1183346104964, 0),
(12, 'Teknik Mesin', 'Teknik Konversi Energi', 'Olahraga', 'Lainnya', 'Main Game', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 0, 0, 7.6536109441564, 0, 0, 9.8865758479117, 0),
(13, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Kesehatan', 'Olahraga', 'Travelling', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 2.779299099661, 2.3088601787674, 0, 0, 2.2145929899322, 0),
(14, 'Teknik Mesin', 'Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 4.1414887782445, 2.0192505469689, 0, 0, 0, 0),
(15, 'Teknik Elektro', 'Teknik Listrik', 'Kemanusiaan', 'Olahraga', 'Main Game', 'Kemanusiaan (ksr, humaniora)', 'Persma', 3.1720166397925, 0, 6.3313275214638, 0, 7.148765232589, 1.2918459107938, 0),
(16, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Lainnya', 'Volly', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 2.1742816085784, 1.5919510763845, 0, 0, 0, 0),
(17, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Lainnya', 'Volly', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 2.1742816085784, 1.5919510763845, 0, 0, 0, 0),
(18, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Lainnya', 'Naik Gunung', 'Pecinta Alam (MAPALA)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 2.1742816085784, 3.3871299497543, 0, 0, 2.4545072305082, 0),
(19, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Olahraga', 'Menulis', 'Persma', 'Persma', 0, 0, 0, 0, 4.2892591395534, 0, 1.6353917464115),
(20, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Olahraga', 'Menulis', 'Persma', 'Persma', 0, 0, 0, 0, 5.4902516986283, 0, 2.0442396830144),
(21, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka', 'SENIOR (senior, bola, karate, taekwondo)', 1.665308735891, 4.9630341065376, 8.0521498734514, 0, 0, 1.3287557939593, 0),
(22, 'Teknik Mesin', 'Teknik Mekatronika', 'Pramuka', 'Lainnya', 'Membaca', 'Pramuka', 'Bahasa', 0, 0, 0, 0, 0, 2.2409571921933, 0),
(23, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Seni', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 3.2655406695067, 0, 0, 2.4843190592188, 0),
(24, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 1.4233407999069, 1.418009744725, 1.491138865454, 0, 1.3786904377136, 0.0004369562322, 0),
(25, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 1.4233407999069, 1.418009744725, 1.491138865454, 0, 1.3786904377136, 0.0004369562322, 0),
(26, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 3.5733845567071, 7.2151880586482, 0, 0, 4.4291859798644, 0),
(27, 'Teknik Mesin', 'Teknik Konversi Energi', 'Seni', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 1.4852251825115, 2.0707443891223, 5.0481263674223, 0, 0, 1.3524835759943, 0),
(28, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Seni', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 4.9926524512968, 0, 0, 1.3524835759943, 0),
(29, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Olahraga', 'Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 2.4400127998404, 1.985213642615, 4.6898722381214, 0, 0, 2.4545072305082, 0),
(30, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 5.4019418846668, 6.5471150902549, 0, 1.0212521760841, 3.2448248936736, 0),
(31, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 3.7130629562788, 2.1270146170875, 9.9853049025936, 0, 0, 1.4236669220993, 0),
(32, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Lainnya', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 5.8239685944063, 8.9423952794338, 0, 0, 1.2522996074021, 0),
(33, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 1.985213642615, 8.8169598076682, 0, 0, 6.459229553969, 0),
(34, 'Teknik Sipil', 'Teknik Sipil', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 3.3403648419668, 0, 0, 0, 0),
(35, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 2.5100305584445, 5.8239685944063, 6.9303563415612, 0, 4.1176887739712, 5.0091984296086, 0),
(36, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha', 'Kemanusiaan (ksr, humaniora)', 0, 9.3183497510502, 6.839397013927, 0, 2.1446295697767, 7.9678477944651, 0),
(37, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'Wirausaha', 'Wirausaha', 6.1000319996009, 2.83601948945, 1.8706043115014, 0, 0, 0, 0),
(38, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Seni', 'Fotografi', 'Wirausaha', 'Wirausaha', 5.1098818779266, 0, 2.3382553893767, 0, 1.5318782641262, 0, 0),
(39, 'Akuntansi', 'Akuntansi', 'Seni', 'Seni', 'Menyanyi', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 2.1217502607308, 0, 5.3445837471468, 0, 3.0637565282524, 1.0403719815341, 0),
(40, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha', 'Bahasa', 0, 0, 2.2332724943435, 0, 2.1446295697767, 4.4819143843866, 4.3805136064593),
(41, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 2.1378334988587, 0, 1.0212521760841, 1.8252140026914, 1.4601712021531),
(42, 'Teknik Elektro', 'Teknik Elektronika', 'Seni', 'Seni', 'Menggambar', 'Wirausaha', 'Wirausaha', 8.1333759994679, 3.5450243618126, 0, 0, 0, 6.0688365589489, 0),
(43, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Menyanyi', 'Wirausaha', 'Wirausaha', 7.3200383995211, 2.1742816085784, 1.6414552833425, 0, 1.286777741866, 0.0001893477006, 0),
(44, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Nonton', 'Wirausaha', 'Kemanusiaan (ksr, humaniora)', 0, 7.5964807753126, 1.6509037438955, 0, 3.2680069634692, 5.9150453790925, 7.3008560107655),
(45, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'Wirausaha', 'Wirausaha', 6.1000319996009, 2.83601948945, 1.8706043115014, 0, 0, 0, 0),
(46, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Seni', 'Menggambar', 'Wirausaha', 'Wirausaha', 7.0725008691025, 0, 6.8716076749031, 0, 3.0637565282524, 1.0403719815341, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_training`
--

CREATE TABLE `tb_data_training` (
  `id` int(10) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `minat` varchar(50) DEFAULT NULL,
  `bakat` varchar(50) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_training`
--

INSERT INTO `tb_data_training` (`id`, `jurusan`, `prodi`, `minat`, `bakat`, `hobi`, `label`) VALUES
(1, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Seni', 'Seni', 'Bermain Musik', 'Bahasa'),
(2, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(3, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(4, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(5, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(6, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Desain Grafis', 'Bahasa'),
(7, 'Teknik Mesin', 'Teknik Manufaktur', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(8, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(9, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(10, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Bahasa', 'Bulu Tangkis', 'Bahasa'),
(11, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bermain Musik', 'Bahasa'),
(12, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menggambar', 'Bahasa'),
(13, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'Bahasa'),
(14, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Olahraga', 'Bahasa'),
(15, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Nonton', 'Bahasa'),
(16, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(17, 'Teknik Mesin', 'Teknik Mekatronika', 'Olahraga', 'Olahraga', 'Olahraga', 'Bahasa'),
(18, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis', 'Bahasa'),
(19, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'Bahasa'),
(20, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bela Diri', 'Olahraga', 'Basket', 'Bahasa'),
(21, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(22, 'Administrasi Niaga', 'Administrasi Bisnis', 'Olahraga', 'Seni', 'Olahraga', 'Bahasa'),
(23, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Menulis', 'Bahasa'),
(24, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Seni', 'Menulis', 'Bahasa'),
(25, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Sepak Bola', 'Bahasa'),
(26, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Naik Gunung', 'Bahasa'),
(27, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Bulu Tangkis', 'Bahasa'),
(28, 'Teknik Mesin', 'Teknik Konversi Energi', 'Bahasa', 'Olahraga', 'Main Game', 'Bahasa'),
(29, 'Teknik Mesin', 'Teknik Konversi Energi', 'Seni', 'Seni', 'Membaca', 'Bahasa'),
(30, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Main Game', 'Bahasa'),
(31, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Seni', 'Membaca', 'Bahasa'),
(32, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Nonton', 'Bahasa'),
(33, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(34, 'Administrasi Niaga', 'Administrasi Bisnis', 'Olahraga', 'Olahraga', 'Bulu Tangkis', 'Bahasa'),
(35, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Seni', 'Membaca', 'Bahasa'),
(36, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Basket', 'Bahasa'),
(37, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Seni', 'Membaca', 'Bahasa'),
(38, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Seni', 'Mendengar Musik', 'Bahasa'),
(39, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Bahasa', 'Membaca', 'Bahasa'),
(40, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(41, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Berenang', 'Bahasa'),
(42, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Melukis', 'Bahasa'),
(43, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Seni', 'Membaca', 'Bahasa'),
(44, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Olahraga', 'Main Game', 'Bahasa'),
(45, 'Akuntansi', 'Akuntansi', 'Bahasa', 'Seni', 'Jalan-Jalan', 'Bahasa'),
(46, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Seni', 'Nonton', 'Bahasa'),
(47, 'Teknik Mesin', 'Teknik Manufaktur', 'Seni', 'Olahraga', 'Olahraga', 'Bahasa'),
(48, 'Akuntansi', 'Akuntansi', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(49, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Bahasa', 'Membaca', 'Bahasa'),
(50, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Nonton', 'Bahasa'),
(51, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(52, 'Akuntansi', 'Akuntansi', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(53, 'Teknik Mesin', 'Teknik Manufaktur', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(54, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(55, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(56, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(57, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(58, 'Teknik Elektro', 'Teknik Elektronika', 'Olahraga', 'Olahraga', 'Travelling', 'Bahasa'),
(59, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Travelling', 'Bahasa'),
(60, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bahasa', 'Olahraga', 'Bulu Tangkis', 'Bahasa'),
(61, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(62, 'Akuntansi', 'Akuntansi', 'Bahasa', 'Bahasa', 'Menari', 'Bahasa'),
(63, 'Teknik Mesin', 'Teknik Manufaktur', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(64, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Nonton', 'Bahasa'),
(65, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Kesehatan', 'Seni', 'Jalan-Jalan', 'Bahasa'),
(66, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Bahasa', 'Membaca', 'Bahasa'),
(67, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Mendengar Musik', 'Bahasa'),
(68, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Bahasa', 'Desain Grafis', 'Bahasa'),
(69, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(70, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Melukis', 'Bahasa'),
(71, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Olahraga', 'Futsal', 'Bahasa'),
(72, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Seni', 'Menggambar', 'Bahasa'),
(73, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(74, 'Teknik Mesin', 'Teknik Konversi Energi', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(75, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Bahasa', 'Olahraga', 'Futsal', 'Bahasa'),
(76, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(77, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Kemanusiaan', 'Lainnya', 'Travelling', 'Bahasa'),
(78, 'Teknik Kimia', 'Analisis Kimia', 'Kemanusiaan', 'Lainnya', 'Memasak', 'Bahasa'),
(79, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Olahraga', 'Seni', 'Main Game', 'Bahasa'),
(80, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Bahasa', 'Menulis', 'Bahasa'),
(81, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(82, 'Teknik Kimia', 'Teknologi Kimia Industri', 'Olahraga', 'Bahasa', 'Membaca', 'Bahasa'),
(83, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Seni', 'Memasak', 'Bahasa'),
(84, 'Akuntansi', 'Akuntansi', 'Jurnalistik', 'Bahasa', 'Memasak', 'Bahasa'),
(85, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Nonton', 'Bahasa'),
(86, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Membaca', 'Bahasa'),
(87, 'Akuntansi', 'Akuntansi', 'Bahasa', 'Seni', 'Menari', 'Bahasa'),
(88, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(89, 'Teknik Kimia', 'Teknik Kimia', 'Pecinta Alam', 'Lainnya', 'Naik Gunung', 'Bahasa'),
(90, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Bahasa'),
(91, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Lainnya', 'Menulis', 'Bahasa'),
(92, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Seni', 'Menggambar', 'Bahasa'),
(93, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Main Game', 'Bahasa'),
(94, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'Bahasa'),
(95, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Bulu Tangkis', 'Bahasa'),
(96, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Nonton', 'Bahasa'),
(97, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(98, 'Akuntansi', 'Akuntansi Manajerial', 'Olahraga', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(99, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(100, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Seni', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(101, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Kemanusiaan', 'Seni', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(102, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(103, 'Teknik Kimia', 'Analisis Kimia', 'Seni', 'Seni', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(104, 'Teknik Kimia', 'Analisis Kimia', 'Olahraga', 'Olahraga', 'Naik Gunung', 'Kemanusiaan (ksr, humaniora)'),
(105, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Seni', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(106, 'Teknik Kimia', 'Analisis Kimia', 'Olahraga', 'Olahraga', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(107, 'Teknik Mesin', 'Teknik Otomotif', 'Seni', 'Seni', 'Futsal', 'Kemanusiaan (ksr, humaniora)'),
(108, 'Teknik Mesin', 'Teknik Konversi Energi', 'Kemanusiaan', 'Olahraga', 'Futsal', 'Kemanusiaan (ksr, humaniora)'),
(109, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Volly', 'Kemanusiaan (ksr, humaniora)'),
(110, 'Teknik Elektro', 'Teknik Elektronika', 'Seni', 'Seni', 'Memasak', 'Kemanusiaan (ksr, humaniora)'),
(111, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Seni', 'Mendengar Musik', 'Kemanusiaan (ksr, humaniora)'),
(112, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Olahraga', 'Seni', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(113, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Seni', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(114, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Menulis', 'Kemanusiaan (ksr, humaniora)'),
(115, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Menari', 'Kemanusiaan (ksr, humaniora)'),
(116, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(117, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(118, 'Teknik Elektro', 'Teknik Listrik', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(119, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Seni', 'Bermain Musik', 'Kemanusiaan (ksr, humaniora)'),
(120, 'Teknik Mesin', 'Teknik Mesin', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(121, 'Teknik Kimia', 'Analisis Kimia', 'Seni', 'Seni', 'Jalan-Jalan', 'Kemanusiaan (ksr, humaniora)'),
(122, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Kemanusiaan', 'Seni', 'Menyanyi', 'Kemanusiaan (ksr, humaniora)'),
(123, 'Administrasi Niaga', 'Administrasi Bisnis', 'Kemanusiaan', 'Bahasa', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(124, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Seni', 'Menyanyi', 'Kemanusiaan (ksr, humaniora)'),
(125, 'Administrasi Niaga', 'Administrasi Bisnis', 'Kemanusiaan', 'Seni', 'Menyanyi', 'Kemanusiaan (ksr, humaniora)'),
(126, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Seni', 'Seni', 'Menggambar', 'Kemanusiaan (ksr, humaniora)'),
(127, 'Teknik Kimia', 'Analisis Kimia', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(128, 'Teknik Kimia', 'Analisis Kimia', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(129, 'Akuntansi', 'Akuntansi Manajerial', 'Jurnalistik', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(130, 'Administrasi Niaga', 'Administrasi Bisnis', 'Jurnalistik', 'Seni', 'Menyanyi', 'Kemanusiaan (ksr, humaniora)'),
(131, 'Akuntansi', 'Akuntansi Manajerial', 'Kemanusiaan', 'Seni', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(132, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(133, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(134, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(135, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(136, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Seni', 'Menulis', 'Kemanusiaan (ksr, humaniora)'),
(137, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Kesehatan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(138, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Seni', 'Menulis', 'Kemanusiaan (ksr, humaniora)'),
(139, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(140, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Kemanusiaan', 'Lainnya', 'Bulu Tangkis', 'Kemanusiaan (ksr, humaniora)'),
(141, 'Teknik Mesin', 'Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(142, 'Teknik Elektro', 'Teknik Listrik', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(143, 'Teknik Elektro', 'Teknik Listrik', 'Kesehatan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(144, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Kesehatan', 'Seni', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(145, 'Teknik Elektro', 'Teknik Listrik', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(146, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Seni', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(147, 'Teknik Mesin', 'Teknik Otomotif', 'Seni', 'Seni', 'Travelling', 'Kemanusiaan (ksr, humaniora)'),
(148, 'Akuntansi', 'Akuntansi Manajerial', 'Kemanusiaan', 'Seni', 'Travelling', 'Kemanusiaan (ksr, humaniora)'),
(149, 'Teknik Mesin', 'Teknik Otomotif', 'Olahraga', 'Olahraga', 'Volly', 'Kemanusiaan (ksr, humaniora)'),
(150, 'Akuntansi', 'Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(151, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Pecinta Alam', 'Lainnya', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(152, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis', 'Pecinta Alam (MAPALA)'),
(153, 'Teknik Mesin', 'Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(154, 'Teknik Elektro', 'Teknik Listrik', 'Pecinta Alam', 'Seni', 'Olahraga', 'Pecinta Alam (MAPALA)'),
(155, 'Teknik Mesin', 'Teknik Manufaktur', 'Pecinta Alam', 'Seni', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(156, 'Teknik Mesin', 'Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(157, 'Teknik Mesin', 'Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(158, 'Teknik Mesin', 'Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(159, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menyanyi', 'Pecinta Alam (MAPALA)'),
(160, 'Akuntansi', 'Akuntansi Manajerial', 'Jurnalistik', 'Lainnya', 'Menulis', 'Persma'),
(161, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis', 'Persma'),
(162, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Olahraga', 'Olahraga', 'Persma'),
(163, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Olahraga', 'Olahraga', 'Persma'),
(164, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Membaca', 'Persma'),
(165, 'Akuntansi', 'Akuntansi', 'Jurnalistik', 'Seni', 'Main Game', 'Persma'),
(166, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Jurnalistik', 'Seni', 'Menari', 'Persma'),
(167, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Jurnalistik', 'Seni', 'Menulis', 'Persma'),
(168, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Seni', 'Fotografi', 'Persma'),
(169, 'Administrasi Niaga', 'Administrasi Bisnis', 'Jurnalistik', 'Seni', 'Jalan-Jalan', 'Persma'),
(170, 'Teknik elektro', 'Teknik Listrik', 'Pramuka', 'Seni', 'Jalan-Jalan', 'Persma'),
(171, 'Teknik Elektro', 'Teknik Listrik', 'Pramuka', 'Olahraga', 'Nonton', 'Persma'),
(172, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Seni', 'Menyanyi', 'Persma'),
(173, 'Teknik Mesin', 'Teknik Mekatronika', 'Jurnalistik', 'Olahraga', 'Menggambar', 'Persma'),
(174, 'Teknik Elektro', 'Teknik Listrik', 'Jurnalistik', 'Olahraga', 'Membaca', 'Persma'),
(175, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Bahasa', 'Menulis', 'Persma'),
(176, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Jurnalistik', 'Bahasa', 'Menggambar', 'Persma'),
(177, 'Teknik Elektro', 'Teknik Listrik', 'Bahasa', 'Bahasa', 'Menyanyi', 'Persma'),
(178, 'Teknik Kimia', 'Teknologi Kimia Industri', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'Persma'),
(179, 'Teknik Kimia', 'Teknik Kimia', 'Jurnalistik', 'Bahasa', 'Menulis', 'Persma'),
(180, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Bahasa', 'Menulis', 'Persma'),
(181, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Membaca', 'Persma'),
(182, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Futsal', 'Pramuka'),
(183, 'Teknik Mesin', 'Teknik Mekatronika', 'Seni', 'Seni', 'Menyanyi', 'Pramuka'),
(184, 'Teknik Mesin', 'Teknik Mekatronika', 'Olahraga', 'Seni', 'Membaca', 'Pramuka'),
(185, 'Teknik Mesin', 'Teknik Mekatronika', 'Pramuka', 'Olahraga', 'Membaca', 'Pramuka'),
(186, 'Teknik Sipil', 'Teknik Konstruksi', 'Olahraga', 'Seni', 'Menyanyi', 'Pramuka'),
(187, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka'),
(188, 'Teknik Sipil', 'Teknik Konstruksi', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka'),
(189, 'Teknik Mesin', 'Teknik Mekatronika', 'Pramuka', 'Bahasa', 'Memasak', 'Pramuka'),
(190, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Seni', 'Olahraga', 'Membaca', 'Pramuka'),
(191, 'Teknik Elektro', 'Teknik Listrik', 'Pramuka', 'Olahraga', 'Bulu Tangkis', 'Pramuka'),
(192, 'Teknik Elektro', 'Teknik Listrik', 'Pramuka', 'Seni', 'Main Musik', 'Pramuka'),
(193, 'Teknik Mesin', 'Teknik Konversi Energi', 'Pramuka', 'Lainnya', 'Nonton', 'Pramuka'),
(194, 'Teknik Mesin', 'Teknik Mekatronika', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka'),
(195, 'Akuntansi', 'Akuntansi', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Pramuka'),
(196, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Olahraga', 'Pramuka'),
(197, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Pecinta Alam', 'Bahasa', 'Menulis', 'Pramuka'),
(198, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(199, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(200, 'Teknik Kimia', 'Teknik Kimia', 'Pecinta Alam', 'Lainnya', 'Naik Gunung', 'SENIOR (senior, bola, karate, taekwondo)'),
(201, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(202, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(203, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(204, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(205, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(206, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Bahasa', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(207, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'SENIOR (senior, bola, karate, taekwondo)'),
(208, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(209, 'Teknik kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(210, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(211, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket', 'SENIOR (senior, bola, karate, taekwondo)'),
(212, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(213, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(214, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(215, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(216, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(217, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(218, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Olahraga', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(219, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(220, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(221, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(222, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Desain Grafis', 'SENIOR (senior, bola, karate, taekwondo)'),
(223, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(224, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(225, 'Teknik Elektro', 'Teknik Listrik', 'Wirausaha', 'Lainnya', 'Menulis', 'SENIOR (senior, bola, karate, taekwondo)'),
(226, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Wirausaha', 'Lainnya', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(227, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(228, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Bahasa', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(229, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)'),
(230, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(231, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(232, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(233, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Seni', 'Fotografi', 'SENIOR (senior, bola, karate, taekwondo)'),
(234, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(235, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(236, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(237, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(238, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Kemanusiaan', 'Lainnya', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(239, 'Teknik Mesin', 'Teknik Perawatan Alat Berat', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(240, 'Teknik Mesin', 'Teknik Manufaktur', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(241, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Lainnya', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(242, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(243, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(244, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Jurnalistik', 'Bahasa', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)'),
(245, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(246, 'Teknik Mesin', 'Teknik Konversi Energi', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(247, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bela Diri', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(248, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(249, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Olahraga', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(250, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Olahraga', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)'),
(251, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(252, 'Akuntansi', 'Akuntansi', 'Bela Diri', 'Olahraga', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)'),
(253, 'Teknik Mesin', 'Teknik Otomotif', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(254, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(255, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(256, 'Akuntansi', 'Akuntansi', 'Bela Diri', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(257, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Seni', 'Mendengar Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(258, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Bela Diri', 'Olahraga', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(259, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Olahraga', 'Volly', 'SENIOR (senior, bola, karate, taekwondo)'),
(260, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(261, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(262, 'Akuntansi', 'Akuntansi', 'Bela Diri', 'Seni', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)'),
(263, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Bahasa', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(264, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(265, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Seni', 'Memasak', 'SENIOR (senior, bola, karate, taekwondo)'),
(266, 'Akuntansi', 'Akuntansi', 'Bela Diri', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(267, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Seni', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)'),
(268, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Seni', 'Desain Grafis', 'SENIOR (senior, bola, karate, taekwondo)'),
(269, 'Teknik Elektro', 'Teknik Listrik', 'Bela Diri', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(270, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Bahasa', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(271, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(272, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(273, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(274, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Bela Diri', 'Olahraga', 'Naik Gunung', 'SENIOR (senior, bola, karate, taekwondo)'),
(275, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Bela Diri', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(276, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Bela Diri', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(277, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(278, 'Akuntansi', 'Akuntansi Manajerial', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(279, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(280, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Olahraga', 'Olahraga', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(281, 'Teknik Sipil', 'Teknik Konstruksi', 'Olahraga', 'Olahraga', 'Futsal', 'SENIOR (senior, bola, karate, taekwondo)'),
(282, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Seni', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(283, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(284, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(285, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(286, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Lainnya', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(287, 'Teknik Sipil', 'Teknik Sipil', 'Olahraga', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(288, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(289, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(290, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(291, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(292, 'Teknik Kimia', 'Analisis Kimia', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(293, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(294, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)'),
(295, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(296, 'Teknik Mesin', 'Teknik Pembangkit Energi', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(297, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Seni', 'Lainnya', 'Travelling', 'SENIOR (senior, bola, karate, taekwondo)'),
(298, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(299, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Lainnya', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(300, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(301, 'Administrasi Niaga', 'Administrasi Bisnis', 'Olahraga', 'Olahraga', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(302, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(303, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(304, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(305, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(306, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(307, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(308, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(309, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Seni', 'Lainnya', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(310, 'Teknik Sipil', 'Teknik Sipil', 'Seni', 'Seni', 'Menari', 'SENIOR (senior, bola, karate, taekwondo)'),
(311, 'Teknik Kimia', 'Teknik Kimia', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(312, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(313, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(314, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(315, 'Teknik Kimia', 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(316, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Seni', 'Bahasa', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(317, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Nonton', 'Wirausaha'),
(318, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Wirausaha', 'Olahraga', 'Bulu Tangkis', 'Wirausaha'),
(319, 'Teknik Mesin', 'Teknik Manufaktur', 'Wirausaha', 'Lainnya', 'Bermain Musik', 'Wirausaha'),
(320, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(321, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Menyanyi', 'Wirausaha'),
(322, 'Teknik Elektro', 'Teknik Listrik', 'Wirausaha', 'Lainnya', 'Sepak Bola', 'Wirausaha'),
(323, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(324, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(325, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Main Game', 'Wirausaha'),
(326, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(327, 'Teknik Kimia', 'Teknik Kimia', 'Kemanusiaan', 'Lainnya', 'Membaca', 'Wirausaha'),
(328, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Wirausaha', 'Lainnya', 'Olahraga', 'Wirausaha'),
(329, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Seni', 'Bermain Musik', 'Wirausaha'),
(330, 'Administrasi Niaga', 'Administrasi Bisnis', 'Olahraga', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(331, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Lainnya', 'Menyanyi', 'Wirausaha'),
(332, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Nonton', 'Wirausaha'),
(333, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Olahraga', 'Olahraga', 'Wirausaha'),
(334, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Seni', 'Lainnya', 'Menari', 'Wirausaha'),
(335, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Nonton', 'Wirausaha'),
(336, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Olahraga', 'Bulu Tangkis', 'Wirausaha'),
(337, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Olahraga', 'Olahraga', 'Wirausaha'),
(338, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(339, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(340, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Menari', 'Wirausaha'),
(341, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Menari', 'Wirausaha'),
(342, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha'),
(343, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Seni', 'Menggambar', 'Wirausaha'),
(344, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Menggambar', 'Wirausaha'),
(345, 'Administrasi Niaga', 'Administrasi Bisnis', 'Seni', 'Lainnya', 'Memasak', 'Wirausaha'),
(346, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(347, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(348, 'Teknik Kimia', 'Analisis Kimia', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(349, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(350, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(351, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menulis', 'Wirausaha'),
(352, 'Teknik Mesin', 'Teknik Manufaktur', 'Wirausaha', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(353, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Menulis', 'Wirausaha'),
(354, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(355, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha'),
(356, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'Wirausaha'),
(357, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Berenang', 'Wirausaha'),
(358, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(359, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(360, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(361, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Seni', 'Desain Grafis', 'Wirausaha'),
(362, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Wirausaha', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(363, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Seni', 'Melukis', 'Wirausaha'),
(364, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menari', 'Wirausaha'),
(365, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha'),
(366, 'Akuntansi', 'Akuntansi Manajerial', 'Olahraga', 'Lainnya', 'Olahraga', 'Wirausaha'),
(367, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menulis', 'Wirausaha'),
(368, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Lainnya', 'Membaca', 'Wirausaha'),
(369, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(370, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(371, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Bahasa', 'Memasak', 'Wirausaha'),
(372, 'Teknik Kimia', 'Teknologi Kimia Industri', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(373, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(374, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(375, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(376, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(377, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(378, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Lainnya', 'Olahraga', 'Wirausaha'),
(379, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha'),
(380, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Lainnya', 'Sepak Bola', 'Wirausaha'),
(381, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha'),
(382, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(383, 'Teknik Elektro', 'Teknik Elektronika', 'Olahraga', 'Lainnya', 'Sepak Bola', 'Wirausaha'),
(384, 'Teknik Mesin', 'Teknik Konversi Energi', 'Olahraga', 'Lainnya', 'Sepak Bola', 'Wirausaha'),
(385, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Bahasa', 'Membaca', 'Wirausaha'),
(386, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Bahasa', 'Membaca', 'Wirausaha'),
(387, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(388, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(389, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Lainnya', 'Jalan-Jalan', 'Wirausaha'),
(390, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'Wirausaha'),
(391, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(392, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(393, 'Teknik Kimia', 'Teknik Kimia Mineral', 'Wirausaha', 'Seni', 'Membaca', 'Wirausaha'),
(394, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha'),
(395, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(396, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(397, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Seni', 'Nonton', 'Wirausaha'),
(398, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Olahraga', 'Olahraga', 'Wirausaha'),
(399, 'Teknik Kimia', 'Teknologi Kimia Industri', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(400, 'Akuntansi', 'Akuntansi', 'Seni', 'Lainnya', 'Memasak', 'Wirausaha'),
(401, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Bahasa', 'Fotografi', 'Wirausaha'),
(402, 'Teknik Mesin', 'Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Volly', 'Wirausaha'),
(403, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Seni', 'Main Game', 'Wirausaha'),
(404, 'Teknik Elektro', 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(405, 'Teknik Kimia', 'Teknologi Kimia Industri', 'Wirausaha', 'Seni', 'Membaca', 'Wirausaha'),
(406, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(407, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Jalan-Jalan', 'Wirausaha'),
(408, 'Akuntansi', 'Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(409, 'Teknik Elektro', 'Teknik Listrik', 'Jurnalistik', 'Lainnya', 'Menulis', 'Wirausaha'),
(410, 'Teknik Elektro', 'Teknik Multimedia dan Jaringan', 'Wirausaha', 'Lainnya', 'Desain Grafis', 'Wirausaha'),
(411, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menggambar', 'Wirausaha'),
(412, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Lainnya', 'Fotografi', 'Wirausaha'),
(413, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Menggambar', 'Wirausaha'),
(414, 'Teknik Kimia', 'Teknik Kimia', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(415, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(416, 'Akuntansi', 'Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(417, 'Akuntansi', 'Akuntansi', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(418, 'Administrasi Niaga', 'Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Menulis', 'Wirausaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_ukm`
--

CREATE TABLE `tb_data_ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(50) DEFAULT NULL,
  `visi` varchar(500) DEFAULT NULL,
  `misi` varchar(1000) DEFAULT NULL,
  `tujuan` varchar(500) DEFAULT NULL,
  `proker` varchar(1000) DEFAULT NULL,
  `struktur_org` varchar(500) DEFAULT NULL,
  `kriteria_ang` varchar(100) DEFAULT NULL,
  `sistem_rekrut` varchar(1000) DEFAULT NULL,
  `prestasi` varchar(500) DEFAULT NULL,
  `divisi` varchar(1000) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_ukm`
--

INSERT INTO `tb_data_ukm` (`id`, `nama_ukm`, `visi`, `misi`, `tujuan`, `proker`, `struktur_org`, `kriteria_ang`, `sistem_rekrut`, `prestasi`, `divisi`, `about`, `foto`) VALUES
(1, 'UKM Wirausaha', 'Membentuk kader-kader yang cerdas dalam hal religius, intelektual, dan organisasi serta mempunyai bakat dan potensi di bidang kewirausahaan ', 'a. Menginterpretasikan nilai-nilai religi dalam setiap tindakan\nb. Mendorong kader untuk menjunjung tinggi ilmu pengetahuan\nc. Membina kader untuk menjalankan apa yang diamanahkan dengan rasa tanggung jawab dan profesionalisme\nd. Menumbuhkan sikap berwirausaha dan berorganisasi dalam kehidupan kampus dan bermasyarakat\n', ' Terbinanya insan wirausaha muda yang bertakwa dan berbudi pekerti luhur', '1. Latihan Kepemimpinan (LK)\n2. Diskusi preskord (presidium kordinator) \n3. Diskusi anggota \n4. pendataan inventaris \n5. pembuatan produk kajian islami\n6. pembuatan madding\n', 'a. Mubes\nb. DPO\nc. Ketua Umum\nd. Sekretaris Umum\ne. Bendahara Umum\nf. Ketua bidang 1\ng. Ketua bidang 2\nh. Kordinator divisi\n\n', 'kemauan dan loyalitas', 'kegiatan LK (Latihan Kepemimpinan)', ' Lomba di Unibos juara harapan, Lomba di IPB masuk 15 besar, dan ikut di 5 tim yang ikut di Udayana', '1. Pembinaan \n2. Kesekretariatan \n3. Humas\n4. Usaha\n5. Kerohanian,\n', 'UKM Wirausaha adalah organisasi kemahasiswaan yang bergerak dibidang kewirausahaan. UKM ini bertujuan untuk membentuk insan wirausaha muda yang bertakwa dan berbudi pekerti luhur.', 'wirausaha.jpg'),
(2, 'UKM Karate', 'Terbinanya mahasiswa yang organisatoris dan karateka yang berkualitas sesuai dengan sumpah karate serta bertaqwa kepada Tuhan Yang Maha Esa.', '1. Membina anggota UKM Karate PNUP untuk menciptakan karateka yang terampil, aktif, dan sportif;\n2. Menyediakan sarana latihan bagi  anggota UKM Karate PNUP secara khusus dan karateka pada umumnya; dan\n3. Menambah pengalaman, meningkatkan prestasi, dan mengharumkan nama UKM Karate PNUP.', 'a) Bertujuan untuk mewadahi mahasiswa yang memiliki minat terhadap olahraga karate.\nb) Mecetak atlit- atlit karate berprestasi .\nc) Menjadi organisasi yang memberikan sarana dan pelatihan olah raga karate.', '1. Latihan fisik dan teknik\r\n2. Sparing partner\r\n3. Pertandingan\r\n', 'a) Pembina;\nb) Dewan Pelatih;\nc) Dewan Penasehat Organisasi (DPO); dan\nd) Pengurus Harian Organisasi (PHO).', 'kemauan dan loyalitas', 'latihan fisik ,untuk mengukur ketahanan fisik calon anggota dan LK untuk memberikanpemahaman tentang organisasi.', 'a) Juara satu pimpolnas 2017 di manado kelas komite putra\nb) Juara satu pimpolnas 2017 di manado kelas kata perorangan putri\nc) Juara satu pimpolnas 2019 di jakarta kelas kata perorangan putri\nd) Juara tiga  pimpolnas 2019 di jakarta kelas komite peroranga putra\ne) Juara tiga  pimpolnas 2019 di jakarta kelas komite peroranga putra\nf) Juara dua open lemkari sul sel 2019 kelas komite putra\ng) Juara tiga open bupati gowa 2019 kelas komite putra\nh) Juara tiga open bupati gowa 2019 kelas komite putra', 'a. departemen pelatihan \nb. departemen kaderisasi\nc. departemen infokom\nd. departemen kesekretariatan\ne. departemen danlos\n', 'UKM Karate adalah organisasi kemahasiswaan yang berfungsi \nsebagai wadah bagi mahasiswa dalam menyalurkan minatnya di bidang bela diri karate.', 'karate.jpg'),
(3, 'UKM KSR-PMI', 'Menciptakan manusia yang berjiwa sosial tinggi dan independen yang berlandaskan ketuhanan yang maha esa sesuai dengan prinsip-prinsip dasar kepalang merahan dan mempererat tali persaudaraan serta membantu meringankan penderitaan sesama', 'a. Menumbuhkan rasa solidaritas terhadap sesama \nb. Memberikan pertolongan pertama secara tepat, cermat, dan professional serta dilakukan dengan sukarela yang berlandaskan kemanusiaan\nc. Menerapkan dan mengamalkan tujuh prinsip dasar gerakan palang merah dan bulan sabit merah internasional\nd. Menjalin hubungan baik antar lembaga baik internal maupun eksternal\n', 'Menolong dan meringankan penderitaan antar sesama manusia yang berlandaskan kemanusiaan, kebersamaan, dan kekeluargaan.', '1. Pelatihan nasional\r\n2. Lomba kepalang merahan dan seni \r\n3. Donor darah \r\n4. Pelayanan kesehatan\r\n5. Bakti sosial\r\n6. Penyuluhan kesehatan\r\n', 'a. Komandan \nb. Wakil komandan\nc. Sekretaris umum\nd. Bendahara umum\ne. Presidium teras \n\n\n', 'kemauan dan loyalitas', 'wawancara, kaderisasi dan orientasi anggota', 'Mengadakan lomba, mengirim delegasi (perwakilan) untuk temu bakti ke luar kota Makassar, mengadakan jungle rescue nasional, mengikuti lomba tingkat PMR nasional', '1. Divisi pendidikan dan pelatihan \r\n2. Divisi SDM\r\n3. Divisi pelayanan kesehatan \r\n4. Divisi informasi dan komunikasi\r\n', 'UKM KSR-PMI adalah organisasi kemahasiswaan yang bergerak di bidang kemanusiaan dan kesehatan. UKM ini bertujuan untuk menolong dan meringankan penderitaan antar sesama.', 'ksr.jpg'),
(4, 'UKM Persma', 'Mengemban dan menerapkan idealisme Pers Mahasiswa', '1. Menyiapkan kader-kader yang memiliki idealisme Pers Mahasiswa \n2. Mengungkap, menyampaikan, menumbuhkan, mengarahkan, dan membentuk opini publik sesuai dengan idealisme Pers Mahasiswa\n', '1. Membentuk masyarakat ilmiah dan pemikir terutama mahasiswa PNUP yang senantiasa mencintai dan menjunjung tinggi nilai-nilai kejujuran, kebenaran, dan keadilan dengan berorientasi pada masa depan dan bertanggung jawab pada Tuhan Yang Maha Esa\n2. Menyiapkan dan melahirkan kader mahasiswa yang kritis, analitis, objektif, berinisiatif, tulus, ikhlas, dan bertanggung jawab dalam membangun masyarakat serta Negara\n3. Menguasai bidang opini dan publikasi kampus\n4. Menjaga eksistensi Pers Mahasiswa di', '1. Open recruitment\r\n2. Pendidikan latihan jurnalistik dasar\r\n3. Kaderisasi dan orientasi anggota (KORAN)\r\n4. Mengumpulkan bahan jurnalistik.\r\n', 'a. Ketua Umum\nb. Sekretaris Umum \nc. Pengurus Harian Organisasi (PHO)\nd. Dewan Penasehat Organisasi (DPO)', 'kemauan dan loyalitas', ' kegiatan kaderisasi dan orientasi anggota (KORAN) serta pendidikan latihan jurnalistik dasar (DIKLAT)', 'Finalis kompetisi majalah kampus di Politeknik Negeri Jakarta', 'a. Bidang organisasi (pendidikan, pelatihan, dan kesekretariatan)\nb. Bidang Penerbitan (mengelola sosial media, menghasilkan produk jurnalistik)\n', 'UKM Persma adalah organisasi kemahasiswaan yang bergerak\ndi bidang jurnalistik. UKM ini bertujuan untuk membentuk masyarakat ilmiah dikalangan\nmahasiswa PNUP yang senantiasa mencintai dan menjunjung tinggi nilai-nilai kejujuran.', 'pers.jpg'),
(5, 'UKM Bahasa', 'Mewujudkan ukm bahasa pnup menjadi lembaga yang berprestasi dan baik dari segi kelembagaan ', 'a. Memberikan softskill dan pengajaran yang lebih efektif\nb. Memfasilitasi dan mewadahi mahasiswa pnup untuk dapat belajar bersama dalam program kebahasaan \nc. Memperkuat hubungan antar lembaga lain baik internal maupun eksternal dalam tingkat pengajaran maupun organisasi\nd. Menjalin hubungan baik antara alumni-alumni dan pengurus serta anggota-anggota ukm bahasa untuk memperluas kinerja ukm bahasa\ne. Memastikan seluruh presidium dan kordinator agar menjalankan tugasnya sesuai dengan pra raker yang telah dijalankan maupun raker yang telah disetujui \nf. Terjalinnya suasana harmonis dan kelembagaan yang baik \ng. Peduli terhadap kondisi masyarakat yang ada \n', 'Terbinanya insan akademis yang professional, kreatif, dan inovatif yang bertakwa kepada Tuhan Yang Maha Esa serta menjunjung tinggi asas kekeluargaan dan keilmuan', 'a. meningkatkan efektifitas professional seperti perilaku, keefektifan, maupun range dalam mengetahui progress yang telah dilakukan (seluruh anggota)\nb. mewadahai fasilitas bagi anggota (divisi kesekretariatan)\nc. memperluas informasi mengenai ukm bahasa untuk meningkatkan solidaritas baik dengan pihak luar maupun pihak dalam (divisi humas)\nd. menunjang perlengkapan dalam pemenuhan kebutuhan (divis danlos)\ne. divisi kebahasaan (mewadahi anggota untuk belajar mengenai berbagai bahasa)\nf. latihan kreativitas anggota \n', 'a. Ketua umum\nb. Sekretaris Umum\nc. Bendahara umum\nd. Bidang 1 (organisasi)\ne. Bidang 2 (kebahasaan)\n', 'kemauan dan loyalitas', ' wawancara, tes tertulis (bhs inggris, korea, jepang, mandarin, dan arab) lebih di utamakan bahasa inggris dihitung berdasarkan range yang telah ditentukan ', 'juara 1 speech bahasa korea di UIN, juara 2 speech bahasa inggris di UIN', 'divisi SDM (perekrutan maupun penalaran anggota), divisi kesek (fasilitator yang menyediakan kebutuhan anggota), divisi humas (menjalin dan membentuk kerjasama dengan pihak-pihak lain), divisi danlos ( penunjang), divisi kebahasaan (pengajar), divisi literasi pengembangan (praktek speaking), divisi publikasi dan kreativitas (mengembangkan kreativitas anggota  dalam segi desain).\n\n', 'UKM Bahasa adalah organisasi kemahasiswaan yang bergerak\ndi bidang kebahasaan. UKM ini bertujuan untuk membentuk mahasiswa yang memiliki kemampuan dan keahlian berbahasa sehingga mampu bersaing dalam dunia kerja.', 'bahasa.jpg'),
(6, 'UKM Pramuka', 'Gerakan Pramuka menjadi pilihan utama bagi pembentukan karakter kaum muda', 'a. Mewujudkan Gerakan Pramuka yang mandiri dan bermutu.\nb. Memantapkan sistem pendidikan Gerakan Paramuka yang menanamkan nilai-nilai Kepramukaan bagi kaum muda.\n', 'Memperbaiki karakter dari anggota-anggotanya.', 'Tidak menentu', 'a. Pemangku adat racana (ketua dewan kehormatan, sekretaris dewan kehormatan, anggota)\nb. Susunan pengurus dewan racana (ketua dewan racana, sekretaris, bendahara, kordinator divisi)\n', 'kemauan dan loyalitas', 'orientasi dasar, pengukuhan menjadi anggota, pendidikan lanjutan/materi orientasi dasar ke lapangan, pengukuhan sebagai kader racana', 'Juara 3 Cerdas Cermat Kemah Teknik III di Batam', '\r\n1. Bidang teknik kepramukaan\r\n2. Bidang kegiatan operasional\r\n3. Bidang pembinaan dan pengembangan\r\n4. Bidang penelitian dan evaluasi\r\n', 'UKM Pramuka adalah organisasi kemahasiswaan yang bergerak\ndi bidang kepramukaan. UKM ini bertujuan sebagai wadah bagi mahasiswa untuk berkarya bagi\nnegara dan sesama melalui Gerakan Pramuka.', 'pramuka.jpg'),
(7, 'UKM Mapala', 'Terbinanya insan yang bertakwa kepada Tuhan Yang Maha  Esa, akademis, penalar, penganalisa, kreatif, professional, berprestasi, semangat pengabdian yang tinggi, dan menjunjung tinggi nilai luhur kepencinta alaman', 'a. Melahirkan regenerasi yang lebih dan menekankan kepada nilai luhur kepencinta alaman\nb. Memanusiakan manusia yang ditekankan pada orientasi kepencinta alaman\n', 'Menjaga kelestarian alam di muka bumi ini sehingga alam tetap terjaga', '1. Pendidikan dasar (diksar)\n2. Kajian rutin\n3. Mubes\n4. Seminar nasional \n5. Pendakian bersama sesama pengurus\n', 'a. Ketua umum \nb. Sekretaris umum\nc. Bendahara umum\nd. Bidang 1 (pro climbing, mountaineering, caving)\ne. Bidang 2 (kesekretariatan, gudang, dan humas) \n', 'kemauan dan loyalitas', 'pendidikan dasar (diksar) dan pendidikan lanjutan', 'melakukan ekspedisi solo artificial climbing, memasuki tujuh gua dalam 7 hari, memenangkan mountain race', '1. Pro climbing\r\n2. Mountaineering \r\n3. Caving \r\n', 'UKM MAPALA adalah organisasi kemahasiswaan yang bergerak dibidang kegiatan alam bebas. UKM ini bertujuan untuk membentuk mahasiswa sebagai bibit yang mandiri serta mempunyai semangat, mental, jiwa, dan rohani yang kuat.', 'mapala.jpg'),
(8, 'UKM Taekwondo', '1. Mengamalkan janji Tae Kwon Do Indonesia;\n2. Mengamalkan Tri Darma perguruan tinggi.\n3. Menjalin hubungan kerja sama antar lembaga baik di kampus maupun luar kampus;\n4.  kualitas sumber daya anggota.\n', '1. UKM Tae Kwon Do PNUP bertujuan membentuk insan yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa;\n2. UKM Tae Kwon Do PNUP bertujuan membina insan akademis yang berilmu, berprestasi, kreatif, bertanggung jawab, dan pengabdian tinggi pada masyarakat;\n3. UKM Tae Kwon Do PNUP bertujuan menumbuhkembangkan suasana yang harmonis antar sesama civitas akademika PNUP;\n4. UKM Tae Kwon Do PNUP bertujuan untuk membina mental dan fisik yang kuat kepada anggota.\n', '1. UKM Tae Kwon Do PNUP bertujuan membentuk insan yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa;\n2. UKM Tae Kwon Do PNUP bertujuan membina insan akademis yang berilmu, berprestasi, kreatif, bertanggung jawab, dan pengabdian tinggi pada masyarakat;\n3. UKM Tae Kwon Do PNUP bertujuan menumbuhkembangkan suasana yang harmonis antar sesama civitas akademika PNUP;\n4. UKM Tae Kwon Do PNUP bertujuan untuk membina mental dan fisik yang kuat kepada anggota.\n', '', '1. Musyawarah Besar / Sidang Istimewa\n2. Dewan Alumni\n3. Dewan Tertinggi\n4. Pengurus\n5. Anggota.\n', '1. Mengikuti prosesi pengaderan sesuai yang ditetapkan oleh PHO;\n2. Bagi yang berstatus mahasiswa PN', '1. Mendaftar di open recruitmen ukm Tae Kwon Do PNUP dan aktif latihan didojang/tempat latihan dan aktif juga di organisasi ukm Tae Kwon Do PNUP  maka disebut ANGGOTA MUDA\n2. Mempertahankan keaktifan latihan di dojang/tempat latihan dan di organisasi selama 3 bulan dan mengikuti pengkaderan maka disebut ANGGOTA BIASA\n3. Setelah mengikuti pengkaderan maka dilihat lagi keaktifannya dalam berpartisipasi dalam kegiatan yang di selenggarakan UKM Tae Kwon Do PNUP dan keaktifan latihan nya dan mengikuti MUBES maka disebut ANGGOTA TETAP\n', '', '1. Pengkaderan\n2. Kepelatihan\n3. Kesektariatan\n4. Dana dan logistik\n5. Hubungan masyarakat\n', 'UKM Taekwondo adalah organisasi kemahasiswaan yang berfungsi sebagai wadah bagi mahasiswa dalam menyalurkan minatnya dibidang bela diri taekwondo.', 'taekwondo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil_spk`
--

CREATE TABLE `tb_hasil_spk` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `id_minat` varchar(10) DEFAULT NULL,
  `bakat` varchar(50) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
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
-- Dumping data untuk tabel `tb_hasil_spk`
--

INSERT INTO `tb_hasil_spk` (`id`, `id_jurusan`, `prodi`, `id_minat`, `bakat`, `hobi`, `kelas_hasil`, `nilai_wirausaha`, `nilai_kemanusiaan`, `nilai_senior`, `nilai_mapala`, `nilai_persma`, `nilai_bahasa`, `nilai_pramuka`) VALUES
(1, 3, 'Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Mendengar Musik', 'Bahasa', 0, 5.4357040214459, 2.3449361190607, 0, 0, 6.3115900213068, 0),
(2, 3, 'Teknik Komputer dan Jaringan', 'Jurnalisti', 'Lainnya', 'Main Game', 'Bahasa', 0, 0, 0, 0, 0, 2.7682412374153, 0),
(3, 3, 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi', 'Persma', 1.2200063999202, 2.83601948945, 3.3670877607025, 0, 9.1912695847572, 0.0002184781161, 0),
(4, 3, 'Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)', 0, 1.0871408042892, 8.4417700286184, 0, 2.1446295697767, 3.8755377323814, 1.1681369617225),
(5, 3, 'Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Main Game', 'Bahasa', 0, 0, 0.0001526012274, 0, 2.1446295697767, 2.7682412374153, 0),
(6, 4, 'Teknik Kimia', 'Olahraga', 'Olahraga', 'Main Game', 'Persma', 0, 0, 0.0001126342393, 0, 4.0033085302498, 2.9293558067886, 0),
(7, 3, 'Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)', 1.4233407999069, 1.418009744725, 1.491138865454, 0, 1.3786904377136, 0.0004369562322, 0),
(8, 2, 'Akuntansi Manajerial', '2', 'Seni', 'Bulu Tangkis', 'Bahasa', 0, 2.110133548698, 2.6240951808536, 0, 0, 9.1260700134569, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobi`
--
ALTER TABLE `hobi`
  ADD PRIMARY KEY (`id_hobi`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `minat`
--
ALTER TABLE `minat`
  ADD PRIMARY KEY (`id_minat`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_data_testing`
--
ALTER TABLE `tb_data_testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_training`
--
ALTER TABLE `tb_data_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_ukm`
--
ALTER TABLE `tb_data_ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hasil_spk`
--
ALTER TABLE `tb_hasil_spk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data_testing`
--
ALTER TABLE `tb_data_testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tb_data_training`
--
ALTER TABLE `tb_data_training`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;
--
-- AUTO_INCREMENT for table `tb_data_ukm`
--
ALTER TABLE `tb_data_ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_hasil_spk`
--
ALTER TABLE `tb_hasil_spk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
