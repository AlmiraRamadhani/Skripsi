<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function getAllAdmin($limit, $start)
    {
        return $this->db->get('admin', $limit, $start)->result_array();
    }

    public function getAdminById($id)
    {
        return $this->db->get_where('admin', ['id' => $id])->row_array();
    }

    public function insertAdminData($data)
    {
        $this->db->insert('admin', $data);
    }

    public function editAdminData($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }

    public function deleteAdminData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin');
    }

    public function countAllAdmin()
    {
        return $this->db->get('admin')->num_rows();
    }
    public function cekPassword($username)
    {
        return $this->db->get_where('admin', ['username' => $username])->row_array();
    }

    public function changePassword($username, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('username', $username);
        $this->db->update('admin');
    }
}
    
    /* End of file M_Admin.php */
