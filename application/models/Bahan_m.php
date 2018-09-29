<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bahan_m extends CI_Model
{
    public function createBahan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'harga' => $this->input->post('harga'),
            'kuantitas' => $this->input->post('kuantitas') + $this->input->post('kuantitasO'),
            'supplier_id' => $this->session->userdata('user_id')
        );
        $this->db->insert('bahan', $data);
        redirect('supplier');
    }

    public function addBahan($kuantitas, $supplier, $id)
    {
        $data = array(
            'kuantitas' => $kuantitas,
            'supplier_id' => $supplier
        );
        $this->db->where('id', $id);
        $this->db->update('bahan', $data);
        redirect('supplier');
    }
}