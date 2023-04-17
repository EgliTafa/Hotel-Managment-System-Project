-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 10:47 PM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `dhoma`
--

CREATE TABLE `dhoma` (
  `roomID` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `type` varchar(60) NOT NULL,
  `beds` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `internet` enum('yes','no') NOT NULL,
  `balcony` enum('yes','no') NOT NULL,
  `floor` int(11) NOT NULL,
  `pets` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dhoma`
--

INSERT INTO `dhoma` (`roomID`, `roomNo`, `type`, `beds`, `capacity`, `price`, `internet`, `balcony`, `floor`, `pets`) VALUES
(1, 1, 'standard', 1, 3, 15000.00, 'yes', 'no', 2, 'no'),
(2, 1, 'standard', 1, 3, 15000.00, 'yes', 'no', 2, 'no'),
(3, 1, 'standard', 1, 3, 15000.00, 'yes', 'no', 3, 'no'),
(4, 1, 'standard', 1, 3, 15000.00, 'yes', 'no', 3, 'no'),
(5, 1, 'standard', 1, 3, 15000.00, 'yes', 'no', 4, 'no'),
(6, 2, 'family', 3, 5, 22000.00, 'yes', 'yes', 3, 'yes'),
(7, 2, 'family', 3, 5, 22000.00, 'yes', 'yes', 4, 'yes'),
(8, 2, 'family', 3, 5, 22000.00, 'yes', 'yes', 2, 'yes'),
(9, 2, 'family', 3, 5, 22000.00, 'yes', 'yes', 3, 'yes'),
(11, 1, 'single', 1, 1, 8000.00, 'yes', 'no', 3, 'no'),
(12, 1, 'single', 1, 1, 8000.00, 'yes', 'no', 4, 'no'),
(13, 1, 'single', 1, 1, 8000.00, 'yes', 'no', 2, 'no'),
(14, 1, 'single', 1, 1, 8000.00, 'yes', 'no', 4, 'no'),
(15, 1, 'single', 1, 1, 8000.00, 'yes', 'no', 4, 'no'),
(17, 1, 'couple', 1, 2, 13000.00, 'yes', 'yes', 2, 'no'),
(18, 1, 'couple', 1, 2, 13000.00, 'yes', 'yes', 2, 'no'),
(19, 1, 'couple', 1, 2, 13000.00, 'yes', 'yes', 3, 'no'),
(20, 1, 'couple', 1, 2, 13000.00, 'yes', 'yes', 3, 'no'),
(21, 1, 'couple', 1, 2, 13000.00, 'yes', 'yes', 4, 'no'),
(22, 2, 'suite', 4, 7, 30000.00, 'yes', 'yes', 5, 'yes'),
(23, 2, 'suite', 4, 7, 30000.00, 'yes', 'yes', 5, 'yes'),
(24, 3, 'presidential suite', 5, 10, 40000.00, 'yes', 'yes', 6, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `dhoma_foto`
--

CREATE TABLE `dhoma_foto` (
  `photoID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dhoma_foto`
--

INSERT INTO `dhoma_foto` (`photoID`, `roomID`, `photo`) VALUES
(1, 1, 'roomImages/standard1.jpg'),
(2, 2, 'roomImages/st2.jpg'),
(3, 3, 'roomImages/st3.jpg'),
(4, 4, 'roomImages/st4.jpg'),
(5, 5, 'roomImages/st5.jpg'),
(6, 6, 'roomImages/family1.jpg'),
(7, 7, 'roomImages/fm2.jpg'),
(8, 8, 'roomImages/fm3.jpg'),
(9, 9, 'roomImages/fm4.jpg'),
(11, 11, 'roomImages/single2.jpg'),
(12, 12, 'roomImages/single3.jpg'),
(13, 13, 'roomImages/single4.jpg'),
(14, 14, 'roomImages/single5.jpg'),
(15, 15, 'roomImages/single6.jpg'),
(16, 17, 'roomImages/couples1.jpg'),
(17, 18, 'roomImages/couples2.jpg'),
(18, 19, 'roomImages/couples3.jpg'),
(19, 20, 'roomImages/couples4.jpg'),
(20, 21, 'roomImages/couples5.jpg'),
(21, 22, 'roomImages/suite1.jpg'),
(22, 23, 'roomImages/suite2.jpg'),
(23, 24, 'roomImages/KennedyRoom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `description`, `Title`, `image`) VALUES
(1, 'Play tennis year-round, rain or shine on the only indoor air-conditioned courts in Tirana. We regularly host tournaments and events throughout the year on our professional court. Ball machine rental and tennis instruction are available.', 'Tennis', 'includes/tenis.png'),
(2, 'Stay fit on the go at our fully equipped athletic center, located on the first floor of our hotel. You will have access to Treadmills & ellipticals, Recumbent bikes, Weight machines, Functional training, Resistance training and certified personal trainers.', 'Gym', 'includes/gym.png'),
(3, 'Dive in our outdoor swimming pool and enjoy pure tranquility and relaxation. We have created a calming and comfortable environment where you can revive your spirit, awaken your senses and rejuvenate your body and mind.', 'Swimming', 'includes/pool.png'),
(4, 'Enjoy a quick breakfast, a cup of coffee, a latte and much more. Taste, hear, see, feel the rhythm and excite your palate with mouth-watering dishes and the wide assortment of cocktails, wine, and beer our bar and restaurant has to offer.', 'Dining & Drinks', 'includes/bar.png');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `pic_id` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`pic_id`, `photo`) VALUES
(1, '/hotel/roomImages/couples1.jpg'),
(2, '/hotel/roomImages/couples2.jpg'),
(3, '/hotel/roomImages/couples3.jpg'),
(4, '/hotel/roomImages/couples4.jpg'),
(5, '/hotel/roomImages/couples5.jpg'),
(6, '/hotel/roomImages/family1.jpg'),
(7, '/hotel/roomImages/fm2.jpg'),
(8, '/hotel/roomImages/fm3.jpg'),
(9, '/hotel/roomImages/fm4.jpg'),
(10, '/hotel/roomImages/KennedyRoom.jpg'),
(11, '/hotel/roomImages/single1.jpg'),
(12, '/hotel/roomImages/single2.jpg'),
(13, '/hotel/roomImages/single3.jpg'),
(14, '/hotel/roomImages/single4.jpg'),
(15, '/hotel/roomImages/single5.jpg'),
(16, '/hotel/roomImages/single6.jpg'),
(17, '/hotel/roomImages/st2.jpg'),
(18, '/hotel/roomImages/st3.jpg'),
(19, '/hotel/roomImages/st4.jpg'),
(20, '/hotel/roomImages/st5.jpg'),
(21, '/hotel/roomImages/standard1.jpg'),
(22, '/hotel/roomImages/suite1.jpg'),
(23, '/hotel/roomImages/suite2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `klient`
--

CREATE TABLE `klient` (
  `clientID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`clientID`, `name`, `lname`, `tel`, `email`) VALUES
(5, 'Enola', 'Selimi', '0692994008', 'enolaselimi@gmail.com'),
(6, 'Elio', 'Shehu', '0698166171', 'test@gmail.com'),
(8, 'Eneida', 'Koçi', '1234567890', 'eneida.koci@gmail.com'),
(9, 'Eneida', 'Koçi', '0692994008', 'K.eneida@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `rezervim`
--

CREATE TABLE `rezervim` (
  `resID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `resDate` date NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date DEFAULT NULL,
  `guests` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezervim`
--

INSERT INTO `rezervim` (`resID`, `roomID`, `clientID`, `resDate`, `checkIn`, `checkOut`, `guests`, `price`) VALUES
(3, 2, 5, '2023-04-15', '2023-04-15', '2023-04-17', 3, 30000.00),
(4, 2, 6, '2023-04-15', '2023-04-15', '2023-04-16', 2, 15000.00),
(8, 17, 9, '2023-04-17', '2023-04-20', '2023-04-23', 1, 39000.00);

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `staffID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `roli` enum('user','admin') NOT NULL,
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`staffID`, `fname`, `lname`, `email`, `pass`, `tel`, `roli`, `profile_pic`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '0691234567', 'admin', 'default.jpg'),
(3, 'eneida', 'koci', 'eneida@gmail.com', '93f6abfeff5280f7fe8d66efd4706791f621e03ce1a99ecbf8b6d84f24a71a6cd5897f53b499075a7989247e529aa74e485f6869043c73d0268736a3e89bd770', '068xxxxxxx', 'user', 'default.jpg'),
(4, 'elio', 'shehu', 'elio@gmail.com', 'fedc2aa4d2f7f079f3fb12dd732447c1296631e9a43628093cc1aa7b894b26f19ada1f8db10941e652ed504c9705e6925fbc2a8cae3c9af65d13c6261b54a1a0', '1234567890', 'user', 'default.jpg'),
(10, 'egli', 'tafa', 'egli@gmail.com', '93f6abfeff5280f7fe8d66efd4706791f621e03ce1a99ecbf8b6d84f24a71a6cd5897f53b499075a7989247e529aa74e485f6869043c73d0268736a3e89bd770', '0691239875', 'user', 'IMG-6436d1833fa900.96403475.jpg'),
(12, 'Gerald', 'Metohu', 'geri@gmail.com', 'ddc4ef28e140bf48ce7e5f21b755918832d24d4c0d24e522d79b34f916285b6c35410a867b3f123f08eac5bd3141a2b9aac60ad6424c3b6362f8eccb29fd2bf8', '', 'user', 'IMG-6436d2791d3f00.03301380.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dhoma`
--
ALTER TABLE `dhoma`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `dhoma_foto`
--
ALTER TABLE `dhoma_foto`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `dhome_foto_FK` (`roomID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `rezervim`
--
ALTER TABLE `rezervim`
  ADD PRIMARY KEY (`resID`),
  ADD KEY `res_klient_FK` (`clientID`),
  ADD KEY `res_dhoma_FK` (`roomID`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dhoma`
--
ALTER TABLE `dhoma`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dhoma_foto`
--
ALTER TABLE `dhoma_foto`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rezervim`
--
ALTER TABLE `rezervim`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staf`
--
ALTER TABLE `staf`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dhoma_foto`
--
ALTER TABLE `dhoma_foto`
  ADD CONSTRAINT `dhome_foto_FK` FOREIGN KEY (`roomID`) REFERENCES `dhoma` (`roomID`) ON DELETE CASCADE;

--
-- Constraints for table `rezervim`
--
ALTER TABLE `rezervim`
  ADD CONSTRAINT `res_dhoma_FK` FOREIGN KEY (`roomID`) REFERENCES `dhoma` (`roomID`) ON DELETE CASCADE,
  ADD CONSTRAINT `res_klient_FK` FOREIGN KEY (`clientID`) REFERENCES `klient` (`clientID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
