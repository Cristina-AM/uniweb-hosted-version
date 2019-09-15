-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11 Sep 2018 la 22:52
-- Versiune server: 5.6.39-83.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kryssa_uniwebro_db`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `functii`
--

CREATE TABLE `functii` (
  `Idf` int(11) NOT NULL,
  `nume_functie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `functii`
--

INSERT INTO `functii` (`Idf`, `nume_functie`) VALUES
(1, 'administrator'),
(2, 'cadru_didactic'),
(3, 'student');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `mesaje`
--

CREATE TABLE `mesaje` (
  `Id_mesaj` int(11) NOT NULL,
  `Id_expeditor` int(11) NOT NULL,
  `Id_destinatar` int(11) NOT NULL,
  `mesaj` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `mesaj_citit` tinyint(1) NOT NULL DEFAULT '0',
  `mesaj_salvat` tinyint(1) NOT NULL DEFAULT '0',
  `data_expedierii` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `mesaje`
--

INSERT INTO `mesaje` (`Id_mesaj`, `Id_expeditor`, `Id_destinatar`, `mesaj`, `mesaj_citit`, `mesaj_salvat`, `data_expedierii`) VALUES
(1, 2, 2, 'THVjcmFyZSBkZSBsaWNlbnRh', 1, 0, '2018-09-04 22:54:39'),
(2, 2, 1, 'THVjcmFyZSBkZSBsaWNlbnRh', 1, 0, '2018-09-04 22:56:05'),
(3, 3, 2, 'dGVzdA==', 1, 0, '2018-09-08 16:42:48'),
(4, 3, 3, 'dGVzdA==', 1, 0, '2018-09-08 17:18:26'),
(5, 1, 2, 'SGV5', 1, 0, '2018-09-08 18:21:12'),
(6, 2, 1, 'SGVsbG8=', 1, 0, '2018-09-08 18:22:43');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `uploads`
--

CREATE TABLE `uploads` (
  `Id_upload` int(11) NOT NULL,
  `nume_fisier` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `url_upload` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `adaugat_de` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `uploads`
--

INSERT INTO `uploads` (`Id_upload`, `nume_fisier`, `url_upload`, `adaugat_de`) VALUES
(1, 'uniscript.zip', 'http://www.uni-web.ro/uploads/uniscript.zip', 1),
(2, 'div.gif', 'http://www.uni-web.ro/uploads/div.gif', 1),
(3, 'home.gif', 'http://www.uni-web.ro/uploads/home.gif', 1),
(4, 'uni.ico', 'http://www.uni-web.ro/uploads/uni.ico', 1),
(5, 'divider01.gif', 'http://www.uni-web.ro/uploads/divider01.gif', 1),
(6, 'licentaMc.docx', 'http://www.uni-web.ro/uploads/licentaMc.docx', 1),
(7, '2015.10.15 cerere pt aprobare ', 'http://www.uni-web.ro/uploads/2015.10.15 cerere pt aprobare lucrare lic.pdf', 1),
(8, '2015.10.15 cerere inscriere ex', 'http://www.uni-web.ro/uploads/2015.10.15 cerere inscriere examen licenta-disertatie iulie 2016 .pdf', 1),
(9, 'main-index-sm.png', 'http://www.uni-web.ro/uploads/main-index-sm.png', 1),
(10, 'main-index-md.png', 'http://www.uni-web.ro/uploads/main-index-md.png', 1),
(11, 'licenta.pdf', 'http://www.uni-web.ro/uploads/licenta.pdf', 1),
(12, 'Prezentare_licenta_Mc.pdf', 'http://www.uni-web.ro/uploads/Prezentare_licenta_Mc.pdf', 1),
(13, 'Prezentare_licenta_Mc.pptx', 'http://www.uni-web.ro/uploads/Prezentare_licenta_Mc.pptx', 1),
(14, 'public_html.zip', 'http://www.uni-web.ro/uploads/public_html.zip', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `utilizatori`
--

CREATE TABLE `utilizatori` (
  `Id` int(11) NOT NULL,
  `data_inregistrare` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(150) NOT NULL,
  `fotografie_profil` varchar(100) NOT NULL DEFAULT 'http://uni-web.ro/uploads/fotografii/profile.gif',
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `cnp` int(11) NOT NULL,
  `telefon` int(11) NOT NULL,
  `localitate` varchar(100) NOT NULL,
  `data_nasterii` date NOT NULL,
  `gen` varchar(10) NOT NULL,
  `tip_cont` varchar(20) NOT NULL,
  `id_functie` int(11) NOT NULL DEFAULT '3',
  `validat` tinyint(1) NOT NULL DEFAULT '0',
  `conectat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`Id`, `data_inregistrare`, `nume`, `prenume`, `fotografie_profil`, `username`, `email`, `parola`, `cnp`, `telefon`, `localitate`, `data_nasterii`, `gen`, `tip_cont`, `id_functie`, `validat`, `conectat`) VALUES
(1, '2018-08-27 05:00:00', 'Administrator', 'Admin', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Admin', 'admin@uni-web.ro', 'd3b6b232082faa759f72326129c72274', 2900812, 739257021, 'Craiova', '1990-08-12', 'feminin', 'administrator', 1, 1, 1),
(2, '2018-08-27 05:00:00', 'Mociu', 'Cristina Ana-Maria', 'http://uni-web.ro/uploads/fotografii/admin.jpg', 'Cristina', 'mociu.cristina@gmail.com', '18f8549ed58ec196697ba97f1091f70d', 295111708, 735125654, 'Craiova', '1995-11-17', 'feminin', 'administrator', 1, 1, 1),
(3, '2018-08-28 05:00:00', 'Ionescu', 'Alexandru Mihai', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Alexandru', 'alex.mihai@uni-web.ro', '5c92b5124827e5031fda2e6347d729cc', 1354648465, 751514457, 'Craiova', '1994-08-21', 'masculin', 'student', 3, 1, 1),
(6, '2018-09-03 21:44:39', 'Gheorghe', 'Andreea', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Andreea', 'gheorghe.andreea@uni-web.ro', '4297f44b13955235245b2497399d7a93', 2147483647, 876198789, 'Craiova', '1996-07-31', 'feminin', 'contStudent', 3, 0, 0),
(7, '2018-09-03 21:47:59', 'Barbulescu', 'Madalin Ionut', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Madalin', 'madalin@uni-web-ro', '4297f44b13955235245b2497399d7a93', 2147483647, 2147483647, 'Craiova', '1992-12-12', 'masculin', 'contStudent', 3, 0, 0),
(8, '2018-09-03 23:13:39', 'Angelescu', 'Maria Amelia', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Maria', 'maria.amelia@uni-web.ro', '6e9abeea535938c496a261b3b39c0d79', 1266165486, 324146, 'Craiova', '1985-06-05', 'feminin', 'contCD', 2, 1, 0),
(9, '2018-09-03 23:25:25', 'Oprescu', 'Mirela', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Mirela', 'mirela.oprescu@uni-web.ro', '4297f44b13955235245b2497399d7a93', 2147483647, 2147483647, 'Craiova', '1996-05-15', 'feminin', 'contStudent', 3, 0, 0),
(10, '2018-09-03 23:36:31', 'Constantin', 'Robert', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Robert', 'robert@uni-web.ro', '4297f44b13955235245b2497399d7a93', 21845154, 54814684, 'Craiova', '1990-04-11', 'masculin', 'contStudent', 3, 0, 0),
(24, '2018-09-04 14:20:00', 'Gheorghe', 'Marius', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Marius', 'marius@uni-web.ro', '4297f44b13955235245b2497399d7a93', 55455454, 2147483647, 'Craiova', '1990-11-12', 'masculin', 'contStudent', 3, 0, 0),
(25, '2018-09-04 15:55:43', 'Gheorghe', 'uhasiuhx', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'adminaklm', 'klsjnckndc@hiaqwn.com', '4297f44b13955235245b2497399d7a93', 545154, 56415102, 'Craiova', '1990-02-02', 'masculin', 'contStudent', 3, 0, 0),
(26, '2018-09-04 16:10:37', 'Dumitrescu', 'Cristian', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'Cristian', 'cristian@uni-web.ro', '4297f44b13955235245b2497399d7a93', 2147483647, 395964, 'Craiova', '1998-08-09', 'masculin', 'contStudent', 3, 0, 0),
(27, '2018-09-11 19:27:26', 'zgqawdh', 'bhajdb hjwqg', 'http://uni-web.ro/uploads/fotografii/profile.gif', 'ajdak', 'jaknsjka@azhsdj.chajsd', '4297f44b13955235245b2497399d7a93', 65316513, 5415618, 'cujikdnqwu', '1199-11-11', 'masculin', 'contStudent', 3, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `functii`
--
ALTER TABLE `functii`
  ADD PRIMARY KEY (`Idf`);

--
-- Indexes for table `mesaje`
--
ALTER TABLE `mesaje`
  ADD PRIMARY KEY (`Id_mesaj`),
  ADD KEY `Id_expeditor` (`Id_expeditor`),
  ADD KEY `Id_destinatar` (`Id_destinatar`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`Id_upload`),
  ADD KEY `adaugat_de` (`adaugat_de`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_functie` (`id_functie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `functii`
--
ALTER TABLE `functii`
  MODIFY `Idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mesaje`
--
ALTER TABLE `mesaje`
  MODIFY `Id_mesaj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `Id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `mesaje`
--
ALTER TABLE `mesaje`
  ADD CONSTRAINT `destinatarFK` FOREIGN KEY (`Id_destinatar`) REFERENCES `utilizatori` (`Id`),
  ADD CONSTRAINT `expeditorFK` FOREIGN KEY (`Id_expeditor`) REFERENCES `utilizatori` (`Id`);

--
-- Restrictii pentru tabele `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `adugatdeFk` FOREIGN KEY (`adaugat_de`) REFERENCES `utilizatori` (`Id`);

--
-- Restrictii pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD CONSTRAINT `functieFK` FOREIGN KEY (`id_functie`) REFERENCES `functii` (`Idf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
