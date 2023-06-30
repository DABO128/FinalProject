-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 06:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `Username`, `password`) VALUES
(50, 'Omar DABO ', ' Filsenor226', 'b59c67bf196a4758191e42f76670ceba'),
(51, 'fils', 'fils', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `number_of_guests` varchar(10) NOT NULL,
  `number_of_table` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `time`, `date`, `number_of_guests`, `number_of_table`, `comment`, `status`) VALUES
(417, 'Abdoul Rachid', 'Ouedraogo', 'oumaroud195@gmail.com', '+905367811204', '13:17:00', '2023-06-15', '5', 2, 'i am going to be there at 1PM', 'Available'),
(418, 'Abdoul Aziz', 'Sanfo', 'oumaroud195@gmail.com', '+905367811204', '13:17:00', '2023-06-15', '5', 2, '', 'Waiting'),
(419, 'Saidou ', 'Passere', 'oumaroud195@gmail.com', '+905367811204', '05:30:00', '2023-06-15', '9', 3, '', 'Available'),
(420, 'Aboubakar', 'Sidik', 'oumaroud195@gmail.com', '+905367811204', '10:30:00', '2023-06-15', '10', 3, 'Next to a window please', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(28, 'INTERNATIONAL FOOD', 'Food_Category_673.png', 'Yes', 'Yes'),
(34, 'CULTURAL FOOD', 'Food_Category_384.png', 'Yes', 'Yes'),
(35, 'DRINKS', 'Food_Category_45.png', 'Yes', 'Yes'),
(37, 'TO DRINK', 'Food_Category_152.png', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(9, 'Pizza', 'Italian pizza is a culinary delight that combines simple ingredients with precise techniques. ', '10', 'Food-Name-9751.png', 28, 'Yes', 'Yes'),
(10, 'Adana kebab', 'Adana kebab is cherished for its bold and intense flavors, succulent texture, and smoky aroma', '23', 'Food-Name-9843.png', 34, 'Yes', 'Yes'),
(12, 'Dolma', 'Yaprak sarma is a delicious dish that showcases the delicate flavors of grape leaves and the fragrant blend of rice,..', '30', 'Food-Name-4255.png', 34, 'Yes', 'Yes'),
(13, 'Gonre', 'Gonré is a popular and comforting dish in Burkina Faso, showcasing the use of peanuts, a common ingredient in West African cuisine', '50', 'Food-Name-8722.png', 34, 'Yes', 'Yes'),
(14, ' Spaghetti ', 'Spaghetti is a versatile pasta that lends itself to a wide range of flavors and preparations.', '30', 'Food-Name-8566.png', 28, 'Yes', 'Yes'),
(15, 'Akietie', '\"Akietie\" is a traditional dish from Ivory Coast ,with fish is typically served hot.', '30', 'Food-Name-5858.png', 34, 'Yes', 'Yes'),
(16, 'japan-sushi', '', '50', 'Food-Name-723.png', 28, 'Yes', 'Yes'),
(17, 'Moules-frites', '', '30', 'Food-Name-4763.png', 28, 'No', 'No'),
(18, 'Water', '', '5', 'Food-Name-6277.jpg', 35, 'Yes', 'Yes'),
(19, 'Fanta', '', '10', 'Food-Name-6814.jpg', 35, 'No', 'No'),
(20, 'The', '', '10', 'Food-Name-3881.png', 35, 'No', 'No'),
(21, 'Juice', '', '20', 'Food-Name-4142.jpg', 35, 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(90) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`) VALUES
(1, 'Piza', '6', 3, '18', '2023-02-11 03:17:56', 'Served', 'Oumarou Dabo', '5678908888', 'oumaroud195@gmail.com'),
(8, 'Akietié', '30', 5, '150', '2023-05-21 03:57:45', 'Ordered', 'Abdoul Aziz Sanfo', '5678908888', 'oumaroud195@gmail.com'),
(11, 'Adana kebab', '23', 1, '23', '2023-06-15 02:15:53', 'ordered', 'Abdoul Aziz Sanfo', '05415666998', 'oumaroud195@gmail.com'),
(12, 'Adana kebab', '23', 1, '23', '2023-06-17 04:08:40', 'ordered', 'Oumarou Dabo', '05415666998', 'oumaroud195@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
