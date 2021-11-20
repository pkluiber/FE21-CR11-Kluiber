-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Nov 2021 um 17:30
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fswd14_cr11_kluiber_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr11_kluiber_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd14_cr11_kluiber_biglibrary`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pets`
--

CREATE TABLE `pets` (
  `id_pet` int(11) NOT NULL,
  `animal_name` varchar(50) NOT NULL,
  `pet_picture` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `age` date NOT NULL,
  `hobby` varchar(300) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pets`
--

INSERT INTO `pets` (`id_pet`, `animal_name`, `pet_picture`, `address`, `desc`, `age`, `hobby`, `breed`, `fk_user`) VALUES
(4, 'Bella', '61985a1bb1d3e.jpg', 'Webgasse 10', '', '2020-06-02', 'play', 'rauhaardackel', 0),
(7, '', 'product.png', '', '', '0000-00-00', '', '', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `picture` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `phone`, `address`, `picture`, `password`, `status`) VALUES
(1, 'Peter', 'Kluiber', 'peter@kluiber.com', '0664123456', 'Webgasse 10', 'product.png', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'adm'),
(2, 'User', 'Test', 'user@test.com', '0664123456', 'Johannesgasse 124', 'product.png', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id_pet`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pets`
--
ALTER TABLE `pets`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
