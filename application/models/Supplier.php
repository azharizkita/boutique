<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier_m extends CI_Model
{
   function getData()
   {
 	return $this->db->get('bahan');
   }
   public function add()
   {
      $data = array(
         'kuantitas' => $this->input->post('kuantitas') + $this->input->post('kuantitasA'),
         'user' => $this->session->userdata('user_id')
      );
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('bahan', $data);
      redirect('pages/supplier');
   }
}
