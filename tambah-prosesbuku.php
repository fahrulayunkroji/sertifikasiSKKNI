<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['tambah'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id_buku				= $_POST['id_buku'];	//membuat variabel $id_buku dan datanya dari inputan id_buku
	$kategori				= $_POST['kategori'];	//membuat variabel $kategori dan datanya dari inputan kategori
	$nm_buku				= $_POST['nm_buku'];	//membuat variabel $negara dan datanya dari inputan negara
	$p_buku					= $_POST['p_buku'];	//membuat variabel $p_buku	 dan datanya dari inputan p_buku
	$harga					= $_POST['harga'];	//membuat variabel $harga	 dan datanya dari inputan harga	
	$stok					= $_POST['stok'];	//membuat variabel $stok	 dan datanya dari inputan stok	
	$penerbit				= $_POST['penerbit'];	//membuat variabel $penerbit	 dan datanya dari inputan penerbit


			
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO tb_buku VALUES( '$id_buku', '$kategori', '$nm_buku', '$p_buku', '$harga', '$stok', '$penerbit')") or die(mysql_error());
	
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="buku.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="tambahbuku.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>