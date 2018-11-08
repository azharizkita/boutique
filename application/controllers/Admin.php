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
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['file_name'] = 'pesanan_'.$this->input->post('nama');
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
          redirect('pelanggan');
        } else {
            $data = new $this->pakaian_m($this->input->post('nama'));
            $data->setTipe($this->input->post('tipe'));
            $data->setBahan($this->input->post('bahan'));
            $data->setSpesifikasi($this->input->post('spesifikasi'));
            $data->setUkuran($this->input->post('ukuran'));
            $data->setGambar($this->upload->file_name);
            $data->setKuantitas($this->input->post('kuantitas'));
            $data->setHarga($this->input->post('harga'));
            $data->setAuthor("Boutique");
            $this->pakaian_m->createPakaian($data);
            redirect('admin');
        }
        redirect('greeter');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
    }
