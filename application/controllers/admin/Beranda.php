<?php
class Beranda extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Auth_model','auth_model');
		$this->load->model('admin/Dashboard_model','dashboard_model');
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('admin/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
		$data['total_peserta'] = $this->dashboard_model->datasummary("tbl_peserta")->num_rows();
		$data['total_quiz'] = $this->dashboard_model->datasummary("tbl_quiz")->num_rows();
		$data['total_soal'] = $this->dashboard_model->datasummary("tbl_soal_objektif")->num_rows();
        $this->load->view('admin/beranda',$data);
        $this->load->helper('text');
    }

	
}