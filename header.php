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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>
 <div class="navbar">
   <a href="index.php"><img src="./assets/img/logo2.png" width="40" height="40"></a><br>
  <div class="dropdown">
    <button class="dropbtn">Data
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="tampil_guru.php">Data Guru</a>
      <a href="tampil_siswa.php">Data Siswa</a>
    </div>
  	</div> 
    <a href="transaksi.php">transaksi</a>
  	<a href="laporan.php">laporan</a>
  	<a href="logout.php">Logout</a>

</div>
<hr/>