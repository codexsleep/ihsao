<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing
    public function listing()
    {
        $this->db->select(
            'tbl_orders.*, tbl_services.service_name, tbl_services.service_icon'
        );
        $this->db->from('tbl_orders');
        // JOIN
        $this->db->join(
            'tbl_services',
            'tbl_services.service_id = tbl_orders.order_item',
            'inner'
        );
        $this->db->where(
            'customer_id',
            $this->session->userdata('customer_id')
        );
        $query = $this->db->get();
        return $query->result();
    }

    public function notifications()
    {
        $this->db->select('tbl_orders.*,tbl_services.service_name');
        $this->db->from('tbl_orders');
        // JOIN
        $this->db->join(
            'tbl_services',
            'tbl_services.service_id = tbl_orders.order_item',
            'inner'
        );
        $this->db->where(
            'customer_id',
            $this->session->userdata('customer_id')
        );
        $query = $this->db->get();
        return $query->row();
    }

    public function notifications_jumlah()
    {
        $id = $this->session->userdata('customer_id');
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->where(
            "customer_id='$id' and order_status != 'Canceled' and order_status != 'Finished'"
        );
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->where('id_product', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data)
    {
        $this->db->insert('tbl_orders', $data);
    }
}
?>
