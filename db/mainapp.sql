-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 04:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_priv`
--

CREATE TABLE `group_priv` (
  `id` int(11) NOT NULL,
  `id_group_user` int(11) DEFAULT NULL,
  `id_submenu` int(11) DEFAULT NULL,
  `is_priv` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_priv`
--

INSERT INTO `group_priv` (`id`, `id_group_user`, `id_submenu`, `is_priv`) VALUES
(1, 1, 1, 1),
(2, 2, 10, 0),
(3, 2, 4, 1),
(4, 1, 2, 1),
(5, 1, 3, 1),
(6, 1, 4, 1),
(7, 1, 6, 1),
(8, 1, 8, 1),
(9, 2, 5, 1),
(10, 2, 6, 1),
(11, 1, 5, 1),
(12, 1, 7, 1),
(13, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id_group_user` int(11) NOT NULL,
  `nama_group_user` varchar(50) DEFAULT NULL,
  `keterangan_group_user` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id_group_user`, `nama_group_user`, `keterangan_group_user`) VALUES
(1, 'SUPER ADMIN', 'SUPER ADMIN'),
(2, 'ADMIN USER', 'ADMIN USER');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `nama_menu` varchar(20) DEFAULT NULL,
  `icon_menu` text,
  `order_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_modul`, `nama_menu`, `icon_menu`, `order_menu`) VALUES
(1, 5, 'MODUL', 'fas fa-boxes', 1),
(2, 5, 'USER', 'fab fa-centercode', 2),
(3, 5, 'MASTER', 'fas fa-arrow-circle-right', 3),
(4, 5, 'TEST 2', 'fas fa-chart-line', 4),
(5, 6, 'Lalalala', 'fab fa-bitcoin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `nama_modul` varchar(20) DEFAULT NULL,
  `icon` text,
  `link_modul` text,
  `order_modul` int(11) DEFAULT NULL,
  `status_aktif` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `nama_modul`, `icon`, `link_modul`, `order_modul`, `status_aktif`) VALUES
(5, 'MODUL ADMIN', 'fas fa-unlock-alt', 'index.php/modul_admin/beranda', 1, 'Aktif'),
(6, 'MODUL DUA', 'fas fa-address-card', '#', 2, 'Aktif'),
(7, 'MODUL TIGA', 'far fa-folder-open', '#', 5, 'Aktif'),
(14, 'MODUL EMPAT', 'fas fa-battery-empty', '#', 3, 'Aktif'),
(15, 'MODUL LIMA', 'fas fa-chart-bar', '#', 8, 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `nama_submenu` varchar(50) DEFAULT NULL,
  `link_submenu` text,
  `order_submenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `id_menu`, `nama_submenu`, `link_submenu`, `order_submenu`) VALUES
(1, 1, 'Modul', 'index.php/modul_admin/modul', 1),
(2, 1, 'Menu', 'index.php/modul_admin/menu', 2),
(3, 1, 'Submenu', 'index.php/modul_admin/submenu', 5),
(4, 2, 'User', 'index.php/modul_admin/user', 1),
(5, 2, 'Group User', 'index.php/modul_admin/group_user', 2),
(6, 2, 'Group Privilage', 'index.php/modul_admin/group_priv', 4),
(7, 3, 'Master Lain-lain2', '#', 1),
(8, 4, 'aaaaaaaaaaaa', '#', 1),
(9, 5, 'aaaaaaaaaaaaaaa', '#', 1),
(10, 5, 'bbbbbbbbbbbbbbb', '#', 1),
(11, 5, 'cccccccccccc', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `bagian_user` varchar(50) DEFAULT NULL,
  `group_user` int(11) DEFAULT NULL,
  `pass_user` varchar(8) DEFAULT NULL,
  `status_user` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `bagian_user`, `group_user`, `pass_user`, `status_user`) VALUES
('admin', 'Fandhi Dhuga Prayoga', 'TI', 1, 'admin', 'Aktif'),
('admin2', 'admin2', 'fdsfdsf', 2, 'admin2', 'Aktif'),
('admin4', 'admin4', 'aaaaaaaaa', 1, 'aaaaaa', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_priv`
--
ALTER TABLE `group_priv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_priv` (`id_group_user`),
  ADD KEY `submenu_priv` (`id_submenu`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id_group_user`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modul_menu` (`id_modul`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_submenu` (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `groupuser_user` (`group_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_priv`
--
ALTER TABLE `group_priv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id_group_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_priv`
--
ALTER TABLE `group_priv`
  ADD CONSTRAINT `group_user_priv` FOREIGN KEY (`id_group_user`) REFERENCES `group_user` (`id_group_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submenu_priv` FOREIGN KEY (`id_submenu`) REFERENCES `submenu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `modul_menu` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `menu_submenu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `groupuser_user` FOREIGN KEY (`group_user`) REFERENCES `group_user` (`id_group_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
