<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charac0 extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for charac0
//SELECT
		function char()
			{
				return $this->db->get_where('Charac0', array('c_status' => 'A'));
			}

//user list
		function charac_char()
			{
				return $this->db->get_where('Charac0', array('c_sheadera' => $this->session->userdata('username'), 'c_status' => 'A'));
			}

//user char attribute
		function charac_cid($char)
			{
				return $this->db->get_where('Charac0', array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username'), 'c_status' => 'A'));
			}

		function search($char)
			{
				return $this->db->like('c_id', $char)->where('c_status', 'A')->get('Charac0');
			}

		function char_online($minutes_ago)
			{
				$t = $this->db->select("DATEADD(minute, $minutes_ago, GETDATE()) AS hourago", FALSE)->get()->row();
				return $this->db->where("(c_status = 'A') AND (d_udate >= CONVERT(DATETIME, '".$t->hourago."', 102))")->order_by ('d_udate', 'DESC')->get('Charac0');
			}

		function charac($char)
			{
				return $this->db->get_where('Charac0', array('c_id' => $char, 'c_status' => 'A'));
			}

		function user_char($username)
			{
				return $this->db->get_where('Charac0', array('c_sheadera' => $username));
			}

		function charb($char)
			{
				return $this->db->get_where('Charac0', array('c_id' => $char));
			}

//UPDATE
		function update_tele($char, $town)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headerb' => $town));
			}

//update mbody
		function update_mbody($char, $mbody)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('m_body' => $mbody) );
			}

		function update_mbody_gm($char, $mbody)
			{
				return $this->db->where(array('c_id' => $char))->update('Charac0', array('m_body' => $mbody) );
			}

//update mbody n wz
		function update_wz_mbody($char, $wz, $mbody)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headerc' => $wz, 'm_body' => $mbody) );
			}
	
		function update_rebirth($char, $wz, $mbody, $rb)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_sheaderc' => '1', 'c_headerc' => $wz, 'm_body' => $mbody, 'rb' => $rb));
			}

		function update_reset_rebirth($char, $wz, $times_rb)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headerc' => $wz, 'rb' => '0', 'times_rb' => $times_rb ) );
			}

		function update_wz($char, $wz)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headerc' => $wz) );
			}

		function update_stat($char, $stat)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headera' => $stat));
			}

		function update_salary($char, $wz)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headerc' => $wz));
			}

		function update_vip_account($char, $user, $plus)
			{
				return $this->db->where(array('c_id' => $char, 'c_sheadera' => $user, 'c_status' => 'A'))->update('Charac0', array('c_headerc' => $plus));
			}

		function update_alter_points($char, $ability, $wz)
			{
				return $this->db->where(array('c_id' => $char))->update('Charac0', array('c_headera' => $ability, 'c_headerc' => $wz));
			}

		function update_char_clone($char, $c_sheaderc, $c_headera, $c_headerb, $c_headerc, $d_cdate, $d_udate, $m_body, $rb, $times_rb)
			{
				if ($d_cdate == NULL)
					{
						return $this->db->where(array('c_id' => $char))->update('Charac0', array( 'c_sheaderc' => $c_sheaderc, 'c_headera' => $c_headera, 'c_headerb' => $c_headerb, 'c_headerc' => $c_headerc, 'd_udate' => $d_udate, 'm_body' => $m_body, 'rb' => $rb, 'times_rb' => $times_rb ));
					}
					else
					{
						return $this->db->where(array('c_id' => $char))->update('Charac0', array( 'c_sheaderc' => $c_sheaderc, 'c_headera' => $c_headera, 'c_headerb' => $c_headerb, 'c_headerc' => $c_headerc, 'd_cdate' => $d_cdate, 'd_udate' => $d_udate, 'm_body' => $m_body, 'rb' => $rb, 'times_rb' => $times_rb ));
					}
			}

		function update_disable_char($char)
			{
				$this->db->where(array('c_id' => $char))->update('Charac0', array('c_status' => 'X'));
			}

	//INSERT
	
	//DELETE
		function delete_char($username)
			{
				return $this->db->delete('Charac0', array('c_sheadera' => $username));
			}
	#############################################################################################################################
	}
?>