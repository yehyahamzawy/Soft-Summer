-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 04:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL,
  `members` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `paymethod` varchar(20) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `complaint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ID`, `userID`, `complaint`) VALUES
(6, 2, 'no water!');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `checkIn` tinyint(4) NOT NULL DEFAULT '0',
  `checkOut` tinyint(4) NOT NULL DEFAULT '0',
  `isApproved` tinyint(4) NOT NULL DEFAULT '0',
  `appointment` text NOT NULL,
  `staying` int(11) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ID`, `userID`, `roomID`, `checkIn`, `checkOut`, `isApproved`, `appointment`, `staying`, `isDeleted`) VALUES
(1, 2, 5, 1, 1, 0, '10/10/2019', 5, 0),
(5, 2, 2, 0, 0, 0, '2019-08-06', 4, 1),
(6, 2, 3, 0, 0, 0, '2019-08-07', 4, 1),
(7, 2, 3, 1, 1, 0, '2019-08-14', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `commentRating` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `comment`, `rating`, `commentRating`, `userID`, `roomID`, `isDeleted`) VALUES
(1, 'alot of weird stains everywhere, this place is not where would you want to spend your vacation!', 5, -2, 2, 1, 0),
(2, 'after visiting the hotel in 2 years, they have truly improved! and the food got better and its amazing!', 8, 1, 2, 1, 0),
(5, 'nice place, rlly cool', 7, 0, 2, 5, 0),
(7, 'i love this place! i will go there frequently!', 8, 0, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `description` text NOT NULL,
  `isAvailable` tinyint(4) NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `description`, `isAvailable`, `title`, `img`, `isDeleted`) VALUES
(1, 'on our 22th floor, room 225 you will find one of the finest rooms in town! a huge space enough for a family members of 4, or would a new couple would enjoy to spend their honey moon', 0, 'Village Street Hotel, 22th floor, aprt 225, 2 king beds', 'https://t-ec.bstatic.com/images/hotel/max1024x768/173/173348341.jpg', 0),
(2, 'a simple hotel where you can just take a break and relax. perfect for one person or a couple to have some space', 0, 'Simply Hotel, 3rd floor, room 32, 1 king bed', 'https://www.hotel-bcn40barcelona.com/wp-content/blogs.dir/622/files/sliderhome/xhotel_acta_bcn40_doble_sup_02.jpg.pagespeed.ic.BYst6ggCfy.jpg', 0),
(3, 'A fancy hotel where you can have a luxurious time with your significant other and maybe your kids. ', 0, 'Grand Hotel, 5th floor, room 58', 'https://dynaimage.cdn.cnn.com/cnn/q_auto,w_412,c_fill,g_auto,h_232,ar_16:9/http%3A%2F%2Fcdn.cnn.com%2Fcnnnext%2Fdam%2Fassets%2F190108172203-11-hotel-de-paris-monaco.jpg', 0),
(4, 'this hotel is perfect for retro parents and creative designers who work with colorful legos. if you have kids with the same interest, this is the PERFECT vacation!!', 0, 'Pixie Hotel, 4th floor, room 47', 'https://endpoint915698.azureedge.net/globalassets/uvid-49bb07/hotel-1400x800.jpg?w=1422&h=800&mode=crop&scale=both&quality=80&format=jpg', 0),
(5, 'if you\'re looking for a place where you can relax and have a good time in the pool or a spa, we got you covered! come one or come two, relaxation guaranteed! ', 0, 'spa hotel, 6th floor, room 63, 1 king bed, pool, spa', 'https://www.rwsentosa.com/-/media/project/non-gaming/rwsentosa/hotels/hotel-michael/hotel-michael-pool.jpg', 0),
(6, 'visit one of the finest and most luxurious hotels in the country! this hotel is perfect for fancy honey moons and romantic dinners.', 0, 'luxury fantasy hotel, 5th floor, room 55', 'https://www.vcnewsnetwork.com/wp-content/uploads/2019/02/80660-thumb.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `userTypeID` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fName`, `lName`, `userTypeID`, `email`, `password`, `isDeleted`) VALUES
(1, 'admin', 'admin', 1, 'admin@admin', '123', 0),
(2, 'Best', 'Reviewer', 2, 'first@reviewer.com', '123', 0),
(3, 'yaya', 'hamzawy', 2, 'yaya@yaya.com', '123', 0),
(4, 'rece', 'rece', 3, 'rece@rece.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `ID` int(11) NOT NULL,
  `userType` varchar(25) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID`, `userType`, `isDeleted`) VALUES
(1, 'admin', 0),
(2, 'guest', 0),
(3, 'receptionist', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userTypeID` (`userTypeID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation` (`ID`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userTypeID`) REFERENCES `usertype` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
