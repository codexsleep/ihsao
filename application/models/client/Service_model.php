<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tbl_services');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_services');
        $this->db->where('service_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
?>
