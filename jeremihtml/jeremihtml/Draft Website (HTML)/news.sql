-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 05:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`) VALUES
(1, 'Norman', 'Lebrecht'),
(2, 'Ally', 'Dunavant'),
(3, 'Elizabeth', 'Davis');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Piano'),
(2, 'Orchestra'),
(3, 'Editor\'s Choice'),
(4, 'History'),
(5, 'Opera');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `headline`, `article`, `img_url`, `author_id`, `category_id`, `created_at`) VALUES
(1, 'Musicians Tell Audience Their Orchestra Is Mismanaged', 'Friday night at the Belgrade Philharmonic, a member of the orchestra addressed the audience, warning that the 100 year-old orchestra is on the brink of collapse.\r\n\r\nHere’s what he said:\r\nDear audience,\r\n\r\nIn the hundred-year life of this orchestra of ours and yours, there was everything that a century can bear. Certainly, the most valuable thing in the past hundred years has been the audience of the Belgrade Philharmonic, because of which this orchestra continues and because of which it has lived through such beautiful years. Every Friday, in your presence, the musicians of the Belgrade Philharmonic write new pages of history, with the aim of leaving a cultural legacy for generations to come for the next hundred years. But will we succeed in that?!\r\n\r\nJust as we share our artistic achievements with you, we feel an obligation and responsibility to share with you what is taking us further and further away from the secure future of this orchestra every day.\r\n\r\nEven after more than two years since the death of Ivan Tasovac, the Belgrade Philharmonic is in VD status, celebrating its centenary with the lowest salaries of orchestral musicians in the region, with a shamefully small budget year after year, without a director, without advertising, without a renewed concert uniform already ten years, and without firm convictions that our new hall will be built.\r\n\r\nBy spreading the name of our city and country around the world, we are increasingly confronted with the fact that in our city and in our country we are so highly educated and so low valued. That we play so well and a lot, and that we are paid so little and badly. That the dream of a new Philharmonic Hall of our metropolis is fading more and more, while the audience in Skopje, Podgorica, Tirana is enjoying the auditoriums that befit capital cities. At the end of October last year, we warned the Board of Directors of the Belgrade Philharmonic about all of the above with a warning strike.\r\n\r\nWe regret that in our country and in our city we represent an emblem that may or may not exist. What hardly anyone knows is that the education of a professional musician lasts an average of sixteen years and is one of the most expensive at the University because it is individual. That the competition at the auditions of the Belgrade Philharmonic is fierce and that top musicians fail to get a job several times, because someone even better always appears. That this job requires daily training and practice, regardless of how many years you have been doing it. That each of the members of the Belgrade Philharmonic can, with more or less training, perform many other jobs, but that no one who has not gone through the thorny path of very specific artistic development can become a Philharmonic player.\r\n\r\nBut regardless of us, those who decide about us, ask: “What makes you special?”\r\n\r\nBeing a member of the Philharmonic is equal to being a representative, and the Philharmonic is a cultural representation that repeatedly and repeatedly serves its country with pride and honor.\r\n\r\nExistentially, our lives on these salaries are extremely modest. Artistically, our lives are very rich. We Philharmonicians live for applause, but unfortunately we don’t live from applause. That is why we will demand that the state raise the salaries of the musicians of the Belgrade Philharmonic, to raise the budget necessary to achieve our further goals and to build a new building that will make the name of the Belgrade Philharmonic and the names of its musicians a more alive and present institution in the next hundred years.\r\n\r\nInvesting in culture and art is the only definitely correct investment for the ages, because the fruit of such investments is a healthy society that stands on strong pillars of humanity. Everything else is the temptation of the existential, which apart from art, nothing has ever won.\r\n\r\nDear audience, we want to thank you for listening to us, seeing us and recognizing our value in a city and state that seem to have forgotten about us and everything we represent in this society for a hundred full years.\r\n\r\nFinally, if you want to support us, we invite you to write to the Ministry of Culture with a few words what the Belgrade Philharmonic means to you and to appeal in your own way that our requests be heard and respected.\r\n\r\nWith respect,\r\n\r\nMusicians of the Belgrade Philharmonic', 'bigarticleimg.png', 1, 2, '2024-02-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
