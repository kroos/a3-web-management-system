<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Inserting 1 Item In The Inventory</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please take note that all of these item are the GM items</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<?php
$item = array(
					'' => 'Please pick your choice',
					'1' => '-------------------------------------------------------------',
					'230513;4294953087;265751' => 'G8 Uni Warrior Sword',
					'230514;4294953215;265751' => 'G8 Uni Warrior Axe',
					'230515;4294953151;265751' => 'G8 Uni Warrior Spear',
					'230518;4294952319;265751' => 'G8 Uni HK Sword',
					'230519;4294952383;265751' => 'G8 Uni HK Mace',
					'230520;4294952511;527895' => 'G8 Uni Archer Bow',
					'230521;4294952575;265751' => 'G8 Uni Archer Cross Bow',
					'231540;4294953279;527895' => 'G8 Uni Mage Dex Staff',
					'231541;4294953663;658967' => 'G8 Uni Mage Intel Staff',
					'2' => '-------------------------------------------------------------',
					'230522;4294953087;396823' => 'G9 Uni Warrior Sword',
					'230523;4294953151;396823' => 'G9 Uni Warrior Axe',
					'230524;4294953215;396823' => 'G9 Uni Warrior Spear',
					'230527;4294952319;396823' => 'G9 Uni HK Sword',
					'230528;4294952383;396823' => 'G9 Uni HK Mace',
					'230529;4294952511;396823' => 'G9 Uni Archer Bow',
					'230530;4294952575;396823' => 'G9 Uni Archer Cross Bow',
					'231549;4294953279;790039' => 'G9 Uni Mage Dex Staff',
					'231550;4294953663;658967' => 'G9 Uni Mage Intel Staff',
					'3' => '-------------------------------------------------------------',
					'5176;4294961121;132404' => 'Redyan\'s Ring',
					'5178;4294961121;132404' => 'Kwaon\'s Ring',
					'5179;4294961121;132404' => 'Billmade\'s Ring',
					'5180;4294961121;132404' => 'Sirrd\'s Ring',
					'4' => '-------------------------------------------------------------',
					'5;99;123' => '99 Town Portal'
                );
?>

<p>Item : <?=form_dropdown('item', $item)?>&nbsp;<?=form_error('item')?></p>

<?php
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

<p>Slot : <?=form_dropdown('slot', $slot)?>&nbsp;<?=form_error('slot')?></p>

<p><?=form_submit('gm_items', 'Insert 1 Item In The Inventory')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>