<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Sale extends CI_Model {
        public function getAllData()
        {
            $this->db->select('invoice.*, customer.name');
            $this->db->from('invoice');
            $this->db->join('customer', 'invoice.id_cust = customer.id');
            return $this->db->get()->result_array();
        }

        public function getData($finish)
        {
            $this->db->select('invoice.*, customer.name');
            $this->db->from('invoice');
            $this->db->join('customer', 'invoice.id_cust = customer.id');
            $this->db->where('invoice.paidstatus',$finish);
            return $this->db->get()->result_array();
        }

        public function insertData($data)
        {
            $this->db->insert('invoice', $data);
        }
        public function updateData($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('invoice', $data);
        }
        public function deleteData($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('invoice');
        }

        public function insertProduct($product)
        {
            $this->db->insert('order', $product);
        }
        public function updateProduct($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('order', $data);
        }
        public function deleteProduct($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('order');
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
