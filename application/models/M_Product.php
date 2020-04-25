<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{
    public function getAllProduct($limit, $start)
    {
        //     $this->db->select('product.*, category.cat');
        //     $this->db->from('product');
        //     $this->db->join('category', 'product.id_kategori = category.id');
        //     $this->db->where('product.id', $id);
        //     return $this->db->get()->result_array();
        return $this->db->get('product', $limit, $start)->result_array();
    }
    // public function getAllProduct()
    // {
    //     $this->db->select('*');
    //     $this->db->from('product');
    //     $this->db->order_by('nama', 'DESC');
    //     return $this->db->get('product')->result_array();
    // }

    public function getProductById($id)
    {
        return $this->db->get_where('product', ['id' => $id])->row_array();
    }

    public function insertProductData($data)
    {
        $this->db->insert('product', $data);
    }

    public function editProductData($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }

    public function deleteProductData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }

    public function countAllProduct()
    {
        return $this->db->get('product')->num_rows();
    }
}
    
    /* End of file M_Produk.php */
