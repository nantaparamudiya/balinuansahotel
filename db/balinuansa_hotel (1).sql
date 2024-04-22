-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 02:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balinuansa_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'balinuansa_hotel', 'sintya6166', 'Ni Kadek Sintya Cahyani');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `jenis_kamar` varchar(100) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `status_kamar` text NOT NULL,
  `foto_kamar` varchar(100) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `ketersediaan_kamar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kategori`, `jenis_kamar`, `harga_kamar`, `status_kamar`, `foto_kamar`, `fasilitas_kamar`, `ketersediaan_kamar`) VALUES
(1, 1, 'Standard Room', 500000, 'Vacant Clean', 'standard.jpg', '          Kamar Standard terletak di area sawah menghadap ke hutan hujan dari deck luar ruangan yang besar, dengan sofa daybed dan kursi berjemur di tepi kolam renang di sekitar kolam renang pribadi. Di dalam, pesona abadi berpadu dengan kenyamanan modern yang mewah seperti bak mandi berdiri bebas dari tembaga dan karya seni serta barang antik dari koleksi pribadi pemiliknya.\r\n\r\nInformasi Kamar : \r\nUkuran		: 173sqm\r\nLokasi		: Terletak di dekat pusat perkampungan dan sawah\r\nHunian		: 2 Dewasa dan 1 Anak atau 3 Dewasa\r\nTempat tidur	: Tempat tidur king (tempat tidur bayi atau tempat tidur tambahan tersedia berdasarkan permintaan)\r\nPemandangan	: Menghadap sawah dan hutan hujan\r\nCheck-in	: 15.00 \r\nCheck-out	: 12.00 \r\n\r\nFasilitas Kamar : \r\nGratis Internet Kecepatan Tinggi.\r\nKolam renang pribadi dan sun-deck kolam renang.\r\nBerbagai perlengkapan kamar mandi yang exclusive.\r\n        ', 5),
(2, 1, 'Superior Room', 600000, 'Vacant Clean', 'superior.jpg', '           Kamar Superior terletak menghadap ke hutan hujan dari deck luar ruangan yang besar, dengan sofa daybed dan kursi berjemur di tepi kolam renang di sekitar kolam renang pribadi. Di dalam, pesona abadi berpadu dengan kenyamanan modern yang mewah seperti bak mandi berdiri bebas dari tembaga dan karya seni serta barang antik dari koleksi pribadi pemiliknya.\r\n\r\nInformasi Kamar : \r\nUkuran		: 200sqm\r\nLokasi		: Terletak di dekat dekat hutan\r\nHunian		: 2 Dewasa dan 1 Anak atau 3 Dewasa\r\nTempat tidur	: Tempat tidur king (tempat tidur bayi atau tempat tidur tambahan tersedia berdasarkan permintaan)\r\nPemandangan	: Menghadap ke hutan hujan\r\nCheck-in	: 15.00\r\nCheck-out	: 12.00 \r\n\r\nFasilitas Kamar : \r\nGratis Internet Kecepatan Tinggi.\r\nKolam renang pribadi dan sun-deck kolam renang.\r\nBerbagai perlengkapan kamar mandi yang exclusive.\r\n                        ', 10),
(3, 1, 'Deluxe Room', 1000000, 'Vacant Clean', 'deluxe.jpg', '          Menawarkan pengalaman sungai Wos yang tenang, Deluxe Room adalah tempat untuk tidur nyenyak dengan kedekatan alam. Ditata secara individual, setiap tenda terinspirasi oleh panggilan para penjelajah awal, disempurnakan dengan fasilitas modern dan sentuhan bijaksana termasuk produk kamar mandi organik dan bak mandi tembaga tempa yang indah.\r\n\r\nInformasi Kamar : \r\nUkuran		: 200sqm\r\nLokasi		: Terletak di dekat sungai Wos, beberapa berada di medan yang landai\r\nHunian		: 2 Dewasa dan 1 Anak atau 3 Dewasa\r\nTempat tidur	: Tempat tidur king (tempat tidur bayi atau tempat tidur tambahan tersedia berdasarkan permintaan)\r\nPemandangan	: menawarkan pengalaman sungai Wos yang tenang.\r\nCheck-in:	: 15.00\r\nCheck-out	: 12.00 \r\n\r\nFasilitas Kamar : \r\nGratis Internet Kecepatan Tinggi.\r\nKolam renang pribadi dan sun-deck kolam renang.\r\nBerbagai perlengkapan kamar mandi yang exclusive.\r\n\r\n\r\n                ', 10),
(4, 1, 'Junior Suite Room', 1500000, 'Vacant Clean', 'juniorsuite.jpg', '          Junior Suite Room adalah salah satu yang biasanya paling diminati oleh para honeymoon traveler, karena biasanya dipergunakan sebagai kamar untuk pengantin dan honeymooner. Kamar ini menjadi primadona karena pemandangan yang indah dan lokasi tempat yang sangat privacy. Diselimuti oleh hutan dan air terjun yang gemericik, memberikan kenyamanan dan ketenangan bagi yang merasakannya.\r\n\r\nInformasi Kamar : \r\nUkuran		: 250sqm\r\nLokasi		: Terletak di dekat air terjun dan hutan\r\nHunian		: 2 Dewasa dan 1 Anak atau 3 Dewasa\r\nTempat tidur	: Tempat tidur king (tempat tidur bayi atau tempat tidur tambahan tersedia berdasarkan permintaan)\r\nPemandangan	: Hamparan hutan dan air terjun\r\nCheck-in	: 15.00\r\nCheck-out	: 12.00 \r\n\r\nFasilitas Kamar : \r\nGratis Internet Kecepatan Tinggi.\r\nKolam renang pribadi dan sun-deck  kolam renang.\r\nBerbagai perlengkapan kamar mandi yang exclusive.\r\n        ', 9),
(5, 2, 'Suite Room', 2000000, 'Vacant Clean', 'suiteroom.jpg', '          Berbaringlah di sofa daybed atau bersantailah di kursi santai di tepi kolam renang di sebelah kolam renang pribadi Anda. Suite Room kami menikmati pemandangan tanpa halangan melintasi lembah dan hutan hujan yang indah dari deck luar ruangan yang besar dan ruang makan. Di dalam, desain yang terinspirasi dari penjelajah dan kenyamanan modern berpadu untuk menciptakan tempat perlindungan pribadi yang mewah bagi para tamu kami.\r\n\r\nInformasi Kamar : \r\nUkuran		: 250sqm\r\nLokasi		: di dalam hutan hujan, beberapa berada di dataran miring\r\nHunian		: 2 Dewasa dan 1 Anak atau 3 Dewasa\r\nTempat tidur	: Tempat tidur king (tempat tidur bayi atau tempat tidur tambahan tersedia berdasarkan permintaan)\r\nPemandangan	: menawarkan pemandangan lembah Keliki yang paling dramatis, tidak terhalang dan ditinggikan serta kolam renang terbesar.\r\nCheck-in	: 15.00\r\nCheck-out	: 12.00 \r\n\r\nFasilitas Kamar : \r\nGratis Internet Kecepatan Tinggi.\r\nKolam renang pribadi dan sun-deck kolam renang terbesar.\r\nBerbagai perlengkapan kamar mandi yang exclusive \r\n        ', 8),
(6, 2, 'Presidental Suite Room', 2500000, 'Vacant Clean', 'presidental.jpg', '          Presidental Suite Room adalah kamar termewah dan termegah dari kamar lainnya, karena kamar ini dilengkapi dengan kamar tamu dan ruang makan. Kamar ini biasanya dipesan oleh tamu VIP/VVIP yang berkesempatan untuk menginap di Bali Nuansa Hotel. Kamar ini memiliki pemandangan yang luar biasa menghadap ke lembah dan air terjun, sehingga menambah kesan alam yang natural dan ketenangan bagi yang menikmatinya.\r\n\r\nInformasi Kamar : \r\nUkuran		: 400sqm\r\nLokasi		: Terletak di dekat air terjun dan hutan\r\nHunian		: 2 Dewasa dan 1 Anak atau 3 Dewasa\r\nTempat tidur	: Tempat tidur king (tempat tidur bayi atau tempat tidur tambahan tersedia berdasarkan permintaan)\r\nPemandangan	: Hamparan hutan dan air terjun\r\nCheck-in	: 15.00\r\nCheck-out	: 12.00 \r\n\r\nFasilitas Kamar : \r\nGratis Internet Kecepatan Tinggi.\r\nKolam renang pribadi dan sun-deck kolam renang.\r\nBerbagai perlengkapan kamar mandi yang exclusive.\r\nRuang Makan.\r\nRuang Tamu.\r\n        ', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kamar_foto`
--

CREATE TABLE `kamar_foto` (
  `id_kamar_foto` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_kamar_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar_foto`
--

INSERT INTO `kamar_foto` (`id_kamar_foto`, `id_kamar`, `nama_kamar_foto`) VALUES
(5, 15, '3.png'),
(14, 18, '3.png'),
(15, 19, '3.png'),
(16, 20, '3.png'),
(17, 21, ''),
(18, 22, ''),
(19, 23, ''),
(20, 24, '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Exclusive'),
(2, 'Super Exclusive');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(5) NOT NULL,
  `nama_daerah` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_daerah`, `tarif`) VALUES
(1, 'Indonesia', 50000),
(2, 'Australia', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 26, 'David Coral', 'Mandiri', 2500000, '2022-06-21', '20220621114830transaksi.JPG'),
(2, 27, 'David Coral', 'Mandiri', 2000000, '2022-06-22', '20220622004623transaksi.JPG'),
(3, 38, 'David Coral', 'Mandiri', 600000, '2022-06-22', '20220622014324transaksi.JPG'),
(4, 39, 'David Coral', 'Mandiri', 500000, '2022-06-22', '20220622030149transaksi.JPG'),
(5, 48, 'Fernandez Barbara', 'Mandiri', 4000000, '2022-06-25', '20220625073134transaksi.JPG'),
(6, 49, 'Fernandez Barbara', 'Mandiri', 500000, '2022-06-25', '20220625073242transaksi.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(20) NOT NULL,
  `id_tamu` int(20) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `nama_daerah` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_tamu` text NOT NULL,
  `status_pemesanan` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pelayanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_tamu`, `id_layanan`, `tanggal_pemesanan`, `total_pembayaran`, `nama_daerah`, `tarif`, `alamat_tamu`, `status_pemesanan`, `resi_pelayanan`) VALUES
(47, 7, 2, '2022-06-23', 2500000, 'Australia', 100000, 'Jl.Meranggi Jakarta', 'pending', ''),
(48, 1, 2, '2022-06-25', 4000000, 'Australia', 100000, 'Darwin Avenue, Yarralumla Canberra, ACT 2600. Australia', 'Sudah mengirim pembayaran', 'ABBA12'),
(49, 1, 2, '2022-06-25', 500000, 'Australia', 100000, 'Brisbane', 'Lunas', 'ABBA223'),
(50, 1, 2, '2022-06-25', 500000, 'Australia', 100000, 'Brisbane', 'pending', ''),
(51, 1, 2, '2022-06-25', 2000000, 'Australia', 100000, 'Brisbane, Australia', 'pending', ''),
(52, 1, 2, '2022-06-25', 2000000, 'Australia', 100000, 'Australia', 'pending', ''),
(53, 1, 2, '2022-06-25', 500000, 'Australia', 100000, 'Australia', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_kamar`
--

CREATE TABLE `pemesanan_kamar` (
  `id_pemesanan_kamar` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_kamar`
--

INSERT INTO `pemesanan_kamar` (`id_pemesanan_kamar`, `id_pemesanan`, `id_kamar`, `jumlah`, `nama`) VALUES
(1, 1, 1, 1, ''),
(2, 2, 1, 2, ''),
(3, 3, 3, 1, ''),
(4, 21, 2, 1, ''),
(5, 21, 3, 1, ''),
(6, 22, 2, 1, ''),
(7, 22, 3, 1, ''),
(8, 23, 2, 1, ''),
(9, 23, 3, 1, ''),
(10, 24, 1, 1, ''),
(11, 25, 4, 1, ''),
(12, 26, 6, 1, ''),
(13, 27, 5, 1, ''),
(14, 29, 1, 1, ''),
(15, 30, 1, 1, ''),
(16, 31, 4, 1, ''),
(17, 32, 6, 1, ''),
(18, 33, 1, 1, ''),
(19, 35, 1, 1, ''),
(20, 36, 1, 1, ''),
(21, 37, 5, 1, ''),
(22, 38, 1, 1, ''),
(23, 39, 1, 1, ''),
(24, 40, 1, 1, ''),
(25, 41, 1, 1, ''),
(26, 42, 1, 1, ''),
(27, 43, 1, 1, ''),
(28, 44, 1, 1, ''),
(29, 45, 1, 1, ''),
(30, 46, 6, 1, ''),
(31, 47, 6, 1, ''),
(32, 48, 6, 1, ''),
(33, 48, 4, 1, ''),
(34, 49, 1, 1, ''),
(35, 50, 1, 1, ''),
(36, 51, 5, 1, ''),
(37, 52, 5, 1, ''),
(38, 53, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `email_tamu` varchar(100) NOT NULL,
  `password_tamu` varchar(50) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `telepon_tamu` varchar(25) NOT NULL,
  `alamat_tamu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `email_tamu`, `password_tamu`, `nama_tamu`, `telepon_tamu`, `alamat_tamu`) VALUES
(1, 'fernand125@gmail.com', 'fernand', 'Fernandez Barbara', '08551745322', 'Darwin Avenue, Yarralumla Canberra, ACT 2600. Australia'),
(2, 'kevintimothy@gmail.com', 'kevinsima', 'Kevin Timothy', '08352673864', '72 Queens Road, Melbourne VIC 3004'),
(3, 'alexandra@gmail.com', 'alexandra', 'Alexandra Hudolf', '0884368623', '236-238 Maroubra Road, Maroubra, NSW 2035, Sydney, Australia'),
(4, 'fardiahardiansyahn@gamil.com', 'fardianhardi', 'Fardian Hardiansyah', '089736489262', 'Jl.Meranggi, Jakarta Selatan'),
(5, 'davidcoral@gmail.com', 'davidcoral', 'David Coral', '08673289399', '20 Harry Chan Avenue-Darwin N.T 0800'),
(7, 'hervan@gmail.com', 'hervann', 'Hervan Gabrielle', '+612438938', 'Tasmania, Queensland, Australia'),
(8, 'heelza@gmail.com', 'helezaa', 'Heleza Mukhtar', '+612345676', 'Brisbane, Peternboug, Australia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kamar_foto`
--
ALTER TABLE `kamar_foto`
  ADD PRIMARY KEY (`id_kamar_foto`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_kamar`
--
ALTER TABLE `pemesanan_kamar`
  ADD PRIMARY KEY (`id_pemesanan_kamar`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kamar_foto`
--
ALTER TABLE `kamar_foto`
  MODIFY `id_kamar_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pemesanan_kamar`
--
ALTER TABLE `pemesanan_kamar`
  MODIFY `id_pemesanan_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
