<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>Warning!</h5>
            Anda harus login terlebih dahulu untuk melakukan transaksi.
            </div>');
            redirect('auth/cust_login');
        }
        $this->load->model('M_Order');
        $this->load->library('cart');
    }

    public function index()
    {
        $proses_transaksi = $this->M_Order->process();
        if ($proses_transaksi) {
            $this->cart->destroy();
            redirect('shop');
        } else {
            redirect('shop/show_cart');
        }
    }
}
?>