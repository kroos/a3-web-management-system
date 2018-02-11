<?php
extend('layout/main.php');

startblock('news');
?>

	<section class="mbr-section article content10 cid-qImEdhoUCY" id="content10-d">

		<div class="container">
			<div class="inner-container" style="width: 66%;">
				<hr class="line" style="width: 25%;">
				<div class="section-text align-center mbr-white mbr-fonts-style display-5">
					<h2 class="mbr-section-title align-center pb-3 mbr-white mbr-fonts-style display-2">Activate Account</h2>

					<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>
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