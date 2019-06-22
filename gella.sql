-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 05:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gella`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `phone`, `email`) VALUES
(1, 'tailor', '2924fb557f63923cd97cfbf337372548d42a27bfe825f2da4ef3e74c62bbdf7b', '08058866352', 'itedjereg@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_banner` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_slug`, `category_banner`) VALUES
(1, 'Mens Wear', 'mens-wear', 'c4.jpg'),
(2, 'Womens', 'womens', 'c2.jpg'),
(3, 'Kids', 'kids', 'd4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('03j6s8veje3aksbh7sidp9i7vq7blos1', '::1', 1517241068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373234303831343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('06ug1ci16rgsph8p3h2phjrpdc38c1ve', '::1', 1516902106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363930313830373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('0fl6e5rv151b1plpeoauu52hrt2k52g7', '::1', 1516895706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839353431343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('0iehs88jeu8b6h6uqmc416rtju9dj1hg', '::1', 1516800191, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830303139313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('0mgh89obq8uujptpg3bhuj3cckqlgl7e', '::1', 1516376919, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337363931393b),
('0tdkcjs74ok8o3b1tbgp7usm03nevqij', '::1', 1516383287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338333238373b),
('11jnqous1slnsgfl37k74nh3qocqvrv0', '::1', 1517184552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373138343531383b),
('1820vm90t6puh84sgmsai23n82s3mj6n', '::1', 1516897710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839373635303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('182kd9eecctko87284sjjd2ei3a0cctl', '::1', 1516714111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363731333832353b),
('195c1qhpnbcthahn21uo7ka5n51qi2q3', '::1', 1516888180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363838383035373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('1b9be6l4bqdg9hr98k78o2nr8su1g22l', '::1', 1516308079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330383037393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('1q0r17gqv5clqu77vkhq2p5avhpkj0a2', '::1', 1516304178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330343130353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('24g7jl29linej64kmjkh753cbdh80vac', '::1', 1516899148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839383930313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('25urt9gudk1apjni5qijhhdi8du4nqcg', '::1', 1516303729, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330333731373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('2mk0hhjrkk5msd47drq047vlg5l8h11d', '::1', 1516891458, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839313435373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('2n2n5ll9g93bse63p5bh0hjnuml2ee6q', '::1', 1516375792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337353532373b),
('2nhuc6fkkq5giqsnlt9r15knqkk2a222', '::1', 1516895785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839353738343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('391i5jas46efgpu9jpit6tnph97bfabm', '::1', 1516453884, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435333638333b),
('3f9i8irhqpri7user81v73uv8fffck5f', '::1', 1516382891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338323630383b),
('47j2vp58sjecvfo9oluh339htl3qc8i0', '::1', 1516383105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338323931353b),
('4dqvk87i0tsjb1dnnbgkiksll6a58rqc', '::1', 1517231131, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233303937353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('4hhguan0eaqostu44gbivkh5iufq3n9k', '::1', 1516209404, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363230393236313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('4hlugi09h5788p96mioabr67t2cigfhl', '::1', 1516206327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363230363330393b),
('55bj0bgjd9hme12qps14v4p1tiedi08b', '::1', 1516376008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337353834363b),
('59q48n8v171bq3fqp4pvas61pmupka26', '::1', 1516370557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337303535373b),
('5h0svklo2da15gqgt6v5ea1esp87q0o8', '::1', 1516973948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937333635343b),
('5qdv2r2nvh29bf3n8qbo79j384dbku7s', '::1', 1516890949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839303636393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('60du0sn2net4sc09vhfcm0k0ipom9952', '::1', 1516427818, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363432373831373b),
('64vr0h7j3s72onlobp4lsn85b6v9vrc7', '::1', 1516974947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937343831303b),
('6hfoiccj3ehhfuibepstut45unpse2gf', '::1', 1516384129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338333834363b),
('707h9v05onf9bksfnhq3jmhu7rtn9234', '::1', 1516433787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363433333737313b),
('7a3brpfi8k1tfqfkv29j3t9ko5dlv0ev', '::1', 1516370055, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336393735353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('7dr0u5v6miiisj1kth9mth9m53nupk5b', '::1', 1516901165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363930303837313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('7ge1is39rjrak9jd3eld33v662uc39n1', '::1', 1516434181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363433343038353b),
('7l272esb38ns30ck37lss0utc5gkvjbn', '::1', 1516893040, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839323936333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('7mu1ni1a4f7etl9u85f4li2abestoj1n', '::1', 1516892561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839323439383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('7ocsp438i5llav6gaorju9lt730qprpb', '::1', 1516462416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363436323336343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('7rr3pco9tgddrplkepr46uqtmcdpntpb', '::1', 1516206870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363230363739353b),
('81l4ev85h070aajk4agfejp1t9dpnru2', '::1', 1516384600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338343439323b),
('82dm3rcjhula3aj4elvj9vnpj6pko5pr', '::1', 1516369553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336393236393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('89ntc41g9n8u0bglseu5f5mm4solhogh', '::1', 1516974338, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937343131333b),
('8npnss7hnpuull9rtb2o8klp86285khp', '::1', 1516311685, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363331313434353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('8o3fjtupfa73olt6aflo5md6cug3kjvj', '::1', 1516457368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435373336383b),
('8r4t9q29cfd7hi2v2qh1jfoeq9bgv00p', '::1', 1516900280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839393938303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('90rsf2ifeip5tbof0v681sda9t0u6l1c', '::1', 1516374637, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337343632333b),
('912818rduhqkq2lg39dnerev36hdpr3c', '::1', 1516804547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830343237363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('9aslmfmtpkogdi6v3m69ndta64d8jqa4', '::1', 1516899846, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839393630323b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('9pbbmp1bd204eq87speprjv1vh666aki', '::1', 1516366191, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336363030383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('a8s99t14qq8q4j1ubjs8dpjkpnd1hpcb', '::1', 1516364128, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336343132373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('a9b6h93lhg1ldil2mjrog93m3nfor9nm', '::1', 1517237264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233373035373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('aa2ps8ebjnabj15aqhralth8iaq5r8u5', '::1', 1516975189, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937353138393b),
('ac1suf203o1b4kuf7a76nagpdmj6ofhf', '::1', 1516802121, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830323130363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('akaerpolmj9db2r0kangtklno1ofh3kk', '::1', 1516378309, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337383038373b),
('al08iqbpem3h0shtegut7sl1h6kfgp2u', '::1', 1516799100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363739393039393b),
('al7gbc5kpjbprk89ej4nf4mktkothh0j', '::1', 1516975851, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937353630333b),
('arouraeu983jq6r0sc7pfjvckcdueue0', '::1', 1516893545, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839333331363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('b4j3air8r7b8s694sate03kghte503rq', '::1', 1516361389, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336313338393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('b7jmqjgha3l2gjf5auvkde7rbrj7j85n', '::1', 1516207622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363230373433343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('blvbrioe094ehhmd2g180hb6shlrs5j0', '::1', 1516972482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937323239313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('c6nbc1nuvklf19s5u93jvngho0r9ndab', '::1', 1517231452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233313435323b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('cm6m90mogeo8vl79lg00p87odvgtumpv', '::1', 1516889227, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363838393232363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('cter1dvn28s97m94d4c50m52o598ia17', '::1', 1516800994, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830303939343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('d24mjeruivjkd3c09igqv2cvdtd9fg1b', '::1', 1516382558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338323238393b),
('d30pjka57d63br0umgjt0voq036387g0', '::1', 1516375322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337353032353b),
('dhfvcthngfhmotg3gjlbpqdd7el8ber7', '::1', 1516896600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839363439303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('djlnslasbjad59qfe9hvsc3ggnvrvnra', '::1', 1516360169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336303136363b),
('dl16vgnj23uo3dqc6au03vd4hil6sbh8', '::1', 1516371765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337313537383b),
('dlhje4cc5feih69qmm8em43gj1nprdsr', '::1', 1516456538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435363235353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('e1b6bt2sre9f8gpebskqomjn619b4c69', '::1', 1516308774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330383631303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('e78chuad3qfntj9cqugetbcqtt05o40h', '::1', 1516307974, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330373731363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('eo5635b8m2k0duc43lepnmrd98vkqg83', '::1', 1516977548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937373533333b),
('er2i341078n1p1kipfgf7lnpha09tu5t', '::1', 1516977056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937363738323b),
('f491o9e98glf1sr1lqc2o2jkgomcjp0u', '::1', 1516453316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435333136383b),
('f9pq0865ehlnt3m13jn5kfgmd9m0vepv', '::1', 1517229023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373232383733373b),
('faffp3m9bfupvrbmqsdeo34ijhs2llsc', '::1', 1516895332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839353039383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('g68vkjqtuogb1a87ofp3h830ch57vnlo', '::1', 1516805579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830353537393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('gck9ik8f7lsln2agepc8pqca317i8dh5', '::1', 1516899476, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839393232383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ghajl0g93ne6fpi68v6um6qfinnbu1ng', '::1', 1516890665, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839303332343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ghqqf3srr0mf192hp27n1e715ghk9lqv', '::1', 1517241317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373234313132353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('hsmc3l2fj9oea1jlhbo8827756mcrjdr', '::1', 1516891370, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839313134303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('hupgrlsp7ls48tpvkd738ehgfvbjl0pe', '::1', 1516896793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839363739333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('i4urhm6cpqmucpuq9o08butgb0p9k68f', '::1', 1516379116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337393039363b),
('i7mdcfia1ho44dssh1udg136s0pc3vgb', '::1', 1516977329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937373131393b),
('iq1j9rurdta82qeedf54bq3ulebdos3c', '::1', 1516461508, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363436313231383b),
('j05prnacugd91i6ir3uejb5g1ijpkans', '::1', 1516894539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839343437303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('j730mni2gm284d87s2ahelkmepm232sm', '::1', 1516973244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937333233323b),
('j9ihcjsns1j5pqc334p62bhrhei4068e', '::1', 1516310633, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363331303434333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('jlobqavnd8fuoprqob9egobeq1lou81l', '::1', 1516803316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830333331363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('k70gkav6e54urv5ae13cakhphpe0ovib', '::1', 1516367654, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336373635333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('k9akirpnm4aq3umlm4qru7etogpdoqri', '::1', 1516461816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363436313535373b),
('kfqf02ivhg33697ievt8h7ubs77vepra', '::1', 1516432132, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363433323031383b),
('kksvgo3tp66uan7an3n8qagtu6nsg49c', '::1', 1517236819, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233363731313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ldmgas2durmdblghbsbjojkpo4sp3t0o', '::1', 1516360963, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336303735343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('lnbbftgfoidcq2u1us3ua4p3cp088ejp', '::1', 1516456866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435363538393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('locvcb3ko0otjt13kg35qm1kmsq66mjr', '::1', 1516370405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337303131343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('lri13h8ag0386hjkeb9u7992g6s89cs6', '::1', 1516973141, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937323834383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('m8vm2d3lhied0vsnuth8e9e3feq88b36', '::1', 1516373518, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337333335393b),
('mag720p3130ufb5qvqjmjgjvju06t33h', '::1', 1516429244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363432393234333b),
('mqabri33ecm709ativu58ktlk3vtlqka', '::1', 1516888983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363838383836383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('mufr9evrnccl5s5basued33ul6tgs3tc', '::1', 1516897432, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839373234343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('n439gk462j93f9mj1e2vm3jh71cq09do', '::1', 1517229292, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373232393132343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ngj3q7ha9oadaeipn9nvju0mosv4tj0u', '::1', 1516372141, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337323031383b),
('nltpina201i9ov2op4cqu66lu67nuhn5', '::1', 1516902397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363930323230393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('o6rcavsm095jq6nsm6bllj0dci93m0vn', '::1', 1517235677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233353633353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('o85ojgf47dur9lo87mtqlhgfn2m4rn66', '::1', 1516809558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830393532373b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('op0hohkgllg5pnf9ksr45ln6u8fhg1t0', '::1', 1516306285, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330363238353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ost75mti9v2ltvhkvfhkic3o5uq2np04', '::1', 1516457017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435363934343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('osv1hc9rkocgugrt1a70o7juti1gfi1t', '::1', 1516380264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338303135323b),
('p79v2lvl7gc53csfm99dlbc6313809tt', '::1', 1517231775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233313737353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('pkao3kbpteimsmfmo7a0da960c4k1d40', '::1', 1516898610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839383435333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('po8lf0b70g8v6hkrim2q5nkjfl8jacff', '::1', 1516786955, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363738363636383b),
('pou9k65ckhklmuridk6i9eie80ajsjhp', '::1', 1516807538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830373439383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ppr7r258uumg8een9p3e7nu2a27qo3bs', '::1', 1516378973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337383733333b),
('ps4945h4a3crip618lcjg3dj0q47r4b2', '::1', 1516801405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830313338303b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('qik8gblnvvq7je9tda6g6m53id22fak6', '::1', 1516378734, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337383733343b),
('qq081i3pfh9u1g4isp1negiuuue1abuk', '::1', 1516808916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363830383931313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('qs5n7a2bg4g23qhjj8ejni9stletuvl4', '::1', 1516306035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330353834313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('r9pqbv413bjfto5bpheot63nmcfljm20', '::1', 1517230806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233303636313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('rqaqkc31mk8145449ssi5bkjg8e668tc', '::1', 1516364029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336333832363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('rrhks7uf5rvr6ovd5vpurrcp61v8kmfm', '::1', 1516888528, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363838383337323b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('s9l9d8hn20pm8pkujug0shvb7nl5d8tg', '::1', 1516372525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363337323432333b),
('sab221l90vq0lvaljs5sci6cardbgkgg', '::1', 1516363637, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336333436333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('seps9egfdp4c67n4mk7nlh4tuhojdvhu', '::1', 1516432982, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363433323938313b),
('sl96qjmgl80j8f8fm338rlqr308534dp', '::1', 1517234930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373233343831383b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('t7793scpt5dq2rj5mtboi64nnkdlgrb5', '::1', 1517229717, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531373232393435363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('t8gjnfb8l8nmh5hd90q3u99phiid7k9q', '::1', 1516787633, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363738373433363b),
('timpghcumhmu6jo8ef40o1cd70u3g2dk', '::1', 1516462341, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363436323031373b),
('tje55ei6sfehag68lvaj4mn18f9p66i2', '::1', 1516976394, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363937363132313b),
('truhj1pdk9gevjbe72j5tmrqui0c7jql', '::1', 1516900285, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363930303238353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('tu7rujqhc495d7tjg6vghgjmnopa6ff2', '::1', 1516362849, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363336323631353b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('u956i7ngj9651fng3dj6j73v9v4k8sdr', '::1', 1516892006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839313938393b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('ue2ffifli6i0u981fi2d2hccdae11ahj', '::1', 1516382025, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363338313834323b),
('ufj8dvq536f8gcvqru0abfosejl3gi0h', '::1', 1516969562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363936393433343b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('v1je9lbu63ud07hrgct1at7rugkddbnf', '::1', 1516894065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363839333830333b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('v9h6ukrc3fk3migtbhmcri5a64jdpmv9', '::1', 1516458662, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363435383635353b),
('vhs06chr72gsgcjvdnf699me9k14rccq', '::1', 1516799985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363739393736363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('vuhp0g00d6btg5ckgn0dio0h1oq3acrl', '::1', 1516901737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363930313434363b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b),
('vungvog0nc047lv701u3mul4oqgel9kr', '::1', 1516301644, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363330313534313b61646d696e5f69647c733a313a2231223b757365726e616d657c733a363a227461696c6f72223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `item_pictures`
--

CREATE TABLE IF NOT EXISTS `item_pictures` (
`image_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_pictures`
--

INSERT INTO `item_pictures` (`image_id`, `item_id`, `item_image_path`) VALUES
(7, 4, 'c2.jpg'),
(8, 4, 'c3.jpg'),
(9, 4, 'c5.jpg'),
(10, 5, 'c21.jpg'),
(11, 5, 'c31.jpg'),
(12, 5, 'c51.jpg'),
(13, 6, 'c22.jpg'),
(14, 6, 'c32.jpg'),
(15, 6, 'c52.jpg'),
(16, 6, 'd4.jpg'),
(17, 7, 'c4.jpg'),
(18, 7, 'c6.jpg'),
(19, 7, 'd2.jpg'),
(20, 8, 'd5.jpg'),
(22, 9, 'd3.jpg'),
(23, 9, 'd41.jpg'),
(24, 9, 'd1.jpg'),
(26, 10, 'c53.jpg'),
(28, 10, 'c34.jpg'),
(29, 10, 'd21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`id` int(5) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `training` enum('yes','no') NOT NULL DEFAULT 'no',
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `firstName`, `phone`, `email`, `message`, `training`, `time`) VALUES
(5, 'Godspower', '08058866352', 'itedjereg77@gmail.com', 'Message...', 'yes', '1517237159'),
(6, 'Ufuoma Odogun', '08058866352', 'itedjereg77@gmail.com', 'Message...', 'no', '1517237178');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`order_id` int(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` enum('open','closed') NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `first_name`, `phone`, `email`, `information`, `product_id`, `status`, `time`) VALUES
(1, 'Ufuoma Odogun', '08058866352', 'itedjereg77@gmail.com', 'Thank you so much ', 6, 'closed', '1517229222');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_category_id` int(20) NOT NULL,
  `featured` enum('yes','no') NOT NULL DEFAULT 'no',
  `product_added_date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_slug`, `product_description`, `product_price`, `product_category_id`, `featured`, `product_added_date`) VALUES
(4, 'Flowery Gown', 'flowery-gown1516369990', 'Proin vestibulum scelerisque tempus. Phasellus at fermentum erat. Pellentesque mattis velit eget elit condimentum gravida. Donec vehicula mollis velit, a eleifend est hendrerit quis. Etiam pulvinar at ex eget cursus. Etiam luctus orci ut tortor rhoncus, s', '5000', 2, 'yes', '1516369990'),
(5, 'Blouse & Skirt', 'blouse-skirt1516370055', 'Proin vestibulum scelerisque tempus. Phasellus at fermentum erat. Pellentesque mattis velit eget elit condimentum gravida. Donec vehicula mollis velit, a eleifend est hendrerit quis. Etiam pulvinar at ex eget cursus. Etiam luctus orci ut tortor rhoncus, s', '6000', 2, 'yes', '1516370055'),
(6, 'ANKARA', 'ankara1516370115', 'Proin vestibulum scelerisque tempus. Phasellus at fermentum erat. Pellentesque mattis velit eget elit condimentum gravida. Donec vehicula mollis velit, a eleifend est hendrerit quis. Etiam pulvinar at ex eget cursus. Etiam luctus orci ut tortor rhoncus, s', '7500', 2, 'yes', '1516370115'),
(7, 'Embroided Agbada', 'embroided-agbada1516370268', 'Proin vestibulum scelerisque tempus. Phasellus at fermentum erat. Pellentesque mattis velit eget elit condimentum gravida. Donec vehicula mollis velit, a eleifend est hendrerit quis. Etiam pulvinar at ex eget cursus. Etiam luctus orci ut tortor rhoncus, s', '10,000', 1, 'yes', '1516370268'),
(8, 'Buba Top', 'buba-top1516370400', 'Proin vestibulum scelerisque tempus. Phasellus at fermentum erat. Pellentesque mattis velit eget elit condimentum gravida. Donec vehicula mollis velit, a eleifend est hendrerit quis. Etiam pulvinar at ex eget cursus. Etiam luctus orci ut tortor rhoncus, s', '2700', 1, 'yes', '1516370401'),
(9, 'Buba Tops', 'buba-tops', 'We provide exquisite urban wears for men, women and children using indigenous materials and fabrics, such as Ankara, Adire and Kente. Gella Fashion House also offers exclusive training for upcoming designers, fashion illustrators and pattern making.', '7800', 2, 'yes', '1516456436'),
(10, 'Napkins For Baby', 'napkins-for-baby', 'This napkin for babies is very beautiful', '23, 000', 3, 'no', '1517229456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `item_pictures`
--
ALTER TABLE `item_pictures`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_pictures`
--
ALTER TABLE `item_pictures`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;