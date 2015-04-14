-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 05:55 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `the_lending_list`
--
CREATE DATABASE IF NOT EXISTS `the_lending_list` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `the_lending_list`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Apr 14, 2015 at 12:53 AM
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img_src` varchar(64) NOT NULL,
  `date` varchar(64) NOT NULL,
  `event_url` varchar(64) NOT NULL,
  `location` varchar(64) NOT NULL,
  `createdBy` varchar(64) NOT NULL,
  `delBy` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `month` tinyint(2) NOT NULL,
  `day` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `img_src`, `date`, `event_url`, `location`, `createdBy`, `delBy`, `active`, `month`, `day`) VALUES
(1, 'New Year', '_.png', 'Jan 1', 'http://', 'Worldwide', 'Gilles', '', 1, 1, 1),
(2, 'Christmas', '__.png', 'Dec 25', 'http://', 'Worldwide', 'Gilles', '', 1, 12, 25),
(3, 'Presentation', '___.png', 'Apr 15', 'http://', 'iAcademy', 'Gilles', '', 1, 4, 15),
(4, 'Dragon Hunting', '____.png', 'Apr 18', 'http://', 'iAcademy', 'Gilles', '', 1, 4, 18),
(5, 'Someone''s Birthday', 'asdafsa.png', 'Apr 20', 'http://', 'Somewhere', 'Gilles', '', 1, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--
-- Creation: Apr 14, 2015 at 05:07 AM
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `answer`) VALUES
(1, 'How do I start lending my figures?', 'Achieve the legendary super-saiyan state.'),
(2, 'So what else do I put here?', 'Ehhh. I don''t think anyone will be asking questions anyway, so...'),
(3, 'Why is everything green?', 'I like green. :c');

-- --------------------------------------------------------

--
-- Table structure for table `lending_list`
--
-- Creation: Apr 14, 2015 at 03:22 PM
--

DROP TABLE IF EXISTS `lending_list`;
CREATE TABLE IF NOT EXISTS `lending_list` (
  `pk_lending_list` int(3) NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(30) NOT NULL,
  `scale` varchar(30) NOT NULL,
  `figure_name` varchar(64) DEFAULT NULL,
  `days` int(1) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `Name` varchar(64) NOT NULL,
  PRIMARY KEY (`pk_lending_list`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lending_list`
--

INSERT INTO `lending_list` (`pk_lending_list`, `manufacturer`, `scale`, `figure_name`, `days`, `comments`, `Name`) VALUES
(1, 'GSC', 'Large', 'Tomoe Mami', 2, '', ''),
(2, 'GSC', 'Large', 'MElissa', 2, '', ''),
(3, 'GSC', 'Small', 'Marisa', 1, '', ''),
(4, 'Alter', 'Articulated', 'Figma Akiyama Mio', 1, '', ''),
(5, 'Amakuni', 'Aoshima', 'Akizuki', 1, '', ''),
(6, 'Aniplex', 'Large', 'Tomoe Mami', 2, '', ''),
(7, 'Cospa', 'Other', 'Honey Baton', 1, '', ''),
(8, 'sfdukh', 'iuyh', 'kjh', 2, '', ''),
(9, 'Sega', 'Bla', 'ksjda', 1, '', ''),
(10, 'Fleur Andersen', 'Small', 'Ada Tan', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lending_list_requirements`
--
-- Creation: Apr 08, 2015 at 02:18 AM
--

DROP TABLE IF EXISTS `lending_list_requirements`;
CREATE TABLE IF NOT EXISTS `lending_list_requirements` (
  `requirements_pk` int(11) NOT NULL AUTO_INCREMENT,
  `req_large` int(2) NOT NULL,
  `req_small` int(2) NOT NULL,
  `req_articulated` int(2) NOT NULL,
  `theme` varchar(250) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`requirements_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lending_list_requirements`
--

INSERT INTO `lending_list_requirements` (`requirements_pk`, `req_large`, `req_small`, `req_articulated`, `theme`, `comment`) VALUES
(1, 2, 4, 12, 'Hula', 'Blah'),
(2, 23, 31, 12, 'Matsuri', 'Something');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--
-- Creation: Apr 12, 2015 at 04:34 AM
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ImageURL` varchar(64) DEFAULT NULL,
  `Creator` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `delBy` varchar(64) NOT NULL,
  `tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `Title`, `Content`, `Date`, `ImageURL`, `Creator`, `active`, `delBy`, `tags`) VALUES
(1, 'The Quick Brown Fox', 'I AM THE QUICK BROWN FOX.\r\n\r\nOH YES I AM.\r\n\r\nLOOK AT ME.\r\n\r\nSO QUICK.\r\n\r\nSO, SO QUICK.', '2015-04-12 13:01:51', '10362fd7dcfc422ec07283e72c199583-d46rfrb.jpg', 'Gilles', 0, '', 'fox quick'),
(2, 'Gregor Samsa', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What''s happened to me?" he thought. It wasn''t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad. "How about if I sleep a little bit longer and forget all this nonsense", he thought, but that was something he was unable to do because he was used to sleeping on his right, and in his present state couldn''t get into that position. However hard he threw himself onto his right, he always rolled back to where he was. ', '2015-04-14 16:46:13', 'gregor.jpg', 'Gilles', 1, '', 'gregor samsa bug kafka'),
(3, 'Sweet Serendipity', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. \r\n\r\nI should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath of that universal love which bears and sustains us, as it floats around us in an eternity of bliss; and then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing--\r\n\r\n--Oh, would I could describe these conceptions, could impress upon paper all that is living so full and warm within me, that it might be the mirror of my soul, as my soul is the mirror of the infinite God! O my friend -- but it is too much for my strength -- I sink under the weight of the splendour of these visions! A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. \r\n\r\nI am so happy, my dear friend.', '2015-04-12 12:56:33', 'serendipity.jpg', 'Gilles', 1, '', 'life sweet yolo'),
(4, '', 'asd', '2015-04-14 16:43:23', '', 'Gilles', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_hl`
--
-- Creation: Apr 09, 2015 at 01:37 PM
--

DROP TABLE IF EXISTS `news_hl`;
CREATE TABLE IF NOT EXISTS `news_hl` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `img_url` varchar(64) NOT NULL,
  `createdBy` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news_hl`
--

INSERT INTO `news_hl` (`id`, `title`, `img_url`, `createdBy`) VALUES
(2, '', '800x250.gif', 'tk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 14, 2015 at 08:59 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `Name` varchar(64) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `date_joined` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `idHolder` tinyint(1) NOT NULL DEFAULT '0',
  `full_name` varchar(64) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `user_img` varchar(64) NOT NULL,
  `fb_url` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `tmp_uname` varchar(64) NOT NULL,
  `tmp_pword` varchar(64) NOT NULL,
  `createdby` varchar(64) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Password`, `date_joined`, `admin`, `idHolder`, `full_name`, `contact_number`, `user_img`, `fb_url`, `email`, `tmp_uname`, `tmp_pword`, `createdby`, `active`) VALUES
(1, 'tk', 'fc3d8e29f718fc02e7d3314778553f29', '', 1, 1, 'asd', '9152786298', '2.png', 'tkmdrhtt', 'tkmdrhtt@yahoo.com', 'gilles', 'cgallego', 'Gilles', 1),
(2, NULL, NULL, '', 0, 0, '', '', '', '', '', 'tempUser', '5f4dcc3b5aa765d61d8327deb882cf99', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
