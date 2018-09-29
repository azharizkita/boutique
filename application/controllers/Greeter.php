<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Greeter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}
	public function index()
	{
		if($this->session->userdata('user_priv')){ 
			if ($this->session->userdata('user_priv')=="Pelanggan"){
				redirect("pelanggan");
			} elseif ($this->session->userdata('user_priv')=="Admin") {
				redirect("admin");
			} elseif ($this->session->userdata('user_priv')=="Penjahit") {
				redirect("penjahit");
			} elseif ($this->session->userdata('user_priv')=="Supplier") {
				redirect("supplier");
			} elseif ($this->session->userdata('user_priv')=="Kasir") {
				redirect("kasir");
			} 
		} else {
			$this->load->view('content/greeter');
		}
	}
	public function login()
	{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post("username", TRUE);
				$password = $this->input->post('password', TRUE);
				$checking = $this->user_m->login('user', array('username' => $username), array('password' => $password));
				if ($checking != FALSE) {
					foreach ($checking as $data) {
						$session_data = array(
							'user_id' => $data->id,
							'user_name' => $data->username,
							'user_mail' => $data->email,
							'user_nama' => $data->nama,
							'user_priv' => $data->privilege
						);
						$this->session->set_userdata($session_data);
						redirect('greeter');
					}
				} else {
					$data['error'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								  <span aria-hidden="true">&times;</span>
  									  </button>
  									  <strong>Error!</strong><br>
  									  Your username or password is invalid!
									  </div>';
					$this->load->view('content/greeter', $data);
				}
			} else {
				$this->load->view('content/greeter');
			}
		
	}

	public function register() {
		$this->form_validation->set_rules('nameR', 'Name', 'required');
		$this->form_validation->set_rules('emailR', 'Email', 'required');
		$this->form_validation->set_rules('usernameR', 'Username', 'required');
		$this->form_validation->set_rules('passwordR', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$nama = $this->input->post("nameR", TRUE);
			$email = $this->input->post("emailR", TRUE);
			$username = $this->input->post("usernameR", TRUE);
			$password = $this->input->post('passwordR', TRUE);
			$checking = $this->user_m->register($nama, $email, $username, $password);
			if ($checking != FALSE) {
				$data['error'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										<strong>Congrats!</strong><br>
										Your account successfully created!
										</div>';
				$this->load->view('content/greeter', $data);
			} else {
				$data['error'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										<strong>Error!</strong><br>
										Either your username or password is invalid!
										</div>';
				$this->load->view('content/greeter', $data);
			}
		} else {
			$this->load->view('login');
		}
	}
}