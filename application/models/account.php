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
			return $this->db->get_where('Account', array('c_id' => $username, 'c_headera' => $password));
		}

	function account()
		{
			return $this->db->get('Account');
		}

	function account_get_password($username, $email)
		{
			return $this->db->get_where('Account', array('c_id' => $username, 'c_headerb' => $email));
		}

//UPDATE
	function update_pasword($username, $password)
		{
			return $this->db->where(array('c_id' => $username))->update('Account', array('c_headera' => $password, 'd_udate' => mssqldate()));
		}

//INSERT
	function insert_account($author, $subject, $html, $date)
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

#############################################################################################################################
	}
?>