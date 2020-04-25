<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Crud');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required' => 'username harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login();
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if ($this->form_validation->run() != false) {
            $where = array(
                'username' => $username,
                'password' => md5($password)
            );
            $data = $this->M_Crud->edit($where,'admin');
            $d = $this->M_Crud->edit($where,'admin')->row();
            $cek = $data->num_rows();
            if ($cek > 0) {
                $session = array(
                    'id' => $d->id,
                    'username'=> $d->name,
                    'status'=>'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url().'admin');
            } else {
                redirect(base_url().'welcome?pesan=gagal');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    function regis()
    {
        $this->form_validation->set_rules('nama', 'Full Name', 'trim|required', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('username', 'username Address', 'trim|required|valid_username|is_unique[admin.username]', [
            'required' => 'username harus diisi!',
            'valid_username' => 'Format username harus benar!',
            'is_unique' => 'username sudah pernah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]', [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password minimal harus 5 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
            'required' => 'Confirm Password harus diisi!',
            'matches' => 'Field harus sama dengan field Password!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];
            $this->M_Auth->inserAdminData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            Akun anda berhasil didaftarkan!
            </div>');
            redirect('auth');
        }
    }
    function logout()
    {
        $this->session->sess_destroy(); 
        redirect(base_url().'welcome?pesan=logout');
    }
}