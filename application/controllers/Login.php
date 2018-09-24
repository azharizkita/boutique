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
      if ($this->login_m->logged_id()) {
         if ($this->session->userdata('user_type') == "Pelanggan") {
            redirect('pages/pelanggan');
         } elseif ($this->session->userdata('user_type') == "Penjahit") {
            redirect('pages/penjahit');
         } elseif ($this->session->userdata('user_type') == "Supplier") {
            redirect('pages/supplier');
         } elseif ($this->session->userdata('user_type') == "Kasir") {
            redirect('pages/kasir');
         } else {
            redirect('pages/admin');
         }
      } else {
         $this->form_validation->set_rules('username', 'Username', 'required');
         if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post("username", TRUE);
            $password = $this->input->post('password', TRUE);
            $checking = $this->login_m->check_login('user', array('username' => $username), array('password' => $password));
            if ($checking != FALSE) {
foreach ($checking as $apps) {
                  $session_data = array(
                     'user_id' => $apps->id,
                     'user_name' => $apps->username,
                     'user_pass' => $apps->password,
                     'user_nama' => $apps->nama,
                     'user_email' => $apps->email,
                     'user_type' => $apps->tipe
                  );
                  $this->session->set_userdata($session_data);
                  if ($this->session->userdata('user_type') == "Pelanggan") {
                     redirect('pages/pelanggan');
                  } elseif ($this->session->userdata('user_type') == "Penjahit") {
                     redirect('pages/penjahit');
                  } elseif ($this->session->userdata('user_type') == "Supplier") {
                     redirect('pages/supplier');
                  } elseif ($this->session->userdata('user_type') == "Kasir") {
                     redirect('pages/kasir');
                  } else {
                     redirect('pages/admin');
                  }
               }
            } else {
               $data['error'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                             </button>
                             <strong>Error!</strong><br>
                             Your username or password is invalid!
                             </div>';
               $this->load->view('login', $data);
            }
         } else {
            $this->load->view('login');
         }
      }
   }
}
