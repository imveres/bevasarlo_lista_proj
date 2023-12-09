-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 08:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bevasarlo_lista`
--

-- --------------------------------------------------------

--
-- Table structure for table `bevasarlo_listak`
--

CREATE TABLE `bevasarlo_listak` (
  `id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `nev` varchar(99) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bevasarlo_listak`
--

INSERT INTO `bevasarlo_listak` (`id`, `felhasznalo_id`, `nev`, `datum`) VALUES
(9, 1, 'Lista1', '2023-01-01'),
(10, 2, 'Lista2', '2023-01-02'),
(11, 3, 'Lista3', '2023-01-03'),
(12, 5, 'Lista1', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `boltok`
--

CREATE TABLE `boltok` (
  `id` int(11) NOT NULL,
  `nev` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boltok`
--

INSERT INTO `boltok` (`id`, `nev`) VALUES
(1, 'Tesco'),
(2, 'Auchan'),
(3, 'Spar'),
(4, 'Aldi'),
(5, 'Lidl'),
(6, 'Coop'),
(7, 'Egyéb');

-- --------------------------------------------------------

--
-- Table structure for table `egysegek`
--

CREATE TABLE `egysegek` (
  `id` int(11) NOT NULL,
  `nev` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egysegek`
--

INSERT INTO `egysegek` (`id`, `nev`) VALUES
(1, 'kg'),
(2, 'dkg'),
(3, 'g'),
(4, 'db'),
(5, 'liter'),
(6, 'csom');

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(99) NOT NULL,
  `jelszo` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`) VALUES
(5, 'admin', 'admin'),
(6, 'user2', 'jelszo123'),
(7, 'adam', 'Adamka1');

-- --------------------------------------------------------

--
-- Table structure for table `lista_elemek`
--

CREATE TABLE `lista_elemek` (
  `id` int(11) NOT NULL,
  `lista_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `egyseg_id` int(11) NOT NULL,
  `bolt_id` int(11) NOT NULL,
  `statusz` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lista_elemek`
--

INSERT INTO `lista_elemek` (`id`, `lista_id`, `termek_id`, `mennyiseg`, `egyseg_id`, `bolt_id`, `statusz`) VALUES
(9, 1, 1, 1, 1, 1, ''),
(10, 1, 2, 2, 2, 2, ''),
(11, 2, 3, 3, 3, 3, ''),
(12, 2, 4, 4, 4, 1, ''),
(13, 3, 5, 5, 5, 2, ''),
(14, 12, 1, 1, 1, 1, ''),
(15, 12, 4, 1, 1, 1, ''),
(16, 12, 3, 1, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `nev` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termekek`
--

INSERT INTO `termekek` (`id`, `nev`) VALUES
(1, 'Tej'),
(2, 'Tojás'),
(3, 'Kenyér'),
(4, 'Só'),
(5, 'Cukor'),
(6, 'Rizs'),
(7, 'Tészta'),
(8, 'Paradicsom'),
(9, 'Uborka'),
(10, 'Krumpli'),
(11, 'Hagyma'),
(12, 'Fokhagyma'),
(13, 'Alma'),
(14, 'Banán'),
(15, 'Körte'),
(16, 'Szalámi'),
(17, 'Sajt'),
(18, 'Sonka'),
(19, 'Tejföl'),
(20, 'Zsemle'),
(21, 'Liszt'),
(22, 'Csemegekukorica'),
(23, 'Édesburgonya'),
(24, 'Tea'),
(25, 'Kávé'),
(26, 'Csoki'),
(27, 'Ásványvíz'),
(28, 'Üdítő'),
(29, 'Sör'),
(30, 'Bor'),
(31, 'Chips'),
(32, 'Kakaópor'),
(33, 'Fogkrém'),
(34, 'Sampon'),
(35, 'Tusfürdő'),
(36, 'Mosópor'),
(37, 'Mosogatószer'),
(38, 'WC papír'),
(39, 'Szappan'),
(40, 'Papírzsebkendő'),
(41, 'Alufólia'),
(42, 'Fogkefe'),
(43, 'Kanál'),
(44, 'Villa'),
(45, 'Bicikli gumi'),
(46, 'Számológép'),
(47, 'Ceruza'),
(48, 'Toll'),
(49, 'Füzet'),
(50, 'Táskakészítő papír'),
(51, 'Tűzőgép'),
(52, 'Gumikacsa'),
(53, 'Naptej'),
(54, 'Szemüvegtok'),
(55, 'Ajándékcsomagoló papír'),
(56, 'Játékautó'),
(57, 'Labda'),
(58, 'Képeslap'),
(59, 'Matrac'),
(60, 'Törölköző'),
(61, 'Napszemüveg'),
(62, 'Hűtőszekrény'),
(63, 'Mikrohullámú sütő'),
(64, 'Laptop'),
(65, 'Okostelefon'),
(66, 'Televízió'),
(67, 'Fényképezőgép'),
(68, 'Porszívó'),
(69, 'Vasaló'),
(70, 'Elektromos fűtőtest'),
(71, 'Asztali lámpa'),
(72, 'Kerti virág'),
(73, 'Kerti törpe'),
(74, 'Grill'),
(75, 'Hálózsák'),
(76, 'Túrabot'),
(77, 'Esőkabát'),
(78, 'Sátor'),
(79, 'Horgászfelszerelés'),
(80, 'Téli sapka'),
(81, 'Boxer alsónadrág'),
(82, 'Távirányítós helikopter'),
(83, 'Puzzle játék'),
(84, 'Mini robot'),
(85, 'Bluetooth hangszóró'),
(86, 'Pendrive'),
(87, 'Eco táska'),
(88, 'Edzőcipő'),
(89, 'Túrabakancs'),
(90, 'Gyertya'),
(91, 'Parfüm'),
(92, 'Női borotva'),
(93, 'Sportcipő'),
(94, 'Fitness labda'),
(95, 'Hátizsák'),
(96, 'Túrabicikli'),
(97, 'Kemping szék'),
(98, 'Kemping asztal'),
(99, 'Boros pohár'),
(100, 'Törésgátló boros pohár');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bevasarlo_listak`
--
ALTER TABLE `bevasarlo_listak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_id`);

--
-- Indexes for table `boltok`
--
ALTER TABLE `boltok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egysegek`
--
ALTER TABLE `egysegek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lista_elemek`
--
ALTER TABLE `lista_elemek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bolt_id` (`bolt_id`),
  ADD KEY `egyseg_id` (`egyseg_id`),
  ADD KEY `lista_id` (`lista_id`),
  ADD KEY `termek_id` (`termek_id`);

--
-- Indexes for table `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bevasarlo_listak`
--
ALTER TABLE `bevasarlo_listak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `boltok`
--
ALTER TABLE `boltok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `egysegek`
--
ALTER TABLE `egysegek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lista_elemek`
--
ALTER TABLE `lista_elemek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bevasarlo_listak`
--
ALTER TABLE `bevasarlo_listak`
  ADD CONSTRAINT `bevasarlo_listak_ibfk_1` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`id`);

--
-- Constraints for table `lista_elemek`
--
ALTER TABLE `lista_elemek`
  ADD CONSTRAINT `lista_elemek_ibfk_1` FOREIGN KEY (`bolt_id`) REFERENCES `boltok` (`id`),
  ADD CONSTRAINT `lista_elemek_ibfk_2` FOREIGN KEY (`egyseg_id`) REFERENCES `egysegek` (`id`),
  ADD CONSTRAINT `lista_elemek_ibfk_3` FOREIGN KEY (`lista_id`) REFERENCES `bevasarlo_listak` (`id`),
  ADD CONSTRAINT `lista_elemek_ibfk_4` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
