<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:login.php');
}
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>SPPKU</title>
</head>
<body>
<p align="center"><h2>Selamat datang di aplikasi pembayaran SPPKU</h2>
</p><hr/>
<label for="data"></label>
<select id="data">
 <option value="admin"><a href="tampil_admin">Data Admin</a></option>
  <option value="siswa"><a href="tampil_siswa">Data Siswa</a></option>
  <option value="kelas"><a href="tampil_kelas">Data kelas</a></option>
</select>
<a href="transaksi.php">Transaksi</a>
<a href="laporan.php">Laporan</a>
<a href="logout.php">Logout</a>
<hr/>
<h3>Selamat Datang di Aplikasi Pembayaran SPP</h3>
<h4>SMK Muhammadiyah 1 Yogyakarta
</body>
</html>