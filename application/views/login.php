<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Login</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?=form_open()?>
<p>Username : <?=form_input(array('name' => 'login', 'value' => set_value('login'), 'maxlength' => '12', 'size' => '12'))?>&nbsp;&nbsp;&nbsp;<?=form_error('login')?></p>
<p>Password : <?=form_password(array('name' => 'passwd', 'value' => set_value('passwd'), 'maxlength' => '10', 'size' => '12'))?>&nbsp;&nbsp;&nbsp;<?=form_error('passwd')?></p>
<p><?=form_submit('sign-in', 'Login')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>