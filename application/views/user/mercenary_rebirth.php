<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Mercenary Rebirth</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Here is how you should do to rebirth your mercenary. Click on ur hero then click on your mercenary corresponded to your character. Thats it.<br>Have fun tanking medusa with your mercenary!!</p>
		<table border="0" width="100%" style="border-collapse: collapse">
		<tr>
		<td align="center"><b>Rebirth</b></td>
		<td align="center"><b>Mercenary Level</b></td>
		<td align="center"><b>Wz Needed</b></td>
		</tr>															
		<?php
		for ($i = $this->config->item('merclvlrb'); $i <= 300; $i=$i+10)
			{
				$rbirthmerc = ($i - $this->config->item('merclvlrb')) / 10 ;
				$rbirthwz = $this->config->item('mercwzrb') * ($rbirthmerc);
				echo "<tr>";
				echo "<td align='center'>$rbirthmerc</td>";
				echo "<td align='center'>$i</td>";
				echo "<td align='center'>$rbirthwz wz</td>";
				echo "</tr>";
			};
		?>															
		</table>

<?=form_open()?>

<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Hero</td>
		<td>Mercenary</td>
	</tr>
	<?if($query->num_rows() == 0):?>
	<tr><td colspan="2">You did not yet created any character</td></tr>
	<?else:?>
		<?foreach ($query->result() as $char):?>
		<?$heroes1 = $char->c_id?>
	<tr>
		<td><?=form_radio('character', $heroes1)?>&nbsp;<font color='#0000FF'><?=$heroes1?></font>&nbsp;&nbsp;<?=form_error('character')?></td>
		<td>
		<table border="0" width="100%" style="border-collapse: collapse">
		<?if($this->hstable->hstable_merc($heroes1)->num_rows() == 0):?>
		<tr><td>You do not have any mercenary for <?=$heroes1?></td></tr>
		<?else:?>
				<?foreach($this->hstable->hstable_merc($heroes1)->result() as $merc):?>
				<?$merc1 = $merc->HSName?>
			<tr>
				<td><?=form_radio('merc', $merc->HSID)?>&nbsp;<font color='#0000FF'><?=$merc1?></font>&nbsp;&nbsp;<?=form_error('merc')?></td>
			</tr>
			<?endforeach?>
		<?endif?>
		</table>
		</td>
	</tr>
	<tr><td colspan="2"><hr></td></tr>
	<?endforeach?>
	<?endif?>
</table>
<p><?=form_submit('merc_rebirth', 'Mercenary Rebirth')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>