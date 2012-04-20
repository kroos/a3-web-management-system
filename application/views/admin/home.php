<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>News and Announcement Editing</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

		<table border="0" width="100%" cellspacing="2" cellpadding="2">
		<tr>
		<td>
		<?=form_open()?>
		<p align="center">Add your latest update in this form and then just submit.</p>
		<p align="center">Subject : <?=form_input(array('name' => 'subject', 'value' => set_value('subject'), 'maxlength' => '50', 'size' => '50'))?>&nbsp;<?=form_error('subject')?></p>
		<p align="center">
		<?=ckeditor('news_add', '', $this->session->userdata('group'))?>&nbsp;<?=form_error('news_add')?>
		</p>
		<p>Author</p>
		<?foreach($char->result() as $y):?>
		<p><?=form_radio('character', $y->c_id, set_select('character', $y->c_id, TRUE))?>&nbsp;&nbsp;<font color='#0000FF'><?=$y->c_id?></font>&nbsp;<?=form_error('character')?></p>
		<?endforeach?>
		<p align="center"><?=form_submit('add_news', 'Add News')?></p>
		<?=form_close()?>
		<table border="1" width="100%" cellspacing="2" cellpadding="2" style="border-collapse: collapse">
		<tr>
		<td>Bil</td>
		<td>Author</td>
		<td>Date News</td>
		<td>Subject</td>
		<td>News</td>
		<td width="7%">Edit</td>
		<td width="7%">Delete</td>
		</tr>
			<?foreach($news->result() as $t):?>
				<tr>
				<td><?=$t->Bil?></td>
				<td><?=$t->Author?></td>
				<td><?=date_my($t->Date)?></td>
				<td><?=$t->Subject?></td>
				<td><?=$t->HTML?></td>
				<td><?=anchor('admin/news_edit/'.$t->Bil, 'EDIT', 'title = "EDIT NEWS '.$t->Bil.'"')?></td>
				<td><?=anchor('admin/news_del/'.$t->Bil, 'DELETE', 'title = "DELETE NEWS '.$t->Bil.'"')?></td>
				</tr>
			<?endforeach?>
		</table>
		</td>
		</tr>
		</table>


<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>