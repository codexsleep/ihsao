<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($no_telpon,$password)
    {
        $this->db->select('*');
        $this->db->from('tbl_customers');
        // JOIN
        $this->db->where(array(
            'customer_telp' => $no_telpon,
        ));
        $query = $this->db->get();
        $data = $query->row();
        $verify = password_verify($password, $data->customer_pass);
        if($verify) {
            return $data;
        }else {
            return $verify;
        }
    }
}
?>