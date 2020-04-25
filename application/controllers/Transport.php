<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Transport');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'Data Produk';
            $data['admin'] = $this->M_Crud->get('admin');

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/transport/index';
            $config['total_rows'] = $this->M_Transport->countAllTransport();
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

            $data['transport'] = $this->M_Transport->getAllTransport(10, $data['start']);
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('transport/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('owp', 'Harga Satu Minggu', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('twp', 'Harga Dua Minggu', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('omp', 'Harga Satu Bulan', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('ep', 'Harga Perpanjangan', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('weight', 'Berat', 'trim|required|numeric', [
            'required' => 'Berat harus diisi!',
            'numeric' => 'Berat hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric', [
            'required' => 'Stok harus diisi!',
            'numeric' => 'Stok hanya boleh angka!'
        ]);

        if ($this->session->userdata('username')) {
            if ($this->form_validation->run() == FALSE) {
                $username = $this->session->userdata('username');

                $data['title'] = 'Tambah Data Transport';
                $data['admin'] = $this->M_Crud->get('admin');
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('transport/add', $data);
            } else {
                $data = [
                    'name' => $this->input->post('nama'),
                    'owp' => $this->input->post('owp'),
                    'twp' => $this->input->post('twp'),
                    'omp' => $this->input->post('omp'),
                    'ep' => $this->input->post('ep'),
                    'weight' => $this->input->post('weight'),
                    'stock' => $this->input->post('stock')
                ];
                $this->M_Transport->insertTransportData($data);
                redirect('transport/index');
            }
        } else {
            echo 'Failed';
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('owp', 'Harga Satu Minggu', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('twp', 'Harga Dua Minggu', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('omp', 'Harga Satu Bulan', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('ep', 'Harga Perpanjangan', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('weight', 'Berat', 'trim|required|numeric', [
            'required' => 'Berat harus diisi!',
            'numeric' => 'Berat hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric', [
            'required' => 'Stok harus diisi!',
            'numeric' => 'Stok hanya boleh angka!'
        ]);

        if ($this->session->userdata('username')) {
            if ($this->form_validation->run() == FALSE) {
                $username = $this->session->userdata('username');

                $data['title'] = 'Edit Data Produk';
                $data['admin'] = $this->M_Crud->get('admin');
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['transport'] = $this->M_Transport->getTransportById($id);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('transport/update', $data);
            } else {
                $id = $this->input->post('id');

                $data = [
                    'name' => $this->input->post('nama'),
                    'owp' => $this->input->post('owp'),
                    'twp' => $this->input->post('twp'),
                    'omp' => $this->input->post('omp'),
                    'ep' => $this->input->post('ep'),
                    'weight' => $this->input->post('weight'),
                    'stock' => $this->input->post('stock')
                ];

                $this->M_Transport->editTransportData($data, $id);
                redirect('transport');
            }
        } else {
            echo 'Failed';
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('username')) {
            $this->m_Transport->deleteTransportData($id);
            redirect('transport');
        } else {
            echo 'Failed';
        }
    }
}
