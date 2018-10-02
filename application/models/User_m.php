<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_m extends CI_Model
{
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
    
    function register($nama, $email, $username, $password)
	{
		$data = array(
			'username' => $username,
			'email' => $email,
			'nama' => $nama,
			'password' => $password,
			'privilege' => 'Pelanggan'
		);
		if (!$this->db->insert('user', $data)) {
            return FALSE;
		} else {
            return TRUE;
		}
	}
}