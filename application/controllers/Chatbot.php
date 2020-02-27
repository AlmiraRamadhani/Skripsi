<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chatbot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Chat');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');

            $data['title'] = 'Daftar Pertanyaan';
            $data['admin'] = $this->M_Auth->getAdmin($email);

            // $this->load->library('pagination');
            // $config['base_url'] = 'http://localhost/skripsi/chatbot/index';
            // $config['total_rows'] = $this->M_Chat->countAllChatbot();
            // //var_dump($config['total_rows']);
            // $config['per_page'] = 5;
            // //style
            // $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
            // $config['full_tag_close'] = '</ul></nav>';
            // $config['first_link'] = 'First';
            // $config['first_tag_open'] = '<li class="page-item">';
            // $config['first_tag_close'] = '</li>';
            // $config['last_link'] = 'Last';
            // $config['last_tag_open'] = '<li class="page-item">';
            // $config['last_tag_close'] = '</li>';
            // $config['next_link'] = '&raquo';
            // $config['next_tag_open'] = '<li class="page-item">';
            // $config['next_tag_close'] = '</li>';
            // $config['prev_link'] = '&laquo';
            // $config['prev_tag_open'] = '<li class="page-item">';
            // $config['prev_tag_close'] = '</li>';
            // $config['cur_tag_open'] = '<li class="page-item" active><a class="page-link" href="#">';
            // $config['cur_tag_close'] = '</a></li>';
            // $config['num_tag_open'] = '<li class="page-item">';
            // $config['num_tag_close'] = '</li>';
            // $config['attributes'] = array('class' => 'page-link');
            // //initialize
            // $this->pagination->initialize($config);
            // $data['start'] = $this->uri->segment(3);
            // $data['question'] = $this->M_Chat->getAllQuestion(5, $data['start']);

            $data['question'] = $this->M_Chat->getAllQuestion();

            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('chatbot/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'trim|required', [
            'required' => 'Pertanyaan harus diisi!'
        ]);
        $this->form_validation->set_rules('answer', 'Jawaban', 'trim|required', [
            'required' => 'Jawaban harus diisi!'
        ]);

        if ($this->session->userdata('email')) {
            if ($this->form_validation->run() == FALSE) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Tambah Data Question';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('chatbot/add', $data);
            } else {
                $data = [
                    'question' => strtolower($this->input->post('question')),
                    'answer' => strtolower($this->input->post('answer'))
                ];
                $this->M_Chat->inserChatData($data);
                redirect('chatbot');
            }
        } else {
            echo 'Failed';
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'trim|required', [
            'required' => 'Pertanyaan harus diisi!'
        ]);
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required', [
            'required' => 'Jawaban harus diisi!'
        ]);

        if ($this->session->userdata('email')) {
            if ($this->form_validation->run() == FALSE) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Edit Data Question';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['question'] = $this->M_Chat->getQuestionById($id);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('chatbot/update', $data);
            } else {
                $where = array('id' => $id);
                $data = [
                    'question' => strtolower($this->input->post('question')),
                    'answer' => strtolower($this->input->post('answer'))
                ];

                $this->M_Chat->editQuestionData($data, $id);
                redirect('chatbot/index/' . $id);
            }
        }
    }
    public function delete($id)
    {
        if ($this->session->userdata('email')) {
            $this->M_Chat->deleteQuestionData($id);
            redirect('chatbot');
        } else {
            echo 'Failed';
        }
    }

    public function chat()
    {
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');

            $data['title'] = 'History Chat';
            $data['admin'] = $this->M_Auth->getAdmin($email);

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/chatbot/chat/';
            $config['total_rows'] = $this->M_Chat->countAllChat();
            //var_dump($config['total_rows']);
            $config['per_page'] = 5;

            //style
            $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item" active><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            //initialize
            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(3);

            $data['history'] = $this->M_Chat->chat(5, $data['start']);

            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('chatbot/history', $data);
        } else {
            echo 'Failed';
        }
    }
}
