<?php
include "../koneksi.php";
include "../config/fungsi_indotgl.php";
$id_pegawai=$_GET['id_pegawai'];
$con=mysqli_query($koneksi,"SELECT * FROM pegawai,golongan,jabatan WHERE pegawai.gol=golongan.id_gol and pegawai.jabatan=jabatan.id_jabatan and  id_pegawai='$id_pegawai'");
$hasil=mysqli_fetch_array($con);
$con1=mysqli_query($koneksi,"SELECT * FROM tunjangan WHERE  t_status='baru' and id_pegawai='$id_pegawai'");
$tj=mysqli_fetch_array($con1);
$con2=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE  jabatan='1'");
$tr=mysqli_fetch_array($con2);
//menentukan hari
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $a_hari[date("N")];
//menentukan tanggal
$tanggal = date ("j");
//menentukan bulan
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $a_bulan[date("n")];
//menentukan tahun
$tahun = date("Y");
//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
</style>
</head>

<body onLoad="window.print()">
<p align="center">DAFTAR  ANAK-ANAK</p>
<div align="center">ANAK KANDUNG (ak) ANAK TIRI&nbsp; (at) dan ANAK ANGKAT (aa) yang masih menjadi  tanggungan</div>
<p align="center">belum  mempunyai penghasilan sendiri yang masuk daftar gaji</p>
<table border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="47"><p align="center" class="style2">No</p></td>
    <td width="170"><p align="center" class="style2">Nama</p></td>
    <td width="57"><p align="center" class="style2">Status Anak</p></td>
    <td width="97"><p align="center" class="style2">Tanggal lahir</p></td>
    <td width="64"><p align="center" class="style2">Belum/Pernah kawin</p></td>
    <td width="151"><p align="center" class="style2">Bersekolah/Kuliah pada</p></td>
    <td width="113"><p align="center" class="style2">Tidak mendapat Beasiswa/Darma siswa/Ikatan dinas</p></td>
    <td width="113"><p align="center" class="style2">Nama Ayah</p></td>
    <td width="104"><p align="center" class="style2">Nama Ibu</p></td>
    <td width="95"><p align="center" class="style2">Tanggal Meninggal/cerai Ayah/Ibu</p></td>
    <td width="142" valign="top"><p align="center" class="style2">Diangkat menurut 1.Putusan Pengadilan Negeri 2.Hukum adopsi bagi keturunan tionghoa</p>
      </td>
  </tr>
   <?php
    $id_pegawai=$_GET['id_pegawai'];
	$no=0;
    $result=mysqli_query($koneksi,"SELECT * FROM keluarga where status_aktif='anak' and tunjang_status='pengajuan' and id_pegawai='$id_pegawai'");
    while ($t=mysqli_fetch_array($result)){	
	$tgl = tgl_indo($t['tgllahir_keluarga']);
$no++; ?>
  <tr>
    <td width="47" valign="top"><p align="center"><?php echo"$no";?></p></td>
    <td width="170" valign="top"><p align="center"><?php echo"$t[nama_keluarga]";?></p></td>
    <td width="57" valign="top"><p align="center"><?php echo"$t[status_keluarga]";?></p>    </td>
    <td width="97" valign="top"><p align="center"><?php echo"$tgl";?></p></td>
    <td width="64" valign="top"><p align="center"><?php echo"$t[status_nikah]";?></p></td>
    <td width="151" valign="top"><p align="center"><?php echo"$t[pendidikan_keluarga]";?></p></td>
    <td width="113" valign="top"><p align="center"><?php echo"$t[status_beasiswa]";?></p></td>
		<?php   $result=mysqli_query($koneksi,"SELECT * FROM keluarga where status_aktif='istri' and id_pegawai='$id_pegawai'");
    while ($tk=mysqli_fetch_array($result)){?>
	<?php if($tk['status_keluarga']=='suami'){?>
    <td width="113" valign="top"><p align="center"><?php echo"$tk[nama_keluarga]";?></p></td>
	<?php } else { ?>
	 <td width="113" valign="top"><p align="center"><?php echo"$hasil[nama_pegawai]";?></p></td>
	<?php }} ?>
	<?php   $result=mysqli_query($koneksi,"SELECT * FROM keluarga where status_aktif='istri' and id_pegawai='$id_pegawai'");
    while ($tk=mysqli_fetch_array($result)){?>
	<?php if($tk['status_keluarga']=='istri'){?>
    <td width="104" valign="top"><p align="center"><?php echo"$tk[nama_keluarga]";?></p></td>
	<?php } else { ?>
	 <td width="104" valign="top"><p align="center"><?php echo"$hasil[nama_pegawai]";?></p></td>
	<?php }} ?>
    <td width="95" valign="top"><p align="center"><?php echo"$t[tgl_mati]";?></p></td>
    <td width="142" valign="top"><p align="center"><?php echo"$t[anak_angkat_status]";?></p></td>
  </tr>
  <?php
    }
  ?>
</table>
<br />
    <div align="center">ANAK KANDUNG (ak) ANAK TIRI&nbsp; (at) dan ANAK ANGKAT (aa) yang masih menjadi  tanggungan</div>


<p align="center">Tetapi  tidak &nbsp;masuk daftar gaji</p>
<table border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="47"><p align="center" class="style2">No</p></td>
    <td width="170"><p align="center" class="style2">Nama</p></td>
    <td width="104"><p align="center" class="style2">Status Anak</p></td>
    <td width="180"><p align="center" class="style2">Tanggal lahir</p></td>
    <td width="142"><p align="center" class="style2">Belum/ Pernah kawin</p></td>
    <td width="123"><p align="center" class="style2">Bersekolah/Kuliah pada</p></td>
    <td width="151"><p align="center" class="style2">Tidak mendapat Beasiswa/Darma siswa/Ikatan dina</p></td>
    <td width="122"><p align="center" class="style2">Bekerja atau tidak bekerja</p></td>
    <td width="115"><p align="center" class="style2">Keterangan</p></td>
  </tr>
     <?php
    $id_pegawai=$_GET['id_pegawai'];
	$no=0;
    $result=mysqli_query($koneksi,"SELECT * FROM keluarga where status_aktif='anak' and tunjang_status='tidak' and id_pegawai='$id_pegawai'");
    while ($t=mysqli_fetch_array($result)){	
$no++; ?>
  <tr>
    <td width="47" valign="top"><p align="center"><?php echo"$no";?></p></td>
    <td width="170" valign="top"><p align="center"><?php echo"$t[nama_keluarga]";?></p></td>
    <td width="104" valign="top"><p align="center"><?php echo"$t[status_keluarga]";?></p></td>
    <td width="180" valign="top"><p align="center"><?php echo"$tgl";?></p></td>
    <td width="142" valign="top"><p align="center"><?php echo"$t[status_nikah]";?></p></td>
    <td width="123" valign="top"><p align="center"><?php echo"$t[pendidikan_keluarga]";?></p></td>
    <td width="151" valign="top"><p align="center"><?php echo"$t[status_beasiswa]";?></p></td>
    <td width="122" valign="top"><p align="center"><?php echo"$t[status_sekolah]";?></p></td>
    <td width="115" valign="top"><p align="center"><?php echo"$t[ket_keluarga]";?></p></td>
  </tr>
    <?php
    }
  ?>
</table>
<ol>
<ul>
  <li>
    <div align="left">Supaya dilampirkan salinan surat keputusan Pengadilan Negeri yang telah  disyahkan</div>
  </li>
  <li>
    <div align="left">Hanya diisi jika anak dilahirkan dari isteri/suami yang telah meninggal  dunia atau diceraikan</div>
  </li>
</ul>
</body>
</html>
