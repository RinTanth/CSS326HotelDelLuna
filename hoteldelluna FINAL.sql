-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 04:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldelluna`
--
CREATE DATABASE IF NOT EXISTS `hoteldelluna` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hoteldelluna`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getGuestBooking` (IN `bookingid` BIGINT)  BEGIN
	SELECT guest.Fname, guest.Lname, guest.Prefix, guest.Telephone, guest.Email, roomtype.Name AS RoomName, roomtype.Price, booking.DateFrom, booking.DateTo, booking.Adults, booking.Children, 
    roomtype.ImageLink
	FROM booking, guest, roomtype, roomsbooked
	WHERE booking.GuestID = guest.GuestID
    	AND roomsbooked.BookingID = booking.BookingID
    	AND roomsbooked.TypeID = roomtype.TypeID
    	AND booking.BookingID = bookingID;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` bigint(20) NOT NULL,
  `GuestID` bigint(20) NOT NULL,
  `PaymentID` bigint(20) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Adults` int(1) NOT NULL,
  `Children` int(1) NOT NULL,
  `ReserveDate` date NOT NULL,
  `DiscountCode` varchar(20) NOT NULL,
  `ExtraInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `GuestID`, `PaymentID`, `DateFrom`, `DateTo`, `Adults`, `Children`, `ReserveDate`, `DiscountCode`, `ExtraInfo`) VALUES
(1, 1, 1, '2021-11-08', '2021-11-12', 1, 0, '2021-11-07', 'XXX', NULL),
(2, 2, 2, '2021-11-11', '2021-11-15', 1, 0, '2021-11-07', 'XXXX', NULL),
(3, 3, 3, '2021-11-13', '2021-11-18', 2, 0, '2021-11-07', 'QQQQ', NULL),
(4, 4, 4, '2021-11-07', '2021-11-14', 2, 1, '2021-11-01', 'QUACK', NULL),
(5, 5, 5, '2021-11-06', '2021-11-11', 1, 2, '2021-11-02', 'DUCK', NULL),
(6, 6, 6, '2021-11-10', '2021-11-13', 3, 0, '2021-11-07', 'HAHA', NULL),
(7, 7, 7, '2021-11-14', '2021-11-18', 3, 0, '2021-11-11', 'DUCKNOGO', NULL),
(8, 8, 8, '2021-11-09', '2021-11-14', 1, 0, '2021-11-01', 'OUIOUI', NULL),
(9, 9, 9, '2021-11-13', '2021-11-16', 1, 0, '2021-11-07', 'BAGUETTE', NULL),
(10, 10, 10, '2021-11-07', '2021-11-11', 2, 0, '2021-11-04', 'ECLAIR', NULL),
(11, 11, 11, '2021-11-08', '2021-11-11', 2, 0, '2021-11-05', 'AUBONPAIN', NULL),
(12, 12, 12, '2021-11-10', '2021-11-13', 2, 1, '2021-11-04', 'IMINPAIN', NULL),
(26, 31, 30, '2021-11-10', '2021-11-13', 1, 1, '2021-11-19', 'LIKEASOMEBODY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestID` bigint(20) NOT NULL,
  `Fname` varchar(40) NOT NULL,
  `Lname` varchar(40) NOT NULL,
  `Prefix` varchar(40) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Country` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `Fname`, `Lname`, `Prefix`, `Telephone`, `Email`, `Country`) VALUES
(1, 'Cinnamon', 'Bun', 'Mr.', '0123456789', 'cinnamon_bun@g.siit.tu.ac.th', 'Thailand'),
(2, 'Apple', 'Jack', 'Mrs.', '0122396519', 'apple_jack@g.siit.tu.ac.th', 'Cinnamon Islands'),
(3, 'Chimi', 'Chunga', 'Mr.', '0811111111', 'chimi_chunga@g.siit.tu.ac.th', 'Mexico'),
(4, 'Cali', 'Maki', 'Ms.', '0222222222', 'cali_maki@g.siit.tu.ac.th', 'United States of America'),
(5, 'Moo ', 'Krob', 'Mr.', '0811111112', 'moo_krob@g.siit.tu.ac.th', 'Thailand'),
(6, 'Som', 'Tum', 'Ms.', '0122357686', 'som_tum@g.siit.tu.ac.th', 'Thailand'),
(7, 'Ta', 'Ko', 'Dr.', '1231241321', 'tako@g.siit.tu.ac.th', 'Japan'),
(8, 'Enchi', 'Ladas', 'Ms.', '0224233223', 'enchi_lada@g.siit.tu.ac.th', 'Mexico'),
(9, 'Burr', 'Ito', 'Mr.', '0155422782', 'burrito@g.siit.tu.ac.th', 'Mexico'),
(10, 'Tar', 'Tare', 'Dr.', '1349293829', 'tatare@g.siit.tu.ac.th', 'France'),
(11, 'Aglio', 'E. Olio', 'Mr.', '8478123901', 'aglio_olio@g.siit.tu.ac.th', 'Italy'),
(12, 'Oui', 'Baguette', 'Mrs.', '8237818920', 'oui_baguette@g.siit.tu.ac.th', 'France'),
(31, 'Charn', 'Arunkit', 'Mr.', '123456', 'charn.arunkit@gmail.com', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` bigint(20) NOT NULL,
  `Method` varchar(30) NOT NULL,
  `Status` int(1) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `Method`, `Status`, `Date`) VALUES
(1, 'Bank Transfer', 1, NULL),
(2, 'Kidney', 0, NULL),
(3, 'Bank Transfer', 1, NULL),
(4, 'Crypto', 1, NULL),
(5, 'Crypto', 1, NULL),
(6, 'Kidney', 0, NULL),
(7, 'Credit Card', 1, NULL),
(8, 'Credit Card', 1, NULL),
(9, 'Bank Transfer', 1, NULL),
(10, 'Crypto', 1, NULL),
(11, 'Credit Card', 1, NULL),
(12, 'My Soul', 1, NULL),
(30, 'Your Soul', 1, '2021-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` bigint(20) NOT NULL,
  `TypeID` bigint(20) NOT NULL,
  `StatusID` bigint(20) NOT NULL,
  `Floor` int(11) NOT NULL,
  `RoomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `TypeID`, `StatusID`, `Floor`, `RoomNo`) VALUES
(1, 1, 1, 1, 101),
(2, 1, 2, 1, 102),
(3, 1, 3, 1, 103),
(4, 1, 4, 1, 104),
(5, 1, 5, 1, 105),
(6, 1, 6, 1, 106),
(7, 2, 7, 2, 207),
(8, 2, 8, 2, 208),
(9, 2, 9, 2, 209),
(10, 2, 10, 2, 210),
(11, 2, 11, 2, 211),
(12, 2, 12, 2, 212),
(13, 3, 13, 3, 313),
(14, 3, 14, 3, 314),
(15, 3, 15, 3, 315),
(16, 3, 16, 3, 316),
(17, 3, 17, 3, 317),
(18, 3, 18, 3, 318);

-- --------------------------------------------------------

--
-- Table structure for table `roomsbooked`
--

CREATE TABLE `roomsbooked` (
  `BookingID` bigint(20) NOT NULL,
  `RoomID` bigint(20) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `TypeID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomsbooked`
--

INSERT INTO `roomsbooked` (`BookingID`, `RoomID`, `Status`, `TypeID`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, NULL, 0, 2),
(4, 13, 1, 3),
(5, 14, 1, 3),
(6, 15, 1, 3),
(7, NULL, 0, 3),
(8, 3, 1, 1),
(9, NULL, 0, 1),
(10, 8, 1, 2),
(11, 9, 1, 2),
(12, 17, 1, 3),
(26, NULL, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `StatusID` bigint(20) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`StatusID`, `Status`) VALUES
(1, 1),
(2, 1),
(3, 0),
(4, 0),
(5, 0),
(6, 1),
(7, 1),
(8, 0),
(9, 1),
(10, 1),
(11, 0),
(12, 0),
(13, 1),
(14, 0),
(15, 1),
(16, 1),
(17, 0),
(18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `TypeID` bigint(20) NOT NULL,
  `ServiceID` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(5) NOT NULL,
  `Description` text NOT NULL,
  `MaxGuests` tinyint(1) NOT NULL,
  `ImageLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`TypeID`, `ServiceID`, `Name`, `Price`, `Description`, `MaxGuests`, `ImageLink`) VALUES
(1, 1, 'Lonely Star', 50, 'All it takes is one star and you\'ll be mine', 1, 'images/room1.jpg'),
(2, 2, 'Twin Stars', 70, 'It takes two to become one. ', 2, 'images/room2.jpg'),
(3, 2, 'Gemini Star', 90, 'We shine together, like the moon and stars', 3, 'images/room3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ServiceID` bigint(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Spa` int(1) NOT NULL,
  `Fitness` int(1) NOT NULL,
  `Lounge` int(1) NOT NULL,
  `Sauna` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServiceID`, `Name`, `Spa`, `Fitness`, `Lounge`, `Sauna`) VALUES
(1, 'Moonlight', 1, 0, 0, 1),
(2, 'Platinum Star', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` bigint(20) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Prefix` varchar(5) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Province` varchar(60) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Email` text NOT NULL,
  `Position` varchar(40) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Passwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Fname`, `Lname`, `Prefix`, `City`, `Province`, `Country`, `ZipCode`, `Telephone`, `Email`, `Position`, `Username`, `Passwd`) VALUES
(1, 'Rinrada', 'Kid', 'Ms.', 'KK', 'KhonKaen', 'Thailand', '40000', '0809989514', 'galgal@gmail.com', 'Receptionist', 'galgal', 'd0fb963ff976f9c37fc81fe03c21ea7b'),
(2, 'Charn', 'Dino', 'Mr.', 'island', 'jurassic', 'dinoland', '696969', '0941981001', 'charnosaur@dino.com', 'Admin', 'charnar', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Nut', 'Danny', 'Mr.', 'Bangkok', 'Bangkok', 'Thailand', '10201', '124124', 'nut.danny@lunadelhotel.com', 'Receptionist', 'nut', 'a0491eb77ad302615cb757d193d47c7e');

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `encryptPassword` BEFORE INSERT ON `staff` FOR EACH ROW BEGIN
	SET NEW.Passwd = MD5(NEW.Passwd);

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `booking_fk1` (`GuestID`),
  ADD KEY `booking_fk2` (`PaymentID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `room_fk1` (`TypeID`),
  ADD KEY `room_fk2` (`StatusID`);

--
-- Indexes for table `roomsbooked`
--
ALTER TABLE `roomsbooked`
  ADD KEY `roomsbooked_fk1` (`BookingID`),
  ADD KEY `roomsbooked_fk2` (`RoomID`),
  ADD KEY `roomsbooked_fk3` (`TypeID`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`TypeID`),
  ADD KEY `roomtype_fk1` (`ServiceID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `StatusID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `TypeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_fk1` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `booking_fk2` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_fk1` FOREIGN KEY (`TypeID`) REFERENCES `roomtype` (`TypeID`),
  ADD CONSTRAINT `room_fk2` FOREIGN KEY (`StatusID`) REFERENCES `roomstatus` (`StatusID`);

--
-- Constraints for table `roomsbooked`
--
ALTER TABLE `roomsbooked`
  ADD CONSTRAINT `roomsbooked_fk1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`),
  ADD CONSTRAINT `roomsbooked_fk2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `roomsbooked_fk3` FOREIGN KEY (`TypeID`) REFERENCES `roomtype` (`TypeID`);

--
-- Constraints for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `roomtype_fk1` FOREIGN KEY (`ServiceID`) REFERENCES `services` (`ServiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
