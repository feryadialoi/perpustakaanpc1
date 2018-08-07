-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 06:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `status`, `nama`, `username`, `password`) VALUES
(0, 'user', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'user', 'Feryadi', 'feryadi', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'user', 'Kevin', 'kevin', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tmp_lahir` varchar(125) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `tingkat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tmp_lahir`, `tgl_lahir`, `jk`, `tingkat`) VALUES
('152000353', 'Erina Tendou', 'Osaka', '1997-05-12', 'p', 'SMA'),
('1542033', 'ILLIYA', 'x', '0000-00-00', 'l', 'SMA'),
('15420900', 'ILLIYA', 'UNKNOWN', '0000-00-00', 'l', 'SMA'),
('15420940', 'Hanami', 'Osaka', '1998-12-12', 'p', 'SMA'),
('15420944', 'Kevin', 'Pontianak', '1997-02-13', 'l', 'SMP'),
('15420945', 'Minami', 'Osaka', '1997-02-14', 'p', 'SMP'),
('15420947', 'Mikazuki', 'Tsuki', '1212-12-12', 'l', 'SMA'),
('15420955', 'Lucia', 'Roselia', '1998-12-12', 'p', 'SMA'),
('15420960', 'Kotaro Saotome', 'Okinawa', '1997-11-20', 'l', 'SMA'),
('15420988', 'Mikaela', 'Swizz', '2000-12-12', 'l', 'SMA'),
('1542099', 'Ohara Mari', 'Mahora Gakuen', '1997-06-13', 'p', 'SMA'),
('1542203', 'Inori', 'Tokyo', '1996-11-25', 'p', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(9) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` varchar(3) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3','rak4','rak5','rak6','rak7','rak8','rak9','rak10') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(69, 'Mai Hime', 'Saito Muramasa', 'Shouten Jump', '2015', '120056521782', '8', 'rak1', '2018-05-01'),
(71, 'Mai Hime Yuki', 'Saito Muramasa', 'Shouten Jump', '2016', '1221056408210', '6', 'rak8', '2018-06-29'),
(72, 'Yuuki no Tsubasa', 'Rimi Sakihata', 'ASCII Media Japan', '2014', '1212056480321', '6', 'rak4', '2018-06-07'),
(73, 'My Adventure', 'Anonymous', 'NKZ', '2011', '1212550369874', '6', 'rak7', '2018-06-14'),
(74, 'My Wish', 'Yumi Tooyama', 'Aniplex Media Production', '2014', '1213365008254', '8', 'rak4', '2018-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(9) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `judul`, `nis`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(3, 'Forbidden Programming Language', '1542099242', 'Riko', '2018-04-01', '2018-05-05', 'kembali'),
(22, 'Belajar SQL', '11212121', 'Kevin', '2018-05-02', '2018-05-10', 'kembali'),
(23, 'Belajar PHP', '1121212', 'Kevin', '2018-05-01', '2018-05-15', 'kembali'),
(62, 'Mai Hime', '15420945', 'Minami', '2018-06-12', '2018-06-15', 'kembali'),
(63, 'Mai Hime', '15420945', 'Minami', '2018-02-02', '2018-08-08', 'kembali'),
(64, 'Mai Hime Yuki', '15420945', 'Minami', '2018-02-02', '2018-02-06', 'kembali'),
(65, 'Mai Hime', '15420945', 'Minami', '2018-06-06', '2018-06-08', 'kembali'),
(66, 'Mai Hime', '15420945', 'Minami', '0000-00-00', '0000-00-00', 'kembali'),
(67, 'Mai Hime', '15420945', 'Minami', '2018-02-02', '2018-08-08', 'kembali'),
(68, 'Mai Hime', '15420945', 'Minami', '2018-08-08', '2021-06-18', 'kembali'),
(69, 'Mai Hime', '15420945', 'Minami', '2018-06-12', '2019-08-13', 'kembali'),
(70, 'Mai Hime', '15420945', 'Minami', '2018-02-02', '2020-03-10', 'kembali'),
(71, 'Mai Hime Yuki', '15420945', 'Minami', '2018-02-02', '2020-11-11', 'kembali'),
(72, 'Mai Hime Yuki', '15420945', 'Minami', '2018-08-08', '1970-01-01', 'kembali'),
(73, 'Mai Hime', '15420945', 'Minami', '2018-08-08', '0000-00-00', 'kembali'),
(74, 'Mai Hime', '15420945', 'Minami', '2018-08-08', '0000-00-00', 'kembali'),
(75, 'Mai Hime', '15420945', 'Minami', '2018-08-08', '1970-01-01', 'kembali'),
(76, 'Mai Hime', '15420945', 'Minami', '2018-06-12', '0000-00-00', 'kembali'),
(77, 'Mai Hime', '15420945', 'Minami', '2018-06-06', '1970-01-01', 'kembali'),
(78, 'Mai Hime', '15420945', 'Minami', '2018-06-06', '1970-01-01', 'kembali'),
(79, 'Mai Hime', '15420945', 'Minami', '2018-02-02', '2018-07-21', 'kembali'),
(80, 'Mai Hime', '15420945', 'Minami', '2018-06-06', '0000-00-00', 'kembali'),
(81, 'Mai Hime', '15420945', 'Minami', '2018-06-06', '2018-09-26', 'kembali'),
(82, 'Mai Hime', '15420945', 'Minami', '2018-08-08', '2018-11-04', 'kembali'),
(83, 'Mai Hime', '15420945', 'Minami', '2018-05-05', '2018-10-06', 'kembali'),
(84, 'Mai Hime', '15420945', 'Minami', '2018-06-29', '2018-07-14', 'kembali'),
(85, 'Mai Hime', '15420945', 'Minami', '2018-07-05', '2019-01-05', 'pinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
