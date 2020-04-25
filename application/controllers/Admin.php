<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'welcome?pesan=belumlogin');
		}
		$this->load->model('M_Auth');
		$this->load->model('M_Admin');
	}
	public function index()
	{
		$data['title'] = 'Admin Page';
		$data['admin'] = $this->M_Crud->get('admin');
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_navbar');
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('admin/dashboard', $data);
	}
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input - post('password');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() != false) {
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);
			$data = $this->m_crud->edit($where, 'admin');
			$d = $this->m_crud->edit($where, 'admin')->row();
			$cek = $data->num_rows();
			if ($cek > 0) {
				$session = array(
					'id' => $d->id,
					'nama' => $d->nama,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'welcome?pesan=gagal');
			}
		} else {
			$this->load->view('login');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'welcome?pesan=logout');
	}
	function ganti_password()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin_sidebar');
		$this->load->view('auth/ganti_password');
	}
	function aksi_ganti_pass()
	{
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');

		$this->form_validation->set_rules('pass_baru' . 'Password Baru', 'required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');

		if ($this->form_validation->run() != false) {
			$data = array(
				'password' => md5($pass_baru)
			);
			$w = array(
				'id' => $this->session->userdata('id')
			);
			$this->m_crud->update($w, $data, 'admin');
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/admin_sidebar');
			$this->load->view('auth/ganti_password');
		}
	}

	public function userindex()
	{
		if ($this->session->userdata('username')) {
			$username = $this->session->userdata('username');

			$data['title'] = 'Data User';
			$data['admin'] = $this->M_Crud->get('admin');

			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/skripsi/Customer/index';
			$config['total_rows'] = $this->M_Admin->countAllAdmin();
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

			$data['user'] = $this->M_Admin->getAllAdmin(10, $data['start']);
			$data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
			$data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

			$this->load->view('templates/admin_header', $data);
			$this->load->view('Admin/index', $data);
		} else {
			echo 'Failed';
		}
	}
}
