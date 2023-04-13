-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2023 at 10:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembayaran_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembayaran`
--

CREATE TABLE `tb_detail_pembayaran` (
  `id_detail` int NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total_bayar` varchar(10) NOT NULL,
  `kembalian` varchar(10) NOT NULL,
  `id_pegawai` int NOT NULL,
  `id_bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_pembayaran`
--

INSERT INTO `tb_detail_pembayaran` (`id_detail`, `tanggal_bayar`, `total_bayar`, `kembalian`, `id_pegawai`, `id_bayar`) VALUES
(1918, '2023-03-29', '600000', '0', 1205, 2172),
(1919, '2023-03-29', '100000', '0', 1205, 2172),
(1920, '2023-03-29', '700000', '0', 1205, 2173),
(1921, '2023-03-29', '500000', '0', 1205, 2174),
(1922, '2023-03-29', '200000', '0', 1205, 2174),
(1923, '2023-03-29', '500', '0', 1205, 2175),
(1924, '2023-03-29', '700000', '500', 1205, 2175),
(1925, '2023-03-29', '700000', '0', 1205, 2208),
(1926, '2023-03-29', '500000', '0', 1205, 2209),
(1927, '2023-03-29', '600000', '0', 1205, 2210),
(1928, '2023-03-29', '100000', '0', 1205, 2210),
(1929, '2023-03-29', '500000', '300000', 1205, 2209),
(1930, '2023-03-29', '700000', '0', 1205, 2211),
(1931, '2023-03-29', '700000', '0', 1205, 2232),
(1932, '2023-03-29', '700000', '0', 1205, 2176),
(1933, '2023-03-29', '700000', '0', 1205, 2177),
(1934, '2023-03-30', '600000', '0', 1205, 2212),
(1935, '2023-03-30', '100000', '0', 1205, 2213),
(1936, '2023-03-30', '100000', '0', 1205, 2220),
(1937, '2023-03-30', '100000', '0', 1205, 2221),
(1938, '2023-03-30', '600000', '0', 1205, 2178),
(1939, '2023-03-30', '600000', '0', 1205, 2221),
(1940, '2023-03-30', '600000', '0', 1205, 2214),
(1941, '2023-03-30', '600000', '0', 1205, 2179),
(1942, '2023-03-30', '100000', '0', 1205, 2179),
(1943, '2023-03-30', '700000', '0', 1206, 2180);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `keterangan`) VALUES
(1126, 'RPL 1', 'Rekayasa Perangkat Lunak'),
(1127, 'RPL 2', 'Rekayasa Perangkat Lunak'),
(1129, 'RPL 3', 'Rekayasa Perangkat Lunak'),
(1130, 'MM 1', 'Multimedia'),
(1138, 'MM 2', 'Multimedia'),
(1140, 'DKV 1', 'Desain Komunikasi Visual'),
(1141, 'TKJ 1', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int NOT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_lengkap`, `telp`, `username`, `password`, `level`) VALUES
(1205, 'admin', '087854712611', 'admin', '$2y$10$X8N2FnjkNv5/dl1Gg8zhwuNtGTMr2B3X0ZL7lMG4VsYbKDW1HBjaG', 'admin'),
(1206, 'Budi Mulyo', '089680897900', 'budi', '$2y$10$Q/vYmFhtz48nYZ4w5tRpXuzPKEeOuDsmSHyCqy1SzxC7bZ5LxyZtS', 'petugas'),
(1207, 'Putra', '087854712611', 'ptra', '$2y$10$Zoq8ZGv0EHA4TCc/XHeubOBREyIV7XSqHo46f7ZRvBCi10Kfx8XGe', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_bayar` int NOT NULL,
  `nis` varchar(4) NOT NULL,
  `id_spp` int NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `bulan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_bayar` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` enum('lunas','belum lunas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sisa_bayar` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_bayar`, `nis`, `id_spp`, `jatuh_tempo`, `bulan`, `tahun`, `jumlah_bayar`, `keterangan`, `sisa_bayar`) VALUES
(2172, '5320', 1706, '2023-07-29', 'Juli', '2023', '700000', 'lunas', '0'),
(2173, '5320', 1706, '2023-08-29', 'Agustus', '2023', '700000', 'lunas', '0'),
(2174, '5320', 1706, '2023-09-29', 'September', '2023', '700000', 'lunas', '0'),
(2175, '5320', 1706, '2023-10-29', 'Oktober', '2023', '700000', 'lunas', '0'),
(2176, '5320', 1706, '2023-11-29', 'November', '2023', '700000', 'lunas', '0'),
(2177, '5320', 1706, '2023-12-29', 'Desember', '2023', '700000', 'lunas', '0'),
(2178, '5320', 1706, '2024-01-29', 'Januari', '2024', '600000', 'belum lunas', '100000'),
(2179, '5320', 1706, '2024-02-29', 'Februari', '2024', '700000', 'lunas', '0'),
(2180, '5320', 1706, '2024-03-29', 'Maret', '2024', '700000', 'lunas', '0'),
(2181, '5320', 1706, '2024-04-29', 'April', '2024', NULL, NULL, NULL),
(2182, '5320', 1706, '2024-05-29', 'Mei', '2024', NULL, NULL, NULL),
(2183, '5320', 1706, '2024-06-29', 'Juni', '2024', NULL, NULL, NULL),
(2184, '5320', 1706, '2024-07-29', 'Juli', '2024', NULL, NULL, NULL),
(2185, '5320', 1706, '2024-08-29', 'Agustus', '2024', NULL, NULL, NULL),
(2186, '5320', 1706, '2024-09-29', 'September', '2024', NULL, NULL, NULL),
(2187, '5320', 1706, '2024-10-29', 'Oktober', '2024', NULL, NULL, NULL),
(2188, '5320', 1706, '2024-11-29', 'November', '2024', NULL, NULL, NULL),
(2189, '5320', 1706, '2024-12-29', 'Desember', '2024', NULL, NULL, NULL),
(2190, '5320', 1706, '2025-01-29', 'Januari', '2025', NULL, NULL, NULL),
(2191, '5320', 1706, '2025-03-01', 'Maret', '2025', NULL, NULL, NULL),
(2192, '5320', 1706, '2025-03-29', 'Maret', '2025', NULL, NULL, NULL),
(2193, '5320', 1706, '2025-04-29', 'April', '2025', NULL, NULL, NULL),
(2194, '5320', 1706, '2025-05-29', 'Mei', '2025', NULL, NULL, NULL),
(2195, '5320', 1706, '2025-06-29', 'Juni', '2025', NULL, NULL, NULL),
(2196, '5320', 1706, '2025-07-29', 'Juli', '2025', NULL, NULL, NULL),
(2197, '5320', 1706, '2025-08-29', 'Agustus', '2025', NULL, NULL, NULL),
(2198, '5320', 1706, '2025-09-29', 'September', '2025', NULL, NULL, NULL),
(2199, '5320', 1706, '2025-10-29', 'Oktober', '2025', NULL, NULL, NULL),
(2200, '5320', 1706, '2025-11-29', 'November', '2025', NULL, NULL, NULL),
(2201, '5320', 1706, '2025-12-29', 'Desember', '2025', NULL, NULL, NULL),
(2202, '5320', 1706, '2026-01-29', 'Januari', '2026', NULL, NULL, NULL),
(2203, '5320', 1706, '2026-03-01', 'Maret', '2026', NULL, NULL, NULL),
(2204, '5320', 1706, '2026-03-29', 'Maret', '2026', NULL, NULL, NULL),
(2205, '5320', 1706, '2026-04-29', 'April', '2026', NULL, NULL, NULL),
(2206, '5320', 1706, '2026-05-29', 'Mei', '2026', NULL, NULL, NULL),
(2207, '5320', 1706, '2026-06-29', 'Juni', '2026', NULL, NULL, NULL),
(2208, '5321', 1706, '2023-07-29', 'Juli', '2023', '700000', 'lunas', '0'),
(2209, '5321', 1706, '2023-08-29', 'Agustus', '2023', '700000', 'lunas', '0'),
(2210, '5321', 1706, '2023-09-29', 'September', '2023', '700000', 'lunas', '0'),
(2211, '5321', 1706, '2023-10-29', 'Oktober', '2023', '700000', 'lunas', '0'),
(2212, '5321', 1706, '2023-11-29', 'November', '2023', '600000', 'belum lunas', '100000'),
(2213, '5321', 1706, '2023-12-29', 'Desember', '2023', '100000', 'belum lunas', '600000'),
(2214, '5321', 1706, '2024-01-29', 'Januari', '2024', '600000', 'belum lunas', '100000'),
(2215, '5321', 1706, '2024-02-29', 'Februari', '2024', NULL, NULL, NULL),
(2216, '5321', 1706, '2024-03-29', 'Maret', '2024', NULL, NULL, NULL),
(2217, '5321', 1706, '2024-04-29', 'April', '2024', NULL, NULL, NULL),
(2218, '5321', 1706, '2024-05-29', 'Mei', '2024', NULL, NULL, NULL),
(2219, '5321', 1706, '2024-06-29', 'Juni', '2024', NULL, NULL, NULL),
(2220, '5321', 1706, '2024-07-29', 'Juli', '2024', '100000', 'belum lunas', '600000'),
(2221, '5321', 1706, '2024-08-29', 'Agustus', '2024', '700000', 'lunas', '0'),
(2222, '5321', 1706, '2024-09-29', 'September', '2024', NULL, NULL, NULL),
(2223, '5321', 1706, '2024-10-29', 'Oktober', '2024', NULL, NULL, NULL),
(2224, '5321', 1706, '2024-11-29', 'November', '2024', NULL, NULL, NULL),
(2225, '5321', 1706, '2024-12-29', 'Desember', '2024', NULL, NULL, NULL),
(2226, '5321', 1706, '2025-01-29', 'Januari', '2025', NULL, NULL, NULL),
(2227, '5321', 1706, '2025-03-01', 'Maret', '2025', NULL, NULL, NULL),
(2228, '5321', 1706, '2025-03-29', 'Maret', '2025', NULL, NULL, NULL),
(2229, '5321', 1706, '2025-04-29', 'April', '2025', NULL, NULL, NULL),
(2230, '5321', 1706, '2025-05-29', 'Mei', '2025', NULL, NULL, NULL),
(2231, '5321', 1706, '2025-06-29', 'Juni', '2025', NULL, NULL, NULL),
(2232, '5321', 1706, '2025-07-29', 'Juli', '2025', '700000', 'lunas', '0'),
(2233, '5321', 1706, '2025-08-29', 'Agustus', '2025', NULL, NULL, NULL),
(2234, '5321', 1706, '2025-09-29', 'September', '2025', NULL, NULL, NULL),
(2235, '5321', 1706, '2025-10-29', 'Oktober', '2025', NULL, NULL, NULL),
(2236, '5321', 1706, '2025-11-29', 'November', '2025', NULL, NULL, NULL),
(2237, '5321', 1706, '2025-12-29', 'Desember', '2025', NULL, NULL, NULL),
(2238, '5321', 1706, '2026-01-29', 'Januari', '2026', NULL, NULL, NULL),
(2239, '5321', 1706, '2026-03-01', 'Maret', '2026', NULL, NULL, NULL),
(2240, '5321', 1706, '2026-03-29', 'Maret', '2026', NULL, NULL, NULL),
(2241, '5321', 1706, '2026-04-29', 'April', '2026', NULL, NULL, NULL),
(2242, '5321', 1706, '2026-05-29', 'Mei', '2026', NULL, NULL, NULL),
(2243, '5321', 1706, '2026-06-29', 'Juni', '2026', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL,
  `nis` varchar(4) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `id_kelas` int NOT NULL,
  `telp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text NOT NULL,
  `telp_ortu` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `password`, `tanggal_masuk`, `angkatan`, `nama_siswa`, `id_kelas`, `telp`, `alamat`, `telp_ortu`) VALUES
(1438, '5320', '$2y$10$l5wpfjXMxLLI2bQqDXHhHu5mmVPAxWGkvtCe8DbqsveXOrp8lw85.', '2023-07-29', '2023', 'I Kadek Anggara Putra', 1126, '087854712611', 'Jln. Gelogor Carik No.96', '081999027171'),
(1439, '5321', '$2y$10$zBjXrV.6RhkBvo36f00.wO3Mkkuqp6MivPPon8RIP.yAFHgtv6lQa', '2023-07-29', '2023', 'I Nyoman Candra Wikananta', 1127, '087854712611', 'Jln. Tukad Banyusari No.100A', '081999027171');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int NOT NULL,
  `angkatan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `angkatan`, `nominal`) VALUES
(1706, '2023', '700000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_pembayaran`
--
ALTER TABLE `tb_detail_pembayaran`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_pegawai` (`id_pegawai`),
  ADD KEY `fk_id_bayar` (`id_bayar`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `fk_id_spp` (`id_spp`),
  ADD KEY `fk_nis_siswa` (`nis`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `fk_id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_pembayaran`
--
ALTER TABLE `tb_detail_pembayaran`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1944;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1142;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1208;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_bayar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2244;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1440;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_pembayaran`
--
ALTER TABLE `tb_detail_pembayaran`
  ADD CONSTRAINT `fk_id_bayar` FOREIGN KEY (`id_bayar`) REFERENCES `tb_pembayaran` (`id_bayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `fk_id_spp` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_nis_siswa` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
