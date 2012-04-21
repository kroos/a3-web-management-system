<?extend('template/user.template.php')?>

<?php startblock('cleaner_h40a'); ?>
<h2>Account Information</h2>

<p><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<p>Search Account by Character</p>
<?=form_open()?>
<p>Character : <?=form_input(array('name' => 'char', 'value' => set_value('char'), 'size' => 20))?>&nbsp;<?=form_error('char')?>&nbsp;<?=form_submit('search', 'Search')?></p>
<?=form_close()?>
<hr>
<?if(!isset($account)):?>
<?else:?>
	<?if($account->num_rows() < 1):?>
	<?else:?>
		<?foreach($account->result() as $n):?>
		<?$t = $this->db->query("SELECT account.c_id AS Username, account.c_headera AS Password, account.c_status AS Acc_Status, account.c_sheaderc AS User_Type, account.salary AS Salary_Taken, charac0.c_id AS Character, charac0.c_sheaderc AS [Level], charac0.c_headera AS Abilities, charac0.c_headerc AS Wz, charac0.c_status AS Char_Status, charac0.m_body AS Attributes, charac0.rb AS Rebirth, charac0.times_rb AS Rebirth_Times FROM charac0 INNER JOIN account ON charac0.c_sheadera = account.c_id WHERE (account.c_id = '".$n->c_sheadera."')")?>
			<?foreach($t->result() as $g):?>
				<p>So the username of this <b><font color="#FF0000"><?=$g->Character?></font></b> is <b><font color="#FF0000"><?=$g->Username?></font></b></p>

				<table border="1" width="100%">
				<tr>
				<td align="center">Username</td>
				<td align="center">Password</td>
				<td align="center">Account Status</td>
				<td align="center">User Type</td>
				<td align="center">Salary Taken</td>
				<td align="center">Character</td>
				<td align="center">Level</td>
				<td align="center">Wz</td>
				<td align="center">Char Status</td>
				<td align="center">Rebirth</td>
				<td align="center">Rebirth Times</td>
				</tr>
				<tr>
				<td align="center"><?=$g->Username?></td>
				<td align="center"><?=$g->Password?></td>
				<td align="center"><?=$g->Acc_Status?></td>
				<td align="center"><?=$g->User_Type?></td>
				<td align="center"><?=date_my($g->Salary_Taken)?></td>
				<td align="center"><?=$g->Character?></td>
				<td align="center"><?=$g->Level?></td>
				<td align="center"><?=$g->Wz?></td>
				<td align="center"><?=$g->Char_Status?></td>
				<td align="center"><?=$g->Rebirth?></td>
				<td align="center"><?=$g->Rebirth_Times?></td>
				</tr>
				</table>

				<hr>
			<?endforeach?>
		<?endforeach?>
	<?endif?>
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?end_extend()?>