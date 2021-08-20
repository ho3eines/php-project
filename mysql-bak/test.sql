-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2021 at 12:38 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `baseusers`
--

DROP TABLE IF EXISTS `baseusers`;
CREATE TABLE IF NOT EXISTS `baseusers` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baseusers`
--

INSERT INTO `baseusers` (`username`, `password`, `firstname`, `lastname`) VALUES
('admin', 'admin', 'admin', 'admin'),
('ali', '1234', 'ali', 'moradi');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `PostId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PostTitle` varchar(1000) NOT NULL,
  `PostText` varchar(8000) NOT NULL,
  `PostCreateDate` varchar(100) NOT NULL,
  `PostGroup` varchar(500) NOT NULL,
  PRIMARY KEY (`PostId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostId`, `PostTitle`, `PostText`, `PostCreateDate`, `PostGroup`) VALUES
(12, 'language', '<p>A&nbsp;<strong>programming language</strong>&nbsp;is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Formal_language\" title=\"Formal language\">formal language</a>&nbsp;comprising a set of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Formal_language#Words_over_an_alphabet\" title=\"Formal language\">strings</a>&nbsp;that produce various kinds of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machine_code\" title=\"Machine code\">machine code output</a>. Programming languages are one kind of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Computer_language\" title=\"Computer language\">computer language</a>, and are used in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Computer_programming\" title=\"Computer programming\">computer programming</a>&nbsp;to implement&nbsp;<a href=\"https://en.wikipedia.org/wiki/Algorithm\" title=\"Algorithm\">algorithms</a>.</p>\r\n\r\n<p>Most programming languages consist of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machine_instruction\" title=\"Machine instruction\">instructions</a>&nbsp;for&nbsp;<a href=\"https://en.wikipedia.org/wiki/Computer\" title=\"Computer\">computers</a>. There are programmable machines that use a set of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Domain-specific_language\" title=\"Domain-specific language\">specific instructions</a>, rather than&nbsp;<a href=\"https://en.wikipedia.org/wiki/General-purpose_language\" title=\"General-purpose language\">general programming languages</a>. Since the early 1800s, programs have been used to direct the behavior of machines such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jacquard_loom\" title=\"Jacquard loom\">Jacquard looms</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Music_box\" title=\"Music box\">music boxes</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Player_piano\" title=\"Player piano\">player pianos</a>.<sup><a href=\"https://en.wikipedia.org/wiki/Programming_language#cite_note-1\">[1]</a></sup>&nbsp;The programs for these machines (such as a player piano&#39;s scrolls) did not produce different behavior in response to different inputs or conditions.</p>\r\n\r\n<p>Thousands of different programming languages have been created, and more are being created every year. Many programming languages are written in an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Imperative_programming\" title=\"Imperative programming\">imperative</a>&nbsp;form (i.e., as a sequence of operations to perform) while other languages use the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Declarative_programming\" title=\"Declarative programming\">declarative</a>&nbsp;form (i.e. the desired result is specified, not how to achieve it).</p>\r\n\r\n<p>The description of a programming language is usually split into the two components of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Syntax_(programming_languages)\" title=\"Syntax (programming languages)\">syntax</a>&nbsp;(form) and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Semantics_(computer_science)\" title=\"Semantics (computer science)\">semantics</a>&nbsp;(meaning). Some languages are defined by a specification document (for example, the&nbsp;<a href=\"https://en.wikipedia.org/wiki/C_(programming_language)\" title=\"C (programming language)\">C</a>&nbsp;programming language is specified by an&nbsp;<a href=\"https://en.wikipedia.org/wiki/International_Organization_for_Standardization\" title=\"International Organization for Standardization\">ISO</a>&nbsp;Standard) while other languages (such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Perl\" title=\"Perl\">Perl</a>) have a dominant&nbsp;<a href=\"https://en.wikipedia.org/wiki/Programming_language_implementation\" title=\"Programming language implementation\">implementation</a>&nbsp;that is treated as a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Reference_implementation\" title=\"Reference implementation\">reference</a>. Some languages have both, with the basic language defined by a standard and extensions taken from the dominant implementation being common.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Programming_language_theory\" title=\"Programming language theory\">Programming language theory</a>&nbsp;is a subfield of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Computer_science\" title=\"Computer science\">computer science</a>&nbsp;that deals with the design, implementation, analysis, characterization, and classification of programming languages.</p>\r\n', '', 'language'),
(9, 'PHP', '<p><strong>PHP&nbsp;is a&nbsp;general-purpose&nbsp;scripting language&nbsp;geared towards&nbsp;web development.[7]&nbsp;It was originally created by Danish-Canadian&nbsp;programmer&nbsp;Rasmus Lerdorf&nbsp;in 1994.[8]&nbsp;The PHP&nbsp;reference implementation&nbsp;is now produced by The PHP Group.[9]&nbsp;PHP originally stood for&nbsp;Personal Home Page,[8]&nbsp;but it now stands for the&nbsp;recursive initialism&nbsp;PHP: Hypertext Preprocessor.[10]</strong></p>\r\n\r\n<p><strong>PHP code is usually processed on a&nbsp;web server&nbsp;by a PHP&nbsp;interpreter&nbsp;implemented as a&nbsp;module, a&nbsp;daemon&nbsp;or as a&nbsp;Common Gateway Interface&nbsp;(CGI) executable. On a web server, the result of the&nbsp;interpreted&nbsp;and executed PHP code&nbsp;&ndash; which may be any type of data, such as generated&nbsp;HTML&nbsp;or&nbsp;binary&nbsp;image data&nbsp;&ndash; would form the whole or part of an&nbsp;HTTP&nbsp;response. Various&nbsp;web template systems, web&nbsp;content management systems, and&nbsp;web frameworks&nbsp;exist which can be employed to orchestrate or facilitate the generation of that response. Additionally, PHP can be used for many programming tasks outside of the web context, such as standalone&nbsp;graphical applications[11]&nbsp;and&nbsp;robotic&nbsp;drone&nbsp;control.[12]&nbsp;PHP code can also be directly executed from the&nbsp;command line.</strong></p>\r\n\r\n<p><strong>The standard PHP interpreter, powered by the&nbsp;Zend Engine, is&nbsp;free software&nbsp;released under the&nbsp;PHP License. PHP has been widely ported and can be deployed on most web servers on almost every&nbsp;operating system&nbsp;and&nbsp;platform, free of charge.[13]</strong></p>\r\n\r\n<p><strong>The PHP language evolved without a written&nbsp;formal specification&nbsp;or standard until 2014, with the original implementation acting as the&nbsp;de facto&nbsp;standard which other implementations aimed to follow. Since 2014, work has gone on to create a formal PHP specification.[14]</strong></p>\r\n\r\n<p><strong>W3Techs reports that, as of April&nbsp;2021,&nbsp;&quot;PHP is used by 79.2% of all the websites whose server-side programming language we know.&quot;[15]</strong></p>\r\n', '2021-08-20 11:50:12', 'PHP'),
(10, 'History', '<p>PHP development began in 1994 when&nbsp;Rasmus Lerdorf&nbsp;wrote several&nbsp;Common Gateway Interface&nbsp;(CGI) programs in C,[16][17]&nbsp;which he used to maintain his&nbsp;personal homepage. He extended them to work with&nbsp;web forms&nbsp;and to communicate with&nbsp;databases, and called this implementation &quot;Personal Home Page/Forms Interpreter&quot; or PHP/FI.</p>\r\n\r\n<p>PHP/FI could be used to build simple,&nbsp;dynamic web applications. To accelerate&nbsp;bug&nbsp;reporting and improve the code, Lerdorf initially announced the release of PHP/FI as &quot;Personal Home Page Tools (PHP Tools) version 1.0&quot; on the&nbsp;Usenet&nbsp;discussion group&nbsp;comp.infosystems.www.authoring.cgi&nbsp;on June 8, 1995.[1][18]&nbsp;This release already had the basic functionality that PHP has today. This included&nbsp;Perl-like variables, form handling, and the ability to embed HTML. The&nbsp;syntax&nbsp;resembled that of&nbsp;Perl, but was simpler, more limited and less consistent.[9]</p>\r\n', '2021-08-20 11:50:57', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `UserName` varchar(100) NOT NULL,
  `TokenId` varchar(100) NOT NULL,
  `ClientId` varchar(100) NOT NULL,
  PRIMARY KEY (`TokenId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`UserName`, `TokenId`, `ClientId`) VALUES
('admin', '23724b9456c09077dc80838505f8723d253591879b74f0f9bffa572aaa2208d2', '::1'),
('admin', 'f6bea7662433aafddc3a99e5b5e4d37275873c7988343fce6ad34dd76feedc81', '::1'),
('admin', '9f85dd18d73795334ea5dc605756a208c81db976b2d6a0137916d2b965ba9a28', '::1'),
('ali', 'e2f5ccf841a7defcf09cc37cc9c8d55d425bdc67d0076e3034fe0d1e95371894', '::1'),
('admin', '1302ac1db3b90f493ac97c07fbf9cd8b745745464695b091e24670f6d4160a6a', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
