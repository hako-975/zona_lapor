-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 23.55
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zona_lapor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Ciputat'),
(2, 'Ciputat Timur'),
(3, 'Pamulang'),
(4, 'Pondok Aren'),
(5, 'Serpong'),
(6, 'Serpong Utara'),
(7, 'Setu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `kelurahan`, `id_kecamatan`) VALUES
(1, 'Ciputat', 1),
(2, 'Cipayung', 1),
(3, 'Serua', 1),
(4, 'Sawah Lama', 1),
(5, 'Sawah Baru', 1),
(6, 'Serua Indah', 1),
(7, 'Jombang', 1),
(8, 'Rengas', 2),
(9, 'Rempoa', 2),
(10, 'Cireundeu', 2),
(11, 'Pondok Ranji', 2),
(12, 'Cempaka Putih', 2),
(13, 'Pisangan', 2),
(14, 'Pondok Benda', 3),
(15, 'Benda Baru', 3),
(16, 'Bambu Apus', 3),
(17, 'Kedaung', 3),
(18, 'Pamulang Barat', 3),
(19, 'Pamulang Timur', 3),
(20, 'Pondok Cabe Udik', 3),
(21, 'Pondok Cabe Ilir', 3),
(22, 'Jurang Mangu Barat', 4),
(23, 'Jurang Mangu Timur', 4),
(24, 'Pondok Kacang Timur', 4),
(25, 'Pondok Kacang Barat', 4),
(26, 'Perigi Lama', 4),
(27, 'Perigi Baru', 4),
(28, 'Pondok Aren', 4),
(29, 'Pondok Karya', 4),
(30, 'Pondok Jaya', 4),
(31, 'Pondok Betung', 4),
(32, 'Pondok Pucung', 4),
(33, 'Buaran', 5),
(34, 'Ciater', 5),
(35, 'Cilenggang', 5),
(36, 'Lengkong Gudang', 5),
(37, 'Lengkong Gudang Timur', 5),
(38, 'Lengkong Wetan', 5),
(39, 'Rawa Buntu', 5),
(40, 'Rawa Mekar Jaya', 5),
(41, 'Serpong', 5),
(42, 'Jelupang', 6),
(43, 'Lengkong Karya', 6),
(44, 'Pakualam', 6),
(45, 'Pakulonan', 6),
(46, 'Paku Jaya', 6),
(47, 'Pondok Jagung', 6),
(48, 'Pondok Jagung Timur', 6),
(49, 'Setu', 7),
(50, 'Keranggan', 7),
(51, 'Muncul', 7),
(52, 'Babakan', 7),
(53, 'Bakti Jaya', 7),
(54, 'Kademangan', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `isi_log` text NOT NULL,
  `tgl_log` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nama`, `username`, `password`, `no_telepon`, `alamat`) VALUES
(1, 'Andre Farhan Saputra', 'andre123', '$2y$10$np0VReX.hpfpyfGZMB61keaDNoe14ZSzZ9mAP0Zql6mSQuCYfWOla', '087733932416', 'Jl. AMD Babakan Pocis No. 100 RT02/02'),
(2, 'Muhammad Irgi Al Ghithraf', 'irgi5', '$2y$10$51l3fVtvtoUTkuv8NajfjOaWxP7Y/T8Re2LMjmvciuQ0y2a5jgE3e', '085773094859', 'Perum Puri Serpong 1 Blok D5 No. 7 RT 08/02 Setu, Setu, Tangerang Selatan, Banten'),
(3, 'Ableza Melani Putri', 'ableza24', '$2y$10$xiVl2xqkEMAUvj3h2fnUeeuMnt.dxrHIO0m5jgEREujFQAYH1c1zG', '089677646147', 'JL. AMD Babakan Pocis No. 7 RT 02/01 Bakti Jaya Setu Kota Tangerang Selatan'),
(4, 'Annisa Ulazijah Faqih', 'annisa98', '$2y$10$K287REWLi5fn/pCmi90HTumNG2DiwAPjxsGWvx5oDTbhK3aolTBqC', '087808564812', 'Kp. Jaletreng No. 41 RT 03/03 Serpong, Serpong'),
(5, 'Azzaura', 'azzaura56', '$2y$10$5AZT/bsxiJQ/YcrCou.U2.Hun0o3s9aH6do73f01Tm8IZwH/udx/W', '085212984453', 'Perum Griya Cendekia No. 17 RT 05/06, Curug, Gunung Sindur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `isi_laporan` text NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `foto` text DEFAULT 'default.png',
  `status_pengaduan` enum('belum_ditanggapi','proses','valid','pengerjaan','selesai','tidak_valid') NOT NULL DEFAULT 'belum_ditanggapi',
  `id_masyarakat` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `saran` text NOT NULL,
  `tgl_saran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id_saran`, `nama`, `no_telepon`, `alamat`, `saran`, `tgl_saran`) VALUES
(1, 'Andri Firman Saputra', '087808675313', 'Jl. AMD Babakan Pocis', 'Promosikan Ini', '2021-07-03 16:09:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `tgl_tanggapan` datetime NOT NULL,
  `status_tanggapan` enum('proses','valid','pengerjaan','selesai','tidak_valid') NOT NULL,
  `foto_tanggapan` text NOT NULL DEFAULT 'default.png',
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `jabatan` enum('administrator','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_telepon`, `jabatan`) VALUES
(1, 'Administrator', 'admin', '$2y$10$L201Eud0B8zkRfT9wOctFeK1LSJWFxwDV8He41JDk4ggRLUb9aIC6', '08123456789', 'administrator'),
(2, 'Andri Firman Saputra', 'andri123', '$2y$10$NbEgBbEr.Di9DwIo/OoXZOefgH7v/zQNxdLPleaJWZTQ7kKQbOCEa', '087808675313', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
