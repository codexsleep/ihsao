<?php
class Users_model extends CI_Model
{
    public function get_users()
    {
        $result = $this->db->query("SELECT * FROM tbl_user");
        return $result;
    }
}