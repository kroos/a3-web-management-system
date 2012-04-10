<?extend('template/base.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Board Of Heroes</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>
<table border="1" width="100%" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" style="border-collapse: collapse">
<tr>
<td align="center"><b><h5>Heroes</h5></b></td>
<td align="center"><b><h5>Level</h5></b></td>
<td align="center"><b><h5>Rebirth Level</h5></b></td>
<td align="center"><b><h5>Rank</h5></b></td>
<td align="center"><b><h5>Date Login</h5></b></td>
</tr>
<?php
foreach ($query->result() as $rows)
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
		//changing date to standard date
		/*$fld = $rs->FetchField(4);
		$type = $rs->MetaType($fld->type);

		if ( $type == 'D' || $type == 'T')
			{
				$date2=$rs->UserDate($rs->fields[4],'d-m-Y h:i:s');
			};*/
		echo "<tr>";
		echo "<td align=center>$heroes2</td>";
		echo "<td align=center>$level2</td>";
		echo "<td align=center>$rblevel2</td>";
		echo "<td align=center>$rank2</td>";
		echo "<td align=center>$date3</td>";
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