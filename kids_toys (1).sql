-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 08:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kids_toys`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_cart` decimal(10,0) NOT NULL,
  `coupon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Creative Toys'),
(2, 'Dolls'),
(3, 'Educational Toys'),
(4, 'Electronic Toys');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `msg_txt` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `msg_txt`, `date`) VALUES
(28, 'samaar', '2022-05-22 10:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(14,0) NOT NULL,
  `status` int(1) NOT NULL,
  `category_id` int(255) NOT NULL,
  `code` varchar(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `discount` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `status`, `category_id`, `code`, `img`, `discount`) VALUES
(1, 'Puzzle Squares', 'This Grimm\'s Puzzle Square Booklet is designed to be used directly with the Grimm\'s Puzzle Square, allowing you to follow along and build 20 creative puzzle designs.', '15', 1, 1, '', '../img/cat1/1.webp', ''),
(2, 'Rainbow Coloured Beads', 'Grimm’s coloured wooden beads. Wooden beads are one of the most basic play materials for children. Sorting and threading develops hand-eye coordination and fine motor skills and is just simple fun. This bag of beads contains 480 12mm wooden beads in 12 ra', '16', 0, 1, '', '../img/cat1/2.png', ''),
(3, 'Building Set Houses', 'This Grimm’s wooden house set provides cute little buildings for the creation of townscapes and villages with barns and churches. It can also be used in conjunction with every wooden rail and road set. Because of the simple shape of each piece it is easy ', '18', 0, 1, '', '../img/cat1/3.jpg', ''),
(4, 'Marbling Paint Art', 'Unleash & spark your creativity: Instead of painting on paper or canvas, try painting on... water! Our special painting process lets you create dazzling artwork in a completely new way.', '10', 0, 1, '', '../img/cat1/4.jpg', ''),
(5, 'Flower Garden Preschool Toys', 'PLAY AND PRETEND - Create your own pretend play flower garden in an ultimate sensory play experience! Engage the senses with a unique play space bin filled with easy to mold sensory sand in 2 colors, faux flowers and critters, shovel, tongs and more!', '12', 1, 1, 'MST2', '../img/cat1/5.jpg', 'img/cat1/5.jpg'),
(6, 'Brain Flakes 500 Piece', 'The original Brain Flakes ; Includes over 500 interconnecting discs and a durable plastic jar for easy storage ; Every set comes with an idea booklet with instructions to build a Brain Flakes ball ; Discs easily click together for ages 5+ with some childr', '18', 1, 1, '', '../img/cat1/6.jpg', ''),
(7, 'Think Fun Gravity Maze Marble Run Brain Game', 'Trusted by Families Worldwide - With over 50 million sold, ThinkFun is the world\'s leading manufacturer of brain games and mind challenging puzzles', '30', 1, 1, '', '../img/cat1/7.jpg', ''),
(8, 'Blippi My First Science Kit: Kitchen Science Lab', 'Join Blippi Science: Execute 4 different kitchen science experiments: milk movement patterns, gooey oobleck, a lava lamp and real ice cream', '18', 0, 1, '', '../img/cat1/8.jpg', ''),
(9, 'Bu-buildup BBU.01.002 Flower Building Toys', 'Great for kids to play - The 98 PCS flower toys are about real flower size, color of each piece is bright and saturate, edge of each part is thick and smooth. Pieces are easy to fit together and easy to take apart but nicely combined.', '23', 0, 1, '', '../img/cat1/9.jpg', ''),
(10, 'DIY 3D Puzzle Series, Educational Toy 3D', ' Set contains 6 types of aircraft & helicopter puzzles select high quality natural 3mm boards, environmentally friendly, safe and non-toxic', '29', 1, 1, '', '../img/cat1/10.jpg', ''),
(11, 'Makeblock mBot Ultimate 10-in-1 Coding Robot Kit\r\n', 'Perfect choice to begin or expand your robotic adventures - Ultimate has more than 550 mechanical parts and electronic modules which can be used in multiple configurations to build your robots.\r\n', '100', 1, 4, '', '../img/cat4/1.jpg', ''),
(12, 'Coplus 5 in 1 STEM Robot Building ki\n', '5-in-1 RC Building Kit STEM Robot building toy can be built into 5 models: Robot /Racing Tank/Tracked Cars.This toys have a flexible rotating head & arm,interesting and novel transforming.It allows kids explore more imaginations and creativity and exercis', '50', 1, 4, 'MST2', '../img/cat4/2.jpg', 'img/cat4/2.jpg'),
(13, 'Cool City Police Toy for Kids', 'THRILLING STORYLINE: Two robbers were spotted by the police when they were robbing the self-service ATM. Then robbers drove fleeing on a motorbike, the police drove a police car and a prison car chasing the robbers on the highway, they launched a series o', '22', 1, 4, '', '../img/cat4/3.jpg', ''),
(14, 'Ingenious Machines DIY RC Construction Vehicle Building Kit', '240 PIECES: This Construction Crew Vehicle Building Kit includes a massive 240 pieces that can be used to build 4 different construction vehicles. These include a crane, Forklift Truck, Bulldozer and Dump Truck. One of the best toys for boys aged 6, 7, 8,', '38', 0, 4, '', '../img/cat4/4.jpg', ''),
(15, '884 PCS Army Military City Police Station Building Kit\r\n', 'Realistic Detail for Role-playing Fun, Endless Imagination & Creativity, Clear & Easy To Follow Instructions, pecial Gift Ideas.\r\n', '30', 1, 4, '', '../img/cat4/5.jpg', ''),
(16, 'Robot spinner\r\n', 'BUILD WORKING GIZMOS AND GADGETS with the Action Circuitry Electronic Experiment Mini Set from Discovery #MINDBLOWN! All you need is this kit and 2 AA batteries (not included) to experience pure electric fun.', '17', 1, 4, '', '../img/cat4/6.jpg', ''),
(17, 'Snap Circuits Snaptricity, Electronics Exploration Kit.\r\n', 'With snaptricity, young engineers can build over 75 projects, These building sets are a great introduction in how electricity and magnets work.\r\n', '31', 1, 4, '', '../img/cat4/7.jpg', ''),
(18, 'VANLINNY Smart Robot Arm Kit,2-in 1 Science Kits.\r\n', 'High-Tech & 2-in-1: The combination of smart robotic cars and robotic arms, to achieve the design concept of learning in the game, Multiple Functions: This science kits for kids age 8-12 can move at multiple angles while the robotic arm can rise and fall ', '90', 0, 4, '', '../img/cat4/8.jpg', ''),
(19, 'Music Box Model Kits DIY Creative Craft Toys \r\n', 'This 3D wooden Robotic puzzle music box with bendable arms and legs for a variety of poses.', '32', 0, 4, '', '../img/cat4/9.jpg', ''),
(20, 'Microscope for Kids LINKMICRO Science Kit', 'LINKMICRO Kids Beginner Microscope embraces 2-inch LCD screen and built-in bracket that flips out and can rotates 90-180degrees, full of science and technology sense, your kids\' first cool microscope toy!, Brand new appearance, weighs only 134g, 100% port', '40', 1, 4, '', '../img/cat4/10.jpg', ''),
(21, 'Djeco - Pinstou Wooden Puzzle', 'An adorable and sweet skill-building game for pre-schoolers. Use the wooden chopsticks to pick up the tokens and place them in the right sequence. A set of cards help guide the little ones with how many of each token you need and in what order.\r\n', '51', 1, 3, '', '../img/cat3/1.png', ''),
(22, 'Book - Dreaming of Australia', 'A delightful Australian alphabet that travels the country highlighting the expected and unexpected.', '20', 1, 3, 'MST2', '../img/cat3/2.png', 'img/cat3/2.png'),
(23, 'Chameleon Reader Set (PRE-ORDER)', 'Chameleon Reader - the audio reading system for children to \"read\" independently.\r\nYour audio plays from the Chameleon Reader when it touches the chameleon stickers in your books. Compatible with all your books!', '19', 1, 3, '', '../img/cat3/3.png', ''),
(24, 'Tender Leaf Counting Carrots Wooden Stacker\r\n', 'How many carrots can the bunny eat? This carrot stacker with its sweet bunny has the added benefits of introducing numbers, colours, sorting and stacking.\r\nSuitable for ages: 18+ Months', '40', 1, 3, '', '../img/cat3/4.png', ''),
(25, 'Learn & Grow Magnetic Tiles ', 'Featuring our new and exclusively designed large square. We had added magnets through the large square to expand building capabilities.  ', '60', 1, 3, 'MST2', '../img/cat3/5.png', 'img/cat3/5.png'),
(26, 'Learn & Grow Magnetic Ball Run - Expansion Pack', 'Turn your magnetic tiles into Ball Runs!!\r\nThis fantastic expansion pack will take your magnetic tiles and create a whole new range of play and exploration opportunities. ', '60', 1, 3, '', '../img/cat3/6.png', ''),
(27, 'Learning Resources - Super Sorting Pie', 'Learning Styles: Visual, TactileSkill Development: Fine Motor skills, Eye-hand coordination, Problem solving, Sorting, Matching, Patterning, Early math skills (Counting, Addition & Subtraction), Vocabulary building.', '25', 1, 3, '', '../img/cat3/7.png', ''),
(28, 'Learn & Grow - Metal Rimmed Counting Chips', 'Our new Learn and Grow Metal Rimmed Chips are now rust resistant!!!\r\nPerfect for water sensory play.\r\nThese metal rimmed counters are a perfect addition to any sensory tub. Hide the chips in coloured rice and let your little one explore with a magnetic wa', '31', 1, 3, '', '../img/cat3/8.png', ''),
(29, 'Book - Hidden World Forest', 'Learn about the flora and fauna of the forest in this beautifully illustrated, multi-flap book. Each spread is themed, with six flaps opening to reveal sumptuous illustrations and fun, bite-sized facts. ', '25', 0, 3, '', '../img/cat3/9.png', ''),
(30, 'Original Lock Box', 'Fantastic activity box to teach children how to open up different compartments with various locks and catches.\r\nPerfect for developing fine motor skills and dexterity.\r\n', '41', 1, 3, '', '../img/cat3/10.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `First_Name` text NOT NULL,
  `Sec_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Num` int(14) NOT NULL,
  `Password` varchar(14) NOT NULL,
  `con_Password` varchar(14) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `First_Name`, `Sec_Name`, `Last_Name`, `Email`, `Phone_Num`, `Password`, `con_Password`, `DOB`) VALUES
(1, 'Samar', 'samar', 'sayaydeh', 'samar@gmail.com', 2147483647, 'Samarahmad*1', 'Samarahmad*1', '1998-03-16'),
(3, 'omaar', 'ibraheem', 'sayaydeh', 'omar@yahoo.com', 2147483647, 'Samara*1', 'Samara*1', '1998-03-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `frr` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_product` (`category_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `frr` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
