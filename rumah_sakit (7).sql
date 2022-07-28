-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 08.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian_janji_medis`
--

CREATE TABLE `antrian_janji_medis` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_rumah_sakit` varchar(50) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `antrian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian_janji_medis`
--

INSERT INTO `antrian_janji_medis` (`id`, `id_user`, `id_rumah_sakit`, `poli`, `tanggal`, `keluhan`, `antrian`) VALUES
(1, '1', '2', 'poli gigi', '2022-07-08', '', '1'),
(3, '1', '1', 'poli gigi', '2022-07-08', '', '1'),
(4, '1', '4', 'poli gigi', '2022-07-15', '', '1'),
(5, '1', '4', 'poli jantung', '2022-07-21', 'dwadw', '1'),
(6, '1', '2', 'poli gigi', '2022-07-22', 'asd', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clustering`
--

CREATE TABLE `clustering` (
  `id` int(11) NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clustering`
--

INSERT INTO `clustering` (`id`, `id_rumah_sakit`, `id_user`, `jarak`) VALUES
(1, 4, 1, 1422.81),
(2, 2, 2, 481.814);

-- --------------------------------------------------------

--
-- Struktur dari tabel `clustering_2`
--

CREATE TABLE `clustering_2` (
  `id` int(11) NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clustering_2`
--

INSERT INTO `clustering_2` (`id`, `id_rumah_sakit`, `id_user`, `jarak`) VALUES
(1, 7, 1, 1345.32),
(2, 10, 2, 3860.19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `clustering_lanjutan`
--

CREATE TABLE `clustering_lanjutan` (
  `id` int(11) NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clustering_lanjutan`
--

INSERT INTO `clustering_lanjutan` (`id`, `id_rumah_sakit`, `id_user`, `jarak`) VALUES
(1, 15, 1, 4117.66),
(2, 11, 2, 2344.27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `id_dokter`, `nama_dokter`, `id_rumah_sakit`) VALUES
(1, 4324, 'Farhan Idrus', 7),
(2, 1122, 'Wahyu Prayetno', 11),
(3, 2233, 'Rahmat', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rujukan`
--

CREATE TABLE `rujukan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `poli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faskes` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rujukan`
--

INSERT INTO `rujukan` (`id`, `id_user`, `id_rumah_sakit`, `id_dokter`, `poli`, `faskes`, `tanggal`, `keluhan`) VALUES
(2, 1, 7, 4324, 'poli gigi', '2', '2022-07-08', '1'),
(3, 1, 7, 2233, 'poli gigi', '2', '2022-07-11', '1'),
(4, 1, 7, 4324, 'poli gigi', '2', '2022-07-19', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id` int(11) NOT NULL,
  `faskes` varchar(255) NOT NULL,
  `nama_rumah_sakit` varchar(255) NOT NULL,
  `alamat_rumah_sakit` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id`, `faskes`, `nama_rumah_sakit`, `alamat_rumah_sakit`, `tingkat`, `longitude`, `latitude`) VALUES
(1, '0217B075', 'Klinik Bp Satlinlamil', 'Jl Perak Barat No. 271', '1', '112.7332116', '-7.2144175'),
(2, '2170004', 'Puskesmas Siwalan Kerto', 'Jl. Siwalankerto No. 134', '1', '112.7376097', '-7.3376854'),
(3, '2170005', 'Puskesmas Balas Klumprik', 'Jl. Raya Balaskrumpik', '1', '112.68965', '-7.331508'),
(4, '2170006', 'Puskesmas Keputih', 'Jl. Keputih Tegal No. 1', '1', '112.801892', '-7.294043'),
(5, '2170022', 'Klinik Upn Veteran Surabaya', 'Jl. Rungkut Madya', '1', '112.787055', '-7.3314133'),
(6, '1301R001', 'RSUD DR SOETOMO SURABAYA', 'JL. PROF DR MOESTOPO 6-8 SBY', '2', '112.7580663', '-7.2682064'),
(7, '1301R002', 'RS HAJI SURABAYA', 'JL. MANYAR KERTOADI', '2', '112.7796844', '-7.2833287'),
(8, '0217R074', 'RS Airlangga', 'KAMPUS C MULYOREJO', '2', '112.7848442', '-7.2698796'),
(9, '0217R091', 'SILOAM HOSPITALS SURABAYA', 'Jl. Raya Gubeng 70.', '2', '112.7848442', '-7.269879'),
(10, '1301R005', 'RS ISLAM SURABAYA', 'JL JEMURSARI NO 51-57', '2', '112.7349753', '-7.3063849'),
(11, '1301R015', 'RS MATA MASYARAKAT SURABAYA', 'JL. GAYUNG KEBONSARI TIMUR 49', 'lanjutan', '112.7257489', '-7.3257561'),
(12, '1301R016', 'AL IRSYAD', 'JL.KH.MAS MANSYUR 210-214', 'lanjutan', '112.7403981', '-7.2280019'),
(13, '1301R020', 'RUMAH SAKIT MUJI RAHAYU', 'RAYA MANUKAN WETAN 68-68 A', 'lanjutan', '112.670966', '-7.257172'),
(14, '1301R024', 'RS ISLAM A YANI', 'JL A. YANI NO 2- 4', 'lanjutan', '112.7349753', '-7.3063849'),
(15, '1301R025', 'RSB PURA RAHARJA', 'Jl. Pucang Adi No. 12-14', 'lanjutan', '112.7529305', '-7.2830238');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `bpjs` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL DEFAULT '0',
  `nik` varchar(255) NOT NULL DEFAULT '0',
  `nama_kepala` varchar(255) NOT NULL DEFAULT '0',
  `tgl_lahir` date NOT NULL DEFAULT '1111-11-11',
  `jk` varchar(255) NOT NULL DEFAULT '0',
  `pekerjaan` varchar(255) NOT NULL DEFAULT '0',
  `status_menikah` varchar(255) NOT NULL DEFAULT '0',
  `alamat` varchar(255) NOT NULL DEFAULT '0',
  `longitude` varchar(255) NOT NULL DEFAULT '0',
  `latitude` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `bpjs`, `no_hp`, `nama_lengkap`, `nik`, `nama_kepala`, `tgl_lahir`, `jk`, `pekerjaan`, `status_menikah`, `alamat`, `longitude`, `latitude`, `password`) VALUES
(1, '1234567', '088217071996', 'Syahrul Ramadhan', '124131241312', 'abwgvagwv', '2022-06-01', 'laki-laki', 'mahasiswa', 'lajang', 'wgvawfdafaa', '112.78948890849341', '-7.290525722539883', '$2y$10$zxdSnpILIinf6uAI.ssBZ.vvhuhofZygfcX.zehjuPlwQWWa7pGIy'),
(2, '12314', '088217071923', 'sehbsehs', '142413412', 'gdesegseg', '2011-11-20', 'laki-laki', 'mahasiswa', '0', 'gesegasgsgs', '112.74083245834873', '-7.340610925262652', '$2y$10$WsbpfhfRBqFSkMsaJWyUjOOgCClXxUDcyPoQn5ziDS5HAgHv/184q');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian_janji_medis`
--
ALTER TABLE `antrian_janji_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clustering`
--
ALTER TABLE `clustering`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clustering_2`
--
ALTER TABLE `clustering_2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clustering_lanjutan`
--
ALTER TABLE `clustering_lanjutan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rujukan`
--
ALTER TABLE `rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian_janji_medis`
--
ALTER TABLE `antrian_janji_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `clustering`
--
ALTER TABLE `clustering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `clustering_2`
--
ALTER TABLE `clustering_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `clustering_lanjutan`
--
ALTER TABLE `clustering_lanjutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rujukan`
--
ALTER TABLE `rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
