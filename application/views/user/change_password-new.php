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
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Change Password</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Please insert the following information to change your password.</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

					<div class="form-group row">
						<?=form_label('Username : ', 'user', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<input class="form-control" type="text" placeholder="<?=$this->session->userdata('username')?>" id="user" readonly>
						</div>
					</div>

					<div class="form-group row">
						<?=form_label('Old Password : ', 'username', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_password(array('name' => 'old_password', 'value' => set_value('old_password'), 'class' => 'form-control', 'id' => 'username', 'placeholder' => 'Old Password'))?>
							<br />
							<?=form_error('old_password')?>
						</div>
					</div>

					<div class="form-group row">
						<?=form_label('Password : ', 'pass', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_password(array('name' => 'password1', 'value' => set_value('password1'), 'class' => 'form-control', 'id' => 'pass', 'placeholder' => 'Password'))?>
							<br />
							<?=form_error('password1')?>
						</div>
					</div>

					<div class="form-group row">
						<?=form_label('Password Confirmation : ', 'passpassword2', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_password(array('name' => 'password2', 'value' => set_value('password2'), 'class' => 'form-control', 'id' => 'passpassword2', 'placeholder' => 'Password Confirmation'))?>
							<br />
							<?=form_error('password2')?>
						</div>
					</div>

							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">CHANGE PASSWORD</button>
								<!-- <input type="submit" name="sign-in" value="SIGN-IN" class="btn btn-primary btn-form display-4"> -->
							</span>

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
		old_password: {
			validators: {
				notEmpty: {
					message: 'Please insert your old password '
				},
			}
		},
		password1: {
			validators: {
				notEmpty: {
					message: 'Please choose your character '
				},
				identical: {
					field: 'password2',
					message: 'The password and its confirm are not the same. '
				},
			}
		},
		password2: {
			validators: {
				notEmpty: {
					message: 'Please choose your character '
				},
				identical: {
					field: 'password1',
					message: 'The password and its confirm are not the same. '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>