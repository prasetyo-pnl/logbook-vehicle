-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 06:14 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biodata`
--
CREATE DATABASE IF NOT EXISTS `biodata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biodata`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Hoby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama`, `Alamat`, `Hoby`) VALUES
(1, 'we', 'retyhdh', '1Array2Array3'),
(12, 'fdgfhthf', 'retyhdh', 'Nonton1Menulis1Traveling1Otomotif'),
(1234, 'erty', 'asedrtg', 'Nonton'),
(1234546, 'adji', 'asedrtg', 'Traveling'),
(1243235, 'wertew', 'retyhdh', 'Nonton4Menulis4Traveling4Otomotif'),
(124323522, 'wertewer', 'retyhdh', 'Nonton4Menulis4Traveling4Otomotif'),
(1111111111, 'weweeeeee', 'retyhdheee', 'Nonton<li>Traveling<li>Otomotif<li>Fotografi'),
(1234567866, 'asetrthyt', 'retyhdh', 'Menulis, Traveling, Otomotif'),
(2147483647, 'wertewere32', 'retyhdh', '1Array2Array3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);
--
-- Database: `logbook`
--
CREATE DATABASE IF NOT EXISTS `logbook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `logbook`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `kodebidang` varchar(3) NOT NULL,
  `namabidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`kodebidang`, `namabidang`) VALUES
('SCA', 'Casting Plant'),
('SCB', 'Carbon Plant'),
('SGM', 'SGM Plant'),
('SLG', 'SLG Plant'),
('SRD', 'Reduction Plant');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kodebidang` varchar(3) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:super user, 2:user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_user`, `username`, `password`, `kodebidang`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_trouble`
--

CREATE TABLE `tb_trouble` (
  `id_trouble` int(4) NOT NULL,
  `tagsign` varchar(12) NOT NULL,
  `dateentry` datetime NOT NULL,
  `datefinish` datetime NOT NULL,
  `stoptime` varchar(4) NOT NULL,
  `kindoftrouble` varchar(30) NOT NULL,
  `partofwork` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `countermeasure` varchar(255) NOT NULL,
  `sparepart` varchar(255) NOT NULL,
  `manpower` varchar(30) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_trouble`
--

INSERT INTO `tb_trouble` (`id_trouble`, `tagsign`, `dateentry`, `datefinish`, `stoptime`, `kindoftrouble`, `partofwork`, `description`, `countermeasure`, `sparepart`, `manpower`, `remarks`) VALUES
(1, 'FC30H-32-2TC', '2020-08-01 19:00:00', '2020-08-02 19:00:00', '24', 'Trouble', 'Brake;Hydraulic;Attachment;Electrical', 'Tidak Bisa Start;Rem Blong;tambah', 'Baterai N70;Shoes Brake & Master Brake 3/4 Inchi;tambaha', 'Baterai N70;Shoes Brake & Master Brake 3/4 Inchi;tambaha', 'EF', 'Finish'),
(6, 'FC30H-32-2TC', '2020-07-30 21:00:00', '2020-08-01 20:00:00', '47', 'Trouble', 'Engine;Transmisi;Brake;Hydraulic;All', 'vew;lolollolololo', 'ewc;sssssssss', 'ewc;sssssssss', 'wv', 'vwe'),
(7, 'tererwwwwwww', '2020-07-28 20:00:00', '2020-08-01 21:00:00', '97', 'Preventif Maintenance', 'Transmisi;Hydraulic;Steering', 'buanyakk', 'udah', 'saya', 'EF', 'sss'),
(8, 'FC30H-32-2TC', '2020-08-03 00:46:00', '2020-08-04 00:46:00', '24', 'Preventif Maintenance', 'Engine;Transmisi;Brake;Hydraulic;Attachment', 'buanyakk', 'lah', 'aja', 'EF', 'Finish'),
(9, 'tererwwwwwww', '2020-08-02 16:05:00', '2020-08-03 16:05:00', '24', 'Trouble', 'Transmisi;Attachment', 'mobil', 'udah', 'saya', 'EF', 'Finish'),
(10, '54', '2020-08-02 16:07:00', '2020-08-03 16:07:00', '24', 'Preventif Maintenance', 'Brake;Hydraulic;Attachment;Body Chasis', 'lolollolololo', 'udah', 'saya', 'EF', 'Finish');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `tagsign` varchar(12) NOT NULL,
  `namakendaraan` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `kapasitas` varchar(4) NOT NULL,
  `model` varchar(10) NOT NULL,
  `maker` varchar(10) NOT NULL,
  `chasis` varchar(10) DEFAULT NULL,
  `engine` varchar(30) NOT NULL,
  `usingdate` varchar(15) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kodebidang` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_vehicle`
--

INSERT INTO `tb_vehicle` (`tagsign`, `namakendaraan`, `type`, `kapasitas`, `model`, `maker`, `chasis`, `engine`, `usingdate`, `foto`, `kodebidang`) VALUES
('54', 'wqdqw', 'dasefscs', 'wdqd', 'sefeefs', 'qsswq', 'awweqswa', 'wqs', '27-09-2020', '54.png', 'SGM'),
('FC30H-32-2TC', 'Forklift', 'Hinge', '3', 'FD30T3Zhhh', 'TCM', '2U9-05055', 'Isuzu C240 PKJ, 982996LL', '2020-07-20', 'FC30H-32-2TC1.png', 'SGM'),
('tererwwwwwww', 'rere', 'rerr', 'ere', 'rrrr', 'rer', 'erer', 'erer', '19.07.2020', 'tererwwwwwww2.png', 'SCA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`kodebidang`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `tb_pengguna_ibfk_1` (`kodebidang`);

--
-- Indexes for table `tb_trouble`
--
ALTER TABLE `tb_trouble`
  ADD PRIMARY KEY (`id_trouble`),
  ADD KEY `tagsign` (`tagsign`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`tagsign`),
  ADD KEY `kodebidang` (`kodebidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_trouble`
--
ALTER TABLE `tb_trouble`
  MODIFY `id_trouble` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`kodebidang`) REFERENCES `tb_bidang` (`kodebidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_trouble`
--
ALTER TABLE `tb_trouble`
  ADD CONSTRAINT `tb_trouble_ibfk_1` FOREIGN KEY (`tagsign`) REFERENCES `tb_vehicle` (`tagsign`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD CONSTRAINT `tb_vehicle_ibfk_1` FOREIGN KEY (`kodebidang`) REFERENCES `tb_bidang` (`kodebidang`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('logbook', 1, 'logbook');

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"logbook\",\"table\":\"tb_pengguna\"},{\"db\":\"logbook\",\"table\":\"tb_vehicle\"},{\"db\":\"logbook\",\"table\":\"tb_bidang\"},{\"db\":\"logbook\",\"table\":\"tb_trouble\"},{\"db\":\"riyadb\",\"table\":\"admin\"},{\"db\":\"riyadb\",\"table\":\"penyakit\"},{\"db\":\"riyadb\",\"table\":\"hasil\"},{\"db\":\"riyadb\",\"table\":\"gejala\"},{\"db\":\"riyadb\",\"table\":\"artikel\"},{\"db\":\"riyadb\",\"table\":\"_temp\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('logbook', 'tb_bidang', 1, 523, 280),
('logbook', 'tb_trouble', 1, 96, 26),
('logbook', 'tb_vehicle', 1, 695, 295);

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-08-12 16:13:55', '{\"Console\\/Mode\":\"show\",\"ThemeDefault\":\"pmahomme\",\"Console\\/Height\":-56,\"NavigationWidth\":165}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `riyadb`
--
CREATE DATABASE IF NOT EXISTS `riyadb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `riyadb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(4) NOT NULL DEFAULT '',
  `nama_admin` varchar(30) DEFAULT NULL,
  `usernames` varchar(30) DEFAULT NULL,
  `passwords` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `usernames`, `passwords`) VALUES
('AD01', 'Riya', 'r', '4b43b0aee35624cd95b910189b3dc231');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_admin` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tgl`, `judul`, `isi`, `gambar`, `id_admin`) VALUES
(1, '1970-01-01', 'Cara Menanam Jagung Manis Agar Tahan Hama Penyakit', '1. Media yang cocok-- Untuk menerapkan cara menanam jagung manis, sebenarnya bisa dilakukan di kisaran iklim yang luas karena tanaman ini mempunyai mempunyai sifat adaptif yang cukup bagus. Di Indonesia, banyak orang yang membudidayakan jagung manis baik di kawasan pegunungan yang mencapai ketinggian 1.800 meter dpl ataupun di dataran rendah. Bahkan, jagung juga bisa tumbuh dikawasan dengan ketinggian tanah 3.000 mdpl. Untuk suhu optimum yang cocok agar jagung manis dapat tumbuh secara optimal berkisar antara 21 hingga 27 derajat celcius dan 23 hingga 27 derajat celcius saat masa perkecambahan. Untuk tingkat keasaman, jagung manis bisa tumbuh dalam kisaran 5 hingga 8 pH. Menanam jagung manis menjanjikan hasil yang memuaskan jika kebutuhan hara tercukupi. Tumbuhan ini umumnya membutuhkan unsure nitrogen dalam jumlah yang cukup besar. Namun, saat memberikan pupuk juga harus memperhatikan keseimbangan antara pospat, kalium, dan nitrogen.,2. Pengolahan lahan,Untuk cara menanam jagung manis agar menghasilkan panen yang maksimal, sebaiknya tanah diolah secara organik. Cara menanam secara organik bisa dilakukan di lahan bekas sawah ataupun membuat bedengan terlebih dahulu. Jika anda menggunakan lahan bekas sawah, pastikan bahwa tidak ada genangan air. Anda juga bisa menggunakan bedengan yang berfungsi untuk lebih mudah mengatur saluran pengairan atau drainase. Untuk bedengan, anda bisa membuatnya dengan lebar 1 meter dan tinggi sekitar 20 hingga 30 cm. Jarak antar bedeng adalah 30 cm. Biasanya, dalam satu bedeng dapat ditanamin hingga dua larik tumbuhan.,3. Penanaman,Sebenarnya, cara yang paling efektif untuk menanam jagung manis adalah dengan ditugal. Cara efektif menanam jagung manis ini dapat dilakukan dengan pertama-tama membuat lubang dengan kedalaman 2 hingga 3 cm kemudian benih jagung dimasukkan ke dalam lubang tersebut. Anda bisa memasukkan masing-masing dua butir jagung. Tutuplah dengan menggunakan kompos dan tanah. Siram masing-masing lubang supaya tanah tetap terjaga kelembapannya. Biasanya, kebutuhan bibit jagung manis mencapai 8 kg untuk tiap hektarnya. Cara menanam jagung manis antar bibit mempunyai jarak sekitar 60 hingga 75 cm. Jika anda merawat dan memeliharanya dengan baik, panen untuk tiap hektarnya bisa mencapai 34 ribu hingga 37 ribu tanaman.,4. Mengenal macam-macam hama,Hama merupakan salah permasalahan yang sering dihadapi bagi anda yang membudidayakan jagung manis. Hama yang familiar diantaranya adalah penggerek tongkol, penggerek, tikus, kutu daun, dan juga belalang. Untuk anda yang ingin membudidayakan jagung manis, selain mengetahui cara menanam jagung manis, sebaiknya anda juga mengetahui jenis-jenis hama yang menyerang jagung manis agar anda bisa menanganinya dengan tepat. Untuk menangani hama yang menyerang, anda bisa menggunakan pestisida yang sesuai dengan jenis hama atau menggunakan bahan-bahan organik. Selain hama, cara menanam dan merawat jagung manis juga harus mencegah adanya serangan penyakit yang disebabkan oleh virus, cendawan, ataupun bakteri.', 'Jagung-1024x680.jpg', 'AD01'),
(2, '2020-07-29', '\r\nHama dan Penyakit Tanaman Jagung Serta Cara Pengendaliannya', 'a. Ulat Daun (prodenia litura)\r\nHama ulat daun ini akan menyerang bagian pucuk daun dan biasanya tanaman jagung yang berumur sekitar 1 bulan diserang ulat daun. Daun tanaman jagung yang bila sudah besar menjadi rusak.\r\nPencegahan dapat dilakukan dengan cara penyemprotan insektisida yang tepat seperti folidol atau yang lainnya dengan dosis sesuai dengan anjuran.\r\nb. Lalat bibit(Atherigona exigua)\r\nTanaman jagung yang terserang hama ini akan memiliki bekas gigitan pada bagian daun, pucuk daun layu, dan akhirnya tanaman jagung akan mati.\r\nPengendalian hama ini dapat dilakukan dengan cara melakukan penyemprotan insektisida sesuai dengan dosis yang dianjurkan.\r\nc. Ulat Grayak atau Ulat Agrotis\r\nBagian Tanaman jagung yang diserang hama ini adalah bagian batang yang masih muda, batang akan putus dan akhirnya tanaman jagung mati. Hama Agrotis sp. Menyerang pada malam dan siang hari. Ada 3 jenis ulat grayak/agrotis yaitu:\r\nAgrotis segetum : memiliki warna hitam dan ulat ini sering ditemukan di daerah dataran tinggi.\r\nAgrotis ipsilon : memiliki warna hitam kecoklatan dan ulat ini sering di temukan di daerah dataran tinggi dan rendah.\r\nAgrotis interjection : memiliki warna hitam dan banyak di temukan di pulau jawa.\r\nPengendalian ulat ini dapat dilakukan dengan melakukan penyemprotan menggunakan insektisida yang sesuai dan menggunakan dosis sesuai anjuran.\r\nd. Penggerek daun dan penggerek batang\r\nUlat sesamia inferens dan pyrasauta nubilasis ini menyerang bagian ruas batang sebelah bawah dan titik tumbuh tunas daun tanaman jagung. Tanaman jagung akan menjadi layu.\r\nPenanggulangan hama ini dapat dilakukan dengan melakukan penyemprotan menggunakan insektisida yang sesuai dengan dosis yang di anjuran\r\ne. Ulat Tongkol (Heliothis armigera)\r\nTanaman jagung yang terserang hama ini akan memiliki bekas gigitan pada biji dan adanya terowongan dalam tongkol jagung.\r\nPengendalian hama ini dapat dilakukan dengan cara melakukan penyemprotan menggunakan Furadan 3G atau insektisida yang sesuai dan dengan dosis sesuai anjuran.\r\nf. Belalang\r\nJenis belalang yang sering menyerang tanaman jagung yaitu Oxyca chinensis dan juga Locusta sp. Hama ini biasa menyerang tanaman jagung pada bagian daun muda. Pengendalian hama ini dapat dilakukan dengan cara melepaskan predator alaminya yaitu berupa burung atau laba-laba, bisa juga dengan menggunakan biopestisida.', 'Hama-dan-Penyakit-Jagung.png', 'AD01'),
(3, '2020-07-29', 'Jenis-Jenis Dan Cara Pengandalian Hama Tanaman Jagung', 'Ulat Buah (Heliothis armigera)\r\nUlat buah adalah salah satu hama yang paling sering menyerang tanaman jagung saat menjelang fase generatif (pembungaan hingga masa panen). Serangan hama ini menyebabkan kualitas dan kuantitas panen menurun. Selain menyerang pada bagian tongkol, hama ini juga memakan daun dan batang jagung.\r\n\r\nPengendalian\r\nPencegahan dapat dilakukan dengan cara penyemprotan insektisida yang tepat seperti folidol atau yang lainnya dengan dosis sesuai dengan anjuran.\r\n\r\nLalat bibit(Atherigona exigua)\r\nPada umumnya kelembaban yang tinggi sangat mendukung perkembangan spesies ini. Jika kondisi sangat kering, telur akan gagal menetas atau larva mati sebelum dia mampu melakukan penetrasi batang. Larva yang baru menetas melubangi batang yang kemudian membuat terowongan hingga dasar batang sehingga tanaman menjadi kuning dan akhirnya mati. Jika tanaman mampu bertahan setelah serangan, maka pertumbuhan tanaman menjadi kerdil. Tanaman jagung yang terserang hama ini akan memiliki bekas gigitan pada bagian daun, pucuk daun layu, dan akhirnya tanaman jagung akan mati.\r\n\r\nPengendalian\r\nHama ini dapat dilakukan dengan cara melakukan penyemprotan insektisida dapat dilakukan dengan perlakuan benih, yaitu Thiodikarb dengan dosis 7,5-15 gram per kg benih. Selanjutnya, setelah tanaman berumur 5-7 hari, tanaman disemprot kembali dengan Thiodikarb 0,75 kg per ha, penggunaan insektisida hanya dianjurkan di daerah endemik. Mengubah waktu tanam karena lalat bibit hanya beraktivitas selama satu sampai dua bulan musim hujan dan dengan pergiliran tanaman dengan tanaman bukan padi.\r\n\r\nUlat Grayak atau Ulat Agrotis\r\nSerangan larva yang masih kecil dapat merusak daun dan menyerang secara serentak berkelompok dengan meninggalkan sisa-sisa epidermis bagian atas, transparan, dan bisa sampai tinggal tulang-tulang daun saja. Larva bersembunyi di permukaan bawah daun dan berkembang pada musim kemarau. Ulat ini muncul di pertanaman setelah 11-30 hari setelah tanam. Bagian Tanaman jagung yang diserang hama ini adalah bagian batang yang masih muda, batang akan putus dan akhirnya tanaman jagung mati. Hama Agrotis sp. Menyerang pada malam dan siang hari. Ada 3 jenis ulat grayak/agrotis yaitu:\r\n\r\nAgrotis segetum : memiliki warna hitam dan ulat ini sering ditemukan di daerah dataran tinggi.\r\nAgrotis ipsilon : memiliki warna hitam kecoklatan dan ulat ini sering di temukan di daerah dataran tinggi dan rendah.\r\nAgrotis interjection : memiliki warna hitam dan banyak di temukan di pulau jawa.\r\n\r\nPengendalian\r\nMelakukan pengolahan tanah yang intensif dan memusnahkan tanaman yang memiliki gejala serangan. Dapat juga menggunakan perangkap feromonoid seks untuk ngengat sebanyak 40 buah per hektar atau 2 buah per 500 m2 dipasang di tengah pertanaman sejak tanaman berumur 2 minggu. Pemanfaatan musuh alami bisa menggunakan predator Sycanus sp. dan Andrallus spinideus. Pengandalian kimia bisa dengan insektisida Carbofuran 3% dan diberikan pada pucuk tanaman.\r\n\r\nPenggerek Daun dan Penggerek Batang\r\nUlat sesamia inferens dan pyrasauta nubilasis ini menyerang bagian ruas batang sebelah bawah dan titik tumbuh tunas daun tanaman jagung. Gejala ulat masih muda terlihat garis putih bekas gigitan pada daun dan batang. Jika sudah mencapai fase dewasa akan memakan batang sampai patah mengakibatkan tanaman jagung akan menjadi mati.\r\n\r\nPengendalian\r\nMmembersihkan gulma disekitar tanaman. Tanaman yang diserang harus segera di hilangkan.Melakukan penyemprotan menggunakan insektisida yang sesuai dengan dosis yang di anjuran dengan jenis insektisida; Azodrin 15 wsc, Nogos 50 ec, Hostation 40 ec, kavos 20 ec.\r\n\r\nUlat Tongkol (Heliothis armigera)\r\nHama ini berupa serangga yang akan meletakkan telur pada silk jagung dan sesaat setelah menetas larva akan menginvasi masuk kedalam tongkol dan akan memakan biji yang sedang mengalami perkembangan. Serangga ini akan menurunkan kualitas dan kuantitas tongkol jagung. Serangan biasanya muncul di pertanaman pada umur 45-56 hari setelah tanam, bersamaan dengan munculnya rambut-rambut tongkol.\r\n\r\nPengendalian\r\nDilakukan dengan pengolahan tanah yang baik karena mampu merusak pupa serangga ini. pengendalian dengan musuh alami bisa dengan parasit Trichogramma sp. yang merupakan parasit telur hama ini. pengendalian kimia bisa dengan penyemprotan insektisida Decis setelah terbentuknya rambut jagung pada tongkol dan diteruskan selama 1-2 hari hingga rambut jagung berwarna coklat.\r\n\r\nBelalang\r\nJenis belalang yang sering menyerang tanaman jagung yaitu Oxyca chinensis dan juga Locusta sp. Hama ini biasa menyerang tanaman jagung pada bagian daun muda. Daun bagian pertama yang diserang hampir keseluruhan daun habis termasuk tulang daun, jika serangannya parah.Spesies ini dapat pula memakan batang dan tongkol jagung jika populasinya sangat tinggi de ngan sumber makanan terbatas.\r\n\r\nPengendalian\r\nDalam keadaan populasi tinggi, perlu segera diupayakan penurunan populasi menggunakan insektisida yang efektif dan diijinkan dapat diaplikasikan. Jenis insektisida yang dapat digunakan untuk mengendalikan belalang adalah jenis yang berbahan aktif organofosfat seperti fenitrothion', 'ar1-7jan.jpeg', 'AD01');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(4) NOT NULL DEFAULT '',
  `nama_gejala` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
('G001', 'Garis-garis kuning pada daun '),
('G002', 'Garis tertutup tepung putih '),
('G003', 'Daun berwarna kuning keputih-putihan '),
('G004', 'Daun kaku'),
('G005', 'Tanaman Kerdil / Batang memendek '),
('G006', 'Pembentukan tongkol terhambat '),
('G007', 'Tongkol kecil-kecil '),
('G008', 'Bercak-bercak bulat sampai lonjong '),
('G009', 'Bercak-bercak berwarna kuning pada daun '),
('G010', 'Tanaman Berwarna coklat muda hingga tua '),
('G011', 'Tanaman kebasahan'),
('G012', 'Bercak-bercak / noda-noda kecil berwarna merah karat '),
('G013', 'Terdapat tepung berwarna coklat kekunng-kuningan/kuning kecoklatan '),
('G014', 'Garis terputus-putus diseluru permukaan daun '),
('G015', 'Bercak berwarna kelabu / keputihan '),
('G016', 'Bercak-bercak pada pelepah '),
('G017', 'Bercak warna salmon '),
('G018', 'Bercak meluas berwarna abu-abu atau putih '),
('G019', 'Tanaman patah secara tiba-tiba '),
('G020', 'Warna coklat pada buku batang paling bawah'),
('G021', 'Batang basah, lunak, dan bercincin '),
('G022', 'Berbau busuk '),
('G023', 'Ditengah-tengah bercak berwarna coklat '),
('G024', 'Daun berminyak '),
('G025', 'Garis-garis memanjang sejajar dengan sisi daun '),
('G026', 'Daun mengering / mati '),
('G027', 'Tongkol mengalami pembengkakan '),
('G028', 'Tongkol mengeluarkan kelenjar ( gall ) '),
('G029', 'Kelobot rusak dan mengeluarkan kelenjar '),
('G030', 'Biji busuk jagung berwarna hitam'),
('G031', 'Biji diikuti pertumbuhan miselium seperti kapas yang berwarna merah jambu'),
('G032', 'Biji busuk jagung berwarna coklat sawo matang.');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_penyakit` varchar(4) NOT NULL DEFAULT '',
  `persen` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_penyakit`, `persen`) VALUES
('P001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(4) NOT NULL DEFAULT '',
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `solusi` varchar(500) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan`, `solusi`, `gambar`, `bobot`) VALUES
('P001', 'Bulai', 'Penyakit bulai merupakan penyakit utama budidaya jagung. Penyakit ini menyerang tanaman jagung khususnya varietas rentan hama penyakit serta saat umur tanaman jagung masih muda (antara 1-2 minggu setelah tanam). Kehilangan hasil produksi akibat penularan penyakit bulai dapat mencapai 100%, terutama varietas rentan.', '- Melakukan periode waktu bebas tanaman jagung minimal dua minggu sampai satu bulan\r\n- Penanaman  jagung secara serempak\r\n- Pemusnahan seluruh bagian tanaman sampai ke akarnya (Eradikasi tanaman) pada tanaman  terserang penyakit bulai\r\n- Penggunaan  fungisida metalaksil saat perlakuan benih dengan dosis 2 gram (0,7 g bahan aktif)  /kg benih', '03-Jagungg_bulai.jpg', 0.5),
('P002', 'Karat Daun', 'Bercak-bercak kecil (uredinia) berbentuk bulat sampai oval terdapat di permukaan daun jagung bagian atas maupun bawah, uredinia menghasilkan uredospora berbentuk bulat atau oval serta berperan penting sebagai sumber inokulum dalam menginfeksi Tanaman jagung lainnya, sebarannya melalui angin. Penyakit karat dapat terjadi di dataran rendah sampai tinggi, infeksinya berkembang baik pada musim penghujan atau musim kemarau', '- Menanam varietas tahankarat daun, seperti Lamuru, Sukmaraga, Palakka, Bima-1 atau Semar-10\r\n- Pemusnahan seluruh bagian tanaman sampai ke akarnya (Eradikasi tanaman) pada tanaman terinfeksi karat daun maupun gulma\r\n- Penyemprotan fungisida menggunakan bahan aktif benomil. Dosis/konsentrasi sesuai petunjuk di kemasan', '06-Jagungg_karat_daun.jpg', 0.6),
('P003', 'Gosong Bengkak', 'Jenis penyakit ini disebabkan oleh jamur Ustilago maydis yang dapat menyebabkan tongkol jagung mengalami pembengkakan dan mengeluarkan kelenjar (gall).Penyakit dimulai dengan adanya infeksi spora jamur ke dalam biji pada tongkol jagung sehingga mengakibatkan terjadinya pembengkakan pada biji jagung. Pada awalnya-  biji jagung tersebut berwarna putih bersih, akan tetapi lama kelamaan biji jagung menjadi berwarna hitam', '-Mengatur jarak tanam agar tidak terlalu rapat. Tanaman jagung yang terlalu subur akan mengakibatkan kelembaban yang tinggi. Biasanya tanaman seperti itu mudah terserang penyakit jamur hitam- -Menghindari penggunaan kompos atau pupuk kandang yang berbibit penyakit,-Memperlakukan benih jagung dengan fungisida,-Tanaman yang sakit dibakar dan jangan diberikan ternak atau digunakan dalam pembuatan kompos,-Penanaman dengan varietas yang resisten terhadap bengkak gosong', 'gosong_bengkak.jpg', 0.6),
('P004', 'Busuk Batang', 'Penyakit busuk batang jagung yang disebabkan oleh cendawan  fusarium sp. Merupakan salah satu penyakit penting pada tanaman jagung, terutama jagung yang ditanam pada awal musim hujan', '-Melakukan pergiliran tanaman\r\n-melakukan pemupukan berimbang (hindari kelebihan kandungan Nitrogendan kekurangan Kalium)\r\n-Mengatur sistem pengairan yang baik\r\n-Cara yang alami dapat dilakukan yaitu dengan menyebarkan jamur antagonisTrichodermasp', '04-Jagungg_busuk_tongkol.jpg', 0.7);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `id_penyakit` varchar(4) DEFAULT NULL,
  `id_gejala` varchar(4) DEFAULT NULL,
  `bobot_rule` double DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `id_penyakit`, `id_gejala`, `bobot_rule`, `keterangan`) VALUES
(1, 'P001', 'G001', 0.5, 'Hampir Pasti'),
(2, 'P001', 'G002', 0.4, 'Mungkin'),
(3, 'P001', 'G003', 0.7, 'Hampir Pasti'),
(7, 'P001', 'G004', 0.25, 'Mungkin');

-- --------------------------------------------------------

--
-- Table structure for table `_temp`
--

CREATE TABLE `_temp` (
  `id_penyakit` varchar(100) NOT NULL DEFAULT '',
  `id_gejala` varchar(100) NOT NULL DEFAULT '',
  `nilai` double DEFAULT NULL,
  `persen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_temp`
--

INSERT INTO `_temp` (`id_penyakit`, `id_gejala`, `nilai`, `persen`) VALUES
('P001', 'G001', 1, 100),
('P001', 'G002', 1, 100),
('P001', 'G003', 1, 100),
('P001', 'G004', 1, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Database: `tes2`
--
CREATE DATABASE IF NOT EXISTS `tes2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tes2`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `kodebidang` varchar(3) NOT NULL,
  `namabidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`kodebidang`, `namabidang`) VALUES
('SCA', 'Casting Plant'),
('SCB', 'Carbon Plant'),
('SGM', 'SGM Plant'),
('SLG', 'Carbon Plant'),
('SRD', 'Reduction Plant');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `kodebidang` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_trouble`
--

CREATE TABLE `tb_trouble` (
  `tagsign` varchar(12) NOT NULL,
  `dateentry` datetime NOT NULL,
  `datefinish` datetime NOT NULL,
  `stoptime` varchar(4) NOT NULL,
  `kindoftrouble` varchar(30) NOT NULL,
  `partofwork` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `countermeasure` varchar(255) NOT NULL,
  `sparepart` varchar(255) NOT NULL,
  `manpower` varchar(30) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `tagsign` varchar(12) NOT NULL,
  `namakendaraan` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `kapasitas` varchar(4) NOT NULL,
  `model` varchar(10) NOT NULL,
  `maker` varchar(10) NOT NULL,
  `chasis` varchar(10) DEFAULT NULL,
  `engine` varchar(30) NOT NULL,
  `usingdate` date NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kodebidang` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`kodebidang`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`username`),
  ADD KEY `kodebidang` (`kodebidang`);

--
-- Indexes for table `tb_trouble`
--
ALTER TABLE `tb_trouble`
  ADD KEY `tagsign` (`tagsign`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`tagsign`),
  ADD KEY `kodebidang` (`kodebidang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`kodebidang`) REFERENCES `tb_bidang` (`kodebidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_trouble`
--
ALTER TABLE `tb_trouble`
  ADD CONSTRAINT `tb_trouble_ibfk_1` FOREIGN KEY (`tagsign`) REFERENCES `tb_vehicle` (`tagsign`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD CONSTRAINT `tb_vehicle_ibfk_1` FOREIGN KEY (`kodebidang`) REFERENCES `tb_bidang` (`kodebidang`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
