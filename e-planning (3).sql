-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 12:50 PM
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
  `level` enum('Kasubag','Karu','Admin','Pengusul','Perencana') NOT NULL DEFAULT 'Karu',
  `kode_ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama`, `level`, `kode_ruangan`) VALUES
('2038331b5d11487e9250', 'adminkaru', '1bd2dbee5a94d8e1850a5eb83d72d9d2', 'Admin Karu', 'Karu', 'WH_FARMA'),
('2d9f4faceeee407c8c27', 'adminperencana', '2aea7d6221613a19818594ea15b81b77', 'Admin Perencana', 'Perencana', 'TU'),
('34e123e12598496e8f91', 'admin_it', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'Tes Admin', 'Admin', 'IT'),
('3c10a96684d94e11ac39', 'alifia', '81dc9bdb52d04dc20036dbd8313ed055', 'alifia', 'Pengusul', 'IT'),
('44d363d0b2044708b813', 'penerima1', '04042b54d33609b8730132801a4792f1', 'Tes Penerima', 'Karu', 'TU'),
('6a320de38ed245b880f4', 'perencana', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'coba', 'Perencana', 'TU'),
('6ad5c5a6baa74a05a216', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tes Admin IT', 'Admin', 'IT'),
('78e6ba3f91f24305a065', 'pengusul1', 'b51a540a50ff423ea4ca8d277b33d61b', 'Tes Pengusul', 'Pengusul', 'WH_FARMA'),
('bdac6a1ad28d464fb82b', 'adminkasubag', '31b8c943aab6287440162172e591c89f', 'Admin Kasubag', 'Kasubag', 'IT'),
('c0db254b7a564f638463', 'kasubag', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'kasubag', 'Kasubag', 'KEUANGAN'),
('c3a9397b32084249927a', 'lalala', '412a1ed6d21e55191ee5131f266f5178', 'lalala', 'Pengusul', 'IGD'),
('ed15ffcc26694a539cdc', 'asdasd', '130811dbd239c97bd9ce933de7349f20', 'sadas', 'Pengusul', 'GIZI'),
('f32039aea4514af6b3e9', 'karu', 'f3685741425eca64ab27094e3420034c', 'tes karu', 'Karu', 'HCU');

-- --------------------------------------------------------

--
-- Table structure for table `detail_belanja`
--

CREATE TABLE `detail_belanja` (
  `id_detail` int(11) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `butuh_rincian` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) DEFAULT NULL,
  `tampil_rekening` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_belanja`
--

INSERT INTO `detail_belanja` (`id_detail`, `kode_rekening`, `uraian`, `butuh_rincian`, `parent`, `tampil_rekening`) VALUES
(8, '5.1', 'Belanja Operasi', 0, NULL, 1),
(9, '5.1.01', 'Belanja Pegawai', 0, 8, 1),
(10, '5.1.01.03', 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN', 0, 9, 1),
(14, '5.1.01.03.07', 'Belanja Honorarium', 0, 10, 0),
(15, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 1, 14, 0),
(16, '5.1.01.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 1, 14, 0),
(17, '5.1.02', 'Belanja Barang dan Jasa', 0, 8, 0),
(22, '5.1.02.01', 'Belanja Barang', 0, 17, 0),
(23, '5.1.02.01.01', 'Belanja Barang Pakai Habis', 0, 22, 0),
(25, '5.1.02.01.01.0002', 'Belanja Bahan-Bahan Kimia', 1, 23, 0),
(28, '5.1.02.01.01.0005', 'Belanja Bahan-Bahan Baku', 1, 23, 0),
(29, '5.1.02.01.01.0008', 'Belanja Bahan-Bahan/Bibit Tanaman', 1, 23, 0),
(30, '5.1.02.01.01.0010', 'Belanja Bahan-Isi Tabung Gas', 1, 23, 0),
(31, '5.1.02.01.01.0012', 'Belanja Bahan-Bahan Lainnya', 1, 23, 0),
(32, '5.1.02.01.01.0030', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perabot Kantor', 1, 23, 0),
(33, '5.1.02.01.01.0031', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Listrik', 1, 23, 0),
(34, '5.1.02.01.01.0036', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat/Bahan untuk Kegiatan Kantor Lainnya', 1, 23, 0),
(35, '5.1.02.01.01.0037', 'Belanja Obat-Obatan-Obat', 1, 23, 0),
(36, '5.1.02.01.01.0040', 'Belanja Persediaan untuk Dijual/Diserahkan-Persediaan untuk Dijual/Diserahkan Lainnya', 1, 23, 0),
(37, '5.1.02.01.01.0043', 'Belanja Natura dan Pakan-Natura', 1, 23, 0),
(38, '5.1.02.02', 'Belanja Jasa', 0, 17, 0),
(39, '5.1.02.02.01', 'Belanja Jasa Kantor', 0, 38, 0),
(40, '5.1.02.02.01.0052', 'Belanja Jasa Pembersihan, Pengendalian Hama, dan Fumigasi', 1, 39, 0),
(41, '5.1.02.02.04', 'Belanja Sewa Peralatan dan Mesin', 0, 38, 0),
(42, '5.1.02.02.04.0211', 'Belanja Sewa Alat Kedokteran Bagian Penyakit Dalam', 1, 41, 0),
(43, '5.1.02.02.04.0226', 'Belanja Sewa Alat Kedokteran Bedah Ortopedi', 1, 41, 0),
(44, '5.1.02.02.08', 'Belanja Jasa Konsultansi Konstruksi', 0, 38, 0),
(45, '5.1.02.02.08.0019', 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi\r\nBangunan Gedung', 1, 44, 0),
(46, '5.1.02.03', 'Belanja Pemeliharaan', 0, 17, 0),
(47, '5.1.02.03.02', 'Belanja Pemeliharaan Peralatan dan Mesin', 0, 46, 0),
(48, '5.1.02.03.02.0117 ', 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga-Alat Kantor-Alat Kantor Lainnya', 1, 47, 0),
(49, '5.1.02.03.02.0204', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kedokteran-Alat Kedokteran\r\nUmum', 1, 47, 0),
(50, '5.1.02.03.02.0205', 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan-Alat Kedokteran-Alat Kedokteran\r\nGigi', 1, 47, 0),
(51, '5.1.02.03.02.0409', 'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Personal Computer', 1, 47, 0),
(52, '5.1.02.03.03', 'Belanja Pemeliharaan Gedung dan Bangunan', 0, 46, 0),
(53, '5.1.02.03.03.0001', 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan\r\nGedung Kantor', 1, 52, 0),
(54, '5.2', 'Belanja Modal', 0, 0, 0),
(55, '5.2.02', 'Belanja Modal Peralatan dan Mesin', 0, 54, 0),
(56, '5.2.02.02', 'Belanja Modal Alat Angkutan', 0, 55, 0),
(57, '5.2.02.02.01', 'Belanja Modal Alat Angkutan Darat Bermotor', 0, 56, 0),
(58, '5.2.02.02.01.0006 ', 'Belanja Modal Kendaraan Bermotor Khusus', 1, 57, 0),
(59, '5.2.02.05', 'Belanja Modal Alat Kantor dan Rumah Tangga', 0, 55, 0),
(60, '5.2.02.05.02', 'Belanja Modal Alat Rumah Tangga', 0, 59, 0),
(61, '5.2.02.05.02.0005', 'Belanja Modal Alat Dapur', 1, 60, 0),
(62, '5.2.02.07', 'Belanja Modal Alat Kedokteran dan Kesehatan', 0, 55, 0),
(63, '5.2.02.07.01', 'Belanja Modal Alat Kedokteran', 0, 62, 0),
(64, '5.2.02.07.01.0001', 'Belanja Modal Alat Kedokteran Umum', 1, 63, 0),
(65, '5.2.03', 'Belanja Modal Gedung dan Bangunan', 0, 54, 0),
(66, '5.2.03.01', 'Belanja Modal Bangunan Gedung', 0, 65, 0),
(67, '5.2.03.01.01', 'Belanja Modal Bangunan Gedung Tempat Kerja', 0, 66, 0),
(68, '5.2.03.01.01.0001', 'Belanja Modal Bangunan Gedung Kantor', 1, 67, 0),
(69, '5.1.01.03.08', 'Belanja Jasa Pengelolaan BMD', 0, 10, 0),
(70, '5.1.01.03.08.0002 ', 'Belanja Jasa Pengelolaan BMD yang Tidak Menghasilkan Pendapatan', 1, 69, 0),
(71, '5.1.02.01.01.0004', 'Belanja Bahan-Bahan Bakar dan Pelumas', 1, 23, 0),
(72, '5.1.02.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor', 1, 23, 0),
(73, '5.1.02.01.01.0025', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Kertas dan Cover', 1, 23, 0),
(74, '5.1.02.01.01.0026', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Bahan Cetak', 1, 23, 0),
(75, '5.1.02.01.01.0027', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Benda Pos', 1, 23, 0),
(76, '5.1.02.01.01.0029', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Komputer', 1, 23, 0),
(78, '5.1.02.01.01.0032 ', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perlengkapan Dinas', 1, 23, 0),
(79, '5.1.02.01.01.0035', 'Belanja Alat/Bahan untuk Kegiatan Kantor- Suvenir/Cendera Mata', 1, 23, 0),
(80, '5.1.02.01.01.0052', 'Belanja Makanan dan Minuman Rapat', 1, 23, 0),
(81, '5.1.02.01.01.0053', 'Belanja Makanan dan Minuman Jamuan Tamu', 1, 23, 0),
(82, '5.1.02.02.01.0003', 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara, dan Panitia', 1, 39, 0),
(83, '5.1.02.02.01.0007', 'Honorarium Rohaniwan', 1, 39, 0),
(84, '5.1.02.02.01.0014', 'Belanja Jasa Tenaga Kesehatan', 1, 39, 0),
(85, '5.1.02.02.01.0029', 'Belanja Jasa Tenaga Ahli', 1, 39, 0),
(86, '5.1.02.02.01.0030', 'Belanja Jasa Tenaga Kebersihan', 1, 39, 0),
(87, '5.1.02.02.01.0031', 'Belanja Jasa Tenaga Keamanan', 1, 39, 0),
(88, '5.1.02.02.01.0055', 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', 1, 39, 0),
(89, '5.1.02.02.01.0059', 'Belanja Tagihan Telepon', 1, 39, 0),
(90, '5.1.02.02.01.0060 ', 'Belanja Tagihan Air', 1, 39, 0),
(91, '5.1.02.02.01.0061', 'Belanja Tagihan Listrik', 1, 39, 0),
(92, '5.1.02.02.01.0063', 'Belanja Kawat/Faksimili/Internet/TV Berlangganan', 1, 39, 0),
(93, '5.1.02.02.01.0067', 'Belanja Pembayaran Pajak, Bea, dan Perizinan', 1, 39, 0),
(94, '5.1.02.02.02', 'Belanja Iuran Jaminan/Asuransi', 0, 38, 0),
(95, '5.1.02.02.02.0005', 'Belanja Iuran Jaminan Kesehatan bagi Non ASN', 1, 94, 0),
(96, '5.1.02.02.02.0008', 'Belanja Asuransi Barang Milik Daerah', 1, 94, 0),
(97, '5.1.02.02.12', 'Belanja Kursus/Pelatihan, Sosialisasi, Bimbingan Teknis serta Pendidikan dan Pelatihan', 0, 38, 0),
(98, '5.1.02.02.12.0003', 'Belanja Bimbingan Teknis', 1, 97, 0),
(99, '5.1.02.03.02.0035', 'Belanja Pemeliharaan Alat Angkutan-Alat Angkutan Darat Bermotor-Kendaraan Dinas\r\nBermotor Perorangan', 1, 47, 0),
(100, '5.1.02.03.05', 'Belanja Pemeliharaan Aset Tetap Lainnya', 0, 46, 0),
(101, '5.1.02.03.05.0057', 'Belanja Pemeliharaan Tanaman-Tanaman-Tanaman', 1, 100, 0),
(102, '5.1.02.04', 'Belanja Perjalanan Dinas', 0, 17, 0),
(103, '5.1.02.04.01', 'Belanja Perjalanan Dinas Dalam Negeri', 0, 102, 0),
(104, '5.1.02.04.01.0002', 'Belanja Perjalanan Dinas Tetap', 1, 103, 0),
(105, '5.1.02.04.01.0003', ' Belanja Perjalanan Dinas Dalam Kota', 1, 103, 0),
(106, '5.1.02.05', 'Belanja Uang dan/atau Jasa untuk Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 0, 17, 0),
(107, '5.1.02.05.01', 'Belanja Uang yang Diberikan kepada Pihak Ketiga/Pihak Lain/Masyarakat', 0, 106, 0),
(108, '5.1.02.05.01.0002', 'Belanja Penghargaan atas Suatu Prestasi', 1, 107, 0),
(109, '5.2.02.05.02.0004', 'Belanja Modal Alat Pendingin', 1, 60, 0),
(110, '5.2.02.05.02.0006', 'Belanja Modal Alat Rumah Tangga Lainnya (Home Use)', 1, 60, 0),
(111, '5.2.02.05.03', 'Belanja Modal Meja dan Kursi Kerja/Rapat Pejabat', 0, 59, 0),
(112, '5.2.02.05.03.0001', 'Belanja Modal Meja Kerja Pejabat', 1, 111, 0),
(113, '5.2.02.05.03.0003', 'Belanja Modal Kursi Kerja Pejabat', 1, 111, 0),
(114, '5.2.02.05.03.0007', 'Belanja Modal Lemari dan Arsip Pejabat', 1, 111, 0),
(115, '5.2.02.06', 'Belanja Modal Alat Studio, Komunikasi, dan Pemancar', 0, 55, 0),
(116, '5.2.02.06.02', 'Belanja Modal Alat Komunikasi', 0, 115, 0),
(117, '5.2.02.06.02.0001', 'Belanja Modal Alat Komunikasi Telephone', 1, 116, 0),
(118, '5.2.02.07.01.0004 ', 'Belanja Modal Alat Kedokteran Bedah', 1, 63, 0),
(119, '5.2.02.07.01.0023', 'Belanja Modal Alat Kedokteran Bedah Ortopedi', 1, 63, 0),
(120, '5.2.02.10', 'Belanja Modal Komputer', 0, 55, 0),
(121, '5.2.02.10.01', 'Belanja Modal Komputer Unit', 0, 120, 0),
(122, '5.2.02.10.01.0002', 'Belanja Modal Personal Computer', 1, 121, 0),
(123, '5.2.02.10.01.0003', 'Belanja Modal Komputer Unit Lainnya', 1, 121, 0),
(124, '5.1.01.99', 'Belanja Pegawai BLUD', 0, 9, 0),
(125, '5.1.01.99.99 ', 'Belanja Pegawai BLUD', 0, 124, 0),
(126, '5.1.01.99.99.9999', 'Belanja Pegawai BLUD', 1, 125, 0),
(127, '5.1.02.99', 'Belanja Barang dan Jasa BLUD', 0, 17, 0),
(128, '5.1.02.99.99', 'Belanja Barang dan Jasa BLUD', 0, 127, 0),
(129, '5.1.02.99.99.9999', 'Belanja Barang dan Jasa BLUD', 1, 128, 0),
(130, '5.1.02.02.05', 'Belanja Sewa Gedung dan Bangunan', 0, 38, 0),
(131, '5.1.02.02.05.0009 ', 'Belanja Sewa Bangunan Gedung Tempat Pertemuan', 1, 130, 0),
(132, '5.2.02.07.01.0002 ', 'Belanja Modal Alat Kedokteran Gigi', 1, 63, 0),
(133, '5.2.02.07.01.0005', 'Belanja Modal Alat Kesehatan Kebidanan dan Penyakit Kandungan', 1, 63, 0),
(134, '5.2.02.07.01.0010 ', 'Belanja Modal Alat Kedokteran Anak', 1, 63, 0),
(135, '5.2.02.07.01.0012', 'Belanja Modal Alat Kesehatan Rehabilitasi Medis', 1, 63, 0),
(136, '5.1.01.03.06', 'Belanja Jasa Pelayanan Kesehatan bagi ASN', 0, 10, 0),
(137, '5.1.01.03.06.0001', 'Belanja Jasa Pelayanan Kesehatan\r\nbagi ASN', 1, 136, 0),
(138, '5.1.02.02.01.0016', 'Belanja Jasa Tenaga Penanganan\r\nPrasarana dan Sarana Umum', 1, 39, 0),
(139, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 1, 39, 0),
(140, '5.1.02.02.01.0028', 'Belanja Jasa Tenaga Pelayanan\r\nUmum', 1, 39, 0),
(141, '5.1.02.02.01.0033', 'Belanja Jasa Tenaga Supir', 1, 39, 0),
(142, '5.1.02.02.01.0034', 'Belanja Jasa Tenaga Juru Masak', 1, 39, 0),
(143, '5.1.02.02.01.0039', 'Belanja Jasa Tenaga Informasi dan\r\nTeknologi', 1, 39, 0),
(144, '5.1.01.03.07.0003', 'Belanja Honorarium Perangkat Unit Kerja Pengadaan Barang dan Jasa (UKPBJ)', 1, 14, 0),
(145, '5.1.01.01', 'Belanja Gaji dan Tunjangan ASN', 0, 9, 0),
(146, '5.1.01.01.01', 'Belanja Gaji Pokok ASN', 0, 145, 0),
(147, '5.1.01.01.01.0001', 'Belanja Gaji Pokok PNS', 1, 146, 0),
(148, '5.1.01.01.01.0002', 'Belanja Gaji Pokok PPPK', 1, 146, 0),
(151, '5.1.01.01.02', 'Belanja Tunjangan Keluarga ASN', 0, 145, 0),
(152, '5.1.01.01.02.0001', 'Belanja Tunjangan Keluarga PNS', 1, 151, 0),
(153, '5.1.01.01.02.0002', 'Belanja Tunjangan Keluarga PPPK', 1, 151, 0);

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
(384, 26, 147, 0),
(385, 28, 147, 0),
(386, 26, 148, 0);

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
  `status` enum('aktif','nonakitf','','') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_usulan`
--

INSERT INTO `item_usulan` (`id_usulan`, `nama_usulan`, `spesifikasi`, `satuan`, `harga_satuan`, `kode_rekening`, `status`) VALUES
(1, 'tes1', 'asd123', 'pcs', 20000, '5.1.01.01.01.0001', 'aktif'),
(2, 'tes2', 'asd1234', 'box', 50000, '5.1.01.01.01.0001', 'aktif'),
(3, 'tes3', 'zxcv1234', 'unit', 2000000, '5.1.01.01.01.0002', 'aktif'),
(4, 'tes4', 'dfas213', 'roll', 150000, '5.1.01.01.01.0002', 'aktif');

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
(180, 28, 8),
(181, 28, 9),
(182, 28, 10),
(183, 28, 148),
(184, 28, 145),
(185, 28, 147),
(186, 26, 8),
(187, 26, 9),
(188, 26, 10),
(189, 26, 146),
(190, 26, 145),
(191, 26, 148),
(192, 26, 147),
(193, 40, 8),
(194, 40, 9),
(195, 40, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `id_rincian` int(11) NOT NULL,
  `id_dpa_detail` int(11) DEFAULT NULL,
  `id_usulan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `koefisien` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `PPN` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_rekening` varchar(255) NOT NULL,
  `unit_pengusul` varchar(20) NOT NULL,
  `tgl_diusulkan` date NOT NULL DEFAULT current_timestamp(),
  `status_usulan` enum('Diusulkan','Ditolak','Diterima','') NOT NULL DEFAULT 'Diusulkan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id_rincian`, `id_dpa_detail`, `id_usulan`, `keterangan`, `koefisien`, `satuan`, `harga`, `PPN`, `jumlah`, `kode_rekening`, `unit_pengusul`, `tgl_diusulkan`, `status_usulan`) VALUES
(444, 384, 2, 'tes2<br />spesifikasi: asd1234', '2', 'box', 50000, 0, 100000, '5.1.01.01.01.0001', 'WH_FARMA', '2021-06-06', 'Diusulkan'),
(445, 386, 3, 'tes3<br />spesifikasi: zxcv1234', '2', 'unit', 2000000, 0, 4000000, '5.1.01.01.01.0002', 'WH_FARMA', '2021-06-06', 'Diusulkan'),
(446, NULL, 4, 'tes4<br />spesifikasi: dfas213', '2', 'roll', 150000, 0, 300000, '5.1.01.01.01.0002', 'WH_FARMA', '2021-06-06', 'Diusulkan'),
(447, 385, 1, 'tes1<br />spesifikasi: asd123', '2', 'pcs', 20000, 0, 40000, '5.1.01.01.01.0001', 'IGD', '2021-06-06', 'Diusulkan'),
(448, NULL, 2, 'tes2<br />spesifikasi: asd1234', '2', 'box', 50000, 0, 100000, '5.1.01.01.01.0001', 'IGD', '2021-06-06', 'Diusulkan'),
(449, NULL, 3, 'tes3<br />spesifikasi: zxcv1234', '2', 'unit', 2000000, 0, 4000000, '5.1.01.01.01.0002', 'IGD', '2021-06-06', 'Diusulkan'),
(450, NULL, 4, 'tes4<br />spesifikasi: dfas213', '2', 'roll', 150000, 0, 300000, '5.1.01.01.01.0002', 'IGD', '2021-06-06', 'Diusulkan');

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
  `alokasi_tahun2021` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `status_karu` int(11) NOT NULL,
  `status_karu_dpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_belanja`
--

INSERT INTO `sk_belanja` (`id`, `tanggal_sk`, `program`, `kegiatan`, `subkegiatan`, `indikator`, `target`, `alokasi_tahun2021`, `status`, `status_karu`, `status_karu_dpa`) VALUES
(26, '2021-02-22', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penerbitan Izin Rumah Sakit kelas C,D dan Fasilitas Pelayanan Kesehatan tingkat Daerah Kabupaten atau kota', 'Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota', 'Presentase Unit Pelayanan Kesehatan Yang Memenuhi SPM', 100, 4100000, 'RKA', 1, 1),
(27, '2021-11-09', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Layanan Kesehatan Untuk UKM dan UKP Rujukan Tingkat Daerah Kabupaten /Kota (RSUD)', 'Operasional Pelayanan RSUD', '9', 9, 0, 'RKA', 0, 0),
(28, '2021-02-14', 'Program Pemenuhan Upaya Kesehatan Perorangan dan Upaya Kesehatan Masyarakat', 'Penyedia Fasilitas Pelayanan Kesehatan untuk UKM dan UKP Kewenangan Daerah Kabupaten /Kota (RSUD)', 'Pengadaan Prasarana dan Pendukung Fasilitas Pelayanan Kesehatan(RSUD)', 'dfgfhb', 10, 0, 'RKA', 0, 0),
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
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `dpa_detail`
--
ALTER TABLE `dpa_detail`
  MODIFY `id_dpa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `item_usulan`
--
ALTER TABLE `item_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `sk_belanja`
--
ALTER TABLE `sk_belanja`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
