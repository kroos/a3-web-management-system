<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Change Password</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please insert the following information to change your password</p>

<?=form_open()?>
<p>Username : <?=$this->session->userdata('username')?></p>
<p>Old Password : <?=form_password(array('name' => 'old_password', 'value' => set_value('old_password'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('old_password')?></p>
<p>Password : <?=form_password(array('name' => 'password1', 'value' => set_value('password1'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('password1')?></p>
<p>Retype Password : <?=form_password(array('name' => 'password2', 'value' => set_value('password2'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;&nbsp;&nbsp;<?=form_error('password2')?></p>
<p><?=form_submit('change_password', 'Submit')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>