-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 07 Jun 2022 pada 01.07
-- Versi server: 5.7.36
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

DROP TABLE IF EXISTS `kamar`;
CREATE TABLE IF NOT EXISTS `kamar` (
  `idkamar` varchar(15) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idkamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `gambar`) VALUES
('001', 'Superior', 10, 410000, 'room1.jpg'),
('002', 'Deluxe', 20, 450000, 'room2.jpg'),
('003', 'Junior Suite', 20, 700000, 'room3.jpg'),
('004', 'Executive', 20, 1200000, 'room4.jpg'),
('005', 'Panthouse', NULL, 1700000, '629c60ac10f69.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `idpesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `norek` varchar(15) NOT NULL,
  `namarek` varchar(50) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  KEY `idpesan` (`idpesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpesan`, `nama`, `jumlah`, `bank`, `norek`, `namarek`, `gambar`, `gambar2`) VALUES
(1, 'IRFAN', 1200000, 'BRI', '87454154847987', 'Siapa?', '629b0e5ad076b.png', '629b0e5ad1049.png'),
(2, 'SAHA?', 900000, 'BCA', '456789', 'bfdbfd', '629b0f1eefce2.png', '629b0f1ef00bc.png'),
(3, 'IRFAN', 700000, 'BNI', '789765455', 'XXX', '629b11091fc37.png', '629b11091fc4c.png'),
(4, 'SAHA?', 700000, 'Mandiri', '5465415564', 'XXX', '629b1529b069b.png', '629b1529b17ac.png'),
(5, 'IRFAN', 1350000, 'Mandiri', '456789', 'lpopo', '629da5bb665b9.png', '629da5bb66ee9.png'),
(6, 'IRFAN', 410000, 'BCA', '753159456852', 'Bebas ajalah', '629ea1fcb18a3.jpg', '629ea1fcb9842.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `idpesan` int(11) NOT NULL AUTO_INCREMENT,
  `tglpesan` datetime DEFAULT NULL,
  `batasbayar` datetime DEFAULT NULL,
  `idkamar` varchar(15) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `idtamu` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `tglkeluar` date DEFAULT NULL,
  `lamahari` int(11) DEFAULT NULL,
  `totalbayar` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpesan`),
  KEY `idkamar` (`idkamar`),
  KEY `idtamu` (`idtamu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpesan`, `tglpesan`, `batasbayar`, `idkamar`, `tipe`, `harga`, `jumlah`, `idtamu`, `nama`, `alamat`, `telepon`, `tglmasuk`, `tglkeluar`, `lamahari`, `totalbayar`, `status`) VALUES
(1, '2022-06-04 14:48:08', '2022-06-04 19:48:08', '004', 'Executive', 1200000, 1, 8, 'IRFAN', 'asdafa', '0877887787', '2022-06-05', '2022-06-06', 1, 1200000, 'Dibatalkan'),
(2, '2022-06-04 14:51:33', '2022-06-04 19:51:33', '002', 'Deluxe', 450000, 1, 4, 'SAHA?', 'asd', '0889898995', '2022-06-05', '2022-06-07', 2, 900000, 'Dibatalkan..'),
(3, '2022-06-04 14:59:32', '2022-06-04 19:59:32', '003', 'Junior Suite', 700000, 1, 8, 'IRFAN', 'asdafa', '0877887787', '2022-06-05', '2022-06-06', 1, 700000, 'Dibatalkan'),
(4, '2022-06-04 15:16:52', '2022-06-04 20:16:52', '003', 'Junior Suite', 700000, 1, 4, 'SAHA?', 'asd', '0889898995', '2022-06-05', '2022-06-06', 1, 700000, 'Berhasil..'),
(5, '2022-06-06 13:58:34', '2022-06-06 18:58:34', '002', 'Deluxe', 450000, 3, 8, 'IRFAN', 'asdafa', '0877887787', '2022-06-07', '2022-06-08', 1, 1350000, 'Dibatalkan'),
(6, '2022-06-07 07:54:27', '2022-06-07 12:54:27', '001', 'Superior', 410000, 1, 8, 'IRFAN', 'asdafa', '0877887787', '2022-06-09', '2022-06-10', 1, 410000, 'Berhasil..');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokkamar`
--

DROP TABLE IF EXISTS `stokkamar`;
CREATE TABLE IF NOT EXISTS `stokkamar` (
  `idkamar` varchar(15) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  KEY `idkamar` (`idkamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stokkamar`
--

INSERT INTO `stokkamar` (`idkamar`, `tipe`, `stok`) VALUES
('001', 'Superior', 19),
('002', 'Deluxe', 16),
('003', 'Junior Suite', 19),
('004', 'Executive', 19),
('005', 'Presidential/Panthouse', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

DROP TABLE IF EXISTS `tamu`;
CREATE TABLE IF NOT EXISTS `tamu` (
  `idtamu` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idtamu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `username`, `role`, `email`, `nama`, `alamat`, `telepon`, `password`, `foto`) VALUES
(4, 'japar', 'user', 'asd@gmail.com', 'SAHA?', 'asd', '0889898995', '$2y$10$uVrNjEA4BWJ53m4o0.MkSeVHAIy8r9l393LP5i3RVWgo7yK5AaRSe', NULL),
(5, 'admin', 'admin', 'admin@gmail.com', 'ADMIN HOTEL', 'Jl.Admin', '07898789546', '$2y$10$n4jt36i.wPm2GmPgzh7FUOXqfPaxqtgLXMV2X/zx.OZh.N2bUi2SW', NULL),
(8, 'irfan', 'user', 'asd@gmail.com', 'IRFAN', 'asdafa', '0877887787', '$2y$10$ycvdsBdJRuVetP7qbBYoXOHsws7MbNvAwOgFC5xI4Y8LlH69FYhCS', NULL),
(9, 'admin hotel', 'admin', 'ujang.ganteng@gmail.com', 'ADMIN', 'sad', '0875465452', '$2y$10$mwCsObn5gYDi.RtAvEhTbuqDB3gPLQZXWWP2a1371p9XZi9QnG/iC', NULL);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idpesan`) REFERENCES `pemesanan` (`idpesan`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`idkamar`) REFERENCES `kamar` (`idkamar`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`idtamu`) REFERENCES `tamu` (`idtamu`);

--
-- Ketidakleluasaan untuk tabel `stokkamar`
--
ALTER TABLE `stokkamar`
  ADD CONSTRAINT `stokkamar_ibfk_1` FOREIGN KEY (`idkamar`) REFERENCES `kamar` (`idkamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
