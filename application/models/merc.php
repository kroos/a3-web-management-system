<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merc extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for hstable
	function merc_getAll($char, $hsid)
		{
			return $this->db->get_where('HSDB.dbo.MERC', array('MasterName' => $char, 'HSID' => $hsid));
		}

//UPDATE
	function update_rebirth($hsid, $mastername, $rb)
		{
			return $this->db->where(array('HSID' => $hsid, 'MasterName' => $mastername))->update('HSDB.dbo.MERC', array('rb' => $rb));
		}

		function update_reset_rebirth($hsid, $mastername, $reset_rb)
		{
			return $this->db->where(array('HSID' => $hsid, 'MasterName' => $mastername))->update('HSDB.dbo.MERC', array('reset_rb' => $reset_rb, 'rb' => 0));
		}

//INSERT
	function insert_merc($HSID, $HSName, $MasterName, $Type, $HSLevel)
		{
			$array = array
							(
								'HSID' => $HSID,
								'HSName' => $HSName,
								'MasterName' => $MasterName,
								'Type' => $Type,
								'HSLevel' => $HSLevel,
								'rb' => 0,
								'reset_rb' => 0,
							);
			return $this->db->insert('HSDB.dbo.MERC', $array);
		}

//DELETE

#############################################################################################################################
	}
?>