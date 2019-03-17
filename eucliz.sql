-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2019 at 09:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eucliz`
--

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE `ques` (
  `number` int(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `question` text,
  `answer` varchar(250) NOT NULL,
  `no_of_users` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`number`, `title`, `question`, `answer`, `no_of_users`) VALUES
(1, 'Amicable numbers', 'Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).\r\nIf d(a) = b and d(b) = a, where a ? b, then a and b are an amicable pair and each of a and b are called amicable numbers.\r\n\r\nFor example, the pr', '852810', 0),
(2, 'Longest Collatz Sequence', 'The following iterative sequence is defined for the set of positive integers:\r\n\r\nn ? n/2 (n is even)\r\nn ? 3n + 1 (n is odd)\r\n\r\nUsing the rule above and starting with 13, we generate the following sequence:\r\n\r\n13 ? 40 ? 20 ? 10 ? 5 ? 16 ? 8 ? 4 ? 2 ? 1\r\nIt can be seen that this sequence (starting at 13 and finishing at 1) contains 10 terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.\r\n\r\nWhich starting number, under one million, produces the longest chain?\r\n\r\nNOTE: Once the chain starts the terms are allowed to go above one million.', '837799', 1),
(3, 'Factorial Digit Sum', 'n! means n × (n ? 1) × ... × 3 × 2 × 1\r\n\r\nFor example, 10! = 10 × 9 × ... × 3 × 2 × 1 = 3628800,\r\nand the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.\r\n\r\nFind the sum of the digits in the number 100!', '648', 0),
(4, 'Coin Sums', 'In England the currency is made up of pound, £, and pence, p, and there are eight coins in general circulation:\r\n\r\n1p, 2p, 5p, 10p, 20p, 50p, £1 (100p) and £2 (200p).\r\nIt is possible to make £2 in the following way:\r\n\r\n1×£1 + 1×50p + 2×20p + 1×5p + 1', '73682', 0),
(5, 'Distinct Powers', 'Consider all integer combinations of ab for 2 ? a ? 5 and 2 ? b ? 5:\r\n\r\n22=4, 23=8, 24=16, 25=32\r\n32=9, 33=27, 34=81, 35=243\r\n42=16, 43=64, 44=256, 45=1024\r\n52=25, 53=125, 54=625, 55=3125\r\nIf they are then placed in numerical order, with any repeats ', '9183', 1),
(6, 'Prime Permutations', 'The arithmetic sequence, 1487, 4817, 8147, in which each of the terms increases by 3330, is unusual in two ways: (i) each of the three terms are prime, and, (ii) each of the 4-digit numbers are permutations of one another.\r\n\r\nThere are no arithmetic ', '296962999629', 0),
(7, 'Consecutive prime sum', 'The prime 41, can be written as the sum of six consecutive primes:\r\n\r\n41 = 2 + 3 + 5 + 7 + 11 + 13\r\nThis is the longest sum of consecutive primes that adds to a prime below one-hundred.\r\n\r\nThe longest sum of consecutive primes below one-thousand that', '997651', 0),
(8, 'Powerful digit sum', 'A googol (10^100) is a massive number: one followed by one-hundred zeros; 100^100 is almost unimaginably large: one followed by two-hundred zeros. Despite their size, the sum of the digits in each number is only 1.\r\n', '972', 0),
(9, 'Goldbach\'s other conjecture', 'It was proposed by Christian Goldbach that every odd composite number can be written as the sum of a prime and twice a square.\r\n\r\n\\(9 = 7 + 2×1^2\\)\r\n\\(15 = 7 + 2×2^2\\)\r\n\\(21 = 3 + 2×3^2\\)\r\n\\(25 = 7 + 2×3^2\\)\r\n\\(27 = 19 + 2×2^2\\)\r\n\\(33 = 31 + 2×1^2\\)\r\n\r\nIt turns out that the conjecture was false.\r\n\r\nWhat is the smallest odd composite that cannot be written as the sum of a prime and twice a square?', '5777', 0);

-- --------------------------------------------------------

--
-- Table structure for table `solved_check`
--

CREATE TABLE `solved_check` (
  `username` varchar(50) DEFAULT NULL,
  `ques_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solved_check`
--

INSERT INTO `solved_check` (`username`, `ques_number`) VALUES
('0', 5),
('harshit', 5),
('harshit', 2),
('harshit', 4),
('aa', 2),
('a', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` int(2) NOT NULL,
  `points` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `admin`, `points`) VALUES
('a', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 0, 5),
('aa', '961b6dd3ede3cb8ecbaacbd68de040cd78eb2ed5889130cceb4c49268ea4d506', 0, 5),
('harshit', '312433c28349f63c4f387953ff337046e794bea0f9b9ebfcb08e90046ded9c76', 0, 10),
('hars', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 0),
('phantom_webacker', 'a6b316cab1a87ae0cd0fc824682d3abfcd8fd637394a3e4b6dee571c38b2d244', 1, 0),
('phantom', 'a6b316cab1a87ae0cd0fc824682d3abfcd8fd637394a3e4b6dee571c38b2d244', 0, 0),
('kp', 'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b', 0, 0),
('karan', 'f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ques`
--
ALTER TABLE `ques`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ques`
--
ALTER TABLE `ques`
  MODIFY `number` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
