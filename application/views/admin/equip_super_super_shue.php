<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Equip Super Super Shue</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Choose your super super shue according to your character type</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<?php
$options = array(
					'' => 'Please select shue aaccording to the character',
					'1012;76684069;4290773247;4293968751' => 'Warrior Super Super Shue',
					'1013;76290853;4290773247;4294155503' => 'Holy Knight Super Super Shue',
					'1015;76028709;4290773247;4294160367' => 'Archer Super Super Shue',
					'1014;75897637;4290773247;4293970555' => 'Mage Super Super Shue',
                );
?>


<p>Super super shue : <?=form_dropdown('sss', $options, set_select('sss', '', TRUE))?>&nbsp;<?=form_error('sss')?></p>
<p><?=form_submit('putsss', 'Insert Super Super Shue')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>