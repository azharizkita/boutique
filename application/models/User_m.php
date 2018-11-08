<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_m extends CI_Model
{
	public function __construct($username = NULL) {
		$this->username = $username;
	}

	public function setEmail($email = NULL)
	{
		$this->email = $email;
	}

	public function setNama($nama = NULL)
	{
		$this->nama = $nama;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function setPrivilege($privilege = "Pelanggan")
	{
		$this->privilege = $privilege;
	}
	function logged_in()
	{
		return $this->session->userdata('user_id');
    }
    
	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($username);
		$this->db->where($password);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			$loginData = $query->result();
			foreach ($loginData as $data) {
				$session_data = array(
					'user_id' => $data->id,
					'user_name' => $data->username,
					'user_mail' => $data->email,
					'user_nama' => $data->nama,
					'user_priv' => $data->privilege
				);
				$this->session->set_userdata($session_data);
			}
			return TRUE;
		}
    }
    
    function register($data)
	{
		if (!$this->db->insert('user', $data)) {
            return FALSE;
		} else {
            return TRUE;
		}
	}
}