<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pesanan_m extends CI_Model
{
      public function __construct($nama = NULL) {
            $this->nama = $nama;
      }

      public function setGambar($gambar = NULL)
      {
            $this->gambar = $gambar;
      }

      public function setTipe($tipe = NULL)
      {
            $this->tipe = $tipe;
      }

      public function setUkuran($ukuran = NULL)
      {
            $this->ukuran = $ukuran;
      }

      public function setBahan($bahan = NULL)
      {
            $this->bahan_id = $bahan;
      }

      public function setPelanggan($pelanggan = NULL)
      {
            $this->pelanggan_id = $pelanggan;
      }

      public function setJumlah($jumlah = NULL)
      {
            $this->jumlah = $jumlah;
      }

      public function setStatus($status = NULL)
      {
            $this->status = $status;
      }

      public function setHarga($harga = NULL)
      {
            $this->harga = $harga;
      }

      public function getPesanan()
      {
         return $this->db->get('pesanan')->result();
      }

      public function uploadPesanan($data)
      {
            $this->db->insert('pesanan', $data);
      }

      public function updateStatusPesanan($status, $idPenjahit, $id)
      {
            $data = array(
                  'status' => $status,
                  'penjahit_id' => $idPenjahit
            );
            $this->db->where('id', $id);
            $this->db->update('pesanan', $data);                                                                                                                                                                                
      }
}
