-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 05:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama`, `level`) VALUES
('2038331b5d11487e9250', 'adminkaru', '1bd2dbee5a94d8e1850a5eb83d72d9d2', 'Admin Karu', 'Karu'),
('34e123e12598496e8f91', 'admin_it', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Tes Admin', 'admin'),
('3c10a96684d94e11ac39', 'alifia', '81dc9bdb52d04dc20036dbd8313ed055', 'alifia', 'pengusul'),
('44d363d0b2044708b813', 'penerima1', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Tes Penerima', 'kasubid'),
('6a320de38ed245b880f4', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'coba', 'Karu'),
('6ad5c5a6baa74a05a216', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tes Admin IT', 'Admin'),
('78e6ba3f91f24305a065', 'pengusul1', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Tes Pengusul', 'karu'),
('a10b4545fa424d79bf84', 'asdasd', '4473e588b35568687564de38ed134d0b', 'asdsadas', 'admin'),
('bdac6a1ad28d464fb82b', 'adminkasubag', '31b8c943aab6287440162172e591c89f', 'Admin Kasubag', 'Kasubit'),
('c3a9397b32084249927a', 'lalala', '2e3817293fc275dbee74bd71ce6eb056', 'lalala', 'penerima');

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_detail` int(11) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `butuh_rincian` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_detail`, `kode_rekening`, `uraian`, `butuh_rincian`, `parent`) VALUES
(8, '5.1', 'Belanja Operasi', 0, NULL),
(9, '5.1.01', 'Belanja Pegawai', 0, 8),
(10, '5.1.01.03', 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN', 0, 9),
(14, '5.1.01.03.07', 'Belanja Honorarium', 0, 10),
(15, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 1, 14),
(16, '5.1.01.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 1, 14),
(17, '5.1.02', 'Belanja Barang dan Jasa', 0, 8),
(22, '5.1.02.01', 'Belanja Barang', 0, 17),
(23, '5.1.02.01.01', 'Belanja Barang Pakai Habis', 0, 22),
(24, '5.1.02.01.01.0002', 'Belanja Bahan-Bahan Kimia', 1, 23),
(25, '5.1.02.01.01.0005', 'Belanja Bahan-Bahan Baku', 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `dpa_detail`
--

CREATE TABLE `dpa_detail` (
  `id_dpa_detail` int(11) NOT NULL,
  `id_dpa` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpa_detail`
--

INSERT INTO `dpa_detail` (`id_dpa_detail`, `id_dpa`, `id_detail`, `jumlah`) VALUES
(47, 29, 15, 0),
(48, 29, 16, 0),
(50, 28, 16, 0),
(84, 34, 15, 0),
(85, 34, 16, 0),
(114, 31, 15, 0),
(124, 27, 15, 0),
(144, 26, 15, 0),
(145, 35, 15, 0),
(146, 35, 16, 0),
(147, 35, 24, 0),
(148, 32, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `id_rincian` int(11) NOT NULL,
  `id_dpa_detail` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `koefisien` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `PPN` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id_rincian`, `id_dpa_detail`, `keterangan`, `koefisien`, `satuan`, `harga`, `PPN`, `jumlah`) VALUES
(70, 50, 'Testinggg', '3', '3', 3, 3, 3),
(123, 84, 'ewrertgr', '1', '1', 1, 1, 1),
(124, 85, 'fergfregrgtrgtrg', '2', '2', 22, 2, 2),
(176, 114, 'ytryhtruty', '1', '1', 1, 1, 1),
(188, 124, 'Keterangan 3', '3', '3', 3, 3, 3),
(221, 144, 'Pejabat Pelaksana Teknis Kegiatan (PPTK)\r\nSpesifikasi : Nilai pagu dana di atas Rp 1\r\nmiliar s.d. Rp 2,5 miliar', '12 Orang / Bulan ', 'OB', 1910000, 0, 22920000),
(222, 144, 'Pejabat Penatausahaan Keuangan SKPD (PPK\r\nSKPD)\r\nSpesifikasi : Nilai pagu dana di atas Rp 1\r\nmiliar s.d. Rp 2,5 miliar', '12 Orang / Bulan ', 'OB', 770000, 0, 9240000),
(223, 145, 'uyjuyju', '1', '1', 1, 1, 1),
(224, 146, 'tyhyt', '1', '1', 1, 1, 1),
(225, 147, 'hy', '1', '1', 1, 1, 1),
(226, 148, 'ttttttythg', '1', '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sk_belanja`
--

CREATE TABLE `sk_belanja` (
  `id` int(200) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `program` varchar(200) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `subkegiatan` varchar(200) NOT NULL,
  `indikator` varchar(200) NOT NULL,
  `target` int(200) NOT NULL,
  `alokasi_tahun2021` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `status_karu` int(11) NOT NULL,
  `status_karu_dpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_belanja`
--

INSERT INTO `sk_belanja` (`id`, `tanggal_sk`, `program`, `kegiatan`, `subkegiatan`, `indikator`, `target`, `alokasi_tahun2021`, `status`, `status_karu`, `status_karu_dpa`) VALUES
(26, '2021-02-22', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota', 'Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota', 'Presentase Unit Pelayanan Kesehatan Yang Memenuhi SPM', 100, 1407408000, 'RKA', 0, 1),
(27, '2021-11-09', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '9', 9, 9, 'RKA', 0, 0),
(28, '2021-02-14', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)', 'dfgfhb', 10, 2021, 'RKA', 0, 0),
(29, '2021-02-15', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '1', 1, 1, 'RKA', 0, 0),
(30, '2021-02-16', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '2', 2, 2, 'RKA', 0, 0),
(31, '2021-02-15', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '77', 3, 33, 'RKA', 0, 0),
(32, '2021-02-13', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '43', 43, 43, 'RKA', 0, 0),
(33, '2021-02-15', 'Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Peningkatan Pelayanan RSUD', 'Pelayanan dan Penunjang Pelayanan BLUD', '2', 2, 2, 'DPA', 0, 0),
(34, '2021-02-01', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '3', 2, 2, 'Draft DPA', 0, 0),
(35, '2021-02-23', 'Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '6', 6, 6, 'RKA', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `dpa_detail`
--
ALTER TABLE `dpa_detail`
  ADD PRIMARY KEY (`id_dpa_detail`);

--
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`id_rincian`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `sk_belanja`
--
ALTER TABLE `sk_belanja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `dpa_detail`
--
ALTER TABLE `dpa_detail`
  MODIFY `id_dpa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_belanja`
--
ALTER TABLE `sk_belanja`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
