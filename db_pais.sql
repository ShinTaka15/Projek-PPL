-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 05.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pais`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `id_takaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `waktu`, `is_active`, `id_kolam`, `id_takaran`, `id_user`) VALUES
(1, '12:41:00', 1, 1, 1, 1),
(2, '12:38:00', 1, 1, 2, 1),
(3, '12:04:00', 1, 1, 1, 1),
(4, '12:12:00', 0, 1, 2, 1),
(5, '12:11:00', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kolam`
--

CREATE TABLE `kolam` (
  `id_kolam` int(11) NOT NULL,
  `nama_kolam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kolam`
--

INSERT INTO `kolam` (`id_kolam`, `nama_kolam`) VALUES
(1, 'Nila Hitam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `pesan`, `id_user`, `is_read`, `tanggal`) VALUES
(1, 'Segera isi kembali pakan! Stok hampir habis.', 1, 1, '2024-05-29 15:41:03'),
(2, 'Segera isi kembali pakan! Stok hampir habis.', 1, 1, '2024-05-29 15:41:03'),
(3, 'Segera isi kembali pakan! Stok hampir habis.', 1, 1, '2024-05-29 15:41:03'),
(4, 'Segera isi kembali pakan! Stok hampir habis.', 1, 1, '2024-05-29 15:41:03'),
(23, 'Segera isi kembali pakan! Stok hampir habis.', 1, 1, '2024-05-29 15:52:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `takaran`
--

CREATE TABLE `takaran` (
  `id_takaran` int(11) NOT NULL,
  `jumlah_takaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `takaran`
--

INSERT INTO `takaran` (`id_takaran`, `jumlah_takaran`) VALUES
(1, 990),
(2, 1650);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'ashadi', 'hadi123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kolam` (`id_kolam`),
  ADD KEY `id_takaran` (`id_takaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kolam`
--
ALTER TABLE `kolam`
  ADD PRIMARY KEY (`id_kolam`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `takaran`
--
ALTER TABLE `takaran`
  ADD PRIMARY KEY (`id_takaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kolam`
--
ALTER TABLE `kolam`
  MODIFY `id_kolam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `takaran`
--
ALTER TABLE `takaran`
  MODIFY `id_takaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kolam`) REFERENCES `kolam` (`id_kolam`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_takaran`) REFERENCES `takaran` (`id_takaran`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
