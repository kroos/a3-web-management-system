<?extend('template/main.template.php')?>


<?php startblock('site_title'); ?>
<a href="" target="_parent">
<img src="images/templatemo_logo.png" alt="Site Title" width="200" height="50" />
<span><?=$this->config->item('homepage')?> Account Management</span>
</a>
<?php endblock(); ?>

<?php startblock('search_box'); ?>
<form action="#" method="get">
<input type="text" value="Enter a keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
<input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
</form>
<?php endblock(); ?>

<?php startblock('templatemo_menu'); ?>
<ul>
	<li><?=anchor('', 'Home', 'title="Home"');?></li>
	<li><?=anchor('a3/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('a3/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor($this->config->item('homepage_url'), 'Forum', 'target="_blank" title="Forum"');?></li>
</ul>
<?php endblock(); ?>

<?php startblock('cs_slider'); ?>
<div class="cs_article">
        <img src="images/slider/templatemo_slide02.jpg" alt="Website Template 01" />
</div><!-- End cs_article -->

<div class="cs_article">
    	<img src="images/slider/templatemo_slide01.jpg" alt="Website Template 02" />
</div><!-- End cs_article -->

<div class="cs_article">
   	<img src="images/slider/templatemo_slide03.jpg" alt="Website Template 03" />
</div><!-- End cs_article -->

<div class="cs_article">
   	<img src="images/slider/templatemo_slide04.jpg" alt="Website Template 04" />
</div><!-- End cs_article -->
<?php endblock(); ?>

<?php startblock('page_title'); ?>
Pro Teal Development
<?php endblock(); ?>

<?php startblock('service_box_float_l'); ?>
<h5>Quality Services</h5>
<p>ghjghjghjghjghj ghjghjghjghjghjghjgh jghjghjghjg jhghjghj ghjgfhfghf ghfhgfgh</p>
<?php endblock(); ?>

<?php startblock('service_box_float_r'); ?>
<h5>Best Products</h5>
<p>&nbsp;</p>
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
<a href="#">Lorem ipsum dolor sit amet consectetur</a>
<p>Quisque id lacus in nunc porttitor</p>
<?php endblock(); ?>

<?php startblock('news_box2'); ?>
<a href="#">Quisque id lacus in nunc porttitor</a>
<p>Quisque id lacus in nunc porttitor</p>
<?php endblock(); ?>

<?php startblock('footer_menu'); ?>
	<li><?=anchor('', 'Home', 'title="Home"');?></li>
	<li><?=anchor('a3/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('a3/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor($this->config->item('homepage_url'), 'Forum', 'target="_blank" title="Forum"');?></li>
<?php endblock(); ?>

<?end_extend()?>