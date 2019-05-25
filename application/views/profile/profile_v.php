<?php 
// echo $user->paste_id;
// echo "<br>";
$username = $user->user_id;
$this_username = $this_user->user_id;
$join_date = $user->join_date;
// echo "<br>";
// foreach ($paste->result() as $row)
// {
//         echo $row->title;
//         echo "<br>";
// }
?>

<!DOCTYPE html>

<?php
	error_reporting(false);
?>




<html>
	<head>
		<title><?php echo $username; ?> profile - CTRLV</title>

		<?php include 'assets/includephp/header.php'; // CSS Script?>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/table.css')?>">
        
	</head>
	<?php echo base_url('')?>
	<body>
		<div class="page-wrap" id="root">
			<!-- header -->
			<header class="header header--fixed">
				<div class="header__inner">
					<div class="header__logo"><a href="<?php echo base_url('home')?>"><img src="<?php echo base_url('assets/img/logo.png')?>" alt="" style="width: 122px;"/></a></div>
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
					</nav>
				</div>
			</header>
			
			<!-- SECTION HEADER-->

			<!-- User Declaration -->
			<!-- Content-->
			<div class="wil-content">
				<!-- Section -->
				<section class="awe-section">
					<div class="container">
						
						<!-- page-title -->
						<div class="page-title pb-40">
                            <?php if($username=="public"){ ?>
                                <h2 class="page-title__title">Recent Paste </h2>
                            <?php }else{?>
                                <h2 class="page-title__title">Profile of <?php echo htmlentities($username)?></h2>
                            <?php }?>
                            <?php if($username=="public"){ ?>
                                <p class="page-title__text">Find something!</u></p>
                            <?php }else{?>
                                <p class="page-title__text">Joined on <u><?php echo htmlentities($join_date)?></u></p>
                            <?php }?>
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

									<div class="form-wrapper">
                                        <table>
                                            <tr>
                                                <th>Paste Title</th>
                                                <th>Date Created</th>
                                                <!-- Jika admin atau user itu sendiri -->
												<?php if($this_username==$username|| $this_username=="admin"){?> 
													<th>Command</th>
												<?php } ?>
                                            </tr>
                                            <?php 
                                           foreach ($paste->result() as $row)
                                           {
												if($this_username==$username|| $this_username=="admin" ){
													?> <tr><td><a href="<?php echo base_url('ctrl/v/').$row->paste_id?>" target='_blank'> <?php echo $row->title;?> </a></td><td><?php echo $row->created_at ?></td><td><a href="paste-edit.php?id=">Edit</a> || <a href="paste-delete.php?paste_id=&user_id=" onClick="return confirm('Yakin ingin menghapus?')">Delete</a></td></tr> <?php
												}
												else{
													?> <tr>
                                                            <td>
                                                                <a href="<?php echo base_url('$row->paste_id')?>" target='_blank'> <?php echo $row->title;?> </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $row->created_at ?>
                                                                </td>
                                                        </tr> <?php
												}
                                            }
                                            ?>
                                        </table>
                                        <br><br>
										<?php if($this_username==$username|| $this_username=="admin"){?>
                            
                                            <!-- Tombol Edit Profile -->
                                            <form action="<?php echo base_url('home')?>"> 
                                                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                                                    <input class="md-btn md-btn--primary md-btn--lg" type="submit" value="New Paste" name="new"/>
                                            </form>
                                        <?php } ?>
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