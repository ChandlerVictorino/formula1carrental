CREATE TABLE `superadmin` (
  `superadmin_id` INT(11) NOT NULL AUTO_INCREMENT,
  `superadmin_username` VARCHAR(50) NOT NULL,
  `superadmin_password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`superadmin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `superadmin` (`superadmin_username`, `superadmin_password`) 
VALUES ('superadmin', MD5('password123'));

-- Table structure for table `admin`
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `admin`
INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Administrator', 'admin', '482c811da5d5b4bc6d497ffa98491e38');

ALTER TABLE admin ADD COLUMN admin_image VARCHAR(255);

-- Table structure for table `customer`
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL  AUTO_INCREMENT ,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_gender` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_ktp` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `mobile`
CREATE TABLE `mobile` (
  `mobile_id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_carname` varchar(30) NOT NULL,
  `mobile_plate` varchar(20) NOT NULL,
  `mobile_color` varchar(30) NOT NULL,
  `mobile_year` int(11) NOT NULL,
  `mobile_status` int(11) NOT NULL,
  PRIMARY KEY (`mobile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `transaction`
CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_employee` int(11) NOT NULL,
  `transaction_customer` int(11) NOT NULL,
  `transaction_mobile` int(11) NOT NULL,
  `transaction_tgl_borrow` date NOT NULL,
  `transaction_tgl_return` date NOT NULL,
  `transaction_price` int(11) NOT NULL,
  `transaction_fine` int(11) NOT NULL,
  `transaction_tgl` date NOT NULL,
  `transaction_totalfine` INT(11) DEFAULT 0,
  `transaction_totalreturn` int(11) NOT NULL,
  `transaction_status` int(11) NOT NULL,
  `transaction_tglreturned` date NOT NULL,
   PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
