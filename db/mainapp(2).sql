-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 06:46 PM
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
-- Table structure for table `bayar_infaq`
--

CREATE TABLE `bayar_infaq` (
  `id_bayar_infaq` int(11) NOT NULL,
  `id_pendaftaran` varchar(50) DEFAULT NULL,
  `id_infaq` int(11) DEFAULT NULL,
  `status_bayar_infaq` tinyint(4) DEFAULT '0',
  `tgl_bayar_infaq` date DEFAULT NULL,
  `dump_bayar_infaq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar_infaq`
--

INSERT INTO `bayar_infaq` (`id_bayar_infaq`, `id_pendaftaran`, `id_infaq`, `status_bayar_infaq`, `tgl_bayar_infaq`, `dump_bayar_infaq`) VALUES
(31, 'SA199507061', 8, 1, '2018-11-15', '2018-11-14 18:34:45'),
(32, 'SA200211061', 8, 1, '2018-11-15', '2018-11-14 18:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ulang`
--

CREATE TABLE `daftar_ulang` (
  `id_daftar_ulang` int(11) NOT NULL COMMENT 'id daftar ulang',
  `id_pendaftaran` varchar(50) DEFAULT NULL COMMENT 'id_pedaftaran dri tbl pendaftaran',
  `ijazah_daftar_ulang` text COMMENT 'nama fil eijazah',
  `kk_daftar_ulang` text COMMENT 'nama file kk',
  `yatim_daftar_ulang` text COMMENT 'nama file surat yatim',
  `infaq_daftar_ulang` text COMMENT 'nama file bukti bayar infaq',
  `status_daftar_ulang` tinyint(1) DEFAULT '0' COMMENT 'status diterima atau tidak',
  `dump_daftar_ulang` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'waktu terakhir edit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ulang`
--

INSERT INTO `daftar_ulang` (`id_daftar_ulang`, `id_pendaftaran`, `ijazah_daftar_ulang`, `kk_daftar_ulang`, `yatim_daftar_ulang`, `infaq_daftar_ulang`, `status_daftar_ulang`, `dump_daftar_ulang`) VALUES
(30, 'SA199507061', '4dde6c20e14811d94687290ea0748261.pdf', 'e585643bb9a715a801d7f72b78f962a6.pdf', NULL, 'santri_lama', 1, '2018-11-14 17:07:23'),
(32, 'SA200211061', NULL, NULL, NULL, 'santri_lama', 1, '2018-11-14 18:41:13');

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
(22, 1, 17, 1),
(23, 1, 18, 1),
(24, 1, 19, 1),
(25, 1, 20, 1),
(26, 1, 21, 1),
(27, 1, 22, 1),
(28, 1, 23, 1);

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
-- Table structure for table `kelas_asrama`
--

CREATE TABLE `kelas_asrama` (
  `id_kelas_asrama` int(11) NOT NULL,
  `id_santri` varchar(50) DEFAULT NULL,
  `id_asrama` int(11) DEFAULT '0',
  `id_kelas` int(11) DEFAULT '0',
  `dump_kelas_santri` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_asrama`
--

INSERT INTO `kelas_asrama` (`id_kelas_asrama`, `id_santri`, `id_asrama`, `id_kelas`, `dump_kelas_santri`) VALUES
(10, 'SA199507061', 0, 0, '2018-11-14 17:07:23'),
(12, 'SA200211061', 0, 0, '2018-11-14 18:41:13');

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
(7, 6, 'PENDAFTARAN ULANG', 'fas fa-recycle', 3),
(8, 6, 'ASRAMA DAN KELAS', 'fas fa-home', 5),
(9, 6, 'PEMBAYARAN INFAQ', 'fas fa-money-bill-alt', 2),
(11, 5, 'USTADZ & STAFF', 'fas fa-chalkboard-teacher', 4),
(12, 6, 'DATA SANTRI', 'fas fa-user-graduate', 4);

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
-- Table structure for table `mst_asrama`
--

CREATE TABLE `mst_asrama` (
  `id_asrama` int(11) NOT NULL,
  `nama_asrama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_asrama`
--

INSERT INTO `mst_asrama` (`id_asrama`, `nama_asrama`) VALUES
(0, 'TIDAK BERASRAMA'),
(2, 'ASRAMA 1'),
(3, 'ASRAMA 2'),
(4, 'ASRAMA 3'),
(5, 'ASRAMA 4');

-- --------------------------------------------------------

--
-- Table structure for table `mst_infaq`
--

CREATE TABLE `mst_infaq` (
  `id_infaq` int(11) NOT NULL,
  `nama_infaq` text,
  `nominal_infaq` int(11) DEFAULT NULL,
  `dump_infaq` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_infaq`
--

INSERT INTO `mst_infaq` (`id_infaq`, `nama_infaq`, `nominal_infaq`, `dump_infaq`) VALUES
(7, 'INFAQ TH 2017', 100000, '2018-10-26 22:05:35'),
(8, 'INFAQ TH 2018', 200000, '2018-10-26 22:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelas`
--

CREATE TABLE `mst_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kelas`
--

INSERT INTO `mst_kelas` (`id_kelas`, `nama_kelas`) VALUES
(0, 'BLM MEMILIKI KELAS'),
(2, 'KELAS 1'),
(3, 'KELAS 2'),
(4, 'KELAS 3'),
(5, 'KELAS 4'),
(7, 'KELAS 5');

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
-- Table structure for table `mst_santri`
--

CREATE TABLE `mst_santri` (
  `id_santri` varchar(50) NOT NULL,
  `n_santri` varchar(100) DEFAULT NULL,
  `nl_santri` varchar(100) DEFAULT NULL,
  `t_santri` varchar(100) DEFAULT NULL,
  `tl_santri` date DEFAULT NULL,
  `telp_santri` varchar(50) DEFAULT NULL,
  `email_santri` varchar(100) DEFAULT NULL,
  `instansi_santri` varchar(100) DEFAULT NULL,
  `alamat_santri` text,
  `status_santri` varchar(50) DEFAULT 'AKTIF',
  `dump_santri` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_santri`
--

INSERT INTO `mst_santri` (`id_santri`, `n_santri`, `nl_santri`, `t_santri`, `tl_santri`, `telp_santri`, `email_santri`, `instansi_santri`, `alamat_santri`, `status_santri`, `dump_santri`) VALUES
('SA199507061', 'bbbbbbbb', 'bbbbbbbb', 'bbbbbbbb', '2018-11-20', '22222222222', 'bbbbbbbb', 'bbbbbbbb', '<p>bbbbbbbb</p>\n', 'AKTIF', '2018-11-14 17:07:23'),
('SA200211061', 'ccccccccc', 'ccccccccc', 'ccccccccc', '2018-11-20', '333333333333', 'ccccccccc', 'ccccccccc', '<p>ccccccccc</p>\n', 'AKTIF', '2018-11-14 18:41:13');

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
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(50) NOT NULL COMMENT 'id_daftar',
  `n_pendaftaran` varchar(100) DEFAULT NULL COMMENT 'nama lengkap',
  `nl_pendaftaran` varchar(100) DEFAULT NULL COMMENT 'nama panggilan',
  `t_pendaftaran` varchar(100) DEFAULT NULL COMMENT 'tempat lahir',
  `tl_pendaftaran` date DEFAULT NULL COMMENT 'tanggal lahir',
  `instansi_pendaftaran` varchar(100) DEFAULT NULL COMMENT 'instansi/ fak / jur',
  `alamat_pendaftaran` text COMMENT 'alamat',
  `telp_pendaftaran` varchar(50) DEFAULT NULL COMMENT 'no telp',
  `email_pendaftaran` varchar(100) DEFAULT NULL COMMENT 'emal / fb',
  `org_pendaftaran` text COMMENT 'pengalaman organisasi',
  `prestasi_pendaftaran` text COMMENT 'prestasi',
  `alasan_pendaftaran` text COMMENT 'alasan masuk',
  `tgl_pendaftaran` date DEFAULT NULL COMMENT 'tanggal daftar',
  `foto_pendaftaran` text,
  `dump_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'waktu terakhir edit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `n_pendaftaran`, `nl_pendaftaran`, `t_pendaftaran`, `tl_pendaftaran`, `instansi_pendaftaran`, `alamat_pendaftaran`, `telp_pendaftaran`, `email_pendaftaran`, `org_pendaftaran`, `prestasi_pendaftaran`, `alasan_pendaftaran`, `tgl_pendaftaran`, `foto_pendaftaran`, `dump_pendaftaran`) VALUES
('SA199507061', 'bbbbbbbb', 'bbbbbbbb', 'bbbbbbbb', '2018-11-20', 'bbbbbbbb', '<p>bbbbbbbb</p>\n', '22222222222', 'bbbbbbbb', '<p>bbbbbbbb</p>\n', '<p>bbbbbbbb</p>\n', '<p>bbbbbbbb</p>\n', '1995-07-06', 'b5f20c20fd4af21dd7ab8d7cce64e541.jpg', '2018-11-14 19:11:54'),
('SA200211061', 'ccccccccc', 'ccccccccc', 'ccccccccc', '2018-11-20', 'ccccccccc', '<p>ccccccccc</p>\n', '333333333333', 'ccccccccc', '<p>ccccccccc</p>\n', '<p>ccccccccc</p>\n', '<p>ccccccccc</p>\n', '2002-11-06', NULL, '2018-11-14 18:41:13');

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
(9, 5, 'Pendaftaran Santri Baru', 'index.php/modul_pendaftaran/pendaftaran', 1),
(12, 6, 'Setting Instansi', 'index.php/modul_admin/instansi', 1),
(14, 3, 'Master Data Organisasi', 'index.php/modul_admin/mst_organisasi', 1),
(17, 7, 'Daftar Ulang', 'index.php/modul_pendaftaran/daftar_ulang', 1),
(18, 8, 'Manajemen Master Kelas', 'index.php/modul_pendaftaran/kelas', 1),
(19, 8, 'Manajemen Master Asrama', 'index.php/modul_pendaftaran/asrama', 2),
(20, 9, 'Manajemen Master Infaq', 'index.php/modul_pendaftaran/infaq', 1),
(21, 9, 'Bayar Infaq calon Santri', 'index.php/modul_pendaftaran/bayar_infaq', 2),
(22, 12, 'Daftar Santri', 'index.php/modul_pendaftaran/santri', 1),
(23, 8, 'Kelola Asrama & Kelas Santri', 'index.php/modul_pendaftaran/kelas_asrama', 3);

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
-- Indexes for table `bayar_infaq`
--
ALTER TABLE `bayar_infaq`
  ADD PRIMARY KEY (`id_bayar_infaq`),
  ADD KEY `PENDAFTARAN_BAYAR_INFAQ` (`id_pendaftaran`),
  ADD KEY `INFAQ_DAFTAR_INFAQ` (`id_infaq`);

--
-- Indexes for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD PRIMARY KEY (`id_daftar_ulang`),
  ADD KEY `pendaftaran_daftar_ulang` (`id_pendaftaran`);

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
-- Indexes for table `kelas_asrama`
--
ALTER TABLE `kelas_asrama`
  ADD PRIMARY KEY (`id_kelas_asrama`),
  ADD KEY `santri_kelas_asrama` (`id_santri`),
  ADD KEY `asrama_kelas_asrama` (`id_asrama`),
  ADD KEY `kelas_kelas_asrama` (`id_kelas`);

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
-- Indexes for table `mst_asrama`
--
ALTER TABLE `mst_asrama`
  ADD PRIMARY KEY (`id_asrama`);

--
-- Indexes for table `mst_infaq`
--
ALTER TABLE `mst_infaq`
  ADD PRIMARY KEY (`id_infaq`);

--
-- Indexes for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mst_organisasi`
--
ALTER TABLE `mst_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `mst_santri`
--
ALTER TABLE `mst_santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `organisasi_staff` (`id_organisasi`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

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
-- AUTO_INCREMENT for table `bayar_infaq`
--
ALTER TABLE `bayar_infaq`
  MODIFY `id_bayar_infaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  MODIFY `id_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id daftar ulang', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `group_priv`
--
ALTER TABLE `group_priv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `kelas_asrama`
--
ALTER TABLE `kelas_asrama`
  MODIFY `id_kelas_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mst_asrama`
--
ALTER TABLE `mst_asrama`
  MODIFY `id_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_infaq`
--
ALTER TABLE `mst_infaq`
  MODIFY `id_infaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar_infaq`
--
ALTER TABLE `bayar_infaq`
  ADD CONSTRAINT `INFAQ_DAFTAR_INFAQ` FOREIGN KEY (`id_infaq`) REFERENCES `mst_infaq` (`id_infaq`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PENDAFTARAN_BAYAR_INFAQ` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD CONSTRAINT `pendaftaran_daftar_ulang` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_priv`
--
ALTER TABLE `group_priv`
  ADD CONSTRAINT `group_user_priv` FOREIGN KEY (`id_group_user`) REFERENCES `group_user` (`id_group_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submenu_priv` FOREIGN KEY (`id_submenu`) REFERENCES `submenu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_asrama`
--
ALTER TABLE `kelas_asrama`
  ADD CONSTRAINT `asrama_kelas_asrama` FOREIGN KEY (`id_asrama`) REFERENCES `mst_asrama` (`id_asrama`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_kelas_asrama` FOREIGN KEY (`id_kelas`) REFERENCES `mst_kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `santri_kelas_asrama` FOREIGN KEY (`id_santri`) REFERENCES `mst_santri` (`id_santri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `modul_menu` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mst_santri`
--
ALTER TABLE `mst_santri`
  ADD CONSTRAINT `santri_pendaftaran` FOREIGN KEY (`id_santri`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

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
