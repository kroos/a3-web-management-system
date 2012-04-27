<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>UnBan Account</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>You can use this tool if and only if you banned <b>temporarily</b> the character</p>
<p>Below is the list of banned <b>ACCOUNT</b></p>
<p>Click the link below to unban the account</p>
<?foreach($banned->result() as $b):?>
<p><?=anchor('/admin/unban/'.$b->c_id.'/'.$b->c_sheadera, 'Unban Account '.$b->c_id, array('title' => 'Unban Account '.$b->c_id))?></p>
<p>Time span this account have been banned : <?=timespan(mysql_to_unix($b->d_udate), now())?></p>
<hr>
<?endforeach?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>