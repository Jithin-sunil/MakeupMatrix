-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 08:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_makeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminreg`
--

CREATE TABLE `tbl_adminreg` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminreg`
--

INSERT INTO `tbl_adminreg` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artist`
--

CREATE TABLE `tbl_artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `artist_contact` varchar(20) NOT NULL,
  `artist_email` varchar(60) NOT NULL,
  `artist_gender` varchar(60) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `artist_photo` varchar(100) NOT NULL,
  `artist_proof` varchar(100) NOT NULL,
  `artist_license` varchar(100) NOT NULL,
  `artist_status` int(11) NOT NULL DEFAULT 0,
  `artist_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_artist`
--

INSERT INTO `tbl_artist` (`artist_id`, `artist_name`, `artist_contact`, `artist_email`, `artist_gender`, `district_id`, `place_id`, `artist_photo`, `artist_proof`, `artist_license`, `artist_status`, `artist_password`) VALUES
(1, 'Parvathy Raj', '7907426371', 'parvathyraj95@gmail.com', 'female', 16, 15, 'Screenshot (7).png', 'Screenshot (12).png', 'Screenshot (7).png', 1, 'parvathyraj@95'),
(2, 'Vividha Kailash', '9778383911', 'vividhhhakailash@gmail.com', 'female', 16, 4, 'Screenshot (16).png', 'Screenshot (7).png', 'Screenshot (6).png', 1, 'vividhaaa@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignstaff`
--

CREATE TABLE `tbl_assignstaff` (
  `assignstaff_id` int(11) NOT NULL,
  `assign_date` varchar(50) NOT NULL,
  `assign_status` int(50) NOT NULL DEFAULT 1,
  `staff_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assignstaff`
--

INSERT INTO `tbl_assignstaff` (`assignstaff_id`, `assign_date`, `assign_status`, `staff_id`, `booking_id`) VALUES
(4, '2024-11-04', 1, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_todate` date NOT NULL,
  `booking_totime` time NOT NULL,
  `booking_address` varchar(100) NOT NULL,
  `booking_details` varchar(30) NOT NULL,
  `booking_status` varchar(50) NOT NULL DEFAULT '0',
  `booking_reply` varchar(50) NOT NULL,
  `booking_advpaymentt` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_todate`, `booking_totime`, `booking_address`, `booking_details`, `booking_status`, `booking_reply`, `booking_advpaymentt`, `user_id`, `service_id`) VALUES
(1, '2024-11-02', '2024-11-05', '05:00:00', '', 'jvyugvk', '', '', '', 1, 8),
(2, '2024-11-02', '2024-11-20', '19:10:00', 'tfrctrtyvy', 'gvghv hgcyg', '1', 'jhgfd', '', 1, 8),
(3, '2024-11-02', '2024-11-05', '17:49:00', 'exexexexexe', '2ws3s3s', '0', '', '', 1, 8),
(4, '2024-11-04', '2024-11-07', '11:00:00', 'HU', 'Hi', '0', '', '', 2, 8),
(5, '2024-11-04', '2024-11-07', '14:27:00', 'Yes', 'Hi', '6', 'Hi', '', 2, 9),
(6, '2024-11-04', '2024-11-07', '14:07:00', '3434342', 'qqq', '6', 'Yes\r\n', '', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `Category_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `Category_image`) VALUES
(5, 'Makeup', ''),
(6, 'Hairstyling', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(50) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_content`, `complaint_date`, `complaint_reply`, `complaint_status`, `user_id`, `studio_id`, `artist_id`) VALUES
(1, 'I have a complaint machuuu', '2024-11-01', '', 0, 1, 0, 0),
(2, 'machuu oru complaint ondd', '2024-11-01', '', 0, 0, 0, 1),
(3, 'dcbhjdbcbckh', '2024-11-02', '', 0, 1, 0, 0),
(4, 'Hi', '2024-11-04', '', 0, 2, 0, 0),
(5, 'Hi\r\n', '2024-11-04', '', 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(6, 'Thiruvananthapuram'),
(7, 'Kollam'),
(9, 'Alappuzha'),
(13, 'Pathanamthitta'),
(14, 'Kottayam'),
(15, 'Idukki'),
(16, 'Ernakulam'),
(17, 'Thrissur'),
(18, 'Palakkad'),
(19, 'Malappuram'),
(20, 'Kozhikode'),
(21, 'Wayanad'),
(22, 'Kannur'),
(23, 'Kasaragod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makeupstudio`
--

CREATE TABLE `tbl_makeupstudio` (
  `studio_id` int(11) NOT NULL,
  `studio_name` varchar(50) NOT NULL,
  `studio_contact` varchar(50) NOT NULL,
  `studio_license` varchar(50) NOT NULL,
  `studio_proof` varchar(50) NOT NULL,
  `studio_email` varchar(50) NOT NULL,
  `studio_password` varchar(50) NOT NULL,
  `studio_photo` varchar(50) NOT NULL,
  `studio_startdate` date NOT NULL,
  `studio_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `studio_status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_makeupstudio`
--

INSERT INTO `tbl_makeupstudio` (`studio_id`, `studio_name`, `studio_contact`, `studio_license`, `studio_proof`, `studio_email`, `studio_password`, `studio_photo`, `studio_startdate`, `studio_address`, `place_id`, `studio_status`) VALUES
(1, 'Tiara Makeup Studio', '9947445254', 'Screenshot (16).png', 'Screenshot (13).png', 'tiaramakeupstudio@gmail.com', 'tiarastudio@135', 'Screenshot (12).png', '2024-10-25', 'Tiara Makeup Studio, Near Railway Station, Aluva, Ernakulam, Kerala 683101', 8, 1),
(2, 'Adorne Beauty Studio', '9562594134', 'Screenshot (17).png', 'Screenshot (13).png', 'adornebeautystudio@gmail.com', 'adornebeautyy', 'Screenshot (11).png', '2024-10-25', 'Muvattupuzha', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_blncepymntt` varchar(50) NOT NULL,
  `payment_remarks` varchar(50) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `district_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`district_id`, `place_id`, `place_name`) VALUES
(16, 4, 'Kochi'),
(16, 8, 'Aluva'),
(16, 9, 'Muvattupuzha'),
(15, 10, 'Munnar'),
(15, 11, 'Thodupuzha'),
(15, 12, 'Vattavada'),
(16, 15, 'Perumbavoor'),
(6, 16, 'Attingal'),
(6, 17, 'Nedumangad'),
(6, 18, 'Neyyattinkara'),
(7, 19, 'Chavara'),
(7, 20, 'Arackal'),
(7, 21, 'Chathannnoor'),
(7, 22, 'Paravoor'),
(7, 23, 'Oachira'),
(7, 24, 'Pathanapuram'),
(9, 25, 'Kuttanad'),
(9, 26, 'Chengannur'),
(9, 27, 'Mavelikkara'),
(9, 28, 'Kayamkulam'),
(9, 29, 'Haripad'),
(9, 30, 'Cherthala'),
(9, 31, 'Aroor'),
(9, 32, 'Ambalappuzha'),
(13, 33, 'Ranni'),
(13, 34, 'Adur'),
(13, 35, 'Panthalam'),
(13, 36, 'Thiruvalla'),
(13, 37, 'Kozhenchery'),
(13, 38, 'Pamba'),
(13, 39, 'Sabarimala'),
(13, 40, 'Thadiyoor'),
(14, 41, 'Kanjirappally'),
(14, 43, 'Puthupally'),
(14, 44, 'Changanassery'),
(0, 45, 'Pala'),
(14, 46, 'Vaikom'),
(14, 47, 'Ettumanoor'),
(14, 48, 'Kaduthuruthy'),
(14, 49, 'Pala'),
(14, 50, 'Poonjar'),
(15, 51, 'Rajamala'),
(15, 52, 'Maraiyur'),
(15, 53, 'Ponmudi'),
(15, 54, 'Pallivasal'),
(15, 55, 'Mattupatti'),
(15, 56, 'Devikulam'),
(15, 57, 'Painavu'),
(15, 58, 'Puttadi'),
(15, 59, 'Vellani'),
(15, 60, 'Mullakkudi'),
(15, 61, 'Kumili'),
(15, 62, 'Pashupara'),
(16, 63, 'Koovappady'),
(16, 64, 'Malayattoor'),
(16, 65, 'Angamaly'),
(16, 66, 'Kalady'),
(16, 67, 'Aimury'),
(16, 68, 'Mattoor'),
(16, 69, 'Kothamangalam'),
(16, 70, 'Vazhakulam'),
(16, 71, 'Arakuzha'),
(16, 72, 'Kalamassery'),
(16, 73, 'Varappuzha'),
(16, 74, 'Paravur'),
(16, 75, 'Elanji'),
(16, 76, 'Amballur'),
(16, 77, 'Mulamthuruthy'),
(16, 78, 'Kodanad'),
(16, 79, 'Thattekad'),
(16, 81, 'Cherai'),
(16, 82, 'Edappally'),
(16, 83, 'Nedumbassery'),
(16, 84, 'Chengal'),
(16, 85, 'Manjapra'),
(16, 86, 'Vengola'),
(16, 87, 'Arackappady'),
(16, 88, 'Thripunithura'),
(16, 89, 'Thrikkakkara'),
(16, 90, 'Kuttamassery'),
(16, 91, 'Pulluvazhy'),
(17, 92, 'Chalakkudy'),
(17, 93, 'Kunnamkulam'),
(17, 94, 'Ollur'),
(17, 95, 'Chelakkara'),
(17, 96, 'Guruvayur'),
(17, 97, 'Irinjalakkuda'),
(17, 98, 'Kaipamangalam'),
(17, 99, 'Pudukkad'),
(17, 100, 'Wadakkanchery'),
(17, 101, 'Manalur'),
(17, 102, 'Kodungallur'),
(17, 103, 'Koratty'),
(17, 104, 'Kadappuram'),
(17, 105, 'Chavakkad'),
(17, 106, 'Athirappily'),
(18, 107, 'Ottappalam'),
(18, 109, 'Pattambi'),
(18, 110, 'Alathur'),
(18, 111, 'Kannadi'),
(18, 112, 'Puthuppariyaram'),
(18, 113, 'Thathamangalam'),
(18, 114, 'Mundur'),
(18, 115, 'Shornur'),
(18, 116, 'Thrithala'),
(18, 117, 'Mannarkad'),
(18, 118, 'Kongad'),
(18, 119, 'Nenmara'),
(18, 120, 'Malampuzha'),
(18, 121, 'Chittur'),
(18, 122, 'Attappadi'),
(18, 124, 'Walayar'),
(18, 125, 'Nelliyampathi'),
(18, 126, 'Kollengode'),
(19, 127, 'Nilambur'),
(19, 128, 'Thennala'),
(19, 129, 'Vengara'),
(19, 130, 'Ponnani'),
(19, 131, 'Perinthalmanna'),
(19, 132, 'Kottakkal'),
(19, 133, 'Alamcode'),
(19, 134, 'Manjeri'),
(19, 135, 'Areekode'),
(19, 136, 'Wandoor'),
(19, 137, 'Edavanna'),
(19, 139, 'Vazhayur'),
(19, 140, 'Cherukavu'),
(19, 141, 'Moonniyur'),
(19, 142, 'Chembrasseri'),
(20, 143, 'Nadapuram'),
(20, 144, 'Koduvally'),
(20, 145, 'Elathur'),
(20, 146, 'Thiruvambadi'),
(20, 147, 'Perambra'),
(20, 148, 'Balusseri'),
(20, 149, 'Kunnamangalam'),
(20, 150, 'Beypore'),
(20, 152, 'Olavanna'),
(20, 153, 'Valayam'),
(21, 154, 'Sulthanbathery'),
(21, 155, 'Kalpetta'),
(21, 156, 'Mananthavadi'),
(21, 157, 'Meenangadi'),
(21, 158, 'Nenmeni'),
(21, 159, 'Meppadi'),
(21, 160, 'Noolpuzha'),
(21, 161, 'Kottathara'),
(21, 162, 'Vythiri'),
(21, 163, 'Vellarimala'),
(21, 164, 'Mundakai'),
(21, 165, 'Chooralmala'),
(22, 166, 'Payyanur'),
(22, 167, 'Irikkur'),
(22, 168, 'Azhikode'),
(22, 169, 'Thalassery'),
(22, 170, 'Dharmada'),
(22, 171, 'Kalliasseri'),
(22, 173, 'Aralam'),
(22, 174, 'Mahe'),
(22, 175, 'Madayi'),
(22, 176, 'Elayavoor'),
(22, 177, 'Panoor'),
(22, 178, 'Kuthuparamba'),
(23, 179, 'Manjeswar'),
(23, 180, 'Madikai'),
(23, 181, 'Uduma'),
(23, 183, 'Panathadi'),
(23, 184, 'Chengala'),
(23, 185, 'Meenja'),
(0, 186, ''),
(23, 187, 'Bellur'),
(23, 188, 'Kallar'),
(22, 189, 'Bediadka'),
(23, 191, 'Bediadka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_datetime` varchar(50) NOT NULL,
  `rating_value` varchar(50) NOT NULL,
  `rating_content` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_datetime`, `rating_value`, `rating_content`, `user_id`, `studio_id`, `artist_id`) VALUES
(10, '2024-11-04 12:29:13', '5', 'Hoi', 2, 0, 0),
(11, '2024-11-04 12:29:51', '5', 'Hi', 2, 0, 0),
(12, '2024-11-04 12:31:48', '5', 'HI', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_rate` varchar(50) NOT NULL,
  `service_description` varchar(50) NOT NULL,
  `service_image` varchar(100) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_name`, `service_rate`, `service_description`, `service_image`, `subcategory_id`, `studio_id`, `artist_id`) VALUES
(9, 'Service', '1200', 'Hi', 'beijing-china-january-28-2017-260nw-627951437.webp', 16, 0, 2),
(10, 'Service', '1200', 'Hi', 'beijing-china-january-28-2017-260nw-627951437.webp', 16, 0, 2),
(11, 's1', '100', 'hI', 'download.jfif', 23, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_photo` varchar(150) NOT NULL,
  `staff_license` varchar(150) NOT NULL,
  `staff_proof` varchar(50) NOT NULL,
  `staff_djoin` date NOT NULL,
  `studio_id` int(11) NOT NULL,
  `staff_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_photo`, `staff_license`, `staff_proof`, `staff_djoin`, `studio_id`, `staff_status`) VALUES
(1, 'staff1', 'Apple iPhone 15 Pro (256 GB) - Natural Titanium.jpg', 'first.jpeg', 'first.jpeg', '2024-11-02', 1, 0),
(2, 'bhjdbhsbc', 'first.jpeg', 'first.jpeg', 'first.jpeg', '2024-11-02', 1, 0),
(3, 'ewf', 'HP Laptop 15, 12th Gen i3-1215U, 15.6-inch (39.6 cm).jpg', 'HP Laptop 15, 12th Gen i3-1215U, 15.6-inch (39.6 cm).jpg', 'HP Laptop 15, 12th Gen i3-1215U, 15.6-inch (39.6 c', '2024-11-02', 1, 0),
(4, 'efef', 'first.jpeg', 'first.jpeg', 'first.jpeg', '2024-11-02', 1, 1),
(5, 'User', 'Ilahia table design.docx', 'download.jfif', 'boy-flat-cartoon-character-illustration_620650-210', '2024-11-04', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`category_id`, `subcategory_id`, `subcategory_name`) VALUES
(3, 11, 'Female'),
(5, 16, 'Bridal Makeup'),
(5, 17, 'Groom Makeup'),
(5, 20, 'Ocassional Makeup'),
(6, 23, 'Hairstyles for Men'),
(6, 24, 'Hairstyles for Women');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_photo` varchar(500) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `place_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_contact`, `user_photo`, `user_status`) VALUES
(1, 9, 'Rose Clement', 'clementrosiee@gmail.com', 'rosiee@123', 'Female', '9876654465', 'Screenshot (11).png', 1),
(2, 9, 'Henry Jacob', 'jacobhenry35@gmail.com', 'henryyy35', 'Male', '9085763410', 'Screenshot (12).png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminreg`
--
ALTER TABLE `tbl_adminreg`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `tbl_assignstaff`
--
ALTER TABLE `tbl_assignstaff`
  ADD PRIMARY KEY (`assignstaff_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_makeupstudio`
--
ALTER TABLE `tbl_makeupstudio`
  ADD PRIMARY KEY (`studio_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminreg`
--
ALTER TABLE `tbl_adminreg`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_assignstaff`
--
ALTER TABLE `tbl_assignstaff`
  MODIFY `assignstaff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_makeupstudio`
--
ALTER TABLE `tbl_makeupstudio`
  MODIFY `studio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
