<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjahit extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pesanan_m');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            redirect('pelanggan');
        } elseif ($this->session->userdata('user_priv')=="Penjahit") {
            $this->load->view("header");
            $this->load->view("content/penjahit");
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv')=="Supplier") {
            redirect('supplier');
        } elseif ($this->session->userdata('user_priv')=="Kasir") {
            redirect("kasir");
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect("admin");
        } else {
            redirect('greeter');
        }
   }
   public function updateStatusPesanan()
   {
        $this->pesanan_m->updateStatusPesanan(
            $this->input->post('status'),
            $this->session->userdata('user_id'),
            $this->input->post('id'),
            "To be accepted",
            $this->input->post('pelanggan'),
            $this->input->post('jumlah'),
            $this->input->post('harga')
        );
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
