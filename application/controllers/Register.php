<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('register_m');
	}
	public function index()
	{
		$this->form_validation->set_rules('nameR', 'Name', 'required');
		$this->form_validation->set_rules('emailR', 'Email', 'required');
		$this->form_validation->set_rules('usernameR', 'Username', 'required');
		$this->form_validation->set_rules('passwordR', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$nama = $this->input->post("nameR", TRUE);
			$email = $this->input->post("emailR", TRUE);
			$username = $this->input->post("usernameR", TRUE);
			$password = $this->input->post('passwordR', TRUE);
			$this->register_m->register($nama, $email, $username, $password);
		} else {
			$this->load->view('login');
		}
	}
}