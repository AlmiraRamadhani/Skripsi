<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_User');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'Data Comment';
            $data['admin'] = $this->M_Crud->get('admin');

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/user/index';
            $config['total_rows'] = $this->M_User->countAllUser();
            //var_dump($config['total_rows']);
            $config['per_page'] = 10;

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

            $data['user'] = $this->M_User->getAllUser(10, $data['start']);
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('user/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'comment' => $this->input->post('comment')
        ];
        $this->M_User->add($data);
        redirect('home');
    }

    public function delete($id)
    {
        if ($this->session->userdata('email')) {
            $this->M_User->deleteUserData($id);
            redirect('user');
        } else {
            echo 'Failed';
        }
    }
}
