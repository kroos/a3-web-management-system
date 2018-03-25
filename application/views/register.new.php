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
					<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">SIGN UP</h2>

					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Register page.</h3>
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
						<?=form_label('Password : ', 'pass1', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_password(array('name' => 'password1', 'value' => set_value('password1'), 'class' => 'form-control', 'id' => 'pass1', 'placeholder' => 'Password'))?>
							<br />
							<?=form_error('password1')?>
						</div>
					</div>

					<div class="form-group row">
						<?=form_label('Confirm Password : ', 'pass2', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_password(array('name' => 'password2', 'value' => set_value('password2'), 'class' => 'form-control', 'id' => 'pass2', 'placeholder' => 'Password Confirmation'))?>
							<br />
							<?=form_error('password2')?>
						</div>
					</div>

					<div class="form-group row">
						<?=form_label('Email : ', 'pass3', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-10">
							<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'class' => 'form-control', 'id' => 'pass3', 'placeholder' => 'Email'))?>
							<br />
							<?=form_error('email')?>

						</div>
					</div>

					<div class="form-group row">
						<?=form_label('Image Verification : ', 'iv', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
						<div class="col-sm-4">
							<p class="mbr-text pb-3 mbr-fonts-style display-5"><?=$cap['image']?></p>
						</div>
						<div class="col-sm-6">
							<?=form_password(array('name' => 'verify', 'value' => set_value('verify'), 'class' => 'form-control', 'id' => 'iv', 'placeholder' => 'Image Verification'))?>
							<br />
							<?=form_error('verify')?>
						</div>
					</div>


							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">SIGN UP</button>
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
// var csrfHash = $.cookie("<?=$this->config->item('cookie_prefix').$this->config->item('csrf_cookie_name')?>");
// var csrfHash1 = $('input[name="<?=$this->security->get_csrf_token_name()?>"]').val();
////////////////////////////////////////////////////////////////////////////////////
// ucwords
$("#username, #pass3").keyup(function() {
	lch(this);
});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("form")
.bootstrapValidator({
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
				regexp: {
					regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
					message: ' Please insert your valid email address'
				},
				different: {
					field: 'password1',
					message: 'The e-mail and password cannot be the same as each other'
				},
				remote: {
					type: 'POST',
					url: 'remote_user',
					message: 'Please use another email ',
					data: function(validator) {
								return {
											<?=$this->security->get_csrf_token_name()?>: $.cookie("<?=$this->config->item('cookie_prefix').$this->config->item('csrf_cookie_name')?>")
											//validator.getFieldElements('<?=$this->security->get_csrf_token_name()?>').val()
										};
							},
					delay: 1,		// wait 0.001 seconds
					onSuccess: function(e, data) {
						//hidden input csrf must be refresh, otherwise submit data wont go through the process
						$('input[name="<?=$this->security->get_csrf_token_name()?>"]').val($.cookie("<?=$this->config->item('cookie_prefix').$this->config->item('csrf_cookie_name')?>"));
					},
				}
			},
		},
		username: {
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
				remote: {
					type: 'POST',
					url: 'remote_user',
					message: 'Please use another username',
					data: function(validator) {
								return {
											<?=$this->security->get_csrf_token_name()?> : $.cookie("<?=$this->config->item('cookie_prefix').$this->config->item('csrf_cookie_name')?>")
											// validator.getFieldElements('<?=$this->security->get_csrf_token_name()?>').val()
								};
							},
					delay: 1,		// wait 0.001 seconds
					onSuccess: function(e, data) {
						//hidden input csrf must be refresh, otherwise submit data wont go through the process
						$('input[name="<?=$this->security->get_csrf_token_name()?>"]').val($.cookie("<?=$this->config->item('cookie_prefix').$this->config->item('csrf_cookie_name')?>"));
					},
					// onError: function(e, data) {
					// 	console.log('error');
					// }
				},
			}
		},
		password1: {
			validators: {
				notEmpty: {
					message: 'Please insert your password '
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
					message: 'Please insert your confirmation password. '
				},
				identical: {
					field: 'password1',
					message: 'The password and its confirm are not the same. '
				},
			}
		},
		verify: {
			validators: {
				notEmpty: {
					message: 'Please insert verification'
				},
				between: {
					min: 10000,
					max: 99999,
					message: 'The verifications must be between 10000 and 99999'
				},
			},
		},
	}
})
// .on('success.form.bv', '#pass3', function(e) {
// 	// Prevent form submission
// 	e.preventDefault();
// 	
// 	// Get the form instance
// 	// var $form = $(e.target);
// 	
// 	// Get the BootstrapValidator instance
// 	// var bv = $form.data('bootstrapValidator');
// 	
// 	// Use Ajax to submit form data
// 	$.get( "remote_user", function( response ) {
// 	    console.log( response ); // server response
// 	})
// })
// .on('error.form.bv', '#pass3', function(e) {
// 	// Prevent form submission
// 	// e.preventDefault();
// 	
// 	// Get the form instance
// 	// var $form = $(e.target);
// 	
// 	// Get the BootstrapValidator instance
// 	// var bv = $form.data('bootstrapValidator');
// 	
// 	// Use Ajax to submit form data
// 	$.get( "remote_user", function( response ) {
// 	    console.log( response ); // server response
// 	})
// })

<?php
endblock();

end_extend();
?>