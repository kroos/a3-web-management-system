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

	function news_id($id)
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Category' => 'NEWS', 'Bil' => $id));
		}

	function download_id($id)
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Category' => 'DOWNLOAD', 'Bil' => $id));
		}

	function event_id($id)
		{
			return $this->db->order_by('Date', 'DESC')->get_where('A3Web_HTML', array('Category' => 'EVENT', 'Bil' => $id));
		}

//UPDATE
	function update_news($bil, $html, $subject, $char)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('HTML' => $html, 'Subject' => $subject, 'Author' => $char, 'Date' => mssqldate()));
		}

	function update_download($bil, $html, $subject, $char)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('DOWNLOAD' => $html, 'Subject' => $subject, 'Author' => $char, 'Date' => mssqldate()));
		}

	function update_event($bil, $html, $subject, $char)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('EVENT' => $html, 'Subject' => $subject, 'Author' => $char, 'Date' => mssqldate()));
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