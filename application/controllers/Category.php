<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Category extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Auth');
            $this->load->model('M_Category');
        }
    
        public function index()
        {
            if ($this->session->userdata('email')) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Data Kategori';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                $data['kategori'] = $this->M_Category->getAllCategory();
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('category/index', $data);
            }
            else {
                echo 'Failed';
            }
        }

        public function add()
        {
            $this->form_validation->set_rules('cat', 'Nama', 'trim|required', [
                'required' => 'Nama harus diisi!'
            ]);
            
            if ($this->session->userdata('email')) {
                if ($this->form_validation->run() == FALSE) {
                    $email = $this->session->userdata('email');
    
                    $data['title'] = 'Tambah Data Kategori';
                    $data['admin'] = $this->M_Auth->getAdmin($email);
                    $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                    $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
               
                    $this->load->view('templates/admin_header', $data);
                    $this->load->view('category/add', $data);
                } else {
                    $data = [
                        'cat' => $this->input->post('cat')
                    ];
                    $this->M_Category->insertCategoryData($data);
                    redirect('category');
                }
            }
            else {
                echo 'Failed';
            }
        }

        public function update($id)
        {
            $this->form_validation->set_rules('cat', 'Nama', 'trim|required', [
                'required' => 'Nama harus diisi!'
            ]);

            if ($this->session->userdata('email')) {
                if ($this->form_validation->run() == FALSE) {
                    $email = $this->session->userdata('email');
    
                    $data['title'] = 'Edit Data Kategori';
                    $data['admin'] = $this->M_Auth->getAdmin($email);
                    $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                    $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                    $data['kategori'] = $this->M_Category->getCategoryById($id);
    
                    $this->load->view('templates/admin_header', $data);
                    $this->load->view('category/update', $data);
                } else {
                    $data = [
                        'cat' => $this->input->post('cat')
                    ];
                    $this->M_Category->editCategoryData($data, $id);
                    redirect('category/index/' . $id);
                }
        }
    }
        public function delete($id)
        {
            if ($this->session->userdata('email')) {
                $this->M_Category->deleteCategoryData($id);
                redirect('category');
            }
            else {
                echo 'Failed';
            }
        }
    }
?>
