<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata('status')!="login"){
			redirect(base_url().'welcome?pesan=belumlogin');
		}
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin_sidebar');
		$this->load->view('admin/dashboard',);
	}
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input-post('password');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if ($this->form_validation->run() != false) {
			$where = array(
				'username'=>$username,
				'password'=>md5($password)
			);
			$data=$this->m_crud->edit($where,'admin');
			$d=$this->m_crud->edit($where,'admin')->row();
			$cek=$data->num_rows();
			if($cek>0){
				$session=array(
					'id'=>$d->id,
					'nama'=>$d->nama,
					'status'=>'login'
				);
				$this->session->set_userdata($session);
				redirect(base_url().'admin');
			}else {
				redirect(base_url().'welcome?pesan=gagal');
			}
		}else {
			$this->load->view('login');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'welcome?pesan=logout');
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

		$this->form_validation->set_rules('pass_baru'.'Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
		
		if ($this->form_validation->run() !=false) {
			$data=array(
				'password'=>md5($pass_baru)
			);
			$w = array(
				'id' => $this->session->userdata('id')
			);
			$this->m_crud->update($w,$data,'admin');
		}else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/admin_sidebar');
			$this->load->view('auth/ganti_password');
		}
	}
	function register()
	{
		
	}
	//CRUD product
	function product()
	{
		$data['product'] = $this->m_crud->get['product']->result();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin_sidebar');
		$this->load->view('product/index',$data);
	}
	function add_product()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin_sidebar');
		$this->load->view('product/add');
	}
	function aksi_add_product()
	{
		$name =
	}
}
