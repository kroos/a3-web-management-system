<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hstable extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for temp_account
	function hstable_merc($char)
		{
			return $this->db->get_where('HSDB.dbo.HSTABLE', array('MasterName' => $char, 'HSState' => 0));
		}

//UPDATE

//INSERT

//DELETE

#############################################################################################################################
	}
?>