<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Edit Reply</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?$u = $this->charac0->charb($reply->author)?>

<?if ($u->row()->c_sheadera == $this->session->userdata('username') || $this->session->userdata('group') == 'GM'):?>
	<h2>Reply</h2>
	<?=form_open()?>
	<p><?=ckeditor('edit_news', $reply->html, $this->session->userdata('group'))?>&nbsp;<?=form_error('news_edit')?></p>
	<p><?=form_submit('news_edit', 'Edit Reply')?></p>
	<?=form_close()?>
<?else:?>
<p>Unauthorized Editing</p>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php endblock(); ?>

<?end_extend()?>