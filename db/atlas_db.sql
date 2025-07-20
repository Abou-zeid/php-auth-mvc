-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 03:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atlas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime(6) DEFAULT NULL,
  `dateCreated` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `reset_token`, `reset_expires`, `dateCreated`) VALUES
(6, 'Muazu Abu-zayd', 'abuzaydmuazu@gmail.com', '$2y$10$mMGeuN93aFoTrYHibnU3XuWVCiQJP7e4tlW6kgktX6umCw3Xg7A/e', 'Inactive', NULL, '2025-03-28 12:40:59.000000', '2025-03-16 12:57:16.473726'),
(10, ' ', '', '$2y$10$aNYB7x55ZcuEcOX4ygGzI.uvwnSOjC1sJP5yt2q6uwkLhJ8NL8WpO', 'Inactive', 'e8501f64b8a54e313d8424c4d9cb9ec38c818cc43bb0e6ed49d4433e4e4d8340', NULL, '2025-03-27 11:11:52.656128'),
(11, 'Muazu Abu-zayd', 'abuzaydmuazu1@gmail.com', '$2y$10$xu4x1v.S2qYvxQy6owNL/.WoOmM.4PkrayMfmWfvm6DX4DFBiyccy', 'Inactive', NULL, NULL, '2025-03-27 11:12:39.029821'),
(13, 'Muazu Abu-zayd', 'abuzaydmuazu2@gmail.com', '$2y$10$q34PcwYrTVKP50s8jzaL4eNiunn6S8FaX5AxrLYdE0qwCCP..jSQG', 'Inactive', NULL, NULL, '2025-03-27 11:13:32.878156'),
(14, 'Isah Maryam', 'misah@gmail.com', '$2y$10$3km0ACloAwt/1DBQgYpEOOd5idj4gk7jrLdkkgVrSe6ljxTTBeGd6', 'Inactive', NULL, NULL, '2025-03-27 11:14:38.356911'),
(15, 'Ibrahim Zahira', 'zahiratuabubakar@gmail.com', '$2y$10$EabLFLmdATQ86OwvVAHf7Oums9l79kFtv6i9D8ZZbJpuPTlUV9ZHi', 'Inactive', '3e90b06c69b17e1d3098e08548a6521cd0f3058b9f1d06e58616872b3bb8ab1e', NULL, '2025-03-27 13:44:21.809334'),
(16, 'Inuwa Barambu Bashir', 'bbarambu11@gmail.com', '$2y$10$43Z2EsHj2j12Odgb70HDXOh8GHu0ikgiRqi0ORKznk4J.rmrFB.SG', 'Inactive', NULL, '2025-05-12 19:00:47.000000', '2025-05-12 16:59:33.245407');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
