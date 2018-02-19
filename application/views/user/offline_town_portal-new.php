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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Offline Town Portal</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">This tool is very useful when you found out that character is stuck somewhere in the maps. Just fill in the particular data and where you wish to teleport your character</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">

				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>
				<?php if($query->num_rows() <= 0): ?>
					<p class="mbr-text pb-3 mbr-fonts-style display-5">Please create a character.</p>
				<?php else: ?>
				<?php foreach($query->result() as $char):?>

					<div class="form-check">
						<?=form_radio('character', $char->c_id, set_radio('character'), 'id="exampleRadios1'.$char->c_id.'" class="form-check-input"')?>
						<label class="form-check-label" for="exampleRadios1<?=$char->c_id ?>">
							<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$char->c_id?></font>
						</label>
						<?=form_error('character')?>
					</div>

					<?endforeach?>

					<p class="mbr-text pb-3 mbr-fonts-style display-5">Please select where you wish to be teleport to</p>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-check">
								<?=form_radio('town', '1;32383', set_radio('town'), 'id="hq1" class="form-check-input"')?>
								<label class="form-check-label" for="hq1">
									<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5">Temoz</font>
								</label>
								<?=form_error('town')?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-check">
								<?=form_radio('town', '7;18013', set_radio('town'), 'id="hq12" class="form-check-input"')?>
								<label class="form-check-label" for="hq12">
									<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5">Quanato</font>
								</label>
								<?=form_error('town')?>
							</div>
						</div>
					</div>

					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary btn-form display-4">TELEPORT</button>
						<!-- <input type="submit" name="sign-in" value="SIGN-IN" class="btn btn-primary btn-form display-4"> -->
					</span>

				<?php endif ?>
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
		invalid: 'fa fa-times',
		validating: 'fa fa-cog fa-spin fa-lg fa-fw'
	},
	fields: {
		town: {
			validators: {
				notEmpty: {
					message: 'Please choose your town '
				},
			}
		},
		character: {
			validators: {
				notEmpty: {
					message: 'Please choose your character '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>