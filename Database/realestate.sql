-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 01:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `emailAddress`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(10) NOT NULL,
  `agent_name` varchar(150) NOT NULL,
  `agent_address` varchar(250) NOT NULL,
  `agent_contact` varchar(20) NOT NULL,
  `agent_email` varchar(25) NOT NULL,
  `agent_password` varchar(50) DEFAULT NULL,
  `dateRegistered` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_name`, `agent_address`, `agent_contact`, `agent_email`, `agent_password`, `dateRegistered`) VALUES
(1, 'Samuel A Waldey', '95, Henry Street, Indented Head, Victoria', '03 5321 1053', 'Ahmedsodiq7@gmail.com', '11111', NULL),
(2, 'Mrs Eden Battarbee', '25 Main Streat, Beaumonts', '08 8762 5308', 'eden@gmail.com', '11111', NULL),
(3, 'Tyson A Salvado', '15 Ghost Hill Road, ST Marys South', '02 4728 5284', 'tyson@gmail.com', '11111', NULL),
(5, 'Musa Ahmed', 'Banana Island', '09088990099', 'MusaAhmed222@yahoo.com', 'password', '2022-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(10) NOT NULL,
  `property_title` varchar(150) DEFAULT NULL,
  `property_details` text DEFAULT NULL,
  `delivery_type` varchar(20) DEFAULT NULL,
  `availablility` int(5) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `property_address` varchar(200) DEFAULT NULL,
  `property_img` varchar(200) DEFAULT NULL,
  `bed_room` int(5) DEFAULT NULL,
  `liv_room` int(5) DEFAULT NULL,
  `parking` int(5) DEFAULT NULL,
  `kitchen` int(5) DEFAULT NULL,
  `utility` varchar(100) DEFAULT NULL,
  `property_type` varchar(20) DEFAULT NULL,
  `floor_space` varchar(20) DEFAULT NULL,
  `agent_id` int(10) DEFAULT NULL,
  `dateCreated` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `property_title`, `property_details`, `delivery_type`, `availablility`, `price`, `property_address`, `property_img`, `bed_room`, `liv_room`, `parking`, `kitchen`, `utility`, `property_type`, `floor_space`, `agent_id`, `dateCreated`) VALUES
(1, 'Apartment', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Sale', 0, 150000, '11 Ghost Hill Road', 'images/properties/bed-1-1.jpg', 3, 2, 1, 1, 'Electricity, Gas, Water', 'Apartment', '1600 X 1400', 1, '2022-04-17'),
(2, 'Apartment For Rent', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Rent', 0, 7000, '28 Ghost Hill Road', 'images/properties/bed-2-1.jpg', 3, 2, 1, 1, 'Electricity, Gas, Water', 'Apartment', '1650 X 1350', 1, '2022-04-17'),
(3, 'Apartment For Sale', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Sale', 1, 80000, '77 Ghost Hill Road', 'images/properties/bed-3-1.jpg', 3, 2, 1, 1, 'Electricity, Gas, Water', 'Apartment', '1500 X 1300', 3, '2022-04-17'),
(4, 'Office-Space for Sale', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Sale', 0, 100000, '15 Main Streat, Beaumonts', 'images/properties/liv-4-1.jpg', 2, 3, 1, 1, 'Electricity, Gas, Water, Internet', 'Office-Space', '1650 X 1350', 2, NULL),
(5, 'Office-Space for Rent', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Rent', 0, 7500, '91 Main Streat, Beaumonts', 'images/properties/liv-5-1.jpg', 2, 2, 1, 1, 'Electricity, Gas, Water, Internet', 'Office-Space', '1650 X 1350', 2, NULL),
(6, 'Office-Space for Rent', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Rent', 1, 6000, '93 Main Streat, Beaumonts', 'images/properties/liv-6-1.jpg', 2, 2, 1, 1, 'Electricity, Gas, Water, Internet', 'Office-Space', '1450 X 1250', 1, NULL),
(7, 'Building for Sale', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. <br> <br>\r\n\r\nCompletely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service', 'Sale', 0, 1750000, '65, Henry Street, Indented Head, Victoria', 'images/properties/bed-7-1.jpg', 3, 2, 1, 1, 'Electricity, Gas, Water', 'Building', '1650 X 1350', 1, NULL),
(13, 'Test Prop', 'Test', 'Rent', 0, 23444, 'Test', 'images/properties/5909ebd9f3563843cf80b3961e4191bd.jpg', 4, 2, 1, 2, 'Test', '3', 'Test', 1, '2022-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE `property_image` (
  `id` int(10) NOT NULL,
  `property_images` varchar(200) DEFAULT NULL,
  `property_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`id`, `property_images`, `property_id`) VALUES
(1, 'images/properties/bed-1-1.jpg', 1),
(2, 'images/properties/bed-1-2.jpg', 1),
(3, 'images/properties/liv-1-1.jpg', 1),
(4, 'images/properties/liv-1-2.jpg', 1),
(5, 'images/properties/kitchen-1-1.jpg', 1),
(6, 'images/properties/bed-1-1.jpg', 2),
(7, 'images/properties/bed-1-2.jpg', 2),
(8, 'images/properties/liv-1-1.jpg', 2),
(9, 'images/properties/liv-1-2.jpg', 2),
(10, 'images/properties/kitchen-1-1.jpg', 2),
(11, 'images/properties/bed-2-1.jpg', 2),
(12, 'images/properties/bed-2-2.jpg', 2),
(13, 'images/properties/liv-2-1.jpg', 2),
(14, 'images/properties/liv-2-2.jpg', 2),
(15, 'images/properties/kitchen-2-1.jpg', 2),
(16, 'images/properties/bed-3-1.jpg', 3),
(17, 'images/properties/bed-3-2.jpg', 3),
(18, 'images/properties/liv-3-1.jpg', 3),
(19, 'images/properties/liv-3-2.jpg', 3),
(20, 'images/properties/kitchen-3-1.jpg', 3),
(21, 'images/properties/bed-4-1.jpg', 4),
(22, 'images/properties/bed-4-2.jpg', 4),
(23, 'images/properties/liv-4-1.jpg', 4),
(24, 'images/properties/liv-4-2.jpg', 4),
(25, 'images/properties/kitchen-4-1.jpg', 4),
(26, 'images/properties/bed-5-1.jpg', 5),
(27, 'images/properties/bed-5-2.jpg', 5),
(28, 'images/properties/liv-5-1.jpg', 5),
(29, 'images/properties/liv-5-2.jpg', 5),
(30, 'images/properties/kitchen-5-1.jpg', 5),
(31, 'images/properties/bed-6-1.jpg', 6),
(32, 'images/properties/bed-6-2.jpg', 6),
(33, 'images/properties/liv-6-1.jpg', 6),
(34, 'images/properties/liv-6-2.jpg', 6),
(35, 'images/properties/kitchen-6-1.jpg', 6),
(36, 'images/properties/bed-7-1.jpg', 7),
(37, 'images/properties/bed-7-2.jpg', 7),
(38, 'images/properties/liv-7-1.jpg', 7),
(39, 'images/properties/liv-7-2.jpg', 7),
(40, 'images/properties/kitchen-7-1.jpg', 7),
(54, 'images/properties/2f7a177de230cf94a8e9a0bb68a8838e.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `id` int(10) NOT NULL,
  `typeName` varchar(255) DEFAULT NULL,
  `typeDescription` varchar(255) DEFAULT NULL,
  `dateCreated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `typeName`, `typeDescription`, `dateCreated`) VALUES
(1, 'Duplex', 'Duplex ', '2022-04-17'),
(3, 'Bungalow', 'Bungalow', '2022-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_image`
--
ALTER TABLE `property_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property_image`
--
ALTER TABLE `property_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
