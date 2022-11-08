-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 04:13:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formula1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driverName` varchar(150) COLLATE utf8_unicode_nopad_ci NOT NULL,
  `teamID` int(11) NOT NULL,
  `nationality` varchar(150) COLLATE utf8_unicode_nopad_ci NOT NULL,
  `age` int(11) NOT NULL,
  `victories` int(11) NOT NULL,
  `podiums` int(11) NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_nopad_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_nopad_ci;

--
-- Volcado de datos para la tabla `drivers`
--

INSERT INTO `drivers` (`id`, `driverName`, `teamID`, `nationality`, `age`, `victories`, `podiums`, `image`) VALUES
(1, 'Lando Norris', 1, 'British', 22, 0, 6, './images/uploaded/634c6eb3ac3d44.80855664.png'),
(2, 'Daniel Ricciardo', 1, 'Australian', 33, 8, 32, './images/uploaded/634c823c180b79.07722160.png'),
(3, 'Lewis Hamilton', 2, 'British', 37, 103, 188, './images/uploaded/634c8275d9ba04.80767765.png'),
(4, 'George Russell', 2, 'British', 24, 0, 8, './images/uploaded/634c82a26c1024.35997296.png'),
(5, 'Max Verstappen', 3, 'Dutch', 25, 32, 74, './images/uploaded/634c82d6a51612.34210999.png'),
(6, 'Sergio Pérez', 3, 'Mexican', 32, 4, 24, './images/uploaded/634c82fee42dc5.36915849.png'),
(7, 'Charles Leclerc', 4, 'Monacan', 24, 5, 22, './images/uploaded/634c8365a29281.24373806.png'),
(8, 'Carlos Sainz', 4, 'Spanish', 28, 1, 14, './images/uploaded/634c839a549620.80102495.png'),
(9, 'Fernando Alonso', 5, 'Spanish', 41, 32, 98, './images/uploaded/634c83cb20bef0.52070865.png'),
(10, 'Esteban Ocon', 5, 'French', 26, 1, 2, './images/uploaded/634c83f8c98276.47571162.png'),
(11, 'Pierre Gasly', 6, 'French', 26, 1, 3, './images/uploaded/634c84360d5a56.90360341.png'),
(12, 'Yuki Tsunoda', 6, 'Japanese', 22, 0, 0, './images/uploaded/634c846c678c39.90659114.png'),
(13, 'Sebastian Vettel', 7, 'German', 35, 53, 122, './images/uploaded/634c849c028150.22297023.png'),
(14, 'Lance Stroll', 7, 'Canadian', 23, 0, 3, './images/uploaded/634c84c1b9e832.22143008.png'),
(15, 'Alexander Albon', 8, 'Thai', 26, 0, 2, './images/uploaded/634c84fd5e71d7.93200709.png'),
(16, 'Nicholas Latifi', 8, 'Canadian', 27, 0, 0, './images/uploaded/634c8555d5c6e4.76276403.png'),
(17, 'Valtteri Bottas', 9, 'Finnish', 33, 10, 67, './images/uploaded/634c85907470d5.77485150.png'),
(18, 'Guanyu Zhou', 9, 'Chinese', 23, 0, 0, './images/uploaded/634c85ba5ec599.80179933.png'),
(21, 'Mick Schumacher', 12, 'German', 23, 0, 0, './images/uploaded/634c86028ce798.41194447.png'),
(22, 'Kevin Magnussen', 12, 'Danish', 30, 0, 1, './images/uploaded/634c8635ed6c64.95871377.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `teamName` varchar(45) COLLATE utf8_unicode_nopad_ci NOT NULL,
  `teamNationality` varchar(45) COLLATE utf8_unicode_nopad_ci NOT NULL,
  `totalVictories` int(11) NOT NULL,
  `totalPodiums` int(11) NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_nopad_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_nopad_ci;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `teamName`, `teamNationality`, `totalVictories`, `totalPodiums`, `image`) VALUES
(1, 'McLaren Racing Limited', 'British', 183, 487, './images/uploaded/634b2fcde0a0f8.34510127.png'),
(2, 'Mercedes-Benz', 'German', 124, 263, './images/uploaded/634b3003058958.76894201.png'),
(3, 'Red Bull Racing', 'British', 84, 221, './images/uploaded/634b2f3b29f900.26575747.png'),
(4, 'Scuderia Ferrari', 'Italy', 242, 773, './images/uploaded/634b3032568209.32692290.png'),
(5, 'Alpine F1 Team', 'France', 1, 2, './images/uploaded/634b308c421232.25168183.png'),
(6, 'Scuderia Alpha Tauri', 'Italy', 1, 2, './images/uploaded/634b30a773fef5.30577083.png'),
(7, 'Aston Martin', 'British', 0, 1, './images/uploaded/634b312d546669.34003570.png'),
(8, 'Williams Racing', 'British', 114, 302, './images/uploaded/634b3168a06eb1.28575059.png'),
(9, 'Alfa Romeo', 'Swiss', 10, 26, './images/uploaded/634b31b17882c6.89261635.png'),
(12, 'Haas F1 Team', 'American', 0, 0, './images/uploaded/634b31d283dbb8.11054414.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `userName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `password`, `userName`) VALUES
('user@admin.com', '$2y$10$hj/fkkQb4xBI9MEdE8gJAOBHZmsOzA//Hd7JufruNn7vnFLLcZsFu', 'ADMIN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teamID` (`teamID`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
