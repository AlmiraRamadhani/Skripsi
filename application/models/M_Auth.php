<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Auth extends CI_Model {
        public function insertAdminData($data)
        {
            $this->db->insert('admin', $data);
        }
        
        public function getAdmin($username)
        {
            return $this->db->get_where('admin', ['username' => $username])->row_array();
        }
    }
?>
