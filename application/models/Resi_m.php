<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Resi_m extends CI_Model
{

    public function __construct($idPelanggan = NULL) {
        $this->pelanggan_id = $idPelanggan;
    }

    public function setKasir($idKasir = NULL)
    {
        $this->kasir_id = $idKasir;
    }

    public function setPenjahit($idPenjahit = NULL)
    {
        $this->penjahit_id = $idPenjahit;
    }

    public function setPesanan($idPesanan = NULL)
    {
        $this->pesanan_id = $idPesanan;
    }

    public function setPakaian($idPakaian = NULL)
    {
        $this->pakaian_id = $idPakaian;
    }

    public function setTotal($jumlah = NULL)
    {
        $this->total = $jumlah;
    }

    public function setHarga($harga = NULL)
    {
        $this->harga = $harga;
    }

    public function setStatus($status = NULL)
    {
        $this->status = $status;
    }

    public function getResi()
    {
       return $this->db->get('resi')->result();
    }

    public function createResi($data)
    {
        return $this->db->insert('resi', $data);
    }

    public function acceptPembayaran($kasir, $status, $id)
    {
        $data = array(
            'kasir_id' => $kasir,
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('resi', $data);
    }
    public function updateStatusPembayaran($status, $id)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('resi', $data);
    }
}
