<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Modify Player Kill Timer</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Insert character and the timer</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>
<p>Timer : <?=form_input(array('name' => 'timer', 'value' => set_value('timer'), 'size' => 20))?>&nbsp;<?=form_error('timer')?></p>
<p><?=form_submit('pk_timer', 'PK Timer')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>