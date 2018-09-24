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
      if ($this->login_m->logged_id()) {
            if ($this->session->userdata('user_type')=="Pelanggan"){
                redirect('pages/pelanggan');
            } elseif ($this->session->userdata('user_type')=="Penjahit") {
                redirect('pages/penjahit');
            } elseif ($this->session->userdata('user_type')=="Supplier") {
                redirect('pages/supplier');
            } elseif ($this->session->userdata('user_type')=="Kasir") {
                redirect('pages/kasir');
            } else {
               $post['pembayaran'] = $this->admin_m->getPembayaran()->result();
            $post['user'] = $this->admin_m->getUser()->result();
            $post['bahan'] = $this->admin_m->getBahan()->result();
            $post['baju'] = $this->admin_m->getBaju()->result();
            $post['pesanan'] = $this->admin_m->getPesanan()->result();
                $this->load->view("page/header");
                $this->load->view("page/content/admin", $post);
                $this->load->view("page/footer");
            }
      } else {
         redirect("login");
      }
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('login');
   }
}
