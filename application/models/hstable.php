<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hstable extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for hstable
	function hstable_merc($char)
		{
			return $this->db->get_where('HSDB.dbo.HSTABLE', array('MasterName' => $char, 'HSState' => 0));
		}

	function hstable_id($char, $id)
		{
			return $this->db->get_where('HSDB.dbo.HSTABLE', array('MasterName' => $char, 'HSState' => 0, 'HSID' => $id));
		}

	function hstable_hsid($id)
		{
			return $this->db->get_where('HSDB.dbo.HSTABLE', array('HSID' => $id, 'HSState' => 0));
		}
//UPDATE
	function update_rebirth($id, $char)
		{
			return $this->db->where(array('HSID' => $id, 'MasterName' => $char))->update('HSDB.dbo.HSTABLE', array('HSLevel' => 1, 'HSExp' => 0));
		}
//INSERT

//DELETE

#############################################################################################################################
	}
?>