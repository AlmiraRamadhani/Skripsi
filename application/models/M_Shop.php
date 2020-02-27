<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Shop extends CI_Model
{
    public function getAllProduct($category_id)
    {
        if ($category_id > 0) {
            $this->db->select('product.*, category.name');
            $this->db->from('product');
            $this->db->join('category', 'product.id_kategori = category.id');
            $this->db->where('product.id_kategori', $category_id);
        } else {
            $this->db->select('product.*, category.name');
            $this->db->from('product');
            $this->db->join('category', 'product.id_kategori = category.id');
        }
        return $this->db->get()->result_array();
    }

    public function getProductById($id)
    {
        $this->db->select('product.*, category.name');
        $this->db->from('product');
        $this->db->join('category', 'product.id_kategori = category.id');
        $this->db->where('product.id', $id);
        return $this->db->get()->row_array();
    }
}
    
    /* End of file M_Shop.php */
