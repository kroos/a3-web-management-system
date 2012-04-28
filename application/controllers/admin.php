<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
	{
#############################################################################################################################

		public function index()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$data['news'] = $this->a3web_html->news();
						$data['char'] = $this->charac0->charac_char();
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/home', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('add_news', TRUE))
									{
										$subject = $this->input->post('subject', TRUE);
										$author = $this->input->post('character', TRUE);
										$html = stripslashes($this->input->post('news_add', TRUE));

										$j = $this->a3web_html->insert_news($author, $subject, $html);
										
										if (!$j)
											{
												$data['info'] = 'News not inserted. Please try again';
												$this->load->view('admin/home', $data);
											}
											else
											{
												$data['info'] = 'News inserted';
												$this->load->view('admin/home', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function news_edit()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$bil = $this->uri->segment(3, 0);
						$data['news'] = $this->a3web_html->a3web_id($bil);
						$data['char'] = $this->charac0->charac_char();
						if (is_numeric($bil))
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('admin/news_edit', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('news_edit_btn', TRUE))
											{
												$subject = $this->input->post('subject', TRUE);
												$author = $this->input->post('character', TRUE);
												$html = stripslashes($this->input->post('news_edit', TRUE));

												$j = $this->a3web_html->update_a3web($bil, $html, $subject, $author);
												
												if (!$j)
													{
														$data['info'] = 'News not update. Please try again';
														$this->load->view('admin/news_edit', $data);
													}
													else
													{
														$data['info'] = 'News updated';
														$this->load->view('admin/news_edit', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('admin/news_edit', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function news_del()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
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
										$this->load->view('admin/news_edit', $data);
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('admin/news_edit', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function editing_download()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$data['news'] = $this->a3web_html->download();
						$data['char'] = $this->charac0->charac_char();
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/editing_download', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('add_download', TRUE))
									{
										$subject = $this->input->post('subject', TRUE);
										$author = $this->input->post('character', TRUE);
										$html = stripslashes($this->input->post('download_add', TRUE));

										$j = $this->a3web_html->insert_download($author, $subject, $html);
										
										if (!$j)
											{
												$data['info'] = 'Download not inserted. Please try again';
												$this->load->view('admin/editing_download', $data);
											}
											else
											{
												$data['info'] = 'Download inserted';
												$this->load->view('admin/editing_download', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function download_edit()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$bil = $this->uri->segment(3, 0);
						$data['news'] = $this->a3web_html->a3web_id($bil);
						$data['char'] = $this->charac0->charac_char();
						if (is_numeric($bil))
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('admin/download_edit', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('download_edit_btn', TRUE))
											{
												$subject = $this->input->post('subject', TRUE);
												$author = $this->input->post('character', TRUE);
												$html = stripslashes($this->input->post('download_edit', TRUE));

												$j = $this->a3web_html->update_a3web($bil, $html, $subject, $author);
												
												if (!$j)
													{
														$data['info'] = 'Download not update. Please try again';
														$this->load->view('admin/download_edit', $data);
													}
													else
													{
														$data['info'] = 'Download updated';
														$this->load->view('admin/download_edit', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('admin/download_edit', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function download_del()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
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
										$this->load->view('admin/editing_download', $data);
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('admin/editing_download', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function editing_event()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$data['news'] = $this->a3web_html->event();
						$data['char'] = $this->charac0->charac_char();
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/editing_event', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('add_event', TRUE))
									{
										$subject = $this->input->post('subject', TRUE);
										$author = $this->input->post('character', TRUE);
										$html = stripslashes($this->input->post('event_add', TRUE));

										$j = $this->a3web_html->insert_event($author, $subject, $html);
										
										if (!$j)
											{
												$data['info'] = 'Event not inserted. Please try again';
												$this->load->view('admin/editing_event', $data);
											}
											else
											{
												$data['info'] = 'Event inserted';
												$this->load->view('admin/editing_event', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function event_edit()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$bil = $this->uri->segment(3, 0);
						$data['news'] = $this->a3web_html->a3web_id($bil);
						$data['char'] = $this->charac0->charac_char();
						if (is_numeric($bil))
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('admin/event_edit', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('event_edit_btn', TRUE))
											{
												$subject = $this->input->post('subject', TRUE);
												$author = $this->input->post('character', TRUE);
												$html = stripslashes($this->input->post('event_edit', TRUE));

												$j = $this->a3web_html->update_a3web($bil, $html, $subject, $author);
												
												if (!$j)
													{
														$data['info'] = 'Event not update. Please try again';
														$this->load->view('admin/event_edit', $data);
													}
													else
													{
														$data['info'] = 'Event updated';
														$this->load->view('admin/event_edit', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('admin/event_edit', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function event_del()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
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
										$this->load->view('admin/event_edit', $data);
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('admin/editing_event', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function info_account()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['account'] = NULL;
								$this->load->view('admin/info_account');
							}
							else
							{
								//form processor
								if ($this->input->post('search', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$data['account'] = $this->charac0->search($char);
										//echo $this->db->last_query();

										if (!$data['account'])
											{
												$data['info'] = 'Cant find '.$char.'. Probably the character has been deleted. Please try it again and make sure your spelling is right';
												$this->load->view('admin/info_account', $data);
											}
											else
											{
												$this->load->view('admin/info_account', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function changing_account_type()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/changing_account_type');
							}
							else
							{
								//form processor
								//UPDATE account SET c_sheaderc = '$acc' WHERE (c_id = '$username')
								if ($this->input->post('submit', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$acc = $this->input->post('acc', TRUE);
										$p = $this->charac0->charac($char)->row()->c_sheadera;
										$u = $this->account->update_change_account($p, $acc);
										if (!$u)
											{
												$data['info'] = 'Cant change the account type. Please try it again';
												$this->load->view('admin/changing_account_type', $data);
											}
											else
											{
												$data['info'] = 'Success change the account type for '.$char;
												$this->load->view('admin/changing_account_type', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function paid_membership()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/paid_membership');
							}
							else
							{
								//form processor
								if($this->input->post('vip', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$paid = $this->input->post('paid', TRUE);
										$month = $this->input->post('month', TRUE);

										//get account
										$p = $this->charac0->charac($char);
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
																$this->load->view('admin/paid_membership', $data);
															}
															else
															{
																$data['info'] = 'Success upgrading account type';
																$this->load->view('admin/paid_membership', $data);
															}
													}
													else
													{
														$data['info'] = $char.' is a VIP member. You cant change his/her account till its expiry date.';
														$this->load->view('admin/paid_membership', $data);
													}
											}
											else
											{
												$data['info'] = 'Error : cant insert <b>'.$plus.'</b> wz into <b>'.$char.'</b>. Wz has exceed its limit 4,100,000,000 wz';
												$this->load->view('admin/paid_membership', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function list_of_paid_membership()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$data['query'] = $this->account->membership_list();
						$this->load->view('admin/list_membership', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function account_ban()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/account_ban');
							}
							else
							{
								//form processor
								$this->load->database('HSDB', TRUE);
								if ($this->input->post('ban_account', TRUE))
									{
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
														$this->load->view('admin/account_ban', $data);
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
																$this->load->view('admin/account_ban', $data);
															};
													};
											}
											else
											{
												$data['info'] = 'This '.$char.' have been banned, no need to rebanning him/her again';
												$this->load->view('admin/account_ban', $data);
											};
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function account_unbanning()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$data['banned'] = $this->account->banned_list();
						$this->load->view('admin/account_unban', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function unban()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$acc = $this->uri->segment(3, 0);
						$pass = $this->uri->segment(4, 0);
						$t = $this->account->update_unban_acc($acc, $pass);
						if (!$t)
							{
								$data['info'] = 'Please try again later for account : '.$acc.' with the password : '.$pass.'';
								$data['banned'] = $this->account->banned_list();
								$this->load->view('admin/account_unban', $data);
							}
							else
							{
								redirect('admin/account_unbanning', 'location');
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function character_altering_points()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						//form validation process
						if ($this->input->post('search', TRUE))
							{
								$this->form_validation->set_rules('char', 'Character', 'trim|required|alpha_dash|min_length[2]|max_length[12]|xss_clean');
							}
							else
							{
								if ($this->input->post('alter', TRUE))
									{
										$this->form_validation->set_rules('char', 'Character', 'trim|required|alpha_dash|min_length[2]|max_length[12]|xss_clean');
										$this->form_validation->set_rules('str', 'Strength', 'trim|required|is_natural|less_than[65535]|max_length[5]|xss_clean');
										$this->form_validation->set_rules('int', 'Intelligence', 'trim|required|is_natural|less_than[65535]|max_length[5]|xss_clean');
										$this->form_validation->set_rules('dex', 'Dexterity', 'trim|required|is_natural|less_than[65535]|max_length[5]|xss_clean');
										$this->form_validation->set_rules('vit', 'Vitality', 'trim|required|is_natural|less_than[65535]|max_length[5]|xss_clean');
										$this->form_validation->set_rules('mana', 'Mana', 'trim|required|is_natural|less_than[65535]|max_length[5]|xss_clean');
										$this->form_validation->set_rules('prem', 'Remaining Points', 'trim|required|is_natural|less_than[65535]|max_length[5]|xss_clean');
										$this->form_validation->set_rules('wz', 'Woonz', 'trim|required|is_natural|less_than[4200000000]|max_length[10]|xss_clean');
									}
							}

						//form processor
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/char_alter_points');
							}
							else
							{
								if ($this->input->post('search', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$r = $this->charac0->charac($char);
										if (!$r)
											{
												$data['info'] = 'I cant find the character '.$char.'. Maybe this character have been banned?';
												$this->load->view('admin/char_alter_points', $data);
											}
											else
											{
												$data['query'] = $this->charac0->charac($char);
												$this->load->view('admin/char_alter_points', $data);
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
														$this->load->view('admin/char_alter_points', $data);
													}
													else
													{
														if($points > 100000)
															{
																$data['info'] = $n->row()->c_id.' remaining points exceed more than 100k, '.$points;
																$this->load->view('admin/char_alter_points', $data);
															}
															else
															{
																if($str > 65534)
																	{
																		$data['info'] = $n->row()->c_id.' strength exceed more than 65535, '.$str;
																		$this->load->view('admin/char_alter_points', $data);
																	}
																	else
																	{
																		if($int > 65534)
																			{
																				$data['info'] = $n->row()->c_id.' intelligence exceed more than 65535, '.$int;
																				$this->load->view('admin/char_alter_points', $data);
																			}
																			else
																			{
																				if ($dex > 65534)
																					{
																						$data['info'] = $n->row()->c_id.' dexterity exceed more than 65535, '.$dex;
																						$this->load->view('admin/char_alter_points', $data);
																					}
																					else
																					{
																						if($vit > 65534)
																							{
																								$data['info'] = $n->row()->c_id.' vitality exceed more than 65535, '.$vit;
																								$this->load->view('admin/char_alter_points', $data);
																							}
																							else
																							{
																								if($mana> 65534)
																									{
																										$data['info'] = $n->row()->c_id.' mana exceed more than 65535, '.$mana;
																										$this->load->view('admin/char_alter_points', $data);
																									}
																									else
																									{
																										$r = $this->charac0->update_alter_points($n->row()->c_id, char_stat($str, $int, $dex, $vit, $mana, $points, $n->row()->c_headera), $wz);
																										if (!$r)
																											{
																												$data['info'] = 'Please try it again';
																												$this->load->view('admin/char_alter_points', $data);
																											}
																											else
																											{
																												$data['info'] = 'Success alter '.$n->row()->c_id;
																												$this->load->view('admin/char_alter_points', $data);
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
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function equipping_equipment_and_passive_skill()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/equip_psvskill');
							}
							else
							{
								//form processor
								if($this->input->post('chareq', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$eq = $this->input->post('eq', TRUE);
										$psskill = $this->input->post('psskill', TRUE);

										$h = $this->charac0->charac($char);

										$o = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('WEAR', $eq, $h->row()->m_body));
										$h = $this->charac0->charac($char);
										$o1 = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('PSKILL', $psskill, $h->row()->m_body));

										if (!$o && !$o1 )
											{
												$data['info'] = 'Please try again';
												$this->load->view('admin/equip_psvskill', $data);
											}
											else
											{
												$data['info'] = 'Success equip passive skill and equip gear for  '.$h->row()->c_id;
												$this->load->view('admin/equip_psvskill', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function equip_super_super_shue()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/equip_super_super_shue');
							}
							else
							{
								//form processor
								if($this->input->post('putsss', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$sss = $this->input->post('sss', TRUE);

										$h = $this->charac0->charac($char);
										$o = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('PETACT', $sss, $h->row()->m_body));
										if (!$o)
											{
												$data['info'] = 'Please try again';
												$this->load->view('admin/equip_super_super_shue', $data);
											}
											else
											{
												$data['info'] = 'Success insert super super shue for  '.$h->row()->c_id;
												$this->load->view('admin/equip_super_super_shue', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function learn_episode_5_skill()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/learn_episode_5_skill');
							}
							else
							{
								//form processor
								if($this->input->post('skillepi5', TRUE))
									{
										$char = $this->input->post('char', TRUE);

										$h = $this->charac0->charac($char);
										$o = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('SKILLEX', '4294967295;4294967295;4294967295', $h->row()->m_body));
										if (!$o)
											{
												$data['info'] = 'Please try again';
												$this->load->view('admin/learn_episode_5_skill', $data);
											}
											else
											{
												$data['info'] = 'Success learning episode V skill for  '.$h->row()->c_id;
												$this->load->view('admin/learn_episode_5_skill', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function altering_level()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/altering_level');
							}
							else
							{
								//form processor
								if($this->input->post('charlvl', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$level = $this->input->post('level', TRUE);

										$h = $this->charac0->charac($char);
										$o = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('EXP', $level, $h->row()->m_body));
										if (!$o)
											{
												$data['info'] = 'Please try again';
												$this->load->view('admin/altering_level', $data);
											}
											else
											{
												$data['info'] = 'Success alter level for  '.$h->row()->c_id;
												$this->load->view('admin/altering_level', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function inserting_lore()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/inserting_lore');
							}
							else
							{
								//form processor
								if($this->input->post('insertlore', TRUE))
									{
										$char = $this->input->post('char', TRUE);
										$lore = $this->input->post('lore', TRUE);

										$h = $this->charac0->charac($char);
										$o = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('LORE', $lore, $h->row()->m_body));
										if (!$o)
											{
												$data['info'] = 'Please try again';
												$this->load->view('admin/inserting_lore', $data);
											}
											else
											{
												$data['info'] = 'Success insert lore for  '.$h->row()->c_id;
												$this->load->view('admin/inserting_lore', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function grace_of_silbadu_insertion()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/grace_of_silbadu_insertion');
							}
							else
							{
								//form processor
								if($this->input->post('gos_insert', TRUE))
									{
										$char = $this->input->post('char', TRUE);

										$h = $this->charac0->charac($char);
										$o = $this->charac0->update_mbody($h->row()->c_id, mbody_insert('LORE', '9586;123;123;0;9586;123;123;1;9586;123;123;2;9586;123;123;3;9586;123;123;4;9586;123;123;5;9586;123;123;6;9586;123;123;7;9586;123;123;8;9586;123;123;9', $h->row()->m_body));
										if (!$o)
											{
												$data['info'] = 'Please try again';
												$this->load->view('admin/inserting_lore', $data);
											}
											else
											{
												$data['info'] = 'Success insert lore for  '.$h->row()->c_id;
												$this->load->view('admin/inserting_lore', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

#############################################################################################################################
		public function logout()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) )
					{
						//process
						$array = array 
								(
									'username' => '',
									'password' => '',
									'group' => '',
									'logged_in' => '',
								);
						$this->session->unset_userdata($array);
						redirect(base_url(), 'location');
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}
#############################################################################################################################
//function template
/*
		public function home()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') )
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
							}
							else
							{
								//form processor
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}
//*/
#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('errors/error_custom_404');
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