<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Inserting 1 Box Of Items In The Inventory</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Choose which item you want and don't forget to put character name</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<?php
$options = array(
					'' => 'All of this items are in 1 box',
					'2' => '-------------------------------------------------------------',
					'4544' => 'Upgrade Jewel',
					'4545' => 'Degrade Jewel',
					'5570' => 'Small Master Stone',
					'5571' => 'Large Master Stone',
					'5795' => 'Small Juego',
					'5796' => 'Large Juego',
					'3' => '-------------------------------------------------------------',
					'6596' => 'Topaz',
					'6597' => 'Ruby',
					'6598' => 'Sapphire',
					'4' => '-------------------------------------------------------------',
					'6815' => 'Garnet',
					'6816' => 'Opal',
					'6817' => 'Peridot',
					'5' => '-------------------------------------------------------------',
					'7631' => 'Ing (9)',
					'7632' => 'Odal (10)',
					'6' => '-------------------------------------------------------------',
					'7842' => 'Eutuxia',
					'7' => '-------------------------------------------------------------',
					'7958' => 'Catalyst',
					'7959' => 'Stabilizer',
					'8' => '-------------------------------------------------------------',
					'7960' => 'Shuterburr Crystal',
					'7961' => 'Kardite Crystal',
					'7962' => 'Syldinon Crystal',
					'7963' => 'Kardion Crystal',
					'9' => '-------------------------------------------------------------',
					'7966' => 'Secret of Manufacturing',
					'7967' => 'Sap of Silbadu',
					'7968' => 'Silbadu Branch',
					'8074' => 'Root of Shilbadu',
					'0' => '-------------------------------------------------------------',
					'7977' => 'Aiigis',
					'7978' => 'Drapurr',
					'7979' => 'Kartas',
					'8073' => 'Kripis',
					'11' => '-------------------------------------------------------------',
					'8070' => 'Orb of Magic',
					'12' => '-------------------------------------------------------------',
					'8099' => 'Stone Of Hope',
					'6049' => 'Treasure Of Destruction',
					'13' => '-------------------------------------------------------------',
					'7982' => 'Paranum',
					'7983' => 'Satinum',
					'7984' => 'Crystal of Brilliance',
					'7985' => 'Crystal of Stability',
					'14' => '-------------------------------------------------------------',
					'8093' => 'Decision to Upgrade',
					'8094' => 'Decision to Extreme',
					'8095' => 'Soul Of Silbadu'
                );
?>

<p>Choose a box of item : <?=form_dropdown('item', $options, set_select('item', '', TRUE))?>&nbsp;<?=form_error('item')?></p>

<?php
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

<p>Inventory Slot : <?=form_dropdown('slot', $slot, set_select('slot', '', TRUE))?>&nbsp;<?=form_error('slot')?></p>
<p><?=form_submit('item_inv', 'Insert A Box Of Item')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>