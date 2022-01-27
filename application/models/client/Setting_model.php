<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tbl_settings');
        $query = $this->db->get();
        return $query->result();
    }
}
?>
