<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Player Kill Info</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Insert character to see the PK Info</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>

<p><?=form_submit('info_pk', 'PK Info')?></p>
<?=form_close()?>

<?if ($this->form_validation->run() == FALSE):?>

<?else:?>
<p><B><?=$h->row()->c_id?></B> pking people for <b><?=mbody_part('PK', $h->row()->m_body)?></b> times.</p>
<p>And timer before <?=$h->row()->c_id?> can PK again is = <b><?=mbody_part('RTM', $h->row()->m_body)?></b></p>
<p>If the timer is 0, <?=$h->row()->c_id?> can PK at anytime it want and if you don't want <?=$h->row()->c_id?> to PK, set it timer more than 1,500 or higher, for example : maybe 20,000 ?</p>
<p>If you set to only 1,500, <?=$h->row()->c_id?> can bail out the timer by using its lore.</p>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>