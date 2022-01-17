-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2022 pada 07.00
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung_media`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quality` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_title`, `ip_address`, `quality`) VALUES
(16, 8, 'Desain Undangan', '::1', 1),
(17, 15, 'Stiker Tempel', '::1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Komputer'),
(2, 'Desain'),
(3, 'Konten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`brand_id`, `brand_title`) VALUES
(1, 'Gema NTB\r\n'),
(2, 'GenBI '),
(3, 'Marzu Shop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(8, 2, 1, 'Desain Undangan', 300000, 'Jasa desain undangan dengan tampilan yang modern dan berkelas', 'amy-shamblen-htla-WGes-c-unsplash.jpg', 'undangan'),
(9, 1, 1, 'Flashing Smartphone', 1000000, 'Flasing Hp hingga menjadi seperti baru!', 'rahul-chakraborty-xsGxhtAsfSA-unsplash.jpg', 'flash'),
(10, 3, 1, 'Jasa Videografy', 300000, 'Membuat film dan video yang super menarik dan cinematic!!', 'rene-ranisch-o5ULV1tP1B4-unsplash.jpg', 'video'),
(11, 3, 2, 'Jasa Photografy', 100000, 'Berbagai macam jenis photo dan dimana saja, dapat anda pesan sekarang juga.', 'yogendra-singh-On3Tve7SYNg-unsplash.jpg', 'photo'),
(12, 2, 3, 'Photo Polaroid', 200, 'Cetak photo anda dengan tampilan polaroid. Jadi hits dimasa kini', 'aisha-ife-GlebdlW9axE-unsplash.jpg', 'polaroid'),
(13, 2, 3, 'Tabloit Photo', 500, 'Buat kumpulan photo anda menjadi sebuah tabloit photo', '91-magazine-UE5WO2mOQ3g-unsplash.jpg', 'tabloit'),
(14, 2, 2, 'UI/UX Design', 5000000, 'Jasa pembuatan desain UI/UX untuk aplikasi anda', 'nick-adams-yTWq8n3-4k0-unsplash.jpg', 'ui/ux'),
(15, 2, 3, 'Stiker Tempel', 700, 'Membuat berbagai jenis stiker yang bisa di tempel dimana saja sesuai dengan dsain yang bisa anda request', 'patrick-perkins-QTzcvBuIR3Y-unsplash.jpg', 'stiker'),
(16, 3, 2, 'Food Photografy', 9000, 'Jasa Food Photografy sangat cocok untuk marketing produk anda.', 'dmitriy-frantsev-azqF_E6ayYU-unsplash.jpg', 'food'),
(17, 1, 2, 'Servise photo', 122, 'sadasd', 'a19399552b343ebce928bb2503c09c7b.jpg', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_address`, `image`, `role`) VALUES
(11, '::1', 'Nahrul K', 'khayattullah73@gmail.com', '202cb962ac59075b964b07152d234b70', 'ID', 'Lombok Timur', '087762804486', 'Kebon Dewa, Jl Mataram - Selong', 'pp[1].jpg', 'admin'),
(12, '::1', 'user', 'user@user.com', '202cb962ac59075b964b07152d234b70', 'AI', 'user', 'user', 'user', 'pp[1].jpg', 'guest'),
(13, '::1', 'Nahrul K', '22@33', '202cb962ac59075b964b07152d234b70', 'ID', 'Lombok Timur', '1233', 'Kebon Dewa, Jl Mataram - Selong', 'git.png', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeks untuk tabel `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `partner`
--
ALTER TABLE `partner`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
