<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Learn Episode V Skill</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Choose your super super shue according to your character type</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<p><?=form_submit('gos_insert', 'Insert GOS')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>