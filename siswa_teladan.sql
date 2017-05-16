-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2017 pada 08.50
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswa_teladan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`nis`, `nama_siswa`, `alamat`, `tempat_lahir`, `tanggal_lahir`) VALUES
('14.01.001', 'Adi Prasetyo Nugroho', 'Kampung Timur', 'Balikpapan', '2017-05-04'),
('14.01.002', 'Shinta Anggreni Putri', 'Balikpapan', 'Balikpapan', '1111-11-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_evaluasi`
--

CREATE TABLE `tbl_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_evaluasi`
--

INSERT INTO `tbl_evaluasi` (`id_evaluasi`, `id_subkriteria`, `nis`, `nilai`) VALUES
(46, 3, '14.01.001', 70),
(47, 4, '14.01.001', 70),
(48, 5, '14.01.001', 70),
(49, 8, '14.01.001', 70),
(50, 9, '14.01.001', 70),
(51, 10, '14.01.001', 70),
(52, 11, '14.01.001', 70),
(53, 3, '14.01.002', 80),
(54, 4, '14.01.002', 80),
(55, 5, '14.01.002', 80),
(56, 8, '14.01.002', 80),
(57, 9, '14.01.002', 60),
(58, 10, '14.01.002', 60),
(59, 11, '14.01.002', 60),
(67, 12, '14.01.001', 0),
(68, 12, '14.01.002', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(40) NOT NULL,
  `bobot` float NOT NULL,
  `hasil_bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `hasil_bobot`) VALUES
(1, 'Akademik', 2, 0.285714),
(2, 'NonAkademik', 5, 0.714286);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(40) NOT NULL,
  `bobot` int(11) NOT NULL,
  `hasil_bobot` float NOT NULL,
  `bobot_global` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`, `hasil_bobot`, `bobot_global`) VALUES
(3, 1, 'Matematika', 5, 0.277778, 0.079365),
(4, 1, 'Bahasa Indonesia', 4, 0.222222, 0.063492),
(5, 1, 'Bahasa Inggris', 4, 0.222222, 0.063492),
(8, 1, 'TIK', 2, 0.111111, 0.031746),
(9, 2, 'Kerapian', 3, 0.25, 0.178572),
(10, 2, 'Kedisiplinan', 4, 0.333333, 0.238095),
(11, 2, 'Kesopanan', 5, 0.416667, 0.297619),
(12, 1, 'olahraga', 3, 0.166667, 0.047619);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `fk_id_subkriteria` (`id_subkriteria`),
  ADD KEY `fk_nis_alternatif` (`nis`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `fk_id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  ADD CONSTRAINT `fk_id_subkriteria` FOREIGN KEY (`id_subkriteria`) REFERENCES `tbl_subkriteria` (`id_subkriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_nis_alternatif` FOREIGN KEY (`nis`) REFERENCES `tbl_alternatif` (`nis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD CONSTRAINT `fk_id_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
