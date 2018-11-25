<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Model
{
    public $nama;
    public $spesifikasi;
    public $harga;
    public $kuantitas;
    public $supplier;

    /**
     * Bahan constructor.
     * @param $nama
     */
    public function __construct($nama = NULL)
    {
        $this->nama = $nama;
    }

    /**
     * @param mixed $spesifikasi
     */
    public function setSpesifikasi($spesifikasi)
    {
        $this->spesifikasi = $spesifikasi;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    /**
     * @param mixed $kuantitas
     */
    public function setKuantitas($kuantitas)
    {
        $this->kuantitas = $kuantitas;
    }

    /**
     * @param mixed $supplier
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
    }

    public function createBahan($data)
    {
        return $this->db->insert('bahan', $data);
    }

    public function addKuantitas($kuantitas, $supplier, $id)
    {
        $data = array(
            'kuantitas' => $kuantitas,
            'supplier' => $supplier
        );
        $this->db->where('id', $id);
        return $this->db->update('bahan', $data);
    }
}