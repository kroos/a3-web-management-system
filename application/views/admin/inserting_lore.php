<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Inserting Lore</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please take note that only level 100 n 165 is available</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>


<p>Lore : <?=form_input(array('name' => 'lore', 'value' => set_value('lore'), 'size' => 15))?>&nbsp;<?=form_error('lore')?></p>

<p><?=form_submit('insertlore', 'Insert Lore')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>