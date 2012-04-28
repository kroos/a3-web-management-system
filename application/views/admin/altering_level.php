<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Altering Level</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please take note that only level 100 n 165 is available</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<?php
$options = array(
					'' => 'Please select level',
					'147024900' => 'Level 100',
					'4220806300' => 'Level 165',
                );
?>

<p>Level : <?=form_dropdown('level', $options)?>&nbsp;<?=form_error('level')?></p>

<p><?=form_submit('charlvl', 'Alter Level')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>