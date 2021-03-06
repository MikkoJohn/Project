-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 06:54 AM
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
(9, 'Jovss', 'Daves', 'Converge', '09090909900', 'asdad', 'asd', 'asd', 'asd', 1),
(11, 'Mikko', 'asd', 'sa', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(12, 'Mikko', 'asd', 'sa', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(13, 'Kurt', 'K', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1),
(14, 'Kurt', 'Kaye', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
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
(2, 'asdasd', '2019-11-12', '2019-11-12'),
(3, 'try this', '2019-11-06', '2019-11-08'),
(4, 'hello ', '2019-12-02', '2019-12-07');

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
(2, 'genserv', 1234),
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
(1, 1, 'Mark', '1', '1', '2019-12-02 14:15:19', 'qwe', 'Perfect Bind', 'Perfect Bind', '2019-01-01', '2019-12-19', '1', '123123', '1', 'asdad', 'This is try 2nd', 'Pending', 0),
(2, 0, '', '', '', '2019-12-02 14:16:03', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 'this is ', 'Pending', 0);

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
  `stock_size` varchar(20) NOT NULL,
  `printing_size` varchar(20) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `date_checked` datetime NOT NULL,
  `date_noted` datetime NOT NULL,
  `no_of_out` int(20) NOT NULL,
  `no_of_sheet` int(20) NOT NULL,
  `no_of_ream` int(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jt_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_ticket`
--

INSERT INTO `job_ticket` (`ticket_no`, `job_order_control_no`, `date_time_created`, `machine_name`, `delivery_date`, `checked_by`, `noted_by`, `client_name`, `proj_name`, `title`, `quantity`, `actual_size`, `pages`, `paper_cover`, `color`, `binding`, `lamination`, `remarks`, `stock_size`, `printing_size`, `start`, `finish`, `date_checked`, `date_noted`, `no_of_out`, `no_of_sheet`, `no_of_ream`, `status`, `jt_status`) VALUES
(1, 1, '2019-12-02 14:24:02', 'qwe', '2019-12-13', 'Miks', 'Miks John', 'Mark', '1', '1', '1', '1', '1', 'jkhkjh', '1 Color - Black', 'Perfect Bind', 'jhkj', 'hjkh', 'asdad', '222', '2019-12-25', '2019-12-25', '2019-12-02 16:52:20', '2019-12-07 10:18:24', 1, 1, 1, 'Enabled', 0),
(2, 2, '2019-12-02 15:04:28', 'lk', '0000-00-00', '', '', 'AAAA', 'qweqwe', 'qweqwe', '1', '', '1', '', '', 'Perfect Bind', '', '', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Pending', 0);

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
  `machine_status` varchar(40) NOT NULL,
  `operator_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `machine_name`, `machine_division`, `maximum_size`, `minimum_size`, `maximum_printing_area`, `max_speed`, `min_speed`, `machine_status`, `operator_name`) VALUES
(19, 'lk', 'Pre-Press', 'lk', 'lkl', 'klk', 'lk', 'lk', 'Disabled', 'Dave'),
(20, 'qwe', 'Pre-Press', '1', '0', '1', '0', '0', 'Disabled', 'Dave'),
(21, 'qweqwes', 'Pre-Press', '23', '23', '23', '23', '23', 'Available', 'Dave'),
(22, 'jhjhg', 'Pre-Press', '0', '0', '0', '0', '0', 'gjhg', 'Dave'),
(23, 'vbvbvbbv', 'Pre-Press', '0', '0', '0', '0', '0', 'bvvb', 'Dave'),
(24, 'gengen', 'Pre-Press', '0', '0', '0', '0', '0', 'vy', 'Dave'),
(25, 'zxcyy', 'Pre-Press', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'Dave'),
(26, 'Machine', 'Pre-Press', '34', '231', '123', '12', '12', 'asda', 'Dave'),
(27, 'Printer', 'Pre-Press', '123', '123', '123', '123', '123', 'Good', ''),
(28, 'Generator', 'Pre-Press', '12', '12', '12', '123', '100', 'asd', ''),
(29, 'Generator', 'Pre-Press', '12', '12', '12', 'kjh', '12', 'asd', ''),
(30, 'Generator', 'Pre-Press', '123', '123', '12', '123', '100', 'In Use', ''),
(31, 'Generatorsss', 'Pre-Press', '123', '123', '123', '123', '123', 'null', ''),
(32, '12', 'Pre-Press', '1', '1', '1', '12', '1', 'Available', ''),
(33, 'z', 'Pre-Press', '123', '123', '12', '123', '100', 'Available', ''),
(34, 'asd', 'Pre-Press', '1', '1', '1', '1', '1', 'Available', '');

-- --------------------------------------------------------

--
-- Table structure for table `machine_loading`
--

CREATE TABLE `machine_loading` (
  `machine_id` int(10) NOT NULL,
  `machine_name` varchar(40) NOT NULL,
  `operator_name` varchar(40) NOT NULL,
  `job_order_control_no` int(50) NOT NULL,
  `proj_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine_loading`
--

INSERT INTO `machine_loading` (`machine_id`, `machine_name`, `operator_name`, `job_order_control_no`, `proj_name`, `status`) VALUES
(1, 'lk', 'Dave', 1, '1', 'Complete');

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
(2, 'Inks', 'Soft', 'Ink', 3, '15', 'Liter', 0),
(3, 'Inksssa', 'Soft', 'Ink', 1, '15', 'Liter', 0),
(4, 'Lapis', 'asdad', 'Chemicals', 5, '', 'Kilogram', 0),
(5, 'asdad', 'sdads', 'Paper', 4, '', 'Kilogram', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material_estimation`
--

CREATE TABLE `material_estimation` (
  `estimation_id` int(50) NOT NULL,
  `ticket_no` int(100) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `height` int(50) NOT NULL,
  `width` int(50) NOT NULL,
  `paper_type` varchar(50) NOT NULL,
  `paper_gsm` varchar(50) NOT NULL,
  `machine_cut_off` varchar(50) NOT NULL,
  `spoilage` varchar(50) NOT NULL,
  `colors` varchar(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material_request_form`
--

CREATE TABLE `material_request_form` (
  `request_id` int(10) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `no_of_reams` varchar(25) NOT NULL,
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
(1, 3, '123', 123, 'kl', 123, '2019-10-09', '2019-10-04', 'Disapproved', 'kjhkjh');

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
  `operator_assignment` varchar(50) NOT NULL,
  `operator_shift` varchar(100) NOT NULL,
  `operator_ot` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`operator_id`, `account_id_no`, `first_name`, `middle_name`, `last_name`, `contact_no`, `username`, `password`, `operator_schedule`, `operator_assignment`, `operator_shift`, `operator_ot`, `division`, `status`) VALUES
(1, 15, 'Dave', '', 'Gomez', 2147483647, 'dave', 'dave', 'Tuesday', '', '8AM-5PM', '9-10 AM', 'Pre-Press', 1),
(2, 10, 'asdss', 'asd', 'asd', 0, 'asdss', 'asd', 'Wednesday', '', '8AM-5PM', '9-10 AM', 'Pre-Press', 1),
(3, 12, 'FInance', 'asd', 'asd', 0, 'asdad', 'asdada', 'Monday', 'asd', '8AM-5PM', '8-9 AM', 'Pre-Press', 0),
(4, 11111, 'Mikko', '', 'asdasd', 2147483647, 'asda', 'asda', 'Monday', '', '8AM-5PM', '8-9 AM', 'Pre-Press', 0);

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
(1, 'operator', '1234'),
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
(1, 'prodass', '1234'),
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
(1, 'prodhead', '1234'),
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
(2, 'prodplan', '1234'),
(1, 'prodplan', '1234'),
(2, 'prodplan', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `project_run_schedule`
--

CREATE TABLE `project_run_schedule` (
  `project_run_no` int(11) NOT NULL,
  `job_order_control_no` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `pre-press_start_date` date NOT NULL,
  `pre-press_end_date` date NOT NULL,
  `press_start_date` date NOT NULL,
  `press_end_date` date NOT NULL,
  `post-press_start_date` date NOT NULL,
  `post-press_end_date` date NOT NULL,
  `machine_id` varchar(100) NOT NULL,
  `machine_status` varchar(40) NOT NULL,
  `operator_name` varchar(40) NOT NULL,
  `pending_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_run_schedule`
--

INSERT INTO `project_run_schedule` (`project_run_no`, `job_order_control_no`, `start_date`, `end_date`, `pre-press_start_date`, `pre-press_end_date`, `press_start_date`, `press_end_date`, `post-press_start_date`, `post-press_end_date`, `machine_id`, `machine_status`, `operator_name`, `pending_status`) VALUES
(1, 3, '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-01', 'asd', 'Available', 'Dave', '0'),
(2, 8, '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-01', '2019-01-02', '2019-01-01', '2019-02-01', '2020-01-01', 'Generator', 'Available', 'Dave', '1'),
(3, 1, '2019-12-25', '2019-12-31', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requisition`
--

CREATE TABLE `purchase_requisition` (
  `purchase_requisition_no` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `quantity` int(25) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `unit_price` int(25) NOT NULL,
  `total` int(25) NOT NULL,
  `tentative_delivery_date` date NOT NULL,
  `actual_delivery_date` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_requisition`
--

INSERT INTO `purchase_requisition` (`purchase_requisition_no`, `date`, `item_name`, `quantity`, `unit`, `unit_price`, `total`, `tentative_delivery_date`, `actual_delivery_date`, `status`) VALUES
(1, '2019-10-09 03:08:43', 'Inksssa', 12, 'Kilogram', 1212, 12, '2019-10-16', '2019-10-09', 'Disapproved'),
(2, '2019-12-08 22:35:19', 'Inks', 1, 'Kilogram', 1, 1, '2019-01-01', '2019-01-01', 'Pending'),
(3, '2019-12-09 07:58:37', 'Inks', 123, 'Kilogram', 123, 123, '2019-12-09', '2019-12-10', 'Pending');

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
(1, 'qqq', 'q', 2147483647, 'q@asd', 'q', 2147483647, 'q', 'Outsource', 'q', 0, 'q', 'q', 'q', 'q', 'q', 'q', 0),
(2, 'aaaa', 'a', 2147483647, 'a@ASDASD', 'a', 2147483647, 'a', 'a', 'a', 0, 'aa', 'aasd', 'a', 'a', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE `tbl_useraccounts` (
  `ua_id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
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

INSERT INTO `tbl_useraccounts` (`ua_id`, `uname`, `pass`, `email`, `user_type`, `fname`, `mname`, `lname`, `division`, `status`) VALUES
(1, 'miks', 'miks', '', '1', 'Miks', '', 'John', '', 0),
(2, 'prodhead', 'prodhead', '', '2', 'Miks', '', 'John', '', 0),
(3, 'prodass', 'prodass', '', '3', 'Miks', '', 'John', '', 0),
(4, 'prodplan', 'prodplan', '', '4', 'Miks', '', 'John', '', 0),
(5, 'divsup', 'divsup', '', '5', 'Miks', '', 'John', '', 0),
(7, 'miksssss', 'mikss', '', '7', 'Miks', '', 'John', '', 0),
(9, 'miksss', 'miks', '', '1', 'Miks', '', 'John', '', 0),
(10, 'mikss', 'miks', '', '1', 'Miks', '', 'John', 'admin', 0),
(11, 'miksa', 'miks', '', '3', 'Miks', '', 'John', 'admin', 0),
(12, 'miksas', 'mik', '', '2', 'Miks', '', 'John', 'admin', 0),
(13, 'al', 'al', '', '2', 'al', '', 'al', '', 1),
(15, 'asd', 'asd', '', '2', 'asds', 'asd', 'asd', '', 0),
(16, 'qwes', 'qwe', '', '2', 'qwe', 'qwe', 'qwe', '', 0),
(17, 'qwesa', 'qwe', '', '2', 'qwe', 'qwe', 'qwe', '', 0),
(18, 'qwe', 'qwe', '', '2', 'qwe', 'qweq', 'qwe', '', 0),
(19, 'zxc', 'zxc', '', '2', 'zxc', 'zxc', 'zzxc', '', 0),
(20, 'try', 'try', '', '2', 'try', '', 'try', '', 0),
(21, 'sige', 'sige', '', '6', 'tryule', '', 'trylan', '', 0),
(22, 'asdsa', 'asda', '', '2', 'asd', 'asd', 'asd', '', 0),
(23, 'proh', 'proh', '', '2', 'proh', '', 'proh', '', 0),
(24, 'sales', 'sales', '', '6', 'sales', '', 'sales', '', 0),
(25, 'prohe', 'prohe', '', '2', 'prohe', '', 'prohe', '', 0),
(26, 'lk', 'lk', '', '3', 'lk', 'lk', 'lk', '', 0),
(27, 'john', 'john', '', '2', 'Johnny', '', 'Johnny', '', 0),
(28, 'jo', 'jo', '', '4', 'jo', '', 'joh', '', 0),
(29, 'finance', 'finance', '', '10', 'FInance', '', 'Finance', '', 0),
(30, 'genservass', 'genservass', '', '9', 'genservass', '', 'genservass', '', 0),
(31, 'zxcvcxv', 'asd', '', '6', 'asd', 'asd', 'asd', '', 0),
(32, 'mik', 'asd', 'mik@gmail.com', '2', 'Mikko', '', 'asd', '', 0);

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
(1, 'Miks', '123', '123', '123', 123, 123, '123', 'Pending'),
(2, 'qwe', 'qwe', 'qwe', 'qwe', 0, 123, 'qwe', 'qwe'),
(3, 'lknlkj', 'lkj', 'lkj', 'lkj', 0, 123, 'kjl', 'kjlkj'),
(4, 'kjhjk', 'hkjh', 'kjh', 'kj', 0, 123, 'kjh', 'kjh'),
(5, 'lknlk', 'lkjlk', 'jkl', 'jlk', 0, 123, 'lkj', 'lkjkljkl'),
(6, 'asdas', 'llk', 'lk', 'lk', 0, 12, 'lkk', 'Pending');

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
(1, 'mik', '2', '2019-12-16 13:44:29', 'Reset Password Account'),
(2, 'mik', '2', '2019-12-16 13:46:35', 'Reset Password Account'),
(3, 'mik', '2', '2019-12-16 13:46:42', 'Forgot Password Account');

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE `work_order` (
  `work_order_no` int(25) NOT NULL,
  `proj_name` varchar(25) NOT NULL,
  `job_desc` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `instruction` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_order`
--

INSERT INTO `work_order` (`work_order_no`, `proj_name`, `job_desc`, `s_name`, `instruction`, `date_created`, `status`) VALUES
(1, '1', 'qwe', 'qw', 'asd', '2019-10-07', '1'),
(2, '1', 'qwe', 'iuy', 'iuy', '2019-10-07', 'Disapproved'),
(3, '2', 'qwes', 'qqq', 'qwe', '2019-10-07', 'Approved'),
(4, '123', '123', '123', '123', '2019-10-07', 'Approved'),
(5, '123', 'askdj', 'kj', 'kj', '2019-10-09', 'Pending'),
(6, '8989', 'jajaja', 'jajaj', 'jajaj', '2019-10-09', 'Pending'),
(7, '0', 'jkl', 'jk', 'jklj', '2019-10-09', 'Pending'),
(8, '0', 'hkj', 'hkjh', 'kjh', '2019-10-09', 'Pending'),
(9, '0', 'kjh', 'kjh', 'jhkjh', '2019-10-09', 'Pending'),
(10, '0', 'kjh', 'asd', 'asd', '2019-10-28', 'Pending'),
(11, '3', 'asd', 'qqq', 'lk', '2019-12-01', 'Pending'),
(12, '1', 'qwes', 'Qqq', 'asdasdasd', '2019-12-09', 'Pending'),
(13, '1', 'asdad', 'Qqq', 'asdads', '2019-12-09', 'Pending'),
(14, '1', 'ew', 'Qqq', 'werwr', '2019-12-09', 'Pending'),
(15, '1', 'qwes', 'Qqq', 'asdasdasd', '2019-12-09', 'Pending');

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
  ADD PRIMARY KEY (`job_order_control_no`),
  ADD UNIQUE KEY `sales_number` (`sales_number`);

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
-- Indexes for table `machine_loading`
--
ALTER TABLE `machine_loading`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `material_estimation`
--
ALTER TABLE `material_estimation`
  ADD PRIMARY KEY (`estimation_id`);

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
-- Indexes for table `project_run_schedule`
--
ALTER TABLE `project_run_schedule`
  ADD PRIMARY KEY (`project_run_no`),
  ADD UNIQUE KEY `job_order_control_no` (`job_order_control_no`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `job_order_control_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_ticket`
--
ALTER TABLE `job_ticket`
  MODIFY `ticket_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `machine_loading`
--
ALTER TABLE `machine_loading`
  MODIFY `machine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_estimation`
--
ALTER TABLE `material_estimation`
  MODIFY `estimation_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_request_form`
--
ALTER TABLE `material_request_form`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `operator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `project_run_schedule`
--
ALTER TABLE `project_run_schedule`
  MODIFY `project_run_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_requisition`
--
ALTER TABLE `purchase_requisition`
  MODIFY `purchase_requisition_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ua_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `trasmittal`
--
ALTER TABLE `trasmittal`
  MODIFY `transmittal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_action`
--
ALTER TABLE `user_action`
  MODIFY `user_action_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_order`
--
ALTER TABLE `work_order`
  MODIFY `work_order_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
