<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hsdb_hstable_merc_view extends CI_Model 
	{
		// function __construct()
		// 	{
		// 		parent::__construct();
		// 	}
#############################################################################################################################
//CRUD for charac0_account_view
//SELECT
	function board_of_mercenaries($rows)
		{
			return $this->db->select('HSTABLE.MasterName, HSTABLE.HSName, HSTABLE.HSLevel, Merc.rb, Merc.reset_rb')->from('Merc')->join('HSTABLE', 'Merc.HSName = HSTABLE.HSName', 'INNER')->where('(HSTABLE.HSState = 0)')->order_by('Merc.reset_rb DESC, Merc.rb DESC, HSTABLE.HSLevel DESC, HSTABLE.HSName, HSTABLE.MasterName')->limit($rows)->get();
		}





#############################################################################################################################
	}
?>