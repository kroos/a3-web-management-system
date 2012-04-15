<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>

<?if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
<h2>Edit <?=$merc->row()->HSName?> Statistic Points</h2>
<?else:?>
<h2><?=$merc->row()->HSName?> does not have any point to distribute</h2>
<?endif?>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please make sure that all the values will not exceed 65535</p>

<?if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
<p>Remaining Points = <?=merc_attrib('POINTS', $merc->row()->Ability)?></p>
<?else:?>
<p>&nbsp;</p>
<?endif?>

<?if(merc_attrib('POINTS',  $merc->row()->Ability) != 0):?>
			<?=form_open()?>
			<?if($merc->row()->Type == 0 || $merc->row()->Type == 1 || $merc->row()->Type == 3):?>

			<p>Strength : <?=form_input(array('name' => 'str', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=merc_attrib('STR', $merc->row()->Ability)?>&nbsp;<?=form_error('str')?>&nbsp;</p>
			<?=form_hidden('int', 0)?>
			<?else:?>
			<?=form_hidden('str', 0)?>
			<p>Intelligence : <?=form_input(array('name' => 'int', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=merc_attrib('INT', $merc->row()->Ability)?>&nbsp;<?=form_error('int')?>&nbsp;</p>
			<?endif?>
			<p>Dexterity : <?=form_input(array('name' => 'dex', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=merc_attrib('DEX', $merc->row()->Ability)?>&nbsp;<?=form_error('dex')?>&nbsp;</p>
			<p>Vitality : <?=form_input(array('name' => 'vit', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=merc_attrib('VIT', $merc->row()->Ability)?>&nbsp;<?=form_error('vit')?>&nbsp;</p>
			<p>Mana : <?=form_input(array('name' => 'mana', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=merc_attrib('MANA', $merc->row()->Ability)?>&nbsp;<?=form_error('mana')?>&nbsp;</p>
			<p><?=form_submit('distrib_merc_points', 'Distribute '.$merc->row()->HSName.' Points')?></p>
			<?=form_close()?>
<?else:?>
<p>&nbsp;</p>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>