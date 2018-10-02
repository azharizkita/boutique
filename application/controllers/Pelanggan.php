<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pesanan_m');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            $this->load->view("header");
            $this->load->view("content/pelanggan");
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

   public function uploadPesanan()
   {
      
      $tipe = $this->input->post('tipe');
      $bahan = $this->input->post('bahan');
      $hargaTemp = $this->db->get_where('bahan', array('id' => $bahan))->result();
      foreach ($hargaTemp as $hargaR) {
            if ($hargaR->id==$bahan && $tipe=="Kaus"){
                  $harga = ($hargaR->harga + 25000);
            }elseif ($hargaR->id==$bahan && $tipe=="Kemeja"){
                  $harga = ($hargaR->harga + 35000);
            }elseif ($hargaR->id==$bahan && $tipe=="Jaket"){
                  $harga = ($hargaR->harga + 45000);
            }elseif ($hargaR->id==$bahan && $tipe=="Jas"){
                  $harga = ($hargaR->harga + 55000);
            }
      }
      $config['upload_path'] = './assets/images/uploads/pesanan/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 0;
      $config['file_name'] = 'pesanan_'.$this->input->post('nama');
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('image')) {
        redirect('pelanggan');
      } else {
        $this->pesanan_m->uploadPesanan(
            $this->input->post('nama'),
            $this->upload->file_name,
            $tipe,
            $this->input->post('ukuran'),
            $bahan,
            $this->session->userdata('user_id'),
            $this->input->post('jumlah'),
            'To be confirmed',
            $harga
        );
        redirect('pelanggan');
      }
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}