<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    public function getAllTransaksi($limit, $start)
    {
        //     $this->db->select('product.*, category.cat');
        //     $this->db->from('product');
        //     $this->db->join('category', 'product.id_kategori = category.id');
        //     $this->db->where('product.id', $id);
        //     return $this->db->get()->result_array();
        return $this->db->get('transaksi', $limit, $start)->result_array();
    }
    // public function getAllProduct()
    // {
    //     $this->db->select('*');
    //     $this->db->from('product');
    //     $this->db->order_by('nama', 'DESC');
    //     return $this->db->get('product')->result_array();
    // }

    public function getTransaksiById($id)
    {
        return $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    public function insertTransaksiData($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function editTransaksiData($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function deleteTransaksiData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
    }

    public function countAllTransaksi()
    {
        return $this->db->get('transaksi')->num_rows();
    }

    public function getAllCustomer()
    {
        return $this->db->get('customer')->result_array();
    }
}
    
    /* End of file M_Transaksi.php */
