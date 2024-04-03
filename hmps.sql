-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2023 pada 02.31
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(200) NOT NULL,
  `foto_admin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `username`, `password`, `foto_admin`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'foto_adminadmin.png'),
(2, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'foto_adminadmin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `nama_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(500) NOT NULL,
  `status_berita` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `nama_berita`, `isi_berita`, `foto_berita`, `status_berita`) VALUES
(1, 'dadad', '<p>wdwdwd<img alt=\"broken heart\" src=\"http://localhost/hmps/assets/vendor/ckeditor/plugins/smiley/images/broken_heart.png\" style=\"height:23px; width:23px\" title=\"broken heart\" /></p>\r\n', 'foto_beritaadmin.jpeg', 'aktif'),
(2, 'dadada', '<p><img alt=\"no\" src=\"http://localhost/hmps/assets/vendor/ckeditor/plugins/smiley/images/thumbs_down.png\" style=\"height:23px; width:23px\" title=\"no\" /><img alt=\"no\" src=\"http://localhost/hmps/assets/vendor/ckeditor/plugins/smiley/images/thumbs_down.png\" style=\"height:23px; width:23px\" title=\"no\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>klklkopkoko,koiojoj</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'foto_beritaadmin1.jpeg', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto_dosen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nama_dosen`, `jabatan`, `email`, `no_telp`, `foto_dosen`) VALUES
(1, 'dad', 'dada', 'kambingsakit@gmail.com', '9090909', 'foto_dosenadmin1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nim_mahasiswa` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `foto_mahasiswa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim_mahasiswa`, `email`, `no_telp`, `foto_mahasiswa`) VALUES
(1, 'dada', '232', 'umk.mu@gmail.com', '9090909', 'foto_mahasiswaadmin1.jpg'),
(2, 'lmolmolm', '09090', 'akerman30062001@gmail.com', '090909', 'foto_mahasiswaadmin.png'),
(3, 'ljljml', '97557', 'yusrilpezkend@yahoo.com', '980889', 'foto_mahasiswaadmin.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengurus`
--

CREATE TABLE `tbl_pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama_pengurus` varchar(255) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `foto_pengurus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengurus`
--

INSERT INTO `tbl_pengurus` (`id_pengurus`, `nama_pengurus`, `jabatan`, `email`, `no_telp`, `foto_pengurus`) VALUES
(1, 'dsdsd', 'dada', 'faf', '41414', 'foto_pengurusadmin1.jpg'),
(2, 'mlmlml', 'huhuhu', 'umk.mu@gmail.com', '7978787', 'foto_pengurusadmin.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
