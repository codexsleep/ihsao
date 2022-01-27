<?php
class Beranda extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('peserta/Auth_model','auth_model');
		$this->load->model('peserta/Dashboard_model','dashboard_model');
        $this->load->model('peserta/Quiz_model','quiz_model');
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('peserta/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->peserta_data($this->session->userdata('email'))->row_array();
		$peserta_id = $this->auth_model->peserta_data($this->session->userdata('email'))->row_array();
		$data['myquiz'] = $this->dashboard_model->quizlog($peserta_id['peserta_id'])->result_array();
        $this->load->view('peserta/beranda',$data);
        $this->load->helper('text');
    }

    function proses_token(){
    	$token = str_replace("'", "", htmlspecialchars($this->input->post('token',TRUE),ENT_QUOTES));
    	$datapeserta = $this->auth_model->peserta_data($this->session->userdata('email'))->row_array();
    	$peserta_id = $datapeserta['peserta_id']; //idpeserta
    	$log_date = date('Y-m-d H:i:s');
    	if($token!=null){ // mengecek apakah token kosong atau tersedia
    		$cek_token = $this->dashboard_model->cektoken($token)->row_array(); //mengambil data quiz dari token
    		if($cek_token!=null){//mengecek apakah token tersedia dalam database
    			$quiz_id = $cek_token['quiz_id'];//idquiz
    			$cek_quiz_log = $this->dashboard_model->cek_log($quiz_id,$peserta_id)->row_array();
    			if($cek_quiz_log==null){
    					$quizdata = $this->dashboard_model->dataquiz($quiz_id)->row_array();
    					$awal  	= strtotime($quizdata['quiz_start']);
    					$akhir 	= strtotime($quizdata['quiz_end']);
    					$diff  	= $akhir - $awal;
    					$menit 	= $diff/60;
    				if($menit>0){ //mengecek apakah waktu quiz masih tersedia
    					$status = "Tersedia";
    					$result = $this->dashboard_model->takequiz($quiz_id,$peserta_id,$status,$log_date);//mengirimkan data untuk quizlog
    					setcookie("sucmesg", "Quiz Berhasil di tambahkan", time() + (3), "/");
    				}else{
    					setcookie("errmesg", "Tidak Bisa ditambahkan, quiz kadaluarsa!", time() + (3), "/");
    				}
    			}else{ 
    				setcookie("errmesg", "Quiz sudah terdaftar!", time() + (3), "/");
    			}
    		}else{
    			setcookie("errmesg", "Token tidak tersedia", time() + (3), "/");
    		}
    	}else{
    		setcookie("errmesg", "Data tidak boleh kosong", time() + (3), "/");
    	}
    	redirect("peserta/beranda"); //dialihkan kembali ke halaman beranda
    }


    function start_objektif_quiz($id){
        $peserta_id = $datapeserta['peserta_id']; //idpeserta
        $cek_log = $this->dashboard_model->cek_log_byid($id)->row_array(); //data log take quiz
        $quiz_log_id = $cek_log['quiz_log_id'];// id take log quiz peserta
        $quiz_id = $cek_log['quiz_id']; //id quiz
        $total_soal = $this->dashboard_model->totalsoal($quiz_id)->row_array(); //data jumlah soal
        $cek_quiz_log = $this->dashboard_model->cek_quiz_log($quiz_log_id)->row_array(); //data log start quiz
        $start_datetime = date('Y-m-d H:i:s'); //waktu start quiz
        $soal_log = $this->quiz_model->min_log_soal($quiz_log_id)->row_array(); //mengambil data log soal
        $no_soal = $this->quiz_model->log_soal_nav($quiz_log_id)->row_array(); //mengambil data log soal
        if($cek_quiz_log==null){
             $showquiz = $this->dashboard_model->show_soal_objektif($quiz_id)->result_array();
                foreach ($showquiz as $quiz) {
                $soal_id = $quiz['soal_id'];
                $cek_log_soal_quiz = $this->dashboard_model->cek_log_soal_byid($quiz_log_id,$soal_id)->row_array();
                if($cek_log_soal_quiz==null){ //mengecek apakah ada soal yang sama atau tidak
                    $result = $this->dashboard_model->start_quiz_objektif($quiz_log_id,$soal_id);
                }
             }
            if($result){
                $this->dashboard_model->set_start_datetime($quiz_log_id,$start_datetime);
                setcookie("sucmesg", "Berhasil mengenerate soal, silahkan mulai kembali", time() + (2), "/");
                 redirect("peserta/beranda");
            }else{
                setcookie("sucmesg", "Terjadi kesalahan saat generate soal", time() + (2), "/");
                redirect("peserta/beranda");
            }
        }else{
                if($soal_log['soal_log_id']!=null){
                     $destination = $soal_log['soal_log_id'];
                }else{

                    $destination = $no_soal['soal_log_id'];
            }
                redirect("peserta/quiz/objektif/".$quiz_log_id."/".$destination);
        }

    }





	//proses menghitung selisih waktu
    function tester(){
    	$quizdata = $this->dashboard_model->dataquiz('9')->row_array();
    	$awal  	= strtotime($quizdata['quiz_start']);
		$akhir 	= strtotime($quizdata['quiz_end']);
		$diff  	= $akhir - $awal;
		$jam  	= floor($diff / (60 * 60));
		$menit  = $diff - $jam * (60 * 60);
        echo $diff/60;
    }



}