-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 04:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
('c3a9397b32084249927a', 'lalala', '2e3817293fc275dbee74bd71ce6eb056', 'lalala', 'penerima');

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_detail` int(200) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `butuh_rincian` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_detail`, `kode_rekening`, `uraian`, `butuh_rincian`) VALUES
(8, '5.1', 'Belanja Operasi', 0),
(9, '5.1.01', 'Belanja Pegawai', 0),
(10, '5.1.01.03', 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN', 0),
(14, '5.1.01.03.07', 'Belanja Honorarium', 0),
(15, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 1),
(16, '5.1.01.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 1),
(17, '5.1.01.03.08', 'Belanja Jasa Pengelolaan BMD', 0);

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
(37, 27, 8, 0),
(38, 27, 9, 0),
(39, 27, 10, 0),
(43, 27, 11, 0),
(44, 27, 12, 0),
(45, 27, 15, 0),
(47, 29, 15, 0),
(48, 29, 16, 0);

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
(51, 43, 'djndjnjbdd', '2', '2', 2, 2, 2),
(52, 43, 'djbfjdhbfhdb', '3', '3', 3, 3, 3),
(53, 44, 'cie bisa', '2', '2', 2, 2, 2),
(54, 45, 'Bendahara Pengeluaran Pembantu\r\nSpesifikasi : Nilai pagu dana di atas Rp50 miliar s.d. Rp 75 miliar', '12 Orang /Bulan', 'OB', 1150000, 0, 13800000),
(55, 45, 'Bendahara Penerimaan Pembantu\r\nSpesifikasi : Nilai pagu dana di atas Rp 5miliar s.d. Rp 10 miliar', '12 Orang /Bulan', 'OB', 640000, 0, 7680000),
(60, 47, 'Bendahara Pengeluaran Pembantu\r\nSpesifikasi : Nilai pagu dana di atas Rp50 miliar s.d. Rp 75 miliar', '12 Orang /Bulan', 'OB', 1150000, 0, 13800000),
(61, 47, 'Bendahara Penerimaan Pembantu\r\nSpesifikasi : Nilai pagu dana di atas Rp 5miliar s.d. Rp 10 miliar', '12 Orang /Bulan', 'OB', 640000, 0, 7680000),
(62, 47, 'Pejabat Penatausahaan Keuangan SKPD(PPK SKPD)\r\nSpesifikasi : Nilai pagu dana di atas Rp10 miliar s.d. Rp 25 miliar', '12 Orang /Bulan', 'OB', 1250000, 0, 15000000),
(63, 47, 'Pejabat Pelaksana Teknis Kegiatan (PPTK)\r\nSpesifikasi : Nilai pagu dana di atas Rp10 miliar s.d. Rp 25 miliar', '12 Orang /Bulan', 'OB', 2920000, 0, 35040000),
(64, 47, 'Bendahara Pengeluaran Pembantu\r\nSpesifikasi : Nilai pagu dana di atas Rp50 miliar s.d. Rp 75 miliar', '12 Orang /Bulan', 'OB', 1150000, 0, 13800000),
(65, 47, 'Bendahara Penerimaan Pembantu\r\nSpesifikasi : Nilai pagu dana di atas Rp 5miliar s.d. Rp 10 miliar', '12 Orang /Bulan', 'OB', 640000, 0, 7680000),
(66, 48, 'Pejabat Pemeriksa Hasil Pekerjaan(PjPHP)/Panitia Pemeriksa Hasil Pekerjaan(PPHP)\r\nSpesifikasi : Nilai pagu dana di atas Rp10 miliar s.d. Rp 25 miliar', '12 Orang /Bulan', 'OB', 570000, 0, 6840000),
(67, 48, 'Honorarium Pejabat PengadaanBarang/Jasa (PPBJ)\r\nSpesifikasi : -', '12 Orang /Bulan', 'OB', 680000, 0, 8160000);

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
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_belanja`
--

INSERT INTO `sk_belanja` (`id`, `tanggal_sk`, `program`, `kegiatan`, `subkegiatan`, `indikator`, `target`, `alokasi_tahun2021`, `status`) VALUES
(26, '2021-02-10', 'Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Peningkatan Pelayanan RSUD', 'Pelayanan dan Penunjang Pelayanan BLUD', 'dkdcnsdjkncd', 0, 0, 'Draft DPA'),
(27, '2021-11-09', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '9', 9, 9, 'RKA'),
(28, '2021-02-14', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)', 'dfgfhb', 10, 2021, 'RKA'),
(29, '2021-02-15', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '1', 1, 1, 'RKA'),
(30, '2021-02-16', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '2', 2, 2, 'RKA'),
(31, '2021-02-15', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '77', 3, 33, 'RKA'),
(32, '2021-02-14', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '4', 4, 4, 'RKA'),
(33, '2021-02-15', 'Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Peningkatan Pelayanan RSUD', 'Pelayanan dan Penunjang Pelayanan BLUD', '2', 2, 2, 'DPA');

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
  MODIFY `id_detail` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dpa_detail`
--
ALTER TABLE `dpa_detail`
  MODIFY `id_dpa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_belanja`
--
ALTER TABLE `sk_belanja`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
