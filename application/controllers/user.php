<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
	{
#############################################################################################################################

		public function index()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['news'] = $this->a3web_html->news();
						$this->load->view('user/home', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function event()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['event'] = $this->a3web_html->event();
						$this->load->view('user/event', $data);
						
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function download()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['event'] = $this->a3web_html->download();
						$this->load->view('user/download', $data);
						
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function change_password()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/change_password');
							}
							else
							{
								//form processor
								$old_password = $this->input->post('old_password', TRUE);
								$password2 = $this->input->post('password2', TRUE);
								$change_password = $this->input->post('change_password', TRUE);
								if ($old_password != $password2)
									{
										$r = $this->account->update_pasword($this->session->userdata('username'), $password2);
										if (!$r)
											{
												$data['info'] = 'Cant change the password right now. Please try again';
												$this->load->view('user/change_password', $data);
											}
											else
											{
												$this->session->set_userdata('password', $password2);
												$data['info'] = 'Successfull change the password';
												$this->load->view('user/change_password', $data);
											}
									}
									else
									{
										$data['info'] = 'Old and new password is the same. Please try again';
										$this->load->view('user/change_password', $data);
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function offline_town_portal()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['query'] = $this->charac0->charac_char($this->session->userdata('username'));
								$this->load->view('user/offline_town_portal', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								$town = $this->input->post('town', TRUE);
								$data['query'] = $this->charac0->charac_char($this->session->userdata('username'));
								$r = $this->charac0->update_tele($char, $town);
								if ($r)
									{
										$data['info'] = "Successful warped $char";
										$this->load->view('user/offline_town_portal', $data);
									}
									else
									{
										$data['info'] = "Cant warped $char. Please try again";
										$this->load->view('user/offline_town_portal', $data);
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function acquire_super_shue()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['query'] = $this->charac0->charac_char($this->session->userdata('username'));
								$this->load->view('user/acquire_super_shue', $data);
							}
							else
							{
								//form processor
								$data['query'] = $this->charac0->charac_char($this->session->userdata('username'));
								$char = $this->input->post('character', TRUE);
								$y = $this->charac0->charac_cid($char);
								$char_type = $y->row()->c_sheaderb;
								switch ($char_type)
									{
										case 0:
											$PETACT[1] = "1012;76684069;4152360961;4294160367";
											break;
										case 1:
											$PETACT[1] = "1013;76290853;4152360961;4294160495";
											break;
										case 2:
											$PETACT[1] = "1014;75897637;4152360961;4294160379";
											break;
										case 3:
											$PETACT[1] = "1015;76028709;4152360961;4294160367";
											break;
									};
								$charstring = $y->row()->m_body;
								echo m_body_string('WAR', 'jadi dak?', $charstring);
								
								//$this->load->view('user/acquire_super_shue', $data);
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
				if ($this->session->userdata('logged_in') == TRUE)
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
				if ($this->session->userdata('logged_in') == TRUE)
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
		public function email_check($email)
			{
				$query = $this->db_easy->get_account('c_headerb', $email)->count_all_results();
				if ($query == 1)
					{
						$this->form_validation->set_message('email_check', "The %s \"$email\" has been taken");
						return FALSE;
					}
					else
					{
						return TRUE;
					}
			}
//*/
	}

/* End of file a3.php */
/* Location: ./application/controllers/a3.php */