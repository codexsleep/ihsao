<?php
class auth_model extends CI_Model{

    function authlogin($email,$nis){
        $query=$this->db->query("SELECT * FROM tbl_peserta WHERE peserta_email='$email' AND peserta_nis='$nis' LIMIT 1");
        return $query;
    }

    function peserta_data($email){
        $query=$this->db->query("SELECT * FROM tbl_peserta WHERE peserta_email='$email' LIMIT 1");
        return $query;
    }
}