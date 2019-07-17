-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2018 a las 18:25:20
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_entry`
--

CREATE TABLE `book_entry` (
  `id` int(10) UNSIGNED NOT NULL,
  `register_quantity` varchar(45) NOT NULL DEFAULT '',
  `available` int(1) NOT NULL DEFAULT '1',
  `book_name` varchar(200) NOT NULL DEFAULT '',
  `author_name` varchar(100) NOT NULL DEFAULT '',
  `book_language` varchar(45) NOT NULL DEFAULT '',
  `book_price` varchar(45) NOT NULL DEFAULT '',
  `book_isbn_number` varchar(200) NOT NULL DEFAULT '',
  `book_edition` varchar(45) NOT NULL DEFAULT '',
  `book_registration_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book_entry`
--

INSERT INTO `book_entry` (`id`, `register_quantity`, `available`, `book_name`, `author_name`, `book_language`, `book_price`, `book_isbn_number`, `book_edition`, `book_registration_time`) VALUES
(1, '1', 1, 'El gran Gatsby\r\n', ' F. Scott Fitzgerald', 'English', '980', '1748975864585854', '1st', '2016-01-23 15:24:21'),
(2, '1', 1, 'Las uvas de la ira 1\r\n', 'John Steinbeck', 'English', '1540', '546987584785874', '4th', '2016-01-23 15:25:07'),
(3, '1', 1, '1984', 'George Orwell', 'English', '987', '5487595864885758', '6th', '2016-01-23 15:25:36'),
(4, '2', 1, 'Ulysses', 'James Joyce', 'English', '2000', '4758969887', 'Unknow', '2016-01-23 15:26:22'),
(5, '2', 1, 'Ulysses', 'James Joyce', 'English', '2000', '4758969887', 'Unknow', '2016-01-23 15:26:22'),
(6, '1', 1, 'Lolita', 'Vladimir Nabokov', 'English', '995', '47587898587', 'Unknow', '2016-01-23 15:26:56'),
(7, '1', 1, '.NET Framework', 'Brad Abrams', 'English', '890', '457845875844', 'Unknow', '2016-01-23 15:29:46'),
(8, '1', 1, 'Estructura de la computadora\r\n', 'Harold Abelson ', 'English', '1278', '989898585867', '5th', '2016-01-23 15:31:01'),
(9, '1', 1, 'Introducción a Algoritmos\r\n', 'Thomas H. ', 'English', '2090', '25454854758457', '4th', '2016-01-23 15:33:07'),
(10, '1', 1, 'Análisis de datos y modelado\r\n', 'Arun Bh. Khanal', 'English', '1450', '45789858475', '4th', '2016-01-23 15:34:33'),
(11, '1', 1, 'Programación de PHP\r\n', 'Adam Khoury', 'English', '879', '578475879887', '5th', '2016-01-23 15:35:46'),
(12, '1', 1, 'Core Java', 'Harold Abelson ', 'English', '9878', '748575896978', 'Unknow', '2016-01-23 15:37:14'),
(13, '1', 1, 'Head First Java', 'Sierra', 'English', '878', '45747485855855', '2nd', '2016-01-23 15:39:17'),
(14, '1', 1, 'Programación en C\r\n', 'Arsan d. Franco', 'English', '978', '45124152547', '4th', '2016-01-23 15:42:04'),
(15, '1', 1, 'Matemáticas adicionales\r\n', 'Jayanta , Annta Acharya', 'English', '450', '47584587588', 'Unknow', '2016-01-23 15:43:37'),
(16, '1', 1, 'Hombres de Matemáticas\r\n', 'Eric Temple Bell ', 'English', '857', '457847585856', '5th', '2016-01-23 15:44:42'),
(17, '1', 1, 'Una historia de Pi\r\n', 'Petr Beckmann ', 'English', '980', '4578475878985', 'Unknow', '2016-01-23 15:45:27'),
(18, '1', 1, 'Nepali', 'Punya Subedi', 'Nepali', '500', '457487584578', '2nd', '2016-01-23 15:46:45'),
(19, '1', 1, 'Sociología', 'Framax Alren', 'English', '640', '45875878958755', 'Unknow', '2016-01-23 15:48:03'),
(20, '1', 1, 'Computadora Arc. Y microprocesador\r\n', 'Arun Sir', 'English', '590', '457485612454', 'Unknow', '2016-01-23 15:49:03'),
(21, '1', 1, 'Matematica I', 'Ricardo Figueroa', 'English', '200', '2142E', '5th', '2018-01-30 19:19:20'),
(22, '1', 1, ' Ecuaciones', ' Eduardo Espinoza Ramos', 'English', '200', '04d2j', '2nd', '2018-01-30 19:23:48'),
(23, '1', 0, 'las aventuras de El cid campeador', 'don quijote', 'English', '200', 'gsd23s', '2nd', '2018-01-31 20:16:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_transaction`
--

CREATE TABLE `book_transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` varchar(100) NOT NULL DEFAULT '',
  `book_id` varchar(45) NOT NULL DEFAULT '',
  `issue_time` date NOT NULL DEFAULT '0000-00-00',
  `return_time` date NOT NULL DEFAULT '0000-00-00',
  `return_book` int(11) NOT NULL DEFAULT '0',
  `remove_details` int(1) NOT NULL DEFAULT '0',
  `renew_count` int(3) NOT NULL DEFAULT '0',
  `RenewAfterDaysOfIssue` varchar(1000) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book_transaction`
--

INSERT INTO `book_transaction` (`id`, `member_id`, `book_id`, `issue_time`, `return_time`, `return_book`, `remove_details`, `renew_count`, `RenewAfterDaysOfIssue`) VALUES
(1, '7255', '1', '2018-01-31', '2018-01-30', 1, 0, 0, '0'),
(2, '26201', '21', '2018-01-30', '2018-01-30', 1, 0, 1, '0'),
(3, '26201', '22', '2018-01-30', '2018-02-01', 1, 0, 1, '0'),
(4, '27172', '23', '2018-01-31', '0000-00-00', 0, 0, 1, '0'),
(5, '27172', '21', '2018-02-01', '2018-01-31', 1, 0, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fine`
--

CREATE TABLE `fine` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_fine_receive` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `total_mem` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fine`
--

INSERT INTO `fine` (`id`, `total_fine_receive`, `total_mem`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `member_entry`
--

CREATE TABLE `member_entry` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  `issue_book` varchar(100) NOT NULL,
  `firstname` varchar(45) NOT NULL DEFAULT '',
  `middlename` varchar(45) NOT NULL DEFAULT '',
  `lastname` varchar(45) NOT NULL DEFAULT '',
  `faculty` varchar(45) NOT NULL,
  `program` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `batch` varchar(6) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT '',
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `country` varchar(45) NOT NULL DEFAULT '',
  `district` varchar(45) NOT NULL DEFAULT '',
  `city` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `register_time` varchar(45) NOT NULL DEFAULT '',
  `member_fine` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `member_entry`
--

INSERT INTO `member_entry` (`id`, `unique_id`, `issue_book`, `firstname`, `middlename`, `lastname`, `faculty`, `program`, `semester`, `batch`, `gender`, `dob`, `country`, `district`, `city`, `email`, `phone`, `register_time`, `member_fine`) VALUES
(1, '1181', '', 'Jans', '', 'Mendieta', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1995-03-12', 'Nepal', 'Jhapa', 'Maitidevi', 'hariupreti679@gmail.com', '9817926015', '2016-01-23 14:06:09', 0),
(2, '2755', '', 'Eduardo', '', 'Lara', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1998-03-12', 'Nepal', 'Jhapa', 'Putalisadak', 'dikendra@gmail.com', '9818965605', '2016-01-23 14:07:09', 0),
(3, '3652', '', 'Robin', 'Raj', 'Merison', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1996-03-12', 'Nepal', 'Unknow', 'Gyaneshor', 'shubha@gmail.com', '9817926015', '2016-01-23 14:09:36', 0),
(4, '4374', '', 'Jhojan', '', 'Pandey', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1996-03-12', 'Nepal', 'Kathmandu', 'Kalanki', 'sojal@gmail.com', '9840011084', '2016-01-23 14:30:24', 0),
(5, '5847', '', 'Wilbert', '', 'Mendoza', 'Administracion', 'BCIS', 'iv', '2013', 'Femenino', '1994-03-12', 'Nepal', 'Kabre', 'Baneshor', 'punam@gmail.com', '9813799096', '2016-01-23 14:31:52', 0),
(6, '6217', '', 'Eliz', '', 'Martekey', 'Administracion', 'BCIS', 'iv', '2013', 'Femenino', '1996-03-17', 'Nepal', 'unknow', 'Ktm', 'rumani@gmail.com', '4444444444', '2016-01-23 14:32:56', 0),
(7, '7255', '', 'Sara', 'Thapa', 'Bernigan', 'Administracion', 'BCIS', 'iv', '2013', 'Femenino', '1995-03-15', 'Nepal', 'unknown', 'unknown', 'sanjeeta@gmail.com', '8888888888', '2016-01-23 14:37:01', 0),
(8, '8856', '', 'Samuel', '', 'Birbidon', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1996-01-04', 'Nepal', 'unknown', 'unknown', 'sajan@gmail.com', '7777777777', '2016-01-23 14:38:20', 0),
(9, '9116', '', 'Darwin', '', 'Paucar', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1994-01-06', 'Nepal', 'unknown', 'unknown', 'pukar@gmail.com', '5555555555', '2016-01-23 14:40:14', 0),
(11, '11788', '', 'Neptali', '', 'Salas', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1985-04-15', 'Nepal', 'unknown', 'unknown', 'harry@gmail.com', '1111111111', '2016-01-23 14:42:19', 0),
(12, '12764', '', 'Yeison', '', 'Acharya', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1999-01-05', 'Nepal', 'unknown', 'unknown', 'bipin@gmail.com', '1234567891', '2016-01-23 14:43:12', 0),
(13, '13826', '', 'Charles', '', 'Dunkerke', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '2000-02-06', 'Nepal', 'unknown', 'unknown', 'samir@gmail.com', '1010111010', '2016-01-23 14:44:35', 0),
(14, '14180', '', 'Juan', 'Krishna', 'Benish', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '2000-02-03', 'Nepal', 'unknown', 'Ktm', 'shyam@gmail.com', '1212121212', '2016-01-23 14:45:28', 0),
(15, '15890', '', 'Bill', '', 'gate', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '2000-01-03', 'Nepal', 'Ilam', 'Ilam', 'arpan@gmail.com', '1241425241', '2016-01-23 14:46:20', 0),
(16, '16957', '', 'Steev', '', 'Joobs', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '2000-02-05', 'Other', 'unknown', 'unknown', 'rupesh@gmail.com', '2323252525', '2016-01-23 14:48:45', 0),
(17, '17462', '', 'Mark', '', 'Sacarias', 'Administracion', 'BCIS', 'iv', '2013', 'Femenino', '1984-03-27', 'Nepal', 'unknown', 'unknown', 'shristi@gmail.com', '4745858585', '2016-01-23 14:50:38', 0),
(18, '18397', '', 'Teylord', '', 'Springfild', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1999-02-04', 'Nepal', 'unknown', 'Ktm', 'harish@gmail.com', '2525265425', '2016-01-23 14:51:33', 0),
(19, '19189', '', 'Cesar', 'Kumar', 'Navas', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1999-01-04', 'Nepal', 'unknown', 'unknown', 'nischal@gmail.com', '2425252525', '2016-01-23 14:52:28', 0),
(20, '20356', '', 'Bader', '', 'Canahuati', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1999-01-06', 'Nepal', 'unknown', 'unknown', 'rajesh@gmail.com', '1241525252', '2016-01-23 14:53:12', 0),
(21, '21185', '', 'Marcus', '', 'Hildebrant', 'Administracion', 'BCIS', 'iv', '2013', 'Femenino', '1985-02-17', 'Nepal', 'unknown', 'unknown', 'punam@gmail.com', '7485785878', '2016-01-23 14:54:25', 0),
(22, '22627', '', 'Julian', '', 'Ferrer', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1995-01-05', 'Nepal', 'unknown', 'unknown', 'pradip@gmail.com', '2545784785', '2016-01-23 14:56:12', 0),
(23, '23823', '', 'Jasmina', '', 'Fonseca', 'Administracion', 'BCIS', 'iv', '2013', 'Femenino', '1995-05-25', 'Nepal', 'unknown', 'unknown', 'rasmila@gmail.com', '2547856987', '2016-01-23 14:57:02', 0),
(24, '24672', '', 'Esther', '', 'Gutierres', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '2000-02-04', 'Nepal', 'unknown', 'unknown', 'bijay@gmail.com', '4685759878', '2016-01-23 14:58:22', 0),
(25, '25501', '', 'Erwin', '', 'Valle', 'Administracion', 'BCIS', 'iv', '2013', 'Masculino', '1995-12-25', 'Nepal', 'unknown', 'unknown', 'pravash@gmail.com', '8758758475', '2016-01-23 14:59:11', 0),
(26, '26201', '', 'Richard', 'soria', 'Baily', 'Ciencia', 'BBA', 'iii', '2012', 'Masculino', '1998-02-03', 'Other', 'Chiapas', 'CUZCO', 'ricardocorazondeleon2018@gmail.com', '9324354652', '2018-01-30 19:17:27', 0),
(27, '27172', '23', 'Jorge', 'Gonzales', 'Saavedra', 'Management', 'BBA', 'ii', '2011', 'Male', '1999-11-11', 'Other', 'sansebastian', 'cuzco', 'mikasajeaguerqc1990@gmail.com', '9323445233', '2018-01-31 20:18:15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(1000) NOT NULL DEFAULT '',
  `note_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`id`, `Title`, `note`, `note_time`) VALUES
(1, 'esta semana no llegaran libros', 'Por circunstancia de tramites esta semana no se compraran mas libros', '2018-01-30 19:25:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security`
--

CREATE TABLE `security` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `security`
--

INSERT INTO `security` (`id`, `password`) VALUES
(1, 'admin'),
(2, 'computer'),
(3, 'admin'),
(4, 'computer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `fine_after_day` int(10) UNSIGNED NOT NULL DEFAULT '15',
  `per_day_fine` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `take_book_at_once` int(11) NOT NULL DEFAULT '3',
  `institution_name` varchar(45) NOT NULL DEFAULT '',
  `header_color` varchar(45) NOT NULL DEFAULT '',
  `font_color` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `setting`
--

INSERT INTO `setting` (`id`, `fine_after_day`, `per_day_fine`, `take_book_at_once`, `institution_name`, `header_color`, `font_color`) VALUES
(1, 15, 1, 3, 'COLEGIO', '#255f9f', '#ffffff'),
(2, 15, 1, 3, 'COLEGIO', '#255f9f', '#ffffff');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book_entry`
--
ALTER TABLE `book_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `book_transaction`
--
ALTER TABLE `book_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `member_entry`
--
ALTER TABLE `member_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book_entry`
--
ALTER TABLE `book_entry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `book_transaction`
--
ALTER TABLE `book_transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fine`
--
ALTER TABLE `fine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `member_entry`
--
ALTER TABLE `member_entry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `security`
--
ALTER TABLE `security`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
