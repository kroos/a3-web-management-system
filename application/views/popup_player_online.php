<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Player Online</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Total Player Online = <font color='#0000FF'><?=$query2->num_rows()?></font></p>

<table border="1" width="100%" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" style="border-collapse: collapse">
<tr>
<td width="20%" align="center"><b><h4>Heroes</h4></b></td>
<td width="20%" align="center"><b><h4>Level</h4></b></td>
<td width="20%" align="center"><b><h4>Rebirth Level</h4></b></td>
<td width="20%" align="center"><b><h4>Rank</h4></b></td>
<td width="20%" align="center"><b><h4>Date Login</h4></b></td>
</tr>
<?php
$color = 1;
foreach ($query2->result() as $rows)
	{
		$heroes2 = $rows->c_id;
		$level2 = $rows->c_sheaderc;
		$rblevel2 = $rows->rb;
		$timesrb2 = $rows->times_rb;
		$date2 = $rows->d_udate;
		$date3 = date_my ($date2);

		switch ($timesrb2)
			{
				case 0:
					$rank2 = 'Soldier';
					break;
				case 1:
					$rank2 = 'Knight';
					break;
				case 2:
					$rank2 = 'King';
					break;
				case 3:
					$rank2 = 'God';
					break;
			};
		if ($color == 1)
			{
				echo "<tr bgcolor='#C0C0C0'>";
				echo "<td width=20% align=center>$heroes2</td>";
				echo "<td width=20% align=center>$level2</td>";
				echo "<td width=20% align=center>$rblevel2</td>";
				echo "<td width=20% align=center>$rank2</td>";
				echo "<td width=20% align=center>$date3</td>";
				echo "</tr>";
				$color = 2;
			}
			else
			{
				echo "<tr bgcolor='#808080'>";
				echo "<td width=20% align=center>$heroes2</td>";
				echo "<td width=20% align=center>$level2</td>";
				echo "<td width=20% align=center>$rblevel2</td>";
				echo "<td width=20% align=center>$rank2</td>";
				echo "<td width=20% align=center>$date3</td>";
				echo "</tr>";
				$color = 1;
			};
	};
?>
</table>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>