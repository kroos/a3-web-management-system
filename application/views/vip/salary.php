<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Claim Salary</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please choose which character will be inserted with the salary</p>

<?=form_open()?>
<?foreach($query->result() as $char):?>
<p><?=form_radio('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<p><?=form_submit('claim_salary', 'Claim Salary')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>