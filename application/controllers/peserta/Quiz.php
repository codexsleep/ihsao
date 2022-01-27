<?php
class Quiz extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('peserta/Auth_model','auth_model');
        $this->load->model('peserta/Quiz_model','quiz_model');
        date_default_timezone_set("Asia/Jakarta");
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('peserta/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->peserta_data($this->session->userdata('email'))->row_array();
        $this->load->view('peserta/quiz',$data);
        $this->load->helper('text');
    }


    function objektif($log_id,$soal_log_id){             
    	$data['userdata'] = $this->auth_model->peserta_data($this->session->userdata('email'))->row_array();
        $log = $this->quiz_model->log_soal($soal_log_id)->row_array(); //mengambil data log soal
        $data['log_soal'] = $this->quiz_model->log_soal($soal_log_id)->row_array(); //mengambil data log soal
        $data['datasoal'] = $this->quiz_model->datasoal_objektif($log['soal_id'])->row_array(); //mengambil data soal
        $data['soal_nav'] = $this->quiz_model->log_soal_nav($log_id)->result_array(); //mengambil data log soal untuk navigasi
        $data['log_quiz'] = $this->quiz_model->log_quiz($log['quiz_log_id'])->row_array(); //mengambil data log quiz
        $answare_soal = $this->quiz_model->total_unansware_soal($log_id)->row_array(); //mengambil data log soal
        $last_soal = $this->quiz_model->min_log_soal($log_id)->row_array(); //mengambil data log soal
        $cekfinish = $this->quiz_model->log_quiz($log['quiz_log_id'])->row_array();
        if($cekfinish['status']=='Selesai' or $cekfinish['status']=='Ditutup'){ //mengecek apakah quiz sudah finish atau ditutup
            redirect("peserta/beranda");
        }
        $data['log_id'] = $log_id; //log id quiz
        //menyimpan nomor soal dalam array start
        $soalproses_nav = $this->quiz_model->log_soal_nav($log_id)->result_array();
        $soalnumber = array();
        $no = 0;
        foreach($soalproses_nav as $soal){
            $soalnumber[$no] = $soal['soal_log_id'];
            $no++;
        }
        for($i=0;$i<=count($soalnumber);$i++){
            if($soalnumber[$i]==$soal_log_id){
                $currentnumber=$i;
            }
        }
        $minnumber_soal = min($soalnumber);
        $maxnumber_soal = max($soalnumber);
        //menyimpan nomor soal dalam array end

        //disabled nav button jika dalam posisi max atau min
        if($soal_log_id==$minnumber_soal){
            $data['disabled_prevnav'] = "disabled";
            $data['nav_prevbg']       = "btn-light";
        }elseif($soal_log_id==$maxnumber_soal){
            $data['disabled_nextnav'] = "disabled";
            $data['nav_nextbg']       = "btn-light";
        }
        if($answare_soal['total']<=1 AND $last_soal['soal_log_id']==$soal_log_id OR $answare_soal['total']<=0){
                $data['nav_finishbg']       = "primary";
        }

        if($_POST){
            $option = str_replace("'", "", htmlspecialchars($this->input->post('option',TRUE),ENT_QUOTES));
            $number_nav = str_replace("'", "", htmlspecialchars($this->input->post('number_nav',TRUE),ENT_QUOTES));
            $nav = str_replace("'", "", htmlspecialchars($this->input->post('nav',TRUE),ENT_QUOTES));
            if($option!=null){
                $result = $this->quiz_model->jawab_soal_objektif($soal_log_id,$option);
            }
            if(isset($number_nav)){
                    $destination = $soalnumber[$number_nav-1];
            }

            if(isset($nav)){
                if($nav=="Prev"){
                    $destination = $soalnumber[$currentnumber-1];
                }elseif($nav=="Next"){
                    $destination = $soalnumber[$currentnumber+1];
                }elseif($nav=="Finish"){
                    $finishtime = date('Y-m-d H:i:s');
                    $finishquiz = $this->quiz_model->finish_quiz($log_id,$finishtime);
                    redirect("peserta/beranda");
                }
            }
            redirect("peserta/quiz/objektif/".$log_id."/".$destination);

        }
    	$this->load->view('peserta/quiz',$data);
        $this->load->helper('text');
    }

	
}