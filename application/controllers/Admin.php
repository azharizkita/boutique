    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller
    {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pakaian_m');
    }
    public function index()
    {
            if ($this->session->userdata('user_priv')=="Pelanggan"){
                redirect('pelanggan');
            } elseif ($this->session->userdata('user_priv')=="Penjahit") {
                redirect('penjahit');
            } elseif ($this->session->userdata('user_priv')=="Supplier") {
                redirect('supplier');
            } elseif ($this->session->userdata('user_priv')=="Kasir") {
                redirect('kasir');
            } elseif($this->session->userdata('user_priv')=="Admin") {
                $this->load->view("header");
                $this->load->view("content/admin");
                $this->load->view("footer");
            } else {
                redirect('greeter');
            }
    }
    public function createPakaian()
    {
        $config['upload_path'] = './assets/images/uploads/pakaian/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 0;
        $config['file_name'] = 'pesanan_'.$this->input->post('nama');
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
          redirect('pelanggan');
        } else {
          $this->pakaian_m->createPakaian(
              $this->input->post('nama'),
              $this->input->post('tipe'),
              $this->input->post('bahan'),
              $this->input->post('spesifikasi'),
              $this->input->post('ukuran'),
              $this->upload->file_name,
              $this->input->post('kuantitas'),
              $this->input->post('harga'),
              "Boutique"
          );
          redirect('pelanggan');
        }
        $this->pakian_m->createPakaian();
        redirect('greeter');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
    }
