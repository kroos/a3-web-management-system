<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon-16x16.png" type="image/x-icon">
	<meta name="description" content="This is an Account Management Tools for  <?=$this->config->item('homepage')?> Online Games to modify their character" />
	<meta name="keywords" content="A3, A3 online, a3 online game, a3 private server, a3 game, free online game, free private server, free a3, free a3 game online, revive, a3 revive, revive online game, free a3 revive" />
	<title><?=$this->config->item('homepage')?> Account Management Tools</title>

	<link rel="stylesheet" href="<?=base_url()?>assets/web/assets/mobirise-icons/mobirise-icons.css">

	<link rel="stylesheet" href="<?=base_url()?>assets/tether/tether.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dropdown/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/animatecss/animate.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/socicon/css/styles.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/theme/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/gallery/style.css">

	<link rel="stylesheet" href="<?=base_url()?>assets/mobirise/css/mbr-additional.css" type="text/css">

	<script src="<?=base_url()?>assets/web/assets/jquery/jquery.min.js"></script>


	<!-- select2 https://select2.github.io/ -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" /> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" /> -->
	<link rel="stylesheet" href="<?=base_url()?>assets/select2/css/select2.min.css" />

	<!-- Bootstrap Date-Picker Plugin -->
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css"/>

	<!-- sweet alert for deleting something (https://lipis.github.io/bootstrap-sweetalert/) -->
	<!-- <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" > -->
	<!-- <script type="text/javascript" src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js" ></script> -->
	<link rel="stylesheet" href="<?=base_url()?>assets/sweet-alert/css/sweetalert.css" />

	<!-- bootstrap validator http://formvalidation.io/ -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" /> -->
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script> -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap-validator/css/bootstrapValidator.min.css" />

	<!-- datatables : https://datatables.net/extensions/responsive/examples/styling/bootstrap.html -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" ></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

	<!-- javascript chart : http://www.chartjs.org/ -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

	<!-- ckeditor sdk http://sdk.ckeditor.com/index.html -->
	<script type="text/javascript" src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>

	<!-- font awesome http://fontawesome.io -->
	<link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" />

	<!-- MiniColors  / color picker http://labs.abeautifulsite.net/jquery-minicolors/index.html -->
	<link rel="stylesheet" href="<?=base_url()?>assets/minicolors/jquery.minicolors.css" />

</head>
<body>

<?php

include('nav.php');

if ($this->session->userdata('logged_in') == FALSE) {
	include('jumbotron.php');
} else {
	include('jumbotron.user.php');
}

include('news.php');

include('form.php');

include('testimonials.php');

include('gallery.php');

?>

		<section class="cid-qIk9ruZXx4" id="social-buttons3-8">
			<div class="container">
				<div class="media-container-row">
					<div class="col-md-8 align-center">
						<h2 class="pb-3 mbr-section-title mbr-fonts-style display-2">
							SHARE THIS PAGE!
						</h2>
						<div>
							<div class="mbr-social-likes">
								<span class="btn btn-social socicon-bg-facebook facebook mx-2" title="Share link on Facebook">
									<i class="socicon socicon-facebook"></i>
								</span>
								<span class="btn btn-social twitter socicon-bg-twitter mx-2" title="Share link on Twitter">
									<i class="socicon socicon-twitter"></i>
								</span>
								<span class="btn btn-social plusone socicon-bg-googleplus mx-2" title="Share link on Google+">
									<i class="socicon socicon-googleplus"></i>
								</span>
								<span class="btn btn-social pinterest socicon-bg-pinterest mx-2" title="Share link on Pinterest">
									<i class="socicon socicon-pinterest"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
include('footer.php');
?>
		<script src="<?=base_url()?>assets/popper/popper.min.js"></script>
		<script src="<?=base_url()?>assets/tether/tether.min.js"></script>
		<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/smoothscroll/smooth-scroll.js"></script>
		<script src="<?=base_url()?>assets/cookies-alert-plugin/cookies-alert-core.js"></script>
		<script src="<?=base_url()?>assets/cookies-alert-plugin/cookies-alert-script.js"></script>
		<script src="<?=base_url()?>assets/dropdown/js/script.min.js"></script>
		<script src="<?=base_url()?>assets/touchswipe/jquery.touch-swipe.min.js"></script>
		<script src="<?=base_url()?>assets/viewportchecker/jquery.viewportchecker.js"></script>
		<script src="<?=base_url()?>assets/masonry/masonry.pkgd.min.js"></script>
		<script src="<?=base_url()?>assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="<?=base_url()?>assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
		<!-- <script src="<?=base_url()?>assets/sociallikes/social-likes.js"></script> -->
		<script src="<?=base_url()?>assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
		<script src="<?=base_url()?>assets/parallax/jarallax.min.js"></script>
		<script src="<?=base_url()?>assets/theme/js/script.js"></script>
		<script src="<?=base_url()?>assets/slidervideo/script.js"></script>
		<script src="<?=base_url()?>assets/gallery/player.min.js"></script>
		<script src="<?=base_url()?>assets/gallery/script.js"></script>
		<!-- <script src="<?=base_url()?>assets/formoid/formoid.min.js"></script> -->

		<script type="text/javascript" src="<?=base_url() ?>assets/ucwords/ucwords.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>assets/bootstrap-validator/js/bootstrapValidator.min.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>assets/sweet-alert/js/sweetalert.min.js" ></script>
		<script type="text/javascript" src="<?=base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>assets/select2/js/select2.min.js" ></script>
		<script type="text/javascript" src="<?=base_url() ?>assets/minicolors/jquery.minicolors.min.js"></script>


		<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
		<input name="animation" type="hidden">
		<input name="cookieData" type="hidden" data-cookie-text="We use cookies to give you the best experience.">

<? include('jscript.php') ?>

	</body>
	</html>