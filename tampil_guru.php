<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style type="text/css">
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

</style>

<?php include "header.php"; ?>

<h3>Data Guru</h3>
<a href="tambah_guru.php" class="w3-button w3-black">Tambah Data <i class="fa fa-plus" aria-hidden="true"></i></a><br>
<table border="1" id="customers">
	<tr>
		<th>No</th>
		<th>Nama Guru</th>
		<th>Aksi</th>
	</tr>
	<?php
	$sql=mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[namaguru]</td>
			<td>
				<a href='edit_guru.php?id=$d[idguru]'>Edit</a> /
				<a href='hapus_guru.php?id=$d[idguru]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
<?php include "footer.php"; ?>