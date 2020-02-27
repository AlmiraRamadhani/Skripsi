<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Order extends CI_Model {
        public function process()
        {
            $customer = $this->getCustomer();
            $invoice = [
                'id_customer' => $customer['id'],
                'tgl_sewa' => date('Y-m-d H:i:s'),
                'tgl_kembali' => date('Y-m-d, H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 3, date('Y'))),
                'status_bayar' => 'Belum Bayar',
                'status_pinjaman' => 'Masih Dipinjam'
            ];
            $this->db->insert('invoices', $invoice);
            $invoice_id = $this->db->insert_id();

            foreach ($this->cart->contents() as $items) {
                $data = [
                    'invoices_id' => $invoice_id,
                    'product_id' => $items['id'],
                    'product_name' => $items['name'],
                    'qty' => $items['qty'],
                    'price' => $items['price']
                ];
                $this->db->insert('orders', $data);
            }
            return true;
        }

        public function getCustomer()
        {
            return $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        }
    }
?>
