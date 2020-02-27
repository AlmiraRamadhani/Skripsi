<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Sale extends CI_Model {
        public function getAllData()
        {
            $this->db->select('invoice.*, customer.nama');
            $this->db->from('invoice');
            $this->db->join('customer', 'invoice.id_cust = customer.id');
            return $this->db->get()->result_array();
        }

        public function getDetailDataPenjualan($id)
        {
            $this->db->select('invoice.*, order.*');
            $this->db->from('invoice');
            $this->db->join('orders', 'invoice.id = order.id_inv');
            $this->db->where('orders.id_inv', $id);
            return $this->db->get()->result_array();
        }

        public function konfirmasiPembayaran($id)
        {
            $this->db->where('id', $id);
            $this->db->update('invoice', ['status' => 'Sudah Membayar']);
        }

        public function konfirmasiPengembalian($id)
        {
            $this->db->where('id', $id);
            $this->db->update('invoice', ['status' => 'Selesai']);
        }
    }
