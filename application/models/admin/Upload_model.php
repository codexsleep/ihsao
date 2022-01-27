<?php
class Upload_model extends CI_Model
{
    public function cloudfile()
    {
        $result = $this->db->query("SELECT * FROM tbl_cloudfile");
        return $result;
    }
    public function upload($nama,$ext,$size,$created){
    	$result = $this->db->query("INSERT INTO tbl_cloudfile (file_name, file_ext, file_size, created_date) VALUES ('$nama','$ext','$size','$created')");
        return $result;
    }
}