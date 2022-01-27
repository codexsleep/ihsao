<?php
class auth_model extends CI_Model{

    function authlogin($username,$password){
        $query=$this->db->query("SELECT * FROM tbl_admin WHERE admin_username='$username' AND admin_password=SHA1('$password') LIMIT 1");
        return $query;
    }

    function admin_data($username){
        $query=$this->db->query("SELECT * FROM tbl_admin WHERE admin_username='$username' LIMIT 1");
        return $query;
    }
}