<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Model
{
    public $pelanggan;
    public $kasir;
    public $penjahit;
    public $pesanan;
    public $pakaian;
    public $total;
    public $harga;
    public $status;

    /**
     * Resi constructor.
     * @param $pelanggan
     */
    public function __construct($pelanggan = NULL)
    {
        $this->pelanggan = $pelanggan;
    }

    /**
     * @param mixed $kasir
     */
    public function setKasir($kasir)
    {
        $this->kasir = $kasir;
    }

    /**
     * @param mixed $penjahit
     */
    public function setPenjahit($penjahit)
    {
        $this->penjahit = $penjahit;
    }

    /**
     * @param mixed $pesanan
     */
    public function setPesanan($pesanan)
    {
        $this->pesanan = $pesanan;
    }

    /**
     * @param mixed $pakaian
     */
    public function setPakaian($pakaian)
    {
        $this->pakaian = $pakaian;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
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
            'kasir' => $kasir,
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
