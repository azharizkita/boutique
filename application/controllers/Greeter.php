<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Greeter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('unit_test');
    }

    public function index()
    {
        if ($this->session->userdata('user_priv')) {
            if ($this->session->userdata('user_priv') == "Pelanggan") {
                redirect("pelanggan");
            } elseif ($this->session->userdata('user_priv') == "Admin") {
                redirect("admin");
            } elseif ($this->session->userdata('user_priv') == "Penjahit") {
                redirect("penjahit");
            } elseif ($this->session->userdata('user_priv') == "Supplier") {
                redirect("supplier");
            } elseif ($this->session->userdata('user_priv') == "Kasir") {
                redirect("kasir");
            }
        } else {
            $this->load->view('content/greeter');
        }
    }

    public function login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post('password');
        $checking = $this->user->login(array('username' => $username), array('password' => $password));
        if ($checking != FALSE) {
            redirect('greeter');
        } else {
            $data['error'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>Error!</strong><br>
                                  Your username or password is invalid!
                              </div>';
            $this->load->view('content/greeter', $data);
        }

    }

    public function register()
    {
        $newUser = new $this->user($this->input->post("usernameR"));
        $newUser->setEmail($this->input->post("emailR"));
        $newUser->setNama($this->input->post("nameR"));
        $newUser->setPassword($this->input->post("passwordR"));
        $newUser->setType("Pelanggan");

        echo $this->unit->run(
            $this->user->register($newUser),
            TRUE,
            '<strong style="font-size: 30px;">Memasukan data kedalam tabel user</strong>',
            '<p>Berikut ini adalah data yang di upload ke database: </p><div><pre>' . var_export($newUser, true) . '</pre></div>'
        );

//        if ($this->user->register($newUser) != FALSE) {
//            $data['error'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                                    <span aria-hidden="true">&times;</span>
//                                </button>
//                                <strong>Congrats!</strong><br>
//                                Your account successfully created!
//                            </div>';
//            $this->load->view('content/greeter', $data);
//        } else {
//            $data['error'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                                    <span aria-hidden="true">&times;</span>
//                                </button>
//                                <strong>Error!</strong><br>
//                                Either your username or password is invalid!
//                            </div>';
//            $this->load->view('content/greeter', $data);
//        }
    }
}