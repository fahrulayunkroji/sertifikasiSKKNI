<!DOCTYPE html>
<html>
<head>
	<head>
	<title>TOKO</title>
</head>
<body bgcolor="#6eb23d">
	<center><h2>PERGUDANGAN INDONESIA</h2></center>

	
	<center><p><a href="index.php">Data Penerbit</a> / <a href="tambahpenerbit.php">Tambah Data Penerbit</a> / <a href="buku.php">Data Buku</a> / <a href="tambahbuku.php">Tambah Data Buku</a></p></center>
	
	<h3>Edit Data Buku</h3> 
	
	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan id_buku yg didapatkan dari GET id_buku -> editbuku.php?id_buku=id_buku
	
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id_buku yg nilainya adalah dari URL GET id -> editbuku.php?id=id_buku
	$id_buku = $_GET['id_buku'];
	
	//melakukan query ke database dg SELECT table tb_buku dengan kondisi WHERE id_buku = '$id'
	$show = mysql_query("SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> buku.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form action="edit-prosesbuku.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>ID BUKU</td>
				<td>:</td>
				<td><input type="text" name="id_buku" value="<?php echo $data['id_buku']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>KATEGORI</td>
				<td>:</td>
				<td>
					<select name="kategori" required>
						<option value="">Pilih Kategori</option>
						<option value="Contemporary Fiction" <?php if($data['kategori'] == 'Contemporary Fiction'){ echo 'selected'; } ?>>Contemporary Fiction</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="Crime Fiction" <?php if($data['kategori'] == 'Crime Fiction'){ echo 'selected'; } ?>>Crime Fiction</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="Classic" <?php if($data['kategori'] == 'Classic'){ echo 'selected'; } ?>>Classic</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
					</select>
				</td>
			</tr>
			<tr>
				<td>NAMA BUKU</td>
				<td>:</td>
				<td><input type="text" name="nm_buku" value="<?php echo $data['nm_buku']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>PENGARANG BUKU</td>
				<td>:</td>
				<td><input type="text" name="p_buku" value="<?php echo $data['p_buku']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type="text" name="harga" value="<?php echo $data['harga']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>STOK</td>
				<td>:</td>
				<td><input type="text" name="stok" value="<?php echo $data['stok']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>PENERBIT</td>
				<td>:</td>
				<td>
					<select name="penerbit" required>
						<option value="">Pilih penerbit</option>
						<option value="Vintage Publishing" <?php if($data['penerbit'] == 'Vintage Publishing'){ echo 'selected'; } ?>>Vintage Publishing</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="HarperCollins Publisher Inc" <?php if($data['penerbit'] == 'HarperCollins Publisher Inc'){ echo 'selected'; } ?>>HarperCollins Publisher Inc</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="Cornerstone" <?php if($data['penerbit'] == 'Cornerstone'){ echo 'selected'; } ?>>Cornerstone</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
						<option value="Penguin Books Ltd" <?php if($data['penerbit'] == 'Penguin Books Ltd'){ echo 'selected'; } ?>>Penguin Books Ltd</option>	<!-- jika data di database sama dengan value maka akan terselect/terpilih -->
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