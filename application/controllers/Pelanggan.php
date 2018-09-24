<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('login_m');
      $this->load->model('pelanggan_m');
   }
   public function index()
   {
      if ($this->login_m->logged_id()) {
            if ($this->session->userdata('user_type')=="Pelanggan"){
            $post['pesanan'] = $this->pelanggan_m->getData()->result();
            $post['bahan'] = $this->pelanggan_m->getBahan()->result();
            $post['user'] = $this->pelanggan_m->getUser()->result();
                $this->load->view("page/header");
                $this->load->view("page/content/pelanggan", $post);
                $this->load->view("page/footer");
            } elseif ($this->session->userdata('user_type')=="Penjahit") {
                redirect('pages/penjahit');
            } elseif ($this->session->userdata('user_type')=="Supplier") {
                redirect('pages/supplier');
            } elseif ($this->session->userdata('user_type')=="Kasir") {
                redirect('pages/kasir');
            } else {
                redirect('pages/admin');
            }
      } else {
         redirect("login");
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
