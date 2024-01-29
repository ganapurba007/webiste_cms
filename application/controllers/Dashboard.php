<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        /*
cek session yang login,
jika session status tidak sama dengan session telah_login, be
rarti pengguna belum login
maka halaman akan di alihkan kembali ke halaman login.
*/
        if ($this->session->userdata('status') != "telah_login") {
            redirect('login?alert=belum_login');
        }
    }
    function index()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_index');
        $this->load->view('dashboard/v_footer');
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    function ganti_password()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_ganti_password');
        $this->load->view('dashboard/v_footer');
    }
}
