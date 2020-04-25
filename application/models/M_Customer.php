<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Customer extends CI_Model {
        public function getAllCustomer($limit, $start)
        {
            return $this->db->get('customer', $limit, $start)->result_array();
        }

        public function getCustomerById($id)
        {
            return $this->db->get_where('customer', ['id' => $id])->row_array();
        }

        public function insertCustomerData($data)
        {
            $this->db->insert('customer', $data);
        }

        public function updateCustomerData($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('customer', $data);
        }

        public function deleteCustomerData($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('customer');
        }
        public function countAllCustomer()
        {
            return $this->db->get('product')->num_rows();
        }
    }
    
    /* End of file M_Produk.php */
    
?>
