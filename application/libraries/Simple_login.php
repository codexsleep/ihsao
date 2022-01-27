<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //Load data model user
        $this->CI->load->model('client/login_model', 'login_model');
    }

    //Fungsi Login
    public function login($no_telpon, $password)
    {
        $check = $this->CI->login_model->login($no_telpon, $password);
        //Jika ada data user, maka session untuk login dibuat
        if ($check) {
            if ($check->customer_status === 'Active') {
                $customer_id = $check->customer_id;
                $customer_name = $check->customer_name;
                $customer_telp = $check->customer_telp;
                $customer_gender = $check->customer_gender;
                $customer_address = $check->customer_address;

                //Buat session
                $this->CI->session->set_userdata('customer_id', $customer_id);
                $this->CI->session->set_userdata(
                    'customer_name',
                    $customer_name
                );
                $this->CI->session->set_userdata(
                    'customer_telp',
                    $customer_telp
                );
                $this->CI->session->set_userdata(
                    'customer_address',
                    $customer_address
                );
                //jika sukses tampil halaman yang diproteksi
                redirect(base_url('home'), 'refresh');
            } else {
                //Kalau customer status deactive, maka balik ke login
                $this->CI->session->set_flashdata(
                    'warning',
                    'Akun anda telah dinonaktifkan'
                );
                redirect(base_url(''), 'refresh');
            }
        } else {
            //Kalau username password salah, maka akan disuruh login lagi
            $this->CI->session->set_flashdata(
                'warning',
                'Username atau password salah'
            );
            redirect(base_url(''), 'refresh');
        }
    }

    //Fungsi cek login
    public function cek_login()
    {
        //Mmeriksa apakah session sudah atau atau belum, jika belum alihkan ke halaman login
        if ($this->CI->session->userdata('customer_id') == '') {
            $this->CI->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url(''), 'refresh');
        }
    }

    //Fungsi logout
    public function logout()
    {
        // Membuang semua session yang telah diset pada saat login
        $this->CI->session->sess_destroy();
        // Setelah session dibuang, maka dialihkan ke halaman login kembali
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url(''), 'refresh');
    }
}
