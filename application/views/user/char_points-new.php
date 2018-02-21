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
				<?php if($this->charac0->charac_cid($this->uri->segment(3, 0))->num_rows() == 1):?>
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit <?=$char->row()->c_id?> Statistic Points</h2>
				<?else:?>
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">&nbsp;</h2>
				<?php endif?>
				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please make sure that all the values will not exceed 65535</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">

				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>
				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

<?php if($this->charac0->charac_cid($this->uri->segment(3, 0))->num_rows() == 1):?>
<p class="mbr-text pb-3 mbr-fonts-style display-5" >Remaining Points = <span id="rpoint"><?=char_attrib('POINTS', $char->row()->c_headera)?></span></p>
<?php endif?>


<?php if($this->charac0->charac_cid($this->uri->segment(3, 0))->num_rows() == 1):?>

	<?php if($char->row()->c_sheaderb == 0 || $char->row()->c_sheaderb == 1 || $char->row()->c_sheaderb == 3):?>

					<div class="form-group row">
						<?=form_label('Strength : ', 'str1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?//=form_hidden('int', 0, 'class="int1"')?>
							<input name="int" value="0" id="int1" type="hidden">
							<?=form_input(array('name' => 'str', 'value' => set_value('str'), 'class' => 'form-control', 'id' => 'str1', 'placeholder' => 'Strength'))?>
							<br />
							<?=form_error('str')?>
						</div>
						<div class="col-sm-2" id="strpoint">
							<?=char_attrib('STR', $char->row()->c_headera)?>
						</div>
					</div>
	<?php else:?>
					<div class="form-group row">
						<?=form_label('Intelligence : ', 'int1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-8">
							<?//=form_hidden('str', 0)?>
							<input name="str" value="0" id="str1" type="hidden">
							<?=form_input(array('name' => 'int', 'value' => set_value('int'), 'class' => 'form-control', 'id' => 'int1', 'placeholder' => 'Intelligence'))?>
							<br />
							<?=form_error('int')?>
						</div>
						<div class="col-sm-2" id="intpoint">
							<?=char_attrib('INT', $char->row()->c_headera)?>
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
							<?=char_attrib('DEX', $char->row()->c_headera)?>
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
							<?=char_attrib('VIT', $char->row()->c_headera)?>
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
								<?=char_attrib('MANA', $char->row()->c_headera)?>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary btn-form display-4">Distribute <?=$char->row()->c_id ?> Points</button>
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

	var str2 = ((<?=char_attrib('STR', $char->row()->c_headera)?> * 100) + ( $(str).val() * 100 ))/100;
	var int2 = ((<?=char_attrib('INT', $char->row()->c_headera)?> * 100) + ( $(int).val() * 100 ))/100;
	var dex2 = ((<?=char_attrib('DEX', $char->row()->c_headera)?> * 100) + ( $(dex).val() * 100 ))/100;
	var vit2 = ((<?=char_attrib('VIT', $char->row()->c_headera)?> * 100) + ( $(vit).val() * 100 ))/100;
	var mana2 = ((<?=char_attrib('MANA', $char->row()->c_headera)?> * 100) + ( $(mana).val() * 100 ))/100;

	var rpoint2 = ((<?=char_attrib('POINTS', $char->row()->c_headera)?>*100 )/100 ) - ( ( ( $(str).val()*100 )/100 ) + ( ( $(int).val()*100 )/100 ) + ( ( $(dex).val()*100 )/100 ) + ( ( $(mana).val()*100 )/100 ) + ( ( $(vit).val()*100 )/100 ) );

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
	if( rpoint2 < 0 || rpoint2 > <?=char_attrib('POINTS', $char->row()->c_headera)?> ) {
		$(rpoint).text( rpoint2.toFixed(0) ).css({"color": "red"});
	} else {
		$(rpoint).text( rpoint2.toFixed(0) ).css({"color": "green"});
	}

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

////////////////////////////////////////////////////////////////////////////////////
<?php
endblock();

end_extend();
?>