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