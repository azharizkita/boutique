<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('login_m');
      $this->load->model('supplier_m');
   }
   public function index()
   {
      if ($this->login_m->logged_id()) {
         if ($this->session->userdata('user_type') == "Pelanggan") {
            redirect('pages/pelanggan');
         } elseif ($this->session->userdata('user_type') == "Penjahit") {
            redirect('pages/penjahit');
         } elseif ($this->session->userdata('user_type') == "Supplier") {
            $post['stock'] = $this->supplier_m->getData()->result();
            $this->load->view("page/header");
            $this->load->view("page/content/supplier", $post);
            $this->load->view("page/footer");
         } elseif ($this->session->userdata('user_type') == "Kasir") {
            redirect('pages/kasir');
         } else {
            redirect('pages/admin');
         }
      } else {
         redirect("login");
      }
   }
   public function add()
   {
      $this->supplier_m->add();
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('login');
   }
}
