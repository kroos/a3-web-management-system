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
			return $this->db->get('Charac0');
		}

	function charac_char($username)
		{
			return $this->db->get_where('Charac0', array('c_sheadera' => $username));
		}

		public function char_online($minutes_ago)
			{
				$t = $this->db->select("DATEADD(minute, $minutes_ago, GETDATE()) AS hourago", FALSE)->get()->row();
				return $this->db->where("(c_status = 'A') AND (d_udate >= CONVERT(DATETIME, '".$t->hourago."', 102))")->order_by ('d_udate', 'DESC')->get('Charac0');
			}

//UPDATE

//INSERT

//DELETE

#############################################################################################################################
	}
?>