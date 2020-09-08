-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jun 2018 pada 03.20
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL,
  `padi_id_padi` int(11) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `nama_lelang` varchar(45) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `tanggal_lelang` datetime NOT NULL,
  `waktu_berakhir` datetime NOT NULL,
  `harga_awal` double NOT NULL,
  `status` int(11) NOT NULL,
  `berat` double NOT NULL,
  `foto_padi` varchar(200) NOT NULL,
  `pemenang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `padi_id_padi`, `user_id_user`, `nama_lelang`, `deskripsi`, `tanggal_lelang`, `waktu_berakhir`, `harga_awal`, `status`, `berat`, `foto_padi`, `pemenang`) VALUES
(1, 1, 2, 'PADINYA INeZ', 'INI PADINYA INEZ', '2018-05-02 00:00:00', '2018-05-05 13:00:00', 20, 1, 300, '5.jpg', 1),
(2, 0, 3, 'Hagai Juga Punya', 'ini lelangan punya sung Hagai Ada lawan???\r\nanda tawar kami senang..\r\nandal sopan kami segan !!!', '2018-05-17 11:38:00', '2018-05-19 00:00:00', 400000, 1, 20, '6.jpg', 1),
(3, 1, 1, 'Amsal Lelang', 'ini padi biasa ga ada spesialnya !', '2018-05-17 21:10:00', '2018-06-01 09:35:00', 30000, 1, 20, '2.jpg', 3),
(4, 0, 2, 'inez2', 'ini padi enak kalo dimasak', '2018-06-03 19:44:00', '2018-06-05 15:57:00', 30000, 1, 30, '1.jpg', 1),
(6, 1, 2, 'INEZ NGELELANG LAGI', 'ini lelangan gue', '2018-06-05 00:00:00', '2018-06-08 00:00:00', 30000, 0, 10, '29417494_1785465184848335_7954576575209406464_n.jpg', NULL),
(7, 1, 1, 'amsal Lelang', 'Coba Aja', '2018-06-05 00:00:00', '2018-06-08 00:00:00', 200000, 0, 6, '26156477_157143554917610_1582962535412269056_n.jpg', NULL),
(8, 1, 4, 'Joni Mulai lelang', 'coba Aja', '2018-06-05 00:00:00', '2018-06-09 00:00:00', 30000, 0, 15, 'RecordActive.PNG', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `padi`
--

CREATE TABLE `padi` (
  `id_padi` int(11) NOT NULL,
  `jenis_padi` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `foto_padi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `padi`
--

INSERT INTO `padi` (`id_padi`, `jenis_padi`, `deskripsi`, `foto_padi`) VALUES
(0, 'Padi Batak', 'Padi jenis ini adalah padi terbaik di seluruh dunia..\r\nrasa yang enak dan kualitas yang sangat baik membuat nya menjadi raja di seluruh padi didunia.', ''),
(1, 'Padi Batak', 'Padi jenis ini adalah padi terbaik di seluruh dunia..\r\nrasa yang enak dan kualitas yang sangat baik membuat nya menjadi raja di seluruh padi didunia.', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawaran`
--

CREATE TABLE `penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `padi_id_padi` int(11) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `harga_penawaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penawaran`
--

INSERT INTO `penawaran` (`id_penawaran`, `padi_id_padi`, `user_id_user`, `harga_penawaran`) VALUES
(1, 1, 1, 20000),
(2, 1, 1, 20000),
(5, 1, 1, 10),
(6, 1, 1, 60000),
(7, 1, 1, 90001),
(8, 1, 3, 120005),
(9, 1, 1, 150005),
(10, 1, 3, 180023),
(11, 1, 1, 250000),
(13, 1, 3, 300000),
(14, 1, 1, 350000),
(16, 2, 1, 402000),
(17, 2, 2, 404000),
(18, 2, 1, 406000),
(19, 3, 3, 32000),
(20, 3, 2, 34000),
(21, 3, 3, 40000),
(22, 4, 1, 33000),
(23, 4, 3, 36000),
(24, 4, 1, 39000),
(25, 4, 3, 42000),
(28, 4, 1, 45000),
(29, 8, 3, 31500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayatlelang`
--

CREATE TABLE `riwayatlelang` (
  `id_riwayatLelang` int(11) NOT NULL,
  `pemenang_lelang` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `review` longtext,
  `foto_bukti_pembayaran` varchar(200) DEFAULT NULL,
  `status_pemenang` int(11) DEFAULT NULL,
  `status_pelelang` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayatlelang`
--

INSERT INTO `riwayatlelang` (`id_riwayatLelang`, `pemenang_lelang`, `id_lelang`, `review`, `foto_bukti_pembayaran`, `status_pemenang`, `status_pelelang`) VALUES
(4, 1, 1, 'ini merupakan padi yang sangat baik. saya merasa sangat senang dapat memangkan lelangan ini. TERIMAKASIH BANYAK', 'TransportLayer.PNG', 1, '1'),
(8, 3, 3, 'ini lelang yang bagus !!!', '66c47447-f49a-4b0b-8a9c-7eb4f418517d.png', 2, '1'),
(11, 3, 3, '', 'RecordActive.PNG', 2, '1'),
(12, 3, 3, '', 'RecordActive.PNG', 1, '1'),
(13, 1, 2, 'saya senang sekali', 'imagesaas.jpg', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Jenis_kelamin` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `no_rekening` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_depan`, `nama_belakang`, `tgl_lahir`, `alamat`, `email`, `Jenis_kelamin`, `foto`, `no_telepon`, `no_rekening`) VALUES
(1, 'amsal', 'amsal', 'Amsal', 'Situmorang', '2000-02-03', 'Jln.Raja Johannes hutabarat Tarutung', 'amsit151215@gmail.com', 'LK', '', '08121111111', NULL),
(2, 'inez', 'inez', 'inez', 'inez', '2018-05-03', 'asrama pniel', 'inez@gmail.com', 'PR', '', '0123456789', NULL),
(3, 'hagai', 'hagai', 'hagai', 'hagai', '0000-00-00', '', '', '', '', '', NULL),
(4, 'joni', 'joni', 'joni', 'nababan', '2018-05-09', 'del.laguboti', 'joni.nababan@gmail.com', 'LK', '', '081269126912', '08888788890123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`,`padi_id_padi`,`user_id_user`),
  ADD KEY `fk_padi_user1_idx` (`user_id_user`),
  ADD KEY `fk_lelang_padi1_idx` (`padi_id_padi`);

--
-- Indexes for table `padi`
--
ALTER TABLE `padi`
  ADD PRIMARY KEY (`id_padi`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id_penawaran`,`padi_id_padi`,`user_id_user`),
  ADD KEY `fk_penawaran_padi1_idx` (`padi_id_padi`),
  ADD KEY `fk_penawaran_user1_idx` (`user_id_user`);

--
-- Indexes for table `riwayatlelang`
--
ALTER TABLE `riwayatlelang`
  ADD PRIMARY KEY (`id_riwayatLelang`,`pemenang_lelang`,`id_lelang`),
  ADD KEY `fk_review_user_idx` (`pemenang_lelang`),
  ADD KEY `fk_review_padi1_idx` (`id_lelang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `riwayatlelang`
--
ALTER TABLE `riwayatlelang`
  MODIFY `id_riwayatLelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `fk_lelang_padi1` FOREIGN KEY (`padi_id_padi`) REFERENCES `padi` (`id_padi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_padi_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD CONSTRAINT `fk_penawaran_padi1` FOREIGN KEY (`padi_id_padi`) REFERENCES `lelang` (`id_lelang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penawaran_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `riwayatlelang`
--
ALTER TABLE `riwayatlelang`
  ADD CONSTRAINT `fk_review_padi1` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id_lelang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`pemenang_lelang`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
