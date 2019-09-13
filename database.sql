-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2019 a las 21:57:08
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokemon_db`
--
CREATE DATABASE pokemon_db;
use pokemon_db;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` varchar(60) NOT NULL,
  `abilities` varchar(60) NOT NULL,
  `tier` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `image`, `name`, `type`, `abilities`, `tier`) VALUES
(2, 'https://www.smogon.com/dex/media/sprites/xy/abomasnow.gif', 'Abomasnow', 'Grass/Ice', 'Snow Warning/Soundproof', 'PU'),
(3, 'https://www.smogon.com/dex/media/sprites/xy/abra.gif', 'Abra', 'Psychic', 'Inner Focus/Magic Guard/Synchronize', 'LC'),
(4, 'https://www.smogon.com/dex/media/sprites/xy/kadabra.gif', 'Kadabra', 'Psychic', 'Inner Focus/Magic Guard/Synchronize', ''),
(5, 'https://www.smogon.com/dex/media/sprites/xy/alakazam.gif', 'Alakazam', 'Psychic', 'Inner Focus/Magic Guard/Synchronize', 'UUBL'),
(7, 'https://www.smogon.com/dex/media/sprites/xy/absol.gif', 'Absol', 'Dark', 'Justified/Pressure/Super Luck', 'PU'),
(8, 'https://www.smogon.com/dex/media/sprites/xy/accelgor.gif', 'Accelgor', 'Bug', 'Hydration/Sticky Hold/Unburden', 'NU'),
(9, 'https://www.smogon.com/dex/media/sprites/xy/aegislash.gif', 'Aegislash', 'Steel/Ghost', 'Stance Change', 'UBER'),
(10, 'https://www.smogon.com/dex/media/sprites/xy/aegislash-blade.gif', 'Blade', 'Steel/Ghost', 'Stance Change', 'UBER'),
(11, 'https://www.smogon.com/dex/media/sprites/xy/aerodactyl.gif', 'Aerodactyl', 'Rock/Flying', 'Pressure/Rock Head/Unnerve', 'NU'),
(12, 'https://www.smogon.com/dex/media/sprites/xy/arceus.gif', 'Arceus', 'Normal', 'Multitype', 'UBER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
