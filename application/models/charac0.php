<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charac0 extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for a3web_html
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

	function char_online($minutes_ago)
		{
			$t = $this->db->select("DATEADD(minute, $minutes_ago, GETDATE()) AS hourago", FALSE)->get()->row();
			return $this->db->where("(c_status = 'A') AND (d_udate >= CONVERT(DATETIME, '".$t->hourago."', 102))")->order_by ('d_udate', 'DESC')->get('Charac0');
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

	//update mbody n wz
	function update_wz_mbody($char, $wz, $mbody)
		{
			return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_headerc' => $wz, 'm_body' => $mbody) );
		}

	function update_rebirth($char, $wz, $mbody, $rb)
		{
			return $this->db->where(array('c_id' => $char, 'c_sheadera' => $this->session->userdata('username')))->update('Charac0', array('c_sheaderc' => '1', 'c_headerc' => $wz, 'm_body' => $mbody, 'rb' => $rb));
		}
//INSERT

//DELETE

#############################################################################################################################
	}
?>