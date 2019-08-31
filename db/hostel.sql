-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2019 at 07:41 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `c_id` int(11) NOT NULL,
  `complain` varchar(255) DEFAULT NULL,
  `std_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`c_id`, `complain`, `std_id`, `date`, `status`) VALUES
(2, '<p><strong>New Complain</strong></p>\r\n', 1000171, '2019-07-24 23:44:45', 'Done'),
(3, '<p>fgfdgdgdfg</p>\r\n', 1000171, '2019-07-25 10:53:58', 'Pending'),
(4, 'new complain', 1000171, '2019-07-25 10:57:59', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `sid_id` int(11) NOT NULL,
  `g_name` varchar(255) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `g_address` varchar(255) DEFAULT NULL,
  `g_email` varchar(255) DEFAULT NULL,
  `g_phone` varchar(20) DEFAULT NULL,
  `g_nid` int(20) DEFAULT NULL,
  `g_password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`sid_id`, `g_name`, `relation`, `g_address`, `g_email`, `g_phone`, `g_nid`, `g_password`) VALUES
(1, 'Payer Ahamed', 'Father', 'comilla', 'foysalahammed055@gmail.com', '5103247049', 2147483647, 'Tkt2CTz3'),
(2, 'DW Assignment', 'Self', 'Panthapat', 'foysal.int@gmail.com', '1852595966', 4567, 'sZYS9KBk'),
(3, 'gfhgfh', 'fghfgh', 'fghfghfgh', 'foysal.int@gmail.com', '5103247049', 2147483647, 'TxndVagN');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `l_id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `application` varchar(2000) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`l_id`, `applicant_id`, `date`, `application`, `status`) VALUES
(1, 1000171, '2019-07-23 11:35:30', '<p>new application</p>\r\n', 'Pending'),
(2, 1000171, '2019-07-23 11:38:25', '<p>tyuygjgjgh</p>\r\n', 'Pending'),
(3, 1000171, '2019-07-23 11:39:11', '<p>ghjjghjghvdfvgd</p>\r\n', 'Pending'),
(4, 1000171, '2019-07-23 11:41:23', '<p>jkkhjkjhkhjk</p>\r\n', 'Pending'),
(5, 1000171, '2019-07-23 11:45:12', '<p>new configaration</p>\r\n', 'Pending'),
(6, 1000171, '2019-07-23 11:58:26', '<p>Subject: Annual leave application</p>\r\n\r\n<p>Dear Mr./Mrs. {Recipient&rsquo;s Name},</p>\r\n\r\n<p>I am writing this letter to let you know that I am in need of a long-term leave. Thus, I would like to avail my full annual leave allotment as I have my complete yearly leave allowance.</p>\r\n\r\n<p>I request you to consider my leave application of thirty days as I am planning for an international vacation with my family. I would like to avail the leaves from {start date} to {end date}.</p>\r\n\r\n<p>I have delegated my current project to {person&#39;s name}. He/she very well understands about my project and is capable of handling the task without any difficulties. In fact, it is only the final part that is left to be carried out by him/her.</p>\r\n\r\n<p>During the days of my absence from office, I can be reached at {email address/contact number}.</p>\r\n\r\n<p>I will return to the office on {date}. In case I want to resume the work sooner or later than the stated date, I will let you know well in advance.</p>\r\n\r\n<p>Yours Sincerely,<br />\r\n{Your Name}</p>\r\n', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `heading`, `body`) VALUES
(2, 'Admission', 'B.Sc Honors in Computing under University of Greenwich, UK. Admission Open for June 2019 *');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `payable_bill` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `due` int(5) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `received_by` varchar(100) DEFAULT NULL,
  `trxid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `s_id`, `date`, `payable_bill`, `amount`, `due`, `month`, `year`, `received_by`, `trxid`) VALUES
(1, 1000171, '07/23/2019', 3000, 3000.00, 0, 'January', '2019', 'Office', NULL),
(2, 1000171, '07/23/2019', 3000, 3000.00, 0, 'February', '2019', 'Office', NULL),
(3, 1000171, '07/25/2019', 4000, 4000.00, 0, 'March', '2019', 'Office', '4757567');

-- --------------------------------------------------------

--
-- Table structure for table `payment_request`
--

CREATE TABLE `payment_request` (
  `op_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `std_id` int(11) DEFAULT NULL,
  `trxid` int(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_request`
--

INSERT INTO `payment_request` (`op_id`, `payment_id`, `amount`, `std_id`, `trxid`, `date`, `status`) VALUES
(1, 2, 1000, 1000171, 67567567, '2019-07-25 21:04:26', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(11) NOT NULL,
  `room_no` int(10) DEFAULT NULL,
  `room_capacity` int(5) DEFAULT NULL,
  `room_video` varchar(255) DEFAULT NULL,
  `seat_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `room_no`, `room_capacity`, `room_video`, `seat_price`) VALUES
(5, 204, 1, 'videos/204.mp4', '5000.00'),
(7, 205, 3, 'videos/205.mp4', '4000.00'),
(8, 201, 4, 'videos/201.mp4', '4000.00'),
(9, 202, 3, 'videos/202.mp4', '5000.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fullname`, `email`, `password`, `type`, `status`) VALUES
(2, 'Hostel Super', 'hs@diuhome.com', '123456', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `std_category`
--

CREATE TABLE `std_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(5) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `std_category`
--

INSERT INTO `std_category` (`pc_id`, `pc_name`, `amount`) VALUES
(1, 'A', 2500),
(2, 'B', 3750),
(3, 'C', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `std_seat`
--

CREATE TABLE `std_seat` (
  `sb_id` int(11) NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `std_seat`
--

INSERT INTO `std_seat` (`sb_id`, `std_id`, `room`) VALUES
(2, 1000175, 204),
(6, 1000171, 205);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `v_id` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `nid` int(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `category` varchar(5) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `v_id`, `fullname`, `photo`, `father_name`, `mother_name`, `nid`, `email`, `phone`, `permanent_address`, `additional_info`, `password`, `category`, `date`) VALUES
(1, '1000171', 'Foysal Ahammad', 'photos/1000171.jpg', 'Payer Ahamed', 'Syeda Selina Begum', 2147483647, '1000171@daffodil.ac', '01852595966', 'Comilla', 'n/a', '123456', '', '07/23/2019'),
(2, '1000175', 'DW Assignment', 'photos/1000175.png', 'Mr. Father', 'Mrs. Mother', 2147483647, 'foysal.int@gmail.com', '1852595966', 'Panthapat', '', 'CpH9IQAW', '', '07/23/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`c_id`) USING BTREE;

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`sid_id`) USING BTREE;

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`l_id`) USING BTREE;

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`) USING BTREE;

--
-- Indexes for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`) USING BTREE;

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `std_category`
--
ALTER TABLE `std_category`
  ADD PRIMARY KEY (`pc_id`) USING BTREE;

--
-- Indexes for table `std_seat`
--
ALTER TABLE `std_seat`
  ADD PRIMARY KEY (`sb_id`) USING BTREE;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_request`
--
ALTER TABLE `payment_request`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_category`
--
ALTER TABLE `std_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `std_seat`
--
ALTER TABLE `std_seat`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
