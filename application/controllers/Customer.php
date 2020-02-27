<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Customer extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Auth');
            $this->load->model('M_Customer');
        }
    
        public function index()
        {
            if ($this->session->userdata('email')) {
                $email = $this->session->userdata('email');

                $data['title'] = 'Data Customer';
                $data['admin'] = $this->M_Auth->getAdmin($email);
                
                $this->load->library('pagination');

                $config['base_url'] = 'http://localhost/skripsi/customer/index';
                $config['total_rows'] = $this->M_Customer->countAllCustomer();
                //var_dump($config['total_rows']);
                $config['per_page'] = 10;

                //style
                $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
                $config['full_tag_close'] = '</ul></nav>';
                
                $config['first_link']='First';
                $config['first_tag_open']='<li class="page-item">';
                $config['first_tag_close']='</li>';
                
                $config['last_link']='Last';
                $config['last_tag_open']='<li class="page-item">';
                $config['last_tag_close']='</li>';
                
                $config['next_link']='&raquo';
                $config['next_tag_open']='<li class="page-item">';
                $config['next_tag_close']='</li>';
                
                $config['prev_link']='&laquo';
                $config['prev_tag_open']='<li class="page-item">';
                $config['prev_tag_close']='</li>';
                
                $config['cur_tag_open']='<li class="page-item" active><a class="page-link" href="#">';
                $config['cur_tag_close']='</a></li>';
                
                $config['num_tag_open']='<li class="page-item">';
                $config['num_tag_close']='</li>';

                $config['attributes']=array('class'=>'page-link');

                //initialize
                $this->pagination->initialize($config);

                $data['start'] = $this->uri->segment(3);

                $data['customer'] = $this->M_Customer->getAllCustomer(10,$data['start']);
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

                $this->load->view('templates/admin_header', $data);
                $this->load->view('customer/index', $data);
            }
            else {
                echo 'Failed';
            }
        }

        public function add()
        {
            $this->form_validation->set_rules('id_ktp', 'No Ktp', 'trim|required|numeric', [
                'required' => 'No KTP harus diisi!',
                'numeric' => 'No KTP hanya boleh angka!'
            ]);
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
                'required' => 'Nama harus diisi!'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
                'required' => 'Alamat harus diisi!'
            ]);
            $this->form_validation->set_rules('no_tlp', 'No Tlp', 'trim|required|numeric', [
                'required' => 'No Tlp harus diisi!',
                'numeric' => 'No Tlp hanya boleh angka!'
            ]);
            $this->form_validation->set_rules('proyek', 'Proyek', 'trim|required', [
                'required' => 'Proyek harus diisi!'
            ]);
            
            if ($this->session->userdata('email')) {
                if ($this->form_validation->run() == FALSE) {
                    $email = $this->session->userdata('email');
    
                    $data['title'] = 'Tambah Data Customer';
                    $data['admin'] = $this->M_Auth->getAdmin($email);
                    $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                    $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
    
                    $this->load->view('templates/admin_header', $data);
                    $this->load->view('customer/add', $data);
                } else {
                    $data = [
                        'id_ktp' => $this->input->post('id_ktp'),
                        'nama' => $this->input->post('nama'),
                        'alamat' => $this->input->post('alamat'),
                        'no_tlp' => $this->input->post('no_tlp'),
                        'perusahaan' => $this->input->post('perusahaan'),
                        'proyek' => $this->input->post('proyek')
                    ];
                    $this->M_Customer->insertCustomerData($data);
                    redirect('customer');
                }
            }
            else {
                echo 'Failed';
            }
        }

        public function update($id)
        {
            $this->form_validation->set_rules('id_ktp', 'No Ktp', 'trim|required|numeric', [
                'required' => 'No KTP harus diisi!',
                'numeric' => 'No KTP hanya boleh angka!'
            ]);
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
                'required' => 'Nama harus diisi!'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
                'required' => 'Alamat harus diisi!'
            ]);
            $this->form_validation->set_rules('no_tlp', 'No Tlp', 'trim|required|numeric', [
                'required' => 'No Tlp harus diisi!',
                'numeric' => 'No Tlp hanya boleh angka!'
            ]);
            $this->form_validation->set_rules('proyek', 'Proyek', 'trim|required', [
                'required' => 'Proyek harus diisi!'
            ]);

            if ($this->session->userdata('email')) {
                if ($this->form_validation->run() == FALSE) {
                    $email = $this->session->userdata('email');
    
                    $data['title'] = 'Edit Data Customer';
                    $data['admin'] = $this->M_Auth->getAdmin($email);
                    $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                    $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                    $data['customer'] = $this->M_Customer->getCustomerById($id);
    
                    $this->load->view('templates/admin_header', $data);
                    $this->load->view('customer/update', $data);
                } else {
                    $data = [
                        'id_ktp' => $this->input->post('id_ktp'),
                        'nama' => $this->input->post('nama'),
                        'alamat' => $this->input->post('alamat'),
                        'no_tlp' => $this->input->post('no_tlp'),
                        'perusahaan' => $this->input->post('perusahaan'),
                        'proyek' => $this->input->post('proyek')
                    ];
                    $this->M_Customer->updateCustomerData($data, $id);
                    redirect('customer');
                }
            }
            else {
                echo 'Failed';
            }
        }

        public function delete($id)
        {
            if ($this->session->userdata('email')) {
                $this->M_Customer->deleteCustomerData($id);
                redirect('customer');
            }
            else {
                echo 'Failed';
            }
        }
    }
    
?>
