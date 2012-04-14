<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>

<?if($this->charac0->charac_cid($this->uri->segment(3, 0))->num_rows() == 1):?>
<h2>Edit <?=$char->row()->c_id?> Statistic Points</h2>
<?else:?>
<p>&nbsp;</p>
<?endif?>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please make sure that all the values will not exceed 65535</p>

<?if($this->charac0->charac_cid($this->uri->segment(3, 0))->num_rows() == 1):?>
<p>Remaining Points = <?=char_attrib('POINTS', $char->row()->c_headera)?></p>
<?else:?>
<p>&nbsp;</p>
<?endif?>

<?if($this->charac0->charac_cid($this->uri->segment(3, 0))->num_rows() == 1):?>
			<?=form_open()?>
			<?if($char->row()->c_sheaderb == 0 || $char->row()->c_sheaderb == 1 || $char->row()->c_sheaderb == 3):?>

			<p>Strength : <?=form_input(array('name' => 'str', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=char_attrib('STR', $char->row()->c_headera)?>&nbsp;<?=form_error('str')?>&nbsp;</p>
			<?=form_hidden('int', 0)?>
			<?else:?>
			<?=form_hidden('str', 0)?>
			<p>Intelligence : <?=form_input(array('name' => 'int', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=char_attrib('INT', $char->row()->c_headera)?>&nbsp;<?=form_error('int')?>&nbsp;</p>
			<?endif?>
			<p>Dexterity : <?=form_input(array('name' => 'dex', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=char_attrib('DEX', $char->row()->c_headera)?>&nbsp;<?=form_error('dex')?>&nbsp;</p>
			<p>Vitality : <?=form_input(array('name' => 'vit', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=char_attrib('VIT', $char->row()->c_headera)?>&nbsp;<?=form_error('vit')?>&nbsp;</p>
			<p>Mana : <?=form_input(array('name' => 'mana', 'value' => 0, 'maxlength' => '5', 'size' => '6'))?>&nbsp;<?=char_attrib('MANA', $char->row()->c_headera)?>&nbsp;<?=form_error('mana')?>&nbsp;</p>
			<p><?=form_submit('distrib_points', 'Distribute '.$char->row()->c_id.' Points')?></p>
			<?=form_close()?>
<?else:?>
<p>&nbsp;</p>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>