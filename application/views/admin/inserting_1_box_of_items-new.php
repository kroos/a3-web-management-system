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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Inserting 1 Box Of Items In The Inventory</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Choose which item you want and don't forget to put character name</h3>
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
$options = array(
					'' => 'All of this items are in 1 box',
					'Upgrade Item' => array(
						'4544' => 'Upgrade Jewel',
						'4545' => 'Degrade Jewel',
						'5570' => 'Small Master Stone',
						'5571' => 'Large Master Stone',
						'5795' => 'Small Juego',
						'5796' => 'Large Juego',
					),
					'Gems' => array(
						'6596' => 'Topaz',
						'6597' => 'Ruby',
						'6598' => 'Sapphire',
					),
					'Gems' => array(
						'6815' => 'Garnet',
						'6816' => 'Opal',
						'6817' => 'Peridot',
					),
					'Runes' => array(
						'7631' => 'Ing (9)',
						'7632' => 'Odal (10)',
					),
					'Eutuxias' => array(
						'7842' => 'Eutuxia',
					),
					'Stabiliser' => array(
						'7958' => 'Catalyst',
						'7959' => 'Stabilizer',
					),
					'Crystals' => array(
						'7960' => 'Shuterburr Crystal',
						'7961' => 'Kardite Crystal',
						'7962' => 'Syldinon Crystal',
						'7963' => 'Kardion Crystal',
					),
					'Crafting Items' => array(
						'7966' => 'Secret of Manufacturing',
						'7967' => 'Sap of Silbadu',
						'7968' => 'Silbadu Branch',
						'8074' => 'Root of Shilbadu',
					),
					'High Grade Craft Item' => array(
						'7977' => 'Aiigis',
						'7978' => 'Drapurr',
						'7979' => 'Kartas',
						'8073' => 'Kripis',
					),
					'Orb of Magic' => array(
						'8070' => 'Orb of Magic',
					),
					'Higher Grade Crafting Item' => array(
						'8099' => 'Stone Of Hope',
						'6049' => 'Treasure Of Destruction',
					),
					'Highest Grade Crafting Item' => array(
						'7982' => 'Paranum',
						'7983' => 'Satinum',
						'7984' => 'Crystal of Brilliance',
						'7985' => 'Crystal of Stability',
					),
					'Unique Craft Items' => array(
						'8093' => 'Decision to Upgrade',
						'8094' => 'Decision to Extreme',
						'8095' => 'Soul Of Silbadu',
					)
				);


$slot = array(
					'' => 'Choose character slot',
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
					'19' => 'Slot 20'
			);
?>

				<div class="form-group row">
					<?=form_label('Choose a box of item : ', 'lp1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('item', $options, set_select('item'), array('id' => 'lp1', 'class' => 'form-control', 'placeholder' => 'Please choose an option'))?>
						<br />
						<?=form_error('item')?>
					</div>
				</div>

				<div class="form-group row">
					<?=form_label('Inventory Slot : ', 'lp2', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_dropdown('slot', $slot, set_select('slot'), array('id' => 'lp2', 'class' => 'form-control', 'placeholder' => 'Please choose an option'))?>
						<br />
						<?=form_error('slot')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">INSERT A BOX OF ITEM</button>
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
					message: 'Choose slot to be inserted to '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>