-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 06:36 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigboiteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `a_id` int(10) NOT NULL,
  `a_Username` varchar(255) DEFAULT NULL,
  `a_Password` varchar(255) DEFAULT NULL,
  `a_Email` varchar(255) DEFAULT NULL,
  `a_FirstName` varchar(255) DEFAULT NULL,
  `a_Permission` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`a_id`, `a_Username`, `a_Password`, `a_Email`, `a_FirstName`, `a_Permission`) VALUES
(1, 'bigboiteam', '$2y$10$EGorxHdAamyc0SzlmlAjbu9bwfuBikpDpNkQLW368xFmsfeix/7x6', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `actionconfigurations`
--

CREATE TABLE `actionconfigurations` (
  `ap_id` int(10) NOT NULL,
  `ac_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actionconfigurations`
--

INSERT INTO `actionconfigurations` (`ap_id`, `ac_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 1),
(1, 2),
(1, 3),
(1, 29),
(1, 30),
(1, 31),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(4, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 39),
(4, 40),
(4, 41),
(4, 42),
(4, 43);

-- --------------------------------------------------------

--
-- Table structure for table `actionperipherals`
--

CREATE TABLE `actionperipherals` (
  `ap_id` int(11) NOT NULL,
  `ac_Name` varchar(100) NOT NULL,
  `ap_Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actionperipherals`
--

INSERT INTO `actionperipherals` (`ap_id`, `ac_Name`, `ap_Description`) VALUES
(1, 'rgbled', 'RGB LED'),
(2, 'led1', 'LED 1'),
(3, 'led2', 'LED 2'),
(4, 'Buzzer', 'Buzzer'),
(5, 'NaN', 'NaN');

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `ac_id` int(11) NOT NULL,
  `ac_Name` varchar(100) NOT NULL,
  `ac_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`ac_id`, `ac_Name`, `ac_Description`) VALUES
(1, 'red-100-1', 'Red light turns on'),
(2, 'green-100-1', 'Green light turns on'),
(3, 'blue-100-1', 'Blue light turns on'),
(4, 'red-0', 'RED light turns off'),
(5, 'green-0', 'Green light turns off'),
(6, 'blue-0', 'Blue light turns off'),
(7, 'bright-0', 'All LED(s) off'),
(8, 'redTime-05', 'Red light turns on for 5 seconds (then turns off)'),
(9, 'greenTime-05', 'Green light turns on for 5 seconds  (then turns off)'),
(10, 'blueTime-05', 'Blue light turns on for 5 seconds  (then turns off)'),
(11, 'onPerC-000', 'LED off'),
(12, 'onPerC-010', 'LED on at 10%'),
(13, 'onPerC-020', 'LED on at 20%'),
(14, 'onPerC-030', 'LED on at 30%'),
(15, 'onPerC-040', 'LED on at 40%'),
(16, 'onPerC-050', 'LED on at 50%'),
(17, 'onPerC-060', 'LED on at 60%'),
(18, 'onPerC-070', 'LED on at 70%'),
(19, 'onPerC-080', 'LED on at 80%'),
(20, 'onPerC-090', 'LED on at 90%'),
(21, 'onPerC-100', 'LED on at 100%'),
(22, 'time-01', 'PWM LED on for 1 seconds'),
(24, 'time-05', 'PWM LED on for 5 seconds'),
(25, 'time-10', 'PWM LED on for 10 seconds'),
(26, 'breath-10', 'Breathing light on for 10 seconds'),
(27, 'breath-20', 'Breathing light on for 20 seconds'),
(28, 'breath-30', 'Breathing light on for 30 seconds'),
(29, 'red-100-0', 'Light turns on Red at 100 % brightness (others stay on)'),
(30, 'green-100-0', 'Light turns on Green at 100 %  brightness (others stay on)'),
(31, 'blue-100-0', 'Light turns on Blue at 100 %  brightness (others stay on)'),
(32, 'onTime-1', 'Buzzer on for 1 second'),
(33, 'onTime-2', 'Buzzer on for 2 second'),
(34, 'onTime-3', 'Buzzer on for 3 second'),
(35, 'onTime-4', 'Buzzer on for 4 second'),
(36, 'onTime-5', 'Buzzer on for 5 second'),
(37, 'onTime-10', 'Buzzer on for 10 second'),
(38, 'onOff-01-05', 'Buzzer on for 5 seconds at 1 second period'),
(39, 'onOff-02-05', 'Buzzer on for 5 seconds at 2 second period'),
(40, 'onOff-04-05', 'Buzzer on for 5 seconds at 4 second period'),
(41, 'onOff-01-10', 'Buzzer on for 10 seconds at 1 second period'),
(42, 'onOff-02-10', 'Buzzer on for 10 seconds at 2 second period'),
(43, 'onOff-04-10', 'Buzzer on for 10 seconds at 4 second period');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `cat_id` int(10) NOT NULL,
  `cat_DeviceName` varchar(100) NOT NULL,
  `cat_MCUType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`cat_id`, `cat_DeviceName`, `cat_MCUType`) VALUES
(2, 'Bathroom RGB Light', 'MSP430G2553'),
(1, 'Doorbell', 'MSP430FR4133, MSP430G2553'),
(4, 'Smart Button', 'MSP430FR4133, MSP430G2553'),
(3, 'Smart LED', 'MSP430FR4133, MSP430G2553'),
(6, 'Thermometer', 'MSPG2553'),
(5, 'Wall Mounted Dial with Dimmable LED', 'MSP430FR4133, MSP430G2553');

-- --------------------------------------------------------

--
-- Table structure for table `catalogueperipherals`
--

CREATE TABLE `catalogueperipherals` (
  `cat_DeviceName` varchar(100) NOT NULL,
  `tp_id` int(10) NOT NULL,
  `ap_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogueperipherals`
--

INSERT INTO `catalogueperipherals` (`cat_DeviceName`, `tp_id`, `ap_id`) VALUES
('Thermometer', 4, 2),
('Thermometer', 4, 1),
('Thermometer', 4, 4),
('Doorbell', 1, 4),
('Doorbell', 1, 2),
('Bathroom RGB Light', 1, 1),
('Wall Mounted Dial with Dimmable LED', 3, 2),
('Smart Button', 1, 5),
('Smart LED', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `perm_id` int(10) NOT NULL,
  `perm_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `r_id` int(10) NOT NULL,
  `r_Name` varchar(100) NOT NULL,
  `r_TriggerDevice` varchar(100) NOT NULL,
  `r_TriggerMACAddress` varchar(100) NOT NULL,
  `r_TriggerPeripheral` varchar(100) NOT NULL,
  `r_Trigger` varchar(100) NOT NULL,
  `r_TargetDevice` varchar(100) NOT NULL,
  `r_TargetMACAddress` varchar(100) NOT NULL,
  `r_ActionPeripheral` varchar(100) NOT NULL,
  `r_Action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`r_id`, `r_Name`, `r_TriggerDevice`, `r_TriggerMACAddress`, `r_TriggerPeripheral`, `r_Trigger`, `r_TargetDevice`, `r_TargetMACAddress`, `r_ActionPeripheral`, `r_Action`) VALUES
(65, 'potentiometer testing', 'Simas Potentiometer test', 'BC:DD:C2:7A:FE:14', 'Potentiometer', 'percentage-S-50', 'Simas Potentiometer test', 'BC:DD:C2:7A:FE:14', 'led1', 'breath-10'),
(107, 'ConnorLed', 'ConnorsLED', 'BC:DD:C2:B2:9B:E2', 'Potentiometer', 'percentage-G-51', 'ConnorsLED', 'BC:DD:C2:B2:9B:E2', 'led1', 'onPerC-100'),
(108, 'OK', 'ConnorsLED', 'BC:DD:C2:B2:9B:E2', 'Potentiometer', 'percentage-S-50', 'ConnorsLED', 'BC:DD:C2:B2:9B:E2', 'led1', 'onPerC-000'),
(113, 'recipe my dudes', 'Device', '60:01:94:53:F6:26', 'Button1', 'press-1', 'Device', '60:01:94:53:F6:26', 'led1', 'time-05');

-- --------------------------------------------------------

--
-- Table structure for table `registereddevices`
--

CREATE TABLE `registereddevices` (
  `d_id` int(10) NOT NULL,
  `d_Name` varchar(100) NOT NULL,
  `d_DeviceType` varchar(100) DEFAULT NULL,
  `d_MCUType` varchar(100) DEFAULT NULL,
  `d_MacAddress` varchar(100) DEFAULT NULL,
  `d_ConnectionStatus` tinyint(1) DEFAULT NULL,
  `d_Room` varchar(255) DEFAULT NULL,
  `d_Building` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registereddevices`
--

INSERT INTO `registereddevices` (`d_id`, `d_Name`, `d_DeviceType`, `d_MCUType`, `d_MacAddress`, `d_ConnectionStatus`, `d_Room`, `d_Building`) VALUES
(69, 'ConnorsLED', 'Wall Mounted Dial with Dimmable LED', 'MSP430FR4133', 'BC:DD:C2:B2:9B:E2', 0, 'default', 'default'),
(73, 'Device', 'Doorbell', 'MSP430G2553', '60:01:94:53:F6:26', 1, 'dudes', 'my'),
(38, 'Simas Potentiometer test', 'Wall Mounted Dial with Dimmable LED', 'MSP430FR4133', 'BC:DD:C2:7A:FE:14', 0, 'default', 'default'),
(71, 'Testing Device', 'Wall Mounted Dial with Dimmable LED', 'MSP430G2553', '48:3F:DA:00:2A:ED', 0, 'default', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `triggerconfigurations`
--

CREATE TABLE `triggerconfigurations` (
  `tp_id` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `triggerconfigurations`
--

INSERT INTO `triggerconfigurations` (`tp_id`, `tr_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `triggerperipherals`
--

CREATE TABLE `triggerperipherals` (
  `tp_id` int(11) NOT NULL,
  `tp_Name` varchar(100) NOT NULL,
  `tp_Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `triggerperipherals`
--

INSERT INTO `triggerperipherals` (`tp_id`, `tp_Name`, `tp_Description`) VALUES
(1, 'Button1', 'Button 1'),
(2, 'Button2', 'Button 2'),
(3, 'Potentiometer', 'Potentiometer'),
(4, 'Thermometer', 'Thermometer'),
(5, 'NaN', 'NaN');

-- --------------------------------------------------------

--
-- Table structure for table `triggers`
--

CREATE TABLE `triggers` (
  `tr_id` int(11) NOT NULL,
  `tr_Name` varchar(100) NOT NULL,
  `tr_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `triggers`
--

INSERT INTO `triggers` (`tr_id`, `tr_Name`, `tr_Description`) VALUES
(1, 'press-1', 'User presses the button once'),
(2, 'press-2', 'User presses the button twice'),
(3, 'pressTime-2', 'User presses the button for 2 seconds'),
(4, 'pressTime-4', 'User presses the button for 4 seconds'),
(5, 'percentage-S-50', 'Potentiometer smaller than 50%'),
(6, 'percentage-G-51', 'Potentiometer greater than 51%'),
(7, 'percentage-B-0-9', 'Potentiometer between 0% and 9%'),
(8, 'percentage-B-10-19', 'Potentiometer between 10% and 19%'),
(9, 'percentage-B-20-29', 'Potentiometer between 20% and 29%'),
(10, 'percentage-B-30-39', 'Potentiometer between 30% and 39%'),
(11, 'percentage-B-40-49', 'Potentiometer between 40% and 49%'),
(12, 'percentage-B-50-59', 'Potentiometer between 50% and 59%'),
(13, 'percentage-B-60-69', 'Potentiometer between 60% and 69%'),
(14, 'percentage-B-70-89', 'Potentiometer between 70% and 89%'),
(15, 'percentage-B-80-89', 'Potentiometer between 80% and 89%'),
(16, 'percentage-B-90-100', 'Potentiometer between 90% and 100%'),
(17, 'temperature-S-15', 'Temperature beneath 15 °C'),
(18, 'temperature-S-0', 'Temperature beneath 0 °C'),
(19, 'temperature-G-35', 'Temperature above 35 °C'),
(20, 'temperature-B-16-34', 'Temperature between 16 °C and 34 °C');

-- --------------------------------------------------------

--
-- Table structure for table `unregistereddevice`
--

CREATE TABLE `unregistereddevice` (
  `un_id` int(10) NOT NULL,
  `un_DeviceType` varchar(100) NOT NULL,
  `un_MCUType` varchar(100) NOT NULL,
  `un_MACAddress` varchar(100) NOT NULL,
  `un_ConnectionStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unregistereddevice`
--

INSERT INTO `unregistereddevice` (`un_id`, `un_DeviceType`, `un_MCUType`, `un_MACAddress`, `un_ConnectionStatus`) VALUES
(75, 'Bathroom RGB Light', '31222', '345345345', 1),
(78, 'Doorbell', '41233', '12312312312312', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `actionconfigurations`
--
ALTER TABLE `actionconfigurations`
  ADD KEY `ap_id` (`ap_id`),
  ADD KEY `ac_id` (`ac_id`);

--
-- Indexes for table `actionperipherals`
--
ALTER TABLE `actionperipherals`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`cat_DeviceName`);

--
-- Indexes for table `catalogueperipherals`
--
ALTER TABLE `catalogueperipherals`
  ADD KEY `tp_id` (`tp_id`),
  ADD KEY `ap_id` (`ap_id`),
  ADD KEY `cat_DeviceName` (`cat_DeviceName`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_TriggerDevice` (`r_TriggerDevice`),
  ADD KEY `r_TargetDevice` (`r_TargetDevice`);

--
-- Indexes for table `registereddevices`
--
ALTER TABLE `registereddevices`
  ADD PRIMARY KEY (`d_Name`),
  ADD UNIQUE KEY `d_id` (`d_id`),
  ADD KEY `d_DeviceType` (`d_DeviceType`);

--
-- Indexes for table `triggerconfigurations`
--
ALTER TABLE `triggerconfigurations`
  ADD KEY `tr_id` (`tr_id`),
  ADD KEY `tp_id` (`tp_id`);

--
-- Indexes for table `triggerperipherals`
--
ALTER TABLE `triggerperipherals`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `triggers`
--
ALTER TABLE `triggers`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `unregistereddevice`
--
ALTER TABLE `unregistereddevice`
  ADD PRIMARY KEY (`un_id`),
  ADD KEY `un_DeviceType` (`un_DeviceType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `actionperipherals`
--
ALTER TABLE `actionperipherals`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `perm_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `registereddevices`
--
ALTER TABLE `registereddevices`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `triggerperipherals`
--
ALTER TABLE `triggerperipherals`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `unregistereddevice`
--
ALTER TABLE `unregistereddevice`
  MODIFY `un_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actionconfigurations`
--
ALTER TABLE `actionconfigurations`
  ADD CONSTRAINT `actionconfigurations_ibfk_1` FOREIGN KEY (`ap_id`) REFERENCES `actionperipherals` (`ap_id`),
  ADD CONSTRAINT `actionconfigurations_ibfk_2` FOREIGN KEY (`ac_id`) REFERENCES `actions` (`ac_id`);

--
-- Constraints for table `catalogueperipherals`
--
ALTER TABLE `catalogueperipherals`
  ADD CONSTRAINT `catalogueperipherals_ibfk_2` FOREIGN KEY (`tp_id`) REFERENCES `triggerperipherals` (`tp_id`),
  ADD CONSTRAINT `catalogueperipherals_ibfk_3` FOREIGN KEY (`ap_id`) REFERENCES `actionperipherals` (`ap_id`),
  ADD CONSTRAINT `catalogueperipherals_ibfk_4` FOREIGN KEY (`cat_DeviceName`) REFERENCES `catalogue` (`cat_DeviceName`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`r_TriggerDevice`) REFERENCES `registereddevices` (`d_Name`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`r_TargetDevice`) REFERENCES `registereddevices` (`d_Name`);

--
-- Constraints for table `registereddevices`
--
ALTER TABLE `registereddevices`
  ADD CONSTRAINT `registereddevices_ibfk_1` FOREIGN KEY (`d_DeviceType`) REFERENCES `catalogue` (`cat_DeviceName`);

--
-- Constraints for table `triggerconfigurations`
--
ALTER TABLE `triggerconfigurations`
  ADD CONSTRAINT `triggerconfigurations_ibfk_1` FOREIGN KEY (`tr_id`) REFERENCES `triggers` (`tr_id`),
  ADD CONSTRAINT `triggerconfigurations_ibfk_2` FOREIGN KEY (`tp_id`) REFERENCES `triggerperipherals` (`tp_id`);

--
-- Constraints for table `unregistereddevice`
--
ALTER TABLE `unregistereddevice`
  ADD CONSTRAINT `unregistereddevice_ibfk_1` FOREIGN KEY (`un_DeviceType`) REFERENCES `catalogue` (`cat_DeviceName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
