-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2022 at 04:14 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VOTESxEUROVISION`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `name` varchar(256) DEFAULT NULL,
  `link` varchar(512) DEFAULT NULL,
  `song` varchar(256) DEFAULT NULL,
  `country` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`name`, `link`, `song`, `country`) VALUES
('Ronela Hajati', 'https://eurovision.tv/participant/ronela-hajati-22', 'Sekret', 'Albania'),
('Rosa Linn', 'https://eurovision.tv/participant/rosa-linn-22', 'Snap', 'Armenia'),
('Sheldon Riley', 'https://eurovision.tv/participant/sheldon-riley-22', 'Not the Same', 'Australia'),
('Lum!x feat. Pia Maria', 'https://eurovision.tv/participant/lumix-and-pia-maria-22', 'Halo', 'Austria'),
('Nadir Rüstəmli', 'https://eurovision.tv/participant/nadir-rustamli-22', 'Fade To Black', 'Azerbaijan'),
('Jérémie Makiese', 'https://eurovision.tv/participant/jeremie-makiese-22', 'Miss You', 'Belgium'),
('Intelligent Music Project', 'https://eurovision.tv/participant/intelligent-music-project-22', 'Intention', 'Bulgaria'),
('Mia Dimšić', 'https://eurovision.tv/participant/mia-dimsic-22', 'Guilty Pleasure', 'Croatia'),
('Andromache', 'https://eurovision.tv/participant/andromache-22', 'Ela', 'Cyprus'),
('We Are Domi', 'https://eurovision.tv/participant/we-are-domi-22', 'Lights Off', 'Czech Republic'),
('Reddi', 'https://eurovision.tv/participant/reddi-22', 'The Show', 'Denmark'),
('Stefan', 'https://eurovision.tv/participant/stefan-22', 'Hope', 'Estonia'),
('The Rasmus', 'https://eurovision.tv/participant/The-Rasmus-22', 'Jezebel', 'Finland'),
('Alvan & Ahez', 'https://eurovision.tv/participant/alvan-and-ahez-22', 'Fulenn', 'France'),
('Circus Mircus', 'https://eurovision.tv/participant/circus-mircus-22', 'Lock Me In', 'Georgia'),
('Malik Harris', 'https://eurovision.tv/participant/malik-harris-22', 'Rockstars', 'Germany'),
('Amanda Tenfjord', 'https://eurovision.tv/participant/amanda-georgiadi-tenfjord-22', 'Die Together', 'Greece'),
('Systur', 'https://eurovision.tv/participant/sigga-beta-elin-22', 'Með hækkandi sól', 'Iceland'),
('Brooke', 'https://eurovision.tv/participant/brooke-22', 'That\'s Rich', 'Ireland'),
('Michael Ben David', 'https://eurovision.tv/participant/michael-ben-david-22', 'I.M', 'Israel'),
('Mahmood & Blanco', 'https://eurovision.tv/participant/mahmood-and-blanco-22', 'Brividi', 'Italy'),
('Citi Zēni', 'https://eurovision.tv/participant/citi-zeni-22', 'Eat Your Salad', 'Latvia'),
('Monika Liu', 'https://eurovision.tv/participant/monika-liu-22', 'Sentimentai', 'Lithuania'),
('Emma Muscat', 'https://eurovision.tv/participant/emma-muscat-22', 'I Am What I Am', 'Malta'),
('Zdob și Zdub & Frații Advahov', 'https://eurovision.tv/participant/zdob-si-zdub-and-fratii-advahov-22', 'Trenulețul', 'Moldova'),
('Vladana', 'https://eurovision.tv/participant/vladana-22', 'Breathe', 'Montenegro'),
('S10', 'https://eurovision.tv/participant/s10-22', 'De diepte', 'Netherlands'),
('Andrea', 'https://eurovision.tv/participant/andrea-22', 'Circles', 'North Macedonia'),
('Subwoolfer', 'https://eurovision.tv/participant/subwoolfer-22', 'Give That Wolf a Banana', 'Norway'),
('Ochman', 'https://eurovision.tv/participant/ochman-22', 'River', 'Poland'),
('Maro', 'https://eurovision.tv/participant/maro-22', 'Saudade, saudade', 'Portugal'),
('WRS', 'https://eurovision.tv/participant/wrs-22', 'Llámame', 'Romania'),
('Achille Lauro', 'https://eurovision.tv/participant/achille-lauro-22', 'Stripper', 'San Marino'),
('Konstrakta', 'https://eurovision.tv/participant/konstrakta-22', 'In corpore sano', 'Serbia'),
('LPS', 'https://eurovision.tv/participant/lps-22', 'Disko', 'Slovenia'),
('Chanel', 'https://eurovision.tv/participant/chanel-22', 'SloMo', 'Spain'),
('Cornelia Jakobs', 'https://eurovision.tv/participant/cornelia-jakobs-22', 'Hold Me Closer', 'Sweden'),
('Marius Bear', 'https://eurovision.tv/participant/marius-bear-22', 'Boys Do Cry', 'Switzerland'),
('Kalush Orchestra', 'https://eurovision.tv/participant/kalush-22', 'Stefania', 'Ukraine'),
('Sam Ryder', 'https://eurovision.tv/participant/sam-ryder-22', 'Space Man', 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `available_votes` int(2) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `country`, `available_votes`) VALUES
('albania2@albania.al', 'albania', 'Albania', 16),
('albania@albania.al', 'albania', 'Albania', 15),
('australia@australia.au', 'australia', 'Australia', 0),
('czech@czech.cz', 'czech', 'Czech Republic', 12),
('france@france.fr', 'france', 'France', 14),
('germany@germany.de', 'germany', 'Germany', 15),
('italy@italy.it', 'italy', 'Italy', 15),
('russia@russia.ru', 'russia', 'Russia', 20);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `user_country` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `votes` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`user_country`, `country`, `votes`) VALUES
('Albania', 'Italy', 2),
('Albania', 'Malta', 1),
('Albania', 'Norway', 4),
('Albania', 'Poland', 1),
('Albania', 'Ukraine', 1),
('Australia', 'Georgia', 20),
('Czech Republic', 'Italy', 2),
('Czech Republic', 'Poland', 5),
('Czech Republic', 'Spain', 1),
('France', 'Belgium', 1),
('France', 'Georgia', 1),
('France', 'Italy', 1),
('France', 'Spain', 1),
('France', 'Ukraine', 1),
('France', 'United Kingdom', 1),
('Germany', 'Australia', 1),
('Germany', 'Georgia', 1),
('Germany', 'Italy', 1),
('Germany', 'Norway', 1),
('Germany', 'Ukraine', 1),
('Italy', 'Georgia', 2),
('Italy', 'Ukraine', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`country`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`user_country`,`country`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
