
<?php
include "../../koneksi.php";
$act=$_GET['act'];

if($act=='editpro'){
if (empty($_POST[jd])){
 echo "<script>window.alert('Data yang Anda isikan belum lengkap');
        window.location=('javascript:history.go(-1)')</script>";
     }else{
 $lokasi_file=$_FILES[gambar][tmp_name];
 if(empty($lokasi_file)){ 
    mysqli_query($koneksi,"UPDATE profil SET nama_app='$_POST[nama_app]',alamat='$_POST[alamat]', nama='$_POST[jd]', alias='$_POST[alias]', tahun='$_POST[tahun]', isi='$_POST[isi]' WHERE id_profil='$_GET[id_p]'"); 
    echo "<script>window.location=('../index.php?aksi=profil')</script>";    
}else{         
 $tanggal=date("dmYhis");
 $file=$_FILES['gambar']['tmp_name'];
 $file_name=$_FILES['gambar']['name'];
 copy($file,"../../foto/".$tanggal.".jpg");
mysqli_query($koneksi,"UPDATE profil SET nama_app='$_POST[nama_app]',alamat='$_POST[alamat]', nama='$_POST[jd]', alias='$_POST[alias]', tahun='$_POST[tahun]', isi='$_POST[isi]',gambar='$tanggal.jpg' WHERE id_profil='$_GET[id_p]'"); 
echo "<script>window.location=('../index.php?aksi=profil')</script>";

    }
}
}

?>