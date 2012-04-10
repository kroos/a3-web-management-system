<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charac0_account_view extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for charac0_account_view
//SELECT
	function board_of_heroes($secret_password, $rows)
		{
			return $this->db->select('Charac0.c_id, Charac0.c_sheaderc, Charac0.rb, Charac0.times_rb, Charac0.d_udate')->from('Charac0')->join('Account', 'Charac0.c_sheadera = Account.c_id', 'INNER')->where("(Charac0.c_status <> 'X') AND (Account.c_sheaderc <> 'GM') AND (Account.c_headera <> '$secret_password')")->order_by('Charac0.times_rb DESC, Charac0.rb DESC, Charac0.c_sheaderc DESC, Charac0.d_udate DESC')->limit("$rows")->get();
		}





#############################################################################################################################
	}
?>