<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bahan');
        $this->load->library('unit_test');
    }

    public function index()
    {
        if ($this->session->userdata('user_priv') == "Pelanggan") {
            redirect('pelanggan');
        } elseif ($this->session->userdata('user_priv') == "Penjahit") {
            redirect("penjahit");
        } elseif ($this->session->userdata('user_priv') == "Supplier") {
            $this->load->view("header");
            $this->load->view("content/supplier");
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv') == "Kasir") {
            redirect("kasir");
        } elseif ($this->session->userdata('user_priv') == "Admin") {
            redirect("admin");
        } else {
            redirect('greeter');
        }
    }

    public function createBahan()
    {
        $data = new $this->bahan($this->input->post('cNama'));
        $data->setSpesifikasi($this->input->post('cSpesifikasi'));
        $data->setHarga((int)$this->input->post('cHarga'));
        $data->setKuantitas((int)$this->input->post('cKuantitas'));
        $data->setSupplier((int)$this->session->userdata('user_id'));

        echo $this->unit->run(
            $this->bahan->createBahan($data),
            TRUE,
            '<strong style="font-size: 30px;">Memasukan data kedalam tabel bahan</strong>',
            '<p>Berikut ini adalah data yang di upload ke database: </p><div><pre>' . var_export($data, true) . '</pre></div>'
        );
        // redirect('supplier');
    }

    public function addKuantitas()
    {
        $this->bahan->addKuantitas(
            $this->input->post('kuantitas') + $this->input->post('kuantitasO'),
            $this->session->userdata('user_id'),
            $this->input->post('id')
        );
        redirect('supplier');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
}
