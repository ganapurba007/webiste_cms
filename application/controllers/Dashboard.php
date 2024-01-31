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
        $this->form_validation->set_rules('password_lama', 'Last Password', 'required');
        $this->form_validation->set_rules('password_baru', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('konfirmasi_password', 'Password Confirmation', 'required|matches[password_baru]');

        if ($this->form_validation->run() != false) {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');

            $where = array(
                'pengguna_id' => $this->session->userdata('id'),
                'pengguna_password' => md5($password_lama)
            );
            $cek = $this->m_login->cek_login('pengguna', $where);

            if ($cek->num_rows() > 0) {
                $data = array(
                    'pengguna_id' => md5($password_baru)
                );
                $this->m_data->update_data('pengguna', $data, $where);
                redirect('dashboard/ganti_password?alert=sukses');
            } else {
                redirect('dashboard/ganti_password?alert=gagal');
            }
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_ganti_password');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori()
    {
        $data['kategori'] = $this->m_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_tambah_aksi()
    {
        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required'
        );
        if ($this->form_validation->run() != false) {
            $kategori = $this->input->post('kategori');
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->m_data->insert_data('kategori', $data);
            redirect(base_url() . 'dashboard/kategori');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori_edit($id)
    {
        $where = array(
            'kategori_id' => $id
        );
        $data['kategori'] = $this->m_data->edit_data('kategori', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_update()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $kategori = $this->input->post('kategori');
            $where = array(
                'kategori_id' => $id
            );
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->m_data->update_data('kategori', $data, $where);
            redirect(base_url() . 'dashboard/kategori');
        } else {
            $id = $this->input->post('id');
            $where = array(
                'kategori_id' => $id
            );
            $data['kategori'] = $this->m_data->edit_data('kategori', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori_hapus($id)
    {
        $where = array(
            'kategori_id' => $id
        );
        $this->m_data->delete_data('kategori', $where);
        redirect(base_url() . 'dashboard/kategori');
    }
}
