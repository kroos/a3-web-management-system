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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Account Ban</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please NOTE : Don't use this tools if you are lagging cause you need to press the Submit Button only once, NOT twice due to lagging</h3>
				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please be very careful on permanent account banning because you are deleting the whole account. Whatever the reason you mad at the player, i recommend you to just temporarily ban him/her.</h3>
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
					<?=form_label('Ban Type : ', 'lp1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('banning',  array(NULL => 'Please choose ban type', '1' => 'Temporary', '2' => 'Permanent'), set_select('banning'), array('id' => 'lp1', 'class' => 'form-control', 'placeholder' => 'Please choose option'))?>
						<br />
						<?=form_error('banning')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">BAN ACCOUNT</button>
						</span>
					</div>
				</div>

				<?=form_close() ?>

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
		banning: {
			validators: {
				notEmpty: {
					message: 'Please choose ban type '
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