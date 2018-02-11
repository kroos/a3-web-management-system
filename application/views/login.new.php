<?php
extend('layout/main.php');

startblock('news');
endblock();

startblock('form');
?>

	<section class="mbr-section cid-qIbsf3xlXN">

		<div class="container">
			<div class="row justify-content-center">
				<div class="title col-12 col-lg-8">
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">SIGN IN</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Login page.</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('a3/login', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

					<div class="form-group row">
						<?=form_label('Username : ', 'username', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_input(array('name' => 'login', 'value' => set_value('login'), 'class' => 'form-control', 'id' => 'username', 'placeholder' => 'Username'))?>
							<br />
							<?=form_error('login')?>
						</div>
					</div>
					<div class="form-group row">
						<?=form_label('Password : ', 'pass', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_password(array('name' => 'passwd', 'value' => set_value('passwd'), 'class' => 'form-control', 'id' => 'pass', 'placeholder' => 'Password'))?>
							<br />
							<?=form_error('passwd')?>
						</div>
					</div>

							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">SIGN IN</button>
								<!-- <input type="submit" name="sign-in" value="SIGN-IN" class="btn btn-primary btn-form display-4"> -->
							</span>

					<?=form_close() ?>


<div class="row">
	<div class="col-sm-3 offset-sm-9">
		<?=anchor('a3/password_retrieve', 'Password Retrieve', 'title="Password Retrieve"');?>
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
		// email: {
		// 	validators: {
		// 		notEmpty: {
		// 			message: 'Please insert your email '
		// 		},
		// 		// emailAddress: {
		// 		// 	message: 'Please insert your valid email address'
		// 		// },
		// 		regexp: {
		// 			regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
		// 			message: ' Please insert your valid email address'
		// 		},
		// 		different: {
		// 			field: 'password',
		// 			message: 'The e-mail and password cannot be the same as each other'
		// 		},
		// 	}
		// },
		login: {
			message: 'The username is not valid',
			validators: {
				notEmpty: {
					message: 'The username is required and cannot be empty'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9_]+$/,
					message: 'The username can only consist of alphabetical, number and underscore'
				},
				stringLength: {
					min: 6,
					max: 10,
					message: 'The username must be more than 6 and less than 10 characters long'
				},
			}
		},
		passwd: {
			validators: {
				notEmpty: {
					message: 'Please insert your password '
				},
			}
		},
	}
})


<?php
endblock();

end_extend();
?>