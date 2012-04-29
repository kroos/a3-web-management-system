<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Inserting Items Manually</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Please take a listen and look carefully becos this 1 is the most trickiest part of the tools.</p>
<p>First of all, just put the char name, its easy.</p>
<p>2nd u have to put the code, the code must be consists of 4 sections and the format should look like this</p>
<p><b>xxxxxx;xxxxxx;xxxxx;slotnumber;</b></p>
<p>For example : if you want to inject 1 Upgrade Jewel inside Foolan character (please dont do that, wasting your time....) so use this code :</p>
<p>6144;123321;128;4;</p>
<p>Make sure slot number <b>5</b> is empty, yes... number 5 not number 4.. becos the system start counting from 0, not from 1</p>
<p>So for slot number 5, the system count like this..</p>
<p>0 , 1 , 2 , 3 , 4  <---- number 5 to us...</p>
<p>Please take a look at the sign ";" at the end of the code, if you forgot to put the sign ";" at the end, then the whole character might be corrupted</p>
<p>So use a high caution to use this tools</p>

<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>
<p>Code : <?=form_textarea(array('name' => 'code', 'value' => set_value('code'), 'cols' => 50, 'rows' => 5))?>&nbsp;<?=form_error('code')?></p>
<p><?=form_submit('insert_manual', 'Insert Item Manual')?></p>
<?=form_close()?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>