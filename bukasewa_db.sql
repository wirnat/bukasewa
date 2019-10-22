-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 07:39 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukasewa_db`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`bukasewa`@`localhost` FUNCTION `digits` (`str` CHAR(32)) RETURNS CHAR(32) CHARSET latin1 BEGIN
  DECLARE i, len SMALLINT DEFAULT 1;
  DECLARE ret CHAR(32) DEFAULT '';
  DECLARE c CHAR(1);

  IF str IS NULL
  THEN 
    RETURN "";
  END IF;

  SET len = CHAR_LENGTH( str );
  REPEAT
    BEGIN
      SET c = MID( str, i, 1 );
      IF c BETWEEN '0' AND '9' THEN 
        SET ret=CONCAT(ret,c);
      END IF;
      SET i = i + 1;
    END;
  UNTIL i > len END REPEAT;
  RETURN ret;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id_beli` int(11) NOT NULL,
  `harga_jual` varchar(255) NOT NULL DEFAULT '0',
  `id_properti` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `id_fitur` int(11) NOT NULL,
  `fitur` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`id_fitur`, `fitur`, `icon`) VALUES
(1, 'Gym', 'flaticon-weightlifting'),
(2, 'Parkir', 'flaticon-transport'),
(3, 'Wifi', 'flaticon-wifi'),
(4, 'AC', 'flaticon-air-conditioner'),
(5, 'Kolam Renang', 'flaticon-people-2'),
(6, 'Alarm', 'flaticon-building'),
(7, 'Telepon', 'flaticon-old-telephone-ringing'),
(8, 'TV', 'flaticon-monitor'),
(9, 'Pemanas Air', 'flaticon-holidays'),
(10, 'Dapur', 'flaticon-bars'),
(11, 'Kebun', 'flaticon-building'),
(12, 'Ruang tamu', 'fa fa-group'),
(13, 'Kunjungan 24jam', 'fa fa-history'),
(14, 'Security', 'flaticon-security');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `img` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `img`) VALUES
(1, 'Kos', ''),
(2, 'Rumah', ''),
(3, 'Villa', ''),
(4, 'Tanah', ''),
(5, 'Apartemen', '');

-- --------------------------------------------------------

--
-- Table structure for table `kridibilitas`
--

CREATE TABLE `kridibilitas` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(250) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `tag`, `lat`, `lng`) VALUES
(1, 'UNUD', 'kampus', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_10_16_000945_create_beli_table', 0),
(2, '2019_10_16_000945_create_fitur_table', 0),
(3, '2019_10_16_000945_create_kategori_table', 0),
(4, '2019_10_16_000945_create_kridibilitas_table', 0),
(5, '2019_10_16_000945_create_lokasi_table', 0),
(6, '2019_10_16_000945_create_paket_table', 0),
(7, '2019_10_16_000945_create_properti_table', 0),
(8, '2019_10_16_000945_create_properti_fitur_table', 0),
(9, '2019_10_16_000945_create_properti_img_table', 0),
(10, '2019_10_16_000945_create_region_table', 0),
(11, '2019_10_16_000945_create_sewa_table', 0),
(12, '2019_10_16_000945_create_transaksi_table', 0),
(13, '2019_10_16_000945_create_users_table', 0),
(14, '2019_10_16_000947_add_foreign_keys_to_beli_table', 0),
(15, '2019_10_16_000947_add_foreign_keys_to_properti_table', 0),
(16, '2019_10_16_000947_add_foreign_keys_to_properti_fitur_table', 0),
(17, '2019_10_16_000947_add_foreign_keys_to_properti_img_table', 0),
(18, '2019_10_16_000947_add_foreign_keys_to_sewa_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `video` enum('Y','N') NOT NULL,
  `top_rekomen` enum('Y','N') NOT NULL,
  `max_gambar` int(3) NOT NULL,
  `free_ads` enum('Y','N') NOT NULL,
  `max_iklan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `waktu`, `harga`, `video`, `top_rekomen`, `max_gambar`, `free_ads`, `max_iklan`) VALUES
('0A', 'Free', '-', 'Rp.0', 'N', 'N', 3, 'N', 1),
('1A', 'Basic', '1 Bulan', 'Rp. 50.000', 'Y', 'N', 5, 'N', 3),
('2A', 'Pro', '2 Bulan', 'Rp. 300.000', 'Y', 'Y', 10, 'N', 5),
('3A', 'Platinum', '3 Bulan', 'Rp. 1.000.000', 'Y', 'Y', 10, 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` varchar(50) NOT NULL,
  `status` enum('sewa','jual') NOT NULL,
  `properti` varchar(255) NOT NULL,
  `id_user` int(11) UNSIGNED DEFAULT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kategori` int(11) NOT NULL,
  `kamar` int(11) NOT NULL,
  `toilet` enum('dalam','luar') NOT NULL DEFAULT 'dalam',
  `garasi` int(11) NOT NULL DEFAULT '0',
  `balkon` int(11) NOT NULL DEFAULT '0',
  `tv` int(11) NOT NULL DEFAULT '0',
  `diupdate_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deskripsi` text,
  `aktif` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `harga` varchar(250) DEFAULT NULL,
  `luasruangan` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `region` int(11) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `status`, `properti`, `id_user`, `lat`, `lng`, `alamat`, `kategori`, `kamar`, `toilet`, `garasi`, `balkon`, `tv`, `diupdate_pada`, `deskripsi`, `aktif`, `harga`, `luasruangan`, `whatsapp`, `region`, `dibuat_pada`) VALUES
('h5d8a2ae6c9dd5', 'sewa', 'Kos Gus Ade', 20, '-8.64401391284385', '115.18862880284428', 'Gg. Pudak No.3, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80118, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Fasilitas Komplit', 'aktif', 'Rp. 1.800.000/bulan', '3x4', '085792383251', 1, '2019-09-29 07:18:24'),
('h5d8a3494332d4', 'sewa', 'Pinang Mas Bali', 23, '-8.68198494818003', '115.19858516270756', 'Jl. Pulau Pinang No.2b, Dauh Puri Kauh, Kec. Denpasar Bar., Kota Denpasar, Bali 80113, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Fasilitas lengkap', 'aktif', 'Rp. 2.000.000/bulan', '3x4', '08123816575', 1, '2019-09-29 07:18:24'),
('h5d8b02cb55991', 'sewa', 'RAMA KOST', 28, '-8.714810805348854', '115.2166894551159', 'Jl. Rama No.5, Pedungan, Kec. Denpasar Sel., Kota Denpasar, Bali 80222, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Sebuah kost elite yang berlokasi di Jl. Rama, Sesetan, Denpasar Selatan. Bangunan 2 lantai ini terdiri dari 10 kamar dengan ukuran kamar 27 m2.\n\nFasilitas yang di dapat cukup lengkap. Kamar mandi dalam dengan shower, AC, spring bed, TV LED, lemari, selimut, balcony, jemuran, wi-fi, dapur setiap kamar yang terpisah dengan kamar tidur. Dan ada teras depan yang dilengkapi meja dan kursi untuk bersantai. Lingkungan tenang dan nyaman.\n\nLokasi mudah diakses ± 4 Menit ke Bali Wake Park & Aqualand, ± 5 Menit ke Benoa Toll Road, Lotte Mart, ± 10 Menit ke BIMC Hospital  Kuta, Mall Bali Galeria, Pantai Mertasari, RSUD. Bali Mandara, Wisata Hutan Mangrove, Pulau Serangan, ± 15 Menit ke Bandar Udara Internasional Ngurah Rai, Pantai Kuta, RSUP. Sanglah.\n\n*Max. 2 orang/kamar\n\n*Dilarang membawa hewan peliharaan\n\n*Listrik menggunakan token', 'aktif', 'Rp. 2.000.000/bulan', '27m2', '62813-3726-5973', 1, '2019-09-29 07:18:24'),
('h5d8b08e05864a', 'sewa', 'UNIQUE HOUSE BAKUNG SARI', 29, '-8.64255397079212', '115.26072921057278', 'Gg. Bakung Sari No.A27, Kesiman Kertalangu, Kec. Denpasar Tim., Kota Denpasar, Bali 80237, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Unique House Bakung Sari, Sebuah guest house yang berlokasi di Jl. Bakung, Gg. Bakung Sari No. A27, Kesiman, Denpasar Timur (Samping jogging track Desa Budaya Kertalangu). Bangunan 2 lantai ini terdiri dari 7 kamar dengan ukuran kamar yang berbeda. 2 kamar berukuran 7 x 3.5 m dan 5 kamar berukuran 5 x 3 m.\n\nGuest House ini memiliki fasilitas cukup lengkap, kamar mandi dalam dengan shower, wastafel, AC, spring bed, lampu tidur, TV satelit, lemari, selimut, cermin, dapur, balcony. Dan memiliki fasilitas sharing seperti ruang makan, meja makan, tempat parkir cukup luas. Lingkungan tenang, nyaman dan terdapat lintasan jogging.\n\nLokasi mudah diakses ±5 Menit ke Rumah Sakit Umum Dharma Yadnya, Taman Gong Perdamaian Kertalangu, ±10 Menit ke Big Garden Corner, Pantai Padang Galak, Pantai Biaung, ±15 Menit ke Pantai Sanur, Bali Bird Park, Taman Lumintang Denpasar, ±20 Menit ke BALI ZOO.\n\n*Max. 2 orang/kamar\n\n*Harga harian sudah termasuk listrik\n\n*Harga bulanan tidak termasuk listrik\n\n*Dilarang membawa hewan peliharaan\n\n*Menyediakan jasa transportasi berdasarkan permintaan', 'aktif', 'Rp. 1.900.000/bulan', '5 x 3 m', '6281337249094', 1, '2019-09-29 07:18:24'),
('h5d8b0c7f12e70', 'sewa', 'PINANG MAS GARDEN', 30, '-8.68205127104743', '115.19861422095187', 'Jl. Pulau Pinang No.1a, Dauh Puri Kauh, Kec. Denpasar Bar., Kota Denpasar, Bali 80113, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Pinang Mas Garden, sebuah kost dengan taman yang luas dan bergaya ukiran Bali yang berlokasi di Jl. Pulau Pinang No.3 Teuku Umar - Denpasar (di belakang Bank Mega). Kost ini memiliki ukuran kamar 8 x 4 meter.\n\nPinang Mas Garden memiliki 31 kamar dan setiap kamar mendapatkan fasilitas parkir mobil tepat di depankKamar. Fasilitas lain yang didapat cukup lengkap, kamar mandi dalam menggunakan shower dan wastafel, dapur, meja rias, ada ruang jemur pakaian dan ada teras depan dilengkapi meja/kursi untuk bersantai atau menerima tamu. Tempat parkirnya sangat luas, bisa untuk ± 60 motor dan ± 31 mobil. Lingkungan tenang dan nyaman. Pepohonan yang rindang membuat suasana kost sangat sejuk. Listrik Pulsa. \n\nLokasi mudah diakses dan sangat strategis. Berada di Pusat Kota dan hanya ±20 menit ke Airport Ngurah Rai, ±20 menit ke beberapa obyek wisata seperti Pantai Seminyak, Pantai Double Six dan Pantai Kuta.\n\n*Tidak diperbolehkan membawa hewan peliharaan\n\n*Boleh berkeluarga dengan membawa anak.\n\n\n\nHarga :\n\nHarian       : Rp 250.000 (include Listrik)\n\nMingguan   : Rp 1.400.000\n\nBulanan     : Rp 2.000.000 – Rp 2.500.000 (Bangunan dan Furniture Baru)', 'aktif', 'Rp. 2.300.000/bulan', '8 x 4 meter', '628123816575', 1, '2019-09-29 07:18:24'),
('h5d8b1c8900a1e', 'sewa', 'KELAPA GADING BALI', 31, '-8.641912810223214', '115.18629478157345', 'Jl. Kebo Iwa Selatan Gg. Klp. Gading No.10, Padangsambian Kaja, Kec. Denpasar Bar., Kota Denpasar, Bali 80118, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kelapa Gading Bali, kost elite bangunan 3 lantai berlokasi di Jln. Kebo Iwa Selatan, Gg. Kelapa Gading No. 8, Padang Sambian, Denpasar Barat (sekitar 500 meter selatan KFC dan Mc Donald’s Kebo Iwa). Search on Maps: Kelapa Gading Bali\n\n\n\nFasilitas Sharing :\n\n*Lobby\n*Free WiFi 20 mbps\n*Free Sharing Kitchen\n*Parkir Mobil & Motor\n*Gazebo\n*Taman\n\n\nFasilitas Kamar :\nRoom A\nHarga: Rp 150.000/malam, Rp 2.300.000/bulan\nFasilitas: Sofa, LED TV, AC, Kulkas, Spring Bed, Meja, Kursi, Lemari, Kamar Mandi Dalam, Shower\n\n\nRoom B\nHarga: Rp 200.000/malam, Rp 2.800.000/bulan\nFasilitas: Sofa, LED TV, AC, Kulkas, Spring Bed, Meja, Kursi, Lemari, Pantry, Kamar Mandi Dalam, Shower, Hot Water, kamar lebih luas\n\n\n\n*Harian mendapat handuk, sabun & aqua\n*Sewa 3 malam ada discount tambahan, sewa 1 minggu discount 1 malam\n*Harga harian sudah termasuk listrik, bulanan belum termasuk listrik\n*Untuk sewa bulanan tidak diperkenankan bawa mobil. Kecuali transit/drop\n\n\nLingkungan sangat tenang dan nyaman. Lokasi strategis, ±5 menit ke McDonald’s dan KFC Kebo Iwa, Mitra 10 Gatot Subroto, Puri Saron Hotel Denpasar, Polresta Denpasar, Bali TV, CitraLand Waterpark, ±10 menit ke Universitas Dhyana Pura, Stenden University Bali, BaliMed Hospital, ±15 menit ke Kerobokan, Canggu, Taman Lumintang Denpasar, Pusat Pemerintahan Kabupaten Badung.', 'aktif', 'Rp. 2.300.000/bulan', NULL, '6285286429511', 1, '2019-09-29 07:18:24'),
('h5d8b22e47e817', 'sewa', 'ADELIA SUNSET RESIDENCE', 32, '-8.653815766247089', '115.18034102233503', 'Gg. Korawa No.6, Kerobokan Kaja, Kec. Kuta Utara, Kabupaten Badung, Bali 80117, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Sebuah kost elit aman dan nyaman, yang berlokasi di Jl. Gunung Guntur, Gg. Korawa No. 6 Padang Sambian, Denpasar Barat. Bangunan 2 lantai ini terdiri dari 11 kamar\n\nTipe kamar 3,5x5 m :\n\nUkuran kamar 3,5 x 5m. Fasilitas : LED TV/TV Cable, AC, Springbed, Lemari, Meja & Kursi, Kamar Mandi Dalam, Shower, Dapur umum\n\nTipe kamar 3,5x5 m + Kulkas :\n\nUkuran kamar 3,5 x 5m. Fasilitas : AC, LED TV, Springbed, Lemari, Meja & Kursi, Kamar Mandi Dalam, Shower, Kulkas, Dapur Umum\n\nTipe kamar 7x8 m, hanya 2 unit :\n\nFasilitas :\n\nKamar tidur lengkap (Lemari, Springbed, Meja & Kursi, LED TV/TV Cable, Kulkas)\nRuang Tamu Pribadi (Sofa, Meja)\nDapur Pribadi (Kompor, dll)\nKamar Mandi Dalam (Shower + Water Heater)\n\n\nLokasi mudah diakses dan sangat strategis, dekat ke Pusat Kota Denpasar, hanya 10 menit ke Rumah Sakit Bali Med.\n\n\n\n*maksimal 2 orang/kamar\n*harga sudah termasuk listrik untuk harian\n*tersedia dapur umum lengkap dengan peralatan memasak\n*harga bulanan belum termasuk listrik\n*parkir mobil dan motor, WIFI & CCTV', 'aktif', 'Rp. 2.000.000/bulan', '3,5x5 m', '6281999081944', 1, '2019-09-29 07:18:24'),
('h5d8b30e096a50', 'sewa', 'SPERANZA RESIDENCE', 33, '-8.685174948035487', '115.19037473497701', 'Jl. Gn. Soputan Gg. Segina No.14, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Speranza Residence, Sebuah kost elite berlokasi di Jl. Mahendradatta Selatan 1 No. 32, Pemecutan Klod, Denpasar Barat. Bangunan 3 lantai ini memiliki 24 kamar Mezzanine Style (Kamar Tidur di Lantai Atas Lantai Bawah Ruang tamu).\n\nMasing-masing kamar di lengkapi AC, Tempat Tidur, Lemari Pakaian, Meja Rias, Cermin dan TV LED pada ruang lantai atas. Pada ruang lantai bawah terdapat Ruang Tamu pribadi cukup luas dengan Sofa, Kabinet. Kamar Mandi Dalam dengan Bath tub/Shower dan Air panas. Memiliki Dapur pribadi dan dilengkapi Lemari Es, Kursi & Meja Makan (Khusus VIP), Ruang Jemur, Jemuran. Fasilitas sharing ada Kolam Renang, Dapur Umum, Parkir Mobil dan Parkir Motor, sumber air Sumur, Ruang Jemur, CCTV, Taman dan Wi-fi.\n\nLingkungan sangat tenang dan nyaman, ± 3 Menit ke tempat makan cepat saji ( Burger King, Pizza Hut, McDonald\'s, KFC ), ± 5 Menit ke Rumah Sakit Ibu dan Anak Pucuk Permata Hati, Klinik Penta Medika, ± 10 Menit ke Trans Studio Mall Bali, Dream Museum Zone (DMZ), ± 15 Menit ke Pantai Kuta, ± 20 Menit ke Cocoon Beach Club, Pantai Double Six, La pLancha, Ku De Ta Bali.\n\n*Max. 2 Orang/Kamar\n\n*Bisa untuk berkeluarga\n\n*Belum termasuk listrik (Rp 2.000/Kwh)\n\n*Tahunan diskon 20%\n\n*Deposit Rp 500.000\n\n*Iuran sampah Rp 100.000/Bulan\n\n*Tidak boleh membawa hewan peliharaan\n\n*Pergantian Sheet/Linen 1 x seminggu (diluar service ini dekenakan biaya tambahan)\n\nHarga Bulanan :\n\nRp 3.000.000 ( Lantai 3 )\n\nRp 3.250.000 ( Lantai 2 )\n\nRp 3.500.000 ( Lantai 1 Biasa )\n\nRp 4.000.000 ( Lantai 1 VIP )', 'aktif', 'Rp. 3.000.000/bulan', NULL, '6281353996810', 1, '2019-09-29 07:18:24'),
('h5d8b35dd78fbc', 'sewa', 'HOMMY RESIDENCE', 34, '-8.680430199100208', '115.19260197275844', 'Gg. Buntu I A No.9, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Homy Residence, sebuah kost elit dan privat berlokasi di Jl. Pura Demak I (daerah Teuku Umar Barat/ Marlboro), Gg. 1A/ 9, Denpasar Barat, Bali. Bangunan 3 lantai ini memiliki 25 kamar dengan tipe yang berbeda di tiap lantainya. Kamar lantai 1 berukuran (4x3) M = 8 kamar dengan single bed, kamar lantai 2 berukuran (5x3) M = 10 kamar dengan double bed dan kamar lantai 3 berukuran (4x4) M = 7 kamar dengan double bed. Kami juga menyediakan extra bed untuk tamu yang membutuhkan.\n\nFasilitas kamar, fasilitas lingkungan dan fasilitas yang dapat ditemui di lokasi sekitar adalah seperti tercantum di atas. Tersedia area duduk untuk bersantai atau menerima tamu indoor (no smoking area) dan outdoor (smoking area). Parkir cukup luas kapasitas untuk ± 6 mobil dan ± 15 sepeda motor. Jalan masuk ke Homy Residence dapat diakses dengan kendaraan roda 4 sekelas Elf.\n\nLokasi sangat strategis dan aksesibel. Hanya ± 15 menit ke/dari Seminyak - Kuta dan Pantai Canggu, ± 30 menit ke/dari Bandara Ngurah Rai (lalu lintas dalam keadaan normal).\n\nTidak diperkenankan untuk membawa binatang peliharaan, barang-barang ilegal & haram serta melakukan tindakan asusila & kriminal.\n\nKami menerima tamu single, berpasangan (menikah) dan berkeluarga dalam bentuk perorangan maupun grup untuk harian, mingguan dan bulanan.\n\nUntuk harga (room only) harian, mingguan dan bulanan adalah seperti tercantum di atas. Harga sudah termasuk layanan housekeeping dan listrik. Kecuali untuk kost bulanan belum termasuk biaya listrik.\n\nSilakan hubungi & kunjungi Kami untuk info lebih lanjut. Terima kasih :)\n\n..... feels homy while you are far away from home .....\n\nDaily        :\n\nLt. 1 : Rp 185.000/r/n\n\nLt. 2 : Rp 230.000/r/n\n\nLt. 3 : Rp 275.000/r/n\n\nMonthly    :\n\nLt. 1 : Rp 1.600.000/room/month/person\n\nLt. 2 : Rp 1.850.000/room/month/person\n\nLt. 3 : Rp 2.100.000/room/month/person\n\n*Khusus untuk sewa kamar dengan hunian 2 orang di kamar dengan double bed, harga sewa menjadi Rp 2.100.000/r/m di (Lt. 2) dan Rp 2.300.000/r/m (Lt. 3)\n\n*biaya listrik Rp 3.000/kwh\n\n \nwww.homyresidence.com', 'aktif', 'Rp. 1.600.000/bulan', '4x4', '6282144776565', 1, '2019-09-29 07:18:24'),
('h5d8b3d6c50e2f', 'sewa', 'KAMANDAKA', 35, '-8.664075050727801', '115.20217982335964', 'Gn. Karang III Gg. III No.6, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80112, Indonesia', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'Kamandaka berlokasi di Jl. Gn. Karang III, Gg.Jenggala, Pemecutan Klod, Denpasar BaratKota Denpasar, Bali. fasilitas Kamar Mandi Dalam, dan area Parkir Luas. \nHarga\nBulanan : Rp 700.000/bulan ( memiliki luas kamar 3m x 5m )\nBulanan : Rp 900.000/bulan ( memiliki luas kamar 4m x 5,5m )\n\n*free air, dan listrik token\n*iuran sampah Rp 10.000/bulan', 'aktif', 'Rp. 700.000/bulan', NULL, '6282144736771', 1, '2019-09-29 07:18:24'),
('h5d8cc2a2a06d4', 'sewa', 'PONDOK ANJANI', 37, '-8.655872601625807', '115.1908201848114', 'Gg. Pdg Kluma Jl. Padang Gajah No.7, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80118, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Pondok Anjani, Sebuah kost elite yang berlokasi di Jl. Padang Gajah Gg. Pdg Kluma, Padangsambian, Denpasar Barat, Kota Denpasar. Bangunan 2 lantai ini hanya terdiri dari 7 kamar dengan ukuran kamar 5 x 6 m.\n\nFasilitas yang di dapat cukup lengkap. Kamar mandi dalam dengan air panas dan shower, AC, Queen size bed (160 x 200) feather bed, TV LED channel premium, lemari pakaian, dapur mini. Memiliki teras depan dan balkon, CCTV, Wi-fi, area parkir mobil dan motor cukup luas. Lingkungan tenang dan nyaman.\n\nLokasi mudah diakses dan sangat strategis, hanya ± 3 Menit ke Balimed Hospital, Stadion Kompyang Sujana, ± 5 Menit ke Polresta Denpasar, Clandy\'s, ± 10 menit ke POP! Hotel Denpasar, HARRIS Hotel & Conventions Denpasar, Dinas Kesehatan Kota Denpasar, Aston Denpasar Hotel & Convention Center, Karang Kurnia (tempat oleh-oleh), ± 15 menit ke Dinas Sosial Kota Denpasar, Dinas Kependudukan dan Pencatatan Sipil Kota Denpasar, Dinas Lingkungan Hidup dan Kebersihan Kota Denpasar, Taman Lumintang Denpasar, Plaza Telkom Indonesia, Universitas Dhyana Pura, Kerobokan, Canggu.\n\n*Max. 2 orang/kamar\n\n*NO PETS\n\n*Listrik menggunakan token\n\n*Free room service\n\n*Extra charge laundry on call\n\n*Tambahan biaya lebih dari 1 orang per kamar (extra Bed) :Rp 50.000/orang', 'aktif', 'Rp. 1.800.000/bulan', '5x6', '6281237551002', 1, '2019-09-29 07:18:24'),
('h5d8cc87c94d12', 'sewa', 'KOST GRAHA DEMAK', 38, '-8.679874292404312', '115.19179474325142', 'Gg. Pura Demak II No.23, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Kost Graha Demak berlokasi di Jl. Pura Demak II No.23, Pemecutan Klod, Denpasar Barat, Kota Denpasar, Bali. fasilitas: AC, TV LED, Set Bed 160x200 + Bantal Guling & Sprei, Kitchen Sink, Wifi, Kamar Mandi Dalam, Shower.\n\nHarga: 1.400.000/Bulan (sudah termasuk air)\n\n*1 kamar maksimal 2 orang (tidak yang berkeluarga)\n\n*tidak boleh bawah hewan peliharaan apapun\n\n*free wifi, dan listrik token', 'aktif', 'Rp. 1.400.000/bulan', NULL, '6281238700352', 1, '2019-09-29 07:18:24'),
('h5d8ccb00cec3a', 'sewa', 'MELI KOST', 39, '-8.637507819195559', '115.18714909526636', 'Jl. Tegal Dukuh I No.15, Padangsambian Kaja, Kec. Denpasar Bar., Kota Denpasar, Bali 80118, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Meli Kost, merupakan sebuah kost dengan fasilitas lengkap yang berlokasi di Jl. Tegal Dukuh 1 No. 3, Padang Sambian Kaja, Denpasar Barat.\n\n\n\nBangunan 2 lantai ini hanya memiliki 4 kamar 3 x 4 meter dengan 2 tipe, tipe kamar mandi dalam dan tipe kamar mandi luar. Masing-masing kamar dilengkapi fasilitas seperti AC, tempat tidur, lemari pakaian, kursi dan meja. Kamar mandi dalam dan kamar mandi luar masing-masing dengan shower dan air panas. Tersedia dapur sharing dengan kompor listrik, kulkas dan meja makan, ruang tamu sharing dengan TV, ruang jemur, parkir mobil dan motor, WIFI.\n\nLingkungan sangat tenang, nyaman dan strategis. Hanya ±10 menit ke Universitas Dhyana Pura, Stenden University, Poltabes Denpasar, Taman Kota Lumintang, RSIA Puri Bunda Denpasar, ±3 menit ke Bank Mandiri Gatsu Barat, BNI Gatsu Barat, ±15 menit ke Balimed Hospital, ±20 menit ke Pusat Kota Denpasar, ±25 menit ke Canggu Beach.\n\n\n\n*Maks. 2 orang/kamar\n\n*Tidak boleh membawa hewan peliharaan\n\n*Tidak boleh berisik\n\n*Listrik Rp 2.500/kwh\n\n*Free pembersihan 1x/bulan\n\n*Free aqua, kompor listrik dan kulkas', 'aktif', 'Rp. 1.800.000/bulan', '3x4', '6281284186808', 1, '2019-09-29 07:18:24'),
('h5d8d60ca9b993', 'sewa', 'evelyn gateway pasteur', 41, '-6.90012992224752', '107.59876622456659', 'Jl. Pasteur No.132, Pasteur, Kec. Sukajadi, Kota Bandung, Jawa Barat 40161, Indonesia', 5, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'fasilitas lengkap', 'aktif', 'Rp. 2.500.000/bulan', '3x4', '081276437403', 4, '2019-09-29 07:18:24'),
('h5d8d641b77c61', 'sewa', 'evelyn,jardin apartemen', 44, '-6.9018767039916495', '107.60445250767816', 'Jl. Cihampelas No.64, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116, Indonesia', 5, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Fasilitas Lengkap', 'aktif', 'Rp. 2.500.000/bulan', '3x4', '081276437403', 4, '2019-09-29 07:18:24'),
('h5d8d811b2fddd', 'sewa', 'KOST GRAND EMERALD', 45, '-8.678057051379783', '115.19077324615364', 'Jl. Mahendradatta No.9, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kost Grand Emerald tempat kost yang nyaman,tenang, elite, aman dan dekat ke kuta dekat pula ke pusat kota. lokasi yang strategis di pinggir jalan utama Mahendradatta memudahkan untuk ke mana-mana. banyak tempat makan di daerah sekitar mulai yg murah, food court sampai resto yg mahal, 100m dari Pizza Hut Mahendradatta, Burger King, Mc Donald, dan KFC. dekat dengan super market, Sekolah, RS dll. 10 menit ke seminyak, 15 menit ke kuta, 20 menit ke pantai kuta,10 menit ke kampus unud kota, 25 menit ke Airport berkendara', 'aktif', 'Rp. 1.700.000/bulan', NULL, '6281337671234', 1, '2019-09-29 07:18:24'),
('h5d8dc36725764', 'sewa', 'The Jardin', 46, '-6.9021908780142684', '107.60451725371092', 'Jl. Cihampelas No.56B, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116, Indonesia', 5, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'fasilitas lengkap', 'aktif', 'Rp. 3.000.000/bulan', '3x4', '0819819994', 4, '2019-09-29 07:18:24'),
('h5d8dc78367d65', 'sewa', 'The jardin', 47, '-6.901924600902504', '107.60458162672728', 'Jl. Cihampelas No.62, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116, Indonesia', 5, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'fasilitas lengkap', 'aktif', 'Rp. 3.500.000/bulan', '3x4', '0819819994', 4, '2019-09-29 07:18:24'),
('h5d8e1b5a35c71', 'sewa', 'PONDOK RAHAYU', 48, '-8.633194325993388', '115.18197540228039', 'Jl. Baja Taki No.2, Padangsambian Kaja, Kec. Denpasar Bar., Kota Denpasar, Bali 80117, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Pondok Rahayu berlokasi di Jl. Baja Taki No.2, Padangsambian Kaja, Denpasar Barat, Kota Denpasar, Bali. fasilitas AC, Kamar Mandi Dalam, Tempat Tidur, TV LED, Lemari, Kursi, Selimut, Bantal, Dan area parkir sangat luas. lingkungan sangat  strategis aman, nyaman, dan bersih.\n\nHarga\n\n150.000/harian ( AC )\n\n120.000/harian ( kipas )\n\n900.000/mingguan ( AC )\n\n700.000/mingguan ( kipas )', 'aktif', 'Rp. 150.000/hari', NULL, '6285739740556', 1, '2019-09-29 07:18:24'),
('h5d8e1c04a63e4', 'sewa', 'villa tehila', 49, '-8.657619', '115.17292080000004', 'Jl. Raya Kedampang No.88, Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bali 80361, Indonesia', 3, 1, 'dalam', 0, 0, 0, '2019-10-16 07:23:39', 'fdfsdfsfsfsd', 'aktif', 'Rp. 200.000/bulan', NULL, '081312225130', 1, '2019-09-29 07:18:24'),
('h5d8e21721211a', 'sewa', 'HANDIKA JAYA', 50, '-8.663172880837488', '115.18639411831896', 'Gg. Buana Mekar II No.2, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'Handika Jaya, Sebuah kost bangunan 2 lantai ini memiliki ukuran kamar 3.5 x 6 m yang berlokasi di Jl. Buana Raya, Gg. Buana Mekar II No. 6, Padang Sambian, Denpasar Barat.\n\nFasilitas yang dapat cukup lengkap. Kamar mandi dalam menggunakan shower, AC, spring bed, lemari, dapur setiap kamar yang terpisah dengan kamar tidur. Lingkungan tenang dan nyaman.\n\nLokasi mudah diakses dan sangat strategis, hanya ± 5 Menit ke Warung Mina Padangsambian, Balimed Hospital, Stadion Kompyang Sujana, ± 10 Menit ke Poltabes Denpasar, Kerobokan, Dinas Kependudukan dan Pencatatan Sipil Kota Denpasar, Clandys Buluh Indah, KFC, McDonald\'s, Richeese Factory, Golden Tulip, ± 15 Menit ke Aston Denpasar Hotel, Canggu, Kuta, Plasa Telkom Indonesia.\n\n*Mak. 2 orang/kamar\n\n*NO PETS\n\n*Biaya listrik Rp 2.000/kwh', 'aktif', 'Rp. 1.300.000/bulan', '3.5x6', '6289602275871', 1, '2019-09-29 07:18:24'),
('h5d8e23e61fce8', 'sewa', 'KUBU LAND', 51, '-8.686322869040898', '115.18908703837894', 'Jl. Kebak Sari No.1, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 0, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kubu Land, sebuah hunian nyaman 2 lantai berlokasi di Jl. Kebak Sari No. 1, Denpasar Barat, Bali. Dengan konsep antara hunian kota dan hotel Kubu Land berada di lokasi yang sangat strategis, sangat cocok untuk traveler, bisnis, perkantoran.\n\n\nTersedia 10 kamar dengan fasilitas standar hotel. Masing-masing kamar dilengkapi tempat tidur double bed, dengan bedsheet lengkap, lemari pakaian, smart TV, AC, mineral water. Ada dapur mini dengan kulkas, kamar mandi dalam dengan shower, wastafel, air panas dan perlengkapan mandi, plus Free WiFi. Fasilitas sharing tersedia parkir mobil dan motor, serta petugas kamar/room attendant.\n\n\n\nKubu Land menawarkan kenyamanan dan privasi demi kenangan indah selama tinggal dan liburan di Bali. Kubu Land merupakan hunian nyaman yang berlokasi di Pusat Kota Denpasar Bali, ±5 menit ke Trans Studio Mall Bali, McDonald’s Teuku Umar, Pusat Bisnis di sekitar Teuku Umar dan Mahendradata, ±15 menit ke Pantai Kuta, Beachwalk Bali, ±18 menit ke Seminyak Beach, ±20 menit ke daerah Kerobokan dan Canggu, ±20 menit ke Pusat Pemerintahan Kota Denpasar.\n\n\n\n*Tidak boleh membawa hewan peliharaan\n\n*Harga sudah termasuk listrik\n\n*Maks. 2 orang/kamar', 'aktif', 'Rp. 3.500.000/bulan', NULL, '6287845000234', 1, '2019-09-29 07:18:24'),
('h5d8e260ec0957', 'sewa', 'HAIDAKHANDI', 52, '-8.667586590561086', '115.21477250748751', 'Jl. Diponegoro No.142b, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80114, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Haidakhandi Kost\n\nSebuah kost berperabotan (furnished) berlokasi di Jl. Diponegoro No. 142 A, Denpasar. Bangunan kost ini memiliki 5 kamar dengan ukuran kamar dan fasilitas yang bervariasi, sebagai berikut :\n\n\n\n* 2 kamar ukuran 4,2 x 6 meter, dengan fasilitas : tempat tidur, meja/kursi, lemari pakaian, ceiling fan/AC, sofa, kamar mandi dalam dan dapur.\n\n* Kamar ukuran 2,5 x 6 meter dengan fasilitas : AC, ceiling fan, TV, lemari pakaian, tempat tidur, meja, kursi, kamar mandi dalam dengan bath tub dan wastafel.\n\n* Kamar ukuran 5,7 x 3 meter dengan fasilitas : AC, tempat tidur, lemari pakaian, meja, kursi, kamar mandi dalam dan dapur.\n\n* Kamar ukuran 3,2 x 6 meter dengan fasilitas : AC, tempat tidur, lemari pakaian, meja, kursi, dapur dan kamar mandi dalam.\n\n\n\nSelain fasilitas diatas, disediakan juga ruang laundry dan ruang jemur bersama, parkir motor, halaman. Sumber air menggunakan PDAM dan KWH pulsa dimasing-masing kamar.\n\n\n\nAvailable 2 kamar disewakan untuk harian dan mingguan,\n\nSingle bed: Rp 100.000/malam, Rp 750.000/minggu\n\nDouble bed: Rp 150.000/malam, Rp 950.000/minggu\n\nFasilitas lengkap, tempat tidur, AC, ceiling fan, kamar mandi dalam dengan air panas, dapur dengan peralatan memasak, kulkas dan mesin cuci sharing.\n\n\n\nKost ini berada dikawasan Pusat Kota Denpasar, lingkungan tenang dan nyaman, lokasi sangat strategis 2 menit ke Pizza Hut Diponegoro, 5 menit ke Ramayana Mall Diponegoro, 10 menit jalan kaki ke Level 21 Mall, 10 menit berkendara ke Lapangan Puputan, Renon dan Kampus Udayana Sudirman.\n\n\n\n*tidak boleh membawa hewan peliharaan\n\n*biaya air dan sampah Rp 100.000/orang/bulan\n\n*harga harian dan mingguan sudah termasuk listrik\n\n*harga bulanan belum termasuk biaya listrik\n\n*bisa untuk keluarga dengan anak (khusus bulanan)\n\n*untuk sewa harian dan mingguan maks. 2 orang/kamar, tambahan Rp 50.000/orang/malam utk tambahan orang per kamar\n\n*Pembayaran kost melalui bank transfer\n\nBCA a/n I Gede Gatot Binawa Rata : 890 535 2942\n\n\n\nHarga :\n\nKamar 4,2 x 6 meter : Rp 1.700.000/bulan\n\nKamar 2,5 x 6 m – 3,2 x 6 m : Rp 1.200.000/bulan', 'aktif', 'Rp. 1.200.000/bulan', '2.5x6', '6283115695913', 1, '2019-09-29 07:18:24'),
('h5d8e2980d19a3', 'sewa', 'KOST KRISNA BHARATA', 53, '-8.651270813387846', '115.18146843594059', 'Jl. Gunung Guntur No.25, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kost Krisna Bharata, sebuah kost elit bangunan baru berlokasi di Perumahan Taman Sepa II No. 2A, Jl. Gunung Guntur, Padang Sambian, Denpasar Barat. Bangunan 2 lantai ini terdiri dari 8 kamar super nyaman dan cukup luas ukuran 3.5 x 7 meter.\n\n\n\nMasing-masing kamar memiliki 1 ruang kamar tidur, dapur terpisah, kamar mandi dalam dengan shower dan air panas, ruang jemur dan teras depan. Fasilitas lengkap ada tempat tidur spring bed, TV LED, AC, furniture seperti meja, kursi dan lemari pakaian. Tersedia parkir bersama untuk motor dan 2 mobil. Sumber air menggunakan sumur bor dan sudah termasuk dalam biaya sewa.\n\n\nLokasi mudah diakses dan cukup strategis, dekat ke Polresta Denpasar, Coco Mart Gunung Sanghyang, ±20 menit ke Lapangan Puputan Badung, Taman Kota Lumintang, Aston Denpasar Hotel & Convention Center, Rumah Sakit Umum Wangaya, Canggu, Taman Segara Madu Waterpark, ±10 menit ke Ace Hardware, KFC Kebo Iwa dan Universitas Dhyana Pura, ±15 menit ke Dalung dan Kerobokan, ±30 menit ke Pusat Kota Denpasar.\n\n \n\n*maksimal 2 orang/kamar\n\n*harga sudah termasuk listrik untuk harian\n\n*harga bulanan belum termasuk listrik\n\n*no pets', 'aktif', 'Rp. 1.800.000/bulan', '3.5x7', '628179783553', 1, '2019-09-29 07:18:24'),
('h5d8e2bf554183', 'sewa', 'KOST NEPTUNUS', 54, '-8.678174530940591', '115.2072256069016', 'Jl. Neptunus No.8, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80114, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kost Neptunus, sebuah kost yang berlokasi di Jl. Neptunus Gang I No. 3E dan 3F, Pulau Kawe - Denpasar. Hanya terdiri dari 10 kamar dengan luas kamar yang berbeda yaitu 7 x 4 meter dan 9 x 3,5 meter.\n\nDengan fasilitas yang cukup lengkap. Kamar mandi dalam menggunakan shower, Ada dapur dan teras depan untuk bersantai. Untuk listrik menggunakan token. Lingkungan tenang dan nyaman. Tempat parkir cukup luas bisa untuk ±3 mobil dan ±10 motor.\n\nLokasi mudah diakses dan sangat strategis, ±15 menit Pusat Kota.\n\n\n\nHarga : Rp 1.900.000 – Rp 3.000.000', 'aktif', 'Rp. 1.900.000/bulan', '9x3.5', '628123945120', 1, '2019-09-29 07:18:24'),
('h5d8f65d2cf7ab', 'sewa', 'PONDOK SURYA NING', 55, '-8.686796214413198', '115.18624494556661', 'Jl. Gn. Soputan No.1, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Pondok Surya Ning, sebuah kost bangunan baru dengan luas kamar 3,5 x 8 meter yang berlokasi di Jl. Gunung Soputan No. 1, Mahendradata Selatan. Hanya terdiri dari 10 kamar. 5 kamar di lantai satu dan 5 lantai di lantai 2.\n\n \n\nDengan fasilitas yang cukup lengkap. Kamar mandi dalam menggunakan shower dan wastafel, ada dapur dan teras depan untuk bersantai. Menggunakan listrik pulsa. Lingkungan tenang dan nyaman. Tempat parkir cukup luas bisa untuk ±3 mobil dan ±10 motor.\n\n \n\nLokasi mudah diakses dan sangat strategis, ±8 menit ke Pusat Kota.\n\nHarga :\n\nHarian : Rp 250.000\n\nMingguan : Rp 1.750.000\n\nBulanan : Rp 2.500.000 - 3.000.000', 'aktif', 'Rp. 2.500.000/bulan', '3.5x8', '6281236091899', 1, '2019-09-29 07:18:24'),
('h5d8f6a6a79f02', 'sewa', 'OELLE HOMESTAY', 56, '-8.690152497536634', '115.19653837051169', 'Gg. Merta Gangga No.6, Pemogan, Kec. Denpasar Sel., Kota Denpasar, Bali 80113, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Oelle Homestay berlokasi di Jl. Tukad Baru Gg. Mertha Gangga 9, Pemogan, Denpasar Selatan, Kota Denpasar, Bali.\nfasilitas AC, Air Panas, Wifi, Dapur Mini, Tempat Tidur, Jemuran, Kamar Mandi Dalam, Lemari, Lemari Es, Meja Rias, Kursi, Shower, TV LED, Wastafel, Parkir Mobil Public, dan Parkir Motor. lingkungan bersih, aman, dan nyaman.', 'aktif', 'Rp. 2.500.000/bulan', NULL, '6287862126621', 1, '2019-09-29 07:18:24'),
('h5d8f6d1a15d1f', 'sewa', 'KOST SANDI SEDANA', 57, '-8.658635107196874', '115.250355553291', 'Gg. Rampai II No.5, Sumerta Kelod, Kec. Denpasar Tim., Kota Denpasar, Bali 80237, Indonesia', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'Kost Sandi Sedana berlokasi di Jl. Sedap Malam Gg. Rampai II, Kesiman Kelod, Denpasar Timur, Kota Denpasar, Bali, suana aman,nyaman dan bersih. memiliki fasilitas AC, Kamar Mandi Dalam, Tempat Tidur, Lemari, Dapur, Shower, dan Area Parkir.\n\n*tidak menerima penghuni yang mempunyai anak kecil dibawah 6 tahun\n\n*bertamu sampai jam 11 malam\n\n*ikut menjaga kebersihan area\n\n*listrik token\n\n*tidak membawa hewan peliharaan', 'aktif', 'Rp. 1.500.000/bulan', NULL, '6285903715896', 1, '2019-09-29 07:18:24'),
('h5d8f7090ae78f', 'sewa', 'KOS DEWA BHARATA', 58, '-8.64139358745375', '115.20123748966057', 'Jl. Bung Tomo IB No.2, Pemecutan, Kec. Denpasar Utara, Kota Denpasar, Bali 80111, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Rumah Kos Dewa Bharata, kost fasilitas lengkap berlokasi di Jln. Bung Tomo I B No. 2, Gatot Subroto Barat, Denpasar Bali. Kost bangunan 2 lantai ini memiliki 16 kamar superior.\n\nMasing-masing kamar dilengkapi kamar tidur, dapur, kamar mandi dalam dengan shower dan air panas, furniture, TV LED dan spring bed. Fasilitas bersama ada parkir atau garasi mobil di dalam dan WIFI.\n\nLokasi sangat mudah diakses dan strategis. Dekat ke Aston Hotel Gatot Subroto, Clandys Buluh Indah, Hanya ± 10 menit ke Pusat Kota dan Taman Kota, 15 menit ke Rumah Sakit Manuaba dan Bali Med, 30 menit ke Seminyak.\n\n*No pets\n\n*Listrik pulsa isi sendiri\n\n*Maks. 2 orang/kamar', 'aktif', 'Rp. 2.300.000/bulan', NULL, '6282147547566', 1, '2019-09-29 07:18:24'),
('h5d8f73330f396', 'sewa', 'WANAKELING HOMESTAY', 59, '-8.657842100773827', '115.14736129828293', 'Jl. Pantai Berawa No.9, Tibubeneng, Kec. Kuta Utara, Kabupatén Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Wanakeling Homestay, homestay bangunan 2 lantai dengan 3 kamar berlokasi di Br. Tegal Gundul, Ds. Tibubeneng, Jln. Pantai Berawa No. 07, Canggu, Bali.\n\nKamar berukuran 6 x 8 meter ini masing-masing dilengkapi kamar mandi dalam dengan air panas, shower dan wastafel. Ada furniture, TV LCD dan teras depan atau balcony. Tersedia dapur dengan kitchen set, kulkas sharing, taman, WIFI, parkir untuk mobil dan motor.\n\nLingkungan sangat tenang, nyaman dan strategis. ±5 menit ke Splash Waterpark, Finn’s Recreation Club, ±10 menit ke Finn’s Beach Club, La Laguna, Pantai Kayu Putih, Pantai Berawa, Pantai Batu Belig.\n\n*Maksimal 2 orang per kamar\n\n*Boleh membawa hewan peliharaan\n\n*Harga sudah termasuk listrik\n\n*Room cleaning 2x dalam sebulan', 'aktif', 'Rp. 4.500.000/bulan', '6x8', '6281238134230', 1, '2019-09-29 07:18:24'),
('h5d9054a6180fe', 'sewa', 'DARMAGA BEACH INN', 60, '-8.707214630961193', '115.16913476432', 'Gg. VIII No.1, Legian, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Darmaga Beach Inn, sebuah guest house yang berlokasi di Jl. Sahadewa, Gg. VIII No. 1 – Legian, Kuta (belakang Pulu Resto & Bar). Bangunan 3 lantai ini memiliki 14 kamar dengan dua tipe yaitu standard (3,5 x 5 m) dan deluxe (4,5 x 5 m).\n\nGuest house ini memiliki fasilitas lengkap, furniture, kamar mandi dalam menggunakan shower dan air panas, ada beberapa kamar yang memiliki balcony yang dapat digunakan untuk bersantai. Tempat parkir basement bisa untuk beberapa motor. Lingkungan tenang dan nyaman.\n\nLokasi mudah diakses dan sangat strategis ±30 menit ke Airport Ngurah Rai, dekat dengan Bintang Supermarket, hanya 3 menit ke Pantai Padma.\n\n \n\n*semua harga sudah termasuk listrik dan WIFI\n\n*tidak boleh membawa hewan peliharaan\n\n*maks. 2 org/kamar\n\n*room cleaning on request (biaya tambahan)\n\n*menu breakfast : nasi goreng, mie goreng, banana japle, kopi/teh (extra charge)\n*stay lebih dari 4 hari, free foot massage (welcome massage) 15 menit\n\n\nHarga :\n\n- Tipe standard : Rp 175.000/malam, Rp 3.000.000/bulan\n\n- Tipe deluxe : Rp 200.000/malam, Rp 3.500.000/bulan', 'aktif', 'Rp. 3.000.000/bulan', '3.5x5', '6281246121379', 1, '2019-09-29 07:18:24'),
('h5d9061f76cc9b', 'sewa', 'FINOLIA SYARIAH RESIDENCE', 61, '-8.717933004689002', '115.18767955744897', 'Jl. Glogor Carik No.36A, Pemogan, Kec. Denpasar Sel., Kota Denpasar, Bali 80221, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Finolia Syariah Residence berlokasi di Jl. Gelogor Carik, No.36 A, Pemogan, Denpasar Selatan, Kota Denpasar, Bali. memilik fasilitas AC, TV, Kamar Mandi Dalam, Lemari, Kursi, Meja, dan Area Parkir.\n\n*harga belum termasuk listrik\n\n*free air', 'aktif', 'Rp. 1.500.000/bulan', NULL, '628123814968', 1, '2019-09-29 07:49:11'),
('h5d90655232237', 'sewa', 'PERMANA GUEST HOUSE', 62, '-8.524273736634205', '115.27343154928985', 'Jl. Raya Teges No.16, Peliatan, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571, Indonesia', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'Permana Guest House berlokasi di Jl. Raya Goa Gajah, Ubud, Gianyar, Bali. memiliki fasilitas AC, Air Panas, Tempat Tidur, Dapur, Lemari, Lampu Tidur, Shower, Wastafel, dan area Parkir.', 'aktif', 'Rp. 3.500.000/bulan', NULL, '6281936284546', 1, '2019-09-29 08:03:30'),
('h5d90687329cab', 'sewa', 'PONDOK ARJUNA', 63, '-8.71526415067671', '115.17655748267953', 'Gg. Arjuna No.1a, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Pondok Arjuna berlokasi di Jl. Mataram, Gg. Arjuna No.1a, Kuta, Badung, Bali. suana lingkungan sangat nyaman dan tenang. memiliki fasilitas AC, TV, Kamar Mandi Dalam, Tempat Tidur, Lemari, Lemari Es, Wifi, Dapur Mini, Meja, Bantal, dan Parkir Motor.\n\nHarga \n\nBulanan : 1.700.000/bulan tanpa kulkas\n\n*maksimal 2 orang/kamar\n\n*free wifi\n\n*dapur umum free gas', 'aktif', 'Rp. 1.800.000/bulan', NULL, '6285792383251', 1, '2019-09-29 08:16:51'),
('h5d906b319284b', 'sewa', 'THE DAMAR', 64, '-8.73972420666399', '115.17119867108977', 'Jl. Puri Gerenceng No.10, Tuban, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'The Damar\n\nSebuah Kost VVIP yang berlokasi di Jl. Puri Gerenceng, Gg Natah No. 8D, Tuban - Kuta. Bangunan 2 lantai ini memiliki 2 type kamar, Type Damar (16 kamar) dan Type Akshardam (14 kamar) ukuran kamar 5,5 x 10 m.\n\nFasilitas yang di dapat cukup lengkap. Kamar mandi dalam menggunakan shower dan water heater, dapur dalam, ruang jemur di belakang, furniture, dan ada teras depan yang dilengkapi meja dan kursi untuk bersantai. Untuk listrik menggunakan pulsa. Tempat parkirnya cukup luas. Bisa untuk ±11 mobil dan ±16 motor. Lingkungan tenang dan nyaman.\n\nLokasi sangat mudah diakses dan sangat strategis. Hanya ±3 menit ke Airport Ngurah Rai, ±5 menit ke Obyek wisata Pantai Kuta, Waterbom, Circus Waterpark, Park 23, Discovery Shopping Mall dan Lippo Mall.\n\n\n\n*Tidak untuk berkeluarga, maks. 2 orang/kamar\n\n*Tidak boleh membawa hewan peliharaan\n\n*Sewa bulanan FREE Pergantian Sheet dan Room Cleaning 1x/bulan\n\n*Bisa mencarikan sewa motor, laundry on call\n\n*Tipe Akshardam listrik Rp 2.000/kwh\n\n*Harian dan mingguan sudah termasuk listrik\n\n\n\nHarga :\n\nHarian                 : Rp 175.000\n\nMingguan:\n\nType Damar        : Rp 1.100.000\n\nType Akshardam : Rp 1.200.000\n\nBulanan:\n\nType Damar        : Rp 3.000.000\n\nType Akshardam : Rp 3.300.000', 'aktif', 'Rp. 3.000.000/bulan', '5.5x10', '6281339799596', 1, '2019-09-29 08:28:33'),
('h5d90710f311aa', 'sewa', 'KUBU KENAK BEJI AYU', 65, '-8.695342898739218', '115.17664089097207', 'Jl. Beji Ayu I No.2, Seminyak, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kubu Kenak Beji Ayu, sebuah villa berlokasi di Jl. Beji Ayu Gang 2 No. 6, Seminyak. Villa dengan kolam renang ini memiliki 3 kamar tidur.\n\nMasing-masing kamar dilengkapi fasilitas seperti AC, tempat tidur, kulkas, TV, furniture, kamar mandi dalam menggunakan shower dan air panas. Teras depan dan balcony, sharing kitchen, sharing living room, pemandangan taman, gazebo, parkir mobil dan motor, dan WIFI.\n\nLokasi sangat mudah diakses dan strategis. Hanya ±5 menit ke Pantai Seminyak, La Plancha, Sunset Point, ±10 menit ke Seminyak Square, ±10 menit ke Bintang Supermarket, ±15 menit ke Kuta, Legian, Oberoi, Petitenget dan Kerobokan, ±25 menit ke Airport.\n\n\n\n*maksimal 2 orang dewasa\n\n*harga tercantum adalah harga sewa perkamar\n\n*harga sewa sudah termasuk listrik\n\n*hewan peliharaan: no\n\n*room cleaning by request, free', 'aktif', 'Rp. 5.500.000/bulan', NULL, '6287860645624', 1, '2019-09-29 08:53:35'),
('h5d907481e0851', 'sewa', 'KUBUKU 8 GUEST HOUSE', 66, '-8.800052490292938', '115.18567248167346', 'Jl. Nuansa Utama XIX No.8, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kubuku 8 Guest House, sebuah guest house yang berlokasi di Kori Nuansa, Jl. Nuansa Utama XIX No. 8, Taman Griya – Jimbaran. Bangunan 2 lantai ini hanya memiliki 10 kamar dengan ukuran kamar 3,5 x 5 m.\n\n\n\nFasilitas yang didapat cukup lengkap, kamar mandi dalam menggunakan shower dan water heater, tersedia juga ruang jemur di belakang. Parkir bisa ± 2 mobil dan ± 10 motor. Listrik menggunakan pulsa. Lingkungan tenang dan nyaman.\n\n \n\nLokasi sangat strategis, ± 20 menit ke Airport Ngurah Rai, ± 10 menit ke Pantai Jimbaran, ± 15 menit ke Obyek Wisata Nusa Dua, ± 10 menit ke Kampus UNUD, GWK, dekat McD dan KFC Jimbaran.\n\n\n*Maks. 2 org/kamar\n\n*tidak boleh membawa hewan peliharaan\n\n*ganti sprei 1x/minggu \n\n*Harga silahkan kontak pemilk langsung', 'aktif', 'Rp. 2.000.000/bulan', '3.5x5', '628123826949', 1, '2019-09-29 09:08:17'),
('h5d90767ac7744', 'sewa', 'KUBU GDK PERTIWI', 67, '-8.706746811253943', '115.17360159509099', 'Jl Bunut Sari Gg.pura uluwatu III NO.4Legian Kelod, Legian, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 1, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kubu GDK Pertiwi, guest house ini berlokasi di Jl. Bunut Sari Gg. Pura Uluwatu III No. 4, Legian Padma Timur. Terdapat 10 kamar ukuran 4 x 6 meter, 3 kamar Family Room dan 7 kamar Standard.\n\nFasilitas yang didapat cukup lengkap, family room dengan tipe kamar mezzanine 2 tempat tidur, dapur, kamar mandi dalam dengan shower dan air panas, AC, TV Satelit, lemari pakaian dan furniture lainnya, memungkinkan untuk 4 orang dalam satu kamar. Kamar Standard dengan fasilitas tempat tidur, AC, TV Satelit, lemari pakaian, dapur, kamar mandi dalam dengan shower dan air panas. Masing-masing kamar memiliki teras depan dan pemandangan kebun atau taman. WIFI available. Parkir luas untuk motor dan mobil, sumber air menggunakan PDAM dan sumur bor.\n\nLokasi cukup strategis dan mudah diakses. Hanya ± 5 menit ke Pantai Kuta, Pantai Legian, Pantai Padma, Azul Beach Club Bali, Monumen Bom Bali, Sky Garden Bali, Hard Rock Café Bali, ±10 menit ke Seminyak, ±15 menit ke Pantai Double Six Seminyak, Cocoon Beach Club, Bintang Supermarket dan La Plancha, ±20 menit ke Airport, ±25 menit Kerobokan, Canggu dan sekitarnya.\n\n\n\n*Cats lover welcome\n\n*Harga harian, mingguan dan bulanan sudah termasuk listrik\n\n*Room cleaning 1x seminggu\n\n*Standard room maksimal 2 orang per kamar\n\n*Family room maksimal 4 orang per kamar\n\n\n\nHarga :\n\nHarian            : Rp 185.000 (Standard Room), Rp 250.000 (Family Room)\n\nMingguan        : Rp 1.000.000 (Standard Room), Rp 1.500.000 (Family Room)\n\nBulanan          : Rp 3.700.000 (Standard Room), Rp 4.200.000 (Family Room)\n\nTahunan         : Rp 35.000.000 (Standard Room), Rp 40.000.000 (Family Room)', 'aktif', 'Rp. 3.700.000/bulan', '4x6', '62818354746', 1, '2019-09-29 09:16:42'),
('h5d907a147ba65', 'sewa', 'THE DANANJAYA HOUSE', 68, '-8.699619994192744', '115.24890943207856', 'Jl. Kutat Lestari Gg. 6 No.2a, Semawang, Sanur, Kec. Denpasar Sel., Kota Denpasar, Bali 80227, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'The Dananjaya House, sebuah guest house yang berlokasi di Jl. Kutat Lestari, Gg. VI - Sanur. Bangunan 2 lantai ini hanya terdiri dari 8 kamar. memiliki ukuran Kamar 4 x 4 meter.\n\n \nDengan fasilitas yang cukup lengkap. Kamar mandi dalam menggunakan shower, wastafel dan ada teras untuk bersantai. Terdapat dapur, kulkas, dan furniture. Suasana yg nyaman dan sejuk. Lantai atas memiliki privat balcony. Untuk listrik menggunakan pulsa. Tempat parkirnya cukup luas bisa untuk ± 10 motor dan ± 2 mobil.\n\n\nLokasi mudah diakses dan sangat strategis. ± 30 menit ke Ngurah Rai International Airport, hanya ± 10 menit ke obyek wisata Pantai Sanur, Mertasari. Dekat ke Renon, Pusat wisata kuliner, dll.\n\n\n*free room service 1x dalam satu minggu\n\n*harian dan mingguan sudah termasuk listrik\n\n*bulanan masih bisa nego, harga belum termasuk listrik\n\n*tidak boleh membawa binatang peliharaan', 'aktif', 'Rp. 3.500.000/bulan', '4x4', '6281337752772', 1, '2019-09-29 09:32:04'),
('h5d907f3deb1a3', 'sewa', 'GRYA BAJANG BALI', 69, '-8.665176427595176', '115.2380346133009', 'Jl. Merdeka VI No.2, Sumerta Kelod, Kec. Denpasar Tim., Kota Denpasar, Bali 80239, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Grya Bajang Bali berlokasi di Jl. Merdeka VI No.1, Sumerta Kelod, Denpasar Timur, Kota Denpasar, Bali (area renon). fasilitas AC, Air Panas, Kamar Mandi Dalam, Dapur, Kursi, Meja, TV, Lemari, Tempat Tidur, Wastafel, dan Area Parkir.\n\n*sisa 1 kamar kosong', 'aktif', 'Rp. 2.500.000/bulan', NULL, '628114499133', 1, '2019-09-29 09:54:05'),
('h5d90815b4162e', 'sewa', 'KOST PEMUDA 3A', 70, '-8.675593410443888', '115.24089352540886', 'Jl. Pemuda IV No.23, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali 80239, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Kost Pemuda 3A, sebuah kost elite berlokasi di Jl. Pemuda I No. 3A, Renon – Denpasar. Memiliki 10 kamar dengan ukuran kamar 6x4 m. Fasilitas yang di dapat cukup lengkap. Ada AC, furniture, kamar mandi dalam menggunakan shower dan water heater. Ada dapur dengan cabinet, TV, dan teras depan. Terdapat taman dan parkiran yang luas. Lingkungan sangat tenang dan nyaman.\n\nLokasi sangat mudah diakses dan sangat strategis. Hanya ±30 menit ke Airport Ngurah Rai, ±5 menit ke Obyek wisata (Pantai Sanur, Bajra Sandi), Universitas/Kampus (STIKOM, UNUD Sudirman, LP3I, Wearnes) dan ±3 menit Ke Rumah Makan (Warung Mina, Bakso Lap. Tembak Senayan, Resto Ikan Bakar Cianjur).\n\n\n\n*tidak boleh membawa hewan peliharaan\n\n*bisa untuk keluarga + anak\n\n*harga tidak termasuk listrik (listrik token)', 'aktif', 'Rp. 2.000.000/bulan', '6x4', '628123968382', 1, '2019-09-29 10:03:07'),
('h5d90d61d5ea76', 'sewa', 'MARA LIVING', 71, '-8.685486824130832', '115.23727466396372', 'Jl. Tukad Badung X A No.7b, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali 80226, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Mara Living Sebuah kost elite berlokasi di Jl. Tukad Badung XA No. 7B, Renon, Denpasar Selatan. Bangunan 2 lantai ini memiliki 8 kamar berukuran 4 x 5 m dengan fasilitas lengkap\n\nSetiap kamar dilengkapi kamar mandi dalam dengan air panas, shower dan wastafel. Ada tempat tidur lengkap dengan bantal, AC, lemari pakaian, TV LED, tersedia dapur bersih dengan kitchen set. Parkir luas untuk mobil & motor. Dilengkapi ruang jemur, Wifi, CCTV.\n\nLingkungan sangat tenang, nyaman dan strategis. ± 3 menit ke Akademi Teknik Radiodiagnostik Dan Radioterapi Bali, STMIK Primakara Technopreneurship Campus, STD Bali, ± 5 menit ke Lapangan Puputan Renon, Plaza Renon, Monumen Bajra Sandhi, ± 10 menit ke Level 21 mall, Bali Royal Hospital, STIKOM Bali, UNDIKNAS, ± 15 menit ke Pantai Sanur, Pantai Mertasari, Pantai Karang.\n\n*Max. 2 orang/kamar\n\n*Dilarang membawa hewan peliharaan\n\n*Listrik menggunakan token\n\n*Extra charge Rp 25.000 untuk 1x room cleaning\n\n*Minimal sewa 3 hari', 'aktif', 'Rp. 2.200.000/bulan', '4x5', '628174786668', 1, '2019-09-29 16:04:45'),
('h5d90db9e90113', 'sewa', 'PONDOL LA BUVA', 72, '-8.7856533007489', '115.19758985949818', 'Unnamed Road, Benoa, South Kuta, Badung Regency, Bali 80361, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Pondok La Buva, guest house bangunan 2 lantai berlokasi di Jl. Taman Jati No. 3A, Mumbul, ByPass Nusa Dua, Kuta Selatan.\n\nPondok La Buva memiliki total 7 kamar, 5 kamar tipe superior, 1 kamar deluxe king dan 1 kamar deluxe twin. Masing-masing kamar dilengkapi tempat tidur, AC, TV, furniture, kamar mandi dalam dengan shower dan air panas, pantry dengan peralatan makan, teras depan untuk kamar dilantai bawah dan balkon untuk kamar dilantai atas dengan pemandangan taman. WIFI gratis dan parkir motor.\n\nLingkungan sangat tenang, nyaman dan strategis. Dekat POP Hotel Nusa Dua, Kantor Imigrasi Ngurah Rai, Restoran Jepang Sama-Sama, kawasan ITDC Nusa Dua, Tanjung Benoa Watersport, BTDC Nusa Dua, Pantai Waterblow, Hardy’s Nusa Dua, 15 menit ke GWK Cultural Park, STP Nusa Dua, Kampus UNUD, BIMC Hospital.\n\n \n\n*Tidak boleh membawa hewan peliharaan\n\n*Harga sudah termasuk listrik\n\n*Maks. 2 orang/kamar\n\n*Room cleaning + ganti sprei 1x/minggu\n\n*Melayani: antar-jemput bandara, sewa motor/mobil, laundry service dengan biaya tambahan\n \nHarga :\n\nSuperior Room            : Rp 200.000/malam, mulai dari Rp 2.000.000/bulan\n\nDeluxe King/Twin Room  : Rp 300.000/malam, Rp 5.000.000/bulan', 'aktif', 'Rp. 2.000.000/bulan', NULL, '628123995715', 1, '2019-09-29 16:28:14'),
('h5d90df56836ca', 'sewa', 'D BUDGET HILL HOUSE', 73, '-8.829204211333895', '115.14006656815945', 'Unnamed Road, Pecatu, Kec. Kuta Sel., Kabupatén Badung, Bali 80361, Indonesia', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'D’Budget Hill House, sebuah guesthouse atau budget house dengan kolam renang luas dan taman luas yang cozy berlokasi di Jl. Raya Uluwatu, Gang Semut City, Ungasan, Uluwatu 80264 atau masuk gang sebelah Kantor Koperasi Tri Mitra Pecatu.\n\n\nBudget house ini memiliki total 19 kamar fasilitas lengkap, masing-masing kamar dilengkapi AC, tempat tidur, lemari pakaian, kursi, meja, kamar mandi dalam dengan shower dan air panas. Kamar dibersihkan satu minggu sekali dan bedsheet atau perlengkapan tempat tidur dan handuk diganti setiap 2 minggu sekali. Fasilitas sharing tersedia seperti dapur sharing dengan kulkas, mesin BBQ besar, kolam renang, taman, parkir luas untuk mobil dan motor. Sumber air menggunakan PDAM. Free WIFI. Ada housekeeping dan juga penjaga.\n\n\n\nLingkungan sangat tenang, nyaman dan strategis, hanya ±10 menit ke Pantai Dreamland, Klapa Resort, New Kuta Golf Pecatu, New Kuta Green Park, Pantai Cemongkak, Garuda Wisnu Kencana Cultural Park, Politeknik Negeri Bali, Kampus UNUD Jimbaran, ±15 menti ke Pantai Balangan, Pantai Bingin, Pantai Padang-Padang, Bvlgari Resort Bali, Anantara Uluwatu Bali Resort, Six Senses Uluwatu, Alila Villas Uluwatu, Sake no Hana Bali, Karma Kandara, Sundays Beach Club, Pura Uluwatu, Single Fin Beach Club, ±40 menit ke Ngurah Rai International Airport.\n\n\n\n \n\n\n\n*Tidak boleh membawa hewan peliharaan\n\n*Maks. 2 orang/kamar\n\n*Harga sudah termasuk listrik dan WiFi\n\n*Cleaning service 1x/minggu\n\n*Bedsheet dan handuk ganti 1x/2 minggu', 'aktif', 'Rp. 2.300.000/bulan', NULL, '6281237823727', 1, '2019-09-29 16:44:06'),
('h5d90e43c1083e', 'sewa', 'BEKISAR RESIDENCE', 74, '-8.694289665097742', '115.23040067208024', 'Jl. Tukad Petanu No.17, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80224, Indonesia', 1, 1, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Bekisar Residence, sebuah kost baru yang berlokasi di Jl. Tukad Petanu Gang Bekisar 2F, Panjer. Bangunan 2 lantai ini memiliki  ukuran kamar 5 x 4 meter.\n\nHanya terdiri dari 10 kamar. Dengan fasilitas yang cukup lengkap. Kamar mandi dalam di lengkapi dengan shower, ada teras depan untuk bersantai. Untuk listrik menggunakan pulsa. Lingkungan tenang dan nyaman. Tempat parkirnya cukup luas bisa untuk ±6 mobil.\n\nLokasi mudah diakses dan sangat strategis, ±5 menit ke Pusat Kota dan ±10 menit ke Obyek Wisata Pantai Sanur.\n\n\n\n*No Pets\n\n\nHarga perbulan :\n\nRp 1.450.000 (fasilitas : tempat tidur, kamar mandi dalam, air panas/dingin dan AC)\n\nRp 1.650.000 (fasilitas : tempat tidur, kamar mandi dalam, air panas/dingin, AC dan TV)', 'aktif', 'Rp. 1.650.000/bulan', '5x4', '628123837277', 1, '2019-09-29 17:05:00');
INSERT INTO `properti` (`id_properti`, `status`, `properti`, `id_user`, `lat`, `lng`, `alamat`, `kategori`, `kamar`, `toilet`, `garasi`, `balkon`, `tv`, `diupdate_pada`, `deskripsi`, `aktif`, `harga`, `luasruangan`, `whatsapp`, `region`, `dibuat_pada`) VALUES
('h5d90e69bbe56b', 'sewa', 'BOUTIQUE RESIDENCE', 75, '-8.67135300429501', '115.17439966134111', 'Jl. Taman Sari Madu No.12a, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali 80117, Indonesia', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'Boutique Residence berlokasi di Jl. Taman Sari Madu No.12, Block Jepun, Kerobokan Kelod, Kuta Utara, Badung, Bali. fasilitas AC, Kamar Mandi Dalam, Tempat Tidur, Dapur Mini, Lemari, Meja, Kursi, Shower, Wastafel, dan area Parkir.\n\nHarga Bulanan :\n\n3.000.000/bulan \n\n3.500.000/bulan (Double Room)', 'aktif', 'Rp. 3.500.000/bulan', NULL, '6287888331211', 1, '2019-09-29 17:15:07'),
('h5d945fa5b0c33', 'sewa', 'JARRDIN APARTEMEN CIHAMPELAS', 81, '-6.892181222122091', '107.60502334228818', 'Jl. Cihampelas No.10, Cipaganti, Kecamatan Coblong, Kota Bandung, Jawa Barat 40131, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan Apartemen Murah\n\nPRICE LIST :\n\nTipe Studio 18\n\n100rb-150rb Transit (3/6 Jam)\n\n200rb (Minggu-Rabu)\n\n230rb (Kamis)\n\n300rb (Jumat-Sabtu)\n\n1.4jt Mingguan\n\n3jt Bulanan\n\nTahunan Langsung WA aja\n\nTipe Studio 24\n\n150rb - 180rb (Transit 3/6 Jam)\n\n250rb (Minggu-Rabu)\n\n280rb (Kamis)\n\n300rb (Jumat-Sabtu)\n\n1.6jt Mingguan\n\n3.5jt Bulanan\n\nTahunan Langsung WA aja\n\nTipe Studio 33/1 Big Bed Room\n\n180rb-230rb (Transit 3/6 Jam)\n\n300rb (Minggu-Rabu)\n\n330rb (Kamis)\n\n400rb (Jumat-Sabtu)\n\n1.8jt Mingguan\n\n4jt Bulanan\n\nTahunan Langsung WA aja\n\nTipe 33 2 Bed Room\n\n200rb (6 Jam)\n\n350rb (Minggu-Rabu)\n\n400rb (Kamis)\n\n450rb (Jumat-Sabtu)\n\n2jt (Mingguan)\n\n4jt (Bulanan)\n\nTahunan Langsung WA aja\n\nFasilitas Unit :\n\n- FREE WIFI\n\n- AC\n\n- Kulkas\n\n- TV 29-32 inch\n\n- Kompor Gas\n\n- Dispenser\n\n- Kitchen Set\n\n- Keperluan Dapur\n\n- Water Heater\n\n- Kamar Mandi Bersih\n\n- Spring Bed\n\n- Jemuran Handuk\n\n- Handuk, Shampoo, Sabun dan Sikat Gigi\n\n- Meja belajar dan Kursi (beberapa kamar)\n\n- Lemari Pakaian\n\nTinggal bawa pakaian saja di Jamin anda akan betah dan merasa nyaman.\n\nFasilitas Property :\n\n- Security 24 Jam\n\n- CCTV\n\n- Kolam Berenang\n\n- Restoran\n\n- Kantin\n\n- Alfamart\n\n- Warung Kelontong\n\n- Cafe\n\n- Parkir Basement 3 Lantai\n\n- Lift\n\n- Tangga Darurat\n\nDekat dengan :\n\nFactory outlet spt rumah mode\n\nBandung Indah plaza\n\nDago Plaza\n\nCihampelas Walk\n\nITB\n\nSky Walk\n\nPasar Baru Trade\n\nThe Jarrdin Apartemen by RumahKu\n\nJalan Cihampelas Dalam No.10 Coblong,Cipaganti\n\nBandung, Java Barat\n\nLantai L Komersil B01 (RumahKu)', 'aktif', 'Rp. 3.000.000/bulan', '3x6', '6287729718239', 4, '2019-10-02 08:28:21'),
('h5d9463bb8888c', 'sewa', 'APARTEMEN GATEWAY PASTEUR', 82, '-6.889308597136677', '107.56635720608438', 'Jl. Gunung Batu No.203, Sukaraja, Kec. Cicendo, Kota Bandung, Jawa Barat 40175, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan unit apartment gateway pasteur harga paling murah dibawah pasaran .\n\n-hunian sangat nyaman, bersih, langsung siap huni bawa koper.\n\n- lokasi strategis exit pintu tol,PVJ,Maranata kampus,RSHS,BANDARA HUSEIN.\n\n- type studio bedroom furnish\n\n- view terbaik\n\n-Ac\n\n-water heater\n\n- kulkas\n\n- dispenser\n\n-kompor\n\n- Lemari\n\n- kompor\n\n- Alat masak\n\n- alat makan\n\n- fasilitas terbaik\n\n- Service 1x24 jam\n\n- parkiran yg luas', 'aktif', 'Rp. 2.800.000/bulan', '2x4', '628112057776', 4, '2019-10-02 08:45:47'),
('h5d94aa3ac992e', 'sewa', 'SUITE METRO', 83, '-6.937910625579999', '107.65903070225852', 'Suites, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan Apartemen Suite Metro Bandung - Tipe Studio\n\nSaya menyewakan Apartement The Suite Metro di Bandung (langsung owner) tipe Studio. Lokasi di Jalan by pass Soekarno Hatta, seberang Metro Indah Mall Bandung.\n\nFasilitas :\n\nTV Kabel dan Internet WIFI unlimited\n\nWater Heater\n\nAC\n\nKulkas\n\nDispenser\n\nKolam Renang 2\n\nLapangan Basket 2\n\nKompor gas, rice cooker, setrika & meja setrika, meja, piring, gelas, panci, dll, lengkap, tinggal bawa pakaian saja kalau menyewa.\n\nKelebihan Unit Apartemen\n\nPosisi di posisi mengahadap depan, jalan masuk dan keluar bisa diliat dari unit, view malam sangat bagus terlihat Metro Indah Mall, unit dekat dengan lift dan emergency exit, dan cukup melangkah beberapa kaki ada Alfamart, Indomaret, ATM, traditional massage, laundry, jasa cleaning service, food court, dan sebagainya. Unit dilantai 8, jadi tidak terlalu tinggi untuk yang takut ketinggian, tetapi jga cukup nyaman karena tenang.\n\nKelebihan Apartment Suite Metro :\n\nLokasi dekat dengan berbagai fasilitas pendukung seperti Trans Studio Mall, Carrefour, Metro Indah Mall (Hypermart), Lotte Mart (Wholesale), MC Donald, KFC, Richesse Factory, Hoka Hoka Bento, Rumah Sakit Al Islam, RS Humana Prima, Klinik Harapan Bunda, RS Pindad, Stasiun Kiara Condong, Tol Buah Batu, SMK Medika, SMK 11, STT Mandala, Uninus, STT Telkom, STISI dan STSI dan lain – lain, serta di jalan besar by pass Soekarno Hatta, sehingga mempermudah dalam mendukung kehidupan sehari hari dan aktifitas anda.\n\nRate :\n\nStudio\n\nLantai 8\n\nBulanan : Rp. 2.600.000/bulan ( minimal 2 bulan)\n\n2 Bulan : Rp. 5.000.000\n\n6 Months: Rp. 14.000.000\n\n1 Year : Rp 33.000.000\n\nTermasuk: monthly surcharge, sinking fund, tv cable, internet; Tidak termasuk : tagihan air dan listrik sesuai penggunaan.\n\n( Perlu deposit 1 juta untuk monthly, 2 months, 6 months, & yearly, dikembalikan apabila kontrak selesai dan apartemen dalam keadaan baik.\n\nKeterangan : Unit seperti foto, keadaan yang sebenarnya.\n\nMelayani chat/telepon sampai jam 9 malam saja, diatas jam 9 malam dijawab besok pagi.', 'nonaktif', 'Rp. 2.600.000/bulan', '2x7', '6281321118155', 1, '2019-10-02 13:46:34'),
('h5d94b1568ee5f', 'sewa', 'GRAND ASIA AFRIKA', 84, '-6.923743446845802', '107.61835043014298', 'Jl. Karapitan No.1, Paledang, Kec. Lengkong, Kota Bandung, Jawa Barat 40261, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan apartemen grand asia afrika tipe 22 (Studio) dengan fasilitas :\n\nPosisi di Lantai 10 Tower C.\n\nDekat dengan lift dan tersambung antara 2 tower C dan D (akses banyak)\n\n- Water Heater\n\n- AC\n\n- Tempat Tidur (Baru, Sudah Pillow Top)\n\n- Bantal, Guling\n\n- TV (Antena Dalam)\n\n- Meja Makan\n\n- Lemari Baju Full Size(Bisa dilihat d gambar)\n\n- Lemari Es Full Size (Bisa dilihat d gambar)\n\n- Kompor (sudah include gas 5.5 KG)\n\n- Aqua Galon\n\n- Rice Cooker\n\n- Peralatan Makan (Piring, Gelas, Dll)\n\n- Peralatan Bersih2 (Sapu, Pel, Dll)\n\n- Sprei 2 Pasang (Sprei, Sarung Bantal, Sarung Guling), berikut selimut 1\n\n- Jemuran\n\nKondisi masih baru selesai d isi\n\ndisewakan minimal\n\n3 Bulan /bulan 2.7 Jt\n\n6 Bulan /bulan 2.5 Jt\n\n1 Tahun /bulan 2.3 Jt\n\ndan ada uang deposit yang dijaminkan sampai masa sewa berakhir\n\nBiaya sudah termasuk Service Charge dan Sinking Fund.\n\nTinggal bayar air dan listrik saja.\n\nMau Bawa mobil tinggal nambah 120rb / bulan (Optional), Motor 50rb /bulan (Optional)\n\nPasang Internet Sekitar 300an sebulan (indihome)', 'nonaktif', 'Rp. 2.300.000/bulan', NULL, '6282126126867', 1, '2019-10-02 14:16:54'),
('h5d94c69849d5d', 'sewa', 'M SQUARE BANDUNG', 85, '-6.9560648551066375', '107.59302003901371', 'Jl. Cibaduyut Raya No.142, Cibaduyut, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40238, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan Apartemen M Square Tipe 2 BR & Studio di Jl. Cibaduyut Raya Kota Bandung.\n\nTipe 2 BR : Rp 1,75 jt per minggu ( include\n\nmaintenance )\n\nRp 4 jt per bulan ( blm termasuk\n\nmaintenance )\n\nTipe Studio : Rp 1,5 jt per minggu ( include\n\nmaintenance )\n\nRp 3 jt per bulan ( blm termasuk\n\nmaintenance )\n\nFull furnish: Wall Paper, Double Bed, AC, Water Heater, TV 32\", Kulkas, Kompor, Kitchen Set, Gordyn, Lemari Pakaian, Meja Kursi dll\n\nFasilitas: Kolam Renang, Sarana Olahraga, Minimarket dll\n\nLokasi strategis dilalui angkutan kota.\n\nDekat Komplek Mekarwangi, Gerbang Tol Moh. Toha & Kopo, RS Santosa Kopo, RS Imanuel, Terminal Leuwi Panjang, Miko Mall, Festival Citylink dll', 'aktif', 'Rp. 3.000.000/bulan', NULL, '62811644544', 4, '2019-10-02 15:47:36'),
('h5d94d68980bcf', 'sewa', 'Gateway Pasteur All type', 86, '-6.890271554204689', '107.5662688206578', 'Jl. Gunung Batu No.203, Sukaraja, Kec. Cicendo, Kota Bandung, Jawa Barat 40175, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'DIJUAL/DISEWAKAN APARTEMEN GATEWAY PASTEUR\n\nPROMO.Modal 10 juta bisa langsung HUNI\n\nFree DP\n\nFRee Biaya Akad KPA Bank\n\nyuuuu booking sekarang.sebelum Sold out All unit PROMO nya!\n\nSewa Harian\n\nSewa Mingguan\n\nSewa Bulanan\n\nSewa Per 3 Bulan\n\nSewa Per 6 Bulan\n\nSewa Tahunan\n\nType Studio\n\nType 1 Bedrooms\n\nType 2 Bedrooms\n\nType 3 Bedrooms\n\ninfo lebih lengkap hubungi Wa/Tlp ke no yang sudah Tertera', 'aktif', 'Rp. 4.000.000/bulan', NULL, '6282317707701', 4, '2019-10-02 16:55:37'),
('h5d94d9f9384b8', 'sewa', 'HOOK APARTEMEN SUITES METRO', 87, '-6.942577909576351', '107.65877754638677', 'Jl. Soekarno Hatta No.590, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', 5, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Sewa Harian 250 ribu an Week day\n\nweek End 350 ribuan.\n\nWa aja no Hp saya ya kalau ada yg mau ditanyain..\n\nLokasi Bandung Kota Depan Metro Indah Mall, Dekat Trans Studio Bandung, Dekat Pintu Tol Buah, Dekat Summarecon Gede Bage dll\n\nSewa Seminggu 1.550.000\n\nSewa Sebulan 3.150.000', 'aktif', 'Rp. 3.150.000/bulan', NULL, '6281394823519', 4, '2019-10-02 17:10:17'),
('h5d94dca29567a', 'sewa', 'SUITE METRO BANDUNG - Tipe Studio', 83, '-6.9379031649269045', '107.65903160042342', 'Suites, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan Apartemen Suite Metro Bandung - Tipe Studio\n\nSaya menyewakan Apartement The Suite Metro di Bandung (langsung owner) tipe Studio. Lokasi di Jalan by pass Soekarno Hatta, seberang Metro Indah Mall Bandung.\n\nFasilitas :\n\nTV Kabel dan Internet WIFI unlimited\n\nWater Heater\n\nAC\n\nKulkas\n\nDispenser\n\nKolam Renang 2\n\nLapangan Basket 2\n\nKompor gas, rice cooker, setrika & meja setrika, meja, piring, gelas, panci, dll, lengkap, tinggal bawa pakaian saja kalau menyewa.\n\nKelebihan Unit Apartemen\n\nPosisi di posisi mengahadap depan, jalan masuk dan keluar bisa diliat dari unit, view malam sangat bagus terlihat Metro Indah Mall, unit dekat dengan lift dan emergency exit, dan cukup melangkah beberapa kaki ada Alfamart, Indomaret, ATM, traditional massage, laundry, jasa cleaning service, food court, dan sebagainya. Unit dilantai 8, jadi tidak terlalu tinggi untuk yang takut ketinggian, tetapi jga cukup nyaman karena tenang.\n\nKelebihan Apartment Suite Metro :\n\nLokasi dekat dengan berbagai fasilitas pendukung seperti Trans Studio Mall, Carrefour, Metro Indah Mall (Hypermart), Lotte Mart (Wholesale), MC Donald, KFC, Richesse Factory, Hoka Hoka Bento, Rumah Sakit Al Islam, RS Humana Prima, Klinik Harapan Bunda, RS Pindad, Stasiun Kiara Condong, Tol Buah Batu, SMK Medika, SMK 11, STT Mandala, Uninus, STT Telkom, STISI dan STSI dan lain – lain, serta di jalan besar by pass Soekarno Hatta, sehingga mempermudah dalam mendukung kehidupan sehari hari dan aktifitas anda.\n\nRate :\n\nStudio\n\nLantai 8\n\nBulanan : Rp. 2.600.000/bulan ( minimal 2 bulan)\n\n2 Bulan : Rp. 5.000.000\n\n6 Months: Rp. 14.000.000\n\n1 Year : Rp 33.000.000\n\nTermasuk: monthly surcharge, sinking fund, tv cable, internet; Tidak termasuk : tagihan air dan listrik sesuai penggunaan.\n\n( Perlu deposit 1 juta untuk monthly, 2 months, 6 months, & yearly, dikembalikan apabila kontrak selesai dan apartemen dalam keadaan baik.\n\nKeterangan : Unit seperti foto, keadaan yang sebenarnya.\n\nMelayani chat/telepon sampai jam 9 malam saja, diatas jam 9 malam dijawab besok pagi.', 'aktif', 'Rp. 2.600.000/bulan', NULL, '6281321118155', 4, '2019-10-02 17:21:38'),
('h5d94deff38c48', 'sewa', 'Grand Asia Afrika Tipe Studio 22', 84, '-6.923743808842847', '107.61835092095032', 'Jl. Karapitan No.1, Paledang, Kec. Lengkong, Kota Bandung, Jawa Barat 40261, Indonesia', 5, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Disewakan apartemen grand asia afrika tipe 22 (Studio) dengan fasilitas :\n\nPosisi di Lantai 10 Tower C.\n\nDekat dengan lift dan tersambung antara 2 tower C dan D (akses banyak)\n\n- Water Heater\n\n- AC\n\n- Tempat Tidur (Baru, Sudah Pillow Top)\n\n- Bantal, Guling\n\n- TV (Antena Dalam)\n\n- Meja Makan\n\n- Lemari Baju Full Size(Bisa dilihat d gambar)\n\n- Lemari Es Full Size (Bisa dilihat d gambar)\n\n- Kompor (sudah include gas 5.5 KG)\n\n- Aqua Galon\n\n- Rice Cooker\n\n- Peralatan Makan (Piring, Gelas, Dll)\n\n- Peralatan Bersih2 (Sapu, Pel, Dll)\n\n- Sprei 2 Pasang (Sprei, Sarung Bantal, Sarung Guling), berikut selimut 1\n\n- Jemuran\n\nKondisi masih baru selesai d isi\n\ndisewakan minimal\n\n3 Bulan /bulan 2.7 Jt\n\n6 Bulan /bulan 2.5 Jt\n\n1 Tahun /bulan 2.3 Jt\n\ndan ada uang deposit yang dijaminkan sampai masa sewa berakhir\n\nBiaya sudah termasuk Service Charge dan Sinking Fund.\n\nTinggal bayar air dan listrik saja.\n\nMau Bawa mobil tinggal nambah 120rb / bulan (Optional), Motor 50rb /bulan (Optional)\n\nPasang Internet Sekitar 300an sebulan (indihome)', 'aktif', 'Rp. 2.300.000/bulan', NULL, '6282126126827', 4, '2019-10-02 17:31:43'),
('h5d956e84853a6', 'sewa', 'The Suites@metro Furnish 2BR', 88, '-6.938059748171799', '107.6593917648936', 'Suites, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', 5, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Disewakan Apartemen The Suites @ Metro\n\n2BR Full Furnish Siap Pakai\n\nFasilitas Lengkap\n\nAC\n\nTV\n\nKulkas\n\nWater Heater\n\nDispenser\n\nkipas angin\n\nLokasi Strategis Di Bandung Timur\n\nPusat perdagangan Metro Indah Mall\n\nSiapa Cepat Dia Dapat\n\nHarga 2.700/ Bulan + 300(jaminan )\n\nHarga sdh berikut Servis Charge\n\nBelum termasuk Listrik Dan Air', 'aktif', 'Rp. 2.700.000/bulan', NULL, '6285220679558', 4, '2019-10-03 03:44:04'),
('h5d9740772b656', 'sewa', 'Villa harian umallas kerobokan', 89, '-8.667021492951088', '115.15446387045063', 'Jl. Umalas Klecung No.15, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali 80361, Indonesia', 3, 3, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa ini terletak di Kuta Utara, adalah pilihan yang populer bagi para wisatawan. Properti ini tidak terlalu jauh dari pusat kota, hanya dari sini dan umumnya hanya membutuhkan waktu 30 menit untuk mencapai bandara. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di properti yang ada Bali ini. Dapur, ruang bersantai/area menonton TV bersama merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa ini menjadi  rumah Anda ketika berlibur.', 'aktif', 'Rp. 1.500.000/hari', NULL, '6285847809256', 1, '2019-10-04 12:52:07'),
('h5d9760085bdb4', 'sewa', 'Villa Cendana 3 Bedrooms – Umalas', 91, '-8.66562513681526', '115.16324398825657', 'Jl. Dukuh Indah No.51a, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali 80361, Indonesia', 3, 3, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'The Villa Cendana is built on a plot of 400 square meters and has a living area of 160 square meters including 3 air-conditioned bedrooms with each bathroom.\n\nThe villa combines comfortable enclosed spaces and open spaces to ensure natural ventilation and daylight throughout the day.\n\nThe villa can accommodate up to 6 people, which can enjoy a tropical and green garden as well as the pool for moments of relaxation in privacy\n\nService and Facility :\n\nPrivate Swimming-pool\n\nTropical garden\n\n3 bedrooms with king size bed, storage spaces and safety boxes.\n\n3 bathrooms with hot water.\n\n1 guest toilet\n\nAir conditioning\n\nKitchen with equipment\n\nCoffee machine\n\nLCD TV with DVD player and TV Cable\n\nInternet WIFI connection\n\nParking lot for 2 cars\n\nPrice :\n\nIDR 4 mill / night\n\nRp 50 mill / month – exclude electricity', 'aktif', 'Rp. 4.000.000/hari', '160m2', '6287861855796', 1, '2019-10-04 15:06:48'),
('h5d9763c0d0247', 'sewa', 'Disewakan villa 2 Bedrooms di Jl. Pantai Cemagi', 92, '-8.634376507081264', '115.10880508666457', 'Jl. Pantai Mengening No.15, Cemagi, Kec. Mengwi, Kabupaten Badung, Bali 80351, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Yearly rent villa 2 Bedrooms at Jl. Pantai Cemagi, 10 menit to Pererenan.\n\nSpec:\n\nVilla 2 Bedrooms ensuite bathrooms\n\nLand size: 170 m2\n\nBuild size: 150 m2\n\nVilla semi furnished\n\nAc\n\nTv\n\nDining room\n\nPrivat pool\n\nLiving room\n\nKitchen\n\nCarport\n\nPrice 135juta/year\n\nVilla possible to renovation by request.\n\nThis second floors villa with rice field view. and not too far to go away to Canggu beach, Berawa beach less more 15 minutes.\n\nFor inspection please info in advance 1 day before to:\n\nYani Kusuman\n\nCentury 21 Seminyak', 'aktif', 'Rp. 135.000.000/tahun', '150m2', '6281934633282', 1, '2019-10-04 15:22:40'),
('h5d976877f1707', 'sewa', 'Villa PRiMe Harian 2 Bedroom di Jimbaran GWK', 93, '-8.805843749510101', '115.16763537698819', 'Jl. Pertanian No.124, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa sewa berada di Pusat Wisata jimbaran GWK\n\nVilla terdiri dari 2 bedroom\n\nFully furnish\n\nTv Cable , Wifi\n\nkolam renang, lengkap dengan equipment\n\nHousekeeping\n\nsangat cocok untuk liburan keluarga\n\nkawasan aman dan nyaman\n\n1 menit dari GWK\n\n5 menit menuju Pantai Jimbaran\n\n15 menit menuju Pantai Pandawa , Melasti , Dreamland dan Pantai Balangan.\n\nVilla disewakan Harian\n\nHarga sewa 1.3 juta per hari\n\n- Bulanan 20 juta\n\n- Tahunan 200 juta\n\nInformasi lebih lanjut hub saya', 'aktif', 'Rp. 1.300.000/hari', '200m2', '6282233233123', 1, '2019-10-04 15:42:47'),
('h5d976b7b8bdcb', 'sewa', 'Maya villa', 94, '-8.794427017237435', '115.20622060704045', 'Jl. Taman Bali No.23, Benoa, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 4, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Maya Villa adalah pilihan yang populer bagi para wisatawan. Properti ini tidak terlalu jauh dari pusat kota, hanya dari sini dan umumnya hanya membutuhkan waktu 30 menit untuk mencapai bandara. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di properti yang ada Bali ini. Dapur, WiFi gratis di semua kamar, Wi-fi di tempat umum, ruang bersantai/area menonton TV bersama merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Maya Villarumah Anda ketika berlibur.', 'aktif', 'Rp. 25.000.000/tahun', '258m2', '6285237585355', 1, '2019-10-04 15:55:39'),
('h5d976ca6d191d', 'sewa', 'Testz', 1, '-6.352158767950737', '106.80086325566413', 'Jl. M. Kahfi 1 Blok Damong No.19, RT.7/RW.1, Cipedak, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630, Indonesia', 1, 2, 'dalam', 0, 0, 1, '2019-10-20 06:54:36', 'Testing', 'nonaktif', 'belum ditentukan', '12x2', '0895386898095', 1, '2019-10-04 16:00:38'),
('h5d980f4d46d03', 'sewa', 'The Mazooka villa', 96, '-8.827698655070915', '115.15041027716597', '15, Jl. Perumahan Taman Lembu Sura IV No.IV, Ubung Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80115, Indonesia', 3, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Bagi teman- teman yang ingin berliburan ke Bali jangan bingung untuk urusan akomodasi.\n\nThe Mazooka villa menyediakan tempat menginap yang nyaman dengan fasilitas yang tidak kalah dengan villa lainya di Bali.\n\nHarga yang kami tawarkan juga sangat terjangkau.\n\nSatu villa dengan satu kamar tidur dengan dua bad , private pool dan restaurant yang menyajikan makanan halal food seperti Sea Food, menu Ayam dan Bebek.\n\nLokasi terletak sekitar 15 menit dari pantai melasti ,25 menit ke pantai Uluwatu , 25 menit ke Air Port Ngurah Rai.\n\nBerminant ??\n\nAyo Booking sekarang juga kami siap melayani anda.\n\nSelamat datang di Bali dan Selamat berlibur.', 'aktif', 'Rp. 750.000/hari', '100m2', '6281238124515', 1, '2019-10-05 03:34:37'),
('h5d9814b37d842', 'sewa', 'Villa Studio Bali', 97, '-8.79381060886226', '115.18412631503543', '15, Jl. Perumahan Taman Lembu Sura IV No.IV, Ubung Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80115, Indonesia', 3, 1, 'dalam', 0, 0, 1, '2019-10-16 07:23:39', 'Villa Studio Bali  adalah tempat ideal untuk menelusuri Bali. Dari properti ini, para tamu dapat menikmati akses mudah ke semua hal yang dimiliki oleh kota yang aktif ini. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nfasilitas yang unggul di Villa ini  akan membuat pengalaman menginap Anda tidak terlupakan, Layanan kebersihan harian, Dapur, WiFi di tempat umum merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa Studio Bali  rumah Anda ketika berlibur.', 'aktif', 'Rp. 1.000.000/hari', '80m2', '62811396553', 1, '2019-10-05 03:57:39'),
('h5d982035aa5f4', 'sewa', 'Mecutan', 1, '-8.583475660507395', '115.18722243149409', 'Jl. Raya Sempidi No.57, Lukluk, Kec. Mengwi, Kabupaten Badung, Bali 80351, Indonesia', 1, 1, 'dalam', 0, 0, 1, '2019-10-18 02:19:31', 'ZZZ', 'nonaktif', 'Rp. 600.000/bulan', NULL, '0895386898095', 1, '2019-10-05 04:46:45'),
('h5d982ffd6b2f4', 'sewa', 'Giri Ungasan Villas', 98, '-8.824957674685129', '115.14740873865128', 'Jl. Toya Ning II, Ungasan, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Giri Ungasan Villas adalah tempat ideal untuk menelusuri Bali. Dari properti ini, para tamu dapat menikmati akses mudah ke semua hal yang dimiliki oleh kota yang aktif ini. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nfasilitas yang telah dirancang dengan baik demi menjaga kenyamanan maksimum. Daftar lengkap fasilitas rekreasi yang tersedia di properti ini meliputi Kolam renang luar ruangan. Ketika Anda mencari penginapan yang nyaman di Bali, jadikanlah Uma Giri Ungasan Villas rumah Anda ketika berlibur.', 'aktif', 'Rp. 1.000.000/hari', '180m2', '6287875088000', 1, '2019-10-05 05:54:05'),
('h5d98398359c32', 'sewa', 'Artelier Villa', 99, '-8.805517717874901', '115.16189790433396', 'Gg. Mantili No.20, Ungasan, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 2, '2019-10-16 07:23:39', 'Ideal untuk bersenang-senang dan bersantai, Artelier Villa terletak di area Jimbaran, Bali. Properti ini  umumnya hanya membutuhkan waktu 30 menit untuk mencapai bandara. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak terkalahkan di properti yang ada di Bali ini. WiFi gratis di semua kamar, Dapur merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Artelier Villa rumah Anda ketika berlibur.', 'aktif', 'Rp. 1.300.000/hari', '250m2', '6281314155159', 1, '2019-10-05 06:34:43'),
('h5d983df578602', 'sewa', 'Villa Bunny Seminyak', 90, '-8.689138137225536', '115.16549291286276', 'Jl. Drupadi No.108, Seminyak, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa Bunny Seminyak adalah pilihan yang populer bagi para wisatawan. Properti ini tidak terlalu jauh dari pusat kota, hanya dari sini dan umumnya hanya membutuhkan waktu 30 menit untuk mencapai bandara. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di properti yang ada Bali ini. Dapur, WiFi gratis di semua kamar, Wi-fi di tempat umum, ruang bersantai/area menonton TV bersama merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nFasilitas hiburan properti ini seperti kolam renang luar ruangan, taman dirancang untuk bersantai. Ketika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa Bunny Seminyak rumah Anda ketika berlibur.', 'aktif', 'Rp. 1.700.000/hari', '150m2', '6282237776330', 1, '2019-10-05 06:53:41'),
('h5d9894ea350f4', 'sewa', 'VILLA di Sewakan di kerobokan kuta utara', 100, '-8.64824080342531', '115.16747867576896', 'Jl. Pengubugan No.8c, Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bali 80361, Indonesia', 3, 4, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa ini adalah tempat ideal untuk menelusuri Bali. Dari properti ini, para tamu dapat menikmati akses mudah ke semua hal yang dimiliki oleh kota yang aktif ini. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di properti yang ada Bali ini. Dapur, WiFi gratis di semua kamar, Wi-fi di tempat umum, ruang bersantai/area menonton TV bersama merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa ini rumah Anda ketika berlibur.', 'aktif', 'Rp. 2.200.000/hari', '400m2', '6281933042709', 1, '2019-10-05 13:04:42'),
('h5d99e909e4abd', 'sewa', 'Villa 2 kamar sewa harian dengan private pool di Seminyak', 91, '-8.701146800000002', '115.17475230000002', 'Jl. Dewi Ratih No.4, Legian, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa ini adalah tempat ideal untuk menelusuri Bali. Dari properti ini, para tamu dapat menikmati akses mudah ke semua hal yang dimiliki oleh kota yang aktif ini. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak terkalahkan di properti yang ada di Bali ini. WiFi gratis di semua kamar, Dapur merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa ini rumah Anda ketika berlibur.', 'aktif', 'Rp. 1.750.000/hari', '130m2', '6287861855796', 1, '2019-10-06 13:15:53'),
('h5d99ecd585ff4', 'sewa', 'Villa Baru 2 Bedrooms di Jimbaran', 101, '-8.801429236065795', '115.14773570632178', 'Jl. Blongkeker No.20, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'terletak di area Jimbaran, Bali. Properti ini hanya berjarak 0.2 km dari pusat kota, dan umumnya hanya membutuhkan waktu 5 menit untuk mencapai bandara. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak terkalahkan di properti yang ada di Bali ini.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa ini menjadi rumah Anda ketika berlibur.', 'aktif', 'Rp. 12.000.000/bulan', '120m2', '628170660869', 1, '2019-10-06 13:32:05'),
('h5d9a018317327', 'sewa', 'Disewakan villa di jimbaran-nusa dua', 102, '-8.777148799999999', '115.18849509999995', 'Perum Taman Jimbaran, Jl Kor Jimbaran Komplek Villa J Legend no A8, Mumbul, Nusa Dua, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 3, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa cantik di area Jimbaran, Bali. Properti ini umumnya hanya membutuhkan waktu 5 menit untuk mencapai bandara. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak terkalahkan di properti yang ada di Bali ini. WiFi gratis di semua kamar,  Dapur merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\nSemua akomodasi tamu dilengkapi dengan fasilitas yang telah dirancang dengan baik demi menjaga kenyamanan maksimum.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa cantik di Jimbaran ini rumah Anda ketika berlibur.', 'aktif', 'Rp. 15.000.000/bulan', '100m2', '6285739075422', 1, '2019-10-06 15:00:19'),
('h5d9a159442d80', 'sewa', 'villa di bukit jimbaran', 103, '-8.80796996710225', '115.15347822852777', 'Unnamed Road, Ungasan, Kec. Kuta Sel., Kabupatén Badung, Bali 80361, Indonesia', 3, 2, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa di  Jimbaran ini adalah tempat ideal untuk menelusuri Bali. Dari properti ini, para tamu dapat menikmati akses mudah ke semua hal yang dimiliki oleh kota yang aktif ini. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nSemua akomodasi tamu dilengkapi dengan fasilitas yang telah dirancang dengan baik demi menjaga kenyamanan maksimum.\nKetika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa ini rumah Anda ketika berlibur.', 'aktif', 'Rp. 25.000.000/bulan', '240m2', '628179706527', 1, '2019-10-06 16:25:56'),
('h5d9a18f8dd4df', 'sewa', 'Villa Pulasari 203', 104, '-8.797694699999997', '115.20554440000001', 'Jl. GM Taman No.230c, Benoa, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia', 3, 3, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa Pulasari 203 adalah tempat ideal untuk menelusuri Bali. Dari properti ini, para tamu dapat menikmati akses mudah ke semua hal yang dimiliki oleh kota yang aktif ini. Karena lokasinya yang strategis, properti ini memiliki akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nSemua akomodasi tamu dilengkapi dengan fasilitas yang telah dirancang dengan baik demi menjaga kenyamanan maksimum. Ketika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa Pulasari 203 rumah Anda ketika berlibur.', 'aktif', 'Rp. 25.000.000/bulan', '200m2', '6288219563905', 1, '2019-10-06 16:40:24'),
('h5d9a1d74bc720', 'sewa', 'Villa Revata', 105, '-8.6927357', '115.23928560000002', 'Jl. Dewi Saraswati II No.6, Seminyak, Kuta, Kabupaten Badung, Bali 80361, Indonesia', 3, 3, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa Revata adalah pilihan yang populer bagi para wisatawan.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di properti yang ada Bali ini. Dapur, WiFi gratis di semua kamar, Wi-fi di tempat umum, ruang bersantai/area menonton TV bersama merupakan fasilitas yang tersedia untuk memberikan kenyamanan kepada para tamu.\n Fasilitas hiburan properti ini seperti kolam renang luar ruangan, taman dirancang untuk bersantai. Ketika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa Revata  rumah Anda ketika berlibur.', 'aktif', 'Rp. 2.000.000/hari', '1800m2', '6281239938336', 1, '2019-10-06 16:59:32'),
('h5d9a2fbcc56cd', 'sewa', 'Villa Gunung Catur', 106, '-8.634812476536457', '115.19475836593472', 'blok E, Jl. Gn. Catur II No.7, Padangsambian Kaja, West Denpasar, Denpasar City, Bali 80118, Indonesia', 3, 4, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa Gunung Catur merupakan tempat yang sempurna untuk menikmati Bali dan sekitarnya. Dari sini, para tamu dapat menikmati akses mudah ke semua hal yang dapat ditemukan di sebuah kota yang aktif ini. Dengan lokasinya yang strategis, hotel ini menawarkan akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di hotel Bali ini. Fasilitas terbaik hotel ini termasuk WiFi gratis di semua kamar, tempat parkir mobil, kamar untuk keluarga.\nmembantu Anda mengumpulkan tenaga kembali setelah lelah beraktivitas. Baik Anda yang menyenangi kebugaran atau hanya ingin bersantai setelah beraktivitas sepanjang hari, Anda akan dihibur dengan fasilitas rekreasi kelas atas seperti kolam renang luar ruangan. Villa Gunung Catur adalah destinasi serbaguna bagi Andaberliburan berkualitas di Bali.', 'nonaktif', 'Rp. 2.000.000/hari', '300m2', '628124658217', 1, '2019-10-06 18:17:32'),
('h5d9a2fbf7323f', 'sewa', 'Villa Gunung Catur', 106, '-8.634812476536457', '115.19475836593472', 'blok E, Jl. Gn. Catur II No.7, Padangsambian Kaja, West Denpasar, Denpasar City, Bali 80118, Indonesia', 3, 4, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa Gunung Catur merupakan tempat yang sempurna untuk menikmati Bali dan sekitarnya. Dari sini, para tamu dapat menikmati akses mudah ke semua hal yang dapat ditemukan di sebuah kota yang aktif ini. Dengan lokasinya yang strategis, hotel ini menawarkan akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di hotel Bali ini. Fasilitas terbaik hotel ini termasuk WiFi gratis di semua kamar, tempat parkir mobil, kamar untuk keluarga.\nmembantu Anda mengumpulkan tenaga kembali setelah lelah beraktivitas. Baik Anda yang menyenangi kebugaran atau hanya ingin bersantai setelah beraktivitas sepanjang hari, Anda akan dihibur dengan fasilitas rekreasi kelas atas seperti kolam renang luar ruangan. Villa Gunung Catur adalah destinasi serbaguna bagi Andaberliburan berkualitas di Bali.', 'aktif', 'Rp. 2.000.000/hari', '300m2', '628124658217', 1, '2019-10-06 18:17:35'),
('h5d9a34d367d45', 'sewa', 'Luxury villa alira', 107, '-8.67983703443005', '115.15175440842893', 'Gg. Gagak Jl. Taman Ganesha No.3, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali, Indonesia', 3, 5, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa ini menyediakan layanan dan fasilitas terbaik. Ada beberapa fasilitas hotel ini seperti WiFi, gratis tempat parkir mobil, dll\nVilla ini memiliki 5 kamar tidur  yang semuanya dirancang dengan selera tinggi.\nTelevisi layar datar, akses internet - WiFi, kolam renang, akses internet WiFi (gratis), AC tersedia beberapa fasilitas yang bisa Anda nikmati. Apakah Anda seorang penggemar rekreasi atau hanya mencari cara untuk bersantai setelah seharian bekerja. Luxury villa alira  adalah destinasi serbaguna bagi Anda mencari yang berkualitas di Bali.', 'aktif', 'Rp. 6.750.000/hari', '400m2', '6281805382312', 1, '2019-10-06 18:39:15'),
('h5d9a372349a6c', 'sewa', 'Villa Sanur Lumbung', 108, '-8.69109215496628', '115.2582709550278', 'Jl. By Pass Ngurah Rai No.342, Sanur, Kec. Denpasar Sel., Kota Denpasar, Bali 80228, Indonesia', 3, 4, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'Villa Sanur Lumbung merupakan tempat yang sempurna untuk menikmati Bali dan sekitarnya. Dari sini, para tamu dapat menikmati akses mudah ke semua hal yang dapat ditemukan di sebuah kota yang aktif ini. Dengan lokasinya yang strategis, villa ini menawarkan akses mudah ke destinasi yang wajib dikunjungi di kota ini.\nGunakan kesempatan untuk menikmati pelayanan dan fasilitas yang tidak tertandingi di villa Bali ini.\nNikmati fasilitas kamar berkualitas tinggi selama Anda menginap di sini. \n Ketika Anda mencari penginapan yang nyaman di Bali, jadikanlah Villa Sanur Lumbung rumah Anda ketika berlibur.', 'aktif', 'Rp. 25.000.000/bulan', '500m2', '6285100906865', 1, '2019-10-06 18:49:07'),
('h5da0765e4fad2', 'sewa', 'wiro', 1, '-8.639293799999999', '115.22447369999998', 'Jl. Suli No.24, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80234, Indonesia', 1, 0, 'dalam', 0, 0, 0, '2019-10-18 02:19:34', 'adafaf', 'nonaktif', 'Rp. 1/tahun', NULL, '089113121313', 1, '2019-10-11 12:32:30'),
('h5da077475e202', 'sewa', 'wwz', 1, '-8.639293799999999', '115.22447369999998', 'Jl. Suli No.24, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80234, Indonesia', 1, 0, 'dalam', 0, 0, 0, '2019-10-18 02:19:33', 'adadadz', 'nonaktif', 'Rp. 11/bulan', NULL, '12113', 1, '2019-10-11 12:36:23'),
('h5da2f8a9deab3', 'sewa', 'anugrah', 112, '-8.7029386', '115.18929849999995', 'Gg. Dewi Sri No.15, Pemogan, Kec. Denpasar Sel., Kota Denpasar, Bali 80119, Indonesia', 1, 5, 'dalam', 1, 0, 1, '2019-10-16 07:23:39', 'awaresdxytsftydhgxtujd', 'nonaktif', 'Rp. 500.000/bulan', '3x3', '081237866404', 1, '2019-10-13 10:12:57'),
('h5da3e0e5de738', 'sewa', 'wz', 1, '-8.636667082612007', '115.23130674639674', 'Jl. Kenyeri II No.13, Tonja, Kec. Denpasar Utara, Kota Denpasar, Bali 80235, Indonesia', 1, 0, 'dalam', 0, 0, 0, '2019-10-18 02:19:33', 'test', 'nonaktif', 'Rp. 2.000.000/bulan', NULL, '0895386898095', 1, '2019-10-14 02:43:49'),
('h5da5cc82cb362', 'sewa', 'Rumah Kos', 118, '-8.7999139', '115.16135080000004', 'Jl.dr Saharjo119B / Gang Rahayu no.18 Rt 05 Rw 10. Kec.Tebet. jaksel 12860', 1, 1, 'dalam', 1, 0, 0, '2019-10-16 07:23:39', 'AC ,wifi,kamar mandi dalam. Single springbed. Lemari pakain.meja kerja. Parkir motor.CCTV Kamera 24 jam. Ada dapur umum. Warung nasi dan minuman. Kunci gerbang dapat 1. Harus ada Surat nikah bagi yg berkeluarga.', 'aktif', 'Rp. 1.700.000/bulan', NULL, '081311018736', 3, '2019-10-15 13:41:22'),
('h5da8553196f4b', 'sewa', 'AK', 1, '-8.63687537290909', '115.2304389328491', 'Jl. Kenyeri II C No.7a, Tonja, Kec. Denpasar Utara, Kota Denpasar, Bali 80235, Indonesia', 1, 0, '', 0, 0, 0, '2019-10-18 02:19:33', 'ADADAD', 'nonaktif', 'Rp. 1.111/bulan', NULL, '0128192121313', 1, '2019-10-17 11:49:05'),
('h5da91e375fb36', 'sewa', 'Rumah wa', 1, '-8.647658999999999', '115.22282059999998', 'Jl. Suli No.15, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80234, Indonesia', 1, 0, '', 0, 0, 0, '2019-10-18 02:06:47', 'SKuyla', 'nonaktif', 'Rp. 2.000.000/tahun', NULL, '08976313123', 1, '2019-10-18 02:06:47'),
('h5da91fa4b693c', 'sewa', 'James Home', 1, '-8.643027481542283', '115.23108266301267', 'Jl. Kenyeri No.64, Sumerta Kaja, Kec. Denpasar Tim., Kota Denpasar, Bali 80236, Indonesia', 2, 1, '', 0, 0, 0, '2019-10-18 02:12:52', 'ALLADAMDADA', 'nonaktif', 'Rp. 90.000.000/bulan', NULL, '0895438913', 1, '2019-10-18 02:12:52'),
('h5da91ff615bd4', 'sewa', 'Kenyeri A', 1, '-8.639293799999999', '115.22447369999998', 'Jl. Suli No.24, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali 80234, Indonesia', 1, 0, '', 0, 0, 0, '2019-10-18 02:14:14', 'adadad', 'nonaktif', 'Rp. 131.213.121/bulan', NULL, '089131213122', 1, '2019-10-18 02:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `properti_fitur`
--

CREATE TABLE `properti_fitur` (
  `id` int(11) NOT NULL,
  `id_properti` varchar(50) NOT NULL,
  `id_fitur` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti_fitur`
--

INSERT INTO `properti_fitur` (`id`, `id_properti`, `id_fitur`, `created_at`) VALUES
(3, 'h5d8a2ae6c9dd5', 2, '2019-09-24 14:40:38'),
(4, 'h5d8a2ae6c9dd5', 3, '2019-09-24 14:40:38'),
(5, 'h5d8a2ae6c9dd5', 4, '2019-09-24 14:40:38'),
(6, 'h5d8a2ae6c9dd5', 7, '2019-09-24 14:40:38'),
(7, 'h5d8a2ae6c9dd5', 8, '2019-09-24 14:40:38'),
(13, 'h5d8a3494332d4', 2, '2019-09-24 15:21:56'),
(14, 'h5d8a3494332d4', 3, '2019-09-24 15:21:56'),
(15, 'h5d8a3494332d4', 4, '2019-09-24 15:21:56'),
(16, 'h5d8a3494332d4', 8, '2019-09-24 15:21:56'),
(53, 'h5d8b08e05864a', 2, '2019-09-25 07:06:08'),
(54, 'h5d8b08e05864a', 3, '2019-09-25 07:06:08'),
(55, 'h5d8b08e05864a', 4, '2019-09-25 07:06:08'),
(56, 'h5d8b08e05864a', 7, '2019-09-25 07:06:08'),
(57, 'h5d8b08e05864a', 8, '2019-09-25 07:06:08'),
(58, 'h5d8b0c7f12e70', 2, '2019-09-25 07:08:06'),
(59, 'h5d8b0c7f12e70', 3, '2019-09-25 07:08:06'),
(60, 'h5d8b0c7f12e70', 4, '2019-09-25 07:08:06'),
(61, 'h5d8b0c7f12e70', 8, '2019-09-25 07:08:06'),
(79, 'h5d8b02cb55991', 2, '2019-09-25 07:10:56'),
(80, 'h5d8b02cb55991', 3, '2019-09-25 07:10:56'),
(81, 'h5d8b02cb55991', 4, '2019-09-25 07:10:56'),
(82, 'h5d8b02cb55991', 7, '2019-09-25 07:10:56'),
(83, 'h5d8b02cb55991', 8, '2019-09-25 07:10:56'),
(84, 'h5d8b1c8900a1e', 2, '2019-09-25 07:51:37'),
(85, 'h5d8b1c8900a1e', 3, '2019-09-25 07:51:37'),
(86, 'h5d8b1c8900a1e', 4, '2019-09-25 07:51:37'),
(87, 'h5d8b1c8900a1e', 8, '2019-09-25 07:51:37'),
(88, 'h5d8b22e47e817', 2, '2019-09-25 08:18:44'),
(89, 'h5d8b22e47e817', 3, '2019-09-25 08:18:44'),
(90, 'h5d8b22e47e817', 4, '2019-09-25 08:18:44'),
(91, 'h5d8b22e47e817', 8, '2019-09-25 08:18:44'),
(92, 'h5d8b30e096a50', 2, '2019-09-25 09:18:24'),
(93, 'h5d8b30e096a50', 3, '2019-09-25 09:18:24'),
(94, 'h5d8b30e096a50', 4, '2019-09-25 09:18:24'),
(95, 'h5d8b30e096a50', 5, '2019-09-25 09:18:24'),
(96, 'h5d8b30e096a50', 7, '2019-09-25 09:18:24'),
(97, 'h5d8b30e096a50', 8, '2019-09-25 09:18:24'),
(98, 'h5d8b35dd78fbc', 2, '2019-09-25 09:39:41'),
(99, 'h5d8b35dd78fbc', 3, '2019-09-25 09:39:41'),
(100, 'h5d8b35dd78fbc', 4, '2019-09-25 09:39:41'),
(101, 'h5d8b35dd78fbc', 7, '2019-09-25 09:39:41'),
(102, 'h5d8b35dd78fbc', 8, '2019-09-25 09:39:41'),
(104, 'h5d8cc2a2a06d4', 2, '2019-09-26 13:52:34'),
(105, 'h5d8cc2a2a06d4', 3, '2019-09-26 13:52:34'),
(106, 'h5d8cc2a2a06d4', 4, '2019-09-26 13:52:34'),
(107, 'h5d8cc2a2a06d4', 5, '2019-09-26 13:52:34'),
(108, 'h5d8cc2a2a06d4', 8, '2019-09-26 13:52:34'),
(109, 'h5d8cc87c94d12', 3, '2019-09-26 14:17:32'),
(110, 'h5d8cc87c94d12', 4, '2019-09-26 14:17:32'),
(111, 'h5d8cc87c94d12', 8, '2019-09-26 14:17:32'),
(112, 'h5d8ccb00cec3a', 2, '2019-09-26 14:28:16'),
(113, 'h5d8ccb00cec3a', 3, '2019-09-26 14:28:16'),
(114, 'h5d8ccb00cec3a', 4, '2019-09-26 14:28:16'),
(115, 'h5d8ccb00cec3a', 8, '2019-09-26 14:28:16'),
(131, 'h5d8d60ca9b993', 2, '2019-09-27 01:07:22'),
(132, 'h5d8d60ca9b993', 3, '2019-09-27 01:07:22'),
(133, 'h5d8d60ca9b993', 4, '2019-09-27 01:07:22'),
(134, 'h5d8d60ca9b993', 7, '2019-09-27 01:07:22'),
(135, 'h5d8d60ca9b993', 8, '2019-09-27 01:07:22'),
(136, 'h5d8d641b77c61', 2, '2019-09-27 01:21:31'),
(137, 'h5d8d641b77c61', 3, '2019-09-27 01:21:31'),
(138, 'h5d8d641b77c61', 4, '2019-09-27 01:21:31'),
(139, 'h5d8d641b77c61', 8, '2019-09-27 01:21:31'),
(140, 'h5d8b3d6c50e2f', 2, '2019-09-27 03:12:24'),
(141, 'h5d8d811b2fddd', 2, '2019-09-27 03:25:15'),
(142, 'h5d8d811b2fddd', 3, '2019-09-27 03:25:15'),
(143, 'h5d8d811b2fddd', 4, '2019-09-27 03:25:15'),
(144, 'h5d8d811b2fddd', 8, '2019-09-27 03:25:15'),
(145, 'h5d8dc36725764', 2, '2019-09-27 08:08:07'),
(146, 'h5d8dc36725764', 3, '2019-09-27 08:08:07'),
(147, 'h5d8dc36725764', 4, '2019-09-27 08:08:07'),
(148, 'h5d8dc36725764', 7, '2019-09-27 08:08:07'),
(149, 'h5d8dc36725764', 8, '2019-09-27 08:08:07'),
(150, 'h5d8dc78367d65', 2, '2019-09-27 08:25:39'),
(151, 'h5d8dc78367d65', 3, '2019-09-27 08:25:39'),
(152, 'h5d8dc78367d65', 4, '2019-09-27 08:25:39'),
(153, 'h5d8dc78367d65', 7, '2019-09-27 08:25:39'),
(154, 'h5d8dc78367d65', 8, '2019-09-27 08:25:39'),
(155, 'h5d8e1b5a35c71', 2, '2019-09-27 14:23:22'),
(156, 'h5d8e1b5a35c71', 3, '2019-09-27 14:23:22'),
(157, 'h5d8e1b5a35c71', 4, '2019-09-27 14:23:22'),
(158, 'h5d8e1b5a35c71', 8, '2019-09-27 14:23:22'),
(159, 'h5d8e1c04a63e4', 5, '2019-09-27 14:26:12'),
(160, 'h5d8e1c04a63e4', 7, '2019-09-27 14:26:12'),
(161, 'h5d8e1c04a63e4', 8, '2019-09-27 14:26:12'),
(162, 'h5d8e21721211a', 2, '2019-09-27 14:49:22'),
(163, 'h5d8e21721211a', 4, '2019-09-27 14:49:22'),
(164, 'h5d8e23e61fce8', 2, '2019-09-27 14:59:50'),
(165, 'h5d8e23e61fce8', 3, '2019-09-27 14:59:50'),
(166, 'h5d8e23e61fce8', 4, '2019-09-27 14:59:50'),
(167, 'h5d8e23e61fce8', 8, '2019-09-27 14:59:50'),
(168, 'h5d8e260ec0957', 2, '2019-09-27 15:09:02'),
(169, 'h5d8e260ec0957', 3, '2019-09-27 15:09:02'),
(170, 'h5d8e260ec0957', 4, '2019-09-27 15:09:02'),
(171, 'h5d8e260ec0957', 8, '2019-09-27 15:09:02'),
(172, 'h5d8e2980d19a3', 2, '2019-09-27 15:23:44'),
(173, 'h5d8e2980d19a3', 4, '2019-09-27 15:23:44'),
(174, 'h5d8e2980d19a3', 8, '2019-09-27 15:23:44'),
(175, 'h5d8e2bf554183', 2, '2019-09-27 15:34:13'),
(176, 'h5d8e2bf554183', 4, '2019-09-27 15:34:13'),
(177, 'h5d8e2bf554183', 8, '2019-09-27 15:34:13'),
(178, 'h5d8f65d2cf7ab', 2, '2019-09-28 13:53:22'),
(179, 'h5d8f65d2cf7ab', 3, '2019-09-28 13:53:22'),
(180, 'h5d8f65d2cf7ab', 4, '2019-09-28 13:53:22'),
(181, 'h5d8f65d2cf7ab', 8, '2019-09-28 13:53:22'),
(182, 'h5d8f6a6a79f02', 2, '2019-09-28 14:12:58'),
(183, 'h5d8f6a6a79f02', 3, '2019-09-28 14:12:58'),
(184, 'h5d8f6a6a79f02', 4, '2019-09-28 14:12:58'),
(185, 'h5d8f6a6a79f02', 8, '2019-09-28 14:12:58'),
(186, 'h5d8f6d1a15d1f', 2, '2019-09-28 14:24:26'),
(187, 'h5d8f6d1a15d1f', 4, '2019-09-28 14:24:26'),
(188, 'h5d8f7090ae78f', 2, '2019-09-28 14:39:12'),
(189, 'h5d8f7090ae78f', 3, '2019-09-28 14:39:12'),
(190, 'h5d8f7090ae78f', 4, '2019-09-28 14:39:12'),
(191, 'h5d8f7090ae78f', 7, '2019-09-28 14:39:12'),
(192, 'h5d8f7090ae78f', 8, '2019-09-28 14:39:12'),
(193, 'h5d8f73330f396', 2, '2019-09-28 14:50:27'),
(194, 'h5d8f73330f396', 3, '2019-09-28 14:50:27'),
(195, 'h5d8f73330f396', 4, '2019-09-28 14:50:27'),
(196, 'h5d9054a6180fe', 2, '2019-09-29 06:52:22'),
(197, 'h5d9054a6180fe', 3, '2019-09-29 06:52:22'),
(198, 'h5d9054a6180fe', 4, '2019-09-29 06:52:22'),
(199, 'h5d9054a6180fe', 7, '2019-09-29 06:52:22'),
(200, 'h5d9054a6180fe', 8, '2019-09-29 06:52:22'),
(201, 'h5d9061f76cc9b', 2, '2019-09-29 07:49:11'),
(202, 'h5d9061f76cc9b', 4, '2019-09-29 07:49:11'),
(203, 'h5d9061f76cc9b', 8, '2019-09-29 07:49:11'),
(204, 'h5d90655232237', 2, '2019-09-29 08:03:30'),
(205, 'h5d90655232237', 4, '2019-09-29 08:03:30'),
(206, 'h5d90687329cab', 2, '2019-09-29 08:16:51'),
(207, 'h5d90687329cab', 3, '2019-09-29 08:16:51'),
(208, 'h5d90687329cab', 4, '2019-09-29 08:16:51'),
(209, 'h5d90687329cab', 8, '2019-09-29 08:16:51'),
(210, 'h5d906b319284b', 2, '2019-09-29 08:28:33'),
(211, 'h5d906b319284b', 3, '2019-09-29 08:28:33'),
(212, 'h5d906b319284b', 4, '2019-09-29 08:28:33'),
(213, 'h5d906b319284b', 7, '2019-09-29 08:28:33'),
(214, 'h5d906b319284b', 8, '2019-09-29 08:28:33'),
(215, 'h5d90710f311aa', 2, '2019-09-29 08:53:35'),
(216, 'h5d90710f311aa', 3, '2019-09-29 08:53:35'),
(217, 'h5d90710f311aa', 4, '2019-09-29 08:53:35'),
(218, 'h5d90710f311aa', 5, '2019-09-29 08:53:35'),
(219, 'h5d90710f311aa', 7, '2019-09-29 08:53:35'),
(220, 'h5d90710f311aa', 8, '2019-09-29 08:53:35'),
(221, 'h5d907481e0851', 2, '2019-09-29 09:08:17'),
(222, 'h5d907481e0851', 3, '2019-09-29 09:08:17'),
(223, 'h5d907481e0851', 4, '2019-09-29 09:08:17'),
(224, 'h5d907481e0851', 7, '2019-09-29 09:08:17'),
(225, 'h5d907481e0851', 8, '2019-09-29 09:08:17'),
(226, 'h5d90767ac7744', 2, '2019-09-29 09:16:42'),
(227, 'h5d90767ac7744', 3, '2019-09-29 09:16:42'),
(228, 'h5d90767ac7744', 4, '2019-09-29 09:16:42'),
(229, 'h5d90767ac7744', 8, '2019-09-29 09:16:42'),
(230, 'h5d907a147ba65', 2, '2019-09-29 09:32:04'),
(231, 'h5d907a147ba65', 3, '2019-09-29 09:32:04'),
(232, 'h5d907a147ba65', 4, '2019-09-29 09:32:04'),
(233, 'h5d907a147ba65', 7, '2019-09-29 09:32:04'),
(234, 'h5d907a147ba65', 8, '2019-09-29 09:32:04'),
(235, 'h5d907f3deb1a3', 2, '2019-09-29 09:54:05'),
(236, 'h5d907f3deb1a3', 3, '2019-09-29 09:54:05'),
(237, 'h5d907f3deb1a3', 4, '2019-09-29 09:54:05'),
(238, 'h5d907f3deb1a3', 7, '2019-09-29 09:54:05'),
(239, 'h5d907f3deb1a3', 8, '2019-09-29 09:54:05'),
(240, 'h5d90815b4162e', 2, '2019-09-29 10:03:07'),
(241, 'h5d90815b4162e', 3, '2019-09-29 10:03:07'),
(242, 'h5d90815b4162e', 4, '2019-09-29 10:03:07'),
(243, 'h5d90815b4162e', 7, '2019-09-29 10:03:07'),
(244, 'h5d90815b4162e', 8, '2019-09-29 10:03:07'),
(245, 'h5d90d61d5ea76', 2, '2019-09-29 16:04:45'),
(246, 'h5d90d61d5ea76', 3, '2019-09-29 16:04:45'),
(247, 'h5d90d61d5ea76', 4, '2019-09-29 16:04:45'),
(248, 'h5d90d61d5ea76', 8, '2019-09-29 16:04:45'),
(249, 'h5d90db9e90113', 2, '2019-09-29 16:28:14'),
(250, 'h5d90db9e90113', 3, '2019-09-29 16:28:14'),
(251, 'h5d90db9e90113', 4, '2019-09-29 16:28:14'),
(252, 'h5d90db9e90113', 7, '2019-09-29 16:28:14'),
(253, 'h5d90db9e90113', 8, '2019-09-29 16:28:14'),
(254, 'h5d90df56836ca', 2, '2019-09-29 16:44:06'),
(255, 'h5d90df56836ca', 3, '2019-09-29 16:44:06'),
(256, 'h5d90df56836ca', 4, '2019-09-29 16:44:06'),
(257, 'h5d90df56836ca', 5, '2019-09-29 16:44:06'),
(258, 'h5d90e43c1083e', 2, '2019-09-29 17:05:00'),
(259, 'h5d90e43c1083e', 4, '2019-09-29 17:05:00'),
(260, 'h5d90e43c1083e', 7, '2019-09-29 17:05:00'),
(261, 'h5d90e43c1083e', 8, '2019-09-29 17:05:00'),
(262, 'h5d90e69bbe56b', 2, '2019-09-29 17:15:07'),
(263, 'h5d90e69bbe56b', 4, '2019-09-29 17:15:07'),
(268, 'h5d945fa5b0c33', 2, '2019-10-02 08:28:21'),
(269, 'h5d945fa5b0c33', 3, '2019-10-02 08:28:21'),
(270, 'h5d945fa5b0c33', 4, '2019-10-02 08:28:21'),
(271, 'h5d945fa5b0c33', 5, '2019-10-02 08:28:21'),
(272, 'h5d945fa5b0c33', 6, '2019-10-02 08:28:21'),
(273, 'h5d945fa5b0c33', 8, '2019-10-02 08:28:21'),
(274, 'h5d9463bb8888c', 2, '2019-10-02 08:45:47'),
(275, 'h5d9463bb8888c', 4, '2019-10-02 08:45:47'),
(276, 'h5d9463bb8888c', 8, '2019-10-02 08:45:47'),
(277, 'h5d94aa3ac992e', 2, '2019-10-02 13:46:34'),
(278, 'h5d94aa3ac992e', 3, '2019-10-02 13:46:34'),
(279, 'h5d94aa3ac992e', 4, '2019-10-02 13:46:34'),
(280, 'h5d94aa3ac992e', 5, '2019-10-02 13:46:34'),
(281, 'h5d94aa3ac992e', 8, '2019-10-02 13:46:34'),
(282, 'h5d94b1568ee5f', 2, '2019-10-02 14:16:54'),
(283, 'h5d94b1568ee5f', 4, '2019-10-02 14:16:54'),
(284, 'h5d94b1568ee5f', 8, '2019-10-02 14:16:54'),
(285, 'h5d94c69849d5d', 1, '2019-10-02 15:47:36'),
(286, 'h5d94c69849d5d', 4, '2019-10-02 15:47:36'),
(287, 'h5d94c69849d5d', 5, '2019-10-02 15:47:36'),
(288, 'h5d94c69849d5d', 7, '2019-10-02 15:47:36'),
(289, 'h5d94c69849d5d', 8, '2019-10-02 15:47:36'),
(290, 'h5d94d68980bcf', 2, '2019-10-02 16:55:37'),
(291, 'h5d94d68980bcf', 4, '2019-10-02 16:55:37'),
(292, 'h5d94d68980bcf', 5, '2019-10-02 16:55:37'),
(293, 'h5d94d68980bcf', 8, '2019-10-02 16:55:37'),
(294, 'h5d94d9f9384b8', 2, '2019-10-02 17:10:17'),
(295, 'h5d94d9f9384b8', 4, '2019-10-02 17:10:17'),
(296, 'h5d94d9f9384b8', 5, '2019-10-02 17:10:17'),
(297, 'h5d94d9f9384b8', 8, '2019-10-02 17:10:17'),
(298, 'h5d94dca29567a', 2, '2019-10-02 17:21:38'),
(299, 'h5d94dca29567a', 3, '2019-10-02 17:21:38'),
(300, 'h5d94dca29567a', 4, '2019-10-02 17:21:38'),
(301, 'h5d94dca29567a', 5, '2019-10-02 17:21:38'),
(302, 'h5d94dca29567a', 8, '2019-10-02 17:21:38'),
(303, 'h5d94deff38c48', 2, '2019-10-02 17:31:43'),
(304, 'h5d94deff38c48', 4, '2019-10-02 17:31:43'),
(305, 'h5d94deff38c48', 5, '2019-10-02 17:31:43'),
(306, 'h5d94deff38c48', 7, '2019-10-02 17:31:43'),
(307, 'h5d94deff38c48', 8, '2019-10-02 17:31:43'),
(308, 'h5d956e84853a6', 4, '2019-10-03 03:44:04'),
(309, 'h5d956e84853a6', 5, '2019-10-03 03:44:04'),
(310, 'h5d956e84853a6', 8, '2019-10-03 03:44:04'),
(311, 'h5d9740772b656', 2, '2019-10-04 12:52:07'),
(312, 'h5d9740772b656', 4, '2019-10-04 12:52:07'),
(313, 'h5d9740772b656', 5, '2019-10-04 12:52:07'),
(314, 'h5d9740772b656', 8, '2019-10-04 12:52:07'),
(315, 'h5d9760085bdb4', 2, '2019-10-04 15:06:48'),
(316, 'h5d9760085bdb4', 3, '2019-10-04 15:06:48'),
(317, 'h5d9760085bdb4', 4, '2019-10-04 15:06:48'),
(318, 'h5d9760085bdb4', 5, '2019-10-04 15:06:48'),
(319, 'h5d9760085bdb4', 8, '2019-10-04 15:06:48'),
(320, 'h5d9763c0d0247', 2, '2019-10-04 15:22:40'),
(321, 'h5d9763c0d0247', 4, '2019-10-04 15:22:40'),
(322, 'h5d9763c0d0247', 5, '2019-10-04 15:22:40'),
(323, 'h5d9763c0d0247', 8, '2019-10-04 15:22:40'),
(324, 'h5d976877f1707', 2, '2019-10-04 15:42:47'),
(325, 'h5d976877f1707', 3, '2019-10-04 15:42:47'),
(326, 'h5d976877f1707', 4, '2019-10-04 15:42:47'),
(327, 'h5d976877f1707', 5, '2019-10-04 15:42:47'),
(328, 'h5d976877f1707', 8, '2019-10-04 15:42:47'),
(329, 'h5d976b7b8bdcb', 2, '2019-10-04 15:55:39'),
(330, 'h5d976b7b8bdcb', 3, '2019-10-04 15:55:39'),
(331, 'h5d976b7b8bdcb', 4, '2019-10-04 15:55:39'),
(332, 'h5d976b7b8bdcb', 5, '2019-10-04 15:55:39'),
(341, 'h5d980f4d46d03', 2, '2019-10-05 03:34:37'),
(342, 'h5d980f4d46d03', 4, '2019-10-05 03:34:37'),
(343, 'h5d980f4d46d03', 5, '2019-10-05 03:34:37'),
(344, 'h5d980f4d46d03', 8, '2019-10-05 03:34:37'),
(345, 'h5d9814b37d842', 2, '2019-10-05 03:57:39'),
(346, 'h5d9814b37d842', 3, '2019-10-05 03:57:39'),
(347, 'h5d9814b37d842', 4, '2019-10-05 03:57:39'),
(348, 'h5d9814b37d842', 5, '2019-10-05 03:57:39'),
(349, 'h5d9814b37d842', 8, '2019-10-05 03:57:39'),
(350, 'h5d982ffd6b2f4', 2, '2019-10-05 05:54:05'),
(351, 'h5d982ffd6b2f4', 4, '2019-10-05 05:54:05'),
(352, 'h5d982ffd6b2f4', 5, '2019-10-05 05:54:05'),
(353, 'h5d982ffd6b2f4', 8, '2019-10-05 05:54:05'),
(354, 'h5d98398359c32', 2, '2019-10-05 06:34:43'),
(355, 'h5d98398359c32', 3, '2019-10-05 06:34:43'),
(356, 'h5d98398359c32', 4, '2019-10-05 06:34:43'),
(357, 'h5d98398359c32', 5, '2019-10-05 06:34:43'),
(358, 'h5d98398359c32', 8, '2019-10-05 06:34:43'),
(359, 'h5d983df578602', 2, '2019-10-05 06:53:41'),
(360, 'h5d983df578602', 3, '2019-10-05 06:53:41'),
(361, 'h5d983df578602', 4, '2019-10-05 06:53:41'),
(362, 'h5d983df578602', 5, '2019-10-05 06:53:41'),
(363, 'h5d983df578602', 8, '2019-10-05 06:53:41'),
(367, 'h5d9894ea350f4', 2, '2019-10-05 13:04:42'),
(368, 'h5d9894ea350f4', 3, '2019-10-05 13:04:42'),
(369, 'h5d9894ea350f4', 4, '2019-10-05 13:04:42'),
(370, 'h5d9894ea350f4', 5, '2019-10-05 13:04:42'),
(371, 'h5d9894ea350f4', 8, '2019-10-05 13:04:42'),
(372, 'h5d982035aa5f4', 3, '2019-10-06 03:17:12'),
(373, 'h5d99e909e4abd', 2, '2019-10-06 13:15:53'),
(374, 'h5d99e909e4abd', 3, '2019-10-06 13:15:53'),
(375, 'h5d99e909e4abd', 4, '2019-10-06 13:15:53'),
(376, 'h5d99e909e4abd', 5, '2019-10-06 13:15:53'),
(377, 'h5d99e909e4abd', 8, '2019-10-06 13:15:53'),
(378, 'h5d99ecd585ff4', 2, '2019-10-06 13:32:05'),
(379, 'h5d99ecd585ff4', 3, '2019-10-06 13:32:05'),
(380, 'h5d99ecd585ff4', 4, '2019-10-06 13:32:05'),
(381, 'h5d99ecd585ff4', 5, '2019-10-06 13:32:05'),
(382, 'h5d99ecd585ff4', 7, '2019-10-06 13:32:05'),
(383, 'h5d99ecd585ff4', 8, '2019-10-06 13:32:05'),
(384, 'h5d9a018317327', 2, '2019-10-06 15:00:19'),
(385, 'h5d9a018317327', 3, '2019-10-06 15:00:19'),
(386, 'h5d9a018317327', 4, '2019-10-06 15:00:19'),
(387, 'h5d9a018317327', 5, '2019-10-06 15:00:19'),
(388, 'h5d9a018317327', 8, '2019-10-06 15:00:19'),
(389, 'h5d9a159442d80', 2, '2019-10-06 16:25:56'),
(390, 'h5d9a159442d80', 3, '2019-10-06 16:25:56'),
(391, 'h5d9a159442d80', 4, '2019-10-06 16:25:56'),
(392, 'h5d9a159442d80', 5, '2019-10-06 16:25:56'),
(393, 'h5d9a159442d80', 8, '2019-10-06 16:25:56'),
(394, 'h5d9a18f8dd4df', 2, '2019-10-06 16:40:24'),
(395, 'h5d9a18f8dd4df', 3, '2019-10-06 16:40:24'),
(396, 'h5d9a18f8dd4df', 4, '2019-10-06 16:40:24'),
(397, 'h5d9a18f8dd4df', 5, '2019-10-06 16:40:24'),
(398, 'h5d9a18f8dd4df', 8, '2019-10-06 16:40:24'),
(399, 'h5d9a1d74bc720', 2, '2019-10-06 16:59:32'),
(400, 'h5d9a1d74bc720', 3, '2019-10-06 16:59:32'),
(401, 'h5d9a1d74bc720', 4, '2019-10-06 16:59:32'),
(402, 'h5d9a1d74bc720', 5, '2019-10-06 16:59:32'),
(403, 'h5d9a1d74bc720', 8, '2019-10-06 16:59:32'),
(404, 'h5d9a2fbcc56cd', 2, '2019-10-06 18:17:32'),
(405, 'h5d9a2fbcc56cd', 3, '2019-10-06 18:17:32'),
(406, 'h5d9a2fbcc56cd', 4, '2019-10-06 18:17:32'),
(407, 'h5d9a2fbcc56cd', 5, '2019-10-06 18:17:32'),
(408, 'h5d9a2fbcc56cd', 8, '2019-10-06 18:17:32'),
(409, 'h5d9a2fbf7323f', 2, '2019-10-06 18:17:35'),
(410, 'h5d9a2fbf7323f', 3, '2019-10-06 18:17:35'),
(411, 'h5d9a2fbf7323f', 4, '2019-10-06 18:17:35'),
(412, 'h5d9a2fbf7323f', 5, '2019-10-06 18:17:35'),
(413, 'h5d9a2fbf7323f', 8, '2019-10-06 18:17:35'),
(414, 'h5d9a34d367d45', 2, '2019-10-06 18:39:15'),
(415, 'h5d9a34d367d45', 3, '2019-10-06 18:39:15'),
(416, 'h5d9a34d367d45', 4, '2019-10-06 18:39:15'),
(417, 'h5d9a34d367d45', 5, '2019-10-06 18:39:15'),
(418, 'h5d9a34d367d45', 8, '2019-10-06 18:39:15'),
(419, 'h5d9a372349a6c', 2, '2019-10-06 18:49:07'),
(420, 'h5d9a372349a6c', 4, '2019-10-06 18:49:07'),
(421, 'h5d9a372349a6c', 5, '2019-10-06 18:49:07'),
(422, 'h5d9a372349a6c', 8, '2019-10-06 18:49:07'),
(574, 'h5da0765e4fad2', 4, '2019-10-11 12:32:30'),
(575, 'h5da0765e4fad2', 5, '2019-10-11 12:32:30'),
(576, 'h5da0765e4fad2', 6, '2019-10-11 12:32:30'),
(577, 'h5da077475e202', 5, '2019-10-11 12:36:23'),
(578, 'h5da077475e202', 6, '2019-10-11 12:36:23'),
(579, 'h5da2f8a9deab3', 3, '2019-10-13 10:12:57'),
(580, 'h5da2f8a9deab3', 4, '2019-10-13 10:12:57'),
(581, 'h5da2f8a9deab3', 5, '2019-10-13 10:12:57'),
(582, 'h5da2f8a9deab3', 7, '2019-10-13 10:12:57'),
(583, 'h5da2f8a9deab3', 8, '2019-10-13 10:12:57'),
(588, 'h5d976ca6d191d', 1, '2019-10-14 02:40:21'),
(589, 'h5d976ca6d191d', 2, '2019-10-14 02:40:21'),
(590, 'h5d976ca6d191d', 3, '2019-10-14 02:40:21'),
(591, 'h5d976ca6d191d', 5, '2019-10-14 02:40:21'),
(593, 'h5da3e0e5de738', 1, '2019-10-14 02:43:49'),
(594, 'h5da3e0e5de738', 2, '2019-10-14 02:43:49'),
(595, 'h5da3e0e5de738', 3, '2019-10-14 02:43:49'),
(599, 'h5da5cc82cb362', 2, '2019-10-15 13:43:02'),
(600, 'h5da5cc82cb362', 3, '2019-10-15 13:43:02'),
(601, 'h5da5cc82cb362', 4, '2019-10-15 13:43:02'),
(602, 'h5da8553196f4b', 1, '2019-10-17 11:49:05'),
(603, 'h5da8553196f4b', 5, '2019-10-17 11:49:05'),
(604, 'h5da8553196f4b', 7, '2019-10-17 11:49:05'),
(605, 'h5da8553196f4b', 9, '2019-10-17 11:49:05'),
(606, 'h5da8553196f4b', 10, '2019-10-17 11:49:06'),
(607, 'h5da91e375fb36', 7, '2019-10-18 02:06:47'),
(608, 'h5da91e375fb36', 8, '2019-10-18 02:06:47'),
(609, 'h5da91e375fb36', 10, '2019-10-18 02:06:47'),
(610, 'h5da91e375fb36', 11, '2019-10-18 02:06:47'),
(611, 'h5da91fa4b693c', 1, '2019-10-18 02:12:52'),
(612, 'h5da91fa4b693c', 2, '2019-10-18 02:12:53'),
(613, 'h5da91fa4b693c', 4, '2019-10-18 02:12:53'),
(614, 'h5da91fa4b693c', 7, '2019-10-18 02:12:53'),
(615, 'h5da91ff615bd4', 2, '2019-10-18 02:14:14'),
(616, 'h5da91ff615bd4', 5, '2019-10-18 02:14:14'),
(617, 'h5da91ff615bd4', 6, '2019-10-18 02:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `properti_img`
--

CREATE TABLE `properti_img` (
  `id_img` int(11) NOT NULL,
  `id_properti` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `tag` varchar(50) NOT NULL,
  `tipe` enum('img','video') NOT NULL,
  `uploaded_by` int(11) UNSIGNED NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti_img`
--

INSERT INTO `properti_img` (`id_img`, `id_properti`, `link`, `tag`, `tipe`, `uploaded_by`, `uploaded_at`) VALUES
(3, 'h5d8a2ae6c9dd5', 'img/properties/img5d8a2ae6ccebdKos gus ade 01.jpg', 'myimg', 'img', 20, '2019-09-24 14:40:38'),
(4, 'h5d8a2ae6c9dd5', 'img/properties/img5d8a2ae6de061Kos gus ade 02.jpg', 'myimg', 'img', 20, '2019-09-24 14:40:38'),
(5, 'h5d8a2ae6c9dd5', 'img/properties/img5d8a2ae6ebeb5Kos gus ade 03.jpg', 'myimg', 'img', 20, '2019-09-24 14:40:39'),
(13, 'h5d8a3494332d4', 'img/properties/img5d8a35aa0be8bpiangmasbali 02.jpg', 'myimg', 'img', 23, '2019-09-24 15:26:34'),
(14, 'h5d8a3494332d4', 'img/properties/img5d8a35b4e58aapiangmasbali 02.png', 'myimg', 'img', 23, '2019-09-24 15:26:45'),
(15, 'h5d8a3494332d4', 'img/properties/img5d8a35c027ce7pinang mas 01.jpg', 'myimg', 'img', 23, '2019-09-29 06:34:57'),
(23, 'h5d8b02cb55991', 'img/properties/img5d8b02cb78f2a381a0959-cd7e-4142-b960-60b54bf3cdb4.jpg', 'myimg', 'img', 28, '2019-09-25 06:01:47'),
(36, 'h5d8b08e05864a', 'img/properties/img5d8b08e0b8d91b24ccb66-0d72-4ebb-907d-bd4a1421baa4.jpg', 'myimg', 'img', 29, '2019-09-25 06:27:44'),
(43, 'h5d8b0c7f12e70', 'img/properties/img5d8b0c7f2ad1f5e060905-6105-4903-aa22-899a1883d26e.jpg', 'myimg', 'img', 30, '2019-09-25 06:43:11'),
(50, 'h5d8b1c8900a1e', 'img/properties/img5d8b1c8904788efefe068-8dbc-4079-a42b-b3f7d59c4735.jpg', 'myimg', 'img', 31, '2019-09-25 07:51:37'),
(51, 'h5d8b22e47e817', 'img/properties/img5d8b22e481c47aefc1e00-786b-42c8-9e5d-aa2866e42e1d.jpg', 'myimg', 'img', 32, '2019-09-25 08:18:44'),
(52, 'h5d8b30e096a50', 'img/properties/img5d8b30e099cf0speranza residence.jpg', 'myimg', 'img', 33, '2019-09-25 09:18:24'),
(53, 'h5d8b35dd78fbc', 'img/properties/img5d8b35dd7c9ddHommy residence.jpg', 'myimg', 'img', 34, '2019-09-25 09:39:41'),
(54, 'h5d8b3d6c50e2f', 'img/properties/img5d8b3d6c533e7Kamandaka.jpg', 'myimg', 'img', 35, '2019-09-25 10:11:56'),
(55, 'h5d8cc2a2a06d4', 'img/properties/img5d8cc2a2a397epondok anjani.jpg', 'myimg', 'img', 37, '2019-09-26 13:52:34'),
(56, 'h5d8cc87c94d12', 'img/properties/img5d8cc87c97978Kost graha demak.jpg', 'myimg', 'img', 38, '2019-09-26 14:17:32'),
(57, 'h5d8ccb00cec3a', 'img/properties/img5d8ccb00d21bdMeli kost.jpg', 'myimg', 'img', 39, '2019-09-26 14:28:16'),
(63, 'h5d8d60ca9b993', 'img/properties/img5d8d60ca9ece2evelyn 04br.jpg', 'myimg', 'img', 41, '2019-09-27 01:07:22'),
(64, 'h5d8d641b77c61', 'img/properties/img5d8d641b7a9c7evelyn 01br.jpg', 'myimg', 'img', 44, '2019-09-27 01:21:31'),
(65, 'h5d8d641b77c61', 'img/properties/img5d8d641b8a305evelyn 02br.jpg', 'myimg', 'img', 44, '2019-09-27 01:21:31'),
(66, 'h5d8d641b77c61', 'img/properties/img5d8d641b975cbevelyn 03br.jpg', 'myimg', 'img', 44, '2019-09-27 01:21:31'),
(67, 'h5d8d811b2fddd', 'img/properties/img5d8d811b3242ckost grand emerald.jpg', 'myimg', 'img', 45, '2019-09-27 03:25:15'),
(68, 'h5d8dc36725764', 'img/properties/img5d8dc367289dejardin01.jpg', 'myimg', 'img', 46, '2019-09-27 08:08:07'),
(69, 'h5d8dc78367d65', 'img/properties/img5d8dc7836c0cc010.jpg', 'myimg', 'img', 47, '2019-09-27 08:25:39'),
(70, 'h5d8dc78367d65', 'img/properties/img5d8dc7837af01011.jpg', 'myimg', 'img', 47, '2019-09-27 08:25:39'),
(71, 'h5d8dc78367d65', 'img/properties/img5d8dc78387e090213.jpg', 'myimg', 'img', 47, '2019-09-27 08:25:39'),
(72, 'h5d8dc78367d65', 'img/properties/img5d8dc78394df81023.jpg', 'myimg', 'img', 47, '2019-09-27 08:25:39'),
(73, 'h5d8e1b5a35c71', 'img/properties/img5d8e1b5a38140Pondok rahayu.jpg', 'myimg', 'img', 48, '2019-09-27 14:23:22'),
(74, 'h5d8e1c04a63e4', 'img/properties/img5d8e1c04a87c8Screen Shot 2019-09-26 at 12.06.13 AM.png', 'myimg', 'img', 49, '2019-09-27 14:26:12'),
(75, 'h5d8e1c04a63e4', 'img/properties/img5d8e1c1572eb6Screen Shot 2019-09-26 at 12.24.34 AM.png', 'myimg', 'img', 49, '2019-09-27 14:26:29'),
(76, 'h5d8e21721211a', 'img/properties/img5d8e217214a76HANDIKA JAYA.jpg', 'myimg', 'img', 50, '2019-09-27 14:49:22'),
(77, 'h5d8e23e61fce8', 'img/properties/img5d8e23e623439Kubu Land.jpg', 'myimg', 'img', 51, '2019-09-27 14:59:50'),
(78, 'h5d8e260ec0957', 'img/properties/img5d8e260ec3efahaidakhandi.jpg', 'myimg', 'img', 52, '2019-09-27 15:09:02'),
(79, 'h5d8e2980d19a3', 'img/properties/img5d8e2980d43f1bharata.jpg', 'myimg', 'img', 53, '2019-09-27 15:23:44'),
(80, 'h5d8e2bf554183', 'img/properties/img5d8e2bf557137Neptunus.jpg', 'myimg', 'img', 54, '2019-09-27 15:34:13'),
(81, 'h5d8f65d2cf7ab', 'img/properties/img5d8f65d2d2fdbPondok Surya Ning.jpg', 'myimg', 'img', 55, '2019-09-28 13:53:23'),
(82, 'h5d8f6a6a79f02', 'img/properties/img5d8f6a6a7c755Oelle homestay.jpg', 'myimg', 'img', 56, '2019-09-28 14:12:58'),
(83, 'h5d8f6d1a15d1f', 'img/properties/img5d8f6d1a1799bsandi sedana.jpg', 'myimg', 'img', 57, '2019-09-28 14:24:26'),
(84, 'h5d8f7090ae78f', 'img/properties/img5d8f7090b189cdewa bharata.jpg', 'myimg', 'img', 58, '2019-09-28 14:39:12'),
(85, 'h5d8f73330f396', 'img/properties/img5d8f733312768wanakeling.jpg', 'myimg', 'img', 59, '2019-09-28 14:50:27'),
(86, 'h5d9054a6180fe', 'img/properties/img5d9054a61b136darmaga beach inn.jpg', 'myimg', 'img', 60, '2019-09-29 06:52:22'),
(87, 'h5d9061f76cc9b', 'img/properties/img5d9061f76f272finolia.jpg', 'myimg', 'img', 61, '2019-09-29 07:49:11'),
(88, 'h5d90655232237', 'img/properties/img5d9065523412bpermana guest house.jpg', 'myimg', 'img', 62, '2019-09-29 08:03:30'),
(89, 'h5d90687329cab', 'img/properties/img5d9068732c0c7pondok arjuna.jpg', 'myimg', 'img', 63, '2019-09-29 08:16:51'),
(90, 'h5d906b319284b', 'img/properties/img5d906b31967aeThe damar.jpg', 'myimg', 'img', 64, '2019-09-29 08:28:33'),
(91, 'h5d90710f311aa', 'img/properties/img5d90710f34726KUBU benak.jpg', 'myimg', 'img', 65, '2019-09-29 08:53:35'),
(92, 'h5d907481e0851', 'img/properties/img5d907481e37edKUBUKU 8.jpg', 'myimg', 'img', 66, '2019-09-29 09:08:17'),
(93, 'h5d90767ac7744', 'img/properties/img5d90767aca683kubu gdk pertiwi.jpg', 'myimg', 'img', 67, '2019-09-29 09:16:42'),
(94, 'h5d907a147ba65', 'img/properties/img5d907a147f46edananjaya.jpg', 'myimg', 'img', 68, '2019-09-29 09:32:04'),
(95, 'h5d907f3deb1a3', 'img/properties/img5d907f3dede09grya bajang.jpg', 'myimg', 'img', 69, '2019-09-29 09:54:06'),
(96, 'h5d90815b4162e', 'img/properties/img5d90815b4452fkost pemuda 3a.jpg', 'myimg', 'img', 70, '2019-09-29 10:03:07'),
(97, 'h5d90d61d5ea76', 'img/properties/img5d90d61d61e56mara.living.jpg', 'myimg', 'img', 71, '2019-09-29 16:04:45'),
(98, 'h5d90db9e90113', 'img/properties/img5d90db9e92fe0pondok la buva.jpg', 'myimg', 'img', 72, '2019-09-29 16:28:14'),
(99, 'h5d90df56836ca', 'img/properties/img5d90df5686926d budget.jpg', 'myimg', 'img', 73, '2019-09-29 16:44:06'),
(100, 'h5d90e43c1083e', 'img/properties/img5d90e43c12eadbekisar residence.jpg', 'myimg', 'img', 74, '2019-09-29 17:05:00'),
(101, 'h5d90e69bbe56b', 'img/properties/img5d90e69bc0933boutique residence.jpg', 'myimg', 'img', 75, '2019-09-29 17:15:07'),
(103, 'h5d945fa5b0c33', 'img/properties/img5d945fa5b3ebejarrdin apertement.jpg', 'myimg', 'img', 81, '2019-10-02 08:28:21'),
(104, 'h5d9463bb8888c', 'img/properties/img5d9463bb8ad26apartment gateway pas.jpg', 'myimg', 'img', 82, '2019-10-02 08:45:47'),
(105, 'h5d94aa3ac992e', 'img/properties/img5d94aa3accaf9apartment suite metro.jpg', 'myimg', 'img', 83, '2019-10-02 13:46:34'),
(106, 'h5d94b1568ee5f', 'img/properties/img5d94b15690e20grand afrika asia.jpg', 'myimg', 'img', 84, '2019-10-02 14:16:54'),
(107, 'h5d94c69849d5d', 'img/properties/img5d94c6984c6a4M square b.jpg', 'myimg', 'img', 85, '2019-10-02 15:47:36'),
(108, 'h5d94d68980bcf', 'img/properties/img5d94d689831f5Jl gunung batu no 203 pasteur bandung.jpg', 'myimg', 'img', 86, '2019-10-02 16:55:37'),
(109, 'h5d94d9f9384b8', 'img/properties/img5d94d9f93ac63Hook Apartemen Suites Metro.jpg', 'myimg', 'img', 87, '2019-10-02 17:10:17'),
(110, 'h5d94dca29567a', 'img/properties/img5d94dca298dcbapartment suite metro.jpg', 'myimg', 'img', 83, '2019-10-02 17:21:38'),
(111, 'h5d94deff38c48', 'img/properties/img5d94deff3be52grand afrika asia.jpg', 'myimg', 'img', 84, '2019-10-02 17:31:43'),
(112, 'h5d956e84853a6', 'img/properties/img5d956e8487675The Suites@metro Furnish 2BR.jpg', 'myimg', 'img', 88, '2019-10-03 03:44:04'),
(113, 'h5d9740772b656', 'img/properties/img5d9740772ded9jd umalas.jpg', 'myimg', 'img', 89, '2019-10-04 12:52:07'),
(114, 'h5d9760085bdb4', 'img/properties/img5d9760085e7afcendana.jpg', 'myimg', 'img', 91, '2019-10-04 15:06:48'),
(115, 'h5d9763c0d0247', 'img/properties/img5d9763c0d2715Disewakan villa 2 Bedrooms di Jl. Pantai Cemagi.JPG', 'myimg', 'img', 92, '2019-10-04 15:22:40'),
(116, 'h5d976877f1707', 'img/properties/img5d976877f3e26Villa PRiMe Harian 2 Bedroom di Jimbaran GWK.JPG', 'myimg', 'img', 93, '2019-10-04 15:42:48'),
(117, 'h5d976b7b8bdcb', 'img/properties/img5d976b7b8e97dMaya villa,quiet,big pool and wifi.JPG', 'myimg', 'img', 94, '2019-10-04 15:55:39'),
(119, 'h5d980f4d46d03', 'img/properties/img5d980f4d49a08mazooka villa.JPG', 'myimg', 'img', 96, '2019-10-05 03:34:37'),
(120, 'h5d9814b37d842', 'img/properties/img5d9814b380325Villa Studio Bali.JPG', 'myimg', 'img', 97, '2019-10-05 03:57:39'),
(122, 'h5d982ffd6b2f4', 'img/properties/img5d982ffd6e010Giri Ungasan Villas.JPG', 'myimg', 'img', 98, '2019-10-05 05:54:05'),
(123, 'h5d98398359c32', 'img/properties/img5d9839835c24bArtelier Villa.JPG', 'myimg', 'img', 99, '2019-10-05 06:34:43'),
(124, 'h5d983df578602', 'img/properties/img5d983df57b97eVilla Bunny Seminyak.JPG', 'myimg', 'img', 90, '2019-10-05 06:53:41'),
(125, 'h5d9894ea350f4', 'img/properties/img5d9894ea37ad0VILLA Sewakan di kerobokan kuta utara.JPG', 'myimg', 'img', 100, '2019-10-05 13:04:42'),
(126, 'h5d99e909e4abd', 'img/properties/img5d99e909e7471Villa 2 kamar sewa harian dengan private pool di Seminyak.JPG', 'myimg', 'img', 91, '2019-10-06 13:15:53'),
(127, 'h5d99ecd585ff4', 'img/properties/img5d99ecd58990aVilla Baru 2 Bedrooms di Blongkeker, Puri Gading - Jimbaran.JPG', 'myimg', 'img', 101, '2019-10-06 13:32:05'),
(128, 'h5d9a018317327', 'img/properties/img5d9a018319be3Disewakan villa untuk bulanan&tahunan didaerah jimbaran-nusa dua,bali.JPG', 'myimg', 'img', 102, '2019-10-06 15:00:19'),
(129, 'h5d9a159442d80', 'img/properties/img5d9a1594463advilla di bukit jimbaran.JPG', 'myimg', 'img', 103, '2019-10-06 16:25:56'),
(130, 'h5d9a18f8dd4df', 'img/properties/img5d9a18f8e07a4pulasari 203.JPG', 'myimg', 'img', 104, '2019-10-06 16:40:24'),
(131, 'h5d9a1d74bc720', 'img/properties/img5d9a1d74bf38erevata villa.JPG', 'myimg', 'img', 105, '2019-10-06 16:59:32'),
(132, 'h5d9a2fbcc56cd', 'img/properties/img5d9a2fbcc894cvilla gunung catur.JPG', 'myimg', 'img', 106, '2019-10-06 18:17:32'),
(133, 'h5d9a2fbf7323f', 'img/properties/img5d9a2fbf7591avilla gunung catur.JPG', 'myimg', 'img', 106, '2019-10-06 18:17:35'),
(134, 'h5d9a34d367d45', 'img/properties/img5d9a34d36a6a4alira villa.JPG', 'myimg', 'img', 107, '2019-10-06 18:39:15'),
(135, 'h5d9a372349a6c', 'img/properties/img5d9a37234cb5cvilla lumbung.JPG', 'myimg', 'img', 108, '2019-10-06 18:49:07'),
(143, 'h5da0765e4fad2', 'img/properties/img5da0765e525984473F5FF4C5-FAA2-45DA-ABB9-5A6A2CBEF589.jpeg', 'myimg', 'img', 1, '2019-10-11 12:32:30'),
(144, 'h5da077475e202', 'img/properties/img5da07747602114473F5FF4C5-FAA2-45DA-ABB9-5A6A2CBEF589.jpeg', 'myimg', 'img', 1, '2019-10-11 12:36:23'),
(146, 'h5da2f8a9deab3', 'img/properties/img5da2f8a9e8d20images.jpg', 'myimg', 'img', 112, '2019-10-13 10:12:57'),
(151, 'h5d976ca6d191d', 'img/properties/img5da3d7486a00dimg5d870ff7ee3a9img5d870f0e1f1b2img5d870d0e7e033img5d8052a9805ffproperties-7.jpg', 'myimg', 'img', 1, '2019-10-14 02:02:48'),
(154, 'h5da3e0e5de738', 'img/properties/img5da3e0e5e10eeDFE8855A-A086-46B2-A414-F4238986A3D6.jpeg', 'myimg', 'img', 1, '2019-10-14 02:43:49'),
(156, 'h5d976ca6d191d', 'img/properties/img5da3e8c5a604eimg5d870d75c4ca7img5d8054a68e51bproperties-3 - Copy.jpg', 'myimg', 'img', 1, '2019-10-14 03:17:25'),
(157, 'h5da5cc82cb362', 'img/properties/img5da5cc82ce147WhatsApp Image 2019-10-15 at 20.21.04.jpeg', 'myimg', 'img', 118, '2019-10-15 13:41:22'),
(158, 'h5da5cc82cb362', 'img/properties/img5da5cc82dcd08WhatsApp Image 2019-10-15 at 20.21.06.jpeg', 'myimg', 'img', 118, '2019-10-15 13:41:22'),
(159, 'h5da5cc82cb362', 'img/properties/img5da5cc82e99e2WhatsApp Image 2019-10-15 at 20.21.07.jpeg', 'myimg', 'img', 118, '2019-10-15 13:41:23'),
(164, 'h5d982035aa5f4', 'img/properties/img5da688fde6d75img5d7f6db00b781properties-9.jpg', 'myimg', 'img', 1, '2019-10-16 03:05:33'),
(166, 'h5da8553196f4b', 'img/properties/img5da855323fde3pricing.png', 'myimg', 'img', 1, '2019-10-17 11:49:06'),
(167, 'h5da91e375fb36', 'img/properties/img5da91e37c97acpricing.png', 'myimg', 'img', 1, '2019-10-18 02:06:48'),
(168, 'h5da91fa4b693c', 'img/properties/img5da91fa52ea09logo.png', 'myimg', 'img', 1, '2019-10-18 02:12:53'),
(169, 'h5da91ff615bd4', 'img/properties/img5da91ff680896logo.png', 'myimg', 'img', 1, '2019-10-18 02:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `deskripsi` varchar(900) DEFAULT NULL,
  `title_deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=macroman;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `provinsi`, `img`, `lat`, `lng`, `deskripsi`, `title_deskripsi`) VALUES
(1, 'Bali', '/img/places/bali.jpg', '-8.38395892892606', '115.21348737187498', 'Bali merupakan provinsi dengan destinasi wisata terpopuler didunia, tidak heran banyak tamu domestik maupun mancanegara menghabiskan waktu liburan mereka disini. Selain memiliki alam yang asri dan budaya yang kental, kini bali sudah bertransformasi menjadi daerah wisata yang modern dengan dibangunnya banyak hunian serta tempat wisata.', 'Liburan di bali?'),
(2, 'Yogyakarta', '/img/places/yogyakarta.jpg', '-7.947479354520205', '110.5203276035171', NULL, NULL),
(3, 'Jakarta', '/img/places/jakarta.jpg', '-6.220142843668919', '106.85346222489886', NULL, NULL),
(4, 'Bandung', '/img/places/bandung.jpg', '-6.957171406607578', '107.62393212884479', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(50) NOT NULL,
  `id_property` varchar(50) NOT NULL,
  `durasi` enum('hari','bulan','tahun','minggu') NOT NULL,
  `harga` varchar(50) NOT NULL,
  `diupdate_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_property`, `durasi`, `harga`, `diupdate_pada`) VALUES
('s5d8a2ae6cafd5', 'h5d8a2ae6c9dd5', 'bulan', 'Rp. 1.800.000', '2019-09-24 14:40:38'),
('s5d8a349433d53', 'h5d8a3494332d4', 'hari', 'Rp. 250.000', '2019-09-24 15:21:56'),
('s5d8a349434c36', 'h5d8a3494332d4', 'bulan', 'Rp. 2.000.000', '2019-09-24 15:21:56'),
('s5d8b02cb568ce', 'h5d8b02cb55991', 'bulan', 'Rp. 2.000.000', '2019-09-25 06:01:47'),
('s5d8b08e0598ae', 'h5d8b08e05864a', 'hari', 'Rp. 300.000', '2019-09-25 06:27:44'),
('s5d8b08e05a902', 'h5d8b08e05864a', 'bulan', 'Rp. 1.900.000', '2019-09-25 06:27:44'),
('s5d8b0c7f13e94', 'h5d8b0c7f12e70', 'hari', 'Rp. 200.000', '2019-09-25 06:43:11'),
('s5d8b0c7f1505f', 'h5d8b0c7f12e70', 'bulan', 'Rp. 2.300.000', '2019-09-25 06:43:11'),
('s5d8b1c890196e', 'h5d8b1c8900a1e', 'hari', 'Rp. 150.000', '2019-09-25 07:51:37'),
('s5d8b1c8902964', 'h5d8b1c8900a1e', 'bulan', 'Rp. 2.300.000', '2019-09-25 07:51:37'),
('s5d8b22e47f742', 'h5d8b22e47e817', 'hari', 'Rp. 150.000', '2019-09-25 08:18:44'),
('s5d8b22e4800b4', 'h5d8b22e47e817', 'bulan', 'Rp. 2.000.000', '2019-09-25 08:18:44'),
('s5d8b30e0979e2', 'h5d8b30e096a50', 'bulan', 'Rp. 3.000.000', '2019-09-25 09:18:24'),
('s5d8b35dd7a045', 'h5d8b35dd78fbc', 'hari', 'Rp. 185.000', '2019-09-25 09:39:41'),
('s5d8b35dd7ab76', 'h5d8b35dd78fbc', 'bulan', 'Rp. 1.600.000', '2019-09-25 09:39:41'),
('s5d8b3d6c51c97', 'h5d8b3d6c50e2f', 'bulan', 'Rp. 700.000', '2019-09-25 10:11:56'),
('s5d8cc2a2a15c0', 'h5d8cc2a2a06d4', 'hari', 'Rp. 150.000', '2019-09-26 13:52:34'),
('s5d8cc2a2a1f47', 'h5d8cc2a2a06d4', 'bulan', 'Rp. 1.800.000', '2019-09-26 13:52:34'),
('s5d8cc87c95b00', 'h5d8cc87c94d12', 'bulan', 'Rp. 1.400.000', '2019-09-26 14:17:32'),
('s5d8ccb00cfa02', 'h5d8ccb00cec3a', 'hari', 'Rp. 125.000', '2019-09-26 14:28:16'),
('s5d8ccb00d03bf', 'h5d8ccb00cec3a', 'tahun', 'Rp. 21.000.000', '2019-09-26 14:28:16'),
('s5d8ccb00d0c30', 'h5d8ccb00cec3a', 'bulan', 'Rp. 1.800.000', '2019-09-26 14:28:16'),
('s5d8d60ca9c6a1', 'h5d8d60ca9b993', 'hari', 'Rp. 250.000', '2019-09-27 01:07:22'),
('s5d8d60ca9d078', 'h5d8d60ca9b993', 'bulan', 'Rp. 2.500.000', '2019-09-27 01:07:22'),
('s5d8d641b7884e', 'h5d8d641b77c61', 'hari', 'Rp. 250.000', '2019-09-27 01:21:31'),
('s5d8d641b79210', 'h5d8d641b77c61', 'bulan', 'Rp. 2.500.000', '2019-09-27 01:21:31'),
('s5d8d811b30b9b', 'h5d8d811b2fddd', 'bulan', 'Rp. 1.700.000', '2019-09-27 03:25:15'),
('s5d8dc367264cc', 'h5d8dc36725764', 'hari', 'Rp. 350.000', '2019-09-27 08:08:07'),
('s5d8dc36726e7c', 'h5d8dc36725764', 'bulan', 'Rp. 3.000.000', '2019-09-27 08:08:07'),
('s5d8dc78368c34', 'h5d8dc78367d65', 'hari', 'Rp. 350.000', '2019-09-27 08:25:39'),
('s5d8dc78369c3d', 'h5d8dc78367d65', 'bulan', 'Rp. 3.500.000', '2019-09-27 08:25:39'),
('s5d8e1b5a368d1', 'h5d8e1b5a35c71', 'hari', 'Rp. 150.000', '2019-09-27 14:23:22'),
('s5d8e1c04a725a', 'h5d8e1c04a63e4', 'bulan', 'Rp. 200.000', '2019-09-27 14:26:12'),
('s5d8e217212c02', 'h5d8e21721211a', 'hari', 'Rp. 150.000', '2019-09-27 14:49:22'),
('s5d8e217213ac0', 'h5d8e21721211a', 'bulan', 'Rp. 1.300.000', '2019-09-27 14:49:22'),
('s5d8e23e620a9c', 'h5d8e23e61fce8', 'hari', 'Rp. 210.000', '2019-09-27 14:59:50'),
('s5d8e23e6218d9', 'h5d8e23e61fce8', 'bulan', 'Rp. 3.500.000', '2019-09-27 14:59:50'),
('s5d8e260ec18c9', 'h5d8e260ec0957', 'hari', 'Rp. 100.000', '2019-09-27 15:09:02'),
('s5d8e260ec27ed', 'h5d8e260ec0957', 'bulan', 'Rp. 1.200.000', '2019-09-27 15:09:02'),
('s5d8e2980d24c7', 'h5d8e2980d19a3', 'hari', 'Rp. 150.000', '2019-09-27 15:23:44'),
('s5d8e2980d2ef3', 'h5d8e2980d19a3', 'bulan', 'Rp. 1.800.000', '2019-09-27 15:23:44'),
('s5d8e2bf554f33', 'h5d8e2bf554183', 'bulan', 'Rp. 1.900.000', '2019-09-27 15:34:13'),
('s5d8f65d2d0a78', 'h5d8f65d2cf7ab', 'hari', 'Rp. 250.000', '2019-09-28 13:53:22'),
('s5d8f65d2d1525', 'h5d8f65d2cf7ab', 'bulan', 'Rp. 2.500.000', '2019-09-28 13:53:22'),
('s5d8f6a6a7aa22', 'h5d8f6a6a79f02', 'bulan', 'Rp. 2.500.000', '2019-09-28 14:12:58'),
('s5d8f6d1a169db', 'h5d8f6d1a15d1f', 'bulan', 'Rp. 1.500.000', '2019-09-28 14:24:26'),
('s5d8f7090af28f', 'h5d8f7090ae78f', 'bulan', 'Rp. 2.300.000', '2019-09-28 14:39:12'),
('s5d8f73330fe23', 'h5d8f73330f396', 'hari', 'Rp. 250.000', '2019-09-28 14:50:27'),
('s5d8f733310a76', 'h5d8f73330f396', 'tahun', 'Rp. 36.000.000', '2019-09-28 14:50:27'),
('s5d8f733311350', 'h5d8f73330f396', 'bulan', 'Rp. 4.500.000', '2019-09-28 14:50:27'),
('s5d9054a618c18', 'h5d9054a6180fe', 'hari', 'Rp. 175.000', '2019-09-29 06:52:22'),
('s5d9054a619558', 'h5d9054a6180fe', 'bulan', 'Rp. 3.000.000', '2019-09-29 06:52:22'),
('s5d9061f76d89f', 'h5d9061f76cc9b', 'bulan', 'Rp. 1.500.000', '2019-09-29 07:49:11'),
('s5d906552330ed', 'h5d90655232237', 'bulan', 'Rp. 3.500.000', '2019-09-29 08:03:30'),
('s5d9068732a811', 'h5d90687329cab', 'bulan', 'Rp. 1.800.000', '2019-09-29 08:16:51'),
('s5d906b31933df', 'h5d906b319284b', 'hari', 'Rp. 175.000', '2019-09-29 08:28:33'),
('s5d906b319417c', 'h5d906b319284b', 'tahun', 'Rp. 33.000.000', '2019-09-29 08:28:33'),
('s5d906b3194ee0', 'h5d906b319284b', 'bulan', 'Rp. 3.000.000', '2019-09-29 08:28:33'),
('s5d90710f31c1e', 'h5d90710f311aa', 'hari', 'Rp. 375.000', '2019-09-29 08:53:35'),
('s5d90710f3262f', 'h5d90710f311aa', 'bulan', 'Rp. 5.500.000', '2019-09-29 08:53:35'),
('s5d907481e13ce', 'h5d907481e0851', 'bulan', 'Rp. 2.000.000', '2019-09-29 09:08:17'),
('s5d90767ac841f', 'h5d90767ac7744', 'hari', 'Rp. 185.000', '2019-09-29 09:16:42'),
('s5d90767ac8ded', 'h5d90767ac7744', 'bulan', 'Rp. 3.700.000', '2019-09-29 09:16:42'),
('s5d907a147c9a9', 'h5d907a147ba65', 'hari', 'Rp. 250.000', '2019-09-29 09:32:04'),
('s5d907a147d314', 'h5d907a147ba65', 'tahun', 'Rp. 30.000.000', '2019-09-29 09:32:04'),
('s5d907a147db84', 'h5d907a147ba65', 'bulan', 'Rp. 3.500.000', '2019-09-29 09:32:04'),
('s5d907f3debd13', 'h5d907f3deb1a3', 'bulan', 'Rp. 2.500.000', '2019-09-29 09:54:05'),
('s5d90815b420eb', 'h5d90815b4162e', 'hari', 'Rp. 200.000', '2019-09-29 10:03:07'),
('s5d90815b42a03', 'h5d90815b4162e', 'bulan', 'Rp. 2.000.000', '2019-09-29 10:03:07'),
('s5d90d61d5fa72', 'h5d90d61d5ea76', 'hari', 'Rp. 250.000', '2019-09-29 16:04:45'),
('s5d90d61d604e4', 'h5d90d61d5ea76', 'bulan', 'Rp. 2.200.000', '2019-09-29 16:04:45'),
('s5d90db9e90b61', 'h5d90db9e90113', 'hari', 'Rp. 200.000', '2019-09-29 16:28:14'),
('s5d90db9e9144f', 'h5d90db9e90113', 'bulan', 'Rp. 2.000.000', '2019-09-29 16:28:14'),
('s5d90df568449a', 'h5d90df56836ca', 'hari', 'Rp. 250.000', '2019-09-29 16:44:06'),
('s5d90df5685459', 'h5d90df56836ca', 'bulan', 'Rp. 2.300.000', '2019-09-29 16:44:06'),
('s5d90e43c114ce', 'h5d90e43c1083e', 'bulan', 'Rp. 1.650.000', '2019-09-29 17:05:00'),
('s5d90e69bbf19e', 'h5d90e69bbe56b', 'bulan', 'Rp. 3.500.000', '2019-09-29 17:15:07'),
('s5d945fa5b1d1f', 'h5d945fa5b0c33', 'bulan', 'Rp. 3.000.000', '2019-10-02 08:28:21'),
('s5d9463bb89697', 'h5d9463bb8888c', 'bulan', 'Rp. 2.800.000', '2019-10-02 08:45:47'),
('s5d94aa3aca8fe', 'h5d94aa3ac992e', 'tahun', 'Rp. 33.000.000', '2019-10-02 13:46:34'),
('s5d94aa3acb221', 'h5d94aa3ac992e', 'bulan', 'Rp. 2.600.000', '2019-10-02 13:46:34'),
('s5d94b1568fa76', 'h5d94b1568ee5f', 'bulan', 'Rp. 2.300.000', '2019-10-02 14:16:54'),
('s5d94c6984a827', 'h5d94c69849d5d', 'bulan', 'Rp. 3.000.000', '2019-10-02 15:47:36'),
('s5d94d6898190e', 'h5d94d68980bcf', 'bulan', 'Rp. 4.000.000', '2019-10-02 16:55:37'),
('s5d94d9f9392f9', 'h5d94d9f9384b8', 'bulan', 'Rp. 3.150.000', '2019-10-02 17:10:17'),
('s5d94dca296219', 'h5d94dca29567a', 'tahun', 'Rp. 33.000.000', '2019-10-02 17:21:38'),
('s5d94dca296b2f', 'h5d94dca29567a', 'bulan', 'Rp. 2.600.000', '2019-10-02 17:21:38'),
('s5d94deff3a064', 'h5d94deff38c48', 'bulan', 'Rp. 2.300.000', '2019-10-02 17:31:43'),
('s5d956e8486150', 'h5d956e84853a6', 'bulan', 'Rp. 2.700.000', '2019-10-03 03:44:04'),
('s5d9740772c66b', 'h5d9740772b656', 'hari', 'Rp. 1.500.000', '2019-10-04 12:52:07'),
('s5d9760085ca3f', 'h5d9760085bdb4', 'hari', 'Rp. 4.000.000', '2019-10-04 15:06:48'),
('s5d9763c0d0de1', 'h5d9763c0d0247', 'tahun', 'Rp. 135.000.000', '2019-10-04 15:22:40'),
('s5d976877f21a3', 'h5d976877f1707', 'hari', 'Rp. 1.300.000', '2019-10-04 15:42:47'),
('s5d976b7b8c937', 'h5d976b7b8bdcb', 'hari', 'Rp. 2.000.000', '2019-10-04 15:55:39'),
('s5d976b7b8d255', 'h5d976b7b8bdcb', 'tahun', 'Rp. 25.000.000', '2019-10-04 15:55:39'),
('s5d980f4d480dc', 'h5d980f4d46d03', 'hari', 'Rp. 750.000', '2019-10-05 03:34:37'),
('s5d9814b37e4bc', 'h5d9814b37d842', 'hari', 'Rp. 1.000.000', '2019-10-05 03:57:39'),
('s5d982035ab199', 'h5d982035aa5f4', 'bulan', 'Rp. 600.000', '2019-10-05 04:46:45'),
('s5d982ffd6c43f', 'h5d982ffd6b2f4', 'hari', 'Rp. 1.000.000', '2019-10-05 05:54:05'),
('s5d9839835a772', 'h5d98398359c32', 'hari', 'Rp. 1.300.000', '2019-10-05 06:34:43'),
('s5d983df57979a', 'h5d983df578602', 'hari', 'Rp. 1.700.000', '2019-10-05 06:53:41'),
('s5d9894ea35c38', 'h5d9894ea350f4', 'hari', 'Rp. 2.200.000', '2019-10-05 13:04:42'),
('s5d99e909e5706', 'h5d99e909e4abd', 'hari', 'Rp. 1.750.000', '2019-10-06 13:15:53'),
('s5d99ecd5874db', 'h5d99ecd585ff4', 'bulan', 'Rp. 12.000.000', '2019-10-06 13:32:05'),
('s5d9a01831800e', 'h5d9a018317327', 'bulan', 'Rp. 15.000.000', '2019-10-06 15:00:19'),
('s5d9a1594438f8', 'h5d9a159442d80', 'hari', 'Rp. 1.800.000', '2019-10-06 16:25:56'),
('s5d9a15944422a', 'h5d9a159442d80', 'tahun', 'Rp. 250.000.000', '2019-10-06 16:25:56'),
('s5d9a159444ace', 'h5d9a159442d80', 'bulan', 'Rp. 25.000.000', '2019-10-06 16:25:56'),
('s5d9a18f8de5fe', 'h5d9a18f8dd4df', 'bulan', 'Rp. 25.000.000', '2019-10-06 16:40:24'),
('s5d9a1d74bd6f4', 'h5d9a1d74bc720', 'hari', 'Rp. 2.000.000', '2019-10-06 16:59:32'),
('s5d9a2fbcc6bd3', 'h5d9a2fbcc56cd', 'hari', 'Rp. 2.000.000', '2019-10-06 18:17:32'),
('s5d9a2fbf73d16', 'h5d9a2fbf7323f', 'hari', 'Rp. 2.000.000', '2019-10-06 18:17:35'),
('s5d9a34d368975', 'h5d9a34d367d45', 'hari', 'Rp. 6.750.000', '2019-10-06 18:39:15'),
('s5d9a37234a993', 'h5d9a372349a6c', 'bulan', 'Rp. 25.000.000', '2019-10-06 18:49:07'),
('s5da0765e508ae', 'h5da0765e4fad2', 'tahun', 'Rp. 1', '2019-10-11 12:32:30'),
('s5da077475f151', 'h5da077475e202', 'bulan', 'Rp. 11', '2019-10-11 12:36:23'),
('s5da2f8a9dfad0', 'h5da2f8a9deab3', 'tahun', 'Rp. 200.000', '2019-10-13 10:12:57'),
('s5da2f8a9e03c3', 'h5da2f8a9deab3', 'bulan', 'Rp. 500.000', '2019-10-13 10:12:57'),
('s5da3e0e5dfcc8', 'h5da3e0e5de738', 'bulan', 'Rp. 2.000.000', '2019-10-14 02:43:49'),
('s5da5cc82ccb92', 'h5da5cc82cb362', 'bulan', 'Rp. 1.700.000', '2019-10-15 13:41:22'),
('s5da85531a4d1b', 'h5da8553196f4b', 'bulan', 'Rp. 1.111', '2019-10-17 11:49:05'),
('s5da91e37809a1', 'h5da91e375fb36', 'tahun', 'Rp. 2.000.000', '2019-10-18 02:06:47'),
('s5da91fa4d1ef9', 'h5da91fa4b693c', 'bulan', 'Rp. 90.000.000', '2019-10-18 02:12:52'),
('s5da91ff63267b', 'h5da91ff615bd4', 'bulan', 'Rp. 131.213.121', '2019-10-18 02:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `desc` text,
  `provinsi` int(11) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id`, `nama`, `latitude`, `longitude`, `img`, `desc`, `provinsi`, `tag`, `alamat`) VALUES
(1, 'PNB', '-8.798932789209404', '115.16166433044123', 'img/icon_tempat/pnb.png', NULL, 1, 'kampus', 'Jl. Raya Kampus Unud No.2, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia'),
(2, 'STIKOM', '-8.673118330386906', '115.22668920464628', 'img/icon_tempat/stikom.png', NULL, 1, 'kampus', 'Jl. Raya Puputan No.86, Dangin Puri Klod, Kec. Denpasar Tim., Kota Denpasar, Bali 80234, Indonesia'),
(5, 'UNUD', '-8.798297653729387', '115.17237983651273', 'img/icon_tempat/unud.png', NULL, 1, 'kampus', 'Jalan Raya Kampus Unud Blok R No. 88, Jimbaran, Kuta Selatan, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia'),
(6, 'Kuta', '-8.724262067328883', '115.17502020756842', 'img/icon_tempat/kuta.jpg', NULL, 1, 'rated', 'Jl. Buni Sari No.10, Kuta, Kabupaten Badung, Bali 80361, Indonesia'),
(7, 'Karangasem', '-8.383403244260883', '115.61272919999999', '', NULL, 1, 'kabupaten', 'Amlapura'),
(8, 'Denpasar', '-8.670458199999999', '115.2126293', NULL, NULL, 1, 'kabupaten', 'Jl. Runtu, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80113, Indonesia'),
(9, 'Badung', '-8.802534779735632', '115.16749621484382', NULL, NULL, 1, 'kabupaten', 'Mangupura'),
(10, 'Klungkung', '-8.802534779735632', '115.16749621484382', NULL, NULL, 1, 'kabupaten', 'Semarapura'),
(11, 'Buleleng', '-8.1149145', '115.0916254', NULL, NULL, 1, 'kabupaten', 'Singaraja'),
(12, 'Tabanan', '-8.5375566', '115.12469179999994', NULL, NULL, 1, 'kabupaten', 'Tabanan'),
(13, 'Gianyar', '-8.5367146', '115.33144119999997', NULL, NULL, 1, 'kabupaten', 'Gianyar'),
(14, 'Jembrana', '-8.3544626', '114.61632069999996', NULL, NULL, NULL, 'kabupaten', 'Negara'),
(15, 'Bangli', '-8.454303', '115.35489699999994', NULL, NULL, NULL, 'kabupaten', 'Bangli');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) DEFAULT NULL,
  `jumlah_transaksi` varchar(50) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `tanggal_transaksi` varchar(50) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipeakun` enum('customer','vendor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `img`, `alamat`, `tipeakun`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`, `paket`) VALUES
(1, 'Wiranatha', 'w@a.com', 'img/avatar/avatar4.png', 'denpasar barat 111111111111111111111', 'vendor', '$2y$10$PGHcs96NFyerNXBJ8xrBEOzxCFhlD3hXojQ2DvrTudYjENkKhCBlq', '08911213121', 'JhQjqHI3I3pSPOtrKDHh0b1tQeGGqsiTwUvPczGpj2cz2aONp8R05MoeU3rw', '2019-09-04 23:22:58', '2019-09-04 23:22:58', '2A'),
(2, 'yuda', 'z@a.com', NULL, NULL, 'customer', NULL, '0898989869', NULL, NULL, NULL, '0A'),
(3, 'saz', 'a@a', NULL, NULL, 'customer', NULL, '21', NULL, NULL, NULL, '0A'),
(4, 'wayan', 'wirnat@a.com', NULL, NULL, 'customer', NULL, '089313121313', NULL, NULL, NULL, '0A'),
(5, 'yodi', 'yodifadhil22@gmail.com', NULL, NULL, 'customer', NULL, '3737373', NULL, NULL, NULL, '0A'),
(6, 'yodi', 'aku@gmail.com', NULL, 'asdajdkajdkajak', 'vendor', '$2y$10$.OrviYam6CSg8uLP7IQogejyh0TF.8OtoArmFu5zcjcU4xc30pHpm', NULL, NULL, '2019-09-22 21:02:50', '2019-09-22 21:02:50', '0A'),
(7, 'wiranatha', 'wirajus@gmail.com', NULL, NULL, 'customer', NULL, '0895386898095', NULL, NULL, NULL, '0A'),
(8, 'waira', 'a@a.com', NULL, NULL, 'customer', NULL, '11313', NULL, NULL, NULL, '0A'),
(9, 'aku', 'agus@gmail.com', NULL, 'asdasdasdas', 'vendor', '$2y$10$LtkAftpdBq0C7.lxHwtoGe8R4nO411Xi6w4yHr0KAqdH3sAs9O.wO', NULL, NULL, '2019-09-23 07:56:38', '2019-09-23 07:56:38', '0A'),
(10, 'yuda', 'yudh@a.com', NULL, 'PadangSambian', 'vendor', '$2y$10$BdVCRFrrUOGi.UrAtOucCuFH.RPYTOafw6y4PHNsK/P7xMhQ6Fj7u', NULL, 'dpGXQTNsWiTdLdhFy5KWP42mSVpC49qGRBNLlQrIEaQK6AMtPi2uMomEdFVh', '2019-09-23 09:54:16', '2019-09-23 09:54:16', '0A'),
(11, 'vendor', 'vendor@a.com', NULL, 'Jl. Kenyeri 2', 'vendor', '$2y$10$s.7RzLZXZDOicGvMtAuVLeZ85Yx5SkRph45Tr/r5mepx/Hd8CHq/a', NULL, 'PeDQGY1YBpfBRHWuGT4RTKkXEHoHmcBKu4WUxWxmQOl1eylGi2BNKLJd0yz1', '2019-09-23 10:00:22', '2019-09-23 10:00:22', '0A'),
(12, 'Tester', 'test@a.com', 'img/avatar/avatar2.png', 'Jl. kenyeri 3 denpasar', 'vendor', '$2y$10$avBSDtKGHtw3bfK2w47BpeUUYoHgT63OwbO9H3KJ3C6PjaH5bPrB.', NULL, 'gYR4HB4RNwtjbtexNiiTEkl73psH4oVXJbeL7y4CwG8Z9UVeYyJ9xaXiGSuP', '2019-09-23 10:05:12', '2019-09-23 10:05:12', '0A'),
(13, 'skuyla', 'xx@xx.com', 'img/avatar/avatar4.png', 'skuylaskuylaskuylaskuyla', 'vendor', '$2y$10$8ACkoaR8Rd0s8v6TM37LA.TA2Nz3dyT.6ONwerVV0/vOg/NR3U0Am', NULL, NULL, '2019-09-23 10:09:13', '2019-09-23 10:09:13', '0A'),
(14, 'wirnat', 'wir@gmail.com', 'img/avatar/avatar3.png', 'Jl. Kenyeri 9 denpasar', 'vendor', '$2y$10$t3I76HiTjWEbY9wVrmbS9OQn.ygbUROba/GvCAUAZZvcS/1d56Qcm', NULL, 'vGxQ6Yocx6KDE4ruBvwTeupo4eDDUxyDCLlV9tCvErOH5W0GYhkpao6mw2DO', '2019-09-23 10:11:36', '2019-09-23 10:11:36', '0A'),
(15, 'Yodi', 'toto@gmail.com', NULL, NULL, 'customer', NULL, '08111112222', NULL, NULL, NULL, '0A'),
(16, 'yodi', 'najla@gmail.com', 'img/avatar/avatar4.png', 'asdasdasda', 'vendor', '$2y$10$E84OFlKY4df/HbV4yNpnzOAA1bu6o0mrkeoWB6pRYj.0pKewoj6R2', NULL, 'TIbM2gVhAiwHGrXOynN3W7voJJJpkoIxyLyhc38BEuGCxVgdg1m080ysAGlW', '2019-09-23 16:17:49', '2019-09-23 16:17:49', '0A'),
(17, 'wirwir', 'ciwir@gmail.com', NULL, NULL, 'customer', NULL, '37373737', NULL, NULL, NULL, '0A'),
(18, 'a', 'wz@a.com', NULL, NULL, 'customer', NULL, '089641833131', NULL, NULL, NULL, '0A'),
(19, 'Yudagantengpojjbfd', 'putuyudapradnyana@gmail.com', 'img/avatar/avatar2.png', 'XhkgxgzmgsmgxmgzmgzmgzmgzkfzgNfznfzgNgskfslhzjf', 'vendor', '$2y$10$Tc7Ql5GXKbSfjq93asvhBuUSw/JEvEopRkBjwRcLJvUMV7PhS04pW', NULL, NULL, '2019-09-24 01:11:29', '2019-09-24 01:11:29', '0A'),
(20, 'Gus ade', 'gusade01@gmail.com', 'img/avatar/avatar2.png', 'Denpasar Barat', 'vendor', '$2y$10$HD6.JsQ/OOmH.k0Ar2cA4u7.dBj8QPhyJqwR.C8gbzEA9bKFo0zjS', NULL, 'ZpC4GW5tcNOzamBMjXFXwe1DKAswsMENpCkq1EC0pMws2XaQFf5vrwm9L8jS', '2019-09-24 07:28:18', '2019-09-24 07:28:18', '0A'),
(21, 'Agus', 'agusarianto22@yahoo.co.id', NULL, NULL, 'customer', NULL, '081239881032', NULL, NULL, NULL, '0A'),
(22, 'Suarmini', 'suarmini0101@gmail.com', 'img/avatar/avatar3.png', 'Denpasar Timur', 'vendor', '$2y$10$1bf9/STxw3TM2xpeB3YqaeG6UFtQqeEztVBjuQ15.hDjC/CjU5YZi', NULL, '6Ybsu5cBLRv0ryCPnbzJUwR9Jf78yGPFVDPRHgB4WNuWkuWJ8UxjAn2LuSDn', '2019-09-24 08:00:32', '2019-09-24 08:00:32', '0A'),
(23, 'Pinang Mas Bali', 'pinangmasbali24@gmail.com', 'img/avatar/avatar2.png', 'jl pulau pinang,dauh puri kauh kec denpasar barat ,', 'vendor', '$2y$10$I4mZF3.Q7B2oLnCbmZlw9eDkQIeZ1NN5e4XQ9iOhrkvQ9MtPg8rFq', NULL, 'E9JQi0tmKkBNngh9rqyFREnWQVGUKLNdCfYALHYzEtq4xT2axv9u79r1xkZB', '2019-09-24 08:14:03', '2019-09-24 08:14:03', '0A'),
(24, 'cepi', 'cepi@gmail.com', 'img/avatar/avatar2.png', 'sdfsdfsdfsdf', 'vendor', '$2y$10$9mJW5tmjgPJv2QnXGbS5sug7y5NpsedRSErkWh4XUhc.iNlu3URVS', NULL, '7TTaFpxIHAXGIzYZZqMRcEBeTDjY777BWtD1rtJWMEH04aReqTT6b9yHAHpN', '2019-09-24 19:28:50', '2019-09-24 19:28:50', '0A'),
(25, 'cinta', 'cinta@gmail.com', 'img/avatar/avatar4.png', 'cajdaksjdkasd', 'vendor', '$2y$10$s/smAk3i9PAajB57If14w.Ob5.e51K.CzKpPlhbhYXDQkWFf22v2e', NULL, NULL, '2019-09-24 19:48:48', '2019-09-24 19:48:48', '0A'),
(28, 'juliawan komang', 'juliawan272@yahoo.com', 'img/avatar/avatar2.png', 'Jl. Rama, Sesetan, Denpasar Selatan', 'vendor', '$2y$10$WkUEMPR4T/1FpQSsCRCir.H4t63ozjxvwr4/4mRUnb42aMykRUrl2', NULL, 'HkTQiyVrrRTj5wR4SLnH45Kps0SGQecDIwCvyPkM97X4b622i9QV2wyILmpE', '2019-09-24 22:40:19', '2019-09-24 22:40:19', '0A'),
(29, 'bapak sugiarta', 'uniquehouse71@gmail.com', 'img/avatar/avatar3.png', 'Jl. Bakung, Gg. Bakung Sari No. A27, Kesiman, Denpasar Timur', 'vendor', '$2y$10$MhyGdaytvSlN4B0qQGtPRuA.1hkMMHNxtJGr0bVZ56npI5sYkJy2O', NULL, 'YbnDAqLR1Wdt5O7jyCwy45oDmqdgAujb3akTqBb0ATkFe2CaZMO12uxCqQSg', '2019-09-24 23:13:09', '2019-09-24 23:13:09', '0A'),
(30, 'indra', 'marketing@pinangmasbali.com', 'img/avatar/avatar3.png', 'Jl. Pulau Pinang No.3 Teuku Umar Denpasar', 'vendor', '$2y$10$9yOjkU8q/PkuR3oDMxYqm.IMofXJ9kBJRM/Z63HSKCtEZt31Ylbca', NULL, 'ArInoHE5lueDTg1WayD5kompU8nSRzh8voJgGhNoclCRyCfgzDRMzSInNQ5Z', '2019-09-24 23:32:31', '2019-09-24 23:32:31', '0A'),
(31, 'bu ester', 'ester@gmail.com', 'img/avatar/avatar2.png', 'Jln. Kebo Iwa Selatan, Gg. Kelapa Gading No. 8, Padang Sambian, Denpasar Barat', 'vendor', '$2y$10$52zscfb.kUFIQAgNyW4MbunLNy9VRXDi6vBVl63RR3xims.SgBzka', NULL, 'SJmjZMIuSzFq4RJRGW0HytxAleZgwLP4wUAip3eJNGeuOzIaoz7BneuKKi78', '2019-09-25 00:44:11', '2019-09-25 00:44:11', '0A'),
(32, 'arnawa', 'arnawa@gmail.com', 'img/avatar/avatar2.png', 'Jl. Gunung Guntur, Gg. Korawa No. 6 Padang Sambian, Denpasar Barat', 'vendor', '$2y$10$UabKtxRohufa80tYYy/GWOnxsB4YJ7w0.EF2XHuVYyggjgJG4ghYm', NULL, 'oyLqkiwjNf2dT2wgPfkkmJg8PE58AfxdDkGnyke7EB8evtzvoJ0afnPiBm88', '2019-09-25 01:09:01', '2019-09-25 01:09:01', '0A'),
(33, 'Speranza Residence', 'ramalianti@gmail.com', 'img/avatar/avatar3.png', 'Jl. Mahendradatta Selatan 1 No. 32, Pemecutan Klod, Denpasar Barat', 'vendor', '$2y$10$/9Kp88vPfFK2fyLK2ojSGOAOnk4SR9SSwSaDUuKnoyZvu6h4D5TiO', NULL, 'EYnDmnoBNDLLQaK34hOqCzCsroY1AgmwEatClFa35XV456F8MB1o4uzhMG69', '2019-09-25 01:32:35', '2019-09-25 01:32:35', '0A'),
(34, 'Homy Residence', 'fo.homyresidence@gmail.com', 'img/avatar/avatar2.png', 'Jl. Pura Demak I, Gg. IA/9, Denpasar Barat, Bali', 'vendor', '$2y$10$kKIvjaRnMwxmoKIyJIxOkeNYeYH.FKbrUa5usegGr08YjJml7yNx.', NULL, 'jzcKmGiYfQW4nd6XZrjQp0OyC8cVR38LTz1twfJA1EvInFtFQB3lg0I4CY6C', '2019-09-25 02:27:19', '2019-09-25 02:27:19', '0A'),
(35, 'Raka Semara', 'rakasemara@gmail.com', 'img/avatar/avatar2.png', 'Jl. Gn. Karang III, Gg.Jenggala, Pemecutan Klod, Denpasar Barat, Kota Denpasar, Bali', 'vendor', '$2y$10$/dCOdYvILf4vrsWTweFqROo5rgSrVA4dUh.LgZ6MPJCrMbxZpwl9S', NULL, 'Is0WYq7g6EpqRKuSsosQQk10zWkDG6NdkoQG3iaX3BJR9ZeDRGtzbcfiftvp', '2019-09-25 03:04:55', '2019-09-25 03:04:55', '0A'),
(36, 'yodi', 'AA@gmail.com', NULL, NULL, 'customer', NULL, '081312225130', NULL, NULL, NULL, '0A'),
(37, 'Minto Hadi Priyoko', 'ondol08@gmail.com', 'img/avatar/avatar2.png', 'Jl. Padang Gajah Gg. Pdg Kluma, Padangsambian, Denpasar Barat, Kota Denpasar', 'vendor', '$2y$10$GUB96SZQ4Qy4RlXX9MBJcuA2z6Bta8fXM2R4c/1eS5cBOdR6LtUOG', NULL, 'SIUH4EeJ1iIyxWxVBXs04Ztj4lqbZFdKKAWJJ74pCPlxRkZt5I4UrriO5Obo', '2019-09-26 06:26:32', '2019-09-26 06:26:32', '0A'),
(38, 'Hadi Wirawan', 'hadinugrahabali@gmail.com', 'img/avatar/avatar2.png', 'Jl. Pura Demak II No.23, Pemecutan Klod, Denpasar Barat, Kota Denpasar, Bali', 'vendor', '$2y$10$IcyojLwXbcxjfmYShrDLJ.qpzfsPqNqrkCm3yvYsFKOwvzEhUOA16', NULL, 'oWk6rAFHRq0E90jKWiy2hj7Bcyjdl9DghGqE1nJNnh4vIgxnJre8FeDi8JCt', '2019-09-26 07:08:08', '2019-09-26 07:08:08', '0A'),
(39, 'Meli', 'meli@gmail.com', 'img/avatar/avatar3.png', 'Jl. Tegal Dukuh 1 No. 3, Padang Sambian Kaja, Denpasar Barat', 'vendor', '$2y$10$Mvk4yE0nL10J5EfPKZk8cO2aV2szwFY/scteLWE.nle6MqXKLf1sq', NULL, NULL, '2019-09-26 07:20:32', '2019-09-26 07:20:32', '0A'),
(40, 'Evelyn', 'evelyn021@gmail.com', 'img/avatar/avatar3.png', 'jl cihampelas no 61\r\nbandung', 'vendor', '$2y$10$SXmDEz.Q2Dbnj4s9sf805eWe5bluYNezE77bZ3PmS8ufGSBW1iTLC', NULL, 'eGsfCfHyughoydGfedSRwTdRaqcpwKyIXHV00aRC2Zg22dsuHeeMDY5klUjU', '2019-09-26 07:42:33', '2019-09-26 07:42:33', '0A'),
(41, 'Evelyn', 'evelyn022@gmail.com', 'img/avatar/avatar2.png', 'Jln Pasteur 165, bandung', 'vendor', '$2y$10$zX9m26iE1kEwauizzTwKNOwcuPbLNaKlYAB8CBJwib2IuPzFmqQse', NULL, 'H8s0BDERUArvmU7wF5UnSSI6y3BlY9MfvMnygfyHOJRz0rjt48xCUUqDtQD7', '2019-09-26 08:06:33', '2019-09-26 08:06:33', '0A'),
(42, 'wira', 'wa@a.com', NULL, NULL, 'customer', NULL, '089213121313', NULL, NULL, NULL, '0A'),
(43, 'agus', 'agusariant63@gmail.com', NULL, NULL, 'customer', NULL, '081239881032', NULL, NULL, NULL, '0A'),
(44, 'Evelyn', 'evelyn020@gmail.com', 'img/avatar/avatar2.png', 'Jln Cihempelas 62, bandung', 'vendor', '$2y$10$vBqLAVje6nGZUt.7.x4eO.gkQoYz1fFtpgEzrqNziWtJFSNa3cVs2', NULL, NULL, '2019-09-26 18:17:14', '2019-09-26 18:17:14', '0A'),
(45, 'Nyoman Wan', 'wannyoman@ymail.com', 'img/avatar/avatar2.png', 'Jl. Mahendradatta No.9, Padangsambian, Denpasar Barat, Kota Denpasar, Bali', 'vendor', '$2y$10$KJXPXg8pZE99SxjcslIjqu5zQpIkzGeWUeLsrtBPh7q3hW1A5TczW', NULL, 'vowuK10WdOnSaRKXmKhtd3lBI0WmJse8VGA37yngRwiPPpbTJkj0CODFbZSO', '2019-09-26 20:14:23', '2019-09-26 20:14:23', '0A'),
(46, 'jardin', 'thejardin12@gmail.com', 'img/avatar/avatar3.png', 'jl.cihampelas no 61', 'vendor', '$2y$10$MfNtwbUACR20bd5X2mchAemrW.M/TNihm8GkLPcttOtYELS4TrmZS', NULL, '99JEdg0M9yFWvU01NKhpvtqP3uO7a2UODEuP9rSMfZ2fMatE4Kgl1Meb4s00', '2019-09-27 00:56:15', '2019-09-27 00:56:15', '0A'),
(47, 'jardin', 'jardin1010@gmail.com', 'img/avatar/avatar3.png', 'jl cihampelas 61', 'vendor', '$2y$10$x4PR/.pemvB1muaByJx7qe77qAumu8jsGhaR3pKptS8S2kstBw.PG', NULL, NULL, '2019-09-27 01:17:25', '2019-09-27 01:17:25', '0A'),
(48, 'Dana', 'dana@gmail.com', 'img/avatar/avatar2.png', 'Jl. Baja Taki No.2, Padangsambian Kaja, Denpasar Barat, Kota Denpasar, Bali', 'vendor', '$2y$10$zeK.0/TDvnfu//u186Luiuwp2t0ebUP44B9y.KGqUF761hT5Od5bu', NULL, 'v1UfBFtA3teyiun7XbfA37RZHS1lAkI4WPraw1j6I32UaqV0JGaLhJKp1pfr', '2019-09-27 07:18:51', '2019-09-27 07:18:51', '0A'),
(49, 'iz', 'iz@gmail.com', 'img/avatar/avatar3.png', 'askdalsdka', 'vendor', '$2y$10$VZVSsXbGzegcvGuIAXCn0.tvPZ2k04Vzmdyn57QQVtdgXPD0xEb6e', NULL, NULL, '2019-09-27 07:23:39', '2019-09-27 07:23:39', '0A'),
(50, 'Agnes Dewi', 'ananda.dewi.kasih@gmail.com', 'img/avatar/avatar3.png', 'Jl. Buana Raya, Gg. Buana Mekar II No. 6, Padang Sambian, Denpasar Barat', 'vendor', '$2y$10$HzOzKCHlbfBmjCcPyzTh0OGCnJKCSTCQ8n7JPC/StAef8HnllZ28e', NULL, 'jV90hoTIGaVROysl2M7JFkOB6EYejP1AefC8gpSJfthXaFVo6qyCCWXRfTbX', '2019-09-27 07:43:52', '2019-09-27 07:43:52', '0A'),
(51, 'Ni made Widiastuti', 'victorialine14@gmail.com', 'img/avatar/avatar2.png', 'Jl.Kebak Sari No.1 Denpasar Barat Bali', 'vendor', '$2y$10$Fb.92dY8B8kMvltQ5XVq9uiD4rIQdVzSpD.rryZcZ8IzDL/b/rHEC', NULL, 'QO07JL6gZnBPqf6VTzwLIvpKGR2JWP1rVOU2mxYySrwLMz1wZQ3pGvP9DjPZ', '2019-09-27 07:52:41', '2019-09-27 07:52:41', '0A'),
(52, 'Bapak Gatot', 'bhinawa_raat@yahoo.com', 'img/avatar/avatar3.png', 'Jalan Diponegoro No. 142A, Denpasar, Bali', 'vendor', '$2y$10$f9LEFioYl7Rygya79gDJG.qpUMo7/oeSNOsNVKAa.PberSwANb.Hm', NULL, 'fLyzZTNSGabsDkMyfifUngXoIMvgXsoCdawRMDqRZaxrt0ynOzKfRzyL9YWk', '2019-09-27 08:03:42', '2019-09-27 08:03:42', '0A'),
(53, 'Bapak Sueca', 'sueca@gmail.com', 'img/avatar/avatar2.png', 'Perumahan Taman Sepa II No. 2A, Jl. Gunung Guntur, Padang Sambian, Denpasar Barat', 'vendor', '$2y$10$YkO2.rJMXTOAZRqNsJvYquVYuQ3W6o2ZdpJzAHvmnEEwtovb41yie', NULL, 'zh2l7FIZdA94pi2Y2Ya7EAxX8XvwLDJPeZAfHORKkBP1saDvM7k58duNC2jb', '2019-09-27 08:12:39', '2019-09-27 08:12:39', '0A'),
(54, 'Ibu Wulan', 'wulan@gmail.com', 'img/avatar/avatar2.png', 'Jl. Neptunus Gg. I No. 3E 3F, Denpasar Barat', 'vendor', '$2y$10$3MN8LRzgEjRpR5LsJNbhw.DgWrrXHb3ifnSgbnX4Q/sACM.GFRU86', NULL, 'lG3XohXdtxrzHnq72NL0XedojTBl81ykItyrrq7hSO5MZd4izz7fVUNoYAoK', '2019-09-27 08:29:22', '2019-09-27 08:29:22', '0A'),
(55, 'Ibu Rosita', 'pondoksuryaning@gmail.com', 'img/avatar/avatar2.png', 'Jl. Gunung Soputan No. 1, Mahendradata Selatan', 'vendor', '$2y$10$gMn17eGSNQ.LRfX1T4YSH.bR/JKrk.7sdmqDVRQ28fByxhwzY6qam', NULL, 'D3M64vJxp4I72lfU1Pwso05OwlEiEJcT6qwRsFeYOZxdaQUv59ZouyWAkGti', '2019-09-28 06:38:11', '2019-09-28 06:38:11', '0A'),
(56, 'Tony Gunadhi', 'tonygunadhi03@gmail.com', 'img/avatar/avatar4.png', 'Jl. Tukad Baru Gg. Mertha Gangga 9, Pemogan, Denpasar Selatan, Kota Denpasar, Bali', 'vendor', '$2y$10$fUPMbQqG.8px3OpDlaKJfutjprVsLgYqGbe8NeQi.0Yj0KxOw.sc2', NULL, 'SmmnlsA7TrnK6gdTVBQaNFtgOLUXYiS0aXH64lD9FOSsPbpQui5vOMt2PjhB', '2019-09-28 06:57:44', '2019-09-28 06:57:44', '0A'),
(57, 'Arya', 'arya@gmail.com', 'img/avatar/avatar3.png', 'Jl. Sedap Malam Gg. Rampai II, Kesiman, Denpasar Timur, Kota Denpasar, Bali', 'vendor', '$2y$10$DfqDqFG8N/oTU4OyPTMOp.Ov.Iya4opKDucHgnSH.yNeoaQqCYOgK', NULL, 'pYO0IyJqnMmfHeVpyyJRuWBhzZstE036QjExNh8X6FheeQd9fSLTtycWqlkv', '2019-09-28 07:16:48', '2019-09-28 07:16:48', '0A'),
(58, 'Bu Dewa Ayu', 'dewaayu@gmail.com', 'img/avatar/avatar3.png', 'Jln Bung Tomo I B No 2 Gatsu Barat, Denpasar Bali', 'vendor', '$2y$10$7ELTqb9Yu7n8TR9cj1lpYuAbLjD4qltDJ1P5GxutnD9.7RKfk6HZq', NULL, 'honVH4J65JHnQHkQFkaB4ESICb6uQkMX3UJRegfyS21zOtFLvD82MaMifwzu', '2019-09-28 07:30:06', '2019-09-28 07:30:06', '0A'),
(59, 'Pak Ketut Cik', 'Ketutcik@gmail.com', 'img/avatar/avatar2.png', 'Br. Tegal Gundul, Ds. Tibubeneng, Jln. Pantai Berawa No. 07, Canggu, Bali', 'vendor', '$2y$10$R1xh2ihr6gWgdTN/a8P4l.BuOOD6C9ovZ0JsmybNY75sdbjl0OxpW', NULL, '5VfeOvjAICzkHO7sW2A5VbkUSgMpGxSwiOwMRHrkbSDltZ9d6WW9xZx6q8uu', '2019-09-28 07:42:17', '2019-09-28 07:42:17', '0A'),
(60, 'Ibu Lista', 'lista@gmail.com', 'img/avatar/avatar3.png', 'Jl. Sahadewa, Gg. VIII No. 1 – Legian, Kuta (belakang Pulu Resto & Bar)', 'vendor', '$2y$10$szBvaQeUro33eSzsMQz0zeXVuy6pNvt8KTlmIUK0EQLQ5UK5AxX82', NULL, 'ZYqYjysNUwwZtHHovl1lVqmNcrvjPJMXS8nKCrdw9tzxad2Tu6WLIRAQi7L6', '2019-09-28 23:39:56', '2019-09-28 23:39:56', '0A'),
(61, 'Ibu Elliya', 'Elliya@gmail.com', 'img/avatar/avatar2.png', 'Jl. Gelogor Carik, No. 36 A, Pemogan, Denpasar Selatan, Kota Denpasar, Bali', 'vendor', '$2y$10$hsenuSF4TUQezR92wEroNOd/m.Awv.Qiku4M7tM6nWSjX6Y4HqJse', NULL, '2o5261F9DGKfMLBzHwPbWGdsOdT797IhDwaSfsvFoQAKiTHPRq0sjozGGvCE', '2019-09-29 00:40:11', '2019-09-29 00:40:11', '0A'),
(62, 'Pak Adi', 'adi@gmail.com', 'img/avatar/avatar3.png', 'Jl. Raya Goa Gajah, Ubud, Gianyar, Bali', 'vendor', '$2y$10$CjJ.AyABy.gMlgnYSAcU8.eiCfQVo8GwCNSD.t3dDoVTvfYJrB.ja', NULL, 'Aa9Q0giWejFna0vcE6FePR4eeZsrw9QS9JMkXefXxB2LrJqQNScHVjKSSoCa', '2019-09-29 00:55:16', '2019-09-29 00:55:16', '0A'),
(63, 'Gus Ade', 'Gusade@gmail.com', 'img/avatar/avatar2.png', 'Jl. Mataram, Gg. Arjuna No.1a, Kuta, Badung, Bali', 'vendor', '$2y$10$0k4de5vvQ3wX4tF5g1OrOO4RryacWhHdawwykgpaAIYjUSACQWvBO', NULL, 'YkjmJHVlhTheeHgc87jUg2zPpeIaS3oPl5ifwLRP0GINfcEofa2o7ODnMzkA', '2019-09-29 01:07:33', '2019-09-29 01:07:33', '0A'),
(64, 'Bapak Gus Budhi', 'thedamar2001@yahoo.co.id', 'img/avatar/avatar4.png', 'Jl. Puri Gerenceng, Gg Natah No. 8D, Tuban Kuta', 'vendor', '$2y$10$gNGh8xIBRoXb1TNj6G3HSu5jzxddStXqXProsB96N0pFYzNDRvoR2', NULL, 'b798mKldJlPIqefjbFLZ5xB8nmqtXDyVAqGWw5byD8LndSNkYUrsHSq5fzoP', '2019-09-29 01:20:28', '2019-09-29 01:20:28', '0A'),
(65, 'Bapak Era', 'era@gmail.com', 'img/avatar/avatar3.png', 'Jl. Beji Ayu Gang 2 No. 6, Seminyak', 'vendor', '$2y$10$Sz8a9hMWtCv3i2cdESutbete2ed1JsOWGrbG8OjJXF/RdiiaeKKoO', NULL, 'KW2DLA1PPcOl9dRYIMNuV6FULFixJZUWxe5L9LOxMDGCbz4hq1javGNjCGU2', '2019-09-29 01:39:09', '2019-09-29 01:39:09', '0A'),
(66, 'Bpk Wisnu', 'kwisnu79@yahoo.com', 'img/avatar/avatar3.png', 'Jl. Nuansa Utama XIX No. 8, Taman Griya – Jimbaran', 'vendor', '$2y$10$tLzQ23QvPCNzYr.536Lfx.MDIJr4JHmUNY7uz1Df2WuGAZttsehKm', NULL, 'BZnP9qmDjgxl5NoCApBbVGHfEOvd5Bzq2WuuwEsf5EQXhQr5R5vqbkcuHdd2', '2019-09-29 02:02:03', '2019-09-29 02:02:03', '0A'),
(67, 'Bapak Ketut', 'ketut@gmail.com', 'img/avatar/avatar2.png', 'Jl. Bunut Sari Gg. Pura Uluwatu III No. 4, Legian Padma Timur', 'vendor', '$2y$10$MUnX9EgzYfVpOi0PDq89JOkoOP7O2O9AU4Ph88aBuSfuku5gHbvra', NULL, 'mHpjPMCpBuLNYxCso5rcd4bIO7xH7kIxpbtbTjRHM6gDozbw5hpot4AE2b0e', '2019-09-29 02:11:06', '2019-09-29 02:11:06', '0A'),
(68, 'Ibu Putriyani', 'Putriyani@gmail.com', 'img/avatar/avatar3.png', 'Jl. Kutat Lestari, Gg. VI Sanur', 'vendor', '$2y$10$0MVj17PbeQPK6.1EA50iQOn4Wy5Qe/tq3EEWNlK4Pfv.E.5lILQjC', NULL, '4pYy4fDjMXWtOQAqzzbBgTRue1GgtsVF7xJbmBKQmfYBnauq9ciSXTBQKLww', '2019-09-29 02:18:25', '2019-09-29 02:18:25', '0A'),
(69, 'Ida Bagus Denni', 'Idabagusdenni@gmail.com', 'img/avatar/avatar2.png', 'Jl. Merdeka VI No.1, Sumerta Kelod, Denpasar Timur, Kota Denpasar, Bali', 'vendor', '$2y$10$CQxGXvBxEnGSMOAuVbY.FeK.Td.LymdVhgCPedU9gtYyRpKbqrP7O', NULL, 'HXawGUdxMgxrubp4AN6QdrShLRsKj4GDrjesYmwgNTehZR4aGPShSTT4DTuY', '2019-09-29 02:47:15', '2019-09-29 02:47:15', '0A'),
(70, 'Ibu Sukani', 'sukani@gmail.com', 'img/avatar/avatar4.png', 'Jln. Pemuda I No. 3A, Renon, Denpasar Timur', 'vendor', '$2y$10$TY38BSLa/IkHfabUo7hIMeoBB3rZGuYpF1KDSQ3Y3Go5.kJ6Lf8Km', NULL, NULL, '2019-09-29 02:58:41', '2019-09-29 02:58:41', '0A'),
(71, 'Ibu Chandra', 'Chandra@gmail.com', 'img/avatar/avatar2.png', 'Jl. Tukad Badung XA No. 7B, Renon, Denpasar Selatan', 'vendor', '$2y$10$sbMbkmw6nTN0w9auSCcJhuKmwrWX0SSD3.7c.eg.YAI.Rpa1ahUdu', NULL, '2PdVU5qDQz19tVrHQg14TYgDVPz4f7VHsWv2VTogOtkVI1oM3waoBnjilfgw', '2019-09-29 08:53:26', '2019-09-29 08:53:26', '0A'),
(72, 'Pak Wayan', 'labuvapondok@gmail.com', 'img/avatar/avatar4.png', 'Jl. Taman Jati No. 3A, Mumbul, By Pass Nusa Dua, Kuta Selatan', 'vendor', '$2y$10$WejQ9dl1MyFcC6x/o9x7EeTz5CX8F9INaxS9we5YQvAw/.7C/PVD2', NULL, 'kc2Ra12NgvrJebziEv9XCA9RNeeZlAEAEME2bLNdXiAAjSOxnidmKwck41sH', '2019-09-29 09:16:05', '2019-09-29 09:16:05', '0A'),
(73, 'Ibu Gaby', 'dbudgethillhouse@gmail.com', 'img/avatar/avatar4.png', 'Jl. Raya Uluwatu, Gang Semut City, Ungasan, Uluwatu 80264', 'vendor', '$2y$10$z1DVK54MCB.aprGzlTZHjOwkFaeSaJKSnSn9Quco2wUWzr4/lUgcS', NULL, 'i2sKTXE1ByrvWlZNF0EdQErjgz2mDlDVWREGI3fP4kxfTwrtOR7SARBIyPHX', '2019-09-29 09:38:07', '2019-09-29 09:38:07', '0A'),
(74, 'Ibu Puspa', 'sriyana_kd@yahoo.com', 'img/avatar/avatar2.png', 'Jl. Tukad Petanu Gang Bekisar 2F, Panjer', 'vendor', '$2y$10$EplijNd0gQaKI/IHpyPvk.gI8obytpeTFvhj33RjY/EdXVMVEDxnm', NULL, '8um2ZadYeMvRXPIFFxbApkI1j9kAJITSGlYZqV32yAWnuGuC2lonjBkBXYMo', '2019-09-29 09:52:31', '2019-09-29 09:52:31', '0A'),
(75, 'Farida', 'Farida@gmail.com', 'img/avatar/avatar2.png', 'Jl. Taman Sari Madu , Block Jepun No.4, Kerobokan Kelod, Kuta Utara, Badung, Bali', 'vendor', '$2y$10$/lv2uUv7EpuRxYIETgvgHeTZTLpSk2rWVB96aiq8vaAos5MTrlqOG', NULL, 'oCFjMaaZ7BIVqyUjZ6J1fgsEeVp7cHNvc9xLk1873WxTYgpROUEXy1w85qY8', '2019-09-29 10:10:12', '2019-09-29 10:10:12', '0A'),
(76, 'mural bali id', 'kusumaariyanto9@gmail.com', 'img/avatar/avatar4.png', 'denpasar bali,indonesia', 'vendor', '$2y$10$OnY.wLot7AAqAvPgzZbtpegMfD2gm9p6JhENR7TmSaTK3EOEBbHn.', NULL, NULL, '2019-09-29 10:59:15', '2019-09-29 10:59:15', '0A'),
(77, 'wiranatha', 'admin@gmail.com', 'img/avatar/avatar2.png', 'Denpasar jl kenyeri 2', 'vendor', '$2y$10$tY3T7pScvDogjzLHzOqm9OuU4GSTCeM.FhYAb1TFjSuRHNccSPnfK', NULL, 'HwxqodXSJr5LlEMIJnpujs5cBe2dK4AnPfO5UI1iVTE3wEqxC014q0O76tnl', '2019-09-30 06:32:07', '2019-09-30 06:32:07', '0A'),
(78, 'AgusMertana', 'agusm@a.com', 'img/avatar/avatar4.png', 'gianyar gang 3 adada', 'vendor', '$2y$10$UyQTtcCSTT7w0TchBVitCeNDnPsETfuEF8qOiQmEPdN7ozkleLtGm', NULL, 'eEDK3lSWA3xHdd7qq67InqpnAMXWu2hIr6FoqWaUwCxbDfzUk9XHvOSWgElN', '2019-09-30 07:43:59', '2019-09-30 07:43:59', '0A'),
(79, 'suitup', 'tester@a.com', 'img/avatar/avatar4.png', 'Jl. bukit sangian bedaja d', 'vendor', '$2y$10$n0D84/l6Z9udX6RT/RHbve5wJk.Z8zWTF.3g8O73nx6n7TuHZNjve', NULL, NULL, '2019-09-30 08:19:31', '2019-09-30 08:19:31', '0A'),
(81, 'RumahKuRumahKu Bandung', 'rumahkubandung@gmail.com', 'img/avatar/avatar3.png', 'Jarrsin Apartemen Cihampelas', 'vendor', '$2y$10$s5TfrqJ2syiTaQ.lRJaSrOJXN1TW7u6182HOqldxNe5HZpMgjObz6', NULL, 'hORqjE5R5ZRvQP83ANiFMzm0rHguKB5lV4ZaYRyWppSfEi0ovQybAEMRWoH6', '2019-10-02 01:12:10', '2019-10-02 01:12:10', '0A'),
(82, 'CecyliaCecylia A', 'Cecylia@gmail.com', 'img/avatar/avatar4.png', 'jln gunung batu no 203 baandung', 'vendor', '$2y$10$xPOCMzNtgWG55c/JSE2gqOmBiZLbxM9Vo8rXgaHZgI5Hi8Ofi0s7u', NULL, 'a6iEA30OvNJB0h5JMpx1s3fjtTVn5McPqsXadXrqrvNfVp7R8EJ9NzhXzaDo', '2019-10-02 01:37:39', '2019-10-02 01:37:39', '0A'),
(83, 'diandian', 'dian@gmail.com', 'img/avatar/avatar4.png', 'Jl. Soekarno Hatta No.698, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286', 'vendor', '$2y$10$m885Oqv8t7euZvagu9bnue55oDCytdjcK3xe6U7ZknYIlyJ.Jla.a', NULL, 'u3DMxmZFOsOg0wkgeHh4ZQN13AneTJKjIYLgmNZgGX2PtNvX6YsMikFIm6Ts', '2019-10-02 06:35:13', '2019-10-02 06:35:13', '0A'),
(84, 'andrewandrew', 'andrew@gmail.com', 'img/avatar/avatar4.png', 'Jl. Karapitan No.1', 'vendor', '$2y$10$D088ceUobNxiiAL6CaqvTeHFymuLGyW9d7C5uJWUXAGnmfsH9lGkS', NULL, 'yxIRSII7nHlg3T3EWJEufZHMKrmxv8bvtCF2VOgc77QyvPmBhSsIp6xkSIEh', '2019-10-02 07:04:31', '2019-10-02 07:04:31', '0A'),
(85, 'agusagus m', 'agusm@gmail.com', 'img/avatar/avatar3.png', 'Jl. Cibaduyut Raya Bandung', 'vendor', '$2y$10$bNI6SUAhw/tuCgMY28lH4.5FOWZCyDfFW3HRxg.lBkxc.duQtTXEC', NULL, '2MH6J3xvUi9RG841oMXiknqO1HYvP9315q13n1jmKJWna5vOJfWQ7LMSqW7B', '2019-10-02 08:38:28', '2019-10-02 08:38:28', '0A'),
(86, 'King\'s PropertyKing\'s Property', 'kingsproperty@gmail.com', 'img/avatar/avatar3.png', 'Jl gunung batu no 203 pasteur bandung', 'vendor', '$2y$10$wIriraMlwBjbdpnztYrCCOWGF/NZI02EIvLh.1UO2ABkaS/LOEOuO', NULL, '8BP3VGKYIwBrBUVNV3i3C9vDzrmanWimf0JaP0CErulXs7ZiRD7vliL3XjKQ', '2019-10-02 09:50:06', '2019-10-02 09:50:06', '0A'),
(87, 'DewiRossi Dewi', 'rossidewi@gmail.com', 'img/avatar/avatar4.png', 'Jalan Sukarno Hatta No 689.B Bandung Depan Metro Indah Mall Bandung', 'vendor', '$2y$10$qJwEOVd0ekfAa7eW5m5gmO6ekzJ1DYLGIBn1t3bgKr33Aq28aU6Ji', NULL, 'LAmtJRW48deUAD73cpoHUQ6cEFZiB77edIm8svr6qtqo2IL015u3KfES8hO2', '2019-10-02 10:03:31', '2019-10-02 10:03:31', '0A'),
(88, 'AriefArief Decor', 'ariefdecor@gmail.com', 'img/avatar/avatar3.png', 'Jl Soekarno Hatta Bandung', 'vendor', '$2y$10$pwBoCDc7phWM.vc3G8B71.9ZWgy7dVVCU0FFykIk9fSQFToTpNgT.', NULL, 'OVljUfn1JRTl5oceulLKFOUGkw23Q6FNN0BPRj0HSWetbw8zQtRsQADTreSp', '2019-10-02 20:35:54', '2019-10-02 20:35:54', '0A'),
(89, 'Ngurah', 'ngurah@gmail.com', 'img/avatar/avatar3.png', 'Jl umallas klecung no 15', 'vendor', '$2y$10$nM2ROC7BRWD4oOYYko3t..Do.K5GJ9oNi3bWMVCh5qvtTHlSR0l1.', NULL, 'xUMAkeSOzChiO0c1xbLt6aQr9DehVvjFcYzvkv2nEp8CpziGeSAgzNG1AHfz', '2019-10-04 05:34:13', '2019-10-04 05:34:13', '0A'),
(90, 'Jason', 'jason@gmail.com', 'img/avatar/avatar2.png', 'jalan umalas klecung no.15', 'vendor', '$2y$10$ChY0ZQP3mSgApS1wHscUaOvpN7xPUJ24b1TSfwMJXsZu6Nm2JnYUW', NULL, 'AIdGMC2VXfwatL8oi0Dp4rNhI5jQtgFlXGwuigXTreJn8QiP4OU74FaTfdiO', '2019-10-04 07:47:48', '2019-10-04 07:47:48', '0A'),
(91, 'Harry Gunawan', 'harrygunawan@gmail.com', 'img/avatar/avatar4.png', 'Jalan Dukuh Sari Gang Sungai, Umalas - Bali', 'vendor', '$2y$10$qmQB77TIS/ae6Tldyhr7uOUeTtcisDtpxcjnJLD4nvA5/CM99Zcja', NULL, 'A1sVQ1q83N5fIGw1pX1M6eyXgC5p3i6KVchnbMFMTgjpxhcP4zK51IthEog7', '2019-10-04 07:59:59', '2019-10-04 07:59:59', '0A'),
(92, 'Yani Kusuman', 'yanikusuman@gmail.com', 'img/avatar/avatar4.png', 'Jl. Pantai Cemagi', 'vendor', '$2y$10$dD/TQkseT6XSUpwkc5Iv2.QNycG1mXRXn5b9HW6ezDK8WU1QydbNi', NULL, 'TbjFjyiVG1O4iyi2c5J2sP9w2PrL7BZoYUhmosnxDpWCoFlsv7DNKUJUqZBn', '2019-10-04 08:18:17', '2019-10-04 08:18:17', '0A'),
(93, 'Dwi Putra', 'dwiputra@gmail.com', 'img/avatar/avatar2.png', 'Jimbaran GWK', 'vendor', '$2y$10$phOKi.5xd1KiMLT6H7gDyOhMxnEU9NBzX3Qk/SWHqJh8SbdmHU6UG', NULL, 'LGVuGr0Xod3bQzcNuGm7b6yMheYKN5gN6Y8G6PQDjwpwZviEJj49keOI6J3O', '2019-10-04 08:28:36', '2019-10-04 08:28:36', '0A'),
(94, 'Wayan Agus', 'wayanagus@gmail.com', 'img/avatar/avatar2.png', 'Jalan taman ayun 15 taman mumbul benoa bali', 'vendor', '$2y$10$z239GXPCxfThG9nboTzfuusldLd/VqigdAqM6eS1bOL89UM.JdYsa', NULL, NULL, '2019-10-04 08:46:36', '2019-10-04 08:46:36', '0A'),
(95, 'me', 'wijus@gmail.com', NULL, NULL, 'customer', NULL, '0895386898095', NULL, NULL, NULL, '0A'),
(96, 'I Wayan Merta', 'iwayanmerta@gmail.com', 'img/avatar/avatar4.png', 'Jl. Pura Masuka No.169, Ungasan, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$M0P0Yjs2iuY7LVqUaWurc.rLTtUeKjoE9jrDimKsCvFgZRD997572', NULL, 'ZMBvcU5r9wdn6g4myHIGckWA046cq92GyxdvVC331nFl382REV6vaNSu3k6Q', '2019-10-04 20:29:17', '2019-10-04 20:29:17', '0A'),
(97, 'Pande Dharma', 'pandedharma@gmail.com', 'img/avatar/avatar3.png', 'Jl. Bougenville Boulevard, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$wl7XDPpYRruJULF6Pt3f9usQTXif1L/6P21A39NR79MU1uW/MaL2y', NULL, 'Rk3BF9z9OHCaIoYZ23Ik6N72ahQ5S7z6pDmEc1jgrLKwRNwv4Y8fOYnSYM2j', '2019-10-04 20:37:23', '2019-10-04 20:37:23', '0A'),
(98, 'Bali Tour 99', 'balitour99@gmail.com', 'img/avatar/avatar4.png', 'Jl. Toya Ning II, Ungasan, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$kPslg/J7EMSMCQkwmWdo/upLlcybRaFm3/GlP4GDW6Uxq0E/tF.dK', NULL, 'e5P83y6mvDeLpGf3GHjBZo9yHke0mNLHwVRWvFdm58G46IIWCQ20lsX7VRxw', '2019-10-04 20:59:59', '2019-10-04 20:59:59', '0A'),
(99, 'Alvy Zulia', 'alvyzulia@gmail.com', 'img/avatar/avatar4.png', 'Gg. Mantili No.20, Ungasan, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$B3N6GWmD7TyGCMCixmyEZe.yp6C2Cj0Htv74q7gXiuI3PgmU2za7S', NULL, 'Hwn9sw4mR6wmrYAt51ufYnD9QAc9lwaeolpLsMPCPcaOHZNw2PfQwO9zF6YQ', '2019-10-04 23:21:55', '2019-10-04 23:21:55', '0A'),
(100, 'Lady', 'lady@gmail.com', 'img/avatar/avatar4.png', 'Gg. Kayu Ulin No.1A, Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$5.jY1oM735veYPU0fEglv..dNqnCPYGT.lI3UGXemHhLbwrxzTTre', NULL, '2jLJj8ZHi4KxWqBPPsi8Jt11kESzh3oe3od7wcUHjRfEfr1KDDXEJyXDRD2B', '2019-10-05 05:57:50', '2019-10-05 05:57:50', '0A'),
(101, 'Ketut Budiarta', 'ketutbudiarta@gmail.com', 'img/avatar/avatar2.png', 'Jl Blongkeker, Puri Gading - Jimbaran', 'vendor', '$2y$10$mEQNR.YXXtd/KJ2spa/ym.sgzenHzuO7e0tUQIVYDxzOuxpF4fI1u', NULL, 'GffvOBqavGuAORGjXvANw3mTlRq446GL7ybyTJsmJi4SmeCvA0CpKLKKpKTg', '2019-10-06 06:25:14', '2019-10-06 06:25:14', '0A'),
(102, 'siska', 'siska@gmail.com', 'img/avatar/avatar4.png', 'Jl. Kor Jimbaran', 'vendor', '$2y$10$lhOGlZ3DxXac8tvjOPHp9.ja7pXbN0XksebSkSLGEvU/0DWNFknfe', NULL, 'vjVvA3F7q4Cfq8CRkLx6ymoh3yB2Rni7nqQU7sbXcJHyYy4I2Ov1AhyO77TS', '2019-10-06 07:40:57', '2019-10-06 07:40:57', '0A'),
(103, 'Welly', 'welly@gmail.com', 'img/avatar/avatar2.png', 'bukit jimbaran', 'vendor', '$2y$10$L0tStWIwaTq2wkmhUNNKOOZVWUn5cBCP4WJQrzP5/Nbj.ldWWuBNO', NULL, 'dq9ul0atAc4VBLp46JNJFDQvG9oENSBHsZeUsmqFK7Efv94GjNQpYoBcesWN', '2019-10-06 09:16:24', '2019-10-06 09:16:24', '0A'),
(104, 'Ivan', 'ivan@gmail.com', 'img/avatar/avatar2.png', 'Kuta Selatan, Kab. Badung, Bali', 'vendor', '$2y$10$MUyBo6W8RmrPhP4uoZl3guyvODWOh6PYyNvJOkHM0ttZ4/92oEnoq', NULL, 'bZIqk9NVe42YRiJzFrnvkkIyhGPghJYTg543Jiqe7op5Vw4MV0NVygbJ80KN', '2019-10-06 09:34:05', '2019-10-06 09:34:05', '3A'),
(105, 'Mie Kocok Sundarasa', 'miekocoksundarasa@gmail.com', 'img/avatar/avatar2.png', 'Jl. Dewi Saraswati II No.3, Seminyak, Kuta, Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$perKIs87pgKO4FT/Cs7fzeBWUoTXKClGixl/jX4agZ1C7R6nqUJhK', NULL, 'gcfHrX6zM1ybVbM88jUe2xTxt3m4jrAS9Ei8v3pC4zNr1a6JQbf5AnC8HhaT', '2019-10-06 09:53:53', '2019-10-06 09:53:53', '2A'),
(106, 'Ida Bagus Ngurah Mahaputra', 'idabagusngurahmahaputra@gmail.com', 'img/avatar/avatar2.png', 'blok E, Jl. Gn. Catur II No.7, Padangsambian Kaja, West Denpasar, Denpasar City, Bali 80118', 'vendor', '$2y$10$SztmKnVcIxuiopiJHiJS2eWPKDR1sKBuR1gTdAp3.McrTGs4pEYZ6', NULL, 'XaYW9gdbvkinVT4xMSLazxv29U7nTzVNJf6o0nyPelGykGg8lJZKeOnTuuTk', '2019-10-06 10:01:54', '2019-10-06 10:01:54', '3A'),
(107, 'Awan Bali Villa Rental', 'awanbalivillarental@gmail.com', 'img/avatar/avatar4.png', 'Jl. Petitenget, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali 80361', 'vendor', '$2y$10$5sbV0W6PFcU6KDnOoEpi6eCV1PNo6gDatTls9zGAvGMgIP53lqSpO', NULL, '6zYpyQlBqXBlgytJ5UgzUU3jK3IQDLPxEI9Lgd4gHHeNIUkz22JP5ceIHlwx', '2019-10-06 11:26:55', '2019-10-06 11:26:55', '3A'),
(108, 'Wirayuda', 'wirayuda@gmail.com', 'img/avatar/avatar4.png', 'Jl By Pass Ngurah Rai Gang Penyu No.2, Sanur, Denpasar, Kota Denpasar, Bali 80228', 'vendor', '$2y$10$BiSZPpiejIYhizaox/0D8u7IMM97LeTlvCYCAN9mGpy76qAqRx.dS', NULL, NULL, '2019-10-06 11:41:40', '2019-10-06 11:41:40', '3A'),
(110, 'Fikri', 'fikri.somantri@gmail.com', NULL, NULL, 'customer', NULL, '0878603626', NULL, NULL, NULL, '0A'),
(111, 'Bayu', 'imadebayukusuma@gmail.com', 'img/avatar/avatar4.png', 'Ubud Gianyar bali', 'vendor', '$2y$10$ZZCkm57tkgK4n1qFF6FjTOLtdsS/M.LUcfr/noSoMYSA7CVp6elsO', NULL, '2Geuf59ILHV2vDPtuwnCwqZmY9p0Y03AlI1MRurgFSV1vdv9hgvJMJw9koUb', '2019-10-10 21:54:00', '2019-10-10 21:54:00', '0A'),
(112, 'anugrah', 'nadiartha98@gmail.com', 'img/avatar/avatar3.png', 'jalan gelogor carik gg dewi sri no 12, pemogan denpasar selatan', 'vendor', '$2y$10$RcdG48i/uGahFH7/jkwsVO8f0Vdhz.KS/w3hpt1vZlRLXwTK2Tb7y', NULL, 'Sbb6CfFqlg4bej21uQNXS8b2UXAFVS0FoRbyTZ9YSsJFTAqmRFFucFRfJY8N', '2019-10-13 01:37:21', '2019-10-13 01:37:21', '0A'),
(114, 'Anis nur Cholifah', 'anisnurcholifah@gmail.com', NULL, NULL, 'customer', NULL, '08127890505', NULL, NULL, NULL, '0A'),
(115, 'pratardana', 'pratardanasurya12@gmail.com', 'img/avatar/avatar3.png', 'jalan jalan', 'vendor', '$2y$10$1OkTX7ilX5FLxOO2LlBMz.1KkjD5br6LkrXGn8KQDWuP0/I1e6MxC', NULL, NULL, '2019-10-14 04:29:48', '2019-10-14 04:29:48', '0A'),
(116, 'M. Ruslani', 'mrusland7@gmail.com', 'img/avatar/avatar3.png', 'Tegal Senggotan RT.4 no. 120 B,  Dusun V Dongkelan, Tirtonirmolo, Kasihan, Bantul', 'vendor', '$2y$10$Ejzzc0rTLWfezWjxQDe54erltdKZ84QhtgnIm1JEpBPTPVQ8cwFnG', NULL, NULL, '2019-10-14 23:20:58', '2019-10-14 23:20:58', '0A'),
(117, 'Sara', 'rindaxcaesara@gmail.com', NULL, NULL, 'customer', NULL, '085642350064', NULL, NULL, NULL, '0A'),
(118, 'Gatot Rahmadi', 'gatotrahmadi.290760@gmail.com', 'img/avatar/avatar4.png', 'Jl.dr Saharjo119B / Gang Rahayu no.18 Rt 05 Rw 10. Kec.Tebet. Jaksel 12860', 'vendor', '$2y$10$hWULS1iQkIvy5EdOfqBug.zL.egsLT2OiNJs0aKUNIPUuO/OFJh4W', NULL, 'q2ymAFIXy8PDhd2XjeEPsDy2Ragq5bJ1L0SByK6b4fqaKlFAeZlXWfbktgXd', '2019-10-15 05:27:10', '2019-10-15 05:27:10', '0A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `FK_beli_properti` (`id_properti`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id_fitur`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kridibilitas`
--
ALTER TABLE `kridibilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`),
  ADD KEY `FK_properti_kategori` (`kategori`),
  ADD KEY `FK_properti_users` (`id_user`),
  ADD KEY `FK_properti_region` (`region`);

--
-- Indexes for table `properti_fitur`
--
ALTER TABLE `properti_fitur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index 4` (`id_properti`,`id_fitur`),
  ADD KEY `FK_properti_fitur_fitur` (`id_fitur`);

--
-- Indexes for table `properti_img`
--
ALTER TABLE `properti_img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `FK_properti_img_properti` (`id_properti`),
  ADD KEY `FK_properti_img_users` (`uploaded_by`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `FK_sewa_properti` (`id_property`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tempat_FK` (`provinsi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index 2` (`email`(191)),
  ADD KEY `fk_paket` (`paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kridibilitas`
--
ALTER TABLE `kridibilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `properti_fitur`
--
ALTER TABLE `properti_fitur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=618;
--
-- AUTO_INCREMENT for table `properti_img`
--
ALTER TABLE `properti_img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `FK_beli_properti` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properti`
--
ALTER TABLE `properti`
  ADD CONSTRAINT `FK_properti_kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_properti_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_properti_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properti_fitur`
--
ALTER TABLE `properti_fitur`
  ADD CONSTRAINT `FK_properti_fitur_fitur` FOREIGN KEY (`id_fitur`) REFERENCES `fitur` (`id_fitur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_properti_fitur_properti` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properti_img`
--
ALTER TABLE `properti_img`
  ADD CONSTRAINT `FK_properti_img_properti` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_properti_img_users` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `FK_sewa_properti` FOREIGN KEY (`id_property`) REFERENCES `properti` (`id_properti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_FK` FOREIGN KEY (`provinsi`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_paket` FOREIGN KEY (`paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
