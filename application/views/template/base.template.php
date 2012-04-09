<?extend('template/main.template.php')?>

<?php startblock('templatemo_menu'); ?>
<ul>
	<li><?=anchor('', 'Home', 'title="Home"');?></li>
	<li><?=anchor('a3/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('a3/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor($this->config->item('homepage_url'), 'Forum', 'target="_blank" title="Forum"');?></li>
</ul>
<?php endblock(); ?>

<?php startblock('page_title'); ?>
Welcome to <?=$this->config->item('homepage')?> Account Management Tools
<?php endblock(); ?>

<?php startblock('service_box_float_l'); ?>
<h5>Account</h5>
<p>ghjghjghjghjghj ghjghjghjghjghjghjgh jghjghjghjg jhghjghj ghjgfhfghf ghfhgfgh</p>
<?php endblock(); ?>

<?php startblock('service_box_float_r'); ?>
<h5>Character</h5>
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
		<li>
			<ul>
				<li><?=anchor('a3/login', 'Login', 'title="Login"');?></li>
				<li><?=anchor('a3/register', 'Register', 'title="Register"');?></li>
				<li><?=anchor('a3/password_retrieve', 'Password Retrieve', 'title="Password Retrieve"');?></li>
			</ul>
		</li>
		<li>
			<ul>
				<li><?=anchor('a3/server_status', 'Server Status', 'rel="moodalbox 600 400" title="Server Status"');?></li>
				<li><?=anchor('a3/popup_board_of_heroes', 'Board Of Heroes', 'rel="moodalbox 600 400" title="Board Of Heroes"');?></li>
				<li><?=anchor('a3/popup_board_of_mercenaries', 'Board Of Mercenaries', 'rel="moodalbox 600 400" title="Board Of Mercenaries"');?></li>
				<li><?=anchor('a3/popup_player_online', 'Player Online', 'rel="moodalbox 600 400" title="Player Online"');?></li>
			</ul>
		</li>
	</ul>
<?php endblock(); ?>

<?php startblock('news_box'); ?>
&nbsp;
<?php endblock(); ?>


<?php startblock('footer_menu'); ?>
	<li><?=anchor('', 'Home', 'title="Home"');?></li>
	<li><?=anchor('a3/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('a3/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor($this->config->item('homepage_url'), 'Forum', 'target="_blank" title="Forum"');?></li>
<?php endblock(); ?>

<?end_extend()?>