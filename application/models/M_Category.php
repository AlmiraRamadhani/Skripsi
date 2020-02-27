<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Category extends CI_Model {
        public function getCategoryById($id)
        {
            return $this->db->get('category')->row_array();
        }

        public function getAllCategory()
        {
            return $this->db->get('category')->result_array();
        }

        public function insertCategoryData($data)
        {
            $this->db->insert('category', $data);
        }

        public function editCategoryData($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('category', $data);
        }

        public function deleteCategoryData($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('category');
        }
    }
    
?>
