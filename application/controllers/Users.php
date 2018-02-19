<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// load library
		$this->load->library(array('session'));

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url(), 'location');
		}
	}

	public function logout()
			{
						//process
						$array = array 
								(
									'username' => NULL,
									'password' => NULL,
									'group' => NULL,
									'logged_in' => NULL,
								);
						$this->session->unset_userdata($array);
						$this->session->sess_destroy();
						redirect(base_url(), 'location');
			}
#############################################################################################################################
}
/* End of file Users.php */
/* Location: ./application/controllers/welcome.php */