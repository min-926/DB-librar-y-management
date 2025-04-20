-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 02:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eb_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `password`, `first_name`, `second_name`, `address`) VALUES
(123, '12345', 'min', 'meng', '123456'),
(12345, '12345', 'min', 'meng', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_receive` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(15, 'Natural Resources', 8, 'Robin Kerrod', 15, 'Marshall Cavendish Corporation', 'Marshall', '1-85435-628-3', 1997, '', '2013-12-11 06:34:27', 'New'),
(16, 'Encyclopedia Americana', 5, 'Grolier', 20, 'Connecticut', 'Grolier Incorporation', '0-7172-0119-8', 1988, '', '2013-12-11 06:36:23', 'Archive'),
(17, 'Algebra 1', 3, 'Carolyn Bradshaw, Michael Seals', 35, 'Pearson Education, Inc', 'Prentice Hall, New Jersey', '0-13-125087-6', 2004, '', '2013-12-11 06:39:17', 'Damage'),
(18, 'The Philippine Daily Inquirer', 7, '..', 3, 'Pasay City', '..', '..', 2013, '', '2013-12-11 06:41:53', 'New'),
(19, 'Science in our World', 4, 'Brian Knapp', 25, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 1996, '', '2013-12-11 06:44:44', 'Lost'),
(20, 'Literature', 9, 'Greg Glowka', 20, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 2001, '', '2013-12-11 06:47:44', 'Old'),
(21, 'Lexicon Universal Encyclopedia', 5, 'Lexicon', 10, 'Lexicon Publication', 'Pulication Inc., Lexicon', '0-7172-2043-5', 1993, '', '2013-12-11 06:49:53', 'Old'),
(22, 'Science and Invention Encyclopedia', 5, 'Clarke Donald, Dartford Mark', 16, 'H.S. Stuttman inc. Publishing', 'Publisher , Westport Connecticut', '0-87475-450-x', 1992, '', '2013-12-11 06:52:58', 'New'),
(23, 'Integrated Science Textbook ', 4, 'Merde C. Tan', 15, 'Vibal Publishing House Inc.', '12536. Araneta Avenue Corner Ma. Clara St., Quezon City', '971-570-124-8', 2009, '', '2013-12-11 06:55:27', 'New'),
(24, 'Algebra 2', 3, 'Glencoe McGraw Hill', 15, 'The McGrawHill Companies Inc.', 'McGrawhill', '978-0-07-873830-2', 2008, '', '2013-12-11 06:57:35', 'New'),
(25, 'Wiki at Panitikan ', 7, 'Lorenza P. Avera', 28, 'JGM & S Corporation', 'JGM & S Corporation', '971-07-1574-7', 2000, '', '2013-12-11 06:59:24', 'Damage'),
(26, 'English Expressways TextBook for 4th year', 9, 'Virginia Bermudez Ed. O. et al', 23, 'SD Publications, Inc.', 'Gregorio Araneta Avenue, Quezon City', '978-971-0315-33-8', 2007, '', '2013-12-11 07:01:25', 'New'),
(27, 'Asya Pag-usbong Ng Kabihasnan ', 8, 'Ricardo T. Jose, Ph . D.', 21, 'Vibal Publishing House Inc.', 'Araneta Avenue . Cor. Maria Clara St., Quezon City', '971-07-2324-3', 2008, '', '2013-12-11 07:02:56', 'New'),
(28, 'Literature (the readers choice)', 9, 'Glencoe McGraw Hill', 20, '..', 'the McGrawHill Companies Inc', '0-02-817934-x', 2001, '', '2013-12-11 07:05:25', 'Damage'),
(29, 'Beloved a Novel', 9, 'Toni Morrison', 13, '..', 'Alfred A. Knoff, Inc', '0-394-53597-9', 1987, '', '2013-12-11 07:07:02', 'Old'),
(30, 'Silver Burdett Engish', 2, 'Judy Brim', 12, 'Silver Burdett Company', 'Silver', '0-382-03575-5', 1985, '', '2013-12-11 09:22:50', 'Old'),
(31, 'The Corporate Warriors (Six Classic Cases in American Business)', 8, 'Douglas K. Ramsey', 8, 'Houghton Miffin Company', '..', '0-395-35487-0', 1987, '', '2013-12-11 09:25:32', 'Old'),
(32, 'Introduction to Information System', 9, 'Cristine Redoblo', 10, 'CHMSC', 'Brian INC', '123-132', 2013, '', '2014-01-17 19:00:10', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `book_id` int(11) NOT NULL,
  `libraryCardID` bigint(50) NOT NULL,
  `date_borrow` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `date_return` date DEFAULT NULL,
  `borrow_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`book_id`, `libraryCardID`, `date_borrow`, `due_date`, `date_return`, `borrow_status`) VALUES
(15, 52, '2025-01-23', '2025-02-22', NULL, ''),
(20, 52, '2025-01-23', '2025-02-22', NULL, ''),
(32, 55, '2025-04-19', '2025-05-19', NULL, ''),
(45, 60, '2025-02-23', '2025-03-25', '2025-03-01', '');

--
-- Triggers `borrow`
--
DELIMITER $$
CREATE TRIGGER `set_due_date_before_insert` BEFORE INSERT ON `borrow` FOR EACH ROW IF NEW.due_date IS NULL THEN
  SET NEW.due_date = DATE_ADD(NEW.date_borrow, INTERVAL 30 DAY);
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `classname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `librarybranch`
--

CREATE TABLE `librarybranch` (
  `branchid` varchar(50) NOT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarybranch`
--

INSERT INTO `librarybranch` (`branchid`, `location`) VALUES
('easr cobb', '123 marietta'),
('easr cobb', '123 marietta'),
('midtown', '10th str, atlanta'),
('midtown', '10th str, atlanta');

-- --------------------------------------------------------

--
-- Table structure for table `lost_book`
--

CREATE TABLE `lost_book` (
  `Book_ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Member_No` varchar(50) NOT NULL,
  `Date Lost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fname`, `lname`, `email`, `message`, `created_at`) VALUES
(1, 'Chen', 'Ma', 'minmeng926@gmail.com', '123456', '2025-04-18 18:56:57'),
(7, 'Minjuan', 'Meng', 'minmeng926@gmail.com', '123', '2025-04-19 15:15:17'),
(8, 'Minjuan', 'Meng', 'minmeng926@gmail.com', '123', '2025-04-19 21:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `patron`
--

CREATE TABLE `patron` (
  `libraryCardID` int(11) NOT NULL,
  `Password` char(10) DEFAULT NULL,
  `cardexpire` date DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zipcode` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`libraryCardID`, `Password`, `cardexpire`, `firstname`, `lastname`, `phone`, `email`, `street`, `city`, `state`, `zipcode`) VALUES
(12, 'P323456787', '2026-03-14', 'Charlie', 'Brown', '3456789012', 'charlie@example.com', '56 Elm St', 'Peoria', 'IL', '61614'),
(13, 'P423456786', '2026-11-30', 'Daisy', 'Williams', '4567890123', 'daisy@example.com', '78 Cedar Blvd', 'Rockford', 'IL', '61101'),
(14, 'P523456785', '2026-12-05', 'Ethan', 'Davis', '5678901234', 'ethan@example.com', '90 Pine Rd', 'Naperville', 'IL', '60540'),
(15, 'P623456784', '2026-08-09', 'Fiona', 'Garcia', '6789012345', 'fiona@example.com', '11 Birch Ln', 'Evanston', 'IL', '60201'),
(16, 'P723456783', '2026-04-19', 'George', 'Martinez', '7890123456', 'george@example.com', '22 Spruce St', 'Aurora', 'IL', '60505'),
(17, 'P823456782', '2026-01-27', 'Hannah', 'Lopez', '8901234567', 'hannah@example.com', '33 Willow Dr', 'Elgin', 'IL', '60120'),
(18, 'P923456781', '2026-06-16', 'Ian', 'Gonzalez', '9012345678', 'ian@example.com', '44 Poplar Ct', 'Waukegan', 'IL', '60085'),
(19, 'P023456780', '2026-10-12', 'Julia', 'Hernandez', '0123456789', 'julia@example.com', '55 Ash Way', 'Cicero', 'IL', '60804'),
(20, 'P113456789', '2026-02-25', 'Kevin', 'Clark', '1029384756', 'kevin@example.com', '66 Palm St', 'Joliet', 'IL', '60435'),
(21, 'P213456788', '2026-07-07', 'Lily', 'Lewis', '1092837465', 'lily@example.com', '77 Redwood Rd', 'Decatur', 'IL', '62521'),
(22, 'P313456787', '2026-05-18', 'Mason', 'Walker', '9876543210', 'mason@example.com', '88 Cherry Ave', 'Bloomington', 'IL', '61701'),
(23, 'P413456786', '2026-09-28', 'Nora', 'Young', '8765432109', 'nora@example.com', '99 Fir Ln', 'Champaign', 'IL', '61820'),
(24, 'P513456785', '2026-03-08', 'Owen', 'Allen', '7654321098', 'owen@example.com', '100 Sycamore St', 'Berwyn', 'IL', '60402'),
(25, 'P613456784', '2026-12-12', 'Paula', 'King', '6543210987', 'paula@example.com', '101 Juniper Way', 'Skokie', 'IL', '60076'),
(26, 'P713456783', '2026-01-15', 'Quincy', 'Wright', '5432109876', 'quincy@example.com', '102 Larch Ct', 'Des Plaines', 'IL', '60016'),
(27, 'P813456782', '2026-06-06', 'Rosa', 'Scott', '4321098765', 'rosa@example.com', '103 Magnolia Blvd', 'Oak Lawn', 'IL', '60453'),
(28, 'P913456781', '2026-11-22', 'Sean', 'Green', '3210987654', 'sean@example.com', '104 Dogwood Dr', 'Palatine', 'IL', '60067'),
(29, 'P013456780', '2026-08-13', 'Tina', 'Baker', '2109876543', 'tina@example.com', '105 Alder St', 'Mount Prospect', 'IL', '60056'),
(30, 'P111456789', '2026-04-03', 'Uri', 'Nelson', '1987654321', 'uri@example.com', '106 Sequoia Ct', 'Wheaton', 'IL', '60187'),
(31, 'P211456788', '2026-02-17', 'Vera', 'Carter', '1876543210', 'vera@example.com', '107 Hickory Rd', 'Bolingbrook', 'IL', '60440'),
(32, 'P311456787', '2026-09-25', 'Will', 'Mitchell', '1765432109', 'will@example.com', '108 Beech Ln', 'Oak Park', 'IL', '60302'),
(33, 'P411456786', '2026-07-14', 'Xena', 'Perez', '1654321098', 'xena@example.com', '109 Olive Dr', 'Glenview', 'IL', '60025'),
(34, 'P511456785', '2026-10-01', 'Yusuf', 'Roberts', '1543210987', 'yusuf@example.com', '110 Chestnut St', 'Elmhurst', 'IL', '60126'),
(52, '1234', '2026-05-10', 'Alice', 'Smith', '1234567890', 'alice@example.com', '12 Oak St', 'Springfield', 'IL', '62704'),
(55, '12345', '2026-07-21', 'Bob', 'Johnson', '2345678901', 'bob@example.com', '34 Maple Ave', 'Chicago', 'IL', '60616');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `libraryCardID` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `rated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `libraryCardID`, `book_id`, `rating`, `rated_at`) VALUES
(1, 52, 0, 2, '2025-04-19 20:19:10'),
(2, 52, 0, 3, '2025-04-19 20:21:11'),
(3, 52, 0, 1, '2025-04-19 20:22:46'),
(4, 52, 0, 5, '2025-04-19 20:22:52'),
(5, 52, 0, 2, '2025-04-19 20:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zipcode` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `branch`, `firstname`, `lastname`, `phone`, `email`, `street`, `city`, `state`, `zipcode`) VALUES
(101, 'Main Branch', 'Alice', 'Johnson', '5551234567', 'alice.johnson@example.com', '123 Elm St', 'Springfield', 'IL', '62704'),
(102, 'East Branch', 'Bob', 'Smith', '5552345678', 'bob.smith@example.com', '456 Oak Ave', 'Fairview', 'TX', '75069'),
(103, 'West Branch', 'Carol', 'Davis', '5553456789', 'carol.davis@example.com', '789 Pine Rd', 'Rivertown', 'NY', '12065'),
(104, 'North Branch', 'David', 'Lee', '5554567890', 'david.lee@example.com', '321 Maple Ln', 'Greenville', 'SC', '29601'),
(105, 'South Branch', 'Eva', 'Martinez', '5555678901', 'eva.martinez@example.com', '654 Birch Blvd', 'Sunnydale', 'CA', '91001'),
(106, 'Main Branch', 'Frank', 'Nguyen', '5556789012', 'frank.nguyen@example.com', '987 Cedar Ct', 'Metroville', 'WA', '98052'),
(107, 'East Branch', 'Grace', 'Kim', '5557890123', 'grace.kim@example.com', '159 Walnut Way', 'Hillview', 'KY', '40201'),
(108, 'West Branch', 'Henry', 'Wilson', '5558901234', 'henry.wilson@example.com', '753 Spruce St', 'Brookfield', 'WI', '53045'),
(109, 'North Branch', 'Ivy', 'Chen', '5559012345', 'ivy.chen@example.com', '246 Aspen Pl', 'Lakeview', 'MI', '48850'),
(110, 'South Branch', 'Jack', 'Brown', '5550123456', 'jack.brown@example.com', '135 Redwood Dr', 'Clinton', 'MS', '39056'),
(111, 'Main Branch', 'Karen', 'Lopez', '5551122334', 'karen.lopez@example.com', '888 Magnolia Ave', 'Riverside', 'CA', '92501'),
(112, 'East Branch', 'Liam', 'Miller', '5552233445', 'liam.miller@example.com', '777 Ash St', 'Newport', 'RI', '02840'),
(113, 'West Branch', 'Mona', 'Adams', '5553344556', 'mona.adams@example.com', '666 Hickory Ln', 'Glenview', 'IL', '60025'),
(114, 'North Branch', 'Nate', 'Brooks', '5554455667', 'nate.brooks@example.com', '555 Willow Rd', 'Greenfield', 'IN', '46140'),
(115, 'South Branch', 'Olivia', 'Clark', '5555566778', 'olivia.clark@example.com', '444 Chestnut Blvd', 'Baytown', 'TX', '77520');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_no` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_no`, `password`, `status`) VALUES
('123', '123', 'active'),
('12345', '12345', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `borrowertype` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `borrowertype`) VALUES
(2, 'Teacher'),
(20, 'Employee'),
(21, 'Non-Teaching'),
(22, 'Student'),
(32, 'Contruction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(2, 'admin', 'admin123', 'Min', 'Meng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `libraryCardID` (`libraryCardID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD KEY `classid` (`category_id`);

--
-- Indexes for table `lost_book`
--
ALTER TABLE `lost_book`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patron`
--
ALTER TABLE `patron`
  ADD PRIMARY KEY (`libraryCardID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_no`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowertype` (`borrowertype`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `lost_book`
--
ALTER TABLE `lost_book`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
