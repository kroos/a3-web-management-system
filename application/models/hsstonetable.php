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
		function master($char)
			{
				return $this->db->get_where('HSDB.dbo.HSSTONETABLE', array('MasterName' => $char));
			}

//UPDATE
		function update_transfer($char, $CreateDate, $SaveDate, $Slot0, $Slot1, $Slot2, $Slot3)
			{
				return $this->db->where(array('MasterName' => $char))->update('HSDB.dbo.HSSTONETABLE', array('CreateDate' => $CreateDate, 'SaveDate' => $SaveDate, 'Slot0' => $Slot0, 'Slot1' => $Slot1, 'Slot2' => $Slot2, 'Slot3' => $Slot3));
			}

//INSERT

//DELETE
		function delete_stone_master($char)
			{
				return $this->db->delete('HSDB.dbo.HSSTONETABLE', array('MasterName' => $char));
			}
#############################################################################################################################
	}
?>