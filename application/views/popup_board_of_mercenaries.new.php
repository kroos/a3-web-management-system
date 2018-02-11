<?php
extend('layout/main.php');

startblock('news');
?>
	<section class="mbr-section article content10 cid-qImEdhoUCY" id="content10-d">

		<div class="container">
			<div class="inner-container" style="width: 66%;">
				<hr class="line" style="width: 25%;">
				<div class="section-text align-center mbr-white mbr-fonts-style display-5">
					<h2 class="mbr-section-title align-center pb-3 mbr-white mbr-fonts-style display-2">Board Of Mercenaries</h2>
					<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?php if ($query->num_rows() < 1): ?>
	<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">There are none mercenaries at the moment</p>
<? else:?>

						<table id="table" class="table table-hover" width="100%">
							<thead>
								<th>Hero</th>
								<th>Mercenary</th>
								<th>Level</th>
								<th>Rebirth Level</th>
								<th>Rank</th>
							</thead>
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
										echo "<td>$heroes3</td>";
										echo "<td>$level3</td>";
										echo "<td>$rblevel3</td>";
										echo "<td>$date3</td>";
										echo "<td>$rank3</td>";
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