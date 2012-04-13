<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>

		<!-- Embedded Mootools Core und More -->
		<script src="<?=base_url()?>js/mootools-core.js" type="text/javascript"></script>
		<script src="<?=base_url()?>js/mootools-more.js" type="text/javascript"></script>
		<!-- Source: -->
		<script type="text/javascript" src="<?=base_url()?>js/dialog.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/demo.js"></script>

<h2>Edit Hero Statistic Points</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please click on your hero below where you wanna add your stat points</p>

		<div class="sa_demo_contentScreen">
			<input class='button' id="dialogDemo" type="button" value="trigger Dialog" role="button"/>
		</div>
<?foreach($query->result() as $char):?>
<p><?=anchor('character', $char->c_id)?>&nbsp;&nbsp;<font color='#0000FF'><?=$char->c_id?></font>&nbsp;<?=form_error('character')?></p>
<?endforeach?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>