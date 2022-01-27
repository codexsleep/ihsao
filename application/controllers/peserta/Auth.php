<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('peserta/Auth_model','auth_model');
        error_reporting(0);
    }

    function login(){
        if($this->session->userdata('logged')==TRUE){
            $url=base_url('peserta/beranda');
            redirect($url);
        }
        $this->load->view('peserta/login');
        $this->load->helper('text');
    }

    function index(){
        if(isset($_POST['login'])){
            $email=str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
            $nis=str_replace("'", "", htmlspecialchars($this->input->post('nis',TRUE),ENT_QUOTES));
            if($email!=null && $nis!=null){
               $validasi_login = $this->auth_model->authlogin($email,$nis);
               if($validasi_login->num_rows() > 0){
                   //if login success
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('email',$email);
                    setcookie("error_login", 'false', time() + (3), "/");
                    redirect("peserta/beranda");
               }else{
                   //if login error
                    setcookie("error_login", 'true', time() + (3), "/");
                    redirect("peserta/auth/login");
                    }
            }else{
                //kondisi data kosong
                setcookie("error_login", 'null', time() + (3), "/");
                redirect("peserta/auth/login");
            }
        }else{
                redirect("peserta/auth/login");
        }
    }

       
    function logout(){
        $usersession = $this->session->userdata('logged');
        $this->session->sess_destroy();
        redirect("peserta/auth/login");
    }
    
}