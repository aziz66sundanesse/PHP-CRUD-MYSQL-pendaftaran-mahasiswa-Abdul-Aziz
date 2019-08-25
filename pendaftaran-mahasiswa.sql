-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 05:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran-mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `email`, `jurusan`, `gambar`) VALUES
(16, 'Asep Badru', '201643501186', 'asep@gmail.com', 'Teknik', '5d2ac6aa03331.jpg'),
(17, 'Zaenul Fikry', '201643501189', 'Zaenul@gmail.com', 'Komputer', '5d2ac6ff6a10b.jpg'),
(19, 'Moh Ruslani', '201643501194', 'Ruslan@gmail.com', 'Komputer', '5d2ac7b02b509.jpg'),
(20, 'Lukman Hakim', '201643501195', 'Lukman@gmail.com', 'Industri', '5d2ac7f3406e5.jpg'),
(21, 'Rizaldi', '201643501196', 'Rizaldi@gmail.com', 'Tataboga', '5d2ac8240928f.jpg'),
(22, 'Tyan Disna Rizal', '201643501201', 'Tyan@gmail.com', 'Ekonomi', '5d2ac8957fdf1.jpg'),
(23, 'Chorry Andien Saputra', '201643501205', 'Chorry@gmail.com', 'Sastra', '5d2ac9a5041dd.jpg'),
(24, 'Adi Nugroho', '201643501208', 'adi@gmail.com', 'Listrik', '5d2ac9db3d3d8.jpg'),
(25, 'Tirta Ayu Retno Sari', '201643501214', 'Tirta@gmail.com', 'Kesenian', '5d2aca2a092b5.jpg'),
(26, 'Dede Kurniawan', '201643501217', 'Dede@gmail.com', 'elektro', '5d2aca6bcec28.jpg'),
(27, 'Septianingrum', '201643501227', 'Septi@gmail.com', 'Bahasa', '5d2acaa2a875c.jpg'),
(28, 'Nuroji Lukmansyah', '201643501241', 'oji@gmail.com', 'oji@gmail.com', '5d2acae591ffc.jpg'),
(29, 'Tejo', '201643501246', 'tejo@gmail.com', 'Informatika', '5d2acb16a9310.jpg'),
(30, 'Adi Rehata', '20164350', 'rehata@gmail.com', 'mesin', '5d2acb62ab276.jpg'),
(31, 'Muhammad Bagas', '201643501285', 'bagas@gmail.com', 'industri', '5d2acba27cd54.jpg'),
(32, 'Abian Chandra ', '201643501287', 'abian@gmail.com', 'Informatika', '5d2acbd1503f1.jpg'),
(33, 'Budy Setyawan', '201643501290', 'budi@gmail.com', 'Jaringan', '5d2acc2294c26.jpg'),
(34, 'Setyo Adi Rahman', '201643501292', 'setyo@gmail.com', 'Jaringan', '5d2acc572a205.jpg'),
(35, 'Hafidzan Nadzari', '201643501293', 'hafiz@gmail.com', 'Informatika', '5d2acca69373c.jpg'),
(36, 'Markus Munte', '201643501301', 'markus@gmail.com', 'Komputer', '5d2accdf5d270.jpg'),
(37, 'Muhammad Ridwan', '201643501310', 'ridwan@gmail.com', 'Indonesia', '5d2acd260fbc2.jpg'),
(38, 'Agus Suprapto', '20164350', 'agus@gmail.com', 'Industri', '5d2acd54a9be4.jpg'),
(39, 'Muhammad Taufik', '201643501315', 'Taufik@gmail.com', 'Jaringan ', '5d2acd810f589.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'aziz', '$2y$10$FGOfJcyXFMl0lu262vASuOKrVnh17O8bMTk9qo3K7XabmE6XzW/b2'),
(2, 'abdul aziz', '$2y$10$oYc7481.u2rmCbbLhFnmP.NiwG8P.aQJKl1SW7UWrO878MiJTsreO'),
(3, 'admin', '$2y$10$LkHUs0rkGyQRB3061Muu0.BxB6Ad8eWqzYGYI/DFP5nWajZNKrgD2'),
(4, 'user', '$2y$10$d0MgGeFZ123v6Ex4AfdJKeiSzS2ieQRdht7kSl4UUOZ.Hvwi2eNUK'),
(5, '123', '$2y$10$rGpJV.OmnwpujUzLSKF5Pe.Xw5HyViLOySsVI0ohbYoLGNs2yLVHm'),
(6, 'nama', '$2y$10$Qe31ZsSYm3kDJVtJaK9xIu4xv6gzgC/YCl06NYW0PgZuCPVdMXeJW'),
(7, 'tes', '$2y$10$A1/AnCDVLspDr0UeIFlYxOJHKfGk88KhAhR1RElh1RyPgqQwKne5S'),
(8, 'ahmad buhandi', '$2y$10$b2dPGfBEgk0xsdUpYgzcW..qfo9XfhlOhxUeXfFdyAbLrRbPzjNkO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
