<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Itemstorage0 extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for Itemstorage0
//SELECT

//UPDATE

//INSERT
	
//DELETE
		function delete_storage($username)
			{
				return $this->db->delete('ItemStorage0', array('c_id' => $username));
			}
#############################################################################################################################
	}
?>