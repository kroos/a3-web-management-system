<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A3 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// load library
		$this->load->library(array('session'));

		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('user/index', 'location');
		}
	}

	public function index()
		{
			$data['news'] = $this->a3web_html->news();
			// $this->load->view('home', $data);
			$this->load->view('home.new.php', $data);
		}

	public function event()
		{
			$data['event'] = $this->a3web_html->event();
			$this->load->view('event.new.php', $data);
		}

	public function download()
		{
			$data['event'] = $this->a3web_html->download();
			$this->load->view('download.new.php', $data);
		}

	public function login()
		{
			$data['info'] = NULL;
			if ($this->form_validation->run() == TRUE)
				{
					$login = $this->input->post('login', TRUE);
					$passwd = $this->input->post('passwd', TRUE);
							$data['query'] = $this->account->account_user($login, $passwd);
							// echo $this->db->last_query().'<br />';
							$rows = $data['query']->num_rows();
							// echo $rows.'<br />';

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
											redirect('/user/index', 'location');
										}
								}
								else
								{
									//login not correct
									$data['info'] = 'Login incorrect or you havent register/activate your account';
								}
				}
			// $this->load->view('login');
			$this->load->view('login.new.php', $data);
		}

	public function register()
		{
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

			if ($this->form_validation->run() == TRUE)
				{
					//form process
					$username = $this->input->post('username', TRUE);
					$password1 = $this->input->post('password1', TRUE);
					$verify = $this->input->post('verify', TRUE);
					$email = $this->input->post('email', TRUE);

					if ($this->input->post('create_acc', TRUE))
						{
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

									$this->myphpmailer->IsSMTP();
									$this->myphpmailer->SMTPAuth = TRUE;									//Set the encryption system to use - ssl (deprecated) or tls
									$this->myphpmailer->SMTPSecure = $this->config->item('smtp_secure');	//tls or ssl (deprecated)
									$this->myphpmailer->Host = $this->config->item('smtp_server');			//smtp server
									$this->myphpmailer->Port = $this->config->item('smtp_port');			//change this port if you are using different port than mine
									$this->myphpmailer->Username = $this->config->item('mailer_username');	//email account username
									$this->myphpmailer->Password = $this->config->item('mailer_password');	//email account password
									$this->myphpmailer->SMTPDebug = $this->config->item('mailer_debug');	//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
									$this->myphpmailer->Debugoutput = 'html';								//Ask for HTML-friendly debug output
									$this->myphpmailer->IsHTML(TRUE);

									//Set who the message is to be sent from
									$this->myphpmailer->setFrom($this->config->item('from'), $this->config->item('from_name')); 

									//Set an alternative reply-to address
									$this->myphpmailer->addReplyTo($this->config->item('addreplyto_email'), $this->config->item('addreplyto_name'));

									//process myphpmailer
									$this->myphpmailer->AddAddress($email, $username);														//recipient
 									$this->myphpmailer->Subject = $subject;
									$this->myphpmailer->MsgHTML($message);
									$this->myphpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test

									if (!$this->myphpmailer->Send()) {
										$data['info'] = $this->myphpmailer->ErrorInfo.'<br />Activation email cant be send right now<br />Please try again later';
									}else{
										$data['info'] = 'Success sending email';
										$query = $this->temp_account->insert_temp_account($username, $password1, $email, $passkey);
										if($query)
											{
												$data['info'] = 'Please check activation email<br />If the email is not in the inbox, please check your JUNK folder and add it into white list';
											}
											else
											{
												$data['info'] = 'Please check activation email<br />Please try again later. We are sorry for the inconvenience';
											}
									}
								}
						}
				}
			//form
			// $this->load->view('register', $data);
			$this->load->view('register.new.php', $data);
		}

	public function password_retrieve()
		{
			$data['info'] = NULL;
			if ($this->form_validation->run() == TRUE)
				{
					//form process
							$username = $this->input->post('username', TRUE);
							$email = $this->input->post('email', TRUE);

							$query = $this->account->account_get_password($username, $email);
							if ($query->num_rows() == 1)
								{
									$password = $query->row()->c_headera;
									if ($password == $this->config->item('secret_password'))
										{
											$data['info'] = 'You have been banned by Game Master. You can\'t retrieve your password through the AMT';
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

											$this->myphpmailer->IsSMTP();
											$this->myphpmailer->SMTPAuth = TRUE;									//Set the encryption system to use - ssl (deprecated) or tls
											$this->myphpmailer->SMTPSecure = $this->config->item('smtp_secure');	//tls or ssl (deprecated)
											$this->myphpmailer->Host = $this->config->item('smtp_server');			//smtp server
											$this->myphpmailer->Port = $this->config->item('smtp_port');			//change this port if you are using different port than mine
											$this->myphpmailer->Username = $this->config->item('mailer_username');	//email account username
											$this->myphpmailer->Password = $this->config->item('mailer_password');	//email account password
											$this->myphpmailer->SMTPDebug = $this->config->item('mailer_debug');	//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
											$this->myphpmailer->Debugoutput = 'html';								//Ask for HTML-friendly debug output
											$this->myphpmailer->IsHTML(TRUE);

											//Set who the message is to be sent from
											$this->myphpmailer->setFrom($this->config->item('from'), $this->config->item('from_name')); 

											//Set an alternative reply-to address
											$this->myphpmailer->addReplyTo($this->config->item('addreplyto_email'), $this->config->item('addreplyto_name'));

											//process myphpmailer
											$this->myphpmailer->AddAddress($email, $username);														//recipient
 											$this->myphpmailer->Subject = $subject;
											$this->myphpmailer->MsgHTML($message);
											$this->myphpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test

											if (!$this->myphpmailer->Send()) {
												$data['info'] = $this->myphpmailer->ErrorInfo.'<br />Please try again later';
											}else{
												$data['info'] = 'Success sending email';
											}
										}
								}
								else
								{
									$data['info'] = 'Your username and your email doesnt match';
								}
				}
			//form
			$this->load->view('password_retrieve.new.php', $data);
		}

	public function server_status()
		{
			// $this->load->view('server_status');
			$this->load->view('server_status.new.php');
		}

	public function popup_board_of_heroes()
		{
					$secret_password = $this->config->item('secret_password');
					$data['query'] = $this->charac0_account_view->board_of_heroes($secret_password, 50);
					// $this->load->view('popup_board_of_heroes', $data);
					$this->load->view('popup_board_of_heroes.new.php', $data);
		}

	public function popup_board_of_mercenaries()
		{
					$this->load->database('HSDB', TRUE);
					$data['query'] = $this->hsdb_hstable_merc_view->board_of_mercenaries(50);
					// $this->load->view('popup_board_of_mercenaries', $data);
					$this->load->view('popup_board_of_mercenaries.new.php', $data);
		}

	public function popup_player_online()
		{
					$data['query2'] = $this->charac0->char_online(-59);
					// $this->load->view('popup_player_online', $data);
					$this->load->view('popup_player_online.new.php', $data);
		}

	public function activate()
		{
			$data['info'] = NULL;
			$activate = $this->uri->segment(3, 0);
			$y = $this->temp_account->temp_account($activate);
			$yr = $y->num_rows();
			$date = mssqldate();
			//echo $date.' = date<br />';
			//echo $yr.' = yr<br />';
			if ($yr == 0)
				{
					$data['info'] = 'Sorry, i can\'t find your activation code, probably your account have been activated or you didn\'t register at all';
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
								}
								else
								{
									$i = $this->account->account_cheaderb($email);
									$io = $i->num_rows();
									//echo $io.' = io num_rows<br />';
									if ($io ==  1)
										{
											$data['info'] = 'Your email '.$email.' have been registered';
										}
										else
										{
											$p = $this->account->insert_account($username, $password, $email);
											if (!$p)
												{
													$data['info'] = 'Error creating account account, please try again later';
												}
												else
												{
													$this->temp_account->delete_temp_account($activate);
													$data['info'] = 'Congratulations!! Your account have been activated.<br>Have fun in our server!';
												}
										}
								}
						}
				}
			$this->load->view('activate.new.php', $data);
		}

		public function remote_user()
		{
			$valid = true;
	
			// $users = array(
			// 	'admin'         => 'admin@domain.com',
			// 	'administrator' => 'administrator@domain.com',
			// 	'root'          => 'root@domain.com',
			// );
	
			$users1 = $this->account->remote();
			// echo $this->db->last_query();

			$users = array();
			foreach($users1->result() as $wer) {
				$users[$wer->c_id] = $wer->c_headerb;
				// echo $wer->c_id.$wer->c_headerb;
			}

			// var_dump($users);

			// if (isset($_POST['username']) && array_key_exists($_POST['username'], $users)) {
			if (NULL !== $this->input->post('username') && array_key_exists($this->input->post('username'), $users)) {
				$valid = false;
			} else if (NULL !== $this->input->post('email')) {
				$email = $this->input->post('email');
	
				foreach ($users as $k => $v) {
					if ($email == $v) {
						$valid = false;
						break;
					}
				}
			}
			echo json_encode(array('valid' => $valid));
		}

#############################################################################################################################
//template
/*
	public function home()
		{
			if ($this->form_validation->run() == true)
				{
					//form process
					
				}
			// form
			$this->load->view('form');
		}
*/
#############################################################################################################################
	public function username_check($str)
	{
		switch ($str)
			{
				default:
					return TRUE;
				break;

				case 'a3gm1':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm1"');
					return FALSE;
				break;

				case 'a3gm2':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm2"');
					return FALSE;
				break;

				case 'a3gm3':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm3"');
					return FALSE;
				break;

				case 'a3gm4':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm4"');
					return FALSE;
				break;

				case 'a3gm5':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm5"');
					return FALSE;
				break;

				case 'a3gm6':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm6"');
					return FALSE;
				break;

				case 'a3gm7':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm7"');
					return FALSE;
				break;

				case 'a3gm8':
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm8"');
					return FALSE;
				break;
			}

		/*if ($str == 'a3gm1')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "a3gm1"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}*/
	}
#############################################################################################################################
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */