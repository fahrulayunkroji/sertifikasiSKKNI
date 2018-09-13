
<!DOCTYPE html>
<html>
<head>
	<title>TOKO</title>
</head>
<body bgcolor="#6eb23d">
	<center><h2>PERGUDANGAN INDONESIA</h2></center>

	
	<center><p><a href="index.php">Data Penerbit</a> / <a href="tambahpenerbit.php">Tambah Data Penerbit</a> / <a href="buku.php">Data Buku</a> / <a href="tambahbuku.php">Tambah Data Buku</a></p></center>
	
	<h3>Data Penerbit</h3> 


	<form action="buku.php" method="get">
		<label> Cari : </label>
		<input type="text" name="cari">
		<input type="submit" value="cari">
	</form>
	<br>

	<?php
	if (isset($_GET['cari'])) {
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : " .$cari. "</b>";

	
}
?>


	
	<table cellpadding="5" cellspacing="0" border="1" bgcolor="#b9f712">
		<tr bgcolor="#CCCCCC">
			<th>ID BUKU</th>
			<th>KATAGORI</th>
			<th>NAMA BUKU</th>
			<th>PENGARANG BUKU</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th>PENERBIT</th>
			<th>Opsi</th>
		</tr>
		
		<?php
		//iclude file koneksi ke database
		include('koneksi.php');


		
		//query ke database dg SELECT table buku diurutkan berdasarkan nm_buku paling besar
		if (isset($cari) == "") {
			$query = mysql_query("SELECT * FROM tb_buku ORDER BY nm_buku DESC") or die(mysql_error());
		} else {
			$query = mysql_query("SELECT * FROM tb_buku where nm_buku = '".$cari."' ORDER BY nm_buku DESC") or die(mysql_error());
		}
		


		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query) == 0){

			//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)

			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = mysql_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td>'.$data['id_buku'].'</td>';	//menampilkan data id_penerbit dari database
					echo '<td>'.$data['kategori'].'</td>';	//menampilkan data nama penerbit dari database
					echo '<td>'.$data['nm_buku'].'</td>';	//menampilkan data negara dari database
					echo '<td>'.$data['p_buku'].'</td>';	//menampilkan data kota dari database
					echo '<td>'.$data['harga'].'</td>';	//menampilkan data negara dari database
					echo '<td>'.$data['stok'].'</td>';	//menampilkan data kota dari database
					echo '<td>'.$data['penerbit'].'</td>';	//menampilkan data kota dari database
echo '<td><a href="editbuku.php?id_buku='.$data['id_buku'].'">Edit</a> <a href="hapusbuku.php?id_buku='.$data['id_buku'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
					//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id_penerbit=id_penerbit
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}

		?>
	</table>
</body>
</html>