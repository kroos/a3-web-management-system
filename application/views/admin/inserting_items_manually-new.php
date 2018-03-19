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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Inserting Items Manually</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please take a listen and look carefully becos this 1 is the most trickiest part of the tools.</h3>

				<p class="mbr-text pb-3 mbr-fonts-style display-6">First of all, just put the char name, its easy.</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">2nd u have to put the code, the code must be consists of 4 sections and the format should look like this</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6"><strong>xxxxxx;xxxxxx;xxxxx;slotnumber;</strong></p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">For example : if you want to inject 1 Upgrade Jewel inside a character (please dont do that, wasting your time....) so use this code :</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">6144;123321;128;4;</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">Make sure slot number <strong>5</strong> is empty, yes... number 5 not number 4.. becos the system start counting from 0, not from 1</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">So for slot number 5, the system count like this..</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">0 , 1 , 2 , 3 , 4  <---- number 5 to us...</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">Please take a look at the sign ";" at the end of the code, if you forgot to put the sign ";" at the end, then the whole character might be corrupted</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-6">So use a high caution to use this tools</p>
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
						<?=form_input('char', set_value('char'), 'class="form-control" id="lp" placeholder="Character"')?>
						<br />
						<?=form_error('char')?>
					</div>
				</div>

				<div class="form-group row">
					<?=form_label('Code : ', 'lp2', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_textarea('code', set_value('code'), 'class="form-control" id="lp2" placeholder="Code"')?>
						<br />
						<?=form_error('code')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">INSERT ITEM MANUALLY</button>
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
		char: {
			validators: {
				notEmpty: {
					message: 'Please insert a character '
				},
			}
		},
		paid: {
			validators: {
				notEmpty: {
					message: 'Please choose membership '
				},
			}
		},
		code: {
			validators: {
				notEmpty: {
					message: 'Please insert your code '
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