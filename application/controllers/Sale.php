<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Sale');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');

            $data['title'] = 'History Penyewaan';
            $data['admin'] = $this->M_Auth->getAdmin($email);
            $data['penyewaan'] = $this->M_Sale->getAllData();
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('sale/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function detail($id)
    {
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');

            $data['title'] = 'Detail Penjualan';
            $data['admin'] = $this->M_Auth->getAdmin($email);
            $data['penjualan'] = $this->M_Sale->getDetailDataPenjualan($id);
            $data['navbar'] = $this->load->view('templates/navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/sidebar', $data, true);

            $this->load->view('templates/header', $data);
            $this->load->view('sale/detail', $data);
            $this->load->view('templates/footer');
        }
    }

    public function konfirmasiPenjualan($id)
    {
        if ($this->session->userdata('email')) {
            $this->M_Sale->konfirmasiPenjualan($id);
            redirect('sale');
        } else {
            echo 'Failed';
        }
    }
    public function konfirmasiPengembalian($id)
    {
        if ($this->session->userdata('email')) {
            $this->M_Sale->konfirmasiPengembalian($id);
            redirect('sale');
        } else {
            echo 'Failed';
        }
    }
}
