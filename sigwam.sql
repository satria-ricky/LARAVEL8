-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2020 at 12:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigwam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table admin to login ';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
('ADM1', 'adminsigwam', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id_destination` int(11) NOT NULL,
  `name_destination` varchar(30) NOT NULL,
  `lat_destination` varchar(30) NOT NULL,
  `lng_destination` varchar(30) NOT NULL,
  `address_destination` varchar(100) NOT NULL,
  `desc_destination` varchar(250) NOT NULL,
  `id_kecamatan` varchar(30) NOT NULL,
  `img_destination` varchar(250) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_kabupaten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id_destination`, `name_destination`, `lat_destination`, `lng_destination`, `address_destination`, `desc_destination`, `id_kecamatan`, `img_destination`, `id_kategori`, `id_kabupaten`) VALUES
(69, 'Pantai Boroq Bagek', '-8.909707946364648', '116.26871082254536', 'Kuta, Pujut, Central Lombok Regency, West Nusa Tenggara', '', 'Pujut', '', 'Pantai', 'Lombok Tengah'),
(71, 'Pantai Batu Payung', '-8.907093753168489', '116.26178920204245', 'Taman Wisata Alam Gunung Prabu, Tanjung Selayar', '', 'MAT1', '', 'Pantai', 'KAB1'),
(72, 'Pantai Areguling', '-8.9024571839113', '116.24687084149241', 'Jl. Pariwisata Areguling, Prabu, Pujut, Kabupaten Lombok Tengah, NTB', '', 'Pujut', '', 'Pantai', 'Lombok Tengah'),
(73, 'Pantai Batu Bereng', '-8.907065999999995', '116.21792099999993', 'Mekar Sari, West Praya, Central Lombok Regency, NTB', '', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(74, 'Pantai Jagog Luar', '-8.911226503861366', '116.19881924624804', 'Mekar Sari, West Praya, Central Lombok Regency, West Nusa Tenggara', '', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(75, 'Pantai Muller', '-8.904398421340513', '116.16385953014276', 'Mekar Sari, West Praya, Central Lombok Regency, NTB\r\n', '', 'LTE7', '', 'Pantai', 'KAB2'),
(76, 'Pantai Munah', '-8.899274485675901', '116.16459948330373', 'Selong Belanak, West Praya, Central Lombok Regency, NTB', '', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(77, 'Pantai Telawas', '-8.894716797169917', '116.16017212666088', 'Selong Belanak, West Praya, Central Lombok Regency, NTB', '', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(79, 'Pantai Mawi', '-8.887745935379067', '116.16091587563506', 'Jl. Pantai Mawi, Selong Belanak, Praya Bar., Kabupaten Lombok Tengah, NTB', '', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(80, 'Pantai Selong Belanak', '-8.873296204603136', '116.16204499106948', 'Selong Belanak, West Praya, Central Lombok Regency, NTB\r\n', '', 'LTE7', '', 'Pantai', 'KAB2'),
(81, 'Pantai Tomang-Omang', '-8.862787672271756', '116.15158208817047', 'Selong Belanak, West Praya, Central Lombok Regency, NTB', '', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(82, 'Pantai Serangan', '-8.869280805482544', '116.13973916093482', 'Desa Serangan, Selong Belanak, Praya Bar., Kabupaten Lombok Tengah, NTB\r\n', '', 'LTE7', '', 'Pantai', 'KAB2'),
(83, 'Pantai Torok', '-8.866558285988518', '116.12176887663759', 'Selong Belanak, West Praya, Central Lombok Regency, West Nusa Tenggara', 'aa', 'LTE7', '', 'Pantai', 'KAB2'),
(84, 'Pantai Nambung', '-8.86898740846454', '116.10385335945818', 'Dusun Nambung Desa, Buwun Mas, Sekotong Tengah, Kabupaten Lombok Barat, NTB', '', 'LBT4', '', 'Pantai', 'KAB5'),
(85, 'Pantai Pengantap', '-8.873010692306442', '116.08327247460545', 'Gang Kuda LautDusun Pengantap, Buwun Mas, Central Sekotong, West Lombok Regency, NTB\r\n', '', 'LBT4', '', 'Pantai', 'KAB5'),
(86, 'Pantai Meang', '-8.883057275466145', '116.0609802354818', 'Desa, Buwun Mas, Sekotong Tengah, Kabupaten Lombok Barat, Nusa Tenggara Bar.', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(87, 'Pantai Sangap', '-8.854261795037871', '116.04704719011875', 'Sangap, Buwun Mas, Sekotong Tengah, Kabupaten Lombok Barat', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(88, 'Pantai Rangking', '-8.861867332978923', '116.03969839596698', 'Buwun Mas, Central Sekotong, West Lombok Regency, West Nusa Tenggara\r\n', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(90, 'Pantai Pangsing', '-8.858320261839934', '116.03464962489875', 'Unnamed Road, Buwun Mas, Sekotong Tengah, Kabupaten Lombok Barat, NTB\r\n', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(91, 'Pantai Panggang', '-8.890686729171113', '116.01782799326793', 'Buwun Mas, Central Sekotong, West Lombok Regency, West Nusa Tenggara', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(92, 'Pantai Piling', '-8.876778166160118', '115.98078507474122', 'Buwun Mas, Central Sekotong, West Lombok Regency, West Nusa Tenggara', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(93, 'Pantai BatuBata', '-8.85057277818641', '115.94752812763', 'Pelangan, Central Sekotong, West Lombok Regency, West Nusa Tenggara', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(94, 'Pantai Mekaki', '-8.832768122657164', '115.92985302851594', 'Jl. Raya Mekaki, Pelangan, Sekotong Tengah, Kabupaten Lombok Barat, NTB', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(95, 'Pantai Paretan', '-8.814755719416695', '115.84970425503604', 'Batu Putih, Central Sekotong, West Lombok Regency, NTB', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(96, 'Pantai Segara Jelundungan', '-8.746552199840366', '115.86681329050248', 'Dusun Labuan Poh, Desa Batu Putih, Batu Putih, Sekotong Tengah, Kabupaten Lombok Barat, NTB\r\n', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(97, 'Pantai Kores', '-8.75375398385292', '115.88029959328878', 'Batu Putih, Central Sekotong, West Lombok Regency, NTB\r\n', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(99, 'Pantai Elak Elak', '-8.730448076639366', '115.96613933607034', 'Jalan Raya Sekotong, Sekotong Barat, Sekotong Tengah, Sekotong Bar., Lombok Barat,NTB', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(100, 'Pantai Goa Landak', '-8.71982451070768', '116.03425909275319', 'Tj. Loanglandak, Sekotong Barat, Central Sekotong, West Lombok Regency, NTB\r\n', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(101, 'Pantai Gresak', '-8.72568771658033', '116.04127345275435', 'Unnamed Road, Bar., Sekotong Nusa Tenggara Bar., Sekotong Bar., Sekotong Tengah, Lobar, NTB\r\n', '', 'Sekotong', '', 'Pantai', 'Lombok Barat'),
(102, 'Pantai Cemare Indah', '-8.721124579413488', '116.05807053581839', 'Komp. Ruko Cemare, Jl. R.A. Kartini, Monjok, Selaparang, Kabupaten Lombok Barat, NTB\r\n', '', 'LBT8', '', 'Pantai', 'KAB5'),
(103, 'Pantai Induk', '-8.673683541288732', '116.07119904107594', 'Nusa Tenggara Bar, Kebunayu, Gerung, Kebunayu, Gerung, Kabupaten Lombok Barat, NTB\r\n', '', 'Gerung', '', 'Pantai', 'Lombok Barat'),
(104, 'Pantai Karang Bangket', '-8.64880755491421', '116.06962996839741', 'Jalan Raya pengsong, Perampuan, Kec. Labuapi, Kabupaten Lombok Barat, NTB', '', 'Labu Api', '', 'Pantai', 'Lombok Barat'),
(105, 'Pantai Kuranji', '-8.633872357498738', '116.07250121977324', 'Kuranji, Labuapi, West Lombok Regency, West Nusa Tenggara\r\n', '', 'Labu Api', '', 'Pantai', 'Lombok Barat'),
(106, 'Pantai Gading', '-8.618399604678', '116.07469116652305', 'Jl. Lingkar Selatan, Jempong Baru, Kec. Sekarbela, Kota Mataram, NTB', '', 'Sekarbela', '', 'Pantai', 'Mataram'),
(107, 'Pantai Mapak Indah', '-8.616038329438997', '116.07480367006838', 'West Nusa Tenggara ', '', 'Mataram', '', 'Pantai', 'Mataram'),
(108, 'Pantai Loang Baloq', '-8.602512511699375', '116.07385277051264', 'Tanjung Karang Sekarbela Mataram, Kabupaten Lombok Barat, Nusa Tenggara Bar\r\n', '', 'MAT5', '', 'Pantai', 'KAB1'),
(109, 'Pantai Tanjung Karang', '-8.601153428759856', '116.0737817326069', 'Jl. Sultan Kaharudin, Pagesangan, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar', '', 'MAT5', '', 'Pantai', 'KAB1'),
(110, 'Pantai Penghulu Agung', '-8.582030948614861', '116.07162545978099', 'Pantai Penghulu Agung, NTB', '', 'Ampenan', '', 'Pantai', 'Mataram'),
(111, 'Pantai Ampenan', '-8.569368297429707', '116.07208332501955', 'Jl. Pabean, Kec. Ampenan, Kota Mataram, Nusa Tenggara Bar.', 'pantai ampenan', 'Ampenan', '', 'Pantai', 'Mataram'),
(123, 'Pantai Senggigi', '-8.4785956', '116.0353862', 'Pantai Senggigi, West Nusa Tenggara', 'Pantai Senggigi, West Nusa Tenggara', 'Batu Layar', '', 'Pantai', 'Lombok Barat'),
(124, 'Pantai Tampah', '-8.9016289', '116.2150402', 'Mekar Sari, Praya Barat', 'Tranquil, secluded beach with a lengthy stretch of white sand, snorkeling & basic facilities.', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(125, 'Pantai Lancing', '-8.9007833', '116.2054315', 'Jl. Pantai Mawun, Tumpak, Pujut, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83572', '36X4+M6 Tumpak, Central Lombok Regency, West Nusa Tenggara', 'Praya Barat', '', 'Pantai', 'Lombok Tengah'),
(126, 'Pantai Bintaro', '-8.558225290326217', '116.07121046439397', 'Bintaro, Ampenan, Mataram City, West Nusa Tenggara\r\n', 'Pantai Bintaro', 'Ampenan', '', 'Pantai', 'Mataram'),
(127, 'Pantai Meninting', '-8.553109967197347', '116.06982321828264', 'Bintaro, Ampenan, Mataram City, West Nusa Tenggara', 'Pantai Meninting', 'Ampenan', '', 'Pantai', 'Mataram'),
(128, 'Pantai Tanjung Bias', '-8.536161001626931', '116.06787769065863', 'Jln. Pantai Tanjung Bias, Senteluk, Batu Layar, Kota Mataram, Nusa Tenggara Bar. 83355', 'F379+G5 Senteluk, West Lombok Regency, West Nusa Tenggara', 'Batu Layar', '', 'Pantai', 'Lombok Barat'),
(129, 'Pantai Batu Layar', '-8.53504351868568', '116.06780742513126', 'Senteluk, Batu Layar, West Lombok Regency, West Nusa Tenggara', 'F379+X4 Senteluk, West Lombok Regency, West Nusa Tenggara', 'Batu Layar', '', 'Pantai', 'Lombok Barat'),
(130, 'Pantai Kampung Nelayan', '-8.533617752475287', '116.06774200681025', 'Jl. Nelayan, Senteluk, Batu Layar, Kabupaten Lombok Barat, Nusa Tenggara Bar.', 'F389+F4 Senteluk, West Lombok Regency, West Nusa Tenggara', 'Batu Layar', '', 'Pantai', 'Lombok Barat'),
(131, 'Pantai Montong', '-8.531246441057766', '116.06752165063176', 'Montong, Senteluk, Batu Layar, Kabupaten Lombok Utara, Nusa Tenggara Bar.', 'F398+FX Senteluk, West Lombok Regency, West Nusa Tenggara', 'Batu Layar', '', 'Pantai', 'Lombok Barat'),
(135, 'Bukit Merese', '-8.914504556055716', '116.32005353213071', 'Jl. Kuta Lombok, Kuta, Pujut, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83573', '38PC+52 Kuta, Central Lombok Regency, West Nusa Tenggara', 'Pujut', '', 'Bukit', 'Lombok Tengah'),
(136, 'Bukit Kekep', '-8.904608813976823', '116.35301967374562', 'Bukit Kekep, Mertak, Pujut, Central Lombok Regency, West Nusa Tenggara', 'Mertak, Pujut, Kabupaten Lombok Tengah, Nusa Tenggara Bar.', 'Pujut', '', 'Bukit', 'Lombok Tengah'),
(137, 'Bukit Mongkel', '-8.48956217740913', '116.52592610656643', 'Beririjarak, Karang Baru, Wanasaba, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83658', 'GG6G+49 Karang Baru, East Lombok Regency, West Nusa Tenggara', 'Wanasaba', '', 'Bukit', 'Lombok Timur'),
(138, 'Bukit Tembolak', '-8.487103053327598', '116.52775923200056', 'Beririjarak, Karang Baru, Wanasaba, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83658\r\n', 'GG7H+53 Karang Baru, East Lombok Regency, West Nusa Tenggara', 'Wanasaba', '', 'Bukit', 'Lombok Timur'),
(140, 'Bukit Kondo', '-8.435234811577539', '116.5170267104047', 'Jl. Wisata Gn. Rinjani, Sembalun Lawang, Sembalun, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83656', 'HG78+VR Sembalun Lawang, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(141, 'Propok Savana', '-8.433596358989924', '116.51435875905463', 'Sembalun Lawang, Sembalun, East Lombok Regency, West Nusa Tenggara 83656', 'Sembalun Lawang, Sembalun, East Lombok Regency, West Nusa Tenggara 83656', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(142, 'Bukit Nanggi', '-8.391336064737738', '116.57351615175594', 'Sembalun, Sambelia, Selong, Nusa Tenggara Bar. 83666', 'JH5F+C9 Sambelia, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(143, 'Bukit Sempana', '-8.389584', '116.5792293', 'Jalan Raya Sembalun Bumbung, Sambelia, Sembalun Bumbung, Kabupaten Lombok Timur, Nusa Tenggara Bar\r\n', 'Sambelia, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(144, 'Bukit Monjet', '-8.379944397760774', '116.54788133281454', 'Sembalun Bumbung, Sembalun, East Lombok Regency, West Nusa Tenggara 83656', 'JG9X+X5 Sembalun Bumbung, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(145, 'Bukit Tangkok', '-8.3684022', '116.5382356', 'Sembalun Lawang, Sembalun, Sembalun Lawang, Sembalun, Kabupaten Lombok Timur, Nusa Tenggara Bar', 'JGJR+J5 Sembalun Lawang, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(146, 'Bukit Selong', '-8.3640592', '116.538192', 'Sembalun Lawang, Sembalun, East Lombok Regency, West Nusa Tenggara 83656', 'Sembalun Lawang, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(147, 'Bukit Anak Dara', '-8.3640383', '116.5584134', 'Sembalun Lawang, Sembalun, Selong, Nusa Tenggara Bar. 83666', 'Sembalun Lawang, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(148, 'Bukit Pergasingan', '-8.3454136', '116.5308605', 'Sembalun Lawang, Sembalun, Sembalun Lawang, Sembalun, East Lombok Regency, West Nusa Tenggara', 'Sembalun Lawang, East Lombok Regency, West Nusa Tenggara', 'Sembalun', '', 'Bukit', 'Lombok Timur'),
(234, 'Pantai Kerandangan 1', '-8.489101', '116.0345789', 'Jl. Raya Senggigi, Pemenang Bar., Pemenang, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83352', '', 'Lingsar', '', 'Pantai', 'Lombok Barat'),
(235, 'Pantai Kerandangan 2', '8.4849899', '116.0325224', 'Jl. Raya Senggigi, Senggigi,Kabupaten Lombok Barat, Nusa Tenggara Bar.', '', 'Batu Layar', '', 'Pantai', 'Lombok Barat'),
(236, 'Pantai Klui', '-8.4662738', '116.0349154', 'Malaka, Pemenang, North Lombok Regency, West Nusa Tenggara', '', '', '', 'Pantai', ''),
(237, 'Air Terjun Tibu Ijo', '-8.4933665', '116.1032595', 'Kekait, Gunung Sari, West Lombok Regency, West Nusa Tenggara 83351', '', '', '', 'Air Terjun', ''),
(238, 'Air Terjun Mangku Sakti', '-8.3183535', '116.4659967', 'Sambik Elen, Bayan, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83354', '', '', '', 'Air Terjun', ''),
(239, 'Air Terjun Sendang Gile', '-8.3013626', '116.4052316', 'Senaru, Bayan, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83354', '', '', '', 'Air Terjun', ''),
(240, 'Air Terjun Jeruk manis', '-8.5154529', '116.4218347', 'Kembang Kuning, Sikur, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83662', '', '', '', 'Air Terjun', ''),
(241, 'Air Terjun Babak Pelangi', '-8.54587', '116.3297025', 'Lantan, Batukliang Utara, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83552', '', '', '', 'Air Terjun', ''),
(242, 'Air Terjun Lembah Sriti', '-8.5471997', '116.3309374', 'Lantan, Batukliang Utara, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83552', '', '', '', 'Air Terjun', ''),
(243, 'Air Terjung Benang Setukel', '-8.5330505', '116.3391815', 'Aik Berik, Batukliang Utara, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83552', '', '', '', 'Air Terjun', ''),
(244, 'Air Terjun Benang Kelambu', '-8.5324278', '116.3348179', 'Desa, Aik Berik, Batukliang Utara, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83552', '', '', '', 'Air Terjun', ''),
(245, 'Air Terjun Kelewon', '-8.5338409', '116.3375823', 'Aik Berik, North Batukliang, Central Lombok Regency, West Nusa Tenggara 83552', '', '', '', 'Air Terjun', ''),
(246, 'Air Terjun Segenter', '-8.4937235', '116.2934777', 'Lebah Sempage, Narmada, Kabupaten Lombok Barat, Nusa Tenggara Bar. 83552', '', '', '', 'Air Terjun', ''),
(247, 'Air Terjun Sesere', '-8.5341489', '116.3367189', 'Aik Berik, Batukliang Utara, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83552', '', '', '', 'Air Terjun', ''),
(248, 'Air Terjun Tiu Sekeper', '-8.3586981', '116.3181963', 'Santong, Kayangan, North Lombok Regency, West Nusa Tenggara 83353', '', '', '', 'Air Terjun', ''),
(249, 'Air Terjun Tiu Pupus', '-8.3397401', '116.2165472', 'Genggelang, Gangga, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83353', '', '', '', 'Air Terjun', ''),
(250, 'Air Terjun Tiu Timponan', '-8.5202969', '116.1997184', 'Batu Mekar, Lingsar, Kabupaten Lombok Barat, Nusa Tenggara Bar. 83371', '', '', '', 'Air Terjun', ''),
(251, 'Air Terjun Tiu Pituq', '8.3400549', '116.2165895', 'Genggelang, Gangga, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83353', '', '', '', 'Air Terjun', ''),
(252, 'Air Terjun Tibu Atas', '-8.5404537', '116.22749', 'Sesaot, Narmada, Kabupaten Lombok Barat, Nusa Tenggara Bar. 83371', '', '', '', 'Air Terjun', ''),
(253, 'Air Terjun Tibu Bunter', '-8.5362181', '116.2576645', 'Jln. Suranadi II, Sesaot, Sesaot, Narmada, Nusa Tenggara Bar. 83371', '', '', '', 'Air Terjun', ''),
(254, 'Air Terjun Aiq Kelep', '-8.504493', '116.1738733', 'Langko, Lingsar, Kabupaten Lombok Barat, Nusa Tenggara Bar. 83371', '', 'Lingsar', '', 'Air Terjun', 'Lombok Barat');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` varchar(4) NOT NULL,
  `name_kabupaten` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `name_kabupaten`) VALUES
('KAB1', 'Mataram'),
('KAB2', 'Lombok Tengah'),
('KAB3', 'Lombok Timur'),
('KAB4', 'Lombok Utara'),
('KAB5', 'Lombok Barat');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `name_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `name_kategori`) VALUES
('Cat1', 'Pantai'),
('Cat2', 'Gunung'),
('Cat3', 'Bukit'),
('Cat4', 'Air Terjun');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(5) NOT NULL,
  `name_kecamatan` varchar(20) NOT NULL,
  `id_kabupaten` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `name_kecamatan`, `id_kabupaten`) VALUES
('LBT1', 'Gerung', 'KAB5'),
('LBT10', 'Kuripan', 'KAB5'),
('LBT2', 'Kediri', 'KAB5'),
('LBT3', 'Narmada', 'KAB5'),
('LBT4', 'Sekotong', 'KAB5'),
('LBT5', 'Labu Api', 'KAB5'),
('LBT6', 'Gunung Sari', 'KAB5'),
('LBT7', 'Lingsar', 'KAB5'),
('LBT8', 'Lembar', 'KAB5'),
('LBT9', 'Batu Layar', 'KAB5'),
('LTE1', 'Batukliang', 'KAB2'),
('LTE10', 'Praya Timur', 'KAB2'),
('LTE11', 'Pringgarata', 'KAB2'),
('LTE12', 'Pujut', 'KAB2'),
('LTE2', 'Batukliang Utara', 'KAB2'),
('LTE3', 'Janapria', 'KAB2'),
('LTE4', 'Jonggat', 'KAB2'),
('LTE5', 'Kopang', 'KAB2'),
('LTE6', 'Praya Kota', 'KAB2'),
('LTE7', 'Praya Barat', 'KAB2'),
('LTE8', 'Praya Barat Daya', 'KAB2'),
('LTE9', 'Praya Tengah', 'KAB2'),
('LTI1', 'Aikmel', 'KAB3'),
('LTI10', 'Sakra Timur', 'KAB3'),
('LTI11', 'Sakra Barat', 'KAB3'),
('LTI12', 'Sambelia', 'KAB3'),
('LTI13', 'Selong', 'KAB3'),
('LTI14', 'Sembalun', 'KAB3'),
('LTI15', 'Sikur', 'KAB3'),
('LTI16', 'Sukamulia', 'KAB3'),
('LTI17', 'Suralaga', 'KAB3'),
('LTI18', 'Suwela', 'KAB3'),
('LTI19', 'Terara', 'KAB3'),
('LTI2', 'Jerowaru', 'KAB3'),
('LTI20', 'Wanasaba', 'KAB3'),
('LTI3', 'Keruak', 'KAB3'),
('LTI4', 'Labuhan Haji', 'KAB3'),
('LTI5', 'Masbagik', 'KAB3'),
('LTI6', 'Montong Gading', 'KAB3'),
('LTI7', 'Pringgabaya', 'KAB3'),
('LTI8', 'Pringgasela', 'KAB3'),
('LTI9', 'Sakra', 'KAB3'),
('LTU1', 'Bayan', 'KAB4'),
('LTU2', 'Gangga', 'KAB4'),
('LTU3', 'Kayangan', 'KAB4'),
('LTU4', 'Pemenang', 'KAB4'),
('LTU5', 'Tanjung', 'KAB4'),
('MAT1', 'Ampenan', 'KAB1'),
('MAT2', 'Cakranegara', 'KAB1'),
('MAT3', 'Kec.Mataram', 'KAB1'),
('MAT4', 'Sandubaya', 'KAB1'),
('MAT5', 'Sekarbela', 'KAB1'),
('MAT6', 'Selaparang', 'KAB1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_destination`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;