<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_m extends CI_Model
{
	function register($nama, $email, $username, $password)
	{
		$data = array(
			'username' => $username,
			'email' => $email,
			'nama' => $nama,
			'password' => $password,
			'privilege' => 'Member'
		);
		if (!$this->db->insert('user', $data)) {
			$data['notification'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								  <span aria-hidden="true">&times;</span>
  									  </button>
  									  <strong>Error!</strong><br>
  									  Either your username or password is invalid!
									  </div>';
			$this->load->view('content/greeter', $data);
		} else {
			$data['notification'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								  <span aria-hidden="true">&times;</span>
  									  </button>
  									  <strong>Congrats!</strong><br>
  									  Your account successfully created!
									  </div>';
			$this->load->view('content/greeter', $data);
		}
	}
}