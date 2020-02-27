<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_User extends CI_Model {
        public function getAllUser($limit, $start)
        {
            return $this->db->get('user', $limit, $start)->result_array();
        }

        public function add($data)
        {
            $this->db->insert('user', $data);
        }

        public function deleteUserData($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('user');
        }
        public function countAllUser()
        {
            return $this->db->get('user')->num_rows();
        }
    }
    
    /* End of file M_Produk.php */
    
?>
