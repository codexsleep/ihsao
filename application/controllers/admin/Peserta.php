<?php
class Peserta extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Auth_model','auth_model');
		$this->load->model('admin/Peserta_model','peserta_model');
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('admin/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['peserta'] = $this->peserta_model->datapeserta()->result_array();
		$data['peserta'] = $this->peserta_model->pesertabyid($id)->row_array();
        $this->load->view('admin/daftar_peserta',$data);
        $this->load->helper('text');
    }

    function add_process(){
    	//mengecek tombol simpan di jalankan atau tidak
		if(isset($_POST['simpan'])){
			$nama = str_replace("'", "", htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$email = str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
			$nis = str_replace("'", "", htmlspecialchars($this->input->post('nis',TRUE),ENT_QUOTES));
				$created = date('Y-m-d H:i:s');
				$result = $this->peserta_model->addpeserta($nama,$email,$nis,$created);
				if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Peserta Berhasil di tambahkan", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Peserta Gagal di tambahkan", time() + (3), "/");
				}
		}
		redirect("admin/peserta/add"); //dialihkan ke halaman tambah quiz
    }

	function add(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
        $this->load->view('admin/tambah_peserta',$data);
        $this->load->helper('text');
    }

    function edit_process($id){
    	//mengecek tombol simpan di jalankan atau tidak
		if(isset($_POST['simpan'])){
			$nama = str_replace("'", "", htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$email = str_replace("'", "", htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
			$nis = str_replace("'", "", htmlspecialchars($this->input->post('nis',TRUE),ENT_QUOTES));
				$result = $this->peserta_model->editpeserta($id,$nama,$email,$nis);
				if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Peserta Berhasil di edit", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Peserta Gagal di edit", time() + (3), "/");
				}
		}
		redirect("admin/peserta/edit/".$id); //dialihkan ke halaman tambah quiz
    }

    function edit($id){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['peserta'] = $this->peserta_model->pesertabyid($id)->row_array();
        $this->load->view('admin/edit_peserta',$data);
        $this->load->helper('text');
    }

     function delete($id){
		$result = $this->peserta_model->delete_peserta($id);
		if($result){ //jika hapus quiz berhasil
			setcookie("sucmesg", "Peserta Berhasil di hapus", time() + (3), "/");
		}else{ //jika hapus quiz gagal
			setcookie("errmesg", "Peserta Gagal di hapus", time() + (3), "/");
		}
		redirect("admin/peserta");
	}

	
}