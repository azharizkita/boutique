<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pakaian_m extends CI_Model
{
    public function getPakaian()
    {
        return $this->db->get('pakaian')->result();
    }
    public function createPakaian($nama, $tipe, $bahan, $spesifikasi, $ukuran, $gambar, $kuantitas, $harga, $author)
    {
        $data = array(
            'nama' => $nama,
            'tipe' => $tipe,
            'bahan' => $bahan,
            'spesifikasi' => $spesifikasi,
            'ukuran' => $ukuran,
            'gambar' => $gambar,
            'kuantitas' => $kuantitas,
            'harga' => $harga,
            'author_id' => $author
        );
        $this->db->insert('pakaian', $data);
    }
}
