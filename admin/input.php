<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='inputtiket'){
// Memeriksa apakah input kosong
if (empty($_POST[nama_tiket]) || empty($_POST[harga_tiket]) || empty($_POST[keterangan])) {
	echo "<script>window.alert('Data yang Anda isikan belum lengkap');
	window.location=('index.php?aksi=tiket')</script>";
	exit();
}	
mysqli_query($koneksi,"insert into tiket (nama_tiket,harga_tiket,keterangan) 
values ('$_POST[nama_tiket]','$_POST[harga_tiket]','$_POST[keterangan]')");  
echo "<script>window.location=('index.php?aksi=tiket')</script>";
}
elseif($_GET['aksi']=='inputpembayaran'){
mysqli_query($koneksi,"insert into pembayaran (metode_bayar,nomor_bayar,atas_nama) 
values ('$_POST[metode_bayar]','$_POST[nomor_bayar]','$_POST[atas_nama]')");  
echo "<script>window.location=('index.php?aksi=pembayaran')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputpengunjung'){
	// Memeriksa apakah input kosong
	if (empty($_POST[nama_pengunjung]) || empty($_POST[no_hp]) || empty($_POST[email_pengunjung])|| empty($_POST[alamat])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('index.php?aksi=pengunjung')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into pengunjung (nama_pengunjung,kode_booking,no_hp,email_pengunjung,alamat) 
	values ('$_POST[nama_pengunjung]','$_POST[no_hp]','$_POST[email_pengunjung]','$_POST[alamat]')");  
	echo "<script>window.location=('index.php?aksi=pengunjung')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputbooking'){
	// Memeriksa apakah input kosong
	if (empty($_POST[id_pengunjung]) || empty($_POST[id_tiket])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('index.php?aksi=booking')</script>";
		exit();
	}	
	mysqli_query($koneksi,"insert into booking (id_pengunjung,kode_booking,id_tiket,dewas,anak) 
	values ('$_POST[id_pengunjung]','$_POST[kode_booking]','$_POST[id_tiket]','$_POST[dewasa]','$_POST[anak]')");  
	echo "<script>window.location=('index.php?aksi=booking')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputmenu'){
	mysqli_query($koneksi,"insert into menu (nama_menu,link,link_b,status,icon_menu,aktif) values ('$_POST[nama_menu]','$_POST[link]','$_POST[link_b]','$_POST[status]','$_POST[icon_menu]','$_POST[aktif]')");  
echo "<script>window.location=('index.php?aksi=menu')</script>";
}
elseif($_GET['aksi']=='inputsubmenu'){
	mysqli_query($koneksi,"insert into submenu (id_menu,nama_sub,link_sub,icon_sub) values ('$_POST[id_menu]','$_POST[nama_sub]','$_POST[link_sub]','$_POST[icon_sub]')");  
echo "<script>window.location=('index.php?aksi=submenu')</script>";
}
elseif($_GET['aksi']=='inputgolongan'){
	mysqli_query($koneksi,"insert into golongan (nama_gol) values ('$_POST[nama_gol]')");  
echo "<script>window.location=('index.php?aksi=golongan')</script>";
}
elseif($_GET['aksi']=='inputjabatan'){
	mysqli_query($koneksi,"insert into jabatan (nama_jabatan) values ('$_POST[nama_jabatan]')");  
echo "<script>window.location=('index.php?aksi=jabatan')</script>";
}
elseif($_GET['aksi']=='inputprofesi'){
	mysqli_query($koneksi,"insert into profesi (nama_profesi) values ('$_POST[nama_profesi]')");  
echo "<script>window.location=('index.php?aksi=profesi')</script>";
}
elseif($_GET['aksi']=='inputadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','')");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		echo "<script>alert('Gagal ');</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','$file_gambar')");
		echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}
}
if($_GET['aksi']=='inputpegawai'){
	$kalimat = $_POST['nip'];
    $sub_kalimat = substr($kalimat,0,8);
	$username = $sub_kalimat;
    $password = md5($sub_kalimat);	
mysqli_query($koneksi,"insert into pegawai (nama_pegawai,nip,tgl_lahir,status,tingkat,jenis_kelamin,jurusan,gol,username,password,status_pg,status_kk) 
values ('$_POST[nama_pegawai]','$_POST[nip]','$_POST[tgl_lahir]','$_POST[status]','$_POST[tingkat]','$_POST[jenis_kelamin]','$_POST[jurusan]','$_POST[gol]','$username','$password','baru','baru')");  
echo "<script>window.location=('index.php?aksi=pegawai')</script>";
}
elseif($_GET['aksi']=='inputkeluarga'){
	mysqli_query($koneksi,"insert into keluarga (id_pegawai,nama_keluarga,jk_keluarga,tempatlahir_keluarga,tgllahir_keluarga,status_keluarga,pekejaan_keluarga,pendidikan_keluarga,penghasilan_keluarga,ket_keluarga,tunjang_status,tgl_mati,status_nikah,status_beasiswa,anak_angkat_status,status_sekolah,status_aktif) 
	values ('$_POST[id_pegawai]','$_POST[nama_keluarga]','$_POST[jk_keluarga]','$_POST[tempatlahir_keluarga]','$_POST[tgllahir_keluarga]','$_POST[status_keluarga]','$_POST[pekejaan_keluarga]','$_POST[pendidikan_keluarga]','$_POST[penghasilan_keluarga]','$_POST[ket_keluarga]','$_POST[tunjang_status]','$_POST[tgl_mati]','$_POST[status_nikah]','$_POST[status_beasiswa]','$_POST[anak_angkat_status]','$_POST[status_sekolah]','$_POST[status_aktif]')");  
	mysqli_query($koneksi,"UPDATE pegawai SET status_pg='ada' WHERE id_pegawai='$_POST[id_pegawai]'");
	echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$_POST[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='inputtunjangan'){
	mysqli_query($koneksi,"insert into tunjangan (id_pegawai,t_status) 
	values ('$_GET[id_pegawai]','baru')");
	mysqli_query($koneksi,"UPDATE pegawai SET status_pg='kk ada' WHERE id_pegawai='$_GET[id_pegawai]'"); 
echo "<script>window.location=('index.php?aksi=tunjangan')</script>";
}
elseif($_GET['aksi']=='inputpangku'){
	mysqli_query($koneksi,"insert into pemangku (nama_pkjab) 
	values ('$_POST[nama_pkjab]')");
echo "<script>window.location=('index.php?aksi=pangku')</script>";
}
elseif($_GET['aksi']=='inputpangkujabatan'){
	mysqli_query($koneksi,"insert into pemangkujabatan (id_pegawai,id_pkjab,nomor_surat,tanggal_surat) 
	values ('$_POST[id_pegawai]','$_POST[id_pkjab]','$_POST[nomor_surat]','$_POST[tanggal_surat]')");
echo "<script>window.location=('index.php?aksi=pangkujabatan')</script>";
}
?>