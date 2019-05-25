<!DOCTYPE html>

<?php
	//error_reporting(false);
    // session_start();
	// cek apakau user sudah login
	//$_SESSION['login'] == true;
    // if($_SESSION['login'] == false){
    // $message = "Anda belum login !";
    // echo "<script type='text/javascript'> alert('$message'); location.href = 'login.php';</script>";
    // }
?>

<?php
	date_default_timezone_set("Asia/Hong_Kong");
?>
<html>
    <head>
        <title>Register - CTRLV</title>
        <?php include 'assets/includephp/header.php'; // CSS Script?>

    </head>

    <body>
		<div class="page-wrap" id="root">
			<!-- header -->
			<header class="header header--fixed">
				<div class="header__inner">
					<div class="header__logo"><a href="home"><img src="assets/img/logo.png" alt="" style="width: 122px;"/></a></div>
					<!-- <div class="navbar-toggle" id="fs-button">
						<div class="navbar-icon"><span></span></div>
					</div> -->
				</div>
				
				<!-- fullscreenmenu__module -->
				<div class="fullscreenmenu__module" trigger="#fs-button">	
					<!-- overlay-menu -->
					<nav class="overlay-menu">
						<!--  -->
						<ul class="wil-menu-list">
							<li class="current-menu-item"><a href="index.php">Home</a>
							</li>
							<!-- <li><a href="blog.html">Blog</a>
							</li>
							<li><a href="contact.html">Contact</a>
							</li> -->
						</ul><!--  -->	
					</nav><!-- End / overlay-menu -->	
				</div><!-- End / fullscreenmenu__module -->
			</header><!-- End / header -->
			
			<!-- SECTION HEADER-->

			<!-- Content-->
			<div class="wil-content">
				<!-- Section -->
				<section class="awe-section">
					<div class="container">
						
						<!-- page-title -->
						<div class="page-title">
							<h2 class="page-title__title">Um. Hello, i'm CTRLV.<br>I
								
								<!-- typing__module -->
								<div class="typing__module">
									<div class="typed-strings">
										<span>'m a text storage site</span>
										<span>'m a WYSWYG code</span>
										<span>'m nothing, just one and zero</span>
									</div><span class="typed"></span>
								</div><!-- End / typing__module -->
								
							</h2>
							<p class="page-title__text"></p>
							<div class="page-title__divider"></div>
						</div><!-- End / page-title -->	
					
					</div>
				</section>
				<!-- End / Section -->
				
				<!-- SECTION CONTENT-->

				<!-- Section -->
				<section class="awe-section bg-gray">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 ">
							</div>
							<div class="col-lg-4 ">
								
								<!-- title -->
								<div class="title">
									<h2 class="title__title">Register to CRTLV</h2>
								</div><!-- End / title -->
									
									<div class="form-wrapper">
										
										<form method="post" action="register/register"  onSubmit="return validation()">	
											<input type="hidden" value="<?php echo date('Y-m-d');?>" name="date">

											<!-- form-item -->
											<div class="form-item">
												<h2 class="contact__title">E-mail</h2>
												<input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
											</div><!-- End / form-item -->
											
											<!-- form-item -->
											<div class="form-item">
												<h2 class="contact__title">Username</h2>
												<input class="form-control" type="text" name="user" id="user" placeholder="Username">
											</div><!-- End / form-item -->

											<!-- form-item -->
											<div class="form-item">
												<h2 class="contact__title">Password</h2>
												<input class="form-control" type="password" name="pass" id="pass" placeholder="Password">
											</div><!-- End / form-item -->
											
											<!-- form-item -->
											<div class="form-item">
												<input type="submit" class="md-btn md-btn--primary md-btn--lg" value="Register">
												<a  href="login">&nbsp Already a member?</a>
											</div>
											<!-- End / form-item -->
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="awe-text-center mt-50">
							<a class="md-btn md-btn--outline-primary" href="#">all work
							</a>
						</div> -->
					</div>
				</section>
				<!-- End / Section -->
			</div>
			<!-- End / Content-->
            	<!-- footer -->
			<div class="footer">
				<?php include 'assets/includephp/footer.php';?>
			</div>
			<!-- End / footer -->
			
		</div>
		<!-- Vendors-->
		<script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="assets/vendors/imagesloaded/imagesloaded.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/isotope-layout/isotope.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery-one-page/jquery.nav.min.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.easing/jquery.easing.min.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.matchHeight/jquery.matchHeight.min.js"></script>
		<script type="text/javascript" src="assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="assets/vendors/masonry-layout/masonry.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.waypoints/jquery.waypoints.min.js"></script>
		<script type="text/javascript" src="assets/vendors/swiper/swiper.jquery.js"></script>
		<script type="text/javascript" src="assets/vendors/menu/menu.js"></script>
		<script type="text/javascript" src="assets/vendors/typed/typed.min.js"></script>
		<!-- App-->
		<script type="text/javascript" src="assets/js/main.js"></script>

        <script type="text/javascript">
			// Validasi Username Password
			function validation(){
				var username = document.getElementById("user").value;
				var password = document.getElementById("pass").value;	
				if(/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/.test( username ) ) {
					return true;  
				}
				else{
					alert('Cek kemnbali Username/Password! \n caution : \n -Username/Password tidak boleh kosong ! \n -Username hanya boleh menggunakan karakter alphabet dan simbol titik (.) dan underscore (_) !');
					return false;
				}
			}
		</script>
	</body>
</html>