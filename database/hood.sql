-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 10:41 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hood`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(255) NOT NULL,
  `profile` longtext NOT NULL,
  `identity` longtext NOT NULL,
  `vision` longtext NOT NULL,
  `mission` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `profile`, `identity`, `vision`, `mission`) VALUES
(1, 'Alejandra Enterprises (AE) is an Information Technology company focusing on computer sales, hardware, document management and custom software development.   AE has built its unrivalled reputation over many years. We pride ourselves on working with our clients to provide a personal, professional and highly efficient service to meet their needs.  AE has set the standard in the evolving field of information technology, delivering the most reliable, full-featured, cost-effective and easy-to-use.   AE has been developing custom software. We are experts in rapid development of software applications designed to meet any organization\'s specific requirements and deliver solutions that exceed customer expectations.  AE have been providing high quality computer systems, servers and Multi-Function Printers /Copiers. Our level of expertise in the computer industry, together with a commitment to a constantly improving customer service, is the reason for our standing as one of the leading Computer hardware provider today.  ALEJANDRA ENTERPRISES, has its corporate office at Ground Floor, Doña Alejandra Building, Rizal St. corner Gomez St., Tuguegarao City, Cagayan.', 'ALEJANDRA ENTERPRISES has cultivated a clear and cohesive image representing our vision for the future.  As organizations struggle with the challenges of implementing and integrating new technologies into their existing environment, the need for specialized expertise with technologies and the process of systems integration become more critical. AE works with our clients to understand their goals and we have a clear vision on how to seamlessly integrate an accelerated solution to help meet these goals.  Our identity has made a strong impact on our clients.  Our name alone gives our clients a concise idea of what they can expect in terms of products and services from us.  We believe that people will stay loyal and continue to patronize   us if we respect and fill their needs. Imparting a high level of CUSTOMER SATISFACTION to our clients is the core component of our business strategy.', 'DOÑA ALEJANDRA INCORPORATED is committed to customer satisfaction, Personal service,\r\nQuality brands, Reliable people, and the human touch. Humble beginnings taught our company that the best way to seal a contract is with strong handshake and a warm smile. This attitude has been kept alive by our people in everything they do.  We want to be known as the company that pays attention to small details, the ones that our competitors take for granted, and the ones that people appreciate most of all.\r\n', 'To offer high quality products and services at a competitive price that will meet and exceed the demand and expectations of the market.\r\nWe advocate a competitive environment that focuses on total customer satisfaction. Out growing clientele attest to our commitment to foster healthy and beneficial ties with our industry partners.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `transaction_no`) VALUES
(1, 32, 30, 10, '00001'),
(2, 36, 31, 10, '00002'),
(3, 33, 30, 10, '00003'),
(4, 37, 30, 10, '00004'),
(5, 37, 31, 10, '00004'),
(6, 38, 30, 10, '00005'),
(7, 38, 31, 10, '00005'),
(8, 39, 34, 5, '00006'),
(9, 40, 34, 155, '00007');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(2, 'Desktop- PC', 'Desktop-Pc'),
(5, 'Printers', 'Printers'),
(6, 'Notebooks', 'Notebooks'),
(8, 'DLP Projectors', 'Digital LCD Projector'),
(9, 'Monitors', 'Monitors'),
(11, 'Memory Cards', 'Memory Cards'),
(12, 'MotherBoards', 'MotherBoards'),
(13, 'Keyboard', 'Keyboard'),
(14, 'Speakers', 'Speaker'),
(15, 'INKS', 'INKs'),
(16, 'Automatic Voltage Regulator (AVR)', 'Automatic Voltage Regulator (AVR)'),
(17, 'FlashDrives', 'FlashDrives'),
(18, 'Mouse', 'Mouse'),
(19, 'Photocopiers', 'Photocopiers'),
(20, 'Processors', 'Processors');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`) VALUES
(22, 'PAPASA YAN');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `contactno`, `address`) VALUES
(1, 'alejandra_enterprises@yahoo.com', '09277731601', 'Ground Floor, Doña Alejandra Building, Rizal St. corner Gomez St., Tuguegarao City, Cagayan');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `amount_received` int(255) NOT NULL,
  `amount_change` int(255) NOT NULL,
  `bigger_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `transaction_no`, `due_date`, `remarks`, `amount_due`, `amount_received`, `amount_change`, `bigger_amount`) VALUES
(1, '32', '00001', '2020-01-08', 'paid', 0, 62160, 0, 62160),
(2, '32', '00001', '2020-01-22', 'unpaid', 20840, 62160, 0, 62160),
(3, '32', '00001', '2020-02-05', 'unpaid', 41500, 0, 0, 0),
(4, '32', '00001', '2020-02-19', 'unpaid', 41500, 0, 0, 0),
(5, '32', '00001', '2020-03-04', 'unpaid', 41500, 0, 0, 0),
(6, '32', '00001', '2020-03-18', 'unpaid', 41500, 0, 0, 0),
(7, '36', '00002', '2020-01-24', 'paid', 0, 6400, 0, 0),
(8, '36', '00002', '2020-02-07', 'unpaid', 41500, 0, 0, 0),
(9, '36', '00002', '2020-02-21', 'unpaid', 41500, 0, 0, 0),
(10, '36', '00002', '2020-03-06', 'unpaid', 41500, 0, 0, 0),
(11, '36', '00002', '2020-03-20', 'unpaid', 41500, 0, 0, 0),
(12, '36', '00002', '2020-04-03', 'unpaid', 41500, 0, 0, 0),
(13, '33', '00003', '2019-12-23', 'paid', 0, 10235, 0, 0),
(14, '33', '00003', '2020-01-06', 'paid', 0, 15000, 0, 15000),
(15, '33', '00003', '2020-01-20', 'unpaid', 41500, 15000, 0, 15000),
(16, '33', '00003', '2020-02-03', 'unpaid', 41500, 0, 0, 0),
(17, '33', '00003', '2020-02-17', 'unpaid', 41500, 0, 0, 0),
(18, '33', '00003', '2020-03-02', 'unpaid', 41500, 0, 0, 0),
(19, '37', '00004', '2019-12-28', 'unpaid', 41500, 0, 0, 0),
(20, '37', '00004', '2020-01-11', 'unpaid', 41500, 0, 0, 0),
(21, '37', '00004', '2020-01-25', 'unpaid', 41500, 0, 0, 0),
(22, '37', '00004', '2020-02-08', 'unpaid', 41500, 0, 0, 0),
(23, '37', '00004', '2020-02-22', 'unpaid', 41500, 0, 0, 0),
(24, '37', '00004', '2020-03-07', 'unpaid', 41500, 0, 0, 0),
(25, '38', '00005', '2020-01-13', 'paid', 0, 41500, 0, 0),
(26, '38', '00005', '2020-01-27', 'unpaid', 41500, 0, 0, 0),
(27, '38', '00005', '2020-02-10', 'unpaid', 41500, 0, 0, 0),
(28, '38', '00005', '2020-02-24', 'unpaid', 41500, 0, 0, 0),
(29, '38', '00005', '2020-03-09', 'unpaid', 41500, 0, 0, 0),
(30, '38', '00005', '2020-03-23', 'unpaid', 41500, 0, 0, 0),
(31, '39', '00006', '2019-12-28', 'unpaid', 41500, 0, 0, 0),
(32, '39', '00006', '2020-01-11', 'unpaid', 41500, 0, 0, 0),
(33, '39', '00006', '2020-01-25', 'unpaid', 41500, 0, 0, 0),
(34, '39', '00006', '2020-02-08', 'unpaid', 41500, 0, 0, 0),
(35, '39', '00006', '2020-02-22', 'unpaid', 41500, 0, 0, 0),
(36, '39', '00006', '2020-03-07', 'unpaid', 41500, 0, 0, 0),
(37, '40', '00007', '2019-12-29', 'unpaid', 620000, 0, 0, 0),
(38, '40', '00007', '2020-01-12', 'unpaid', 620000, 0, 0, 0),
(39, '40', '00007', '2020-01-26', 'unpaid', 620000, 0, 0, 0),
(40, '40', '00007', '2020-02-09', 'unpaid', 620000, 0, 0, 0),
(41, '40', '00007', '2020-02-23', 'unpaid', 620000, 0, 0, 0),
(42, '40', '00007', '2020-03-08', 'unpaid', 620000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `featured` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `discount`, `photo`, `date_view`, `counter`, `featured`) VALUES
(30, 5, 'EPSON L3110', '<p>All-in-One Ink Tank Printer<br />\r\nColoured: 7,500 pages<br />\r\nBlack and White: 4,500 pages</p>\r\n', 'epson-l3110', 7400, 0, 'epson-l3100_1574349399.jpg', '2019-12-09', 1, 'yes'),
(31, 5, 'EPSON L120', '<p><strong>Print Method:</strong>On-demand inkjet (Piezoelectric)<strong>Maximum Print Resolution:</strong>720 x 720 dpi (with Variable-Sized Droplet Technology)<strong>Minimum Ink Droplet Volume:</strong>3pl<strong>Automatic Duplex Printing:</strong>No<strong>Black Nozzle Configuration:</strong>180<strong>Colour Nozzle Configuration:</strong>59 per colour (Cyan, Magenta, Yellow)<strong>Print Direction:</strong>Bi-directional printing, Uni-directional printing</p>\r\n', 'epson-l120', 4800, 0, 'epson-l120_1574349152.jpg', '2019-11-27', 1, 'yes'),
(33, 6, 'TravelMate B117-M-C42K', '<p>Operating System : Windows 10 Home Single Language 64bit</p>\r\n\r\n<p>Processor : Intel Celeron N3160 1.60GHZ, 2MB Cache, 4Cores, Braswell</p>\r\n\r\n<p>Memory : 2GB (1x 2GB On-Board)&nbsp; DDR3L 1600MHZ Low Voltage Memory</p>\r\n\r\n<p>Display/Graphics : 11.6&quot; HD 1366 x 768 resolution, high-brightness Acer ComfyView LEDbacklit, TFT LCD, Intel HD400 Processor Graphics</p>\r\n\r\n<p>Hard Drive : 500GB SATA 5400RPM</p>\r\n\r\n<p>Communication : Bluetooth4.0, HD webcam 720p</p>\r\n\r\n<p>Optical Drive : N/A</p>\r\n\r\n<p>Audio : High-definition audio support, Two built-in stereo speakers</p>\r\n\r\n<p>Cardreader : SD Card reader</p>\r\n\r\n<p>Networking : Wireless LAN 802.11 ac</p>\r\n\r\n<p>I/O Ports : USB 3.0 port and&nbsp;USB 2.0 port</p>\r\n\r\n<p>HDMI&reg; port with HDCP support, 3.5 mm headphone/speaker jack,&nbsp;</p>\r\n\r\n<p>supporting headsets with built-in microphone</p>\r\n\r\n<p>DC-in jack for AC adapter</p>\r\n\r\n<p>Dimension : 291 (W) x 211 (D) x 22.3 (H) mm (11.46 x 8.31 x 0.88 inches)</p>\r\n\r\n<p>Adapter : 45W</p>\r\n\r\n<p>Weight : 1.4kg (3.09 lbs.)</p>\r\n\r\n<p>Battery Pack : 4 cells</p>\r\n\r\n<p>Keys &amp; Controls : Acer FineTip keyboard with international language support,</p>\r\n\r\n<p>: Multi-gesture touchpad, supporting two-finger scroll; pinch</p>\r\n', 'travelmate-b117-m-c42k', 21900, 0, 'travelmate-b117-m-c42k_1574350092.gif', '0000-00-00', 0, 'no'),
(34, 6, 'TravelMate P238-G2-M-3436', '<p>Operating System ; Windows 10 Home 64-bit</p>\r\n\r\n<p>Processor : Intel Core i3 7130U 2.7GHZ, 3MB Cache, 2Cores</p>\r\n\r\n<p>Memory : 4GB DDR3 1600MHz</p>\r\n\r\n<p>Display : 13.3&quot; HD 1366 x 768 resolution, high-brightness Acer ComfyView LEDbacklit TFT LCD</p>\r\n\r\n<p>: 16:9 aspect ratio&nbsp;Ultra-slim design&nbsp;Mercury free, environment friendly&nbsp;</p>\r\n\r\n<p>Graphics : Intel&reg; HD Graphics 620</p>\r\n\r\n<p>Hard Drive : 1 TB 2.5-inch 5400 RPM</p>\r\n\r\n<p>Camera : HD camera with:&nbsp;1280 x 720 resolution;&nbsp;720p HD audio/video recording;&nbsp;</p>\r\n\r\n<p>High dynamic range imaging (HDR)</p>\r\n\r\n<p>Optical Drive : N/A</p>\r\n\r\n<p>Card Reader : SD Card Reader</p>\r\n\r\n<p>Audio : Compatible with Cortana with Voice</p>\r\n\r\n<p>Certified for Skype for Business</p>\r\n\r\n<p>Acer TrueHarmony technology for lower distortion, wider frequency range,&nbsp;</p>\r\n\r\n<p>headphone-like audio and powerful sound</p>\r\n\r\n<p>Networking : WLAN;&nbsp;Intel&reg; Dual Band Wireless-AC, 802.11ac, featuring 2x2 MIMO technology</p>\r\n\r\n<p>WPAN;&nbsp;Bluetooth&reg; 4.0</p>\r\n\r\n<p>LAN;&nbsp;Gigabit Ethernet, Wake-on-LAN ready</p>\r\n\r\n<p>Speaker : Two built-in stereo speakers</p>\r\n\r\n<p>Built-in digital microphone&nbsp;</p>\r\n\r\n<p>Standard I/O Ports : USB Type-C port: USB 3.1 Gen 1 (up to 5 Gbps)</p>\r\n\r\n<p>USB 3.0 port featuring power-off USB charging</p>\r\n\r\n<p>Two USB 2.0 ports</p>\r\n\r\n<p>Ethernet (RJ-45) port</p>\r\n\r\n<p>HDMI&reg; port with HDCP support&nbsp; WITH HDMI A to VGA cable</p>\r\n\r\n<p>Headphone/speaker jack</p>\r\n\r\n<p>DC-in jack for AC adapter</p>\r\n\r\n<p>Battery Pack : 4-cells Li-ion battery (1year warranty)</p>\r\n\r\n<p>Adaptor : 3-pin 45 W AC adapter</p>\r\n\r\n<p>Weight : 1.5 kg (3.31 lbs.)</p>\r\n\r\n<p>Dimension : 327 (W) x 228 (D) x 19.65/19.65 (H) mm (12.87 x 8.98 x 0.77/0.77 inches)&nbsp;</p>\r\n\r\n<p>Keyboard &amp; Touch Pad : Keyboard</p>\r\n\r\n<p>Acer FineTip keyboard with international language support</p>\r\n\r\n<p>TouchPad</p>\r\n\r\n<p>Multi-gesture touchpad, supporting two-finger scroll; pinch; gestures to open Cortana,&nbsp;</p>\r\n\r\n<p>Action Center, multitasking; application commands&nbsp;</p>\r\n', 'travelmate-p238-g2-m-3436', 30000, 0, 'travelmate-p238-g2-m-3436_1574350537.gif', '2019-12-03', 1, 'no'),
(35, 6, 'TravelMate P249-G3-M-39H4', '<ul>\r\n	<li>Screen Size: 14&quot;</li>\r\n	<li>Processor: Intel Core i3-8130U 2.2GHZ Base Frequency, 3.4GHz Max Turbo Frequency, 4MB Cache, 2Cores</li>\r\n	<li>Memory: 4GB DDR4 2400MHz (upgradable to 32 GB using two soDIMM modules)</li>\r\n	<li>Display/Graphics: 14&quot; HD 1366 x 768 resolution Acer ComfyViewTM LED-backlit TFT LCD, 16:9 aspect ratio, Ultra-slim design, Mercury free, environment friendly , Intel&reg; HD Graphics 620</li>\r\n	<li>Hard Drive: 1TB 2.5-inch 5400 RPM</li>\r\n	<li>Camera</li>\r\n	<li>HD Camera: HD camera with:</li>\r\n	<li>&bull; 1280 x 720 resolution</li>\r\n	<li>&bull; 720p HD audio/video recording</li>\r\n	<li>&bull; High dynamic range imaging (HDR)</li>\r\n	<li>Optical Drive: 8X DVD Writer</li>\r\n	<li>Cardreader: Yes</li>\r\n	<li>Speakers: Two built-in stereo speakers, Built-in digital microphone</li>\r\n	<li>Standard I/O Ports: Two USB 3.0 ports with one featuring power-off USB charging, USB 2.0 port, Ethernet (RJ-45) port, HDMI&reg; port with HDCP support, External display (VGA) port, 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone</li>\r\n	<li>Battery Pack: 4-cell Li-ion battery(1Year Warranty)</li>\r\n	<li>Dimensions(WxDxH): 39cm x 30cm x 7cm</li>\r\n	<li>What&#39;s in the Box: 1x Acer TravelMate P249-G3-M-39H4 14&quot; Laptop, 1x Charger &amp; FREE Acer Backpack</li>\r\n</ul>\r\n', 'travelmate-p249-g3-m-39h4', 30000, 0, 'travelmate-p249-g3-m-39h4_1574650842.png', '0000-00-00', 0, 'no'),
(36, 6, 'TravelMate P249-G3-M-38PF', '<p>Core i3<br />\r\nWindows10<br />\r\nDisplay Size: 14&quot;</p>\r\n', 'travelmate-p249-g3-m-38pf', 28500, 0, 'travelmate-p249-g3-m-38pf_1574651793.png', '0000-00-00', 0, 'no'),
(37, 6, 'TravelMate P2410-G2-M-56FD', '<p>Operating System : Linux</p>\r\n\r\n<p>Processor : Intel Core i5 8250U 1.6GHZ, 6MB Cache, 4 Cores</p>\r\n\r\n<p>Memory : On board 4GB DDR4</p>\r\n\r\n<p>Display : 14&quot; HD 1366 x 768 resolution Acer ComfyViewTM LED-backlit TFT LCD</p>\r\n\r\n<p>16:9 aspect ratio</p>\r\n\r\n<p>Ultra-slim design</p>\r\n\r\n<p>Mercury free, environment friendly&nbsp;</p>\r\n\r\n<p>Graphics : Intel&reg; UHD Graphics 620</p>\r\n\r\n<p>Hard Drive : 1 TB 2.5-inch 5400 RPM</p>\r\n\r\n<p>Camera : HD camera with:&nbsp;1280 x 720 resolution&nbsp;720p HD audio/video recording</p>\r\n\r\n<p>High dynamic range imaging (HDR)</p>\r\n\r\n<p>88 degree wide view angle</p>\r\n\r\n<p>Optical Drive : N/A</p>\r\n\r\n<p>Cardreader : Yes</p>\r\n\r\n<p>Audio : Two built-in stereo speakers</p>\r\n\r\n<p>Built-in digital microphone&nbsp;</p>\r\n\r\n<p>Networking : WLAN:&nbsp;Intel&reg; Dual Band Wireless-AC, 802.11ac, featuring 2x2 MIMO technology</p>\r\n\r\n<p>WPAN:&nbsp;Bluetooth&reg; 4.0</p>\r\n\r\n<p>LAN:&nbsp;Supports Intel&reg; Ethernet Connection I219-LM Gigabit Ethernet&nbsp;</p>\r\n\r\n<p>Speaker : Two built-in stereo speakers</p>\r\n\r\n<p>Built-in digital microphone&nbsp;</p>\r\n\r\n<p>Standard I/O Ports : USB Type-C&trade; port, supporting:</p>\r\n\r\n<p>USB 3.1 Gen 1 (up to 5 Gbps)</p>\r\n\r\n<p>DisplayPort over USB-C</p>\r\n\r\n<p>USB charging 5 V; 3 A</p>\r\n\r\n<p>DC-in port 20 V; 45 W</p>\r\n\r\n<p>USB 3.0 port featuring power-off USB charging</p>\r\n\r\n<p>Three USB 2.0 ports</p>\r\n\r\n<p>HDMI&reg; port with HDCP support</p>\r\n\r\n<p>External display (VGA) port</p>\r\n\r\n<p>Ethernet (RJ-45) port</p>\r\n\r\n<p>Headphone/speaker jack</p>\r\n\r\n<p>DC-in jack for AC adapter&nbsp;</p>\r\n\r\n<p>Battery Pack : 4 cells Li-ion battery (1year warranty)</p>\r\n\r\n<p>Adaptor : 3-pin 45 W AC adapter&nbsp;</p>\r\n\r\n<p>Weight : 1.8 kg (3.97 lbs.) with 4-cell battery pack&nbsp;</p>\r\n\r\n<p>Dimension : 342 (W) x 236 (D) x 21.9/22.3 (H) mm (13.46 x 9.29 x 0.86/0.88 inches)&nbsp;</p>\r\n\r\n<p>Keyboard &amp; Touch Pad : Keyboard</p>\r\n\r\n<p>87-/88-/91-key FineTip keyboard with Home, End, Pg Up, Pg Dn keys,&nbsp;</p>\r\n\r\n<p>international language support, power button</p>\r\n\r\n<p>TouchPad</p>\r\n\r\n<p>Multi-gesture touchpad, supporting two-finger scroll; pinch; gestures to open&nbsp;</p>\r\n\r\n<p>Cortana, Action Center, multitasking; application commands</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'travelmate-p2410-g2-m-56fd', 31500, 0, 'travelmate-p2410-g2-m-56fd_1574651631.gif', '0000-00-00', 0, 'no'),
(39, 6, 'TravelMate P2410-G2-M-542Y', '<p>Core i5<br />\r\nWindows10Pro<br />\r\nDisplay Size: 14&quot;</p>\r\n\r\n<p>jh</p>\r\n', 'travelmate-p2410-g2-m-542y', 38000, 0, 'travelmate-p2410-g2-m-542y_1574651778.gif', '0000-00-00', 0, 'no'),
(40, 6, 'Extensa EX2519-C2AP', '<p>OPERATING SYSTEM: ENDLESS OS</p>\r\n\r\n<p>CPU: Intel Celeron QuadCore 1.6GHz</p>\r\n\r\n<p>RAM: 4GB DDR3 1600MHz</p>\r\n\r\n<p>STORAGE: 1TBHDD</p>\r\n\r\n<p>DISPLAY: 15.6&quot;(1366x768)LED DISPLAY</p>\r\n\r\n<p>CAMERA: 0.3 MEGAPIXEL</p>\r\n', 'extensa-ex2519-c2ap', 20000, 0, 'extensa-ex2519-c2ap_1574664530.jfif', '0000-00-00', 0, 'yes'),
(41, 6, 'Extensa EX2519-P3KW', '', 'extensa-ex2519-p3kw', 21000, 0, 'extensa-ex2519-p3kw_1574652508.jpg', '0000-00-00', 0, 'no'),
(42, 6, 'TravelMate P2510-G2-MG-73Q6', '', 'travelmate-p2510-g2-mg-73q6', 51500, 0, 'travelmate-p2510-g2-mg-73q6_1574659028.jfif', '0000-00-00', 0, 'no'),
(43, 6, 'TravelMate P2510-G2-MG-80T2', '', 'travelmate-p2510-g2-mg-80t2', 53000, 0, 'travelmate-p2510-g2-mg-80t2_1574659041.jfif', '0000-00-00', 0, 'no'),
(44, 6, 'TravelMate P2510-G2-MG-81XH', '', 'travelmate-p2510-g2-mg-81xh', 44400, 0, 'travelmate-p2510-g2-mg-81xh_1574659052.jfif', '0000-00-00', 0, 'no'),
(48, 1, 'Extensa EX2519-C0R5', '<ul>\r\n	<li><strong>Device Type</strong>&nbsp;&ndash; Linux OS Laptop</li>\r\n	<li><strong>Brand</strong>&nbsp;&ndash; Acer</li>\r\n	<li><strong>Model</strong>&nbsp;&ndash; EX2519</li>\r\n	<li><strong>Alternative Name</strong>&nbsp;&ndash; Acer EX2519 Notebook</li>\r\n	<li><strong>CPU Clock speed</strong>&nbsp;&ndash; Quad Core 1.6GHz</li>\r\n	<li><strong>Chipset</strong>&nbsp;&ndash; Intel Celeron N3160, 64-bit Processor</li>\r\n	<li><strong>GPU</strong>&nbsp;&ndash; Intel GMA HD 400</li>\r\n	<li><strong>Camera</strong>&nbsp;&ndash; Single 0.3 Megapixel Front-facing&nbsp;camera</li>\r\n	<li><strong>Memory</strong>&nbsp;&ndash; RAM 4GB DDR3 RAM | Storage 128GB SSD Storage Capacity</li>\r\n	<li><strong>Display</strong>&nbsp;&ndash; 15.6 Inch, 1366 x 768 Pixel, with LED Display,&nbsp;and Aspect Ratio 16:9</li>\r\n	<li><strong>Dimension</strong>&nbsp;&ndash; 37.70 x 25.60 x 2.60 cm</li>\r\n	<li><strong>Weight</strong>&nbsp;&ndash; 2.0990 Kg</li>\r\n	<li><strong>Battery</strong>&nbsp;&ndash; 3,270 mAh Lithium-Ion Battery</li>\r\n	<li><strong>Connectors</strong>&nbsp;-1 x USB 3.0 + 2 x USB 2.0, SD Card Slot, Mini HDMI Port, 3.5 mm Headset Jack,&nbsp;RJ45 connector</li>\r\n	<li><strong>Input</strong>&nbsp;&ndash; Power, Keyboard, Mouse</li>\r\n	<li><strong>Color</strong>&nbsp;&ndash; Black</li>\r\n	<li><strong>Optical Storage</strong>&nbsp;&ndash;&nbsp;Not Included</li>\r\n	<li><strong>Sensor</strong>&nbsp;&ndash; Not Available</li>\r\n	<li><strong>Operating System</strong>&nbsp;&ndash; Linux OS, 64-bit OS (English Version)</li>\r\n	<li><strong>Version</strong>&nbsp;&ndash; Three Variants Available 128GB SSD ROM / 4GB DDR3 RAM, 1TB HDD ROM / 4GB DDR3 RAM &amp; 500GB HDD ROM / 4GB DDR3 RAM</li>\r\n</ul>\r\n', 'extensa-ex2519-c0r5', 21000, 0, 'extensa-ex2519-c0r5_1574349701.jpg', '2019-11-28', 1, 'yes'),
(49, 1, 'Extensa EX2519-P06C', '', 'extensa-ex2519-p06c', 22500, 0, 'extensa-ex2519-p06c_1574664654.jfif', '0000-00-00', 0, 'yes'),
(50, 1, 'TravelMate TMP249-G2-M-37J1', '', 'travelmate-tmp249-g2-m-37j1', 30870, 0, 'travelmate-tmp249-g2-m-37j1_1574659085.jfif', '2019-11-28', 1, 'no'),
(51, 1, 'TravelMate TMP249-G2-M-35M6', '', 'travelmate-tmp249-g2-m-35m6', 27700, 0, 'travelmate-tmp249-g2-m-35m6_1574659066.jfif', '0000-00-00', 0, 'yes'),
(52, 1, 'TravelMateTMP249-G2-MG-59C5', '', 'travelmatetmp249-g2-mg-59c5', 30700, 0, 'travelmatetmp249-g2-mg-59c5_1574659145.jfif', '0000-00-00', 0, 'no'),
(53, 1, 'TravelMateTMP249-G2-MG-50ET', '', 'travelmatetmp249-g2-mg-50et', 33800, 0, 'travelmatetmp249-g2-mg-50et_1574659121.jfif', '0000-00-00', 0, 'no'),
(54, 1, 'TravelMateTMP249-G2-MG-53AJ', '', 'travelmatetmp249-g2-mg-53aj', 37700, 0, 'travelmatetmp249-g2-mg-53aj_1574659134.jfif', '0000-00-00', 0, 'no'),
(55, 1, 'TravelMate TMP249-M-C2VF', '', 'travelmate-tmp249-m-c2vf', 20500, 0, 'travelmate-tmp249-m-c2vf_1574659105.jfif', '0000-00-00', 0, 'no'),
(56, 1, 'Aspire A315-41-r287', '<p>Model : Acer Aspire&nbsp;3 A315-41-R287 - Obsidian Black</p>\r\n\r\n<p>Operating System : Windows 10 Home</p>\r\n\r\n<p>Processor : AMD Ryzen 3 2200U 2.5 GHz; Dual-core</p>\r\n\r\n<p>Memory : 4GB DDR4, Up to 16 GB (maximum)</p>\r\n\r\n<p>Card Reader : SD Card</p>\r\n\r\n<p>Storage : 1TB hard&nbsp;drive</p>\r\n\r\n<p>Screen : 15.6&quot; HD (1366 x 768) resolution</p>\r\n\r\n<p>Graphics : AMD Radeon Vega 3, DDR4 Shared graphics memory</p>\r\n\r\n<p>Connectivity : 802.11ac wireless LAN</p>\r\n\r\n<p>Gigabit LAN</p>\r\n\r\n<p>Audio &amp; Video : 640 x 480 webcam</p>\r\n\r\n<p>digital Microphone</p>\r\n\r\n<p>1 x Speaker</p>\r\n\r\n<p>300 Kilopixel (Front camera)</p>\r\n\r\n<p>Ports &amp; Connectors : 1x USB 3.0</p>\r\n\r\n<p>2x USB 2.0</p>\r\n\r\n<p>Network (RJ-45)</p>\r\n\r\n<p>HDMI Output</p>\r\n\r\n<p>Input Devices : TouchPad</p>\r\n\r\n<p>Non-backlit keyboard</p>\r\n\r\n<p>Battery : 2-cell 4810 mAh Li-Polymer</p>\r\n\r\n<p>Dimensions&nbsp; : 15.02&quot; x 10.35&quot; x 0.98&quot;</p>\r\n\r\n<p>Weight&nbsp; : 5.1 lb</p>\r\n\r\n<p>Package Contents : Aspire 3 A315-41-R287</p>\r\n\r\n<p>Lithium Polymer Battery</p>\r\n', 'aspire-a315-41-r287', 25100, 0, 'aspire-a315-41-r287_1574348115.gif', '0000-00-00', 0, 'no'),
(57, 1, 'Aspire A315-41G-R5U3', '<p>Model : Acer Aspire&nbsp;3 A315-41G-R5U3 - Obsidian Black</p>\r\n\r\n<p>Operating System : Windows 10 Home</p>\r\n\r\n<p>Processor : AMD Ryzen 3 2200U 2.5 GHz; Dual-core</p>\r\n\r\n<p>Memory : 4GB DDR4, Up to 16 GB (maximum)</p>\r\n\r\n<p>Card Reader : SD Card</p>\r\n\r\n<p>Storage : 1TB hard&nbsp;drive</p>\r\n\r\n<p>Screen : 15.6&quot; HD (1366 x 768) resolution</p>\r\n\r\n<p>Graphics : 2GB&nbsp;AMD Radeon 535</p>\r\n\r\n<p>Connectivity : 802.11ac wireless LAN</p>\r\n\r\n<p>Gigabit LAN</p>\r\n\r\n<p>Audio &amp; Video : 640 x 480 webcam</p>\r\n\r\n<p>digital Microphone</p>\r\n\r\n<p>1 x Speaker</p>\r\n\r\n<p>300 Kilopixel (Front camera)</p>\r\n\r\n<p>Ports &amp; Connectors : 1x USB 3.0</p>\r\n\r\n<p>2x USB 2.0</p>\r\n\r\n<p>Network (RJ-45)</p>\r\n\r\n<p>HDMI Output</p>\r\n\r\n<p>Input Devices : TouchPad</p>\r\n\r\n<p>Non-backlit keyboard</p>\r\n\r\n<p>Battery : 2-cell 4810 mAh Li-Polymer</p>\r\n\r\n<p>Dimensions&nbsp; : 15.02&quot; x 10.35&quot; x 0.98&quot;</p>\r\n\r\n<p>Weight&nbsp; : 5.1 lb</p>\r\n\r\n<p>Package Contents : Aspire 3 Laptop</p>\r\n\r\n<p>Lithium Polymer Battery</p>\r\n\r\n<p>AC Adapter</p>\r\n', 'aspire-a315-41g-r5u3', 26800, 0, 'aspire-a315-41g-r5u3_1574348792.gif', '2019-11-23', 1, 'no'),
(58, 1, 'Aspire A315-41-R4BW', '<p>Model : Acer Aspire 3 A315-41G-R4BW - Obsidian Black</p>\r\n\r\n<p>Operating System : Windows 10 Home</p>\r\n\r\n<p>Processor : AMD Ryzen 5 2500U</p>\r\n\r\n<p>Memory : 4GB DDR4, Up to 16 GB (maximum)</p>\r\n\r\n<p>Card Reader : SD Card</p>\r\n\r\n<p>Storage : 1TB hard drive</p>\r\n\r\n<p>Screen : 15.6&quot; FHD (1920 x 1080) resolution</p>\r\n\r\n<p>Graphics : 2GB&nbsp;AMD Radeon 535</p>\r\n\r\n<p>Connectivity : 802.11ac wireless LAN</p>\r\n\r\n<p>Gigabit LAN</p>\r\n\r\n<p>Audio &amp; Video : 640 x 480 webcam</p>\r\n\r\n<p>digital Microphone</p>\r\n\r\n<p>1 x Speaker</p>\r\n\r\n<p>300 Kilopixel (Front camera)</p>\r\n\r\n<p>Ports &amp; Connectors : 1x USB 3.0</p>\r\n\r\n<p>2x USB 2.0</p>\r\n\r\n<p>Network (RJ-45)</p>\r\n\r\n<p>HDMI Output</p>\r\n\r\n<p>Input Devices : TouchPad</p>\r\n\r\n<p>Non-backlit keyboard</p>\r\n\r\n<p>Battery : 2-cell 4810 mAh Li-Polymer</p>\r\n\r\n<p>Dimensions&nbsp; : 15.02&quot; x 10.35&quot; x 0.98&quot;</p>\r\n\r\n<p>Weight&nbsp; : 5.1 lb</p>\r\n\r\n<p>Package Contents : Aspire 3 Laptop</p>\r\n\r\n<p>Lithium Polymer Battery</p>\r\n\r\n<p>AC Adapter</p>\r\n', 'aspire-a315-41-r4bw', 31900, 0, 'aspire-a315-41-r4bw_1574348451.gif', '0000-00-00', 0, 'no'),
(59, 8, 'EPSON PROJECTOR EB-S41', '<p>Ideal for the meeting and huddle rooms, the affordable Epson EB-S41 projector is a multi-functional, packed with features and the perfect choice to present true-to-life images. Captivating presentations are now possible with stunning colour and white brightness of up to 3,300 lumens to ensure crystal clear images. The intuitive home screen puts all commonly used functions together for easy selection.</p>\r\n\r\n<ul>\r\n	<li>White and Colour Brightness at 3,300lm</li>\r\n	<li>10,000 hours lamp life in eco-mode</li>\r\n	<li>Horizontal keystone slider</li>\r\n	<li>High contrast ratio of 15,000:1</li>\r\n	<li>SVGA resolution</li>\r\n</ul>\r\n', 'epson-projector-eb-s41', 20900, 0, 'epson-projector-eb-s41_1574664711.gif', '0000-00-00', 0, 'no'),
(60, 1, 'Acer TMP2410-G2-M-56FD I5', '<p>Operating System : Linux</p>\r\n\r\n<p>Processor : Intel Core i5 8250U 1.6GHZ, 6MB Cache, 4 Cores</p>\r\n\r\n<p>Memory : On board 4GB DDR4</p>\r\n\r\n<p>Display : 14&quot; HD 1366 x 768 resolution Acer ComfyViewTM LED-backlit TFT LCD</p>\r\n\r\n<p>16:9 aspect ratio</p>\r\n\r\n<p>Ultra-slim design</p>\r\n\r\n<p>Mercury free, environment friendly&nbsp;</p>\r\n\r\n<p>Graphics : Intel&reg; UHD Graphics 620</p>\r\n\r\n<p>Hard Drive : 1 TB 2.5-inch 5400 RPM</p>\r\n\r\n<p>Camera : HD camera with:&nbsp;1280 x 720 resolution&nbsp;720p HD audio/video recording</p>\r\n\r\n<p>High dynamic range imaging (HDR)</p>\r\n\r\n<p>88 degree wide view angle</p>\r\n\r\n<p>Optical Drive : N/A</p>\r\n\r\n<p>Cardreader : Yes</p>\r\n\r\n<p>Audio : Two built-in stereo speakers</p>\r\n\r\n<p>Built-in digital microphone&nbsp;</p>\r\n\r\n<p>Networking : WLAN:&nbsp;Intel&reg; Dual Band Wireless-AC, 802.11ac, featuring 2x2 MIMO technology</p>\r\n\r\n<p>WPAN:&nbsp;Bluetooth&reg; 4.0</p>\r\n\r\n<p>LAN:&nbsp;Supports Intel&reg; Ethernet Connection I219-LM Gigabit Ethernet&nbsp;</p>\r\n\r\n<p>Speaker : Two built-in stereo speakers</p>\r\n\r\n<p>Built-in digital microphone&nbsp;</p>\r\n\r\n<p>Standard I/O Ports : USB Type-C&trade; port, supporting:</p>\r\n\r\n<p>USB 3.1 Gen 1 (up to 5 Gbps)</p>\r\n\r\n<p>DisplayPort over USB-C</p>\r\n\r\n<p>USB charging 5 V; 3 A</p>\r\n\r\n<p>DC-in port 20 V; 45 W</p>\r\n\r\n<p>USB 3.0 port featuring power-off USB charging</p>\r\n\r\n<p>Three USB 2.0 ports</p>\r\n\r\n<p>HDMI&reg; port with HDCP support</p>\r\n\r\n<p>External display (VGA) port</p>\r\n\r\n<p>Ethernet (RJ-45) port</p>\r\n\r\n<p>Headphone/speaker jack</p>\r\n\r\n<p>DC-in jack for AC adapter&nbsp;</p>\r\n\r\n<p>Battery Pack : 4 cells Li-ion battery (1year warranty)</p>\r\n\r\n<p>Adaptor : 3-pin 45 W AC adapter&nbsp;</p>\r\n\r\n<p>Weight : 1.8 kg (3.97 lbs.) with 4-cell battery pack&nbsp;</p>\r\n\r\n<p>Dimension : 342 (W) x 236 (D) x 21.9/22.3 (H) mm (13.46 x 9.29 x 0.86/0.88 inches)&nbsp;</p>\r\n\r\n<p>Keyboard &amp; Touch Pad : Keyboard</p>\r\n\r\n<p>87-/88-/91-key FineTip keyboard with Home, End, Pg Up, Pg Dn keys,&nbsp;</p>\r\n\r\n<p>international language support, power button</p>\r\n\r\n<p>TouchPad</p>\r\n\r\n<p>Multi-gesture touchpad, supporting two-finger scroll; pinch; gestures to open&nbsp;</p>\r\n\r\n<p>Cortana, Action Center, multitasking; application commands</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'acer-tmp2410-g2-m-56fd-i5', 28200, 0, 'acer-tmp2410-g2-m-56fd-i5.gif', '0000-00-00', 0, 'yes'),
(61, 1, 'Acer A315-53-389', '<p>perating System : Windows 10 Home</p>\r\n\r\n<p>Processor : Intel Core&nbsp; i3-7020U Processor (3M Cache, 2.30 GHz)</p>\r\n\r\n<p>Memory : 4GB DDR4, Up to 16 GB (maximum)</p>\r\n\r\n<p>Card Reader : SD Card</p>\r\n\r\n<p>Storage : 1TB Hard Disk Drive</p>\r\n\r\n<p>Screen : 15.6&quot; HD LED Display</p>\r\n\r\n<p>Optical Drive : NO ODD</p>\r\n\r\n<p>Graphics : Integrated Graphics</p>\r\n\r\n<p>Connectivity : 802.11ac wireless LAN</p>\r\n\r\n<p>Gigabit LAN</p>\r\n\r\n<p>Audio &amp; Video : 640 x 480 webcam,&nbsp;digital Microphone</p>\r\n\r\n<p>1 x Speaker</p>\r\n\r\n<p>300 Kilopixel (Front camera)</p>\r\n\r\n<p>Ports &amp;&nbsp;Connectors : 1x USB 3.0</p>\r\n\r\n<p>2x USB 2.0</p>\r\n\r\n<p>Network (RJ-45)</p>\r\n\r\n<p>HDMI Output</p>\r\n\r\n<p>Input Devices : TouchPad</p>\r\n\r\n<p>Non-backlit keyboard</p>\r\n\r\n<p>Battery : 2-cell 4810 mAh Li-Polymer</p>\r\n\r\n<p>Dimensions&nbsp; : 15.02&quot; x 10.35&quot; x 0.98&quot;</p>\r\n\r\n<p>Weight&nbsp; : 5.1 lb</p>\r\n\r\n<p>Package Contents : Aspire 3 Laptop</p>\r\n\r\n<p>Lithium Polymer Battery</p>\r\n\r\n<p>AC Adapter</p>\r\n', 'acer-a315-53-389', 25000, 0, 'acer-a315-53-389.gif', '0000-00-00', 0, 'no'),
(62, 9, 'Acer Monitor 18.5', '', 'acer-monitor-18-5', 3850, 0, 'acer-monitor-18-5.jpg', '0000-00-00', 0, 'no'),
(63, 11, 'AITC 4GB MEMORY DDR4', '<h1>AITC 2400MHz 4gb ddr4 ram price DDR4 Module for pc memory ram</h1>\r\n\r\n<p>&nbsp;</p>\r\n', 'aitc-4gb-memory-ddr4', 1200, 0, 'aitc-4gb-memory-ddr4_1574653640.jpg', '2019-11-27', 1, 'no'),
(64, 11, 'AITC 4GB MEMORY DDR3', '<p>AITC ram module ddr3 4gb 1600 4gb ram laptop ddr3 memory</p>\r\n', 'aitc-4gb-memory-ddr3', 1200, 0, 'aitc-4gb-memory-ddr3_1574653687.jpg', '0000-00-00', 0, 'no'),
(65, 12, 'AMD RYZEN 3 2200G + MSI A320M', '<p>&nbsp;</p>\r\n\r\n<p>VARIATION BUNDLE : 1. MSI A320M 2. GIGABYTE A320M -H</p>\r\n\r\n<p>High-Performance Processing Intelligent, revolutionary AMD Ryzen&trade; processors are designed to bring you the ultimate, high-performance computing experience. The latest revolutionary AMD multi-threaded processing technology gives you blazing fast performance when you work or play. The Graphics of &ldquo;Vega&rdquo;Powerful Radeon&trade; Vega graphics deliver fast, smooth and fluid performance on the games you love to play. with Radeon&trade; Vega Graphics AMD A320 Chips MSI A320M motherboard supports AMD&reg; RYZEN series processors and 7th Gen A-series / Athlon&trade; Processors for socket AM4. Military Class 4, Guard-Pro: Latest evolution in high</p>\r\n', 'amd-ryzen-3-2200g-msi-a320m', 7320, 0, 'amd-ryzen-3-2200g-msi-a320m_1574654058.jfif', '0000-00-00', 0, 'no'),
(66, 12, 'AMD RYZEN 5 2600 + MSI A320M', '<p>High-Performance Processing Intelligent, revolutionary AMD Ryzen&trade; processors are designed to bring you the ultimate, high-performance computing experience. The latest revolutionary AMD multi-threaded processing technology gives you blazing fast performance when you work or play. The Graphics of &ldquo;Vega&rdquo;Powerful Radeon&trade; Vega graphics deliver fast, smooth and fluid performance on the games you love to play. with Radeon&trade; Vega Graphics AMD A320 Chips MSI A320M motherboard supports AMD&reg; RYZEN series processors and 7th Gen A-series / Athlon&trade; Processors for socket AM4. Military Class 4, Guard-Pro: Latest evolution in high</p>\r\n', 'amd-ryzen-5-2600-msi-a320m', 9260, 0, 'amd-ryzen-5-2600-msi-a320m_1574654392.jfif', '0000-00-00', 0, 'yes'),
(67, 5, 'Brother Drumkit DR-3455', '', 'brother-drumkit-dr-3455', 190, 0, 'brother-drumkit-dr-3455.png', '0000-00-00', 0, 'no'),
(68, 13, 'Avaya Keyboard and Mouse', '', 'avaya-keyboard-and-mouse', 700, 0, 'avaya-keyboard-and-mouse_1574659804.jfif', '0000-00-00', 0, 'no'),
(69, 14, 'Avaya Speaker', '', 'avaya-speaker', 190, 0, 'avaya-speaker.jfif', '2019-11-27', 1, 'no'),
(70, 15, 'Brother INK L3617 CYAN', '', 'brother-ink-l3617-cyan', 750, 0, 'brother-ink-l3617-cyan_1574655293.jfif', '0000-00-00', 0, 'no'),
(71, 15, 'Brother INK L3617 MAGENTA', '', 'brother-ink-l3617-magenta', 750, 0, 'brother-ink-l3617-magenta.jpg', '0000-00-00', 0, 'no'),
(72, 15, 'Brother INK L3617 YELLOW', '', 'brother-ink-l3617-yellow', 750, 0, 'brother-ink-l3617-yellow.jfif', '0000-00-00', 0, 'no'),
(73, 5, 'Brother Printer MFC J2330DW', '<h2>Multi-function Business Inkjet Colour Printer</h2>\r\n\r\n<ul>\r\n	<li>Print</li>\r\n	<li>Scan</li>\r\n	<li>Copy</li>\r\n	<li>Fax</li>\r\n</ul>\r\n', 'brother-printer-mfc-j2330dw', 12950, 0, 'brother-printer-mfc-j2330dw.jfif', '0000-00-00', 0, 'no'),
(74, 5, 'Brother Printer DCP2540DW', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Printer Type</p>\r\n			</td>\r\n			<td>\r\n			<p>Laser</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Print Method</p>\r\n			</td>\r\n			<td>\r\n			<p>Electrophotographic Laser Printer</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Memory Capacity</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700D/MFC-L2701D/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW)</p>\r\n\r\n			<p>32 MB</p>\r\n\r\n			<p>(HL-L2380DW/DCP-L2560DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>64 MB</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>LCD (liquid crystal display)</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700D/MFC-L2701D/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW)</p>\r\n\r\n			<p>16 characters x 2 lines</p>\r\n\r\n			<p>(HL-L2380DW/DCP-L2560DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>2.7 in. (67.5 mm)&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e103\">*1</a>&nbsp;TFT&nbsp;Colour&nbsp;Touchscreen LCD and Touchpanel</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Power Source</p>\r\n			</td>\r\n			<td>\r\n			<p>220 - 240 V AC 50/60Hz</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"10\">\r\n			<p>Power Consumption</p>\r\n\r\n			<p>(Average)</p>\r\n			</td>\r\n			<td>\r\n			<p>Peak&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Approximately 1104 W</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Printing&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>(DCP-L2500D/DCP-L2520DW/MFC-L2700DW)</p>\r\n\r\n			<p>TBD</p>\r\n\r\n			<p>(DCP-L2520D/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2700D/MFC-L2701D/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Approximately 510 W at 23 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Printing (Quiet Mode)&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Approximately 313 W at 23 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Copying&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>(DCP-L2500D/DCP-L2520DW/MFC-L2700DW)</p>\r\n\r\n			<p>TBD</p>\r\n\r\n			<p>(DCP-L2520D/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2700D/MFC-L2701D/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Approximately 510 W at 23 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Copying (Quiet Mode)&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Approximately 313 W at 23 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Ready&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Approximately 60 W at 23 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sleep&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Approximately 6.6 W</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Networked Standby&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e327\">*3</a>&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e329\">*4</a></p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700D/MFC-L2701D/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW)</p>\r\n\r\n			<p>TBD</p>\r\n\r\n			<p>(HL-L2380DW/DCP-L2560DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>TBD</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Deep Sleep&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700D/MFC-L2701D/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW)</p>\r\n\r\n			<p>Approximately 1.1 W</p>\r\n\r\n			<p>(HL-L2380DW/DCP-L2560DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Approximately 1.2 W</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Power Off&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e143\">*2</a>&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e415\">*5</a>&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e417\">*6</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Approximately 0.08 W</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Dimensions</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700DW/MFC-L2701DW/MFC-L2700D/MFC-L2701D/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><img src=\"https://support.brother.com/g/s/id/spec/cv_dcpl2500d/en-asoc/img/GUID-131B60B5-CEF4-4402-83EB-5199A0F94D7A-low.gif\" style=\"width:324px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/HL-L2380DW/DCP-L2560DW)</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><img src=\"https://support.brother.com/g/s/id/spec/cv_dcpl2500d/en-asoc/img/GUID-1D9B048D-508F-4794-88C3-59C13DF11C1A-low.gif\" style=\"width:324px\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Weights (with supplies)</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW)&nbsp;9.7 kg</p>\r\n\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW)&nbsp;11.2 kg</p>\r\n\r\n			<p>(HL-L2380DW)&nbsp;9.9 kg</p>\r\n\r\n			<p>(DCP-L2560DW)&nbsp;TBD</p>\r\n\r\n			<p>(MFC-L2700D/MFC-L2701D/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW)&nbsp;11.4 kg</p>\r\n\r\n			<p>(MFC-L2720DW)&nbsp;11.6 kg</p>\r\n\r\n			<p>(MFC-L2740DW)&nbsp;11.8 kg</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"6\">\r\n			<p>Noise Level</p>\r\n			</td>\r\n			<td rowspan=\"3\">\r\n			<p>Sound Pressure</p>\r\n			</td>\r\n			<td>\r\n			<p>Printing</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/MFC-L2700DW)</p>\r\n\r\n			<p>TBD</p>\r\n\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2700D/MFC-L2701D/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>LpAm = 50 dB (A)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Ready</p>\r\n			</td>\r\n			<td>\r\n			<p>LpAm = 33 dB (A)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Printing</p>\r\n\r\n			<p>(Quiet Mode)</p>\r\n			</td>\r\n			<td>\r\n			<p>LpAm = 45 dB (A)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"3\">\r\n			<p>Sound Power</p>\r\n			</td>\r\n			<td>\r\n			<p>Copying&nbsp;&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e647\">*7</a>&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e649\">*8</a></p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/MFC-L2700DW)</p>\r\n\r\n			<p>TBD</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2700D/MFC-L2701D/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>TBD</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Ready&nbsp;&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e647\">*7</a>&nbsp;&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d17e649\">*8</a></p>\r\n			</td>\r\n			<td>\r\n			<p>LWAd = 4.55 B (A)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Printing</p>\r\n\r\n			<p>(Quiet Mode)</p>\r\n			</td>\r\n			<td>\r\n			<p>LWAd = 6.27 B (A)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">\r\n			<p>Temperature</p>\r\n			</td>\r\n			<td colspan=\"2\">\r\n			<p>Operating</p>\r\n			</td>\r\n			<td>\r\n			<p>10 to 32 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p>Storage</p>\r\n			</td>\r\n			<td>\r\n			<p>0 to 40 &deg;C</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">\r\n			<p>Humidity</p>\r\n			</td>\r\n			<td colspan=\"2\">\r\n			<p>Operating</p>\r\n			</td>\r\n			<td>\r\n			<p>20 to 80 % (without condensation)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p>Storage</p>\r\n			</td>\r\n			<td>\r\n			<p>10 to 90 % (without condensation)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>ADF (automatic document feeder)</p>\r\n\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700DW/MFC-L2701DW/MFC-L2700D/MFC-L2701D/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n			</td>\r\n			<td>\r\n			<p>Up to 35 sheets</p>\r\n\r\n			<p>For best results we recommend:</p>\r\n\r\n			<p>Temperature: 20 to 30 &deg;C</p>\r\n\r\n			<p>Humidity: 50% to 70%</p>\r\n\r\n			<p>Paper: 80 g/m2</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<p>Laser Notice</p>\r\n			</td>\r\n			<td>\r\n			<p><a href=\"https://support.brother.com/g/s/id/pdf_pub/lasernotice/lasernotice_eng.pdf\" target=\"_blank\">Click here for details.</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>*1</p>\r\n\r\n<p>Measured diagonally</p>\r\n\r\n<p>*2</p>\r\n\r\n<p>USB connections to computer</p>\r\n\r\n<p>*3</p>\r\n\r\n<p>All wireless network ports activated and all wired network ports connected according to Regulation (EU) No 801/2013.</p>\r\n\r\n<p>*4</p>\r\n\r\n<p>To activate and deactivate the wireless function, see&nbsp;<em>Related Information</em>.</p>\r\n\r\n<p>*5</p>\r\n\r\n<p>Measured according to IEC 62301 Edition 2.0</p>\r\n\r\n<p>*6</p>\r\n\r\n<p>Power consumption varies slightly depending on the usage environment.</p>\r\n\r\n<p>*7</p>\r\n\r\n<p>Measured in accordance with the method described in RAL-UZ171.</p>\r\n\r\n<p>*8</p>\r\n\r\n<p>Office equipment with LWAd&gt;6.30 B(A) is not suitable for use in room where people require high levels of concentration. Such equipment should be placed in separate rooms because of noise emissions.</p>\r\n\r\n<h3>Document Size Specification</h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"4\">\r\n			<p>Document Size</p>\r\n			</td>\r\n			<td>\r\n			<p>ADF Width&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d491e25\">*1</a></p>\r\n			</td>\r\n			<td>\r\n			<p>147.3 to 215.9 mm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>ADF Length&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d491e25\">*1</a></p>\r\n			</td>\r\n			<td>\r\n			<p>147.3 to 355.6 mm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Scanner Glass Width</p>\r\n			</td>\r\n			<td>\r\n			<p>Max. 215.9 mm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Scanner Glass Length</p>\r\n			</td>\r\n			<td>\r\n			<p>Max. 300 mm</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>*1</p>\r\n\r\n<p>ADF models only</p>\r\n\r\n<h3>Print Media Specifications</h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"8\">\r\n			<p>Paper Input</p>\r\n			</td>\r\n			<td rowspan=\"4\">Paper Tray\r\n			<p>(Standard)</p>\r\n			</td>\r\n			<td>\r\n			<p>Paper Type</p>\r\n			</td>\r\n			<td>\r\n			<p>Plain Paper, Thin Paper, Recycled Paper</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Paper Size</p>\r\n			</td>\r\n			<td>\r\n			<p>A4, Letter, A5, A5 (Long Edge), A6, Executive</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Paper Weight</p>\r\n			</td>\r\n			<td>\r\n			<p>60 to 105 g/m2</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Maximum Paper Capacity</p>\r\n			</td>\r\n			<td>\r\n			<p>Up to 250 sheets of 80 g/m2&nbsp;Plain Paper</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"4\">\r\n			<p>Manual Feed Slot</p>\r\n			</td>\r\n			<td>\r\n			<p>Paper Type</p>\r\n			</td>\r\n			<td>\r\n			<p>Plain Paper, Thin Paper, Thick Paper, Thicker Paper, Recycled Paper, Bond, Label, Envelope, Env. Thin, Env.Thick</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Paper Size</p>\r\n			</td>\r\n			<td>\r\n			<p>Width:</p>\r\n\r\n			<p>76.2 to 215.9 mm</p>\r\n\r\n			<p>Length:</p>\r\n\r\n			<p>127 to 355.6 mm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Paper Weight</p>\r\n			</td>\r\n			<td>\r\n			<p>60 to 163 g/m2</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Maximum Paper Capacity</p>\r\n			</td>\r\n			<td>\r\n			<p>One sheet at a time</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">\r\n			<p>Paper Output</p>\r\n			</td>\r\n			<td colspan=\"2\">\r\n			<p>Face-Down Output Tray</p>\r\n			</td>\r\n			<td>\r\n			<p>Up to 100 Sheets of 80 g/m2&nbsp;Plain Paper (face-down delivery to the face-down output paper tray)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p>Face-Up Output Tray</p>\r\n			</td>\r\n			<td>\r\n			<p>One sheet (face-up delivery to the face-up output tray)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"3\">\r\n			<p>2-sided</p>\r\n			</td>\r\n			<td rowspan=\"3\">\r\n			<p>Automatic 2-sided Printing</p>\r\n			</td>\r\n			<td>\r\n			<p>Paper Type</p>\r\n			</td>\r\n			<td>\r\n			<p>Plain Paper, Thin Paper, Recycled Paper</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Paper Size</p>\r\n			</td>\r\n			<td>\r\n			<p>A4</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Paper Weight</p>\r\n			</td>\r\n			<td>\r\n			<p>60 to 105 g/m2</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>Copy Specification</h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Copy Width</p>\r\n			</td>\r\n			<td>\r\n			<p>Max. 210 mm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Automatic 2-sided Copy</p>\r\n			</td>\r\n			<td>\r\n			<p>(MFC-L2740DW)</p>\r\n\r\n			<p>Yes (from ADF)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Multiple Copies</p>\r\n			</td>\r\n			<td>\r\n			<p>Sorts/Stacks up to 99 pages</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Enlarge/Reduce</p>\r\n			</td>\r\n			<td>\r\n			<p>25% to 400% (in increments of 1%)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Resolution</p>\r\n			</td>\r\n			<td>\r\n			<p>600 x 600 dpi</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>First Copy Out Time&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d925e75\">*1</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Less than 10 seconds at 23 &deg;C / 230 V</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>*1</p>\r\n\r\n<p>From Ready Mode and standard tray</p>\r\n\r\n<h3>Scanner Specifications</h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Colour&nbsp;/ Black</p>\r\n			</td>\r\n			<td>\r\n			<p>Yes / Yes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>TWAIN Compliant</p>\r\n			</td>\r\n			<td>\r\n			<p>Yes</p>\r\n\r\n			<p>(Windows&reg;&nbsp;XP / Windows Vista&reg;&nbsp;/ Windows&reg;&nbsp;7 / Windows&reg;&nbsp;8 / Windows&reg;&nbsp;8.1)</p>\r\n\r\n			<p>(OS X v10.7.5 / 10.8.x / 10.9.x)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>WIA Compliant</p>\r\n			</td>\r\n			<td>\r\n			<p>Yes</p>\r\n\r\n			<p>(Windows&reg;&nbsp;XP / Windows Vista&reg;&nbsp;/ Windows&reg;&nbsp;7 / Windows&reg;&nbsp;8 / Windows&reg;&nbsp;8.1)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>ICA Compliant</p>\r\n			</td>\r\n			<td>\r\n			<p>Yes (OS X v10.7.5 / 10.8.x / 10.9.x)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Colour&nbsp;Depth</p>\r\n			</td>\r\n			<td>\r\n			<p>30 bit&nbsp;colour&nbsp;Processing (Input)</p>\r\n\r\n			<p>24 bit&nbsp;colour&nbsp;Processing (Output)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Grey&nbsp;Scale</p>\r\n			</td>\r\n			<td>\r\n			<p>10 bit&nbsp;colour&nbsp;Processing (Input)</p>\r\n\r\n			<p>8 bit&nbsp;colour&nbsp;Processing (Output)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Resolution&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d953e168\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Up to 19200 &times; 19200 dpi (interpolated)</p>\r\n\r\n			<p>Max. 600 x 2400 dpi (from Scanner Glass)</p>\r\n\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/MFC-L2700DW/MFC-L2701DW/MFC-L2700D/MFC-L2701D/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Max. 600 x 600 dpi (from ADF)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Scanning Width</p>\r\n			</td>\r\n			<td>\r\n			<p>Max. 210 mm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Automatic 2-sided Scanning</p>\r\n			</td>\r\n			<td>\r\n			<p>(MFC-L2740DW)</p>\r\n\r\n			<p>Yes (from ADF)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>*2</p>\r\n\r\n<p>Maximum 1200 &times; 1200 dpi scanning with the WIA driver in Windows&reg;&nbsp;XP, Windows Vista&reg;, Windows&reg;&nbsp;7, Windows&reg;&nbsp;8 and Windows&reg;&nbsp;8.1 (resolution up to 19200 &times; 19200 dpi can be selected by using the scanner utility)</p>\r\n\r\n<h3>Printer Specifications</h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Automatic 2-sided Print</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520D/DCP-L2520DW/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2700D/MFC-L2701D/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Yes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Emulations</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>PCL6, BR-Script3 (PostScript&reg;&nbsp;3&trade;)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Resolution</p>\r\n			</td>\r\n			<td>\r\n			<p>600 x 600 dpi, HQ1200 (2400 x 600 dpi) quality</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Print Speed (2-sided)</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2520D/DCP-L2540DN/DCP-L2540DW/DCP-L2541DW/HL-L2380DW/DCP-L2560DW/MFC-L2700D/MFC-L2701D/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Up to 15 sides/minute (Up to 7.5 sheets/minute) (A4 size)</p>\r\n\r\n			<p>(DCP-L2500D/DCP-L2520DW/MFC-L2700DW)</p>\r\n\r\n			<p>Up to 13 sides/minute (Up to 6.5 sheets/minute) (A4 size)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Print Speed</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2500D/DCP-L2520DW/MFC-L2700DW)</p>\r\n\r\n			<p>Up to 26 pages/minute (A4 size)</p>\r\n\r\n			<p>(DCP-L2540DN/DCP-L2560DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>Up to 30 pages/minute (A4 size)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>First Print Time&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d1084e117\">*1</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Less than 8.5 seconds at 23 &deg;C / 230 V</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>*1</p>\r\n\r\n<p>From Ready Mode and standard tray</p>\r\n\r\n<h3>Interface Specifications</h3>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>USB&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d1189e19\">*1</a>&nbsp;<a href=\"https://support.brother.com/g/b/spec.aspx?c=ph&amp;lang=en&amp;prod=dcpl2540dw_us_as#d1189e21\">*2</a></p>\r\n			</td>\r\n			<td>\r\n			<p>Hi-Speed USB 2.0</p>\r\n\r\n			<p>Use a USB 2.0 interface cable that is no more than 2.0 metres long.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>LAN</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2540DW/DCP-L2541DW/HL-L2380DW/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>10BASE-T / 100BASE-TX</p>\r\n\r\n			<p>Use a straight-through Category 5 (or greater) twisted-pair cable.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Wireless LAN</p>\r\n			</td>\r\n			<td>\r\n			<p>(DCP-L2540DW/DCP-L2541DW/HL-L2380DW/MFC-L2700DW/MFC-L2701DW/MFC-L2703DW/MFC-L2720DW/MFC-L2740DW)</p>\r\n\r\n			<p>IEEE 802.11b/g/n (Infrastructure/Ad-hoc Mode)</p>\r\n\r\n			<p>IEEE 802.11g/n (Wi-Fi Direct&trade;)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'brother-printer-dcp2540dw', 9995, 0, 'brother-printer-dcp2540dw_1574656235.jpg', '0000-00-00', 0, 'no'),
(75, 1, 'DELL 5584 Core i7', '<p>8th Generation Inte Core i7-8565U Processor (8MB Cache, up to 4.6 GHz) / 8GB / 128GB SSD + 1TB HDD / NVIDIA(R) GeForce(R) MX130 with 4GB GDDR5 graphics memory / 15.6-inch FHD(1920x1080) Anti-Glare LED-Backlit Non-touch Display Narrow Border / Windows 10</p>\r\n', 'dell-5584-core-i7', 55700, 0, 'dell-5584-core-i7.gif', '0000-00-00', 0, 'no'),
(76, 15, 'Duplo INK DA14', '', 'duplo-ink-da14', 1473, 0, 'duplo-ink-da14.jfif', '0000-00-00', 0, 'no'),
(77, 15, 'Duplo Master DRA12', '', 'duplo-master-dra12', 4908, 0, 'duplo-master-dra12.jfif', '0000-00-00', 0, 'no');
INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `discount`, `photo`, `date_view`, `counter`, `featured`) VALUES
(78, 12, 'ECS H61H2-M17 BOARD', '<ul>\r\n	<li><strong>CPU</strong>\r\n	<ul>\r\n		<li>Supports new 2nd &amp; 3rd gen Intel&reg;&nbsp;Core&trade; family, Pentium, Celeron series processors in LGA1155 socket</li>\r\n		<li>DMI 5.0GT/s</li>\r\n		<li>VRD 12.0</li>\r\n		<li>Solid Capacitor for CPU side</li>\r\n		<li>Supports Intel&reg;&nbsp;Turbo Boost 2.0 Technology</li>\r\n		<li>Supports Intel&reg;&nbsp;Hyper-Threading Technology</li>\r\n		<li>Please refer to CPU support list for details</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>CHIPSET</strong>\r\n	<ul>\r\n		<li>Intel&reg;&nbsp;H61 Express Chipset</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>GRAPHICS</strong>\r\n	<ul>\r\n		<li>Support Intel&reg;&nbsp;HD Graphics 2500/4000(Intel 3rd gen CPU)</li>\r\n		<li>Supports DirectX&reg;&nbsp;11</li>\r\n		<li>*DirectX 11 - Only supported with the 3rd Gen Intel processors for LGA 1155 socket</li>\r\n		<li>Supports Intel&reg;&nbsp;HD Graphics, InTru&trade; 3D, Quick Sync Video, Clear Video HD Technology,<br />\r\n		&nbsp;&nbsp;&nbsp; Insider&trade;</li>\r\n		<li>Supports OpenGL 3.1(Intel 3rd gen CPU)</li>\r\n		<li>Supports OpenCL 1.1(Intel 3rd gen CPU)</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>MEMORY</strong>\r\n	<ul>\r\n		<li>Dual-channel DDR3 Memory architecture</li>\r\n		<li>Supports DDR3 1600*/1333/1066 non-ECC, Un-buffered SDRAM Memory</li>\r\n		<li>2 X 240-pin DDR3 DIMM socket</li>\r\n		<li>Support up to 16 GB*</li>\r\n		<li>Intel&reg;&nbsp;extreme Memory Profile (XMP) 1.3/1.2 Memory Modules</li>\r\n		<li>* Due to the operation system limitation, the actual memory size may be less than 4GB for the reservation for system usage under Windows&reg;&nbsp;32-bit OS. For Windows&reg;&nbsp;64-bit OS with 64-bit CPU, there is no such limitation</li>\r\n		<li>* Intel&reg;&nbsp;Ivy Bridge CPU required</li>\r\n		<li>Note:Please refer to the latest Memory support list for details</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>EXPANSION SLOT</strong>\r\n	<ul>\r\n		<li>1 X PCI Express X16 Gen 2.0 slot(s)</li>\r\n		<li>2 X PCI Express X 1 Gen 2.0 slot(s)</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>STORAGE</strong>\r\n	<ul>\r\n		<li>Support by Intel&reg; H61 Express Chipset\r\n		<ul>\r\n			<li>4 X Serial ATAII 3Gb/s</li>\r\n		</ul>\r\n		</li>\r\n		<li>Supports NCQ, AHCI and &quot;Hot Plug&quot; functions</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>AUDIO</strong>\r\n	<ul>\r\n		<li>6-Channel HD audio CODEC</li>\r\n		<li>Compliant with HD audio specification</li>\r\n		<li>VIA 1705<br />\r\n		?VIA&reg;&nbsp;VT1705 6-channel High Definition audio CODEC<br />\r\n		?Compliant with HD audio specification for a whole new immersive surround sound experience<br />\r\n		?3 DACs and 2 ADCs with High-performance ADCs with 100dB SNR, DACs with 100dB SNR<br />\r\n		?Low Power Consumption<br />\r\n		?Capability for &ldquo;full rate&rdquo; BluRay / DVD / HD DVD support.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>LAN</strong>\r\n	<ul>\r\n		<li>Atheros AR8152-B 10/100Mbps Fast Ethernet Controller</li>\r\n		<li>(Atheros AR8151-B Gigabit Fast Ethernet Controller optional)</li>\r\n		<li>Wake-On-LAN</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>USB</strong>\r\n	<ul>\r\n		<li>Support by Intel&reg; H61 Express Chipset\r\n		<ul>\r\n			<li>8 X USB2.0 port(s) Up to 480 Mb/s\r\n			<ul>\r\n				<li>Back Panel 4 port(s)</li>\r\n				<li>Onboard 4 port(s)</li>\r\n			</ul>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>REAR PANEL I/O</strong>\r\n	<ul>\r\n		<li>1 X PS/2 Keyboard &amp; PS/2 mouse connectors</li>\r\n		<li>1 X Audio port (Line Out/Line In/Mic In)</li>\r\n		<li>1 X RJ-45 port</li>\r\n		<li>1 X HDMI port(s) (optional)</li>\r\n		<li>1 X D-Sub (VGA) port(s)</li>\r\n		<li>4 X USB2.0 port(s)</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>CONNECTORS &amp; HEADERS</strong>\r\n	<ul>\r\n		<li>1 X 24-pin ATX Power Supply connector</li>\r\n		<li>1 X 4-pin 12V Power connector</li>\r\n		<li>1 X 4-pin CPU_FAN connector</li>\r\n		<li>1 X 3-pin SYS_FAN connector</li>\r\n		<li>1 X Front Panel switch/LED header</li>\r\n		<li>1 X Front panel audio header</li>\r\n		<li>1 X Speaker header</li>\r\n		<li>2 X USB 2.0 header\r\n		<ul>\r\n			<li>Support additional 4 USB ports</li>\r\n		</ul>\r\n		</li>\r\n		<li>4 X SATA II 3Gb/s connector(s)</li>\r\n		<li>1 X CLR_CMOS header</li>\r\n		<li>1 X Serial port header (COM)</li>\r\n		<li>1 X ME_UNLOCK header</li>\r\n		<li>1 X Chassis intrusion header</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>SYSTEM BIOS</strong>\r\n	<ul>\r\n		<li>AMI BIOS with 64 MB SPI Flash ROM</li>\r\n		<li>Supports M.I.B III Utility</li>\r\n		<li>ACPI &amp; DMI</li>\r\n		<li>F7 hot key for boot up devices option</li>\r\n		<li>Support ECS EZ BIOS</li>\r\n		<li>Plug and Play, STR (S3) / STD (S4) , Hardware monitor, Multi Boot</li>\r\n		<li>Multi-Language BIOS</li>\r\n		<li>Audio, LAN, can be disabled in BIOS</li>\r\n		<li>Supports PgUp clear CMOS Hotkey</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>FORM FACTOR</strong>\r\n	<ul>\r\n		<li>mATX Form Factor</li>\r\n		<li>225mm(W)*170mm(H)</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>OS SUPPORT</strong>\r\n	<ul>\r\n		<li>Windows XP 32-bit</li>\r\n		<li>Windows XP 64-bit</li>\r\n		<li>Windows Vista 32-bit</li>\r\n		<li>Windows Vista 64-bit</li>\r\n		<li>Windows 7 32-bit</li>\r\n		<li>Windows 7 64-bit</li>\r\n		<li>Windows 8 32-bit</li>\r\n		<li>Windows 8 64-bit</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>CERTIFICATIONS</strong>\r\n	<ul>\r\n		<li>CE/FCC Certification</li>\r\n		<li>ErP/EuP Certification</li>\r\n		<li>WHQL Certification</li>\r\n		<li>WHCK Certification</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'ecs-h61h2-m17-board', 2900, 0, 'ecs-h61h2-m17-board.jfif', '0000-00-00', 0, 'no'),
(79, 16, 'ENVIRO 500W', '<p>IMPORTANT: This unit is designed for computer use only! Power Output: 500 W Ports: 3 x 220 volts (for Desktop Computer, TV&#39;s, and Devices) Ports: 1 x 110 volts&nbsp; Safety Standards: FCC, CB, CCC, TUV, CS ,C-stick, EMI, EMC, S-Intertek, CPT-AB15 Automatic Voltage Regulator Solid state electronic device 220V AVR Max Capacity: 50VA Fuse: 5A Socket: 3 x 220V 110v - use low power electronic device only max of 50w (using high wattage may cause damage to AVR)</p>\r\n', 'enviro-500w', 350, 0, 'enviro-500w_1574662959.jfif', '0000-00-00', 0, 'no'),
(80, 5, 'EPSON L5190', '<p>Print, scan, copy, fax and connect with ease. The economical, multi-function EcoTank L5190 sports a variety of features that makes it the ideal printer for business. Save on printing with Epson&rsquo;s affordable ink bottles, designed for spill- and error-free refilling via designated nozzles on the L5190&rsquo;s integrated ink tanks. Enjoy a full suite of connectivity features such as Wi-Fi, Wi-Fi Direct and Ethernet. Choose the complete printing solution for business now.</p>\r\n\r\n<ul>\r\n	<li>Compact integrated tank design</li>\r\n	<li>High yield ink bottles</li>\r\n	<li>Spill-free, error-free refilling</li>\r\n	<li>Print, scan, copy, fax with ADF</li>\r\n	<li>Wi-Fi, Wi-Fi Direct</li>\r\n	<li>Epson Connect</li>\r\n	<li>Borderless printing up to 4R&nbsp;</li>\r\n</ul>\r\n', 'epson-l5190', 14695, 0, 'epson-l5190_1574663866.jpg', '0000-00-00', 0, 'no'),
(81, 2, 'Budget PC', '<p>AMD A6-7480k, MSI A68HM</p>\r\n\r\n<p>4GB Memory, Lite ON DVD-Writter</p>\r\n\r\n<p>SEAGATE 500GB, 18.5&quot; LED MONITOR</p>\r\n\r\n<p>Casing, 500w AVR, Speakers, Keyboard and Mouse</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'budget-pc', 12888, 0, 'budget-pc_1574659901.jfif', '2020-01-18', 1, 'no'),
(82, 17, 'Toshiba 32BG FlashDrive', '', 'toshiba-32bg-flashdrive', 510, 0, 'toshiba-32bg-flashdrive_1574658394.jfif', '0000-00-00', 0, 'no'),
(83, 17, 'Toshiba 64BG FlashDrive', '', 'toshiba-64bg-flashdrive', 910, 0, 'toshiba-64bg-flashdrive.jfif', '0000-00-00', 0, 'no'),
(84, 5, 'Epson LX-310', '<p>Highly reliable printing with better performance</p>\r\n\r\n<ul>\r\n	<li>Narrow carriage 9-pin SIDM</li>\r\n	<li>USB, Serial and Parallel ports</li>\r\n	<li>10,000 power on hour MTBF</li>\r\n	<li>High 357 CPS print speed at 12CPI</li>\r\n</ul>\r\n', 'epson-lx-310', 10995, 0, 'epson-lx-310_1574663893.jfif', '0000-00-00', 0, 'no'),
(85, 2, 'Home/Office PC', '<p>AMD RYZEN 3, MSI 320M,</p>\r\n\r\n<p>4GB MEMORY, Lite ON DVD-Writter</p>\r\n\r\n<p>SEAGATE 1TB, 18.5&quot; LED MONITOR</p>\r\n\r\n<p>Casing, 500w AVR, Speakers, Keyboard and Mouse</p>\r\n', 'home-office-pc', 16999, 0, 'home-office-pc.jfif', '2019-12-03', 3, 'no'),
(86, 2, 'Home/Gaming PC', '<p>AMD RYZEN 5 , MSI A320M</p>\r\n\r\n<p>4GB Memory, Lite ON DVD-Writter</p>\r\n\r\n<p>SEAGATE 500GB, 18.5&quot; LED MONITOR</p>\r\n\r\n<p>Casing, 500w AVR, Speakers, Keyboard and Mouse</p>\r\n', 'home-gaming-pc', 20399, 0, 'home-gaming-pc.jfif', '0000-00-00', 0, 'no'),
(87, 18, 'Rapoo Wireless Mouse', '', 'rapoo-wireless-mouse', 900, 0, 'rapoo-wireless-mouse.jfif', '0000-00-00', 0, 'no'),
(88, 19, 'Ricoh Machine MP-2014AD', '<p>The Ricoh MP 2014/ MP 2014D/ MP 2014AD is an A3 black-and-white MFP with a brisk output speed of 20ppm, providing maximum efficiency for document processing in your office. Your total cost of ownership is low because the MP 2014/ MP 2014D/ MP 2014AD has an economical initial cost with low operating expenses. This reliable MFP has been designed to provide you with robust performance in demanding office environments. To save you energy we have provided an Energy Saving Key putting your MP 2014/ MP 2014D/ MP 2014AD instantly into sleep-mode, reducing your energy bill.</p>\r\n\r\n<ul>\r\n	<li>ID card scan function copies both sides onto a single sheet, saving you time</li>\r\n	<li>Customise two short-cut keys to perform frequently performed tasks quickly</li>\r\n	<li>Automatic Document Feeder (ARDF)* speeds up copying and scanning</li>\r\n	<li>Economic price and low running costs make the MP 2014 a cost-effective solution</li>\r\n</ul>\r\n', 'ricoh-machine-mp-2014ad', 54000, 0, 'ricoh-machine-mp-2014ad_1574663215.jpg', '2019-11-25', 2, 'no'),
(89, 15, 'Ricoh Toner MP2014HS', '', 'ricoh-toner-mp2014hs', 5000, 0, 'ricoh-toner-mp2014hs.jfif', '0000-00-00', 0, 'no'),
(90, 15, 'EPSON INK T6642', '', 'epson-ink-t6642', 275, 0, 'epson-ink-t6642.jfif', '0000-00-00', 0, 'no'),
(91, 15, 'EPSON C13T00v100 BLACK', '', 'epson-c13t00v100-black', 250, 0, 'epson-c13t00v100-black.jfif', '0000-00-00', 0, 'no'),
(92, 15, 'EPSON C13T00v200 CYAN', '', 'epson-c13t00v200-cyan', 275, 0, 'epson-c13t00v200-cyan.jfif', '0000-00-00', 0, 'no'),
(93, 15, 'EPSON C13T00v300 MAGENTA', '', 'epson-c13t00v300-magenta', 275, 0, 'epson-c13t00v300-magenta.jfif', '0000-00-00', 0, 'no'),
(94, 15, 'EPSON C13T00v400 YELLOW', '', 'epson-c13t00v400-yellow', 275, 0, 'epson-c13t00v400-yellow.jfif', '0000-00-00', 0, 'no'),
(95, 8, 'EPSON EB-696UI', '<p>Take your audience on a breathtaking journey around the world through life-size panoramic images with the EB-696Ui ultra-short throw projector. Bring images to life with all its detail with staggering clarity beyond Full HD and project longer than before with an astounding 10,000 hours of lamp life in eco-mode. Create panoramic projections and enjoy seamless interactions with just your fingers or with the interactive pens while you scroll, zoom, and draw across dual projections.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Beyond Full HD Resolution&nbsp;</p>\r\n\r\n	<ul>\r\n		<li>3 x HDMI</li>\r\n		<li>Multi-PC Projection</li>\r\n		<li>10,000 Hours Lamp Life in Eco Mode</li>\r\n		<li>Ultra Short Throw 80&quot; 47cm</li>\r\n		<li>Finger Touch Interactive</li>\r\n		<li>Dual Screen Interactivity</li>\r\n		<li>White and Colour Light Output at 3,800 lumens</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'epson-eb-696ui', 115900, 0, 'epson-eb-696ui_1574663917.jfif', '2019-11-27', 3, 'yes'),
(96, 20, 'INTEL CORE i3- 9100F', '<p># of Cores: 4</p>\r\n\r\n<p># of Threads: 4</p>\r\n\r\n<p>Processor Base Frequency3.60 GHz</p>\r\n\r\n<p>Max Turbo Frequency4.20 GHz</p>\r\n\r\n<p>Cache6 MB Intel&reg; Smart Cache</p>\r\n\r\n<p>Bus Speed8 GT/s</p>\r\n\r\n<p>TDP65 W</p>\r\n', 'intel-core-i3-9100f', 4850, 0, 'intel-core-i3-9100f.jfif', '0000-00-00', 0, 'no'),
(97, 11, 'KINGSTON 4GB DDR3 MEMORY', '<p>Capacity : 4GB</p>\r\n\r\n<p>Speed : DDR3 1600</p>\r\n\r\n<p>Cas Latency : 11</p>\r\n\r\n<p>Voltage : 1.5V</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'kingston-4gb-ddr3-memory', 1620, 0, 'kingston-4gb-ddr3-memory.jfif', '0000-00-00', 0, 'no'),
(98, 11, 'KINGMAX 8GB DDR3', '', 'kingmax-8gb-ddr3', 3150, 0, 'kingmax-8gb-ddr3.jfif', '0000-00-00', 0, 'no'),
(99, 9, 'LG 18.5\" MONITOR', '', 'lg-18-5-monitor', 3600, 0, 'lg-18-5-monitor.jfif', '0000-00-00', 0, 'no'),
(100, 9, 'LG 22\" MONITOR', '', 'lg-22-monitor', 6800, 0, 'lg-22-monitor.jfif', '0000-00-00', 0, 'no'),
(101, 14, 'Neutron Speaker', '', 'neutron-speaker', 200, 0, 'neutron-speaker.jfif', '0000-00-00', 0, 'no'),
(102, 2, 'Acer Veriton X2660G', '<p>Operating System</p>\r\n\r\n<p>Windows 10 Pro</p>\r\n\r\n<p>Processor &amp; Chipset</p>\r\n\r\n<p>Processor Manufacturer</p>\r\n\r\n<p>Intel&reg;</p>\r\n\r\n<p>Processor Type</p>\r\n\r\n<p>Pentium&reg; Gold</p>\r\n\r\n<p>Processor Model</p>\r\n\r\n<p>G5400</p>\r\n\r\n<p>Processor Core</p>\r\n\r\n<p>Dual-core (2 Core&trade;)</p>\r\n\r\n<p>Processor Speed</p>\r\n\r\n<p>3.70 GHz</p>\r\n\r\n<p>64-bit Processing</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>vPro Technology</p>\r\n\r\n<p>No</p>\r\n\r\n<p>Memory</p>\r\n\r\n<p>Standard Memory</p>\r\n\r\n<p>4 GB</p>\r\n\r\n<p>Maximum Memory</p>\r\n\r\n<p>32 GB</p>\r\n\r\n<p>Memory Technology</p>\r\n\r\n<p>DDR4 SDRAM</p>\r\n\r\n<p>Storage</p>\r\n\r\n<p>Number of Hard Drives</p>\r\n\r\n<p>1</p>\r\n\r\n<p>Total Hard Drive Capacity</p>\r\n\r\n<p>1 TB</p>\r\n\r\n<p>Hard Drive Interface</p>\r\n\r\n<p>Serial ATA/600</p>\r\n\r\n<p>Optical Drive Type</p>\r\n\r\n<p>DVD-Writer</p>\r\n\r\n<p>Optical Media Supported</p>\r\n\r\n<p>DVD-RAM/&plusmn;R/&plusmn;RW</p>\r\n\r\n<p>Display &amp; Graphics</p>\r\n\r\n<p>Graphics Controller Manufacturer</p>\r\n\r\n<p>Intel&reg;</p>\r\n\r\n<p>Graphics Controller Model</p>\r\n\r\n<p>UHD Graphics 610</p>\r\n\r\n<p>Graphics Memory Technology</p>\r\n\r\n<p>DDR4 SDRAM</p>\r\n\r\n<p>Graphics Memory Accessibility</p>\r\n\r\n<p>Shared</p>\r\n\r\n<p>Network &amp; Communication</p>\r\n\r\n<p>Ethernet Technology</p>\r\n\r\n<p>Gigabit Ethernet</p>\r\n\r\n<p>Wireless LAN</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>Wireless LAN Standard</p>\r\n\r\n<p>IEEE 802.11ac</p>\r\n\r\n<p>I/O Expansions</p>\r\n\r\n<p>Number of Total Expansion Slots</p>\r\n\r\n<p>4</p>\r\n\r\n<p>Number of PCI Slots</p>\r\n\r\n<p>1</p>\r\n\r\n<p>Number of PCI Express x1 Slots</p>\r\n\r\n<p>2</p>\r\n\r\n<p>Number of PCI Express x16 Slots</p>\r\n\r\n<p>1</p>\r\n\r\n<p>Interfaces/Ports</p>\r\n\r\n<p>HDMI</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>Number of USB 2.0 Ports</p>\r\n\r\n<p>4</p>\r\n\r\n<p>Number of USB 3.1 Gen 1 Ports</p>\r\n\r\n<p>2</p>\r\n\r\n<p>Number of USB 3.1 Gen 2 Ports</p>\r\n\r\n<p>2</p>\r\n\r\n<p>Total Number of USB Ports</p>\r\n\r\n<p>8</p>\r\n\r\n<p>Network (RJ-45)</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>Audio Line In</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>Audio Line Out</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>VGA</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>DisplayPort</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>Number of DisplayPort Outputs</p>\r\n\r\n<p>1</p>\r\n\r\n<p>Software</p>\r\n\r\n<p>Operating System</p>\r\n\r\n<p>Windows 10 Pro</p>\r\n\r\n<p>Operating System Architecture</p>\r\n\r\n<p>64-bit</p>\r\n\r\n<p>Power Description</p>\r\n\r\n<p>Maximum Power Supply Wattage</p>\r\n\r\n<p>180 W</p>\r\n', 'acer-veriton-x2660g', 28900, 0, 'acer-veriton-x2660g.jfif', '0000-00-00', 0, 'no'),
(103, 2, 'Acer Veriton X2640G', '<p>Form Factor : Small Form Factor</p>\r\n\r\n<p>Operating System : Windows 10 Pro 64-bit with ACM</p>\r\n\r\n<p>Processor : Intel Core i3 7100 3.9GHZ, 3MB Cache, 2Cores, Kabylake 7th Gen</p>\r\n\r\n<p>Chipset : Intel&reg; H110</p>\r\n\r\n<p>Memory : 4 GB DDR4</p>\r\n\r\n<p>Hard Disk Drive : 1 TB 3.5-inch 7200 RPM</p>\r\n\r\n<p>Graphics : Intel&reg; HD Graphics 630</p>\r\n\r\n<p>Audio : Integrated high-definition, 5.1-channel surround sound</p>\r\n\r\n<p>Networking/LAN : Gigabit Ethernet</p>\r\n\r\n<p>Optical Drive : 16X DVD-RW</p>\r\n\r\n<p>Card Reader : Yes</p>\r\n\r\n<p>Power Supply : 220W</p>\r\n\r\n<p>Standard&nbsp; I/O Ports : Front/Side I/O connectors</p>\r\n\r\n<p>&bull; Audio jack(s): 2</p>\r\n\r\n<p>&bull; USB 2.0 port(s): 2</p>\r\n\r\n<p>&bull; USB 3.1 Gen 1 port(s): 2</p>\r\n\r\n<p>: Rear I/O connectors</p>\r\n\r\n<p>&bull; D-Sub port(s): 1</p>\r\n\r\n<p>&bull;&nbsp;DVI port(s): 1</p>\r\n\r\n<p>&bull; HDMI port(s): 0, 1 (out)</p>\r\n\r\n<p>&bull; COM port(s): 1</p>\r\n\r\n<p>&bull; Serial ports on board header (COM2): 1</p>\r\n\r\n<p>&bull; LAN port(s): 1</p>\r\n\r\n<p>&bull; PS/2 port(s): 2</p>\r\n\r\n<p>&bull; Audio jack(s): 3</p>\r\n\r\n<p>&bull; USB 2.0 port(s): 2</p>\r\n\r\n<p>&bull; USB 3.1 Gen 1 port(s): 2</p>\r\n\r\n<p>: Expansion Slot(s)</p>\r\n\r\n<p>&bull; Number of PCIe x16 slot(s): 1</p>\r\n\r\n<p>&bull; Number of PCIe x1 slot(s): 1</p>\r\n', 'acer-veriton-x2640g', 37400, 0, 'acer-veriton-x2640g.jfif', '0000-00-00', 0, 'no'),
(104, 1, 'Dell Core i5', '<p>For sale na bago</p>\r\n\r\n<p>8gb ram</p>\r\n\r\n<p>5tb</p>\r\n', 'dell-core-i5', 20000, 0, 'dell-core-i5.jpg', '2019-11-30', 2, 'no'),
(105, 6, 'Dell Core i3', '<p>sample lang</p>\r\n', 'dell-core-i3', 20000, 30, 'dell-core-i3.jpg', '2019-12-09', 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(255) NOT NULL,
  `date_paid` date NOT NULL,
  `due_date` date NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `amount_received` int(255) NOT NULL,
  `amt_to_pay` int(255) NOT NULL,
  `amount_change` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `date_paid`, `due_date`, `transaction_no`, `user_id`, `payment_id`, `balance`, `amount_paid`, `amount_received`, `amt_to_pay`, `amount_change`) VALUES
(1, '2020-01-10', '2020-01-24', '00002', '36', '7', 32000, 16000, 6400, 6400, 0),
(2, '2019-12-24', '2019-12-23', '00003', '33', '13', 51165, 30235, 10235, 10235, 0),
(3, '2019-12-24', '2020-01-06', '00003', '33', '14', 36165, 45235, 15000, 10235, 0),
(4, '2019-12-18', '2020-01-08', '00001', '32', '1', 0, 76960, 62160, 41500, 0),
(5, '2019-12-18', '2020-01-13', '00005', '38', '25', -39060, 65900, 41500, 41500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_no` varchar(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `total_amount` int(255) NOT NULL,
  `initial_dp` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `amountpaid` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `penalty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_no`, `transaction_date`, `total_amount`, `initial_dp`, `balance`, `amountpaid`, `user_id`, `remarks`, `penalty`) VALUES
('00001', '2019-12-25', 74000, 14800, 0, 76960, 32, '', 1480),
('00002', '2020-01-10', 48000, 9600, 32000, 16000, 36, '', 0),
('00003', '2019-12-09', 74000, 20000, 36165, 45235, 33, '', 1480),
('00004', '2019-12-14', 122000, 25000, 101880, 25000, 37, '', 2440),
('00005', '2019-12-30', 122000, 24400, -39060, 65900, 38, '', 2440),
('00006', '2019-12-14', 150000, 30000, 246000, 30000, 39, '', 6000),
('00007', '2019-12-15', 4650000, 930000, 3720000, 930000, 40, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `active`) VALUES
(18, 'uploads/IMG_20191127_112111.jpg', 'active'),
(19, 'uploads/IMG_20191127_112103.jpg', ''),
(20, 'uploads/IMG_20191127_112117.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `company`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@yahoo.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Code', 'Project', '', '', '', 'thanos1.jpg', 1, '', 'Nh9oI8JOXxcUw6d', '2018-05-01'),
(32, 'jeff@gmail.com', '', 0, 'jeff', 'Peralta', 'csu', 'city', '1234567890', '', 1, '', '', '2019-11-28'),
(33, 'lupo@yahoo.com', '$2y$10$diJ4580U1Vxbn6I34M0zC..m3x7uhvmtLcEsuuWAdPeqLauvmCHXi', 0, 'jhong', 'peralta', 'csu', 'aparri', '09278702911', 'IMG_20190625_060129.jpg', 1, '', '', '2019-11-29'),
(36, 'robi@yahoo.com', '$2y$10$bMdeZXiUwuSDXLIzZIYrBeeQ2szswezFvNRP1.QlrkiK/wprfeBGq', 0, 'Robi', 'Raquinio', 'CSU Carig', 'Carig', '09566893547', '', 1, '', '', '2019-12-09'),
(37, 'john@yahoo.com', '$2y$10$XngEtt1EnZ1rMz.wAhb.g.9Pd9.OBa3sBBu33pznYg.9DF/gkEK1O', 0, 'lupo', 'tan', 'csu', 'csu', '654654654', '', 1, '', '', '2019-12-14'),
(38, 'dj@yahoo.com', '$2y$10$hefrihF3UErsRZO4p3DjquEq2/ON33iLNIgXBzMpIJtfxEwWfoj6q', 0, 'dj', 'naidas', 'csu', 'csu', '123654123', '', 1, '', '', '2019-12-30'),
(39, 'rr@gmail.com', '$2y$10$tb15u223zNxMkO6.gQ8aZem2uza9hZmyvMaoOTJMTkwWC57UW/w/a', 0, 'Rr', 'Raq', 'dsdf', 'sdfsdf', '002453', '', 1, '', '', '2019-12-14'),
(40, 'jepoy@gmail.com', '$2y$10$aqx49G84nuDwgrdH1Qeg0OJPoi6m5q6NspKMFxdQMEUbFnnNNsnN.', 0, 'Bradd Jeff', 'Peralta', 'Cagelco2', 'Macanaya, Aparri, Cagayan', '0965432879', '', 1, '', '', '2019-12-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
