<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Resi_m extends CI_Model
{
    public function getResi()
    {
       return $this->db->get('resi')->result();
    }
    public function acceptPembayaran($kasir, $status, $id)
    {
        $data = array(
            'kasir_id' => $kasir,
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('resi', $data);
        redirect('kasir');
    }
    public function updateStatusPembayaran($status, $id)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('resi', $data);
        redirect('kasir');
    }
}
