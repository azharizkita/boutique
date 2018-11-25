<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boutique extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pakaian');
        $this->load->model('resi');
        $this->load->library('unit_test');
    }

    public function index()
    {
        $data['pakaian'] = $this->pakaian->getPakaian();
        if ($this->session->userdata('user_priv') == "Pelanggan") {
            $this->load->view("header");
            $this->load->view("content/pelanggan/boutique", $data);
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv') == "Penjahit") {
            redirect('penjahit');
        } elseif ($this->session->userdata('user_priv') == "Supplier") {
            redirect('supplier');
        } elseif ($this->session->userdata('user_priv') == "Kasir") {
            redirect('kasir');
        } elseif ($this->session->userdata('user_priv') == "Admin") {
            redirect('admin');
        } else {
            redirect('greeter');
        }
    }

    public function beli()
    {
        $data = new $this->resi((int)$this->session->userdata('user_id'));
        $data->setKasir(NULL);
        $data->setPenjahit(NULL);
        $data->setPesanan(NULL);
        $data->setPakaian((int)$this->input->post('id'));
        $data->setTotal((int)$this->input->post('jumlah'));
        $data->setHarga((int)$this->input->post('jumlah') * $this->input->post('harga'));
        $data->setStatus("To be accepted");

        echo $this->unit->run(
            $this->resi->createResi($data),
            TRUE,
            '<strong style="font-size: 30px;">Memasukan data kedalam tabel resi</strong>',
            '<p>Berikut ini adalah data yang di upload ke database: </p><div><pre>' . var_export($data, true) . '</pre></div>'
        );
        // redirect('boutique');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
}