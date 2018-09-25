<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('login_m');
      $this->load->model('admin_m');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Member"){
            redirect('pelanggan');
        } elseif ($this->session->userdata('user_priv')=="Penjahit") {
            redirect('penjahit');
        } elseif ($this->session->userdata('user_priv')=="Supplier") {
            redirect('supplier');
        } elseif ($this->session->userdata('user_priv')=="Kasir") {
            redirect('kasir');
        } elseif($this->session->userdata('user_priv')=="Admin") {
            $this->load->view("header");
            $this->load->view("content/admin");
            $this->load->view("footer");
        } else {
            redirect('login');
        }
   }
   public function upload()
   {
      $this->pelanggan_m->upload();
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('login');
   }
}
