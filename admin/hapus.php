<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='hapuspendidikan'){
mysqli_query($koneksi,"DELETE FROM pendidikan  WHERE id_pen='$_GET[id_pen]'");
echo "<script>window.location=('index.php?aksi=pendidikan')</script>";
}

///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='hapusmenu'){
mysqli_query($koneksi,"DELETE FROM menu  WHERE id_menu='$_GET[id_menu]'");
echo "<script>window.location=('index.php?aksi=menu')</script>";
}
elseif($_GET['aksi']=='hapusruangan'){
  mysqli_query($koneksi,"DELETE FROM ruang  WHERE id_ruang='$_GET[id_ruang]'");
  echo "<script>window.location=('index.php?aksi=ruangan')</script>";
  }
elseif($_GET['aksi']=='hapussubmenu'){
  mysqli_query($koneksi,"DELETE FROM submenu  WHERE id_sub='$_GET[id_sub]'");
  echo "<script>window.location=('index.php?aksi=submenu')</script>";
  }
elseif($_GET['aksi']=='hapusgolongan'){
mysqli_query($koneksi,"DELETE FROM golongan  WHERE id_gol='$_GET[id_gol]'");
echo "<script>window.location=('index.php?aksi=golongan')</script>";
}
elseif($_GET['aksi']=='hapusjabatan'){
mysqli_query($koneksi,"DELETE FROM jabatan  WHERE id_jabatan='$_GET[id_jabatan]'");
echo "<script>window.location=('index.php?aksi=jabatan')</script>";
}
elseif($_GET['aksi']=='hapusadmin'){
$data = mysqli_query($koneksi, "select * from user where user_id='$_GET[user_id]'");
$d = mysqli_fetch_assoc($data);
$foto = $d['user_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from user where user_id='$_GET[user_id]'");
echo "<script>window.location=('index.php?aksi=admin')</script>";
}
elseif($_GET['aksi']=='hapuspegawai'){
  mysqli_query($koneksi,"DELETE FROM pegawai  WHERE id_pegawai='$_GET[id_pegawai]'");
  echo "<script>window.location=('index.php?aksi=pegawai')</script>";
  }
elseif($_GET['aksi']=='hapusberkas'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai]");
    $t=mysqli_fetch_array($tebaru);
    $data = mysqli_query($koneksi, "select * from file where file_id='$_GET[file_id]'");
    $d = mysqli_fetch_assoc($data);
    $file = $d['file_name'];
    unlink("upload/$file");
    mysqli_query($koneksi, "delete from file where file_id='$_GET[file_id]'");
    echo "<script>window.location=('index.php?aksi=listuploadfile&id_pegawai=$t[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='hapuskeluarga'){
  $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai]");
  $t=mysqli_fetch_array($tebaru);
  mysqli_query($koneksi,"DELETE FROM keluarga  WHERE id_keluarga='$_GET[id_keluarga]'");
  echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]')</script>";
  }
  elseif($_GET['aksi']=='hapustunjangan'){
    mysqli_query($koneksi,"DELETE FROM tunjangan  WHERE id_tunjangan='$_GET[id_tunjangan]'");
    mysqli_query($koneksi,"UPDATE pegawai SET status_pg='ada' WHERE id_pegawai='$_GET[id_pegawai]'"); 
    echo "<script>window.location=('index.php?aksi=tunjangan')</script>";
    } 
elseif($_GET['aksi']=='hapuspangku'){
      mysqli_query($koneksi,"DELETE FROM pemangku  WHERE 	id_pkjab='$_GET[id_pkjab]'");
      echo "<script>window.location=('index.php?aksi=pangku')</script>";
 }    
 

?>