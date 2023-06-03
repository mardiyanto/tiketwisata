<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
if($_SESSION['status'] != "administrator_logedin"){
  header("location:../login.php?alert=belum_login");
}
$date=date ('d/m/Y');
$time=date ('h:i A');
	if(ISSET($_FILES['upload'])){
		$tanggal=date("dmYhis");
		$file_name = $_FILES['upload']['name'];
		$file_temp = $_FILES['upload']['tmp_name'];
		$nama_file_unik = $tanggal.$file_name; 
		$path = "../upload/".$nama_file_unik;
       	if(move_uploaded_file($file_temp, $path)){
			mysqli_query($koneksi,"insert into file (file_name,location,id_pegawai,nama_file) values ('$nama_file_unik','$path','$_POST[id_pegawai]','$_POST[nama_file]')"); 
		
			echo "<br><br><a class='btn btn-block btn-success' href='index.php?aksi=listuploadfile&id_pegawai=$_POST[id_pegawai]'>Lihat Berkas</a>";
		}
	}else{
		header('location: index.php?aksi=prosesupload');
	}
?>
