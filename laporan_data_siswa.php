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
<h3>LAPORAN DATA SISWA</h3>
<hr/>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th> 
	</tr>
	<?php
	$sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa ORDER BY nis ASC");
	$no=1;
	while($d=mysqli_fetch_array($sqlSiswa)){
		echo "<tr>
		<td align='center'>$no</td>
		<td align='center'>$d[nis]</td>
		<td>$d[namasiswa]</td>
		<td>$d[kelas]</td>
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