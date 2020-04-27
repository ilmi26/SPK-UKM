-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Apr 2020 pada 15.30
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
-- Struktur dari tabel `tb_data_mhs`
--

CREATE TABLE `tb_data_mhs` (
  `nama` varchar(200) DEFAULT NULL,
  `nim` int(20) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `minat` varchar(50) DEFAULT NULL,
  `bakat` varchar(50) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_mhs`
--

INSERT INTO `tb_data_mhs` (`nama`, `nim`, `jurusan`, `prodi`, `minat`, `bakat`, `hobi`) VALUES
('Nurul Ailmi', 42516008, 'Elektro', 'D4 TKJ', 'Wirausaha Seni ', 'Olahraga Seni ', 'Nonton Membaca Olahraga Menyanyi ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_testing`
--

CREATE TABLE `tb_data_testing` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
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

INSERT INTO `tb_data_testing` (`id`, `nama`, `nim`, `jurusan`, `prodi`, `minat`, `bakat`, `hobi`, `label`, `kelas_hasil`, `nilai_wirausaha`, `nilai_kemanusiaan`, `nilai_senior`, `nilai_mapala`, `nilai_persma`, `nilai_bahasa`, `nilai_pramuka`) VALUES
(1, 'Cahyaningsih Dwi Putri Vitandy', 43219030, 'Teknik Kimia', 'D4 Teknologi Kimia Industri', 'Bahasa', 'Bahasa', 'Membaca, Belajar Bahasa Asing Baru', 'Bahasa', 'Wirausaha', 0, 0, 0, 0, 0, 0, 0),
(2, 'Syifa Badriyyah', 43219040, 'Teknik Kimia', 'D4 Teknologi Kimia Industri', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa', 'Bahasa', 0, 0, 0, 0, 0, 0, 0),
(3, 'Bayu Prana Widya Awighna', 43219035, 'Teknik Kimia', 'D4 Teknik Kimia', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa', 'Bahasa', 0, 0, 0, 0, 0, 0, 0),
(4, 'Dwika Wulandari', 46116052, 'Akuntansi', 'D4 Akuntansi', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa', 'Bahasa', 0, 0, 0, 0, 0, 0, 0),
(5, 'Andi Lisna Octria', 33117510, 'Teknik Kimia', 'D4 Teknik Kimia', 'Kesehatan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 0, 0, 0, 0, 0, 0),
(6, 'Aulia putri', 33118506, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Kesehatan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 0, 0, 0, 0, 0, 0),
(7, 'Muh Arif Rahmansyah', 44217022, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Kesehatan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)', 'Kemanusiaan (ksr, humaniora)', 0, 0, 0, 0, 0, 0, 0),
(8, 'Rismawati', 33116038, 'Teknik Kimia', 'D3 Teknik Kimia', 'Kemanusiaan', 'Seni', 'Memasak, Jalan-Jalan', 'Kemanusiaan (ksr, humaniora)', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(9, 'Ahmad Sakariah', 34118001, 'Teknik Mesin', 'D3 Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)', 'Pecinta Alam (MAPALA)', 0, 0, 0, 0, 0, 0, 0),
(10, 'Faisal Fadlur Rahman', 34118009, 'Teknik Mesin', 'D3 Teknik Mesin', 'Pecinta Alam', 'Seni', 'Olahraga, Naik Gunung', 'Pecinta Alam (MAPALA)', 'Pecinta Alam (MAPALA)', 0, 0, 0, 0, 0, 0, 0),
(11, 'Eghi Xlesiya Palinggi', 34118007, 'Teknik Mesin', 'D3 Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'Pecinta Alam (MAPALA)', 'Pecinta Alam (MAPALA)', 0, 0, 0, 0, 0, 0, 0),
(12, 'Risna Dewi', 35118046, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Pecinta Alam', 'Seni', 'Olahraga, Naik Gunung', 'Pecinta Alam (MAPALA)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 0, 0, 0, 0, 0),
(13, 'Ridha Mardiati Waris', 33118008, 'Teknik Kimia', 'D3 Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis, Membaca', 'Persma', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(14, 'A Nuraini', 42517001, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Menulis, Membaca', 'Persma', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(15, 'Hanif Nugroho Jati', 42518065, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Menulis', 'Persma', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(16, 'Nur Halisa Herina', 42218016, 'Teknik Elektro', 'D4 Teknik Listrik', 'Jurnalistik', 'Bahasa', 'Menyanyi, Menggambar, Fotografi, Membaca, Bermain Musik, Jalan-Jalan, Belajar Bahasa Asing Baru, Des', 'Persma', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(17, 'Muh. Faisal Julianto Putra', 42117039, 'Teknik Elektro', 'D4 Teknik Listrik', 'Pramuka', 'Olahraga', 'Bulu Tangkis, Basket', 'Pramuka', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(18, 'Muh. Farid Rusdi', 42117049, 'Teknik Elektro', 'D4 Teknik Listrik', 'Pramuka', 'Seni', 'Main Musik', 'Pramuka', 'Persma', 0, 0, 0, 0, 0, 0, 0),
(19, 'Rastutu', 34217033, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Pramuka', 'Kalibrasi Alat Ukur', 'Olahraga', 'Pramuka', 'Pramuka', 0, 0, 0, 0, 0, 0, 0),
(20, 'Andi Chaerul Aksha Pratama', 44418004, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka', 'Pramuka', 0, 0, 0, 0, 0, 0, 0),
(21, 'M Ilham', 33117503, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Sepak Bola, Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 0, 0, 0, 0, 0),
(22, 'Alpian', 33117519, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Sepak Bola, Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 0, 0, 0, 0, 0),
(23, 'Andi Ryan Rinaldi', 33117508, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Sepak Bola, Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 0, 0, 0, 0, 0),
(24, 'Afrilla Madyana Nari', 33119028, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 0, 0, 0, 0, 0),
(25, 'Nur Annisa Pratiwi', 36118014, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Olahraga', 'Sepak Bola, Bulu Tangkis, Olahraga', 'Wirausaha', 'SENIOR (senior, bola, karate, taekwondo)', 0, 0, 0, 0, 0, 0, 0),
(26, 'Nur Fadli Alamsyah Nasir', 42617016, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Wirausaha', 'Seni', 'Sepak Bola, Bulu Tangkis, Bermain Musik', 'Wirausaha', 'Wirausaha', 0, 0, 0, 0, 0, 0, 0),
(27, 'Muh Abdal', 34318022, 'Teknik Mesin', 'D3 Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Olahraga', 'Wirausaha', 'Kemanusiaan (ksr, humaniora)', 0, 0, 0, 0, 0, 0, 0),
(28, 'Wahidah', 35118051, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca, Nonton', 'Wirausaha', 'Wirausaha', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_training`
--

CREATE TABLE `tb_data_training` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
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

INSERT INTO `tb_data_training` (`id`, `nama`, `nim`, `jurusan`, `prodi`, `minat`, `bakat`, `hobi`, `label`) VALUES
(1, 'Laila Ramadhani Zakaria', 42516016, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Nonton', 'Bahasa'),
(2, 'Adelia Rauf', 42516023, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Membaca, Nonton', 'Bahasa'),
(3, 'Widya Angraeni Arifin', 36116024, 'Akuntansi', 'D3 Akuntansi', 'Bahasa', 'Seni', 'Menari, Menyanyi, Belajar Bahasa Asing Baru', 'Bahasa'),
(4, 'Afifah Rahmi Maricar', 46117065, 'Akuntansi', 'D4 Akuntansi Manajerial ', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(5, 'Sabil', 33117024, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Pecinta Alam', 'Lainnya', 'Naik Gunung', 'Bahasa'),
(6, 'Alfian Hidayat', 31117006, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Kemanusiaan', 'Lainnya', 'Olahraga, Belajar Bahasa Asing Baru', 'Bahasa'),
(7, 'Sulfikar', 31118506, 'Teknik Sipil', 'D3 Teknik Konstruksi Jalan dan Jembatan', 'Seni', 'Seni', 'Bermain Musik, Belajar Bahasa Asing Baru', 'Bahasa'),
(8, 'Arfiyani Suharto', 33119002, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(9, 'Andi Nurwaqiah Iradewi', 43219033, 'Teknik Kimia', 'D4 Teknik Kimia', 'Bahasa ', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(10, 'Muhammad Fauzan Bahri', 42518018, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(11, 'Nurfadilah Said', 31118019, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(12, 'Franklin Aditama Katoende', 32217017, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Lainnya', 'Menulis, Sepak Bola, Belajar Matematika, Olahraga, Main Game, Belajar Bahasa Asing Baru', 'Bahasa'),
(13, 'Andi Muhammad Akbar R', 42517024, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Seni', 'Menggambar', 'Bahasa'),
(14, 'Wishnu Wardhana', 42517023, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Main Game, Ngemil', 'Bahasa'),
(15, 'Agus Purnawan', 42517027, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Bulu Tangkis', 'Bahasa'),
(16, 'Erwin', 42517031, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'Bahasa'),
(17, 'Ivana Yuni Astari', 42517044, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Bulu Tangkis', 'Bahasa'),
(18, 'Nur Ahsan Adzim', 42517013, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Nonton', 'Bahasa'),
(19, 'Sukardi Made', 42517028, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(20, 'Muhammad Abishar', 42518042, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Digital Art', 'Bahasa'),
(21, 'Muhammad Nisam Sumule', 44318014, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(22, 'Khafifah Hamzah', 32218010, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(23, 'Suci salsabila', 32118090, 'Teknik Elektro', 'D3 Teknik Listrik', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(24, 'Diffary Ramadhan Halun', 42516014, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Bahasa', 'Bulu Tangkis, Basket, Main Game, Belajar Bahasa Asing Baru', 'Bahasa'),
(25, 'Nur Aksanul Haq', 42516028, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bermain Musik, Main Game', 'Bahasa'),
(26, 'Irman Mashuri', 42516038, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menggambar, Main Game', 'Bahasa'),
(27, 'Y Nimrod Leori', 42516006, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi, Fotografi, Bermain Musik, Main Game, Jalan-Jalan, Belajar Bahasa Asing Baru', 'Bahasa'),
(28, 'Muh Nurhidayat', 42516001, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Olahraga, Desain Grafis', 'Bahasa'),
(29, 'Uswatun Hasanah Masnur', 42516031, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Nonton, Jalan-Jalan', 'Bahasa'),
(30, 'Muhammad Takbiratul Ihram Azkaa Ramadhan Chaeruddin', 33117072, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(31, 'Muhammad Bahri', 44419040, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Olahraga', 'Olahraga', 'Olahraga', 'Bahasa'),
(32, 'Muhammad Aswan Nur', 33117001, 'Teknik Kimia', 'D3 Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis', 'Bahasa'),
(33, 'Laode Muhamad Aslan', 42518037, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket, Bermain Musik', 'Bahasa'),
(34, 'Agung Indrawan', 42517048, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bela Diri', 'Olahraga', 'Basket, Bermain Musik', 'Bahasa'),
(35, 'Afdhal Ramadhana', 31118027, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Bahasa', 'Bahasa', 'Belajar Bahasa Asing Baru', 'Bahasa'),
(36, 'Aswar Rusydi ', 45216068, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Olahraga', 'Seni', 'Olahraga', 'Bahasa'),
(37, 'Nur Fadilah Sawal', 46117045, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Menulis, Belajar Matematika, Membaca, Nonton, Belajar Bahasa Asing Baru', 'Bahasa'),
(38, 'Rini Atika Pangloli', 46117040, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Seni', 'Menulis, Membaca', 'Bahasa'),
(39, 'Gunawan', 32217070, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Sepak Bola', 'Bahasa'),
(40, 'Dimas Adinda Prakasa Altris', 42117015, 'Teknik Elektro', 'D4 Teknik Listrik', 'Olahraga', 'Olahraga', 'Naik Gunung', 'Bahasa'),
(41, 'Teguh Julianto', 32217023, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Bulu Tangkis', 'Bahasa'),
(42, 'Andi Muh. Aqmal Insan Fahri', 34218030, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Bahasa', 'Olahraga', 'Main Game', 'Bahasa'),
(43, 'Muhammad Aqil Fakhrul', 32218042, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Main Game', 'Bahasa'),
(44, 'Nur Azizah Karim', 42117016, 'Teknik Elektro', 'D4 Teknik Listrik', 'Bahasa', 'Seni', 'Membaca', 'Bahasa'),
(45, 'Nur Fadilla', 35118041, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Nonton, Jalan-Jalan', 'Bahasa'),
(46, 'Wiwi Dwiyanti', 35118063, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Olahraga', 'Bahasa', 'Memasak, Nonton', 'Bahasa'),
(47, 'Sri Hastuti Syahrir', 45217066, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(48, 'Aulia Amelia Suriani', 45217019, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Olahraga', 'Olahraga', 'Bulu Tangkis', 'Bahasa'),
(49, 'Fadhiliana Dinda Savitri K', 45217054, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Seni', 'Seni', 'Membaca, Nonton', 'Bahasa'),
(50, 'Michael Joshua H', 32217053, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Basket, Main Game', 'Bahasa'),
(51, 'Andini Aulia Putri', 32218031, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Seni', 'Membaca', 'Bahasa'),
(52, 'Astriana', 32218004, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Seni', 'Seni', 'Mendengar Musik, Nonton', 'Bahasa'),
(53, 'Noorfadila', 32218046, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Olahraga', 'Bahasa', 'Membaca', 'Bahasa'),
(54, 'Nurhikmah Tajuddin', 32218019, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Membaca, Nonton', 'Bahasa'),
(55, 'Siti Amaliah Praja Primatanti', 45217025, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Berenang', 'Bahasa'),
(56, 'Mukarrama Abdul Muis', 46116012, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Travelling, Main Musik', 'Bahasa'),
(57, 'Sri Mulyati Idris', 45217015, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Seni', 'Olahraga', 'Menyanyi', 'Bahasa'),
(58, 'Chaerani Angel T', 32218033, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Memasak, Membaca', 'Bahasa'),
(59, 'Inayah Chintaki M.Z', 46118012, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Seni', 'Membaca, Nonton', 'Bahasa'),
(60, 'Muh. Ardhi', 32118091, 'Teknik Elektro', 'D3 Teknik Listrik', 'Bahasa', 'Olahraga', 'Main Game', 'Bahasa'),
(61, 'Nirwana', 36118045, 'Akuntansi', 'D3 Akuntansi', 'Bahasa', 'Seni', 'Jalan-Jalan', 'Bahasa'),
(62, 'Nur Ainin Ansar', 46118019, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Seni', 'Nonton, Membaca', 'Bahasa'),
(63, 'Pratiwi Rahmelia Muda', 44318019, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Seni', 'Olahraga', 'Olahraga, Membaca', 'Bahasa'),
(64, 'Sefnice Rantelembang', 36118019, 'Akuntansi', 'D3 Akuntansi', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(65, 'Syamsul Alam Usrha', 32118080, 'Teknik Elektro', 'D3 Teknik Listrik', 'Seni', 'Seni', 'Main Musik', 'Bahasa'),
(66, 'Sri Rahayu', 46117034, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Seni', 'Bahasa', 'Membaca', 'Bahasa'),
(67, 'Nicolaus Richard Arif Lisu Allo', 45217018, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Nonton, Membaca, Jalan-Jalan', 'Bahasa'),
(68, 'Andreas Caesario Mangeka', 46117043, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga, Membaca', 'Bahasa'),
(69, 'Erni Ramayanti', 36118011, 'Akuntansi', 'D3 Akuntansi', 'Bahasa', 'Seni', 'Menyanyi, Membaca', 'Bahasa'),
(70, 'Lugis Parwandi', 44318009, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(71, 'Meuthia Wulandari Yasin', 46119012, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(72, 'Muhammad Azhar', 44218010, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(73, 'Sherlyana Melinda Mamba Ary', 31118016, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(74, 'Ummu Atia Ahmad', 35118075, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Bahasa', 'Bahasa', 'Nonton, Membaca', 'Bahasa'),
(75, 'Bismar Alkindi Tamrin', 46117009, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga, Nonton', 'Bahasa'),
(76, 'Rijaldi  Naqsyabandi', 32317013, 'Teknik Elektro', 'D3 Teknik Elektronika', 'Olahraga', 'Olahraga', 'Travelling ', 'Bahasa'),
(77, 'Eky Arjayanto Nurhasana', 42518035, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Travelling', 'Bahasa'),
(78, 'Farah Ardhia Maharina', 32218036, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(79, 'Nadia Salsadea', 46117015, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Seni', 'Menari, Menyanyi', 'Bahasa'),
(80, 'Nikma Haeruddin', 31118017, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Bahasa', 'Olahraga', 'Bulu Tangkis', 'Bahasa'),
(81, 'Zulkifli', 44218025, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Seni', 'Bahasa', 'Membaca', 'Bahasa'),
(82, 'Nurjannah', 42117004, 'Teknik Elektro', 'D4 Teknik Listrik', 'Bahasa', 'Seni', 'Menyanyi, Membaca', 'Bahasa'),
(83, 'Andi Rindang Ananda', 36118025, 'Akuntansi', 'D3 Akuntansi', 'Bahasa', 'Bahasa', 'Menari, Membaca', 'Bahasa'),
(84, 'Dimas Fahmi Fahrul Roji', 44317011, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(85, 'Mohammad Normansyah', 46118015, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Nonton', 'Bahasa'),
(86, 'Nur Inayah Nopiansyah', 32218017, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Kesehatan', 'Seni', 'Jalan-Jalan', 'Bahasa'),
(87, 'Nurfadillah', 32218014, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Seni', 'Bahasa', 'Membaca', 'Bahasa'),
(88, 'Sri Radika', 32218023, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Olahraga', 'Mendengar Musik, Nonton', 'Bahasa'),
(89, 'Winda Setiawardani', 32117030, 'Teknik Elektro', 'D3 Teknik Listrik', 'Seni', 'Bahasa', 'Desain Grafis', 'Bahasa'),
(90, 'Ade Satya Parakai', 46117024, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(91, 'Ahmad Adriansyah Ilham', 32218002, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Membaca, Main Game', 'Bahasa'),
(92, 'Ahmad Rifky Muflizar', 42117022, 'Teknik Elektro', 'D4 Teknik Listrik', 'Bahasa', 'Olahraga', 'Futsal', 'Bahasa'),
(93, 'Aulia Rahma Sudirman', 32218005, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Seni', 'Menggambar', 'Bahasa'),
(94, 'Nadiah Nursahbani Rala', 46118042, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Seni', 'Menyanyi', 'Bahasa'),
(95, 'Naudzatul Ullah Amaliya', 34217018, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(96, 'Rifal Idsal Muh. Nasruddin', 31218050, 'Teknik Sipil', 'D3 Teknik Konstruksi Jalan dan Jembatan', 'Bahasa', 'Olahraga', 'Futsal, Bulu Tangkis', 'Bahasa'),
(97, 'Wayan Yudawijaya', 46116067, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Olahraga', 'Olahraga', 'Bahasa'),
(98, 'Maskur Al Munawar', 31218014, 'Teknik Sipil', 'D3 Teknik Konstruksi Jalan dan Jembatan', 'Kemanusiaan', 'Relawan', 'Traveling, Editing', 'Bahasa'),
(99, 'Misbawati', 33218010, 'Teknik Kimia', 'D3 Analisis Kimia', 'Kemanusiaan', 'Tilawah', 'Memasak, Membaca', 'Bahasa'),
(100, 'Muh. Ilham Hanafi', 31116028, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Olahraga', 'Seni', 'Main Game', 'Bahasa'),
(101, 'Andi Nurul Islamiati ', 33116063, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Bahasa', 'Bahasa', 'Menulis, Membaca', 'Bahasa'),
(102, 'Reynaldy Noel', 33117012, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bahasa', 'Bahasa', 'Membaca', 'Bahasa'),
(103, 'M Yusril', 33117521, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(104, 'Rizky Amalia', 33117520, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Kemanusiaan', 'Lainnya', 'Bulu Tangkis', 'Kemanusiaan (ksr, humaniora)'),
(105, 'Ahmad Faiz', 34316016, 'Teknik Mesin', 'D3 Teknik Otomotif', 'Wirausaha', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(106, 'Nurjannah', 42117007, 'Teknik Elektro', 'D4 Teknik Listrik', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(107, 'Wahyu Lesmana', 32117025, 'Teknik Elektro', 'D3 Teknik Listrik', 'Kesehatan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(108, 'Berlianto Kurnia Sakti', 31118008, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Kesehatan', 'Seni', 'Olahraga, Bermain Musik', 'Kemanusiaan (ksr, humaniora)'),
(109, 'Andi Muhammad Fikri', 42117008, 'Teknik Elektro', 'D4 Teknik Listrik', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(110, 'Nur Ash Shafani Tamar MDH', 33116027, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Kemanusiaan', 'Seni', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(111, 'Ahmad Kholil Al Farahidy', 34316024, 'Teknik Mesin', 'D3 Teknik Otomotif', 'Seni', 'Seni', 'Travelling', 'Kemanusiaan (ksr, humaniora)'),
(112, 'Olivia', 46116099, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Kemanusiaan', 'Seni', 'Travelling', 'Kemanusiaan (ksr, humaniora)'),
(113, 'Ayub Lois', 34316023, 'Teknik Mesin', 'D3 Teknik Otomotif', 'Olahraga', 'Olahraga', 'Volly', 'Kemanusiaan (ksr, humaniora)'),
(114, 'Inri Meiliska', 46117012, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Bahasa', 'Bahasa', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(115, 'Fauzan Akbar', 32217067, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(116, 'Satiana', 46118048, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Olahraga', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(117, 'Muh. Akbar M.', 32118041, 'Teknik Elektro', 'D3 Teknik Listrik', 'Kemanusiaan', 'Olahraga', 'Membaca, Nonton', 'Kemanusiaan (ksr, humaniora)'),
(118, 'Dwi Nata Putra', 32118033, 'Teknik Elektro', 'D3 Teknik Listrik', 'Bela Diri', 'Bela Diri', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(119, 'Yustina', 32218026, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Seni', 'Desain', 'Olahraga, Bermain Musik', 'Kemanusiaan (ksr, humaniora)'),
(120, 'Sry Muliana Muliadi', 32218043, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Kemanusiaan', 'Seni', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(121, 'Mega Kadir', 46118039, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Olahraga', 'Volly, Desain Grafis', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(122, 'Neneng Nurdayanti Idar', 33118042, 'Teknik Kimia', 'D3 Teknik Kimia', 'Olahraga', 'Berenang', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(123, 'Arini', 33218003, 'Teknik Kimia', 'D3 Analisis Kimia', 'Seni', 'Seni', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(124, 'Anita Karmila', 33218002, 'Teknik Kimia', 'D3 Analisis Kimia', 'Olahraga', 'Olahraga', 'Membaca, Naik Gunung', 'Kemanusiaan (ksr, humaniora)'),
(125, 'Agil Aprilla', 32218029, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Seni', 'Seni', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(126, 'Salsabila Hasnurdini', 33218019, 'Teknik Kimia', 'D3 Analisis Kimia', 'Olahraga', 'Olahraga', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(127, 'Muh. Nur Aslam', 34317018, 'Teknik Mesin', 'D3 Teknik Otomotif', 'Seni', 'Seni', 'Futsal', 'Kemanusiaan (ksr, humaniora)'),
(128, 'Muh. Haeril', 34217038, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Kemanusiaan', 'Mekanik', 'Futsal', 'Kemanusiaan (ksr, humaniora)'),
(129, 'Ansar', 32217093, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Olahraga', 'Volly', 'Volly, Naik Gunung', 'Kemanusiaan (ksr, humaniora)'),
(130, 'Restiani Ratu Tipa', 32317021, 'Teknik Elektro', 'D3 Teknik Elektronika', 'Seni', 'Seni', 'Memasak, Membaca', 'Kemanusiaan (ksr, humaniora)'),
(131, 'Oktavianti Lulu', 32217038, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Seni', 'Seni', 'Mendengar Musik, Nonton', 'Kemanusiaan (ksr, humaniora)'),
(132, 'Nur Intan Maayasari', 44217019, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Olahraga', 'Seni', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(133, 'Isabella Sulkifli', 42116029, 'Teknik Elektro', 'D4 Teknik Listrik', 'Seni', 'Seni', 'Nonton, Jalan-Jalan', 'Kemanusiaan (ksr, humaniora)'),
(134, 'Aswati Pratiwi ', 32218032, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bahasa', 'Bahasa', 'Menulis, Nonton, Main Game, Belajar Bahasa Asing Baru', 'Kemanusiaan (ksr, humaniora)'),
(135, 'Septy Ainun Ariati', 42517006, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Menari, Menyanyi, Memasak, Bulu Tangkis, Belajar Matematika, Olahraga, Bermain Musik, Nonton, Main G', 'Kemanusiaan (ksr, humaniora)'),
(136, 'Muhammad Fadliyadi', 33117044, 'Teknik Kimia', 'D3 Teknik Kimia', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(137, 'Andi Muhammad Fikri', 42117008, 'Teknik Elektro', 'D4 Teknik Listrik', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(138, 'Muhammad Zulfikar Budi', 42117012, 'Teknik Elektro', 'D4 Teknik Listrik', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(139, 'Afahri Rahmadani', 34217036, 'Teknik Mesin', 'D3 Mekatronika', 'Seni', 'Seni', 'Menyanyi', 'Kemanusiaan (ksr, humaniora)'),
(140, 'Arfan Jaya', 42117002, 'Teknik Elektro', 'D4 Teknik Listrik', 'Olahraga', 'Seni', 'Bermain Alat Musik', 'Kemanusiaan (ksr, humaniora)'),
(141, 'Syawal', 34118050, 'Teknik Mesin', 'D3 Teknik Mesin', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(142, 'Titin Hardiyanti', 33217011, 'Teknik Kimia', 'D3 Analisis Kimia', 'Seni', 'Seni', 'Jalan-Jalan', 'Kemanusiaan (ksr, humaniora)'),
(143, 'Khairunnas', 32217095, 'Teknik Elektro', 'D3 Telekomunikasi', 'Kemanusiaan', 'Seni', 'Menyanyi, Menggambar, Fotografi, Membaca', 'Kemanusiaan (ksr, humaniora)'),
(144, 'Nurul Anggrainy S', 45216012, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Kemanusiaan', 'Bahasa', 'Nonton', 'Kemanusiaan (ksr, humaniora)'),
(145, 'Nursafitri', 45216022, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Seni', 'Seni', 'Menyanyi, Menari, Menggambar', 'Kemanusiaan (ksr, humaniora)'),
(146, 'Mirsa Shintia Utami ', 45216032, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Kemanusiaan', 'Seni', 'Menyanyi', 'Kemanusiaan (ksr, humaniora)'),
(147, 'Uswatun Hasanah', 42617005, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Seni', 'Seni', 'Menggambar', 'Kemanusiaan (ksr, humaniora)'),
(148, 'Nurfadhilah', 42617011, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Seni', 'Seni', 'Menulis', 'Kemanusiaan (ksr, humaniora)'),
(149, 'Selvi', 33217014, 'Teknik Kimia', 'D3 Analisis Kimia', 'Kemanusiaan', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(150, 'Arisma', 33217013, 'Teknik Kimia', 'D3 Analisis Kimia', 'Olahraga', 'Olahraga', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(151, 'Fitri Khaerunnisa', 46117044, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Jurnalistik', 'Olahraga', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(152, 'Iin Kurniasih', 35118037, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Jurnalistik', 'Seni', 'Menyanyi, Menulis, Menggambar, Fotografi, Sepak Bola, Bulu Tangkis, Olahraga, Membaca, Nonton, Jalan', 'Kemanusiaan (ksr, humaniora)'),
(153, 'Rezki Ramadhan', 46118045, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Kemanusiaan', 'Seni', 'Olahraga, Nonton', 'Kemanusiaan (ksr, humaniora)'),
(154, 'Yupita Febriani Mintu', 42516024, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Membaca', 'Kemanusiaan (ksr, humaniora)'),
(155, 'Diah Athifah Mahdiyah', 33117008, 'Teknik Kimia', 'D3 Teknik Kimia', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(156, 'Ruswandi', 42618023, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(157, 'Ahmad Fauzi', 43217006, 'Teknik Kimia', 'D4. Teknologi kimia industri', 'Kesehatan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(158, 'Fannyari Rannu', 33116018, 'Teknik Kimia', 'D3 Teknik Kimia', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Kemanusiaan (ksr, humaniora)'),
(159, 'A M Akram Arief', 33117505, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menyanyi, Olahraga, Bermain Musik', 'Pecinta Alam (MAPALA)'),
(160, 'Risal Muhaimin', 33117517, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Pecinta Alam', 'Lainnya', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(161, 'Nurul Aqsha', 43219057, 'Teknik Kimia', 'D4 Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis, Naik Gunung', 'Pecinta Alam (MAPALA)'),
(162, 'Wahyu Nugraha', 34118024, 'Teknik Mesin', 'D3 Teknik Mesin', 'Pecinta Alam', 'Olahraga', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(163, 'Nur Syamsu Prasetyo', 32118048, 'Teknik Elektro', 'D3 Teknik Listrik', 'Pecinta Alam', 'Seni', 'Olahraga', 'Pecinta Alam (MAPALA)'),
(164, 'Nur Aisya', 44318016, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Pecinta Alam', 'Seni', 'Naik Gunung', 'Pecinta Alam (MAPALA)'),
(165, 'Nur Annisa Wulandari', 43219041, 'Teknik Kimia', 'D4 Teknologi Kimia Industri ', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'Persma'),
(166, 'Ismi Hikmawati Azizah', 33117003, 'Teknik Kimia', 'D3 Teknik Kimia', 'Jurnalistik', 'Bahasa', 'Menulis, Belajar Bahasa Asing Baru', 'Persma'),
(167, 'Ardiansyah', 33117014, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bahasa', 'Bahasa', 'Menulis, Belajar Bahasa Asing Baru', 'Persma'),
(168, 'Pitriani', 46117011, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Jurnalistik', 'Lainnya', 'Menulis, Membaca', 'Persma'),
(169, 'Zul Ainun', 33119024, 'Teknik Kimia', 'D3 Teknik Kimia', 'Jurnalistik', 'Lainnya', 'Menulis', 'Persma'),
(170, 'Yuliana', 33117021, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Bela Diri', 'Olahraga', 'Menulis, Olahraga', 'Persma'),
(171, 'Aisyah Amini Amaari Suhud', 42518054, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Membaca', 'Persma'),
(172, 'Andi Nurmala Darni', 42518031, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Olahraga', 'Olahraga', 'Persma'),
(173, 'Vivin Allolayuk', 33116065, 'Teknik Kimia ', 'D3 Teknik Kimia ', 'Olahraga', 'Olahraga', 'Membaca', 'Persma'),
(174, 'Nur Huda AR', 36117035, 'Akuntansi', 'D3 Akuntansi', 'Jurnalistik', 'Seni', 'Main Game', 'Persma'),
(175, 'Adinda Putri Utami', 32217092, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Jurnalistik', 'Seni', 'Menari', 'Persma'),
(176, 'Taufiq Hidayat', 32218024, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Jurnalistik', 'Desiain Grafis', 'Menulis, Fotografi, Belajar Matematika, Nonton, Main Game, Jalan-Jalan, Desain Grafis', 'Persma'),
(177, 'Ananda Muajibah', 33118003, 'Teknik Kimia', 'D3 Teknik Kimia', 'Jurnalistik', 'Seni', 'Fotografi, Nonton, Main Game, Desain Grafis', 'Persma'),
(178, 'Cahyani Uddin', 45217005, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Jurnalistik', 'Olahraga', 'Fotografi, Membaca, Jalan-Jalan', 'Persma'),
(179, 'Nur Zhafira Tendean', 35118044, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Jurnalistik', 'Seni', 'Jalan-Jalan', 'Persma'),
(180, 'Dwi Apriliansyah', 42117040, 'Teknik elektro', 'D4 Teknik Listrik', 'Pramuka', 'Seni', 'Jalan-Jalan', 'Persma'),
(181, 'Ananda Hidayat', 42117031, 'Teknik Elektro', 'D4 Teknik Listrik', 'Pramuka', 'Olahraga', 'Nonton, Membaca', 'Persma'),
(182, 'Annisa Syaharani Rahman', 32118099, 'Teknik Elektro', 'D3 Teknik Listrik', 'Seni', 'Seni', 'Menyanyi, Menulis, Memasak, Membaca, Nonton, Desain Grafis', 'Persma'),
(183, 'Muh. Taufiqul Araasy', 44418016, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Jurnalistik', 'Olahraga', 'Menggambar, Bulu Tangkis, Nonton, Main Game, Berenang, Volly, Desain Grafis', 'Persma'),
(184, 'Charles Ricardo', 32118093, 'Teknik Elektro', 'D3 Teknik Listrik', 'Jurnalistik', 'Olahraga', 'Membaca', 'Persma'),
(185, 'Abdullah Azzan', 36119002, 'Akuntansi', 'D3 Akuntansi', 'Kemanusiaan', 'Lainnya', 'Olahraga', 'Pramuka'),
(186, 'Nur Anna', 33117511, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Olahraga', 'Olahraga', 'Olahraga, Membaca', 'Pramuka'),
(187, 'Nur Ayu Farahgta Fansab', 42517043, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Pecinta Alam', 'Bahasa', 'Menulis', 'Pramuka'),
(188, 'Muhammad Yusril Zaenal', 42517004, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Jurnalistik', 'Lainnya', 'Futsal, Membaca', 'Pramuka'),
(189, 'Febrianti', 44418008, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Seni', 'Seni', 'Menyanyi, Menari, Menggambar', 'Pramuka'),
(190, 'Yuhyil Jamalika ADP', 44418024, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Olahraga', 'Seni', 'Membaca', 'Pramuka'),
(191, 'A. Nur Hikmah', 44418003, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Pramuka', 'Bahasa', 'Membaca', 'Pramuka'),
(192, 'Agung Harmawan', 44418002, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Pramuka', 'Olahraga', 'Membaca, Main Game', 'Pramuka'),
(193, 'Nurul Fitrianingsi Judda', 44418018, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka'),
(194, 'Abd. Ilham Ramli', 31218028, 'Teknik Sipil', 'D3 Teknik Konstruksi', 'Olahraga', 'Seni', 'Menyanyi, Main Musik', 'Pramuka'),
(195, 'Ammar Arkhab Tahir', 44216016, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka'),
(196, 'Sarkasi Nur', 41216022, 'Teknik Sipil', 'D4 Teknik Konstruksi', 'Pramuka', 'Olahraga', 'Olahraga', 'Pramuka'),
(197, 'Raehanah A. Yusri', 44418019, 'Teknik Mesin', 'D4 Teknik Mekatronika', 'Pramuka', 'Bahasa', 'Memasak', 'Pramuka'),
(198, 'Andi Wely Fauziah', 44218004, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Seni', 'Olahraga', 'Membaca', 'Pramuka'),
(199, 'Syarif Hidayatullah', 42516047, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(200, 'Pratiwi', 45216060, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Olahraga', 'Olahraga', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(201, 'Marwan', 42516037, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola, Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(202, 'Nur Fajriani Jasrah', 42516029, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bulu Tangkis, Mendengar Lagu', 'SENIOR (senior, bola, karate, taekwondo)'),
(203, 'Ridha Ilahi', 33116039, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bela Diri', 'Olahraga', 'Sepak Bola, Bulu Tangkis, Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(204, 'Ahmad Zulkifli', 33117006, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Olahraga', 'Sepak Bola, Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(205, 'Muh Rajab Husain', 42117035, 'Teknik Elektro', 'D4 Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(206, 'Ibrahim S', 32217042, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(207, 'Andi Ajeng Ferawati', 33119032, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Menyanyi, Menggambar, Melukis', 'SENIOR (senior, bola, karate, taekwondo)'),
(208, 'Nurazizah', 33117506, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Seni', 'Lainnya', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(209, 'Nurul Safitra Trimelliana', 31117518, 'Teknik Sipil', 'D3 Teknik Sipil', 'Seni', 'Seni', 'Menari, Menyanyi, Menggambar, Melukis', 'SENIOR (senior, bola, karate, taekwondo)'),
(210, 'Hastawafia', 33119036, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(211, 'Saomi Ramadhani', 33117513, 'Teknik Kimia', 'D3 Teknik Kimia', 'Olahraga', 'Olahraga', 'Sepak Bola, Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(212, 'Andi Sahri Juita ', 33117504, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(213, 'Muhammad Murad Mubaraq', 33117066, 'Teknik Kimia', 'D3 Teknik Kimia', 'Olahraga', 'Olahraga', 'Sepak Bola, Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(214, 'Shafira Aulia', 33117046, 'Teknik Kimia', 'D3 Teknik Kimia', 'Olahraga', 'Olahraga', 'Menyanyi, Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(215, 'Fardiman Jamhal', 33117017, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Sepak Bola, Menyanyi, Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(216, 'M Alaika Tamsil', 35117010, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(217, 'Ahmad Mujahid', 33116003, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Pecinta Alam', 'Lainnya', 'Olahraga, Naik Gunung', 'SENIOR (senior, bola, karate, taekwondo)'),
(218, 'Amelya Fryanti', 33116019, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Bela Diri', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(219, 'Sitti Nurindah', 33117052, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(220, 'Muh Rifqi Anshori', 42116003, 'Teknik Elektro ', 'D4 Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola, Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(221, 'Monita Cahyani', 33116031, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(222, 'Nadia', 46117013, 'Akuntansi ', 'D4 Akuntansi Manajerial', 'Seni', 'Seni', 'Menari, Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(223, 'Alfin Akram Dwi Amir', 42118003, 'Teknik Elektro ', 'D4 Teknik Listrik', 'Bela Diri', 'Bahasa', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(224, 'Abd Muhaimin Harisumato', 42516005, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket, Main Game, Travelling', 'SENIOR (senior, bola, karate, taekwondo)'),
(225, 'Taufik Hidayat', 42516010, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(226, 'Caca', 33118024, 'Teknik kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(227, 'Nur Linda', 33119040, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(228, 'Matahari Palinggi', 42518013, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Basket, Biola', 'SENIOR (senior, bola, karate, taekwondo)'),
(229, 'Uni Pridayanti', 42518024, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(230, 'Muh Fikriansyah Chaerul', 42518016, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Olahraga', 'Sepak Bola, Olahraga, Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(231, 'M Irzhan Syah Imran', 42518038, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(232, 'Nur Rahayu Basri', 42518046, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(233, 'Sri Nurrahayu', 42518050, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca, Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(234, 'Daniel Tampang', 42518034, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga, Mendengar Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(235, 'Edgard Alexander Tamarindang', 42518061, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(236, 'Endang Lidya Rumissing', 42517019, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(237, 'Hasri Ainun Eka P', 42517008, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Wirausaha', 'Olahraga', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(238, 'A Cici Nurmadinah', 42517022, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(239, 'Muhammad Asad Muslimin', 32118070, 'Teknik Elektro', 'D3 Teknik Listrik', 'Olahraga', 'Olahraga', 'Sepak Bola, Bulu Tangkis, Basket', 'SENIOR (senior, bola, karate, taekwondo)'),
(240, 'Dian Merdeka Sari', 45216016, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Seni', 'Seni', 'Menyanyi, Menggambar', 'SENIOR (senior, bola, karate, taekwondo)'),
(241, 'Rahayu Ummu Kalsum Amri', 42517036, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari, Jalan-Jalan', 'SENIOR (senior, bola, karate, taekwondo)'),
(242, 'Andi Fachrul Reza', 42517005, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Bola', 'SENIOR (senior, bola, karate, taekwondo)'),
(243, 'Regena Sherly Padandanan', 42518048, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Lainnya', 'Bisnis', 'SENIOR (senior, bola, karate, taekwondo)'),
(244, 'Ade Elsye Buli', 42518027, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Main Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(245, 'Hastira', 42518036, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Membaca, Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(246, 'Azizah Hadrawi', 42116007, 'Teknik Elektro', 'D4 Teknik Listrik', 'Wirausaha', 'Lainnya', 'Menulis, Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(247, 'Randi A Pandi ', 44216024, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Wirausaha', 'Lainnya', 'Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(248, 'Dwi Indah Purnamawati Yandi', 42517033, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Memasak, Bulu Tangkis', 'SENIOR (senior, bola, karate, taekwondo)'),
(249, 'Sultan Baharuddin Ulil Amrie', 42517016, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Bahasa', 'Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(250, 'Isnah Auliyah Rahma', 32217011, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Bela Diri', 'Olahraga', 'Menggambar, Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(251, 'Muh Arga Basri', 42117046, 'Teknik Elektro', 'D4 Teknik Listrik', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(252, 'Calvin Valentino Gosal', 42518007, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(253, 'Ahsan Mubariz', 42516036, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Main Game, Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(254, 'Muh Janualdi', 42516043, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Seni', 'Fotografi, Sepak Bola, Bermain Musik, Desain Grafis', 'SENIOR (senior, bola, karate, taekwondo)'),
(255, 'Nur Anugrawati', 42516040, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi, Memasak, Bermain Musik, Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(256, 'Totok Jarwanto', 42515002, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Pecinta Alam', 'Lainnya', 'Main Game, Berenang', 'SENIOR (senior, bola, karate, taekwondo)'),
(257, 'Muhammad Amien Rais', 42516019, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Bahasa', 'Menyanyi, Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(258, 'Sahrul Dandi', 42516011, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Pecinta Alam', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(259, 'Aswar Hidayat', 42516004, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Sepak Bola, Bermain Musik', 'SENIOR (senior, bola, karate, taekwondo)'),
(260, 'Andi Zulfikri', 32217020, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Kemanusiaan', 'Lainnya', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(261, 'Ridwan Duha', 34419021, 'Teknik Mesin', 'D3 Teknik Perawatan Alat Berat', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(262, 'M Zulham Fatwa', 44319015, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(263, 'Hajar Salwa', 33119035, 'Teknik Kimia', 'D3 Teknik Kimia', 'Kesehatan', 'Bahasa', 'Belajar Bahasa Asing Baru', 'SENIOR (senior, bola, karate, taekwondo)'),
(264, 'Nur Indah Sari', 33119039, 'Teknik Kimia', 'D3 Teknik Kimia', 'Olahraga', 'Lainnya', 'Bulu Tangkis, Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(265, 'Muh Rezki Ananda S', 42518014, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Bahasa', 'Lainnya', 'Bersepeda', 'SENIOR (senior, bola, karate, taekwondo)'),
(266, 'Fitri Handayani', 33118035, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Menyanyi, Melukis', 'SENIOR (senior, bola, karate, taekwondo)'),
(267, 'Muhammad Fathurrahman', 32217080, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Jurnalistik', 'Bahasa', 'Menggambar, Fotografi, Bermain Musik, Main Game, Belajar Bahasa Asing Baru, Desain Grafis', 'SENIOR (senior, bola, karate, taekwondo)'),
(268, 'Melinda Risnu F', 42116033, 'Teknik Elektro', 'D4 Teknik Listrik', 'Seni', 'Seni', 'Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(269, 'M. Fachri Ardiansyah', 34218036, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Seni', 'Seni', 'Menyanyi, Bermain Musik, Main Game', 'SENIOR (senior, bola, karate, taekwondo)'),
(270, 'Ega berliani', 31218032, 'Teknik Sipil', 'D3 Teknik Konstruksi', 'Seni', 'Seni', 'Menari, Jalan-Jalan', 'SENIOR (senior, bola, karate, taekwondo)'),
(271, 'Susilawati', 33117522, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bela Diri', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(272, 'Icha Paras Ayu', 33117013, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Lainnya', 'Menyanyi, Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(273, 'Andi Murisaldi', 31117517, 'Teknik Sipil', 'D3 Teknik Sipil', 'Olahraga', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(274, 'Nurul Inayah', 33118513, 'Teknik Kimia', 'Teknik kimia mineral', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(275, 'Nur Fajriah', 33116022, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(276, 'Irmayanti Ruslan', 46118036, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Seni', 'Seni', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(277, 'Nafilah Insan Bestari ', 33117064, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Olahraga', 'Lainnya', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(278, 'M. Yudha Zadzaly A', 33217016, 'Teknik Kimia', 'D3 Analisis Kimia', 'Olahraga', 'Olahraga', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(279, 'Iin nabila eka putri', 33117055, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Lainnya', 'Menyanyi', 'SENIOR (senior, bola, karate, taekwondo)'),
(280, 'Nurul hijrah nadiatullah K.', 33117074, 'Teknik Kimia', 'D3 Teknik kimia', 'Bela Diri', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(281, 'Desty Adeningsih Baharuddin', 33117057, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menggambar', 'SENIOR (senior, bola, karate, taekwondo)'),
(282, 'Alfiani Wildasari', 33116059, 'Teknik Kimia', 'D3 Teknik Kimia', 'Bela Diri', 'Seni', 'Olahraga', 'SENIOR (senior, bola, karate, taekwondo)'),
(283, 'Emy Fedelia', 33116011, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menyanyi, Membaca', 'SENIOR (senior, bola, karate, taekwondo)'),
(284, 'Deum Patria Firtovides Abbas', 44218032, 'Teknik Mesin', 'D4 Teknik Pembangkit Energi', 'Seni', 'Seni', 'Menyanyi, Nonton', 'SENIOR (senior, bola, karate, taekwondo)'),
(285, 'Raoda', 42516044, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(286, 'Mirnawati Jafar ', 43219046, 'Teknik Kimia', 'D4 Teknologi Kimia Industri', 'Wirausaha', 'Seni', 'Membaca', 'Wirausaha'),
(287, 'Rizki Amalia', 33116045, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(288, 'Dwiyannie Marinda', 43219044, 'Teknik Kimia', 'D4 Teknologi Kimia Industri', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(289, 'Nur An-Nisa Al-Khubra s', 36117010, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Jalan-Jalan', 'Wirausaha'),
(290, 'Fachrinah', 46116002, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak, Membaca', 'Wirausaha'),
(291, 'Andry Efendy S', 42116005, 'Teknik Elektro', 'D4 Teknik Listrik', 'Jurnalistik', 'Lainnya', 'Menulis, Desain Grafis', 'Wirausaha'),
(292, 'Riskawati', 42617004, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Wirausaha', 'Lainnya', 'Memasak, Desain Grafis', 'Wirausaha'),
(293, 'Aswad Anas', 33117026, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menggambar', 'Wirausaha'),
(294, 'Findi Pahlawan', 33117032, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Fotografi', 'Wirausaha'),
(295, 'Reski Fitri Awalia', 35117002, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Menggambar', 'Wirausaha'),
(296, 'Firdayanti', 33117002, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Seni', 'Menari, Menyanyi', 'Wirausaha'),
(297, 'Indah Putri ', 46117020, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(298, 'Aisya Aulya', 36116002, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(299, 'Nurfadilah', 36117060, 'Akuntansi', 'D3 Akuntansi', 'Seni', 'Seni', 'Menari, Jalan-Jalan', 'Wirausaha'),
(300, 'Dinda Syukur', 36116029, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca, Nonton, Jalan-Jalan', 'Wirausaha'),
(301, 'Nuraedayana S', 35116049, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Menulis, Membaca ', 'Wirausaha'),
(302, 'Andi Nur Wahdaniar', 33116061, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Nonton, Jalan-Jalan', 'Wirausaha'),
(303, 'S Wahyudi Yusuf', 31116013, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Wirausaha', 'Olahraga', 'Bulu Tangkis, Olahraga, Desain Grafis', 'Wirausaha'),
(304, 'Syamsinar', 36117053, 'Akuntansi', 'D3 Akuntansi', 'Bela Diri', 'Lainnya', 'Olahraga', 'Wirausaha'),
(305, 'Ferdian Rosyid By Haqi', 44316011, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Wirausaha', 'Lainnya', 'Bermain Musik', 'Wirausaha'),
(306, 'Adelya Putri Restika', 42617019, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(307, 'Srilius Tiranda', 33118015, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Menyanyi', 'Wirausaha'),
(308, 'Ismiyani Kadir', 46117023, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Olahraga', 'Olahraga', 'Wirausaha'),
(309, 'Muhammad Yusran', 32118017, 'Teknik Elektro', 'D3 Teknik Listrik', 'Wirausaha', 'Lainnya', 'Sepak Bola, Bulu Tangkis', 'Wirausaha'),
(310, 'Rafly Faizal', 46118051, 'Teknik Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Seni', 'Bulu Tangkis, Bermain Musik, Main Game', 'Wirausaha'),
(311, 'Noviani Widianti S', 45218016, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(312, 'Nurhijrah', 35118045, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Membaca, Nonton', 'Wirausaha'),
(313, 'Wahyudi', 46118049, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Main Game', 'Wirausaha'),
(314, 'Nurul Azizah M', 36118017, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(315, 'Sri Wahyuni', 33117019, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Kemanusiaan', 'Lainnya', 'Membaca', 'Wirausaha'),
(316, 'Muhammad Fajar Nawir', 33117502, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Wirausaha', 'Lainnya', 'Olahraga', 'Wirausaha'),
(317, 'Adnan Alfiqri', 36118022, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Olahraga', 'Olahraga', 'Wirausaha'),
(318, 'Muhammad Fajri Majid', 42617015, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Wirausaha', 'Seni', 'Bermain Musik', 'Wirausaha'),
(319, 'Nur Syahruni R', 45218018, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Olahraga', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(320, 'Alfira Dayanti', 35118028, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Seni', 'Lainnya', 'Menyanyi', 'Wirausaha'),
(321, 'Nur Fatimah ', 42516035, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan ', 'Wirausaha', 'Lainnya', 'Nonton, Jalan-Jalan', 'Wirausaha'),
(322, 'Andi Ferdiawan', 42617003, 'Teknik Elektro', 'D4 Teknik Multimedia dan Jaringan', 'Wirausaha', 'Olahraga', 'Olahraga, Main Game', 'Wirausaha'),
(323, 'Karmila', 32218009, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Seni', 'Lainnya', 'Menari', 'Wirausaha'),
(324, 'Nur Nahdia Astuti', 33119062, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Nonton, Membaca', 'Wirausaha'),
(325, 'Siti Fakhriyah R', 33119017, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Olahraga', 'Bulu Tangkis, Olahraga', 'Wirausaha'),
(326, 'Intan Ayu Kurnia', 32118013, 'Teknik Elektro', 'D3 Teknik Listrik', 'Wirausaha', 'Lainnya', 'Memasak, Nonton, Jalan-Jalan', 'Wirausaha'),
(327, 'Hasra', 36118012, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Olahraga', 'Olahraga, Nonton', 'Wirausaha'),
(328, 'Rifdah Faadhilah Rustam ', 33218018, 'Teknik Kimia', 'D3 Analisis Kimia ', 'Olahraga', 'Olahraga', 'Sepak Bola, Bulu Tangkis', 'Wirausaha'),
(329, 'Aulya Arsitawidya', 35118040, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(330, 'Andi Ummu Qalsum Syah', 35118030, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(331, 'Muyassarah', 33117005, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Wirausaha', 'Seni', 'Menari, Menyanyi', 'Wirausaha'),
(332, 'Irawati W', 33116030, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Wirausaha', 'Seni', 'Menari, Jalan-Jalan', 'Wirausaha'),
(333, 'Masyithah Rachmat', 33116060, 'Teknik Kimia', 'D3 Teknik Kimia ', 'Wirausaha', 'Seni', 'Menari, Menyanyi', 'Wirausaha'),
(334, 'Melany', 42516007, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Wirausaha', 'Seni', 'Menggambar', 'Wirausaha'),
(335, 'Ikhsatun Dinarul', 36116007, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Menggambar, Membaca', 'Wirausaha'),
(336, 'Nur Sukmayanti Tri Utami', 45217014, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Seni', 'Lainnya', 'Memasak', 'Wirausaha'),
(337, 'Hikmah Dwiyanti Nasir', 42516046, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari, Menyanyi', 'Wirausaha'),
(338, 'St Fatimah', 46116075, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(339, 'Ummul Unaifah Mustafa', 33218023, 'Teknik Kimia', 'D3 Analisis Kimia', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(340, 'Putra S', 36116062, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Bulu Tangkis, Membaca', 'Wirausaha'),
(341, 'Ani Saputri', 46117049, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Memasak, Bulu Tangkis, Membaca', 'Wirausaha'),
(342, 'Luluah Mardati S', 35116041, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menulis, Menggambar', 'Wirausaha'),
(343, 'Ridwan Jamaludin', 44316015, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Wirausaha', 'Lainnya', 'Bulu Tangkis, Olahraga', 'Wirausaha'),
(344, 'Suci Suhaeda ', 36116069, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Menulis, Membaca', 'Wirausaha'),
(345, 'Nugrahyanti', 35116026, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(346, 'Ikhlas Abdullah ', 44317010, 'Teknik Mesin', 'D4 Teknik Manufaktur', 'Wirausaha', 'Lainnya ', 'Olahraga, Desain Grafis', 'Wirausaha'),
(347, 'Nurul Safitri N', 46117070, 'Akuntansi', 'D4 Akuntansi', 'Seni', 'Lainnya', 'Menari', 'Wirausaha'),
(348, 'Asnita Sari', 45217003, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha'),
(349, 'A Ahmad Syawal', 34216025, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Seni', 'Seni', 'Menggambar, Desain Grafis', 'Wirausaha'),
(350, 'Nurul Ailmi', 42516008, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menyanyi, Membaca, Nonton', 'Wirausaha');
INSERT INTO `tb_data_training` (`id`, `nama`, `nim`, `jurusan`, `prodi`, `minat`, `bakat`, `hobi`, `label`) VALUES
(351, 'Muhammad Baso Adrian Ibrahim', 42517038, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Bulu Tangkis, Berenang', 'Wirausaha'),
(352, 'Lulu Yulianti Pangestu', 42518067, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(353, 'Nurfazilah', 46117071, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Menari, Memasak', 'Wirausaha'),
(354, 'Ainun Alya Rifqah', 36116001, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(355, 'Hairunniza', 36117001, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Seni', 'Menggambar, Desain Grafis', 'Wirausaha'),
(356, 'Andi Abdul Muqsith Hakimah Alam', 31116034, 'Teknik Sipil', 'D3 Teknik Konstruksi Gedung', 'Wirausaha', 'Lainnya', 'Bulu Tangkis, Desain Grafis', 'Wirausaha'),
(357, 'Ruswinda Ramli', 36117054, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Seni', 'Menulis, Membaca', 'Wirausaha'),
(358, 'Nurhikma', 35117009, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menari', 'Wirausaha'),
(359, 'Indri Reskiani', 36117095, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha'),
(360, 'Sulfiah', 46117039, 'Akuntansi', 'D3 Akuntansi Manajerial', 'Olahraga', 'Lainnya', 'Memasak, Olahraga', 'Wirausaha'),
(361, 'Siti Raihanah', 45217012, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Wirausaha', 'Seni', 'Menulis', 'Wirausaha'),
(362, 'Dewi', 45217024, 'Administrasi Niaga', 'D4 Administrasi Niaga', 'Bahasa', 'Lainnya', 'Membaca', 'Wirausaha'),
(363, 'Nur Adija Syam', 36117075, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(364, 'Nur Qalby Yamin', 36117019, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca, Nonton', 'Wirausaha'),
(365, 'Muftira Resky Aljun', 36117059, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Bahasa', 'Memasak', 'Wirausaha'),
(366, 'Widyawati', 43215017, 'Teknik Kimia', 'D4 Teknologi Kimia Industri', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(367, 'Ausie Rafika Ayyunin', 35118032, 'Administrasi Niaga', 'D3 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak, Membaca', 'Wirausaha'),
(368, 'Andi Siti Hajar Mappatadang', 33118005, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Memasak, Membaca', 'Wirausaha'),
(369, 'Nur Alinda', 33118044, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(370, 'Nurhalisa', 46118073, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(371, 'Ayu Saputri', 46118006, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(372, 'Muhammad Wahyu Suharman', 32218044, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Olahraga', 'Lainnya', 'Olahraga', 'Wirausaha'),
(373, 'Astuti', 36118007, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha'),
(374, 'Rio Bagaskara Tanuri', 32118092, 'Teknik Elektro', 'D3 Teknik Listrik', 'Olahraga', 'Lainnya', 'Sepak Bola, Bulu Tangkis', 'Wirausaha'),
(375, 'Nur Alfina Mustafa', 32217003, 'Teknik Elektro', 'D3 Teknik Telekomunikasi', 'Wirausaha', 'Lainnya', 'Menari', 'Wirausaha'),
(376, 'Vika Vriska Allolayuk', 36118020, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Lainnya', 'Membaca', 'Wirausaha'),
(377, 'Alfian Anugrah ', 32318028, 'Teknik Elektro', 'D3 Teknik Elektronika', 'Olahraga', 'Lainnya', 'Sepak Bola, Bulu Tangkis', 'Wirausaha'),
(378, 'Baso Risal Fahlefi ', 34217026, 'Teknik Mesin', 'D3 Teknik Konversi Energi', 'Olahraga', 'Lainnya', 'Sepak Bola, Bulu Tangkis', 'Wirausaha'),
(379, 'Dwi Mutmainna', 36117007, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Bahasa', 'Membaca', 'Wirausaha'),
(380, 'St Muthiah', 36117020, 'Akuntansi', 'D3 Akuntansi', 'Wirausaha', 'Bahasa', 'Membaca', 'Wirausaha'),
(381, 'Nur Chofifah Indar Rahman', 45218017, 'Administrasi Niaga', 'D4 Administrasi Bisnis', 'Wirausaha', 'Lainnya', 'Memasak', 'Wirausaha'),
(382, 'Alyah Syafirah', 46118055, 'Akuntansi', 'D4 Akuntansi Manajerial', 'Wirausaha', 'Lainnya', 'Membaca, Nonton, Jalan-Jalan', 'Wirausaha'),
(383, 'Ismail ', 42116018, 'Teknik Elektro', 'D4 Teknik Listrik', 'Olahraga', 'Lainnya', 'Bulu Tangkis', 'Wirausaha'),
(384, 'Diah Fitriyanti', 33116053, 'Teknik Kimia', 'D3 Teknik Kimia', 'Seni', 'Lainnya', 'Nonton, Jalan-Jalan', 'Wirausaha'),
(385, 'Amaluddin Akmal', 42518030, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Olahraga', 'Olahraga', 'Olahraga', 'Wirausaha'),
(386, 'Darmi', 42518060, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari, Menyanyi', 'Wirausaha'),
(387, 'Nurfaida HM', 42516027, 'Teknik Elektro', 'D4 Teknik Komputer dan Jaringan', 'Seni', 'Seni', 'Menari', 'Wirausaha'),
(388, 'Jumasdar', 33117509, 'Teknik Kimia', 'D3 Teknik Kimia Mineral', 'Wirausaha', 'Seni', 'Membaca', 'Wirausaha'),
(389, 'Ramansi', 33117020, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Seni', 'Menyanyi', 'Wirausaha'),
(390, 'Srisitisugiastuti.B', 33117018, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Memasak, Membaca', 'Wirausaha'),
(391, 'Sastriani', 33117010, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Lainnya', 'Membaca, Nonton', 'Wirausaha'),
(392, 'Agnes cicilia karaeng', 33117056, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Seni', 'Nonton, Jalan-Jalan', 'Wirausaha'),
(393, 'Rahmatian', 33116055, 'Teknik Kimia', 'D3 Teknik Kimia', 'Wirausaha', 'Olahraga', 'Olahraga', 'Wirausaha');

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
(2, 'UKM Karate', 'Terbinanya mahasiswa yang organisatoris dan karateka yang berkualitas sesuai dengan sumpah karate serta bertaqwa kepada Tuhan Yang Maha Esa.', '1. Membina anggota UKM Karate PNUP untuk menciptakan karateka yang terampil, aktif, dan sportif;\n2. Menyediakan sarana latihan bagi  anggota UKM Karate PNUP secara khusus dan karateka pada umumnya; dan\n3. Menambah pengalaman, meningkatkan prestasi, dan mengharumkan nama UKM Karate PNUP.', 'a) Bertujuan untuk mewadahi mahasiswa yang memiliki minat terhadap olahraga karate.\nb) Mecetak atlit- atlit karate berprestasi .\nc) Menjadi organisasi yang memberikan sarana dan pelatihan olah raga karate.', '1. Latihan fisik dan teknik\r\n2. Sparing partner\r\n3. Pertandingan\r\n', 'a) Pembina;\nb) Dewan Pelatih;\nc) Dewan Penasehat Organisasi (DPO); dan\nd) Pengurus Harian Organisasi (PHO).', 'kemauan dan loyalitas', 'latihan fisik ,untuk mengukur ketahanan fisik calon anggota dan LK untuk memberikanpemahaman tentang organisasi.', 'a) Juara satu pimpolnas 2017 di manado kelas komite putra\nb) Juara satu pimpolnas 2017 di manado kelas kata perorangan putri\nc) Juara satu pimpolnas 2019 di jakarta kelas kata perorangan putri\nd) Juara tiga  pimpolnas 2019 di jakarta kelas komite peroranga putra\ne) Juara tiga  pimpolnas 2019 di jakarta kelas komite peroranga putra\nf) Juara dua open lemkari sul sel 2019 kelas komite putra\ng) Juara tiga open bupati gowa 2019 kelas komite putra\nh) Juara tiga open bupati gowa 2019 kelas komite putra', 'a. departemen pelatihan \nb. departemen kaderisasi\nc. departemen infokom\nd. departemen kesekretariatan\ne. departemen danlos\n', 'UKM Karate adalah organisasi kemahasiswaan yang berfungsi \nsebagai wadah bagi mahasiswa dalam menyalurkan minatnya di bidang bela diri karate.', 'karate.jpg'),
(3, 'UKM KSR-PMI', 'Menciptakan manusia yang berjiwa sosial tinggi dan independen yang berlandaskan ketuhanan yang maha esa sesuai dengan prinsip-prinsip dasar kepalang merahan dan mempererat tali persaudaraan serta membantu meringankan penderitaan sesama', 'a. Menumbuhkan rasa solidaritas terhadap sesama \nb. Memberikan pertolongan pertama secara tepat, cermat, dan professional serta dilakukan dengan sukarela yang berlandaskan kemanusiaan\nc. Menerapkan dan mengamalkan tujuh prinsip dasar gerakan palang merah dan bulan sabit merah internasional\nd. Menjalin hubungan baik antar lembaga baik internal maupun eksternal\n', 'Menolong dan meringankan penderitaan antar sesama manusia yang berlandaskan kemanusiaan, kebersamaan, dan kekeluargaan.', '1. Pelatihan nasional\r\n2. Lomba kepalang merahan dan seni \r\n3. Donor darah \r\n4. Pelayanan kesehatan\r\n5. Bakti sosial\r\n6. Penyuluhan kesehatan\r\n', 'a. Komandan \nb. Wakil komandan\nc. Sekretaris umum\nd. Bendahara umum\ne. Presidium teras \n\n\n', 'kemauan dan loyalitas', 'wawancara, kaderisasi dan orientasi anggota', 'Mengadakan lomba, mengirim delegasi (perwakilan) untuk temu bakti ke luar kota Makassar, mengadakan jungle rescue nasional, mengikuti lomba tingkat PMR nasional', '1. Divisi pendidikan dan pelatihan \r\n2. Divisi SDM\r\n3. Divisi pelayanan kesehatan \r\n4. Divisi informasi dan komunikasi\r\n', 'UKM KSR-PMI adalah organisasi kemahasiswaan yang bergerak di bidang kemanusiaan dan kesehatan. UKM ini bertujuan untuk menolong dan meringankan penderitaan antar sesama.', 'ksr.jpg'),
(4, 'UKM Persma', 'Mengemban dan menerapkan idealisme Pers Mahasiswa', '1. Menyiapkan kader-kader yang memiliki idealisme Pers Mahasiswa \n2. Mengungkap, menyampaikan, menumbuhkan, mengarahkan, dan membentuk opini publik sesuai dengan idealisme Pers Mahasiswa\n', '1. Membentuk masyarakat ilmiah dan pemikir terutama mahasiswa PNUP yang senantiasa mencintai dan menjunjung tinggi nilai-nilai kejujuran, kebenaran, dan keadilan dengan berorientasi pada masa depan dan bertanggung jawab pada Tuhan Yang Maha Esa\n2. Menyiapkan dan melahirkan kader mahasiswa yang kritis, analitis, objektif, berinisiatif, tulus, ikhlas, dan bertanggung jawab dalam membangun masyarakat serta Negara\n3. Menguasai bidang opini dan publikasi kampus\n4. Menjaga eksistensi Pers Mahasiswa di', '1. Open recruitment\r\n2. Pendidikan latihan jurnalistik dasar\r\n3. Kaderisasi dan orientasi anggota (KORAN)\r\n4. Mengumpulkan bahan jurnalistik.\r\n', 'a. Ketua Umum\nb. Sekretaris Umum \nc. Pengurus Harian Organisasi (PHO)\nd. Dewan Penasehat Organisasi (DPO)', 'kemauan dan loyalitas', ' kegiatan kaderisasi dan orientasi anggota (KORAN) serta pendidikan latihan jurnalistik dasar (DIKLAT)', 'Finalis kompetisi majalah kampus di Politeknik Negeri Jakarta', 'a. Bidang organisasi (pendidikan, pelatihan, dan kesekretariatan)\nb. Bidang Penerbitan (mengelola sosial media, menghasilkan produk jurnalistik)\n', 'UKM Persma adalah organisasi kemahasiswaan yang bergerak\ndi bidang jurnalistik. UKM ini bertujuan untuk membentuk masyarakat ilmiah dikalangan\nmahasiswa PNUP yang senantiasa mencintai dan menjunjung tinggi nilai-nilai kejujuran.', 'pers.jpg'),
(5, 'UKM Bahasa', 'Mewujudkan ukm bahasa pnup menjadi lembaga yang berprestasi dan baik dari segi kelembagaan ', 'a. Memberikan softskill dan pengajaran yang lebih efektif\nb. Memfasilitasi dan mewadahi mahasiswa pnup untuk dapat belajar bersama dalam program kebahasaan \nc. Memperkuat hubungan antar lembaga lain baik internal maupun eksternal dalam tingkat pengajaran maupun organisasi\nd. Menjalin hubungan baik antara alumni-alumni dan pengurus serta anggota-anggota ukm bahasa untuk memperluas kinerja ukm bahasa\ne. Memastikan seluruh presidium dan kordinator agar menjalankan tugasnya sesuai dengan pra raker yang telah dijalankan maupun raker yang telah disetujui \nf. Terjalinnya suasana harmonis dan kelembagaan yang baik \ng. Peduli terhadap kondisi masyarakat yang ada \n', 'Terbinanya insan akademis yang professional, kreatif, dan inovatif yang bertakwa kepada Tuhan Yang Maha Esa serta menjunjung tinggi asas kekeluargaan dan keilmuan', 'a. meningkatkan efektifitas professional seperti perilaku, keefektifan, maupun range dalam mengetahui progress yang telah dilakukan (seluruh anggota)\nb. mewadahai fasilitas bagi anggota (divisi kesekretariatan)\nc. memperluas informasi mengenai ukm bahasa untuk meningkatkan solidaritas baik dengan pihak luar maupun pihak dalam (divisi humas)\nd. menunjang perlengkapan dalam pemenuhan kebutuhan (divis danlos)\ne. divisi kebahasaan (mewadahi anggota untuk belajar mengenai berbagai bahasa)\nf. latihan kreativitas anggota \n', 'a. Ketua umum\nb. Sekretaris Umum\nc. Bendahara umum\nd. Bidang 1 (organisasi)\ne. Bidang 2 (kebahasaan)\n', 'kemauan dan loyalitas', ' wawancara, tes tertulis (bhs inggris, korea, jepang, mandarin, dan arab) lebih di utamakan bahasa inggris dihitung berdasarkan range yang telah ditentukan ', 'juara 1 speech bahasa korea di UIN, juara 2 speech bahasa inggris di UIN', 'divisi SDM (perekrutan maupun penalaran anggota), divisi kesek (fasilitator yang menyediakan kebutuhan anggota), divisi humas (menjalin dan membentuk kerjasama dengan pihak-pihak lain), divisi danlos ( penunjang), divisi kebahasaan (pengajar), divisi literasi pengembangan (praktek speaking), divisi publikasi dan kreativitas (mengembangkan kreativitas anggota  dalam segi desain).\n\n', 'UKM Bahasa adalah organisasi kemahasiswaan yang bergerak\ndi bidang kebahasaan. UKM ini bertujuan untuk membentuk mahasiswa yang memiliki kemampuan dan keahlian berbahasa sehingga mampu bersaing dalam dunia kerja.', 'bahasa.jpg'),
(6, 'UKM Pramuka', 'Gerakan Pramuka menjadi pilihan utama bagi pembentukan karakter kaum muda', 'a. Mewujudkan Gerakan Pramuka yang mandiri dan bermutu.\nb. Memantapkan sistem pendidikan Gerakan Paramuka yang menanamkan nilai-nilai Kepramukaan bagi kaum muda.\n', 'Memperbaiki karakter dari anggota-anggotanya.', 'Tidak menentu', 'a. Pemangku adat racana (ketua dewan kehormatan, sekretaris dewan kehormatan, anggota)\nb. Susunan pengurus dewan racana (ketua dewan racana, sekretaris, bendahara, kordinator divisi)\n', 'kemauan dan loyalitas', 'orientasi dasar, pengukuhan menjadi anggota, pendidikan lanjutan/materi orientasi dasar ke lapangan, pengukuhan sebagai kader racana', 'Juara 3 Cerdas Cermat Kemah Teknik III di Batam', '\r\n1. Bidang teknik kepramukaan\r\n2. Bidang kegiatan operasional\r\n3. Bidang pembinaan dan pengembangan\r\n4. Bidang penelitian dan evaluasi\r\n', 'UKM Pramuka adalah organisasi kemahasiswaan yang bergerak\ndi bidang kepramukaan. UKM ini bertujuan sebagai wadah bagi mahasiswa untuk berkarya bagi\nnegara dan sesama melalui Gerakan Pramuka.', 'pramuka.jpg'),
(7, 'UKM Mapala', 'Terbinanya insan yang bertakwa kepada Tuhan Yang Maha  Esa, akademis, penalar, penganalisa, kreatif, professional, berprestasi, semangat pengabdian yang tinggi, dan menjunjung tinggi nilai luhur kepencinta alaman', 'a. Melahirkan regenerasi yang lebih dan menekankan kepada nilai luhur kepencinta alaman\nb. Memanusiakan manusia yang ditekankan pada orientasi kepencinta alaman\n', 'Menjaga kelestarian alam di muka bumi ini sehingga alam tetap terjaga', '1. Pendidikan dasar (diksar)\n2. Kajian rutin\n3. Mubes\n4. Seminar nasional \n5. Pendakian bersama sesama pengurus\n', 'a. Ketua umum \nb. Sekretaris umum\nc. Bendahara umum\nd. Bidang 1 (pro climbing, mountaineering, caving)\ne. Bidang 2 (kesekretariatan, gudang, dan humas) \n', 'kemauan dan loyalitas', 'pendidikan dasar (diksar) dan pendidikan lanjutan', 'melakukan ekspedisi solo artificial climbing, memasuki tujuh gua dalam 7 hari, memenangkan mountain race', '1. Pro climbing\r\n2. Mountaineering \r\n3. Caving \r\n', 'UKM MAPALA adalah organisasi kemahasiswaan yang bergerak dibidang kegiatan alam bebas. UKM ini bertujuan untuk membentuk mahasiswa sebagai bibit yang mandiri serta mempunyai semangat, mental, jiwa, dan rohani yang kuat.', 'mapala.jpg'),
(9, 'UKM Taekwondo', '1. Mengamalkan janji Tae Kwon Do Indonesia;\n2. Mengamalkan Tri Darma perguruan tinggi.\n3. Menjalin hubungan kerja sama antar lembaga baik di kampus maupun luar kampus;\n4.  kualitas sumber daya anggota.\n', '1. UKM Tae Kwon Do PNUP bertujuan membentuk insan yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa;\n2. UKM Tae Kwon Do PNUP bertujuan membina insan akademis yang berilmu, berprestasi, kreatif, bertanggung jawab, dan pengabdian tinggi pada masyarakat;\n3. UKM Tae Kwon Do PNUP bertujuan menumbuhkembangkan suasana yang harmonis antar sesama civitas akademika PNUP;\n4. UKM Tae Kwon Do PNUP bertujuan untuk membina mental dan fisik yang kuat kepada anggota.\n', '1. UKM Tae Kwon Do PNUP bertujuan membentuk insan yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa;\n2. UKM Tae Kwon Do PNUP bertujuan membina insan akademis yang berilmu, berprestasi, kreatif, bertanggung jawab, dan pengabdian tinggi pada masyarakat;\n3. UKM Tae Kwon Do PNUP bertujuan menumbuhkembangkan suasana yang harmonis antar sesama civitas akademika PNUP;\n4. UKM Tae Kwon Do PNUP bertujuan untuk membina mental dan fisik yang kuat kepada anggota.\n', '', '1. Musyawarah Besar / Sidang Istimewa\n2. Dewan Alumni\n3. Dewan Tertinggi\n4. Pengurus\n5. Anggota.\n', '1. Mengikuti prosesi pengaderan sesuai yang ditetapkan oleh PHO;\n2. Bagi yang berstatus mahasiswa PN', '1. Mendaftar di open recruitmen ukm Tae Kwon Do PNUP dan aktif latihan didojang/tempat latihan dan aktif juga di organisasi ukm Tae Kwon Do PNUP  maka disebut ANGGOTA MUDA\n2. Mempertahankan keaktifan latihan di dojang/tempat latihan dan di organisasi selama 3 bulan dan mengikuti pengkaderan maka disebut ANGGOTA BIASA\n3. Setelah mengikuti pengkaderan maka dilihat lagi keaktifannya dalam berpartisipasi dalam kegiatan yang di selenggarakan UKM Tae Kwon Do PNUP dan keaktifan latihan nya dan mengikuti MUBES maka disebut ANGGOTA TETAP\n', '', '1. Pengkaderan\n2. Kepelatihan\n3. Kesektariatan\n4. Dana dan logistik\n5. Hubungan masyarakat\n', 'UKM Taekwondo adalah organisasi kemahasiswaan yang berfungsi sebagai wadah bagi mahasiswa dalam menyalurkan minatnya dibidang bela diri taekwondo.', 'taekwondo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil_spk`
--

CREATE TABLE `tb_hasil_spk` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `minat` varchar(50) DEFAULT NULL,
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
-- Indexes for table `tb_data_mhs`
--
ALTER TABLE `tb_data_mhs`
  ADD PRIMARY KEY (`nim`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_data_training`
--
ALTER TABLE `tb_data_training`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;
--
-- AUTO_INCREMENT for table `tb_data_ukm`
--
ALTER TABLE `tb_data_ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_hasil_spk`
--
ALTER TABLE `tb_hasil_spk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
