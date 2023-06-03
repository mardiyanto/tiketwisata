  <ul class="sidebar-menu">
  <li>
              <a href='index.php?aksi=home'>
                <i class='fa fa-dashboard'></i> <span>Dashboard</span> 
              </a> 
 </li>

 <?php               
              $main=mysqli_query($koneksi,"SELECT * FROM menu WHERE aktif='Y' AND status='admin'");

              while($r=mysqli_fetch_array($main)){
	             echo " <li class='treeview'>
               <a href='$r[link]'>
                 <i class='fa $r[icon_menu]'></i>
                 <span>$r[nama_menu]</span>
               </a>";
	             $sub=mysqli_query($koneksi,"SELECT * FROM submenu, menu  
                                 WHERE submenu.id_menu=menu.id_menu 
                                 AND submenu.id_menu=$r[id_menu]"); 
                         
               $jml=mysqli_num_rows($sub);
                // apabila sub menu ditemukan
                if ($jml > 0){
                  echo "<ul class='treeview-menu'>";
	                while($w=mysqli_fetch_array($sub)){
                    echo "<li><a href='$w[link_sub]'><i class='fa $w[icon_sub]'></i> $w[nama_sub]</a></li>";
	                }           
	                echo "</ul>
                        </li>";
                }
                else{
                  echo "</li>";
                }
              }        
            ?>
      <li>      
      <a href="logout.php">
                  <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
                </a>
              </li>
</ul>