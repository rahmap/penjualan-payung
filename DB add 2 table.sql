-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2020 pada 17.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`admin_id`, `email_admin`, `nama_admin`, `password_admin`) VALUES
(1, 'payung@gmail.com', 'Admin Toko', '$2y$10$PgeX2JUK7nfRUnxrtxhiLuZd1asSb9/9Alzi41f8TGj.dp6ek1Sme');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `stok_barang_masuk` int(10) DEFAULT NULL,
  `tanggal_barang_masuk` varchar(20) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `stok_barang_masuk`, `tanggal_barang_masuk`, `fk_product`) VALUES
(13, 1, '2020/08/06', 15),
(14, 1, '2020/08/06', 17),
(15, 3, '2020/08/06', 15),
(16, 5, '2020/08/06', 16),
(17, 2, '2020/08/06', 27),
(18, 2, '2020/08/06', 17),
(19, 7, '2020/08/07', 24),
(20, 2, '2020/08/07', 15),
(21, 3, '2020/08/07', 27),
(22, 60, '2020/08/07', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_stok`
--

CREATE TABLE `log_stok` (
  `log_stok_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tanggal_log` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_stok`
--

INSERT INTO `log_stok` (`log_stok_id`, `nama_barang`, `stok_barang`, `tanggal_log`) VALUES
(13, 'Payung Anak', 40, '2020/08/06'),
(14, 'Payung Golf', 56, '2020/08/06'),
(15, 'Payung Lipat', 52, '2020/08/06'),
(16, 'Payung Model 1 Warna', 47, '2020/08/06'),
(17, 'Payung Pantai', 34, '2020/08/06'),
(18, 'Payung Standar', 99, '2020/08/06'),
(19, 'Payung Motif', 22, '2020/08/06'),
(20, 'Payung Revisi', 97, '2020/08/06'),
(21, 'Payung Super KW', 90, '2020/08/06'),
(22, 'Payung Payungan', 39, '2020/08/06'),
(23, 'Payung PUBG', 63, '2020/08/06'),
(24, 'Payung Teduh', 80, '2020/08/06'),
(25, 'Payung Anak', 40, '2020/08/07'),
(26, 'Payung Golf', 56, '2020/08/07'),
(27, 'Payung Lipat', 52, '2020/08/07'),
(28, 'Payung Model 1 Warna', 47, '2020/08/07'),
(29, 'Payung Pantai', 34, '2020/08/07'),
(30, 'Payung Standar', 99, '2020/08/07'),
(31, 'Payung Motif', 22, '2020/08/07'),
(32, 'Payung Revisi', 97, '2020/08/07'),
(33, 'Payung Super KW', 90, '2020/08/07'),
(34, 'Payung Payungan', 39, '2020/08/07'),
(35, 'Payung PUBG', 63, '2020/08/07'),
(36, 'Payung Teduh', 80, '2020/08/07'),
(37, 'Payung Anak', 40, '2020/08/08'),
(38, 'Payung Golf', 56, '2020/08/08'),
(39, 'Payung Lipat', 52, '2020/08/08'),
(40, 'Payung Model 1 Warna', 47, '2020/08/08'),
(41, 'Payung Pantai', 34, '2020/08/08'),
(42, 'Payung Standar', 99, '2020/08/08'),
(43, 'Payung Motif', 22, '2020/08/08'),
(44, 'Payung Revisi', 97, '2020/08/08'),
(45, 'Payung Super KW', 90, '2020/08/08'),
(46, 'Payung Payungan', 39, '2020/08/08'),
(47, 'Payung PUBG', 63, '2020/08/08'),
(48, 'Payung Teduh', 80, '2020/08/08'),
(49, 'Payung Anak', 40, '2020/08/09'),
(50, 'Payung Golf', 56, '2020/08/09'),
(51, 'Payung Lipat', 52, '2020/08/09'),
(52, 'Payung Model 1 Warna', 47, '2020/08/09'),
(53, 'Payung Pantai', 34, '2020/08/09'),
(54, 'Payung Standar', 99, '2020/08/09'),
(55, 'Payung Motif', 22, '2020/08/09'),
(56, 'Payung Revisi', 97, '2020/08/09'),
(57, 'Payung Super KW', 90, '2020/08/09'),
(58, 'Payung Payungan', 39, '2020/08/09'),
(59, 'Payung PUBG', 63, '2020/08/09'),
(60, 'Payung Teduh', 80, '2020/08/09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_products`
--

CREATE TABLE `orders_products` (
  `orders_products_id` int(11) NOT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `fk_pemesanan` int(11) DEFAULT NULL,
  `jumlah_pesan_produk` int(11) NOT NULL,
  `harga_produk_pemesanan` int(11) NOT NULL,
  `nama_produk_pemesanan` varchar(60) NOT NULL,
  `stok_sisa` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `nama_supplier_order` varchar(50) DEFAULT NULL,
  `tanggal_selesai` varchar(15) DEFAULT NULL,
  `kabupaten_pemesanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders_products`
--

INSERT INTO `orders_products` (`orders_products_id`, `fk_product`, `fk_pemesanan`, `jumlah_pesan_produk`, `harga_produk_pemesanan`, `nama_produk_pemesanan`, `stok_sisa`, `stok_awal`, `nama_supplier_order`, `tanggal_selesai`, `kabupaten_pemesanan`) VALUES
(73, 15, 54, 3, 70000, 'Payung Anak', 75, 78, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(74, 16, 54, 3, 80000, 'Payung Golf', 64, 67, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(75, 17, 54, 2, 50000, 'Payung Lipat', 55, 57, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(76, 15, 55, 4, 70000, 'Payung Anak', 71, 75, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(77, 16, 55, 2, 80000, 'Payung Golf', 62, 64, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(78, 19, 55, 3, 80000, 'Payung Pantai', 36, 39, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(79, 21, 55, 5, 80000, 'Payung Motif', 25, 30, 'Rahma Purnama', '21/07/2020', 'Klaten'),
(80, 16, 56, 2, 80000, 'Payung Golf', 60, 62, 'Rahma Purnama', '24/07/2020', 'Bantul'),
(81, 16, 57, 2, 80000, 'Payung Golf', 58, 60, 'Rahma Purnama', '24/07/2020', 'Sleman'),
(82, 16, 58, 3, 80000, 'Payung Golf', 55, 58, 'Rahma Purnama', '24/07/2020', 'Sleman'),
(83, 16, 60, 1, 80000, 'Payung Golf', 54, 55, 'Rahma Purnama', '24/07/2020', 'Mataram'),
(84, 15, 60, 4, 70000, 'Payung Anak', 67, 71, 'Rahma Purnama', '24/07/2020', 'Mataram'),
(90, 17, 63, 2, 50000, 'Payung Lipat', 53, 55, 'Pranadya', NULL, 'Mataram'),
(91, 16, 64, 3, 80000, 'Payung Golf', 51, 54, 'Pranadya', NULL, 'Mataram'),
(93, 17, 66, 1, 50000, 'Payung Lipat', 52, 53, 'Rahma Purnama', '03/08/2020', 'Sleman'),
(96, 27, 68, 2, 50000, 'Payung PUBG', 58, 60, 'Joko Siswa', '03/08/2020', 'Sleman'),
(97, 26, 68, 1, 80000, 'Payung Payungan', 39, 40, 'Joko Siswa', '03/08/2020', 'Sleman'),
(98, 28, 69, 10, 60000, 'Payung Teduh', 80, 90, 'Joko Siswa', '03/08/2020', 'Sleman'),
(99, 15, 70, 45, 70000, 'Payung Anak', 20, 65, 'Rahma Purnama', NULL, 'Rembang'),
(101, 17, 72, 3, 50000, 'Payung Lipat', 49, 52, 'Rahma Purnama', '04/08/2020', 'Klaten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `order_id` int(11) NOT NULL,
  `waktu_pesanan` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `harga_total` int(11) NOT NULL,
  `ongkir` varchar(15) NOT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `informasi_pesanan` varchar(50) NOT NULL,
  `status_pemesanan` varchar(50) NOT NULL,
  `order_unique_id` varchar(20) NOT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `kurir` varchar(10) DEFAULT NULL,
  `service` varchar(20) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`order_id`, `waktu_pesanan`, `bukti_pembayaran`, `alamat`, `harga_total`, `ongkir`, `metode_pembayaran`, `no_hp`, `informasi_pesanan`, `status_pemesanan`, `order_unique_id`, `estimasi`, `kurir`, `service`, `fk_user`, `fk_admin`) VALUES
(54, '1595279446', '1595279564_fd6a3d227eca499158f7.jpg', ' Klaten Timur', 550000, '8000', 'CASH', '089669413260', 'Sedang Dikirim. RESI : 023423523566', 'success', 'TRX-4Ja6RL30', '4-5 Hari', 'JNE', 'OKE', 58, 1),
(55, '1595279540', '1595279564_fd6a3d227eca499158f7.jpg', 'Kalimantan Timur', 1080000, '9000', 'CASH', '089669413260', 'RESI : 909095464565XX1', 'success', 'TRX-fkzpjL6b', '4-5 Hari', 'JNE', 'OKE', 1, 1),
(56, '1595528700', NULL, 'Kab. Mataram - Girikerto, Turi', 160000, '21000', 'BRI', '08982002040', 'RESI : 909095464565X', 'success', 'TRX-NH8UnmMS', '4-5 Hari', 'JNE', 'OKE', 58, 1),
(57, '1595529191', NULL, 'Kab. Sleman -  Jineman, Pelem, Wonokerto', 160000, '15000', 'CASH', '089669413260', 'Sedang Dikirim', 'success', 'TRX-7DgO9USA', '4-5 Hari', 'JNE', 'OKE', 1, 1),
(58, '1595531950', NULL, 'Kab. Sleman - Depok Condongcatur', 240000, '20000', 'CASH', '6289669413260', 'Sedang Dikirim', 'success', 'TRX-sh7WEbZC', '4-5 Hari', 'JNE', 'OKE', 1, 1),
(59, '1595531998', NULL, 'Kab. Mataram - Girikerto, Turi', 360000, '19000', 'BRI', '089669413260', 'Sedang Dikirim', 'success', 'TRX-EjfTRsNk', '4-5 Hari', 'JNE', 'OKE', 58, 1),
(60, '1595532075', NULL, 'Kab. Mataram - Girikerto, Turi', 360000, '20000', 'BRI', '089669413260', 'RESI : 7213125435', 'success', 'TRX-IxgtaLns', '4-5 Hari', 'JNE', 'OKE', 58, 1),
(63, '1596289077', NULL, 'DI Yogyakarta, Minahasa, Turi, Girikerto, Turi', 100000, '80000', 'BRI', '087675464', 'Menunggu Pembayaran', 'pending', 'TRX-mRBZo17O', '4-5 Hari', 'JNE', 'OKE', 58, NULL),
(64, '1596289219', NULL, 'DI Yogyakarta, Mataram, Turi, Girikerto, Turi', 240000, '37000', 'BRI', '087675464', 'Menunggu Pembayaran', 'pending', 'TRX-KZ6GT5ez', '4-5 Hari', 'JNE', 'OKE', 58, NULL),
(66, '1596437186', '1596437291_297f74296bcc904647ba.jpg', 'DI Yogyakarta, Bantul, Turi,  Girikerto, Jineman, RT/RW 004/006, 55551', 50000, '6000', 'BRI', '0876754641', 'Sedang Dikirim. RESI : 8742834534', 'success', 'TRX-utTmd1FI', '1-2 Hari', 'JNE', 'CTC', 64, 1),
(68, '1596439251', '1596439318_b48e5ab33e3b9727f1b8.jpg', 'DI Yogyakarta, Bantul, Turi,  Girikerto, Jineman, RT/RW 004/006, 55551', 180000, '10000', 'BRI', '0876754641', 'Dikirim gan. Resi : 005904835445', 'success', 'TRX-PDU2tCIS', '1 HARI Hari', 'POS', 'Express Next Day Bar', 64, 1),
(69, '1596440207', '1596440264_7f64c2179e43fde0bc67.jpg', 'DI Yogyakarta, Bantul, Turi,  Girikerto, Jineman, RT/RW 004/006, 55551', 600000, '18000', 'BRI', '0876754641', 'Dikirim. No resi  = 854957387492', 'success', 'TRX-Lfm4ou7e', '1-2 Hari', 'JNE', 'CTC', 64, 1),
(70, '1596442377', NULL, 'Jawa Tengah, Banjarnegara, Rembang,  Ds Tanjungsari, RT01  RW03, (59165)', 3150000, '180000', 'BRI', '088980894214', 'Menunggu Pembayaran', 'pending', 'TRX-hA1it7aq', '6-7 Hari', 'JNE', 'OKE', 65, NULL),
(72, '1596474667', '1596474695_600ef52a13bd0c9738eb.jpg', 'DI Yogyakarta, Bantul, Bayat, Girikerto, Turi, 55551', 150000, '10000', 'BRI', '087675464', 'Terkirim Bos', 'success', 'TRX-EZDMgwzU', '1-1 Hari', 'JNE', 'CTCYES', 58, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `fk_supplier` int(11) DEFAULT NULL,
  `harga_produk` int(11) NOT NULL,
  `nama_produk` varchar(60) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `keterangan_produk` varchar(255) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `fk_supplier`, `harga_produk`, `nama_produk`, `gambar_produk`, `keterangan_produk`, `stok`, `berat`) VALUES
(15, 44, 70000, 'Payung Anak', '1595067744_e22c69c12c06d9d654bc.jpeg', '   Payung untuk anak - anak', 40, 330),
(16, 44, 80000, 'Payung Golf', '1595067844_64f722f8c69be4590e85.jpg', '  Payung yang biasa digunakan ketika bermain golf', 56, 330),
(17, 44, 50000, 'Payung Lipat', '1595068211_385aca6fda3314fd0ec6.jpg', '   Payung untuk berlindung dari air hujan', 52, 330),
(18, 44, 70000, 'Payung Model 1 Warna', '1595068250_932c8d265fb3fe7308c7.jpg', 'Payung dengan model 1 warna', 47, 330),
(19, 44, 80000, 'Payung Pantai', '1595068285_e5446255cb4729262d0b.jpg', ' Payung untuk bersantai di pantai', 34, 330),
(20, 44, 70000, 'Payung Standar', '1595068326_3687fdf30d9a99295f31.jpeg', '  Payung biasa saja', 99, 330),
(21, 44, 80000, 'Payung Motif', '1595068359_783a9c33760be7a307ea.jpg', ' Payung standar motif', 22, 330),
(24, 44, 90000, 'Payung Revisi', '1596206117_284372fc4cf2a214dcf0.png', '  Untuk Revisi 1', 97, 450),
(25, 44, 70000, 'Payung Super KW', '1596436873_56d1cfe0914067286076.png', ' Untuk haha', 90, 330),
(26, 45, 80000, 'Payung Payungan', '1596438675_3270d750bb005d0ab046.jpg', '   Payung Mainan', 39, 350),
(27, 45, 50000, 'Payung PUBG', '1596439153_d423f847840178093101.png', ' Untuk PUBG gan', 63, 400),
(28, 45, 60000, 'Payung Teduh', '1596440099_d3a1cc61d931ec09b11e.png', ' payung berteduh', 80, 330),
(29, 45, 89000, 'Payung Umbrella', '1596728268_837d9eba3005ab859d0f.jpg', ' Payung untuk berteduh dari badai meteor', 60, 300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `nama_supplier`) VALUES
(43, 'Pranadya'),
(44, 'Rahma Purnama'),
(45, 'Joko Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_nomer_hp` varchar(20) DEFAULT NULL,
  `user_provinsi` varchar(50) DEFAULT NULL,
  `user_kabupaten` varchar(50) DEFAULT NULL,
  `user_kecamatan` varchar(50) DEFAULT NULL,
  `user_alamat` text DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_nomer_hp`, `user_provinsi`, `user_kabupaten`, `user_kecamatan`, `user_alamat`, `user_password`) VALUES
(1, 'Member Demo', 'purwantiibuku@gmail.com', '09678767457', 'DI Yogyakarta', 'Sleman', 'Turi', 'Jineman, Girikerto, Turi', '$2y$10$jJk72nzUVQUtSlE4icIxv.w0MTLBZTAfC/qQk/agff3ea4alLAg4.'),
(58, 'Mendol Dawet', 'cobavoba17@gmail.com', '087675464', 'DI Yogyakarta', 'Klaten', 'Bayat', 'Girikerto, Turi, 55551', '$2y$10$wqI0W4DVaGxhXGFZxYz/IOJZ0aOJpspv29Y3aIDgtWIZlM5HeVbw.'),
(61, 'Rahma Purnama', 'purwantiibsdauku@gmail.com', '08976867445', 'DI Yogyakarta', 'Sleman', 'Turi', ' Girikerto, Jineman, RT/RW 004/006 55551', '$2y$10$8fVImLJT9noHtP9./4b9nOiegmOVdRfrROmrICZG6E1ZAavfqHFgm'),
(62, 'Sito Karuniawan', 'purwantdadasdiibuku@gmail.com', '089078968678', 'DI Yogyakarta', 'Gunung Kidul', 'Pundong', 'Keterrong, Dasd ', '$2y$10$H/Zt9I15Nn/esqtBSJQBOOKHXuzw7J0Aj5MAAxoYo4CytCzYTPEEe'),
(64, 'Mustakim', 'cobavoba17@gmail.comrtegyr', '0876754641', 'DI Yogyakarta', 'Sleman', 'Turi', ' Girikerto, Jineman, RT/RW 004/006, 55551', '$2y$10$gZdSk9GTr/AV3HIYSXvZEOsd9g6DsgRtWznBVAb9RPfncg39r6BLy'),
(65, 'Ferdlian', 'ferdlian@gmail.com', '088980894214', 'Jawa Tengah', 'Rembang', 'Rembang', ' Ds Tanjungsari, RT01  RW03, (59165)', '$2y$10$IIH8zoMLIIaVSwzuw6r3Aery.fUWVHjZNlI1Yio1uq/1SylDnfZl.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `fk_product` (`fk_product`);

--
-- Indeks untuk tabel `log_stok`
--
ALTER TABLE `log_stok`
  ADD PRIMARY KEY (`log_stok_id`);

--
-- Indeks untuk tabel `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`orders_products_id`),
  ADD KEY `fk_product` (`fk_product`),
  ADD KEY `orders_products_ibfk_1` (`fk_pemesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_admin` (`fk_admin`),
  ADD KEY `pemesanan_ibfk_2` (`fk_user`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_supplier` (`fk_supplier`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `log_stok`
--
ALTER TABLE `log_stok`
  MODIFY `log_stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `orders_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`fk_pemesanan`) REFERENCES `pemesanan` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `products` (`product_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`fk_admin`) REFERENCES `admins` (`admin_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_supplier`) REFERENCES `suppliers` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
