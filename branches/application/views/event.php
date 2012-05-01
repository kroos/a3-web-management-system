<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Event</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?if($event->num_rows() < 1):?>
	<p>No news for event has been created</p>
<?else:?>
	<?foreach($event->result() as $events):?>
		<hr />
		<p><b><?=ucwords($events->Subject)?></b></p>
		<p><?=date_my($events->Date)?></p>
		<?=$events->HTML?>
		<p>Regards<br /><b><font color="#008080"><?=ucwords($events->Author)?></font></b></p>
		<hr />

		<?$r = $this->a3web_comment->reply($events->Bil)?>

		<?if($r->num_rows() < 1):?>
			<p>&nbsp;</p>
		<?else:?>

			<?foreach ($r->result() as $reply):?>
				<hr />
				<p>Reply from <font color="#008080"><?=ucwords($reply->author)?></font> on <?=date_my($reply->date)?></p>
				<?=$reply->html?>
				<hr />
			<?endforeach?>

		<?endif?>

	<?endforeach?>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>