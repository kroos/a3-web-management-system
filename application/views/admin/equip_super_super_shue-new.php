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

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Choose your super super shue according to your character type</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

<?php
$options = array(
					'' => 'Please select shue aaccording to the character',
					'1012;76684069;4290773247;4293968751' => 'Warrior Super Super Shue',
					'1013;76290853;4290773247;4294155503' => 'Holy Knight Super Super Shue',
					'1015;76028709;4290773247;4294160367' => 'Archer Super Super Shue',
					'1014;75897637;4290773247;4293970555' => 'Mage Super Super Shue',
			);
?>

				<div class="form-group row">
					<?=form_label('Character : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input(array('name' => 'char', 'value' => set_value('char'), 'class' => 'form-control', 'id' => 'lp', 'placeholder' => 'Character'))?>
						<br />
						<?=form_error('char')?>
					</div>
				</div>

				<div class="form-group row">
					<?=form_label('Membership Type : ', 'lp1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('sss', $options, set_select('sss'), array('id' => 'lp1', 'class' => 'form-control', 'placeholder' => 'Please choose option'))?>
						<br />
						<?=form_error('sss')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">INSERT SUPER SUPER SHUE</button>
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
		sss: {
			validators: {
				notEmpty: {
					message: 'Please choose super super shue '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>