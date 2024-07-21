-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2024 pada 14.11
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stokbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stok`, `satuan`, `keterangan`) VALUES
(1, 'ELEC001', 'Laptop', 7, 'unit', 'Laptop dengan prosesor Intel Core i7'),
(2, 'ELEC002', 'Smartphone', 25, 'unit', 'Smartphone dengan layar 6.5 inci'),
(7, 'ELEC007', 'Kamera Digital', 18, 'unit', 'Kamera digital 20MP dengan lensa zoom'),
(9, 'ELEC009', 'Printer', 14, 'unit', 'Printer inkjet dengan fitur scan dan copy'),
(10, 'ELEC010', 'Tablet', 22, 'unit', 'Tablet dengan layar 10 inci dan RAM 4GB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `kode`, `nama`, `email`, `telepon`, `alamat`) VALUES
(1, 'CUST001', 'Andi Saputra', 'andi.saputra@example.com', '081234567890', 'Jl. Merdeka No. 10, Jakarta'),
(2, 'CUST002', 'Budi Santoso', 'budi.santoso@example.com', '081234567891', 'Jl. Kebangsaan No. 5, Bandung'),
(3, 'CUST003', 'Citra Dewi', 'citra.dewi@example.com', '081234567892', 'Jl. Pahlawan No. 8, Surabaya'),
(4, 'CUST004', 'Dedi Kusuma', 'dedi.kusuma@example.com', '081234567893', 'Jl. Kemerdekaan No. 3, Yogyakarta'),
(5, 'CUST005', 'Eka Wulandari', 'eka.wulandari@example.com', '081234567894', 'Jl. Proklamasi No. 7, Medan'),
(6, 'CUST006', 'Fajar Hidayat', 'fajar.hidayat@example.com', '081234567895', 'Jl. Kartini No. 12, Malang'),
(7, 'CUST007', 'Gita Putri', 'gita.putri@example.com', '081234567896', 'Jl. Diponegoro No. 4, Semarang'),
(8, 'CUST008', 'Hendra Wijaya', 'hendra.wijaya@example.com', '081234567897', 'Jl. Sudirman No. 6, Makassar'),
(9, 'CUST009', 'Indah Sari', 'indah.sari@example.com', '081234567898', 'Jl. Gajah Mada No. 11, Bali'),
(10, 'CUST010', 'Joko Prasetyo', 'joko.prasetyo@example.com', '081234567899', 'Jl. Imam Bonjol No. 2, Palembang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_toko`
--

CREATE TABLE `data_toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(80) DEFAULT NULL,
  `nama_pemilik` varchar(80) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_toko`
--

INSERT INTO `data_toko` (`id`, `nama_toko`, `nama_pemilik`, `no_telepon`, `alamat`) VALUES
(1, 'ELEKTROSTORE', 'Dimas ', '081234567890', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `no_keluar` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_keluar`
--

INSERT INTO `detail_keluar` (`no_keluar`, `nama_barang`, `jumlah`, `satuan`, `keterangan`) VALUES
('NK001', 'Laptop', 2, 'unit', 'Pengeluaran untuk keperluan kantor'),
('NK002', 'Smartphone', 3, 'unit', 'Pengiriman kepada pelanggan'),
('NK003', 'Televisi', 1, 'unit', 'Penggantian barang rusak'),
('NK004', 'Kulkas', 2, 'unit', 'Pemesanan untuk gudang tambahan'),
('NK005', 'Mesin Cuci', 1, 'unit', 'Pengiriman kepada pelanggan'),
('TR1720574767', 'Laptop', 1, '', 'inventaris'),
('TR1720575864', 'Laptop', 1, 'unit', 'inventaris'),
('TR1721563508', 'Laptop', 1, 'unit', 'inventaris'),
('TR1721563547', 'Laptop', 1, 'unit', 'inventaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_terima`
--

CREATE TABLE `detail_terima` (
  `no_terima` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_terima`
--

INSERT INTO `detail_terima` (`no_terima`, `nama_barang`, `jumlah`, `satuan`, `keterangan`) VALUES
('NM001', 'Laptop', 5, 'unit', 'Pembelian dari distributor A'),
('NM002', 'Smartphone', 10, 'unit', 'Pembelian untuk stok baru'),
('NM003', 'Televisi', 3, 'unit', 'Pembelian untuk promo akhir tahun'),
('NM004', 'Kulkas', 4, 'unit', 'Pembelian dari pameran elektronik'),
('NM005', 'Mesin Cuci', 2, 'unit', 'Pengadaan untuk penjualan meningkat'),
('TR1720575280', 'Laptop', 1, '', 'produk baru'),
('TR1720575678', 'Laptop', 1, '', 'produk baru'),
('TR1721562826', 'Laptop', 5, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_terima` varchar(25) DEFAULT NULL,
  `tgl_terima` varchar(25) DEFAULT NULL,
  `jam_terima` varchar(10) DEFAULT NULL,
  `nama_supplier` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_terima`, `tgl_terima`, `jam_terima`, `nama_supplier`, `nama_petugas`) VALUES
(24, 'TR1720571504', '10/07/2024', '07:31:44', 'Ijad', 'Dimas'),
(25, 'TR1720571719', '10/07/2024', '07:35:19', 'Ijad', 'Dimas'),
(26, 'TR1720571719', '10/07/2024', '07:35:19', 'Ijad', 'Dimas'),
(27, 'TR1720573394', '2024-07-10', '08:03:14', 'Ijad', 'Dimas'),
(28, 'TR1720573444', '10/07/2024', '08:04:04', 'Ijad', 'Dimas'),
(29, 'TR1720573460', '10/07/2024', '08:04:20', '', 'Dimas'),
(30, 'TR1720573504', '10/07/2024', '08:05:04', 'Ijad', 'Dimas'),
(31, 'TR1720573688', '10/07/2024', '08:08:08', 'Ijad', 'Dimas'),
(32, 'TR1720573716', '10/07/2024', '08:08:36', 'Ijad', 'Dimas'),
(33, 'TR1720573727', '10/07/2024', '08:08:47', '', 'Dimas'),
(34, 'TR1720574142', '10/07/2024', '08:15:42', 'Ijad', 'Dimas'),
(36, 'TR1720575280', '10/07/2024', '08:34:40', 'Ijad', 'Dimas'),
(37, 'TR1720575678', '10/07/2024', '08:41:18', 'Ijad', 'Dimas'),
(38, 'TR1721562826', '21/07/2024', '18:53:46', 'Ijad', 'Dimas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(25) DEFAULT NULL,
  `tgl_keluar` varchar(25) DEFAULT NULL,
  `jam_keluar` varchar(10) DEFAULT NULL,
  `nama_customer` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `no_keluar`, `tgl_keluar`, `jam_keluar`, `nama_customer`, `nama_petugas`) VALUES
(26, 'TR1720574767', '10/07/2024', '08:26:07', 'Andi Saputra', 'Dimas'),
(31, 'TR1721563508', '21/07/2024', '19:05:08', 'Andi Saputra', 'Dimas'),
(32, 'TR1721563547', '21/07/2024', '19:05:47', 'Andi Saputra', 'Dimas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(1, 'PGN17', 'Dimas', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(4, 'PETUGAS - 43', 'Dimas', 'petugas', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `email`, `telepon`, `alamat`) VALUES
(2, 'SPL118', 'Ijad', 'Ijad@gmail.com', '085000000000', 'Jogja');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_terima` (`no_terima`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_keluar` (`no_keluar`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
