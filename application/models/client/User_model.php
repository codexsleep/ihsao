<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function detail()
    {
        $this->db->select('*');
        $this->db->from('tbl_customers');
        $this->db->where('customer_id', $this->session->userdata('customer_id'));
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('tbl_customers', $data);
        return $this->db->insert_id();
    }

    public function edit($data)
    {
        $this->db->where('customer_id', $data['customer_id']);
        $this->db->update('tbl_customers', $data);
    }
}
?>
