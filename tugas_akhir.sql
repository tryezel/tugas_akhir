-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2020 pada 07.31
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
(12, '51', '1', 20, 30, '2020-04-25');

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
  `tinggi` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `id_posisi`, `id_jurusan`, `nama_pemain`, `tanggal_lahir`, `tinggi`, `berat_badan`, `nim`) VALUES
(2, '2', 4, 'Febio Gilang Hendrawan', '1999-02-04', '176', '70', 'D31172376'),
(3, '1', 1, 'Teguh', '1998-04-18', '168', '75', 'P31178657'),
(4, '4', 5, 'Tryezel Yofye', '1998-10-21', '176', '61', 'E31171247'),
(10, '2', 5, 'Yusril', '1999-02-25', '165', '56', 'E31178764'),
(11, '1', 3, 'Bayu', '2001-04-15', '174', '60', 'F41189856');

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
(1, 1, 'CAP Basketball', 'capbasketball@gmail.com', '$2y$05$jT8zqnZ6b9ZjPxm252smwO2R2Np2ypNmRo2Itx.13MD8TliAhOWmy', '1', '', 'cap.png', '', 0, '2019-08-11 00:00:00', '2020-04-24 22:09:14', '', '', '', '');

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
  MODIFY `id_data` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_menu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
