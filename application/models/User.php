<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    public $username;
    public $email;
    public $nama;
    public $password;
    public $type;

    /**
     * User constructor.
     * @param $username
     */
    public function __construct($username = NULL)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $nama
     */
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    function logged_in()
    {
        return $this->session->userdata('user_id');
    }

    function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($username);
        $this->db->where($password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $loginData = $query->result();
            foreach ($loginData as $data) {
                $session_data = array(
                    'user_id' => $data->id,
                    'user_name' => $data->username,
                    'user_mail' => $data->email,
                    'user_nama' => $data->nama,
                    'user_priv' => $data->privilege
                );
                $this->session->set_userdata($session_data);
            }
            return TRUE;
        }
    }

    function register($data)
    {
        return $this->db->insert('user', $data);
    }
}