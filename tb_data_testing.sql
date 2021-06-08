-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jul 2020 pada 03.08
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
(1, 'Teknik Kimia', 'Teknik Kimia', 'Bahasa', 'Lainnya', 'Olahraga', 'Bahasa', 'Pramuka', 0, 0, 0, 0, 2.7451258493142, 0, 5.8406848086124),
(2, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Bahasa', 'Desain grafis', 'Bahasa', 'Wirausaha', 2.7653478398191, 0, 1.5632907460405, 0, 0, 1.3216577395044, 0),
(3, 'Teknik Kimia', 'Teknik Kimia', 'Wirausaha', 'Bahasa', 'Belajar bahasa asing baru', 'Bahasa', 'Bahasa', 0, 0, 1.6509037438955, 0, 0, 3.5490272274555, 0),
(4, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'Bahasa', 2.104069008558, 0, 1.9326396585665, 0, 0, 8.0917820785985, 0),
(5, 'Administrasi Niaga', 'Administrasi Bisnis', 'Bahasa', 'Lainnya', 'Menulis', 'Bahasa', 'Persma', 0, 0, 0, 0, 8.5785182791067, 0, 0),
(6, 'Teknik Mesin', 'Teknik Manufaktur', 'Olahraga', 'Olahraga', 'Membaca', 'Bahasa', 'Bahasa', 0, 0, 3.1791922383419, 0, 0, 4.4819143843866, 0),
(7, 'Teknik Sipil', 'Teknik Konstruksi Gedung', 'Olahraga', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'SENIOR (senior, bola, karate, taekwondo)', 0, 1.9694579787848, 2.5231684431285, 0, 0, 1.0647081682366, 0),
(8, 'Akuntansi', 'Akuntansi Manajerial', 'Seni', 'Bahasa', 'Bulu Tangkis', 'Bahasa', 'Bahasa', 2.104069008558, 0, 1.9326396585665, 0, 0, 8.0917820785985, 0),
(9, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Olahraga', 'Bahasa', 'Membaca', 'Bahasa', 'Bahasa', 0, 2.9778204639226, 4.2389229844558, 0, 1.8382539169514, 4.5048985607168, 0),
(10, 'Teknik Elektro', 'Teknik Listrik', 'Seni', 'Bahasa', 'Desain grafis', 'Bahasa', 'Wirausaha', 2.7653478398191, 0, 1.5632907460405, 0, 0, 1.3216577395044, 0),
(11, 'Teknik Sipil', 'Teknik Konstruksi Jalan dan Jembatan', 'Kemanusiaan', 'Lainnya', 'Travelling', 'Bahasa', 'Bahasa', 0, 0, 2.5124315561364, 0, 0, 7.1183346104964, 0),
(12, 'Teknik Mesin', 'Teknik Konversi Energi', 'Olahraga', 'Lainnya', 'Main Game', 'Kemanusiaan (ksr, humaniora)', 'Bahasa', 0, 0, 7.6536109441564, 0, 0, 9.8865758479117, 0),
(13, 'Teknik Elektro', 'Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Travelling', 'Kemanusiaan (ksr, humaniora)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 3.5733845567071, 7.2151880586482, 0, 0, 4.4291859798644, 0),
(14, 'Teknik Mesin', 'Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 4.1414887782445, 2.0192505469689, 0, 0, 0, 0),
(15, 'Teknik Elektro', 'Teknik Listrik', 'Kesehatan', 'Olahraga', 'Main Game', 'Kemanusiaan (ksr, humaniora)', 'SENIOR (senior, bola, karate, taekwondo)', 1.9520102398723, 0, 7.5037955809942, 0, 3.5743826162945, 1.6148073884922, 0),
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
(29, 'Teknik Elektro', 'Teknik Listrik', 'Olahraga', 'Bahasa', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)', 'Bahasa', 0, 3.3086894043584, 2.9389866025561, 0, 3.0637565282524, 3.4780466829064, 0),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
