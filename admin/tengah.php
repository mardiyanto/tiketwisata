<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
echo"
 <div class='row'>
                   <div class='col-lg-12'>
			<div class='panel panel-default'>
                            <div class='panel-heading'>
                           Sambutan
                            </div>
                            <div class='panel-body'>                         
				<p>Selamat Datang Di halaman Admin, Silahkan Pilih menu untuk pengaturan data yang di butuhkan guna mendapatkan hasil yang maksimal sesuai keinginan.</p>
                            </div>
			</div>
                   </div>
</div>";

echo"<div class='row'>
                    <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI</h3>
                </div>
                <div class='box-header'>
				</div>
     <div class='box-body'>";
     $main=mysqli_query($koneksi,"SELECT * FROM submenu");

     while($r=mysqli_fetch_array($main)){           
     echo"<a href='$r[link_sub]' class='btn btn-app'>
                    <span class='badge bg-yellow'>3</span>
                    <i class='fa $r[icon_sub] fa-5x'></i> $r[nama_sub]
                  </a>";
                }           
                echo "

            </div>
			</div>
 </div>
			</div>
";
}
elseif($_GET['aksi']=='ikon'){
include "../ikon.php";
}
elseif($_GET['aksi']=='tiket'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button> <a href='laporan.php?aksi=tiket' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Nama Tiket</th>
                                                <th>Dewasa</th>	 
                                                <th>Anak</th>	 
                                                 <th>AKSI</th>	
                                            </tr>
                                        </thead><tbody>
                        ";
                
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM tiket ORDER BY id_tiket ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[nama_tiket]</td>
                                                <td>$t[harga_tiket]</td> 
                                                <td>$t[harga_tiket1]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>AKSI</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=edittiket&id_tiket=$t[id_tiket]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapustiket&id_tiket=$t[id_tiket]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_tiket] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data</h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputtiket'>
                                        
                                                <label>nama_tiket</label>
                                                <input type='text' class='form-control' name='nama_tiket'/><br>
                                                <label>HARGA Tiket Dewasa</label>
                                                <input type='text' class='form-control' name='harga_tiket'/><br>
                                                <label>HARGA Tiket Anak</label>
                                                <input type='text' class='form-control' name='harga_tiket1'/><br>
                                                <label>Keterangan</label>
                                                <input type='text' class='form-control' name='keterangan'/><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    elseif($_GET['aksi']=='edittiket'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM tiket WHERE id_tiket=$_GET[id_tiket] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_tiket] $t[id_tiket]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=prosesedittiket&id_tiket=$t[id_tiket]'>
                                                <label>nama tiket</label>
                                                <input type='text' class='form-control' value='$t[nama_tiket]' name='nama_tiket'/><br>
                                                <label>harga Anak</label>
                                                <input type='text' class='form-control' value='$t[harga_tiket1]' name='harga_tiket1'/><br>
                                                <label>harga Dewasa</label>
                                                <input type='text' class='form-control' value='$t[harga_tiket]' name='harga_tiket'/><br>
                                                <label>Keterangan</label>
                                                <input type='text' class='form-control' value='$t[keterangan]' name='keterangan'/><br>
                                  
            
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
    }
    elseif($_GET['aksi']=='pembayaran'){
        echo"<div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>INFORMASI 
                                </div>
                                <div class='panel-body'>	
                    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                        Tambah Data
                                    </button> <a href='laporan.php?aksi=pembayaran' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                                       <div class='table-responsive'>		
             <table id='example1' class='table table-bordered table-striped'>
                                            <thead>
                                                <tr> <th>No</th>
                                                    <th>Metode Bayar</th>
                                                    <th>Nomor Bayar</th>	 
                                                    <th>Atas Nama</th>	 
                                                     <th>AKSI</th>	
                                                </tr>
                                            </thead><tbody>
                            ";
                    
        $no=0;
        $sql=mysqli_query($koneksi," SELECT * FROM pembayaran ORDER BY id_bayar ASC");
        while ($t=mysqli_fetch_array($sql)){	
        $no++;
                                            echo"
                                                <tr><td>$no</td>
                                                    <td>$t[metode_bayar]</td>
                                                    <td>$t[nomor_bayar]</td> 
                                                    <td>$t[atas_nama]</td> 
                                    <td><div class='btn-group'>
                              <button type='button' class='btn btn-info'>AKSI</button>
                              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='index.php?aksi=editpembayaran&id_bayar=$t[id_bayar]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                                <li><a href='hapus.php?aksi=hapuspembayaran&id_bayar=$t[id_bayar]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[metode_bayar] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                                </ul>
                            </div></td>
                                                </tr>";
        }
                                        echo"
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>";			
        
        ////////////////input admin			
        
        echo"			
        <div class='col-lg-12'>
                                <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                    <h4 class='modal-title' id='H3'>Input Data</h4>
                                                </div>
                                                <div class='modal-body'>
                                                   <form role='form' method='post' action='input.php?aksi=inputpembayaran'>
                                            
                                                    <label>Metode Pembayaran</label>
                                                    <input type='text' class='form-control' name='metode_bayar'/><br>
                                                    <label>Nomor Bayar</label>
                                                    <input type='text' class='form-control' name='nomor_bayar'/><br>
                                                    <label>Atas Nama</label>
                                                    <input type='text' class='form-control' name='atas_nama'/><br>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div>
                            </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>			
        "; 
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////
        
        elseif($_GET['aksi']=='editpembayaran'){
        $tebaru=mysqli_query($koneksi," SELECT * FROM pembayaran WHERE id_bayar=$_GET[id_bayar] ");
        $t=mysqli_fetch_array($tebaru);
        echo"
        <div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>EDIT  $t[metode_bayar] $t[id_bayar]
                                </div>
                                <div class='panel-body'>
        <form id='form1'  method='post' action='edit.php?aksi=proseseditpembayaran&id_bayar=$t[id_bayar]'>
                                                    <label>Metode Bayar</label>
                                                    <input type='text' class='form-control' value='$t[metode_bayar]' name='metode_bayar'/><br>
                                                    <label>Nomor Bayar</label>
                                                    <input type='text' class='form-control' value='$t[nomor_bayar]' name='nomor_bayar'/><br>
                                                    <label>Atas Nama</label>
                                                    <input type='text' class='form-control' value='$t[atas_nama]' name='atas_nama'/><br>
                                             
                
                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div> </div>
            </form></div> </div></div></div>
        ";
        }  
 elseif($_GET['aksi']=='pengunjung'){
        echo"<div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>INFORMASI 
                                </div>
                                <div class='panel-body'>	
                    <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                        Tambah Data
                                    </button> <a href='laporan.php?aksi=pengunjung' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                                       <div class='table-responsive'>		
             <table id='example1' class='table table-bordered table-striped'>
                                            <thead>
                                                <tr> <th>No</th>
                                                    <th>Nama Pengunjung</th>
                                                    <th>No HP</th>	 
                                                     <th>AKSI</th>	
                                                </tr>
                                            </thead><tbody>
                            ";
                    
        $no=0;
        $sql=mysqli_query($koneksi," SELECT * FROM pengunjung ORDER BY id_pengunjung ASC");
        while ($t=mysqli_fetch_array($sql)){	
        $no++;
                                            echo"
                                                <tr><td>$no</td>
                                                    <td>$t[nama_pengunjung]</td>
                                                    <td>$t[no_hp]</td> 
                                    <td><div class='btn-group'>
                              <button type='button' class='btn btn-info'>AKSI</button>
                              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='index.php?aksi=editpengunjung&id_pengunjung=$t[id_pengunjung]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                                <li><a href='hapus.php?aksi=hapuspengunjung&id_pengunjung=$t[id_pengunjung]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pengunjung] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                                </ul>
                            </div></td>
                                                </tr>";
        }
                                        echo"
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>";			
        
        ////////////////input admin			
        
        echo"			
        <div class='col-lg-12'>
                                <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                    <h4 class='modal-title' id='H3'>Input Data</h4>
                                                </div>
                                                <div class='modal-body'>
                                                   <form role='form' method='post' action='input.php?aksi=inputpengunjung'>
                                            
                                                    <label>nama pengunjung</label>
                                                    <input type='text' class='form-control' name='nama_pengunjung'/><br>
                                                    <label>no hp</label>
                                                    <input type='text' class='form-control' name='no_hp'/><br>
                                                    <label>Email</label>
                                                    <input type='email' class='form-control' name='email_pengunjung'/><br>
                                                    <label>Alamat</label>
                                                    <input type='text' class='form-control' name='alamat'/><br>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div>
                            </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>			
        "; 
 }
/////////////////////////////////////////////////////////////////////////////////////////////////
        
elseif($_GET['aksi']=='editpengunjung'){
        $tebaru=mysqli_query($koneksi," SELECT * FROM pengunjung WHERE id_pengunjung=$_GET[id_pengunjung] ");
        $t=mysqli_fetch_array($tebaru);
        echo"
        <div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>EDIT  $t[nama_pengunjung] $t[id_pengunjung]
                                </div>
                                <div class='panel-body'>
        <form id='form1'  method='post' action='edit.php?aksi=proseseditpengunjung&id_pengunjung=$t[id_pengunjung]'>
                                                    <label>nama pengunjung</label>
                                                    <input type='text' class='form-control' value='$t[nama_pengunjung]' name='nama_pengunjung'/><br>
                                                    <label>harga</label>
                                                    <input type='text' class='form-control' value='$t[no_hp]' name='no_hp'/><br>                                
                                                    <label>Email</label>
                                                    <input type='email' class='form-control' value='$t[email_pengunjung]' name='email_pengunjung'/><br>
                                                    <label>Alamat</label>
                                                    <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div> </div>
            </form></div> </div></div></div>
        ";
 }

 elseif($_GET['aksi']=='konfirmasi'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Kode Booking</th>
                                                <th>Metode Bayar</th>
                                                <th>status Bayar</th>	 
                                                 <th>AKSI</th>	
                                            </tr>
                                        </thead><tbody>
                        ";
                
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM konfirmasi,booking,pembayaran WHERE konfirmasi.id_booking=booking.id_booking and konfirmasi.id_bayar=pembayaran.id_bayar  ORDER BY konfirmasi.id_konfirmasi ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[kode_booking]</td>
                                                <td>$t[metode_bayar]</td> 
                                                <td>$t[status_bayar]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>AKSI</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editkonfirmasi&id_konfirmasi=$t[id_konfirmasi]' title='Edit'><i class='fa fa-pencil'></i>lihat</a></li>
                            <li><a href='hapus.php?aksi=hapuskonfirmasi&id_konfirmasi=$t[id_konfirmasi]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[kode_booking] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";			

}
/////////////////////////////////////////////////////////////////////////////////////////////////
    
elseif($_GET['aksi']=='editkonfirmasi'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM konfirmasi,booking,pembayaran WHERE konfirmasi.id_booking=booking.id_booking and konfirmasi.id_bayar=pembayaran.id_bayar  and konfirmasi.id_konfirmasi=$_GET[id_konfirmasi]");

    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[kode_booking] $t[id_konfirmasi]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditkonfirmasi&id_konfirmasi=$t[id_konfirmasi]'>
    <div class='modal-footer'>
    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>SETUJUI PEMBAYARAN </button>
</div>
                                                <label>kode booking</label>
                                                <input type='text' class='form-control' value='$t[kode_booking]' name='kode_booking' /><br>
                                                <label>metode bayar</label>
                                                <input type='text' class='form-control' value='$t[metode_bayar]' /><br>                                
                                                <label>tgl bayar</label>
                                                <input type='text' class='form-control' value='$t[tgl]' '/><br>
                                                <label>bukti</label>
                                                <img src='../foto/data/$t[bukti]' alt='Mastercard'><br>
         </div>
        </form></div> </div></div></div>
    ";
}
  /////////////////////////////////////////////////////////////////////////////////////////////////
  elseif($_GET['aksi']=='booking'){
    function generateBookingCode($length = 7) {
    $characters = '0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $code .= $characters[$index];
    }
    return $code;
    }
    // Contoh penggunaan
    $bookingCode = generateBookingCode();

    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button> <a href='laporan.php?aksi=booking' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Nama Pengunjung</th>
                                                <th>Nama Tiket</th>	 
                                                <th>Status Bayar</th>	 
                                                <th>AKSI</th>	
                                            </tr>
                                        </thead><tbody>
                        ";
                
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM booking,pengunjung,tiket WHERE booking.id_pengunjung=pengunjung.id_pengunjung AND booking.id_tiket=tiket.id_tiket  ORDER BY booking.id_booking ASC");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[nama_pengunjung]</td>
                                                <td>$t[nama_tiket]</td> 
                                                <td>$t[status]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>AKSI</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                             <li><a href='index.php?aksi=detailbooking&id_booking=$t[id_booking]' title='Edit'><i class='fa fa-eye'></i>lihat</a></li>
                            <li><a href='index.php?aksi=editbooking&id_booking=$t[id_booking]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusbooking&id_booking=$t[id_booking]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[kode_booking] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data</h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputbooking'>
                                               <label>Kode Booking</label>
                                               <input type='text' class='form-control' value='$bookingCode'  disabled/>
                                               <input type='hidden' class='form-control' value='$bookingCode' name='kode_booking'>
                                               <div class='form-group'>
                                               <label>Pilih Tiket</label>
                                               <select class='form-control select2' style='width: 100%;' name=id_tiket>
                                               <option value='' selected>Pilih Tiket</option>"; 
                                                $sql=mysqli_query($koneksi,"SELECT * FROM tiket ORDER BY id_tiket");
                                                while ($c=mysqli_fetch_array($sql))
                                                {
                                                   echo "<option value=$c[id_tiket]>$c[nama_tiket]</option>";
                                                }
                                                   echo "
                                               </select><br><br>
                                               <label>Pilih Pengunjung</label>
                                               <select class='form-control select2' style='width: 100%;' name=id_pengunjung>
                                               <option value='' selected>Pilih Pengujung</option>"; 
                                                $sql=mysqli_query($koneksi,"SELECT * FROM pengunjung ORDER BY id_pengunjung");
                                                while ($c=mysqli_fetch_array($sql))
                                                {
                                                   echo "<option value=$c[id_pengunjung]>$c[nama_pengunjung]</option>";
                                                }
                                                   echo "
                                               </select><br><br>
                                                
                                               <label>Jumlah Anak-Anak</label>
											   <input type='text' class='form-control' name='anak' required/><br>
											   <label>Jumlah Dewasa</label>
											   <input type='text' class='form-control' name='dewasa' required/><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////
    
elseif($_GET['aksi']=='detailbooking'){
    $sql=mysqli_query($koneksi," SELECT * FROM booking,pengunjung,tiket WHERE booking.id_pengunjung=pengunjung.id_pengunjung AND booking.id_tiket=tiket.id_tiket AND booking.id_booking=$_GET[id_booking]");
    $t=mysqli_fetch_array($sql);
	$harga_format = number_format($t[harga_tiket], 0, ',', '.');
	$anak =$t[harga_tiket1]*$t[anak];
	$dewasa =$t[harga_tiket]*$t[dewasa];
	$jml =$t[anak]+$t[dewasa];
	$total=$anak+$dewasa;
	$anak_rp = number_format($anak, 0, ',', '.');
	$dewasa_rp = number_format($dewasa, 0, ',', '.');
	$total_rp = number_format($total, 0, ',', '.');	

// abil data QR Code
require_once '../qrcode/qrlib.php';
// Data yang akan dijadikan QR Code
$data = $t[kode_booking]; // Ganti dengan data yang diinginkan

// Nama berkas QR Code yang akan dihasilkan
$kode_booking = $t['kode_booking'];

// Nama berkas QR Code yang akan dihasilkan
$filename = $kode_booking . '.png';


// Path penyimpanan berkas QR Code
$filepath = '../qrcode/gambar/' . $filename;

// Ukuran dan level koreksi kesalahan QR Code
$size = 10;
$level = 'L';

// Generate QR Code
QRcode::png($data, $filepath, $level, $size);
echo"
<section class='invoice'>
<!-- title row -->
<div class='row'>
  <div class='col-xs-12'>
	<h2 class='page-header'>
	  <i class='fa fa-globe'></i> $k_k[alias] $k_k[nama]
	  <small class='pull-right'>Date: $date</small>
	</h2>
  </div><!-- /.col -->
</div>
<!-- info row -->
<div class='row invoice-info'>
  <div class='col-sm-4 invoice-col'>
	Pemesan
	<address>
	  <strong>$t[nama_pengunjung]</strong><br>
	  $t[alamat]<br>
	  Phone: $t[no_hp]<br>
	  Email: $t[email_pengunjung]
	</address>
  </div><!-- /.col -->
 

<!-- Table row -->
<div class='row'>
  <div class='col-xs-12 table-responsive'>
	<table class='table table-striped'>
	  <thead>
		<tr>
		  <th>Tiket</th>
		  <th>dewasa</th>
		  <th>Anak-Anak</th>
		  <th>Subtotal</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td>$t[nama_tiket]</td>
		  <td>$t[dewasa]</td>
		  <td>$t[anak]</td>
		  <td>$total_rp</td>
		</tr>
	  </tbody>
	</table>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class='row'>
  <!-- accepted payments column -->
  <div class='col-xs-6'>
	<p class='lead'>Metode Pembayaran:</p>
	<img src='../sys/bootstrap/dist/img/credit/bank.png' alt='Visa'>
	<img src='../sys/bootstrap/dist/img/credit/dana.png' alt='Mastercard'>
   
	<p class='text-muted well well-sm no-shadow' style='margin-top: 10px;'>
    <img src='$filepath' alt='QR Code'>
	 
	</p>";
    $tebaru=mysqli_query($koneksi," SELECT * FROM konfirmasi WHERE id_booking='$t[id_booking]'");
    $tx=mysqli_fetch_array($tebaru);
    if($tx[status_bayar]=='lunas'){
		echo"<a href='index.php?aksi=editkonfirmasi&id_konfirmasi=$tx[id_konfirmasi]' class='btn btn-primary'>SUDAH DI BAYAR </a>";
	} else {
		echo"<a href='' class='btn btn-primary'>Belum Di bayar</a>";
	} echo"
	<a href='index.php?aksi=booking' class='btn btn-primary'>Kembali</a>
  </div><!-- /.col -->
  <div class='col-xs-6'>
	<p class='lead'>STATUS BAYAR: $t[status]</p>
	<div class='table-responsive'>
	  <table class='table'>
		<tr>
		  <th style='width:50%'>total tiket anak:</th>
		  <td>Rp. $anak_rp </td>
		</tr>
		<tr>
		  <th>total tiket dewasa</th>
		  <td>Rp. $dewasa_rp</td>
		</tr>
		<tr>
		  <th>Jumlah Tiket</th>
		  <td>$jml</td>
		</tr>
		<tr>
		  <th>sub Total Bayar:</th>
		  <td>Rp. $total_rp</td>
		</tr>
	  </table>
	</div>
  </div><!-- /.col -->
</div><!-- /.row -->
</section>";
}
elseif($_GET['aksi']=='editbooking'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM booking WHERE id_booking=$_GET[id_booking] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_booking] $t[id_booking]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditbooking&id_booking=$t[id_booking]'>
                                                <label>nama booking</label>
                                                <input type='text' class='form-control' value='$t[nama_booking]' name='nama_booking'/><br>
                                                <label>harga</label>
                                                <input type='text' class='form-control' value='$t[no_hp]' name='no_hp'/><br>                                
                                                <label>Email</label>
                                                <input type='email' class='form-control' value='$t[email_booking]' name='email_booking'/><br>
                                                <label>Alamat</label>
                                                <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
/////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='profil'){
echo"			
	<div class='row'>
	 <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI PROFIL</h3>
                </div>
                <div class='box-header'>
				</div>
                             <div class='box-body'>
		<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
	 <thead> 
	 <tr>
                                            <th>No</th>
                                            <th>Profil</th>
                                        </tr>
                                    </thead>
				   <tbody> ";
				$no=0;   
				$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil ='1'");
while ($t=mysqli_fetch_array($tebaru)){
                $isi_berita = strip_tags($t['isi']); 
                $isi = substr($isi_berita,0,70); 
                $isi = substr($isi_berita,0,strrpos($isi," ")); 
$no++;    
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nama]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editprofil&id_p=$t[id_profil]'>edit</a></li>
						<li><a href='index.php?aksi=viewprofil&id_p=$t[id_profil]'>view</a></li>
                        </ul>
                    </div></td>
                                       </tr>                                      
                                    ";
}
                                echo"</tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>	
	";
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT PROFIL
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' enctype='multipart/form-data' action='master/profil.php?act=editpro&id_p=$_GET[id_p]'>
       <div class='form-grup'>
        <label>Nama Aplikasi</label>
        <input type='text' class='form-control' value='$t[nama_app]' name='nama_app'/><br>
        <label>Nama</label>
        <input type='text' class='form-control' value='$t[nama]' name='jd'/><br>
		<label>Alias</label>
        <input type='text' class='form-control' value='$t[alias]' name='alias'/><br>
		<label>Tahun</label>
        <input type='text' class='form-control' value='$t[tahun]' name='tahun'/><br>
		<label>Alamat</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
        <label>Gambar Begroud Aplikasi</label>
        <input type='file' class='smallInput'  name='gambar'/><br>
		<label>Isi</label>
        <textarea id='text-ckeditor' class='form-control' name='isi'>$t[isi]</textarea></br>
		<script>CKEDITOR.replace('text-ckeditor');</script>
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div> </div>
";
}



elseif($_GET['aksi']=='viewprofil'){

$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");

$t=mysqli_fetch_array($tebaru);

echo"<div class='row'>

                <div class='col-lg-12'>

                    <div class='panel panel-default'>

                        <div class='panel-heading'>$t[nama]

                        </div>

                        <div class='panel-body'>

		

<a href='javascript:history.go(-1)' class='btn btn-info'> Kembali</a></div>

";

echo"$t[isi] </div></div></div></div></div>";

}



elseif($_GET['aksi']=='admin'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data Admin
                            </button>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>User</th>		  
                                        </tr>
                                    </thead>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM user ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tbody>
                                        <tr>
                                            <td>$t[user_nama]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[user_username]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusadmin&user_id=$t[user_id]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>
                                    </tbody>";
}
                                echo"</table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input</h4>
                                        </div>
                                                  <div class='box-body'>
            <form action='input.php?aksi=inputadmin' method='post' enctype='multipart/form-data'>
              <div class='form-group'>
                <label>Nama</label>
                <input type='text' class='form-control' name='nama' required='required' placeholder='Masukkan Nama ..'>
              </div>
              <div class='form-group'>
                <label>Username</label>
                <input type='text' class='form-control' name='username' required='required' placeholder='Masukkan Username ..'>
              </div>
              <div class='form-group'>
                <label>Password</label>
                <input type='password' class='form-control' name='password' required='required' min='5' placeholder='Masukkan Password ..'>
              </div>
              <div class='form-group'>
                <label>Foto</label>
                <input type='file' name='foto'>
              </div>
              <div class='form-group'>
                <input type='submit' class='btn btn-sm btn-primary' value='Simpan'>
              </div>
            </form>
          </div>
									
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editadmin'){
$tebaru=mysqli_query($koneksi," SELECT * FROM user WHERE user_id=$_GET[user_id]");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[user_nama] $t[user_id]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditadmin&user_id=$t[user_id]'  enctype='multipart/form-data'>
    	<label>Nama Lengkap</label>
        <input type='text' class='form-control'  name='nama' value='$t[user_nama]'/>
	<label>User Name</label>
        <input type='text' class='form-control'  name='username' value='$t[user_username]'/>     
	<label>Password</label>
        <input type='text' class='form-control'  name='password'/> </br>
		 <label>Foto</label>
                  <input type='file' name='foto'></br>
	 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          <button type='submit' class='btn btn-primary'>Save </button>
    </form>  
</div> </div></div></div>
";
}



elseif($_GET['aksi']=='aset'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=aset' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr> <th>No</th>
                                            <th>Kategori</th>
                                            <th>Ruangan</th>
                                            <th>jumlah</th>	 
                                            <th>kondisi</th>	 
                                            <th>nama aset</th>	
                                             
                                        </tr>
                                    </thead><tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi," SELECT * FROM aset,kategori,ruang WHERE aset.id_kategori=kategori.id_kategori AND aset.id_ruang=ruang.id_ruang  ORDER BY aset.id_aset ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"
                                        <tr><td>$no</td>
                                            <td>$t[kategori]</td>
                                            <td>$t[nama_ruang]</td> 
                                            <td>$t[jumlah]</td> 
                                            <td>$t[kondisi]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nama_aset]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editaset&id_aset=$t[id_aset]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusaset&id_aset=$t[id_aset]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_aset] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                echo"
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data</h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputaset'>
                                            <div class='form-group'>
                                            <label>Pilih Kategori</label>
                                            <select class='form-control select2' style='width: 100%;' name=id_kategori>
                                            <option value='' selected>Pilih Kategori</option>"; 
                                             $sql=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY id_kategori");
                                             while ($c=mysqli_fetch_array($sql))
                                             {
                                                echo "<option value=$c[id_kategori]>$c[kategori]</option>";
                                             }
                                                echo "
                                            </select><br><br>
                                            <label>Pilih ruangan</label>
                                            <select class='form-control select2' style='width: 100%;' name=id_ruang>
                                            <option value='' selected>Pilih Ruangan</option>"; 
                                             $sql=mysqli_query($koneksi,"SELECT * FROM ruang ORDER BY id_ruang");
                                             while ($c=mysqli_fetch_array($sql))
                                             {
                                                echo "<option value=$c[id_ruang]>$c[nama_ruang]</option>";
                                             }
                                                echo "
                                            </select><br><br>
                                            <label>nama_aset</label>
						                    <input type='text' class='form-control' name='nama_aset'/><br>
					                        <label>spek</label>
						                    <input type='text' class='form-control' name='spek'/><br>
                                            <label>jumlah</label>
						                    <input type='text' class='form-control' name='jumlah'/><br>
                                            <label>Tanggal Beli</label>
						                    <input type='date' class='form-control' name='tgl_beli'/><br>
                                            <label>Kondisi</label>
						                    <input type='text' class='form-control' name='kondisi'/><br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editaset'){
$tebaru=mysqli_query($koneksi," SELECT * FROM aset,kategori,ruang WHERE aset.id_kategori=kategori.id_kategori AND aset.id_ruang=ruang.id_ruang AND aset.id_aset=$_GET[id_aset] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_aset] $t[id_aset]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditaset&id_aset=$t[id_aset]'>
<div class='form-group'>
                                            <label>Pilih Kategori</label>
                                            <select class='form-control select2' style='width: 100%;' name=id_kategori>
                                            <option value='$t[id_kategori]' selected>$t[kategori]</option>"; 
                                             $sql=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY id_kategori");
                                             while ($c=mysqli_fetch_array($sql))
                                             {
                                                echo "<option value=$c[id_kategori]>$c[kategori]</option>";
                                             }
                                                echo "
                                            </select><br><br>
                                            <label>Pilih ruangan</label>
                                            <select class='form-control select2' style='width: 100%;' name=id_ruang>
                                            <option value='$t[id_ruang]' selected>$t[nama_ruang]</option>"; 
                                             $sql=mysqli_query($koneksi,"SELECT * FROM ruang ORDER BY id_ruang");
                                             while ($c=mysqli_fetch_array($sql))
                                             {
                                                echo "<option value=$c[id_ruang]>$c[nama_ruang]</option>";
                                             }
                                                echo "
                                            </select><br><br>
                                            <label>nama_aset</label>
						                    <input type='text' class='form-control' value='$t[nama_aset]' name='nama_aset'/><br>
					                        <label>spek</label>
						                    <input type='text' class='form-control' value='$t[spek]' name='spek'/><br>
                                            <label>jumlah</label>
						                    <input type='text' class='form-control' value='$t[jumlah]' name='jumlah'/><br>
                                            <label>Tanggal Beli</label>
						                    <input type='date' class='form-control' value='$t[tgl_beli]' name='tgl_beli'/><br>
                                            <label>Kondisi</label>
						                    <input type='text' class='form-control' value='$t[kondisi]'  name='kondisi'/><br>
                              
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='menu'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama Menu</th>
                                            <th>Link</th>	
                                            <th>Status</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM menu ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                        <td>$t[nama_menu]</td>
                                        <td>$t[link]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[status]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editmenu&id_menu=$t[id_menu]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusmenu&id_menu=$t[id_menu]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_menu] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                  echo"  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>		
	
	  ";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputmenu'>
                                            <div class='form-group'>
                                            <label>Nama Menu</label>
						 <input type='text' class='form-control' name='nama_menu'/><br>
					<label>Link Menu</label>
						<input type='text' class='form-control' name='link'/><br>
                        <label>Link Dasbord</label>
						<input type='text' class='form-control' name='link_b'/><br>
						<label>Status Menu</label>
						<input type='text' class='form-control' name='status'/><br>
                        <label>Icon</label>
                        <input type='text' class='form-control' name='icon_menu'/><br>
                        <label>Status Aktif</label>
                        <select class='form-control select2' style='width: 100%;' name=aktif>
                        <option value='1' selected>Pilih</option> 
                        <option value='Y'>Y</option>
                        <option value='N'>N</option>
                    </select><br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editmenu'){
$tebaru=mysqli_query($koneksi," SELECT * FROM menu WHERE id_menu=$_GET[id_menu] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_menu] $t[id_menu]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditmenu&id_menu=$t[id_menu]'>
       <div class='form-grup'>
        <label>Nama Menu</label>
        <input type='text' class='form-control' value='$t[nama_menu]' name='nama_menu'/><br>
		<label>Link</label>
        <input type='text' class='form-control' value='$t[link]' name='link'/><br>
        <label>Link Dasbord</label>
		<input type='text' class='form-control' value='$t[link_b]' name='link_b'/><br>
		<label>Status</label>
        <input type='text' class='form-control' value='$t[status]' name='status'/><br>
        <label>Icon</label>
        <input type='text' class='form-control' value='$t[icon_menu]' name='icon_menu'/><br>
        <label>Status</label>
        <select class='form-control select2' style='width: 100%;' name=aktif>
		<option value='$t[aktif]' selected>$t[aktif]</option> 
		<option value='Y'>Y</option>
        <option value='N'>N</option>
	</select><br>
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='submenu'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama submenu</th>
                                                <th>Status</th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM submenu ");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_sub]</td>
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>$t[nama_sub]</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editsubmenu&id_sub=$t[id_sub]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapussubmenu&id_sub=$t[id_sub]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_sub] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                      echo"  </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>		
        
          ";			
    
    ////////////////input 		
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputsubmenu'>
                                                <div class='form-group'>
                            <label>Nama submenu</label>
                            <input type='text' class='form-control' name='nama_sub'/><br>
                            <label>Link</label>
                            <input type='text' class='form-control' name='link_sub'/><br>
                            <label>Pilih Menu</label>
            <select class='form-control select2' style='width: 100%;' name=id_menu>
            <option value='' selected>Pilih Menu Utama</option>"; 
            $sql=mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu");
            while ($c=mysqli_fetch_array($sql))
            {
                echo "<option value=$c[id_menu]>$c[nama_menu]</option>";
            }
        echo "
        </select><br>
                            <label>Icon submenu</label>
                            <input type='text' class='form-control' name='icon_sub'/><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
    
    
    
    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    elseif($_GET['aksi']=='editsubmenu'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM menu,submenu WHERE menu.id_menu=submenu.id_menu AND id_sub=$_GET[id_sub] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_submenu] $t[id_sub]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditsubmenu&id_sub=$t[id_sub]'>
           <div class='form-grup'>
            <label>Nama submenu</label>
            <input type='text' class='form-control' value='$t[nama_sub]' name='nama_sub'/><br>
            <label>Link</label>
            <input type='text' class='form-control' value='$t[link_sub]' name='link_sub'/><br>
                <label>Pilih Menu</label>
            <select class='form-control select2' style='width: 100%;' name=id_menu>
            <option value='$t[id_menu]' selected>$t[id_menu]</option>"; 
            $sql=mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu");
            while ($c=mysqli_fetch_array($sql))
            {
                echo "<option value=$c[id_menu]>$c[nama_menu]</option>";
            }
        echo "
        </select><br>
                            <label>Icon submenu</label>
                            <input type='text' class='form-control' value='$t[icon_sub]' name='icon_sub'/><br>
            
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
    }
elseif($_GET['aksi']=='golongan'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=golongan' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama golongan</th>
                                            <th>Jumlah</th>	
                                            <th>Status</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.gol) as jlh,golongan.id_gol,golongan.nama_gol FROM golongan LEFT JOIN pegawai ON pegawai.gol = golongan.id_gol GROUP BY golongan.id_gol ORDER BY id_gol ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_gol]</td>
                                            <td>$t[jlh]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>edit</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editgolongan&id_gol=$t[id_gol]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusgolongan&id_gol=$t[id_gol]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_gol] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                  echo"  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>		
	
	  ";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputgolongan'>
                                            <div class='form-group'>
                                            <label>Nama Golongan</label>
						 <input type='text' class='form-control' name='nama_gol'/><br>
					</br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editgolongan'){
$tebaru=mysqli_query($koneksi," SELECT * FROM golongan WHERE id_gol=$_GET[id_gol] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_gol]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditgolongan&id_gol=$t[id_gol]'>
       <div class='form-grup'>
        <label>Nama Golongan</label>
        <input type='text' class='form-control' value='$t[nama_gol]' name='nama_gol'/><br>
	
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='jabatan'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=jabatan' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama jabatan</th>
                                            <th>Jumlah</th>
                                            <th></th>			  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.jabatan) as jlh,jabatan.id_jabatan,jabatan.nama_jabatan FROM jabatan LEFT JOIN pegawai ON pegawai.jabatan = jabatan.id_jabatan GROUP BY jabatan.id_jabatan ORDER BY id_jabatan ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_jabatan]</td>
                                            <td>$t[jlh]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>edit</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editjabatan&id_jabatan=$t[id_jabatan]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusjabatan&id_jabatan=$t[id_jabatan]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_jabatan] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                  echo"  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>		
	
	  ";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputjabatan'>
                                            <div class='form-group'>
                                            <label>Nama jabatan</label>
						 <input type='text' class='form-control' name='nama_jabatan'/><br>
					</br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editjabatan'){
$tebaru=mysqli_query($koneksi," SELECT * FROM jabatan WHERE id_jabatan=$_GET[id_jabatan] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_jabatan]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditjabatan&id_jabatan=$t[id_jabatan]'>
       <div class='form-grup'>
        <label>Nama jabatan</label>
        <input type='text' class='form-control' value='$t[nama_jabatan]' name='nama_jabatan'/><br>
	
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='profesi'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=profesi' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama profesi</th>
                                            <th>Jumlah</th>	
                                            <th>Status</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.jurusan) as jlh,profesi.id_profesi,profesi.nama_profesi FROM profesi LEFT JOIN pegawai ON pegawai.jurusan = profesi.id_profesi GROUP BY profesi.id_profesi ORDER BY id_profesi ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_profesi]</td>
                                            <td>$t[jlh]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>edit</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editprofesi&id_profesi=$t[id_profesi]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusprofesi&id_profesi=$t[id_profesi]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_gol] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                  echo"  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>		
	
	  ";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputprofesi'>
                                            <div class='form-group'>
                                            <label>Nama profesi</label>
						 <input type='text' class='form-control' name='nama_profesi'/><br>
					</br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofesi'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profesi WHERE id_profesi=$_GET[id_profesi] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_profesi]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditprofesi&id_profesi=$t[id_profesi]'>
       <div class='form-grup'>
        <label>Nama profesi</label>
        <input type='text' class='form-control' value='$t[nama_profesi]' name='nama_profesi'/><br>
	
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='pegawai'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=pegawai' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama pegawai</th>
                                            <th>Umur</th>
                                            <th>NIP</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, nip, tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai");
while ($t=mysqli_fetch_array($sqli)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_pegawai] </td>
                                            <td>$t[umur]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nip]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
						<li><a href='hapus.php?aksi=hapuspegawai&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pegawai] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                  echo"  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>		
	
	  ";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputpegawai'>
                                            <div class='form-group'>
                                            <label>Nama pegawai</label>
						                    <input type='text' class='form-control' name='nama_pegawai'/><br>
						                    <label>NIP pegawai/Nik</label>
                                            <input type='text' class='form-control' name='nip'/><br>
                                            <label>Tanggal Lahir pegawai</label>
                                            <input type='date' class='form-control' name='tgl_lahir'/><br>
                                            <label>Status Pegawai</label>
                                            <select class='form-control select2' style='width: 100%;' name=status>
                                                <option value='' selected>--Pilih Status Pegawai</option>
                                                <option value='PNS'>PNS</option>
                                                <option value='P3K'>P3K</option>
                                                <option value='TKS'>TKS SK PUSKES</option>
                                                <option value='THLS'>THLS SK DINAS</option>
                                            </select><br><br>
											<label>Jenis Kelamin</label>
											<select class='form-control select2' style='width: 100%;' name=jenis_kelamin>
											<option value='' selected>--Pilih Jenis Kelamin--</option>
											<option value='Laki-Laki'>Laki-Laki</option>
											<option value='Perempuan'>Perempuan</option>
											</select><br></br>
											<label>Tingkat Pendidikan</label>
											<select class='form-control select2' style='width: 100%;' name=tingkat>
											<option value='' selected>--Pilih Tingkat Pendidikan--</option>"; 
											$sql=mysqli_query($koneksi,"SELECT * FROM pendidikan ORDER BY id_pen");
											while ($c=mysqli_fetch_array($sql))
											{
												echo "<option value=$c[id_pen]>$c[jenjang]</option>";
											}
										    echo "</select>
											<br><br>
											<label>Jurusan Pendidikan</label>
											<select class='form-control select2' style='width: 100%;' name=jurusan>
											<option value='' selected>--Pilih Jenis Jurusan--</option>"; 
											$sql=mysqli_query($koneksi,"SELECT * FROM profesi ORDER BY id_profesi");
											while ($c=mysqli_fetch_array($sql))
											{
												echo "<option value=$c[id_profesi]>$c[nama_profesi]</option>";
											}
										    echo "</select><br><br>
												  <label>Golongan PNS</label>
												   <select class='form-control select2' style='width: 100%;' name=gol>
													<option value='' selected>--Pilih Golongan Jika Pns--</option>"; 
													$sql=mysqli_query($koneksi,"SELECT * FROM golongan ORDER BY id_gol");
													while ($c=mysqli_fetch_array($sql))
													{
														echo "<option value=$c[id_gol]>$c[nama_gol]</option>";
													}
												echo "</select><br>
                                             </br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editpegawai'){
$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE id_pegawai=$_GET[id_pegawai] ");
$t=mysqli_fetch_array($tebaru);
echo"  <div class='row'>
 <form id='form1'  method='post' action='edit.php?aksi=proseseditpegawai&id_pegawai=$t[id_pegawai]'>       <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>Data Pribadi</a></li>
              <li><a href='#settings' data-toggle='tab'>Data Pendidikan </a></li>
			  <li><a href='#cpns' data-toggle='tab'>Data Jabatan</a></li>
			  
            </ul>
            <div class='tab-content'>
              <div class='active tab-pane' id='activity'>
                <!-- Post -->
			                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_pegawai]
                        </div>
                        <div class='panel-body'>
	<div class='col-md-3'>					
        <label>Nama pegawai</label>
        <input type='text' class='form-control' value='$t[nama_pegawai]' name='nama_pegawai'/><br>
	<label>Nip pegawai</label>
        <input type='text' class='form-control' value='$t[nip]' name='nip'/><br>
        <label>User Name</label>
     <input type='text' class='form-control'  name='username'/><br>
 <label>Password</label>
     <input type='text' class='form-control'  name='password'/><br>
	 </div>
	 	<div class='col-md-3'>					
        <label>Tempat Lahir pegawai</label>
        <input type='text' class='form-control' value='$t[tmp_lahir]' name='tmp_lahir'/><br>
	<label>Tanggal Lahir pegawai</label>
        <input type='date' class='form-control' value='$t[tgl_lahir]' name='tgl_lahir'/><br>
	 </div>
	 <div class='col-md-3'>					
        <label>Jenis Kelamin</label>
		<select class='form-control select2' style='width: 100%;' name=jenis_kelamin>
		<option value=$t[jenis_kelamin] selected>$t[jenis_kelamin]</option>
	<option value='Laki-Laki'>Laki-Laki</option>
	<option value='Perempuan'>Perempuan</option>
	</select><br>
	<label>Nomor HP</label>
        <input type='text' class='form-control' value='$t[no_hp]' name='no_hp'/><br>
	 </div>
	  <div class='col-md-3'>					
        <label>Agama</label>
			<select class='form-control select2' style='width: 100%;' name=agama>
		<option value=$t[agama] selected>$t[agama]</option>
	<option value='Islam'>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>
	</select>
        <br>
	<label>Alamat Lengkap</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
	 </div>
  
  </div> </div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class='tab-pane' id='settings'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form data
                                 </div>
                                
                                <div class='panel-body'>
									<div class='col-md-3'>					
        <label>Tingkat Pendidikan</label>
		<select class='form-control select2' style='width: 100%;' name=tingkat>
		<option value=$t[tingkat] selected>$t[tingkat]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pendidikan ORDER BY id_pen");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_pen]>$c[jenjang]</option>";
		}
	echo "</select>
        <br>
	<label>Jurusan Pendidikan</label>
		<select class='form-control select2' style='width: 100%;' name=jurusan>
		<option value=$t[jurusan] selected>$t[jurusan]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM profesi ORDER BY id_profesi");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_profesi]>$c[nama_profesi]</option>";
		}
	echo "</select>
        <br>
	 </div>
	 	<div class='col-md-3'>					
        <label>Tahun Lulus</label>
        <input type='text' class='form-control' value='$t[tahun_lulus]' name='tahun_lulus'/><br>
	  <label>Lulus CPNS Tahun</label>
        <input type='date' class='form-control' value='$t[cpns]' name='cpns'/><br>
	 </div>
	  	<div class='col-md-3'>					
        <label>Tahun Pengakatan PNS</label>
        <input type='date' class='form-control' value='$t[pns]' name='pns'/><br>
	  <label>Golongan PNS</label>
       <select class='form-control select2' style='width: 100%;' name=gol>
		<option value=$t[gol] selected>$t[gol]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM golongan ORDER BY id_gol");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_gol]>$c[nama_gol]</option>";
		}
	echo "</select><br>
	 </div>
			<div class='col-md-3'>					
        <label>TMT Golongan</label>
        <input type='date' class='form-control' value='$t[tmp]' name='tmp'/><br>
	  <label>Eselon</label>
        <input type='text' class='form-control' value='$t[eselon]' name='eselon'/><br>
	 </div>						</div>
								</div>
								</div> <!-- /.tab-pane -->

              <div class='tab-pane' id='cpns'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form data
                                 </div>
                                
                                <div class='panel-body'>

  	<div class='col-md-3'>					
        <label>Taggal Jabatan</label>
        <input type='date' class='form-control' value='$t[tmt_jabatan]' name='tmt_jabatan'/><br>
	  <label>Jabatan</label>
       <select class='form-control select2' style='width: 100%;' name=jabatan>
		<option value=$t[jabatan] selected>$t[jabatan]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM jabatan ORDER BY id_jabatan");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_jabatan]>$c[nama_jabatan]</option>";
		}
	echo "</select><br>
	 </div>
	
     <div class='col-md-3'>					
     <label>Masa Kerja </label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Tahun</div>
     <input type='text' class='form-control' value='$t[masa_kerja_thn]' name='masa_kerja_thn' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div><br>
     <label>Masa Kerja </label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Bulan</div>
     <input type='text' class='form-control' value='$t[masa_kerja_bln]' name='masa_kerja_bln' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div><br>
  </div>
	 	 <div class='col-md-3'>					
        <label>email</label>
        <input type='text' class='form-control' value='$t[email]' name='email'/><br>
	<label>Status</label>
	<select class='form-control select2' style='width: 100%;' name=status>
		<option value=$t[status] selected>$t[status]</option>
		<option value='PNS'>PNS</option>
		<option value='P3K'>P3K</option>
        <option value='TKS'>TKS SK PUSKES</option>
        <option value='THLS'>THLS DINAS</option>
     </select><br><br>
     <label>Mempunyai Pesiunan (janda)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
     <input type='text' class='form-control' value='$t[pesiunan_janda]' name='pesiunan_janda' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div>
     <br>
	 </div>
     <div class='col-md-3'>
     <label>Total Gaji PNS (Rp)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
                  <input type='text' class='form-control' value='$t[gaji_pns]' name='gaji_pns' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/> 
                </div>					
    <br>
     <label>Pekerjaan Lainya</label>
     <input type='text' class='form-control' value='$t[pekerjaan_lain]' name='pekerjaan_lain'/><br>
     <label>Penghasilan Lain (Rp)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
     <input type='text' class='form-control' value='$t[penghasilan_lain]' name='penghasilan_lain' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div>
     <br>

  </div>
</div></div></div> <!-- /.tab-pane -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
		   	<div class='modal-footer'>
                                            <a href='index.php?aksi=pegawai' class='btn btn-default'>Close</a>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </form>
        </div> 
";
}

elseif($_GET['aksi']=='uploadfile'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama pegawai</th>
                                <th>NIP</th>		  
                          </tr></thead>
        <tbody>
        ";

$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                                <td>$t[nama_pegawai]</td>
                <td><div class='btn-group'>
                <a class='btn btn-info' href='index.php?aksi=listuploadfile&id_pegawai=$t[id_pegawai]' title='Edit'>$t[nip]</a>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
            <li><a href='hapus.php?aksi=hapuspegawai&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pegawai] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div></td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		

";	
    }
elseif($_GET['aksi']=='listuploadfile'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>Berkas  $t[nama_pegawai]
            </div>
            <div class='panel-body'>
            <a class='btn btn-info' href='index.php?aksi=prosesupload&id_pegawai=$t[id_pegawai]' title='Edit'>Tambah File</a>	<br><br>
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Berkas</th>
                                <th>Download</th>		  
                          </tr></thead>
        <tbody>
        ";

$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM file WHERE  id_pegawai=$_GET[id_pegawai] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                                <td>$t[nama_file]</td>
                <td><a class='btn btn-info' href='upload/$t[file_name]' title='dowload'><i class='fa  fa-download'></i></a>
                <a class='btn btn-danger' href='hapus.php?aksi=hapusberkas&file_id=$t[file_id]&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_file] ?')\" title='Hapus'><i class='fa  fa-remove '></i></a></td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		

";	
}
elseif($_GET['aksi']=='prosesupload'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
            <div class='form-grup'>
            <form id='upload_form' action='upload.php' method='post' enctype='multipart/form-data'>
            <div class='col-md-12'>					
            <label>Nama pegawai</label>
            <input type='text' class='form-control' value='$t[nama_pegawai]' name='nama_pegawai'/>
                    <input type='hidden' class='form-control' value='$t[id_pegawai]'  name='id_pegawai'/><br>
            <label>Nama File</label>
            <input type='text' class='form-control' name='nama_file'/><br>
           <label>File</label>
          <input  name='upload' id='upload' type='file' class='form-control'/>
          <br>
        <div id='progress-bar'></div>
        <br>
     <div id='targetLayer' style='display:none;'></div><br>
         </div>
    
        
            
            <div class='modal-footer'>
                                                <a class='btn btn-default' data-dismiss='modal'>Close</a>
                                                <button 'btnSubmit' class='btn btn-primary' class='form-control'>Upload</button>
                                            </div> </div>
                                            </form>                 
                </div>
            </div>
        </div>
    </div>		

";	    
    }
elseif($_GET['aksi']=='tunjangan'){
        echo"<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI TUNJANGAN
                </div>
                <div class='panel-body'>	
                       <div class='table-responsive'>		
    <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Nama pegawai</th>
                                    <th>Tunjangan</th>
                                    <th>NIP</th>		  
                              </tr></thead>
            <tbody>
            ";
    
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai ");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                            echo"<tr>
                                <td>$no</td>
                                    <td>$t[nama_pegawai]</td>
                                    <td>"; if($t['status_pg']=='baru'){
                                           echo"<a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>Tambah keluarga</a>";
                                            }
                                          else if($t['status_pg']=='ada'){
                                            echo"<a class='btn btn-primary' href='input.php?aksi=inputtunjangan&id_pegawai=$t[id_pegawai]' >Ajukan Tunjangan</a>";
                                          } else { 
                                            echo"<a class='btn btn-primary' href='index.php?aksi=lihattunjangan' >Lihat Pengajuan</a>";
                                             }
                                       echo"
                                  </td>
                    <td><div class='btn-group'>
                    <a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>data keluarga</a>
              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                <span class='caret'></span>
                <span class='sr-only'>Toggle Dropdown</span>
              </button>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                <li><a href='hapus.php?aksi=hapuspegawai&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pegawai] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                </ul>
            </div></td>
                                </tr>";
    }
                          echo"  </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       </div>		
    
    ";	
 }
 elseif($_GET['aksi']=='listtunjangan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>Berkas  $t[nama_pegawai]
            </div>
            <div class='panel-body'>
            <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                               Data Istri/Suami
                            </button>  <button class='btn btn-info' data-toggle='modal' data-target='#uiModal1'>
                            Tambah Data Anak
                        </button>  <br><br>
          
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Keluarga</th>
                                <th>Status Keluarga</th>
                                <th></th>
                                <th></th>		  
                          </tr></thead>
        <tbody>
        ";
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE  id_pegawai=$_GET[id_pegawai] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                            <td>$t[nama_keluarga]</td>
                <td>$t[status_keluarga]</td>
                <td>"; if($t['tunjang_status']=='pengajuan'){
                    echo"<a class='btn btn-primary' href='edit.php?aksi=tidakajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin tidak mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\" >Di Ajukan</a>";
                     }
                   else if($t['tunjang_status']=='tidak'){
                     echo" <a class='btn btn-primary'href='edit.php?aksi=ajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\"  >Tidak Di Ajukan</a>";
                   } else { 
                     echo"<a class='btn btn-danger' href='edit.php?aksi=ajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\" >Anjukan Tunjangan</a>";
                      }
                echo"</td>
                <td><div class='btn-group'>
                <a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>Aksi</a>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>"; if($t['status_aktif']=='anak'){ echo"<li><a href='index.php?aksi=editkeluargaanak&id_keluarga=$t[id_keluarga]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>"; }
            else { echo"<li><a href='index.php?aksi=editkeluarga&id_keluarga=$t[id_keluarga]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>";  }
            echo" <li><a href='hapus.php?aksi=hapuskeluarga&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_keluarga] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div>
                </td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		

";
echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                         <form role='form' method='post' action='input.php?aksi=inputkeluarga'>
                                            <div class='form-group'>
                         <label>Nama Suami/Istri</label>
                         <input type='hidden' class='form-control' value='$_GET[id_pegawai]' name='id_pegawai'/> 
                         <input type='hidden' class='form-control' value='istri' name='status_aktif'/>                   
						 <input type='text' class='form-control' name='nama_keluarga'/><br>
                         <label>Jenis Kelamin</label>
	                    <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
		                <option value='' selected>Pilih Jenis Kelamin</option>
		                <option value=Laki-Laki>Laki-Laki</option>
                        <option value=Perempuan>Perempuan</option>
                        </select><br>
                        <label>Tempat Lahir</label>
                        <input type='text' class='form-control' name='tempatlahir_keluarga'/>
                       </br>
                       <label>Tgl Lahir</label>
                       <input type='date' class='form-control' name='tgllahir_keluarga'/>
                      </br>
                         <label>Status</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_keluarga>
		                <option value='' selected>Pilih Status Keluarga</option>
		                <option value=istri>Istri</option>
                        <option value=suami>suami</option>
                        </select><br>
                        <label>Pekerjaan</label>
	                    <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
		                <option value='' selected>Pilih Pekerjaan</option>
		                <option value=bekerja>bekerja</option>
                        <option value=tidakbekerja>tidak bekerja</option>
                        </select><br>
                        <label>Penghasilan (jika bekerja)</label>
						 <input type='text' class='form-control' name='penghasilan_keluarga'/>
					    </br>
                        <label>Keterangan Istri/Suami</label>
                        <input type='text' class='form-control' name='ket_keluarga'/>
                       </br>
                       <label>Status Tunjangan</label>
                       <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                       <option value='' selected>Pilih Tunjangan</option>
                       <option value=pengajuan>ajukan Tunjangan</option>
                       <option value=tidak>tidak di ajukan</option>
                       </select><br
  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 	
echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data Anak</h4>
                                        </div>
                                        <div class='modal-body'>
                         <form role='form' method='post' action='input.php?aksi=inputkeluarga'>
                                            <div class='form-group'>
                         <label>Nama Anak</label>
                         <input type='hidden' class='form-control' value='$_GET[id_pegawai]' name='id_pegawai'/>
                         <input type='hidden' class='form-control' value='anak' name='status_aktif'/>                    
						 <input type='text' class='form-control' name='nama_keluarga'/><br>
                         <label>Jenis Kelamin</label>
	                    <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
		                <option value='-' selected>Pilih Jenis Kelamin</option>
		                <option value=Laki-Laki>Laki-Laki</option>
                        <option value=Perempuan>Perempuan</option>
                        </select><br><br>
                        <label>Tempat Lahir</label>
                        <input type='text' class='form-control' name='tempatlahir_keluarga'/>
                       </br>
                       <label>Tgl Lahir</label>
                       <input type='date' class='form-control' name='tgllahir_keluarga'/>
                      </br>
                      <label>Tanggal Meninggal/cerai Ayah/Ibu</label>
                      <input type='date' class='form-control' name='tgl_mati'/>
                     </br>
                      <label>Status Perkawinan Anak</label>
                      <select class='form-control select2' style='width: 100%;' name=status_nikah>
                      <option value='-' selected>Pilih Perkawinan Anak</option>
                      <option value=pernah>pernah nikah</option>
                      <option value=belum>belum nikah</option>
                      </select><br><br>
                      <label>Status Beasiswa</label>
                      <select class='form-control select2' style='width: 100%;' name=status_beasiswa>
                      <option value='-' selected>Pilih Beasiswa</option>
                      <option value=TidakAdaBeasiswa>Tidak Ada Beasiswa</option>
                      <option value=Beasiswa/Darmasiswa>Beasiswa/Darma siswa</option>
                      <option value=Ikatandinas>Ikatan dinas</option>
                      </select><br><br>
                         <label>Status Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_keluarga>
		                <option value='-' selected>Pilih Status Anak</option>
		                <option value=anak>anak</option>
                        <option value=anakangkat>anak angkat</option>
                        <option value=anaktiri>anak tiri</option>
                        </select><br><br>

                        <label>Status Pendidikan Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_sekolah>
		                <option value='-' selected>Pilih Pendidikan Anak</option>		    
                        <option value=BelumSekolah>Belum Sekolah</option>
		                <option value=sekolah>sekolah</option>
                        <option value=kuliah>kuliah</option>
                        </select><br><br>
                        <label>Status Pekerjaan Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
		                <option value='-' selected>Pilih Pekerjaan</option>
		                <option value=bekerja>bekerja</option>
                        <option value=tidakbekerja>tidak bekerja</option>
                        </select><br>
                        <label>Status Tunjangan</label>
                        <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                        <option value='baru' selected>Pilih Tunjangan</option>
                        <option value=pengajuan>ajukan Tunjangan</option>
                        <option value=tidak>tidak di ajukan</option>
                        </select><br><br>
						  <label>Tempat Sekolah (jika masih sekolah)</label>
						 <input type='text' class='form-control' name='pendidikan_keluarga'/>
					    </br>
                        <label>Status Anak Angkat</label>
	                    <select class='form-control select2' style='width: 100%;' name=anak_angkat_status>
		                <option value='' selected>Pilih Status Anak Angkat</option>		    
                        <option value=negeri>Putusan Pengadilan Negeri</option>
		                <option value=tionghoa>Hukum adopsi bagi keturunan tionghoa</option>
                        </select><br><br>
                        <label>Keterangan Anak</label>
                        <input type='text' class='form-control' name='ket_keluarga'/>
                       </br>
  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 	
}
elseif($_GET['aksi']=='editkeluarga'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE id_keluarga=$_GET[id_keluarga] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_keluarga]
                            </div>
                            <div class='panel-body'>			
                             <form role='form' method='post' action='edit.php?aksi=proseseditkeluarga&id_keluarga=$t[id_keluarga]'>
                                                <div class='form-group'>
                             <label>Nama Keluarga</label>
                             <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>    
                             <input type='hidden' class='form-control' value='$t[status_aktif]' name='status_aktif'/>                
                             <input type='text' class='form-control' value='$t[nama_keluarga]' name='nama_keluarga'/><br>
                             <label>Jenis Kelamin</label>
                            <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
                            <option value='$t[jk_keluarga]' selected>$t[jk_keluarga]</option>
                            <option value=Laki-Laki>Laki-Laki</option>
                            <option value=Perempuan>Perempuan</option>
                            </select><br>
                            <label>Tempat Lahir</label>
                            <input type='text' class='form-control' value='$t[tempatlahir_keluarga]' name='tempatlahir_keluarga'/>
                           </br>
                           <label>Tgl Lahir</label>
                           <input type='date' class='form-control' value='$t[tgllahir_keluarga]' name='tgllahir_keluarga'/>
                          </br>
                             <label>Status</label>
                            <select class='form-control select2' style='width: 100%;' name=status_keluarga>
                            <option value='$t[status_keluarga]' selected>$t[status_keluarga]</option>
                            <option value=istri>Istri</option>
                            <option value=suami>suami</option>
                            <option value=anak>anak</option>
                            <option value=anak angkat>anak angkat</option>
                            </select><br>
                            <label>Status Tunjangan</label>
                            <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                            <option value='$t[tunjang_status]' selected>$t[tunjang_status]</option>
                            <option value=pengajuan>ajukan Tunjangan</option>
                            <option value=tidak>tidak di ajukan</option>
                            </select><br><br>
                            <label>Pekerjaan</label>
                            <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
                            <option value='$t[pekejaan_keluarga]' selected>$t[pekejaan_keluarga]</option>
                            <option value=bekerja>bekerja</option>
                            <option value=tidak bekerja>tidak bekerja</option>
        
                            </select><br>
                         
                            <label>Penghasilan (jika bekerja)</label>
                             <input type='text' class='form-control' value='$t[penghasilan_keluarga]' name='penghasilan_keluarga'/>
                            </br>
                            <label>Keterangan Istri/Suami</label>
                            <input type='text' class='form-control' value='$t[ket_keluarga]' name='ket_keluarga'/>
                           </br>
      
                                                <button type='button' class='btn btn-default' onclick=self.history.back()>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='editkeluargaanak'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE id_keluarga=$_GET[id_keluarga] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>ANAK $t[nama_keluarga]
                            </div>
                            <div class='panel-body'>			
                            <form role='form' method='post' action='edit.php?aksi=prosesedianak&id_keluarga=$t[id_keluarga]'>
                            <div class='form-group'>
         <label>Nama Anak</label>
         <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>
         <input type='hidden' class='form-control' value='anak' name='status_aktif'/>                    
         <input type='text' class='form-control' value='$t[nama_keluarga]' name='nama_keluarga'/><br>
         <label>Jenis Kelamin</label>
        <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
        <option value='$t[jk_keluarga]' selected>$t[jk_keluarga]</option>
        <option value=Laki-Laki>Laki-Laki</option>
        <option value=Perempuan>Perempuan</option>
        </select><br><br>
        <label>Tempat Lahir</label>
        <input type='text' class='form-control'  value='$t[tempatlahir_keluarga]' name='tempatlahir_keluarga'/>
       </br>
       <label>Tgl Lahir</label>
       <input type='date' class='form-control' value='$t[tgllahir_keluarga]' name='tgllahir_keluarga'/>
      </br>
      <label>Tanggal Meninggal/cerai Ayah/Ibu</label>
      <input type='date' class='form-control' value='$t[tgl_mati]' name='tgl_mati'/>
     </br>
      <label>Status Perkawinan Anak</label>
      <select class='form-control select2' style='width: 100%;' name=status_nikah>
      <option value='$t[status_nikah]' selected>$t[status_nikah]</option>
      <option value=pernah>pernah nikah</option>
      <option value=belum>belum nikah</option>
      </select><br><br>
      <label>Status Beasiswa</label>
      <select class='form-control select2' style='width: 100%;' name=status_beasiswa>
      <option value='$t[status_beasiswa]' selected>$t[status_beasiswa]</option>
      <option value=TidakAdaBeasiswa>Tidak Ada Beasiswa</option>
      <option value=Beasiswa/Darmasiswa>Beasiswa/Darma siswa</option>
      <option value=Ikatandinas>Ikatan dinas</option>
      </select><br><br>
         <label>Status Anak</label>
        <select class='form-control select2' style='width: 100%;' name=status_keluarga>
        <option value='$t[status_keluarga]' selected>$t[status_keluarga]</option>
        <option value=anak>anak</option>
        <option value=anakangkat>anak angkat</option>
        <option value=anaktiri>anak tiri</option>
        </select><br><br>

        <label>Status Pendidikan Anak</label>
        <select class='form-control select2' style='width: 100%;' name=status_sekolah>
        <option value='$t[status_sekolah]' selected>$t[status_sekolah]</option>		    
        <option value=BelumSekolah>Belum Sekolah</option>
        <option value=sekolah>sekolah</option>
        <option value=kuliah>kuliah</option>
        </select><br><br>
        <label>Status Pekerjaan Anak</label>
        <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
        <option value='$t[pekejaan_keluarga]' selected>$t[pekejaan_keluarga]</option>
        <option value=bekerja>bekerja</option>
        <option value=tidakbekerja>tidak bekerja</option>
        </select><br>
        <label>Status Tunjangan</label>
        <select class='form-control select2' style='width: 100%;' name=tunjang_status>
        <option value='$t[tunjang_status]' selected>$t[tunjang_status]</option>
        <option value=pengajuan>ajukan Tunjangan</option>
        <option value=tidak>tidak di ajukan</option>
        </select><br><br>
          <label>Tempat Sekolah (jika masih sekolah)</label>
         <input type='text' value='$t[pendidikan_keluarga]' class='form-control' name='pendidikan_keluarga'/>
        </br>
        <label>Status Anak Angkat</label>
        <select class='form-control select2' style='width: 100%;' name=anak_angkat_status>
        <option value='$t[anak_angkat_status]' selected>$t[anak_angkat_status]</option>		    
        <option value=negeri>Putusan Pengadilan Negeri</option>
        <option value=tionghoa>Hukum adopsi bagi keturunan tionghoa</option>
        </select><br><br>
        <label>Keterangan Anak</label>
        <input type='text' class='form-control' value='$t[ket_keluarga]' name='ket_keluarga'/>
       </br>

                            <button type='button' class='btn btn-default' onclick=self.history.back()>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
    </form>
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='postunjangan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>$t[nama_pegawai]
                            </div>
                            <div class='panel-body'>			
            <form role='form' method='post' action='input.php?aksi=inputtunjangan'>
                            <div class='form-group'>
         <label>Pekerjaan Sampingan</label>
         <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>                   
         <input type='text' class='form-control'  name='t_pekerjaan'/><br>
         <label>Penghasilan Sampingan Rp</label>                
         <input type='text' class='form-control'  name='t_penghasilan'/><br>
         <label>Mempunyai pensiunan janda Rp</label>
         <input type='text' class='form-control'  name='t_janda'/><br>
         <label>Gaji PNS Rp</label>
         <input type='text' class='form-control'  name='t_gaji'/><br>
         <button type='button' class='btn btn-default'' onclick=self.history.back()>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
          </form>
                             
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='lihattunjangan'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Status Tunjangan</th>
                                <th></th>
                                <th></th>		  
                          </tr></thead>
        <tbody>
        ";
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM tunjangan,pegawai WHERE tunjangan.id_pegawai=pegawai.id_pegawai");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                            <td>$t[nama_pegawai]</td>
                <td>$t[t_status]</td>
                <td><a class='btn btn-primary' href='cetaksk.php?id_pegawai=$t[id_pegawai]' target='_blank'>Cetak SK</a> 
                <a class='btn btn-primary' href='cetakskanak.php?id_pegawai=$t[id_pegawai]' target='_blank'>Cetak Daftar Anak</a></td>
                <td><a class='btn btn-danger' href='hapus.php?aksi=hapustunjangan&id_tunjangan=$t[id_tunjangan]&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus data ini ?')\" >Hapus</a> </td>
                            </tr>";
}
                      echo"  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>		
";
}
elseif($_GET['aksi']=='pangku'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button> <a href='laporan.php?aksi=pangku' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama Pemangku</th>
                                                <th>Jumlah</th>
                                                <th></th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $sqli = mysqli_query($koneksi,"SELECT * FROM pemangku");
    while ($t=mysqli_fetch_array($sqli)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_pkjab]</td>
                                                <td>$t[jml]</td>
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>AKSI</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editpangku&id_pkjab=$t[id_pkjab]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                            <li><a href='hapus.php?aksi=hapuspangku&id_pkjab=$t[id_pkjab]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pkjab] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                      echo"  </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>		
        
          ";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputpangku'>
                                                <div class='form-group'>
                                                <label>Nama Pemangku</label>
                                                <input type='text' class='form-control' name='nama_pkjab'/><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
elseif($_GET['aksi']=='editpangku'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pemangku WHERE  id_pkjab=$_GET[id_pkjab] ");
    $t=mysqli_fetch_array($tebaru);   
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
            <form role='form' method='post' action='edit.php?aksi=proseseditpangku&id_pkjab=$t[id_pkjab]'>
            <div class='form-group'>
            <label>Nama Pemangku</label>
            <input type='text' class='form-control' value='$t[nama_pkjab]' name='nama_pkjab'/><br>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary'>Save </button>
            </div>
         </form>
            </div>
        </div>
    </div>
   </div>		
";   
}    
elseif($_GET['aksi']=='pangkujabatan'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button> <br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama pegawai</th>
                                                <th>Nama Pemangku Jabatan</th>
                                                <th>NIP</th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $sqli = mysqli_query($koneksi,"SELECT * FROM pemangkujabatan,pemangku,pegawai WHERE pemangkujabatan.id_pegawai=pegawai.id_pegawai AND pemangkujabatan.id_pkjab=pemangku.id_pkjab");
    while ($t=mysqli_fetch_array($sqli)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_pegawai]</td>
                                                <td>$t[nama_pkjab]</td>
                                <td><div class='btn-group'>
                          <a href='laporan.php?aksi=pangkujabatan&id_pangku=$t[id_pangku]' target='_blank' class='btn btn-info'>$t[nip]</a>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editpangkujabatan&id_pangku=$t[id_pangku]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                            <li><a href='hapus.php?aksi=hapuspangkujabatan&id_pangku=$t[id_pangku]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pkjab] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                      echo"  </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>		
        
          ";			
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputpangkujabatan'>
                                                <div class='form-group'>
                                                <label>Nama Pemangku Jabatan</label>
                                                <select class='form-control select2' style='width: 100%;' name='id_pkjab'>
                                                <option value='' selected>--Pilih Nama Pemangku Jabatan--</option>
                                                "; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pemangku ORDER BY id_pkjab");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value='$c[id_pkjab]'>$c[nama_pkjab]</option>";
		}
	                                        echo "
                                            </select><br><br>
                                               
                                                <label>Nama Pegawai</label>
       <select class='form-control select2' style='width: 100%;' name='id_pegawai'>
       <option value='' selected>--Pilih Nama Pegawai--</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pegawai ORDER BY id_pegawai");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value='$c[id_pegawai]'>$c[nama_pegawai]</option>";
		}
	echo "</select><br><br>
                                                <label>Nomor Surat</label>
                                                <input type='text' class='form-control' name='nomor_surat'/><br>

                                                <label>Tanggal Surat</label>
                                                <input type='date' class='form-control' name='tanggal_surat'/><br>
                                                 </br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
elseif($_GET['aksi']=='editpangkujabatan'){
       $sqli = mysqli_query($koneksi,"SELECT * FROM pemangkujabatan,pemangku,pegawai WHERE pemangkujabatan.id_pegawai=pegawai.id_pegawai AND pemangkujabatan.id_pkjab=pemangku.id_pkjab AND id_pangku=$_GET[id_pangku] ");
        $t=mysqli_fetch_array($sqli);   
        echo"<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                </div>
                <div class='panel-body'>
                <form role='form' method='post' action='edit.php?aksi=proseseditpangkujabatan&id_pangku=$t[id_pangku]'>
                <div class='form-group'>
                <label>Nama Pemangku Jabatan</label>
                <select class='form-control select2' style='width: 100%;' name='id_pkjab'>
                <option value='$t[id_pkjab]' selected>$t[nama_pkjab]</option>
                "; 
$sql=mysqli_query($koneksi,"SELECT * FROM pemangku ORDER BY id_pkjab");
while ($c=mysqli_fetch_array($sql))
{
echo "<option value='$c[id_pkjab]'>$c[nama_pkjab]</option>";
}
            echo "
            </select><br><br>
               
                <label>Nama Pegawai</label>
<select class='form-control select2' style='width: 100%;' name='id_pegawai'>
<option value='$t[id_pegawai]' selected>$t[nama_pegawai]</option>"; 
$sql=mysqli_query($koneksi,"SELECT * FROM pegawai ORDER BY id_pegawai");
while ($c=mysqli_fetch_array($sql))
{
echo "<option value='$c[id_pegawai]'>$c[nama_pegawai]</option>";
}
echo "</select><br><br>
                <label>Nomor Surat</label>
                <input type='text' class='form-control' value='$t[nomor_surat]' name='nomor_surat'/><br>

                <label>Tanggal Surat</label>
                <input type='date' class='form-control' value='$t[tanggal_surat]' name='tanggal_surat'/><br>
                 </br>
                <a href='index.php?aksi=pangkujabatan' class='btn btn-default' >Close</a>
                <button type='submit' class='btn btn-primary'>Save </button>
            </div>
</form>
                </div>
            </div>
        </div>
       </div>		
    ";   
} 
elseif($_GET['aksi']=='kadis'){ 
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
            <form role='form' method='post' action='edit.php?aksi=proseseditprofil&id_profil=2'>
            <div class='form-group'>
            <label>Nama Kepala Dinas</label>
            <input type='text' class='form-control' value='$tt[nama]' name='nama'/><br>
			<label>Nip Kepala Dinas</label>
            <input type='text' class='form-control' value='$tt[alias]' name='alias'/><br>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary'>Save </button>
            </div>
         </form>
            </div>
        </div>
    </div>
   </div>		
";   
}  

?>