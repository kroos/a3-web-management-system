<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A3web_html extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for a3web_html
//SELECT
	function news()
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Category' => 'NEWS'));
		}

	function download()
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Category' => 'DOWNLOAD'));
		}

	function event()
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Category' => 'EVENT'));
		}

	function a3web_id($id)
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Bil' => $id));
		}

//UPDATE
	function update_a3web($bil, $html, $subject, $char)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('HTML' => $html, 'Subject' => $subject, 'Author' => $char, 'Date' => mssqldate()));
		}

//INSERT
	function insert_news($author, $subject, $html)
		{
			return $this->db->insert('A3Web_HTML', array('Author' => $author, 'Category' => 'NEWS', 'Subject' => $subject, 'HTML' => $html, 'Date' => mssqldate()));
		}

	function insert_download($author, $subject, $html)
		{
			return $this->db->insert('A3Web_HTML', array('Author' => $author, 'Category' => 'DOWNLOAD', 'Subject' => $subject, 'HTML' => $html, 'Date' => mssqldate()));
		}

	function insert_event($author, $subject, $html)
		{
			return $this->db->insert('A3Web_HTML', array('Author' => $author, 'Category' => 'EVENT', 'Subject' => $subject, 'HTML' => $html, 'Date' => mssqldate()));
		}

//DELETE
	function delete_a3web($bil)
		{
			return $this->db->delete('A3Web_HTML', array('bil' => $bil));
		}


#############################################################################################################################
	}
?>