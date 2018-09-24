<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir_m extends CI_Model
{
   function getData()
   {
      return $this->db->get('pembayaran');
   }
   function acc()
   {
      $data = array(
         'status' => 'Belum Lunas',
         'kasir' => $this->session->userdata('user_id')
      );
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('pembayaran', $data);
      redirect('pages/kasir');
   }
   function upStatus()
   {
      $data = array(
         'status' => 'Lunas'
      );
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('pembayaran', $data);
      redirect('pages/kasir');
   }
}
