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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">UnBan Account</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">You can use this tool if and only if you banned <strong>temporarily</strong> the character</h3>
				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Click the link below to unban the account.</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">

			<?php if($banned->num_rows() < 1): ?>
				<p class="mbr-text pb-3 mbr-fonts-style display-5">No banned account</p>
			<?php else: ?>
				<?php foreach($banned->result() as $b):?>
					<p><?=anchor('/admin/unban/'.$b->c_id.'/'.$b->c_sheadera, 'Unban Account '.$b->c_id, array('title' => 'Unban Account '.$b->c_id), 'class="btn btn-primary btn-form display-4"' )?></p>
					<p>Time span this account have been banned : <?=timespan(mysql_to_unix($b->d_udate), now())?></p>
					<hr />
				<?php endforeach?>
			<?php endif ?>
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
// CKEDITOR.replace( 'event_edit' );

////////////////////////////////////////////////////////////////////////////////////
// ucwords
$("").keyup(function() {
	tch(this);
});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("#productForm").bootstrapValidator({
	feedbackIcons: {
		valid: 'fa fa-check fa-lg',
		invalid: 'fa fa-times',
		validating: 'fa fa-cog fa-spin fa-lg fa-fw'
	},
	fields: {
		char: {
			validators: {
				notEmpty: {
					message: 'Please insert a character '
				},
			}
		},
		banning: {
			validators: {
				notEmpty: {
					message: 'Please choose ban type '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>