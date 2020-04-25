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

	public function changePassword()
	{
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]', [
			'required' => 'Password harus diisi!',
			'min_length' => 'Password minimal harus 5 karakter!'
		]);
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]', [
			'required' => 'Konfirmasi password harus diisi!',
			'matches' => 'Konfirmasi password harus sama dengan password!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Ganti Password';
			$data['admin'] = $this->M_Crud->get('admin');
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_navbar');
			$this->load->view('templates/admin_sidebar', $data);
			$this->load->view('admin/change_password', $data);
		} else {
			$password = md5($this->input->post('password1'));
			$username = $this->session->userdata('username');

			$cekPassword = $this->M_Admin->cekPassword($username);

			if ($password != $cekPassword['admin_password']) {
				$this->M_Admin->changePassword($username, $password);
				$this->session->set_flashdata('password_success', 'Password berhasil dirubah.');
				redirect('admin/changePassword');
			} else {
				$this->session->set_flashdata('same_password', 'Password baru tidak boleh sama dengan password sebelumnya!');
				redirect('admin/changePassword');
			}
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
