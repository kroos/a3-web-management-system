<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Buy Lore</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>For each lore you buy, it will cost you <?=$this->config->item('buy_lore')?> wz so if you buy 1,000 lore it will cost <?php echo $lore1=$this->config->item('buy_lore') * 1000; ?> wz. You can use this AMT if and only if your rebirth level is greater or equal than <?=$this->config->item('lore_rb_buy')?>.<br />Summary :<br />Your rebirth level >= <?=$this->config->item('lore_rb_buy')?><br />1 lore = <?=$this->config->item('buy_lore')?> wz</p>

<?=form_open()?>
<?foreach($query->result() as $char):?>
<p><?=form_radio('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<p>&nbsp;</p>
<p>Lore Points : <?=form_input(array('name' => 'lore', 'value' => set_value('lore'), 'maxlength' => '8', 'size' => '8'))?>&nbsp;<?=form_error('lore')?></p>
<p><?=form_submit('buy_lore', 'Buy Lore')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>