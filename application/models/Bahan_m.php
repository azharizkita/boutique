<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bahan_m extends CI_Model
{
    public function __construct($nama = NULL) {
        $this->nama = $nama;
    }

    public function setSpesifikasi($spesifikasi = NULL)
    {
        $this->spesifikasi = $spesifikasi;
    }

    public function setHarga($harga = NULL)
    {
        $this->harga = $harga;
    }

    public function setKuantitas($kuantitas = NULL)
    {
        $this->kuantitas = $kuantitas;
    }

    public function setSupplier($supplier_id = NULL)
    {
        $this->supplier_id = $supplier_id;
    }

    public function getBahan()
    {
        return $this->db->get('bahan')->result();
    }
    
    public function createBahan($data)
    {
        return $this->db->insert('bahan', $data);
    }

    public function addKuantitas($kuantitas, $supplier, $id)
    {
        $data = array(
            'kuantitas' => $kuantitas,
            'supplier_id' => $supplier
        );
        $this->db->where('id', $id);
        return $this->db->update('bahan', $data);
    }

    public function uploadKuantitasPesanan($id, $jumlah)
    {
        $kuantitasTemp = $this->db->get_where('kuantitas', array('id' => $bahan))->result();
        $data = array(
            'kuantitas' => $kuantitasTemp - $jumlah
        );
        $this->db->set('kuantitas', $kuantitasTemp - $jumlah, FALSE);
        $this->db->where('id', $id);
        $this->db->update('bahan');
    }
}