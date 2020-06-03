-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2020 pada 10.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_masukan`
--

CREATE TABLE `data_masukan` (
  `id_data` int(20) NOT NULL,
  `id_pemain` int(20) NOT NULL,
  `id_menu` int(20) NOT NULL,
  `point` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_masukan`
--

INSERT INTO `data_masukan` (`id_data`, `id_pemain`, `id_menu`, `point`, `tanggal`) VALUES
(1, 2, 40, 20, '2020-04-28'),
(2, 2, 21, 20, '2020-04-28'),
(3, 2, 23, 20, '2020-04-28'),
(4, 10, 40, 16, '2020-04-28'),
(5, 10, 21, 17, '2020-04-28'),
(6, 10, 23, 23, '2020-04-28'),
(8, 2, 1, 15, '2020-05-02'),
(9, 2, 2, 22, '2020-05-02'),
(10, 2, 3, 9, '2020-05-02'),
(11, 2, 4, 8, '2020-05-02'),
(12, 2, 5, 24, '2020-05-02'),
(13, 2, 6, 10, '2020-05-02'),
(14, 10, 1, 16, '2020-05-02'),
(15, 10, 2, 25, '2020-05-02'),
(16, 10, 3, 8, '2020-05-02'),
(17, 10, 4, 9, '2020-05-02'),
(18, 10, 5, 23, '2020-05-02'),
(19, 10, 6, 11, '2020-05-02'),
(20, 11, 1, 17, '2020-05-02'),
(21, 11, 2, 24, '2020-05-02'),
(22, 11, 3, 8, '2020-05-02'),
(23, 11, 4, 9, '2020-05-02'),
(24, 11, 5, 20, '2020-05-02'),
(25, 11, 6, 11, '2020-05-02'),
(26, 16, 1, 17, '2020-05-08'),
(27, 16, 2, 23, '2020-05-08'),
(28, 16, 3, 9, '2020-05-08'),
(29, 16, 4, 7, '2020-05-08'),
(30, 16, 5, 21, '2020-05-08'),
(31, 16, 6, 11, '2020-05-08'),
(32, 17, 1, 17, '2020-05-12'),
(33, 17, 2, 23, '2020-05-12'),
(34, 17, 3, 9, '2020-05-12'),
(35, 17, 4, 9, '2020-05-12'),
(36, 17, 5, 20, '2020-05-12'),
(37, 17, 6, 12, '2020-05-12'),
(38, 14, 1, 18, '2020-06-02'),
(39, 14, 2, 22, '2020-06-02'),
(40, 14, 3, 9, '2020-06-02'),
(41, 14, 4, 8, '2020-06-02'),
(42, 14, 5, 20, '2020-06-02'),
(43, 14, 6, 11, '2020-06-02'),
(44, 2, 44, 17, '2020-06-02'),
(45, 2, 53, 10, '2020-06-02'),
(46, 2, 21, 12, '2020-06-02'),
(47, 10, 44, 17, '2020-06-02'),
(48, 10, 53, 13, '2020-06-02'),
(49, 10, 21, 12, '2020-06-02'),
(50, 11, 44, 16, '2020-06-02'),
(51, 11, 53, 11, '2020-06-02'),
(52, 11, 21, 10, '2020-06-02'),
(53, 17, 44, 17, '2020-06-02'),
(54, 17, 53, 13, '2020-06-02'),
(55, 17, 21, 11, '2020-06-02'),
(56, 16, 44, 15, '2020-06-02'),
(57, 16, 53, 10, '2020-06-02'),
(58, 16, 21, 9, '2020-06-02'),
(59, 14, 44, 16, '2020-06-02'),
(60, 14, 53, 10, '2020-06-02'),
(61, 14, 21, 8, '2020-06-02'),
(62, 18, 44, 16, '2020-06-02'),
(63, 18, 53, 11, '2020-06-02'),
(64, 18, 21, 12, '2020-06-02'),
(65, 18, 1, 17, '2020-06-02'),
(66, 18, 2, 22, '2020-06-02'),
(67, 18, 3, 8, '2020-06-02'),
(68, 18, 4, 8, '2020-06-02'),
(69, 18, 5, 20, '2020-06-02'),
(70, 18, 6, 12, '2020-06-02'),
(71, 18, 1, 12, '2020-06-02'),
(72, 18, 2, 12, '2020-06-02'),
(73, 18, 3, 9, '2020-06-02'),
(74, 18, 4, 8, '2020-06-02'),
(75, 18, 5, 15, '2020-06-02'),
(76, 18, 6, 12, '2020-06-02'),
(77, 19, 1, 16, '2020-06-03'),
(78, 19, 2, 12, '2020-06-03'),
(79, 19, 3, 7, '2020-06-03'),
(80, 19, 4, 9, '2020-06-03'),
(81, 19, 5, 13, '2020-06-03'),
(82, 19, 6, 14, '2020-06-03'),
(83, 20, 44, 11, '2020-06-03'),
(84, 20, 53, 17, '2020-06-03'),
(85, 20, 21, 11, '2020-06-03'),
(86, 21, 44, 15, '2020-06-03'),
(87, 21, 53, 9, '2020-06-03'),
(88, 21, 21, 11, '2020-06-03'),
(89, 22, 44, 14, '2020-06-03'),
(90, 22, 53, 8, '2020-06-03'),
(91, 22, 21, 9, '2020-06-03'),
(92, 13, 17, 16, '2020-06-03'),
(93, 13, 17, 8, '2020-06-03'),
(94, 13, 17, 8, '2020-06-03'),
(95, 13, 16, 15, '2020-06-03'),
(96, 23, 17, 10, '2020-06-03'),
(97, 23, 16, 8, '2020-06-03'),
(98, 23, 44, 14, '2020-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Produksi Pertanian'),
(2, 'Teknologi Pertanian'),
(3, 'Peternakan'),
(4, 'Manajemen Agribisnis'),
(5, 'Teknologi Informasi'),
(6, 'Bahasa, Komunikasi, dan Pariwisata'),
(7, 'Kesehatan'),
(8, 'Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `jam_buka` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `favicon` varchar(80) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `bg` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `teks` mediumtext NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `sambutan` varchar(200) NOT NULL,
  `foto_sambutan` varchar(100) NOT NULL,
  `caption_1` varchar(200) NOT NULL,
  `caption_2` varchar(50) NOT NULL,
  `link_pendaftaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_website`, `alamat`, `jam_buka`, `email`, `facebook`, `favicon`, `instagram`, `logo`, `bg`, `no_telp`, `teks`, `icon`, `sambutan`, `foto_sambutan`, `caption_1`, `caption_2`, `link_pendaftaran`) VALUES
(1, 'CAP Basketball Training', 'Jl. Laksda Adi Sucipto, Taman Baru, Kec. Banyuwangi ', 'Senin - Sabtu 08.00 - 19.00 WIB', 'fe@untag-banyuwangi.ac.id', 'Untag Banyuwangi', 'cap.png', '@untag_banyuwangi', 'cap.png', 'gajah_uling.png', '(0333) 411248', '<p>Selamat datang di website Fakultas Ekonomi Universitas 17 Agustus Banyuwangi</p>\r\n', 'cap.png', 'Selamat Datang ya', 'Selamat_Datang_ya-5500.jpg', '<p>Selamat Datang di Fakultas Ekonomi Untag Banyuwangi</p>\r\n', 'Prof. Edward', 'pbm.untag-banyuwangi.ac.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_latihan`
--

CREATE TABLE `menu_latihan` (
  `id_menu` int(20) NOT NULL,
  `id_titik` varchar(20) NOT NULL,
  `id_posisi` varchar(20) NOT NULL,
  `bobot` int(10) NOT NULL,
  `repetisi` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_latihan`
--

INSERT INTO `menu_latihan` (`id_menu`, `id_titik`, `id_posisi`, `bobot`, `repetisi`, `tanggal`) VALUES
(9, '40', '2', 20, 30, '2020-04-25'),
(10, '21', '2', 20, 30, '2020-04-25'),
(11, '24', '4', 30, 40, '2020-04-25'),
(12, '51', '1', 20, 30, '2020-04-25'),
(13, '23', '2', 40, 50, '2020-04-28'),
(14, '1', '2', 15, 20, '2020-05-02'),
(15, '2', '2', 25, 30, '2020-05-02'),
(16, '3', '2', 10, 15, '2020-05-02'),
(17, '4', '2', 10, 15, '2020-05-02'),
(18, '5', '2', 25, 30, '2020-05-02'),
(19, '6', '2', 15, 20, '2020-05-02'),
(20, '44', '2', 15, 20, '2020-06-02'),
(21, '53', '2', 13, 20, '2020-06-02'),
(22, '21', '2', 15, 20, '2020-06-02'),
(23, '17', '1', 15, 20, '2020-06-03'),
(24, '16', '1', 9, 10, '2020-06-03'),
(25, '44', '1', 17, 20, '2020-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemain`
--

CREATE TABLE `pemain` (
  `id_pemain` int(20) NOT NULL,
  `id_posisi` varchar(20) NOT NULL,
  `id_jurusan` int(20) NOT NULL,
  `nama_pemain` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` enum('l','p') NOT NULL,
  `tinggi` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `id_posisi`, `id_jurusan`, `nama_pemain`, `tanggal_lahir`, `gender`, `tinggi`, `berat_badan`, `nim`) VALUES
(2, '2', 5, 'Yusril', '1999-02-04', 'l', '168', '57', 'D31172376'),
(3, '1', 1, 'Teguh', '1998-04-18', 'l', '168', '75', 'P31178657'),
(4, '4', 5, 'Tryezel Yofye', '1998-10-21', 'l', '176', '61', 'E31171247'),
(10, '2', 4, 'Febio', '1999-02-25', 'l', '175', '65', 'E31178764'),
(11, '2', 3, 'Tupel', '2001-04-15', 'l', '174', '60', 'F41189856'),
(12, '4', 5, 'Destino', '1999-05-16', 'l', '174', '70', 'E31171256'),
(16, '2', 1, 'Netta', '2002-05-21', 'p', '163', '46', 'P31198725'),
(17, '2', 3, 'Bayu', '2000-05-21', 'l', '175', '62', 'D31182976'),
(21, '2', 4, 'Ifa', '2001-06-10', 'p', '165', '55', 'D31187766'),
(22, '2', 4, 'Sherly', '2001-06-27', 'p', '167', '50', 'D31187755'),
(23, '1', 4, 'Laras', '1998-06-27', 'p', '160', '50', 'D31173322');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(20) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `posisi`) VALUES
(1, 'Point Guard'),
(2, 'Shooting Guard'),
(3, 'Small Forward'),
(4, 'Power Forward'),
(5, 'Center');

-- --------------------------------------------------------

--
-- Struktur dari tabel `titik_lapangan`
--

CREATE TABLE `titik_lapangan` (
  `id_titik` int(20) NOT NULL,
  `titik_lapangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `titik_lapangan`
--

INSERT INTO `titik_lapangan` (`id_titik`, `titik_lapangan`) VALUES
(1, 's1'),
(2, 's2'),
(3, 's3'),
(4, 's4'),
(5, 's5'),
(6, 's6'),
(7, 's7'),
(8, 's8'),
(9, 's9'),
(10, 's10'),
(11, 's11'),
(12, 's12'),
(13, 's13'),
(14, 's14'),
(15, 's15'),
(16, 's16'),
(17, 's17'),
(18, 's18'),
(19, 's19'),
(20, 's20'),
(21, 's21'),
(22, 's22'),
(23, 's23'),
(24, 's24'),
(25, 's25'),
(26, 's26'),
(27, 's27'),
(28, 's28'),
(29, 's29'),
(30, 's30'),
(31, 's31'),
(32, 's32'),
(33, 's33'),
(34, 's34'),
(35, 's35'),
(36, 's36'),
(37, 's37'),
(38, 's38'),
(39, 's39'),
(40, 's40'),
(41, 's41'),
(42, 's42'),
(43, 's43'),
(44, 's44'),
(45, 's45'),
(46, 's46'),
(47, 's47'),
(48, 's48'),
(49, 's49'),
(50, 's50'),
(51, 's51'),
(52, 's52'),
(53, 's53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `paswd` varchar(300) NOT NULL,
  `active` varchar(11) NOT NULL,
  `foto_ktp` varchar(300) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `profesi` tinyint(4) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `alamat` mediumtext NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `asal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `nama`, `email`, `paswd`, `active`, `foto_ktp`, `photo`, `no_hp`, `profesi`, `tgl_daftar`, `lastlogin`, `alamat`, `facebook`, `instagram`, `asal`) VALUES
(1, 1, 'CAP Basketball', 'capbasketball@gmail.com', '$2y$05$jT8zqnZ6b9ZjPxm252smwO2R2Np2ypNmRo2Itx.13MD8TliAhOWmy', '1', '', 'cap.png', '', 0, '2019-08-11 00:00:00', '2020-05-27 18:24:34', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_masukan`
--
ALTER TABLE `data_masukan`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `menu_latihan`
--
ALTER TABLE `menu_latihan`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id_pemain`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indeks untuk tabel `titik_lapangan`
--
ALTER TABLE `titik_lapangan`
  ADD PRIMARY KEY (`id_titik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_masukan`
--
ALTER TABLE `data_masukan`
  MODIFY `id_data` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu_latihan`
--
ALTER TABLE `menu_latihan`
  MODIFY `id_menu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `titik_lapangan`
--
ALTER TABLE `titik_lapangan`
  MODIFY `id_titik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
