<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Boutique extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pakaian_m');
      $this->load->model('resi_m');
   }
   public function index()
   {
        $data['pakaian'] = $this->pakaian_m->getPakaian();
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            $this->load->view("header");
            $this->load->view("content/pelanggan/boutique", $data);
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv')=="Penjahit") {
            redirect('penjahit');
        } elseif ($this->session->userdata('user_priv')=="Supplier") {
            redirect('supplier');
        } elseif ($this->session->userdata('user_priv')=="Kasir") {
            redirect('kasir');
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect('admin');
        } else {
            redirect('greeter');
        }
   }

   public function beli()
   {
        $idPelanggan = $this->session->userdata('user_id');
        $idPakaian = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('jumlah') * $this->input->post('harga');

        $data = new $this->resi_m((int)$this->session->userdata('user_id'));
        $data->setKasir();
        $data->setPenjahit();
        $data->setPesanan();
        $data->setPakaian((int)$this->input->post('id'));
        $data->setTotal((int)$this->input->post('jumlah'));
        $data->setHarga((int)$this->input->post('jumlah') * $this->input->post('harga'));
        $data->setStatus("To be accepted");
        $this->resi_m->createResi($data);
        redirect('boutique');

        // TESTING

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';

        // TESTING
   }
   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}