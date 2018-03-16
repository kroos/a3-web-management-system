<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merc extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for merc
		function merc_getAll($char, $hsid)
			{
				return $this->db->get_where('Merc', array('MasterName' => $char, 'HSID' => $hsid));
			}

//UPDATE
		function update_rebirth($hsid, $mastername, $rb)
			{
				return $this->db->where(array('HSID' => $hsid, 'MasterName' => $mastername))->update('Merc', array('rb' => $rb));
			}

			function update_reset_rebirth($hsid, $mastername, $reset_rb)
			{
				return $this->db->where(array('HSID' => $hsid, 'MasterName' => $mastername))->update('Merc', array('reset_rb' => $reset_rb, 'rb' => 0));
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
				return $this->db->insert('Merc', $array);
			}

//DELETE
		function delete_merc($master)
			{
				$this->db->delete('Merc', array('MasterName' => $master));
			}

#############################################################################################################################
	}
?>