<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>


<h2>Edit Hero Statistic Points</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please click on your hero below where you wanna add your stat points</p>

	<script src="<?=base_url()?>js/ui/jquery.ui.core.js"></script>
	<script src="<?=base_url()?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?=base_url()?>js/ui/jquery.ui.accordion.js"></script>

	<script>
	$(function() {
		$( "#accordion" ).accordion();
	});
	</script>
<div id="accordion">
		<?foreach($query->result() as $char):?>
			<h3><a href="#"><?=$char->c_id?></a></h3>
			<div>
			<p>Your <?=$char->c_id?> is a <?=char_type($char->c_sheaderb)?></p>
		<table border="0" width="100%" style="border-collapse: collapse">
		<?if($this->hstable->hstable_merc($char->c_id)->num_rows() == 0):?>
		<tr><td>You do not have any mercenary for <?=$char->c_id?></td></tr>
		<?else:?>
				<?foreach($this->hstable->hstable_merc($char->c_id)->result() as $merc):?>
				<?$merc1 = $merc->HSName?>
			<tr>
				<td><?=$char->c_id?> mercenary : <?=anchor('user/merc_points/'.$merc->HSID, $merc1)?></td>
			</tr>
			<?endforeach?>
		<?endif?>
		</table>
			</div>
		<?endforeach?>
</div>

<?php endblock(); ?>













<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>