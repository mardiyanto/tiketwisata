<?php 
$tanggal=date("Y");
include "koneksi.php";
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="tema/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title><?php echo"$k_k[nama]";?></title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="tema/css/linearicons.css">
			<link rel="stylesheet" href="tema/css/font-awesome.min.css">
			<link rel="stylesheet" href="tema/css/bootstrap.css">
			<link rel="stylesheet" href="tema/css/magnific-popup.css">
			<link rel="stylesheet" href="tema/css/animate.min.css">
			<link rel="stylesheet" href="tema/css/owl.carousel.css">
			<link rel="stylesheet" href="tema/css/main.css">
		</head>
		<body>
			<!-- start banner Area -->
			<section class="banner-area" id="home">
				<!-- Start Header Area -->
				<header class="default-header">
					<nav class="navbar navbar-expand-lg  navbar-light">
						<div class="container">
							  <a class="navbar-brand" href="index.php">
							  	<img src="tema/img/logo.png" alt="">
							  </a>
							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="text-white lnr lnr-menu"></span>
							  </button>

							  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
							    <ul class="navbar-nav">
									<li><a href="#home">Home</a></li>
									<li><a href="#about">Tentang</a></li>									
									<li><a href="#secvice">Fasilitas</a></li>
									<li><a href="#gallery">Gallery</a></li>
									<li><a href="#faq">Faq</a></li>
									<li><a href="#contact">Contact</a></li>
							    </ul>
							  </div>						
						</div>
					</nav>
				</header>
				<!-- End Header Area -->				
			</section>

			<section class="default-banner active-blog-slider">
					<div class="item-slider relative" style="background: url(tema/img/slider1.jpg);background-size: cover;">
						<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
						<div class="container">
							<div class="row fullscreen justify-content-center align-items-center">
								<div class="col-md-10 col-12">
									<div class="banner-content text-center">
										<h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
										<h1 class="text-uppercase text-white">New Adventure</h1>
										<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
										or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a href="booking.php" class="text-uppercase header-btn">PESAN TIKET SEKARANG</a>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="item-slider relative" style="background: url(tema/img/slider2.jpg);background-size: cover;">
						<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
						<div class="container">
							<div class="row fullscreen justify-content-center align-items-center">
								<div class="col-md-10 col-12">
									<div class="banner-content text-center">
										<h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
										<h1 class="text-uppercase text-white">New Trip</h1>
										<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
										or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a href="booking.php" class="text-uppercase header-btn">PESAN TIKET SEKARANG</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item-slider relative" style="background: url(tema/img/slider3.jpg);background-size: cover;">
						<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
						<div class="container">
							<div class="row fullscreen justify-content-center align-items-center">
								<div class="col-md-10 col-12">
									<div class="banner-content text-center">
										<h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
										<h1 class="text-uppercase text-white">New Experience</h1>
										<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
										or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a href="booking.php" class="text-uppercase header-btn">PESAN TIKET SEKARANG</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Start about Area -->
			<section class="section-gap info-area" id="about">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Tentang Tempat Wisata Kami</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>					
					<div class="single-info row mt-40">
						<div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
							<div class="info-thumb">
								<img src="tema/img/about-img.jpg" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-lg-6 col-md-12 no-padding info-rigth">
							<div class="info-content">
								<h2 class="pb-30">Tentang Kami <br>
								Kami menyediankan Fasilitas <br>
								Kami menyediakan layanan</h2>
								<p>
								Taman wisata Lentana garden, yang terletak di Blok 13, Pekon Gisting Atas, Kecamatan Gisting, Kabupaten Tanggamus, menawarkan keindahan dan kesejukan alam serta keaslian air setempat.
Pantauan bintangpost.com dilokasi, taman wisata alam yang berada di lahan sekitar 1,5 hektar tersebut, dimanfaatkan secara maksimal untuk perokonomian masyarakat sekitar.
Lokasi wisata tersebut juga mempunyai kantin dengan menu andalan, ikan bakar, ayam bakar dan lele bakar, yang semua bahan bakunya dari warga sekitar. Dan juga tiket masuk dan parkir dengan harga yang terjangkau, sekitar Rp2 ribu untuk motor dan Rp5 ribu untuk mobil, serta tiket masuk untuk anak-anak Rp5 ribu dan dewasa Rp10 ribu.</p>
								</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End about Area -->
			
			
			
			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="secvice">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Beberapa Fasilitas Kami</h1>
								<p>Fasilitas kami sangat Memadai untuk pengunjung</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-4 col-md-6 ">
							<div class="single-feature mb-30">
								<div class="title d-flex flex-row pb-20">
									<span class="lnr lnr-user"></span>
									<h4><a href="#">Mushola</a></h4>
								</div>
								<p>
									Terdapat Fasilitas Mushola yang nyaman dan bersih untuk beribadah bagi muslim.
								</p>							
							</div>							
						</div>
						<div class="col-lg-4 col-md-6 ">
							<div class="single-feature mb-30">
								<div class="title d-flex flex-row pb-20">
									<span class="lnr lnr-license"></span>
									<h4><a href="#">Fasilitas Umum WC</a></h4>
								</div>
								<p>
									Tempat Wisata Kami juga terdapat wc umum yang sangat nyaman di pakai oleh pengunjung.
								</p>							
							</div>							
						</div>
						<div class="col-lg-4 col-md-6 ">
							<div class="single-feature mb-30">
								<div class="title d-flex flex-row pb-20">
									<span class="lnr lnr-phone"></span>
									<h4><a href="#">Wifi Gratis</a></h4>
								</div>
								<p>
									Terdapat Wifi Gratis Bagi pengujung yang sudah terinklun di booking tiket.
								</p>							
							</div>							
						</div>
						<div class="col-lg-4 col-md-6 ">
							<div class="single-feature">
								<div class="title d-flex flex-row pb-20">
									<span class="lnr lnr-rocket"></span>
									<h4><a href="#">Aula</a></h4>
								</div>
								<p>
									Tempat Wisata Kami terdapat Aula yang bisa di sewa untuk rapat bersama tamu undangan anda.
								</p>							
							</div>							
						</div>
						<div class="col-lg-4 col-md-6 ">
							<div class="single-feature">
								<div class="title d-flex flex-row pb-20">
									<span class="lnr lnr-diamond"></span>
									<h4><a href="#">Warung Makan/ Kantin</a></h4>
								</div>
								<p>
									Tempat wisatakami menyedian kantin/warung yang bersih untuk pengujung makan bersama keluarga.
								</p>							
							</div>							
						</div>
						<div class="col-lg-4 col-md-6 ">
							<div class="single-feature">
								<div class="title d-flex flex-row pb-20">
									<span class="lnr lnr-bubble"></span>
									<h4><a href="#">Pelampung</a></h4>
								</div>
								<p>
									Tempat wisata kami menyediakan Pelampung Renang bagi yang ingin menggunakan pelampung untuk berenang.
								</p>							
							</div>							
						</div>																					
					</div>
				</div>	
			</section>
			<!-- End feature Area -->


			<!-- Start gallery Area -->
			<section class="gallery-area" id="gallery">
				<div class="container-fluid">
					<div class="row no-padding">
						<div class="active-gallery">
							<div class="item single-gallery">
								<img src="tema/img/g1.jpg" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="tema/img/g2.jpg" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="tema/img/g3.jpg" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="tema/img/g4.jpg" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="tema/img/g5.jpg" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="tema/img/g6.jpg" alt="">
							</div>																		
						</div>
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
			
			
			<!-- Start faq Area -->
			<section class="faq-area section-gap" id="faq">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">yang sering di tanyakan pengunjung</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>							
				
						<div class="faq-content col-lg-12 col-md-12">
							<div class="single-faq">
								<h2 class="text-uppercase">
									Berpa harga tiket masuk untuk pengunjung?
								</h2>
								<p>
								tiket masuk dan parkir dengan harga yang terjangkau, sekitar Rp2 ribu untuk motor dan Rp5 ribu untuk mobil, serta tiket masuk untuk anak-anak Rp5 ribu dan dewasa Rp10 ribu</p>
							</div>
							<div class="single-faq">
								<h2 class="text-uppercase">
								Apakah ada paket atau diskon khusus untuk kelompok atau keluarga?
								</h2>
								<p>
								untuk diskon pengujung kami belum nyediakan diskon khusus , tetapi jika tempat kami mau di sewa full kami menyediakan diskon khusus  agi penyewa
								</p>
							</div>
							<div class="single-faq">
								<h2 class="text-uppercase">
									apakah bisa untuk acara pernikahan dan rapat khusus?
								</h2>
								<p>
									tempat kami sudah tersida aual jadi memungkinkan sekali untuk di sewa untuk acara pernikahan ataupun untuk acara rapat khusus bahkan tempat kami bisa di sewa full day untuk acara khusus
								</p>
							</div>												
						</div>									
					</div>
				</div>
			</section>
			<!-- End faq Area -->
			
			
			
			<!-- Start logo Area -->
			<section class="logo-area">
				<div class="container">
					<div class="row">
						
					</div>
				</div>	
			</section>
			<!-- End logo Area -->
			
							
			<!-- start contact Area -->		
			<section class="contact-area section-gap" id="contact">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">KONTAK KAMI</h1>
								<p>UNTUK MENGHUNGI KAMI BISA MELALU LINK DI BAWAH INI</p>
							</div>
						</div>
					</div>										
					<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
						<div class="row">	
						<div class="col-lg-6 form-group">
							<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
						
							<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

							<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
							<button class="primary-btn mt-20">Send Message<span class="lnr lnr-arrow-right"></span></button>
							<div class="alert-msg">								
						</div>
						</div></div>
					</form>						
					
				</div>	
			</section>
			<!-- end contact Area -->		
			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            		<p class="footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">

										<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="d-flex flex-row">

											<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


				                            	<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
				                            	<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
				                          	
											<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
										</div>		
										<div class="info"></div>
										</form>
								</div>
								</div>
						</div>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->			

			<script src="tema/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.tema/js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="tema/js/vendor/bootstrap.min.js"></script>
			<script src="tema/js/jquery.ajaxchimp.min.js"></script>
			<script src="tema/js/jquery.magnific-popup.min.js"></script>	
			<script src="tema/js/owl.carousel.min.js"></script>			
			<script src="tema/js/jquery.sticky.js"></script>
			<script src="tema/js/slick.js"></script>
			<script src="tema/js/jquery.counterup.min.js"></script>
			<script src="tema/js/waypoints.min.js"></script>		
			<script src="tema/js/main.js"></script>	
		</body>
	</html>
