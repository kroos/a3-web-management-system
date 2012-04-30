<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Reset Rebirth</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>This is the same as player can reset rebirth their own char. All conditions for reset rebirth is still the same which means their woonz and rebirth level 15 (or 16...i cant remember... -.-&quot;) need to be met before this features can be used</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<p><?=form_submit('reset_rebith', 'Learn')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>