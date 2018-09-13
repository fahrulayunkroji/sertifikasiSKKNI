<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id_penerbit		= $_POST['id_penerbit'];	
	$nm_penerbit		= $_POST['nm_penerbit'];	//membuat variabel $nm_penerbit dan datanya dari inputan nm_penerbit
	$negara				= $_POST['negara'];	//membuat variabel $negara dan datanya dari inputan negara
	$kota				= $_POST['kota'];	//membuat variabel $kota dan datanya dari inputan kota
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE id_penerbi='$id_penerbi' <- diambil dari inputan hidden id_penerbi
	$update = mysql_query("UPDATE tb_penerbit SET id_penerbit='$id_penerbit', nm_penerbit='$nm_penerbit', negara='$negara', kota='$kota' WHERE id_penerbit ='$id_penerbit'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="index.php?id_penerbit='.$id_penerbit.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit.php?id_penerbit='.$id_penerbit.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>