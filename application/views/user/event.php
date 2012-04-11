<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Event</h2>
<?if($event->num_rows() == 0):?>
<p>No news for event has been created</p>
<?else:?>
<?foreach($event->result() as $events):?>
<p><b><?=ucwords($events->Subject)?></b></p>
<p><?=date_my($events->Date)?></p>
<?=$events->HTML?>
<p>Regards<br /><b><font color="#008080"><?=ucwords($events->Author)?></font></b></p>
<p><?=anchor('user/comment/'.$events->Bil, 'Comment', array('title' => 'Comment'))?></p>
<hr>
<?endforeach?>
<?endif?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>