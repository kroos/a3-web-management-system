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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Changing Account Type</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Use this tools to upgrade user account to Game Master or normal user.</h3>
				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">They can access this section (GM Tools) by just changing his/her account to "Game Master" by using this tool.</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

				<div class="form-group row">
					<?=form_label('Character : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input(array('name' => 'char', 'value' => set_value('char'), 'class' => 'form-control', 'id' => 'lp', 'placeholder' => 'Character'))?>
						<br />
						<?=form_error('char')?>
					</div>
				</div>

				<div class="form-group row">
					<?=form_label('Account Type : ', 'lp1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('acc', array('' => '', 'Normal' => 'Normal', 'GM' => 'Game Master'), set_select('acc'), array('id' => 'lp1', 'class' => 'form-control', 'placeholder' => 'Please choose option'))?>
						<br />
						<?=form_error('acc')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">CHANGE ACCOUNT</button>
						</span>
					</div>
				</div>

				<?=form_close() ?>

				<hr />

				<div class="container">
					<div class="row">
						<div class="col-sm-12">

						</div>
					</div>
				</div>

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
		char: {
			validators: {
				notEmpty: {
					message: 'Please insert a character '
				},
			}
		},
		acc: {
			validators: {
				notEmpty: {
					message: 'Please choose an option '
				},
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
// autocomplete
	$( "#lp" ).autocomplete({
		source: 'charsearch'
		// minLength: 2
	});

////////////////////////////////////////////////////////////////////////////////////
<?php
endblock();

end_extend();
?>