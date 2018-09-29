<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('bahan_m');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            redirect('pelanggan');
        } elseif ($this->session->userdata('user_priv')=="Penjahit") {
            redirect("penjahit");
        } elseif ($this->session->userdata('user_priv')=="Supplier") {
            $this->load->view("header");
            $this->load->view("content/supplier");
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv')=="Kasir") {
            redirect("kasir");
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect("admin");
        } else {
            redirect('greeter');
        }
   }

   public function addBahan()
   {
      $this->bahan_m->addBahan(
        $this->input->post('kuantitas') + $this->input->post('kuantitasO'),
        $this->session->userdata('user_id'),
        $this->input->post('id')
      );
   }
   
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
