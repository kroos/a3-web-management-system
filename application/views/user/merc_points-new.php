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
	Remaining Points = <span id="rpoint"><?=merc_attrib('POINTS', $merc->row()->Ability)?></span>
</p>
<?php endif?>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

<?php if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
	<?php if($merc->row()->Type == 0 || $merc->row()->Type == 1 || $merc->row()->Type == 3):?>

					<div class="form-group row">
						<input name="int" value="0" id="int1" type="hidden">
						<?=form_label('Strength : ', 'str1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'str', 'value' => set_value('str'), 'class' => 'form-control', 'id' => 'str1', 'placeholder' => 'Strength'))?>
							<br />
							<?=form_error('str')?>
						</div>
						<div class="col-sm-2" id="strpoint">
							<?=merc_attrib('STR', $merc->row()->Ability)?>
						</div>
					</div>
	<?php else:?>
		<input name="str" value="0" id="str1" type="hidden">
					<div class="form-group row">
						<?=form_label('Intelligence : ', 'int1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?=form_input(array('name' => 'int', 'value' => set_value('int'), 'class' => 'form-control', 'id' => 'int1', 'placeholder' => 'Intelligence'))?>
							<br />
							<?=form_error('int')?>
						</div>
						<div class="col-sm-2" id="intpoint">
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
						<div class="col-sm-2" id="dexpoint">
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
						<div class="col-sm-2" id="vitpoint">
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
						<div class="col-sm-2" id="manapoint">
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
// latest
$(document).on('keyup', '#str1, #int1, #dex1, #mana1, #vit1', function () {
	var str = $('#str1');
	var int = $('#int1');
	var dex = $('#dex1');
	var mana = $('#mana1');
	var vit = $('#vit1');

	var strpoint = $('#strpoint');
	var intpoint = $('#intpoint');
	var dexpoint = $('#dexpoint');
	var manapoint = $('#manapoint');
	var vitpoint = $('#vitpoint');

	var rpoint = $('#rpoint');

	var str2 = ((<?=merc_attrib('STR', $merc->row()->Ability)?> * 100) + ( $(str).val() * 100 ))/100;
	var int2 = ((<?=merc_attrib('INT', $merc->row()->Ability)?> * 100) + ( $(int).val() * 100 ))/100;
	var dex2 = ((<?=merc_attrib('DEX', $merc->row()->Ability)?> * 100) + ( $(dex).val() * 100 ))/100;
	var vit2 = ((<?=merc_attrib('VIT', $merc->row()->Ability)?> * 100) + ( $(vit).val() * 100 ))/100;
	var mana2 = ((<?=merc_attrib('MANA', $merc->row()->Ability)?> * 100) + ( $(mana).val() * 100 ))/100;

	var rpoint2 = ((<?=merc_attrib('POINTS', $merc->row()->Ability)?>*100 )/100 ) - ( ( ( $(str).val()*100 )/100 ) + ( ( $(int).val()*100 )/100 ) + ( ( $(dex).val()*100 )/100 ) + ( ( $(mana).val()*100 )/100 ) + ( ( $(vit).val()*100 )/100 ) );

	// attribute point
	if( str2 < 0 || str2 >= 65535 ){
		$(strpoint).text( str2.toFixed(0) ).css({"color": "red"});
	}else{
		$(strpoint).text( str2.toFixed(0) ).css({"color": "green"});
	}

	if( int2 < 0 || int2 >= 65535 ){
		$(intpoint).text( int2.toFixed(0) ).css({"color": "red"});
	}else{
		$(intpoint).text( int2.toFixed(0) ).css({"color": "green"});
	}

	if( dex2 < 0 || dex2 >= 65535 ){
		$(dexpoint).text( dex2.toFixed(0) ).css({"color": "red"});
	}else{
		$(dexpoint).text( dex2.toFixed(0) ).css({"color": "green"});
	}

	if( vit2 < 0 || vit2 >= 65535 ){
		$(vitpoint).text( vit2.toFixed(0) ).css({"color": "red"});
	}else{
		$(vitpoint).text( vit2.toFixed(0) ).css({"color": "green"});
	}

	if( mana2 < 0 || mana2 >= 65535 ){
		$(manapoint).text( mana2.toFixed(0) ).css({"color": "red"});
	}else{
		$(manapoint).text( mana2.toFixed(0) ).css({"color": "green"});
	}

	// remaining point
	if( rpoint2 < 0 || rpoint2 > <?=merc_attrib('POINTS', $merc->row()->Ability)?> ) {
		$(rpoint).text( rpoint2.toFixed(0) ).css({"color": "red"});
	} else {
		$(rpoint).text( rpoint2.toFixed(0) ).css({"color": "green"});
	}
	console.log(str2);
});

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