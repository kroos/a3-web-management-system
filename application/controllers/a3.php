<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A3 extends CI_Controller {

	public function index()
		{
			if ($this->session->userdata('logged_in') == true)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['news'] = $this->a3web_html->news();
					$this->load->view('home', $data);
				}
		}

	public function event()
		{
			if ($this->session->userdata('logged_in') == true)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['event'] = $this->a3web_html->event();
					$this->load->view('event', $data);
				}
		}

	public function download()
		{
			if ($this->session->userdata('logged_in') == true)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['event'] = $this->a3web_html->download();
					$this->load->view('download', $data);
				}
		}

	public function login()
		{
			if ($this->session->userdata('logged_in') == true)
				{
					redirect('/user/home', 'location');
				}
				else
				{
					$data['event'] = $this->a3web_html->download();
					$this->load->view('download', $data);
				}
		}





























}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */