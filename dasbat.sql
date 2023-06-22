-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 03:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dasbat`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `Kode_Alat` varchar(20) NOT NULL,
  `Kode_Divisi` int(11) DEFAULT NULL,
  `Nama_Alat` varchar(50) DEFAULT NULL,
  `Jumlah_Alat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`Kode_Alat`, `Kode_Divisi`, `Nama_Alat`, `Jumlah_Alat`) VALUES
('CV2', 3, 'Carabiner Delta', 1),
('CV3', 3, 'Cowtail', 15),
('CV4', 3, 'Jumar', 20),
('CV5', 3, 'Croll', 20),
('CV6', 3, 'MR Delta', 20),
('CV7', 3, 'Snap', 20),
('CV8', 3, 'Footloop', 20),
('DV1', 4, 'Swing Suit', 5),
('DV2', 4, 'Fin', 12),
('DV3', 4, 'Tabung Oksigen', 5),
('OR1', 2, 'Perahu', 4),
('OR2', 2, 'Padle', 15),
('OR3', 2, 'Helm', 13),
('OR4', 2, 'Pelampung', 12),
('OR5', 2, 'Tali', 7),
('PR1', 5, 'Parasut', 4),
('PR2', 5, 'Helm', 10),
('PR3', 5, 'Kacamata', 10),
('PR4', 5, 'Carabiner', 20),
('RC1', 1, 'Runner', 7),
('RC2', 1, 'Tali Karmantel 50m', 3),
('RC3', 1, 'Tali Karmantel 100m', 2),
('RC4', 1, 'Seat Harness', 8),
('RC5', 1, 'Webing', 10),
('RC6', 1, 'Fren', 8),
('RC7', 1, 'Hanger', 41),
('RC8', 1, 'Sapu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `Kode_Anggota` varchar(20) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `NIM` int(11) DEFAULT NULL,
  `Jurusan` varchar(50) DEFAULT NULL,
  `No_HP` int(11) DEFAULT NULL,
  `Kode_Divisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`Kode_Anggota`, `Nama`, `NIM`, `Jurusan`, `No_HP`, `Kode_Divisi`) VALUES
('AST1', 'budii', 1103213115, 'S1 Teknik Komputer', 123987654, 1),
('AST2', 'Ribhi', 110321324, 'S1 Teknik Komputer', 897893333, 2),
('AST3', 'Andre', 1103213114, 'S1 Teknik Komputer', 987654321, 3),
('AST4', 'Adrian', 1103213113, 'S1 Teknik Komputer', 879654321, 4);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `Kode_Divisi` int(11) NOT NULL,
  `Nama_Divisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`Kode_Divisi`, `Nama_Divisi`) VALUES
(1, 'Rock Climbing'),
(2, 'Orad'),
(3, 'Caving'),
(4, 'Diving'),
(5, 'Paralayang');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `Kode_Peminjaman` int(20) NOT NULL,
  `Kode_Anggota` varchar(20) DEFAULT NULL,
  `Kode_Alat` varchar(20) DEFAULT NULL,
  `Jumlah_Peminjaman` int(11) DEFAULT NULL,
  `Tanggal_Peminjaman` date DEFAULT NULL,
  `Tanggal_Pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`Kode_Peminjaman`, `Kode_Anggota`, `Kode_Alat`, `Jumlah_Peminjaman`, `Tanggal_Peminjaman`, `Tanggal_Pengembalian`) VALUES
(2, 'AST1', 'RC2', 2, '2023-06-09', '2023-06-17'),
(3, 'AST1', 'RC2', 1, '2023-06-10', '2023-06-11'),
(5, 'AST2', 'RC4', 2, '2023-06-10', '2023-06-13'),
(6, 'AST2', 'CV3', 5, '2023-06-10', '2023-06-14');

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `alat berkurang` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE alat set Jumlah_Alat = Jumlah_Alat - 		NEW.Jumlah_Peminjaman
    WHERE Kode_Alat = NEW.Kode_Alat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kembalikan_jumlah_alat` BEFORE DELETE ON `peminjaman` FOR EACH ROW BEGIN
    UPDATE alat
    SET Jumlah_Alat = Jumlah_Alat + OLD.Jumlah_Peminjaman
    WHERE Kode_Alat = OLD.Kode_Alat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validasi_jumlah_peminjaman` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN
    DECLARE available_qty INT;

    -- Mengambil jumlah alat yang tersedia untuk kode alat yang ingin dipinjam
    SELECT Jumlah_Alat INTO available_qty
    FROM alat
    WHERE Kode_Alat = NEW.Kode_Alat;

    -- Mengecek apakah jumlah peminjaman lebih besar dari jumlah alat yang tersedia
    IF NEW.Jumlah_Peminjaman > available_qty THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jumlah peminjaman melebihi jumlah alat yang tersedia.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'tes', 'test'),
(3, 'andre', 'tests'),
(5, 'adrian', 'tesadrian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`Kode_Alat`),
  ADD KEY `Alat_fk` (`Kode_Divisi`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`Kode_Anggota`),
  ADD KEY `Biodata_fk` (`Kode_Divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`Kode_Divisi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`Kode_Peminjaman`),
  ADD KEY `Peminjaman_fk1` (`Kode_Anggota`),
  ADD KEY `Peminjaman_fk2` (`Kode_Alat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `Kode_Peminjaman` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `Alat_fk` FOREIGN KEY (`Kode_Divisi`) REFERENCES `divisi` (`Kode_Divisi`) ON DELETE CASCADE;

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `Biodata_fk` FOREIGN KEY (`Kode_Divisi`) REFERENCES `divisi` (`Kode_Divisi`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `Peminjaman_fk1` FOREIGN KEY (`Kode_Anggota`) REFERENCES `biodata` (`Kode_Anggota`),
  ADD CONSTRAINT `Peminjaman_fk2` FOREIGN KEY (`Kode_Alat`) REFERENCES `alat` (`Kode_Alat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
