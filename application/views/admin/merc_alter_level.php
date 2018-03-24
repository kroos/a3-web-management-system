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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Mercenary Altering Level</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please take note that only level  300 is available</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'id' => 'productForm', 'autocomplete' => 'off'))?>

				<div class="form-group row">
					<?=form_label('Mercenary : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input('merc', set_value('merc'), 'class="form-control" id="lp" placeholder="Mercenary" data-provide="typeahead"')?>
						<br />
						<?=form_error('merc')?>
					</div>
				</div>

<?php
$options = array(
					'' => 'Please select level',
					'3869596295' => 'Level 300',
			);
?>

				<div class="form-group row">
					<?=form_label('Level : ', 'lp1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('level', $options, set_select('level'), array('id' => 'lp1', 'class' => 'form-control', 'placeholder' => 'Please choose option'))?>
						<br />
						<?=form_error('level')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">ALTER MERCENARY LEVEL</button>
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
		merc: {
			validators: {
				notEmpty: {
					message: 'Please insert a character '
				},
			}
		},
		level: {
			validators: {
				notEmpty: {
					message: 'Please choose level '
				},
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
// autocomplete
// ajax
var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
	$( "#lp" ).autocomplete({
		// source: 'mercsearch'
		source: function(request, response){
			$.ajax({
				url: 'mercsearch',
				data: request,
				dataType: "json",
				type: 'GET',
				success: function(data){
					response(data);
				}
			})
		}
	});



<?php
endblock();

end_extend();
?>