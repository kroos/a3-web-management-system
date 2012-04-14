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
			
			<?if (char_attrib('POINTS', $char->c_headera) == 0):?>
			<p><?=$char->c_id?> dont have any point to distribute</p>
			<?else:?>
			<p>Remaining Points = <?=char_attrib('POINTS', $char->c_headera)?></p>
			<p><?=anchor('user/char_points/'.$char->c_id, 'Distribute '.$char->c_id.' Points')?></p>
			<?endif?>
			</div>
		<?endforeach?>
</div>

<?php endblock(); ?>













<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>