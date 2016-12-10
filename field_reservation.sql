-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2016 at 12:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `field_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_email` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_tlp` varchar(255) NOT NULL,
  `c_status` varchar(255) NOT NULL,
  `c_code_verif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_email`, `c_name`, `c_password`, `c_tlp`, `c_status`, `c_code_verif`) VALUES
('aa@gmail.com', 'ada', '12345', '081234567', '', ''),
('ada@fgds.com', 'asdasdas', '1', '12313213', '', ''),
('yeyrama@gmail.com', 'ase', '123', '01010', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `f_id` int(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_location` enum('UNTAG','MANGGA_DUA','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`f_id`, `f_name`, `f_location`) VALUES
(1, 'Lapangan A', 'MANGGA_DUA'),
(2, 'Lapangan B', 'MANGGA_DUA'),
(3, 'Lapangan C', 'MANGGA_DUA'),
(4, 'Lapangan D', 'MANGGA_DUA'),
(5, 'Lapangan E', 'MANGGA_DUA'),
(6, 'Lapangan A', 'UNTAG');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `i_id` int(11) NOT NULL,
  `i_status` varchar(255) NOT NULL,
  `i_current_payment` int(11) NOT NULL,
  `i_total_payment` int(11) DEFAULT NULL,
  `i_voucher` varchar(255) NOT NULL,
  `i_nama_pemesan` varchar(255) NOT NULL,
  `i_email_pemesan` varchar(255) NOT NULL,
  `i_telp_pemesan` varchar(255) NOT NULL,
  `i_bank_rekening` varchar(255) NOT NULL,
  `i_no_rekening` varchar(255) NOT NULL,
  `i_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`i_id`, `i_status`, `i_current_payment`, `i_total_payment`, `i_voucher`, `i_nama_pemesan`, `i_email_pemesan`, `i_telp_pemesan`, `i_bank_rekening`, `i_no_rekening`, `i_date`) VALUES
(13, 'booked', 12311, 50000, '', 'yeyrama@gmail.com', 'yeyrama@gmail.com', '213123', 'asdsa', 'rama', '2016-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE `lease` (
  `l_id` int(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `l_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`l_id`, `l_name`, `l_price`) VALUES
(1, 'bola', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(10) NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_description` varchar(255) NOT NULL,
  `n_img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `p_start_booking` time NOT NULL,
  `p_end_booking` time NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`p_start_booking`, `p_end_booking`, `p_price`, `p_id`) VALUES
('17:00:00', '23:59:59', 30000, 1),
('00:00:00', '16:59:59', 50000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) NOT NULL,
  `t_type` varchar(255) NOT NULL,
  `t_voucher` varchar(255) NOT NULL,
  `t_status` varchar(255) NOT NULL,
  `t_current_payment` varchar(255) NOT NULL,
  `t_date_payment` datetime NOT NULL,
  `t_invoice` int(10) NOT NULL,
  `t_field` int(11) NOT NULL,
  `t_price` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `t_start_booking` time NOT NULL,
  `t_end_booking` time NOT NULL,
  `t_time_length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `t_type`, `t_voucher`, `t_status`, `t_current_payment`, `t_date_payment`, `t_invoice`, `t_field`, `t_price`, `t_date`, `t_start_booking`, `t_end_booking`, `t_time_length`) VALUES
(20, '', '', 'Belum bayar', '', '0000-00-00 00:00:00', 13, 1, 50000, '2016-12-10', '01:00:00', '02:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_email` varchar(255) NOT NULL,
  `u_role` enum('adm','usr','sadm') NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_email`, `u_role`, `u_name`, `u_password`) VALUES
('rama_adm', 'adm', 'rama', 'asd'),
('rama_sadm', 'sadm', 'rama', 'asd'),
('rama_usr', 'usr', 'rama', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `v_id` int(11) NOT NULL,
  `v_date` date NOT NULL,
  `v_amount` int(11) NOT NULL,
  `v_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_email`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_invoice` (`t_invoice`),
  ADD KEY `t_date` (`t_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `f_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lease`
--
ALTER TABLE `lease`
  MODIFY `l_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
