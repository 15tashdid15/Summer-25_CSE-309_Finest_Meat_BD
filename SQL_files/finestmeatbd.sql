-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 12:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finestmeatbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `pickup_location` varchar(100) DEFAULT NULL,
  `delivery_location` varchar(100) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `packaged_product_id` int(11) DEFAULT NULL,
  `retailer_id` int(11) DEFAULT NULL,
  `real_time_location_tracking` varchar(255) DEFAULT NULL,
  `location_log` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `pickup_location`, `delivery_location`, `pickup_date`, `delivery_date`, `pickup_time`, `delivery_time`, `packaged_product_id`, `retailer_id`, `real_time_location_tracking`, `location_log`) VALUES
(26, 'Shyamoli, Block L', NULL, '2025-04-10', '2025-04-12', '10:00:00', '12:00:00', 1, 1, 'Latitude: 23.8103, Longitude: 90.4125', 'Shyamoli, Block L'),
(27, 'Mohammadpur, Block D', NULL, '2025-04-12', '2025-04-13', '09:00:00', '11:00:00', 2, 2, 'Latitude: 23.8103, Longitude: 90.4125', 'Mohammadpur, Block D'),
(28, 'Rampura', NULL, '2025-04-13', '2025-04-14', '08:30:00', '10:30:00', 3, 3, 'Latitude: 23.8103, Longitude: 90.4125', 'Rampura, Block O'),
(29, 'Savar', NULL, '2025-04-14', '2025-04-15', '11:00:00', '13:00:00', 4, 4, 'Latitude: 23.8103, Longitude: 90.4125', 'Savar, Block AB'),
(30, 'Tejgaon', NULL, '2025-04-16', '2025-04-17', '14:00:00', '16:00:00', 5, 5, 'Latitude: 23.8103, Longitude: 90.4125', 'Tejgaon, Block C'),
(31, 'Gulshan-2', NULL, '2025-04-17', '2025-04-18', '10:00:00', '12:00:00', 6, 6, 'Latitude: 23.8103, Longitude: 90.4125', 'Gulshan-2, Block D'),
(32, 'Mohammadpur', NULL, '2025-04-18', '2025-04-19', '09:30:00', '11:30:00', 7, 7, 'Latitude: 23.8103, Longitude: 90.4125', 'Mohammadpur, Block D'),
(33, 'Savar', NULL, '2025-04-19', '2025-04-20', '12:00:00', '14:00:00', 8, 8, 'Latitude: 23.8103, Longitude: 90.4125', 'Savar, Block C'),
(34, 'Rampura', NULL, '2025-04-20', '2025-04-21', '11:00:00', '13:00:00', 9, 9, 'Latitude: 23.8103, Longitude: 90.4125', 'Rampura, Block O'),
(35, 'Tejgaon', NULL, '2025-04-21', '2025-04-22', '14:30:00', '16:30:00', 10, 10, 'Latitude: 23.8103, Longitude: 90.4125', 'Tejgaon, Block C');

-- --------------------------------------------------------

--
-- Table structure for table `grading_criteria_standard`
--

CREATE TABLE `grading_criteria_standard` (
  `criteria_id` int(11) NOT NULL,
  `criteria_description` text DEFAULT NULL,
  `grade_level` varchar(20) DEFAULT NULL,
  `acceptable_range` varchar(50) DEFAULT NULL,
  `standard_guidelines` text DEFAULT NULL,
  `inspector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading_criteria_standard`
--

INSERT INTO `grading_criteria_standard` (`criteria_id`, `criteria_description`, `grade_level`, `acceptable_range`, `standard_guidelines`, `inspector_id`) VALUES
(1, 'Quality Assurance for Beef', 'A', '90-100', 'Beef grading based on texture and fat content', 1),
(2, 'Mutton Quality Standards', 'B', '80-89', 'Ensure meat is tender and juicy', 2),
(3, 'Poultry Inspection', 'A', '95-100', 'Strict adherence to packaging and hygiene standards', 3),
(4, 'Fish Quality Standards', 'C', '70-79', 'Maintain fish freshness and smell', 4),
(5, 'Cold Cut Grading', 'B', '85-90', 'Check fat content and slicing quality', 5);

-- --------------------------------------------------------

--
-- Table structure for table `inspectors`
--

CREATE TABLE `inspectors` (
  `inspector_id` int(11) NOT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `MName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `contact_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inspectors`
--

INSERT INTO `inspectors` (`inspector_id`, `FName`, `MName`, `LName`, `designation`, `contact_info`) VALUES
(1, 'Anwar', 'Hossain', 'Siddique', 'Senior Inspector', '019XXXXX1'),
(2, 'Mariam', 'Jahan', 'Nisha', 'Junior Inspector', '019XXXXX2'),
(3, 'Rafiqul', 'Islam', 'Khan', 'Head Inspector', '019XXXXX3'),
(4, 'Shamim', 'Hossain', 'Ali', 'Inspection Officer', '019XXXXX4'),
(5, 'Farhana', 'Sultana', 'Begum', 'Senior Quality Inspector', '019XXXXX5');

-- --------------------------------------------------------

--
-- Table structure for table `meatproducts`
--

CREATE TABLE `meatproducts` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `animal_source` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meatproducts`
--

INSERT INTO `meatproducts` (`product_id`, `product_name`, `category`, `animal_source`) VALUES
(1, 'Beef Cuts', 'Beef', 'Cow'),
(4, 'Fish Filet', 'Fish', 'Fish'),
(5, 'Cold Cut Slices', 'Cold Cuts', 'Pork'),
(8, 'Chicken Breast', 'Poultry', 'Chicken'),
(9, 'Frozen Fish', 'Fish', 'Fish'),
(10, 'Ham Slices', 'Cold Cuts', 'Pork'),
(12, 'Mutton Leg', 'Mutton', 'Goat'),
(13, 'Whole Chicken', 'Poultry', 'Chicken'),
(16, 'Beef Ground Meat', 'Beef', 'Cow'),
(17, 'Mutton Chops', 'Mutton', 'Goat');

-- --------------------------------------------------------

--
-- Table structure for table `meat_grades`
--

CREATE TABLE `meat_grades` (
  `id` int(11) NOT NULL,
  `meat_type` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `inspection_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meat_grades`
--

INSERT INTO `meat_grades` (`id`, `meat_type`, `grade`, `weight`, `inspection_date`) VALUES
(1, 'sdfd', '89', 66.00, '2025-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `packaged_meat_product`
--

CREATE TABLE `packaged_meat_product` (
  `packaged_product_id` int(11) NOT NULL,
  `packaged_weight` decimal(10,2) DEFAULT NULL,
  `packaged_date` date DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `production_batch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packaged_meat_product`
--

INSERT INTO `packaged_meat_product` (`packaged_product_id`, `packaged_weight`, `packaged_date`, `package_id`, `production_batch_id`) VALUES
(1, 15.00, '2025-04-10', NULL, NULL),
(2, 20.00, '2025-04-12', NULL, NULL),
(3, 25.00, '2025-04-14', NULL, NULL),
(4, 18.50, '2025-04-16', NULL, NULL),
(5, 22.00, '2025-04-18', NULL, NULL),
(6, 19.75, '2025-04-20', NULL, NULL),
(7, 17.00, '2025-04-22', NULL, NULL),
(8, 21.00, '2025-04-24', NULL, NULL),
(9, 23.50, '2025-04-26', NULL, NULL),
(10, 24.00, '2025-04-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_id` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_id`, `status`, `updated_at`) VALUES
(1, '234345434542', 'Packed', '2025-08-01'),
(2, '2343454345', 'Sealed', '2025-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `packaging_unit`
--

CREATE TABLE `packaging_unit` (
  `package_id` int(11) NOT NULL,
  `packaging_material` varchar(50) DEFAULT NULL,
  `packaging_type` varchar(50) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `capacity` decimal(10,2) DEFAULT NULL,
  `package_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packaging_unit`
--

INSERT INTO `packaging_unit` (`package_id`, `packaging_material`, `packaging_type`, `dimension`, `capacity`, `package_date`, `expiry_date`) VALUES
(1, 'Plastic', 'Box', '10x10x10', 50.00, '2025-04-10', '2025-05-10'),
(2, 'Metal', 'Can', '15x15x15', 70.00, '2025-04-12', '2025-06-12'),
(3, 'Glass', 'Jar', '5x5x5', 30.00, '2025-04-14', '2025-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `production_batch`
--

CREATE TABLE `production_batch` (
  `production_batch_id` int(11) NOT NULL,
  `per_unit_weight` decimal(10,2) DEFAULT NULL,
  `grading_date` date DEFAULT NULL,
  `production_date` date DEFAULT NULL,
  `batch_number` varchar(20) DEFAULT NULL,
  `unit_product_color` varchar(50) DEFAULT NULL,
  `fat_content` decimal(5,2) DEFAULT NULL,
  `texture` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `inspector_id` int(11) DEFAULT NULL,
  `trend_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production_batch`
--

INSERT INTO `production_batch` (`production_batch_id`, `per_unit_weight`, `grading_date`, `production_date`, `batch_number`, `unit_product_color`, `fat_content`, `texture`, `remarks`, `product_id`, `inspector_id`, `trend_id`) VALUES
(1, 15.00, '2025-04-10', '2025-04-10', '1', 'Red', 5.00, 'Smooth', 'Freshly packaged batch', 1, 1, 1),
(2, 20.00, '2025-04-12', '2025-04-12', '2', 'Pink', 4.50, 'Firm', 'Inspection completed', 16, 2, 2),
(3, 25.00, '2025-04-14', '2025-04-14', '3', 'White', 5.20, 'Soft', 'Quality check passed', 8, 3, 3),
(4, 18.50, '2025-04-15', '2025-04-15', '4', 'Light Red', 4.80, 'Tender', 'Batch ready for distribution', 5, 4, 1),
(5, 30.00, '2025-04-16', '2025-04-16', '5', 'Yellow', 6.00, 'Smooth', 'No issues identified', 9, 5, 2),
(6, 22.00, '2025-04-17', '2025-04-17', '6', 'Dark Red', 4.70, 'Firm', 'Standard quality grade', 9, 1, 3),
(7, 27.00, '2025-04-18', '2025-04-18', '7', 'Red', 5.50, 'Firm', 'Pending final checks', 16, 2, 2),
(8, 17.50, '2025-04-19', '2025-04-19', '8', 'Pink', 5.00, 'Soft', 'Grading stage completed', 5, 4, 1),
(9, 21.00, '2025-04-20', '2025-04-20', '9', 'Light Red', 4.60, 'Smooth', 'Inspection finished', 9, 5, 3),
(10, 23.00, '2025-04-21', '2025-04-21', '10', 'Yellow', 4.90, 'Firm', 'Ready for packaging', 9, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `qualitytrends`
--

CREATE TABLE `qualitytrends` (
  `trend_id` int(11) NOT NULL,
  `trend_analysis` text DEFAULT NULL,
  `issue_identification` text DEFAULT NULL,
  `detected_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualitytrends`
--

INSERT INTO `qualitytrends` (`trend_id`, `trend_analysis`, `issue_identification`, `detected_date`) VALUES
(1, 'Trend analysis of meat quality', 'Decreased freshness detected', '2025-04-10'),
(2, 'Analysis shows optimal conditions', 'No issues identified', '2025-04-12'),
(3, 'Trend analysis shows potential spoilage', 'Spoilage detected', '2025-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `retailer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `warehouse` varchar(255) NOT NULL,
  `road` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`retailer_id`, `first_name`, `middle_name`, `last_name`, `warehouse`, `road`, `block`, `street_name`, `postal_code`, `country`) VALUES
(1, 'Fahim', 'Anwar', 'Shaon', 'wh282', '13', 'Z', 'Kamarpara, Block Z, Dhaka', '1211', 'Bangladesh'),
(2, 'Sakib', 'Alam', 'Hossain', 'wh42', '56', 'B', 'Mirpur Road, Block B, Dhaka', '1206', 'Bangladesh'),
(3, 'Ariful', 'Rana', 'Hossain', 'wh52', '34', 'C', 'Basundhara, Block C, Dhaka', '1229', 'Bangladesh'),
(4, 'Shamim', 'Rahman', 'Khan', 'wh62', '23', 'D', 'Mohammadpur, Block D, Dhaka', '1210', 'Bangladesh'),
(5, 'Rumana', 'Parvin', 'Akter', 'wh72', '45', 'E', 'Dhanmondi, Block E, Dhaka', '1207', 'Bangladesh'),
(6, 'Mehedi', 'Hasan', 'Chowdhury', 'wh82', '67', 'F', 'Jatrabari, Block F, Dhaka', '1230', 'Bangladesh'),
(7, 'Aminul', 'Islam', 'Mollah', 'wh92', '89', 'G', 'Tongi, Block G, Gazipur', '1705', 'Bangladesh'),
(8, 'Biplob', 'Chandra', 'Paul', 'wh102', '91', 'H', 'Nikunja, Block H, Dhaka', '1226', 'Bangladesh'),
(9, 'Nazma', 'Sultana', 'Begum', 'wh112', '12', 'I', 'Gulshan-2, Block I, Dhaka', '1213', 'Bangladesh'),
(10, 'Kamrul', 'Hasan', 'Talukder', 'wh122', '33', 'J', 'Banani, Block J, Dhaka', '1215', 'Bangladesh'),
(11, 'Ayesha', 'Khatun', 'Rashid', 'wh132', '66', 'K', 'Uttara, Block K, Dhaka', '1232', 'Bangladesh'),
(12, 'Zakir', 'Hossain', 'Patwary', 'wh142', '23', 'L', 'Shyamoli, Block L, Dhaka', '1205', 'Bangladesh'),
(13, 'Mahi', 'Rani', 'Miah', 'wh152', '40', 'M', 'Bashundhara, Block M, Dhaka', '1210', 'Bangladesh'),
(14, 'Rafiq', 'Ahmad', 'Sarker', 'wh162', '51', 'N', 'Tejgaon, Block N, Dhaka', '1213', 'Bangladesh'),
(15, 'Shazia', 'Binte', 'Mahbub', 'wh172', '35', 'O', 'Rampura, Block O, Dhaka', '1219', 'Bangladesh'),
(16, 'Arman', 'Alam', 'Rafi', 'wh182', '44', 'P', 'Khilkhet, Block P, Dhaka', '1233', 'Bangladesh'),
(17, 'Asad', 'Javed', 'Khan', 'wh192', '60', 'Q', 'Mirpur-10, Block Q, Dhaka', '1216', 'Bangladesh'),
(18, 'Tanvir', 'Mahmud', 'Siddique', 'wh202', '77', 'R', 'Monipuripara, Block R, Dhaka', '1208', 'Bangladesh'),
(19, 'Jamil', 'Hossain', 'Ali', 'wh212', '88', 'S', 'Dohar, Block S, Dhaka', '1343', 'Bangladesh'),
(20, 'Rubina', 'Parvin', 'Momin', 'wh222', '57', 'T', 'Lalmatia, Block T, Dhaka', '1206', 'Bangladesh'),
(21, 'Khalid', 'Ahmed', 'Patwary', 'wh232', '50', 'U', 'Jigatola, Block U, Dhaka', '1217', 'Bangladesh'),
(22, 'Shimu', 'Sultana', 'Rumi', 'wh242', '12', 'V', 'Shahbagh, Block V, Dhaka', '1214', 'Bangladesh'),
(23, 'Shahida', 'Binte', 'Nasreen', 'wh252', '15', 'W', 'Badda, Block W, Dhaka', '1212', 'Bangladesh'),
(24, 'Alamgir', 'Hossain', 'Shikder', 'wh262', '36', 'X', 'Dhanmondi, Block X, Dhaka', '1210', 'Bangladesh'),
(25, 'Mohammad', 'Ibrahim', 'Khan', 'wh272', '22', 'Y', 'Azimpur, Block Y, Dhaka', '1209', 'Bangladesh'),
(26, 'Fahim', 'Anwar', 'Shaon', 'wh282', '13', 'Z', 'Kamarpara, Block Z, Dhaka', '1211', 'Bangladesh'),
(27, 'Kamal', 'Uddin', 'Mollah', 'wh292', '30', 'AA', 'Motijheel, Block AA, Dhaka', '1208', 'Bangladesh'),
(28, 'Shahin', 'Chowdhury', 'Abir', 'wh302', '31', 'AB', 'Savar, Block AB, Dhaka', '1350', 'Bangladesh'),
(29, 'Rohit', 'Khan', 'Ahmed', 'wh312', '25', 'AC', 'Karwanbazar, Block AC, Dhaka', '1212', 'Bangladesh'),
(30, 'Nadiya', 'Khatun', 'Karim', 'wh322', '61', 'AD', 'Mouchak, Block AD, Dhaka', '1215', 'Bangladesh'),
(33, 'Tashdid', 'Enamul', 'Parom', 'wh142', '23', 'L', 'Shyamoli, Block L, Dhaka', '1205', 'Bangladesh'),
(34, 'Shahin', 'Chowdhury', 'Abir', 'wh62', '23', 'D', 'Mohammadpur, Block D, Dhaka', '1210', 'Bangladesh'),
(35, 'Shazia', 'Binte', 'Mahbub', 'wh242', '15', 'O', 'Rampura, Block O, Dhaka', '1215', 'Bangladesh'),
(36, 'Sakib', 'Alam', 'Hossain', 'wh212', '30', 'N', 'Mirpur Road, Block B, Dhaka', '1216', 'Bangladesh'),
(37, 'Shamim', 'Rahman', 'Khan', 'wh152', '45', 'S', 'Tejgaon, Block C, Dhaka', '1217', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `track_product_health`
--

CREATE TABLE `track_product_health` (
  `tracking_id` int(11) NOT NULL,
  `temperature` decimal(5,2) DEFAULT NULL,
  `humidity` decimal(5,2) DEFAULT NULL,
  `packaged_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track_product_health`
--

INSERT INTO `track_product_health` (`tracking_id`, `temperature`, `humidity`, `packaged_product_id`) VALUES
(1, 15.00, 55.00, 1),
(2, 14.00, 60.00, 2),
(3, 16.00, 53.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transport_logs`
--

CREATE TABLE `transport_logs` (
  `id` int(11) NOT NULL,
  `batch_id` varchar(100) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `departure_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_logs`
--

INSERT INTO `transport_logs` (`id`, `batch_id`, `vehicle_no`, `status`, `departure_date`) VALUES
(1, '234e343', '22454', 'Delivered', '2025-08-15'),
(2, '234e343667', '3634553', 'Delivered', '2025-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'tashdid', 'tashdid.enamul.parom@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'habib', 'habib1233@gmail.com', '796bec34f85ce9cc1f54c4ff54b30a1b'),
(4, 'Rabiul Karim', 'rk.kr@gmail', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'rabi karim', 'rabi.karim@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Joyonto ovi', 'rocks@gmail.com', '9f5a1b0744b0d4543110eabf84f9acaf'),
(7, 'Test', 'Test@gmail.com', '68eacb97d86f0c4621fa2b0e17cabd8c'),
(8, 'TASHDID1514', 'tashdid@gmail.com', '353d86db044f661851a9a8b86b5b0b69'),
(10, 'TEST', 'test123@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(11, 'ADMINN', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500'),
(12, 'testing', 'T@gmail.com', '7f2ababa423061c509f4923dd04b6cf1'),
(13, 'nan2', 'nan2ghotok@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(14, '12345', '123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `packaged_product_id` (`packaged_product_id`),
  ADD KEY `retailer_id` (`retailer_id`);

--
-- Indexes for table `grading_criteria_standard`
--
ALTER TABLE `grading_criteria_standard`
  ADD PRIMARY KEY (`criteria_id`),
  ADD KEY `inspector_id` (`inspector_id`);

--
-- Indexes for table `inspectors`
--
ALTER TABLE `inspectors`
  ADD PRIMARY KEY (`inspector_id`);

--
-- Indexes for table `meatproducts`
--
ALTER TABLE `meatproducts`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `meat_grades`
--
ALTER TABLE `meat_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaged_meat_product`
--
ALTER TABLE `packaged_meat_product`
  ADD PRIMARY KEY (`packaged_product_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `production_batch_id` (`production_batch_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_id` (`package_id`);

--
-- Indexes for table `packaging_unit`
--
ALTER TABLE `packaging_unit`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `production_batch`
--
ALTER TABLE `production_batch`
  ADD PRIMARY KEY (`production_batch_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `inspector_id` (`inspector_id`),
  ADD KEY `trend_id` (`trend_id`);

--
-- Indexes for table `qualitytrends`
--
ALTER TABLE `qualitytrends`
  ADD PRIMARY KEY (`trend_id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`retailer_id`);

--
-- Indexes for table `track_product_health`
--
ALTER TABLE `track_product_health`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `packaged_product_id` (`packaged_product_id`);

--
-- Indexes for table `transport_logs`
--
ALTER TABLE `transport_logs`
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
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `grading_criteria_standard`
--
ALTER TABLE `grading_criteria_standard`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inspectors`
--
ALTER TABLE `inspectors`
  MODIFY `inspector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meatproducts`
--
ALTER TABLE `meatproducts`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `meat_grades`
--
ALTER TABLE `meat_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packaged_meat_product`
--
ALTER TABLE `packaged_meat_product`
  MODIFY `packaged_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packaging_unit`
--
ALTER TABLE `packaging_unit`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production_batch`
--
ALTER TABLE `production_batch`
  MODIFY `production_batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `qualitytrends`
--
ALTER TABLE `qualitytrends`
  MODIFY `trend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `retailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `track_product_health`
--
ALTER TABLE `track_product_health`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transport_logs`
--
ALTER TABLE `transport_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`packaged_product_id`) REFERENCES `packaged_meat_product` (`packaged_product_id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`retailer_id`) REFERENCES `retailers` (`retailer_id`);

--
-- Constraints for table `grading_criteria_standard`
--
ALTER TABLE `grading_criteria_standard`
  ADD CONSTRAINT `grading_criteria_standard_ibfk_1` FOREIGN KEY (`inspector_id`) REFERENCES `inspectors` (`inspector_id`);

--
-- Constraints for table `packaged_meat_product`
--
ALTER TABLE `packaged_meat_product`
  ADD CONSTRAINT `packaged_meat_product_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packaging_unit` (`package_id`),
  ADD CONSTRAINT `packaged_meat_product_ibfk_2` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batch` (`production_batch_id`);

--
-- Constraints for table `production_batch`
--
ALTER TABLE `production_batch`
  ADD CONSTRAINT `production_batch_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `meatproducts` (`product_id`),
  ADD CONSTRAINT `production_batch_ibfk_2` FOREIGN KEY (`inspector_id`) REFERENCES `inspectors` (`inspector_id`),
  ADD CONSTRAINT `production_batch_ibfk_3` FOREIGN KEY (`trend_id`) REFERENCES `qualitytrends` (`trend_id`);

--
-- Constraints for table `track_product_health`
--
ALTER TABLE `track_product_health`
  ADD CONSTRAINT `track_product_health_ibfk_1` FOREIGN KEY (`packaged_product_id`) REFERENCES `packaged_meat_product` (`packaged_product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
