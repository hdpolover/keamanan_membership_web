-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Jun 2022 pada 13.51
-- Versi server: 5.7.38-cll-lve
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngodingin_enkripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_auth`
--

CREATE TABLE `tb_auth` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` int(5) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_auth`
--

INSERT INTO `tb_auth` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$f1F8rcC9wce1BqxxS8B1.e9iD8Y38ahfU069wYDi8Owz6ImZMnSvi', 1),
(2, 'mahendra', '$2y$10$ZI2.Nl6Ds98je8SPN6ujde.K6Ec/fdfxUIousJ4BIr6mH5Zy/m8Vy', 2),
(3, 'erwin_', '$2y$10$8aLstsN5eJg3Ub4U7VW/fejo5G6A.4oRxIAdxAnfUFpS3GsUVrVae', 2),
(4, 'alvin_', '$2y$10$oUvkUCY9VDwy.5yuuTm.neuj0AgtxM2pBLpUDFCW9fieNHTXL5hWW', 2),
(5, 'bayu_', '$2y$10$zIBWWm8KYsxnMiv03JU79OcBZ/KC3wHsXK5XJJ7frrXINsTubYB2u', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `kode` varchar(16) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telp`, `kode`, `status`, `user_id`) VALUES
(10, 'admin', 'Malang - East Java, Indonesia', 'Malang', '2014-12-19', 'Laki-laki', '085157444518', 'ngodinginindones', 'aktif', 1),
(14, 'Mahendra Dwi Purwanto', 'Singosari\r\nCandirenggo', 'Malang', '2022-06-09', 'Laki-laki', '085785111746', '1234567890123456', 'aktif', 2),
(15, 'ab953e732cbaa0557f1c708f30a25570', '2a538244896dfb9acb9d4af60fa07925', 'e8a05fb6e239eac08ed7360d58af1d', '1999-06-02', '06c23e9dde', '4db153e0f9f646b4ade3', 'tokosilvajogjaaa', 'aktif', 3),
(16, 'Alvin N', 'jl. palagan', 'Sleman', '1998-12-07', 'Laki-laki', '08972726555', 'tokosilvajogjaaa', 'aktif', 4),
(17, 'ebead2e492eeaac3134525320549bc3b', '2bb2da863fd0760bb00bf48c2da0a735', '2bb2da863fd0760bb00bf48c2da0a7', '2022-06-09', '06c23e9dde', '130fb300c909d9396973', 'tokosilvajogjaaa', 'aktif', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
