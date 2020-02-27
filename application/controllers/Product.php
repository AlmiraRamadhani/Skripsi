<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Product');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');

            $data['title'] = 'Data Produk';
            $data['admin'] = $this->M_Auth->getAdmin($email);

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/product/index';
            $config['total_rows'] = $this->M_Product->countAllProduct();
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

            $data['product'] = $this->M_Product->getAllProduct(5, $data['start']);
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('product/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required|numeric', [
            'required' => 'Berat harus diisi!',
            'numeric' => 'Berat hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric', [
            'required' => 'Stok harus diisi!',
            'numeric' => 'Stok hanya boleh angka!'
        ]);

        if ($this->session->userdata('email')) {
            if ($this->form_validation->run() == FALSE) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Tambah Data Produk';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['category'] = $this->M_Product->getAllCategory();

                $this->load->view('templates/admin_header', $data);
                $this->load->view('product/add', $data);
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'stok' => $this->input->post('stok'),
                    'kategori' => $this->input->post('category')
                ];
                $this->M_Product->insertProductData($data);
                redirect('product');
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
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric', [
            'required' => 'Harga harus diisi!',
            'numeric' => 'Harga hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required|numeric', [
            'required' => 'Berat harus diisi!',
            'numeric' => 'Berat hanya boleh angka!'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric', [
            'required' => 'Stok harus diisi!',
            'numeric' => 'Stok hanya boleh angka!'
        ]);

        if ($this->session->userdata('email')) {
            if ($this->form_validation->run() == FALSE) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Edit Data Produk';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['product'] = $this->M_Product->getProductById($id);
                $data['category'] = $this->M_Product->getAllCategory();

                $this->load->view('templates/admin_header', $data);
                $this->load->view('product/update', $data);
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'stok' => $this->input->post('stok'),
                    'id_kategori' => $this->input->post('category')
                ];
                $this->M_Product->editProductData($data, $id);
                redirect('product');
            }
        } else {
            echo 'Failed';
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('email')) {
            $this->M_Product->deleteProductData($id);
            redirect('product');
        } else {
            echo 'Failed';
        }
    }
}
