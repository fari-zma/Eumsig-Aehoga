-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 08:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eumsig_aehoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `sex`, `pass`, `fullName`) VALUES
(1, 'admin@gmail.com', 'Male', '1234', 'Ayaan Malhotra');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_email`, `item_id`, `quantity`) VALUES
(68, 'shindekiranb59@gmail.com', 1, 1),
(69, 'shindekiranb59@gmail.com', 2, 1),
(70, 'shindekiranb59@gmail.com', 3, 3),
(73, 'reyan@gmail.com', 5, 1),
(74, 'reyan@gmail.com', 9, 1),
(75, 'ayaan@gmail.com', 1, 1),
(76, 'ayaan@gmail.com', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `Name`, `description`, `Price`, `Image`) VALUES
(1, 'Pizza', 'This pizza, which also lacks a crust, is basically a casserole in a skillet with barbecued chicken, garlic and tomato sauce all covered in a thick layer of well-done mozzarella and other cheeses.', 12, 'Images\\07.jpg'),
(2, 'Kimchi', 'The most common version of KIMCHI. Napa cabbage that is preserved and lightly fermented in bright red chili flakes.', 4, 'Images\\kimchi.jpg'),
(3, 'Barbecue', 'Order a few plates of meat, and you will be delivered a vast array of side dishes and the all-important pieces of lettuce, garlic, peppers, and chili pastes to fashion little meat wraps.', 7, 'Images\\barbecue.jpg'),
(4, 'Sundubu Jjigae', 'A flaming hot pot of Sundubu Jjigae is a flavorful Korean dish. Made with super soft tofu, a few bits of seafood, addictive kimchi soup, and an egg thrown on top, there is not much else as comforting on a cold rainy day.\r\nThis tofu stew is best enjoyed with a side of steamed rice and a few pickled vegetables.', 4, 'Images\\sundubu_Jjigae.jpg'),
(5, 'Mixed Seafood Stew', 'Among the repertoire of South Korean jjigae hot chili infested stews is the massively flavorful seafood variation made with whatever kind of seafood is on hand all boiled in a hot earthenware pot of goodness.', 4, 'Images\\mixed_seafood_stew.jpg'),
(6, 'Nakji Bokkeum', 'It\'s for those who have a love affair with octopus. Chopped octopus stir fried with a few assorted vegetables in red chili paste.\r\nThe flavor will reminded you of Thai pad prik gaeng, heavy on the sweet red Korean chili paste.', 8, 'Images\\Nakji_bokkeum.jpg'),
(7, 'Saengseon Jjigae', 'For the lover of fish, it will be a joy to eat the delicious Korean kimchi soup base made with fish. Though the fish is filled with bones, the flavor it provided is nothing short of outstanding!', 5, 'Images\\Saengseon_Jjigae.jpg'),
(8, 'Seolleongtang', 'Ox bones simmered on low heat for hours and hours is the highlight of Korean seolleongtang. The dish is served plain, a few light noodles, slices of meat and green onions.\r\nThe broth is delivered to you unsalted and unseasoned so it is up to you to add salt, pepper, chili paste and extra green onions to your own taste.', 5, 'Images\\Seolleongtang.jpg'),
(9, 'Dolsot Bibimbap', 'Bibimbap is like fried rice, but instead of being fried it is just all mixed up like a salad.\r\nThe dish consists of rice on the bottom, a few different kinds of sauteed vegetables, an egg, and toasted seaweed flakes and sesame seeds on top. If it is not salty enough, you can normally add more gochujang chili paste to make it tastier.', 3, 'Images\\Dolsot_bibimbap.jpg'),
(10, 'Kimch Bokkeumbap', 'Take South Koreas most iconic vegetable garnish (kimchi), stir fry it with a few chunks of hot dog or luncheon meat and rice, cover it with a fried egg and sprinkle it with toasted seaweed and sesame seeds and you have got a dish that no one could dislike!\r\nIt tastes good any day of the week or for whatever mood you are in. Do not forget to eat kimchi fried rice with a side of kimchi!', 4, 'Images\\kimch_bokkeumbap.jpg'),
(11, 'Bindaetteok', 'This South Korean pancakes are salty, filled with tons of ingredients and fried in lots of oil!\r\nMade from ground mung beans, green onions and kimchi, this beauty is deep fried and served with a vinaigrette dipping sauce.', 4, 'Images\\Bindaetteok.jpg'),
(12, 'Gimbap', 'Eaten as a meal or just an on-the-go snack, gimbap is one of South Koreas most beloved foods. Similar to a Japanese style hand roll, gimbap is an assemblage of sushi rice, a few Korean pickled vegetables, spinach, and ham all wrapped in sheets of toasted seaweed.', 2, 'Images\\gimbap.jpg'),
(13, 'Dakkochi', 'The grilled dakkochi chicken skewers is the best among all grilled chicken.\r\nThese skewers are lathered in an outrageously flavorful red chili sauce that will make your close your eyes and leave all your worries behind.', 2, 'Images\\Dakkochi.jpg'),
(14, 'Frenchy Fry Swirls.', 'This French fries with a twist are what I pople refer to as quality junk food.\r\nTake a potato, cut it into a spiral and spread it out over a stick. Then fry it in hot oil, douse it in a little MSG seasoning and you have got a very addictive treat. ', 1, 'Images\\frenchy_fry_swirls.jpg'),
(15, 'Hotteok', 'Wildly popular and trendy to eat in the busy shopping districts of Seoul, these French fries with a twist are what I might refer to as â€œquality junk food. Take a potato, cut it into a spiral and spread it out over a stick. Then fry it in hot oil, douse it in a little MSG seasoning and you have got a very addictive treat.', 1, 'Images\\Hotteok.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_ordered`
--

CREATE TABLE `food_ordered` (
  `id` int(11) NOT NULL,
  `user_email` varchar(110) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_ordered`
--

INSERT INTO `food_ordered` (`id`, `user_email`, `item_id`, `date`) VALUES
(108, 'shindekiranb59@gmail.com', 3, '2019-10-14 12:02:26'),
(119, 'ayaan@gmail.com', 1, '2019-11-24 11:06:32'),
(120, 'ayaan@gmail.com', 14, '2019-11-24 11:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `subject` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `email`, `name`, `phone`, `subject`) VALUES
(1, 'reyan@gmail.com', 'Syed Reyan', 1234567890, 'Hi EUMSIG AEHOGA. your food are too delicious. I love it so much. I am glad that you are providing home delievery service.'),
(2, 'shindekiranb59@gmail.com', 'kiran', 2147483647, 'fresh food');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `phone`, `address`) VALUES
(3, 'ayaan@gmail.com', '3344', 'Ayaan Malhotra', 1122776655, 'Bagulaur, Bengaluru'),
(5, 'shindekiranb59@gmail.com', '123456', 'kiran', 2147483647, 'nasik,maharashtra'),
(6, 'reyan@gmail.com', '6789', 'Syed Reyan', 1122332211, 'Dwarkanagar, Bengaluru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `F1` (`user_email`),
  ADD KEY `F2` (`item_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_ordered`
--
ALTER TABLE `food_ordered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `F3` (`user_email`),
  ADD KEY `F4` (`item_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `F5` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `food_ordered`
--
ALTER TABLE `food_ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `F1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `F2` FOREIGN KEY (`item_id`) REFERENCES `food_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_ordered`
--
ALTER TABLE `food_ordered`
  ADD CONSTRAINT `F3` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `F4` FOREIGN KEY (`item_id`) REFERENCES `food_items` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `F5` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
