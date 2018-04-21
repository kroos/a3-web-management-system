<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
	{
#############################################################################################################################

		function __construct()
		{
			parent::__construct();

			// load library
			$this->load->library(array('session'));
			if ( ($this->session->userdata('logged_in') == FALSE) && ($this->session->userdata('group') != 'GM') ) {
				redirect(base_url(), 'location');
			}
		}


		public function index()
			{
				//process
				$data['news'] = $this->a3web_html->news();
				$data['char'] = $this->charac0->charac_char();

				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$subject = $this->input->post('subject', TRUE);
						$author = $this->input->post('character', TRUE);
						$html = stripslashes($this->input->post('news_add', TRUE));

						$j = $this->a3web_html->insert_news($author, $subject, $html);
						
						if (!$j) {
								$data['info'] = 'News not inserted. Please try again';
							} else {
								$data['info'] = 'News inserted';
							}
					}
				//form
				$this->load->view('admin/home-new', $data);
			}

		public function news_edit()
			{
				//process
				$bil = $this->uri->segment(3, 0);
				$data['news'] = $this->a3web_html->a3web_id($bil);
				$data['char'] = $this->charac0->charac_char();
				if (is_numeric($bil)) {
						if ($this->form_validation->run() == TRUE)
							{
								//form processor
								$subject = $this->input->post('subject', TRUE);
								$author = $this->input->post('character', TRUE);
								$html = stripslashes($this->input->post('news_edit', TRUE));

								$j = $this->a3web_html->update_a3web($bil, $html, $subject, $author);
								
								if (!$j) {
										$data['info'] = 'News not update. Please try again';
									} else {
										$data['info'] = 'News updated';
										redirect('admin/index', 'location');
									}
							}
					} else {
						$data['info'] = 'What are you trying to do?';
					}
				//form
				$this->load->view('admin/news_edit-new', $data);
			}

		public function news_del()
			{
				//process
				$bil = $this->uri->segment(3, 0);
				$data['news'] = $this->a3web_html->a3web_id($bil);
				if (is_numeric($bil))
					{
						$r = $this->a3web_html->delete_a3web($bil);
						if ($r)
							{
								redirect (site_url('admin/index'), 'location');
							}
							else
							{
								$data['info'] = 'Cant delete the news. Please try again later';
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
					}
				$this->load->view('admin/news_edit', $data);
			}

		public function editing_download()
			{
				//process
				$data['news'] = $this->a3web_html->download();
				$data['char'] = $this->charac0->charac_char();
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$subject = $this->input->post('subject', TRUE);
						$author = $this->input->post('character', TRUE);
						$html = stripslashes($this->input->post('download_add', TRUE));

						$j = $this->a3web_html->insert_download($author, $subject, $html);
						
						if (!$j)
							{
								$data['info'] = 'Download not inserted. Please try again';
							}
							else
							{
								$data['info'] = 'Download inserted';
							}
					}
					// form
				$this->load->view('admin/editing_download-new', $data);
			}

		public function download_edit()
			{
						//process
						$bil = $this->uri->segment(3, 0);
						$data['news'] = $this->a3web_html->a3web_id($bil);
						$data['char'] = $this->charac0->charac_char();
						if (is_numeric($bil))
							{
								if ($this->form_validation->run() == TRUE)
									{
										//form processor
										$subject = $this->input->post('subject', TRUE);
										$author = $this->input->post('character', TRUE);
										$html = stripslashes($this->input->post('download_edit', TRUE));

										$j = $this->a3web_html->update_a3web($bil, $html, $subject, $author);
										
										if (!$j)
											{
												$data['info'] = 'Download not update. Please try again';
											}
											else
											{
												$data['info'] = 'Download updated';
												redirect('admin/editing_download', 'location');
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
							}
						$this->load->view('admin/download_edit-new', $data);
			}

		public function download_del()
			{
				//process
				$bil = $this->uri->segment(3, 0);
				$data['news'] = $this->a3web_html->a3web_id($bil);
				if (is_numeric($bil))
					{
						$r = $this->a3web_html->delete_a3web($bil);
						if ($r)
							{
								redirect (site_url('admin/editing_download'), 'location');
							}
							else
							{
								$data['info'] = 'Cant delete the Download. Please try again later';
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
					}
				$this->load->view('admin/editing_download', $data);
			}

		public function editing_event()
			{
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$subject = $this->input->post('subject', TRUE);
						$author = $this->input->post('character', TRUE);
						$html = stripslashes($this->input->post('event_add', TRUE));

						$j = $this->a3web_html->insert_event($author, $subject, $html);
						
						if (!$j)
							{
								$data['info'] = 'Event not inserted. Please try again';
							}
							else
							{
								$data['info'] = 'Event inserted';
							}
					}
				$data['news'] = $this->a3web_html->event();
				$data['char'] = $this->charac0->charac_char();
				$this->load->view('admin/editing_event-new', $data);
			}

		public function event_edit()
			{
				//process
				$bil = $this->uri->segment(3, 0);
				$data['news'] = $this->a3web_html->a3web_id($bil);
				$data['char'] = $this->charac0->charac_char();
				if (is_numeric($bil))
					{
						if ($this->form_validation->run() == TRUE)
							{
								//form processor
								$subject = $this->input->post('subject', TRUE);
								$author = $this->input->post('character', TRUE);
								$html = stripslashes($this->input->post('event_edit', TRUE));

								$j = $this->a3web_html->update_a3web($bil, $html, $subject, $author);
								
								if (!$j)
									{
										$data['info'] = 'Event not update. Please try again';
									}
									else
									{
										$data['info'] = 'Event updated';
										redirect('admin/editing_event', 'location');
									}
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
					}
				//form
				$this->load->view('admin/event_edit-new', $data);
			}

		public function event_del()
			{
				//process
				$bil = $this->uri->segment(3, 0);
				$data['news'] = $this->a3web_html->a3web_id($bil);
				if (is_numeric($bil))
					{
						$r = $this->a3web_html->delete_a3web($bil);
						if ($r)
							{
								redirect (site_url('admin/editing_event'), 'location');
							}
							else
							{
								$data['info'] = 'Cant delete the news. Please try again later';
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
					}
				$this->load->view('admin/editing_event', $data);
			}

		public function info_account()
			{
				//process
				$data['account'] = NULL;
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$data['account'] = $this->charac0->search($char);
						//echo $this->db->last_query();

						if (!$data['account'])
							{
								$data['info'] = 'Cant find '.$char.'. Probably the character has been deleted. Please try it again and make sure your spelling is right';
							}
					}
				//form
				$this->load->view('admin/info_account-new', $data);
			}

		public function changing_account_type()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						//UPDATE account SET c_sheaderc = '$acc' WHERE (c_id = '$username')
						$char = $this->input->post('char', TRUE);
						$acc = $this->input->post('acc', TRUE);
						$p = $this->charac0->charac($char)->row()->c_sheadera;
						$u = $this->account->update_change_account($p, $acc);
						if (!$u)
							{
								$data['info'] = 'Cant change the account type. Please try it again';
							}
							else
							{
								$data['info'] = 'Success change the account type for '.$char;
							}
					}
				//form
				$this->load->view('admin/changing_account_type-new', $data);
			}

		public function paid_membership()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$paid = $this->input->post('paid', TRUE);
						$month = $this->input->post('month', TRUE);

						//get account
						$p = $this->charac0->charac($char);
						$poi = $p->num_rows();
						// echo $poi;
						if($poi > 0)
							{
								$user = $p->row()->c_sheadera;
								$wz = $p->row()->c_headerc;
								$h = $this->account->account_cid($user);
								//echo $this->db->last_query().'<br />';
								$acc_type = $h->row()->c_sheaderc;
								//echo $acc_type.'<br />';

								//periksa samada nak burst atau dak utk gaji
								switch ($paid)
									{
										default :
											$payment1 = NULL;
										break;
										case 'BM':
											$payment1 = $this->config->item('BMP');
										break;
										case 'SM':
											$payment1 = $this->config->item('SMP');
										break;
										case 'GoldM':
											$payment1 = $this->config->item('GoldMP');
										break;
									};

								$plus = $wz + $payment1;

								if ($plus <= 4100000000)
									{
										if($h->row()->c_sheaderc != 'BM' && $h->row()->c_sheaderc != 'SM' && $h->row()->c_sheaderc != 'GoldM' )
											{
												//tarikh selepas $month
												$b = $this->db->select('DATEADD(month, '.$month.', getDate()) AS datemonth')->get()->row()->datemonth;
												//echo $b.'<br />';
												//echo $this->db->last_query();
												//change the account
												$l = $this->account->update_vip_account($user, $paid, $b);
												//inserting wz
												$e = $this->charac0->update_vip_account($char, $user, $plus);
												if(!$l && !$e)
													{
														$data['info'] = 'Cant change membership type. Please try again later';
													}
													else
													{
														$data['info'] = 'Success upgrading account type';
													}
											}
											else
											{
												$data['info'] = $char.' is a VIP member. You cant change his/her account till its expiry date.';
											}
									}
									else
									{
										$data['info'] = 'Error : cant insert <b>'.$plus.'</b> wz into <b>'.$char.'</b>. Wz has exceed its limit 4,100,000,000 wz';
									}
							}
							else
							{
								$data['info'] = $char.' was not found';
							}
					}
				//form
				$this->load->view('admin/paid_membership-new', $data);
			}

		public function list_of_paid_membership()
			{
				//process
				$data['query'] = $this->account->membership_list();
				$this->load->view('admin/list_membership-new', $data);
			}

		public function account_ban()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						$this->load->database('HSDB', TRUE);
						//form processor
						$char = $this->input->post('char', TRUE);
						$ban_type = $this->input->post('banning', TRUE);
						$e = $this->charac0->charac($char);
						$username = $e->row()->c_sheadera;
						$f = $this->account->account_cid_ban($username);
						$backpass = $f->row()->c_headera;
						if ($backpass != $this->config->item('secret_password'))
							{
								if ($ban_type == 1 )
									{
										//n then we start update the account table
										$this->account->update_ban_account($username, $backpass);

										$data['info'] = 'Succesfully ban '.$char.'';
									}
									else
									{
										if ($ban_type == 2 )
											{
												//delete mercenaries
												$t = $this->charac0->user_char($username);
												foreach($t->result() as $master)
													{
														//delete every merc for each of master
														$this->hsstonetable->delete_stone_master($master->c_id);

														//delete from hstable
														$this->hstable->delete_hstable($master->c_id);

														//delete from merc
														$this->merc->delete_merc($master->c_id);
													}
												//delete all the char from Charac0 table...
												$this->charac0->delete_all_char($username);

												//delete the account
												$this->account->delete_acc($username);

												//delete the itemstorage
												$this->itemstorage0->delete_storage($username);

												$data['info'] = 'Successfully DELETING '.$char.' account';
											};
									};
							}
							else
							{
								$data['info'] = 'This '.$char.' have been banned, no need to rebanning him/her again';
							}
					}
				//form
				$this->load->view('admin/account_ban-new', $data);
			}

		public function account_unbanning()
			{
				//process
				$data['banned'] = $this->account->banned_list();
				$this->load->view('admin/account_unban-new', $data);
			}

		public function unban()
			{
				$data['info'] = NULL;
				//process
				$acc = $this->uri->segment(3, 0);
				$pass = $this->uri->segment(4, 0);
				$t = $this->account->update_unban_acc($acc, $pass);
				if (!$t)
					{
						$data['info'] = 'Please try again later for account : '.$acc.' with the password : '.$pass.'';
						$data['banned'] = $this->account->banned_list();
					}
					else
					{
						redirect('admin/account_unbanning', 'location');
					}
				$this->load->view('admin/account_unban', $data);
			}

		public function character_altering_points()
			{
				$data['info'] = NULL;
				//process
				if ($this->input->post('search', TRUE))
					{
						$this->form_validation->set_rules('char', 'Character', 'trim|required|alpha_dash|min_length[2]|max_length[12]');
					}
					else
					{
						if ($this->input->post('alter', TRUE))
							{
								$this->form_validation->set_rules('char', 'Character', 'trim|required|alpha_dash|min_length[2]|max_length[12]');
								$this->form_validation->set_rules('str', 'Strength', 'trim|required|is_natural|less_than[65535]|max_length[5]');
								$this->form_validation->set_rules('int', 'Intelligence', 'trim|required|is_natural|less_than[65535]|max_length[5]');
								$this->form_validation->set_rules('dex', 'Dexterity', 'trim|required|is_natural|less_than[65535]|max_length[5]');
								$this->form_validation->set_rules('vit', 'Vitality', 'trim|required|is_natural|less_than[65535]|max_length[5]');
								$this->form_validation->set_rules('mana', 'Mana', 'trim|required|is_natural|less_than[65535]|max_length[5]');
								$this->form_validation->set_rules('prem', 'Remaining Points', 'trim|required|is_natural|less_than[65535]|max_length[5]');
								$this->form_validation->set_rules('wz', 'Woonz', 'trim|required|is_natural|less_than[4200000000]|max_length[10]');
							}
					}

				//form processor
				if ($this->form_validation->run() == TRUE)
					{
						if ($this->input->post('search', TRUE))
							{
								$char = $this->input->post('char', TRUE);
								$r = $this->charac0->charac($char);
								if (!$r)
									{
										$data['info'] = 'I cant find the character '.$char.'. Maybe this character have been banned?';
									}
									else
									{
										$data['query'] = $this->charac0->charac($char);
									}
							}
							else
							{
								if ($this->input->post('alter', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$str = $this->input->post('str', TRUE);
										$int = $this->input->post('int', TRUE);
										$dex = $this->input->post('dex', TRUE);
										$mana = $this->input->post('mana', TRUE);
										$vit = $this->input->post('vit', TRUE);
										$points = $this->input->post('prem', TRUE);
										$wz = $this->input->post('wz', TRUE);

										$n = $this->charac0->charac($char);
										$wz += $n->row()->c_headerc;
										
										$str += char_attrib('STR', $n->row()->c_headera);
										$int += char_attrib('INT', $n->row()->c_headera);
										$dex += char_attrib('DEX', $n->row()->c_headera);
										$vit += char_attrib('VIT', $n->row()->c_headera);
										$mana += char_attrib('MANA', $n->row()->c_headera);
										$points += char_attrib('POINTS', $n->row()->c_headera);
										
										if ($wz > 4100000000)
											{
												$data['info'] = $n->row()->c_id.' exceed more than 4.1b wz, '.$wz;
											}
											else
											{
												if($points > 100000)
													{
														$data['info'] = $n->row()->c_id.' remaining points exceed more than 100k, '.$points;
													}
													else
													{
														if($str > 65534)
															{
																$data['info'] = $n->row()->c_id.' strength exceed more than 65535, '.$str;
															}
															else
															{
																if($int > 65534)
																	{
																		$data['info'] = $n->row()->c_id.' intelligence exceed more than 65535, '.$int;
																	}
																	else
																	{
																		if ($dex > 65534)
																			{
																				$data['info'] = $n->row()->c_id.' dexterity exceed more than 65535, '.$dex;
																			}
																			else
																			{
																				if($vit > 65534)
																					{
																						$data['info'] = $n->row()->c_id.' vitality exceed more than 65535, '.$vit;
																					}
																					else
																					{
																						if($mana> 65534)
																							{
																								$data['info'] = $n->row()->c_id.' mana exceed more than 65535, '.$mana;
																							}
																							else
																							{
																								$r = $this->charac0->update_alter_points($n->row()->c_id, char_stat($str, $int, $dex, $vit, $mana, $points, $n->row()->c_headera), $wz);
																								if (!$r)
																									{
																										$data['info'] = 'Please try it again';
																									}
																									else
																									{
																										$data['info'] = 'Success alter '.$n->row()->c_id;
																									}
																							}
																					}
																			}
																	}
															}
													}
											}
									}
							}
					}
				//form
				$this->load->view('admin/char_alter_points-new', $data);
			}

		public function merc_alter_points()
		{
			$data['info'] = NULL;
			//process
			if ($this->input->post('search', TRUE))
				{
					$this->form_validation->set_rules('merc', 'Mercenary', 'trim|required|alpha_dash|min_length[2]|max_length[12]');
				}
				else
				{
					if ($this->input->post('alter', TRUE))
						{
							$this->form_validation->set_rules('merc', 'Mercenary', 'trim|required');
							$this->form_validation->set_rules('str', 'Strength', 'trim|required|is_natural|less_than[65535]|max_length[5]');
							$this->form_validation->set_rules('int', 'Intelligence', 'trim|required|is_natural|less_than[65535]|max_length[5]');
							$this->form_validation->set_rules('dex', 'Dexterity', 'trim|required|is_natural|less_than[65535]|max_length[5]');
							$this->form_validation->set_rules('vit', 'Vitality', 'trim|required|is_natural|less_than[65535]|max_length[5]');
							$this->form_validation->set_rules('mana', 'Mana', 'trim|required|is_natural|less_than[65535]|max_length[5]');
							$this->form_validation->set_rules('prem', 'Remaining Points', 'trim|required|is_natural|less_than[100000]|max_length[5]');
						}
				}

			if ($this->form_validation->run() == TRUE) {
				$merc = $this->input->post('merc', TRUE);

				if ($this->input->post('search', TRUE)){
					$h = $this->hstable->GetWhere(array('HSName' => $merc), NULL, NULL);
					if(!$h) {
						$data['info'] = 'I cant find the character '.$merc;
					} else {
						$data['query'] = $this->hstable->GetWhere(array('HSName' => $merc), NULL, NULL);
					}
				}else{
					if ($this->input->post('alter', TRUE)){
						$merc = $this->input->post('merc', TRUE);

						$str = $this->input->post('str', TRUE);
						$int = $this->input->post('int', TRUE);
						$dex = $this->input->post('dex', TRUE);
						$mana = $this->input->post('mana', TRUE);
						$vit = $this->input->post('vit', TRUE);
						$points = $this->input->post('prem', TRUE);

						$n = $this->hstable->GetWhere(array('HSID' => $merc), NULL, NULL);
						$ability = $n->row()->Ability;

						$str += merc_attrib('STR', $ability);
						$int += merc_attrib('INT', $ability);
						$dex += merc_attrib('DEX', $ability);
						$vit += merc_attrib('VIT', $ability);
						$mana += merc_attrib('MANA', $ability);
						$points += merc_attrib('POINTS', $ability);

						if ($str > 65534) {
							$data['info'] = $n->row()->HSName.' strength exceed more than 65535, '.$str;
						} else {
							if ($int > 65534) {
								$data['info'] = $n->row()->HSName.' intelligence exceed more than 65535, '.$int;
							} else {
								if ($dex > 65534) {
									$data['info'] = $n->row()->HSName.' dexterity exceed more than 65535, '.$dex;
								} else {
									if ($mana > 65534) {
										$data['info'] = $n->row()->HSName.' mana exceed more than 65535, '.$mana;
									} else {
										if ($vit > 65534) {
											$data['info'] = $n->row()->HSName.' vitality exceed more than 65535, '.$vit;
										} else {
											if ($points > 100000) {
												$data['info'] = $n->row()->HSName.' points remaining exceed more than 100k, '.$points;
											} else {
												$r = $this->hstable->update(array('Ability' => merc_stat($str, $int, $dex, $vit, $mana, $points, $ability)), array('HSID' => $merc));
												if (!$r) {
													$data['info'] = 'Please try again later';
												} else {
													$data['info'] = 'Success alter points for '.$n->row()->HSName;
												}
												
											}
										}
									}
								}
							}
						}
					}
				}
			}
			$this->load->view('admin/merc_alter_points', $data);
		}

		public function equipping_equipment_and_passive_skill()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$eq = $this->input->post('eq', TRUE);
						$psskill = $this->input->post('psskill', TRUE);

						$h = $this->charac0->charac($char);

						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('WEAR', $eq, $h->row()->m_body));
						$h = $this->charac0->charac($char);
						$o1 = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('PSKILL', $psskill, $h->row()->m_body));

						if (!$o && !$o1 )
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success equip passive skill and equip gear for  '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/equip_psvskill-new', $data);
			}

		public function merc_equipping_equipment_and_passive_skill()
		{
			$data['info'] = NULL;
			// process
			if ($this->form_validation->run() == TRUE) {
				// form processing
				$merc = $this->input->post('merc', TRUE);
				$eq = $this->input->post('eq', TRUE);

				$y = $this->hstable->GetWhere(array('HSName' => $merc), NULL, NULL);
				// echo $this->db->last_query();
				$id = $y->row()->HSID;
				$hsbody = $y->row()->HSBody;

				$gh = $this->hstable->update(array('HSBody' => hsbody_insert('WEAR', $eq, $hsbody)), array('HSID' => $id));
				// echo $this->db->last_query();

				$yz = $this->hstable->GetWhere(array('HSName' => $merc), NULL, NULL);
				$idz = $yz->row()->HSID;
				$hsbodyz = $yz->row()->HSBody;

				$gp = $this->hstable->update(array('HSBody' => hsbody_insert('SKILL', '126;126;126;126;126;126;126;126;126;126', $hsbodyz)), array('HSID' => $idz));
				// echo $this->db->last_query();
				if (!$gh && !$gp )
					{
						$data['info'] = 'Please try again';
					}
					else
					{
						$data['info'] = 'Success equip passive skill and equip gear for  '.$y->row()->HSName;
					}
			}
			$this->load->view('admin/merc_equipping_equipment_and_passive_skill', $data);
		}

		public function equip_super_super_shue()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$sss = $this->input->post('sss', TRUE);

						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('PETACT', $sss, $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success insert super super shue for  '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/equip_super_super_shue-new', $data);
			}

		public function learn_episode_5_skill()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);

						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('SKILLEX', '4294967295;4294967295;4294967295', $h->row()->m_body));
						$m = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('SKILL', '4294967295;4294967295;4294967295', $h->row()->m_body));
						if (!$o || !$m)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success learning episode V skill for  '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/learn_episode_5_skill-new', $data);
			}

		public function altering_level()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$level = $this->input->post('level', TRUE);

						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('EXP', $level, $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success alter level for  '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/altering_level-new', $data);
			}

		public function merc_alter_level()
		{
			$data['info'] = NULL;
			if ($this->form_validation->run() == TRUE) {
				$merc = $this->input->post('merc', TRUE);
				$level = $this->input->post('level', TRUE);
				$rs = $this->hstable->GetWhere(array('HSName' => $merc), NULL, NULL);
				// echo $rs->num_rows();
				if ($rs->num_rows() > 0) {
					$hsid = $rs->row()->HSID;
					$ty = $this->hstable->update(array('HSExp' => $level), array('HSID' => $hsid));
					if (!$ty) {
						$data['info'] = 'Please try again later';
					} else {
						$data['info'] = 'Success alter level. You need to login and hit any monster for the mercenary to level up.';
					}
				} else {
					$data['info'] = 'Mercenary not found. Please check again mercenary\'s name. It\'s case sensitive.';
				}
			}
			$this->load->view('admin/merc_alter_level', $data);
		}

		public function inserting_lore()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$lore = $this->input->post('lore', TRUE);

						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('LORE', $lore, $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success insert lore for  '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/inserting_lore-new', $data);
			}

		public function grace_of_silbadu_insertion()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);

						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('INVEN', '9586;123;123;0;9586;123;123;1;9586;123;123;2;9586;123;123;3;9586;123;123;4;9586;123;123;5;9586;123;123;6;9586;123;123;7;9586;123;123;8;9586;123;123;9', $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success insert lore for '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/grace_of_silbadu_insertion-new', $data);
			}

		public function inserting_1_box_of_items()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$item = $this->input->post('item', TRUE);
						$slot = $this->input->post('slot', TRUE);

						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('INVEN', '17;164'.$item.';131845;'.$slot.';', $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success insert a box of item for  '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/inserting_1_box_of_items-new', $data);
			}

		public function inserting_1_item()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$item = $this->input->post('item', TRUE);
						$slot = $this->input->post('slot', TRUE);

						$h = $this->charac0->charac($char);
						
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('INVEN', $item.';'.$slot.';'.mbody_part('INVEN', $h->row()->m_body), $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success insert GAME MASTER item for '.$h->row()->c_id;
							}
					}
				//form
				$this->load->view('admin/inserting_1_item-new', $data);
			}

		public function character_clone()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char1 = $this->input->post('char1', TRUE);	//old char
						$char2 = $this->input->post('char2', TRUE);	//new char

						$h1 = $this->charac0->charb($char1);
						$h2 = $this->charac0->charac($char2);		//must make sure that char2 is alive

						if($h1->num_rows() < 1)
							{
								$data['info'] = 'Cant find '.$char1.'. Please make sure that you type it correctly';
							}
							else
							{
								if ($h2->num_rows() < 1)
									{
										$data['info'] = 'Cant find '.$char2.'. Please make sure that you type it correctly and that character is not having status "X"';
									}
									else
									{
										//transfer all the info from char1 to char2
										$r = $this->charac0->update_char_clone($h2->row()->c_id, $h1->row()->c_sheaderc, $h1->row()->c_headera, $h1->row()->c_headerb, $h1->row()->c_headerc, $h1->row()->d_cdate, $h1->row()->d_udate, mbody_insert('SINFO', '0', $h1->row()->m_body), $h1->row()->rb, $h1->row()->times_rb);		//buang kh siap siap
										if (!$r)
											{
												$data['info'] = 'Cant transfer data from '.$h1->row()->c_id.' (old character) to '.$h2->row()->c_id.' (new char)';
											}
											else
											{
												//disable char1 just in case
												$j = $this->charac0->update_disable_char($h1->row()->c_id);
												if (!$j)
													{
														$data['info'] = 'Cant disable character '.$h1->row()->c_id.' (old character)';
													}
													else
													{
														//now we start backing the merc, 1st we need to find the correct name for char cos at the HSSTONETABLE, it was case sensitive
														$char100 = $h1->row()->c_id;
														//find another char name like above
														$char101 = $h2->row()->c_id;
														$this->load->database('HSDB');
														//then we find update at HSSTONETABLE
														//collect all data from char been deleted.
														$l1 = $this->hsstonetable->master($h1->row()->c_id);
														if ( $l1->num_rows() < 1 )
															{
																$data['info'] = $h1->row()->c_id.' doesn\'t have any mercenary (HSSTONETABLE)';
															}
															else
															{
																//now we r updating new char with the mercenary which is $char101
																$kapcai = $this->hsstonetable->update_transfer($h2->row()->c_id, $l1->row()->CreateDate, $l1->row()->SaveDate, $l1->row()->Slot0, $l1->row()->Slot1, $l1->row()->Slot2, $l1->row()->Slot3);
												
																//now we r deleting 'old char' which is $char100
																$sucdel = $this->hsstonetable->delete_stone_master($char100);
												
																//updating data at HSTABLE, but we need to find merc if there is more than 1 merc.
																$rs103 = $this->hstable->hstable_char($h1->row()->c_id);
																if ($rs103->num_rows() < 1)
																	{
																		$data['info'] = $h1->row()->c_id.' doesn\'t have any mercenary (HSTABLE)';
																	}
																	else
																	{
																		foreach ($rs103->result() as $mers)
																			{
																				//updating the HSTABLE process
																				$sql104 = $this->hstable->update_transfer($$mers->HSID, $h2->row()->c_id);
																				if (!$sql104)
																					{
																						$data['info'] = 'Cant transfer the merc but however that character is fully restored';
																					}
																					else
																					{
																						$data['info'] = 'Successfull cloning the character and the mercenary';
																					}
																			}
																	}
															}
													}
											}
									}
							}
					}
				//form
				$this->load->view('admin/character_clone-new', $data);
			}

		public function guild_removal()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);

						$h = $this->charac0->charac($char);
						
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('SINFO', '0', $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success removing knighthood from '.$h->row()->c_id;
							}
					}
				$this->load->view('admin/guild_removal-new', $data);
			}

		public function info_pk()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);

						$data['h'] = $this->charac0->charac($char);
						if (!$data['h'])
							{
								$data['info'] = 'Please try again';
							} else {
								$data['info'] = 'Success';
							}
					}
				$this->load->view('admin/info_pk-new', $data);
			}

		public function altering_PK_timer()
			{
				$data['info'] = NULL;
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$timer = $this->input->post('timer', TRUE);
						$h = $this->charac0->charac($char);
						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('RTM', $timer, $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success modify PK timer for '.$h->row()->c_id;
							}
					}
				$this->load->view('admin/altering_PK_timer-new', $data);
			}

		public function inserting_items_manually()
			{
				$data['info'] = NULL;
				if ($this->form_validation->run() == TRUE)

					{
						//form processor
						$char = $this->input->post('char', TRUE);
						$code = $this->input->post('code', TRUE);

						$h = $this->charac0->charac($char);

						$o = $this->charac0->update_mbody_gm($h->row()->c_id, mbody_insert('INVEN', $code.mbody_part('INVEN', $h->row()->m_body), $h->row()->m_body));
						if (!$o)
							{
								$data['info'] = 'Please try again';
							}
							else
							{
								$data['info'] = 'Success inject the code for '.$h->row()->c_id;
							}
					}
				$this->load->view('admin/inserting_items_manually-new', $data);
			}

		public function reset_rebirth()
			{
				$data['info'] = NULL;
				if ($this->form_validation->run() == TRUE)
					{
						//form processor
						$char = $this->input->post('char', TRUE);
						
						$t = $this->charac0->charac_cid($char);
						if ($t->num_rows() == 1)
							{
								//--------------------check level rebirth----------------------------
								$rblvl = $t->row()->rb;
								//echo "<p align='center'>$char rebirth level is $rblvl.</p>";
								//--------------------check wz----------------------------------
								$rbwz = $t->row()->c_headerc;
								//echo "<p align='center'>In $char inventory have $rbwz wz.</p>";
								//--------------------check rebirth times----------------------------
								$rblvltimes = $t->row()->times_rb;
								//echo "<p align='center'>$char reset rebirth for $rblvltimes times.</p>";
								//---------------------------reset rebirth operation----------------------------------------------------
								//1st we check rb times, it should be no more than 2 times rb
								if ($rblvltimes < 3 )
									{
										//1st we check rebirth level
										if ($rblvl >= $this->config->item('rebirth_count'))
											{
												//then we check the wz
												if ($rbwz >= $this->config->item('wzresetrebirth'))
													{
														//initialize wz balance
														$wz = $rbwz - $this->config->item('wzresetrebirth');
														//initialize reset rb times
														$resetrb = $rblvltimes + 1;
														$rson = $this->charac0->update_reset_rebirth($char, $wz, $resetrb);
														if (!$rson)
															{
																$data['info'] = 'Sorry, internal server error, please try again later';
															}
															else
															{
																$data['info'] = 'Successful reset rebirth';
																$this->account->update_activity();
															};
													}
													else
													{
														$data['info'] = "Insufficient wz, your $char only have $rbwz wz";
													};
											}
											else
											{
												$data['info'] = "$char rebirth level is $rblvl, $char need to have at least rebirth level ".$this->config->item('rebirth_count')." to reset its rebirth";
											};
									}
									else
									{
										$data['info'] = 'You are now a god in this server, you cant reset rb anymore';
									}
							}
					}
				$this->load->view('admin/reset_rebirth-new', $data);
			}

		public function database_back_up()
			{
				//process
				if ($this->form_validation->run() == TRUE)
					{
						//form
					}
					else
					{
						//form processor
					}
			}

		public function mercsearch()
		{
			//get search term
			$searchTerm = $_GET['term'];
			// $top = $_GET['limit'];
			$top = 10;

			//get matched data from hstable table
			$sql = "SELECT TOP(".$this->db->escape_str($top).") * FROM HSTABLE WHERE HSName LIKE '%".$this->db->escape_like_str($searchTerm)."%' ORDER BY HSName";
			$gh = $this->db->query($sql);
			// echo $this->db->last_query();

			foreach ($gh->result() as $row) {
				$data[] = $row->HSName;
			}

			//return json data
			echo json_encode($data);
		}

		public function charsearch()
		{
			//get search term
			$searchTerm = $_GET['term'];
			// $top = $_GET['limit'];
			$top = 10;

			//get matched data from hstable table
			$sql = "SELECT TOP(".$this->db->escape_str($top).") * FROM Charac0 WHERE c_id LIKE '%".$this->db->escape_like_str($searchTerm)."%' ORDER BY c_id";
			$gh = $this->db->query($sql);
			// echo $this->db->last_query();

			foreach ($gh->result() as $row) {
				$data[] = $row->c_id;
			}

			//return json data
			echo json_encode($data);
		}

#############################################################################################################################
//form validation data process
///*
		public function old_password_check($username)
			{
				if ($username != $this->session->userdata('password'))
					{
						//echo $query;
						$this->form_validation->set_message('old_password_check', "The %s not correct");
						return FALSE;
					}
					else
					{
						//echo $query;
						return TRUE;
					}
			}
//*/
///*
		public function points_check($points)
			{
				if ($points > 65535)
					{
						//echo $query;
						$this->form_validation->set_message('points_check', "%s exceed more than 65535");
						return FALSE;
					}
					else
					{
						//echo $query;
						return TRUE;
					}
			}
//*/
	}

/* End of file a3.php */
/* Location: ./application/controllers/a3.php */