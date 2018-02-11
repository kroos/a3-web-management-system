<section class="cid-qIkd8YjWVQ mbr-fullscreen mbr-parallax-background" id="header2-9">

		<div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);"></div>

		<div class="container align-center">
			<div class="row justify-content-md-center">
				<div class="mbr-white col-md-10">
					<h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><?=$this->config->item('homepage')?></h1>
					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Account Management Tools</h3>
					<div class="container">
						<div class="row">
							<div class="col-lg-6">

								<?php start_block_marker('service_box_float_l'); ?>

									<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Account</h3>
									<?php if($this->account->account()->num_rows() == 0):?>
									<p class="mbr-text pb-3 mbr-fonts-style display-5">No Player Registered</p>
									<?php else:?>
									<p class="mbr-text pb-3 mbr-fonts-style display-5"><?=$this->account->account()->num_rows()?> Active Accounts</p>
									<?php endif?>

								<?php end_block_marker(); ?>


							</div>
							<div class="col-lg-6">

								<?php start_block_marker('service_box_float_r'); ?>

									<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Character</h3>
									<?php if($this->charac0->char()->num_rows() == 0):?>
									<p class="mbr-text pb-3 mbr-fonts-style display-5">No Character Created</p>
									<?php else:?>
									<p class="mbr-text pb-3 mbr-fonts-style display-5"><?=$this->charac0->char()->num_rows()?> Active Characters</p>
									<?php endif?>

								<?php end_block_marker(); ?>

							</div>
						</div>
					</div>
					<div class="mbr-section-btn">
						<!-- <button type="button" class="btn btn-md btn-secondary display-4">LEARN MORE</button> -->
						<a class="btn btn-md btn-secondary display-4" href="#">LEARN MORE</a>
						<a class="btn btn-md btn-white-outline display-4" href="#">LIVE DEMO</a>
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-arrow hidden-sm-down" aria-hidden="true">
			<a href="#next">
				<i class="mbri-down mbr-iconfont"></i>
			</a>
		</div>
	</section>