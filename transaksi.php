<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<style type="text/css">
	* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

<?php include "header.php" ?>

<h3>Transaksi Pembayaran SPP</h3>
	<form method="get" action="">
	NIS: <input type="text" name="nis" />
	<input type="submit" name="cari" value="Cari Siswa" />
</form>

<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>

<h3>Biodata Siswa</h3>
<table>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>

<h3>Tagihan SPP Siswa</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	<?php
	$sql = mysqli_query($konek, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>$d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[idspp]'>Bayar</a>";
				}else{
					echo "-";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php
}
?>

<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>

<?php include "footer.php" ?>