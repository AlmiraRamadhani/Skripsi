<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Customer');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'Data Customer';
            $data['admin'] = $this->M_Crud->get('admin');

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/Customer/index';
            $config['total_rows'] = $this->M_Customer->countAllCustomer();
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

            $data['customer'] = $this->M_Customer->getAllCustomer(10, $data['start']);
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('Customer/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric', [
            'required' => 'NIK harus diisi!',
            'numeric' => 'NIK hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('name', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('address', 'Alamat', 'trim|required', [
            'required' => 'Alamat harus diisi!'
        ]);
        $this->form_validation->set_rules('phone', 'Np. Tlp', 'trim|required|numeric', [
            'required' => 'No. Tlp harus diisi!',
            'numeric' => 'No. Tlp hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('project', 'Proyek', 'trim|required', [
            'required' => 'Proyek harus diisi!'
        ]);

        if ($this->session->userdata('username')) {
            if ($this->form_validation->run() == FALSE) {
                $username = $this->session->userdata('username');

                $data['title'] = 'Tambah Data Customer';
                $data['admin'] = $this->M_Crud->get('admin');
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('Customer/add', $data);
            } else {
                $data = [
                    'nik' => $this->input->post('nik'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'company' => $this->input->post('company'),
                    'project' => $this->input->post('project')
                ];
                $this->M_Customer->insertCustomerData($data);
                redirect('Customer/index');
            }
        } else {
            echo 'Failed';
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric', [
            'required' => 'NIK harus diisi!',
            'numeric' => 'NIK hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('name', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('address', 'Alamat', 'trim|required', [
            'required' => 'Alamat harus diisi!'
        ]);
        $this->form_validation->set_rules('phone', 'Np. Tlp', 'trim|required|numeric', [
            'required' => 'No. Tlp harus diisi!',
            'numeric' => 'No. Tlp hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('project', 'Proyek', 'trim|required', [
            'required' => 'Proyek harus diisi!'
        ]);

        if ($this->session->userdata('username')) {
            if ($this->form_validation->run() == FALSE) {
                $username = $this->session->userdata('username');

                $data['title'] = 'Edit Data Customer';
                $data['admin'] = $this->M_Crud->get('admin');
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['customer'] = $this->M_Customer->getCustomerById($id);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('Customer/update', $data);
            } else {
                $id = $this->input->post('id');
                
                $data = [
                    'nik' => $this->input->post('nik'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'company' => $this->input->post('company'),
                    'project' => $this->input->post('project')
                ];

                $this->M_Customer->updateCustomerData($data, $id);
                redirect('Customer');
            }
        } else {
            echo 'Failed';
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('username')) {
            $this->M_Customer->deleteCustomerData($id);
            redirect('Customer');
        } else {
            echo 'Failed';
        }
    }
}
