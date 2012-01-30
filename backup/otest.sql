-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2012 at 12:32 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-1ubuntu9.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `otest`
--
CREATE DATABASE `otest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `otest`;

-- --------------------------------------------------------

--
-- Table structure for table `1001`
--

CREATE TABLE IF NOT EXISTS `1001` (
  `qid` bigint(100) NOT NULL AUTO_INCREMENT,
  `ques` text NOT NULL,
  `op1` varchar(255) DEFAULT NULL,
  `op2` varchar(255) DEFAULT NULL,
  `op3` varchar(255) DEFAULT NULL,
  `op4` varchar(255) DEFAULT NULL,
  `mcq` varchar(1) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `1001`
--

INSERT INTO `1001` (`qid`, `ques`, `op1`, `op2`, `op3`, `op4`, `mcq`) VALUES
(1, 'If a five-digit number (21311) is taken as input in through a variable, write a php script to calculate the sum of its digits. (Hint: Use the modulus operator ‘%’).', '', '', '', '', 'n'),
(2, 'If a five-digit number (54212) taken as input in through a variable, write a php script to print a new number by adding one to each of its digits. For example if the number that is input is 12391 then the output should be displayed as 23402.', '', '', '', '', 'n'),
(3, 'If the ages of Ram, Shyam and Ajay are 17, 8, 10 years, write a php script to determine the youngest of the three.', '', '', '', '', 'n'),
(4, 'Give the Output of the following Script:\r\n<?php\r\n$i = 4;\r\n$z = 12 ;\r\nif ( $i = 5 || $z > 50 )\r\nprintf ( "\r\nDean of students affairs" ) ;\r\nelse\r\nprintf ( "\r\nDosa" ) ;\r\n?>', '', '', '', '', 'n'),
(5, 'Write a program using conditional operators to determine whether a year 2036 is a leap year or not.', '', '', '', '', 'n'),
(6, 'Two numbers are taken into variables 3 and 4. Write a PHP Script to find the value of 3 raised to the power of 4. Using Loops.', '', '', '', '', 'n'),
(7, 'Write a PHP script for a function to calculate the factorial value of any integer entered through by the user. Submit form using POST over the page named "ex.php".', '', '', '', '', 'n'),
(8, 'Write a recursive function to obtain the running sum of first 25 natural numbers.', '', '', '', '', 'n'),
(9, 'Give output:\r\n<?php\r\n\r\n$i = 1;\r\nwhile ($i <= 5 )\r\n{\r\n    if($i == 4)\r\n        break;\r\n\r\n    echo $i . "</br>";\r\n\r\n    $i = $i + 1;\r\n}\r\n\r\n?>', '', '', '', '', 'n'),
(10, 'Give Output:\r\n<html>\r\n<body>\r\n\r\n<?php\r\n\r\nfuntion name()\r\n{\r\n    echo " Ravi?";\r\n}\r\n\r\nfunction my_function()\r\n{\r\n    echo "Hello! How are you";\r\n    name();\r\n}\r\n\r\nmy_function();\r\n\r\n?>\r\n\r\n</body>\r\n</html>', '', '', '', '', 'n'),
(11, 'What does PHP stand for?', 'Hypertext Preprocessor', 'Private Homepage', 'Personal Hypertext Processor', 'Personal Homepage', 'y'),
(12, 'PHP server scripts are surrounded by delimiters, which?', '<?php>...</?>', '<?php....?>', '<&>...</&>', '<script>...</script>', 'y'),
(13, 'Which of the following functions is used to include a file in the php script and in case if its not present the script stops running.', 'request();', 'ask();', 'include();', 'require();', 'y'),
(14, 'Debug the Code and give given below to achieve the output as shown next. Paste the correct code in the given Text Area.\r\nCODE:\r\n<?php\r\nfor ($num=1; $num <= 10; $num++ )\r\n{\r\n    if ($num < 4)\r\n    {\r\n        print $num . " is less than 5 <br>";\r\n    }\r\n     else\r\n    {\r\n         print $num . " is not less than 5 <br>";\r\n    }   \r\n     }\r\n?>\r\n\r\nOUTPUT:\r\n1 is less than 5\r\n2 is less than 5\r\n3 is less than 5\r\n4 is less than 5\r\n5 is not less than 5\r\n6 is not less than 5\r\n7 is not less than 5\r\n8 is not less than 5\r\n9 is not less than 5\r\n10 is not less than 5\r\n', '', '', '', '', 'n'),
(15, 'How do you get information from a form that is submitted using the "get" method?', 'Request.Form;', '$_GET[];', 'Request.QueryString;', '$_POST;', 'y'),
(16, 'What is the correct way to connect to a MySQL database?', 'dbopen("localhost");', 'mysql_open("localhost");', 'mysql_connect("localhost");', 'connect_mysql("localhost");', 'y'),
(17, 'What is the correct way to add 1 to the $counter variable?', '$counter++;', 'counter++;', '++counter', '$counter =+1\r\n', 'y'),
(18, 'Which one of these variables has an illegal name?', '$myVar', '$my-Var', '$my_Var', '$d', 'y'),
(19, 'Given a point (x,y) = (3,2) write a PHP Script to find out if it lies on the x-axis, y-axis or at the origin, viz. (0,0) else display that it doesn''t lie on the axis.', '', '', '', '', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `1001A`
--

CREATE TABLE IF NOT EXISTS `1001A` (
  `ansid` bigint(100) NOT NULL AUTO_INCREMENT,
  `quesid` bigint(100) NOT NULL,
  `answer` text NOT NULL,
  `collid` bigint(100) NOT NULL,
  `studid` bigint(100) NOT NULL,
  `date` varchar(15) NOT NULL,
  PRIMARY KEY (`ansid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `1001A`
--


-- --------------------------------------------------------

--
-- Table structure for table `2001`
--

CREATE TABLE IF NOT EXISTS `2001` (
  `qid` bigint(100) NOT NULL AUTO_INCREMENT,
  `ques` text NOT NULL,
  `op1` varchar(255) DEFAULT NULL,
  `op2` varchar(255) DEFAULT NULL,
  `op3` varchar(255) DEFAULT NULL,
  `op4` varchar(255) DEFAULT NULL,
  `mcq` varchar(1) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `2001`
--

INSERT INTO `2001` (`qid`, `ques`, `op1`, `op2`, `op3`, `op4`, `mcq`) VALUES
(1, 'What is FOSS?', 'Book', 'Internet', 'Free and Open Source', 'Machine', 'y'),
(2, 'What is the full form of PHP? ', 'Hypertext Pre-Processor', 'PreProcessor', 'Hypertext', 'PreText', 'y'),
(3, 'Name the most widely used FOSS Operating System that was written by Linnus \r\nTrovalds?', '', '', '', '', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `2001A`
--

CREATE TABLE IF NOT EXISTS `2001A` (
  `ansid` bigint(100) NOT NULL AUTO_INCREMENT,
  `quesid` bigint(100) NOT NULL,
  `answer` text NOT NULL,
  `collid` bigint(100) NOT NULL,
  `studid` bigint(100) NOT NULL,
  `date` varchar(15) NOT NULL,
  PRIMARY KEY (`ansid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `2001A`
--

INSERT INTO `2001A` (`ansid`, `quesid`, `answer`, `collid`, `studid`, `date`) VALUES
(1, 1, 'C', 9999, 24, '11/01/2012'),
(2, 2, 'A', 9999, 24, '11/01/2012'),
(3, 3, 'linux', 9999, 24, '11/01/2012'),
(4, 1, 'A', 112, 23, '11/01/2012'),
(5, 2, 'A', 112, 23, '11/01/2012'),
(6, 3, 'linu', 112, 23, '11/01/2012'),
(7, 1, 'C', 112, 26, '11/01/2012'),
(8, 2, 'A', 112, 26, '11/01/2012'),
(9, 3, 'LINUX', 112, 26, '11/01/2012');

-- --------------------------------------------------------

--
-- Table structure for table `2001_ans`
--

CREATE TABLE IF NOT EXISTS `2001_ans` (
  `qid` bigint(100) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2001_ans`
--

INSERT INTO `2001_ans` (`qid`, `answer`) VALUES
(1, 'C'),
(2, 'A'),
(3, 'Linux');

-- --------------------------------------------------------

--
-- Table structure for table `keyauth`
--

CREATE TABLE IF NOT EXISTS `keyauth` (
  `tid` bigint(20) NOT NULL,
  `authkey` varchar(20) NOT NULL,
  `activated` varchar(1) NOT NULL,
  UNIQUE KEY `key` (`authkey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyauth`
--

INSERT INTO `keyauth` (`tid`, `authkey`, `activated`) VALUES
(1001, '1001ST23456799', 'y'),
(2001, '2001ST63348963', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `onlinelist`
--

CREATE TABLE IF NOT EXISTS `onlinelist` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `testcode` varchar(40) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `tduration` bigint(5) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `testcode` (`testcode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `onlinelist`
--

INSERT INTO `onlinelist` (`tid`, `testcode`, `tname`, `tduration`) VALUES
(50, '1001', 'PHP and MySQL', 45),
(85, '2001', 'FOSS Quiz', 40);

-- --------------------------------------------------------

--
-- Table structure for table `testscore`
--

CREATE TABLE IF NOT EXISTS `testscore` (
  `scoreid` bigint(10) NOT NULL AUTO_INCREMENT,
  `date` bigint(10) NOT NULL,
  `collid` bigint(10) NOT NULL,
  `studid` bigint(10) NOT NULL,
  `tid` date NOT NULL,
  `score` bigint(10) NOT NULL,
  PRIMARY KEY (`scoreid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `testscore`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint(255) NOT NULL AUTO_INCREMENT,
  `collid` bigint(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cellnum` bigint(10) NOT NULL,
  `random` bigint(100) NOT NULL,
  `flag` varchar(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `collid`, `username`, `password`, `fname`, `email`, `cellnum`, `random`, `flag`) VALUES
(15, 9999, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin Surname', 'admin@admin.com', 1122112211, 268374946, 'a'),
(23, 112, 'student', 'ad6a280417a0f533d8b670c61667e1a0', 'student', 's@s.com', 2233223322, 741122249, 's'),
(22, 9999, 'review', '20b5cc850dacb1dcc21080fd26cc519e', 'review', 'r@r.com', 1122332211, 679613975, 'r'),
(24, 9999, 'root', '63a9f0ea7bb98050796b649e85481845', 'ROOT', 'root@root.com', 1199999999, 535571018, 'a'),
(26, 112, 'ankit', 'a70ca1454267d4e4fc0bf2f130ba1a74', 'ankit bahuguna', 'netankit@gmail.com', 8877887788, 766798918, 's');
