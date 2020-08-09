-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2020 pada 21.16
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
(24, 40, '2020/08/07', 15),
(25, 50, '2020/08/07', 16),
(26, 60, '2020/08/07', 17),
(27, 35, '2020/08/07', 18),
(28, 40, '2020/08/07', 19),
(29, 20, '2020/08/07', 20),
(30, 64, '2020/08/07', 21),
(31, 40, '2020/08/07', 24),
(32, 37, '2020/08/07', 25),
(33, 13, '2020/08/07', 26),
(34, 46, '2020/08/07', 27),
(35, 27, '2020/08/07', 28),
(36, 35, '2020/08/07', 29);

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
(503, 'Payung Anak', 38, '2020/08/10'),
(504, 'Payung Golf', 50, '2020/08/10'),
(505, 'Payung Lipat', 59, '2020/08/10'),
(506, 'Payung Model 1 Warna', 35, '2020/08/10'),
(507, 'Payung Pantai', 35, '2020/08/10'),
(508, 'Payung Standar', 12, '2020/08/10'),
(509, 'Payung Motif', 58, '2020/08/10'),
(510, 'Payung Revisi', 40, '2020/08/10'),
(511, 'Payung Super KW', 37, '2020/08/10'),
(512, 'Payung Payungan', 13, '2020/08/10'),
(513, 'Payung PUBG', 46, '2020/08/10'),
(514, 'Payung Teduh', 25, '2020/08/10'),
(515, 'Payung Umbrella', 35, '2020/08/10');

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
(102, 17, 73, 1, 50000, 'Payung Lipat', 59, 60, 'Rahma Purnama', '10/08/2020', 'Sleman'),
(103, 19, 73, 5, 80000, 'Payung Pantai', 35, 40, 'Rahma Purnama', '10/08/2020', 'Sleman'),
(104, 20, 74, 8, 70000, 'Payung Standar', 12, 20, 'Rahma Purnama', '10/08/2020', 'Sleman'),
(105, 21, 74, 4, 80000, 'Payung Motif', 60, 64, 'Rahma Purnama', '10/08/2020', 'Sleman'),
(106, 28, 74, 2, 60000, 'Payung Teduh', 25, 27, 'Joko Siswa', '10/08/2020', 'Sleman'),
(107, 15, 75, 2, 70000, 'Payung Anak', 38, 40, 'Rahma Purnama', NULL, 'Sleman'),
(108, 21, 75, 2, 80000, 'Payung Motif', 58, 60, 'Rahma Purnama', NULL, 'Sleman');

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
(73, '1596997851', '1596997865_fbd388e57b19e47244d0.jpg', 'DI Yogyakarta, Bantul, Bayat, Girikerto, Turi, 55551', 450000, '12000', 'BRI', '087675464', 'Sedang Dikirim. RESI : 023423523566', 'success', 'TRX-UvxVDmRT', '1-2 Hari', 'JNE', 'CTC', 58, 1),
(74, '1596998076', '1596998088_c4c03a238fd848fed742.jpg', 'DI Yogyakarta, Bantul, Turi, Jineman, Girikerto, Turi', 1000000, '50000', 'BRI', '09678767457', 'Sedang Dikirim. RESI : 8087390904-JOG', 'success', 'TRX-tg0QCJ7U', '1 HARI Hari', 'POS', 'Express Next Day Bar', 1, 1),
(75, '1597000351', NULL, 'Jawa Timur, Bangkalan, Turi, Jineman, Girikerto, Turi', 300000, '30000', 'BRI', '09678767457', 'Menunggu Pembayaran', 'pending', 'TRX-K7PQ9ij8', '5 Hari', 'TIKI', 'ECO', 1, NULL);

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
(15, 44, 70000, 'Payung Anak', '1595067744_e22c69c12c06d9d654bc.jpeg', '   Payung untuk anak - anak', 38, 330),
(16, 44, 80000, 'Payung Golf', '1595067844_64f722f8c69be4590e85.jpg', '  Payung yang biasa digunakan ketika bermain golf', 50, 330),
(17, 44, 50000, 'Payung Lipat', '1595068211_385aca6fda3314fd0ec6.jpg', '   Payung untuk berlindung dari air hujan', 59, 330),
(18, 44, 70000, 'Payung Model 1 Warna', '1595068250_932c8d265fb3fe7308c7.jpg', 'Payung dengan model 1 warna', 35, 330),
(19, 44, 80000, 'Payung Pantai', '1595068285_e5446255cb4729262d0b.jpg', ' Payung untuk bersantai di pantai', 35, 330),
(20, 44, 70000, 'Payung Standar', '1595068326_3687fdf30d9a99295f31.jpeg', '  Payung biasa saja', 12, 330),
(21, 44, 80000, 'Payung Motif', '1595068359_783a9c33760be7a307ea.jpg', ' Payung standar motif', 58, 330),
(24, 44, 90000, 'Payung Revisi', '1596206117_284372fc4cf2a214dcf0.png', '  Untuk Revisi 1', 40, 450),
(25, 44, 70000, 'Payung Super KW', '1596436873_56d1cfe0914067286076.png', ' Untuk haha', 37, 330),
(26, 45, 80000, 'Payung Payungan', '1596438675_3270d750bb005d0ab046.jpg', '   Payung Mainan', 13, 350),
(27, 45, 50000, 'Payung PUBG', '1596439153_d423f847840178093101.png', ' Untuk PUBG gan', 46, 400),
(28, 45, 60000, 'Payung Teduh', '1596440099_d3a1cc61d931ec09b11e.png', ' payung berteduh', 25, 330),
(29, 45, 89000, 'Payung Umbrella', '1596728268_837d9eba3005ab859d0f.jpg', ' Payung untuk berteduh dari badai meteor', 35, 300);

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
(58, 'Mendol Dawet', 'cobavoba17@gmail.com', '087675464', 'DI Yogyakarta', 'Sleman', 'Bayat', 'Girikerto, Turi, 55551', '$2y$10$wqI0W4DVaGxhXGFZxYz/IOJZ0aOJpspv29Y3aIDgtWIZlM5HeVbw.'),
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
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `log_stok`
--
ALTER TABLE `log_stok`
  MODIFY `log_stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT untuk tabel `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `orders_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
