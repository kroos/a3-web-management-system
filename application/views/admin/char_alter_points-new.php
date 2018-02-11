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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Modifying Character Points</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">How to use this AMT?</h3>

				<ol class="list-group">
					<li class="list-group-item">key in the character name as you desire</li>
					<li class="list-group-item">then alter the points as you wish</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

				<p class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Searching Username by Character</p>

				<div class="form-group row">
					<?=form_label('Character : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input(array('name' => 'char', 'value' => set_value('char'), 'class' => 'form-control', 'id' => 'lp', 'placeholder' => 'Character'))?>
						<br />
						<?=form_error('char')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<!-- <button type="submit" class="btn btn-primary btn-form display-4">SEARCH</button> -->
							<?=form_submit('search', 'Search', 'class="btn btn-primary btn-form display-4"')?>
						</span>
					</div>
				</div>
				<?=form_close() ?>

<?php if(!$this->input->post('search', TRUE) || $this->form_validation->run() == FALSE || !isset($query->row()->c_id) ):?>
<?php else:?>
				<p class="mbr-text pb-3 mbr-fonts-style display-5">The username of <b><font color="#FF0000"><?=$query->row()->c_id?></font></b> is <b><font color="#FF0000"><?=$query->row()->c_sheadera?></font></b></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'), array('char' => $query->row()->c_id ))?>

				<p class="mbr-text pb-3 mbr-fonts-style display-5">This form is use to alter character statistic points</p>

<table class="table table-sm table-striped table-bordered">
	<tr>
		<th> <?=form_label(' Strength', 'str1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="str3"><?=char_attrib('STR', $query->row()->c_headera)?></span></td>
		<td>+</font></td>
		<td>
			<?=form_input('str', set_value('str'), array('class' => 'form-control', 'id' => 'str1', 'placeholder' => 'Strength') )?><?=form_error('str')?>
		</td>
		<td>=</td>
		<td><span id="str2"><?=@$str?></span></font></td>
	</tr>
	<tr>
		<th> <?=form_label(' Intelligence', 'int1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="int3"><?=char_attrib('INT', $query->row()->c_headera)?></span></td>
		<td>+</td>
		<td>
			<?=form_input('int', set_value('int'), array('class' => 'form-control', 'id' => 'int1', 'placeholder' => 'Intelligence') )?><?=form_error('int')?>
		</td>
		<td>=</td>
		<td><span id="int2"><?=@$int?></span></td>
	</tr>
	<tr>
		<th> <?=form_label(' Dexterity', 'dex1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="dex3"><?=char_attrib('DEX', $query->row()->c_headera)?></span></td>
		<td>+</td>
		<td>
			<?=form_input('dex', set_value('dex'), array('class' => 'form-control', 'id' => 'dex1', 'placeholder' => 'Dexterity') )?><?=form_error('dex')?>
		</td>
		<td>=</td>
		<td><span id="dex2"><?=@$dex?></span></td>
	</tr>
	<tr>
		<th> <?=form_label(' Vitality', 'vit1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="vit3"><?=char_attrib('VIT', $query->row()->c_headera)?></span></td>
		<td>+</td>
		<td>
			<?=form_input('vit', set_value('vit'), array('class' => 'form-control', 'id' => 'vit1', 'placeholder' => 'Vitality') )?><?=form_error('vit')?>
		</td>
		<td>=</td>
		<td><span id="vit2"><?=@$vit?></span></td>
	</tr>
	<tr>
		<th> <?=form_label(' Mana', 'mana1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="mana3"><?=char_attrib('MANA', $query->row()->c_headera)?></span></td>
		<td>+</td>
		<td>
			<?=form_input('mana', set_value('mana'), array('class' => 'form-control', 'id' => 'mana1', 'placeholder' => 'Mana') )?><?=form_error('mana')?>
		</td>
		<td>=</td>
		<td><span id="mana2"><?=@$mana?></span></td>
	</tr>
	<tr>
		<th> <?=form_label(' Points Remaining', 'prem1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="prem3"><?=char_attrib('POINTS', $query->row()->c_headera)?></span></td>
		<td>+</td>
		<td>
			<?=form_input('prem', set_value('prem'), array('class' => 'form-control', 'id' => 'prem1', 'placeholder' => 'Points Remaining') )?><?=form_error('prem')?>
		</td>
		<td>=</td>
		<td><span id="prem2"><?=@$prem?></span></td>
	</tr>
	<tr>
		<th> <?=form_label(' Wz', 'wz1', array('class' => 'col-form-label mbr-fonts-style display-7')) ?></th>
		<td><span id="wz3"><?=$query->row()->c_headerc?></span></td>
		<td>+</td>
		<td>
			<?=form_input('wz', set_value('wz'), array('class' => 'form-control', 'id' => 'wz1', 'placeholder' => 'Wz'))?><?=form_error('wz')?>
		</td>
		<td>=</td>
		<td><span id="wz2"><?=@$wz2?></span></td>
	</tr>
</table>
				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<?=form_submit('alter', 'Alter '.$query->row()->c_id, 'class="btn btn-primary btn-form display-4"')?>
						</span>
					</div>
				</div>

				<?=form_close() ?>
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
$(document).on('keyup', '#str1', function () {
	var str2 = $(this).parent().parent().children().children('#str2');
	var str3 = $('#str3');

	$(str2).text( (( $(str3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

$(document).on('keyup', '#int1', function () {
	var int2 = $(this).parent().parent().children().children('#int2');
	var int3 = $('#int3');

	$(int2).text( (( $(int3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

$(document).on('keyup', '#dex1', function () {
	var dex2 = $(this).parent().parent().children().children('#dex2');
	var dex3 = $('#dex3');

	$(dex2).text( (( $(dex3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

$(document).on('keyup', '#vit1', function () {
	var vit2 = $(this).parent().parent().children().children('#vit2');
	var vit3 = $('#vit3');

	$(vit2).text( (( $(vit3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

$(document).on('keyup', '#mana1', function () {
	var mana2 = $(this).parent().parent().children().children('#mana2');
	var mana3 = $('#mana3');

	$(mana2).text( (( $(mana3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

$(document).on('keyup', '#prem1', function () {
	var prem2 = $(this).parent().parent().children().children('#prem2');
	var prem3 = $('#prem3');

	$(prem2).text( (( $(prem3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

$(document).on('keyup', '#wz1', function () {
	var wz2 = $(this).parent().parent().children().children('#wz2');
	var wz3 = $('#wz3');

	$(wz2).text( (( $(wz3).text() * 100) + ( $(this).val() * 100 ))/100 ).css({"color": "green"});
});

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
		str: {
			validators: {
				notEmpty: {
					message: 'Please insert a number '
				},
				greaterThan: {
					value: 0,
					message: 'The value must be greater than or equal to 0 '
				}
			}
		},

	}
})


<?php
endblock();

end_extend();
?>