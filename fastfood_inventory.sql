-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 03:37 PM
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
-- Database: `fastfood_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin1', 'password1'),
(2, 'admin2', 'password2'),
(3, 'admin3', 'password3'),
(4, 'admin4', 'password4');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_phone`, `order_id`) VALUES
(1, 'John Doe', '5551234567', 1),
(2, 'Manya Khater', '5552345678', 2),
(3, 'Adyasha Mahanta', '5553456789', 3),
(4, 'Samantha Brown', '1111111111', 4),
(5, 'Mark Lee', '2222222222', 5),
(6, 'Sarah Williams', '3333333333', 6),
(7, 'David Rodriguez', '4444444444', 7),
(8, 'Lisa Garcia', '5555555555', 8),
(9, 'Eric Chen', '6666666666', 9),
(10, 'Jasmine Kim', '7777777777', 10),
(11, 'Tommy Nguyen', '8888888888', 11),
(12, 'Angela Davis', '9999999999', 12),
(13, 'Mike Taylor', '5551234567', 13),
(14, 'Emily Martinez', '5559876543', 14),
(15, 'Ryan Hernandez', '5552468240', 15),
(16, 'Stephanie Perez', '5551357904', 16),
(17, 'Justin Turner', '5558765432', 17),
(18, 'Megan Wilson', '5554682468', 18),
(19, 'Timothy Robinson', '5555791357', 19),
(20, 'Kelly Allen', '5552461357', 20),
(21, 'Rachel King', '5551352468', 21),
(22, 'Kevin Scott', '5554685791', 22),
(23, 'Bethany White', '5555794682', 23),
(24, 'Derek Lee', '5552465791', 24);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ing_id` int(11) NOT NULL,
  `ing_name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `cost_per_unit` decimal(10,0) NOT NULL,
  `sup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `ing_name`, `stock`, `cost_per_unit`, `sup_id`) VALUES
(1, 'Flour', 500, 5, 1),
(2, 'Sugar', 250, 3, 2),
(3, 'Salt', 100, 2, 3),
(4, 'Eggs', 200, 8, 4),
(5, 'Milk', 300, 4, 5),
(6, 'Butter', 150, 6, 6),
(7, 'Cheese', 100, 7, 7),
(8, 'Tomatoes', 50, 3, 8),
(9, 'Lettuce', 75, 2, 9),
(10, 'Onions', 100, 1, 10),
(11, 'Peppers', 50, 2, 11),
(12, 'Chicken', 100, 10, 12),
(13, 'Beef', 75, 12, 13),
(14, 'Pork', 50, 9, 14),
(15, 'Fish', 25, 15, 15),
(16, 'Shrimp', 50, 18, 16),
(17, 'Rice', 200, 3, 17),
(18, 'Beans', 100, 2, 18),
(19, 'Potatoes', 75, 1, 19),
(20, 'Corn', 50, 2, 20),
(21, 'Peas', 25, 3, 21),
(22, 'Carrots', 50, 2, 22),
(23, 'Garlic', 75, 1, 23),
(24, 'Ginger', 50, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `order_qty` int(11) NOT NULL,
  `discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `product_id`, `c_id`, `total`, `order_qty`, `discount`) VALUES
(1, '2022-01-01 10:00:00', 1, 1, 5, 1, 0),
(2, '2022-01-01 11:00:00', 2, 2, 10, 2, 0),
(3, '2022-01-01 12:00:00', 3, 3, 8.5, 1, 0),
(4, '2022-01-02 13:00:00', 4, 4, 6, 1, 0),
(5, '2022-01-02 14:30:00', 5, 5, 15, 3, 0),
(6, '2022-01-03 15:00:00', 6, 6, 4.5, 1, 0),
(7, '2022-01-04 16:00:00', 7, 7, 12, 2, 0),
(8, '2022-01-05 17:00:00', 8, 8, 7, 1, 0),
(9, '2022-01-05 18:00:00', 9, 9, 11.5, 2, 0),
(10, '2022-01-06 19:00:00', 10, 10, 3, 1, 0),
(11, '2022-01-07 10:00:00', 11, 11, 14, 2, 0),
(12, '2022-01-07 11:00:00', 12, 12, 5.5, 1, 0),
(13, '2022-01-08 12:00:00', 13, 13, 8, 2, 0),
(14, '2022-01-08 13:00:00', 14, 14, 6.5, 1, 0),
(15, '2022-01-09 14:00:00', 15, 15, 9, 1, 0),
(16, '2022-01-10 15:00:00', 16, 16, 10.5, 2, 0),
(17, '2022-01-10 16:00:00', 17, 17, 4, 1, 0),
(18, '2022-01-10 17:00:00', 18, 18, 6.5, 1, 0),
(19, '2022-01-11 18:00:00', 19, 19, 11, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `in_stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `price`, `in_stock`) VALUES
(1, 'Hamburger', 'Burgers', 6, 1),
(2, 'Cheeseburger', 'Burgers', 7, 1),
(3, 'Chicken Sandwich', 'Sandwiches', 8, 1),
(4, 'French Fries', 'Sides', 3, 1),
(5, 'Onion Rings', 'Sides', 4, 1),
(6, 'Soft Drink', 'Beverages', 2, 1),
(7, 'Milkshake', 'Beverages', 5, 1),
(8, 'Ice Cream', 'Desserts', 4, 1),
(9, 'Chicken Nuggets', 'Appetizers', 5, 1),
(10, 'Salad', 'Salads', 7, 1),
(11, 'Fish Sandwich', 'Sandwiches', 9, 1),
(12, 'Chicken Wrap', 'Wraps', 8, 1),
(13, 'Veggie Burger', 'Burgers', 7, 1),
(14, 'Hot Dog', 'Hot Dogs', 4, 1),
(15, 'Nachos', 'Appetizers', 6, 1),
(16, 'Chicken Tenders', 'Appetizers', 7, 1),
(17, 'Pizza', 'Pizzas', 10, 1),
(18, 'BBQ Ribs', 'Entrees', 13, 1),
(19, 'Shrimp Basket', 'Seafood', 10, 1),
(20, 'Grilled Cheese', 'Sandwiches', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_date` datetime NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `sale_total` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_date`, `sale_qty`, `sale_total`, `product_id`) VALUES
('2023-04-01 12:15:30', 3, 18, 1),
('2023-04-01 14:30:45', 2, 14, 3),
('2023-04-01 16:45:20', 1, 6, 14),
('2023-04-02 10:00:00', 4, 28, 2),
('2023-04-02 11:30:15', 1, 7, 9),
('2023-04-02 13:45:30', 3, 21, 6),
('2023-04-03 09:15:00', 2, 12, 4),
('2023-04-03 12:30:45', 1, 4, 15),
('2023-04-03 15:00:30', 5, 50, 17),
('2023-04-04 10:30:00', 3, 24, 11),
('2023-04-04 14:15:45', 2, 16, 12),
('2023-04-04 17:30:30', 1, 7, 7),
('2023-04-05 11:00:00', 4, 20, 5),
('2023-04-05 13:45:30', 2, 10, 8),
('2023-04-05 16:15:45', 1, 5, 10),
('2023-04-06 09:30:00', 3, 15, 16),
('2023-04-06 12:00:30', 1, 10, 13),
('2023-04-06 15:30:45', 2, 18, 18),
('2023-04-07 10:15:00', 4, 48, 19),
('2023-04-07 14:30:30', 3, 36, 20);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_qty` int(11) NOT NULL,
  `ing_id` int(11) NOT NULL,
  `sup_contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `sup_name`, `sup_qty`, `ing_id`, `sup_contact`) VALUES
(1, 'Supplier A', 100, 1, '1234567890'),
(2, 'Supplier B', 50, 2, '9876543210'),
(3, 'Supplier C', 200, 3, '4567890123'),
(4, 'Supplier D', 75, 4, '7890123456'),
(5, 'Supplier E', 150, 5, '2345678901'),
(6, 'Supplier F', 100, 6, '8901234567'),
(7, 'Supplier G', 50, 7, '5678901234'),
(8, 'Supplier H', 200, 8, '0123456789'),
(9, 'Supplier I', 75, 9, '6789012345'),
(10, 'Supplier J', 150, 10, '3456789012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ing_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_date`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sup_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
