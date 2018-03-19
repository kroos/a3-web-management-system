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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Account Information</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Search Account by Character</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'id' => 'productForm'))?>

				<div class="form-group row">
					<?=form_label('Character : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input(array('name' => 'char', 'value' => set_value('char'), 'class' => 'form-control', 'id' => 'lp', 'placeholder' => 'Character'))?>
						<br />
						<?=form_error('char')?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-form display-4">Search</button>
						</span>
					</div>
				</div>

				<?=form_close() ?>

				<hr />

				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<?php if(!isset($account)):?>
							<?php else:?>
								<?php if($account->num_rows() < 1):?>
								<?php else:?>
									<?php foreach($account->result() as $n):?>
									<?php $t = $this->db->query("SELECT Account.c_id AS Username, Account.c_headera AS Password, Account.c_status AS Acc_Status, Account.c_sheaderc AS User_Type, Account.salary AS Salary_Taken, Charac0.c_id AS Character, Charac0.c_sheaderc AS [Level], Charac0.c_headera AS Abilities, Charac0.c_headerc AS Wz, Charac0.c_status AS Char_Status, Charac0.m_body AS Attributes, Charac0.rb AS Rebirth, Charac0.times_rb AS Rebirth_Times FROM Charac0 INNER JOIN Account ON Charac0.c_sheadera = Account.c_id WHERE (Account.c_id = '".$n->c_sheadera."')")?>
										<?foreach($t->result() as $g):?>
											<p>The username of this <b><font color="#FF0000"><?=$g->Character?></font></b> is <b><font color="#FF0000"><?=$g->Username?></font></b></p>
							
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Username</th>
														<th>Password</th>
														<th>Account Status</th>
														<th>User Type</th>
														<th>Salary Taken</th>
														<th>Character</th>
														<th>Level</th>
														<th>Wz</th>
														<th>Char Status</th>
														<th>Rebirth</th>
														<th>Rebirth Times</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?=$g->Username?></td>
														<td><?=$g->Password?></td>
														<td><?=$g->Acc_Status?></td>
														<td><?=$g->User_Type?></td>
														<td><?=date_my($g->Salary_Taken)?></td>
														<td><?=$g->Character?></td>
														<td><?=$g->Level?></td>
														<td><?=$g->Wz?></td>
														<td><?=$g->Char_Status?></td>
														<td><?=$g->Rebirth?></td>
														<td><?=$g->Rebirth_Times?></td>
													</tr>
												</tbody>
											</table>
							
											<hr>
										<?php endforeach?>
									<?php endforeach?>
								<?php endif?>
							<?php endif?>
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
// $("").keyup(function() {
// 	tch(this);
// });

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
	}
})

////////////////////////////////////////////////////////////////////////////////////
// autocomplete
	$( "#lp" ).autocomplete({
		source: 'charsearch'
		// minLength: 2
	});

<?php
endblock();

end_extend();
?>