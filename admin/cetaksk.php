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
$tgl = tgl_indo($hasil['tgl_lahir']);

//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style24 {color: #FF0000}
.style31 {font-weight: bold}
-->
</style>
<head>
<title>Cetak Data</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style5 {font-size: 34px}
.style6 {
	font-size: 21px;
	font-style: italic;
	font-weight: bold;
}
.style7 {font-size: 20px}
.style8 {font-size: 31px}
.style18 {font-size: 21px}
.style20 {font-size: 19px}
.style26 {
	font-size: 31px;
	color: #0000FF;
	font-weight: bold;
}
.style27 {font-size: 16px; color: #0000FF; }
.style28 {color: #0000FF; font-weight: bold; }
.style29 {font-weight: bold; font-size: 20px;}
.style30 {font-size: 21px; font-weight: bold; }
-->
</style>
</head>

<body onLoad="window.print()">
<p>&nbsp;</p>

<table width="980" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td width="6">&nbsp;</td>
    <td colspan="8"><div align="center">
      <p class="style20">SURAT KETERANGAN</p>
    </div></td>
  </tr>
     <tr>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center">
      <p class="style20">UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA</p>
    </div></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2"><table border="1" cellspacing="0" cellpadding="0" width="318">
      <tr>
        <td width="314" valign="top"><p>Tanggungan    anak yang telah melebihi umur 21 th dan masih sekolah/kuliah harap dapat    melampirkan surat keterangan sekolah/kuliah</p></td>
      </tr>
    </table></td>
  </tr>
 
  <tr>
    <td></td>
    <td colspan="8" class="style18">Saya yang bertanda tangan dibawah ini : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">1.Nama Lengkap </span></td>
    <td width="16"><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[nama_pegawai]";?></span></td>
    <td width="109">&nbsp;</td>
    <td width="228">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">2.NIP	</span></td>
    <td width="16"><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[nip]";?></span></td>
    <td width="109">&nbsp;</td>
    <td width="228">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">3.Tempat/tanggal lahir</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[tmp_lahir]";?>,<?php echo"$tgl";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">4.Jenis Kelamin </span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[jenis_kelamin]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span class="style18">5.Agama</span></td>
    <td><div align="center" class="style18">:</div></td>
    <td colspan="3"><span class="style18"><?php echo"$hasil[agama]";?></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18">6.Kebangsaan</td>
    <td class="style7">:</td>
    <td colspan="3" class="style7">Indonesia</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><span class="style18">7.Pangkat/Golongan</span></td>
    <td class="style7">:</td>
    <td colspan="3" class="style7"><?php echo"$hasil[nama_gol]";?></td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18">8.Jabatan struktural/fungsional</td>
    <td class="style7">:</td>
    <td colspan="3" class="style7"><?php echo"$hasil[nama_jabatan]";?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18">9.Pada Instansi, Dep/lemb</td>
    <td class="style7">:</td>
    <td colspan="3" class="style7">Dinas Kesehatan Kabupaten Pesawaran</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
     <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18">10.Masa kerja golongan	</td>
    <td class="style7">:</td>
    <td colspan="4" class="style7"> <?php echo"$hasil[masa_kerja_thn]";?> Tahun, masa kerja tambahan <?php echo"$hasil[masa_kerja_bln]";?>  bulan</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18">&nbsp;</td>
    <td class="style7">:</td>
    <td colspan="4" class="style7">Masa kerja seluruhnya <?php echo"$hasil[masa_kerja_thn]";?> tahun <?php echo"$hasil[masa_kerja_bln]";?> bulan</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7">11.Digaji menurut</td>
    <td class="style7">:</td>
    <td colspan="5" class="style7">PP No.15 Tahun 2019   dengan gaji pokok Rp.<?php echo"$hasil[gaji_pns]";?>.<span class="style18"></span><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18"></td>
    <td colspan="2" >&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18">Menerangkan dengan sesungguhnya bahwa saya :</td>
    <td colspan="2" >&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18">a.Disamping jabatan utama tersebut, bekerja pula sebagai</td>
    <td colspan="2">&nbsp;</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18">:<?php echo"$hasil[pekerjaan_lain]";?> </td>
    <td colspan="2">&nbsp;</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
    <td colspan="8" class="style18"><p>dengan mendapat  penghasilan sebesar Rp. <?php echo"$hasil[penghasilan_lain]";?> sebulan</p></td>
  </tr>
      <tr>
    <td>&nbsp;</td>
    <td colspan="8" class="style18">b.Mempunyai pensiunan/pensiunan janda  Rp. <?php echo"$hasil[pesiunan_janda]";?> sebulan</td>
  </tr>
        <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18">c.Kawin sah dengan </td>
    <td colspan="2">&nbsp;</td>
  </tr>
        <tr>
    <td>&nbsp;</td>
    <td colspan="8"><table border="1" cellspacing="0" cellpadding="0" >
  <tr>
  <td width="206" rowspan="2"><p align="center">Nama    Suami/istri<br />
      Tanggungan</p></td>
    <td colspan="2"><p align="center">Tanggal</p></td>
    <td width="129" rowspan="2"><p align="center">Pekerjaan</p></td>
    <td width="124" rowspan="2"><p align="center">Penghasilan<br />
      sebulan</p></td>
    <td width="144" rowspan="2"><p align="center">Ket</p></td>
  </tr>
  <tr>
  <td width="229" valign="top"><p align="center">Kelahiran</p></td>
    <td width="118" valign="top"><p align="center">Perkawinan</p></td>
  </tr>
  <?php
   if($hasil['jenis_kelamin']=='Perempuan'){
    $id_pegawai=$_GET['id_pegawai'];
    $result=mysqli_query($koneksi,"SELECT * FROM keluarga where status_keluarga='suami' and id_pegawai='$id_pegawai'");
    while ($t=mysqli_fetch_row($result)){
      $tgl_kl = tgl_indo($t[8]);
    echo "<tr><td width='206'><p align='center'><strong>$t[2]</strong></p></td>
    <td width='170'><p align='center'><strong>$t[9],$tgl_kl</strong> </p></td>
    <td width='177'><p align='center'><strong>$tgl_kl</strong> </p></td>
    <td width='129'><p align='center'><strong>$t[5]</strong> </p></td>
    <td width='124'><p align='center'><strong>$t[7]</strong> </p></td>
    <td width='144'><p align='center'><strong>$t[10]</strong> </p></td></tr>";
              }
    }
    else {
      $id_pegawai=$_GET['id_pegawai'];
    $result=mysqli_query($koneksi,"SELECT * FROM keluarga where status_keluarga='istri' and id_pegawai='$id_pegawai'");
    while ($t=mysqli_fetch_row($result)){
      $tgl_kl = tgl_indo($t[8]);
      echo "<tr><td width='206'><p align='center'><strong>$t[2]</strong></p></td>
      <td width='170'><p align='center'><strong>$t[9],$tgl_kl</strong> </p></td>
      <td width='177'><p align='center'><strong>$tgl_kl</strong> </p></td>
      <td width='129'><p align='center'><strong>$t[5]</strong> </p></td>
      <td width='124'><p align='center'><strong>$t[7]</strong> </p></td>
      <td width='144'><p align='center'><strong>$t[10]</strong> </p></td></tr>";
    }
  
  
    }
  ?>
<?php $query=mysqli_query($koneksi,"SELECT * FROM keluarga where status_aktif='anak' and id_pegawai='$id_pegawai'"); ?>
</table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18">d.Mempunyai anak-anak seperti dalam daftar sebelah ini yaitu :</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td width="11" >&nbsp;</td>
    <td colspan="7" class="style18">1.ANAK KANDUNG (ak), ANAK TIRI (at) dan ANAK ANGKAT (aa) yang masih menjadi tanggungan belum mempunyai pekerjaan sendiri dan masuk dalam daftar gaji</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
	<td >&nbsp;</td>
    <td colspan="7" class="style18">2.ANAK KANDUNG (ak), ANAK TIRI (at) dan ANAK ANGKAT (aa) yang masih menjadi tanggungan tetapi tidak masuk dalam daftar gaji</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="8" class="style18">e.Jumlah anak seluruhnya : <?php echo " ".mysqli_num_rows($query)." "; ?> orang ( yang masuk menjadi tanggungan termasuk yang tidak masuk dalam daftar gaji)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18"></td>
    <td colspan="2" >&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8" class="style18"><div align="justify">Keterangan ini saya buat dengan sesungguhnya dan apabila keterangan ini ternyata tidak benar (palsu), saya bersedia dituntut dimuka pengadilan berdasarkan Undang-undang yang berlaku dan semua uang tunjangan anak yang telah saya terima yang seharusnya bukan menjadi hak saya.</div></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td class="style18">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18">Mengetahui  :</td>
    <td class="style18">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2" class="style18"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style18">KEPALA DINAS KESEHATAN </td>
    <td colspan="2" class="style18">Bernung, <?php echo  $tanggal ." ". $bulan ." ". $tahun; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6"  class="style18" >KABUPATEN PESAWARAN</td>
    <td colspan="2" class="style7"><div align="left"><span class="style18">Yang menerangkan</span> ,</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td width="245" >&nbsp;</td>
    <td class="style7">&nbsp;</td>
    <td colspan="3" class="style7">&nbsp;</td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td class="style7">&nbsp;</td>
    <td colspan="3" class="style7">&nbsp;</td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td class="style7">&nbsp;</td>
    <td colspan="3" class="style7">&nbsp;</td>
    <td><span class="style18"></span></td>
    <td><span class="style18"></span></td>
  </tr>
  
    <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style7"><?php echo"$tt[nama]";?></td>
    <td class="style7">&nbsp;</td>
    <td colspan="3" class="style7">&nbsp;</td>
    <td colspan="2"><span class="style18"></span><span class="style18"><?php echo"$hasil[nama_pegawai]";?></span></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="style18"><?php echo"$tt[alias]";?> </td>
    <td class="style7">&nbsp;</td>
    <td colspan="3" class="style7">&nbsp;</td>
    <td colspan="2" class="style18"><?php echo"$hasil[nip]";?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="6" class="style7">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
