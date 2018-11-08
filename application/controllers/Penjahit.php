<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjahit extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pesanan_m');
      $this->load->model('resi_m');
      $this->load->model('bahan_m');
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
            $this->input->post('id')
        );

        if ($this->input->post('status') == "Accepted") {
            $data = new $this->resi_m($this->input->post('pelanggan'));
            $data->setKasir();
            $data->setPenjahit($this->session->userdata('user_id'));
            $data->setPesanan($this->input->post('id'));
            $data->setTotal($this->input->post('jumlah'));
            $data->setHarga($this->input->post('harga'));
            $data->setStatus("To be accepted");
            $this->resi_m->createResi($data);
        }
        redirect('penjahit');
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
