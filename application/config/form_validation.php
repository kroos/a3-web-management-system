<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
##################################################################################################

//form validation through controller
//format
/*
$config = array	( 
					'controller/function' => array
					( 
						array
							(
								'field' => 'login',
								'label' => 'Login',
								'rules' => 'trim|required|min_length[6]|max_length[12]'
							)
					)
				);
*/
##################################################################################################

$config = array	( 
					'a3/login' => array
					(
						array
							(
								'field' => 'login',
								'label' => 'Login',
								'rules' => 'trim|callback_username_check|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'passwd',
								'label' => 'Login Password',
								'rules' => 'trim|required|min_length[6]'
							)
					),
					'a3/register' => array
					(
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|callback_username_check|required|min_length[6]|max_length[10]|is_unique[Account.c_id]'
							),
						array
							(
								'field' => 'password1',
								'label' => 'Password',
								'rules' => 'trim|required|matches[password2]|min_length[6]'
							),
						array
							(
								'field' => 'password2',
								'label' => 'Retype Password',
								'rules' => 'trim|required|min_length[6]'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|is_unique[Account.c_headerb]'
							),
						array
							(
								'field' => 'verify',
								'label' => 'Image Verification',
								'rules' => 'trim|required|min_length[5]|max_length[5]|is_natural'
							)
					),
					'a3/password_retrieve' => array
					(
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|callback_username_check|required|min_length[6]|max_length[10]'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|min_length[6]'
							)
					),
					'user/index' => array
					(
						array
							(
								'field' => 'bil_post',
								'label' => 'Bil Post',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'news_reply',
								'label' => 'Reply Section',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'user/event' => array
					(
						array
							(
								'field' => 'bil_post',
								'label' => 'Bil Post',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'news_reply',
								'label' => 'Reply Section',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'user/download' => array
					(
						array
							(
								'field' => 'bil_post',
								'label' => 'Bil Post',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'news_reply',
								'label' => 'Reply Section',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'user/reply' => array
					(
						array
							(
								'field' => 'edit_news',
								'label' => 'Edit Reply',
								'rules' => 'trim|required'
							)
					),
					'user/change_password' => array
					(
						array
							(
								'field' => 'old_password',
								'label' => 'Old Password',
								'rules' => 'callback_old_password_check|trim|required|min_length[6]|max_length[12]'
							),
						array
							(
								'field' => 'password1',
								'label' => 'Password',
								'rules' => 'trim|required|matches[password2]|min_length[6]|max_length[12]'
							),
						array
							(
								'field' => 'password2',
								'label' => 'Retype Password',
								'rules' => 'trim|required|min_length[6]|max_length[12]'
							)
					),
					'user/offline_town_portal' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'town',
								'label' => 'Town',
								'rules' => 'trim|required'
							)
					),
					'user/acquire_super_shue' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'user/buy_all_skill' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'user/equip_super_super_shue' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'user/buy_lore' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'lore',
								'label' => 'Lore Points',
								'rules' => 'trim|required|is_natural_no_zero|greater_than_equal_to[0]'
							)
					),
					'user/rebirth' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'user/reset_rebirth' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'user/mercenary_rebirth' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'merc',
								'label' => 'Mercenary',
								'rules' => 'trim|required|is_natural'
							)
					),
					'user/mercenary_reset_rebirth' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'merc',
								'label' => 'Mercenary',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]'
							)
					),
					'user/char_points' => array
					(
						array
							(
								'field' => 'str',
								'label' => 'Strength',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'int',
								'label' => 'Intelligence',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'dex',
								'label' => 'Dexterity',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'vit',
								'label' => 'Vitality',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'mana',
								'label' => 'Mana',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							)
					),
					'user/merc_points' => array
					(
						array
							(
								'field' => 'str',
								'label' => 'Strength',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'int',
								'label' => 'Intelligence',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'dex',
								'label' => 'Dexterity',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'vit',
								'label' => 'Vitality',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							),
						array
							(
								'field' => 'mana',
								'label' => 'Mana',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]|callback_points_check'
							)
					),
					'vip/salary' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/index' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'news_add',
								'label' => 'News',
								'rules' => 'trim|required|prep_for_form'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/news_edit' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'news_edit',
								'label' => 'News',
								'rules' => 'trim|required|prep_for_form'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/editing_download' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'download_add',
								'label' => 'Download',
								'rules' => 'trim|required|prep_for_form'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/download_edit' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'download_edit',
								'label' => 'Download',
								'rules' => 'trim|required|prep_for_form'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/editing_event' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'event_add',
								'label' => 'Event',
								'rules' => 'trim|required|prep_for_form'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/event_edit' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required'
							),
						array
							(
								'field' => 'event_edit',
								'label' => 'Event',
								'rules' => 'trim|required|prep_for_form'
							),
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required'
							)
					),
					'admin/info_account' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'admin/changing_account_type' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'acc',
								'label' => 'Account Type',
								'rules' => 'trim|required|alpha|min_length[2]|max_length[6]'
							)
					),
					'admin/paid_membership' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'paid',
								'label' => 'Type Of Membership',
								'rules' => 'trim|required|alpha|min_length[2]|max_length[5]'
							),
						array
							(
								'field' => 'month',
								'label' => 'Month',
								'rules' => 'trim|required|is_natural|max_length[2]'
							)
					),
					'admin/account_ban' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'banning',
								'label' => 'Ban Type',
								'rules' => 'trim|required|is_natural_no_zero'
							)
					),
					'admin/equipping_equipment_and_passive_skill' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'eq',
								'label' => 'Equipment',
								'rules' => 'trim|required|min_length[2]'
							),
						array
							(
								'field' => 'psskill',
								'label' => 'Passive Skill',
								'rules' => 'trim|required|min_length[2]'
							)
					),
					'admin/merc_equipping_equipment_and_passive_skill' => array
					(
						array
							(
								'field' => 'merc',
								'label' => 'Mercenary',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'eq',
								'label' => 'Equipment',
								'rules' => 'trim|required|min_length[2]'
							)
					),
					'admin/equip_super_super_shue' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'sss',
								'label' => 'Super Super Shue',
								'rules' => 'trim|required'
							)
					),
					'admin/learn_episode_5_skill' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'admin/altering_level' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'level',
								'label' => 'Level',
								'rules' => 'trim|required|is_natural_no_zero|greater_than_equal_to[0]'
							)
					),
					'admin/merc_alter_level' => array
					(
						array
							(
								'field' => 'merc',
								'label' => 'Mercenary',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'level',
								'label' => 'Level',
								'rules' => 'trim|required|is_natural_no_zero|greater_than_equal_to[0]'
							)
					),
					'admin/inserting_lore' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'lore',
								'label' => 'Lore',
								'rules' => 'trim|required|greater_than_equal_to[0]|is_natural_no_zero'
							)
					),
					'admin/grace_of_silbadu_insertion' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'admin/inserting_1_box_of_items' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'item',
								'label' => 'Item',
								'rules' => 'trim|required|is_natural_no_zero|exact_length[4]'
							),
						array
							(
								'field' => 'slot',
								'label' => 'Slot',
								'rules' => 'trim|required|is_natural_no_zero|min_length[1]|max_length[2]'
							)
					),
					'admin/inserting_1_item' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'item',
								'label' => 'Item',
								'rules' => 'trim|required|min_length[2]'
							),
						array
							(
								'field' => 'slot',
								'label' => 'Slot',
								'rules' => 'trim|required|is_natural|min_length[1]|max_length[2]'
							)
					),
					'admin/character_clone' => array
					(
						array
							(
								'field' => 'char1',
								'label' => 'Character Backup',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'char2',
								'label' => 'Character Restore',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'admin/guild_removal' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'admin/info_pk' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					),
					'admin/altering_PK_timer' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'timer',
								'label' => 'Timer',
								'rules' => 'trim|required|is_natural|greater_than_equal_to[0]'
							)
					),
					'admin/inserting_items_manually' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							),
						array
							(
								'field' => 'code',
								'label' => 'code',
								'rules' => 'trim|required'
							)
					),
					'admin/reset_rebirth' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[2]|max_length[12]'
							)
					)



































				);
$config['error_prefix'] = '<font color="#FF0000">';
$config['error_suffix'] = '</font>';
?>