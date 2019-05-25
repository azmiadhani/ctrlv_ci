<!DOCTYPE html>

<?php
	// include 'config.php'; // Include koneksi
	error_reporting(false);
    
	// cek apakau user sudah login

    // // // ENABLEE LATERRR !!!!!!!!!!!!!!!!!!!!!!!!!!! (jika belum login balik ke halaman login
    // if($_SESSION['login'] == false){
    // $message = "Anda belum login !";
    // echo "<script type='text/javascript'> alert('$message'); location.href = 'login.php';</script>";
	// }

	//User Declaration 
	$username=$user;
?>

<html>
    <head>
        <title>Home - CTRLV</title>
        <?php include 'assets/includephp/header.php'; // CSS Script?>
        <?php include 'assets/includephp/random.php'; // CSS Script?>
        <?php $paste_id = rnd(6,true,true,true);?>
    </head>

	
	<body>
		<div class="page-wrap" id="root">
			<div class="page-wrap" id="root">
			<!-- header -->
			<header class="header header--fixed">
				<div class="header__inner">
					<div class="header__logo"><a href="index.php"><img src="assets/img/logo.png" alt="" style="width: 122px;"/></a></div>
					<div class="navbar-toggle" id="fs-button">
						<div class="navbar-icon"><span></span></div>
					</div>
				</div>
				
				<!-- fullscreenmenu__module -->
				<div class="fullscreenmenu__module" trigger="#fs-button">	
					<!-- overlay-menu -->
					<nav class="overlay-menu">
						<!--  -->
						<ul class="wil-menu-list">
							<li ><a href="<?php echo base_url('home')?>">Home</a>
							</li>
							<li ><a href="<?php echo base_url('profile/v/public')?>">Recent Pastes</a>
							</li>
							<li class="current-menu-item"><a href="<?php echo base_url('profile')?>">Profile</a>
                            </li>
                            <li><a href="login/logout">Logout</a>
                            </li>
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
							<h2 class="page-title__title">Hello <?php echo htmlentities($username)?>, i am CTRLV.<br>I
								
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
							<div class="col-lg-12 ">
								
								<!-- title -->
								<div class="title">
									<h2 class="title__title">Hoho, let's CTRLV</h2>
								</div><!-- End / title -->
									
									<div class="form-wrapper">
										
										<form method="post" action="home/paste">
                                            <input type="hidden" value="<?php echo $paste_id;?>" name="paste_id">
											<!-- form-item -->
											<div class="form-item ">
												<h2 class="contact__title">New Paste</h2>
												<textarea class="form-control" name="paste" placeholder="paste here" style="min-height:400px;"></textarea>
											</div><!-- End / form-item -->
													
											<!-- form-item -->
											<div class="form-item">
												<h2 class="contact__title">Title</h2>
												<input class="form-control" type="text" name="title" placeholder="Title">
											</div><!-- End / form-item -->
											
											<!-- form-item -->
											<div class="form-item">
												<input type="submit" class="md-btn md-btn--primary md-btn--lg" ></a>
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
	</body>
</html>