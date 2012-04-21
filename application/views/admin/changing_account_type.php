<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Changing Account Type</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Use this tools to upgrade user account to Game Master or normal user.</p>
<p>They can access this section (GM Tools) by just changing his/her account to "Game Master" by using this tool.</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'maxlength' => '10', 'size' => '10'))?>&nbsp;<?=form_error('char')?></p>

<p>Account Type : <?=form_dropdown('acc', array(''=> '', 'Normal' => 'Normal', 'GM' => 'Game Master'), '')?>&nbsp;<?=form_error('acc')?></p>

<p><?=form_submit('submit', 'Change Account')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>