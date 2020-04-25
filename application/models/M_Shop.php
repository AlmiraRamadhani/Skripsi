<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Shop extends CI_Model
{
    public function getAllProduct()
    {
        return $this->db->get('product')->result_array();
    }

    public function getProductById($id)
    {
        return $this->db->get_where('product', ['id' => $id])->row_array();
    }
    public function getAllCustomer()
    {
        return $this->db->get('customer')->result_array();
    }
    public function find($id)
    {
        $result=$this->db->where('id',$id)->limit(1)->get('product');
        if ($result->num_rows() > 0) {
            return $result->row();
        }else{
            return array();
        }
    }
}
    
    /* End of file M_Shop.php */
