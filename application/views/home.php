<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>News and Announcement</h2>
<?if($news->num_rows() == 0):?>
<p>No news or announcement has been created</p>
<?else:?>
<?foreach($news->result() as $newss):?>
<p><b><?=ucwords($newss->Subject)?></b></p>
<p><?=date_my($newss->Date)?></p>
<?=$newss->HTML?>
<p>Regards<br /><b><font color="#008080"><?=ucwords($newss->Author)?></font></b></p>
<?endforeach?>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>