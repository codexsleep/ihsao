<?php
class Administrator extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Auth_model','auth_model');
		$this->load->model('admin/Admin_model','admin_model');
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('admin/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['administrator'] = $this->admin_model->dataadmin()->result_array();
        $this->load->view('admin/daftar_admin',$data);
        $this->load->helper('text');
    }

    function add(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
        $this->load->view('admin/tambah_admin',$data);
        $this->load->helper('text');
    }

    function edit($username){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['admindata'] = $this->admin_model->adminby_username($username)->row_array();
        $this->load->view('admin/edit_admin',$data);
        $this->load->helper('text');
    }


      function add_process(){
    	//mengecek tombol simpan di jalankan atau tidak
		if(isset($_POST['simpan'])){
			$nama = str_replace("'", "", htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$username = str_replace("'", "", htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
			$password = sha1(str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES)));
			$role = str_replace("'", "", htmlspecialchars($this->input->post('role',TRUE),ENT_QUOTES));
			$admin_data = $this->admin_model->adminby_username($username)->row_array();
			if($username!=$admin_data['admin_username']){
				$result = $this->admin_model->addadmin($nama,$username,$password,$role);
				if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Admin Berhasil di tambahkan", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Admin Gagal di tambahkan", time() + (3), "/");
				}
			}else{
					setcookie("errmesg", "Username sudah terdaftar!", time() + (3), "/");
			}
		}
		redirect("admin/administrator/add"); //dialihkan ke halaman tambah quiz
    }

     function edit_process($usernameedit){
    	//mengecek tombol simpan di jalankan atau tidak
		if(isset($_POST['simpan'])){
			$nama = str_replace("'", "", htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$username = str_replace("'", "", htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
			$password = sha1(str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES)));
			$role = str_replace("'", "", htmlspecialchars($this->input->post('role',TRUE),ENT_QUOTES));
			$admin_data = $this->admin_model->adminby_username($usernameedit)->row_array();
			if($username==$usernameedit or $username==$admin_data['admin_username']){
				$result = $this->admin_model->editadmin($usernameedit,$nama,$username,$password,$role);
				if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Admin Berhasil di edit", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Admin Gagal di edit", time() + (3), "/");
				}
			}else{
					setcookie("errmesg", "Username sudah terdaftar!", time() + (3), "/");
			}
		}
		redirect("admin/administrator/edit/".$usernameedit); //dialihkan ke halaman tambah quiz
    }


    function delete($id){
		$result = $this->admin_model->delete_admin($id);
		if($result){ //jika hapus quiz berhasil
			setcookie("sucmesg", "Admin Berhasil di hapus", time() + (3), "/");
		}else{ //jika hapus quiz gagal
			setcookie("errmesg", "Admin Gagal di hapus", time() + (3), "/");
		}
		redirect("admin/administrator");
	}

	
}