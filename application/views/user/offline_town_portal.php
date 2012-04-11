<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Offline Town Portal</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>This AMT is very useful when you found out that character is stuck somewhere in the maps. Just fill in the particular data and where you wish to teleport your character</p>

<?=form_open()?>
<?foreach($query->result() as $char):?>
<p><?=form_radio('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<p>Please select where you wish to be teleport to</p>
<p><?=form_radio('town', '1;32383')?>&nbsp;&nbsp;Temoz&nbsp;<?=form_error('town')?></p>
<p><?=form_radio('town', '7;18013')?>&nbsp;&nbsp;Quanato&nbsp;<?=form_error('town')?></p>
<p><?=form_submit('offline_tp', 'Teleport')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>