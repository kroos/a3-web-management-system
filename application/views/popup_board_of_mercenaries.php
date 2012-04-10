<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Board Of Mercenaries</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<table border="1" width="100%" class="formpopup" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" style="border-collapse: collapse">
<tr>
<td align="center"><b><h4>Heroes</h4></b></td>
<td align="center"><b><h4>Mercenary</h4></b></td>
<td align="center"><b><h4>Level</h4></b></td>
<td align="center"><b><h4>Rebirth Level</h4></b></td>
<td align="center"><b><h4>Rank</h4></b></td>
</tr>
<?php
foreach ($query->result() as $rows)
	{
		$heroes3 = $rows->MasterName;
		$level3 = $rows->HSName;
		$rblevel3 = $rows->HSLevel;
		$date3 = $rows->rb;
		$timesrb3 = $rows->reset_rb;
		switch ($timesrb3)
			{
				case '0':
				$rank3 = 'Mercenary';
				break;

				case '1':
				$rank3 = 'Rogue';
				break;

				case '2':
				$rank3 = 'Fighter';
				break;

				case '3':
				$rank3 = 'Killer';
				break;

				case '4':
				$rank3 = 'Assasin';
				break;

				case '5':
				$rank3 = 'Hitman';
				break;

				case '6':
				$rank3 = 'Reaper';
				break;
			};

		echo "<tr>";
		echo "<td width=20% align=center>$heroes3</td>";
		echo "<td width=20% align=center>$level3</td>";
		echo "<td width=20% align=center>$rblevel3</td>";
		echo "<td width=20% align=center>$date3</td>";
		echo "<td width=20% align=center>$rank3</td>";
		echo "</tr>";
	};
?>

</table>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>