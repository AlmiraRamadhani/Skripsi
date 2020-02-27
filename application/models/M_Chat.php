<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Chat extends CI_Model
{
    public function chat($limit, $start)
    {
        return $this->db->get('chat', $limit, $start)->result_array();
    }
    public function getAllQuestion()
    {
        return $this->db->get('question')->result_array();
    }
    // public function getAllQuestion($limit, $start)
    // {
    //     return $this->db->get('question', $limit, $start)->result_array();
    // }
    public function inserChatData($data)
    {
        $this->db->insert('question', $data);
    }
    public function getQuestionById($id)
    {
        return $this->db->get('question')->row_array();
    }
    public function editQuestionData($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('question', $data);
    }

    public function deleteQuestionData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('question');
    }

    public function countAllChatbot()
    {
        return $this->db->get('question')->num_rows();
    }
    public function countAllChat()
    {
        return $this->db->get('chat')->num_rows();
    }
}
