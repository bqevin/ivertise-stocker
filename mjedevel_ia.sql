-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2016 at 05:26 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mjedevel_ia`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `org_type` varchar(255) NOT NULL,
  `downloads` int(10) NOT NULL,
  `isActivated` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `fullname`, `username`, `email`, `password`, `phone`, `dob`, `gender`, `country`, `city`, `address`, `product_name`, `org_type`, `downloads`, `isActivated`, `createdAt`, `url`) VALUES
(1, 'Kevin Barasa', 'kev_barasa', 'bkevin001@yahoo.com', 'password', 2147483647, '1992-07-11', 'Male', 'Kenya', 'Nairobi', 'Ngong Road', 'Purple Flower Image ', 'CloudCore Technologies', 28, 1, '2016-01-21 17:26:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard User', '{"contributor" : 3}'),
(2, 'Administrator', '{"admin" : 1, "moderator" : 2, "contributor" : 3}'),
(3, 'Moderator', '{"moderator" : 2, "contributor" : 3}');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(100) NOT NULL,
  `Release_form` varchar(100) NOT NULL,
  `author` varchar(30) NOT NULL,
  `licence` varchar(255) NOT NULL,
  `genre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `description`, `keywords`, `category`, `price`, `title`, `createdAt`, `url`, `Release_form`, `author`, `licence`, `genre`) VALUES
(134, 'Sustainability model of KHC', 'Hackathon, iHub', 'Royalty Free', 1000, 'Beautiful  smiling girl', '2016-03-04 15:25:30', 'sustainability.jpg', 'Cytology270114.pdf', 'bkevin001@yahoo.com', '', 'images'),
(189, 'the one', 'Female', 'Rights Managed', 500, 'More headlines length test', '2016-03-04 03:56:26', 'DSC_0013.jpg', 'COVERLETTER_michael_kigotho.doc', 'bkevin001@yahoo.com', '', 'models'),
(190, 'the one', 'People', 'Rights Managed', 500, 'beauty', '2016-03-04 04:03:12', 'DSC_0175.jpg', 'COVERLETTER_michael_kigotho.doc', 'bkevin001@yahoo.com', '', 'images'),
(197, 'here', 'Male', 'Rights Managed', 700, 'fix', '2016-03-04 15:25:47', 'DSC_0008.jpg', 'COVERLETTER_michael_kigotho.doc', 'bkevin001@yahoo.com', '', 'images'),
(199, 'kn.d djkf', 'Uncategorized', 'Editorial', 48, 'Beautiful an smiling girl', '2016-03-04 04:02:52', '12747309_1138508832846493_18012372786073955_o.jpg', 'updated list wk 1.docx', 'bkevi001@yahoo.com', '', 'mua'),
(205, 'male', 'Female', 'Rights Managed', 2342, 'Lorem Ipsum for testing title length', '2016-03-04 15:44:05', 'DSC_0192.jpg', 'COVERLETTER_michael_kigotho.doc', 'oliviam146@gmail.com', '', 'models'),
(206, 'ewsadf', 'Kenyan ', 'Editorial', 324214, 'Watch me nana', '2016-03-04 04:03:21', 'DSC_0191.jpg', 'COVERLETTER_michael_kigotho.doc', '', '', 'models'),
(215, 'Test', 'Uncategorized', 'Editorial', 56, 'Lorem Ipsum for testing title length', '2016-03-04 15:26:00', '22316_976012925762752_943670883309588340_n.jpg', '21489422441-492743989-ticket.pdf', 'bkevin001@yahoo.com', '', 'photography'),
(217, 'ikjd', 'Uncategorized', 'Rights Managed', 788, 'A Beutiful smilig face', '2016-03-04 15:26:04', '12716169_978428625564888_5578770868246917783_o.jpg', '21489422441-492743989-ticket.pdf', 'bkevin001@yahoo.com', '', 'models'),
(218, 'hjjs sbdjhs dhjsbds', 'Uncategorized', 'Editorial', 789, 'Lorem Ipsum for testing title length', '2016-03-04 15:26:11', '12314444_1095738237123553_8826119529888341417_o.jpg', '21489422441-492743989-ticket.pdf', 'bkevin001@yahoo.com', '', 'photography'),
(219, 'teh ehjbejhe ', 'Uncategorized', 'Editorial', 478, 'Lorem Ipsum for testing title length', '2016-03-04 15:26:16', '12747886_1138508562846520_8005329311935459916_o.jpg', 'Untitled 8.pdf', 'bkevin001@yahoo.com', '', 'photography'),
(220, 'jhjdf', 'Uncategorized', 'Rights Managed', 4557, 'Lorem Ipsum for testing title length', '2016-03-04 15:26:22', '12771468_986703934737357_2017181109869437901_o.jpg', '21489422441-492743989-ticket.pdf', 'kanitu@yahoo.com', '', 'photography'),
(221, 'jbjjds', 'Uncategorized', 'Rights Managed', 7855, 'Lorem Ipsum for testing title length', '2016-03-04 15:26:30', '12783606_986640668077017_2631328281742590408_o.jpg', '21489422441-492743989-ticket.pdf', 'kanitu@yahoo.com', '', 'photography'),
(223, 'Giving life to the stateless lens of art', 'Kids, Camera, Close-Up', 'Royalty Free', 4500, 'Shy kid facing the lens', '2016-03-04 05:39:00', '12.jpg', 'WE CREATE KENYA Proposal.docx', 'bkevin001@yahoo.com', '', 'models'),
(224, 'Smiling kid feeling shy', 'smile, Kids ', 'Royalty Free', 120, 'Smiling kid ', '2016-03-04 06:36:13', '14.jpg', 'WE CREATE KENYA Proposal.docx', 'bkevin001@yahoo.com', '', 'models'),
(225, 'Representative of African State posing ', 'Africa, Female, smile', 'Rights Managed', 457, 'African Union banner', '2016-03-04 07:52:37', 'post_africa-umoja.jpg', '3-31.jpg', 'bkevin001@yahoo.com', '', 'models'),
(226, 'Beautiful women of Africa smiling around ', 'smile, Female, Kenyan, Close-Up', 'Editorial', 40, 'Beautiful African women', '2016-03-04 08:16:01', 'culture-year.jpg', '3.png', 'bkevin001@yahoo.com', '', 'models'),
(227, 'Unicorn if not Alien', 'smile, Female, Close-Up', 'Editorial', 10, 'Unicorn Black n White', '2016-03-04 07:55:31', 'ttm1.jpg', '3-31.jpg', 'bkevin001@yahoo.com', '', 'models'),
(228, 'He doesn''t have very powerful abs', 'smile, Male, Close-Up, Kenyan', 'Editorial', 40, 'Naked Guy Model ', '2016-03-04 08:15:41', 'MTE1ODA0OTc1MjM2Mjg1OTY1.jpg', '7.jpeg', 'bkevin001@yahoo.com', '', 'models'),
(230, 'You don''t wanna know more', 'Close-Up, smile, Cute', 'Editorial', 450, 'Eye opener ', '2016-03-04 14:24:13', 'new-makeup.jpg', '3.png', 'bkevin001@yahoo.com', '', 'mua'),
(231, 'Constructing a face', 'smile, Close-Up', 'Editorial', 45, 'Making up stuff ', '2016-03-04 14:40:29', 'makeup-expert.jpg', '3.png', 'bkevin001@yahoo.com', '', 'mua'),
(232, 'Coming up with the perfect face of an African ', 'smile, Female, Close-Up', 'Royalty Free', 780, 'Kenyan beauties made up', '2016-03-04 14:42:46', 'culture-year.jpg', '4.png', 'bkevin001@yahoo.com', '', 'mua');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `mua` varchar(20) NOT NULL,
  `photographer` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `twitter` varchar(60) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(60) NOT NULL,
  `height` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `bust` int(5) NOT NULL,
  `waist` int(5) NOT NULL,
  `eye` varchar(20) NOT NULL,
  `shoe` int(4) NOT NULL,
  `salt` varchar(60) NOT NULL,
  `group` int(1) NOT NULL,
  `isActivated` int(1) NOT NULL,
  `downloads` int(10) NOT NULL,
  `joined` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `model`, `mua`, `photographer`, `stock`, `name`, `username`, `email`, `password`, `dob`, `gender`, `phone`, `twitter`, `country`, `city`, `height`, `weight`, `bust`, `waist`, `eye`, `shoe`, `salt`, `group`, `isActivated`, `downloads`, `joined`) VALUES
(2, 'model', 'mua', 'photographer', 'stock', 'Kevin Barasa', 'kev_barasa', 'bkevin001@yahoo.com', '21f83ad5f1a089f59310656142e0b7c27df2ddbed0504675b2a5a7e5fa5df6a9', '0000-00-00', 'Male', 724778017, 'kev_barasa', 'Kenya', 'Nairobi', 6, 70, 0, 35, 'Red', 42, 'ª©9ÊšbõÕ\r’BIËýE`Àä—`ŸK?SãïJ', 1, 0, 0, '2016-02-07 16:32:32'),
(3, '', '', '', 'stock', 'Linus Nyukuri', 'linus_n', 'linus@yahoo.com', '1868c67c89fe972e770d91ee248659473aba99dcb023ac69db7e0032ef74e4d1', '2000-05-05', 'Male', 2147483647, 'kevo', 'Kenya', 'khartoum', 0, 0, 0, 0, 'Blue', 0, 'ü€ÔS†À¬²6­ žñi³êÇ<AdÆuÄ9‘:', 1, 0, 0, '2016-02-07 21:00:15'),
(4, '', '', '', '', 'Kelly Omondi', 'kelly_o', 'kelly@yahoo.com', '647fb56f5fe488a01a6e4dec2b1ce2b3baa28002bc0a645378f7b1d991c9971c', '2000-08-05', 'Male', 2147483647, 'jshs', 'Wagwan', '', 0, 0, 0, 0, '', 0, '“÷òõ^q¿çÄ8–lŒã\\Á$ˆÜè¢©˜µÁ[ž&b—', 1, 0, 0, '2016-02-09 07:01:59'),
(7, '', 'mua', '', '', 'Michael Kigotho', 'mike', 'michael@gmail.com', 'ce387b2a010ea6cfd6d165fff2f156632b9141ce57eea2ca78a63c07473a7220', '0000-00-00', 'Female', 0, '', '', '', 0, 0, 0, 0, '', 0, '´¸²(høm”.sýrÿ²ú)8(Y¬ºßfQxßGT', 3, 0, 0, '2016-02-09 07:32:34'),
(8, '', '', '', 'stock', 'Claire Mogaka', 'claire_m', 'claire@yahoo.com', '1868c67c89fe972e770d91ee248659473aba99dcb023ac69db7e0032ef74e4d1', '0000-00-00', 'Male', 0, '', '', '', 0, 0, 0, 0, '', 0, 'ü€ÔS†À¬²6­ žñi³êÇ<AdÆuÄ9‘:', 1, 0, 0, '2016-02-07 21:00:15'),
(9, 'model', '', 'photographer', '', 'Kani Tuyala', 'kani', 'kanitu@yahoo.com', '5f3687d8a9d122b13bee03867e3e8a5791de3937e525bdb000239101acb12b47', '1985-04-05', 'Male', 2147483647, 'kanitu', 'Kenya', '', 0, 0, 0, 0, '', 0, '…WS*H»þš+Îmªs®\rÍ!d *ÅB°J³±.gÝh', 3, 0, 0, '2016-02-15 23:39:09'),
(10, '', '', 'photographer', '', 'michael', 'kigotho', 'mkigotho2@gmail.com', '4545110b02354665f59e228cdbea73bccce9df70e18a816b8c5bdf4e9b89ead0', '0000-00-00', 'Male', 0, '', '', '', 0, 0, 0, 0, '', 0, '0tç<±-`†Z¢U<ÁùSë2ùÆ¤Øû6¼HP', 3, 0, 0, '2016-02-20 10:11:58'),
(15, '', '', '', '', 'Olivia Mengich', 'oliviam', 'oliviam146@gmail.com', 'b9e7273e553fc1b7728f97d52fb5a5fdf11ebdd539a1f960d11e2acdbb8d7cf8', '0000-00-00', 'Female', 0, '', 'Kenya', '', 0, 0, 0, 0, 'Brown', 0, '¯S¨ˆaÊÔVÛ9{Õ«\\ù¥áöÂhßÆ¼Ü¥Ç}·', 1, 0, 0, '2016-03-02 19:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(4, 10, '30a6bdc62992d6c9dbed704805fd7743dfd5e72bdb3ce55f79');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
