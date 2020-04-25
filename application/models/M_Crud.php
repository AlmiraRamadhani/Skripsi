<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Crud extends CI_Model {
        function insert($data,$table)
        {
            $this->db->insert($table, $data);
        }
        function get($table)
        {
            return $this->db->get($table)->row_array();
        }
        function edit($where,$table)
        {
            return $this->db->get_where($table,$where);
        }
        function update($where,$data,$table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }
        function delete($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }
    }
?>
