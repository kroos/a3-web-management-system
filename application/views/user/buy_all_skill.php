<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Buy All Skill</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>You need more skill to perfect your training? Then you must have <?=$this->config->item('skillwz')?> wz in your inventory and level <?=$this->config->item('skilllvl')?> or higher</p>

<?=form_open()?>
<?foreach($query->result() as $char):?>
<p><?=form_radio('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<p><?=form_submit('buy_skill', 'Buy Skill')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>