<?php
error_reporting(0); 
$server = "localhost";
$username = "root";
$password = "";
$database = "db_aset";
// Koneksi dan memilih database di server
$koneksi = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
mysqli_select_db($koneksi,$database) or die("Database tidak bisa dibuka");
$kontak_kami=mysqli_query($koneksi,"SELECT * FROM profil WHERE id_profil ='1'");
$k_k=mysqli_fetch_array($kontak_kami);
$kadis=mysqli_query($koneksi,"SELECT * FROM profil WHERE id_profil ='2'");
$tt=mysqli_fetch_array($kadis); 
?>
