-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2020 pada 14.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `stok`, `tempat`) VALUES
(1, 'Mouse', 50, 'Gudang Kampus 1'),
(2, 'Keyboard', 50, 'Gudang Kampus 1'),
(3, 'Monitor', 50, 'Gudang Kampus 1'),
(4, 'Meja', 75, 'Gudang Kampus 2'),
(5, 'Kursi', 75, 'Gudang Kampus 2'),
(6, 'CPU', 25, 'Gudang Kampus 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detail_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_barang`
--

INSERT INTO `detail_barang` (`id_detail_barang`, `id_barang`, `kondisi`, `status`) VALUES
(1, 1, 'Bagus', 'Tersedia'),
(2, 1, 'Bagus', 'Tersedia'),
(3, 1, 'Bagus', 'Tersedia'),
(4, 1, 'Bagus', 'Tersedia'),
(5, 1, 'Bagus', 'Tersedia'),
(6, 1, 'Bagus', 'Tersedia'),
(7, 1, 'Bagus', 'Tersedia'),
(8, 1, 'Bagus', 'Tersedia'),
(9, 1, 'Bagus', 'Tersedia'),
(10, 1, 'Bagus', 'Tersedia'),
(11, 1, 'Bagus', 'Tersedia'),
(12, 1, 'Bagus', 'Tersedia'),
(13, 1, 'Bagus', 'Tersedia'),
(14, 1, 'Bagus', 'Tersedia'),
(15, 1, 'Bagus', 'Tersedia'),
(16, 1, 'Bagus', 'Tersedia'),
(17, 1, 'Bagus', 'Tersedia'),
(18, 1, 'Bagus', 'Tersedia'),
(19, 1, 'Bagus', 'Tersedia'),
(20, 1, 'Bagus', 'Tersedia'),
(21, 1, 'Bagus', 'Tersedia'),
(22, 1, 'Bagus', 'Tersedia'),
(23, 1, 'Bagus', 'Tersedia'),
(24, 1, 'Bagus', 'Tersedia'),
(25, 1, 'Bagus', 'Tersedia'),
(26, 1, 'Bagus', 'Tersedia'),
(27, 1, 'Bagus', 'Tersedia'),
(28, 1, 'Bagus', 'Tersedia'),
(29, 1, 'Bagus', 'Tersedia'),
(30, 1, 'Bagus', 'Tersedia'),
(31, 1, 'Bagus', 'Tersedia'),
(32, 1, 'Bagus', 'Tersedia'),
(33, 1, 'Bagus', 'Tersedia'),
(34, 1, 'Bagus', 'Tersedia'),
(35, 1, 'Bagus', 'Tersedia'),
(36, 1, 'Bagus', 'Tersedia'),
(37, 1, 'Bagus', 'Tersedia'),
(38, 1, 'Bagus', 'Tersedia'),
(39, 1, 'Bagus', 'Tersedia'),
(40, 1, 'Bagus', 'Tersedia'),
(41, 1, 'Bagus', 'Tersedia'),
(42, 1, 'Bagus', 'Tersedia'),
(43, 1, 'Bagus', 'Tersedia'),
(44, 1, 'Bagus', 'Tersedia'),
(45, 1, 'Bagus', 'Tersedia'),
(46, 1, 'Bagus', 'Tersedia'),
(47, 1, 'Bagus', 'Tersedia'),
(48, 1, 'Bagus', 'Tersedia'),
(49, 1, 'Bagus', 'Tersedia'),
(50, 1, 'Bagus', 'Tersedia'),
(51, 2, 'Bagus', 'Tersedia'),
(52, 2, 'Bagus', 'Tersedia'),
(53, 2, 'Bagus', 'Tersedia'),
(54, 2, 'Bagus', 'Tersedia'),
(55, 2, 'Bagus', 'Tersedia'),
(56, 2, 'Bagus', 'Tersedia'),
(57, 2, 'Bagus', 'Tersedia'),
(58, 2, 'Bagus', 'Tersedia'),
(59, 2, 'Bagus', 'Tersedia'),
(60, 2, 'Bagus', 'Tersedia'),
(61, 2, 'Bagus', 'Tersedia'),
(62, 2, 'Bagus', 'Tersedia'),
(63, 2, 'Bagus', 'Tersedia'),
(64, 2, 'Bagus', 'Tersedia'),
(65, 2, 'Bagus', 'Tersedia'),
(66, 2, 'Bagus', 'Tersedia'),
(67, 2, 'Bagus', 'Tersedia'),
(68, 2, 'Bagus', 'Tersedia'),
(69, 2, 'Bagus', 'Tersedia'),
(70, 2, 'Bagus', 'Tersedia'),
(71, 2, 'Bagus', 'Tersedia'),
(72, 2, 'Bagus', 'Tersedia'),
(73, 2, 'Bagus', 'Tersedia'),
(74, 2, 'Bagus', 'Tersedia'),
(75, 2, 'Bagus', 'Tersedia'),
(76, 2, 'Bagus', 'Tersedia'),
(77, 2, 'Bagus', 'Tersedia'),
(78, 2, 'Bagus', 'Tersedia'),
(79, 2, 'Bagus', 'Tersedia'),
(80, 2, 'Bagus', 'Tersedia'),
(81, 2, 'Bagus', 'Tersedia'),
(82, 2, 'Bagus', 'Tersedia'),
(83, 2, 'Bagus', 'Tersedia'),
(84, 2, 'Bagus', 'Tersedia'),
(85, 2, 'Bagus', 'Tersedia'),
(86, 2, 'Bagus', 'Tersedia'),
(87, 2, 'Bagus', 'Tersedia'),
(88, 2, 'Bagus', 'Tersedia'),
(89, 2, 'Bagus', 'Tersedia'),
(90, 2, 'Bagus', 'Tersedia'),
(91, 2, 'Bagus', 'Tersedia'),
(92, 2, 'Bagus', 'Tersedia'),
(93, 2, 'Bagus', 'Tersedia'),
(94, 2, 'Bagus', 'Tersedia'),
(95, 2, 'Bagus', 'Tersedia'),
(96, 2, 'Bagus', 'Tersedia'),
(97, 2, 'Bagus', 'Tersedia'),
(98, 2, 'Bagus', 'Tersedia'),
(99, 2, 'Bagus', 'Tersedia'),
(100, 2, 'Bagus', 'Tersedia'),
(101, 3, 'Bagus', 'Tersedia'),
(102, 3, 'Bagus', 'Tersedia'),
(103, 3, 'Bagus', 'Tersedia'),
(104, 3, 'Bagus', 'Tersedia'),
(105, 3, 'Bagus', 'Tersedia'),
(106, 3, 'Bagus', 'Tersedia'),
(107, 3, 'Bagus', 'Tersedia'),
(108, 3, 'Bagus', 'Tersedia'),
(109, 3, 'Bagus', 'Tersedia'),
(110, 3, 'Bagus', 'Tersedia'),
(111, 3, 'Bagus', 'Tersedia'),
(112, 3, 'Bagus', 'Tersedia'),
(113, 3, 'Bagus', 'Tersedia'),
(114, 3, 'Bagus', 'Tersedia'),
(115, 3, 'Bagus', 'Tersedia'),
(116, 3, 'Bagus', 'Tersedia'),
(117, 3, 'Bagus', 'Tersedia'),
(118, 3, 'Bagus', 'Tersedia'),
(119, 3, 'Bagus', 'Tersedia'),
(120, 3, 'Bagus', 'Tersedia'),
(121, 3, 'Bagus', 'Tersedia'),
(122, 3, 'Bagus', 'Tersedia'),
(123, 3, 'Bagus', 'Tersedia'),
(124, 3, 'Bagus', 'Tersedia'),
(125, 3, 'Bagus', 'Tersedia'),
(126, 3, 'Bagus', 'Tersedia'),
(127, 3, 'Bagus', 'Tersedia'),
(128, 3, 'Bagus', 'Tersedia'),
(129, 3, 'Bagus', 'Tersedia'),
(130, 3, 'Bagus', 'Tersedia'),
(131, 3, 'Bagus', 'Tersedia'),
(132, 3, 'Bagus', 'Tersedia'),
(133, 3, 'Bagus', 'Tersedia'),
(134, 3, 'Bagus', 'Tersedia'),
(135, 3, 'Bagus', 'Tersedia'),
(136, 3, 'Bagus', 'Tersedia'),
(137, 3, 'Bagus', 'Tersedia'),
(138, 3, 'Bagus', 'Tersedia'),
(139, 3, 'Bagus', 'Tersedia'),
(140, 3, 'Bagus', 'Tersedia'),
(141, 3, 'Bagus', 'Tersedia'),
(142, 3, 'Bagus', 'Tersedia'),
(143, 3, 'Bagus', 'Tersedia'),
(144, 3, 'Bagus', 'Tersedia'),
(145, 3, 'Bagus', 'Tersedia'),
(146, 3, 'Bagus', 'Tersedia'),
(147, 3, 'Bagus', 'Tersedia'),
(148, 3, 'Bagus', 'Tersedia'),
(149, 3, 'Bagus', 'Tersedia'),
(150, 3, 'Bagus', 'Tersedia'),
(151, 4, 'Bagus', 'Tersedia'),
(152, 4, 'Bagus', 'Tersedia'),
(153, 4, 'Bagus', 'Tersedia'),
(154, 4, 'Bagus', 'Tersedia'),
(155, 4, 'Bagus', 'Tersedia'),
(156, 4, 'Bagus', 'Tersedia'),
(157, 4, 'Bagus', 'Tersedia'),
(158, 4, 'Bagus', 'Tersedia'),
(159, 4, 'Bagus', 'Tersedia'),
(160, 4, 'Bagus', 'Tersedia'),
(161, 4, 'Bagus', 'Tersedia'),
(162, 4, 'Bagus', 'Tersedia'),
(163, 4, 'Bagus', 'Tersedia'),
(164, 4, 'Bagus', 'Tersedia'),
(165, 4, 'Bagus', 'Tersedia'),
(166, 4, 'Bagus', 'Tersedia'),
(167, 4, 'Bagus', 'Tersedia'),
(168, 4, 'Bagus', 'Tersedia'),
(169, 4, 'Bagus', 'Tersedia'),
(170, 4, 'Bagus', 'Tersedia'),
(171, 4, 'Bagus', 'Tersedia'),
(172, 4, 'Bagus', 'Tersedia'),
(173, 4, 'Bagus', 'Tersedia'),
(174, 4, 'Bagus', 'Tersedia'),
(175, 4, 'Bagus', 'Tersedia'),
(176, 4, 'Bagus', 'Tersedia'),
(177, 4, 'Bagus', 'Tersedia'),
(178, 4, 'Bagus', 'Tersedia'),
(179, 4, 'Bagus', 'Tersedia'),
(180, 4, 'Bagus', 'Tersedia'),
(181, 4, 'Bagus', 'Tersedia'),
(182, 4, 'Bagus', 'Tersedia'),
(183, 4, 'Bagus', 'Tersedia'),
(184, 4, 'Bagus', 'Tersedia'),
(185, 4, 'Bagus', 'Tersedia'),
(186, 4, 'Bagus', 'Tersedia'),
(187, 4, 'Bagus', 'Tersedia'),
(188, 4, 'Bagus', 'Tersedia'),
(189, 4, 'Bagus', 'Tersedia'),
(190, 4, 'Bagus', 'Tersedia'),
(191, 4, 'Bagus', 'Tersedia'),
(192, 4, 'Bagus', 'Tersedia'),
(193, 4, 'Bagus', 'Tersedia'),
(194, 4, 'Bagus', 'Tersedia'),
(195, 4, 'Bagus', 'Tersedia'),
(196, 4, 'Bagus', 'Tersedia'),
(197, 4, 'Bagus', 'Tersedia'),
(198, 4, 'Bagus', 'Tersedia'),
(199, 4, 'Bagus', 'Tersedia'),
(200, 4, 'Bagus', 'Tersedia'),
(201, 4, 'Bagus', 'Tersedia'),
(202, 4, 'Bagus', 'Tersedia'),
(203, 4, 'Bagus', 'Tersedia'),
(204, 4, 'Bagus', 'Tersedia'),
(205, 4, 'Bagus', 'Tersedia'),
(206, 4, 'Bagus', 'Tersedia'),
(207, 4, 'Bagus', 'Tersedia'),
(208, 4, 'Bagus', 'Tersedia'),
(209, 4, 'Bagus', 'Tersedia'),
(210, 4, 'Bagus', 'Tersedia'),
(211, 4, 'Bagus', 'Tersedia'),
(212, 4, 'Bagus', 'Tersedia'),
(213, 4, 'Bagus', 'Tersedia'),
(214, 4, 'Bagus', 'Tersedia'),
(215, 4, 'Bagus', 'Tersedia'),
(216, 4, 'Bagus', 'Tersedia'),
(217, 4, 'Bagus', 'Tersedia'),
(218, 4, 'Bagus', 'Tersedia'),
(219, 4, 'Bagus', 'Tersedia'),
(220, 4, 'Bagus', 'Tersedia'),
(221, 4, 'Bagus', 'Tersedia'),
(222, 4, 'Bagus', 'Tersedia'),
(223, 4, 'Bagus', 'Tersedia'),
(224, 4, 'Bagus', 'Tersedia'),
(225, 4, 'Bagus', 'Tersedia'),
(226, 5, 'Bagus', 'Tersedia'),
(227, 5, 'Bagus', 'Tersedia'),
(228, 5, 'Bagus', 'Tersedia'),
(229, 5, 'Bagus', 'Tersedia'),
(230, 5, 'Bagus', 'Tersedia'),
(231, 5, 'Bagus', 'Tersedia'),
(232, 5, 'Bagus', 'Tersedia'),
(233, 5, 'Bagus', 'Tersedia'),
(234, 5, 'Bagus', 'Tersedia'),
(235, 5, 'Bagus', 'Tersedia'),
(236, 5, 'Bagus', 'Tersedia'),
(237, 5, 'Bagus', 'Tersedia'),
(238, 5, 'Bagus', 'Tersedia'),
(239, 5, 'Bagus', 'Tersedia'),
(240, 5, 'Bagus', 'Tersedia'),
(241, 5, 'Bagus', 'Tersedia'),
(242, 5, 'Bagus', 'Tersedia'),
(243, 5, 'Bagus', 'Tersedia'),
(244, 5, 'Bagus', 'Tersedia'),
(245, 5, 'Bagus', 'Tersedia'),
(246, 5, 'Bagus', 'Tersedia'),
(247, 5, 'Bagus', 'Tersedia'),
(248, 5, 'Bagus', 'Tersedia'),
(249, 5, 'Bagus', 'Tersedia'),
(250, 5, 'Bagus', 'Tersedia'),
(251, 5, 'Bagus', 'Tersedia'),
(252, 5, 'Bagus', 'Tersedia'),
(253, 5, 'Bagus', 'Tersedia'),
(254, 5, 'Bagus', 'Tersedia'),
(255, 5, 'Bagus', 'Tersedia'),
(256, 5, 'Bagus', 'Tersedia'),
(257, 5, 'Bagus', 'Tersedia'),
(258, 5, 'Bagus', 'Tersedia'),
(259, 5, 'Bagus', 'Tersedia'),
(260, 5, 'Bagus', 'Tersedia'),
(261, 5, 'Bagus', 'Tersedia'),
(262, 5, 'Bagus', 'Tersedia'),
(263, 5, 'Bagus', 'Tersedia'),
(264, 5, 'Bagus', 'Tersedia'),
(265, 5, 'Bagus', 'Tersedia'),
(266, 5, 'Bagus', 'Tersedia'),
(267, 5, 'Bagus', 'Tersedia'),
(268, 5, 'Bagus', 'Tersedia'),
(269, 5, 'Bagus', 'Tersedia'),
(270, 5, 'Bagus', 'Tersedia'),
(271, 5, 'Bagus', 'Tersedia'),
(272, 5, 'Bagus', 'Tersedia'),
(273, 5, 'Bagus', 'Tersedia'),
(274, 5, 'Bagus', 'Tersedia'),
(275, 5, 'Bagus', 'Tersedia'),
(276, 5, 'Bagus', 'Tersedia'),
(277, 5, 'Bagus', 'Tersedia'),
(278, 5, 'Bagus', 'Tersedia'),
(279, 5, 'Bagus', 'Tersedia'),
(280, 5, 'Bagus', 'Tersedia'),
(281, 5, 'Bagus', 'Tersedia'),
(282, 5, 'Bagus', 'Tersedia'),
(283, 5, 'Bagus', 'Tersedia'),
(284, 5, 'Bagus', 'Tersedia'),
(285, 5, 'Bagus', 'Tersedia'),
(286, 5, 'Bagus', 'Tersedia'),
(287, 5, 'Bagus', 'Tersedia'),
(288, 5, 'Bagus', 'Tersedia'),
(289, 5, 'Bagus', 'Tersedia'),
(290, 5, 'Bagus', 'Tersedia'),
(291, 5, 'Bagus', 'Tersedia'),
(292, 5, 'Bagus', 'Tersedia'),
(293, 5, 'Bagus', 'Tersedia'),
(294, 5, 'Bagus', 'Tersedia'),
(295, 5, 'Bagus', 'Tersedia'),
(296, 5, 'Bagus', 'Tersedia'),
(297, 5, 'Bagus', 'Tersedia'),
(298, 5, 'Bagus', 'Tersedia'),
(299, 5, 'Bagus', 'Tersedia'),
(300, 5, 'Bagus', 'Tersedia'),
(301, 6, 'Bagus', 'Tersedia'),
(302, 6, 'Bagus', 'Tersedia'),
(303, 6, 'Bagus', 'Tersedia'),
(304, 6, 'Bagus', 'Tersedia'),
(305, 6, 'Bagus', 'Tersedia'),
(306, 6, 'Bagus', 'Tersedia'),
(307, 6, 'Bagus', 'Tersedia'),
(308, 6, 'Bagus', 'Tersedia'),
(309, 6, 'Bagus', 'Tersedia'),
(310, 6, 'Bagus', 'Tersedia'),
(311, 6, 'Bagus', 'Tersedia'),
(312, 6, 'Bagus', 'Tersedia'),
(313, 6, 'Bagus', 'Tersedia'),
(314, 6, 'Bagus', 'Tersedia'),
(315, 6, 'Bagus', 'Tersedia'),
(316, 6, 'Bagus', 'Tersedia'),
(317, 6, 'Bagus', 'Tersedia'),
(318, 6, 'Bagus', 'Tersedia'),
(319, 6, 'Bagus', 'Tersedia'),
(320, 6, 'Bagus', 'Tersedia'),
(321, 6, 'Bagus', 'Tersedia'),
(322, 6, 'Bagus', 'Tersedia'),
(323, 6, 'Bagus', 'Tersedia'),
(324, 6, 'Bagus', 'Tersedia'),
(325, 6, 'Bagus', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjamn` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjamn`, `id_barang`, `jumlah`, `id_peminjaman`) VALUES
(1, 1, 5, 1),
(2, 2, 10, 2),
(3, 3, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `bagus` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `id_barang`, `bagus`, `rusak`, `jumlah`, `id_pengembalian`) VALUES
(1, 1, 5, 0, 5, 1),
(2, 2, 10, 0, 10, 2),
(3, 3, 5, 0, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama`, `alamat`, `no_telp`, `email`) VALUES
(1, 'Fachri ', 'Gading Tutuka 2', '085722635209', 'FachriEka52@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `id_peminjam`, `jumlah`, `status`, `id_user`) VALUES
(1, '2020-12-26', 1, 5, 'Dikembalikan', 1),
(2, '2020-12-26', 1, 15, 'Dikembalikan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tgl_pengembalian`, `jumlah`, `id_user`) VALUES
(1, 1, '2020-12-26', 5, 1),
(2, 2, '2020-12-26', 15, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `username`, `password`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin'),
(2, 'Petugas', 'Petugas', 'petugas', 'petugas'),
(3, 'Kepala Sekolah', 'Kepala Sekolah', 'kepalasekolah', 'kepalasekolah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detail_barang`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjamn`),
  ADD KEY `id_perkakas` (`id_barang`,`id_peminjaman`);

--
-- Indeks untuk tabel `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id_detail_pengembalian`);

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_peminjam`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detail_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjamn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
