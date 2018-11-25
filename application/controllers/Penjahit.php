<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjahit extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pesanan');
      $this->load->model('resi');
      $this->load->model('bahan');
      $this->load->library('unit_test');
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
        $this->pesanan->updateStatusPesanan(
            $this->input->post('status'),
            $this->session->userdata('user_id'),
            $this->input->post('id')
        );

        if ($this->input->post('status') == "Accepted") {
            $data = new $this->resi($this->input->post('pelanggan'));
            $data->setKasir(NULL);
            $data->setPenjahit($this->session->userdata('user_id'));
            $data->setPesanan($this->input->post('id'));
            $data->setPakaian(NULL);
            $data->setTotal($this->input->post('jumlah'));
            $data->setHarga($this->input->post('harga'));
            $data->setStatus("To be accepted");

            echo $this->unit->run(
                $this->resi->createResi($data),
                TRUE,
                '<strong style="font-size: 30px;">Memasukan data kedalam tabel resi</strong>',
                '<p>Berikut ini adalah data yang di upload ke database: </p><div><pre>'.var_export($data, true).'</pre></div>'
            );
            ;
        }
        // redirect('penjahit');
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
