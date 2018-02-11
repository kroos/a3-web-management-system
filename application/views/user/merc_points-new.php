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
				<?php if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit <?=$merc->row()->HSName?> Statistic Points</h2>
				<?php else:?>
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2"><?=$merc->row()->HSName?> does not have any point to distribute</h2>
				<?php endif?>
					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
					Please make sure that all the values will not exceed 65535
				</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">

				<p class="mbr-text pb-3 mbr-fonts-style display-5">
					<font color="#FF0000">
						<blink><?=@$info?></blink>
					</font>
				</p>

<?php if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
<p class="mbr-text pb-3 mbr-fonts-style display-5">
	Remaining Points = <?=merc_attrib('POINTS', $merc->row()->Ability)?>
</p>
<?php endif?>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

<?php if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
	<?php if($merc->row()->Type == 0 || $merc->row()->Type == 1 || $merc->row()->Type == 3):?>

					<div class="form-group row">
						<?=form_label('Strength : ', 'str1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'str', 'value' => set_value('str'), 'class' => 'form-control', 'id' => 'str1', 'placeholder' => 'Strength'))?>
							<br />
							<?=form_error('str')?>
						</div>
						<div class="col-sm-2">
							<?=merc_attrib('STR', $merc->row()->Ability)?>
						</div>
					</div>
	<?php else:?>
		<?=form_hidden('str', 0)?>
					<div class="form-group row">
						<?=form_label('Intelligence : ', 'int1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'int', 'value' => set_value('int'), 'class' => 'form-control', 'id' => 'int1', 'placeholder' => 'Intelligence'))?>
							<br />
							<?=form_error('int')?>
						</div>
						<div class="col-sm-2">
							<?=merc_attrib('INT', $merc->row()->Ability)?>
						</div>
					</div>
	<?php endif?>

					<div class="form-group row">
						<?=form_label('Dexterity : ', 'dex1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'dex', 'value' => set_value('dex'), 'class' => 'form-control', 'id' => 'dex1', 'placeholder' => 'Dexterity'))?>
							<br />
							<?=form_error('dex')?>
						</div>
						<div class="col-sm-2">
							<?=merc_attrib('DEX', $merc->row()->Ability)?>
						</div>
					</div>
					<div class="form-group row">
						<?=form_label('Vitality : ', 'vit1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'vit', 'value' => set_value('vit'), 'class' => 'form-control', 'id' => 'vit1', 'placeholder' => 'Vitality'))?>
							<br />
							<?=form_error('vit')?>
						</div>
						<div class="col-sm-2">
							<?=merc_attrib('VIT', $merc->row()->Ability)?>
						</div>
					</div>
					<div class="form-group row">
						<?=form_label('Mana : ', 'mana1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'mana', 'value' => set_value('mana'), 'class' => 'form-control', 'id' => 'mana1', 'placeholder' => 'Mana'))?>
							<br />
							<?=form_error('mana')?>
						</div>
						<div class="col-sm-2">
							<?=merc_attrib('MANA', $merc->row()->Ability)?>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary btn-form display-4">
										Distribute <?=$merc->row()->HSName ?> Points
									</button>
								</span>
							</div>
						</div>
					</div>
<?php endif?>
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
		str: {
			validators: {
				notEmpty: {
					message: 'Please insert your strength point '
				},
				greaterThan: {
					value: 0,
					message: 'The value must be greater than or equal to 0'
				},
			}
		},
		int: {
			validators: {
				notEmpty: {
					message: 'Please insert your intelligence point '
				},
				greaterThan: {
					value: 0,
					message: 'The value must be greater than or equal to 0'
				},
			}
		},
		dex: {
			validators: {
				notEmpty: {
					message: 'Please insert your dexterity point '
				},
				greaterThan: {
					value: 0,
					message: 'The value must be greater than or equal to 0'
				},
			}
		},
		vit: {
			validators: {
				notEmpty: {
					message: 'Please insert your vitality point '
				},
				greaterThan: {
					value: 0,
					message: 'The value must be greater than or equal to 0'
				},
			}
		},
		mana: {
			validators: {
				notEmpty: {
					message: 'Please insert your mana point '
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