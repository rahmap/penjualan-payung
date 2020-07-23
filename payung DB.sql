-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2020 pada 21.37
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
(84, 15, 60, 4, 70000, 'Payung Anak', 67, 71, 'Rahma Purnama', '24/07/2020', 'Mataram');

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
  `fk_user` int(11) DEFAULT NULL,
  `fk_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`order_id`, `waktu_pesanan`, `bukti_pembayaran`, `alamat`, `harga_total`, `ongkir`, `metode_pembayaran`, `no_hp`, `informasi_pesanan`, `status_pemesanan`, `order_unique_id`, `fk_user`, `fk_admin`) VALUES
(54, '1595279446', NULL, ' Klaten Timur', 550000, 'Luar Kota', 'CASH', '089669413260', 'Sedang Dikirim', 'success', 'TRX-4Ja6RL30', NULL, 1),
(55, '1595279540', '1595279564_fd6a3d227eca499158f7.jpg', 'Kalimantan Timur', 1080000, 'Dalam Kota', 'CASH', '089669413260', 'RESI : 909095464565XX1', 'success', 'TRX-fkzpjL6b', 1, 1),
(56, '1595528700', NULL, 'Kab. Mataram - Girikerto, Turi', 160000, 'Dalam Kota', 'BRI', '08982002040', 'RESI : 909095464565X', 'success', 'TRX-NH8UnmMS', 58, 1),
(57, '1595529191', NULL, 'Kab. Sleman -  Jineman, Pelem, Wonokerto', 160000, 'Luar Kota', 'CASH', '089669413260', 'Sedang Dikirim', 'success', 'TRX-7DgO9USA', NULL, 1),
(58, '1595531950', NULL, 'Kab. Sleman - Depok Condongcatur', 240000, 'Dalam Kota', 'CASH', '6289669413260', 'Sedang Dikirim', 'success', 'TRX-sh7WEbZC', NULL, 1),
(59, '1595531998', NULL, 'Kab. Mataram - Girikerto, Turi', 360000, 'Luar Kota', 'BRI', '089669413260', 'Sedang Dikirim', 'success', 'TRX-EjfTRsNk', 58, 1),
(60, '1595532075', NULL, 'Kab. Mataram - Girikerto, Turi', 360000, 'Dalam Kota', 'BRI', '089669413260', 'RESI : 7213125435', 'success', 'TRX-IxgtaLns', 58, 1);

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
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `fk_supplier`, `harga_produk`, `nama_produk`, `gambar_produk`, `keterangan_produk`, `stok`) VALUES
(15, 44, 70000, 'Payung Anak', '1595067744_e22c69c12c06d9d654bc.jpeg', '   Payung untuk anak - anak', 67),
(16, 44, 80000, 'Payung Golf', '1595067844_64f722f8c69be4590e85.jpg', '  Payung yang biasa digunakan ketika bermain golf', 54),
(17, 44, 50000, 'Payung Lipat', '1595068211_385aca6fda3314fd0ec6.jpg', ' Payung untuk berlindung dari air hujan', 55),
(18, 44, 70000, 'Payung Model 1 Warna', '1595068250_932c8d265fb3fe7308c7.jpg', '    Payung dengan model 1 warna', 48),
(19, 44, 80000, 'Payung Pantai', '1595068285_e5446255cb4729262d0b.jpg', ' Payung untuk bersantai di pantai', 36),
(20, 44, 70000, 'Payung Standar', '1595068326_3687fdf30d9a99295f31.jpeg', ' Payung biasa saja', 55),
(21, 44, 80000, 'Payung Motif', '1595068359_783a9c33760be7a307ea.jpg', ' Payung standar motif', 25);

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
(44, 'Rahma Purnama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_kabupaten` varchar(50) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_kabupaten`, `user_alamat`, `user_password`) VALUES
(1, 'Member Demo', 'purwantiibuku@gmail.com', 'Sleman', 'Jineman, Girikerto, Turi', '$2y$10$jJk72nzUVQUtSlE4icIxv.w0MTLBZTAfC/qQk/agff3ea4alLAg4.'),
(58, 'Mendol Dawet', 'cobavoba17@gmail.com', 'Mataram', 'Girikerto, Turi', '$2y$10$wqI0W4DVaGxhXGFZxYz/IOJZ0aOJpspv29Y3aIDgtWIZlM5HeVbw.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD KEY `fk_user` (`fk_user`);

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `orders_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_supplier`) REFERENCES `suppliers` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
