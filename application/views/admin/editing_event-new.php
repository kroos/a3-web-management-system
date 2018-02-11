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
				<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Updating Event</h2>

				<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Add your latest update in this form and then just submit.</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="media-container-column col-lg-8" data-form-type="formoid">
				<p class="mbr-text pb-3 mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

				<?=form_open('', array('class' => 'mbr-form', 'autocomplete' => 'off', 'id' => 'productForm'))?>

				<div class="form-group row">
					<?=form_label('Subject : ', 'lp', array('class' => 'col-sm-2 col-form-label mbr-fonts-style display-7')) ?>
					<div class="col-sm-10">
						<?=form_input(array('name' => 'subject', 'value' => set_value('subject'), 'class' => 'form-control', 'id' => 'lp', 'placeholder' => 'Subject'))?>
						<br />
						<?=form_error('subject')?>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-12">
						<?=form_textarea('event_add', NULL, 'id="textarea"')?>
						<br />
						<?=form_error('event_add')?>
					</div>
				</div>

				<p class="mbr-text pb-3 mbr-fonts-style display-5">Author</p>
				<?foreach($char->result() as $y):?>

							<div class="form-check row">
								<?=form_radio('character', $y->c_id, set_radio('character', $y->c_id, FALSE), 'id="exampleRadios1'.$y->c_id.'"')?>
								<label class="form-check-label" for="exampleRadios1<?=$y->c_id?>">
									<font color='#0000FF' class="mbr-text pb-3 mbr-fonts-style display-5"><?=$y->c_id?></font>
								</label>
								<?=form_error('character')?>
							</div>

					<?endforeach?>

					<div class="row">
						<div class="col-sm-12">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-form display-4">REPLY EVENT</button>
							</span>
						</div>
					</div>

					<?=form_close() ?>

					<div class="row">
						<div class="col-sm-12">
							<table class="table table-hover" id="table1">
								<thead>
									<tr>
										<th>Bil</th>
										<th>Author</th>
										<th>Date News</th>
										<th>Subject</th>
										<th>News</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<?foreach($news->result() as $t):?>
									<tr>
										<td><?=$t->Bil?></td>
										<td><?=$t->Author?></td>
										<td><?=date_my($t->Date)?></td>
										<td><?=$t->Subject?></td>
										<td><?=$t->HTML?></td>
										<td><?=anchor('admin/event_edit/'.$t->Bil, '<i class="fa fa-pencil" aria-hidden="true"></i>Edit', 'title = "EDIT EVENT '.$t->Bil.'"')?></td>
										<td><?=anchor('admin/event_del/'.$t->Bil, '<i class="fa fa-trash" aria-hidden="true"></i>Delete', 'title = "DELETE EVENT '.$t->Bil.'"')?></td>
									</tr>
									<?endforeach?>
								</table>
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
CKEDITOR.replace( 'event_add' );

////////////////////////////////////////////////////////////////////////////////////
// ucwords
$("#lp , #textarea").keyup(function() {
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
		subject: {
			validators: {
				notEmpty: {
					message: 'Please add your subject '
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