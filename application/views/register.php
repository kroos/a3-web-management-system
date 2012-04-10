<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Register Account</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?=form_open()?>
<p>Username : <?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('username')?></p>
<p>Password : <?=form_password(array('name' => 'password1', 'value' => set_value('password1'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('password1')?></p>
<p>Retype Password : <?=form_password(array('name' => 'password2', 'value' => set_value('password1'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('password2')?></p>
<p>Email : <?=form_input(array('name' => 'email', 'value' => set_value('email'), 'size' => '35'))?>&nbsp;&nbsp;&nbsp;<?=form_error('email')?></p>
<p>Image Verification <?=$cap['image']?> : <?=form_input(array('name' => 'verify', 'value' => set_value('verify'), 'maxlength' => '5', 'size' => '5'))?>&nbsp;&nbsp;&nbsp;<?=form_error('verify')?></p>
<p><?=form_submit('create_acc', 'Register')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>