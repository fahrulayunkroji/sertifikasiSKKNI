<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id_buku				= $_POST['id_buku'];	
	$kategori				= $_POST['kategori'];	//membuat variabel $kategori dan datanya dari inputan kategori
	$nm_buku				= $_POST['nm_buku'];	//membuat variabel $nm_buku dan datanya dari inputan nm_buku
	$p_buku					= $_POST['p_buku'];	//membuat variabel $p_buku dan datanya dari inputan p_buku
	$harga					= $_POST['harga'];	//membuat variabel $harga dan datanya dari inputan harga
	$stok					= $_POST['stok'];	//membuat variabel $stok dan datanya dari inputan stok
	$penerbit				= $_POST['penerbit'];	//membuat variabel $penerbit dan datanya dari inputan harga
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE id_penerbi='$id_penerbi' <- diambil dari inputan hidden id_penerbi
	$update = mysql_query("UPDATE tb_buku SET id_buku='$id_buku', kategori='$kategori', nm_buku='$nm_buku', p_buku='$p_buku', harga='$harga', stok='$stok', penerbit='$penerbit' WHERE id_buku ='$id_buku'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="buku.php?id_buku='.$id_buku.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit.php?id_buku='.$id_bukut.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>