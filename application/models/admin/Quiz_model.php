<?php
class Quiz_model extends CI_Model
{
    public function dataquiz()
    {
        $result = $this->db->query("SELECT * FROM tbl_quiz");
        return $result;
    }

    public function datasoal_objektif($id)
    {
        $result = $this->db->query("SELECT * FROM tbl_soal_objektif where quiz_id='$id'");
        return $result;
    }

    public function dataquiz_edit($id)
    {
        $query=$this->db->query("SELECT * FROM tbl_quiz WHERE quiz_id='$id' LIMIT 1");
        return $query;
    }

    public function jumlah_soal_objektif($id)
    {
        $query=$this->db->query("SELECT * FROM tbl_soal_objektif WHERE quiz_id='$id' LIMIT 1");
        return $query;
    }

    public function addquiz($nama,$token,$jenis,$waktu,$start,$end,$created){
        $result = $this->db->query("INSERT INTO tbl_quiz (quiz_name, quiz_token, quiz_type, quiz_start, quiz_end, quiz_time, quiz_created_date) VALUES ('$nama','$token','$jenis','$start','$end','$waktu','$created')");
        return $result;
    }

    public function tambah_soal_objektif($id,$pertanyaan,$opsia,$opsib,$opsic,$opsid,$opsie,$jawaban){
        $result = $this->db->query("INSERT INTO tbl_soal_objektif(quiz_id, quiz_question, quiz_option_a, quiz_option_b, quiz_option_c, quiz_option_d, quiz_option_e, quiz_answare) VALUES ('$id','$pertanyaan','$opsia','$opsib','$opsic','$opsid','$opsie','$jawaban')");
        return $result;
    }

    public function objektifbyid($id)
    {
        $query=$this->db->query("SELECT * FROM tbl_soal_objektif WHERE soal_id='$id' LIMIT 1");
        return $query;
    }

    public function editquiz($id,$nama,$jenis,$waktu,$start,$end){
        $result = $this->db->query("UPDATE tbl_quiz SET quiz_name='$nama',quiz_type='$jenis',quiz_start='$start',quiz_end='$end',quiz_time='$waktu' WHERE quiz_id='$id'");
        return $result;
    }

    public function delete_quiz($id){
        $result = $this->db->query("DELETE FROM tbl_quiz WHERE quiz_id='$id'");
        return $result;
    }

    public function delete_soal_objektif($id){
        $result = $this->db->query("DELETE FROM tbl_soal_objektif WHERE soal_id='$id'");
        return $result;
    }


}