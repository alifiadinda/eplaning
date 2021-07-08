-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 03:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `level` enum('Kasubag','Karu','Admin','Pengusul','Perencana') NOT NULL DEFAULT 'Karu',
  `kode_ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama`, `level`, `kode_ruangan`) VALUES
('2038331b5d11487e9250', 'adminkaru', '7c79dd68b400e6b0c9f99f8f221dae26', 'Admin Karu', 'Karu', 'WH_FARMA'),
('34e123e12598496e8f91', 'admin_it', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Tes Admin', 'Admin', 'IT'),
('3c10a96684d94e11ac39', 'alifia', '81dc9bdb52d04dc20036dbd8313ed055', 'alifia', 'Pengusul', 'IT'),
('44d363d0b2044708b813', 'penerima1', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Tes Penerima', 'Karu', 'TU'),
('6a320de38ed245b880f4', 'perencana', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'coba', 'Perencana', 'TU'),
('6ad5c5a6baa74a05a216', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tes Admin IT', 'Admin', 'IT'),
('78e6ba3f91f24305a065', 'pengusul2', '593ed2cba21b6da0bae443364107a649', 'Tes Pengusul', 'Pengusul', 'WH_FARMA'),
('bdac6a1ad28d464fb82b', 'adminkasubag', '31b8c943aab6287440162172e591c89f', 'Admin Kasubag', 'Kasubag', 'IT'),
('c0db254b7a564f638463', 'kasubag', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'kasubag', 'Kasubag', 'KEUANGAN'),
('ed15ffcc26694a539cdc', 'asdasd', '130811dbd239c97bd9ce933de7349f20', 'Cek asd 123', 'Pengusul', 'TU'),
('f32039aea4514af6b3e9', 'pengusul', '593ed2cba21b6da0bae443364107a649', 'Pengusul-HCU', 'Karu', 'HCU');

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_detail` int(11) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `butuh_rincian` tinyint(1) NOT NULL DEFAULT 0,
  `tampil_rekening` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_detail`, `kode_rekening`, `uraian`, `butuh_rincian`, `tampil_rekening`, `parent`) VALUES
(7, '5', 'Belanja', 0, 1, NULL),
(8, '5.1', 'Belanja Operasi', 0, 1, 7),
(9, '5.1.01', 'Belanja Pegawai', 0, 1, 8),
(10, '5.1.01.03', 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN', 0, 1, 9),
(14, '5.1.01.03.07', 'Belanja Honorarium', 0, 0, 10),
(15, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 1, 0, 14),
(16, '5.1.01.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 1, 0, 14),
(17, '5.1.02', 'Belanja Barang dan Jasa', 0, 0, 8),
(22, '5.1.02.01', 'Belanja Barang', 0, 0, 17),
(23, '5.1.02.01.01', 'Belanja Barang Pakai Habis', 0, 0, 22),
(25, '5.1.02.01.01.0002', 'Belanja Bahan-Bahan Kimia', 1, 0, 23),
(28, '5.1.02.01.01.0005', 'Belanja Bahan-Bahan Baku', 1, 0, 23),
(29, '5.1.02.01.01.0008', 'Belanja Bahan-Bahan/Bibit Tanaman', 1, 0, 23),
(30, '5.1.02.01.01.0010', 'Belanja Bahan-Isi Tabung Gas', 1, 0, 23),
(31, '5.1.02.01.01.0012', 'Belanja Bahan-Bahan Lainnya', 1, 0, 23),
(32, '5.1.02.01.01.0030', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perabot Kantor', 1, 0, 23),
(33, '5.1.02.01.01.0031', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Listrik', 1, 0, 23),
(34, '5.1.02.01.01.0036', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat/Bahan untuk Kegiatan Kantor Lainnya', 1, 0, 23),
(35, '5.1.02.01.01.0037', 'Belanja Obat-Obatan-Obat', 1, 0, 23),
(36, '5.1.02.01.01.0040', 'Belanja Persediaan untuk Dijual/Diserahkan-Persediaan untuk Dijual/Diserahkan Lainnya', 1, 0, 23),
(37, '5.1.02.01.01.0043', 'Belanja Natura dan Pakan-Natura', 1, 0, 23),
(38, '5.1.02.02', 'Belanja Jasa', 0, 0, 17),
(39, '5.1.02.02.01', 'Belanja Jasa Kantor', 0, 0, 38),
(40, '5.1.02.02.01.0052', 'Belanja Jasa Pembersihan, Pengendalian Hama, dan Fumigasi', 1, 0, 39),
(41, '5.1.02.02.04', 'Belanja Sewa Peralatan dan Mesin', 0, 0, 38),
(42, '5.1.02.02.04.0211', 'Belanja Sewa Alat Kedokteran Bagian Penyakit Dalam', 1, 0, 41),
(43, '5.1.02.02.04.0226', 'Belanja Sewa Alat Kedokteran Bedah Ortopedi', 1, 0, 41),
(44, '5.1.02.02.08', 'Belanja Jasa Konsultansi Konstruksi', 0, 0, 38),
(45, '5.1.02.02.08.0019', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi\r\nBangunan Gedung', 1, 0, 44),
(46, '5.1.02.03', 'Belanja Pemeliharaan', 0, 0, 17),
(47, '5.1.02.03.02', 'Belanja Pemeliharaan Peralatan dan Mesin', 0, 0, 46),
(48, '5.1.02.03.02.0117 ', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Alat Kantor Lainnya', 1, 0, 47),
(49, '5.1.02.03.02.0204', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kedokteran-Alat Kedokteran\r\nUmum', 1, 0, 47),
(50, '5.1.02.03.02.0205', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kedokteran-Alat Kedokteran\r\nGigi', 1, 0, 47),
(51, '5.1.02.03.02.0409', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Personal Computer', 1, 0, 47),
(52, '5.1.02.03.03', 'Belanja Pemeliharaan Gedung dan Bangunan', 0, 0, 46),
(53, '5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan\r\nGedung Kantor', 1, 0, 52),
(54, '5.2', 'Belanja Modal', 0, 0, 0),
(55, '5.2.02', 'Belanja Modal Peralatan dan Mesin', 0, 0, 54),
(56, '5.2.02.02', 'Belanja Modal Alat Angkutan', 0, 0, 55),
(57, '5.2.02.02.01', 'Belanja Modal Alat Angkutan Darat Bermotor', 0, 0, 56),
(58, '5.2.02.02.01.0006 ', 'Belanja Modal Kendaraan Bermotor Khusus', 1, 0, 57),
(59, '5.2.02.05', 'Belanja Modal Alat Kantor dan Rumah Tangga', 0, 0, 55),
(60, '5.2.02.05.02', 'Belanja Modal Alat Rumah Tangga', 0, 0, 59),
(61, '5.2.02.05.02.0005', 'Belanja Modal Alat Dapur', 1, 0, 60),
(62, '5.2.02.07', 'Belanja Modal Alat Kedokteran dan Kesehatan', 0, 0, 55),
(63, '5.2.02.07.01', 'Belanja Modal Alat Kedokteran', 0, 0, 62),
(64, '5.2.02.07.01.0001', 'Belanja Modal Alat Kedokteran Umum', 1, 0, 63),
(65, '5.2.03', 'Belanja Modal Gedung dan Bangunan', 0, 0, 54),
(66, '5.2.03.01', 'Belanja Modal Bangunan Gedung', 0, 0, 65),
(67, '5.2.03.01.01', 'Belanja Modal Bangunan Gedung Tempat Kerja', 0, 0, 66),
(68, '5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', 1, 0, 67),
(69, '5.1.01.03.08', 'Belanja Jasa Pengelolaan BMD', 0, 0, 10),
(70, '5.1.01.03.08.0002 ', 'Belanja Jasa Pengelolaan BMD yang Tidak Menghasilkan Pendapatan', 1, 0, 69),
(71, '5.1.02.01.01.0004', 'Belanja Bahan-Bahan Bakar dan Pelumas', 1, 0, 23),
(72, '5.1.02.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor', 1, 0, 23),
(73, '5.1.02.01.01.0025', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Kertas dan Cover', 1, 0, 23),
(74, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 1, 0, 23),
(75, '5.1.02.01.01.0027', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Benda Pos', 1, 0, 23),
(76, '5.1.02.01.01.0029', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Komputer', 1, 0, 23),
(78, '5.1.02.01.01.0032 ', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perlengkapan Dinas', 1, 0, 23),
(79, '5.1.02.01.01.0035', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Suvenir/Cendera Mata', 1, 0, 23),
(80, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 1, 0, 23),
(81, '5.1.02.01.01.0053', 'Belanja Makanan dan Minuman Jamuan Tamu', 1, 0, 23),
(82, '5.1.02.02.01.0003', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara, dan Panitia', 1, 0, 39),
(83, '5.1.02.02.01.0007', 'Honorarium Rohaniwan', 1, 0, 39),
(84, '5.1.02.02.01.0014', 'Belanja Jasa Tenaga Kesehatan', 1, 0, 39),
(85, '5.1.02.02.01.0029', 'Belanja Jasa Tenaga Ahli', 1, 0, 39),
(86, '5.1.02.02.01.0030', 'Belanja Jasa Tenaga Kebersihan', 1, 0, 39),
(87, '5.1.02.02.01.0031', 'Belanja Jasa Tenaga Keamanan', 1, 0, 39),
(88, '5.1.02.02.01.0055', 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', 1, 0, 39),
(89, '5.1.02.02.01.0059', 'Belanja Tagihan Telepon', 1, 0, 39),
(90, '5.1.02.02.01.0060 ', 'Belanja Tagihan Air', 1, 0, 39),
(91, '5.1.02.02.01.0061', 'Belanja Tagihan Listrik', 1, 0, 39),
(92, '5.1.02.02.01.0063', 'Belanja Kawat/Faksimili/Internet/TV Berlangganan', 1, 0, 39),
(93, '5.1.02.02.01.0067', 'Belanja Pembayaran Pajak, Bea, dan Perizinan', 1, 0, 39),
(94, '5.1.02.02.02', 'Belanja Iuran Jaminan/Asuransi', 0, 0, 38),
(95, '5.1.02.02.02.0005', 'Belanja Iuran Jaminan Kesehatan bagi Non ASN', 1, 0, 94),
(96, '5.1.02.02.02.0008', 'Belanja Asuransi Barang Milik Daerah', 1, 0, 94),
(97, '5.1.02.02.12', 'Belanja Kursus/Pelatihan, Sosialisasi, Bimbingan Teknis serta Pendidikan dan Pelatihan', 0, 0, 38),
(98, '5.1.02.02.12.0003', 'Belanja Bimbingan Teknis', 1, 0, 97),
(99, '5.1.02.03.02.0035', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Dinas\r\nBermotor Perorangan', 1, 0, 47),
(100, '5.1.02.03.05', 'Belanja Pemeliharaan Aset Tetap Lainnya', 0, 0, 46),
(101, '5.1.02.03.05.0057', 'Belanja Pemeliharaan Tanaman-Tanaman-Tanaman', 1, 0, 100),
(102, '5.1.02.04', 'Belanja Perjalanan Dinas', 0, 0, 17),
(103, '5.1.02.04.01', 'Belanja Perjalanan Dinas Dalam Negeri', 0, 0, 102),
(104, '5.1.02.04.01.0002', 'Belanja Perjalanan Dinas Tetap', 1, 0, 103),
(105, '5.1.02.04.01.0003', ' Belanja Perjalanan Dinas Dalam Kota', 1, 0, 103),
(106, '5.1.02.05', 'Belanja Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 0, 0, 17),
(107, '5.1.02.05.01', 'Belanja Uang yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 0, 0, 106),
(108, '5.1.02.05.01.0002', 'Belanja Penghargaan atas Suatu Prestasi', 1, 0, 107),
(109, '5.2.02.05.02.0004', 'Belanja Modal Alat Pendingin', 1, 0, 60),
(110, '5.2.02.05.02.0006', 'Belanja Modal Alat Rumah Tangga Lainnya (Home Use)', 1, 0, 60),
(111, '5.2.02.05.03', 'Belanja Modal Meja dan Kursi Kerja/Rapat Pejabat', 0, 0, 59),
(112, '5.2.02.05.03.0001', 'Belanja Modal Meja Kerja Pejabat', 1, 0, 111),
(113, '5.2.02.05.03.0003', 'Belanja Modal Kursi Kerja Pejabat', 1, 0, 111),
(114, '5.2.02.05.03.0007', 'Belanja Modal Lemari dan Arsip Pejabat', 1, 0, 111),
(115, '5.2.02.06', 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar', 0, 0, 55),
(116, '5.2.02.06.02', 'Belanja Modal Alat Komunikasi', 0, 0, 115),
(117, '5.2.02.06.02.0001', 'Belanja Modal Alat Komunikasi Telephone', 1, 0, 116),
(118, '5.2.02.07.01.0004 ', 'Belanja Modal Alat Kedokteran Bedah', 1, 0, 63),
(119, '5.2.02.07.01.0023', 'Belanja Modal Alat Kedokteran Bedah Ortopedi', 1, 0, 63),
(120, '5.2.02.10', 'Belanja Modal Komputer', 0, 0, 55),
(121, '5.2.02.10.01', 'Belanja Modal Komputer Unit', 0, 0, 120),
(122, '5.2.02.10.01.0002', 'Belanja Modal Personal Computer', 1, 0, 121),
(123, '5.2.02.10.01.0003', 'Belanja Modal Komputer Unit Lainnya', 1, 0, 121),
(124, '5.1.01.99', 'Belanja Pegawai BLUD', 0, 0, 9),
(125, '5.1.01.99.99 ', 'Belanja Pegawai BLUD', 0, 0, 124),
(126, '5.1.01.99.99.9999', 'Belanja Pegawai BLUD', 1, 0, 125),
(127, '5.1.02.99', 'Belanja Barang dan Jasa BLUD', 0, 0, 17),
(128, '5.1.02.99.99', 'Belanja Barang dan Jasa BLUD', 0, 0, 127),
(129, '5.1.02.99.99.9999', 'Belanja Barang dan Jasa BLUD', 1, 0, 128),
(130, '5.1.02.02.05', 'Belanja Sewa Gedung dan Bangunan', 0, 0, 38),
(131, '5.1.02.02.05.0009 ', 'Belanja Sewa Bangunan Gedung Tempat Pertemuan', 1, 0, 130),
(132, '5.2.02.07.01.0002 ', 'Belanja Modal Alat Kedokteran Gigi', 1, 0, 63),
(133, '5.2.02.07.01.0005', 'Belanja Modal Alat Kesehatan Kebidanan dan Penyakit Kandungan', 1, 0, 63),
(134, '5.2.02.07.01.0010 ', 'Belanja Modal Alat Kedokteran Anak', 1, 0, 63),
(135, '5.2.02.07.01.0012', 'Belanja Modal Alat Kesehatan Rehabilitasi Medis', 1, 0, 63),
(136, '5.1.01.03.06', 'Belanja Jasa Pelayanan Kesehatan bagi ASN', 0, 0, 10),
(137, '5.1.01.03.06.0001', 'Belanja Jasa Pelayanan Kesehatan\r\nbagi ASN', 1, 0, 136),
(138, '5.1.02.02.01.0016', 'Belanja Jasa Tenaga Penanganan\r\nPrasarana dan Sarana Umum', 1, 0, 39),
(139, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 1, 0, 39),
(140, '5.1.02.02.01.0028', 'Belanja Jasa Tenaga Pelayanan\r\nUmum', 1, 0, 39),
(141, '5.1.02.02.01.0033', 'Belanja Jasa Tenaga Supir', 1, 0, 39),
(142, '5.1.02.02.01.0034', 'Belanja Jasa Tenaga Juru Masak', 1, 0, 39),
(143, '5.1.02.02.01.0039', 'Belanja Jasa Tenaga Informasi dan\r\nTeknologi', 1, 0, 39),
(144, '5.1.01.03.07.0003', 'Belanja Honorarium Perangkat Unit Kerja Pengadaan Barang dan Jasa (UKPBJ)', 1, 0, 14),
(145, '5.1.01.01', 'Belanja Gaji dan Tunjangan ASN', 0, 0, 9),
(146, '5.1.01.01.01', 'Belanja Gaji Pokok ASN', 0, 0, 145),
(147, '5.1.01.01.01.0001', 'Belanja Gaji Pokok PNS', 1, 0, 146),
(148, '5.1.01.01.01.0002', 'Belanja Gaji Pokok PPPK', 1, 0, 146),
(151, '5.1.01.01.02', 'Belanja Tunjangan Keluarga ASN', 0, 0, 145),
(152, '5.1.01.01.02.0001', 'Belanja Tunjangan Keluarga PNS', 1, 0, 151),
(153, '5.1.01.01.02.0002', 'Belanja Tunjangan Keluarga PPPK', 1, 0, 151);

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
(1, 1, 25, 0),
(2, 1, 32, 0),
(3, 1, 32, 0),
(4, 2, 147, 0),
(5, 2, 147, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_usulan`
--

CREATE TABLE `item_usulan` (
  `id_usulan` int(11) NOT NULL,
  `nama_usulan` varchar(255) NOT NULL,
  `spesifikasi` text NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_usulan`
--

INSERT INTO `item_usulan` (`id_usulan`, `nama_usulan`, `spesifikasi`, `satuan`, `harga_satuan`, `kode_rekening`, `status`) VALUES
(1, 'Alkohol', '1000 ml', 'Botol', 31300, '5.1.02.01.01.0002', 'aktif'),
(2, 'Elektro Surgical Unit', ' COVEDIEN VALLEYLAB FT10 FT SERIES', 'Unit', 620000000, '5.2.02.07.01.0023', 'aktif'),
(3, 'Kalibrasi & Perbaikan X-Ray', '', 'Paket', 15781000, '5.1.02.03.02.0204', 'aktif'),
(4, 'Kresek Kuning', '100 x 120 cm', 'pcs', 3000, '5.1.02.01.01.0030', 'aktif'),
(5, 'Tempat makan sekali pakai', 'Plastik', 'pcs', 2500, '5.1.02.01.01.0030', 'aktif'),
(6, 'Albumin 0285 -500', ' 2x 250 ml', 'set', 600000, '5.1.02.01.01.0002', 'aktif'),
(7, 'stetoskop', '', 'unit', 100000, '5.1.02.03.02.0204', 'aktif'),
(8, 'Tes Usulan Baru', '', 'pcs', 250000, '5.1.01.01.01.0001', 'aktif'),
(9, 'Usulan Baru', 'Gaji Pegawai', 'org', 1000000, '5.1.01.01.01.0001', 'aktif');

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
(46, 28, 7),
(47, 28, 8),
(48, 28, 9),
(49, 28, 10),
(50, 28, 145),
(51, 28, 147),
(52, 26, 7),
(53, 26, 8),
(54, 26, 9),
(55, 26, 10),
(56, 27, 7),
(57, 27, 8),
(58, 27, 9),
(59, 27, 10),
(60, 40, 7),
(61, 40, 8),
(62, 40, 9),
(63, 40, 10),
(64, 41, 7),
(65, 41, 8),
(66, 41, 9),
(67, 41, 10),
(68, 26, 145),
(69, 26, 146),
(70, 26, 147),
(71, 27, 147),
(72, 27, 145),
(73, 26, 50),
(74, 26, 47),
(75, 26, 22),
(76, 26, 46),
(77, 26, 17),
(78, 26, 15),
(79, 26, 14),
(80, 1, 7),
(81, 1, 8),
(82, 1, 9),
(83, 1, 10),
(84, 1, 25),
(85, 1, 23),
(86, 1, 22),
(87, 1, 17),
(88, 1, 32),
(89, 1, 49),
(90, 1, 47),
(91, 1, 46),
(92, 1, 56),
(93, 1, 55),
(94, 1, 54),
(95, 1, 119),
(96, 1, 63),
(97, 1, 62),
(98, 1, 17),
(99, 1, 22),
(100, 2, 7),
(101, 2, 8),
(102, 2, 9),
(103, 2, 10),
(104, 2, 148),
(105, 2, 146),
(106, 2, 147),
(107, 2, 152),
(108, 2, 151),
(109, 2, 145),
(110, 2, 153),
(111, 2, 136),
(112, 2, 137),
(113, 2, 14),
(114, 2, 15),
(115, 2, 25),
(116, 2, 23),
(117, 2, 22),
(118, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `id_rincian` int(11) NOT NULL,
  `id_dpa_detail` int(11) DEFAULT NULL,
  `id_usulan` int(11) NOT NULL,
  `nama_usulan` varchar(255) NOT NULL,
  `spesifikasi` text NOT NULL,
  `koefisien` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `PPN` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `unit_pengusul` varchar(20) NOT NULL,
  `tgl_diusulkan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id_rincian`, `id_dpa_detail`, `id_usulan`, `nama_usulan`, `spesifikasi`, `koefisien`, `satuan`, `harga`, `PPN`, `jumlah`, `kode_rekening`, `unit_pengusul`, `tgl_diusulkan`) VALUES
(1, 1, 1, 'Alkohol', '1000 ml', '1279', 'Botol', 31300, 0, 40032700, '5.1.02.01.01.0002', 'HCU', '2021-07-06'),
(2, NULL, 2, 'Elektro Surgical Unit', ' COVEDIEN VALLEYLAB FT10 FT SERIES', '1', 'Unit', 620000000, 0, 620000000, '5.2.02.07.01.0023', 'HCU', '2021-07-06'),
(3, NULL, 3, 'Kalibrasi & Perbaikan X-Ray', '', '28', 'Paket', 15781000, 0, 441868000, '5.1.02.03.02.0204', 'HCU', '2021-07-06'),
(4, 3, 4, 'Kresek Kuning', '100 x 120 cm', '5010', 'pcs', 3000, 0, 15030000, '5.1.02.01.01.0030', 'HCU', '2021-07-06'),
(5, 2, 5, 'Tempat makan sekali pakai', 'Plastik', '44075', 'pcs', 2500, 0, 110187500, '5.1.02.01.01.0030', 'HCU', '2021-07-06'),
(7, NULL, 6, 'Albumin 0285 -500', ' 2x 250 ml', '2', 'set', 600000, 0, 1200000, '5.1.02.01.01.0002', 'HCU', '2021-07-07'),
(9, 5, 8, 'Tes Usulan Baru', '', '12', 'pcs', 250000, 0, 3000000, '5.1.01.01.01.0001', 'HCU', '2021-07-07'),
(10, 4, 9, 'Usulan Baru', 'Gaji Pegawai', '20', 'org', 1000000, 0, 20000000, '5.1.01.01.01.0001', 'HCU', '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(20) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`) VALUES
('CSSD_LAU', 'CSSD Dan Laundry'),
('FARMA', 'Farmasi'),
('GIZI', 'Gizi'),
('HCU', 'HCU'),
('IGD', 'IGD'),
('IPLRS', 'IPLRS'),
('IPSRS', 'IPSRS'),
('IRNA1', 'Rawat Inap Lt.1'),
('IRNA2', 'Rawat Inap Lt.2'),
('IRNA3', 'Rawat Inap Lt.3'),
('IT', 'Informasi Teknologi'),
('KEUANGAN', 'Keuangan'),
('KMR_OP', 'Kamar Operasi'),
('KMR_SALIN', 'Kamar Bersalin'),
('LABOR', 'Laboratorium'),
('PERINATOLOGI', 'Perinatologi'),
('POLI_ANK', 'Poli Anak'),
('POLI_GIGI', 'Poli Gigi'),
('POLI_KK', 'Poli Kulit Kelamin'),
('POLI_OBGYN', 'Poli Kandungan'),
('POLI_PARU', 'Poli Paru'),
('POLI_PD', 'Poli Penyakit Dalam'),
('POLI_UMUM', 'Poli Umum'),
('PSDP', 'Penunjang Sarana Dan Prasarana'),
('RADIO', 'Radiologi'),
('RH_MED', 'Rehab Medik'),
('TU', 'Tata Usaha'),
('WH_FARMA', 'Gudang Farmasi'),
('YANMED', 'Pelayanan Medis');

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
  `alokasi_tahun2021` bigint(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `status_karu` int(11) NOT NULL,
  `status_karu_dpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_belanja`
--

INSERT INTO `sk_belanja` (`id`, `tanggal_sk`, `program`, `kegiatan`, `subkegiatan`, `indikator`, `target`, `alokasi_tahun2021`, `status`, `status_karu`, `status_karu_dpa`) VALUES
(1, '2021-12-06', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Alat Kesehatan atau Alat Penunjang Medik Fasilitas Pelayanan Kesehatan', 'Jumlah pengadaan sarana penunjang pelayanan kesehatan', 100, 661000800, 'RKA', 0, 0),
(2, '2021-07-07', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', 'test', 100, 23000000, 'RKA', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_kode_ruangan` (`kode_ruangan`);

--
-- Indexes for table `detail_belanja`
--
ALTER TABLE `detail_belanja`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `kode_rekening` (`kode_rekening`);

--
-- Indexes for table `dpa_detail`
--
ALTER TABLE `dpa_detail`
  ADD PRIMARY KEY (`id_dpa_detail`);

--
-- Indexes for table `item_usulan`
--
ALTER TABLE `item_usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `fk_kode_rekening` (`kode_rekening`);

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
  ADD PRIMARY KEY (`kode_ruangan`);

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
  MODIFY `id_dpa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_usulan`
--
ALTER TABLE `item_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sk_belanja`
--
ALTER TABLE `sk_belanja`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_kode_ruangan` FOREIGN KEY (`kode_ruangan`) REFERENCES `ruangan` (`kode_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_usulan`
--
ALTER TABLE `item_usulan`
  ADD CONSTRAINT `fk_kode_rekening` FOREIGN KEY (`kode_rekening`) REFERENCES `detail_belanja` (`kode_rekening`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
