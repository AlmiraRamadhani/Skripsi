<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Auth');
        $this->load->model('M_Transaksi');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'Data Transaksi';
            $data['admin'] = $this->M_Crud->get('admin');

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/transaksi/index';
            $config['total_rows'] = $this->M_Transaksi->countAllTransaksi();
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

            $data['transaksi'] = $this->M_Transaksi->getAllTransaksi(10, $data['start']);
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('transaksi/index', $data);
        } else {
            echo 'Failed';
        }
    }

    public function add()
    {
        if ($this->session->userdata('username')) {
            if ($this->form_validation->run() == FALSE) {
                $username = $this->session->userdata('username');

                $data['title'] = 'Tambah Data Transaksi';
                $data['admin'] = $this->M_Crud->get('admin');
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['customer'] = $this->M_Transaksi->getAllCustomer();

                $this->load->view('templates/admin_header', $data);
                $this->load->view('transaksi/add', $data);
            } else {
                $data = [
                    'id' => $data->id,
                    'id_cust' => $data->id_cust,
                    'fdate' => $data->fdate,
                    'ldate' => $data->ldate
                ];
                $this->M_Transaksi->insertTransaksiData($data);
                redirect('transaksi/index');
            }
        } else {
            echo 'Failed';
        }
    }

    public function update($id)
    {
        if ($this->session->userdata('username')) {
            if ($this->form_validation->run() == FALSE) {
                $username = $this->session->userdata('username');

                $data['title'] = 'Edit Data Transaksi';
                $data['admin'] = $this->M_Crud->get('admin');
                $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
                $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);
                $data['transaksi'] = $this->M_Transaksi->getTransaksiById($id);
                $data['customer'] = $this->M_Transaksi->getAllCustomer();

                $this->load->view('templates/admin_header', $data);
                $this->load->view('transaksi/update', $data);
            } else {
                $id = $this->input->post('id');

                $data = [
                    'id' => $this->input->post('id'),
                    'id_cust' => $this->input->post('id_cust'),
                    'fdate' => $this->input->post('fdate'),
                    'ldate' => $this->input->post('ldate')
                ];

                $this->M_Transaksi->editTransaksiData($data, $id);
                redirect('transaksi');
            }
        } else {
            echo 'Failed';
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('username')) {
            $this->M_Transaksi->deleteTransaksiData($id);
            redirect('transaksi');
        } else {
            echo 'Failed';
        }
    }

    function kembali($id, $jmlSkarang)
    {
        $val = array('Stock' => $jmlSkarang);
        $this->db->where('id', $id);
        $this->db->update('transaksi', $val);
    }

    public function history()
    {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');

            $data['title'] = 'Data Transaksi';
            $data['admin'] = $this->M_Crud->get('admin');

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/skripsi/transaksi/index';
            $config['total_rows'] = $this->M_Transaksi->countAllTransaksi();
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

            $data['transaksi'] = $this->M_Transaksi->getAllTransaksi(10, $data['start']);
            $data['navbar'] = $this->load->view('templates/admin_navbar', null, true);
            $data['sidebar'] = $this->load->view('templates/admin_sidebar', $data, true);

            $this->load->view('templates/admin_header', $data);
            $this->load->view('transaksi/history', $data);
        } else {
            echo 'Failed';
        }
    }

    public function tmbPembelian($brg)
    {
        $data = $this->modelTransaksi->tmbTransaksi($brg)->row();
        $data_produk = array(
            'id' => $data->idBarang,
            'name' => $data->NamaBarang,
            'price' => $data->Harga,
            'qty' => '1',
            'stok' => $data->Stock
        );
        $this->cart->insert($data_produk);
        // $data1 = $this->cart->contents();
        $response = $this->show_cart();

        $this->output
            ->set_status_header(201)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function show_cart()
    { //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
				<tr>
					<td>' . $no . '</td>
					<td>' . $items['name'] . ' ' . $items['merek'] . ' ' . $items['farian'] . '</td>
					<td> <input type="number" name="angga" value="' . $items['qty'] . '" style="width: 60px;" min="1" max="' . $items['stok'] . '" id="' . $items['rowid'] . '" class="jumlahhh"></input>' . $items['satuan'] . '</td>
					<td>' . number_format($items['price']) . '</td>
					<td><button type="button" id="' . $items['rowid'] . '" class="hps hapus_cart btn btn-danger btn-xs"><i class="far fa-window-close"></i></button></td>
				</tr>
			';
        }
        $output .= '
			<tr>
				<th colspan="4">Total</th>
				<th colspan="2">' . 'Rp. ' . number_format($this->cart->total()) . '</th>
			</tr>
		';
        return $response = array(
            'tampilan' => $output,
            'Nomor' => $no
        );
    }

    public function hapusChart($id)
    {
        $data = array(
            'rowid' => $id,
            'qty' => 0,
        );
        $this->cart->update($data);
        $response =  $this->show_cart();
        $this->output
            ->set_status_header(201)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function jumlah($id, $nilai)
    {
        $data = array(
            'rowid' => $id,
            'qty' => $nilai,
        );
        $this->cart->update($data);
        $response =  $this->show_cart();
        $this->output
            ->set_status_header(201)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function hapusChartAll()
    {
        $this->cart->destroy();
        $response =  $this->show_cart();
        $this->output
            ->set_status_header(201)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function bayar()
    {
        $tanggal = date('y/m/d');
        $idUser = $this->session->userdata('id');
        foreach ($this->cart->contents() as $item) {
            $dtachart  = array(
                'IdBarang' =>  $item['id'],
                'TglTransaksi' => $tanggal,
                'JumlahBeli' => $item['qty'],
                'IdPengguna' => $idUser,
                'Subtotal' => $item['subtotal']
            );
            $this->db->insert('penjualan', $dtachart);
            $stokawal = $this->modelTransaksi->Ambilstok($item['id'])->row();

            $jmlSkarang = $stokawal->Stock - $item['qty'];
            $this->modelTransaksi->KurangStock($item['id'], $jmlSkarang);
        }
        $this->cart->destroy();



        $response  = array(
            'info' => 'Transaksi Berhasil',
            'tampil' => $this->show_cart()
        );

        $this->output
            ->set_status_header(201)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
}
