<?php
class Admin_model extends CI_Model
{
    public function dataadmin()
    {
        $result = $this->db->query("SELECT * FROM tbl_admin");
        return $result;
    }

     public function addadmin($nama,$username,$password,$role){
        $result = $this->db->query("INSERT INTO tbl_admin(admin_name, admin_username, admin_password, admin_role) VALUES ('$nama','$username','$password','$role')");
        return $result;
    }

    public function delete_admin($id){
        $result = $this->db->query("DELETE FROM tbl_admin WHERE admin_id='$id'");
        return $result;
    }

      public function adminby_username($username)
    {
        $query=$this->db->query("SELECT * FROM tbl_admin WHERE admin_username='$username' LIMIT 1");
        return $query;
    }

    public function editadmin($usernameedit,$nama,$username,$password,$role){
        if($password==null){
            $result = $this->db->query("UPDATE tbl_admin SET admin_name='$nama', admin_username='$username', admin_role='$role' where admin_username='$usernameedit'");
        }else{
            $result = $this->db->query("UPDATE tbl_admin SET admin_name='$nama', admin_username='$username', admin_password='$password', admin_role='$role' where admin_username='$usernameedit'");
        }
        return $result;
    }

}