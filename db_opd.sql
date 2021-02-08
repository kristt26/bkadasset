-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 10:53 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_opd`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailrabl`
--

CREATE TABLE `detailrabl` (
  `id` int(11) NOT NULL,
  `rablid` int(11) NOT NULL,
  `jeniskendaraanid` int(11) NOT NULL,
  `nomorrangka` varchar(100) NOT NULL,
  `nomorplat` varchar(10) NOT NULL,
  `tahunperolehan` int(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `qty` double NOT NULL,
  `hargasatuan` double NOT NULL,
  `ppn` double NOT NULL,
  `totalharga` double NOT NULL,
  `pejabat` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailrabl`
--

INSERT INTO `detailrabl` (`id`, `rablid`, `jeniskendaraanid`, `nomorrangka`, `nomorplat`, `tahunperolehan`, `keterangan`, `qty`, `hargasatuan`, `ppn`, `totalharga`, `pejabat`, `jabatan`) VALUES
(1, 3, 1, '123456', 'DD 1111 AA', 2019, 'Baik', 1, 300000000, 0.1, 270000000, NULL, NULL),
(2, 3, 4, '322131', 'DD 2222 AA', 2020, 'Baik', 1, 200000000, 0.1, 180000000, NULL, NULL),
(3, 4, 1, '52125', '2124', 2019, 'Baik', 1, 200000000, 0.1, 180000000, 'Ujang Bagus', 'Kepala Administrasi'),
(4, 4, 3, '321542', '3215', 2020, 'Rusak', 1, 300000000, 0.1, 270000000, 'Chandra Putra Wicaksana', 'Bendahara Umum'),
(5, 5, 3, '51231364', 'DD 5214 AA', 2018, 'Rusak', 1, 500000000, 0.1, 450000000, NULL, NULL),
(6, 5, 1, '32123154', 'DD 2134 AD', 2017, 'Baik', 2, 600000000, 0.1, 1080000000, NULL, NULL),
(7, 6, 2, '3213216546', '321215', 2020, 'Baik', 1, 300000000, 0.1, 270000000, NULL, NULL),
(8, 7, 1, '321346512', '23213241', 2001, 'Baik', 1, 500000000, 0.1, 450000000, NULL, NULL),
(9, 8, 4, '2345234', '34343', 2002, 'Baik', 1, 200000000, 0.1, 180000000, NULL, NULL),
(10, 9, 2, '6321231', '2132', 2019, 'Rusak', 1, 100000000, 0.1, 90000000, NULL, NULL),
(11, 10, 3, '32132454121', '3214', 2020, 'Rusak', 1, 150000000, 0.05, 142500000, NULL, NULL),
(12, 11, 1, '45122124542', '2324', 2020, 'Baik', 1, 350000000, 0.05, 332500000, NULL, NULL),
(13, 12, 1, '565214654652', '4567', 2020, 'Baik', 1, 350000000, 0.05, 332500000, NULL, NULL),
(14, 12, 2, '987894654897', '6521', 2021, 'Baik', 1, 350000000, 0.05, 332500000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jeniskendaraan`
--

CREATE TABLE `jeniskendaraan` (
  `id` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jeniskendaraan`
--

INSERT INTO `jeniskendaraan` (`id`, `merk`, `type`) VALUES
(1, 'Daihatsu', 'Gran Max MB'),
(2, 'Daihatsu', 'Ayla'),
(3, 'Daihatsu', 'Gran Max Pickup'),
(4, 'Toyota', 'Grand New Avansa'),
(5, 'Daihatsu', 'Gran Max MB12');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `penggunaid` int(11) NOT NULL,
  `opd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id`, `penggunaid`, `opd`) VALUES
(1, 2, 'Dinas Kehutanan'),
(2, 4, 'Dinas Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksana`
--

CREATE TABLE `pelaksana` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelaksana`
--

INSERT INTO `pelaksana` (`id`, `nama`, `alamat`, `kontak`, `logo`) VALUES
(3, 'CV. OCTAGON CENDRAWASIH SOLUTION', 'Tanah Hitam', '081xxxxxxxxx', '5ffbeaf9b5687.jpeg'),
(4, 'PT. TRIREKSA PAPUA', 'Entrop', '082121xxxxx', '5ffbeb54dbc2e.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `kontak` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `usersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nip`, `nama`, `email`, `kontak`, `alamat`, `jabatan`, `usersid`) VALUES
(1, '39663321242415', 'Candra Putra Wicaksana', 'candra@mail.com', '082238281801', 'Perumahan Permata Indah Tanah Hitam', 'Admin BKAD', 1),
(2, '38465131326541', 'Deni Malik', 'deni@mail.com', '081124652124', 'Perum Penda II Entrop', 'Staff', 2),
(4, '832132156413214', 'Bagus Joko Susilo', 'bagus@mail.com', '081212124521', 'Aryoko', 'Staf Keuangan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rabl`
--

CREATE TABLE `rabl` (
  `id` int(11) NOT NULL,
  `opdid` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pelaksanaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rabl`
--

INSERT INTO `rabl` (`id`, `opdid`, `tanggal`, `pelaksanaid`) VALUES
(3, 1, '2021-01-11', 3),
(4, 1, '2021-01-12', 3),
(5, 1, '2021-01-21', 3),
(6, 1, '2021-01-20', 3),
(7, 1, '2021-01-05', 4),
(8, 1, '2021-01-19', 4),
(9, 1, '2021-01-06', 4),
(10, 2, '2021-01-21', 4),
(11, 2, '2021-01-20', 3),
(12, 2, '2021-01-16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'OPD');

-- --------------------------------------------------------

--
-- Table structure for table `suratperjanjian`
--

CREATE TABLE `suratperjanjian` (
  `id` int(11) NOT NULL,
  `rablid` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nilaipekerjaan` double NOT NULL,
  `sumberdana` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `waktupelaksanaan` varchar(50) NOT NULL,
  `tahunanggaran` varchar(50) NOT NULL,
  `suratpesankendaraan` text DEFAULT NULL,
  `baserahterima` text DEFAULT NULL,
  `bapembayaran` text DEFAULT NULL,
  `bapemeriksaanpek` text DEFAULT NULL,
  `bapemeriksaanadmnhslpek` text DEFAULT NULL,
  `srtpenawaranhrg` text DEFAULT NULL,
  `srtpersetujuanhrg` text DEFAULT NULL,
  `srtpenunjukanlangsung` text DEFAULT NULL,
  `srtpenunjukanpenyediabrg` text DEFAULT NULL,
  `srtperjanjianpengadaan` text DEFAULT NULL,
  `status` enum('P','N','Y') DEFAULT 'P',
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suratperjanjian`
--

INSERT INTO `suratperjanjian` (`id`, `rablid`, `nomor`, `tanggal`, `pekerjaan`, `nilaipekerjaan`, `sumberdana`, `lokasi`, `waktupelaksanaan`, `tahunanggaran`, `suratpesankendaraan`, `baserahterima`, `bapembayaran`, `bapemeriksaanpek`, `bapemeriksaanadmnhslpek`, `srtpenawaranhrg`, `srtpersetujuanhrg`, `srtpenunjukanlangsung`, `srtpenunjukanpenyediabrg`, `srtperjanjianpengadaan`, `status`, `catatan`) VALUES
(3, 3, '125411', '2021-01-12', 'Pengadaan', 500000000, 'DANA ABPN', 'Jayapura', '1 Tahun', '2020', '5ffe76dc348d7.pdf', '5ffe76dc38515.pdf', '5ffe76dc3c30e.pdf', '5ffe76dc3e494.pdf', '5ffe76dc41bef.pdf', '5ffe76dc44ab9.pdf', '5ffe76dc478ff.pdf', '5ffe76dc49bfe.pdf', '5ffe76dc4ccd9.pdf', '5ffe76dc4e4e7.pdf', 'Y', NULL),
(5, 10, '86465413245', '2021-01-26', 'Pengadaan', 150000000, 'DANA ABPN', 'Jayapura', '1 Tahun', '2020', '600f24048a3a3.pdf', '600f240499742.pdf', '600f24049f788.pdf', '600f2404a535c.pdf', '600f2404c69ed.pdf', '600f2404c8fef.pdf', '600f2404d574a.pdf', '600f2404d90aa.pdf', '600f2404e95cf.pdf', '600f2405039bc.pdf', 'P', NULL),
(6, 11, '765465132134', '2021-01-26', 'Pengadaan', 350000000, 'DANA ABPN', 'Jayapura', '1 Tahun', '2020', '600f34ad1ad0a.pdf', '', '', '', '', '', '', '', '', '', 'P', NULL),
(9, 12, '125411', '2021-01-26', 'Pengadaan', 700000000, 'DANA ABPN', 'Jayapura', '1 Tahun', '2020', '', '', '', '', '', '', '', '', '', '', 'P', NULL),
(10, 4, 'aas2452342', '2021-01-27', 'Pengadaan', 500000000, 'DANA ABPN', 'Jayapura', '1 Tahun', '2020', '60104a1f35588.pdf', '60113619ecae1.pdf', '', '', '', '', '', '', '', '', 'P', 'Data belum lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `userinrole`
--

CREATE TABLE `userinrole` (
  `id` int(11) NOT NULL,
  `rolesid` int(11) NOT NULL,
  `usersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinrole`
--

INSERT INTO `userinrole` (`id`, `rolesid`, `usersid`) VALUES
(1, 1, 1),
(2, 2, 2),
(4, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$5N9QpLeQKKzGtMYE6DZhqe7QTNEFtxEv2mi9nLe04pOKCHYdgNdZa'),
(2, 'deni', '$2y$10$.EyAR4DCHLuzNN69/1wm6.vPB0UvDVq1Hf0..6WY2PIPxzRn.Q/pK'),
(6, 'bagus', '$2y$10$e6ZNBvIwhfRrEAaaiB1dhOhFpi2Y7NvtMUCpiQZbFFkNVia98BNwO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailrabl`
--
ALTER TABLE `detailrabl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailrabl_rabl1_idx` (`rablid`),
  ADD KEY `fk_detailrabl_jeniskendaraan1_idx` (`jeniskendaraanid`);

--
-- Indexes for table `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_opd_pengguna1_idx` (`penggunaid`);

--
-- Indexes for table `pelaksana`
--
ALTER TABLE `pelaksana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengguna_users1_idx` (`usersid`);

--
-- Indexes for table `rabl`
--
ALTER TABLE `rabl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rabl_opd1_idx` (`opdid`),
  ADD KEY `fk_rabl_pelaksana1_idx` (`pelaksanaid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratperjanjian`
--
ALTER TABLE `suratperjanjian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_suratperjanjian_rabl1_idx` (`rablid`);

--
-- Indexes for table `userinrole`
--
ALTER TABLE `userinrole`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userinrole_roles_idx` (`rolesid`),
  ADD KEY `fk_userinrole_users1_idx` (`usersid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailrabl`
--
ALTER TABLE `detailrabl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelaksana`
--
ALTER TABLE `pelaksana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rabl`
--
ALTER TABLE `rabl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratperjanjian`
--
ALTER TABLE `suratperjanjian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userinrole`
--
ALTER TABLE `userinrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailrabl`
--
ALTER TABLE `detailrabl`
  ADD CONSTRAINT `fk_detailrabl_jeniskendaraan1` FOREIGN KEY (`jeniskendaraanid`) REFERENCES `jeniskendaraan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detailrabl_rabl1` FOREIGN KEY (`rablid`) REFERENCES `rabl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opd`
--
ALTER TABLE `opd`
  ADD CONSTRAINT `fk_opd_pengguna1` FOREIGN KEY (`penggunaid`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_pengguna_users1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `rabl`
--
ALTER TABLE `rabl`
  ADD CONSTRAINT `fk_rabl_opd1` FOREIGN KEY (`opdid`) REFERENCES `opd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rabl_pelaksana1` FOREIGN KEY (`pelaksanaid`) REFERENCES `pelaksana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suratperjanjian`
--
ALTER TABLE `suratperjanjian`
  ADD CONSTRAINT `fk_suratperjanjian_rabl1` FOREIGN KEY (`rablid`) REFERENCES `rabl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userinrole`
--
ALTER TABLE `userinrole`
  ADD CONSTRAINT `fk_userinrole_roles` FOREIGN KEY (`rolesid`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_userinrole_users1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
