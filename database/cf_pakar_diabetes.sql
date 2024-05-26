-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 06:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cf_pakar_diabetes`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE `analisa` (
  `id_analisa` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tgl_analisa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_dokter` varchar(50) NOT NULL,
  `hasil` float(12,8) NOT NULL,
  `resep_obat` varchar(300) NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analisa`
--

INSERT INTO `analisa` (`id_analisa`, `username`, `tgl_analisa`, `nama_dokter`, `hasil`, `resep_obat`, `selesai`) VALUES
(1, 'budi', '2020-06-12 16:09:20', 'dr. Jon Ganefi, Sp.PD Finasim, M.Kes', 99.99352264, 'Metformin 500 MG 10 Tablet, Glimepiride 2 MG 10 Tablet, dan Diamicron MR 60 MG 15 Tablet. Sehari 2x sesudah makan.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `praktek_hari` varchar(30) NOT NULL,
  `praktek_jam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `username`, `nama_dokter`, `praktek_hari`, `praktek_jam`) VALUES
(1, 'dwi', 'dr. Dwi Indira Setyorini, Sp.PD', 'Senin s/d Sabtu', '08.00-14.00'),
(2, 'jon', 'dr. Jon Ganefi, Sp.PD Finasim, M.Kes', 'Senin s/d Sabtu', '09.00-13.00');

-- --------------------------------------------------------

--
-- Table structure for table `jawab`
--

CREATE TABLE `jawab` (
  `id_jawab` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `bobot_pakar` float(2,1) NOT NULL,
  `jawab` float(2,1) NOT NULL,
  `cf` float(3,2) NOT NULL,
  `cf_gabung` float(9,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawab`
--

INSERT INTO `jawab` (`id_jawab`, `username`, `id_pertanyaan`, `bobot_pakar`, `jawab`, `cf`, `cf_gabung`) VALUES
(1, 'budi', 1, 0.8, 0.5, 0.40, 0.00000000),
(2, 'budi', 2, 0.5, 0.5, 0.25, 0.55000001),
(3, 'budi', 3, 1.0, 0.8, 0.80, 0.91000003),
(4, 'budi', 4, 0.8, 0.8, 0.64, 0.96759999),
(5, 'budi', 5, 1.0, 0.5, 0.50, 0.98379999),
(6, 'budi', 6, 0.0, 0.5, 0.00, 0.98379999),
(7, 'budi', 7, 0.0, 0.5, 0.00, 0.98379999),
(8, 'budi', 8, 0.0, 1.0, 0.00, 0.98379999),
(9, 'budi', 9, 0.5, 1.0, 0.50, 0.99190003),
(10, 'budi', 10, 0.8, 1.0, 0.80, 0.99838001),
(11, 'budi', 11, 0.0, 0.8, 0.00, 0.99838001),
(12, 'budi', 12, 0.0, 0.5, 0.00, 0.99838001),
(13, 'budi', 13, 1.0, 0.8, 0.80, 0.99967599),
(14, 'budi', 14, 1.0, 0.8, 0.80, 0.99993521),
(15, 'budi', 15, 0.0, 0.8, 0.00, 0.99993521);

-- --------------------------------------------------------

--
-- Table structure for table `konsul`
--

CREATE TABLE `konsul` (
  `id_konsul` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `komen_pasien` varchar(300) NOT NULL,
  `tanggapan_dokter` varchar(300) NOT NULL,
  `tgl_konsul` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_tanggapan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsul`
--

INSERT INTO `konsul` (`id_konsul`, `username`, `nama_dokter`, `komen_pasien`, `tanggapan_dokter`, `tgl_konsul`, `tgl_tanggapan`) VALUES
(1, 'budi', 'dr. Jon Ganefi, Sp.PD Finasim, M.Kes', 'Saya seringkali merasa lapar meskipun sudah makan banyak, Menurut dokter apa yang harus saya lakukan?', 'Sebaiknya Anda mulai rutin melakukan diet', '2020-06-12 20:44:25', '2020-06-12 21:01:32'),
(2, 'budi', 'dr. Jon Ganefi, Sp.PD Finasim, M.Kes', 'Diet seperti apa yang harus saya jalanin dokter?', '', '2020-06-12 21:05:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipe` varchar(10) NOT NULL DEFAULT 'pasien'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `tipe`) VALUES
('budi', '123', 'pasien'),
('dilla', '123', 'admin'),
('dwi', 'dwi', 'dokter'),
('janur', '123', 'pasien'),
('jon', 'jon', 'dokter'),
('nurhayati', '123', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `hp` varchar(15) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `username`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `hp`, `tgl_daftar`) VALUES
(1, 'nurhayati', 'Nurhayati Rahma', 'Palembang', 'WANITA', '1984-09-26', '08121220200', '2020-01-01'),
(2, 'budi', 'Budi Rusdiawan', 'Palembang Selatan', 'PRIA', '1996-10-21', '081212212154', '2019-11-19'),
(3, 'janur', 'Janur', 'Palembang Kota', 'WANITA', '1999-10-29', '08141414520', '2019-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `tipe_pertanyaan` varchar(15) NOT NULL,
  `bobot_pakar` float(2,1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`, `tipe_pertanyaan`, `bobot_pakar`, `username`, `tgl_input`) VALUES
(1, 'Apakah Anda sering merasa haus?', 'gejala', 0.8, 'dilla', '2020-06-12 14:32:19'),
(2, 'Apakah Anda sering buang air kecil, terutama di malam hari ?', 'gejala', 0.5, 'dilla', '2020-06-12 14:32:26'),
(3, 'Apakah Anda sering merasa lapar?', 'gejala', 1.0, 'dilla', '2020-06-12 14:38:41'),
(4, 'Apakah Anda pernah mengalami turun berat badan tanpa sebab yang jelas?', 'gejala', 0.8, 'dilla', '2020-06-12 14:41:58'),
(5, 'Apakah Anda sering merasa lemas?', 'gejala', 1.0, 'dilla', '2020-06-12 14:42:30'),
(6, 'Apakah Anda sering merasa pandangan kabur?', 'gejala', 0.0, 'dilla', '2020-06-12 14:42:56'),
(7, 'Apakah Anda pernah mengalami luka yang sulit sembuh?', 'gejala', 0.0, 'dilla', '2020-06-12 14:43:26'),
(8, 'Apakah Anda sering merasa mulut kering?', 'gejala', 0.0, 'dilla', '2020-06-12 14:44:01'),
(9, 'Apakah Anda sering merasa gatal-gatal?', 'gejala', 0.5, 'dilla', '2020-06-12 14:44:26'),
(10, 'Apakah Anda mudah tersinggung?', 'gejala', 0.8, 'dilla', '2020-06-12 14:45:04'),
(11, 'Apakah Anda memiliki kerluarga dengan riwayat diabetes melitus?', 'pendukung', 0.0, 'dilla', '2020-06-12 14:45:34'),
(12, 'Apakah Anda pernah mengalami kelebihan berat badan?', 'pendukung', 0.0, 'dilla', '2020-06-12 14:46:55'),
(13, 'Apakah Anda merasa kurang beraktivitas secara fisik?', 'pendukung', 1.0, 'dilla', '2020-06-12 14:47:29'),
(14, 'Apakah Anda menderita tekanan darah tinggi?', 'pendukung', 1.0, 'dilla', '2020-06-12 14:46:32'),
(15, 'Apakah usia Anda diatas 45 tahun?', 'pendukung', 0.0, 'dilla', '2020-06-12 14:47:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jawab`
--
ALTER TABLE `jawab`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indexes for table `konsul`
--
ALTER TABLE `konsul`
  ADD PRIMARY KEY (`id_konsul`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa`
--
ALTER TABLE `analisa`
  MODIFY `id_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawab`
--
ALTER TABLE `jawab`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konsul`
--
ALTER TABLE `konsul`
  MODIFY `id_konsul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
