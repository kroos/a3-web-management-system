<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hsstonetable extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for hsstonetable

//UPDATE

//INSERT

//DELETE
		function delete_stone_master($char)
			{
				return $this->db->delete('HSDB.dbo.HSSTONETABLE', array('MasterName' => $char));
			}
#############################################################################################################################
	}
?>