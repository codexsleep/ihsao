<?php
class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('admin/Auth_model','auth_model');
		$this->load->model('admin/Upload_model','upload_model');
        error_reporting(0);
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('admin/auth/login');
            redirect($url);
        };
	}

	function index(){
		$data['userdata'] = $this->auth_model->admin_data($this->session->userdata('username'))->row_array();
    $data['datafile'] = $this->upload_model->cloudfile()->result_array();
        $this->load->view('admin/cloudfile',$data);
        $this->load->helper('text');
    }
	
    function cloudfile(){
          $config['upload_path']          = './uploads/';
          $config['allowed_types']        = 'gif|jpg|png|pdf';
          $config['max_size']             = 10000;
          $config['encrypt_name']         = TRUE;
          $this->load->library('upload', $config);
          if ( ! $this->upload->do_upload('file')){
            setcookie("errmesg", "Upload gagal, Periksa kembali file anda!", time() + (3), "/");
          }else{
            $nama = $this->upload->data("file_name");
            $ext = $this->upload->data('file_ext');
            $size = $this->upload->data('file_size');
            $created = date('Y-m-d H:i:s');
            $result = $this->upload_model->upload($nama,$ext,$size,$created);
            setcookie("sucmesg", "Upload Berhasil!", time() + (3), "/");
        }
        redirect("admin/upload");
    }
}