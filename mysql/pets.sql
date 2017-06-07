-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 01:13 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pets`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients_tbl`
--

CREATE TABLE IF NOT EXISTS `clients_tbl` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `client_lastname` varchar(50) NOT NULL,
  `client_firstname` varchar(50) NOT NULL,
  `client_contactnumber` varchar(50) NOT NULL,
  `client_address` text NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees_tbl`
--

CREATE TABLE IF NOT EXISTS `employees_tbl` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `employee_username` varchar(50) NOT NULL,
  `employee_password` varchar(50) NOT NULL,
  `employee_firstname` varchar(50) NOT NULL,
  `employee_lastname` varchar(50) NOT NULL,
  `employee_contactnumber` varchar(50) NOT NULL,
  `employee_sss` varchar(50) NOT NULL,
  `employee_tin` varchar(50) NOT NULL,
  `employee_salary` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employees_tbl`
--

INSERT INTO `employees_tbl` (`id`, `type`, `is_active`, `employee_username`, `employee_password`, `employee_firstname`, `employee_lastname`, `employee_contactnumber`, `employee_sss`, `employee_tin`, `employee_salary`) VALUES
(0001, 1, 1, 'admin', '123', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `expense_salaries_and_wages`
--

CREATE TABLE IF NOT EXISTS `expense_salaries_and_wages` (
  `employee_name` varchar(150) NOT NULL,
  `overtime` varchar(150) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `total` varchar(125) NOT NULL,
  `id` int(25) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_entry_tbl`
--

CREATE TABLE IF NOT EXISTS `inventory_entry_tbl` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `is_active` int(1) NOT NULL,
  `inventory_id` int(5) unsigned zerofill NOT NULL,
  `item_quantity` int(25) NOT NULL,
  `item_expiry` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tbl`
--

CREATE TABLE IF NOT EXISTS `inventory_tbl` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `supplier_id` int(25) NOT NULL,
  `is_active` int(1) NOT NULL,
  `inventory_name` varchar(125) NOT NULL,
  `inventory_description` varchar(125) NOT NULL,
  `inventory_location` varchar(125) NOT NULL,
  `inventory_measurement` varchar(125) NOT NULL,
  `inventory_level` int(1) NOT NULL,
  `inventory_unit` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `operating_expense_list`
--

CREATE TABLE IF NOT EXISTS `operating_expense_list` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `operating_expense_name` varchar(150) NOT NULL,
  `operating_expense_fields` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `operating_expense_list`
--

INSERT INTO `operating_expense_list` (`id`, `operating_expense_name`, `operating_expense_fields`) VALUES
(1, 'Salaries and Wages', 'employee_name,overtime');

-- --------------------------------------------------------

--
-- Table structure for table `pets_tbl`
--

CREATE TABLE IF NOT EXISTS `pets_tbl` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `client_id` int(25) NOT NULL,
  `is_active` int(1) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_breed` text NOT NULL,
  `pet_species` varchar(50) NOT NULL,
  `pet_sex` varchar(10) NOT NULL,
  `pet_color` varchar(50) NOT NULL,
  `pet_microchip` text NOT NULL,
  `pet_weight` varchar(50) NOT NULL,
  `pet_birth` varchar(50) NOT NULL,
  `pet_cycle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `scheduling_tbl`
--

CREATE TABLE IF NOT EXISTS `scheduling_tbl` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `schedule_clientname` varchar(125) NOT NULL,
  `schedule_pets` text NOT NULL,
  `schedule_services` text NOT NULL,
  `schedule_dates` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE IF NOT EXISTS `services_tbl` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `is_active` int(1) NOT NULL,
  `service_name` varchar(125) NOT NULL,
  `service_details` text NOT NULL,
  `service_size` varchar(25) NOT NULL,
  `service_amount` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`id`, `is_active`, `service_name`, `service_details`, `service_size`, `service_amount`) VALUES
(0001, 1, 'Grooming Package', 'Bath + Shampoo + blowdry + ear cleaning + nail trim + sanitary trim + teeth brushing + haricut for small/medium breeds           ', 'Small/Medium', '450.00'),
(0002, 1, 'Grooming Package', 'Bath + shampoo + blowdry + ear cleaning + nail trim + sanitry trim + teeth brushing + haircut for large breeds           ', 'Large', '650.00'),
(0003, 1, 'Grooming Package', 'Bath + shampoo + blowdry + ear cleaning + nail trim + sanitary trim + teeth brushing + haircut for giant breeds           ', 'Giant', '850.00'),
(0004, 1, 'Ear Cleaning', 'Softened wax up out of the ear canals           ', 'ALL', '75.00'),
(0005, 1, 'Pet Massage', 'Massage           ', 'ALL', '200'),
(0006, 1, 'Teeth Brushing', 'Pet brushing           ', 'ALL', '75.00'),
(0007, 1, 'Eye Wash', 'Wash the eyes of the pet           ', 'ALL', '75.00'),
(0008, 0, '', '           ', 'ALL', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_tbl`
--

CREATE TABLE IF NOT EXISTS `suppliers_tbl` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `is_active` int(1) NOT NULL,
  `supplier_name` varchar(125) NOT NULL,
  `supplier_contactnumber` text NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_email` varchar(125) NOT NULL,
  `supplier_tin` varchar(25) NOT NULL,
  `supplier_type` text NOT NULL,
  `supplier_products` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers_tbl`
--

INSERT INTO `suppliers_tbl` (`id`, `is_active`, `supplier_name`, `supplier_contactnumber`, `supplier_address`, `supplier_email`, `supplier_tin`, `supplier_type`, `supplier_products`) VALUES
(0001, 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_clients_tbl`
--

CREATE TABLE IF NOT EXISTS `transactions_clients_tbl` (
  `transaction_id` int(25) NOT NULL,
  `client_id` int(25) NOT NULL,
  `pet_id` int(25) NOT NULL,
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_items_tbl`
--

CREATE TABLE IF NOT EXISTS `transactions_items_tbl` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(25) NOT NULL,
  `inventory_id` int(25) NOT NULL,
  `inventory_quantity` int(25) NOT NULL,
  `inventory_price` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_services_tbl`
--

CREATE TABLE IF NOT EXISTS `transactions_services_tbl` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(25) NOT NULL,
  `service_id` int(25) NOT NULL,
  `service_amount` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_tbl`
--

CREATE TABLE IF NOT EXISTS `transactions_tbl` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `emp_id` int(25) NOT NULL,
  `total_amount` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `type` int(1) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
