<?php
extend('layout/main.php');

startblock('news');
?>
	<section class="mbr-section article content10 cid-qImEdhoUCY" id="content10-d">

		<div class="container">
			<div class="inner-container" style="width: 66%;">
				<hr class="line" style="width: 25%;">
				<div class="section-text align-center mbr-white mbr-fonts-style display-5">


				<h2 class="mbr-section-title align-center pb-3 mbr-white mbr-fonts-style display-2">Download</h2>

				<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?php if($event->num_rows() < 1):?>
					<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">No download announcement has been created</p>
				<?php else:?>
					<?php foreach($event->result() as $newss):?>

						<hr class="line" />
						<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><b><?=ucwords($events->Subject)?></b></p>
						<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=date_my($events->Date)?></p>
						<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=$events->HTML?></p>
						<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">Regards<br /><b><font color="#008080"><?=ucwords($events->Author)?></font></b></p>
						<hr class="line" />

						<?php $r = $this->a3web_comment->reply($events->Bil)?>

						<?php if($r->num_rows() < 1):?>
							<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">&nbsp;</p>
						<?php else:?>

							<?php foreach ($r->result() as $reply):?>
								<hr class="line" />
								<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">Reply from <font color="#008080"><?=ucwords($reply->author)?></font> on <?=date_my($reply->date)?></p>
								<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=$reply->html?></p>
								<hr class="line" />
							<?php endforeach?>

						<?php endif?>

					<?php endforeach?>
				<?php endif?>

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