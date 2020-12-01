-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2020 pada 04.44
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_minggu_4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_article`
--

CREATE TABLE `tbl_article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `article` longtext NOT NULL,
  `cover_img` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_article`
--

INSERT INTO `tbl_article` (`id`, `user_id`, `title`, `article`, `cover_img`, `created_at`) VALUES
(1, 1, 'Perubahan yang bisa menjadi diri sendiri. ', 'Create React App doesn’t handle backend logic or databases; it just creates a frontend build pipeline, so you can use it with any backend you want. Under the hood, it uses Babel and webpack, but you don’t need to know anything about them.\r\n\r\nWhen you’re ready to deploy to production, running npm run build will create an optimized build of your app in the build folder. You can learn more about Create React App from its README and the User Guide.', 'lamp.jpg', '2020-11-27 14:00:26'),
(4, 1, 'Hidup Lebih bermakna dengan ilmu, agama dan adab. ', '  Create React App doesn’t handle backend logic or databases; it just creates a frontend build pipeline, so you can use it with any backend you want. Under the hood, it uses Babel and webpack, but you don’t need to know anything about them.\r\n\r\nWhen you’re ready to deploy to production, running npm run build will create an optimized build of your app in the build folder. You can learn more about Create React App from its README and the User Guide.\r\nCreate React App doesn’t handle backend logic or databases; it just creates a frontend build pipeline, so you can use it with any backend you want. Under the hood, it uses Babel and webpack, but you don’t need to know anything about them.\r\n\r\nWhen you’re ready to deploy to production, running npm run build will create an optimized build of your app in the build folder. You can learn more about Create React App from its README and the User Guide.  ', '243652.jpg', '2020-11-27 14:13:28'),
(5, 1, 'Hidup ini harus didasari dengan Pancasila', 'Create React App doesn’t handle backend logic or databases; it just creates a frontend build pipeline, so you can use it with any backend you want. Under the hood, it uses Babel and webpack, but you don’t need to know anything about them.\r\n\r\nWhen you’re ready to deploy to production, running npm run build will create an optimized build of your app in the build folder. You can learn more about Create React App from its README and the User Guide.', 'windows_background_clean_by_alyama123_d9gwf2n-pre.jpg', '2020-11-27 14:33:12'),
(6, 4, 'saya aku adalah ', 'saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah saya aku adalah ', 'landscape-1586851086753-9765.jpg', '2020-11-30 18:09:06'),
(7, 5, 'saya pusing', 'saya adalah orang yang paling pusing di dunia ini, kenapa demikian ? karena saya tidak mengetahuinya', 'white-smartphone-near-black-keyboard-3821159.jpg', '2020-12-01 02:55:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'nestiawanfyan', 'p.nestiawan@gmail.com', '$2y$10$nbtf41CH80APbgiR2J3rO.Om1t6otaXEWWM8olV5MRXRJeLC5Qw7m', 1002, '2020-11-26 18:44:23'),
(4, 'rmizzy', 'pplk@student.itera.ac.id', '$2y$10$hfb7s2kHGXTKjwrpNwIjZ.1cvDJowCOscMpGNu7PdbojmvHpw4Xqe', 1002, '2020-11-30 17:48:52'),
(5, 'pusing', 'pusing@gmail.com', '$2y$10$uzUXpguJ.riGYP/ELjiZHOODdkeZQoEEf.kI02qvqbdOzNC1jCcd2', 1002, '2020-12-01 02:55:06'),
(9, 'admin', 'admin@admin.com', '$2y$10$U4aLhDwe59nBCDgizGnDJOVKM/XYQKbU1VKGU5b92irVF.KpQxwdO', 1001, '2020-12-01 03:44:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
