-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 03:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `contact_no` int(25) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `company_address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `postal_code` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`job_order_control_no`, `sales_number`, `client_name`, `item_desc_and_title`, `proj_name`, `date_created`, `costing_run`, `finishing_required`, `packaging_required`, `date_to_warehouse`, `requested_delivery`, `quantity`, `size`, `pages`, `paper`, `remarks`, `status`) VALUES
(3, 1, 'lkj', 'lkj', 'lkj', '2019-10-09 01:23:41', 'lkjlkj', 'lkj', 'jh', '2019-10-10', '2019-10-25', '123', '123', '123123', 'jhgjhg', 'asdkl', 'kjlj');

-- --------------------------------------------------------

--
-- Table structure for table `job_ticket`
--

CREATE TABLE `job_ticket` (
  `job_order_control_no` int(10) NOT NULL,
  `date_time_created` datetime(6) NOT NULL,
  `machine_name` varchar(20) NOT NULL,
  `delivery_date` date NOT NULL,
  `checked_by` varchar(40) NOT NULL,
  `noted_by` varchar(40) NOT NULL,
  `client_name` varchar(40) NOT NULL,
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
  `no_of_ream` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_ticket`
--

INSERT INTO `job_ticket` (`job_order_control_no`, `date_time_created`, `machine_name`, `delivery_date`, `checked_by`, `noted_by`, `client_name`, `title`, `quantity`, `actual_size`, `pages`, `paper_cover`, `color`, `binding`, `lamination`, `remarks`, `stock_size`, `printing_size`, `start`, `finish`, `time_received`, `date_received`, `no_of_out`, `no_of_sheet`, `no_of_ream`) VALUES
(1, '2019-10-10 09:31:09.000000', 'gen', '2019-10-11', 'khjk', 'jkh', 'jkh', 'hj', '12', '12', 'kjh', 'kjh', 'kjh', 'kjh', 'jkh', 'jkh', 0, 0, '2019-10-10', '2019-10-17', '02:01', '2019-10-16', 21, 12, 12);

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
(18, 'Generators', 'Electricity', '123', '123', '1', '123', '100', 'klj'),
(19, 'lk', 'lk', 'lk', 'lkl', 'klk', 'lk', 'lk', 'lkl'),
(20, 'qwe', 'qwe', '0', '0', '0', '0', '0', 'qwe'),
(21, ',mn', ',mn', '0', '0', '0', '0', '0', 'n,m'),
(22, 'jhjhg', 'jhgjhg', '0', '0', '0', '0', '0', 'gjhg'),
(23, 'vbvbvbbv', 'vb', '0', '0', '0', '0', '0', 'bvvb'),
(24, 'gengen', 'asd', '0', '0', '0', '0', '0', 'vy'),
(25, 'zxcyy', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc'),
(26, 'Machine', 'mach', '34', '231', '123', '12', '12', 'asda');

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
  `size` int(25) NOT NULL,
  `unit_of_measure` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `item_name`, `item_desc`, `category`, `quantity`, `size`, `unit_of_measure`) VALUES
(1, 'oiuoi', 'oiuiuoiuoiu', 'iouo', 123, 0, 0);

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
  `date` datetime(6) NOT NULL,
  `delivery_date` datetime(6) NOT NULL,
  `pending_status` varchar(20) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_request_form`
--

INSERT INTO `material_request_form` (`request_id`, `job_order_control_no`, `no_of_reams`, `paper_size`, `kind_of_paper`, `quantity`, `date`, `delivery_date`, `pending_status`, `remarks`) VALUES
(1, 3232, 123, 123, 'kl', 123, '2019-10-09 00:00:00.000000', '2019-10-04 00:00:00.000000', 'jhjkh', 'kjhkjh');

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
  `operator_schedule` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `secondary_services` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `division` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`ua_id`, `uname`, `pass`, `user_type`, `fname`, `mname`, `lname`, `division`) VALUES
(1, 'admin', 'admin', '1', 'Admin', '', '', ''),
(2, 'prodhead', 'prodhead', '2', '', '', '', ''),
(3, 'prodass', 'prodass', '3', 'Prod Ass', '', '', ''),
(4, 'prodplan', 'prodplan', '4', '', '', '', ''),
(5, 'divsup', 'divsup', '5', '', '', '', ''),
(6, 'sales', 'sales', '6', '', '', '', ''),
(7, 'operator', 'operator', '7', '', '', '', ''),
(8, 'admin', 'admin2', '1', '', '', '', ''),
(9, '', '', '1', '', '', '', ''),
(10, 'mikjohn', 'mikjohn', '1', 'Mikko', '', 'Falcon', 'admin'),
(11, 'mik', 'mik', '3', 'Miks', '', 'John', 'admin'),
(12, 'mik', 'mik', '2', 'Mik', '', 'John', 'admin'),
(13, 'asd', 'asd', '2', 'asd', 'asd', 'asd', 'admin'),
(14, 'qwe', 'qwe', '6', 'qwe', 'qwe', 'qwe', 'admin');

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
(23, 'Admin', '1', '2019-10-10 09:31:10', 'Add Job Ticket');

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
(1, 1, 'qwe', 'qw', '2019-10-07', '0000-00-00', 'qw'),
(2, 1, 'qwe', 'iuy', 'iuy', '2019-10-07', 'iuy'),
(3, 2, 'qwe', 'qwe', 'qwe', '2019-10-07', 'qwe'),
(4, 123, '123', '123', '123', '2019-10-07', '123'),
(5, 123, 'askdj', 'kj', 'kj', '2019-10-09', 'kj'),
(6, 8989, 'jajaja', 'jajaj', 'jajaj', '2019-10-09', 'ajja'),
(7, 0, 'jkl', 'jk', 'jklj', '2019-10-09', 'kjkl'),
(8, 0, 'hkj', 'hkjh', 'kjh', '2019-10-09', 'kjh'),
(9, 0, 'kjh', 'kjh', 'jhkjh', '2019-10-09', 'kkjh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`job_order_control_no`);

--
-- Indexes for table `job_ticket`
--
ALTER TABLE `job_ticket`
  ADD PRIMARY KEY (`job_order_control_no`);

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
-- Indexes for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD PRIMARY KEY (`ua_id`);

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
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `job_order_control_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job_ticket`
--
ALTER TABLE `job_ticket`
  MODIFY `job_order_control_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `material_request_form`
--
ALTER TABLE `material_request_form`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `ua_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trasmittal`
--
ALTER TABLE `trasmittal`
  MODIFY `transmittal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_action`
--
ALTER TABLE `user_action`
  MODIFY `user_action_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `work_order`
--
ALTER TABLE `work_order`
  MODIFY `work_order_no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
