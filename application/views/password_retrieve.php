<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Retrieve Password</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?=form_open()?>
<p>Username : <?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('username')?></p>
<p>Email : <?=form_input(array('name' => 'email', 'value' => set_value('email'), 'size' => '35'))?>&nbsp;&nbsp;&nbsp;<?=form_error('email')?></p>
<p><?=form_submit('forgot_password', 'Get Password')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>