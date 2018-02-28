<?php
extend('layout/main.php');

startblock('news');
?>
	<section class="mbr-section article content10 cid-qImEdhoUCY" id="content10-d">

		<div class="container">
			<div class="inner-container" style="width: 66%;">
				<hr class="line" style="width: 25%;">
				<div class="section-text align-center mbr-white mbr-fonts-style display-5">
					<h2 class="mbr-section-title align-center pb-3 mbr-white mbr-fonts-style display-2">Board Of Heroes</h2>
					<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?php if ($query->num_rows() < 1): ?>
	<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">There are none heroes at the moment</p>
<? else:?>

						<table id="table" class="table table-hover" width="100%">
							<thead>
								<th>Heroes</th>
								<th>Level</th>
								<th>Nation</th>
								<th>Rebirth Level</th>
								<th>Rank</th>
								<th>Date Login</th>
							</thead>
							<?php
							foreach ($query->result() as $rows)
								{
									$heroes2 = $rows->c_id;
									$level2 = $rows->c_sheaderc;
									$rblevel2 = $rows->rb;
									$timesrb2 = $rows->times_rb;
									$nat = $rows->Nation;
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
									if ($nat == 0) {
										$nati = 'Temoz';
									} else {
										$nati = 'Quanato';
									}
											echo "<tr>";
											echo "<td>$heroes2</td>";
											echo "<td>$level2</td>";
											echo "<td>$nati</td>";
											echo "<td>$rblevel2</td>";
											echo "<td>$rank2</td>";
											echo "<td>$date3</td>";
											echo "</tr>";
								};
							?>
							</table>
<?php endif ?>
				</div>
				<hr class="line" style="width: 25%;">
			</div>
		</div>
	</section>
<?php
endblock();

startblock('form');
endblock();

end_extend();
?>