-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2014 at 11:23 AM
-- Server version: 5.5.36-cll
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `luisfbme_pe`
--

-- --------------------------------------------------------

--
-- Table structure for table `consulting`
--

CREATE TABLE IF NOT EXISTS `consulting` (
  `id_con` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `year` varchar(45) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `isNews` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_con`),
  KEY `fk_consulting_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `consulting`
--

INSERT INTO `consulting` (`id_con`, `title`, `author`, `desc`, `location`, `year`, `dateCreated`, `user_id`, `isNews`, `type`) VALUES
(3, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(4, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(5, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(6, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(7, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(8, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(9, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(10, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(11, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(12, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(13, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(14, 'asd', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', 'asd', '2012', '0000-00-00 00:00:00', 1, 0, 3),
(16, 'ghj', 'ghj', 'ghj', 'ghj', 'ghj', '2014-04-30 16:47:32', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id_proj` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` varchar(45) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `desc` text,
  `dateCreated` datetime NOT NULL,
  `isNews` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_proj`),
  KEY `fk_projects_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_proj`, `title`, `author`, `year`, `location`, `user_id`, `desc`, `dateCreated`, `isNews`, `type`) VALUES
(1, 'Hotel Santa Cruz das Flores', 'Multiconsult, Lda.', '2008', 'Santa Cruz, ilha das Flores', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-11 00:00:00', 0, 1),
(2, 'Centro de Saúde da ilha Graciosa', 'MMC arquitectura e design, Lda.', '2008', 'Estrada Regional, n.º3 | Santa Cruz, Graciosa', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-11 00:00:00', 0, 1),
(3, 'Recuperação de Imóvel Chafariz Velho', 'Juliana Couto', '2012', 'Santa Luzia , Angra do Heroísmo', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-12 00:00:00', 0, 1),
(4, 'Igreja Nossa Senhora de Fátima', 'Multiconsult, Lda.', '2010', 'Ponta Delgada, São Miguel', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-12 00:00:00', 0, 1),
(5, 'SINDESCOM - EPROSEC', 'Multiconsult, Lda.', '2012', 'Ponta Delgada, São Miguel', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-17 00:00:00', 0, 1),
(6, 'Escola Básica Integrada de Angra do Heroísmo –  Ampliação', 'José Parreira', '2012', 'São Bento , Angra do Heroísmo', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-17 00:00:00', 0, 1),
(7, 'Centro de Acolhimento em Angra do Heroísmo', 'Juliana Couto', '2013', 'São Pedro , Angra do Heroísmo', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '2014-03-17 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projimg`
--

CREATE TABLE IF NOT EXISTS `projimg` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) NOT NULL,
  `proj_id` int(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `fk_projImg_projects1` (`proj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `projimg`
--

INSERT INTO `projimg` (`id_image`, `imgName`, `proj_id`) VALUES
(1, '1.jpg', 2),
(2, '2.jpg', 2),
(3, '3.jpg', 2),
(4, '4.jpg', 2),
(5, '1.jpg', 3),
(6, '2.jpg', 3),
(7, '3.jpg', 3),
(8, '1.jpg', 4),
(9, '2.jpg', 4),
(10, '3.jpg', 4),
(11, '1.jpg', 1),
(12, '2.jpg', 1),
(13, '3.jpg', 1),
(14, '4.jpg', 1),
(15, '5.jpg', 1),
(16, '1.jpg', 5),
(17, '2.jpg', 5),
(18, '3.jpg', 5),
(19, '4.jpg', 5),
(20, '1.jpg', 6),
(21, '2.jpg', 6),
(22, '3.jpg', 6),
(23, '1.jpg', 7),
(24, '2.jpg', 7),
(25, '3.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `projspec`
--

CREATE TABLE IF NOT EXISTS `projspec` (
  `proj_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  PRIMARY KEY (`proj_id`,`spec_id`),
  KEY `fk_proj_spec_projects` (`proj_id`),
  KEY `fk_proj_spec_spec1` (`spec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projspec`
--

INSERT INTO `projspec` (`proj_id`, `spec_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 1),
(4, 2),
(4, 3),
(4, 5),
(4, 6),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `spec`
--

CREATE TABLE IF NOT EXISTS `spec` (
  `id_spec` int(11) NOT NULL AUTO_INCREMENT,
  `specName` varchar(255) NOT NULL,
  PRIMARY KEY (`id_spec`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `spec`
--

INSERT INTO `spec` (`id_spec`, `specName`) VALUES
(1, 'Águas e Esgotos'),
(2, 'Fundações e Estruturas'),
(3, 'Instalações Elétricas'),
(4, 'Instalações de Gás'),
(5, 'Segurança contra incêndios'),
(6, 'ITED'),
(7, 'Arruamentos');

-- --------------------------------------------------------

--
-- Table structure for table `supervision`
--

CREATE TABLE IF NOT EXISTS `supervision` (
  `id_sup` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` varchar(45) NOT NULL,
  `location` varchar(255) NOT NULL,
  `desc` text,
  `dateCreated` datetime NOT NULL,
  `isNews` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_sup`),
  KEY `fk_supervision_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `supervision`
--

INSERT INTO `supervision` (`id_sup`, `title`, `author`, `year`, `location`, `desc`, `dateCreated`, `isNews`, `user_id`, `type`) VALUES
(3, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(4, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(5, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(6, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(7, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(8, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(9, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(10, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(11, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(12, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(13, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2),
(14, 'asd', 'asd', '2014', 'asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus neque, interdum nec faucibus sed, auctor eget odio. Nam consequat dui sed lorem feugiat, pulvinar dignissim justo luctus. Pellentesque sed pretium purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae justo erat. Aliquam tincidunt ante nulla, nec volutpat purus sodales in. Maecenas eu ante fringilla, vestibulum mauris commodo, varius est. Mauris egestas urna vel velit bibendum pharetra. Sed pharetra ultricies leo ut dapibus. Curabitur congue augue sem, vitae dapibus ipsum tempor molestie. Morbi ut augue sodales, commodo dui et, adipiscing nulla. Ut egestas, nisl sit amet semper tempor, mauris libero luctus nulla, ut pretium ante odio ac lacus. Morbi pharetra varius lacinia. Nulla id purus vel ipsum pharetra ultrices non in tortor. In consequat porttitor ante.', '0000-00-00 00:00:00', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supimg`
--

CREATE TABLE IF NOT EXISTS `supimg` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) NOT NULL,
  `sup_id` int(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `fk_supImg_supervision1` (`sup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateUpdate` datetime NOT NULL,
  `email` varchar(150) NOT NULL,
  `isAdmin` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `dateCreate`, `dateUpdate`, `email`, `isAdmin`) VALUES
(1, 'Administrador', 'pemanager', 'de6fae2c8ce913f92edb7ea3039e0aaebda7775df52301490f37b729201e0e2f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'p.e@mail.telepac.pt', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consulting`
--
ALTER TABLE `consulting`
  ADD CONSTRAINT `fk_consulting_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_projects_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projimg`
--
ALTER TABLE `projimg`
  ADD CONSTRAINT `fk_projImg_projects1` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`id_proj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projspec`
--
ALTER TABLE `projspec`
  ADD CONSTRAINT `fk_proj_spec_projects` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`id_proj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proj_spec_spec1` FOREIGN KEY (`spec_id`) REFERENCES `spec` (`id_spec`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supervision`
--
ALTER TABLE `supervision`
  ADD CONSTRAINT `fk_supervision_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supimg`
--
ALTER TABLE `supimg`
  ADD CONSTRAINT `fk_supImg_supervision1` FOREIGN KEY (`sup_id`) REFERENCES `supervision` (`id_sup`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
