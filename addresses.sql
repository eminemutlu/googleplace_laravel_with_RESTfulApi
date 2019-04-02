-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Nis 2019, 21:40:08
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `googleplace_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `address`, `city`, `state`, `zip`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Airport', 'San Diego International Airport', 'CA', 'US', '92101', '32.7338006', '-117.1933038', '2019-04-01 06:30:22', '2019-04-01 06:30:22'),
(2, 'Civic Center', 'Civic Center San Francisco, California 94102 united states', 'California', 'United States', '94102', '37.7815533', '-122.4156427', '2019-04-01 08:02:15', '2019-04-01 08:02:15'),
(3, 'Eiffel Tower', 'Champ de Mars, 5 Avenue Anatole', 'Paris', 'France', '75007', '48.85837009999999', '2.2944813', '2019-04-02 12:16:34', '2019-04-02 12:16:34'),
(4, 'Eiffel Tower', 'Champ de Mars, 5 Avenue Anatole', 'Paris', 'France', '75007', '48.85837009999999', '2.2944813', '2019-04-02 12:43:21', '2019-04-02 12:43:21'),
(5, 'United States Postal Service', '15642 Sand Canyon Ave', 'Irvine', 'California', '92619', '33.6666992', '-117.767298', '2019-04-02 12:52:37', '2019-04-02 12:52:37');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
