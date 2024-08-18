-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 01:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcr_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bk_id` varchar(20) NOT NULL,
  `bk_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bk_userID` varchar(30) NOT NULL,
  `bk_roomID` varchar(10) NOT NULL,
  `bk_date` date NOT NULL,
  `bk_timeStart` time NOT NULL,
  `bk_timeEnd` time NOT NULL,
  `bk_title` varchar(50) NOT NULL,
  `bk_attendee` varchar(3) NOT NULL,
  `bk_note` varchar(255) NOT NULL,
  `bk_fac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD KEY `bk_userID` (`bk_userID`),
  ADD KEY `bk_roomID` (`bk_roomID`);

ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`bk_userID`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`bk_roomID`) REFERENCES `room` (`room_id`);
-- --------------------------------------------------------

--
-- Table structure for table `facilitate`
--

CREATE TABLE `facilitate` (
  `fac_id` int(11) NOT NULL,
  `fac_roomID` varchar(10) NOT NULL,
  `fac_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `facilitate`
  ADD PRIMARY KEY (`fac_id`),
  ADD KEY `fac_roomID` (`fac_roomID`);

ALTER TABLE `facilitate`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `facilitate`
  ADD CONSTRAINT `facilitate_ibfk_1` FOREIGN KEY (`fac_roomID`) REFERENCES `room` (`room_id`);
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(10) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_seats` varchar(5) NOT NULL,
  `room_areaSize` float NOT NULL,
  `room_OpeningTime` varchar(30) NOT NULL,
  `room_location` varchar(50) NOT NULL,
  `room_detail` varchar(100) NOT NULL,
  `room_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` varchar(30) NOT NULL,
  `u_titleName` varchar(10) NOT NULL,
  `u_Fname` varchar(50) NOT NULL,
  `u_Lname` varchar(50) NOT NULL,
  `u_dep` varchar(50) NOT NULL,
  `u_tel` varchar(10) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_line` varchar(50) NOT NULL,
  `u_password` varchar(16) NOT NULL,
  `u_role` varchar(10) NOT NULL,
  `u_status` varchar(20) NOT NULL,
  `u_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);
