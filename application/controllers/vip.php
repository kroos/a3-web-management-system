<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vip extends CI_Controller
	{
#############################################################################################################################

		public function salary()
			{
				if ( ($this->session->userdata('logged_in') == TRUE) && (($this->session->userdata('group') == 'GoldM') || ($this->session->userdata('group') == 'SM') || ($this->session->userdata('group') == 'BM') || ($this->session->userdata('group') == 'GM')) )
					{
						//process
						$data['query'] = $this->charac0->charac_char();
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('vip/salary', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								if ($this->input->post('claim_salary', TRUE))
									{
										//---------------sekarang nak kena tau jumlah wz yang patut diterima mengikut membership---------------
										switch ($this->session->userdata('group'))
											{
												case 'BM':
												$laptop = $this->config->item('BM');
												$payment = $this->config->item('BMP');
												break;
												case 'SM':
												$laptop = $this->config->item('SM');
												$payment = $this->config->item('SMP');
												break;
												case 'GoldM':
												$laptop = $this->config->item('GoldM');
												$payment = $this->config->item('GoldMP');
												break;
												case 'GM':
												$laptop = 'Game Master';
												$payment = 4000000000;
												break;
												case 'Normal':
												$laptop = 'Normal';
												$payment = 0;
												break;
											};

										//tgk wz
										$r = $this->charac0->charac_cid($char);
										$wz = $r->row()->c_headerc;
										echo $wz.' wz ada pada '.$char.'<br />';
										
										//penambahan wz dgn gaji
										$gaji = $wz + $payment;

										$sql2 = $this->account->account_user($this->session->userdata('username'), $this->session->userdata('password'))->row();
										echo $sql2->last_salary.' last salary<br />';
										echo $sql2->salary.' salary<br />';

										##################################################
										//convert to unix time stamp
										$timeu = human_to_unix($sql2->last_salary);
										$timespan = timespan(now(), $timeu);
										##################################################

										$datediff = $this->db->select("DATEDIFF(month, '".$sql2->last_salary."', '".$sql2->salary."') AS monthdatediff")->get()->row();
										echo $datediff->monthdatediff.' monthdate salary->last salary<br />';

										$datediff1 = $this->db->select("DATEDIFF(month, '".$sql2->last_salary."', GETDATE()) AS monthdate")->get()->row();
										echo $datediff1->monthdate.' monthdate now->last salary<br />';

										//check curernt date
										$cdate = mssqldate();
										echo $cdate.' current date<br />';

										$sql3 = $this->db->select("DATEADD(month, ".$datediff->monthdatediff."+1, '".$sql2->last_salary."') AS monthdateadd")->get()->row();
										echo $sql3->monthdateadd.' month<br />';
										$i = 0;
										if ($cdate > $sql3->monthdateadd)
											{
												$i++;
											}
										$sql4 = $this->db->select("DATEADD(month, ".$datediff->monthdatediff."+1+".$i.", '".$sql2->last_salary."') AS monthdateadd")->get()->row();
										echo $sql4->monthdateadd.' month after process<br />';

										if ($cdate > $sql3->monthdateadd)
											{
												$legalDate = $sql3->monthdateadd;
											}
											else
											{
												$legalDate = $sql4->monthdateadd;
											}
										echo $legalDate.' legal date<br />';

										##################################################
										//convert to unix time stamp
										$temp = explode(' ', $legalDate);
										$tempdate = explode('-', $temp[0]);
										$temptime = explode(':', $temp[1]);
										$year = $tempdate[0];
										$month = $tempdate[1];
										$day = $tempdate[2];
										$hour = $temptime[0];
										$minute = $temptime[1];
										$sec = $temptime[2];
										$mktime = mktime($hour, $minute, $sec, $month, $day, $year);
										$legalDate = mdate("%Y-%m-%d %H:%i:%s", $mktime);
										$timeu1 = human_to_unix($legalDate);
										echo $timeu1.' unix legal date<br />';
										$timespan1 = timespan(now(), $timeu1);
										##################################################

										//check char boleh terima dak lagi gaji
										if ($gaji > 4200000000)
											{
												$data['info'] = 'Please choose another char as it seems it cant hold more than 4.2billion wz';
												$this->load->view('vip/salary', $data);
											}
											else
											{
												if ($timespan1 < 2)
													{
														//legally can take salary
														$l = $this->account->update_salary($legalDate);
														$p = $this->charac0->update_salary($char, $gaji);
														if ($l && $p)
															{
																$data['info'] = 'Success claim salary for this month';
																$this->load->view('vip/salary', $data);
																$this->account->update_activity();
															}
															else
															{
																$data['info'] = 'Please try again later';
																$this->load->view('vip/salary', $data);
															}
													}
													else
													{
														if ($legalDate > $sql2->last_salary)
															{
																//tamat tempoh
																$v = $this->account->update_vip_expired();
																if (!$v)
																	{
																		$data['info'] = 'Error. Please contact Game Master or Admin';
																		$this->load->view('vip/salary', $data);
																	}
																	else
																	{
																		$this->session->set_userdata('group', 'Normal');
																		$data['info'] = 'It seems that your '.$laptop.' account have been expired. Please contact '.$this->config->item('homepage').' Game Master or Admin to continue your subscription. We are thankful so much for your support to us all this long';
																		$this->load->view('vip/salary', $data);
																		$this->account->update_activity();
																	}
															}
															else
															{
																if ($cdate >= $legalDate)
																	{
																		$l = $this->account->update_salary($legalDate);
																		$p = $this->charac0->update_salary($char, $gaji);
																		if ($l && $p)
																			{
																				$data['info'] = 'Success claim salary for this month';
																				$this->load->view('vip/salary', $data);
																				$this->account->update_activity();
																			}
																			else
																			{
																				$data['info'] = 'Please try again later';
																				$this->load->view('vip/salary', $data);
																			}
																	}
																	else
																	{
																		$data['info'] = 'You have taken the salary for this month. Please wait till next month';
																		$this->load->view('vip/salary', $data);
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
				if ( ($this->session->userdata('logged_in') == TRUE) && (($this->session->userdata('group') == 'GoldM') || ($this->session->userdata('group') == 'SM') || ($this->session->userdata('group') == 'BM') || ($this->session->userdata('group') == 'GM')) )
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