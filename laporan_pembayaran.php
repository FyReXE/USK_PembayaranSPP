<?php
session_start();
if (isset($_SESSION['login'])) {
	include "koneksi.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>cetak</title>
	<style type="text/css">
		body{
			font-family: Arial;
		}
		@media print{
			.no-print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<h3>LAPORAN PEMBAYARAN SPP</h3><br>
<h4>SMK MUHAMMADIYAH 1 YOGYAKARTA</h4>
<hr/>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th> 
		<th>No Pembayaran</th>
		<th>Bulan</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php
	$sqlBayar = mysqli_query($konek, "SELECT spp.*,siswa.nis,siswa.namasiswa,siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE tglbayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' ORDER BY tglbayar ASC");
	$no=1;
	while($d=mysqli_fetch_array($sqlBayar)){
		echo "<tr>
		<td align='center'>$no</td>
		<td align='center'>$d[nis]</td>
		<td>$d[namasiswa]</td>
		<td align='center'>$d[kelas]</td>
		<td align='center'>$d[nobayar]</td>
		<td>$d[bulan]</td>
		<td align='center'>$d[jumlah]</td>
		<td>$d[ket]</td>
		</tr>";
		$no++;	
	}
	?>
</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Yogyakarta, <?php echo date('d/m/Y'); ?><br/> Petugas,</p>
			<br/>
			<br/>
			<p>_____________________</p>
		</td>
	</tr>
</table>
<a href="#" class="no-print" onclick="window.print();">cetak</a>
</body>
</html>

	<?php
}else{
	header('location:login.php');
}
?>