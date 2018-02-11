<?php
extend('layout/user.php');

startblock('news');
?>
<section class="mbr-section article content10 cid-qImEdhoUCY" id="content10-d">

	<div class="container">
		<div class="inner-container" style="width: 66%;">
			<hr class="line" style="width: 25%;">
			<div class="section-text align-center mbr-white mbr-fonts-style display-5">

				<h2 class="mbr-section-title align-center pb-3 mbr-white mbr-fonts-style display-2">News and Announcement</h2>

				<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>
				<?php $re = 0; ?>
				<?php if($news->num_rows() < 1):?>
					<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">No news or announcement has been created</p>
				<?php else:?>
					<?php $re = 1; ?>
					<?php foreach($news->result() as $newss):?>

						<hr class="line" />
						<h3 class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=ucwords($newss->Subject)?></h3>
						<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=date_my($newss->Date)?></p>
						<?=$newss->HTML?>
						<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5">Regards<br /><b><font color="#008080"><?=ucwords($newss->Author)?></font></b></p>
						<hr class="line" />

						<?php $r = $this->a3web_comment->reply($newss->Bil)?>

						<?php if($r->num_rows() < 1):?>
							<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5 col-sm-8 offset-sm-4">No reply yet</p>
						<?php else:?>

							<?php foreach ($r->result() as $reply):?>
								<hr class="line" />
								<?php foreach($char->result() as $y):?>
									<?php if($y->c_id == $reply->author):?>
										<?=anchor('user/reply/'.$reply->bil, '<i class="fa fa-pencil" aria-hidden="true"></i>Edit', array('title' => 'Edit Post '.$reply->bil))?>
									<?php endif?>
								<?php endforeach?>
								<?php if($this->session->userdata('group') == 'GM'):?>
									<?=anchor('user/reply/'.$reply->bil, '<i class="fa fa-pencil" aria-hidden="true"></i>GM Edit', array('title' => 'GM Edit Post '.$reply->bil))?>
									&nbsp;
									<?=anchor('user/replyr/'.$reply->bil, '<i class="fa fa-eraser" aria-hidden="true"></i>GM Remove', array('title' => 'GM Remove Post '.$reply->bil))?>
								<?php endif?>
								<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5 col-sm-8 offset-sm-4">Reply from <font color="#008080"><?=ucwords($reply->author)?></font> on <?=date_my($reply->date)?></p>
								<?=$reply->html?>
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

if($re == 1):
startblock('form');
?>

<section class="mbr-section cid-qIbsf3xlXN">

	<div class="container">
		<div class="row justify-content-center">
			<div class="title col-12 col-lg-8">
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Reply</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Reply page.</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">

				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'), array('bil_post' => $newss->Bil ))?>

				<div class="form-group row">
					<div class="col-sm-12">
						<?=form_textarea('news_reply', NULL)?>
						<br />
						<?=form_error('news_reply')?>
					</div>
				</div>

				<p class="mbr-text pb-3 mbr-fonts-style display-5">Author</p>
				<?foreach($char->result() as $y):?>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-check">
								<?=form_radio('character', $y->c_id, set_radio('character', $y->c_id, FALSE), 'id="exampleRadios1'.$y->c_id.'"')?>
								<label class="form-check-label" for="exampleRadios1<?=$y->c_id?>">
									<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$y->c_id?></font>
								</label>
								<?=form_error('character')?>
							</div>
						</div>
					</div>
					<?endforeach?>

					<div class="row">
						<div class="col-sm-12">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">REPLY NEWS</button>
							</span>
						</div>
					</div>

					<?=form_close() ?>
				</div>
			</div>
		</div>
	</section>

<?php
endblock();
endif;

startblock('jscript');
?>
////////////////////////////////////////////////////////////////////////////////////
// ckeditor
CKEDITOR.replace( 'news_reply' );

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
		news_reply: {
			validators: {
				notEmpty: {
					message: 'Please insert a reply'
				},
			}
		},
		character: {
			validators: {
				notEmpty: {
					message: 'Please choose your character '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>