<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_m extends CI_Model
{
	function logged_in()
	{
		return $this->session->userdata('user_id');
    }
    
	function login($table, $field1, $field2)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1);
		$this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
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