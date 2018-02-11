<?php
extend('layout/user.php');

startblock('news');
endblock();


startblock('form');
?>

<section class="mbr-section cid-qIbsf3xlXN">

	<div class="container">
		<div class="row justify-content-center">
			<div class="title col-12 col-lg-8">
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit Mercenary Hero Statistic Points</h2>
				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please click on your hero below which you want to add your stat points</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">

				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

				<div id="accordion">
					<?php foreach($query->result() as $char):?>

					<div class="card">
						<div class="card-header" id="<?=$char->c_id?>">
							<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?=$char->c_id?>" aria-expanded="true" aria-controls="collapseOne<?=$char->c_id?>">
									<?=$char->c_id?>
								</button>
							</h5>
						</div>

						<div id="collapseOne<?=$char->c_id?>" class="collapse" aria-labelledby="<?=$char->c_id?>" data-parent="#accordion">
							<div class="card-body">
								Your <?=$char->c_id?> is a <?=char_type($char->c_sheaderb)?><br />
								<?php if($this->hstable->hstable_merc($char->c_id)->num_rows() == 0):?>
									You do not have any mercenary for <?=$char->c_id?><br />
								<?php else:?>
										<?php foreach($this->hstable->hstable_merc($char->c_id)->result() as $merc):?>
										<?php $merc1 = $merc->HSName?>
										<?=$char->c_id?> mercenary : <?=anchor('user/merc_points/'.$merc->HSID, 'Distribute '.$merc1.' Points', array('class' => 'btn btn-primary', 'role' => 'button'))?>
										<?php endforeach?>
								<?php endif?>
							</div>
						</div>
					</div>
					<?php endforeach?>
				</div>

<!-- 	<div class="container">
		<div class="row">
			<div class="col-sm-12 row">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary btn-form display-4">MERCENARY RESET REBIRTH</button>
				</span>
			</div>
		</div>
	</div> -->

				<?=form_close() ?>

			</div>
		</div>
	</div>
</section>

<?php
endblock();

startblock('jscript');
?>
////////////////////////////////////////////////////////////////////////////////////
// ckeditor
//CKEDITOR.replace( 'news_reply' );

////////////////////////////////////////////////////////////////////////////////////
// ucwords
$("#username").keyup(function() {
	lch(this);
});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("#productForm").bootstrapValidator({
		feedbackIcons: {
		valid: 'fa fa-check fa-lg',
		invalid: 'fa fa-ban fa-lg',
		validating: 'fa fa-cog fa-spin fa-lg fa-fw'
	},
	fields: {
		character: {
			validators: {
				notEmpty: {
					message: 'Please choose your character '
				},
			}
		},
		merc: {
			validators: {
				notEmpty: {
					message: 'Please choose your mercenary '
				},
			}
		},
	
	}
})


<?php
endblock();

end_extend();
?>