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
								if ($this->input->post('add_news'))
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
						$data['news'] = $this->a3web_html->news_id($bil);
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
										if ($this->input->post('news_edit_btn'))
											{
												$subject = $this->input->post('subject', TRUE);
												$author = $this->input->post('character', TRUE);
												$html = stripslashes($this->input->post('news_edit', TRUE));
		
												$j = $this->a3web_html->update_news($bil, $html, $subject, $author);
												
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
						$data['news'] = $this->a3web_html->news_id($bil);
						if (is_numeric($bil))
							{
								$r = $this->a3web_html->delete_a3web($bil);
								if ($r)
									{
										redirect (site_url('admin/index'), 'location');
									}
									else
									{
										$data[''] = 'Cant delete the news. Please try again later';
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