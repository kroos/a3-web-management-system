<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Paid Membership</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Change account type To Paid Membership</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>
<p>Type Of Membership : <?=form_dropdown('paid', array('' => '', 'BM' => $this->config->item('BM'), 'SM' => $this->config->item('SM'), 'GoldM' => $this->config->item('GoldM')))?>&nbsp;<?=form_error('paid')?></p>
<p>Month : <?=form_input(array('name' => 'month', 'value' => set_value('month'), 'maxlength' => '2', 'size' => '3'))?>&nbsp;<?=form_error('month')?></p>
<p><?=form_submit('vip', 'Paid Membership')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>