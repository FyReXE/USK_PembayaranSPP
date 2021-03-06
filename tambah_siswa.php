<?php include "header.php"; ?>

<h3>Tambah Data Siswa</h3>
<form method="post" action="">
	<table>
		<tr>
			<td>NIS</td>
			<td><input type="text" name="nis" maxlength="10"></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><input type="text" name="namasiswa" maxlength="40"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
				<select name="kelas">
					<option value="" selected>- Pilih Kelas -</option>
					<?php
					$sqlKelas = mysqli_query($konek, "select * from walikelas order by kelas ASC");
					while($k=mysqli_fetch_array($sqlKelas)){
						?>
						<option value="<?php echo $k['kelas']; ?>"><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><input type="text" name="tahunajaran" value="2019/2020" readonly /></td>
		</tr>
		<tr>
			<td>Biaya SPP</td>
			<td><input type="text" name="biaya" value="250000" readonly /></td>
		</tr>
		<tr>
			<td>Jatuh Tempo Pertama</td>
			<td><input type="text" name="jatuhtempo" value="2019-10-01" readonly /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan" /></td>
		</tr>
	</table>
</form>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$nis 	= $_POST['nis'];
		$nama 	= $_POST['namasiswa'];
		$kelas 	= $_POST['kelas'];
		$tahun 	= $_POST['tahunajaran'];
		$biaya 	= $_POST['biaya'];
		$awaltempo = $_POST['jatuhtempo'];

		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);



		if($nis=='' || $nama=='' || $kelas==''){
			echo "Form belum lengkap...";
		}else{
			$simpan = mysqli_query($konek, "insert into siswa(nis,namasiswa,kelas,tahunajaran,biaya)
					values('$nis','$nama','$kelas','$tahun','$biaya')");
			if(!$simpan){
				echo "Penyimpanan data gagal..";
			}else{
			
				$ds=mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
				$idsiswa = $ds['idsiswa'];

			
				for($i=0; $i<12; $i++){
					
					$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

					$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

					mysqli_query($konek, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah)
								values('$idsiswa','$jatuhtempo','$bulan','$biaya')");
				}

				header('location:tampil_siswa.php');
			}
		}

	}
?>

<?php include "footer.php"; ?>