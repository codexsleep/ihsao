<?php
class Quiz extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Auth_model','auth_model');
		$this->load->model('admin/Quiz_model','quiz_model');
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('admin/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['quiz'] = $this->quiz_model->dataquiz()->result_array();
        $this->load->view('admin/daftar_quiz',$data);
        $this->load->helper('text');
    }


	function add(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
        $this->load->view('admin/tambah_quiz',$data);
        $this->load->helper('text');
    }

    function add_process(){
    	//mengecek tombol simpan di jalankan atau tidak
		if(isset($_POST['simpan'])){
			$nama = str_replace("'", "", htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$jenis = str_replace("'", "", htmlspecialchars($this->input->post('jenis',TRUE),ENT_QUOTES));
			$waktu = str_replace("'", "", htmlspecialchars($this->input->post('waktu',TRUE),ENT_QUOTES));
			$startdate = str_replace("'", "", htmlspecialchars($this->input->post('start',TRUE),ENT_QUOTES));
			$enddate = str_replace("'", "", htmlspecialchars($this->input->post('end',TRUE),ENT_QUOTES));
			//convert datetime-local format to new format
			$start = date('Y-m-d\ H:i:s', strtotime($startdate));
			$end = date('Y-m-d\ H:i:s', strtotime($enddate));
			//mengecek apakah semua data terisi
			if($nama!=null && $jenis!=null && $waktu!=null && $startdate!=null && $enddate!=null){ //jika semua data terisi
				$token = base_convert(microtime(false), 10, 36);
				$created = date('Y-m-d H:i:s');
				$result = $this->quiz_model->addquiz($nama,$token,$jenis,$waktu,$start,$end,$created);
				if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Quiz Berhasil di tambahkan", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Quiz Gagal di tambahkan", time() + (3), "/");
				}
			}else{ //jika data ada yang tidak terisi
					setcookie("errmesg", "Data tidak boleh kosong", time() + (3), "/");
			}	
		}
		redirect("admin/quiz/add"); //dialihkan ke halaman tambah quiz
    } 

      function edit_process($id){
    	//mengecek tombol simpan di jalankan atau tidak
		if(isset($_POST['simpan'])){
			$nama = str_replace("'", "", htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$jenis = str_replace("'", "", htmlspecialchars($this->input->post('jenis',TRUE),ENT_QUOTES));
			$waktu = str_replace("'", "", htmlspecialchars($this->input->post('waktu',TRUE),ENT_QUOTES));
			$startdate = str_replace("'", "", htmlspecialchars($this->input->post('start',TRUE),ENT_QUOTES));
			$enddate = str_replace("'", "", htmlspecialchars($this->input->post('end',TRUE),ENT_QUOTES));
			//convert datetime-local format to new format
			$start = date('Y-m-d\ H:i:s', strtotime($startdate));
			$end = date('Y-m-d\ H:i:s', strtotime($enddate));
			//mengecek apakah semua data terisi
			if($nama!=null && $jenis!=null && $waktu!=null && $startdate!=null && $enddate!=null){ //jika semua data terisi
				$result = $this->quiz_model->editquiz($id,$nama,$jenis,$waktu,$start,$end);
				if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Quiz Berhasil di edit", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Quiz Gagal di edit", time() + (3), "/");
				}
			}else{ //jika data ada yang tidak terisi
					setcookie("errmesg", "Data tidak boleh kosong", time() + (3), "/");
			}	
		}
		redirect("admin/quiz/edit/".$id); //dialihkan ke halaman tambah quiz
    }

    function edit($id){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['quiz'] = $this->quiz_model->dataquiz_edit($id)->row_array();
		$data['id'] = $id;
        $this->load->view('admin/edit_quiz',$data);
        $this->load->helper('text');
    }

   	function soal_objektif($id){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['soal'] = $this->quiz_model->datasoal_objektif($id)->result_array();
		$data['quizid'] = $id;
        $this->load->view('admin/daftar_soal_objektif',$data);
        $this->load->helper('text');
    }

    function tambah_soal_objektif($id){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['quizid'] = $id;
        $this->load->view('admin/tambah_soal_objektif',$data);
        $this->load->helper('text');
    }

    function lihat_soal_objektif($id){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['soalid'] = $id;
		$data['objektif'] = $this->quiz_model->objektifbyid($id)->row_array();
        $this->load->view('admin/lihat_soal_objektif',$data);
        $this->load->helper('text');
    }


    function proses_tambah_soal_objektif($id){
    	$pertanyaan = str_replace("'", "", htmlspecialchars($this->input->post('pertanyaan',TRUE),ENT_QUOTES));
    	$opsia = str_replace("'", "", htmlspecialchars($this->input->post('opsia',TRUE),ENT_QUOTES));
    	$opsib = str_replace("'", "", htmlspecialchars($this->input->post('opsib',TRUE),ENT_QUOTES));
    	$opsic = str_replace("'", "", htmlspecialchars($this->input->post('opsic',TRUE),ENT_QUOTES));
    	$opsid = str_replace("'", "", htmlspecialchars($this->input->post('opsid',TRUE),ENT_QUOTES));
    	$opsie = str_replace("'", "", htmlspecialchars($this->input->post('opsie',TRUE),ENT_QUOTES));
    	$jawaban = str_replace("'", "", htmlspecialchars($this->input->post('jawaban',TRUE),ENT_QUOTES));
    	if($pertanyaan!=null && $opsia!=null && $opsib!=null && $opsic!=null && $opsid!=null && $opsie!=null && $jawaban!=null){
    		$result = $this->quiz_model->tambah_soal_objektif($id,$pertanyaan,$opsia,$opsib,$opsic,$opsid,$opsie,$jawaban);
    		if($result){
					//jika proses tambah berhasil
					setcookie("sucmesg", "Soal Berhasil di tambah", time() + (3), "/");
				}else{
					//jika proses tambah gagal
					setcookie("errmesg", "Soal Gagal di edit", time() + (3), "/");
				}

    	}else{
    		setcookie("errmesg", "Data tidak boleh kosong", time() + (3), "/");
    	}
    	redirect("admin/quiz/soal_objektif/".$id); //dialihkan ke halaman tambah quiz
    }

    function delete($id){
		$result = $this->quiz_model->delete_quiz($id);
		if($result){ //jika hapus quiz berhasil
			setcookie("sucmesg", "Quiz Berhasil di hapus", time() + (3), "/");
		}else{ //jika hapus quiz gagal
			setcookie("errmesg", "Quiz Gagal di hapus", time() + (3), "/");
		}
		redirect("admin/quiz");
	}
	function delete_soal_objektif($quizid,$id){
		$result = $this->quiz_model->delete_soal_objektif($id);
		if($result){ //jika hapus quiz berhasil
			setcookie("sucmesg", "Soal Berhasil di hapus", time() + (3), "/");
		}else{ //jika hapus quiz gagal
			setcookie("errmesg", "Soal Gagal di hapus", time() + (3), "/");
		}
		redirect("admin/quiz/soal_objektif/".$quizid);
	}

	function tester(){
		$startdate = "2022-01-12 11:46:00";
		echo date('Y-m-d\TH:i', strtotime($startdate));
	}
	
}