<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Mercenary Rebirth</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Make your mercenary more stronger by using this AMT. Same like you reset rebirth your character.To use this tools, you need at least <?php echo $this->config->item('mercwzreset'); ?> wz when your mercenary is level <?php echo $this->config->item('mercresetlvl'); ?> and this only applied if and only if your mercenary is at rebirth level <?php echo $this->config->item('mercrblevel'); ?> and your mercenary rank is not a 'Reaper'</p>

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
<p><?=form_submit('mercenary_reset_rebirth', 'Mercenary Reset Rebirth')?></p>
<?=form_close()?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>