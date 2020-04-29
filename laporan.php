
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php
include "header.php"; ?>
<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;laporan</h3>
<ul>
	<a href="laporan_data_guru.php" target="_blank" class="w3-button w3-black">laporan Data Guru</a><br><br>
	<a href="laporan_data_siswa.php" target="_blank" class="w3-button w3-black">laporan Data Siswa</a><br><br>
	
		<strong>Laporan Pembayaran</strong><br/>
		<form method="GET" action="laporan_pembayaran.php" target="_blank">	Mulai tanggal <input type="date" name="tgl1" />
			sampai tanggal <input type="date" name="tgl2" />
			<input type="submit" value="tampilkan">
		
		</form>
	</li>
</ul>

<?php
include "footer.php"
?>