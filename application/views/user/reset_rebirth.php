<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Reset Rebirth</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Ever wonder how does it feel to have the power of A3 God? PK-ing any character with 1 blow? Then take this rebirth reset. You can have this reset if and only if your rebirth is level <?=$this->config->item('rebirth_count')?> and you have <?=$this->config->item('wzresetrebirth')?> wz. Too expensive?<br>Its worth it!!!</p>

<?=form_open()?>
<?foreach($query->result() as $char):?>
<p><?=form_radio('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<p><?=form_submit('reset_rebirth', 'Reset Rebirth')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>