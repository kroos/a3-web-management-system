<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A3 extends CI_Controller {

	public function index()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['news'] = $this->a3web_html->news();
					$this->load->view('home', $data);
				}
		}

	public function event()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['event'] = $this->a3web_html->event();
					$this->load->view('event', $data);
				}
		}

	public function download()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['event'] = $this->a3web_html->download();
					$this->load->view('download', $data);
				}
		}

	public function login()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
					if ($this->form_validation->run() == FALSE)
						{
							$this->load->view('login');
						}
						else
						{
							$login = $this->input->post('login', TRUE);
							$passwd = $this->input->post('passwd', TRUE);
							$sign_in = $this->input->post('sign-in', TRUE);
							if(isset($login) && isset($passwd) && isset($sign_in))
								{
									$data['query'] = $this->account->account_user($login, $passwd);
									$rows = $data['query']->num_rows();
		
									if ($rows == 1)
										{
											$row = $data['query']->row();
											$user_category = $row->c_sheaderc;
											$user = array
														(
															'username' => $login,
															'password' => $passwd,
															'group' => $user_category,
															'logged_in' => TRUE
														);
											$this->session->set_userdata($user);
											if ($row->c_sheaderc == 'SM' || $row->c_sheaderc == 'BM' || $row->c_sheaderc == 'GoldM' || $row->c_sheaderc == 'Normal' || $row->c_sheaderc == 'GM')
												{
													redirect('/user/home', 'location');
												}
										}
										else
										{
											//login not correct
											$data['info'] = 'Login incorrect or you havent register/activate your account';
											$this->load->view('login', $data);
										}
								}
						}
				}
		}

	function register()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
					if ($this->form_validation->run() == FALSE)
						{
							//form
							//initiate var for captcha helper
							$vals = array
								(
									'word' => rand(10000, 99999),
									'img_path' => './images/captcha/',
									'img_url' => base_url().'images/captcha/',
									//'font_path' => './path/to/fonts/texb.ttf',
									'img_width' => 150,
									'img_height' => 30,
									'expiration' => 1800
								);
							$data['cap'] = create_captcha($vals);
							$this->captcha->insert_captcha($data['cap']['time'], $data['cap']['word']);
							$this->load->view('register', $data);
						}
						else
						{
							//form process
							$username = $this->input->post('username', TRUE);
							$password1 = $this->input->post('password1', TRUE);
							$verify = $this->input->post('verify', TRUE);
							$email = $this->input->post('email', TRUE);

							//initiate var for captcha helper
							$vals = array
								(
									'word' => rand(10000, 99999),
									'img_path' => './images/captcha/',
									'img_url' => base_url().'images/captcha/',
									//'font_path' => './path/to/fonts/texb.ttf',
									'img_width' => 150,
									'img_height' => 30,
									'expiration' => 1800
								);
							$data['cap'] = create_captcha($vals);
							$this->captcha->insert_captcha($data['cap']['time'], $data['cap']['word']);

							//we need to check the capthca
							$expiration = time()-1800; // Two hour limit
							//delete captcha 2 hours ago
							$this->captcha->delete_captcha($expiration);

							//check the new 1
							$check = $this->captcha->captcha($verify, $expiration)->num_rows();

							if ($check == 0)
								{
									$data['info'] = 'You must submit the word that appears in the image';
									$this->load->view('register', $data);
								}
								else
								{

									$passkey = md5(uniqid(rand()));
									$date = mssqldate();
									$subject = $this->config->item('homepage').' Activation Link For '.$username.' Account';
									$message = "<html>
												<head>
												<meta http-equiv='Content-Language' content='en-us'>
												<meta name='GENERATOR' content='Microsoft FrontPage 6.0'>
												<meta name='ProgId' content='FrontPage.Editor.Document'>
												<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
												<title>".$this->config->item('homepage')." Activation Link.</title>
												</head>
												<body>
												<p align='center'>Your username : $username</p>";
									$message .= "<p align='center'>This is your password : $password1</p>";
									$message .=	"<p align='center'><a href='".$this->config->item('forum_url')."'>".$this->config->item('homepage')." Forum</a></p>
												<p align='center'><a href='".site_url()."'>".$this->config->item('homepage')." Account Management Tools</a></p>
												<p align='center'><a href='".site_url("a3/activate/$passkey")."'>Click Here To Activate Your Account.</a></p>
												<p align='center'>You are receiving this e-mail because a user with an IP address of ".$_SERVER['REMOTE_ADDR']." signed up on <a href='http://".site_url()."'>".$this->config->item('homepage')." Account Management Tools</a> using your e-mail address. If this was not you, simply ignore this e-mail, and no further messages will be sent.</p>
												</body></html>";
							
									$email = send_email($email, $username, $subject, $message, $this->config->item('pop3_server'), $this->config->item('pop3_port'), $this->config->item('username'), $this->config->item('password'), $this->config->item('SMTP_auth'), $this->config->item('smtp_server'), $this->config->item('smtp_port'), $this->config->item('SMTP_Secure'), $this->config->item('addreplyto_email'), $this->config->item('addreplyto_name'), $this->config->item('from'), $this->config->item('from_name'));
									if ($email == TRUE)
										{
											$query = $this->temp_account->insert_temp_account($username, $password1, $email, $passkey);
											if($query)
												{
													$data['info'] = 'Please check activation email<br />If the email is not in the inbox, please check your JUNK folder and add it into white list';
													$this->load->view('register', $data);
												}
												else
												{
													$data['info'] = 'Please check activation email<br />Please try again later. We are sorry for the inconvenience';
													$this->load->view('register', $data);
												}
										}
										else
										{
											$data['info'] = 'Activation email cant be send right now<br />Please try again later';
											$this->load->view('register', $data);
										}
								}
						}
				}
		}

	function password_retrieve()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
					if ($this->form_validation->run() == FALSE)
						{
							//form
							$this->load->view('password_retrieve');
						}
						else
						{
							//form process
							if ($this->input->post('forgot_password', TRUE))
								{
									$username = $this->input->post('username', TRUE);
									$email = $this->input->post('email', TRUE);

									$query = $this->account->account_get_password($username, $email);
									if ($query->num_rows() == 1)
										{
											$password = $query->row()->c_headera;
											if ($password == $this->config->item('secret_password'))
												{
													$data['info'] = 'You have been banned by Game Master. You cant retrieve your password through the AMT';
													$this->load->view('password_retrieve', $data);
												}
												else
												{
													$subject = 'Your Password For '.$this->config->item('homepage');
													$message = "<html>
																<head>
																<meta http-equiv='Content-Language' content='en-us'>
																<meta name='GENERATOR' content='Microsoft FrontPage 6.0'>
																<meta name='ProgId' content='FrontPage.Editor.Document'>
																<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
																<title>".$this->config->item('homepage')." Password Retrieval</title>
																</head>
																<body>
																<p align='center'>Your username : $username</p>";
													$message .= "<p align='center'>This is your password for ".$this->config->item('homepage')." : $password</p>";
													$message .=	"<p align='center'><a href='".$this->config->item('forum_url')."'>".$this->config->item('homepage')." Forum</a></p>
																<p align='center'><a href='".base_url()."'>".$this->config->item('homepage')." Account Management Tools</a></p>
																</body>
																</html>";
													$email = send_email($email, $username, $subject, $message, $this->config->item('pop3_server'), $this->config->item('pop3_port'), $this->config->item('username'), $this->config->item('password'), $this->config->item('SMTP_auth'), $this->config->item('smtp_server'), $this->config->item('smtp_port'), $this->config->item('SMTP_Secure'), $this->config->item('addreplyto_email'), $this->config->item('addreplyto_name'), $this->config->item('from'), $this->config->item('from_name'));
													if ($email == TRUE)
														{
															$data['info'] = 'Successful send password';
															$this->load->view('password_retrieve', $data);
														}
														else
														{
															$data['info'] = array('Please try again later', $email);
															$this->load->view('password_retrieve', $data);
														}
												}
										}
										else
										{
											$data['info'] = 'Your username and your email doesnt match';
											$this->load->view('password_retrieve', $data);
										}
								}
						}
				}
		}

	function server_status()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$this->load->view('server_status');
				}
		}

	function popup_board_of_heroes()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$secret_password = $this->config->item('secret_password');
					$data['query'] = $this->charac0_account_view->board_of_heroes($secret_password, 50);
					$this->load->view('popup_board_of_heroes', $data);
				}
		}

	function popup_board_of_mercenaries()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$this->load->database('HSDB', TRUE);
					$data['query'] = $this->hsdb_hstable_merc_view->board_of_mercenaries(50);
					$this->load->view('popup_board_of_mercenaries', $data);
				}
		}

	function popup_player_online()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['query2'] = $this->charac0->char_online(-59);
					$this->load->view('popup_player_online', $data);
				}
		}

		public function activate()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/user/home', 'location');
					}
					else
					{
						$activate = $this->uri->segment(3, 0);
						$y = $this->temp_account->temp_account($activate);
						$yr = $y->num_rows();
						$date = mssqldate();
						//echo $date.' = date<br />';
						//echo $yr.' = yr<br />';
						if ($yr == 0)
							{
								$data['info'] = 'Sorry, i can\'t find your activation code, probably your account have been activated or you didn\'t register at all';
								$this->load->view('activate', $data);
							}
							else
							{
								if ($yr == 1)
									{
										$yt = $y->row();
										$username = $yt->username;
										$password = $yt->password;
										$email = $yt->email;

										//echo $username.' = username<br />';
										$u = $this->account->account_cid($username);
										$ur = $u->num_rows();
										//echo $ur.' = ur num_rows<br />';
										if ($ur == 1)
											{
												$data['info'] = 'Your username '.$username.' have been registered';
												$this->load->view('activate', $data);
											}
											else
											{
												$i = $this->account->account_cheaderb($email);
												$io = $i->num_rows();
												//echo $io.' = io num_rows<br />';
												if ($io ==  1)
													{
														$data['info'] = 'Your email '.$email.' have been registered';
														$this->load->view('activate', $data);
													}
													else
													{
														$p = $this->account->insert_account($username, $password, $email);
														if (!$p)
															{
																$data['info'] = 'Error creating account account, please try again later';
																$this->load->view('activate', $data);
															}
															else
															{
																$this->temp_account->delete_temp_account($activate);
																$data['info'] = 'Congratulations!! Your account have been activated.<br>Have fun in our server!';
																$this->load->view('activate', $data);
															}
													}
											}
									}
							}
					}
			}

#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('errors/error_custom_404');
			}

#############################################################################################################################
//template
/*
	function register()
		{
			if ($this->session->userdata('logged_in') == TRUE)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
					if ($this->form_validation->run() == FALSE)
						{
							//form
						}
						else
						{
							//form process
						}
				}
		}
*/
#############################################################################################################################

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */