<?php
class Peserta_model extends CI_Model
{
    public function datapeserta()
    {
        $result = $this->db->query("SELECT * FROM tbl_peserta");
        return $result;
    }

    public function addpeserta($nama,$email,$nis,$created){
        $result = $this->db->query("INSERT INTO tbl_peserta(peserta_name, peserta_email, peserta_nis, created_date) VALUES ('$nama','$email','$nis','$created')");
        return $result;
    }

      public function pesertabyid($id)
    {
        $query=$this->db->query("SELECT * FROM tbl_peserta WHERE peserta_id='$id' LIMIT 1");
        return $query;
    }

        public function editpeserta($id,$nama,$email,$nis){
            $result = $this->db->query("UPDATE tbl_peserta SET peserta_name='$nama', peserta_email='$email', peserta_nis='$nis' where peserta_id='$id'");
        return $result;
    }

    public function delete_peserta($id){
        $result = $this->db->query("DELETE FROM tbl_peserta WHERE peserta_id='$id'");
        return $result;
    }

}