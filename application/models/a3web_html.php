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

//UPDATE
	function update_news($bil, $html, $date)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('HTML' => $html, 'Date' => $date));
		}

	function update_download($bil, $html, $date)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('DOWNLOAD' => $html, 'Date' => $date));
		}

	function update_event($bil, $html, $date)
		{
			return $this->db->where(array('bil' => $bil))->update('A3Web_HTML', array('EVENT' => $html, 'Date' => $date));
		}

//INSERT
	function insert_news($author, $subject, $html, $date)
		{
			return $this->db->insert('A3Web_HTML', array('Author' => $author, 'Category' => 'NEWS', 'Subject' => $subject, 'HTML' => $html, 'Date' => $date));
		}

	function insert_download($author, $subject, $html, $date)
		{
			return $this->db->insert('A3Web_HTML', array('Author' => $author, 'Category' => 'DOWNLOAD', 'Subject' => $subject, 'HTML' => $html, 'Date' => $date));
		}

	function insert_event($author, $subject, $html, $date)
		{
			return $this->db->insert('A3Web_HTML', array('Author' => $author, 'Category' => 'EVENT', 'Subject' => $subject, 'HTML' => $html, 'Date' => $date));
		}

//DELETE
	function delete_news($bil, $html, $date)
		{
			return $this->db->delete('A3Web_HTML', array('bil' => $bil));
		}

	function delete_download($bil, $html, $date)
		{
			return $this->db->delete('A3Web_HTML', array('bil' => $bil));
		}

	function delete_event($bil)
		{
			return $this->db->delete('A3Web_HTML', array('bil' => $bil));
		}

#############################################################################################################################
	}
?>