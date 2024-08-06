-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2024 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";

--
-- Database: `cegis`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `is_required` enum('0','1') NOT NULL DEFAULT '1',
  `quantity_available` int(11) NOT NULL DEFAULT 0,
  `quantity_working_condition` int(11) NOT NULL DEFAULT 0,
  `quantity_reductant` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset_name`, `is_required`, `quantity_available`, `quantity_working_condition`, `quantity_reductant`, `user_id`, `school_id`, `created_on`, `updated_on`) VALUES
(2, 'Desk', '1', 100, 10, 90, 1, 1, '2024-08-06 13:09:02', '2024-08-06 13:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `tehsil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `block_name`, `tehsil_id`) VALUES
(1, 'A Block', 3),
(2, 'B Block', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `blockname`
-- (See below for the actual view)
--
CREATE TABLE `blockname` (
`id` int(11)
,`block_name` varchar(255)
,`tehsil_id` int(11)
,`tehsil_name` varchar(255)
,`district_id` int(11)
,`district_name` varchar(255)
,`states_id` int(11)
,`states_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `states_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `states_id`) VALUES
(1, 'North Delhi', 1),
(2, 'South Delhi', 1),
(3, 'East Delhi', 1),
(4, 'West Delhi', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `districtname`
-- (See below for the actual view)
--
CREATE TABLE `districtname` (
`id` int(11)
,`district_name` varchar(255)
,`states_id` int(11)
,`states_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `schoolname`
-- (See below for the actual view)
--
CREATE TABLE `schoolname` (
`id` int(11)
,`name` varchar(255)
,`type` varchar(255)
,`block_id` int(11)
,`status` enum('0','1')
,`user_id` int(11)
,`created_on` datetime
,`updated_on` datetime
,`block_name` varchar(255)
,`district_name` varchar(255)
,`states_name` varchar(255)
,`full_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `block_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `type`, `block_id`, `status`, `user_id`, `created_on`, `updated_on`) VALUES
(1, 'Delhi', 'Govt', 1, '1', 1, '2024-08-06 11:51:26', '2024-08-06 12:41:18'),
(2, 'Delhi', 'Private', 1, '1', 1, '2024-08-06 11:51:42', '2024-08-06 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `states_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `states_name`) VALUES
(1, 'Delhi'),
(2, 'Punjab');

-- --------------------------------------------------------

--
-- Table structure for table `tehsil`
--

CREATE TABLE `tehsil` (
  `id` int(11) NOT NULL,
  `tehsil_name` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tehsil`
--

INSERT INTO `tehsil` (`id`, `tehsil_name`, `district_id`) VALUES
(3, 'Laxmi Nagar', 3),
(4, 'Pandav Nagar', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tehsilname`
-- (See below for the actual view)
--
CREATE TABLE `tehsilname` (
`id` int(11)
,`tehsil_name` varchar(255)
,`district_id` int(11)
,`district_name` varchar(255)
,`states_id` int(11)
,`states_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `status`, `created_on`, `updated_on`, `last_login`) VALUES
(1, 'test', 'ae2b1fca515949e5d54fb22b8ed95575', 'Jatin', '1', '2024-08-06 09:55:32', '2024-08-06 09:55:32', '2024-08-06 11:48:47');

-- --------------------------------------------------------

--
-- Structure for view `blockname`
--
DROP TABLE IF EXISTS `blockname`;

CREATE VIEW `blockname`  AS SELECT `a`.`id` AS `id`, `a`.`block_name` AS `block_name`, `a`.`tehsil_id` AS `tehsil_id`, `b`.`tehsil_name` AS `tehsil_name`, `b`.`district_id` AS `district_id`, `b`.`district_name` AS `district_name`, `b`.`states_id` AS `states_id`, `b`.`states_name` AS `states_name` FROM (`block` `a` join `tehsilname` `b` on(`a`.`tehsil_id` = `b`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `districtname`
--
DROP TABLE IF EXISTS `districtname`;

CREATE VIEW `districtname`  AS SELECT `a`.`id` AS `id`, `a`.`district_name` AS `district_name`, `a`.`states_id` AS `states_id`, `b`.`states_name` AS `states_name` FROM (`district` `a` join `states` `b` on(`a`.`states_id` = `b`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `schoolname`
--
DROP TABLE IF EXISTS `schoolname`;

CREATE VIEW `schoolname`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `name`, `a`.`type` AS `type`, `a`.`block_id` AS `block_id`, `a`.`status` AS `status`, `a`.`user_id` AS `user_id`, `a`.`created_on` AS `created_on`, `a`.`updated_on` AS `updated_on`, `b`.`block_name` AS `block_name`, `b`.`district_name` AS `district_name`, `b`.`states_name` AS `states_name`, `c`.`full_name` AS `full_name` FROM ((`schools` `a` join `blockname` `b` on(`a`.`block_id` = `b`.`id`)) join `users` `c` on(`a`.`user_id` = `c`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tehsilname`
--
DROP TABLE IF EXISTS `tehsilname`;

CREATE VIEW `tehsilname`  AS SELECT `a`.`id` AS `id`, `a`.`tehsil_name` AS `tehsil_name`, `a`.`district_id` AS `district_id`, `b`.`district_name` AS `district_name`, `b`.`states_id` AS `states_id`, `b`.`states_name` AS `states_name` FROM (`tehsil` `a` join `districtname` `b` on(`a`.`id` = `b`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district_name` (`district_name`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_name` (`states_name`);

--
-- Indexes for table `tehsil`
--
ALTER TABLE `tehsil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tehsil_name` (`tehsil_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usernm` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tehsil`
--
ALTER TABLE `tehsil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
