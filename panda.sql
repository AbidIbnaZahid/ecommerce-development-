-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 01:36 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panda`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_input_amout` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `color_id`, `size_id`, `user_input_amout`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 22, 6, 5, 1, 31, '2022-01-23 06:12:56', NULL),
(10, 20, 1, 2, 1, 31, '2022-01-23 06:13:05', NULL),
(15, 21, 5, 4, 46, 32, '2022-01-23 08:15:10', '2022-01-23 09:30:35'),
(16, 22, 6, 5, 1, 36, '2022-01-27 01:41:30', NULL),
(17, 21, 1, 3, 1, 36, '2022-01-27 01:41:38', NULL),
(18, 21, 5, 4, 1, 36, '2022-01-27 01:41:42', NULL),
(19, 21, 1, 1, 1000, 37, '2022-01-28 11:28:36', '2022-01-28 11:28:51'),
(20, 21, 5, 1, 1, 37, '2022-01-28 11:28:40', NULL),
(21, 22, 6, 5, 1, 38, '2022-02-02 10:18:38', NULL),
(22, 21, 3, 3, 1, 39, '2022-02-03 00:46:49', NULL),
(23, 27, 1, 1, 1, 40, '2022-02-06 07:21:09', NULL),
(24, 27, 6, 2, 1, 40, '2022-02-06 07:21:15', NULL),
(25, 27, 1, 1, 1, 41, '2022-02-10 12:38:38', NULL),
(26, 27, 6, 2, 1, 41, '2022-02-10 12:38:42', NULL),
(27, 27, 1, 1, 1, 53, '2022-02-19 03:21:12', NULL),
(28, 27, 1, 1, 1, 54, '2022-02-19 03:22:30', NULL),
(29, 23, 1, 4, 2, 57, '2022-02-21 11:35:10', NULL),
(30, 26, 4, 5, 1, 57, '2022-02-21 11:35:23', NULL),
(54, 26, 4, 5, 5, 74, '2022-04-08 02:27:07', '2022-04-08 02:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_photo` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_category_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_photo`, `created_at`, `updated_at`, `deleted_at`, `slug`) VALUES
(12, 'Man', '12.jpg', '2021-12-06 03:40:07', '2021-12-06 03:40:07', NULL, 'man'),
(13, 'Woman', '13.jpg', '2021-12-06 03:40:22', '2021-12-06 03:40:22', NULL, 'woman'),
(14, 'Child', '14.jpg', '2021-12-06 03:40:53', '2021-12-06 03:40:53', NULL, 'child'),
(15, 'Mobile', '15.jpg', '2021-12-06 03:41:09', '2021-12-06 04:07:06', NULL, 'mobile'),
(17, 'Makeup', '17.jpg', '2021-12-06 04:08:04', '2021-12-06 04:08:04', NULL, 'meakeup'),
(18, 'Ladies product', '18.jpg', '2021-12-06 04:08:24', '2021-12-06 04:08:24', NULL, 'ladies-prodect');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#ff0000', '2022-01-17 00:53:56', NULL),
(3, 'Blue', '#002aff', '2022-01-17 00:56:17', NULL),
(4, 'Yellow', '#fff700', '2022-01-17 00:56:25', NULL),
(5, 'Pink', '#ff00dd', '2022-01-17 01:05:45', NULL),
(6, 'N/A', '#e7e7d5', '2022-01-23 05:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` int(11) NOT NULL,
  `coupon_amount` int(11) NOT NULL,
  `coupon_limit` int(11) NOT NULL,
  `coupon_validity` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_type`, `coupon_amount`, `coupon_limit`, `coupon_validity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Brynne Kline', 1, 21, 36, '2022-02-10', NULL, NULL, NULL),
(2, 'Ferris Garcia', 1, 91, 98, '2022-02-16', NULL, NULL, NULL),
(3, 'Xavier Hardy', 2, 79, 26, '2022-02-16', NULL, NULL, NULL),
(4, 'A50', 1, 50, 20, '2022-03-04', NULL, NULL, NULL),
(5, 'A200', 2, 200, 58, '2022-02-04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `specialprice` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `specialprice`, `created_at`, `updated_at`) VALUES
(1, 21, 5, 4, 963, NULL, '2022-01-17 03:10:20', NULL),
(2, 21, 1, 1, 20, NULL, '2022-01-17 03:10:43', NULL),
(3, 21, 1, 3, 222, NULL, '2022-01-17 03:10:53', NULL),
(4, 21, 5, 1, 30, NULL, '2022-01-17 03:19:08', '2022-01-17 03:19:16'),
(5, 21, 5, 2, 20, NULL, '2022-01-17 03:19:25', NULL),
(6, 21, 3, 3, 597, 396, '2022-01-17 03:19:43', NULL),
(7, 20, 1, 2, 89, NULL, '2022-01-17 03:24:15', '2022-03-02 09:29:40'),
(8, 22, 6, 5, 94, NULL, '2022-01-23 05:40:14', '2022-03-02 09:29:40'),
(9, 27, 6, 2, 94, 507, '2022-02-06 07:19:43', '2022-02-23 09:22:57'),
(10, 27, 1, 1, 0, 878, '2022-02-06 07:19:48', '2022-03-02 09:34:59'),
(11, 26, 4, 5, 650, 100, '2022-02-06 07:19:56', '2022-04-19 11:55:42'),
(12, 25, 3, 1, 666, 307, '2022-02-06 07:20:06', '2022-04-19 11:55:42'),
(13, 24, 5, 3, 815, 641, '2022-02-06 07:20:16', '2022-04-19 11:55:42'),
(14, 23, 1, 4, 447, 876, '2022-02-06 07:20:27', '2022-04-19 11:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_06_045422_create_channels_table', 1),
(6, '2021_11_17_125558_create_categories_table', 1),
(7, '2021_11_29_160709_create_subcategories_table', 1),
(8, '2021_12_04_082732_add_new_field_user_table', 2),
(9, '2021_12_06_133434_add_new-fileds_categories_tables', 3),
(10, '2021_12_08_173450_create_products_table', 4),
(12, '2022_01_17_064424_create_colors_table', 5),
(13, '2022_01_17_070620_create_sizes_table', 6),
(14, '2022_01_17_085909_create_inventories_table', 7),
(15, '2022_01_19_180558_create_carts_table', 8),
(16, '2022_01_27_072450_create_shippings_table', 9),
(18, '2022_02_02_162754_create_coupons_table', 10),
(19, '2022_02_19_073203_add_new_role_field_user_table', 11),
(29, '2022_02_21_180553_create_order_summeries_table', 12),
(30, '2022_02_23_145552_create_order_details_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `oreder_summary_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_input_amout` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `oreder_summary_id`, `product_id`, `color_id`, `size_id`, `user_input_amout`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 26, 4, 5, 100, '2022-02-23 12:17:43', NULL, NULL),
(2, 2, 27, 1, 1, 1, '2022-03-02 08:07:50', NULL, NULL),
(3, 3, 27, 1, 1, 1, '2022-03-02 08:11:19', NULL, NULL),
(4, 4, 26, 4, 5, 1, '2022-03-02 08:36:16', NULL, NULL),
(5, 5, 24, 5, 3, 10, '2022-03-02 09:29:40', NULL, NULL),
(6, 5, 22, 6, 5, 5, '2022-03-02 09:29:40', NULL, NULL),
(7, 5, 20, 1, 2, 10, '2022-03-02 09:29:40', NULL, NULL),
(8, 5, 23, 1, 4, 1, '2022-03-02 09:29:40', NULL, NULL),
(9, 6, 27, 1, 1, 881, '2022-03-02 09:34:59', NULL, NULL),
(10, 7, 26, 4, 5, 1, '2022-04-07 09:07:00', NULL, NULL),
(11, 8, 25, 3, 1, 1, '2022-04-19 10:15:58', NULL, NULL),
(12, 9, 26, 4, 5, 1, '2022-04-19 11:55:42', NULL, NULL),
(13, 9, 25, 3, 1, 1, '2022-04-19 11:55:42', NULL, NULL),
(14, 9, 24, 5, 3, 1, '2022-04-19 11:55:42', NULL, NULL),
(15, 9, 23, 1, 4, 1, '2022-04-19 11:55:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_summeries`
--

CREATE TABLE `order_summeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custome_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double(8,2) NOT NULL,
  `discount_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `shipping_charge` double(8,2) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivary_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_summeries`
--

INSERT INTO `order_summeries` (`id`, `user_id`, `customer_name`, `customer_email`, `custome_phone_number`, `customer_country`, `customer_city`, `customer_address`, `customer_notes`, `total_amount`, `discount_amount`, `shipping_charge`, `grand_total`, `coupon_name`, `payment_method`, `payment_status`, `delivary_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 63, 'Sawyer Castaneda', 'nahi@mailinator.com', '+1 (691) 274-9467', 'BANGLADESH', 'Dhaka', 'Sequi reiciendis con', 'Ab eveniet officiis', 2800.00, 0.00, 60.00, 2860.00, NULL, 'cash', 'paid', 'delivered', '2022-02-23 12:17:43', '2022-04-07 10:33:30', NULL),
(2, 64, 'Hop Mack', 'wiruwunac@mailinator.com', '+1 (872) 639-1351', 'INDIA', 'Kolkata', 'Aute irure tempore', 'Nemo in consequatur', 857.00, 0.00, 500.00, 1357.00, NULL, 'cash', 'pending', 'pending', '2022-03-02 08:07:50', NULL, NULL),
(3, 65, 'Velma Byrd', 'sutomofuk@mailinator.com', '+1 (778) 719-1485', 'BANGLADESH', 'Dhaka', 'Consequatur Animi', 'Distinctio Earum ni', 857.00, 0.00, 60.00, 917.00, NULL, 'cash', 'pending', 'pending', '2022-03-02 08:11:19', NULL, NULL),
(4, 65, 'Abra Giles', 'xyhiju@mailinator.com', '+1 (396) 756-9527', 'BANGLADESH', 'Dhaka', 'Veniam doloribus ap', 'Accusantium repudian', 28.00, 0.00, 60.00, 88.00, NULL, 'cash', 'pending', 'pending', '2022-03-02 08:36:16', NULL, NULL),
(5, 65, 'Aileen Franks', 'jituqyv@mailinator.com', '+1 (173) 587-2914', 'BANGLADESH', 'Dhaka', 'Ad sapiente ipsum ni', 'Quod ut aut nihil as', 19972.00, 0.00, 60.00, 20032.00, NULL, 'cash', 'pending', 'pending', '2022-03-02 09:29:40', NULL, NULL),
(6, 65, 'Martha Sweeney', 'webol@mailinator.com', '+1 (784) 276-5778', 'BANGLADESH', 'Dhaka', 'Ratione enim commodo', 'Ducimus ab ea non c', 755017.00, 377509.00, 60.00, 377568.00, NULL, 'cash', 'pending', 'pending', '2022-03-02 09:34:59', NULL, NULL),
(7, 73, 'dsaf', 'as@live.com', '02238949324', 'BANGLADESH', 'Dhaka', 'sdfsa', 'dsf', 28.00, 0.00, 60.00, 88.00, NULL, 'cash', 'paid', 'delivered', '2022-04-07 09:07:00', '2022-04-07 10:33:38', NULL),
(8, 76, 'abid@live.com', 'abid@live.com', '0175463456456', 'BANGLADESH', 'Bogra', 'vgh  fhfgh', NULL, 729.00, 0.00, 100.00, 829.00, NULL, 'cash', 'pending', 'pending', '2022-04-19 10:15:58', NULL, NULL),
(9, 76, 'abid@live.com', 'abid@live.com', '0178654353', 'BANGLADESH', 'Dhaka', 'hgj', 'tru', 2379.00, 0.00, 60.00, 2439.00, NULL, 'cash', 'pending', 'pending', '2022-04-19 11:55:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_regular_price` int(11) NOT NULL,
  `product_discounted_price` int(11) DEFAULT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_dimensions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_materials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_other_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thumbnail_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product_thumbnail_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `slug`, `product_regular_price`, `product_discounted_price`, `product_short_description`, `product_sku`, `category_id`, `subcategory_id`, `product_weight`, `product_dimensions`, `product_materials`, `product_other_info`, `product_long_description`, `product_thumbnail_photo`, `created_at`, `updated_at`) VALUES
(20, 'Xenos Patton', 'xenos-patton-z9eEQ', 491, 602, 'Brock Burt', 'xen-896494773', 13, 20, 'Caesar Odom', 'Ciaran Doyle', 'Stacey Collins', 'Amet quis adipisci', '<p>nhsdjakf hjak fdahgfkds kihgf dskg</p>', 'product_thumbnail_photo.jpg', '2022-01-10 23:25:41', NULL),
(21, 'Octavia Malone', 'octavia-malone-AvW36', 434, 159, 'Cullen Olsen', 'oct-1728584755', 15, 23, 'Kadeem Estrada', 'Lara Emerson', 'Cheyenne Lee', 'Officiis aut invento', '<p>gdfh gfhj gfhj kh sdgfdfsgfg</p>', 'product_thumbnail_photo.jpg', '2022-01-17 02:05:24', NULL),
(22, 'Colin Albert', 'colin-albert-P0Wvx', 266, 819, 'Constance Whitehead', 'col-667651058', 14, 22, 'Serena Meyers', 'Galvin Wyatt', 'Kareem Clarke', 'Voluptate aut mollit', '<p>fdghfh</p>', 'product_thumbnail_photo.jpg', '2022-01-17 09:22:41', NULL),
(23, 'Belle Mckinney', 'belle-mckinney-0cejp', 721, 707, 'Savannah Hampton', 'bel-1593949785', 12, 19, 'Xerxes Dennis', 'Rinah Hartman', 'Kevin Aguirre', 'Sed fugiat enim laud', '<p>sdg hgfhgj</p>', '23.jpg', '2022-02-06 07:16:10', '2022-02-06 07:16:10'),
(24, 'Cassady Guzman', 'cassady-guzman-J5AH1', 534, 915, 'Jena Wilkerson', 'cas-2073020613', 14, 22, 'Zane Gregory', 'Jael Lester', 'Brynn Holman', 'Enim reprehenderit', '<p>sdgf dfg fhgj hgj</p>', '24.jpg', '2022-02-06 07:16:46', '2022-02-06 07:16:46'),
(25, 'Gisela Lynch', 'gisela-lynch-7MxX8', 404, 729, 'Wilma Todd', 'gis-393346865', 12, 21, 'Regan Richards', 'Georgia Shaw', 'Amity Hopkins', 'Ipsa temporibus nih', '<p>fcghfgh&nbsp; hgj hj&nbsp; fgdhg&nbsp; gfh fgh</p>', '25.jpg', '2022-02-06 07:17:35', '2022-02-06 07:17:35'),
(26, 'Kenneth Mcfarland', 'kenneth-mcfarland-wCro1', 185, 28, 'Caldwell Lindsey', 'ken-1015022940', 13, 20, 'Candice Turner', 'Donovan Hester', 'Jackson Meyers', 'Cupidatat modi labor', '<p>fh gfhhgj hgj ghjk hkhk&nbsp;</p>', '26.jpg', '2022-02-06 07:18:08', '2022-02-06 07:18:08'),
(27, 'Fiona Stokes', 'fiona-stokes-s4iZW', 100, 857, 'Kimberley Hall', 'fio-289787892', 15, 23, 'Alfreda David', 'Amery Powers', 'Britanni Fuentes', 'Reiciendis aut amet', '<p>fgh ghj gyj y ytyujh dgtfhjhgj</p>', '27.jpg', '2022-02-06 07:18:21', '2022-02-06 07:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `country_id`, `city_name`, `shipping_charge`, `created_at`, `updated_at`) VALUES
(1, 18, 'Dhaka', 60, NULL, NULL),
(2, 18, 'Bogra', 100, NULL, NULL),
(3, 18, 'Rajshahi', 100, NULL, NULL),
(4, 99, 'Kolkata', 500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, 'X', '2022-01-17 01:13:02', NULL),
(2, 'L', '2022-01-17 01:13:06', NULL),
(3, 'M', '2022-01-17 01:13:10', NULL),
(4, 'XL', '2022-01-17 01:13:15', NULL),
(5, 'N/A', '2022-01-23 05:39:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(19, 12, 'T-shart', '2022-01-10 23:24:01', NULL),
(20, 13, 'Bag', '2022-01-10 23:24:11', NULL),
(21, 12, 'Pant', '2022-01-10 23:24:17', NULL),
(22, 14, 'Toy', '2022-01-10 23:24:23', NULL),
(23, 15, 'Iphone', '2022-01-10 23:24:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `portfolio_photo`, `role`) VALUES
(1, 'abid', 'abid@gmail.com', NULL, '$2y$10$RHa7Hha8VGNLru7291BXReBBG3Th.wmOq.fyw6w78RcTuP4jhpqPq', NULL, '2021-12-01 07:31:44', NULL, NULL, NULL, 'admin'),
(44, 'Hop Kirby', 'sywef@mailinator.com', NULL, '$2y$10$VZ4OfM21ebRQy0RchVgXj.EYxNTWDmuYLxKk1neNJFdvsPEUBuPi.', NULL, '2022-02-19 02:01:35', NULL, NULL, NULL, 'customer'),
(45, 'Iona Crosby', 'qapi@mailinator.com', NULL, '$2y$10$DBUZx9R5kKCkCfHQwGN91eNZvz90Ipuu0J.Mpx3Z4kwTvIzMJ1Ie2', NULL, '2022-02-19 02:11:45', NULL, NULL, NULL, 'customer'),
(46, 'Jorden Watkins', 'gutufiwop@mailinator.com', NULL, '$2y$10$ER/7SaNv.3s6zeTL3nzhH.ZwlkZ9pka4HKivrXexTbYk7wDpPSXw6', NULL, '2022-02-19 02:12:10', NULL, NULL, NULL, 'customer'),
(47, 'Zachary Harding', 'dikyfavenu@mailinator.com', NULL, '$2y$10$1OEmGDdFjnmlreHtDZBSKuXRmWBgwXmMbm3gAMv.WaWfrPQAB7DoO', NULL, '2022-02-19 02:13:18', NULL, NULL, NULL, 'customer'),
(48, 'Allegra Holloway', 'sosofym@mailinator.com', NULL, '$2y$10$WmhXJaBRsuZZWdPmoMCe4uut6M9jMXXsdzYr8oZLcxud4Bx7he7vy', NULL, '2022-02-19 02:13:33', NULL, NULL, NULL, 'customer'),
(49, 'Unity Ratliff', 'vytuk@mailinator.com', NULL, '$2y$10$7Ugyl9dHY97GQa9d8xnEv.eDLCqarBiI4CONweuqSDItFSuzpOt1W', NULL, '2022-02-19 02:15:54', NULL, NULL, NULL, 'customer'),
(50, 'Aaron Joyce', 'qejyne@mailinator.com', NULL, '$2y$10$a8ICHktbLR/zmQH8rZYewOOClA5DD0Koyj8wl6Fw4kShwhj2j9P2u', NULL, '2022-02-19 02:16:23', NULL, NULL, NULL, 'customer'),
(51, 'Erich Foreman', 'riqe@mailinator.com', NULL, '$2y$10$lbgXuqFem2zNQMl2dw..veoD/HTltY3ehTzFf5s3Z7lX.e7NTw7CG', NULL, '2022-02-19 02:40:36', NULL, NULL, NULL, 'customer'),
(52, 'Nissim Bradley', 'xagicuby@mailinator.com', NULL, '$2y$10$ztr62mQRfO6e92b3EuDJaed7CVzpjbv5MMY8/jVg5VXGNUnjhgp/O', NULL, '2022-02-19 02:40:42', NULL, NULL, NULL, 'customer'),
(53, 'Jonas Nelson', 'tuximi@mailinator.com', NULL, '$2y$10$FcJ15LYyEhrnUzMj.J13I.8PT3niurPQqhBHWxMweCTjskWl.Rlsm', NULL, '2022-02-19 03:16:27', NULL, NULL, NULL, 'customer'),
(54, 'Noelle Young', 'ryfo@mailinator.com', NULL, '$2y$10$qSAU84dOKwOnSk1Mov7FEOo8Do8Dd/R3WtzDIXkMNIwhwUPk3cueu', NULL, '2022-02-19 03:22:13', NULL, NULL, NULL, 'customer'),
(55, 'Abra Hart', 'qogydeso@mailinator.com', NULL, '$2y$10$X/gkHpLaHf7nbnkLUax/Ae0f4r5qK2EgHd7.eY93Z/k207uJWJd26', NULL, '2022-02-19 03:27:22', NULL, NULL, NULL, 'customer'),
(56, 'Yardley Underwood', 'detoz@mailinator.com', NULL, '$2y$10$dtcqbV9QLJSnAnsWqvt3GeHLgtgF3NzxgBID6bw6M4Uyp13MTCBXm', NULL, '2022-02-19 08:06:59', NULL, NULL, NULL, 'customer'),
(57, 'Jenna Mooney', 'xonynupa@mailinator.com', NULL, '$2y$10$7ULOFFKLndqMp19RLf/pYOtN6DAvQ.GJawAA6zzm5ymC68w.VnbAi', NULL, '2022-02-21 11:34:42', NULL, NULL, NULL, 'customer'),
(58, 'Amal Goodman', 'putoj@mailinator.com', NULL, '$2y$10$EjnzaHbmoZuQps3YktYSiOqO7v5b150O4ZRdoMkCYMAor2AELxMGO', NULL, '2022-02-23 09:00:10', NULL, NULL, NULL, 'customer'),
(59, 'Chava Bean', 'parypija@mailinator.com', NULL, '$2y$10$d2OYu6uN6UF2k2.tJWKbSeoJ5jpSlEP5RHsgULCluwn8UARNAmmvq', NULL, '2022-02-23 09:00:22', NULL, NULL, NULL, 'customer'),
(60, 'Hyacinth Newman', 'xidojiq@mailinator.com', NULL, '$2y$10$F9xSnZErzpt4wCTVK9skvebUaViOyDzRvOHTLGfCxH6ejEHn4aXoW', NULL, '2022-02-23 09:22:01', '2022-02-23 09:22:01', NULL, NULL, 'admin'),
(61, 'Sage Ball', 'sagowykyro@mailinator.com', NULL, '$2y$10$Absb0hg0ZluUveSbwj7rzeIAn4Quv/.LIzQhaP6ZOHTkZOu3b4iKC', NULL, '2022-02-23 12:01:50', '2022-02-23 12:01:50', NULL, NULL, 'admin'),
(62, 'Kelly Vazquez', 'borep@mailinator.com', NULL, '$2y$10$VF//LLdMfbH.x/GjADmy5eoKo4Q45JwRSNbZ6dfrvpHyuQAWLBr1K', NULL, '2022-02-23 12:01:59', NULL, NULL, NULL, 'customer'),
(63, 'Calista Hooper', 'halir@mailinator.com', NULL, '$2y$10$YzkcaB8io0IB/PRAdarJS.A99ZCwjsAZYOwTXKBHWGNU6IiQnF3yW', NULL, '2022-02-23 12:02:35', NULL, NULL, NULL, 'customer'),
(64, 'Brendan Barlow', 'vymoqutu@mailinator.com', NULL, '$2y$10$4ORuhtolxz5NbggifAdnHuCRGRCPH/NL2VHOH.EKOUtp7Rvpur5Nu', NULL, '2022-03-02 08:06:56', '2022-03-02 08:06:56', NULL, NULL, 'admin'),
(65, 'Murphy Harvey', 'gosihutydy@mailinator.com', NULL, '$2y$10$6sshZQFt1tE94OxpEpoaC.P5QWNBDfMujZBwuHZR1VYLyVQHMtkT6', NULL, '2022-03-02 08:10:34', NULL, NULL, NULL, 'customer'),
(66, 'Gail Robles', 'jaziv@mailinator.com', NULL, '$2y$10$0h8pIIOiE4bCkg6WfhfgL.mOjeM3/6RuYWeTlxb57Fd2Blc3lNzmy', NULL, '2022-03-02 10:22:32', '2022-03-02 10:22:32', NULL, NULL, 'admin'),
(67, 'Jason Lucas', 'noqipar@mailinator.com', NULL, '$2y$10$.lnw2A5JjEQr0E2BiQm5H.9umk68gkIfkNRLUAKj2vaKyWkUcqkYq', NULL, '2022-03-02 10:29:25', '2022-03-02 10:29:25', NULL, NULL, 'admin'),
(68, 'Georgia Rush', 'jominu@mailinator.com', NULL, '$2y$10$vZ7NZ8a0EBiW1mkBNdeeOeVhQTtsdvjXrD.Kd4AGQWrT36AG7bleq', NULL, '2022-03-02 10:29:49', NULL, NULL, NULL, 'customer'),
(69, 'Abid Ibna Zahid', 'DSF@gmail.com', NULL, '$2y$10$/JwmbQHTkCSUsjNDJKVdZeBzb.oBuPQwv.oFr7/4fHOIZtBWXIFTS', NULL, '2022-03-02 10:31:06', '2022-03-02 10:37:28', '01743235212', '69.png', 'admin'),
(70, 'Uta Talley', 'pixuzex@mailinator.com', NULL, '$2y$10$bgEmy3V/bBrPCVpTWhOfouQy7Cc9NuHEg6wy/A7K1L1E9m.UCbv9S', NULL, '2022-03-02 10:33:45', '2022-03-02 10:33:45', NULL, NULL, 'admin'),
(71, 'Adena Livingston', 'gupasoqe@mailinator.com', NULL, '$2y$10$LX8YXbAckpN1qaiN2a5BPugRCyXgxjvJ1gEbJrdc4wjq56WFHyoYa', NULL, '2022-03-02 10:34:00', NULL, NULL, NULL, 'customer'),
(72, 'Dara Dixon', 'hapunipe@mailinator.com', NULL, '$2y$10$NWfrbaLmnuGdnLHDz8yyNea/AesNe9b57SpLz8mO5c4mYutnJNPtC', NULL, '2022-04-07 09:04:19', '2022-04-07 09:04:19', NULL, NULL, 'admin'),
(73, 'dsaf', 'as@live.com', NULL, '$2y$10$Non5VALvE0Y6Tfbe8XKeNOuroTWTCFrnEbttCtCQkATVyf3oJF26.', NULL, '2022-04-07 09:05:51', NULL, NULL, NULL, 'customer'),
(74, 'Tallulah Munoz', 'fovorovo@mailinator.com', NULL, '$2y$10$0LtHIT3MbZG/DhVBmyjq/u.qLTRHfDrtwil4oc62WmUOZeaKGvxaq', NULL, '2022-04-08 02:25:29', '2022-04-08 02:25:29', NULL, NULL, 'admin'),
(75, 'Lavinia Cervantes', 'mugijabimy@mailinator.com', NULL, '$2y$10$gQmyTa3sRVbRJUyYeO/Y1uID1BOGYEo9QIA3ytbKdZbU9nUOgpJ/K', NULL, '2022-04-19 09:54:29', '2022-04-19 09:54:29', NULL, NULL, 'admin'),
(76, 'abid@live.com', 'abid@live.com', NULL, '$2y$10$Yh7gGkQTfi9oBN5hd6JQreKJx5zj2WLrm2dAgW0ctZozhtFOdzRvS', NULL, '2022-04-19 10:15:11', NULL, NULL, NULL, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_color_name_unique` (`color_name`),
  ADD UNIQUE KEY `colors_color_code_unique` (`color_code`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_name_unique` (`coupon_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_summeries`
--
ALTER TABLE `order_summeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_size_name_unique` (`size_name`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_summeries`
--
ALTER TABLE `order_summeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
