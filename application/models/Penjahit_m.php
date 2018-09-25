<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjahit_m extends CI_Model
{
   function getData()
   {
      return $this->db->get('pesanan');
   }
   function getDataWhere(){
      return $this->db->get_where('pesanan', array('id' => $this->post->input('id')));
   }
   function getBahan(){
      return $this->db->get_where('bahan', array('kuantitas >' => 0));
   }
   function getUser() {
      return $this->db->get('user');
   }
   public function update()
   {
      $data = array(
         'status' => $this->input->post('status'),
         'penjahit' => $this->input->post('penjahit')
      );
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('pesanan', $data);
      redirect('pages/penjahit');
   }
   public function resi(){
      $data = array(
         'pesanan' => $this->input->post('baju'),
         'user' => $this->input->post('user'),
         'total' => $this->input->post('total'),
         'status' => 'Accepting'
      );
      $this->db->insert('pembayaran', $data);
      redirect('pages/penjahit');
   }
}
