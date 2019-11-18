-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 02:27 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `client_id` int(10) NOT NULL,
  `client_name` varchar(40) NOT NULL,
  `sales_representative` varchar(40) NOT NULL,
  `company` varchar(40) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `company_address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`client_id`, `client_name`, `sales_representative`, `company`, `contact_no`, `email_address`, `company_address`, `city`, `postal_code`, `status`) VALUES
(1, 'Miks', 'Miks', 'Miks', 'Miks', 'Miks', 'Miks', 'Miks', 'Miks', 1),
(2, 'Miks', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(3, 'Miks', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(4, 'Miks', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(5, 'Miks', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(6, 'Miks', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(9, 'Jovss', 'Daves', 'Converge', '09090909900', 'asdad', 'asd', 'asd', 'asd', 0),
(11, 'Mikko', 'asd', 'sa', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(12, 'Mikko', 'asd', 'sa', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(13, 'Kurt', 'K', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1),
(14, 'Kurt', 'K', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(15, 'mn', 'mn', 'bmn', 'bm', 'nb', 'mnbm', 'nb', 'mnb', 0),
(16, 'mn', 'mn', 'bmn', 'bm', 'nb', 'mnbm', 'nb', 'mnb', 0),
(19, 'Mark', 'mark', 'don bosco', '090909090', 'ghfhgf', 'retrq', 'retr', '3424', 0),
(20, 'AAAA', 'asdasd', 'asdasd', '123133123123', 'aasda@assda', 'qweqda', 'lhkjhkj', 'jkhkjh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_production_report`
--

CREATE TABLE `daily_production_report` (
  `production_report_no` int(10) NOT NULL,
  `producing_unit` varchar(225) NOT NULL,
  `operator_id` int(10) NOT NULL,
  `operator_name` varchar(225) NOT NULL,
  `report_date` datetime(6) NOT NULL,
  `job_title` varchar(225) NOT NULL,
  `quantity` int(10) NOT NULL,
  `type_of_job` varchar(225) NOT NULL,
  `no_of_signatures` varchar(225) NOT NULL,
  `types_of_activity` datetime(6) NOT NULL,
  `time_started` datetime(6) NOT NULL,
  `time_finished` datetime(6) NOT NULL,
  `spoilage` int(10) NOT NULL,
  `good_copies` int(10) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(11) NOT NULL,
  `start_event` date NOT NULL,
  `end_event` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(1, 'asdasd', '2019-11-12', '2019-11-12'),
(2, 'asdasd', '2019-11-12', '2019-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `genservices_account`
--

CREATE TABLE `genservices_account` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genservices_account`
--

INSERT INTO `genservices_account` (`id`, `uname`, `pass`) VALUES
(1, 'genserv', 1234),
(2, 'genserv', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `material_id` int(10) NOT NULL,
  `date` datetime(6) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(25) NOT NULL,
  `supplier_name` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `added` int(225) NOT NULL,
  `released` int(225) NOT NULL,
  `add_date` datetime(6) NOT NULL,
  `released_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE `job_order` (
  `job_order_control_no` int(10) NOT NULL,
  `sales_number` int(10) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `item_desc_and_title` varchar(225) NOT NULL,
  `proj_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `costing_run` varchar(100) NOT NULL,
  `finishing_required` varchar(225) NOT NULL,
  `packaging_required` varchar(225) NOT NULL,
  `date_to_warehouse` date NOT NULL,
  `requested_delivery` date NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `pages` varchar(10) NOT NULL,
  `paper` varchar(10) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jo_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`job_order_control_no`, `sales_number`, `client_name`, `item_desc_and_title`, `proj_name`, `date_created`, `costing_run`, `finishing_required`, `packaging_required`, `date_to_warehouse`, `requested_delivery`, `quantity`, `size`, `pages`, `paper`, `remarks`, `status`, `jo_status`) VALUES
(3, 1, 'lkj', 'lkj', 'lkj', '2019-10-09 01:23:41', 'lkjlkj', 'Debossing', 'jh', '2019-10-10', '2019-10-25', '123', '123', '123123', 'jhgjhg', 'asdkl', 'Disabled', 1),
(4, 12, 'iuy', 'yi', 'iu', '2019-10-18 10:34:05', 'uy', 'Vertical Ringbind', 'yiuy', '2019-10-18', '2019-10-24', '76', 'qw', '7', 'iuy', 'qwe', 'Pending', 1),
(5, 0, 'Miks', 'kljh', 'asd', '2019-10-25 15:41:10', 'kjh', 'Saddle Stitch', 'Corrugated Boxes', '2019-10-23', '2019-10-16', '123', '12', '12', 'qwe', 'asdad', 'Pending', 1),
(6, 0, 'AAAA', 'assd', 'asd', '2019-11-02 17:19:42', 'lk', 'Perfect Bind', 'Corrugated Boxes', '2019-11-01', '2019-11-22', '123', '123', '123', '12', 'asdas', 'Pending', 1),
(7, 123, 'Miks', 'qwe', 'qwe', '2019-11-02 17:22:16', 'lk', 'Perfect Bind', 'Corrugated Boxes', '2019-11-01', '2019-11-13', '123', '123', '123', '12', '123', 'Pending', 1),
(8, 0, 'Miks', 'asd', 'asd', '2019-11-02 17:24:39', 'lk', 'Perfect Bind', 'Corrugated Boxes', '2019-01-01', '2019-01-01', '123', '1', '13', 'Generator', '123', 'Pending', 1),
(9, 0, 'Miks', 'asd', 'asd', '2019-11-02 17:28:49', 'lk', 'Perfect Bind', 'Corrugated Boxes', '2019-01-01', '2019-01-02', '1', '1', '1', 'lk', 'asd', 'Pending', 1),
(10, 9, 'Miks', 'aaa', 'aaa', '2019-11-04 20:40:46', 'lk', 'Perfect Bind', 'Corrugated Boxes', '2019-01-01', '2019-01-01', '9', '9', '9', 'lk', 'asd', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_ticket`
--

CREATE TABLE `job_ticket` (
  `ticket_no` int(10) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `machine_name` varchar(20) NOT NULL,
  `delivery_date` date NOT NULL,
  `checked_by` varchar(40) NOT NULL,
  `noted_by` varchar(40) NOT NULL,
  `client_name` varchar(40) NOT NULL,
  `proj_name` varchar(100) NOT NULL,
  `title` varchar(40) NOT NULL,
  `quantity` varchar(40) NOT NULL,
  `actual_size` varchar(40) NOT NULL,
  `pages` varchar(40) NOT NULL,
  `paper_cover` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `binding` varchar(40) NOT NULL,
  `lamination` varchar(40) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `stock_size` int(20) NOT NULL,
  `printing_size` int(20) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `time_received` varchar(100) NOT NULL,
  `date_received` date NOT NULL,
  `no_of_out` int(20) NOT NULL,
  `no_of_sheet` int(20) NOT NULL,
  `no_of_ream` int(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_ticket`
--

INSERT INTO `job_ticket` (`ticket_no`, `job_order_control_no`, `date_time_created`, `machine_name`, `delivery_date`, `checked_by`, `noted_by`, `client_name`, `proj_name`, `title`, `quantity`, `actual_size`, `pages`, `paper_cover`, `color`, `binding`, `lamination`, `remarks`, `stock_size`, `printing_size`, `start`, `finish`, `time_received`, `date_received`, `no_of_out`, `no_of_sheet`, `no_of_ream`, `status`) VALUES
(1, 1, '2019-10-10 09:31:09', 'gen', '2019-10-11', 'khjk', 'jkh', 'jkh', 'qwertys', 'hj', '12', '12', 'kjh', 'kjh', 'kjh', 'Embossing', 'jkh', 'jkh', 123, 123, '2019-10-10', '2019-10-17', '02:01', '2019-10-16', 21, 12, 12, 'Enabled'),
(2, 3, '0000-00-00 00:00:00', 'qwe', '2019-11-14', 'asdas', 'dasdasd', 'lkj', 'lkj', 'asdasd', '123', '123', '123123', '123', '123', 'Debossing', 'asd', 'asd', 123, 123, '2019-11-19', '2019-11-22', '01:00', '2020-01-01', 12, 12, 12, 'Pending'),
(3, 4, '0000-00-00 00:00:00', '', '0000-00-00', '', '', 'iuy', 'iu', '', '76', '', '7', '', '', 'Vertical Ringbind', '', '', 0, 0, '0000-00-00', '0000-00-00', '', '0000-00-00', 0, 0, 0, ''),
(4, 5, '0000-00-00 00:00:00', '', '0000-00-00', '', '', 'Miks', 'asd', '', '123', '', '12', '', '', 'Saddle Stitch', '', '', 0, 0, '0000-00-00', '0000-00-00', '', '0000-00-00', 0, 0, 0, ''),
(5, 0, '2019-11-01 13:06:30', '$mname', '2019-01-01', '$c_by', '$n_by', 'asd', 'TRY', '$title', '123', '123', '$pages', '$p_cover', '$color', 'Lamination', '$lamination', '$remarks', 123, 123, '2019-11-25', '2019-11-29', '01:00', '2019-01-01', 1, 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(10) NOT NULL,
  `machine_name` varchar(40) NOT NULL,
  `machine_division` varchar(40) NOT NULL,
  `maximum_size` varchar(100) NOT NULL,
  `minimum_size` varchar(100) NOT NULL,
  `maximum_printing_area` varchar(100) NOT NULL,
  `max_speed` varchar(100) NOT NULL,
  `min_speed` varchar(100) NOT NULL,
  `machine_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `machine_name`, `machine_division`, `maximum_size`, `minimum_size`, `maximum_printing_area`, `max_speed`, `min_speed`, `machine_status`) VALUES
(19, 'lk', 'lk', 'lk', 'lkl', 'klk', 'lk', 'lk', 'Disabled'),
(20, 'qwe', 'qwe', '0', '0', '0', '0', '0', 'Disabled'),
(21, ',mn', ',mn', '0', '0', '0', '0', '0', 'Enabled'),
(22, 'jhjhg', 'jhgjhg', '0', '0', '0', '0', '0', 'gjhg'),
(23, 'vbvbvbbv', 'vb', '0', '0', '0', '0', '0', 'bvvb'),
(24, 'gengen', 'asd', '0', '0', '0', '0', '0', 'vy'),
(25, 'zxcyy', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc'),
(26, 'Machine', 'mach', '34', '231', '123', '12', '12', 'asda'),
(27, 'Printer', 'Printing', '123', '123', '123', '123', '123', 'Good'),
(28, 'Generator', 'Electricity', '12', '12', '12', '123', '100', 'asd'),
(29, 'Generator', 'asd', '12', '12', '12', 'kjh', '12', 'asd'),
(30, 'Generator', 'Pre-Press', '123', '123', '12', '123', '100', 'In Use'),
(31, 'Generatorsss', 'Pre-Press', '123', '123', '123', '123', '123', 'null'),
(32, '12', 'Pre-Press', '1', '1', '1', '12', '1', 'Available'),
(33, 'z', 'Pre-Press', '123', '123', '12', '123', '100', 'Available'),
(34, 'asd', 'Pre-Press', '1', '1', '1', '1', '1', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `machine_loading`
--

CREATE TABLE `machine_loading` (
  `machine_id` int(10) NOT NULL,
  `machine_name` varchar(40) NOT NULL,
  `Mach_name` varchar(40) NOT NULL,
  `machine_division` varchar(40) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `machine_status` varchar(20) NOT NULL,
  `start` datetime(6) NOT NULL,
  `end` datetime(6) NOT NULL,
  `duration` int(25) NOT NULL,
  `project_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machine_maintenance_schedule`
--

CREATE TABLE `machine_maintenance_schedule` (
  `machine_id` int(10) NOT NULL,
  `machine_name` varchar(40) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `finish_date` datetime(6) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `machine_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(25) NOT NULL,
  `size` varchar(100) NOT NULL,
  `unit_of_measure` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `item_name`, `item_desc`, `category`, `quantity`, `size`, `unit_of_measure`, `status`) VALUES
(2, 'Ink', 'Soft', 'Ink', 5, '15', 'Liter', 1),
(3, 'Inksssa', 'Soft', 'Ink', 1, '15', 'Liter', 0),
(4, 'Lapis', 'asdad', 'Paper', 7, '', 'Kilogram', 0),
(5, 'asdad', 'sdads', 'Paper', 1, '', 'Kilogram', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material_request_form`
--

CREATE TABLE `material_request_form` (
  `request_id` int(10) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `no_of_reams` int(25) NOT NULL,
  `paper_size` int(25) NOT NULL,
  `kind_of_paper` varchar(225) NOT NULL,
  `quantity` int(25) NOT NULL,
  `date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `pending_status` varchar(20) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_request_form`
--

INSERT INTO `material_request_form` (`request_id`, `job_order_control_no`, `no_of_reams`, `paper_size`, `kind_of_paper`, `quantity`, `date`, `delivery_date`, `pending_status`, `remarks`) VALUES
(1, 3, 123, 123, 'kl', 123, '2019-10-09', '2019-10-04', 'jhjkh', 'kjhkjh');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `operator_id` int(10) NOT NULL,
  `account_id_no` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `contact_no` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `operator_schedule` varchar(25) NOT NULL,
  `operator_shift` varchar(100) NOT NULL,
  `division` varchar(50) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`operator_id`, `account_id_no`, `first_name`, `middle_name`, `last_name`, `contact_no`, `username`, `password`, `operator_schedule`, `operator_shift`, `division`, `status`) VALUES
(1, 15, 'Dave', '', 'Gomez', 2147483647, 'dave', 'dave', 'Tuesday', '', '', 1),
(2, 10, 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'M-F', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operator_account`
--

CREATE TABLE `operator_account` (
  `id` int(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator_account`
--

INSERT INTO `operator_account` (`id`, `uname`, `pass`) VALUES
(1, 'operator', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `operator_assignment`
--

CREATE TABLE `operator_assignment` (
  `operator_assignment_no` int(25) NOT NULL,
  `operator_id` int(10) NOT NULL,
  `operator_name` varchar(25) NOT NULL,
  `operator_schedule` varchar(25) NOT NULL,
  `operator_division` varchar(25) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `machine_id` int(25) NOT NULL,
  `machine_name` varchar(40) NOT NULL,
  `division_supervisor` varchar(40) NOT NULL,
  `account_id_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operator_schedule`
--

CREATE TABLE `operator_schedule` (
  `operator_id` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `operator_schedule` varchar(40) NOT NULL,
  `operator_shift` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outsourced_job`
--

CREATE TABLE `outsourced_job` (
  `outsourced_job_no` int(10) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `client` varchar(40) NOT NULL,
  `title` varchar(40) NOT NULL,
  `work_order_id` int(10) NOT NULL,
  `description` varchar(225) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post-press_checklist`
--

CREATE TABLE `post-press_checklist` (
  `job_order_control_no` int(10) NOT NULL,
  `control_no` int(10) NOT NULL,
  `client_name` varchar(40) NOT NULL,
  `received_by` varchar(40) NOT NULL,
  `pre-press_supervisor` varchar(40) NOT NULL,
  `time_received` datetime(6) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_updated` datetime(6) NOT NULL,
  `status` varchar(40) NOT NULL,
  `whole_sheet` varchar(40) NOT NULL,
  `date_checked` datetime(6) NOT NULL,
  `quantity_good` int(25) NOT NULL,
  `quality_reject` int(25) NOT NULL,
  `date_returned` int(25) NOT NULL,
  `remarks` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_press`
--

CREATE TABLE `post_press` (
  `div_no` int(25) NOT NULL,
  `div_name` varchar(100) NOT NULL,
  `act_no` int(25) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `type_of_act` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_press`
--

INSERT INTO `post_press` (`div_no`, `div_name`, `act_no`, `activity`, `type_of_act`, `description`) VALUES
(1, 'asd', 1, 'Perfect Bind', 'asdasd', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `pre-press_back_page`
--

CREATE TABLE `pre-press_back_page` (
  `job_order_control_no` int(10) NOT NULL,
  `control_no` int(10) NOT NULL,
  `activity` varchar(40) NOT NULL,
  `date` datetime(6) NOT NULL,
  `simple` varchar(40) NOT NULL,
  `average` varchar(40) NOT NULL,
  `difficult` varchar(40) NOT NULL,
  `time` datetime(6) NOT NULL,
  `overtime` datetime(6) NOT NULL,
  `operator` varchar(40) NOT NULL,
  `supervisor` varchar(40) NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pre-press_checklist`
--

CREATE TABLE `pre-press_checklist` (
  `job_order_control_no` int(10) NOT NULL,
  `control_no` int(10) NOT NULL,
  `client_name` varchar(40) NOT NULL,
  `received_by` varchar(40) NOT NULL,
  `pre-press_supervisor` varchar(40) NOT NULL,
  `time_received` datetime(6) NOT NULL,
  `date_received` datetime(6) NOT NULL,
  `date_updated` datetime(6) NOT NULL,
  `status` varchar(40) NOT NULL,
  `pre-flight` tinyint(1) NOT NULL,
  `page_layout` tinyint(1) NOT NULL,
  `editing` tinyint(1) NOT NULL,
  `imposition` tinyint(1) NOT NULL,
  `proof` tinyint(1) NOT NULL,
  `plate` tinyint(1) NOT NULL,
  `plating` tinyint(1) NOT NULL,
  `size` tinyint(1) NOT NULL,
  `color` tinyint(1) NOT NULL,
  `printing_machine` tinyint(1) NOT NULL,
  `black_text_in_one` tinyint(1) NOT NULL,
  `no_of_pages` tinyint(1) NOT NULL,
  `margin_allow` tinyint(1) NOT NULL,
  `kind_of_paper` tinyint(1) NOT NULL,
  `no_of_signatures` tinyint(1) NOT NULL,
  `collating_marks` tinyint(1) NOT NULL,
  `printing_no_of_outs` tinyint(1) NOT NULL,
  `pictures_graphic_quality` tinyint(1) NOT NULL,
  `registration_marks` tinyint(1) NOT NULL,
  `delivery_date` tinyint(1) NOT NULL,
  `no_of_colors` tinyint(1) NOT NULL,
  `color_bar` tinyint(1) NOT NULL,
  `remarks` tinyint(1) NOT NULL,
  `bleed` tinyint(1) NOT NULL,
  `print_size` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE `press` (
  `div_no` int(25) NOT NULL,
  `div_name` varchar(100) NOT NULL,
  `act_no` int(25) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `type_of_act` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `press_checklist`
--

CREATE TABLE `press_checklist` (
  `job_order_control_no` int(10) NOT NULL,
  `control_no` int(10) NOT NULL,
  `client_name` varchar(40) NOT NULL,
  `received_by` varchar(40) NOT NULL,
  `pre-press_supervisor` varchar(40) NOT NULL,
  `time_received` datetime(6) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `date_updated` datetime(6) NOT NULL,
  `status` varchar(40) NOT NULL,
  `blueprint_proof` tinyint(1) NOT NULL,
  `folding_seq` tinyint(1) NOT NULL,
  `trimming_final_size` tinyint(1) NOT NULL,
  `job_ticket_remarks` tinyint(1) NOT NULL,
  `thickness_of_paper` tinyint(1) NOT NULL,
  `quality_of_paper` tinyint(1) NOT NULL,
  `quantity` tinyint(1) NOT NULL,
  `quantity_per_cut` tinyint(1) NOT NULL,
  `colors` tinyint(1) NOT NULL,
  `paper_size` tinyint(1) NOT NULL,
  `no_of_pages` tinyint(1) NOT NULL,
  `no_of_signatures` tinyint(1) NOT NULL,
  `paper_to_be_used` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pre_press`
--

CREATE TABLE `pre_press` (
  `div_id_no` int(25) NOT NULL,
  `div_name` varchar(100) NOT NULL,
  `act_no` int(25) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `type_of_act` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_press`
--

INSERT INTO `pre_press` (`div_id_no`, `div_name`, `act_no`, `activity`, `type_of_act`, `description`) VALUES
(1, 'asd', 123, 'asd', 'assd', 'assd');

-- --------------------------------------------------------

--
-- Table structure for table `prodass_account`
--

CREATE TABLE `prodass_account` (
  `id` int(10) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodass_account`
--

INSERT INTO `prodass_account` (`id`, `uname`, `pass`) VALUES
(1, 'prodass', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `prodhead_account`
--

CREATE TABLE `prodhead_account` (
  `id` int(10) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodhead_account`
--

INSERT INTO `prodhead_account` (`id`, `uname`, `pass`) VALUES
(1, 'prodhead', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `prodplan_account`
--

CREATE TABLE `prodplan_account` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodplan_account`
--

INSERT INTO `prodplan_account` (`id`, `uname`, `pass`) VALUES
(1, 'prodplan', '1234'),
(2, 'prodplan', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `project_run_schedule`
--

CREATE TABLE `project_run_schedule` (
  `project_run_no` int(10) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `pre-press_start_date` datetime(6) NOT NULL,
  `pre-press_end_date` datetime(6) NOT NULL,
  `press_start_date` datetime(6) NOT NULL,
  `press_end_date` datetime(6) NOT NULL,
  `post-press_start_date` datetime(6) NOT NULL,
  `post-press_end_date` datetime(6) NOT NULL,
  `machine_id` int(10) NOT NULL,
  `machine_name` varchar(25) NOT NULL,
  `machine_status` varchar(40) NOT NULL,
  `operator_id` int(25) NOT NULL,
  `operator_name` varchar(40) NOT NULL,
  `operator_schedule` varchar(25) NOT NULL,
  `pending_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requisition`
--

CREATE TABLE `purchase_requisition` (
  `purchase_requisition_no` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `material_id` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(20) NOT NULL,
  `quantity` int(25) NOT NULL,
  `unit` int(25) NOT NULL,
  `unit_price` int(25) NOT NULL,
  `total` int(25) NOT NULL,
  `tentative_delivery_date` date NOT NULL,
  `actual_delivery_date` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_requisition`
--

INSERT INTO `purchase_requisition` (`purchase_requisition_no`, `date`, `material_id`, `item_name`, `item_desc`, `quantity`, `unit`, `unit_price`, `total`, `tentative_delivery_date`, `actual_delivery_date`, `status`) VALUES
(1, '2019-10-09 03:08:43', 0, 'jhgjhg', 'jhg', 12, 0, 1212, 12, '2019-10-16', '2019-10-09', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(25) NOT NULL,
  `prod_unit` varchar(100) NOT NULL,
  `operator_unit` varchar(100) NOT NULL,
  `operator_name` varchar(100) NOT NULL,
  `report_date` date NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `report_quantity` int(25) NOT NULL,
  `type_job` varchar(100) NOT NULL,
  `no_signature` int(25) NOT NULL,
  `type_activity` varchar(100) NOT NULL,
  `time_started` varchar(100) NOT NULL,
  `time_finished` varchar(100) NOT NULL,
  `report_status` varchar(100) NOT NULL,
  `spoilage` varchar(100) NOT NULL,
  `good_copies` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `prod_unit`, `operator_unit`, `operator_name`, `report_date`, `job_title`, `report_quantity`, `type_job`, `no_signature`, `type_activity`, `time_started`, `time_finished`, `report_status`, `spoilage`, `good_copies`, `remarks`) VALUES
(1, '1', '1', '1', '0000-00-00', '1', 1, '1', 1, '1', '1', '1', '06:22 PM', '07:54 AM', '1', '1'),
(2, 'qwe', 'qwe', 'qwe', '2019-10-09', 'qwe', 123, 'qwe', 123, 'qwe', '16:02', '02:00', 'qwe', 'qwe', 'qwe', 'qwe'),
(3, 'asd', 'asd', 'asd', '2019-10-31', 'asd', 1232, 'asd', 422, 'asd', '15:02', '02:00', 'asd', 'asd', 'asd', 'asd'),
(4, 'hjgjh', 'jhg', 'jhg', '2019-10-02', 'mnbnmn', 123, 'bnmbnmb', 123, 'mnbmn', '15:01', '03:02', 'sdmsag', 'nmbmnb', 'mnbm', 'nbmn'),
(5, 'hgfhg', 'fhg', 'fhg', '2019-10-17', 'jhgjh', 12, 'jhgjg', 12, '123jhg', '15:00', '02:01', ',mh,', 'kjhkjhk', 'hjkjh', 'kjhkj\\');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(40) NOT NULL,
  `head_office_address` varchar(225) NOT NULL,
  `telephone` int(40) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `branch` varchar(225) NOT NULL,
  `tel_no` int(25) NOT NULL,
  `warehouse` varchar(225) NOT NULL,
  `form_of_business` varchar(40) NOT NULL,
  `kind_of_business` varchar(40) NOT NULL,
  `tin_no` int(25) NOT NULL,
  `contact_person` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `contact_person2` varchar(40) NOT NULL,
  `position2` varchar(40) NOT NULL,
  `major_products` varchar(225) NOT NULL,
  `secondary_services` varchar(225) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`supplier_id`, `supplier_name`, `head_office_address`, `telephone`, `email_address`, `branch`, `tel_no`, `warehouse`, `form_of_business`, `kind_of_business`, `tin_no`, `contact_person`, `position`, `contact_person2`, `position2`, `major_products`, `secondary_services`, `status`) VALUES
(1, 'qqq', 'q', 2147483647, 'q@asd', 'q', 2147483647, 'q', 'q', 'q', 0, 'q', 'q', 'q', 'q', 'q', 'q', 0),
(2, 'aaa', 'a', 2147483647, 'a@ASDASD', 'a', 2147483647, 'a', 'a', 'a', 0, 'aa', 'aasd', 'a', 'a', 'a', 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE `tbl_useraccounts` (
  `ua_id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`ua_id`, `uname`, `pass`, `user_type`, `fname`, `mname`, `lname`, `division`, `status`) VALUES
(1, 'miks', 'miks', '1', 'Miks', '', 'John', '', 0),
(2, 'prodhead', 'prodhead', '2', 'Miks', '', 'John', '', 1),
(3, 'prodass', 'prodass', '3', 'Miks', '', 'John', '', 1),
(4, 'prodplan', 'prodplan', '4', 'Miks', '', 'John', '', 0),
(5, 'divsup', 'divsup', '5', 'Miks', '', 'John', '', 0),
(7, 'miksssss', 'mikss', '7', 'Miks', '', 'John', '', 0),
(9, 'miksss', 'miks', '1', 'Miks', '', 'John', '', 0),
(10, 'mikss', 'miks', '1', 'Miks', '', 'John', 'admin', 0),
(11, 'miksa', 'miks', '3', 'Miks', '', 'John', 'admin', 0),
(12, 'miksas', 'mik', '2', 'Miks', '', 'John', 'admin', 0),
(13, 'al', 'al', '2', 'al', '', 'al', '', 1),
(15, 'asd', 'asd', '2', 'asd', 'asd', 'asd', '', 0),
(16, 'qwes', 'qwe', '2', 'qwe', 'qwe', 'qwe', '', 0),
(17, 'qwesa', 'qwe', '2', 'qwe', 'qwe', 'qwe', '', 0),
(18, 'qwe', 'qwe', '2', 'qwe', 'qweq', 'qwe', '', 0),
(19, 'zxc', 'zxc', '2', 'zxc', 'zxc', 'zzxc', '', 0),
(20, 'try', 'try', '2', 'try', '', 'try', '', 0),
(21, 'sige', 'sige', '6', 'tryule', '', 'trylan', '', 0),
(22, 'asdsa', 'asda', '2', 'asd', 'asd', 'asd', '', 0),
(23, 'proh', 'proh', '2', 'proh', '', 'proh', '', 0),
(24, 'sales', 'sales', '6', 'sales', '', 'sales', '', 0),
(25, 'prohe', 'prohe', '2', 'prohe', '', 'prohe', '', 0),
(26, 'lk', 'lk', '3', 'lk', 'lk', 'lk', '', 0),
(27, 'john', 'john', '2', 'Johnny', '', 'Johnny', '', 0),
(28, 'jo', 'jo', '4', 'jo', '', 'joh', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trasmittal`
--

CREATE TABLE `trasmittal` (
  `transmittal_id` int(11) NOT NULL,
  `prep_by` varchar(100) NOT NULL,
  `pre_press` varchar(100) NOT NULL,
  `post_press` varchar(100) NOT NULL,
  `others` varchar(100) NOT NULL,
  `jo_no` int(25) NOT NULL,
  `quantity` int(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trasmittal`
--

INSERT INTO `trasmittal` (`transmittal_id`, `prep_by`, `pre_press`, `post_press`, `others`, `jo_no`, `quantity`, `description`, `status`) VALUES
(1, '123', '123', '123', '123', 123, 123, '123', '123'),
(2, 'qwe', 'qwe', 'qwe', 'qwe', 0, 123, 'qwe', 'qwe'),
(3, 'lknlkj', 'lkj', 'lkj', 'lkj', 0, 123, 'kjl', 'kjlkj'),
(4, 'kjhjk', 'hkjh', 'kjh', 'kj', 0, 123, 'kjh', 'kjh'),
(5, 'lknlk', 'lkjlk', 'jkl', 'jlk', 0, 123, 'lkj', 'lkjkljkl');

-- --------------------------------------------------------

--
-- Table structure for table `user_action`
--

CREATE TABLE `user_action` (
  `user_action_id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_designation` varchar(100) NOT NULL,
  `action_date` datetime NOT NULL,
  `action_done` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_action`
--

INSERT INTO `user_action` (`user_action_id`, `username`, `user_designation`, `action_date`, `action_done`) VALUES
(2, 'Admin', '1', '2019-10-08 22:28:01', 'Add Account'),
(3, 'Admin', '1', '2019-10-09 09:01:37', 'Add Machine'),
(4, 'Admin', '1', '2019-10-09 09:05:33', 'Add Work Order'),
(5, 'Admin', '1', '2019-10-09 09:05:55', 'Add Transmittal'),
(7, 'Admin', '1', '2019-10-09 09:08:14', 'Add Material Request'),
(8, 'Admin', '1', '2019-10-09 09:08:43', 'Add Purchase Request'),
(9, 'Admin', '1', '2019-10-09 09:09:11', 'Add Material'),
(10, 'Admin', '1', '2019-10-09 09:09:42', 'Add Job Order'),
(11, 'Admin', '1', '2019-10-09 09:12:41', 'Add Report'),
(12, 'Prod Ass', '3', '2019-10-09 09:50:03', 'Add Transmittal'),
(13, 'Prod Ass', '3', '2019-10-09 09:50:56', 'Add Work Order'),
(14, 'Admin', '1', '2019-10-09 13:23:41', 'Add Job Order'),
(15, '', '3', '2019-10-09 14:38:29', 'Update Job Order'),
(16, 'Admin', '1', '2019-10-09 14:45:21', 'Update Job Order'),
(17, 'Admin', '1', '2019-10-09 14:46:05', 'Update Job Order'),
(18, 'Admin', '1', '2019-10-09 14:47:27', 'Update Job Order'),
(19, 'Admin', '1', '2019-10-09 14:53:48', 'Update Job Order'),
(20, 'Admin', '1', '2019-10-09 14:55:03', 'Update Job Order'),
(21, 'Admin', '1', '2019-10-09 15:04:33', 'Update Job Order'),
(22, 'Admin', '1', '2019-10-09 17:46:52', 'Add Job Ticket'),
(23, 'Admin', '1', '2019-10-10 09:31:10', 'Add Job Ticket'),
(24, '', '4', '2019-10-10 12:16:37', 'Add Operator'),
(25, '', '4', '2019-10-10 12:19:25', 'Add Operator'),
(26, 'Admin', '1', '2019-10-10 13:23:28', 'Add Account'),
(27, 'Admin', '1', '2019-10-11 08:56:33', 'Add Machine'),
(28, 'Admin', '1', '2019-10-11 09:13:45', 'Add Machine'),
(29, 'Admin', '1', '2019-10-11 15:04:25', 'Add Machine'),
(30, 'Admin', '1', '2019-10-13 20:18:21', 'Add Material'),
(31, 'Admin', '1', '2019-10-13 20:22:05', 'Add Material'),
(32, 'Admin', '1', '2019-10-13 20:26:26', 'Deleted Material'),
(33, 'Admin', '1', '2019-10-13 20:30:22', 'Updated Material'),
(34, 'Admin', '1', '2019-10-14 09:15:43', 'Updated Job Ticket'),
(35, 'Admin', '1', '2019-10-14 09:18:15', 'Updated Job Ticket'),
(36, 'Admin', '1', '2019-10-14 09:19:01', 'Updated Job Ticket'),
(37, 'Admin', '1', '2019-10-14 11:02:51', 'Add Machine'),
(38, 'Admin', '1', '2019-10-14 11:04:06', 'Updated Machine'),
(39, 'Admin', '1', '2019-10-14 11:24:57', 'Updated Material'),
(40, 'Admin', '1', '2019-10-14 13:20:48', 'Add Machine'),
(41, 'Admin', '1', '2019-10-14 15:24:22', 'Updated Account'),
(42, 'Admin', '1', '2019-10-14 15:27:33', 'Updated Account'),
(43, 'Admin', '1', '2019-10-14 15:28:20', 'Updated Account'),
(44, 'Admin', '1', '2019-10-14 15:28:44', 'Updated Account'),
(45, 'Admin', '1', '2019-10-14 15:29:13', 'Updated Account'),
(46, 'Admin', '1', '2019-10-14 15:29:33', 'Updated Account'),
(47, 'Admin', '1', '2019-10-14 15:29:43', 'Deleted Account'),
(48, 'Admin', '1', '2019-10-14 15:29:53', 'Deleted Account'),
(49, 'Admin', '1', '2019-10-14 15:31:09', 'Deleted Account'),
(50, 'Admin', '1', '2019-10-14 15:31:28', 'Deleted Account'),
(51, 'Admin', '1', '2019-10-15 10:57:09', 'Add Client'),
(52, 'Admin', '1', '2019-10-15 11:24:55', 'Deleted Client'),
(53, 'Admin', '1', '2019-10-15 11:25:36', 'Deleted Client'),
(54, 'Admin', '1', '2019-10-16 09:46:47', 'Add Account'),
(55, 'Admin', '1', '2019-10-16 10:05:33', 'Add Client'),
(56, 'Admin', '1', '2019-10-16 10:05:49', 'Deleted Client'),
(57, 'Admin', '1', '2019-10-16 10:05:53', 'Deleted Client'),
(58, 'Miks', '1', '2019-10-16 13:49:19', 'Deleted Account'),
(59, 'Miks', '1', '2019-10-17 17:01:32', 'Add Operator'),
(60, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Client'),
(61, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Client'),
(62, 'Miks', '1', '2019-10-17 19:03:42', 'Deleted Client'),
(63, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(64, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(65, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(66, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(67, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(68, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(69, 'Miks', '1', '0000-00-00 00:00:00', 'Updated Operator'),
(70, 'Miks', '1', '2019-10-18 08:34:30', 'Updated Operator'),
(71, 'Miks', '1', '2019-10-18 08:35:01', 'Deleted Operator'),
(72, 'Miks', '1', '2019-10-18 10:34:05', 'Add Job Order'),
(73, 'Miks', '1', '2019-10-18 15:40:52', 'Add Client'),
(74, 'Miks', '1', '2019-10-18 15:40:57', 'Deleted Client'),
(75, 'Miks', '1', '2019-10-21 08:29:51', 'Disabled Job Order'),
(76, 'Miks', '1', '2019-10-25 13:36:04', 'Deleted Machine'),
(77, 'Miks', '1', '2019-10-25 15:41:12', 'Add Job Order'),
(78, 'Miks', '1', '2019-10-25 18:51:19', 'Add Account'),
(79, 'Miks', '1', '2019-10-25 18:52:25', 'Add Account'),
(80, 'Miks', '1', '2019-10-25 18:55:46', 'Add Machine'),
(81, 'Miks', '1', '2019-10-25 18:57:47', 'Updated Account'),
(82, 'Miks', '1', '2019-10-25 19:06:10', 'Updated Account'),
(83, 'Miks', '1', '2019-10-25 19:13:50', 'Deleted Account'),
(84, 'Miks', '1', '2019-10-25 20:35:44', 'Add Account'),
(85, 'Miks', '1', '2019-10-25 20:43:59', 'Add Account'),
(86, 'Miks', '1', '2019-10-25 20:44:23', 'Add Account'),
(87, 'Miks', '1', '2019-10-25 20:45:16', 'Add Account'),
(88, 'Miks', '1', '2019-10-25 20:56:26', 'Add Account'),
(89, 'Miks', '1', '2019-10-25 21:51:14', 'Add Account'),
(90, 'Miks', '1', '2019-10-25 21:59:20', 'Add Account'),
(91, 'Miks', '1', '2019-10-25 22:00:43', 'Add Account'),
(92, 'Miks', '1', '2019-10-26 21:06:09', 'Add Account'),
(93, 'Miks', '1', '2019-10-27 08:39:08', 'Add Machine'),
(94, 'Miks', '1', '2019-10-27 09:52:31', 'Deleted Account'),
(95, 'Miks', '1', '2019-10-27 10:25:32', 'Add Supplier'),
(96, 'Miks', '1', '2019-10-27 10:26:46', 'Add Supplier'),
(97, 'Miks', '1', '2019-10-27 10:31:40', 'Add Supplier'),
(98, 'Miks', '1', '2019-10-27 10:33:10', 'Add Supplier'),
(99, 'Miks', '1', '2019-10-27 10:33:16', 'Deleted Supplier'),
(100, 'Miks', '1', '2019-10-27 10:34:47', 'Add Supplier'),
(101, 'Miks', '1', '2019-10-27 10:35:46', 'Deleted Supplier'),
(102, 'Miks', '1', '2019-10-27 10:46:08', 'Deleted Operator'),
(103, 'Miks', '1', '2019-10-27 10:50:52', 'Updated Material'),
(104, 'Miks', '1', '2019-10-27 10:52:03', 'Updated Material'),
(105, 'Miks', '1', '2019-10-27 10:53:24', 'Updated Material'),
(106, 'Miks', '1', '2019-10-27 12:57:40', 'Disabled Client'),
(107, 'Miks', '1', '2019-10-27 13:28:57', 'Add Supplier'),
(108, 'Miks', '1', '2019-10-27 14:56:41', 'Disabled Machine'),
(109, 'Miks', '1', '2019-10-27 15:07:58', 'Disabled Material'),
(110, 'Miks', '1', '2019-10-27 15:10:41', 'Disabled Material'),
(111, 'Miks', '1', '2019-10-27 15:12:28', 'Updated Material'),
(112, 'Miks', '1', '2019-10-27 15:20:37', 'Disabled Job Ticket'),
(113, 'Miks', '1', '2019-10-28 14:45:32', 'Add Account'),
(114, 'Miks', '1', '2019-10-28 17:26:54', 'Add Work Order'),
(115, 'al', '2', '2019-10-28 17:29:15', 'Add Account'),
(116, 'al', '2', '2019-10-28 17:29:39', 'Add Machine'),
(117, 'Miks', '1', '2019-10-28 17:31:33', 'Add Account'),
(118, 'Miks', '1', '2019-10-28 19:00:53', 'Add Client'),
(119, 'Miks', '1', '2019-10-28 19:01:39', 'Add Client'),
(120, 'Miks', '1', '2019-10-29 14:46:36', 'Disabled Work Order'),
(121, 'Miks', '1', '2019-10-29 14:46:49', 'Disabled Work Order'),
(122, 'Miks', '1', '2019-10-29 14:46:56', 'Disabled Work Order'),
(123, 'Miks', '1', '2019-10-29 14:47:03', 'Disabled Work Order'),
(124, 'Miks', '1', '2019-10-29 14:47:09', 'Disabled Work Order'),
(125, 'Miks', '1', '2019-10-29 14:48:28', 'Deleted Account'),
(126, 'Miks', '1', '2019-10-29 14:48:48', 'Deleted Account'),
(127, 'Miks', '1', '2019-10-29 14:49:02', 'Deleted Account'),
(128, 'Miks', '1', '2019-10-29 14:51:37', 'Deleted Account'),
(129, 'Miks', '1', '2019-10-29 14:51:41', 'Enabled Account'),
(130, 'Miks', '1', '2019-10-29 14:51:49', 'Deleted Account'),
(131, 'Miks', '1', '2019-10-29 14:52:01', 'Enabled Account'),
(132, 'Miks', '1', '2019-10-29 14:53:25', 'Disabled Job Order'),
(133, 'Miks', '1', '2019-10-29 14:54:23', 'Enabled Job Order'),
(134, 'Miks', '1', '2019-10-29 14:54:29', 'Disabled Job Order'),
(135, 'Miks', '1', '2019-10-29 14:54:42', 'Enabled Material'),
(136, 'Miks', '1', '2019-10-29 14:54:51', 'Enabled Job Order'),
(137, 'Miks', '1', '2019-10-29 14:56:09', 'Disabled Job Ticket'),
(138, 'Miks', '1', '2019-10-29 14:56:52', 'Disabled Job Ticket'),
(139, 'Miks', '1', '2019-10-29 14:57:25', 'Enabled Job Ticket'),
(140, 'Miks', '1', '2019-10-29 14:57:40', 'Disabled Machine'),
(141, 'Miks', '1', '2019-10-29 14:58:10', 'Disabled Machine'),
(142, 'Miks', '1', '2019-10-29 14:58:14', 'Enabled Machine'),
(143, 'Miks', '1', '2019-10-29 14:58:19', 'Disabled Machine'),
(144, 'Miks', '1', '2019-10-29 14:58:23', 'Disabled Machine'),
(145, 'Miks', '1', '2019-10-29 14:58:30', 'Disabled Material'),
(146, 'Miks', '1', '2019-10-29 14:58:51', 'Disabled Work Order'),
(147, 'Miks', '1', '2019-10-29 14:59:08', 'Disabled Work Order'),
(148, 'Miks', '1', '2019-10-29 15:01:06', 'Disabled Work Order'),
(149, 'Miks', '1', '2019-10-29 15:01:39', 'Disabled Work Order'),
(150, 'Miks', '1', '2019-10-29 15:02:25', 'Disabled Work Order'),
(151, 'Miks', '1', '2019-10-29 15:03:48', 'Enabled Work Order'),
(152, 'Miks', '1', '2019-10-29 15:04:59', 'Disabled Work Order'),
(153, 'Miks', '1', '2019-10-29 15:05:10', 'Enabled Machine'),
(154, 'Miks', '1', '2019-10-29 15:05:30', 'Enabled Work Order'),
(155, 'Miks', '1', '2019-10-29 15:13:28', 'Enabled Client'),
(156, 'Miks', '1', '2019-10-29 15:13:32', 'Disabled Client'),
(157, 'Miks', '1', '2019-10-29 15:15:24', 'Disabled Client'),
(158, 'Miks', '1', '2019-10-29 15:15:29', 'Disabled Client'),
(159, 'Miks', '1', '2019-10-29 15:15:31', 'Enabled Client'),
(160, 'Miks', '1', '2019-10-29 20:04:38', 'Converted Job Order'),
(161, 'Miks', '1', '2019-10-30 20:03:56', 'Add Material'),
(162, 'Miks', '1', '2019-10-30 20:05:30', 'Add Material'),
(163, 'Miks', '1', '2019-10-30 20:52:24', 'Add Quantity'),
(164, 'Miks', '1', '2019-10-30 20:52:37', 'Add Quantity'),
(165, 'Miks', '1', '2019-10-31 12:09:34', 'Add Pre-Press Activity'),
(166, 'Miks', '1', '2019-10-31 12:14:52', 'Deleted Account'),
(167, 'Miks', '1', '2019-10-31 12:21:46', 'Updated Client'),
(168, 'Miks', '1', '2019-10-31 12:25:45', 'Add Supplier'),
(169, 'Miks', '1', '2019-10-31 12:26:54', 'Add Supplier'),
(170, 'Miks', '1', '2019-10-31 12:30:47', 'Add Supplier'),
(171, 'Miks', '1', '2019-10-31 12:31:39', 'Add Supplier'),
(172, 'Miks', '1', '2019-10-31 12:31:46', 'Disabled Supplier'),
(173, 'Miks', '1', '2019-10-31 12:35:49', 'Updated Supplier'),
(174, 'Miks', '1', '2019-10-31 12:36:49', 'Updated Supplier'),
(175, 'Miks', '1', '2019-10-31 12:38:46', 'Updated Supplier'),
(176, 'Miks', '1', '2019-10-31 12:39:06', 'Updated Client'),
(177, 'Miks', '1', '2019-10-31 12:49:14', 'Updated Operator'),
(178, 'Miks', '1', '2019-10-31 13:05:02', 'Disabled Job Order'),
(179, 'Miks', '1', '2019-11-01 11:56:38', 'Converted Job Order'),
(180, 'Miks', '1', '2019-11-01 12:01:37', 'Converted Job Order'),
(181, 'Miks', '1', '2019-11-01 13:06:30', 'Add Job Ticket'),
(182, 'Miks', '1', '2019-11-02 17:19:42', 'Add Job Order'),
(183, 'Miks', '1', '2019-11-02 17:22:16', 'Add Job Order'),
(184, 'Miks', '1', '2019-11-02 17:24:39', 'Add Job Order'),
(185, 'Miks', '1', '2019-11-02 17:28:49', 'Add Job Order'),
(186, 'Miks', '1', '2019-11-04 20:40:47', 'Add Job Order'),
(187, 'Miks', '1', '2019-11-09 11:03:29', 'Add Quantity'),
(188, 'Miks', '1', '2019-11-09 11:30:13', 'Add Account'),
(189, 'Miks', '1', '2019-11-09 11:30:45', 'Add Account'),
(190, 'Miks', '1', '2019-11-10 20:54:59', 'Add Post-Press Activity'),
(191, 'Miks', '1', '2019-11-12 09:47:35', 'Updated Job Ticket'),
(192, 'Miks', '1', '2019-11-12 09:50:49', 'Updated Job Ticket'),
(193, 'Miks', '1', '2019-11-12 09:53:21', 'Updated Job Ticket'),
(194, 'Miks', '1', '2019-11-12 09:54:42', 'Updated Job Ticket'),
(195, 'Miks', '1', '2019-11-12 09:55:48', 'Updated Job Ticket'),
(196, 'Miks', '1', '2019-11-12 10:30:25', 'Updated Job Ticket'),
(197, 'Miks', '1', '2019-11-12 10:33:08', 'Updated Job Ticket'),
(198, 'Miks', '1', '2019-11-14 08:44:13', 'Enabled Supplier'),
(199, 'Miks', '1', '2019-11-14 08:45:06', 'Enabled Supplier'),
(200, 'Miks', '1', '2019-11-14 08:45:54', 'Enabled Supplier'),
(201, 'Miks', '1', '2019-11-14 08:45:56', 'Enabled Supplier'),
(202, 'Miks', '1', '2019-11-14 08:45:58', 'Enabled Supplier'),
(203, 'Miks', '1', '2019-11-14 08:45:59', 'Enabled Supplier'),
(204, 'Miks', '1', '2019-11-14 08:46:01', 'Enabled Supplier'),
(205, 'Miks', '1', '2019-11-14 08:46:02', 'Enabled Supplier'),
(206, 'Miks', '1', '2019-11-14 08:46:03', 'Enabled Supplier'),
(207, 'Miks', '1', '2019-11-14 08:46:04', 'Enabled Supplier'),
(208, 'Miks', '1', '2019-11-14 08:46:48', 'Enabled Supplier'),
(209, 'Miks', '1', '2019-11-14 08:46:50', 'Enabled Supplier'),
(210, 'Miks', '1', '2019-11-14 08:46:51', 'Enabled Supplier'),
(211, 'Miks', '1', '2019-11-14 08:46:52', 'Enabled Supplier'),
(212, 'Miks', '1', '2019-11-14 08:46:53', 'Enabled Supplier'),
(213, 'Miks', '1', '2019-11-14 08:46:54', 'Enabled Supplier'),
(214, 'Miks', '1', '2019-11-14 08:46:55', 'Enabled Supplier'),
(215, 'Miks', '1', '2019-11-14 08:46:56', 'Enabled Supplier'),
(216, 'Miks', '1', '2019-11-14 08:46:57', 'Enabled Supplier'),
(217, 'Miks', '1', '2019-11-14 08:47:19', 'Enabled Supplier'),
(218, 'Miks', '4', '2019-11-14 12:40:02', 'Deleted Operator'),
(219, 'Miks', '4', '2019-11-14 12:40:04', 'Deleted Operator'),
(220, 'Miks', '4', '2019-11-14 12:40:05', 'Deleted Operator'),
(221, 'Miks', '4', '2019-11-14 12:40:06', 'Deleted Operator'),
(222, 'Miks', '4', '2019-11-14 12:40:06', 'Deleted Operator'),
(223, 'Miks', '4', '2019-11-14 12:40:06', 'Deleted Operator'),
(224, 'Miks', '4', '2019-11-14 12:40:06', 'Deleted Operator'),
(225, 'Miks', '4', '2019-11-14 12:40:07', 'Deleted Operator'),
(226, 'Miks', '4', '2019-11-14 12:41:19', 'Deleted Operator'),
(227, 'Miks', '4', '2019-11-14 12:41:20', 'Deleted Operator'),
(228, 'Miks', '4', '2019-11-14 12:41:22', 'Deleted Operator'),
(229, 'Miks', '4', '2019-11-14 12:42:50', 'Deleted Operator'),
(230, 'Miks', '4', '2019-11-14 12:42:51', 'Deleted Operator'),
(231, 'Miks', '4', '2019-11-14 12:42:52', 'Deleted Operator'),
(232, 'Miks', '4', '2019-11-14 12:42:53', 'Deleted Operator'),
(233, 'Miks', '4', '2019-11-14 12:42:53', 'Deleted Operator'),
(234, 'Miks', '4', '2019-11-14 12:42:54', 'Deleted Operator'),
(235, 'Miks', '4', '2019-11-14 12:42:56', 'Deleted Operator'),
(236, 'Miks', '4', '2019-11-14 12:46:00', 'Deleted Operator'),
(237, 'Miks', '4', '2019-11-14 12:47:23', 'Enabled Operator'),
(238, 'Miks', '4', '2019-11-14 12:47:41', 'Enabled Operator'),
(239, 'Miks', '4', '2019-11-14 12:47:43', 'Deleted Operator'),
(240, 'Miks', '1', '2019-11-14 12:49:07', 'Updated Supplier'),
(241, 'Miks', '1', '2019-11-14 12:53:23', 'Updated Supplier'),
(242, 'Miks', '1', '2019-11-14 12:58:50', 'Updated Supplier'),
(243, 'Miks', '1', '2019-11-18 09:21:08', 'Updated Job Ticket'),
(244, 'Miks', '1', '2019-11-18 09:21:31', 'Updated Job Ticket'),
(245, 'Miks', '1', '2019-11-18 09:21:57', 'Updated Job Ticket'),
(246, 'Miks', '1', '2019-11-18 09:23:01', 'Updated Job Ticket');

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE `work_order` (
  `work_order_no` int(25) NOT NULL,
  `job_controlno` int(25) NOT NULL,
  `job_desc` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `instruction` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_order`
--

INSERT INTO `work_order` (`work_order_no`, `job_controlno`, `job_desc`, `s_name`, `instruction`, `date_created`, `status`) VALUES
(1, 1, 'qwe', 'qw', '2019-10-07', '0000-00-00', '1'),
(2, 1, 'qwe', 'iuy', 'iuy', '2019-10-07', '1'),
(3, 2, 'qwe', 'qwe', 'qwe', '2019-10-07', '0'),
(4, 123, '123', '123', '123', '2019-10-07', '123'),
(5, 123, 'askdj', 'kj', 'kj', '2019-10-09', 'kj'),
(6, 8989, 'jajaja', 'jajaj', 'jajaj', '2019-10-09', 'ajja'),
(7, 0, 'jkl', 'jk', 'jklj', '2019-10-09', 'kjkl'),
(8, 0, 'hkj', 'hkjh', 'kjh', '2019-10-09', 'kjh'),
(9, 0, 'kjh', 'kjh', 'jhkjh', '2019-10-09', 'kkjh'),
(10, 0, 'kjh', 'asd', 'asd', '2019-10-28', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`job_order_control_no`);

--
-- Indexes for table `job_ticket`
--
ALTER TABLE `job_ticket`
  ADD PRIMARY KEY (`ticket_no`),
  ADD UNIQUE KEY `job_order_control_no` (`job_order_control_no`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `material_request_form`
--
ALTER TABLE `material_request_form`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`operator_id`),
  ADD UNIQUE KEY `account_id_no` (`account_id_no`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `operator_schedule`
--
ALTER TABLE `operator_schedule`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `post_press`
--
ALTER TABLE `post_press`
  ADD PRIMARY KEY (`div_no`);

--
-- Indexes for table `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`div_no`);

--
-- Indexes for table `pre_press`
--
ALTER TABLE `pre_press`
  ADD PRIMARY KEY (`div_id_no`);

--
-- Indexes for table `purchase_requisition`
--
ALTER TABLE `purchase_requisition`
  ADD PRIMARY KEY (`purchase_requisition_no`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD PRIMARY KEY (`ua_id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `trasmittal`
--
ALTER TABLE `trasmittal`
  ADD PRIMARY KEY (`transmittal_id`);

--
-- Indexes for table `user_action`
--
ALTER TABLE `user_action`
  ADD PRIMARY KEY (`user_action_id`);

--
-- Indexes for table `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`work_order_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `job_order_control_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_ticket`
--
ALTER TABLE `job_ticket`
  MODIFY `ticket_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_request_form`
--
ALTER TABLE `material_request_form`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `operator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operator_schedule`
--
ALTER TABLE `operator_schedule`
  MODIFY `operator_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_press`
--
ALTER TABLE `post_press`
  MODIFY `div_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `press`
--
ALTER TABLE `press`
  MODIFY `div_no` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_press`
--
ALTER TABLE `pre_press`
  MODIFY `div_id_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_requisition`
--
ALTER TABLE `purchase_requisition`
  MODIFY `purchase_requisition_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_info`
--
ALTER TABLE `supplier_info`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `ua_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `trasmittal`
--
ALTER TABLE `trasmittal`
  MODIFY `transmittal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_action`
--
ALTER TABLE `user_action`
  MODIFY `user_action_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `work_order`
--
ALTER TABLE `work_order`
  MODIFY `work_order_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
