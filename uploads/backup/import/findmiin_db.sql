-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2017 at 02:26 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findmiin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'DPpnA4ZQN6DvFNzKfO2QALMZhRrlVRV7', 1, '2016-12-17 07:18:50', '2016-12-17 07:18:50', '2016-12-17 07:18:50'),
(2, 2, 'USMbOXMSwZTmI9ThPPQCNgENalrGzpoZ', 1, '2016-12-17 11:36:22', '2016-12-17 11:36:22', '2016-12-17 11:36:22'),
(3, 3, 'ywW8Ew23f5Y1c8m9Qdv1vZ58SMCisldX', 1, '2016-12-17 12:09:49', '2016-12-17 12:09:49', '2016-12-17 12:09:49'),
(4, 4, 'y42jzR0f7Mjx4UgBQ0JlXKnys3SMrlhj', 1, '2016-12-17 12:11:28', '2016-12-17 12:11:28', '2016-12-17 12:11:28'),
(5, 5, 'A6ihUF9TS5UuCeHT7q0dWltfggWmfPoE', 1, '2016-12-22 07:18:08', '2016-12-22 07:18:08', '2016-12-22 07:18:08'),
(6, 8, 'E1Ewk3VnKIcX7AtWj7njcQRANs076jpn', 1, '2017-01-27 00:56:33', '2017-01-27 00:56:33', '2017-01-27 00:56:33'),
(7, 2, 'xub1W7f9IX3oPce3FMocYjfOPU2eQEDT', 1, '2017-01-27 01:01:04', '2017-01-27 00:58:45', '2017-01-27 01:01:04'),
(9, 11, '7ne5t8KziblBWgzi3uBnM1NSR0QgOAmM', 1, '2017-01-27 02:20:52', '2017-01-27 02:20:52', '2017-01-27 02:20:52'),
(13, 23408982, 'GfkcVaNE7tQ3EiB934k7vxGwmwaAZIo8', 1, '2017-02-24 21:10:57', '2017-02-24 21:10:57', '2017-02-24 21:10:57'),
(14, 14, '5pTKQ3SCVDcoXDqIuTFB4yUBJBFFL0uR', 1, '2017-02-24 21:32:05', '2017-02-24 21:32:05', '2017-02-24 21:32:05'),
(15, 15, 'ffioMPc2Vn19DGXweQSQYpjMQOhyM9s5', 1, '2017-02-25 14:36:12', '2017-02-25 14:36:12', '2017-02-25 14:36:12'),
(16, 16, '9IVyz5bLFZ37uDcHE56Nxk8XOncQY20W', 1, '2017-02-25 14:37:19', '2017-02-25 14:37:19', '2017-02-25 14:37:19'),
(17, 23408987, 'wYc5NWrszaBVMGtzzt37WY2oFQkpkDEh', 1, '2017-02-25 14:39:42', '2017-02-25 14:39:42', '2017-02-25 14:39:42'),
(18, 2455, 'Eji91vZFsjSMckTqTHpzowg2voFu5tsN', 1, '2017-02-26 05:05:09', '2017-02-26 05:05:09', '2017-02-26 05:05:09'),
(19, 24734289, 'R0qJByXhm828jXhuFVfo6kzWR1mTimHF', 1, '2017-03-02 22:15:24', '2017-03-02 22:15:24', '2017-03-02 22:15:24'),
(20, 24734290, 'W2c55twlz9LbWSXgBHya50kMqODnFtqI', 1, '2017-03-19 04:51:14', '2017-03-19 04:51:14', '2017-03-19 04:51:14'),
(22, 24734291, 'jAW8IrwKBI7CPAN9QZAjTYV7pTB7Wl0m', 1, '2017-03-20 22:42:46', '2017-03-20 22:42:46', '2017-03-20 22:42:46'),
(23, 24734292, '82wbcaaQTuHYDX85Qq7M7Bu4ct8BHzsn', 1, '2017-03-20 22:45:06', '2017-03-20 22:45:06', '2017-03-20 22:45:06'),
(24, 24734293, 'Ho7MWnOAhnbB5QmvFA1eSgLhiE8Hiy0H', 1, '2017-03-20 22:47:01', '2017-03-20 22:47:01', '2017-03-20 22:47:01'),
(25, 24734294, '9QyD2wX2R3qOFk0AkfeNOos27XNWGHn2', 1, '2017-03-20 23:01:10', '2017-03-20 23:01:10', '2017-03-20 23:01:10'),
(26, 24734295, 'meAE3t1ng7afi3mpVAsy8qtJ7iTdRsrF', 1, '2017-03-22 17:28:38', '2017-03-22 17:28:38', '2017-03-22 17:28:38'),
(27, 24734296, 'qzWPdDwkr610wgeVu38kRqolPpgmzZnh', 1, '2017-03-22 17:30:46', '2017-03-22 17:30:46', '2017-03-22 17:30:46'),
(28, 24734297, 'NMJTXOfeHeIpLoLM3EXzr917s0CtVm6u', 1, '2017-03-22 17:35:51', '2017-03-22 17:35:51', '2017-03-22 17:35:51'),
(29, 24734298, 'dwGXykHMqN8evMugVKR5m4yo6RU1BNdj', 1, '2017-03-22 17:37:09', '2017-03-22 17:37:09', '2017-03-22 17:37:09'),
(30, 24734299, 'NRmSUdpRLDlYPzWVHWJSsReeut6DaZQD', 1, '2017-03-22 17:40:50', '2017-03-22 17:40:50', '2017-03-22 17:40:50'),
(31, 24734300, 'CiSIrmNzCpZZoZ7xkgAY4HwMAJJSzESz', 1, '2017-03-22 17:41:48', '2017-03-22 17:41:48', '2017-03-22 17:41:48'),
(32, 24734301, '1TqulcmUZA3yV1fPwkhD4otCtFsTqATg', 1, '2017-03-22 17:42:43', '2017-03-22 17:42:43', '2017-03-22 17:42:43'),
(33, 24734302, 'iGF5Fer4uhZKFZVfmN8cl7fKTavn4ruw', 1, '2017-03-22 17:58:39', '2017-03-22 17:58:39', '2017-03-22 17:58:39'),
(34, 24734303, 'ctatAEMCeqZYN5WBs5wtozn1hsAKfUZ1', 1, '2017-03-22 21:00:54', '2017-03-22 21:00:54', '2017-03-22 21:00:54'),
(35, 24734304, 'xr4n11qgwgKo3JPbD0g2HyzwhqjJCueM', 1, '2017-03-22 21:03:22', '2017-03-22 21:03:22', '2017-03-22 21:03:22'),
(36, 24734305, 'by5Bgdmq0RuZD1kZVZTGKiZqwyJfv8AA', 1, '2017-03-23 04:21:20', '2017-03-23 04:21:20', '2017-03-23 04:21:20'),
(37, 24734306, 'UCHitHtvKyqOVmUSvTscOZMRyw6tPvZQ', 1, '2017-03-23 04:31:31', '2017-03-23 04:31:31', '2017-03-23 04:31:31'),
(38, 24734307, 'YkZE6btqZMNGtDSVXekdodDNwF2jYW1p', 1, '2017-03-23 04:32:59', '2017-03-23 04:32:59', '2017-03-23 04:32:59'),
(39, 24734308, '5T2A9YNkrlwSduxujwaGA5Itfm8OmSf7', 1, '2017-03-23 04:41:17', '2017-03-23 04:41:17', '2017-03-23 04:41:17'),
(40, 24734309, 'tPWQI1DUNMAtYAYnxdUyVu9Pn0jVjBaN', 1, '2017-03-23 04:42:31', '2017-03-23 04:42:31', '2017-03-23 04:42:31'),
(41, 24734310, '1xTr4x6D5wZfyKh7nMHcIfzDGLTMicgQ', 1, '2017-03-23 04:43:35', '2017-03-23 04:43:35', '2017-03-23 04:43:35'),
(42, 24734311, '9zFXHStCBQT48upCwZTJnW48sgkXcuej', 1, '2017-03-23 04:48:52', '2017-03-23 04:48:52', '2017-03-23 04:48:52'),
(43, 24734312, 'REfDqithKjPPCz4tmZmN4x1jIYZpiL9r', 1, '2017-03-23 04:53:04', '2017-03-23 04:53:04', '2017-03-23 04:53:04'),
(44, 24734313, 'G7j6Ls4B8xctdTrKf0PPe2PVpmByFIIF', 1, '2017-03-23 04:54:27', '2017-03-23 04:54:27', '2017-03-23 04:54:27'),
(45, 24734314, '6grX13yD4kCfhaFdwLABzd4IVHlnsdAg', 1, '2017-03-23 05:11:09', '2017-03-23 05:11:09', '2017-03-23 05:11:09'),
(46, 24734315, 'onoc0KaAAW9m8oe104Qf6nloZHKGqjvn', 1, '2017-03-23 05:20:26', '2017-03-23 05:20:26', '2017-03-23 05:20:26'),
(47, 24734316, '2u8uwo9Pjtcx3BRTTe6ACKp6LZsOFTxD', 1, '2017-03-23 05:27:57', '2017-03-23 05:27:57', '2017-03-23 05:27:57'),
(48, 24734317, 'aGjcg90uaxCprMKxbnaWtZUeCnZZ7O99', 1, '2017-03-23 05:28:28', '2017-03-23 05:28:28', '2017-03-23 05:28:28'),
(49, 24734318, 'sQQ7IzHqvVFNlVJb30sdBk9KrW2h8ODM', 1, '2017-03-23 05:32:45', '2017-03-23 05:32:45', '2017-03-23 05:32:45'),
(50, 24734319, 'lbeJyFsQLky2aj8RvjR7hZHlQ0IjQIaZ', 1, '2017-03-23 05:33:41', '2017-03-23 05:33:41', '2017-03-23 05:33:41'),
(51, 24734320, 'JQrWPDszCFRq6WWM7eTSHDPIdb9MVUpX', 1, '2017-03-23 05:34:42', '2017-03-23 05:34:42', '2017-03-23 05:34:42'),
(52, 24734321, 'GerPMcBRexafMlnU4Ij7wYG5V7pNNUDD', 1, '2017-03-23 05:36:18', '2017-03-23 05:36:18', '2017-03-23 05:36:18'),
(53, 24734322, 'QEayH1nCR4u2dyCOX6KOdhs16qksj1U3', 1, '2017-03-23 05:37:32', '2017-03-23 05:37:32', '2017-03-23 05:37:32'),
(54, 24734323, 'TE3ii0PlTaddEN3e8vs3phhNsQ0susSV', 1, '2017-03-23 05:38:05', '2017-03-23 05:38:05', '2017-03-23 05:38:05'),
(55, 24734324, 'yjhD9p5Mc8qtpbq2kNtEfUrzzTwlNNoT', 1, '2017-03-23 05:51:30', '2017-03-23 05:51:30', '2017-03-23 05:51:30'),
(56, 24734325, 'hUAHDTejcbweLLQQWp81cDsFYAi5hYtU', 1, '2017-03-23 05:53:36', '2017-03-23 05:53:36', '2017-03-23 05:53:36'),
(57, 24734326, 'AgekvNJ1GHG9IB0KTkcfIoWAh6bINli2', 1, '2017-03-23 05:54:37', '2017-03-23 05:54:37', '2017-03-23 05:54:37'),
(58, 24734327, 'IK9X87oI99xLt514q8YmhySeXLJJ5me9', 1, '2017-03-23 05:56:54', '2017-03-23 05:56:54', '2017-03-23 05:56:54'),
(59, 24734328, '4jv4UMjqmFAcavjCDrSK8TABoWGW1sIB', 1, '2017-03-23 05:58:11', '2017-03-23 05:58:11', '2017-03-23 05:58:11'),
(60, 24734329, 'ANKguJBDYK1sGwmLZgCpj0QWn91IIfN5', 1, '2017-03-23 05:58:58', '2017-03-23 05:58:58', '2017-03-23 05:58:58'),
(61, 24734330, 'Sdy5Nq4e9iq9es5yUVJc2vqCOij5CSI2', 1, '2017-03-23 05:59:38', '2017-03-23 05:59:38', '2017-03-23 05:59:38'),
(62, 24734331, 'HhBqVdCSk2Scu1mLY4yTa5CLDOoCbeoJ', 1, '2017-03-23 06:00:47', '2017-03-23 06:00:47', '2017-03-23 06:00:47'),
(63, 24734332, 'sVrGg0xJ0TEgMAE742dERUKGfl7Tok4I', 1, '2017-03-23 06:01:40', '2017-03-23 06:01:40', '2017-03-23 06:01:40'),
(64, 24734333, 'b5NgMqsFh87EBWmMc8b1TSR6YNBHeyza', 1, '2017-03-23 06:02:35', '2017-03-23 06:02:35', '2017-03-23 06:02:35'),
(65, 24734334, 'f12Fqb97YdPnXuGnNsKS1KSOZ8euoekQ', 1, '2017-03-23 06:03:16', '2017-03-23 06:03:16', '2017-03-23 06:03:16'),
(66, 24734335, 'pfVXi3jBwzC0yMBiw5IqkpxDDbEX2eVH', 1, '2017-03-23 06:03:45', '2017-03-23 06:03:45', '2017-03-23 06:03:45'),
(67, 24734336, 'hbYgN2iniEcb7SKUqRbTPByihO2RHCj3', 1, '2017-03-23 06:04:24', '2017-03-23 06:04:24', '2017-03-23 06:04:24'),
(68, 24734337, 'rTgASqlJANlXidH56VNIq38PlMYhGbE2', 1, '2017-03-23 06:05:58', '2017-03-23 06:05:58', '2017-03-23 06:05:58'),
(69, 24734338, 'txcCZCl3cUZJShuDOg5AUsghjdv9FZbQ', 1, '2017-03-23 06:06:22', '2017-03-23 06:06:22', '2017-03-23 06:06:22'),
(70, 24734339, 'cJ9TN866V1p6iNjf15Crc5Zu2o8W8DPZ', 1, '2017-03-23 06:07:39', '2017-03-23 06:07:39', '2017-03-23 06:07:39'),
(71, 24734340, 'V8jcbq8u7pv39KYyeTzz4EtR8Z5RheYX', 1, '2017-03-23 06:07:54', '2017-03-23 06:07:54', '2017-03-23 06:07:54'),
(72, 24734341, 'OeuOkSsqJdPKxgy484M2gPZSBll8r4Jb', 1, '2017-03-23 06:08:55', '2017-03-23 06:08:55', '2017-03-23 06:08:55'),
(73, 24734342, 'KjsFkGfCwSm2C7HUvTApCWhFOu3EPI6S', 1, '2017-03-23 06:09:12', '2017-03-23 06:09:12', '2017-03-23 06:09:12'),
(74, 24734343, 'GuEIKG3BVObQ0nAHVVSIm6cBT0OfnOkg', 1, '2017-03-23 06:09:19', '2017-03-23 06:09:19', '2017-03-23 06:09:19'),
(75, 24734344, 'JINno62El5JNcVahiIqlp8Zps9qSBTg9', 1, '2017-03-23 06:09:27', '2017-03-23 06:09:27', '2017-03-23 06:09:27'),
(76, 24734345, '3FZIUzSv9lhlBIhxpk8SyS8Gu6gMyEb4', 1, '2017-03-23 06:09:36', '2017-03-23 06:09:36', '2017-03-23 06:09:36'),
(77, 24734346, 'YUND0EQvjgUV7LLwIW2ZvMtdkLBzmGam', 1, '2017-03-23 06:10:49', '2017-03-23 06:10:49', '2017-03-23 06:10:49'),
(78, 24734347, 'qkZlVCmSMtXcK7XD5PamVYX1jSu3Ir5E', 1, '2017-03-23 06:11:08', '2017-03-23 06:11:08', '2017-03-23 06:11:08'),
(79, 24734348, 'Zo7KDO74pN42NbjCjnsVameiVmTNe7v7', 1, '2017-03-23 06:19:03', '2017-03-23 06:19:03', '2017-03-23 06:19:03'),
(80, 24734349, 'fZtp5o3UZV6eKphhxV9oLjRBVORBLEp6', 1, '2017-03-23 06:20:27', '2017-03-23 06:20:27', '2017-03-23 06:20:27'),
(81, 24734350, 'hovJ4POlAkvkrG4GNuCdcKO4gwNPmFXw', 1, '2017-03-23 06:20:41', '2017-03-23 06:20:41', '2017-03-23 06:20:41'),
(82, 24734351, 'aFxq5zNA8Wua8jXn0jg4P8rHPq0LETro', 1, '2017-03-23 06:21:04', '2017-03-23 06:21:04', '2017-03-23 06:21:04'),
(83, 24734352, 'MdPnjif5lwRwP3ItTouzVdrjOINmZPpM', 1, '2017-03-23 06:21:14', '2017-03-23 06:21:14', '2017-03-23 06:21:14'),
(84, 24734353, 'jTKPthG65qxBWOU5EOCNmuQ9IygWE315', 1, '2017-03-23 06:21:34', '2017-03-23 06:21:34', '2017-03-23 06:21:34'),
(85, 24734354, 'Al6PeRNAZcSU3SA2Q2oZilMpi34iZaQb', 1, '2017-03-23 06:22:00', '2017-03-23 06:22:00', '2017-03-23 06:22:00'),
(86, 24734355, '3xgAivng91olVgqxBZIoMBatMppCVdGK', 1, '2017-03-23 06:24:45', '2017-03-23 06:24:45', '2017-03-23 06:24:45'),
(87, 24734356, 'Ww7CXaiElFUoaoNFY0AjDARGjF88Ezno', 1, '2017-03-23 06:27:34', '2017-03-23 06:27:34', '2017-03-23 06:27:34'),
(88, 24734357, 'wlhUcadkh7c6LZAYh6UdcRtbMNt2u1XM', 1, '2017-03-23 06:27:55', '2017-03-23 06:27:55', '2017-03-23 06:27:55'),
(89, 24734358, 'CEyOVqvtCEj0bdlzroqgbkowGsECrKH9', 1, '2017-03-23 06:28:10', '2017-03-23 06:28:10', '2017-03-23 06:28:10'),
(90, 24734359, 'FwL8HHiGoUuFDj78X4ei4MzDT97kGpHb', 1, '2017-03-23 06:31:34', '2017-03-23 06:31:34', '2017-03-23 06:31:34'),
(91, 24734360, 'dLQ5p9Kg1s8oHecfo1EHpkcjJkyE7kjb', 1, '2017-03-23 06:32:09', '2017-03-23 06:32:09', '2017-03-23 06:32:09'),
(92, 24734361, 'GJfUhioxvrkGHkeolL5r2nAalJ2Mgbnc', 1, '2017-03-23 06:32:24', '2017-03-23 06:32:24', '2017-03-23 06:32:24'),
(93, 24734362, 'MKjsPOWqURHZM3ykSHv7Hg36rF1leWkY', 1, '2017-03-23 06:33:08', '2017-03-23 06:33:08', '2017-03-23 06:33:08'),
(94, 24734363, 'bIQzUIIbdvIWJoWeoGIBI4Q2oLuyd69t', 1, '2017-03-23 06:36:10', '2017-03-23 06:36:10', '2017-03-23 06:36:10'),
(95, 24734364, 'QakCP5oOgPSufaieTjuOhnKWM3OAP6G5', 1, '2017-03-23 06:41:28', '2017-03-23 06:41:28', '2017-03-23 06:41:28'),
(96, 24734365, '3YbsDwVDe1JnaJUUg5zvsDpa5lIfNw7G', 1, '2017-03-23 06:42:38', '2017-03-23 06:42:38', '2017-03-23 06:42:38'),
(97, 24734366, 'dMZ5qQRPhrfPpFRwAwMT7GYooIt7Fkfb', 1, '2017-03-23 06:43:37', '2017-03-23 06:43:37', '2017-03-23 06:43:37'),
(98, 24734367, '5CjVeaxnrJqdxVMxWdirhWraNox16A5g', 1, '2017-03-23 06:45:11', '2017-03-23 06:45:11', '2017-03-23 06:45:11'),
(99, 24734368, 'q4eC5Db0Hmlyu8GG5h7b2tIc0RxGoTLM', 1, '2017-03-23 06:47:10', '2017-03-23 06:47:10', '2017-03-23 06:47:10'),
(100, 24734369, 'Z9piicw88vqo9FWPaPm7MRD2eQ5wt35r', 1, '2017-03-23 06:48:44', '2017-03-23 06:48:44', '2017-03-23 06:48:44'),
(101, 24734370, 'RBKWQhNe4ZyScSIngvk6Wxbnwp2ikSJy', 1, '2017-03-23 06:51:08', '2017-03-23 06:51:08', '2017-03-23 06:51:08'),
(102, 24734371, 'ii7R9TXtYUHTYFSlUH36LdRAcbEr5p2y', 1, '2017-03-23 06:53:21', '2017-03-23 06:53:21', '2017-03-23 06:53:21'),
(103, 24734372, 'czIYOLRDVP2dGhx9ceJaoqCAQ6vUohKd', 1, '2017-03-23 06:53:41', '2017-03-23 06:53:41', '2017-03-23 06:53:41'),
(104, 24734373, 'ifpHbcUdXvCo4aDn6dgOkaTiSOI9pcVW', 1, '2017-03-23 06:53:57', '2017-03-23 06:53:57', '2017-03-23 06:53:57'),
(105, 24734374, 'dGQxlsKngG6DmdSElfWmGcVDPPAF0lvw', 1, '2017-03-23 06:54:08', '2017-03-23 06:54:08', '2017-03-23 06:54:08'),
(106, 24734375, 'XV2woQyk9aXmXKrYgwtMPNgKM2MtEhym', 1, '2017-03-23 06:54:30', '2017-03-23 06:54:30', '2017-03-23 06:54:30'),
(107, 24734376, 'dPf98M1AJOiIGjzl8YaPRH6PwEaFzNws', 1, '2017-03-23 06:54:56', '2017-03-23 06:54:56', '2017-03-23 06:54:56'),
(108, 24734377, 'nr9mCzVyJSDgXyKXdxNHZowAAIlmqlEQ', 1, '2017-03-23 06:55:17', '2017-03-23 06:55:17', '2017-03-23 06:55:17'),
(109, 24734378, 'vNKIdkgEuC1s8fnHSp0nuY6YK38OB2x9', 1, '2017-03-23 06:56:28', '2017-03-23 06:56:28', '2017-03-23 06:56:28'),
(110, 24734379, 'LOpl75218wFSGJeAUFu2Ytf29m5E7ubJ', 1, '2017-03-23 06:58:06', '2017-03-23 06:58:06', '2017-03-23 06:58:06'),
(111, 24734380, 'oFhrqrnib4UrZboSbjoizE500yZYwzvK', 1, '2017-03-23 06:58:48', '2017-03-23 06:58:48', '2017-03-23 06:58:48'),
(112, 24734381, 'PGAVekN1Sc0dgEEC2mfoKG5g07teZevr', 1, '2017-03-23 06:59:15', '2017-03-23 06:59:15', '2017-03-23 06:59:15'),
(113, 24734382, 'ICAzQzbnk1ucxp2rwd0XXTH0sisCrK4h', 1, '2017-03-23 07:05:51', '2017-03-23 07:05:51', '2017-03-23 07:05:51'),
(114, 24734383, 'pqcG3bb3VOja4BaNIjjcQmX9jrJ6xDqG', 1, '2017-03-23 07:08:46', '2017-03-23 07:08:46', '2017-03-23 07:08:46'),
(115, 24734384, 'bTW9SIVpdDH6eyUddE8FGNlPc9B5z2i3', 1, '2017-03-23 07:14:03', '2017-03-23 07:14:03', '2017-03-23 07:14:03'),
(116, 24734385, 'yz5WB9J6MRszTHt6hXf0mO3Im4rZ1SWr', 1, '2017-03-23 14:18:09', '2017-03-23 14:18:09', '2017-03-23 14:18:09'),
(117, 24734386, 'shehXkZjXJ0XSrOZzNdikAw8bVgfdtzn', 1, '2017-03-23 20:42:58', '2017-03-23 20:42:58', '2017-03-23 20:42:58'),
(121, 24734387, 'CQ95VMUswHpeuC6ZQXTkTFljdyEKgqMD', 1, '2017-03-23 20:58:45', '2017-03-23 20:58:45', '2017-03-23 20:58:45'),
(122, 24734388, 'PXF1Cmu2ncptVAh5kQMJOYO2t8kCRkBD', 1, '2017-03-23 21:33:48', '2017-03-23 21:33:48', '2017-03-23 21:33:48'),
(123, 24734389, 'ybsSRT6IvM2vy3KM2UdGyxPPIiJsIDzG', 1, '2017-03-23 21:33:56', '2017-03-23 21:33:56', '2017-03-23 21:33:56'),
(124, 24734390, '0DrlO1EqETi9J6LK4oojzqBXQtdFS5TD', 1, '2017-03-23 21:34:03', '2017-03-23 21:34:03', '2017-03-23 21:34:03'),
(125, 24734391, 'vZuGX7b4WMkJyLBDaQbrpPn1jKK7ZJVV', 1, '2017-03-23 21:34:09', '2017-03-23 21:34:09', '2017-03-23 21:34:09'),
(126, 24734392, 'vDHqwFHAGqNRwBnWQSoTDbCvrhoUN8Tw', 1, '2017-03-23 21:34:20', '2017-03-23 21:34:20', '2017-03-23 21:34:20'),
(127, 24734393, 'ytpXjQQU1O13sUDzJAJP7Oug6eEYJlv6', 1, '2017-03-23 21:38:41', '2017-03-23 21:38:41', '2017-03-23 21:38:41'),
(128, 24734394, 'gdV0yMxh6yc3EqGlj6suDaNQLpkFOrNB', 1, '2017-03-23 21:39:55', '2017-03-23 21:39:55', '2017-03-23 21:39:55'),
(129, 24734395, 'bWeO3keJFXZvOQwM1ZsxFGZlPkuGanSB', 1, '2017-03-23 21:41:44', '2017-03-23 21:41:44', '2017-03-23 21:41:44'),
(130, 24734396, 'OAw630Q9GYggug8VjuN7nI1OiYyWw0wg', 1, '2017-03-23 21:42:46', '2017-03-23 21:42:46', '2017-03-23 21:42:46'),
(131, 24734397, 'tdZ4GKRFV86KSAV8eEhekrDPg2iyq69q', 1, '2017-03-23 21:46:09', '2017-03-23 21:46:09', '2017-03-23 21:46:09'),
(132, 24734398, 'qEwj3Qj5cDDBRadrLAKlLdGVvdwCCTeB', 1, '2017-03-24 03:43:02', '2017-03-24 03:43:02', '2017-03-24 03:43:02'),
(133, 24734399, 'K3QSF9qJtuk8jKY6D89i6b0FXKk5NvP9', 1, '2017-03-24 03:44:12', '2017-03-24 03:44:12', '2017-03-24 03:44:12'),
(134, 24734400, 'CZuaWcVZJizi0gK6DWCL9rxHjgzXdaeS', 1, '2017-03-24 05:50:30', '2017-03-24 05:50:30', '2017-03-24 05:50:30'),
(135, 24734401, '4sgMYp32vskbz8FrE0R7RQ3mcXmuQ2jV', 1, '2017-03-24 08:25:35', '2017-03-24 08:25:35', '2017-03-24 08:25:35'),
(136, 24734402, 'hyNiw4NQurAQXUXCpwsQSrErFXnpgoiQ', 1, '2017-03-24 08:25:52', '2017-03-24 08:25:52', '2017-03-24 08:25:52'),
(137, 24734403, '1PzSByT9dahkZ3SPAcBJaYosC998aA2T', 1, '2017-03-24 08:44:10', '2017-03-24 08:44:10', '2017-03-24 08:44:10'),
(138, 24734404, 'qNK6Qp7XJjuKeLysJDWpDT6RjZB5uqLl', 1, '2017-03-24 08:45:48', '2017-03-24 08:45:48', '2017-03-24 08:45:48'),
(139, 24734405, 'TE4ykD6wXVLDFxuXz4Ib492wu2lkmOPv', 1, '2017-03-24 08:53:09', '2017-03-24 08:53:09', '2017-03-24 08:53:09'),
(140, 24734406, 'FLkCHDLZfvzcNuUyRQdOqwrY7rabQ4jc', 1, '2017-03-24 08:57:30', '2017-03-24 08:57:30', '2017-03-24 08:57:30'),
(141, 24734407, 'JnJj4ybt8kD1x2ObDawWvJ2bBUdoEyzv', 1, '2017-03-24 15:36:56', '2017-03-24 15:36:56', '2017-03-24 15:36:56'),
(142, 24734408, 'FRk0ZEDpepvyYc7dOnuMOFBuUsSWxajo', 1, '2017-03-24 16:31:03', '2017-03-24 16:31:03', '2017-03-24 16:31:03'),
(143, 24734409, '0pBDzbyUFB8E9I5BfXOIHhfWKuBS7Rio', 1, '2017-03-24 16:35:30', '2017-03-24 16:35:30', '2017-03-24 16:35:30'),
(144, 24734410, 'gAw6gHfwjAIbWPxlKz9ohbyC2VhAaP11', 1, '2017-03-24 16:41:48', '2017-03-24 16:41:48', '2017-03-24 16:41:48'),
(146, 24734411, 'FrVgJBxKkJz8oY4mK7Dh2JQmQD1jSepX', 1, '2017-03-25 04:17:30', '2017-03-25 04:17:30', '2017-03-25 04:17:30'),
(147, 24734412, 'RAkKMSYSh9IB4X8ynK4hPqFRmao0TYWy', 1, '2017-03-25 08:55:27', '2017-03-25 08:55:27', '2017-03-25 08:55:27'),
(148, 24734413, 'fSiCYSX7bY0ssgDEf5paxcQn3hoasRfG', 1, '2017-03-25 14:58:12', '2017-03-25 14:58:12', '2017-03-25 14:58:12'),
(149, 24734414, 'QHqYOzIHQfIcc8mCWyrED9Yxl5WvKnaY', 1, '2017-03-27 02:13:14', '2017-03-27 02:13:14', '2017-03-27 02:13:14'),
(150, 24734415, 'mP9C0Sv1PdhfnotjHczzoyWdB1jTZx2V', 1, '2017-03-27 02:21:45', '2017-03-27 02:21:45', '2017-03-27 02:21:45'),
(151, 24734416, 'T2aAUDlFwaUk5OvhbRnbOgkbJDzPVNzz', 1, '2017-03-27 16:17:22', '2017-03-27 16:17:22', '2017-03-27 16:17:22'),
(152, 24734417, 'JTlWgDFhvdALV0cUVEN0axQi4g8m73tt', 1, '2017-03-28 01:05:48', '2017-03-28 01:05:48', '2017-03-28 01:05:48'),
(153, 24734418, 'ANNtSy4lZSrFn99zCOZxTC1ukv3mNilx', 1, '2017-03-28 01:38:15', '2017-03-28 01:38:15', '2017-03-28 01:38:15'),
(154, 24734419, 'YCFmg6fCNrYeZspFKAxyRD8bMpcZnq5e', 1, '2017-03-28 08:43:50', '2017-03-28 08:43:50', '2017-03-28 08:43:50'),
(155, 24734420, 'gBcEYDarQlKJuVC5ACLuR3uKJXZrKfPY', 1, '2017-03-28 08:55:38', '2017-03-28 08:55:38', '2017-03-28 08:55:38'),
(156, 24734421, 'MB7dg647Q2yOFCUApONLikcFUhknbtDu', 1, '2017-03-28 23:48:28', '2017-03-28 23:48:28', '2017-03-28 23:48:28'),
(157, 24734422, '6qhmmsucdCsed2CzgWzIJa3J4Uo9G7vN', 1, '2017-03-29 00:13:37', '2017-03-29 00:13:37', '2017-03-29 00:13:37'),
(158, 24734423, 'kkrqKW63j6Zb13xBhJYCJ2qGBIDh1fkt', 1, '2017-03-29 02:05:54', '2017-03-29 02:05:54', '2017-03-29 02:05:54'),
(159, 24734424, '0gTAwBlsijlgf9Q8wMHALUg38RxWVECm', 1, '2017-03-29 15:06:06', '2017-03-29 15:06:06', '2017-03-29 15:06:06'),
(160, 24734425, 'G9EOx5yCEuB4TPgQ8jwYc9lS68Hrxyjq', 1, '2017-04-08 10:42:01', '2017-04-08 10:42:01', '2017-04-08 10:42:01'),
(161, 24734426, 'ExTYiuhzaTwoAME2NPI7G2mpRzfSYSyD', 1, '2017-04-08 10:48:07', '2017-04-08 10:48:07', '2017-04-08 10:48:07'),
(162, 24734427, 'Bwt66szHYRAXNB58jouXzCC0i5mTDzbm', 1, '2017-04-08 10:49:02', '2017-04-08 10:49:02', '2017-04-08 10:49:02'),
(163, 24734428, '3J8utIIoJHxWQmsJM9IJjO9kGPI6ukFS', 1, '2017-04-08 10:55:40', '2017-04-08 10:55:40', '2017-04-08 10:55:40'),
(164, 24734429, 'OKzPfLOCqA8bl3fN1cdk3e0dIK0FfgQu', 1, '2017-04-08 11:51:28', '2017-04-08 11:51:28', '2017-04-08 11:51:28'),
(165, 24734430, 'fgPabEYzrYMX5Sl9ZsF55LVnnc6dLuBw', 1, '2017-04-08 14:33:10', '2017-04-08 14:33:10', '2017-04-08 14:33:10'),
(166, 24734431, 'KHJvpYbEGCRzmnA2VqcWSZBOWxaIsvTe', 1, '2017-04-08 14:35:14', '2017-04-08 14:35:14', '2017-04-08 14:35:14'),
(167, 24734432, 'k3NwKpx2mmd6rJfMrPqWPXearEyn96zG', 1, '2017-04-08 14:36:44', '2017-04-08 14:36:44', '2017-04-08 14:36:44'),
(168, 24734433, 'Xor0TTqZgdi7KMijWQAHLFoFdQg7ubrA', 1, '2017-04-08 14:37:26', '2017-04-08 14:37:26', '2017-04-08 14:37:26'),
(169, 24734434, 'OZzcBGqIyp1tZuo6XzUyrqd72KUyMHki', 1, '2017-04-08 14:37:42', '2017-04-08 14:37:42', '2017-04-08 14:37:42'),
(170, 24734435, 'eJnddVGnaq5bmaahzApEtz1I2e4bu8dY', 1, '2017-04-08 15:32:01', '2017-04-08 15:32:01', '2017-04-08 15:32:01'),
(171, 24734436, 'vF9BH41ztd5ax5JdphGusaf97xpFzrts', 1, '2017-04-08 15:44:57', '2017-04-08 15:44:57', '2017-04-08 15:44:57'),
(172, 24734437, 'sP5yRW7GqvctkwW7XOU6HE2GsH7JdtsT', 1, '2017-04-08 15:51:24', '2017-04-08 15:51:24', '2017-04-08 15:51:24'),
(173, 24734438, 'kOKij7m6O6SxMiuOkz8urIyncwRLm7dr', 1, '2017-04-08 15:53:59', '2017-04-08 15:53:59', '2017-04-08 15:53:59'),
(174, 24734439, 'bZv3d5ruJ84X4VTpP4Y7WkgP0I7Mveia', 1, '2017-04-08 15:56:59', '2017-04-08 15:56:59', '2017-04-08 15:56:59'),
(175, 24734440, 'D8qBv8bZTcrsbP5YQ1B4dl1kt2p5YTsh', 1, '2017-04-08 16:02:17', '2017-04-08 16:02:17', '2017-04-08 16:02:17'),
(176, 24734441, 'zW4pAcc6fLmR3SB1IkY6l9GfQ9oB3506', 1, '2017-04-08 16:22:05', '2017-04-08 16:22:05', '2017-04-08 16:22:05'),
(177, 24734442, 'txm5WMEV0XzIhiAgq2oFucBZ2fhQexrY', 1, '2017-04-08 18:33:52', '2017-04-08 18:33:52', '2017-04-08 18:33:52'),
(178, 24734443, 'z3UAQUK2Uvhpv3U8W0EgOUQQEZh1us2n', 1, '2017-04-08 18:34:11', '2017-04-08 18:34:11', '2017-04-08 18:34:11'),
(179, 24734444, 'AW7B5ZIFeCM07J3GiegWQnoGTaxCbE9C', 1, '2017-04-08 20:58:15', '2017-04-08 20:58:15', '2017-04-08 20:58:15'),
(180, 24734445, 'ca09zLDvEef3zloYF2I3Ab0PN8JLJ6kf', 1, '2017-04-09 23:26:23', '2017-04-09 23:26:23', '2017-04-09 23:26:23'),
(181, 24734446, 'A7jS8hIzlGM1lAZLykhqMHcZfc4q9bOc', 1, '2017-04-10 16:50:17', '2017-04-10 16:50:17', '2017-04-10 16:50:17'),
(182, 24734447, 'T6YH30QyvFyg7cn5fUnDxYjlgrfdcEza', 1, '2017-04-10 16:52:36', '2017-04-10 16:52:36', '2017-04-10 16:52:36'),
(184, 24734448, 'uqRkkgk4XSceeKSAu5Uy1hranyh8ith1', 1, '2017-04-13 09:43:01', '2017-04-13 09:43:01', '2017-04-13 09:43:01'),
(185, 24734449, 'tE3pATXHkRgzDKK8v3XXQ2e5n7Qrt2cJ', 1, '2017-04-17 22:11:11', '2017-04-17 22:11:11', '2017-04-17 22:11:11'),
(186, 24734450, '76fnWNKgXu0vj5bASbxT8aKMqpGG6JN2', 1, '2017-04-18 14:47:55', '2017-04-18 14:47:55', '2017-04-18 14:47:55'),
(187, 24734451, '7rD1ZWFG6ifNuO5sdtd4f1452uMClUXG', 1, '2017-07-15 17:34:19', '2017-07-15 17:34:19', '2017-07-15 17:34:19'),
(188, 24734451, 'pLBr7u3xt18u8YvrZwc9r2vf8VKfCRh3', 1, '2017-07-18 15:06:04', '2017-07-15 20:52:19', '2017-07-18 15:06:04'),
(190, 24734452, 'tiujD7XDNLTwj1PnhQc1GXPkXvN7UNVs', 1, '2017-07-17 15:47:44', '2017-07-17 15:47:44', '2017-07-17 15:47:44'),
(193, 24734453, '0TJ64QqPto3T8GmllKAp8A9hyCYeihRm', 1, '2017-07-17 23:05:04', '2017-07-17 23:05:04', '2017-07-17 23:05:04'),
(195, 24734454, 'XUDoQmYDKMBuS371pSQw6Bw3XENq1DBJ', 1, '2017-07-18 16:06:58', '2017-07-18 16:06:58', '2017-07-18 16:06:58'),
(196, 24734455, 'vJl95Tt5cOMObUYVx1j5DU5JtXcxJ5av', 1, '2017-07-18 16:12:13', '2017-07-18 16:12:13', '2017-07-18 16:12:13'),
(197, 24734456, 'TM8gbeyq95y0jHJZdcNnaEtN82TqQvwZ', 1, '2017-07-18 16:14:58', '2017-07-18 16:14:58', '2017-07-18 16:14:58'),
(198, 24734456, 'mRNGZIkiJpntQmi7he7fMUTz9CiTPjfB', 1, '2017-07-19 14:06:41', '2017-07-19 14:06:41', '2017-07-19 14:06:41'),
(199, 24734457, 'AClq5OKqnLn0x1oUJwArkpWTC8ICMfor', 1, '2017-07-19 14:08:35', '2017-07-19 14:08:35', '2017-07-19 14:08:35'),
(200, 24734458, 'oVYSjL5IpRTRwnqhyxGnLi7ohN3Nlkbu', 1, '2017-07-19 14:14:50', '2017-07-19 14:14:50', '2017-07-19 14:14:50'),
(201, 24734459, 'MWY1zYIG0tgABaKWyRTLEEd9GYc8dKal', 1, '2017-07-19 15:59:09', '2017-07-19 15:59:09', '2017-07-19 15:59:09'),
(202, 24734460, 'Fh1xapWNeUwewXRTweiMCGjLysIsM284', 1, '2017-07-22 20:40:24', '2017-07-22 20:40:24', '2017-07-22 20:40:24'),
(203, 24734461, 'olE8oDy0DS4WXEfSRBFFK69zr8oe8JYd', 1, '2017-07-22 23:16:19', '2017-07-22 23:16:19', '2017-07-22 23:16:19'),
(204, 24734462, 'xNU02QSoLy9oSez2goYfDs30GKIyQE5D', 1, '2017-07-22 23:22:37', '2017-07-22 23:22:37', '2017-07-22 23:22:37'),
(205, 24734463, 'qso3jMRFTgsdGPRIn0qAYSGvEjbLYr79', 1, '2017-07-23 20:02:20', '2017-07-23 20:02:20', '2017-07-23 20:02:20'),
(206, 24734464, 'hckLSgYmJd0KQdZ0EmaKbIsqOKJRXRRp', 1, '2017-07-24 20:48:34', '2017-07-24 20:48:34', '2017-07-24 20:48:34'),
(207, 24734465, 'OmhuW8MNdCXduHweF7pFZyPMTswPlFZw', 1, '2017-07-25 14:19:23', '2017-07-25 14:19:23', '2017-07-25 14:19:23'),
(208, 24734466, 'V9FqkurbHGM0jMacZiqTYm6JgM67MDNZ', 1, '2017-07-25 14:38:28', '2017-07-25 14:38:28', '2017-07-25 14:38:28'),
(209, 24734467, 'B0NB3ZmHYAkMEMvW3Yf2T2bNkfe51nUY', 1, '2017-07-25 17:53:54', '2017-07-25 17:53:54', '2017-07-25 17:53:54'),
(210, 24734468, 'IghfpPyJRWq5BKYYivRPaRvntZuDej8Y', 1, '2017-07-25 18:06:20', '2017-07-25 18:06:20', '2017-07-25 18:06:20'),
(211, 24734469, 'f8yjQIP7u4w5EguiVbFgNz0O05px7d2h', 1, '2017-07-25 20:23:43', '2017-07-25 20:23:43', '2017-07-25 20:23:43'),
(212, 24734470, 'liD3Yo2lu7DkLIzHYzjmjhTMzQ4Cmjic', 1, '2017-07-25 22:24:48', '2017-07-25 22:24:48', '2017-07-25 22:24:48'),
(213, 24734471, 'J50V0gSkY7W217RblhLgAjTSn7d356ko', 1, '2017-07-26 23:07:20', '2017-07-26 23:07:20', '2017-07-26 23:07:20'),
(214, 24734472, '3CoX536HKOHa6pse9VDTZTjUNjQGSGh2', 1, '2017-07-26 23:07:55', '2017-07-26 23:07:55', '2017-07-26 23:07:55'),
(215, 24734473, 'AktK9mFXOy0BQurQbECSESPl8eU2Rdcc', 1, '2017-07-27 00:20:58', '2017-07-27 00:20:58', '2017-07-27 00:20:58'),
(216, 24734474, 'ls4UVGIzZqH7nzr38oXvT8voG04IHCQn', 1, '2017-07-27 07:02:49', '2017-07-27 07:02:49', '2017-07-27 07:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_card`
--

CREATE TABLE `findmiin_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_lon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pictures` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_num` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `open_hour_mon_fri_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_mon_fri_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sat_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sat_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sun_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sun_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_flag` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `findmiin_card`
--

INSERT INTO `findmiin_card` (`id`, `business_name`, `business_address`, `business_city`, `business_state`, `business_country`, `business_phone_number`, `business_lat`, `business_lon`, `manager_name`, `manager_phone_number`, `business_short_description`, `logo`, `pictures`, `business_information`, `facebook_link`, `google_plus_link`, `twitter_link`, `keywords`, `comment_num`, `category`, `contract_start_date`, `contract_end_date`, `status`, `created_at`, `updated_at`, `deleted`, `open_hour_mon_fri_from`, `open_hour_mon_fri_to`, `open_hour_sat_from`, `open_hour_sat_to`, `open_hour_sun_from`, `open_hour_sun_to`, `post_flag`) VALUES
(273506, 'Andtech Wiereless & Repairs', '3820 Business 281', 'Edinburg', 'TX', 'US', '956 616 8746', '26.20872', '-98.2256', 'Juan Barrios', '956 616 8746', 'Cellphones repairs', '0PYE4b9b1t.jpg', 'cvbc6f9Dd3.jpg,c0uQvwjSy1.jpg,DpwMnrMVPk.jpg', 'big experience in cellphone repairs and computers', '', '', '', 'cellphone electronic repair computer', 0, 'Shop', '2017-07-26', '2018-07-26', 0, '2017-07-27 07:27:59', '2017-07-27 09:09:28', 0, '09:00 AM', '06:00 PM', '10:00 AM', '05:00 PM', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_comment`
--

CREATE TABLE `findmiin_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(10) NOT NULL DEFAULT '0',
  `jobs_id` int(11) NOT NULL DEFAULT '0',
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `findmiin_comment`
--

INSERT INTO `findmiin_comment` (`id`, `card_id`, `jobs_id`, `visitor_name`, `rating`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 273500, 0, 'dragon', '7', 'ok', 0, '2017-07-25 16:30:34', '0000-00-00 00:00:00'),
(2, 273501, 0, 'monkey', '4', 'feed chicken', 0, '2017-07-25 16:30:37', '0000-00-00 00:00:00'),
(3, 273502, 0, 'ddd', '2', 'ddd', 0, '2017-07-25 16:30:43', '0000-00-00 00:00:00'),
(4, 273505, 0, 'Er', '3', 'erf', 0, '2017-07-26 04:23:43', '0000-00-00 00:00:00'),
(5, 273505, 0, 'Er', '7', 'erf', 0, '2017-07-26 04:23:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_comment_temp`
--

CREATE TABLE `findmiin_comment_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_jobs`
--

CREATE TABLE `findmiin_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(11) NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_lon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pictures` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_num` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `open_hour_mon_fri_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_mon_fri_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sat_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sat_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sun_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sun_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `findmiin_jobs`
--

INSERT INTO `findmiin_jobs` (`id`, `card_id`, `business_name`, `business_address`, `business_phone_number`, `business_lat`, `business_lon`, `manager_name`, `manager_phone_number`, `business_short_description`, `logo`, `pictures`, `business_information`, `facebook_link`, `google_plus_link`, `twitter_link`, `keywords`, `comment_num`, `category`, `contract_start_date`, `contract_end_date`, `status`, `created_at`, `updated_at`, `deleted`, `open_hour_mon_fri_from`, `open_hour_mon_fri_to`, `open_hour_sat_from`, `open_hour_sat_to`, `open_hour_sun_from`, `open_hour_sun_to`, `business_city`, `business_state`, `business_country`) VALUES
(5, 273506, 'Andtech Wiereless & Repairs', '3820 Business 281', '956 616 8746', '26.20872', '-98.2256', 'Juan Barrios', '956 616 8746', 'Cellphones repairs', '0PYE4b9b1t.jpg', 'cvbc6f9Dd3.jpg,c0uQvwjSy1.jpg,DpwMnrMVPk.jpg', 'big experience in cellphone repairs and computers', '', '', '', 'cellphone electronic repair computer', 0, 'Shop', '2017-07-26', '2018-07-26', 0, '2017-07-27 09:09:28', '2017-07-27 09:09:28', 0, '09:00 AM', '06:00 PM', '10:00 AM', '05:00 PM', '', '', 'Edinburg', 'TX', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_jobs_category`
--

CREATE TABLE `findmiin_jobs_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `findmiin_jobs_category`
--

INSERT INTO `findmiin_jobs_category` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Barkery', 'DPyxYGPtEn.png', 0, '2017-07-23 01:03:48', '2017-07-22 17:03:48'),
(3, 'Shop', 'epP7tr7gQQ.png', 0, '2017-07-23 01:03:59', '2017-07-22 17:03:59'),
(4, 'Restaurant', 'CL0MZbXDmi.png', 0, '2017-07-23 01:04:10', '2017-07-22 17:04:10'),
(5, 'Profile', 'ph2pNNZR3Q.png', 0, '2017-07-27 15:13:44', '2017-07-27 15:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_localfinds`
--

CREATE TABLE `findmiin_localfinds` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_lon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pictures` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_num` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `open_hour_mon_fri_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_mon_fri_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sat_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sat_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sun_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour_sun_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_privilege`
--

CREATE TABLE `findmiin_privilege` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `findmiin_section`
--

CREATE TABLE `findmiin_section` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `findmiin_section`
--

INSERT INTO `findmiin_section` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Sports', 'kwYWEbJwRS.png', 0, '2017-07-23 01:00:18', '2017-07-22 17:00:18'),
(6, 'Events', 'QfccnjivyV.png', 0, '2017-07-23 01:01:09', '2017-07-22 17:01:09'),
(7, 'Flower', 'LT5tc5bWsw.png', 0, '2017-07-23 01:02:26', '2017-07-22 17:02:26'),
(12, 'Offerts', '1XteqC0tFT.png', 0, '2017-07-22 17:02:50', '2017-07-22 17:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `created_at`, `updated_at`, `code`, `lang_code`, `name`, `display_name`) VALUES
(1, '2017-01-27 14:45:23', '2017-01-27 14:45:23', 'en', NULL, 'English', NULL),
(3, '2017-01-27 14:58:50', '2017-01-27 14:58:50', 'ja', NULL, 'Japanese (ja)', NULL),
(4, '2017-01-27 14:59:23', '2017-01-27 14:59:23', 'ko', NULL, 'Korean', NULL),
(5, '2017-01-27 06:41:14', '2017-01-27 06:41:14', 'ru', NULL, 'Russian', NULL),
(6, '2017-01-27 06:42:22', '2017-01-27 06:42:22', 'aa', NULL, 'Afar', NULL),
(7, '2017-01-27 06:42:40', '2017-01-27 06:42:40', 'ar', NULL, 'Arabic', NULL),
(8, '2017-01-27 06:43:17', '2017-01-27 06:43:17', 'kg', NULL, 'Kongo', NULL),
(9, '2017-01-27 06:43:40', '2017-01-27 06:43:40', 'ml', NULL, 'Malayalam', NULL),
(10, '2017-01-27 06:43:57', '2017-01-27 06:43:57', 'ms', NULL, 'Malay', NULL),
(11, '2017-01-27 06:44:10', '2017-01-27 06:44:10', 'zh', NULL, 'Chinese', NULL),
(12, '2017-01-27 06:49:46', '2017-01-27 06:49:46', 'jp', NULL, 'jp', NULL),
(13, '2017-01-27 16:17:46', '2017-01-27 16:17:46', 'fr', NULL, 'French', NULL),
(14, '2017-01-27 16:23:01', '2017-01-27 16:23:01', 'de', NULL, 'German', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_02_230147_migration_cartalyst_sentinel', 1),
('2014_10_04_174350_soft_delete_users', 1),
('2014_12_10_011106_add_fields_to_user_table', 1),
('2015_08_09_200015_create_blog_module_table', 1),
('2015_08_11_064636_add_slug_to_blogs_table', 1),
('2015_08_19_073929_create_taggable_table', 1),
('2015_11_10_140011_create_files_table', 1),
('2016_01_02_062647_create_tasks_table', 1),
('2016_04_26_054601_create_datatables_table', 1),
('2015_02_03_180720_create_locales_table', 2),
('2015_02_03_180721_create_translations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_val` int(3) NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `content`, `opt_val`, `status`, `created_at`) VALUES
(10, 3, 'notification 1', 1, 1, '2016-12-21 16:33:55'),
(11, 3, 'notification 2', 2, 1, '2016-12-21 16:33:59'),
(12, 3, 'notification 3', 3, 1, '2016-12-21 16:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_advertisements`
--

CREATE TABLE `oollah_advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` date NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_advertisements`
--

INSERT INTO `oollah_advertisements` (`id`, `title`, `description`, `photo`, `expired`, `status`, `created_at`, `updated_at`) VALUES
(3, 'asdasd', '<p>asdasdasdasdasdasd</p>\r\n', '9BlVNMBB73.jpg', '2017-02-09', 1, '2017-07-20 01:09:05', '2017-07-19 17:09:05'),
(4, 'test advertisement', '<p>test</p>\r\n', 'sw2nqE3rz4.jpg', '2017-02-17', 1, '2017-07-20 01:09:05', '2017-07-19 17:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_advertises`
--

CREATE TABLE `oollah_advertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weburl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` date NOT NULL,
  `type` int(3) NOT NULL COMMENT '1-top, 2-middle, 3-bottom',
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_advertises`
--

INSERT INTO `oollah_advertises` (`id`, `title`, `description`, `photo`, `weburl`, `expired`, `type`, `status`, `created_at`, `updated_at`) VALUES
(9, '上鱼泡泡', '<p>一元约战LOL</p>\r\n', '9BlVNMBB73.jpg', 'http://baidu.com', '2017-01-26', 1, 1, '2017-07-21 02:09:31', '2017-07-20 18:09:31'),
(10, '点亮圣诞树', '<p>点亮圣诞树</p>\r\n', 'sw2nqE3rz4.jpg', 'http://baidu.com', '2017-01-26', 2, 1, '2017-07-20 19:49:49', '2017-07-20 11:49:49'),
(11, '12月星大神', '<p>12月星大神</p>\r\n', 'YVawi9J5DD.jpg', 'http://baidu.com', '2017-01-26', 3, 1, '2017-07-20 19:56:45', '2017-07-20 11:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_category`
--

CREATE TABLE `oollah_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_category`
--

INSERT INTO `oollah_category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'category 1', 0, '2017-01-27 02:42:46', '2016-12-28 09:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_cities`
--

CREATE TABLE `oollah_cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_cities`
--

INSERT INTO `oollah_cities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'New York', 0, '2017-07-17 23:12:15', '2017-07-17 23:12:15'),
(11, 'Edinburg', 0, '2017-07-27 06:51:58', '2017-07-27 06:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_merchant_plans`
--

CREATE TABLE `oollah_merchant_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` int(3) NOT NULL DEFAULT '0',
  `planunit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_merchant_plans`
--

INSERT INTO `oollah_merchant_plans` (`id`, `name`, `expired`, `planunit`, `price`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Plan 1', 3, 'months', 0, 0, '2017-03-04 06:38:10', '2017-03-03 21:38:10'),
(7, 'Plan 2', 6, 'months', 0, 0, '2017-03-04 06:38:17', '2017-03-03 21:38:17'),
(8, 'Plan 3', 1, 'year', 69.99, 0, '2017-01-29 00:13:59', '2017-01-29 00:13:59'),
(9, 'Plan 4', 2, 'years', 89.99, 0, '2017-01-29 00:14:09', '2017-01-29 00:14:09'),
(10, 'Plan 5', 5, 'years', 109.99, 0, '2017-01-29 00:14:17', '2017-01-29 00:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_news`
--

CREATE TABLE `oollah_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likenum` int(10) NOT NULL DEFAULT '0',
  `dislikenum` int(10) NOT NULL DEFAULT '0',
  `commentnum` int(10) NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_news`
--

INSERT INTO `oollah_news` (`id`, `user_id`, `title`, `description`, `photo`, `likenum`, `dislikenum`, `commentnum`, `status`, `created_at`, `updated_at`) VALUES
(2, 23408982, '10 Weird, Funny, Sweet and Out-There Valentine\'s Day Promotions For Singles and Couples', 'If you haven’t figured out yet what you’ll be doing on Valentine’s Day, we’ve got a few ideas. Whether you’re single or in a relationship, there’s something for just about anyone.\r\n\r\nIf you’re expecting to spend the holiday alone, you don’t have to anymore -- you can spend it with love master Michael Bolton in his new Netflix comedy Michael Bolton’s Big, Sexy Valentine’s Day Special. If you’ve been through a bad break up, head over to Hooters, shred a picture of your ex and get a free plate of chicken wings.\r\n\r\nRelated: Shocking Valentine\'s Day Stats That Will Make You Rethink Your Marketing\r\n\r\nOr hey, maybe you’re happily in a relationship. But rather than getting your partner some boring chocolates -- you could, oh, name a cockroach after them at the Bronx Zoo.\r\n\r\nFrom Krispy Kreme to Bojangles to Starbucks -- there are plenty of Valentine’s Day-themed sweets available. However you’re feeling -- it’s time to start planning. Check out these 10 wild Valentine’s Day promotions.', 'news1.jpg', 0, 0, 0, 1, '2017-07-20 02:32:46', '0000-00-00 00:00:00'),
(3, 23408982, 'These Top 10 Franchises Lead Entrepreneur.com\'s Franchise 500', 'Entrepreneur.com\'s Franchise 500 list has always been a who\'s who of franchising leaders. This top ten takes that even further, showcasing who\'s leading the pack. Take a read -- and learn more about our list\'s biggest players.', 'news2.jpg', 3, 0, 2, 0, '2017-03-03 09:38:06', '0000-00-00 00:00:00'),
(4, 24734289, 'hello news test', 'dfgdfgdfg dfgdfgd dfgdfgdfg dfgdfgdfg dfrgdfgdfg dfgdfgdfg dfgdfg dfgdfgd dfgdfgd dfgdfg dfgdfgdf dfgdfgdf dfgdfgdfg', 'DYkumkSGEl.jpg', 0, 0, 0, 0, '2017-03-03 09:03:26', '0000-00-00 00:00:00'),
(5, 24734289, 'hello. kkkkkkk', 'asdasdasdasdasdasd', 'jUJTlI7r26.jpg', 0, 0, 0, 0, '2017-03-03 09:05:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_news_comments`
--

CREATE TABLE `oollah_news_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_news_comments`
--

INSERT INTO `oollah_news_comments` (`id`, `news_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, 5, 'comment 1', 0, '2017-01-26 12:15:02', '0000-00-00 00:00:00'),
(7, 3, 6, 'comment 3', 0, '2017-01-26 12:15:14', '0000-00-00 00:00:00'),
(8, 3, 24734289, 'hello. I like this news.', 0, '2017-03-03 09:30:56', '0000-00-00 00:00:00'),
(9, 3, 24734289, 'hello. this news is very ni8ce.', 0, '2017-03-03 09:38:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_notifications`
--

CREATE TABLE `oollah_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` date NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_notifications`
--

INSERT INTO `oollah_notifications` (`id`, `title`, `description`, `expired`, `status`, `created_at`, `updated_at`) VALUES
(1, 'good news', '<p>We are starting new oollah for promotion.</p>\r\n', '2017-01-30', 1, '2017-07-20 02:47:42', '2017-07-19 18:47:42'),
(2, 'good luck', '<p>We starting new oollah.</p>\r\n', '2017-03-31', 1, '2017-07-20 02:47:42', '2017-07-19 18:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_payment_method`
--

CREATE TABLE `oollah_payment_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_payment_method`
--

INSERT INTO `oollah_payment_method` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 0, '2017-01-28 08:38:41', '0000-00-00 00:00:00'),
(2, 'Stripe', 1, '2017-01-28 08:39:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_promotions`
--

CREATE TABLE `oollah_promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) NOT NULL DEFAULT '0',
  `merchant_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `claimnum` int(10) NOT NULL DEFAULT '0',
  `claimednum` int(10) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `discount_price` float NOT NULL DEFAULT '0',
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qrcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likenum` int(10) NOT NULL DEFAULT '0',
  `dislikenum` int(10) NOT NULL DEFAULT '0',
  `favonum` int(10) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `featured` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_promotions`
--

INSERT INTO `oollah_promotions` (`id`, `cat_id`, `merchant_id`, `title`, `description`, `start_time`, `end_time`, `claimnum`, `claimednum`, `price`, `discount_price`, `lat`, `lon`, `address`, `region`, `qrcode`, `likenum`, `dislikenum`, `favonum`, `type`, `status`, `created_at`, `updated_at`, `featured`) VALUES
(1, 2, 23408982, 'ha food', 'It can search nearby coupons around the user and its expiration date. Coupon code can be only unlocked once the user logged to the app and claim the coupon. Regardless if the user uses another device, when they logged again, the claimed coupons shows under “Claim Coupon” section.', '2017-01-18', '2017-01-30', 50, 13, 30, 25, '', '', 'Johor', 'Johor', '', 6, 0, 4, 'product', 0, '2017-07-16 06:38:50', '2017-01-27 23:18:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oollah_promotion_claimed`
--

CREATE TABLE `oollah_promotion_claimed` (
  `id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `verified` int(3) NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_promotion_claimed`
--

INSERT INTO `oollah_promotion_claimed` (`id`, `promotion_id`, `user_id`, `verified`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 23408982, 1, 0, '2017-02-25 13:46:18', '2017-01-27 23:18:23'),
(4, 1, 23408982, 1, 0, '2017-02-25 13:46:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_promotion_favorites`
--

CREATE TABLE `oollah_promotion_favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `promotion_id` int(10) NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_promotion_favorites`
--

INSERT INTO `oollah_promotion_favorites` (`id`, `user_id`, `promotion_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 0, '2017-01-29 12:18:08', '2017-01-27 23:18:23'),
(3, 7, 2, 0, '2017-01-29 04:45:17', '0000-00-00 00:00:00'),
(4, 9, 1, 0, '2017-01-29 12:26:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_promotion_photos`
--

CREATE TABLE `oollah_promotion_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(10) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_promotion_photos`
--

INSERT INTO `oollah_promotion_photos` (`id`, `promotion_id`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'ck4QpBOzo2.jpg', 0, '2017-01-29 04:44:30', '2017-01-27 23:18:50'),
(2, 2, 'GQKWYHppIw.jpg', 0, '2017-01-29 04:44:32', '2017-01-27 23:18:23'),
(3, 1, 'i9q6InjCAj.jpg', 0, '2017-01-29 04:44:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_tags`
--

CREATE TABLE `oollah_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_tags`
--

INSERT INTO `oollah_tags` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Tag 1', 0, '2017-01-26 12:08:22', '2017-01-26 12:08:22'),
(4, 'Tag 2', 0, '2017-01-26 12:08:28', '2017-01-26 12:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_type`
--

CREATE TABLE `oollah_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_type`
--

INSERT INTO `oollah_type` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Product', 0, '2017-07-16 01:29:31', '2017-01-28 05:25:46'),
(3, 'Services', 0, '2017-01-28 14:25:51', '2017-01-28 05:25:51'),
(7, 'Events', 0, '2017-01-28 05:25:59', '2017-01-28 05:25:59'),
(8, 'Others', 0, '2017-01-28 05:26:08', '2017-01-28 05:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_user_details`
--

CREATE TABLE `oollah_user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `merchant_verified` int(3) NOT NULL DEFAULT '0',
  `plan_id` int(10) NOT NULL DEFAULT '0',
  `verified_date` date NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_user_details`
--

INSERT INTO `oollah_user_details` (`id`, `user_id`, `merchant_verified`, `plan_id`, `verified_date`, `comment`, `lat`, `lon`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 7, '2017-01-26', '', '34.01010', '101.23344', 0, '2017-01-29 12:30:50', '0000-00-00 00:00:00'),
(2, 23408982, 0, 0, '0000-00-00', '', '0', '0', 0, '2017-02-25 06:03:52', '0000-00-00 00:00:00'),
(3, 24734289, 0, 0, '0000-00-00', '', '', '', 0, '2017-03-03 07:15:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oollah_user_payments`
--

CREATE TABLE `oollah_user_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `transaction_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `status` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oollah_user_payments`
--

INSERT INTO `oollah_user_payments` (`id`, `user_id`, `payer_id`, `transaction_id`, `transaction_fee`, `transaction_amount`, `transaction_date`, `transaction_currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '23456789', 'aaa2344555', '25.00', '150.00', '2017-01-28 08:03:23', 'USD', 0, '2017-01-28 08:03:23', '0000-00-00 00:00:00'),
(2, 7, '23456788', 'bbb2344455', '25.00', '150.00', '2017-01-28 08:02:08', 'USD', 0, '2017-01-28 08:03:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(37506, 24734446, 'tGz3RTsmOMRoyX8vyOUKOqQWVdefULd9', '2017-07-15 17:23:55', '2017-07-15 17:23:55'),
(37507, 24734446, 'vKeucNMO1MRM19vw6bjD5hONB28dmkrI', '2017-07-17 08:52:37', '2017-07-17 08:52:37'),
(37508, 24734446, 'WA2KRoP27inNG2pCqqN00p3U9zHdBmIL', '2017-07-17 14:32:48', '2017-07-17 14:32:48'),
(37511, 24734446, 'OdFWFuSXayFCTkfINSP4uk1Go7cvCF0U', '2017-07-18 00:03:40', '2017-07-18 00:03:40'),
(37512, 24734446, 'Wk1zoob2qjDzB8H45DMwGYVM8paw7UxL', '2017-07-18 07:40:59', '2017-07-18 07:40:59'),
(37513, 24734446, 'jyQyQJXumXouBupnpfYWOz21QamO87qd', '2017-07-18 10:37:59', '2017-07-18 10:37:59'),
(37514, 24734446, 'N6nLj7qK3dJxPo35VwvUGpj0ubZkGhmT', '2017-07-18 14:35:14', '2017-07-18 14:35:14'),
(37515, 24734446, 'Dsw56RWHjehvWqhw7qcfhCLYGKh0Q7bk', '2017-07-18 14:35:14', '2017-07-18 14:35:14'),
(37520, 24734446, 'ompGg2qpCvGQJoktDP6HKdlPDIF5kxJP', '2017-07-19 16:49:07', '2017-07-19 16:49:07'),
(37521, 24734446, 'h7RdfMtNvcA6IppQsccmV326PLmTmUD6', '2017-07-20 07:48:58', '2017-07-20 07:48:58'),
(37522, 24734446, 'avCspj1fQuLEbBJxhiOrwW3PRIZ5sahX', '2017-07-20 14:12:04', '2017-07-20 14:12:04'),
(37523, 24734446, 'oFDMQqudTNASfYo5ktultlbKwpLa6lHW', '2017-07-20 17:38:15', '2017-07-20 17:38:15'),
(37524, 24734446, '0whbc6GHdRJbvcKsMSQb3gfckyhz6991', '2017-07-21 07:36:42', '2017-07-21 07:36:42'),
(37525, 24734446, 'hP7Ge2nwIfm0FUDyLhCbHkTwbAokUULB', '2017-07-21 07:55:07', '2017-07-21 07:55:07'),
(37526, 24734446, 'j2uI97dIQZvOsDu0QQVXPp8nGb6GVA8C', '2017-07-21 14:15:47', '2017-07-21 14:15:47'),
(37527, 24734446, 'ALWWzbYSg0V6PofSlGMm5HHbJyfLxyQi', '2017-07-22 07:49:37', '2017-07-22 07:49:37'),
(37528, 24734446, '82n8speHFlJ1ZPQKj6fHt7zBkKfnIFUj', '2017-07-22 14:03:23', '2017-07-22 14:03:23'),
(37529, 24734460, 'CXWBUvTsr7vAOUCG5oO7bgE9hABjJsoO', '2017-07-22 20:41:33', '2017-07-22 20:41:33'),
(37530, 24734460, 'EwKzu6Jc79x7SP1kI5vjbuiyc5YyRFDQ', '2017-07-22 21:12:43', '2017-07-22 21:12:43'),
(37531, 24734446, 'nb5Gy9iZzB86l7rPk2mOcszmIWFMFdhe', '2017-07-22 22:38:24', '2017-07-22 22:38:24'),
(37532, 24734461, 'bOmBajZq4OuusF5IhJeekSXsZdSVleUV', '2017-07-22 23:16:19', '2017-07-22 23:16:19'),
(37533, 24734462, 'JFT17sEMQDnVsOuCNWjaXU27m3Xtj5IQ', '2017-07-22 23:22:37', '2017-07-22 23:22:37'),
(37534, 24734461, 'M6uyWiKrJF3ZHiJd8LaaRbOOz2icl7VS', '2017-07-22 23:35:02', '2017-07-22 23:35:02'),
(37535, 24734461, 'ehRJabU4vBqZQD3t9RzRERYSn5qqlqx0', '2017-07-23 00:07:21', '2017-07-23 00:07:21'),
(37536, 24734461, 'lpDu2Fg9CqBHdJWH4jWurOLFBc35AmHB', '2017-07-23 00:09:25', '2017-07-23 00:09:25'),
(37537, 24734461, 'yAAV3GbkfZu5b9R1wGzE5BTy31qiQMHk', '2017-07-23 00:09:43', '2017-07-23 00:09:43'),
(37538, 24734461, 'BysyjKDDnmJtaESTAtqdym8HSsl4yQ6Z', '2017-07-23 00:10:19', '2017-07-23 00:10:19'),
(37539, 24734461, 'pxG6UyLdX0Jmuwfwaq6IyzfVQhqqpwnF', '2017-07-23 00:13:48', '2017-07-23 00:13:48'),
(37540, 24734446, 'DhCjQCW2yQUhHVdVaxRNQTpyJLjQaRhJ', '2017-07-23 14:25:44', '2017-07-23 14:25:44'),
(37541, 24734446, 'gV1WYs11v859naZ8RcylShwe0ggpec1s', '2017-07-23 19:33:36', '2017-07-23 19:33:36'),
(37542, 24734463, '27viMpcOpvqGfASzqrWu2ws39wlg4YFj', '2017-07-23 20:41:49', '2017-07-23 20:41:49'),
(37543, 24734463, 'kvFO9ZOJ2fE5afJQjYoejZfzT60Z1vk1', '2017-07-23 20:43:14', '2017-07-23 20:43:14'),
(37544, 24734463, 'zoGtN1QUabNqsnaaefHV5qVwooxoaxaC', '2017-07-23 20:44:22', '2017-07-23 20:44:22'),
(37545, 24734463, 'GHHch7TcFgCxUHyE8173kP3CvoOjGhc1', '2017-07-23 20:46:29', '2017-07-23 20:46:29'),
(37546, 24734463, 'e1Kp1RhY1jv8ggcMsQrY38AjSxi2Txy0', '2017-07-23 20:46:30', '2017-07-23 20:46:30'),
(37547, 24734463, '9RkOLgJNapsyBlbYKnbvyqeJ1BtpU7fw', '2017-07-23 20:46:30', '2017-07-23 20:46:30'),
(37548, 24734463, 'BtOqpo38R8zrObxz61GlNEuwTgcfsoNZ', '2017-07-23 20:48:20', '2017-07-23 20:48:20'),
(37549, 24734463, 'v3P1Ii72T4F3ScmWtj2yvwzjNqZDFM4L', '2017-07-23 20:48:20', '2017-07-23 20:48:20'),
(37550, 24734463, 'MpIUk3hMegUZhffrBtG34OcJY9YyqFdw', '2017-07-23 20:48:21', '2017-07-23 20:48:21'),
(37551, 24734463, 'zk9R7RHjbOxYBqDQpbfChhLuCVhZC99i', '2017-07-23 21:15:01', '2017-07-23 21:15:01'),
(37552, 24734463, 'r7KUuSu1u0iMHhGl4UwVLR9xNV0WpmFw', '2017-07-23 21:20:40', '2017-07-23 21:20:40'),
(37553, 24734463, 'LLpn02OEPp1V1VOBVB5xOSEUPqH8odU8', '2017-07-23 21:20:41', '2017-07-23 21:20:41'),
(37554, 24734463, 'mrmnkPMP2amrF3kqXZGsLC5EQJI3A5Bu', '2017-07-23 21:20:41', '2017-07-23 21:20:41'),
(37555, 24734463, 'XjNE7IGLKnmfFTiSWYXjV5Y17lEnVNAR', '2017-07-23 21:37:20', '2017-07-23 21:37:20'),
(37556, 24734463, 'S52JZMGSPSgK8rZnrFqUV8mywALjbZ9L', '2017-07-23 21:38:32', '2017-07-23 21:38:32'),
(37557, 24734463, 'IGj08w98nbuQ9NrQNtBxFCSqFRwHjWCq', '2017-07-23 21:38:33', '2017-07-23 21:38:33'),
(37558, 24734463, 'amMxHtHDfkqh2mwcv7nLL1PZPgRTNNpr', '2017-07-23 21:38:33', '2017-07-23 21:38:33'),
(37559, 24734463, 'MLLr9SS4JVLnjOjur96Ko9DdgDc2ankE', '2017-07-23 21:39:09', '2017-07-23 21:39:09'),
(37560, 24734463, 'wvqGr1ZLnXYUplqcoovxIJh2vLYoSATs', '2017-07-23 21:40:56', '2017-07-23 21:40:56'),
(37561, 24734463, 'hOAckWxg556489ON9XarAUljFM4LFfAf', '2017-07-23 21:40:56', '2017-07-23 21:40:56'),
(37562, 24734463, '4HkwIcsfJm7NeQmENS4mNBH6FlbeSOQB', '2017-07-23 21:40:57', '2017-07-23 21:40:57'),
(37563, 24734463, 'Jtnl0SLxflhTEGr5sV878UwVSqZR2gvA', '2017-07-23 21:41:24', '2017-07-23 21:41:24'),
(37564, 24734463, 'IuavQJKqajWdWf4b023g5WCeQwi3PfCh', '2017-07-23 21:42:30', '2017-07-23 21:42:30'),
(37565, 24734463, 'SHtaRT78UWOqj5wMQnS2jdGryc29tfFQ', '2017-07-23 21:42:55', '2017-07-23 21:42:55'),
(37566, 24734463, 'Pbh3aPt264DIk69Kx14hDyPJq98EpzvI', '2017-07-23 21:42:55', '2017-07-23 21:42:55'),
(37567, 24734463, 'pyUbNizUdbstn0bWztOXDfBRkBjiDq7D', '2017-07-23 21:42:55', '2017-07-23 21:42:55'),
(37568, 24734463, 'S8KRe7FGpJfy1APZRg4ZFloUUCvijNVM', '2017-07-23 21:43:16', '2017-07-23 21:43:16'),
(37569, 24734463, 'gV9kgpFpJrEQ16LC2nfX1FYTG7qUI72h', '2017-07-23 21:44:00', '2017-07-23 21:44:00'),
(37570, 24734463, 'x00bznKaBkghHvzX2Klel53VeFzE4NJ4', '2017-07-23 21:44:39', '2017-07-23 21:44:39'),
(37571, 24734446, '6xmGm2ST5YSBmluJ3gt0yXrXmrlkWeAX', '2017-07-24 08:19:11', '2017-07-24 08:19:11'),
(37572, 24734463, 'cbQzNE2mTHbr8p59cKg6ZQ9yC5SGXyLJ', '2017-07-24 08:46:44', '2017-07-24 08:46:44'),
(37573, 24734463, '61LgPjJTNoK1AnWiDRfrUwtM0pdFy63m', '2017-07-24 08:46:45', '2017-07-24 08:46:45'),
(37574, 24734463, '2FimyzL1CpSBCP0tu7BtiRafUbo5mTkP', '2017-07-24 08:46:45', '2017-07-24 08:46:45'),
(37575, 24734463, 'HKgmjqHzds1IJ05xZFaOqd3KGaqSOamd', '2017-07-24 08:47:04', '2017-07-24 08:47:04'),
(37576, 24734463, 'QNBFhZqbzX9Lj4zslcQTUJrKWnl44RDa', '2017-07-24 08:47:05', '2017-07-24 08:47:05'),
(37577, 24734463, '7ZbAgFGb7zjKOOOaLnobHRk7BY2rGorq', '2017-07-24 09:52:22', '2017-07-24 09:52:22'),
(37578, 24734463, 'Z6B78yIKkN4k5fkK2i3kyDdAk5dlOyuY', '2017-07-24 10:34:22', '2017-07-24 10:34:22'),
(37579, 24734463, '4XuGo0gITpJU6QJqj5XxFijIh2RETaX7', '2017-07-24 10:34:30', '2017-07-24 10:34:30'),
(37580, 24734463, 'eScQ39ANFITkP3mpzBx5SiUyFoaWx5m5', '2017-07-24 10:35:53', '2017-07-24 10:35:53'),
(37581, 24734463, 'Ay8F8OhUdLq5RH3F4CuWyWaeZMM9KEdf', '2017-07-24 14:28:12', '2017-07-24 14:28:12'),
(37582, 24734463, 'APeWm7h1RITloqMMGJarE5VuWBMpgquV', '2017-07-24 14:28:44', '2017-07-24 14:28:44'),
(37583, 24734463, 'eO5I4zgCFX3nUR4x2Z4mlSaenZXu2WkH', '2017-07-24 14:34:38', '2017-07-24 14:34:38'),
(37584, 24734463, '1F2PwW7WPXXhR835J0g7pWso1RFBWneM', '2017-07-24 14:34:42', '2017-07-24 14:34:42'),
(37585, 24734463, 'b1HyB59LY98N2hpeGmD2vGdqr3fw5ZHE', '2017-07-24 14:36:00', '2017-07-24 14:36:00'),
(37586, 24734463, 'v9BXQHR8xG3kOnIOv7OePHjQCoNFVEMy', '2017-07-24 14:36:02', '2017-07-24 14:36:02'),
(37587, 24734463, 'AdQGIiFeT8rZNKS0w81BRGd01I0p8YlC', '2017-07-24 14:36:05', '2017-07-24 14:36:05'),
(37588, 24734463, 'z2CN5dvpKygFhOI2aRrjyVBmZ4phOwAZ', '2017-07-24 14:37:27', '2017-07-24 14:37:27'),
(37589, 24734463, 's5o6Vbh6cvBsqrSzbf6Sou1lp2pD5W5G', '2017-07-24 14:37:29', '2017-07-24 14:37:29'),
(37590, 24734463, 'zdLh7Y8vkxMi2Dmr8tQzRZ6fOqeoBAFR', '2017-07-24 14:37:31', '2017-07-24 14:37:31'),
(37591, 24734463, 'LJ7wktdPK3fn18Rhxm6eMMsXy5mO1oNC', '2017-07-24 14:37:33', '2017-07-24 14:37:33'),
(37592, 24734463, 'nXhNCijWNUcvtXT7W9fzldHClPGXuWw1', '2017-07-24 14:37:35', '2017-07-24 14:37:35'),
(37593, 24734463, 'CxIjm2HfQSkOWeH2bJ38fbsFEWNp95Rf', '2017-07-24 14:37:37', '2017-07-24 14:37:37'),
(37594, 24734463, 'L6IcE7sPSDSyTaJU9ZaXBKAM5p4HYwEd', '2017-07-24 14:37:39', '2017-07-24 14:37:39'),
(37595, 24734463, 'aS6jOA8S2VePJXHfylmAeph0biCLZYXb', '2017-07-24 14:37:41', '2017-07-24 14:37:41'),
(37596, 24734463, 'oMTS7c0DDEqSNsb96LTq1XL5WjP1N05j', '2017-07-24 14:37:42', '2017-07-24 14:37:42'),
(37597, 24734463, 'twqbjUG5pyfVZNsTb7P0NYlLVhuDuv8z', '2017-07-24 14:37:45', '2017-07-24 14:37:45'),
(37598, 24734463, 'jfdNPXtcE5J62bWvN3IZJYNNMvjtXUhe', '2017-07-24 14:37:46', '2017-07-24 14:37:46'),
(37599, 24734463, 'QKHZVOB1grYQmLXMCtP88l5rY2TGhY0a', '2017-07-24 14:43:18', '2017-07-24 14:43:18'),
(37600, 24734463, 'AGJUPFulyCkJslFseHobQNIkFwNweiXz', '2017-07-24 14:43:35', '2017-07-24 14:43:35'),
(37601, 24734463, 'zWeIkbY8YvQ6tl0IQT9LIen3XrEw3vBI', '2017-07-24 14:43:39', '2017-07-24 14:43:39'),
(37602, 24734463, 'ee5attwNnAcFGkXGItwSTigdQkPVhy28', '2017-07-24 14:43:41', '2017-07-24 14:43:41'),
(37603, 24734463, '7seo3rnVBeEgN1x1nWqqBVVrPdrS2gLk', '2017-07-24 14:43:43', '2017-07-24 14:43:43'),
(37604, 24734463, 'F2VpPW6XAEi0jwx5qtLVbyiKg2WMV0Dj', '2017-07-24 14:43:44', '2017-07-24 14:43:44'),
(37605, 24734463, 'T2NLN9ryWD7m1gEXcWPXN4q9keenUUUq', '2017-07-24 14:43:46', '2017-07-24 14:43:46'),
(37606, 24734463, '2KOy1C08NUd6E4i4NXnvFM8iafdPNIu1', '2017-07-24 14:43:47', '2017-07-24 14:43:47'),
(37607, 24734463, 'eZjTTwVtQ9fMJolmhtPkJpJAP5773Hwo', '2017-07-24 14:43:49', '2017-07-24 14:43:49'),
(37608, 24734463, '6N2DkcNSHMs48P9hO9piTswVcbbEWQXk', '2017-07-24 14:43:51', '2017-07-24 14:43:51'),
(37609, 24734463, '9ySVwdGboCVLOugTXCcHcKzbcr6DhDKr', '2017-07-24 15:14:57', '2017-07-24 15:14:57'),
(37610, 24734463, '9WtvBlDaKjajzwjDCD9YKO7mrgY1Jr8w', '2017-07-24 15:14:57', '2017-07-24 15:14:57'),
(37611, 24734463, 'dY1E5UQuua2lgLQbgACnv3OUAmLBTVoW', '2017-07-24 15:15:04', '2017-07-24 15:15:04'),
(37612, 24734463, 'YwBlKyQPhvOKk0SFfAIT4QHxc6C3UsjA', '2017-07-24 15:15:04', '2017-07-24 15:15:04'),
(37613, 24734463, 'AbOEvbgqR2BGTF1Q468M4NypuFNelNoW', '2017-07-24 15:15:07', '2017-07-24 15:15:07'),
(37614, 24734463, 'GcDNMJJF9zz9EIvPISMPocqkcJatPnj1', '2017-07-24 15:15:07', '2017-07-24 15:15:07'),
(37615, 24734463, 'UJULgAEutvH68ElVRTNTyARVwQlQePNa', '2017-07-24 15:15:13', '2017-07-24 15:15:13'),
(37616, 24734463, 'thNufRFzitAmu4Xy4wJ2dt2KDwH06TxG', '2017-07-24 15:15:13', '2017-07-24 15:15:13'),
(37617, 24734463, 'EpSPrAFdPN1uAL1zQjmCKYm1GrYsOb75', '2017-07-24 15:15:14', '2017-07-24 15:15:14'),
(37618, 24734463, 'Z4ZenTdjicQdaJZCBCobHCLHo5XUEte4', '2017-07-24 15:15:15', '2017-07-24 15:15:15'),
(37619, 24734463, 'bGM83QOlNFfOrLS5e7YKTS1OtmXdFZBC', '2017-07-24 15:15:19', '2017-07-24 15:15:19'),
(37620, 24734463, 'YMqeLkIF6N7TNIYzX87ElBdmgXDyYoV7', '2017-07-24 15:15:20', '2017-07-24 15:15:20'),
(37621, 24734463, 'TEomWnZAbxgy25OqTgXMNQNz1GfBPeZQ', '2017-07-24 15:15:21', '2017-07-24 15:15:21'),
(37622, 24734463, 'Uy0jgl8w52r40hxxIiCvdOtJMm3TQxYd', '2017-07-24 15:15:21', '2017-07-24 15:15:21'),
(37623, 24734463, 'bNK3AYmv6KtnIMh7Ywnrgwyib8sVeIDn', '2017-07-24 15:15:26', '2017-07-24 15:15:26'),
(37624, 24734463, 'uqeYCF1I8STb2YgEWjumbpQ1rDS7pMrw', '2017-07-24 15:15:26', '2017-07-24 15:15:26'),
(37625, 24734463, 'STwFsaVkpGqochJ9um27GqgELSUt1cyM', '2017-07-24 15:15:28', '2017-07-24 15:15:28'),
(37626, 24734463, 'JLlQF0sj1HcvvprQP883cwzA2Q47cZBi', '2017-07-24 15:15:28', '2017-07-24 15:15:28'),
(37627, 24734463, 'NtPMFbNXVDQQBf9JZBAj6Xqz5sYXOLjE', '2017-07-24 15:15:35', '2017-07-24 15:15:35'),
(37628, 24734463, '8etA0vl6nYm1hll7fdJCJqJB72TLyM8x', '2017-07-24 15:15:36', '2017-07-24 15:15:36'),
(37629, 24734463, 'FjgMa4BOR4lnBuIhxRFZucEGVLLmUwrf', '2017-07-24 15:16:23', '2017-07-24 15:16:23'),
(37630, 24734463, 'gu8MgXqxcX3p627e2um2rR8txN39KNns', '2017-07-24 16:45:26', '2017-07-24 16:45:26'),
(37631, 24734463, 'DIxllQlRUUtZcifYX4zNjS4EQhhG6NyI', '2017-07-24 16:46:30', '2017-07-24 16:46:30'),
(37632, 24734463, 'ptta588iFHlABOb03aiem8IWzYOi2Fti', '2017-07-24 16:46:51', '2017-07-24 16:46:51'),
(37633, 24734463, 'KXsARGUf2c8yLgqpIgap5St1q8zy8SnN', '2017-07-24 16:47:28', '2017-07-24 16:47:28'),
(37634, 24734463, 'c8SCSK7jWDsPEUdzrZZ7VC6sZjZqxaoz', '2017-07-24 16:47:54', '2017-07-24 16:47:54'),
(37635, 24734463, 'tdceBToQH3LMqLhULkTfrJLH1lBrENUw', '2017-07-24 16:48:02', '2017-07-24 16:48:02'),
(37636, 24734463, '1LzO1WvnD1Ds4vvVc0kaQ19TBvq5bvT1', '2017-07-24 16:53:51', '2017-07-24 16:53:51'),
(37637, 24734463, 'UY4digtDQGImlBd73SZ5m7Ah2puCoWff', '2017-07-24 17:09:20', '2017-07-24 17:09:20'),
(37638, 24734463, 'g28qhkQ6VLBJPNuDwevc0HFx24D2i3YD', '2017-07-24 17:10:39', '2017-07-24 17:10:39'),
(37639, 24734463, '2PUc8qDvmCcN1l5NSouFyMFq8O5O51Dt', '2017-07-24 17:15:34', '2017-07-24 17:15:34'),
(37640, 24734463, 'ZLEBEVOYjMTYFVxLO0I6Nz9qmNMVa0Dj', '2017-07-24 17:15:45', '2017-07-24 17:15:45'),
(37641, 24734463, 'k39ctcFaW6uekHKGu0cqhk6TZeTEjHyn', '2017-07-24 17:16:43', '2017-07-24 17:16:43'),
(37642, 24734463, 'ltmr0Wja4Vg6PzkQIi8LUvKPlJXeHyqg', '2017-07-24 17:17:01', '2017-07-24 17:17:01'),
(37643, 24734463, 'lqdtHTRKwHMlghMe55mBqLxF7afyBH8i', '2017-07-24 17:17:08', '2017-07-24 17:17:08'),
(37644, 24734463, 'R7tXROmOOMm8cdR1iM57vXuftLZYPiP3', '2017-07-24 17:17:12', '2017-07-24 17:17:12'),
(37645, 24734463, 'lF1zNhBwi1z7rdjAu03pU3dXFblN4pIC', '2017-07-24 17:17:15', '2017-07-24 17:17:15'),
(37646, 24734463, 'bb2eeBAbstlkpTqA2299ECm2exDRwFJP', '2017-07-24 17:17:21', '2017-07-24 17:17:21'),
(37647, 24734463, 'C8JdnbUXCVM4HM2CSOB0KjxWCuR0yj27', '2017-07-24 17:17:58', '2017-07-24 17:17:58'),
(37648, 24734463, 'zuF4EJpjEptCI7vGTw4GaxkAAKALCbbR', '2017-07-24 17:18:02', '2017-07-24 17:18:02'),
(37649, 24734463, 'ffLg5EweJBEzGNTo89FhQaWwFe6AOoLq', '2017-07-24 17:18:04', '2017-07-24 17:18:04'),
(37650, 24734463, 'PG1ABeSrh8QFKalIniECm1Wr6sJ7eMSG', '2017-07-24 17:18:07', '2017-07-24 17:18:07'),
(37651, 24734463, 'oyjxsMAl2jDp75jDmqxh9Z9JYOuY2rca', '2017-07-24 17:18:07', '2017-07-24 17:18:07'),
(37652, 24734463, 'HzUsbqfAZWVMFRrkSA1NWLsoPBKBEFCu', '2017-07-24 17:19:46', '2017-07-24 17:19:46'),
(37653, 24734463, 'IipjjEQjykU6x34pq7JoOTZar0B2PkJy', '2017-07-24 17:21:39', '2017-07-24 17:21:39'),
(37654, 24734463, 'Qpja9fBjNW6UmGyqTaHVnkePVrWoaeFv', '2017-07-24 17:21:45', '2017-07-24 17:21:45'),
(37655, 24734463, '4ynqgK3aU4GWiss6trHdBTNqZ4bUmZYf', '2017-07-24 17:21:45', '2017-07-24 17:21:45'),
(37656, 24734463, '7VsaOwWqlEF92ZOL7CEWU86YKHSsuPvM', '2017-07-24 17:22:06', '2017-07-24 17:22:06'),
(37657, 24734463, 'uBtNVndvBHuDiKHtWudrOw8af26N43QR', '2017-07-24 17:22:06', '2017-07-24 17:22:06'),
(37658, 24734463, '0TMw5jxStFnKJIlYX2wfzzAJIqxn539B', '2017-07-24 17:22:23', '2017-07-24 17:22:23'),
(37659, 24734463, '1enHw9VlU3J3uD6MygTr3C4whamjAybR', '2017-07-24 17:23:19', '2017-07-24 17:23:19'),
(37660, 24734463, 'JzILh4UAXK9KivIWVuwlZwsKf7EzBuxl', '2017-07-24 17:24:08', '2017-07-24 17:24:08'),
(37661, 24734463, 'jNZo6S0KPkJK8ok3Rsf5fziCqvzNBQ6R', '2017-07-24 17:25:05', '2017-07-24 17:25:05'),
(37662, 24734463, 'V3lXCxkhNHHmD72PzCADLRJqgHiOKHOQ', '2017-07-24 17:25:28', '2017-07-24 17:25:28'),
(37663, 24734463, 'W1ntk7atgFZe76qRppdOP9oGYEVwHiXC', '2017-07-24 17:28:52', '2017-07-24 17:28:52'),
(37664, 24734463, 'lpkJ8kK9Jsx3waep7QMkgNIqk8SIGt7z', '2017-07-24 17:29:09', '2017-07-24 17:29:09'),
(37665, 24734463, '83wRRx0swpTR7lCkRSGs7ZGpTDFixmpd', '2017-07-24 18:21:19', '2017-07-24 18:21:19'),
(37666, 24734463, 'LSo9zuKGoGXvY0DoJCkvT1yA7Luz1mul', '2017-07-24 18:21:44', '2017-07-24 18:21:44'),
(37667, 24734463, 'uAyktLjr2yL5tlpSgK7nNMUl959psYcP', '2017-07-24 20:17:35', '2017-07-24 20:17:35'),
(37668, 24734463, 'VquoL62fW5I2xWlpHrYVYvyGBjTVwaW1', '2017-07-24 20:19:16', '2017-07-24 20:19:16'),
(37669, 24734463, 'wqToxsjoKU4wBp8XlZnhHvWCux9XXg5O', '2017-07-24 20:21:35', '2017-07-24 20:21:35'),
(37670, 24734463, 'g6cjwSpfzrxjUbj3BUYwQmoDW91LvWp3', '2017-07-24 20:34:34', '2017-07-24 20:34:34'),
(37671, 24734463, 'Yn68xFAqqE7pvx1DNHxB2gEStx3NGj91', '2017-07-24 20:35:18', '2017-07-24 20:35:18'),
(37672, 24734463, 'HA9oyJ4y5BC23voMVTnhhbq0jFIwi6WX', '2017-07-24 20:35:18', '2017-07-24 20:35:18'),
(37673, 24734463, 'Cuwx9sxOYEOm48YYZQwh8flUq3KU1dX0', '2017-07-24 20:35:23', '2017-07-24 20:35:23'),
(37674, 24734463, 'HpYp74VDoyfUwNxUrgIrLTtVy8zBSmA7', '2017-07-24 20:35:26', '2017-07-24 20:35:26'),
(37675, 24734463, 'NLCqbYjH2RIJuSVHxaDaA5HhVCV6F2cL', '2017-07-24 20:35:28', '2017-07-24 20:35:28'),
(37676, 24734463, 'XMbEeVF3krS4vXPEcVcEa83nntxyLZD1', '2017-07-24 20:36:17', '2017-07-24 20:36:17'),
(37677, 24734463, 'tgLv2s121Qq9BVSdlKhT0FhlHMwm0DLE', '2017-07-24 20:37:08', '2017-07-24 20:37:08'),
(37678, 24734463, 'soCFLWxhsjf5xWD4S1psd1tLnTaRGt4G', '2017-07-24 20:38:52', '2017-07-24 20:38:52'),
(37679, 24734463, 'IOyPTO7Ldisg1jS3dYqwTD8ella21YW4', '2017-07-24 20:38:54', '2017-07-24 20:38:54'),
(37680, 24734463, '61uIIPDdCimGvxldwvcYqshkXvHKUf3e', '2017-07-24 20:38:55', '2017-07-24 20:38:55'),
(37681, 24734463, 'V09HBkjIhwgovLDY6sqbDpZFUi5BKfoF', '2017-07-24 20:38:59', '2017-07-24 20:38:59'),
(37682, 24734463, 'jFJqEjZlpPANSJBSYYFXN3Lgpwtx7El9', '2017-07-24 20:39:12', '2017-07-24 20:39:12'),
(37683, 24734446, 'J4ZWAyMwaCcP19p5beYQSdrz4kXu03Vn', '2017-07-24 20:40:52', '2017-07-24 20:40:52'),
(37684, 24734463, 'NhdqeJpZleXdWHrPIKC3ZEIQAUl9rxek', '2017-07-24 20:42:43', '2017-07-24 20:42:43'),
(37685, 24734463, '38ACMkXOiD0JStZGIKZtcW7K5QPNjWmo', '2017-07-24 20:42:43', '2017-07-24 20:42:43'),
(37686, 24734463, 'Dk4cES7gT7nukuQrAz7KwURN5JEbYaKt', '2017-07-24 20:42:55', '2017-07-24 20:42:55'),
(37687, 24734463, 'JzaIQChpjC6e90Uo1ZxDegr5RdOTOnQI', '2017-07-24 20:43:09', '2017-07-24 20:43:09'),
(37688, 24734463, 'kLfzOqjn6M1i9S5oqgoOJbl5Q2TYjeWI', '2017-07-24 20:43:17', '2017-07-24 20:43:17'),
(37689, 24734463, 'NnSWY38vtQjoRjn1Hr1jUOjO6LxaeROL', '2017-07-24 20:44:12', '2017-07-24 20:44:12'),
(37690, 24734463, '3QLGLfHXIDuJMaj13pQOJnon3lKdjPms', '2017-07-24 20:44:17', '2017-07-24 20:44:17'),
(37691, 24734463, 'kPfWCGP15SxuuIDRkl2KQWYW688W2dyG', '2017-07-24 20:44:41', '2017-07-24 20:44:41'),
(37692, 24734463, 'DonPsFBbowM40bEHZGumbyafz1CVo4MO', '2017-07-24 20:44:58', '2017-07-24 20:44:58'),
(37693, 24734463, 'AHURrEGAjxdlIiCBwpcvX5mVcxDLXjmX', '2017-07-24 20:45:09', '2017-07-24 20:45:09'),
(37694, 24734463, 'Q2VBFOJ30tk0eGeuS5xIl84Hq7quyRyu', '2017-07-24 20:53:14', '2017-07-24 20:53:14'),
(37695, 24734463, '0VQu4jvbmgoSRscu7UrWpldLxaIdQVhl', '2017-07-24 20:53:15', '2017-07-24 20:53:15'),
(37696, 24734463, '4lWInkma27QdggcbZgJKAiY2Wm3q5qwr', '2017-07-24 20:53:18', '2017-07-24 20:53:18'),
(37697, 24734463, 'cRlcQu0ZACgJyB4Vvm6MxkxHaMMNNZFX', '2017-07-24 20:54:01', '2017-07-24 20:54:01'),
(37698, 24734463, 'OyyEkHpOhzgoQdFfoqSqXVQtvrODO5eK', '2017-07-24 20:54:07', '2017-07-24 20:54:07'),
(37699, 24734463, 'iFHiuvFdz0IA1Aurzz9F4k58qOufNxbb', '2017-07-24 20:54:48', '2017-07-24 20:54:48'),
(37700, 24734463, '4lrH41rLTfx1COlnVDfptmOBzFmHN5ky', '2017-07-24 20:54:53', '2017-07-24 20:54:53'),
(37701, 24734463, 'y0NewfJF0gppYysKEmmfbrXcwv4LpcN4', '2017-07-24 20:58:04', '2017-07-24 20:58:04'),
(37702, 24734463, 'Yz4gsBR6mMpohMZQoZ0AIP4YNRif4sfu', '2017-07-24 20:58:11', '2017-07-24 20:58:11'),
(37703, 24734463, 'qOQyjQ6Yu6dgnuFHYhg4zm3S9r2bOTW6', '2017-07-24 20:58:12', '2017-07-24 20:58:12'),
(37704, 24734463, 'iHvJEWHO0zFuGRpWi8OVy1lwyo2xi33X', '2017-07-24 20:58:15', '2017-07-24 20:58:15'),
(37705, 24734463, 'pKBX5I5x4anvuHf7vPg4SsheMayOEuUj', '2017-07-24 20:58:15', '2017-07-24 20:58:15'),
(37706, 24734463, 'sCsbgG7z1orOoAMwK84FABtfvcgh8vFW', '2017-07-24 20:58:54', '2017-07-24 20:58:54'),
(37707, 24734463, 'KWtoXnG7wkuYOj2q68gUCdBCVg5vSNqJ', '2017-07-24 20:59:02', '2017-07-24 20:59:02'),
(37708, 24734463, 'Hfey2oWldG0NWeNGRTIg4fVH3FNZD4P6', '2017-07-24 20:59:16', '2017-07-24 20:59:16'),
(37709, 24734463, '3bQFcZo5W0UkSXUlDNiL8fi7UyEDvqbA', '2017-07-24 20:59:16', '2017-07-24 20:59:16'),
(37710, 24734463, 'YelIVzTG8Nk8G4f3MuKfWezqfnssoNuz', '2017-07-24 20:59:23', '2017-07-24 20:59:23'),
(37711, 24734463, 't8ldKftFt6EUmZWJvRI4lLUaVQcINFGc', '2017-07-24 20:59:24', '2017-07-24 20:59:24'),
(37712, 24734463, '0IjuTdnZRRTFs3rNN02NbFgGBtJUbWAM', '2017-07-24 21:05:07', '2017-07-24 21:05:07'),
(37713, 24734463, 'wKalP5e6Vz2BVnGSwSwo8Iv5sTM0iFbt', '2017-07-24 21:05:11', '2017-07-24 21:05:11'),
(37714, 24734463, 'vPNodrH7idUXH4JbJ4kk0TfjLbVi4M9f', '2017-07-24 21:05:11', '2017-07-24 21:05:11'),
(37715, 24734463, 'FBd7DCUXhdljPrDllsCp91sErhP4amkM', '2017-07-24 21:05:14', '2017-07-24 21:05:14'),
(37716, 24734463, 'YWGQ6j7sxvZ5rWK7djnqsNwQiQimB6SA', '2017-07-24 21:05:15', '2017-07-24 21:05:15'),
(37717, 24734463, 'c52oZwjWs851nvmcTqnO3eHm1IBs2I9F', '2017-07-24 21:09:58', '2017-07-24 21:09:58'),
(37718, 24734463, 'x1tOSpg4f5shv6RJH8IKhxGz32XnR9t8', '2017-07-24 21:10:30', '2017-07-24 21:10:30'),
(37719, 24734463, 'enSMId8Cz00rTbAJdPjf9l0Gf2P10GTv', '2017-07-24 21:10:31', '2017-07-24 21:10:31'),
(37720, 24734463, 'oOp5rauimpFmA7YZqzIHSsHpb5ZMb1Fy', '2017-07-24 21:10:34', '2017-07-24 21:10:34'),
(37721, 24734463, 'DkHLiGrhZjM9on9UxYleTXiH2Iy1d3FL', '2017-07-24 21:10:35', '2017-07-24 21:10:35'),
(37722, 24734463, '1SgdJP0cVAfIteWUasZnCT33HxsZqfZE', '2017-07-24 21:12:48', '2017-07-24 21:12:48'),
(37723, 24734463, 'a9lktYZqhJUj1B4ZCwNwuy4ZACDzxPCy', '2017-07-24 21:13:17', '2017-07-24 21:13:17'),
(37724, 24734463, '32WnXrFXZrgp9BeqC1MTXz0ZwwDFvLs3', '2017-07-24 21:13:17', '2017-07-24 21:13:17'),
(37725, 24734463, '1NqnqlF76RTdEuhRkmZEkwNiQ2YWqHsy', '2017-07-24 21:13:19', '2017-07-24 21:13:19'),
(37726, 24734463, 'xfk5Mw49eYWCRNFwLEVvfmbM15eEhRv1', '2017-07-24 21:13:20', '2017-07-24 21:13:20'),
(37727, 24734463, 'sWMwInEiP4EdWNSpKXZxj0lD7HpO7Vpk', '2017-07-24 21:15:28', '2017-07-24 21:15:28'),
(37728, 24734463, 'k8LVszEXlkmXFD07AXhVIwKdvE24C9ii', '2017-07-24 21:27:55', '2017-07-24 21:27:55'),
(37729, 24734463, 'Hft5fPnlH2maZ46Cn3G6d9ywYQz6m3xA', '2017-07-24 21:28:51', '2017-07-24 21:28:51'),
(37730, 24734463, 'LPzZauTy6SxJPFSui2NvXRwIBSYB6CUM', '2017-07-24 21:28:52', '2017-07-24 21:28:52'),
(37731, 24734463, 'BlP9LscwCB6niHFnJf3dHaGuu5FkLKTw', '2017-07-24 21:29:18', '2017-07-24 21:29:18'),
(37732, 24734463, 'D3QsI9mCSDlnNbed4GDOVW61WasYiiec', '2017-07-24 21:29:20', '2017-07-24 21:29:20'),
(37733, 24734463, 'QKIowPX9Dtw5KiB7mFa9ziT9lz4MIlfz', '2017-07-24 21:29:20', '2017-07-24 21:29:20'),
(37734, 24734463, 'FdD0d8Zc2duR8VY5xGOSoqcFIUpPivz4', '2017-07-24 21:30:18', '2017-07-24 21:30:18'),
(37735, 24734463, 'YdGER47nnXJbXarQAfw8BNdd9uHgccZP', '2017-07-24 21:31:11', '2017-07-24 21:31:11'),
(37736, 24734463, '01FQ0BfQFqth6es0WQlAQII6RxoRMuat', '2017-07-24 21:31:19', '2017-07-24 21:31:19'),
(37737, 24734463, 'EwakgNT2uiG5fWqcje4Y8bcmA23UPf0j', '2017-07-24 21:31:20', '2017-07-24 21:31:20'),
(37738, 24734463, '3MRY0d4tcqZLvxRWBjBopOUsSiFhVACp', '2017-07-24 21:31:24', '2017-07-24 21:31:24'),
(37739, 24734463, '3hlZFwYx9za2k80EoY5QLVVSOYyew9s3', '2017-07-24 21:31:25', '2017-07-24 21:31:25'),
(37740, 24734463, 'yeKCxiIzzxnZq8Mk8rtVem2I4n88cmlm', '2017-07-24 21:32:28', '2017-07-24 21:32:28'),
(37741, 24734463, '00s5qQ8Q7GoLwEkIJbanr1ibrDk8rXxA', '2017-07-24 21:32:29', '2017-07-24 21:32:29'),
(37742, 24734463, 'mZe8wa5kMruJpD5vsGS5c086S1xstisW', '2017-07-24 21:32:32', '2017-07-24 21:32:32'),
(37743, 24734463, 'l4c3kbl5P5HhEbUrqDPhTReFUqbPdQNf', '2017-07-24 21:32:32', '2017-07-24 21:32:32'),
(37744, 24734463, 'b0MruXk01bwmSNqpg2cxMGrZJF3bC83p', '2017-07-24 21:34:57', '2017-07-24 21:34:57'),
(37745, 24734463, '7raRYz7R5O0PgdBJLYQCIdGNs2yWVuf6', '2017-07-24 22:27:14', '2017-07-24 22:27:14'),
(37746, 24734463, 'tbdDBEoubST13DGt6R1a616dvZzahi2v', '2017-07-24 22:27:15', '2017-07-24 22:27:15'),
(37747, 24734463, 'RiQ7TqzCqNoPUj864hAuZltH2AZhNUEW', '2017-07-24 22:27:17', '2017-07-24 22:27:17'),
(37748, 24734463, '7XzW3eCFRkt2iRBjARbOHUR6ddvvIVH1', '2017-07-24 22:27:17', '2017-07-24 22:27:17'),
(37749, 24734463, 'ZYCddWwV0wwnmRISANZ3f39RlC98sTf8', '2017-07-24 22:27:19', '2017-07-24 22:27:19'),
(37750, 24734463, 'FTpIJNHSYWMUl2QpaRnofD6CApXFWomi', '2017-07-24 22:27:19', '2017-07-24 22:27:19'),
(37751, 24734463, '4YcySlcHfD1Xfx67cz8wpgcv1cIEScDx', '2017-07-24 22:27:21', '2017-07-24 22:27:21'),
(37752, 24734463, 'fD1YC9rsrRRp0ZMucuapAunqmKo7y3tQ', '2017-07-24 22:27:21', '2017-07-24 22:27:21'),
(37753, 24734463, 'vR7JOA9WQLFEJ33DD0KOP8fcv8j0PxWE', '2017-07-24 22:27:23', '2017-07-24 22:27:23'),
(37754, 24734463, '6VThy3dK3QBW28DXehUX3d8eY3zOdm1K', '2017-07-24 22:27:23', '2017-07-24 22:27:23'),
(37755, 24734463, 'wHZMMo4aVEwqOsYyBJWdHrafqEcSskRi', '2017-07-24 22:27:25', '2017-07-24 22:27:25'),
(37756, 24734463, 'ghTygysYdKhKEXjbMIfGMBeXxw2DxtpX', '2017-07-24 22:27:25', '2017-07-24 22:27:25'),
(37757, 24734463, 'k3CEo55a6zns2PpnWJDRKhd9WfpLKFn2', '2017-07-24 22:27:28', '2017-07-24 22:27:28'),
(37758, 24734463, '4prfGMSKfD6o7gkutckuTGfcJErQ2dVZ', '2017-07-24 22:27:29', '2017-07-24 22:27:29'),
(37759, 24734463, '40LtNdHIcnpQZrbRlcdOMgKY7nh3ayS2', '2017-07-24 22:27:30', '2017-07-24 22:27:30'),
(37760, 24734463, 'yWSAYlnd1qhEoFx3exARJCItpebHXNdG', '2017-07-24 22:27:31', '2017-07-24 22:27:31'),
(37761, 24734463, 'IzSM5sRIlvsjW0L0DfkhM3WV5sMw13jQ', '2017-07-24 22:27:32', '2017-07-24 22:27:32'),
(37762, 24734463, 'bvEIj5Xfvb2tVtJ5dqgvBM7nlAErTEBb', '2017-07-24 22:27:33', '2017-07-24 22:27:33'),
(37763, 24734463, 'duWdkTy3q1v7J9DYbj3YYNreuleu09Tk', '2017-07-24 22:27:34', '2017-07-24 22:27:34'),
(37764, 24734463, 'HLcpE76CP12NUC0KADFtEfkn7hsUksh5', '2017-07-24 22:27:34', '2017-07-24 22:27:34'),
(37765, 24734463, '53BSNnRD6vVsWbSKTjZ56w2s25zHuiWL', '2017-07-24 22:27:48', '2017-07-24 22:27:48'),
(37766, 24734463, 'ROqshdoCUd4y24bhvMdIJNcM99uOsHyB', '2017-07-24 22:27:50', '2017-07-24 22:27:50'),
(37767, 24734463, 'DQGejKRBcikSIDX7iJrs9UhfaBfkGMw2', '2017-07-24 22:27:53', '2017-07-24 22:27:53'),
(37768, 24734463, 'QbPhz53rR0tKL3lvts6D7k29PdGpAKwd', '2017-07-24 22:27:56', '2017-07-24 22:27:56'),
(37769, 24734463, 'AUqxRgjLwIMqNnCuB7p5DDABT3EriqLM', '2017-07-24 22:29:30', '2017-07-24 22:29:30'),
(37770, 24734463, 'P02aQgRH6yDeK274ebAbT33l2rKtH5zt', '2017-07-24 22:29:58', '2017-07-24 22:29:58'),
(37771, 24734463, 'crpbuisqVeHbDosB0r9CRHHDcLs9N1ON', '2017-07-24 22:30:40', '2017-07-24 22:30:40'),
(37772, 24734463, 'sSbIz75CLGYpGLCt0AFpowW5SB7U8WrI', '2017-07-24 22:30:53', '2017-07-24 22:30:53'),
(37773, 24734463, 'JkVFiXPyfqqOJP7SpevO8RGRRG2McVKi', '2017-07-24 22:30:56', '2017-07-24 22:30:56'),
(37774, 24734463, 'VdDfn0i8J6SsWbsuu7NzYk9XeUmQYyKX', '2017-07-24 22:31:00', '2017-07-24 22:31:00'),
(37775, 24734463, 'gOO83o2Uv90Hzc52jBUBTKgZ3Msy5GEy', '2017-07-24 22:31:01', '2017-07-24 22:31:01'),
(37776, 24734463, 'vKoG1smdj6pdNwN5irwDN7OM2tkiYedG', '2017-07-24 22:32:22', '2017-07-24 22:32:22'),
(37777, 24734463, 'MmZsBugZpPRRnDMgse68W1UzdMD9rtdg', '2017-07-24 22:32:25', '2017-07-24 22:32:25'),
(37778, 24734463, 'WFD9NFUJLrhD29arqnl6t2gZodQQs0n8', '2017-07-24 22:32:27', '2017-07-24 22:32:27'),
(37779, 24734463, 'I7dDXrt13PyMWXTCorwVQ2Rpod9YB0y9', '2017-07-24 22:32:28', '2017-07-24 22:32:28'),
(37780, 24734463, 'ieaho5GeN0eJMWNDSqbdc6tZmaXP60OW', '2017-07-24 22:32:35', '2017-07-24 22:32:35'),
(37781, 24734463, 'G7cOS2rd9b0Ju9HbPzb81UGLHzrAyNxn', '2017-07-24 22:33:18', '2017-07-24 22:33:18'),
(37782, 24734463, 'FoKnvZrfHNKeA1sWgPsd8rnyRgW2EhMt', '2017-07-24 22:35:54', '2017-07-24 22:35:54'),
(37783, 24734463, 'AJ9xK1ZU3izjmZBkLEECm8KMOOPuYupf', '2017-07-24 22:36:28', '2017-07-24 22:36:28'),
(37784, 24734463, 'R8OAsGPe7s6QMjoDgEUhzpzP3hMB8PSH', '2017-07-24 22:36:32', '2017-07-24 22:36:32'),
(37785, 24734463, 'wliDTSbv7hl8FDMo7gsymvE521d7ywiT', '2017-07-24 22:36:33', '2017-07-24 22:36:33'),
(37786, 24734463, '4JUE8ELv1E7ghpCwbAHrXUKiemsw6vIv', '2017-07-24 22:36:34', '2017-07-24 22:36:34'),
(37787, 24734463, 'VkczH4V20QJfTw9aiiCHsWKKNIOtg2hZ', '2017-07-24 22:38:14', '2017-07-24 22:38:14'),
(37788, 24734463, 'xdxO1beyDlpZxqhMEex8CGvnNiLUg7D2', '2017-07-24 22:38:17', '2017-07-24 22:38:17'),
(37789, 24734463, 'pEpY4e03QxolgHHRttGyjlhW12E74MFl', '2017-07-24 22:38:19', '2017-07-24 22:38:19'),
(37790, 24734463, 'nSN8cXefVhO9WyLr5F39HLiFVyhEQTQY', '2017-07-24 22:38:22', '2017-07-24 22:38:22'),
(37791, 24734463, 'ULRiWh66ZRaI9J8l0shnBHuxGmNDQiIv', '2017-07-24 22:38:23', '2017-07-24 22:38:23'),
(37792, 24734463, 'g9tiIoSo2110Eigiv5bFRaidmOrdaMO6', '2017-07-24 22:43:31', '2017-07-24 22:43:31'),
(37793, 24734463, 'ELozQJZVFCKoGxWAeGhv95yo0UUXNTOL', '2017-07-24 22:43:34', '2017-07-24 22:43:34'),
(37794, 24734463, 'fVdwtyuOL0IOzz8jqDZN8GHnU3nRulv8', '2017-07-24 22:43:35', '2017-07-24 22:43:35'),
(37795, 24734463, '1Zonw9v0SZiuaUL60fdGmVkFQlMzCv8a', '2017-07-24 22:43:37', '2017-07-24 22:43:37'),
(37796, 24734463, 'iN3kZtJLoFiplC0s40SwUH8qNm2Izn8y', '2017-07-24 22:43:37', '2017-07-24 22:43:37'),
(37797, 24734463, 'WWv0MAi01ZnbbPp3ZPw91CH91YTjgWF4', '2017-07-24 22:44:22', '2017-07-24 22:44:22'),
(37798, 24734463, 'H2dMAR0bLX87D7sZryuFFYT4FHK4QXgH', '2017-07-24 22:44:25', '2017-07-24 22:44:25'),
(37799, 24734463, '7XIrxkHYRuPqlWkUJnSS5mlpVdKCky1X', '2017-07-24 22:44:25', '2017-07-24 22:44:25'),
(37800, 24734463, 'Bh9MkVuRXAEj3ILqhkZEiZ9wOXCeGrz7', '2017-07-24 22:44:28', '2017-07-24 22:44:28'),
(37801, 24734463, '5i8BVui4W6WBnsjt3epylQ4u34yp830X', '2017-07-24 22:44:28', '2017-07-24 22:44:28'),
(37802, 24734463, 'xJ3vACYXWRQqNSVhFL9IlJODM1nsJtfU', '2017-07-24 22:47:21', '2017-07-24 22:47:21'),
(37803, 24734463, '45nd3tONdvkecuLKwqdTtT8JZzsFdHSD', '2017-07-25 07:33:53', '2017-07-25 07:33:53'),
(37804, 24734463, '7KDNu1zO6GAsKl8Cdq4yygQ6s7FJBbKt', '2017-07-25 07:34:17', '2017-07-25 07:34:17'),
(37805, 24734463, 'oFOKj42Ojet7yCseBj6JZKUj08GAPsVL', '2017-07-25 07:45:06', '2017-07-25 07:45:06'),
(37806, 24734463, 'lbSEBNH6VwKybRQZB2LSpiotIAlZvR0i', '2017-07-25 08:07:18', '2017-07-25 08:07:18'),
(37807, 24734463, 'Q1tNQQcDmUn3kNmAt06veELAqwIOmSqt', '2017-07-25 08:07:26', '2017-07-25 08:07:26'),
(37808, 24734463, 'hJwXtEACn1NFCu87oWQKOZRExitnJFTH', '2017-07-25 08:07:31', '2017-07-25 08:07:31'),
(37809, 24734463, 'zU6E1dLvohX8f125q0axEnCWQQGa9BPh', '2017-07-25 08:07:34', '2017-07-25 08:07:34'),
(37810, 24734463, 'xf25pNx0AGLRuXqOACU6M8j60HXHQ4iP', '2017-07-25 08:07:34', '2017-07-25 08:07:34'),
(37811, 24734463, 'YzZret28aSPazwHD8Dn9WdpkijQxxpCE', '2017-07-25 08:07:38', '2017-07-25 08:07:38'),
(37812, 24734463, 'yXhuxm4eOpuCaeiSCvETcQ5CfxgIw54L', '2017-07-25 08:07:38', '2017-07-25 08:07:38'),
(37813, 24734463, 'vghxnmTDxZJWxELAOfu0vIwb1Ky6S2fw', '2017-07-25 08:08:37', '2017-07-25 08:08:37'),
(37814, 24734463, 'DYOMLLUfGbBtRXBc890Fs3Zy0l7kHSLO', '2017-07-25 08:08:39', '2017-07-25 08:08:39'),
(37815, 24734463, 'OH5VA4YtHh4g1uUnPO2LVPIxTnMD3lsA', '2017-07-25 08:08:40', '2017-07-25 08:08:40'),
(37816, 24734463, 'BVhtC5OwQDafiFpY18oq7nh10Ze4EmC8', '2017-07-25 08:08:42', '2017-07-25 08:08:42'),
(37817, 24734463, 'mg7px1OvXNLQzBkrHTmPGjaB5h0Bf5IB', '2017-07-25 08:08:43', '2017-07-25 08:08:43'),
(37818, 24734463, 'Tfq56YDJRIb1i8YRJCHZAdjEgxgx2kQz', '2017-07-25 08:11:33', '2017-07-25 08:11:33'),
(37819, 24734463, 'bSR2TchrN4ljtGB2RlzbuN7egJ8nY0I5', '2017-07-25 08:11:35', '2017-07-25 08:11:35'),
(37820, 24734463, 'AXA03QBFpEYbwoPLN0W32dKFiDHq0kZR', '2017-07-25 08:11:35', '2017-07-25 08:11:35'),
(37821, 24734463, 'D774tz35Dows5gKsSIzfulxgEcOo8I4O', '2017-07-25 08:11:37', '2017-07-25 08:11:37'),
(37822, 24734463, 'mre6ljjhsl0Lq8QmxniA7AUNYABFxgZ9', '2017-07-25 08:11:38', '2017-07-25 08:11:38'),
(37823, 24734463, '7I56rzI3oCcARZvs86lu72XIm1d2A9CA', '2017-07-25 08:12:24', '2017-07-25 08:12:24'),
(37824, 24734463, 'erjZnevBQcDzm8hMbLJMkSJ93oGUmUQW', '2017-07-25 08:12:28', '2017-07-25 08:12:28'),
(37825, 24734463, 'Lc5jLaHPLbZyMq4hNbv2qtJ9t3tXEsSx', '2017-07-25 08:12:28', '2017-07-25 08:12:28'),
(37826, 24734463, 'HXDDsmkuGtoaZl92B3S74Ln0DSvrKHn0', '2017-07-25 08:12:30', '2017-07-25 08:12:30'),
(37827, 24734463, '2MkZjnWV8XZ9gvyA22e2zVjuTDq2JPfw', '2017-07-25 08:12:31', '2017-07-25 08:12:31'),
(37828, 24734463, 'uoL7VcD9n9wawNd7QK7Z79pWKfaIFS17', '2017-07-25 08:15:46', '2017-07-25 08:15:46'),
(37829, 24734463, 'VZysQCy1edjzCbXjMooUIpSRBYqhg7B6', '2017-07-25 08:15:48', '2017-07-25 08:15:48'),
(37830, 24734463, 'DZySvcfFN8OKbUJxww31qMUCZI7eXOLy', '2017-07-25 08:15:48', '2017-07-25 08:15:48'),
(37831, 24734463, '8qqebzabM3uKkn1uTBptTDYpR4bSfLqR', '2017-07-25 08:15:51', '2017-07-25 08:15:51'),
(37832, 24734463, 'QluwwMLTLBhZLIqntYwAbmd1Ixa2SUHN', '2017-07-25 08:15:52', '2017-07-25 08:15:52'),
(37833, 24734463, '8DcNnqNBEprxiqn5SrLTKh1Gy7ALyEhl', '2017-07-25 08:17:42', '2017-07-25 08:17:42'),
(37834, 24734463, 'coEHHgbXr3obj9bjTlJaiFQ6TMKbZ4HH', '2017-07-25 08:18:18', '2017-07-25 08:18:18'),
(37835, 24734463, 'vVhqFBMfqcKsQrooo8JiT6oREJHsztfO', '2017-07-25 08:18:20', '2017-07-25 08:18:20'),
(37836, 24734463, 'TPZzss2hk7emPzNca6q4lUePu53PMgqq', '2017-07-25 08:18:21', '2017-07-25 08:18:21'),
(37837, 24734463, 'wpMmqeJN0NkieYSM4zGOSGSMVVDZqf8M', '2017-07-25 08:18:23', '2017-07-25 08:18:23'),
(37838, 24734463, 'TR8xILQOIh42RKEE4IdLEJV1LzXHIu1I', '2017-07-25 08:18:27', '2017-07-25 08:18:27'),
(37839, 24734463, '0yh81YQ3LmDZzZAFQfQ3sXo9oFlv8ixW', '2017-07-25 08:18:30', '2017-07-25 08:18:30'),
(37840, 24734463, 'qRo5t23pcWA5fRxlcgag8hiYqmK4WIU4', '2017-07-25 08:18:31', '2017-07-25 08:18:31'),
(37841, 24734463, 'LQ9nYQ2BQuUihVCVLaI2UeamOe1o89x9', '2017-07-25 08:18:49', '2017-07-25 08:18:49'),
(37842, 24734463, 'Sw5KY9z2uMtKYVusYoCGi6e1AEi9JSWU', '2017-07-25 08:19:34', '2017-07-25 08:19:34'),
(37843, 24734463, 'Rft5nNvw6ElaQTf4NT30Hcrz755jb2XI', '2017-07-25 08:20:21', '2017-07-25 08:20:21'),
(37844, 24734463, 'kMBcXwiLbwRW4KoU18z8Soataka4QCsn', '2017-07-25 08:20:24', '2017-07-25 08:20:24'),
(37845, 24734463, 'oo0Pz223EfNbYI68RuFWmZn0zAn15iyu', '2017-07-25 08:20:25', '2017-07-25 08:20:25'),
(37846, 24734446, 'Dc31CBqoiqi5bIzku7AE6TwvOznGko89', '2017-07-25 08:20:28', '2017-07-25 08:20:28'),
(37847, 24734463, 'SxqSAFy232dqaQjVAfY0Qy96bik0d0aw', '2017-07-25 08:20:41', '2017-07-25 08:20:41'),
(37848, 24734463, 'bxxyBC6rVgpz3wwpGKe70mBtUpw9nBXh', '2017-07-25 08:20:42', '2017-07-25 08:20:42'),
(37849, 24734463, 'zuguVS4j9mbPxrg1EnfeA2E3ffCHlEUl', '2017-07-25 08:20:50', '2017-07-25 08:20:50'),
(37850, 24734463, 'AR1PEowgFaIh9yEstS1ZSEuv86O4HOqp', '2017-07-25 08:20:50', '2017-07-25 08:20:50'),
(37851, 24734463, 'b6bleUC8c7YPuXggBctF5myCy5Z9zuD4', '2017-07-25 08:20:55', '2017-07-25 08:20:55'),
(37852, 24734463, 'uTu6tIeX6H6rBH3xtlLsnm6IW4fdAH7O', '2017-07-25 08:20:56', '2017-07-25 08:20:56'),
(37853, 24734463, 'cxb7Um2uOoVj6z2C5eA6PVsQhTfQHnfI', '2017-07-25 08:21:04', '2017-07-25 08:21:04'),
(37854, 24734463, 'UD8u5dWfncbQqis6d0rymgbbESZbnLTh', '2017-07-25 08:21:06', '2017-07-25 08:21:06'),
(37855, 24734463, 'HhCjbx9Vae7k9i7n6PdWVJhsCfJXmL16', '2017-07-25 08:21:07', '2017-07-25 08:21:07'),
(37856, 24734463, 'kxmbmYP9e3hs71gzHsH3jlYiEJy6gE0W', '2017-07-25 08:21:13', '2017-07-25 08:21:13'),
(37857, 24734463, 'K04hPZCVKjdHg8CHv7F0ZIhWlfcYV4sM', '2017-07-25 08:21:17', '2017-07-25 08:21:17'),
(37858, 24734463, 'WN3oB66oNrk34XGgRUbzknhacY4yEoP1', '2017-07-25 08:21:25', '2017-07-25 08:21:25'),
(37859, 24734463, '8j5s9aoy9AXdfPlahN42BKE1da0qHbU3', '2017-07-25 08:21:25', '2017-07-25 08:21:25'),
(37860, 24734463, 'rkb8gGmw65cUpKKEe1yS4nZSA0IrNbGj', '2017-07-25 08:21:52', '2017-07-25 08:21:52'),
(37861, 24734463, 'QdV1xuvhLW8PuAI4Rk66lFXkyaqMbJqY', '2017-07-25 08:21:52', '2017-07-25 08:21:52'),
(37862, 24734463, 'MwIebNZgFmbEt0nZmQqgKg9MYRxfGQBf', '2017-07-25 08:22:04', '2017-07-25 08:22:04'),
(37863, 24734463, 'QJXvcey1tEg7N8bwIlGf6ekLT1Bb6yqW', '2017-07-25 08:22:05', '2017-07-25 08:22:05'),
(37864, 24734463, 'bsm9qjtE69J8nQCLXWbncaNvAYXaru5N', '2017-07-25 08:22:08', '2017-07-25 08:22:08'),
(37865, 24734463, 'cR8Z84NaxIFLPtbtQAEfWTtVNTAiLthJ', '2017-07-25 08:22:08', '2017-07-25 08:22:08'),
(37866, 24734463, '30VnwnLsulJh17HzFfAEMhFKY6gZTzD0', '2017-07-25 08:22:11', '2017-07-25 08:22:11'),
(37867, 24734463, 'wzqzrZ7gYAt9HrD7wMtD8qFzrJzqpCOo', '2017-07-25 08:22:11', '2017-07-25 08:22:11'),
(37868, 24734463, 'oIWQRRgsoHjKrDYGKbiy3GH4OroxCUqK', '2017-07-25 08:22:13', '2017-07-25 08:22:13'),
(37869, 24734463, 'vG016tfzv0CLwbnSb8vjzVr8TO9u77HY', '2017-07-25 08:22:14', '2017-07-25 08:22:14'),
(37870, 24734463, 'ggHHPhIssTK0cG6IQdSfnnmWSTdcxjTv', '2017-07-25 08:22:16', '2017-07-25 08:22:16'),
(37871, 24734463, 'wJHo3X2ZUg9Ul6IS3aDBpG4vXpa6Tgra', '2017-07-25 08:22:16', '2017-07-25 08:22:16'),
(37872, 24734463, 'NLYSEW8GQT3mCYinbLDHiuxd3d4nfhkv', '2017-07-25 08:22:18', '2017-07-25 08:22:18'),
(37873, 24734463, 'zIahzM79i1GhStpOkzE6E2BVvNNN25JJ', '2017-07-25 08:22:18', '2017-07-25 08:22:18'),
(37874, 24734463, 'hSzF3BHvtbmnWel3938pTwGmalVyDBhu', '2017-07-25 08:22:23', '2017-07-25 08:22:23'),
(37875, 24734463, 'EGeNTSU9G7laOppJjHaxye56oJyDp78N', '2017-07-25 08:22:24', '2017-07-25 08:22:24'),
(37876, 24734463, 'LrU2tfNTUKKYfEur3Vk3By9H9B7hOZdc', '2017-07-25 08:22:27', '2017-07-25 08:22:27'),
(37877, 24734463, 'Qs1y8t9c1Po9xoO3LzVtgCk9AzAhhuPU', '2017-07-25 08:22:29', '2017-07-25 08:22:29'),
(37878, 24734463, '4PUdY4tZZI6FcYc5VBi8LrLvifEu2e7O', '2017-07-25 08:22:32', '2017-07-25 08:22:32'),
(37879, 24734463, 'zi10RxpqitLHB26xydVvxP8rhRkVAOLi', '2017-07-25 08:22:34', '2017-07-25 08:22:34'),
(37880, 24734463, 'Pv4IkV4TxodSrj3bhC8XdiEmuvo9J5xR', '2017-07-25 08:22:36', '2017-07-25 08:22:36'),
(37881, 24734463, 'YXQ3cAaAJ0BhWo0q2kXBL47wxS0sZ2jx', '2017-07-25 08:22:38', '2017-07-25 08:22:38'),
(37882, 24734463, 'jlL7AzdNso4DmSczMbpzTkmOapgnvJAg', '2017-07-25 08:22:40', '2017-07-25 08:22:40'),
(37883, 24734463, 'SftwonGfg2PNLFIj7SA30dTpj8pBIAbP', '2017-07-25 08:22:42', '2017-07-25 08:22:42'),
(37884, 24734463, 'wRonvpXw2S6SNaXbuJloqG7jyt8Xm7Eo', '2017-07-25 08:24:08', '2017-07-25 08:24:08'),
(37885, 24734463, 'z6KRQVA9cyoLwHmTGBakqUZkwXqEZT5W', '2017-07-25 08:24:09', '2017-07-25 08:24:09'),
(37886, 24734463, '3acTJGiRFAFByBOe8LYnt5lKQuG6OjUF', '2017-07-25 08:24:36', '2017-07-25 08:24:36'),
(37887, 24734463, '0A0LOCmdgqczeXLlx88NkwLm9LBz8oaF', '2017-07-25 08:24:39', '2017-07-25 08:24:39'),
(37888, 24734463, 'sEpvPVcBIOoa6W7azuHu97NrorDSi7F5', '2017-07-25 08:24:40', '2017-07-25 08:24:40'),
(37889, 24734463, 'VkeimwUNaZAMgwHZHAMmzNkmaaWsE3OO', '2017-07-25 08:24:41', '2017-07-25 08:24:41'),
(37890, 24734463, 'flBMmDnp7ne8Vnqo6yc5kZIjXWxIJT59', '2017-07-25 08:24:43', '2017-07-25 08:24:43'),
(37891, 24734463, 'gSdGiSYXpFRXTEbBh8MsuOF3QdMfmefM', '2017-07-25 08:24:46', '2017-07-25 08:24:46'),
(37892, 24734463, 'iqUdjW66WWmu5NltycnbRmjiDNJOvTZW', '2017-07-25 08:24:52', '2017-07-25 08:24:52'),
(37893, 24734463, 'UaSH5hAXgkwCNShyX2tetCdhd4E2XLKy', '2017-07-25 08:24:52', '2017-07-25 08:24:52'),
(37894, 24734463, 'dzzg9ydpIz8r1SeFMmaEqBqukdtzIytV', '2017-07-25 08:25:05', '2017-07-25 08:25:05'),
(37895, 24734463, 'g3yktS6bqGiMt7TmAHVvXodjE65pdsVw', '2017-07-25 08:25:10', '2017-07-25 08:25:10'),
(37896, 24734463, 'NvH5U4T93cRA9WadCUqh12uDOmvtfcmI', '2017-07-25 08:25:11', '2017-07-25 08:25:11'),
(37897, 24734463, 'TZ8d7mNGrT54iJh6ZSr158UtPtovFinY', '2017-07-25 08:25:13', '2017-07-25 08:25:13'),
(37898, 24734463, 'QQWNprNAie7jiulhrUf0ZWOoltOWxLQF', '2017-07-25 08:25:16', '2017-07-25 08:25:16'),
(37899, 24734463, 'wmPqeSY8uEk6QMbWc5YmphbzzaO7cDvM', '2017-07-25 08:25:16', '2017-07-25 08:25:16'),
(37900, 24734463, 'PM863sCX5UXj6ITBmKMiqu3gyKu9H7k8', '2017-07-25 08:26:22', '2017-07-25 08:26:22'),
(37901, 24734463, '7QWSq3TOYSsymR8uS8s7FUFrnDTp80yW', '2017-07-25 08:26:25', '2017-07-25 08:26:25'),
(37902, 24734463, 'aR4YHZDeczdbCcqx0Nh5IKoe4btLjXT9', '2017-07-25 08:26:25', '2017-07-25 08:26:25'),
(37903, 24734463, 'eqTy02xPgwRnCry6aL9ypAl5ak8s2eLo', '2017-07-25 08:26:39', '2017-07-25 08:26:39'),
(37904, 24734463, 'YOg8wgkPoGZVISZfumFUXoUiE97rPjPQ', '2017-07-25 08:26:40', '2017-07-25 08:26:40'),
(37905, 24734463, 'VxJdqmLLAlbhGmHwuV99dRKuZvP2pusM', '2017-07-25 08:26:42', '2017-07-25 08:26:42'),
(37906, 24734463, 'cqwPgLbZvJqzkzncIgRLWcuGuSaxkSgI', '2017-07-25 08:26:43', '2017-07-25 08:26:43'),
(37907, 24734463, 'IkPWZrylmuiPVS0EALNTB6Fsulv9W3UC', '2017-07-25 08:26:44', '2017-07-25 08:26:44'),
(37908, 24734463, 'HCAdjIRfQf5n2ld7x7pHgEzxGlTRVFgx', '2017-07-25 08:26:44', '2017-07-25 08:26:44'),
(37909, 24734463, 'Uy7LpYgdnqUgBOWSw9zjldRaeD1B7urD', '2017-07-25 08:26:48', '2017-07-25 08:26:48'),
(37910, 24734463, 'VXkE2UQvdFmVAthxy3Ua3XWB6VL7AWug', '2017-07-25 08:26:48', '2017-07-25 08:26:48'),
(37911, 24734463, 'RaJXYo01gG756koMJGENtnZKNcOmdCkC', '2017-07-25 08:26:50', '2017-07-25 08:26:50'),
(37912, 24734463, 'SZ2UlKly6VJqX41vRMNsi5AeLabPGU9c', '2017-07-25 08:26:52', '2017-07-25 08:26:52'),
(37913, 24734463, 'HlgtfObo0scyvTGZKDc9LyYio7jeWJ33', '2017-07-25 08:26:54', '2017-07-25 08:26:54'),
(37914, 24734463, 'FEJrqes1r7gbrhuFUWWaDepO0uUSprRB', '2017-07-25 08:33:45', '2017-07-25 08:33:45'),
(37915, 24734463, 'AjhQJb44mjKLREWs1o4Z0kC9jPDTnYz0', '2017-07-25 08:35:06', '2017-07-25 08:35:06'),
(37916, 24734463, 'sSMI4g67UoAvPHJ5h0jYWkZl156HQvZp', '2017-07-25 08:35:16', '2017-07-25 08:35:16'),
(37917, 24734463, 'ijooEILDeJvep3AxHY23CN7UNyGI4VcS', '2017-07-25 08:35:17', '2017-07-25 08:35:17'),
(37918, 24734463, 'VBX4qA4xbRKJlvc6qgcCu64qT0JHZwlK', '2017-07-25 08:35:18', '2017-07-25 08:35:18'),
(37919, 24734463, '2PRtIq7NHeRDhfTwacmKGMuFrgNuBnJR', '2017-07-25 08:35:38', '2017-07-25 08:35:38'),
(37920, 24734463, '5Z2gq5MKEdiG7q0SjHR9vWE7MlwjgfPA', '2017-07-25 08:35:40', '2017-07-25 08:35:40'),
(37921, 24734463, 'PCUvZDzKO6psw7AeMcjYth4fCjmcIGUe', '2017-07-25 08:35:40', '2017-07-25 08:35:40'),
(37922, 24734463, 'CwdbOfC69VJVw0PoGlTr7IhCVnvoMu7F', '2017-07-25 08:35:42', '2017-07-25 08:35:42'),
(37923, 24734463, 'hgWTE53GXaCFLuBxUwfWrff564bz7x6a', '2017-07-25 08:35:44', '2017-07-25 08:35:44'),
(37924, 24734463, 'IPqDRKDdepnwHVVjexeXAB9V4vpP7dla', '2017-07-25 08:35:45', '2017-07-25 08:35:45'),
(37925, 24734463, '9GLAwQ6sC6i4Sp67edy4Hk2cEfWxp7bO', '2017-07-25 08:35:47', '2017-07-25 08:35:47'),
(37926, 24734463, 'Z6xLO9d5Ge9O83m6x7CTIyd0spneBi2K', '2017-07-25 08:35:51', '2017-07-25 08:35:51'),
(37927, 24734463, 'dnS81XbIXAiO5A0TGEsw12tKO5aTXDrb', '2017-07-25 08:35:53', '2017-07-25 08:35:53'),
(37928, 24734463, 'EujQXkHbFqCifG68zjKk4G744HXIK4HY', '2017-07-25 08:35:59', '2017-07-25 08:35:59'),
(37929, 24734463, 'HMYLOxCHL8c6dHRIwx1ygJDZC2i9ujNS', '2017-07-25 08:36:00', '2017-07-25 08:36:00'),
(37930, 24734463, 'qRbUsPRDZ8uHWzVNdPEZCDituaBpEeTB', '2017-07-25 08:36:02', '2017-07-25 08:36:02'),
(37931, 24734463, 'Fqa405eEqkqMsDGJpAa7ZMxKMA7AgLQg', '2017-07-25 08:36:03', '2017-07-25 08:36:03'),
(37932, 24734463, '4ckikA2ESN3nupekW5uFxKOR2ydixzAU', '2017-07-25 08:36:04', '2017-07-25 08:36:04'),
(37933, 24734463, 'aN1j3E3iflPPwgb6bW8ypJzH6FOlWS5h', '2017-07-25 08:36:04', '2017-07-25 08:36:04'),
(37934, 24734463, 'iw9KlVoj8pPCr87L6HDI83xyk4xJbV4D', '2017-07-25 08:38:22', '2017-07-25 08:38:22'),
(37935, 24734463, 'Cwj3GwsggcJhDdmHOQ6G9jGcQ9qxrf52', '2017-07-25 08:38:28', '2017-07-25 08:38:28'),
(37936, 24734463, 'wgVrdoE9L6Fa3xhSZyYwNodY6EHuQ86h', '2017-07-25 08:38:29', '2017-07-25 08:38:29'),
(37937, 24734463, 'YuvUofrIWkfz3hsrP6072UMrkAfEfsKK', '2017-07-25 08:38:31', '2017-07-25 08:38:31'),
(37938, 24734463, 'KDG8CdaR6WnKklJ8zqP3P79pEeZgGh8p', '2017-07-25 08:38:35', '2017-07-25 08:38:35'),
(37939, 24734463, 'e5t9MP3tDEh49MNAhESC5f4T5omeewy5', '2017-07-25 08:38:38', '2017-07-25 08:38:38'),
(37940, 24734463, 'ZnH3SQd97AT7j5i7GYpRbXyzS3Pa72OA', '2017-07-25 08:38:41', '2017-07-25 08:38:41'),
(37941, 24734463, 'Ga2dbuOTY0VmCrbuIrPiZWKpJDpG75yF', '2017-07-25 08:38:43', '2017-07-25 08:38:43'),
(37942, 24734463, 'hJttZuBQykzZWvt0X94SKaAVlFkUcYSE', '2017-07-25 08:38:44', '2017-07-25 08:38:44'),
(37943, 24734463, 'irnfvQ8AK0wuhfkG1axVG5mxa6Lh3Q0v', '2017-07-25 08:38:47', '2017-07-25 08:38:47'),
(37944, 24734463, 'TkbvD0f3YzU3FI6iKb6FayCMwluMCY4b', '2017-07-25 08:38:48', '2017-07-25 08:38:48'),
(37945, 24734463, 'EmmT1K1XXxF3r6Q7XAv4oCyfGXiTBPEg', '2017-07-25 08:38:50', '2017-07-25 08:38:50'),
(37946, 24734463, 'ZJSuH3irGaqbcafR2g8KFXlddJXwBBVo', '2017-07-25 08:39:09', '2017-07-25 08:39:09'),
(37947, 24734463, 'B9iM7m1xWAf8z9vvLgbCqnhHcQl6X8QR', '2017-07-25 08:39:18', '2017-07-25 08:39:18'),
(37948, 24734463, '8fm2BXTHqoSIhpJQnnrAjgXLHb5fl2HP', '2017-07-25 08:40:30', '2017-07-25 08:40:30'),
(37949, 24734463, 'PU5OzPi97PX39haIsDN91hE2gIDz2lLL', '2017-07-25 08:40:33', '2017-07-25 08:40:33'),
(37950, 24734463, '1GEBDoOxirDOQpYAdqVA4gVc5imtsATP', '2017-07-25 08:40:34', '2017-07-25 08:40:34'),
(37951, 24734463, '2oT91MRta9853nMlrPRAUytKxRQJCNEv', '2017-07-25 08:40:37', '2017-07-25 08:40:37'),
(37952, 24734463, 'aiON8yhTItv6fpQq2ILNL5SyTZKfBEkI', '2017-07-25 08:40:42', '2017-07-25 08:40:42'),
(37953, 24734463, '63tQoFKxbDYVplp8FmP9qMWuFR3eb73m', '2017-07-25 08:40:46', '2017-07-25 08:40:46'),
(37954, 24734463, 'wAb520hZ5TMrfUJumeIk2cNN7DNMCeaQ', '2017-07-25 08:41:16', '2017-07-25 08:41:16'),
(37955, 24734463, 'Aevl5lST1d8S39zw95VXT0pO0Erj0gYx', '2017-07-25 08:41:19', '2017-07-25 08:41:19'),
(37956, 24734463, '95e67nUmPKtoOIFMT8CdA7yXpc8sRCsP', '2017-07-25 08:41:19', '2017-07-25 08:41:19'),
(37957, 24734463, 'XgAVayUsJQkL0notS9uX1p3snH2Lihhs', '2017-07-25 08:41:21', '2017-07-25 08:41:21'),
(37958, 24734463, 'OSxKu7KyTwy5Ttt5hwwxJglsADjRDBWY', '2017-07-25 08:41:22', '2017-07-25 08:41:22'),
(37959, 24734463, 'EHZkNf9TL4elFNCFJwiytJ7jbIGC5gyX', '2017-07-25 08:41:24', '2017-07-25 08:41:24'),
(37960, 24734463, 'B5NdAGPuRB2PAguYgfILjbpCid5HZhjl', '2017-07-25 08:41:25', '2017-07-25 08:41:25'),
(37961, 24734463, 'zXaZWQzJ5NYHUFCbL6Mjrq0B5oIAI0oQ', '2017-07-25 08:41:27', '2017-07-25 08:41:27'),
(37962, 24734463, '6sFAt3yLZGJEFqA7UQfn6xjmfzB3h9OB', '2017-07-25 08:41:29', '2017-07-25 08:41:29'),
(37963, 24734463, 'U8osqLb1yAoxYXfoazSmGAzr3LhpwLMW', '2017-07-25 08:41:30', '2017-07-25 08:41:30'),
(37964, 24734463, 's5MUMp2TLa2psdwjeGO6eupWOjbJaZRY', '2017-07-25 08:41:44', '2017-07-25 08:41:44'),
(37965, 24734463, 'k2Hv3MteXouLkvdHmSLrN9V9MrBnkhL9', '2017-07-25 08:41:46', '2017-07-25 08:41:46'),
(37966, 24734463, 'mB0acXF5th99b1w1w29OvmeXEEFx3YPD', '2017-07-25 08:41:47', '2017-07-25 08:41:47'),
(37967, 24734463, 'O2tVBwXPbZhB5Mp6X7vygCoaWtVBTr35', '2017-07-25 08:41:50', '2017-07-25 08:41:50'),
(37968, 24734463, 'hjASoebY0JZjsNO4DDer0HpacHXsTadS', '2017-07-25 08:42:20', '2017-07-25 08:42:20'),
(37969, 24734463, 'f8r7lqzQyc8ASONTyWicjji5QRLC4lQp', '2017-07-25 08:42:20', '2017-07-25 08:42:20'),
(37970, 24734463, 'sOYK2kyC7CFtouPLLFGdBYSawuo7wZGD', '2017-07-25 08:42:21', '2017-07-25 08:42:21'),
(37971, 24734463, 'A5QLsQ9BoTorMagrLRZBNwpHqcljzr3T', '2017-07-25 08:42:23', '2017-07-25 08:42:23'),
(37972, 24734463, 'uRXgGPy9CGPm58XPjeTsb6tq2oq7Rt0c', '2017-07-25 08:42:25', '2017-07-25 08:42:25'),
(37973, 24734463, 'L6eauMiGpnCsJYx3nvl5rbTmwTo1pJXa', '2017-07-25 08:43:02', '2017-07-25 08:43:02'),
(37974, 24734463, 'aZStfMRbHBIEuGG00Sjr6KqykeDo3mRZ', '2017-07-25 08:43:06', '2017-07-25 08:43:06'),
(37975, 24734463, 's98ber26mj0kihIbUNPlcPf2V3FRyqQD', '2017-07-25 08:43:14', '2017-07-25 08:43:14'),
(37976, 24734463, 'N6x5OJiwmdx61KDwD9AALDX3TaokUaKL', '2017-07-25 08:43:22', '2017-07-25 08:43:22'),
(37977, 24734463, 'uuF8DIiTJ6uyxwCUaRkhoRS0WGiBEZLH', '2017-07-25 08:43:43', '2017-07-25 08:43:43'),
(37978, 24734463, 'MInMnh1bWfBlmvyUrdOkN7UhrVd1NHza', '2017-07-25 08:44:03', '2017-07-25 08:44:03'),
(37979, 24734463, 'O3VkCwqnUA6I4ki22shJPN2XHdfQL4qW', '2017-07-25 08:44:51', '2017-07-25 08:44:51'),
(37980, 24734463, 'iiPTWmF9Q29juMTHe937ivQEb86d3mZw', '2017-07-25 08:45:01', '2017-07-25 08:45:01'),
(37981, 24734463, 'LwgwQfRMTI0ut5gqtA3mZcY2D0awDM74', '2017-07-25 08:45:14', '2017-07-25 08:45:14'),
(37982, 24734463, 'HMCB31ZIBcKzZjjcRw35ZGnGpqjHEGS9', '2017-07-25 08:45:18', '2017-07-25 08:45:18'),
(37983, 24734463, '1JyrAfbHwkHfzZnOnuvnlQwQkge5IvZf', '2017-07-25 08:45:22', '2017-07-25 08:45:22'),
(37984, 24734463, 'reWrbd8xtFUmVe7mVC9EULd1fZWJBNhw', '2017-07-25 08:46:44', '2017-07-25 08:46:44'),
(37985, 24734463, 's867E20Yv0mdXmmVPFrWjHGHqyTL3fIi', '2017-07-25 08:46:54', '2017-07-25 08:46:54'),
(37986, 24734463, '6fscLwzCbwIwiWaYUwt1xG5EDVOya8vD', '2017-07-25 08:46:54', '2017-07-25 08:46:54'),
(37987, 24734463, 'BnPKSFKRjcqeHi7laB8vylZNNY6hfp0F', '2017-07-25 08:46:56', '2017-07-25 08:46:56'),
(37988, 24734463, 'i48AC1xaZEIC5uWNsxI7nSb161iEDYJB', '2017-07-25 08:47:04', '2017-07-25 08:47:04'),
(37989, 24734463, 'W4kKIHt6arw3WuItgZoU8HdJp9kN8yXY', '2017-07-25 08:47:06', '2017-07-25 08:47:06'),
(37990, 24734463, 'FShSUqFS5b4qL3Jz4DPkGjyQ9uGNgg4r', '2017-07-25 08:47:08', '2017-07-25 08:47:08'),
(37991, 24734463, 'dzjGO8eEUVlVboFHomW59xL33I4J2q7i', '2017-07-25 08:47:08', '2017-07-25 08:47:08'),
(37992, 24734463, 'lCamvjQZj5ku9K7pmjUhKph6RHQyr0f6', '2017-07-25 08:47:10', '2017-07-25 08:47:10'),
(37993, 24734463, '5bILkcXj27NvGlxCgPFGuALLtvekocDo', '2017-07-25 08:47:15', '2017-07-25 08:47:15'),
(37994, 24734463, 'IxPl9YNUdLjmXYCsiRDJWxxIee2f6KZC', '2017-07-25 08:47:19', '2017-07-25 08:47:19'),
(37995, 24734463, 'iBOAucUGXxpqlLuAJ6iKaJH9wKn6zOFI', '2017-07-25 08:47:19', '2017-07-25 08:47:19'),
(37996, 24734463, 'OzMfhHHepjytVpgpsNBYxRqibGNwuBaB', '2017-07-25 08:47:21', '2017-07-25 08:47:21'),
(37997, 24734463, 'JTYeLCEPFy0hoVkFIOYF5NYnYM3tqNJF', '2017-07-25 08:47:45', '2017-07-25 08:47:45'),
(37998, 24734463, 'heQ1oIKnEmLXlFrcwrL7idQGjJZIugzp', '2017-07-25 08:47:53', '2017-07-25 08:47:53'),
(37999, 24734463, 'Cuayff1WLLh27DJi7WqCMChmu2XsXVrh', '2017-07-25 08:48:00', '2017-07-25 08:48:00'),
(38000, 24734463, 'gaHTALV8m8zb7cdAFiWlZfqzpDiWLDWE', '2017-07-25 08:49:30', '2017-07-25 08:49:30'),
(38001, 24734463, 'S0v8bewlue7hQnOTCre7Js5dPzPHngDI', '2017-07-25 08:49:32', '2017-07-25 08:49:32'),
(38002, 24734463, 'JjB5gpuPcDUvo9zvu5gOjxpgifiBLjhw', '2017-07-25 08:49:32', '2017-07-25 08:49:32'),
(38003, 24734463, 'Ck7rJG7eVZeCowkcMWyy5N4uk2H0ccOZ', '2017-07-25 08:49:34', '2017-07-25 08:49:34'),
(38004, 24734463, 'vaZLMR0yOcc4ZXUBzABRMcUt6daba0ib', '2017-07-25 08:49:35', '2017-07-25 08:49:35'),
(38005, 24734463, '8ZaWZmLqOAy10owa1qiepR604GDtHYe9', '2017-07-25 08:49:36', '2017-07-25 08:49:36'),
(38006, 24734463, 'x9zrsch4Pf328KxBwv2adxCgKtCTN5v6', '2017-07-25 08:49:38', '2017-07-25 08:49:38'),
(38007, 24734463, 'M8fCCpbWLGgHAHmr6eZylRMZxsiMQM1Y', '2017-07-25 08:49:40', '2017-07-25 08:49:40'),
(38008, 24734463, 'MUFGPWWwH4v1PS4u11EzlxCmHi9LqGir', '2017-07-25 08:49:42', '2017-07-25 08:49:42'),
(38009, 24734463, 'rxNgY2GSqhsNOpw0X5huccPtH9R2HhNN', '2017-07-25 08:49:44', '2017-07-25 08:49:44'),
(38010, 24734463, '8MSWtkSUqGUtyxiSIFNDNmaRSXZ7yiIc', '2017-07-25 08:49:45', '2017-07-25 08:49:45'),
(38011, 24734463, '6GBMr5kRMxPjZP7Alw8wM1qqP9krpzla', '2017-07-25 08:49:51', '2017-07-25 08:49:51'),
(38012, 24734463, 'Kr7s90vlGCBgRRcWnKTnANPxUb6yLRVT', '2017-07-25 08:49:53', '2017-07-25 08:49:53'),
(38013, 24734463, 'IKsNlIN6EuotHgXJlrEjfbeadvpFfMFV', '2017-07-25 08:49:53', '2017-07-25 08:49:53'),
(38014, 24734463, 'HicZAy7bR0MxLh7DtKcqmpbXrFmoHdgV', '2017-07-25 08:49:54', '2017-07-25 08:49:54'),
(38015, 24734463, 'eGGMCfDwMn62YQfeEaVdeVFojeRBtDSE', '2017-07-25 08:49:56', '2017-07-25 08:49:56');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(38016, 24734463, 'FgUIrDfwu5BlQ7P4tPvlk7SUImgpNKfF', '2017-07-25 08:49:59', '2017-07-25 08:49:59'),
(38017, 24734463, 'OdAHEYeVP3jjnXOnUEfmffiL9GS6xJhL', '2017-07-25 08:50:03', '2017-07-25 08:50:03'),
(38018, 24734463, 'PxbmyNuQndfHlQMRd757NhhBa7gj4yYN', '2017-07-25 08:50:06', '2017-07-25 08:50:06'),
(38019, 24734463, 'j9gmhwsgcKEBxXXlmdMGbrKI3rhjt6Ho', '2017-07-25 08:50:12', '2017-07-25 08:50:12'),
(38020, 24734463, 'iFQaVRqakTJZkBQNpakcmJMernNgujxB', '2017-07-25 08:50:12', '2017-07-25 08:50:12'),
(38021, 24734463, 'iiPfSDHZbdWZ9qQz45rZCqKqT0vNnISD', '2017-07-25 08:50:15', '2017-07-25 08:50:15'),
(38022, 24734463, 'e8cWei2UNcZ69EDlxjjdSQJelQ5BwYxK', '2017-07-25 08:50:17', '2017-07-25 08:50:17'),
(38023, 24734463, '40PY5qVvEdLvZ1vWHKDcHNcagvmhOYbz', '2017-07-25 08:50:28', '2017-07-25 08:50:28'),
(38024, 24734463, 'm2KarqZE1DJ63coDoQ9yXesqVPas72en', '2017-07-25 08:50:29', '2017-07-25 08:50:29'),
(38025, 24734463, 'QA7kxixrMEOYMtBRbJgkgNmgT02yBlfj', '2017-07-25 08:50:31', '2017-07-25 08:50:31'),
(38026, 24734463, '5aZKto6omqcBkGORi28Y6uLPclLGsqPq', '2017-07-25 08:51:26', '2017-07-25 08:51:26'),
(38027, 24734461, 'gkaTFiRYDMbVIQ2zgBO6K5yYa72qjHDh', '2017-07-25 08:51:52', '2017-07-25 08:51:52'),
(38028, 24734461, 'lYbI0nbNtguzpybC4RcTJlFjgdQIsXK4', '2017-07-25 08:51:52', '2017-07-25 08:51:52'),
(38029, 24734461, 'akkhEkDfLFPEAfDq2JCS5adIxnpoziji', '2017-07-25 08:51:57', '2017-07-25 08:51:57'),
(38030, 24734461, 'EIcBIMnWMAandCL8GjyrTD5kz8amrehf', '2017-07-25 08:51:57', '2017-07-25 08:51:57'),
(38031, 24734461, 'YfpmIgzy4xMLxio49KLr7Lx0ImbxE7Z4', '2017-07-25 08:52:01', '2017-07-25 08:52:01'),
(38032, 24734461, 'BCWZ7vvPAxGITA1j3JlJVJFavfZAimBn', '2017-07-25 08:52:01', '2017-07-25 08:52:01'),
(38033, 24734461, 'U5AsYmsLLFk3bozJgvB3sfH5GNoE9bOU', '2017-07-25 08:52:08', '2017-07-25 08:52:08'),
(38034, 24734461, 'hA7oQl4yS7MZY2VSDU7O6mYz40NreA4t', '2017-07-25 08:52:10', '2017-07-25 08:52:10'),
(38035, 24734461, 'DtYatiCj0JOIhG8B3hb2kULNehDSmnTJ', '2017-07-25 08:52:10', '2017-07-25 08:52:10'),
(38036, 24734461, 'FuGKQyd5ejurkrAfyx2tVJ9YkskIw8fj', '2017-07-25 08:52:11', '2017-07-25 08:52:11'),
(38037, 24734461, 'PO51ucHiMbfA6Xbxix8E1nmJw99fsPA1', '2017-07-25 08:52:15', '2017-07-25 08:52:15'),
(38038, 24734461, 'dKeG1wp3uSPbxwlrmKkAleK2J6T9AuyR', '2017-07-25 08:52:15', '2017-07-25 08:52:15'),
(38039, 24734461, '0TJLcGgtvoAMtiwhHnqpZBJ2cer7HefU', '2017-07-25 08:52:17', '2017-07-25 08:52:17'),
(38040, 24734461, 'BbqhnXA0hNKzLoVNl3tzDhSPCVzV9fOS', '2017-07-25 08:52:19', '2017-07-25 08:52:19'),
(38041, 24734461, 'kQ84RTdi4oqNmFhMStXn9zi5PY1YqKDT', '2017-07-25 08:52:19', '2017-07-25 08:52:19'),
(38042, 24734464, 'l4Q99OB2IX5zZKokzWoEH1rvoVzCzH9n', '2017-07-25 08:52:38', '2017-07-25 08:52:38'),
(38043, 24734464, 'Pcbv8Y3V23bwGDO9CNklO5BWhvzeWfvE', '2017-07-25 08:52:39', '2017-07-25 08:52:39'),
(38044, 24734464, '2BJwmKUEjBXqqBMoumt0YkcHE8TrzCW7', '2017-07-25 08:52:39', '2017-07-25 08:52:39'),
(38045, 24734464, 'AB6jLBKo0o3CbSS51ss1eoQxK5OqNSwd', '2017-07-25 08:52:39', '2017-07-25 08:52:39'),
(38046, 24734464, 'yixjfksmRz00Sa4zsDEtHLsdVcsNKeaZ', '2017-07-25 08:54:02', '2017-07-25 08:54:02'),
(38047, 24734464, 'q9lSF1A87f18XTT1tQ7lacddxSNZ5g5n', '2017-07-25 08:54:04', '2017-07-25 08:54:04'),
(38048, 24734464, 'XJoezRS7pMjlbeoPiyfREz4Mfea0NRwJ', '2017-07-25 08:54:04', '2017-07-25 08:54:04'),
(38049, 24734464, 'QI1fDMRuSsmNoyYp6n4uDeVEZmSlM98y', '2017-07-25 08:54:05', '2017-07-25 08:54:05'),
(38050, 24734464, '0U4PU9C0JWzEFOWsqoUIy54B9OPulsbm', '2017-07-25 08:54:22', '2017-07-25 08:54:22'),
(38051, 24734464, 'er4U77s14FTkiP7QSI3myIZYDPPswECl', '2017-07-25 08:54:23', '2017-07-25 08:54:23'),
(38052, 24734464, 'WZiyzWWbKEk3mEAsRyCa7oKRoXvBGzar', '2017-07-25 08:54:26', '2017-07-25 08:54:26'),
(38053, 24734464, 'pnYkzf3LNOG2A308s76f0glsuKwQOKdP', '2017-07-25 08:54:27', '2017-07-25 08:54:27'),
(38054, 24734464, 'hntP0n4AJPIsIjUQmd2nkEqpEEdSyEL9', '2017-07-25 08:54:34', '2017-07-25 08:54:34'),
(38055, 24734464, 'W2CcoWQGCXZLK4pLkDLlm6n2aIZrwOAA', '2017-07-25 08:54:36', '2017-07-25 08:54:36'),
(38056, 24734464, 'pisTS77utwn4Meezhg1ztaxRkiFeMcF3', '2017-07-25 08:54:39', '2017-07-25 08:54:39'),
(38057, 24734464, 'cqkAR0hkaVwuvwmugS5Cfaii4VF8E5p4', '2017-07-25 08:54:40', '2017-07-25 08:54:40'),
(38058, 24734464, 'le4sN60eaAR324Dov1aHeevdsmFcwHYi', '2017-07-25 08:54:42', '2017-07-25 08:54:42'),
(38059, 24734464, 'QJ4QNybNUd0NBeB59N1kPSaP8SBIQ5ck', '2017-07-25 08:54:43', '2017-07-25 08:54:43'),
(38060, 24734464, 'ZgymfljJa3qAUwfcwUN4nwNvAtJvAxXm', '2017-07-25 09:00:28', '2017-07-25 09:00:28'),
(38061, 24734464, 'pkvjPBWw5VDGF79ojWgbEkdh7T3DP9KO', '2017-07-25 09:00:28', '2017-07-25 09:00:28'),
(38062, 24734464, 'K27bolrhYCYnFGLYwsgIOMJaVdVGOXoR', '2017-07-25 09:00:30', '2017-07-25 09:00:30'),
(38063, 24734464, 'DteRuAf62w1QQRRDXknoZJpftoQytDgH', '2017-07-25 09:00:35', '2017-07-25 09:00:35'),
(38064, 24734464, 'kBy6L3raouo55c2WmgWTf4cWmXFYCnwi', '2017-07-25 09:00:35', '2017-07-25 09:00:35'),
(38065, 24734464, 'I8lZhQ6f0HRkQbmWW45hgEfN4QB0Aj9H', '2017-07-25 09:00:39', '2017-07-25 09:00:39'),
(38066, 24734464, 'lSZMe7byQ8COaJIEoKm2wlxESMIU4XMJ', '2017-07-25 09:00:39', '2017-07-25 09:00:39'),
(38067, 24734464, 'Bgzx6TEYl78qYI58Hw0xNzoPNa13YjlG', '2017-07-25 09:00:40', '2017-07-25 09:00:40'),
(38068, 24734464, '2tVixgYtXUVGQusQgPlAz6cSjEfNZX00', '2017-07-25 09:00:43', '2017-07-25 09:00:43'),
(38069, 24734464, 'knASd1SoQjxx2ofgefWSRozBsW7O6yF8', '2017-07-25 09:00:44', '2017-07-25 09:00:44'),
(38070, 24734464, 'lzZgVZdoYtoB6fTreQOFS8sj9NPITVOP', '2017-07-25 09:00:46', '2017-07-25 09:00:46'),
(38071, 24734464, '0neipVA6OtOReEUR7wtuuMdZY6AyEmo7', '2017-07-25 09:00:46', '2017-07-25 09:00:46'),
(38072, 24734464, 'RpXVgdkNDkntkdsXOo8Yurb3Y0VmTP3L', '2017-07-25 09:00:47', '2017-07-25 09:00:47'),
(38073, 24734464, 'caposvBl43YgMTHxTq7KKC6SCQKs5NDg', '2017-07-25 09:00:51', '2017-07-25 09:00:51'),
(38074, 24734464, 'vUn5ARJICws4Gz8XF2AMBMQFHtLlrVtv', '2017-07-25 09:00:52', '2017-07-25 09:00:52'),
(38075, 24734464, '1mYt9ZqbHUSHS3TKlguCwQ0ZTSwXd8jY', '2017-07-25 09:00:55', '2017-07-25 09:00:55'),
(38076, 24734464, 'BGevY25V7Fi7acYABE2Oo4i0n0pwT8tD', '2017-07-25 09:00:55', '2017-07-25 09:00:55'),
(38077, 24734464, '8SZFTeCQmkp7BFglHmHj3YLhhxLHifbg', '2017-07-25 09:00:56', '2017-07-25 09:00:56'),
(38078, 24734464, 'QQPMTZpPeTh499UimfsTcbpOOFCwqkfc', '2017-07-25 09:00:59', '2017-07-25 09:00:59'),
(38079, 24734464, 'SlgfdZLNW8YDgCqRlBIFkzgtjYsjYjZX', '2017-07-25 09:01:00', '2017-07-25 09:01:00'),
(38080, 24734464, 'bDgxrMFMOXhgG38LgJu51HDtsESdg2nX', '2017-07-25 09:01:01', '2017-07-25 09:01:01'),
(38081, 24734464, 'azTm9rcrPyansTJZa1MRPCYdXCcMXBgp', '2017-07-25 09:01:02', '2017-07-25 09:01:02'),
(38082, 24734464, 'hJ6mKNtOCMd5h9s8kBPxwhkLdCbHBYlB', '2017-07-25 09:01:02', '2017-07-25 09:01:02'),
(38083, 24734464, 'rYdo9069tBuItusfUJE5AGWvpo4X1hYQ', '2017-07-25 09:03:35', '2017-07-25 09:03:35'),
(38084, 24734464, 'z52UQFF2lMkFlq5cPMyehh4ounW4Fzn5', '2017-07-25 09:03:38', '2017-07-25 09:03:38'),
(38085, 24734464, 'XJ7FAUy5x678OpOUAEXiddDxQ66p8kJk', '2017-07-25 09:03:39', '2017-07-25 09:03:39'),
(38086, 24734464, 'gaMNFSPm2ZeT3KmsDmvGkshMxSnfinqd', '2017-07-25 09:03:39', '2017-07-25 09:03:39'),
(38087, 24734464, 'rYZ2gsm4BaZ9X1Y63gXq4rY7Gzl7Gt81', '2017-07-25 09:03:43', '2017-07-25 09:03:43'),
(38088, 24734464, 'lb1bjI1f7vkUYzYZecSYTRYduQyEZVWE', '2017-07-25 09:04:17', '2017-07-25 09:04:17'),
(38089, 24734464, '4CJf0XMPcNSChDw6X0vTzmlC8fm8GuzO', '2017-07-25 09:04:18', '2017-07-25 09:04:18'),
(38090, 24734464, 'DLLmqYnlS91TsmO48udRzMglyYC8UtA9', '2017-07-25 09:04:19', '2017-07-25 09:04:19'),
(38091, 24734464, 'QLqNLK3hiUMc2QiyfXNpKRcPG8q1eP5w', '2017-07-25 09:04:20', '2017-07-25 09:04:20'),
(38092, 24734464, 'IoBMDudILm534KPJQabqctnfb5FRDf1K', '2017-07-25 09:04:23', '2017-07-25 09:04:23'),
(38093, 24734464, '5V7H9Qh0chKUnGevICO5SauWgSGpXIlW', '2017-07-25 09:04:25', '2017-07-25 09:04:25'),
(38094, 24734464, 'VgtEo6qzJmdUtEQYk4Euwoycba4DUfcS', '2017-07-25 09:04:26', '2017-07-25 09:04:26'),
(38095, 24734464, 'Sm5uivIIpcnZr79jXe433vz6RFVlhUr4', '2017-07-25 09:04:26', '2017-07-25 09:04:26'),
(38096, 24734464, 'hcH8BB2LmQYpAxa13LTJsobXZYRJH3mo', '2017-07-25 09:04:27', '2017-07-25 09:04:27'),
(38097, 24734464, '73OQwYVQwBYrnjOazJbX1JVrxHqdQUlW', '2017-07-25 09:04:28', '2017-07-25 09:04:28'),
(38098, 24734464, 'yTD2oXSIvPRiig4P9cb2K7wonl6ETo38', '2017-07-25 09:04:29', '2017-07-25 09:04:29'),
(38099, 24734464, 'dJ9iwM2gh9jmn67S8y6oG5PFATDfPRqT', '2017-07-25 09:04:29', '2017-07-25 09:04:29'),
(38100, 24734464, '1HaqkkyFn6XJ0NySU7WPZKDdxYcOl7DV', '2017-07-25 09:04:31', '2017-07-25 09:04:31'),
(38101, 24734464, 'a81NkEIWHp4vI1gbM8XP6v0WQVaA94lt', '2017-07-25 09:04:32', '2017-07-25 09:04:32'),
(38102, 24734464, 'fESUQDNFvGB7iCUNu8QhgzuUpSwSNk9H', '2017-07-25 09:04:33', '2017-07-25 09:04:33'),
(38103, 24734464, 'DMIAfi2soyoQbsJCatpZnXwlkQKyr3Ow', '2017-07-25 09:04:33', '2017-07-25 09:04:33'),
(38104, 24734464, 'OIp1wVqx1nlPQuXZAr8d5eedxagtXlNk', '2017-07-25 09:04:55', '2017-07-25 09:04:55'),
(38105, 24734464, 'wLaRddyMcBQAeQTfWaSQMKl4gLEwJdxj', '2017-07-25 09:04:57', '2017-07-25 09:04:57'),
(38106, 24734464, '4Y1mCkCX29AFwzBZGwhpjTADXxux0wtJ', '2017-07-25 09:04:58', '2017-07-25 09:04:58'),
(38107, 24734464, 'heVUQLCNc1ylrX7TyrA32Y22fWgDzRV4', '2017-07-25 09:05:04', '2017-07-25 09:05:04'),
(38108, 24734464, 'BmAnZhC3FKviFjewV4eRN8S912lLX0nF', '2017-07-25 09:05:06', '2017-07-25 09:05:06'),
(38109, 24734464, 'MWE0AAMzyj0rxaG0jigfZAheHmqc6CBV', '2017-07-25 09:05:19', '2017-07-25 09:05:19'),
(38110, 24734464, 'o2jicW2NbMX6XajS8BpM1w6iEhYcFGdK', '2017-07-25 09:05:19', '2017-07-25 09:05:19'),
(38111, 24734464, 'mMhRsLCaWbgfWlzoxcsvySLq2MEcze7k', '2017-07-25 09:05:21', '2017-07-25 09:05:21'),
(38112, 24734464, 'Rl5Hfxtvz0t6vr30Cug5t4ZeCntN8KmD', '2017-07-25 09:05:22', '2017-07-25 09:05:22'),
(38113, 24734464, 'Bj3ItNyZdo2Wul6BriNID4WqQocHjhei', '2017-07-25 09:05:24', '2017-07-25 09:05:24'),
(38114, 24734464, 'uk7kivtnFon1iLIax0jxph5BUa2cf5az', '2017-07-25 09:05:27', '2017-07-25 09:05:27'),
(38115, 24734464, '38xN3E3CsvGmkEI4P4Lv7raAB3jBkqki', '2017-07-25 09:05:30', '2017-07-25 09:05:30'),
(38116, 24734464, 'taVtYppuZGBFpHud8vDKSo8qgDWIe0yy', '2017-07-25 09:05:42', '2017-07-25 09:05:42'),
(38117, 24734464, 'L0UaSPebPi2hq1fiFITP7qkXs4ZbKjPD', '2017-07-25 09:05:43', '2017-07-25 09:05:43'),
(38118, 24734464, 'ASnMWMRLv2l1VRAsQOKuaFlYKYpfdqOk', '2017-07-25 09:05:47', '2017-07-25 09:05:47'),
(38119, 24734464, 'ObDkn4z0mFRwh5uJzUq7GRvdZ9Omp7SA', '2017-07-25 09:05:50', '2017-07-25 09:05:50'),
(38120, 24734464, 'G9sywb8fiHRHOrqsziQJpEcnMoZy8E5k', '2017-07-25 09:05:50', '2017-07-25 09:05:50'),
(38121, 24734464, 'DSVDGlrRXnEEeDSqankkY4V8DGxOKyYM', '2017-07-25 09:05:52', '2017-07-25 09:05:52'),
(38122, 24734464, 'H1SgN94LBaZKDQfnvtVdjo7vGDlQzQOQ', '2017-07-25 09:06:00', '2017-07-25 09:06:00'),
(38123, 24734464, 'NPkLUdDGdKexHI3yLXyEYOFybovSQEdr', '2017-07-25 09:06:02', '2017-07-25 09:06:02'),
(38124, 24734464, 'd9IVEnNc8JatKwY5ZjK055BVnxLUZAow', '2017-07-25 09:06:03', '2017-07-25 09:06:03'),
(38125, 24734464, 'NwoKUiUlXeljBbp99fJxbxLco5Zf9tw3', '2017-07-25 09:06:06', '2017-07-25 09:06:06'),
(38126, 24734464, 'X1ACCNmzLPgYa94ET7bWGZZfLvMYZirU', '2017-07-25 09:06:07', '2017-07-25 09:06:07'),
(38127, 24734464, '3IDABWiGipOFIfNItH8htnIAcCueF7lx', '2017-07-25 09:06:11', '2017-07-25 09:06:11'),
(38128, 24734464, '9vH0TrjgexTdFeGSJwYxJQ3124btULnF', '2017-07-25 09:06:13', '2017-07-25 09:06:13'),
(38129, 24734464, 'kYjRZlyOVNcItCe1LE3agmaOhPqywV1Q', '2017-07-25 09:06:15', '2017-07-25 09:06:15'),
(38130, 24734464, 'gGP91SCbGgM1nQdHMcbATs3lCSAL8lSK', '2017-07-25 09:06:45', '2017-07-25 09:06:45'),
(38131, 24734464, '2e8CBPEZuYhsKU3pRdSVWWN26AbJiUl8', '2017-07-25 09:06:47', '2017-07-25 09:06:47'),
(38132, 24734464, 'UuBJg1T7sJyo6gwkLcBbul0eoL3HjibW', '2017-07-25 09:06:48', '2017-07-25 09:06:48'),
(38133, 24734464, 'joQLzllBumVRIY4pQKbJzO5v0BqRN6wq', '2017-07-25 09:06:50', '2017-07-25 09:06:50'),
(38134, 24734464, 'TOsTvBcILZGXx0UbteamZlvrCg3qmR06', '2017-07-25 09:07:02', '2017-07-25 09:07:02'),
(38135, 24734464, 'mD2MKfqcGNUQgqjGWO5XLJMbH8ehi1XB', '2017-07-25 09:07:04', '2017-07-25 09:07:04'),
(38136, 24734464, 'uaFVwFDmfrW0PlTJypPgfZaUj2Qw5St9', '2017-07-25 09:07:05', '2017-07-25 09:07:05'),
(38137, 24734464, '9I8n2BmjpsdgikXf5n97jj4cPSdxg60q', '2017-07-25 09:07:06', '2017-07-25 09:07:06'),
(38138, 24734464, '5j4L7wBZsqGLYipv9X2sCHqNSHn0kBdh', '2017-07-25 09:07:07', '2017-07-25 09:07:07'),
(38139, 24734464, 'TTm5dcNfMc8wKJRztbfXOJFDMBKAHs8e', '2017-07-25 09:07:11', '2017-07-25 09:07:11'),
(38140, 24734464, 'aU2EqQnICA2KJoTnkLHYspRkB8JCtZ0p', '2017-07-25 09:07:12', '2017-07-25 09:07:12'),
(38141, 24734464, 'w8lY3vKg8rIZMhL4IREzwAiqLm206UgI', '2017-07-25 09:07:13', '2017-07-25 09:07:13'),
(38142, 24734464, '7b2PHOIukEB6cWcv0RXsVaWoIHV5Urfu', '2017-07-25 09:07:22', '2017-07-25 09:07:22'),
(38143, 24734464, 'dtZlsvR3r24aWtc7DEXpg8xS5YVvJiy4', '2017-07-25 09:07:22', '2017-07-25 09:07:22'),
(38144, 24734464, 'KcO2paVDkrOHS612uTTcbxHPAl6Op3TX', '2017-07-25 09:07:27', '2017-07-25 09:07:27'),
(38145, 24734464, 'ovaphFHmLUzBRKD6FcHbqGsiJmjAMHHA', '2017-07-25 09:07:27', '2017-07-25 09:07:27'),
(38146, 24734464, 'ndboxzPWjvk8aY7wAMtNHomNXFuR5cfF', '2017-07-25 09:07:29', '2017-07-25 09:07:29'),
(38147, 24734464, 'rDboFKHoxOpDSSb7LkepxKSp8sWHvJov', '2017-07-25 09:16:25', '2017-07-25 09:16:25'),
(38148, 24734464, '7GzRFcVoNRckgXfdNI8dnD4qyGJh4jyK', '2017-07-25 09:16:42', '2017-07-25 09:16:42'),
(38149, 24734464, 'js3UAcYUvKhcsBKY8qsYTkvy8W8ogenN', '2017-07-25 09:16:45', '2017-07-25 09:16:45'),
(38150, 24734464, 'lXGCCJwK0icUQgMl8pwNVlCRtcIks7ej', '2017-07-25 09:16:46', '2017-07-25 09:16:46'),
(38151, 24734464, 'sgClPHljIhIy8qJdOwlY3hxvWP0vgHfL', '2017-07-25 09:16:49', '2017-07-25 09:16:49'),
(38152, 24734464, 'dq1uDLT7IxJ9VhJWnTBe2EpfvpfgjKjL', '2017-07-25 09:16:49', '2017-07-25 09:16:49'),
(38153, 24734464, '67hF3eNAPZvQyI5wJAhi0SujMN2Bhcbk', '2017-07-25 09:16:51', '2017-07-25 09:16:51'),
(38154, 24734464, 'xrIPsQ0qQcubFNmmwrjSWYDFWFmOQYFs', '2017-07-25 09:16:52', '2017-07-25 09:16:52'),
(38155, 24734464, '0y91918qP9IYcFxTYK9PXwn6WyG0D8RO', '2017-07-25 09:16:54', '2017-07-25 09:16:54'),
(38156, 24734464, 'Q0WoXA8vYSp5kgsNk77fhnpdd52qHEcG', '2017-07-25 09:16:56', '2017-07-25 09:16:56'),
(38157, 24734464, 'en3C737xxqHz1r39w0iEPYlTn5rK65xc', '2017-07-25 09:16:58', '2017-07-25 09:16:58'),
(38158, 24734464, 'rBZxNO8p6As6OWu9DYPsXR2oE7GaHfFh', '2017-07-25 09:17:39', '2017-07-25 09:17:39'),
(38159, 24734463, 'MRvUxiGzfArteoDeG2acQByZREmRNNUy', '2017-07-25 09:18:01', '2017-07-25 09:18:01'),
(38160, 24734463, 'XBx3lRClFI2aNJMHRUbR4HCVlMUOFYss', '2017-07-25 09:18:15', '2017-07-25 09:18:15'),
(38161, 24734464, 'i4euOoe4VdIzn35jkQopQ08T6sPzk6mo', '2017-07-25 09:18:27', '2017-07-25 09:18:27'),
(38162, 24734464, 'wbwwNM0ByIqYJq4KpkcccZgXgO4RbDn9', '2017-07-25 09:18:27', '2017-07-25 09:18:27'),
(38163, 24734464, 'ZXPM2eXOyrThJ15AbS7xY0K8fxa4g2iA', '2017-07-25 09:18:28', '2017-07-25 09:18:28'),
(38164, 24734464, 'VJSEKDq3Znc1uSJLm6BbQXvxqsl33yqh', '2017-07-25 09:18:30', '2017-07-25 09:18:30'),
(38165, 24734464, 'WYQH4QckQ3T6vTUt7TFNUM0Gcl5zWLOu', '2017-07-25 09:18:32', '2017-07-25 09:18:32'),
(38166, 24734464, 'ktY07ZnHJC6WZ7Rv4WeKNmQ7VfavBe6f', '2017-07-25 09:18:34', '2017-07-25 09:18:34'),
(38167, 24734464, 'JTGQ0Q8UbiqVyw3bA7HrLdV1tkekLVxx', '2017-07-25 09:18:36', '2017-07-25 09:18:36'),
(38168, 24734464, 'rHuOWrRW6bMTj86YwsmGFYHLXMkqDOMq', '2017-07-25 09:18:38', '2017-07-25 09:18:38'),
(38169, 24734464, 'Nt0DeEjDPF73w32BS3VGsYAeZCuQyv0W', '2017-07-25 09:18:40', '2017-07-25 09:18:40'),
(38170, 24734464, 'XQnczoICwV4PJ3oV9U07gcQtELASTRqc', '2017-07-25 09:18:42', '2017-07-25 09:18:42'),
(38171, 24734464, 'Hdlvz5HoyRD7AbjaycAtrwQV10ThXxhM', '2017-07-25 09:18:45', '2017-07-25 09:18:45'),
(38172, 24734464, 'yUvD6XS6gm2tMEIilQ5VhMHxsBGfPJ7a', '2017-07-25 09:18:49', '2017-07-25 09:18:49'),
(38173, 24734464, 'DqWmtTuoyMZHoOiTa1OG2Ia6mujMEX63', '2017-07-25 09:18:49', '2017-07-25 09:18:49'),
(38174, 24734464, 'WDSPMxfJaHoH2xgByuL0BPfn2QQXkuif', '2017-07-25 09:18:53', '2017-07-25 09:18:53'),
(38175, 24734464, 'NigrVYSY8oPVbg7U7ZlCnUNJNiWWwNe9', '2017-07-25 09:18:56', '2017-07-25 09:18:56'),
(38176, 24734464, 'hCYbTzcnAZLbuK93ovngfN7hHI2hZV6Q', '2017-07-25 09:18:56', '2017-07-25 09:18:56'),
(38178, 24734464, 'fhJtfL15G6ePQp8ShIf5W6A5vV4oFXyR', '2017-07-25 14:21:10', '2017-07-25 14:21:10'),
(38179, 24734464, 'KNgC0RTqU2gC73FNvsXBY9wdShQp5XFD', '2017-07-25 14:21:11', '2017-07-25 14:21:11'),
(38180, 24734464, 'HUuY4cOcWm9zA7M5LV33CsdFDY2cCeKr', '2017-07-25 14:21:11', '2017-07-25 14:21:11'),
(38181, 24734464, 'FBaziKJixZWwLtKcd3SFpu3ynKxggoNm', '2017-07-25 14:21:11', '2017-07-25 14:21:11'),
(38182, 24734464, '72tUkzXZAwFSUEgxfLK9meH44LW0KA5p', '2017-07-25 14:22:48', '2017-07-25 14:22:48'),
(38183, 24734464, 'Ffgi0s1jBCPWqAReioUA120gyS6HXmxq', '2017-07-25 14:32:23', '2017-07-25 14:32:23'),
(38184, 24734464, 'h7XeUY8dHI0kYFnVAQ2z0Vi9p64RQcgi', '2017-07-25 14:32:23', '2017-07-25 14:32:23'),
(38185, 24734464, 'TfM9lUQlsYE9jXn8GguOtjyXLzlKg1sH', '2017-07-25 14:32:25', '2017-07-25 14:32:25'),
(38186, 24734464, 'zDdIY6RD2rwpUwNEqVcn11vbIAqglMeb', '2017-07-25 14:40:26', '2017-07-25 14:40:26'),
(38187, 24734464, 'n40F0mlcjtEXZU4TiFi80zZW6wWsk5Vn', '2017-07-25 14:40:57', '2017-07-25 14:40:57'),
(38188, 24734464, 'RSsK4BTOdjkVIpZX5NsivrAfFSDwToM8', '2017-07-25 14:40:57', '2017-07-25 14:40:57'),
(38189, 24734464, 'px2t8AO6HUzxHFwIWM769R0s4360fjeO', '2017-07-25 14:40:58', '2017-07-25 14:40:58'),
(38190, 24734464, 'rGSWlrH7pfMrBurNViYETIlfLvPqTikO', '2017-07-25 14:43:05', '2017-07-25 14:43:05'),
(38191, 24734464, 'blONHelMNA2yIKIgp5DmNkFmeEKm5u1D', '2017-07-25 14:43:08', '2017-07-25 14:43:08'),
(38192, 24734464, '5jB4gRlBD0xkV8vURxtb0fBLS5P5WZJJ', '2017-07-25 14:43:08', '2017-07-25 14:43:08'),
(38193, 24734464, 'v5Sj5GNCcPpFYPmYPQdE087yQGucSTtb', '2017-07-25 14:43:09', '2017-07-25 14:43:09'),
(38194, 24734464, 's49jTlezMRYhsGIH2epOMuCO42TTSaqn', '2017-07-25 14:47:45', '2017-07-25 14:47:45'),
(38195, 24734464, 'tfedUxuNWNtWTHAoPBK60uTRPNz8LnxU', '2017-07-25 14:47:51', '2017-07-25 14:47:51'),
(38196, 24734464, 'UPaEc33fBbXpF3S4NImUazmgePODhUS3', '2017-07-25 14:47:51', '2017-07-25 14:47:51'),
(38197, 24734464, 'lO5OZa2JwKeoS6m86VLJ1fC9jhKpnqVG', '2017-07-25 14:47:52', '2017-07-25 14:47:52'),
(38198, 24734464, 'rcyUsG3zUmU1NVa0Y1YKMnWYx1eWCwuC', '2017-07-25 14:55:40', '2017-07-25 14:55:40'),
(38199, 24734464, '1mVtN8v4NiAezWSUBrJBHuyIAEGmhsk6', '2017-07-25 14:55:49', '2017-07-25 14:55:49'),
(38200, 24734464, '9HxUXuPp7ysmVscDpCTOw7aXNnoxWoHq', '2017-07-25 14:55:50', '2017-07-25 14:55:50'),
(38201, 24734464, 'lwgWeHPa038Ys6jjvC15obtk7IFITuzc', '2017-07-25 14:55:51', '2017-07-25 14:55:51'),
(38202, 24734464, 'NRkDKJCJ2aMSp8HCUM5am50iBFbhQmff', '2017-07-25 14:58:29', '2017-07-25 14:58:29'),
(38203, 24734464, 'rgdtXfX1QlSO1edX4Y5Uj6kj4tZaS5aT', '2017-07-25 14:58:33', '2017-07-25 14:58:33'),
(38204, 24734464, 'g69WWZo80VPH7oOGUasxOzr5T1tGJ2Vk', '2017-07-25 14:58:34', '2017-07-25 14:58:34'),
(38205, 24734464, 'tETDUTNIGLj5WYxo9ab5N9oo0DkwGd75', '2017-07-25 14:58:34', '2017-07-25 14:58:34'),
(38206, 24734464, 'OvkBSfEtapMVxS9wscKsZKsQ2FElPpV7', '2017-07-25 15:04:47', '2017-07-25 15:04:47'),
(38207, 24734464, 'K8DkxPJ7IbOSM25Xd95FwFsuO0o1sylP', '2017-07-25 15:04:50', '2017-07-25 15:04:50'),
(38208, 24734464, 'HhXUicm56LM7ouD6V5FYZvwsIfiLrzxo', '2017-07-25 15:04:50', '2017-07-25 15:04:50'),
(38209, 24734464, '3pR4G6ospZEUkSPPHKyVpDuL0edjY7gJ', '2017-07-25 15:04:51', '2017-07-25 15:04:51'),
(38210, 24734464, 'oOswzdkFPKU3hsBDSZPro9NH1p3KK44N', '2017-07-25 15:06:06', '2017-07-25 15:06:06'),
(38211, 24734464, 'FClbtgSyoBXZKFsSR6WWeaooK5c4TUSE', '2017-07-25 15:08:12', '2017-07-25 15:08:12'),
(38212, 24734464, 'mDZwYu1wK5d1M3zC1suG3iDX3wbcK0xD', '2017-07-25 15:08:12', '2017-07-25 15:08:12'),
(38213, 24734464, 'yglWANkei59ipVkUNumoM7XBpmWPb9rv', '2017-07-25 15:08:13', '2017-07-25 15:08:13'),
(38214, 24734464, 'MfKTQrrKeaQDH9GFRjl4zovvQEhHsxc3', '2017-07-25 15:08:18', '2017-07-25 15:08:18'),
(38215, 24734464, 'NtrYQ4aSyLdS8tnvikWMzOPCNUsT6Dwi', '2017-07-25 15:08:22', '2017-07-25 15:08:22'),
(38216, 24734464, 'oiUKcBhTygYkRQlv67o8HafEeACAeLuN', '2017-07-25 15:08:22', '2017-07-25 15:08:22'),
(38217, 24734464, 'J7nysjLwbiM1CJudGKbOEn1Opzuzw8iX', '2017-07-25 15:08:23', '2017-07-25 15:08:23'),
(38218, 24734464, 'at5mFxieSG5qGmVIJLyazSh36qzK5Qq4', '2017-07-25 15:27:31', '2017-07-25 15:27:31'),
(38219, 24734464, 'JpkZW1tFbZba4knm047DPJhiW8ViOnj1', '2017-07-25 15:27:32', '2017-07-25 15:27:32'),
(38220, 24734464, 'l3sUkfbsIQ3N4gjEYL2u18HFdBCzGlNZ', '2017-07-25 15:31:46', '2017-07-25 15:31:46'),
(38221, 24734464, 'RS822q989iSbUMYnKe3VfgftnJ59f8fy', '2017-07-25 15:31:47', '2017-07-25 15:31:47'),
(38222, 24734464, 'GMOZnIepOY2De041BmOTHnfF9je50jPD', '2017-07-25 15:31:52', '2017-07-25 15:31:52'),
(38223, 24734464, 'bqnpsOPaWLclEqosEO53E9mAxvq3dadl', '2017-07-25 15:31:54', '2017-07-25 15:31:54'),
(38224, 24734464, 'LnThK0UuSzJXF39R45wYCTJI4AvTYDbN', '2017-07-25 15:31:55', '2017-07-25 15:31:55'),
(38225, 24734464, 'jXFsQXQzZe8i9ATBpViNYAcZSbl8FZNU', '2017-07-25 15:31:58', '2017-07-25 15:31:58'),
(38226, 24734464, 'HffU7w5mpiqbuKe8h0Hnznr8oqAFBEHI', '2017-07-25 15:31:58', '2017-07-25 15:31:58'),
(38227, 24734463, 'DfQOViY3VSlLU3zfQSab44Q2Vewi3SEE', '2017-07-25 16:02:07', '2017-07-25 16:02:07'),
(38228, 24734464, 'zrgCHvDPZ4RdKbiYFJrK4BO97QlLtDIH', '2017-07-25 16:35:54', '2017-07-25 16:35:54'),
(38229, 24734464, 'iIPUoHaWms4BML8UYqybxyLB2esvkEl4', '2017-07-25 16:35:54', '2017-07-25 16:35:54'),
(38230, 24734464, 'InLBpzsz87ojxZdgcO9hhscYa47IZxEV', '2017-07-25 16:35:55', '2017-07-25 16:35:55'),
(38231, 24734464, '3HLmmWrb7w0xcIIxGKE22akpczMTNmTb', '2017-07-25 16:35:55', '2017-07-25 16:35:55'),
(38232, 24734464, 'DA2T1jqOgUaTG6xXrsAjO04zVmcrFmV6', '2017-07-25 16:36:13', '2017-07-25 16:36:13'),
(38233, 24734464, 'kAMnwrNx0LBylLmGAZGJPDgGXG2RvHIY', '2017-07-25 16:36:15', '2017-07-25 16:36:15'),
(38234, 24734464, '72OZTkpaPl4fuTtydNwoGxc7952HJGjM', '2017-07-25 16:36:15', '2017-07-25 16:36:15'),
(38235, 24734464, 'TBzj5oiDcRus5iBuDNqMRVqClV69wp3t', '2017-07-25 16:36:16', '2017-07-25 16:36:16'),
(38236, 24734464, 'Op6pJkbtmOwv3tZzdA3fULKwCbKo9Ou4', '2017-07-25 16:36:22', '2017-07-25 16:36:22'),
(38237, 24734464, 'yuXdNsbSi8fYNo4Uypae44vKRfaLEEKM', '2017-07-25 16:36:25', '2017-07-25 16:36:25'),
(38238, 24734464, 'wlmvLVyCD4rleUM6sFYQooDLzVkEKM91', '2017-07-25 16:36:28', '2017-07-25 16:36:28'),
(38239, 24734464, 'q3voWpzhzi3Mq46aPMVBVgkBKIHfC1My', '2017-07-25 16:36:31', '2017-07-25 16:36:31'),
(38240, 24734464, 'yklbFTJuqVjPkC8FNIjYFV6zEL9R5lQP', '2017-07-25 16:36:33', '2017-07-25 16:36:33'),
(38241, 24734464, 'dlGZMtLtLh9MpfJNKKtnFYujxIqX2iJ6', '2017-07-25 16:36:35', '2017-07-25 16:36:35'),
(38242, 24734464, 'x5WevCKth2CFVZ2dYEaiZbrdCH3CFtnA', '2017-07-25 16:36:41', '2017-07-25 16:36:41'),
(38243, 24734464, 'v31SxirN1ILWp2TqxW5Q5UcM9vpHy2r3', '2017-07-25 16:36:43', '2017-07-25 16:36:43'),
(38244, 24734464, 'QXI5XGpZoeo81o1hFP6stM1vKvFqDTmQ', '2017-07-25 16:36:44', '2017-07-25 16:36:44'),
(38245, 24734464, 'NjrHCipqOQi4ixexq5M2I4Ltps7FlL5T', '2017-07-25 18:46:52', '2017-07-25 18:46:52'),
(38246, 24734464, 'DXUZlf9zXvw4QUgPT7ue9mRSpyiTr0NH', '2017-07-25 18:46:54', '2017-07-25 18:46:54'),
(38247, 24734464, '1Mk1Am6W3uXFHPw1MZsS5Ona9yV2qGA9', '2017-07-25 18:46:58', '2017-07-25 18:46:58'),
(38248, 24734464, 'BaIwOvwhFE26pe63CapCg66P6LwK9JUv', '2017-07-25 18:47:01', '2017-07-25 18:47:01'),
(38249, 24734464, 'oNxQUrJKCQE4Y76lFoGrIw2Retg4gPGc', '2017-07-25 18:47:01', '2017-07-25 18:47:01'),
(38250, 24734464, 'gls5DxRTTa6xKLjvFcwbml0KrgD8F4t7', '2017-07-25 18:48:36', '2017-07-25 18:48:36'),
(38251, 24734464, 'fCFmXULyWclEVe2CrdrHGX2LQhSnFlIh', '2017-07-25 18:52:25', '2017-07-25 18:52:25'),
(38252, 24734464, 'SmRwhRNqt2Lj5yc6S8F8ksNS195TS3tG', '2017-07-25 18:52:26', '2017-07-25 18:52:26'),
(38253, 24734464, 'lNRE90TbOhptMhDGYI0OyzUqogCQgVId', '2017-07-25 18:53:43', '2017-07-25 18:53:43'),
(38254, 24734464, 'NLLvzw21rQyUs97KDnTsvO4puad3lDdx', '2017-07-25 18:53:45', '2017-07-25 18:53:45'),
(38255, 24734464, 'BanJmKGqdoILwYRq0pD6UQ0kzEsepusT', '2017-07-25 18:53:46', '2017-07-25 18:53:46'),
(38256, 24734464, 'hVAwxIOIwe7pyMFBzmvYKyaJYLgR1iET', '2017-07-25 20:26:14', '2017-07-25 20:26:14'),
(38257, 24734464, 'XefLVLRBZmDnCcldXKZybCFkzT7lsPNA', '2017-07-25 20:26:14', '2017-07-25 20:26:14'),
(38258, 24734464, 'O2CWXJyLt5yhrU1nBYxqwx70zyZQtyag', '2017-07-25 20:26:15', '2017-07-25 20:26:15'),
(38259, 24734464, '0eLha88o4ysschcUgceUe2RBSaCFOVAR', '2017-07-25 21:38:53', '2017-07-25 21:38:53'),
(38260, 24734464, 'ZF9xH9nK3N2Zpdc3xIjhjgnawsRvcqtb', '2017-07-25 21:38:53', '2017-07-25 21:38:53'),
(38261, 24734464, '1jxxUEMyV3xnQBFBR3ZcrQWDmGxcKIdc', '2017-07-25 21:38:54', '2017-07-25 21:38:54'),
(38262, 24734463, '796QjTfEJ4ozorcjKthYgnO4D2rSjqUo', '2017-07-25 21:39:17', '2017-07-25 21:39:17'),
(38263, 24734463, 'mewGtO66YKw6Fmu9npzEqqW7QuMqoE9S', '2017-07-25 21:46:02', '2017-07-25 21:46:02'),
(38264, 24734464, 'jFEOua9Qf3Kcsx5RLc3EuI8u3i9Q9VuV', '2017-07-25 21:46:18', '2017-07-25 21:46:18'),
(38265, 24734464, 'OKbCCTDchfrMTr8BMoxWe9S701NHcDQE', '2017-07-25 21:46:56', '2017-07-25 21:46:56'),
(38266, 24734464, 'iCXQmtlK6guvBrsPhrB9QalYN3nwTdy2', '2017-07-25 21:46:57', '2017-07-25 21:46:57'),
(38267, 24734464, 'LqNSNbiwKhW737qqa71w6aoeF00M4agx', '2017-07-25 21:46:57', '2017-07-25 21:46:57'),
(38268, 24734463, 'wO15Atreq1VyBVtKAPrpmhNjze7eE9vY', '2017-07-25 21:47:01', '2017-07-25 21:47:01'),
(38269, 24734464, '2DIH5ZEcnDMct0Drh9JdIgcPL160GLmS', '2017-07-25 21:47:03', '2017-07-25 21:47:03'),
(38272, 24734470, 'nVUYMwVLuCyu5HbjjOQL6tnKorj1IS73', '2017-07-25 23:49:26', '2017-07-25 23:49:26'),
(38274, 24734446, 'VutmUFdqfBSgsDgrm8oXGCwBA3BaWzcZ', '2017-07-26 00:34:17', '2017-07-26 00:34:17'),
(38275, 24734446, 'Oc7TAOqFgNWrVFDFc1kEZllg6LZgMBlX', '2017-07-26 01:09:51', '2017-07-26 01:09:51'),
(38276, 24734446, 'hqXudmYPoxW1pXdSoY9g4evS3kq9ir7C', '2017-07-26 07:41:46', '2017-07-26 07:41:46'),
(38277, 24734463, 'unHeoxC4rTvnoteN9BAE4xpsPE5Mn9O3', '2017-07-26 07:43:41', '2017-07-26 07:43:41'),
(38278, 24734464, 'gcAbB45lnM70RahOSKuUQqlpfNAWK06p', '2017-07-26 08:22:25', '2017-07-26 08:22:25'),
(38279, 24734464, 'MX6EHnfkugF4EMpAKFgzp8V8CEOijwNr', '2017-07-26 08:22:29', '2017-07-26 08:22:29'),
(38280, 24734464, 'UU7WFPfFxJPETkwbSaYHzb0Ksux4HEji', '2017-07-26 08:22:30', '2017-07-26 08:22:30'),
(38281, 24734464, 'mES2clI9MLGX0682oSJKFgZadkh0mROd', '2017-07-26 08:22:31', '2017-07-26 08:22:31'),
(38282, 24734464, 'Sx5WHz3hz3cljXovbRm9jkcM8xBtKvoL', '2017-07-26 08:22:36', '2017-07-26 08:22:36'),
(38283, 24734464, '5o0ZieXaCHV4QVR0N0TnVnVqCu9OJRJt', '2017-07-26 08:22:40', '2017-07-26 08:22:40'),
(38284, 24734464, 'RMCY8nf25Y3jUyn8rfYIGRpeCexfctcj', '2017-07-26 08:22:40', '2017-07-26 08:22:40'),
(38285, 24734464, 'KjtkFz8LpoCHi0VQ7R5FmWjtee4kdP30', '2017-07-26 08:22:41', '2017-07-26 08:22:41'),
(38286, 24734464, 'fmYNoOQ0hYOEklU6dA0Ix2rrj8D9gZoc', '2017-07-26 08:22:44', '2017-07-26 08:22:44'),
(38287, 24734464, 'XzXoaGr77tXsXcdIsgK1Ply7I8PXLMSu', '2017-07-26 08:22:49', '2017-07-26 08:22:49'),
(38288, 24734464, 'qFPmWrUwMByF3NwRDzZRAar6Ai8haV4i', '2017-07-26 08:22:49', '2017-07-26 08:22:49'),
(38289, 24734464, 'FVbjO0TKf8zV1jtO6zo5Ij4az1SOmX4i', '2017-07-26 08:22:50', '2017-07-26 08:22:50'),
(38290, 24734464, 'R0Xkkl4RQC50BZrXFSuoeZtN9kciDkHe', '2017-07-26 08:22:55', '2017-07-26 08:22:55'),
(38291, 24734464, 'ZjJ5Qu4iXjpwPfGCyw93YnB7p4Z8XAxm', '2017-07-26 08:23:01', '2017-07-26 08:23:01'),
(38292, 24734464, 'P9pEixWIuoXGX5wwGNtatd6U0OqbKwdA', '2017-07-26 08:23:17', '2017-07-26 08:23:17'),
(38293, 24734464, 'AidG9M7KAVA5YKyxwmD6QY0kZYJaN3Lp', '2017-07-26 08:23:18', '2017-07-26 08:23:18'),
(38294, 24734464, 'hNiLR1fpGEYvMvfY1vYMYdh9paRx0o3e', '2017-07-26 08:23:24', '2017-07-26 08:23:24'),
(38295, 24734464, 'wSUNNwbaHTzh6xtX0FhiClCdQwtfeTZU', '2017-07-26 08:23:27', '2017-07-26 08:23:27'),
(38296, 24734464, 'Njb8eGR5SFjgrJrmNWdXH7CnI4euvVOY', '2017-07-26 08:23:50', '2017-07-26 08:23:50'),
(38297, 24734464, 'l9c3U2ialOobvfMzj0j1CGy949CfrHQN', '2017-07-26 08:23:51', '2017-07-26 08:23:51'),
(38298, 24734464, 'qBLAwSLoPiuhWQlzFOVI5mUpkjNnU4I0', '2017-07-26 08:23:54', '2017-07-26 08:23:54'),
(38299, 24734464, 'GTyaXQufsgVyXRMWRzrqGJF6X1rGkLB0', '2017-07-26 08:23:56', '2017-07-26 08:23:56'),
(38300, 24734464, 'CxftgC6VACTZdiafnABiRnuY2WbrOK96', '2017-07-26 08:35:53', '2017-07-26 08:35:53'),
(38301, 24734464, 'H1oXuJI4HwU7pkc1Diazc2m15FDm9l45', '2017-07-26 08:35:54', '2017-07-26 08:35:54'),
(38302, 24734464, 'jPq1u2yfwpMuwkIAlsIX63s5s2h1twZJ', '2017-07-26 08:35:54', '2017-07-26 08:35:54'),
(38303, 24734464, 'ue6IN952aRzTfXZDYDCf7yhH2qLTzEa5', '2017-07-26 08:36:00', '2017-07-26 08:36:00'),
(38304, 24734464, '0koTh5HjeRNs2pdRwQjWxf7iVY0UJZ7m', '2017-07-26 08:40:14', '2017-07-26 08:40:14'),
(38305, 24734464, 'frNZT4eAltyyMFpUNfScYJTL9Y8c8rYh', '2017-07-26 08:40:14', '2017-07-26 08:40:14'),
(38306, 24734464, 'GiwAzPyiF9X5Ub8P9bQ0sbQufRp5bCBT', '2017-07-26 08:40:33', '2017-07-26 08:40:33'),
(38307, 24734464, 'qoOMOVCQvafm6GVw66PfmrB6l806lC2a', '2017-07-26 08:41:29', '2017-07-26 08:41:29'),
(38308, 24734464, '3ceCGe35zhuziR0FQamyR7NA4Oqj2cRC', '2017-07-26 08:41:45', '2017-07-26 08:41:45'),
(38309, 24734464, 'ugFE9nlxfL4IOI7BAKoZUKvaEiJrRqOY', '2017-07-26 08:41:46', '2017-07-26 08:41:46'),
(38310, 24734464, 'gUGF8x8AGOwdU4jYUNsh3QV2j1PdyT1T', '2017-07-26 08:41:49', '2017-07-26 08:41:49'),
(38311, 24734464, 'uSEydHGx0i7b2VQRUzPZ9zkdvE7X1Q9A', '2017-07-26 08:41:51', '2017-07-26 08:41:51'),
(38312, 24734464, 'pU9c4TF3CmRF6JqvhJs5tKPxM8p9xdK3', '2017-07-26 08:42:09', '2017-07-26 08:42:09'),
(38313, 24734464, 'qOIcJSEqnD1uYMSaB1Uoy30X79X59jdK', '2017-07-26 08:42:10', '2017-07-26 08:42:10'),
(38314, 24734464, 'SuixhIO4Mtk9a12xI2xvq1gvGUiQnJ1R', '2017-07-26 08:42:11', '2017-07-26 08:42:11'),
(38315, 24734464, 'hoYJArEq9OgUuBt0PsQ5PCYSuHvCyu5U', '2017-07-26 08:42:13', '2017-07-26 08:42:13'),
(38316, 24734464, 'fj3bjoUaxEALW3clH4QJpVWBt7y1xAke', '2017-07-26 08:48:09', '2017-07-26 08:48:09'),
(38317, 24734464, 'Q4ZhvhVG4hMBmmj2Xk08oLoiRkYvD9KB', '2017-07-26 08:48:11', '2017-07-26 08:48:11'),
(38318, 24734464, 'kF0XHxQEwibdVblOAOsd7COrNWnwsVF6', '2017-07-26 08:48:12', '2017-07-26 08:48:12'),
(38319, 24734464, 'v4Z41uYmcChCgCsicE4m20eL0gvOmCrY', '2017-07-26 08:48:18', '2017-07-26 08:48:18'),
(38320, 24734464, 'VQPgKbtym1WVjla1IoBV7yYGIyK3ZNMY', '2017-07-26 08:48:19', '2017-07-26 08:48:19'),
(38321, 24734464, '5dBWofynPM3QUovVkelo1qBc4yekoL92', '2017-07-26 08:48:22', '2017-07-26 08:48:22'),
(38322, 24734464, '6y2U2yHmR3PC3AdnCdpKw3E3ITPc4Mo1', '2017-07-26 08:48:23', '2017-07-26 08:48:23'),
(38323, 24734464, 'nFGHYDepay32IgtPjriTjAknKiK9Hfz8', '2017-07-26 08:48:24', '2017-07-26 08:48:24'),
(38324, 24734464, 'mPjZJsSiLd8CJbElJk5mlE3N0BXTyHbN', '2017-07-26 08:48:26', '2017-07-26 08:48:26'),
(38325, 24734464, 'UzQ1T1TBmrZYOCvyNflY3AHMhygzr93h', '2017-07-26 08:48:31', '2017-07-26 08:48:31'),
(38326, 24734464, 'jNaBBb6UQJ3JlrlEGGvhLds4rk1C8IIE', '2017-07-26 08:49:15', '2017-07-26 08:49:15'),
(38327, 24734464, 'hhGLwfNj36rmtZ0GqbIsQILR8rx6ZhYF', '2017-07-26 08:49:17', '2017-07-26 08:49:17'),
(38328, 24734464, 'icQyvwx9YmUwprhzqMM6xhi5ejCIUjoF', '2017-07-26 08:49:22', '2017-07-26 08:49:22'),
(38329, 24734464, 'KbREvBq6ng6UXSvsmA7N7Je3bynXSZHu', '2017-07-26 08:49:23', '2017-07-26 08:49:23'),
(38330, 24734464, 'Vwgq9S2qq32J1nev6viqqMD5zg8H4XeC', '2017-07-26 08:49:24', '2017-07-26 08:49:24'),
(38331, 24734464, 'yXKARwTP2m29TdEql5If3rjvIEJ1RPfn', '2017-07-26 08:49:27', '2017-07-26 08:49:27'),
(38332, 24734464, '9cUTspz0aA0tc37aRKQeBB1oMOjBvzav', '2017-07-26 08:49:30', '2017-07-26 08:49:30'),
(38333, 24734464, 'KIRXcycoaWCk6cHaFnwjPdQtmMJut13V', '2017-07-26 08:49:31', '2017-07-26 08:49:31'),
(38334, 24734464, 'PrMX3b8lzDs1VyDv5Ll6xrVd91Y3IfpP', '2017-07-26 08:49:34', '2017-07-26 08:49:34'),
(38335, 24734464, 'OBv8FoF1UEI5OtXHQY0QJ06KaAHzE0jP', '2017-07-26 08:49:35', '2017-07-26 08:49:35'),
(38336, 24734464, 'kgOCDF6bEOxsd8ZF9QQ3q3mgmZJtm0L5', '2017-07-26 08:49:36', '2017-07-26 08:49:36'),
(38337, 24734464, 'OQ2hloj1qCOYmBATyCrzxZ9MzOxhhH2w', '2017-07-26 08:49:37', '2017-07-26 08:49:37'),
(38338, 24734464, '5M8fy9NGtI039dZnXNtVbgAso3PR7R2E', '2017-07-26 08:50:23', '2017-07-26 08:50:23'),
(38339, 24734464, 'YgkEXtGgSmWS9Q1IWgCCsIhwiL3LVOeN', '2017-07-26 08:50:34', '2017-07-26 08:50:34'),
(38340, 24734464, 'ZfzoWzIsjsbfnmnpBefRAPJaqGAuhi5O', '2017-07-26 08:50:46', '2017-07-26 08:50:46'),
(38341, 24734464, 'RnumN78SvwJeSBxXRMGS57yQD5ulhqfu', '2017-07-26 08:50:55', '2017-07-26 08:50:55'),
(38342, 24734464, 'XlGPeCBnLYrPaDDdSuI23BNvJIKviVYs', '2017-07-26 08:50:57', '2017-07-26 08:50:57'),
(38343, 24734464, 'XfmHxbEHIYLG6HryyWUV5czvhfkjkQDc', '2017-07-26 08:51:27', '2017-07-26 08:51:27'),
(38344, 24734464, '2jzjqhnfquOYWLkGX4QEkPAgaeKbytoQ', '2017-07-26 08:51:37', '2017-07-26 08:51:37'),
(38345, 24734464, 'SAJQJqnQYSzq3Hf7j1Lb8BYDv5k9gtF1', '2017-07-26 08:51:40', '2017-07-26 08:51:40'),
(38346, 24734464, 'X3ekCsUgoPKtc5RIWf2ti6UemvObn80B', '2017-07-26 08:51:54', '2017-07-26 08:51:54'),
(38347, 24734464, '1e82ai2pxWBcM3lFF7vceVB2A47CVzzP', '2017-07-26 08:51:58', '2017-07-26 08:51:58'),
(38348, 24734464, 'q9PzmkZbenTmQAFoimj7qVQ6DqJwZG2y', '2017-07-26 08:52:03', '2017-07-26 08:52:03'),
(38349, 24734464, 'mmJfu7e8aFTg6PInt6mYa9tvA9esxX9x', '2017-07-26 08:52:52', '2017-07-26 08:52:52'),
(38350, 24734464, '21q1a3kTQ4bMiyysEgTeMx0as9MOTnbd', '2017-07-26 08:52:59', '2017-07-26 08:52:59'),
(38351, 24734464, '4icIyqkQkN0c7bPvd13On61CD7TC2HYi', '2017-07-26 08:58:22', '2017-07-26 08:58:22'),
(38352, 24734464, 'ShzjjfErhQ3lpOcLRDt5bOdzFwztHM3R', '2017-07-26 08:59:15', '2017-07-26 08:59:15'),
(38353, 24734464, 'ezm6zeT7Eq5AoaTYb4yDeqERlIcGSI1E', '2017-07-26 08:59:16', '2017-07-26 08:59:16'),
(38354, 24734464, 'oiADKCyhuZ5p3pIHIn7bX81mChbWrX1o', '2017-07-26 08:59:20', '2017-07-26 08:59:20'),
(38355, 24734464, 'XtTzFcpHDJCcgV1wQwYL929qCMi9OkZT', '2017-07-26 08:59:30', '2017-07-26 08:59:30'),
(38356, 24734464, 'IZNJseoNAnbfuv0bX7q6sM6iXrpBOJzM', '2017-07-26 08:59:35', '2017-07-26 08:59:35'),
(38357, 24734464, 'CG68Y4sqVqWf35TyIIRluNJMFpatThYp', '2017-07-26 08:59:38', '2017-07-26 08:59:38'),
(38358, 24734464, 'RbnUgdd56AuF2IqTrMzMfCyNYIoOn2La', '2017-07-26 08:59:41', '2017-07-26 08:59:41'),
(38359, 24734464, 'PKyRwSZTEwjUr5hPGVChtdyW6FykjqSV', '2017-07-26 08:59:44', '2017-07-26 08:59:44'),
(38360, 24734464, 'izy4yXGawkdkvIUDEK4oyBQLfJKXlZVZ', '2017-07-26 08:59:48', '2017-07-26 08:59:48'),
(38361, 24734464, 'Oadf1DDg4bGLqsQ6CUWKAEZOG968qbdJ', '2017-07-26 08:59:50', '2017-07-26 08:59:50'),
(38362, 24734464, 'I7Fr03hczpZBW65bn5bqcWpKqlsE1IlY', '2017-07-26 08:59:53', '2017-07-26 08:59:53'),
(38363, 24734464, 'qK3zuvH6ZR3dTdDFBggsbaSWAhPUHQwV', '2017-07-26 08:59:56', '2017-07-26 08:59:56'),
(38364, 24734464, 'FCFK0wn5eBM6hEhmKSYuIKX0Hgp2Mdna', '2017-07-26 08:59:59', '2017-07-26 08:59:59'),
(38365, 24734464, '1xW5HNkxzLuFvbb6t5tBkWtNBHDgCzbG', '2017-07-26 09:00:03', '2017-07-26 09:00:03'),
(38366, 24734464, 'UrsFGnW4mZ4xizw5RwG5Z2jbg7LkRDF6', '2017-07-26 09:01:38', '2017-07-26 09:01:38'),
(38367, 24734464, 'uvLxHFKRbZCuYdJyhpDtHZuoPjMIdOhn', '2017-07-26 09:01:43', '2017-07-26 09:01:43'),
(38368, 24734464, 'BM4Yf384FIO1i0Ltaya7i5B67N1PkmxQ', '2017-07-26 09:01:47', '2017-07-26 09:01:47'),
(38369, 24734464, 'T2FOoMvtTRnMSc73lFOHjYWmNGKfdtpJ', '2017-07-26 09:03:11', '2017-07-26 09:03:11'),
(38370, 24734464, 'ydOCUZE6rBEgH7CIHn3BtrnPlAekr09I', '2017-07-26 09:03:12', '2017-07-26 09:03:12'),
(38371, 24734464, 'qnmhbGTvfBo8qyPDfIw5ivPPSW9fwqH2', '2017-07-26 09:03:15', '2017-07-26 09:03:15'),
(38372, 24734464, 'SwFsXMiWJVA9nN190hTyyaIDc1FzAj7V', '2017-07-26 09:05:01', '2017-07-26 09:05:01'),
(38373, 24734464, '2sHBgFMojS8Fm4NlCqfVOvbvbKOdYCTh', '2017-07-26 09:05:03', '2017-07-26 09:05:03'),
(38374, 24734464, 'xro0kLGoz57UuR3tG1OiveWLGqNzQcik', '2017-07-26 09:05:04', '2017-07-26 09:05:04'),
(38375, 24734464, 'ouu9yO50rlE9Tpfm4KNztOIblb4Z2lrc', '2017-07-26 09:05:05', '2017-07-26 09:05:05'),
(38376, 24734464, 'GGWIx7gzaXNFdZYuKi1Dyx856rrjB0eh', '2017-07-26 09:05:27', '2017-07-26 09:05:27'),
(38377, 24734464, '2nQ3ID8vIRPaW3TbG3FZpu3kNYfEMLSI', '2017-07-26 09:05:54', '2017-07-26 09:05:54'),
(38378, 24734464, '7ksszAtBp4V5ujKsF8vgBkD3CPLQWeo3', '2017-07-26 09:05:55', '2017-07-26 09:05:55'),
(38379, 24734464, 'UNE8rh6pX9DNDxV11iJnPxp6ZL2fWIyM', '2017-07-26 09:08:26', '2017-07-26 09:08:26'),
(38380, 24734464, '9bqQCuzg8dupVPayvB3tdt0CKDaVQKrD', '2017-07-26 09:08:29', '2017-07-26 09:08:29'),
(38381, 24734464, 'uHpgYwig6oY4xZuhKWM6YmhhnxfGShX7', '2017-07-26 09:08:31', '2017-07-26 09:08:31'),
(38382, 24734464, 'miCpBiz4AJICrgdaGMxvMC7GVXgXu9XM', '2017-07-26 09:08:32', '2017-07-26 09:08:32'),
(38383, 24734464, '59EilitJE07BCa20DxFWPmWwLz0qIFB5', '2017-07-26 09:08:56', '2017-07-26 09:08:56'),
(38384, 24734464, 'TWMAtwgGyYn2a6BgxbrzYYOPwiLnHx02', '2017-07-26 09:08:57', '2017-07-26 09:08:57'),
(38385, 24734464, 'YnomMDWh5XcJdXKTdwGFjDahZdSKcPIQ', '2017-07-26 09:09:23', '2017-07-26 09:09:23'),
(38386, 24734464, 'dsC2utuLPgOFiUIqC8kx5GKDZGOkx1Tn', '2017-07-26 09:11:01', '2017-07-26 09:11:01'),
(38387, 24734464, 'YXZFh1DRoDWifNGBbkKfmjcxnFs1WC59', '2017-07-26 09:11:03', '2017-07-26 09:11:03'),
(38388, 24734464, 'XeCI6weBaa0c7IAcYMfnoqVg3LKBanlX', '2017-07-26 09:11:04', '2017-07-26 09:11:04'),
(38389, 24734464, '9C1GrQ7vNp8gDBLbBhvpMrRNmOZV45PV', '2017-07-26 09:14:02', '2017-07-26 09:14:02'),
(38390, 24734464, 'Knwyoesaly1dDOauvxnxkPQrR2Y16c7I', '2017-07-26 09:14:31', '2017-07-26 09:14:31'),
(38391, 24734464, '3fPQNlhP1LPaH8j7sfTBIssn7xYU1SSC', '2017-07-26 09:14:32', '2017-07-26 09:14:32'),
(38392, 24734464, 'THZfPZFcairRI05LFGhf3SROSVpNlwuJ', '2017-07-26 09:14:33', '2017-07-26 09:14:33'),
(38393, 24734464, 'cJiv4j2ltj7Ve0wpsvuuNiwBBYftWgjZ', '2017-07-26 09:14:41', '2017-07-26 09:14:41'),
(38394, 24734464, 'KIg7ch6CZfgXPs4RYWYW83ze4MaCTMSa', '2017-07-26 09:14:42', '2017-07-26 09:14:42'),
(38395, 24734464, 'pZ6kMZc3RRn8lscdMfsOZogHw8P7xFzm', '2017-07-26 09:15:15', '2017-07-26 09:15:15'),
(38396, 24734464, 'M6WksAl2gyPwYiRWqImoPGCkkwXfk8tN', '2017-07-26 09:15:34', '2017-07-26 09:15:34'),
(38397, 24734464, 'eEUXHG5KtXol8QIcHRPfUlm0re5thXa2', '2017-07-26 09:16:05', '2017-07-26 09:16:05'),
(38398, 24734464, 'T2lzuBAj9KZuQEo6nvkn9HhBKyNRQKep', '2017-07-26 09:16:06', '2017-07-26 09:16:06'),
(38399, 24734464, 'A1nExT3Fb3Ypx9mjsPJISc3w6yb2fIwI', '2017-07-26 09:17:03', '2017-07-26 09:17:03'),
(38400, 24734464, 'qiMQMpvlMFMPUfWVTkXB2PaY7VysUBWg', '2017-07-26 09:27:40', '2017-07-26 09:27:40'),
(38401, 24734464, 'sY65ag9kpQyMyrGsLFFb6YzsdRmGO9ja', '2017-07-26 09:27:42', '2017-07-26 09:27:42'),
(38402, 24734464, 'uxVn5V9VX4bXfc9qsjdxyjqv46PQNyWb', '2017-07-26 09:27:43', '2017-07-26 09:27:43'),
(38403, 24734464, '7Dp2xDXAkIE7NouzUjdhxznAZRxrDnHj', '2017-07-26 09:27:44', '2017-07-26 09:27:44'),
(38404, 24734464, 'L62WPX8E4y3jJwgMqIR66x2gZvpKlHGb', '2017-07-26 09:27:54', '2017-07-26 09:27:54'),
(38405, 24734464, 'zsMjZiFD3jtIugaY1CQcglRiyn1G4Pls', '2017-07-26 09:27:55', '2017-07-26 09:27:55'),
(38406, 24734464, 'mt7oWwOkTvgu8UT2CxdyTU4hzJ2LAQbJ', '2017-07-26 09:28:48', '2017-07-26 09:28:48'),
(38407, 24734464, 'VxnQNhctvWqZJgdbvL2gpv2ca4YgC672', '2017-07-26 09:28:50', '2017-07-26 09:28:50'),
(38408, 24734464, 'WBDtfZCNRYv3gFV5PxVBIXG6MlWmTajC', '2017-07-26 09:28:51', '2017-07-26 09:28:51'),
(38409, 24734464, 't4QOLccA4Z6es3XNiRF2J2UuHcNqfB3i', '2017-07-26 09:31:38', '2017-07-26 09:31:38'),
(38410, 24734464, '4qGhTuXiRZfzium8zOZO7vvNpSjKYnYQ', '2017-07-26 09:31:41', '2017-07-26 09:31:41'),
(38411, 24734464, 'h5OBcPGzl7at14PVvkz0IyUvddjMAaUa', '2017-07-26 09:31:42', '2017-07-26 09:31:42'),
(38412, 24734464, '0NkpM7Tmv8GtMeRn4dqrC8wnXOGEJ7pU', '2017-07-26 09:34:57', '2017-07-26 09:34:57'),
(38413, 24734464, 'dufFsZAdAhhQU8EXiLY8E0zaFRbJOmt7', '2017-07-26 09:35:02', '2017-07-26 09:35:02'),
(38414, 24734464, 'j94qFhiIsTWveZnqMCeegZ8ZKSPJq4Zo', '2017-07-26 09:35:04', '2017-07-26 09:35:04'),
(38415, 24734464, 'SHbZAi0bpR3ulkoLpiMVY2z54v45ijit', '2017-07-26 09:38:15', '2017-07-26 09:38:15'),
(38416, 24734464, 'HtnEf7yLjSPFxsvX8mo3qUPdRFi2N8UL', '2017-07-26 09:38:18', '2017-07-26 09:38:18'),
(38417, 24734464, 'p3eZjzdfBWOWJb0R1cQSf3eVZXNzCyQE', '2017-07-26 09:38:19', '2017-07-26 09:38:19'),
(38418, 24734464, 'VS4USip4KlGT6uFIM3gEPyzH3xFEli4J', '2017-07-26 09:42:15', '2017-07-26 09:42:15'),
(38419, 24734464, 'wO85a8I5Wmd3YV4MKf16njw5JJh1tPoH', '2017-07-26 09:42:22', '2017-07-26 09:42:22'),
(38420, 24734464, '5zmeWH16tURPhAN2wFLNtqcziLAZJz5a', '2017-07-26 09:42:23', '2017-07-26 09:42:23'),
(38421, 24734464, '7EL7VFSZwkZNDyvV9NgN7mGQbLAD5WJ1', '2017-07-26 09:56:23', '2017-07-26 09:56:23'),
(38422, 24734464, 'arc9TskiT2jtCU8CVlaQkF3FREAmYtVy', '2017-07-26 09:56:26', '2017-07-26 09:56:26'),
(38423, 24734464, 'jx2prNjTv6SiIyXCbTGIHbA9YeOlKhAG', '2017-07-26 09:56:27', '2017-07-26 09:56:27'),
(38424, 24734464, 'gBf9jM06FIqUqQeRj8VJcRtjtDjWHzVd', '2017-07-26 09:56:28', '2017-07-26 09:56:28'),
(38425, 24734464, 'vX920yCXnwsroTLWBK202Z5w0z477Jwf', '2017-07-26 09:56:34', '2017-07-26 09:56:34'),
(38426, 24734464, 'rW89yx5GnoEh5THcBZBX81lBRncqApVJ', '2017-07-26 09:56:36', '2017-07-26 09:56:36'),
(38427, 24734464, 'ApOKPvubzQ1Jc4POpey8YtVEs0PNPntZ', '2017-07-26 09:56:37', '2017-07-26 09:56:37'),
(38428, 24734446, 'Hfh43a522ZCbS9aAaETpvYsqJPzqxGle', '2017-07-26 11:13:28', '2017-07-26 11:13:28'),
(38429, 24734464, '0YKvLctNITgNCLeWoVqUT5XuwW9zNiL9', '2017-07-26 14:11:24', '2017-07-26 14:11:24'),
(38430, 24734464, 'OUgqr22tHdLY1Lzf3vszLrpi9T85d2wO', '2017-07-26 14:12:47', '2017-07-26 14:12:47'),
(38431, 24734464, '235E3sTKYsBhJsaZjPe3QgsXa769fY51', '2017-07-26 14:12:47', '2017-07-26 14:12:47'),
(38432, 24734464, 'lUUtBVrwuTZ0K99XRl0E5iFuytp3PGq4', '2017-07-26 14:12:48', '2017-07-26 14:12:48'),
(38433, 24734464, 'Vrxiav0gInREYVhAqBCqYxUIOebOmQIW', '2017-07-26 14:14:25', '2017-07-26 14:14:25'),
(38434, 24734464, 'hpOlWLJcChOa7Qe2guRTD8rgHeZYpHCp', '2017-07-26 14:14:27', '2017-07-26 14:14:27'),
(38435, 24734464, 'd9t1YNXpVp7B1OxJGj7ICTrV3gndjZIm', '2017-07-26 14:14:28', '2017-07-26 14:14:28'),
(38436, 24734464, 'SAhckGzhl7ir4HCdnICUfiDo2eykwHcU', '2017-07-26 14:14:57', '2017-07-26 14:14:57'),
(38437, 24734464, 'FPU8lMImXqMmAUj3R9rt4w8oss2Od8IV', '2017-07-26 14:14:58', '2017-07-26 14:14:58'),
(38438, 24734464, 'PUW7m7RqeBHUXoQkPaiJoOhP9c0AAF4M', '2017-07-26 14:16:03', '2017-07-26 14:16:03'),
(38439, 24734464, '5Gzbv9sbCZexy943cSKyMPSztFNwxftO', '2017-07-26 14:16:06', '2017-07-26 14:16:06'),
(38440, 24734464, 'kOp1DaNafYmqJvgysKizK8yM3CijEjjE', '2017-07-26 14:16:07', '2017-07-26 14:16:07'),
(38441, 24734464, 'RC3vNEV4sc8Sn1HpPxDcDoXGZWMGsQKI', '2017-07-26 14:16:33', '2017-07-26 14:16:33'),
(38442, 24734464, '2NVSjf6MoxT3YYd5lPVqyDhiLtjAImmU', '2017-07-26 14:16:36', '2017-07-26 14:16:36'),
(38443, 24734464, 'VLng3NGxmB3oQn3QSrKNy9kn9GEraNn3', '2017-07-26 14:16:37', '2017-07-26 14:16:37'),
(38444, 24734464, 'mxukvV11pxpvdpQ9LOXY5o7fTmCnPx3h', '2017-07-26 14:17:24', '2017-07-26 14:17:24'),
(38445, 24734464, 'WIF2r9nZQV1D0Mrn0ifl0CpoNgEKRatH', '2017-07-26 14:17:27', '2017-07-26 14:17:27'),
(38446, 24734464, '1Bw4XGtNrJtsdTr3mNAPGR6XexhjJu8C', '2017-07-26 14:17:28', '2017-07-26 14:17:28'),
(38447, 24734464, 'YTlrHJGr4jvINVZQz75Vbisixrxh8f2A', '2017-07-26 14:17:41', '2017-07-26 14:17:41'),
(38448, 24734464, 'hRD4vosxwWfV5ngNQgJ6CJTas3LEi13d', '2017-07-26 14:17:41', '2017-07-26 14:17:41'),
(38449, 24734464, 'LrxHfFXJTsDpiq5CJH7T6tRwCGFdD6tN', '2017-07-26 14:17:42', '2017-07-26 14:17:42'),
(38450, 24734464, '1fgjutO0feKuK3tJcUnC4SXZrEuvx2ns', '2017-07-26 14:17:45', '2017-07-26 14:17:45'),
(38451, 24734464, 'Jf1bGiwSlSp8eJbOLDjDUtSS5BCOwpSE', '2017-07-26 14:19:48', '2017-07-26 14:19:48'),
(38452, 24734464, 'EAdxJ2AJRTAXM60eIEcO9E6FUrUqhUmP', '2017-07-26 14:20:30', '2017-07-26 14:20:30'),
(38453, 24734464, 'JOzPlMoDoUOH1iDM7ZmloIpVvDnwznU9', '2017-07-26 14:20:31', '2017-07-26 14:20:31'),
(38454, 24734464, '4MYQ6ULjjmR71oB2OuAccUdO6EWltjw2', '2017-07-26 14:21:45', '2017-07-26 14:21:45'),
(38455, 24734464, 'imQsRZG0uOUOa6E0e9cZGWhbfvoI6dnK', '2017-07-26 14:21:48', '2017-07-26 14:21:48'),
(38456, 24734464, '5GX0voWwIJnhcId9HVfX5iL1XQnYIlPn', '2017-07-26 14:21:49', '2017-07-26 14:21:49'),
(38457, 24734464, 'I0XG4vhUCSB7DU874W4JsCnjADoQyXe9', '2017-07-26 14:21:50', '2017-07-26 14:21:50'),
(38458, 24734464, '76NlVYbt6kHzT8ADuORwCoosFj0OuT1c', '2017-07-26 14:27:03', '2017-07-26 14:27:03'),
(38459, 24734464, 'k75AKC8huhPv1o1AGsosGtNcc32DZNQy', '2017-07-26 14:31:05', '2017-07-26 14:31:05'),
(38460, 24734464, 'SlOLGucE6bgq5up8w62F7F4JCow9Xsr5', '2017-07-26 14:31:11', '2017-07-26 14:31:11'),
(38461, 24734464, 'oh9bsaa7HsrfjRxKKNpzCSp9CjCrLq5d', '2017-07-26 14:31:12', '2017-07-26 14:31:12'),
(38462, 24734464, 'M3kttItBMdrtIuyOuoqkb15WspCOnNsT', '2017-07-26 14:31:13', '2017-07-26 14:31:13'),
(38463, 24734464, 'BsfJmK3ckyjBfNamedHgleyk6uvWOYlG', '2017-07-26 14:31:44', '2017-07-26 14:31:44'),
(38464, 24734464, '2y302OTEENBE1lWRL8UBULVSZ4Qr0RZ1', '2017-07-26 14:31:46', '2017-07-26 14:31:46'),
(38465, 24734464, '0Y9x3t6tCyiwZQ4q9t0erwVFm8FDvuPZ', '2017-07-26 14:31:47', '2017-07-26 14:31:47'),
(38466, 24734464, 'K1wdCbGLTfEMisNSGkgaxb4peac5nMHH', '2017-07-26 14:32:01', '2017-07-26 14:32:01'),
(38467, 24734464, 'shQ2qrfKGyKjwPIbYWN6ammY7qulwa5g', '2017-07-26 14:32:02', '2017-07-26 14:32:02'),
(38468, 24734464, 'vFvMv3XM6Cb8m42HlZmtiuZpVpZ7QWPi', '2017-07-26 14:32:12', '2017-07-26 14:32:12'),
(38469, 24734464, 'tV3tVlhU6YGK6dnaLFgVOcCqhC1Do9dM', '2017-07-26 14:32:13', '2017-07-26 14:32:13'),
(38470, 24734464, 'uk3QS0uc72dUjzi8v0uDZFhUVxYPxO0I', '2017-07-26 14:32:14', '2017-07-26 14:32:14'),
(38471, 24734464, 'pJBUKHdyYLAiwJG94io9Ly5O3h5ev4qD', '2017-07-26 14:32:34', '2017-07-26 14:32:34'),
(38472, 24734464, '41eNtvatVmk0BjgCE5vL499zZSJetKza', '2017-07-26 14:32:36', '2017-07-26 14:32:36'),
(38473, 24734464, 'XEXWqmjDQsg8g2vGQiLJ9KbW89SRqu1i', '2017-07-26 14:32:37', '2017-07-26 14:32:37'),
(38474, 24734464, 'opkinDBayN8lQI6InlANVxDduRfOkSG4', '2017-07-26 14:40:05', '2017-07-26 14:40:05'),
(38475, 24734464, 'yg174FTwXaZ821KiNGTB4dwFjTfcfqEY', '2017-07-26 14:40:06', '2017-07-26 14:40:06'),
(38476, 24734464, 'oK67FR8HMtbkU5st8S0pvBb2QQWcYavJ', '2017-07-26 14:40:07', '2017-07-26 14:40:07'),
(38477, 24734464, 'bfHvzvbJHjmvBGeyomNYvcQAU0hgZM8s', '2017-07-26 14:40:53', '2017-07-26 14:40:53'),
(38478, 24734464, '8v4NWObwyKZauLohf9fmxVM3qA2u9WDq', '2017-07-26 14:40:55', '2017-07-26 14:40:55'),
(38479, 24734464, 'TGI4ufksUw26ClqyfNhY5iX26CbyIml8', '2017-07-26 14:40:56', '2017-07-26 14:40:56'),
(38480, 24734464, '8wTnjQ8IJWHFf1A7R3nwYn1Xd7L2hJUj', '2017-07-26 14:41:23', '2017-07-26 14:41:23'),
(38481, 24734464, 'BJW8m9J7P5JcWCkHxKTg9COnF61eX3v3', '2017-07-26 14:41:24', '2017-07-26 14:41:24'),
(38482, 24734464, 'zxFrkKYCjfDx63EjLeArxtsimGu8jTBQ', '2017-07-26 14:41:25', '2017-07-26 14:41:25'),
(38483, 24734464, 'tGfSSCMFF9lR1Y0dWxhf7ax68D8zaeFT', '2017-07-26 15:08:06', '2017-07-26 15:08:06'),
(38484, 24734464, 'S4Rh7dlBOfT4f7rMOd5yZwfZ9gLvpqx6', '2017-07-26 15:08:10', '2017-07-26 15:08:10'),
(38485, 24734464, '6fRVWzHpoOQ95yz9RRHEkeLuyYrRJTO8', '2017-07-26 15:08:10', '2017-07-26 15:08:10'),
(38486, 24734464, 'GlTNyrQ6WSoyVCxY11cPTSdYOwHdpJL3', '2017-07-26 15:08:11', '2017-07-26 15:08:11'),
(38487, 24734464, 'AGpFZhjgmU2htRMY4lE8VrTcGE2PodjA', '2017-07-26 15:08:21', '2017-07-26 15:08:21'),
(38488, 24734464, 'c802xofdv42AygOzSF4AZD0Ixiu92aRy', '2017-07-26 15:08:25', '2017-07-26 15:08:25'),
(38489, 24734464, 'DjHICidApWKX9DpdjL7jQEMMvBV8DIWB', '2017-07-26 15:08:26', '2017-07-26 15:08:26'),
(38490, 24734464, 'ECxcnLA747srMHDDi7SFLC4WYJVnupHx', '2017-07-26 15:08:27', '2017-07-26 15:08:27'),
(38491, 24734464, '62N8VZvw4omvtNzwtH5RIzEKh3mpW7Yy', '2017-07-26 15:08:49', '2017-07-26 15:08:49'),
(38492, 24734464, 'qrtlg4fIUSibSqHN07FVg2hGXGHOOaSs', '2017-07-26 15:08:51', '2017-07-26 15:08:51'),
(38493, 24734464, 'ejBVihgrwd4D4mHAkynnrUH4iXzAXkah', '2017-07-26 15:08:52', '2017-07-26 15:08:52'),
(38494, 24734464, 'urQo7NxjYsNGT30TvBJ2nutpVKWq5jQi', '2017-07-26 15:09:01', '2017-07-26 15:09:01'),
(38495, 24734464, 'GKqC6KZBw4yV6s6jKeoj8IO3TvCiS0qm', '2017-07-26 15:09:02', '2017-07-26 15:09:02'),
(38496, 24734446, 'XvHXjX0QExSTzDKPILUZ7Tp7JgYsXsH4', '2017-07-26 15:50:18', '2017-07-26 15:50:18'),
(38497, 24734463, 'SZW3nCnhxBITJNrnV5stU5BYdA7cSDRi', '2017-07-26 15:50:27', '2017-07-26 15:50:27'),
(38498, 24734463, 'PZpVd2o2NQjZEgdaBZDgwCSSbUic9uQN', '2017-07-26 16:06:59', '2017-07-26 16:06:59'),
(38499, 24734463, 'yMFA9ecNcWsn0Uf6rF5AjQAY7mq4UpoN', '2017-07-26 16:07:01', '2017-07-26 16:07:01'),
(38500, 24734463, 'q4ZatTHNHbWPYkvFsKFIVl4ZAXUNbJPy', '2017-07-26 16:07:03', '2017-07-26 16:07:03'),
(38501, 24734463, 'LK0cpQAFFjKM8qlzegcPNTSU0BeBs3HF', '2017-07-26 16:07:05', '2017-07-26 16:07:05'),
(38502, 24734463, 'cjlyZOX0dqMF0LqeDR2i8BX9mJvPZ8dG', '2017-07-26 16:07:11', '2017-07-26 16:07:11'),
(38503, 24734465, 'vsoP6iNhZTG60ikUYafEZlnXAyLwuH0U', '2017-07-26 16:07:44', '2017-07-26 16:07:44'),
(38504, 24734463, 'RDbvqkbWyvqUInLWKpkrmnM9odwRw8k1', '2017-07-26 16:07:57', '2017-07-26 16:07:57'),
(38505, 24734465, 'LpZj1GCmMMJm0BRS2pTrASo6gUasHEQJ', '2017-07-26 16:17:05', '2017-07-26 16:17:05'),
(38506, 24734464, '0XjvgvwQPOtluR36gS9q1dyyJNVLBMvT', '2017-07-26 16:21:12', '2017-07-26 16:21:12'),
(38507, 24734464, 'aETgFqmsMgqX1u4ZYjFHQRsfR5xkdXUN', '2017-07-26 16:21:24', '2017-07-26 16:21:24'),
(38508, 24734464, 'dtar4X3kzQIX71FST6ENrzrnNddIOO40', '2017-07-26 16:21:25', '2017-07-26 16:21:25'),
(38509, 24734464, 'k53vTzfXTflw8wvQXPIdAaNeZusVzKfO', '2017-07-26 16:21:48', '2017-07-26 16:21:48'),
(38510, 24734464, 'a9gXPYw45d1YrJe3JQSoOFQylQ3pK5ph', '2017-07-26 16:21:49', '2017-07-26 16:21:49'),
(38511, 24734464, 'eHhwxf6gHDQvvg7Jt8Hlrj4NxPETfI5Z', '2017-07-26 16:22:10', '2017-07-26 16:22:10'),
(38512, 24734464, 'fvw8ntNZDF8zOdiLiDovMaQWVPeGBS4c', '2017-07-26 16:22:18', '2017-07-26 16:22:18'),
(38513, 24734464, 'EUQJ8e1FM9LVMTeAAkgzGYsBNjYq7BQD', '2017-07-26 16:22:22', '2017-07-26 16:22:22'),
(38514, 24734464, 'pd1KdDksmKpL0Jf6I8cFkMrwapQ1iZp4', '2017-07-26 16:22:23', '2017-07-26 16:22:23'),
(38515, 24734464, 'auAnIUNn1BGTI6STcLlkIkBMnUOmUPKh', '2017-07-26 16:22:42', '2017-07-26 16:22:42'),
(38516, 24734464, 'afry3n1hUNbcuToJIU0eUMorthJAnhim', '2017-07-26 16:22:43', '2017-07-26 16:22:43'),
(38517, 24734464, 'ImpsOsOA995Fhq1u3F0txf6G1KrVWimA', '2017-07-26 16:22:44', '2017-07-26 16:22:44'),
(38518, 24734464, '8ssMRVqVaPRxKyPhc0lS3TuB6J7MS5fE', '2017-07-26 16:22:54', '2017-07-26 16:22:54'),
(38519, 24734464, 'gaVBLtbEVCUUiviKn4Pe8TI1pKGKThUO', '2017-07-26 16:22:59', '2017-07-26 16:22:59'),
(38520, 24734464, 'sSLlKVLn1cDmEv2vmVhHgmxt4bTomEod', '2017-07-26 16:23:00', '2017-07-26 16:23:00'),
(38521, 24734464, 'n6eYHvpH38KACB3JFjWkSLGGWX5u69Yq', '2017-07-26 16:23:03', '2017-07-26 16:23:03'),
(38522, 24734464, '6Pp2LHEW4noRnI3zgUou5YvWY0YG7LR0', '2017-07-26 16:23:04', '2017-07-26 16:23:04'),
(38523, 24734464, 'U5bVpERwsPuNNS8sKUucPfuXv1KSdoWI', '2017-07-26 16:23:05', '2017-07-26 16:23:05');
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(38524, 24734464, 'sB6YfgCTnlg0Oa97xSV6gonMSjL4PK9o', '2017-07-26 16:23:45', '2017-07-26 16:23:45'),
(38525, 24734464, 'UuUI9ehkkHZVXl0qDHsKH6Ycv5ptfCNd', '2017-07-26 16:23:47', '2017-07-26 16:23:47'),
(38526, 24734464, 'HIMGXskMm783sk9hs7P6MxBgX9L8b6et', '2017-07-26 16:23:49', '2017-07-26 16:23:49'),
(38527, 24734464, 'BYUgv3NeO4A0QOCJX8ZrTRgzJv1vQihr', '2017-07-26 16:23:50', '2017-07-26 16:23:50'),
(38528, 24734464, '7RK9hIdicmPyPY7Vj0XjSbJpnSq71Ydn', '2017-07-26 16:23:54', '2017-07-26 16:23:54'),
(38529, 24734465, 'vCrHdfCPOM3ga42AxOMzNDN1rOep8WgG', '2017-07-26 16:24:23', '2017-07-26 16:24:23'),
(38530, 24734465, 'gzKh9tLVgduOq2rt2PX8UQVmDTrKZ4hm', '2017-07-26 16:24:24', '2017-07-26 16:24:24'),
(38531, 24734465, '7M5N87pRiobdJPbHXge7kYSavvHcsENk', '2017-07-26 16:24:25', '2017-07-26 16:24:25'),
(38532, 24734465, 'yaoDuakLiD0RWDtDrOZGZRJrfpmplLXy', '2017-07-26 16:25:59', '2017-07-26 16:25:59'),
(38533, 24734465, 'ySNUxsWqzDhKhtygKjouU8zKMsUUEG3U', '2017-07-26 16:26:03', '2017-07-26 16:26:03'),
(38534, 24734465, 'bPHUcifk3lg9e2ECyI6oMnnvQ5kzqSsh', '2017-07-26 16:26:04', '2017-07-26 16:26:04'),
(38535, 24734446, 'kS4WvCDVWOoGKcj1S5jHfO3WxnpqgOg9', '2017-07-26 17:07:02', '2017-07-26 17:07:02'),
(38536, 24734446, 'bhbm1O3HP0K8Aldm4KgEObnZApw33FM6', '2017-07-26 18:22:38', '2017-07-26 18:22:38'),
(38538, 24734465, 'YzkVG3C2QuwXYXAjOM3exMayWxrtc3ED', '2017-07-26 20:46:24', '2017-07-26 20:46:24'),
(38539, 24734465, 'JQLt561075cDnQ1p6H745wXv0CLCUA4z', '2017-07-26 20:46:29', '2017-07-26 20:46:29'),
(38540, 24734465, 'IAN0gyugtBsHqqjrGL1d5YImdvUHGB2p', '2017-07-26 20:46:33', '2017-07-26 20:46:33'),
(38541, 24734465, 'XquXcoDFgnMciSvXtcO3WeaeMZSWqLw1', '2017-07-26 20:46:34', '2017-07-26 20:46:34'),
(38542, 24734465, 'v5RtYTU7jki4nc02CwqKsyAAYvDFVPl7', '2017-07-26 20:47:20', '2017-07-26 20:47:20'),
(38543, 24734465, 'teW4YJ9bWPiEU4ZcjPBNezLsG1JI4Cmi', '2017-07-26 20:47:24', '2017-07-26 20:47:24'),
(38544, 24734465, 'F0ADRrETs89mvJz48ndEXQnVG60VDJ0Q', '2017-07-26 20:47:25', '2017-07-26 20:47:25'),
(38545, 24734465, 'G2s6CeY6VGx3yRqKgdpxTKuASFnJHJJg', '2017-07-26 20:47:40', '2017-07-26 20:47:40'),
(38546, 24734465, 'GZhByRDZBJzRP0hBT7XXgyd1R5Yb47Pg', '2017-07-26 20:48:04', '2017-07-26 20:48:04'),
(38547, 24734465, 'xG6Qpy6xXTbpNInDwd8w3bYpYJrxXDuY', '2017-07-26 20:48:10', '2017-07-26 20:48:10'),
(38548, 24734463, 'Fx6AEUThjwXx07eS7eMds8Zek6mztm0O', '2017-07-26 20:51:10', '2017-07-26 20:51:10'),
(38549, 24734465, '3sf0IDnaEc6jw0jJnB0QgTx6tiTHa3Yc', '2017-07-26 20:52:28', '2017-07-26 20:52:28'),
(38550, 24734465, 'diqorFx7rU2lsYY5ZJiZRrNw36kAWmex', '2017-07-26 20:52:29', '2017-07-26 20:52:29'),
(38551, 24734465, 'y2Ts1CQdPPFOzSBYWxs4inOFyXtD3dDR', '2017-07-26 20:52:30', '2017-07-26 20:52:30'),
(38552, 24734465, 'GqRfIlebU6lUf2Z6xKZftpToqW1KkNnW', '2017-07-26 20:52:57', '2017-07-26 20:52:57'),
(38553, 24734465, 'zXcVdVlCRaUEfxEvk0kWcIhP6oMLwzvj', '2017-07-26 20:53:03', '2017-07-26 20:53:03'),
(38554, 24734465, '5BVvxi1XtL4B9Ozc0IvseTFj5FczBEBU', '2017-07-26 20:53:04', '2017-07-26 20:53:04'),
(38555, 24734465, 'APH1UPugpxAHoKoCFvD6enw6Pfrp1epF', '2017-07-26 20:54:57', '2017-07-26 20:54:57'),
(38556, 24734465, 'JOkXMBpJivUhYMGtcDEnaWQsYUr4Ymte', '2017-07-26 20:55:09', '2017-07-26 20:55:09'),
(38557, 24734465, 'hSz1dbMBiKWLtoVb51COgMKmi46qYqOb', '2017-07-26 20:55:10', '2017-07-26 20:55:10'),
(38558, 24734465, '2YfLt5YPeyvLuqSyuwblNlWcjWmweLbq', '2017-07-26 20:55:11', '2017-07-26 20:55:11'),
(38559, 24734465, 'At8gYABSNdB8jqNLuexeWlLJAxN01iIq', '2017-07-26 20:55:43', '2017-07-26 20:55:43'),
(38560, 24734465, 'VZErLvMnoIPFv4XDI4qXsctxTQZp9dmg', '2017-07-26 20:55:59', '2017-07-26 20:55:59'),
(38561, 24734465, 'FQOkGy7jPJpFeSfu79DiRtEVW6f0NUO0', '2017-07-26 20:56:15', '2017-07-26 20:56:15'),
(38562, 24734465, 'qZ8WKUJGhZjkY5DAbd2pyDR6srgl6MOY', '2017-07-26 21:02:09', '2017-07-26 21:02:09'),
(38563, 24734465, 'gcPqjsVD9VFbHEWgNPXJgY6SXIDeU5dt', '2017-07-26 21:02:30', '2017-07-26 21:02:30'),
(38564, 24734465, 'RkTy0HyU9qqvoYVL1l0tYL2WLxH4YUII', '2017-07-26 21:02:31', '2017-07-26 21:02:31'),
(38565, 24734465, 'pn9dfN2cItrifRcN324rzS0Df6GPN8Ot', '2017-07-26 21:02:34', '2017-07-26 21:02:34'),
(38566, 24734465, 'SN592HREgSNGuWDZv1RCFFGLB6gpKu1y', '2017-07-26 21:02:46', '2017-07-26 21:02:46'),
(38567, 24734465, 'tJxNunAZLP8t6KLUKvv6WCpdZdOq8mC6', '2017-07-26 21:02:51', '2017-07-26 21:02:51'),
(38568, 24734465, '91V7aaHQQxZcczyXZZSSRednNLEIS35J', '2017-07-26 21:04:31', '2017-07-26 21:04:31'),
(38569, 24734465, 'jeieYp25vDPv6wXmRCD5lKUxsOhh07EP', '2017-07-26 21:05:14', '2017-07-26 21:05:14'),
(38570, 24734465, '1Ky3S3HgSHQTPPbdTCJpNh25LQ3W7bfP', '2017-07-26 21:05:15', '2017-07-26 21:05:15'),
(38571, 24734465, 'VFxE1bg49p9fZcFvnMp5czC2nz7PZoRP', '2017-07-26 21:05:16', '2017-07-26 21:05:16'),
(38572, 24734465, 'hU45AKI8PqOZcqOPrpZRpjLJqbiVMfuw', '2017-07-26 21:05:25', '2017-07-26 21:05:25'),
(38573, 24734465, 'YoC31wViAFNzhhI2d1i4Tibkfab5RwhQ', '2017-07-26 21:05:26', '2017-07-26 21:05:26'),
(38574, 24734465, 'im8c60FcjyNRg9lQvJuX9uucv3EYKigi', '2017-07-26 21:05:32', '2017-07-26 21:05:32'),
(38575, 24734465, 'PHxaamufRWrGN6aFHR0XJNEzEMzqUMLH', '2017-07-26 21:05:33', '2017-07-26 21:05:33'),
(38576, 24734465, '0d30ENkyRtygjYuTpRt7YcrconiQbGJc', '2017-07-26 21:05:34', '2017-07-26 21:05:34'),
(38577, 24734465, 's77kXdDWUqWVozAC3nH0gQ3hkigDLujj', '2017-07-26 21:05:52', '2017-07-26 21:05:52'),
(38578, 24734465, 'nfPrU45UX513kXGSQHGUh7JREegZE1G3', '2017-07-26 21:10:09', '2017-07-26 21:10:09'),
(38579, 24734465, '7l6jW3EJcYHMWiL4l5uUioJ7JEtuE6F9', '2017-07-26 21:10:11', '2017-07-26 21:10:11'),
(38580, 24734465, 'X39SNyAYCfBVmm2GyPBl06Zr9ZRrCP1d', '2017-07-26 21:10:12', '2017-07-26 21:10:12'),
(38581, 24734465, 'AIgMLG21UokeJ7Ib1q4sr6W7URAK4Efc', '2017-07-26 21:10:13', '2017-07-26 21:10:13'),
(38582, 24734465, 'X7rxFRRBYgIdtKHlhL5QRMo91bdMhZFf', '2017-07-26 21:10:40', '2017-07-26 21:10:40'),
(38583, 24734465, 'aM6VgO8ujSWPHrUBiMz7XN4MYJYP2q3w', '2017-07-26 21:10:42', '2017-07-26 21:10:42'),
(38584, 24734465, 'Y32EJphzDqWkwuqX9wrDfyTdSLG2FPu1', '2017-07-26 21:10:43', '2017-07-26 21:10:43'),
(38585, 24734465, 'XRHBxNTMTV1CdCGfmq108Ty1xbo3dpkD', '2017-07-26 21:10:59', '2017-07-26 21:10:59'),
(38586, 24734465, '7Dp6tRR4FW2QJhdi9wJ9OZa9BJMTESwx', '2017-07-26 21:11:02', '2017-07-26 21:11:02'),
(38587, 24734465, 'es5s4qkCFBZCaJxb6KZbejGGKRObeOok', '2017-07-26 21:11:03', '2017-07-26 21:11:03'),
(38588, 24734465, 'x8ESd4kgQ4yDdvtA3GX30cbVzdJGawbQ', '2017-07-26 21:11:11', '2017-07-26 21:11:11'),
(38589, 24734465, 'g7VUWf3eeLgqNr94rhVrF1r5rgLjOGeS', '2017-07-26 21:11:12', '2017-07-26 21:11:12'),
(38590, 24734465, 'Hiy98lLkPJLQfzmGodpXuLzrIkoIz6TB', '2017-07-26 21:13:32', '2017-07-26 21:13:32'),
(38591, 24734465, 'CJrBt0kjbGnmW3dg5azohEwp52EcmL7M', '2017-07-26 21:13:42', '2017-07-26 21:13:42'),
(38592, 24734465, 'ie7CFZTot6Ek5SPaazc0kz8I5sPwH8ck', '2017-07-26 21:13:43', '2017-07-26 21:13:43'),
(38593, 24734465, 'TYJ4pNeVwWav4dR5rLcNQApfwtdn1jx9', '2017-07-26 21:14:55', '2017-07-26 21:14:55'),
(38594, 24734465, '0yFkqeEDUvOD5AEDGCtcVv7x2y0ikqZt', '2017-07-26 21:14:57', '2017-07-26 21:14:57'),
(38595, 24734465, 'eiYwdvng23KkazmuMPcKVAHhg26afPKJ', '2017-07-26 21:14:58', '2017-07-26 21:14:58'),
(38596, 24734465, 'cOVjsAlvMVWH59JD8z5NtgKYMvSVFLKH', '2017-07-26 21:16:06', '2017-07-26 21:16:06'),
(38597, 24734465, 'dSTfGTaiTNP5wrBKKjPlMnUJALDynpbl', '2017-07-26 21:18:16', '2017-07-26 21:18:16'),
(38598, 24734465, 'CafPzJMG880VGWkkPa8NBgE84jplLcXd', '2017-07-26 21:18:39', '2017-07-26 21:18:39'),
(38599, 24734465, 'ZJLHVy7pG99bEGaWTuq5XBr0SpUPdsRQ', '2017-07-26 21:18:56', '2017-07-26 21:18:56'),
(38600, 24734465, '040c7cV3XJbzdTcqp8hxBRomADIMQtXx', '2017-07-26 21:19:04', '2017-07-26 21:19:04'),
(38601, 24734465, 'UTmW2apdPyBG6sch2msUCCCPgh00CEWW', '2017-07-26 21:19:11', '2017-07-26 21:19:11'),
(38602, 24734465, '4skE2teKckQvLgjiQwCkLOYsZ6Foedmm', '2017-07-26 21:19:22', '2017-07-26 21:19:22'),
(38603, 24734465, 'NaLNwKxQiWO2R2iII6XJGtPjlw6SY9qV', '2017-07-26 21:19:26', '2017-07-26 21:19:26'),
(38604, 24734465, 'Gfl4laoc3UCV8sozJPsnct09aSYor5if', '2017-07-26 21:19:32', '2017-07-26 21:19:32'),
(38605, 24734465, 'p8sV8mpcTeXJa3miL0xfenJSgw9PPPj1', '2017-07-26 21:20:17', '2017-07-26 21:20:17'),
(38606, 24734465, 'gfu7pGGLR7NeR4sgf8w8udE4ajF77uzN', '2017-07-26 21:20:20', '2017-07-26 21:20:20'),
(38607, 24734465, '7ooEXCB67qJn5FJUGPsBUmNkymmHj792', '2017-07-26 21:20:29', '2017-07-26 21:20:29'),
(38608, 24734465, '0eTFKx9gYqEeBpWBbYvdsAEtdjlJjE1t', '2017-07-26 21:20:32', '2017-07-26 21:20:32'),
(38609, 24734465, 'g4Y7QglMw4md7zeD9DVzhYzM9P138O0c', '2017-07-26 21:20:44', '2017-07-26 21:20:44'),
(38610, 24734465, 'h73y0JvCLIgZrIYQ61RfKdhEHhQnoQ97', '2017-07-26 21:20:49', '2017-07-26 21:20:49'),
(38611, 24734465, 'KHsgzrbpah2CT45EMffA3kk0wpU7anG1', '2017-07-26 21:20:53', '2017-07-26 21:20:53'),
(38612, 24734465, 'PELqomPXGkYZO4Yzy7tw91AI0WUXNFiW', '2017-07-26 21:21:19', '2017-07-26 21:21:19'),
(38613, 24734465, 'mlm4OJvJFLXDJb8WfPITFHeevrl6dvL5', '2017-07-26 21:21:22', '2017-07-26 21:21:22'),
(38614, 24734466, 'vMbZle8XN3q9pzsueRxI4TD6gbjuahS7', '2017-07-26 21:23:47', '2017-07-26 21:23:47'),
(38615, 24734466, 'rJpfaoinNvwYeu5O3D2vpYzPVUgbDo9v', '2017-07-26 21:24:06', '2017-07-26 21:24:06'),
(38616, 24734466, 'jZ0shUlgSksUci2k9yJqSJ4gd6JR9wIR', '2017-07-26 21:24:12', '2017-07-26 21:24:12'),
(38617, 24734466, 'tOI7qjREuGNdnS17QCoVx0B30YEt1RxF', '2017-07-26 21:25:01', '2017-07-26 21:25:01'),
(38618, 24734466, 'gESQ5vX3brYx0Up95ZXckAMjkjpRY2t8', '2017-07-26 21:25:10', '2017-07-26 21:25:10'),
(38619, 24734466, 'sU5iFHVwrcglfBfPYIUqud0dlpj8Tonk', '2017-07-26 21:25:56', '2017-07-26 21:25:56'),
(38620, 24734466, 'Co4VkJFYCPPPlhBTx6SaWKKODwnuaMu9', '2017-07-26 21:26:10', '2017-07-26 21:26:10'),
(38621, 24734466, 'yzyzEwEiIY9QSIrCWwdRvZyUUxLWXYxb', '2017-07-26 21:26:11', '2017-07-26 21:26:11'),
(38622, 24734466, '5yhIhfX16hX2hIgVuLRjwMGIqeNstKnm', '2017-07-26 21:26:48', '2017-07-26 21:26:48'),
(38623, 24734466, 'bFmhwRQHLViInN6SnqsLbplXyoc5EkXO', '2017-07-26 21:26:49', '2017-07-26 21:26:49'),
(38624, 24734466, 'qDSggothJaNNWpWAMS8TwNEP1zEYezo6', '2017-07-26 21:27:11', '2017-07-26 21:27:11'),
(38625, 24734466, 'eUTbDWnueMa9Fb2DdCBSKGCPhzfDV61S', '2017-07-26 21:28:14', '2017-07-26 21:28:14'),
(38626, 24734466, 'LqAzFnUGWVFcNOv5yJgRLDJCVpcikFJJ', '2017-07-26 21:28:24', '2017-07-26 21:28:24'),
(38627, 24734466, '8vfK6P3P6ttD8aiBtS2g5rAz8QV1UjbP', '2017-07-26 21:28:51', '2017-07-26 21:28:51'),
(38628, 24734466, 'VpGgm4sIPvZgivwGQO49Kcajo0PKsr1e', '2017-07-26 21:29:03', '2017-07-26 21:29:03'),
(38629, 24734466, 'GQIsUF1GozHgC2je7hlZYh5BTOPNKlJO', '2017-07-26 21:29:26', '2017-07-26 21:29:26'),
(38630, 24734466, 'nfsIShcBfHss33BvAv5neHYO6HfQKSvY', '2017-07-26 21:29:36', '2017-07-26 21:29:36'),
(38631, 24734466, '1m4tuOY5IzKAjPfZ6ZeRsVtvIYcDZf21', '2017-07-26 21:29:38', '2017-07-26 21:29:38'),
(38632, 24734466, 'vo93zyuc3CkcHaR74YB8p9PFrdH5XWoJ', '2017-07-26 21:29:40', '2017-07-26 21:29:40'),
(38633, 24734466, 'hCxErBRkYcRY7srdWotP7BZ0MIaRBTjJ', '2017-07-26 21:29:49', '2017-07-26 21:29:49'),
(38634, 24734466, '3qWqwGYHYEPiD4IFt9wLnVWX1u20xmTG', '2017-07-26 21:29:53', '2017-07-26 21:29:53'),
(38635, 24734466, 'A9QHNw7EapGwt7PTMzxrpDqoTu6VUoZZ', '2017-07-26 21:29:54', '2017-07-26 21:29:54'),
(38636, 24734466, 'JsMCoTIdhVL3D4vvmvksuBwewUQge1ZM', '2017-07-26 21:29:58', '2017-07-26 21:29:58'),
(38637, 24734466, 'e2lI6ra6A8p2JVF87swlBSPnAL7qLKtc', '2017-07-26 21:30:04', '2017-07-26 21:30:04'),
(38638, 24734465, 'DyY3usTXHK01cFAfK9bjUMx25biG3rrb', '2017-07-26 21:30:48', '2017-07-26 21:30:48'),
(38639, 24734465, 'lelW95WfBCoWxqFuhQ3t5gCTyF1KzgsW', '2017-07-26 21:30:50', '2017-07-26 21:30:50'),
(38640, 24734465, 'egmnYZ25LAE5dLsM5mYai0Tk7sdjErnj', '2017-07-26 21:30:54', '2017-07-26 21:30:54'),
(38641, 24734465, '111XWynmgnL1feSfCqGxy7i3NCPv30FF', '2017-07-26 21:30:55', '2017-07-26 21:30:55'),
(38642, 24734465, 'FV4ktOkeQn4tjq4X4oiHaG55o34ODvX0', '2017-07-26 21:31:15', '2017-07-26 21:31:15'),
(38643, 24734465, 'ccJQ3nW0DYFdQ0yUqtNacCBneTiyRKq0', '2017-07-26 21:31:16', '2017-07-26 21:31:16'),
(38644, 24734465, 'hz9sX0XaHgkl2u8O7NUVgxk5St8G8sPP', '2017-07-26 21:31:17', '2017-07-26 21:31:17'),
(38645, 24734465, 'Tq8NCnb0FBfUAJXXY7Cocx1GC8MyWsgw', '2017-07-26 21:31:22', '2017-07-26 21:31:22'),
(38646, 24734465, '7LEq0N50A8gVauTnaGAU3ShqFwMAQAyF', '2017-07-26 21:31:23', '2017-07-26 21:31:23'),
(38647, 24734465, '1NgPRfDQLzl2mSb5gC2xMEBOMOOMJLxi', '2017-07-26 21:31:26', '2017-07-26 21:31:26'),
(38648, 24734465, 'afc6hnvdOCEDOTtI4Zc4IwOBTDNaCcnQ', '2017-07-26 21:31:27', '2017-07-26 21:31:27'),
(38649, 24734465, 'O9929YGKrDbjKUiXl2dsZsAx3huxsTVf', '2017-07-26 21:31:32', '2017-07-26 21:31:32'),
(38650, 24734465, '3wHyHOgz5oB6lmbLsQMMeokbH2W1ArcO', '2017-07-26 21:31:33', '2017-07-26 21:31:33'),
(38651, 24734465, 'RJ4klg7IrdUT0Hyh6kV6y5oEIITPoov2', '2017-07-26 21:31:34', '2017-07-26 21:31:34'),
(38652, 24734465, 'MEcBR3ymp1sLEafAwfi0CPKnbcpopt0b', '2017-07-26 21:31:38', '2017-07-26 21:31:38'),
(38653, 24734465, 'l7i1QqBEIG38cNSwHwBAe8QJ4kTdpJQK', '2017-07-26 21:31:39', '2017-07-26 21:31:39'),
(38654, 24734465, 'S9UnOUUij9kLGdmvbOQaEiArPJm75MM1', '2017-07-26 21:31:42', '2017-07-26 21:31:42'),
(38655, 24734465, 'qD66MV5QJKNN4MzpFNhsWCaH2zk2UdsZ', '2017-07-26 21:31:43', '2017-07-26 21:31:43'),
(38656, 24734466, 'gMm70SKr04aE5oerwhdLkUlIdxNBecvt', '2017-07-26 21:32:08', '2017-07-26 21:32:08'),
(38657, 24734466, '9nfycshROaQpJMTNfGtVZXY77cBGf6pM', '2017-07-26 21:32:09', '2017-07-26 21:32:09'),
(38658, 24734466, 'hVHqj4LLYqo8IgRosntYhhfwrA5ov8hU', '2017-07-26 21:32:10', '2017-07-26 21:32:10'),
(38659, 24734466, 'oj9rDQFsrlDUQeNcslCLpa20QTZ2wwF7', '2017-07-26 21:32:11', '2017-07-26 21:32:11'),
(38660, 24734466, '8GSzWyj27lQCJpv6faHScGgwFUQG33X2', '2017-07-26 21:32:15', '2017-07-26 21:32:15'),
(38661, 24734466, '8XimtwN6AupwNescjOv3wZtcP3iqKx7t', '2017-07-26 21:32:16', '2017-07-26 21:32:16'),
(38662, 24734466, 'HzjqvR5Z2kK7EoZ0z60j2tqGiBShORRW', '2017-07-26 21:32:18', '2017-07-26 21:32:18'),
(38663, 24734466, 'MT0LMjfwGknsF7dQTfnXOMk1pwf6ofHV', '2017-07-26 21:32:19', '2017-07-26 21:32:19'),
(38664, 24734466, '54xNyW4yxuTRr7sFUIuJ6Ab7rC1Bustw', '2017-07-26 21:32:21', '2017-07-26 21:32:21'),
(38665, 24734466, '6au6b7RvZ9PZQX0322YMqS2UGWQkkcE9', '2017-07-26 21:32:25', '2017-07-26 21:32:25'),
(38666, 24734466, 'FR3BF3KZxfS4KsA4wRkhf4KEmXHtprCo', '2017-07-26 21:32:26', '2017-07-26 21:32:26'),
(38667, 24734466, 'MozcY8XgRAMClqmo1AQORzmgAMNkW0aw', '2017-07-26 21:32:28', '2017-07-26 21:32:28'),
(38668, 24734466, 'xkkeEzqYZ8ke27CoENxz3ou6baOW7Dnv', '2017-07-26 21:32:29', '2017-07-26 21:32:29'),
(38669, 24734466, 'JYThB1jUocFdVPzzMtDQTkVJCiH7lSvZ', '2017-07-26 21:32:30', '2017-07-26 21:32:30'),
(38670, 24734466, 'LlUKHDuP8e7oQxLcF1QZ04SxPZiq9HeF', '2017-07-26 21:32:34', '2017-07-26 21:32:34'),
(38671, 24734466, 'Vqi6uTqUqGVCKsNIFB6qTblsc8PrYPmG', '2017-07-26 21:32:35', '2017-07-26 21:32:35'),
(38672, 24734466, 'sed3Be25A3zyMairwyorLdwKQ5h0FoBR', '2017-07-26 21:32:36', '2017-07-26 21:32:36'),
(38673, 24734466, '4UwyYImXxLSv1erBwon4RchEgNoJxp1F', '2017-07-26 21:32:37', '2017-07-26 21:32:37'),
(38674, 24734466, 'wPISx7npn3w2UNdI0esqisgRqzM4Q9hl', '2017-07-26 21:32:38', '2017-07-26 21:32:38'),
(38675, 24734466, 'EtaELXdjkbAKNvEJIY7lCwEdoroWujTQ', '2017-07-26 21:32:42', '2017-07-26 21:32:42'),
(38676, 24734466, 'q0PqBp8GZ73EoEXz6WVIyPwcmTdqiFQF', '2017-07-26 21:32:43', '2017-07-26 21:32:43'),
(38677, 24734466, '37xNoU4v5KyOhTTMxctFU2v1VsRWOX2j', '2017-07-26 21:32:44', '2017-07-26 21:32:44'),
(38678, 24734466, '1K1NiOzU0rLMFDL8T9aVfNcrKQy6zpsW', '2017-07-26 21:32:45', '2017-07-26 21:32:45'),
(38679, 24734466, 'l7mf2rOQqt4zyRfiPlGQ3uE5cgvqgUZx', '2017-07-26 21:32:46', '2017-07-26 21:32:46'),
(38680, 24734466, 'QZgfOefQpsuUeS3Cd216hOWetgaWE3jK', '2017-07-26 21:32:50', '2017-07-26 21:32:50'),
(38681, 24734466, '7mfq5m7DD8wfhz2adtUnxsF3eQScShQt', '2017-07-26 21:32:51', '2017-07-26 21:32:51'),
(38682, 24734466, 'H1pEsscpLF9m1kwQb9Ff50dYVmoyVKAb', '2017-07-26 21:32:53', '2017-07-26 21:32:53'),
(38683, 24734466, '902c4Mg6g7RmCol9JRjlPtteNmRzriCX', '2017-07-26 21:32:54', '2017-07-26 21:32:54'),
(38684, 24734466, 'P2sv5SmIKygNtZgip8VyNRzqmpTNcpVo', '2017-07-26 21:33:13', '2017-07-26 21:33:13'),
(38685, 24734466, 'VrBWobJT1Xaeo0yYbTvDStXW2e5VWsVp', '2017-07-26 21:33:14', '2017-07-26 21:33:14'),
(38686, 24734466, 'FGgyrtIP12Pk4FiNZtzQmjAokt0z3HJV', '2017-07-26 21:33:15', '2017-07-26 21:33:15'),
(38687, 24734466, 'jIOm2Szj9iGfw9ODohUAHWUiJJPGTzlL', '2017-07-26 21:33:31', '2017-07-26 21:33:31'),
(38688, 24734466, 'taJmb2w5ekMboIMlkTouLSQAYQz4yQjA', '2017-07-26 21:53:00', '2017-07-26 21:53:00'),
(38689, 24734466, 'XTmwI22dosuifZXJ9IqgZMRvwNxo8Sqi', '2017-07-26 21:53:07', '2017-07-26 21:53:07'),
(38690, 24734466, 'jDM4q9d0wE6C1IlONd8cccv7b7oIy4OD', '2017-07-26 21:53:08', '2017-07-26 21:53:08'),
(38691, 24734466, 'iVWNNdvwJqlNVajy0nYzFizUfBaSmYbp', '2017-07-26 21:53:09', '2017-07-26 21:53:09'),
(38692, 24734466, 'ykdEDOECuIbZwzd0JVrTUIPq7tgzs3M0', '2017-07-26 21:55:04', '2017-07-26 21:55:04'),
(38693, 24734466, '8g7kdDaFwWL7Hx8KhmJkUT8Q8dIX7DKt', '2017-07-26 21:55:05', '2017-07-26 21:55:05'),
(38694, 24734466, 'Sfbikab4lC2bORjCK5Lmtivq5Yxxz79N', '2017-07-26 21:56:04', '2017-07-26 21:56:04'),
(38695, 24734466, 'XivYTD3QkEzTx3cebYkriJMNAI4SKsnu', '2017-07-26 21:56:05', '2017-07-26 21:56:05'),
(38696, 24734446, 'Suc92jFS28azLdfdToJmEt9ibAl7nOeo', '2017-07-26 22:45:41', '2017-07-26 22:45:41'),
(38697, 24734471, 'xpms5PynBwwZQd3sTnValFNc9nZUKFeN', '2017-07-26 23:07:20', '2017-07-26 23:07:20'),
(38698, 24734472, 'rVfNbaKzelGiJFPLhNLEvuXRZSVqgRkY', '2017-07-26 23:07:55', '2017-07-26 23:07:55'),
(38699, 24734472, 'zE7ZlPbIS8zSD3RU63KrmVyssj0yShT4', '2017-07-26 23:08:04', '2017-07-26 23:08:04'),
(38700, 24734472, 'iMYbyOdnbFRShUx7lO41PX2oKEifgMD9', '2017-07-26 23:08:15', '2017-07-26 23:08:15'),
(38701, 24734446, 'rqp1jVAG3A4G9silWR6YDxcNkQTk6hHb', '2017-07-26 23:08:32', '2017-07-26 23:08:32'),
(38702, 24734473, 'k8MNRzjKKnlyVVs3f2V4Oba7VtyogvAq', '2017-07-27 00:20:58', '2017-07-27 00:20:58'),
(38703, 24734473, 'eSNaRIBzVDHMnM77fTueOoJMnJlQNpyG', '2017-07-27 00:20:58', '2017-07-27 00:20:58'),
(38704, 24734473, '6T37dyQW2ZR2Xxpz6uHoQxLnuWS1SdKb', '2017-07-27 00:21:05', '2017-07-27 00:21:05'),
(38705, 24734473, 'cJFnRJO2YJVyTQhZzPGgQKfJQhbXxCAG', '2017-07-27 01:08:19', '2017-07-27 01:08:19'),
(38706, 24734473, 'BFX6OsRf2N0NQdJINKx69e10ghpCUoXM', '2017-07-27 01:08:24', '2017-07-27 01:08:24'),
(38707, 24734473, 'hzsaFcl584GSKuEFJ6Id0G6dymET3Tvi', '2017-07-27 01:08:33', '2017-07-27 01:08:33'),
(38708, 24734473, 'EBULp8Ybprmc3XntF89JPK8p8bJL9qxY', '2017-07-27 01:08:33', '2017-07-27 01:08:33'),
(38709, 24734473, 'bPVgJU1khCrXjWEZ8X7Ua3UOQLJc7bpj', '2017-07-27 01:08:38', '2017-07-27 01:08:38'),
(38710, 24734473, 'vw2b1qbUtMxWxocNKVcONaAUoCn6XV3B', '2017-07-27 01:08:38', '2017-07-27 01:08:38'),
(38711, 24734473, 'vr4rU7FAXdAAwlucshj6yZbhSSkPqTlD', '2017-07-27 04:16:02', '2017-07-27 04:16:02'),
(38712, 24734446, 'rZC5yCPVlO7SfHO0gL87eA2CQr4kRqVz', '2017-07-27 06:48:39', '2017-07-27 06:48:39'),
(38713, 24734473, 'PHV4191F2233BmPtPB5kGrytFOodKser', '2017-07-27 06:49:53', '2017-07-27 06:49:53'),
(38714, 24734473, 'xyaLZJOfBGqW67HVT4XKDiuapa7r0JhY', '2017-07-27 06:49:59', '2017-07-27 06:49:59'),
(38715, 24734473, 'JruFli8lhAePQ2sUqcZzFxNm6uZqjoel', '2017-07-27 06:50:01', '2017-07-27 06:50:01'),
(38716, 24734473, 'vs3v4C2Cc17MCV3OhzWItXlfiqhRHHrk', '2017-07-27 07:01:41', '2017-07-27 07:01:41'),
(38717, 24734473, 'HcB0QXESGxTezxLujEesb2SYI3rp0mYR', '2017-07-27 07:03:01', '2017-07-27 07:03:01'),
(38718, 24734473, 'k9PpdE9h46CzWsU9S3EXi4K5uA8PztDn', '2017-07-27 07:03:05', '2017-07-27 07:03:05'),
(38719, 24734473, '131MN2y34J8wlniFH5TLh8uSJmcf9LxP', '2017-07-27 07:03:06', '2017-07-27 07:03:06'),
(38720, 24734473, 'NSrPvwq1f06LdelZkV3B2cjMuzUXDAOM', '2017-07-27 07:03:07', '2017-07-27 07:03:07'),
(38721, 24734473, 'MJm4zfkA5cLQJcVjeqClzVW9Lw2dFiJ1', '2017-07-27 07:03:17', '2017-07-27 07:03:17'),
(38722, 24734473, 'lzBtuygKsFChOG6NjKSD53polcBlX916', '2017-07-27 07:03:18', '2017-07-27 07:03:18'),
(38723, 24734473, 'wIDM5uJ9PIHt5AkHcBeh5eMqEKfYXJAj', '2017-07-27 07:03:19', '2017-07-27 07:03:19'),
(38724, 24734473, 'yL3DBEqO0d0m58Pbin6MjX3vCAVx7v8O', '2017-07-27 07:03:20', '2017-07-27 07:03:20'),
(38725, 24734473, 'PD6SOejmObYQMkLTe2K17wpX0IvkAiuB', '2017-07-27 07:03:29', '2017-07-27 07:03:29'),
(38726, 24734473, 'AEr4hQqc8Q3wb41AAEgUtS7SIgfVGo5k', '2017-07-27 07:03:33', '2017-07-27 07:03:33'),
(38727, 24734473, 'w7nKhwbE7lO11jXNOWDLbWxINL5mtV5J', '2017-07-27 07:03:33', '2017-07-27 07:03:33'),
(38728, 24734473, 'C9z0jPenSrXgF3CNiX517go8U73X7g3j', '2017-07-27 07:03:35', '2017-07-27 07:03:35'),
(38729, 24734473, '9FiKhvyXQTw2Gnav0nYU1lLeO0CwRhBO', '2017-07-27 07:03:38', '2017-07-27 07:03:38'),
(38730, 24734473, 't3rf71Rw13GM6B6hHM1VBb6nFdNRSOaS', '2017-07-27 07:03:38', '2017-07-27 07:03:38'),
(38731, 24734473, 'kmLOlAYeUdWqkVLtC9aWOMej6MeASjWS', '2017-07-27 07:03:50', '2017-07-27 07:03:50'),
(38732, 24734473, 'onQncV5ugXez91uZ1REnCGCif9A7tiUk', '2017-07-27 07:03:53', '2017-07-27 07:03:53'),
(38733, 24734473, 'cOiKcFTfTzDe8SpJaptkZl2LpKH3Ij3y', '2017-07-27 07:03:53', '2017-07-27 07:03:53'),
(38734, 24734473, 'C3mar0U45bGjeMchRFfOKVvgIDRm1T1e', '2017-07-27 07:03:58', '2017-07-27 07:03:58'),
(38735, 24734473, 'l77DHYRNY234CWKWYSJOubUR9Zu3MWUN', '2017-07-27 07:03:59', '2017-07-27 07:03:59'),
(38736, 24734473, '8IX5lmxhnCtNWRR8GIOzyrCZBsNBq0wX', '2017-07-27 07:04:18', '2017-07-27 07:04:18'),
(38737, 24734473, 'icratX0djQF3etSE9LTYowhGJFsi2v2k', '2017-07-27 07:04:22', '2017-07-27 07:04:22'),
(38738, 24734473, 'VJ0T9SSTCxgrgHZEJiC4gtYgBFLyVNGF', '2017-07-27 07:04:24', '2017-07-27 07:04:24'),
(38739, 24734473, 'WBhda1PkrvlxvFbWx4q15OVUY6ujfyVF', '2017-07-27 07:04:24', '2017-07-27 07:04:24'),
(38740, 24734473, 'OlWgeOX4VvQAmQTF9vXFTFqUl0EG9uZp', '2017-07-27 07:04:43', '2017-07-27 07:04:43'),
(38741, 24734473, 'j9xAaXddFBBkIszkOSpYV949dP6ueyQp', '2017-07-27 07:04:44', '2017-07-27 07:04:44'),
(38742, 24734473, '3PmY9nEohcKSeyYR6r5QK11AeZmwkJAv', '2017-07-27 07:04:46', '2017-07-27 07:04:46'),
(38743, 24734473, 'DHe8A6ucvooW2ZtjLjUXQeq9G8H6MtFT', '2017-07-27 07:04:48', '2017-07-27 07:04:48'),
(38744, 24734473, 'ncQPJUoEfMwVZjifRho6ezW1MYd3wM3n', '2017-07-27 07:04:53', '2017-07-27 07:04:53'),
(38745, 24734473, 'qNTffwmUdEwhmVw8MBzKa2EVHr2LNNLD', '2017-07-27 07:04:54', '2017-07-27 07:04:54'),
(38746, 24734473, 'K5sxikHkps4GfqT8r1jnnWFCvaETr1Hq', '2017-07-27 07:04:57', '2017-07-27 07:04:57'),
(38747, 24734473, '5fFw2qJbazxxLxIZEB2N52hfWKctw4Et', '2017-07-27 07:05:07', '2017-07-27 07:05:07'),
(38748, 24734473, '4qV5tuU9S6d3eXnYYIKtKxV0RqSpMo7e', '2017-07-27 07:05:32', '2017-07-27 07:05:32'),
(38749, 24734473, '2bMpknp5uLmrUNtHCSYUR2m8U8bXvKOR', '2017-07-27 07:05:33', '2017-07-27 07:05:33'),
(38750, 24734473, 'ZVPyYBFRLRHObqPErsmY3a6nRHgdXC62', '2017-07-27 07:05:34', '2017-07-27 07:05:34'),
(38751, 24734473, 'dpW0kBwW0OdiCWAVD5Q8nFsHUZktX9F0', '2017-07-27 07:05:56', '2017-07-27 07:05:56'),
(38752, 24734473, 'aGmHrjxqQk1Tu7XmHQOlm7Bw6K8NJFlS', '2017-07-27 07:05:56', '2017-07-27 07:05:56'),
(38753, 24734473, 'EwBIv5ymXncNf9T4H8EpRdDADPolXM0J', '2017-07-27 07:06:07', '2017-07-27 07:06:07'),
(38754, 24734473, '2ALxINKvBLZ9886RwoV7yBxbEzq5PoFO', '2017-07-27 07:06:08', '2017-07-27 07:06:08'),
(38755, 24734473, '3k6VRoQAN9QdgIELwcGkFtJq2ieq4Cj8', '2017-07-27 07:06:10', '2017-07-27 07:06:10'),
(38756, 24734473, 'JiImRAFqWn7qHeepy8KMMiOZwNThR0sX', '2017-07-27 07:06:12', '2017-07-27 07:06:12'),
(38757, 24734473, 'kCUnlDDiJC4wbnisGoLalRcwDHgNBesA', '2017-07-27 07:06:13', '2017-07-27 07:06:13'),
(38758, 24734473, '5YLXvbCblvAc0G6nFcevH8z1EMBHnFtN', '2017-07-27 07:06:14', '2017-07-27 07:06:14'),
(38759, 24734473, '5xHaj3pM1Ab2OWbcS4bT06iEeME0x4rA', '2017-07-27 07:06:30', '2017-07-27 07:06:30'),
(38760, 24734473, 'yyQeYn5WqLqUTwnMjUkcTIddo4faR5am', '2017-07-27 07:06:34', '2017-07-27 07:06:34'),
(38761, 24734473, 'vssqNJqsHxBm1U9slOLbWclKm2ifWeok', '2017-07-27 07:06:35', '2017-07-27 07:06:35'),
(38762, 24734473, 'tGAR9xQcLv5TGUIVBKvbldnLsMAWebFj', '2017-07-27 07:06:56', '2017-07-27 07:06:56'),
(38763, 24734446, 'hGfGOwraVhhvD26VgzStrlNPv4eysYQ8', '2017-07-27 08:10:32', '2017-07-27 08:10:32'),
(38764, 24734472, 'gp41yFf793B8KY0GXWQyMNsjREtN5wVB', '2017-07-27 08:42:55', '2017-07-27 08:42:55'),
(38765, 24734472, 's8pT7iY3pRCmsMRgCjj84ihy5rXBJdTe', '2017-07-27 08:42:59', '2017-07-27 08:42:59'),
(38766, 24734472, 'oR01pNJayBnwLgbpE5xFUENrDtMZZ1kj', '2017-07-27 08:43:04', '2017-07-27 08:43:04'),
(38767, 24734472, 'yO5ahjgz3An5pYEpc3KWNKlUVhzmMn5x', '2017-07-27 08:43:05', '2017-07-27 08:43:05'),
(38768, 24734473, 'HV5xJMalrdYDUiyr3ZLU4YFoTtYZtYHv', '2017-07-27 09:08:38', '2017-07-27 09:08:38'),
(38769, 24734473, 'wlUMKPfiv7CzEXT3hVq3wPY4TZFsVLXG', '2017-07-27 09:08:42', '2017-07-27 09:08:42'),
(38770, 24734473, 'zQ3RkWCUZMjzhbkdqxIGvDx9fbtXaLa6', '2017-07-27 09:08:42', '2017-07-27 09:08:42'),
(38771, 24734474, 'cyhFasuTAihreEELp4YRpLgSpRssJucs', '2017-07-27 09:08:44', '2017-07-27 09:08:44'),
(38772, 24734474, 'aps1EpnyczesownGaWI80NptzIucC2D3', '2017-07-27 09:08:45', '2017-07-27 09:08:45'),
(38773, 24734474, 'SsIY0BMrsudcp9MMUczw51q7Fgs5602D', '2017-07-27 09:08:46', '2017-07-27 09:08:46'),
(38774, 24734474, 'woaJYLYPjDXIygrYwtUNadnr6rKV6gKN', '2017-07-27 09:08:47', '2017-07-27 09:08:47'),
(38775, 24734474, 'eseuiBbaGuBUgxaOXhWkz1wNilkFsulc', '2017-07-27 09:09:28', '2017-07-27 09:09:28'),
(38776, 24734474, 'HYeKz54iZ24cfv1fnee7565N7FQuzhVK', '2017-07-27 09:09:28', '2017-07-27 09:09:28'),
(38777, 24734474, '9F6NgfhqTErYlrtyA1bPxUn5s3UzTTix', '2017-07-27 09:11:07', '2017-07-27 09:11:07'),
(38778, 24734474, 'YDpOoRQioOzfEfGoH77WXy4qshnyzvwo', '2017-07-27 09:11:10', '2017-07-27 09:11:10'),
(38779, 24734474, 'Sr3GHagfSPaT5femzZTZ8uo1TWU0bcrX', '2017-07-27 09:13:09', '2017-07-27 09:13:09'),
(38780, 24734474, '8lUuD08DexUxBbia5ctxngBV1LYouMvM', '2017-07-27 09:13:51', '2017-07-27 09:13:51'),
(38781, 24734474, 'U2uULIfIxeCIDoKAj1BRZCUe6LdS6IeA', '2017-07-27 09:13:52', '2017-07-27 09:13:52'),
(38782, 24734474, 'vBczIJm4y5MqrmJBszZ9XaOf0z3ZAzsF', '2017-07-27 09:14:06', '2017-07-27 09:14:06'),
(38783, 24734474, '7oQ6hysbPt221VuqDTUXNvgn4G7QANyr', '2017-07-27 09:15:24', '2017-07-27 09:15:24'),
(38784, 24734474, 'YEvwt4UySBFfmWFnef3qYNs1Z3SftHRj', '2017-07-27 09:15:38', '2017-07-27 09:15:38'),
(38785, 24734473, '09sPxt6e7WfoyfvK98jMhf3Q0ztKh8zf', '2017-07-27 09:28:16', '2017-07-27 09:28:16'),
(38786, 24734473, 'iQO4OTHkxkuRTEgEfw9yoqk5ZioGUXqB', '2017-07-27 09:28:16', '2017-07-27 09:28:16'),
(38787, 24734473, 'HfR1ySo1NZWdVmvb3fYAo4mYiRhHlRyO', '2017-07-27 09:28:24', '2017-07-27 09:28:24'),
(38788, 24734473, '1x48a5ntnFFt01axdEqPHcFe8rF5jiDQ', '2017-07-27 09:28:28', '2017-07-27 09:28:28'),
(38789, 24734473, 'l9XkNpyoy8feUS8vNTbUqrvaqoIYwMK1', '2017-07-27 09:28:30', '2017-07-27 09:28:30'),
(38790, 24734473, 'kizsxu9KaO0Ehjfm0YTUV8PnundM3WvD', '2017-07-27 09:28:31', '2017-07-27 09:28:31'),
(38791, 24734474, 'EPlq0usnvabvqKupocLRKpO1cjhOYmcP', '2017-07-27 09:51:23', '2017-07-27 09:51:23'),
(38792, 24734474, 'klXhy1S3RwSFjc0qnhrbgGB6J3vkZ6SO', '2017-07-27 09:51:24', '2017-07-27 09:51:24'),
(38793, 24734474, 'rTx1AWLlsvyv8hi0ODMdU5lBxzRxlWBK', '2017-07-27 09:51:32', '2017-07-27 09:51:32'),
(38794, 24734473, 'o8Dmg9Ru966uFKoy1duwDvQzQmv9LRJW', '2017-07-27 10:47:57', '2017-07-27 10:47:57'),
(38795, 24734473, 'VewNtzavvK1MzXyujdoR4rKl0x6LT7YT', '2017-07-27 10:48:12', '2017-07-27 10:48:12'),
(38796, 24734473, 'CgRfuqsdlOroC08K6cqaTMFzy6GXEBMn', '2017-07-27 10:48:13', '2017-07-27 10:48:13'),
(38797, 24734473, '4NhVfpW9T19DgtK72qG0GalBYrjFmajn', '2017-07-27 10:48:14', '2017-07-27 10:48:14'),
(38798, 24734473, 'czPZ0aNhXDXsbioitCe1RvXiwZrqC0md', '2017-07-27 10:48:21', '2017-07-27 10:48:21'),
(38799, 24734473, 'ylCLZbh2Y1z12jyaYrNvrgZ4oMhg7ifT', '2017-07-27 10:48:22', '2017-07-27 10:48:22'),
(38800, 24734473, 'ngYPIMsfrKRjdXkL8FJhJacBDC29ztR7', '2017-07-27 10:48:22', '2017-07-27 10:48:22'),
(38801, 24734473, 'hPiP1sMk3o2AQhgdTSG2pEzXXwXNit6t', '2017-07-27 10:48:24', '2017-07-27 10:48:24'),
(38802, 24734473, 'qc0ekBQ06sRsKzlicu2qS5P9rv4LWP59', '2017-07-27 10:48:26', '2017-07-27 10:48:26'),
(38803, 24734473, 'ebq8A5Rb65Q4Z6gg3kuKBOZLUqAQZmYx', '2017-07-27 10:48:30', '2017-07-27 10:48:30'),
(38804, 24734473, 'G9sIEawGJDwkwW1nVzZ54BliUnOlm0Kl', '2017-07-27 10:48:34', '2017-07-27 10:48:34'),
(38805, 24734473, 'y7LFVdTkfnwAapJZD5k2dLoZvU8GpV4p', '2017-07-27 10:48:35', '2017-07-27 10:48:35'),
(38806, 24734473, 'uRD8SEyj28I54PuK3wi9nU0cfNWcGFLB', '2017-07-27 10:48:37', '2017-07-27 10:48:37'),
(38807, 24734473, 'qHnkB4Q280YFVbtVl7qn65mWu9v0Z1kM', '2017-07-27 10:48:38', '2017-07-27 10:48:38'),
(38808, 24734473, 'gtQsQ3BMHgbtY4Xyb9iuraAWoHMdx5EY', '2017-07-27 10:48:40', '2017-07-27 10:48:40'),
(38809, 24734473, 'QwurKvIErWiWdV0tnRudRShpSM9Hw89x', '2017-07-27 10:48:46', '2017-07-27 10:48:46'),
(38810, 24734473, 'VUSwVDqYwtu1RAE2LjWTYdkZb9s3KVtl', '2017-07-27 10:48:47', '2017-07-27 10:48:47'),
(38811, 24734473, 'Qc3dNNnRpvcTa9Cmj8S6nsZtuCVhuCrM', '2017-07-27 10:48:48', '2017-07-27 10:48:48'),
(38812, 24734473, 'kA9crTNHZFCY2kjccK5gsY9ZcqFgesDD', '2017-07-27 10:48:49', '2017-07-27 10:48:49'),
(38813, 24734473, 'kYgv6WiYsQGAcW0FxRXKqi0Pv5VRDG3o', '2017-07-27 10:48:52', '2017-07-27 10:48:52'),
(38814, 24734473, '0HLpZoJLmVIUNYVpREe63aIUXG8uhCAx', '2017-07-27 10:48:53', '2017-07-27 10:48:53'),
(38815, 24734473, 'ctRdLFP65ESf98NQViuwNnTV6HUXs7Hk', '2017-07-27 10:48:54', '2017-07-27 10:48:54'),
(38816, 24734473, '2NPcviw12Q49ueNhYA1nfYpFspH3Rjl5', '2017-07-27 10:50:08', '2017-07-27 10:50:08'),
(38817, 24734473, '7VqTJHqvxeYPISprzmJNVcB1qlQIGkIf', '2017-07-27 10:50:10', '2017-07-27 10:50:10'),
(38818, 24734473, 'efiReFkKURQFxQhTFgg0px5pDFHw6G5S', '2017-07-27 10:50:11', '2017-07-27 10:50:11'),
(38819, 24734473, 'pI6cDjdslNXoiYHWXhyN5nY2SdLSQR21', '2017-07-27 10:50:11', '2017-07-27 10:50:11'),
(38820, 24734473, 'wLDJwyUH6UwT5DnH4NDdi4fJmOVISOu4', '2017-07-27 10:50:41', '2017-07-27 10:50:41'),
(38821, 24734473, 'Qf1aXh9Ddiy6wYzfuOd6ywEbKQn8ng0u', '2017-07-27 10:51:26', '2017-07-27 10:51:26'),
(38822, 24734473, 'c3Vr7palmQzvqw8Q2vlh4uG2XH04nShx', '2017-07-27 10:51:26', '2017-07-27 10:51:26'),
(38823, 24734473, 'REdAv2MaTjwFbqiR0FLzPFCMqbLzYxTt', '2017-07-27 10:51:27', '2017-07-27 10:51:27'),
(38824, 24734446, '5PtdExKsBMTst4YQOHNZWHNKj3zMFB17', '2017-07-27 14:00:54', '2017-07-27 14:00:54'),
(38825, 24734473, '3PoZNqftpvVRmyya6CKaIDvkS8rK26Uf', '2017-07-27 18:34:37', '2017-07-27 18:34:37'),
(38826, 24734473, '21CwtgbIB1czK34WlryQCReJto8C6Esd', '2017-07-27 18:34:41', '2017-07-27 18:34:41'),
(38827, 24734473, 'vHmKhu7Izumb46R9GOARyYENTCgGkryz', '2017-07-27 18:34:51', '2017-07-27 18:34:51'),
(38828, 24734473, 'kxV6LGsM6WXKOuvaoF6eXbVJD8Fo4t0r', '2017-07-27 18:34:56', '2017-07-27 18:34:56'),
(38829, 24734473, 'f4WboZnCe1YczpDxAzunZ1fLkWYRx5yU', '2017-07-27 18:34:58', '2017-07-27 18:34:58'),
(38830, 24734473, 'eOFiRfbnsm83IWrbXiHscTNt6FwoZXAa', '2017-07-27 18:35:00', '2017-07-27 18:35:00'),
(38831, 24734473, 'kIq1wUSjUEzlK3nBuHNSd51pfZVC9dPR', '2017-07-27 18:35:01', '2017-07-27 18:35:01'),
(38832, 24734473, '2mvsi4jBgTD3qjZ03RvrhyH1sBSu5JC6', '2017-07-27 18:35:03', '2017-07-27 18:35:03'),
(38833, 24734473, 'EfHub3zmvJYTGWKMhzKqukAR7go1pdqy', '2017-07-27 18:35:07', '2017-07-27 18:35:07'),
(38834, 24734473, 'iWM89S3LmU8TvFC9U6o27RaTA75z9Lad', '2017-07-27 18:35:07', '2017-07-27 18:35:07'),
(38835, 24734473, 'bv3EwZiTGSjmlPBXkF0ivaHMdKy0XGCl', '2017-07-27 18:35:09', '2017-07-27 18:35:09'),
(38836, 24734473, 'CpiNjTHt67o8bzEhuu4YfvAQXNzKEmUz', '2017-07-27 18:35:11', '2017-07-27 18:35:11'),
(38837, 24734473, 'MSkh8IpH9N55D6IIMnzaFBF0N0WtmycM', '2017-07-27 18:35:12', '2017-07-27 18:35:12'),
(38838, 24734473, 'NNoR1WPBxSp57sqh12SWhoQbSBtjQTOf', '2017-07-27 18:35:14', '2017-07-27 18:35:14'),
(38839, 24734473, 'f1NX0nhK3zQ7QTACbaWv1g0V7mZnPyP7', '2017-07-27 18:35:15', '2017-07-27 18:35:15'),
(38840, 24734473, 'sanKrmznvja3wkzNa2ysTyKRbJLr9vuL', '2017-07-27 18:35:17', '2017-07-27 18:35:17'),
(38841, 24734473, 'VAjZZNproO9T9eMOHucHrMF8KGn2fJAs', '2017-07-27 18:35:19', '2017-07-27 18:35:19'),
(38842, 24734473, 'wDjObYDfobNG8B5TY0F8rSWdd6VAVPNb', '2017-07-27 18:35:20', '2017-07-27 18:35:20'),
(38843, 24734473, 'VZY9rddCa5KhwWPpD5CwFhr2zfWFiQKW', '2017-07-27 18:35:22', '2017-07-27 18:35:22'),
(38844, 24734473, 'zwmr6CZnff3uF8Cv1jEjE2FguhnCioDs', '2017-07-27 18:35:23', '2017-07-27 18:35:23'),
(38845, 24734473, 'KrLjUl860bcHzfVoChTiHtUCB4HWbk8R', '2017-07-27 18:35:25', '2017-07-27 18:35:25'),
(38846, 24734473, 'aIv9y9j8zKW76lHzgZpOCC0COFRiA0Un', '2017-07-27 18:35:59', '2017-07-27 18:35:59'),
(38847, 24734473, '8UGQCd6fXDjEAMMhBF7pzHmaHG30Wj8M', '2017-07-27 18:36:00', '2017-07-27 18:36:00'),
(38848, 24734473, 'ZJeanOsyDyYVQIlYPjhJfWyW1Ge2nbuQ', '2017-07-27 20:24:45', '2017-07-27 20:24:45'),
(38849, 24734473, '23gXzrO9YOGaUiVwAkPqes1yRfFhxHcw', '2017-07-27 20:24:46', '2017-07-27 20:24:46'),
(38850, 24734473, 'VXwwS4sgS2a5OjbPGs9yw0w7ZD2fbFbU', '2017-07-27 20:24:48', '2017-07-27 20:24:48'),
(38851, 24734473, '7j3u5SJ8W60KSqGgUkag5XZS7joQ0FYy', '2017-07-27 20:24:50', '2017-07-27 20:24:50'),
(38852, 24734473, 'BhD3xYctFI84spg9pzvU92fc6ccflapZ', '2017-07-27 20:24:53', '2017-07-27 20:24:53'),
(38853, 24734473, 'NlYdYij0EoCKxKkxzaKbYBPk9fLTzQoW', '2017-07-27 20:25:02', '2017-07-27 20:25:02'),
(38854, 24734473, 'nIWoCNDBwLwOk064RiDZUoPGjibqtYf6', '2017-07-27 20:25:05', '2017-07-27 20:25:05'),
(38855, 24734473, 'YW9JWqofpSfk2ujT9DFa7sS5YXoso7ZJ', '2017-07-27 20:25:06', '2017-07-27 20:25:06'),
(38856, 24734473, 'HN9WVwcEuf97RSQ6wxSTEdRAZTytXgw3', '2017-07-27 20:25:09', '2017-07-27 20:25:09'),
(38857, 24734473, 'a28zW1VQykA8LsV4ATj7346NtX4dnkqO', '2017-07-27 20:25:11', '2017-07-27 20:25:11'),
(38858, 24734473, '4fYPe4C3B5nSdvkla75I9wl5vcmtmgt1', '2017-07-27 20:25:17', '2017-07-27 20:25:17'),
(38859, 24734473, '3U98Q2qAUTXiQmRBnkaFyjJbFAIWGWgW', '2017-07-27 20:25:25', '2017-07-27 20:25:25'),
(38860, 24734473, 'EfJ1c43Yb7GhDCSDfKFqzKiSM80AYdnI', '2017-07-27 20:25:27', '2017-07-27 20:25:27'),
(38861, 24734473, 'IgU5Y4otud2abZEoKFiHnh2qKolOfmwA', '2017-07-27 20:25:28', '2017-07-27 20:25:28'),
(38862, 24734473, 'Zrwo0LLgakpwXTFZHNP2QaD42ARrdkNO', '2017-07-27 20:25:29', '2017-07-27 20:25:29'),
(38863, 24734473, 'fThDvpN4bWzzUVasy85Wt56luBa6qXl6', '2017-07-27 20:25:30', '2017-07-27 20:25:30'),
(38864, 24734473, 'ILBXH0ClfIwC6SM9Hq6vGJQtv91RaxwM', '2017-07-27 20:25:32', '2017-07-27 20:25:32'),
(38865, 24734473, 'BNpFDb8rWJMKX7JgMPTwsn7AYoJGUlN7', '2017-07-27 20:25:34', '2017-07-27 20:25:34'),
(38866, 24734473, 'hi9qW9uY8b6NJUANjmmICbQt0kE8OliL', '2017-07-27 20:25:36', '2017-07-27 20:25:36'),
(38867, 24734473, 'nCWK5KgWDG9AdI380XOQETBFU3mWXgbr', '2017-07-27 20:25:38', '2017-07-27 20:25:38'),
(38868, 24734473, 'qxEZ05dA8nh0gLeLZ0RUEY5v3KuTjjmR', '2017-07-27 20:25:44', '2017-07-27 20:25:44'),
(38869, 24734473, '7x0izuhbALzp34DExFigxvh7r1wZ7Bsu', '2017-07-27 20:25:45', '2017-07-27 20:25:45'),
(38870, 24734446, 'qYRF6ijkVhZXGxOSn2fbfA63XJ4eNvse', '2017-07-27 21:39:29', '2017-07-27 21:39:29'),
(38871, 24734446, 'xWhU4KM7y6lCnClQJTHmHORN2j22wIjf', '2017-07-27 21:45:27', '2017-07-27 21:45:27'),
(38872, 24734446, 'qyKwE7dtN4tiH5SKBlXTkmNx5eKQFp7A', '2017-07-27 22:03:22', '2017-07-27 22:03:22'),
(38873, 24734446, 'mFRLqOemDSWzTzh7o9wCL8xjmWwUsuy3', '2017-07-27 22:03:23', '2017-07-27 22:03:23'),
(38874, 24734473, 'luZoUYdQxMmBdZGQk4LuP0K3g8RuknRU', '2017-07-27 22:10:32', '2017-07-27 22:10:32'),
(38875, 24734473, 'Mj3HKDdOwHC7f7FGq2Hb2G7uZn9WUf5A', '2017-07-27 22:10:35', '2017-07-27 22:10:35'),
(38876, 24734473, 'ymZdfMQ1Ga7tbAz3gvWbHAx7UulzSK0A', '2017-07-27 22:10:37', '2017-07-27 22:10:37'),
(38877, 24734473, 'KCTCmMbQ70oeXewI2mcpmtLy4awOPIa7', '2017-07-27 22:14:11', '2017-07-27 22:14:11'),
(38878, 24734473, 'u9ReiDpdiXci8FoFaAQwPI359ABubq0a', '2017-07-27 22:14:15', '2017-07-27 22:14:15'),
(38879, 24734473, 'DtuCIFYSMeZU5ZXEK6yV6XzGgxWIPRIq', '2017-07-27 22:16:40', '2017-07-27 22:16:40'),
(38880, 24734473, 'c8oeOJNgiE1k1fI6W14h8IrdF1PuvnCw', '2017-07-27 22:17:06', '2017-07-27 22:17:06'),
(38881, 24734473, 'KA0TmfZFg0w069zVj0YN6c9kZKmySaSL', '2017-07-27 22:17:08', '2017-07-27 22:17:08'),
(38882, 24734473, 'jRtvD5UL8MZ0zDnRwIAnign2T6R1yqyG', '2017-07-27 22:17:09', '2017-07-27 22:17:09'),
(38883, 24734473, '0Gm0WxtCcmEZHGHb8ucEWILWAkIydSSk', '2017-07-27 22:17:14', '2017-07-27 22:17:14'),
(38884, 24734473, 'FWJjW93tLP4pinzEpC3xQKwnApeScivv', '2017-07-27 22:17:20', '2017-07-27 22:17:20'),
(38885, 24734473, 'KP2DQHbPaBW6hmq9zYeAN90n6CsKkeQm', '2017-07-27 22:17:22', '2017-07-27 22:17:22'),
(38886, 24734473, 'ZrJAf4CtZakb3k8Zvq5bFeAa0I1ypqRz', '2017-07-27 22:17:32', '2017-07-27 22:17:32'),
(38887, 24734473, 'wdhme6yMvA3wnX5zGS6vUMCAMx69Fwf0', '2017-07-27 22:17:33', '2017-07-27 22:17:33'),
(38888, 24734473, 'frsGNSIML79JIGzSPRGCMQ3WaaMOmCIa', '2017-07-27 22:17:37', '2017-07-27 22:17:37'),
(38889, 24734473, 'CnlmZBVxjpO7of6QT6mZcOiPtE9OBu0t', '2017-07-27 22:22:09', '2017-07-27 22:22:09'),
(38890, 24734473, 'LnZUjDRQ6gVFh0SzqxWO4cnqYK2wq33S', '2017-07-27 22:22:09', '2017-07-27 22:22:09'),
(38891, 24734473, 'uap8RYYOx5nPXcu0e3G1N3crcNJjnpi6', '2017-07-27 22:22:13', '2017-07-27 22:22:13'),
(38892, 24734473, '1kPlFlvHNwCZKvvQLASweEuvLchbADmn', '2017-07-27 22:22:19', '2017-07-27 22:22:19'),
(38893, 24734473, '70e2k5OWxcX6Nj0uR9E9bEVmKd19iWEN', '2017-07-27 22:22:20', '2017-07-27 22:22:20'),
(38894, 24734473, 'HaglXVZ1nEqoKOBfl5nEk9r4X7BFlskt', '2017-07-27 22:22:23', '2017-07-27 22:22:23'),
(38895, 24734473, 'zA2UhFBHSJrDKUnZJqWKDn9lVhbf9eGo', '2017-07-27 22:22:33', '2017-07-27 22:22:33'),
(38896, 24734473, 'ctyiGHLdt48MVzg5GI1XFNdAjkQQbgux', '2017-07-27 22:22:35', '2017-07-27 22:22:35'),
(38897, 24734473, 'sSiFxMjvdwIc5A8tzWhwo3wpNevf7EpV', '2017-07-27 22:22:37', '2017-07-27 22:22:37'),
(38898, 24734473, 'kcipfKxbTeaV912OaXIyuW6cX3esEgya', '2017-07-27 22:22:43', '2017-07-27 22:22:43'),
(38899, 24734473, 'koxpj2cwtoJKLg8dVh77bW51cdFMNW8x', '2017-07-27 22:22:43', '2017-07-27 22:22:43'),
(38900, 24734473, 'plilob3hLU1D03zw64UHhvkUEP5pjcPg', '2017-07-27 22:22:49', '2017-07-27 22:22:49'),
(38901, 24734473, 'pL5yudQaKiGnYoBg0pvfIyMwRntElNdX', '2017-07-27 22:22:51', '2017-07-27 22:22:51'),
(38902, 24734473, 'TjjXxPnyER9fiqDxBJ7eDE9E7HxJzFp4', '2017-07-27 22:22:52', '2017-07-27 22:22:52'),
(38903, 24734473, 'GdrKkb99jxVTx0y6pylvrXXompoYDK31', '2017-07-27 22:22:54', '2017-07-27 22:22:54'),
(38904, 24734473, 'z1r1yXoPCL9pdHuBLMrOhQo7CL1ncsfe', '2017-07-27 22:22:55', '2017-07-27 22:22:55'),
(38905, 24734473, 'zWtBQgxDaXwG4OIWCBoJXK61pkPNassi', '2017-07-27 22:22:56', '2017-07-27 22:22:56'),
(38906, 24734473, 'LYjyFJISFEElzEjvQdOfEuz0Sn69duZ7', '2017-07-27 22:23:00', '2017-07-27 22:23:00'),
(38907, 24734473, 'B0HqlrYJYE0rHWCeVEhIvpxdDay77hA3', '2017-07-27 22:23:00', '2017-07-27 22:23:00'),
(38908, 24734473, 'LdffwQgXdyhFUq0cR0HMuTRwsCqHVQrd', '2017-07-27 22:23:17', '2017-07-27 22:23:17'),
(38909, 24734473, 'qQx3L5024S0gA9l9Q4sDkfw36SoUzj1p', '2017-07-27 22:23:17', '2017-07-27 22:23:17'),
(38910, 24734473, 'E7FSPeUoJ5zmGleZmlaxSldRwDaK1amf', '2017-07-27 23:36:01', '2017-07-27 23:36:01'),
(38911, 24734473, 'ZVjxwli97zt2mrx3T9sxRJODdfRRcX2N', '2017-07-27 23:36:16', '2017-07-27 23:36:16'),
(38912, 24734473, 'zSfqzcYglURG2LZbnWfyWwhsTVNDsUlv', '2017-07-27 23:36:21', '2017-07-27 23:36:21'),
(38913, 24734473, '6uS8pHwpV7mNvgysa1STiLl4nBH8hWkt', '2017-07-27 23:36:23', '2017-07-27 23:36:23'),
(38914, 24734473, 'CW4yqovF5Ext3134GXzrehVVnZ02zYX7', '2017-07-28 00:12:16', '2017-07-28 00:12:16'),
(38915, 24734473, 'URoUiNwSuUaA98FbwRcC9EdDXYOg6KH1', '2017-07-28 00:12:50', '2017-07-28 00:12:50'),
(38916, 24734473, 'CaiRc0hwvcdp7Km4A9ehlpDw8S3kkPIP', '2017-07-28 00:12:50', '2017-07-28 00:12:50'),
(38917, 24734473, '9Pmkbmbln17kxm9CQ1t9w25bKFSNNa2p', '2017-07-28 00:12:51', '2017-07-28 00:12:51'),
(38918, 24734473, 'lefGuFQcxTEURkNLmkqjdTOxBOoyt10W', '2017-07-28 00:13:01', '2017-07-28 00:13:01'),
(38919, 24734473, 'aYL2XCd9RT3gfqNEVBwXLcoOgDqF9uZa', '2017-07-28 00:13:01', '2017-07-28 00:13:01'),
(38920, 24734473, 'dJvXq5OAF8GX3rdokB1gnO0T1jzsYISx', '2017-07-28 00:13:02', '2017-07-28 00:13:02'),
(38921, 24734473, 'rwcisjwDl758JtxLnWT6K5eJmMVO7TF4', '2017-07-28 00:27:50', '2017-07-28 00:27:50'),
(38922, 24734473, '2GFLA3c8Q8GJ8sIMIg0ufJljoVJIeNYg', '2017-07-28 00:27:54', '2017-07-28 00:27:54'),
(38923, 24734473, 'C7G4O5Zst1DVV4NdLXK8oTN5pU34jio2', '2017-07-28 00:28:00', '2017-07-28 00:28:00'),
(38924, 24734473, 'K3YmV4vtjJavaIIpzaPpaMpkltTzumK5', '2017-07-28 00:28:01', '2017-07-28 00:28:01'),
(38925, 24734473, 'GRNn4Oh5Ux4DMCWaJTDHZ14w48ODMMCs', '2017-07-28 00:28:02', '2017-07-28 00:28:02'),
(38926, 24734473, 'VYZIYqEQNPh6KwlU00bb877REbtPaxpF', '2017-07-28 00:28:32', '2017-07-28 00:28:32'),
(38927, 24734473, 'tg8jk4cYQa63y5bgwSNojE26fG86QFvT', '2017-07-28 00:39:00', '2017-07-28 00:39:00'),
(38928, 24734473, '4mq8BMa9l6W3wO0735uTpXlgWH4djs0s', '2017-07-28 00:39:03', '2017-07-28 00:39:03'),
(38929, 24734473, 'xM7IpYRVR3tGVcM2uDYUqzn4alCDVSyi', '2017-07-28 00:39:04', '2017-07-28 00:39:04'),
(38930, 24734473, 'jEsaTv2hzss1qtOPGnn87N4rMRVhnO7K', '2017-07-28 02:38:15', '2017-07-28 02:38:15'),
(38931, 24734473, '8SWzbXUyhGLfPz4sSJrrcbOPJVtjnSng', '2017-07-28 02:38:18', '2017-07-28 02:38:18'),
(38932, 24734473, 'jOAanTeeqn2NrDJ55kJ6hAu0gWPeNfiZ', '2017-07-28 02:38:20', '2017-07-28 02:38:20'),
(38933, 24734473, 'WakaKR5TE1NVjtBqELX1YnAdsKwKNBdU', '2017-07-28 02:38:21', '2017-07-28 02:38:21'),
(38934, 24734473, 'nHmCsO8NJTgdeigiBwJus5tSp0dMiBra', '2017-07-28 02:39:08', '2017-07-28 02:39:08'),
(38935, 24734473, 'xc0N6pD18on57DVlS7puLyXccDkKQDwV', '2017-07-28 05:30:26', '2017-07-28 05:30:26'),
(38936, 24734446, 'YMOGSKDgKOD4T5FjFSSOS1ukBGTo6RFR', '2017-07-28 07:52:37', '2017-07-28 07:52:37'),
(38937, 24734446, 'LLFQj75YvIOUfjYxby0boTmPQV22oqmd', '2017-07-28 14:15:21', '2017-07-28 14:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"admin\":1}', '2016-12-17 07:18:50', '2016-12-17 07:18:50'),
(2, 'staff', 'Server User', '{\"staff\":2}', '2016-12-17 07:18:50', '2016-12-17 07:18:50'),
(3, 'merchant', 'Merchant', '{\"merchant\":3}', '2016-12-17 07:18:50', '2016-12-17 07:18:50'),
(4, 'user', 'User', '{\"user\":4}', '2016-12-17 07:18:50', '2016-12-17 07:18:50'),
(5, 'client', 'Client', '{\"client\":5}', '2016-12-17 07:18:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(24734446, 1, '2017-04-10 16:50:17', '2017-04-10 16:50:17'),
(24734472, 4, '2017-07-26 23:07:55', '2017-07-26 23:07:55'),
(24734473, 4, '2017-07-27 00:20:58', '2017-07-27 00:20:58'),
(24734474, 5, '2017-07-27 07:02:49', '2017-07-27 07:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `finished` tinyint(4) NOT NULL DEFAULT '0',
  `task_description` text COLLATE utf8_unicode_ci NOT NULL,
  `task_deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2016-12-17 08:20:12', '2016-12-17 08:20:12'),
(2, NULL, 'ip', '192.168.1.252', '2016-12-17 08:20:12', '2016-12-17 08:20:12'),
(3, 1, 'user', NULL, '2016-12-17 08:20:12', '2016-12-17 08:20:12'),
(4, NULL, 'global', NULL, '2016-12-17 08:20:16', '2016-12-17 08:20:16'),
(5, NULL, 'ip', '192.168.1.252', '2016-12-17 08:20:16', '2016-12-17 08:20:16'),
(6, 1, 'user', NULL, '2016-12-17 08:20:16', '2016-12-17 08:20:16'),
(7, NULL, 'global', NULL, '2016-12-17 08:21:37', '2016-12-17 08:21:37'),
(8, NULL, 'ip', '192.168.1.252', '2016-12-17 08:21:37', '2016-12-17 08:21:37'),
(9, 1, 'user', NULL, '2016-12-17 08:21:37', '2016-12-17 08:21:37'),
(10, NULL, 'global', NULL, '2016-12-17 11:39:14', '2016-12-17 11:39:14'),
(11, NULL, 'ip', '192.168.1.252', '2016-12-17 11:39:14', '2016-12-17 11:39:14'),
(12, NULL, 'global', NULL, '2017-02-24 20:59:18', '2017-02-24 20:59:18'),
(13, NULL, 'ip', '::1', '2017-02-24 20:59:18', '2017-02-24 20:59:18'),
(14, NULL, 'global', NULL, '2017-02-24 21:03:52', '2017-02-24 21:03:52'),
(15, NULL, 'ip', '::1', '2017-02-24 21:03:52', '2017-02-24 21:03:52'),
(16, 12, 'user', NULL, '2017-02-24 21:03:52', '2017-02-24 21:03:52'),
(17, NULL, 'global', NULL, '2017-03-02 22:14:19', '2017-03-02 22:14:19'),
(18, NULL, 'ip', '192.168.3.137', '2017-03-02 22:14:19', '2017-03-02 22:14:19'),
(19, NULL, 'global', NULL, '2017-03-12 15:43:38', '2017-03-12 15:43:38'),
(20, NULL, 'ip', '192.168.1.224', '2017-03-12 15:43:38', '2017-03-12 15:43:38'),
(21, NULL, 'global', NULL, '2017-03-16 15:15:08', '2017-03-16 15:15:08'),
(22, NULL, 'ip', '192.168.1.224', '2017-03-16 15:15:08', '2017-03-16 15:15:08'),
(23, 1, 'user', NULL, '2017-03-16 15:15:08', '2017-03-16 15:15:08'),
(24, NULL, 'global', NULL, '2017-03-16 15:19:54', '2017-03-16 15:19:54'),
(25, NULL, 'ip', '192.168.1.224', '2017-03-16 15:19:54', '2017-03-16 15:19:54'),
(26, 1, 'user', NULL, '2017-03-16 15:19:54', '2017-03-16 15:19:54'),
(27, NULL, 'global', NULL, '2017-03-16 15:26:57', '2017-03-16 15:26:57'),
(28, NULL, 'ip', '192.168.1.224', '2017-03-16 15:26:57', '2017-03-16 15:26:57'),
(29, 1, 'user', NULL, '2017-03-16 15:26:57', '2017-03-16 15:26:57'),
(30, NULL, 'global', NULL, '2017-03-16 15:27:03', '2017-03-16 15:27:03'),
(31, NULL, 'ip', '192.168.1.224', '2017-03-16 15:27:03', '2017-03-16 15:27:03'),
(32, 1, 'user', NULL, '2017-03-16 15:27:03', '2017-03-16 15:27:03'),
(33, NULL, 'global', NULL, '2017-03-16 15:27:10', '2017-03-16 15:27:10'),
(34, NULL, 'ip', '192.168.1.224', '2017-03-16 15:27:10', '2017-03-16 15:27:10'),
(35, 1, 'user', NULL, '2017-03-16 15:27:10', '2017-03-16 15:27:10'),
(36, NULL, 'global', NULL, '2017-03-16 15:27:14', '2017-03-16 15:27:14'),
(37, NULL, 'ip', '192.168.1.224', '2017-03-16 15:27:14', '2017-03-16 15:27:14'),
(38, 1, 'user', NULL, '2017-03-16 15:27:14', '2017-03-16 15:27:14'),
(39, NULL, 'global', NULL, '2017-03-16 22:55:09', '2017-03-16 22:55:09'),
(40, NULL, 'ip', '192.168.1.224', '2017-03-16 22:55:09', '2017-03-16 22:55:09'),
(41, 1, 'user', NULL, '2017-03-16 22:55:09', '2017-03-16 22:55:09'),
(42, NULL, 'global', NULL, '2017-03-16 22:55:16', '2017-03-16 22:55:16'),
(43, NULL, 'ip', '192.168.1.224', '2017-03-16 22:55:16', '2017-03-16 22:55:16'),
(44, 1, 'user', NULL, '2017-03-16 22:55:16', '2017-03-16 22:55:16'),
(45, NULL, 'global', NULL, '2017-03-19 05:07:03', '2017-03-19 05:07:03'),
(46, NULL, 'ip', '192.168.1.224', '2017-03-19 05:07:03', '2017-03-19 05:07:03'),
(47, 24734290, 'user', NULL, '2017-03-19 05:07:03', '2017-03-19 05:07:03'),
(48, NULL, 'global', NULL, '2017-03-19 21:36:00', '2017-03-19 21:36:00'),
(49, NULL, 'ip', '192.168.1.144', '2017-03-19 21:36:00', '2017-03-19 21:36:00'),
(50, 1, 'user', NULL, '2017-03-19 21:36:00', '2017-03-19 21:36:00'),
(51, NULL, 'global', NULL, '2017-03-19 21:59:53', '2017-03-19 21:59:53'),
(52, NULL, 'ip', '192.168.1.144', '2017-03-19 21:59:53', '2017-03-19 21:59:53'),
(53, 1, 'user', NULL, '2017-03-19 21:59:53', '2017-03-19 21:59:53'),
(54, NULL, 'global', NULL, '2017-03-19 22:00:16', '2017-03-19 22:00:16'),
(55, NULL, 'ip', '192.168.1.144', '2017-03-19 22:00:16', '2017-03-19 22:00:16'),
(56, 1, 'user', NULL, '2017-03-19 22:00:16', '2017-03-19 22:00:16'),
(57, NULL, 'global', NULL, '2017-03-19 22:01:23', '2017-03-19 22:01:23'),
(58, NULL, 'ip', '192.168.1.144', '2017-03-19 22:01:23', '2017-03-19 22:01:23'),
(59, 1, 'user', NULL, '2017-03-19 22:01:23', '2017-03-19 22:01:23'),
(60, NULL, 'global', NULL, '2017-03-19 22:03:29', '2017-03-19 22:03:29'),
(61, NULL, 'ip', '192.168.1.144', '2017-03-19 22:03:29', '2017-03-19 22:03:29'),
(62, NULL, 'global', NULL, '2017-03-19 22:06:45', '2017-03-19 22:06:45'),
(63, NULL, 'ip', '192.168.1.144', '2017-03-19 22:06:45', '2017-03-19 22:06:45'),
(64, NULL, 'global', NULL, '2017-03-19 22:10:50', '2017-03-19 22:10:50'),
(65, NULL, 'ip', '192.168.1.144', '2017-03-19 22:10:50', '2017-03-19 22:10:50'),
(66, NULL, 'global', NULL, '2017-03-20 00:28:15', '2017-03-20 00:28:15'),
(67, NULL, 'ip', '192.168.1.144', '2017-03-20 00:28:15', '2017-03-20 00:28:15'),
(68, NULL, 'global', NULL, '2017-03-20 00:28:17', '2017-03-20 00:28:17'),
(69, NULL, 'ip', '192.168.1.144', '2017-03-20 00:28:17', '2017-03-20 00:28:17'),
(70, NULL, 'global', NULL, '2017-03-20 00:28:18', '2017-03-20 00:28:18'),
(71, NULL, 'ip', '192.168.1.144', '2017-03-20 00:28:18', '2017-03-20 00:28:18'),
(72, NULL, 'global', NULL, '2017-03-20 00:28:18', '2017-03-20 00:28:18'),
(73, NULL, 'ip', '192.168.1.144', '2017-03-20 00:28:18', '2017-03-20 00:28:18'),
(74, NULL, 'global', NULL, '2017-03-20 00:28:18', '2017-03-20 00:28:18'),
(75, NULL, 'ip', '192.168.1.144', '2017-03-20 00:28:18', '2017-03-20 00:28:18'),
(76, NULL, 'global', NULL, '2017-03-20 00:28:19', '2017-03-20 00:28:19'),
(77, NULL, 'ip', '192.168.1.144', '2017-03-20 00:28:19', '2017-03-20 00:28:19'),
(78, NULL, 'global', NULL, '2017-03-20 00:44:40', '2017-03-20 00:44:40'),
(79, NULL, 'ip', '192.168.1.144', '2017-03-20 00:44:40', '2017-03-20 00:44:40'),
(80, NULL, 'global', NULL, '2017-03-20 00:46:53', '2017-03-20 00:46:53'),
(81, NULL, 'ip', '192.168.1.144', '2017-03-20 00:46:53', '2017-03-20 00:46:53'),
(82, NULL, 'global', NULL, '2017-03-20 00:47:12', '2017-03-20 00:47:12'),
(83, NULL, 'ip', '192.168.1.144', '2017-03-20 00:47:12', '2017-03-20 00:47:12'),
(84, 1, 'user', NULL, '2017-03-20 00:47:12', '2017-03-20 00:47:12'),
(85, NULL, 'global', NULL, '2017-03-20 20:06:01', '2017-03-20 20:06:01'),
(86, NULL, 'ip', '192.168.1.224', '2017-03-20 20:06:01', '2017-03-20 20:06:01'),
(87, NULL, 'global', NULL, '2017-03-20 20:06:16', '2017-03-20 20:06:16'),
(88, NULL, 'ip', '192.168.1.224', '2017-03-20 20:06:16', '2017-03-20 20:06:16'),
(89, NULL, 'global', NULL, '2017-03-20 20:06:18', '2017-03-20 20:06:18'),
(90, NULL, 'ip', '192.168.1.224', '2017-03-20 20:06:18', '2017-03-20 20:06:18'),
(91, NULL, 'global', NULL, '2017-03-20 20:06:23', '2017-03-20 20:06:23'),
(92, NULL, 'ip', '192.168.1.224', '2017-03-20 20:06:23', '2017-03-20 20:06:23'),
(93, NULL, 'global', NULL, '2017-03-20 20:06:35', '2017-03-20 20:06:35'),
(94, NULL, 'ip', '192.168.1.224', '2017-03-20 20:06:35', '2017-03-20 20:06:35'),
(95, NULL, 'global', NULL, '2017-03-20 20:06:42', '2017-03-20 20:06:42'),
(96, NULL, 'ip', '192.168.1.224', '2017-03-20 20:06:42', '2017-03-20 20:06:42'),
(97, NULL, 'global', NULL, '2017-03-20 22:22:00', '2017-03-20 22:22:00'),
(98, NULL, 'ip', '192.168.1.224', '2017-03-20 22:22:00', '2017-03-20 22:22:00'),
(99, NULL, 'global', NULL, '2017-03-20 22:25:27', '2017-03-20 22:25:27'),
(100, NULL, 'ip', '192.168.1.224', '2017-03-20 22:25:27', '2017-03-20 22:25:27'),
(101, NULL, 'global', NULL, '2017-03-20 22:27:37', '2017-03-20 22:27:37'),
(102, NULL, 'ip', '192.168.1.224', '2017-03-20 22:27:37', '2017-03-20 22:27:37'),
(103, NULL, 'global', NULL, '2017-03-20 22:27:55', '2017-03-20 22:27:55'),
(104, NULL, 'ip', '192.168.1.224', '2017-03-20 22:27:55', '2017-03-20 22:27:55'),
(105, NULL, 'global', NULL, '2017-03-21 04:18:40', '2017-03-21 04:18:40'),
(106, NULL, 'ip', '192.168.1.144', '2017-03-21 04:18:40', '2017-03-21 04:18:40'),
(107, 1, 'user', NULL, '2017-03-21 04:18:40', '2017-03-21 04:18:40'),
(108, NULL, 'global', NULL, '2017-03-21 22:03:43', '2017-03-21 22:03:43'),
(109, NULL, 'ip', '192.168.1.14', '2017-03-21 22:03:43', '2017-03-21 22:03:43'),
(110, 1, 'user', NULL, '2017-03-21 22:03:43', '2017-03-21 22:03:43'),
(111, NULL, 'global', NULL, '2017-03-21 23:06:26', '2017-03-21 23:06:26'),
(112, NULL, 'ip', '192.168.1.14', '2017-03-21 23:06:26', '2017-03-21 23:06:26'),
(113, 1, 'user', NULL, '2017-03-21 23:06:26', '2017-03-21 23:06:26'),
(114, NULL, 'global', NULL, '2017-03-22 04:58:48', '2017-03-22 04:58:48'),
(115, NULL, 'ip', '192.168.1.14', '2017-03-22 04:58:48', '2017-03-22 04:58:48'),
(116, NULL, 'global', NULL, '2017-03-22 14:39:52', '2017-03-22 14:39:52'),
(117, NULL, 'ip', '192.168.1.224', '2017-03-22 14:39:52', '2017-03-22 14:39:52'),
(118, 24734291, 'user', NULL, '2017-03-22 14:39:52', '2017-03-22 14:39:52'),
(119, NULL, 'global', NULL, '2017-03-22 14:44:14', '2017-03-22 14:44:14'),
(120, NULL, 'ip', '192.168.1.224', '2017-03-22 14:44:14', '2017-03-22 14:44:14'),
(121, NULL, 'global', NULL, '2017-03-22 15:13:12', '2017-03-22 15:13:12'),
(122, NULL, 'ip', '192.168.1.224', '2017-03-22 15:13:12', '2017-03-22 15:13:12'),
(123, NULL, 'global', NULL, '2017-03-23 17:22:28', '2017-03-23 17:22:28'),
(124, NULL, 'ip', '192.168.1.224', '2017-03-23 17:22:28', '2017-03-23 17:22:28'),
(125, NULL, 'global', NULL, '2017-03-23 21:40:27', '2017-03-23 21:40:27'),
(126, NULL, 'ip', '192.168.1.224', '2017-03-23 21:40:27', '2017-03-23 21:40:27'),
(127, NULL, 'global', NULL, '2017-03-24 07:09:32', '2017-03-24 07:09:32'),
(128, NULL, 'ip', '222.112.215.142', '2017-03-24 07:09:32', '2017-03-24 07:09:32'),
(129, 24734400, 'user', NULL, '2017-03-24 07:09:32', '2017-03-24 07:09:32'),
(130, NULL, 'global', NULL, '2017-03-24 13:53:25', '2017-03-24 13:53:25'),
(131, NULL, 'ip', '222.112.215.142', '2017-03-24 13:53:25', '2017-03-24 13:53:25'),
(132, NULL, 'global', NULL, '2017-03-24 14:02:57', '2017-03-24 14:02:57'),
(133, NULL, 'ip', '222.112.215.142', '2017-03-24 14:02:57', '2017-03-24 14:02:57'),
(134, NULL, 'global', NULL, '2017-03-24 14:03:19', '2017-03-24 14:03:19'),
(135, NULL, 'ip', '222.112.215.142', '2017-03-24 14:03:19', '2017-03-24 14:03:19'),
(136, NULL, 'global', NULL, '2017-03-24 14:03:35', '2017-03-24 14:03:35'),
(137, NULL, 'ip', '222.112.215.142', '2017-03-24 14:03:35', '2017-03-24 14:03:35'),
(138, NULL, 'global', NULL, '2017-03-24 14:27:58', '2017-03-24 14:27:58'),
(139, NULL, 'ip', '222.112.215.142', '2017-03-24 14:27:58', '2017-03-24 14:27:58'),
(140, NULL, 'global', NULL, '2017-03-24 14:39:30', '2017-03-24 14:39:30'),
(141, NULL, 'ip', '222.112.215.142', '2017-03-24 14:39:30', '2017-03-24 14:39:30'),
(142, NULL, 'global', NULL, '2017-03-24 14:49:12', '2017-03-24 14:49:12'),
(143, NULL, 'ip', '222.112.215.142', '2017-03-24 14:49:12', '2017-03-24 14:49:12'),
(144, NULL, 'global', NULL, '2017-03-24 14:54:27', '2017-03-24 14:54:27'),
(145, NULL, 'ip', '222.112.215.142', '2017-03-24 14:54:27', '2017-03-24 14:54:27'),
(146, NULL, 'global', NULL, '2017-03-24 14:55:46', '2017-03-24 14:55:46'),
(147, NULL, 'ip', '222.112.215.142', '2017-03-24 14:55:46', '2017-03-24 14:55:46'),
(148, NULL, 'global', NULL, '2017-03-24 23:56:14', '2017-03-24 23:56:14'),
(149, NULL, 'ip', '222.112.215.142', '2017-03-24 23:56:14', '2017-03-24 23:56:14'),
(150, 24734402, 'user', NULL, '2017-03-24 23:56:14', '2017-03-24 23:56:14'),
(151, NULL, 'global', NULL, '2017-03-25 00:04:59', '2017-03-25 00:04:59'),
(152, NULL, 'ip', '222.112.215.142', '2017-03-25 00:04:59', '2017-03-25 00:04:59'),
(153, 24734402, 'user', NULL, '2017-03-25 00:04:59', '2017-03-25 00:04:59'),
(154, NULL, 'global', NULL, '2017-03-25 08:52:16', '2017-03-25 08:52:16'),
(155, NULL, 'ip', '172.58.105.247', '2017-03-25 08:52:16', '2017-03-25 08:52:16'),
(156, NULL, 'global', NULL, '2017-03-25 08:52:28', '2017-03-25 08:52:28'),
(157, NULL, 'ip', '172.58.105.247', '2017-03-25 08:52:28', '2017-03-25 08:52:28'),
(158, NULL, 'global', NULL, '2017-03-25 08:52:32', '2017-03-25 08:52:32'),
(159, NULL, 'ip', '172.58.105.247', '2017-03-25 08:52:32', '2017-03-25 08:52:32'),
(160, NULL, 'global', NULL, '2017-03-25 08:53:36', '2017-03-25 08:53:36'),
(161, NULL, 'ip', '67.10.17.128', '2017-03-25 08:53:36', '2017-03-25 08:53:36'),
(162, NULL, 'global', NULL, '2017-03-25 08:53:40', '2017-03-25 08:53:40'),
(163, NULL, 'ip', '67.10.17.128', '2017-03-25 08:53:40', '2017-03-25 08:53:40'),
(164, NULL, 'global', NULL, '2017-03-25 08:57:24', '2017-03-25 08:57:24'),
(165, NULL, 'ip', '67.10.17.128', '2017-03-25 08:57:24', '2017-03-25 08:57:24'),
(166, 24734412, 'user', NULL, '2017-03-25 08:57:24', '2017-03-25 08:57:24'),
(167, NULL, 'global', NULL, '2017-03-27 02:26:28', '2017-03-27 02:26:28'),
(168, NULL, 'ip', '222.112.215.142', '2017-03-27 02:26:28', '2017-03-27 02:26:28'),
(169, NULL, 'global', NULL, '2017-03-27 02:26:40', '2017-03-27 02:26:40'),
(170, NULL, 'ip', '222.112.215.142', '2017-03-27 02:26:40', '2017-03-27 02:26:40'),
(171, NULL, 'global', NULL, '2017-03-27 03:13:54', '2017-03-27 03:13:54'),
(172, NULL, 'ip', '222.112.215.142', '2017-03-27 03:13:54', '2017-03-27 03:13:54'),
(173, 24734402, 'user', NULL, '2017-03-27 03:13:54', '2017-03-27 03:13:54'),
(174, NULL, 'global', NULL, '2017-03-28 01:36:00', '2017-03-28 01:36:00'),
(175, NULL, 'ip', '222.112.215.142', '2017-03-28 01:36:00', '2017-03-28 01:36:00'),
(176, NULL, 'global', NULL, '2017-03-28 01:36:12', '2017-03-28 01:36:12'),
(177, NULL, 'ip', '222.112.215.142', '2017-03-28 01:36:12', '2017-03-28 01:36:12'),
(178, NULL, 'global', NULL, '2017-03-28 01:36:24', '2017-03-28 01:36:24'),
(179, NULL, 'ip', '222.112.215.142', '2017-03-28 01:36:24', '2017-03-28 01:36:24'),
(180, NULL, 'global', NULL, '2017-03-28 02:56:23', '2017-03-28 02:56:23'),
(181, NULL, 'ip', '222.112.215.142', '2017-03-28 02:56:23', '2017-03-28 02:56:23'),
(182, 24734402, 'user', NULL, '2017-03-28 02:56:23', '2017-03-28 02:56:23'),
(183, NULL, 'global', NULL, '2017-03-28 02:57:07', '2017-03-28 02:57:07'),
(184, NULL, 'ip', '222.112.215.142', '2017-03-28 02:57:07', '2017-03-28 02:57:07'),
(185, NULL, 'global', NULL, '2017-03-28 02:57:13', '2017-03-28 02:57:13'),
(186, NULL, 'ip', '222.112.215.142', '2017-03-28 02:57:13', '2017-03-28 02:57:13'),
(187, NULL, 'global', NULL, '2017-03-28 05:21:40', '2017-03-28 05:21:40'),
(188, NULL, 'ip', '222.112.215.142', '2017-03-28 05:21:40', '2017-03-28 05:21:40'),
(189, 24734407, 'user', NULL, '2017-03-28 05:21:40', '2017-03-28 05:21:40'),
(190, NULL, 'global', NULL, '2017-03-28 05:22:50', '2017-03-28 05:22:50'),
(191, NULL, 'ip', '222.112.215.142', '2017-03-28 05:22:50', '2017-03-28 05:22:50'),
(192, 24734407, 'user', NULL, '2017-03-28 05:22:50', '2017-03-28 05:22:50'),
(193, NULL, 'global', NULL, '2017-03-28 05:23:07', '2017-03-28 05:23:07'),
(194, NULL, 'ip', '222.112.215.142', '2017-03-28 05:23:07', '2017-03-28 05:23:07'),
(195, 24734407, 'user', NULL, '2017-03-28 05:23:07', '2017-03-28 05:23:07'),
(196, NULL, 'global', NULL, '2017-03-28 14:46:03', '2017-03-28 14:46:03'),
(197, NULL, 'ip', '180.150.157.8', '2017-03-28 14:46:03', '2017-03-28 14:46:03'),
(198, 24734395, 'user', NULL, '2017-03-28 14:46:03', '2017-03-28 14:46:03'),
(199, NULL, 'global', NULL, '2017-03-28 14:46:27', '2017-03-28 14:46:27'),
(200, NULL, 'ip', '180.150.157.8', '2017-03-28 14:46:27', '2017-03-28 14:46:27'),
(201, 24734395, 'user', NULL, '2017-03-28 14:46:27', '2017-03-28 14:46:27'),
(202, NULL, 'global', NULL, '2017-03-28 14:46:47', '2017-03-28 14:46:47'),
(203, NULL, 'ip', '180.150.157.8', '2017-03-28 14:46:47', '2017-03-28 14:46:47'),
(204, 24734395, 'user', NULL, '2017-03-28 14:46:47', '2017-03-28 14:46:47'),
(205, NULL, 'global', NULL, '2017-03-28 23:51:03', '2017-03-28 23:51:03'),
(206, NULL, 'ip', '206.190.157.239', '2017-03-28 23:51:03', '2017-03-28 23:51:03'),
(207, 24734407, 'user', NULL, '2017-03-28 23:51:03', '2017-03-28 23:51:03'),
(208, NULL, 'global', NULL, '2017-03-28 23:51:10', '2017-03-28 23:51:10'),
(209, NULL, 'ip', '206.190.157.239', '2017-03-28 23:51:10', '2017-03-28 23:51:10'),
(210, 24734407, 'user', NULL, '2017-03-28 23:51:10', '2017-03-28 23:51:10'),
(211, NULL, 'global', NULL, '2017-03-28 23:51:54', '2017-03-28 23:51:54'),
(212, NULL, 'ip', '222.112.215.142', '2017-03-28 23:51:54', '2017-03-28 23:51:54'),
(213, 24734407, 'user', NULL, '2017-03-28 23:51:54', '2017-03-28 23:51:54'),
(214, NULL, 'global', NULL, '2017-03-28 23:53:57', '2017-03-28 23:53:57'),
(215, NULL, 'ip', '222.112.215.142', '2017-03-28 23:53:57', '2017-03-28 23:53:57'),
(216, 24734407, 'user', NULL, '2017-03-28 23:53:57', '2017-03-28 23:53:57'),
(217, NULL, 'global', NULL, '2017-03-29 00:51:55', '2017-03-29 00:51:55'),
(218, NULL, 'ip', '222.112.215.142', '2017-03-29 00:51:55', '2017-03-29 00:51:55'),
(219, 24734421, 'user', NULL, '2017-03-29 00:51:55', '2017-03-29 00:51:55'),
(220, NULL, 'global', NULL, '2017-03-29 00:52:21', '2017-03-29 00:52:21'),
(221, NULL, 'ip', '222.112.215.142', '2017-03-29 00:52:21', '2017-03-29 00:52:21'),
(222, 24734421, 'user', NULL, '2017-03-29 00:52:21', '2017-03-29 00:52:21'),
(223, NULL, 'global', NULL, '2017-03-29 02:04:31', '2017-03-29 02:04:31'),
(224, NULL, 'ip', '206.190.157.239', '2017-03-29 02:04:31', '2017-03-29 02:04:31'),
(225, 24734421, 'user', NULL, '2017-03-29 02:04:31', '2017-03-29 02:04:31'),
(226, NULL, 'global', NULL, '2017-03-29 02:04:48', '2017-03-29 02:04:48'),
(227, NULL, 'ip', '206.190.157.239', '2017-03-29 02:04:48', '2017-03-29 02:04:48'),
(228, 24734407, 'user', NULL, '2017-03-29 02:04:48', '2017-03-29 02:04:48'),
(229, NULL, 'global', NULL, '2017-03-29 05:34:47', '2017-03-29 05:34:47'),
(230, NULL, 'ip', '222.112.215.142', '2017-03-29 05:34:47', '2017-03-29 05:34:47'),
(231, 24734402, 'user', NULL, '2017-03-29 05:34:47', '2017-03-29 05:34:47'),
(232, NULL, 'global', NULL, '2017-03-29 07:50:40', '2017-03-29 07:50:40'),
(233, NULL, 'ip', '180.150.157.38', '2017-03-29 07:50:40', '2017-03-29 07:50:40'),
(234, 24734407, 'user', NULL, '2017-03-29 07:50:40', '2017-03-29 07:50:40'),
(235, NULL, 'global', NULL, '2017-03-29 15:04:19', '2017-03-29 15:04:19'),
(236, NULL, 'ip', '206.190.157.239', '2017-03-29 15:04:19', '2017-03-29 15:04:19'),
(237, 24734421, 'user', NULL, '2017-03-29 15:04:19', '2017-03-29 15:04:19'),
(238, NULL, 'global', NULL, '2017-03-29 15:04:54', '2017-03-29 15:04:54'),
(239, NULL, 'ip', '206.190.157.239', '2017-03-29 15:04:54', '2017-03-29 15:04:54'),
(240, 24734407, 'user', NULL, '2017-03-29 15:04:54', '2017-03-29 15:04:54'),
(241, NULL, 'global', NULL, '2017-03-29 15:05:08', '2017-03-29 15:05:08'),
(242, NULL, 'ip', '206.190.157.239', '2017-03-29 15:05:08', '2017-03-29 15:05:08'),
(243, 24734407, 'user', NULL, '2017-03-29 15:05:08', '2017-03-29 15:05:08'),
(244, NULL, 'global', NULL, '2017-03-29 18:40:10', '2017-03-29 18:40:10'),
(245, NULL, 'ip', '222.112.215.142', '2017-03-29 18:40:10', '2017-03-29 18:40:10'),
(246, NULL, 'global', NULL, '2017-04-08 09:16:11', '2017-04-08 09:16:11'),
(247, NULL, 'ip', '192.168.1.224', '2017-04-08 09:16:11', '2017-04-08 09:16:11'),
(248, NULL, 'global', NULL, '2017-04-08 09:16:32', '2017-04-08 09:16:32'),
(249, NULL, 'ip', '192.168.1.224', '2017-04-08 09:16:32', '2017-04-08 09:16:32'),
(250, NULL, 'global', NULL, '2017-04-08 09:18:20', '2017-04-08 09:18:20'),
(251, NULL, 'ip', '192.168.1.224', '2017-04-08 09:18:20', '2017-04-08 09:18:20'),
(252, NULL, 'global', NULL, '2017-04-08 09:19:58', '2017-04-08 09:19:58'),
(253, NULL, 'ip', '192.168.1.224', '2017-04-08 09:19:58', '2017-04-08 09:19:58'),
(254, NULL, 'global', NULL, '2017-04-08 09:21:06', '2017-04-08 09:21:06'),
(255, NULL, 'ip', '192.168.1.224', '2017-04-08 09:21:06', '2017-04-08 09:21:06'),
(256, NULL, 'global', NULL, '2017-04-08 09:21:51', '2017-04-08 09:21:51'),
(257, NULL, 'ip', '192.168.1.224', '2017-04-08 09:21:51', '2017-04-08 09:21:51'),
(258, NULL, 'global', NULL, '2017-04-08 09:33:36', '2017-04-08 09:33:36'),
(259, NULL, 'ip', '192.168.1.224', '2017-04-08 09:33:36', '2017-04-08 09:33:36'),
(260, NULL, 'global', NULL, '2017-04-08 09:34:27', '2017-04-08 09:34:27'),
(261, NULL, 'ip', '192.168.1.224', '2017-04-08 09:34:27', '2017-04-08 09:34:27'),
(262, NULL, 'global', NULL, '2017-04-08 09:34:31', '2017-04-08 09:34:31'),
(263, NULL, 'ip', '192.168.1.224', '2017-04-08 09:34:31', '2017-04-08 09:34:31'),
(264, NULL, 'global', NULL, '2017-04-08 09:36:30', '2017-04-08 09:36:30'),
(265, NULL, 'ip', '192.168.1.224', '2017-04-08 09:36:30', '2017-04-08 09:36:30'),
(266, NULL, 'global', NULL, '2017-04-08 09:37:48', '2017-04-08 09:37:48'),
(267, NULL, 'ip', '192.168.1.224', '2017-04-08 09:37:48', '2017-04-08 09:37:48'),
(268, NULL, 'global', NULL, '2017-04-08 14:49:02', '2017-04-08 14:49:02'),
(269, NULL, 'ip', '192.168.1.224', '2017-04-08 14:49:02', '2017-04-08 14:49:02'),
(270, NULL, 'global', NULL, '2017-04-08 15:41:17', '2017-04-08 15:41:17'),
(271, NULL, 'ip', '192.168.1.224', '2017-04-08 15:41:17', '2017-04-08 15:41:17'),
(272, NULL, 'global', NULL, '2017-04-08 15:41:54', '2017-04-08 15:41:54'),
(273, NULL, 'ip', '192.168.1.224', '2017-04-08 15:41:54', '2017-04-08 15:41:54'),
(274, NULL, 'global', NULL, '2017-04-08 15:42:09', '2017-04-08 15:42:09'),
(275, NULL, 'ip', '192.168.1.224', '2017-04-08 15:42:09', '2017-04-08 15:42:09'),
(276, NULL, 'global', NULL, '2017-04-08 15:44:57', '2017-04-08 15:44:57'),
(277, NULL, 'ip', '192.168.1.224', '2017-04-08 15:44:57', '2017-04-08 15:44:57'),
(278, NULL, 'global', NULL, '2017-04-08 15:47:14', '2017-04-08 15:47:14'),
(279, NULL, 'ip', '192.168.1.224', '2017-04-08 15:47:14', '2017-04-08 15:47:14'),
(280, 24734436, 'user', NULL, '2017-04-08 15:47:14', '2017-04-08 15:47:14'),
(281, NULL, 'global', NULL, '2017-04-08 15:48:47', '2017-04-08 15:48:47'),
(282, NULL, 'ip', '192.168.1.224', '2017-04-08 15:48:47', '2017-04-08 15:48:47'),
(283, 24734436, 'user', NULL, '2017-04-08 15:48:47', '2017-04-08 15:48:47'),
(284, NULL, 'global', NULL, '2017-04-08 15:56:59', '2017-04-08 15:56:59'),
(285, NULL, 'ip', '192.168.1.224', '2017-04-08 15:56:59', '2017-04-08 15:56:59'),
(286, NULL, 'global', NULL, '2017-04-08 16:01:30', '2017-04-08 16:01:30'),
(287, NULL, 'ip', '192.168.1.224', '2017-04-08 16:01:30', '2017-04-08 16:01:30'),
(288, NULL, 'global', NULL, '2017-04-08 16:02:17', '2017-04-08 16:02:17'),
(289, NULL, 'ip', '192.168.1.224', '2017-04-08 16:02:17', '2017-04-08 16:02:17'),
(290, NULL, 'global', NULL, '2017-04-08 16:22:05', '2017-04-08 16:22:05'),
(291, NULL, 'ip', '192.168.1.224', '2017-04-08 16:22:05', '2017-04-08 16:22:05'),
(292, NULL, 'global', NULL, '2017-04-08 18:05:19', '2017-04-08 18:05:19'),
(293, NULL, 'ip', '192.168.1.14', '2017-04-08 18:05:19', '2017-04-08 18:05:19'),
(294, NULL, 'global', NULL, '2017-04-08 18:07:04', '2017-04-08 18:07:04'),
(295, NULL, 'ip', '192.168.1.14', '2017-04-08 18:07:04', '2017-04-08 18:07:04'),
(296, NULL, 'global', NULL, '2017-04-08 18:33:52', '2017-04-08 18:33:52'),
(297, NULL, 'ip', '192.168.1.224', '2017-04-08 18:33:52', '2017-04-08 18:33:52'),
(298, NULL, 'global', NULL, '2017-04-08 18:34:11', '2017-04-08 18:34:11'),
(299, NULL, 'ip', '192.168.1.14', '2017-04-08 18:34:11', '2017-04-08 18:34:11'),
(300, NULL, 'global', NULL, '2017-04-08 20:58:15', '2017-04-08 20:58:15'),
(301, NULL, 'ip', '192.168.1.14', '2017-04-08 20:58:15', '2017-04-08 20:58:15'),
(302, NULL, 'global', NULL, '2017-04-09 23:26:23', '2017-04-09 23:26:23'),
(303, NULL, 'ip', '192.168.1.14', '2017-04-09 23:26:23', '2017-04-09 23:26:23'),
(304, NULL, 'global', NULL, '2017-04-10 10:46:30', '2017-04-10 10:46:30'),
(305, NULL, 'ip', '192.168.1.224', '2017-04-10 10:46:30', '2017-04-10 10:46:30'),
(306, NULL, 'global', NULL, '2017-04-10 11:14:45', '2017-04-10 11:14:45'),
(307, NULL, 'ip', '192.168.1.224', '2017-04-10 11:14:45', '2017-04-10 11:14:45'),
(308, 24734443, 'user', NULL, '2017-04-10 11:14:45', '2017-04-10 11:14:45'),
(309, NULL, 'global', NULL, '2017-04-10 11:18:07', '2017-04-10 11:18:07'),
(310, NULL, 'ip', '192.168.1.224', '2017-04-10 11:18:07', '2017-04-10 11:18:07'),
(311, 24734443, 'user', NULL, '2017-04-10 11:18:07', '2017-04-10 11:18:07'),
(312, NULL, 'global', NULL, '2017-04-10 11:20:12', '2017-04-10 11:20:12'),
(313, NULL, 'ip', '192.168.1.224', '2017-04-10 11:20:12', '2017-04-10 11:20:12'),
(314, 24734443, 'user', NULL, '2017-04-10 11:20:12', '2017-04-10 11:20:12'),
(315, NULL, 'global', NULL, '2017-04-10 16:45:57', '2017-04-10 16:45:57'),
(316, NULL, 'ip', '192.168.1.224', '2017-04-10 16:45:57', '2017-04-10 16:45:57'),
(317, NULL, 'global', NULL, '2017-04-11 22:02:16', '2017-04-11 22:02:16'),
(318, NULL, 'ip', '192.168.1.224', '2017-04-11 22:02:16', '2017-04-11 22:02:16'),
(319, 24734447, 'user', NULL, '2017-04-11 22:02:16', '2017-04-11 22:02:16'),
(320, NULL, 'global', NULL, '2017-04-11 22:47:42', '2017-04-11 22:47:42'),
(321, NULL, 'ip', '192.168.1.224', '2017-04-11 22:47:42', '2017-04-11 22:47:42'),
(322, 24734447, 'user', NULL, '2017-04-11 22:47:42', '2017-04-11 22:47:42'),
(323, NULL, 'global', NULL, '2017-04-11 22:47:49', '2017-04-11 22:47:49'),
(324, NULL, 'ip', '192.168.1.224', '2017-04-11 22:47:49', '2017-04-11 22:47:49'),
(325, 24734447, 'user', NULL, '2017-04-11 22:47:49', '2017-04-11 22:47:49'),
(326, NULL, 'global', NULL, '2017-04-12 16:36:02', '2017-04-12 16:36:02'),
(327, NULL, 'ip', '192.168.1.224', '2017-04-12 16:36:02', '2017-04-12 16:36:02'),
(328, 24734447, 'user', NULL, '2017-04-12 16:36:02', '2017-04-12 16:36:02'),
(329, NULL, 'global', NULL, '2017-04-13 09:43:00', '2017-04-13 09:43:00'),
(330, NULL, 'ip', '192.168.1.144', '2017-04-13 09:43:00', '2017-04-13 09:43:00'),
(331, NULL, 'global', NULL, '2017-04-17 22:11:11', '2017-04-17 22:11:11'),
(332, NULL, 'ip', '192.168.1.15', '2017-04-17 22:11:11', '2017-04-17 22:11:11'),
(333, NULL, 'global', NULL, '2017-04-18 14:47:55', '2017-04-18 14:47:55'),
(334, NULL, 'ip', '192.168.1.144', '2017-04-18 14:47:55', '2017-04-18 14:47:55'),
(335, NULL, 'global', NULL, '2017-07-22 20:34:46', '2017-07-22 20:34:46'),
(336, NULL, 'ip', '192.168.1.251', '2017-07-22 20:34:46', '2017-07-22 20:34:46'),
(337, NULL, 'global', NULL, '2017-07-22 20:36:25', '2017-07-22 20:36:25'),
(338, NULL, 'ip', '192.168.1.251', '2017-07-22 20:36:25', '2017-07-22 20:36:25'),
(339, NULL, 'global', NULL, '2017-07-22 20:36:37', '2017-07-22 20:36:37'),
(340, NULL, 'ip', '192.168.1.251', '2017-07-22 20:36:37', '2017-07-22 20:36:37'),
(341, NULL, 'global', NULL, '2017-07-22 20:37:52', '2017-07-22 20:37:52'),
(342, NULL, 'ip', '192.168.1.251', '2017-07-22 20:37:52', '2017-07-22 20:37:52'),
(343, NULL, 'global', NULL, '2017-07-22 21:10:55', '2017-07-22 21:10:55'),
(344, NULL, 'ip', '192.168.1.251', '2017-07-22 21:10:55', '2017-07-22 21:10:55'),
(345, NULL, 'global', NULL, '2017-07-23 20:45:58', '2017-07-23 20:45:58'),
(346, NULL, 'ip', '192.168.1.249', '2017-07-23 20:45:58', '2017-07-23 20:45:58'),
(347, 24734463, 'user', NULL, '2017-07-23 20:45:58', '2017-07-23 20:45:58'),
(348, NULL, 'global', NULL, '2017-07-23 20:46:12', '2017-07-23 20:46:12'),
(349, NULL, 'ip', '192.168.1.249', '2017-07-23 20:46:12', '2017-07-23 20:46:12'),
(350, 24734463, 'user', NULL, '2017-07-23 20:46:12', '2017-07-23 20:46:12'),
(351, NULL, 'global', NULL, '2017-07-26 16:07:31', '2017-07-26 16:07:31'),
(352, NULL, 'ip', '45.56.159.54', '2017-07-26 16:07:31', '2017-07-26 16:07:31'),
(353, 24734465, 'user', NULL, '2017-07-26 16:07:31', '2017-07-26 16:07:31'),
(354, NULL, 'global', NULL, '2017-07-26 22:54:14', '2017-07-26 22:54:14'),
(355, NULL, 'ip', '180.150.157.47', '2017-07-26 22:54:14', '2017-07-26 22:54:14'),
(356, NULL, 'global', NULL, '2017-07-26 22:54:27', '2017-07-26 22:54:27'),
(357, NULL, 'ip', '180.150.157.47', '2017-07-26 22:54:27', '2017-07-26 22:54:27'),
(358, NULL, 'global', NULL, '2017-07-27 00:20:36', '2017-07-27 00:20:36'),
(359, NULL, 'ip', '67.10.0.214', '2017-07-27 00:20:36', '2017-07-27 00:20:36'),
(360, NULL, 'global', NULL, '2017-07-27 08:44:31', '2017-07-27 08:44:31'),
(361, NULL, 'ip', '180.150.157.47', '2017-07-27 08:44:31', '2017-07-27 08:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `locale_id` int(10) UNSIGNED NOT NULL,
  `translation_id` int(10) UNSIGNED DEFAULT NULL,
  `translation` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `created_at`, `updated_at`, `locale_id`, `translation_id`, `translation`) VALUES
(1, '2017-01-27 14:45:23', '2017-01-27 14:45:23', 1, NULL, 'Category'),
(2, '2017-01-27 14:47:48', '2017-01-27 14:47:48', 1, NULL, 'Translate me!'),
(4, '2017-01-27 14:58:50', '2017-01-27 14:58:50', 3, NULL, 'Category'),
(5, '2017-01-27 14:59:23', '2017-01-27 14:59:23', 4, NULL, 'Category'),
(6, '2017-01-27 15:04:38', '2017-01-27 15:04:38', 4, NULL, 'Translate me!'),
(7, '2017-01-27 06:41:13', '2017-01-27 06:41:13', 4, NULL, 'Our website also supports russian!'),
(8, '2017-01-27 06:41:14', '2017-01-27 06:41:14', 5, 7, 'Наш сайт также поддерживает русский!'),
(9, '2017-01-27 06:41:48', '2017-01-27 06:41:48', 5, 5, 'категория'),
(10, '2017-01-27 06:41:56', '2017-01-27 06:41:56', 3, 5, 'Category'),
(11, '2017-01-27 06:42:03', '2017-01-27 06:42:03', 4, NULL, 'hello'),
(12, '2017-01-27 06:42:03', '2017-01-27 06:42:03', 3, 11, 'hello'),
(13, '2017-01-27 06:42:09', '2017-01-27 06:42:09', 5, 11, 'привет'),
(14, '2017-01-27 06:42:22', '2017-01-27 06:42:22', 6, 11, 'ko'),
(15, '2017-01-27 06:42:40', '2017-01-27 06:42:40', 7, 11, 'مرحبا'),
(16, '2017-01-27 06:43:17', '2017-01-27 06:43:17', 8, 11, 'Hello'),
(17, '2017-01-27 06:43:40', '2017-01-27 06:43:40', 9, 11, 'ഹലോ'),
(18, '2017-01-27 06:43:58', '2017-01-27 06:43:58', 10, 11, 'hello'),
(19, '2017-01-27 06:44:10', '2017-01-27 06:44:10', 11, 11, '你好'),
(20, '2017-01-27 06:44:27', '2017-01-27 06:44:27', 4, NULL, 'We are super man.'),
(21, '2017-01-27 06:44:27', '2017-01-27 06:44:27', 11, 20, '我们是超男子。'),
(22, '2017-01-27 06:44:38', '2017-01-27 06:44:38', 3, 20, 'We are super man。'),
(23, '2017-01-27 06:44:50', '2017-01-27 06:44:50', 10, 20, 'Kami adalah manusia super.'),
(24, '2017-01-27 06:49:47', '2017-01-27 06:49:47', 12, 20, 'We are super man.'),
(25, '2017-01-27 15:56:01', '2017-01-27 15:56:01', 10, 5, 'kategori'),
(26, '2017-01-27 16:17:38', '2017-01-27 16:17:38', 1, 5, 'Category'),
(27, '2017-01-27 16:17:46', '2017-01-27 16:17:46', 13, 5, 'catégorie'),
(28, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 4, NULL, 'Dashboard'),
(29, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 13, 28, 'tableau de bord'),
(30, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 4, NULL, 'Staffs'),
(31, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 13, 30, 'Staffs'),
(32, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 4, NULL, 'Add Staffs'),
(33, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 13, 32, 'Ajouter Staffs'),
(34, '2017-01-27 16:22:25', '2017-01-27 16:22:25', 4, NULL, 'Delete Staffs'),
(35, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 13, 34, 'Supprimer Staffs'),
(36, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 4, NULL, 'Merchants'),
(37, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 13, 36, 'Merchants'),
(38, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 4, NULL, 'Deleted Merchants'),
(39, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 13, 38, 'Merchants supprimés'),
(40, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 4, NULL, 'Users'),
(41, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 13, 40, 'utilisateurs'),
(42, '2017-01-27 16:22:26', '2017-01-27 16:22:26', 4, NULL, 'Deleted Users'),
(43, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 13, 42, 'utilisateurs supprimés'),
(44, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 4, NULL, 'Top Advertises'),
(45, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 13, 44, 'Top Publie'),
(46, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 4, NULL, 'Middle Advertises'),
(47, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 13, 46, 'Moyen Publie'),
(48, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 4, NULL, 'Bottom Advertises'),
(49, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 13, 48, 'Publie bottom'),
(50, '2017-01-27 16:22:27', '2017-01-27 16:22:27', 4, NULL, 'Notifications'),
(51, '2017-01-27 16:22:28', '2017-01-27 16:22:28', 13, 50, 'Notifications'),
(52, '2017-01-27 16:22:28', '2017-01-27 16:22:28', 4, NULL, 'News'),
(53, '2017-01-27 16:22:28', '2017-01-27 16:22:28', 13, 52, 'nouvelles'),
(54, '2017-01-27 16:22:28', '2017-01-27 16:22:28', 4, NULL, 'Comments'),
(55, '2017-01-27 16:22:28', '2017-01-27 16:22:28', 13, 54, 'Commentaires'),
(56, '2017-01-27 16:22:28', '2017-01-27 16:22:28', 4, NULL, 'Reports'),
(57, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 13, 56, 'Rapports'),
(58, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 4, NULL, 'Sales Reports'),
(59, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 13, 58, 'Rapports de vente'),
(60, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 4, NULL, 'User Report'),
(61, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 13, 60, 'Rapport de l\'utilisateur'),
(62, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 4, NULL, 'Activity Report'),
(63, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 13, 62, 'Rapport d\'activité'),
(64, '2017-01-27 16:22:29', '2017-01-27 16:22:29', 4, NULL, 'Setting'),
(65, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 13, 64, 'réglage'),
(66, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 4, NULL, 'Cities'),
(67, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 13, 66, 'Villes'),
(68, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 4, NULL, 'Tags'),
(69, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 13, 68, 'Mots clés'),
(70, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 4, NULL, 'Third Party'),
(71, '2017-01-27 16:22:30', '2017-01-27 16:22:30', 13, 70, 'Third Party'),
(72, '2017-01-27 16:22:43', '2017-01-27 16:22:43', 11, 28, '仪表盘'),
(73, '2017-01-27 16:22:43', '2017-01-27 16:22:43', 11, 30, '员工'),
(74, '2017-01-27 16:22:43', '2017-01-27 16:22:43', 11, 32, '添加职员'),
(75, '2017-01-27 16:22:44', '2017-01-27 16:22:44', 11, 34, '删除职员'),
(76, '2017-01-27 16:22:44', '2017-01-27 16:22:44', 11, 36, '招商'),
(77, '2017-01-27 16:22:44', '2017-01-27 16:22:44', 11, 38, '招商已删除'),
(78, '2017-01-27 16:22:44', '2017-01-27 16:22:44', 11, 40, '用户'),
(79, '2017-01-27 16:22:45', '2017-01-27 16:22:45', 11, 42, '删除的用户'),
(80, '2017-01-27 16:22:45', '2017-01-27 16:22:45', 11, 44, '顶部通告'),
(81, '2017-01-27 16:22:45', '2017-01-27 16:22:45', 11, 46, '中东通告'),
(82, '2017-01-27 16:22:46', '2017-01-27 16:22:46', 11, 48, '底部发布'),
(83, '2017-01-27 16:22:46', '2017-01-27 16:22:46', 11, 50, '通知'),
(84, '2017-01-27 16:22:46', '2017-01-27 16:22:46', 11, 52, '新闻'),
(85, '2017-01-27 16:22:46', '2017-01-27 16:22:46', 11, 54, '评论'),
(86, '2017-01-27 16:22:47', '2017-01-27 16:22:47', 11, 56, '报告'),
(87, '2017-01-27 16:22:47', '2017-01-27 16:22:47', 11, 58, '销售报告'),
(88, '2017-01-27 16:22:47', '2017-01-27 16:22:47', 11, 60, '用户报告'),
(89, '2017-01-27 16:22:47', '2017-01-27 16:22:47', 11, 62, '活动报告'),
(90, '2017-01-27 16:22:48', '2017-01-27 16:22:48', 11, 64, '环境'),
(91, '2017-01-27 16:22:48', '2017-01-27 16:22:48', 11, 5, '类别'),
(92, '2017-01-27 16:22:48', '2017-01-27 16:22:48', 11, 66, '城市'),
(93, '2017-01-27 16:22:48', '2017-01-27 16:22:48', 11, 68, '标签'),
(94, '2017-01-27 16:22:49', '2017-01-27 16:22:49', 11, 70, '第三方'),
(95, '2017-01-27 16:23:01', '2017-01-27 16:23:01', 14, 28, 'Armaturenbrett'),
(96, '2017-01-27 16:23:01', '2017-01-27 16:23:01', 14, 30, 'Staffs'),
(97, '2017-01-27 16:23:02', '2017-01-27 16:23:02', 14, 32, 'In Staffs'),
(98, '2017-01-27 16:23:02', '2017-01-27 16:23:02', 14, 34, 'löschen Staffs'),
(99, '2017-01-27 16:23:02', '2017-01-27 16:23:02', 14, 36, 'Kaufleute'),
(100, '2017-01-27 16:23:02', '2017-01-27 16:23:02', 14, 38, 'Gelöschte Merchants'),
(101, '2017-01-27 16:23:03', '2017-01-27 16:23:03', 14, 40, 'Benutzer'),
(102, '2017-01-27 16:23:03', '2017-01-27 16:23:03', 14, 42, 'Entfernte Benutzer'),
(103, '2017-01-27 16:23:03', '2017-01-27 16:23:03', 14, 44, 'Top Reklamen'),
(104, '2017-01-27 16:23:03', '2017-01-27 16:23:03', 14, 46, 'Mittel Reklamen'),
(105, '2017-01-27 16:23:04', '2017-01-27 16:23:04', 14, 48, 'Bottom Reklamen'),
(106, '2017-01-27 16:23:04', '2017-01-27 16:23:04', 14, 50, 'Benachrichtigungen'),
(107, '2017-01-27 16:23:04', '2017-01-27 16:23:04', 14, 52, 'Nachrichten'),
(108, '2017-01-27 16:23:04', '2017-01-27 16:23:04', 14, 54, 'Kommentare'),
(109, '2017-01-27 16:23:05', '2017-01-27 16:23:05', 14, 56, 'Berichte'),
(110, '2017-01-27 16:23:08', '2017-01-27 16:23:08', 14, 58, 'Verkaufsberichte'),
(111, '2017-01-27 16:23:08', '2017-01-27 16:23:08', 14, 60, 'Anwenderbericht'),
(112, '2017-01-27 16:23:08', '2017-01-27 16:23:08', 14, 62, 'Tätigkeitsbericht'),
(113, '2017-01-27 16:23:09', '2017-01-27 16:23:09', 14, 64, 'Einstellung'),
(114, '2017-01-27 16:23:09', '2017-01-27 16:23:09', 14, 5, 'Kategorie'),
(115, '2017-01-27 16:23:09', '2017-01-27 16:23:09', 14, 66, 'Städte'),
(116, '2017-01-27 16:23:09', '2017-01-27 16:23:09', 14, 68, 'Stichworte'),
(117, '2017-01-27 16:23:10', '2017-01-27 16:23:10', 14, 70, 'Third Party'),
(118, '2017-01-27 16:23:19', '2017-01-27 16:23:19', 1, 28, 'Dashboard'),
(119, '2017-01-27 16:23:19', '2017-01-27 16:23:19', 1, 30, 'Staffs'),
(120, '2017-01-27 16:23:20', '2017-01-27 16:23:20', 1, 32, 'Add Staffs'),
(121, '2017-01-27 16:23:20', '2017-01-27 16:23:20', 1, 34, 'Delete Staffs'),
(122, '2017-01-27 16:23:20', '2017-01-27 16:23:20', 1, 36, 'Merchants'),
(123, '2017-01-27 16:23:21', '2017-01-27 16:23:21', 1, 38, 'Deleted Merchants'),
(124, '2017-01-27 16:23:21', '2017-01-27 16:23:21', 1, 40, 'Users'),
(125, '2017-01-27 16:23:22', '2017-01-27 16:23:22', 1, 42, 'Deleted Users'),
(126, '2017-01-27 16:23:23', '2017-01-27 16:23:23', 1, 44, 'Top Advertises'),
(127, '2017-01-27 16:23:23', '2017-01-27 16:23:23', 1, 46, 'Middle Advertises'),
(128, '2017-01-27 16:23:24', '2017-01-27 16:23:24', 1, 48, 'Bottom Advertises'),
(129, '2017-01-27 16:23:24', '2017-01-27 16:23:24', 1, 50, 'Notifications'),
(130, '2017-01-27 16:23:24', '2017-01-27 16:23:24', 1, 52, 'News'),
(131, '2017-01-27 16:23:24', '2017-01-27 16:23:24', 1, 54, 'Comments'),
(132, '2017-01-27 16:23:25', '2017-01-27 16:23:25', 1, 56, 'Reports'),
(133, '2017-01-27 16:23:25', '2017-01-27 16:23:25', 1, 58, 'Sales Reports'),
(134, '2017-01-27 16:23:26', '2017-01-27 16:23:26', 1, 60, 'User Report'),
(135, '2017-01-27 16:23:26', '2017-01-27 16:23:26', 1, 62, 'Activity Report'),
(136, '2017-01-27 16:23:27', '2017-01-27 16:23:27', 1, 64, 'Setting'),
(137, '2017-01-27 16:23:27', '2017-01-27 16:23:27', 1, 66, 'Cities'),
(138, '2017-01-27 16:23:27', '2017-01-27 16:23:27', 1, 68, 'Tags'),
(139, '2017-01-27 16:23:28', '2017-01-27 16:23:28', 1, 70, 'Third Party'),
(140, '2017-01-27 07:35:58', '2017-01-27 07:35:58', 4, NULL, 'Regions'),
(141, '2017-01-27 07:35:59', '2017-01-27 07:35:59', 1, 140, 'Regions'),
(142, '2017-01-27 07:35:59', '2017-01-27 07:35:59', 4, NULL, 'ID'),
(143, '2017-01-27 07:35:59', '2017-01-27 07:35:59', 1, 142, 'ID'),
(144, '2017-01-27 07:35:59', '2017-01-27 07:35:59', 4, NULL, 'Region Name'),
(145, '2017-01-27 07:36:00', '2017-01-27 07:36:00', 1, 144, 'Region Name'),
(146, '2017-01-27 07:36:00', '2017-01-27 07:36:00', 4, NULL, 'Created Date'),
(147, '2017-01-27 07:36:00', '2017-01-27 07:36:00', 1, 146, 'Created Date'),
(148, '2017-01-27 07:36:00', '2017-01-27 07:36:00', 4, NULL, 'Status'),
(149, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 1, 148, 'Status'),
(150, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 4, NULL, 'Edit'),
(151, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 1, 150, 'Edit'),
(152, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 4, NULL, 'Delete'),
(153, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 1, 152, 'Delete'),
(154, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 4, NULL, 'Add Region'),
(155, '2017-01-27 07:36:01', '2017-01-27 07:36:01', 1, 154, 'Add Region'),
(156, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 4, NULL, 'city name'),
(157, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 1, 156, 'City name'),
(158, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 4, NULL, 'Add'),
(159, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 1, 158, 'Add'),
(160, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 4, NULL, 'Cancel'),
(161, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 1, 160, 'Cancel'),
(162, '2017-01-27 07:36:02', '2017-01-27 07:36:02', 4, NULL, 'Notice!!!'),
(163, '2017-01-27 07:36:03', '2017-01-27 07:36:03', 1, 162, 'Notice !!!'),
(164, '2017-01-27 07:36:03', '2017-01-27 07:36:03', 4, NULL, 'Do you really want to delete this region?'),
(165, '2017-01-27 07:36:03', '2017-01-27 07:36:03', 1, 164, 'Do you really want to delete this region?'),
(166, '2017-01-27 07:36:03', '2017-01-27 07:36:03', 4, NULL, 'Please input a region.'),
(167, '2017-01-27 07:36:04', '2017-01-27 07:36:04', 1, 166, 'Please input a region.'),
(168, '2017-01-27 07:36:04', '2017-01-27 07:36:04', 4, NULL, 'OK'),
(169, '2017-01-27 07:36:04', '2017-01-27 07:36:04', 1, 168, 'OK'),
(170, '2017-01-27 07:36:04', '2017-01-27 07:36:04', 4, NULL, 'Do you really want to active this region?'),
(171, '2017-01-27 07:36:05', '2017-01-27 07:36:05', 1, 170, 'Do you really want to be active in this region?'),
(172, '2017-01-27 07:36:05', '2017-01-27 07:36:05', 4, NULL, 'Do you really want to inactive this region?'),
(173, '2017-01-27 07:36:05', '2017-01-27 07:36:05', 1, 172, 'Do you really want to inactive this region?'),
(174, '2017-01-27 07:36:05', '2017-01-27 07:36:05', 4, NULL, 'Save'),
(175, '2017-01-27 07:36:05', '2017-01-27 07:36:05', 1, 174, 'Save'),
(176, '2017-01-27 07:36:05', '2017-01-27 07:36:05', 4, NULL, 'Successfully deleted.'),
(177, '2017-01-27 07:36:06', '2017-01-27 07:36:06', 1, 176, 'Successfully deleted.'),
(178, '2017-01-27 07:36:06', '2017-01-27 07:36:06', 4, NULL, 'Please input city name.'),
(179, '2017-01-27 07:36:06', '2017-01-27 07:36:06', 1, 178, 'Please input city name.'),
(180, '2017-01-27 07:36:33', '2017-01-27 07:36:33', 13, 140, 'régions'),
(181, '2017-01-27 07:36:33', '2017-01-27 07:36:33', 13, 142, 'ID'),
(182, '2017-01-27 07:36:37', '2017-01-27 07:36:37', 13, 144, 'Nom Région'),
(183, '2017-01-27 07:36:37', '2017-01-27 07:36:37', 13, 146, 'date de création'),
(184, '2017-01-27 07:36:37', '2017-01-27 07:36:37', 13, 148, 'statut'),
(185, '2017-01-27 07:36:37', '2017-01-27 07:36:37', 13, 150, 'éditer'),
(186, '2017-01-27 07:36:38', '2017-01-27 07:36:38', 13, 152, 'effacer'),
(187, '2017-01-27 07:36:38', '2017-01-27 07:36:38', 13, 154, 'Ajouter Région'),
(188, '2017-01-27 07:36:38', '2017-01-27 07:36:38', 13, 156, 'nom de la ville'),
(189, '2017-01-27 07:36:39', '2017-01-27 07:36:39', 13, 158, 'ajouter'),
(190, '2017-01-27 07:36:39', '2017-01-27 07:36:39', 13, 160, 'annuler'),
(191, '2017-01-27 07:36:39', '2017-01-27 07:36:39', 13, 162, 'Remarquez !!!'),
(192, '2017-01-27 07:36:39', '2017-01-27 07:36:39', 13, 164, 'Voulez-vous vraiment supprimer cette région?'),
(193, '2017-01-27 07:36:40', '2017-01-27 07:36:40', 13, 166, 'Veuillez saisir une région.'),
(194, '2017-01-27 07:36:40', '2017-01-27 07:36:40', 13, 168, 'bien'),
(195, '2017-01-27 07:36:40', '2017-01-27 07:36:40', 13, 170, 'Voulez-vous vraiment actif cette région?'),
(196, '2017-01-27 07:36:41', '2017-01-27 07:36:41', 13, 172, 'Voulez-vous vraiment désactiver cette région?'),
(197, '2017-01-27 07:36:41', '2017-01-27 07:36:41', 13, 174, 'Sauvegarder'),
(198, '2017-01-27 07:36:41', '2017-01-27 07:36:41', 13, 176, 'A bien été supprimé.'),
(199, '2017-01-27 07:36:41', '2017-01-27 07:36:41', 13, 178, 'Please nom de la ville entrée.'),
(200, '2017-01-27 07:36:48', '2017-01-27 07:36:48', 4, NULL, 'Category Name'),
(201, '2017-01-27 07:36:48', '2017-01-27 07:36:48', 13, 200, 'Nom de la catégorie'),
(202, '2017-01-27 07:36:48', '2017-01-27 07:36:48', 4, NULL, 'Add Category'),
(203, '2017-01-27 07:36:48', '2017-01-27 07:36:48', 13, 202, 'Ajouter une catégorie'),
(204, '2017-01-27 07:36:48', '2017-01-27 07:36:48', 4, NULL, 'Do you really want to delete this category?'),
(205, '2017-01-27 07:36:48', '2017-01-27 07:36:48', 13, 204, 'Voulez-vous vraiment supprimer cette catégorie?'),
(206, '2017-01-27 07:36:49', '2017-01-27 07:36:49', 4, NULL, 'Please input a category.'),
(207, '2017-01-27 07:36:49', '2017-01-27 07:36:49', 13, 206, 'Veuillez saisir une catégorie.'),
(208, '2017-01-27 07:36:49', '2017-01-27 07:36:49', 4, NULL, 'Do you really want to active this category?'),
(209, '2017-01-27 07:36:49', '2017-01-27 07:36:49', 13, 208, 'Voulez-vous vraiment à l\'état actif de cette catégorie?'),
(210, '2017-01-27 07:36:49', '2017-01-27 07:36:49', 4, NULL, 'Do you really want to inactive this category?'),
(211, '2017-01-27 07:36:49', '2017-01-27 07:36:49', 13, 210, 'Voulez-vous vraiment désactiver cette catégorie?'),
(212, '2017-01-27 07:36:50', '2017-01-27 07:36:50', 4, NULL, 'Please input category name.'),
(213, '2017-01-27 07:36:50', '2017-01-27 07:36:50', 13, 212, 'Veuillez saisir le nom de la catégorie.'),
(214, '2017-01-27 07:37:52', '2017-01-27 07:37:52', 4, NULL, 'You have 3 notifications.'),
(215, '2017-01-27 07:37:52', '2017-01-27 07:37:52', 13, 214, 'Vous avez 3 notifications.'),
(216, '2017-01-27 09:36:03', '2017-01-27 09:36:03', 10, 130, 'Berita'),
(217, '2017-01-27 09:36:20', '2017-01-27 09:36:20', 10, 1, 'kategori'),
(218, '2017-01-27 09:36:20', '2017-01-27 09:36:20', 10, 118, 'Dashboard'),
(219, '2017-01-27 09:36:20', '2017-01-27 09:36:20', 10, 143, 'ID'),
(220, '2017-01-27 09:36:20', '2017-01-27 09:36:20', 1, NULL, 'Category Name'),
(221, '2017-01-27 09:36:21', '2017-01-27 09:36:21', 10, 220, 'kategori Nama'),
(222, '2017-01-27 09:36:21', '2017-01-27 09:36:21', 10, 147, 'Created Date'),
(223, '2017-01-27 09:36:21', '2017-01-27 09:36:21', 10, 149, 'status'),
(224, '2017-01-27 09:36:21', '2017-01-27 09:36:21', 10, 151, 'Edit'),
(225, '2017-01-27 09:36:22', '2017-01-27 09:36:22', 10, 153, 'Padam'),
(226, '2017-01-27 09:36:22', '2017-01-27 09:36:22', 1, NULL, 'Add Category'),
(227, '2017-01-27 09:36:22', '2017-01-27 09:36:22', 10, 226, 'Tambah Kategori'),
(228, '2017-01-27 09:36:22', '2017-01-27 09:36:22', 10, 159, 'Tambah'),
(229, '2017-01-27 09:36:23', '2017-01-27 09:36:23', 10, 161, 'Batal'),
(230, '2017-01-27 09:36:23', '2017-01-27 09:36:23', 1, NULL, 'Notice!!!'),
(231, '2017-01-27 09:36:23', '2017-01-27 09:36:23', 10, 230, 'Notis!!!'),
(232, '2017-01-27 09:36:23', '2017-01-27 09:36:23', 1, NULL, 'Do you really want to delete this category?'),
(233, '2017-01-27 09:36:23', '2017-01-27 09:36:23', 10, 232, 'Adakah anda pasti untuk memadam kategori ini?'),
(234, '2017-01-27 09:36:23', '2017-01-27 09:36:23', 1, NULL, 'Please input a category.'),
(235, '2017-01-27 09:36:24', '2017-01-27 09:36:24', 10, 234, 'Sila input kategori.'),
(236, '2017-01-27 09:36:24', '2017-01-27 09:36:24', 10, 169, 'okey'),
(237, '2017-01-27 09:36:24', '2017-01-27 09:36:24', 1, NULL, 'Do you really want to active this category?'),
(238, '2017-01-27 09:36:24', '2017-01-27 09:36:24', 10, 237, 'Adakah anda benar-benar mahu aktif Kategori ini?'),
(239, '2017-01-27 09:36:24', '2017-01-27 09:36:24', 1, NULL, 'Do you really want to inactive this category?'),
(240, '2017-01-27 09:36:25', '2017-01-27 09:36:25', 10, 239, 'Adakah anda benar-benar mahu tidak aktif kategori ini?'),
(241, '2017-01-27 09:36:25', '2017-01-27 09:36:25', 10, 175, 'Simpan'),
(242, '2017-01-27 09:36:25', '2017-01-27 09:36:25', 10, 177, 'Berjaya dipadamkan.'),
(243, '2017-01-27 09:36:25', '2017-01-27 09:36:25', 1, NULL, 'Please input category name.'),
(244, '2017-01-27 09:36:26', '2017-01-27 09:36:26', 10, 243, 'Sila nama kategori input.'),
(245, '2017-01-27 09:36:26', '2017-01-27 09:36:26', 1, NULL, 'OOLLAH Admin Panel'),
(246, '2017-01-27 09:36:26', '2017-01-27 09:36:26', 10, 245, 'OOLLAH Admin Panel'),
(247, '2017-01-27 09:36:26', '2017-01-27 09:36:26', 1, NULL, 'You have 3 notifications.'),
(248, '2017-01-27 09:36:26', '2017-01-27 09:36:26', 10, 247, 'Anda mempunyai 3 pemberitahuan.'),
(249, '2017-01-27 18:36:26', '2017-01-27 18:36:26', 1, NULL, 'My Profile'),
(250, '2017-01-27 18:36:27', '2017-01-27 18:36:27', 10, 249, 'Profil saya'),
(251, '2017-01-27 18:36:27', '2017-01-27 18:36:27', 1, NULL, 'Lock'),
(252, '2017-01-27 18:36:27', '2017-01-27 18:36:27', 10, 251, 'kunci'),
(253, '2017-01-27 18:36:27', '2017-01-27 18:36:27', 1, NULL, 'Log out'),
(254, '2017-01-27 18:36:27', '2017-01-27 18:36:27', 10, 253, 'Log keluar'),
(255, '2017-01-27 18:36:27', '2017-01-27 18:36:27', 10, 119, 'staf'),
(256, '2017-01-27 18:36:28', '2017-01-27 18:36:28', 10, 120, 'Tambahkan Staf'),
(257, '2017-01-27 18:36:28', '2017-01-27 18:36:28', 10, 121, 'Padam Staf'),
(258, '2017-01-27 18:36:28', '2017-01-27 18:36:28', 10, 122, 'Merchants'),
(259, '2017-01-27 18:36:29', '2017-01-27 18:36:29', 10, 123, 'Merchants dipadam'),
(260, '2017-01-27 18:36:29', '2017-01-27 18:36:29', 10, 124, 'pengguna'),
(261, '2017-01-27 18:36:29', '2017-01-27 18:36:29', 10, 125, 'Pengguna dipadam'),
(262, '2017-01-27 18:36:29', '2017-01-27 18:36:29', 10, 126, 'Top mengiklankan'),
(263, '2017-01-27 18:36:30', '2017-01-27 18:36:30', 10, 127, 'Tengah mengiklankan'),
(264, '2017-01-27 18:36:30', '2017-01-27 18:36:30', 10, 128, 'mengiklankan bottom'),
(265, '2017-01-27 18:36:30', '2017-01-27 18:36:30', 10, 129, 'Pemberitahuan'),
(266, '2017-01-27 18:36:30', '2017-01-27 18:36:30', 10, 131, 'Comments'),
(267, '2017-01-27 18:36:31', '2017-01-27 18:36:31', 10, 132, 'laporan'),
(268, '2017-01-27 18:36:31', '2017-01-27 18:36:31', 10, 133, 'jualan Laporan'),
(269, '2017-01-27 09:38:12', '2017-01-27 09:38:12', 1, NULL, 'View Today'),
(270, '2017-01-27 09:38:13', '2017-01-27 09:38:13', 10, 269, 'Lihat Today'),
(271, '2017-01-27 09:40:05', '2017-01-27 09:40:05', 1, NULL, 'Last Week'),
(272, '2017-01-27 09:40:05', '2017-01-27 09:40:05', 10, 271, 'Minggu lepas'),
(273, '2017-01-27 09:40:05', '2017-01-27 09:40:05', 1, NULL, 'Last Month'),
(274, '2017-01-27 09:40:06', '2017-01-27 09:40:06', 10, 273, 'Bulan lepas'),
(275, '2017-01-27 09:42:04', '2017-01-27 09:42:04', 1, NULL, 'Today Sales'),
(276, '2017-01-27 09:42:04', '2017-01-27 09:42:04', 10, 275, 'hari Jualan'),
(277, '2017-01-27 09:42:04', '2017-01-27 09:42:04', 1, NULL, 'Registered Users'),
(278, '2017-01-27 09:42:04', '2017-01-27 09:42:04', 10, 277, 'Pengguna berdaftar'),
(279, '2017-01-27 09:42:04', '2017-01-27 09:42:04', 1, NULL, 'Communication Load'),
(280, '2017-01-27 09:42:05', '2017-01-27 09:42:05', 10, 279, 'Komunikasi Beban'),
(281, '2017-01-27 09:42:05', '2017-01-27 09:42:05', 1, NULL, 'load on server'),
(282, '2017-01-27 09:42:05', '2017-01-27 09:42:05', 10, 281, 'beban pada pelayan'),
(283, '2017-01-27 09:44:14', '2017-01-27 09:44:14', 1, NULL, 'User Distributions'),
(284, '2017-01-27 09:44:14', '2017-01-27 09:44:14', 10, 283, 'Pengagihan pengguna'),
(285, '2017-01-27 09:44:14', '2017-01-27 09:44:14', 1, NULL, 'Sales Distributions'),
(286, '2017-01-27 09:44:14', '2017-01-27 09:44:14', 10, 285, 'jualan Pengagihan'),
(287, '2017-01-27 09:44:14', '2017-01-27 09:44:14', 1, NULL, 'Vectors Map'),
(288, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 10, 287, 'vektor Peta'),
(289, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 1, NULL, 'Collapse'),
(290, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 10, 289, 'Ditweet'),
(291, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 1, NULL, 'Refresh'),
(292, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 10, 291, 'Muat semula'),
(293, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 1, NULL, 'Configurations'),
(294, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 10, 293, 'konfigurasi'),
(295, '2017-01-27 09:44:15', '2017-01-27 09:44:15', 1, NULL, 'Fullscreen'),
(296, '2017-01-27 09:44:16', '2017-01-27 09:44:16', 10, 295, 'Skrin penuh'),
(297, '2017-01-27 09:46:49', '2017-01-27 09:46:49', 1, NULL, 'User Name'),
(298, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 10, 297, 'Nama pengguna'),
(299, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 1, NULL, 'E-mail'),
(300, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 10, 299, 'E-mel'),
(301, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 1, NULL, 'Gender'),
(302, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 10, 301, 'jantina'),
(303, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 1, NULL, 'Actions'),
(304, '2017-01-27 09:46:50', '2017-01-27 09:46:50', 10, 303, 'tindakan'),
(305, '2017-01-27 09:46:56', '2017-01-27 09:46:56', 1, NULL, 'Login'),
(306, '2017-01-27 09:46:56', '2017-01-27 09:46:56', 10, 305, 'Log masuk'),
(307, '2017-01-27 09:46:56', '2017-01-27 09:46:56', 1, NULL, 'Password'),
(308, '2017-01-27 09:46:56', '2017-01-27 09:46:56', 10, 307, 'kata laluan'),
(309, '2017-01-27 09:46:56', '2017-01-27 09:46:56', 1, NULL, 'Keep me logged in'),
(310, '2017-01-27 09:46:57', '2017-01-27 09:46:57', 10, 309, 'Biarkan saya kekal dilog masuk'),
(311, '2017-01-27 09:46:57', '2017-01-27 09:46:57', 1, NULL, 'Log in'),
(312, '2017-01-27 09:46:57', '2017-01-27 09:46:57', 10, 311, 'Log masuk'),
(313, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Staff Profile'),
(314, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Bio'),
(315, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Address'),
(316, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Group'),
(317, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'First Name'),
(318, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Last Name'),
(319, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Confirm Password'),
(320, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Birthday'),
(321, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Profile picture'),
(322, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Select Image'),
(323, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Change'),
(324, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Remove'),
(325, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'brief intro'),
(326, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'State'),
(327, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Postal Code'),
(328, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Previous'),
(329, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Next'),
(330, '2017-01-27 09:47:22', '2017-01-27 09:47:22', 1, NULL, 'Finish'),
(331, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Tag Name'),
(332, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Add Tag'),
(333, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Do you really want to delete this tag?'),
(334, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Please input a tag name.'),
(335, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Do you really want to active this tag?'),
(336, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Do you really want to inactive this tag?'),
(337, '2017-01-27 09:47:38', '2017-01-27 09:47:38', 1, NULL, 'Please input tag name.'),
(338, '2017-01-27 09:47:45', '2017-01-27 09:47:45', 13, 138, 'Mots clés'),
(339, '2017-01-27 09:47:45', '2017-01-27 09:47:45', 13, 118, 'Tableau de bord'),
(340, '2017-01-27 09:47:46', '2017-01-27 09:47:46', 13, 143, 'ID'),
(341, '2017-01-27 09:47:46', '2017-01-27 09:47:46', 13, 331, 'Nom du tag'),
(342, '2017-01-27 09:47:46', '2017-01-27 09:47:46', 13, 147, 'Date de création'),
(343, '2017-01-27 09:47:47', '2017-01-27 09:47:47', 13, 149, 'statut'),
(344, '2017-01-27 09:47:47', '2017-01-27 09:47:47', 13, 151, 'modifier'),
(345, '2017-01-27 09:47:47', '2017-01-27 09:47:47', 13, 153, 'Effacer'),
(346, '2017-01-27 09:47:47', '2017-01-27 09:47:47', 13, 332, 'Ajouter une étiquette'),
(347, '2017-01-27 09:47:48', '2017-01-27 09:47:48', 13, 159, 'Ajouter'),
(348, '2017-01-27 09:47:48', '2017-01-27 09:47:48', 13, 161, 'Annuler'),
(349, '2017-01-27 09:47:48', '2017-01-27 09:47:48', 13, 230, 'Avis!!!'),
(350, '2017-01-27 09:47:49', '2017-01-27 09:47:49', 13, 333, 'Voulez-vous vraiment supprimer cette balise?'),
(351, '2017-01-27 09:47:49', '2017-01-27 09:47:49', 13, 334, 'Veuillez saisir un nom de tag.'),
(352, '2017-01-27 09:47:49', '2017-01-27 09:47:49', 13, 169, 'D\'accord'),
(353, '2017-01-27 09:47:50', '2017-01-27 09:47:50', 13, 335, 'Voulez-vous vraiment activer cette balise?'),
(354, '2017-01-27 09:47:50', '2017-01-27 09:47:50', 13, 336, 'Voulez-vous vraiment désactiver cette balise?'),
(355, '2017-01-27 09:47:51', '2017-01-27 09:47:51', 13, 175, 'sauvegarder'),
(356, '2017-01-27 09:47:51', '2017-01-27 09:47:51', 13, 177, 'Supprimé avec succès.'),
(357, '2017-01-27 09:47:51', '2017-01-27 09:47:51', 13, 337, 'Veuillez saisir le nom du tag.'),
(358, '2017-01-27 09:47:52', '2017-01-27 09:47:52', 13, 245, 'Panneau d\'administration d\'OOLLAH'),
(359, '2017-01-27 09:47:52', '2017-01-27 09:47:52', 13, 247, 'Vous avez 3 notifications.'),
(360, '2017-01-27 18:47:53', '2017-01-27 18:47:53', 13, 249, 'Mon profil'),
(361, '2017-01-27 18:47:53', '2017-01-27 18:47:53', 13, 251, 'Bloquer'),
(362, '2017-01-27 18:47:54', '2017-01-27 18:47:54', 13, 253, 'Se déconnecter'),
(363, '2017-01-27 18:47:54', '2017-01-27 18:47:54', 13, 119, 'Personnel'),
(364, '2017-01-27 18:47:55', '2017-01-27 18:47:55', 13, 120, 'Ajouter Staffs'),
(365, '2017-01-27 18:47:55', '2017-01-27 18:47:55', 13, 121, 'Supprimer Staffs'),
(366, '2017-01-27 18:47:56', '2017-01-27 18:47:56', 13, 122, 'Commerçants'),
(367, '2017-01-27 18:47:56', '2017-01-27 18:47:56', 13, 123, 'Marchands supprimés'),
(368, '2017-01-27 18:47:57', '2017-01-27 18:47:57', 13, 124, 'Utilisateurs'),
(369, '2017-01-27 18:47:57', '2017-01-27 18:47:57', 13, 125, 'Utilisateurs supprimés'),
(370, '2017-01-27 18:47:57', '2017-01-27 18:47:57', 13, 126, 'Meilleures ventes'),
(371, '2017-01-27 18:47:58', '2017-01-27 18:47:58', 13, 127, 'Publicités moyennes'),
(372, '2017-01-27 18:47:58', '2017-01-27 18:47:58', 13, 128, 'Publie bottom'),
(373, '2017-01-27 18:47:59', '2017-01-27 18:47:59', 13, 129, 'Notifications'),
(374, '2017-01-27 18:47:59', '2017-01-27 18:47:59', 13, 130, 'Nouvelles'),
(375, '2017-01-27 18:47:59', '2017-01-27 18:47:59', 13, 131, 'commentaires'),
(376, '2017-01-27 18:48:00', '2017-01-27 18:48:00', 13, 132, 'Rapports'),
(377, '2017-01-27 18:48:00', '2017-01-27 18:48:00', 13, 133, 'Rapports de ventes'),
(378, '2017-01-27 18:48:00', '2017-01-27 18:48:00', 13, 1, 'Catégorie'),
(379, '2017-01-27 09:48:13', '2017-01-27 09:48:13', 3, 138, 'タグ'),
(380, '2017-01-27 09:48:13', '2017-01-27 09:48:13', 3, 118, 'ダッシュボード'),
(381, '2017-01-27 09:48:13', '2017-01-27 09:48:13', 3, 143, 'ID'),
(382, '2017-01-27 09:48:14', '2017-01-27 09:48:14', 3, 331, 'タグ名'),
(383, '2017-01-27 09:48:15', '2017-01-27 09:48:15', 3, 147, '作成日付'),
(384, '2017-01-27 09:48:15', '2017-01-27 09:48:15', 3, 149, '状態'),
(385, '2017-01-27 09:48:15', '2017-01-27 09:48:15', 3, 151, '編集'),
(386, '2017-01-27 09:48:15', '2017-01-27 09:48:15', 3, 153, '削除'),
(387, '2017-01-27 09:48:16', '2017-01-27 09:48:16', 3, 332, 'タグを追加'),
(388, '2017-01-27 09:48:16', '2017-01-27 09:48:16', 3, 159, '追加'),
(389, '2017-01-27 09:48:17', '2017-01-27 09:48:17', 3, 161, 'キャンセル'),
(390, '2017-01-27 09:48:17', '2017-01-27 09:48:17', 3, 230, '通知！！！'),
(391, '2017-01-27 09:48:18', '2017-01-27 09:48:18', 3, 333, '本当にこのタグを削除しますか？'),
(392, '2017-01-27 09:48:19', '2017-01-27 09:48:19', 3, 334, 'タグ名を入力してください。'),
(393, '2017-01-27 09:48:19', '2017-01-27 09:48:19', 3, 169, '[OK]'),
(394, '2017-01-27 09:48:19', '2017-01-27 09:48:19', 3, 335, '本当にこのタグを有効にしますか？'),
(395, '2017-01-27 09:48:20', '2017-01-27 09:48:20', 3, 336, 'あなたは本当にこのタグを非アクティブにしますか？'),
(396, '2017-01-27 09:48:21', '2017-01-27 09:48:21', 3, 175, 'セーブ'),
(397, '2017-01-27 09:48:21', '2017-01-27 09:48:21', 3, 177, '削除されました。'),
(398, '2017-01-27 09:48:21', '2017-01-27 09:48:21', 3, 337, 'タグ名を入力してください。'),
(399, '2017-01-27 09:48:22', '2017-01-27 09:48:22', 3, 245, 'OOLLAH管理パネル'),
(400, '2017-01-27 09:48:23', '2017-01-27 09:48:23', 3, 247, '3つの通知があります。'),
(401, '2017-01-27 18:48:23', '2017-01-27 18:48:23', 3, 249, '私のプロフィール'),
(402, '2017-01-27 18:48:23', '2017-01-27 18:48:23', 3, 251, 'ロック'),
(403, '2017-01-27 18:48:23', '2017-01-27 18:48:23', 3, 253, 'ログアウト'),
(404, '2017-01-27 18:48:24', '2017-01-27 18:48:24', 3, 119, 'スタッフ'),
(405, '2017-01-27 18:48:24', '2017-01-27 18:48:24', 3, 120, 'スタッフを追加する'),
(406, '2017-01-27 18:48:25', '2017-01-27 18:48:25', 3, 121, 'スタッフの削除'),
(407, '2017-01-27 18:48:26', '2017-01-27 18:48:26', 3, 122, '商人'),
(408, '2017-01-27 18:48:26', '2017-01-27 18:48:26', 3, 123, '削除された販売者'),
(409, '2017-01-27 18:48:26', '2017-01-27 18:48:26', 3, 124, 'ユーザー'),
(410, '2017-01-27 18:48:27', '2017-01-27 18:48:27', 3, 125, '削除されたユーザー'),
(411, '2017-01-27 18:48:27', '2017-01-27 18:48:27', 3, 126, 'トップ広告'),
(412, '2017-01-27 18:48:28', '2017-01-27 18:48:28', 3, 127, 'ミドル広告'),
(413, '2017-01-27 18:48:29', '2017-01-27 18:48:29', 3, 128, 'ボトム広告'),
(414, '2017-01-27 18:48:29', '2017-01-27 18:48:29', 3, 129, '通知'),
(415, '2017-01-27 18:48:29', '2017-01-27 18:48:29', 3, 130, 'ニュース'),
(416, '2017-01-27 18:48:29', '2017-01-27 18:48:29', 3, 131, 'コメント'),
(417, '2017-01-27 18:48:30', '2017-01-27 18:48:30', 3, 132, 'レポート'),
(418, '2017-01-27 18:48:30', '2017-01-27 18:48:30', 3, 133, '営業報告書'),
(419, '2017-01-27 18:48:31', '2017-01-27 18:48:31', 3, 1, 'カテゴリー'),
(420, '2017-01-27 18:50:30', '2017-01-27 18:50:30', 3, 134, 'ユーザーレポート'),
(421, '2017-01-27 18:50:30', '2017-01-27 18:50:30', 3, 135, '活動報告'),
(422, '2017-01-27 18:50:30', '2017-01-27 18:50:30', 3, 136, '設定'),
(423, '2017-01-27 18:50:30', '2017-01-27 18:50:30', 1, NULL, 'Re'),
(424, '2017-01-27 18:50:30', '2017-01-27 18:50:30', 3, 423, '再'),
(425, '2017-01-27 18:50:31', '2017-01-27 18:50:31', 3, 139, '第三者'),
(426, '2017-01-27 09:51:15', '2017-01-27 09:51:15', 11, 138, '标签'),
(427, '2017-01-27 09:51:15', '2017-01-27 09:51:15', 11, 118, '仪表板'),
(428, '2017-01-27 09:51:15', '2017-01-27 09:51:15', 11, 143, 'ID'),
(429, '2017-01-27 09:51:16', '2017-01-27 09:51:16', 11, 331, '标记名称'),
(430, '2017-01-27 09:51:16', '2017-01-27 09:51:16', 11, 147, '创建日期'),
(431, '2017-01-27 09:51:16', '2017-01-27 09:51:16', 11, 149, '状态'),
(432, '2017-01-27 09:51:17', '2017-01-27 09:51:17', 11, 151, '编辑'),
(433, '2017-01-27 09:51:17', '2017-01-27 09:51:17', 11, 153, '删除'),
(434, '2017-01-27 09:51:18', '2017-01-27 09:51:18', 11, 332, '添加标签'),
(435, '2017-01-27 09:51:18', '2017-01-27 09:51:18', 11, 159, '加'),
(436, '2017-01-27 09:51:18', '2017-01-27 09:51:18', 11, 161, '取消'),
(437, '2017-01-27 09:51:19', '2017-01-27 09:51:19', 11, 230, '注意！！！'),
(438, '2017-01-27 09:51:20', '2017-01-27 09:51:20', 11, 333, '您确定要删除此标记吗？'),
(439, '2017-01-27 09:51:20', '2017-01-27 09:51:20', 11, 334, '请输入标签名称。'),
(440, '2017-01-27 09:51:21', '2017-01-27 09:51:21', 11, 169, '好'),
(441, '2017-01-27 09:51:21', '2017-01-27 09:51:21', 11, 335, '您确定要启用此标记吗？'),
(442, '2017-01-27 09:51:22', '2017-01-27 09:51:22', 11, 336, '您确定要停用此标记吗？'),
(443, '2017-01-27 09:51:22', '2017-01-27 09:51:22', 11, 175, '保存'),
(444, '2017-01-27 09:51:23', '2017-01-27 09:51:23', 11, 177, '已成功删除。'),
(445, '2017-01-27 09:51:23', '2017-01-27 09:51:23', 11, 337, '请输入标记名称。'),
(446, '2017-01-27 09:51:23', '2017-01-27 09:51:23', 11, 245, 'OOLLAH管理面板'),
(447, '2017-01-27 09:51:24', '2017-01-27 09:51:24', 11, 247, '您有3个通知。'),
(448, '2017-01-27 18:51:24', '2017-01-27 18:51:24', 11, 249, '我的简历'),
(449, '2017-01-27 18:51:25', '2017-01-27 18:51:25', 11, 251, '锁'),
(450, '2017-01-27 18:51:25', '2017-01-27 18:51:25', 11, 253, '登出'),
(451, '2017-01-27 18:51:25', '2017-01-27 18:51:25', 11, 119, '员工'),
(452, '2017-01-27 18:51:26', '2017-01-27 18:51:26', 11, 120, '添加员工'),
(453, '2017-01-27 18:51:27', '2017-01-27 18:51:27', 11, 121, '删除员工'),
(454, '2017-01-27 18:51:27', '2017-01-27 18:51:27', 11, 122, '商人'),
(455, '2017-01-27 18:51:28', '2017-01-27 18:51:28', 11, 123, '已删除商家'),
(456, '2017-01-27 18:51:28', '2017-01-27 18:51:28', 11, 124, '用户'),
(457, '2017-01-27 18:51:29', '2017-01-27 18:51:29', 11, 125, '已删除用户'),
(458, '2017-01-27 18:51:29', '2017-01-27 18:51:29', 11, 126, '热门广告'),
(459, '2017-01-27 18:51:30', '2017-01-27 18:51:30', 11, 127, '中间广告'),
(460, '2017-01-27 18:51:30', '2017-01-27 18:51:30', 11, 128, '底部广告'),
(461, '2017-01-27 18:51:30', '2017-01-27 18:51:30', 11, 129, '通知'),
(462, '2017-01-27 18:51:31', '2017-01-27 18:51:31', 11, 130, '新闻'),
(463, '2017-01-27 18:51:31', '2017-01-27 18:51:31', 11, 131, '注释'),
(464, '2017-01-27 18:51:31', '2017-01-27 18:51:31', 11, 132, '报告'),
(465, '2017-01-27 18:51:32', '2017-01-27 18:51:32', 11, 133, '销售报告'),
(466, '2017-01-27 18:51:32', '2017-01-27 18:51:32', 11, 134, '用户报告'),
(467, '2017-01-27 18:51:33', '2017-01-27 18:51:33', 11, 135, '活动报告'),
(468, '2017-01-27 18:51:33', '2017-01-27 18:51:33', 11, 136, '设置'),
(469, '2017-01-27 18:51:33', '2017-01-27 18:51:33', 11, 1, '类别'),
(470, '2017-01-27 18:51:34', '2017-01-27 18:51:34', 11, 141, '地区'),
(471, '2017-01-27 18:51:35', '2017-01-27 18:51:35', 11, 139, '第三方'),
(472, '2017-01-27 09:51:47', '2017-01-27 09:51:47', 14, 138, 'Tags'),
(473, '2017-01-27 09:51:47', '2017-01-27 09:51:47', 14, 118, 'Instrumententafel'),
(474, '2017-01-27 09:51:47', '2017-01-27 09:51:47', 14, 143, 'ICH WÜRDE'),
(475, '2017-01-27 09:51:48', '2017-01-27 09:51:48', 14, 331, 'Verlinke den Namen'),
(476, '2017-01-27 09:51:48', '2017-01-27 09:51:48', 14, 147, 'Erstellungsdatum'),
(477, '2017-01-27 09:51:49', '2017-01-27 09:51:49', 14, 149, 'Status'),
(478, '2017-01-27 09:51:49', '2017-01-27 09:51:49', 14, 151, 'Bearbeiten'),
(479, '2017-01-27 09:51:49', '2017-01-27 09:51:49', 14, 153, 'Löschen'),
(480, '2017-01-27 09:51:50', '2017-01-27 09:51:50', 14, 332, 'Tag hinzufügen'),
(481, '2017-01-27 09:51:50', '2017-01-27 09:51:50', 14, 159, 'Hinzufügen'),
(482, '2017-01-27 09:51:50', '2017-01-27 09:51:50', 14, 161, 'Stornieren'),
(483, '2017-01-27 09:51:50', '2017-01-27 09:51:50', 14, 230, 'Beachten!!!'),
(484, '2017-01-27 09:51:51', '2017-01-27 09:51:51', 14, 333, 'Möchten Sie diesen Tag wirklich löschen?'),
(485, '2017-01-27 09:51:51', '2017-01-27 09:51:51', 14, 334, 'Geben Sie einen Tag-Namen ein.'),
(486, '2017-01-27 09:51:52', '2017-01-27 09:51:52', 14, 169, 'OK'),
(487, '2017-01-27 09:51:52', '2017-01-27 09:51:52', 14, 335, 'Möchten Sie diesen Tag wirklich aktivieren?'),
(488, '2017-01-27 09:51:53', '2017-01-27 09:51:53', 14, 336, 'Möchten Sie dieses Tag wirklich deaktivieren?'),
(489, '2017-01-27 09:51:53', '2017-01-27 09:51:53', 14, 175, 'sparen'),
(490, '2017-01-27 09:51:53', '2017-01-27 09:51:53', 14, 177, 'Gelöscht.'),
(491, '2017-01-27 09:51:54', '2017-01-27 09:51:54', 14, 337, 'Bitte geben Sie einen Tag-Namen ein.'),
(492, '2017-01-27 09:51:54', '2017-01-27 09:51:54', 14, 245, 'OOLLAH Admin-Bereich'),
(493, '2017-01-27 09:51:55', '2017-01-27 09:51:55', 14, 247, 'Sie haben 3 Benachrichtigungen.'),
(494, '2017-01-27 18:51:55', '2017-01-27 18:51:55', 14, 249, 'Mein Profil'),
(495, '2017-01-27 18:51:55', '2017-01-27 18:51:55', 14, 251, 'Sperren'),
(496, '2017-01-27 18:51:56', '2017-01-27 18:51:56', 14, 253, 'Ausloggen'),
(497, '2017-01-27 18:51:56', '2017-01-27 18:51:56', 14, 119, 'Mitarbeiter'),
(498, '2017-01-27 18:51:56', '2017-01-27 18:51:56', 14, 120, 'Mitarbeiter hinzufügen'),
(499, '2017-01-27 18:51:57', '2017-01-27 18:51:57', 14, 121, 'Stäbe löschen'),
(500, '2017-01-27 18:51:57', '2017-01-27 18:51:57', 14, 122, 'Kaufleute'),
(501, '2017-01-27 18:51:58', '2017-01-27 18:51:58', 14, 123, 'Deleted Merchants'),
(502, '2017-01-27 18:51:58', '2017-01-27 18:51:58', 14, 124, 'Benutzer'),
(503, '2017-01-27 18:51:59', '2017-01-27 18:51:59', 14, 125, 'Gelöschte Benutzer'),
(504, '2017-01-27 18:51:59', '2017-01-27 18:51:59', 14, 126, 'Top-Inserate'),
(505, '2017-01-27 18:52:00', '2017-01-27 18:52:00', 14, 127, 'Mittlere Anzeigen'),
(506, '2017-01-27 18:52:00', '2017-01-27 18:52:00', 14, 128, 'Unten Anzeigen'),
(507, '2017-01-27 18:52:00', '2017-01-27 18:52:00', 14, 129, 'Benachrichtigungen'),
(508, '2017-01-27 18:52:01', '2017-01-27 18:52:01', 14, 130, 'Nachrichten'),
(509, '2017-01-27 18:52:01', '2017-01-27 18:52:01', 14, 131, 'Bemerkungen'),
(510, '2017-01-27 18:52:01', '2017-01-27 18:52:01', 14, 132, 'Berichte'),
(511, '2017-01-27 18:52:02', '2017-01-27 18:52:02', 14, 133, 'Verkaufsberichte'),
(512, '2017-01-27 18:52:02', '2017-01-27 18:52:02', 14, 134, 'Benutzerbericht'),
(513, '2017-01-27 18:52:03', '2017-01-27 18:52:03', 14, 135, 'Aktivitätsbericht'),
(514, '2017-01-27 18:52:03', '2017-01-27 18:52:03', 14, 136, 'Rahmen'),
(515, '2017-01-27 18:52:03', '2017-01-27 18:52:03', 14, 1, 'Kategorie'),
(516, '2017-01-27 18:52:03', '2017-01-27 18:52:03', 14, 141, 'Regionen'),
(517, '2017-01-27 18:52:04', '2017-01-27 18:52:04', 14, 139, 'Dritte Seite'),
(518, '2017-01-27 11:26:21', '2017-01-27 11:26:21', 14, 269, 'Heute sehen'),
(519, '2017-01-27 11:26:21', '2017-01-27 11:26:21', 14, 271, 'Letzte Woche'),
(520, '2017-01-27 11:26:22', '2017-01-27 11:26:22', 14, 273, 'Im vergangenen Monat'),
(521, '2017-01-27 11:26:22', '2017-01-27 11:26:22', 14, 275, 'Heute Verkauf'),
(522, '2017-01-27 11:26:23', '2017-01-27 11:26:23', 14, 277, 'Registrierte Benutzer'),
(523, '2017-01-27 11:26:23', '2017-01-27 11:26:23', 14, 279, 'Kommunikationsbelastung'),
(524, '2017-01-27 11:26:24', '2017-01-27 11:26:24', 14, 281, 'Last auf dem Server'),
(525, '2017-01-27 11:26:24', '2017-01-27 11:26:24', 14, 283, 'Benutzerverteilungen'),
(526, '2017-01-27 11:26:24', '2017-01-27 11:26:24', 14, 285, 'Vertrieb Vertrieb'),
(527, '2017-01-27 11:26:25', '2017-01-27 11:26:25', 14, 287, 'Vektoren Karte'),
(528, '2017-01-27 11:26:25', '2017-01-27 11:26:25', 14, 289, 'Zusammenbruch'),
(529, '2017-01-27 11:26:25', '2017-01-27 11:26:25', 14, 291, 'Aktualisieren'),
(530, '2017-01-27 11:26:26', '2017-01-27 11:26:26', 14, 293, 'Konfigurationen'),
(531, '2017-01-27 11:26:26', '2017-01-27 11:26:26', 14, 295, 'Vollbild'),
(532, '2017-01-27 21:59:13', '2017-01-27 21:59:13', 13, 269, 'Voir aujourd\'hui'),
(533, '2017-01-27 21:59:13', '2017-01-27 21:59:13', 13, 271, 'La semaine dernière'),
(534, '2017-01-27 21:59:13', '2017-01-27 21:59:13', 13, 273, 'Le mois dernier'),
(535, '2017-01-27 21:59:14', '2017-01-27 21:59:14', 13, 275, 'Aujourd\'hui Ventes'),
(536, '2017-01-27 21:59:14', '2017-01-27 21:59:14', 13, 277, 'Utilisateurs enregistrés'),
(537, '2017-01-27 21:59:18', '2017-01-27 21:59:18', 13, 279, 'Charge de communication'),
(538, '2017-01-27 21:59:18', '2017-01-27 21:59:18', 13, 281, 'Chargement sur serveur'),
(539, '2017-01-27 21:59:19', '2017-01-27 21:59:19', 13, 283, 'Distributions des utilisateurs'),
(540, '2017-01-27 21:59:19', '2017-01-27 21:59:19', 13, 285, 'Distributions de ventes'),
(541, '2017-01-27 21:59:19', '2017-01-27 21:59:19', 13, 287, 'Vecteurs'),
(542, '2017-01-27 21:59:20', '2017-01-27 21:59:20', 13, 289, 'Effondrement'),
(543, '2017-01-27 21:59:20', '2017-01-27 21:59:20', 13, 291, 'Rafraîchir'),
(544, '2017-01-27 21:59:20', '2017-01-27 21:59:20', 13, 293, 'Configurations'),
(545, '2017-01-27 21:59:21', '2017-01-27 21:59:21', 13, 295, 'Plein écran'),
(546, '2017-01-28 06:59:25', '2017-01-28 06:59:25', 13, 134, 'Rapport utilisateur'),
(547, '2017-01-28 06:59:26', '2017-01-28 06:59:26', 13, 135, 'Rapport d\'activité'),
(548, '2017-01-28 06:59:26', '2017-01-28 06:59:26', 13, 136, 'Réglage'),
(549, '2017-01-28 06:59:26', '2017-01-28 06:59:26', 13, 141, 'Les régions'),
(550, '2017-01-28 06:59:27', '2017-01-28 06:59:27', 13, 139, 'Tierce personne'),
(551, '2017-01-27 21:59:35', '2017-01-27 21:59:35', 3, 269, '今日を表示'),
(552, '2017-01-27 21:59:35', '2017-01-27 21:59:35', 3, 271, '先週'),
(553, '2017-01-27 21:59:36', '2017-01-27 21:59:36', 3, 273, '先月'),
(554, '2017-01-27 21:59:36', '2017-01-27 21:59:36', 3, 275, '今日の販売'),
(555, '2017-01-27 21:59:37', '2017-01-27 21:59:37', 3, 277, '登録ユーザー'),
(556, '2017-01-27 21:59:38', '2017-01-27 21:59:38', 3, 279, '通信負荷'),
(557, '2017-01-27 21:59:38', '2017-01-27 21:59:38', 3, 281, 'サーバーへの負荷'),
(558, '2017-01-27 21:59:39', '2017-01-27 21:59:39', 3, 283, 'ユーザー分布'),
(559, '2017-01-27 21:59:40', '2017-01-27 21:59:40', 3, 285, '販売分布'),
(560, '2017-01-27 21:59:40', '2017-01-27 21:59:40', 3, 287, 'ベクトルマップ'),
(561, '2017-01-27 21:59:40', '2017-01-27 21:59:40', 3, 289, '崩壊'),
(562, '2017-01-27 21:59:41', '2017-01-27 21:59:41', 3, 291, 'リフレッシュ'),
(563, '2017-01-27 21:59:41', '2017-01-27 21:59:41', 3, 293, '構成'),
(564, '2017-01-27 21:59:41', '2017-01-27 21:59:41', 3, 295, '全画面表示'),
(565, '2017-01-28 06:59:47', '2017-01-28 06:59:47', 3, 141, '地域'),
(566, '2017-01-27 21:59:54', '2017-01-27 21:59:54', 11, 269, '今天查看'),
(567, '2017-01-27 21:59:55', '2017-01-27 21:59:55', 11, 271, '上个星期'),
(568, '2017-01-27 21:59:55', '2017-01-27 21:59:55', 11, 273, '上个月'),
(569, '2017-01-27 21:59:56', '2017-01-27 21:59:56', 11, 275, '今日销售'),
(570, '2017-01-27 21:59:57', '2017-01-27 21:59:57', 11, 277, '注册用户'),
(571, '2017-01-27 21:59:57', '2017-01-27 21:59:57', 11, 279, '通信负载'),
(572, '2017-01-27 21:59:58', '2017-01-27 21:59:58', 11, 281, '加载服务器'),
(573, '2017-01-27 21:59:58', '2017-01-27 21:59:58', 11, 283, '用户分发'),
(574, '2017-01-27 21:59:59', '2017-01-27 21:59:59', 11, 285, '销售分销'),
(575, '2017-01-27 21:59:59', '2017-01-27 21:59:59', 11, 287, '矢量地图'),
(576, '2017-01-27 21:59:59', '2017-01-27 21:59:59', 11, 289, '坍方'),
(577, '2017-01-27 21:59:59', '2017-01-27 21:59:59', 11, 291, '刷新'),
(578, '2017-01-27 22:00:00', '2017-01-27 22:00:00', 11, 293, '配置'),
(579, '2017-01-27 22:00:00', '2017-01-27 22:00:00', 11, 295, '全屏'),
(580, '2017-01-27 22:01:04', '2017-01-27 22:01:04', 1, NULL, 'OOLLAH'),
(581, '2017-01-27 22:07:50', '2017-01-27 22:07:50', 1, NULL, 'Verify'),
(582, '2017-01-27 22:12:19', '2017-01-27 22:12:19', 1, NULL, 'User Photo'),
(583, '2017-01-27 22:21:23', '2017-01-27 22:21:23', 1, NULL, 'Delete Users'),
(584, '2017-01-27 22:24:22', '2017-01-27 22:24:22', 1, NULL, 'Merchant Photo'),
(585, '2017-01-28 07:34:29', '2017-01-28 07:34:29', 1, NULL, 'Type'),
(586, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Type Name'),
(587, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Add Type'),
(588, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Do you really want to delete?'),
(589, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Please input a name.'),
(590, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Do you really want to active?'),
(591, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Do you really want to inactive?'),
(592, '2017-01-27 22:34:33', '2017-01-27 22:34:33', 1, NULL, 'Please input type name.'),
(593, '2017-01-27 22:44:00', '2017-01-27 22:44:00', 1, NULL, 'User Profile'),
(594, '2017-01-27 22:44:00', '2017-01-27 22:44:00', 1, NULL, 'Country'),
(595, '2017-01-27 23:10:29', '2017-01-27 23:10:29', 1, NULL, 'Merchant'),
(596, '2017-01-27 23:10:29', '2017-01-27 23:10:29', 1, NULL, 'Merchant Profile'),
(597, '2017-01-27 23:10:29', '2017-01-27 23:10:29', 1, NULL, 'Merchant Transaction'),
(598, '2017-01-27 23:15:48', '2017-01-27 23:15:48', 1, NULL, 'Notification Title'),
(599, '2017-01-27 23:15:48', '2017-01-27 23:15:48', 1, NULL, 'Notification Description'),
(600, '2017-01-27 23:16:32', '2017-01-27 23:16:32', 1, NULL, 'Do you really want to delete this notification?'),
(601, '2017-01-27 23:16:32', '2017-01-27 23:16:32', 1, NULL, 'Do you really want to active this notification?'),
(602, '2017-01-27 23:16:32', '2017-01-27 23:16:32', 1, NULL, 'Do you really want to inactive this notification?'),
(603, '2017-01-27 23:17:22', '2017-01-27 23:17:22', 1, NULL, 'Expired Date'),
(604, '2017-01-27 23:17:34', '2017-01-27 23:17:34', 1, NULL, 'Edit Notification'),
(605, '2017-01-27 23:17:58', '2017-01-27 23:17:58', 1, NULL, 'Update Notification'),
(606, '2017-01-27 23:21:01', '2017-01-27 23:21:01', 1, NULL, 'Add Notification'),
(607, '2017-01-27 23:21:10', '2017-01-27 23:21:10', 1, NULL, 'Notification Detail'),
(608, '2017-01-27 23:21:10', '2017-01-27 23:21:10', 1, NULL, 'Back'),
(609, '2017-01-27 23:26:39', '2017-01-27 23:26:39', 1, NULL, 'Title'),
(610, '2017-01-27 23:26:39', '2017-01-27 23:26:39', 1, NULL, 'Description'),
(611, '2017-01-27 23:26:39', '2017-01-27 23:26:39', 1, NULL, 'News Image'),
(612, '2017-01-27 23:26:39', '2017-01-27 23:26:39', 1, NULL, 'Favorites'),
(613, '2017-01-27 23:29:12', '2017-01-27 23:29:12', 1, NULL, 'News Detail'),
(614, '2017-01-27 23:29:12', '2017-01-27 23:29:12', 1, NULL, 'News Comments'),
(615, '2017-01-27 23:29:12', '2017-01-27 23:29:12', 1, NULL, 'News Title'),
(616, '2017-01-27 23:29:12', '2017-01-27 23:29:12', 1, NULL, 'News Description'),
(617, '2017-01-27 23:29:12', '2017-01-27 23:29:12', 1, NULL, 'News Photo'),
(618, '2017-01-27 23:32:07', '2017-01-27 23:32:07', 1, NULL, 'NO'),
(619, '2017-01-27 23:32:07', '2017-01-27 23:32:07', 1, NULL, 'Comment'),
(620, '2017-01-27 23:37:21', '2017-01-27 23:37:21', 1, NULL, 'Do you really want to active this region?'),
(621, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'Third Part Name'),
(622, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'App ID'),
(623, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'Secret'),
(624, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'API Key'),
(625, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'Do you want to delete?'),
(626, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'Do you want to active?'),
(627, '2017-01-27 23:38:04', '2017-01-27 23:38:04', 1, NULL, 'Do you want to inactive?'),
(628, '2017-01-27 23:38:20', '2017-01-27 23:38:20', 1, NULL, 'Third Party Name'),
(629, '2017-01-27 23:38:20', '2017-01-27 23:38:20', 1, NULL, 'Third Party Secret'),
(630, '2017-01-27 23:38:20', '2017-01-27 23:38:20', 1, NULL, 'Third Party API Key'),
(631, '2017-01-27 23:38:20', '2017-01-27 23:38:20', 1, NULL, 'Update'),
(632, '2017-01-28 00:06:41', '2017-01-28 00:06:41', 1, NULL, 'Payer ID'),
(633, '2017-01-28 00:06:41', '2017-01-28 00:06:41', 1, NULL, 'Transaction ID'),
(634, '2017-01-28 00:06:41', '2017-01-28 00:06:41', 1, NULL, 'Amount'),
(635, '2017-01-28 00:06:41', '2017-01-28 00:06:41', 1, NULL, 'Fee'),
(636, '2017-01-28 00:06:42', '2017-01-28 00:06:42', 1, NULL, 'Currency'),
(637, '2017-01-28 00:06:42', '2017-01-28 00:06:42', 1, NULL, 'Transaction Date'),
(638, '2017-01-28 15:11:08', '2017-01-28 15:11:08', 1, NULL, 'Products'),
(639, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Start Date'),
(640, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'End Date'),
(641, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Claim Redeem'),
(642, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Claimed'),
(643, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Price(USD)'),
(644, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Discount(USD)'),
(645, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Location'),
(646, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Region'),
(647, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Like'),
(648, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Dislike'),
(649, '2017-01-28 06:28:10', '2017-01-28 06:28:10', 1, NULL, 'Favorite'),
(650, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Detail'),
(651, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Claimed Redeems'),
(652, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Name'),
(653, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Price'),
(654, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'QR Code'),
(655, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Type'),
(656, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Starting Date'),
(657, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Ending Date'),
(658, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Region'),
(659, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Address');
INSERT INTO `translations` (`id`, `created_at`, `updated_at`, `locale_id`, `translation_id`, `translation`) VALUES
(660, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Claimed Redeem'),
(661, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Likes'),
(662, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Dislikes'),
(663, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Active Status'),
(664, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Description'),
(665, '2017-01-28 20:18:35', '2017-01-28 20:18:35', 1, NULL, 'Product Photos'),
(666, '2017-01-28 20:19:53', '2017-01-28 20:19:53', 1, NULL, 'User Email'),
(667, '2017-01-29 07:39:46', '2017-01-29 07:39:46', 1, NULL, 'Advertisements'),
(668, '2017-01-28 22:41:31', '2017-01-28 22:41:31', 1, NULL, 'Advertisement Title'),
(669, '2017-01-28 22:41:31', '2017-01-28 22:41:31', 1, NULL, 'Advertisement Description'),
(670, '2017-01-28 22:45:46', '2017-01-28 22:45:46', 1, NULL, 'Advertisement Detail'),
(671, '2017-01-28 22:45:46', '2017-01-28 22:45:46', 1, NULL, 'Edit Advertisement'),
(672, '2017-01-28 22:46:03', '2017-01-28 22:46:03', 1, NULL, 'Update Advertisement'),
(673, '2017-01-28 22:46:12', '2017-01-28 22:46:12', 1, NULL, 'Add Advertisement'),
(674, '2017-01-29 08:55:23', '2017-01-29 08:55:23', 1, NULL, 'Merchant Plan'),
(675, '2017-01-28 23:55:28', '2017-01-28 23:55:28', 1, NULL, 'Plan Name'),
(676, '2017-01-28 23:55:28', '2017-01-28 23:55:28', 1, NULL, 'Plan Unit'),
(677, '2017-01-28 23:55:28', '2017-01-28 23:55:28', 1, NULL, 'Plan Price'),
(678, '2017-01-28 23:55:28', '2017-01-28 23:55:28', 1, NULL, 'Please input plan name.'),
(679, '2017-01-28 23:55:28', '2017-01-28 23:55:28', 1, NULL, 'Please input plan price.'),
(680, '2017-01-29 00:07:01', '2017-01-29 00:07:01', 1, NULL, 'Plan Price (USD)'),
(681, '2017-01-29 00:31:10', '2017-01-29 00:31:10', 1, NULL, 'Current Location'),
(682, '2017-01-29 00:32:36', '2017-01-29 00:32:36', 1, NULL, 'Merchant Verified'),
(683, '2017-01-29 03:25:05', '2017-01-29 03:25:05', 1, NULL, 'Successfully deleted'),
(684, '2017-01-29 03:33:57', '2017-01-29 03:33:57', 1, NULL, 'Verify Date'),
(685, '2017-01-29 12:54:03', '2017-01-29 12:54:03', 1, NULL, 'Cliamed Redeems'),
(686, '2017-01-29 12:54:03', '2017-01-29 12:54:03', 1, NULL, 'Favorited Products'),
(687, '2017-01-29 04:02:07', '2017-01-29 04:02:07', 1, NULL, 'Favorite User'),
(688, '2017-01-29 04:12:50', '2017-01-29 04:12:50', 1, NULL, 'Claimed User'),
(689, '2017-01-29 05:01:51', '2017-01-29 05:01:51', 1, NULL, 'Advertisement Photo'),
(690, '2017-02-25 14:02:24', '2017-02-25 14:02:24', 1, NULL, 'Change Password'),
(691, '2017-02-25 14:02:24', '2017-02-25 14:02:24', 1, NULL, 'Submit'),
(692, '2017-02-25 14:02:24', '2017-02-25 14:02:24', 1, NULL, 'Reset'),
(693, '2017-02-25 14:02:24', '2017-02-25 14:02:24', 1, NULL, 'password reset successful'),
(694, '2017-02-25 14:02:24', '2017-02-25 14:02:24', 1, NULL, 'error in password reset'),
(695, '2017-02-25 14:02:24', '2017-02-25 14:02:24', 1, NULL, 'password and password confirm does not match'),
(696, '2017-03-07 23:09:58', '2017-03-07 23:09:58', 1, NULL, 'Request Merchant'),
(697, '2017-03-07 14:53:53', '2017-03-07 14:53:53', 11, 580, 'OOLLAH'),
(698, '2017-03-07 23:53:59', '2017-03-07 23:53:59', 11, 696, '请求商家'),
(699, '2017-03-07 23:54:00', '2017-03-07 23:54:00', 11, 638, '产品'),
(700, '2017-03-07 23:54:01', '2017-03-07 23:54:01', 11, 685, 'Cliamed兑换'),
(701, '2017-03-07 23:54:02', '2017-03-07 23:54:02', 11, 686, '收藏产品'),
(702, '2017-03-07 23:54:04', '2017-03-07 23:54:04', 11, 667, '广告'),
(703, '2017-03-07 23:54:08', '2017-03-07 23:54:08', 11, 674, '商家计划'),
(704, '2017-03-07 23:54:08', '2017-03-07 23:54:08', 11, 585, '类型'),
(705, '2017-03-16 15:42:38', '2017-03-16 15:42:38', 1, NULL, 'Lock Screen'),
(706, '2017-03-16 15:42:38', '2017-03-16 15:42:38', 1, NULL, 'Administrator'),
(707, '2017-03-16 15:42:38', '2017-03-16 15:42:38', 1, NULL, 'GO'),
(708, '2017-03-17 00:16:43', '2017-03-17 00:16:43', 1, NULL, 'Package Name'),
(709, '2017-03-17 00:16:43', '2017-03-17 00:16:43', 1, NULL, 'Package Expired'),
(710, '2017-03-17 00:16:43', '2017-03-17 00:16:43', 1, NULL, 'Package Price (USD)'),
(711, '2017-03-17 00:16:54', '2017-03-17 00:16:54', 1, NULL, 'Featured'),
(712, '2017-03-18 22:51:04', '2017-03-18 22:51:04', 1, NULL, 'XCOLTAPTT Admin Panel'),
(713, '2017-03-18 22:53:00', '2017-03-18 22:53:00', 1, NULL, 'XCOLTAPTT'),
(714, '2017-03-19 09:30:29', '2017-03-19 09:30:29', 1, NULL, 'Contact'),
(715, '2017-03-19 09:30:29', '2017-03-19 09:30:29', 1, NULL, 'Record History'),
(716, '2017-03-19 03:56:32', '2017-03-19 03:56:32', 1, NULL, 'Add User'),
(717, '2017-03-19 07:41:46', '2017-03-19 07:41:46', 1, NULL, 'Phone'),
(718, '2017-03-19 09:07:05', '2017-03-19 09:07:05', 1, NULL, 'Contacted User'),
(719, '2017-03-19 09:07:05', '2017-03-19 09:07:05', 1, NULL, 'Contacted Date'),
(720, '2017-03-19 15:26:17', '2017-03-19 15:26:17', 1, NULL, 'user1 '),
(721, '2017-03-19 15:26:34', '2017-03-19 15:26:34', 1, NULL, 'test70 test'),
(722, '2017-03-20 02:49:14', '2017-03-20 02:49:14', 1, NULL, 'Master User'),
(723, '2017-03-20 05:22:15', '2017-03-20 05:22:15', 1, NULL, 'History'),
(724, '2017-03-20 05:22:15', '2017-03-20 05:22:15', 1, NULL, 'Send User'),
(725, '2017-03-20 05:22:15', '2017-03-20 05:22:15', 1, NULL, 'Receive User'),
(726, '2017-03-20 05:28:56', '2017-03-20 05:28:56', 1, NULL, 'RealName'),
(727, '2017-03-20 05:28:56', '2017-03-20 05:28:56', 1, NULL, 'FileName'),
(728, '2017-03-20 06:55:40', '2017-03-20 06:55:40', 1, NULL, 'aa1 bb'),
(729, '2017-03-23 04:24:53', '2017-03-23 04:24:53', 1, NULL, 'first1 last1'),
(730, '2017-03-23 05:01:59', '2017-03-23 05:01:59', 1, NULL, 'qqq www'),
(731, '2017-03-23 05:36:57', '2017-03-23 05:36:57', 1, NULL, 'www see'),
(732, '2017-03-23 14:34:59', '2017-03-23 14:34:59', 1, NULL, 'www test'),
(733, '2017-03-23 14:53:24', '2017-03-23 14:53:24', 1, NULL, 'Edit Staff'),
(734, '2017-03-23 14:53:24', '2017-03-23 14:53:24', 1, NULL, 'If you don\'t want to change password... please leave them empty'),
(735, '2017-03-24 02:56:08', '2017-03-24 02:56:08', 1, NULL, 'fist1 last123'),
(736, '2017-03-24 03:36:20', '2017-03-24 03:36:20', 1, NULL, 'fist1 last1'),
(737, '2017-03-24 09:00:03', '2017-03-24 09:00:03', 1, NULL, 'roge fern'),
(738, '2017-03-24 14:33:03', '2017-03-24 14:33:03', 1, NULL, 'Xie Lang'),
(739, '2017-03-24 16:05:26', '2017-03-24 16:05:26', 1, NULL, 'Song Ming'),
(740, '2017-03-25 03:36:53', '2017-03-25 03:36:53', 1, NULL, 'simon ronaldo'),
(741, '2017-03-28 20:59:00', '2017-03-28 20:59:00', 1, NULL, 'Contact Group'),
(742, '2017-03-28 20:59:00', '2017-03-28 20:59:00', 1, NULL, 'Record Group'),
(743, '2017-03-28 13:40:08', '2017-03-28 13:40:08', 1, NULL, 'ContactGroup'),
(744, '2017-03-28 13:40:08', '2017-03-28 13:40:08', 1, NULL, 'Contacted Group'),
(745, '2017-03-28 13:40:08', '2017-03-28 13:40:08', 1, NULL, 'Group Members'),
(746, '2017-03-28 14:15:08', '2017-03-28 14:15:08', 1, NULL, 'HistoryGroup'),
(747, '2017-03-28 14:15:08', '2017-03-28 14:15:08', 1, NULL, 'Group Record History'),
(748, '2017-03-28 14:15:08', '2017-03-28 14:15:08', 1, NULL, 'Group Name'),
(749, '2017-03-28 15:40:40', '2017-03-28 15:40:40', 1, NULL, '123 123'),
(750, '2017-04-10 16:45:53', '2017-04-10 16:45:53', 1, NULL, 'STRANGERR'),
(751, '2017-04-11 02:57:32', '2017-04-11 02:57:32', 1, NULL, 'Invite History');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privilege` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilege_r` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilege_w` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `lon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `birthday` date DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `privilege`, `privilege_r`, `privilege_w`, `password`, `lat`, `lon`, `pic`, `login_status`, `last_login`, `gender`, `country`, `state`, `city`, `address`, `permissions`, `deleted_at`, `created_at`, `updated_at`, `bio`, `birthday`, `postal`, `first_name`, `last_name`, `dob`) VALUES
(24734446, 'admin@admin.com', NULL, '', '', '', '$2y$10$AW/BuT3Lu.SHPxDEPwwTRuGzsRvwwH9Mv1PvsusseXjPfXeZCuLre', '', '', NULL, NULL, '2017-07-28 14:15:21', NULL, '', '', '', '', NULL, NULL, '2017-04-10 16:50:17', '2017-07-28 14:15:21', NULL, NULL, NULL, 'Admin', '', NULL),
(24734472, 'black@gmail.com', NULL, '', '', '', '$2y$10$oqutxBxiiH/Y8IKBvDg7Cek5OzuAIKJv3FDme8YPc62Li6BLy/v.y', '0', '0', NULL, NULL, '2017-07-27 08:43:05', NULL, '', '', '', '', NULL, NULL, '2017-07-26 23:07:55', '2017-07-27 08:43:05', NULL, NULL, NULL, NULL, NULL, NULL),
(24734473, 'elrogeliomayor@hotmail.com', NULL, '', '', '', '$2y$10$FDkROkPNE0/a2uhGn1umEe1CJznk1fhQWpTP0z4AzyfXPEOm.81Ee', '0', '0', NULL, NULL, '2017-07-28 05:30:26', NULL, '', '', '', '', NULL, NULL, '2017-07-27 00:20:58', '2017-07-28 05:30:26', NULL, NULL, NULL, NULL, NULL, NULL),
(24734474, '273506@business.com', NULL, '', '', '', '$2y$10$1hFZ.mXdwTo6smMJeK7OUOO6H7XpITLqfnCgXQlHD05MKcPH5rsk6', '0', '0', NULL, NULL, '2017-07-27 09:51:32', NULL, '', '', '', '', NULL, NULL, '2017-07-27 07:02:49', '2017-07-27 09:51:32', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weebie_fcm`
--

CREATE TABLE `weebie_fcm` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) NOT NULL,
  `device_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weebie_fcm`
--

INSERT INTO `weebie_fcm` (`id`, `userid`, `device_token`, `created_at`, `updated_at`) VALUES
(12, 24734442, '123', '2017-04-09 02:33:52', '0000-00-00 00:00:00'),
(13, 24734443, 'dsBRWAAxfLs:APA91bFowsD0bSQARoi6ITjZpVxzbrRqAgoPrFbMQKXpvZKqmb2fFbTAfpg1w6yxfKDJBbX-voieEI0Y7LSLpJrpf5AL2H_St80D4cEr1i6UvKMg4ym459oMo8unnTQfOQYMCfCjOEKW', '2017-04-09 02:34:11', '0000-00-00 00:00:00'),
(14, 24734444, 'dA9OSn0RCgo:APA91bFfkPqhH4cj1JgNjej-GSyO4ABiJh7w_xngC6enSCEtScqBbybywLe7FivSSRSv0ZkxbF7Lhp2tuSpmu5q7GvQnp9V1MtCF3oiMqlUv78nXKscM2hjBZ6hPHQuDJG6Rg_AXEiE6', '2017-04-09 04:58:15', '0000-00-00 00:00:00'),
(15, 24734445, 'elj5qjreYL0:APA91bG1KXjOLWIHLq6U9dIWDaeLAQu_orslXAsjoPrbWItbpQVXqAPUA-pAm2jIKvv26N3c9-v2BIRiTfw4Dl3O1nVp2c-PCkho0No2hFq9sRrKKaOnOlBaRkqup7ROC575ji1s4bxX', '2017-04-10 07:26:23', '0000-00-00 00:00:00'),
(16, 24734448, 'fEsi7HRaQe8:APA91bEsQe_fJNygo_hnnzbm86k98zmll9rLeB2wUZwL-Hu7Ah7cP7gUqq-StqM2yUbPq8qTB6x07P-XDIVjsuFUg8dXbrDTx8_vBw7Mp0wdDeyl-yvuJRBhwSHYrt21aT6wln2S7KKo', '2017-04-13 17:43:01', '0000-00-00 00:00:00'),
(17, 24734449, 'c7FyUVO8J0k:APA91bHNZaqj_oK8fJkEQXA7EHv2KHxJdYOQ0910JA8juovwEfrieYxo-gDe7sKQEQgKc_o10G29i7YhLq7WcYCtzz71sS6n9KMB0iqEIzCIIEPW2in6wrU-enybC7ZAg8gBNJoiTtOy', '2017-04-18 06:11:12', '0000-00-00 00:00:00'),
(18, 24734450, 'c7FyUVO8J0k:APA91bHNZaqj_oK8fJkEQXA7EHv2KHxJdYOQ0910JA8juovwEfrieYxo-gDe7sKQEQgKc_o10G29i7YhLq7WcYCtzz71sS6n9KMB0iqEIzCIIEPW2in6wrU-enybC7ZAg8gBNJoiTtOy', '2017-04-18 22:47:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `weebie_invite`
--

CREATE TABLE `weebie_invite` (
  `id` int(10) UNSIGNED NOT NULL,
  `masterid` int(10) NOT NULL,
  `receiverid` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'under',
  `del_send` int(2) NOT NULL,
  `del_receive` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weebie_invite`
--

INSERT INTO `weebie_invite` (`id`, `masterid`, `receiverid`, `status`, `del_send`, `del_receive`, `created_at`, `updated_at`) VALUES
(6, 24734445, 24734444, 'under', 0, 0, '2017-04-11 04:19:04', '0000-00-00 00:00:00'),
(7, 24734448, 24734445, 'under', 0, 0, '2017-04-13 18:46:47', '0000-00-00 00:00:00'),
(8, 24734445, 24734444, 'accept', 0, 0, '2017-04-13 18:46:53', '0000-00-00 00:00:00'),
(9, 24734448, 24734445, 'discard', 0, 0, '2017-04-13 18:47:02', '0000-00-00 00:00:00'),
(10, 24734445, 24734448, 'under', 0, 0, '2017-04-13 18:47:11', '0000-00-00 00:00:00'),
(11, 24734445, 24734445, 'under', 0, 0, '2017-04-13 18:47:18', '0000-00-00 00:00:00'),
(12, 24734448, 24734445, 'accept', 0, 0, '2017-04-13 18:47:54', '0000-00-00 00:00:00'),
(13, 24734450, 24734449, 'under', 1, 1, '2017-04-19 00:10:42', '0000-00-00 00:00:00'),
(14, 24734450, 24734449, 'under', 1, 1, '2017-04-19 00:11:16', '0000-00-00 00:00:00'),
(15, 24734449, 24734450, 'under', 1, 1, '2017-04-19 02:59:13', '0000-00-00 00:00:00'),
(16, 24734449, 24734450, 'accept', 1, 0, '2017-04-19 02:59:31', '0000-00-00 00:00:00'),
(17, 24734449, 24734450, 'under', 1, 1, '2017-04-19 03:02:14', '0000-00-00 00:00:00'),
(18, 24734449, 24734450, 'under', 1, 1, '2017-04-19 03:02:24', '0000-00-00 00:00:00'),
(19, 24734449, 24734450, 'under', 1, 1, '2017-04-19 03:02:30', '0000-00-00 00:00:00'),
(20, 24734449, 24734450, 'under', 1, 1, '2017-04-19 08:14:19', '0000-00-00 00:00:00'),
(21, 24734450, 24734449, 'under', 1, 1, '2017-04-19 18:56:09', '0000-00-00 00:00:00'),
(22, 24734450, 24734449, 'under', 1, 1, '2017-04-19 18:56:12', '0000-00-00 00:00:00'),
(23, 24734450, 24734449, 'under', 1, 1, '2017-04-19 18:56:15', '0000-00-00 00:00:00'),
(24, 24734450, 24734449, 'under', 1, 1, '2017-04-19 18:56:17', '0000-00-00 00:00:00'),
(25, 24734450, 24734449, 'under', 1, 1, '2017-04-19 19:09:02', '0000-00-00 00:00:00'),
(26, 24734450, 24734449, 'under', 1, 1, '2017-04-19 19:09:04', '0000-00-00 00:00:00'),
(27, 24734450, 24734449, 'under', 1, 1, '2017-04-19 19:34:33', '0000-00-00 00:00:00'),
(28, 24734450, 24734449, 'under', 1, 1, '2017-04-19 19:34:36', '0000-00-00 00:00:00'),
(29, 24734450, 24734449, 'under', 1, 1, '2017-04-19 19:34:38', '0000-00-00 00:00:00'),
(30, 24734450, 24734449, 'under', 1, 1, '2017-04-19 19:34:40', '0000-00-00 00:00:00'),
(31, 24734450, 24734449, 'under', 1, 1, '2017-04-19 22:56:40', '0000-00-00 00:00:00'),
(32, 24734450, 24734449, 'under', 1, 1, '2017-04-19 22:56:43', '0000-00-00 00:00:00'),
(33, 24734449, 24734450, 'under', 1, 0, '2017-04-19 23:15:39', '0000-00-00 00:00:00'),
(34, 24734449, 24734450, 'under', 1, 1, '2017-04-19 23:15:44', '0000-00-00 00:00:00'),
(35, 24734449, 24734450, 'under', 1, 1, '2017-04-19 23:15:46', '0000-00-00 00:00:00'),
(36, 24734449, 24734450, 'under', 0, 1, '2017-04-19 23:15:48', '0000-00-00 00:00:00'),
(37, 24734450, 24734449, 'under', 1, 1, '2017-04-19 23:40:03', '0000-00-00 00:00:00'),
(38, 24734450, 24734449, 'accept', 0, 0, '2017-04-19 23:40:06', '0000-00-00 00:00:00'),
(39, 24734450, 24734449, 'under', 1, 0, '2017-04-19 23:40:09', '0000-00-00 00:00:00'),
(40, 24734449, 24734450, 'accept', 1, 0, '2017-04-20 00:07:57', '0000-00-00 00:00:00'),
(41, 24734450, 24734449, 'under', 0, 1, '2017-04-20 00:08:26', '0000-00-00 00:00:00'),
(42, 24734450, 24734449, 'under', 0, 0, '2017-04-20 00:08:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `weebie_message`
--

CREATE TABLE `weebie_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) NOT NULL,
  `receiverid` int(10) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weebie_message`
--

INSERT INTO `weebie_message` (`id`, `userid`, `receiverid`, `message`, `photo`, `created_at`, `updated_at`) VALUES
(1, 24734445, 24734444, '', 'KVn78KeAyz.jpg', '2017-04-13 22:17:48', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_card`
--
ALTER TABLE `findmiin_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_comment`
--
ALTER TABLE `findmiin_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_comment_temp`
--
ALTER TABLE `findmiin_comment_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_jobs`
--
ALTER TABLE `findmiin_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_jobs_category`
--
ALTER TABLE `findmiin_jobs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_localfinds`
--
ALTER TABLE `findmiin_localfinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_privilege`
--
ALTER TABLE `findmiin_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `findmiin_section`
--
ALTER TABLE `findmiin_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locales_code_unique` (`code`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_advertisements`
--
ALTER TABLE `oollah_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_advertises`
--
ALTER TABLE `oollah_advertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_category`
--
ALTER TABLE `oollah_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_cities`
--
ALTER TABLE `oollah_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_merchant_plans`
--
ALTER TABLE `oollah_merchant_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_news`
--
ALTER TABLE `oollah_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_news_comments`
--
ALTER TABLE `oollah_news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_notifications`
--
ALTER TABLE `oollah_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_payment_method`
--
ALTER TABLE `oollah_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_promotions`
--
ALTER TABLE `oollah_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_promotion_claimed`
--
ALTER TABLE `oollah_promotion_claimed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_promotion_favorites`
--
ALTER TABLE `oollah_promotion_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_promotion_photos`
--
ALTER TABLE `oollah_promotion_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_tags`
--
ALTER TABLE `oollah_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_type`
--
ALTER TABLE `oollah_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_user_details`
--
ALTER TABLE `oollah_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oollah_user_payments`
--
ALTER TABLE `oollah_user_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_locale_id_foreign` (`locale_id`),
  ADD KEY `translations_translation_id_foreign` (`translation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weebie_fcm`
--
ALTER TABLE `weebie_fcm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weebie_invite`
--
ALTER TABLE `weebie_invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weebie_message`
--
ALTER TABLE `weebie_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `findmiin_card`
--
ALTER TABLE `findmiin_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273507;
--
-- AUTO_INCREMENT for table `findmiin_comment`
--
ALTER TABLE `findmiin_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `findmiin_comment_temp`
--
ALTER TABLE `findmiin_comment_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `findmiin_jobs`
--
ALTER TABLE `findmiin_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `findmiin_jobs_category`
--
ALTER TABLE `findmiin_jobs_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `findmiin_localfinds`
--
ALTER TABLE `findmiin_localfinds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `findmiin_privilege`
--
ALTER TABLE `findmiin_privilege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `findmiin_section`
--
ALTER TABLE `findmiin_section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `oollah_advertisements`
--
ALTER TABLE `oollah_advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oollah_advertises`
--
ALTER TABLE `oollah_advertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `oollah_category`
--
ALTER TABLE `oollah_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oollah_cities`
--
ALTER TABLE `oollah_cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `oollah_merchant_plans`
--
ALTER TABLE `oollah_merchant_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `oollah_news`
--
ALTER TABLE `oollah_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `oollah_news_comments`
--
ALTER TABLE `oollah_news_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `oollah_notifications`
--
ALTER TABLE `oollah_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oollah_payment_method`
--
ALTER TABLE `oollah_payment_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oollah_promotions`
--
ALTER TABLE `oollah_promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oollah_promotion_claimed`
--
ALTER TABLE `oollah_promotion_claimed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oollah_promotion_favorites`
--
ALTER TABLE `oollah_promotion_favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oollah_promotion_photos`
--
ALTER TABLE `oollah_promotion_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `oollah_tags`
--
ALTER TABLE `oollah_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oollah_type`
--
ALTER TABLE `oollah_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `oollah_user_details`
--
ALTER TABLE `oollah_user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `oollah_user_payments`
--
ALTER TABLE `oollah_user_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38938;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24734475;
--
-- AUTO_INCREMENT for table `weebie_fcm`
--
ALTER TABLE `weebie_fcm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `weebie_invite`
--
ALTER TABLE `weebie_invite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `weebie_message`
--
ALTER TABLE `weebie_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `translations_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `translations_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translations` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
