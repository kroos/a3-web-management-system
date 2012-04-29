<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A3web_comment extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for a3web_comment
//SELECT
		function reply($id)
			{
				return $this->db->order_by('bil', 'ASC')->get_where('A3Web_Comment', array('bil_post' => $id));
			}

//UPDATE
		function update_comment($bil, $html)
			{
				return $this->db->where(array('bil' => $bil))->update('A3Web_Comment', array('HTML' => $html, 'date' => mssqldate()));
			}

//INSERT
		function insert_news($author, $bil_post, $html)
			{
				return $this->db->insert('A3Web_Comment', array('author' => $author, 'bil_post' => $bil_post, 'html' => $html, 'date' => mssqldate()));
			}

//DELETE
		function delete_a3web($bil)
			{
				return $this->db->delete('A3Web_Comment', array('bil' => $bil));
			}


#############################################################################################################################
	}
?>