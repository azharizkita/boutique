<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Model
{
    public $nama;
    public $gambar;
    public $tipe;
    public $ukuran;
    public $status;
    public $pelanggan;
    public $bahan;
    public $penjahit;
    public $jumlah;
    public $harga;

    /**
     * Pesanan constructor.
     * @param $nama
     */
    public function __construct($nama = NULL)
    {
        $this->nama = $nama;
    }

    /**
     * @param mixed $gambar
     */
    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }

    /**
     * @param mixed $tipe
     */
    public function setTipe($tipe)
    {
        $this->tipe = $tipe;
    }

    /**
     * @param mixed $ukuran
     */
    public function setUkuran($ukuran)
    {
        $this->ukuran = $ukuran;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param mixed $pelanggan
     */
    public function setPelanggan($pelanggan)
    {
        $this->pelanggan = $pelanggan;
    }

    /**
     * @param mixed $bahan
     */
    public function setBahan($bahan)
    {
        $this->bahan = $bahan;
    }

    /**
     * @param mixed $penjahit
     */
    public function setPenjahit($penjahit)
    {
        $this->penjahit = $penjahit;
    }

    /**
     * @param mixed $jumlah
     */
    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getPesanan()
    {
        return $this->db->get('pesanan')->result();
    }

    public function uploadPesanan($data)
    {
        return $this->db->insert('pesanan', $data);
    }

    public function updateStatusPesanan($status, $idPenjahit, $id)
    {
        $data = array(
            'status' => $status,
            'penjahit' => $idPenjahit
        );
        $this->db->where('id', $id);
        return $this->db->update('pesanan', $data);
    }
}
