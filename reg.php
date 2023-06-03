<?php 
 include 'koneksi.php';
 if($_GET['aksi']=='inputpengunjung'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_pengunjung]) || empty($_POST[no_hp]) || empty($_POST[email_pengunjung])|| empty($_POST[alamat])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('index.php?aksi=pengunjung')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into pengunjung (nama_pengunjung,kode_booking,no_hp,email_pengunjung,alamat) 
	values ('$_POST[nama_pengunjung]','$_POST[no_hp]','$_POST[email_pengunjung]','$_POST[alamat]')");  
	echo "<script>window.location=('index.php?aksi=pengunjung')</script>";
} ?>