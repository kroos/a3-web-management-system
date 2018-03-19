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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Player Kill Info</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Insert character to see the PK Info</h3>
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

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">PK Info</button>
						</span>
					</div>
				</div>

				<?=form_close() ?>


<?php if ($this->form_validation->run() == TRUE):?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><strong><?=$h->row()->c_id?></strong> pking people for <strong><?=mbody_part('PK', $h->row()->m_body)?></strong> times.</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-5">And timer before <?=$h->row()->c_id?> can PK again is = <b><?=mbody_part('RTM', $h->row()->m_body)?></b></p>
				<p class="mbr-text pb-3 mbr-fonts-style display-5">If the timer is 0, <?=$h->row()->c_id?> can PK at anytime it want and if you don't want <?=$h->row()->c_id?> to PK, set it timer more than 1,500 or higher, for example : maybe 20,000 ?</p>
				<p class="mbr-text pb-3 mbr-fonts-style display-5">If you set to only 1,500, <?=$h->row()->c_id?> can bail out the timer by using its lore.</p>
			</div>
		</div>
	</div>
<?php endif?>



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
		month: {
			validators: {
				notEmpty: {
					message: 'Choose expiry month '
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