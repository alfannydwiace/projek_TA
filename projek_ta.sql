-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2022 at 09:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_nama` varchar(255) NOT NULL,
  `agenda_foto` varchar(255) NOT NULL,
  `agenda_tempat` varchar(255) NOT NULL,
  `agenda_tanggal` date NOT NULL,
  `agenda_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `agenda_nama`, `agenda_foto`, `agenda_tempat`, `agenda_tanggal`, `agenda_deskripsi`) VALUES
(1, 'Rapat rakernas 2020/2020', 'Screen_Shot_2022-04-24_at_00_23_14.png', 'Laboratorium', '2021-02-17', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n'),
(2, 'Pemeriksaan Hewan Rutin', 'Screen_Shot_2022-04-24_at_00_23_06.png', 'RSU Zainal Abidin', '2022-04-24', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n'),
(3, 'ibab', 'lppm_untag.jpg', 'chtfjh', '2022-06-24', '<p>hgflhlkhj</p>\r\n'),
(4, 'rapat kerja', 'pemkab_bjn.jpg', 'Kab Bojonegoro', '2022-06-28', '<p>hjfkjgj</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_pengirim` int(11) NOT NULL,
  `chat_pengirim_jenis` varchar(255) NOT NULL,
  `chat_penerima` int(11) NOT NULL,
  `chat_penerima_jenis` varchar(255) NOT NULL,
  `chat_isi` text NOT NULL,
  `chat_waktu` datetime NOT NULL,
  `chat_status` int(11) NOT NULL COMMENT '0 = belum dibaca, 1 = dibaca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_pengirim`, `chat_pengirim_jenis`, `chat_penerima`, `chat_penerima_jenis`, `chat_isi`, `chat_waktu`, `chat_status`) VALUES
(1, 4, 'pelanggan', 9, 'dokter', 'halo', '2022-07-03 14:17:27', 1),
(2, 4, 'pelanggan', 9, 'dokter', 'selamat ssiang dokter', '2022-07-03 14:17:42', 1),
(3, 4, 'pelanggan', 9, 'dokter', 'saya mau konsultasi', '2022-07-03 14:17:48', 1),
(4, 4, 'pelanggan', 9, 'dokter', 'terima kasih', '2022-07-03 14:36:04', 1),
(5, 4, 'pelanggan', 9, 'dokter', 'aadsasd', '2022-07-03 14:36:20', 1),
(6, 4, 'pelanggan', 9, 'dokter', 'balas dong dok', '2022-07-03 14:36:26', 1),
(7, 9, 'dokter', 4, 'pelanggan', 'maaf telat balas', '2022-07-20 00:00:00', 1),
(8, 4, 'pelanggan', 9, 'dokter', 'ooke dok', '2022-07-03 14:56:37', 1),
(9, 9, 'dokter', 4, 'pelanggan', 'baik', '2022-07-03 16:02:50', 1),
(10, 9, 'dokter', 4, 'pelanggan', 'mau koonsultasi apa?', '2022-07-03 16:04:00', 1),
(11, 9, 'dokter', 4, 'pelanggan', 'silahkan', '2022-07-03 16:04:22', 1),
(12, 4, 'pelanggan', 9, 'dokter', 'tes', '2022-07-03 16:26:41', 1),
(13, 4, 'pelanggan', 9, 'dokter', 'tes', '2022-07-03 16:36:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` int(11) NOT NULL,
  `dokter_nama` varchar(255) NOT NULL,
  `dokter_email` varchar(255) NOT NULL,
  `dokter_telp` varchar(255) NOT NULL,
  `dokter_alamat` text NOT NULL,
  `dokter_password` varchar(255) NOT NULL,
  `dokter_deskripsi` text NOT NULL,
  `dokter_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `dokter_nama`, `dokter_email`, `dokter_telp`, `dokter_alamat`, `dokter_password`, `dokter_deskripsi`, `dokter_foto`) VALUES
(5, 'Rahmana Putri', '', '', '', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '933526876.png'),
(6, 'DR. Tono Adiya', 'dokter1@gmail.com', '1234567', 'Kepohbaru', '', 'Spesialis edel edel', '271438375.png'),
(7, 'ibab', '', '', '', '', 'sakdhgkasjgdk', '1918196601.png'),
(8, 'ibabi', 'ibabi@gmail.com', '0087875658757', 'sjkadgjasgdlhaskldhlashdl', '287d0f9ea177b50845439feba1202e25', 'hgsdakjasgdkagskd', '135342390.png'),
(9, 'Dr. Mahfud Ali', 'dokter1@gmail.com', '1234567', 'Kecamatan Kepohbaru', '5db479bc6453dea4e990cadafd5cede8', 'spesialis edel edel', '1777445109.png');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL,
  `foto_tanggal` date NOT NULL,
  `foto_nama` varchar(200) NOT NULL,
  `foto_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`foto_id`, `foto_tanggal`, `foto_nama`, `foto_link`) VALUES
(5, '2021-02-15', 'DINAS PETERNAKAN DAN PERIKANAN KAB. BOJONEGORO', 'Screen_Shot_2022-04-26_at_16_54_06.png'),
(10, '2022-04-24', 'Budidaya Udang Vanamei', 'Screen_Shot_2022-04-26_at_16_54_23.png'),
(11, '2022-04-24', 'Pembiayaan Tambah Warga', 'Screen_Shot_2022-04-26_at_16_55_41.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Daging'),
(2, 'Obat'),
(3, 'Ikan Tawar'),
(4, 'Ikan Asin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(255) NOT NULL,
  `pelanggan_email` varchar(255) NOT NULL,
  `pelanggan_telp` varchar(255) NOT NULL,
  `pelanggan_pekerjaan` varchar(255) NOT NULL,
  `pelanggan_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_email`, `pelanggan_telp`, `pelanggan_pekerjaan`, `pelanggan_password`) VALUES
(1, 'Adipisicing proident', 'fuzycywy@mailinator.com', '1', 'Et sed sed voluptate', 'c9e54ff4e8d2501a38b40fe2fead106c'),
(2, 'Jono Akbar', 'jono@gmail.com', '082232323', 'mahasiswa', '42867493d4d4874f331d288df0044baa'),
(4, 'pelanggan1', 'pelanggan1@gmail.com', '9878', 'cuk', 'a7e641687aff292a9b49a5c37d1da51c');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `pengajuan_id` int(11) NOT NULL,
  `pengajuan_tgl` date NOT NULL,
  `pengajuan_pelanggan` int(11) NOT NULL,
  `pengajuan_nama` varchar(255) NOT NULL,
  `pengajuan_email` varchar(255) NOT NULL,
  `pengajuan_telp` varchar(255) NOT NULL,
  `pengajuan_produk` varchar(255) NOT NULL,
  `pengajuan_lab` date NOT NULL,
  `pengajuan_proposal` varchar(255) NOT NULL,
  `pengajuan_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`pengajuan_id`, `pengajuan_tgl`, `pengajuan_pelanggan`, `pengajuan_nama`, `pengajuan_email`, `pengajuan_telp`, `pengajuan_produk`, `pengajuan_lab`, `pengajuan_proposal`, `pengajuan_status`) VALUES
(1, '2022-04-25', 2, 'Nisi assumenda provi', 'fefotu@mailinator.com', '28', 'In sunt amet dolore', '2022-04-25', 'HOME(1)3.docx', 'diverifikasi'),
(2, '2022-06-13', 4, 'Moch Alfani Dwi Aldi Cahyono', 'frangkyfanny27@gmail.com', '0987654321', 'kmkk', '2022-06-29', 'observation-form.pdf', 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twitter` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL,
  `link_github` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`nama`, `deskripsi`, `logo`, `link_facebook`, `link_twitter`, `link_instagram`, `link_github`) VALUES
('SI Peternakan Bojonegoro', 'Dinas Peternakan dan Perikanan KAB. Bojonegoro', 'logo2.png', 'https://www.facebook.com/public/Disnakkan-Bojonegoro', 'https://twitter.com/disnakkan_bjn', 'https://www.instagram.com/disnakkan.bojonegoro/', 'https://www.youtube.com/user/disnakkanbjn'),
('SI Peternakan Bojonegoro', 'Dinas Peternakan dan Perikanan KAB. Bojonegoro', 'logo2.png', 'https://www.facebook.com/public/Disnakkan-Bojonegoro', 'https://twitter.com/disnakkan_bjn', 'https://www.instagram.com/disnakkan.bojonegoro/', 'https://www.youtube.com/user/disnakkanbjn');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`) VALUES
(1, 'frangky', 'frangky@gmail.com', 'admin', '7488e331b8b64e5794da3fa4eb10ad5d');

-- --------------------------------------------------------

--
-- Table structure for table `peternak`
--

CREATE TABLE `peternak` (
  `peternak_id` int(11) NOT NULL,
  `peternak_nama` varchar(255) NOT NULL,
  `peternak_email` varchar(255) NOT NULL,
  `peternak_telp` varchar(255) NOT NULL,
  `peternak_alamat` text NOT NULL,
  `peternak_password` varchar(255) NOT NULL,
  `peternak_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peternak`
--

INSERT INTO `peternak` (`peternak_id`, `peternak_nama`, `peternak_email`, `peternak_telp`, `peternak_alamat`, `peternak_password`, `peternak_foto`) VALUES
(2, 'Sumanto Jaya', 'peternak1@gmail.com', '092929222', 'Jl. Amanah no.12', '35ad806410033063a5debdf5a82ca8d0', '2080519522.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_kategori` int(11) NOT NULL,
  `produk_peternak` int(11) NOT NULL,
  `produk_dokter` int(11) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_harga` varchar(255) NOT NULL,
  `produk_link` varchar(255) NOT NULL,
  `produk_foto` varchar(255) NOT NULL,
  `produk_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_kategori`, `produk_peternak`, `produk_dokter`, `produk_deskripsi`, `produk_harga`, `produk_link`, `produk_foto`, `produk_status`) VALUES
(4, 'Daging Sapi Segar', 1, 2, 2, '<p>Beli daging sapi segar bla bla bla</p>\r\n', '200000', 'https://shopee.co.id/flash_sale?fromItem=7530499610&promotionId=2043403120', 'Screen_Shot_2022-04-26_at_15_11_10.png', 'diverifikasi'),
(5, 'Daging Rusa Enak', 1, 2, 2, '<p>Penjelasan nya di sini</p>\r\n', '150000', 'https://shopee.co.id/flash_sale?fromItem=7530499610&promotionId=2043403120', 'Screen_Shot_2022-04-26_at_15_10_53.png', 'diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_text1` varchar(255) NOT NULL,
  `slider_text2` varchar(255) NOT NULL,
  `slider_gambar` varchar(255) NOT NULL,
  `slider_tombol_text1` varchar(255) NOT NULL,
  `slider_tombol_link1` varchar(255) NOT NULL,
  `slider_tombol_text2` varchar(255) NOT NULL,
  `slider_tombol_link2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_text1`, `slider_text2`, `slider_gambar`, `slider_tombol_text1`, `slider_tombol_link1`, `slider_tombol_text2`, `slider_tombol_link2`) VALUES
(2, 'SELAMAT DATANG DI', 'DINAS PETERNAKAN DAN PERIKANAN KAB. BOJONEGORO', 'slider11.jpg', 'Agenda', 'http://localhost/project_peternak/welcome/agenda', '', ''),
(3, 'Peternak Binaan', 'BELI DAGING SEGAR LANGSUNG DARI PETERNAK BINAAN', 'slider31.jpg', 'Dokter', 'http://localhost/project_peternak/welcome/dokter', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `unduh`
--

CREATE TABLE `unduh` (
  `unduh_id` int(11) NOT NULL,
  `unduh_nama` varchar(255) NOT NULL,
  `unduh_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unduh`
--

INSERT INTO `unduh` (`unduh_id`, `unduh_nama`, `unduh_link`) VALUES
(2, 'Panduan Upload Pengajuan Permohonan Peternak Binaan', 'desain_proposal.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `warna_header` varchar(255) NOT NULL,
  `warna_header_text` varchar(255) NOT NULL,
  `warna_footer1` varchar(255) NOT NULL,
  `warna_footer2` varchar(255) NOT NULL,
  `warna_footer_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`warna_header`, `warna_header_text`, `warna_footer1`, `warna_footer2`, `warna_footer_text`) VALUES
('#ffffff', '#444444', '#f9f9f9', '#f1f1f1', '#444444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`foto_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `peternak`
--
ALTER TABLE `peternak`
  ADD PRIMARY KEY (`peternak_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `unduh`
--
ALTER TABLE `unduh`
  ADD PRIMARY KEY (`unduh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `dokter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peternak`
--
ALTER TABLE `peternak`
  MODIFY `peternak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unduh`
--
ALTER TABLE `unduh`
  MODIFY `unduh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
