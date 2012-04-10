<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hsdb_hstable_merc_view extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for charac0_account_view
//SELECT
	function board_of_mercenaries($rows)
		{
			return $this->db->select('HSDB.dbo.HSTABLE.MasterName, HSDB.dbo.HSTABLE.HSName, HSDB.dbo.HSTABLE.HSLevel, HSDB.dbo.MERC.rb, HSDB.dbo.MERC.reset_rb')->from('HSDB.dbo.MERC')->join('HSDB.dbo.HSTABLE', 'HSDB.dbo.MERC.HSName = HSDB.dbo.HSTABLE.HSName', 'INNER')->where('(HSDB.dbo.HSTABLE.HSState = 0)')->order_by('HSDB.dbo.MERC.reset_rb DESC, HSDB.dbo.MERC.rb DESC, HSDB.dbo.HSTABLE.HSLevel DESC, HSDB.dbo.HSTABLE.HSName, HSDB.dbo.HSTABLE.MasterName')->limit($rows)->get();
		}





#############################################################################################################################
	}
?>