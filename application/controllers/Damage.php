<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Damage extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// load library
		$this->load->library(array('session'));
	}

	public function page_missing() {
		$this->load->view('errors/error_custom_404-new');
	}
}