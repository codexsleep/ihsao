<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
class Auth extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Auth_model','auth_model');
        error_reporting(0);
	}

	function login(){
        if($this->session->userdata('logged')==TRUE){
            $url=base_url('admin/beranda');
            redirect($url);
        }
		$this->load->view('admin/login');
        $this->load->helper('text');
	}

	function index(){
        if(isset($_POST['login'])){
            $username=str_replace("'", "", htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
            $password=str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
            if($username!=null && $password!=null){
               $validasi_login = $this->auth_model->authlogin($username,$password);
               if($validasi_login->num_rows() > 0){
                   //if login success
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('username',$username);
                    setcookie("error_login", 'false', time() + (3), "/");
                    redirect("admin/beranda");
               }else{
                   //if login error
                    setcookie("error_login", 'true', time() + (3), "/");
                    redirect("admin/auth/login");
                    }
            }else{
                //kondisi data kosong
                setcookie("error_login", 'null', time() + (3), "/");
                redirect("admin/auth/login");
            }
        }else{
                redirect("admin/auth/login");
        }
    }

       
    function logout(){
        $usersession = $this->session->userdata('logged');
        $this->session->sess_destroy();
        redirect("admin/auth/login");
    }
	
}