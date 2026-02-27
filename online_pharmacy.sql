-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 12:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `kids_items`
--

CREATE TABLE `kids_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kids_items`
--

INSERT INTO `kids_items` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Educational Toys', 'Interactive and educational toys for kids', 29.99, 'https://m.media-amazon.com/images/I/41RCXYX2C3L._SR290,290_.jpg'),
(2, 'Children Books', 'Colorful and engaging books for children', 12.49, 'https://m.media-amazon.com/images/I/41RCXYX2C3L._SR290,290_.jpg'),
(3, 'Kids Clothes', 'Comfortable and stylish clothes for kids', 19.99, 'https://m.media-amazon.com/images/I/41RCXYX2C3L._SR290,290_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mother_baby_items`
--

CREATE TABLE `mother_baby_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mother_baby_items`
--

INSERT INTO `mother_baby_items` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Baby Diapers', 'Soft and absorbent diapers for babies', 19.99, 'https://5.imimg.com/data5/UH/RN/OK/SELLER-3121225/fmcg-baby-care-products-under-ayurvedic-medicated-category-500x500.jpg'),
(2, 'Maternity Pillow', 'Comfortable pillow for pregnant women', 29.99, 'https://5.imimg.com/data5/BJ/HO/MY-3121225/googly-woogly-baby-care-soap-75gm-500x500.jpg'),
(3, 'Breast Pump', 'Efficient breast pump for nursing mothers', 49.99, 'https://5.imimg.com/data5/SELLER/Default/2023/8/332383964/RS/WX/SJ/137984139/shineth-baby-500x500.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `items_id` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `items_id`, `user_id`) VALUES
(3, '{\"4\":\"3\",\"5\":\"7\",\"6\":\"1\",\"7\":\"3\",\"8\":\"4\"}', 7),
(4, '{\"6\":\"1\",\"7\":\"3\",\"8\":\"4\"}', 7),
(6, '[\"3\"]', 8),
(8, '[\"3\",\"1\",\"7\"]', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pet_items`
--

CREATE TABLE `pet_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_items`
--

INSERT INTO `pet_items` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Dog Food', 'Premium quality dog food for your furry friend', 15.99, 'https://image.made-in-china.com/2f0j00vlPfiGTWIbkQ/Pet-Care-Products-Pet-Disinfectant-Dog-Disinfection-Antipruritic-Concentrated-Deodorizing-Spray.webp'),
(2, 'Cat Litter', 'Absorbent and odor-control cat litter', 9.99, 'https://www.carlislewholesale.co.uk/img/containers/assets/Products/PetCare/Pedigree.jpg/76bfab6422313e18caaf16ed867c2b65.webp'),
(3, 'Pet Toy', 'Interactive toy to keep your pet entertained', 7.49, 'https://www.carlislewholesale.co.uk/assets/files/Products/PetCare/pet-care.png');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `prescription_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `paymentmethod` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `specialnotes` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `prescription_image`, `name`, `phonenumber`, `address`, `email`, `gender`, `paymentmethod`, `duration`, `allergies`, `specialnotes`, `created_at`) VALUES
(2, 'uploads/background_01.png', 'test', 1234, 'test', 'test@gmail.com', 'male', 'ca', '2', '2', '2', '2024-05-05 22:55:59'),
(3, 'uploads/scriptures-candles-wooden-table.jpg', 'test20', 12345678, 'test20', 'test20@gmail.com', 'male', 'test20', '2', '2', 'test20', '2024-05-07 16:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `shopitems`
--

CREATE TABLE `shopitems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopitems`
--

INSERT INTO `shopitems` (`id`, `name`, `description`, `image_url`) VALUES
(1, 'Aspirin', 'Pain reliever and fever reducer.', 'https://images.ctfassets.net/qfo47mrl3zhx/55sLduAM1qhuqL0G98KBTM/6c98af36550173352bb8bd943684d695/VizNav_Beauty_Cleansers-Exfoliants.jpg'),
(2, 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug (NSAID) used to treat pain, fever, and inflammation.', 'https://assets.vogue.in/photos/5ed5da69c7200c7e649e48b7/master/w_1600%2Cc_limit/12%2520(1).jpg'),
(3, 'Acetaminophen', 'Commonly used to treat pain and reduce fever.', 'https://images.ctfassets.net/qfo47mrl3zhx/2PdHMqj80gF9I8uAwcXyVY/36c4c886f7a8a411a3db356fe73a179b/VizNav_Beauty_Lotions-Moisturizers.jpg'),
(4, 'Lipitor', 'Used to lower cholesterol and reduce the risk of heart disease.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-I_FwNwHZP9hJMKJ1WJmUmDNVFMXVLq13HvdWQ1aFzw7NSdVPPOQZYkXE4c1-K9WoGS4&usqp=CAU'),
(5, 'Metformin', 'Used to treat type 2 diabetes.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbK8gK97aI-AoV9sXvty93KHLLduzNExw9m1Ok6Qstiqmk3Ds6-pHhMbGi1JrEK5xwnzc&usqp=CAU'),
(6, 'Synthroid', 'Used to treat hypothyroidism.', 'https://stylecaster.com/wp-content/uploads/2022/04/aveeno-spf.jpeg?w=670'),
(7, 'Lisinopril', 'Used to treat high blood pressure and heart failure.', 'https://images.ctfassets.net/qfo47mrl3zhx/2PdHMqj80gF9I8uAwcXyVY/36c4c886f7a8a411a3db356fe73a179b/VizNav_Beauty_Lotions-Moisturizers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `birthday`, `district`, `email`, `password`) VALUES
(2, 'test', 'test', '2024-05-15', 'test', 'test', '$2y$10$H1m5u3wQ.tL3zdVbDEnfueGMNAIshfcP1anbxhRkQY6Ww.76wsPfe'),
(4, 'test', 'test2', '2024-05-16', 'tt', 'test3@gmail.com', '$2y$10$.OFo7NBWqHOmjJ1b8qugueX0ab6gNHsz5rsk7VeWh3Bikc3lvvjUK'),
(5, 'test1', 'test2', '2024-05-09', 'test', 'test4@gmail.com', '$2y$10$kpp2FLbuUFi1mhetO2immOKMdHazpFXZl4G/tCdLAs3qDizft9MJq'),
(6, 'test', 'test', '2024-05-17', 'test', 'test99@gmail.com', '$2y$10$wTqzcxW3mXsrcnSgzCCCn.SzrLC5l.uCeQr8wncfIAita6Yf9tf0S'),
(8, 'test20', 'test20', '2024-05-16', 'test20', 'test20@gmail.com', '$2y$10$1q8hXssCpKipphcv165WP.RWcoju9dvxnsP0zTn59SRwlc.9redUa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kids_items`
--
ALTER TABLE `kids_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother_baby_items`
--
ALTER TABLE `mother_baby_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_items`
--
ALTER TABLE `pet_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopitems`
--
ALTER TABLE `shopitems`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kids_items`
--
ALTER TABLE `kids_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mother_baby_items`
--
ALTER TABLE `mother_baby_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pet_items`
--
ALTER TABLE `pet_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopitems`
--
ALTER TABLE `shopitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
