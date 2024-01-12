-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2024 pada 21.14
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_cekjabar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tag_ids` text NOT NULL,
  `kategori_ids` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `isi`, `gambar`, `slug`, `status`, `user_id`, `tag_ids`, `kategori_ids`, `created_at`, `updated_at`) VALUES
(2, ' Cak Imin Yakin Menang Pilpres 2024: Lawan AMIN Saya Kira Standar Saja', '<p>Jakarta - Cawapres nomor urut 1, Muhaimin Iskandar atau Cak Imin, yakni dirinya bersama capres Anies Baswedan akan menang Pilpres 2024. Hal itu disampaikan dalam acara \'Slepet Imin\' bersama mahasiswa dan milenial di Medan, Sumatera Utara.<br style=\"\">Awalnya ada satu mahasiswa yang bertanya ke Cak Imin, apakah ia yakin bisa menang dalam kontestasi pemilu tahun depan. \"Cak Imin yakin menang di Pilpres 2024?\" tanya mahasiswa itu, Jumat (8/12/2023).<br style=\"\"><br style=\"\">Cak Imin pun menjawab. Ketua Umum PKB itu mengatakan sudah memiliki suara pendukung di Jawa Timur dan Jawa Tengah.<br style=\"\"><br style=\"\"><blockquote class=\"blockquote\">\"Awalnya saya kan pemimpin partai ya di PKB. Peta suara itu kan bisa dilihat Jawa Timur, Jawa Tengah. Modal dasarnya di situ, nanti berebut di Jawa Barat, berebut di DKI, berebut di Banten. Ini peta utama, ini saya punya modal Jawa Timur, Jawa Tengah,\" ucap Cak Imin.</blockquote><br style=\"\">\"Kenapa saya yakin? Saya jalan mulai dari Sulawesi, Kalimantan, Jawa, saya puter dari Sumatera saya menangkap suatu fakta bahwa arus perubahan tidak bisa dibendung,\" ujar Cak Imin.<br style=\"\"><br style=\"\">\"Ibaratnya kami sudah lelah dengan gaya yang pesimis-pesimis, yang biasa-biasa saja kita ingin perubahan, rata-rata begitu. Tapi selama ini mau ngomong nggak enak, mau ngomong sungkan. Ada harapan yang tertutupi oleh ketidaknyamanan dan kekhawatiran. Ada juga karena orang Indonesia ini menerima ya, menerima nasib jarang protes, yang protes mahasiswa saja,\" lanjutnya.<br style=\"\"><br style=\"\">Dari kunjungannya ke beberapa daerah dan mendengarkan aspirasi masyarakat itu, Cak Imin menyebut keinginan masyarakat untuk perubahan tak bisa terbendung. Sebab, kata dia, sudah banyak masyarakat yang kecewa dengan keadaan saat ini.<br style=\"\"><br style=\"\">\"Saya meyakini suara perubahan itu murni dan tinggi, suara perubahan itu tidak bisa dibendung lagi, suara perubahan itu susah untuk ditunda karena sudah terlampau kecewa dengan keadaan,\" katanya.<br style=\"\"><br style=\"\">Dia pun menilai tak ada lawan berat di Pilpres 2024 mendatang. \"InsyaAllah itu laku dan karena itu laku maka saya yakin kemenangan itu ada. Dan kemenangan itu bukan main-main karena saingan, lawan AMIN juga saya kira standar saja,\" imbuhnya.<br></p>', '1702064985_075d88e96359c1c5dc99.jpeg', 'cak-imin-yakin-menang-pilpres-2024-lawan-amin-saya-kira-standar-saja', 1, 2, '4', '3,4', '2023-12-08 19:49:45', '2023-12-08 19:49:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `slug` varchar(255) DEFAULT NULL,
  `jenis_kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `keterangan`, `slug`, `jenis_kategori`) VALUES
(3, 'Politik', '', 'politik', 'Kategori Utama'),
(4, 'Pemilu 2024', '', 'pemilu-2024', 'Sub Kategori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `isi_komentar` text,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `jumlah_kunjungan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id` int(11) NOT NULL,
  `nama_tag` varchar(50) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tag`
--

INSERT INTO `tb_tag` (`id`, `nama_tag`, `slug`) VALUES
(4, 'Pipres2024', 'pipres2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telpon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `hak_akses` varchar(20) DEFAULT NULL,
  `user_foto` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_depan`, `nama_belakang`, `username`, `password`, `email`, `telpon`, `alamat`, `hak_akses`, `user_foto`, `created_at`, `updated_at`) VALUES
(2, 'Rifki', 'Maulana', 'admin', '$2y$10$97qggzwJGblOfxLEXswEnO5awG32RfLV88h2kqxbmf94W34rSR./O', 'rifkkimaulana@gmail.com', '123', NULL, 'administrator', '1702059246_4dd07553deb3e74d2cd4.png', '2023-12-08 16:28:49', '2023-12-08 16:28:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indeks untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indeks untuk tabel `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_komentar_ibfk_2` FOREIGN KEY (`berita_id`) REFERENCES `tb_berita` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD CONSTRAINT `tb_pengunjung_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_pengunjung_ibfk_2` FOREIGN KEY (`berita_id`) REFERENCES `tb_berita` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
