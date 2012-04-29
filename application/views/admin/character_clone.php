<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Character Clone</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>This option will clone any character for whatever reason you may have</p>
<?=form_open()?>
<p>Please insert the character name that you want to clone : <?=form_input(array('name' => 'char1', 'value' => set_value('char1'), 'size' => 20))?>&nbsp;<?=form_error('char1')?></p>
<p>Please insert the character name that you want to restore : <?=form_input(array('name' => 'char2', 'value' => set_value('char2'), 'size' => 20))?>&nbsp;<?=form_error('char2')?></p>

<p><?=form_submit('clone', 'Character Clone')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>