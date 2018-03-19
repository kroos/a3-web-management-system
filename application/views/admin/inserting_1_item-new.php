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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Inserting 1 Item In The Inventory</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please take note that all of these item are the GM items</h3>
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

<?php
$item = array(
					'' => 'Please pick your choice',
					'G8 Unique Equipments' => array(
						'230513;4294953087;265751' => 'G8 Uni Warrior Sword',
						'230514;4294953215;265751' => 'G8 Uni Warrior Axe',
						'230515;4294953151;265751' => 'G8 Uni Warrior Spear',
						'230518;4294952319;265751' => 'G8 Uni HK Sword',
						'230519;4294952383;265751' => 'G8 Uni HK Mace',
						'230520;4294952511;527895' => 'G8 Uni Archer Bow',
						'230521;4294952575;265751' => 'G8 Uni Archer Cross Bow',
						'231540;4294953279;527895' => 'G8 Uni Mage Dex Staff',
						'231541;4294953663;658967' => 'G8 Uni Mage Intel Staff',
					),
					'G9 Unique Equipments' => array(
						'230522;4294953087;396823' => 'G9 Uni Warrior Sword',
						'230523;4294953151;396823' => 'G9 Uni Warrior Axe',
						'230524;4294953215;396823' => 'G9 Uni Warrior Spear',
						'230527;4294952319;396823' => 'G9 Uni HK Sword',
						'230528;4294952383;396823' => 'G9 Uni HK Mace',
						'230529;4294952511;396823' => 'G9 Uni Archer Bow',
						'230530;4294952575;396823' => 'G9 Uni Archer Cross Bow',
						'231549;4294953279;790039' => 'G9 Uni Mage Dex Staff',
						'231550;4294953663;658967' => 'G9 Uni Mage Intel Staff',
					),
					'Unique Accessories' => array(
						'5176;4294961121;132404' => 'Redyan\'s Ring',
						'5178;4294961121;132404' => 'Kwaon\'s Ring',
						'5179;4294961121;132404' => 'Billmade\'s Ring',
						'5180;4294961121;132404' => 'Sirrd\'s Ring',
					),
					'Town Portal' => array(
						'5;99;123' => '99 Town Portal'
					),
			);

$slot = array(
					'' => 'Please select slot',
					'0' => 'Slot 1',
					'1' => 'Slot 2',
					'2' => 'Slot 3',
					'3' => 'Slot 4',
					'4' => 'Slot 5',
					'5' => 'Slot 6',
					'6' => 'Slot 7',
					'7' => 'Slot 8',
					'8' => 'Slot 9',
					'9' => 'Slot 10',
					'10' => 'Slot 11',
					'11' => 'Slot 12',
					'12' => 'Slot 13',
					'13' => 'Slot 14',
					'14' => 'Slot 15',
					'15' => 'Slot 16',
					'16' => 'Slot 17',
					'17' => 'Slot 18',
					'18' => 'Slot 19',
					'19' => 'Slot 20',
					'20' => 'Slot 21',
					'21' => 'Slot 22',
					'22' => 'Slot 23',
					'23' => 'Slot 24',
					'24' => 'Slot 25'
                );
?>

				<div class="form-group row">
					<?=form_label('Item : ', 'lp1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('item', $item, set_select('item'), array('id' => 'lp1', 'class' => 'form-control', 'placeholder' => 'Please choose option'))?>
						<br />
						<?=form_error('item')?>
					</div>
				</div>

				<div class="form-group row">
					<?=form_label('Slot : ', 'lp2', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('slot', $slot, set_select('slot'), array('id' => 'lp2', 'class' => 'form-control', 'placeholder' => 'Please choose option'))?>
						<br />
						<?=form_error('slot')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">PAID MEMBERSHIP</button>
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
		item: {
			validators: {
				notEmpty: {
					message: 'Please choose item '
				},
			}
		},
		slot: {
			validators: {
				notEmpty: {
					message: 'Choose slot '
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