<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=id_penerbi
if(isset($_GET['id_penerbit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=id_penerbit
	$id_penerbit= $_GET['id_penerbit'];
	
	//cek ke database apakah ada data siswa dengan id_penerbit='$id'
	$cek = mysql_query("SELECT id_penerbit FROM tb_penerbit WHERE id_penerbit='$id_penerbit'") or die(mysql_error());
	
	//jika data siswa tidak ada
	if(mysql_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	
	}else{
		
		//jika data ada di database, maka melakukan query DELETE table buku dengan kondisi WHERE id_penerbit='$id'
		$del = mysql_query("DELETE FROM tb_penerbit WHERE id_penerbit='$id_penerbit'");
		
		//jika query DELETE berhasil
		if($del){
			
			echo 'Data siswa berhasil di hapus! ';		//Pesan jika proses hapus berhasil
			echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
			
		}else{
			
			echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
			echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
		
		}
		
	}
	
}else{
	
	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
	
}
?>