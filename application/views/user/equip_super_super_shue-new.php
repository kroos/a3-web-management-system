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
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Equip Super Super Shue</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please insert the details below to equip your super super shue for <?=$this->config->item('wz_sss')?> wz</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

<?php foreach($query->result() as $char):?>
							<div class="form-check row">
								<?=form_radio('character', $char->c_id, set_radio('character', $char->c_id, FALSE), 'id="exampleRadios1'.$char->c_id.'" class="form-check-input"')?>
								<label class="form-check-label" for="exampleRadios1<?=$char->c_id ?>">
									<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$char->c_id?></font>
								</label>
								<?=form_error('character')?>
							</div>
<?php endforeach?>

							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">EQUIP SUPER SUPER SHUE</button>
							</span>

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
	}
})


<?php
endblock();

end_extend();
?>