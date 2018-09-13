<!DOCTYPE html>
<html>
<head>
	<title>TOKO</title>
</head>
<body bgcolor="#6eb23d">
	<center><h2>PERGUDANGAN INDONESIA</h2></center>

	
	<center><p><a href="index.php">Data Penerbit</a> / <a href="tambahpenerbit.php">Tambah Data Penerbit</a> / <a href="buku.php">Data Buku</a> / <a href="tambahbuku.php">Tambah Data Buku</a></p></center>
	
	<h3>Tambah Buku</h3> 
	
	<form action="tambah-prosesbuku.php" method="post">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>ID BUKU</td>
				<td>:</td>
				<td><input type="text" name="id_buku" required></td>
			</tr>
			<tr>
				<td>KATEGORI</td>
				<td>:</td>
				<td>
					<select name="kategori" required>
						<option value="">Pilih kategori</option>
						<option value="Contempory Fiction">Contempory Fiction</option>
						<option value="Crime Fiction">Crime Fiction</option>
						<option value="Classic">Classic</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>NAMA BUKU</td>
				<td>:</td>
				<td><input type="text" name="nm_buku" required></td>
			</tr>
			<tr>
				<td>PENGARANG BUKU</td>
				<td>:</td>
				<td><input type="text" name="p_buku" required></td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td><input type="text" name="harga" required></td>
			</tr>
			<tr>
				<td>STOK</td>
				<td>:</td>
				<td><input type="text" name="stok" required></td>
			</tr>
			<tr>
				<td>PENERBIT</td>
				<td>:</td>
				<td>
					<select name="penerbit" required>
						<option value="">Pilih Penerbit</option>
						<option value="Vintage Publishing">Vintage Publishing</option>
						<option value="HarperCollins Publisher Inc">HarperCollins Publisher Inc</option>
						<option value="Cornerstone">Cornerstone</option>
						<option value="Penguin Books Ltd">Penguin Books Ltd</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>