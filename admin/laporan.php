 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan </title>
	 <link rel="stylesheet" href="../sys/bootstrap/bootstrap/css/bootstrap.min.css">
	 
 	<?php include '../koneksi.php'; ?>
 </head>
 <body>

 	<style type="text/css">
 		.table-tanggal tr th, .table-tanggal tr td{
 			padding: 5px;
 		}
 	</style>
<?php if($_GET['aksi']=='umr'){ ?>
<?php
$usia1 ="SELECT nip, nama_pegawai, tgl_lahir, jenis_kelamin, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur FROM pegawai";
$sql=mysqli_query($koneksi,"SELECT
 COUNT(IF(umur < 25,1,NULL)) AS '... - 25',
 COUNT(IF(umur BETWEEN 25 and 29,1,NULL)) AS '25 - 29',
 COUNT(IF(umur BETWEEN 30 and 35,1,NULL)) AS '30 - 35',
 COUNT(IF(umur >= 36,1,NULL)) AS '36 - ...'
FROM (select nip, nama_pegawai, tgl_lahir, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from pegawai) as dummy_table");
($t=mysqli_fetch_array($sql));	 ?>
						<?=$t['... - 25']?>

<?php
$usia ="SELECT nip, nama_pegawai, tgl_lahir, jenis_kelamin, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur FROM pegawai";
$rekapumur=mysqli_query($koneksi,"
SELECT
COUNT(IF(umur BETWEEN 18 and 20,1,NULL)) AS '18 - 20', 
COUNT(IF(umur BETWEEN 21 and 25,1,NULL)) AS '21 - 25',
COUNT(IF(umur BETWEEN 26 and 30,1,NULL)) AS '26 - 30',
COUNT(IF(umur BETWEEN 31 and 35,1,NULL)) AS '31 - 35',
COUNT(IF(umur BETWEEN 36 and 40,1,NULL)) AS '36 - 40',
COUNT(IF(umur BETWEEN 41 and 45,1,NULL)) AS '41 - 45',
COUNT(IF(umur BETWEEN 46 and 50,1,NULL)) AS '46 - 50',
COUNT(IF(umur BETWEEN 51 and 55,1,NULL)) AS '51 - 55',
COUNT(IF(umur BETWEEN 56 and 60,1,NULL)) AS '56 - 60',
COUNT(IF(umur BETWEEN 61 and 65,1,NULL)) AS '61 - 65',
COUNT(IF(jenis_kelamin = 'Laki-Laki', jenis_kelamin,NULL)) AS 'Laki-Laki',
COUNT(IF(jenis_kelamin = 'Perempuan', jenis_kelamin,NULL)) AS 'Perempuan'
FROM (select nip, nama_pegawai, tgl_lahir, jenis_kelamin, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from pegawai) as dummy_table");
($dataumur=mysqli_fetch_array($rekapumur));
?>
<table class="table table-bordered table-striped" id="table-datatable">	
<tr align="center">
<td>18 - 20</td>
<td><?=$dataumur['18 - 20']?></td>
<td><?=$dataumur['Laki-Laki']?></td>
<td></td>
</tr>
<tr align="center">
<td>21 - 25</td>
<td><?=$dataumur['21 - 25']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>26 - 30</td>
<td><?=$dataumur['26 - 30']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>31 - 35</td>
<td><?=$dataumur['31 - 35']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>36 - 40</td>
<td><?=$dataumur['36 - 40']?></td>
<td><?=$dataumur['Laki-Laki']?></td>
<td><?=$dataumur['Perempuan']?></td>
</tr>
<tr align="center">
<td>41 - 45</td>
<td><?=$dataumur['41 - 45']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>46 - 50</td>
<td><?=$dataumur['46 - 50']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>51 - 55</td>
<td><?=$dataumur['51 - 55']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>56 - 60</td>
<td><?=$dataumur['56 - 60']?></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td>61 - 65</td>
<td><?=$dataumur['61 - 65']?></td>
<td></td>
<td></td>
</tr>                         </table>
<?php } ?>

<?php if($_GET['aksi']=='jabatan'){ ?>
	<div class='row'>
	<div class='col-lg-12'>	<center>
<h4>LAPORAN </h4>
</center>	
<table class="table table-bordered table-striped" id="table-datatable">		
						<thead>
							<tr>
							<th>No</th>
								<th>Nama jabatan</th>
								<th>Jumlah</th>			  
						  </tr></thead>
		<tbody>
<?php
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.jabatan) as jlh,jabatan.id_jabatan,jabatan.nama_jabatan FROM jabatan LEFT JOIN pegawai ON pegawai.jabatan = jabatan.id_jabatan GROUP BY jabatan.id_jabatan ORDER BY id_jabatan ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
						echo"<tr>
							<td>$no</td>
								<td>$t[nama_jabatan]</td>
								<td>$t[jlh]</td>
				
							</tr>";
} ?>
		 </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
   </div>				
<?php } ?>	 

<?php if($_GET['aksi']=='golongan'){ ?>
	<div class='row'>
                <div class='col-lg-12'>	<center>
 		<h4>LAPORAN </h4>
 	</center>	
	 <table class="table table-bordered table-striped" id="table-datatable">
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama golongan</th>
                                            <th>Jumlah</th>		  
                                      </tr></thead>
                    <tbody>
<?php			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.gol) as jlh,golongan.id_gol,golongan.nama_gol FROM golongan LEFT JOIN pegawai ON pegawai.gol = golongan.id_gol GROUP BY golongan.id_gol ORDER BY id_gol ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_gol]</td>
                                            <td>$t[jlh]</td>
						
                                        </tr>";
} ?>
        </tbody>
                                </table>
								</div>
               </div>	
<?php }?>	 

<?php if($_GET['aksi']=='aset'){ ?>
	<div class='row'>
                <div class='col-lg-12'>	<center>
 		<h4>LAPORAN </h4>
 	</center>	
	 <table class="table table-bordered table-striped" id="table-datatable">
                                    <thead>
                                        <tr> <th>No</th>
                                            <th>Nama Aset</th>
                                            <th>Kategori</th>
                                            <th>Ruangan</th>
											<th>Spesifikasi</th>											
											<th>Jumlah</th>
											<th>Kondisi</th>
											<th>Tgl Beli</th>											
                                        </tr>
                                    </thead><tbody>
			
	<?php		
$no=0;
$sql=mysqli_query($koneksi," SELECT * FROM aset,kategori,ruang WHERE aset.id_kategori=kategori.id_kategori AND aset.id_ruang=ruang.id_ruang  ORDER BY aset.id_aset ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"
                                        <tr><td>$no</td>
                                            <td>$t[nama_aset]</td>
                                            <td>$t[kategori]</td>
											<td>$t[nama_ruang]</td>
											<td>$t[spek]</td>
											<td>$t[jumlah]</td>
											<td>$t[kondisi]</td>
											<td>$t[tgl_beli]</td>
                                        </tr>";
}?>
                                    </tbody></table>
									</div>
               </div>								
<?php } ?>
<?php if($_GET['aksi']=='pegawai'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai");
while ($d=mysqli_fetch_array($sqli)){	
$um=58-$d['umur'];
$no++;
 					?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>

<?php if($_GET['aksi']=='pegawaipns'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai  WHERE status='$_GET[status]'");
while ($d=mysqli_fetch_array($sqli)){	
$um=58-$d['umur'];
$no++;
 					?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>
<?php if($_GET['aksi']=='pegawaijk'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai  WHERE jenis_kelamin='$_GET[jenis_kelamin]'");
while ($d=mysqli_fetch_array($sqli)){	
$um=58-$d['umur'];
$no++;
 					?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>
<?php if($_GET['aksi']=='pegawaipensiun'){ ?>
	<div class='row'>
                <div class='col-lg-12'> 	<center>
 		<h4>LAPORAN </h4>
 	</center>
 		<br>
 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 					<th >NO</th>
 					<th class="text-center">Nama</th>
					<th class="text-center">Nip</th>
 					<th class="text-center">Status Pegawai</th>
					 <th class="text-center">HP</th>
 					<th class="text-center">Umur</th>
 					<th class="text-center">Status Pesiun</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 			$no=0;
			 $sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, no_hp, nip, tgl_lahir,status, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS Umur FROM pegawai WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) >= 56;");
				while ($d=mysqli_fetch_array($sqli)){	
					$um=58-$d['Umur'];
				$no++;?>
 					<tr>
 						<td class="text-center"><?php echo $no ; ?></td>
 						<td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
						<td class="text-center"><?php echo $d['nip']; ?></td>
 						<td class="text-center"><?php echo $d['status']; ?></td>
						 <td class="text-center"><?php echo $d['no_hp']; ?></td>
 						<td class="text-center"><?php echo $d['Umur']; ?></td>
 						<td class="text-center">Sisa <?php echo $um; ?> Tahun</td>
 					</tr>
 					<?php 
 				}
 				?>
 			</tbody>
 		</table>
		 </div>
               </div>	
<?php     } ?>

<?php if($_GET['aksi']=='pangkujabatan'){ ?>
<?php	$sqli = mysqli_query($koneksi,"SELECT * FROM pemangkujabatan,pemangku,pegawai WHERE pemangkujabatan.id_pegawai=pegawai.id_pegawai AND pemangkujabatan.id_pkjab=pemangku.id_pkjab AND id_pangku=$_GET[id_pangku] ");
        $t=mysqli_fetch_array($sqli); 	?>
	<center>
 		<h4>Laporan Pemangku Jabatan <?=$t[nama_pkjab]?> <?=$k_k[nama]?></h4>
 	</center>
 		<br>

	<table class="table table-bordered table-striped" id="table-datatable">
  <tr>
    <td><p >Nama</p></td>
    <td><?=$t[nama_pegawai]?></td>
  </tr>
  <tr>
    <td><p >Alamat</p></td>
    <td><?=$t[alamat]?></td>
  </tr>
  <tr>
    <td><p >No Telepon</p></td>
    <td><?=$t[no_hp]?></td>
  </tr>
  <tr>
    <td><p >Email</p></td>
    <td><?=$t[email]?></td>
  </tr>
  <tr>
    <td colspan="2"><p >Surat Keputusan Bupati Pesawaran</p></td>
  </tr>
  <tr>
    <td><p >Nomor</p></td>
    <td><?=$t[nomor_surat]?></td>
  </tr>
  <tr>
    <td><p >Tanggal</p></td>
    <td><?=$t[tanggal_surat]?></td>
  </tr>
</table>
<?php     } ?>
 	<script>
 		window.print();
 		$(document).ready(function(){

 		});
 	</script>

 </body>
 </html>
