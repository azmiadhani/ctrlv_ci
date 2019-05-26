<?php 
// echo $user->paste_id;
// echo "<br>";
// echo $user->title;
// echo $user->paste;
// echo $user->created_at;
// echo $user->qrcode_id;
echo $status_login;


$paste_id = $user->paste_id;
// echo "<br>";
$title = $user->title;
$paste = $user->paste;
$created_at = $user->created_at;
$qrcode_id = $user->qrcode_id;
$user_id = $user->user_id;

?>

<!DOCTYPE html>
    

<?php
error_reporting(false);
?>



<html>
	<head>
		<title>Paste - CTRLV</title>
		<?php include 'assets/includephp/header.php'; // CSS Script?>

		<?php include 'assets/includephp/script-editor.php'; // CSS Script?>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<div class="page-wrap" id="root">
			<!-- header -->
			<header class="header header--fixed">
				<div class="header__inner">
					<div class="header__logo"><a href="<?php echo base_url('home')?>"><img src="<?php echo base_url('assets/img/logo.png')?>" alt="" style="width: 122px;"/></a></div>
					<?php if($status_login=="login"){?>
						<div class="navbar-toggle" id="fs-button">
						<div class="navbar-icon"><span></span></div>
						</div>
					<?php } ?>
					
				</div>
				
				<!-- fullscreenmenu__module -->
				<div class="fullscreenmenu__module" trigger="#fs-button">	
					<!-- overlay-menu -->
					<nav class="overlay-menu">
						<!--  -->
						<ul class="wil-menu-list">
							<li ><a href="<?php echo base_url('home')?>">Home</a>
							</li>
							<li ><a href="<?php echo base_url('-public')?>">Recent Pastes</a>
							</li>
							<li class="current-menu-item"><a href="<?php echo base_url('-').$user_login?>">Profile</a>
                            </li>
                            <li><a href="logout">Logout</a>
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
						<div class="page-title pb-40">
							<h2 class="page-title__title"><?php echo htmlentities($title)?></h2>
							<p class="page-title__text">Paste by <u><a href="<?php echo base_url('-').$user_id?>"><?php echo htmlentities($user_id)?></a></u> created at <u><?php echo htmlentities($created_at)?></u></p>
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
										
										<form method="post" action="<?php echo base_url('home/paste_edit')?>" id="usrform">
											<input type="hidden" name="paste_id" value="<?php echo $paste_id ?>" />
											<input type="hidden" name="title" value="<?php echo $title ?>" />
											<input type="hidden" name="created_at" value="<?php echo $created_at ?>" />
											<input type="hidden" name="qrcode_id" value="<?php echo $qrcode_id ?>" />
											<input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
                                            <!-- form-item -->
											<div class="form-item ">
												<h2 class="contact__title">ControlV Paste</h2>
                                                <textarea id="code" value="" name="code" style="min-height:400px;"><?php echo htmlentities($paste);?></textarea>
                                                <p style="color: gray">Current mode: <span id="modeinfo">text/plain</span></p>
				                                <p> <input type=hidden value="<?php echo htmlentities($title);?>" id=mode></p>
                                            </div><!-- End / form-item -->

											<!-- form-item -->
											<div class="form-item ">
												<h2 class="contact__title">RAW Paste</h2>
                                                <textarea class="form-control" name="paste" readonly="readonly" style="font-family:monospace; font-size: 16px; min-height:400px;"><?php echo htmlentities($paste);?>
                                                </textarea>
                                            </div><!-- End / form-item -->
                                            
											<!-- form-item -->
											<div class="form-item ">	
                                                <h2 class="contact__title">QRCode</h2>
                                                <?php
                                                // $qrcode_id=$row['qrcode_id'];
                                                ?>
                                                <img src="<?php echo base_url('assets/images/').$qrcode_id?>"> 
                                            </div><br><!-- End / form-item -->

                                            <!-- form-item -->
											<div class="form-item ">	
											<?php if($status==1){?>
												<input class="md-btn md-btn--primary md-btn--lg" type="submit" value="Edit Paste" name="simpan"/> 
											<?php }else{?>
											<?php ?>
                                                <a href="<?php echo base_url('home')?>"><h2 class="contact__title" style="color: #ff594f;">Click here to go back Home</h2></a>
                                            <?php } ?>
                                            </div><!-- End / form-item -->
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
            <?php 
            include 'assets/includephp/footer.php';
            include 'assets/includephp/bottom.php';
            ?>
			<!-- End / footer -->
			
		</div>
		
        <script>
		CodeMirror.modeURL = "<?php echo base_url('assets/editor/mode/%N/%N.js')?>";
		var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
			theme: "dracula",
			lineNumbers: true,
			autoCloseTags: true,
			scrollbarStyle: "simple"
		});
		var modeInput = document.getElementById("mode");
		CodeMirror.on(modeInput, "keypress", function (e) {
			if (e.keyCode == 13) change();
		});
		editor.setSize(null,"500");

		function change() {
			var val = modeInput.value,
				m, mode, spec;
			if (m = /.+\.([^.]+)$/.exec(val)) {
				var info = CodeMirror.findModeByExtension(m[1]);
				if (info) {
					mode = info.mode;
					spec = info.mime;
				}
			} else if (/\//.test(val)) {
				var info = CodeMirror.findModeByMIME(val);
				if (info) {
					mode = info.mode;
					spec = val;
				}
			} else {
				mode = spec = val;
			}
			if (mode) {
				editor.setOption("mode", spec);
				CodeMirror.autoLoadMode(editor, mode);
				document.getElementById("modeinfo").textContent = spec;
			} else {
				//alert("Could not find a mode corresponding to " + val);
				$(document).ready(function () {
					var val = $.trim($("textarea").val());
					if (val != "") {
						
					}
					else{
						window.location.href='index.php'; // enable later
					}
				});
			}
		}
        </script>
        <script>
                window.onload=function(){
                    change();
                };
        </script>
	</body>
</html>