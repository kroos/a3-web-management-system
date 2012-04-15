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
								if ($this->input->post('change_password', TRUE))
									{
										if ($old_password != $password2)
											{
												$r = $this->account->update_password($password2);
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
														$this->account->update_activity();
													}
											}
											else
											{
												$data['info'] = 'Old and new password is the same. Please try again';
												$this->load->view('user/change_password', $data);
											}
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
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/offline_town_portal', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								$town = $this->input->post('town', TRUE);
								if ($this->input->post('offline_tp', TRUE))
									{
										$r = $this->charac0->update_tele($char, $town);
										if ($r)
											{
												$data['info'] = "Successful warped $char";
												$this->load->view('user/offline_town_portal', $data);
												$this->account->update_activity();
											}
											else
											{
												$data['info'] = "Cant warped $char. Please try again";
												$this->load->view('user/offline_town_portal', $data);
											}
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
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/acquire_super_shue', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								if($this->input->post('acq_ss', TRUE))
									{
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

										//echo mbody_insert('PETACT', 'jadi dak?', $charstring).' mbody<br />';

										//echo mbody_part('RESRV1', $charstring);

										$newString = mbody_insert('PETACT', $PETACT[1], $charstring);
										$f = $this->charac0->update_mbody($char, $newString);
										if (!$f)
											{
												$data['info'] = 'Sorry, we cant equip yet your super shue, please try again later';
												$this->load->view('user/acquire_super_shue', $data);
											}
											else
											{
												$data['info'] = 'Successfully equipped super shue';
												$this->load->view('user/acquire_super_shue', $data);
												$this->account->update_activity();
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function buy_all_skill()
			{
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/buy_all_skill', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								if ($this->input->post('buy_skill', TRUE))
									{
										$t = $this->charac0->charac_cid($char);

										////--------------------check char class------------------------
										$chartyp = $t->row()->c_sheaderb;
										//echo $chartyp.' = char type<br />';

										//--------------------check char level--------------------------
										$charlvl = $t->row()->c_sheaderc;
										//echo 'your '.$char.' level '.$charlvl.'<br />';

										//--------------------check wz----------------------------------
										$rbwz = $t->row()->c_headerc;
										//echo $rbwz.' wz<br />';

										//--------------------retrieve m_body----------------------------------
										$charstring = $t->row()->m_body;

										//skill code
										switch ($chartyp)
											{
												case 0:
													$SKILL[1] = "4294967166;4294967166;4294967166";
													break;
												case 1:
													$SKILL[1] = "1065353214;1065353214;1065353214";
													break;
												case 2:
													$SKILL[1] = "4290723710;4290723710;4290723710";
													break;
												case 3:
													$SKILL[1] = "131070;65534;65534";
													break;
											}
										//--------------- buying skill operation begin-----------------------------
										// 1st of all we check char lvl
										if ($charlvl >= $this->config->item('skilllvl'))
											{
												// then we check the wz
												if ($rbwz >= $this->config->item('skillwz'))
													{
														//initialize balance
														$wz = $rbwz - $this->config->item('skillwz');

														//update the data
														$f = $this->charac0->update_wz_mbody($char, $wz, mbody_insert('SKILL', $SKILL[1], $charstring));

														if (!$f)
															{
																$data['info'] = 'Sorry, internal server error, please try again later';
																$this->load->view('user/buy_all_skill', $data);
															}
															else
															{
																$data['info'] = 'Successfully bought all skill';
																$this->load->view('user/buy_all_skill', $data);
																$this->account->update_activity();
															}
													}
													else
													{
														$data['info'] = "You need at least ".$this->config->item('skillwz')." wz for buy this skill, however you only have $rbwz wz, not enough wz to buy the skill";
														$this->load->view('user/buy_all_skill', $data);
													}
											}
											else
											{
												$data['info'] = "Your current level is $charlvl, you need at least level ".$this->config->item('skilllvl')." to buy the skill";
												$this->load->view('user/buy_all_skill', $data);
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
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/equip_super_super_shue', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								if ($this->input->post('eq_sss', TRUE))
									{
										$t = $this->charac0->charac_cid($char);

										//--------------------check char class------------------------
										$chartype = $t->row()->c_sheaderb;

										//--------------------check wz----------------------------------
										$rbwz = $t->row()->c_headerc;
										//echo $rbwz.' wz<br />';

										//--------------------retrieve m_body----------------------------------
										$mbody = $t->row()->m_body;

										//explode the string
										$temp = explode("\_1",$mbody);

										//initialize variable for the string
										$PETINV = explode("=",$temp[7]);
										$PETACT = explode("=",$temp[18]);
										############################################################################################

										//--------------------get PETINV values----------------------------------
										$PETINV[1] = mbody_part('PETINV', $mbody);

										//--------------------explode PETINV values----------------------------------
										$TEMPPETINV = explode(";",$PETINV[1]);

										switch ($chartype)
											{
												case 0:
													$sstype = '1012;76684069;4290773247;4293968751';
													break;
												
												case 1:
													$sstype = '1013;76290853;4290773247;4294155503';
													break;
												
												case 2:
													$sstype = '1014;75897637;4290773247;4293970555';
													break;
												
												case 3:
													$sstype = '1015;76028709;4290773247;4294160367';
													break;
											}

										//explode sstype for making a different between sstype n shue in inventory
										$temp_sstype = explode (";",$sstype);
										$partial_sstype = $temp_sstype [0].";".$temp_sstype [1];

										if ($PETINV[1] == NULL)
											{
												$data['info'] = 'I find nothing inside your shue inventory. Please put your super super shue inside your shue inventory and its already have been revived with shue potion';
												$this->load->view('user/equip_super_super_shue', $data);
											}
											else
											{
												//sss in 1st shue inventory
												$sss_one= $TEMPPETINV[0].";".$TEMPPETINV[1].";".$TEMPPETINV[2].";".$TEMPPETINV[3];
												$part_sss_one= $TEMPPETINV[0].";".$TEMPPETINV[1];
												//echo "$sss_one sss_one<br />";

												//sss in 2nd shue inventory
												$sss_two= $TEMPPETINV[4].";".$TEMPPETINV[5].";".$TEMPPETINV[6].";".$TEMPPETINV[7];
												$part_sss_two= $TEMPPETINV[4].";".$TEMPPETINV[5];
												//echo "$sss_two <br>";

												//sss in 3rd shue inventory
												$sss_three= $TEMPPETINV[8].";".$TEMPPETINV[9].";".$TEMPPETINV[10].";".$TEMPPETINV[11];
												$part_sss_three= $TEMPPETINV[8].";".$TEMPPETINV[9];
												//echo "$sss_three <br>";

												//sss in 4th shue inventory
												$sss_four= $TEMPPETINV[12].";".$TEMPPETINV[13].";".$TEMPPETINV[14].";".$TEMPPETINV[15];
												$part_sss_four= $TEMPPETINV[12].";".$TEMPPETINV[13];
												//echo "$sss_four <br>";

												//sss in 5th shue inventory
												$sss_five= $TEMPPETINV[16].";".$TEMPPETINV[17].";".$TEMPPETINV[18].";".$TEMPPETINV[19];
												$part_sss_five= $TEMPPETINV[16].";".$TEMPPETINV[17];
												//echo "$sss_five <br>";

												//--------------- equipping sss operation to char begin-----------------------------
												if ($rbwz >= $this->config->item('wz_sss'))
													{
														//initializing wz balance
														$wz = $rbwz - $this->config->item('wz_sss') ;
														
														switch ($partial_sstype)
															{
																// then we check sss in shue inventory 1
																case $part_sss_one :
																	//change the petact value value
																	$PETACT[1] = $sss_one;
																	//construct back the string by changing shue inventory 1 and left others
																	$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_two.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
																	//echo "$newString1";
																	//update the data
																	$u = $this->charac0->update_wz_mbody($char, $wz, $newString1);
																	if(!$u)
																		{
																			$data['info'] = 'Sorry, we cant equip yet your super super shue, please try again later';
																			$this->load->view('user/equip_super_super_shue', $data);
																		}
																		else
																		{
																			$data['info'] = 'Succesful equip your super super shue';
																			$this->load->view('user/equip_super_super_shue', $data);
																			$this->account->update_activity();
																		};
																break;

																// then we check sss in shue inventory 2
																case $part_sss_two :
																	//change the petact value value
																	$PETACT[1] = $sss_two;
																	//construct back the string by changing shue inventory 2 and left others
																	$newString12 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
																	//echo "$newString12";
																	//update the data
																	$u = $this->charac0->update_wz_mbody($char, $wz, $newString12);
																	if(!$u)
																		{
																			$data['info'] = 'Sorry, we cant equip yet your super super shue, please try again later';
																			$this->load->view('user/equip_super_super_shue', $data);
																		}
																		else
																		{
																			$data['info'] = 'Succesful equip your super super shue';
																			$this->load->view('user/equip_super_super_shue', $data);
																			$this->account->update_activity();
																		};
																break;

																// then we check sss in shue inventory 3
																case $part_sss_three :
																	//change the petact value value
																	$PETACT[1] = $sss_three;
																	//construct back the string by changing shue inventory 3 and left others
																	$newString123 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
																	//echo "$newString123";
																	//update the data
																	$u = $this->charac0->update_wz_mbody($char, $wz, $newString123);
																	if(!$u)
																		{
																			$data['info'] = 'Sorry, we cant equip yet your super super shue, please try again later';
																			$this->load->view('user/equip_super_super_shue', $data);
																		}
																		else
																		{
																			$data['info'] = 'Succesful equip your super super shue';
																			$this->load->view('user/equip_super_super_shue', $data);
																			$this->account->update_activity();
																		};
																break;

																// then we check sss in shue inventory 4
																case $part_sss_four :
																	//change the petact value value
																	$PETACT[1] = $sss_four;
																	//construct back the string by changing shue inventory 4 and left others
																	$newString1234 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_three.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
																	//echo "$newString1234";
																	//update the data
																	$u = $this->charac0->update_wz_mbody($char, $wz, $newString1234);
																	if(!$u)
																		{
																			$data['info'] = 'Sorry, we cant equip yet your super super shue, please try again later';
																			$this->load->view('user/equip_super_super_shue', $data);
																		}
																		else
																		{
																			$data['info'] = 'Succesful equip your super super shue';
																			$this->load->view('user/equip_super_super_shue', $data);
																			$this->account->update_activity();
																		};
																break;

																// then we check sss in shue inventory 5
																case $part_sss_five :
																	//change the petact value value
																	$PETACT[1] = $sss_five;
																	//construct back the string by changing shue inventory 5 and left others
																	$newString12345 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_three.";".$sss_four."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
																	//echo "$newString12345";
																	//update the data
																	$u = $this->charac0->update_wz_mbody($char, $wz, $newString12345);
																	if(!$u)
																		{
																			$data['info'] = 'Sorry, we cant equip yet your super super shue, please try again later';
																			$this->load->view('user/equip_super_super_shue', $data);
																		}
																		else
																		{
																			$data['info'] = 'Succesful equip your super super shue';
																			$this->load->view('user/equip_super_super_shue', $data);
																			$this->account->update_activity();
																		};
																break;

																//really dont have any super super shue in the shue inventory
																default :
																	$data['info'] = 'Sorry, you don\'t have super super shue in your shue inventory';
																	$this->load->view('user/equip_super_super_shue', $data);
																break;
															}
													}
													else
													{
														$data['info'] = "$char only have $rbwz wz, not enough wz to equip your super super shue";
														$this->load->view('user/equip_super_super_shue', $data);
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

		public function buy_lore()
			{
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/buy_lore', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								$lore = $this->input->post('lore', TRUE);
								if ($this->input->post('buy_lore', TRUE))
									{
										$t = $this->charac0->charac_cid($char);

										//--------------------check wz----------------------------------
										$rbwz = $t->row()->c_headerc;
										//echo $rbwz.' wz<br />';

										//--------------------retrieve m_body----------------------------------
										$mbody = $t->row()->m_body;

										//--------------- buying lore operation begin-----------------------------
										// 1st of all we check rb lvl n times_rb
										$rbrbx = $t->row()->times_rb;
										//echo "<p align='center'>$char times rb $rbrbx.</p>";

										//--------------------check level rebirth----------------------------
										$rblvl = $t->row()->rb;
										//echo "<p align='center'>and $char rebirth level is $rblvl.</p>";

										//change the lore value
										$newlore = mbody_part('LORE', $mbody) + $lore;
										//echo $newlore.' newlore.<br />';

										//initializing wz
										$newwz = $lore * 100;


										if ($rblvl >= $this->config->item('lore_rb_buy') || $rbrbx >= 1)
											{
												// then we check the wz
												if ($rbwz >= $newwz)
													{
														//initialize balance
														$wz = $rbwz - $newwz;
														//update the data
														//echo mbody_insert('LORE', $newlore, $mbody).' modified mbody<br />';
														$rsgo = $this->charac0->update_wz_mbody($char, $wz, mbody_insert('LORE', $newlore, $mbody));
														
														if(!$rsgo)
															{
																$data['info'] = 'Sorry, internal server error, please try again later';
																$this->load->view('user/buy_lore', $data);
															}
															else
															{
																$data['info'] = "Successful buy $lore lore for $newwz wz";
																$this->load->view('user/buy_lore', $data);
																$this->account->update_activity();
															};
													}
													else
													{
														$data['info'] = "You need at least $newwz wz for buying $lore lore, however you only have $rbwz wz, not enough wz to buy the lore";
														$this->load->view('user/buy_lore', $data);
													};
											}
											else
											{
												$data['info'] = "Your current rebirth lvl is $rblvl, you need at least rebirth lvl ".$this->config->item('lore_rb_buy')." to buy the lore";
												$this->load->view('user/buy_lore', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function rebirth()
			{
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/rebirth', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								if ($this->input->post('rebirth', TRUE))
									{
										$t = $this->charac0->charac_cid($char);

										//--------------------check level rebirth----------------------------
										$rblvl = $t->row()->rb;
										//echo "<p align='center'>and $char rebirth level is $rblvl.</p>";

										//--------------------check char level--------------------------
										$charlvl = $t->row()->c_sheaderc;
										//echo "<p align='center'>Currently... your $char is level $charlvl.</p>";

										//--------------------check wz----------------------------------
										$rbwz = $t->row()->c_headerc;
										//echo $rbwz.' wz<br />';

										//---------------------------rebirth operation----------------------------------------------------
										//initializing lvl to rebirth
										$lvl = $this->config->item('rebirth_level');
										$charlvlforrb = $rblvl + $lvl;
		
										//initializing rebirth lvl
										$rblvlforrb = $rblvl + 1;
		
										//initializing wz for rebirth
										$wz = $this->config->item('rebirth_wz');
										$wzforrb = $wz*$rblvl;
		
										//echo "<p align='center'>For $char to rebirth, you must fullfill all this requirement which is <br>$char current lvl ($charlvl) must be greater or same with min lvl i.e $charlvlforrb level for rebirth level $rblvl<br>and<br>current wz ($rbwz) must be greater or same with paying wz ($wzforrb).</p>";
		
										//balance wz
										$sqlwz = $rbwz - $wzforrb;
										$sqlrblvl = $rblvl + 1;
		
										//1st we check lvl
										if ($charlvl >= $charlvlforrb)
											{
												//then we check its wz
												if ($rbwz >= $wzforrb)
													{
														//change the exp value to 0
														$rssuccess = $this->charac0->update_rebirth($char, $sqlwz, mbody_insert('EXP', 0, $t->row()->m_body), $sqlrblvl);
														if (!$rssuccess)
															{
																$data['info'] = 'Sorry, internal server error, please try again later';
																$this->load->view('user/rebirth', $data);
															}
															else
															{
																$data['info'] = "Successfully rebirth your $char";
																$this->load->view('user/rebirth', $data);
																$this->account->update_activity();
															};
													}
													else
													{
														$data['info'] = "You need at least $wzforrb wz for rebirth lvl $rblvl";
														$this->load->view('user/rebirth', $data);
													};	
											}
											else
											{
												$data['info'] = "You need at least lvl $charlvlforrb for rebirth lvl $rblvl";
												$this->load->view('user/rebirth', $data);
											};
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function reset_rebirth()
			{
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/reset_rebirth', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								if ($this->input->post('reset_rebirth', TRUE))
									{
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
																				$this->load->view('user/reset_rebirth', $data);
																			}
																			else
																			{
																				$data['info'] = 'Successful reset rebirth';
																				$this->load->view('user/reset_rebirth', $data);
																				$this->account->update_activity();
																			};
																	}
																	else
																	{
																		$data['info'] = "Insufficient wz, your $char only have $rbwz wz";
																		$this->load->view('user/reset_rebirth', $data);
																	};
															}
															else
															{
																$data['info'] = "$char rebirth level is $rblvl, $char need to have at least rebirth level ".$this->config->item('rebirth_count')." to reset its rebirth";
																$this->load->view('user/reset_rebirth', $data);
															};
													}
													else
													{
														$data['info'] = 'You are now a god in this server, you cant reset rb anymore';
														$this->load->view('user/reset_rebirth', $data);
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

		public function mercenary_rebirth()
			{
				$this->load->database('HSDB', TRUE);
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/mercenary_rebirth', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								$mercid = $this->input->post('merc', TRUE);
								if ($this->input->post('merc_rebirth', TRUE))
									{
										$u = $this->hstable->hstable_id($char, $mercid);
										$y = $this->charac0->charac_cid($char);
										$h = $this->merc->merc_getAll($char, $mercid);
										if ($u->num_rows() == 1)
											{
												//--------------------check merc level--------------------------
												$merclvl = $u->row()->HSLevel;

												//--------------------check wz from $char----------------------------------
												$charwz = $y->row()->c_headerc;

												//--------------------check merc level rebirth----------------------------
												$mercrblvl = $h->row()->rb;

												//check rebirth level data from the MERC table weather its NULL or got a value
												if ( $mercrblvl == NULL )
													{
														//insert data into the MERC table
														$this->merc->insert_merc($u->row()->HSID, $u->row()->HSName, $u->row()->MasterName, $u->row()->Type, $u->row()->HSLevel);

														//--------------------check merc level rebirth----------------------------
														$mercrblvl = $h->row()->rb;
													}

												//---------------------------rebirth operation----------------------------------------------------
												//initializing lvl to rebirth
												$lvl = $this->config->item('merclvlrb');
												$lvllvlrb = $mercrblvl * 10;
												$merclvlforrb= $lvllvlrb + $lvl;

												//initializing rebirth lvl
												$mercrblvlforrb = $mercrblvl + 1;

												//initializing wz for rebirth
												$wz = $this->config->item('mercwzrb');
												$wzforrb = $wz * $lvllvlrb;

												//balance wz
												$sqlwz = $charwz - $wzforrb;
												$sqlrblvl = $mercrblvl + 1;

												//1st we check lvl
												if ($merclvl >= $merclvlforrb)
													{
														//then we check its wz
														if ($charwz >= $wzforrb)
															{
																	//update char part
																	$rsgo1 = $this->charac0->update_wz($char, $sqlwz);
																	//update merc part at MERC table
																	$rsgo2 = $this->merc->update_rebirth($mercid, $char, $sqlrblvl);
																	//update hstable part
																	$rsgo3 = $this->hstable->update_rebirth($mercid, $char);
																	if(!$rsgo1 && !$rsgo2 && !$rsgo3)
																		{
																			$data['info'] = 'Please try again, somehow i cant update the data';
																			$this->load->view('user/mercenary_rebirth', $data);
																		}
																		else
																		{
																			$data['info'] = 'Success rebirth your mercenary for '.$char.'';
																			$this->load->view('user/mercenary_rebirth', $data);
																			$this->account->update_activity();
																		}
															}
															else
															{
																$data['info'] = 'Not enough wz to rebirth your mercenary. You need at least '.$wzforrb.' wz for rebirth lvl '.$mercrblvl.'';
																$this->load->view('user/mercenary_rebirth', $data);
															};
													}
													else
													{
														$data['info'] = 'Your mercenary level is lower than a minimum level. You need at least lvl '.$merclvlforrb.' for rebirth lvl '.$mercrblvl.'';
														$this->load->view('user/mercenary_rebirth', $data);
													};
											}
											else
											{
												$data['info'] = "$char selected with wrong mercenary";
												$this->load->view('user/mercenary_rebirth', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function mercenary_reset_rebirth()
			{
				$this->load->database('HSDB', TRUE);
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/mercenary_reset_rebirth', $data);
							}
							else
							{
								//form processor
								$char = $this->input->post('character', TRUE);
								$mercid = $this->input->post('merc', TRUE);
								if ($this->input->post('mercenary_reset_rebirth', TRUE))
									{
										$h = $this->hstable->hstable_id($char, $mercid);
										$c = $this->charac0->charac_cid($char);
										$m = $this->merc->merc_getAll($char, $mercid);
										if ($h->num_rows() == 1)
											{
												//--------------------check merc level--------------------------
												$merclvl = $h->row()->HSLevel;

												//--------------------check wz from $char----------------------------------
												$charwz = $c->row()->c_headerc;

												//--------------------check merc level rebirth----------------------------
												$mercrblvl = $m->row()->rb;

												//--------------------check merc level reset rebirth----------------------------
												$mercrbreset = $m->row()->reset_rb;

												//--------------------reset rebirth operation----------------------------
												// 1st we check the reset rebirth lvl...
												if ($mercrbreset <= $this->config->item('mercmaxresetrb'))
													{
														//then we check its rb level
														if ($mercrblvl == $this->config->item('mercrblevel'))
															{
																//then we check its level
																if ($merclvl == $this->config->item('mercresetlvl'))
																	{
																		//then we check the wz
																		if ($charwz >= $this->config->item('mercwzreset'))
																			{
																				//reset rebirth for merc begin
																				$reset_rb_merc = $mercrbreset + 1;	//up 1 lvl of reset_rb table
																				$balance = $charwz - $this->config->item('mercwzreset'); 

																				//update the MERC table
																				$rs02 = $this->merc->update_reset_rebirth($mercid, $char, $reset_rb_merc);

																				//update the charac0 table for the wz
																				$rs03 = $this->charac0->update_wz($char, $balance);
																				if ($rs02 && $rs03)
																					{
																						$data['info'] = 'Successfully reset rebirth';
																						$this->load->view('user/mercenary_reset_rebirth', $data);
																						$this->account->update_activity();
																					}
																					else
																					{
																						$data['info'] = 'Internal server error, please try again later';
																						$this->load->view('user/mercenary_reset_rebirth', $data);
																					};
																			}
																			else
																			{
																				$data['info'] = "Your $char only have $charwz, please make sure you have more than ".$this->config->item('mercwzreset')." wz to use reset rebirth for your mercenary";
																				$this->load->view('user/mercenary_reset_rebirth', $data);
																			};
																	}
																	else
																	{
																		$data['info'] = "Your mercenary rebirth level is $merclvl, please make sure your mercenary is at least level $mercresetlvl";
																		$this->load->view('user/mercenary_reset_rebirth', $data);
																	};
															}
															else
															{
																$data['info'] = "Your mercenary rebirth level is $mercrblvl, please make sure your mercenary is at least rebirth level ".$this->config->item('mercrblevel')."";
																$this->load->view('user/mercenary_reset_rebirth', $data);
															};
													}
													else
													{
														$data['info'] = "Your mercenary reset rebirth level is $mercrbreset, you cant use anymore reset rebirth for ur mercenary. Its at the peak of the reset";
														$this->load->view('user/mercenary_reset_rebirth', $data);
													};
											}
											else
											{
												$data['info'] = "$char selected with wrong mercenary";
												$this->load->view('user/mercenary_reset_rebirth', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function adding_hero_stat_points()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->charac0->charac_char();
						$this->load->view('user/adding_hero_stat_points', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function char_points()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$char = $this->uri->segment(3, 0);
						$data['char'] = $this->charac0->charac_cid($char);
						if ($data['char']->num_rows() == 1)
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('user/char_points', $data);
									}
									else
									{
										//form processor
										//$all = $this->input->post(NULL, TRUE);
										$str = $this->input->post('str', TRUE);
										$int = $this->input->post('int', TRUE);
										$dex = $this->input->post('dex', TRUE);
										$vit = $this->input->post('vit', TRUE);
										$mana = $this->input->post('mana', TRUE);

										if ($this->input->post('distrib_points', TRUE))
											{
												//from DB
												$strdb = char_attrib('STR', $data['char']->row()->c_headera);
												$intdb = char_attrib('INT', $data['char']->row()->c_headera);
												$dexdb = char_attrib('DEX', $data['char']->row()->c_headera);
												$vitdb = char_attrib('VIT', $data['char']->row()->c_headera);
												$manadb = char_attrib('MANA', $data['char']->row()->c_headera);
												$pointsdb = char_attrib('POINTS', $data['char']->row()->c_headera);

												//from form
												$pointsf = $str + $int + $dex + $vit + $mana;
												if ($pointsf <= $pointsdb)
													{
														$strn = $strdb + $str;
														$intn = $intdb + $int;
														$dexn = $dexdb + $dex;
														$vitn = $vitdb + $vit;
														$manan = $manadb + $mana;
														$pointsn = $pointsdb - $pointsf;

														if ($strn >= 65536)
															{
																$data['info'] = 'Strength (<b>'.$strn.'</b>) has exceed 65535';
																$this->load->view('user/char_points', $data);
															}
															else
															{
																if ($intn >= 65536)
																	{
																		$data['info'] = 'Intelligence (<b>'.$intn.'</b>) has exceed 65535';
																		$this->load->view('user/char_points', $data);
																	}
																	else
																	{
																		if($dexn >= 65536)
																			{
																				$data['info'] = 'Dexterity (<b>'.$dexn.'</b>) has exceed 65535';
																				$this->load->view('user/char_points', $data);
																			}
																			else
																			{
																				if ($vitn >= 65536)
																					{
																						$data['info'] = 'Vitality (<b>'.$vitn.'</b>) has exceed 65535';
																						$this->load->view('user/char_points', $data);
																					}
																					else
																					{
																						if ($manan >= 65536)
																							{
																								$data['info'] = 'Mana (<b>'.$manan.'</b>) has exceed 65535';
																								$this->load->view('user/char_points', $data);
																							}
																							else
																							{
																								$string = char_stat($strn, $intn, $dexn, $vitn, $manan, $pointsn, $data['char']->row()->c_headera);
																								echo $string.' new c_headera<br />';
																								$p = $this->charac0->update_stat($char, $string);
																								if ($p)
																									{
																										$data['info'] = 'Success distribute points';
																										$this->load->view('user/char_points', $data);
																										$this->account->update_activity();
																										sleep(3);
																										redirect('user/adding_hero_stat_points', 'location');
																									}
																									else
																									{
																										$data['info'] = 'Please try again. Somehow i cant update the statistic points';
																										$this->load->view('user/char_points', $data);
																									}
																							}
																					}
																			}
																	}
															}
													}
													else
													{
														$data['info'] = "Your insertion ($pointsf), have exceed your remaining stat points ($pointsdb)";
														$this->load->view('user/char_points', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do huh?';
								$this->load->view('user/char_points', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function adding_mercenary_stat_points()
			{
				$this->load->database('HSDB', TRUE);
				$data['query'] = $this->charac0->charac_char();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->view('user/adding_mercenary_stat_points', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function merc_points()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$hsid = $this->uri->segment(3, 0);
						$this->load->database('HSDB', TRUE);
						$data['merc'] = $this->hstable->hstable_hsid($hsid);
						$char = $data['merc']->row()->MasterName;
						$security = $this->charac0->charac_cid($char);
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($security->num_rows() == 1)
							{
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('user/merc_points', $data);
									}
									else
									{
										//form processor
										$str = $this->input->post('str', TRUE);
										$int = $this->input->post('int', TRUE);
										$dex = $this->input->post('dex', TRUE);
										$vit = $this->input->post('vit', TRUE);
										$mana = $this->input->post('mana', TRUE);
										if ($this->input->post('distrib_merc_points', TRUE))
											{
												$strdb = merc_attrib('STR', $data['merc']->row()->Ability);
												$intdb = merc_attrib('INT', $data['merc']->row()->Ability);
												$dexdb = merc_attrib('DEX', $data['merc']->row()->Ability);
												$vitdb = merc_attrib('VIT', $data['merc']->row()->Ability);
												$manadb = merc_attrib('MANA', $data['merc']->row()->Ability);
												$pointsdb = merc_attrib('POINTS', $data['merc']->row()->Ability);
												
												$strn = $str + $strdb;
												$intn = $int + $intdb;
												$dexn = $dex + $dexdb;
												$vitn = $vit + $vitdb;
												$manan = $mana + $manadb;
												$pointsn = $str + $int + $dex + $vit + $mana;

												//check balance, pastikan x lebih dari pointsdb
												$balance = $pointsdb - $pointsn;
												if ($balance >= 0)
													{
														if($strn > 65535)
															{
																$data['info'] = 'Strength (<b>'.$strn.'</b>) has exceed 65535';
																$this->load->view('user/merc_points', $data);
															}
															else
															{
																if ($intn > 65535)
																	{
																		$data['info'] = 'Intelligence (<b>'.$intn.'</b>) has exceed 65535';
																		$this->load->view('user/merc_points', $data);
																	}
																	else
																	{
																		if($dexn > 65535)
																			{
																				$data['info'] = 'Dexterity (<b>'.$dexn.'</b>) has exceed 65535';
																				$this->load->view('user/merc_points', $data);
																			}
																			else
																			{
																				if($manan > 65535)
																					{
																						$data['info'] = 'Mana (<b>'.$manan.'</b>) has exceed 65535';
																						$this->load->view('user/merc_points', $data);
																					}
																					else
																					{
																						$ability = merc_stat($strn, $intn, $dexn, $vitn, $manan, $pointsn, $data['merc']->row()->Ability);
																						//echo $data['merc']->row()->Ability.' from db<br />';
																						//echo $ability.' from form<br />';;
																						$m = $this->hstable->update_ability($hsid, $ability);
																						if (!$m)
																							{
																								$data['info'] = 'Please try again. Somehow i cant update the statistic points';
																								$this->load->view('user/merc_points', $data);
																							}
																							else
																							{
																								$data['info'] = 'Success distribute points';
																								$this->load->view('user/merc_points', $data);
																								$this->account->update_activity();
																								sleep(3);
																								redirect('user/adding_mercenary_stat_points', 'location');
																							}
																					}
																			}
																	}
															}
													}
													else
													{
														$data['info'] = "Your insertion ($pointsn), have exceed your remaining stat points ($pointsdb)";
														$this->load->view('user/merc_points', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do huh?';
								$this->load->view('user/char_points', $data);
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