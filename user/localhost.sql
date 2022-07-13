-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jun 2022 pada 03.31
-- Versi server: 10.5.12-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18527784_sistempakar`
--
CREATE DATABASE IF NOT EXISTS `id18527784_sistempakar` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id18527784_sistempakar`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `id_diagnosa` int(10) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL,
  `id_gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`id_diagnosa`, `id_penyakit`, `id_gejala`) VALUES
(1, 'P001', 'G001'),
(2, 'P002', 'G002'),
(3, 'P003', 'G003'),
(4, 'P004', 'G004'),
(5, 'P005', 'G005'),
(6, 'P006', 'G006'),
(7, 'P007', 'G007'),
(8, 'P008', 'G008'),
(9, 'P009', 'G009'),
(10, 'P010', 'G010'),
(11, 'P011', 'G011'),
(12, 'P012', 'G012'),
(13, 'P013', 'G013'),
(14, 'P014', 'G016'),
(15, 'P017', 'G019'),
(16, 'P018', 'G020'),
(17, 'P015', 'G017'),
(18, 'P020', 'G021'),
(19, 'P019', 'G022'),
(20, 'P021', 'G023'),
(21, 'P013', 'G014'),
(22, 'P014', 'G015'),
(23, 'P016', 'G018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `bagian`, `keterangan`, `gambar`) VALUES
('G001', 'Daun1', 'Bercak-bercak kuning pada daun kemudian berubah menjadi hitam', '520-G. Tungau Merah.jpg'),
('G002', 'Daun', 'Lubang-lubang kecil pada daun', '302-G. Ulat Kantung1.jpg'),
('G003', 'Daun', 'Memakan atau merusak daun, lubang-lubang kecil pada permukaan daun', '695-G. Kumbang Daun.jpg'),
('G004', 'Daun', 'Menyerang daun hingga rusak dan bolong-bolong', '4-G. Ulat Grayak 11.jpg'),
('G005', 'Daun', 'Sisi daun menimbulkan bercak-bercak berwarna kuning kehijau-hijauan, kemudian bercak meluas dan bersatu serta berubah warna menjadi cokelat berlapis tepung. Daun kering dan rontok', '146-G. Tepung Palsu1.jpg'),
('G006', 'Daun', 'Daun dan tunas muda terjadi bercak-bercak berwarna cokelat tua yang bersudut kemudian timbul bintik-bintik hitam pada bercak', '866-G. Bercak daun cercospora.JPG'),
('G007', 'Daun', 'Sisi atas daun adanya bercak-bercak berwarna hijau kekuningan. Seluruh permukaan daun tertutup lapisan tepung (spora).', '856-G. Karat Daun.jpg'),
('G008', 'Daun', 'Bercak-bercak kuning di sepanjang tepi daun, kemudian bercak menjadi besar berwarna cokelat dengan cincin-cincin sepusat.', '550-G. Bercak daun alternaria.jpg'),
('G009', 'Daun', 'Becak-bercak cokelat dikelilingi oleh tepi hitam pada daun, kemudian disekeliling bercak terbentuk daerah yang berwarna cokelat gelap sampai hitam.', '598-G. Busuk hitam black rot.JPG'),
('G010', 'Daun', 'Daun-daun: munculnya insang dengan ketebalan tertentu, kekuningan, di bagian bawah.', '978-G, Phyloxera 1.jpg'),
('G011', 'Buah', 'Kulit buah terlepas  dari dagingnya, kemudian buah busuk lunar berair. Buah berwarna cokelat tua keriput dan busuk.', '770-G. Busuk kupang kelabu.jpg'),
('G012', 'Daun', 'Daun mengecil, bentuknya mirip daun kipas setengah menutup, posisi daun tegak dan permukaannya tampak tidak rata.', '824-G. Daun Kipas.jpg'),
('G013', 'Daun', 'Daun-daun terinfeksi menggulung ke atas dan berubah bentuk (abnormal) ditutupi tepung (spora) berwarna kelabu sampai agak gelap.', '687-G. Cendawan Tepung (pada daun)1.jpg'),
('G014', 'Buah', 'Buah menjadi cokelat tua dan berparut', '217-G. Cendawan Tepung (PadaBuah).jpg'),
('G015', 'Daun', 'Perubahan bentuk daun mengeriting atau berbentuk mangkok', '596-G. Kutu Kebul pada daun.jpg'),
('G016', 'Batang', 'Serangga kecil berwarna putih hingga kekuningan', '818-G. Kutu Kebul pada batang.jpg'),
('G017', 'Akar', 'Tanaman anggur yang terkena busuk akar biasanya kerdil dan pertumbuhan stagnan karena terhambat.Tanaman anggur kurang kokoh dan ketika tanaman dicabut akar melepuh busuk.', '445-G. Busuk Akar.jpg'),
('G018', 'Buah', 'Buah menjadi busuk dan lembek.', '161-G. Lalat Buah Anggur.JPG'),
('G019', 'Daun', 'Merusak daun', '701-g belalang1.jpg'),
('G020', 'Buah', 'Menyerang buah anggur pada stadium menjelang masak', '767-G burung dkk.jpg'),
('G021', 'Daun', 'Serangan pada pucuk dan daun muda menyebabkan bagian di sekitar titik tumbuh mengalami perubahan warna dan mengering', '567-g kepik daun1.JPG'),
('G022', 'Akar', 'Tanaman yang terinfeksi oleh nematoda akan berdampak pada kerusakan ujung akar dan berakibat pada busuk akar', '659-g nematoda1.jpg'),
('G023', 'Batang ', 'Melubangi batang anggur', '715-g penggerek.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` varchar(20) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `pencegahan` varchar(500) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`id_penyakit`, `nama_penyakit`, `pencegahan`, `gambar`) VALUES
('P001', 'Tungau Merah (Tetranychus sp.)', 'Memotong bagian tanaman (daun) yang terserang berat dan penyemprotan insektisida yang mangkus, seperti Mitac 200 EC atau Agrimec 18 EC dengan konsentrasi yang di anjurkan.', '385-P Tungau Merah 1.jpg'),
('P002', 'Ulat Kantung (Mahasena corbetti Tams.)', 'Memangkas (memotong) bagian daun yang terserang berat dan penyemprotan insektisida sistemik dengan konsentrasi yang dianjurkan.', '875-P Ulat Kantung.jpg'),
('P003', 'Kumbang Daun (Apogonia sp.)', 'Memasang perangkap lampu penerang pada malam hari. Kumbang yang tertangkap kemudian dibakar (dimusnahkan)', '874-P Kumbang Daun.jpg'),
('P004', 'Ulat Grayak (Spodoptera sp.)', 'Dapat dilakukan dengan disemprotkan insektisida yang mangkus, seperti Buldok 25 EC atau Tokuthin 500 EC', '621-P Ulat Grayak.jpg'),
('P005', 'Tepung Palsu (Valse Meeldauv, Downy Mildew)', 'Mengurangi kelembapan kebun (pemangkasan), memotong dan memusnahkan bagian tanaman yang sakit berat, melindungi tanaman dengan naungan (atap) plastik, dan aplikasi fungisida yang mangkus. Jenis fungisida yang dianjurkan adalah Antracol 10WP, Bayfidan 250EC, Cupravit OB21, atau Folirfus 400 AS.', '442-P Tepung Palsu1.jpg'),
('P006', 'Bercak daun Cercospora', 'Mengurangi kelembapan kebun, menjaga kebersihan kebun, memangkas bagian tanaman yang sakit berat untuk dimusnahkan, dan aplikasi fungisida yang mangkus, seperti Dithane M-45 atau Benlate', '955-P Bercak daun Cercospora1.jpg'),
('P007', 'Karat Daun', 'Memangkas daun yang sakit berat dan aplikasi fungisida yang mangkus, seperti Score 250 EC atau Baycor 300 EC.', '136-P Karat Daun.jpg'),
('P008', 'Bercak daun Alternaria', 'Menjaga kebersihan kebun, memotong bagian tanaman yang sakit berat untuk dimusnahkan dan aplikasi fungisida yang mangkus, seperti Score 250 EC atau Sandofan MZ 10/56 WP.', '305-G. Bercak daun alternaria.jpg'),
('P009', 'Busuk Hitam (Black Rot)', 'memotong buah yang terinfeksi berat (mummi), mengurangi kelembapan kebun, pembungkusan (pemberongsongan) buah dan aplikasi fungisida berbahan aktif tembaga, misalnya Kocide 77 WP atau Kasurmin 5/75 WP', '124-P Black Rot.jpg'),
('P010', 'Phylloxera', 'Melakukan penyemprotan insektisida yang mengandung bahan barnex dan numectin dan menaburkan nematisida seperti curater, furadan dan pentakur. Jangan lupa juga untuk melakukan sanitasi yang baik dan memangkas daun tanaman agar tidak terlalu rimbun.', '976-P. Phyloxerra.jpg'),
('P011', 'Busuk Kapang Kelabu (Gray Mould Rot)', 'Penanganan panen dan pascapanen yang baik agar tidak luka atau memar, pengangkatan buah dalam wadah bersuhu dingin 0°C, dan aplikasi fungisida yang mangkus pada waktu buah masih di kebun dengan Benlate atau Agroid 50 SD', '390-P busuk kapang kelabu.jpg'),
('P012', 'Daun Kipas (Fanleaf)', 'Aplikasi Nemagon untuk membunuh nematoda tanah, mencabut dan memusnahkan tanaman yang sakit berat, serta eradiksi (pembongkaran) tanaman untuk diremajakan kembali dengan bibit yang bebas virus.', '900-P daun kipas.jpg'),
('P013', 'Cendawan Tepung (Powdery Mildew)', 'Memotong bagian tanaman yang sakit berat untuk dibakar, menjaga kebersihan kebun, dan aplikasi fungisida yang mangkus seperti pada pengendalian penyakit tepung palsu.', '382-P cendawan tepung.jpg'),
('P014', 'Kutu Kebul', 'Menggunakan insektisida alami berbasis minyak gula apel (Annoa squamosa), piretrin, sabun insektisida, ekstrak kernel biji min=mba (NSKE 5%) atau minyak mimba (5 ml/l Air).', '197-P Kutu Kebul.jpg'),
('P015', 'Busuk Akar', 'Selalu memperhatikan dan memperbaikin drainese aliran air sehingga media tanam atau seputar tanaman anggur kita tidak tergenang. Mengurangi penggunaan pupuk berunsur Nitrogen tinggi dan mulai aplikasi pupuk berkalium untum memperkokoh bagian perakaran. Menaburkan kapur pertanian (dolomit) seputar tanaman. Memperhatikan & menjaga supaya jangan sampai perakaran terkena luka atau goresan benda tajam. Pemberian trichoderma dan PGPR dengan terget meminimalisir serangan patogen jahat.', '174-P busuk akar.jpg'),
('P016', 'Lalat Buah', 'Pasang perangkap serangga atau perangkap feromon untuk mendeteksi kehadirannya. Buang buah yang terinfeksi ke dalam kantung rangkap ke tempat sampah untuk di kumpulkan lebih lanjut.', '698-P Lalat Buah.jpg'),
('P017', 'Belalang', 'Semprot insektisida sistemik, seperti Perfekthion 400 EC', '654-P Belalang.jpg'),
('P018', 'Burung, Tikus, Tupai dan Kelelawar', 'Pembungkusan buah, menghalau hama dan memasang perangkap (trap) hama', '975-p BURUNG DKK.jpg'),
('P019', 'Nematoda', 'Penggenangan tanah yang terinfestasi nematoda selama beberapa bulan dapat mengurangi populasi nematoda, penanaman tanaman resisten, Penanaman tanaman perangkap pada lahan yang sudah terinfestasi nematoda akan sangat bermanfaat untuk mengurangi kepadatan populasinya dan mengurangi populasi nematoda dengan cara memelihara mikroba yang berlawanan (antagonis) misalnya Trichoderma harzianum.', '473-p nematoda.jpg'),
('P020', 'Kepik Kaki Daun', 'Penyemprotan insektisida yang memiliki bau tajam dan menyengat yang lebih berperan menghalau serangga hama seperti curacron, dharmabas, regent, manthene dengan interfal penyemprotan 2 kali sebulan atau disesuaikan dengan perkembangan hama atau dengan cara menggunakan jaring ayun pada saat embun pagi masih ada atau setelah hujan turun', '124-P Kepik Kaki Daun.jpg'),
('P021', 'Penggerek Batang', 'Pangkas bagian batang atau cabang yang terserang hama, lalu bakar Sumbat bekas lubang hama dengan serbuk biji mimba atau insektisida sistemik', '271-P penggerek.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_penyakit` varchar(50) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `user_id`, `nama_penyakit`, `rating`) VALUES
(1, 1, 'Cendawan Tepung (Powdery Mildew)', '5'),
(2, 1, 'Tungau Merah (Tetranychus sp.)', '5'),
(3, 1, 'Kutu Kebul', '5'),
(4, 1, 'Burung, Tikus, Tupai dan Kelelawar', '2'),
(5, 1, 'Karat Daun', '4'),
(6, 2, 'Kutu Kebul', '5'),
(7, 2, 'Belalang', '5'),
(8, 2, 'Burung, Tikus, Tupai dan Kelelawar', '5'),
(9, 1, 'Kumbang Daun (Apogonia sp.)', '4'),
(10, 1, 'Penggerek Batang', '3'),
(11, 1, 'Belalang', '3'),
(12, 3, 'Tungau Merah (Tetranychus sp.)', '5'),
(13, 3, 'Kumbang Daun (Apogonia sp.)', '4'),
(14, 3, 'Tepung Palsu (Valse Meeldauv, Downy Mildew)', '5'),
(15, 3, 'Karat Daun', '3'),
(16, 3, 'Lalat Buah', '4'),
(17, 4, 'Ulat Kantung (Mahasena corbetti Tams.)', '4'),
(18, 5, 'Karat Daun', '5'),
(19, 5, 'Tungau Merah (Tetranychus sp.)', '4'),
(20, 5, 'Tepung Palsu (Valse Meeldauv, Downy Mildew)', '5'),
(21, 5, 'Belalang', '3'),
(22, 6, 'Belalang', '3'),
(23, 6, 'Cendawan Tepung (Powdery Mildew)', '5'),
(24, 6, 'Tungau Merah (Tetranychus sp.)', '5'),
(25, 6, 'Kutu Kebul', '5'),
(26, 6, 'Burung, Tikus, Tupai dan Kelelawar', '2'),
(27, 7, 'Cendawan Tepung (Powdery Mildew)', '5'),
(28, 7, 'Tungau Merah (Tetranychus sp.)', '5'),
(29, 7, 'Kutu Kebul', '5'),
(30, 7, 'Burung, Tikus, Tupai dan Kelelawar', '2'),
(31, 7, 'Belalang', '2'),
(32, 8, 'Tungau Merah (Tetranychus sp.)', '5'),
(33, 8, 'Cendawan Tepung (Powdery Mildew)', '5'),
(34, 8, 'Kutu Kebul', '5'),
(35, 8, 'Karat Daun', '4'),
(36, 8, 'Kepik Kaki Daun', '1'),
(37, 9, 'Tungau Merah (Tetranychus sp.)', '4'),
(38, 9, 'Cendawan Tepung (Powdery Mildew)', '5'),
(39, 9, 'Kepik Kaki Daun', '2'),
(40, 10, 'Cendawan Tepung (Powdery Mildew)', '4'),
(41, 10, 'Tungau Merah (Tetranychus sp.)', '5'),
(42, 10, 'Burung, Tikus, Tupai dan Kelelawar', '2'),
(43, 10, 'Kepik Kaki Daun', '2'),
(44, 11, 'Cendawan Tepung (Powdery Mildew)', '5'),
(45, 11, 'Kutu Kebul', '4'),
(46, 11, 'Tungau Merah (Tetranychus sp.)', '4'),
(47, 11, 'Burung, Tikus, Tupai dan Kelelawar', '3'),
(48, 11, 'Karat Daun', '4'),
(49, 12, 'Tungau Merah (Tetranychus sp.)', '4'),
(50, 12, 'Kutu Kebul', '5'),
(51, 13, 'Tungau Merah (Tetranychus sp.)', '4'),
(52, 13, 'Cendawan Tepung (Powdery Mildew)', '5'),
(53, 13, 'Belalang', '3'),
(54, 13, 'Kepik Kaki Daun', '2'),
(55, 13, 'Kutu Kebul', '5'),
(56, 14, 'Tungau Merah (Tetranychus sp.)', '5'),
(57, 14, 'Cendawan Tepung (Powdery Mildew)', '5'),
(58, 14, 'Kutu Kebul', '4'),
(59, 14, 'Karat Daun', '3'),
(60, 14, 'Burung, Tikus, Tupai dan Kelelawar', '2'),
(61, 14, 'Lalat Buah', '2'),
(62, 15, 'Tungau Merah (Tetranychus sp.)', '5'),
(63, 15, 'Cendawan Tepung (Powdery Mildew)', '5'),
(64, 15, 'Kutu Kebul', '5'),
(65, 15, 'Lalat Buah', '3'),
(66, 15, 'Belalang', '2'),
(67, 16, 'Tungau Merah (Tetranychus sp.)', '5'),
(68, 16, 'Cendawan Tepung (Powdery Mildew)', '5'),
(69, 16, 'Burung, Tikus, Tupai dan Kelelawar', '3'),
(70, 16, 'Kepik Kaki Daun', '2'),
(71, 16, 'Penggerek Batang', '1'),
(72, 17, 'Tungau Merah (Tetranychus sp.)', '5'),
(73, 17, 'Cendawan Tepung (Powdery Mildew)', '4'),
(74, 17, 'Kepik Kaki Daun', '3'),
(75, 17, 'Burung, Tikus, Tupai dan Kelelawar', '2'),
(76, 17, 'Karat Daun', '4'),
(77, 18, 'Tungau Merah (Tetranychus sp.)', '4'),
(78, 18, 'Cendawan Tepung (Powdery Mildew)', '5'),
(79, 18, 'Lalat Buah', '4'),
(80, 18, 'Ulat Grayak (Spodoptera sp.)', '2'),
(81, 19, 'Tungau Merah (Tetranychus sp.)', '5'),
(82, 19, 'Cendawan Tepung (Powdery Mildew)', '4'),
(83, 19, 'Kutu Kebul', '5'),
(84, 19, 'Burung, Tikus, Tupai dan Kelelawar', '3'),
(85, 20, 'Tungau Merah (Tetranychus sp.)', '5'),
(86, 20, 'Ulat Kantung (Mahasena corbetti Tams.)', '3'),
(87, 20, 'Cendawan Tepung (Powdery Mildew)', '4'),
(88, 20, 'Kutu Kebul', '3'),
(89, 21, 'Tungau Merah (Tetranychus sp.)', '5'),
(90, 21, 'Lalat Buah', '3'),
(91, 22, 'Tungau Merah (Tetranychus sp.)', '5'),
(92, 22, 'Cendawan Tepung (Powdery Mildew)', '5'),
(93, 22, 'Kepik Kaki Daun', '2'),
(94, 22, 'Burung, Tikus, Tupai dan Kelelawar', '3'),
(95, 23, 'Tungau Merah (Tetranychus sp.)', '5'),
(96, 23, 'Burung, Tikus, Tupai dan Kelelawar', '3'),
(97, 24, 'Tungau Merah (Tetranychus sp.)', '5'),
(98, 24, 'Cendawan Tepung (Powdery Mildew)', '5'),
(99, 24, 'Ulat Grayak (Spodoptera sp.)', '3'),
(100, 24, 'Ulat Kantung (Mahasena corbetti Tams.)', '3'),
(101, 25, 'Tungau Merah (Tetranychus sp.)', '5'),
(102, 25, 'Cendawan Tepung (Powdery Mildew)', '4'),
(103, 25, 'Penggerek Batang', '2'),
(104, 26, 'Tungau Merah (Tetranychus sp.)', '5'),
(105, 26, 'Cendawan Tepung (Powdery Mildew)', '4'),
(106, 26, 'Kutu Kebul', '5'),
(107, 26, 'Burung, Tikus, Tupai dan Kelelawar', '3'),
(108, 27, 'Kutu Kebul', '5'),
(109, 27, 'Ulat Kantung (Mahasena corbetti Tams.)', '3'),
(110, 28, 'Cendawan Tepung (Powdery Mildew)', '4'),
(111, 28, 'Belalang', '2'),
(112, 28, 'Kepik Kaki Daun', '3'),
(113, 29, 'Tungau Merah (Tetranychus sp.)', '5'),
(114, 29, 'Cendawan Tepung (Powdery Mildew)', '5'),
(115, 29, 'Ulat Grayak (Spodoptera sp.)', '3'),
(116, 30, 'Tungau Merah (Tetranychus sp.)', '5'),
(117, 30, 'Cendawan Tepung (Powdery Mildew)', '4'),
(118, 30, 'Kepik Kaki Daun', '2'),
(119, 30, 'Burung, Tikus, Tupai dan Kelelawar', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nama`, `username`, `password`) VALUES
(1, 'Rio Aditya', 'rioaditya', 'rioaditya'),
(2, 'Wahyuntardi', 'wahyuntardi', 'wahyuntardi'),
(3, 'Putri KWT', 'putri', 'putri'),
(4, 'supri handoko', 'supri', 'supri'),
(5, 'Wiwit wijilestari', 'Wiwit', 'wiwit'),
(6, 'Lilik', 'Setia', '5758'),
(7, 'Yamtinah', 'yamtinah', '3442'),
(8, 'Irawati', 'irawati', 'irawati'),
(9, 'diva', 'diva', '6778'),
(10, 'yanti', 'yanti', 'yanti'),
(11, 'juwauk', 'juwauk', 'ju6721'),
(12, 'yuni', 'yuni', 'yuni'),
(13, 'darani', 'darani', '000000'),
(14, 'cicik', 'cicik', 'cicik'),
(15, 'herni', 'herni', 'herni'),
(16, 'Tri wulan', 'wulan', '1212'),
(17, 'joko', 'joko', 'joko'),
(18, 'sigit', 'sigit', 'sigit'),
(19, 'bemo', 'bemo', 'bemo'),
(20, 'nantini', 'antin', 'antin'),
(21, 'tri winarsih', 'arsih', 'arsih'),
(22, 'yanti santi', 'yantisanti', 'yantisanti'),
(23, 'heni', 'heni', '23232'),
(24, 'bambang', 'bambang', 'bambang'),
(25, 'sarjiyanti', 'sarji', 'sarji'),
(26, 'widayati', 'widayati', 'yati'),
(27, 'wahid', 'wahid', 'wahid'),
(28, 'uni hisyam', 'uni', 'uni'),
(29, 'mahyudi', 'mahyudi', 'mahyudi'),
(30, 'tanto', 'tanto', 'tanto'),
(31, 'Abhi', 'abhiyasa', '12345'),
(32, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indeks untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `id_diagnosa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
