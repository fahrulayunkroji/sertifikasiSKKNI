<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=id_buku
if(isset($_GET['id_buku'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=id_buku
	$id_buku= $_GET['id_buku'];
	
	//cek ke database apakah ada data siswa dengan id_buku='$id'
	$cek = mysql_query("SELECT id_buku FROM tb_buku WHERE id_buku='$id_buku'") or die(mysql_error());
	
	//jika data siswa tidak ada
	if(mysql_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	
	}else{
		
		//jika data ada di database, maka melakukan query DELETE table buku dengan kondisi WHERE id_buku='$id'
		$del = mysql_query("DELETE FROM tb_buku WHERE id_buku='$id_buku'");
		
		//jika query DELETE berhasil
		if($del){
			
			echo 'Data siswa berhasil di hapus! ';		//Pesan jika proses hapus berhasil
			echo '<a href="buku.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
			
		}else{
			
			echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
			echo '<a href="buku.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
		
		}
		
	}
	
}else{
	
	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
	
}
?>