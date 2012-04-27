<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Account Banning</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please NOTE : Don't use this tools if you are lagging cause you need to press the Submit Button only once, NOT twice due to lagging</p>
<p>Please be very careful on permanent account banning because you are deleting the whole account. Whatever the reason you mad at the player, i recommend you to just temporarily ban him</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>
<p>Ban Type : <?=form_dropdown('banning', array('' => '', '1' => 'Temporary', '2' => 'Permanent'))?>&nbsp;<?=form_error('banning')?></p>
<p><?=form_submit('ban_account', 'Ban Account')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>