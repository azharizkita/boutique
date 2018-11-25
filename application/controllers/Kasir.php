<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('resi');
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
        return $this->resi->acceptPembayaran(
            $this->session->userdata('user_id'),
            $this->input->post('statusUp'),
            $this->input->post('id')
        );
        redirect('kasir');
   }

   public function updateStatusPembayaran()
   {
        return $this->resi->updateStatusPembayaran(
            $this->input->post('status'),
            $this->input->post('id')
        );
        redirect('kasir');
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
