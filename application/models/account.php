<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for account
//SELECT
		function account_user($username, $password)
			{
				return $this->db->get_where('Account', array('c_id' => $username, 'c_headera' => $password, 'c_status' => 'A'));
			}

		function account()
			{
				return $this->db->get_where('Account', array('c_status' => 'A'));
			}

		function account_get_password($username, $email)
			{
				return $this->db->get_where('Account', array('c_id' => $username, 'c_headerb' => $email, 'c_status' => 'A'));
			}

		function account_cid($username)
			{
				return $this->db->get_where('Account', array('c_id' => $username, 'c_status' => 'A'));
			}

		function account_cid_ban($username)
			{
				return $this->db->get_where('Account', array('c_id' => $username));
			}

		function account_cheaderb($email)
			{
				return $this->db->get_where('Account', array('c_headerb' => $email));
			}

		function membership_list()
			{
				return $this->db->order_by('c_sheaderc, last_salary DESC')->where('c_sheaderc', 'GoldM')->or_where('c_sheaderc', 'BM')->or_where('c_sheaderc', 'SM')->get('Account');
			}

		function banned_list()
			{
				return $this->db->order_by('d_udate', 'DESC')->get_where('Account', array('c_headera' => $this->config->item('secret_password'), 'c_status' => 'X'));
			}

//UPDATE
		function update_password($password)
			{
				return $this->db->where(array('c_id' => $this->session->userdata('username')))->update('Account', array('c_headera' => $password, 'd_udate' => mssqldate()));
			}

		function update_vip_expired()
			{
				return $this->db->where(array('c_id' => $this->session->userdata('username'), 'c_status' => 'A'))->update('Account', array('c_sheaderc' => 'Normal'));
			}

		function update_activity()
			{
				return $this->db->where(array('c_id' => $this->session->userdata('username'), 'c_status' => 'A'))->update('Account', array('d_udate' => mssqldate()) );
			}

		function update_salary($date)
			{
				return $this->db->where(array('c_id' => $this->session->userdata('username'), 'c_status' => 'A'))->update('Account', array('salary' => $date));
			}

		function update_change_account($username, $acc)
			{
				return $this->db->where(array('c_id' => $username, 'c_status' => 'A'))->update('Account', array('c_sheaderc' => $acc));
			}

		function update_vip_account($username,  $paid, $salary_date)
			{
				return $this->db->where(array('c_id' => $username, 'c_status' => 'A'))->update('Account', array('c_sheadera' => $paid, 'salary' => $salary_date, 'last_salary' => $salary_date));
			}

		function update_ban_account($username,  $backpass)
			{
				return $this->db->where(array('c_id' => $username))->update('Account', array('c_sheadera' => $backpass, 'c_headera' => $this->config->item('secret_password'), 'c_status' => 'X', 'd_udate' => mssqldate()));
			}

		function update_unban_acc($cid, $pass)
			{
				return $this->db->where(array('c_id' => $cid))->update('Account', array( 'c_headera' => $pass, 'c_status' => 'A', 'd_udate' => mssqldate() ));
			}

//INSERT
		function insert_account($username, $password, $email)
			{
				$array = array
								(
									'c_id' => $username,
									'c_sheadera' => 'reserve',
									'c_sheaderb' => generatePassword(8,3),
									'c_sheaderc' => 'Normal',
									'c_headera' => $password,
									'c_headerb' => $email,
									'c_headerc' => 'reserve',
									'd_cdate' =>  mssqldate(),
									'd_udate' => mssqldate(),
									'c_status' => 'A',
									'm_body' =>  'reserve',
									'acc_status' => 'Normal',
									'salary' => mssqldate(),
									'last_salary' => mssqldate()
								);
				return $this->db->insert('Account', $array );
			}

//DELETE
		function delete_acc($username)
			{
				return $this->db->delete('Account', array('c_id' => $username));
			}
#############################################################################################################################
	}
?>