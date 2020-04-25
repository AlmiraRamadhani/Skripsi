<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Denda extends CI_Model
{
    public function getAllDenda($limit, $start)
    {
        return $this->db->get('denda', $limit, $start)->result_array();
    }

    public function getDendaById($id)
    {
        return $this->db->get_where('denda', ['id' => $id])->row_array();
    }

    public function insertDendaData($data)
    {
        $this->db->insert('denda', $data);
    }

    public function editDendaData($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('denda', $data);
    }

    public function deleteDendaData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('denda');
    }

    public function countAllDenda()
    {
        return $this->db->get('denda')->num_rows();
    }
}
    
    /* End of file M_Denda.php */
