<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_m extends CI_Model
{
   function getPembayaran()
   {
      return $this->db->get('pembayaran');
   }
   function getUser()
   {
      return $this->db->get('user');
   }
   function getBahan()
   {
      return $this->db->get('bahan');
   }
   function getBaju()
   {
      return $this->db->get('baju');
   }
      redirect('pages/kasir');
   }
}

