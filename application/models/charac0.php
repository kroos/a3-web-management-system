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

	function charac_char($username)
		{
			return $this->db->get_where('Charac0', array('c_sheadera' => $username, 'c_status' => 'A'));
		}

	function charac_cid($char)
		{
			return $this->db->get_where('Charac0', array('c_id' => $char, 'c_status' => 'A'));
		}

	function char_online($minutes_ago)
		{
			$t = $this->db->select("DATEADD(minute, $minutes_ago, GETDATE()) AS hourago", FALSE)->get()->row();
			return $this->db->where("(c_status = 'A') AND (d_udate >= CONVERT(DATETIME, '".$t->hourago."', 102))")->order_by ('d_udate', 'DESC')->get('Charac0');
		}

//UPDATE
	function update_tele($char, $town)
		{
			return $this->db->where('c_id', $char)->update('Charac0', array('c_headerb' => $town));
		}
//INSERT

//DELETE

#############################################################################################################################
	}
?>