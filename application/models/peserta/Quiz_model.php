<?php
class quiz_model extends CI_Model{
    
    public function log_soal($soal_log_id){ //mengambil data dari log soal berdasarkan id log soal dan log quiz
        $result = $this->db->query("SELECT * FROM tbl_log_soal_objektif_peserta where soal_log_id='$soal_log_id'");
        return $result;
    }

    public function datasoal_objektif($soal_id){ //mengambil datasoal objektif berdasarkan id soal dari log soal
        $result = $this->db->query("SELECT * FROM tbl_soal_objektif where soal_id='$soal_id'");
        return $result;
    }

    public function log_soal_nav($quiz_log_id){ //mengambil data dari log soal untuk navigasi quiz berdasarkan quiz_log_id
        $result = $this->db->query("SELECT * FROM tbl_log_soal_objektif_peserta where quiz_log_id='$quiz_log_id'");
        return $result;
    }

    public function log_quiz($quiz_log_id){ //mengambil data dari log quiz berasarkan log quiz id
        $result = $this->db->query("SELECT * FROM tbl_log_quiz_peserta where quiz_log_id='$quiz_log_id'");
        return $result;
    }

    public function min_log_soal($quiz_log_id){ //mengambil soal terkecil yang belum di kerjakan
        $result = $this->db->query("SELECT min(soal_log_id) as soal_log_id FROM tbl_log_soal_objektif_peserta WHERE quiz_log_id='$quiz_log_id' AND jawaban=''");
        return $result;
    }

    public function total_unansware_soal($quiz_log_id){ //Melihat soal yang sudah di kerjakan
        $result = $this->db->query("SELECT count(*) as total FROM tbl_log_soal_objektif_peserta WHERE quiz_log_id='$quiz_log_id' AND jawaban=''");
        return $result;
    }

    public function data_quiz($quiz_id){ //mengambil data quiz berdasarkan quiz log
        $result = $this->db->query("SELECT * FROM tbl_quiz WHERE quiz_id='$quiz_id'");
        return $result;
    }

    public function jawab_soal_objektif($soal_log_id,$option){
            $result = $this->db->query("UPDATE tbl_log_soal_objektif_peserta SET jawaban='$option' WHERE soal_log_id='$soal_log_id'");
            return $result;
    }

}