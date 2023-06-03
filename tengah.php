 <? if($_GET[l]!='lihat'){
	 ?>	 

 <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                               <div class="owl-carousel owl-theme full-width">
				 <?   $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 6");
  while ($r=mysql_fetch_array($sql)){ include "diskon_stok.php";?>
                      <div class="item">
                        <div class="card text-white">
                          <img class="card-img" src="foto/foto_produk/<?=$r[gambar]?>" alt="Card image">
                          <div class="card-img-overlay d-flex">
                            <div class="mt-auto text-center w-100">
                              <h3><a href="index.php?l=lihat&aksi=detail&id_p=<?=$r[id_produk]?>"><?=$r[nama_produk]?></a></h3>
                              <h6 class="btn btn-primary mr-2"><?=$divharga?></h6>
                            </div>
                          </div>
                        </div>
                      </div> <?}?>

                    </div>
   
                  </div>
                </div>
              </div>
          <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                               <div class="owl-carousel owl-theme full-width">
				 <?   $sql=mysql_query("SELECT * FROM produk WHERE diskon !='0' ORDER BY id_produk  DESC LIMIT 6");
  while ($r=mysql_fetch_array($sql)){ include "diskon_stok.php";?>
                      <div class="item">
                        <div class="card text-white">
                          <img class="card-img" src="foto/foto_produk/<?=$r[gambar]?>" alt="Card image">
                          <div class="card-img-overlay d-flex">
                            <div class="mt-auto text-center w-100">
                              <h3><a href="index.php?l=lihat&aksi=detail&id_p=<?=$r[id_produk]?>"><?=$r[nama_produk]?></a></h3>
                              <h6 class="btn btn-primary mr-2"><?=$divharga?></h6>
                            </div>
                          </div>
                        </div>
                      </div> <?}?>

                    </div>
   
                  </div>
                </div>
              </div>
	<? }?> 
  <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Produk Kami</h4>
                                </div>
                              </div>
 <? 
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 19");
  while ($r=mysql_fetch_array($sql)){
    include "diskon_stok.php";
    echo "
	<div class='product-info'>
 <a href='index.php?l=lihat&aksi=detail&id_p=$r[id_produk]'>
<center><img src='foto/foto_produk/$r[gambar]'  title='Lihat $r[nama_produk]' /></center>
</a>
";
     if ($d!=0){echo"
            <div class='diskon'> $r[diskon]% </div>";
    }else{echo"";
    }
            echo"
          
		   <div class='nama_p_besar'>$r[nama_produk]</div>
         $divharga	   
 
</div>
					";
  }

 ?>



