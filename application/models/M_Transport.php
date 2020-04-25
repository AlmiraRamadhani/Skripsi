<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transport extends CI_Model
{
    public function getAllTransport($limit, $start)
    {
        return $this->db->get('transport', $limit, $start)->result_array();
    }

    public function getTransportById($id)
    {
        return $this->db->get_where('transport', ['id' => $id])->row_array();
    }

    public function insertTransportData($data)
    {
        $this->db->insert('transport', $data);
    }

    public function editTransportData($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('transport', $data);
    }

    public function deleteTransportData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transport');
    }

    public function countAllTransport()
    {
        return $this->db->get('transport')->num_rows();
    }
}
    
    /* End of file M_Transport.php */
