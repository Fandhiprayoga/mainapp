-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 11:52 PM
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
(3, 2, 4, 1),
(4, 1, 2, 1),
(5, 1, 3, 1),
(6, 1, 4, 1),
(7, 1, 6, 1),
(9, 2, 5, 1),
(10, 2, 6, 1),
(11, 1, 5, 1),
(12, 1, 7, 1),
(13, 2, 3, 0),
(14, 2, 7, 0),
(15, 1, 12, 1),
(16, 1, 14, 1),
(17, 1, 9, 1),
(19, 1, 11, 1),
(20, 1, 15, 1),
(21, 1, 16, 1);

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
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `nama_instansi` text,
  `alamat_instansi` text,
  `kepala_instansi` text,
  `nik_instansi` text,
  `logo_instansi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `nama_instansi`, `alamat_instansi`, `kepala_instansi`, `nik_instansi`, `logo_instansi`) VALUES
(1, 'PESANTREN MAHASISWA AN NAJAH PURWOKERTO', 'Jl. Moh. Besar, Dusun II Prompong, Kutasari, Baturraden, Kabupaten Banyumas, Jawa Tengah 531512', 'fandhi dhuga prayogaa', '0857603345634', 'e6bb6d1ccf27b1aff8ec98338ed2097f.png');

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
(3, 5, 'MASTER', 'fas fa-arrow-circle-right', 5),
(5, 6, 'PENDAFTARAN', 'fas fa-file-alt', 1),
(6, 5, 'INSTANSI', 'far fa-building', 3),
(7, 6, 'PENDAFTARAN ULANG', 'fas fa-recycle', 2),
(8, 6, 'ASRAMA DAN KELAS', 'fas fa-home', 3),
(9, 6, 'PEMBAYARAN INFAQ', 'fas fa-money-bill-alt', 4),
(10, 6, 'LAPORAN', 'fas fa-book', 7),
(11, 5, 'USTADZ & STAFF', 'fas fa-chalkboard-teacher', 4);

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
(6, 'MODUL PENDAFTARAN', 'far fa-registered', 'index.php/modul_pendaftaran/beranda', 2, 'Aktif'),
(7, 'MODUL TIGA', 'far fa-folder-open', '#', 5, 'Aktif'),
(14, 'MODUL EMPAT', 'fas fa-battery-empty', '#', 3, 'Aktif'),
(15, 'MODUL LIMA', 'fas fa-chart-bar', '#', 8, 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `mst_organisasi`
--

CREATE TABLE `mst_organisasi` (
  `id_organisasi` varchar(50) NOT NULL,
  `nama_organisasi` text,
  `jk_organisasi` varchar(10) DEFAULT NULL,
  `t_organisasi` varchar(50) DEFAULT NULL,
  `tl_organisasi` date DEFAULT NULL,
  `jabatan_organisasi` text,
  `foto_organisasi` text,
  `alamat_organisasi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_organisasi`
--

INSERT INTO `mst_organisasi` (`id_organisasi`, `nama_organisasi`, `jk_organisasi`, `t_organisasi`, `tl_organisasi`, `jabatan_organisasi`, `foto_organisasi`, `alamat_organisasi`) VALUES
('OR201818102', 'Ustadz H. Endang Husna Hadiawan, S.Ag.', '', '', '0000-00-00', 'PENGASUH ', NULL, 'JAWA BARAT'),
('OR201818103', 'Ustadzah Hj. Arbiyah Mahfudz, S.Q S.Th.I.', '', '', '0000-00-00', 'PENGASUH ', NULL, 'JAWA BARAT'),
('OR201818104', 'Kustia Ningsih, S.Pd.I.', '', '', '0000-00-00', 'KETUA YAYASAN', NULL, 'JAWA BARAT'),
('OR201818105', 'Inayatul Mustautinah', '', '', '0000-00-00', 'KETUA', NULL, 'JAWA BARAT'),
('OR201818106', 'Dhiya Tsuroyya', '', '', '0000-00-00', 'SEKRETARIS', NULL, 'JAWA BARAT'),
('OR201818107', 'Makhliyatul Haq', '', '', '0000-00-00', 'BENDAHARA', NULL, 'JAWA BARAT'),
('OR201818108', 'Ice Luciana S.Pd.I ', '', '', '0000-00-00', 'PENASEHAT UMUM', NULL, 'JAWA BARAT'),
('OR201818109', 'Nia Ainiyah, S.Ud.', '', '', '0000-00-00', 'PENASEHAT UMUM', NULL, 'JAWA BARAT'),
('OR201818110', 'Nur Hasanah S.Ag', '', '', '0000-00-00', 'PENASEHAT UMUM', NULL, 'JAWA BARAT'),
('OR201818111', 'Mia Fauziyah', '', '', '0000-00-00', 'DEPT PENDIDIKAN (KOOR)', NULL, 'JAWA BARAT'),
('OR201818112', 'Milkhatun Fadhilah', '', '', '0000-00-00', 'DEPT PENDIDIKAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818113', 'Ummi Channah', '', '', '0000-00-00', 'DEPT PENDIDIKAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818114', 'Nurul Hasanah', '', '', '0000-00-00', 'DEPT PENDIDIKAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818115', 'Hutri Rahayu', '', '', '0000-00-00', 'DEPT PENDIDIKAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818116', 'Hikmiyah', '', '', '0000-00-00', 'DEPT ?UBUDIYAH (KOOR)', NULL, 'JAWA BARAT'),
('OR201818117', 'Nurus Sinayah', '', '', '0000-00-00', 'DEPT ?UBUDIYAH (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818118', 'Luthfia Istiqomah ', '', '', '0000-00-00', 'DEPT ?UBUDIYAH (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818119', 'Nur Afiatul Azizah ', '', '', '0000-00-00', 'DEPT ?UBUDIYAH (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818120', 'Nikhlatun Naqiyah', '', '', '0000-00-00', 'DEPT KEBERSIHAN (KOOR)', NULL, 'JAWA BARAT'),
('OR201818121', 'Hilyatul Aulia', '', '', '0000-00-00', 'DEPT KEBERSIHAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818122', 'Ulfah Ahsanti', '', '', '0000-00-00', 'DEPT KEBERSIHAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818123', 'Ane Indriyani', '', '', '0000-00-00', 'DEPT KEBERSIHAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818124', 'Neli Andiani', '', '', '0000-00-00', 'DEPT KEBERSIHAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818125', 'Windy Nurul Q.', '', '', '0000-00-00', 'DEPT KEAMANAN (KOOR)', NULL, 'JAWA BARAT'),
('OR201818126', 'Fana Tri Astuti', '', '', '0000-00-00', 'DEPT KEAMANAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818127', 'Rosalina Nur Rizqi', '', '', '0000-00-00', 'DEPT KEAMANAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818128', 'Zainah Afiyah', '', '', '0000-00-00', 'DEPT KEAMANAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818129', 'Badriyatun Ni?mah', '', '', '0000-00-00', 'DEPT KESEHATAN (KOOR)', NULL, 'JAWA BARAT'),
('OR201818130', 'Innana Syarifah', '', '', '0000-00-00', 'DEPT KESEHATAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818131', 'Fitriyah', '', '', '0000-00-00', 'DEPT KESEHATAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818132', 'Reni Arisandi', '', '', '0000-00-00', 'DEPT KESEHATAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818133', 'Nuri Farikhatin', '', '', '0000-00-00', 'DEPT PERLENGKAPAN (KOOR)', NULL, 'JAWA BARAT'),
('OR201818134', 'Himmatul Haq ', '', '', '0000-00-00', 'DEPT PERLENGKAPAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818135', 'Zulfah Nur L.', '', '', '0000-00-00', 'DEPT PERLENGKAPAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818136', 'Sufiani', '', '', '0000-00-00', 'DEPT PERLENGKAPAN (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818137', 'Tsalisah Nur Jannah', '', '', '0000-00-00', 'DEPT DAPUR TAMU (KOOR)', NULL, 'JAWA BARAT'),
('OR201818138', 'Siti Hartati', '', '', '0000-00-00', 'DEPT DAPUR TAMU (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818139', 'Nurul Fitriani', '', '', '0000-00-00', 'DEPT DAPUR TAMU (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818140', 'Nida Fitriyani ', '', '', '0000-00-00', 'DEPT DAPUR TAMU (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818141', 'Nidyatul Qonita', '', '', '0000-00-00', 'DEPT DAPUR TAMU (ANGGOTA)', NULL, 'JAWA BARAT'),
('OR201818142', 'Rizki Ulia Lathifah', 'PEREMPUAN', '', '0000-00-00', 'DEPT DAPUR TAMU (ANGGOTA)', '04405015957355f96c20c5f6c5070fa4.jpg', 'JAWA BARAT'),
('OR999999999', 'SUPER ADMINISTRATOR', 'LAKI-LAKI', 'BANYUMAS', '1994-01-07', 'PROGRAMMER', 'f20d69f21f2c28e92e0814173a47b05d.jpg', 'PURWOKERTO');

-- --------------------------------------------------------

--
-- Table structure for table `mst_staff`
--

CREATE TABLE `mst_staff` (
  `id_staff` varchar(50) NOT NULL,
  `id_organisasi` varchar(50) DEFAULT NULL,
  `jabatan_staff` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_staff`
--

INSERT INTO `mst_staff` (`id_staff`, `id_organisasi`, `jabatan_staff`) VALUES
('SU201810171', 'OR201818102', 'SUPER ADMINISTRATOR'),
('SU201810172', 'OR201818104', 'SUPER ADMINISTRATOR'),
('US201810173', 'OR201818111', 'USTADZ');

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
(7, 11, 'Mng Ustadz & Staff', 'index.php/modul_admin/mst_staff', 1),
(9, 5, 'bbbbbbbbbbbbb', '#', 1),
(11, 5, 'cccccccccccc', '#', 1),
(12, 6, 'Setting Instansi', 'index.php/modul_admin/instansi', 1),
(14, 3, 'Master Data Organisasi', 'index.php/modul_admin/mst_organisasi', 1),
(15, 10, 'Laporan Pendaftaran', '#', 1),
(16, 10, 'Laporan Daftar Ulang', '#', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `id_organisasi` varchar(50) DEFAULT NULL,
  `group_user` int(11) DEFAULT NULL,
  `pass_user` varchar(8) DEFAULT NULL,
  `status_user` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_organisasi`, `group_user`, `pass_user`, `status_user`) VALUES
('admin', 'OR999999999', 1, 'admin', 'Aktif'),
('endang', 'OR201818102', 1, 'admin', 'Aktif');

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
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mst_organisasi`
--
ALTER TABLE `mst_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `organisasi_staff` (`id_organisasi`);

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
  ADD KEY `groupuser_user` (`group_user`),
  ADD KEY `organisasi_user` (`id_organisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_priv`
--
ALTER TABLE `group_priv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id_group_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Constraints for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD CONSTRAINT `organisasi_staff` FOREIGN KEY (`id_organisasi`) REFERENCES `mst_organisasi` (`id_organisasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `menu_submenu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `groupuser_user` FOREIGN KEY (`group_user`) REFERENCES `group_user` (`id_group_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organisasi_user` FOREIGN KEY (`id_organisasi`) REFERENCES `mst_organisasi` (`id_organisasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
