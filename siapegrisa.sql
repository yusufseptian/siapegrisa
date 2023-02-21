-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Feb 2023 pada 14.41
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapegrisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `id_detail_nilai` int NOT NULL,
  `id_nilai` int NOT NULL,
  `nilai` int NOT NULL,
  `kategori` enum('tugas','ulangan','uts','uas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `detail_nilai`
--

INSERT INTO `detail_nilai` (`id_detail_nilai`, `id_nilai`, `nilai`, `kategori`) VALUES
(1, 1, 85, 'tugas'),
(2, 11, 80, 'ulangan'),
(3, 12, 80, 'tugas'),
(4, 12, 23, 'ulangan'),
(5, 12, 50, 'uts'),
(7, 10, 50, 'tugas'),
(8, 1, 90, 'ulangan'),
(9, 11, 90, 'tugas'),
(11, 1, 90, 'uts'),
(12, 1, 90, 'tugas'),
(13, 11, 80, 'uts'),
(15, 11, 90, 'uas'),
(16, 1, 90, 'uas'),
(17, 2, 90, 'tugas'),
(18, 2, 80, 'ulangan'),
(20, 3, 90, 'tugas'),
(21, 3, 80, 'uts'),
(22, 3, 78, 'uas'),
(23, 3, 87, 'ulangan'),
(24, 4, 90, 'tugas'),
(25, 2, 90, 'tugas'),
(26, 2, 90, 'uts'),
(27, 3, 100, 'tugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nip` int NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `no_hp`, `email`, `alamat`, `jabatan`, `pendidikan_terakhir`, `photo`) VALUES
(1, 'sudarmiyati', 'f0c413d1d4719bcb155e58dc3fd137a0', 1413123331, 'Sudarmiyati, S.Pd', 'Kebumen', '1969-11-04', 'Perempuan', '+62892813181', 'bueti@gmail.com', 'Petahunan ', 'Guru Mapel', 'S1', 'aiony-haust-3TLl_97HNJo-unsplash.jpg'),
(6, 'rizka', '81dc9bdb52d04dc20036dbd8313ed055', 110112783, 'Rizka, S.Pd', 'Lesung Batu Muda', '1995-06-13', 'Perempuan', '+622279696131', 'rizka@mail.com', 'Jalan Parangtritis, KM 9,7', 'Guru Mapel', 'S1 ', '22.jpg'),
(9, '5190411039', '81dc9bdb52d04dc20036dbd8313ed055', 8493759, 'yusuf sep', 'semarang', '2023-02-21', 'Laki-laki', '+62894738593', 'soepsep@gmail.com', 'me,dej,ma', 'guru', 's1', 'avatar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_sekolah`
--

CREATE TABLE `info_sekolah` (
  `id_info_sekolah` int NOT NULL,
  `judul` varchar(250) NOT NULL,
  `kategori` enum('galeri','pengumuman','kalender') NOT NULL,
  `tgl_terbit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `kode_kelas` varchar(3) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `id_ta` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_ta`) VALUES
(2, '7B', 'VII B', 1),
(4, '7C', 'VII C', 1),
(5, '7A', 'VII A', 1),
(7, '8A', 'VIII A', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(100) NOT NULL,
  `id_semester` int NOT NULL,
  `id_guru` int NOT NULL,
  `jam_pelajaran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kode_matapelajaran`, `nama_matapelajaran`, `id_semester`, `id_guru`, `jam_pelajaran`) VALUES
(1, 'mp03', 'Matematika', 3, 1, '2'),
(2, 'mp01', 'Bahasa Inggris', 3, 6, '4'),
(3, 'mp10', 'Matematika', 6, 1, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `nis_siswa` int NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `kkm` int NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis_siswa`, `kode_matapelajaran`, `kkm`, `nilai`) VALUES
(1, 5181, 'mp01', 80, 111),
(2, 5191, 'mp01', 70, 85),
(3, 5191, 'mp03', 75, 84),
(4, 5181, 'mp03', 75, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nis_siswa` int NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `username`, `password`, `nama`, `no_hp`, `pekerjaan`, `nis_siswa`, `alamat`) VALUES
(1, 'darman', '81dc9bdb52d04dc20036dbd8313ed055', 'darman sudarmin', '087565646565', 'tani', 5191, 'wonogiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengumuman` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `pengumuman`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman UTS', 'Pengumuman ini berisi tentang uts yang akan diselenggarakan', '2023-01-29', '2023-01-29'),
(2, 'Pramuka', 'Hari Jumat harap membawa perlengkapan pramuka untuk kelas 8!', '2023-01-29', '2023-02-10'),
(4, 'PENGUMUMAN UAS', 'ini pengumuman', '2023-02-04', '0000-00-00'),
(5, 'Lomba Agustusan', 'Tanggal 15-17 diadakan pentas seni!', '2023-02-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int NOT NULL,
  `id_ta` int DEFAULT NULL,
  `semester` enum('ganjil','genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `id_ta`, `semester`) VALUES
(3, 1, 'genap'),
(6, 5, 'ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `nis` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `id_kelas` int NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `username`, `password`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `id_kelas`, `alamat`, `no_hp`, `photo`) VALUES
(1, 5191, '5191', '81dc9bdb52d04dc20036dbd8313ed055', 'Assabilla Cut Kusuma', 'Jakarta', '2008-12-04', 'Perempuan', 2, 'Petahunan Sempor RT 04/01, Ds. Sempor', '+62892813181', 'foto1.jpg'),
(3, 5181, '5181', '81dc9bdb52d04dc20036dbd8313ed055', 'Desya', 'Lesung Batu Muda', '2023-01-12', 'Perempuan', 2, 'Jalan Parangtritis, KM 9,7', '082279696793', 'istockphoto-1304361511-612x6123.jpg'),
(4, 5172, '5199', '81dc9bdb52d04dc20036dbd8313ed055', 'Wahdah', 'Jakarta', '2003-09-28', 'Perempuan', 2, 'Desa Jatinegara RT 10, RW 02 Kec. Sempor, Kab. Kebumen, Jawa Tengah', '+622279696131', 'teacher_(1).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `status`) VALUES
(1, '2022/2023', 'tidak aktif'),
(3, '2019/2020', 'tidak aktif'),
(5, '2023/2024', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','guru','siswa','orangtua') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_sessions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'N', ''),
(2, 'Citra', 'e260eab6a7c45d139631f72b55d8506b', 'citra@gmail.com', 'guru', 'N', ''),
(4, 'adminn', '81dc9bdb52d04dc20036dbd8313ed055', 'adminn@mail.com', 'admin', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD PRIMARY KEY (`id_detail_nilai`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `info_sekolah`
--
ALTER TABLE `info_sekolah`
  ADD PRIMARY KEY (`id_info_sekolah`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  MODIFY `id_detail_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `info_sekolah`
--
ALTER TABLE `info_sekolah`
  MODIFY `id_info_sekolah` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
