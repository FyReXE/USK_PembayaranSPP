<?php
include "header.php"; ?>
<h3>laporan</h3>
<ul>
	<li><a href="laporan_data_guru.php" target="_blank">laporan Data Guru</a></li>
	<li><a href="laporan_data_siswa.php" target="_blank">laporan Data Siswa</a></li>
	<li>
		<strong>Laporan Pembayaran</strong><br/>
		<form method="GET" action="laporan_pembayaran.php" target="_blank">
			Mulai tanggal <input type="date" name="tgl1" />
			sampai tanggal <input type="date" name="tgl2" />
			<input type="submit" value="tampilkan">
		</form>
	</li>
</ul>