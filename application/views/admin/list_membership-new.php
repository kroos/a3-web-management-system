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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">List Of Membership</h2>

			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th>Username</th>
										<th>Status Account</th>
										<th>Salary Taken</th>
										<th>Membership Expire</th>
									</tr>
								</thead>
								<?php foreach($query->result() as $a):?>
									<?php
									$salary = date_my($a->salary);
									$last_salary = date_my($a->last_salary);
									switch ($a->c_sheaderc)
									{
										case 'SM':
										$c_sheaderc1 = $this->config->item('SM');
										break;
										case 'BM':
										$c_sheaderc1 = $this->config->item('BM');
										break;
										case 'GoldM':
										$c_sheaderc1 = $this->config->item('GoldM');
										break;
									};
									?>
									<tr>
										<td align="center" width="25%"><?=$a->c_id?></td>
										<td align="center" width="25%"><?=$c_sheaderc1?></td>
										<td align="center" width="25%"><?=$salary?></td>
										<td align="center" width="25%"><?=$last_salary?></td>
									</tr>
								<?php endforeach?>
								</table>
						</div>
					</div>
				</div>

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
//$("").keyup(function() {
//	tch(this);
//});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
//$("#productForm").bootstrapValidator({
//	feedbackIcons: {
//		valid: 'fa fa-check fa-lg',
//		invalid: 'fa fa-times',
//		validating: 'fa fa-cog fa-spin fa-lg fa-fw'
//	},
//	fields: {
//		char: {
//			validators: {
//				notEmpty: {
//					message: 'Please insert a character '
//				},
//			}
//		},
//		paid: {
//			validators: {
//				notEmpty: {
//					message: 'Please choose membership '
//				},
//			}
//		},
//		month: {
//			validators: {
//				notEmpty: {
//					message: 'Choose expiry month '
//				},
//			}
//		},
//	}
//})


<?php
endblock();

end_extend();
?>