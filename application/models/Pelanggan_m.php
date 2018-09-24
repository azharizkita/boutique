<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelanggan_m extends CI_Model
{
   function getData()
   {
      return $this->db->get('pesanan');
   }
   function getBahan()
   {
      return $this->db->get_where('bahan', array('kuantitas >' => 0));
   }
   function getUser()
   {
      return $this->db->get('user');
   }
   public function upload()
   {
      $tipe = $this->input->post('tipe');
      $bahan = $this->input->post('bahan');
      $hargaTemp = $this->db->get_where('bahan', array('id' => $bahan))->result();
      foreach ($hargaTemp as $hargaR) {
         if ($hargaR->id==$bahan && $tipe=="Kaus"){
            $harga = ($hargaR->harga + 25000)*$this->input->post('jumlah');
         }elseif ($hargaR->id==$bahan && $tipe=="Kemeja"){
            $harga = ($hargaR->harga + 35000)*$this->input->post('jumlah');
         }elseif ($hargaR->id==$bahan && $tipe=="Jaket"){
            $harga = ($hargaR->harga + 45000)*$this->input->post('jumlah');
         }elseif ($hargaR->id==$bahan && $tipe=="Jas"){
            $harga = ($hargaR->harga + 55000)*$this->input->post('jumlah');
         }
      }
      $config['upload_path'] = './assets/images/uploads/pesanan/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 0;
      $config['file_name'] = 'pesanan';
      $this->load->library('upload', $config);
if (!$this->upload->do_upload('image')) {
         redirect('pages/pelanggan');
      } else {
         $data = array(
            'nama' => $this->input->post('pesanan'),
            'gambar' => $this->upload->file_name,
            'tipe' => $tipe,
            'ukuran' => $this->input->post('ukuran'),
            'bahan' => $bahan,
            'user' => $this->session->userdata('user_id'),
            'kuantitas' => $this->input->post('jumlah'),
            'status' => 'To be confirmed',
            'harga' => $harga
         );
         $this->db->insert('pesanan', $data);
         redirect('pages/pelanggan');
      }
   }
}
