<?php
extend('layout/user.php');

startblock('news');
endblock();


startblock('form');
?>

	<section class="mbr-section cid-qIbsf3xlXN">

		<div class="container">
			<div class="row justify-content-center">
				<div class="title col-12 col-lg-8">
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Mercenary Rebirth</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Here is how you should do to rebirth your mercenary. Click on your hero then click on your mercenary corresponded to your character. Thats it.<br>Have fun tanking medusa with your mercenary!!</h3>
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th scope="col">Rebirth</th>
								<th scope="col">Mercenary Level</th>
								<th scope="col">Wz Needed</th>
							</tr>
						</thead>
		<?php
		for ($i = $this->config->item('merclvlrb'); $i <= 300; $i=$i+10)
			{
				$rbirthmerc = ($i - $this->config->item('merclvlrb')) / 10 ;
				$rbirthwz = $this->config->item('mercwzrb') * ($rbirthmerc);
				echo "<tr>";
				echo "<td>$rbirthmerc</td>";
				echo "<td>$i</td>";
				echo "<td>$rbirthwz wz</td>";
				echo "</tr>";
			};
		?>
					</table>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>
<?php if($query->num_rows() <= 0):?>
<p class="mbr-text pb-3 mbr-fonts-style display-5">Please create a character.</p>
<?php else: ?>
					<?php $var = 0 ?>
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-sm table-hover">
									<thead>
										<tr>
											<th scope="col">Hero</th>
											<th scope="col">Mercenary</th>
										</tr>
									</thead>
									<?php if($query->num_rows() == 0):?>
										<tr><td colspan="2">You did not yet created any character</td></tr>
										<?php $var = 1 ?>
									<?php else:?>
										<?php foreach ($query->result() as $char):?>
											<?php $heroes1 = $char->c_id?>
											<tr>
												<td>
													<div class="form-check row">
														<?=form_radio('character', $heroes1, set_radio('character'), 'id="merh'.$heroes1.'" class="form-check-input"')?>
														<label class="form-check-label" for="merh<?=$heroes1 ?>">
															<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$heroes1?></font>
														</label>
														<?=form_error('character')?>
													</div>
												</td>
												<td>
													<table class="table table-sm table-hover">
														<?php if($this->hstable->hstable_merc($heroes1)->num_rows() == 0):?>
															<tr><td>You do not have any mercenary for <?=$heroes1?></td></tr>
															<?php $var = 1 ?>
														<?php else:?>
															<?php foreach($this->hstable->hstable_merc($heroes1)->result() as $merc):?>
																<?php $merc1 = $merc->HSName?>
																<tr>
																	<td>

																		<div class="form-check row">
																			<?=form_radio('merc', $merc->HSID, set_radio('merc'), 'id="mer'.$merc->HSID.'" class="form-check-input"')?>
																			<label class="form-check-label" for="mer<?=$merc->HSID ?>">
																				<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$merc1?></font>
																			</label>
																			<?=form_error('merc')?>
																		</div>
																	</td>
																</tr>
															<?php endforeach?>
														<?php endif?>
													</table>
												</td>
											</tr>
											<tr><td colspan="2"><hr></td></tr>
										<?php endforeach?>
									<?php endif?>
								</table>
							</div>
						</div>
					</div>
							
							<?php if ($var != 1): ?>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">MERCENARY REBIRTH</button>
							</span>
						<?php endif ?>

				<?php endif ?>
					<?=form_close() ?>

				</div>
			</div>
		</div>
	</section>

<?php
endblock();

startblock('jscript');
?>
////////////////////////////////////////////////////////////////////////////////////
// ckeditor
//CKEDITOR.replace( 'news_reply' );

////////////////////////////////////////////////////////////////////////////////////
// ucwords
$("#username").keyup(function() {
	lch(this);
});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("#productForm").bootstrapValidator({
	feedbackIcons: {
		valid: 'fa fa-check fa-lg',
		invalid: 'fa fa-ban fa-lg',
		validating: 'fa fa-cog fa-spin fa-lg fa-fw'
	},
	fields: {
		character: {
			validators: {
				notEmpty: {
					message: 'Please choose your character '
				},
			}
		},
		merc: {
			validators: {
				notEmpty: {
					message: 'Please choose your mercenary '
				},
			}
		},

	}
})


<?php
endblock();

end_extend();
?>