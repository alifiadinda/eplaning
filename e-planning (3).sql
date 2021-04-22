-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 03:58 AM
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
('bdac6a1ad28d464fb82b', 'adminkasubag', '31b8c943aab6287440162172e591c89f', 'Admin Kasubag', 'Kasubid'),
('c0db254b7a564f638463', 'kasubag', '31b8c943aab6287440162172e591c89f', 'kasubag', 'Kasubid'),
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
(25, '5.1.02.01.01.0002', 'Belanja Bahan-Bahan Kimia', 1, 23),
(28, '5.1.02.01.01.0005', 'Belanja Bahan-Bahan Baku', 1, 23),
(29, '5.1.02.01.01.0008', 'Belanja Bahan-Bahan/Bibit Tanaman', 1, 23),
(30, '5.1.02.01.01.0010', 'Belanja Bahan-Isi Tabung Gas', 1, 23),
(31, '5.1.02.01.01.0012', 'Belanja Bahan-Bahan Lainnya', 1, 23),
(32, '5.1.02.01.01.0030', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perabot Kantor', 1, 23),
(33, '5.1.02.01.01.0031', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Listrik', 1, 23),
(34, '5.1.02.01.01.0036', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat/Bahan untuk Kegiatan Kantor Lainnya', 1, 23),
(35, '5.1.02.01.01.0037', 'Belanja Obat-Obatan-Obat', 1, 23),
(36, '5.1.02.01.01.0040', 'Belanja Persediaan untuk Dijual/Diserahkan-Persediaan untuk Dijual/Diserahkan Lainnya', 1, 23),
(37, '5.1.02.01.01.0043', 'Belanja Natura dan Pakan-Natura', 1, 23),
(38, '5.1.02.02', 'Belanja Jasa', 0, 17),
(39, '5.1.02.02.01', 'Belanja Jasa Kantor', 0, 38),
(40, '5.1.02.02.01.0052', 'Belanja Jasa Pembersihan, Pengendalian Hama, dan Fumigasi', 1, 39),
(41, '5.1.02.02.04', 'Belanja Sewa Peralatan dan Mesin', 0, 38),
(42, '5.1.02.02.04.0211', 'Belanja Sewa Alat Kedokteran Bagian Penyakit Dalam', 1, 41),
(43, '5.1.02.02.04.0226', 'Belanja Sewa Alat Kedokteran Bedah Ortopedi', 1, 41),
(44, '5.1.02.02.08', 'Belanja Jasa Konsultansi Konstruksi', 0, 38),
(45, '5.1.02.02.08.0019', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi\r\nBangunan Gedung', 1, 44),
(46, '5.1.02.03', 'Belanja Pemeliharaan', 0, 17),
(47, '5.1.02.03.02', 'Belanja Pemeliharaan Peralatan dan Mesin', 0, 46),
(48, '5.1.02.03.02.0117 ', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Alat Kantor Lainnya', 1, 47),
(49, '5.1.02.03.02.0204', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kedokteran-Alat Kedokteran\r\nUmum', 1, 47),
(50, '5.1.02.03.02.0205', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kedokteran-Alat Kedokteran\r\nGigi', 1, 47),
(51, '5.1.02.03.02.0409', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Personal Computer', 1, 47),
(52, '5.1.02.03.03', 'Belanja Pemeliharaan Gedung dan Bangunan', 0, 46),
(53, '5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan\r\nGedung Kantor', 1, 52),
(54, '5.2', 'Belanja Modal', 0, 0),
(55, '5.2.02', 'Belanja Modal Peralatan dan Mesin', 0, 54),
(56, '5.2.02.02', 'Belanja Modal Alat Angkutan', 0, 55),
(57, '5.2.02.02.01', 'Belanja Modal Alat Angkutan Darat Bermotor', 0, 56),
(58, '5.2.02.02.01.0006 ', 'Belanja Modal Kendaraan Bermotor Khusus', 1, 57),
(59, '5.2.02.05', 'Belanja Modal Alat Kantor dan Rumah Tangga', 0, 55),
(60, '5.2.02.05.02', 'Belanja Modal Alat Rumah Tangga', 0, 59),
(61, '5.2.02.05.02.0005', 'Belanja Modal Alat Dapur', 1, 60),
(62, '5.2.02.07', 'Belanja Modal Alat Kedokteran dan Kesehatan', 0, 55),
(63, '5.2.02.07.01', 'Belanja Modal Alat Kedokteran', 0, 62),
(64, '5.2.02.07.01.0001', 'Belanja Modal Alat Kedokteran Umum', 1, 63),
(65, '5.2.03', 'Belanja Modal Gedung dan Bangunan', 0, 54),
(66, '5.2.03.01', 'Belanja Modal Bangunan Gedung', 0, 65),
(67, '5.2.03.01.01', 'Belanja Modal Bangunan Gedung Tempat Kerja', 0, 66),
(68, '5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', 1, 67),
(69, '5.1.01.03.08', 'Belanja Jasa Pengelolaan BMD', 0, 10),
(70, '5.1.01.03.08.0002 ', 'Belanja Jasa Pengelolaan BMD yang Tidak Menghasilkan Pendapatan', 1, 69),
(71, '5.1.02.01.01.0004', 'Belanja Bahan-Bahan Bakar dan Pelumas', 1, 23),
(72, '5.1.02.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor', 1, 23),
(73, '5.1.02.01.01.0025', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Kertas dan Cover', 1, 23),
(74, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 1, 23),
(75, '5.1.02.01.01.0027', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Benda Pos', 1, 23),
(76, '5.1.02.01.01.0029', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Komputer', 1, 23),
(78, '5.1.02.01.01.0032 ', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perlengkapan Dinas', 1, 23),
(79, '5.1.02.01.01.0035', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Suvenir/Cendera Mata', 1, 23),
(80, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 1, 23),
(81, '5.1.02.01.01.0053', 'Belanja Makanan dan Minuman Jamuan Tamu', 1, 23),
(82, '5.1.02.02.01.0003', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara, dan Panitia', 1, 39),
(83, '5.1.02.02.01.0007', 'Honorarium Rohaniwan', 1, 39),
(84, '5.1.02.02.01.0014', 'Belanja Jasa Tenaga Kesehatan', 1, 39),
(85, '5.1.02.02.01.0029', 'Belanja Jasa Tenaga Ahli', 1, 39),
(86, '5.1.02.02.01.0030', 'Belanja Jasa Tenaga Kebersihan', 1, 39),
(87, '5.1.02.02.01.0031', 'Belanja Jasa Tenaga Keamanan', 1, 39),
(88, '5.1.02.02.01.0055', 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', 1, 39),
(89, '5.1.02.02.01.0059', 'Belanja Tagihan Telepon', 1, 39),
(90, '5.1.02.02.01.0060 ', 'Belanja Tagihan Air', 1, 39),
(91, '5.1.02.02.01.0061', 'Belanja Tagihan Listrik', 1, 39),
(92, '5.1.02.02.01.0063', 'Belanja Kawat/Faksimili/Internet/TV Berlangganan', 1, 39),
(93, '5.1.02.02.01.0067', 'Belanja Pembayaran Pajak, Bea, dan Perizinan', 1, 39),
(94, '5.1.02.02.02', 'Belanja Iuran Jaminan/Asuransi', 0, 38),
(95, '5.1.02.02.02.0005', 'Belanja Iuran Jaminan Kesehatan bagi Non ASN', 1, 94),
(96, '5.1.02.02.02.0008', 'Belanja Asuransi Barang Milik Daerah', 1, 94),
(97, '5.1.02.02.12', 'Belanja Kursus/Pelatihan, Sosialisasi, Bimbingan Teknis serta Pendidikan dan Pelatihan', 0, 38),
(98, '5.1.02.02.12.0003', 'Belanja Bimbingan Teknis', 1, 97),
(99, '5.1.02.03.02.0035', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Dinas\r\nBermotor Perorangan', 1, 47),
(100, '5.1.02.03.05', 'Belanja Pemeliharaan Aset Tetap Lainnya', 0, 46),
(101, '5.1.02.03.05.0057', 'Belanja Pemeliharaan Tanaman-Tanaman-Tanaman', 1, 100),
(102, '5.1.02.04', 'Belanja Perjalanan Dinas', 0, 17),
(103, '5.1.02.04.01', 'Belanja Perjalanan Dinas Dalam Negeri', 0, 102),
(104, '5.1.02.04.01.0002', 'Belanja Perjalanan Dinas Tetap', 1, 103),
(105, '5.1.02.04.01.0003', ' Belanja Perjalanan Dinas Dalam Kota', 1, 103),
(106, '5.1.02.05', 'Belanja Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 0, 17),
(107, '5.1.02.05.01', 'Belanja Uang yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 0, 106),
(108, '5.1.02.05.01.0002', 'Belanja Penghargaan atas Suatu Prestasi', 1, 107),
(109, '5.2.02.05.02.0004', 'Belanja Modal Alat Pendingin', 1, 60),
(110, '5.2.02.05.02.0006', 'Belanja Modal Alat Rumah Tangga Lainnya (Home Use)', 1, 60),
(111, '5.2.02.05.03', 'Belanja Modal Meja dan Kursi Kerja/Rapat Pejabat', 0, 59),
(112, '5.2.02.05.03.0001', 'Belanja Modal Meja Kerja Pejabat', 1, 111),
(113, '5.2.02.05.03.0003', 'Belanja Modal Kursi Kerja Pejabat', 1, 111),
(114, '5.2.02.05.03.0007', 'Belanja Modal Lemari dan Arsip Pejabat', 1, 111),
(115, '5.2.02.06', 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar', 0, 55),
(116, '5.2.02.06.02', 'Belanja Modal Alat Komunikasi', 0, 115),
(117, '5.2.02.06.02.0001', 'Belanja Modal Alat Komunikasi Telephone', 1, 116),
(118, '5.2.02.07.01.0004 ', 'Belanja Modal Alat Kedokteran Bedah', 1, 63),
(119, '5.2.02.07.01.0023', 'Belanja Modal Alat Kedokteran Bedah Ortopedi', 1, 63),
(120, '5.2.02.10', 'Belanja Modal Komputer', 0, 55),
(121, '5.2.02.10.01', 'Belanja Modal Komputer Unit', 0, 120),
(122, '5.2.02.10.01.0002', 'Belanja Modal Personal Computer', 1, 121),
(123, '5.2.02.10.01.0003', 'Belanja Modal Komputer Unit Lainnya', 1, 121),
(124, '5.1.01.99', 'Belanja Pegawai BLUD', 0, 9),
(125, '5.1.01.99.99 ', 'Belanja Pegawai BLUD', 0, 124),
(126, '5.1.01.99.99.9999', 'Belanja Pegawai BLUD', 1, 125),
(127, '5.1.02.99', 'Belanja Barang dan Jasa BLUD', 0, 17),
(128, '5.1.02.99.99', 'Belanja Barang dan Jasa BLUD', 0, 127),
(129, '5.1.02.99.99.9999', 'Belanja Barang dan Jasa BLUD', 1, 128),
(130, '5.1.02.02.05', 'Belanja Sewa Gedung dan Bangunan', 0, 38),
(131, '5.1.02.02.05.0009 ', 'Belanja Sewa Bangunan Gedung Tempat Pertemuan', 1, 130),
(132, '5.2.02.07.01.0002 ', 'Belanja Modal Alat Kedokteran Gigi', 1, 63),
(133, '5.2.02.07.01.0005', 'Belanja Modal Alat Kesehatan Kebidanan dan Penyakit Kandungan', 1, 63),
(134, '5.2.02.07.01.0010 ', 'Belanja Modal Alat Kedokteran Anak', 1, 63),
(135, '5.2.02.07.01.0012', 'Belanja Modal Alat Kesehatan Rehabilitasi Medis', 1, 63),
(136, '5.1.01.03.06', 'Belanja Jasa Pelayanan Kesehatan bagi ASN', 0, 10),
(137, '5.1.01.03.06.0001', 'Belanja Jasa Pelayanan Kesehatan\r\nbagi ASN', 1, 136),
(138, '5.1.02.02.01.0016', 'Belanja Jasa Tenaga Penanganan\r\nPrasarana dan Sarana Umum', 1, 39),
(139, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 1, 39),
(140, '5.1.02.02.01.0028', 'Belanja Jasa Tenaga Pelayanan\r\nUmum', 1, 39),
(141, '5.1.02.02.01.0033', 'Belanja Jasa Tenaga Supir', 1, 39),
(142, '5.1.02.02.01.0034', 'Belanja Jasa Tenaga Juru Masak', 1, 39),
(143, '5.1.02.02.01.0039', 'Belanja Jasa Tenaga Informasi dan\r\nTeknologi', 1, 39),
(144, '5.1.01.03.07.0003', 'Belanja Honorarium Perangkat Unit Kerja Pengadaan Barang dan Jasa (UKPBJ)', 1, 14),
(145, '5.1.01.01', 'Belanja Gaji dan Tunjangan ASN', 0, 9),
(146, '5.1.01.01.01', 'Belanja Gaji Pokok ASN', 0, 145),
(147, '5.1.01.01.01.0001', 'Belanja Gaji Pokok PNS', 1, 146),
(148, '5.1.01.01.01.0002', 'Belanja Gaji Pokok PPPK', 1, 146),
(151, '5.1.01.01.02', 'Belanja Tunjangan Keluarga ASN', 0, 145),
(152, '5.1.01.01.02.0001', 'Belanja Tunjangan Keluarga PNS', 1, 151),
(153, '5.1.01.01.02.0002', 'Belanja Tunjangan Keluarga PPPK', 1, 151);

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
(84, 34, 15, 0),
(85, 34, 16, 0),
(114, 31, 15, 0),
(145, 35, 15, 0),
(146, 35, 16, 0),
(147, 35, 24, 0),
(148, 32, 15, 0),
(155, 36, 15, 0),
(177, 37, 15, 0),
(200, 28, 15, 0),
(201, 28, 16, 0),
(203, 38, 15, 0),
(206, 39, 15, 0),
(208, 29, 15, 0),
(240, 27, 148, 0),
(241, 27, 15, 0),
(242, 27, 16, 0),
(258, 43, 61, 0),
(265, 26, 147, 0),
(266, 26, 58, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_dpa` int(11) NOT NULL,
  `id_detail_belanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_dpa`, `id_detail_belanja`) VALUES
(12, 26, 145),
(13, 26, 9),
(14, 26, 148),
(15, 26, 147),
(16, 26, 146),
(17, 26, 8),
(18, 26, 151),
(19, 26, 54),
(20, 26, 55),
(21, 26, 57),
(22, 26, 58),
(23, 26, 56);

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
(379, 265, 'fgujdihgiufhg', '1', '1', 1, 1, 1),
(380, 266, 'fdsgfdh', '2', '2', 2, 2, 2);

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
(26, '2021-02-22', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota', 'Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota', 'Presentase Unit Pelayanan Kesehatan Yang Memenuhi SPM', 100, 1, 'RKA', 1, 1),
(27, '2021-11-09', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '9', 9, 19, 'RKA', 0, 0),
(28, '2021-02-14', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)', 'dfgfhb', 10, 15, 'RKA', 0, 0),
(29, '2021-02-15', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '5', 5, 1, 'Draft DPA', 1, 0),
(30, '2021-02-16', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '2', 2, 2, 'DPA', 1, 1),
(33, '2021-02-15', 'Program Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Peningkatan Pelayanan RSUD', 'Pelayanan dan Penunjang Pelayanan BLUD', '2', 2, 2, 'DPA', 0, 0),
(36, '2021-03-08', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', 'iuiuojkj', 100, 2, 'DPA', 1, 1),
(37, '2021-03-07', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', 'kkjk', 10, 5, 'Draft DPA', 1, 1),
(39, '2021-03-09', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', 'dfgfhb', 6, 2, 'Draft DPA', 1, 0),
(40, '2021-03-03', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)', 'kjblkjlkj', 100, 0, 'RKA', 0, 0),
(41, '2021-04-02', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)', 'rhfjh', 90, 0, 'RKA', 0, 0);

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
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

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
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `dpa_detail`
--
ALTER TABLE `dpa_detail`
  MODIFY `id_dpa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_belanja`
--
ALTER TABLE `sk_belanja`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
