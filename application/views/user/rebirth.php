<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Rebirth</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>For you to become stronger and stronger, i strongly recommend you to use this page</p>
		<table border="0" width="100%" style="border-collapse: collapse">
		<tr>
		<td align="center"><b>Rebirth</b></td>
		<td align="center"><b>Character Level</b></td>
		<td align="center"><b>Wz Needed</b></td>
		</tr>															
		<?php
		for ($i = $this->config->item('rebirth_level'); $i <= 165; $i++)
			{
				$rbirth = $i - $this->config->item('rebirth_level') + 1;
				$rbirthwz = $this->config->item('rebirth_wz') * ($rbirth - 1);
				echo "<tr><td align='center'>$rbirth</td>";
				echo "<td align='center'>$i</td>";
				echo "<td align='center'>$rbirthwz wz</td></tr>";
				//echo "<li>Rebirth = $rbirth , Character Level =  $i , Wz Needed = $rbirthwz wz.</li>";
			};
		?>															
		</table>
<?=form_open()?>
<?foreach($query->result() as $char):?>
<p><?=form_radio('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<p><?=form_submit('rebirth', 'Rebirth')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>