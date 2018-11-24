<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pakaian_m extends CI_Model
{
    public function __construct($nama = NULL) {
        $this->nama = $nama;
    }

    public function setTipe($tipe = NULL)
    {
        $this->tipe = $tipe;
    }

    public function setBahan($bahan = NULL)
    {
        $this->bahan = $bahan;
    }

    public function setSpesifikasi($spesifikasi = NULL)
    {
        $this->spesifikasi = $spesifikasi;
    }

    public function setUkuran($ukuran = NULL)
    {
        $this->ukuran = $ukuran;
    }

    public function setGambar($gambar = NULL)
    {
        $this->gambar = $gambar;
    }

    public function setKuantitas($kuantitas = NULL)
    {
        $this->kuantitas = $kuantitas;
    }

    public function setHarga($harga = NULL)
    {
        $this->harga = $harga;
    }

    public function setAuthor($author = NULL)
    {
        $this->author_id = $author;
    }

    public function getPakaian()
    {
        return $this->db->get('pakaian')->result();
    }

    public function createPakaian($data)
    {
        return $this->db->insert('pakaian', $data);
    }
}
