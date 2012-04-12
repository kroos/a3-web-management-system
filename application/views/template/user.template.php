<?extend('template/main.template.php')?>

<?php startblock('templatemo_menu'); ?>
<ul>
	<li><?=anchor('user/index', 'Home', 'title="Home"');?></li>
	<li><?=anchor('user/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('user/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor('user/logout', 'Logout', 'title="Logout"');?></li>
</ul>
<?php endblock(); ?>

<?php startblock('page_title'); ?>
Welcome to <?=$this->config->item('homepage')?> Account Management Tools
<?php endblock(); ?>

<?php startblock('service_box_float_l'); ?>
<h5>Account</h5>
<?php
###################################################################################################################################################
//starting to count membership tricky part
	switch ($this->session->userdata('group'))
		{
			case 'BM':
			$laptop = $this->config->item('BM');
			$payment = $this->config->item('BMP');
			break;
			case 'SM':
			$laptop = $this->config->item('SM');
			$payment = $this->config->item('SMP');
			break;
			case 'GoldM':
			$laptop = $this->config->item('GoldM');
			$payment = $this->config->item('GoldMP');
			break;
			case 'GM':
			$laptop = 'Game Master';
			break;
			case 'Normal':
			$laptop = 'Normal';
			break;
		};
	
	$sql2 = $this->account->account_user($this->session->userdata('username'), $this->session->userdata('password'))->row();
	//echo $sql2->last_salary.' last salary<br />';
	//echo $sql2->salary.' salary<br />';
	
	##################################################
	//convert to unix time stamp
	$timeu = human_to_unix($sql2->last_salary);
	$timespan = timespan(now(), $timeu);
	##################################################
	
	$datediff = $this->db->select("DATEDIFF(month, '".$sql2->last_salary."', '".$sql2->salary."') AS monthdatediff")->get()->row();
	//echo $datediff->monthdatediff.' monthdate salary->last salary<br />';
	
	$datediff1 = $this->db->select("DATEDIFF(month, '".$sql2->last_salary."', GETDATE()) AS monthdate")->get()->row();
	//echo $datediff1->monthdate.' monthdate now->last salary<br />';
	
	//check curernt date
	$cdate = mssqldate();
	//echo $cdate.' current date<br />';
	
	$sql3 = $this->db->select("DATEADD(month, ".$datediff->monthdatediff."+1, '".$sql2->last_salary."') AS monthdateadd")->get()->row();
	//echo $sql3->monthdateadd.' month<br />';
	$i = 0;
	if ($cdate > $sql3->monthdateadd)
		{
			$i++;
		}
	$sql4 = $this->db->select("DATEADD(month, ".$datediff->monthdatediff."+1+".$i.", '".$sql2->last_salary."') AS monthdateadd")->get()->row();
	//echo $sql4->monthdateadd.' month after process<br />';
	
	if ($cdate > $sql3->monthdateadd)
		{
			$legalDate = $sql3->monthdateadd;
		}
		else
		{
			$legalDate = $sql4->monthdateadd;
		}
	//echo $legalDate.' legal date<br />';
	
	##################################################
	//convert to unix time stamp
	$temp = explode(' ', $legalDate);
	$tempdate = explode('-', $temp[0]);
	$temptime = explode(':', $temp[1]);
	$year = $tempdate[0];
	$month = $tempdate[1];
	$day = $tempdate[2];
	$hour = $temptime[0];
	$minute = $temptime[1];
	$sec = $temptime[2];
	$mktime = mktime($hour, $minute, $sec, $month, $day, $year);
	$legalDate = mdate("%Y-%m-%d %H:%i:%s", $mktime);
	$timeu1 = human_to_unix($legalDate);
	//echo $timeu1.' unix legal date<br />';
	$timespan1 = timespan(now(), $timeu1);
	##################################################
###################################################################################################################################################
?>
<p>You are our <font color='#0000FF'><?php echo $laptop; ?></font> user.</p>
<?php
if ($this->session->userdata('group') == 'BM' || $this->session->userdata('group') == 'SM' || $this->session->userdata('group') == 'GoldM')
	{
		echo "<p><font color='#0000FF'>$laptop</font> will expire in <font color='#0000FF'>$timespan</font>.<br />";
		echo "Salary available on : <font color='#0000FF'>".date_my($legalDate)."</font><br />";
		if ($timespan1 < 2)
			{
				echo "Please claim your salary right away<br />";
			}
			else
			{
				echo "You can claim your salary in <font color='#0000FF'>$timespan1</font><br />";
			}
		echo "You were entitle to get <font color='#0000FF'>$payment</font> Wz per month.</p>";
	}
?>
<?php endblock(); ?>

<?php startblock('service_box_float_r'); ?>
<h5>Character</h5>
<?$sql = $this->charac0->charac_char($this->session->userdata('username'))?>
<?if($sql->num_rows() > 0):?>
<ul>
<?foreach($sql->result() as $item):?>
<?php echo "<li>".$item->c_id."</li>"; ?>
<?endforeach?>
</ul>
<?else:?>
No character created.
<?endif?>
<?php endblock(); ?>

<?php startblock('cleaner_h40a'); ?>
<h2>What we do?</h2>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php endblock(); ?>

<?php startblock('cleaner_h40b'); ?>
<h2>What we do?</h2>
<p>&nbsp;</p>
<p>&nbsp;</p> 
<?php endblock(); ?>

<?php startblock('templatemo_menu_side'); ?>
	<ul>
		<li><?=anchor('user/change_password', 'Change Password', 'title="Change Password"')?></li>
		<li><?=anchor('user/offline_town_portal', 'Offline Town Portal', 'title="Offline Town Portal"');?></li>
		<li><?=anchor('user/acquire_super_shue', 'Acquire Super Shue', 'title="Acquire Super Shue"');?></li>
		<li><?=anchor('user/buy_all_skill', 'Buy All Skill', 'title="Buy All Skill"');?></li>
		<li><?=anchor('user/equip_super_super_shue', 'Equip Super Super Shue', 'title="Equip Super Super Shue"');?></li>
		<li><?=anchor('user/buy_lore', 'Buy Lore', 'title="Buy Lore"');?></li>
		<li><?=anchor('user/rebirth', 'Rebirth', 'title="Rebirth"');?></li>
		<li><?=anchor('user/reset_rebirth', 'Reset Rebirth', 'title="Reset Rebirth"');?></li>
		<li><?=anchor('user/mercenary_rebirth', 'Mercenary Rebirth', 'title="Mercenary Rebirth"');?></li>
		<li><?=anchor('user/mercenary_reset_rebirth', 'Mercenary Reset Rebirth', 'title="Mercenary Reset Rebirth"');?></li>
		<li><?=anchor('user/adding_hero_stat_points', 'Adding Hero Stat Points', 'title="Adding Hero Stat Points"');?></li>
		<li><?=anchor('user/adding_mercenary_stat_points', 'Adding Mercenary Stat Points', 'title="Adding Mercenary Stat Points"');?></li>
		<li><?=anchor('user/salary', 'Salary', 'title="Salary"');?></li>
		<li><?=anchor('user/editing_news', 'Editing News', 'title="Editing News"');?></li>
		<li><?=anchor('user/editing_download', 'Editing Download', 'title="Editing Download"');?></li>
		<li><?=anchor('user/editing_event', 'Editing Event', 'title="Editing Event"');?></li>
		<li><?=anchor('user/info_account', 'Info About Account', 'title="Info About Account"');?></li>
		<li><?=anchor('user/changing_account_type', 'Changing Account Type', 'title="Changing Account Type"');?></li>
		<li><?=anchor('user/paid_membership', 'Paid Membership', 'title="Paid Membership"');?></li>
		<li><?=anchor('user/list_of_paid_membership', 'List of Paid Membership', 'title="List of Paid Membership"');?></li>
		<li><?=anchor('user/acccount_banning', 'Account Banning', 'title="Account Banning"');?></li>
		<li><?=anchor('user/account_unbanning', 'Account Unbanning', 'title="Account Unbanning"');?></li>
		<li><?=anchor('user/list_of_suspended_account', 'List Of Suspended Account', 'title="List Of Suspended Account"');?></li>
		<li><?=anchor('user/list_of_ban_IP', 'List Of Ban IP', 'title="List Of Ban IP"');?></li>
		<li><?=anchor('user/ban_IP', 'Ban IP', 'title="Ban IP"');?></li>
		<li><?=anchor('user/unban_IP', 'Unban IP', 'title="Unban IP"');?></li>
		<li><?=anchor('user/character_altering_points', 'Character Altering Points', 'title="Character Altering Points"');?></li>
		<li><?=anchor('user/equipping_equipment_and_passive_skill', 'Equipping Equipment And Passive Skill', 'title="Equipping Equipment And Passive Skill"');?></li>
		<li><?=anchor('user/equip_super_super_shue', 'Equip Super Super Shue', 'title="Equip Super Super Shue"');?></li>
		<li><?=anchor('user/learn_episode_5_skill', 'Learn Episode 5 Skill', 'title="Learn Episode 5 Skill"');?></li>
		<li><?=anchor('user/altering_level', 'Altering Level', 'title="Altering Level"');?></li>
		<li><?=anchor('user/inserting_lore', 'Inserting Lore', 'title="Inserting Lore"');?></li>
		<li><?=anchor('user/grace_of_silbadu_insertion', 'Grace Of Silbadu Insertion', 'title="Grace Of Silbadu Insertion"');?></li>
		<li><?=anchor('user/inserting_1_box_of_items', 'Inserting 1 Box of Items', 'title="Inserting 1 Box of Items In The Inventory"');?></li>
		<li><?=anchor('user/inserting_1_item', 'Inserting 1 Item', 'title="Inserting 1 Item In The Inventory"');?></li>
		<li><?=anchor('user/character_clone', 'Character Clone', 'title="Character Clone"');?></li>
		<li><?=anchor('user/guild_removal', 'Guild Removal', 'title="Guild Removal"');?></li>
		<li><?=anchor('user/info_pk', 'Info PK', 'title="Info PK"');?></li>
		<li><?=anchor('user/altering_PK_timer', 'Altering PK timer', 'title="Altering PK timer"');?></li>
		<li><?=anchor('user/inserting_items_manually', 'Inserting Items Manually', 'title="Inserting Items Manually"');?></li>
		<li><?=anchor('user/database_back_up', 'Database Back Up', 'title="Database Back Up"');?></li>
	</ul>
<?php endblock(); ?>

<?php startblock('news_box1'); ?>
&nbsp;
<?php endblock(); ?>

<?php startblock('news_box2'); ?>
&nbsp;
<?php endblock(); ?>


<?php startblock('footer_menu'); ?>
	<li><?=anchor('user/index', 'Home', 'title="Home"');?></li>
	<li><?=anchor('user/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('user/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor('user/logout', 'Logout', 'title="Logout"');?></li>
<?php endblock(); ?>

<?end_extend()?>