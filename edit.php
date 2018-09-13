<!DOCTYPE html>
<html>
<head>
	<title>TOKO</title>
</head>
<body bgcolor="#6eb23d">
	<center><h2>PERGUDANGAN INDONESIA </h2>
	
	<p><a href="index.php">Data Penerbit</a> / <a href="tambahpenerbit.php">Tambah Data Penerbit</a> / <a href="buku.php">Data Buku</a> / <a href="tambahbuku.php">Tambah Data Buku</a></p></center>
	
	
	<h3>Edit Data Penrbit</h3>
	
	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan id_penerbit yg didapatkan dari GET id_penerbit -> edit.php?id_penerbit=id_id_penerbit
	
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id_penerbit yg nilainya adalah dari URL GET id_penerbitr -> edit.php?id_penerbit=id_penerbit
	$id_penerbit = $_GET['id_penerbit'];
	
	//melakukan query ke database dg SELECT table tb_penerbit dengan kondisi WHERE id_penerbit = '$id_penerbit'
	$show = mysql_query("SELECT * FROM tb_penerbit WHERE id_penerbit='$id_penerbit'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form action="edit-proses.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id_penerbit; ?>">	<!-- membuat inputan hidden dan nilainya adalah id_penerbit -->
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>ID PENERBIT</td>
				<td>:</td>
				<td><input type="text" name="id_penerbit" value="<?php echo $data['id_penerbit']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Nama Penerbit</td>
				<td>:</td>
				<td><input type="text" name="nm_penerbit" size="30" value="<?php echo $data['nm_penerbit']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Negara</td>
				<td>:</td>
				<td>
					<select name="negara" required>
						<option value="">Pilih Negara</option>
						<option value="United Kingom" <?php if($data['negara'] == 'united Kingom'){ echo 'selected'; } ?>>united kingdom</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="United States" <?php if($data['negara'] == 'United States'){ echo 'selected'; } ?>>United States</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
					</select>
				</td>
			</tr>
			<tr>
				<td>KOTA</td>
				<td>
					<select name="kota" required>
						<option value="">Pilih kota</option>
						<option value="London" <?php if($data['kota'] == 'London'){ echo 'selected'; } ?>>London</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="New York" <?php if($data['kota'] == 'New York'){ echo 'selected'; } ?>>New York</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="simpan" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>