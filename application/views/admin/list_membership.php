<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>List Of Membership</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<table border="0" width="100%" style="border-collapse: collapse">
<tr>
<td align="center" width="25%">Username</td>
<td align="center" width="25%">Status Account</td>
<td align="center" width="25%">Salary Taken</td>
<td align="center" width="25%">Membership Expire</td>
</tr>
<?foreach($query->result() as $a):?>
<?php
$salary = date_my($a->salary);
$last_salary = date_my($a->last_salary);
		switch ($a->c_sheaderc)
			{
				case 'SM':
					$c_sheaderc1 = $this->config->item('SM');
				break;
				case 'BM':
					$c_sheaderc1 = $this->config->item('BM');
				break;
				case 'GoldM':
					$c_sheaderc1 = $this->config->item('GoldM');
				break;
				};
?>
		<tr>
		<td align="center" width="25%"><?=$a->c_id?></td>
		<td align="center" width="25%"><?=$c_sheaderc1?></td>
		<td align="center" width="25%"><?=$salary?></td>
		<td align="center" width="25%"><?=$last_salary?></td>
		</tr>
<?endforeach?>
</table>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>