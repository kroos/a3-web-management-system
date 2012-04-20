<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Edit News</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

		<table border="0" width="100%" cellspacing="2" cellpadding="2">
		<tr>
		<td>
		<?=form_open()?>
		<p align="center">Add your latest update in this form and then just submit.</p>
		<p align="center">Subject : <?=form_input(array('name' => 'subject', 'value' => $news->row()->Subject, 'maxlength' => '50', 'size' => '50'))?>&nbsp;<?=form_error('subject')?></p>
		<p align="center">
		<?=ckeditor('news_edit', $news->row()->HTML, $this->session->userdata('group'))?>&nbsp;<?=form_error('news_edit')?>
		</p>
		<p>Author</p>
		<?foreach($char->result() as $y):?>
		<p><?=form_radio('character', $y->c_id, set_select('character', $news->row()->Author, TRUE))?>&nbsp;&nbsp;<font color='#0000FF'><?=$y->c_id?></font>&nbsp;<?=form_error('character')?></p>
		<?endforeach?>
		<p align="center"><?=form_submit('news_edit_btn', 'Edit News')?></p>
		<?=form_close()?>
		</td>
		</tr>
		</table>


<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>