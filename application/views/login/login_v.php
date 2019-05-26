<!DOCTYPE html>

<?php
	error_reporting(false);
    session_start();
	// cek apakau user sudah login
	//$_SESSION['login'] == false;
    // if($_SESSION['login'] == false){
    // $message = "Anda belum login !";
    // echo "<script type='text/javascript'> alert('$message'); location.href = 'login.php';</script>";
	// }
	//User Declaration 
	$user=$_SESSION['user'];
?>

<html>
	<head>

    <?php include 'assets/includephp/header.php'; // CSS Script?>

	</head>
	
	<body>
		<div class="page-wrap" id="root">
			<!-- header -->
			<header class="header header--fixed">
				<div class="header__inner">
					<div class="header__logo"><a href="home"><img src="assets/img/logo.png" alt="" style="width: 122px;"/></a></div>
					
				</div>
				
				<!-- fullscreenmenu__module -->
				<div class="fullscreenmenu__module" trigger="#fs-button">	
					<!-- overlay-menu -->
					<nav class="overlay-menu">
						<!--  -->
						
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
									<h2 class="title__title">Login to CRTLV</h2>
								</div><!-- End / title -->
									
									<div class="form-wrapper">
										
										<form method="post" action="login/aksi_login" onSubmit="return validati()">	
											<!-- form-item -->
											<div class="form-item">
												<h2 class="contact__title">Username</h2>
												<input class="form-control" type="text" name="user" id="user" placeholder="Username" >
											</div><!-- End / form-item -->

											<!-- form-item -->
											<div class="form-item">
												<h2 class="contact__title">Password</h2>
												<input class="form-control" type="password" name="pass" id="pass" placeholder="Password">
											</div><!-- End / form-item -->
											
											<!-- form-item -->
											<div class="form-item">
												<input type="submit" class="md-btn md-btn--primary md-btn--lg" value="Login">
												<a  href="register">&nbsp Not yet a member?</a>
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
				<?php 
				include 'assets/includephp/footer.php';
				include 'assets/includephp/bottom.php';
				?>
			</div>
			<!-- End / footer -->
			
		</div>
		<!-- Vendors-->


		<script type="text/javascript">
			// Validasi Username Password
			function validati(){
				var username = document.getElementById("user").value;
				var password = document.getElementById("pass").value;	
				if(/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/.test( username ) ) {
					
				}
				else{
					alert('Cek kemnbali Username/Password! \n caution : \n -Username/Password tidak boleh kosong ! \n -Username hanya boleh menggunakan karakter alphabet dan simbol titik (.) dan underscore (_) !');
					return false;
				}
			}
		</script>
	</body>
</html>