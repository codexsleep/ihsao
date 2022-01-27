 <?php
class Dashboard_model extends CI_Model{

   public function quizlog($id)
    {
        $result = $this->db->query("SELECT * FROM tbl_log_quiz_peserta where peserta_id='$id'");
        return $result;
    }

    function dataquiz($id){
        $result = $this->db->query("SELECT * FROM tbl_quiz where quiz_id='$id'");
        return $result;
    }

   public function totalsoal($id)
    {
        $result = $this->db->query("SELECT count(*) as total FROM tbl_soal_objektif where quiz_id='$id'");
        return $result;
    }

    public function cektoken($token)
    {
        $result = $this->db->query("SELECT * FROM tbl_quiz WHERE quiz_token='$token'");
        return $result;
    }

    public function cek_log($quiz_id,$peserta_id){
    	$result = $this->db->query("SELECT * FROM tbl_log_quiz_peserta WHERE quiz_id='$quiz_id' AND peserta_id='$peserta_id'");
        return $result;
    }

    public function cek_log_byid($id){
        $result = $this->db->query("SELECT * FROM tbl_log_quiz_peserta WHERE quiz_log_id='$id'");
        return $result;
    }
        public function cek_quiz_log($id){
        $result = $this->db->query("SELECT * FROM tbl_log_soal_objektif_peserta WHERE quiz_log_id='$id'");
        return $result;
    }

    public function show_soal_objektif($id){
        $result = $this->db->query("SELECT * FROM tbl_soal_objektif WHERE quiz_id='$id' order by rand()");
        return $result;
    }

    public function takequiz($quiz_id,$peserta_id,$status,$log_date){
    	    $result = $this->db->query("INSERT INTO tbl_log_quiz_peserta(quiz_id, peserta_id, quiz_status, log_date) VALUES ('$quiz_id','$peserta_id','$status','$log_date')");
        return $result;
    }

    public function start_quiz_objektif($quiz_log_id,$soal_id){
            $result = $this->db->query("INSERT INTO tbl_log_soal_objektif_peserta (quiz_log_id, soal_id) VALUES ('$quiz_log_id','$soal_id')");
        return $result;
    }

    public function set_start_datetime($quiz_log_id,$start_date){
            $result = $this->db->query("UPDATE tbl_log_quiz_peserta SET start_time='$start_date' WHERE quiz_log_id='$quiz_log_id'");
            return $result;
    }

    public function cek_log_soal_byid($quiz_log_id,$soal_id){
        $result = $this->db->query("SELECT * FROM tbl_log_soal_objektif_peserta WHERE quiz_log_id='$quiz_log_id' AND soal_id='$soal_id'");
        return $result;
    }

    function multi_insert($table = null, $data = array())
        {
            $jumlah = count($data);
            if ($jumlah > 0){
                    $this->db->insert_batch($table, $data);
                }
    }

}