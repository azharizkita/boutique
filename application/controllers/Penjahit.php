<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjahit extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('login_m');
      $this->load->model('penjahit_m');
   }
   public function index()
   {
      if ($this->login_m->logged_id()) {
            if ($this->session->userdata('user_type')=="Pelanggan"){
                redirect('pages/pelanggan');
            } elseif ($this->session->userdata('user_type')=="Penjahit") {
            $post['pesanan'] = $this->penjahit_m->getData()->result();
            $post['bahan'] = $this->penjahit_m->getBahan()->result();
            $post['user'] = $this->penjahit_m->getUser()->result();
                $this->load->view("page/header");
                $this->load->view("page/content/penjahit", $post);
                $this->load->view("page/footer");
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
   public function update()
   {
      $this->penjahit_m->update();
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('login');
   }
   public function cetakResi(){
      $this->penjahit_m->resi();
   }
}
