<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakaian extends CI_Model
{
    public $nama;
    public $tipe;
    public $bahan;
    public $spesifikasi;
    public $ukuran;
    public $gambar;
    public $kuantitas;
    public $harga;
    public $author;

    /**
     * Pakaian constructor.
     * @param $nama
     */
    public function __construct($nama = NULL)
    {
        $this->nama = $nama;
    }

    /**
     * @param mixed $tipe
     */
    public function setTipe($tipe)
    {
        $this->tipe = $tipe;
    }

    /**
     * @param mixed $bahan
     */
    public function setBahan($bahan)
    {
        $this->bahan = $bahan;
    }

    /**
     * @param mixed $spesifikasi
     */
    public function setSpesifikasi($spesifikasi)
    {
        $this->spesifikasi = $spesifikasi;
    }

    /**
     * @param mixed $ukuran
     */
    public function setUkuran($ukuran)
    {
        $this->ukuran = $ukuran;
    }

    /**
     * @param mixed $gambar
     */
    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }

    /**
     * @param mixed $kuantitas
     */
    public function setKuantitas($kuantitas)
    {
        $this->kuantitas = $kuantitas;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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
