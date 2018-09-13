<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['input'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id_penerbit		= $_POST['id_penerbit'];	//membuat variabel $id_penerbit dan datanya dari inputan id_penerbit
	$nm_penerbit		= $_POST['nm_penerbit'];	//membuat variabel $nm_penerbit dan datanya dari inputan nm_penerbit
	$negara				= $_POST['negara'];	//membuat variabel $negara dan datanya dari inputan negara
	$kota				= $_POST['kota'];	//membuat variabel $kota dan datanya dari inputan kota
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO tb_penerbit VALUES('$id_penerbit', '$nm_penerbit', '$negara', '$kota')") or die(mysql_error());
	
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>