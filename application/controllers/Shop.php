<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Shop');
        $this->load->library('cart');
    }

    public function index($category_id = 0)
    {
        $data['title'] = 'Penyewaan Scaffolding Samarinda - Home';
        $data['jam'] = $this->M_Shop->getAllProduct($category_id);
        $this->load->view('templates/shop_header', $data);
        $this->load->view('templates/shop_navbar');
        $this->load->view('shop/home', $data);
        $this->load->view('templates/shop_footer');
    }

    public function add_to_cart($id)
    {
        $product = $this->M_Shop->getProductById($id);
        $data = [
            'id' => $product['id'],
            'qty' => 1,
            'price' => $product['price'],
            'nama' => $product['nama']
        ];

        $this->cart->insert($data);
        $this->show_cart();
    }

    public function show_cart()
    {
        $data['title'] = 'Penyewaan Scaffolding Samarinda - Cart';
        $this->load->view('templates/shop_header', $data);
        $this->load->view('templates/shop_navbar');
        $this->load->view('shop/cart');
        $this->load->view('templates/shop_footer');
    }

    public function clear_cart()
    {
        $this->cart->destroy();
        redirect('shop');
    }
}
    
    /* End of file Shop.php */
