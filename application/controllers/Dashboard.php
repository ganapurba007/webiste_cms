<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_data');
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

    function ganti_password_aksi()
    {
        //set form_validation
        $this->form_validation->set_rules('password_lama', 'last password ', 'required');
        $this->form_validation->set_rules('password_baru', 'newpassword', 'required|min_length[8]');
        $this->form_validation->set_rules('k onfirmasi_pass word', 'password confirmation', 'required|matches[password_baru]');
        //Cek Validasi
        if ($this->form_validation->run() != false) {
            //menangkap data dari input form
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            //Cek Kesesuaian passord lama dengan id pengguna yang sedang login dan password lama
            $where = array(
                'pengguna_id' => $this->session->userdata('id'),
                'pengguna_password' => md5($password_lama)
            );
            $cek = $this->m_login->cek_login('pengguna', $where);
            //cek kesesuian password lama
            if ($cek->num_rows() > 0) {
                //update data password pengguna
                $w = array(
                    'pengguna_id' => $this->session->userdata('id')
                );
                $data = array(
                    'pengguna_password' => md5($password_baru)
                );
                $this->m_data->update_data('pengguna', $data, $where);
                //alihkan halaman kembali kembali ke halaman ganti password
                redirect('dashboard/ganti_password?alert =sukses');
            } else {
                //alihkan halaman kembali kembali ke halaman ganti password
                redirect('dashboard/ganti_password?alert=gagal');
            }
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_ganti_password');
            $this->load->view('dashboard/v_footer');
        }
    }
}
