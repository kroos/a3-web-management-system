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
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Edit Reply</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Edit Reply page.</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm') )?>

					<?php $u = $this->charac0->charb($reply->author)?>

					<?php if ($u->row()->c_sheadera == $this->session->userdata('username') || $this->session->userdata('group') == 'GM'):?>

					<div class="form-group row">
						<div class="col-sm-12">
							<?=form_textarea('edit_news', $reply->html)?>
							<br />
							<?=form_error('edit_news')?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">EDIT REPLY</button>
							</span>
						</div>
					</div>
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
CKEDITOR.replace( 'edit_news' );

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
		edit_news: {
			validators: {
				notEmpty: {
					message: 'Please insert a reply'
				},
			}
		},

	}
})


<?php
endblock();

end_extend();
?>