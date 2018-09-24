<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('login_m');
      $this->load->model('kasir_m');
   }
   public function index()
   {
      if ($this->login_m->logged_id()) {
            if ($this->session->userdata('user_type')=="Pelanggan"){
                redirect('pages/pelanggan');
            } elseif ($this->session->userdata('user_type')=="Penjahit") {
                redirect('pages/penjahit');
            } elseif ($this->session->userdata('user_type')=="Supplier") {
                redirect('pages/supplier');
            } elseif ($this->session->userdata('user_type')=="Kasir") {
            $post['transaksi'] = $this->kasir_m->getData()->result();
                $this->load->view("page/header");
                $this->load->view("page/content/kasir",$post);
                $this->load->view("page/footer");
            } else {
                redirect('pages/admin');
            }
      } else {
         redirect("login");
      }
   }
   public function accept()
   {
      $this->kasir_m->acc();
   }
   public function update()
   {
      $this->kasir_m->upStatus();
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('login');
   }
}
