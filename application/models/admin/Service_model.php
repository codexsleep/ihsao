<?php
class Service_model extends CI_Model{

    public function servicedata()
    {
        $result = $this->db->query("SELECT * FROM tbl_services");
    }

}