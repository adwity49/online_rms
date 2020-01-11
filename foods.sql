-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 12:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'BreakFast'),
(3, 'Lunch'),
(4, 'Dinner'),
(5, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_user`
--

CREATE TABLE `dashboard_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_full_name` varchar(255) DEFAULT NULL,
  `user_fb` varchar(255) DEFAULT NULL,
  `user_twiter` varchar(255) DEFAULT NULL,
  `user_insta` varchar(255) DEFAULT NULL,
  `user_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_user`
--

INSERT INTO `dashboard_user` (`user_id`, `user_name`, `user_role`, `user_password`, `user_full_name`, `user_fb`, `user_twiter`, `user_insta`, `user_img`) VALUES
(9, 'adwity', 'Founder', '81dc9bdb52d04dc20036dbd8313ed055', 'Adwity Chakraborty', 'profile.php?id=100009594621531', '#', 'adwity_chakraborty', '12549038_1532052667124539_9176181473373527805_n.jpg'),
(10, 'zannat', 'Finance', '81dc9bdb52d04dc20036dbd8313ed055', 'Raihany Zannat', '#', '#', 'iranyjannat7772018', 'Capture.PNG'),
(11, 'angkon', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohammad Angkon', 'bondhuhara.poet', 'poet_angkon', 'mohammad_angkon', '64411622_1063589670478339_3197792495505244160_o.jpg'),
(12, 'hizbul', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Hizbul Hasan Uzzal', 'uzzal.bondii', '#', 'hizbulhasanuzzal', '37909090_2092975324290706_3928083712037617664_n.jpg'),
(13, 'trisa', 'order_manager', '81dc9bdb52d04dc20036dbd8313ed055', 'Code Breaker', '#', '#', '#', '69508568_1216001971915374_671133625487458304_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_cat` varchar(255) NOT NULL,
  `item_location` varchar(255) NOT NULL,
  `item_status` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `item_img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_cat`, `item_location`, `item_status`, `item_price`, `item_details`, `item_img`) VALUES
(44, 'Swiss chard pancakes', '3', 'Mirpur', 'Available', '1500', 'Cook the pancakes: Heat a large skillet over medium-high heat and pour in a good puddle (1/4-inch deep) of oil. Once oil is hot enough that a droplet of batter hisses and sputters, spoon about 3 tablespoons batter in per pancake. It will spread quickly. C', '24291521846_fd2471fa6f_z.jpg'),
(45, 'Egg fried rice', '3', 'Dhanmondi', 'Available', '1100', 'This easy egg fried rice is something that I cook every other week. It\'s a no-fuss meal, made with seven key ingredients: rice, eggs, olive oil, onions, frozen vegetables, scallions, and soy sauce (option to add sesame oil). ... All you really need are ri', 'egg-fried-rice.jpg'),
(46, 'Veg fried rice', '3', 'Mohammadpur', 'Available', '2300', 'this is one of our favorite indo chinese recipe. as the flavors of the veggies really come out very well in this chinese fried rice recipe. it is also a vegan recipe and can be made gluten-free if you use gluten-free soy sauce.\r\n\r\nwhenever we order an ind', 'veg-fried-rice.jpg'),
(43, 'Vegitable Soup', '1', 'Uttora', 'Available', '1200', 'his Vegetable Soup has become one of my most popular soup recipes and for good reason! Itâ€™s healthy, itâ€™s comforting and 1,000 times better than what youâ€™ll get in a can! Full of flavor and so easy to make you canâ€™t go wrong with a big warm bowl o', 'thaisoup-shrimp.jpg'),
(42, 'Mutton Dry Fry', '1', 'Mohammadpur', 'Available', '2550', 'Cooking mutton. Wash mutton well under running water and drain it completely. Add ginger garlic paste, turmeric powder, salt, garam masala, onions and salt as needed. You can also add curd if desired. Cook on a low heat for 10 mins. Make sure mutton is co', 'maxresdefault.jpg'),
(41, 'Deep Fry Fish', '1', 'Dhanmondi', 'Available', '1980', 'Deep frying is popular worldwide, with deep-fried foods accounting for a large portion of global caloric consumption. Many foods are deep-fried and cultures surrounding deep frying have developed, most notably in the Southern United States and the United ', '1547589315824.jpeg'),
(40, 'Grilled Chicken Salad', '1', 'Mirpur', 'Available', '2320', 'Grilled Chicken Salad Recipe â€“ perfect juicy grilled chicken, grilled corn off the cob, tomatoes, lettuce, avocado and onion make for a delicious summer salad! Simple oil and vinegar dressing is the perfect finishing touch.', 'easy-grilled-chicken-salad-1.jpg'),
(47, 'Sweet and sour shrimps', '3', 'Uttora', 'Available', '1899', 'the sweet and sour sauce combine honey, rice vinegar, soy sauce, tomato paste, and pineapple juice. Make a cornstarch slurry. Season shrimp with salt and pepper. Cook shrimp with vegetables and sesame oil. Stir-fry bell pepper, zucchini, garlic, ginger, a', 'sweet-and-sour-shrimp-6.jpg'),
(48, 'Makhni Paneer Biryani', '4', 'Mirpur', 'Available', '2890', 'ried paneer cubes doused in a creamy gravy, layered with rice and cooked \'dum\' style. A perfect biryani recipe fro vegetarians and a paneer lover\'s delight!', 'makhni-paneer-biryani_620x330_61506598663.jpg'),
(49, 'Masala Bhindi', '4', 'Dhanmondi', 'Available', '1350', 'A delicious, spicy Okra made in a jiffy for a quick meal. Bhindi is a vegetable loved by kids and adults alike and is often made in north indian homes because how easily it can be made as a dry sabzi', 's3gsb3co_fffff_625x300_04_January_19.jpg'),
(50, 'Vegetarian Burritos', '4', 'Mohammadpur', 'Available', '1890', 'Discover healthy eating with this delicious Mexican burritos recipe. Tortillas packed with a kidney beans and cheese mix, served with the sensational salsa sauce.', 'vegetarian burritos-620.jpg'),
(51, 'Vegetarian Khow Suey', '4', 'Uttora', 'Available', '1480', 'Khow suey is a one-pot meal with noodles and veggies cooked in coconut milk and garnished with peanuts and fried garlic. Explore this Burmese delicacy bursting with authentic flavours.', 'Vegetarian Khow Suey.jpg'),
(52, 'GIN GIN MULE', '5', 'Mirpur', 'Available', '4500', 'You might do a double-take when you see the Gin Gin Mule on the list of the worldâ€™s most popular cocktails. This newcomer is a cross between a Moscow Mule and a Mojito, with gin starring in the show. The creative cocktail was first made in 2000 by Audre', '2019cocktails_internal_ginginmule.jpg'),
(53, 'SIDECAR', '5', 'Dhanmondi', 'Available', '4200', 'Brandy, tragically underrepresented on this list, earns a well-deserved moment in the worldwide spotlight as the star of one of the worldâ€™s most-ordered cocktails. The Sidecar is a good place to start for those not familiar with the category-spanning sp', 'sidecar-inside.jpg'),
(54, 'AMARETTO SOUR', '5', 'Mohammadpur', 'Available', '4099', 'n a victorious climb from No. 41 in 2017, the Amaretto Sour is both a staple at the worldâ€™s best bars, and a drink weâ€™ve compared to a liquid Sour Patch Kid. Itâ€™s both sweet from the nutty amaretto, and sour from lemon juice, while egg white smooths', '2019cocktails_internal_amarettosour.jpg'),
(55, 'BOULEVARDIER', '5', 'Uttora', 'Available', '3500', 'A VinePair staff favorite, the Boulevardier is the Negroniâ€™s fraternal twin that utilizes whiskey instead of gin. Itâ€™s simply equal parts rye, amaro, and sweet vermouth. Garnish with an orange twist, and youâ€™ve got yourself an afternoon.', '2019cocktails_internal_boulevardier.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `orders_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `orders_item_id` int(11) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_number` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `total_orders_item` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `orders_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `orders_status` int(11) NOT NULL DEFAULT 0,
  `product_rating` int(11) NOT NULL DEFAULT 5,
  `deliver_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`orders_id`, `customer_id`, `orders_item_id`, `receiver_name`, `receiver_number`, `receiver_address`, `total_orders_item`, `total_bill`, `payment_method`, `orders_date`, `orders_status`, `product_rating`, `deliver_status`) VALUES
(16, 18, 41, 'xyz', '01800000000', 'house no:3,lane:8, Block :A, uttara,Dhaka', 1, 1980, 'card', '2019-12-28 16:11:32', 1, 4, 1),
(17, 17, 54, 'xyz', '01800000000', 'house no:3,lane:8, Block :A, uttara,Dhaka', 1, 4099, 'card', '2019-12-28 18:08:05', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_card` varchar(255) NOT NULL,
  `user_card_balance` int(255) NOT NULL DEFAULT 10000,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_email`, `user_name`, `user_card`, `user_card_balance`, `user_pass`) VALUES
(17, 'abc@gmail.com', 'abc', '123456789', 5901, '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'xyz@gmail.com', 'xyz@gmail.com', '101112131', 8020, '81dc9bdb52d04dc20036dbd8313ed055'),
(19, 'guest@gmail.com', 'guesr one', '203040506', 10000, '81dc9bdb52d04dc20036dbd8313ed055'),
(20, 'hello@gmail.com', 'example', '807060504', 10000, '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
