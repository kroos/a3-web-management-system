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
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">PASSWORD RETRIEVE</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Forgot password page.</h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="media-container-column col-lg-8" data-form-type="formoid">

					<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

					<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

					<div class="form-group row">
						<?=form_label('Username : ', 'username', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'class' => 'form-control', 'id' => 'username', 'placeholder' => 'Username'))?>
							<br />
							<?=form_error('username')?>
						</div>
					</div>
					<div class="form-group row">
						<?=form_label('Email : ', 'pass', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'class' => 'form-control', 'id' => 'pass', 'placeholder' => 'Email'))?>
							<br />
							<?=form_error('email')?>

						</div>
					</div>

							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">SEND PASSWORD</button>
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
// ucwords
$("#username, #pass").keyup(function() {
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
		email: {
			validators: {
				notEmpty: {
					message: 'Please insert your email '
				},
				// emailAddress: {
				// 	message: 'Please insert your valid email address'
				// },
				regexp: {
					regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
					message: ' Please insert your valid email address'
				},
				different: {
					field: 'passwd',
					message: 'The e-mail and password cannot be the same as each other'
				},
			}
		},
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
		// passwd: {
		// 	validators: {
		// 		notEmpty: {
		// 			message: 'Please insert your password '
		// 		},
		// 	}
		// },
	}
})


<?php
endblock();

end_extend();
?>