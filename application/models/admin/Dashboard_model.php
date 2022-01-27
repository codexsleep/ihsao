<?php
class Dashboard_model extends CI_Model{

    function datasummary($table){
        $query = $this->db->get($table);
        return $query;
    }

}