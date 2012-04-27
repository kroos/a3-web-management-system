<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Modifying Character Points</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p><b>How to use this AMT?</b></p>
<ol>
<li>key in the character name as you desire</li>
<li>then alter the points as you wish</li>
</ol>

<div align="center">
<table border="1" width="100%" style="border-collapse: collapse">
<tr>
<td>
<p align="center"><b>Searching Username by Character</B></td>
</tr>
<tr>
<td>
	<?=form_open()?>
	<p align="center">Insert Character Name : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?></p>
	<p align="center"><?=form_submit('search', 'Search')?></p>
	<?=form_close()?>
</td>
</tr>
<?if(!$this->input->post('search', TRUE) || $this->form_validation->run() == FALSE || !isset($query->row()->c_id) ):?>

<?else:?>
<tr>
<td>
<p align="center">The username of <b><font color="#FF0000"><?=$query->row()->c_id?></font></b> is <b><font color="#FF0000"><?=$query->row()->c_sheadera?></font></b></p>
</td>
</tr>
<?endif?>
</table>
</div>

<?if(!$this->input->post('search', TRUE)  || $this->form_validation->run() == FALSE || !isset($query->row()->c_id) ):?>
<p>&nbsp;</p>
<?else:?>
<p align="center"><font color="#FF0000"><b><?=$query->row()->c_id?></b></font> is a <b><font color="#FF0000"><?=char_type($query->row()->c_sheaderb)?></font></b></p>
<?endif?>

<?if(!$this->input->post('search', TRUE)  || $this->form_validation->run() == FALSE || !isset($query->row()->c_id) ):?>
<p>&nbsp;</p>
<?else:?>
<?=form_open('', '', array('char' => $query->row()->c_id ))?>
<div align="center">
<div align="center">
<table border="2" width="100%" bordercolorlight="#000000" bordercolordark="#000000" cellspacing="0">
<tr>
<td><p align="center"><b><font face="Georgia" size="2" color="#0000FF">this form is use to alter character statistic points</font></b></p>
<div align="center">
<table border="1" width="90%" style="border-collapse: collapse">
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Strength</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=char_attrib('STR', $query->row()->c_headera)?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'str', 'value' => set_value('str'), 'size' => 6, 'maxlength' => 5, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('str')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$str?></font></td>
</tr>
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Intelligence</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=char_attrib('INT', $query->row()->c_headera)?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'int', 'value' => set_value('int'), 'size' => 6, 'maxlength' => 5, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('int')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$int?></font></td>
</tr>
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Dexterity</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=char_attrib('DEX', $query->row()->c_headera)?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'dex', 'value' => set_value('dex'), 'size' => 6, 'maxlength' => 5, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('dex')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$dex?></font></td>
</tr>
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Vitality</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=char_attrib('VIT', $query->row()->c_headera)?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'vit', 'value' => set_value('vit'), 'size' => 6, 'maxlength' => 5, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('vit')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$vit?></font></td>
</tr>
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Mana</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=char_attrib('MANA', $query->row()->c_headera)?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'mana', 'value' => set_value('mana'), 'size' => 6, 'maxlength' => 5, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('mana')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$mana?></font></td>
</tr>
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Points Remaining</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=char_attrib('POINTS', $query->row()->c_headera)?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'prem', 'value' => set_value('prem'), 'size' => 6, 'maxlength' => 5, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('prem')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$prem?></font></td>
</tr>
<tr>
<td width="16%" align="center"><font size="2" face="Georgia">Wz</font></td>
<td align="center" width="14%"><font size="2" face="Georgia"><?=$query->row()->c_headerc?></font></td>
<td align="center" width="13%"><font size="2" face="Georgia">+</font></td><td width="18%" align="center">
<font face="Georgia"><?=form_input(array('name' => 'wz', 'value' => set_value('wz'), 'size' => 11, 'maxlength' => 10, 'style' => 'text-align: center'))?>&nbsp;<?=form_error('wz')?></font></td>
<td align="center" width="6%"><font size="2" face="Georgia">=</font></td>
<td align="center" width="29%"><font size="2" face="Georgia"><?=@$wz2?></font></td>
</tr>
</table>
</div>
<p align="center"><font face="Georgia"><?=form_submit('alter', 'Alter '.$query->row()->c_id)?></font></td>
</tr>
</table>
</div>
</div>
<?=form_close()?>
<?endif?>

<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>