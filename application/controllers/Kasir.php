<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('resi_m');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            redirect('pelanggan');
        } elseif ($this->session->userdata('user_priv')=="Penjahit") {
            redirect('penjahit');
        } elseif ($this->session->userdata('user_priv')=="Supplier") {
            redirect('supplier');
        } elseif ($this->session->userdata('user_priv')=="Kasir") {
            $this->load->view("header");
            $this->load->view("content/kasir");
            $this->load->view("footer");
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect('admin');
        } else {
            redirect('greeter');
        }
   }
   
   public function acceptPembayaran()
   {
        return $this->resi_m->acceptPembayaran(
            $this->input->post('statusUp'),
            $this->input->post('id')
        );
   }

   public function updateStatusPembayaran()
   {
        return $this->resi_m->updateStatusPembayaran(
            $this->input->post('status'),
            $this->input->post('id')
        );
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
