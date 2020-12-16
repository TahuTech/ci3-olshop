<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $nama_user = $cek->nama_user;
            $username = $cek->username;
            $level_user = $cek->level_user;

            //buat sesion
            $this->ci->sesion->set_userdata('username', $username);
            $this->ci->sesion->set_userdata('nama_user', $nama_user);
            $this->ci->sesion->set_userdata('level_user', $level_user);
            redirect('admin');
        } else {
            //jika salah
            $this->ci->sesion->set_flashdata('pesan', 'Username / Password tidak terdafatar');
            redirect('auth/login_user');
        }
    }
}

/* End of file User_login.php */
