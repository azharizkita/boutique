<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pesanan_m extends CI_Model
{
      public function uploadPesanan($nama, $gambar, $tipe, $ukuran, $bahan, $pelanggan, $jumlah, $status, $harga)
      {
            $data = array(
                  'nama' => $nama,
                  'gambar' => $gambar,
                  'tipe' => $tipe,
                  'ukuran' => $ukuran,
                  'bahan_id' => $bahan,
                  'pelanggan_id' => $pelanggan,
                  'jumlah' => $jumlah,
                  'status' => $status,
                  'harga' => $harga
            );
            $this->db->insert('pesanan', $data);
      }
      public function updateStatusPesanan($status, $idPenjahit, $id, $statusNew, $idPelanggan, $jumlah, $harga)
      {
            $data = array(
                  'status' => $status,
                  'penjahit_id' => $idPenjahit
            );
            $this->db->where('id', $id);
            $this->db->update('pesanan', $data);
            $resi = array(
                  'status' => $statusNew,
                  'pelanggan_id' => $idPelanggan,
                  'penjahit_id' => $idPenjahit,
                  'pesanan_id' => $id,
                  'total' => $jumlah,
                  'harga' => $harga
            );
            $this->db->insert('resi', $resi);
            redirect('penjahit');                                                                                                                                                                                                  
      }
}
