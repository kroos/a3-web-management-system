<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Guild Removal</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>This will remove guild or knighthood from the character</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<p><?=form_submit('removeguild', 'Remove Guild')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>