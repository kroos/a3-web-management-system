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
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Buy Lore</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">For each lore you buy, it will cost you <?=$this->config->item('buy_lore')?> wz so if you buy 1,000 lore it will cost <?php echo $lore1=$this->config->item('buy_lore') * 1000; ?> wz. You can use this AMT if and only if your rebirth level is greater or equal than <?=$this->config->item('lore_rb_buy')?>.<br />Summary :<br />Your rebirth level >= <?=$this->config->item('lore_rb_buy')?><br />1 lore = <?=$this->config->item('buy_lore')?> wz</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>
<?php if($query->num_rows() <= 0):?>
<p class="mbr-text pb-3 mbr-fonts-style display-5">Please create a character.</p>
<?php else: ?>
<?php foreach($query->result() as $char):?>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-check">
								<?=form_radio('character', $char->c_id, set_radio('character', $char->c_id, FALSE), 'id="exampleRadios1'.$char->c_id.'" class="form-check-input"')?>
								<label class="form-check-label" for="exampleRadios1<?=$char->c_id ?>">
									<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$char->c_id?></font>
								</label>
								<?=form_error('character')?>
							</div>
						</div>
					</div>
<?php endforeach?>

		<div class="form-group row">
			<?=form_label('Lore Points : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
			<div class="col-sm-10">
				<?=form_input(array('name' => 'lore', 'value' => set_value('lore'), 'class' => 'form-control', 'id' => 'lp', 'placeholder' => 'Lore Points'))?>
				<br />
				<?=form_error('lore')?>
			</div>
		</div>

							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">BUY LORE</button>
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
		lore: {
			validators: {
				notEmpty: {
					message: 'Please insert lore '
				},
				greaterThan: {
				value: 0,
				message: 'The value must be greater than or equal to 0'
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>