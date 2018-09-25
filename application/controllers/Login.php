<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('login_m');
	}
	public function index()
	{
		if ($this->login_m->logged_in()) {
			if ($this->session->userdata('user_priv')=="Member"){
				redirect("pelanggan");
			} elseif ($this->session->userdata('user_priv')=="Admin") {
				redirect("admin");
			} elseif ($this->session->userdata('user_priv')=="Penjahit") {
				redirect("penjahit");
			} elseif ($this->session->userdata('user_priv')=="Supplier") {
				redirect("supplier");
			}
		} else {
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$checking = $this->login_m->check_login('user', array('username'=>$username), array('password'=> $password));
			if ($checking){
				foreach ($checking as $data) {
					$session_data = array(
						'user_id' => $data->id,
						'user_name' => $data->username,
						'user_mail' => $data->email,
						'user_nama' => $data->nama,
						'user_priv' => $data->privilege
					);
				}
				$this->session->set_userdata($session_data);
				if ($this->session->userdata('user_priv')=="Member"){
					redirect("pelanggan");
				} elseif ($this->session->userdata('user_priv')=="Admin") {
					redirect("admin");
				} elseif ($this->session->userdata('user_priv')=="Penjahit") {
					redirect("penjahit");
				} elseif ($this->session->userdata('user_priv')=="Supplier") {
					redirect("supplier");
				}
			} else {
				$data['error'] = 'Your password or username is invalid!';
				$this->load->view('content/greeter', $data);
			}
		}

	}
}