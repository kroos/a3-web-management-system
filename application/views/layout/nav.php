	<section class="menu cid-qIaZytMz8h" once="menu" id="menu2-0">

		<nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="menu-logo">
				<div class="navbar-brand">
					<span class="navbar-logo">
						
						<?=anchor(base_url(), '<img src="'.base_url().'assets/images/logo-149x103.png" alt="'.$this->config->item('homepage').'" title="'.$this->config->item('homepage').'" style="height: 4rem;">') ?>

					</span>
					<span class="navbar-caption-wrap"><?=anchor(base_url(), $this->config->item('homepage'), array('class' => 'navbar-caption text-info display-4') )?></span>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
<?php start_block_marker('templatemo_menu'); ?>



<?php if(($this->session->userdata('logged_in') == FALSE)):?>
					<li class="nav-item dropdown">
						<?=anchor('#', 'Home', array('class' => 'nav-link link text-info dropdown-toggle display-4', 'data-toggle' => 'dropdown-submenu', 'aria-expanded' => 'false'));?>
						<div class="dropdown-menu">
							<?=anchor('', 'News', array('class' => 'text-info dropdown-item display-4'));?>
							<?=anchor('a3/event', 'Event', array('class' => 'text-info dropdown-item display-4'));?>
							<?=anchor('a3/download', 'Download', 'class="text-info dropdown-item display-4"');?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<?=anchor('#', 'Community', array('class' => 'nav-link link text-info dropdown-toggle display-4', 'data-toggle' => 'dropdown-submenu', 'aria-expanded' => 'false'));?>
						<div class="dropdown-menu">
							<?=anchor($this->config->item('homepage_url'), 'Forum', array('class' => 'text-info dropdown-item display-4'));?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<?=anchor('#', 'Server', 'class="nav-link link text-info dropdown-toggle display-4" data-toggle="dropdown-submenu"') ?>
						<div class="dropdown-menu">
							<?=anchor('a3/server_status', 'Status', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('a3/popup_player_online', 'Player Online', 'class="text-info dropdown-item display-4"');?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link link text-info dropdown-toggle display-4" href="#" aria-expanded="false" data-toggle="dropdown-submenu">Hall Of Fame</a>
						<div class="dropdown-menu">
							<?=anchor('a3/popup_board_of_heroes', 'Board Of Heroes', 'class="text-info dropdown-item display-4" aria-expanded="true"');?>
							<?=anchor('a3/popup_board_of_mercenaries', 'Board Of Mercenaries', 'class="text-info dropdown-item display-4" aria-expanded="true"');?>
						</div>
					</li>
<!-- 					<li class="nav-item dropdown open">
						<a class="nav-link link text-info dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">User</a>
						<div class="dropdown-menu">
							<?=anchor('a3/login', 'Sign In', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('a3/register', 'Sign Up', 'class="text-info dropdown-item display-4"');?>
						</div>
					</li> -->
					<div class="navbar-buttons mbr-section-btn">
						<?=anchor('a3/login', 'Sign In', 'class="btn btn-lg btn-primary display-4"');?>
					</div>
					<div class="navbar-buttons mbr-section-btn">
						<?=anchor('a3/register', 'Sign Up', 'class="btn btn-lg btn-primary display-4"');?>
					</div>
<?php else: ?>

	<?php if( ($this->session->userdata('logged_in') == TRUE) ): ?>
	<?php if($this->session->userdata('group') == 'GM'): ?>
				<li class="nav-item dropdown open">
					<a class="nav-link link text-info dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">Game Master</a>
					<div class="dropdown-menu">

						<div class="dropdown open">
							<a class="text-info dropdown-item dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu">Editing Info</a>
							<div class="dropdown-menu dropdown-submenu">
								<?=anchor('admin/', 'Editing News', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/editing_download', 'Editing Download', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/editing_event', 'Editing Event', 'class="text-info dropdown-item display-4"');?>
							</div>
						</div>

						<div class="dropdown open">
							<a class="text-info dropdown-item dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu">Editing Account</a>
							<div class="dropdown-menu dropdown-submenu">
								<?=anchor('admin/info_account', 'Info About Account', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/changing_account_type', 'Changing Account Type', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/paid_membership', 'Paid Membership', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/list_of_paid_membership', 'List of Paid Membership', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/account_ban', 'Ban Account', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/account_unbanning', 'Unban Account', 'class="text-info dropdown-item display-4"');?>
							</div>
						</div>

						<div class="dropdown open">
							<a class="text-info dropdown-item dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu">Editing Character</a>
							<div class="dropdown-menu dropdown-submenu">
								<?=anchor('admin/character_altering_points', 'Character Altering Points', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/equipping_equipment_and_passive_skill', 'Equipping Equipment And Passive Skill', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/equip_super_super_shue', 'Equip Super Super Shue', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/learn_episode_5_skill', 'Learn Episode 5 Skill', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/altering_level', 'Altering Level', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/inserting_lore', 'Inserting Lore', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/grace_of_silbadu_insertion', 'Grace Of Silbadu Insertion', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/inserting_1_box_of_items', 'Inserting 1 Box of Items', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/inserting_1_item', 'Inserting 1 Item', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/character_clone', 'Character Clone', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/guild_removal', 'Guild Removal', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/info_pk', 'Info PK', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/altering_PK_timer', 'Altering PK timer', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/inserting_items_manually', 'Inserting Items Manually', 'class="text-info dropdown-item display-4"');?>
								<?=anchor('admin/reset_rebirth', 'Character Reset Rebirth', 'class="text-info dropdown-item display-4"');?>
							</div>
						</div>


						<!-- <li><?=anchor('admin/database_back_up', 'Database Back Up', 'class="text-info dropdown-item display-4"');?></li> -->
					</div>
				</li>
	<?php endif ?>
					<li class="nav-item dropdown">
						<?=anchor(base_url(), 'Home', array('class' => 'nav-link link text-info dropdown-toggle display-4', 'data-toggle' => 'dropdown-submenu', 'aria-expanded' => 'false'));?>
						<div class="dropdown-menu">
							<?=anchor('user/index', 'News', array('class' => 'text-info dropdown-item display-4'));?>
							<?=anchor('user/event', 'Event', array('class' => 'text-info dropdown-item display-4'));?>
							<?=anchor('user/download', 'Download', 'class="text-info dropdown-item display-4"');?>
						</div>
					</li>
					<li class="nav-item dropdown open">
						<a class="nav-link link text-info dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">User</a>
						<div class="dropdown-menu">
							<?=anchor('user/change_password', 'Change Password', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/offline_town_portal', 'Offline Town Portal', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/acquire_super_shue', 'Acquire Super Shue', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/buy_all_skill', 'Buy All Skill', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/equip_super_super_shue', 'Equip Super Super Shue', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/buy_lore', 'Buy Lore', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/rebirth', 'Rebirth', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/reset_rebirth', 'Reset Rebirth', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/mercenary_rebirth', 'Mercenary Rebirth', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/mercenary_reset_rebirth', 'Mercenary Reset Rebirth', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/adding_hero_stat_points', 'Adding Hero Stat Points', 'class="text-info dropdown-item display-4"');?>
							<?=anchor('user/adding_mercenary_stat_points', 'Adding Mercenary Stat Points', 'class="text-info dropdown-item display-4"');?>
						</div>
					</li>
		<?php if(($this->session->userdata('group') == 'GoldM') || ($this->session->userdata('group') == 'SM') || ($this->session->userdata('group') == 'BM') || ($this->session->userdata('group') == 'GM')): ?>
					<li class="nav-item dropdown open">
						<a class="nav-link link text-info dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">VIP</a>
						<div class="dropdown-menu">
							<?=anchor('vip/salary', 'Salary', 'class="text-info dropdown-item display-4"');?>
						</div>
					</li>
		<?php endif ?>
	<?php endif ?>
					<div class="navbar-buttons mbr-section-btn">
						<?=anchor('users/logout', 'Logout', 'class="btn btn-sm btn-primary display-4"');?>
					</div>
<?php endif ?>

<?php end_block_marker(); ?>
				</ul>
			</div>
		</nav>
	</section>