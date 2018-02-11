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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Character Clone</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">This option will clone any character for whatever reason you may have</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

				<div class="form-group row">
					<?=form_label('Please insert the character name that you want to clone : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input('char1', set_value('char1'), 'class="form-control" id="lp" placeholder="Please insert the character name that you want to clone"')?>
						<br />
						<?=form_error('char1')?>
					</div>
				</div>

				<div class="form-group row">
					<?=form_label('Please insert the character name that you want to restore : ', 'lp2', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input('char2', set_value('char2'), 'class="form-control" id="lp2" placeholder="Please insert the character name that you want to restore"')?>
						<br />
						<?=form_error('char2')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">CHARACTER CLONE</button>
						</span>
					</div>
				</div>

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
// CKEDITOR.replace( 'event_edit' );

////////////////////////////////////////////////////////////////////////////////////
// ucwords
$("").keyup(function() {
	tch(this);
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
		char1: {
			validators: {
				notEmpty: {
					message: 'Please insert a character '
				},
				different: {
					field: 'char2',
					message: 'The clone and restore character cannot be the same as each other '
				},
			}
		},
		char2: {
			validators: {
				notEmpty: {
					message: 'Please insert a character '
				},
				different: {
					field: 'char1',
					message: 'The clone and restore character cannot be the same as each other '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>